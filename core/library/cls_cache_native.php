<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 本地文件缓存类(cls_filecache实现类，与cache类接近，不过本类强制使用filecache)
 *
 * @since 2011-07-20
 * @author itprato<2500875@qq>
 * @version $Id$
 */
define('CLS_CACHE_NATIVE', true);
class cls_cache_native
{
    
   //缓存记录内存变量
   private $caches = array();
   
   //文件缓存系统或memcache游标
   private $mc_handle = null;
   
   //缓存类型（file|memcache|memcached）
   public static $cache_type = 'file';
   
   //key默认前缀
   private static $df_prefix = 'mc_native_';
   
   //默认缓存时间
   private static $cache_time = 86400;
   
   //当前类实例
   private static $instance = null;
   
   /**
    * 构造函数
    * @return void
    */
    public function __construct()
    {
        $this->mc_handle = cls_filecache::factory( PATH_CACHE.'/cfc_native' );
    }
    
   /**
    * 为自己创建实例，以方便对主要方法进行静态调用
    */
    protected static function _check_instance()
    {
        if( self::$instance == null ) {
            self::$instance = new cls_cache_native();
        }
        return self::$instance;
    }
   
   /**
    * 获取key
    */
    protected static function _get_key($prefix, $key)
    {
        return base64_encode( self::$df_prefix.'_'.$prefix.'_'.$key );
    }
   
   /**
    * 增加/修改一个缓存
    * @param $prefix     前缀
    * @parem $key        键(key=base64($prefix.'_'.$key))
    * @param $value      值
    * @parem $cachetime  有效时间(0不限, -1使用系统默认)
    * @return void
    */               
    public static function set($prefix, $key, $value, $cachetime=-1)
    {
        if( self::_check_instance()===false ) {
            return false;
        }
        if($cachetime==-1) {
            $cachetime = self::$cache_time;
        }
        $key = self::_get_key($prefix, $key);
        self::$instance->mc_handle->caches[ md5($key) ] = $value;
        return self::$instance->mc_handle->set($key, $value, $cachetime);
    }
    
   /**
    * 删除缓存
    * @param $prefix     前缀
    * @parem $key        键
    * @return void
    */               
    public static function del($prefix, $key)
    {
        if( self::_check_instance()===false ) {
            return false;
        }
        $key = self::_get_key($prefix, $key);
        $key_md5 = md5( $key );
        if( isset(self::$instance->mc_handle->caches[ $key_md5 ]) ) {
            self::$instance->mc_handle->caches[ $key_md5 ] = false;
            unset(self::$instance->mc_handle->caches[ $key_md5 ]);
        }
        return self::$instance->mc_handle->delete( $key );
    }
    
   /**
    * 读取缓存
    * @param $prefix     前缀
    * @parem $key        键
    * @return void
    */               
    public static function get($prefix, $key)
    {
        if( self::_check_instance()===false ) {
            return false;
        }
        $key = self::_get_key($prefix, $key);
        $key_md5 = md5( $key );
        if( isset(self::$instance->mc_handle->caches[ $key_md5 ]) ) {
            return self::$instance->mc_handle->caches[ $key_md5 ];
        }
        return self::$instance->mc_handle->get( $key );
    }
    
   /**
    * 清理链接
    * @return void
    */               
    public static function close()
    {
        if( self::_check_instance()===false ) {
            return false;
        }
        self::$instance->mc_handle->close();
    }
    
}

 