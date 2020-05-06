<?php
if( !defined('CORE') ) exit('Request Error!');
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
    public static $client_ip = NULL;
    
    public static $cfc_handle = NULL;
	
	public static $jumpurl = '/';


    //获得当前使用内存
    public static function memory_get_usage()
    {
        $memory = memory_get_usage();
        return self::convert($memory);
    }
    //获得最高使用内存
    public static function memory_get_peak_usage()
    {
        $memory = memory_get_peak_usage();
        return self::convert($memory);
    }
    public static function convert($size)
    { 
        $unit=array('b','kb','mb','gb','tb','pb'); 
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i]; 
    } 

    public static function array_size($arr) 
    { 
        ob_start(); 
        print_r($arr); 
        $mem = ob_get_contents(); 
        ob_end_clean(); 
        $mem = preg_replace("/\n +/", "", $mem); 
        $mem = strlen($mem); 
        return self::convert($mem); 
    } 

    /* 16位MD5 */
    public static function md5_16($str)
    {
        return substr(md5($str),8,16);
    }

    /* PHP escape */
    public static function escape($str) {
        preg_match_all("/[\x80-\xff].|[\x01-\x7f]+/",$str,$r);
        $ar = $r[0];
        foreach($ar as $k=>$v) {
            if(ord($v[0]) < 128) {
                $ar[$k] = rawurlencode($v);
            } else {
                $ar[$k] = "%u".bin2hex(iconv(NUll,"UCS-2",$v));
            }
        }
        return join("",$ar);
    }

    /* PHP unescape */
    public static function unescape($str) {
        $str = rawurldecode($str);
        preg_match_all("/(?:%u.{4})|.+/",$str,$r);
        $ar = $r[0];
        foreach($ar as $k=>$v) {
            if(substr($v,0,2) == "%u" && strlen($v) == 6) {
                $ar[$k] = iconv("UCS-2",NULL,pack("H4",substr($v,-4)));
            }
        }
        return join("",$ar);
    }

    // 汉字转拼单
    public static function pinyin($str,$ishead=0,$isclose=1)
    {
        //$str = iconv("utf-8", "gbk//ignore", $str);
        $str = mb_convert_encoding($str, "gbk", "utf-8");
        global $pinyins;
        $restr = '';
        $str = trim($str);
        $slen = strlen($str);
        if($slen<2){
            return $str;
        }
        if(count($pinyins)==0){
            $fp = fopen(PATH_DATA . '/pinyin.dat','r');
            while(!feof($fp)){
                $line = trim(fgets($fp));
                $pinyins[$line[0].$line[1]] = substr($line,3,strlen($line)-3);
            }
            fclose($fp);
        }
        for($i=0;$i<$slen;$i++){
            if(ord($str[$i])>0x80){
                $c = $str[$i].$str[$i+1];
                $i++;
                if(isset($pinyins[$c])){
                    if($ishead==0){
                        $restr .= $pinyins[$c];
                    }
                    else{
                        $restr .= $pinyins[$c][0];
                    }
                }else{
                    //$restr .= "_";
                }
            }else if( preg_match("/[a-z0-9]/i",$str[$i]) ){
                $restr .= $str[$i];
            }
            else{
                //$restr .= "_";
            }
        }
        if($isclose==0){
            unset($pinyins);
        }
        return $restr;
    }
    
    //生成字母前缀
    public static function letter_first($s0)
    {
        $firstchar_ord=ord(strtoupper($s0{0})); 
        if (($firstchar_ord>=65 and $firstchar_ord<=91)or($firstchar_ord>=48 and $firstchar_ord<=57)) return $s0{0}; 
        //$s = iconv("utf-8", "gbk//ignore", $s0);
        $s = mb_convert_encoding($s0, "gbk", "utf-8");
        $asc=ord($s{0})*256+ord($s{1})-65536; 
        if($asc>=-20319 and $asc<=-20284)return "A";
        if($asc>=-20283 and $asc<=-19776)return "B";
        if($asc>=-19775 and $asc<=-19219)return "C";
        if($asc>=-19218 and $asc<=-18711)return "D";
        if($asc>=-18710 and $asc<=-18527)return "E";
        if($asc>=-18526 and $asc<=-18240)return "F";
        if($asc>=-18239 and $asc<=-17923)return "G";
        if($asc>=-17922 and $asc<=-17418)return "H";
        if($asc>=-17417 and $asc<=-16475)return "J";
        if($asc>=-16474 and $asc<=-16213)return "K";
        if($asc>=-16212 and $asc<=-15641)return "L";
        if($asc>=-15640 and $asc<=-15166)return "M";
        if($asc>=-15165 and $asc<=-14923)return "N";
        if($asc>=-14922 and $asc<=-14915)return "O";
        if($asc>=-14914 and $asc<=-14631)return "P";
        if($asc>=-14630 and $asc<=-14150)return "Q";
        if($asc>=-14149 and $asc<=-14091)return "R";
        if($asc>=-14090 and $asc<=-13319)return "S";
        if($asc>=-13318 and $asc<=-12839)return "T";
        if($asc>=-12838 and $asc<=-12557)return "W";
        if($asc>=-12556 and $asc<=-11848)return "X";
        if($asc>=-11847 and $asc<=-11056)return "Y";
        if($asc>=-11055 and $asc<=-10247)return "Z";
        return 0;//null
    }

    //获得某天前的时间戳
    public static function getxtime($day)
    {
        $day = intval($day);
        return mktime(23,59,59,date("m"),date("d")-$day,date("y"));
    }
	
	
	/***
	 *获取用户返回域名地址
	 *用于后台跳转
	 */
	public static function get_refer(){
		if($_SERVER['HTTP_HOST']){
			$ref = $_SERVER['HTTP_HOST'];
		}else{
			$ref = '?ct='.$this->ct.'&ac=index';
		}
		return $ref;
	}
	 

    /**
     * 获得用户的真实IP 地址
     *
     * HTTP_X_FORWARDED_FOR 的信息可以进行伪造
     * 对于需要检测用户IP是否重复的情况，如投票程序，为了防止IP伪造
     * 可以使用 REMOTE_ADDR + HTTP_X_FORWARDED_FOR 联合使用进行杜绝用户模拟任意IP的可能性
     *
     * @param 多个用多行分开
     * @return void
     */
    public static function get_client_ip()
    {
        $client_ip = '';
        
        if( self::$client_ip !== NULL )
        {
            return self::$client_ip;
        }
        
        //分析代理IP
        if( isset($_SERVER['HTTP_X_FORWARDED_FOR2']) )
        {
            $_SERVER['HTTP_X_FORWARDED_FOR'] = $_SERVER['HTTP_X_FORWARDED_FOR2'];
        }
        
        if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) )
        {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($arr as $ip)
            {
                $ip = trim($ip);
                if ($ip != 'unknown' ) {
                    $client_ip = $ip; break;
                }
            }
        }
        else
        {
            $client_ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        }
        
        preg_match("/[\d\.]{7,15}/", $client_ip, $onlineip);
        $client_ip = ! empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
        
        self::$client_ip = $client_ip;
        
        return $client_ip;
    }
        
    /**
     * 读文件
     */
    public static function get_file($url)
    {
        if(function_exists('curl_init'))
        {
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
            $content = curl_exec($ch);
            curl_close($ch);
            if($content)
                return $content;
        }
        $ctx = stream_context_create(array('http'=>array('timeout'=>10)));
        $content = @file_get_contents($url, 0, $ctx);
        if($content)
            return $content;
        return false;
    }

    function file_get_contents_by_curl($url) {
        $url = trim($url);
        $content = '';
        if (extension_loaded('curl')) {
            $ch = curl_init();           
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 120);
            $content = curl_exec($ch);
            curl_close($ch);
        } else {
            $content = file_get_contents($url);
        }
        return trim($content);
    }

    public static function curl_file_get_contents($url)
    {
         $curl = curl_init();
         $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
         
         curl_setopt($curl,CURLOPT_URL,$url);
         curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE); 
         curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);   
         
         curl_setopt($curl, CURLOPT_USERAGENT, $userAgent); 
         curl_setopt($curl, CURLOPT_FAILONERROR, TRUE); 
         curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); 
         curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);
         curl_setopt($curl, CURLOPT_TIMEOUT, 10);   
         
         $contents = curl_exec($curl);
         curl_close($curl);
         return $contents;
    }   


     /**
      * file_get_contents增强
      */ 
     public static function download_remote_file($url)
     {
        $result = @file_get_contents($url);
        if ($result === false) {
            $result = util::curl_file_get_contents($url);
        }
        return $result;
     }
     
	public static function ecard($card){
		if(strpos($card,'nh')===false && strpos($card,'yi')===false && strpos($card,'ss')===false)header("Location:/");
	}
    /**
     * 写文件
     */
    public static function put_file($file, $content, $flag = 0)
    {
        $pathinfo = pathinfo ( $file );
        if (! empty ( $pathinfo ['dirname'] ))
        {
            if (file_exists ( $pathinfo ['dirname'] ) === false)
            {
                if (@mkdir ( $pathinfo ['dirname'], 0777, true ) === false)
                {
                    return false;
                }
            }
        }
        if ($flag === FILE_APPEND)
        {
            return @file_put_contents ( $file, $content, FILE_APPEND );
        }
        else
        {
            return @file_put_contents ( $file, $content, LOCK_EX );
        }
    }

   /**
    * 获得当前的Url
    */
    public static function get_cururl()
    {
        if(!empty($_SERVER["REQUEST_URI"]))
        {
            $scriptName = $_SERVER["REQUEST_URI"];
            $nowurl = $scriptName;
        }
        else
        {
            $scriptName = $_SERVER["PHP_SELF"];
            $nowurl = empty($_SERVER["QUERY_STRING"]) ? $scriptName : $scriptName."?".$_SERVER["QUERY_STRING"];
        }
        return $nowurl;
    }
    
    /**
     * 检查路径是否存在
     * @parem $path
     * @return bool
     */
    public static function path_exists( $path )
    {
        $pathinfo = pathinfo ( $path . '/tmp.txt' );
        if ( !empty( $pathinfo ['dirname'] ) )
        {
            if (file_exists ( $pathinfo ['dirname'] ) === false)
            {
                if (mkdir ( $pathinfo ['dirname'], 0777, true ) === false)
                {
                    return false;
                }
            }
        }
        return $path;
    }

    /* 批量修改目录权限 */
    public static function chmodr($path, $filemode) 
    {
        if (!is_dir($path))
        {
            return @chmod($path, $filemode);
        }

        $dh = opendir($path);
        while (($file = readdir($dh)) !== false) 
        {
            if($file != '.' && $file != '..') 
            {
                $fullpath = $path.'/'.$file;
                if(is_link($fullpath))
                {
                    return FALSE;
                }
                elseif(!is_dir($fullpath) && !@chmod($fullpath, $filemode))
                {
                    return FALSE;
                }
                elseif(!self::chmodr($fullpath, $filemode))
                {
                    return FALSE;
                }
            }
        }

        closedir($dh);

        if(@chmod($path, $filemode))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
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
        }
        else
        {
            return false;
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
    public static function pagination ( $config )
    {
        //参数处理
        $url_prefix    = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page  = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name     = empty($config['page_name']) ? 'page_no' : $config['page_name'];
        $page_size     = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs      = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page    = ceil($total_rs / $page_size);
        $move_size     = empty($config['move_size']) ? 5 : intval($config['move_size']);

        //总页数不到二页返回空
        if( $total_page < 2 )
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
        if( $current_page > 1 )
        {
            $pages .= "<a href='{$url_prefix}' target='_self' class='nextprev'>首页</a>\n";
            $pages .= "<a href='{$url_prefix}&{$page_name}={$prev_page}' target='_self' class='nextprev'>上一页</a>\n";
        }
        else
        {
            $pages .= "<span class='nextprev'>首页</span>\n";
            $pages .= "<span class='nextprev'>上一页</span>\n";
        }

        //前偏移
        for( $i = $current_page - $move_size; $i < $current_page; $i++ )
        {
            if ($i < 1) {
                continue;
            }
            $pages .= "<a target='_self' href='{$url_prefix}&{$page_name}={$i}'>$i</a>\n";
        }
        //当前页
        $pages .= "<span class='current'>" . $current_page . "</span>\n";

        //后偏移
        $flag = 0;
        if ( $current_page < $total_page )
        {
            for ($i = $current_page + 1; $i <= $total_page; $i++)
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
        if( $current_page != $total_page )
        {
            $pages .= "<a href='{$url_prefix}&{$page_name}={$next_page}' class='nextprev'>下一页</a>\n";
            $pages .= "<a href='{$url_prefix}&{$page_name}={$last_page}'>末页</a>\n";
        }
        else
        {
            $pages .= "<span class='nextprev'>下一页</span>\n";
            $pages .= "<span class='nextprev'>末页</span>\n";
        }

        //增加输入框跳转
        if( !empty($config['input']) )
        {
            $pages .= '<input type="text" class="page" onkeydown="javascript:if(event.keyCode==13){ location=\''.$url_prefix.'&'.$page_name.'=\'+this.value; }" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        }

        $pages .= "<span>共 {$total_page} 页 / {$total_rs} 条记录</span>\n";
        $pages .= '</div>';

        return $pages;
    }

    public static function pagination_v2 ( $config )
    {
        //参数处理
        $url_prefix    = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page  = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name     = empty($config['page_name']) ? 'p' : $config['page_name'];
        $page_size     = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs      = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page    = ceil($total_rs / $page_size);
        $move_size     = empty($config['move_size']) ? 5 : intval($config['move_size']);

        //总页数不到二页返回空
        if( $total_page < 2 )
        {
            return '';
        }

        //分页内容
        $pages = '<div class="pages">';

        //下一页
        $next_page = $current_page + 1;
        //上一页
        $prev_page = $current_page - 1;
        //末页
        $last_page = $total_page;

        //上一页、首页
        if( $current_page > 1 )
        {
            //$pages .= "<a href='{$url_prefix}' class='nextprev'>首页</a>\n";
            $pages .= "<a target='_self' href='{$url_prefix}&{$page_name}={$prev_page}' class='nextprev'>上一页</a>\n";
        }
        //else
        //{
         //   $pages .= "<span class='nextprev'>首页</span>\n";
          //  $pages .= "<span class='nextprev'>上一页</span>\n";
        //}

        //前偏移
        for( $i = $current_page - $move_size; $i < $current_page; $i++ )
        {
            if ($i < 1) {
                continue;
            }
            $pages .= "<a target='_self' href='{$url_prefix}&{$page_name}={$i}'>$i</a>\n";
        }
        //当前页
        $pages .= "<a href='#' class='current'>" . $current_page . "</a>\n";

        //后偏移
        $flag = 0;
        if ( $current_page < $total_page )
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
        if( $current_page != $total_page )
        {
            $pages .= "<a target='_self' href='{$url_prefix}&{$page_name}={$next_page}' class='nextprev'>下一页</a>\n";
           // $pages .= "<a href='{$url_prefix}&{$page_name}={$last_page}'>末页</a>\n";
        }
        //else
        //{
          //  $pages .= "<span class='nextprev'>下一页</span>\n";
           // $pages .= "<span class='nextprev'>末页</span>\n";
       // }

        //增加输入框跳转
        //if( !empty($config['input']) )
        //{
         //   $pages .= '<input type="text" class="page" onkeydown="javascript:if(event.keyCode==13){ location=\''.$url_prefix.'&'.$page_name.'=\'+this.value; }" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        //}

       // $pages .= "<span>共 {$total_page} 页 / {$total_rs} 条记录</span>\n";
        $pages .= '</div>';

        return $pages;
    } 

    public static function pagination_v3 ( $config )
    {
        //参数处理
        $url_prefix    = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page  = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name     = empty($config['page_name']) ? 'p' : $config['page_name'];
        $page_size     = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs      = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page    = ceil($total_rs / $page_size);
        $move_size     = empty($config['move_size']) ? 5 : intval($config['move_size']);

        //总页数不到二页返回空
        if( $total_page < 2 )
        {
            return '';
        }

        //分页内容
        $pages = '<div class="pages">';

        //下一页
        $next_page = $current_page + 1;
        //上一页
        $prev_page = $current_page - 1;
        //末页
        $last_page = $total_page;

        //上一页、首页
        if( $current_page > 1 )
        {
            //$pages .= "<a href='{$url_prefix}' class='nextprev'>首页</a>\n";
            $pages .= "<a href='{$url_prefix}&{$page_name}={$prev_page}' class='prev'>上一页</a>\n";
        }
        //else
        //{
         //   $pages .= "<span class='nextprev'>首页</span>\n";
          //  $pages .= "<span class='nextprev'>上一页</span>\n";
        //}

        //前偏移
        for( $i = $current_page - $move_size; $i < $current_page; $i++ )
        {
            if ($i < 1) {
                continue;
            }
            $pages .= "<a target='_self' href='{$url_prefix}&{$page_name}={$i}'>$i</a>\n";
        }
        //当前页
        $pages .= "<a href='#' class='current'>" . $current_page . "</a>\n";

        //后偏移
        $flag = 0;
        if ( $current_page < $total_page )
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
        if( $current_page != $total_page )
        {
            $pages .= "<a target='_self' href='{$url_prefix}&{$page_name}={$next_page}' class='next'>下一页</a>\n";
           // $pages .= "<a href='{$url_prefix}&{$page_name}={$last_page}'>末页</a>\n";
        }
        //else
        //{
          //  $pages .= "<span class='nextprev'>下一页</span>\n";
           // $pages .= "<span class='nextprev'>末页</span>\n";
       // }

        //增加输入框跳转
        //if( !empty($config['input']) )
        //{
         //   $pages .= '<input type="text" class="page" onkeydown="javascript:if(event.keyCode==13){ location=\''.$url_prefix.'&'.$page_name.'=\'+this.value; }" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        //}

       // $pages .= "<span>共 {$total_page} 页 / {$total_rs} 条记录</span>\n";
        $pages .= '</div>';

        return $pages;
    }     


     /**
     * 伪静态的分页
     */
    public static function pagination_vurl ( $config )
    {
        //参数处理
        $url_prefix    = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page  = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name     = empty($config['page_name']) ? 'page_no' : $config['page_name'];
        $page_size     = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs      = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page    = ceil($total_rs / $page_size);
        $move_size     = empty($config['move_size']) ? 5 : intval($config['move_size']);

        //总页数不到二页返回空
        if( $total_page < 2 )
        {
            return '';
        }

        //分页内容
        $pages = '<div class="pages">';

        //下一页
        $next_page = $current_page + 1;
        //上一页
        $prev_page = $current_page - 1;
        //末页
        $last_page = $total_page;

        //上一页、首页
        if( $current_page > 1 )
        {
            //$pages .= "<a href='{$url_prefix}.html' class='nextprev'>首页</a>\n";
            $pages .= "<a href='{$url_prefix}-{$prev_page}.html' class='pre'>上一页</a>\n";
        }
        //else
        //{
            //$pages .= "<span class='nextprev'>首页</span>\n";
           // $pages .= "<a class='pre'>上一页</a>\n";
        //}

        //前偏移
        for( $i = $current_page - $move_size; $i < $current_page; $i++ )
        {
            if ($i < 1) {
                continue;
            }
            $pages .= "<a href='{$url_prefix}-{$i}.html'>$i</a>\n";
        }
        //当前页
        $pages .= "<a class='current'>" . $current_page . "</a>\n";

        //后偏移
        $flag = 0;
        if ( $current_page < $total_page )
        {
            for ($i = $current_page + 1; $i < $total_page; $i++)
            {
                $pages .= "<a href='{$url_prefix}-{$i}.html'>$i</a>\n";
                $flag++;
                if ($flag == $move_size)
                {
                    break;
                }
            }
        }

        //下一页、末页
        if( $current_page != $total_page )
        {
            $pages .= "<a href='{$url_prefix}-{$next_page}.html' class='next'>下一页</a>\n";
            //$pages .= "<a href='{$url_prefix}-{$last_page}.html'>末页</a>\n";
        }
        //else
        //{
            //$pages .= "<a class='next'>下一页</a>\n";
            //$pages .= "<span class='next'>末页</span>\n";
        //}

        //增加输入框跳转
       // if( !empty($config['input']) )
        //{
         //   $pages .= '<input type="text" class="page" onkeydown="javascript:if(event.keyCode==13){ location=\''.$url_prefix.'&'.$page_name.'=\'+this.value; }" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        //}

        //$pages .= "<span>共 {$total_page} 页 / {$total_rs} 条记录</span>\n";
        $pages .= '</div>';

        return $pages;
    }  
    
    /**
     * 筛选页静态的分页
     */
    public static function pagination_lists ($config )
    {
        //参数处理
        $url_prefix    = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page  = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name     = empty($config['page_name']) ? 'page_no' : $config['page_name'];
        $page_size     = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs      = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page    = ceil($total_rs / $page_size);
        $move_size     = empty($config['move_size']) ? 5 : intval($config['move_size']);


        //总页数不到二页返回空
        if( $total_page < 2 )
        {
            return '';
        }

        //分页内容
        $pages = '<div class="pageNum">';

        //下一页
        $next_page = $current_page + 1;
        //上一页
        $prev_page = $current_page - 1;
        //末页
        $last_page = $total_page;

        //上一页、首页
        if( $current_page > 1 )
        {
            //$pages .= "<a href='{$url_prefix}.html' class='nextprev'>首页</a>\n";
            $pages .= "<a href='{$url_prefix}-{$prev_page}.html' class='backPage' target='_self'>上一页</a>\n";
        }

        //前偏移
        for( $i = $current_page - $move_size; $i < $current_page; $i++ )
        {
            if ($i < 1) {
                continue;
            }
            $pages .= "<a href='{$url_prefix}-{$i}.html' target='_self'>$i</a>\n";
        }
        //当前页
        $pages .= "<a class='current act'>" . $current_page . "</a>\n";
echo '<!--'.$current_page.'-->';
        //后偏移
        $flag = 0;
        if ( $current_page < $total_page )
        {
            for ($i = $current_page + 1; $i < ($total_page +1); $i++)
            {
                $pages .= "<a href='{$url_prefix}-{$i}.html' target='_self'>$i</a>\n";
                $flag++;
                if ($flag == $move_size)
                {
                    break;
                }
            }
        }

        //下一页、末页
        if( $current_page != $total_page )
        {
            $pages .= "<a href='{$url_prefix}-{$next_page}.html' target='_self' class='nextPage'>下一页</a>\n";
        }
        $pages .= '</div>';

        return preg_replace('@(\d+)-(\d+)-(\d+)-1\.html@Ui', '$1-$2-$3.html', $pages);
    }   
    
     /**
     * 搜索伪静态分页
     */
    public static function pagination_vsearch ( $config ){
        //参数处理
        $url_prefix    = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page  = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name     = empty($config['page_name']) ? 'page_no' : $config['page_name'];
        $page_size     = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs      = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page    = ceil($total_rs / $page_size);
        $move_size     = empty($config['move_size']) ? 4 : intval($config['move_size']);

        //总页数不到二页返回空
        if( $total_page < 2 ){
            return '';
        }

        //分页内容
        $pages = '<div class="searchEndPage">';

        //下一页
        $next_page = $current_page + 1;
        //上一页
        $prev_page = $current_page - 1;

        //上一页、首页
        if($current_page!==1){
            $pages .= "<a href='{$url_prefix}.html'>首页</a>";
        }
        if( $current_page > 1 ){
            $page=$url_prefix;
            if($prev_page>1){
                $page.='-'.$i;
            }
            $page.='.html';
            $pages .= "<a href='$page' class='sePar'>上一页</a>";
        }

        if($total_page<10){
            for($i=1;$i<=$total_page;$i++){
                $current=$current_page===$i?' class="act"':'';
                $page=$url_prefix;
                if($i>1){
                    $page.='-'.$i;
                }
                $page.='.html';
                $pages .= "<a href='$page'$current>$i</a>";
            }
        }else{
            //前偏移
            for( $i = $current_page - $move_size; $i < $current_page; $i++ ){
                if ($i < 1){
                    continue;
                }
                $page=$url_prefix.'-'.$i.'.html';
                $pages .= "<a href='$page'>$i</a>";
            }
            //当前页
            $pages .= "<a class='act'>" . $current_page . "</a>";

            //后偏移
            $flag = 0;
            if ( $current_page < $total_page ){
                for ($i = $current_page + 1; $i < $total_page; $i++){
                    $pages .= "<a href='{$url_prefix}-{$i}.html'>$i</a>";
                    $flag++;
                    if ($flag == $move_size){
                        break;
                    }
                }
            }
        }
        
        

        //下一页、末页
        if( $current_page != $total_page ){
            $pages .= "<a href='{$url_prefix}-{$next_page}.html' class='seNext'>下一页</a>";
        }
        $current=$current_page==$total_page?' class="current"':'';
        if($current!==$total_page){
            $pages .= "<a href='{$url_prefix}-{$total_page}.html'$current>末页</a>";
        }        
        $pages .= '</div>';

        return $pages;
    }  
    /**
     * 专题页伪静态分页
     */
    public static function pagination_ztindex ( $config ){
        //参数处理
        $url_prefix    = empty($config['url_prefix']) ? '' : $config['url_prefix'];
        $current_page  = empty($config['current_page']) ? 1 : intval($config['current_page']);
        $page_name     = empty($config['page_name']) ? 'page_no' : $config['page_name'];
        $page_size     = empty($config['page_size']) ? 0 : intval($config['page_size']);
        $total_rs      = empty($config['total_rs']) ? 0 : intval($config['total_rs']);
        $total_page    = ceil($total_rs / $page_size);
        $move_size     = empty($config['move_size']) ? 4 : intval($config['move_size']);

        //总页数不到二页返回空
        if( $total_page < 2 ){
            return '';
        }

        //分页内容
        $pages = '<div class="pageType">';

        //下一页
        $next_page = $current_page + 1;
        //上一页
        $prev_page = $current_page - 1;

        //上一页、首页
        if( $current_page > 1 ){
            $page=$url_prefix;
            $page.='-'.$i;
            $page.='.html';
            $pages .= "<a href='$page' class='pageLeft'><b></b>上一页</a>";
        }

        if($total_page<10){
            for($i=1;$i<=$total_page;$i++){
                $current=$current_page===$i?' class="pageHv"':'';
                $page=$url_prefix;
                $page.='-'.$i;
                $page.='.html';
                $pages .= "<a href='$page'$current>$i</a>";
            }
        }else{
            //前偏移
            for( $i = $current_page - $move_size; $i < $current_page; $i++ ){
                if ($i < 1){
                    continue;
                }
                $page=$url_prefix.'-'.$i.'.html';
                $pages .= "<a href='$page'>$i</a>";
            }
            //当前页
            $pages .= "<a class='pageHv'>" . $current_page . "</a>";

            //后偏移
            $flag = 0;
            if ( $current_page < $total_page ){
                for ($i = $current_page + 1; $i < $total_page; $i++){
                    $pages .= "<a href='{$url_prefix}-{$i}.html'>$i</a>";
                    $flag++;
                    if ($flag == $move_size){
                        break;
                    }
                }
            }
        }
        
        

        //下一页、末页
        if( $current_page != $total_page ){
            $pages .= "<a href='{$url_prefix}-{$next_page}.html' class='pageRight'>下一页<b></b></a>";
        }
        $pages .= '</div>';

        return $pages;
    }  
    
    public static function cn_truncate($string, $length = 80, $etc = '...', $count_words = true)
    {
        mb_internal_encoding("UTF-8");
        if ($length == 0)return '';
        if ( strlen( $string ) <= $length ) return $string;
        preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info); 
        if( $count_words ){
            $j = 0;
            $wordscut = "";
            for($i=0; $i<count($info[0]); $i++) {
                $wordscut .= $info[0][$i];
                if( ord( $info[0][$i] ) >=128 ){
                    $j = $j+2;
                }else{
                    $j = $j + 1;
                }
                if ($j >= $length ) {
                    return $wordscut.$etc;
                }
            }
            return join('', $info[0]);
        }
        return join("",array_slice( $info[0],0,$length ) ).$etc;

    }

   /**
    * utf8编码模式的中文截取2，单字节截取模式
    * 这里不使用mbstring扩展
    * @return string
    */
    public static function utf8_substr($str, $slen, $startdd=0)
    {
        return mb_substr($str , $startdd , $slen , 'UTF-8');
    }

    /**
     * 从普通时间返回Linux时间截(strtotime中文处理版)
     * @parem string $dtime
     * @return int
     */
    public static function cn_strtotime( $dtime )
    {
        if(!preg_match("/[^0-9]/", $dtime))
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
        if(!isset($ymd[1]))
        {
            $ymd = explode(".", $ds[0]);
        }
        if(isset($ymd[0]))
        {
            $dt[0] = $ymd[0];
        }
        if(isset($ymd[1])) $dt[1] = $ymd[1];
        if(isset($ymd[2])) $dt[2] = $ymd[2];
        if(strlen($dt[0])==2) $dt[0] = '20'.$dt[0];
        if(isset($ds[1]))
        {
            $hms = explode(":", $ds[1]);
            if(isset($hms[0])) $dt[3] = $hms[0];
            if(isset($hms[1])) $dt[4] = $hms[1];
            if(isset($hms[2])) $dt[5] = $hms[2];
        }
        foreach($dt as $k=>$v)
        {
            $v = preg_replace("/^0{1,}/", '', trim($v));
            if($v=='')
            {
                $dt[$k] = 0;
            }
        }
        $mt = mktime($dt[3], $dt[4], $dt[5], $dt[1], $dt[2], (int)$dt[0]);
        if(!empty($mt))
        {
            return $mt;
        }
        else
        {
            return strtotime( $dtime );
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
        try
        {
            $smtp = new cls_mail($send_account['host'], $send_account['port'], true, $send_account['user'], $send_account['password']);
            $smtp->debug = $send_account['debug'];
            $result = $smtp->sendmail($to, $send_account['from'], $subject, $body, $send_account['type']);

            return $result;
        }
        catch( Exception $e )
        {
            return false;
        }
    }

    public static function cutstr_html($string, $sublen)    
    {
        $string = strip_tags($string);
        $string = preg_replace ('/\n/is', '', $string);
        $string = preg_replace ('/ |　/is', '', $string);
        $string = preg_replace ('/&nbsp;/is', '', $string);

        preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string);   
        if(count($t_string[0]) - 0 > $sublen) $string = join('', array_slice($t_string[0], 0, $sublen))."…";   
        else $string = join('', array_slice($t_string[0], 0, $sublen));

        return $string;
    }

     /**
     * xml转成php数据
     */
    public static function xml2array($contents, $get_attributes = 0)
    {

        if(!$contents) return array();

        if(!function_exists('xml_parser_create')) {
            //print "'xml_parser_create()' function not found!";
            return array();
        }
        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create();
        xml_parser_set_option( $parser, XML_OPTION_CASE_FOLDING, 0 );
        xml_parser_set_option( $parser, XML_OPTION_SKIP_WHITE, 1 );
        xml_parse_into_struct( $parser, $contents, $xml_values );
        xml_parser_free( $parser );

        if(!$xml_values) return;//Hmm...

        //print_r($xml_values);
        //Initializations
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();

        $current = &$xml_array;

        //Go through the tags.
        foreach($xml_values as $data) {
            unset($attributes,$value);//Remove existing values, or there will be trouble

            //This command will extract these variables into the foreach scope
            // tag(string), type(string), level(int), attributes(array).
            extract($data);//We could use the array by itself, but this cooler.

            $result = '';
            if($get_attributes) {//The second argument of the function decides this.
                //$result = array();
                $result = '';
                //if(isset($value)) $result = $value;
                if(isset($value)) $result['value'] = $value;

                //Set the attributes too.
                if(isset($attributes)) {
                    foreach($attributes as $attr => $val) {
                        if($get_attributes == 1) $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                    }
                }
            } elseif(isset($value)) {
                $result = $value;
            }

            //See tag status and do the needed.
            if($type == "open") {//The starting of the tag "
                $parent[$level-1] = &$current;

                if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                    $current[$tag] = $result;
                    $current = &$current[$tag];

                } else { //There was another element with the same tag name
                    if(isset($current[$tag][0])) {
                        array_push($current[$tag], $result);
                    } else {
                        $current[$tag] = array($current[$tag],$result);
                    }
                    $last = count($current[$tag]) - 1;
                    $current = &$current[$tag][$last];
                }

            } elseif($type == "complete") { //Tags that ends in 1 line "
                //See if the key is already taken.
                if(!isset($current[$tag])) { //New Key
                    $current[$tag] = $result;

                } else { //If taken, put all things inside a list(array)
                    if((is_array($current[$tag]) and $get_attributes == 0)//If it is already an array…
                            or (isset($current[$tag][0]) and is_array($current[$tag][0]) and $get_attributes == 1)) {
                        array_push($current[$tag],$result); // …push the new element into that array.
                    } else { //If it is not an array…
                        $current[$tag] = array($current[$tag],$result); //…Make it an array using using the existing value and the new value
                    }
                }

            } elseif($type == 'close') { //End of tag "
                $current = &$parent[$level-1];
            }
        }
        return($xml_array);
    }

     /**
     * 加上per的print_r
     */
    public static function print_r($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    /**
     * 保存文件到本地
     * @param 文件路径 $url
     * @param 保存本地路径 $savePath
     * @return string
     * @author zero<512888425@qq>
     */
    public static function downloadFile($url,$strPath='',$strName='')
    {
        $savePath = PATH_ROOT.'/'.trim($strPath,'/').'/'.date('Ym').'/'.date('d');
        @self::dir_create($savePath);
        if(self::path_exists($savePath))
        {
            $urls = explode('|',$url);
            $imgs = '';
            if(is_array($urls))
            {
                foreach($urls as $key => $val)  
                {
                    $fileName = self::getUrlFileExt($val);
                    $FILE_MIMES = array("jpg","JPG","jpeg","JPEG","gif","GIF","png","PNG");
                    if(in_array($fileName, $FILE_MIMES))
                    {
                        $fileName = self::random_id().'.'.$fileName;
                    }
                    else
                    {
                        $fileName = self::random_id().'.'.'jpg';
                    }
					if($strName)$fileName = $strName;
                    $file = self::download_remote_file($val);
                    //$file = util::curl_file_get_contents($val);
                    if($file){
                        file_put_contents($savePath.'/'.$fileName,$file);
                        $imgs .= '/'.trim($strPath,'/').'/'.date('Ym').'/'.date('d').'/'.$fileName.'|';
                    }else{

                        return 'download errors';
                    }
                }   
            }
            else
            {
                $string = 'img errors';
                return $string;
            }   
        }
        $img = substr($imgs,0,strlen($imgs)-1); 
        return $img;
    }    

     /**
     * 新建目录
     */
    public static function dir_create($path, $mode = 0777)
    {
        if(is_dir($path)) return true;
        $path = self::dir_path($path);
        $temp = explode('/', $path);
        $cur_dir = '';
        $max = count($temp) - 1;
        for($i=0; $i < $max; $i++)
        {
            $cur_dir .= $temp[$i];
            if(is_dir($cur_dir)  ) {
                $cur_dir .= '/';
                continue;
            }
        if(@mkdir($cur_dir) ) {
            chmod($cur_dir, 0777);
        }
        $cur_dir .= '/';
        }
        return is_dir($path);
    } 



    /**
     * 创建目录（如果该目录的上级目录不存在，会先创建上级目录）
     * 依赖于 PATH_DATA 常量，且只能创建 PATH_ROOT 目录下的目录
     * 目录分隔符必须是 / 不能是 \
     *
     * @param   string  $absolute_path  绝对路径
     * @param   int     $mode           目录权限
     * @return  bool
     */
    public static function  mkdir($absolute_path, $mode = 0777)
    {
        if (is_dir($absolute_path))
        {
            return true;
        }

        $root_path      = PATH_DATA;
        $relative_path  = str_replace($root_path, '', $absolute_path);
        $each_path      = explode('/', $relative_path);
        $cur_path       = $root_path; // 当前循环处理的路径
        foreach ($each_path as $path)
        {
            if ($path)
            {
                $cur_path = $cur_path . '/' . $path;
                if (!is_dir($cur_path))
                {
                    if (@mkdir($cur_path, $mode))
                    {
                        fclose(fopen($cur_path . '/index.htm', 'w'));
                    }
                    else
                    {
                        return false;
                    }
                }
            }
        }

        return true;
    }    

    public static function dir_path($path)
    {
        $path = str_replace('\\', '/', $path);
        if(substr($path, -1) != '/') $path = $path.'/';
        return $path;
    }   

    //安全过滤
    public static function safe_ids($param)
    {
        return preg_match('/^\d{1,}$/',$param);
    }

    /**
     * 获取文件扩展名
     * @param 网页URL $url
     * @return string
     * @author zero<512888425@qq>
     */
    public static function getUrlFileExt($url)
    {
        $ary = parse_url($url);
        $file = basename($ary['path']);
        $ext = explode('.',$file);
        return isset($ext[1]) ?  $ext[1] : '';
    }     

     /**
     * 不重复的随机数
     * 用作采集时的文件,批量下载进防止文件重复
     */
    public static function random_id() { 
        $chars = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $chars_cnt = strlen($chars)-1; 
        $id = ''; 
        for ($i = 0; $i < 5; ++$i) 
        {   
            $id .= $chars[rand(0, $chars_cnt)]; 
        } 
        return str_shuffle($id.+rand(100000,999999)); 
    }    

   /**
    *  处理禁用HTML但允许换行的内容
    *
    * @access    public
    * @param     string  $msg  需要过滤的内容
    * @return    string
    */
    public static function TrimMsg($msg)
    {
        $msg = trim(stripslashes($msg));
        $msg = nl2br(htmlspecialchars($msg));
        $msg = str_replace("  ","&nbsp;&nbsp;",$msg);
        return addslashes($msg);
    }

}
