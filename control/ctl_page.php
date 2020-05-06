<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 *
 * @version 2013.07.05
 */
class ctl_page
{
	
	
	
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'xingzuo.bazi5.com';
    public $cache_key    = 'news/index';
    public $nums = '60';

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
		cache::set($this->cache_prefix,'public_ad',$ad,$this->cachetime); //写缓存
		//cache::set_cache_list($this->cache_prefix,'public_ad');
		}
		
        tpl::assign('ad', $ad);
    }
	
	/***
	 *民间测试首页
	 */
	public function index(){
		self::show();
	}
	
   /**
    * 单页面show
    * 
    */
    public function show()
    {
		
		$tid = (int) req::item('tid',432);
		
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		
		$parentid = mod_topic::get_parentid($tid);
		$topic = mod_topic::get_topic($parentid,$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$data = mod_api::get_page_content($tid);
		
		
		tpl::assign('data',$data);
		
		$tpl     = 'index/page.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	
        
    }
	
	
	
	
}