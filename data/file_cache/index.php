<?php
/*
$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
$is_pc = (strpos($agent, 'windows nt')) ? true : false;
$is_mac = (strpos($agent, 'mac os')) ? true : false;
$is_iphone = (strpos($agent, 'iphone')) ? true : false;
$is_iphone = (strpos($agent, 'android')) ? true : false;
$is_ipad = (strpos($agent, 'ipad')) ? true : false;
if($is_iphone==true && $_SERVER['HTTP_HOST']!='m.ss230.com'){
	header('Location: http://m.ss230.com'.$_SERVER['REQUEST_URI']);
    exit;
}
*/

if(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){
	if($_SERVER['HTTP_HOST']=='www.kaiy8.com'){
		header('Location: http://m.www.kaiy8.com'.$_SERVER['REQUEST_URI']);
    	exit;
	}
}


header('Content-Type: text/html; charset=utf-8');
$page_start_time = microtime(true); //程序开始执行时间
require './core/init.php';

/*
 * core是框架核心存放目录
 * Ylmf-PHP框架的入口点都是加载 init.php来初始化的
 * */


$config_pool_name = $config_appname  =  $config_cp_url = '';

/*
 * $config_pool_name:应用池参数(与权限管理有关)
 * $config_appname:应用名称(与模板文件夹有关，不一定与应用池名称一致)
 * $config_cp_url:用于未登录用户跳转到的url
 * */
 echo "1111".$cts;
if ($cts=='h5_index')
{
	req::$forms['ct'] = 'h5_index';

}

if ($cts=='ffsm_index')
{
    req::$forms['ct'] = 'ffsm_index';

}

if ($cts=='ffsm_h5_index')
{
    req::$forms['ct'] = 'ffsm_h5_index';

}



run_controller();

/*
 * 实例化control
 * 调用control->method();
 * */