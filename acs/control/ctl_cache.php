<?php
if (!defined('CORE'))   exit('Request Error!');
class ctl_cache extends common
{
    private $allow_dirs = array//可以删除的缓存
    (
        //'/data/file_cache',
        '/data/cache',
        '/templates/compile',
    );
    public function __construct()
    {
        parent::__construct();
        $this->dosubmit = request('dosubmit');
    }
    public function index()
    {
        if($this->dosubmit)
        {
            $dirs = request('dirs');
            $msg = '';
            foreach($dirs as $dir)
            {
                if(!in_array($dir,$this->allow_dirs))
                {
                    $msg .= '<span style="color:red">'.PATH_ROOT.$dir.'目录下的文件不允许删除！</span><br>';
                }
                //elseif(is_writable(PATH_ROOT.$dir))
                //{
                //	$msg .= '<span style="color:red">'.PATH_ROOT.$dir.'目录下的文件不允许删除！</span><br>';
                //}
                else
                {
                    if (strpos($dir, 'compile') !== false)
                    {
                        $files = glob(PATH_ROOT.$dir.'/*.php');
                        if(is_array($files))
                        {
                            foreach($files as $file)
                            {
                                $msg .='<span style="color:green">'.$file.'删除成功！</span><br>';
                                //echo (is_writable($file) ? '' : '不').'可写';
                                @chmod ($file, 0777);
                                @unlink($file);
                            }
                        }
                    }
                    else
                    {
                        $file = PATH_ROOT.$dir.'/cfc_data.php';
                        @chmod ($file, 0777);
                        @unlink($file);
                        $msg .='<span style="color:green">'.$file.'删除成功！</span><br>';
                    }
                }
            }
            $msg = empty($msg) ? "请选择目录！" : $msg;
            cls_msgbox::show('系统提示',$msg);
        }
        tpl::display('cache.index.tpl');
    }
}
?>
