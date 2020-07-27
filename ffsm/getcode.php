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
	'demo1' => 'http://www.mtws.site/payment/zx/wxpay/payInterface_jsapi_wx/pay.html',
	'demo2' => 'http://www.mtws.site/payment/zx/wxpay/payInterface_jsapi_wx/pay.php',
	'demo3' => 'http://www.mtws.site/?ct=pay&ac=wxjsapi&oid='.$oid,
	'demo4' => 'http://www.mtws.site/?ct=user&ac=uuu&oid='.$money,
	'demo5' => 'www.mtws.site/?ac=openidpush',
];
$authorize->authorizeCodeToUrl($redirectUrlConfig);
