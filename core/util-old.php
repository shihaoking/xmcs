<?php

if (!defined('CORE'))
    exit('Request Error!');

/**
 * 实用函数集合
 *
 * 替代lib_common
 *
 * @author itprato<2500875@qq>
 * @version $Id$  
 */
class util
{

    public static $client_ip = null;
    public static $cfc_handle = null;

    /**
     * 获得用户的真实IP 地址
     *
     * @param 多个用多行分开
     * @return void
     */
    public static function get_client_ip()
    {
        static $realip = NULL;
        if (self::$client_ip !== NULL)
        {
            return self::$client_ip;
        }
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR2']))
        {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR2']);
            foreach ($arr as $ip)
            {
                $ip = trim($ip);
                if ($ip != 'unknown')
                {
                    $realip = $ip;
                    break;
                }
            }
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($arr as $ip)
            {
                $ip = trim($ip);
                if ($ip != 'unknown')
                {
                    $realip = $ip;
                    break;
                }
            }
        } elseif (isset($_SERVER['HTTP_CLIENT_IP']))
        {
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        } else
        {
            if (isset($_SERVER['REMOTE_ADDR']))
            {
                $realip = $_SERVER['REMOTE_ADDR'];
            } else
            {
                $realip = '0.0.0.0';
            }
        }
        preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
        self::$client_ip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
        return self::$client_ip;
    }

    /**
     * 写文件
     */
    function put_file($file, $content, $flag = 0)
    {
        $pathinfo = pathinfo($file);
        if (!empty($pathinfo ['dirname']))
        {
            if (file_exists($pathinfo ['dirname']) === false)
            {
                if (@mkdir($pathinfo ['dirname'], 0777, true) === false)
                {
                    return false;
                }
            }
        }
        if ($flag === FILE_APPEND)
        {
            return @file_put_contents($file, $content, FILE_APPEND);
        } else
        {
            return @file_put_contents($file, $content, LOCK_EX);
        }
    }

    /**
     * 获得当前的Url
     */
    public static function get_cururl()
    {
        if (!empty($_SERVER["REQUEST_URI"]))
        {
            $scriptName = $_SERVER["REQUEST_URI"];
            $nowurl = $scriptName;
        } else
        {
            $scriptName = $_SERVER["PHP_SELF"];
            $nowurl = empty($_SERVER["QUERY_STRING"]) ? $scriptName : $scriptName . "?" . $_SERVER["QUERY_STRING"];
        }
        return $nowurl;
    }

    /**
     * 检查路径是否存在
     * @parem $path
     * @return bool
     */
    public static function path_exists($path)
    {
        $pathinfo = pathinfo($path . '/tmp.txt');
        if (!empty($pathinfo ['dirname']))
        {
            if (file_exists($pathinfo ['dirname']) === false)
            {
                if (mkdir($pathinfo ['dirname'], 0777, true) === false)
                {
                    return false;
                }
            }
        }
        return $path;
    }

    /**
     * 判断是否为utf8字符串
     * @parem $str
     * @return bool
     */
    public static function is_utf8($str)
    {
        if ($str === mb_convert_encoding(mb_convert_encoding($str, "UTF-32", "UTF-8"), "UTF-8", "UTF-32"))
        {
            return true;
        } else
        {
            return false;
        }
    }

    static function gbk2utf8($str)
    {
        if (!self::is_utf8($str))
        {
            return iconv('GBK', 'UTF-8', $str);
        } else
        {
            return $str;
        }
    }

    /**
     * 公共分页函数
     *
     *  @param array $config
     *               $config['current_page']   //当前页数
     *               $config['page_size']      //每页显示多少条
     *               $config['total_rs']       //总记录数
     *               $config['url_prefix']     //网址前缀
     *               $config['page_name']      //当前分页变量名(默认是page_no， 即访问是用 url_prefix&page_no=xxx )
     *               $config['move_size']      //前后偏移量（默认是5）
     *               $config['input']          //是否使用输入跳转框(0|1)
     * 输出格式：
     * <div class="page">
     * <span class="nextprev">&laquo; 上一页</span>
     * <span class="current">1</span>
     * <a href="">2</a>
     *  <a href="" class="nextprev">下一页 &raquo;</a>
     *  <span>共 100 页</span>
     * </div>
     *
     * @return string
     */
    public static function pagination($config)
    {
        //参数处理
        $url_prefix = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name = empty($config['page_name']) ? 'page_no' : $config['page_name'];
        $page_size = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page = ceil($total_rs / $page_size);
        $move_size = empty($config['move_size']) ? 5 : intval($config['move_size']);

        //总页数不到二页返回空
        if ($total_page < 2)
        {
            return '';
        }

        //分页内容
        $pages = '<div class="page">';

        //下一页
        $next_page = $current_page + 1;
        //上一页
        $prev_page = $current_page - 1;
        //末页
        $last_page = $total_page;

        //上一页、首页
        if ($current_page > 1)
        {
            $pages .= "<a href='{$url_prefix}' class='nextprev'>&laquo;首页</a>\n";
            $pages .= "<a href='{$url_prefix}&{$page_name}={$prev_page}' class='nextprev'>&laquo;上一页</a>\n";
        } else
        {
            $pages .= "<span class='nextprev'>&laquo;首页</span>\n";
            $pages .= "<span class='nextprev'>&laquo;上一页</span>\n";
        }

        //前偏移
        for ($i = $current_page - $move_size; $i < $current_page; $i++)
        {
            if ($i < 1)
            {
                continue;
            }
            $pages .= "<a href='{$url_prefix}&{$page_name}={$i}'>$i</a>\n";
        }
        //当前页
        $pages .= "<span class='current'>" . $current_page . "</span>\n";

        //后偏移
        $flag = 0;
        if ($current_page < $total_page)
        {
            for ($i = $current_page + 1; $i < $total_page; $i++)
            {
                $pages .= "<a href='{$url_prefix}&{$page_name}={$i}'>$i</a>\n";
                $flag++;
                if ($flag == $move_size)
                {
                    break;
                }
            }
        }

        //下一页、末页
        if ($current_page != $total_page)
        {
            $pages .= "<a href='{$url_prefix}&{$page_name}={$next_page}' class='nextprev'>下一页&raquo;</a>\n";
            $pages .= "<a href='{$url_prefix}&{$page_name}={$last_page}'>末页&raquo;</a>\n";
        } else
        {
            $pages .= "<span class='nextprev'>下一页&raquo;</span>\n";
            $pages .= "<span class='nextprev'>末页&raquo;</span>\n";
        }

        //增加输入框跳转
        if (!empty($config['input']))
        {
            $pages .= '<input type="text" class="page" onkeydown="javascript:if(event.keyCode==13){ location=\'' . $url_prefix . '&' . $page_name . '=\'+this.value; }" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        }

        $pages .= "<span>共 {$total_page} 页 / {$total_rs} 条记录</span>\n";
        $pages .= '</div>';

        return $pages;
    }

    /**
     * utf8编码模式的中文截取2，单字节截取模式
     * 这里不使用mbstring扩展
     * @return string
     */
    public static function utf8_substr($str, $slen, $startdd = 0)
    {
        return mb_substr($str, $startdd, $slen, 'UTF-8');
    }

    /**
     * 从普通时间返回Linux时间截(strtotime中文处理版)
     * @parem string $dtime
     * @return int
     */
    public static function cn_strtotime($dtime)
    {
        if (!preg_match("/[^0-9]/", $dtime))
        {
            return $dtime;
        }
        $dtime = trim($dtime);
        $dt = Array(1970, 1, 1, 0, 0, 0);
        $dtime = preg_replace("/[\r\n\t]|日|秒/", " ", $dtime);
        $dtime = str_replace("年", "-", $dtime);
        $dtime = str_replace("月", "-", $dtime);
        $dtime = str_replace("时", ":", $dtime);
        $dtime = str_replace("分", ":", $dtime);
        $dtime = trim(preg_replace("/[ ]{1,}/", " ", $dtime));
        $ds = explode(" ", $dtime);
        $ymd = explode("-", $ds[0]);
        if (!isset($ymd[1]))
        {
            $ymd = explode(".", $ds[0]);
        }
        if (isset($ymd[0]))
        {
            $dt[0] = $ymd[0];
        }
        if (isset($ymd[1]))
            $dt[1] = $ymd[1];
        if (isset($ymd[2]))
            $dt[2] = $ymd[2];
        if (strlen($dt[0]) == 2)
            $dt[0] = '20' . $dt[0];
        if (isset($ds[1]))
        {
            $hms = explode(":", $ds[1]);
            if (isset($hms[0]))
                $dt[3] = $hms[0];
            if (isset($hms[1]))
                $dt[4] = $hms[1];
            if (isset($hms[2]))
                $dt[5] = $hms[2];
        }
        foreach ($dt as $k => $v)
        {
            $v = preg_replace("/^0{1,}/", '', trim($v));
            if ($v == '')
            {
                $dt[$k] = 0;
            }
        }
        $mt = mktime($dt[3], $dt[4], $dt[5], $dt[1], $dt[2], $dt[0]);
        if (!empty($mt))
        {
            return $mt;
        } else
        {
            return strtotime($dtime);
        }
    }

    /**
     * 发送邮件
     * @param array  $to      收件人
     * @param string $subject 邮件标题
     * @param string $body　      邮件内容
     * @return bool
     * @author xiaocai
     */
    public static function send_email($to, $subject, $body)
    {
        $send_account = $GLOBALS['config']['send_smtp_mail_account'];
        try {
            $smtp = new cls_mail($send_account['host'], $send_account['port'], true, $send_account['user'], $send_account['password']);
            $smtp->debug = $send_account['debug'];
            $result = $smtp->sendmail($to, $send_account['from'], $subject, $body, $send_account['type']);

            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * 
     * xml转array
     * @param xml内容 $contents
     * @param $get_attributes
     */
    public static function xml2array($contents, $get_attributes = 0)
    {

        if (!$contents)
            return array();

        if (!function_exists('xml_parser_create'))
        {
            //print "'xml_parser_create()' function not found!";
            return array();
        }
        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, $contents, $xml_values);
        xml_parser_free($parser);

        if (!$xml_values)
            return; //Hmm...

            
//print_r($xml_values);
        //Initializations
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();

        $current = &$xml_array;

        //Go through the tags.
        foreach ($xml_values as $data)
        {
            unset($attributes, $value); //Remove existing values, or there will be trouble
            //This command will extract these variables into the foreach scope
            // tag(string), type(string), level(int), attributes(array).
            extract($data); //We could use the array by itself, but this cooler.

            $result = '';
            if ($get_attributes)
            {//The second argument of the function decides this.
                //$result = array();
                $result = '';
                //if(isset($value)) $result = $value;
                if (isset($value))
                    $result['value'] = $value;

                //Set the attributes too.
                if (isset($attributes))
                {
                    foreach ($attributes as $attr => $val)
                    {
                        if ($get_attributes == 1)
                            $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                    }
                }
            } elseif (isset($value))
            {
                $result = $value;
            }

            //See tag status and do the needed.
            if ($type == "open")
            {//The starting of the tag "
                $parent[$level - 1] = &$current;

                if (!is_array($current) or (!in_array($tag, array_keys($current))))
                { //Insert New tag
                    $current[$tag] = $result;
                    $current = &$current[$tag];
                } else
                { //There was another element with the same tag name
                    if (isset($current[$tag][0]))
                    {
                        array_push($current[$tag], $result);
                    } else
                    {
                        $current[$tag] = array($current[$tag], $result);
                    }
                    $last = count($current[$tag]) - 1;
                    $current = &$current[$tag][$last];
                }
            } elseif ($type == "complete")
            { //Tags that ends in 1 line "
                //See if the key is already taken.
                if (!isset($current[$tag]))
                { //New Key
                    $current[$tag] = $result;
                } else
                { //If taken, put all things inside a list(array)
                    if ((is_array($current[$tag]) and $get_attributes == 0)//If it is already an array…
                        or (isset($current[$tag][0]) and is_array($current[$tag][0]) and $get_attributes == 1))
                    {
                        array_push($current[$tag], $result); // …push the new element into that array.
                    } else
                    { //If it is not an array…
                        $current[$tag] = array($current[$tag], $result); //…Make it an array using using the existing value and the new value
                    }
                }
            } elseif ($type == 'close')
            { //End of tag "
                $current = &$parent[$level - 1];
            }
        }
        return($xml_array);
    }

    /**下载到本地
     */
    static function httpcopy($url, $file = "", $timeout = 600)
    {
        if (empty($file))
            return false;
        $dir = pathinfo($file, PATHINFO_DIRNAME);
        !is_dir($dir) && @mkdir($dir, 0755, true);
        $url = str_replace(" ", "%20", $url);

        if (function_exists('curl_init'))
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_REFERER, $url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            
            if (FALSE !== strpos($url, 'https'))
            {
//                echo 'https : '.$url;ob_flush();  flush();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            }

            $temp = curl_exec($ch);
//            $result = curl_getinfo($ch,CURLINFO_HTTP_CODE); //返回值,错误调试用
            curl_close($ch);
            if (@file_put_contents($file, $temp) && !curl_error($ch))
            {
                return $file;
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

    
    /**
     * $sourcestr 是要处理的字符串 
     * $cutlength 为截取的长度(即字数) 
     */
    static function cut_str($sourcestr, $cutlength, $type = true)
    {
        $returnstr = '';
        $i = 0;
        $n = 0;

        $str_length = strlen(trim($sourcestr)); //字符串的字节数 

        while (($n < $cutlength) and ($i <= $str_length))
        {
            $temp_str = substr($sourcestr, $i, 1);
            $ascnum = Ord($temp_str); //得到字符串中第$i位字符的ascii码 
            if ($ascnum >= 224)    //如果ASCII位高与224，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 3); //根据UTF-8编码规范，将3个连续的字符计为单个字符         
                $i = $i + 3;            //实际Byte计为3
                $n++;            //字串长度计1
            } elseif ($ascnum >= 192) //如果ASCII位高与192，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 2); //根据UTF-8编码规范，将2个连续的字符计为单个字符 
                $i = $i + 2;            //实际Byte计为2
                $n++;            //字串长度计1
            } elseif ($ascnum >= 65 && $ascnum <= 90) //如果是大写字母，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 1);
                $i = $i + 1;            //实际的Byte数仍计1个
                $n++;            //但考虑整体美观，大写字母计成一个高位字符
            } else                //其他情况下，包括小写字母和半角标点符号，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 1);
                $i = $i + 1;            //实际的Byte数计1个
                $n = $n + 0.5;        //小写字母和半角标点等与半个高位字符宽...
            }
        }
        if ($type == true)
        {
            if ($str_length > $cutlength)
            {
                $returnstr = $returnstr . "..."; //超过长度时在尾处加上省略号
            }
        }
        return $returnstr;
    }

    /**
     * 修改截取后的省略号
     * @param unknown_type $sourcestr
     * @param unknown_type $cutlength
     * @param unknown_type $type
     */
    static function cut_str2($sourcestr, $cutlength, $type = true)
    {
        $returnstr = '';
        $i = 0;
        $n = 0;

        $str_length = strlen(trim($sourcestr)); //字符串的字节数 

        while (($n < $cutlength) and ($i <= $str_length))
        {
            $temp_str = substr($sourcestr, $i, 1);
            $ascnum = Ord($temp_str); //得到字符串中第$i位字符的ascii码 
            if ($ascnum >= 224)    //如果ASCII位高与224，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 3); //根据UTF-8编码规范，将3个连续的字符计为单个字符         
                $i = $i + 3;            //实际Byte计为3
                $n++;            //字串长度计1
            } elseif ($ascnum >= 192) //如果ASCII位高与192，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 2); //根据UTF-8编码规范，将2个连续的字符计为单个字符 
                $i = $i + 2;            //实际Byte计为2
                $n++;            //字串长度计1
            } elseif ($ascnum >= 65 && $ascnum <= 90) //如果是大写字母，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 1);
                $i = $i + 1;            //实际的Byte数仍计1个
                $n++;            //但考虑整体美观，大写字母计成一个高位字符
            } else                //其他情况下，包括小写字母和半角标点符号，
            {
                $returnstr = $returnstr . substr($sourcestr, $i, 1);
                $i = $i + 1;            //实际的Byte数计1个
                $n = $n + 0.5;        //小写字母和半角标点等与半个高位字符宽...
            }
        }
        if ($type == true)
        {
            if ($str_length > $cutlength * 3)
            {
                $returnstr = $returnstr . "..."; //超过长度时在尾处加上省略号
            }
        }
        return $returnstr;
    }

    public static function show_list($path)
    {
        if (is_dir($path))
        {
            $dp = dir($path);
            while ($file = $dp->read())
                if ($file != '.' && $file != '..')
                {
                    
                }
            $dp->close();
        }
        //        echo "$path<br>";
    }

    //循环删除目录和文件函数
    public static function delDirAndFile($dirName, $delDir = 0)
    {
        if ($handle = opendir("$dirName"))
        {
            while (false !== ( $item = readdir($handle) ))
            {
                if ($item != "." && $item != "..")
                {
                    $file = str_replace('//', '/', "$dirName/$item");
                    if (is_dir($file))
                    {

                        self::delDirAndFile($file,$delDir);
                    } else
                    {
                        if (unlink($file))
                        {
//                            echo "成功删除文件： $file<br />\n";
                        }
                    }
                }
            }
            closedir($handle);
            if ($delDir == 1)
            {
                if (rmdir($dirName))
                    echo "成功删除目录： $dirName<br />\n";
            }
        }
    }

    //循环显示文件,返回array
    public static function dirAllFile($dirName)
    {
//        global $array;
        $array = array();
//        util::pre_print_r($array);
        if ($handle = opendir("$dirName"))
        {
            while (false !== ( $item = readdir($handle) ))
            {
                if ($item != "." && $item != "..")
                {
                    if (is_dir("$dirName/$item"))
                    {

                        $array[] = self::delDirAndFile("$dirName/$item");
                    } else
                    {

                        $array[] = $item;
//                       util::ebr($item);
                    }
                }
            }
            closedir($handle);
//           if( rmdir( $dirName ) )echo "成功删除目录： $dirName<br />\n";
        }
        return $array;
    }

    /**
     * 设置了超时时间的file_get_contents
     * @param $path
     * @param $time
     */
    static function fgc($path, $time = 30)
    {
        $ctx = stream_context_create(array(
            'http' => array(
                'timeout' => $time //设置一个超时时间，单位为秒  
            )
            )
        );
        return file_get_contents($path, 0, $ctx);
    }

    //json_decode 后的对象转数组
    static function object_array($array)
    {
        if (is_object($array))
        {
            $array = (array) $array;
        }
        $re = array();
        if (is_array($array))
        {
            foreach ($array as $key => $value)
            {
                $re[$key] = (array) ($value);
            }
        }
        return $re;
    }

    
    static function Pinyin($_String, $_Code = 'utf8')
    {
        $_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha" .
            "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|" .
            "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er" .
            "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui" .
            "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang" .
            "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang" .
            "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue" .
            "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne" .
            "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen" .
            "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang" .
            "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|" .
            "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|" .
            "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu" .
            "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you" .
            "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|" .
            "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo";
        $_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990" .
            "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725" .
            "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263" .
            "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003" .
            "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697" .
            "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211" .
            "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922" .
            "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468" .
            "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664" .
            "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407" .
            "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959" .
            "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652" .
            "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369" .
            "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128" .
            "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914" .
            "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645" .
            "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149" .
            "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087" .
            "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658" .
            "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340" .
            "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888" .
            "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585" .
            "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847" .
            "|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055" .
            "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780" .
            "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274" .
            "|-10270|-10262|-10260|-10256|-10254";
        $_TDataKey = explode('|', $_DataKey);
        $_TDataValue = explode('|', $_DataValue);
        $_Data = (PHP_VERSION >= '5.0') ? array_combine($_TDataKey, $_TDataValue) : self::_Array_Combine($_TDataKey, $_TDataValue);
        arsort($_Data);
        reset($_Data);
        if ($_Code != 'gb2312')
            $_String = self::_U2_Utf8_Gb($_String);
        $_Res = '';
        for ($i = 0; $i < strlen($_String); $i++)
        {
            $_P = ord(substr($_String, $i, 1));
            if ($_P > 160)
            {
                $_Q = ord(substr($_String, ++$i, 1));
                $_P = $_P * 256 + $_Q - 65536;
            }
            $_Res .= self::_Pinyin($_P, $_Data);
        }
        return preg_replace("/[^a-z0-9]*/", '', $_Res);
    }

    static function _Pinyin($_Num, $_Data)
    {
        if ($_Num > 0 && $_Num < 160)
            return chr($_Num);
        elseif ($_Num < -20319 || $_Num > -10247)
            return '';
        else
        {
            foreach ($_Data as $k => $v)
            {
                if ($v <= $_Num)
                    break;
            }
            return $k;
        }
    }

    static function _U2_Utf8_Gb($_C)
    {
        $_String = '';
        if ($_C < 0x80)
            $_String .= $_C;
        elseif ($_C < 0x800)
        {
            $_String .= chr(0xC0 | $_C >> 6);
            $_String .= chr(0x80 | $_C & 0x3F);
        } elseif ($_C < 0x10000)
        {
            $_String .= chr(0xE0 | $_C >> 12);
            $_String .= chr(0x80 | $_C >> 6 & 0x3F);
            $_String .= chr(0x80 | $_C & 0x3F);
        } elseif ($_C < 0x200000)
        {
            $_String .= chr(0xF0 | $_C >> 18);
            $_String .= chr(0x80 | $_C >> 12 & 0x3F);
            $_String .= chr(0x80 | $_C >> 6 & 0x3F);
            $_String .= chr(0x80 | $_C & 0x3F);
        }
        return iconv('UTF-8', 'GBK', $_String);
    }

    static function _Array_Combine($_Arr1, $_Arr2)
    {
        for ($i = 0; $i < count($_Arr1); $i++)
            $_Res[$_Arr1[$i]] = $_Arr2[$i];
        return $_Res;
    }
    
    
    /**
     * 
     * 调试工具 展开数组
     * @param 数组 $array
     */
    public static function pre_print_r($array, $type = 'none')
    {
        if ($type == 'none')
        {
            echo "<div style='display:none;'>";
        } else
        {
            echo "<div style>";
        }
        echo 'Count : ' . count($array);
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        echo '</div>';
    }

    public static function dowith_sql($str)
    {
        $str = str_ireplace("and", "", $str);
        $str = str_ireplace("execute", "", $str);
        $str = str_ireplace("update", "", $str);
        $str = str_ireplace("count", "", $str);
        $str = str_ireplace("chr", "", $str);
        $str = str_ireplace("mid", "", $str);
        $str = str_ireplace("master", "", $str);
        $str = str_ireplace("truncate", "", $str);
        $str = str_ireplace("char", "", $str);
        $str = str_ireplace("declare", "", $str);
        $str = str_ireplace("select", "", $str);
        $str = str_ireplace("create", "", $str);
        $str = str_ireplace("delete", "", $str);
        $str = str_ireplace("insert", "", $str);
        $str = str_replace("'", "", $str);
        $str = str_replace("\"", "", $str);
        $str = str_replace(" ", "", $str);
        $str = str_ireplace("or", "", $str);
        $str = str_replace("=", "", $str);
        $str = str_replace("%20", "", $str);
        //echo $str;
        return $str;
    }

    /**
     * 
     * 调试工具 输出数值换行
     * @param 字符串 $str
     */
    public static function ebr($str)
    {
        echo "<div style='display:none;'>";
        echo '<br />';
        echo 'Strlen : ' . strlen($str);
        echo '<br />';
        echo $str;
        echo '<br />';
        echo '</div>';
    }

    public static function echobr($str)
    {
        echo "<div style='display:none;'>";
        echo '<br />';
        echo 'Strlen : ' . strlen($str);
        echo '<br />';
        echo $str;
        echo '<br />';
        echo '</div>';
    }

}
