<!DOCTYPE html>
<html>
<head>
<title>会员中心-推广记录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="format-detection" content="telephone=no">
<!--a-->
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
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
<h2 class="t2 l cl-red" ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">推广记录</h2>
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
<h2 class="t2 l " ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">提现明细</h2>
<span class="r login_yj"> &gt; </span>
</li>
</a>
<a href="?ac=user_wdcs">
<li>
<h2 class="t2 l " ><img src="/statics/user/picture/ustb.png" width="12" height="12" style="margin-right:5px;">我的测算</h2>
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
  
  <{foreach key =k item=i from=$result}> 
  <{if $i.oid}>
  <div class="public_ddxx">
      <div class="public_k">
           <span class="public_des">[<{$i.type}>] <{$i.data.username}></span><span class="public_pyzt"><{if $i.status==1}><font color="#008000" >已付款</font><{else}>未付款<{/if}></span>      </div>
        <div class="public_k">
      <span class="public_pyzt_ddxx">订单号：<{$i.oid}></span>
    </div>
          <div class="public_k">
      <span class="public_pyzt_ddxx"><{if $i.dl_status==1}>已<{else}>未<{/if}>获得提成：<font color="#ff0000" ><{$i.dl_money}>元</font></span>
    </div>
      <div class="public_k">
      <span class="public_pyzt_ddxx">下单时间：<{$i.createtime|date_format:'%Y-%m-%d %H:%M:%S'}></span>
    </div>
      <div class="public_k public_bddd">
      <a class="public_pyzt__look" href="<{$i.url}>">点击查看</a>
    </div>
  </div>
  <{/if}>
  <{/foreach}>
    

<div class="page" align="center"> 
<a href="/?ac=user_tgjl>">首页</a> <a href="/?ac=user_tgjl&page=<{$pagepre}>" >< 上一页</a> <a href="/?ac=user_tgjl&page=<{$pagenext}>">下一页 ></a> <a href="/?ac=user_tgjl&page=<{$endpage}>">末页</a></div>

<{include file='./ffsm/user_footer.tpl'}>
</body>
</html>
 