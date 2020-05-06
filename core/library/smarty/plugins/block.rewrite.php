<?php
/**
 * URL Rewrite
 * @author skey <cookphp@gmail>
 * @version 1.0
 */
function smarty_block_rewrite($params, $content, &$smarty)
{
    return rewrite($content);
}
?>
