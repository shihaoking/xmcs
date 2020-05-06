<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>大师一对一命理运势解读、鑫旺网大师服务-鑫旺网</title>
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
<h1 class="public_h_con">大师一对一</h1>
<a class="public_h_home" href="/"></a><a href="?ac=history" class="public_h_menu">我的测算</a></header>
<div class="CommonSwiper">
	<div class="swiper-container swiper-container-horizontal swiper-container-wp8-horizontal">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<a href="/?ac=bzyy"><img src="/statics/ffsm/dashi/dashi_1.jpg" class="index_img">
					<p class="img_title"></p>
				</a>
			</div>
			<div class="swiper-slide">
				<a href="/?ac=hehun"><img src="/statics/ffsm/dashi/dashi_2.jpg" class="index_img">
					<p class="img_title"></p>
				</a>
			</div>
		 </div>
		<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
	</div>
</div>

<div class="index-menu" id="submit2">
  <ul class="clearfix">
    <li><a href="/shance/love/"><img src="/statics/ffsm/dashi/logo_1.png" alt=""><em>情感婚恋</em></a></li>
    <li><a href="/shance/work/"><img src="/statics/ffsm/dashi/logo_2.png" alt=""><em>事业财运</em></a></li>
    <li><a href="/shance/fate/"><img src="/statics/ffsm/dashi/logo_3.png" alt=""><em>终身运程</em></a></li>
    <li><a href="/shance/fortune/"><img src="/statics/ffsm/dashi/logo_4.png" alt=""><em>流年运势</em></a></li>
   </ul>
</div>
  
<div class="public_bg_color">
	<form class="J_ajaxForm J_testFixedShow" id="submit1" action="?ac=dashi" name="login" method="post" onSubmit="return checkForm();">
		<div class="public_form_wrap" id="miaodian">
			<ul>
				<li>
				<div class="left">
					选择项目
				</div>
				<div class="auto" id="project_sls">
					<div type="text" class="bg_no" id="project_tit"/>点击选择预约项目</div>
				</div>
				</li>
				<li>
				<div class="left">
					您的姓名
				</div>
				<div class="auto">
					<input type="text" class="bg_no" id="username" name="username" placeholder="请输入名字（必须汉字）" value=""/>
				</div>
				</li>
				<li>
				<div class="left">
					您的性别
				</div>
				<div class="auto sex sex J_sex">
					<span class="cur" data-value="1"><i></i><font>男</font></span><span data-value="0"><i></i><font>女</font></span><input type="hidden" name="gender" value="1"/>
				</div>
				</li>
				<li>
				<div class="left">
					出生日期
				</div>
				<div class="auto">
					<input type="text" id="birthday" data-input-id="b_input" class="Js_date" data-type="0" value="请选择出生日期" placeholder="请选择日期" data-toid-hour="birthday">
				</div>
				</li>
				<li>
				<div class="left">
					联系电话
				</div>
				<div class="auto">
					<input type="text" class="bg_no" id="tel" name="tel" placeholder="请输入手机号码" value=""/>
				</div>
				</li>
				<input type="hidden" name="project_id" id="project_id" value="">
                <input type="hidden" name="h"  class="auto input J-time" id='j_dd'  value="">
                <input type="hidden" name=y  value="0">
                <input type="hidden" name=m  value="0">
                <input type="hidden" name=d  value="0">
                
                <input type="hidden" name=i  value="0">
                <input type="hidden" name=cY  value="">
                <input type="hidden" name=cM  value="">
                <input type="hidden" name=cD  value="">
                <input type="hidden" name=cH  value="">
                <input type="hidden" name=term1  value="">
                <input type="hidden" name=term2  value="">
                <input type="hidden" name=start_term  value="">
                <input type="hidden" name=end_term  value="">
                <input type="hidden" name=start_term1  value="">
                <input type="hidden" name=end_term1  value="">
                <input type="hidden" name=lDate  value="">
			</ul>
		<div class="public_btn_s">
        	<input type="button" value="立即预约大师服务" class="J_ajax_submit_btnsub">
		</div>
		</div>
	</form>
</div>
<div class="am-modal" tabindex="-1" id="project_select" style="display: none;">
	<div class="am-modal-dialog">
		<div class="am-modal-hd">选择预约项目</div>
		<div class="am-modal-bd">
			<ul name="cid">
			<{foreach key =k item=i from=$dsyy_row}> 
				<{if $i.id}> 
				<li class="am-modal-btn"  data-id="<{$i.id}>" data-project="<{$i.project}>" data-money="<{$i.money}>" data-teacher="<{$i.teacher}>"><{$i.project}> <em><{$i.money}>元</em></li>
				<{/if}>
			<{/foreach}>  
			</ul>
		</div>
	</div>
</div>
<style type="text/css">
.am-modal {position:fixed;top:0;right:0;bottom:0;left:0;z-index:1110;background:rgba(0,0,0,0.19);text-align:center;}
.am-modal:before {content:"\200B";display:inline-block;height:100%;vertical-align:middle;}
.am-modal-dialog {position:relative;display:inline-block;vertical-align:middle;margin-left:auto;margin-right:auto;max-width:540px;width:95%;border-radius:0;vertical-align:middle;border-radius:5px;background-color:#F0F0F0;box-shadow:0 0 2px rgba(0,0,0,.4);overflow:hidden;}
.am-modal-dialog .am-modal-hd {background:#c91723;color:#fff;padding:10px;}
.am-modal-hd + .am-modal-bd {padding-top:0;}
.am-modal-dialog .am-modal-bd li {padding:0 5px;height:44px;-webkit-box-sizing:border-box !important;box-sizing:border-box !important;font-size:15px;line-height:44px;text-align:center;display:block !important;width:100%;border-bottom:1px #ccc solid;color:#434343;border-left:none;border-right:none;transition:all .5s;}
  .am-modal-dialog .am-modal-bd li em{color:#f00;}
.am-modal-dialog .am-modal-bd li:focus,.am-modal-dialog .am-modal-bd li:hover {background-color:#ef3535;color:#fff;transition:all .5s;border-bottom-color:#ef3535;}
.input_btn {margin:10px 2px;overflow:hidden;}
.input_btn a {width:100%;float:left;margin:0 auto;box-sizing:border-box;height:36px;line-height:36px;color:#fff;text-align:center;}
.as_form .input_btn .cancel {background-color:#999;border-top-left-radius:4px;border-bottom-left-radius:4px;border-top-right-radius:4px;border-bottom-right-radius:4px;}
.input_btn .sure {border:1px solid #f90;background-color:#f90;}
.input_text,.as_form .input_textarea {position:relative;display:block;overflow:hidden;padding:0 0 0 100px;height:32px;margin:6px 4px;}
.input_text span,.as_form .input_textarea span {width:94px;padding:0 0 0 6px;position:absolute;left:0;top:0;height:32px;line-height:32px;}
.input_text input,.as_form .input_textarea textarea {width:100%;box-sizing:border-box;border:1px solid #ccc;height:32px;padding:0 4px;}
.as_form {position:relative;margin:0;}
</style>
<div class="colorbox">
  <div class="main-tit clearfix">
    <span class="bediv">单身的你，一定想知道</span>
    <a href="/shance/6/" class="amore afdiv">查看全部</a></div>
  <div class="article-list">
    <dl>
      <a href="/shance/6.html">
        <dt>
          <img src="https://www.695828.com/data/shanceimg/thumb1545813901.jpg" alt="2019年我是否会转运？"></dt>
        <dd>
          <p class="ptit">2019年我是否会转运？</p>
          <p class="ptxt">2018年已经悄无声息地过去，你是否已经做好准备拥抱你的2019？不管是爱情，事业，或者学业，这个世界上除了努力之外，很关键的一个因素是要有好的运气，才能得到你渴望的东西。那么2019年，你是否能转运呢？一起来测测吧。</p>
          <p class="pcombtn">
            <span class="bediv spsl">209 测试</span>
            <span class="bediv sppj">15 评价</span></p>
        </dd>
      </a>
    </dl>
    <dl>
      <a href="/shance/2.html">
        <dt>
          <img src="https://www.695828.com/data/shanceimg/thumb1545813730.jpg" alt="2019年我和现任的感情发展会顺利吗？"></dt>
        <dd>
          <p class="ptit">2019年我和现任的感情发展会顺利吗？</p>
          <p class="ptxt">爱情就像一场演出，有高潮有落幕，有分合转折。美满的爱情是将陌生慢慢转变为信任，由新鲜感变成熟悉感，从爱人变成家人，但是也有许多失败的爱情，不懂理解对方，没有沟通和新鲜感后变得冷淡。热恋之后你的爱情会如何发展？2019年你的恋情会有什么变化？</p>
          <p class="pcombtn">
            <span class="bediv spsl">91 测试</span>
            <span class="bediv sppj">17 评价</span></p>
        </dd>
      </a>
    </dl>
    <dl>
      <a href="/shance/1.html">
        <dt>
          <img src="https://www.695828.com/data/shanceimg/thumb1545813659.jpg" alt="2019年能遇到心仪的另一半吗？"></dt>
        <dd>
          <p class="ptit">2019年能遇到心仪的另一半吗？</p>
          <p class="ptxt">你有没有曾经试过，遇见一个人内心觉得甜甜的，好像突然整个世界开了花。都说前世的五百次回眸，才换来今生的擦肩而过，我们和每个人的邂逅都是有特殊的缘分在，而那个人，会恰好喜欢你吗？2019年你能遇到心动的另一半吗？</p>
          <p class="pcombtn">
            <span class="bediv spsl">96 测试</span>
            <span class="bediv sppj">27 评价</span></p>
        </dd>
      </a>
    </dl>
  </div>
</div>   
<div class="colorbox">
  <div class="main-tit clearfix">
    <span class="bediv">奋斗的你，一定想知道</span>
    <a href="/shance/6/" class="amore afdiv">查看全部</a></div>
  <div class="article-list">
    <dl>
      <a href="/shance/6.html">
        <dt>
          <img src="https://www.695828.com/data/shanceimg/thumb1545813794.jpg" alt="我以后会是一个有钱人吗？"></dt>
        <dd>
          <p class="ptit">我以后会是一个有钱人吗？</p>
          <p class="ptxt">在这个物欲横流的社会，不可否认的是钱很重要。吃穿不愁的生活是人人向往的，人们都希望自己能成为有钱人，然而能成为富翁的人永远是少数。 想知道你有没有成为有钱人的命吗？快来找老师算一下吧。</p>
          <p class="pcombtn">
            <span class="bediv spsl">108 测试</span>
            <span class="bediv sppj">16 评价</span></p>
        </dd>
      </a>
    </dl>
    <dl>
      <a href="/shance/6.html">
        <dt>
          <img src="https://www.695828.com/data/shanceimg/thumb1545813865.jpg" alt="我的事业会一帆风顺吗?"></dt>
        <dd>
          <p class="ptit">我的事业会一帆风顺吗?</p>
          <p class="ptxt">工作占据了我们平时的大部分时间，如果工作上能够一帆风顺，我们的生活质量就会有显著的提高，如果工作中处处碰钉子，生活就会被蒙上一层阴影。但工作不是永远顺利的，想知道你未来的事业运势如何吗？快找老师测算一下吧。</p>
          <p class="pcombtn">
            <span class="bediv spsl">121 测试</span>
            <span class="bediv sppj">27 评价</span></p>
        </dd>
      </a>
    </dl>
    <dl>
      <a href="/shance/6.html">
        <dt>
          <img src="https://www.695828.com/data/shanceimg/thumb1545813824.jpg" alt="看八字命盘知道自己是不是天生好命？"></dt>
        <dd>
          <p class="ptit">看八字命盘知道自己是不是天生好命？</p>
          <p class="ptxt">命运的转轮从开始转动以后，所有人就都在命运的流程里生、离、死、别，随着命运之轮的转动永不再停歇！想知道你的命是好是坏，是一帆风顺还是不安多舛，那么快来找老师算一下吧。</p>
          <p class="pcombtn">
            <span class="bediv spsl">118 测试</span>
            <span class="bediv sppj">13 评价</span></p>
        </dd>
      </a>
    </dl>
  </div>
</div>      
<div class="lunpan_box" style="display:none;">
	<div class="lunpan">
		<img src="statics/ffsm/bazisyy/1/images/luopan.png" alt="轮盘">
		<img src="statics/ffsm/bazisyy/1/images/zhizheng.png" alt="轮盘">
	</div>
	<div class="lunpan_color"></div>
    <span style="color:#FFF; text-align:center;position:fixed;top:70%;left:29%;z-index:110;margin:0 auto;">大师努力掐算中 请稍后...</span>
    
</div>
<div class="ainuo_foot_nav cl" id="testFixedBtn" style="display: none;">
    <ul>
     <li><a href="/"><i class="shouye_1"></i><p>测算首页</p></a></li>
     <li><a href="/?ac=history"><i class="wddd_1"></i><p>订单查询</p></a></li>
     <li><a href="#submit2"class="botpost"><em><i class="lijics_1"></i></em><p>预约大师</p></a></li>
     <li><a href="/"><i class="gengduo_1"></i><p>更多测算</p></a></li>
     <li><a href="/?ac=member"><i class="grzx_1"></i><p>个人中心</p></a></li>
    </ul>
</div>
<style type="text/css">
.ainuo_foot_nav{display: block; padding: 2px 0; background:#d6b168; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
.ainuo_foot_nav li{width: 20%; text-align: center; float: left;}
.ainuo_foot_nav li a{width: 100%; display: block;}
.ainuo_foot_nav .foothover i{color: #f13030;}
.ainuo_foot_nav li i{display: block; line-height: 25px; height: 25px; margin: auto; padding: 0; width: 25px; overflow: hidden; background-size: 100%;}
.ainuo_foot_nav li a.botpost{position: relative; margin-top: -11px; background-color: rgba(0,0,0,0.0);}
.ainuo_foot_nav li a.botpost em{background: #ffffff; padding: 2px; border: 1px solid #ff5e5e; display: block; border-radius: 50%; width: 30px; height: 30px; margin: 0 auto; margin-bottom: 2px;padding-bottom: 0px;}
.ainuo_foot_nav li p{overflow: hidden; font-size: 12px; height: 16px; line-height: 16px; color: #fff; font-weight: 400;}
.shouye_1{background: url(/statics/ffsm/public/images/shouye.png) no-repeat;}
.wddd_1{background: url(/statics/ffsm/public/images/dingdan.png) no-repeat;}
.lijics_1{background: url(/statics/ffsm/public/images/suan.png) no-repeat;}
.gengduo_1{background: url(/statics/ffsm/public/images/gengduo.png) no-repeat;}
.grzx_1{background: url(/statics/ffsm/public/images/grzx.png) no-repeat;}
</style>

<script>
$("#project_sls").click(function(){
		$('#project_select').show();
		$('.am-dimmer').addClass('am-active');
		$('.am-dimmer').show();
		});
		$(".am-modal-btn").click(function(){
			var dsyy_id=$(this).data("id");
			var dsyy_project=$(this).data("project");
			var dsyy_money=$(this).data("money");
			var dsyy_teacher=$(this).data("teacher");
			$('#project_id').val(dsyy_id);
			$('#project_tit').text(dsyy_project);
			$('#dsyy_money').text(dsyy_money+"元");
			$('#project_select').hide();
			$('.am-dimmer').hide();
			$('.am-dimmer').removeClass('am-active');
			
	});
	
$('.sure').click(function(){
	alert('你没有付费不能评价');
	return false;
});

$('.J_ajax_submit_btnsub').click(function(){
		var phone=/^1[345789]\d{9}$/;
		var tjPhone=$('#tel').val();
		if(tjPhone.match(phone)==null){
			alert("您的手机格式不正确");
			$('#tel').focus();
			return false;
		}
		if (tjPhone==""){
			alert("请手机号码！");
			$('#tel').focus();
			return false;
		}		
		if ($('#project_id').val()==""){
			alert("请选择预约项目！");
			$('#project_tit').focus();
			return false;
		}
        $('.lunpan_box').css('display','block');
            setTimeout(function(){  //使用  setTimeout（）方法设定定时2000毫秒
                    checkForm();
                            document.getElementById("submit1").submit();
                                },2000);
});
</script>
<script>
	//图片轮播
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 1,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		loop: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//TAB——Box
	var switchBox=$('.m-wrap'),
		switchTit=$('#tab>li');
	function xun(num){
		for(var i=0,len=switchBox.length;i<len;i++){
			if(num == i){
				switchBox[i].style.display="block";
			}else{
				switchBox[i].style.display='none';
			}
		}
	}
	for(var j=0;j<switchTit.length;j++){
		switchTit[j].setAttribute('data-num',j);
		switchTit[j].addEventListener('click',function(){
			var num=this.getAttribute('data-num');
			$(this).parents('ul').find('li').find('div').removeClass('select').siblings('span').removeClass('line');
			$(this).find('div').addClass('select').siblings('span').addClass('line');
			xun(num);
		})
	}
</script>
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
</script>
<script src="statics/suanming.js"></script>
<{include file='./ffsm/footer.tpl'}>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>