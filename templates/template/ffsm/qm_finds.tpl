
<!DOCTYPE html>
<html lang="ch-ZN">

<head>
    <meta charset="UTF-8">
    <title>取名结果-名字详细解析结果-易读网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/statics/ffsm/qiming/css/mip.css">
	<link href="/statics/ffsm/qiming/css/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
</head>

<body class="page-names-details mobile" site-from="wap" page-from="namedetails">
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
<main class="main-content-namelist name-details name-result">
    <h4 class="g-title-primary">
        <span>名字解析结果</span>
        <div class="g-pattern type-1"></div>
    </h4>
    <section class="g-block-white name-details-content"><h4 class="g-title-primary-2">
        </h4>
       <!--  <h4 class="g-title-primary-2">
            <span>基本信息</span>
        </h4>
        <div class="name-details-info">
            <ul>
                <li><span>性别</span></li>
                <li><span>                            男
                        </span></li>
            </ul>
            <ul>
                <li><span>生肖</span></li>
                <li><span>狗（阳历）</span></li>
            </ul>
            <ul>
                <li><span>公历生日</span></li>
                <li><span>时辰未知</span></li>
            </ul>
            <ul>
                <li><span>农历生日</span></li>
                <li><span>时辰未知</span></li>
            </ul>
        </div> -->
        <h4 class="g-title-primary-2">
            <span>起名结果</span>
        </h4>

        <div class="name-explain">
            <div class="name-explain-title">
                                    <div><span class="name"><i></i><i></i><em><{$xm_arr.xing1}></em></span></div>
									<{if $xm_arr.xing2}>
									<div><span class="name"><i></i><i></i><em><{$xm_arr.xing2}></em></span></div>
									<{/if}>
                                    <div><span class="name"><i></i><i></i><em><{$xm_arr.ming1}></em></span></div>
                                    <{if $xm_arr.ming2}><div><span class="name"><i></i><i></i><em><{$xm_arr.ming2}></em></span></div><{/if}>
                                <i class="nameScore"><{$xmdf}>分</i></div>
            <div class="name-explain-title">
                                    <div><span>[<{$bh_wh_arr.hzwh1}>]</span></div>
                                    <{if $xm_arr.xing2}><div><span>[<{$bh_wh_arr.hzwh2}>]</span></div><{/if}>
                                    <div><span>[<{$bh_wh_arr.hzwh3}>]</span></div>
                                    <{if $xm_arr.ming2}><div><span>[<{$bh_wh_arr.hzwh4}>]</span></div><{/if}>
                            </div>
			<{if $xmdf<60}>
			<div class="name-score">综合评价: <span>差</span></div>
            <div class="name-explan-contact">你的名字可能不是很好。强烈建议你换个名字试试，也许人生会因此而改变的。如果有条件，改个名字也未尝不可。</div>

<{elseif $xmdf>=60 && $xmdf<70}>

<div class="name-score">综合评价: <span>合格</span></div>
<div class="name-explan-contact">你的名字可能不太好，如果可能的话，不妨尝试改变一下，也许会有事半功倍之效。如果有条件，改个名字也未尝不可。</div>

<{elseif $xmdf>=70 && $xmdf<80}>

<div class="name-score">综合评价: <span>良</span></div>
<div class="name-explan-contact">你的名字可能不太理想，要想赢得成功，必须比别人付出更多的艰辛和汗水。如果有条件，改个名字也未尝不可。如果有条件，改个名字也未尝不可。</div>
<{elseif $xmdf>=80 && $xmdf<90}>

<div class="name-score">综合评价: <span>优</span></div>
<div class="name-explan-contact">你的名字取得不错，如果与命理搭配得当，相信它会助你一生顺利的，祝你好运！</div>

<{elseif $xmdf>=90}>
<div class="name-score">综合评价: <span>吉</span></div>
<div class="name-explan-contact">你的名字取得非常棒，如果与命理搭配得当，成功与惊喜将会伴随你的一生。但千万注意不要失去上进心。</div>
<{/if}>       
<p>详细解释</p>
<p><{$rssancai.content}></p>
       </div>
        <h4 class="g-title-primary-2">
            <span>天格<{$tiangearr.tiangee}>的解析</span>
        </h4>
        <div class="name-zodiac">
            <p>人格数是先祖留传下来的，其数理对人影响不大。</p>
				<p><{$rengearr.yy}></p>
				<p>详细解释:</p>
				<p><{$rengearr.content}></p>
				
        </div>        
        <hr>
        <h4 class="g-title-primary-2">
            <span>地格<{$digearr.digee}>的解析</span>
        </h4>
        <div class="name-zodiac">
            <p>
                地格数是先祖留传下来的，其数理对人影响不大。</p>
				<p><{$digearr.yy}></p>
				<p>详细解释:</p>
				<p><{$digearr.content}></p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>外格<{$waigearr.waigee}>的解析</span>
        </h4>
        <div class="name-zodiac">
            <p>
                外格数是先祖留传下来的，其数理对人影响不大。</p>
				<p><{$waigearr.yy}></p>
				<p>详细解释:</p>
				<p><{$waigearr.content}></p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>天格<{$tiangearr.tiangee}>的解析</span>
        </h4>
        <div class="name-zodiac">
            <p>
                天格数是先祖留传下来的，其数理对人影响不大。</p>
				<p><{$tiangearr.yy}></p>
				<p>详细解释:</p>
				<p><{$tiangearr.content}></p>
				
        </div>        
        <hr>   
        <h4 class="g-title-primary-2">
            <span>姓名命运</span>
        </h4>
        <div class="name-lucky">
           <p><{$waigearr.content}></p>
        </div>
		<hr>
		<h4 class="g-title-primary-2">
            <span>对三才数理的影响</span>
        </h4>
        <div class="name-zodiac">
            <p>
                您的姓名三才配置为：<em class="cRed"><{$rssancai.sancai}></em>。它具有如下数理诱导力，据此会对人生产生一定的影响。</p>
				
				<p>详细解释:</p>
				<p><{$rssancai.content}></p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>对基础运的影响</span>
        </h4>
        <div class="name-zodiac">
            <p> <{$rssancai.jcy}> <em class="cRed">（<{$rssancai.jx1}>）</em> </p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>对成功运的影响</span>
        </h4>
        <div class="name-zodiac">
            <p> <{$rssancai.cgy}> <em class="cRed">（<{$rssancai.jx2}>）</em> </p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>对人际关系的影响</span>
        </h4>
        <div class="name-zodiac">
            <p>  <{$rssancai.rjgx}> <em class="cRed">（<{$rssancai.jx3}>）</em></p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>对性格的影响</span>
        </h4>
        <div class="name-zodiac">
            <p><{$rssancai.xg}></p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>天格<?=$tiangee?>有以下数理暗示</span>
        </h4>
        <div class="name-zodiac">
            <p>  <{$tiangearr.as}></p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>人格<?=$rengee?>有以下数理暗示</span>
        </h4>
        <div class="name-zodiac">
            <p><{$rengearr.as}></p>
				
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>地格<?=$digee?>有以下数理暗示</span>
        </h4>
        <div class="name-zodiac">
            <p> <{$digearr.as}> </p>
        </div>        
        <hr>
		<h4 class="g-title-primary-2">
            <span>外格<?=$waigee?>有以下数理暗示</span>
        </h4>
        <div class="name-zodiac">
            <p> <{$waigearr.as}></p>
        </div>        
        <hr>
    </section>
    <p class="text-center"><span class="add_dashi_weixin"></span></p></main>
<p class="hd">易读网 版权所有 @ 2018-2020</p>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?94c957ff18900e576647ee370e3c025f";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>