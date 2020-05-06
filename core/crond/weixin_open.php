<?php

/**
 * sql
 */
header('Content-Type:text/html;charset=utf-8');
ini_set('display_errors',1);
$time_start = microtime(true);
// require './init.php';
ini_set("memory_limit","6000M");
//判断日志路径状况
$path_log = PATH_ROOT . '/data/log/';
if( !is_dir($path_log) )
{
    if(!@mkdir( $path_log, 0777, true ))
    {
        exit(iconv('utf-8','gbk',"无法创建日志目录/data/log/，请检查是否具有相应目录的写权限"));
    }
}

if( !is_writable( $path_log ) )
{
    exit(iconv('utf-8','gbk',"日志目录/data/log/没有写权限，请为此目录加上写权限"));
}

_wlog(date( 'Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ) . "\t ".date('Y-m-d H:i:s')." \t 开始数据分析\r\n");

############################ 数据处理 start ##################################

$url = 'http://mp.weixin.qq.com/profile?src=3&timestamp=1478051740&ver=1&signature=rncewh4qziqxrlth3*dIx*yS2Ie6LNsmBtH9Frx763YHwQOwiOu9I8ztuI3M0D01GJZrfcnnmnuQsXcCc49E6Q==';

file_get_contents($url);


print_r($url);


############################ 数据处理 end ####################################


$total_time = microtime(true) - $time_start;
$hours = (int)($total_time/60/60);
$minutes = (int)($total_time/60)-$hours*60;
$seconds = (int)$total_time-$hours*60*60-$minutes*60;
echo "Done in $total_time seconds". "=>".$hours.':'.$minutes.":".$seconds."\n";

_wlog(date( 'Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ) . "\t ".date('Y-m-d H:i:s')." \t 完成数据分析，耗时 $total_time s\r\n");



/**
 * 写日志函数
 * @param $msg 信息
 * @param bool $isEcho 是否输出
 * @param bool $isExit 是否退出
 */
function _wlog($msg,$isEcho=true,$isExit=false)
{
    global $path_log,$filename,$log_file_name;
    if(!$msg)return false;
    if($isEcho)echo iconv('utf-8','gbk',$msg)."\r\n";
    //@file_put_contents ( $path_log . $filename, $msg."\r\n", FILE_APPEND );
    error_log($msg."\r\n",3,PATH_ROOT . '/data/log/weixin_open_'.date('Ymd').'.log');
    if($isExit)exit();
}


?>
