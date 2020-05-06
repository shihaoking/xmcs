<?php
/**
 * 黄道吉日查询(黄历)
 */
class cls_paipan
{
	
	public static $MIN_YEAR = 1891; 
	public static $MAX_YEAR = 2100; 
	public static $lunarInfo = array( 
	array(0,2,9,21936),array(6,1,30,9656),array(0,2,17,9584),array(0,2,6,21168),array(5,1,26,43344),array(0,2,13,59728), 
	array(0,2,2,27296),array(3,1,22,44368),array(0,2,10,43856),array(8,1,30,19304),array(0,2,19,19168),array(0,2,8,42352), 
	array(5,1,29,21096),array(0,2,16,53856),array(0,2,4,55632),array(4,1,25,27304),array(0,2,13,22176),array(0,2,2,39632), 
	array(2,1,22,19176),array(0,2,10,19168),array(6,1,30,42200),array(0,2,18,42192),array(0,2,6,53840),array(5,1,26,54568), 
	array(0,2,14,46400),array(0,2,3,54944),array(2,1,23,38608),array(0,2,11,38320),array(7,2,1,18872),array(0,2,20,18800), 
	array(0,2,8,42160),array(5,1,28,45656),array(0,2,16,27216),array(0,2,5,27968),array(4,1,24,44456),array(0,2,13,11104), 
	array(0,2,2,38256),array(2,1,23,18808),array(0,2,10,18800),array(6,1,30,25776),array(0,2,17,54432),array(0,2,6,59984), 
	array(5,1,26,27976),array(0,2,14,23248),array(0,2,4,11104),array(3,1,24,37744),array(0,2,11,37600),array(7,1,31,51560), 
	array(0,2,19,51536),array(0,2,8,54432),array(6,1,27,55888),array(0,2,15,46416),array(0,2,5,22176),array(4,1,25,43736), 
	array(0,2,13,9680),array(0,2,2,37584),array(2,1,22,51544),array(0,2,10,43344),array(7,1,29,46248),array(0,2,17,27808), 
	array(0,2,6,46416),array(5,1,27,21928),array(0,2,14,19872),array(0,2,3,42416),array(3,1,24,21176),array(0,2,12,21168), 
	array(8,1,31,43344),array(0,2,18,59728),array(0,2,8,27296),array(6,1,28,44368),array(0,2,15,43856),array(0,2,5,19296), 
	array(4,1,25,42352),array(0,2,13,42352),array(0,2,2,21088),array(3,1,21,59696),array(0,2,9,55632),array(7,1,30,23208), 
	array(0,2,17,22176),array(0,2,6,38608),array(5,1,27,19176),array(0,2,15,19152),array(0,2,3,42192),array(4,1,23,53864), 
	array(0,2,11,53840),array(8,1,31,54568),array(0,2,18,46400),array(0,2,7,46752),array(6,1,28,38608),array(0,2,16,38320), 
	array(0,2,5,18864),array(4,1,25,42168),array(0,2,13,42160),array(10,2,2,45656),array(0,2,20,27216),array(0,2,9,27968), 
	array(6,1,29,44448),array(0,2,17,43872),array(0,2,6,38256),array(5,1,27,18808),array(0,2,15,18800),array(0,2,4,25776), 
	array(3,1,23,27216),array(0,2,10,59984),array(8,1,31,27432),array(0,2,19,23232),array(0,2,7,43872),array(5,1,28,37736), 
	array(0,2,16,37600),array(0,2,5,51552),array(4,1,24,54440),array(0,2,12,54432),array(0,2,1,55888),array(2,1,22,23208), 
	array(0,2,9,22176),array(7,1,29,43736),array(0,2,18,9680),array(0,2,7,37584),array(5,1,26,51544),array(0,2,14,43344), 
	array(0,2,3,46240),array(4,1,23,46416),array(0,2,10,44368),array(9,1,31,21928),array(0,2,19,19360),array(0,2,8,42416), 
	array(6,1,28,21176),array(0,2,16,21168),array(0,2,5,43312),array(4,1,25,29864),array(0,2,12,27296),array(0,2,1,44368), 
	array(2,1,22,19880),array(0,2,10,19296),array(6,1,29,42352),array(0,2,17,42208),array(0,2,6,53856),array(5,1,26,59696), 
	array(0,2,13,54576),array(0,2,3,23200),array(3,1,23,27472),array(0,2,11,38608),array(11,1,31,19176),array(0,2,19,19152), 
	array(0,2,8,42192),array(6,1,28,53848),array(0,2,15,53840),array(0,2,4,54560),array(5,1,24,55968),array(0,2,12,46496), 
	array(0,2,1,22224),array(2,1,22,19160),array(0,2,10,18864),array(7,1,30,42168),array(0,2,17,42160),array(0,2,6,43600), 
	array(5,1,26,46376),array(0,2,14,27936),array(0,2,2,44448),array(3,1,23,21936),array(0,2,11,37744),array(8,2,1,18808), 
	array(0,2,19,18800),array(0,2,8,25776),array(6,1,28,27216),array(0,2,15,59984),array(0,2,4,27424),array(4,1,24,43872), 
	array(0,2,12,43744),array(0,2,2,37600),array(3,1,21,51568),array(0,2,9,51552),array(7,1,29,54440),array(0,2,17,54432), 
	array(0,2,5,55888),array(5,1,26,23208),array(0,2,14,22176),array(0,2,3,42704),array(4,1,23,21224),array(0,2,11,21200), 
	array(8,1,31,43352),array(0,2,19,43344),array(0,2,7,46240),array(6,1,27,46416),array(0,2,15,44368),array(0,2,5,21920), 
	array(4,1,24,42448),array(0,2,12,42416),array(0,2,2,21168),array(3,1,22,43320),array(0,2,9,26928),array(7,1,29,29336), 
	array(0,2,17,27296),array(0,2,6,44368),array(5,1,26,19880),array(0,2,14,19296),array(0,2,3,42352),array(4,1,24,21104), 
	array(0,2,10,53856),array(8,1,30,59696),array(0,2,18,54560),array(0,2,7,55968),array(6,1,27,27472),array(0,2,15,22224), 
	array(0,2,5,19168),array(4,1,25,42216),array(0,2,12,42192),array(0,2,1,53584),array(2,1,21,55592),array(0,2,9,54560) 
	); 
	
	function getTaiyang($time,$jd1,$jd2){
			$subtime=($jd1-120+$jd2/60)*4*60;
			$zdate=(int)date("m",$time).":".date("d",$time);
			$path1 = PATH_DATA.'/paipan/stime.txt';
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
			}else{
				$truesubt=$truesubminute*60+$truesubsecond;
			}
			$taiyang=$time+$subtime+$truesubt;
			return $taiyang;
	}

	function Shen_niangan($ng,$gz)
	{
		$arr=array(
		0=>array("天乙","甲戊:丑未","乙己:申子","丙丁:亥酉","壬癸:卯巳","庚辛:寅午"),
		1=>array("太极","甲乙:子午","丙丁:卯酉","戊己:辰戌丑未","庚辛:寅亥","壬癸:巳申"),
		2=>array("文昌","甲乙:巳午","丙戊:申","丁己:酉","庚:亥","辛:子","壬:寅","癸:卯"),
		3=>array("国印","甲:戌","乙:亥","丙:丑","丁:寅","戊:丑","己:寅","庚:辰","辛:巳","壬:未","癸:申"),
		4=>array("学堂","甲:己亥","乙:壬午","丙:丙寅","丁:丁酉","戊:戊寅","己:己酉","庚:辛巳","辛:甲子","壬:甲申","癸:乙卯"),
		5=>array("词馆","甲:庚寅","乙:辛卯","丙:乙巳","丁:戊午","戊:丁巳","己:庚午","庚:壬申","辛:癸酉","壬:癸亥","癸:壬戌"));
		$shens="";
		$dza=$gz;
		for($i=0;$i<=5;$i++)
		{
			if($i<=3){
				for($j=1;$j<=count($arr[$i])-1;$j++)
				{
					$str=explode(":",$arr[$i][$j]);
					if(substr_count($str[0],$ng)>0&&substr_count($str[1],$dza)>0) 
					{
						$shens.="-".$arr[$i][0];
						break;
					}
				}
			}else{
				for($j=1;$j<=count($arr[$i])-1;$j++)
				{
					$str=explode(":",$arr[$i][$j]);
					if($str[0]==$ng&&$str[1]==$gz&&self::getWuxing($ng)==substr(self::getNayin($gz),4,2)) 
					{
						$shens.="-".$arr[$i][0];
						break;
					}
				}
			}
		}  
		return($shens);	
	}


	function Shen_nianzhi($nz,$dza,$nzx,$sx)
	{
		$arr=array(0=>array("红鸾","子:卯","丑:寅","寅:丑","卯:子","辰:亥","巳:戌","午:酉","未:申","申:未","酉:午","戌:巳","亥:辰"),
		1=>array("天喜","子:酉","丑:申","寅:未","卯:午","辰:巳","巳:辰","午:卯","未:寅","申:丑","酉:子","戌:亥","亥:戌"),
		2=>array("元辰","子:未","丑:申","寅:酉","卯:戌","辰:亥","巳:子","午:丑","未:寅","申:卯","酉:辰","戌:巳","亥:午"),
		3=>array("元辰","子:巳","丑:午","寅:未","卯:申","辰:酉","巳:戌","午:亥","未:子","申:丑","酉:寅","戌:卯","亥:辰"),
		4=>array("灾煞","申子辰:午","亥卯未:酉","寅午戌:子","巳酉丑:卯"),
		5=>array("孤辰","亥子丑:寅","寅卯辰:巳","巳午未:申","申酉戌:亥"),
		6=>array("寡宿","亥子丑:戌","寅卯辰:丑","巳午未:辰","申酉戌:未"),
		7=>array("驿马","申子辰:寅","寅午戌:申","巳酉丑:亥","亥卯未:巳"),
		8=>array("华盖","寅午戌:戌","亥卯未:未","申子辰:辰","巳酉丑:丑"),
		9=>array("将星","寅午戌:午","巳酉丑:酉","申子辰:子","亥卯未:卯"),
		10=>array("劫煞","申子辰:巳","亥卯未:申","寅午戌:亥","巳酉丑:寅"),
		11=>array("桃花","申子辰:酉","寅午戌:卯","巳酉丑:午","亥卯未:子"),
		12=>array("亡神","寅午戌:巳","亥卯未:寅","巳酉丑:申","申子辰:亥"),
		13=>array("天罗地网","辰:巳","巳:辰","戌:亥","亥:戌"));
		$shens="";
		for($i=0;$i<=13;$i++)
		{
			if ($i==2 && $sx==0) continue;
			if ($i==3 && $sx==1) continue;
			for($j=1;$j<=count($arr[$i])-1;$j++)
			{
				$str=explode(":",$arr[$i][$j]);
				if(substr_count($str[0],$nz)>0&&$str[1]==$dza) 
				{
					$shens.=$arr[$i][0];
					break;
				}
			}
		}
		$pmz=($nzx+10)%12;
		$dkz=($nzx+2)%12;
		$smz=($nzx+3)%12;
		$dz=array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
		if($dz[$pmz]==$dza){
			$shens .="-披麻";
		}
		if($dz[$dkz]==$dza){
			$shens .="-吊客";
		}
		if($dz[$smz]==$dza){
			$shens .="-丧门";
		}
		return($shens);
	}
	
	//'以年支为核心，查询神煞，输入参数为年，月，日，时支和阳男阴女标志位
	function Shen_yuezhi($yzx,$tgx,$dzy)
	{
		$arr=array(
		0=>array("天德","寅:丁","卯:申","辰:壬","巳:辛","午:亥","未:甲","申:癸","酉:寅","戌:丙","亥:乙","子:己","丑:庚"),
		1=>array("天德合","寅:壬","卯:巳","辰:丁","巳:丙","午:寅","未:己","申:癸","酉:亥","戌:辛","亥:庚","子:申","丑:乙"),
		2=>array("月德","寅午戌:丙","申子辰:壬","亥卯未:甲","巳酉丑:庚"),
		3=>array("月德合","寅午戌:辛","申子辰:丁","亥卯未:己","巳酉丑:乙"),
		4=>array("天医","寅:丑","卯:寅","辰:卯","巳:辰","午:巳","未:午","申:未","酉:申","戌:酉","亥:戌","子:亥","丑:子"));
		$shens="";
		for($i=0;$i<=2;$i++)
		{
			for($j=1;$j<=count($arr[$i])-1;$j++)
			{
				$str=explode(":",$arr[$i][$j]);
				if(substr_count($str[0],$yzx)>0 && ($str[1]==$tgx||$str[1]==$dzy)) 
				{
					$shens.=$arr[$i][0];
					break;
				}
			}
		} 
		return($shens);
	}

	function Shen_rigan($rg,$gz)
	{
		$arr=array(
		0=>array("天乙贵人","甲戊:丑未","乙己:申子","丙丁:亥酉","壬癸:卯巳","庚辛:寅午"),
		1=>array("太极贵人","甲乙:子午","丙丁:卯酉","戊己:辰戌丑未","庚辛:寅亥","壬癸:巳申"),
		2=>array("文昌","甲乙:巳午","丙戊:申","丁己:酉","庚:亥","辛:子","壬:寅","癸:卯"),
		3=>array("金舆","甲:辰","乙:巳","丙戊:未","丁己:申","庚:戌","辛:亥","壬:丑","癸:寅"),
		4=>array("干禄","甲:寅","乙:卯","丙戊:巳","丁己:午","庚:申","辛:酉","壬:亥","癸:子"),
		5=>array("羊刃","甲:卯","乙:辰","丙戊:午","丁己:未","庚:酉","辛:戌","壬:子","癸:丑"),
		6=>array("国印贵人","甲:戌","乙:亥","丙:丑","丁:寅","戊:丑","己:寅","庚:辰","辛:巳","壬:未","癸:申"),
		7=>array("学堂","甲:己亥","乙:壬午","丙:丙寅","丁:丁酉","戊:戊寅","己:己酉","庚:辛巳","辛:甲子","壬:甲申","癸:乙卯"),
		8=>array("红艳","甲:午申","乙:午申","丙:寅","丁:未","戊:辰","己:辰","庚:戌","辛:酉","壬:子","癸:申"),
		9=>array("词馆","甲:庚寅","乙:辛卯","丙:乙巳","丁:戊午","戊:丁巳","己:庚午","庚:壬申","辛:癸酉","壬:癸亥","癸:壬戌"));
		$shens="";
		$dza=$gz;
		for($i=0;$i<=8;$i++)
		{
			if($i<=6){
				for($j=1;$j<=count($arr[$i])-1;$j++)
				{
					
					$str=explode(":",$arr[$i][$j]);
					if(substr_count($str[0],$rg)>0&&substr_count($str[1],$dza)>0) 
					{
						$shens.=$arr[$i][0];
						break;
					}
				}
			}else{
				for($j=1;$j<=count($arr[$i])-1;$j++)
				{
					$str=explode(":",$arr[$i][$j]);
					if($str[0]==$rg&&$str[1]==$gz&&self::getWuxing($rg)==substr(self::getNayin($gz),4,2)) 
					{
						$shens.=$arr[$i][0];
						break;
					}
				}
			}
		}  
		return($shens);	
	}
	
	//'以日干为基准计算神煞
	function Shen_rizhi($rz,$dz,$rzx)
	{
		$arr=array(0=>array("驿马","申子辰:寅","寅午戌:申","巳酉丑:亥","亥卯未:巳"),1=>array("华盖","寅午戌:戌","亥卯未:未","申子辰:辰","巳酉丑:丑"),2=>array("将星","寅午戌:午","巳酉丑:酉","申子辰:子","亥卯未:卯"),3=>array("亡神","寅午戌:巳","亥卯未:寅","巳酉丑:申","申子辰:亥"),4=>array("劫煞","申子辰:巳","亥卯未:申","寅午戌:亥","巳酉丑:寅"),5=>array("桃花","申子辰:酉","寅午戌:卯","巳酉丑:午","亥卯未:子"),6=>array("天罗地网","辰:巳","巳:辰","戌:亥","亥:戌"));
		$shens="";
		for($i=0;$i<=6;$i++)
		{
			for($j=1;$j<=count($arr[$i])-1;$j++)
			{
				$str=explode(":",$arr[$i][$j]);
				if(substr_count($str[0],$rz)>0&&$str[1]==$dz) 
				{
					$shens.=$arr[$i][0];
					break;
				}
			}
		}
		
		$pmz=($rzx+10)%12;
		$dkz=($rzx+2)%12;
		$smz=($rzx+3)%12;
		$dzr=array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
		if($dzr[$pmz]==$dz){
			$shens .="-披麻";
		}
		if($dzr[$dkz]==$dz){
			$shens .="-吊客";
		}
		if($dzr[$smz]==$dz){
			$shens .="-丧门";
		}
		return($shens);
	}

	function Shen_rizhu($zhu,$yuez)
	{
		$shens="";
		$arr=array(
		0=>array("阴阳差错","丙子","丁丑","戊寅","辛卯","壬辰","癸巳","丙午","丁未","戊申","辛酉","壬戌","癸亥"),
		1=>array("十恶大败","甲辰","乙巳","壬申","丙申","丁亥","庚辰","戊戌","癸亥","辛巳","己丑"),
		2=>array("魁罡贵人","壬辰","庚戌","庚辰","戊戌"),
		3=>array("女孤鸾煞","乙巳","丁巳","辛亥","戊申","壬寅","戊午","壬子","丙午"),
		4=>array("四废","寅卯辰:庚申","寅卯辰:辛酉","巳午未:壬子","巳午未:癸亥","申酉戌:甲寅","申酉戌:乙卯","亥子丑:丙午","亥子丑:丁巳"),
		5=>array("天赦","寅卯辰:戊寅","巳午未:甲午","申酉戌:戊申","亥子丑:甲子"));
		for($i=0;$i<=5;$i++)
		{
			if($i<=3){
				for($j=1;$j<=count($arr[$i])-1;$j++)
				{
					if($zhu==$arr[$i][$j]){
						$shens.="-".$arr[$i][0];
						break;
					}
				}
			}else{
				for($j=1;$j<=count($arr[$i])-1;$j++)
				{
					$str=explode(":",$arr[$i][$j]);
					if($zhu==$str[1]&&substr_count($str[0],$yuez)>0){
						$shens.="-".$arr[$i][0];
						break;
					}
				}
			}
		}
		return($shens);
	} 

	function Shen_rizhus($x)
	{
		$shens="";
		$sha=array("乙丑","己巳","癸酉");
		for($i=0;$i<=2;$i++){
			if($sha[$i]==$x){
				$shens.="-金神";
				break;
			}
		}
		return $shens;
	}
	//'以日主和时柱排神煞
	
	function Shen_sqgr($yg,$mg,$dg,$hg)
	{
		$sq1="甲戊庚";
		$sq2="乙丙丁";
		$sq3="辛壬癸";
		$arr=array($yg.$mg.$dg,$yg.$mg.$hg,$yg.$dg.$hg,$mg.$dg.$hg);
		for($i=0;$i<=3;$i++){
			if($arr[$i]==$sq1||$arr[$i]==$sq2||$arr[$i]==$sq3)
			{
				$shens="三奇贵人";
				break;
			}
		} 
		return($shens);
	}

	function getNayin($gz)
	{
	$gzu=array("甲子","丙寅","戊辰","庚午","壬申","甲戌","丙子","戊寅","庚辰","壬午","甲申","丙戌","戊子","庚寅","壬辰", "甲午", "丙申","戊戌","庚子","壬寅","甲辰","丙午","戊申","庚戌","壬子","甲寅","丙辰","戊午","庚申","壬戌");
	$zzu=array("乙丑","丁卯","己巳","辛未","癸酉","乙亥","丁丑","己卯","辛巳","癸未","乙酉", "丁亥","己丑","辛卯","癸巳","乙未","丁酉", "己亥","辛丑","癸卯","乙巳","丁未","已酉","辛亥","癸丑","乙卯","丁巳","己未","辛酉","癸亥");
	$nyzu=array("海中金","炉中火","大林木","路旁土","剑锋金","山头火","涧下水","城头土","白腊金","杨柳木 ","泉中水","屋上土","霹雳火","松柏木","长流水","砂石金","山下火","平地木","壁上土","金薄金","覆灯火","天河水","大驿土","钗环金","桑柘木","大溪水","沙中土","天上火","石榴木","大海水");
	$z1=array_search($gz,$gzu);
	if($z1!=false){
		$nayin=$nyzu[$z1];
	}else{
		$nayin=$nyzu[array_search($gz,$zzu)];
	}
	return $nayin;
	}

	function getTaiyuan($x,$y)
	{
		$x1=($x+1)%10;
		$y1=($y+3)%12;
		$tg=array("癸","甲","乙","丙","丁","戊","己","庚","辛","壬");
		$dz=array("亥","子","丑","寅","卯","辰","巳","午","未","申","酉","戌");
		return $tg[$x1].$dz[$y1];
	}

	function getMinggong($dm,$tdz,$minggongx)
	{
		$Yuedz=(($dm+10)%12);
		$timedz=(($tdz+10)%12);
		$Mingdz=(26-$Yuedz-$timedz-1)%12;
		$tg=array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
		$dz=array("寅","卯","辰","巳","午","未","申","酉","戌","亥","子","丑");
		//$mingtg=($minggongx+$Mingdz+7)%10;
		$mingtg=($minggongx*2+$Mingdz)%10;
		//$mingtg=($mingtg+2)%10;
		return $tg[$mingtg].$dz[$Mingdz];
	}

	function getShishen($tgans,$ritgs)
	{
		if($ritgs==0) $ritgs=10;
		if($tgans==0) $tgans=10;
		$cha=$ritgs-$tgans;
		if($cha>=0){
			switch($cha){
				case 0:$str="比肩";break;
				case 1:
				  if($ritgs%2==0){$str="劫财";}else{$str="正印";}
				  break;
				case 2:$str="偏印";break;
				case 3:
				 if($ritgs%2==0){$str="正印";}else{$str="正官";}
				 break;
				case 4:$str="偏官";break;
				case 5:
				if($ritgs%2==0){$str="正官";}else{$str="正财";}
				break;
				case 6:$str="偏财";break;
				case 7:
				if($ritgs%2==0){$str="正财";}else{$str="伤官";}
				break;
				case 8:$str="食神";break;
				case 9:$str="伤官";break;
			}
		}else{
			switch(abs($cha)){
			case 1:
			  if($ritgs%2==1){$str="劫财";}else{$str="伤官";}
			  break;
			case 2:$str="食神";break;
			case 3:
			 if($ritgs%2==1){$str="伤官";}else{$str="正财";}
			 break;
			case 4:$str="偏财";break;
			case 5:
			if($ritgs%2==1){$str="正财";}else{$str="正官";}break;
			case 6:$str="偏官";break;
			case 7:
			 if($ritgs%2==1){$str="正官";}else{$str="正印";}
			  break;
			case 8:$str="偏印";break;
			case 9:$str="正印";break;
			}
		}
		$sshen="<font color=blue>".$str."</font>";
		return($sshen);
	}

	function getDcang($dzx){
		$arr=array("壬甲","癸","癸己辛","丙甲戊","乙","乙戊癸","戊丙庚","己丁","丁己乙","壬庚戊","辛","辛戊丁");
		return $arr[$dzx];
	}
	
	

	function xunkong($gz1)
	{
		$xkarr=array(
		0=>array("甲子","乙丑","丙寅","丁卯","戊辰","己巳","庚午","辛未","壬申","癸酉","戌亥"),
		1=>array("甲戌","乙亥","丙子","丁丑","戊寅","己卯","庚辰","辛巳","壬午","癸未","申酉"),
		2=>array("甲申","乙酉","丙戌","丁亥","戊子","己丑","庚寅","辛卯","壬辰","癸巳","午未"),
		3=>array("甲午","乙未","丙申","丁酉","戊戌","己亥","庚子","辛丑","壬寅","癸卯","辰巳"),
		4=>array("甲辰","乙巳","丙午","丁未","戊申","己酉","庚戌","辛亥","壬子","癸丑","寅卯"),
		5=>array("甲寅","乙卯","丙辰","丁巳","戊午","己未","庚申","辛酉","壬戌","癸亥","子丑"));
		$tag=0;
		for($i=0;$i<=5;$i++)
		{
			for($j=0;$j<=10;$j++)
			{
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

	function getWuxing($tgdz){
		switch($tgdz)
		{
		  case "子":$wh="水";break;
		  case "亥":$wh="水";break;
		  case "寅":$wh="木";break;
		  case "卯":$wh="木";break;
		  case "巳":$wh="火";break;
		  case "午":$wh="火";break;
		  case "申":$wh="金";break;
		  case "酉":$wh="金";break;
		  case "辰":$wh="土";break;
		  case "戌":$wh="土";break;
		  case "丑":$wh="土";break;
		  case "未":$wh="土";break;
		  case "甲":$wh="木";break;
		  case "乙":$wh="木";break;
		  case "丙":$wh="火";break;
		  case "丁":$wh="火";break;
		  case "戊":$wh="土";break;
		  case "己":$wh="土";break;
		  case "庚":$wh="金";break;
		  case "辛":$wh="金";break;
		  case "壬":$wh="水";break;
		  case "癸":$wh="水";break;
		}
		return $wh;
	}
	
	
	//十二长生宫
	function getChangshengg($gan,$zx){
		$arr1=array("长生","沐浴","冠带","临官","帝旺","衰","病","死","墓","绝","胎","养");
		switch($gan){
			case "甲":$xu=$zx;break;
			case "丙":$xu=(12+$zx-3)%12;break;
			case "戊":$xu=(12+$zx-3)%12;break;
			case "庚":$xu=(12+$zx-6)%12;break;
			case "壬":$xu=(12+$zx-9)%12;break;
			case "乙":$xu=(24-$zx-5)%12;break;
			case "丁":$xu=(24-$zx-2)%12;break;
			case "己":$xu=(24-$zx-2)%12;break;
			case "辛":$xu=(24-$zx-11)%12;break;
			case "癸":$xu=(24-$zx-8)%12;break;
		}
		return $arr1[$xu];
	}
	
	
	function yzhy($year,$month,$date){ 
		$yearData = self::$lunarInfo[$year-self::$MIN_YEAR]; 
		$between = self::getDaysBetweenLunar($year,$month,$date); 
		$res = mktime(0,0,0,$yearData[1],$yearData[2],$year); 
		$res = date('Y-m-d', $res+($between*24*60*60)); 
		$day = explode('-', $res); 
		$year = $day[0]; 
		$month= $day[1]; 
		$day = $day[2]; 
		return array($year, $month, $day); 
	}
	/** 
	* 计算阴历日期与正月初一相隔的天数 
	*/ 
	function getDaysBetweenLunar($year,$month,$date){ 
		$yearMonth = self::getLunarMonths($year); 
		$res=0; 
		for($i=1;$i<$month;$i++){ 
			$res +=$yearMonth[$i-1]; 
		} 
		$res+=$date-1; 
		return $res; 
	} 
	/** 
	* 获取阴历每月的天数的数组 
	* @param year 
	*/ 
	function getLunarMonths($year){ 
		$yearData = self::$lunarInfo[$year - self::$MIN_YEAR]; 
		$leapMonth = $yearData[0]; 
		$bit = decbin($yearData[3]); 
		for ($i = 0; $i < strlen($bit);$i ++) { 
			$bitArray[$i] = substr($bit, $i, 1); 
		} 
		for($k=0,$klen=16-count($bitArray);$k<$klen;$k++){ 
			array_unshift($bitArray, '0'); 
		} 
		$bitArray = array_slice($bitArray,0,($leapMonth==0?12:13)); 
		for($i=0; $i<count($bitArray); $i++){ 
			$bitArray[$i] = $bitArray[$i] + 29; 
		} 
		return $bitArray; 
	} 
	/** 
	* 获取闰月 
	* @param year 阴历年份 
	*/ 
	function getLeapMonth($year){ 
		$yearData = self::$lunarInfo[$year-self::$MIN_YEAR]; 
		return $yearData[0]; 
	} 
}
?>
