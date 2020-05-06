<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title><{$names.username}>的八字综合详批-鑫旺网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/pc/wap.min.css?v=0817" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/pc/style.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="statics/ffsm/public/js/require/require.min.js" data-main="/statics/ffsm/public/js/common.min.js?v=0817"></script>
</head>
<body>
<header class="public_header">
<a class="public_h_home" href="/"><img src="/statics/ffsm/pc/image/logo.png" alt="在线算命" /></a><a href="?ac=history" class="public_h_menu">订单历史记录</a>
</header>
<div class="order_banner"></div>
<div class="main w960">
<div class="calculation_result_top">
	<div class="crt_content">
		<span>订单编号：<{$oid}></span>
	</div>
</div>
<div class="calculation_result_content J_yifu">
	<div class="obp_user">
		<img src="/statics/ffsm/pc/image/2.gif" alt="郭易申大师"/>
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
		<div>
			<a href="javascript:;" class="public_btn J_payPopupShow">立即解锁</a>
		</div>
	</div>
	<div style='text-align:center;font-size:16px !important;line-height: 2;'>
	<span style='color:#ff0000'>付款成功后赠送高级面相教程一套</span><br/>
	<div class="obp_tip">
		已有<span>23302574</span>人进行了测算知晓了自己<span>事业财运、婚姻情感</span>的情况，并根据老师建议做出调整，产生显著效果，<span>96.8%</span>用户觉得本测算有帮助！
	</div>
</div>
<div class="J_payPopupShow">
	<div class="public_title1">
		<span class="left"></span>
		<span class="right"></span>
		<span>你的性格分析</span>
	</div>
	<div class="crc_lock">
		<div class="public_lock">
			<div class="public_lock_title pl_title">
				<i class="left"></i><span class="fb"><{$names.username}>您出生于<{$names.y}>年<{$names.m}>月<{$names.d}>日<{if $names.h}><{$names.h}><{else}>未知<{/if}>时，五行生肖为：狗</span><i class="right"></i>
			</div>
			<p><img src="/statics/ffsm/pc/image/img_lock01.jpg" /></p>
		</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">您的性格优缺点</span><i class="right"></i>
	</div>
	</div>
	<div class="public_title1">
		<span class="left"></span>
		<span class="right"></span>
		<span>您的财运分析</span>
	</div>
	<div class="crc_lock">
		<div class="public_lock">
			<p><img src="/statics/ffsm/pc/image/img_lock02.jpg" /></p>
		</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">先天财运</span><i class="right"></i>
	</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">注意事项</span><i class="right"></i>
	</div>
	</div>
	<div class="public_title1">
		<span class="left"></span>
		<span class="right"></span>
		<span>给您的爱情建议</span>
	</div>
	<div class="crc_lock">
		<div class="public_lock">
			<p><img src="/statics/ffsm/pc/image/img_lock03.jpg" /></p>
		</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">您命带多少桃花</span><i class="right"></i>
	</div>
	</div>
	<div class="public_title1">
		<span class="left"></span>
		<span class="right"></span>
		<span>给您的健康建议</span>
	</div>
	<div class="crc_lock">
		<div class="public_lock">
			<p><img src="/statics/ffsm/pc/image/img_lock04.jpg" /></p>
		</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">生活起居</span><i class="right"></i>
	</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">饮食调节</span><i class="right"></i>
	</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">保健膳食</span><i class="right"></i>
	</div>
	</div>
	<div class="public_title1">
		<span class="left"></span>
		<span class="right"></span>
		<span>您的事业成就</span>
	</div>
	<div class="crc_lock">
		<div class="public_lock">
			<p><img src="/statics/ffsm/pc/image/img_lock05.jpg" /></p>
		</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">符合你五行喜忌的行业有</span><i class="right"></i>
	</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">有利的事业方向</span><i class="right"></i>
	</div>
	<div class="public_lock_title">
		<i class="left"></i><span class="fb">三合贵人</span><i class="right"></i>
	</div>
	</div>
	<div class="public_title1">
		<span class="left"></span>
		<span class="right"></span>
		<span>您的2020庚子年运势</span>
	</div>
	<div class="crc_lock">
		<div class="public_lock">
			<p><img src="/statics/ffsm/pc/image/img_lock06.jpg" /></p>
		</div>
	</div>
<div class="crc_bottom">
	<img src="/statics/ffsm/pc/image/bg_wf_bottom1.jpg" />
	<div class="public_price_info">
	<p class="discount">优惠价：<span class="fb">￥<{$money}></span></p>
	<p class="original">原价：¥168.00</p>
	<a href="javascript:;" class="public_btn J_payPopupShow">立即解锁</a>
	<p class="public_have">已有<span>23302574</span>人参与 准确率高达<span>96.8%</span></p>
	</div>
</div>
</div>
</div>
<p class="public_shadow_bottom"></p>
<div class="public_footer">
<p>鑫旺网</p>
<p>鑫旺网络科技有限公司</p>
<p>地址：安徽亳州</p>
<p>联系我们：admin@090h.com</p>
</div>
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
		<p>订单编号：<{$oid}></p>
	</div>
</div>
<div style=" height: 25px;">
</div>
<div class="public_pay_bottom" id="publicPayBottom">
	<span>付费解锁所有项</span>
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
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?3cc05486c3e38ba7d5219378eebbb1f3";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>