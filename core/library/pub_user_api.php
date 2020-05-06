<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 用户操作公用API
 * $id$
 */
if( file_exists( PATH_CONFIG.'/inc_user_api.php' ) )
{
    require_once PATH_CONFIG.'/inc_user_api.php';
}
class pub_user_api
{
    //原认证文件里的可通用参数
    private static $enabled_cache = true;
    private static $cache_default_timeout = 3600;
    private static $cache_prefix = 'pub_user_api';



    const SAVE_LOGIN_STATE_TIME = 1209600;
    const LAST_OPERATE_OVERTIME = 259200;

    //API类的属性
    public $app_id  = '';
    public $app_key = '';
    public $secret = '';
    public $errno = '';
    public $errmsg = '';
    public static $auth_cookie_data = null;
    public static $current_user_id = -1;
    public static $cookie_setting = null;
    public static $has_get_cookie_setting = false;
    public static $cur_userinfos = array();


    private static $online_interval = MYAPI_ONLINE_INTERVAL;// 在线时间,每15分钟进行一次报告
    private static $online_cookie_name = MYAPI_COOKIE_ONLINE;  // 115online的cookie标志


    private static $cookie_login_expire = MYAPI_COOKIE_EXPIRE;        // cookie保存14天
    private static $cookie_domain = MYAPI_COOKIE_DOMAIN;      // AUTH COOKIE 域名
    private static $cookie_auth = MYAPI_COOKIE;           // 登录成功的COOKIE，保存user_id, user_name, email

    public static $is_login = NULL;                    // 是否登录
    public static $curr_user = array();
    public static $curr_user_id = NULL;

    private static $sign_key = MYAPI_SIGN_KEY;
    private static $_encrypt_key = MYAPI_ENCRYPT_KEY;


    /**
     * 构造函数
     * @parem $app_id     当前应用的ID
     * @parem $app_key    当前应用的密钥（一个网站只有一个应用的情况在常量定义即可）
     * @parem $check_auth 是否检查认证行为（如果不需要进行登录检测的，可以不需要此操作以节省性能）
     */
    public function __construct($app_id='', $app_key='', $check_auth = true)
    {
        // APP通讯设置
        $this->app_id  = !empty($app_id) ? $app_id : MYAPI_APP_ID;
        $this->app_key = !empty($app_key) ? $app_key : MYAPI_APP_KEY;
        $this->secret = md5($this->app_id.$this->app_key);
        // 设置当前用户信息
        $this->curr_user = $this->get_current_userinfo();
        // 汇报在线情况
        if($this->curr_user && MYAPI_ONLINE_REPORT){
            $this->set_online_status();
        }
    }

     /**
    * 获得请求的参数
    * @parem $params
    * @return string
    */
    protected function _get_params(&$params)
    {
        $str = '';
        foreach ($params as $k=>$v)
        {
            if (is_array($v))
            {
                foreach ($v as $kv => $vv)
                {
                    $str .= '&' . $k . '[' . $kv  . ']=' . urlencode($vv);
                }
            }
            else
            {
                $str .= '&' . $k . '=' . urlencode($v);
            }
        }
        return $str;
    }

    /**
    * 向指定网址发送post请求
    * @parem $url
    * @parem $params
    * @return array
    */
    protected function _post_req::item($url, $query_str)
    {
        if ( function_exists('curl_init') && MYAPI_USE_CURL===true )
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query_str);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla-ylmf-u-api-cli (curl) '.phpversion() );
            $result = curl_exec($ch);
            $errno  = curl_errno($ch);
            curl_close($ch);
            //echo " $url & $query_str <hr /> $errno , $result ";
            return array($errno, $result);
        }
        else
        {
            $context =
            array('http' =>
            array('method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded'."\r\n".
            'User-Agent: Mozilla-ylmf-u-api-cli (non-curl) '.phpversion()."\r\n".
            'Content-length: ' . strlen($query_str),
            'content' => $query_str));
            $contextid = stream_context_create($context);
            $sock = fopen($url, 'r', false, $contextid);
            if ($sock)
            {
                $result = '';
                while (!feof($sock))
                {
                    $result .= fgets($sock, 4096);
                }
                fclose($sock);
            }
        }
        return array(0, $result);
    }

    /**
    * 向指定网址发送get请求
    * @parem $url
    * @parem $params
    * @return array
    */
    protected function _get_req::item($url, $query_str)
    {
        $query_str = preg_replace('/^&/', '', $query_str);
        $url = $url.'?'.$query_str;
        if (function_exists('curl_init'))
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla-ylmf-u-api-cli (curl) ' . phpversion());
            $result = curl_exec($ch);
            $errno = curl_errno($ch);
            curl_close($ch);
            return array($errno, $result);
        }
        else
        {
            $context =
            array('http' =>
            array('method' => 'GET',
            'header' => 'User-Agent:Mozilla-ylmf-u-api-cli (non-curl) '.phpversion()
            )
            );
            $contextid = stream_context_create($context);
            $sock = fopen($url, 'r', false, $contextid);
            if($sock)
            {
                $result = '';
                while (!feof($sock))
                {
                    $result .= fgets($sock, 4096);
                }
                fclose($sock);
            }
        }
        return array(0, $result);
    }

    /**
     *
     * 加密cookie,修改此方法时与cls_my_auth方法保持一致
     * @param string $txt
     * @param string $key
     * @return string 加密串
     */
    function _encrypt($txt,$key) {
        $key_md5 =md5($key);
        $encode = "";
        for($i=0;$i<strlen($txt);$i++){
            $j = $i%strlen($key_md5);
            $encode .= $txt[$i]^$key_md5[$j];
        }
        return rawurlencode($encode);
    }

    /**
     *  解密cookie,修改此方法时与cls_my_auth方法保持一致
     * @param <type> $txt
     * @param <type> $key
     * @return 解密串
     */
    function _decrypt($txt,$key) {
        $txt = rawurldecode($txt);
        $key_md5 =md5($key);
        $decode = "";
        for($i=0;$i<strlen($txt);$i++){
            $j = $i%strlen($key_md5);
            $decode .= $key_md5[$j]^$txt[$i];
        }
        return $decode;
    }

    /**
    * 生成证书
    * @parem $data
    * @parem $args
    * @return void
    */
    protected function _make_secret( &$params, &$args )
    {
        ksort($params);
        $str = '';
        foreach ($params as $k=>$v)
        {
            $str .= $k . '=' . $v . '&';
        }
        if( !empty($args) && is_array($args) )
        {
            ksort($args);
            foreach ($args as $k=>$v)
            {
                if (is_array($v)) $v = join(',' , $v);
                $params['args'][$k] = $v;
                $k = 'args[' . $k . ']';
                $str .= $k .'=' . $v . '&';
            }
        }
        $params['sign'] = md5($str.$this->secret);
    }

    /**
    * 请求指定的内容
    * @parem $method
    * @parem $args
    * @return max ( array || null || false)
    */
    protected function _call_api_method($api_method, $args, $ispost='auto', $my_server_url='')
    {
        $this->errno = 0;
        $this->errmsg = '';
        $url = empty($my_server_url) ? MYAPI_SERVER_URL : $my_server_url;
        $params = array();
        $params['api_method'] = $api_method;
        $params['api_app_id'] = $this->app_id;
        $params['api_client'] = 'PHP';
        $params['api_v'] = '0.1';

        //生成证书
        $this->_make_secret( $params, $args );

        //大于512字节时才使用post， 否则用get方式请求
        $query_str = $this->_get_params($params);
        if( $api_method=='p3pLogin' || $api_method=='p3pExit' ) // || $api_method=='get.userInfos'
        {
            $query_str = preg_replace('/^&/U', '', $query_str);
            $url = $url.'?'.$query_str;
            return $url;
        }
        else if( strlen($query_str) < 512 && $ispost == 'auto' )
        {
            list($errno, $result) = $this->_get_req::item($url, $query_str);
        } else {
            list($errno, $result) = $this->_post_req::item($url, $query_str);
        }
        // echo $url.'?'.$query_str;
        $result = trim($result);
        if( $result=='' )
        {
            return false;
        }
        else if ( !$errno )
        {
            try
            {
                $result = unserialize($result);
            }
            catch ( Exception $e )
            {
                if( OPEN_DEBUG )
                {
                    echo "服务端程序可能存在错，返回信息如下：<hr />\n";
                    echo $result;
                    exit();
                } else {
                    trigger_error("Server Error:".$result);
                    return false;
                }
            }
            //print_r( $result );
            if (isset($result['errCode']) && $result['errCode'] != 0)
            {
                $this->errno = $result['errCode'];
                $this->errmsg = $result['errMessage'];
                // TODO handle error
                return null;
            }
            return $result['result'];
        } else {
            return false;
        }
    }



    /**
    * 检测用户名和密码是否正确
    * @parem $account     帐号(昵称或email)
    * @parem $passwd      密码
    * @parem $ip          客户端ip
    * @parem $referer     入口网址
    * @return error string OR array
    */
    public function check_user($account, $passwd, $ip='', $referer='')
    {
        $rs = $this->_call_api_method('checkUser', array('account'=>$account, 'passwd'=>$passwd, 'ip'=>$ip, 'referer'=>$referer));
        return $rs;
    }
    
    /**
    * 检测是否存在某用户
    * @parem $account     帐号(用户服帐号或email)
    * @parem $type        user_name || email
    * @return 1 存在  0 不存在
    */
    public function check_account( $account, $type='user_name' )
    {
        $rs = $this->_call_api_method('checkAccount', array('account'=>$account, 'type'=>$type) );
        return $rs;
    }
    
    /**
    * 检测用户名和密码是否正确
    * @parem $user_id    用户id
    * @parem $data       array('user_name'=>, 'password'=>, 'email'=>)
    * @return bool
    */
    public function update_account( $user_id, $data=array() )
    {
        $data['user_id'] = $user_id;
        $rs = $this->_call_api_method('updateAccount', $data );
        return $rs;
    }

    /**
    * 本地生成和my.115.com一样的cookie
    * @parem $account     登录时填写的email或用户名
    * @parem $data        用户信息
    * @parem $expire      过期时间
    * @parem $domain      域名
    * @return void
    */
    public function set_login_cookie($account, $data, $save_sta=true, $domain='')
    {
        $expire = $save_sta===true ? (time () + self::$cookie_login_expire) : 0;
        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        
        // COOKIE的数组
        $cookie_data = array($data['user_id'], rawurlencode($data['user_name']), $data['email'], time());
        $value = implode(':', $cookie_data);

        $cookie_domain = !empty($domain) ? $domain : self::$cookie_domain;

        // 签名
        $value .=":".md5($value.self::$sign_key);
        // 加密
        $value = self::_encrypt($value, self::$_encrypt_key);
        return setcookie(self::$cookie_auth, $value, $expire, '/', $cookie_domain);
    }

    /**
    * 删除当前登录站点的cookie
    * @parem $domain      域名
    * @return void
    */
    public function del_login_cookie( $domain = '' )
    {
        $cookie_domain = !empty($domain) ? $domain : self::$cookie_domain;
        setcookie(self::$cookie_auth, "", time()-1, '/', $cookie_domain);
    }


    /**
    * 获得多个用户的头像签名信息
    * @parem $user_id( 用 , 分开的多个用户id)
    * return max ( array || false)
    */
    public function get_user_faces($user_id)
    {
         $user_id = preg_replace("/[ \r\n\t]/", '', $user_id);
         return $this->_call_api_method('get.userFaces', array('user_id'=>$user_id));
    }

    /**
     * 获取当前用户ID,兼容以前的代码,新写代码,只需调用get_current_user_id即可
     * @return <type>
     */
    public function get_user_id()
    {
        return self::get_current_user_id();
    }
    
    /**
    * 获得当前登录用户的积分(此接口暂不可用，需使用网盘那的服务端访问)
    * @return int
    */
    public function get_user_score( $user_id )
    {
        $rs = $this->_call_api_method('get.userScore', array('user_id'=>$user_id));
        return $rs;
    }

    /**
    * 获得当前登录用户的等级(此接口暂不可用，需使用网盘那的服务端访问)
    * @return int
    */
    public function get_user_level( $user_id )
    {
        $rs = $this->_call_api_method('get.userLevel', array('user_id'=>$user_id));
        return $rs;
    }
    
   /**
    * 加指定用户为好友
    * @parem $user_id         用户id
    * @parem $to_user_name   被加为好友的用户名
    * @parem $body            对目标用户的留言
    * @return string 参数 'data-error' 用户名错误 'true' 成功 'false' 失败
    */
    public function add_friend( $user_id, $to_user_name, $body='' )
    {
        $rs = $this->_call_api_method('addFriend', array('user_id'=>$user_id, 'to_user_name'=>$to_user_name, 'body'=>$body));
        return $rs;
    }
    
   /**
    * 获得某用户的好友列表
    * @return array
    */
    public function get_friends( $user_id )
    {
        $rs = $this->_call_api_method('get.friendList', array('user_id'=>$user_id));
        return $rs;
    }

    /**
    * 发送邮件
    * @parem $to            目标邮箱
    * @parem $subject       邮件标题
    * @parem $body          邮件内容
    * @parem $app           应用标识（这涉及发件人帐号）
    * @parem $level         紧急程度（1为立即，其它为队列）
    * @parem $failed_resend 失败后是否重发 0|1
    * @return string     'true' 成功 'false' 失败
    */
    public function send_mail( $to, $subject, $body, $app='', $level=1, $failed_resend=0  )
    {
        $rs = $this->_call_api_method('sendMail', array('to'=>$to, 'subject'=>$subject, 'body'=>$body, 'app'=>'u',
        'level'=>$level, 'failed_resend'=>$failed_resend), 'post' );
        return $rs;
    }

    /**
    * 向指定用户发送短信息
    * @parem $user_id         用户id
    * @parem $to_user_id    目标用户名
    * @parem $body            对目标用户的留言
    * @parem $subject         信息标题
    * @parem $utype           目标用户名类型 user_id || user_name
    * @return string 参数 'max' 超过每小时发信息条数 'data-error' 用户名错误 'true' 成功 'false' 失败
    */
    public function send_message( $user_id, $to_user_id, $subject, $body)
    {
        $rs = $this->_call_api_method('sendMessage', array('user_id'=>$user_id, 'to_user_id'=>$to_user_id, 'subject'=>$subject, 'body'=>$body), 'post');
        return $rs;
    }

    /**
    * 向指定用户发送提醒
    * @parem $to_user_id      用户id
    * @parem $subject         信息标题
    * @parem $body            对目标用户的留言
    * @return bool
    */
    public function send_sys_message( $user_id, $subject, $body,$type=0 )
    {
        $rs = $this->_call_api_method('sendSysMessage', array('user_id'=>$user_id, 'subject'=>$subject, 'body'=>$body), 'post');
        return $rs;
    }

    /**
    * 向服务端发送测试命令
    * @return array
    */
    public function test( $args=array() )
    {
        return $this->_call_api_method('test', $args);
    }


    /**
     * 获得用户的详细信息
     *
     * @parem $user_id
     * return max ( array || false)
     */
    public function get_user_infos($user_id, $type='user_id')
    {
        $user_data = false;
        // 先取cache
        if( MYAPI_MEMCACHE && $type == "user_id" ) {
            $user_data = cache::get(MYAPI_USERINFO_PREFIX, $user_id);
        }

        // 如果不存在cache,或者不是以user_id取的,走接口
        if($user_data === false){
            $user_data = $this->_call_api_method("get.userInfos", array("user"=>$user_id,"type"=>$type));
        }

        return $user_data;
    }

    /**
     * 取得未读信件数量的方法
     * @param <type> $user_id
     * @return <type>  array("notice"=>未读通知数,"inbox"=>未读站内消息数)
     */
    public function get_msg_count($user_id)
    {
        $notice_total = $message_total = false;

        // 先取cache
        if( MYAPI_MEMCACHE ) {
            // echo MYAPI_MESSAGE_PREFIX;
            $notice_total = cache::get(MYAPI_NOTICE_PREFIX, $user_id);
            $message_total = cache::get(MYAPI_MESSAGE_PREFIX, $user_id);
        }

        // $notice_total = $message_total = false;
        if($notice_total === false || $message_total === false){
            $total_array =  $this->_call_api_method("get_msg_total", array("user_id"=>$user_id));
        }
        else{
            $total_array = array("notice"=>array_sum($notice_total),"inbox"=>array_sum($message_total));
        }
        return $total_array;
    }

    /**
     * 获取帐户管理网址,即用户中心网址
     */
    public function get_my_url(){
        return MYAPI_URL_MY;
    }
    /**
    * 获得用户登录网址
    * @parem $ref_url  登录后跳转到的网址
    * @return string
    */
    public function get_login_url($ref_url='')
    {
        return MYAPI_URL_PASSPORT.'/?action=login&goto='.urlencode($ref_url);
    }

    /**
    * 获得用户注销网址
    * @return string
    */
    public function get_login_out_url()
    {
        return MYAPI_URL_PASSPORT.'/?action=logout';
    }

    /**
     * 请求生成一个用户会话
     */
     public function get_sso_session( $data )
     {
         
     }


    // 设置用户在线状态
    public function set_online_status()
    {
        $user_id = $this->get_current_user_id();
        if(!$user_id){
            return false;
        }
        else if(isset($_COOKIE[self::$online_cookie_name])){
            return true;
        }
        else{
            $rs = $this->_call_api_method('set_online', array('user_id'=>$user_id));
            if($rs){
                setcookie(self::$online_cookie_name, 1, time()+self::$online_interval, "/", MYAPI_COOKIE_DOMAIN);
            }
            return true;
        }
    }

     /**
     * 用户是否在登录状态
     * @return boolean
     */
    public static function is_login()
    {
        if(!is_null(self::$is_login))
        {
            return self::$is_login;
        }
        $data = self::get_current_userinfo();
        return self::$is_login;
    }


    /**
     * 获取当前登录的用户信息（COOKIE）
     *
     * @return int
     */
    public static function get_current_user_id()
    {
        if(!is_null(self::$curr_user_id)){
            return self::$curr_user_id;
        }
        $data = self::get_current_userinfo();
        return self::$curr_user_id;
    }


     /**
     * 从cookie中取得当前用户的基本资料,包括用户ID,用户名,email,登录时间
     * 更详细的资料通过cls_my_user::get_one_user取
     */
    public static function get_current_userinfo()
    {
        if(!isset($_COOKIE[self::$cookie_auth])){
            return false;
        }
        // 解密
        $cookie_decode = self::_decrypt($_COOKIE[self::$cookie_auth],self::$_encrypt_key);
        $cookie_data = explode(":", $cookie_decode);
        $md5_str = array_pop($cookie_data);
        // 验证签名
        if(md5(implode(":", $cookie_data).self::$sign_key) != $md5_str){
            self::del_login_cookie();
            return false;
        }
        else{
            self::$curr_user =  array(   "user_id"=>    $cookie_data[0],
                                            "user_name"=>  rawurldecode($cookie_data[1]),
                                            "email"=>      $cookie_data[2],
                                            "last_login"=> $cookie_data[3]);
            self::$curr_user_id = $cookie_data[0];
            self::$is_login = true;

            return self::$curr_user;
         }
    }
    
    /**
    * 把指定的用户id和用户名发送到115 p3p注册的api
    * @parem $back_url    返回网址
    * @parem $data        用户主表的资料
    * @parem $account     用户帐号
    * @parem $save_sta    保存用户登录状态(下次自动登录)
    * @parem $p3p_domain  第三方cookie接收域名
    * @return void
    */
    public function p3p_login($back_url, &$data, $account, $save_sta=true, $p3p_domain='.bazi5.com')
    {
        $this->set_login_cookie($account, $data, $save_sta, $p3p_domain);
        $gurl = $this->_call_api_method('p3pLogin', array('save_sta'=>$save_sta, 'back_url'=>$back_url, 'user_id'=>$data['user_id'], 'account'=>$account));
        return $gurl;
    }

    public function p3p_exit($back_url, $p3p_domain='.bazi5.com')
    {
        $this->del_login_cookie($p3p_domain);
        $gurl = $this->_call_api_method('p3pExit', array('back_url'=>$back_url));
        return $gurl;
    }
    
    /**
     * 按指定的参数注册一个passport_id, 成功后返回uid的数字 
     * @parem $data array('selapp'=>'915', 'user_name'=>, 'password'=>, 'email'=>, 'psp_email'=>'备用email', 'cli_ip'=>, 'sta'=>'email审核状态0|1');
     * @return mix int OR string
     *
     */
     public function register_passport( $data )
     {
        $psp_id = $this->_call_api_method('registerPassport', $data);
        return $psp_id;
     }
    
}
