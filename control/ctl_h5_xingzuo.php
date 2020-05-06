<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 *
 * @version 2013.07.05
 */
class ctl_h5_xingzuo
{
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
    public $cache_key    = 'xingzuo/index';
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
	
	
	/***
	 *上升星座
	 */
	public function ssxz(){
		$tid = (int) req::item('tid',472);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('364',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		$m = req::item('m');
		$d = req::item('d');
		$h = req::item('h');
		$i = req::item('i');
		
		if($m==''){
			$tpl     = 'h5/xingzuo/shangsheng.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}else{
			$xingzuo = mod_xingzuo::shangsheng($m,$d,$h,$i);
			tpl::assign('data',$xingzuo);
			
			$tpl     = 'h5/xingzuo/shangsheng_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		
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
            $content = cache::get($this->cache_prefix,'xingzuo_index');
        }
		$content = '';
		if(empty($content))
        {
			$xz_yunshi_baiyang = mod_api::get_xingzuo_content(401);

			$xz_yunshi_baiyang['jintian'] = json_decode($xz_yunshi_baiyang['jintian'],true);
			$xz_yunshi_baiyang['zhou'] = json_decode($xz_yunshi_baiyang['zhou'],true);
			$xz_yunshi_baiyang['yue'] = json_decode($xz_yunshi_baiyang['yue'],true);
			$xz_yunshi_baiyang['nian'] = json_decode($xz_yunshi_baiyang['nian'],true);
			tpl::assign('xz_yunshi_baiyang',$xz_yunshi_baiyang);
			
			$tid = (int) req::item('tid',364);
			$path = mod_index::this_path($tid);
			tpl::assign('path',$path);
			
			$topic = mod_topic::get_topic_h5('364',$tid);
			tpl::assign('topic',$topic);
			$seo = mod_topic::seo_info($tid);
			tpl::assign('seo',$seo);
			//文章
			$hot_content = mod_index::get_news_data(345,2,6);
			tpl::assign('hot_content',$hot_content);
			
			$tuijian_content = mod_index::get_news_data(345,2,'6,8');
			tpl::assign('tuijian_content',$tuijian_content);
			
			for($i=1;$i<13;$i++){//星座下的十二星座
				$xingzuo_newsdata_list[$i] = mod_index::get_news_data(345,1,5,$i);
			}
			for($i=25;$i<31;$i++){//星座下的6个栏目'25'=>'星座爱情',26=>'星座性格',27=>'星座时尚',28=>'星座开运',29=>'星座知识',30=>'星座情感'
				$xingzuo_newsdata_list[$i] = mod_index::get_news_data(345,1,3,$i);
			}
			tpl::assign('xingzuo_newsdata_list',$xingzuo_newsdata_list);
			$tpl     = 'h5/xingzuo/index.tpl';
			$content = tpl::fetch($tpl);
			cache::set($this->cache_prefix,'xingzuo_index',$content,$this->cachetime); //写缓存
		}
		exit($content);
    }
	
	
	/**
	 *根据提供的月份和日期跳转星座详细页
	 */
	function m_d_xz(){
		$m = req::item('m');
		$d = req::item('d');
		$xingzuo = mod_xingzuo::get_xz($m,$d);
		$sql = 'select * from `sm_message` where t="'.$xingzuo.'"';
		$data = db::queryone($sql);
		if($data['t']){
			$sql = 'select * from `sm_class` where parentid="364" and name="'.$data['t'].'"';
			$loc = db::queryone($sql);
			if($loc['extra']){
				header("Location:".URL.$loc['extra']);
				exit;
			}
		}
	}
	
	/***
	 *按照日期查看星座
	 */
	function date_xz(){
		
		$tid = (int) req::item('tid',400);//默认白羊
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		
		$topic = mod_topic::get_topic_h5('364',$tid);
        tpl::assign('topic',$topic);
		
		$xz = req::item('xz');
		$xx = req::item('xx');
		if($xx==''){
			$sql = 'select * from `sm_message` where tid=1 and d="'.$xz.'"';
		}else{
			$sql = 'select * from `sm_message` where tid=2 and xz="'.$xz.'" and xx="'.$xx.'"';	
		}
		$data = db::queryone($sql);
		tpl::assign('data',$data);
		
		$t_tid = $tid+$xz;
		$seo['id'] = $t_tid;
		
		$XZ_ARR = array(1=>'白羊座', 2=>'金牛座', 3=>'双子座', 4=>'巨蟹座', 5=>'狮子座', 6=>'处女座', 7=>'天秤座', 8=>'天蝎座', 9=>'射手座', 10=>'摩羯座', 11=>'水瓶座', 12=>'双鱼座');
		
		$data['seo_t']==''?$data['seo_t']=$XZ_ARR[$xz].$xx.'性格分析':$data['seo_t']=$data['seo_t'];
		$data['seo_k']==''?$data['seo_k']=$XZ_ARR[$xz].$xx.'性格分析':$data['seo_k']=$data['seo_k'];
		$data['seo_d']==''?$data['seo_d']=$XZ_ARR[$xz].$xx.'性格分析':$data['seo_d']=$data['seo_d'];
		
		$seo['title'] = $data['seo_t'];
		$seo['keywords'] = $data['seo_k'];
		$seo['description'] = $data['seo_d'];
		tpl::assign('seo',$seo);
		
		
		$tpl     = 'index/xingzuo/show_test.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
		
	}
	
	
	
	
	/***
	*12星座单页
	*/
	function show(){
		$tid = (int) req::item('tid',401);//默认白羊
		$category = $tid-400;
		tpl::assign('category',$category);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('364',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		include(PATH_DATA.'/xingzuo/'.$tid.'yunshi.time.php');
		##每日运势
		$now=date('Ymd',time());

		if($cattime!=$now){
			//今日运势
			mod_xingzuo::get_yunshi($tid);
		}
		
		##end每日运势
		$data = mod_api::get_xingzuo_content($tid);
		
		$data['jintian'] = json_decode($data['jintian'],true);
		$data['mingtian'] = json_decode($data['mingtian'],true);
		
		
		$data['more'] = str_replace('<br />','',$data['more']);
		tpl::assign('data',$data);
		
		
		if($data['jintian']['img']!=''){
			$img_data[0]['url'] = '/xingzuoyunshi/'.$tid.'/'.$data['jintian']['date'];
			$img_data[0]['img'] = $data['jintian']['img'];
			$img_data[0]['title'] = $data['jintian']['shorttxt'];
			$img_data[0]['shorttxt'] = $data['jintian']['content'];
			tpl::assign('img_data',$img_data);
		}else{
			$img_data = mod_index::get_news_data(345,1,1,$category,1);
			tpl::assign('img_data',$img_data);
		}
		
		$list_data = mod_index::get_news_data(345,1,'1,6',$category);
		tpl::assign('list_data',$list_data);
		
		$hot_data = mod_index::get_news_data(345,2,6,$category);
		tpl::assign('hot_data',$hot_data);
		
		$top_3_data = mod_index::get_news_data(345,1,'7,4',$category);
		tpl::assign('top_3_data',$top_3_data);
		
		$tpl     = 'h5/xingzuo/show.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}


	function arrays(){
		$a = array('fengxing','pptv');
		$b = array('fengxing','pptv');
		echo count(array_diff($a,$b));

	}
	
	/**
	 *每日每周每月运势
	 */
	
	function page(){
		$tid = (int) req::item('tid',401);//默认白羊
		$category = $tid-400;
		tpl::assign('category',$category);
		$nid = (int) req::item('nid',1);//1今天，2明天，3本周，4本月，5本年，6爱情
		tpl::assign('nid',$nid);
		
		$path = mod_index::this_path($tid,$nid,'5');
		tpl::assign('path',$path);
		
		$topic = mod_topic::get_topic_h5('364',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		if($nid==1){
			$time_is = '今天运势';
		}elseif($nid==2){
			$time_is = '明天运势';
		}elseif($nid==3){
			$time_is = '本周运势';
		}elseif($nid==4){
			$time_is = '本月运势';
		}elseif($nid==5){
			$time_is = '年度运势';
		}elseif($nid==6){
			$time_is = '爱情运势';
		}
		$seo['title'] = ''.$seo['name'].''.$time_is.'，'.$seo['title'];
		$seo['description'] = ''.$seo['name'].''.$time_is.'，'.$seo['title'];
		tpl::assign('seo',$seo);
		
		
		$data = mod_api::get_xingzuo_content($tid);
		
		$list = mod_xingzuo::mod_xingzuo_time_yunshi($data,$nid);//根据不同时间显示星座运势内容
		$list = json_decode($list,true);
		tpl::assign('list',$list);
		
		$data['jintian'] = json_decode($data['jintian'],true);
		$data['mingtian'] = json_decode($data['mingtian'],true);
		$data['zhou'] = json_decode($data['zhou'],true);
		$data['yue'] = json_decode($data['yue'],true);
		$data['nian'] = json_decode($data['nian'],true);
		$data['love'] = json_decode($data['love'],true);
		
		$data['more'] = str_replace('<br />','',$data['more']);
		tpl::assign('data',$data);
		
		
		$hot_content = mod_index::get_news_data(345,1,'6',$category);
		tpl::assign('hot_content',$hot_content);
		
		
		$tpl     = 'h5/xingzuo/page.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *星座首页异步加载
	 */
	function ajax(){
		$tid = (int) req::item('id',1);//默认白羊
		$tid = $tid+400;
		if($tid<401 || $tid>412){
			exit('error!');
		}
		
		$data = mod_api::get_xingzuo_content($tid);
		
		$data['jintian'] = json_decode($data['jintian'],true);
		$data['mingtian'] = json_decode($data['mingtian'],true);
		$data['zhou'] = json_decode($data['zhou'],true);
		$data['yue'] = json_decode($data['yue'],true);
		$data['nian'] = json_decode($data['nian'],true);
		
		$seo = mod_topic::seo_info($tid);
		
		$div='<div class="dis">
					<h3>'.$data['title'].'今日温馨提示</h3>
					<p>'.util::cn_truncate(trim(strip_tags($data['jintian']['content'])),60).'<span class="color_blue">[<a href="/'.$seo['extra'].'today/" target="_blank">详细</a>]</span> </p>
					<h4 class="color_blue"><span>·</span>本周运势</h4>
					<p>'.util::cn_truncate(trim(strip_tags($data['zhou']['content'])),60).'<span class="color_blue">[<a href="/'.$seo['extra'].'week/" target="_blank">详细</a>]</span> </p>
					<h4 class="color_blue"><span>·</span>本月运势</h4>
					<p>'.util::cn_truncate(trim(strip_tags($data['yue']['content'])),60).'<span class="color_blue">[<a href="/'.$seo['extra'].'month/" target="_blank">详细</a>]</span> </p>
					<h4 class="color_blue"><span>·</span>年度运势</h4>
					<p>'.util::cn_truncate(trim(strip_tags($data['nian']['content'])),60).'<span class="color_blue">[<a href="/'.$seo['extra'].'year/" target="_blank">详细</a>]</span> </p>
				</div>';
		
	    echo $div;
		exit;
	}
	
	
	
	/***
	 *专区首页
	 */
	public function zhuanqu(){
		$tid = (int) req::item('tid',475);//默认白羊
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('364',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$category = array(1=>'白羊座', 2=>'金牛座', 3=>'双子座', 4=>'巨蟹座', 5=>'狮子座', 6=>'处女座', 7=>'天秤座', 8=>'天蝎座', 9=>'射手座', 10=>'摩羯座', 11=>'水瓶座', 12=>'双鱼座');
		foreach($category as $k=>$v){
			$xz_content[] = mod_index::get_news_data(345,1,'6',$k);
		}
		tpl::assign('xz_content',$xz_content);
		$tpl     = 'h5/xingzuo/zhuanqu.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
		
	} 
	
	/***
	 *运势首页
	 */
	public function yunshi(){
		
		$tid = (int) req::item('tid',476);//默认白羊
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('364',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		$date = date('Y-n-j',time());
		$category = array(401=>'白羊座', 402=>'金牛座', 403=>'双子座', 404=>'巨蟹座', 405=>'狮子座', 406=>'处女座', 407=>'天秤座', 408=>'天蝎座', 409=>'射手座', 410=>'摩羯座', 411=>'水瓶座', 412=>'双鱼座');
		foreach($category as $k=>$v){
			$xz_yunshi[$k] = mod_xingzuo::get_date_yunshi($k,$date);
			$xz_yunshi[$k]['content'] = json_decode($xz_yunshi[$k]['content'],true);
		}
		tpl::assign('xz_yunshi',$xz_yunshi);
		$tpl     = 'h5/xingzuo/yunshi.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
		
	} 
	
	
	/***
	 *提供星座和日期获取运势信息
	 */
	public function xingzuoyunshi(){
		$tid = (int) req::item('tid',401);//默认白羊
		$date = req::item('date');
		
		if(false !== stripos($date,'/')){
			$date = str_replace('/','',$date);
		}
		
		$data = mod_xingzuo::get_date_yunshi($tid,$date);
		$data['content'] = json_decode($data['content'],true);
		tpl::assign('data',$data);
		
		$seo['title'] = $data['shorttxt'];
		$seo['keywords'] = $data['title'];
		$seo['description'] = $data['des'];
		tpl::assign('seo',$seo);
		
		$category = $tid-400;
		$hot_data = mod_index::get_news_data(345,1,6,$category);
		tpl::assign('hot_data',$hot_data);
		
		
		$tpl     = 'h5/xingzuo/xingzuoyunshi.tpl';
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