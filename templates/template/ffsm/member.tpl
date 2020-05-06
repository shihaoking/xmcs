<!DOCTYPE html>
<html>
<head>
<title>会员中-个人推广分销中心-鑫旺网</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="format-detection" content="telephone=no">
<SCRIPT language=javascript src="/statics/user/js/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="/statics/user/js/layer.js"></SCRIPT>
<script type="text/javascript" src="/statics/user/js/webuploader.min.js"></script>
<script type="text/javascript" src="/statics/user/js/upload.js"></script>
<!--a-->
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link rel="stylesheet"href="/statics/user/css/frozen.min.css">
<link rel="stylesheet"href="/statics/user/css/style.min.css">
<style type="text/css">
#footer{height:56px;}#footer i{font-size:1.6rem}#footer li.active,#footer li:active,#footer li:hover{font-size:.7rem}
.ui-tiled li{font-size:.7rem}
</style> 
<script type="text/javascript">  
function copyUrl2()  
{  
  var Url2=document.getElementById("name");  
  Url2.select(); 
  document.execCommand("Copy");
  alert("推广链接复制成功！");  
}  
</script> 
<style>
.open_vip{
background-color: lightcyan;;
}
.ui-border li i em{
font-size: 0.75rem;
}
.aboutpic li{
margin-top: 0.6rem
}
.aboutpic li i img{
width: 2.5rem;
height: 2.5rem;
}
.a-upload {
    padding: 5px 5px;
    height: 26px;
    line-height: 26px;
    position: relative;
    cursor: pointer;
    color: #888;
    background: #fafafa;
    border: 1px solid  rgba(0, 0, 0, .2);
    border-radius: 4px;
    overflow: hidden;
    display: inline-block;
    *display: inline;
    *zoom: 1
}
.a-upload:hover {
    color: #444;
    background: #eee;
    border-color: #ccc;
    text-decoration: none
}
.btn {
    display: inline-block; width:30%;padding: 6px 0;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer; background-image: none;border: 1px solid transparent;border-radius: 4px; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none; float: left; margin-left:2%;}
.btn-default{text-shadow:0 1px 0 #fff;background-image:-webkit-linear-gradient(top,#fff 0,#e0e0e0 100%);background-image:linear-gradient(to bottom,#fff 0,#e0e0e0 100%);background-repeat:repeat-x;border-color:#dbdbdb;border-color:#ccc;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe0e0e0',GradientType=0);filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);}
.btn-default:hover{background-color:#e0e0e0;background-position:0 -15px;}
.webuploader-container {
	position: relative;  overflow:hidden; float: left;
}
.webuploader-element-invisible {
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
    clip: rect(1px,1px,1px,1px);
}
.webuploader-pick {
	position: relative;
	display: inline-block;
	cursor: pointer;
	background: #d64f4f;
	padding: 5px 11px;
	color: #fff;
	text-align: center;
	border-radius: 3px;
	overflow: hidden;
	font-size:16px;
}
.webuploader-pick-hover {
	background: #d64f4f;
}

.webuploader-pick-disable {
	opacity: 0.6;
	pointer-events:none;
}
.item{position: relative;padding:5px 1%;line-height: 23px; height: 23px;border: 1px solid rgba(0, 0, 0, .2);border-radius: 3px; overflow:hidden; width:65%; float:left; }
.item .state{position: absolute;padding:0 6px;top:0;right:0; background-color:#d64f4f; height:33px; line-height:33px;border-radius: 0; color:#FFFFFF;}
.item .info{ line-height:25px;}

.progress{position: absolute; width:100%; height:33px; background-color:#fff; left:0; top:0;}
.progress .progress-bar{width:0%;height:33px; background-color:#d64f4f;}
.zlxgan {
    border: 1px #02b502 solid;
    color: #02b502 !important;
    padding: 2px 5px !important;
    font-size: 12px !important;
    border-radius: 5px !important;
    margin-left: 5px !important;
    background: none !important;
}
</style>
<script src="/statics/user/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function()
{
    $("#avatar li").click(function()
    {
        $("#avatar li").removeClass("select");
        $(this).addClass("select");
		var id=$(this).attr('id');
        document.getElementById('avatar_id').value=id;
    });
});  
</script>

</head>
<body>
<{include file='./ffsm/user_header.tpl'}>
<header id="header" class="ui-header ui-header-positive ui-border-b" >
<h1></h1>
</header>
  
<div class="login"><div class="ui-avatar"><span style="background-image:url(<{if $member.headimgurl}><{$member.headimgurl}><{else}>/statics/user/images/userlogo.png<{/if}>)" onclick='location.href="/?ac=member"'></span></div>
<div class="login_t">
<h3><span style="color:#0180cf">昵称：</span><{$member.nickname}>&nbsp;&nbsp;&nbsp;【<em style="margin:5px 0;font-size:14px;"><font color="red"><{if $member.class==1}>注册用户<{elseif $member.class==2}>微信用户<{else}>QQ用户<{/if}></font></em>】</h3>
<span class="login_lj" style="font-size:14px;">我的佣金：<font color="red" size="3"><{$member.dl_syjf}></font> 元 </span>
<span class="login_lj" ><p style="margin:5px 0;font-size:14px;"><{if $member.phone}>电话：<{$member.phone}><a href="?ac=user_spacecp" class="zlxgan">资料修改</a><{else}><a href="?ac=user_spacecp" class="zlxgan">设置电话</a><{/if}></p></span>  
  </div>
</div>
  
<section class="jilu" style=" padding-top:0px; margin-top:0"> 
<a href="?ac=user_tgjl">
<li>
<h2 class="t2 l" ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">推广记录</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a>
<a href="?ac=user_wdxx">
<li>
<h2 class="t2 l" ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">我的二级下线</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a> 
<a href="?ac=user_wdxxj">
<li>
<h2 class="t2 l" ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">我的三级下线</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a> 
<a href="?ac=user_yjtx">
<li>
<h2 class="t2 l "><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">佣金提现</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a> 
<a href="?ac=user_txmx">
<li>
<h2 class="t2 l" ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">提现明细</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a>
<a href="?ac=user_wdcs">
<li>
<h2 class="t2 l" ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">我的测算</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a>
<a href="?ac=loginout">
<li>
<h2 class="t2 l" ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">退出登录</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a>
</section>

<section class="jilu" style="margin-top: 2.2%;"> 
<form method="post" action="" style="padding:0 10px;" target="msgubotj" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td  height="15" width="30%" ></td>
<td width="70%"></td>
</tr>

<tr>
  <td height="40" align="right" valign="middle">推广链接：</td>
  <td><textarea name="name" class="make_resume_input" id="name" style="width:80%; height:30px;margin-bottom: 0;resize: none;">http://<{$dqurl}>/?dl=<{$member.uid}></textarea></td>
</tr>
<tr>
<td align="right" valign="top" style="padding-top:6px;">二维码：</td>
<td><img src="http://qr.liantu.com/api.php?bg=ffffff&gc=222222&el=l&w=150&m=10&text=<{$dqurl}>/?dl=<{$member.uid}>" width="150" height="150" style="border: 1px solid rgba(0, 0, 0, .2); padding:4px; margin-top:5px;"></td>
</tr>

<tr>
<td height="50" colspan="2" align="center" valign="middle" style="padding-top:6px;">
  <input type="submit" id="submit" value="复制链接" class="user_reg_but" style="width:120px;" onClick="copyUrl2()"></td>
</tr>
</tbody></table>
</form>
</section>
<section class="jilu" style="margin-top: 2.2%;"> 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td height="40"><p class="description">
<b>什么是三级分销？</b><br>
将推广地址发布出去别人注册会员会自动成为你的下线<br>
用户 A 推荐用户B测算，用户 A 获得提成<br>
用户 B 推荐用户C测算，用户 A、B 均获得提成<br>
用户 C 推荐用户D测算，用户 A、B、C 均获得提成;<br>
用户 D 推荐用户E测算，这时用户A不再获得提成<br>
<br>
<b>分销可以获取多少提成？</b><br>
<font color="#ff3300">一级分销提成： %<{$oneclass}></font><br>
<font color="#0099330">二级别分销提成：%<{$twoclass}></font><br>
<font color="#6600ff">三级别分销提成：%<{$threeclass}></font> <br>
以上的提成是说明，在你发展的用户中分别不同级别用户测算拿到的提成,分销商拿到的提成金额可以在线提现
</p></td>
</tr>
</table>
</section>

<{include file='./ffsm/user_footer.tpl'}>
</body>
</html>
 