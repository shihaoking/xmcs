<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>开运网付费测算框架通用管理后台</title>
<link href="images/css/common.css" rel="stylesheet" type="text/css" />
<link href="images/css/index.css" rel="stylesheet" type="text/css" />
<script src="images/js/jquery.js" type="text/javascript"></script>
<script src="images/js/util.js" type="text/javascript"></script>
</head>
<body>
<div id="top_data">
    <div id="logo"><a href=""><img src="images/images/logo.png" alt="八字网通用后台" /></a></div>
    <div class="top-text">
        <span>欢迎您，</span><b><{$user.user_name}></b>
        | <a href="../index.php" target="_blank">网站主页</a>
        <span id="alert_msg_ct" style="color:red;"></span>
        <a href="?ct=index&ac=loginout" class="logout">退出系统</a>
    </div>
</div>
<div id="left_panel">
    <ul id="nav_class"></ul>
    <div class="switch-content"><a href="javascript:;" class="open" onclick="SidbarControl.ShowSec();">全部展开</a><a href="javascript:;" class="close" onclick="SidbarControl.HideSec();">全部收起</a></div>
    <ul id="nav_list"></ul>
</div>
<div id="main">
    <div id="top_menu">
    	<div class="top_menu_box">
            <div class="top_menu_contents" id="js_menu_contents"></div>
        </div>
        <a href="javascript:;" class="btn left disabled" id="js_tab_left_btn">向左</a><a href="javascript:;" class="btn right disabled" id="js_tab_right_btn">向右</a></div>
    <ul id="handle">
        <li class="back"><a href="javascript:;" onclick="TopMenuControl.Back();">后退(ctrl+b)</a></li>
        <li class="go"><a href="javascript:;" onclick="TopMenuControl.Forward();">前进(ctrl+n)</a></li>
        <li class="refresh"><a href="javascript:;" onclick="TopMenuControl.Refresh();">刷新(ctrl+q)</a></li>
        <li class="screen" id="js_screen_li"><a href="javascript:;" onclick="MainAPI.FullScreen();">全屏(ctrl+i)</a></li>
        <li class="undo" id="js_undo_li" style="display:none;"><a href="javascript:;" onclick="MainAPI.UndoScreen();">还原(ctrl+u)</a></li>
        <li class="close-all"><a href="javascript:;" onclick="TopMenuControl.Close();">关闭全部</a></li>
    </ul>
    <div id="main_frame"></div>
</div>
<script type="text/javascript">
	//数据
	var MenuData = {
		<{$menu|replace:"&amp;":"&"}>
	}
</script>
<script type="text/javascript" src="images/js/main.js"></script>
</body>
</html>
