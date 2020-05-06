<!DOCTYPE html>
<html lang="ch-ZN">

<head>
    <meta charset="UTF-8">
    <meta name="applicable-device" content="mobile">
    <meta name="viewport"
          content="width=720,width=device-width, initial-scale=1,  initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title>起名大师</title>
    <script>
        (function (doc, win) {
            var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (!clientWidth) return;
                    var fts = clientWidth / 10;
                    if (fts < 32) {
                        fts = 32;
                    } else if (fts > 72) {
                        fts = 72;
                    }
                    docEl.style.fontSize = fts + 'px';
                };
            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvt, recalc, false);
            doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
    </script>
    <link rel="stylesheet" href="statics/ffsm/mfqm/css/style.css">
    <link rel="stylesheet" href="statics/ffsm/mfqm/css/fonts.css">
    <link rel="stylesheet" href="statics/ffsm/mfqm/css/header.css">
    <link rel="stylesheet" href="statics/ffsm/mfqm/css/formorder.css">

</head>

<body class="qm page-buy" site-from="wap3" page-from="pay">
<div class="wrap">
    <header class="site-header">
        <a href="statics/ffsm/mfqm//" class="btn-back">返回</a>
        <a href="statics/ffsm/mfqm//orders/find" class="my-order">我的订单</a>
        <span class="smTitle jingdianlibian">起名大师</span>
    </header>
    <div class="sm_banner">
        <a href="statics/ffsm/mfqm/javascript:">
            <img src="statics/ffsm/mfqm/images/wyqm_banner2.png" alt="">
        </a>
    </div>
    <div class="a3_bd a3_ds">
        <p>
            <b>大师简介：</b>王道子，周易名家，自幼学习易学、推背图，深得家传。精通八卦六爻、梅花易数、奇门遁甲。研究起名、改名36年，拥有深厚的起名经验。主张弘扬中国传统文化，将三才五格、五行八字以及形音义融于易学起名中。
        </p>
    </div>
    <div class="form-order-wrapper style-1">
        <div class="dashiPayOrder fixFlag">
            <div class="form-groups formUserInfos">
                <input type="hidden" value="wap3" id="pay_from"><input type="hidden" value="1" id="order_status">
                <div class="form-group userInfoFamilyName formFamlyName">
                    <p class="order-info-title formTitle">姓氏<i>：</i></p>
                    <p class="order-info-content formContent"  style="padding-left: 0"><span>的</span></p>
                </div>
                <div class="form-group userInfoGender formSex">
                    <p class="order-info-title formTitle">性别<i>：</i></p>
                    <p class="order-info-content formContent"  style="padding-left: 0">
                        <span>
                                                            男
                                                    </span>
                    </p>
                </div>
                <div class="form-group userInfoDateSolar formDate">
                    <p class="order-info-title formTitle">阳历<i>：</i></p>
                    <p class="order-info-content formContent contentUnknow" style="padding-left: 0"><span>
                            时辰未知
                        </span></p>
                </div>
                <div class="form-group userInfoDateLunar formLunar">
                    <p class="order-info-title formTitle">农历<i>：</i></p>
                    <p class="order-info-content formContent contentUnknow"  style="padding-left: 0"><span>时辰未知</span></p>
                </div>
            </div>
            <div class="text-center orderInfo">
                <p class="order-price">
                    <span class="hotPrice"><del class="priceDiscount">原价:98</del>优惠价:<i class="text-primary-red price">0.01</i> 元</span>
                </p>
                <p class="order-num">订单号：
                    <span id="wap_order_num" class="text-primary-red">2018072511215623937</span>
                </p>
                <div style="width:100%;margin-bottom:30px;display:none;">
                    <span class="alipay_lijian" style="color:#F00;">支付宝支付立减1.00元</span>
                </div>
            </div>
			<!--<form action="http://qumingweb.huduntech.com/api/pay/pay_wap.php" target="_blank" method="get" -->
            <form action="" target="_blank" method="get"
                  onsubmit="return addLoopCookie();" id="payOrder">
                <input type="hidden" name="order_num" value="2018032616575758" id="order_num">
                <input type="hidden" name="pay_type" value="2" id="order_pay_type">
                <ul class="form-order-pay pay-methods payList payMethods">
                    <li class="btn-payment wxpay">
                        <a class="purl pay-weixinpay" href="statics/ffsm/mfqm/orders/89/real_pay?type=wechat" data-text="1301" data-paytype="2">
                            <span>微信支付</span>
                        </a>
                    </li>
                    <li class="btn-payment wxpay">
                        <a class="purl" style="color: #6cb333;background: none;font-size: .4rem;padding-bottom: .5rem;" href="statics/ffsm/mfqm/orders/2018072511215623937">微信支付成功后请点击此处</a>
                    </li>
                    <li class="btn-payment alipay">
                        <a class="purl pay-alipay" href="statics/ffsm/mfqm/orders/89/real_pay?type=alipay" data-text="12" data-paytype="1">
                            <span>支付宝支付</span>
                        </a>
                    </li>
                </ul>
            </form>
            <div class="addWeixinBox">
                <span class="addWeixin add_dashi_weixin"></span>
                <img src="statics/ffsm/mfqm/images/icon-pay-safety.png">
                <span style="color:#0D8000">支付系统已经经过安全联盟认证请放心使用</span>
            </div>
        </div>
    </div>
    <div class="title-primary title-basic-info jingdianlibian">
        <h4 class="title-bg-primary jingdianlibian">基本信息</h4>
    </div>
    <div id="showme" class="wyqm">
        <div class="wyqmInfoToShow">
            <span class="qm_form_bd qm_form_t_l"></span>
            <span class="qm_form_bd qm_form_t_r"></span>
            <span class="qm_form_bd qm_form_b_l"></span>
            <span class="qm_form_bd qm_form_b_r"></span>
            <h4 class="wyqmInfoTitle jingdianlibian">解锁基本信息</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-000.png">
            <h4 class="wyqmInfoTitle jingdianlibian">解锁五行分析</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-001.png">
            <h4 class="wyqmInfoTitle jingdianlibian">解锁强度分析</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-002.png">
            <h4 class="wyqmInfoTitle jingdianlibian">解锁八字分析</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-003.png">
            <h4 class="wyqmInfoTitle jingdianlibian">解锁吉祥分析</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-004.png">
            <h4 class="wyqmInfoTitle jingdianlibian">解锁生肖喜忌</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-005.png">
            <h4 class="wyqmInfoTitle jingdianlibian">姓名方案一</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-006.png">
            <h4 class="wyqmInfoTitle jingdianlibian">姓名方案二</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-007.png">
            <h4 class="wyqmInfoTitle jingdianlibian">姓名方案三</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-008.png">
            <h4 class="wyqmInfoTitle jingdianlibian">姓名方案四</h4>
            <img src="statics/ffsm/mfqm/images/wyqminfotoshow-009.png">
        </div>
        <div class="latestOrder wyqm_wrap qmSect">
            <h4 class="wyqmInfoTitle jingdianlibian">最新订单</h4>
            <div class="latersMove">
                <ul class="latestOrderList" id="latersMovelist"></ul>
            </div>
        </div>
    </div>
</div>
<div class="fix jingdianlibian btnUnlockFix">
    <a href="statics/ffsm/mfqm/javascript:;" id="unlock">立即获取吉祥美名</a>
</div>
<script src="statics/ffsm/mfqm/js/jquery.js"></script>
<script src="statics/ffsm/mfqm/js/dayselect.js"></script>
<script src="statics/ffsm/mfqm/js/calendar.min.js"></script>
<script src="statics/ffsm/mfqm/js/ntog.js"></script>
<script src="statics/ffsm/mfqm/js/cookie.js"></script>
<script src="statics/ffsm/mfqm/js/jquery.kxbdmarquee.js"></script>
<script src="statics/ffsm/mfqm/js/main.js"></script>
<script src="statics/ffsm/mfqm/js/pagebuy.js"></script>
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
