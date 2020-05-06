<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * v.bazi5首页控制器
 *
 * @version 2013.07.05
 */
class ctl_news
{
	
	
	
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
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
	
	
	public function hdjrtime(){
		$sql = 'select * from `tool_hdjr` where date=1912-1-1';
		$data = db::queryone($sql);
		print_r($data);
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
            $content = cache::get($this->cache_prefix,'news_index');
        }
        if(empty($content))
        {
			$tid = (int) req::item('tid',344);
			$topic = mod_topic::get_topic('344',$tid);
			tpl::assign('topic',$topic);
			$path = mod_index::this_path($tid);
			tpl::assign('path',$path);
			
			$self_tid = mod_topic::get_selftid(344);
			
			foreach($self_tid as $k=>$v){
				$self_tid[$k]['data_list']['img'] = mod_index::get_news_data($v['id'],1,4,'',1);
				foreach($self_tid[$k]['data_list']['img'] as $ks=>$vs){
					$notid[] = $vs['id'];
				}
				$self_tid[$k]['data_list']['list'] = mod_index::get_news_data($v['id'],1,16,'','',$notid);
				unset($notid);
			}
			tpl::assign('self_tid',$self_tid);
			
			$seo = mod_topic::seo_info($tid);
			tpl::assign('seo',$seo);
			
			$tpl     = 'index/news_index.tpl';
			$content = tpl::fetch($tpl);
			cache::set($this->cache_prefix,'news_index',$content,$this->cachetime); //写缓存
		}
        exit($content);
    }
	
	
	/**
	 *所有文章类列表页
	 */
	public function lists(){
		
		$category = req::item('category',0);
		$pernum=$this->nums;//列表条数
		$page = (int) req::item('page', 1);//当前页数
		$tid = (int) req::item('tid',1);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		
		$topic = mod_topic::get_topic('344',$tid);
        tpl::assign('topic',$topic);
		
		$pageurl = '/list-'.$tid.'-'.$category;//分页url
		
		$num =  $this->_count($tid,$category);
		$list = $this->_viewlist($tid,$page,$pernum,'',$category);
		
		tpl::assign('list',$list);
		
		
		$page_info = util::pagination_lists(array(
			'total_rs'=>$num,
			'current_page'=>$page,
			'page_size'=>$pernum,
			'url_prefix'=>$pageurl
		));
		
		tpl::assign('pageStr', $page_info);
		
		$seo = mod_topic::seo_info($tid,$category);
		tpl::assign('seo',$seo);
		//seo
		
		
		
		$tpl     = 'index/news_list.tpl';
		$content = tpl::fetch($tpl);
		
		exit($content);
	}
	
	
	/***
	 *页面详细页
	 *
	 */
	
	public function show(){
		$content      = array();
		$id = (int) req::item('id', 1);//当前ID
		
		$path = mod_index::this_path('',$id,2);
		tpl::assign('path',$path);
		
		$page = (int) req::item('page',0);
		$topic = mod_topic::get_topic('344','',array('date'=>'news_data','id'=>$id));
		tpl::assign('topic',$topic);
			
		if($page==0){ $page = $page+1;}
		
		$id = (int) req::item('id', 1);//当前ID
		$data = mod_index::get_info('news_data',$id);
		
		//$seo = mod_topic::seo_info($data['tid']);
		$seo['title'] = $data['title'];
		$seo['keywords'] = $data['contentKeyword'];
		$seo['description'] = $data['shorttxt']==''?util::cn_truncate(strip_tags($data['content']),80):$data['shorttxt'];
		tpl::assign('seo',$seo);
		
		$hot_data = mod_index::get_news_data($data['tid'],2,10);
		tpl::assign('hot_data',$hot_data);
		
		
		$c = explode('_ueditor_page_break_tag_',$data['content']);
		$num = count($c);
		//内容分页
		$data['content'] = mod_index::get_pages($data['content'],$page);
		
		$page_info = util::pagination_lists(array(
			'total_rs'=>$num,
			'current_page'=>$page,
			'page_size'=>'1',
			'url_prefix'=>'/show-'.$id.''
		));
		
		tpl::assign('pageStr', $page_info);
		
		tpl::assign('data', $data);
		
		
		$tpl     = 'index/news_show.tpl';
		$content = tpl::fetch($tpl);
		
        exit($content);
		
	}
	
	
	
	/****
	 *搜搜
	 */
	public function search(){
		$q = req::item('q','');
        $t = (int)req::item('t',0);
		
		if($q=='' || $q=='请输入关键字搜索'){
			die("<script> alert('请输入关键字');parent.location.href='http://www.kaiy8.com/';</script>");
		}
		
		//搜索关键词过滤
        if(!$this->search_before($q)){
            header('HTTP/1.0 404 Not Found');
            header('Location: /404.html');
        }
		
		$q = strip_tags($q);
		
		$config['current_page'] = (int)req::item('page',1);
		
		tpl::assign('q',$q);
		tpl::assign('searchhead', 1);
		$config['page_size'] = 15;
		
		$_where  = empty($t) ? ' 1' : '`tid` = '.$t;
		$where = "title like '%{$q}%'";
		$offset = ($config['current_page'] - 1) * $config['page_size'];
        $order='';
		$order .= 'ORDER BY id DESC';//最新 为了提高效率


        $query = db::query("SELECT id,title FROM `news_data` WHERE {$_where} and {$where} {$order} LIMIT {$offset},{$config['page_size']}");
		if (!db::num_rows()){
				die("<script> alert('没有相关内容');parent.location.href='http://www.kaiy8.com/baike';</script>");
        }else{
				$num=db::get_one("select count(1) as num FROM news_data WHERE {$_where} and {$where}");
				$num = isset($num['num'])?$num['num']:0;
				
				
				$pageurl = '/baike/sech-'.$q.'';//分页url
				
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
				$seo_header['title']       = $q.'的命理知识，关于'.$q.'的百科知识-开运网';
				$seo_header['keywords']    = $q;
				$seo_header['description'] = '开运网为你提供【'.$q.'】的命理知识，为您提供最新最全的【'.$q.'】的百科知识【'.$q.'】。百科知识尽在开运网。';
				tpl::assign('seo',$seo_header);
				/********* KDT end**********/
				
				$tpl  = 'index/news_search.tpl';
				
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
    private function _viewlist($tid,$page=1,$pernum=30,$ord=null,$category=0) {
        $sql='SELECT id,title,uptime FROM news_data';
        //$sql.=$this->_where($classid, $type, $year, $other);
		$sql.=' WHERE `tid`="'.$tid.'"';
		
		if($category!=0){
			$sql .= ' and category="'.$category.'"';
		}
		if($ord=='1'){//最热
			$sql.=' ORDER BY click DESC,uptime DESC LIMIT '.(($page-1)*$pernum).','.$pernum;
		}else{//最新
			$sql.=' ORDER BY `order` desc,uptime DESC  LIMIT '.(($page-1)*$pernum).','.$pernum;	
		}
        $list=db::get_all($sql);
        
        return $list;
    }
	
	/***
	 *异步加载的js
	 */
	public function left_news(){
		
		$news_data      = array();
        if($this->cache_enable)
        {
            $news_data = cache::get($this->cache_prefix,'left_news_ajax');
        }
        if(empty($news_data))
        {
			$news_data=mod_index::get_left_news();
			cache::set($this->cache_prefix,'left_news_ajax',$news_data,$this->cachetime); //写缓存
		}
		foreach($news_data['img'] as $ks=>$vs){
			$img[] = "<a href=\"".$vs['url']."\" target=\"_blank\"><img src=\"".$vs['img']."\"><div class=\"black_gb\"><span class=\"white_font\">".$vs['title']."</span></div></a>";
		}
		
		foreach($news_data['data_list'] as $k=>$v){
			if($k<=3){
				$list1 .="<li><i class=\"i-point\"></i><a href=\"".$v['url']."\" target=\"_blank\">".$v['title']."</a></li>";
			}elseif($k>3 && $k<=7){
				$list2 .="<li><i class=\"i-point\"></i><a href=\"".$v['url']."\" target=\"_blank\">".$v['title']."</a></li>";
			}elseif($k>7 && $k<=11){
				$list3 .="<li><i class=\"i-point\"></i><a href=\"".$v['url']."\" target=\"_blank\">".$v['title']."</a></li>";
			}elseif($k>11 && $k<=15){
				$list4 .="<li><i class=\"i-point\"></i><a href=\"".$v['url']."\" target=\"_blank\">".$v['title']."</a></li>";
			}
		}
		
		echo "document.write('<div class=\"know_row\"><div class=\"block_left\"><div class=\"k_left\">".$img[0]."</div><div class=\"k_right\"><ul>".$list1."</ul></div></div><div class=\"block_right\"><div class=\"k_left\">".$img[1]."</div><div class=\"k_right\"><ul>".$list2."</ul></div></div></div><div class=\"clear_both\"></div><div class=\"know_row top_dash\"><div class=\"block_left\"><div class=\"k_left\">".$img[2]."</div><div class=\"k_right\"><ul>".$list3."</ul></div></div><div class=\"block_right\"><div class=\"k_left\">".$img[3]."</div><div class=\"k_right\"><ul>".$list4."</ul></div></div></div>');";
		exit;
	}
	
	/**
     * @param integer $classid  分类id
     * @param string $type      类别
     * @param string $year      年份    
     * @param string $other 其他筛选条件
     * @return integer
     */
    private function _count($tid,$category=0) {
		if($tid==''){
			$tid = 7;
		}
		if($category!=0){
			$where = ' and category="'.$category.'"';
		}
		
        $num=db::get_one('select count(1) as num FROM news_data WHERE `tid`="'.$tid.'"'.$where);
        return isset($num['num'])?$num['num']:0;
    }
	
	
	
	
}