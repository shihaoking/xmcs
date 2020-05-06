<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>在线测算</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/public/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/inquiry/1/inquiry.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">我的测算</h1>
<a class="public_h_home" href="/"></a></header>
<p class="public_banner">
	<img src="/statics/ffsm/public/images/banner_wd.png" alt="付费算命"/>
</p>
  <ul class="ddztxz">
    
    <li>
      <a href="/?ac=history">未付款</a>
    </li>
    <li>
    <a href="/?ac=history&state=1" >已付款</a>
    </li>
    <li>
    <a href="/?ac=history&state=2" class="on">查询订单</a>
    </li>
  </ul>
 
<div class="public_ddxx_search">
	<div class="public_ddxx_form">
      <form class="J_ajaxForm" action="/?ac=select_orders" method="post">
			<input type="text" name="oid" nolocal="true" placeholder="请输入订单号" class="input"/><input type="submit" value="搜索" class="J_ajax_submit_btn btn"/>
		</form>
	</div>
	
	
</div>

  <{if $data}>
  
  <div class="public_ddxx">
      <div class="public_k">
           <span class="public_des">[<{$data.type}>] <{$data.data.username}>.公历<{$data.data.year}><{$data.data.y}>-<{$data.data.month}><{$data.data.m}>-<{$data.data.day}><{$data.data.d}></span><{if $data.status==1}><span class="public_pyzt">已付款</span><{else}><span class="public_pyzt public_red">未付款</span><{/if}>
      </div>
        <div class="public_k">
      <span class="public_pyzt_ddxx">订单号：<{$data.oid}></span>
    </div>
      <div class="public_k">
      <span class="public_pyzt_ddxx2">下单时间：<{$data.createtime}></span>
    </div>
      <div class="public_k public_bddd">
      <a class="public_pyzt__look" href="<{$data.url}>"><{if $data.status==1}>点击查看<{else}>去付款<{/if}></a>
    </div>
  </div>
    <{else}>
      <div class="public_no_search">未查询到该订单！</div>
    <{/if}>
  
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>