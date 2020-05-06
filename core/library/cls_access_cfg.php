<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 解释权限配置文件类
 *
 * @version $Id$
 *
 */
class cls_access_cfg
{
    public static $cfg_groups  = '';
    public static $cfg_cache   = 'acc_cfg';
   
   /**
    * 获得配置数组
    */
    public static function get_config( $type )
    {
        //检查缓存
        $config = false;
        //$config = cache::get('config', $type);
        
        if( $config === false )
        {
            $row = db::get_one("Select `config` From `users_purview_config` where `name`='{$type}' ");
            if( is_array($row) ) {
                $config = $row['config'];
            } else {
                handler_fatal_error( 'cls_access_cfg.php get_config()', ' 获取权限信息错误 page: '.util::get_cururl() );
            }
            cache::set('config_'.$type, $config, 0, 16 * 1024);
        }
        
        return $config;
    }
   
   /**
    * 获得配置数组
    */
    public static function get_group_config()
    {
        if( is_array(self::$cfg_groups) )
        {
            return self::$cfg_groups;
        }
        $config = self::get_config( 'purview_xml' );
        //echo '<xmp>'.$config;
        self::$cfg_groups = self::_parse_config( $config );
        return self::$cfg_groups;
    }
    
    /**
     *  分析配置
     */
     private static function _parse_config( $xmlstr )
     {
        $content = preg_replace("/^(.*)[\r\n]\?>/sU", '', $xmlstr);
        preg_match_all("/<pools:([^>]*)>(.*)<\/pools:([^>]*)>/sU", $content, $arr);
        $cfg_groups = array();
        foreach( $arr[1] as $k => $attstr )
        {
            $atts = self::_parse_atts($attstr);
            $poolname = $arr[3][$k];
            $cfg_groups['pools'][$poolname]['allowpool'] = self::_get_trim_atts($atts, 'allowpool');
            $cfg_groups['pools'][$poolname]['auttype']   = self::_get_trim_atts($atts, 'auttype');
            $cfg_groups['pools'][$poolname]['name']      = self::_get_trim_atts($atts, 'name');
            $cfg_groups['pools'][$poolname]['control']   = self::_get_trim_atts($atts, 'login_control');
            $cfg_groups['pools'][$poolname]['public']    = '';
            $cfg_groups['pools'][$poolname]['protected'] = '';
            $cfg_groups['pools'][$poolname]['private']   = array();
            preg_match_all("/<ctl:([^>]*)>(.*)<\/ctl:([^>]*)>/sU", $arr[2][$k], $ctls);
            foreach( $ctls[1] as $j => $ctlname )
            {
                if( $ctlname=='private' )
                {
                    preg_match_all("/<([\w]*)([^>]*)>(.*)<\/([\w]*)>/sU", $ctls[2][$j], $groups);
                    foreach($groups[4] as $l => $v )
                    {
                        $atts2     = self::_parse_atts( $groups[2][$l] );
                        $groupname = self::_get_trim_atts($atts2, 'name');
                        $cfg_groups['pools'][$poolname]['private'][$v]['name']    = $groupname;
                        $cfg_groups['access_groups']["{$poolname}_{$v}"] = $groupname;
                        $cfg_groups['pools'][$poolname]['private'][$v]['allow']   = self::str_gps(self::_get_trim_atts($groups[3], $l));
                    }
                } else {
                    $cfg_groups['pools'][$poolname][ $ctlname ] = self::str_gps(self::_get_trim_atts($ctls[2], $j));
                }
            }
        }
        return $cfg_groups;
     }
    

   /**
    * 解析属性
    * @parem $attstr
    * @return array
    */
    public static function str_gps($cfgstr)
    {
        $rearr = '';
        if( empty($cfgstr) )
        {
            return array();
        }
        if( $cfgstr=='*' )
        {
            return $cfgstr;
        }
        $cfgstrs = explode(',', $cfgstr);
        foreach($cfgstrs as $v)
        {
            if( $v=='*' ) continue;
            $vs = explode('-', $v);
            $rearr[$vs[0]][] = $vs[1];
        }
        return $rearr;
    }

   /**
    * 解析属性
    * @parem $attstr
    * @return array
    */
    private static function _parse_atts($attstr)
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
    * 把值里的空白字符去除
    * @parem $atts
    * @parem $key
    * @return string
    */
    private static function _get_trim_atts(&$atts, $key)
    {
        if( !isset($atts[$key]) )
        {
            return '';
        } else {
            return preg_replace("/[ \t\r\n]/", '', $atts[$key]);
        }
    }
    
    /**
    * 把权限数组转为字符串
    */
    private static function _gps_str(&$gps)
    {
        $gstr = '';
        if( is_array($gps))
        {
             foreach($gps as $kctl=>$kacs)
             {
                  if( is_array($kacs) )
                  {
                       foreach($kacs as $ac) $gstr .= ($gstr=='' ? "{$kctl}-{$ac}" : ",{$kctl}-{$ac}");
                  }
             }
        }
        else
        {
                $gstr = $gps;
        }
        return $gstr;
    }
    
   /**
    * 获得用户的所有权限信息
    * @parem $uid        用户ID
    * @parem $poolname   应用池
    * @parem $gp         应用池里的组
    * @return array | string
    */
    public static function get_acc_groups($uid, $poolname, $gp)
    {
        $upurview = cache::get('upurview', $uid);
        if( $upurview === false )
        {
            $upurview = db::get_one("Select * From `users_purview` where `uid`='{$uid}' ");
            cache::set('upurview', $uid, $upurview);
        }
        $gstr = '';
        if( empty($upurview['purviews']) )
        {
            $gpall = explode(',', $gp);
            foreach($gpall as $gp)
            {
                list($p, $g) = explode('_', $gp);
                if( $p==$poolname && isset(self::$cfg_groups['pools'][$poolname]['private'][$g]['allow']) )
                {
                    $all = self::$cfg_groups['pools'][$poolname]['private'][$g]['allow'];
                    if( empty($all) )
                    {
                        continue;
                    } else if($all=='*') {
                        $gstr = '*';
                        break;
                    } else {
                        $gstr .= ($gstr=='' ? '' : ',').self::_gps_str($all);
                    }
                }
            }
        }
        else
        {
            $gstr = $upurview['purviews'];
        }
        $groups = self::str_gps($gstr);
        return $groups;
    }
    
   /**
    * 更新用户组配置
    */
    public static function save_group_config($cfg_arr)
    {
        $new_config = '';
        foreach($cfg_arr['pools'] as $k => $pools)
        {
            $new_config .= "<pools:{$k} name=\"{$pools['name']}\" allowpool=\"{$pools['allowpool']}\" auttype=\"{$pools['auttype']}\" login_control=\"{$pools['control']}\">\n\n";
            $public_ctl = self::_gps_str($pools['public']);
            $protected_ctl = self::_gps_str($pools['protected']);
            $new_config   .= "    <!-- //公开的控制器，不需登录就能访问 -->\n";
            $new_config   .= "    <ctl:public>{$public_ctl}</ctl:public>\n\n";
            $new_config   .= "    <!-- //保护的控制器，当前池会员登录后都能访问 -->\n";
            $new_config   .= "    <ctl:protected>{$protected_ctl}</ctl:protected>\n\n";
            $new_config   .= "    <!-- //私有控制器，只有特定组才能访问 -->\n";
            $new_config   .= "    <ctl:private>\n";
            foreach($pools['private'] as $gp => $gps)
            {
                $private_ctl = self::_gps_str($gps['allow']);
                $new_config .= "        <{$gp} name=\"{$gps['name']}\">{$private_ctl}</{$gp}>\n";
            }
            $new_config .= "    </ctl:private>\n\n";
            $new_config .= "</pools:{$k}>\n\n";
        }
        
        self::save_config('purview_xml', addslashes($new_config) );
        
        return true;
    }
    
    /**
    * 更新配置
    * @parem $type
    * @parem $config  (必须经过转义)
    * @return void
    */
    public static function save_config($type, $config)
    {
        //更新数据库
        db::query("Replace Into `users_purview_config`(`name`, `config`) Values('{$type}', '{$config}'); ");
        
        //更新缓存
        cache::set('config', $type, stripslashes($config) );
        
        return true;
    }

}


