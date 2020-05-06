<?php
/**
 * 对专用变量进行值还原
 * @package Smarty
 * @subpackage plugins
 * <{lurd do=* var=* }>
 */
function smarty_function_frame_union($params, &$smarty)
{
    if( empty($params['do']) || empty($params['var']) )
    {
        return;
    }
    //还原应用池名称
    if($params['do']=='pools')
    {
        $arr = cls_access::$cfg_groups['pools'];
        return isset($arr[$params['var']]['name']) ? $arr[$params['var']]['name'] : '';
    }
    //还原应用池名称
    else if($params['do']=='groups')
    {
        $arr = cls_access::$cfg_groups['pools'];
        //list($p, $g) = explode('_', $params['var']);
        $strings = explode(',', $params['var']);
        $okstr = '';
        foreach($strings as $str)
        {
            $str = trim($str);
            list($p, $g) = explode('_', $str);
            $str = isset($arr[$p]['private'][$g]) ? $arr[$p]['private'][$g]['name'] : $p.'_'.$g;
            $okstr .= ($okstr=='' ? $str : ','.$str);
        }
        return $okstr;
    }
    //从数组取keyvalue
    else
    {
        return isset($params['from'][$params['var']]) ? $params['from'][$params['var']] : '';
    }
}

?>
 