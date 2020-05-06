<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 用户管理
 *
 * @version $Id$
 */
class ctl_system
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
        global $config;
        require(PATH_CONFIG.'/inc_groups_name.php');
        $even = req::item('even', '');
        $acc_ctl = cls_access::get_instance();

        //修改具体组
        if( $even == '' )
        {
			$sys_all=db::fetch_all(db::query('SELECT * FROM `system` where `class`=0'));
           tpl::assign('sys_all', $sys_all);
          tpl::assign('ac_url', "index");
        }
        //保存修改
        else if( $even == 'saveedit' )
        {
            
            $sys_config = req::item('sys', '');
			$sys_vl ="";
			$k=0;
			foreach($sys_config as $key=>$sys_vel){
				if($k>=1){
					$sys_vl.=",";
				}
				$sys_vl.="('".$key."', '".$sys_vel[0]."','".$sys_vel[1]."','".$sys_vel[2]."')";
				$k++;
			}
            db::query("Replace Into `system` (`name`, `config`,`title`,`class`) VALUES ".$sys_vl);
            cls_msgbox::show('系统提示', '保存成功！', '?ct=system&ac=index');
            exit();
        }
        tpl::display('system.tpl');
        exit();
    }
   public function index_m()
    {
        global $config;
        require(PATH_CONFIG.'/inc_groups_name.php');
        $even = req::item('even', '');
        $acc_ctl = cls_access::get_instance();
		
        //修改具体组
        if( $even == '' )
        {
			$sys_all=db::fetch_all(db::query('SELECT * FROM `system` where `class`=1'));
           tpl::assign('sys_all', $sys_all);
          tpl::assign('ac_url', "index_m");
        }
        //保存修改
        else if( $even == 'saveedit' )
        {
            
            $sys_config = req::item('sys', '');
			$sys_vl ="";
			$k=0;
			foreach($sys_config as $key=>$sys_vel){
				if($k>=1){
					$sys_vl.=",";
				}
				$sys_vl.="('".$key."', '".$sys_vel[0]."','".$sys_vel[1]."','".$sys_vel[2]."')";
				$k++;
			}
            db::query("Replace Into `system` (`name`, `config`,`title`,`class`) VALUES ".$sys_vl);
            cls_msgbox::show('系统提示', '保存成功！', '?ct=system&ac=index_m');
            exit();
        }
        tpl::display('system.tpl');
        exit();
    }


    
}
