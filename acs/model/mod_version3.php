<?php 
if (!defined('CORE'))  exit('Request Error!'); 
class mod_version3 { 
    
    /**
     * 通用删除
     * @param type array | id 
     * @return type
     */
    public static function delete($table,$cityid){
        $lurd_obj = cls_lurd::factory($table);
        if(is_array($cityid)){
            $data = $cityid; 
        }else{
            $data = array($cityid);
        }
        $flag = $lurd_obj->delete($data);
        return $flag;
    }
     
    //通用根据ID获取一行记录信息
    public static function get_row($table,$id,$pk='id') {
        $sql = "SELECT * FROM `{$table}` WHERE `{$pk}` = '{$id}'";
        $query = db::query($sql);
        $row = db::fetch_one($query);
        return $row;
    }
    
    //分页获取数据
    public static function get_list($table,$start, $ct, $ac, $listfield = '*', $orderquery="", $condition = '', $other = null){
        $lurd_obj = cls_lurd::factory($table); 
        $lurd_obj->page_size = 18;
        if($other=="website"){
            $lurd_obj->join_table("m_type","iw_typeid","id","il_name");
            $lurd_obj->page_size = 15;
        }
        if($other=="application"){
            $lurd_obj->join_table("m_type","typeid","id","il_name");
            $lurd_obj->page_size = 15;
        }  
        return $lurd_obj->get_pagination_datas($start, $url = "?ct={$ct}&ac={$ac}", $listfield, $orderquery, $condition);
    }
     
    

    //所有层级列表
    public static function get_type_all($pid=0,$level="",$layer=false) { 
        $sql = "select * from m_type"; 
        $temp = array();
        if($level!==""){
            $temp[]='  il_level='.  intval($level);
        }
        if($layer && $pid>=0){
            $temp[]='  pid='.  intval($pid);
        }
        if($temp){
            $sql.=" where ".implode(" and ", $temp);
        }
        $sql.=" order by il_order asc "; 
        $query = db::query($sql);
        $list = db::fetch_all($query);
        if($list){
            $list = merge_node($list,$pid);
        } 
        return $list;
    } 
    
    //级联删除类别
    public static function delete_type_relate($id){
        $list = self::get_type_all($id);  
        $ids = recursive($list);  
        $ids[]=$id;
        return self::delete("m_type", $ids);  
    }
     
    
    
    public static function clearPageCache($data,$type="page"){
       
        if($type=="page"){
            if(isset($data['url']) && $data['url']){
                $key = trim(end(explode('/',$data['url'])));
                if(!$key) $key="index";  
            }else if(isset ($data['flag']) && $data['flag']){
                $key = $data['flag'];  
            }
            if($key=="website" || $key=="news"){
                cache::del("page",$key);
                cache::del("page",$key."_phone");
            }else if($key=="app"){
                cache::del("page",$key);
                cache::del("page",$key."_phone");
                cache::del("page",$key."_ios");
            }else if($key=="all"){

            } else{
                cache::del("page",$key);
            }
        }
    }

       
}

?>
