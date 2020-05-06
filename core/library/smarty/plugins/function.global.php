<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {counter} function plugin
 *
 * Type:     function<br>
 * Name:     global<br>
 * Purpose:  print out a counter value
 * @param
 * <code>
 * {global name="config.url" sp="."}
 * //echo $GLOBAL['config']['url']
 * </code>
 * @author Monte Ohrt <monte at ohrt dot com>
 * @link http://smarty.php.net/manual/en/language.function.counter.php {counter}
 *       (Smarty online manual)
 * @param array parameters
 * @param Smarty
 * @return string|null
 */
function smarty_function_global($params, &$smarty)
{
    $name = isset($params['name']) ? trim($params['name']) : '';
    if (empty($name))
    {
        return '';
    }

    //分隔符
    $sp = isset($params['sp']) ? trim($params['sp']) : '.';
    $name = explode($sp, $name);
    $len = count($name);

    $return = $GLOBALS;
    for ($i=0; $i<$len; $i++)
    {
        if(!isset($return[$name[$i]]))
        {
            return '';
        }
        $return = $return[$name[$i]];
    }

    echo $return;


    //return $return;
}

/* vim: set expandtab: */

?>
