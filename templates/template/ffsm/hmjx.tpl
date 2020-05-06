<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
  	<link rel="shortcut icon" href="statics/ffsm/favicon.ico"/>
    <title>号码解析-手机号码测试-车牌号码吉凶测算-鑫旺网</title>
    <!--[if lt IE 9]>  
        <script src="/statics/ffsm/hmjx/js/html5.js"></script>
        <script src="/statics/ffsm/hmjx/js/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/statics/ffsm/hmjx/css/zm_share.css"/>
    <link rel="stylesheet" href="/statics/ffsm/hmjx/css/_szjx.css"/>
 
   <link rel="stylesheet" type="text/css" href="/statics/ffsm/public/sty.css"/>
   <link href="/statics/ffsm/public/wap.min.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="/statics/ffsm/hmjx/js/rem.js"></script>

<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/statics/ffsm/public/js/require/require.min.js"></script>
<script src="/statics/ffsm/public/js/common.min.js"></script>
    
</head>
<body>
    <header class="share_header">
        <h1 class="zm">号码解析</h1>
        <a href="/" class="zm_titel"></a>
<a href="/?ac=history" class="zm_cs">我的测算</a>

    </header>
    <div class="zm_banner">
        <img src="/statics/ffsm/hmjx/picture/banner.jpg" width="100%" />
    </div>
    <div class="cs_bgcolor J_testFixedShow" id="scrollT" >
        <div class="dashi_title" id="submit2"><img src="/statics/ffsm/hmjx/picture/ds_title.png" width="100%" alt=""></div>
        <div class="dashi_jianjie"> 
            <div class="dashi_txt">
                <p>易恒大师，中国易学领军人物，30年专业专注数字研究，曾应邀参加全球易经协会、中华周易研究会、中华易学专家联合会等许多国内权威易学机构举办的会议。</p>
                <p>获得过“中华权威易学专家”</p>
                <p>获得“中国十大杰出命名策划师”</p>
                <p>获得“注册国际国学讲师”等荣誉</p>
            </div>
            <div class="dashi_head"><img src="/statics/ffsm/hmjx/picture/dashi.png" width="100%" alt=""></div> 
        </div>
        <div class="m_form_container">
            <form class="J_ajaxForm J_testFixedTop" id="submit1" action="/?ac=hmjx" name="login" method="POST">
                <!-- <p class="m_form_p">请输入您的生辰八字：我们将根据您的八字为您自动推算。</p> -->
				
                <ul class="m_form_ul">
                    <li>
                        <div class="f_left">出生日期</div>
                        <div class="f_auto"><input type="text"  id="birthday" data-input-id="b_input" class="Js_date" data-type="0"  data-toid-hour="birthday" readonly="true" placeholder="请选择出生日期" data-date="1980-3-1"></div>
                      
                    </li>
                    <li>
                        <div class="f_left">测算种类</div>
                        <div class="f_auto">
                            <select name="sztestType" class="_select" onchange="_selectEvent(this)">
                                <option value="1" selected>手机号</option>
                                <option value="2">车牌号</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="f_left">数字号码</div>
                        <div class="f_auto"><input type="text" id="numberjx" name="numberjx" placeholder="请输入手机号码"></div>
                        <input type="hidden" id="birthday" name="numberjx_e">
                    </li>
                </ul>
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
                <div class="m_form_btnwrap"><div class="m_form_submit">立即测算</div></div>
            </form>
        </div>
    </div>
    <div class="sz_service">
        <ul class="sz_ul">
            <li><div class="li_textimg"><img src="/statics/ffsm/hmjx/picture/forum_02.png"  width="100%" alt=""></div></li>
            <li><div class="li_textimg"><img src="/statics/ffsm/hmjx/picture/forum_03.png"  width="100%" alt=""></div></li>
            <li><div class="li_textimg"><img src="/statics/ffsm/hmjx/picture/forum_04.png"  width="100%" alt=""></div></li>
            <li><div class="li_textimg"><img src="/statics/ffsm/hmjx/picture/forum_05.png"  width="100%" alt=""></div></li>
            <!--<li><div class="li_textimg"><img src="/statics/ffsm/hmjx/picture/forum_06.png"  width="100%" alt=""></div></li>-->
            <li><div class="li_textimg"><img src="/statics/ffsm/hmjx/picture/forum_07.png"  width="100%" alt=""></div></li>
        </ul>
    </div>
<script>
    let hotcs_item = document.querySelectorAll('.hotcs_item');
    let r_foot = document.querySelectorAll('.r_foot');

    hotcs_item.forEach(function(item){
        item.onclick = function(e){
            var type=this.getAttribute('data-type');
            $.getJSON("/zhiming/index.php/home-index-zmclick",{type:type},function(data){//回调入库
            });
            window.location.href = this.getAttribute('data-url');
        }
    })

    r_foot.forEach(function(item){
        item.childNodes[0].onclick = function(e){
            e.stopPropagation();
            var type=this.getAttribute('data-type');
            if(this.classList.toggle('on')){
                $.getJSON("/zhiming/index.php/home-index-zmclickz",{type:type},function(data){//回调入库
                });
                this.textContent++;
            }else{
                this.textContent--;
            }
        }
    })
</script>
<{include file='./ffsm/footer.tpl'}>
<div class="ainuo_foot_nav cl" id="testFixedBtn" style="display: none;">
    <ul>
     <li><a href="/"><i class="shouye_1"></i><p>测算首页</p></a></li>
     <li><a href="/?ac=history"><i class="wddd_1"></i><p>订单查询</p></a></li>
     <li><a href="#submit2"class="botpost"><em><i class="lijics_1"></i></em><p>立即测算</p></a></li>
     <li><a href="/"><i class="gengduo_1"></i><p>更多测算</p></a></li>
     <li><a href="/?ac=member"><i class="grzx_1"></i><p>个人中心</p></a></li>
    </ul>
</div>
<style type="text/css">
.ainuo_foot_nav{display: block; padding: 2px 0; background:#e41919; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
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
	<script src="/statics/suanming-hmjx.js"></script>
    <script>
        
        // 监听选择的类别
        function _selectEvent(element){
            var Stype = element.value;
            if(Stype == 1){
                $("#numberjx").attr('placeholder','请输入手机号码')
            }else if(Stype == 2){
                $("#numberjx").attr('placeholder','请输入车牌号(例:粤B88888)')
            }
        }
        // 表单提交
        $('.m_form_submit').on('click',function(){
            checkForm();
        })

        // 日期
        
        //测算底部悬浮
        $(function(){
            var topShow=$(".m_form_submit");
            if(topShow.length){
                var topShow=topShow.offset().top;
                var testBtn=$("#fiex");
                $(window).scroll(function(){
                    var wt=$(window).scrollTop();
                    wt>topShow?(testBtn.fadeIn(),$('.footer_severs').css('padding-bottom','1.2rem')):(testBtn.fadeOut(),$('.footer_severs').css('padding-bottom','0.4rem'));
                });
                // goTop
                $('#fiex').on('click',function(){$('html,body').animate({scrollTop:$('#scrollT')[0].offsetTop},500)});
            }
        });
        // 车牌号验证
        function isVehicleNumber(vehicleNumber) {
            var result = false;
            if (vehicleNumber.length == 7){
                var express = /^[京津沪渝冀豫云辽黑湘皖鲁新苏浙赣鄂桂甘晋蒙陕吉闽贵粤青藏川宁琼使领A-Z|a-z]{1}[A-Z|a-z]{1}[A-Z0-9|a-z0-9]{4}[A-Z0-9挂学警港澳|a-z0-9挂学警港澳]{1}$/;
                result = express.test(vehicleNumber);
            }
            return result;
        }
    </script>
	
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>