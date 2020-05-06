<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';


if($_REQUEST['WIDout_trade_no'] && $_REQUEST['WIDtotal_amount'] && $_REQUEST['WIDbody']){

}else{
    die;
}

$params = array(
    'body' => $_REQUEST['WIDbody'],
    'out_trade_no' => $_REQUEST['WIDout_trade_no'],
    'total_fee' => $_REQUEST['WIDtotal_amount']*100,
	//'total_fee' => 1,
);

//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
 $notify = new NativePay();
 
$input = new WxPayUnifiedOrder();
$input->SetBody($params['body']);
$input->SetAttach($params['body']);
$input->SetOut_trade_no($params['out_trade_no']);
$input->SetTotal_fee($params['total_fee']);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag($params['body']);
$input->SetNotify_url("http://kyw.5988vip.cn/payment/Wxpay_gz/example/native_callback.php");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id("123456789");
$result = $notify->GetPayUrl($input);
$url2 = $result["code_url"];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>微信扫描支付、查看<?php echo $_REQUEST['WIDbody'];?>结果</title>
    <script src="/statics/jquery-3.2.1.min.js"></script>
</head>
<body>


<style type="text/css">
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, 
strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, 
tfoot, thead, tr, th, td ,textarea { margin:0; padding:0;  }
body{font: 14px/1.5 'Microsoft YaHei';}
.box{ width: 100%; overflow: hidden;}
.box_infor{ padding: 20px; border-top:3px solid #0188ca; background-color: #f8f8f8; border-bottom: 1px solid #d7d7d7}
.box_content{ overflow: hidden; background-color: #fff; margin-bottom: 50px; }
.box_content .green_words{ color: #008000; font-weight: 700; font-size: 22px; margin: 20px  }
.bc_c{ overflow: hidden; }
.bc_c_list{ float: left; width: 50%;*width: 49%;  }
.bc_c_list .img_tel{ width: 197px; text-align: center; margin-right: 140px; float: right; }
.bc_c .pic img{ display: block; width: 100%; margin: 0 auto; width: 197px; height: 281px; }
.bc_c .weixin{ width:300px; text-align: center; margin:50px 0 0 108px;}
.bc_c .weixin img{ display: block; width:165px; height: 165px; margin: 0 auto;  }
.bc_c .weixin .price{ color: #ff6600;margin: 5px 0}
.bc_c .weixin .price span{ font-size: 18px; font-weight: 700 }
.bc_c .weixin .green{ color: #008000 }
</style>


<div class="box">
<div class="box_infor">
<div><span>订单名称：</span><?=$_REQUEST['WIDbody']?></div>
<div><span>应付金额：</span><span class="price"><?=$_REQUEST['WIDtotal_amount']?></span>元</div>
<div><span>订单编号：</span><?=$_REQUEST['WIDout_trade_no']?></div>
</div>
<div class="box_content">
<p class="green_words">微信支付</p>
<div class="bc_c">
<div class="bc_c_list">
<div class="img_tel"><p class="pic"><img src="http://kyw.5988vip.cn/m/tu/weixinyindao.jpg" class="引导图片"></p><p class="words">打开手机微信，在“发现”菜单中点击“扫一扫”</p></div>
</div>
<div class="bc_c_list">
<div class="weixin"><p></p>
<div id="code"><img src="http://kyw.5988vip.cn/payment/Wxpay_gz/example/qrcode.php?data=<?php echo urlencode($url2);?>"></div>
<p></p>
<p class="price">￥<span><?php echo ($params['total_fee']/100);?></span>元</p>
<p class="green"><?php echo $_REQUEST['WIDbody'];?>、付款后查看测算结果</p></div>
</div>
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
                $('div.weixin .green').html('支付成功');
                window.location = data.url;
            }
        }, 'json');
    }
</script>
	
</body>
</html>