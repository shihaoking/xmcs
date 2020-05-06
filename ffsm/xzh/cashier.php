<?php
require 'curl.php';
echo $_COOKIE["openid"];
//access_token	String	是	获取access_token
//tp_order_id	String	是	第三方订单ID,长度不要超过15个字符，注意：以下参数发生变化时请更换该订单ID以保证唯一性
//total_amount	Int	是	商品总价，单位：分
//pay_result_url	String	是	支付结果页跳转地址。支付完成（成功或失败）后，会跳转至该url
//return_data	Object	否	支付完成（成功或失败）后，需要原样回传给支付结果页的参数
//display_data	Object	是	收银台页面 & 订单详情页面顶部，第三方展需要展示的数据内容（左右栏形式）。详细内容参看下面『数据格式Demo』
//deal_title	String	是	商品名称，用于订单详情页
//deal_sub_title	String	是	商品描述，用于订单详情页
//deal_thumb_view	String	是	商品的缩略图Url，用于订单详情页
//oid=201807141603371531555417


$oid="20180714160338";

$moneys="0.01";
$pay_result_url="http://gal.sm.xlibbs.com/?ac=qiming";//返回url
			$payname="起名";//商品标题
			$payinfo="起名";//商品描述
			$payimg="http://gal.sm.xlibbs.com/statics/img/57de106713afa.png";//商品图片
			$cashierurl=MyCurl::pay_xz(client_id,client_secret,$oid,$moneys,$pay_result_url,$payname,$payinfo,$payimg);

print_r($cashierurl);
