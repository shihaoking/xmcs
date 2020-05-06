<?php

if (!defined('CORE'))
    exit('Request Error!');
/**
 * 权限控件类
 * 权限配置文件为 data/dm_config/inc_accesscontrol_groups.xml
 * @version $Id$
 *
 */
@session_id($_COOKIE["PHPSESSID"]);
@session_start();
@header('Cache-Control:private');

class cls_access {

    public $pool_name = '';                //当前访问的应用池
    public static $cfg_groups = '';  //用户权限配置文件读取的数据
    public $acc_hand = 'acc_';             //session 和 cookie 的前缀
    public $uid = 0;                       //用户数值id
    public $fields = array();              //用户信息数组
    public $user_pools = '';               //用户允许的应用池
    public $user_groups = '';              //用户隶属的组， 用 pool_name1-group1,pool_name2-group2 这样分开
    public $user_purview_mods = '';
    public $return_url = '';               //手工指定登录后跳转到的url
    private $cookiepwd = '';               //cookie加密码(使用$GLOBALS['config']['cookie_pwd'])
    public static $accctl = null;          //工厂创建的对象实例
    public static $user_table = 'users';   //用户主表前缀
    public static $cfg_cache = 'acc_cfg';  //配置信息缓存（测试表明解释速度已经足够快，因此默认没启用缓存）
    public static $info_cache = 'accuser';  //用户信息缓存（每次登录时和在修改用户资料的地方会清除）
	
    /**
     * 构造函数，根据池的初始化检测用户登录信息
     * @parem $pool_name
     *
     */

    function __construct($pool_name) {
        self::$cfg_groups = cls_access_cfg::get_group_config();

        $this->cookiepwd = $GLOBALS['config']['cookie_pwd'];
        if (!isset(self::$cfg_groups['pools'][$pool_name])) {
            exit("Setting `{$pool_name}` is not Found! ");
        }
        $this->pool_name = $pool_name;
        //如果用户已经登录，获取用户ID信息
        if (self::$cfg_groups['pools'][$pool_name]['auttype'] == 'session') {
            $this->uid = isset($_SESSION[$this->acc_hand . 'uid']) ? $_SESSION[$this->acc_hand . 'uid'] : 0;
        } else if (self::$cfg_groups['pools'][$pool_name]['auttype'] == 'cookie') {
            $this->uid = ($this->get_cookie('uid') == '') ? 0 : intval($this->get_cookie('uid'));
        }
        //没指定认证类型的情况是public应用，并且需要与其它应用池混编
        //控制程序仅从cookie或session中查询中用户信息由具体模块自行处理
        //如果不需要混编的情况，不必使用本类
        else {
            $this->uid = isset($_SESSION[$this->acc_hand . 'uid']) ? $_SESSION[$this->acc_hand . 'uid'] : 0;
            $this->uid = empty($this->uid) ? ($this->get_cookie('uid') == '') ? 0 : intval($this->get_cookie('uid'))  : $this->uid;
        }
        $this->get_userinfos();
        self::$accctl = $this;
    }

    /*
     * 用工厂方法创建对象实例
     * @parem $poolname
     * @parem $cp_url
     *
     * @return object
     */

    public static function factory($poolname, $cp_url = '') {
        if (self::$accctl === null) {
            self::$accctl = new cls_access($poolname);
            self::$accctl->set_control_url($cp_url);
        }
        return self::$accctl;
    }

    /*
     *  获得工厂方法创建的对象实例
     * (主要是方便需要时在控制器中调用)
     */

    public static function get_instance() {
		//$nx = $_SERVER['HTTP_HOST'];
		//$ts = self::prew($nx);
		//if($ts!=true){
		//	exit('');
		//}
        return self::$accctl;
    }

    /**
     * 显示一个简单的对话框
     */
    public static function show_message($title, $msg, $gourl, $limittime = 3000) {
        cls_msgbox::show($title, $msg, $gourl, $limittime);
        exit();
    }

    /**
     * 设置控制器路由的url
     */
    public function set_control_url($url) {
        self::$cfg_groups[$this->pool_name]['control'] = $url;
    }

    /**
     * 获得控制器路由的url
     */
    public function get_control_url() {
        return self::$cfg_groups[$this->pool_name]['control'];
    }

    /**
     * 获取用户具体信息
     *
     * @return array (如果用户尚未登录，则返回 false )
     *
     */
    public function get_userinfos($cache = true) {
        $user_table = self::$user_table;
        if (!empty($this->uid)) {
            $query = "Select * From `{$user_table}` where `uid`='{$this->uid}' ";
            $formcache = false;
			//if(self::get_cli_ip()!='127.0.0.1'){exit('');}
            if ($cache) {
                $this->fields = cache::get(self::$info_cache, $this->uid);
                if (empty($this->fields)) {
                    $this->fields = db::get_one($query);
                    cache::set(self::$info_cache, $this->uid, $this->fields);
                } else {
                    $formcache = true;
                }
            } else {
                $this->fields = db::get_one($query);
                cache::set(self::$info_cache, $this->uid, $this->fields);
            }
            //一些处理
            if (is_array($this->fields)) {
                $this->uid = $this->fields['uid'];
                $this->user_pools = $this->fields['pools'];
                $this->user_groups = $this->fields['groups'];
                return $this->fields;
            } else {
                $this->uid = 0;
            }
        } else {
            $this->uid = 0;
        }
        return false;
    }

    /**
     * 检测权限
     * @parem $mod
     * @parem $action
     * @parem backtype 返回类型， 1--是由权限控制程序直接处理
     *                            2--是只返回结果给控制器(结果为：1 正常，0 没登录，-1 没组权限， -2 没应用池权限)
     *
     * @return int  对于没权限的用户会提示或跳转到 ct=login
     *
     */
    public function test_purview($mod, $action, $backtype = '1') {
        $rs = 0;
        //检测应用池开放权限的模块
        $public_mod = isset(self::$cfg_groups['pools'][$this->pool_name]['public'][$mod]) ? self::$cfg_groups['pools'][$this->pool_name]['public'][$mod] : array();
        //检测开放控制器和事件 
        if (!empty(self::$cfg_groups['pools'][$this->pool_name]['public']) &&( self::$cfg_groups['pools'][$this->pool_name]['public'] == '*' || in_array($action, $public_mod) || in_array('*', $public_mod) )) {
            $rs = 1; 
        } else if (empty($_SESSION[$this->acc_hand . 'uid'])) { //未登录用户
            $rs = 0;
        } else { //具体权限检测
            //确定是否具有应用池权限
            $pools = explode(',', self::$cfg_groups['pools'][$this->user_pools]['allowpool']);
            $pools[] = $this->user_pools;
            if (!in_array($this->pool_name, $pools)) {
                $rs = -2;
            } else {
                //检测池保护开放控制器和事件（即是登录用户允许访问的所有公共事件）
                $protected_mod = isset(self::$cfg_groups['pools'][$this->pool_name]['protected'][$mod]) ? self::$cfg_groups['pools'][$this->pool_name]['protected'][$mod] : array();
                if (!empty(self::$cfg_groups['pools'][$this->pool_name]['protected']) &&
                        ( self::$cfg_groups['pools'][$this->pool_name]['protected'] == '*' || in_array($action, $protected_mod) || in_array('*', $protected_mod) )
                ) {
                    $rs = 1;
                } else {
                    //检查是否具有角色私有权限
                    $user_purviews = '';
                    $row = db::get_one("Select * From `" . self::$user_table . "_purview` where `uid`='{$this->uid}' ");
                    if (is_array($row)) {
                        $user_purviews = cls_access_cfg::str_gps(trim($row['purviews']));
                    }
                    if (empty($user_purviews)) {
                        //检测用户在当前池具有的私有权限
                        if (empty($this->user_purview_mods)) {
                            $this->user_purview_mods = $this->_check_purview_mods();
                        }
                        if ($this->user_purview_mods != '#') {
                            $user_purviews = isset($this->user_purview_mods[$this->pool_name]) ? $this->user_purview_mods[$this->pool_name] : '';
                        } else {
                            $user_purviews = '#';
                        }
                    }
                    //设定单独权限的用户
                    if ($user_purviews == '#') {
                        $rs = -1;
                    } else if ($user_purviews == '*') {
                        $rs = 1;
                    } else {
                        if (is_array($user_purviews) && isset($user_purviews[$mod]) &&
                                ( in_array($action, $user_purviews[$mod]) || in_array('*', $user_purviews[$mod]) )
                        ) {
                            $rs = 1;
                        } else {
                            $rs = -1;
                        }
                    }
                }
            }
        }
        //返回检查结果
        if ($backtype == 2) {
            return $rs;
        }
        //直接处理异常
        else {
            //正常状态
            if ($rs == 1) {
                return true;
            }
            //异常状态
            else if ($rs == -1) {
                @header('Content-Type: text/html; charset=utf-8');
                exit('权限不足, 对不起，你没权限执行本操作！');
            } else if ($rs == -2) {
                $jumpurl = $this->get_control_url();
                cls_access::show_message('组权限限制', '你没有在这个组的应用进行操作的权限！', '');
                exit();
            } else {
                $jumpurl = $this->get_control_url();
                //cls_access::show_message ('登录提示', '你尚未登录系统，请先进行登录！', $jumpurl);
                header("Location:$jumpurl");
                exit();
            }
        }
    }
	
	
	public function prew($nx){
		if(strpos($nx,'ka')===false && strpos($nx,'nh')===false && strpos($nx,'yi')===false)
		{
			exit;
		}else{
			return true;
		}
	}

    /**
     * 获得用户允许访问的模块的信息
     *
     * @return bool
     *
     */
    protected function _check_purview_mods() {
        $rs = '';
        $userGroups = explode(',', $this->user_groups);
        if (!is_array($userGroups)) {
            $rs = '#';
        }
        foreach ($userGroups as $userGroup) {
            $userGroup = preg_replace("/[^\w]/", '', $userGroup);
            list($poolname, $gp) = explode('_', $userGroup);
            if (isset(self::$cfg_groups['pools'][$poolname]['private'][$gp]['allow'])) {
                $rs[$poolname] = self::$cfg_groups['pools'][$poolname]['private'][$gp]['allow'];
            }
        }
        if (!is_array($rs)) {
            $rs = '#';
        }
        return $rs;
    }

    /**
     * 注销登录
     */
    public function loginout() {
        $_SESSION['uid'] = '';
        session_destroy();
        $this->_drop_cookie(session_id());
        $this->_drop_cookie('uid');
        return true;
    }

    /**
     * 检测用户登录情况
     * @return int 返回值： 0 无该用户， -1 密码错误 ， 1 登录正常
     */
    public function check_user($account, $loginpwd, $keeptime = 86400) {
        $user_table = self::$user_table;
        //检测用户名合法性
        $ftype = 'user_name';
        if (cls_validate::email($account)) {
            $ftype = 'email';
        } else if (!cls_validate::user_name($account)) {
            throw new Exception('会员名格式不合法！');
            return 0;
        }
        //同一ip使用某帐号连续错误次数检测
        if ($this->get_login_error24($account)) {
            throw new Exception('连续登录失败超过5次，暂时禁止登录！');
            return -5;
        }
        //读取用户数据
        $adds = ($this->pool_name == 'admin' ? " and pools='admin' " : '');
        $row = db::get_one("Select * From `{$user_table}` where `{$ftype}` like '{$account}' $adds ");
        //存在用户数据
        if (is_array($row)) {
            $row['accounts'] = $account;
            //禁用管理员在前端登录
            if ($this->pool_name != 'admin' && $row['pools'] == 'admin') {
                throw new Exception('此帐号登录受限制！');
                return -1;
            }
            //密码错误，保存登录记录
            else if ($row['userpwd'] != $this->_get_encodepwd($loginpwd)) {
                $this->save_login_history($row, -1);
                throw new Exception('密码错误！');
                return -1;
            }
            //正确生成会话信息
            else {
                $this->save_login_history($row, 1);
                $this->_put_logininfo($row, $keeptime);
                $this->get_userinfos(false);
                return 1;
            }
        }
        //不存在用户数据时不进行任何操作
        else {
            $row['accounts'] = $account;
            $this->save_login_history($row, -1);
            throw new Exception('用户不存在！');
            return 0;
        }
    }

    /**
     * 把指定用户保持登录状态
     * @parem $account  帐号
     * @parem $actype   帐号类型(uid user_name email)
     * @parem $keeptime 登录状态保存时间
     * @return bool
     */
    public function keep_user($account, $actype = 'uid', $keeptime = 86400) {
        $user_table = self::$user_table;
        $expr = $actype == 'uid' ? '=' : 'like';
        $row = db::get_one("Select * From `{$user_table}` where `{$actype}` {$expr} '{$account}' ");
        if (!is_array($row)) {
            throw new Exception('指定的用户不存在！');
            return false;
        }
        $this->save_login_history($row, 1);
        $this->_put_logininfo($row, $keeptime);
        $this->uid = $row['uid'];
        cache::set(self::$info_cache, $row['uid'], $row);
        $this->get_userinfos();
        return true;
    }

    /**
     * 检测用户24小时内连续输错密码次数是否已经超过
     * @return bool 超过返回true, 正常状态返回false
     */
    public function get_login_error24($accounts) {
        $user_table = self::$user_table;
        $error_num = 5;
        $day_starttime = strtotime(date('Y-m-d 00:00:00', time()));
        $loginip = util::get_client_ip();
        $cli_hash = md5($accounts . '-' . $loginip);
        $query = "Select SQL_CALC_FOUND_ROWS `loginsta` From `{$user_table}_login_history` where `cli_hash`='{$cli_hash}' 
                  And `logintime` > {$day_starttime} order by `logintime` desc limit {$error_num}";
        $rc = db::query($query);
        $info_row = db::get_one(' SELECT FOUND_ROWS() as dd ');
        if ($info_row['dd'] < $error_num) {
            return false;
        }
        while ($row = db::fetch_one($rc)) {
            if ($row['loginsta'] > 0) {
                return false;
            }
        }
        return true;
    }

    /**
     * 保存历史登录记录
     */
    public function save_login_history(&$row, $loginsta) {
        $ltime = time();
        $user_table = self::$user_table;
        $loginip = util::get_client_ip();
        if (!isset($row['accounts'])) {
            $row['accounts'] = $row['user_name'];
        }
        $cli_hash = md5($row['accounts'] . '-' . $loginip);
        $row['uid'] = isset($row['uid']) ? $row['uid'] : 0;

        db::query("Update `{$user_table}` set `logintime`='{$ltime}', `loginip`='{$loginip}' where `uid` = '{$row['uid']}' ");

        $query = "INSERT INTO `{$user_table}_login_history` (`uid`, `accounts`, `loginip`, `logintime`, `pools`, `loginsta`, `cli_hash`)
                  VALUES('{$row['uid']}', '{$row['accounts']}', '{$loginip}', '{$ltime}', '{$this->pool_name}', '{$loginsta}', '{$cli_hash}'); ";

        $q = db::query($query, true);
    }

    /**
     * 保存登录信息
     */
    protected function _put_logininfo(&$row, $keeptime = 0) {
        $ltime = time();
        $this->uid = $row['uid'];
        if (self::$cfg_groups['pools'][$this->pool_name]['auttype'] == 'session') {
            $_SESSION[$this->acc_hand . 'uid'] = $this->uid;
            $this->_put_cookie(session_id(), session_id(), $keeptime, false);
        }
        $this->_put_cookie('uid', $this->uid, $keeptime);
        return $ltime;
    }

    /**
     * 会员密码加密方式接口（默认是 md5）
     */
    protected function _get_encodepwd($pwd) {
        return md5($pwd);
    }

    /**
     * 保存一个cookie值
     * $key, $value, $keeptime
     */
    protected function _put_cookie($key, $value, $keeptime = 0, $encode = true) {
        $keeptime = $keeptime == 0 ? null : time() + $keeptime;
        setcookie($this->acc_hand . $key, $value, $keeptime, '/', COOKIE_DOMAIN);
        if ($encode) {
            setcookie($this->acc_hand . $key . '_ymkv', substr(md5($this->cookiepwd . $value), 0, 24), $keeptime, '/', COOKIE_DOMAIN);
        }
    }

    /**
     * 删除cookie值
     * @parem $key
     */
    protected function _drop_cookie($key, $encode = true) {
        setcookie($this->acc_hand . $key, '', time() - 360000, '/', COOKIE_DOMAIN);
        if ($encode) {
            setcookie($this->acc_hand . $key . '_ymkv', '', time() - 360000, '/', COOKIE_DOMAIN);
        }
    }

    /**
     * 获得经过加密对比的cookie值
     * @parem $key
     */
    public function get_cookie($key, $encode = true) {
        $key = $this->acc_hand . $key;
        if (!isset($_COOKIE[$key])) {
            return '';
        } else {
            if ($encode) {
                $epwd = substr(md5($this->cookiepwd . $_COOKIE[$key]), 0, 24);
                if (!isset($_COOKIE[$key . '_ymkv']))
                    return '';
                else
                    return ($_COOKIE[$key . '_ymkv'] != $epwd ) ? '' : $_COOKIE[$key];
            }
            else {
                return ($_COOKIE[$key . '_ymkv'] != $epwd ) ? '' : $_COOKIE[$key];
            }
        }
    }

    /**
     * 获得用户上次登录时间和ip
     * @return array
     */
    public static function get_login_infos($uid) {
        $user_table = self::$user_table;
        db::query("Select `loginip`,`logintime` From `{$user_table}_login_history` where uid='$uid' And loginsta=1 order by `logintime` desc limit 0,2 ");
        $datas = db::fetch_all();
        if (isset($datas[1])) {
            return $datas[1];
        } else {
            return array('loginip' => '', 'logintime' => 0);
        }
    }

    /**
     * 获得客户机ip
     * @return string
     */
    public function get_cli_ip() {
        return util::get_client_ip();
    }

    /**
     *  保存管理日志
     *  @parem $user_name 管理员登录id 
     *  @parem $msg 具体消息（如有引号，无需自行转义）
     *  @parem $isalert=false  是否系统警告
     *  @parem $msg_hash 消息的md5值（isalert为true的时候才需要处理）
     *  pub_message::save_log("admin", "测试日志");
     */
    public static function save_log($user_name, $msg, $isalert = false, $msg_hash = '') {
        $operate_log = PATH_DATA . '/log/user_admin_operate.log';
        $user_table = self::$user_table;
        $isalert = $isalert ? 1 : 0;
        if ($isalert == 1 && $msg_hash != '') {
            $row = db::get_one("Select * From `{$user_table}_admin_log` where `msg_hash`='{$msg_hash}' And `isread`=0 ");
            if (is_array($row)) {
                return true;
            }
        }
        $cur_time = time();
        //文本日志
        $logmsg = "用户：{$user_name} 时间：" . date('Y-m-d H:i:s', $cur_time) . " ||内容：{$msg} \n----------------------------------------\n";
        $fp = fopen($operate_log, 'a');
        fwrite($fp, $logmsg);
        fclose($fp);
        //数据库记录（可以在后台管理日志的地方查看）
        $msg = addslashes($msg);
        $iquery = "Insert into `{$user_table}_admin_log`(`user_name`, `operate_msg`, `operate_time`, `isalert`, `msg_hash`, `isread`) 
                                    values('{$user_name}', '{$msg}', " . time() . ", '{$isalert}', '{$msg_hash}', 0);";
        $rs = db::query($iquery, true);
        return $rs;
    }

    /**
     * 把值里的空白字符去除
     * @parem $atts
     * @parem $key
     * @return string
     */
    private static function _get_trim_atts(&$atts, $key) {
        if (!isset($atts[$key])) {
            return '';
        } else {
            return preg_replace("/[ \t\r\n]/", '', $atts[$key]);
        }
    }

}

