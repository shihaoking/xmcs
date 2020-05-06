<?php
/**
 * 对指定变量执行某些Lurd类里的格式化操作
 * @package Smarty
 * @subpackage plugins
 * <{lurd do="make_key" format=field_list var=field_array }>
 * <{lurd do="format_date" format="Y-m-d" var="1261360460" }>  <{lurd do="format_date" }> 无参数显示date( 'Y-m-d H:i:s' )
 * <{lurd do="format_float" format="%0.4f" var="92.4325544" }>
 */
function smarty_function_lurd($params, &$smarty)
{
    if (!isset($params['do']))
    {
        $smarty->trigger_error("lurd: missing 'do' parameter");
        return;
    }
    if($params['do'] == '')
    {
        return;
    }
    if($params['do']=='format_date' || $params['do']=='format_float')
    {
        if ( empty($params['var']) )
        {
            $params['var'] = 0;
        }
    }
    //格式式日期时间
    if($params['do']=='format_date') 
    {    
        if( empty($params['format']) )
            {
                $params['format'] = 'Y-m-d H:i:s';
            }
            if( empty($params['type']) )
            {
                if( empty($params['var']) ) $params['var'] = time();
                return date( $params['format'], $params['var'] );
            }
            else
            {
                return $params['value'];
            }
    }
    //格式化浮点数
    if($params['do']=='format_float') 
    {    
        if( empty($params['format']) )
            {
               $params['format'] = '%0.4f';
            }
            return sprintf($params['format'], $params['var']);
    }
    //合并字段为md5数组
    if($params['do']=='make_key') 
    {
        if( empty( $params['format'] ) || empty($params['var']) )
        {
            $smarty->trigger_error("lurd: make_key missing 'format' Or 'var'  parameter");
            return;
        }
        $str = '';
          $keys = explode('', $params['format']);
          foreach($keys as $k)
          {
             $str .= $params['var'][$k];
          }
          return md5($str);
    }
    
    return 'unknow!';
    
}

?>
 