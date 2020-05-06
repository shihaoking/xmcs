<?php

if (!defined('CORE'))  exit('Request Error!');
//搜索关键字控制器
class ctl_version3 {

    private $ct="version3";
 

    public function ajax(){
        $even = request("even");  
        if($even=="upload"){
            $files = req::$files; 
            $rs = mod_version3::upload($files['imgurl'],'');
            $width = request("width");
            $height = request("height");
            if($rs && $rs['status']===0){ 
                if($width && $height){ 
                    smart_resize_image(PATH_ROOT.$rs['data'][0], PATH_ROOT.$rs['data'][1], $width, $height, false, 'file', false, false);
                    //$img = new cls_picture(); 
                   // $img->make_thumb(PATH_ROOT.$rs['data'][0],PATH_ROOT.$rs['data'][1],$width, $height);
                    //$img->CreateThumbnail(PATH_ROOT.$rs['data'][0], $width, $height, PATH_ROOT.$rs['data'][1]);
                    //$img = new cls_image(PATH_ROOT.$rs['data'][0]);
                    //$img->thumb_fill($width, $height,PATH_ROOT.$rs['data'][1]);
                }
                finish(0,$rs['data'][1],$rs['data'][0]);
            } 
            finish(1, $rs['msg']);
        }
        finish(1,"参数错误");
    }

     
    

    
    

   

    
    //分类管理
    public function type() { 
        //得到所有层级列表
        $list = mod_version3::get_type_all(0);  
        $html="";
        if (!empty($list)) {
            $html = type_list_do($list,1,"?ct=version3&ac=type_add");
        } 
        tpl::assign("jsfun", "showorhide();");
        tpl::assign('html', $html); 
        tpl::display('type.tpl'); 
    } 
    
    //添加类别
    public function type_add() { 
        $even = request('even'); 
        $pid=0;
        $level=1;
        $fname="根类别";
        $id = intval(request('id'));
        if ($even == 'add' && $id) {  
            $row= mod_version3::get_row("m_type",$id);
            $pid = $row['id'];
            $fname = $row['il_name'];
            $level = $row['il_level'] + 1;
        }else if($even=="edit" && $id){
            $row= mod_version3::get_row("m_type",$id);
            $parent = mod_version3::get_row("m_type",$row['pid']);
            if($parent){
                $pid = $parent['id'];
                $fname = $parent['il_name']; 
            }else{
                $pid=0;
                $fname="根类别";
            } 
            tpl::assign('v', $row);  
        } 
        tpl::assign('level',$level);
        tpl::assign('pid', $pid);
        tpl::assign('fname', $fname);
        tpl::display('type_add.tpl');
    }
   //类别处理
   public function type_do() {  
        $even = request('even', 'edit'); 
        $id = request('id',null);  
        $lurd_obj = cls_lurd::factory("m_type");
        if (!empty($id)) { 
            if ($even == 'delete') {
                $flag = mod_version3::delete_type_relate($id); 
                if($flag) finish (0, "");
                finish(1, "删除失败");
            } elseif ($even == 'edit') {  
                $flag = $lurd_obj->update(array(
                    "il_name"=>request('name'),
                    "il_order"=>request('order'),
                    "il_smallico"=>  request("smallico"),
                    "il_ico"=>  request("ico"),
                    "il_url"=>  request("url"),
                ), "id = '{$id}'");  
                if($flag) cls_msgbox::show('系统提示', '成功修改记录！',-1,1000);
            }
        } else { 
            $pid = request('pid', 0); 
            $data = array(
                'il_name' => request('name', null),
                'il_level' => request('level', null),
                'pid' => request('pid', 0),
                'il_order' => request('order', null), 
                'il_show'=>0,
                "il_smallico"=>  request("smallico"),
                "il_ico"=>  request("ico"),
                "il_url"=>  request("url"),
            );
            $flag = $lurd_obj->insert($data,'', false, true);
            if($flag){
                $path=$flag;
                if($pid>0){
                    $row = mod_version3::get_row("m_type",$pid);
                    if($row){
                       $path = $row['il_path'].",".$flag;
                    }
                }
                $lurd_obj->update(array(
                    "il_path"=>$path, 
                ), "id = '{$flag}'");  
                cls_msgbox::show('系统提示', '成功增加记录！',-1, 1000);
            }
        }
    }
    
    
    
    //手机酷站
    public function website() {  
   
        $table = "m_website";
        $start = request('start', 0);
        $pid= request('pid', 0); 
        $search_value = request('search_value', null);
        $tt_sv = null;
        if (!empty($search_value)) {
            $tt_sv = "&search_value=$search_value";
        }  
        $listfield = '*'; 
        $orderquery = "ORDER BY iw_order asc,iw_id desc"; 
        tpl::assign('turnto', '?ct='.$this->ct.'&start=' . $start . $tt_sv . '&pid='.$pid.'&ac=website');
        $even = request('even', null);
        if (!empty($even)) {
            $id = request('id', null);
            if ($even == 'edit') { 
                $row = mod_version3::get_row($table,$id,"iw_id");  
                tpl::assign('v', $row); 
                tpl::display('website_add.tpl');
            }
            if($even=="delete"){
                $flag = mod_version3::delete($table,$id);
                if($flag){
                    finish(0, "");
                }else{
                    finish(1, "删除失败");
                }
            }
            exit;
        } 
        $condition = null;
        $temp=array();
        if (!empty($search_value)) {
            $temp[]="  iw_name LIKE '%{$search_value}%'"; 
        }  
        if($pid) $temp[]=" iw_typeid={$pid} "; 
        if($temp)  $condition=" where ".implode(" and ", $temp); 

        
         //获取分类
        $list = mod_version3::get_type_all(1);
        $option = type_selct($list,1,$pid); 
        tpl::assign("option", $option);
        tpl::assign("jsfun", "eventSelect('#level_list','?ct=".$this->ct."&ac=website&pid={val}');");
        
        $array_city = mod_version3::get_list($table,$start, $this->ct, "website", $listfield, $orderquery, $condition,"website");  
        tpl::assign('rs', $array_city);   
        tpl::display("website.tpl");
    }
	
    public function website_do() {
        $table = "m_website";
        $type = request('type', 'only');
        $even = request('even', 'edit');
        $ids = request('id',0);
        $start = request('start', 0);
        $names = request("name");
        $urls = request("url");
        $orders = request("order",100);
        $hots = request("hot",0);
        $shows = request("show",1); 
        $turnto="?ct=version3&ac=website&start=".$start;
        $lurd_obj = cls_lurd::factory($table);
        if ($type == 'only') { 
             $data = array(
                'iw_name' => $names,
                'iw_url' =>$urls,
                'iw_imgurl' => request('imgurl'),
                'iw_order' => $orders,
                'iw_hot' => $hots, 
                'iw_show' => $shows,
                'iw_typeid' => request('typeid'), 
            );
            if ($ids) {
                $condition = "iw_id = '$ids'";
                $flag = $lurd_obj->update($data, $condition);
                if($flag){
                    cls_msgbox::show('系统提示', '成功修改记录！', '');
                } 
            } else {
                $flag = $lurd_obj->insert($data);
                if($flag) cls_msgbox::show('系统提示', '成功插入记录！','');
            }
            cls_msgbox::show('系统提示', '操作失败', '');
        } elseif ($type== 'pl') { 
            if(!$ids) cls_msgbox::show('系统提示', '没有选中记录！', '');
            if ($even == 'delete') { //批量删除
                    $flag = mod_version3::delete($table,$ids);
                    if($flag) cls_msgbox::show('系统提示', '成功删除记录！', $turnto, 1000);
            } elseif ($even == 'edit') { //批量修改 
                    foreach ($ids as $id) {  
                        if(isset($names[$id])) $data['iw_name']=$names[$id];
                        if(isset($urls[$id])) $data['iw_url']=$urls[$id];
                        if(isset($orders[$id])) $data['iw_order']=$orders[$id];
                        if(isset($hots[$id])) $data['iw_hot']=$hots[$id];
                        if(isset($shows[$id])) $data['iw_show']=$shows[$id]; 
                        $condition = "iw_id = '$id'";
                        $lurd_obj->update($data, $condition);
                    }
                    cls_msgbox::show('系统提示', '成功修改记录！', $turnto, 1000);
            }  
        } 
    }
    
    public function website_add() { 
        //获取分类
        $list = mod_version3::get_type_all(1);
        $option = type_selct($list);
        tpl::assign("option", $option);  
        $start = request('start', 0);
        tpl::assign('turnto', '?ct='.$this->ct.'&start=' . $start . '&ac=website');
        tpl::display('website_add.tpl');
    }
    
    

	
    
    public function application(){
        $table = "m_application";
        $start = request('start', 0); 
        $pid = request("pid",0);
        $tid = request("tid",0);
        $clientid = request("clientid",0);
        $search_value = request('search_value', null);
        $tt_sv = null;
        if (!empty($search_value)) {
            $tt_sv = "&search_value=$search_value";
        }  
        $listfield = '*'; 
        $orderquery = "ORDER BY rise asc,id desc"; 
        tpl::assign('turnto', '?ct='.$this->ct.'&start=' . $start . $tt_sv . '&ac=application');
        $even = request('even', null);
        if (!empty($even)) {
            $id = request('id', null);
            if ($even == 'edit') { 
                $row = mod_version3::get_row($table,$id,"id");  
                $type = $this->app_flag($row['flag'],"checkbox");
                tpl::assign("flag", $type);  
                tpl::assign('v', $row); 
                tpl::display('application_add.tpl');
            }
            if($even=="delete"){
                $flag = mod_version3::delete($table,$id);
                if($flag){
                    finish(0, "");
                }else{
                    finish(1, "删除失败");
                }
            }
            exit;
        } 
        $condition = null;
        $temp=array();
        if (!empty($search_value)) {
            $temp[]="  title LIKE '%{$search_value}%'"; 
        }   
        if($pid){
            $temp[]=" typeid={$pid} ";
        }
        if($tid){
            $temp[]=" `flag` & {$tid} = {$tid} ";
        }
        if($clientid){
            $temp[]=" `client`={$clientid} ";
        }
        if($temp)  $condition=" where ".implode(" and ", $temp);  
        $array_city = mod_version3::get_list($table,$start, $this->ct, "application&pid={$pid}&tid={$tid}&clientid={$clientid}", $listfield, $orderquery, $condition,"application");  
        
        tpl::assign("clientid", $clientid);
        
         //获取分类
        $list = mod_version3::get_type_all(9);
        $option = type_selct($list,1,$pid); 
        tpl::assign("option", $option); 
        
        
        $flag = $this->app_flag($tid,"select");
        tpl::assign("flag", $flag); 
        tpl::assign("jsfun", "eventSelect('#level_list','?ct=".$this->ct."&ac=application&tid={$tid}&pid={val}');
            eventSelect('#flag','?ct=".$this->ct."&ac=application&pid={$pid}&tid={val}');
            eventSelect('#client','?ct=".$this->ct."&ac=application&tid={$tid}&pid={$pid}&clientid={val}');
        ");
        
        tpl::assign('rs', $array_city);   
        tpl::display("application.tpl");
    }
    
    public function application_do() {
        $table = "m_application";
        $type = request('type', 'only');
        $even = request('even', 'edit');
        $ids = request('id',0);
        $start = request('start', 0);
        $names = request("title");
        $urls = request("url");
        $rises= request("rise",100); 
        $flags = request("flag");    
        $sizes = request("size"); 
        $versions = request("version");  
        $turnto="?ct=version3&ac=application&start=".$start;
        $lurd_obj = cls_lurd::factory($table);
        if ($type == 'only') { 
             if($flags && is_array($flags)){
                $flags = array_sum($flags);
             } 
             $data = array(
                'title' => $names,
                'url' =>$urls,
                'img' => request('img'),
                'score' => request('score'),
                'size' => $sizes,
                'client' => request("client"), 
                'version' => $versions,
                'description' => request('description'),
                'flag' => $flags,
                'rise' => $rises,
                'typeid' => request('typeid'),  
            );
            if ($ids) {
                $condition = "id = '$ids'";
                $flag = $lurd_obj->update($data, $condition);
                if($flag){
                    cls_msgbox::show('系统提示', '成功修改记录！', '');
                } 
            } else {
                $data['addtime']=time();
                $flag = $lurd_obj->insert($data);
                if($flag) cls_msgbox::show('系统提示', '成功插入记录！','');
            }
            cls_msgbox::show('系统提示', '操作失败', '');
        } elseif ($type== 'pl') { 
            if(!$ids) cls_msgbox::show('系统提示', '没有选中记录！', '');
            if ($even == 'delete') { //批量删除
                    $flag = mod_version3::delete($table,$ids);
                    if($flag) cls_msgbox::show('系统提示', '成功删除记录！', $turnto, 1000);
            } elseif ($even == 'edit') { //批量修改 
                    foreach ($ids as $id) {  
                        if(isset($names[$id])) $data['title']=$names[$id];
                        if(isset($urls[$id])) $data['url']=$urls[$id];
                        if(isset($sizes[$id])) $data['size']=$sizes[$id];
                        if(isset($rises[$id])) $data['rise']=$rises[$id];
                        if(isset($versions[$id])) $data['version']=$versions[$id];   
                        $condition = "id = '$id'";
                        $lurd_obj->update($data, $condition);
                    }
                    cls_msgbox::show('系统提示', '成功修改记录！', $turnto, 1000);
            }  
        } 
    }
    
    
    
    public function app_flag($id=0,$type=""){
        $data = array(
            1=>"最新安卓游戏",
            2=>"今日热门应用",
            4=>"一周热门应用",
            8=>"最新",
            16=>"最热",
        ); 
        if($type=="select"){
            $html="<select id='flag' name='flag' class='select'>";
            $html.="<option value='0'>---选择标志--</option>";
            foreach ($data as $key=>$vo) {
                $html.="<option value='{$key}' ";
                if($id==$key){
                    $html.=" selected ";
                }
                $html.=" >{$vo}</option> ";
            }
            $html.="</select>";
            return $html; 
        }
        if($type=="checkbox"){ 
            $html="";
            foreach ($data as $key=>$vo) {
                $html.="<input type='checkbox' name='flag[]' value='{$key}' ";
                if(($id & $key) == $key){
                    $html.=" checked ";
                }
                $html.=" /> {$vo} &nbsp;&nbsp; ";
            } 
            return $html; 
        }
        if($id) return $data[$id];
        return $data;
    }

    
    public function application_add() {  
        $list = mod_version3::get_type_all(9);
        $option = type_selct($list,1); 
        tpl::assign("option", $option); 
        
        $flag = $this->app_flag(0,"checkbox");
        tpl::assign("flag", $flag); 
        $start = request('start', 0);
        tpl::assign('turnto', '?ct='.$this->ct.'&start=' . $start . '&ac=application');
        tpl::display('application_add.tpl');
    }
    
    
    
    
    
    
    
    //清除缓存
    public function cache(){
        tpl::assign('turnto', '?ct='.$this->ct.'&ac=cache');
        tpl::display("cache.tpl");
    }
    
    //版本更新检查
    public function update(){ 
        $data=null;
        $file = PATH_DATA."/cache/update.txt";
        if(file_exists($file)){
             $content = file_get_contents($file);
             if($content){
                 $data = unserialize($content);
             } 
        } 
        $do= request("even"); 
        $id = request("id",null); 
        if($do=="edit"){
             tpl::assign("v", $data[$id]); 
             tpl::assign("act","update");
             tpl::assign('turnto', '?ct=version3&ac=update');
             tpl::display('update_add.tpl');
             exit;
        } 
        tpl::assign('turnto', '?ct=version3&ac=update');
        tpl::assign("list", $data);
        tpl::display("update.tpl");
    }
    
    //添加
    public function update_add(){  
        tpl::assign('turnto', '?ct=version3&ac=update');
        tpl::assign("act","add"); 
        tpl::display('update_add.tpl');
    } 
    //关键字处理
    public function update_do() {  
        $act = request("act"); 
        $turnto = '?ct=version3&ac=update'; 
        $flag = request('flag'); 
        $version = request('version');
        $url = request('url');
        $logs = request('logs');
        
        $file = PATH_DATA."/cache/update.txt";
        if(!file_exists($file)){
            cls_msgbox::show('系统提示', '操作失败！', '?ct=version3&ac=update');
        } 
        $data = unserialize(file_get_contents($file));
        $data[$flag]=array(
            "flag"=>$flag,
            "version"=>$version,
            "url"=>$url,
            "logs"=>$logs,
        );
        if ($act=="update") {  
            $flag = file_put_contents($file, serialize($data));
            if($flag){
                cls_msgbox::show('系统提示', '成功修改记录！', $turnto,1000);
            }else{
                cls_msgbox::show('系统提示', '修改失败！', '');
            }
        } else if($act=="add") { 
            $flag = file_put_contents($file, serialize($data));
            if($flag){
                cls_msgbox::show('系统提示', '成功插入记录！', $turnto, 1000);
            }else{
                cls_msgbox::show('系统提示', '修改失败！', '');
            }  
        } 
    }
    
    
    public function clear(){
        $val = request("val");
        $act = request("act");
        $type = request("type");
        if($act=="url"){
            $data['url']=$val;
        }else if($act=="short"){
            $data['flag']=$val;
        }
        mod_version3::clearPageCache($data,$type);
        finish(0,"删除成功");
    }
    
}
