<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title><{$data.username}>的紫微命盘精批-鑫旺网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/public/wap.min.css" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/ziwei/1/ziwei.min.css" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/ziwei/1/swiper.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/statics/ffsm/ziwei/1/swiper.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">紫微精批</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div class="public_banner">
	<img src="/statics/ffsm/ziwei/1/images/img_banner.png" alt="紫微精批"/>
</div>
<div class="orders_num J_testFixedShow">
	订单编号：<span class="red"><{$oid}></span>
</div>
<div class="public_box border1">
	<div class="base_info">
		<p class="base_info_name">姓名：&nbsp;<{$data.username}> (<{if $data.gender==1}>男<{else}>女<{/if}>)</p>
		<p>阳历生日：&nbsp;<{$data.y}>年<{$data.m}>月<{$data.d}>日</p>
	</div>
	<ul class="zw_list">
		<li><span class="zw_list_left">紫微命盘</span><span class="zw_list_right">免费阅读</span></li>
		<li><span class="zw_list_left">自身状况</span><span class="zw_list_right">付费解锁</span></li>
		<li><span class="zw_list_left">家庭情况</span><span class="zw_list_right">付费解锁</span></li>
		<li><span class="zw_list_left">运势发展</span><span class="zw_list_right">付费解锁</span></li>
		<li><span class="zw_list_left">老师赠言</span><span class="zw_list_right">老师团队提点</span></li>
	</ul>
	<p class="test_number">
		已有<span>4985554</span>缘主进行在线测算，知晓了自己事业财运、婚姻情感的情况，并根据老师建议做出调整，产生显著效果，<span>95%</span>用户觉得本测算对人生规划发展有帮助！
	</p>
	<div class="zw_pay_wrapper">
		<p class="zw_pay_title">
			统一测算价：￥168
		</p>
		<div class="zw_pay_chose">
			<p class="zpc_price_bonds">
				优惠价：<span>￥<{$money}></span>
			</p>
			<p class="zpc_after_payment">
				付款后即可获得<span>详细的紫微精批内容</span>
			</p>
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
</div>
<div class="public_box J_payBottomShow">
	<p class="publci_bg_top">
	</p>
	<div class="public_box_title2">
		您的紫微命盘
	</div>
	<div class="ziwei_disc">
		<div class="zd_box">
			<div class="zd_con">
            	<p>
                	<{$data.username}>
                </p>
				<p>
					阳历：<{$data.y}>年<{$data.m}>月<{$data.d}>日
				</p>
				<p>
					阴历：<{$data.lDate}>
				</p>
                <p>
                	命主:<{$return.mingzhum}>&nbsp; 身主:<{$return.shenzhum}>
                </p>
				<a class="public_bg_btn J_payPopupShow" href="javascript:;">观看详细命盘</a>
			</div>
            
			<div class="zd_block zd_block_1">
            
				<{$return.pan.5}>
                
			</div>
            
			<div class="zd_block zd_block_2">
				<{$return.pan.6}>
			</div>
			<div class="zd_block zd_block_3">
				<{$return.pan.7}>
			</div>
			<div class="zd_block zd_block_4">
				<{$return.pan.8}>
			</div>
			<div class="zd_block zd_block_5">
				<{$return.pan.9}>
			</div>
			<div class="zd_block zd_block_6">
				<{$return.pan.10}>
			</div>
			<div class="zd_block zd_block_7">
				<{$return.pan.11}>
			</div>
			<div class="zd_block zd_block_8">
				<{$return.pan.0}>
			</div>
			<div class="zd_block zd_block_9">
				<{$return.pan.1}>
			</div>
			<div class="zd_block zd_block_10">
				<{$return.pan.2}>
			</div>
			<div class="zd_block zd_block_11">
				<{$return.pan.3}>
			</div>
			<div class="zd_block zd_block_12">
				<{$return.pan.4}>
			</div>
		</div>
	</div>
</div>
<p class="payment_know">
	付款后即可获得<span class="public_red">以下所有内容</span>
</p>
<div class="public_box J_payPopupShow">
	<p class="publci_bg_top">
	</p>
	<div class="public_box_title2">
		您的自身状况
	</div>
	<p class="lock_pic">
		<img src="/statics/ffsm/ziwei/1/images/img_lock01.jpg" alt="您的自身状况"/>
	</p>
</div>
<div class="public_box J_payPopupShow">
	<p class="publci_bg_top">
	</p>
	<div class="public_box_title2">
		您的家庭情况
	</div>
	<p class="lock_pic">
		<img src="/statics/ffsm/ziwei/1/images/img_lock02.jpg" alt="您的家庭情况"/>
	</p>
</div>
<div class="public_box J_payPopupShow">
	<p class="publci_bg_top">
	</p>
	<div class="public_box_title2">
		您的运势发展
	</div>
	<p class="lock_pic">
		<img src="/statics/ffsm/ziwei/1/images/img_lock03.jpg" alt="您的运势发展"/>
	</p>
</div>
<div class="public_box J_payPopupShow">
	<p class="publci_bg_top">
	</p>
	<div class="teacher_say">
		<p class="words">
			老师赠言
		</p>
		<p class="txt">
			针对你的现今境况和未来运势，专业老师为你提供了一些改善生活的建议，帮助你在未来的道路上趋吉避凶。
		</p>
	</div>
	<p class="teacher_say_bottom">
		紫微斗数是古代帝王专用算命方法，号称“天下第一神数”。专业易学权威团队40年紫微斗数论命经验总结，打造最准紫微斗数一生命格详批！
	</p>
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
.ainuo_foot_nav{display: block; padding: 2px 0; background:#9175ca; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
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
<{include file='./ffsm/footer.tpl'}>
</body>
</html>