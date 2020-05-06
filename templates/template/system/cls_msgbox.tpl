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
<title> <{$title}> </title>
</head>
<body>
    <div style="background:#c3d9eb;padding:5px;width:500px;margin:50px auto;">
        <div style="border:1px #8ebce1 solid;">
            <h2 style="font-size:12px;height:28px; line-height:28px;border-bottom:1px #8ebce1 solid;padding:0 10px;background:#ebf3fa;"><{$title}></h2>
            <div style="padding:20px 0; text-align:center;background:#fff;">
                <h4 style="font-size:14px;line-height:24px;margin-bottom:10px">
                <{$msg}>
                </h4>
                <{$jumpmsg}>
            </div>
        </div>
    </div>
   <script lang='javascript'>
	   var pgo=0;
     function JumpUrl(){ if(pgo==0){ location='<{$gourl}>'; pgo=1;  } }
	   <{$jstmp}>
           
   </script>
</body>
</html>