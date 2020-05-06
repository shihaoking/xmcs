<?php
if( !defined('CORE') ) exit('Request Error!');

class ctl_links extends common{
    // 自动验证设置
    protected $_submit_validate     =   array(
        'title'=>array('','notempty','链接名称必须！','all'),
        'url'=>array('','notempty','链接url必须','all'),
        'category'=>array('','notempty','链接所属类别必须','all'),
    );



    // 自动填充设置
    protected $_auto     =   array(
        'status'=>array('status','value','1','all'),
    );

    protected $_allowAction = array();//允许操作的方法列表
    protected $categorys = array();

    public function __construct()
    {
        $this->categorys = array('4'=>'友链',);

        $this->_dbfield=array(
            'mainKey'=>'id',
            'allTableField'=>array('id'=>'编号', 'title'=>'名称','tooltip'=>'提示','url'=>'跳转地址','category'=>'类别','status'=>'状态','displayorder'=>'显示顺序','description'=>'描述','add_time'=>'添加时间',),
            'addTableField'=>array('category','title','tooltip','url','displayorder','description','status'),
            'editTableField'=>array('category','title','tooltip','url','displayorder','description','status',),
           'listTableField'=>array('id','category','title','tooltip','displayorder','type','status'),

            //'batchUpdateTableField'=>array('title','down_count','up_count','comment_count'),
            //'batchUpdateTableField'=>array('displayorder','status'),
            'batchDeleteTableField'=>array( 'mainKey'=>'id'
            ),
            'id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            'category'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->categorys),
                'search'=>'1',
            ),
            'title'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
                'search_extend'=>'like',
            ),
            'tooltip'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'url'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'displayorder'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'description'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'status'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>array('1'=>'正常','11'=>'禁用',)),
                'search'=>'1',
            ),

        );

        parent::__construct();

        $this->table = 'links';

        //add edit delete batch_update
        $this->_allowAction = array(
            'add'=>array('title'=>'添加','type'=>'dialog','width'=>'700','height'=>'700'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
        );

        tpl::assign('_allowAction',$this->_allowAction);
        

        tpl::assign('_submit_validate',$this->_submit_validate);

        tpl::assign('_dbfield',$this->_dbfield);

    }

    public function delete(){

        $id = (int)req::item($this->_dbfield['mainKey'],0);
        if($id && $this->table){

            $r = db::query('delete from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1');
            if($r){

                cls_msgbox::show('系统提示','删除成功！','?ct='.$this->ct.'&amp;ac='.$this->listPage);
            }else{
                cls_msgbox::show('系统提示','删除失败！',-1);
            }
        }else{
            cls_msgbox::show('系统提示','参数错误！',-1);
        }
    }

    /**
     * 生成搞笑名站 搞笑视频  搞笑微博 的链接
     */
    public function makeSite(){
        $ret = self::set_site_links();
        if($ret){
            cls_msgbox::show('成功了！','生成成功！',-1);
        }else{
            cls_msgbox::show('未生成！','生成失败,请稍候再试！',-1);
        }
    }

    /**
     * 生成搞笑网站(内容页右侧链接) 的链接
     */
    public function makerightlinks(){

        $ret = self::set_right_links();
        if($ret){
            cls_msgbox::show('成功了！','生成成功！',-1);
        }else{
            cls_msgbox::show('未生成！','生成失败,请稍候再试！',-1);
        }
    }

    /**
     * 批量删除
     */
    public function batch_delete(){
        $ids    = req::item('ids', '');
        if(empty($ids))
        {
            cls_msgbox::show('对不起，出错了！', '你没有选择项目！', '-1');
        }
        if(!isset($this->_dbfield['batchDeleteTableField']) || empty($this->_dbfield['batchDeleteTableField']) || !$this->_dbfield['batchDeleteTableField']['mainKey'])
        {
            cls_msgbox::show('对不起，出错了！', '不允许该操作！', '-1');
        }

        /**$this->_dbfield['mainKey']
        $this->_dbfield['batchUpdateTableField'] = array(
        'mainKey'=>'id',
        'extend'=>array(
        'delete_file'=>array('upload_cover','cover'),
        'delete_extend_table'=>array(
        'gaoxiao_comment'=>array(
        'mainKey'=>'id',
        'unionKey'=>'data_id',
        ),
        'gaoxiao_hot_data'=>array(
        'mainKey'=>'id',
        'unionKey'=>'data_id',
        ),
        'gaoxiao_data_extend_image'=>array(
        'mainKey'=>'id',
        'unionKey'=>'data_id',
        'delete_file'=>array('image','cover'),
        ),
        ),
        ),
        )
         */
        $success   = $failure = 0;
        $arrDeleteFileFields = $arrDeleteExtendTables = array();

        foreach ($ids as $key => $id)
        {
            if($id && $this->_dbfield['mainKey']){
                $arrTemp = array();
                $arrTemp = db::get_one('select * from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1');
                if(empty($arrTemp)){
                    $failure++;
                    continue;
                }
                $strSql = '';
                $result = false;

                if($this->_dbfield['mainKey'] && $id)$strSql = 'delete from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1';
                $result =  db::query($strSql);
                if($result >= 0)
                {
                    $success++;

                }
                else
                {
                    $failure++;
                }
            }else{
                $failure++;
            }
            //var_dump($displayorders);exit();
        }
        $referurl   = empty($_SERVER['HTTP_REFERER']) ? '?ct='.$this->ct.'&amp;ac='.$this->listPage : $_SERVER['HTTP_REFERER'];
        // cls_msgbox::show('成功了！', '数据修改成功！', '?ct=video&ac=video_list&page_no='.$pagen);
        cls_msgbox::show('成功了！', "成功删除：{$success}条，失败:{$failure}条！", $referurl);
    }

    //更新采集资源的状态 最新采集的资源status为99 正常status为1
    public function updatestatus(){
        echo 'start<br />';
        if(db::query('update gaoxiao_data set `status`="1" where `status`="99" limit 1000')){
            echo 'success!';
        }else{
            echo 'fail!';
        }
        exit();
    }

    /***
     * 将搞笑网站(4)的链接信息保存到index/right.tpl
     * @return bool
     */
    protected function set_right_links()
    {
        $content = file_get_contents(CORE . '/../templates/template/index/right.tpl');

        if($content){
            $replace = '';
            $sql = "SELECT 	title, tooltip, url, category FROM links WHERE `STATUS` = 1 and category = 4 ORDER BY category, displayorder DESC, id DESC ";
            $query = db::query($sql);
            $rows    = db::fetch_all($query);
            if(!empty($rows)){
                foreach($rows as $key=>$val){
                    $replace.="\n\t".'<li style="width:100px;text-indent: 5px;"><a href="'.$val['url'].'" title="'.$val['tooltip'].'" target="_blank">'.$val['title'].'</a></li>';
                }

                if(preg_match('/(?<pre><div class="webUrlMd" style="width:274px;">\s+<div class="title">\s+<h3>搞笑网站<\/h3>\s+<\/div>\s+<div class="urlList">\s+<ul>)(\s+<li.+<\/li>){5,}/',$content,$result)){
                    $content = preg_replace('/(?<pre><div class="webUrlMd" style="width:274px;">\s+<div class="title">\s+<h3>搞笑网站<\/h3>\s+<\/div>\s+<div class="urlList">\s+<ul>)(\s+<li.+<\/li>){5,}/','$1'.$replace,$content);

                    return (bool)@file_put_contents(CORE . '/../templates/template/index/right.tpl', $content, LOCK_EX);
                }
            }
        }
        return false;
    }

    /***
     * 将搞笑名站(1) 搞笑视频(2)  搞笑微博(3) 的链接信息保存到index/site.tpl
     * @return bool
     */
    protected function set_site_links()
    {
        $content = file_get_contents(CORE . '/../templates/template/index/site.tpl');
        if($content){
            $replacemz = $replacesp = $replacewb = '';

            $sql = "SELECT 	title, tooltip, url, category FROM links WHERE `STATUS` = 1 and category in (1,2,3) ORDER BY category, displayorder DESC, id DESC ";
            $query = db::query($sql);
            $rows    = db::fetch_all($query);
            if(!empty($rows)){
                foreach($rows as $key=>$val){
                    switch($val['category']){
                        case '1':
                            $replacemz.="\n\t".'<li ><a href="'.$val['url'].'" title="'.$val['tooltip'].'" target="_blank">'.$val['title'].'</a></li>';
                            break;
                        case '2':
                            $replacesp.="\n\t".'<li ><a href="'.$val['url'].'" title="'.$val['tooltip'].'" target="_blank">'.$val['title'].'</a></li>';
                            break;
                        case '3':
                            $replacewb.="\n\t".'<li ><a href="'.$val['url'].'" title="'.$val['tooltip'].'" target="_blank">'.$val['title'].'</a></li>';
                            break;
                    }
                }
                $isChange = false;
                //搞笑名站
                if(preg_match('/(?<pre><div class="title">\s+<h3>搞笑名站<\/h3>\s+<\/div>\s+<div class="urlList">\s+<ul>)(\s+<li.+<\/li>){8,}/',$content,$result)){
                    $content = preg_replace('/(?<pre><div class="title">\s+<h3>搞笑名站<\/h3>\s+<\/div>\s+<div class="urlList">\s+<ul>)(\s+<li.+<\/li>){8,}/'
                        ,'$1'.$replacemz,$content);
                    $isChange = true;
                }
                //搞笑视频
                if(preg_match('/(?<pre><div class="title">\s+<h3>搞笑视频<\/h3>\s+<\/div>\s+<div class="urlList clearfix">\s+<ul>)(\s+<li.+<\/li>){8,}/',$content,$result)){
                    $content = preg_replace('/(?<pre><div class="title">\s+<h3>搞笑视频<\/h3>\s+<\/div>\s+<div class="urlList clearfix">\s+<ul>)(\s+<li.+<\/li>){8,}/'
                    ,'$1'.$replacesp,$content);
                    $isChange = true;
                }

                //搞笑微博
                if(preg_match('/(?<pre><div class="title">\s+<h3>搞笑微博<\/h3>\s+<\/div>\s+<div class="urlList clearfix">\s+<ul>)(\s+<li.+<\/li>){8,}/',$content,$result)){
                    $content = preg_replace('/(?<pre><div class="title">\s+<h3>搞笑微博<\/h3>\s+<\/div>\s+<div class="urlList clearfix">\s+<ul>)(\s+<li.+<\/li>){8,}/'
                    ,'$1'.$replacewb,$content);
                    $isChange = true;
                }
                if($isChange) return (bool)@file_put_contents(CORE . '/../templates/template/index/site.tpl', $content, LOCK_EX);
            }
        }
        return false;
    }
}