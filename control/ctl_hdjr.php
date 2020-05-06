<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * v.bazi5首页控制器
 *
 * @version 2013.07.05
 */
class ctl_hdjr
{
	
	
	
    public static $userinfo;
    public static $control;
    public $cache_enable = false;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'huangli.bazi5.com';
    public $cache_key    = 'peidui/index';

    public function __construct()
    {
		
		if (empty($this->items))
        {
            $this->items = new items();
        }
		tpl::assign('web_url',URL);
		$pid = mod_topic::get_p_id();//获取一级栏目
		tpl::assign('pid',$pid);
		
		
		//获取广告
		//$this->getAd();
		$public_hand_data_cache = cache::get($this->cache_prefix,'public_hand_data');
		if($public_hand_data_cache==''){
			$public_hand_data = mod_index::get_public_hand();//获取公用部分手动数据
			cache::set($this->cache_prefix,'public_hand_data',$public_hand_data,$this->cachetime); //写缓存
		}else{
			$public_hand_data = $public_hand_data_cache;//获取公用部分手动数据
		}
		tpl::assign('public_hand_data',$public_hand_data);
		
		
		$hand_type_arr = array('hdjr_bot_link');//手动数据
		$handtype_arr = $this->items->getHandTypeId($hand_type_arr);
		$mixdata = $this->items->get_attay_hand_data($handtype_arr);
		tpl::assign('hand',$mixdata);
		
        if(isset($_SERVER['REQUEST_URI']) && false !== stripos($_SERVER['REQUEST_URI'],'clearcache')){
            $this->cache_enable = false;
        }
        
    }
	
	/**
     * 获取广告
     */
    private function getAd()
    {
		$ad = cache::get($this->cache_prefix,'public_ad');
		
		if(empty($ad)){
        //后台广告,根据页面获得
        $ad = $this->items->getAdCodeTypeArr(array('common'));
		//cache::set($this->cache_prefix,'public_ad',$ad,$this->cachetime); //写缓存
		//cache::set_cache_list($this->cache_prefix,'public_ad');
		}
		
        tpl::assign('ad', $ad);
    }
	
	
	
	/*
	* 黄道吉日
	*/
	public function index()
	{
		$tid = (int) req::item('tid',363);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic('363',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		
        $today = date('Y-n-j');
		$y = req::item('y');$n = req::item('n');$j = req::item('j');
        $date = req::item('date');
		if($date==''){
			$date = $today;
			if($y!=''){
				$date = $y.'-'.$n.'-'.$j;
			}
		}else{//post的date
			$seo['title'] = $date.'黄历，'.$date.'财神方位，'.$date.'宜忌择日';
			tpl::assign('seo',$seo);
		}
		
        if(!preg_match('/^(\d{4})\-(\d{1,2})\-(\d{1,2})$/', $date, $_date) || !checkdate((int)$_date[2], (int)$_date[3], (int)$_date[1]))
        {
            $date = $today;
        }
        $time = strtotime($date);
        $date = date('Y-n-j', $time);
		
		$y = date('Y', $time);$n = date('n', $time);$j = date('j', $time);$m = date('m', $time);$d = date('d', $time);
		
		$ymd_arr = self::get_ymd($y,$n,$j);
		tpl::assign('ymd_arr',$ymd_arr);
		
        $history_date = date('n/j', $time);
        $prev_date = date('Y-n-j', strtotime('-1 day', $time));
        $next_date = date('Y-n-j', strtotime('+1 day', $time));
		
		
		
        $hdjr=cls_laohuangli::get_hdjr($date);
		
        //$scgj=cls_laohuangli::get_scgj($date);
        $shengxiao = mb_substr(trim($hdjr['suici']), -1, 1, 'UTF-8');
        tpl::assign('hdjr',$hdjr);
       // tpl::assign('scgj',$scgj);
        tpl::assign('today', $today);
        tpl::assign('current_date', $date);
        tpl::assign('history_date', $history_date);
        tpl::assign('prev_date', $prev_date);
        tpl::assign('next_date', $next_date);
        tpl::assign('shengxiao', $shengxiao);
		$tpl     = 'index/huangli/index.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	
	
	private function get_ymd($caisy,$caism,$caisd){
		//年份
		for($yi=1912;$yi<2020;$yi++){
			if($caisy==$yi){
			$ynian.='<option value="'.$yi.'" selected="selected">'.$yi.'</option>';
			}else{
				$ynian.='<option value="'.$yi.'">'.$yi.'</option>';
			}
		}
		
		//月份
		$yyue='';
		for($yi=1;$yi<13;$yi++){
			if($yi==$caism){
				$yyue.='<option value="'.$yi.'" selected="selected">'.$yi.'</option>';
			}else{
				$yyue.='<option value="'.$yi.'">'.$yi.'</option>';
			}
		}
		//日子
		$rri='';
		for($yi=1;$yi<32;$yi++){
			if($yi==$caisd){
				$rri.='<option value="'.$yi.'" selected="selected">'.$yi.'</option>';
			}else{
				$rri.='<option value="'.$yi.'">'.$yi.'</option>';
			}
		}
		
		$ymd_arr = array('y'=>$ynian,'m'=>$yyue,'d'=>$rri);
		return $ymd_arr;
	}
	
	
	/****
	*择日
	*/
	function zeri(){
		$tid = (int) req::item('tid',469);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic('363',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$s_year = req::item('s_year',date('Y'));
		$s_month = req::item('s_month',date('n'));
		$s_day = req::item('s_day',date('j'));
		
		$s_time = $s_year.'年'.$s_month.'月'.$s_day.'日';
		
		$e_year = req::item('e_year',date('Y'));
		$e_month = req::item('e_month',(date('n')+1));
		$e_day = req::item('e_day',date('j'));
		
		$e_time = $e_year.'年'.$e_month.'月'.$e_day.'日';
		
		$lmanacType = req::item('lmanacType',1);
		$lmanacCond = req::item('lmanacCond','');
		
		if($lmanacType==1){
			$zdtype = 'yi';
			$zdname = '宜';
		}else{
			$zdtype = 'ji';
			$zdname = '忌';
		}
		
		if($lmanacCond){
			$datalist = cls_laohuangli::zeri($s_time,$e_time,$lmanacType,$lmanacCond);
			$nums = count($datalist);
			tpl::assign('datalist',$datalist);
			tpl::assign('nums',$nums);
			tpl::assign('lmanacCond',$lmanacCond);
			$seo['title'] = $s_time.'到'.$e_time.$zdname.$lmanacCond.'的日子有那些，'.$s_time.'到'.$e_time.$lmanacCond.'好不好';
			tpl::assign('seo',$seo);
		}
		
		$tpl     = 'index/huangli/zeri.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/***
	 *单页面
	 */
	function huanglijieshi(){
		$tid = (int) req::item('tid',467);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic('363',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$tpl     = 'index/huangli/huanglijieshi.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *历史上的今天
	 */
	function lishi(){
		$tid = (int) req::item('tid',468);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic('363',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		$id = (int) req::item('id');
		if(is_numeric($id) && $id!=0){
			$sql = 'select * from `tool_history_day_event` where id="'.$id.'"';
			$data = db::queryone($sql);
			tpl::assign('data',$data);
			$mm = substr($data['day'],0,2);
			$dd = substr($data['day'],2,2);
			$seo['title'] = $data['year'].'年'.$mm.'月'.$dd.'日'.$data['title'].$data['day'].'发生的大事';
			tpl::assign('seo',$seo);
			$tpl     = 'index/huangli/day_info.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		
		$date = req::item('date');
		if($date==''){
			$nm = date('m',time());
			$nn = date('d',time());
		}else{
			$nm = substr($date,0,2);
			$nn = substr($date,2,2);
		}
		$m = req::item('m',$nm);
		$d = req::item('d',$nn);
		tpl::assign('dateday',$m.'月'.$d.'日');
		$ZUOTIAN = date("md",strtotime("-1 day"));
		$MINGTIAN = date("md",strtotime("+1 day"));
		tpl::assign('ZUOTIAN',$ZUOTIAN);
		tpl::assign('MINGTIAN',$MINGTIAN);
		$sql = 'select * from `tool_history_day_event` where day="'.$m.$d.'"';
		$seo['title'] = $seo['title'].' - '.$m.'月'.$d.'日大事记';
		tpl::assign('seo',$seo);
		$lishidata = db::querylist($sql);
		
		tpl::assign('lishidata',$lishidata);
		
		$tpl     = 'index/huangli/lishi.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/***
	 *阴阳历转换
	 */
	
	function yinyangli(){
		$tid = (int) req::item('tid',470);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic('363',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$datetype = req::item('datetype');
		//新历
		$yyear = req::item('yyear');
		$ymonth = req::item('ymonth');
		$yday = req::item('yday');
		
		//旧历
		$nyear = req::item('nyear');
		$nmonth = req::item('nmonth');
		$nday = req::item('nday');
		
		
		if($datetype==1){//公历
				$nongli = new cls_nongli();
                $jiuli = $nongli->convertSolarToLunar($yyear,$ymonth,$yday);
                tpl::assign('jiuli',$jiuli);
				
				$yDATATIME = $yyear.'年'.$ymonth.'月'.$yday.'日';
				$seo['title'] = '阳历'.$yyear.'年'.$ymonth.'月'.$yday.'日农历查询，新历'.$yyear.'年'.$ymonth.'月'.$yday.'日是旧历的什么日子';
				tpl::assign('seo',$seo);
				
				tpl::assign('yDATATIME',$yDATATIME);
				
				
		}elseif($datetype==2){//旧历
				$nongli = new cls_nongli();
                $xinli = $nongli->convertLunarToSolar($nyear,$nmonth,$nday);
				
				$DATATIME = $nyear.'年'.$nmonth.'月'.$nday.'日';
				$seo['title'] = '阴历'.$DATATIME.'阳历查询，旧历'.$DATATIME.'是新历的什么日子';
				tpl::assign('seo',$seo);
				tpl::assign('DATATIME',$DATATIME);
                tpl::assign('xinli',$xinli);
		}
		
		
		$tpl     = 'index/huangli/yinyangli.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	public function jrhl(){
        $date = date('Y-n-j', time());
		$hdjr=cls_laohuangli::get_hdjr($date);
		echo "document.write('<span class=\"gregorian\" id=\"riqi\"><i></i>".$hdjr['gongli']."</span><span class=\"lunar\" id=\"nongli\">".$hdjr['nongli']."</span></div><div class=\"ecliptic_act ecliptic_act_s1\"><div id=\"ecliptic_prop1\" class=\"prop\"><span class=\"item\"><a target=\"_blank\" href=\"/hdjr/".$date."\" class=\"in\">".$hdjr['yi']."</a></span></div><span class=\"icon\">宜</span></div><div class=\"ecliptic_act ecliptic_act_s2\"><div id=\"ecliptic_prop2\" class=\"prop\"><span class=\"item\"><a target=\"_blank\" href=\"/hdjr/".$date."\" class=\"in\">".$hdjr['ji']."</a></span></div><span class=\"icon1\">忌</span></div><div class=\"ecliptic_act ecliptic_act_s3\"><div id=\"ecliptic_prop3\" class=\"prop\"><span class=\"item\"><a class=\"in\" target=\"_blank\" href=\"/hdjr/".$date."\">".$hdjr['chong']."</a></span></div><span class=\"icon2\">冲</span>');";
		exit;
	}
	
	
	
	
	
}