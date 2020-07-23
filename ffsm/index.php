<?php
chdir('../');

if($_REQUEST['ct']==''){
$cts = 'ffsm_h5_index';
}
require_once './index.php';
//微信登录
$wx_ac=req::item('ac');
if( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false &&  $_COOKIE["user_name"]=="" && $_COOKIE["usermore"]=="" && $wx_ac!='wxlogin'  && req::item('cl')!=1 ) {

  $app_id = WX_APPID; //公众号appid
  $app_secret = WX_APPSECRET; 
  $redirect_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //授权之后跳转地址
  $wx_code=req::item('code');
  $wx_state=req::item('state');
  if($wx_code && $wx_state=='index'){
    Wechat::user_login($app_id,$app_secret,req::item('code'));
  }else{
    Wechat::get_authorize_url($app_id,$redirect_uri,"index");
  }
}
?>
