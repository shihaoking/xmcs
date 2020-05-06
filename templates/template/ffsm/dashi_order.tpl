<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>确认订单信息-大师一对一命理运势解读-鑫旺网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/dashi/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/index/swiper.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/statics/ffsm/index/swiper.min.js"></script>
<script src="statics/ffsm/public/js/require/require.min.js"></script>
<script src="statics/ffsm/public/js/common.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">在线预约</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div class="colorbox xqtop mat0">
  <p class="pimg">
    <img src="https://www.695828.com/data/shanceimg/img1545874020.jpg" alt="2019年我和现任的感情发展会顺利吗？"><span>2019年我和现任的感情发展会顺利吗？</span>
  </p>
  <p class="ptxt">爱情就像一场演出，有高潮有落幕，有分合转折。美满的爱情是将陌生慢慢转变为信任，由新鲜感变成熟悉感，从爱人变成家人，但是也有许多失败的爱情，不懂理解对方，没有沟通和新鲜感后变得冷淡。热恋之后你的爱情会如何发展？2019年你的恋情会有什么变化？</p>
  <p class="pcombtn">
    <span class="bediv spsl">91测试</span>
    <span class="bediv sppj">17评价</span>
    <span class="bediv sphp">97.58%好评</span>
  </p>
</div>
  
<div class="container pay" style="padding-bottom:0px;">
  <div class="wrap">
    <div class="person">
      <div class="hd">
        <img src="statics/ffsm/bazimf/images/hd.jpg"></div>
      <div class="infos">
        <p>姓名：<{$names.username}> </p>
        <p>性别：<{if $names.gender==1}>男<{else}>女<{/if}> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：<{$tel}></p>
        <p>生日：<{$names.y}>年<{$names.m}>月<{$names.d}>日<{if $names.h>=0}><{$names.h}><{else}>未知<{/if}>时</p>
        <p>标题：<{$names.title}> </p>
        <p>图片链接：<{$names.images}> </p>
        <p>摘要：<{$names.centent}> </p>
      </div>
    </div>
    <p class="gk">已有
      <span class="red3">69852134</span>人进行测试，
      <span class="red3">98.7%</span>以上的测算用户都觉得对自身的前程有很大的帮助。
      <span class="red3">大师团队利用传统四柱八字推测出你的一生财运、事业、感情、健康、人际等重要问题！</span></p>
    <div class="price">
      <p class="tit1">测算项目：<{$des}></p>
      <div class="clearfix inner">
        <div class="fl">
          <span class="yh">限时优惠￥<{$money}>元</span>
          <s class="gray">原价：￥118.00</s></div>
        <div class="fr">
          <p>距优惠结束</p>
          <p class="red">
            <span class="h" id="hour_show">00：</span>
            <span class="f" id="minute_show">57：</span>
            <span class="m" id="second_show">42</span></p>
        </div>
      </div>
    </div>
    <div class="price">
      <p class="tit1 tcenter">支付方式</p>
      <div class="clearfix inner">
        <ul class="pay-type">
          <{if $sys_pay_type==0 || $sys_pay_type==1 || $sys_pay_type==3}>
          <a class="weixin" target="_self" href="/?ct=pay&ac=go&oid=<{$oid}>&type=1"><li class="on" id="wx_zf">
            <span class="pay-icon icon-wechat"></span>
            <span>微信支付</span>
            <em class="ico-arrow"></em>
          </li></a>
            <{/if}>
          <{if  $sys_pay_type==0 || $sys_pay_type==2 || $sys_pay_type==3}>
              <a class="alipay" target="_self" href="/?ct=pay&ac=go&oid=<{$oid}>&type=2"><li id="zfb_zf">
            <span class="pay-icon icon-zfb"></span>
            <span>支付宝支付</span>
            <em class="ico-arrow"></em>
          </li></a>
            <{/if}>
		<{if  $sys_pay_type==0 || $sys_pay_type==4}>
 			 <a class="weixin" target="_self" href="/?ct=pay&ac=pay_go&oid=<{$oid}>&type=wxpay"><li class="on" id="wx_zf">
            <span class="pay-icon icon-wechat"></span>
            <span>微信支付</span>
            <em class="ico-arrow"></em>
          </li></a>
              <a class="alipay" target="_self" href="/?ct=pay&ac=pay_go&oid=<{$oid}>&type=alipay"><li id="zfb_zf">
            <span class="pay-icon icon-zfb"></span>
            <span>支付宝支付</span>
            <em class="ico-arrow"></em>
          </li></a>
		<{/if}>
        </ul>
      </div>
    </div>
<div class="ainuo_foot_nav cl" id="testFixedBtn" style="display: none;">
    <ul>
     <li><a href="/"><i class="shouye_1"></i><p>测算首页</p></a></li>
     <li><a href="/?ac=history"><i class="wddd_1"></i><p>订单查询</p></a></li>
     <li><a href="javascript:;" id="publicPayBottom" class="botpost"><em><i class="lijijs_1"></i></em><p>付费解锁</p></a></li>
     <li><a href="/"><i class="gengduo_1"></i><p>更多测算</p></a></li>
     <li><a href="/?ac=member"><i class="grzx_1"></i><p>个人中心</p></a></li>
    </ul>
</div>
<style type="text/css">
.ainuo_foot_nav{display: block; padding: 2px 0; background:#d13036; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 750px;}
.ainuo_foot_nav li{width: 20%; text-align: center; float: left;}
.ainuo_foot_nav li a{width: 100%; display: block;}
.ainuo_foot_nav .foothover i{color: #f13030;}
.ainuo_foot_nav li i{display: block; line-height: 25px; height: 25px; margin: auto; padding: 0; width: 25px; overflow: hidden; background-size: 100%;}
.ainuo_foot_nav li a.botpost{position: relative; margin-top: -11px; background-color: rgba(0,0,0,0.0);}
.ainuo_foot_nav li a.botpost em{background: #ffffff; padding: 2px; border: 1px solid #ff5e5e; display: block; border-radius: 50%; width: 30px; height: 30px; margin: 0 auto; margin-bottom: 2px;padding-bottom: 0px;}
.ainuo_foot_nav li p{overflow: hidden; font-size: 12px; height: 16px; line-height: 16px; color: #fff; font-weight: 400;}
.shouye_1{background: url(/statics/ffsm/public/images/shouye.png) no-repeat;}
.wddd_1{background: url(/statics/ffsm/public/images/dingdan.png) no-repeat;}
.lijijs_1{background: url(/statics/ffsm/public/images/jiesuo.png) no-repeat;}
.gengduo_1{background: url(/statics/ffsm/public/images/gengduo.png) no-repeat;}
.grzx_1{background: url(/statics/ffsm/public/images/grzx.png) no-repeat;}
</style>
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
	</div>
</div>
<script>
    //测算底部悬浮
    (function(){
    	var topShow=$(".J_testFixedShow");
    	if(topShow.length){
            var topShow=topShow.offset().top;
    		var testBtn=$("#testFixedBtn");
    		$(window).scroll(function(){
                var wt=$(window).scrollTop();
                wt>topShow?(testBtn.fadeIn(),$('.public_footer_servers').css('padding-bottom','50px')):(testBtn.fadeOut(),$('.public_footer_servers').css('padding-bottom','20px'));
            });
            testBtn.add('.J_testScrollTop').on('click',function(){$('html,body').scrollTop(topNum)})
    	}
    })()
    //弹出支付功能
    ;(function($){
        $.fn.publicPopup=function(opt){
            var pp=$('#publicPayPopup');
            var ppClose=$('#publicPPClose');
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
</script>
<script type="text/javascript">
var intDiff = parseInt(5734);//倒計時總秒數量
function timer(intDiff){
	window.setInterval(function(){
	var day=0,
		hour=0,
		minute=0,
		second=0;//時間默認值		
	if(intDiff > 0){
		day = Math.floor(intDiff / (60 * 60 * 24));
		hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
		minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
	}
	if (minute <= 9) minute = '0' + minute;
	if (second <= 9) second = '0' + second;
	$('#day_show').html(day+"天");
	$('#hour_show').html('<s id="h"></s>'+hour+'小時');
	$('#minute_show').html('<s></s>'+minute+'分');
	$('#second_show').html('<s></s>'+second+'秒');
	intDiff--;
	}, 1000);
} 

$(function(){
	timer(intDiff);
});	
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
<{include file='./ffsm/footer.tpl'}>
</body>
</html>