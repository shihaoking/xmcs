<?php 
if (!defined('CORE'))   exit('Request Error!');
class ctl_list {
    
    private $ct = "list";
 

    //模板管理
    public function template(){
        $even = request('even', null);
        $table = "soft_template"; 
        tpl::assign('turnto', '?ct='.$this->ct.'&ac=template'); 
        if ($even == 'add') { 
           tpl::display('template_add.tpl');
           exit;
        }
        $list = mod_version3::get_list($table,0, $this->ct, "template");    
        tpl::assign('rs', $list);   
        tpl::display("template.tpl");
    } 
    public function template_do(){
        $table="soft_template";
        $turnto = '?ct='.$this->ct.'&ac=template';  
        $data = array(
            'name' => request('name'),
            'preview' => request('preview'),
            'path' => request('path'), 
        );
        $lurd_obj = cls_lurd::factory($table);
        $data['addtime']=time();
        $lurd_obj->insert($data);
        cls_msgbox::show('系统提示', '成功插入记录！', $turnto, 1000); 
    }
    
    
   //专题管理
   public function zt(){
        $even = request('even', null);
        $table = "soft_zt"; 
        tpl::assign('turnto', '?ct='.$this->ct.'&ac=zt'); 
        if ($even == 'add') { 
           tpl::display('zt_add.tpl');
           exit;
        }
        $list = mod_version3::get_list($table,0, $this->ct, "zt");    
        tpl::assign('rs', $list);   
        tpl::display("zt.tpl");
    } 
    
    
    //基本配置
    public function basic(){
        $table = "m_config";  
        tpl::assign('turnto', '?ct='.$this->ct.'&ac=basic');
        $even = request('even', null);
        if (!empty($even)) {
            $id = request('id', null);
            if ($even == 'edit') { 
                $row = mod_version3::get_row($table,$id,"id");  
                tpl::assign('v', $row); 
                tpl::display('basic_add.tpl');
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
        $query = db::query("select * from {$table}");
        $list = db::fetch_all($query);
        tpl::assign('list', $list);   
        tpl::display("basic.tpl");
    }
    public function basic_do() {
        $table = "m_config";
        $type = request('type', 'only');
        $even = request('even', 'edit');
        $ids = request('id',0); 
        $titles = request("title");
        $keys = request("keys");  
        $turnto="?ct=list&ac=basic";
        $lurd_obj = cls_lurd::factory($table);
        if ($type == 'only') { 
             $data = array(
                'title' => $titles,
                'keys' =>$keys,
                'val' => request('val'), 
            );
            if ($ids) {
                $condition = "id = '$ids'";
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
            }  
        } 
    }
    
     public function basic_add() {   
        tpl::assign('turnto', '?ct='.$this->ct.'&ac=basic');
        tpl::display('basic_add.tpl');
    }
    
    
    //seo管理
    public function seo() {   
        $table = "soft_seo";
        $start = request('start', 0); 
        $search_value = request('search_value', null);
        $tt_sv = null;
        if (!empty($search_value)) {
            $tt_sv = "&search_value=$search_value";
        }   
        tpl::assign('turnto', '?ct='.$this->ct.'&start=' . $start . $tt_sv . '&ac=seo');
        $even = request('even', null);
        if (!empty($even)) {
            $id = request('id', null);
            if ($even == 'edit') { 
                $row = mod_version3::get_row($table,$id,"id");  
                tpl::assign('v', $row); 
                tpl::display('seo_add.tpl');
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
        if (!empty($search_value)) {
            $condition="  where url REGEXP '{$search_value}' "; 
        }    
        $array_city = mod_version3::get_list($table,$start, $this->ct, "seo", "*", "", $condition);  
        tpl::assign('rs', $array_city);   
        tpl::display("seo.tpl");
    }
	
    public function seo_do() {
        $table = "soft_seo";
        $type = request('type', 'only');
        $even = request('even', 'edit');
        $ids = request('id',0);
        $start = request('start', 0);
        
        $title = request("title");
        $url= request("url");
        $seotitle = request("seotitle");
        $seokey = request("seokey");
        $seodesc= request("seodesc");
      
        $turnto="?ct=list&ac=seo&start=".$start;
        $lurd_obj = cls_lurd::factory($table);
        if ($type == 'only') { 
             $data = array(
                'title' => $title,
                'url' =>$url,
                'seotitle' => $seotitle,
                'seokey' => $seokey,
                'seodesc' =>$seodesc,  
            );
            if ($ids) {
                $condition = "id = '$ids'";
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
            }  
        } 
    }
    
    public function seo_add() {  
        $start = request('start', 0);
        tpl::assign('turnto', '?ct='.$this->ct.'&start=' . $start . '&ac=seo');
        tpl::display('seo_add.tpl');
    }
    
    //广告管理
    public function adv() { 
        $data=null;
        $file = PATH_DATA."/cache/adv.txt";
        if(file_exists($file)){
             $content = file_get_contents($file);
             if($content){
                 $data = unserialize($content);
             } 
        } 
        $do = request("do"); 
        $id = request("id",null); 
        if($do=="delete"){
            if($id===null) finish (1, "参数错误");
            if(!isset($data[$id])) finish (1, "该条记录已经不存在");
            unset($data[$id]);
            $flag = file_put_contents($file, serialize($data));
            if($flag){
                finish(0, "");
            }else{
                finish(1, "删除失败");
            }
        } 
        tpl::assign('turnto', '?ct=list&ac=adv');
        tpl::assign("list", $data);
        tpl::display("adv.tpl");
    }
    //添加
    public function adv_add(){  
        tpl::assign('turnto', '?ct=list&ac=adv');
        tpl::assign("act","add"); 
        tpl::display('adv.edit.tpl');
    }
    
    //编辑
    public function adv_edit(){  
        $id = request("id",null); 
        if($id===null){
            cls_msgbox::show('系统提示', '操作失败！', '?ct=list&ac=adv');
        }
        $file = PATH_DATA."/cache/adv.txt";
        if(file_exists($file)){
             $data = unserialize(file_get_contents($file));
        }
        $v = $data[$id];
        $v['id']=$id;  
        $v['code'] = str_replace("\\", "",$v['code']);
        tpl::assign("v", $v); 
        tpl::assign("act","update");
        tpl::assign('turnto', '?ct=list&ac=adv');
        tpl::display('adv.edit.tpl');
    }
    
    

        //广告处理
    public function adv_do() { 
        $id = request('id', null);  
        $act = request("act"); 
        $turnto = '?ct=list&ac=adv'; 
        $name= request('name'); 
        $imgurl= request('imgurl');
        $url = request('url');
        $code= request('code');
        $type = request('type');
         
   
        $file = PATH_DATA."/cache/adv.txt";
        if(!file_exists($file)){
            cls_msgbox::show('系统提示', '操作失败！', '?ct=list&ac=adv');
        } 
        $con = file_get_contents($file);
        if($con){
            $data = unserialize($con);
        } 
        if ($act=="update") { 
            $data[$id]['name']=$name;
            $data[$id]['imgurl']=$imgurl;
            $data[$id]['url']=$url;
            $data[$id]['code']=$code;
            $data[$id]['type']=$type;
            $flag = file_put_contents($file, serialize($data));
            if($flag){
                cls_msgbox::show('系统提示', '成功修改记录！', $turnto,1000);
            }else{
                cls_msgbox::show('系统提示', '修改失败！', '');
            }
        } else if($act=="add") {
            $adv = array(
                "name"=>$name,
                "imgurl"=>$imgurl,
                "url"=>$url,
                "code"=>$code,
                "type"=>$type,
            );
            $data[]=$adv; 
            $flag = file_put_contents($file, serialize($data));
            if($flag){
                cls_msgbox::show('系统提示', '成功插入记录！', $turnto, 1000);
            }else{
                cls_msgbox::show('系统提示', '修改失败！', '');
            }  
        } 
    }
    
    
     //留言反馈
    public function feedback() { 
        $type = request('type', null);
        $even = request('even', null);
        $turnto =  '?ct=list&ac=feedback';
        if ($type == 'pl' && $even == 'delete') { 
            $array_id = request('id', null);
            if(!$array_id){
                cls_msgbox::show('系统提示', '请至少选择一项！', $turnto, 1000);
            }
            $flag = mod_version3::delete("m_feedback",$array_id);
            if ($flag) {
                cls_msgbox::show('系统提示', '成功删除记录！', $turnto, 1000);
            } else {
                cls_msgbox::show('系统提示', '删除记录失败！',$turnto, 1000);
            } 
        } else {
            $start = request('start', 0);  
            $orderquery = "ORDER BY if_id DESC";
            $fb = mod_version3::get_list("soft_feedback",$start, $this->ct, "feedback", '*', $orderquery);
            tpl::assign('turnto',$turnto);
            tpl::assign('array_fb', $fb);
            tpl::display('feedback.tpl');
        }
    }
     

}
