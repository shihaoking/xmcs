<?php
/**
 * 根据用户的组值转为真正的组名
 *
 * @param  max
 * @return string
 */
function smarty_modifier_groupname($string)
{
    $arr = cls_access::$cfg_groups['pools'];
    $strings = explode(',', $string);
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
?>
