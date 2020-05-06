<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_cn_truncate($string, $length = 80, $etc = '...', $count_words = true)
{
    mb_internal_encoding("UTF-8");
    if ($length == 0)return '';
    if ( strlen( $string ) <= $length ) return $string;
    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info); 
    if( $count_words ){
        $j = 0;
        for($i=0; $i<count($info[0]); $i++) {
            $wordscut .= $info[0][$i];
            if( ord( $info[0][$i] ) >=128 ){
                $j = $j+2;
            }else{
                $j = $j + 1;
            }
            if ($j >= $length ) {
                return $wordscut.$etc;
            }
        }
        return join('', $info[0]);
    }
    return join("",array_slice( $info[0],0,$length ) ).$etc;

}

/* vim: set expandtab: */

?>
