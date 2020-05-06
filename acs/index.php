<?php
header('Content-Type: text/html; charset=utf-8');
$page_start_time = microtime(true);

require '../core/init.php';
//die("acs");
$config_pool_name = 'admin';       //应用池参数(与权限管理有关) 
$config_appname   = 'admin';       //应用名称(与模板文件夹有关，不一定与应用池名称一致)


  $config_cp_url = '?ct=index&ac=login';     //用于未登录用户跳转到的url


tpl::assign('URL', URL);
tpl::assign('title', '管理后台');
//加载父类 如果没有用到 可以不用加载
@include_once('./control/common.php');
//前置的权限控制器
$config_access_ctl = cls_access::factory( $config_pool_name, $config_cp_url ); 
$config_access_ctl->test_purview( req::item('ct', 'index'), req::item('ac', 'index'), '1' );

run_controller();


