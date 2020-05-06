<?php
$nongliyu=array(NULL,"正","二","三","四","五","六","七","八","九","十","十一","十二");
$nongliri=array(NULL,"初一","初二","初三","初四","初五","初六","初七","初八","初九","十","十一","十二","十三","十四","十五","十六","十七","十八","十九","二十","二十一","二十二","二十三","二十四","二十五","二十六","二十七","二十八","二十九","三十","三十一");
$liuqing=array(NULL,"  父母","　兄弟","　官鬼","　妻财","　子孙");
$liushen=array("玄武","白虎","腾蛇","勾陈","朱雀","青龙"); 
$benbagua=array(NULL,array(NULL,1,1,1,1),array(NULL,1,1,2,2),array(NULL,1,2,1,3),array(NULL,1,2,2,4),array(NULL,2,1,1,5),array(NULL,2,1,2,6),array(NULL,2,2,1,7),array(NULL,2,2,2,8));
function xunkong($gz1){
$xkarr=array(
0=>array("甲子","乙丑","丙寅","丁卯","戊辰","己巳","庚午","辛未","壬申","癸酉","戌亥"),
1=>array("甲戌","乙亥","丙子","丁丑","戊寅","己卯","庚辰","辛巳","壬午","癸未","申酉"),
2=>array("甲申","乙酉","丙戌","丁亥","戊子","己丑","庚寅","辛卯","壬辰","癸巳","午未"),
3=>array("甲午","乙未","丙申","丁酉","戊戌","己亥","庚子","辛丑","壬寅","癸卯","辰巳"),
4=>array("甲辰","乙巳","丙午","丁未","戊申","己酉","庚戌","辛亥","壬子","癸丑","寅卯"),
5=>array("甲寅","乙卯","丙辰","丁巳","戊午","己未","庚申","辛酉","壬戌","癸亥","子丑"));
for($i=0;$i<=5;$i++){
	for($j=0;$j<=9;$j++){
		if($xkarr[$i][$j]==$gz1){
		 $xunk=$xkarr[$i][10];
 		$tag=1;
 		break;
 	}
}
if($tag==1) break;
}
return($xunk);
}

function liunum($tempgong,$tempyaozhi){
 $gong=$tempgong;
 $yaozhi=$tempyaozhi;
	switch($gong){
	case 1:
	if($yaozhi==1){	$liunum=2;break;}
	if($yaozhi==2){$liunum=4;break;}
	if($yaozhi==3 ){$liunum=5;break;}
	if($yaozhi==4 ){$liunum=1;break;}
	if($yaozhi==5 ){$liunum=3;break;}
	case 2:
	if( $yaozhi==1 ){$liunum=3;break;}
	if( $yaozhi==2 ){$liunum=2;break;}
	if( $yaozhi==3 ){$liunum=1;break;}
	if( $yaozhi==4 ){$liunum=4;break;}
	if( $yaozhi==5 ){$liunum=5;break;}
	case 3:
	if( $yaozhi==1 ){$liunum=1;break;}
	if( $yaozhi==2 ){$liunum=5;break;}
	if( $yaozhi==3 ){$liunum=2;break;}
	if( $yaozhi==4 ){$liunum=3;break;}
	if( $yaozhi==5 ){$liunum=4;break;}

	case 4:
	if( $yaozhi==1 ){$liunum=5;break;}
	if( $yaozhi==2 ){$liunum=3;break;}
	if( $yaozhi==3 ){$liunum=4;break;}
	if( $yaozhi==4 ){$liunum=2;break;}
	if( $yaozhi==5 ){$liunum=1;break;}
	case 5:
	if( $yaozhi==1 ){$liunum=4;break;}
	if( $yaozhi==2 ){$liunum=1;break;}
	if( $yaozhi==3 ){$liunum=3;break;}
	if( $yaozhi==4 ){$liunum=5;break;}
	if( $yaozhi==5 ){$liunum=2;break;}
	}
return($liunum);
}

function getTaiyang($time,$jd1,$jd2){
$subtime=($jd1-120+$jd2/60)*4*60;
$zdate=(int)date("m",$time).":".date("d",$time);
$path1="inc/stime.txt";
$ops=fopen($path1,"r");
$fn=fread($ops,filesize($path1));
fclose($ops);
$arr=explode("\n",$fn);
foreach($arr as $key){
   $b=explode(":",$key);
   $comdate=$b[0].":".$b[1];
   if($comdate==$zdate){
   $truesubminute=$b[2];
   $truesubsecond=$b[3];
   break;
   }
  }
if ($truesubminute<0){
$truesubt=$truesubminute*60-$truesubsecond;
}
else{
$truesubt=$truesubminute*60+$truesubsecond;
}
$taiyang=$time+$subtime+$truesubt;
return $taiyang;
}
//配驿马桃花
function getmaxing($ddz){
if($ddz==2 || $ddz==6 || $ddz==10 ){
$maxing=7;
$taohua=0;
}
if ($ddz== 0 || $ddz==4 || $ddz==8 ){
$maxing=6;
$taohua=1;
}
if($ddz== 3 || $ddz==7 || $ddz==11 )
{
$maxing=9;
$taohua=4;
}

if ($ddz== 1 || $ddz==5 || $ddz==9 )
{
$maxing=3;
$taohua=10;
}
return array($maxing,$taohua);
}
//配禄神
function getlushen($dtg){
 switch($dtg){	
case 0: $lu=1;break;
case 1:$lu=3;break;
case 2:$lu=4;break;
case 3:$lu=6;break;
case 4:$lu=7;break;
case 5:$lu=6;break;
case 6:$lu=7;break;
case 7:$lu=9;break;
case 8:$lu=10;break;
case 9:$lu=0;break;
  }
return $lu;
}

function getguiren($dtg){
if($dtg==3 || $dtg==4 ){
$guiren1=10;
$guiren2=0;
}
if ($dtg==1 || $dtg==5 || $dtg==7){
$guiren1=2;
$guiren2=8;
}
if ($dtg==2 || $dtg==6){
$guiren1=1;
$guiren2=9;
}
if ($dtg==0 || $dtg==9 ){
$guiren1=6;
$guiren2=4;
}
if ($dtg==8 ){
$guiren1=3;
$guiren2=7;
}
return array($guiren1,$guiren2);
}
//配贵人
?>
