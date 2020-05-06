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

$xingpan2 = array(1=>'月亮',2=>'水星',3=>'金星',4=>'火星',5=>'木星',6=>'土星',7=>'天王星',8=>'海王星',9=>'冥王星');

$dus = array(1=>'0度',2=>'60度',3=>'90度',4=>'120度',5=>'180度');

for($i=1;$i<11;$i++){
	
	
	for($di=1;$di<10;$di++){
		
		
		for($du=1;$du<6;$du++){
			
		
			$f = file_get_contents('http://mix.sina.com.cn/astro/view.php?flag=13&star1='.$xingpan[$i].'&star2='.$xingpan2[$di].'&13-3='.$dus[$du]);
			
			preg_match_all('/<DIV id=wrap>([\W\w]*?)<H3>([\W\w]*?)<\/H3>([\W\w]*?)<\/DIV>/',$f,$n);
			
			//print_r($n);
			$tc =iconv('GB2312', 'UTF-8', $n[2][0]);
			$cc = iconv('GB2312', 'UTF-8', $n[3][0]);
			
			$t1=iconv('GB2312', 'UTF-8', $xingpan[$i]);			
		
			$t2=iconv('GB2312', 'UTF-8', $xingpan2[$di]);
			
			$t3=iconv('GB2312', 'UTF-8', $dus[$du]);
		
			$md =$t1 .'-'.$t2.'-'.$t3;
			
			
			$sql="INSERT INTO `xingpan_data` (`title`, `content`, `tid`, `shorttxt`,`t1`,`t2`,`t3`) VALUES ('".$tc."', '".$cc."', '3', '".$md."','".$t1."','".$t2."','".$t3."')";
			
			$c = mysql_query($sql);
		
		
		}
			
			
		
		
		
		
	}


}

exit;

while($r = mysql_fetch_array($c)){
	echo $r['title'];
}

?>

</body>
</html>
