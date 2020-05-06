<!DOCTYPE html>
<html lang="ch-ZN">

<head>
    <meta charset="UTF-8">
    <title>取名结果-名字详细解析结果-易读网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
 	<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
    <link href="/statics/ffsm/ffqm/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="/statics/ffsm/ffqm/css/mip.css">
	<link href="/statics/ffsm/ffqm/css/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
	<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body class="page-names-details mobile" site-from="wap" page-from="namedetails">
<header class="public_header J_testFixedShow">
<h1 class="public_h_con">宝宝起名</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div  class="swiper-slide-prev">
      <div>
        <img class="img_100" src="/statics/ffsm/ffqm/images/img_banner_yd.jpg" alt=""></div>
      <div class="see_carousel_info">
        <span class=""><span style="color:#da3028;">订单编号:</span><{$data.oid}></span>
	  </div>
  </div>
<main class="main-content-namelist name-details name-result">
    <section class="g-block-white name-details-content">
<div class="center clearfix">
      <div class="infor clearfix">
        <div class="infor1 left">
          <span class="key-text">性别:</span>
          <span class="value-text"><{if $data.data.gender==1}>男<{elseif $data.data.gender==2}>未知<{else}>女<{/if}></span></div>
        <div class="infor2 left">
          <span class="key-text">生肖:</span>
          <span class="value-text"><{$return.user.sx}></span></div>
      </div>
      <div class="infor-data clearfix">
        <span class="key-text left">生辰:</span>
        <div class="value-text left">
          <p><{$data.data.y}>年<{$data.data.m}>月<{$data.data.d}>日 <{$data.data.h}>时</p>
          <p><{$data.data.lDate}></p>
        </div>
      </div>
      <div class="infor-table">
        <table>
          <tbody>
            <tr>
              <th>八字</th>
              <th>年柱</th>
              <th>月柱</th>
              <th>日柱</th>
              <th>时柱</th></tr>
            <tr>
              <td>天干</td>
              <td><{$return.user.bazi.0}></td>
              <td><{$return.user.bazi.2}></td>
              <td><{$return.user.bazi.4}></td>
              <td><{$return.user.bazi.6}></td></tr>
            <tr>
              <td>地支</td>
              <td><{$return.user.bazi.1}></td>
              <td><{$return.user.bazi.3}></td>
              <td><{$return.user.bazi.5}></td>
              <td><{$return.user.bazi.7}></td></tr>
          </tbody>
        </table>
      </div>
      <div class="solution-box clearfix">
        <div class="sol-left">
          <p>本命属<{$cookies.sx}>，<{$nayin.0.layin}>命。<{$wang.wang}><{$wang.que}>；日主天干为<{$nayin.0.layin}><{$wang.wang}><{$wang.que}><{$cookies.bazi.4}>，生于<{$cookies.siji}>季。</p>
          <p>此八字喜用神「<{$return.data.xiyongshen.data.xishen}>」。</p>
          <p>
          </p>
        </div></div>
    </div>  
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
</main>
<div class="ainuo_foot_nav cl" id="testFixedBtn" style="height: 44px;">
    <ul>
     <li><a href="/"><i class="shouye_1"></i><p>测算首页</p></a></li>
     <li><a href="/?ac=history"><i class="wddd_1"></i><p>订单查询</p></a></li>
     <li><a href="/"class="botpost"><em><i class="lijics_1"></i></em><p>继续测算</p></a></li>
     <li><a href="/"><i class="gengduo_1"></i><p>更多测算</p></a></li>
     <li><a href="/?ac=member"><i class="grzx_1"></i><p>个人中心</p></a></li>
    </ul>
</div>
<style type="text/css">
.ainuo_foot_nav{display: block; padding: 2px 0; background:#fd7d9c; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width:640px;}
.ainuo_foot_nav ul{margin: 0;padding: 0;}
.ainuo_foot_nav li{width: 20%; text-align: center; float: left;}
.ainuo_foot_nav li a{width: 100%; display: block;}
.ainuo_foot_nav .foothover i{color: #f13030;}
.ainuo_foot_nav li i{display: block; line-height: 25px; height: 25px; margin: auto; padding: 0; width: 25px; overflow: hidden; background-size: 100%;}
.ainuo_foot_nav li a.botpost{position: relative; margin-top: -11px; background-color: rgba(0,0,0,0.0);}
.ainuo_foot_nav li a.botpost em{background: #ffffff; padding: 2px; border: 1px solid #ff5e5e; display: block; border-radius: 50%; width: 30px; height: 30px; margin: 0 auto; margin-bottom: 2px;padding-bottom: 0px;}
.ainuo_foot_nav li p{overflow: hidden; font-size: 12px; height: 16px; line-height: 16px; color: #fff; font-weight: 400;margin: 0;padding: 0;}
.shouye_1{background: url(/statics/ffsm/public/images/shouye.png) no-repeat;}
.wddd_1{background: url(/statics/ffsm/public/images/dingdan.png) no-repeat;}
.lijics_1{background: url(/statics/ffsm/public/images/suan.png) no-repeat;}
.gengduo_1{background: url(/statics/ffsm/public/images/gengduo.png) no-repeat;}
.grzx_1{background: url(/statics/ffsm/public/images/grzx.png) no-repeat;}
</style>
<{include file='./ffsm/footer.tpl'}>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>