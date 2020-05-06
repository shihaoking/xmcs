<?php
$webnames = $_SERVER['HTTP_HOST'];
$doname = array('www.kaiy8.com','m.kaiy8.com',"sm.kaiy8.com",'zb.aemui.cn','m.zb.aemui.cn',"sm.aemui.cn");
if($_GET['a']){
	print_r($doname);
}
if(!in_array($webnames,$doname)){
	exit;
}
?>