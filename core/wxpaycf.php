<?php
/**
 * 框架核心入口文件
 *
 * 环境检查，核心文件加载
 *
 * @author itprato<2500875@qq>
 * @version $Id$  
 */

//核心库目录
define('CORE', dirname(__FILE__));
require CORE.'/../config/inc_config.php';

//加载核心类库
require CORE.'/util.php';
require CORE.'/db.php';
$sys_all=@db::fetch_all(@db::query('SELECT * FROM `system`'));
foreach($sys_all as $key=>$sys_vel){
    if($sys_vel['name']=='wx_appid'){
      define('WX_APPID', $sys_vel['config']);
    }
   if($sys_vel['name']=='wx_appsecret'){
      define('WX_APPSECRET', $sys_vel['config']);
    }
   if($sys_vel['name']=='wx_mchid'){
      define('WX_MCHID', $sys_vel['config']);
    }
   if($sys_vel['name']=='wx_key'){
      define('WX_KEY', $sys_vel['config']);
    }
   if($sys_vel['name']=='app_id'){
      define('APPID', $sys_vel['config']);
    }
   if($sys_vel['name']=='merchant_private_key'){
      define('MPK', $sys_vel['config']);
    }
   if($sys_vel['name']=='alipay_public_key'){
      define('APK', $sys_vel['config']);
    }
  if($sys_vel['name']=='yzf_apiurl'){
      define('yzf_apiurl', $sys_vel['config']);
    }
  if($sys_vel['name']=='yzf_partner'){
      define('yzf_partner', $sys_vel['config']);
    }
  if($sys_vel['name']=='yzf_key'){
      define('yzf_key', $sys_vel['config']);
    }
  if($sys_vel['name']=='paypal'){
      define('PAYPAL', $sys_vel['config']);
    }
  if($sys_vel['name']=='smurl'){
      define('SMURL', $sys_vel['config']);
    }

}

