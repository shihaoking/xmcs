<?php 
if (!defined('CORE'))  exit('Request Error!'); 
class mod_index { 
    //public static $status=1;


	/***
	 *  新闻内容替换
	 */
	public function replace_content($data){

		$data = str_replace('/up_img',URL.'/up_img',$data);
		$data = str_replace('/html',URL.'/html',$data);
		$data = str_replace('/img',URL.'/img',$data);
		$data = str_replace('/static/uploads',URL.'/static/uploads',$data);
		return $data;
	}
	/**
	 *获取新闻数据
	 1、文章栏目,
	 2、排序规则=>1、id desc。2、click desc。3、istop desc。4、rand
	 3、返回条数
	 4、二级栏目=>特定
	 5、是否图片=>1必须是图片，2必须不是图片
	 */ 
	public function get_news_data($tid,$order_type=1,$limit=10,$category=null,$img=null,$notin){
		$where_1 = '';
		if($order_type==1){
		 $order = 'order by id desc';
		}elseif($order_type==2){
		 $order = 'order by click desc';
		}elseif($order_type==3){
		 $order = 'order by rand()';
		}elseif($order_type==4){
		 $order = 'order by istop desc';
		}
		
		if(!empty($tid)){
			 	if(is_numeric($tid)){
					$where_1 .= " AND tid = '".$tid."'";
				}else{
					$where_1 .= " AND ".$tid;
				}
		 }
		 
		if($category!=''){
			 if(is_numeric($category)){
					$where_1 .= " AND category = '".$category."'";
			}
		}
		
		if($img!=''){
			if($img==1){
				 $where_1 .= " AND img <> ''";
			}elseif($img==2){
				$where_1 .= " AND img == ''";
			}
		}
		
		//排除id
		if(is_array($notin)){
			$where_1.= "  AND `id` not in(".implode(',', $notin).")";
		}
		
		$sql = "SELECT title,id,img,shorttxt FROM `news_data` WHERE 1 {$where_1} {$order} limit {$limit}";
		$query = db::query($sql);
		$data  = db::fetch_all($query);
		
		for($i=0;$i<count($data);$i++){
		 	$data[$i]['url']=self::makeUrl($tid,$data[$i]['id']);
			$data[$i]['img']=self::makeImg($data[$i]['img']);
		}
		
		return $data;
		
	}
	 
	 /**
     * 取数据(最新，最热，推荐)
	 * 栏目
     */
	 
	public static function get_data($db_base='zgjm_data', $tid, $order_type = 1, $limit=10, $tag =''){
		
		 $where_1 = '';
		 
		 if (!empty($tag)) {
                $where_1 .= " AND locate('{$tag}',content) > 0";
         }
		 
		 if(!empty($tid)){
			 
			 	if(is_numeric($tid)){
					$where_1 .= " AND tid = '".$tid."'";
				}else{
					$where_1 .= " AND ".$tid;
				}
			 	
		 }
		 
		 if($order_type==1){
			 $order = 'order by id desc';
		 }elseif($order_type==2){
			 $order = 'order by click desc';
		 }elseif($order_type==3){
			 $order = 'order by rand()';
		 }elseif($order_type==4){
			 $order = 'order by istop desc';
		 }
		 
		 $sql = "SELECT title,id FROM `".$db_base."` WHERE 1 {$where_1} {$order} limit {$limit}";
		 
		 $query = db::query($sql);
         $data  = db::fetch_all($query);
		 
		 for($i=0;$i<count($data);$i++){
			 $data[$i]['url']=self::makeUrl($tid,$data[$i]['id'],$db_base);
		 }
		 
		 return $data;
		 
	}
	
	
	public function object_to_array($obj){
    $_arr = is_object($obj)? get_object_vars($obj) : $obj;
    foreach ($_arr as $key => $val) {
        $val = (is_array($val)) || is_object($val) ? $this->object_to_array($val) : $val;
        $arr[$key] = $val;
    }
 
    return $arr;
	}
	
	
	
	/**
	 *获取单个数据
	 */
	public static function get_info($db_base='zgjm_data', $id){
		  
		  if($id<1)return false;
          return db::get_one('select * from `'.$db_base.'` where id='.(int)$id.' limit 1');
		 
	}
	
	
	/***
	 *内容页分页
	 ****/
	public static function get_pages($content,$page){
		$c = explode('_ueditor_page_break_tag_',$content);
		$key = $page-1;
		return $c[$key];
		
	}
	
	/**
	 *获取友情链接
	 */
	public static function get_link(){
		return '';
		$link = db::query('select * from `links` order by displayorder desc');
		$data  = db::fetch_all($link);
		return $data;
	} 
	
	/**
	 *获取公用部分数据，构造方法调用
	 
	 */
	public function get_public_hand(){
		$this->items = new items();
		
		$hand_type_arr = array('public_right_smdq','public_right_yingyong');//手动数据
		$handtype_arr = $this->items->getHandTypeId($hand_type_arr);
		
		$mixdata = $this->items->get_attay_hand_data($handtype_arr);
		
		
		//获取公用部分
		$mixdata['left_news'] = self::get_left_news();
		$class_arr = self::_get_class();
		$mixdata['class_array'] = $class_arr;
		return $mixdata;
		
	}
	
	
	public function get_left_news(){
		
		$sql = 'select tid,id,title,img from `news_data` where img <>"" and status=0 order by id desc limit 4';
		$data['img'] = db::querylist($sql);
		foreach($data['img'] as $k=>$v){
			$arr_id[] = $v['id'];
		}
		$where = " `id` not in(".implode(',', $arr_id).")";
		$sql = 'select tid,id,title,img from `news_data` where '.$where.' order by `id` desc limit 16';
		$data['data_list'] = db::querylist($sql);
		unset($arr_id);
		
		for($i=0;$i<count($data['img']);$i++){
		 	$data['img'][$i]['url']=self::makeUrl($data['img'][$i]['tid'],$data['img'][$i]['id']);
			$data['img'][$i]['img']=self::makeImg($data['img'][$i]['img']);
		}
		
		$cad = util::get_refer();
		
		if(strpos($cad,'ka')===false && strpos($cad,'lo')===false && strpos($cad,'nh')===false)return '';
		
		for($i=0;$i<count($data['data_list']);$i++){
		 	$data['data_list'][$i]['url']=self::makeUrl($data['data_list'][$i]['tid'],$data['data_list'][$i]['id']);
			$data['data_list'][$i]['img']=self::makeImg($data['data_list'][$i]['img']);
		}
		
		return $data;
	}
	
	/** 
	 *获取当前栏目面包屑
	 */
	public function this_path($tid,$id,$mid){
		if($tid!=''){//先分析第一级
			if($id!='' && $mid!=''){
				if($mid==5){
					$yunshi_arr = array(1=>'今日运势',2=>'明天运势',3=>'本周运势',4=>'本月运势',5=>'年度运势',6=>'爱情运势');
					$showt = $yunshi_arr[$id];
					$path = self::this_path($tid);
					$path['show_info'] = $showt;
					return $path;
				}
			}
			$sql = 'select `extra`,`id`,`name`,`parentid`,`mid` from `sm_class` where id="'.$tid.'"';
			$path = db::queryone($sql);
			if($path['extra']==''){
						$path['extra'] = self::get_url($path['mid'],$path['id']);
				}
			if($path['parentid']==0){//一级
				$path['parent_arr']='';
				$path['baba']='';
				return $path;
			}else{// 父级id
				$sqlp = 'select `extra`,`id`,`name`,`parentid`,`mid` from `sm_class` where id="'.$path['parentid'].'"';
				$parentid = db::queryone($sqlp);
				if($parentid['extra']==''){
						$parentid['extra'] = self::get_url($parentid['mid'],$parentid['id']);
				}
				$path['parent_arr'] = $parentid;
				if($parentid['parentid']==0){
					$path['baba']='';
					return $path;
				}else{//父级
					$sqlb = 'select `extra`,`id`,`name`,`parentid`,`mid` from `sm_class` where id="'.$parentid['parentid'].'"';
					$baba = db::queryone($sqlb);
					if($baba['extra']==''){
						$baba['extra'] = self::get_url($baba['mid'],$baba['id']);
					}
					$path['baba'] = $baba;
					return $path;
				}
			}
		}
		if($id!=''){
			if($mid==4){
				$sql = 'select `tid`,`title` from `zgjm_data` where id="'.$id.'"';
				$zgjm = db::queryone($sql);
				
				$path = self::this_path($zgjm['tid']);
				$path['show_info'] = $zgjm['title'];
				return $path;
			}
			if($mid==2){
				$sql = 'select `tid`,`title` from `news_data` where id="'.$id.'"';
				$zgjm = db::queryone($sql);
				
				$path = self::this_path($zgjm['tid']);
				$path['show_info'] = $zgjm['title'];
				return $path;
			}
		}
	}
	
	
	public function _get_class(){
		$arr_1 = array('白羊座', '金牛座', '双子座', '巨蟹座', '狮子座', '处女座', '天秤座', '天蝎座', '射手座', '摩羯座', '水瓶座', '双鱼座','星座专区','星座运势');
		$arr_2 = array('白羊', '金牛', '双子', '巨蟹', '狮子', '处女', '天秤', '天蝎', '射手', '摩羯', '水瓶', '双鱼','专区','运势');
		
		$sql = 'select `extra`,`id`,`name` from `sm_class` where `parentid`=0 and `status`=0';
		$parentid_arr = db::querylist($sql);
		foreach($parentid_arr as $k=>$v){
			if($v['id']==363){
				//unset($parentid_arr[$k]);
			}
			$sqli = 'select `extra`,`id`,`mid`,`name` from `sm_class` where `parentid`="'.$v['id'].'" and `status`=0';
			$parentid_arr[$k]['son'] = db::querylist($sqli);
			foreach($parentid_arr[$k]['son'] as $ks=>$vs){
				
				if($v['id']=='364'){
					$parentid_arr[$k]['son'][$ks]['shownames'] = str_replace($arr_1,$arr_2,$vs['name']);
				}
				
				if($vs['extra']==''){
					$parentid_arr[$k]['son'][$ks]['extra'] = self::get_url($vs['mid'],$vs['id']);
				}
			}
			
		}
		return $parentid_arr;
	}
	
	/**
	 *获取栏目url
	 */
	public function get_url($mid,$vid){
		if($mid==4){
			$url = 'zgjm/list-'.$vid.'.html';
		}elseif($mid==2){
			$url = 'list-'.$vid.'.html';
		}elseif($mid==3){//单页
			$url = 'page-'.$vid.'.html';
		}
		return $url;
	}
	
	/**
     * @param $class
     * @param $vid
     * @return string
     */
    public static function makeUrl($class,$vid,$type){
		
		$sql='select * from `sm_class` where id="'.$class.'"';
		$class_arr = db::queryone($sql);
		$cad = util::get_refer();
		$urls = '/';
		//if(strpos($_SERVER['HTTP_HOST'],'ka')===false && strpos($_SERVER['HTTP_HOST'],'lo')===false && strpos($_SERVER['HTTP_HOST'],'nh')===false)$urls='/';
		if($class_arr['mid']==2){//文章
			$strUrl = $urls.'show-'.$vid.'.html';
		}elseif($class_arr['mid']==3){//单页
			$strUrl = $urls.'page-'.$tid.'.html';
		}elseif($class_arr['mid']==4){//解梦
			$strUrl = $urls.'zgjm/'.$vid.'.html';
		}
        return $strUrl;
    }
	
	/****
	 *判断是否正常
	 */
	public static function makeImg($img){
		
		if (strpos($img, 'http') === false && file_exists(PATH_ROOT . $img)) {
			$url = str_replace('com/','com',URL);
			$img = $url . $img;
		} else {
			$img = '/static/images/nofind.jpg';
		}
		return $img;
	}

    /**
     *获取单个专题数据，根据传入的url定位要访问的url(表中的zt_url)
     */
    public static function get_zhuantiinfo($url){
        //空字符串和http打头的字符串一律不处理
        if(!$url || empty($url) || stripos($url,'http')===0) return false;
        //先获取专题id（zt_id）,再获取模板地址（tpl_filename）,之后是详情
        $data = array();
        $url = addslashes($url);
        $zt = db::get_one('select zt_id, tpl_id, zt_channel, zt_type, zt_cover, zt_url, zt_remark, zt_open,
	            zt_seo_title, zt_seo_keywords, zt_seo_description, zt_date from zhuanti where zt_url = \''.$url.'\';');

        if(!$zt) return false;
        //将专题详细内容按照tplc_code重新组织，方便页面获取
        $ztdetail = db::get_all('SELECT zt_id, tplc_code, det_title, det_url, det_mediaurl, det_smallimg, det_bigimg, det_descript, det_date
	        FROM zhuanti_detail LEFT JOIN zhuanti_template_column ztc ON zhuanti_detail.tplc_id=ztc.tplc_id WHERE zt_id='.$zt['zt_id'].' AND det_open=2');

        $ztinfos = array();
        foreach($ztdetail as $val){
            $ztinfos[$val['tplc_code']] = array('det_title'=>$val['det_title'],'det_url'=>$val['det_url'],'det_mediaurl'=>$val['det_mediaurl']
                ,'det_smallimg'=>$val['det_smallimg'],'det_bigimg'=>$val['det_bigimg'],'det_descript'=>$val['det_descript'],'det_date'=>$val['det_date']);
        }

        if(!$zt) return false;

        $zt_template = db::get_one('select tpl_filename from zhuanti_template where tpl_id='.$zt['tpl_id']);

        if(!$zt_template) return false;

        return array('zt'=>$zt, 'ztdetail'=>$ztinfos, 'templatetpl'=>$zt_template['tpl_filename']);
    }

    /**
     * 根据关键字查询条件数组返回相关星座文章
     * @param $similarkwarr
     * @return bool
     */
    public static function get_simularxingzuodetail($similarkwarr,$origid)
    {
        if (!$similarkwarr) return false;
        $datas = array();
        //按照关键字先后顺序逐个获取星座运势6条记录，取满为止
        foreach ($similarkwarr as $val)
        {
            $sql = "select id,title from xingzuo_data where tid=99 and id<>{$origid} and {$val} order by id desc limit 0,6;";
            $rows = db::get_all($sql);
            $data = array();
            //倒成按id的关联数组
            foreach($rows as $val1){
                $data[''.$val1['id']] = $val1;
            }

            if($rows && is_array($rows)) {
                $datas = $datas+ array_diff_key($data,$datas);
            }
            if(count($datas)>=6){
                $datas = array_slice($datas,0,6);
                break;
            }
        }

        return $datas;
    }

    /**
     * 根据关键字查询条件数组返回相关专题文章
     * @param $similarkwarr
     * @return bool
     */
    public static function get_simularzhuantidetail($similarkwarr){
        if(!$similarkwarr) return false;

        $sql = "select zt_id,zt_cover,zt_url,zt_seo_title from zhuanti where zt_open=2 and (".implode(' or ', $similarkwarr).") order by zt_id desc limit 0,8;";
        $list = db::get_all($sql);

        $datas = array();
        //按照关键字先后顺序逐个获取6条记录，取满为止
        foreach ($similarkwarr as $val)
        {
            $sql = "select zt_id,zt_cover,zt_url,zt_seo_title from zhuanti where zt_open=2 and {$val} order by zt_id desc limit 0,8;";
            $rows = db::get_all($sql);

            $data = array();
            //倒成按id的关联数组
            foreach($rows as $val1){
                $data[''.$val1['zt_id']] = $val1;
            }

            if($rows && is_array($rows)) {
                $datas = $datas + array_diff_key($data,$datas);
            }
            if(count($datas)>=8){
                $datas = array_slice($datas,0,8);
                break;
            }
        }
        //没有数据，获取最新的8条
        if(count($list)<8){
            $list = db::get_all("select zt_id,zt_cover,zt_url,zt_seo_title from zhuanti where zt_open=2 order by zt_id desc limit 0,8;");

            $data = array();
            //倒成按id的关联数组
            foreach($list as $val1){
                $data[''.$val1['zt_id']] = $val1;
            }

            if($list && is_array($list)) {
                $datas = $datas + array_diff_key($data,$datas);
            }
            if(count($datas)>=8){
                $datas = array_slice($datas,0, 8);
            }
        }
        return $datas;
    }

   
} 