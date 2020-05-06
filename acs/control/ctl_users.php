<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 用户管理
 *
 * @version $Id$
 */
class ctl_users
{
   
   /**
    * 控制器的构造函数(可放一些全局初始化东西)
    * @return void
    */
    public function __construct()
    {
        tpl::assign('cfg_groups', cls_access::$cfg_groups); //用户权限配置文件读取的数据：取得users_purview_config表中purview_xml字段值,并转化为php数组
    }
   
   /**
    * 管理员帐号管理
    */
    public function index()
    {
        $showtype = req::item('show', 'all');
        
      if(req::item('uid_s')>0){
        $sch_uid=" and  `uid`='".req::item('uid_s')."'";
        tpl::assign('sch_uid',req::item('uid_s')); 
      }
      if(req::item('sd_uid')>0){
        $sd_uid=" and  `sd_uid`='".req::item('sd_uid')."'";
        tpl::assign('sd_uid',req::item('sd_uid')); 
      }
      if(req::item('sch_user_name')){
        $sql_user_name=" and  `user_name`='".req::item('sch_user_name')."'";
        tpl::assign('sch_user_name',req::item('sch_user_name')); 
      }
      if(req::item('sch_phone')){
        $sql_sch_phone=" and  `phone`='".req::item('sch_phone')."'";
        tpl::assign('sch_phone',req::item('sch_phone')); 
      }
        $tb = cls_lurd_control::factory('users'); //把表名映射成类的工厂方法
        $tb->form_url = '?ct=users'; //默认控制器地址
        $tb->add_search_condition(" `pools`='admin' ". $sch_uid.$sd_uid.$sql_user_name.$sql_sch_phone); //追加手动查询条件
        
        $gp = req::item('gp', ''); //用户组
        if( $gp != '' )
        {
            $tb->add_search_condition(" `groups` like '%{$gp}%' ");  //追加手动查询条件
            $tb->form_url .= '&gp='.$gp;
        }
        $tb->list_config['searchfield'] = 'user_name,email'; //设置查询条件
        //用户上次登录时间、IP信息
        
        $even = req::item('even', '');//'事件':用户'添加'、'修改'、'删除'？
        if( $even=='edit') //"编辑"
        {
            $last_login = cls_access::get_login_infos( req::item('uid',0) ); //获得用户上次登录时间和ip
            tpl::assign('last_login', $last_login );
        }
        
        //修改用户资料事件前处理
        else if( $even=='saveedit' )
        {
            if(req::item('userpwd') != '') //如果密码不为空
            {
                req::$forms['userpwd'] = md5(req::$forms['userpwd']);
            } else {
                unset(req::$forms['userpwd']);
            }
            //保存附表数据
            if(empty(req::$forms['groups']))//如果用户组为空
            {
                req::$forms['groups'] = 'member_pub'; //普通会员
            } else {
                $gp = join(',', req::$forms['groups']); //admin_admin
                req::$forms['groups'] = $gp;
            }
            $uid = intval(req::item('uid', 0));
            //cls_access::del_cache($uid);
            cls_access::save_log(cls_access::$accctl->fields['user_name'], "修改了管理员 ".req::item('uid')." 的密码！"); //保存管理日志
        }
        
        
        //保存新增用户事件前处理
        else if($even=='saveadd' )
        {
            req::$forms['pools'] = 'admin';
            if(empty(req::$forms['groups']))
            {
                req::$forms['groups'] = 'admin_test';
            } else {
                $gp = join(',', req::$forms['groups']);
                req::$forms['groups'] = $gp;
            }
            $user_name = req::item('user_name');
            $row = $tb->get_one(" where `user_name`='{$user_name}' ");
            if( is_array($row['data'][0]) )
            {
                cls_msgbox::show('系统提示', '用户名已经存在！', '-1');
                exit();
            }
            if( req::$forms['userpwd']=='' )
            {
                cls_msgbox::show('系统提示', '用户密码不能为空！', '-1');
                exit();
            }
            req::$forms['userpwd'] = md5(req::$forms['userpwd']);
            $tb->end_need_done = true;
            cls_access::save_log(cls_access::$accctl->fields['user_name'], "增加了一个管理员");
        }
        //删除用户前处理
        else if( $even=='delete' )
        {
            //db::query("Delete From `users_details` where `uid`='".req::item('uid', 0)."'");
            cls_access::save_log(cls_access::$accctl->fields['user_name'], "执行了一次删除管理员操作");
        }
        

        //自动化操作
        $tb->bind_type('logintime', 'TIMESTAMP'); //强制指定字段为其它类型(通常是用于处理用int类型表示时间的情况，可以指定为TIMESTAMP)
        $tb->set_tplfiles('users.index.tpl', 'users.add.tpl', 'users.edit.tpl'); //手工指定生成的模板名 $tpl_files:array('list'=>'', 'add'=>'', 'edit'=>'');
        /*
         * print_r(req::$forms);
         * 如点击了"修改"：Array ( [ct] => users [ac] => index [even] => edit [tb] => users [uid] => 1 ) 
         * 如点击了"添加"：Array ( [ct] => users [ac] => index [even] => add [tb] => users ) 
         * */
        $tb->listen(req::$forms);
        
        //后处理程序（必须设置参数 end_need_done = true 才能操作，否则lurd控制器完成后会直接exit）
        if( $even=='saveadd' )
        {
            req::$forms['uid'] = $tb->insert_id();
            //req::$forms['birthday'] = '0000-00-00';
            if( req::$forms['uid'] > 0 )
            {
                //$tb->insert( req::$forms, 'users_details' );
                cls_msgbox::show('', '成功增加一条记录！', '-1');
                exit();
            }
            else
            {
                cls_msgbox::show('', '成功增加用户失败，可能用户名已经存在！', '-1');
                exit();
            }
        }

        exit();
    }


   /**
    * 对修改用户自己的密码使用单独事件
    */
    public function editpwd()
    {
        $tb = cls_lurd_control::factory('users');

        req::$forms['uid'] = cls_access::$accctl->uid;
        
        $last_login = cls_access::get_login_infos( cls_access::$accctl->uid );
        tpl::assign('last_login', $last_login );

        req::$forms['even'] = req::item('even', '') != 'saveedit' ? 'edit' : 'saveedit';

        if( req::$forms['even'] == 'saveedit')
        {
            if(req::item('userpwd') != '')
            {
                req::$forms['userpwd'] = md5(req::$forms['userpwd']);
            } else {
                cls_msgbox::show('系统提示', '你没进行任何操作！', '-1');
                exit();
            }
        }

        //自动化操作
        $tb->bind_type('logintime', 'TIMESTAMP');
        $tb->set_tplfiles('', '', 'users.edit.me.tpl');
        $tb->listen(req::$forms);

        exit();
    }
    
   /**
    * 设置具体用户的权限
    */
    public function user_purview()
    {
        global $config;
        require(PATH_CONFIG.'/inc_groups_name.php');
        $even = req::item('even', '');
        $uid  = intval(req::item('uid', 0));
        //显示用户原有权限
        if( $even == '' )
        {
            $fields = db::get_one("Select * From `users` where `uid`='{$uid}' ");
            $groups = cls_access_cfg::get_acc_groups($fields['uid'], 'admin', $fields['groups']);
            tpl::assign('users', $fields);
            tpl::assign('groups', $groups);
            tpl::assign('config_apps', $config['apps']);
            tpl::assign('user_name', $fields['user_name']);
            tpl::assign('uid', $fields['uid']);
            tpl::assign('gp', $fields['groups']);
        }
        //保存修改
        else if( $even == 'saveedit' )
        {
            $groups = req::item('groups', '');
            $gp     = req::item('gp', '');
            $gstr   = join(',', $groups);
            cls_access::del_cache($uid);
            db::query("Replace Into `users_purview`(`uid`, `purviews`) Values('{$uid}', '{$gstr}'); ");
            cls_msgbox::show('系统提示', '成功指定用户的独立权限！', '?ct=users&ac=index&gp='.$gp);
            exit();
        }
        tpl::assign('cfg_groups', cls_access::$cfg_groups['pools']['admin']);
        tpl::display('users.purview.tpl');
        exit();
    }
    
   /**
    * 当前用户登录后列出它的权限
    */
    public function mypurview()
    {
        global $config;
        require(PATH_CONFIG.'/inc_groups_name.php');
        $acc_ctl = cls_access::get_instance();
      	$sql1 = "SELECT * FROM `users` WHERE uid ='".$acc_ctl->fields['uid']."'";
		$rsid = db::fetch_one(db::query($sql1));
        $groups = cls_access_cfg::get_acc_groups($acc_ctl->fields['uid'], 'admin', $acc_ctl->fields['groups']);
     
        tpl::assign('users',$rsid);
        tpl::assign('groups', $groups);
        tpl::assign('config_apps', $config['apps']);
        tpl::display('users.mypurview.tpl');
        exit();
    }

   /**
    * 修改组权限
    */
    public function edit_purview_groups()
    {
        global $config;
        require(PATH_CONFIG.'/inc_groups_name.php');
        $even = req::item('even', '');
        $gp = req::item('group', '');
        $acc_ctl = cls_access::get_instance();
        if( $gp != '')
        {
            list($poolname, $gp) = explode('_', $gp);
        }
        tpl::assign('group_name', '所有组');
        //修改具体组
        if( $even == 'edit' )
        {
            tpl::assign('group_name', cls_access::$cfg_groups['pools'][$poolname]['private'][$gp]['name']);
            tpl::assign('config_apps', $config['apps']);
            tpl::assign('cfg_groups', cls_access::$cfg_groups);
            tpl::assign('groups', cls_access::$cfg_groups['pools'][$poolname]['private'][$gp]);
            //print_r( cls_access::$cfg_groups['pools'][$poolname]['private'][$gp] );
        }
        //保存修改
        else if( $even == 'saveedit' )
        {
            
            $groups = req::item('groups', '');
            $gstr = join(',', $groups);
            
            $groups = cls_access_cfg::str_gps($gstr);
            cls_access::$cfg_groups['pools'][$poolname]['private'][$gp]['allow'] = $groups;
            
            $new_config = cls_access_cfg::save_group_config( cls_access::$cfg_groups );
            
            cls_msgbox::show('系统提示', '成功修改指定的组权限！', '?ct=users&ac=edit_purview_groups&even=edit&group='.$poolname.'_'.$gp);
            exit();
        }
        tpl::assign('access_groups', cls_access::$cfg_groups);
        tpl::display('users.edit_purview_groups.tpl');
        exit();
    }


   /**
    * 操作日志
    */
    public function log()
    {
        $tb = cls_lurd_control::factory('users_admin_log');
        $tb->list_config['searchfield'] = "accounts,operate_msg";
        $tb->list_config['orderquery'] = " order by id desc ";
        $tb->form_url = '?ct=users&ac=log';
        $tb->set_tplfiles('users.log.tpl', '', '');
        $tb->listen(req::$forms);
        exit();
    }
    
    /**
    * 登录日志
    */
    public function login_log()
    {
        $tb = cls_lurd_control::factory('users_login_history');
        $tb->list_config['searchfield'] = "user_name,loginip";
        $tb->list_config['orderquery'] = " order by autoid desc ";
        $tb->form_url = '?ct=users&ac=login_log';
        $tb->set_tplfiles('users.login_log.tpl', '', 'users.login_log.edit.tpl');
        $tb->listen(req::$forms);
        exit();
    }
    
   /**
    * 清空旧的登录日志
    */
    public function del_old_login_log()
    {
        $log_name = 'login-log-'.date('Y-m', time());
        $three_mo = time() - (3600 * 24 * 90);
        $rs = db::query("Select * From `users_login_history` where `logintime` < {$three_mo} ");
        $tmp = '';
        $i = $n = 0;
        $fp = fopen($log_file, 'a');
        while( $row = db::fetch_one($rs) )
        {
            $i++;
            $n++;
            if( $i > 200 )
            {
                log::add($log_name, $tmp);
                log::save();
                $tmp = '';
                $i = 0;
            } else {
                $tmp .= $row['autoid']."\t".$row['uid']."\t".$row['accounts']."\t".$row['loginip']."\t".date('Y-m-d H:i:s', $row['logintime'])."\t".$row['pools']."\t".$row['loginsta']."\n";
            }
        }
        if( $tmp != '' )
        {
            log::add($log_name, $tmp);
            log::save();
        }
        fclose($fp);
        db::query("Delete From `users_login_history` where `logintime` < {$three_mo} ", true);
        cls_msgbox::show('系统提示', "成功清理 {$n} 条旧登录日志！", '?ct=users&ac=login_log');
        exit();
    }
    
   /**
    * 登录IP限制
    */
    public function iplimit()
    {
        $ips = req::item('ips', '');
        if( empty($ips) )
        {
            $ips = cls_access_cfg::get_config( 'ip_limit' );
            tpl::assign('ips', $ips);
            tpl::display('users.iplimit.tpl');
        }
        else
        {
            cls_access_cfg::save_config('ip_limit', $ips);
            cls_msgbox::show('系统提示', '成功修改IP限制配置', '?ct=users&ac=iplimit');
        }
    }
    
   /**
    * 全局权限xml配置
    */
    public function edit_purview_xml()
    {
        $purview_xml = req::item('purview_xml', '');
        if( empty($purview_xml) )
        {
            $purview_xml = cls_access_cfg::get_config( 'purview_xml' );
            tpl::assign('purview_xml', $purview_xml);
            tpl::display('users.edit_purview_xml.tpl');
        }
        else
        {
            cls_access_cfg::save_config('purview_xml', $purview_xml);
            cls_msgbox::show('系统提示', '成功修改权限xml配置', '?ct=users&ac=edit_purview_xml');
        }
    }
    
}
