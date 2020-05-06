<?php

if (!defined('CORE'))   exit('Request Error!');
class ctl_index {

    /**
     * 主入口
     */
    public function index() {
        $t1 = microtime(true);
        $menu = preg_replace('/,$/', '', mod_admin_menu::parse_menu());
        tpl::assign('menu', $menu); 
        tpl::assign('user', cls_access::$accctl->get_userinfos());
        tpl::display('index.tpl');
        exit();
    }

    /**
     * 用户登录
     */
    public function login() {
		if(req::item('reg', '')==1){
			$this->registered();
		}else{
        $accctl = cls_access::get_instance();
        $rs = 0;
        $errmsg = '';
        $gourl = req::item('gourl', '');
        if (req::item('username', '') != '' && req::item('password', '') != '') {
            try {
                $rs = $accctl->check_user(req::item('username'), req::item('password'));
                if ($rs == 1) {
                    $jumpurl = empty($gourl) ? '?ct=index&ac=index' : $gourl;
                    cls_access::show_message('成功登录', '成功登录，正在重定向你访问的页面', $jumpurl);
                    exit();
                }
            } catch (Exception $e) {
                $errmsg = 'Error：' . $e->getMessage();
            } 
        }
        tpl::assign('gourl', $gourl);
        tpl::assign('errmsg', $errmsg);
        tpl::display('login.tpl');
        exit();
		}
    }
   /**
     * 用户注册
     */
   public function registered() {
    
     	 $gourl = req::item('gourl', '');
		$jumpurl = empty($gourl) ? '?ct=index&ac=login' : $gourl;
		if ( req::item('yzm', '') != $_COOKIE['scode'] ) {
          cls_access::show_message('注册失败', '验证码错误,请重新填写', $jumpurl);	
          exit();
		}
		if ( req::item('password', '')!= '' && req::item('password', '') != req::item('password2', '') ) {
			cls_access::show_message('注册失败', '两次输入的密码不一致，请重新输入', $jumpurl);
				exit();
		}
		
        $accctl = cls_access::get_instance();
        $rs = 0;
        $errmsg = '';
       
         if (req::item('username', '') != '' && req::item('password', '') != '' &&  req::item('password2', '')!= '' && req::item('email', '')!= '' && req::item('nickname', '')!= '' ) {
            try {
				$sql1 = "SELECT * FROM `users` WHERE user_name ='".req::item('username', '')."'";
				$rsid = db::fetch_one(db::query($sql1));
				if($rsid['uid']>=1){
					cls_access::show_message('注册失败', '该账号已注册，请重新输入', $jumpurl);
					exit();
				}
				$info=array('user_name'=>req::item('username', ''),'nickname'=>req::item('nickname', ''),'userpwd'=>md5(req::item('password', '')),'email'=>req::item('email', ''),'pools'=>'admin','groups'=>'admin_test','regtime'=>time(),'dl_tcbl'=>'50');
				$insertid=db::insert('users',$info);
				$jumpurl = empty($gourl) ? '?ct=index&ac=login' : $gourl;
				cls_access::show_message('成功注册', '成功注册，正在跳转登录页面', $jumpurl);
				exit();
                
            } catch (Exception $e) {
                $errmsg = 'Error：' . $e->getMessage();
            } 
        }else{
			cls_access::show_message('注册失败', '填写信息不完整请重新输入', $jumpurl);
			exit();
		}
        tpl::assign('gourl', $gourl);
        tpl::assign('errmsg', $errmsg);
        tpl::display('login.tpl');
        exit();
    }
    

    /**
     * 系统消息
     */
    public function adminmsg() {
        $addjob = req::item('addjob', '');
        if ($addjob == 'del') {
            db::query("Update `users_admin_log` set `isread`=1  where `isalert`=1 ");
            exit('ok');
        } else {
            $row = db::get_one("Select count(*) as dd From `users_admin_log` where `isalert`=1 And `isread`=0 ");
            if (is_array($row) && $row['dd'] > 0) {
                exit($row['dd']);
            } else {
                exit('false');
            }
        }
    }

    /**
     * 退出
     */
    public function loginout() {
        $accctl = cls_access::get_instance();
        $accctl->loginout();
        cls_access::show_message('注销登录', '成功退出登录！', '/acs');
        exit();
    }

}
