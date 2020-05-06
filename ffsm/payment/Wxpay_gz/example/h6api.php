
<!DOCTYPE html>

<html>

<head>

<title>微信安全支付</title>

<meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=no;" />

<meta name= "format-detection" content= "telephone=no" />

<style type="text/css">

@CHARSET "UTF-8";

.loading_wrap{position:fixed;left:0;top:0;right:0;bottom:0;background:transparent;}
.loading{position:absolute;left:50%;top:50%;margin-left:-45px;margin-top:-45px;width:90px;height:90px;background:url(../image/loading.png) no-repeat;background-size:360px 90px;}
.loading.animate{-webkit-animation:0.6s animate_loading steps(4) infinite;}
@-webkit-keyframes animate_loading{
    0%{background-position:0 50%;}
    100%{background-position:-360px 50%;}
}

@CHARSET "UTF-8";
html {
  font-size: 62.5%;
  -webkit-font-smoothing: antialiased;
}
body {
  text-align: center;
  font-family: "黑体", "Microsoft YaHei", "Helvetica Neue", Helvetica, STHeiTi, sans-serif;
  -webkit-text-size-adjust: none;
}
* {
  margin: 0;
  padding: 0;
  list-style: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

input,textarea,select,button {
  -webkit-appearance: none;
  font-size: 1rem;
  border: 0;
  outline: none;
}
input,a,span,button {
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.pop_wraper{
  position:fixed;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background:rgba(0,0,0,0.5);
  display:table;
  height:100%;
  width:100%;
  z-index:99999;
}
.pop_outer{
  display:table-cell;
  vertical-align:bottom;
}
.pop_midder{vertical-align: middle;}
.pop_tip{background: #fff;border-radius: 6px;margin: 0 3rem;}
.pop_tip_p1{padding: 5.5rem 1.5rem 2.5rem 1.5rem;font-size: 1.6rem;}
.pop_tip_p2{padding: 1.5rem;}

.pop_tip_p3{display: -webkit-box;margin-top: 1.5rem;}
.pop_tip_p3 span{display: block;-webkit-box-flex: 1;width: 1px;}
.p_btn {-webkit-user-select:none;height: 5rem;line-height: 5rem;font-size: 1.7rem;color: #666;width: 100%;background: transparent;}
.cols {color: #5F73C5;}
.p_btn:active{color: #999;background:rgba(0,0,0,0.1);}
.cols:active{color: #243B97;}
.pop_tip_p4{margin: 0 1.5rem;padding: 1.5rem 0 2rem 0;font-size: 2rem;color: #5F73C5;}
.pop_tip_p5{margin: 0 1.5rem;font-size: 1.5rem;color: #000;text-align: left;}
.pop_tip_p5.cent{text-align:center;}
.border{position:relative;}
.border:before{
    content:"";position:absolute;left:0;top:0;right:-100%;bottom:-100%;
    -webkit-transform:scale(0.5);-webkit-transform-origin:0 0;pointer-events:none;
}
.b_full:before{border:1px solid #ddd;}
.b_btm:before{border-bottom:1px solid #ddd;}
.b_lft:before{border-left:1px solid #ddd;}
.b_rgt:before{border-right:1px solid #ddd;}
.b_top:before{border-top:1px solid #ddd;}
.b_top_btm:before{border-top:1px solid #ddd;border-bottom:1px solid #ddd;}

</style>

<link href="/assets/templates/pay/css/pop.css" rel="stylesheet">

<script type="text/javascript">

function query(){

doRequestUsingGet('https://statecheck.swiftpass.cn/pay/unifiedCheck?uuid=1f663485561231110d77e330d1a0c8886','http://payment.d1xz.net/notice/swiftpass/order_sn/0L2017120822003349495056/pay_type/1.html');

}

window.setInterval(query,"8000");

var xmlHttp;

function createxmlHttpRequest() {

if(window.ActiveXObject)

xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

else if(window.XMLHttpRequest)

xmlHttp = new XMLHttpRequest();

}

var callback;

function doRequestUsingGet(queryUrl,callbackUrl) {

createxmlHttpRequest();

callback = callbackUrl;

var queryString = queryUrl;

queryString+="&timestamp="+new Date().getTime();

xmlHttp.open("GET",queryString);

xmlHttp.onreadystatechange = handleStateChange;

xmlHttp.send(null);

}

function handleStateChange() {

var obj = eval('(' + xmlHttp.responseText + ')');

if(obj.status == '201'){

top.location.href=callback;

}

}

function getCookie(cname){

var name = cname + "=";

var ca = document.cookie.split(';');

for(var i=0; i<ca.length; i++) {

var c = ca[i];

while (c.charAt(0)==' ') c = c.substring(1);

if (c.indexOf(name) != -1) return c.substring(name.length, c.length);

}

return null;

}

function setCookie(name,value){

var exp = new Date();

exp.setTime(exp.getTime() + 10*60*1000);

document.cookie = name + "=" + value + ";expires=" + exp.toGMTString();

}

function onloadAction(){

var co = getCookie("tokenid"+encodeURI("weixin://wap/pay?prepayid=wx20171208220040e3ec2e32720510837547&package=642929365&noncestr=1512741640&sign=98036a08828f394d138c96c2378980a6"));

setTimeout(function(){

var co = getCookie("tokenid"+encodeURI("weixin://wap/pay?prepayid=wx20171208220040e3ec2e32720510837547&package=642929365&noncestr=1512741640&sign=98036a08828f394d138c96c2378980a6"));

if(co == null){

setCookie("tokenid"+encodeURI("weixin://wap/pay?prepayid=wx20171208220040e3ec2e32720510837547&package=642929365&noncestr=1512741640&sign=98036a08828f394d138c96c2378980a6"),"1");

window.location.href="weixin://wap/pay?prepayid=wx20171208220040e3ec2e32720510837547&package=642929365&noncestr=1512741640&sign=98036a08828f394d138c96c2378980a6";

}

},500);

}

function doCallback(){

window.location.href="http://payment.d1xz.net/notice/swiftpass/order_sn/0L2017120822003349495056/pay_type/1.html";

}

</script>

</head>

<body onload="onloadAction()">

<div class="loading_wrap">

<span class="loading animate"></span>

</div>

<div class="pop_wraper" id="alert_box1">

<div class="pop_outer pop_midder">

<div class="pop_tip">

<p class="pop_tip_p4">支付确认</p>

<p class="pop_tip_p5">1、请在微信内完成支付，支付成功页面自动跳转</p>

<p class="pop_tip_p5">2、如果您未支付，请点击“去支付”完成支付</p>

<p class="pop_tip_p5">3、如果您未安装微信6.0.2版本及以上版本客户端，请先安装并登陆微信完成支付</p>

<p class="pop_tip_p3 border b_top">

<span class="border b_rgt"><button class="p_btn" onclick="doCallback()">关闭</button></span>

<span><a id="cli" class="p_btn cols" style="text-decoration: none" href="weixin://wap/pay?prepayid=wx20171208220040e3ec2e32720510837547&package=642929365&noncestr=1512741640&sign=98036a08828f394d138c96c2378980a6">去支付</a></span>

</p>

</div>

</div>

</div>

</body>

</html>