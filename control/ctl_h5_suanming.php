<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 算命控制器
 *
 * @version 2013.07.05
 */
class ctl_h5_suanming
{
	
    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
    public $cache_key    = 'suanming/index';

    public function __construct()
    {
		if (empty($this->items))
        {
            $this->items = new items();
        }
		
		tpl::assign('web_url',URL);
		
		$pid = mod_topic::get_p_id();//获取一级栏目
		tpl::assign('pid',$pid);
		
		$topic_arr = mod_topic::get_topic_arr(357);
		
		unset($topic_arr[5]);
		
		tpl::assign('topic_arr',$topic_arr);
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
	
	
	public function sss(){
		echo util::get_cururl();
	}
	
	public function clearcache(){
		session_start();
		unset($_SESSION['yourss']);
		self::sm_form();
	}
	

    /**
     * 获取所有算命的表单
     *  分配->(生辰八字,日干论命,称骨论命,三世财运,八字测算,风水测算)
     */
    public function sm_form(){
        session_start();
        $base = req::item('base',365);
		tpl::assign('tid',$base);
        $xing = req::item('xing');
		$path = mod_index::this_path($base);
		tpl::assign('path',$path);
		
		//echo $base;
		$topic = mod_topic::get_topic_h5('357',$base);
        tpl::assign('topic',$topic);
		
		$seo = mod_topic::seo_info($base);
		tpl::assign('seo',$seo);

        if($xing=='' && empty($_SESSION['yourss'])){
            $ztlist = mod_index::get_data('zgjm_data','',3,16);
            $arr = mod_topic::sm_opt($base);
            tpl::assign('arr',$arr);
            tpl::assign('ztlist',$ztlist);
            $tpl     = 'h5/suanming/suanming_form.tpl';
            $content = tpl::fetch($tpl);
            exit($content);
        }else{
            if($_SESSION['yourss']==''){
                $ming = req::item('name');
				
				if($ming=='请输入名' || $xing=='请输入姓'){
						die("<script> alert('姓名没有填写！');parent.location.href='http://wp.xingyunyun.cn/suanming/scbz/';</script>");
						header('Location: http://wp.xingyunyun.cn/suanming/scbz/');
						die;
				}
				
                $sex = req::item('sex');
                $y = req::item('y');
                $m = req::item('m');
                $d = req::item('d');
                $h = req::item('h');
                $i = req::item('i');
                $cY = req::item('cY');
                $cM = req::item('cM');
                $cD = req::item('cD');
                $cH = req::item('cH');
                $term1 = req::item('term1');
                $term2 = req::item('term2');
                $start_term = req::item('start_term');
                $end_term = req::item('end_term');
                $start_term1 = req::item('start_term1');
                $end_term1 = req::item('end_term1');
                $lDate = req::item('lDate');
                //旧历转新历
                /*
                $nongli = new cls_nongli();
                $xinli = $nongli->convertLunarToSolar($y,$m,$d);
                $y = $xinli[0];  $m = $xinli[1];  $d = $xinli[2];
                */

                $cookies = mod_wuhangbazi::get_bzwh($xing,$ming,$sex,$y,$m,$d,$h,$i,$cY,$cM,$cD,$cH,$term1,$term2,$start_term,$end_term,$start_term1,$end_term1,$lDate);
				
                $_SESSION['yourss']=serialize($cookies);

            }else{
                $cookies = unserialize($_SESSION['yourss']);
            }
			
			
			
            if($base==365){
                self::suanming($cookies);
            }
            elseif($base==367){
                self::cg($cookies);
            }
            elseif($base==366){
                self::rglm($cookies);
            }
            elseif($base==368){
                self::bzsm($cookies);
            }
            elseif($base==369){
                self::bzcs($cookies);
            }else{
				//self::index();
			}


        }

    }

    /*
     * 风水测算
     */
    public function fscs(){
		$tid=req::item('tid','370');
		$path = mod_index::this_path($tid);
		tpl::assign('path',$path);
		
		$topic = mod_topic::get_topic_h5('357',$tid);
        tpl::assign('topic',$topic);
		
		$seo = mod_topic::seo_info($tid);
		tpl::assign('seo',$seo);
		
        $xb=req::item('xb');
        $nianfen=req::item('nianfen');
        $chaoxiang=req::item('chaoxiang');
        if(is_numeric($xb)){

            if($xb=='1'){ $xb='男';}else{ $xb='女';}
            $chaoxiangArray = array('西北','西','南','东','东南','北','东北','西南');
            $chaoxiang = $chaoxiangArray[$chaoxiang];

            if($xb!='0' && $chaoxiang!='0' && $nianfen!='0'){

                $sql="select * from `sm_fengshui` where xingbie='".$xb."' and nianfen='".$nianfen."' and chaoxiang='".$chaoxiang."'";

                $haomajx=db::queryone($sql);
                tpl::assign('haomajx',$haomajx);
                $tpl     = 'h5/suanming/fengshui_find.tpl';
                $content = tpl::fetch($tpl);
                exit($content);
            }else{
                $strText='请把信息填写完成';
                echo '<script language="javascript">alert("'.$strText.'");location.href="/fengshui.php"</script>';
                exit();

            }
        }else{
            $tpl     = 'h5/suanming/fengshui_form.tpl';
            $content = tpl::fetch($tpl);
            exit($content);

        }
    }

    /*
     * 八字测算
     */
    private static function bzcs($cookies){
        include PATH_DATA.'/file_cache/bzcs.data.php';
        tpl::assign('cookies',$cookies);
        tpl::assign('sexqk',$sexqk);
        tpl::assign('dayun',$dayun);
        tpl::assign('xgfx',$xgfx);
        tpl::assign('mzjp',$mzjp);
        $tpl     = 'h5/suanming/bzcs.tpl';
        $content = tpl::fetch($tpl);
        exit($content);
    }
    /***
     * @param $cookies
     * 三生财运
     */
    private static function bzsm($cookies){
        include PATH_DATA.'/file_cache/bzsm.data.php';
        tpl::assign('dayundate',$dayundate);
        tpl::assign('dr_ss',$dr_ss);
        tpl::assign('dr_gz',$dr_gz);
        tpl::assign('nnnn',$nnnn);
        tpl::assign('dr_y',$dr_y);
        tpl::assign('myq_text',$myq_text);
        tpl::assign('dr_ss',$dr_ss);
        tpl::assign('wh123',$wh123);

        $tpl     = 'h5/suanming/bzsm.tpl';
        $content = tpl::fetch($tpl);
        exit($content);
    }



    /***
     * 日干论命
     */

    private static function rglm($cookies){
        $info = self::public_sm($cookies);
        tpl::assign('jmsh',$info['jmsh']);
        tpl::assign('wharr',$info['wharr']);
        tpl::assign('tywh',$info['tywh']);
        tpl::assign('nayin',$info['nayin']);
        tpl::assign('sxgx',$info['sxgx']);

        $sql="select * from `sm_rgnm` where rgz='".$cookies['bazi'][4].$cookies['bazi'][5]."'";
        $rglm=db::queryone($sql);
        tpl::assign('rglm',$rglm);

        tpl::assign('cookies',$cookies);
        $tpl     = 'h5/suanming/rglm.tpl';
        $content = tpl::fetch($tpl);
        exit($content);
    }

    /***
     * @param $cookies
     * 称骨论命
     */
    private static function cg($cookies){

        $sql='select * from `sm_chenggu1` where year="'.$cookies['nianling']['y'].'"';

        $gu['y1']=db::queryone($sql);

        $sql='select * from `sm_chenggu2` where month="'.$cookies['jiuli']['m'].'"';

        $gu['m1']=db::queryone($sql);

        $sql='select * from `sm_chenggu3` where day="'.$cookies['jiuli']['d'].'"';

        $gu['d1']=db::queryone($sql);

        $sql='select * from `sm_chenggu4` where time="'.$cookies['nianling']['h'].'"';

        $gu['h1']=db::queryone($sql);

        $guall=$gu['y1']['weight']+$gu['m1']['weight']+$gu['d1']['weight']+$gu['h1']['weight'];//称骨完成

        $gu['all10']=$guall*10;

        $sql='select * from `sm_chenggu` where weight="'.$gu["all10"].'"';//解答

        $gu['info']=db::queryone($sql);

        tpl::assign('gu',$gu);

        tpl::assign('cookies',$cookies);
        $tpl     = 'h5/suanming/cg.tpl';
        $content = tpl::fetch($tpl);
        exit($content);
    }


    /***
     * 八字算命
     */

    private static function suanming($cookies){
        $info = self::public_sm($cookies);

        tpl::assign('jmsh',$info['jmsh']);
        tpl::assign('wharr',$info['wharr']);
        tpl::assign('tywh',$info['tywh']);
        tpl::assign('nayin',$info['nayin']);
        tpl::assign('sxgx',$info['sxgx']);

        $sxarr = array('鼠','牛','虎','兔','龙','蛇','马','羊','猴','鸡','狗','猪');
        $arrkey = array_search($cookies['sx'],$sxarr);
        $arrkey = $arrkey+48;
        $sqlsx='select * from `sm_sxyc_taoke` where tid = "'.$arrkey.'"';
        $sxjj=db::queryone($sqlsx);
        tpl::assign('sxjj',$sxjj);



        //四季用神参考
        $ganzhi=new cls_ganzhi();

        $sql='select * from `sm_sjrs` where wh="'.$cookies['wh'][4].'" and sj="'.$ganzhi->siji($cookies["nianling"]["m"]).'"';
        $sjrs=db::queryone($sql);
        tpl::assign('sjrs',$sjrs);


        //穷通宝鉴
        $sql='select * from `sm_qtbj` where tg="'.$cookies['bazi'][4].'" and dz="'.$cookies['bazi'][3].'"';
        $qtbj=db::queryone($sql);
        tpl::assign('qtbj',$qtbj);



        //日干心性
        $sql="select * from `sm_rgnm` where rgz='".$cookies['bazi'][4].$cookies['bazi'][5]."'";
        $rgxx=db::queryone($sql);
        tpl::assign('rgxx',$rgxx);

        //三命通会
        $sql="select * from `sm_smtf` where ri='".$cookies['bazi'][4].$cookies['bazi'][5]."' and shi='".$cookies['bazi'][6].$cookies['bazi'][7]."'";
        $sxth=db::queryone($sql);
        tpl::assign('sxth',$sxth);

        //月日时命理
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['m']."月'";
        $ml['yml']=db::queryone($sql);
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['d']."日'";
        $ml['rml']=db::queryone($sql);
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['h']."时'";
        $ml['sml']=db::queryone($sql);
        tpl::assign('ml',$ml);

        tpl::assign('cookies',$cookies);
        $tpl     = 'h5/suanming/sm.tpl';
        $content = tpl::fetch($tpl);
        exit($content);

    }


    /*
     * 获取公共算命部分
     */
    private static function public_sm($cookies){
        $jmsh['jin'] = mod_suanming::howstring($cookies['wh'],'金');
        $jmsh['mu'] = mod_suanming::howstring($cookies['wh'],'木');
        $jmsh['shui'] = mod_suanming::howstring($cookies['wh'],'水');
        $jmsh['huo'] = mod_suanming::howstring($cookies['wh'],'火');
        $jmsh['tu'] = mod_suanming::howstring($cookies['wh'],'土');


        $wharr = mod_suanming::whwq($jmsh['jin'],$jmsh['mu'],$jmsh['shui'],$jmsh['huo'],$jmsh['tu']);


        //同类异类五行
        $sql="select * from `sm_wh` where wh='".$cookies['wh'][4]."'";
        $tywh = db::queryone($sql);



        //纳音
        $sql='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][0].$cookies['bazi'][1].'"';
        $nayin[]=db::queryone($sql);
        $sql2='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][2].$cookies['bazi'][3].'"';
        $nayin[]=db::queryone($sql2);
        $sql3='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][4].$cookies['bazi'][5].'"';
        $nayin[]=db::queryone($sql3);
        $sql4='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][6].$cookies['bazi'][7].'"';
        $nayin[]=db::queryone($sql4);


        //生肖个性
        $sql="select * from `sm_sxgx` where sx='".$cookies['sx']."'";
        $sxgx=db::queryone($sql);


        //节气
        $solarTerm =array("小寒","大寒 ","立春","雨水 ","惊蛰","春分 ","清明","谷雨 ","立夏","小满 ","芒种","夏至 ","小暑","大暑 ","立秋","处暑 ","白露","秋分 ","寒露","霜降 ","立冬","小雪 ","大雪","冬至 ");
        eregi("(.*)/(.*)", $cookies['jieqi']['term1'],$zc_1);
        $zc1 = $solarTerm[$zc_1[1]].$zc_1[2];
        eregi("(.*)/(.*)", $cookies['jieqi']['term2'], $zc_2);
        $zc2 = $solarTerm[$zc_2[1]].$zc_2[2];

        $info['jmsh'] = $jmsh;
        $info['wharr'] = $wharr;
        $info['tywh'] = $tywh;
        $info['nayin'] = $nayin;
        $info['sxgx'] = $sxgx;
        return $info;
    }


    /**
     * @param $id
     * @return string
     * 模板函数
     */

    function smfun($value,$key){

        return $value.'990';
    }

	
	
	
	/**
     * @param integer $classid  分类id
     * @return array
     */
    private function _viewlist($tid,$page=1,$pernum=30,$ord=null) {
		
		$topic_arr = array( 1=>'人物', 2=>'动物', 3=>'物品', 4=>'植物', 5=>'鬼神', 6=>'生活', 7=>'其他');
		
		if($tid==''){
			$tid = 7;
		}
		
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
	
	public function click(){
		$id = req::item('id', '');
		
		if($id!=''){
		$sql = 'update `zgjm_data` set `click` = `click`+1 where id="'.$id.'"';
		return db::query($sql);
		//return $sql;
		}
		
  
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
			$tid = 7;
		}
		
        $num=db::get_one('select count(1) as num FROM zgjm_data WHERE `tid`="'.$tid.'"');
        return isset($num['num'])?$num['num']:0;
    }
	
	
	
	
}