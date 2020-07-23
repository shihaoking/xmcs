<?php
include dirname( $_SERVER['DOCUMENT_ROOT']).'/core/wxpaycf.php';

$config = array (
    //应用ID,您的APPID。
    'app_id' => APPID,

    //商户私钥
    //'merchant_private_key' => "GGcpyHnYhipcv2tucb8eNg==",
    'merchant_private_key' => MPK,
    //异步通知地址
    'notify_url' => "http://www.mtws.site/payment/alipay_pc/notify_url.php",

    //同步跳转
    'return_url' => "http://www.mtws.site/payment/alipay_pc/return_url.php",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => APK,
);