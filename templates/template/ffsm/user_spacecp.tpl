<!DOCTYPE html>
<html>
<head>
<title>会员中心-资料设置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="format-detection" content="telephone=no">
<SCRIPT language=javascript src="/statics/user/js/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="/statics/user/js/layer.js"></SCRIPT>

<link rel="stylesheet"href="/statics/user/css/frozen.min.css">
<link rel="stylesheet"href="/statics/user/css/style.min.css">
<style type="text/css">
#footer{height:56px;}#footer i{font-size:1.6rem}#footer li.active,#footer li:active,#footer li:hover{font-size:.7rem}
.ui-tiled li{font-size:.7rem}
</style> 
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
</style>
</head>
<body>
<{include file='./ffsm/user_header.tpl'}>
<header id="header" class="ui-header ui-header-positive ui-border-b" >
<h1></h1>
</header>
<section class="jilu" style=" padding-top:0px;"> 
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
<h2 class="t2 l cl-red"><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">佣金提现</h2>
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
<div class="daili-tixian-body">
<form class="think-form" id="TxForm" class="TxForm" action="/?ac=user_spacecp" method="post" >
<div class="group-box am-margin-0 am-padding-0">
<div class="am-margin-top-0 am-padding-bottom-sm menu-list">
<ul>
<{if $member.class!=2 && $member.class!=3}>
<li class="am-padding-left am-padding-right">
<div class=" am-fr menu-list-r"><{$member.user_name}></div> <div class="am-fl menu-list-l">账号</div>
</li>
<{/if}>
<li class="am-padding-left am-padding-right">
<div class=" am-fr menu-list-r"><{$member.nickname}></div> <div class="am-fl menu-list-l">昵称</div>
</li>
<li class="am-padding-left am-padding-right">
<div class="color-red am-fr menu-list-r"><{$member.dl_syjf}>元</div> <div class="am-fl menu-list-l">佣金</div>
</li>
<li class="am-padding-left am-padding-right"><div class="am-fr menu-list-r">
<input type="text" name="phone" id="phone" class="inputstyle" placeholder="请输入您的手机号码" value="<{$member.phone}>"></div>
<div class="am-fl menu-list-l">电话</div>
</li>

<li class="am-padding-left am-padding-right"><div class="am-fr menu-list-r">
<input type="text" name="qq" id="qq" class="inputstyle" placeholder="QQ" value="<{$member.qq}>"></div>
<div class="am-fl menu-list-l">QQ</div>
</li>

</ul>
<div class="am-padding-left am-padding-right am-margin-top-sm">
<input type="submit" name="zlbc" id="submit" class="am-btn am-radius btn-full btn-default" value="保存"></div>
</div>
</div>

</form>
</div>
</section>


<{include file='./ffsm/user_footer.tpl'}>
</body>
</html>
 