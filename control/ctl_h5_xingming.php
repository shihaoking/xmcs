<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 首页控制器
 *
 * @version 2013.07.05
 */
class ctl_h5_xingming
{
	
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
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
	 *在线其名
	 */
	public function qiming(){
		$tid = (int) req::item('tid',372);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('358',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		if(request('xing')!='' || request('xid')!='')
		{
			$pernum = 345;
			$xing = request('xing');
			$page = request('page','1');
			$sex = request('sex',0);
			$hs = request('hs',0);
			$xid = request('xid');
			$page<1?$page=1:$page=$page;
			
			if($xing!=''){
				$sql='select * from `baijia_xing` where `xing`="'.$xing.'"';
				$xing_arr=db::queryone($sql);
				
				//print_r($xing_arr);die;
				
				$xid = $xing_arr['id'];
			}elseif($xid!=''){
				$sql='select * from `baijia_xing` where `id`="'.$xid.'"';
				$xing_arr=db::queryone($sql);
				$xing = $xing_arr['xing'];
			}
			
			if($xid==''){
				echo "<script> alert('很抱歉！你的姓氏暂不在列表中');parent.location.href='/xingming/qiming/'; </script>";
				
				//header('Location: /xingming/qiming/');
				exit;
			}
			
			
			$num =  $this->_count($xid,$sex,$hs);
			if($hs=='2'){$huashu_s = '两字';}elseif($hs=='3'){$huashu_s = '三字';}
			if($sex==1){$xingbie_s = '男性';}elseif($sex==2){$xingbie_s = '女性';}

			tpl::assign('xingbie_s',$xingbie_s);
			tpl::assign('huashu_s',$huashu_s);
			tpl::assign('xing',$xing);
			
			$seo['title'] = ''.$xing.'姓在线起名，'.$xing.'姓'.$xingbie_s.$huashu_s.'在线起名，高分名字';
			$seo['description'] = ''.$xing.'姓在线起名，'.$xing.'姓'.$xingbie_s.$huashu_s.'在线起名，高分名字'.$seo['description'];
			tpl::assign('seo',$seo);
			
			
			$list = $this->_viewlist($xid,$sex,$hs,$page,$pernum);
			tpl::assign('list',$list);
			$opt_Array = array('xid'=>$xid,'xing'=>$xing,'sex'=>$sex,'hs'=>$hs,'page'=>$page);
			tpl::assign('opt_Array',$opt_Array);
			
			$pageurl = '/xingming/qiming/list-'.$xid.'-'.$sex.'-'.$hs;//分页url
			$page_info = util::pagination_lists(array(
				'total_rs'=>$num,
				'current_page'=>$page,
				'page_size'=>$pernum,
				'url_prefix'=>$pageurl
			));
			
			tpl::assign('pageStr', $page_info);
			
			$tpl     = 'h5/xingming/xingming_list.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
			
		}else{
			
			$sql='select * from `baijia_xing`';
			$xinglist=db::querylist($sql);
			//echo count($xinglist);
			tpl::assign('xinglist',$xinglist);
			$tpl     = 'h5/xingming/qiming_index.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		
	
	}
	
	
	/****
	 *定字起名
	 */
	 
	public function dzqm(){
		$tid = (int) req::item('tid',373);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('358',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		if(request('xing'))
		{
			
			$pernum = 150;
			$xing = request('xing');
			$ming=request('ming');
			$page = request('page','1');
			$dingzi = request('dingzi');
			$xid = request('xid');
			$page<1?$page=1:$page=$page;

			if($xing!=''){
				$sql='select * from `baijia_xing` where `xing`="'.$xing.'"';
				
				$xing_arr=db::queryone($sql);
				$xid = $xing_arr['id'];
			}
			
			
			
			if($xing_arr['xing']!=''){
				if($dingzi==1){$dingzi_s = '定第一个字《'.$ming.'》';}elseif($dingzi==2){$dingzi_s = '定第二个字《'.$ming.'》';}
				$seo['title'] = ''.$xing.'姓定字起名，'.$xing.'姓'.$dingzi_s.'在线起名，高分名字';
				$seo['description'] = ''.$xing.'姓定字起名，'.$xing.'姓'.$dingzi_s.'在线起名，高分名字'.$seo['description'];
				tpl::assign('seo',$seo);
				
				
				
				
				$num =  $this->dingzi_count($xing,$xid,$ming,$dingzi);
				$list = $this->dingzi_viewlist($xing,$xid,$ming,$dingzi,$page,$pernum);
				tpl::assign('list',$list);
				
				$pageurl = '/xingming/dingziqiming/list-'.$xid.'-'.$dingzi;//分页url
				$page_info = util::pagination_lists(array(
					'total_rs'=>$num,
					'current_page'=>$page,
					'page_size'=>$pernum,
					'url_prefix'=>$pageurl
				));
				
				tpl::assign('pageStr', $page_info);
				
				
			}else{
				echo "<script> alert('很抱歉！你的姓氏暂不在列表中');parent.location.href='/xingming/dzqiming/'; </script>";
				
				//header('Location: /xingming/qiming/');
				exit;
				//$notcontent='<p>你要查询的姓氏不在列表中</p>';
				//tpl::assign('notcontent',$notcontent);
			}

			$tpl     = 'h5/xingming/dzqm_list.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
			
		}
		else
		{
			$tpl     = 'h5/xingming/dzqm_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	} 
	
	
	/***
	 *姓名配对
	 */
	public function xmpd(){
		$tid = (int) req::item('tid',375);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('358',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(request('name1'))
		{
			
			$name1=req::item('name1');$name2=req::item('name2');$xing1=req::item('xing1');$xing2=req::item('xing2');$sex1=req::item('sex1');$sex2=req::item('sex2');
			////
			$tiange=0;$dige=0;$renge1=0;$renge2=0;$renge=0;$bihua1=0;$bihua2=0;$nming2="";$nxing2="";
			$nxing1=substr($name1,0,3);
			$bihua1=mod_xingming::getnumft($nxing1);
			$x1arr = array('nxing1'=>$nxing1,'bihua1'=>$bihua1,'n1py'=>mod_xingming::Pinyin_sm($nxing1,1),'n1gb'=>mod_xingming::gb_big5($nxing1),'n1wh'=>mod_xingming::getzywh($nxing1));
			tpl::assign('x1arr',$x1arr);
			
			$tiange1=$bihua1+1;
			$renge1=$bihua1;
			$bihua3=0;
			$bihua4=0;
			if ($xing1 == 2){
				$nxing2= substr($name1,3,3);
				$bihua2=mod_xingming::getnumft($nxing2);
				$tiange1=$bihua1+$bihua2;
				$renge1=$bihua2;
				$nming1=substr($name1,6,3);
				$bihua3=mod_xingming::getnumft($nming1);
				$dige1=$bihua3+1;
				$renge2=$bihua3;
					if (substr($name1,9,3) <> ""){
					$nming2= substr($name1,9,3);
					$bihua4=mod_xingming::getnumft($nming2);
					$dige1=$bihua3+$bihua4;
					}
				
				$x2arr = array('nxing2'=>$nxing2,'bihua2'=>$bihua2,'n2py'=>mod_xingming::Pinyin_sm($nxing2,1),'n2gb'=>mod_xingming::gb_big5($nxing2),'n2wh'=>mod_xingming::getzywh($nxing2));
				tpl::assign('x2arr',$x2arr);	
					
			}else{
				$nming1=substr($name1,3,3);
				$bihua3=mod_xingming::getnumft($nming1);
				$dige1=$bihua3+1;
				$renge2=$bihua3;
					if (substr($name1,6,3) <> ""){
					$nming2=substr($name1,6,3);
					$bihua4=mod_xingming::getnumft($nming2);
					$dige1=$bihua3+$bihua4;
					}
			}
			
			$m1arr = array('nming1'=>$nming1,'bihua3'=>$bihua3,'m1py'=>mod_xingming::Pinyin_sm($nming1,1),'m1gb'=>mod_xingming::gb_big5($nming1),'m1wh'=>mod_xingming::getzywh($nming1));
			tpl::assign('m1arr',$m1arr);	
			
			$zhongge1=$bihua1+$bihua2+$bihua3+$bihua4;
			$renge1+=$renge2;
			$waige1=$zhongge1-$renge1;
			if ($nxing2 == ""){
				$waige1++;
			}
			if ($nming2 =="" ){
				$waige1++;
			}
			
			//天格地格人格
			$sql="select * from `sm_81` where num=".$tiange1;
			$arr=db::queryone($sql);
			$tgjx1=$arr['jx'];
			$tgf1=mod_xingming::getpf_133($tgjx1);
			
			
			$sql="select * from `sm_81` where num=".$renge1;
			$arr=db::queryone($sql);
			$rgjx1=$arr['jx'];
			$rgf1=mod_xingming::getpf_133($rgjx1);
			
			$sql="select * from `sm_81` where num=".$dige1;
			$arr=db::queryone($sql);
			$dgjx1=$arr['jx'];
			$dgf1=mod_xingming::getpf_133($dgjx1);	
			
			//总格
			
			$sql="select * from `sm_81` where num=".$waige1;
			$arr=db::queryone($sql);
			$wgjx1=$arr['jx'];
			$wgf1=mod_xingming::getpf_133($wgjx1);
			
			$sql="select * from `sm_81` where num=".$zhongge1;
			$arr=db::queryone($sql);
			$zgjx1=$arr['jx'];
			$zgf1=mod_xingming::getpf_133($zgjx1);
			
			$sancai1=mod_xingming::getsancai_133($tiange1).mod_xingming::getsancai_133($renge1).mod_xingming::getsancai_133($dige1);
			$sql="select * from `sm_sancai` where title='".$sancai1."'";
			$arr=db::queryone($sql);
			$xg1=$arr['xg'];
			
			$tdrh_ge_arr = array('tiange1'=>$tiange1,'tgsancai'=>mod_xingming::getsancai($tiange1),'renge1'=>$renge1,'renge1_sancai133'=>mod_xingming::getsancai_133($renge1),'dige1'=>$dige1,'dige1_sancai133'=>mod_xingming::getsancai_133($dige1),'waige1'=>$waige1,'waige1_sancai133'=>mod_xingming::getsancai_133($waige1),'zhongge1'=>$zhongge1,'zhongge1_sancai133'=>mod_xingming::getsancai_133($zhongge1));
			
			tpl::assign('tdrh_ge_arr',$tdrh_ge_arr);
			
			$one_arr = array('name1'=>$name1,'sex1'=>$sex1,'xg1'=>$xg1);
			tpl::assign('one_arr',$one_arr);
			
			//one-end
			
			//two--go
			
			$ntiange=0;$ndige=0;$nrenge1=0;$nrenge2=0;$nrenge=0;$nbihua1=0;$nbihua2=0;$n2xing2="";$n2ming2="";
			$n2xing1=substr($name2,0,3);
			$nbihua1=mod_xingming::getnumft($n2xing1);
			
			
			
			$ntiange1=$nbihua1+1;
			$nrenge1=$nbihua1;
			$nbihua3=0;
			$nbihua4=0;
			if($xing2 == "2"){
				$n2xing2=substr($name2,3,3);
				$nbihua2=mod_xingming::getnumft($n2xing2);
				$ntiange1=$nbihua1+$nbihua2;
				$nrenge1=$nbihua2;
				$n2ming1=substr($name2,6,3);
				$nbihua3=mod_xingming::getnumft($n2ming1);
				$ndige1=$nbihua3+1;
				$nrenge2=$nbihua3;
					if(substr($name2,9,3) <> ""){
					$n2ming2 =substr($name2,9,3);
					$nbihua4=mod_xingming::getnumft($n2ming2);
					$ndige1=$nbihua3+$nbihua4;
					}
			}else{
				$n2ming1=substr($name2,3,3);
				$nbihua3=mod_xingming::getnumft($n2ming1);
				$ndige1=$nbihua3+1;
				$ndigee1=$nbihua3+1;
				$nrenge2=$nbihua3;
				$nrengee2=$nbihua3;
					if (substr($name2,6,3) <> ""){
					$n2ming2 =substr($name2,6,3);
					 $nbihua4=mod_xingming::getnumft($n2ming2);
					$ndige1=$nbihua3+$nbihua4;
					}
			}
			
			$m2arr = array('nming2'=>$nming2,'bihua4'=>$bihua4,'m2py'=>mod_xingming::Pinyin_sm($nming2,1),'m2gb'=>mod_xingming::gb_big5($nming2),'m2wh'=>mod_xingming::getzywh($nming2));
			tpl::assign('m2arr',$m2arr);	
			
			$nzhongge1=$nbihua1+$nbihua2+$nbihua3+$nbihua4;
			$nrenge1=$nrenge1+$nrenge2;
			$nwaige1=$nzhongge1-$nrenge1;
			if($n2xing2 == ""){
				$nwaige1++;
			}
			if($n2ming2 == ""){
				$nwaige1++;
			}
			
			$n2x2arr = array('n2xing2'=>$n2xing2,'nbihua2'=>$nbihua2,'n2x2py'=>mod_xingming::Pinyin_sm($n2xing2,1),'n2x2gb'=>mod_xingming::gb_big5($n2xing2),'n2x2wh'=>mod_xingming::getzywh($n2xing2));
			tpl::assign('n2x2arr',$n2x2arr);
				
			//two 天个人各地各	
			$sql="select * from `sm_81` where num=".$ntiange1;
			$arr=db::queryone($sql);
			$tgjx=$arr['jx'];
			$tgf2=mod_xingming::getpf_133($tgjx);	
			
			$sql="select * from `sm_81` where num=".$nrenge1;
			$arr=db::queryone($sql);
			$rgjx=$arr['jx'];
			$rgf2=mod_xingming::getpf_133($rgjx); 
			
			$sql="select * from `sm_81` where num=".$ndige1;
			$arr=db::queryone($sql);
			$dgjx=$arr['jx'];
			$dgf2=mod_xingming::getpf_133($dgjx); 
			
			$sql="select * from `sm_81` where num=".$nwaige1;
			$arr=db::queryone($sql);
			$wgjx=$arr['jx'];
			$wgf2=mod_xingming::getpf_133($wgjx); 
			
			
			$sql="select * from `sm_81` where num=".$nzhongge1;
			$arr=db::queryone($sql);
			$zgjx=$arr['jx'];
			$zgf2=mod_xingming::getpf_133($zgjx); 
			$nsancai1=mod_xingming::getsancai_133($ntiange1).mod_xingming::getsancai_133($nrenge1).mod_xingming::getsancai_133($ndige1);
			$sql="select * from `sm_sancai` where title='".$nsancai1."'";
			$arrxx=db::queryone($sql);
			$xg1xx=$arrxx['xg'];
				
			//配对分数
			$n1=abs($rgf1-$rgf2);
			$n2=abs($dgf1-$dgf2);
			$n3=abs($zgf1-$zgf2);
			$n4=abs($tgf1-$tgf2);
			$n5=abs($wgf1-$wgf2);
			$zf=($n1+$n2+$n3)+($n4+$n5)/5;
			$zf=round(100-$zf);	
			////
			
			$n2x1arr = array('n2xing1'=>$n2xing1,'nbihua1'=>$nbihua1,'n2x1py'=>mod_xingming::Pinyin_sm($n2xing1,1),'n2x1gb'=>mod_xingming::gb_big5($n2xing1),'n2x1wh'=>mod_xingming::getzywh($n2xing1));
			tpl::assign('n2x1arr',$n2x1arr);
			
			$n2m1arr = array('n2ming1'=>$n2ming1,'nbihua3'=>$nbihua3,'n2m1py'=>mod_xingming::Pinyin_sm($n2ming1,1),'n2m1gb'=>mod_xingming::gb_big5($n2ming1),'n2m1wh'=>mod_xingming::getzywh($n2ming1));
			tpl::assign('n2m1arr',$n2m1arr);	
			
			$n2m2arr = array('n2ming2'=>$n2ming2,'nbihua4'=>$nbihua4,'n2m2py'=>mod_xingming::Pinyin_sm($n2ming2,1),'n2m2gb'=>mod_xingming::gb_big5($n2ming2),'n2m2wh'=>mod_xingming::getzywh($n2ming2));
			tpl::assign('n2m2arr',$n2m2arr);	
			
			$tdrh2_ge_arr = array('ntiange1'=>$ntiange1,'tg2sancai'=>mod_xingming::getsancai($ntiange1),'nrenge1'=>$nrenge1,'nrenge1_sancai133'=>mod_xingming::getsancai_133($nrenge1),'ndige1'=>$ndige1,'ndige1_sancai133'=>mod_xingming::getsancai_133($ndige1),'nwaige1'=>$nwaige1,'nwaige1_sancai133'=>mod_xingming::getsancai_133($nwaige1),'nzhongge1'=>$nzhongge1,'nzhongge1_sancai133'=>mod_xingming::getsancai_133($nzhongge1));
			tpl::assign('tdrh2_ge_arr',$tdrh2_ge_arr);
			
			$two_arr = array('name2'=>$name2,'sex2'=>$sex2,'xg1xx'=>$xg1xx,'zf'=>$zf);
			tpl::assign('two_arr',$two_arr);
			
			$tpl     = 'h5/xingming/xmpd_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
			
		}
		else
		{
			$tpl     = 'h5/xingming/xmpd_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	/**
	 *公司起名
	 */
	public function gsqm(){
		$tid = (int) req::item('tid',374);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('358',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		if(request('name',''))
		{
			
			$ming = req::item('name');
			
			if(strpos($ming,'/')!=false){
				$ming = str_replace('/','',$ming);
			}
			tpl::assign('ming',$ming);
			
			$a1 = substr($ming,0,3);
			$a2 = substr($ming,3,3);
			$a3 = substr($ming,6,3);
			$a4 = substr($ming,9,3);
			$a5 = substr($ming,12,3);
			$a6 = substr($ming,15,3);
			
			
			if($a1!=''){
				$whbharr = mod_xingming::get_bihua($a1);
				$bihua1 = $whbharr['bihua'];
				$hzwh1 = $whbharr['hzwh'];
				
				$a1py = mod_xingming::Pinyin_sm($a1,1);
				$a1gb = mod_xingming::gb_big5($a1);
				$a1arr = array('a1'=>$a1,'a1py'=>$a1py,'a1gb'=>$a1gb,'hzwh1'=>$hzwh1,'bihua1'=>$bihua1);
				tpl::assign('a1arr',$a1arr);
			}
			
			if($a2!=''){
				$whbharr2 = mod_xingming::get_bihua($a2);
				$bihua2 = $whbharr2['bihua'];
				$hzwh2 = $whbharr2['hzwh'];
				
				$a2py = mod_xingming::Pinyin_sm($a2,1);
				$a2gb = mod_xingming::gb_big5($a2);
				$a2arr = array('a2'=>$a2,'a2py'=>$a2py,'a2gb'=>$a2gb,'hzwh2'=>$hzwh2,'bihua2'=>$bihua2);
				tpl::assign('a2arr',$a2arr);
			}
			
			if($a3!=''){
				$whbharr3 = mod_xingming::get_bihua($a3);
				$bihua3 = $whbharr3['bihua'];
				$hzwh3 = $whbharr3['hzwh'];
				
				$a3py = mod_xingming::Pinyin_sm($a3,1);
				$a3gb = mod_xingming::gb_big5($a3);
				$a3arr = array('a3'=>$a3,'a3py'=>$a3py,'a3gb'=>$a3gb,'hzwh3'=>$hzwh3,'bihua3'=>$bihua3);
				tpl::assign('a3arr',$a3arr);
			}
			
			if($a4!=''){
				$whbharr4 = mod_xingming::get_bihua($a4);
				$bihua4 = $whbharr4['bihua'];
				$hzwh4 = $whbharr4['hzwh'];
				
				$a4py = mod_xingming::Pinyin_sm($a4,1);
				$a4gb = mod_xingming::gb_big5($a4);
				$a4arr = array('a4'=>$a4,'a4py'=>$a4py,'a4gb'=>$a4gb,'hzwh4'=>$hzwh4,'bihua4'=>$bihua4);
				tpl::assign('a4arr',$a4arr);
			}
			
			if($a5!=''){
				$whbharr5 = mod_xingming::get_bihua($a5);
				$bihua5 = $whbharr5['bihua'];
				$hzwh5 = $whbharr5['hzwh'];
				
				$a5py = mod_xingming::Pinyin_sm($a5,1);
				$a5Gb = mod_xingming::gb_big5($a5);
				$a5arr = array('a5'=>$a5,'a5py'=>$a5py,'a5Gb'=>$a5Gb,'hzwh5'=>$hzwh5,'bihua5'=>$bihua5);
				tpl::assign('a5arr',$a5arr);
			}
			
			if($a6!=''){
				
				
				$whbharr6 = mod_xingming::get_bihua($a6);
				$bihua6 = $whbharr6['bihua'];
				$hzwh6 = $whbharr6['hzwh'];
				
				$a6py = mod_xingming::Pinyin_sm($a6,1);
				$a6gb = mod_xingming::gb_big5($a6);
				$a6arr = array('a6'=>$a6,'a6py'=>$a6py,'a6gb'=>$a6gb,'hzwh6'=>$hzwh6,'bihua6'=>$bihua6);
				tpl::assign('a6arr',$a6arr);
				
			}
			
			
			
			$allbihua=$bihua1+$bihua2+$bihua3+$bihua4+$bihua5+$bihua6;
			tpl::assign('allbihua',$allbihua);
			if($allbihua>82){
				$allbihua=$allbihua-81;
			}
		
			$sql="select * from `sm_company` where num='".$allbihua."'";
			$company=db::queryone($sql);
			tpl::assign('company',$company);
			$tpl     = 'h5/xingming/gsqm_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/xingming/gsqm_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		
	}
	
	/***
	 *姓名分析
	 */
	public function xmfx(){
		$tid = (int) req::item('tid',371);
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		$topic = mod_topic::get_topic_h5('358',$tid);
        tpl::assign('topic',$topic);
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
		$name = req::item('name');//直接提供名字get_url地址
		
		if(request('dosubmit','') || $name)
		{	
			if($name!=''){
				$name = str_replace('/','',$name);
				$xing=substr($name,0,3);
				$ming=substr($name,3,9);
			}else{
				$xing = req::item('xing');
				$ming = req::item('ming');
			}
			
			$xing1=substr($xing,0,3);	
			$ming1=substr($ming,0,3);
			
			$wh_bh_arr = mod_xingming::get_bihua($xing1);
			
			$bihua1 = $wh_bh_arr['bihua'];
			$hzwh1 = $wh_bh_arr['hzwh'];
			$tiange=$bihua1+1;
			$tiangee=$bihua1+1;
			$renge1=$bihua1;
			
			
			$xing2=substr($xing,3,3);
			if($xing2!=''){
				$wh_bh_arr2 = mod_xingming::get_bihua($xing2);
				$bihua2 = $wh_bh_arr2['bihua'];
				$hzwh2 = $wh_bh_arr2['hzwh'];
				$xing22=$xing2;
				$tiange=$bihua1+$bihua2;
				$tiangee=$bihua1+$bihua2;
				$renge1=$bihua2; 
				
				$xing2py = mod_xingming::Pinyin_sm($xing2,1);
				$xing2gb = mod_xingming::gb_big5($xing2);
			}
			
			
			$ming_wh_bh_arr = mod_xingming::get_bihua($ming1);
			$bihua3 = $ming_wh_bh_arr['bihua'];
			$hzwh3 = $ming_wh_bh_arr['hzwh'];
			$dige=$bihua3+1;
			$digee=$bihua3+1;
			$renge2=$bihua3;
			
			
			$ming2=substr($ming,3,3);
			if($ming2!=''){
				$ming_wh_bh_arr2 = mod_xingming::get_bihua($ming2);
				$bihua4 = $ming_wh_bh_arr2['bihua'];
				$hzwh4 = $ming_wh_bh_arr2['hzwh'];
				
				$dige=$bihua3+$bihua4;
				$digee=$bihua3+$bihua4;
				
				$ming2py = mod_xingming::Pinyin_sm($ming2,1);
				$ming2gb = mod_xingming::gb_big5($ming2);
			}
			
			//gb_big5
			$xm_arr = array('xing1'=>$xing1,'xing1py'=>mod_xingming::Pinyin_sm($xing1,1),'xing1gb'=>mod_xingming::gb_big5($xing1),'xing2'=>$xing2,'xing2py'=>$xing2py,'xing2gb'=>$xing2gb,'ming1'=>$ming1,'ming1py'=>mod_xingming::Pinyin_sm($ming1,1),'ming1gb'=>mod_xingming::gb_big5($ming1),'ming2'=>$ming2,'ming2py'=>$ming2py,'ming2gb'=>$ming2gb);
			tpl::assign('xm_arr',$xm_arr);
			$bh_wh_arr = array('bihua1'=>$bihua1,'bihua2'=>$bihua2,'bihua3'=>$bihua3,'bihua4'=>$bihua4,'hzwh1'=>$hzwh1,'hzwh2'=>$hzwh2,'hzwh3'=>$hzwh3,'hzwh4'=>$hzwh4);
			tpl::assign('bh_wh_arr',$bh_wh_arr);
			
			
			$zhongge=$bihua1+$bihua2+$bihua3+$bihua4;
			$zhonggee=$bihua1+$bihua2+$bihua3+$bihua4;
			//计算三才
			$renge=$renge1+$renge2;
			$rengee=$renge1+$renge2;
			$waige=$zhongge-$renge;
			$waigee=$zhonggee-$rengee;
			if($xing2==''){
				$waige=$waige+1;
				$waigee=$waigee+1;
			}
			if($ming2==''){
				$waige=$waige+1;
				$waigee=$waigee+1;
			}
			
			//天格	$bihua1=db::queryone($sql);	

			$sql="select * from `sm_81` where num='".$tiangee."'";
			$tiangearr=db::queryone($sql);
			$tiangearr['tiangee'] = $tiangee;
			tpl::assign('tiangearr',$tiangearr);
			
			
			//人格	$bihua1=db::queryone($sql);
			$sql="select * from `sm_81` where num='".$rengee."'";
			$rengearr=db::queryone($sql);
			$rengearr['rengee'] = $rengee;
			tpl::assign('rengearr',$rengearr);
			
			//地格	$bihua1=db::queryone($sql);
			$sql="select * from `sm_81` where num='".$digee."'";
			$digearr=db::queryone($sql);
			$digearr['digee'] = $digee;
			tpl::assign('digearr',$digearr);
			
			//外格	$bihua1=db::queryone($sql);
			$sql="select * from `sm_81` where num='".$waigee."'";
			$waigearr=db::queryone($sql);
			$waigearr['waigee'] = $waigee;
			tpl::assign('waigearr',$waigearr);
			
			//总格	$bihua1=db::queryone($sql);
			$sql="select * from `sm_81` where num='".$zhongge."'";
			$zonggearr=db::queryone($sql);
			//$zonggearr['waigee'] = $zonggee;
			//tpl::assign('zonggearr',$zonggearr);
			
			
			
			
			
			$tian_sancai = mod_xingming::getsancai($tiange);
			$ren_sancai = mod_xingming::getsancai($renge);
			$di_sancai = mod_xingming::getsancai($dige);
			//三才吉凶
			$sancai=$tian_sancai.$ren_sancai.$di_sancai;
			$sqlsancai="select * from `sm_sancai` where `title`='".$sancai."'";
			$rssancai=db::queryone($sqlsancai);
			$rssancai['sancai'] = $sancai;
			tpl::assign('rssancai',$rssancai);
			
			$tdr_ge = array('renge'=>$renge,'tiange'=>$tiange,'dige'=>$dige,'tian_sancai'=>$tian_sancai,'ren_sancai'=>$ren_sancai,'di_sancai'=>$di_sancai,'waige'=>$waige,'waige_sancai'=>mod_xingming::getsancai($waige),'zhongge'=>$zhongge,'zongge_sancai'=>mod_xingming::getsancai($zongge));
			tpl::assign('tdr_ge',$tdr_ge);
			
			$xmdf=mod_xingming::getpf($tiangearr['jx'])/10+mod_xingming::getpf($rengearr['jx'])+mod_xingming::getpf($digearr['jx'])+mod_xingming::getpf($zonggearr['jx'])+mod_xingming::getpf($waigearr['jx'])/10+mod_xingming::getpf($rssancai['jx'])/4+mod_xingming::getpf($rssancai['jx1'])/4+mod_xingming::getpf($rssancai['jx2'])/4+mod_xingming::getpf($rssancai['jx3'])/4;
			if($zhonggee>60){
				  $xmdf=$xmdf-4;
			}
			$xmdf=58+$xmdf;
			tpl::assign('xmdf',$xmdf);
			
			$seo['title'] = ''.$name.'名字五格算命，'.$name.'测姓名打分，'.$name.'姓名好不好';
			$seo['keywords'] = $data['contentKeyword'];
			$seo['description'] = ''.$name.'名字五格算命，'.$name.'测姓名打分，'.$name.'姓名好不好，姓名分析，姓名算命，姓名测试爱情，姓名测试命运，姓名分析';
			tpl::assign('seo',$seo);
			
			$tpl     = 'h5/xingming/xmfx_find.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
		else
		{
			$tpl     = 'h5/xingming/xmfx_form.tpl';
			$content = tpl::fetch($tpl);
			exit($content);
		}
	}
	
	
	/**
     * @param integer $classid  分类id
     * @return array
     */
    private function _viewlist($xid,$sex,$hs,$page=1,$pernum=30,$ord=null) {
		
		
		if($xid){
			$wxid = '`xid`="'.$xid.'"';
		}else{
			$wxid = '1=1';
		}
		
		if($sex!='0'){
			if($sex=='1'){$wsex=' and sex="0"';}elseif($sex=='2'){$wsex=' and sex="1"';}
		}
		
		if($hs!='0'){
			if($hs=='2'){$hsx=' and geshu="2"';}elseif($hs=='3'){$hsx=' and geshu="3"';}
		}
			
		$sql='select * from `baijia_ming` where '.$wxid.$wsex.$hsx.' ORDER BY id DESC limit '.(($page-1)*$pernum).','.$pernum;
		
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
    private function _count($xid,$sex,$hs) {
		
		if($xid){
			$wxid = '`xid`="'.$xid.'"';
		}else{
			$wxid = '1=1';
		}
		
		if($sex!='0'){
			if($sex=='1'){$wsex=' and sex="0"';}elseif($sex=='2'){$wsex=' and sex="1"';}
		}
		
		if($hs!='0'){
			if($hs=='2'){$hsx=' and geshu="2"';}elseif($hs=='3'){$hsx=' and geshu="3"';}
		}
		
        $num=db::get_one('select count(1) as num FROM baijia_ming WHERE '.$wxid.$wsex.$hsx);
        return isset($num['num'])?$num['num']:0;
    }
	
	
	
	/**
     * @param integer $classid  分类id
     * @return array
     */
    private function dingzi_viewlist($xing,$xid,$ming,$dingzi,$page=1,$pernum=30,$ord=null) {
		
		if($dingzi==1){
			$sql='select * from `baijia_ming` where xid="'.$xid.'" and geshu=3 and name LIKE "'.$xing.$ming.'%" limit '.(($page-1)*$pernum).','.$pernum;
		}elseif($dingzi==2){
			$sql='select * from `baijia_ming` where xid="'.$xid.'" and geshu=3 and name LIKE "'.$xing.'%'.$ming.'" limit '.(($page-1)*$pernum).','.$pernum;
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
    private function dingzi_count($xing,$xid,$ming,$dingzi) {
		
		if($dingzi==1){
			$sql = "SELECT count(1) as num FROM `baijia_ming` WHERE `name` LIKE '".$xing.$ming."%'";
		}elseif($dingzi==2){
			$sql = "SELECT count(1) as num FROM `baijia_ming` WHERE `name` LIKE '".$xing."%".$ming."'";
		}
		
        $num=db::get_one($sql);
        return isset($num['num'])?$num['num']:0;
    }
	
	
	
	
}