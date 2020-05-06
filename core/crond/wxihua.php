<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
mysql_connect('localhost','root','root');

mysql_select_db('114la_xingzuo');

mysql_query("set names utf8");



$sql = 'select * from xingzuo_data where tid=99';

$q = mysql_query($sql);

while($row = mysql_fetch_array($q)){
	$x = substr(strip_tags($row['content']),0,260);
	$sqlx = 'UPDATE `xingzuo_data` SET `shorttxt` = "'.$x.'" WHERE `id` = "'.$row['id'].'" and tid="99"';
	mysql_query($sqlx);
}

?>


</body>
</html>
