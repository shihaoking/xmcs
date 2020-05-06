<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>八字综合详批-鑫旺网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/bazizh/wap.min.css?v=0817" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/bazizh/style.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="statics/ffsm/public/js/require/require.min.js" data-main="/statics/ffsm/public/js/common.min.js?v=0817"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">八字综合详批</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div class="order_box_pay">
	<div class="obp_user">
		<img src="/statics/ffsm/bazizh/images/1_img_1.png" alt="大师"/>
		<div class="obp_txt">
			<p class="obp_left">
				<b>郭易申先生</b>
				<span>知名命理学专家</span>
			</p>
			<p class="obp_right">
				<b><{$names.username}>(<{if $names.gender==1}>男<{else}>女<{/if}>)</b>
				<span><{$names.y}>年<{$names.m}>月<{$names.d}>日<{if $names.h>=0}><{$names.h}><{else}>未知<{/if}>时</span>
			</p>
		</div>
	</div>
	<div class="obp_pirce">
		<del>原价：￥168</del><em>&nbsp; &nbsp;&nbsp;<strong style="color:#ff0000;">吉时特价：<span>￥<{$money}></span></strong></em>
<div class="time-item">
	<em>倒计时：</em>
	<em id="hour_show">1小时</em>
	<em id="minute_show">35分</em>
	<em id="second_show">34秒</em>
</div>
		<div class="public_pay_box">
			<{if $sys_pay_type==0 || $sys_pay_type==1 || $sys_pay_type==3}>
			<a class="weixin" target="_self" href="/?ct=pay&ac=go&oid=<{$oid}>&type=1">微信安全支付</a>
          <{/if}>
             <{if  $sys_pay_type==0 || $sys_pay_type==2 || $sys_pay_type==3}>
            <a class="alipay" target="_self" href="/?ct=pay&ac=go&oid=<{$oid}>&type=2">支付宝安全支付</a>
          <{/if}>
            <{if  $sys_pay_type==0 || $sys_pay_type==4}>
          <a class="weixin" target="_self" href="/?ct=pay&ac=pay_go&oid=<{$oid}>&type=wxpay">微信支付</a>
          <a class="alipay" target="_self" href="/?ct=pay&ac=pay_go&oid=<{$oid}>&type=alipay">支付宝支付</a>
              <{/if}>
		</div>
	</div>
	<div style='text-align:center;font-size:14px !important'>
	<span style='color:#ff0000'>付款成功后赠送高级面相教程一套</span><br/>
	<span style='color:#0D8000'>关注微信公众号【鑫旺文化】免费姓名详批</span><br/>
	<span style='color:#0D8000'>长按复制微信号在微信内搜索</span>

	<p>订单编号：<{$oid}></p>
	<div class="obp_tip">
		已有<span>23302574</span>人进行了测算知晓了自己<span>事业财运、婚姻情感</span>的情况，并根据老师建议做出调整，产生显著效果，<span>98.6%</span>用户觉得本测算有帮助！
	</div>
</div>

<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>八字排盘</p><p><img src="/statics/ffsm/bazizh/images/img_lock01.jpg" alt="八字排盘" /></p></div>
<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>命格命卦</p><p><img src="/statics/ffsm/bazizh/images/img_lock02.jpg" alt="八字排盘" /></p></div>
<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>个性分析</p><p><img src="/statics/ffsm/bazizh/images/img_lock03.jpg" alt="八字排盘" /></p></div>
<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>爱情分析</p><p><img src="/statics/ffsm/bazizh/images/img_lock04.jpg" alt="八字排盘" /></p></div>
<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>事业分析</p><p><img src="/statics/ffsm/bazizh/images/img_lock05.jpg" alt="八字排盘" /></p></div>
<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>财运分析</p><p><img src="/statics/ffsm/bazizh/images/img_lock06.jpg" alt="八字排盘" /></p></div>
<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>健康分析</p><p><img src="/statics/ffsm/bazizh/images/img_lock07.jpg" alt="八字排盘" /></p></div>
<div class="box_lock J_payPopupShow"><p class="public_title1"><i></i>生活宝典</p><p><img src="/statics/ffsm/bazizh/images/img_lock08.jpg" alt="八字排盘" /></p></div>
<br/>
<img style="width:99%; height:auto; margin:0 auto; display:block;" src="statics/ffsm/bazizh/images/img_service.jpg" alt="八字排盘" />
<{include file='./ffsm/footers.tpl'}>


<div class="public_pay_popup" id="publicPayPopup">
	<div class="public_pp_box">
		<div class="public_pp_close" id="publicPPClose">
			X
		</div>
		<div class="public_pp_tit">
			解锁查看所有测算结果
		</div>
		<div class="public_pp_price">
			<span>统一鉴定价：</span><strong>￥<{$money}>元</strong>
		</div>
		<div class="public_pay_box">
			<a class="weixin" target="_self" href="/?ct=pay&ac=go&oid=<{$oid}>&type=1">微信安全支付</a>
            <a class="alipay" target="_self" href="/?ct=pay&ac=go&oid=<{$oid}>&type=2">支付宝安全支付</a>
		</div>
	</div>
</div>
<div style=" height: 25px;">
</div>
<div class="public_pay_bottom" id="publicPayBottom">
	<span><i></i>付费解锁所有项</span>
</div>
<script type="text/javascript">
var intDiff = parseInt(5734);//倒计时总秒数量
function timer(intDiff){
	window.setInterval(function(){
	var day=0,
		hour=0,
		minute=0,
		second=0;//时间默认值		
	if(intDiff > 0){
		day = Math.floor(intDiff / (60 * 60 * 24));
		hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
		minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
	}
	if (minute <= 9) minute = '0' + minute;
	if (second <= 9) second = '0' + second;
	$('#day_show').html(day+"天");
	$('#hour_show').html('<s id="h"></s>'+hour+'小时');
	$('#minute_show').html('<s></s>'+minute+'分');
	$('#second_show').html('<s></s>'+second+'秒');
	intDiff--;
	}, 1000);
} 

$(function(){
	timer(intDiff);
});	
</script>
<script>
    //底部悬浮
    ;(function($){
        $.fn.publicPopup=function(opt){
            var pp=$('#publicPayPopup');
            var ppClose=$('#publicPPClose');
            var topShow=$(".J_payBottomShow").length>0?$(".J_payBottomShow").offset().top:200;
            var ppShow=$(".J_payPopupShow").length>0?$(".J_payPopupShow"):'';
            return this.each(function(){
                var $this=$(this);
                $(window).scroll(function(){
                    var wt=$(window).scrollTop();
                    wt>topShow?$this.fadeIn():$this.fadeOut();
                });
                $this.on('click',function(){
                    pp.show();
                });
                ppClose.on('click',function(){
                    pp.hide();
                })
                ppShow?ppShow.on('click',function(){pp.show()}):'';
            });
        };
    })(jQuery);
    $("#publicPayBottom").publicPopup();
//支付后检测跳转
  <{if $yz_pay==1}>
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
        $.get('/?ct=pay&ac=scanquery&oid=<{$oid}>', {t: Date.parse(new Date())}, function (data) {
            if (data.status) {
                inquiry = 1;
                $('div.weixin .green').html('支付成功');
                window.location = data.url;
            }
        }, 'json');
    }
  <{/if}>
</script>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>