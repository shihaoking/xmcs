<!DOCTYPE html>
<html lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>权威老师起名预约订单</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="format-detection" content="email=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link href="/statics/ffsm/qiming/css/style.min.css" rel="stylesheet" type="text/css" />
  <script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
 </head>
 <body>
  <header class="public_head">
   <a href="javascript:;" onclick="history.go(-1);" class="public_head_back"></a>
   <h1 class="public_head_title">预约咨询</h1>
   <a href="/?ac=history" class="public_head_right"></a>
  </header>
  <div class="order_box_pay">
   <div class="obp_user">
    <div class="obp_title">
     起名预约订单基本信息
    </div>
    <div class="obp_num">
     <span class="dian"></span>
     <span>订单编号：<{$oid}></span>
     <span class="dian"></span>
    </div>
    <div class="obp_info">
     <div class="obp_info_in">
      <div class="obp_info_txt">
       <span class="pic"><img src="<{$member_xz.headimgurl}>" alt="头像" /></span>
       <span class="n"><em><{$member_xz.nickname}></em>（<{if $member_xz.sex==1}>男<{elseif $member_xz.sex==2}>女<{else}>未知<{/if}>）</span>
      </div>
     </div>
     <p class="obp_info_words"><em>预约起名</em>：专家一对一起名服务</p>
	 <p class="obp_info_words"><em>姓氏</em>：<span class="yellow"><{$names.username}></span></p>
	 <p class="obp_info_words"><em>性别</em>：<span class="yellow"><{if $names.gender==1}>男<{else}>女<{/if}></span></p>
     <p class="obp_info_words"><em>出生状况</em>：<span class="yellow"><{if $names.cszt==1}>已出生<{else}>未出生<{/if}></span></p>
     <p class="obp_info_words"><em>出生日期</em>：<span class="yellow"><{$names.y}>年<{$names.m}>月<{$names.d}>日<{if $names.h}><{$names.h}><{else}>未知<{/if}>时</span></p>
     <p class="obp_info_words"><em>预约老师</em>：<span class="yellow"><{$teacher}></span></p>
     <p class="obp_info_words"><em>手机</em>：<span class="yellow"><{$names.phone}></span></p>
     
    </div>
   </div>
   <div class="obp_pirce">
    <div class="obp_pirce_top">
     咨询费用：
     <strong>￥<{$money}></strong>元/次
    </div>
    <p>温馨提示：预约成功后，我们会在24小时内联系您，请耐心等待。</p>
    <!-- 付款模块 -->
    <div class="public_pay_box">
     <a class="baidu" target="_self" href="<{$cashier_url}>">立即支付</a>
    </div>
   </div>
  </div>
<p class="bottom_words">关注百度【鑫旺网】熊掌号，了解预约进展</p>
<a href="javascript:;" class="bottom_agreement" id="protocolShowBtn">《百度服务用户协议》</a>
<div class="protocol_pop_box" id="protocolPopBox">
    <div class="ppb_content">
        <div class="ppb_title">
            用户协议
        </div>
        <div class="ppb_text">
            <p>
                百度提醒您：在使用百度搜索引擎（以下简称百度）及鑫旺网平台服务前，请您务必仔细阅读并透彻理解本声明。您可以选择不使用百度，但如果您使用百度，您的使用行为将被视为对本声明全部内容的认可。
            </p>
            <p>
                • 鑫旺网平台中电话咨询、在线咨询信息、挂号及其他服务均由第三方服务商提供，不代表百度观点和立场。百度对第三方服务的可用性、真实性、准确性或有效性以及服务质量不提供任何形式的担保或保证。
            </p>
            <p>
                • 在使用第三方服务时，请您务必注意阅读第三方服务商的相关服务条款及注意事项，您对第三方服务的使用，将视为您同意上述条款；第三方服务商及其专家向您做出的任何建议、承诺、声明均由第三方自行承担，与百度无关。
            </p>
            <p>
                • 您在使用第三方服务之前，请您自行核实第三方公司的服务质量、价格等交易条件是否合理，在符合您的全部要求后，您再接受其提供的服务。
            </p>
            <p>
                • 您应当知晓，第三方提供的咨询服务、建议等仅供您参考，不能作为您决策的直接依据，也不能替代线下专业服务。服务中涉及生命健康、金钱交易等可能对您产生重要影响的事项的，请您务必慎重决策。
            </p>
            <p>
                • 您在使用第三方服务时发生的任何问题，均应由您与第三方服务商自行协商解决。如给您造成任何损失的，均由第三方服务商自行承担全部责任，百度可以为您提供必要的协助。
            </p>
            <p>
                • 您理解并保证，您对百度搜索引擎及鑫旺网平台的使用，不会违反任何适用的法律、法规、政策及公共道德准则，也不会损害任何第三方的合法权益。
            </p>
            <p>
                • 您理解并同意，百度有权根据平台规则以及自身需要，随时作出删除相关信息、终止服务提供等处理，而无需征得您的同意。
            </p>
            <p>
                • 您理解并同意，为获得某些服务，您可能会被要求提供一些个人信息（如手机号、身份信息等）以便服务的正常开展。这些信息将被实际提供服务的第三方服务商所获知。如您无法接受，您应及时终止使用本服务。
            </p>
        </div>
        <div class="ppb_close" id="protocolHideBtn">
            <b>
                关闭
            </b>
        </div>
    </div>
</div>
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