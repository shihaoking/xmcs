<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title><{$ming}>有限公司的姓名吉凶评测-易读网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="statics/ffsm/gsqm/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="statics/ffsm/gsqm/gsqm.css" rel="stylesheet" type="text/css"/>
<link href="statics/ffsm/gsqm/style.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header class="public_header J_testFixedShow">
<h1 class="public_h_con">公司测名</h1>
<a class="public_h_home" href="/"></a><a href="?ac=history" class="public_h_menu">我的测算</a></header>
<div class="public_banner">
	<img src="statics/ffsm/gsqm/images/gsqm1.jpg" alt="公司起名"/>
</div>

<section class="page3-bg-1">
  <div class="box"></div>
  <div class="material-box">
    <div class="material-img1"></div>
    <div class="material-img2"></div>
    <div class="top clearfix">
      <em class="center-text">【<{$ming}>有限公司】名称吉凶测算</em>
    </div>
    <div class="center clearfix">
      <div class="infor clearfix">
        <div class="infor1 left">
          <span class="key-text">性别:</span>
          <span class="value-text"><{if $data.data.gender==1}>男<{else}>女<{/if}></span></div>
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
        <p class="key-text">您的五行八字资料</p>
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
            <div class="mod_box_t3 fn_gsqm_detail">
                  <div class="box_con">
                        <div class="gsqm_detail_hd"><{$ming}>有限公司分析结果如下</div>
                        <div class="gsqm_detail_table">
                            <table>
                                <tr class="tr_th">
                                    <th><span>简体</span></th>
                                    <th><span>繁体</span></th>
                                    <th><span>拼音</span></th>
                                    <th><span>五行</span></th>
                                    <th><span>笔画</span></th>
                                    
                                </tr>
                                <{if $a1arr.a1!=''}>
								<tr>
                                    <td><{$a1arr.a1}></td>
                                    <td><{$a1arr.a1gb}></td>
                                    <td class="py"><{$a1arr.a1py}></td>
                                    <td><{$a1arr.hzwh1}></td>
                                    <td><{$a1arr.bihua1}></td> 
                                </tr>
                               <{/if}>
                               
                                <{if $a2arr.a2!=''}>
								<tr>
                                    <td><{$a2arr.a2}></td>
                                    <td><{$a2arr.a2gb}></td>
                                    <td class="py"><{$a2arr.a2py}></td>
                                    <td><{$a2arr.hzwh2}></td>
                                    <td><{$a2arr.bihua2}></td> 
                                </tr>
                               <{/if}>
                               
                                <{if $a3arr.a3!=''}>
								<tr>
                                    <td><{$a3arr.a3}></td>
                                    <td><{$a3arr.a3gb}></td>
                                    <td class="py"><{$a3arr.a3py}></td>
                                    <td><{$a3arr.hzwh3}></td>
                                    <td><{$a3arr.bihua3}></td> 
                                </tr>
                               <{/if}>
                               
                                <{if $a4arr.a4!=''}>
								<tr>
                                    <td><{$a4arr.a4}></td>
                                    <td><{$a4arr.a4gb}></td>
                                    <td class="py"><{$a4arr.a4py}></td>
                                    <td><{$a4arr.hzwh4}></td>
                                    <td><{$a4arr.bihua4}></td> 
                                </tr>
                               <{/if}>
                               
                                <{if $a5arr.a5!=''}>
								<tr>
                                    <td><{$a5arr.a5}></td>
                                    <td><{$a5arr.a5Gb}></td>
                                    <td class="py"><{$a5arr.a5py}></td>
                                    <td><{$a5arr.hzwh5}></td>
                                    <td><{$a5arr.bihua5}></td> 
                                </tr>
                               <{/if}>
                               
                                <{if $a6arr.a6!=''}>
								<tr>
                                    <td><{$a6arr.a6}></td>
                                    <td><{$a6arr.a6gb}></td>
                                    <td class="py"><{$a6arr.a6py}></td>
                                    <td><{$a6arr.hzwh6}></td>
                                    <td><{$a6arr.bihua6}></td> 
                                </tr>
                               <{/if}>                               
                            </table>
                        </div>
                        <div class="gsqm_detail_item">
                            <P><strong>数 理：</strong><{$allbihua}></P>
                            <p><strong>吉 凶：</strong><{$company.t1}></p>
                            <p><strong>诗 解：</strong><{$company.c1}></p>
                            <p><strong>含 义：</strong><{$company.t2}>具体<{$company.c2}></p>
                            <div class="tips_area">以上分析结果仅从数理上简单分析，没有考虑到其他企业法人个人信息等的配合。</div>
                            
                        </div>
                  </div>
                </div>
      <div class="solution-box clearfix">
        <div class="sol-left">
          <p>本命属<{$cookies.sx}>，<{$nayin.0.layin}>命。<{$wang.wang}><{$wang.que}>；日主天干为<{$nayin.0.layin}><{$wang.wang}><{$wang.que}><{$cookies.bazi.4}>，生于<{$cookies.siji}>季。</p>
          <p>此八字喜用神「<{$return.data.xiyongshen.data.xishen}>」。</p>
        </div></div>
    </div>
  </div>
<div class="material-box">
      <em class="top center-text">【<{$data.data.username}>】的八字命盘</em>
    </div>
  <div class="content-box page3-content">
    <div class="title clearfix" style="display: flex">
      <span class="icon"></span></div>
    <div class="list-box list1">
      <table>
        <tbody>
          <tr>
            <th>八字</th>
            <th>年柱</th>
            <th>月柱</th>
            <th>日柱</th>
            <th>时柱</th></tr>
          <tr>
            <!--1=天干 2地支 3本气 4余气 5杂气-->
            <th>天干</th>
            <td><{$return.user.bazi.0}>/<{$pp.shishen3}></td>
            <td><{$return.user.bazi.2}>/<{$pp.shishen1}></td>
            <td><{$return.user.bazi.4}>/<{$pp.shishen4}></td>
            <td><{$return.user.bazi.6}>/<{$pp.shishen2}></td></tr>
          <tr>
            <th>地支</th>
            <td><{$return.user.bazi.1}>/<{$pp.shishen1}></td>
            <td><{$return.user.bazi.3}>/<{$pp.shishen2}></td>
            <td><{$return.user.bazi.5}>/<{$pp.shishen3}></td>
            <td><{$return.user.bazi.7}>/<{$pp.shishen4}></td></tr>
          <tr>
            <th>藏干</th>
            <td><{$pp.zanggan1}></td>
            <td><{$pp.zanggan2}></td>
            <td><{$pp.zanggan3}></td>
            <td><{$pp.zanggan4}></td></tr>
          <tr>
            <th>命宫</th>
            <td colspan="4"><{$pp.minggong}></td></tr>
          <tr>
            <th>胎元</th>
            <td colspan="4"><{$pp.taiyuan}></td></tr>
          <tr>
            <th>胎息</th>
            <td colspan="4"><{$return.user.bazi.6}><{$return.user.bazi.7}></td></tr>
        </tbody>
      </table>
    </div>
    <div class="list-box list3">
<div class="material-box">
      <em class="top center-text">【<{$data.data.username}>】的五行综述</em>
    </div>
      <table>
        <tbody>
          <tr>
            <th>八字</th>
            <th><{$return.user.bazi.0}><{$return.user.bazi.1}></th>
            <th><{$return.user.bazi.2}><{$return.user.bazi.3}></th>
            <th><{$return.user.bazi.4}><{$return.user.bazi.5}></th>
            <th><{$return.user.bazi.6}><{$return.user.bazi.7}></th></tr>
			<tr>
            <th>五行</th>
            <td><{$cookies.wh.0}><{$cookies.wh.1}></td>
            <td><{$cookies.wh.2}><{$cookies.wh.3}></td>
            <td><{$cookies.wh.4}><{$cookies.wh.5}></td>
            <td><{$cookies.wh.6}><{$cookies.wh.7}></td>
                </tr>
        </tbody>
      </table>
    </div>
</div>
  <div class="content-box page3-content">
    <div class="title" style="display: flex">
      <span class="icon"></span></div>
    <div class="content-warp1">
      <div class="warp1-text-box">
        <h3>●事业分析:
          <span></span></h3>
        <div class="warp1-text">
		<p><{$rglm.syfx}></p>
		<p><{$tywh.hyhw}></p>
		</div>
      </div>
      <div class="warp1-text-box">
        <h3>●财运分析:
          <span></span></h3>
        <div class="warp1-text">
          <p><{$rglm.cyfx}></p>
        </div>
      </div>
      <div class="warp1-text-box">
        <h3>●三命通会:
          <span></span></h3>
        <div class="warp1-text">
          <p><{$sxth.tf1}></p>
          <p><{$sxth.tf2}></p>
        </div>
      </div>
    </div>
  </div>
</section>
<div style="margin-bottom:60px;"></div>
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
.ainuo_foot_nav{display: block; padding: 2px 0; background:#bb001c; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width:640px;}
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