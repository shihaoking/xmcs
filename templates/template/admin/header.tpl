<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$title}></title>
<link href="images/css/common.css" rel="stylesheet" type="text/css" />
<link href="images/css/page.css" rel="stylesheet" type="text/css" />
<link href="images/css/tb-box.css" rel="stylesheet" type="text/css" />
<link href="images/css/admin.css" rel="stylesheet" type="text/css" />
<script src="images/js/jquery.js" type="text/javascript"></script>
<script src="images/js/util.js" type="text/javascript"></script>
<script src="images/js/frm.js" type="text/javascript"></script>
<script src="images/js/tb-box.js" type="text/javascript"></script>
<script type="text/javascript">
function goto_url(url)
{
    show_loading_msg(__loading_msg__);
    location.href = url;
}

function subform(url){
    $("#form1").attr('action', url);
    $("#form1").submit();
}
</script>
</head>
<body>

