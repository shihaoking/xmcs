
<!DOCTYPE html>
<html lang="ch-ZN" style="font-size: 41.1px;">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><{$opt_Array.xing}>姓宝宝 - 姓名列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/statics/ffsm/qiming/css/mip.css">
	<link href="/statics/ffsm/qiming/css/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="page-names-list mobile pc hfweishang" site-from="wap3" page-from="namelist" style="padding-bottom:42px;">
<div class="public_head">
  <a href="javascript:;" onclick="history.go(-1);" class="public_head_back"></a>
  <h1 class="public_head_title">预约咨询</h1>
  <a href="/?ac=history" class="public_head_right"></a>
</div>
<div style="margin-top:5px;">
    <a class="swiper-slide-prev" href="/qiming.html">
      <div>
        <img class="img_100" src="/statics/ffsm/qiming/css/zjt.png" alt=""></div>
      <div class="see_carousel_info">
        <span class="">已有<span style="color:#da3028;">1683</span>人选择了易读网专业起名服务</span>
		<span class="y">权威起名</span>
	  </div>
    </a>
  </div>
        <main class="site-main">
            <article class="main-content-namelist name-result">
                <ul class="tab-content">
                    <li class="active">
                        <section class="g-block-white basic-info">
                            <div class="basic">
                                <div class="basic-box">
                                    <div class="item">
                                        <div class="text-center">
                                            <p>性别</p>
                                        </div>
                                        <div class="text-left">
                                            <p><i class="user_sex">
                                            <{if $opt_Array.sex=='1'}>男<{elseif $opt_Array.sex=='2'}>女<{else}>未知<{/if}>
                                                                                            </i></p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="text-center">
                                            <p>姓氏</p>
                                        </div>
                                        <div class="text-left">
                                            <p><i class="user_family_name"><{$opt_Array.xing}></i></p>
                                        </div>
                                    </div>
                                                                    <!-- <div class="item">
                                        <div class="text-center">
                                            <p>出生日期</p>
                                        </div>
                                        <div class="text-left">
                                            <p>
                                                <span class="text-primary-red">阳历：</span><i class="birthday_solar">时辰未知</i>
                                            </p>
                                            <p>
                                                <span class="text-primary-red">农历：</span><i class="birthday_lunar">时辰未知</i>
                                            </p>
                                        </div>
                                    </div> -->
                                    <div class="item">
                                        <div class="text-center">
                                            <p>单双名</p>
                                        </div>
                                        <div class="text-left">
                                            <p class="surname-radios">
											<a <{if $opt_Array.hs=='2'}>class="active"<{/if}> href="/?ac=zxqm&xid=<{$opt_Array.xid}>&sex=<{$opt_Array.sex}>&hs=2&page=<{$opt_Array.page}>"><i></i><span>单字名</span></a>
											<a <{if $opt_Array.hs=='3' || $opt_Array.hs==""}>class="active"<{/if}> href="/?ac=zxqm&xid=<{$opt_Array.xid}>&sex=<{$opt_Array.sex}>&hs=3&page=<{$opt_Array.page}>"><i></i><span>双字名</span></a>
                                               
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="g-block-white namelist-warpper">
                            <h4 class="g-title-primary">为你推荐如下美名</h4>
                            <div class="name-list loadmore">
                                <ul class="list-itmes namelist_html">
								<{foreach from=$list item=v key=k}>
                                    <li class="list-item">
                                            <a href="/?ac=zxqm&name=<{$v.name}>"><{$v.name}></a>
                                        </li>               
                                <{/foreach}>  
                                                                        
                                                                    </ul>
                                <ul class="list-itmes list">
                                </ul>
                                <div class="name-result-more">
                                    <a href="https://sm.yiabs.com/" class="add_more">查看更多&gt;&gt;</a>
                                </div>
                            </div>
                        </section>
                    </li>
                    <!-- <li class="">
                        <div class="basic-info-1">
                            <h4 class="g-title-primary">
                                <img src="statics/ffsm/mfqm/new/titile_3.png" alt="" style="width: 26.6vw">
                            </h4>
                            <section class="g-block-white basic-info">
                                <div class="basic">
                                    <div class="basic-box">
                                        <div class="item">
                                            <div class="text-center">
                                                <p>性别</p>
                                            </div>
                                            <div class="text-left">
                                                <p><i class="user_sex">
                                                                                                            男
                                                                                                    </i></p>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="text-center">
                                                <p>姓氏</p>
                                            </div>
                                            <div class="text-left">
                                                <p><i class="user_family_name">的</i></p>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <div class="text-center">
                                                <p>生肖</p>
                                            </div>
                                            <div class="text-left">
                                                <p>鸡（阳历）</p>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="text-center">
                                                <p>出生日期</p>
                                            </div>
                                            <div class="text-left">
                                                <p>
                                                    <span class="text-primary-red">阳历：</span><i class="birthday_solar">时辰未知</i>
                                                </p>
                                                <p>
                                                    <span class="text-primary-red">农历：</span><i class="birthday_lunar">时辰未知</i>
                                                </p>
                                            </div>
                                        </div>
                                                                    </div>
                            </div></section>
                        </div>
                                            
                        <section class="baziDetailsTips sytle-1">
                            <div class="audio-xiyongshen">
                                <div class="weixin-bubble">
                                    <div class="text">
                                        <span class="audio-time"></span>
                                        <div class="icon-wifi">
                                            <span class="circle-1"></span>
                                            <span class="circle-2"></span>
                                            <span class="circle-3"></span>
                                        </div><span class="audio-btn-text">点击收听</span>
                                    </div>
                                    <audio id="bgMusic">
                                        <source src="statics/ffsm/mfqm/new/xiyongshen_jin.mp3" type="audio/mp3">
                                    </audio>
                                    <i class="dot"></i>
                                </div>
                                <div class="audio-tips">语音点评宝宝的喜用神运势</div>
                            </div>
                            <br>
                            <p class="text-center">可加大师微信<span class="weixinCode"><a href="statics/ffsm/mfqm/weixin://" target="_blank" class="weixinAccount">qm2563</a></span>，一对一起名！</p>
                        </section>
                        <div class="block-item info-shengxiao">
                            <h4 class="g-title-primary">
                                <img src="statics/ffsm/mfqm/new/titile_4.png" alt="" style="width: 26.6vw">
                            </h4>
                            <div class="zodiac zodiac-10 zodiac_cn_order">
                                <div class="title text-center">
                                    <p>阳历生肖：鸡</p>
                                </div>
                                <p class="details text-center">阳历生肖为 每年12月31日划分。</p>
                            </div>
                        </div>
                        <div class="block-item info-shengxiao">
                            <h4 class="g-title-primary">
                                <img src="statics/ffsm/mfqm/new/titile_5.png" alt="" style="width: 26.6vw">
                            </h4>
                            <div class="zodiac zodiac-10 zodiac_cn_order">
                                <div class="title text-center">
                                    <p>生于春分和清明之间</p>
                                </div>
                                <p class="details text-center">2017-03-20 18:28:35---2017-04-04 18:28:35</p>
                            </div>
                        </div>
                        <div class="block-item info-shengxiao wuxing-data-wrapper">
                            <h4 class="g-title-primary">
                                <img src="statics/ffsm/mfqm/new/titile_6.png" alt="" style="width: 26.6vw">
                            </h4>
                            <ul class="wuxing-data">
                                <li><span>金</span><i class="wuxing-percentage jin" style="width:37.5%;"></i><em>37.5%</em></li>
                                <li><span>木</span><i class="wuxing-percentage mu" style="width:25%;"></i><em>25%</em></li>
                                <li><span>水</span><i class="wuxing-percentage shui" style="width:0;"></i><em>0</em></li>
                                <li><span>火</span><i class="wuxing-percentage huo" style="width:12.5%;"></i><em>12.5%</em></li>
                                <li><span>土</span><i class="wuxing-percentage tu" style="width:25%;"></i><em>25%</em></li>
                            </ul>
                            <p>【五行并非缺什么就补什么，应该先天八字中五行同类和异类平衡为 原则，补充最需要的五行作为喜用神。加大师微信<span class="weixinCode"><a href="statics/ffsm/mfqm/weixin://" target="_blank" class="weixinAccount">qm2563</a></span> 咨询五行补缺。】</p>
                        </div>
                        <div class="block-item info-bazi">
                            <h4 class="g-title-primary">
                                <img src="statics/ffsm/mfqm/new/titile_7.png" alt="" style="width: 26.6vw">
                            </h4>
                            <section class="bazi">
                                <ul>
                                    <li>&nbsp;</li>
                                    <li>年柱</li>
                                    <li>月柱</li>
                                    <li>日柱</li>
                                    <li>时柱</li>
                                </ul>
                                <ul>
                                    <li>十神</li>
                                    <li class="ssEraYear">正官</li>
                                    <li class="ssEraMonth">偏财</li>
                                    <li class="ssEraDay">比肩</li>
                                    <li class="ssEraHour">正印</li>
                                </ul>
                                <ul>
                                    <li class="genderBazi">乾造</li>
                                    <li class="cnEraYear">丁酉</li>
                                    <li class="cnEraMonth">甲辰</li>
                                    <li class="cnEraDay">庚申</li>
                                    <li class="cnEraHour">己卯</li>
                                </ul>
                                <ul>
                                    <li><i class="genderBazi">乾造</i>五行</li>
                                    <li class="wxEraYear">火金</li>
                                    <li class="wxEraMonth">木土</li>
                                    <li class="wxEraDay">金金</li>
                                    <li class="wxEraHour">土木</li>
                                </ul>
                                <ul>
                                    <li>臧干</li>
                                    <li class="cgYear">辛</li>
                                    <li class="cgMonth">戊乙癸</li>
                                    <li class="cgDay">庚壬戊</li>
                                    <li class="cgHour">乙</li>
                                </ul>
                                <ul>
                                    <li>臧干五行</li>
                                    <li class="cgYearWx">金</li>
                                    <li class="cgMonthWx">土木水</li>
                                    <li class="cgDayWx">金水土</li>
                                    <li class="cgHourWx">木</li>
                                </ul>
                                <ul>
                                    <li>纳音</li>
                                    <li class="nyYear">山下火</li>
                                    <li class="nyMonth">佛灯火</li>
                                    <li class="nyDay">石榴木</li>
                                    <li class="nyHour">城墙土</li>
                                </ul>
                                <ul>
                                    <li>命理</li>
                                    <li class="mingju">金命</li>
                                </ul>
                            </section>
                        </div>
                                            <div class="bazi-details">
                            <h4 class="g-title-primary">
                                <img src="statics/ffsm/mfqm/new/titile_8.png" alt="" style="width: 43.3vw">
                            </h4>
                            <p>
                                <span><img src="statics/ffsm/mfqm/new/icon_jin.png" class="wuxing-pic">金：</span>在方位上代表西方，在季节方面代表秋季，颜 色代表白色，身体器官表示肺，情感方面表示悲， 天干方面表示庚辛，地支方面表示申酉，八卦方面 表示兑乾。
                            </p>
                            <p>
                                <span><img src="statics/ffsm/mfqm/new/icon_mu.png" class="wuxing-pic">木：</span>在方位上代表东方，在季节方面代表春季，颜 色代表青色，身体器官表示肝，情感方面表示怒， 天干方面表示甲乙，地支方面表示寅卯，八卦方面 表示震巽。
                            </p>
                            <p>
                                <span><img src="statics/ffsm/mfqm/new/icon_shui.png" class="wuxing-pic">水：</span>在方位上代表北方，在季节方面代表冬季，颜 色代表黑色，身体器官表示肾，情感方面表示惊， 天干方面表示壬癸，地支方面表示亥子，八卦方面 表示坎。
                            </p>
                            <p>
                                <span><img src="statics/ffsm/mfqm/new/icon_huo.png" class="wuxing-pic">火：</span>在方位上代表南方，在季节方面代表夏季，颜 色代表红色，身体器官表示心，情感方面表示喜， 天干方面表示丙丁，地支方面表示巳午，八卦方面 表示离。
                            </p>
                            <p>
                                <span><img src="statics/ffsm/mfqm/new/icon_tu.png" class="wuxing-pic">土：</span>在方位上代表中央，在季节方面代表每季末月 ，颜色代表黄色，身体器官表示脾，情感方面表示 思，天干方面表示戊己，地支方面表示辰戌丑未， 八卦方面表示坤艮。
                            </p>
                            <p class="text-center">加大师微信 <span class="weixinCode"><a href="statics/ffsm/mfqm/weixin://" target="_blank" class="weixinAccount">qm2563</a></span>，为宝宝一对一起名。</p>
                            <div class="btn btn-block btn-get-name btn_check_namelist">查看美名</div>
                        </div>

                    </li> -->
                </ul>
            </article>
        <p class="item-addWeixin"><span class="add_dashi_weixin default"><a href="https://sm.yiabs.com/qiming.html" target="_blank" class="weixinAccount">起名专家一对一命名</a></span></p>
    </main>
        <script>
            $(function () {
                $('.tab-nav > .menu-item').on({
                    click: function () {
                        $(this).addClass('active').siblings().removeClass('active noborder')
                        $('.tab-content>li').eq($(this).index()).addClass('active').siblings().removeClass('active');
                        $('.uer-feedback-scroll').kxbdMarquee({ direction: "up", isEqual: false,scrollDelay: 50 });
                    }
                })
                $('.btn_check_namelist').on({
                    click:function(){
                        $('.tab-content>li').eq(0).addClass('active').siblings().removeClass('active');
                        $('.tab-nav > .menu-item').eq(0).addClass('active').siblings().removeClass('active');

                    }
                })
                $("#box").animate({height:"300px"});
                function initSingleNameOptions (){
                    if(getQueryString('single') && parseInt(getQueryString('single')) == 1){
                        $('.surname-radios a').eq(0).addClass('active')
                    }else{
                        $('.surname-radios a').eq(1).addClass('active')
                    }
                }
                initSingleNameOptions ()
                $('.surname-radios a').on({
                    click: function() {
                        $(this).addClass('active').siblings().removeClass('active');
                        $('.namesReget').attr({
                            'href': '?single=' + $(this).attr('single-name')
                        })
                    }
                })

                switch ($(this).index()) {
                    case 0:
                        $url = changeURLArg($('.namesReget').attr('href'), 'single', 1);
                        $('.surname-length-value').text('单字名');
                        $('.namesReget').attr({
                            href: $url
                        });
                        break;
                    case 1:
                        $url = changeURLArg($('.namesReget').attr('href'), 'single', 0);
                        $('.surname-length-value').text('双字名');
                        $('.namesReget').attr({
                            href: $url
                        });
                        break;
                }
                $('.surname-length .surname-options').hide();

                function getShengXiaoLikeHtml(shengXiaoIndex) {
                    var zodiacLikeHtml = '';
                    var zodiacDisikeHtml = '';
                    shengxiao_jinji[shengXiaoIndex][0].forEach(function (item, index) {
                        zodiacLikeHtml += '<p><span>（' + (++index) + '）</span>' + item + '</p>';
                    })
                    shengxiao_jinji[shengXiaoIndex][1].forEach(function (item, index) {
                        zodiacDisikeHtml += '<p><span>（' + (++index) + '）</span>' + item + '</p>';
                    })
                    $('.zodiac-details-like').html(zodiacLikeHtml);
                    $('.zodiac-details-dislike').html(zodiacDisikeHtml);
                }
                $('.zodiac_detaisl_pics_tab .tab_item').on({
                    click: function(){
                        $(this).addClass('current').siblings().removeClass('current')
                        var zodiacIndexCurrent = $(this).index();
                        getShengXiaoLikeHtml(zodiacIndexCurrent)
                    }
                })

                $(function () {
                    if ($('.zodiac-details-introduction').length > 0) {
                        var zodiacIntroductionHtml = '';
                        var zodiacIndex = parseInt($('.zodiac-details-introduction').attr('zodiac-index')) - 1;
                        $('.zodiac_detaisl_pics_tab .tab_item').eq(zodiacIndex).addClass('current');
                        console.log(zodiacIndex)
                        getShengXiaoLikeHtml(zodiacIndex);

                    }
                })
            })
        </script>
      
        <script async="" src="statics/ffsm/mfqm/new/js.js"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-117273948-2');
        </script>
<p class="hd">易读网 版权所有 @ 2018-2020</p>
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