<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * Url Rewrite 处理类
 * 类仅对输出的html进行预先转换处理，具体实现需rewrite结合或程序自行生成相应的实体文件
 */
class cls_rewrite
{
    
    public static $rules = array();
    protected static $is_load = false;
    //指示替换网址是在编译前还是输出前
    //前者性能好，后者替换更彻底
    protected static $rp_type = 0;
    
   /**
    * 加载 rewrite rule 文件
    */
    protected static function load_rule()
    {
        self::$is_load = true;
        self::$rp_type = $GLOBALS['config']['rewrite_rptype'];
        $rulefile = PATH_DATA.'/rewrite.ini';
        if( file_exists($rulefile) )
        {
            $ds = file($rulefile);
            foreach($ds as $line)
            {
                $line = trim($line);
                if( $line=='' || $line[0]=='#')
                {
                    continue;
                }
                list($s, $t) = preg_split('/[ ]{4,}/', $line); //用至少四个空格分隔，这样即使s、t中有空格也能识别
                $s = rtrim($s);
                $t = ltrim($t);
                if( $s != '' && $t !='' )
                {
                    if(self::$rp_type==0)
                    {
                        $s = str_replace('\w', '$<>\[\]\{\}\.\w', $s);
                    }
                    self::$rules[ $s ] = $t;
                }
            }
        }
    }
    
   /**
    * 转换要输出的内容里的网址
    * @parem string $html
    */
    public static function convert_html(&$html, $pos=0)
    {
        if( !self::$is_load )
        {
            self::load_rule();
        }
        if( $pos != self::$rp_type )
        {
            return ;
        }
        foreach(self::$rules as $s=>$t)
        {
            if( $s[0] != '^' && $s[strlen($s)-1] != '$' )
            {
                $html = preg_replace('/'.$s.'/iU', $t, $html);
            }
            else
            {
                $ts1 = $ts2 = $s;
                $tt1 = $tt2 = $t;
                if( $s[0]=='^' )
                {
                    $ts1[0] = '"';
                    $tt1 = '"'.$tt1;
                    
                    $ts2[0] = '\'';
                    $tt2 = '\''.$tt2;
                }
                if( $s[strlen($s)-1] == '$' )
                {
                    $ts1[strlen($ts1)-1] = '"';
                    $tt1 = $tt1.'"';
                    
                    $ts2[strlen($ts2)-1] = '\'';
                    $tt2 = $tt2.'\'';
                }
                //echo $ts1.' --> '.$tt1."<br />";
                //echo $ts2.' --> '.$tt2."<br />";
                $html = preg_replace('/'.$ts1.'/iU', $tt1, $html);
                $html = preg_replace('/'.$ts2.'/iU', $tt2, $html);
            }
        }
    }
    
    /**
    * 转换单个网址
    * @parem string $url
    */
    public static function convert_url($url)
    {
        if( !self::$is_load )
        {
            self::load_rule();
        }
        foreach(self::$rules as $s=>$t)
        {
            $url = preg_replace('/'.$s.'/iU', $t, $url);
        }
        return $url;
    }
    
}
