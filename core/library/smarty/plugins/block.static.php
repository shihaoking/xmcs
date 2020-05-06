<?php
function smarty_block_static ($params, $content, &$smarty, &$repeat)
{
    tpl::assign('STATIC', $content);
    return '';
}
?>