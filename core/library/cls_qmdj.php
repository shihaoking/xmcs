<?php
/**
 * 黄道吉日查询(黄历)
 */
class cls_qmdj
{
	
	
		function sizhu($yea,$mon,$dat,$hou,$minut,$gzlei)
		{
		$a[21] = "甲";$a[22] = "乙";$a[23] = "丙";$a[24] = "丁";$a[25] = "戊";$a[26] = "己";$a[27] = "庚";$a[28] = "辛";$a[29] = "壬";$a[20] = "癸";
		
		//十二地支
		
		$a[31] = "子";$a[32] = "丑";$a[33] = "寅";$a[34] = "卯";$a[35] = "辰";$a[36] = "巳";$a[37] = "午";$a[38] = "未";$a[39] = "申";$a[40] = "酉";$a[41] = "戌";$a[30] = "亥";
		
		//到此，完成了农历向阳历的转换
		
		$bzyear=$yea;
		$bzmonth=$mon;
		$bzday=$dat;
		$bztime=$hou;
		
		//md确定节气 yz 月支  起运基数 qyjs
		$md=$bzmonth * 100 + $bzday;
		if($md>=204 && $md<= 305) 
		{ 
			$mz = 3;
			$qyjs = floor((($bzmonth - 2) * 30 + $bzday - 4) / 3);
		}
		
		if($md>=306 && $md<=404)
		{
			$mz = 4;
			$qyjs =floor((($bzmonth - 3) * 30 + $bzday - 6) /3);
		}
		
		if($md>=405 && $md<= 504) 
		{
			$mz = 5;
			$qyjs =floor((($bzmonth - 4) * 30 + $bzday - 5) / 3);
		}
		
		if($md>=505 && $md<= 605) 
		{
			$mz = 6;
			$qyjs =floor((($bzmonth - 5) * 30 + $bzday - 5) /3);
		}
		
		if($md>=606 && $md<= 706)
		{
			$mz = 7;
			$qyjs = floor((($bzmonth - 6) * 30 + $bzday - 6) /3);
		}
		
		if($md>=707 && $md<= 807) 
		{
			$mz = 8;
			$qyjs = floor((($bzmonth - 7) * 30 + $bzday - 7) /3);
		}
		
		if($md>=808 && $md<=907)
		{
			$mz = 9;
			$qyjs = floor((($bzmonth - 8) * 30 + $bzday - 8) / 3);
		}
		
		if($md>=908 && $md<=1007)
		{
			$mz = 10;
			$qyjs = floor((($bzmonth - 9) * 30 + $bzday - 8) / 3);
		}
		
		if($md>=1008 && $md<= 1106) 
		{
			$mz = 11;
			$qyjs = floor((($bzmonth - 10) * 30 + $bzday - 8) / 3);
		}
		
		if($md>=1107 && $md<=  1207) 
		{
			$mz = 0;
			$qyjs = floor((($bzmonth - 11) * 30 + $bzday - 7) / 3);
		}
		
		if($md>=1208 && $md<=  1231)
		{
			$mz = 1;
			$qyjs = floor(($bzday - 8) / 3);
		}
		
		if($md>=101 && $md<= 105)
		{
			$mz = 1;
			$qyjs = floor((30 + $bzday - 4) / 3);
		}
		
		if($md>=106 && $md<=  203) 
		{
			$mz = 2;
			$qyjs = floor((($bzmonth - 1) * 30 + $bzday - 6) / 3);
		}
		
		//确定年干和年支 yg 年干 yz 年支
		if($md>=204 && $md<=1231) 
		{
			$yg = ($bzyear - 3) % 10;
			$yz = ($bzyear - 3) % 12;
		}
		if($md>=101 && $md<=203 ) 
		{
			$yg = ($bzyear - 4) % 10;
			$yz = ($bzyear - 4) % 12;
		}
		
		//确定月干 mg 月干
		
		if( $mz > 2 && $mz <= 11) 
		{
			$mg = ($yg * 2 + $mz + 8) % 10;
		}
		else
		{
			$mg = ($yg * 2 + $mz) % 10;
		}
		
		//从公元0年到目前年份的天数 yearlast
		
		$yearlast = ($bzyear - 1) * 5 + floor(($bzyear - 1) / 4)- floor(($bzyear - 1) / 100) + floor(($bzyear - 1) / 400);
		//计算某月某日与当年1月0日的时间差（以日为单位）yearday
		$yearday=0;
		for ($i = 1 ;$i<= $bzmonth - 1;$i++)
		{
			switch($i)
			{
				case 1: 
				$yearday += 31;
				break;
				case 3:
				$yearday += 31;
				break;
				case 5:
				$yearday += 31;
				break;
				case 7:
				$yearday += 31;
				break;
				case 8:
				$yearday += 31;
				break;
				case 10:
				$yearday += 31;
				break;
				case 12:
				$yearday += 31;
				break;
				case 4: 
				$yearday+=  30;
				break;
				case  6:
				$yearday +=  30;
				break;
				case 9:
				$yearday +=  30;
				break;
				case 11:
				$yearday +=  30;
				break;
				case 2:
				if($bzyear % 4 == 0 && $bzyear % 100 <> 0 || $bzyear % 400 == 0 )
				{
					$yearday += 29;
					break;
				}
				else{
					$yearday +=  28;
					break;
				}
			}
		}
		$yearday = $yearday + $bzday;
		
		//计算日的六十甲子数 day60
		$day60 = ($yearlast + $yearday + 6015) % 60;
		
		//确定 日干 dg  日支  dz
		$dg = $day60 % 10;
		$dz = $day60 % 12;
		//确定 时干 tg 时支 tz
		$tz = floor(($bztime + 3) /2) % 12;
		//tg = (dg * 2 + tz + 8)% 10
		if($tz == 0)
		{
			$tg = ($dg * 2 + $tz) % 10;
		}else{
			$tg = ($dg * 2 + $tz + 8) % 10;
		}
		
		
		//把 年月日时 转换成为 生辰八字
		switch($yz)
		{
			case 1:$yzg = 0;break;
			case 2:$yzg = 6;break;
			case 8:$yzg = 6;break;
			case 3:$yzg = 1;break;
			case 4:$yzg = 2;break;
			case 5:$yzg = 5;break;
			case 11:$yzg = 5;break;
			case 6:$yzg = 3;break;
			case 7:$yzg = 4;break;
			case 9:$yzg = 7;break;
			case 10:$yzg = 8;break;
			case 0:$yzg = 9;break;
		}
		//月支纳干 mzg
		switch($mz)
		{
			case 1:$mzg = 0;break;
			case 2:$mzg = 6;break;
			case 8:$mzg = 6;break;
			case 3:$mzg = 1;break;
			case 4:$mzg = 2;break;
			case 5:$mzg = 5;break;
			case 11:$mzg = 5;break;
			case 6:$mzg = 3;break;
			case 7:$mzg = 4;break;
			case 9:$mzg = 7;break;
			case 10:$mzg = 8;break;
			case 0:$mzg = 9;break;
		}
		
		//日支纳干 dzg
		
		switch($dz)
		{
			case 1:$dzg = 0;break;
			case 2:$dzg = 6;break;
			case 8:$dzg = 6;break;
			case 3:$dzg = 1;break;
			case 4:$dzg = 2;break;
			case 5:$dzg = 5;break;
			case 11:$dzg = 5;break;
			case 6:$dzg = 3;break;
			case 7:$dzg = 4;break;
			case 9:$dzg = 7;break;
			case 10:$dzg = 8;break;
			case 0:$dzg = 9;break;
		}
		
		//'时支纳干 tzg
		
		switch($tz)
		{
			case 1:$tzg = 0;break;
			case 2:$tzg = 6;break;
			case 8:$tzg = 6;break;
			case 3:$tzg = 1;break;
			case 4:$tzg = 2;break;
			case 5:$tzg = 5;break;
			case 11:$tzg = 5;break;
			case 6:$tzg = 3;break;
			case 7:$tzg = 4;break;
			case 9:$tzg = 7;break;
			case 10:$tzg = 8;break;
			case 0:$tzg = 9;break;
		}
		
			//'到此，完成各地支所纳天干的确定任务
			$yg1=$a[20 + $yg];
			$yz1=$a[30 + $yz];
			$mg1=$a[20 + $mg];
			$mz1=$a[30 + $mz];
			$dg1=$a[20 + $dg];
			$dz1=$a[30 + $dz];
			$tg1=$a[20 + $tg];
			$tz1=$a[30 + $tz];
			$ygz=$a[20 + $yg].$a[30 + $yz];
			$mgz=$a[20 + $mg].$a[30 + $mz];
			$dgz=$a[20 + $dg].$a[30 + $dz];
			$tgz=$a[20 + $tg].$a[30 + $tz];
			if($gzlei=="nian")
			{
				return($ygz);
			}
			if($gzlei=="yue")
			{
				return($mgz);
			}
			//干支纪月
			if($gzlei=="ri")
			{
				return($dgz);
			}
			//'获得干支纪日
			if($gzlei=="shi")
			{
				return($tgz);
			}
		}
		
		
		
		function xunkong($gz1,$shou)
		{
			$path=PATH_DATA."/paipan/qmdj/xunkong.txt";
			$fopx=fopen($path,"r");
			$fns=file($path);
			for($i=0;$i<=5;$i++)
			{
				$str=$fns[$i]; 
				$strarr=explode("-",$str);
				$y=array_search($gz1,$strarr);
				if($strarr[$y]==$gz1)
				{
					$xunk=$strarr[10];
					$xunshou=$strarr[0];
				}
			}
			if($shou=="no")
			{
				return($xunk);
			}
			if($shou=="yes")
			{
				return($xunshou);
			}
			fclose($fopx);
		}
		
		
		function CbtoI($biangindex)
		{
			$CbtoI=substr($biangindex,1)*32+substr($biangindex,1,1)*16+substr($biangindex,2,1)*8+substr($biangindex,3,1)*4+substr($biangindex,4,1)*2+substr($biangindex,5,1);
			return ($CbtoI);
		}
		
		
		function Cfan($strs)
		{
			$str=$strs;
			$leng=strlen($str);
			$str2="";
			for($i=1;$i<=$leng;$i++){
				$bit=substr($str,1);
				$str=substr($str,-($leng-$i));
				$bit=$bit xor "1";
				$str2=$str2.$bit;
				return($str2);
			}
		}
		
		function Tgorder($gzx)  //'求天干序号
		{
			$tg=array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
			$tgs=substr($gzx,0,3);
			$xu=array_search($tgs,$tg);
			return $xu ;
		}
		
		function DzOrder($gzx)  //'求地支序号
		{ 
			$dzs=substr($gzx,-3);
			$dz=array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
			$xu=array_search($dzs,$dz);
			return $xu;
		}
		
		function makejq($y,$m,$d,$h,$mins)//$PreJq,$NJq)
		{
		$jq=array("立春","雨水","惊蛰" ,"春分" ,"清明" ,"谷雨" ,"立夏" ,"小满","芒种","夏至","小暑","大暑","立秋" ,"处暑","白露","秋分" ,"寒露" ,"霜降" ,"立冬","小雪" ,"大雪","冬至","小寒" ,"大寒");
		$times=mktime($h,$mins,0,intval($m),intval($d),$y);
		$path=PATH_DATA."/paipan/qmdj/cal.txt";
		$fopn=fopen($path,"r");
		$cal=file($path);
		$i=0;
		do
		{
			$str=$cal[$i];
			$strarr=explode(",",$str);
			if($strarr[1]==$y&&$strarr[2]==$m){
				$time1=mktime($strarr[6],$strarr[7],0,$strarr[2],$strarr[3],$strarr[1]);
				$time2=mktime($strarr[10],$strarr[9],0,$strarr[2],$strarr[8],$strarr[1]);
				if($times<$time1){
					$str=$cal[$i-1];
					$strarr=explode(",",$str);
					$jiaoj=mktime($strarr[10],$strarr[9],0,$strarr[2],$strarr[8],$strarr[1]);
					$j=(($i-2)%12)*2+1;
					break;
				}
				if ($times>=$time1 && $times<$time2 )
				{
					$j=(($i-1)%12)*2;
					$jiaoj=$time1;
					break;
				}
				if ($times>=$time2)
				{
					$j=(($i-1)%12)*2+1;
					$jiaoj=$time2;
					break;
				}
			}
		   $i++;
		}
		while($i<=1332);
		$jieqq=date("Y",$jiaoj)."年".date("m",$jiaoj)."月".date("d",$jiaoj)."日".date("H",$jiaoj)."时".date("i",$jiaoj)."分".$jq[$j];
		$Njq=$jieqq;
		return($Njq);
		fclose($fopn);
		}


	
		function sanyuan($gz)
		{
				$tg=array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
				$dz=array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
				$j=0;
				for($i=0;$i<=59;$i++)
				{ 
					$TgIndex=$i%10;
					$DzIndex=$i%12;
					if($tg[$TgIndex].$dz[$DzIndex]==$gz) break;
						$j++;
					}
					$j=floor($j/5);
					switch($j){
					case 0:$yuan="上元";break;
					case 3:$yuan="上元";break;
					case 6:$yuan="上元";break;
					case 9:$yuan="上元";break;
					case 1:$yuan="中元";break;
					case 4:$yuan="中元";break;
					case 7:$yuan="中元";break;
					case 10:$yuan="中元";break;
					case 2:$yuan="下元";break;
					case 5:$yuan="下元";break;
					case 8:$yuan="下元";break;
					case 11:$yuan="下元";break;
				}//三元计算结束
			return $yuan;
		}
		
		
		
		
		function dunju($y,$m,$d,$h,$f)
		{
			$dgz=self::sizhu($y,$m,$d,$h,$f,"ri");
			$jieqq=self::makejq($y,$m,$d,$h,$f);
			$jieqi=substr(trim($jieqq),-6);
			switch($jieqi)
			{
				case "冬至":$YyJu="一七四";break;
				case "惊蛰":$YyJu="一七四";break;
				case "小寒":$YyJu="二八五";break;
				case "大寒":$YyJu="三九六";break;
				case "春分":$YyJu="三九六";break;
				case "雨水":$YyJu="九六三";break;
				case "清明":$YyJu="四一七";break;
				case "立夏":$YyJu="四一七";break;
				case "立春":$YyJu="八五二";break;
				case "谷雨":$YyJu="五二八";break;
				case "小满":$YyJu="五二八";break;
				case "芒种":$YyJu="六三九";break;
				case "夏至":$YinJu="九三六";break;
				case "白露":$YinJu="九三六";break;
				case "小暑":$YinJu="八二五";break;                     
				case "大暑":$YinJu="七一四";break;
				case "秋分":$YinJu="七一四";break;
				case "立秋":$YinJu="二五八";break;
				case "寒露":$YinJu="六九三";break;
				case "立冬":$YinJu="六九三";break;
				case "处暑":$YinJu="一四七";break;
				case "霜降":$YinJu="五八二";break;
				case "小雪":$YinJu="五八二";break;
				case "大雪":$YinJu="四七一";break;
			}
			$yuan=self::sanyuan($dgz);
			if(!empty($YyJu))
			{
				switch($yuan)
				{
					case "中元": $JuXu=substr($YyJu,3,3);break;
					case "上元": $JuXu=substr($YyJu,0,3);break;
					case "下元":$JuXu=substr($YyJu,-3);break;
				}
				$dunju="阳遁".$JuXu."局";
				$yinyang=true; //阳局
			}else{
				$yinyang=false;//'阴局
				switch($yuan)
				{
					case "中元": $JuXu=substr($YinJu,3,3);break;
					case "上元": $JuXu=substr($YinJu,0,3);break;
					case "下元": $JuXu=substr($YinJu,-3);break;
				} 
				$dunju="阴遁".$JuXu."局";
			}
			return $dunju."-".$yinyang;
		}
}
?>
