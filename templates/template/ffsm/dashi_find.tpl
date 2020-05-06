<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>八字精批测算结果-易读网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<meta name="viewport" content="width=750, user-scalable=no"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/bazimf/page1.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<section class="page3-bg-1">
  <div class="box"></div>
  <div class="material-box">
    <div class="material-img1"></div>
    <div class="material-img2"></div>
    <div class="top clearfix">
      <span class="left left-img"></span>
      <em class="left center-text">您输入的预约资料</em>
      <span class="left right-img"></span>
    </div>
    <div class="center clearfix">
      <div class="infor clearfix">
	  <div class="infor2 left">
		<div class="infor1 left">
			<span class="key-text">预约项目:</span>
			<span class="value-text"><{$data.data.project}></span>
		</div>
		<div class="infor1 left">
			<span class="key-text">预约大师:</span>
			<span class="value-text"><{$data.data.teacher}></span>
		</div>
		<div class="infor1 left">
			<span class="key-text">预约金额:</span>
			<span class="value-text"><{$data.money}></span>
		</div>
		<div class="infor1 left">
			<span class="key-text">预约时间:</span>
			<span class="value-text"><{if $data.paytime>0}><{$data.paytime|date_format:'%Y-%m-%d %H:%M:%S'}><{else}><{$data.createtime|date_format:'%Y-%m-%d %H:%M:%S'}><{/if}></span>
		</div>
		<div class="infor1 left">
			<span class="key-text">姓名:</span>
			<span class="value-text"><{$data.data.username}></span>
		</div>
        <div class="infor1 left">
			<span class="key-text">性别:</span>
			<span class="value-text"><{if $data.data.gender==1}>男<{else}>女<{/if}></span>
		</div>
		<div class="infor1 left">
          <span class="key-text">电话:</span>
          <span class="value-text"><{$data.data.tel}></span>
		</div>  
         <p>标题：<{$data.data.title}> </p>
        <p>图片链接：<{$data.data.images}> </p>
        <p>摘要：<{$data.data.centent}> </p>
      </div>
      <div class="infor-data clearfix">
        <span class="key-text left">生辰:</span>
        <div class="value-text left">
          <p><{$data.data.y}>年<{$data.data.m}>月<{$data.data.d}>日 <{$data.data.h}>时</p>
          <p><{$data.data.lDate}></p>
        </div>
      </div>
      
     
    </div>
  </div>

</section>

<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>