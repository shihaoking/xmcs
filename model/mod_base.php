<?php

if (!defined('CORE'))
    exit('Request Error!');

class mod_base
{

    public $opt;
    public $pre_url;

    //==============公用=======================================================
    //==============公用=======================================================
    //==============公用=======================================================
    //==============公用=======================================================
    //==============公用=======================================================
    /**
     * 将一个字串中含有全角的数字字符、字母、空格或'%+-()'字符转换为相应半角字符
     * @access public
     * @param string $str 待转换字串
     * @return string $str 处理后字串
     */
    function makeSemiangle($str)
    {
        $arr = array('０' => '0', '１' => '1', '２' => '2', '３' => '3', '４' => '4', '５' => '5', '６' => '6', '７' => '7', '８' => '8', '９' => '9', 'Ａ' => 'A', 'Ｂ' => 'B', 'Ｃ' => 'C', 'Ｄ' => 'D', 'Ｅ' => 'E', 'Ｆ' => 'F', 'Ｇ' => 'G', 'Ｈ' => 'H', 'Ｉ' => 'I', 'Ｊ' => 'J', 'Ｋ' => 'K', 'Ｌ' => 'L', 'Ｍ' => 'M', 'Ｎ' => 'N', 'Ｏ' => 'O', 'Ｐ' => 'P', 'Ｑ' => 'Q', 'Ｒ' => 'R', 'Ｓ' => 'S', 'Ｔ' => 'T', 'Ｕ' => 'U', 'Ｖ' => 'V', 'Ｗ' => 'W', 'Ｘ' => 'X', 'Ｙ' => 'Y','Ｚ' => 'Z', 'ａ' => 'a', 'ｂ' => 'b', 'ｃ' => 'c', 'ｄ' => 'd','ｅ' => 'e', 'ｆ' => 'f', 'ｇ' => 'g', 'ｈ' => 'h', 'ｉ' => 'i','ｊ' => 'j', 'ｋ' => 'k', 'ｌ' => 'l', 'ｍ' => 'm', 'ｎ' => 'n','ｏ' => 'o', 'ｐ' => 'p', 'ｑ' => 'q', 'ｒ' => 'r', 'ｓ' => 's', 'ｔ' => 't', 'ｕ' => 'u', 'ｖ' => 'v', 'ｗ' => 'w', 'ｘ' => 'x', 'ｙ' => 'y', 'ｚ' => 'z','（' => '(', '）' => ')', '〔' => '[', '〕' => ']', '【' => '[', '】' => ']', '〖' => '[', '〗' => ']', '｛' => '{', '｝' => '}', '《' => '<', '》' => '>', '％' => '%', '＋' => '+', '—' => '-', '－' => '-', '～' => '-', '：' => ':', '。' => '.', '、' => ',', '，' => '.', '、' => '.', '；' => ',', '？' => '?', '！' => '!', '…' => '-', '‖' => '|', '”' => '"', "\'" => '`', '‘' => '`', '｜' => '|', '〃' => '"', '　' => ' ');
        return strtr($str, $arr);
        }
        /**
     * 得到数据表的字段
     * @param type $tablename
     * @return type
     */
    function showTableColumn($tablename)
    {
        $re = cache::get(__CLASS__, __FUNCTION__ . '_' . $tablename);
        if (empty($re))
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
            cache::set(__CLASS__, __FUNCTION__ . '_' . $tablename, $re, -1);
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
        $re = cache::get(__CLASS__, __FUNCTION__ . '_' . $tablename);
        if (empty($re))
        {
            $sql = "select COLUMN_KEY k,COLUMN_NAME n from INFORMATION_SCHEMA.COLUMNS where table_name='$tablename' AND COLUMN_KEY='PRI'";
            $query = db::query($sql);
            $arr = db::fetch_all($query);
            $re = $arr[0]['n'];
            cache::set(__CLASS__, __FUNCTION__ . '_' . $tablename, $re, -1);
        }
        return $re;
//        ppr($arr);
    }

    /**
     * 跳转到404页面,404页面为环境指定页
     */
    function turnTo404()
    {
        header('HTTP/1.1 404 Not Found');
        header('status: 404 Not Found');
        exit();
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
    function selectBase($table, $where = '1=1', $order = null, $limit = null, $fields = '*', $group = null)
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

    function selectOneBase($table, $where = '1=1', $order = null, $fields = '*')
    {
        empty($where) && $where = '1=1'; 
        $arr = $this->selectBase($table, $where, $order, "LIMIT 1", $fields);
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
                        $hz = strrchr($img_name, '.');
                        $dirname = date('Ym');
                        $filename = $dirname . '/' . date('YmdHis') . $hz;
						
						

                        if (!is_dir(PATH_ROOT . $this->opt['images_upload_dir'] . $dirname))
                        {
                            mkdir(PATH_ROOT . $this->opt['images_upload_dir'] . $dirname);
                        }
						
						
                        $uploadfile = $this->opt['images_upload_dir'] . $filename;
						
						

                        if (false === $this->imageUpload($f_v, PATH_ROOT . $uploadfile))
                        {
                            cls_msgbox::show('系统提示', '图片上传失败！', '-1', 100000);
                        }
                        $forms[$f_k] = trim($filename);
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

    /**
     * 取值或增加
     * @param type $table
     * @param type $where
     * @param type $set
     * @param type $fields
     */
    public function doBaseGetOrAdd($table, $where, $set, $fields = '*')
    {
        $sitearr = $this->selectOneBase($table, $where, null, $fields);
        if (empty($sitearr))
        {
            $id = $this->addBase($table, $set);
        } else
        {
            $id = $sitearr[$this->showTableMainColumn($table)];
        }
        return $id;
    }

    /**
     * 图片上传
     * @param $img_array 上传的files
     * @param $uploadfile 要传到的位置文件名
     */
    public function imageUpload($img_array, $uploadfile)
    {
        /*
          [name] => 图吧 大朗.png
          [type] => image/png
          [tmp_name] => D:\xampp\tmp\php2C.tmp
          [error] => 0
          [size] => 164187
         */
        if (empty($img_array['name']))
        {
            return false;
        } else
        {
            //上传文件大小限制, 单位BYTE
            $max_file_size = 500000;
            //上传文件类型列表
            $uptypes = array(
                'image/gif',
                'image/bmp',
                'image/x-png',
                'image/png',
                'image/pjpeg',
                'image/jpeg',
                'image/jpg'
            );

            if (!in_array($img_array['type'], $uptypes))
            {
                cls_msgbox::show('系统提示', '上传图片格式有误！', '');
            }

            if ($max_file_size < $img_array['size'])
            {
                cls_msgbox::show('系统提示', '上传图片太大！', '');
            }
            $img_array['tmp_name'] = str_replace('\\\\', '\\', $img_array['tmp_name']);

            if (false === move_uploaded_file($img_array['tmp_name'], $uploadfile))
            {
                return false;
            } else
            {
                if (is_file($uploadfile))
                {
                    return true;
                } else
                {
                    return FALSE;
                }
            }
        }
    }

    //下载到本地
    function httpcopy($url, $file = "", $timeout = 600)
    {
        if (empty($file))
            return false;
        $dir = pathinfo($file, PATHINFO_DIRNAME);
        !is_dir($dir) && @mkdir($dir, 0755, true);
        $url = str_replace(" ", "%20", $url);

        if (function_exists('curl_init'))
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $temp = curl_exec($ch);
            curl_close($ch);
            if (@file_put_contents($file, $temp))
            {
                return $file;
            } else
            {
                return false;
            }
        } else
        {
            $opts = array(
                "http" => array(
                    "method" => "GET",
                    "header" => "",
                    "timeout" => $timeout)
            );
            $context = stream_context_create($opts);
            if (@copy($url, $file, $context))
            {
                //$http_response_header
                return $file;
            } else
            {
                return false;
            }
        }
    }

    //==============前台=======================================================
    //==============前台=======================================================
    //==============前台=======================================================
    //==============前台=======================================================
    //==============前台=======================================================
    /**
     * 前台的分页,供覆盖
     * @param type $url
     * @param type $page_no
     * @param type $page_size
     * @param type $total_result
     * @param type $jt
     * @return boolean|string
     */
    function getPagination($url, $page_no, $page_size, $total_result, $jt = 0)
    {
        $start = ($page_no - 1) * $page_size;
        if ($jt == 0)
        {
            $cat_p_1 = '&p=';
            $cat_p_2 = '';
            $url = '?d=' . $url;
        } else
        {
            $cat_p_1 = '_';
            $cat_p_2 = '.html';
        }

//util::pre_print_r($url);util::pre_print_r($cat_p_1);util::pre_print_r($cat_p_2);
        if (empty($url))
        {
            $url = preg_replace('/start=\d+/i', '', '?' . $_SERVER['QUERY_STRING']);
            $url = preg_replace('/&{2,}/', '&', $url);
        }

        // 总记录数
        $total_result = empty($total_result) ? 0 : (int) $total_result;
        // 每页显示数
        $page_size = empty($page_size) ? 10 : (int) $page_size;
        // 总页数
        $count_page = ceil($total_result / $page_size);
        // 当前页数
        $current_page = max(1, ceil($start / $page_size) + 1);

        // 总页数不到二页时不分页
        if ($count_page < 2)
        {
            return false;
        }
        // 分页内容
        $pages = '<div class="pages">';

        // 下一页
        $next_page = $page_no + 1;
        // 上一页
        $prev_page = $page_no - 1;


        $flag = 0;

        if ($current_page > 1)
        {
            // 首页

            $pages .= "<a target='_self'  href='{$url}{$cat_p_1}1{$cat_p_2}' class='prev'>|&lt;</a>";
//			$pages .= "<a href='{$url}' class='nextprev'>&laquo;首页</a>";
            // 上一页
            $pages .= "<a target='_self' href='{$url}{$cat_p_1}{$prev_page}{$cat_p_2}' class='prev'>&lt;</a>";
//			$pages .= "<a href='{$url}&p={$prev_page}' class='nextprev'>&laquo;上一页</a>";
        } else
        {
            //$pages .= "<span class='nextprev'>&laquo;首页</span>";
            //$pages .= "<span class='nextprev'>&laquo;上一页</span>";
        }
        // 前偏移
        for ($i = $current_page - 6; $i <= $current_page - 1; $i++)
        {
            if ($i < 1)
            {
                continue;
            }

            $pages .= "<a target='_self' href='{$url}{$cat_p_1}{$i}{$cat_p_2}'>$i</a>";
        }
        // 当前页
        $pages .= "<a class='current'>" . $current_page . "</a>";
        // 后偏移
        if ($current_page < $count_page)
        {
            for ($i = $current_page + 1; $i <= $count_page; $i++)
            {
                $pages .= "<a target='_self' href='{$url}{$cat_p_1}{$i}{$cat_p_2}'>$i</a>";

                $flag++;

                if ($flag == 6)
                {
                    break;
                }
            }
        }
        if ($current_page != $count_page)
        {
            // 下一页
            $pages .= "<a target='_self' href='{$url}{$cat_p_1}{$next_page}{$cat_p_2}' class='next'>&gt;</a>";

//			$pages .= "<a href='{$url}&p={$next_page}' class='nextprev'>下一页&raquo;</a>";
            // 末页
            $pages .= "<a target='_self' href='{$url}{$cat_p_1}{$count_page}{$cat_p_2}' class='next'>&gt;|</a>";
//			$pages .= "<a href='{$url}&p={$last_page}'>末页&raquo;</a>";
        } else
        {
            //$pages .= "<span class='nextprev'>下一页&raquo;</span>";
            //$pages .= "<span class='nextprev'>末页&raquo;</span>";
        }
//		$pages .= "<span>共 {$count_page} 页，{$total_result} 记录</span>";
        $pages .= '</div>';

        return $pages;
        //return pagination ( $config );
    }

    //==============后台=======================================================
    //==============后台=======================================================
    //==============后台=======================================================
    //==============后台=======================================================
    //==============后台=======================================================

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
     * 写入日志
     */
    public function setLog($channel, $contents)
    {
        //日志目录
        $path = PATH_ROOT . '/data/log/index/';
//        mkdir($path,0777);
        //检查权限
        if (!is_dir($path))
        {
            if (!@mkdir($path, 0777, true))
            {
                exit("无法创建目录$path，请检查是否具有相应目录的写权限");
            }
        }

        if (!is_writable($path))
        {
            exit("目录$path没有写权限，请为此目录加上写权限");
        }

        //日志名组合
        $filename = date('Ymd', $_SERVER['REQUEST_TIME']) . '_' . $channel . '.log';
        //日志内容
        $msg = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . "\t " . date('Y-m-d H:i:s') . " \t $contents\r\n";
        echo($filename);
        echo($msg);
        //写入日志
        @file_put_contents($path . $filename, $msg, FILE_APPEND | LOCK_EX);
    }

    /**
     * 读出日志
     */
    public function getLog($site)
    {
        //日志目录
        $path = PATH_ROOT . '/data/log/index/';
        $d = date('Ymd');
        $site = $site == 'bazi5' ? 'bazi5' : $site;
//        mkdir($path,0777);
        //检查权限
        if (!is_dir($path))
        {
            if (!@mkdir($path, 0777, true))
            {
                exit("无法创建目录$path，请检查是否具有相应目录的写权限");
            }
        } else
        {
            $re = null;
            $dp = dir($path);
            while ($file = $dp->read())
                if ($file != '.' && $file != '..' && FALSE !== strpos($file, $d) && FALSE !== strpos($file, $site))
                {
                    $re[] = file($path . $file);
                }
            $dp->close();
        }

        return $re;
    }

    /**
     * redis简单hash缓存方法
     * @param type $type 操作方式
     * @param type $key 键名,用 分类_hash来区分 至少有一个_分割,前面的是hash的tbkey表名,后面的是表内的key
     * @param type $value 键值, 'i'有效
     * @param type $second 默认24小时,仅set时候有效
      'hset': //hash方式写入tbkey中的key的值
      'hgetall': // 名称为tbkey的hash中所有的key和其对应的value
      'hget': //hash方式取出tbkey中的key的值
      'hdel': //hash方式删除tb下的key
      'del': //删除hash中的一个tbkey中所有key的值或者非hash的一个key下的值
      'flush': //清空当前数据库,set 和hset均可
      'hkeys': //返回hash中名称为tbkey中所有key的数组
      'keys': // 所有非hash的key或者hash的tbkey
      'hvals': //hash中tbkey下的所有value的数组
      'hlen': //hash的tbkey下的元素个数
      'hincby': // hash中tbkey下key的值的增量
     */
    function cacheRedis($type, $key = null, $value = null, $datatype = 'str', $second = 86400)
    {
        $redis = new redis();
        $redis->pconnect($GLOBALS['config']['cache']['redis']['host'], $GLOBALS['config']['cache']['redis']['port']);
		
        $re = null;
        $kn = substr_count($key, '_');
        $tb = substr($key, 0, strpos($key, '_'));
		
		
        switch ($type)
        {
            case 'hset': //hash方式写入
                //需要至少用_连接起来的键名
                if (!empty($value) && count($kn) >= 1)
                {
                    if ($datatype != 'str')
                    {
						
						
                        $value = util::arrToStr($value);
						
                    }
					
					

                    // hSet   $redis->hSet('h', 'key1', 'hello');   向名称为h的hash中添加元素key1—>hello
                    $re = $redis->hSet($tb, $key, $value);
					//echo $key;
					if($re){
						//echo 'OKK';
						}else{
						//	echo 'noo';
							}
                }
                break;

            case 'hgetall': // 名称为h的hash中所有的键（field）及其对应的value
                //hGetAll  $redis->hGetAll('h');  返回名称为h的hash中所有的键（field）及其对应的value
                $re = $redis->hGetAll($key); //$key 这里是hash表名
                break;

            case 'hget': //hash方式取出
                // hExists  $redis->hExists('h', 'a');  名称为h的hash中是否存在键名字为a的域
                if ($redis->hExists($tb, $key) && count($kn) >= 1)
                {
                    //hGet  $redis->hGet('h', 'key1');  返回名称为h的hash中key1对应的value（hello）
                    $re = $redis->hGet($tb, $key);
                    if ($datatype != 'str')
                    {
                        $re = util::strToArr($re);
                    }
                }

                break;

            case 'hdel': //hash方式删除tb下的key
                if ($redis->hExists($tb, $key) && count($kn) >= 1)
                {
                    // hDel  $redis->hDel('h', 'key1');  删除名称为h的hash中键为key1的域
                    $re = $redis->hDel($tb, $key);
                }
                break;

            case 'del': //删除hash的一个tbkey
                if ($redis->exists($key))
                {
                    $re = $redis->del($key);
                }
                break;

            case 'flush': //清空当前数据库,set 和hset均可
                $re = $redis->flushDB();
                break;

            case 'hkeys': //返回表名称为h的hash中所有key的数组
                // hKeys  $redis->hKeys('h');  返回表名称为h的hash中所有键名
                $re = $redis->hKeys($key); //$key 这里是hash表名
                break;

            case 'keys': // 所有非hash的key和hash的tbkey
                if (empty($key))
                {
                    $re = $redis->keys('*');
                } else
                {
                    $re = $redis->keys($key);
                }
                break;

            case 'hvals': //hash中tbkey下的所有value的数组
                // hVals  $redis->hVals('h')  返回名称为h的hash中所有键对应的value
                $re = $redis->hVals($key); //$key 这里是hash表名
                break;

            case 'hlen': //tbkey下的元素个数
                // hLen  $redis->hLen('h');  返回表名称为h的hash中元素个数
                $re = $redis->hLen($key); //$key 这里是hash表名
                break;

            case 'hexists': //判断有无
                $re = $redis->hExists($key); //$key 这里是hash表名
                break;

            case 'hincby': // hash中tbkey下key的值的增量
                // hIncrBy  $redis->hIncrBy('h', 'x', 2);  将名称为h的hash中x的value增加2
                $re = $redis->hIncrBy($tb, $key, $value);
                break;

            case 'hmset': //批量写入
                //需要至少用_连接起来的键名
                if (!empty($value) && !empty($key))
                {
                    if (is_array($value) && count($value) == count($value, 1))
                    {
                        // hMset  $redis->hMset('user:1', array('name' => 'Joe', 'salary' => 2000));  向名称为key的hash中批量添加元素
                        $re = $redis->hMset($key, $value); //$key 这里是hash表名,$value是一维数组
                    }
                }
                break;


            case 'hmget': //批量取出
                if (is_array($value) && count($value) == count($value, 1))
                {
                    // hMGet  $redis->hmGet('h', array('field1', 'field2'));  返回名称为h的hash中field1,field2对应的value
                    $re = $redis->hmGet($key, $value); //$key 这里是hash表名,$value是一维数组,键名数组
                }
                break;

            case 'set': //写入
                //需要至少用_连接起来的键名
                $kn = substr_count($key, '_');
                if (!empty($value) && count($kn) >= 1)
                {
                    if ($datatype != 'str')
                    {
                        $value = util::arrToStr($value);
                    }

                    if (empty($second))
                    {
                        $re = $redis->set($key, $value);
                    } else
                    {
                        $re = $redis->setex($key, $second, $value);
                    }
                }

                break;

            case 'get': //取出

                if ($redis->exists($key))
                {
                    $re = $redis->get($key);

                    if ($datatype != 'str')
                    {
                        $re = util::strToArr($re);
                    }
                }

                break;
        }
        return $re;
    }

    /**
     * 后台的分页
     * @param type $url
     * @param type $page_no
     * @param type $page_size
     * @param type $total_result
     * @return boolean|string
     */
    public function getPaginationBc($url, $page_no, $page_size, $total_result)
    {
        $config['start'] = ($page_no - 1) * $page_size;
        $config['per_count'] = $page_size;
        $config['count_number'] = $total_result;
        $config['url'] = $url;

        $config['url'] = empty($config['url']) ? '' : $config['url'];
        // 总记录数
        $config['count_number'] = empty($config['count_number']) ? 0 : (int) $config['count_number'];
        // 每页显示数
        $config['per_count'] = empty($config['per_count']) ? 10 : (int) $config['per_count'];
        // 总页数
        $config['count_page'] = ceil($config['count_number'] / $config['per_count']);
        // 分页名
        $config['page_name'] = empty($config['page_name']) ? 'start' : $config['page_name'];
        // 当前页数
        $config['current_page'] = max(1, ceil($config['start'] / $config['per_count']) + 1);

        // 总页数不到二页时不分页
        if (empty($config) or $config['count_page'] < 2)
        {
            return false;
        }
        // 分页内容
        $pages = '<div class="page">';
        // $pages = '';
        // 下一页
        $next_page = $config['start'] + $config['per_count'];
        // 上一页
        $prev_page = $config['start'] - $config['per_count'];
        // 末页
        $last_page = ($config['count_page'] - 1) * $config['per_count'];


        $flag = 0;

        if ($config['current_page'] > 1)
        {
            // 首页
            $pages .= "<a href='{$config['url']}' class='nextprev'>&laquo;首页</a>\n";
            // 上一页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$prev_page}' class='nextprev'>&laquo;上一页</a>\n";
        } else
        {
            $pages .= "<span class='nextprev'>&laquo;首页</span>\n";
            $pages .= "<span class='nextprev'>&laquo;上一页</span>\n";
        }
        // 前偏移
        for ($i = $config['current_page'] - 6; $i <= $config['current_page'] - 1; $i ++)
        {
            if ($i < 1)
            {
                continue;
            }

            $_start = ($i - 1) * $config['per_count'];


            $pages .= "<a href='{$config['url']}&{$config['page_name']}=$_start'>$i</a>\n";
        }
        // 当前页
        $pages .= "<span class='current'>" . $config['current_page'] . "</span>\n";
        // 后偏移
        if ($config['current_page'] < $config['count_page'])
        {
            for ($i = $config['current_page'] + 1; $i <= $config['count_page']; $i ++)
            {
                $_start = ($i - 1) * $config['per_count'];

                $pages .= "<a href='{$config['url']}&{$config['page_name']}=$_start'>$i</a>\n";

                $flag ++;

                if ($flag == 6)
                {
                    break;
                }
            }
        }
        if ($config['current_page'] != $config['count_page'])
        {
            // 下一页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$next_page}' class='nextprev'>下一页&raquo;</a>\n";
            // 末页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$last_page}'>末页&raquo;</a>\n";
        } else
        {
            $pages .= "<span class='nextprev'>下一页&raquo;</span>\n";
            $pages .= "<span class='nextprev'>末页&raquo;</span>\n";
        }
        // 输入框跳转
        if (!empty($config['input']))
        {
            $pages .= '<input type="text" onkeydown="javascript:if(event.keyCode==13){ var offset = ' . $config['per_count'] . '*(this.value-1);location=\'' . $config["url"] . '&' . $config["page_name"] . '=\'+offset;}" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        }
        $pages .= "<span>共 {$config['count_page']} 页，{$config['count_number']} 记录</span>\n";
        $pages .= '</div>';

        return $pages;
        //return pagination ( $config );
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
     * 数据列表被修正,此处供覆盖
     * @param type $table
     * @param type $param
     * @return type
     */
    public function lurdModConfig($table, $param)
    {
        return $param;
    }

//==============采集=========================================================
//==============采集=========================================================
//==============采集=========================================================
//==============采集=========================================================
//==============采集=========================================================

    /**
     * 采集器
     * @param array $opt_arr
     * @return type
      $url = "http://www.iteye.com/news";
      $reg = array("title"=>array(".content h3 a:eq(1)","text"),"url"=>array(".content h3 a:eq(1)","href"));
      $rang = "#index_main .news";
     */
    public function caiQueryHtml(array $opt_arr)
    {
        include PATH_LIBRARY . '/mycai/QueryList.class.php';
        ;

        empty($opt_arr['type']) && $opt_arr['type'] = 'curl';
        empty($opt_arr['code']) && $opt_arr['code'] = FALSE;

        $obj = new QueryList($opt_arr['url'], $opt_arr['reg'], $opt_arr['range'], $opt_arr['type'], $opt_arr['code']);

        if (empty($opt_arr['limit']))
        {
            return $obj->jsonArr;
        } else
        {
            return array_slice($obj->jsonArr, 0, (int) $opt_arr['limit']);
        }
    }

    /**
     * 解析xml或者json到规定数组
     * @param array $opt_arr
      'url'=>'http://news.ifeng.com/rss/index.xml',
      'file'=>'/data/youxi3_data/api/ifeng.xml',
      'rule'=>array('rss','channel','item'),
      'turn'=>array(
      'title' => 'name',
      'link' => 'url',
      'author' => 'zz',
      'guid' => 'gid',
      'category' => 'type',
      'pubDate' => 'uptime',
      'comments' => 'comm',
      'description' => 'desc',
      ),
     */
    public function caiXmlJson(array $opt_arr, $type = 'xml', $step = null)
    {
        if (!empty($opt_arr['url']) && !empty($opt_arr['file']))
        {
            $localfile = PATH_ROOT . $opt_arr['file'];

            if (FALSE) //上线
//            if (TRUE) //测试
            {
                if (file_exists($localfile))
                {
                    $filestr = $localfile;
                } else
                {
                    $filestr = $this->httpcopy($opt_arr['url'], $localfile);
                }
            } else
            {
                $filestr = $this->httpcopy($opt_arr['url'], $localfile);
            }

            if ($type == 'xml')
            {
                $arr = util::xml2array(file_get_contents($filestr));
            } elseif ($type == 'cdata_xml')
            {
                $arr = util::xml2array(str_replace(array('&lt;', '&gt;'), array('<', '>'), file_get_contents(($filestr))));
            } elseif ($type == 'json')
            {
                $arr = json_decode(file_get_contents($filestr), TRUE);
            }
        }

        if (!empty($step) && $step == 1)
        {
            ppr($arr);
            exit;
        }

        //提取出循环数组
        /*
         * $opt_arr['rule'] = array();
         */
        if (!empty($opt_arr['rule']) && !empty($arr))
        {
            foreach ($opt_arr['rule'] as $r)
            {
                !empty($arr[$r]) && $arr = $arr[$r];
            }
        }

        if (!empty($step) && $step == 2)
        {
            ppr($arr);
            exit;
        }


        //字段名转换
        $re = array();
        if (!empty($arr) && !empty($opt_arr['turn']))
        {
            foreach ($arr as $ka => $va)
            {
                if (!empty($va) && is_array($va))
                {
                    foreach ($va as $kva => $vva)
                    {
                        if (is_array($vva))
                        {
                            //遍历规则
                            if (!empty($opt_arr['turn']['ARRAY']))
                            {
                                foreach ($opt_arr['turn']['ARRAY'] as $kt => $vt)
                                {
                                    $continue = 0;
                                    $vt_arr = explode('_', $vt);

                                    //判断第一个是否符合,不符合直接pass
                                    if ($kva != $vt_arr[0])
                                    {
                                        continue;
                                    }

                                    $tmp = $vva;
                                    $c = count($vt_arr);

                                    for ($i = 1; $i < $c; $i++)
                                    {
                                        //若键名存在,则继续
                                        if (empty($tmp[$vt_arr[$i]]))
                                        {
                                            unset($tmp);
                                            $continue = 1;
                                            break;
                                        } else
                                        {
                                            $tmp1 = $tmp[$vt_arr[$i]];
                                            unset($tmp);
                                            $tmp = $tmp1;
                                            unset($tmp1);
                                        }
                                    }

                                    if ($continue == 1)
                                    {
                                        continue;
                                    }

                                    $re[$ka][$kt] = $tmp;
                                }
                            }
//                        ppr($re);exit;
                        } else
                        {
                            if (!empty($opt_arr['turn']))
                            {
                                foreach ($opt_arr['turn'] as $ko => $vo)
                                {
                                    if ($kva == $vo)
                                    {
                                        if($ko == 'url' && !empty($opt_arr['preurl']))
                                        {
                                            $vva = $opt_arr['preurl'].$vva;
                                        }
                                        
                                        if(($ko == 'listimg' || $ko == 'detailimg' || $ko == 'otherimg') && !empty($opt_arr['preimg']))
                                        {
                                            $vva = $opt_arr['preimg'].$vva;
                                        }
                                        
                                        $re[$ka][$ko] = $vva;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if (!empty($step) && $step == 3)
        {
            ppr($re);
            exit;
        }
        unset($opt_arr, $arr);
        return $re;
//        ppr($re);exit;
    }

    /**
     * 写入日志
     */
    function set_log($channel, $contents)
    {
        //日志目录
        $path = PATH_ROOT . '/data/log/' . $channel . '/';

        //检查权限
        if (!is_dir($path))
        {
            if (!@mkdir($path, 0777, true))
            {
                exit("无法创建目录$path，请检查是否具有相应目录的写权限");
            }
        }

        if (!is_writable($path))
        {
            exit("目录$path没有写权限，请为此目录加上写权限");
        }

        //日志名组合
        $filename = date('Ymd', $_SERVER['REQUEST_TIME']) . '_' . $channel . '.log';
        //日志内容
        $msg = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . "\t " . date('Y-m-d H:i:s') . " \t $contents\r\n";
//        echo($filename);        echo($msg);exit; 
        //写入日志
        @file_put_contents($path . $filename, $msg, FILE_APPEND | LOCK_EX);
    }

    /**
     * 如果成功，则返回已过滤的数据，如果失败，则返回 false
     * @param type $str
     * @param type $filterid
     * @param type $opt
      FiltersID名称：描述
      FILTER_CALLBACK：调用用户自定义函数来过滤数据。
      FILTER_SANITIZE_STRING：去除标签，去除或编码特殊字符。
      FILTER_SANITIZE_STRIPPED："string" 过滤器的别名。
      FILTER_SANITIZE_ENCODED：URL-encode 字符串，去除或编码特殊字符。
      FILTER_SANITIZE_SPECIAL_CHARS：HTML 转义字符 '"<>& 以及 ASCII 值小于 32 的字符。
      FILTER_SANITIZE_EMAIL：删除所有字符，除了字母、数字以及 !#$%&'*+-/=?^_`{|}~@.[]
      FILTER_SANITIZE_URL：删除所有字符，除了字母、数字以及 $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=
      FILTER_SANITIZE_NUMBER_INT：删除所有字符，除了数字和 +-
      FILTER_SANITIZE_NUMBER_FLOAT：删除所有字符，除了数字、+- 以及 .,eE。
      FILTER_SANITIZE_MAGIC_QUOTES：应用 addslashes()。
      FILTER_UNSAFE_RAW：不进行任何过滤，去除或编码特殊字符。
      FILTER_VALIDATE_INT：在指定的范围以整数验证值。
      FILTER_VALIDATE_BOOLEAN：如果是 "1", "true", "on" 以及 "yes"，则返回 true，如果是 "0", "false", "off", "no" 以及 ""，则返回 false。否则返回 NULL。
      FILTER_VALIDATE_FLOAT：以浮点数验证值。
      FILTER_VALIDATE_REGEXP：根据 regexp，兼容 Perl 的正则表达式来验证值。
      FILTER_VALIDATE_URL：把值作为 URL 来验证。
      FILTER_VALIDATE_EMAIL：把值作为 e-mail 来验证。
      FILTER_VALIDATE_IP：把值作为 IP 地址来验证。
     */
    function strFilter($str, $filterid, $opt = null)
    {
        switch ($filterid)
        {
            case 'string':
                $filterid = FILTER_SANITIZE_STRING; //去除标签，去除或编码特殊字符。 
                break;
            case 'encode':
                $filterid = FILTER_SANITIZE_ENCODED; //URL-encode 字符串，去除或编码特殊字符。
                break;
            case 'spacial_chars':
                $filterid = FILTER_SANITIZE_SPECIAL_CHARS; //HTML 转义字符 '"<>& 以及 ASCII 值小于 32 的字符。 
                break;
            case 'email':
                $filterid = FILTER_SANITIZE_EMAIL; //删除所有字符，除了字母、数字以及 !#$%&'*+-/=?^_`{|}~@.[] 
                break;
            case 'url':
                $filterid = FILTER_SANITIZE_URL; //删除所有字符，除了字母、数字以及 $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&= 
                break;
            case 'int':
                $filterid = FILTER_SANITIZE_NUMBER_INT; //删除所有字符，除了数字和 +- 
                break;
            case 'float':
                $filterid = FILTER_SANITIZE_NUMBER_FLOAT; //删除所有字符，除了数字、+- 以及 .,eE。 
                break;
            case 'quotes':
                if (get_magic_quotes_gpc())
                {
                    /*

                      FILTER_FLAG_STRIP_LOW - 去除 ASCII 值在 32 以下的字符
                      FILTER_FLAG_STRIP_HIGH - 去除 ASCII 值在 32 以上的字符
                      FILTER_FLAG_ENCODE_LOW - 编码 ASCII 值在 32 以下的字符
                      FILTER_FLAG_ENCODE_HIGH - 编码 ASCII 值在 32 以上的字符
                      FILTER_FLAG_ENCODE_AMP - 把 & 字符编码为 &amp;
                     */
                    $filterid = FILTER_UNSAFE_RAW; //不进行任何过滤，去除或编码特殊字符。 
                } else
                {
                    $filterid = FILTER_SANITIZE_MAGIC_QUOTES; //应用 addslashes()。 
                }
                break;
            //上面是过滤,下面是验证
            case 'int_y':
                $filterid = FILTER_VALIDATE_INT; //在指定的范围以整数验证值。
                break;
            case 'boolean_y':
                $filterid = FILTER_VALIDATE_BOOLEAN; //如果是 "1", "true", "on" 以及 "yes"，则返回 true，如果是 "0", "false", "off", "no" 以及 ""，则返回 false。否则返回 NULL。
                break;
            case 'float_y':
                $filterid = FILTER_VALIDATE_FLOAT; //以浮点数验证值。 
                break;
            case 'url_y':
                $filterid = FILTER_VALIDATE_URL; //把值作为 URL 来验证。 
                break;
            case 'email_y':
                $filterid = FILTER_VALIDATE_EMAIL; //把值作为 e-mail 来验证。 
                break;
            case 'ip_y':
                $filterid = FILTER_VALIDATE_IP; //把值作为 IP 地址来验证。
                break;

            default:
                break;
        }

        return filter_var($str, $filterid, $opt);
    }

    public function arrInputFilter($opt)
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
     * 得到首字母
     * @param type $str
     * @param type $start
     * @param type $length
     * @return type
     */
    public function getSzm($str,$start=0, $length=1)
    {
        $py = new str2PY();
        $szm = $py->getInitials($str);
        if(!empty($length))
        {
            return substr($szm, $start, $length);
        }  else
        {
            return substr($szm, $start);
        }
    }
    
    //追溯函数位置
    function function_dump($funcname)
    {
        try {
            if (is_array($funcname))
            {
                $func = new ReflectionMethod($funcname[0], $funcname[1]);
                $funcname = $funcname[1];
            } else
            {
                $func = new ReflectionFunction($funcname);
            }
        } catch (ReflectionException $e) {
            echo $e->getMessage();
            return;
        }
        $start = $func->getStartLine() - 1;
        $end = $func->getEndLine() - 1;
        $filename = $func->getFileName();
        echo "function $funcname defined by $filename($start - $end)\n";
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

}

class doImg
{

//图片格式
    private $exts = array('jpg', 'jpeg', 'gif', 'bmp', 'png');

    public function __construct()
    {
        if (!function_exists('gd_info'))
        {
            throw new Exception('加载GD库失败！');
        }
    }

    /**
     * 宽度固定width
     * @param type $src_img
     * @param type $save_img
     * @param type $w
     * @return type
     */
    public function thumb_img_w($src_img, $save_img = '', $width)
    {
        if (empty($width))
        {
            return array('flag' => False, 'msg' => '原图宽度不能小于0');
        }
        $org_ext = $this->is_img($src_img);
        if (!$org_ext ['flag'])
        {
            return $org_ext;
        }
//如果有保存路径，则确定路径是否正确
        if (!empty($save_img))
        {
            $f = $this->check_dir($save_img);
            if (!$f ['flag'])
            {
                return $f;
            }
        }
//获取出相应的方法
        $org_funcs = $this->get_img_funcs($org_ext ['msg']);
//获取原大小
        $source = $org_funcs ['create_func']($src_img);
        $src_w = imagesx($source); //240
        $src_h = imagesy($source); //135
        //目标图像长宽比
        $src_scale = $src_h / $src_w; //  135/240 原图比例
        $final_w = intval($width);
        $final_h = intval($width * $src_scale);
        $target = imagecreatetruecolor($final_w, $final_h);

        $croped = imagecreatetruecolor($src_w, $src_h);
        imagecopy($croped, $source, 0, 0, 0, 0, $src_w, $src_h);

        imagecopyresampled($target, $croped, 0, 0, 0, 0, $final_w, $final_h, $src_w, $src_h);
        imagedestroy($croped);
//输出(保存)图片
        if (!empty($save_img))
        {
            $org_funcs ['save_func']($target, $save_img);
        } else
        {
            header($org_funcs ['header']);
            $org_funcs ['save_func']($target);
        }
        imagedestroy($target);
        return array('flag' => True, 'h' => $final_h);
    }

    public function thumb_img($src_img, $save_img = '', $option)
    {
        if (empty($option ['width']) || empty($option ['height']))
        {
            return array('flag' => False, 'msg' => '原图长度与宽度不能小于0');
        }
        $org_ext = $this->is_img($src_img);
        if (!$org_ext ['flag'])
        {
            return $org_ext;
        }
//如果有保存路径，则确定路径是否正确
        if (!empty($save_img))
        {
            $f = $this->check_dir($save_img);
            if (!$f ['flag'])
            {
                return $f;
            }
        }
//获取出相应的方法
        $org_funcs = $this->get_img_funcs($org_ext ['msg']);
//获取原大小
        $source = $org_funcs ['create_func']($src_img);
        $src_w = imagesx($source);
        $src_h = imagesy($source);

//调整原始图像(保持图片原形状裁剪图像)
        $dst_scale = $option ['height'] / $option ['width'];
        //目标图像长宽比
        $src_scale = $src_h / $src_w;
        // 原图长宽比
        if ($src_scale >= $dst_scale)
        {// 过高
            $w = intval($src_w);
            $h = intval($dst_scale * $w);
            $x = 0;
            $y = ($src_h - $h) / 3;
        } else
        {// 过宽
            $h = intval($src_h);
            $w = intval($h / $dst_scale);
            $x = ($src_w - $w) / 2;
            $y = 0;
        }
// 剪裁
        $croped = imagecreatetruecolor($w, $h);
        imagecopy($croped, $source, 0, 0, $x, $y, $src_w, $src_h);
// 缩放
        $scale = $option ['width'] / $w;
        $target = imagecreatetruecolor($option ['width'], $option ['height']);
        $final_w = intval($w * $scale);
        $final_h = intval($h * $scale);
        imagecopyresampled($target, $croped, 0, 0, 0, 0, $final_w, $final_h, $w, $h);
        imagedestroy($croped);
//输出(保存)图片
        if (!empty($save_img))
        {
            $org_funcs ['save_func']($target, $save_img);
        } else
        {
            header($org_funcs ['header']);
            $org_funcs ['save_func']($target);
        }
        imagedestroy($target);
        return array('flag' => True, 'msg' => '');
    }

    function resize_image($src_img, $save_img = '', $option)
    {
        $org_ext = $this->is_img($src_img);
        if (!$org_ext ['flag'])
        {
            return $org_ext;
        }
//如果有保存路径，则确定路径是否正确
        if (!empty($save_img))
        {
            $f = $this->check_dir($save_img);
            if (!$f ['flag'])
            {
                return $f;
            }
        }
//获取出相应的方法
        $org_funcs = $this->get_img_funcs($org_ext ['msg']);
//获取原大小
        $source = $org_funcs ['create_func']($src_img);
        $src_w = imagesx($source);
        $src_h = imagesy($source);
        if (($option ['width'] && $src_w > $option ['width']) || ($option ['height'] && $src_h > $option ['height']))
        {
            if ($option ['width'] && $src_w > $option ['width'])
            {
                $widthratio = $option ['width'] / $src_w;
                $resizewidth_tag = true;
            }
            if ($option ['height'] && $src_h > $option ['height'])
            {
                $heightratio = $option ['height'] / $src_h;
                $resizeheight_tag = true;
            }
            if ($resizewidth_tag && $resizeheight_tag)
            {
                if ($widthratio < $heightratio)
                    $ratio = $widthratio;
                else
                    $ratio = $heightratio;
            }
            if ($resizewidth_tag && !$resizeheight_tag)
                $ratio = $widthratio;
            if ($resizeheight_tag && !$resizewidth_tag)
                $ratio = $heightratio;
            $newwidth = $src_w * $ratio;
            $newheight = $src_h * $ratio;
            if (function_exists("imagecopyresampled"))
            {
                $newim = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($newim, $source, 0, 0, 0, 0, $newwidth, $newheight, $src_w, $src_h);
            } else
            {
                $newim = imagecreate($newwidth, $newheight);
                imagecopyresized($newim, $source, 0, 0, 0, 0, $newwidth, $newheight, $src_w, $src_h);
            }
        }
//输出(保存)图片
        if (!empty($save_img))
        {
            $org_funcs ['save_func']($newim, $save_img);
        } else
        {
            header($org_funcs ['header']);
            $org_funcs ['save_func']($newim);
        }
        imagedestroy($newim);
        return array('flag' => True, 'msg' => '');
    }

    public function water_mark($org_img, $mark_img, $save_img = '', $option = array())
    {
//检查图片
        $org_ext = $this->is_img($org_img);
        if (!$org_ext ['flag'])
        {
            return $org_ext;
        }
        $mark_ext = $this->is_img($mark_img);
        if (!$mark_ext ['flag'])
        {
            return $mark_ext;
        }
//如果有保存路径，则确定路径是否正确
        if (!empty($save_img))
        {
            $f = $this->check_dir($save_img);
            if (!$f ['flag'])
            {
                return $f;
            }
        }
//获取相应画布
        $org_funcs = $this->get_img_funcs($org_ext ['msg']);
        $org_img_im = $org_funcs ['create_func']($org_img);
        $mark_funcs = $this->get_img_funcs($mark_ext ['msg']);
        $mark_img_im = $mark_funcs ['create_func']($mark_img);
//拷贝水印图片坐标
        $mark_img_im_x = 0;
        $mark_img_im_y = 0;
//拷贝水印图片高宽
        $mark_img_w = imagesx($mark_img_im);
        $mark_img_h = imagesy($mark_img_im);
        $org_img_w = imagesx($org_img_im);
        $org_img_h = imagesx($org_img_im);
//合成生成点坐标
        $x = $org_img_w - $mark_img_w;
        $org_img_im_x = isset($option ['x']) ? $option ['x'] : $x;
        $org_img_im_x = ($org_img_im_x > $org_img_w or $org_img_im_x < 0) ? $x : $org_img_im_x;
        $y = $org_img_h - $mark_img_h;
        $org_img_im_y = isset($option ['y']) ? $option ['y'] : $y;
        $org_img_im_y = ($org_img_im_y > $org_img_h or $org_img_im_y < 0) ? $y : $org_img_im_y;
//alpha
        $alpha = isset($option ['alpha']) ? $option ['alpha'] : 50;
        $alpha = ($alpha > 100 or $alpha < 0) ? 50 : $alpha;
//合并图片
        imagecopymerge($org_img_im, $mark_img_im, $org_img_im_x, $org_img_im_y, $mark_img_im_x, $mark_img_im_y, $mark_img_w, $mark_img_h, $alpha);
//输出(保存)图片
        if (!empty($save_img))
        {
            $org_funcs ['save_func']($org_img_im, $save_img);
        } else
        {
            header($org_funcs ['header']);
            $org_funcs ['save_func']($org_img_im);
        }
//销毁画布
        imagedestroy($org_img_im);
        imagedestroy($mark_img_im);
        return array('flag' => True, 'msg' => '');
    }

    private function is_img($img_path)
    {
        if (!file_exists($img_path))
        {
            return array('flag' => False, 'msg' => "加载图片 $img_path 失败！");
        }
        $imgsize_arr = getimagesize($img_path);
        $ext = str_replace('image/', '', $imgsize_arr['mime']); // => image/gif
//        $ext = explode('.', $img_path);
//        $ext = strtolower(end($ext));
        if (!in_array($ext, $this->exts))
        {
            return array('flag' => False, 'msg' => "图片 $img_path 格式不正确！");
        }
        return array('flag' => True, 'msg' => $ext);
    }

    private function get_img_funcs($ext)
    {
//选择
        switch ($ext)
        {
            case 'jpg' :
            case 'jpeg' :
                $header = 'Content-Type:image/jpeg';
                $createfunc = 'imagecreatefromjpeg';
                $savefunc = 'imagejpeg';
                break;
            case 'gif' :
                $header = 'Content-Type:image/gif';
                $createfunc = 'imagecreatefromgif';
                $savefunc = 'imagegif';
                break;
            case 'bmp' :
                $header = 'Content-Type:image/bmp';
                $createfunc = 'imagecreatefrombmp';
                $savefunc = 'imagebmp';
                break;
            default :
                $header = 'Content-Type:image/png';
                $createfunc = 'imagecreatefrompng';
                $savefunc = 'imagepng';
        }
        return array('save_func' => $savefunc, 'create_func' => $createfunc, 'header' => $header);
    }

    private function check_dir($save_img)
    {
        $dir = dirname($save_img);
        if (!is_dir($dir))
        {
            if (!mkdir($dir, 0777, true))
            {
                return array('flag' => False, 'msg' => "图片保存目录 $dir 无法创建！");
            }
        }
        return array('flag' => True, 'msg' => '');
    }

}

/**
 * Modified by http://iulog.com @ 2013-05-07
 * 修复二分法查找方法
 * 汉字拼音首字母工具类
 *  注： 英文的字串：不变返回(包括数字)    eg .abc123 => abc123
 *      中文字符串：返回拼音首字符        eg. 测试字符串 => CSZFC
 *      中英混合串: 返回拼音首字符和英文   eg. 我i我j => WIWJ
 *  eg.
 *  $py = new str2PY();
 *  $result = $py->getInitials('啊吧才的饿飞就好i就看了吗你哦平去人是他uv我想一在');
 */
class str2PY
{

    private $_pinyins = array(
        176161 => 'A',
        176197 => 'B',
        178193 => 'C',
        180238 => 'D',
        182234 => 'E',
        183162 => 'F',
        184193 => 'G',
        185254 => 'H',
        187247 => 'J',
        191166 => 'K',
        192172 => 'L',
        194232 => 'M',
        196195 => 'N',
        197182 => 'O',
        197190 => 'P',
        198218 => 'Q',
        200187 => 'R',
        200246 => 'S',
        203250 => 'T',
        205218 => 'W',
        206244 => 'X',
        209185 => 'Y',
        212209 => 'Z',
    );
    private $_charset = null;

    /**
     * 构造函数, 指定需要的编码 default: utf-8
     * 支持utf-8, gb2312
     *
     * @param unknown_type $charset
     */
    public function __construct($charset = 'utf-8')
    {
        $this->_charset = $charset;
    }

    /**
     * 中文字符串 substr
     *
     * @param string $str
     * @param int    $start
     * @param int    $len
     * @return string
     */
    private function _msubstr($str, $start, $len)
    {
        $start = $start * 2;
        $len = $len * 2;
        $strlen = strlen($str);
        $result = '';
        for ($i = 0; $i < $strlen; $i++)
        {
            if ($i >= $start && $i < ($start + $len))
            {
                if (ord(substr($str, $i, 1)) > 129)
                    $result .= substr($str, $i, 2);
                else
                    $result .= substr($str, $i, 1);
            }
            if (ord(substr($str, $i, 1)) > 129)
                $i++;
        }
        return $result;
    }

    /**
     * 字符串切分为数组 (汉字或者一个字符为单位)
     *
     * @param string $str
     * @return array
     */
    private function _cutWord($str)
    {
        $words = array();
        while ($str != "")
        {
            if ($this->_isAscii($str))
            {/* 非中文 */
                $words[] = $str[0];
                $str = substr($str, strlen($str[0]));
            } else
            {
                $word = $this->_msubstr($str, 0, 1);
                $words[] = $word;
                $str = substr($str, strlen($word));
            }
        }
        return $words;
    }

    /**
     * 判断字符是否是ascii字符
     *
     * @param string $char
     * @return bool
     */
    private function _isAscii($char)
    {
        return ( ord(substr($char, 0, 1)) < 160 );
    }

    /**
     * 判断字符串前3个字符是否是ascii字符
     *
     * @param string $str
     * @return bool
     */
    private function _isAsciis($str)
    {
        $len = strlen($str) >= 3 ? 3 : 2;
        $chars = array();
        for ($i = 1; $i < $len - 1; $i++)
        {
            $chars[] = $this->_isAscii($str[$i]) ? 'yes' : 'no';
        }
        $result = array_count_values($chars);
        if (empty($result['no']))
        {
            return true;
        }
        return false;
    }

    /**
     * 获取中文字串的拼音首字符
     *
     * @param string $str
     * @return string
     */
    public function getInitials($str)
    {
        if (empty($str))
            return '';
        if ($this->_isAscii($str[0]) && $this->_isAsciis($str))
        {
            return $str;
        }
        $result = array();
        if ($this->_charset == 'utf-8')
        {
            $str = @iconv('utf-8', 'gb2312', $str);
        }
        $words = $this->_cutWord($str);
        foreach ($words as $word)
        {
            if ($this->_isAscii($word))
            {/* 非中文 */
                $result[] = $word;
                continue;
            }
            $code = ord(substr($word, 0, 1)) * 1000 + ord(substr($word, 1, 1));
            /* 获取拼音首字母A--Z */
            if (($i = $this->_search($code)) != -1)
            {
                $result[] = $this->_pinyins[$i];
            }
        }
        return strtoupper(implode('', $result));
    }

    private function _getChar($ascii)
    {
        if ($ascii >= 48 && $ascii <= 57)
        {
            return chr($ascii);  /* 数字 */
        } elseif ($ascii >= 65 && $ascii <= 90)
        {
            return chr($ascii);   /* A--Z */
        } elseif ($ascii >= 97 && $ascii <= 122)
        {
            return chr($ascii - 32); /* a--z */
        } else
        {
            return '-'; /* 其他 */
        }
    }

    /**
     * 查找需要的汉字内码(gb2312) 对应的拼音字符( 二分法 )
     *
     * @param int $code
     * @return int
     */
    private function _search($code)
    {
        $data = array_keys($this->_pinyins);
        $lower = 0;
        $upper = sizeof($data) - 1;
        $middle = (int) round(($lower + $upper) / 2);
        if ($code < $data[0])
            return -1;
        for (;;)
        {
            if ($lower > $upper)
            {
                return $data[$lower - 1];
            }
            $tmp = (int) round(($lower + $upper) / 2);
            if (!isset($data[$tmp]))
            {
                return $data[$middle];
            } else
            {
                $middle = $tmp;
            }
            if ($data[$middle] < $code)
            {
                $lower = (int) $middle + 1;
            } else if ($data[$middle] == $code)
            {
                return $data[$middle];
            } else
            {
                $upper = (int) $middle - 1;
            }
        }
    }

}
