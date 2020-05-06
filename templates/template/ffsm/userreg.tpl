
<!DOCTYPE html>
<html>
<head>
<title>会员注册</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="format-detection" content="telephone=no">
<SCRIPT language=javascript src="/statics/user/js/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="/statics/user/js/layer.js"></SCRIPT>
<script language="javascript" src="/statics/user/js/comm.js"></script>
<script language="javascript">
	function CheckForm()
	{
      	if (RegForm.nickname.value==""){
          alert("请输入昵称！");
          RegForm.nickname.focus();
          return false;
         }
		if(!checkLength("username" , "用户名称" , 3 , 16 , "~!@#$%^&*+=\\\'\"\<\>"))
			return false;
		if(!checkLength("password" , "登录密码" , 6 , 16 , "&<>\'"))
			return false;
		if(!checkLength("password1" , "确认密码" , 6 , 16 , "&<>\'"))
			return false;
		if(RegForm.password.value.toLowerCase() != RegForm.password1.value.toLowerCase())
		{
			alert("输入的密码和确认密码不一致");
			return false;
		}
		if(!checkLength("email" , "电子信箱" , 1 , 100))
			return false;
		if(!checkEmail("email" , "电子信箱"))
			return false;
		}
	
	function CheckUser()
	{
		if(!checkLength("username" , "用户名称" , 3 , 16 , "~!@#$%^&*+=\\\'\"\<\>"))
			return false;
      $.get("/?ac=userreg&is_username="+ RegForm.username.value,function(data,status){
        	$("#msgubotj1").html(data);
			$("#msgubotj1").show();
		});
		
	}

</script>
<!--a-->
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
<section class="register" style="margin-top:40px;">
<div id="msgubotj1" style="display:none"></div> 
  
<form id="RegForm" class="RegForm" action="/?ac=userreg" method="post" onSubmit="return CheckForm();" >
<div class="form_up">
<div class="username"><span style="float:left;">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</span>
<input type="text" id="username" name="username" placeholder="请输入您的用户名" class="input1">
<input name="button"  type="button" id="btn_Username" onClick="CheckUser();" value="检测帐号" class="user_reg_but" >
</div>
<div class="username"><span style="float:left;">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称：</span>
<input type="text" id="nickname" name="nickname" placeholder="请输入您的用户名" class="input1">
</div>
<div class="username"><span style="float:left;">常用邮箱：</span>
<input type="text" name="email" id="email" placeholder="请输入您的邮箱" class="input1" >
</div>
<div class="username"><span style="float:left;">输入密码：</span><input type="password" name="password" id="password" placeholder="请输入您的密码" class="input1"></div>
<div class="username"><span style="float:left;">确认密码：</span>
<input name="password1" type="password" id="password1" placeholder="请再次输入您的密码" class="input1">
</div>

</div>
<div class="botton" >
<input name="reg" type="submit" class="user_reg_but" id="reg" value="立即注册">
</div>
<br><br>
</form>
<div class="log_connect">
          <div class="title"><h4><span class="cg b_e">用第三方账号登录</span></h4></div>
          <div class="item">
            <ul>
              <li class="b_f"><a href="/?ac=wxlogin"><img src="/statics/user/images/weixin.png"></a></li>
			  <li class="b_f"><a href="/?ac=qqconnect"><img src="/statics/user/images/qqlogin.png"></a></li>
                                        </ul>
          </div>
        </div>
<br><br>
</section>

<{include file='./ffsm/user_footer.tpl'}> 
</body>
</html>