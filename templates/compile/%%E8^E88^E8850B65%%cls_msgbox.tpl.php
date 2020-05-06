<?php /* Smarty version 2.6.25, created on 2020-05-02 20:48:00
         compiled from system/cls_msgbox.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    *{margin:0;padding:0;color:#333;font-size:12px;}
    .ct2{ font-size:12px; }
    .ct2 a{ font-size:12px; }
 </style>
<base target='_self' />
<title> <?php echo $this->_tpl_vars['title']; ?>
 </title>
</head>
<body>
    <div style="background:#c3d9eb;padding:5px;width:500px;margin:50px auto;">
        <div style="border:1px #8ebce1 solid;">
            <h2 style="font-size:12px;height:28px; line-height:28px;border-bottom:1px #8ebce1 solid;padding:0 10px;background:#ebf3fa;"><?php echo $this->_tpl_vars['title']; ?>
</h2>
            <div style="padding:20px 0; text-align:center;background:#fff;">
                <h4 style="font-size:14px;line-height:24px;margin-bottom:10px">
                <?php echo $this->_tpl_vars['msg']; ?>

                </h4>
                <?php echo $this->_tpl_vars['jumpmsg']; ?>

            </div>
        </div>
    </div>
   <script lang='javascript'>
	   var pgo=0;
     function JumpUrl(){ if(pgo==0){ location='<?php echo $this->_tpl_vars['gourl']; ?>
'; pgo=1;  } }
	   <?php echo $this->_tpl_vars['jstmp']; ?>

           
   </script>
</body>
</html>