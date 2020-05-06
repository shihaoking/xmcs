<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>八字精批测算结果-易读网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/bazimf/page1.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
	<h1 class="public_h_con">八字精批结果</h1>
	<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<section class="page3-bg-1">
<img style="width: 100%;" src="/statics/ffsm/bazimf/images/bzjp_1.png" alt="八字">
  <div class="material-box">
    <div class="material-img1"></div>
    <div class="material-img2"></div>
    <div class="top clearfix">
      <em class="left center-text">您输入的个人资料</em>
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
      <div class="solution-box clearfix">
        <div class="sol-left">
          <p>本命属<{$cookies.sx}>，<{$nayin.0.layin}>命。<{$wang.wang}><{$wang.que}>；日主天干为<{$nayin.0.layin}><{$wang.wang}><{$wang.que}><{$cookies.bazi.4}>，生于<{$cookies.siji}>季。</p>
          <p>
          </p>
        </div>
        <!--<div class="sol-right">-->
        <!--<img src="//statics/ffsm/bazimf/images/pic8.png" alt="">-->
        <!--</div>--></div>
    </div>
  </div>
  <div class="content-box page3-content">
    <div class="title clearfix" style="display: flex">
      <img style="text-align: center;margin: 2% auto;" src="/statics/ffsm/bazimf/images/pic-text4.png" alt=""></div>
    <div class="list-box list1">
      <h2 class="clearfix">
        <span class="icon icon1"></span>
        <em>八字排盘</em></h2>
      <div class="list-text">
        <span class="red">提示:</span>
        <span>八字命盘从阴阳干支三合历取得。上排是天干，由五行「金水木火土」轮流排列。下排是地支，用十二生肖顺序排列。十二生肖可转换成五行。</span></div>
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
    <!--<div class="list-box list2">
      <h2 class="clearfix">
        <span class="icon icon2"></span>
        <em>吉神凶煞</em></h2>
      <table>
        <tbody>
          <tr>
            <th>四柱</th>
            <th>神煞</th></tr>
          <tr>
            <th>年柱</th>
            <td>月德 天乙贵人</td></tr>
          <tr>
            <th>月柱</th>
            <td>病符 亡神 反朝桃花 四大空亡 天福贵 福星贵 截路空亡 大败</td></tr>
          <tr>
            <th>日柱</th>
            <td>福德 天喜 桃花 绞煞 天德 流霞 阴阳差错 交神</td></tr>
          <tr>
            <th>时柱</th>
            <td>岁破 灾煞 天哭</td></tr>
        </tbody>
      </table>
    </div>-->
    <div class="list-box list3">
      <h2 class="clearfix">
        <span class="icon icon3"></span>
        <em>五行综述</em></h2>
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
      <img style="text-align: center;margin: 2% auto;" src="/statics/ffsm/bazimf/images/pic-text2.png" alt=""></div>
    <div class="content-warp1">
      <div class="warp1-text-box">
        <h3>●性格分析:
          <span></span></h3>
        <div class="warp1-text">
		  <p><{$xgfx}></p>
          <p><{$rglm.xgfx}></p>
          </div>
      </div>
      <div class="warp1-text-box">
        <h3>●爱情分析:
          <span></span></h3>
        <div class="warp1-text">
		<p>您命中有:红艳桃花<{if $return.data.zonghe.th}><{$return.data.zonghe.th}><{else}>1<{/if}>朵</p>
          <p><{$rglm.aqfx}></p></div>
      </div>
      <div class="warp1-text-box">
        <h3>●事业分析:
          <span></span></h3>
        <div class="warp1-text">
		<p><{$rglm.syfx}></p>
		<p><{$tywh.hyhw}></p>
		</div>
      </div>
      <div class="warp1-text-box">
        <h3>●健康分析:
          <span></span></h3>
        <div class="warp1-text">
		<p><{$return.data.rgxx.jkfx}></p>
		<p>易患疾病:<{$return.info.wharr.whjk.jb}></p>
		<p>易发症状:<{$return.info.wharr.whjk.zz}></p>
		<p>从中医养生上来说，您基本上是<font color="#ff4632"><{$return.info.wharr.wang}></font>型人。</p>
		<p>养生要点:<{$return.info.wharr.whjk.yd}></p>
		<p>生活起居:<{$return.info.wharr.whjk.sh}></p>
		<p>饮食调养:<{$return.info.wharr.whjk.ys}></p>
		<p>保健膳食:<{$return.info.wharr.whjk.bj}></p></div>
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
      <div class="warp1-text-box">
        <h3>●未来一年:
          <span></span></h3>
        <div class="warp1-text">
          <p><{$myq_text}></p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--<div style="background-color:#FFFDE5;border:1px solid #E10000;border-radius:8px;color:#000000;font-size:24px;text-align:center;margin:30px 14px;">
  <div style="width:90%;margin:0 auto;">
    <img src="/statics/ffsm/bazimf/images/top.png" style="margin:.4rem 0;     height: auto;
    max-width: 100%">
    <p style="text-align:left;">助你在狗年预先知道财运、事业、爱情、健康等走势。
      <span style="color:#E10000">及时调整方向，逢凶化吉，走向成功。</span></p>
    <div onclick="document.getElementById('guanzhu').style.display='block'" style="color:#ffffff;background-color:#E10000;height:80px;line-height:80px;border-radius:10px;margin:30px 0;font-size:36px;">免费领取</div></div>
  <div id="guanzhu" style="width:80%;margin:0 auto;margin-top:40px;display:none;">
    <p>步骤一 : 微信扫码关注</p>
    <p>或长按复制微信号添加 :
      <span style="color:#E10000;">yiduyixue</span></p>
    <img src="https://www.yiabs.com/weixin.jpg" style="margin:30px 0;width:60%;">
    <p>步骤二 : 在底栏选择相关功能"
      <span style="color:#E10000">大师亲算</span>"</p>
</div></div>-->
<!--<section class="paage3-bg-2">
  <a href="?c=index&amp;a=index&amp;luopan_iphone">
    <div class="btn-img1"></div>
  </a>
  <div class="submit-evaluation">
    <div class="list clearfix">
      <div class="key-text">您的评价:</div>
      <div class="start-list">
        <span class="start"></span>
        <span class="start"></span>
        <span class="start"></span>
        <span class="start"></span>
        <span class="start"></span>
      </div>
    </div>
    <form id="feedback_" method="post" action="index.php?a=insertFeedback&amp;c=index">
      <div class="list clearfix">
        <div class="key-text">您的昵称:</div>
        <div class="input-box">
          <input type="text" name="nick" placeholder="（不填写默认为匿名）">
          <input type="hidden" name="ordercode" value="BAZI-1534234262HN07N"></div>
      </div>
      <div class="textarea-box">
        <textarea id="feedback_content" name="content" maxlength="200" placeholder="请在此留下您的评价及建议，我们将在您的督促下不断提高我们的服务品质。"></textarea>
      </div>
    </form>
    <div class="btn-img2" id="tijiao"></div>
  </div>
  <style>.icon_head { float: left; width: 25%; text-align: center; color: #666666; margin-bottom: .2rem; font-size: .26rem; } a{ text-decoration: none; outline: 0; } a>img{ width:60%; } .icon_clear{ clear: both; }</style>
  <div style="border-radius:8px;color:#000000;font-size:.32rem;text-align:center;margin-top:.32rem;margin-bottom:.32rem;">
    <div style="color:red">热门测算</div>
    <section class="sub01" style="margin-top:.26rem;">
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_liunian.png">
        <div>2018运势</div></a>
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_jingpi.png">
        <div>八字算命</div></a>
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_caiyun.png">
        <div>一生财运</div></a>
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_hehun.png">
        <div>八字合婚</div></a>
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_dayun.png">
        <div>未来十年</div></a>
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_qiming.png">
        <div>多福起名</div></a>
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_taohua.png">
        <div>感情运势</div></a>
      <a class="icon_head" href="/">
        <img src="/statics/ffsm/bazimf/images/icon_yinyuan.png">
        <div>注定姻缘</div></a>
      <div class="icon_clear"></div>
    </section>
  </div>
</section>-->
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
.ainuo_foot_nav{display: block; padding: 2px 0; background:#ff2e0c; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width:640px;}
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