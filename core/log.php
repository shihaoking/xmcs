<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 默认日志类
 *
 * 注意：通常情况下，debug产生的非致命错误，不要使用日志系统记录，由debug系统自行控制
 *
 * @since 2011-07-20
 * @author itprato<2500875@qq>
 * @version $Id$
 */
class log
{
    
   //日志记录内存变量
   private static $logs = array();
   
   //日志文件类型（默认file）
   private static $log_type = 'file';
   
   //日志文件路径
   private static $log_paths = array();
   
   /**
    * 增加一条日志记录(并不会马上保存，由系统结束运行时调用 log::save 方法保存)
    * @param $log_name (日志文件名[英文数字或下划线组成])
    *        通常情况下，对应的实际文件名是 $log_path/$log_name.'log'
    *        如果要指定使用特定的层级目录，直接使用 $path1/$path2/$log_name 这样作为 $log_name 即可
    *
    * @parem $msg  日志信息
    * @return void
    */               
    public static function add($log_name, $msg)
    {
        $logs[ $log_name ][] = $msg;
    }
    
   /**
    * 保存日志(由php运行结束时自动调用)
    *
    * @return void
    */               
    public static function save()
    {
        foreach(self::$logs as $log_name => $log_datas )
        {
            $log_file = self::_get_log_path( $log_name );
            $msgs = '';
            foreach($log_datas as $msg) {
                $msgs .= $msg;
            }
            file_put_contents($log_file, $msgs, FILE_APPEND);
            self::$logs = array();
        }
    }
    
   /**
    * 获得日志文件存放目录
    */
    private static function _get_log_path( $path_name )
    {
        $base_path = $GLOBALS['config']['log']['file_path'];
        
        //path_name只能同英文数字和下划线、'/'组成，并且不能最前或最后带 / 
        $path_name = preg_replace('#[^\w/]#', '', $path_name);
        $path_name = preg_replace('#^/#', '', $path_name);
        $path_name = preg_replace('#/$#', '', $path_name);
        
        //看看有没有已经计算好的文件名
        if( isset(self::$log_paths[$path_name]) )
        {
            return self::$log_paths[$path_name];
        }
        
        //计算实际路径及文件名
        if( !preg_match('#/#', $path_name) )
        {
            self::$log_paths[$path] = $base_path.'/'.$path_name.'.log';
            return self::$log_paths[$path];
        }
        else
        {
            $log_name = preg_replace("#(.*)/#", '', $path_name);
            $path = preg_replace("#/{$log_name}$#", '', $path_name);
            $paths = explode('/', $path);
            foreach($paths as $p)
            {
                if( $p != '' )
                {
                    $base_path .= '/'.$p;
                    if( !is_dir($base_path) ) {
                        mkdir($base_path, 0660);
                    }
                }
            }
            self::$log_paths[$path] = $base_path.'/'.$log_name.'.log';
            return $base_path;
        }
    }
    
}

