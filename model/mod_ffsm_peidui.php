<?php 
if (!defined('CORE'))  exit('Request Error!'); 
class mod_ffsm_peidui { 
		
	function hehun($row){
		/*
		dim $md
		'确定节气 yz 月支  起运基数 $qyjs
		*/
		$b[31] = "鼠 ";
		$b[32] = "牛 ";
		$b[33] = "虎 ";
		$b[34] = "兔 ";
		$b[35] = "龙 ";
		$b[36] = "蛇 ";
		$b[37] = "马 ";
		$b[38] = "羊 ";
		$b[39] = "猴 ";
		$b[40] = "鸡 ";
		$b[41] = "狗 ";
		$b[30] = "猪 ";
		
		$c[31] = "水 ";
		$c[32] = "水 ";
		$c[33] = "木 ";
		$c[34] = "木 ";
		$c[35] = "木 ";
		$c[36] = "火 ";
		$c[37] = "火 ";
		$c[38] = "火 ";
		$c[39] = "金 ";
		$c[40] = "金 ";
		$c[41] = "金 ";
		$c[30] = "水 ";
		
		#天干
		$d[21] = "a";
		$d[22] = "a";
		$d[23] = "b";
		$d[24] = "b";
		$d[25] = "c";
		$d[26] = "c";
		$d[27] = "d";
		$d[28] = "d";
		$d[29] = "e";
		$d[20] = "e";
		
		$da[21] = "1";
		$da[22] = "0";
		$da[23] = "1";
		$da[24] = "0";
		$da[25] = "1";
		$da[26] = "0";
		$da[27] = "1";
		$da[28] = "0";
		$da[29] = "1";
		$da[20] = "0";
		
		#天干合化
		$e[21] = "土";
		$e[22] = "金";
		$e[23] = "水";
		$e[24] = "木";
		$e[25] = "火";
		$e[26] = "土";
		$e[27] = "金";
		$e[28] = "水";
		$e[29] = "木";
		$e[20] = "火";
		
		$a[21] = "甲";
		$a[22] = "乙";
		$a[23] = "丙";
		$a[24] = "丁";
		$a[25] = "戊";
		$a[26] = "己";
		$a[27] = "庚";
		$a[28] = "辛";
		$a[29] = "壬";
		$a[20] = "癸";
		
		$a[31] = "子 ";
		$a[32] = "丑 ";
		$a[33] = "寅 ";
		$a[34] = "卯 ";
		$a[35] = "辰 ";
		$a[36] = "巳 ";
		$a[37] = "午 ";
		$a[38] = "未 ";
		$a[39] = "申 ";
		$a[40] = "酉 ";
		$a[41] = "戌 ";
		$a[30] = "亥 ";
		
		#十神名称
		
		$a[1] = "比肩";
		$a[2] = "劫财";
		$a[3] = "食神";
		$a[4] = "伤官";
		$a[5] = "偏财";
		$a[6] = "正财";
		$a[7] = "七杀";
		$a[8] = "正官";
		$a[9] = "偏印";
		$a[0] = "正印";
		
		####男命
		$name=$row['username']; #姓名
		$year=$row["year"]; #年干
		$month =$row["month"]; #月份
		$day =$row["day"]; #日
		$t_ime=$row["hour"]; #时
		$csrq=req::item("csrq");  #出生地址

        $qq=req::item("qq"); #
		$tel=req::item("tel"); #电话
		####女命
		$name_a=$row["girl_username"]; #姓名
		$year_a=$row["girl_year"]; #年干
		$month_a =$row["girl_month"]; #月份
		$day_a =$row["girl_day"]; #日
		$t_ime_a=$row["girl_hour"]; #时
		$csrq_a=req::item("csrq_a");  #出生地址
		$qq_a=req::item("qq_a"); #
		$tel_a=req::item("tel_a"); #电话




		$name=cls_hehun::safew("$name");
		$year=cls_hehun::safew("$year");
		$month=cls_hehun::safew("$month");
		$day=cls_hehun::safew("$day");
		$t_ime=cls_hehun::safew("$t_ime");
		$qq=cls_hehun::safew("$qq");
		$tel=cls_hehun::safew("$tel");
		#
		$name_a=cls_hehun::safew("$name_a");
		$year_a=cls_hehun::safew("$year_a");
		$month_a=cls_hehun::safew("$month_a");
		$day_a=cls_hehun::safew("$day_a");
		$t_ime_a=cls_hehun::safew("$t_ime_a");
		$qq_a=cls_hehun::safew("$qq_a");
		$tel_a=cls_hehun::safew("$tel_a");
		#
		$name=htmlspecialchars("$name");
		$year=htmlspecialchars("$year");
		$month=htmlspecialchars("$month");
		$day=htmlspecialchars("$day");
		$t_ime=htmlspecialchars("$t_ime");
		$qq=htmlspecialchars("$qq");
		$tel=htmlspecialchars("$tel");
		#
		$name_a=htmlspecialchars("$name_a");
		$year_a=htmlspecialchars("$year_a");
		$month_a=htmlspecialchars("$month_a");
		$day_a=htmlspecialchars("$day_a");
		$t_ime_a=htmlspecialchars("$t_ime_a");
		$qq_a=htmlspecialchars("$qq_a");
		$tel_a=htmlspecialchars("$tel_a");
		
		
		//if( strlen($name)>13||strlen($name)<3||strlen($name_a)>13||strlen($name_a)<3 ) { die("<script>alert('姓名不能为一个独姓或5个汉字！');history.back();</script>"); }
		###########################################
		#1先算男命
		$yearday='';
		#确定节气 yz 月支  起运基数 qyjs
		$md=$month * 100 + $day;
		if($md>=204 and $md<= 305) {
			$mz = 3;
			$qyjs = (($month - 2) * 30 + $day - 4)/3;
		}
		if($md>=306 and $md<=404) {
			$mz = 4;
			$qyjs = (($month - 3) * 30 + $day - 6)/3;
		}
		
		if($md>=405 and $md<= 504) {
			$mz = 5;
			$qyjs = (($month - 4) * 30 + $day - 5)/3;
		}
		
		if($md>=505 and $md<=  605) {
			$mz = 6;
			$qyjs = (($month - 5) * 30 + $day - 5)/3;
		}
		
		if($md>=606 and $md<= 706) {
			$mz = 7;
			$qyjs = (($month - 6) * 30 + $day - 6)/3;
		}
		
		if($md>=707 and $md<= 807) {
			$mz = 8;
			$qyjs = (($month - 7) * 30 + $day - 7)/3;
		}
		
		if($md>=808 and $md<=907) {
			$mz = 9;
			$qyjs = (($month - 8) * 30 + $day - 8)/3;
		}
		
		if($md>=908 and $md<=1007) {
			$mz = 10;
			$qyjs = (($month - 9) * 30 + $day - 8)/3;
		}
		
		if($md>=1008 and $md<= 1106) {
			$mz = 11;
			$qyjs = (($month - 10) * 30 + $day - 8)/3;
		}
		
		if($md>=1107 and $md<=  1207) {
			$mz = 0;
			$qyjs = (($month - 11) * 30 + $day - 7)/3;
		}
		
		if($md>=1208 and $md<=  1231) {
			$mz = 1;
			$qyjs = ($day - 8)/3;
		}
		
		if($md>=101 and $md<= 105) {
			$mz = 1;
			$qyjs = (30 + $day - 4)/3;
		}
		
		if($md>=106 and $md<=  203) {
			$mz = 2;
			$qyjs = (($month - 1) * 30 + $day - 6)/3;
		}
		
		
		###############
		#确定年干和年支 yg 年干 yz 年支
		if($md>=204 and $md<=1231){
			$yg = ($year-3)%10;
			$yz = ($year-3)%12;
		}
		if($md>=101 and $md<=203 ){
		$yg = ($year-4)%10;
		$yz = ($year-4)%12;
		}
		###############
		#确定月干 mg 月干
		if($mz > 2 and $mz <= 11) {
		
		$mg = ($yg * 2 + $mz + 8)%10;
		} else {
		$mg = ($yg * 2 + $mz)%10;
		}
		###############
		#从公元0年到目前年份的天数 yearlast
		#计算某月某日与当年1月0日的时间差（以日为单位）yearday
		$yearlast = ($year  - 1) * 5 + ($year  - 1) / 4 - ($year  - 1)/ 100 + ($year  - 1)/ 400;
		
		for($i=1;$i<$month;$i++){
			switch ($i) {
				case 1:
				$yearday = $yearday + 31;
				break;
				case 3:
				$yearday = $yearday + 31;
				break;
				case 5:
				$yearday = $yearday + 31;
				break;
				case 7:
				$yearday = $yearday + 31;
				break;
				case 8:
				$yearday = $yearday + 31;
				break;
				case 10:
				$yearday = $yearday + 31;
				break;
				case 12:
				$yearday = $yearday + 31;
				break;
				case 4:
				$yearday = $yearday + 30;
				break;
				case 6:
				$yearday = $yearday + 30;
				break;
				case 9:
				$yearday = $yearday + 30;
				break;
				case 11:
				$yearday = $yearday + 30;
				break;
				case 2:
				if ($year%4==0 and $year%100<>0 or $year%400==0) {
					$yearday = $yearday + 29;} 
				else {
					$yearday = $yearday + 28;
				}
				break;
			}
		}
		$yearday = $yearday + $day;
		#计算日的六十甲子数 day60
		$day60 = ($yearlast + $yearday + 6015)%60;
		#确定 日干 dg  日支  dz
		$dg = $day60%10;
		$dz = $day60%12;
		#确定 时干 tg 时支 tz
		$tz = ($t_ime + 3)/2%12;
		#tg = (dg * 2 + tz + 8) Mod 10
		if($tz == 0){
			$tg = ($dg * 2 + $tz)%10; 
		}else {
			$tg = ($dg * 2 + $tz + 8)%10; 
		}
		/*#到此，已经完成把 年月日时 转换成为 生辰八字的任务	
		'确定各地支所纳天干
		'年支纳干 yzg 月支纳干 mzg  日支纳干 dzg 时支纳干 tzg
		'年支纳干 yzg*/
		
		switch ($yz) {
			case 1:
			$yzg =0;
			break;
			case 2:
			$yzg =6;
			break;
			case 8:
			$yzg =6;
			break;
			case 3:
			$yzg =1;
			break;
			case 4:
			$yzg =2;
			break;
			case 5:
			$yzg =5;
			break;
			case 11:
			$yzg =5;
			break;
			case 6:
			$yzg =3;
			break;
			case 7:
			$yzg =4;
			break;
			case 9:
			$yzg =7;
			break;
			case 10:
			$yzg =8;
			break;
			case 0:
			$yzg =9;
			break;
		}
		#月支纳干 mzg
		switch ($mz) {
			case 1:
			$mzg =0;
			break;
			case 2:
			$mzg =6;
			break;
			case 8:
			$mzg =6;
			break;
			case 3:
			$mzg =1;
			break;
			case 4:
			$mzg =2;
			break;
			case 5:
			$mzg =5;
			break;
			case 11:
			$mzg =5;
			break;
			case 6:
			$mzg =3;
			break;
			case 7:
			$mzg =4;
			break;
			case 9:
			$mzg =7;
			break;
			case 10:
			$mzg =8;
			break;
			case 0:
			$mzg =9;
			break;
		}
		#'日支纳干 dzg
		switch ($dz) {
			case 1:
			$dzg =0;
			break;
			case 2:
			$dzg =6;
			break;
			case 8:
			$dzg =6;
			break;
			case 3:
			$dzg =1;
			break;
			case 4:
			$dzg =2;
			break;
			case 5:
			$dzg =5;
			break;
			case 11:
			$dzg =5;
			break;
			case 6:
			$dzg =3;
			break;
			case 7:
			$dzg =4;
			break;
			case 9:
			$dzg =7;
			break;
			case 10:
			$dzg =8;
			break;
			case 0:
			$dzg =9;
			break;
		}
		#'时支纳干 tzg
		switch ($tz) {
			case 1:
			$tzg =0;
			break;
			case 2:
			$tzg =6;
			break;
			case 8:
			$tzg =6;
			break;
			case 3:
			$tzg =1;
			break;
			case 4:
			$tzg =2;
			break;
			case 5:
			$tzg =5;
			break;
			case 11:
			$tzg =5;
			break;
			case 6:
			$tzg =3;
			break;
			case 7:
			$tzg =4;
			break;
			case 9:
			$tzg =7;
			break;
			case 10:
			$tzg =8;
			break;
			case 0:
			$tzg =9;
			break;
		}
		#到此，完成各地支所纳天干的确定任务
		
		#确定各支对应的十神
		
		#年干十神 ygs
		$ygs = (($yg + 11 - $dg) + (($dg + 1) % 2) * (($yg + 10 - $dg) % 2) * 2) % 10;
		
		#月干十神 $mgs
		$mgs = (($mg + 11 - $dg) + (($dg + 1) % 2) * (($mg + 10 - $dg) % 2) * 2) % 10;
		
		#时干十神 $dgs
		$tgs = (($tg + 11 - $dg) + (($dg + 1) % 2) * (($tg + 10 - $dg) % 2) * 2) % 10;
		
		#年支十神 yzs
		$yzs = (($yzg + 11 - $dg) + (($dg + 1) % 2) * (($yzg + 10 - $dg) % 2) * 2) % 10;
		
		#月支十神 mzs;
		$mzs = (($mzg + 11 - $dg) + (($dg + 1) % 2) * (($mzg + 10 - $dg) % 2) * 2) % 10;
		
		#日支十神 dzs
		$dzs = (($dzg + 11 - $dg) + (($dg + 1) % 2) * (($dzg + 10 - $dg) % 2) * 2) % 10;
		
		#时支十神 tzs
		$tzs = (($tzg + 11 - $dg) + (($dg + 1) % 2) * (($tzg + 10 - $dg) % 2) * 2) % 10;
		
		#到此，完成年月日时，各干支十神的确定
		#确定起运数
		##################################################################
		#女命
		$yearday_a='';
		#确定节气 yz 月支  起运基数 qyjs
		$md_a=$month_a * 100 + $day_a;
		if($md_a>=204 and $md_a<= 305) {
		$mz_a = 3;
		$qyjs_a = (($month_a - 2) * 30 + $day_a - 4)/3;
		}
		if($md_a>=306 and $md_a<=404) {
		$mz_a = 4;
		$qyjs_a = (($month_a - 3) * 30 + $day_a - 6)/3;
		}
		
		if($md_a>=405 and $md_a<= 504) {
		$mz_a = 5;
		$qyjs_a = (($month_a - 4) * 30 + $day_a - 5)/3;
		}
		
		if($md_a>=505 and $md_a<=  605) {
		$mz_a = 6;
		$qyjs_a = (($month_a - 5) * 30 + $day_a - 5)/3;
		}
		
		if($md_a>=606 and $md_a<= 706) {
		$mz_a = 7;
		$qyjs_a = (($month_a - 6) * 30 + $day_a - 6)/3;
		}
		
		if($md_a>=707 and $md_a<= 807) {
		$mz_a = 8;
		$qyjs_a = (($month_a - 7) * 30 + $day_a - 7)/3;
		}
		
		if($md_a>=808 and $md_a<=907) {
		$mz_a = 9;
		$qyjs_a = (($month_a - 8) * 30 + $day_a - 8)/3;
		}
		
		if($md_a>=908 and $md_a<=1007) {
		$mz_a = 10;
		$qyjs_a = (($month_a - 9) * 30 + $day_a - 8)/3;
		}
		
		if($md_a>=1008 and $md_a<= 1106) {
		$mz_a = 11;
		$qyjs_a = (($month_a - 10) * 30 + $day_a - 8)/3;
		}
		
		if($md_a>=1107 and $md_a<=  1207) {
		$mz_a = 0;
		$qyjs_a = (($month_a - 11) * 30 + $day_a - 7)/3;
		}
		
		if($md_a>=1208 and $md_a<=  1231) {
		$mz_a = 1;
		$qyjs_a = ($day_a - 8)/3;
		}
		
		if($md_a>=101 and $md_a<= 105) {
		$mz_a = 1;
		$qyjs_a = (30 + $day_a - 4)/3;
		}
		
		if($md_a>=106 and $md_a<=  203) {
		$mz_a = 2;
		$qyjs_a = (($month_a - 1) * 30 + $day_a - 6)/3;
		}
		
		
		###############
		#确定年干和年支 yg 年干 yz 年支
		if($md_a>=204 and $md_a<=1231){
		$yg_a = ($year_a-3)%10;
		$yz_a = ($year_a-3)%12;
		}
		if($md_a>=101 and $md_a<=203 ){
		$yg_a = ($year_a-4)%10;
		$yz_a = ($year_a-4)%12;
		}
		###############
		#确定月干 mg 月干
		if ($mz_a > 2 and $mz_a <= 11) {
			$mg_a = ($yg_a * 2 + $mz_a + 8)%10;
		} else {
			$mg_a = ($yg_a * 2 + $mz_a)%10;
		}
		###############
		#从公元0年到目前年份的天数 yearlast
		$yearlast_a = ($year_a  - 1) * 5 + ($year_a  - 1) / 4 - ($year_a  - 1)/ 100 + ($year_a  - 1)/ 400;
		
		for($i_a=1;$i_a<$month_a;$i_a++){
			switch ($i_a) {
				case 1:
				$yearday_a = $yearday_a + 31;
				break;
				case 3:
				$yearday_a = $yearday_a + 31;
				break;
				case 5:
				$yearday_a = $yearday_a + 31;
				break;
				case 7:
				$yearday_a = $yearday_a + 31;
				break;
				case 8:
				$yearday_a = $yearday_a + 31;
				break;
				case 10:
				$yearday_a = $yearday_a + 31;
				break;
				case 12:
				$yearday_a = $yearday_a + 31;
				break;
				case 4:
				$yearday_a = $yearday_a + 30;
				break;
				case 6:
				$yearday_a = $yearday_a + 30;
				break;
				case 9:
				$yearday_a = $yearday_a + 30;
				break;
				case 11:
				$yearday_a = $yearday_a + 30;
				break;
				case 2:
				if ($year_a%4==0 and $year_a%100<>0 or $year_a%400==0) {
					$yearday_a = $yearday_a + 29;} 
				else {
					$yearday_a = $yearday_a + 28;
				}
				break;
			}
		}
		$yearday_a = $yearday_a + $day_a;
		#计算日的六十甲子数 day60
		$day60_a = ($yearlast_a + $yearday_a + 6015)%60;
		#确定 日干 dg  日支  dz
		$dg_a = $day60_a%10;
		$dz_a = $day60_a%12;
		#确定 时干 tg 时支 tz
		$tz_a = ($t_ime_a + 3)/2%12;
		#tg = (dg * 2 + tz + 8) Mod 10
		if($tz_a == 0){
			$tg_a = ($dg_a * 2 + $tz_a)%10; 
		}else {
			$tg_a = ($dg_a * 2 + $tz_a + 8)%10; 
		}
		/*#到此，已经完成把 年月日时 转换成为 生辰八字的任务	
		'确定各地支所纳天干
		'年支纳干 yzg 月支纳干 mzg  日支纳干 dzg 时支纳干 tzg
		'年支纳干 yzg*/
		
		switch ($yz_a) {
			case 1:
			$yzg_a =0;
			break;
			case 2:
			$yzg_a =6;
			break;
			case 8:
			$yzg_a =6;
			break;
			case 3:
			$yzg_a =1;
			break;
			case 4:
			$yzg_a =2;
			break;
			case 5:
			$yzg_a =5;
			break;
			case 11:
			$yzg_a =5;
			break;
			case 6:
			$yzg_a =3;
			break;
			case 7:
			$yzg_a =4;
			break;
			case 9:
			$yzg_a =7;
			break;
			case 10:
			$yzg_a =8;
			break;
			case 0:
			$yzg_a =9;
			break;
		}
		#月支纳干 mzg
		switch ($mz_a) {
			case 1:
			$mzg_a =0;
			break;
			case 2:
			$mzg_a =6;
			break;
			case 8:
			$mzg_a =6;
			break;
			case 3:
			$mzg_a =1;
			break;
			case 4:
			$mzg_a =2;
			break;
			case 5:
			$mzg_a =5;
			break;
			case 11:
			$mzg_a =5;
			break;
			case 6:
			$mzg_a =3;
			break;
			case 7:
			$mzg_a =4;
			break;
			case 9:
			$mzg_a =7;
			break;
			case 10:
			$mzg_a =8;
			break;
			case 0:
			$mzg_a =9;
			break;
		}
		#'日支纳干 dzg
		switch ($dz_a) {
			case 1:
			$dzg_a =0;
			break;
			case 2:
			$dzg_a =6;
			break;
			case 8:
			$dzg_a =6;
			break;
			case 3:
			$dzg_a =1;
			break;
			case 4:
			$dzg_a =2;
			break;
			case 5:
			$dzg_a =5;
			break;
			case 11:
			$dzg_a =5;
			break;
			case 6:
			$dzg_a =3;
			break;
			case 7:
			$dzg_a =4;
			break;
			case 9:
			$dzg_a =7;
			break;
			case 10:
			$dzg_a =8;
			break;
			case 0:
			$dzg_a =9;
			break;
		}
		#'时支纳干 tzg
		switch ($tz_a) {
			case 1:
			$tzg_a =0;
			break;
			case 2:
			$tzg_a =6;
			break;
			case 8:
			$tzg_a =6;
			break;
			case 3:
			$tzg_a =1;
			break;
			case 4:
			$tzg_a =2;
			break;
			case 5:
			$tzg_a =5;
			break;
			case 11:
			$tzg_a =5;
			break;
			case 6:
			$tzg_a =3;
			break;
			case 7:
			$tzg_a =4;
			break;
			case 9:
			$tzg_a =7;
			break;
			case 10:
			$tzg_a =8;
			break;
			case 0:
			$tzg_a =9;
			break;
		}
		#到此，完成各地支所纳天干的确定任务
		
		#确定各支对应的十神
		
		#年干十神 ygs
		$ygs_a = (($yg_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($yg_a + 10 - $dg_a) % 2) * 2) % 10;
		
		#月干十神 $mgs
		$mgs_a = (($mg_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($mg_a + 10 - $dg_a) % 2) * 2) % 10;
		
		#时干十神 $dgs
		$tgs_a = (($tg_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($tg_a + 10 - $dg_a) % 2) * 2) % 10;
		
		#年支十神 yzs
		$yzs_a = (($yzg_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($yzg_a + 10 - $dg_a) % 2) * 2) % 10;
		
		#月支十神 mzs;
		$mzs_a = (($mzg_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($mzg_a + 10 - $dg_a) % 2) * 2) % 10;
		
		#日支十神 dzs
		$dzs_a = (($dzg_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($dzg_a + 10 - $dg_a) % 2) * 2) % 10;
		
		#时支十神 tzs
		$tzs_a = (($tzg_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($tzg_a + 10 - $dg_a) % 2) * 2) % 10;
		#女命已算完
		#到此，完成年月日时，各干支十神的确定
		
		##############################################
		#合婚开始
		###求出年份后两位数
		$f_n=substr("$year", 2); 
		$f_v=substr("$year_a", 2); 
		###求出所属宫位(数值表示）
		$z_n=cls_hehun::safe_convert("$f_n");
		$z_v=cls_hehun::safe_convert_a("$f_v");
		if($z_n==5) {$z_nn="2";} else {$z_nn=$z_n;}
		if($z_v==5) {$z_vv="8";} else {$z_vv=$z_v;}
		
		if($z_n==0) {$z_nn="9";} else {$z_nn=$z_n;}
		if($z_v==0) {$z_vv="9";} else {$z_vv=$z_v;}
		
		###推出年干年支
		$qq_n=cls_hehun::shengchen($f_n);
		$qq_v=cls_hehun::shengchen($f_v);
		###求出所属宫位(汉字表示）
		$m_n=cls_hehun::mgong("$z_n");
		$m_v=cls_hehun::mgong_a("$z_v");
		
		if($z_nn==1 and $z_vv==4){ $bb="30";   }
		if($z_nn==4 and $z_vv==1){ $bb="30";   }
		
		if($z_nn==2 and $z_vv==8){ $bb="30";   }
		if($z_nn==8 and $z_vv==2){ $bb="30";   }
		
		if($z_nn==3 and $z_vv==9){ $bb="30";   }
		if($z_nn==9 and $z_vv==3){ $bb="30";   }
		
		if($z_nn==6 and $z_vv==7){ $bb="30";   }
		if($z_nn==7 and $z_vv==6){ $bb="30";   }
		#########
		if($z_nn==1 and $z_vv==8){ $bb="0";   }
		if($z_nn==8 and $z_vv==1){ $bb="0";   }
		
		if($z_nn==2 and $z_vv==4){ $bb="0";   }
		if($z_nn==4 and $z_vv==2){ $bb="0";   }
		
		if($z_nn==3 and $z_vv==6){ $bb="0";   }
		if($z_nn==6 and $z_vv==3){ $bb="0";   }
		
		if($z_nn==9 and $z_vv==7){ $bb="0";   }
		if($z_nn==7 and $z_vv==9){ $bb="0";   }
		#######3
		if($z_nn==1 and $z_vv==9){ $bb="30";   }
		if($z_nn==9 and $z_vv==1){ $bb="30";   }
		
		if($z_nn==2 and $z_vv==6){ $bb="30";   }
		if($z_nn==6 and $z_vv==2){ $bb="30";   }
		
		if($z_nn==3 and $z_vv==4){ $bb="30";   }
		if($z_nn==4 and $z_vv==3){ $bb="30";   }
		
		if($z_nn==8 and $z_vv==7){ $bb="30";   }
		if($z_nn==7 and $z_vv==8){ $bb="30";   }
		#########
		if($z_nn==1 and $z_vv==6){ $bb="0";   }
		if($z_nn==6 and $z_vv==1){ $bb="0";   }
		
		if($z_nn==2 and $z_vv==9){ $bb="0";   }
		if($z_nn==9 and $z_vv==2){ $bb="0";   }
		
		if($z_nn==3 and $z_vv==8){ $bb="0";   }
		if($z_nn==8 and $z_vv==3){ $bb="0";   }
		
		if($z_nn==4 and $z_vv==7){ $bb="0";   }
		if($z_nn==7 and $z_vv==4){ $bb="0";   }
		######
		if($z_nn==1 and $z_vv==7){ $bb="0";   }
		if($z_nn==7 and $z_vv==1){ $bb="0";   }
		
		if($z_nn==2 and $z_vv==3){ $bb="0";   }
		if($z_nn==3 and $z_vv==2){ $bb="0";   }
		
		if($z_nn==4 and $z_vv==6){ $bb="0";   }
		if($z_nn==6 and $z_vv==4){ $bb="0";   }
		
		if($z_nn==8 and $z_vv==9){ $bb="0";   }
		if($z_nn==9 and $z_vv==8){ $bb="0";   }
		######
		if($z_nn==1 and $z_vv==3){ $bb="30";   }
		if($z_nn==3 and $z_vv==1){ $bb="30";   }
		
		if($z_nn==2 and $z_vv==7){ $bb="30";   }
		if($z_nn==7 and $z_vv==2){ $bb="30";   }
		
		if($z_nn==4 and $z_vv==9){ $bb="30";   }
		if($z_nn==9 and $z_vv==4){ $bb="30";   }
		
		if($z_nn==8 and $z_vv==6){ $bb="30";   }
		if($z_nn==6 and $z_vv==8){ $bb="30";   }
		######
		if($z_nn==1 and $z_vv==2){ $bb="0";   }
		if($z_nn==2 and $z_vv==1){ $bb="0";   }
		
		if($z_nn==7 and $z_vv==3){ $bb="0";   }
		if($z_nn==3 and $z_vv==7){ $bb="0";   }
		
		if($z_nn==4 and $z_vv==8){ $bb="0";   }
		if($z_nn==8 and $z_vv==4){ $bb="0";   }
		
		if($z_nn==9 and $z_vv==6){ $bb="0";   }
		if($z_nn==6 and $z_vv==9){ $bb="0";   }
		#####
		if($z_nn==1 and $z_vv==1){ $bb="15";   }
		if($z_nn==2 and $z_vv==2){ $bb="15";   }
		
		if($z_nn==3 and $z_vv==3){ $bb="15";   }
		if($z_nn==4 and $z_vv==4){ $bb="15";   }
		
		if($z_nn==6 and $z_vv==6){ $bb="15";   }
		if($z_nn==7 and $z_vv==7){ $bb="15";   }
		
		if($z_nn==8 and $z_vv==8){ $bb="15";   }
		if($z_nn==9 and $z_vv==9){ $bb="15";   }
		######命宫合婚完
		###年支合
		if($c[30+$yz_a]==$c[30+$yz]) { $c = "20"; } else  { $c = "0"; } 
		###月令合
		if($a[30+$mz_a]==$a[30+$mz]){ $yh = "5"; } else  { $yh = "0"; } 
		###日合
		if($a[20+$dg_a]<>$a[20+$dg]) {
		if($e[20+$dg_a]==$e[20+$dg]){ $rh = "5"; } else  { $rh = "0"; } } else { $rh = "0"; }
		if($d[20+$dg_a]==$d[20+$dg]){ $rrh = "25"; } else  { $rrh = "0"; } 
		###子女同步
		if($tgs==7 or $tgs==8) { $erzi ="男"; }
		if($tgs==5 or $tgs==6) { $erzi ="女"; }
		if($tgs==1 or $tgs==2) { $erzi ="女"; }
		if($tgs==3 or $tgs==4) { $erzi ="女"; }
		if($tgs==9 or $tgs==0) { $erzi ="女"; }
		
		if($tgs_a==5 or $tgs_a==6) { $erzi_a ="男"; }
		if($tgs_a==7 or $tgs_a==8) { $erzi_a ="女"; }
		if($tgs_a==1 or $tgs_a==2) { $erzi_a ="女"; }
		if($tgs_a==3 or $tgs_a==4) { $erzi_a ="女"; }
		if($tgs_a==9 or $tgs_a==0) { $erzi_a ="女"; }
		if($erzi_a==$erzi){ $ez = "15"; } else  { $ez = "0"; } 
		
		#$qyjs_a = 10 - $qyjs_a;
		
		$sea =0;
		$yza =$yz_a%2;
		if($sea xor $yza){
			$qyjs_a = $qyjs_a-1; }
		else {
			$qyjs_a = 10 - $qyjs_a;
		}
		######东西四命
		$m_na=cls_hehun::dxsz("$z_n");
		$m_va=cls_hehun::dxsz_a("$z_v");
		
		$m_nfw=cls_hehun::fangwei("$z_n");
		$m_vfw=cls_hehun::fangwei_a("$z_v");
		
		$gongli1 = $year.'年'.$month.'月'.$day.'日'.$t_ime.'时';
		$shengxiao1 = $b[30+$yz];
		$shishen1 = $a[$ygs];
		$shishen2 = $a[$mgs];
		$rizhu1 = $a[$tgs];
		$qianzao1 = '<td class="cRed">'.$a[20+$yg].$a[30+$yz].'</td>
					<td class="cRed">'.$a[20+$mg].$a[30+$mz].'</td>
					<td class="cRed">'.$a[20+$dg].$a[30+$dz].'</td>
					<td class="cRed">'.$a[20+$tg].$a[30+$tz].'</td>';
		$zhishishen1 = '<td>'.$a[$yzs].'</td>
						<td>'.$a[$mzs].'</td>
						<td>'.$a[$dzs].'</td>
						<td>'.$a[$tzs].'</td>';	
		for($i=1;$i<9;$i++) {
			$sx = (($mg+10)-$i)%10;
			$xy = (($sx + 11 - $dg) + (($dg + 1) % 2) * (($sx + 10 - $dg) % 2) * 2) % 10;;
			$shishen_for1 .=  '<b>'.$a[$xy].'</b> | ';
		}						
		$gongli2 = $year_a.'年'.$month_a.'月'.$day_a.'日'.$t_ime_a.'时';
		$shengxiao2 = $b[30+$yz_a];
		$shishenb1 = $a[$ygs_a];
		$shishenb2 = $a[$mgs_a];
		$rizhu2 = $a[$tgs_a];
		$qianzao2 = '<td class="cRed">'.$a[20+$yg_a].$a[30+$yz_a].'</td>
					<td class="cRed">'.$a[20+$mg_a].$a[30+$mz_a].'</td>
					<td class="cRed">'.$a[20+$dg_a].$a[30+$dz_a].'</td>
					<td class="cRed">'.$a[20+$tg_a].$a[30+$tz_a].'</td>';
		$zhishishen2 = '<td>'.$a[$yzs_a].'</td>
						<td>'.$a[$mzs_a].'</td>
						<td>'.$a[$dzs_a].'</td>
						<td>'.$a[$tzs_a].'</td>';	
		

		for($i=0;$i<8;$i++) {
	
		$sx_a = (($mg_a+10)-$i)%10;
	
		$xy_a = (($sx_a + 11 - $dg_a) + (($dg_a + 1) % 2) * (($sx_a + 10 - $dg_a) % 2) * 2) % 10; 
	
		$shishen_for2 .=  '<b>'.$a[$xy_a].'</b> | ';
	
		}

        $zongfen = $rh+$bb+$c+$yh+$rrh+$ez;                                                              				
		
		$data_Array = array('name'=>$name,'gongli1'=>$gongli1,'shengxiao1'=>$shengxiao1,'m_n'=>$m_n,'erzi'=>$erzi,'shishen1'=>$shishen1,'shishen2'=>$shishen2,'rizhu1'=>$rizhu1,'qianzao1'=>$qianzao1,'zhishishen1'=>$zhishishen1,'shishen_for1'=>$shishen_for1,'m_na'=>$m_na,'m_na'=>$m_na,'name_a'=>$name_a,'gongli2'=>$gongli2,'shengxiao2'=>$shengxiao2,'m_v'=>$m_v,'erzi_a'=>$erzi_a,'shishenb1'=>$shishenb1,'shishenb2'=>$shishenb2,'qianzao2'=>$qianzao2,'zhishishen2'=>$zhishishen2,'shishen_for2'=>$shishen_for2,'m_va'=>$m_va,'m_vfw'=>$m_vfw,'bb'=>$bb,'c'=>$c,'yh'=>$yh,'rrh'=>$rrh,'rh'=>$rh,'ez'=>$ez,'zongfen'=>$zongfen,'m_nfw'=>$m_nfw);
		return $data_Array;
		
	}
		
} 