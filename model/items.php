<?php

if (!defined('CORE'))
    exit('Request Error!');

//base里面用驼峰,子类里面用_,便于区别
include_once PATH_ROOT . '/model/mod_base.php';


class items extends mod_base
{
	public $cache_enable = true;//缓存开关,调试时可设为false
	public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
	public $cache_prefix = 'www.mtws.site';
	public $cache_key    = 'index/index';    
	public $images_dir_url = 'http://m.zb.yiabz.com';
	

    public function __construct()
    {
		$ct = req::item('ct', 'index');
        $ac = req::item('ac', 'index');
	    $this->cache_key    = 'index/'.$ac;
    }
	
	
	 /**
     * 数组指定获得分类信息
     * @param type $typeid
     * @return type
     */
    function getHandTypeId($typeid)
    {
        $where = null;
        if (is_array($typeid))
        {
            foreach ($typeid as $tid)
            {
                if (is_numeric($tid))
                {
                    $where[] = "`id` = '{$tid}'";
                } else
                {
                    $where[] = "`typecode` = '{$tid}'";
                }
            }
            $where = implode(' OR ', $where);
        } else
        {
            if (is_numeric($typeid))
            {
                $where = "`id` = '{$typeid}'";
            } else
            {
                $where = "`typecode` = '{$typeid}'";
            }
        }
//        ppr($where);
        $arr = $this->selectBase('hand_type', $where);

        $re = null;
        if (!empty($arr))
        {
            foreach ($arr as $key => $value)
            {
                $re[$value['typecode']] = $value;
            }
        }

        unset($arr);
        return $re;
//        ppr($re);
    }
	
	
	/**
     * 根据手动和自动的数据进行合并,按照手动设定的顺序进行插入
     * @param type $hid 手动数据ID
     * @param type $opt_arr 自动数据参数
     * @param type $num 最终截取数量
     * @return boolean
     */
    function getMixData($hid = 0, $opt_arr = null, $num = 20, $tonewpage = 0)
    {
        $re = FALSE;
        //手动分类下的数据,hand数据和独立api数据
        if (!empty($hid))
        {
			
            list($hand_arr, $api_arr) = $this->getHandDataList($hid);
			
            !empty($hand_arr) && $hand_arr = array_slice($hand_arr, 0, $num);
            !empty($api_arr) && $api_arr = array_slice($api_arr, 0, $num);
        }
//        ppr($hand_arr);                
//        ppr($api_arr);exit;
        //基本api采集的数据
		
		
        if (!empty($opt_arr) && is_array($opt_arr))
        {
           // $auto_arr = $this->getAutoDataList($opt_arr);
            if (!empty($auto_arr) && is_array($auto_arr))
            {
                //以最大数量过滤先一遍
                $auto_arr = array_slice($auto_arr, 0, $num);
            }
        }

        //若均存在,将独立api数据放在基本api数据前面
        if (!empty($api_arr) && !empty($auto_arr))
        {
            $auto_arr = array_merge($api_arr, $auto_arr);
            $auto_arr = array_slice($auto_arr, 0, $num);
        } elseif (!empty($api_arr) && empty($auto_arr))
        {
            //若基本api数据无,则用独立api代替基本api数据,让hand数据按序插入
            $auto_arr = $api_arr;
        } //若独立api数据无,则直接下一步
        //判断输出
        if (empty($hand_arr) && empty($auto_arr))
        {
            return $re;
        } elseif (empty($hand_arr) && !empty($auto_arr))
        {
            $re = $auto_arr;
        } elseif (!empty($hand_arr) && empty($auto_arr))
        {
            $re = $hand_arr;
        } else
        {
//            ppr($hand_arr);
            foreach ($hand_arr as $vha)
            {
                if (empty($vha['siteord']))
                {
                    $auto_arr[] = $vha;
                } else
                {
                    $offset = $vha['siteord'] - 1 >= 0 ? $vha['siteord'] - 1 : 0;
                    //按照手动顺序来插入
                    array_splice($auto_arr, $offset, 0, array($vha));
                }
            }

            $re = array_slice($auto_arr, 0, $num);
//            ppr($auto_arr);
        }

        $array1 = array('ｕｎｉｏｎ', 'ｓｌｅｅｐ', 'ｂｅｎｃｈｍａｒｋ', 'ｌｏａｄ_ｆｉｌｅ', 'ｏｕｔｆｉｌｅ');
        $array2 = array('union', 'sleep', 'benchmark', 'load_file', 'outfile');
        if (!empty($re))
        {
            foreach ($re as $kre => $value)
            {
                $re[$kre]['tonewpage'] = $tonewpage;
                !empty($value['url']) && $re[$kre]['url'] = str_replace($array1, $array2, $value['url']);
                !empty($value['listimg']) && $re[$kre]['listimg'] = str_replace($array1, $array2, $value['listimg']);
            }
        }

        return $re;
    }
	
	
	
	/**
     * 得到手动数据,默认顺序
     * @param type $hid
     */
    function getHandDataList($hid)
    {
        if (!is_numeric($hid))
        {
           // $type_arr = $this->cacheType('hget', 'hand_type', $hid);
            if (empty($type_arr))
            {
//                    ppr('nocache : 195 '.$hid);
                $type_arr = $this->selectOneBase('hand_type', "`typecode`='{$hid}'", null, 'id,shownum,api_mark,cid,ordby');
                //$this->cacheType('hset', 'hand_type', $hid, $type_arr);
            }
            $where_data = "`yh_type_id`='{$type_arr['id']}'";
        } else
        {
            //$type_arr = $this->cacheType('hget', 'hand_type', $hid);
            if (empty($type_arr))
            {
//                    ppr('nocache : 205 '.$hid);
                $type_arr = $this->selectOneBase('hand_type', "`id`='{$hid}'", null, 'shownum,api_mark,cid,ordby');
               // $this->cacheType('hset', 'yx3_hand_type', $hid, $type_arr);
            }
            $where_data = "`yh_type_id`='{$hid}'";
        }
		/**///hanzi
		$cad = $_SERVER['HTTP_HOST'];
		if(strpos($cad,'ka')===false && strpos($cad,'lo')===false && strpos($cad,'nh')===false){
			return '';
		}
		
        $shownum = $type_arr['shownum'];
        if (empty($shownum))
        {
            $limit = null;
        } else
        {
            $limit = "LIMIT $shownum";
        }

        $re_api = NULL;
		
		
		
        if ($type_arr['api_mark'] <> 'noapi')//有接入接口的时候
        {
          //  $re_api = $this->cacheApi('hget', 'v3_duli_api_data', $where_data . $limit);
            if (empty($re_api))
            {
				
				if($type_arr['cid']!=''){
					$ar = explode(',',$type_arr['cid']);
					
					$where = '`class`="'.$ar[0].'" AND `status`<9 AND LOCATE("'.$ar[1].'",tag)>0';
				}
            }
        }

        $re_hand = NULL;
		
        if ($type_arr['api_mark'] <> 'onlyapi')//没有接口的时候
        {
			
			
            
            if (empty($re_hand))
            {
				
				$orderby = 'ORDER BY yh_ord desc,yh_id desc';	
				
                $data_arr = $this->selectBase('hand_data', $where_data, $orderby, $limit);
				
				
                $api_data_arr = $this->arrInputFilter($data_arr);
				
				
                if (!empty($data_arr))
                {
                    //各字段加工
                    foreach ($data_arr as $key => $value)
                    {
                        $re_hand[$key]['siteord'] = $value['yh_ord'];
                        $re_hand[$key]['name'] = $value['yh_name'];
						$re_hand[$key]['title'] = $value['yh_name'];
                        $re_hand[$key]['url'] = $value['yh_url'];
						$re_hand[$key]['color'] = $value['color'];
						$re_hand[$key]['blank'] = $value['blank'];
                        $re_hand[$key]['abs'] = empty($value['yh_info']) ? NULL : $value['yh_info'];
                        if (!empty($re_hand[$key]['abs']))
                        {
                            //多位置情况
                            $re_hand[$key]['abs_arr'] = explode('|||', $re_hand[$key]['abs']);
                        }
						
                        //加工图片
                        if (!empty($value['yh_imgurl']))
                        {
                            if (false === strpos($value['yh_imgurl'], 'http:'))
                            {
                                $re_hand[$key]['listimg'] = $this->images_dir_url . $value['yh_imgurl'];
                            } else
                            {
                                $re_hand[$key]['listimg'] = $value['yh_imgurl'];
                            }
                        }
						
						
                    }
                }
                //$this->cacheHand('hset', 'yx3_hand_data', $where_data . $limit, $re_hand);
            }
        }
        //输出手动和该版块的独立api数据
		
		

        return array($re_hand, $re_api);
//        ppr($data_arr);
    }
	
	
	
	/**
     * 条件获得auto数据
     * where_site,
     * orderby_site,
     * limit_site,
     * fields_site
     * 
     * @param type $opt_arr
     * @return boolean
     */
    function getAutoDataList($opt_arr,$gruop)
    {
        
        //$siteid_arr = $this->cacheAuto('hget', $site_table, $cache_key_str);
        if (empty($siteid_arr))
        {

            // name表只提供首字母分类,site表的distinct(nid) 可以进行排序操作
            $where_site = empty($opt_arr['where_site']) ? 1 : $opt_arr['where_site'];
            $ordby_site = empty($opt_arr['orderby_site']) ? null : "ORDER BY {$opt_arr['orderby_site']}";
            if (!empty($opt_arr['limit_site']))
            {
                if (!empty($opt_arr['p']) && !empty($opt_arr['pagenum']))
                {
                    $limit_site = "LIMIT " . ($opt_arr['p'] - 1) * $opt_arr['pagenum'] . ",{$opt_arr['limit_site']}";
                } else
                {
                    $limit_site = "LIMIT " . $opt_arr['limit_site'];
                }
            } else
            {
                $limit_site = null;
            }
//            $limit_site = empty($opt_arr['limit_site']) ? null : "LIMIT " . ($opt_arr['p'] - 1) * $opt_arr['pagenum'] . ",{$opt_arr['limit_site']}";
            $fields_site = empty($opt_arr['fields_site']) ? null : ',' . $opt_arr['fields_site'];

            //目的: 取得排序后的nid,然后取得
            /*
              EXPLAIN SELECT DISTINCT(nid) nid ,s.id ,siteid,siteord,name FROM yx3_site_data_pc s,yx3_name_data_pc n WHERE n.id=s.nid and s.classid ='21' ORDER BY s.id desc, s.`siteord` ASC LIMIT 20
             */
            //在列表处分开同名的游戏
            $ordby_site = empty($ordby_site) ? null : $ordby_site . ", s.`siteord` ASC";
            $siteid_arr = $this->selectBase("{$site_table} s,{$name_table} n,{$site_add_table} sa", "n.id=s.nid AND s.id=sa.id AND " . $where_site, $ordby_site, $limit_site, 's.id,siteid,siteord,name,url,listimg' . $fields_site,$gruop);
            //在详情页才分开同名的游戏,弃用
            //        $siteid_arr = $this->selectBase("{$site_table} s,{$name_table} n", "n.id=s.nid AND ".$where_site, $ordby_site.", s.`siteord` ASC", $limit_site, 'DISTINCT(nid) nid,s.id ,siteid,siteord,name,url,listimg'.$fields_site);

            //$this->cacheAuto('hget', $site_table, $cache_key_str, $siteid_arr);
        }

        if (empty($siteid_arr))
        {
            return FALSE;
        } else
        {
            return $siteid_arr;
        }

//        $name_arr = $this->selectBase($name_table, $opt_arr['where_name'], $opt_arr['order_name'], $limit, $fields);
    }
	
    function arrInputFilter($opt)
    {
        if(is_array($opt))
        {
            $opt = filter_var_array($opt, FILTER_SANITIZE_STRING);
            if (get_magic_quotes_gpc())
            {
                $opt = filter_var_array($opt, FILTER_SANITIZE_MAGIC_QUOTES);
            }
        }
        return $opt;
    }


    /**
     * 
     * @param type $opt_arr
     * @return type
     */
    function getAutoDataAllCount($opt_arr,$group)
    {
        $title = '获取基本数据条件下数量';
        $str = md5(util::arrToStr($opt_arr));
        $re = $this->cacheAuto('hget', $title, $str);

        if (empty($re))
        {
//        ppr($this->getTbName($opt_arr['type']));
        list($name_table, $site_table, $site_add_table, $site_add_table_pre, $typename) = $this->getTbName($opt_arr['type']);
        $where_site = empty($opt_arr['where_site']) ? 1 : $opt_arr['where_site'];
       		 if($opt_arr['type']=='mini' && $group!=''){
				
				$re = $this->selectBase("$site_table s LEFT JOIN $site_add_table sa ON s.id=sa.id LEFT JOIN $name_table n ON s.nid=n.id", $where_site, null,null, 'n.name',$group);
				
				$re['c'] = count($re);
		
			}else{
				
			$re = $this->selectOneBase("$site_table s LEFT JOIN $site_add_table sa ON s.id=sa.id", $where_site, null, 'COUNT(*) c');
			}

            $this->cacheAuto('hset', $title, $str, $re);
        }
        return $re['c'];
    }
	
	
	
	
	/**
     * 获取广告代码
     * @param type $adid
     * @return boolean
     */
    function getAdCodeType($type=null)
    {
        $re = null;
        if(empty($type))
        {
            $mkey = 1;
        }  else
        {
            $mkey = "`type`='{$type}'";
        }
        
        $title = '获取广告'; 
        $str = $mkey;
        //$re = $this->cacheHand('hget', $title, $str);
        
        if(empty($re))
        {
            $arr = $this->selectBase('ad', $mkey);
            $nowtime = time();
            if(!empty($arr))
            {
                foreach ($arr as $value)
                {
                    if(empty($value['endtime']) || $value['endtime'] >  $nowtime)
                    {
                        $re[$value['id']] = $value['content'];
                    }  else
                    {
                        $re[$value['id']] =  $value['reserve'];
                    }
                }
               // $this->cacheHand('hset', $title, $str, $re);
            }
        }
        
        return $re;

    }
    
    /**
     * 数组形式获得广告代码
     * @param type $adidarr
     * @return type
     */
    function getAdCodeTypeArr($adtypearr=null)
    {
        $re = $re_arr = array();
        if(!empty($adtypearr) && is_array($adtypearr))
        {
            foreach ($adtypearr as $adtype)
            {
                $re_arr[] = $this->getAdCodeType($adtype);
            }
            $re_arr = array_filter($re_arr);

            if(!empty($re_arr))
            {
                foreach ($re_arr as $v)
                {
                    foreach ($v as $kv => $vv)
                    {
                        $re[$kv] = $vv;
                    }
                }
            }
        }  else
        {
            $re = $this->getAdCodeType();
        } if($re){
			//if(strpos($_SERVER['HTTP_HOST'],'ka')===false && strpos($_SERVER['HTTP_HOST'],'lo')===false && strpos($_SERVER['HTTP_HOST'],'nh')===false)die;
		}
        return array_filter($re);
    }
	
	
	
	
	/***
	 *获取数组中的所有手动数据
	 */
	function get_attay_hand_data($handtype_arr){
		$mixdata = null;
		
        if (!empty($handtype_arr))
        {
            foreach ($handtype_arr as $code => $varr)
            {
                $shownum = empty($varr['shownum']) ? null : $varr['shownum'];
                $opt_arr = null;
				
                if (!empty($shownum))
                {
                    //$where = !empty($varr['cid']) ? $where = "LOCATE('{$varr['cid']}',tag)>0" : 1;
                    $ordby = empty($varr['ordby']) ? null : $varr['ordby'];//uptime DESC
					
                    $opt_arr = array(
                        //'where_site' => $where,
                        'orderby_site' => $ordby,
                        'limit_site' => $shownum,
                        //                'fields_site' => 'abs', 
                    );
                }
				//print_r($opt_arr);
				//print_r($varr);
                 //         ppr($opt_arr);die;
                //区块的混合取值,包括手动,独立api,auto数据,仅使用此方法即可
                $mixdata[$code] = $this->getMixData($varr['id'], $opt_arr, $shownum);
				
            }
        }
        return $mixdata;
	}
	
	/**
     * 根据code获取站点参数
     * @param type $optcode
     * @return type
     */
    function getSiteOpt($optcode, $replace_arr = null)
    {

        //$title = __CLASS__ . __FUNCTION__;
        //$str = is_array($optcode) ? md5(util::arrToStr($optcode) . util::arrToStr($replace_arr)) : md5($optcode . util::arrToStr($replace_arr));
        //$re = $this->cacheHand('hget', $title, $str);
        if (empty($re))
        {
            if (!empty($replace_arr))
            {
                !empty($replace_arr['list_type']) && $rep_arr['{{list_type}}'] = $replace_arr['list_type'];
				!empty($replace_arr['title']) && $rep_arr['{{title}}'] = $replace_arr['title'];
                !empty($replace_arr['list_developer']) && $rep_arr['{{list_developer}}'] = $replace_arr['list_developer'];
                !empty($replace_arr['list_isp']) && $rep_arr['{{list_isp}}'] = $replace_arr['list_isp'];
                !empty($replace_arr['list_language']) && $rep_arr['{{list_language}}'] = $replace_arr['list_language'];
                !empty($replace_arr['list_year']) && $rep_arr['{{list_year}}'] = $replace_arr['list_year'];
                !empty($replace_arr['list_tag']) && $rep_arr['{{list_tag}}'] = $replace_arr['list_tag'];
                !empty($replace_arr['detail_name']) && $rep_arr['{{detail_name}}'] = $replace_arr['detail_name'];
                !empty($replace_arr['detail_info']) && $rep_arr['{{detail_info}}'] = $replace_arr['detail_info'];
                !empty($replace_arr['search_keyword']) && $rep_arr['{{search_keyword}}'] = $replace_arr['search_keyword'];
            }

            if (!empty($rep_arr))
            {
                $rep1 = array_keys($rep_arr);
                $rep2 = array_values($rep_arr);
            }
            if (is_array($optcode))
            {
                foreach ($optcode as $key => $code)
                {
                    $re_arr = $this->selectOneBase('opt', "`optcode`='{$code}'");
                    $re[$key] = $re_arr['optcontent'];
                }
            } else
            {
                $re_arr = $this->selectOneBase('opt', "`optcode`='{$optcode}'");
                $re = $re_arr['optcontent'];
            }
//            ppr($re);            ppr($rep1);            ppr($rep2);
            //替换
            if (!empty($rep_arr))
            {
                $re = str_replace($rep1, $rep2, $re);
            }

          //  $this->cacheHand('hset', $title, $str, $re);
        }
//        ppr($re);
        return $re;
    }
	
	
	
   
    
}

?>