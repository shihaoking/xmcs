<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * v.bazi5首页控制器
 *
 * @version 2013.07.05
 */
class ctl_h5_zgjm
{
	
	
	
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
    public $cache_key    = 'zgjm/index';
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
	
   /**
    * xingzuo.bazi5.com首页
    * 
    */
    public function index()
    {
		$content      = array();
        if($this->cache_enable)
        {
            $content = cache::get($this->cache_prefix,'zgjm_index');
        }
		$content = '';
		if(empty($content))
        {
			$tid = 349;
			$path = mod_index::this_path($tid);
			tpl::assign('path',$path);
			$hand_type_arr = array('zgjm_hot_tag');//手动数据
			$handtype_arr = $this->items->getHandTypeId($hand_type_arr);
			$mixdata = $this->items->get_attay_hand_data($handtype_arr);
			tpl::assign('m', $mixdata);//<--END 手动数据
			$topic = mod_topic::get_topic_h5($tid);
			tpl::assign('topic',$topic);
			$seo = mod_topic::seo_info($tid);
			tpl::assign('seo',$seo);
			$topic_arr = mod_topic::get_topic_arr($tid);
			
			$listdata = cache::get($this->cache_prefix,'zgjm_index_list');
			if(empty($listdata)){
				foreach($topic_arr as $k=>$v){
					$listdata[$k]['topic'] = $v['name'];
					$listdata[$k]['topic_id'] = $v['id'];
					$listdata[$k]['data'] = mod_index::get_data('zgjm_data',$v['id'],1,42);
				}
				cache::set($this->cache_prefix,'zgjm_index_list',$listdata,$this->cachetime); //写缓存
			}
			tpl::assign('listdata',$listdata);
			
			$zgjm_new_data = mod_index::get_data('zgjm_data','',1,6);
			tpl::assign('zgjm_new_data',$zgjm_new_data);
			
			$seo = mod_topic::seo_info($tid);
			tpl::assign('seo',$seo);
			$tpl     = 'h5/zgjm_index.tpl';
			$content = tpl::fetch($tpl);
			cache::set($this->cache_prefix,'zgjm_index',$content,$this->cachetime); //写缓存
		}
        exit($content);
    }
	
	
	/***
	 *页面详细也
	 *
	 */
	
	public function show(){
		$content      = array();
		$id = (int) req::item('id', 1);//当前ID
		$page = (int) req::item('page',0);
		$topic = mod_topic::get_topic_h5('349','',array('date'=>'zgjm_data','id'=>$id));
		tpl::assign('topic',$topic);
		$path = mod_index::this_path('',$id,4);
		tpl::assign('path',$path);
		$hand_type_arr = array('zgjm_hot_tag');//手动数据
		$handtype_arr = $this->items->getHandTypeId($hand_type_arr);
		$mixdata = $this->items->get_attay_hand_data($handtype_arr);
		tpl::assign('m', $mixdata);//<--END 手动数据
		if($page==0){
			$page = $page+1;
		}
		$id = (int) req::item('id', 1);//当前ID
		$hot_data = mod_index::get_data('zgjm_data','',3,6);
		tpl::assign('hot_data', $hot_data);
		$data = mod_index::get_info('zgjm_data',$id);
		$seo['title'] = ''.$data['title'].' - 解梦';
		$seo['keywords'] = $data['contentKeyword'];
		$seo['description'] = trim(util::cn_truncate($data['content'],80));
		tpl::assign('seo',$seo);
		$c = explode('_ueditor_page_break_tag_',$data['content']);
		$num = count($c);
		//内容分页
		$data['content'] = mod_index::get_pages($data['content'],$page);
		$data['content'] = mod_index::replace_content($data['content']);
		if(isset($_SERVER['REQUEST_URI']) && false !== stripos($_SERVER['REQUEST_URI'],'clearcache')){
			echo $num;
		}
		//
		$page_info = util::pagination_lists(array(
			'total_rs'=>$num,
			'current_page'=>$page,
			'page_size'=>'1',
			'url_prefix'=>'/zgjm/'.$id.''
		));
		tpl::assign('pageStr', $page_info);
		tpl::assign('data', $data);
		$tpl     = 'h5/zgjm_show.tpl';
		$content = tpl::fetch($tpl);
		
        exit($content);
		
	}
	
	
	
	
	/**
	 *所有文章类列表页
	 */
	public function lists(){
		
		$page = (int) req::item('page', 1);//当前页数
		$tid = (int) req::item('tid',349);
		$content      = array();
        if($this->cache_enable)
        {
            $content = cache::get($this->cache_prefix,'zgjm_list_'.$tid.'_'.$page);
        }
		$content = '';
		if(empty($content))
        {
			$pernum=$this->nums;//列表条数
			$path = mod_index::this_path($tid);
			tpl::assign('path',$path);
			$hand_type_arr = array('zgjm_hot_tag');//手动数据
			$handtype_arr = $this->items->getHandTypeId($hand_type_arr);
			$mixdata = $this->items->get_attay_hand_data($handtype_arr);
			tpl::assign('m', $mixdata);//<--END 手动数据
			$topic = mod_topic::get_topic_h5('349',$tid);
			tpl::assign('topic',$topic);
			$pageurl = 'list-'.$tid;//分页url
			$num =  $this->_count($tid);
			$list = $this->_viewlist($tid,$page,$pernum);
			tpl::assign('list',$list);
			$hot_data = mod_index::get_data('zgjm_data','',3,12);
			tpl::assign('hot_data', $hot_data);
			$page_info = util::pagination_lists(array(
				'total_rs'=>$num,
				'current_page'=>$page,
				'page_size'=>$pernum,
				'url_prefix'=>$pageurl
			));
			tpl::assign('pageStr', $page_info);
			$seo = mod_topic::seo_info($tid);
			tpl::assign('seo',$seo);
			//seo
			$tpl     = 'h5/zgjm_list.tpl';
			$content = tpl::fetch($tpl);
			if($page<5){
				cache::set($this->cache_prefix,'zgjm_list_'.$tid.'_'.$page,$content,$this->cachetime); //写缓存
			}
		}
		exit($content);
	}
	
	
	
	/****
	 *搜搜
	 */
	public function search(){
		$q = req::item('q','');
		if($q=='' || $q=='请输入梦见了什么'){
			die("<script> alert('请输入关键字');parent.location.href='http://wp.xingyunyun.cn/zgjm';</script>");
		}
		
        $t = (int)req::item('t',0);
		$tid = 349;
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		
		$hand_type_arr = array('zgjm_hot_tag');//手动数据
		$handtype_arr = $this->items->getHandTypeId($hand_type_arr);
		$mixdata = $this->items->get_attay_hand_data($handtype_arr);
		tpl::assign('m', $mixdata);//<--END 手动数据
		
		
		$topic = mod_topic::get_topic_h5($tid);
		tpl::assign('topic',$topic);
		
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		//搜索关键词过滤
        if(!$this->search_before($q)){
            header('HTTP/1.0 404 Not Found');
            header('Location: /404.html');
        }
		
		$q = strip_tags($q);
		
		$config['current_page'] = (int)req::item('page',1);
		
		/*
		if(extension_loaded('sphinx')){
            $strContent = '';
            $strContent = $this->search_sphinx($q,$t,$config['current_page']);
			
            if($strContent){
                exit($strContent);
            }else{//使用sphinx搜索 没有结果不再去数据库查询，减轻压力
                unset($rand_video);
                $content = tpl::fetch('search_404.tpl');
                exit($content);
            }
        }
		*/
		
		tpl::assign('q',$q);
		tpl::assign('t',$t);
		tpl::assign('searchhead', 1);
		$config['page_size'] = $this->nums;
		
		$_where  = empty($t) ? ' 1' : '`tid` = '.$t;
		$where = "title like '%{$q}%'";
		$offset = ($config['current_page'] - 1) * $config['page_size'];
        $order='';
		$order .= 'ORDER BY id DESC';//最新 为了提高效率
		
		$hot_data = mod_index::get_data('zgjm_data','',3,12);
		tpl::assign('hot_data', $hot_data);


        $query = db::query("SELECT id,title FROM `zgjm_data` WHERE {$_where} and {$where} {$order} LIMIT {$offset},{$config['page_size']}");
		if (!db::num_rows()){
				die("<script> alert('没有相关内容');parent.location.href='http://wp.xingyunyun.cn/zgjm';</script>");
                }else{
					
					$num=db::get_one("select count(1) as num FROM zgjm_data WHERE {$_where} and {$where}");
        			$num = isset($num['num'])?$num['num']:0;
					
					
					$pageurl = '/zgjm/sech-'.$q.'';//分页url
					
					$show_data = db::fetch_all($query);
					
					tpl::assign('data',$show_data);
					
					$page_info = util::pagination_lists(array(
					'total_rs'=>$num,
					'current_page'=>$config['current_page'],
					'page_size'=>$config['page_size'],
					'url_prefix'=>$pageurl
					));
					
					tpl::assign('pageStr',$page_info);
					
					
					/********* KDT *************/
                    $seo['title']       = $q.'解梦，关于'.$q.'的梦-八字网周公解梦';
                    $seo['keywords']    = $q;
                    $seo['description'] = '八字网为你提供【'.$q.'】周公解梦，为您提供最新最全的【'.$q.'】周公解梦梦境【'.$q.'】。解梦尽在八字网周公解梦。';
                    tpl::assign('seo',$seo);
                    /********* KDT end**********/
					
                    $tpl  = 'h5/zgjm_search.tpl';
					
                    $content = tpl::fetch($tpl);
					
					
								
		}
		
		exit($content);
	}
	
	
	
	/**
     * 
     * @param string $q
     * @return bool 没有关键词返回true 否则返回false
     */
    private function search_before($q) {
    	if(!$q)return false;
    	$arrKeywords = array();
    	$arrKeywords = cache::get(URL,'search_keywords');
    	if(!$arrKeywords){
    		if(file_exists(PATH_ROOT.'/config/inc_search_keyword.php')){
    			$arrKeywords = include_once(PATH_ROOT.'/config/inc_search_keyword.php');
    		}
    		if($arrKeywords){
    			//cache::set(URL,'search_keywords',$arrKeywords,3600);
    		}
    	}
    	if(empty($arrKeywords)){
    		return true;
    	}
    	foreach($arrKeywords as $v){
    		if(false !== stripos($q,$v)){
    			return false;
    		}
    	}
    	return true;
		
	}
	
	
	/**
     * @param integer $classid  分类id
     * @return array
     */
    private function _viewlist($tid,$page=1,$pernum=30,$ord=null) {
		
        $sql='SELECT id,title,uptime FROM zgjm_data';
        //$sql.=$this->_where($classid, $type, $year, $other);
		$sql.=' WHERE `tid`="'.$tid.'"';
		
		
		if($ord=='1'){//最热
			$sql.=' ORDER BY click DESC,uptime DESC LIMIT '.(($page-1)*$pernum).','.$pernum;
		}else{//最新
			$sql.=' ORDER BY `order` desc,uptime DESC  LIMIT '.(($page-1)*$pernum).','.$pernum;	
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
        $num=db::get_one('select count(1) as num FROM zgjm_data WHERE `tid`="'.$tid.'"');
        return isset($num['num'])?$num['num']:0;
    }
	
}