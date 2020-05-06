<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * v.bazi5首页控制器
 *
 * @version 2013.07.05
 */
class ctl_h5_peidui
{
	
	
	
    public static $userinfo;
    public static $control;
    public $cache_enable = false;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
    public $cache_key    = 'peidui/index';
	public $tid_arr = array( 1=>'星座配对', 2=>'生肖配对', 3=>'血型配对', 4=>'星座血型', 5=>'属相血型', 6=>'星座属相');

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
		$public_hand_data_cache = '';
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
	 *八字合婚
	 */
	public function hehun(){
		
		$tid = (int) req::item('tid',383);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('user'))
		{
			$data = mod_peidui::hehun();
			tpl::assign('data',$data);
			$tpl     = 'h5/peidui/hehun_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/peidui/hehun_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	
	/***
	 *qq配对
	 */
	public function qq(){
		
		$tid = (int) req::item('tid',384);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('qq1'))
		{
			$qq1=req::item('qq1');
			$qq2=req::item('qq2');
			$qq = array('qq1'=>$qq1,'qq2'=>$qq2);
			tpl::assign('qq',$qq);
			$qqsz1=0;
			for($i=0;$i<strlen($qq1);$i++){
				$qqsz1=$qqsz1+substr($qq1,$i,1);
				}
			$qqsz2=0;	
			for($x=0;$x<strlen($qq2);$x++){
				$qqsz2=$qqsz2+substr($qq2,$x,1);
				}	
			$qqsz=$qqsz1+$qqsz2;
			if($qqsz>100){
			$qqsz=$qqsz%100;
			}
			$sql="select * from `sm_qlpdbh` where bihua like '%".$qqsz."%'";
			$qqqy=db::queryone($sql);
			tpl::assign('qqqy',$qqqy);	
		}
		
		$tpl     = 'h5/peidui/qq.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
		
	}
	
	/***
	 *配对
	 */
	public function xingzuo(){
		
		$tid = (int) req::item('tid',385);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('xz1'))
		{
			$xz1=req::item('xz1');
			$xz2=req::item('xz2');	
			$sql="select * from `peidui_data` where tid='".$tid."' and t1='".$xz1."' and t2='".$xz2."'";
			$xz=db::queryone($sql);
			tpl::assign('xz1',$xz1);
			tpl::assign('xz2',$xz2);
			tpl::assign('xz',$xz);
		}
		
		$tpl     = 'h5/peidui/xingzuo.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *
	 */
	public function xingzuoxuexing(){
		$tid = (int) req::item('tid',461);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('t1'))
		{
			$t1=req::item('t1');//星座
			$t2=req::item('t2');//血型
			$sql="select * from `peidui_data` where tid='".$tid."' and t1='".$t1."' and t2='".$t2."'";
			$info=db::queryone($sql);
			tpl::assign('t1',$t1);
			tpl::assign('t2',$t2);
			
			tpl::assign('info',$info);
		}
		
		$tpl     = 'h5/peidui/xingzuoxuexing.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/***
	 *
	 */
	public function shengxiaoxuexing(){
		$tid = (int) req::item('tid',462);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('t1'))
		{
			$t1=req::item('t1');//星座
			$t2=req::item('t2');//血型
			$sql="select * from `peidui_data` where tid='".$tid."' and t1='".$t1."' and t2 like '".$t2."%'";
			$info=db::queryone($sql);
			tpl::assign('t1',$t1);
			tpl::assign('t2',$t2);
			
			
			
			tpl::assign('info',$info);
		}
		
		$tpl     = 'h5/peidui/shengxiaoxuexing.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *
	 */
	public function xingzuoshengxiao(){
		$tid = (int) req::item('tid',463);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('t1'))
		{
			$t1=req::item('t1');//星座
			$t2=req::item('t2');//血型
			$sql="select * from `peidui_data` where tid='".$tid."' and t1='".$t1."' and t2 like '".$t2."%'";
			$info=db::queryone($sql);
			tpl::assign('t1',$t1);
			tpl::assign('t2',$t2);
			tpl::assign('info',$info);
		}
		
		$tpl     = 'h5/peidui/xingzuoshengxiao.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/***
	 *配对
	 */
	public function shengxiao(){
		
		$tid = (int) req::item('tid',386);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('sx1'))
		{
			$sx1=req::item('sx1');
			$sx2=req::item('sx2');
			$sql="select * from `peidui_data` where tid='".$tid."' and t1='".trim($sx1)."' and t2='".trim($sx2)."'";
			$sx=db::queryone($sql);
			tpl::assign('sx1',$sx1);
			tpl::assign('sx2',$sx2);
			tpl::assign('sx',$sx);
		}
		
		$tpl     = 'h5/peidui/shengxiao.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/***
	 *配对
	 */
	public function xuexing(){
		
		$tid = (int) req::item('tid',388);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		if(req::item('xx1'))
		{
			$xx1=req::item('xx1');
			$xx2=req::item('xx2');
			$sql="select * from `peidui_data` where tid='".$tid."' and t1='".trim($xx1)."' and t2='".trim($xx2)."'";
			$xx=db::queryone($sql);	
			tpl::assign('xx1',$xx1);
			tpl::assign('xx2',$xx2);
			tpl::assign('xx',$xx);
		}
		
		$tpl     = 'h5/peidui/xuexing.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/***
	 *配对
	 */
	public function mingzi(){
		
		$tid = (int) req::item('tid',387);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('360',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('xm1'))
		{
			$xm1=req::item('xm1');
			$xm2=req::item('xm2');
			tpl::assign('xm1',$xm1);
			tpl::assign('xm2',$xm2);
			$xm1bihua1=substr($xm1,0,3);
			$xm1bihua2=substr($xm1,3,3);
			$xm1bihua3=substr($xm1,6,3);
			$xm1bihua4=substr($xm1,9,3);
			
			$xm1bihua1=mod_xingming::get_bihua($xm1bihua1);
			$xm1bihua1 = $xm1bihua1['bihua'];
			$xm1bihua2=mod_xingming::get_bihua($xm1bihua2);
			$xm1bihua2 = $xm1bihua2['bihua'];
			$xm1bihua3=mod_xingming::get_bihua($xm1bihua3);
			$xm1bihua3 = $xm1bihua3['bihua'];
			$xm1bihua4=mod_xingming::get_bihua($xm1bihua4);
			$xm1bihua4 = $xm1bihua4['bihua'];
			$xm1all=$xm1bihua1+$xm1bihua2+$xm1bihua3+$xm1bihua4;
			
			$xm2bihua1=substr($xm2,0,3);
			$xm2bihua2=substr($xm2,3,3);
			$xm2bihua3=substr($xm2,6,3);
			$xm2bihua4=substr($xm2,9,3);
			
			$xm2bihua1=mod_xingming::get_bihua($xm2bihua1);
			$xm2bihua1 = $xm1bihua1['bihua'];
			$xm2bihua2=mod_xingming::get_bihua($xm2bihua2);
			$xm2bihua2 = $xm2bihua2['bihua'];
			$xm2bihua3=mod_xingming::get_bihua($xm2bihua3);
			$xm2bihua3 = $xm2bihua3['bihua'];
			$xm2bihua4=mod_xingming::get_bihua($xm2bihua4);
			$xm2bihua4 = $xm2bihua4['bihua'];
			
			$xm2all=$xm2bihua1+$xm2bihua2+$xm2bihua3+$xm2bihua4;
			
			
			$bihuaall=$xm1all+$xm2all;	
			
			if($bihuaall>100){
				$bihuaall=$bihuaall%100;
			}
			$sql="select * from `sm_qlpdbh` where bihua like '%".$bihuaall."%'";
			$xxxy=db::queryone($sql);
			tpl::assign('xxxy',$xxxy);	
		}
		
		$tpl     = 'h5/peidui/mingzi.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	
}