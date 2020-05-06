<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>我的测算订单查询</title>
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
<h1 class="public_h_con"><{$filtertypename}></h1>
<a class="public_h_home" href="/?ac=<{if $filtertype==23}>ffqm<{else}>xmfx<{/if}>"></a></header>
  <ul class="ddztxz">
    
    <li>
        <a href="/?ac=history&type=<{$filtertype}>" <{if $state==0}>class="on" <{/if}>>未付款</a>
    </li>
    <li>
    <a href="/?ac=history&state=1&type=<{$filtertype}>" <{if $state==1}>class="on" <{/if}>>已付款</a>
    </li>
    <li>
    <a href="/?ac=history&state=2&type=<{$filtertype}>" <{if $state==2}>class="on" <{/if}>>查询订单</a>
    </li>
  </ul>
  <{if $data && $state!=2}>
  <{foreach from=$data item=v}>
  <{if $state==$v.status}>
  <div class="public_ddxx_order">
      <div class="public_k_order">
          <div class="public_k_left"><{if $filtertype==23}>宝宝姓氏<{else}>姓名<{/if}>：</div>
          <div class="public_k_right"><{$v.data.xing}><{$v.data.username}></div>
      </div>
     <div class="public_k_order">
          <div class="public_k_left">性别：</div>
          <div class="public_k_right"><{if $v.data.gender ==1}>男<{/if}><{if $v.data.gender ==0}>女<{/if}><{if $v.data.gender ==2}>未知<{/if}></div>
     </div>
     <div class="public_k_order">
          <div class="public_k_left">出生日期：</div>
          <div class="public_k_right">公历 <{$v.birthday}></div>
     </div>
     <div class="public_k_order">
          <div class="public_k_left">订单号：</div>
          <div class="public_k_right"><{$v.oid}></div>
     </div>
      <div class="public_k_order">
          <div class="public_k_left">下单时间：</div>
          <div class="public_k_right"><{$v.createtime}></div>
    </div>
     <div class="public_k_order">
          <div class="public_k_left">状态</div>
          <div class="public_k_right"><{if $v.status==1}><span>已付款</span><{else}><span class="public_red">未支付</span><{/if}></div>
     </div>
    <div class="public_k public_bddd" style="text-align: center">
        <a class="public_pyzt__look" href="<{$v.url}>"><{if $v.status==1}>点击查看<{else}>去支付<{/if}></a>
     </div>
  </div>
    <{/if}>
    <{/foreach}>
    <{/if}>
  <{if $state==2}>
<div class="public_ddxx_search">
	<div class="public_ddxx_form">
      <form class="J_ajaxForm" action="/?ac=select_orders&type=<{$filtertype}>" method="post">
			<input type="text" name="oid" nolocal="true" placeholder="请输入订单号" class="input" value="<{$oids}>" /><input type="submit" value="搜索" class="J_ajax_submit_btn btn"/>
		</form>
	</div>
	
	
</div>
<{/if}>
  
  
<div class="public_orders_search">
	<div class="public_os_info">
		温馨提示：已经付款的用户请输入订单号查询测算结果！如未正常显示请关注【公众号】进行反馈！
	</div>
	<ul class="problem_feedback">
		<!--<li><a class="after_sales_link" href="https://www.yiabs.com/yixue/i38-1.html" hidetxt="问题反馈">问题反馈</a></li>  
		<li><a href="javascript:;" onclick="history.go(-1);" class="btn_back">返回</a></li> -->
	</ul>
</div>
<{include file='./ffsm/footer.tpl'}>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>