<?php
/**
 * 
 *
 *
 */
function smarty_modifier_explode($source,$key)
{
   $temp = explode("::",$source);
   return empty($temp[$key]) ? '' : $temp[$key];
}
?>
