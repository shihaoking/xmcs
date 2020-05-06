<?php
//星座屋-星座爱情
ini_set('max_execution_time','0');
header('Content-Type:text/html;charset=utf-8');
ini_set('display_errors',1);
$tid = '442';
$k=0;
$path_log = PATH_ROOT . '/data/log/'.date('Ym').'/jiemeng/';
$time_start = microtime(true);
if( !is_dir($path_log) )
{
    if(!@mkdir( $path_log, 0777, true ))
    {
        exit("无法创建日志目录/data/log/，请检查是否具有相应目录的写权限");
    }
}

_wlog(date( 'Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ) . "\t ".date('Y-m-d H:i:s')." \t 开始数据分析\r\n");



$listurl = 'http://www.zgjm.org/yunfujiemeng/';

_wlog("开始分析数据".$listurl."\r\n");
$files =  file_get_contents($listurl);




preg_match_all('/<div id=\"list\">([\w\W]*?)<\/ul>/is',$files,$list_arr);

preg_match_all('/<a href="(.*?)"/is',$list_arr[1][0],$url_arr);
$url_arr = $url_arr[1];



for($i=0;$i<count($url_arr);$i++){
	
		if(false === stripos($url_arr[$i], 'http')){
			$url =	'http://www.zgjm.org'.$url_arr[$i];
		}else{
			$url = 	$url_arr[$i];
		}
		
		$file = file_get_contents($url);
		
		
		
		

		preg_match_all('/<div id=\"entrybody\">([\W\w]*?)<\/div>.*[\n]<div align=\"center\" class=\"pages\">/is',$file,$nnc);
		
		preg_match_all('/<h1>(.*?)<\/h1>/is',$file,$title);
		
		$title = $title[1][0];
		$contents = $nnc[1][0];
		
		if($title){
			$cls = new mod_cai();
			$cc = $cls->replace($contents,'http://www.zgjm.org');
			
			
			
			$img = $cc['img'];
			$shorttxt = $cc['shorttxt'];
			$content = $cc['content'];
			
			$sql = 'select `id` from `zgjm_data` where `title`="'.$title.'"';
			$data = db::queryone($sql);
			
			
			
			if($data['id']==''){
				$sql="INSERT INTO `zgjm_data` (`title`, `content`,`img`, `tid`,`shorttxt`) VALUES ('".$title."', '".$content."','".$img."', '".$tid."','".$shorttxt."')";
				
				if(db::query($sql)){
					_wlog("采集成功\r\n");
				}else{
					//_wlog($title."存入失败\r\n");
				}
			}else{
				_wlog($title."cunzai\r\n");
			}
			
		}else{
			_wlog("空标题\r\n");
		}
	
}




$total_time = microtime(true) - $time_start;
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
    if($isEcho)echo iconv('gbk','utf-8',$msg)."\r\n";
    error_log($msg."\r\n",3,$path_log . 'jiemeng.log');
    //if($isExit)exit();
}


?>
