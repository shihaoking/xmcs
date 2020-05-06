<?php

if (!defined('CORE'))
    exit('Request Error!');

/**
 * 图片处理类
 *
 * 对指定图片生成缩略图、水印等
 *
 */
class cls_image {

    var $image_info = '';
    var $target_file = '';
    var $image_create_func = '';
    var $image_func = '';
    var $animated_gif = 0;
    var $jpeg_quality = 85;
    var $watermark_trans = 60;
    var $watermark_text = '';
    var $thumb_type = 2; // 1 为强制对缩略图用jpeg格式，2为与源图一致
    var $watermark_pos = 9;

    function __construct($target_file) {
        $this->target_file = $target_file;
        $this->image_info = @getimagesize($target_file);
        switch ($this->image_info['mime']) {
            case 'image/jpeg':
                $this->image_create_func = function_exists('imagecreatefromjpeg') ? 'imagecreatefromjpeg' : '';
                $this->image_func = function_exists('imagejpeg') ? 'imagejpeg' : '';
                break;
            case 'image/gif':
                $this->image_create_func = function_exists('imagecreatefromgif') ? 'imagecreatefromgif' : '';
                $this->image_func = function_exists('imagegif') ? 'imagegif' : '';
                break;
            case 'image/png':
                $this->image_create_func = function_exists('imagecreatefrompng') ? 'imagecreatefrompng' : '';
                $this->image_func = function_exists('imagepng') ? 'imagepng' : '';
                break;
        }
        if ($this->image_info['mime'] == 'image/gif') {
            $fp = fopen($target_file, 'rb');
            $target_filecontent = fread($fp, filesize($target_file));
            fclose($fp);
            $this->animated_gif = strpos($target_filecontent, 'NETSCAPE2.0') === false ? 0 : 1;
        }
    }

    //
    // 缩略图生成函数
    // 自适应模式
    //
    function thumb($thumbwidth, $thumbheight, $tofile = '') {
        if (function_exists('imagecreatetruecolor') && function_exists('imagecopyresampled') && function_exists('imagejpeg')) {
            $imagecreatefromfunc = $this->image_create_func;
            $image_func = $this->thumb_type == 1 ? 'imagejpeg' : $this->image_func;

            if (empty($image_func))
                return false;

            list($imagewidth, $imageheight) = $this->image_info;
            if (!$this->animated_gif && ($imagewidth >= $thumbwidth || $imageheight >= $thumbheight)) {
                $attach_photo = $imagecreatefromfunc($this->target_file);
                $x_ratio = $thumbwidth / $imagewidth;
                $y_ratio = $thumbheight / $imageheight;
                if (($x_ratio * $imageheight) < $thumbheight) {
                    $thumb['height'] = ceil($x_ratio * $imageheight);
                    $thumb['width'] = $thumbwidth;
                } else {
                    $thumb['width'] = ceil($y_ratio * $imagewidth);
                    $thumb['height'] = $thumbheight;
                }
                $target_file = empty($tofile) ? $this->target_file : $tofile;
                $thumb_photo = imagecreatetruecolor($thumb['width'], $thumb['height']);
                imagecopyresampled($thumb_photo, $attach_photo, 0, 0, 0, 0, $thumb['width'], $thumb['height'], $imagewidth, $imageheight);
                if ($this->image_info['mime'] == 'image/jpeg') {
                    $image_func($thumb_photo, $target_file, $this->jpeg_quality);
                } else {
                    $image_func($thumb_photo, $target_file);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    //
    // 缩略图生成函数
    // 会对空白地方填充满
    // $bgcolor 0 | 1 (白|黑), 其它颜色用 RGB格式, 如: $bgcolor = '33,55,178', 或web颜色 #E090ab 等
    //
    function thumb_fill($toW, $toH, $tofile = '', $bgcolor = 0, $issave = true) {
        if ($tofile == '')
            $tofile = $this->target_file;
        $imagecreatefromfunc = $this->image_create_func;
        $image_func = $this->thumb_type == 1 ? 'imagejpeg' : $this->image_func;
        if (empty($image_func))
            return false;

        list($width, $height) = $this->image_info;
        $target_width = $toW;
        $target_height = $toH;
        $target_ratio = $target_width / $target_height;
        $img_ratio = $width / $height;

        if ($target_ratio > $img_ratio) {
            $new_height = $target_height;
            $new_width = $img_ratio * $target_height;
        } else {
            $new_height = $target_width / $img_ratio;
            $new_width = $target_width;
        }

        $new_height = ($new_height > $target_height) ? $target_height : $new_height;

        $new_height = ($new_width > $target_width) ? $target_width : $new_height;

        $new_img = ImageCreateTrueColor($target_width, $target_height);

        $bgcolors = $this->get_color($bgcolor);
        $bgcolor = ImageColorAllocate($new_img, $bgcolors[0], $bgcolors[1], $bgcolors[2]);

        if (!@imagefilledrectangle($new_img, 0, 0, $target_width - 1, $target_height - 1, $bgcolor)) {
            return false;
        }

        $img = $imagecreatefromfunc($this->target_file);
        if (!@imagecopyresampled($new_img, $img, ($target_width - $new_width) / 2, ($target_height - $new_height) / 2, 0, 0, $new_width, $new_height, $width, $height)) {
            return false;
        }

        //保存为目标文件
        if ($issave) {
            if ($this->image_info['mime'] == 'image/jpeg') {
                $image_func($new_img, $tofile, $this->jpeg_quality);
            } else {
                $image_func($new_img, $tofile);
            }
        } else {
            $image_func($new_img);
        }
        imagedestroy($new_img);
        imagedestroy($img);
        return true;
    }

    //
    // 获得RGB颜色数组
    // 0 黑色, 1 白色, 其它情况为 RGB格式: xx,xx,xx , WEB格式: #xxxxxx
    //
    function get_color($mycolor) {
        if ($mycolor == '0')
            $mycolor = '255,255,255';
        if ($mycolor == '1')
            $mycolor = '0,0,0';
        if (substr($mycolor, 0, 1) == '#') {
            $mycolors[0] = hexdec('0x' . substr($mycolor, 1, 2));
            $mycolors[1] = hexdec('0x' . substr($mycolor, 3, 2));
            $mycolors[2] = hexdec('0x' . substr($mycolor, 5, 2));
        } else if (preg_match("/,/", $mycolor)) {
            $mycolors = explode(',', $mycolor);
        } else {
            $mycolors[0] = hexdec('0x' . substr($mycolor, 0, 2));
            $mycolors[1] = hexdec('0x' . substr($mycolor, 2, 2));
            $mycolors[2] = hexdec('0x' . substr($mycolor, 4, 2));
        }
        return $mycolors;
    }

    //
    // 图片加水印函数
    // 水印使用中文文字时，除了字体支持外，输入字符必须utf8编码
    // $watermarktype = png | gif | text
    // $textinfo
    //
    function watermark($watermarkfile, $watermarktype = 'png', $tofile = '', $textinfo = array('text' => '', 'size' => 6, 'fontfile' => '', 'color' => '0,0,0', 'angle' => '0', 'shadowx' => 2, 'shadowy' => 2, 'shadowcolor' => '0,0,0')) {
        if (function_exists('imagecopy') && function_exists('imagealphablending') && function_exists('imagecopymerge')) {
            $image_create_func = $this->image_create_func;
            $image_func = $this->image_func;
            if (empty($image_func))
                return false;
            list($imagewidth, $imageheight) = $this->image_info;
            if ($watermarktype != 'text' && file_exists($watermarkfile)) {
                $watermarkinfo = @getimagesize($watermarkfile);
                $watermark_logo = $watermarktype == 'png' ? @imagecreatefrompng($watermarkfile) : @imagecreatefromgif($watermarkfile);
                if (!$watermark_logo) {
                    return false;
                }

                list($logowidth, $logoheight) = $watermarkinfo;
            } else {
                $box = @imagettfbbox($textinfo['size'], $textinfo['angle'], $textinfo['fontfile'], $textinfo['text']);
                $logowidth = max($box[2], $box[4]) - min($box[0], $box[6]);
                $logoheight = max($box[1], $box[3]) - min($box[5], $box[7]);
                $ax = min($box[0], $box[6]) * -1;
                $ay = min($box[5], $box[7]) * -1;
            }
            $wmwidth = $imagewidth - $logowidth;
            $wmheight = $imageheight - $logoheight;
            if (($watermarktype != 'text' && is_readable($watermarkfile) || $watermarktype == 'text') && $wmwidth > 10 && $wmheight > 10 && !$this->animated_gif) {
                switch ($this->watermark_pos) {
                    case 1:
                        $x = +5;
                        $y = +5;
                        break;
                    case 2:
                        $x = ($imagewidth - $logowidth) / 2;
                        $y = +5;
                        break;
                    case 3:
                        $x = $imagewidth - $logowidth - 5;
                        $y = +5;
                        break;
                    case 4:
                        $x = +5;
                        $y = ($imageheight - $logoheight) / 2;
                        break;
                    case 5:
                        $x = ($imagewidth - $logowidth) / 2;
                        $y = ($imageheight - $logoheight) / 2;
                        break;
                    case 6:
                        $x = $imagewidth - $logowidth - 5;
                        $y = ($imageheight - $logoheight) / 2;
                        break;
                    case 7:
                        $x = +5;
                        $y = $imageheight - $logoheight - 5;
                        break;
                    case 8:
                        $x = ($imagewidth - $logowidth) / 2;
                        $y = $imageheight - $logoheight - 5;
                        break;
                    case 9:
                        $x = $imagewidth - $logowidth - 5;
                        $y = $imageheight - $logoheight - 5;
                        break;
                }
                $dst_photo = @imagecreatetruecolor($imagewidth, $imageheight);
                $target_photo = $image_create_func($this->target_file);
                imagecopy($dst_photo, $target_photo, 0, 0, 0, 0, $imagewidth, $imageheight);
                if ($watermarktype == 'png') {
                    imagecopy($dst_photo, $watermark_logo, $x, $y, 0, 0, $logowidth, $logoheight);
                } elseif ($watermarktype = 'text') {
                    if (($textinfo['shadowx'] || $textinfo['shadowy']) && $textinfo['shadowcolor']) {
                        $shadowcolorrgb = $this->get_color($textinfo['shadowcolor']);
                        $shadowcolor = imagecolorallocate($dst_photo, $shadowcolorrgb[0], $shadowcolorrgb[1], $shadowcolorrgb[2]);
                        imagettftext($dst_photo, $textinfo['size'], $textinfo['angle'], $x + $ax + $textinfo['shadowx'], $y + $ay + $textinfo['shadowy'], $shadowcolor, $textinfo['fontfile'], $textinfo['text']);
                    }
                    $colorrgb = $this->get_color($textinfo['color']);
                    $color = imagecolorallocate($dst_photo, $colorrgb[0], $colorrgb[1], $colorrgb[2]);
                    imagettftext($dst_photo, $textinfo['size'], $textinfo['angle'], $x + $ax, $y + $ay, $color, $textinfo['fontfile'], $textinfo['text']);
                } else {
                    imagealphablending($watermark_logo, true);
                    imagecopymerge($dst_photo, $watermark_logo, $x, $y, 0, 0, $logowidth, $logoheight, $this->watermark_trans);
                }
                $target_file = empty($tofile) ? $this->target_file : $tofile;
                if ($this->image_info['mime'] == 'image/jpeg') {
                    $image_func($dst_photo, $target_file, $this->jpeg_quality);
                } else {
                    $image_func($dst_photo, $target_file);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    function thumb2($width, $height,$tofile="", $proportional = false, $output = 'file', $delete_original = false, $use_linux_commands = false) {
        if ($height <= 0 && $width <= 0) {
            return false;
        }  
        $info = getimagesize($this->target_file);
        $image = '';
        $final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;
        if ($proportional) {
            if ($width == 0)
                $factor = $height / $height_old;
            elseif ($height == 0)
                $factor = $width / $width_old;
            else
                $factor = min($width / $width_old, $height / $height_old);
            $final_width = round($width_old * $factor);
            $final_height = round($height_old * $factor);
        }
        else {
            $final_width = ( $width <= 0 ) ? $width_old : $width;
            $final_height = ( $height <= 0 ) ? $height_old : $height;
        }

        switch ($info[2]) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($this->target_file);
                break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($this->target_file);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($this->target_file);
                break;
            default:
                return false;
        }

        $image_resized = imagecreatetruecolor($final_width, $final_height);

        if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {
            $trnprt_indx = imagecolortransparent($image);
            if ($trnprt_indx >= 0) {
                $trnprt_color = imagecolorsforindex($image, $trnprt_indx);
                $trnprt_indx = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                imagefill($image_resized, 0, 0, $trnprt_indx);
                imagecolortransparent($image_resized, $trnprt_indx);
            } elseif ($info[2] == IMAGETYPE_PNG) {
                imagealphablending($image_resized, false);
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
                imagefill($image_resized, 0, 0, $color);
                imagesavealpha($image_resized, true);
            }
        }

        imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);

        if ($delete_original) {
            if ($use_linux_commands)
                exec('rm ' . $this->target_file);
            else
                @unlink($this->target_file);
        }

        switch (strtolower($output)) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = NULL;
                break;
            case 'file':
                $output = $tofile;
                break;
            case 'return':
                return $image_resized;
                break;
            default:
                break;
        }

        switch ($info[2]) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
                break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output);
                break;
            case IMAGETYPE_PNG:
                imagepng($image_resized, $output);
                break;
            default:
                return false;
        }

        return true;
    }

}

//End Class