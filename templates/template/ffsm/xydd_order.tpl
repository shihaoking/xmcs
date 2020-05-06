<!DOCTYPE html>
<html lang="en">
 <head> 
  <meta charset="utf-8" /> 
  <title>祈福明灯，孔明灯，许愿广场，在线专业测算_鑫旺网</title> 
  <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-touch-fullscreen" content="yes" /> 
  <meta name="keywords" content="祈福，许愿，愿望，孔明灯，许愿树，我要许愿，实现愿望" /> 
  <meta name="description" content="鑫旺网专业在线祈福明灯！为您提供许愿及祈福平台，致力于实现每个人心中的美好愿望，灵机文化祈福明灯祝您早日实现您的美好愿望。" /> 
  <link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
 </head>
 <body>
  <meta http-equiv="Pragma" content="no-cache" /> 
  <meta http-equiv="Cache-Control" content="no-cache" /> 
  <meta http-equiv="Expires" content="0" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="format-detection" content="email=no" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta name="renderer" content="webkit" /> 
  <!-- uc强制竖屏 --> 
  <meta name="screen-orientation" content="portrait" /> 
  <meta name="x5-orientation" content="portrait" />
  <!-- QQ强制竖屏 --> 
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <!-- 不让百度转码 --> 
  <link rel="stylesheet" type="text/css" href="/statics/ffsm/xydd/css/xydd2.css"/>
  <script src="/statics/ffsm/xydd/js/bj-report-tryjs.min.js"></script> 
  <script src="/statics/ffsm/xydd/js/jquery.min.js"></script>
  <script type="text/javascript" src="/statics/ffsm/xydd/js/jq_scroll.js"></script>
  <script src="statics/ffsm/public/js/require/require.min.js"></script>
  <script src="statics/ffsm/public/js/common.min.js"></script>
  <script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
  

  <div class="container" id="container" > 
   <div class="wrapper" id="wrapper"> 
    <section id="page-order">
     <section data-reactroot="">
       <header class="public_header">
<h1 class="public_h_con">许愿点灯</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a>
</header>
      <div class="banner">
       <div class="lantern">
        <div class="lantern-on">
         <img src="/statics/ffsm/xydd/images/light/<{$xyd_data.1}>" alt="" />
        </div>
       </div>
       <div class="lantern-desc">
        <img src="/statics/ffsm/xydd/images/xuyuandiandeng/<{$xyd_data.1}>" alt="" />
       </div>
      </div>
      <div class="title-tips J_testFixedShow" id="submit2">
       <h5>温馨提示：除了自己点灯，也可为亲友点灯祈福哦</h5>
      </div>
      <div id="registry-btn-hook"></div>
      <section>
	   <form class="J_ajaxForm J_testFixedTop" id="submit1" action="/?ac=xydd&lantern_id=<{$lantern_id}>" name="login" method="post" onSubmit="return checkForm();">
       <div class="m-form" id="m-form1">
	  
        <div class="f-box">
         <ul class="form">
          <li class="clear">
           <div class="left">
            您的姓名
           </div>
           <div class="auto">
            <input type="text" id="username" name="username" placeholder="请输入" value="" />
           </div></li>
          <li class="clear">
           <div class="left">
            出生日期
           </div>
           <div class="auto">
            <input type="text" id="birthday" data-input-id="b_input" class="Js_date" data-type="0" value="请选择出生日期" placeholder="请选择日期" data-toid-hour="birthday"   data-date="2020-1-1" readonly="" placeholder="请选择(必填)" />
           </div></li>
          <li class="textarea">
           <div class="label">
            您的愿望:
           </div>
           <div class="wish-text">
            <textarea type="text" id="yuanwang" name="yuanwang" placeholder="请输入心中愿望（140字以内）" maxlength="140"></textarea>
           </div></li>
         </ul>
        </div>
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
		
		
        <div class="show-square">
         <p>
          <!-- react-text: 23 -->在许愿广场显示：
		  <span id="qfshow1"><i class="checked"></i>显示</span><span id="qfshow2"><i></i>不显示</span><input type="hidden" id="qfshow" name="qfshow" value="1"/>
         </p>
        </div>
        <div class="show-tips">
         <p>显示愿望至许愿点灯广场，让更多有缘人为您祈福</p>
        </div>
        <div class="m-btn">
         <img src="/statics/ffsm/xydd/images/order_btn.png?timestamp=1531895008613" alt="" />
        </div>
        <div class="m-query J_testFixedShow">
         <a href="/xuyuandiandeng/index.html?tab=3">查询历史订单&gt;</a>
        </div>
       </div>
	   </form>
      </section>
      <div id="fixed-scroll-hook" style="height: 1px;"></div>
      <div class="main-content mai_d">
       <div class="order-top"></div>
       <{$xyd_data.2}>
       <div class="order-bottom"></div>
      </div>
      <div class="new-comment mai_d">
       <h3>◆ 用户评论 ◆</h3>
       <div class="marquee-wrapper">
        <ul class="comment-list info-list-box" >
         <li><p class="user">订单号：KHFZOK***TIO76 女 25岁</p><p class="detail">2019要高考了，点一盏光明灯和文昌灯，祈求能考上心仪的大学！</p></li>
         <li><p class="user">订单号：KHFZOK***YUR85 男 34岁</p><p class="detail">奶奶是我最爱的人！所以除了准备为她摆寿宴之外，特地来为她80大寿点一盏添寿灯和生辰灯，祝愿她平安幸福，长命百岁。</p></li>
         <li><p class="user">订单号：KHFZOK***ERT70 女 27岁</p><p class="detail">都大学毕业好几年了，始终都没谈过恋爱，点了桃花灯感觉好有用，不知道是不是心理暗示作用，点了1一个月不到就遇见心仪的男生了，最重要的是，他先追的我！</p></li>
         <li><p class="user">订单号：KHFZOK***ACL22 女 26岁</p><p class="detail">我就是典型的颜值不够，衣着打扮、行为举止来凑。男生的综合评价分跟这个测试结果差不多吧！</p></li>
         <li><p class="user">订单号：KHFZOK***FTH45 女 22岁</p><p class="detail">对自己的评价一直不够高，可能因为我是完美主义吧，这个影响了我的自信，所以总是不能很自如地展现自我魅力。估计我在两性关系上，就这一个bug了~</p></li>
         <li><p class="user">订单号：KHFZOK***REG34 男 30岁</p><p class="detail">这个测试还挺有意思的，比较客观地对自己进行了评价，比从朋友那里求证要好多了，毕竟大家都会说客套话。</p></li>
         <li><p class="user">订单号：KHFZOK***JJF90 男 21岁 </p><p class="detail">不高兴……果然测试结果的魅力不够高，看来从各个方面都要努力提升啊，否则感觉脱单无望了~</p></li>
         <li><p class="user">订单号：KHFZOK***FDG65 男 25岁</p><p class="detail">生日许了三个愿望，点了一盏生辰灯，来年检验我的愿望是否都能心想事成。</p></li>
         <li><p class="user">订单号：KHFZOK***ETR 女 29岁</p><p class="detail">新公司开业，体会做老板不易！点个招财灯，不求发大财，只求公司可以稳定发展正常运转，可以按时给员工发工资，就能令我感到安慰了</p></li>
         <li><p class="user">订单号：KHFZOK***YUE64 男 28岁</p><p class="detail">为新年点一盏事业灯，在同一家公司做了很多年，工资一直没涨，希望明年工作可以遇到更好的机会，令我有机会发挥，生活能有一个好的起色！</p></li>
        </ul>
       </div>
      </div>
<div class="ainuo_foot_nav cl" id="testFixedBtn" style="display: none;">
    <ul>
     <li><a href="/"><i class="shouye_1"></i><p>测算首页</p></a></li>
     <li><a href="/?ac=history"><i class="wddd_1"></i><p>订单查询</p></a></li>
     <li><a href="#submit2"class="botpost"><em><i class="lijics_1"></i></em><p>立即点灯</p></a></li>
     <li><a href="/"><i class="gengduo_1"></i><p>更多测算</p></a></li>
     <li><a href="/?ac=member"><i class="grzx_1"></i><p>个人中心</p></a></li>
    </ul>
</div>
<style type="text/css">
.ainuo_foot_nav{display: block; padding: 2px 0; background:#a52a1d; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 720px;}
.ainuo_foot_nav li{width: 20%; text-align: center; float: left;}
.ainuo_foot_nav li a{width: 100%; display: block;}
.ainuo_foot_nav .foothover i{color: #f13030;}
.ainuo_foot_nav li i{display: block; line-height: 25px; height: 25px; margin: auto; padding: 0; width: 25px; overflow: hidden; background-size: 100%;}
.ainuo_foot_nav li a.botpost{position: relative; margin-top: -11px; background-color: rgba(0,0,0,0.0);}
.ainuo_foot_nav li a.botpost em{background: #ffffff; padding: 2px; border: 1px solid #ff5e5e; display: block; border-radius: 50%; width: 30px; height: 30px; margin: 0 auto; margin-bottom: 2px;padding-bottom: 0px;}
.ainuo_foot_nav li p{overflow: hidden; font-size: 12px; height: 16px; line-height: 16px; color: #fff; font-weight: 400;}
.shouye_1{background: url(/statics/ffsm/public/images/shouye.png) no-repeat;}
.wddd_1{background: url(/statics/ffsm/public/images/dingdan.png) no-repeat;}
.lijics_1{background: url(/statics/ffsm/public/images/deng.png) no-repeat;}
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
</script>
     </section>
	 
    </section> 
   </div> 
  </div>
  <div class="common-loading-layer"><div class="front"><div class="img"><img src="/statics/ffsm/xydd/images/loading.png" alt="loading"><div class="text">请稍后...</div></div></div></div>
   
  <script type="text/javascript">

$(document).ready(function(){
        $(".marquee-wrapper").Scroll({line:1,speed:600,timer:3000,up:"but_up",down:"but_down"});
});

  window.onscroll=function(){
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
  var toTop=document.getElementById("popupBtn");
    if(scrollTop>=500)
      toTop.style.cssText='display:block;';
    else
      toTop.style.cssText="";
  }

$('.m-btn').click(function(){
        $('.common-loading-layer').css('display','block');
            setTimeout(function(){  //使用  setTimeout（）方法设定定时2000毫秒
                    checkForm();
                            document.getElementById("submit1").submit();
                                },2000);
});
$('#qfshow1').click(function(){
        $("#qfshow2 i").removeClass('checked');
        $("#qfshow1 i").addClass('checked');
        $("#qfshow").val('1');	
});
$('#qfshow2').click(function(){
		$("#qfshow1 i").removeClass('checked');
        $("#qfshow2 i").addClass('checked');
        $("#qfshow").val('0');	
});
</script>
 <script src="/statics/suanming.js"></script>
 <{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>