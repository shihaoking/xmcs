<?php

class ctl_ajax {

    //图片上传
    public function upload() { 
        $width = request("width");
        $height = request("height");
        $path = PATH_ROOT."/static/upload/";
        $upload = new cls_upload(array(
            "upload_path"=>$path,
            "type_limit"=>array("jpeg","jpg","gif","png"),
        ));
        $rs = $upload->upload("imgurl");
        if($rs){
            if ($width && $height) {
                $img = new cls_image($path.$rs);
                $img->thumb2($width, $height,$path.$width."-".$height."-".$rs);  
            }
            finish(0,"", $rs);
        } 
        finish(1, "上传失败"); 
    }
    
    

}

