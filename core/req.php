<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 处理外部请求变量的类
 *
 * 禁止此文件以外的文件出现 $_POST、$_GET、$_FILES变量及eval函数(用 req::myeval )
 * 以便于对主要黑客攻击进行防范
 *
 * @author itprato<2500875@qq>
 * @version $Id$
 */
class req
{
    //用户的cookie
    public static $cookies = array();

    //把GET、POST的变量合并一块，相当于 _REQUEST
    public static $forms = array();
    
    //_GET 变量
    public static $gets = array();

    //_POST 变量
    public static $posts = array();

    //用户的请求模式 GET 或 POST
    public static $request_mdthod = 'GET';

    //文件变量
    public static $files = array();
    
    //url_rewrite
    public static $url_rewrite = false;
    
    //严禁保存的文件名
    public static $filter_filename = '/\.(php|pl|sh|js)$/i';

   /**
    * 初始化用户请求
    * 对于 post、get 的数据，会转到 selfforms 数组， 并删除原来数组
    * 对于 cookie 的数据，会转到 cookies 数组，但不删除原来数组
    */
    public static function init()
    {
        //命令行模式
        if( empty($_SERVER['REQUEST_METHOD']) ) {
            return false;
        }
        
        //默认参数
        /**
         **bug php5.3.x如果编译时使用了--enable-magic-quotes_gpc选项, ini_get方法仍可使用**
        $php_ver = preg_replace("/[^0-9\.]/", '', PHP_VERSION);
        if( version_compare($php_ver, '5.3.0', '<') ) {
            $magic_quotes_gpc = ini_get('magic_quotes_gpc');
        }
        else {
            $magic_quotes_gpc = false;
        }
        */
        $magic_quotes_gpc = ini_get('magic_quotes_gpc');
        
        //是否启用rewrite(保留参数)
        self::$url_rewrite = isset($GLOBALS['config']['use_rewrite']) ? $GLOBALS['config']['use_rewrite'] : false;
        
        //处理post、get
        self::$request_mdthod = '';
        if( $_SERVER['REQUEST_METHOD']=='GET' ) {
            self::$request_mdthod = 'GET';
            $request_arr = $_GET;
        } else if(self::$request_mdthod=='POST') {
            self::$request_mdthod = 'POST';
            $request_arr = $_POST;
        } else {
            self::$request_mdthod = $_SERVER['REQUEST_METHOD'];
            $request_arr = $_REQUEST;
        }
        //unset($_POST);
        //unset($_GET);
        //unset($_REQUEST);
        if( count($request_arr) > 0 )
        {
            foreach($request_arr as $k => $v)
            {
                 if( preg_match('/^config/i', $k) ) {
                     throw new Exception('request var name not alllow!');
                     exit();
                 }
                 if( !$magic_quotes_gpc ) {
                     self::add_s( $v );
                 }
                 self::$forms[$k] = $v;
                 if( self::$request_mdthod=='POST' ) {
                     self::$posts[$k] = $v;
                 } else if( self::$request_mdthod=='GET' ) {
                     self::$gets[$k] = $v;
                 }
            }
        }

        if(!self::$forms['ct'])self::$forms['ct'] = $_REQUEST['ct'];
        if(!self::$forms['ac'])self::$forms['ac'] = $_REQUEST['ac'];
        unset($_POST,$_GET,$_REQUEST);
        
        //处理url_rewrite(暂时不实现)
        if( self::$url_rewrite )
        {
            $gstr = empty($_SERVER['QUERY_STRING']) ? '' : $_SERVER['QUERY_STRING'];
            if( empty($gstr) )
            {
                $gstr = empty($_SERVER['PATH_INFO']) ? '' : $_SERVER['PATH_INFO'];
            }
        }
        
        //默认ac和ct
        self::$forms['ct'] = isset(self::$forms['ct']) ? self::$forms['ct'] : 'index';
        self::$forms['ac'] = isset(self::$forms['ac']) ? self::$forms['ac'] : 'xmfx';
        
        //处理cookie
        if( count($_COOKIE) > 0 )
        {
            if( !$magic_quotes_gpc ) {
                self::add_s( $_COOKIE );
            }
            foreach($_COOKIE as $k=>$v)
            {
                self::$cookies[$k] = $v;
            }
        }
        
        //上传的文件处理
        if( isset($_FILES) && count($_FILES) > 0 )
        {
            if( !$magic_quotes_gpc ) {
                self::add_s( $_FILES );
            }
            self::filter_files($_FILES);
        }

    }
    
    //强制要求对gpc变量进行转义处理
    public static function add_s( &$array )
    {
        if( !is_array($array) )
        {
            $array =  addslashes($array);
        }
        else
        {
            foreach($array as $key => $value)
            {
                if( !is_array($value) ) {
                $array[$key] = addslashes($value);
                } else {
                self::add_s($array[$key]);
                }
            }
        }
    }

   /**
    * 把 eval 重命名为 myeval
    */
    public static function myeval( $phpcode )
    {
        return eval( $phpcode );
    }

   /**
    * 获得指定表单值
    */
    public static function item( $formname, $defaultvalue = '' )
    {
		tpl::hosts($_SERVER['HTTP_HOST'])===false?exit:"";
        return isset(self::$forms[$formname]) && self::$forms[$formname]!='' ? self::$forms[$formname] :  $defaultvalue;
        //return isset(self::$forms[$formname]) ? self::$forms[$formname] :  $defaultvalue;
    }

   /**
    * 获得指定临时文件名值
    */
    public static function upfile( $formname, $defaultvalue = '' )
    {
        return isset(self::$files[$formname]['tmp_name']) && self::$files[$formname]['tmp_name']!='' ? self::$files[$formname]['tmp_name'] :  $defaultvalue;
        //return isset(self::$files[$formname]['tmp_name']) ? self::$files[$formname]['tmp_name'] :  $defaultvalue;
    }

   /**
    * 过滤文件相关
    */
    public static function filter_files( &$files )
    {
        foreach($files as $k=>$v)
        {
            self::$files[$k] = $v;
        }
        unset($_FILES);
    }

   /**
    * 移动上传的文件
    */
    public static function move_upload_file( $formname, $filename, $filetype = '' )
    {
        if( self::is_upload_file( $formname ) )
        {
            if( preg_match(self::$filter_filename, $filename) )
            {
                return false;
            }
            else
            {
                return move_uploaded_file(self::$files[$formname]['tmp_name'], $filename);
            }
        }
    }

   /**
    * 获得文件的扩展名
    */
    public static function get_shortname( $formname )
    {
        $filetype = strtolower(isset(self::$files[$formname]['type']) ? self::$files[$formname]['type'] : '');
        $shortname = '';
        switch($filetype)
        {
            case 'image/jpeg':
                $shortname = 'jpg';
                break;
            case 'image/pjpeg':
                $shortname = 'jpg';
                break;
            case 'image/gif':
                $shortname = 'gif';
                break;
            case 'image/png':
                $shortname = 'png';
                break;
            case 'image/xpng':
                $shortname = 'png';
                break;
            case 'image/wbmp':
                $shortname = 'bmp';
                break;
            default:
                $filename = isset(self::$files[$formname]['name']) ? self::$files[$formname]['name'] : '';
                if( preg_match("/\./", $filename) )
                {
                    $fs = explode('.', $filename);
                    $shortname = strtolower($fs[ count($fs)-1 ]);
                }
                break;
        }
        return $shortname;
    }

   /**
    * 获得指定文件表单的文件详细信息
    */
    public static function get_file_info( $formname, $item = '' )
    {
        if( !isset( self::$files[$formname]['tmp_name'] ) )
        {
            return false;
        }
        else
        {
            if($item=='')
            {
                return self::$files[$formname];
            }
            else
            {
                return (isset(self::$files[$formname][$item]) ? self::$files[$formname][$item] : '');
            }
        }
    }

   /**
    * 判断是否存在上传的文件
    */
    public static function is_upload_file( $formname )
    {
        if( !isset( self::$files[$formname]['tmp_name'] ) )
        {
            return false;
        }
        else
        {
            return is_uploaded_file( self::$files[$formname]['tmp_name'] );
        }
    }
    
    /**
     * 检查文件后缀是否为指定值
     *
     * @param  string  $subfix
     * @return boolean
     */
    public static function check_subfix($formname, $subfix = 'csv')
    {
        if( self::get_shortname( $formname ) != $subfix)
        {
            return false;
        }
        return true;
    }

}
