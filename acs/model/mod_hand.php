<?php

if (!defined('CORE'))
    exit('Request Error!');

/**
 * @version $Id$
 */
class mod_hand
{

    public $mbkey = '后台'; //后台的key前缀
    public $cachetime = 600; //后台的缓存设置时间 10分钟
	public $pre_url = '-1';

    
	/**
     * 得到数据表的字段
     * @param type $tablename
     * @return type
     */
	function showTableColumn($tablename)
    {
        //$re = cache::get(__CLASS__, __FUNCTION__ . '_' . $tablename);
        //if (empty($re))
        {
            $sql = "select column_name, column_comment from Information_schema.columns where table_Name = '$tablename'";
//            ppr($sql);
            $query = db::query($sql);
            $arr = db::fetch_all($query);
            $re = null;
            foreach ($arr as $key => $value)
            {
                $re[$value['column_name']] = $value['column_comment'];
            }
           // cache::set(__CLASS__, __FUNCTION__ . '_' . $tablename, $re, -1);
        }
        return $re;
    }

    /**
     * 得到主键
     * @param type $tablename
     * @return type
     */
    public function showTableMainColumn($tablename)
    {
        //$re = cache::get(__CLASS__, __FUNCTION__ . '_' . $tablename);
        if (empty($re))
        {
            $sql = "select COLUMN_KEY k,COLUMN_NAME n from INFORMATION_SCHEMA.COLUMNS where table_name='$tablename' AND COLUMN_KEY='PRI'";
            $query = db::query($sql);
            $arr = db::fetch_all($query);
            $re = $arr[0]['n'];
            //cache::set(__CLASS__, __FUNCTION__ . '_' . $tablename, $re, -1);
        }
        return $re;
//        ppr($arr);
    }
	
	
	/**
     * 覆盖父类,lurd后的数据,在此转换显示方式
     * @param type $table
     * @param type $param
     * @return type
     */
    public function lurdModConfig($table, $param)
    {
        if ($table == 'yx3_hand_data')
        {
            if (!empty($param))
            {
                foreach ($param as $key => $value)
                {
                    $param[$key]['yh_imgurl'] = $this->correctImgUrl($value['yh_imgurl']);
                }
            }
//            ppr($param);
        } elseif ($table == 'yx3_duli_api_data')
        {
            if (!empty($param))
            {
                foreach ($param as $key => $value)
                {
                    $param[$key]['ya_imgurl'] = $this->correctImgUrl($value['ya_imgurl']);
                }
            }
        }
        return $param;
    }

    /**
     * 得到手动分类的数据
     * @param type $param
     */
    public function get_handtype()
    {
//        ppr(__CLASS__);        ppr(__FUNCTION__);        ppr(__METHOD__);
       // $tbkey = $this->mbkey . '_手动板块分类';
        //$re = $this->cacheRedis('get', $tbkey, null, 'arr');
        if (empty($re))
        {
            $arr = $this->selectBase('hand_type',1,'ORDER BY typename DESC');
			
            $re = null;
            foreach ($arr as $value)
            {
                $re[$value['id']] = $value['typename'];
            }
            //$this->cacheRedis('set', $tbkey, $re, 'arr', $this->cachetime);
        }
		
		
        return $re;
    }
	
	
	
	
	/**
     * 基本查询
     * @param type $table
     * @param type $where
     * @param type $order
     * @param type $limit
     * @param type $fields
     * @return type
     */
    function selectBase($table, $where = '1=1', $order = null, $limit = null, $fields = '*',$group=null)
    {
        if (is_array($where))
        {
            $where = explode(' AND ', $where);
        }
		if($group==''){
        $sql = "SELECT $fields FROM $table WHERE $where $order $limit";
		}else{
		$sql = "SELECT $fields FROM $table WHERE $where $group $order $limit";
		}
        $query = db::query($sql);
        $array = db::fetch_all($query);
        
//        if(FALSE) //调试
        if(FALSE)
        {
            echo "<span style='display:none;'>";
            $sql_explain = 'EXPLAIN '.$sql;
            $query_explain = db::query($sql_explain);
            $array_explain = db::fetch_all($query_explain);
            ppr($sql);ppr($array_explain);ppr($array);
            echo '</span>';
        }


        return $array;
    }

    function selectOneBase($table, $where = '1=1', $order = null, $fields = '*',$group = null)
    {
        empty($where) && $where = '1=1'; 
        $arr = $this->selectBase($table, $where, $order, "LIMIT 1", $fields, $group);
        if (!empty($arr[0]))
        {
            return $arr[0];
        }
        return FALSE;
    }

    function selectCountBase($table, $where = '1=1')
    {
        $arr = $this->selectOneBase($table, $where, null, 'COUNT(*) c');
        if (!empty($arr['c']))
        {
            return $arr['c'];
        }
        return FALSE;
    }
	
	/**
     * 自动给本地图片加上域名
     * @param string $imgurl
     * @return string
     */
    function correctImgUrl($imgurl)
    {
        if (!empty($imgurl) && false === strpos($imgurl, 'http://'))
        {
            $imgurl = $this->opt['images_dir_url'] . $imgurl;
        }
        return $imgurl;
    }

    /**
     * 更新的基本类
     * @param type $table
     * @param type $mkey
     * @param mix $opt=array('a'=>'123','b'=>'200') 或者 "`a`='123' AND `b`=>'200'";
     */
    public function updateBase($table, $mkey, $opt)
    {
        $opt_array = $opt_str = null;
        if (!empty($opt))
        {
            if (is_array($opt))
            {
                foreach ($opt as $key => $value)
                {
					
					if(is_array($value)){
						foreach($value as $va){
						$xa .= $va.'|';	
						}
						$value = $xa;
						unset($xa);
					}
                    $opt_array[] = "`$key`='$value'";
                }
                $opt_str = implode(",", $opt_array);
            } else
            {
                $opt_str = $opt;
            }
        }
        $go_sql = "SELECT * FROM {$table} WHERE $mkey";
        $go_array = db::get_one($go_sql);

        if (empty($go_array))
        {
            $sql = "INSERT INTO {$table} SET $opt_str";
        } else
        {
            $sql = "UPDATE {$table} SET $opt_str WHERE $mkey";
        }
        $result = db::query($sql);

        if ($result !== false)
        {
            if (empty($go_array))
            {
                return db::insert_id();
            } else
            {
                return 1;
            }
        }
        return 0;
    }

    /**
     * 插入,已有则更新
     * @param type $tabel
     * @param type $opt
     * @param type $odku
     * @return int
     */
    public function addBase($tabel, $opt, $odku = null)
    {
		//print_r($opt);die;

		
        $opt_array = $opt_str = null;
        if (!empty($opt))
        {
            if (is_array($opt))
            {
                foreach ($opt as $key => $value)
                {
					if(is_array($value)){
						foreach($value as $va){
						$xa .= $va.'|';	
						}
						$value = $xa;
					}
                    $opt_array[] = "`$key`='$value'";
                }
                $opt_str = implode(",", $opt_array);
            } else
            {
                $opt_str = $opt;
            }
        }
		
		//print_r($opt_str);die;
        /*
          INSERT [LOW_PRIORITY | DELAYED] [IGNORE]
          [INTO] tbl_name
          SET col_name=(expression | DEFAULT), ...
          [ ON DUPLICATE KEY UPDATE col_name=expression, ... ]
         */
        $odku = empty($odku) ? null : ' ON DUPLICATE KEY UPDATE ' . $opt_str;

        $sql = "INSERT INTO `{$tabel}` SET $opt_str $odku";
//        ppr($sql);exit;
        $result = db::query($sql);
        if ($result !== false)
        {
            if (empty($odku))
            {
                return db::insert_id();
            } else
            {
                return 1;
            }
        }
        return 0;
    }

    /**
     * 基本删除
     * @param type $table
     * @param type $mkey
     * @return int
     */
    public function delBase($table, $mkey)
    {
        if (!empty($mkey))
        {
            $sql = "DELETE FROM  `{$table}` WHERE $mkey";
            $result = db::query($sql);
            if ($result !== false)
            {
                return 1;
            }
        }
        return 0;
    }
	
	
	/**
     * 自动分页列表
     * @param type $tablename
     * @param type $ct
     * @param type $ac
     * @param type $listfield
     * @param type $orderquery
     * @param type $wherequery
     * @param type $others
     * @param type $pagesize
     * @param type $table_join
     * @param type $mylinkid
     * @param type $linkid
     */
    function showPageList($tablename, $ct, $ac, $listfield, $orderquery, $wherequery, $others, $pagesize = 10, $table_join = null, $mylinkid = null, $linkid = null)
    {
        $start = request('start', '0');
        $array_list = $this->showTablePageList($tablename, $ct, $ac, $start, $listfield, $orderquery, $wherequery, $others, $pagesize, $table_join, $mylinkid, $linkid);
//        ppr($array_list);
        tpl::assign('array_list', $array_list['data']);
        tpl::assign('pagination', $array_list['pagination']);
    }
	
	
	/**
     * 后台显示的内容表内容,带分页以及两表连接
     */
    function showTablePageList($table, $ct, $ac, $start, $listfield = '*', $orderquery, $wherequery, $others, $pagesize = 20, $table_join = null, $mylinkid = null, $linkid = null, $linkfields = '*')
    {
        $lurd_obj = cls_lurd::factory($table);
        if ($table_join && $mylinkid && $linkid)
        {
            /*
              $table_join 　要联结的表名（根据SQL查询标准不允许联结当前表）
              $mylinkid　要联结的表使用的连结字段名
              $linkid 　当前表联结字段名
              $linkfields 要联结的表查询后需要列出的字段
             * $lurd_obj->join_table('wenxue3_xiaoshuo_type',  'sid','sid', '*');
             */
            $lurd_obj->join_table($table_join, $mylinkid, $linkid, $linkfields);
        }
        $lurd_obj->page_size = $pagesize;

        /*
         * $others = "&typeid=xxx&classifyid=xxx";
         * $listfield = '*';
         * $orderquery = "ORDER BY yd_id DESC";
         * $wherequery = "WHERE `yd_id`>'0'";
         */
        $lurd_arr = $lurd_obj->get_pagination_datas($start, $url = "?ct={$ct}&ac={$ac}{$others}", $listfield, $orderquery, $wherequery);
        $lurd_arr['data'] = $this->lurdModConfig($table, $lurd_arr['data']);

        return $lurd_arr;
        //返回的数据为：array('data'=>数据array, 'pagination'=>分页符HTML串, 'total_result'=>符合查询条件的记录总数, 'total_page'=>总页数, 'page_no'=>当前页)
    }

	
	

    /**
     * 非hash的根据前缀找到同前缀的值并删除
     * @param type $prokey
     */
    public function delCacheProKeyList($prokey)
    {
        $keys_arr = $this->cacheRedis('keys', $prokey);
        if (!empty($keys_arr))
        {
            foreach ($keys_arr as $va)
            {
                $this->cacheRedis('del',$va);
            }
        }
    }
	
	
	/**
     * 处理单条和批量的删除和编辑
     * @param type $table
     */
    public function doBase($table)
    {
        $do = request('do', null);
        if (empty($do))
        {
            $this->doBatchBase($table);
        } else
        {
            $this->doOnlyBase($table);
        }
    }
	
	/**** 
	 *获取栏目
	 */
	public function getAllClass()
    {
        $re = null;
        /*$arr = $this->selectBase('yingshi_class','parentid in(5,38,97)','ORDER BY id');
		
        foreach ($arr as $value)
        {
			if($value['name']!='' && $value['id']!=''){
				if($value['parentid']==5){
					$value['pid'] = '1';
					$value['namev'] = '电影-'.$value['name'];
				}elseif($value['parentid']==38){
					$value['pid'] = '2';
					$value['namev'] = '电视剧-'.$value['name'];
				}elseif($value['parentid']==97){
					$value['pid'] = '3';
					$value['namev'] = '动漫-'.$value['name'];
				}
			
            $re[$value['pid'].','.$value['name']] = $value['namev'];
        	}
		}*/
		//print_r($re);die;
        return $re;
    }
	
	
	/**
     * 批量执行单表
     * @param type $table
     * @param type $mkey
     */
    public function doBatchBase($table)
    {
        $sub = request('sub');
        $ids = request('ids', array());
//        ppr(req::$forms);exit;
        if (empty($ids))
        {
            cls_msgbox::show('对不起，出错了！', '请选择操作的数据。', '-1');
        }
        $success = 0;

        $mkey = $this->showTableMainColumn($table);
		
        if ($sub == 'upd')
        {
            $tb_info = $this->showTableColumn($table);
			
			
            foreach ($tb_info as $ti_key => $ti_value)
            {
                $tmp1[$ti_key] = request($ti_key);
                if (!is_array($tmp1[$ti_key]))
                {
                    unset($tmp1[$ti_key]);
                }
            }
            $tmp2 = null;
            foreach ($ids as $id)
            {
                //循环操作
                foreach ($tmp1 as $k => $v)
                {
                    //规定none为0
                    !empty($v[$id]) && $v[$id] == 'none' && $v[$id]=0;
                    isset($v[$id]) && $tmp2[$id][$k] = $v[$id];
                }

                $success += $this->updateBase($table, $mkey . ' = ' . $id, $tmp2[$id]);
            }

            cls_msgbox::show('成功了！', "成功执行：{$success}条！", $this->pre_url, 1000);
        } elseif ($sub == 'del')
        {
            foreach ($ids as $id)
            {
                //循环操作
                $success += $this->delBase($table, $mkey . ' = ' . $id);
            }
            cls_msgbox::show('成功了！', "成功删除：{$success}条！", $this->pre_url, 1000);
        }
    }

    /**
     * 单独数据执行
     * @param type $table
     * @param type $mkey
     */
    public function doOnlyBase($table)
    {
        $sub = request('sub');
        if ($sub == 'upd' || $sub == 'del')
        {
            $id = request('id');
            $mkey = $this->showTableMainColumn($table);
            if (empty($id))
            {
                cls_msgbox::show('对不起，出错了！', '请选择操作的数据。', '-1');
            }
        }

        if ($sub == 'upd' || $sub == 'add')
        {
            $tb_column = $this->showTableColumn($table);
            $tb_c_arr = array_keys($tb_column);

            $forms = req::$forms;
			//print_r($forms);die;
            foreach ($forms as $fm_k => $fm_v)
            {
                if (!in_array($fm_k, $tb_c_arr))
                {
                    unset($forms[$fm_k]);
                }
            }

            $files = req::$files;

            if (!empty($files))
            {
                foreach ($files as $f_k => $f_v)
                {
                    if (in_array($f_k, array_keys($forms)))
                    {
                        if (empty($f_v['name']))
                        {
                            break;
                        }
                        $img_name = $f_v['name'];
						
						$img = $this->check_image('up_img');
						
                        if ($img == '')
                        {
                            cls_msgbox::show('系统提示', '图片上传失败！', '-1', 100000);
                        }
                        $forms[$f_k] = trim($img);
                        break;
                    }
                }
            }
			
           // ppr($forms);exit;

            if ($sub == 'add')
            {
                $success = $this->addBase($table, $forms);
                cls_msgbox::show('成功了！', "成功增加ID：{$success}！", $this->pre_url, 1000);
            } else
            {
                $success = $this->updateBase($table, $mkey . ' = ' . $id, $forms);
                cls_msgbox::show('成功了！', "成功修改ID：{$success}！", $this->pre_url, 1000);
            }
        } elseif ($sub == 'del')
        {
            $success = $this->delBase($table, $mkey . ' = ' . $id);
            if ($success)
            {
                cls_msgbox::show('成功了！', "成功删除：{$success}条！", $this->pre_url, 1000);
            } else
            {
                cls_msgbox::show('失败了！', "删除失败！", $this->pre_url, 1000);
            }
        }
    }

   
    
    public function doBatchBaseAd($table)
    {
        $sub = request('sub');
        $ids = request('ids', array());
//        ppr(req::$forms);exit;
        if (empty($ids))
        {
            cls_msgbox::show('对不起，出错了！', '请选择操作的数据。', '-1');
        }
        $success = 0;

        $mkey = $this->showTableMainColumn($table);
        if ($sub == 'upd')
        {
            $tb_info = $this->showTableColumn($table);
            foreach ($tb_info as $ti_key => $ti_value)
            {
                $tmp1[$ti_key] = request($ti_key);
                if (!is_array($tmp1[$ti_key]))
                {
                    unset($tmp1[$ti_key]);
                }
            }
            $tmp2 = null;
            foreach ($ids as $id)
            {
                //循环操作
                foreach ($tmp1 as $k => $v)
                {
                    //规定none为0
                    !empty($v[$id]) && $v[$id] == 'none' && $v[$id]=0;
                    if($k == 'endtime')
                    {
                        $v[$id] = strtotime($v[$id]);
                    }
                    isset($v[$id]) && $tmp2[$id][$k] = $v[$id];
//                    ppr($k);                    ppr($v);
                }
//exit;
                $success += $this->updateBase($table, $mkey . ' = ' . $id, $tmp2[$id]);
            }
            cls_msgbox::show('成功了！', "成功执行：{$success}条！", $this->pre_url, 1000);
        } elseif ($sub == 'del')
        {
            foreach ($ids as $id)
            {
                //循环操作
                $success += $this->delBase($table, $mkey . ' = ' . $id);
            }
            cls_msgbox::show('成功了！', "成功删除：{$success}条！", $this->pre_url, 1000);
        }
    }
	
	
	
	/**
     * 上传缩略图
     */
    public function check_image($save_dir)
    {
        $array_files = req::$files;
        if (!empty($array_files['yh_imgurl']['tmp_name']))
        {
            $image = self::update_image($array_files['yh_imgurl'], $save_dir);
        } else
        {
            $image = req::item('imageLink', '');
            if (!empty($image))
            {
                $allowed_extensions = array('jpg', 'gif', 'bmp', 'png', 'jpeg');
                $file = explode(".", $image);
                $extension = array_pop($file);
                if (empty($extension) || !in_array($extension, $allowed_extensions))
                    cls_msgbox::show('系统提示', '上传图片格式有误！', '-1');
            }
        }
        if (empty($image))
            return '';
        return $image;
    }
	
	
	//编码有特殊字符的字符串便于存储
    function getStrEncode($param)
    {
        if (!empty($param))
        {

            $param = str_replace(array('\\\\\\', '\\\\', '\\"', '\\\''), array('\\', '\\', '"', '\''), $param);
            return trim(base64_encode($param));
        }
        return NULL;
    }

    //解码有特殊字符的字符串
    function getStrDecode($param)
    {
        if (!empty($param))
        {
            $param = trim(base64_decode($param));
            return str_replace(array('\\\\\\', '\\\\', '\\"', '\\\''), array('\\', '\\', '"', '\''), $param);
        }
        return NULL;
    }
	
	
	
	
	//图片上传
    public static function update_image($imgurl,$save_dir) 
    {
        if (empty($imgurl['name'])) 
        {
            return null;
        }else{
            $tem_arr = explode('.', $imgurl['name']);
            $ext = array_pop($tem_arr);//图片扩展名
            if( !preg_match("#(gif|jpg|png)#", $ext) ) {
                cls_msgbox::show('系统提示', '上传图片格式有误！', '-1');
            }
            //上传文件大小限制, 单位BYTE
            $max_file_size=500000;     
            //上传文件类型列表
             if($max_file_size < $imgurl['size']) 
             {
                cls_msgbox::show('系统提示', '上传图片太大！', '-1');
             }

            $shouji_root_dir = PATH_ROOT.'/img/';
            $android_pic_dir = $shouji_root_dir.$save_dir.'/';
            $imgUrl  = $android_pic_dir.date("Ym").'/'; ## 绝对路径
            $relaUrl = '/img/'.$save_dir.'/'.date("Ym").'/'; ## 相对路径
            if (file_exists ($imgUrl) === false) mkdir ( $imgUrl, 0777, true );

            $file_name =time().rand(10000,99999).'.'.$ext;
            $local_File = $imgUrl.$file_name;  //绝对路径
            $relative_File  = $relaUrl.$file_name; //相对路径            
    
            if (move_uploaded_file($imgurl['tmp_name'], $local_File))
            {
                return $relative_File;
            }else{
                cls_msgbox::show('系统提示', '图片上传失败22！'.$imgurl['tmp_name'].'  to '.$local_File, '-1');exit;
            }
        }
    }    

    
}

?>