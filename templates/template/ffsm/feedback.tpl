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
<h1 class="public_h_con">售后申请</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<p class="public_banner">
	<img src="/statics/ffsm/index/1/images/topbanner.gif.jpeg" alt="付费算命"/>
</p>
<div class="public_orders_search">
	<div class="public_os_info">
		温馨提示：未付款订单只能通过订单号查询，已付费测算可通过绑定手机号查看。
	</div>
	<div class="public_os_form">
		<form class="J_ajaxForm" action="/?ac=select_orders" method="post">
			<input type="text" name="oid" nolocal="true" placeholder="订单号/手机号" class="input"/><input type="submit" value="查询" class="J_ajax_submit_btn btn"/>
		</form>
	</div>
	<div class="after_sales">
		<strong class="as_tit">申请单</strong>
		<div class="as_form">
			<p>
				请尽可能详细地填写关于订单的信息，客服会在 <font color="#ff2c0c">7x24小时在线</font> 及时处理。
			</p>
			<form class="J_ajaxForm" action="/?ac=feedback" method="post">
				<div class="input_text">
					<span class="on">姓名：</span><input type="text" name="username" placeholder="你测算时填写的姓名">
				</div>
				<div class="input_text">
					<span class="on">付款时间：</span><input type="text" name="payment_time" nolocal="true" id="datetime" placeholder="付款时间">
				</div>
				<div class="input_sel">
					<span class="on">问题类型：</span>
					<select id="typeid" name="typeid">
						<option value="1">已付费，未查询到付费结果</option>
						<option value="0">其它</option>
					</select>
				</div>
				<div class="input_textarea" id="show_textarea" style="display:none;">
					<span></span><textarea placeholder="请具体描述您遇到的问题" name="content" maxlength="40"></textarea>
				</div>
				<div class="input_radio">
					<span class="on">联系方式：</span>
					<div>
						<input class="radio_class" type="radio" name="contact_type" contact_name="contact_wx" value="1" checked/>微信&emsp;
						<input class="radio_class" type="radio" name="contact_type" contact_name="contact_qq" value="2"/>QQ
					</div>
					<input class="text_class" type="text" id="contact_text" name="contact_wx" placeholder="您的QQ账号或微信账号"/>
					<p>
						请务必填写正确的QQ账号或微信账号，方便客服联系您。
					</p>
				</div>
				<div class="input_radio">
					<span class="">联系邮箱：</span><input class="text_class" type="text" name="contact_email" placeholder="可以联系到您的邮箱"/>
					<p>
						请正确填写，测算信息会以邮件发至您的邮箱。
					</p>
				</div>
				<div class="input_text">
					<span class="">绑定手机号：</span><input type="text" name="contact_phone">
				</div>
				<div class="input_btn">
					<a href="javascript:;" class="J_ajax_submit_btn sure">确认提交</a><a href="history.html" class="cancel">取消</a>
				</div>
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" href="/statics/ffsm/public/js/datetime/datetime.min.css">
<script src="/statics/ffsm/public/js/datetime/datetime.min.js"></script>
<script>
    var thisYear = (new Date()).getFullYear();
    $('#datetime').mobiscroll().datetime({
        theme: 'ios',
        mode: 'scroller',
        display: 'top',
        lang: 'zh',
        startYear: thisYear - 2,
        maxDate: new Date(),
        stepMinute: 5
    });
    $("#typeid").change(function () {
        var val = $(this).find('option:selected').val();
        if (val == '0') {
            $("#show_textarea").show();
        } else {
            $("#show_textarea").hide();
        }
    });
    $("input[name='contact_type']").click(function () {
        $("#contact_text").attr('name',$(this).attr('contact_name'));
    });
</script>
<{include file='./ffsm/footer.tpl'}>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>