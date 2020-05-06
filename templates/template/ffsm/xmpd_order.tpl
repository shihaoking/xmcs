<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>姓名配对-鑫旺网付费测算系统</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/public/wap.min.css?v=0817" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/xmpeidui/2/style.min.css" rel="stylesheet" type="text/css"/>
<script src="/statics/jquery-3.2.1.min.js"></script>
<script src="/statics/ffsm/public/js/require/require.min.js"></script>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">姓名配对</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div class="order_top">
	<img src="/statics/ffsm/xmpeidui/2/images/banner_result.jpg" alt="">
	<div>
		订单号:<{$oid}>
	</div>
</div>
<div class="order_info J_testFixedShow">
	<p class="oi_tit">
		姓名相合测算部分预告
	</p>
	<div class="oi_name">
		<div class="oi_left">
			<h4><{$data.malexing}><{$data.malename}></h4>
			<p>
				男主角
			</p>
		</div>
		<div class="oi_con">
			<b>VS</b>
			<p>
				配对
			</p>
		</div>
		<div class="oi_right">
			<h4><{$data.femalexing}><{$data.femalename}></h4>
			<p>
				女主角
			</p>
		</div>
	</div>
	<div class="oi_num">
		<p>
			匹配契合度
		</p>
		<div class="start_0">
		</div>
	</div>
	<div class="oi_txt">
		<table>
		<tr>
			<td>
				<img class="img_l" src="/statics/ffsm/xmpeidui/2/images/book.png" alt="">
				<p>
					你们是天生一对，还是有缘无分
				</p>
			</td>
		</tr>
		</table>
	</div>
</div>
<div class="box_lock">
	<dl class="J_payPopupShow">
		<dt>男女双方性格</dt>
		<dd>
		<p>
			<i></i>男方的性格解析
		</p>
		<p>
			<i></i>女方的性格解析
		</p>
		<p>
			<i></i>追求对方会被拒绝吗？
		</p>
		<span></span></dd>
	</dl>
	<dl class="J_payPopupShow">
		<dt>你们的爱情宿命</dt>
		<dd>
		<p>
			<i></i>你们是不是命中注定的一对？
		</p>
		<p>
			<i></i>双方对待爱情的态度如何？
		</p>
		<p>
			<i></i>哪些因素会干扰你们的爱情
		</p>
		<span></span></dd>
	</dl>
	<dl class="J_payPopupShow">
		<dt>你们的爱情危机</dt>
		<dd>
		<p>
			<i></i>两人相处时会出现哪些危机？
		</p>
		<p>
			<i></i>引发危机的原因都有什么
		</p>
		<p>
			<i></i>如何破除危机，守护爱情
		</p>
		<span></span></dd>
	</dl>
	<dl class="J_payPopupShow">
		<dt>姓名姻缘五格</dt>
		<dd>
		<p>
			<i></i>双方的姓名五格是怎样的
		</p>
		<p>
			<i></i>双方的五格是否有利配对
		</p>
		<p>
			<i></i>双方五格如何影响你们的姻缘
		</p>
		<span></span></dd>
	</dl>
	<dl class="J_payPopupShow">
		<dt>姓名相合卦象</dt>
		<dd>
		<p>
			<i></i>双方姓名卦象是什么
		</p>
		<p>
			<i></i>卦象相合等级是高是低
		</p>
		<p>
			<i></i>准确卦象解析解密双方姻缘
		</p>
		<span></span></dd>
	</dl>
	<dl class="J_payPopupShow">
		<dt>给你们的爱情建议</dt>
		<dd>
		<p>
			<i></i>未来双方的感情运势纵览
		</p>
		<p>
			<i></i>针对你们的配对提供爱情赠言
		</p>
		<p>
			<i></i>推荐方法助力双方姻缘
		</p>
		<span></span></dd>
	</dl>
</div>
<div class="order_info">
	<p class="test_have">
		已有<span>1597324</span>人进行了测算，测算结果帮助他们掌握了正确的求爱方式，找到了自己的真爱，<span>96.7%</span>的客户对测算结果表示满意。
	</p>
</div>
<div class="order_pay">
	<p class="op_txt">
		即将为你揭晓以下完整测算内容
	</p>
	<div class="op_price">
		结缘价:<span><{$money}>元</span>
	</div>
	<p class="op_gray">
		请选择喜欢的付款方式
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
<div class="public_pay_popup" id="publicPayPopup">
	<div class="public_pp_box">
		<div class="public_pp_close" id="publicPPClose">
			X
		</div>
		<div class="public_pp_tit">
			解锁查看所有测算结果
		</div>
		<div class="public_pp_price">
			<span>统一鉴定价:</span><strong>￥<{$money}>元</strong>
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
.ainuo_foot_nav{display: block; padding: 2px 0; background:#fa2d5f; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
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
	var inquiry_lock = 0;
    $(function () {
        setInterval(function () {
            inquiry();
        }, 2000);
    });
    function inquiry() {
        if (inquiry_lock) {
            return;
        }
        $.get('/?ct=pay&ac=scanquery&oid=<{$oid}>', {t: Date.parse(new Date())}, function (data) {
            if (data.status) {
                inquiry = 1;
                window.location = data.url;
            }
        }, 'json');
    }
</script>
<{include file='./ffsm/footer.tpl'}>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>