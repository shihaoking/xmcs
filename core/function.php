<?php

function isMobileSystem() { 
    $agent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/ipad/i', $agent) || preg_match('/iphone\s*os/i', $agent)) {
        return true;
    }
    return false;
}
function isMobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}

         
/**
 * 友好的时间显示
 * @param int    $sTime 待显示的时间
 * @param string $type  类型. normal | mohu | full | ymd | other
 * @return string
 */
 function friendlyDate($sTime,$type = 'normal') {
    if (!$sTime)  return '';
    //sTime=源时间，cTime=当前时间，dTime=时间差
    $cTime      =   time();
    $dTime      =   $cTime - $sTime;
    $dDay       =   intval(date("z",$cTime)) - intval(date("z",$sTime));
    //$dDay     =   intval($dTime/3600/24);
    $dYear      =   intval(date("Y",$cTime)) - intval(date("Y",$sTime));
    //normal：n秒前，n分钟前，n小时前，日期
    if($type=='normal'){
        if( $dTime < 60 ){
            if($dTime < 10){
                return '刚刚';    //by yangjs
            }else{
                return intval(floor($dTime / 10) * 10)."秒前";
            }
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        //今天的数据.年份相同.日期相同.
        }elseif( $dYear==0 && $dDay == 0  ){
            //return intval($dTime/3600)."小时前";
            return '今天'.date('H:i',$sTime);
        }elseif($dYear==0){
            return date("m月d日 H:i",$sTime);
        }else{
            return date("Y-m-d H:i",$sTime);
        }
    }elseif($type=='mohu'){
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif( $dDay > 0 && $dDay<=7 ){
            return intval($dDay)."天前";
        }elseif( $dDay > 7 &&  $dDay <= 30 ){
            return intval($dDay/7) . '周前';
        }elseif( $dDay > 30 ){
            return intval($dDay/30) . '个月前';
        }
    }elseif($type=='full'){
        return date("Y-m-d , H:i:s",$sTime);
    }elseif($type=='ymd'){
        return date("Y-m-d",$sTime);
    }else{
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif($dYear==0){
            return date("Y-m-d H:i:s",$sTime);
        }else{
            return date("Y-m-d H:i:s",$sTime);
        }
    }
 }

 
 
/**
 * 根据ip获取城市
 * @param type $ip
 * @return type
 */
function get_ip_city($ip=""){
    if(!$ip) $ip = util::get_client_ip(); 
    $rs = get_json_data(send("http://api.114la.com/ip/","ip={$ip}&format=json","GET"));   
    if($rs && $rs['error_code']===0){
        return $rs['data']['city'];
    }
    return;
}

function hand_city($list){
    if(!$list) return ;
    $data = $word = array();
    foreach ($list as $vo) {
        $data[$vo['ic_word']][]=$vo;
        $word[$vo['ic_word']]=$vo['ic_word']; 
    } 
        
    //$word = array_chunk($word, 2,true);
//    $temp=array();
//    foreach ($word as $wo) {
//        $temp[]=  implode("", $wo);
//    } 
    //$data = array_chunk($data,2,true); 
    return array("word"=>$word,"list"=>$data); 
}
 

/**
 * 递归select
 */
function type_selct($list, $lev = 1, $currid = "") {
    global $select;
    $split = '|-';
    for ($i = 1; $i < $lev; $i++) {
        $split.='---';
    }
    if ($list) {
        foreach ($list as $v) {
            $name = $split . " " . $v['il_name'];
            $line = '<option value="' . $v['id'] . '"';
            if ($currid == $v['id']) {
                $line.=' selected ';
            }
            $line.='>' . $name . '</option>';
            $select.=$line;
            if ($v['child']) {
                type_selct($v['child'], $lev + 1, $currid);
            }
        }
    }
    return $select;
}

function type_list_do($list, $lev = 1,$url="") {
    global $arr;
    if ($list) {
        foreach ($list as $v) {
            $line = "";
            $rootName = $v['il_name'];
            $img = "";
            //if($v['il_ico']) $img = '<img src="'.$v['il_ico'].'" width="16" /> ';
            if ($lev == 1) $rootName = '<b>' . $v['il_name'] . '</b>';
            $line.='<li class="';
            if ($v['child'])   $line.=' child  ';
            $line.='child_third"><span';
            if ($v['child'])   $line.=' class="minu" ';
            $line.='>' .$img.$rootName .'['.$v['il_order'].']</span> ';
            $line.='<i><a href="javascript:showbox('.$v['id'].',\''.$url.'\',630,400,\'添加分类\',\'add\');">[添加子分类]</a> <a href="javascript:showbox('.$v['id'].',\''.$url.'\',630,400,\'添加分类\',\'edit\');">[编辑]</a><a href="javascript:do_delete.tips(\'version3\',\'type_do\',' . $v['id'] . ');">[删除]</a></i>';
            if ($v['child']) {
                $line.='<ul>';
                $arr.=$line;
                type_list_do($v['child'], $lev + 1,$url);
                $arr.="</ul>";
            } else {
                $line.='</li>';
                $arr.=$line;
            }
        }
    }
    return $arr;
}
/**
 * 递归获取id
 * @param type $list
 */
function recursive($list) {
    global $ids;
    if ($list && is_array($list)) {
        foreach ($list as $v) {
            $ids[] = $v['id'];
            if ($v['child']) {
                recursive($v['child']);
            }
        }
    }
    return $ids;
}
/**
 * 递归重组节点信息为多维数组
 * @param  $node
 * @param  $pid
 */
function merge_node($node, $pid = 0,$field="pid") { 
    $arr = array();
    if(!$node) return $arr;
    foreach ($node as $v) {
        if (isset($v[$field]) && $v[$field] == $pid) {
            $v['child'] = merge_node($node,$v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}
    

//记录日志
function logs($channel, $contents) { 
    $path = PATH_ROOT . '/data/log/';   
    if (!is_dir($path)) {
        if (!@mkdir($path, 0777, true)) {
            exit("无法创建目录{$path}，请检查是否具有相应目录的写权限");
        }
    } 
    if (!is_writable($path)) {
        exit("目录{$path}没有写权限，请为此目录加上写权限");
    } 
    $filename = date('Ymd', $_SERVER['REQUEST_TIME']) . '_' . $channel . '.log';
    $msg = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . "\t " . date('Y-m-d H:i:s') . " \t $contents\r\n"; 
    file_put_contents($path . $filename, $msg, FILE_APPEND | LOCK_EX);
}

/**
 * 结束当前页面并且输出
 * @param $error_code  错误代码
 * @param $error_message  提示信息
 * @param $data  返回数据
 * @return  json;
 */
function finish($status, $info, $data = null) {
    $result ['error_code'] = $status;
    $result ['error_message'] = $info;
    $result ['data'] = $data;
    echo json_encode($result);
    exit();
}

 

function load_css($val) {
    $html = "";
    if (!$val)  return;
    $data = explode(",", $val);
    foreach ($data as $vo) {
        if (!OPEN_DEBUG)
            $vo = $vo . ".min";
        if (strpos($vo, "http://") === 0) { //绝对地址
            $html.='<link rel="stylesheet" type="text/css" href="' . $vo . '" />';
        } else {
            $html.='<link rel="stylesheet" type="text/css" href="/static/css/' . $vo . '.css" />';
        }
    }
    return $html;
}

function load_js($val) {
    $html = "";
    if (!$val)   return;
    $data = explode(",", $val);
    foreach ($data as $vo) {
        if (!OPEN_DEBUG)
            $vo = $vo . ".min";
        if (strpos($vo, "http://") === 0) { //绝对地址
            $html.='<script type="text/javascript" src="' . $vo . '"></script>';
        } else {
            $html.='<script type="text/javascript" src="/static/js/web/' . $vo . '.js"></script>';
        }
    }
    return $html;
}
/**
 * url 跳转
 * @param  $url   跳转的url
 * @param  $type  跳转类型 301 404 
 * @param  $tip   提示信息
 */
function redirect($url = '/', $type = '', $tip = '') {
    if ($type == '301') {
        Header('HTTP/1.1 301 Moved Permanently'); 
    } elseif ($type == '404') {
        Header('HTTP/1.1 404 Not Found'); 
        echo file_get_contents($url);
    } else {
        if ($tip) {
            Header('Content-type:text/html;charset=utf-8'); 
            echo '<script>alert("' . addslashes($tip) . '");location.href="' . $url . '";</script>';
        } else {
            echo '<script>location.href="' . $url . '";</script>';
        }
    }
    exit();
}


/**
 * 获取远程数据
 * @param  $url 地址
 * @param  $post_data 参数
 * @param  $method 方法
 * @param  $timeout 延时
 */
function send($url = "", $post_data = '', $method = 'POST', $timeout = 20) {
    if ($method == 'GET'){
        if(is_array($post_data)){
            $post_data = implode("&",$post_data);
        } 
        $url = $url.'?'.ltrim($post_data, '?');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) \r\n Accept: */*'));
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if ($method == 'POST'){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    }
    $content = curl_exec($ch);
    $response = curl_getinfo($ch);
    return $content;
}


/**
 * 递归处理对象
 * @param $obj
 */
function get_object_vars_final($obj) {
    if (is_object($obj)) {
        $obj = get_object_vars($obj);
    }
    if (is_array($obj)) {
        foreach ($obj as $key => $value) {
            $obj [$key] = get_object_vars_final($value);
        }
    }
    return $obj;
}

//解析json
function get_json_data($strJson) {
    $strJson = trim($strJson);
    $pos = strpos($strJson, '{');
    if ($pos !== false) {
        $strJson = json_decode($strJson);
        $strJson = get_object_vars_final($strJson);
        return $strJson;
    } else {
        return '';
    }
}

 
/**
 * 浏览器友好的变量输出 
 * @param $var 
 * @param $echo
 * @param $label
 * @param $strict
 */
function dump($var, $echo = true, $label = null, $strict = true) {
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace("/\]\=\>\n(\s+)/m", '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo ($output);
        return null;
    }else{
        return $output;
    }
}

function _debug($data){

    echo '<!--';
    echo '<pre>';
    var_dump($data);
    echo '-->';
}

function _faceFile($intId,$strName){
    $strFilesPath = '/static/images/face';
    $strFileExt = '.gif';
    $arrFiles = _getAllFaceFile();
    if($intId && $arrFiles[$intId]){
        if(file_exists(PATH_ROOT.$strFilesPath.'/'.$intId.$strFileExt)){
            return $strFilesPath.'/'.$intId.$strFileExt;
        }else{
            return '';
        }
    }elseif($strName && $intId = array_search($strName,$arrFiles)){
        if(file_exists(PATH_ROOT.$strFilesPath.'/'.$intId.$strFileExt)){
            return $strFilesPath.'/'.$intId.$strFileExt;
        }else{
            return '';
        }
    }
    return '';
}

function _getAllFaceFile(){
    return array(
        "1"=>"[喜欢]",
        "2"=>"[观望]",
        "3"=>"[揉脸]",
        "4"=>"[困]",
        "5"=>"[失落]",
        "6"=>"[呕吐]",
        "7"=>"[得瑟]",
        "8"=>"[电眼]",
        "9"=>"[浅水]",
        "10"=>"[高兴]",
        "11"=>"[唉]",
        "12"=>"[亲亲]",
        "13"=>"[愤怒]",
        "14"=>"[蹬地]",
        "15"=>"[睡觉]",
        "16"=>"[失望]",
        "17"=>"[看看]",
        "18"=>"[抠鼻]",
        "19"=>"[求包养]",
        "20"=>"[色]",
        "21"=>"[跳舞]",
        "22"=>"[挨打]",
        "23"=>"[疑问]",
        "24"=>"[偷笑]",
        "25"=>"[无奈]",
        "26"=>"[拜拜]",
        "27"=>"[不要]",
        "28"=>"[拜托]",
        "29"=>"[刷牙]",
        "30"=>"[大哭]",
        "31"=>"[惊讶]",
        "32"=>"[出拳]",
        "33"=>"[喝茶]",
        "34"=>"[颤抖]",
        "35"=>"[转圈]",
        "36"=>"[无语]",
    );
}

function _parseComment($strContent){
    if(!$strContent)return $strContent;
    if(false === strpos($strContent,'[') || false === strpos($strContent,']'))return $strContent;
    $arrFiles = _getAllFaceFile();
    $strFilesPath = '/static/images/face';
    $strFileExt = '.gif';
    foreach($arrFiles as $k=>$v){
        $strContent = str_ireplace($v,'<img src='.$strFilesPath.'/'.$k.$strFileExt.' />',$strContent);
    }
    return $strContent;
}

function _filterContent($strContent){
    if(!$strContent)return $strContent;
    $arrKeywords = array();
    if(!defined('FILTER_KEYWORD') || strtolower(FILTER_KEYWORD)=='all'){
        if(file_exists(PATH_CONFIG.'/allkeywords.php')){
            $arrKeywords = include PATH_CONFIG.'/allkeywords.php';
        }else{
            if(file_exists(PATH_CONFIG.'/115keywords.txt')){
                $arrKeywords = file(PATH_CONFIG.'/115keywords.txt',FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
            }
            if(file_exists(PATH_CONFIG.'/keywords.txt')){
                $arrKeywords = array_merge($arrKeywords,file(PATH_CONFIG.'/keywords.txt',FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES));
            }
            $arrKeywords = array_unique($arrKeywords);
            file_put_contents(PATH_CONFIG.'/allkeywords.php',"<?php\nreturn ".var_export($arrKeywords,true).';');
        }
    }elseif(strtolower(FILTER_KEYWORD)=='orther'){
        if(file_exists(PATH_CONFIG.'/ortherkeywords.php')){
            $arrKeywords = include PATH_CONFIG.'/ortherkeywords.php';
        }else{
            if(file_exists(PATH_CONFIG.'/keywords.txt')){
                $arrKeywords = file(PATH_CONFIG.'/keywords.txt',FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
            }
            $arrKeywords = array_unique($arrKeywords);
            file_put_contents(PATH_CONFIG.'/ortherkeywords.php',"<?php\nreturn ".var_export($arrKeywords,true).';');
        }
    }else{
        if(file_exists(PATH_CONFIG.'/115keywords.php')){
            $arrKeywords = include PATH_CONFIG.'/115keywords.php';
        }else{
            if(file_exists(PATH_CONFIG.'/115keywords.txt')){
                $arrKeywords = file(PATH_CONFIG.'/115keywords.txt',FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
            }
            $arrKeywords = array_unique($arrKeywords);
            file_put_contents(PATH_CONFIG.'/115keywords.php',"<?php\nreturn ".var_export($arrKeywords,true).';');
        }
    }


    foreach($arrKeywords as $v){
        $strContent = str_ireplace($v,'**',$strContent);
    }
    return $strContent;
}

function _getCity($strIp){
    $arrCity = array();
    $arrCity = json_decode(file_get_contents('http://weather.api.114la.com/api.php?appkey=xiaohua5e8c0u0a2la4a1d1&ip='.$strIp.'&datatype=cityinfo'),true);
    return $arrCity['data']['city']?$arrCity['data']['city']:$arrCity['data']['district'];
}