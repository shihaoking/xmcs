<?php
/**
 * Lurd类通用数据列表
 *
 * 当指定属性 datas ，相当于foreach的功能
 * 没指定 datas 属性，必须与 lurd 类关连，使用模板前先用 tpl::assign('lurd', $lurd_class); 
 * 属性 item 为当前哈希数组名， key 为数据组第一维的key值
 * <{lurd_list item='v' key='key' }>
 *    <{$key}>:<{$v.f1}>--<{$v.f2}>...<br />
 * <{/lurd_list}>
 *
 */
function smarty_myblock_lurd_list($_params, &$compiler)
{
    if( empty($compiler->_tpl_vars['lurd']) && empty($_params['datas']) )
    {
        return array();
    }
    if( !empty($_params['datas']) )
    {
        return $_params['datas'];
    }
    else
    {
        return $compiler->_tpl_vars['lurd']->datas;
    }
}

/* vim: set expandtab: */

?>
 