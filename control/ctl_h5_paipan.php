<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 首页控制器
 *
 * @version 2013.07.05
 */
class ctl_h5_paipan
{
	
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'm.ss230.com';
    public $cache_key    = 'xingming/index';

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
		//获取底部友链
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
		cache::set($this->cache_prefix,'public_ad',$ad,$this->cachetime); //写缓存
		//cache::set_cache_list($this->cache_prefix,'public_ad');
		}
		
        tpl::assign('ad', $ad);
    }
	
	/***
	 *八字排盘
	 */
	public function bazi(){
		$tid = (int) req::item('tid',376);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('359',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('name'))
		{
			$bzname=req::item('name');
			$area=req::item('area');
			$sex=req::item('sex');
			$yezis=req::item('yezis');
			$nian1=req::item('year');
			$yue1=req::item('month');
			$ri1=req::item('date');
			$hour1=req::item('hour');
			$minues=req::item('minute');
			$taiyang=req::item('taiyang');
			$info = array('bzname'=>$bzname,'area'=>$area,'sex'=>$sex,'yezis'=>$yezis,'nian1'=>$nian1,'yue1'=>$yue1,'ri1'=>$ri1,'hour1'=>$hour1,'minues'=>$minues,'taiyang'=>$taiyang,'taiyang'=>$taiyang);
			tpl::assign('info',$info);
			
			$data = mod_paipan::bazi($bzname,$area,$sex,$yezis,$nian1,$yue1,$ri1,$hour1,$minues,$taiyang);
			tpl::assign('data',$data);
			
			
			$tpl     = 'h5/paipan/bazi_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
			
		}
		else
		{
			$tpl     = 'h5/paipan/bazi_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	
	/****
	 *
	 */
	public function ziwei(){
		$tid = (int) req::item('tid',381);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('359',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('name'))
		{
			$name=req::item('name');
			$sex=req::item('sex');
			$DateType=req::item('DateType');
			$y=req::item('year');
			$m=req::item('month');
			$d=req::item('date');
			$h=req::item('hour');
			$info = array('name'=>$name,'sex'=>$sex,'DateType'=>$DateType);
			tpl::assign('info',$info);

			$data = mod_paipan::ziwei();
			tpl::assign('data',$data);
			
			$tpl     = 'h5/paipan/ziwei_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/paipan/ziwei_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	public function xuankongfeixing(){
		$tid = (int) req::item('tid',378);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('359',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		
		if(req::item('gm'))
		{
			
			$gm=trim(req::item('gm'));
			$dy=req::item('dy');  
			$sx=trim(req::item('sx'));
			$pljsx=req::item('pljsx');
			$nian=req::item('nian');
			$sex=req::item('sex');
			$y=req::item('year');
			$mont=req::item('month');
			
			$pailong = req::item('pailong');
			if($pailong!=''){
				$plj = cls_xuankongfeixing::plj($pljsx);
				tpl::assign('plj',$plj);
			}
			
			$mingua = req::item('mingua');
			if($pailong!=''){
				$minggua = cls_xuankongfeixing::minggua($nian,$sex,$y,$mont);
				tpl::assign('minggua',$minggua);
			}
			
			$xkfx_Array = mod_paipan::xuankongfeixing($gm,$dy,$sx,$pljsx,$nian,$sex,$y,$mont);
			
			tpl::assign('xkfx_Array',$xkfx_Array);
			$tpl     = 'h5/paipan/xkfx_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/paipan/xkfx_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	public function liuren(){
		
		$tid = (int) req::item('tid',377);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('359',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('name'))
		{
			$name = req::item('name');
			$zhanshi=req::item('zhanshi');
			$y=req::item('y');
			$m=req::item('m');
			$d=req::item('d');
			$mins=req::item('min');
			$h=req::item('h');
			$birthyear=req::item('birthyear');
			$sex=req::item('sex');
			$info = array('name'=>$name,'zhanshi'=>$zhanshi,'sex'=>$sex,'birthyear'=>$birthyear);
			tpl::assign('info',$info);
			
			
			$data = mod_paipan::liuren();
			tpl::assign('data',$data);
			
			$tpl     = 'h5/paipan/liuren_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/paipan/liuren_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	public function liuyao(){
		$tid = (int) req::item('tid',379);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('359',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('name'))
		{
			$name=req::item('name');
			$reason=req::item('reason');
			$birthyear=req::item('birthyear');
			$sex=req::item('sex');
			if($sex=="1"){$sex="男";}else{ $sex="女";}
			$jd1=req::item('jd1');
			$jd2=req::item('jd2');
			$taiyang=req::item('taiyang');
			$sely=req::item('sely');
			$selmo=req::item('selmo');
			$seld=req::item('seld');
			$selh=req::item('selh');
			$selm=req::item('selm');
			$auto=req::item('auto');
			$upgua=req::item('bsnums_up');
			$downgua=req::item('bsnums_down');
			$addhour = req::item('addhour');
			
			$fangfa=array(0,"电脑自动","手工指定","时间起卦","手动摇卦","报数起卦");
			
			$info = array('name'=>$name,'reason'=>$reason,'birthyear'=>$birthyear,'sex'=>$sex,'qiguafangfa'=>$fangfa[$auto],'auto'=>$auto,'upgua'=>$upgua,'downgua'=>$downgua,'taiyang'=>$taiyang,'addhour'=>$addhour);
			tpl::assign('info',$info);
			
			$data = mod_paipan::liuyao();
			tpl::assign('data',$data);
			
			$tpl     = 'h5/paipan/liuyao_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/paipan/liuyao_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	public function qimendunjia(){
		$tid = (int) req::item('tid',380);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('359',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('name'))
		{
			$name=req::item('name');
			$sex=req::item('sex');
			$birthyear=req::item('birthyear');
			$zhanshi=req::item('zhanshi');
			$Pmethod=req::item('R1');
			$jutag=req::item('jutag');
			$nian=req::item('yea');
			$yue=req::item('mont');
			$ri=req::item('dat');
			$shi=req::item('hou');
			$fen=req::item('minut');
			$info = array('name'=>$name,'sex'=>$sex,'birthyear'=>$birthyear,'zhanshi'=>$zhanshi,'Pmethod'=>$Pmethod,'jutag'=>$jutag,'nian'=>$nian);
			tpl::assign('info',$info);
			$data = mod_paipan::qmdj($name,$sex,$birthyear,$zhanshi,$Pmethod,$jutag);
			tpl::assign('data',$data);
			$tpl     = 'h5/paipan/qimendunjia_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/paipan/qimendunjia_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	public function xingpan(){
		$tid = (int) req::item('tid',382);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('359',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(req::item('name'))
		{
			$name=req::item('name');
			$sex=req::item('sex');
			$birthyear=req::item('birthyear');
			$sex==1?$sex = '男':$sex = '女';
			tpl::assign('name',$name);
			tpl::assign('sex',$sex);
			tpl::assign('birthyear',$birthyear);
				
			$t1 = req::item('t1');
			$t2 = req::item('t2');
			$tid_arr = array( 1=>'太阳落在白羊座', 2=>'太阳落在第一宫', 3=>'太阳与月亮呈0度');
			$xingpan_type1 = array('1'=>'太阳','2'=>'月亮','3'=>'水星','4'=>'金星','5'=>'火星','6'=>'木星','7'=>'土星','8'=>'天王星','9'=>'海王星','10'=>'冥王星');
			$xingpan_type2 = array(1=>'白羊座', 2=>'金牛座', 3=>'双子座', 4=>'巨蟹座', 5=>'狮子座', 6=>'处女座', 7=>'天秤座', 8=>'天蝎座', 9=>'射手座', 10=>'摩羯座', 11=>'水瓶座', 12=>'双鱼座');
			$xingpan_type_2 = array('1'=>'第一宫','2'=>'第二宫','3'=>'第三宫','4'=>'第四宫','5'=>'第五宫','6'=>'第六宫','7'=>'第七宫','8'=>'第八宫','9'=>'第九宫','10'=>'第十宫','11'=>'第十一宫','12'=>'第十二宫');
				
			if(is_numeric($t1)){
					$t1 = $xingpan_type1[$t1];
			}
			
			if(is_numeric($t2)){
				$t2 = $xingpan_type2[$t2];
			}
			
			$sql = 'select * from `xingpan_data` where tid="1" and t1="'.$t1.'" and t2="'.$t2.'"';
			
			$data = db::queryone($sql);
			tpl::assign('data',$data);
			
			$tpl     = 'h5/paipan/xingpan_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
			
		}
		else
		{
			$tpl     = 'h5/paipan/xingpan_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	
}