<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 星座专题管理
 * 后台数据管理
 * 控制器部分
 * @author mayi <mayi@ylmf.com>
 * @version $Id$
 */

class ctl_zhuanti extends common
{
    // 自动验证设置
    protected $_submit_validate     =   array(
        'zt_name'=>array('','notempty','名称必须！','all'),
        'zt_seo_title'=>array('','notempty','标题必须！','all'),
        'tpl_id'=>array('','notempty','模板必须！','insert'),
        'zt_id'=>array('zt_id','notempty','主键必须！','update'),
    );

    //zt_id, tpl_id, zt_channel, zt_type, zt_name, zt_cover, zt_url, zt_remark, zt_open, zt_seo_title, zt_seo_keywords
    //, zt_seo_description, uid, zt_date, zt_uptime, zt_addtime, zt_order
    protected $_db_validate     =   array(
        'zt_url'=>array('zt_url','unique','地址已经存在！','insert'),
    );
    // 自动填充设置
    protected $_auto     =   array(
        'zt_open'=>array('zt_open','value','2','insert'),
        'zt_channel'=>array('zt_channel','value','1','insert'),
        //入表时间和更新时间放到构造函数中执行，因为此处不支持动态赋值
    );

    protected $_allowAction = array();//允许操作的方法列表


    //对应的菜单项分类，1：内涵图；2：视频；3：段子手；4：微博热帖。
    protected $types = array( 1=>'模板', 2=>'直链');
    protected $channels = array( 1=>'星座运程', 2=>'十二生肖', 3=>'周公解梦');
    protected $opens = array(1=>'关闭',2=>'开启');
    protected $_uploadFile = array(
        'zt_cover'=>array('name'=>'zt_cover','size'=>'','format'=>array('jpg','png','jpeg','gif','bmp'),'save_path'=>PATH_ROOT),
    );

    public function __construct()
    {
        $this->_auto['uid'] = array('uid', 'value', cls_access::$accctl->uid, 'insert');//属性赋予默认值无法动态计算；放到此处执行
        $this->_auto['zt_date'] = array('zt_date', 'value', date("Ymd"), 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //zt_id, tpl_id, zt_channel, zt_type, zt_name, zt_cover, zt_url, zt_remark, zt_open, zt_seo_title, zt_seo_keywords
        //, zt_seo_description, uid, zt_date, zt_uptime, zt_addtime, zt_order
        //获取模板列表
        $zttemplaterows = db::get_all("select tpl_id,tpl_name from zhuanti_template order by tpl_id;");
        if(!$zttemplaterows){
            cls_msgbox::show('温馨提示', '请先添加一个模板', '?ct=zttemplate&ac=add');
        }
        $zttemplates = array();
        foreach($zttemplaterows as $val){
            $zttemplates[$val['tpl_id']] = $val['tpl_name'];
        }
        $this->_dbfield=array(
            'mainKey'=>'zt_id',
            'allTableField'=>array('zt_id'=>'编号','tpl_id'=>'模板','zt_name'=>'名称','zt_type'=>'类型'
                ,'zt_channel'=>'频道','zt_cover'=>'封面图','zt_url'=>'地址','zt_remark'=>'备注','zt_open'=>'开启','zt_seo_title'=>'标题'
                ,'zt_seo_keywords'=>'关键字','zt_seo_description'=>'描述','uid'=>'管理员id','zt_date'=>'发布日期'
                ,'zt_uptime'=>'更新时间','zt_addtime'=>'添加时间','zt_order'=>'排序值，发布日越大越靠前'),
            'addTableField'=>array('tpl_id','zt_name','zt_type','zt_cover','zt_url','zt_remark','zt_open'
                ,'zt_seo_title','zt_seo_keywords','zt_seo_description','zt_date','zt_order'),

            'editTableField'=>array('zt_name','zt_type','zt_cover','zt_remark','zt_open'
            ,'zt_seo_title','zt_seo_keywords','zt_seo_description','zt_date','zt_order'),

            'listTableField'=>array('zt_id','tpl_id','zt_name','zt_type','zt_cover','zt_url','zt_open','zt_date'),

            'batchUpdateTableField'=>array('zt_name','zt_open'),
            'batchDeleteTableField'=>array(
                'mainKey'=>'zt_id',
            ),
            'zt_id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            'tpl_id'=>array(
                'element'=>array('e_name'=>'select','e_type'=>'text','datafrom'=>$zttemplates),
                'search'=>'1',
            ),
            'zt_channel'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->channels),
            ),
            'zt_type'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->types),
            ),
            'zt_name'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                //'element'=>array('e_name'=>'textarea','style'=>'width:600px;height:380px;'),
            ),
            'zt_cover'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'file','type'=>'image','src'=>''),
            ),
            'zt_url'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'zt_remark'=>array(
                'element'=>array('e_name'=>'textarea','style'=>'width:600px;height:380px;'),
            ),

            //zt_id, tpl_id, zt_channel, zt_type, zt_name, zt_cover, zt_url, zt_remark, zt_open, zt_seo_title, zt_seo_keywords
            //, zt_seo_description, uid, zt_date, zt_uptime, zt_addtime, zt_order
            'zt_open'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->opens),
            ),
            'zt_seo_title'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'zt_seo_keywords'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'zt_seo_description'=>array(
                'element'=>array('e_name'=>'textarea','style'=>'width:600px;height:380px;'),
            ),
            'zt_date'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'zt_order'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
        );


        parent::__construct();

        $this->table = 'zhuanti';

        //add edit delete batch_update
        $this->_allowAction = array(
            'add'=>array('title'=>'添加','width'=>'700','height'=>'700'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
            '_extend'=>array(
                '?ct=zhuanti_detail&ac=index'=>array('title'=>'查看内容','paramfrom'=>'zt_id','paramto'=>'data_id'),
                URL.'index.php?ct=zhuanti&ac=detail'=>array('title'=>'预览','type'=>'new','paramfrom'=>'zt_url','paramto'=>'url'),
            ),
        );

        tpl::assign('_allowAction',$this->_allowAction);
        

        tpl::assign('_submit_validate',$this->_submit_validate);

        tpl::assign('_dbfield',$this->_dbfield);
        //设置在页面显示的默认值
        tpl::assign('_addFieldAuto',array('zt_date'=>1111,'zt_sort'=>11));  //字段
        tpl::assign('arrAddFieldAuto',array('zt_date'=>date("Ymd"),'zt_sort'=>1));

    }

}