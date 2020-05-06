<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title><{$data.username}>和<{$data.girl_username}>合婚测算结果-鑫旺网</title>
<meta name="keywords" content="八字合婚,周易八字配对,在线八字合婚,八字合婚免费算命" />
<meta name="description" content="鑫旺网提供婚姻测算八字合婚服务，解开婚姻与八字的姻缘关系，普渡每一个善信的有缘人，我们衷心祝愿您拥有幸福的婚姻生活。" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/bazihehun/1/wap.min.css" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/bazihehun/1/bazihehun.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/statics/ffsm/public/js/require/require.min.js" data-main="/statics/ffsm/public/js/common.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">八字合婚</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div class="public_banner">
	<img src="/statics/ffsm/bazihehun/1/images/mainb.jpg" alt="八字合婚"/>
</div>
<div class="order_wrapper">
	<div class="order_code">
		订单编号：<{$oid}>
	</div>
	<div class="user_info">
		<div class="user_info_box left">
			<p class="tit"><{$data.username}></p>
			<p><img src="/statics/ffsm/bazihehun/1/images/big_man.jpg" alt="先生"/></p>
			<p><{$data.year}>年<{$data.month}>月<{$data.day}>日<{$data.hour}>时</p>	
		</div>
		<span class="icon_center"><img src="/statics/ffsm/bazihehun/1/images/icon_hehun.png" alt="#"/></span>
		<div class="user_info_box right">
			<p class="tit"><{$data.girl_username}></p>
			<p><img src="/statics/ffsm/bazihehun/1/images/big_woman.jpg" alt="小姐"/></p>
			<p><{$data.girl_year}>年<{$data.girl_month}>月<{$data.girl_day}>日<{$data.girl_hour}>时</p>
		</div>
	</div>
	<div class="price_box">
		<del>原价：￥168</del><em>&nbsp; &nbsp;&nbsp;<strong>吉时特价：<span style="color:#ff0000;">￥<{$money}></span></strong></em>
<div class="time-item">
	<em>倒计时：</em>
	<em id="hour_show">1小时</em>
	<em id="minute_show">35分</em>
	<em id="second_show">34秒</em>
</div>
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
	<div class="txt">
		已有<span class="red">13863760</span>人进行了测试分析，帮助他们找到<span class="red">美满恋爱婚姻，98.9%</span>的用户认为测算结果对他们的婚姻生活产生了巨大帮助。
	</div>
</div>
<div class="pay_item J_testFixedShow">
	<div class="words">
		<span>支付完成后，将为您解锁其余八项重要内容：</span>
	</div>
	<a href="javascript:;" class="public_bzhh_title J_payPopupShow"><span class="left"></span><span class="right"></span><span class="center">第一：<{$data.girl_username}>小姐的命格</span><i></i></a><a href="javascript:;" class="public_bzhh_title J_payPopupShow"><span class="left"></span><span class="right"></span><span class="center">第二：<{$data.username}>先生的命格</span><i></i></a>
	<div class="public_bzhh_title">
		<span class="left"></span><span class="right"></span><span class="center">第三：（合婚指数）名师点评</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				你们一生的婚姻究竟会是怎样呢？
			</p>
			<p>
				相比与其他人来说，是好还是坏？
			</p>
			<p>
				综合命理纲要给你一个圆满答案。
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
	<div class="public_bzhh_title J_payPopupShow">
		<span class="left"></span><span class="right"></span><span class="center">第四：（双方性格）命运合盘</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				你们的八字命盘是否相合？
			</p>
			<p>
				你们的幸福指数是多少？
			</p>
			<p>
				什么方位最能促进你们婚姻和谐？
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
	<div class="public_bzhh_title J_payPopupShow">
		<span class="left"></span><span class="right"></span><span class="center">第五：（前世今生）命中注定</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				你们是否是天生一对？
			</p>
			<p>
				在别人眼中你们的婚姻是怎样的？
			</p>
			<p>
				生活中你们是怎样和谐相处？
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
	<div class="public_bzhh_title J_payPopupShow">
		<span class="left"></span><span class="right"></span><span class="center">第六：（婚配指数）心有灵犀</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				对方会是个温柔体贴的人吗？
			</p>
			<p>
				会屈就于你还是你只有听从的份？
			</p>
			<p>
				相处之中你们是否更具默契？
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
	<div class="public_bzhh_title J_payPopupShow">
		<span class="left"></span><span class="right"></span><span class="center">第七：（感情质量）相扶相旺</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				配偶是得力助手还是对方的累赘？
			</p>
			<p>
				你对配偶是助旺还是助衰呢？
			</p>
			<p>
				你们能互相助旺、优势互补吗？
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
	<div class="public_bzhh_title J_payPopupShow">
		<span class="left"></span><span class="right"></span><span class="center">第八：（天长地久）吉凶几何</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				你们的婚后生活稳定吗？
			</p>
			<p>
				婚姻生活中会遇到哪些危机？
			</p>
			<p>
				有什么方法可以趋吉避凶？
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
	<div class="public_bzhh_title J_payPopupShow">
		<span class="left"></span><span class="right"></span><span class="center">第九：（双方优点）魅力相吸</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				你们的婚姻保质期有多久？
			</p>
			<p>
				另一半是否有出轨倾向？
			</p>
			<p>
				针对你们的爱情保鲜秘籍是什么？
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
	<div class="public_bzhh_title J_payPopupShow">
		<span class="left"></span><span class="right"></span><span class="center">第十：（婚后生活）子女同步</span><i></i>
	</div>
	<div class="public_lock_content">
		<div class="list left">
			<p>
				命里你们是否会儿孙满堂？
			</p>
			<p>
				孩子能让你们开心还是疲惫？
			</p>
			<p>
				孩子的到来会让婚姻变得更加稳定?
			</p>
		</div>
		<div class="right J_payPopupShow">
			<img src="/statics/ffsm/bazihehun/1/images/icon_suo.png" alt="解锁"/>
			<p>
				解锁查看
			</p>
		</div>
	</div>
</div>
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
<div style=" height: 25px;">
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
.ainuo_foot_nav{display: block; padding: 2px 0; background:#f31b34; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
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
<script>
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