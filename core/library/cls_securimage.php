<?php
/**
 * 验证码类
 * @version $Id$  
 */
@session_start();
class cls_securimage
{
    public $text_num;
    public $interference_line;
    public $ttf_file;
    public $im_x;
    public $im_y;
    public $session_name;

    function  __construct($text_num=4, $im_x = 200, $im_y = 40, $scale = 5, $session_name='securimage_code_value')
    {
        $this->text_num = $text_num;
        $this->interference_line = true;
        $this->ttf_file = PATH_SHARE.'/securimage_font/'.rand(1,6).'.ttf';
        $this->im_x = $im_x;
        $this->im_y = $im_y;
        $this->scale = $scale;
        $this->session_name = $session_name;
        //echo $this->ttf_file;
    }

    function show()
    {

        $this->im_x *= $this->scale;
        $this->im_y *= $this->scale;
        $this->make_rand();
        $im = imagecreatetruecolor($this->im_x,$this->im_y);
        // 颜色
        $text_c = ImageColorAllocate($im, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
        // 背景
        $buttum_c = ImageColorAllocate($im,255,255,255);
        imagefill($im, 16, 13, $buttum_c);
        
        $size = min((int)$this->im_y,$this->im_x/$this->text_num)-5;

        // 写字
        for ($i=0;$i<strlen($this->text);$i++) {
            $tmp =substr($this->text,$i,1);
            $array = array(-1,1);
            $p = array_rand($array);
            $an = $array[$p]*mt_rand(1,10);//�Ƕ�
            imagettftext($im, $size, 0, $this->im_x*0.01+$i*$size*0.9, $size+rand(-5,5)*$size/100,$text_c, $this->ttf_file, $tmp);
        }



        $distortion_im = imagecreatetruecolor($this->im_x,$this->im_y);
        // 颜色
        $text_c = ImageColorAllocate($distortion_im, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
        // 背景
        $buttum_c = ImageColorAllocate($distortion_im,255,255,255);
        imagefill($distortion_im, 16, 13, $buttum_c);

        // 扭曲
        $xp = 10*rand(1,3);
        $k = 10*rand(50, 100);
        for ($i = 0; $i < ($this->im_x); $i++) {
            imagecopy($distortion_im, $im,
                $i-4, sin($k+$i/$xp)*4 ,
                $i, 0, 1, $this->im_y);
        }

        // Y-axis wave generation
        $k = 10*rand(50, 100);
        $yp = 10*rand(1,3);
        for ($i = 0; $i < ($this->im_y); $i++) {
            imagecopy($distortion_im, $im,
                sin($k+$i/$yp)*4, $i-1,
                0, $i, $this->im_x, 1);
        }

        // 缩小
        $imResampled = imagecreatetruecolor($this->im_x/$this->scale, $this->im_y/$this->scale);
        imagecopyresampled($imResampled, $distortion_im,
            0, 0, 0, 0,
            $this->im_x/$this->scale, $this->im_y/$this->scale,
            $this->im_x, $this->im_y
        );
        imagedestroy($distortion_im);
        $distortion_im = $imResampled;
        

        Header("Content-type: image/JPEG");

        ImagePNG($distortion_im);
        ImageDestroy($distortion_im);
        ImageDestroy($im);
    }

    protected function WaveImage()
    {
        // X-axis wave generation
        $xp = $this->scale*$this->Xperiod*rand(1,3);
        $k = rand(0, 100);
        for ($i = 0; $i < ($this->width*$this->scale); $i++) {
            imagecopy($this->im, $this->im,
                $i-1, sin($k+$i/$xp) * ($this->scale*$this->Xamplitude),
                $i, 0, 1, $this->height*$this->scale);
        }

        // Y-axis wave generation
        $k = rand(0, 100);
        $yp = $this->scale*$this->Yperiod*rand(1,2);
        for ($i = 0; $i < ($this->height*$this->scale); $i++) {
            imagecopy($this->im, $this->im,
                sin($k+$i/$yp) * ($this->scale*$this->Yamplitude), $i-1,
                0, $i, $this->width*$this->scale, 1);
        }
    }

    function make_rand()
    {
        $str="ACDEFGHJKMNPQRSTUVWXYZacdefghkmnprstuvwxyz23457";
        $result="";
        for($i=0;$i<$this->text_num;$i++) {
            $num[$i]=rand(0,strlen($str)-1);
            $result.=$str[$num[$i]];
        }
        $_SESSION[$this->session_name] = strtolower($result);
        $this->text=$result;
    }
    
    function check($code)
    {
        if(!isset($_SESSION[$this->session_name])) return false;
        if ($_SESSION[$this->session_name] ==  strtolower($code)) return true;
        return false;
    }
}
