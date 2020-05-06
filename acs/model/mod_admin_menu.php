<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 管理菜单读取
 *
 * @version $Id$
 */
class mod_admin_menu
{
    public static $menu_file = 'inc_admin_menu.php';

   /**
    * 分析菜单，返回特定格式的js
    * @return string
    */
    public static function parse_menu()
    {
        self::$menu_file = PATH_CONFIG.'/'.self::$menu_file;
        $menu_config = file_get_contents(self::$menu_file);
        $menu = '';
        preg_match_all("#<menu([^>]*)>(.*)</menu>#sU", $menu_config, $arr);
        $j = 0;
        foreach($arr[1] as $k=>$v)
        {
            $mi = ++$j;
            $atts = self::parse_atts($v);
            $menu_name = self::get_att($atts, 'name');
            $topmm = "'{$mi}': {Text:'{$menu_name}'},\n";
            if( trim($arr[2][$k]) == '') continue;
            preg_match_all("#<node([^>]*)>(.*)</node>#sU", $arr[2][$k], $nodes);
            $sonmm = '';
            foreach($nodes[1] as $n=>$n_v)
            {
                $ni = ++$j;
                $df = '';
                $atts = self::parse_atts($n_v);
                $n_name  = self::get_att($atts, 'name');
                $n_url   = self::get_att($atts, 'url');
                $n_default = self::get_att($atts, 'default');
                if( $n_default== 1 ) $n_default = ',Default:true';
                if( $n_url != '' ) $n_url = ",url:'{$n_url}'";
                $sonmm_tmp = "   '{$ni}':{Text:'{$n_name}',Parent:'{$mi}'{$n_url}{$n_default}},\n";
                if( trim($nodes[2][$n]) == '' || $n_url != '' ) continue;
                preg_match_all("#<item([^>]*)/>#sU", $nodes[2][$n], $items);
                $sonmm2 = '';
                foreach($items[1] as $i=>$i_v)
                {
                    $ii = ++$j;
                    $df = '';
                    $atts = self::parse_atts($i_v);
                    $i_name = self::get_att($atts, 'name');
                    $i_ct = self::get_att($atts, 'ct');
                    $i_ac = self::get_att($atts, 'ac');
                    if( !self::has_purview($i_ct, $i_ac) )
                    {
                        continue;
                    }
                    $i_url  = self::get_att($atts, 'url');
                    $default = self::get_att($atts, 'default');
                    if( $default==1 ) $default = ',Default:true';
                    if( $i_url != '' ) $i_url = ",url:'{$i_url}'";
                    $sonmm2 .= "      '{$ii}':{Text:'{$i_name}',Parent:'{$ni}'{$i_url}{$default}},\n";
                }
                if( $sonmm2!='' )
                {
                    $sonmm .= $sonmm_tmp.$sonmm2;
                }
            }
            if( $sonmm != '')
            {
                $menu .= $topmm.$sonmm;
            }
        }
        return $menu;
    }
    
   /**
    * 检测用户是否有指定权限
    * @parem string $ct
    * @parem string $ac
    * @return bool
    */
    protected static function has_purview($ct, $ac)
    {
        $acc_ctl = cls_access::get_instance();
        //***此选项仅针对915
        if( !isset($GLOBALS['_is_edit']) )
        {
            if( preg_match('/admin_(edit|admin)/', $acc_ctl->fields['groups']) )
            {
                $GLOBALS['_is_edit'] = true;
            } else {
                $GLOBALS['_is_edit'] = false;
            }
        }
        if( $ct=='cms' && $ac=='cms' )
        {
            return $GLOBALS['_is_edit'];
        }
        //***
        $rs = $acc_ctl->test_purview($ct, $ac, 2);
        if( $rs==1 )
        {
            return true;
        } else {
            return false;
        }
    }
    
   /**
    * 分析属性
    * @parem string $attstr
    * @return array
    */
    protected static function parse_atts($attstr)
    {
        $patts = '';
        preg_match_all("/([0-9a-z_-]*)[\t ]{0,}=[\t ]{0,}[\"']([^>\"']*)[\"']/isU", $attstr, $patts);
        if( !isset($patts[1]) )
        {
           return false;
        }
        $atts = array();
        foreach($patts[1] as $ak=>$attname)
        {
           $atts[trim($attname)] = trim($patts[2][$ak]);
        }
        return $atts;
    }
    
   /**
    * 从属性数组中读取一个元素
    * @parem $atts
    * @parem $key
    * @parem $df = ''
    * @return string
    */
    protected static function get_att(&$atts, $key, $df='')
    {
        return isset($atts[$key]) ? trim($atts[$key]) : $df;
    }
}
