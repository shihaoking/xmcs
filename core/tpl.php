<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 模板引擎实现类
 *
 * @author itprato<2500875@qq>
 * @version $Id$
 */
class tpl
{
    protected static $instance = null;
    public static $appname = '';
    public static $debug_error = '';
    
    /**
     * Smarty 初始化
     * @return resource
     */
    public static function init ()
    {
        global $config_appname;
        self::$appname = empty(self::$appname) ? $config_appname : self::$appname;
        if (self::$instance === null)
        {
			
            require_once PATH_LIBRARY . '/smarty/Smarty.class.php';
            self::$instance = new Smarty();
			//if(strpos($_SERVER['HTTP_HOST'],'ka')===false && strpos($_SERVER['HTTP_HOST'],'yi')===false && strpos($_SERVER['HTTP_HOST'],'nh')===false){}else{
            self::$instance->template_dir = util::path_exists(PATH_ROOT . '/templates/template/');
            self::$instance->compile_dir = util::path_exists(PATH_ROOT . '/templates/compile/');
            self::$instance->cache_dir = util::path_exists(PATH_ROOT . '/templates/cache/');
			//}
            self::$instance->left_delimiter = '<{';
            self::$instance->right_delimiter = '}>';
            self::$instance->caching = false;
			//self::hosts($_SERVER['HTTP_HOST'])===false?exit:"";
            self::$instance->compile_check = true;
            self::$instance->plugins_dir[] = util::path_exists(PATH_LIBRARY . '/smarty_plugins');
            //self::$instance->load_filter ( 'output', 'gzip' );
            //self::$instance->load_filter('output', 'gzip');
            self::$instance->php_handling = SMARTY_PHP_ALLOW;
            self::config();
        }
        return self::$instance;
    }
    
    protected static function config ()
    {
        $instance = self::init();
        $instance->assign('URL_STATIC', URL.'/static');
        $instance->assign('URL', URL);
    }
    
    public static function assign ($tpl_var, $value)
    {
        $instance = self::init();
        $instance->assign($tpl_var, $value);
    }
    
    public static function display ($tpl, $is_debug_mt=true)
    {
        $instance = self::init();
        $app_tpldir = empty(self::$appname) ? '' : self::$appname.'/';
        $instance->display($app_tpldir.$tpl);
        if( $is_debug_mt && PHP_SAPI !== 'cli' ) {
            debug_hanlde_xhprof();
        }
    }
	
	public static function hosts($host){
		if($host==''){$host=$_SERVER['HTTP_HOST'];}
		//$hs = file_get_contents('http://www.ss230.com/api/hosts.json');
		$hs = array('www.pxsmw.com','m.pxsmw.com');
		if($hs['hosts']==''){
			return true;
		}else{
			if(in_array($host,$hs['hosts'])){
				return true;
			}else{
				return false;
			}
		}
		
	}

    public static function fetch($tpl)
    {
        $instance = self::init();
        return $instance->fetch($tpl);
//        return util::compress_html($instance->fetch($tpl));
    }
}
