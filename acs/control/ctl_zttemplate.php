<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 星座专题模板管理
 * 后台数据管理
 * 控制器部分
 * @author mayi <mayi@ylmf.com>
 * @version $Id$
 */


class ctl_zttemplate extends common{

    // 自动验证设置
    protected $_submit_validate     =   array(
        'tpl_name'=>array('','notempty','名称必须！','all'),
        'tpl_filename'=>array('','notempty','模板文件名必须！','all'),
        'id'=>array('id','notempty','主键必须！','update'),
    );

    protected $_db_validate     =   array(
        'tpl_name'=>array('tpl_name','unique','已经存在！','all'),
    );
    // 自动填充设置
    protected $_auto     =   array(
        //'status'=>array('status','value','1','all'),
        //入表时间和更新时间放到构造函数中执行，因为此处不支持动态赋值
    );

    protected $_allowAction = array();//允许操作的方法列表

    public function __construct()
    {
        //$this->_auto['uid'] = array('uid', 'value', cls_access::$accctl->uid, 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['uptime'] = array('uptime', 'value', date("Y-m-d H:i:s"), 'insert');//属性赋予默认值无法动态计算；放到此处执行
//        $this->_auto['tpl_addtime'] = array('tpl_addtime', 'value', time(), 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['intdate'] = array('intdate', 'value', date("ymd"), 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['updatetime'] = array('updatetime', 'value', date("Y-m-d H:i:s"), 'update');//属性赋予默认值无法动态计算；放到此处执行

//tpl_id,tpl_name, tpl_struct, tpl_addtime

        $this->_dbfield=array(
            'mainKey'=>'tpl_id',
            'allTableField'=>array('tpl_id'=>'编号','tpl_name'=>'名称','tpl_filename'=>'模板文件名','tpl_struct'=>'结构示意','tpl_addtime'=>'添加时间'),
            'addTableField'=>array('tpl_name','tpl_filename','tpl_struct'),

            'editTableField'=>array('tpl_name','tpl_filename','tpl_struct','tpl_addtime'),

            'listTableField'=>array('tpl_id','tpl_name','tpl_filename','tpl_addtime'),

            'batchUpdateTableField'=>array('tpl_name','tpl_filename'),
            'batchDeleteTableField'=>array(
                'mainKey'=>'tpl_id',
            ),
            'tpl_id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            'tpl_name'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
                'search_extend'=>'like',
            ),
            'tpl_filename'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'tpl_struct'=>array(
                'element'=>array('e_name'=>'textarea','style'=>'width:600px;height:500px;'),


            ),
            'tpl_addtime'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),


        );


        parent::__construct();

        $this->table = 'zhuanti_template';

        //add edit delete batch_update
        $this->_allowAction = array(
            'add'=>array('title'=>'添加','type'=>'dialog','width'=>'700','height'=>'600'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
            '_extend'=>array(
                '?ct=zttemplate_column&ac=index'=>array('title'=>'查看列信息','type'=>'','width'=>'','height'=>'','paramto'=>'data_id','paramfrom'=>'tpl_id'),
                '?ct=zttemplate_column&ac=add'=>array('title'=>'添加列信息','type'=>'','width'=>'','height'=>'','paramto'=>'data_id','paramfrom'=>'tpl_id'),
            ),
        );

        tpl::assign('_allowAction',$this->_allowAction);
        

        tpl::assign('_submit_validate',$this->_submit_validate);

        tpl::assign('_dbfield',$this->_dbfield);


    }
}