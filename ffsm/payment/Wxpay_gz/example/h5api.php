<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";



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
$input->SetNotify_url("http://kyw.5988vip.cn/payment/Wxpay_gz/example/h5pay_back.php");//通知地址

$input->SetTrade_type('MWEB');

// 3.获取预支付信息
$order = WxPayApi::unifiedOrder($input);


if($_REQUEST['ac']){
	$ac = $_REQUEST['ac'];
}else{
	$ac = 'bazi';
}

header('Location: '.$order['mweb_url'].'&redirect_url='.urlencode('http://kyw.5988vip.cn/?ac='.$ac.'&oid='.$params['out_trade_no'].'&token='.base64_encode(md5($params['out_trade_no']))));
die;
$payurl = $order['mweb_url'].'&redirect_url='.urlencode('http://kyw.5988vip.cn/?ac='.$ac.'&oid='.$params['out_trade_no'].'&token='.base64_encode(md5($params['out_trade_no'])));

$callbackurl = 'http://kyw.5988vip.cn/?ac='.$ac.'&oid='.$params['out_trade_no'].'&token='.base64_encode(md5($params['out_trade_no']));

?>

<!DOCTYPE html>

<html>

<head>

<title>微信安全支付</title>

<meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=no;" />

<meta name= "format-detection" content= "telephone=no" />

<style type="text/css">

@CHARSET "UTF-8";

.loading_wrap{position:fixed;left:0;top:0;right:0;bottom:0;background:transparent;}
.loading{position:absolute;left:50%;top:50%;margin-left:-45px;margin-top:-45px;width:90px;height:90px;background:url(../image/loading.png) no-repeat;background-size:360px 90px;}
.loading.animate{-webkit-animation:0.6s animate_loading steps(4) infinite;}
@-webkit-keyframes animate_loading{
    0%{background-position:0 50%;}
    100%{background-position:-360px 50%;}
}

@CHARSET "UTF-8";
html {
  font-size: 62.5%;
  -webkit-font-smoothing: antialiased;
}
body {
  text-align: center;
  font-family: "黑体", "Microsoft YaHei", "Helvetica Neue", Helvetica, STHeiTi, sans-serif;
  -webkit-text-size-adjust: none;
}
* {
  margin: 0;
  padding: 0;
  list-style: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

input,textarea,select,button {
  -webkit-appearance: none;
  font-size: 1rem;
  border: 0;
  outline: none;
}
input,a,span,button {
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.pop_wraper{
  position:fixed;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background:rgba(0,0,0,0.5);
  display:table;
  height:100%;
  width:100%;
  z-index:99999;
}
.pop_outer{
  display:table-cell;
  vertical-align:bottom;
}
.pop_midder{vertical-align: middle;}
.pop_tip{background: #fff;border-radius: 6px;margin: 0 3rem;}
.pop_tip_p1{padding: 5.5rem 1.5rem 2.5rem 1.5rem;font-size: 1.6rem;}
.pop_tip_p2{padding: 1.5rem;}

.pop_tip_p3{display: -webkit-box;margin-top: 1.5rem;}
.pop_tip_p3 span{display: block;-webkit-box-flex: 1;width: 1px;}
.p_btn {-webkit-user-select:none;height: 5rem;line-height: 5rem;font-size: 1.7rem;color: #666;width: 100%;background: transparent;}
.cols {color: #5F73C5;}
.p_btn:active{color: #999;background:rgba(0,0,0,0.1);}
.cols:active{color: #243B97;}
.pop_tip_p4{margin: 0 1.5rem;padding: 1.5rem 0 2rem 0;font-size: 2rem;color: #5F73C5;}
.pop_tip_p5{margin: 0 1.5rem;font-size: 1.5rem;color: #000;text-align: left;}
.pop_tip_p5.cent{text-align:center;}
.border{position:relative;}
.border:before{
    content:"";position:absolute;left:0;top:0;right:-100%;bottom:-100%;
    -webkit-transform:scale(0.5);-webkit-transform-origin:0 0;pointer-events:none;
}
.b_full:before{border:1px solid #ddd;}
.b_btm:before{border-bottom:1px solid #ddd;}
.b_lft:before{border-left:1px solid #ddd;}
.b_rgt:before{border-right:1px solid #ddd;}
.b_top:before{border-top:1px solid #ddd;}
.b_top_btm:before{border-top:1px solid #ddd;border-bottom:1px solid #ddd;}

</style>

<script src="/statics/jquery-3.2.1.min.js"></script>


<script type="text/javascript">

function onloadAction(){

//window.location.href="<?=$payurl?>";

}

function doCallback(){

window.location.href="<?=$callbackurl?>";

}

</script>

</head>

<body onload="inquiry()">

<div class="loading_wrap">

<span class="loading animate"></span>

</div>

<div class="pop_wraper" id="alert_box1">

<div class="pop_outer pop_midder">

<div class="pop_tip">

<p class="pop_tip_p4">支付确认</p>

<p class="pop_tip_p5">1、请在微信内完成支付，支付成功页面自动跳转</p>

<p class="pop_tip_p5">2、如果您未支付，请点击“去支付”完成支付</p>

<p class="pop_tip_p5">3、如果您未安装微信6.0.2版本及以上版本客户端，请先安装并登陆微信完成支付</p>

<p class="pop_tip_p3 border b_top">

<span class="border b_rgt"><button class="p_btn" onclick="doCallback()">关闭</button></span>

<span><a id="cli" class="p_btn cols" style="text-decoration: none" target="_blank" href="<?=$payurl?>">去支付</a></span>

</p>

</div>

</div>

</div>

<script>
    var inquiry_lock = 0;
    $(function () {
        setInterval(function () {
            inquiry();
        }, 1000);
    });
    function inquiry() {
        if (inquiry_lock) {
            return;
        }
        $.get('/?ct=pay&ac=scanquery&oid=<?php echo $params['out_trade_no']; ?>', {t: Date.parse(new Date())}, function (data) {
            if (data.status) {
                inquiry = 1;
                //$('div.weixin .green').html('支付成功');
                window.location = data.url;
            }
        }, 'json');
    }
</script>

</body>

</html>
