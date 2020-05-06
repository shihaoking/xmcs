<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 *
 * @version 2013.07.05
 */
class ctl_h5_haoma
{

	public static $userinfo;
	public static $control;
	public $cache_enable = true;//缓存开关,调试时可设为false
	public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
	public $cache_prefix = 'www.kaiy8.com';
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


	/***
	 *首页
	 */
	public function index(){
		$content      = array();
		if($this->cache_enable)
		{
			$content = cache::get($this->cache_prefix,'haoma_index');
		}
		$content = '';
		if(empty($content))
		{
			$tid = (int) req::item('tid',361);
			$path = mod_index::this_path($tid);
			tpl::assign('path',$path);
			$topic = mod_topic::get_topic_h5('361',$tid);
			tpl::assign('topic',$topic);
			$seo = mod_topic::seo_info($tid);
			tpl::assign('seo',$seo);
			$tpl     = 'h5/haoma/index.tpl';
			$content = tpl::fetch($tpl);
			cache::set($this->cache_prefix,'haoma_index',$content,$this->cachetime); //写缓存
		}
		exit($content);

	}


	/***
	 *手机
	 */
	public function shouji(){
		$tid = (int) req::item('tid',389);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('word')){

			$word22=req::item('word');
			tpl::assign('word22',$word22);
			/*
			if($_SESSION['your']!=''){
				   $arr=unserialize($_SESSION['your']);
				   $testname=$arr['xingming']['xing'].$arr['xingming']['ming'];
				   $ty=$arr['nianling']['y'];
				   $tm=$arr['nianling']['m'];
				   $td=$arr['nianling']['d'];
				   if($testname!=''){
				   $db = new db_class(host, database, username, password, 'utf8');
				   $sql="UPDATE `bazi_scbz` SET  `tel` =  '".$word22."' WHERE  `name` ='".$testname."' and `ymd`='".$ty.'-'.$tm.'-'.$td."'";
				   $db->mysql_querys($sql);
				   }
			   }
			*/
			$word=req::item('word');
			$k=req::item('k');
			$word=$word/80;
			$temp=intval($word);
			$word=$word-$temp;
			$word=intval($word*80);
			if($word=="0"){
				$word="81";
			}


			$sql="select * from `sm_shouji` where num='".$word."'";
			//归属地
			/*$url = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel='.$word22;
			$c_arr = file_get_contents($url);
			$c_arr = iconv('gbk','utf-8',$c_arr);
			preg_match('/carrier:\'(.*?)\'/is',$c_arr,$n);
			if($n[1]!=''){
				tpl::assign('gsd',$n[1]);
			}*/

			$haomajx=db::queryone($sql);

			$seo['title'] = '手机号码：'.$word22.'测吉凶，'.$word22.'手机号码好不好？';
			$seo['description'] = '手机号码：'.$word22.'测吉凶，'.$word22.'手机号码好不好？'.$seo['description'];
			tpl::assign('seo',$seo);
			tpl::assign('haomajx',$haomajx);
			tpl::assign('word',$word);
		}


		$tpl     = 'h5/haoma/shouji_form.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}


	/***
	 *电话
	 */
	public function dianhua(){

		$tid = (int) req::item('tid',390);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('word'))
		{
			$word22=req::item('word');
			tpl::assign('word',$word22);
			/*if($_SESSION['your']!=''){
				   $arr=unserialize($_SESSION['your']);
				   $testname=$arr['xingming']['xing'].$arr['xingming']['ming'];
				   $ty=$arr['nianling']['y'];
				   $tm=$arr['nianling']['m'];
				   $td=$arr['nianling']['d'];
				   if($testname!=''){
				   $db = new db_class(host, database, username, password, 'utf8');
				   $sql="UPDATE `bazi_scbz` SET  `tel` =  '".$word22."' WHERE  `name` ='".$testname."' and `ymd`='".$ty.'-'.$tm.'-'.$td."'";
				   $db->mysql_querys($sql);
				   }
			   }
			*/
			$word=req::item('word');
			$k=req::item('k');
			$word=$word/80;
			$temp=intval($word);
			$word=$word-$temp;
			$word=intval($word*80);
			if($word=="0"){
				$word="81";
			}

			$sql="select * from `sm_shouji` where num='".$word."'";
			$haomajx=db::queryone($sql);
			tpl::assign('haomajx',$haomajx);
			$seo['title'] = '电话号码：'.$word22.'测吉凶，'.$word22.'电话号码好不好？';
			$seo['description'] = '电话号码：'.$word22.'测吉凶，'.$word22.'电话号码好不好？'.$seo['description'];
			tpl::assign('seo',$seo);
		}

		$tpl     = 'h5/haoma/dianhua_form.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}


	/***
	 *身份证
	 */
	public function shenfenzheng(){

		$tid = (int) req::item('tid',391);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);


		if(req::item('xian')!=''){
			$xian=req::item('xian');
			tpl::assign('xian',$xian);
			$len=strlen($xian);
			if(!mod_api::validation_filter_id_card($xian)){
				die(header("location:haoma/"));
			}
			/*
			 if($_SESSION['your']!=''){
				   $arr=unserialize($_SESSION['your']);
				   $testname=$arr['xingming']['xing'].$arr['xingming']['ming'];
				   $ty=$arr['nianling']['y'];
				   $tm=$arr['nianling']['m'];
				   $td=$arr['nianling']['d'];
				   if($testname!=''){
				   $sql="UPDATE `bazi_scbz` SET  `sfz` =  '".$xian."' WHERE  `name` ='".$testname."' and `ymd`='".$ty.'-'.$tm.'-'.$td."'";
				   db::query($sql);
				   }
			   }
			*/
			if($len==15){
				$yy="19".substr($xian,6,2);
				$mm=substr($xian,8,2);
				$dd=substr($xian,10,2);
				$aa=substr($xian,14,1);
			}elseif($len==18){
				$yy=substr($xian,6,4);
				$mm=substr($xian,10,2);
				$dd=substr($xian,12,2);
				$aa=substr($xian,16,1);
			}

			$liu=substr($xian,0,6);
			$sql='select * from `sm_sfz` where BM="'.$liu.'"';

			$sfz=db::queryone($sql);
			tpl::assign('sfz',$sfz);
			$aa%2==0?$xb='女':$xb='男';

			tpl::assign('xb',$xb);
			$n1=substr($xian,6,1);
			$n2=substr($xian,7,1);
			$y1=substr($xian,8,1);
			$y2=substr($xian,9,1);
			$r1=substr($xian,10,1);
			$r2=substr($xian,11,1);

			$nn=$n1+$n2;

			if(strlen($nn)==2){
				$nn=substr($nn,0,1)+substr($nn,1,1);
			}

			$nn%2==0?$n='双':$n='单';

			$yy=$y1+$y2;

			if(strlen($yy)==2){
				$yy=substr($yy,0,1)+substr($yy,1,1);
			}
			$yy%2==0?$y='双':$y='单';

			$rr=$r1+$r2;

			if(strlen($rr)==2){
				$rr=substr($rr,0,1)+substr($rr,1,1);
			}

			$rr%2==0?$r='双':$r='单';

			$testnum=$n.$y.$r;
			$sql="select * from `sm_test` where testnum='".$testnum."'";
			$sfzjie=db::queryone($sql);
			tpl::assign('sfzjie',$sfzjie);
			$seo['title'] = '身份证号码：'.$xian.'测吉凶，身份证号码'.$xian.'归属地';
			$seo['description'] = '身份证号码：'.$xian.'测吉凶，身份证号码'.$xian.'归属地'.$seo['description'];
			tpl::assign('seo',$seo);
		}

		$tpl     = 'h5/haoma/shenfenzheng_form.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}


	/***
	 *qq
	 */
	public function qq(){

		$tid = (int) req::item('tid',392);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('word')){
			$word22=req::item('word');
			/*
			   if($_SESSION['your']!=''){
				   $arr=unserialize($_SESSION['your']);
				   $testname=$arr['xingming']['xing'].$arr['xingming']['ming'];
				   $ty=$arr['nianling']['y'];
				   $tm=$arr['nianling']['m'];
				   $td=$arr['nianling']['d'];
				   if($testname!=''){
				   $sql="UPDATE `bazi_scbz` SET  `qq` =  '".$word22."' WHERE  `name` ='".$testname."' and `ymd`='".$ty.'-'.$tm.'-'.$td."'";
				   db::query($sql);
				   }
			   }
			*/
			$word=req::item('word');
			$k=req::item('k');
			$word=$word/80;
			$temp=intval($word);
			$word=$word-$temp;
			$word=intval($word*80);
			if($word=="0"){
				$word="81";
			}

			$sql="select * from `sm_shouji` where num='".$word."'";
			$haomajx=db::queryone($sql);
			tpl::assign('word',$word22);
			tpl::assign('haomajx',$haomajx);
			$seo['title'] = 'qq号码：'.$word22.'测吉凶，qq号码'.$word22.'好不好';
			$seo['description'] = 'qq号码：'.$word22.'测吉凶，qq号码'.$word22.'好不好'.$seo['description'];
			tpl::assign('seo',$seo);
		}

		$tpl     = 'h5/haoma/qq_form.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}

	/***
	 *车牌
	 */
	public function chepai(){

		$tid = (int) req::item('tid',393);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('word')){
			$word22=req::item('dq').req::item('zm').req::item('word');
			tpl::assign('word',$word22);
			$word=req::item('word');
			$k='车牌号码';
			$word=$word/80;
			$temp=intval($word);
			$word=$word-$temp;
			$word=intval($word*80);
			if($word=="0"){
				$word="81";
			}
			$sql="select * from `sm_shouji` where num='".$word."'";
			$haomajx=db::queryone($sql);
			tpl::assign('haomajx',$haomajx);

			$seo['title'] = '车牌号码：'.$word22.'测吉凶，车牌号码'.$word22.'好不好';
			$seo['description'] = '车牌号码：'.$word22.'测吉凶，车牌号码'.$word22.'好不好'.$seo['description'];
			tpl::assign('seo',$seo);

		}


		$tpl     = 'h5/haoma/chepai_form.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}


	/***
	 *生日密码
	 */
	public function shengrimima(){

		$tid = (int) req::item('tid',394);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('m')){
			$m=req::item('m');
			$d=req::item('d');
			$sql="select * from `tool_birtyday_password` where `days`='".$m."-".$d."'";
			$data=db::queryone($sql);
			tpl::assign('data',$data);
			$seo['title'] = $m.'月'.$d.'日出生的人生日密码'.$m.'月'.$d.'日生日密码';
			$seo['description'] = $m.'月'.$d.'日出生的人生日密码'.$m.'月'.$d.'日生日密码';
			tpl::assign('seo',$seo);
			$tpl     = 'h5/haoma/srmm_find.tpl';
		}
		else
		{
			$tpl     = 'h5/haoma/srmm_from.tpl';
		}
		$content = tpl::fetch($tpl);
		exit($content);
	}


	/***
	 *
	 */
	public function shengrihua(){

		$tid = (int) req::item('tid',465);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('m')!=''){
			$m=req::item('m');
			$d=req::item('d');
			$m = (int)$m;
			$d = (int)$d;
			if($m<=9){
				$m = '0'.$m;
			}
			if($d<=9){
				$d = '0'.$d;
			}
			$sql="select * from `news_data` where tid='".$tid."' and `shorttxt`='".$m."-".$d."'";
			$data=db::queryone($sql);


			tpl::assign('data',$data);
			$seo['title'] = $m.'月'.$d.'日出生的人生日生日花'.$m.'月'.$d.'日生日花';
			$seo['description'] = $m.'月'.$d.'日出生的人生日花'.$m.'月'.$d.'日生日花';
			tpl::assign('seo',$seo);
			$tpl     = 'h5/haoma/shengrihua_find.tpl';
		}
		else
		{
			$tpl     = 'h5/haoma/shengrihua_from.tpl';
		}
		$content = tpl::fetch($tpl);
		exit($content);
	}


	/***
	 *
	 */
	public function shengrishu(){

		$tid = (int) req::item('tid',464);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('m')!=''){
			$m=req::item('m');
			$d=req::item('d');
			$m = (int)$m;
			$d = (int)$d;
			if($m<=9){
				$m = '0'.$m;
			}
			if($d<=9){
				$d = '0'.$d;
			}
			$sql="select * from `news_data` where tid='".$tid."' and `shorttxt`='".$m."-".$d."'";
			$data=db::queryone($sql);
			tpl::assign('data',$data);
			$seo['title'] = $m.'月'.$d.'日出生的人生日书'.$m.'月'.$d.'日生日书';
			$seo['description'] = $m.'月'.$d.'日出生的人生日书'.$m.'月'.$d.'日生日书';
			tpl::assign('seo',$seo);
			$tpl     = 'h5/haoma/shengrishu_find.tpl';
		}
		else
		{
			$tpl     = 'h5/haoma/shengrishu_from.tpl';
		}
		$content = tpl::fetch($tpl);
		exit($content);
	}


	/***
	 *
	 */
	public function chushengri(){

		$tid = (int) req::item('tid',466);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('361',$tid);
		tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);

		if(req::item('d')!=''){
			$d=req::item('d');
			$sql="select * from `news_data` where tid='".$tid."' and `shorttxt`='".$d."'";
			$data=db::queryone($sql);
			tpl::assign('data',$data);
			$seo['title'] = '每月'.$d.'日出生的人性格'.'，每月'.$d.'日出生的人的优缺点';
			$seo['description'] = '每月'.$d.'日出生的人生日性格'.'，每月'.$d.'日出生的人的优缺点';
			tpl::assign('seo',$seo);
			$tpl     = 'h5/haoma/chushengri_find.tpl';
		}
		else
		{
			$tpl     = 'h5/haoma/chushengri_from.tpl';
		}
		$content = tpl::fetch($tpl);
		exit($content);
	}





}