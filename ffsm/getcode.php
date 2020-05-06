<?php
/**
 * @author: lion
 * @link: http://lionsay.com/codetoany.html
 */
include '../core/wxpaycf.php';
$money = $_GET['money'];
$app = $_GET['app'];
$cashier_id = $_GET['cashier_id'];
$user_id = $_GET['user_id'];
$oid = $_GET['oid'];
require 'library/Authorize.php';

$appId = WX_APPID;
$authorize = new lion\weixin\library\Authorize($appId);
$redirectUrlConfig = [
	'demo1' => 'http://payment.huangoukeji.com/payment/zx/wxpay/payInterface_jsapi_wx/pay.html',
	'demo2' => 'http://payment.huangoukeji.com/payment/zx/wxpay/payInterface_jsapi_wx/pay.php',
	'demo3' => 'http://kyw.5988vip.cn//?ct=pay&ac=wxjsapi&oid='.$oid,
	'demo4' => 'http://payment.huangoukeji.com/?ct=user&ac=uuu&oid='.$money,
	'demo5' => 'market.huangoukeji.com/?ac=openidpush',
];
$authorize->authorizeCodeToUrl($redirectUrlConfig);
