<?php
//美国神婆-生肖属相
ini_set('max_execution_time','0');
header('Content-Type:text/html;charset=utf-8');
ini_set('display_errors',1);
$tid = '348';
$path_log = PATH_ROOT . '/data/log/'.date('Ym').'/meiguoshenpo/';
$time_start = microtime(true);
if( !is_dir($path_log) )
{
    if(!@mkdir( $path_log, 0777, true ))
    {
        exit("无法创建日志目录/data/log/，请检查是否具有相应目录的写权限");
    }
}

$category_array = array(0=>'八字百科',1=>'八字百科');
$cath_url = array('http://www.meiguoshenpo.com/xiangxue/mxseg/','http://www.meiguoshenpo.com/xiangxue/jiankang/');

_wlog(date( 'Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ) . "\t ".date('Y-m-d H:i:s')." \t 开始数据分析\r\n");

foreach($category_array as $k=>$v){
$urlk = $k;

$listurl = $cath_url[$urlk];

_wlog("开始分析数据".$listurl."\r\n");
$files =  file_get_contents($listurl);



preg_match_all('/<div class=\"list_item\">([\w\W]*?)<\/div>/is',$files,$list_arr);

$url_arr = $list_arr[1];



for($i=0;$i<count($url_arr);$i++){
	
		preg_match_all('/<h4><a href=\"(.*?)\">(.*?)<\/a><\/h4>/is',$url_arr[$i],$value);
		preg_match_all('/class=\"list_img\"><img src=\"(.*?)\"/is',$url_arr[$i],$thumg);
		
		
		
		
		$img = $thumg[1][0];
		$url = $value[1][0];
		$title = $value[2][0];
	
		if(false === stripos($url, 'http')){
			$url =	'http://www.meiguoshenpo.com'.$url;
		}else{
			$url = 	$url;
		}
		
		$file = file_get_contents($url);
		
		preg_match_all('/<div class=\"show_cnt\">([\W\w]*?)<\/div>[\n]<\/div>[\n]<div class=\"info_580_90 mt_20 mb_20\">/is',$file,$nnc);
		$cc = $nnc[1][0];
		
		if($title){
			$cls = new mod_cai();
			
			$cc = $cls->replace($cc,'http://www.meiguoshenpo.com');
			
			$img = $cc['img'];
			$shorttxt = $cc['shorttxt'];
			$content = $cc['content'];
			
			$sql = 'select `id` from `news_data` where `title`="'.$title.'"';
			$data = db::queryone($sql);
			
			if($data['id']==''){
				$sql="INSERT INTO `news_data` (`title`, `content`,`img`, `tid`,`shorttxt`,`category`,`contentKeyword`) VALUES ('".$title."', '".$content."','".$img."', '".$tid."','".$shorttxt."','0','".$v."')";
				if($content==''){
					_wlog("空内容\r\n");
				}else{
					if(db::query($sql)){
						_wlog("采集成功\r\n");
					}else{
						//_wlog($title."存入失败\r\n");
					}
				}
			}else{
				_wlog($title."cunzai\r\n");
			}
			
		}else{
			_wlog("空标题\r\n");
		}
	
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
    error_log($msg."\r\n",3,$path_log . 'shenpo_shengxiao.log');
    //if($isExit)exit();
	//@file_put_contents ( $path_log . $filename, $msg, FILE_APPEND );
}


?>
