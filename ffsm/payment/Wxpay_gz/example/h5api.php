<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once '../../../../config/inc_config.php';



require_once "WxPay.JsApiPay.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//①、获取用户openid
$tools = new JsApiPay();
//$openId = $tools->GetOpenid();


/*
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("test");
$input->SetAttach("test");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee("1");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */


if($_REQUEST['WIDout_trade_no'] && $_REQUEST['WIDtotal_amount'] && $_REQUEST['WIDbody']){

}else{
    die;
}

$params = array(
    'body' => $_REQUEST['WIDbody'],
    'out_trade_no' => $_REQUEST['WIDout_trade_no'],
    'total_fee' => $_REQUEST['WIDtotal_amount']*100,
);

$input  = new WxPayUnifiedOrder();
$input->SetBody($params['body']);
$input->SetOut_trade_no($params['out_trade_no']);
$input->SetTotal_fee($params['total_fee']);
// $input->SetGoods_tag("test");
$input->SetNotify_url(URL."payment/Wxpay_gz/example/h5pay_back.php");//通知地址

$input->SetTrade_type('MWEB');

// 3.获取预支付信息
$order = WxPayApi::unifiedOrder($input);


if($_REQUEST['ac']){
	$ac = $_REQUEST['ac'];
}else{
	$ac = 'bazi';
}

header('Location: '.$order['mweb_url'].'&redirect_url='.urlencode(URL.'?ac=' .$ac.'&oid='.$params['out_trade_no'].'&token='.base64_encode(md5($params['out_trade_no']))));
die;