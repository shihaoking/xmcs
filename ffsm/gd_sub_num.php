<?php
session_start();//开启会话
header("Content-type:image/png");
$im = imagecreate(86, 22);//创建画布
$back = imagecolorallocate($im, 245, 245, 245);//设置颜色
imageFill($im,0,0,$back);//设置画布背景颜色
$scode = 0;//初始化求和变量为0
srand((double)microtime()*1000000);//生成随机种子

$color = imagecolorallocate($im, rand(100,255), rand(0,100), rand(100,255));
$s1 = rand(1,9);//随机生成1-9之间的随机数， 第一个数字
imagestring($im, 5, 12+0*13,1, $s1, $color);//设置当前数字的位置

$color = imagecolorallocate($im, rand(100,255), rand(0,100), rand(100,255));
$s2 = rand(1,9);//第二个数字
imagestring($im, 5, 12+1*13, 1, $s2, $color);

$color = imagecolorallocate($im, rand(100,255), rand(0,100), rand(100,255));
imagestring($im, 5, 12+2*13, 1, '+', $color);//加号

$color = imagecolorallocate($im, rand(100,255), rand(0,100), rand(100,255));
$s3 = rand(1,9);//第三个数字
imagestring($im, 5, 12+3*13, 1, $s3, $color);

$color = imagecolorallocate($im, rand(100,255), rand(0,100), rand(100,255));
$s4 = rand(1,9);//第四个数字
imagestring($im, 5, 12+4*13, 1, $s4, $color);

$color = imagecolorallocate($im, rand(100,255), rand(0,100), rand(100,255));
imagestring($im, 5, 12+5*13, 1, '=', $color);//= 号

for ($i=0; $i < 100 ; $i++) { //加入干扰元素
	$randColor = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
	imagesetpixel($im, rand()%70, rand()%30, $randColor);
}
imagepng($im);//创建png图像
imagedestroy($im);//销毁对象 
$scode = $s1*10+$s2+$s3*10+$s4;//计算出数字之和
$expire=time()+60*10;
setcookie("lgn_scode",$scode , $expire,'/');//数据记录到session 会话中







