<?php
//header('Content-Type:text/html;charset=utf-8');
ini_set('display_errors',0);
$time_start = microtime(true);
ini_set("memory_limit","600M");
//判断日志路径状况
$path_log = PATH_ROOT . '/data/log/';
if( !is_dir($path_log) )
{
    if(!@mkdir( $path_log, 0777, true ))
    {
        exit("无法创建日志目录/data/log/，请检查是否具有相应目录的写权限");
    }
}

if( !is_writable( $path_log ) )
{
    exit("日志目录/data/log/没有写权限，请为此目录加上写权限");
}
$logfile = 'sitemap_'.date( 'Ymd', $_SERVER['REQUEST_TIME'] ) . '.log';
$msg = date( 'Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ) . "\t ".date('Y-m-d H:i:s')." \t 开始\r\n";
@file_put_contents ( $path_log . $logfile, $msg, FILE_APPEND );
$date = date('Y-m-d');
$strIndexXml = '';
$arrIndexFiles = array();

/*for($i=1;$i<5;$i++){
    $strXml = '';
    if($strXml){
        file_put_contents(PATH_ROOT.'/weather2/sitemap_'.$i.'.xml', str_ireplace('{date}',$date,$strXml));
        $strXml = '';
    }
}*/
// category 0 default 1 gif 2 吐槽 3 视频 4笑话 5 图片
//type 0 未知  1 图片 2 视频 3 文字

//开始生成
$arrCategorys = array('1'=>'gif','2'=>'tucao','3'=>'video','4'=>'xiaohua','5'=>'tupian');
//1、gif
$arrDatas = array();
$arrDatas = db::fetch_all(db::query('select id,category from gaoxiao_data where `status`=1 and category=1 order by id'));
$intXmlNum = 1;

$intItem = 1;
if($arrDatas){
	$strXmlFileName = PATH_ROOT.'/sitemap_'.$intXmlNum.'.xml';
	@unlink($strXmlFileName);
	file_put_contents($strXmlFileName, '<?xml version="1.0" encoding="utf-8"?>'."\n".'<urlset>'."\n",FILE_APPEND);
	foreach($arrDatas as $arritem){
		file_put_contents($strXmlFileName, '<url>'."\n".'<loc>'.URL.'/'.$arrCategorys[$arritem['category']].'/'.$arritem['id'].'.html</loc>'."\n".'<lastmod>'.$date.'</lastmod>'."\n".'<changefreq>daily</changefreq>'."\n".'</url>'."\n",FILE_APPEND);
		$intItem++;
	}
	file_put_contents($strXmlFileName, '</urlset>'."\n",FILE_APPEND);
}
@file_put_contents ( $path_log . $logfile, 'gif共生成'.$intItem.'条xml'."\n", FILE_APPEND );

//2、tucao
$arrDatas = array();
$arrDatas = db::fetch_all(db::query('select id,category from gaoxiao_data where `status`=1 and category=2 order by id'));
if($arrDatas){
	$intXmlNum++;
	$intXmlIndex = $intXmlNum;
	$intItem = 1;
	$strXmlFileName = PATH_ROOT.'/sitemap_'.$intXmlIndex.'.xml';
	@unlink($strXmlFileName);
	file_put_contents($strXmlFileName, '<?xml version="1.0" encoding="utf-8"?>'."\n".'<urlset>'."\n",FILE_APPEND);
    foreach($arrDatas as $arritem){
        file_put_contents($strXmlFileName, '<url>'."\n".'<loc>'.URL.'/'.$arrCategorys[$arritem['category']].'/'.$arritem['id'].'.html</loc>'."\n".'<lastmod>'.$date.'</lastmod>'."\n".'<changefreq>daily</changefreq>'."\n".'</url>'."\n",FILE_APPEND);
        $intItem++;
    }
	file_put_contents($strXmlFileName, '</urlset>'."\n",FILE_APPEND);
}
@file_put_contents ( $path_log . $logfile, 'tucao共生成'.$intItem.'条xml'."\n", FILE_APPEND );

//3、video
$arrDatas = array();
$arrDatas = db::fetch_all(db::query('select id,category from gaoxiao_data where `status`=1 and category=3 order by id'));
if($arrDatas){
	$intItem = 1;
	$intXmlNum++;
	$intXmlIndex = $intXmlNum;
	$strXmlFileName = PATH_ROOT.'/sitemap_'.$intXmlIndex.'.xml';
	@unlink($strXmlFileName);
	file_put_contents($strXmlFileName, '<?xml version="1.0" encoding="utf-8"?>'."\n".'<urlset>'."\n",FILE_APPEND);
    foreach($arrDatas as $arritem){
        file_put_contents($strXmlFileName, '<url>'."\n".'<loc>'.URL.'/'.$arrCategorys[$arritem['category']].'/'.$arritem['id'].'.html</loc>'."\n".'<lastmod>'.$date.'</lastmod>'."\n".'<changefreq>daily</changefreq>'."\n".'</url>'."\n",FILE_APPEND);
        $intItem++;
    }
	file_put_contents($strXmlFileName, '</urlset>'."\n",FILE_APPEND);
}
@file_put_contents ( $path_log . $logfile, 'video共生成'.$intItem.'条xml'."\n", FILE_APPEND );

//4、xiaohua
$arrDatas = array();
$arrDatas = db::fetch_all(db::query('select id,category from gaoxiao_data where `status`=1 and category=4 order by id'));
if($arrDatas){
    $intItem = 1;
    $intXmlNum++;
    $intXmlIndex = $intXmlNum;
    $strXmlFileName = PATH_ROOT.'/sitemap_'.$intXmlIndex.'.xml';
    @unlink($strXmlFileName);
    file_put_contents($strXmlFileName, '<?xml version="1.0" encoding="utf-8"?>'."\n".'<urlset>'."\n",FILE_APPEND);
    foreach($arrDatas as $arritem){
        file_put_contents($strXmlFileName, '<url>'."\n".'<loc>'.URL.'/'.$arrCategorys[$arritem['category']].'/'.$arritem['id'].'.html</loc>'."\n".'<lastmod>'.$date.'</lastmod>'."\n".'<changefreq>daily</changefreq>'."\n".'</url>'."\n",FILE_APPEND);
        $intItem++;
    }
    file_put_contents($strXmlFileName, '</urlset>'."\n",FILE_APPEND);
}
@file_put_contents ( $path_log . $logfile, 'xiaohua共生成'.$intItem.'条xml'."\n", FILE_APPEND );

//5、tupian
$arrDatas = array();
$arrDatas = db::fetch_all(db::query('select id,category from gaoxiao_data where `status`=1 and category=5 order by id'));
if($arrDatas){
    $intItem = 1;
    $intXmlNum++;
    $intXmlIndex = $intXmlNum;
    $strXmlFileName = PATH_ROOT.'/sitemap_'.$intXmlIndex.'.xml';
    @unlink($strXmlFileName);
    file_put_contents($strXmlFileName, '<?xml version="1.0" encoding="utf-8"?>'."\n".'<urlset>'."\n",FILE_APPEND);
    foreach($arrDatas as $arritem){
        file_put_contents($strXmlFileName, '<url>'."\n".'<loc>'.URL.'/'.$arrCategorys[$arritem['category']].'/'.$arritem['id'].'.html</loc>'."\n".'<lastmod>'.$date.'</lastmod>'."\n".'<changefreq>daily</changefreq>'."\n".'</url>'."\n",FILE_APPEND);
        $intItem++;
    }
    file_put_contents($strXmlFileName, '</urlset>'."\n",FILE_APPEND);
}
@file_put_contents ( $path_log . $logfile, 'tupian共生成'.$intItem.'条xml'."\n", FILE_APPEND );

//nav
//$arrDatas = array('','gif','new','tupian','video','xiaohua','tucao','website');
$arrDatas = array('','gif','hot','tupian','video','xiaohua','tucao','website');
if($arrDatas){
    $intItem = 1;
    $intXmlNum++;
    $intXmlIndex = $intXmlNum;
    $strXmlFileName = PATH_ROOT.'/sitemap_'.$intXmlIndex.'.xml';
    @unlink($strXmlFileName);
    file_put_contents($strXmlFileName, '<?xml version="1.0" encoding="utf-8"?>'."\n".'<urlset>'."\n",FILE_APPEND);
    foreach($arrDatas as $arritem){
        if($arritem)$arritem .= '.html';
        file_put_contents($strXmlFileName, '<url>'."\n".'<loc>'.URL.'/'.$arritem.'</loc>'."\n".'<lastmod>'.$date.'</lastmod>'."\n".'<changefreq>daily</changefreq>'."\n".'</url>'."\n",FILE_APPEND);
        $intItem++;
    }
    file_put_contents($strXmlFileName, '</urlset>'."\n",FILE_APPEND);
}
@file_put_contents ( $path_log . $logfile, 'nav共生成'.$intItem.'条xml'."\n", FILE_APPEND );

/* --------------------------  建立索引------------------------------------*/
$filename = PATH_ROOT.'/sitemap.xml';
$creat  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$creat .= '<sitemapindex xmlns="http://www.google.com/schemas/sitemap/0.84">'."\n";
for($i=1;$i<=$intXmlNum;$i++){
	$creat .= "<sitemap>\n";
	$creat .= "<loc>".URL."/sitemap_".$i.".xml</loc>\n";
	$creat .= "<lastmod>$date</lastmod>\n";
	$creat .= "</sitemap>\n";
}



$creat .= "</sitemapindex>\n";
file_put_contents($filename, $creat);
/* --------------------------  结束------------------------------------*/
echo $msg = "...create sitemap completed!!!\n";
@file_put_contents ( $path_log . $logfile, $msg, FILE_APPEND );

$total_time = microtime(true) - $time_start;
$hours = (int)($total_time/60/60);
$minutes = (int)($total_time/60)-$hours*60;
$seconds = (int)$total_time-$hours*60*60-$minutes*60;
echo $msg = "Done in $total_time seconds". "=>".$hours.':'.$minutes.":".$seconds."\n";
$msg = date( 'Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ) . "\t ".date('Y-m-d H:i:s')." \t 完成数据分析，耗时 $total_time s\r\n";
@file_put_contents ( $path_log . $logfile, $msg, FILE_APPEND );


