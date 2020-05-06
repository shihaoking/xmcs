<?php
/* *
 * 功能：支付宝页面跳转同步通知页面
 * 版本：2.0
 * 修改日期：2016-11-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 */
require_once("config.php");
require_once 'wappay/service/AlipayTradeService.php';

$arr=$_GET;
$alipaySevice = new AlipayTradeService($config); 
$result = $alipaySevice->check($arr);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/

//http://sm.kaiy8.com/payment/alipay_wap/return_url.php?total_amount=0.01&timestamp=2017-10-27+18%3A08%3A42&sign=Qd9q%2FYNPgC0ovllThYuAnPy0Hrhso%2BRqyHOvZ9DgfafeGZbd%2BHnE5%2FKXihy0haTu02yfGecI2fdXeWz3ci%2B%2FZiPOFNpHK4kmsROsIflTxCNxiMd3coe%2F4hIazpXl8PLP7WQ5SBojXlub2NouGs1uNT9mO34%2ByqoNGlGrKVFNdKgmmTtVmpc%2F5dW0ahk%2BXEcJ%2Fig%2Fesenb9E1LAPZK1q4yCdvmPZn%2BnxwCW0qJ3gjEcSBoTgaRcYC7lQlzAvhkJrdLM8ChlRailUCJ4Kn6ByBCjHvZcuuxfgJ%2BBZ9FPAAMY0hUpD%2F2I1heOW%2Bc6a3NL2QTzfqXWs7tV%2FmHO2MP99y%2Fg%3D%3D&trade_no=2017102721001004850237952579&sign_type=RSA2&auth_app_id=2017102009404961&charset=UTF-8&seller_id=2088302985184613&method=alipay.trade.wap.pay.return&app_id=2017102009404961&out_trade_no=201710271808201509098900&version=1.0
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//支付宝交易号

	$trade_no = htmlspecialchars($_GET['trade_no']);


	$orders = array('out_trade_no'=>$out_trade_no,'trade_no'=>$trade_no);
	$gourl = 'http://kyw.5988vip.cn/?ct=pay&ac=notify&'.http_build_query($orders);

	header("Location:$gourl");
	die;
		
	echo "验证成功<br />外部订单号：".$out_trade_no;

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
	
	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//支付宝交易号

	$trade_no = htmlspecialchars($_GET['trade_no']);


	$orders = array('out_trade_no'=>$out_trade_no,'trade_no'=>$trade_no);
	$gourl = 'http://kyw.5988vip.cn/?ct=pay&ac=notify&'.http_build_query($orders);

	header("Location:$gourl");
	die;
    //验证失败
    echo "验证失败";
}
?>
<title>支付宝手机网站支付接口</title>
	</head>
    <body>
    </body>
</html>