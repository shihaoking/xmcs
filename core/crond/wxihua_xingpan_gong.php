<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<title>Untitled Document</title>
</head>

<body>

<?php

//header("Content-type:text/html;charset=utf-8");
ini_set('max_execution_time', 0);

mysql_connect('localhost','root','root');

mysql_select_db('114la_xingzuo');

mysql_query("set names utf8");


$xingpan = array(1=>'太阳',2=>'月亮',3=>'水星',4=>'金星',5=>'火星',6=>'木星',7=>'土星',8=>'天王星',9=>'海王星',10=>'冥王星');

$xingzuo = array(1=>'第一宫',2=>'第二宫',3=>'第三宫',4=>'第四宫',5=>'第五宫',6=>'第六宫',7=>'第七宫',8=>'第八宫',9=>'第九宫',10=>'第十宫',11=>'第十一宫',12=>'第十二宫');

for($i=1;$i<11;$i++){
	
	
	for($di=1;$di<13;$di++){
			
			$f = file_get_contents('http://mix.sina.com.cn/astro/view.php?flag=12&12-1='.$xingpan[$i].'&12-2='.$xingzuo[$di].'');
			
			preg_match_all('/<DIV id=wrap>([\W\w]*?)<H3>([\W\w]*?)<\/H3>([\W\w]*?)<\/DIV>/',$f,$n);
			
			//print_r($n);
			$tc =iconv('GB2312', 'UTF-8', $n[2][0]);
			$cc = iconv('GB2312', 'UTF-8', $n[3][0]);
			
			$t1=iconv('GB2312', 'UTF-8', $xingpan[$i]);			
		
			$t2=iconv('GB2312', 'UTF-8', $xingzuo[$di]);
		
			$md =$t1 .'-'.$t2;
			
			
			$sql="INSERT INTO `xingpan_data` (`title`, `content`, `tid`, `shorttxt`,`t1`,`t2`) VALUES ('".$tc."', '".$cc."', '2', '".$md."','".$t1."','".$t2."')";
			
			$c = mysql_query($sql);
		
		
		
		
	}


}

exit;

while($r = mysql_fetch_array($c)){
	echo $r['title'];
}

?>

</body>
</html>
