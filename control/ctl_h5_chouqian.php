<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * v.bazi5首页控制器
 *
 * @version 2013.07.05
 */
class ctl_h5_chouqian
{
	
	
	
    public static $userinfo;
    public static $control;
    public $cache_enable = false;//缓存开关,调试时可设为false
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
	
	
	public function get_meiguoshenpo(){
		$daxie = array('一','二','三','四','五','六','七','八','九','十','十一','十二','十三','十四','十五','十六','十七','十八','十九','二十','二十一','二十二','二十三','二十四','二十五','二十六','二十七','二十八','二十九','三十','三十一','三十二','三十三','三十四','三十五','三十六','三十七','三十八','三十九','四十','四十一','四十二','四十三','四十四','四十五','四十六','四十七','四十八','四十九','五十','五十一','五十二','五十三','五十四','五十五','五十六','五十七','五十八','五十九','六十','六十一','六十二','六十三','六十四','六十五','六十六','六十七','六十八','六十九','七十','七十一','七十二','七十三','七十四','七十五','七十六','七十七','七十八','七十九','八十','八十一','八十二','八十三','八十四','八十五','八十六','八十七','八十八','八十九','九十','九十一','九十二','九十三','九十四','九十五','九十六');
		
		$shuzi = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87','88','89','90','91','92','93','94','95','96');
		
		
		
		
		$url = 'http://www.meiguoshenpo.com/chouqian/wanggonglingqian/';
		$c = file_get_contents($url);
		preg_match_all('/<div class=\"chouqian_cnt\">([\W\w]*?)<div class=\"clear\">/is',$c,$new);
		$cc = $new[1][0];
		
		
		preg_match_all('/<a href=\"(.*?)\"/is',$cc,$ncontent);
		
		foreach($ncontent[1] as $k=>$v){
			$info = file_get_contents($v);
			
			preg_match_all('/<h1 class=\"show_title\">王公灵签 第(.*?)签 (.*?)<\/h1>/is',$info,$title);
			
			
			
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>签文：(.*?)<\/strong>/is',$info,$qianwen);
			
			
			
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>解签<\/strong>：(.*?)<\/p>/is',$info,$jieqian);
			
			
			
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>释义<\/strong>：(.*?)<\/p>/is',$info,$shiyi);
			
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>功名<\/strong>：(.*?)<\/p>/is',$info,$jiazai);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>升迁<\/strong>：(.*?)<\/p>/is',$info,$chuxing);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>事业<\/strong>：(.*?)<\/p>/is',$info,$yinyuan);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>失物<\/strong>：(.*?)<\/p>/is',$info,$xingren);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>财利<\/strong>：(.*?)<\/p>/is',$info,$shengyu);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>疾病<\/strong>：(.*?)<\/p>/is',$info,$suzhong);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>婚姻<\/strong>：(.*?)<\/p>/is',$info,$shiye);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>行人<\/strong>：(.*?)<\/p>/is',$info,$banqian);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>田宅<\/strong>：(.*?)<\/p>/is',$info,$caiyun);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>出行<\/strong>：(.*?)<\/p>/is',$info,$cc1);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>店面<\/strong>：(.*?)<\/p>/is',$info,$cc5);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>六甲<\/strong>：(.*?)<\/p>/is',$info,$cc2);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>家运<\/strong>：(.*?)<\/p>/is',$info,$cc3);
			preg_match_all('/<p style=\"text-indent:2em;\">[\n]<strong>求谋<\/strong>：(.*?)<\/p>/is',$info,$cc4);
			
			
			$jiazai = '<strong>家宅<\/strong>：'.$jiazai[1][0].'<BR>';
			$chuxing = '<strong>出行<\/strong>：'.$chuxing[1][0].'<BR>';
			$yinyuan = '<strong>姻缘<\/strong>：'.$yinyuan[1][0].'<BR>';
			$xingren = '<strong>行人<\/strong>：'.$xingren[1][0].'<BR>';
			$shengyu = '<strong>生育<\/strong>：'.$shengyu[1][0].'<BR>';
			$suzhong = '<strong>诉讼<\/strong>：'.$suzhong[1][0].'<BR>';
			$shiye = '<strong>事业<\/strong>：'.$shiye[1][0].'<BR>';
			$banqian = '<strong>搬迁<\/strong>：'.$banqian[1][0].'<BR>';
			$caiyun = '<strong>财运<\/strong>：'.$caiyun[1][0].'<BR>';
			$caiyun .= '<strong>出行<\/strong>：'.$cc1[1][0].'<BR>';
			$caiyun .= '<strong>店面<\/strong>：'.$cc5[1][0].'<BR>';
			$caiyun .= '<strong>六甲<\/strong>：'.$cc2[1][0].'<BR>';
			$caiyun .= '<strong>家运<\/strong>：'.$cc3[1][0].'<BR>';
			$caiyun .= '<strong>求谋<\/strong>：'.$cc4[1][0].'<BR>';
			
			
			
			
			$xiangjie = $jiazai.$chuxing.$yinyuan.$xingren.$shengyu.$suzhong.$shiye.$banqian.$caiyun;
			
			
			echo $xiangjie;die;
			
			$shiyi = $shiyi[1][0];
			
			$jq =$jieqian[1][0];
			
			$qy = strip_tags($qianwen[1][0]);//签语-注意a标签
			
			$qid = str_replace($daxie,$shuzi,$title[1][0]);
			$qianming = $title[2][0];
			$tid = '474';
			
			$sql = 'select id from `sm_chouqian` where `qianming` = "'.$qianming.'"';
			$data_s = db::queryone($sql);
			if($data_s['id']==''){
				
			
			if($qianming!='' && $qid!=''){
				$sql = "INSERT INTO `sm_chouqian` (`qid`,`jie`, `qy`,`shiyi`,`xiangjie`,`qianming`,`tid`) VALUES ('".$qid."', '".$jq."', '".$qy."', '".$shiyi."','".$xiangjie."','".$qianming."','".$tid."');";
				db::query($sql);
			}
			
			}else{
				echo '已经存在';
			}
			
			
			//die;
			
			//file_put_contents('1.txt',$title[1][0].'\n',FILE_APPEND);
		}
		
		
		
	}
	
	/***
	 *
	 */
	public function get_tools_2345222(){
		//header("Content-type:text/html;charset=gbk");
		for($i=1;$i<101;$i++){
			
		$url = 'http://tools.2345.com/zhanbu/daxian/4/'.$i;
		$c = file_get_contents($url);
		preg_match_all('/<div class=\"result-con clearfix\">([\W\w]*?)<i class=\"flag_tl_t1\">/is',$c,$new);
		$c = $new[1][0];
		
		
		
		$c = iconv('GBK', 'UTF-8', $c);
		
		
		if($c==''){
			continue;
		}
		
		preg_match_all('/<\/span>签】([\w\W]*?)<\/p>/',$c,$title);
		
		$qianming = $title[1][0];
		
		preg_match_all('/<div class="img-dx">([\W\w]*?)<\/div>/',$c,$now);
		preg_match_all('/第<span>(.*?)<\/span>签/',$c,$qian);
		
		preg_match_all('/<td class=\"col-1\">([\W\w]*?)<\/td>([\W\w]*?)<td>([\W\w]*?)<\/td>/is',$c,$xiongji);
		
		
		$huangdaxian_img = (trim($now[1][0]));
		
		$a1arr = $xiongji[1];
		$a2arr = $xiongji[3];
		//echo strip_tags($a2arr[0]);
		if(strpos('http',$now[1][0])===false){
			//$img = 'http://tools.2345.com'.$now[1][0];
		}else{
			//$img = $now[1][0];
		}
		
		
		//$imgstr = util::downloadfile($img,'up_img/chouqian/22/');
		
		
		
		if(is_numeric($qian[1][0])){
			$qianunm = $qian[1][0];
		}
		//$sql = "INSERT INTO `sm_chouqian` (`qid`, `img`, `jx`,`jie`, `qy`,`shiyi`,`guren`,`qianming`,`tid`) VALUES ('".$qianunm."', '".$imgstr."','".$a2arr[0]."', '".$a2arr[1]."', '".$a2arr[2]."', '".$a2arr[3]."','".$a2arr[4]."','".$qianming."','2');";
		if($huangdaxian_img!=''){
		$sql = "UPDATE `sm_chouqian` SET `huangdaxian_img` = '".$huangdaxian_img."' WHERE `tid` = '2' and qid='".$qianunm."'";
		$ss = db::query($sql);
		if($ss){
			echo $qianunm.'ok<br>';
		}
		}
		
		
			//
		}
		
	}
	
	
	/**
	 *抽签首页
	 */
	public function index()
	{
		$tid = (int) req::item('tid',362);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$tpl     = 'h5/chouqian/index.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	/***
	 *观音灵签
	 */
	public function guanyin(){
		$tid = (int) req::item('tid',395);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);

        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,100);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='".$tid."' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
			$seo['title'] = '观音灵签：【第'.$jieqian['qid'].'签】【'.$jieqian['jx'].'】'.$jieqian['qianming'];
			$seo['description'] = '观音灵签：第'.$jieqian['qid'].'签'.$jieqian['qianming'].'，'.$jieqian['xiangjie'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
			
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
			
		}
		
		$tpl     = 'h5/chouqian/guanyin.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	
	/***
	 *车公灵签
	 */
	public function chegong(){
		$tid = (int) req::item('tid',473);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,96);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='".$tid."' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
			$seo['title'] = '车公灵签：【第'.$jieqian['qid'].'签】【'.$jieqian['jx'].'】'.$jieqian['qianming'];
			$seo['description'] = '车公灵签：第'.$jieqian['qid'].'签'.$jieqian['qianming'].'，'.$jieqian['xiangjie'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
			
		}
		
		$tpl     = 'h5/chouqian/chegong.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	
	/***
	 *王公灵签
	 */
	public function wanggong(){
		$tid = (int) req::item('tid',474);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,50);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='".$tid."' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			
			$seo['title'] = '王公灵签：【第'.$jieqian['qid'].'签】'.$jieqian['qianming'];
			$seo['description'] = '王公灵签：第'.$jieqian['qid'].'签'.$jieqian['qianming'].'，'.$jieqian['xiangjie'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
			
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
			
		}
		
		$tpl     = 'h5/chouqian/wanggong.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *吕祖
	 */
	public function lvzu(){
		$tid = (int) req::item('tid',396);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,100);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='".$tid."' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
			$seo['title'] = '吕祖灵签：【第'.$jieqian['qid'].'签】'.$jieqian['qianming'];
			$seo['description'] = '吕祖灵签：第'.$jieqian['qid'].'签'.$jieqian['qianming'].'，'.$jieqian['xiangjie'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
			
		}
		
		$tpl     = 'h5/chouqian/lvzu.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *黄大仙
	 */
	public function huangdaxian(){
		$tid = (int) req::item('tid',397);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,97);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='".$tid."' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
			$seo['title'] = '黄大仙灵签：【第'.$jieqian['qid'].'签】【'.$jieqian['jx'].'签】'.$jieqian['qianming'];
			$seo['description'] = '黄大仙灵签：第'.$jieqian['qid'].'签【'.$jieqian['jx'].'签】'.$jieqian['qianming'].'，'.$jieqian['qy'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		
		$tpl     = 'h5/chouqian/huangdaxian.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	
	/***
	 *关帝
	 */
	public function guandi(){
		$tid = (int) req::item('tid',398);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,100);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='".$tid."' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
			$seo['title'] = '关帝灵签：【第'.$jieqian['qid'].'签】【'.$jieqian['jx'].'签】'.$jieqian['qianming'];
			$seo['description'] = '关帝灵签：第'.$jieqian['qid'].'签【'.$jieqian['jx'].'签】'.$jieqian['qianming'].'，'.$jieqian['qy'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
			
		}
		
		$tpl     = 'h5/chouqian/guandi.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *天后
	 */
	public function tianhou(){
		$tid = (int) req::item('tid',399);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,60);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='".$tid."' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
			$seo['title'] = '天后灵签：【第'.$jieqian['qid'].'签】'.$jieqian['qianming'];
			$seo['description'] = '天后灵签：第'.$jieqian['qid'].'签'.$jieqian['qianming'].'，'.$jieqian['qy'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
			
		}
		
		$tpl     = 'h5/chouqian/tianhou.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	
	/***
	 *月老
	 */
	public function yuelao(){
		$tid = (int) req::item('tid',430);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$gysmile = rand(1,5);//笑呗
		tpl::assign('gysmile',$gysmile);
		if(req::item('act')=='go'){
			req::item('qid')!=''?$rand=req::item('qid'):$rand=rand(1,100);
			$clicknum=0;
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
		}
		if(req::item('act')=='jq' && req::item('qid')!=''){
			$qid=req::item('qid');
			$sql="select * from `sm_chouqian` where tid='430' and qid='".$qid."'";
			$jieqian=db::queryone($sql);
			tpl::assign('qian',$jieqian);
			tpl::assign('qid',$qid);
			
			$seo['title'] = '月老灵签：【第'.$jieqian['qid'].'签】【'.$jieqian['jx'].'签】'.$jieqian['qianming'];
			$seo['description'] = '月老灵签：第'.$jieqian['qid'].'签【'.$jieqian['jx'].'签】'.$jieqian['qianming'].'，'.$jieqian['qy'];
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
		}	
		
		if(req::item('clicknum')){
			$rand=req::item('qid');
			$picnum=rand(1,3);
			$clicknum=req::item('clicknum');
			tpl::assign('rand',$rand);
			tpl::assign('clicknum',$clicknum);
			
		}
		
		$tpl     = 'h5/chouqian/yuelao.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	/***
	 *诸葛测字
	 */
	public function zhugeliang(){
		$tid = (int) req::item('tid',400);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('362',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		
		if(req::item('name1')!=''){
			
			$hanzi=req::item('name1');
			$onehanzi=substr($hanzi,0,3);	
			$twohanzi=substr($hanzi,3,3);
			$threehanzi=substr($hanzi,6,3);
			tpl::assign('onehanzi',$onehanzi);
			tpl::assign('twohanzi',$twohanzi);
			tpl::assign('threehanzi',$threehanzi);
			
			$bihua1 = mod_xingming::get_bihua($onehanzi);
			$bihua1 = $bihua1['bihua'];
			
			$bihua2 = mod_xingming::get_bihua($twohanzi);
			$bihua2 = $bihua2['bihua'];
			
			$bihua3 = mod_xingming::get_bihua($threehanzi);
			$bihua3 = $bihua3['bihua'];
			
			$bihua=$bihua1.$bihua2.$bihua3;
			
			if($bihua>=384){
				do{
					$bihua=$bihua-384;
				}while($bihua>=384);
			}
			
			if($bihua<=9){
				$bihua='00'.$bihua;	
			}
			
			if($bihua<=99){
				$bihua='0'.$bihua;
			}
			
			$sql="select * from `sm_zhuge` where id='".$bihua."'";
			
			$rszhuge=db::queryone($sql);
			tpl::assign('rszhuge',$rszhuge);
			
			$zhugetitle=$rszhuge["title"];
			
			$zhugecontent=$rszhuge["content"];
			
			$seo['title'] = '诸葛亮测字：'.$hanzi.'，诗曰：'.$rszhuge['title'];
			$seo['description'] = '诸葛亮测字：'.$hanzi.'，诗曰：'.$rszhuge['title'].'。'.$zhugecontent;
			$seo['title'] = strip_tags($seo['title']);
			$seo['description'] = strip_tags($seo['description']);
			tpl::assign('seo',$seo);
		}
		$tpl     = 'h5/chouqian/zhugeliang.tpl';
		$content = tpl::fetch($tpl);
		exit($content);
	}
	
	
	
}