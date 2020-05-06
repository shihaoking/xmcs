<?php

if (!defined('CORE'))
    exit('Request Error!');


/**
* 天干地支
* 干支纪年是从公元4年开始使用的
* @author gaodongchen@gmail.com
* @version 0.1.0
*/
class cls_ganzhi{
	static private $mTiangan = array(
	'甲','乙','丙','丁','戊','己','庚','辛','壬','癸'
	);
	static private $mDizhi = array(
	'子','丑','寅','卯','辰','巳','午','未','申','酉','戌','亥'
	);
	static private $mMonthStart = array(
	4,15,27,39,51,
	4,15,27,39,51
	);
	static private $mDayStart = array(
	1,3,5,7,9,
	1,3,5,7,9
	);
	static private $mInstance = null;
	static private $mTable = null;
	
	function __construct(){    
	}
	
	static public function Instance(){
		if (self::$mInstance == null){
		self::$mInstance = self;
		}
		return self::$mInstance;
	}
	
	static public function GetTiangan($number=10){
		if (($number <= 0 || $number > 10))
		$number = 1;	
		return self::$mTiangan[$number - 1];
	}
	
	static public function GetDizhi($number=12){
		if (($number <= 0 || $number > 12))
		$number = 1;	
		return self::$mDizhi[$number - 1];
	}
	
	/**
	* 建立干支表（六十年甲子）
	*
	* @return array 表（从0到59）
	*/
	static public function CreateTable(){
		$nowDizhi = $nowTiangan = 1;
		$result = null;
		$table = array();
		
		while ($result != (self::GetTiangan() . self::GetDizhi())){
		if ($nowDizhi > 12)
		$nowDizhi = 1;
		
		if ($nowTiangan > 10)
		$nowTiangan = 1;
		
		$result = self::$mTable[] = self::GetTiangan($nowTiangan) . self::GetDizhi($nowDizhi);
		$nowDizhi++;
		$nowTiangan++;
		}
		
		return self::$mTable;
	}
	
	static public function GetTable($number=1){
		if (self::$mTable == null)
		self::CreateTable();
		
		if (($number <= 0 || $number > 60))
		$number = 1;
		
		return self::$mTable[$number - 1];
	}
	
	/**
	* 获得干支年
	*
	* @param int $year 公元3年开始使用的甲子年（负数为公元前）
	* @return string 干支年
	*/
	static public function GetYear($year=3){
		$diffYear     = ($year - 1911) + 48;//1911年辛亥(48)革命
		$leave         = $diffYear % 60;
		
		if (($leave == 0))
		$leave = 60;
		
		return self::GetTable(abs($leave));
	}
	
	/**
	 *获取月份
	 */
	
	static public function GetMonth($year, $month=null){
		$year = self::GetYear($year);
		
		foreach (self::$mTiangan as $key => $value){
			if (@preg_match("/^$value.*/", $year)){
			$start = self::$mMonthStart[$key];
			break;
			}
		}
		
		$result = array();
		
		for ($i=0;$i<12;$i++){
		$result[] = self::GetTable($start + $i);
		}
		
		if ($month != null)
		return $result[$month-2];//从立春（2月4或5日）开始计算
		
		return $result;
	}
	
	/**
	 *获取当天
	 */
	
	static public function GetDay($year, $month, $day){
		
		
		
		$year = substr($year, -2);
		$century = (int)($year / 100);
		$i = 0;
		
		if ((int)$month == 1)
		$month = 13;
		
		if ((int)$month == 2)
		$month = 14;
		
		if (($month % 2) == 0)
		$i = 6;
		
		$tgLeave = (4*$century+(int)($century/4)+5*$year+(int)($year/4)+(int)(3*($month+1)/5)+$day-3)%10;
		$dzLeave = (8*$century+(int)($century/4)+5*$year+(int)($year/4)+(int)(3*($month+1)/5)+$day+7+$i)%12;
		
		return self::GetTiangan($tgLeave) . self::GetDizhi($dzLeave);
	}
	
	/**
	 *获取时间
	 */
	
	static public function GetHour($year, $month, $day ,$hour=null){
		
	$day = self::GetDay($year, $month, $day);
	
	foreach (self::$mTiangan as $key => $value){
		if (@preg_match("/^$value.*/", $day)){
		$start = self::$mDayStart[$key];
		break;
		}
	}
	
	$nowTiangan = $start;
	foreach (self::$mDizhi as $dz){
	if ($nowTiangan > 10)
	$nowTiangan = 1;
		
	$result[] = self::GetTiangan($nowTiangan) . $dz;
	$nowTiangan++;
	}
	
	if ($hour != null){
		if (($hour % 2) == 0){
		$hourBefore = $hour - 1;
		$offset = (int)($hourBefore / 2) + 1;
		}
	else{
	$offset = (int)($hour / 2) + 1;
	}
	
	if ($offset >= 11)
	$offset = 0;
	
	return $result[$offset];
	}
	
	return $result;    
	}
	
	static public function cyclical($num){
	$Gan=array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
    $Zhi=array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");   
    return($Gan[$num%10].$Zhi[$num%12]);
    }
	static public function Birthday($year, $month, $day ,$hour){    
	return self::GetYear($year).self::GetMonth($year,$month).self::GetDay($year,$month,$day).self::GetHour($year,$month,$day,$hour);
	}
	
	//五行
	
	public function tgdzwh($tgdz){
			switch ($tgdz){
			case "子":
			$wh="水";
			break;
			case "亥":
			$wh="水";
			break;
			case "寅":
			$wh="木";
			break;
			case "卯":
			$wh="木";
			break;
			case "巳":
			$wh="火";
			break;
			case "午":
			$wh="火";
			break;
			case "申":
			$wh="金";
			break;
			case "酉":
			$wh="金";
			break;
			case "辰":
			$wh="土";
			break;
			case "戌":
			$wh="土";
			break;
			case "丑":
			$wh="土";
			break;
			case "未":
			$wh="土";
			break;
			case "甲":
			$wh="木";
			break;
			case "乙":
			$wh="木";
			break;
			case "丙":
			$wh="火";
			break;
			case "丁":
			$wh="火";
			break;
			case "戊":
			$wh="土";
			break;
			case "己":
			$wh="土";
			break;
			case "庚":
			$wh="金";
			break;
			case "辛":
			$wh="金";
			break;
			case "壬":
			$wh="水";
			break;
			case "癸":
			$wh="水";
			break;
			}
			return $wh;
	}
	
	//四季*月份
	function siji($y){
		switch ($y){
			case "1":
			$sj="冬";
			break;
			case "2":
			$sj="冬";
			break;
			case "3":
			$sj="春";
			break;
			case "4":
			$sj="春";
			break;
			case "5":
			$sj="春";
			break;
			case "6":
			$sj="夏";
			break;
			case "7":
			$sj="夏";
			break;
			case "8":
			$sj="夏";
			break;
			case "9":
			$sj="秋";
			break;
			case "10":
			$sj="秋";
			break;
			case "11":
			$sj="秋";
			break;
			case "12":
			$sj="冬";
			break;
			}
			return $sj;
	}
	
	
	//纳音
	public function layin($tgdz){
	
	$sql='select * from jiazi where jiazi='.$tgdz;
	$c=mysql_query($sql);
	$row=mysql_fetch_array($c);
	
	return $row['layin'];
	}
	
	public function utf8_substr($str,$position,$length){ 
	$start_position = strlen($str); 
	$start_byte = 0; 
	$end_position = strlen($str); 
	$count = 0; 
	for($i = 0; $i < strlen($str); $i++){ 
	if($count >= $position && $start_position > $i){ 
	$start_position = $i; 
	$start_byte = $count; 
	} 
	if(($count-$start_byte)>=$length) { 
	$end_position = $i; 
	break; 
	} 
	$value = ord($str[$i]); 
	if($value > 127){ 
	$count++; 
	if($value >= 192 && $value <= 223) $i++; 
	elseif($value >= 224 && $value <= 239) $i = $i + 2; 
	elseif($value >= 240 && $value <= 247) $i = $i + 3; 
	else die('Not a UTF-8 compatible string'); 
	} 
	$count++; 
	} 
	return(substr($str,$start_position,$end_position-$start_position)); 
} 

	
	static public function solarTerm(){		
	$solarTerm=array("小寒","大寒 ","立春","雨水 ","惊蛰","春分 ","清明","谷雨 ","立夏","小满 ","芒种","夏至 ","小暑","大暑 ","立秋","处暑 ","白露","秋分 ","寒露","霜降 ","立冬","小雪 ","大雪","冬至 ");
	$Animals=array("鼠","牛","虎","兔","龙","蛇","马","羊","猴","鸡","狗","猪");
	$wh=array("木","火","土","金","水");
	$ys=array("绿","红","黄","白","黑");
	$yy=array("阳","阴");
	$shiShen=array("比劫","比肩","正印","偏印","正官","七杀","伤官","食神","偏财","正财");	
	}

}
