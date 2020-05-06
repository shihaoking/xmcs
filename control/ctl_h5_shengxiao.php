<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 *
 * @version 2013.07.05
 */
class ctl_h5_shengxiao
{
	
	
	
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
    public $cache_key    = 'shengxiao/index';
	public $pagenums = 16;

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
	
   /**
    * xingzuo.bazi5.com首页
    * 
    */
    public function index()
    {
		
		$tid = (int) req::item('tid',417);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		
		$topic = mod_topic::get_topic('417',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$sx_array = array(13=>'鼠', 14=>'牛', 15=>'虎', 16=>'兔', 17=>'龙', 18=>'蛇', 19=>'马', 20=>'羊', 21=>'猴', 22=>'鸡', 23=>'狗', 24=>'猪');
		//文章
		foreach($sx_array as $k=>$v){
			$hot_content[] = mod_index::get_news_data(471,1,5,$k);
			tpl::assign('sx',$hot_content);
		}
		
		
		$tpl     = 'h5/shengxiao/index.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
    }
	
	
	/***
	*12星座单页
	*/
	
	function show(){
		$tid = (int) req::item('tid',418);//默认白羊
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic('417',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$s_tid = mod_topic::get_selftid(417,12);
		tpl::assign('s_tid',$s_tid);
		
		##end每日运势
		
		$data = mod_api::get_shengxiao_content($tid);
		
		//$data['more'] = str_replace('<br />','',$data['more']);
		tpl::assign('data',$data);

		$hot_content5 = mod_index::get_data('news_data',346,1,5);
		$c5 = $hot_content5;
		tpl::assign('c5',$c5);
		
		$tpl     = 'h5/shengxiao/show.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/**
     * @param integer $classid  分类id
     * @return array
     */
    private function _viewlist($tid,$page=1,$pernum=30,$ord=null) {
		
        $sql='SELECT id,title,uptime,shorttxt FROM xingzuo_data';
        //$sql.=$this->_where($classid, $type, $year, $other);
		if($tid!=''){
			$sql.=' WHERE `tid`="'.$tid.'"';
		}
		
		
		
		
		if($ord=='1'){//最热
			$sql.=' ORDER BY click DESC,uptime DESC LIMIT '.(($page-1)*$pernum).','.$pernum;
		}elseif($ord=='2'){//最新
			$sql.=' ORDER BY `id` asc  LIMIT '.(($page-1)*$pernum).','.$pernum;	
		}else{
			$sql.=' ORDER BY `order` desc, uptime DESC  LIMIT '.(($page-1)*$pernum).','.$pernum;	
			}
		
        $list=db::get_all($sql);
        
        return $list;
    }
	
	/**
     * @param integer $classid  分类id
     * @param string $type      类别
     * @param string $year      年份    
     * @param string $other 其他筛选条件
     * @return integer
     */
    private function _count($tid) {
		if($tid==''){
			
		}else{
			$where = 'WHERE `tid`="'.$tid.'"';
			}
		
        $num=db::get_one('select count(1) as num FROM xingzuo_data '.$where);
        return isset($num['num'])?$num['num']:0;
    }
	
	
	
	
}