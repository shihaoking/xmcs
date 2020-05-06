<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
//require_once "../lib/WxPay.Api.php";
require_once '../lib/WxPay.Data.php';
define('CORE', dirname(__FILE__));
require_once '../../../../config/inc_config.php';




//require_once "WxPay.JsApiPay.php";
//require_once 'log.php';

//初始化日志
//$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
//$log = Log::Init($logHandler, 15);

/**
 * 微信H5支付成功回调方法
 */

    //获取通知的数据
    $xml = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");//$GLOBALS['HTTP_RAW_POST_DATA'];
//        $xml = '<xml>
//              <appid><![CDATA[wx2421b1c4370ec43b]]></appid>
//              <attach><![CDATA[支付测试]]></attach>
//              <bank_type><![CDATA[CFT]]></bank_type>
//              <fee_type><![CDATA[CNY]]></fee_type>
//              <is_subscribe><![CDATA[Y]]></is_subscribe>
//              <mch_id><![CDATA[10000100]]></mch_id>
//              <nonce_str><![CDATA[5d2b6c2a8db53831f7eda20af46e531c]]></nonce_str>
//              <openid><![CDATA[oUpF8uMEb4qRXf22hE3X68TekukE]]></openid>
//              <out_trade_no><![CDATA[NO12017091417280130]]></out_trade_no>
//              <result_code><![CDATA[SUCCESS]]></result_code>
//              <return_code><![CDATA[SUCCESS]]></return_code>
//              <sign><![CDATA[B552ED6B279343CB493C5DD0D78AB241]]></sign>
//              <sub_mch_id><![CDATA[10000100]]></sub_mch_id>
//              <time_end><![CDATA[20140903131540]]></time_end>
//              <total_fee>3000</total_fee>
//              <trade_type><![CDATA[JSAPI]]></trade_type>
//              <transaction_id><![CDATA[1004400740201409030005092168]]></transaction_id>
//            </xml>';
    //如果返回成功则验证签名
	if(!$xml){
		die('null');
	}

        $result = WxPayResults::Init($xml);
		
		file_put_contents('result.txt',json_encode($result));


        mysql_connect($GLOBALS['config']['db']['host']['master'],$GLOBALS['config']['db']['user'],$GLOBALS['config']['db']['pass']);
        mysql_select_db($GLOBALS['config']['db']['name']);

        mysql_query('set names utf8');

        $oid = $result['out_trade_no'];
        if($result['return_code']=='SUCCESS'){

            $sql = 'UPDATE `ffsm_orders` SET `status` = "1",`paytype`="1" WHERE `oid` = "'.$oid.'"';
            mysql_query($sql);
            file_put_contents('2.txt',1);

        }

