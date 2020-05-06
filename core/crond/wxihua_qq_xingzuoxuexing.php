<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<title>Untitled Document</title>
</head>

<body>

<?php

//header("Content-type:text/html;charset=utf-8");

mysql_connect('localhost','root','root');

mysql_select_db('114la_xingzuo');

mysql_query("set names utf8");


exit;

for($i=1;$i<49;$i++){
	



		$url = 'http://data.astro.qq.com/astrobl/'.$i.'/index.shtml';
		
		$file = file_get_contents($url);
		
		
		
		preg_match_all('/<div class="left">([\W\w]*?)<h1>([\W\w]*?)<\/h1>([\W\w]*?)<div class="morecha" >/is',$file,$new);
		
		
		$title = iconv('GB2312', 'UTF-8',$new[2][0]);
		$cc = $new[3][0];
		
		preg_match_all('/<p><strong>星座：<\/strong>([\W\w]*?)<\/p>([\W\w]*?)<p><strong>血型：<\/strong>([\W\w]*?)<\/p>/is',$cc,$ncc);
		
		
		$t1 = iconv('GB2312', 'UTF-8', $ncc[1][0]);
		$t2 = iconv('GB2312', 'UTF-8', $ncc[3][0]);	
		
		$cc = iconv('GB2312', 'UTF-8', $cc);
		
		//$tc =iconv('GB2312', 'UTF-8', $n[2][0]);
		$md = $t1.'-'.$t2;
		
		
		
		if($t1!='' && $t2!=''){
			$sql="INSERT INTO `peidui_data` (`title`, `content`, `tid`, `shorttxt`,`t1`,`t2`) VALUES ('".$title."', '".$cc."', '4', '".$md."','".$t1."','".$t2."')";
		
			$c = mysql_query($sql);
			
			echo $i.'ok<br>';
			
		}
			
			

}
		
	
exit;

while($r = mysql_fetch_array($c)){
	echo $r['title'];
}

?>

</body>
</html>