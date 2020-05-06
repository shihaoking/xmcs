<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 默认缓存类
 *
 * 使用缓存应该比较注意的问题，没特殊原因一般都使用memcache或memcached作为缓存类型，对于很小规模的应用， 可以考虑用 file 作为缓存， 
 * 缓存进行 set/get/deldte 时务必指定 prefix，实际上系统最终得到的 key 是 base64_encode( self::df_prefix.'_'.$prefix.'_'.$key )
 * 为什么要这样做呢？
 * 因为memcache或memcached对应用缓存服务器群通常是很多网站一起使用的，如果没前缀区分，很容易会错把目标网站的同名缓存给crear掉
 *
 * @since 2011-07-20
 * @author itprato<2500875@qq>
 * @version $Id$
 */
define('CLS_CACHE', true);
class cache
{
    
   //缓存记录内存变量
   private $caches = array();
   
   //文件缓存系统或memcache游标
   private $mc_handle = null;
   
   //缓存类型（file|memcache|memcached）
   public static $cache_type = 'file';
   
   //key默认前缀
   private static $df_prefix = 'mc_df_';
   
   //默认缓存时间
   private static $cache_time = 7200;
   
   //当前类实例
   private static $instance = null;
   
   /**
    * 构造函数
    * @return void
    */
    public function __construct()
    {
        if( !$GLOBALS['config']['cache']['enable'] ) {
            return;
        }
        self::$df_prefix  = $GLOBALS['config']['cache']['df_prefix'];
        self::$cache_time = $GLOBALS['config']['cache']['cache_time'];
        self::$cache_type = $GLOBALS['config']['cache']['cache_type'];
        if( self::$cache_type == 'file' )
        {
            $this->mc_handle = cls_filecache::factory( $GLOBALS['config']['cache']['file_cachename'] );
        }
        else if( self::$cache_type == 'memcached' )
        {
            $this->mc_handle = new Memcached();
            $servers = array();
            foreach($GLOBALS['config']['cache']['memcache']['host'] as $k => $mcs) {
                $mc_hosts = parse_url ( $mcs );
                $servers[] = array($mc_hosts['host'], $mc_hosts['port']);
            }
            $this->mc_handle->addServers( $servers );
        }
        else
        {
            $this->mc_handle = new Memcache();
            $mc_hosts = parse_url ( $GLOBALS['config']['cache']['memcache']['host'][0] );
            $this->mc_handle->connect( $mc_hosts['host'], $mc_hosts['port'], $GLOBALS['config']['cache']['memcache']['time_out'] );
        }
    }
    
   /**
    * 为自己创建实例，以方便对主要方法进行静态调用
    */
    protected static function _check_instance()
    {
        if( !$GLOBALS['config']['cache']['enable'] ) {
            return false;
        }
        if( self::$instance == null ) {
            self::$instance = new cache();
        }
        return self::$instance;
    }
   
   /**
    * 获取key
    */
    protected static function _get_key($prefix, $key)
    {
        return base64_encode( cache::$df_prefix.'_'.$prefix.'_'.$key );
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
        return self::$instance->mc_handle->set($key, $value, 0, $cachetime);
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
    public static function free()
    {
        if( self::_check_instance()===false ) {
            return false;
        }
        if( self::$instance->cache_type != 'memcached' ) {
            self::$instance->mc_handle->close();
        }
    }
    
}
