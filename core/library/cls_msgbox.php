<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 简单对话框类
 * @version $Id$
 */
class cls_msgbox
{
    /**
    * 显示一个简单的对话框
    *
    * @parem $title 标题
    * @parem $msg 消息
    * @parem $gourl 跳转网址（其中 javascript:; 或 空 表示不跳转）
    * @parem $limittime 跳转时间
    *
    * @return void
    *
    */
    public static function show($title, $msg, $gourl='', $limittime=5000)
    {
        if($title=='') $title = '系统提示信息';
        $jumpmsg = $jstmp = '';
        //返回上一页
        if($gourl=='javascript:;')
        {
            $gourl == '';
        }
        if($gourl=='-1')
        {
           $gourl = "javascript:history.go(-1);";
        }
        if( $gourl != '' )
        {
            $jumpmsg = "<div class='ct2'><a href='{$gourl}'>如果你的浏览器没反应，请点击这里...</a></div>";
            $jstmp = "setTimeout('JumpUrl()', {$limittime});";
        } 
        tpl::$appname = 'system';
        tpl::assign('title', $title);
        tpl::assign('msg', $msg);
        tpl::assign('gourl', $gourl);
        tpl::assign('jumpmsg', $jumpmsg);
        tpl::assign('jstmp', $jstmp);
        tpl::display('cls_msgbox.tpl');
        exit();
    }
    
    
}