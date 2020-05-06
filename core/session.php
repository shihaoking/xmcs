<?php
if( !defined('CORE') ) exit('Request Error!');
//session类型， 如果使用memcache，直接由系统受理，其它情况进行接管
if( SESSION_TYPE == 'memcache' )
{
    ini_set('session.save_handler', 'memcache');
    ini_set('session.save_path', $GLOBALS['config']['cache']['memcache']['host'].'/'.$GLOBALS['config']['cache']['df_prefix']);
}
else
{
    //接口参数
    ini_set('session.gc_divisor', 1000);
    ini_set('session.gc_probability', 1000);
    session_write_close();
    session_set_save_handler("yl_session::init", "yl_session::close", "yl_session::read", 
                         "yl_session::write", "yl_session::destroy", "yl_session::gc");
                         
    //设置文件目录
    if( SESSION_TYPE == 'file' ) {
        session_save_path( PATH_CACHE );
    }   
}
/**
 * session接口类
 *
 * @author itprato<2500875@qq>
 * @version $Id$  
 */   
class yl_session
{  
    //session cookie name
    private static $session_name = '';
    
    //session_path
    private static $session_path = '';
    
    //session_id
    private static $session_id   = '';
    
    //session_live_time
    private static $session_live_time = 3600;
    
    //session类型 file || mysql
    private static $session_type = '';
    
    //文件缓存类句柄
    private static $fc_handler   = null;
    
   /**
    * 页面执行了session_start后首先调用的函数
    * @parem $save_path
    * @parem $cookie_name
    * @return void
    */
    public static function init($save_path, $cookie_name)
    {
        self::$session_name = $cookie_name;
        self::$session_path = $save_path;
        self::$session_id   = session_id();
        self::$session_type = SESSION_TYPE;
        self::$session_live_time = empty($GLOBALS['config']['session']['live_time']) ? ini_get('session.gc_maxlifetime') : $GLOBALS['config']['session']['live_time'];
        if( self::$session_type == 'file' ) {
            self::$fc_handler = cls_filecache::factory( self::$session_path.'/session_data' );
        }
        return true;
    }
    
   /**
    * 读取用户session数据
    * @parem $id
    * @return void
    */
    public static function read( $id )
    {
        return self::$fc_handler->get( $id );
    }

   /**
    * 写入指定id的session数据
    * @parem $id
    * @parem $sess_data
    * @return void
    */
    public static function write($id, $sess_data)
    {
        return self::$fc_handler->set( $id, $sess_data, self::$session_live_time );
    }

   /**
    * 注销指定id的session
    * @parem $id
    * @return void
    */
    public static function destroy( $id )
    {
        return self::$fc_handler->delete( $id );
    }

   /**
    * 清理接口
    * @parem $max_lifetime
    * @return void
    */
    public static function gc($max_lifetime)
    {
        return true;
    }

   /**
    * 关闭接口（页面结束会执行）
    */
    public static function close()
    {
        if( self::$fc_handler )
        {
            if( empty(self::$session_live_time) ) {
                self::$fc_handler->delete( self::$session_id );
            }
            self::$fc_handler->close();
        }
    }

}