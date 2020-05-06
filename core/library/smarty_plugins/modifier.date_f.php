<?php
function smarty_modifier_date_f( $t, $f )
{
    return date($f, $t);
}
