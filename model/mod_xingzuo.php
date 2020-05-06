<?php 
if (!defined('CORE'))  exit('Request Error!'); 
class mod_xingzuo { 
    public static $sysstr="lacom@2014";
  
    /**
     * 生成appkey
     */
    public static function create_appkey(){
        echo substr(md5(self::$sysstr.time()), 8,20);
    }
    
	/***
	 *从数据库今天和明天的数据取出并且json化
	 */
	private static function get_xingzuo_jt_mt($data){
		$data['content'] = json_decode($data['content'],true);
		$new_data['date'] = $data['date'];
		$new_data['index'] = $data['content'];
		$new_data['content'] = $data['des'];
		$new_data['img'] = $data['img'];
		$new_data['yi'] = $data['yi'];
		$new_data['ji'] = $data['ji'];
		$new_data['shorttxt'] = $data['shorttxt'];
		return $new_data;
	} 
	
	/***
	 *上升星座
	 //計算方法： 出生月參數（見表一查詢）＋ 生日數字 × 4 ＋ 出生時間 ＝ 計算出的時間（見表二查詢）便得出上升星座。
	 */
	public function shangsheng($m,$d,$h,$i){
		
			if($i<10){$i='0'.$i;}
			//$table1 = array(1=>'06:40',2=>'08:43',3=>'10:33',4=>'12:35',5=>'14:33',6=>'16:36',7=>'18:34',8=>'20:36',9=>'22:38',10=>'00:37',11=>'02:39',12=>'04:37');
			$table1 = array(1=>'640',2=>'843',3=>'1033',4=>'1235',5=>'1433',6=>'1636',7=>'1834',8=>'2036',9=>'2238',10=>'0037',11=>'0239',12=>'0437');
			$table2 = array('18:00'=>'白羊','19:29'=>'双子','23:13'=>'巨蟹','01:29'=>'狮子','03:46'=>'处女','06:00'=>'天秤','08:13'=>'天蝎','10:30'=>'射手','12:46'=>'摩羯','14:48'=>'水瓶','16:30'=>'双鱼');
			$num_m = $table1[$m];
			$num_d = $d*4;
			$num_hi = $h.$i;
			$num_all = $num_m+$num_d+$num_hi;
			
			if($num_all>=2529){
				$num_all = $num_all-2400;
			}
			
			
			
			if($num_all>=1800 && $num_all<1929){
				$xz = '白羊座';
			}elseif($num_all>=1929 && $num_all<2313){
				$xz = '双子座';
			}elseif($num_all>=2313 && $num_all<2529){
				$xz = '巨蟹座';
			}elseif($num_all>=129 && $num_all<346){
				$xz = '狮子座';
			}elseif($num_all>=346 && $num_all<600){
				$xz = '处女座';
			}elseif($num_all>=600 && $num_all<813){
				$xz = '天秤座';
			}elseif($num_all>=813 && $num_all<1030){
				$xz = '天蝎座';
			}elseif($num_all>=1030 && $num_all<1246){
				$xz = '射手座';
			}elseif($num_all>=1246 && $num_all<1448){
				$xz = '摩羯座';
			}elseif($num_all>=1448 && $num_all<1630){
				$xz = '水瓶座';
			}elseif($num_all>=1630 && $num_all<1800){
				$xz = '双鱼座';
			}else{
				$xz = '金牛座';
			}
			
			$sql = 'select * from `xingzuo_shangsheng_data` where title = "'.$xz.'"';
			
			$data = db::queryone($sql);
			
			return $data;
	}
	
	
	/***
	 *按照日期获取星座的运势
	 */
	public function get_date_yunshi($tid,$date){
		$data = file_get_contents('http://www.kaiy8.com/?ct=api&ac=xingzuo_yunshi_ajax&date='.$date.'&tid='.$tid);
		$data = json_decode($data,true);
		return $data;
	}
	
	
	
	/***
	 *获取星座单个星座的运势，在show的页面用到
	 */
	public static function get_yunshi($tid){
		
		$xingzuoid = $tid-400;
		
		$file=file_get_contents('http://cache.xzw.com/114la/json/fortune/'.$xingzuoid.'.js?showfortune');
		//http://3g.d1xz.net/api/yunshi.aspx?type=today
		//http://3g.d1xz.net/api/yunshi.aspx?type=tomorrow
		$content=json_decode($file,true);
		
		$NOWTIME = date('Y-m-d G:i:s',time());
		
		$jintian = date('Y-n-j',time());
		$mingtian = date('Y-n-j',strtotime('+1 day'));
		//今天和明天运势采用自己数据
		$data_jt = file_get_contents('http://www.kaiy8.com/?ct=api&ac=xingzuo_yunshi_ajax&date='.$jintian.'&tid='.$tid);
		$data_jt = json_decode($data_jt,true);
		
		
		
		$jintian = self::get_xingzuo_jt_mt($data_jt);
		
		$data_mt = file_get_contents('http://www.kaiy8.com/?ct=api&ac=xingzuo_yunshi_ajax&date='.$mingtian.'&tid='.$tid);
		$data_mt = json_decode($data_mt,true);
		$mingtian = self::get_xingzuo_jt_mt($data_mt);
		
		//$jintian = $content[0];
		//$mingtian = $content[1];
		$zhou = $content[2];
		$yue = $content[3];
		$nian = $content[4];
		
		if($jintian!='' && $mingtian!=''){
			$sql = "UPDATE `xingzuo_yunshi_data` SET `jintian` = '".urlencode(json_encode($jintian))."',`mingtian`='".urlencode(json_encode($mingtian))."',`zhou`='".urlencode(json_encode($zhou))."',`yue`='".urlencode(json_encode($yue))."',`uptime`='".$NOWTIME."' WHERE `tid` = '".$tid."'";
			
			if(db::query($sql)){
				//写日志
				$time = date('Ymd',time());
				//$cat_array = array(401=>'$cattime401',402=>'$cattime402',403=>'$cattime403',404=>'$cattime404',405=>'$cattime405',406=>'$cattime406',407=>'$cattime407',408=>'$cattime408',409=>'$cattime409',410=>'$cattime410',411=>'$cattime411',412=>'$cattime412');
				$path_log = PATH_DATA.'/xingzuo/'.$tid.'yunshi.time.php';
				file_put_contents($path_log,'<?php $cattime = '.$time.'; ?>');
			}
		}else{
			
			return true;
		}
		
	}
	
	
	/***
	 *根据不同时间显示不同运势信息
	 nid:1今天，2明天，3本周，4本月，5本年，6爱情
	 */
	function mod_xingzuo_time_yunshi($data,$nid){
		switch($nid)
		{
			case 1:
			$list = $data['jintian'];
			break;
			case 2:
			$list = $data['mingtian'];
			break;
			case 3:
			$list = $data['zhou'];
			break;
			case 4:
			$list = $data['yue'];
			break;
			case 5:
			$list = $data['nian'];
			break;
			case 6:
			$list = $data['love'];
			break;
		}
		
		return $list;
	}
	
	
	/**
	 *根据提供的月份和日期获取星座信息
	 */
	public static function get_xz($day_m=null,$day_d=null){
		if($day_m==''){
		$day_m = date('m',time());
		}
		if($day_d==''){
		$day_d = date('d',time());
		}
		
		
		
		if($day_m==3){
			if($day_d>=21){
				$xz = '白羊座';	
			}else{
				$xz = '双鱼座';
			}
		}
		if($day_m==4){
			if($day_d>=20){
				$xz = '金牛座';	
			}else{
				$xz = '白羊座';
			}
		}
		if($day_m==5){
			if($day_d>=21){
				$xz = '双子座';	
			}else{
				$xz = '金牛座';
			}
		}
		if($day_m==6){
			if($day_d>=22){
				$xz = '巨蟹座';	
			}else{
				$xz = '双子座';
			}
		}
		if($day_m==7){
			if($day_d>=23){
				$xz = '狮子座';	
			}else{
				$xz = '巨蟹座';
			}
		}
		if($day_m==8){
			if($day_d>=23){
				$xz = '处女座';	
			}else{
				$xz = '狮子座';
			}
		}
		if($day_m==9){
			if($day_d>=23){
				$xz = '天秤座';	
			}else{
				$xz = '处女座';
			}
		}
		if($day_m==10){
			if($day_d>=24){
				$xz = '天蝎座';	
			}else{
				$xz = '天秤座';
			}
		}
		if($day_m==11){
			if($day_d>=23){
				$xz = '射手座';	
			}else{
				$xz = '天蝎座';
			}
		}
		if($day_m==12){
			if($day_d>=22){
				$xz = '摩羯座';	
			}else{
				$xz = '射手座';
			}
		}
		if($day_m==1){
			if($day_d>=22){
				$xz = '水瓶座';	
			}else{
				$xz = '摩羯座';
			}
		}
		if($day_m==2){
			if($day_d>=19){
				$xz = '双鱼座';	
			}else{
				$xz = '水瓶座';
			}
		}
		
		return $xz;
	}
	
	/**
	 *检查身份证是否是正确
	 */
    function validation_filter_id_card($id_card){
		if(strlen($id_card)==18){
			return self::idcard_checksum18($id_card);
		}elseif((strlen($id_card)==15)){
			$id_card=self::idcard_15to18($id_card);
			return self::idcard_checksum18($id_card);
		}else{
			return false;
		}
	}
	
    
} 