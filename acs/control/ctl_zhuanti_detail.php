<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 星座专题详情管理
 * 后台数据管理
 * 控制器部分
 * @author mayi <mayi@ylmf.com>
 * @version $Id$
 */

class ctl_zhuanti_detail extends common{

    // 自动验证设置
    protected $_submit_validate     =   array(
//        'zt_name'=>array('','notempty','名称必须！','all'),
//        'zt_seo_title'=>array('','notempty','标题必须！','all'),
//        'tpl_id'=>array('','notempty','模板必须！','insert'),
        'zt_id'=>array('zt_id','notempty','专题必须！','insert'),
        'det_id'=>array('zt_id','notempty','主键必须！','update'),
    );

    //zt_id, tpl_id, zt_channel, zt_type, zt_name, zt_cover, zt_url, zt_remark, zt_open, zt_seo_title, zt_seo_keywords
    //, zt_seo_description, uid, zt_date, zt_uptime, zt_addtime, zt_order
    protected $_db_validate     =   array(
//        'title'=>array('title','unique','已经存在！','all','extend'=>array('cp','type')),
    );
    // 自动填充设置
    protected $_auto     =   array(
        'zt_open'=>array('zt_open','value','2','insert'),
        //入表时间和更新时间放到构造函数中执行，因为此处不支持动态赋值
    );
    protected $opens = array(1=>'关闭',2=>'开启');
    protected $_allowAction = array();//允许操作的方法列表


    //对应的菜单项分类，1：内涵图；2：视频；3：段子手；4：微博热帖。
    protected $types = array( 1=>'模板', 2=>'直链');
    protected $channels = array( 1=>'星座运程', 2=>'十二生肖', 3=>'周公解梦');
    protected $_uploadFile = array(
        'det_smallimg'=>array('name'=>'det_smallimg','size'=>'','format'=>array('jpg','png','jpeg','gif','bmp'),'save_path'=>PATH_ROOT),
        'det_bigimg'=>array('name'=>'det_bigimg','size'=>'','format'=>array('jpg','png','jpeg','gif','bmp'),'save_path'=>PATH_ROOT),
    );

    public function __construct()
    {
//        $this->_auto['uid'] = array('uid', 'value', cls_access::$accctl->uid, 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //获取专题信息
        $zt_id = req::item("data_id",0);
        if($zt_id<=0){
            cls_msgbox::show('温馨提示', '请先添加专题', '?ct=zhuanti&ac=add');
        }
        $ztrows = db::get_all("select zt_id,zt_name from zhuanti where zt_id={$zt_id} order by zt_id;");
        if(!$ztrows){
            cls_msgbox::show('温馨提示', '查不到专题信息');
        }
        $zts = array();
        foreach($ztrows as $val){
            $zts[$val['zt_id']] = $val['zt_name'];
        }
        //det_id, zt_id, tplc_id, det_title, det_url, det_mediaurl, det_smallimage,
        //det_bigimage, det_descript, det_date, det_open, det_addtime
        $this->_dbfield=array(
            'mainKey'=>'det_id',
            'allTableField'=>array('det_id'=>'编号','zt_id'=>'专题名称','tplc_id'=>'模板列','det_title'=>'标题'
            ,'det_url'=>'跳转地址','det_mediaurl'=>'媒体播放地址','det_smallimg'=>'小图','det_bigimg'=>'大图'
            ,'det_descript'=>'描述','det_date'=>'日期','det_open'=>'开启','det_addtime'=>'添加时间'),
            //另设
            'addTableField'=>array('zt_id','tplc_id','det_title','det_url','det_mediaurl','det_smallimg','det_bigimg'
            ,'det_descript','det_date','det_open'),
            //另设
            'editTableField'=>array(),
//            'zt_name','zt_type','zt_cover','zt_url','zt_remark','zt_open'
//        ,'zt_seo_title','zt_seo_keywords','zt_seo_description','zt_date','zt_order'

            'listTableField'=>array('det_id','zt_id','tplc_id','det_title','det_url','det_smallimg','det_open','det_addtime'),

            'batchUpdateTableField'=>array('det_title','det_open'),
            'batchDeleteTableField'=>array(
                'mainKey'=>'det_id',
            ),
            'det_id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            'zt_id'=>array(
                'element'=>array('e_name'=>'select','e_type'=>'text','datafrom'=>$zts),
            ),
            'tplc_id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            'det_title'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'det_url'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'det_smallimg'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'file','type'=>'image','src'=>''),
            ),
            'det_open'=>array(
                'element'=>array('e_name'=>'select','e_type'=>'text','datafrom'=>$this->opens),
            ),
        );


        parent::__construct();

        $this->table = 'zhuanti_detail';

        //add edit delete batch_update
        $this->_allowAction = array(
//            'add'=>array('title'=>'添加','type'=>'dialog','width'=>'700','height'=>'700'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
//            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
            /*'_extend'=>array(
                '?ct=commend_data&ac=add'=>array('title'=>'添加到推荐位','type'=>'dialog','width'=>'700','height'=>'700','param'=>'data_id'),
            ),*/
        );

        tpl::assign('_allowAction',$this->_allowAction);
        

        tpl::assign('_submit_validate',$this->_submit_validate);

        tpl::assign('_dbfield',$this->_dbfield);
        //设置在页面显示的默认值
        tpl::assign('_addFieldAuto',array('zt_date'=>1111,'zt_sort'=>11));  //字段
        tpl::assign('arrAddFieldAuto',array('zt_date'=>date("Ymd"),'zt_sort'=>1));

    }

    public function index(){

        $zt_id = req::item('data_id',0);
        if($zt_id<=0){
            cls_msgbox::show('系统提示','专题id缺少!',-1);
            exit();
        }
        tpl::assign('data_id',$zt_id);
        /**接收搜索值***/
        $where = '';
        $where_arr = array('zt_id = '.$zt_id);
        $config['url_prefix'] = "?ct=".$this->ct."&ac=".$this->ac."&data_id=".$zt_id;
        foreach($this->_dbfield as $k=>$v){
            if(isset($v['search']) && $v['search']==1){
                $temp = '';
                $temp = 'search'.$k;
                $temp = req::item($k,'');

                tpl::assign('search'.$k,$temp);

                if(!empty($temp)){
                    if(isset($v['search_extend']) && $v['search_extend']=='like'){
                        $where_arr[] = "`".$k."` like '%".$temp."%'";
                    }elseif(isset($v['search_extend']) && $v['search_extend']['direct']){
                        $where_arr[] = "`".$k."`".$v['search_extend']['direct']."'".$temp."'";
                    }else{
                        $where_arr[] = "`".$k."` = '".$temp."'";
                    }
                    //将查询关键字添加到页码后面
                    $config['url_prefix'] .='&'.$k.'='.$temp;
                }
            }
        }

        //exit();

        /**************/

        if(!empty($where_arr)) $where = ' where '.implode(' and ', $where_arr);
        $size = $config['page_size'] = 10; //每页显示多少
        $config['current_page'] = req::item('page_no'); //接收页码
        empty($config['current_page']) && $config['current_page'] = 1;
        tpl::assign('current_page',$config['current_page']);

        $sql1 = "SELECT count(".$this->_dbfield['mainKey'].") as total FROM `".$this->table."`".$where;
        $rsid = db::fetch_one(db::query($sql1));

        if($rsid['total']==0){
            //还没有添加内容，转向添加内容页。
            self::add();
            exit;
        }

        $config['total_rs'] = $rsid['total']; //总记录数

        $pages  = util::pagination($config); //取得分页信息
        tpl::assign('pages',$pages);

        $offset = ($config['current_page'] - 1) * $size;
        $sql2 = "SELECT det_id,(select zt_name from zhuanti where zt_id=zhuanti_detail.zt_id) as zt_id
          ,(select tplc_name from zhuanti_template_column where tplc_id = zhuanti_detail.tplc_id) as tplc_id
          ,det_title,det_url,det_smallimg,det_open,det_addtime FROM `".$this->table."` ".$where." order by ".$this->_dbfield['mainKey']." desc LIMIT {$offset},{$size}";
        $query = db::query($sql2);
        $rows    = db::fetch_all($query);
        if(empty($rows)){
            echo '<!--';
            var_dump($sql2);
            echo '-->';
        }
        tpl::assign('data_list',$rows);

        //tpl::assign('arrData',db::fetch_all(db::query('select * from qz_country order by sort asc')));
        if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl')){
            //var_dump($this->ct.'.'.$this->ac.'.tpl');exit();
            tpl::display($this->ct.'.'.$this->ac.'.tpl');
        }else{
            exit('no tpl file');
        }

    }

    public function add(){
        $zt_id = req::item('data_id', 0);
        if ($zt_id <= 0) {
            cls_msgbox::show('系统提示', '专题id缺少!', -1);
            exit();
        }
        tpl::assign('zt_id',$zt_id);
        //根据专题id获取模板列信息
        $row = db::get_all("SELECT zt_id,zt_name,ztc.* FROM zhuanti z LEFT JOIN zhuanti_template_column ztc
              ON z.tpl_id = ztc.tpl_id WHERE zt_id = {$zt_id};");
        if(!$row || !is_array($row)){
            cls_msgbox::show('系统提示', '专题id不正确!', -1);
            exit();
        }

        if(request('dosubmit',''))
        {
            $info=req::$posts;
//            echo 'postcount='.count($row).'-----------------filepostcount='.req::$files;
//            var_dump(req::$files);die;
                //将数据按照tplc_id放置，之后根据tplc_id来验证所需数据是否均已提供
            $tplcinfos = array();
            foreach($row as $val){
//                tplc_havetitle, tplc_haveurl, tplc_havemediaurl, tplc_havesmallimg, tplc_havebigimg,
//	tplc_havedescript, tplc_havedate
                if($val['tplc_havetitle']==1){
                    $tplcinfos[$val['tplc_id']]['det_title']=1;
                }
                if($val['tplc_haveurl']==1){
                    $tplcinfos[$val['tplc_id']]['det_url']=1;
                }

                if($val['tplc_havemediaurl']==1){
                    $tplcinfos[$val['tplc_id']]['det_mediaurl']=1;
                }

                if($val['tplc_havesmallimg']==1){
                    $tplcinfos[$val['tplc_id']]['det_smallimg']=1;
                }

                if($val['tplc_havebigimg']==1){
                    $tplcinfos[$val['tplc_id']]['det_bigimg']=1;
                }

                if($val['tplc_havedescript']==1){
                    $tplcinfos[$val['tplc_id']]['det_descript']=1;
                }

                if($val['tplc_havedate']==1){
                    $tplcinfos[$val['tplc_id']]['det_date']=1;
                }

//                $tplcinfos[$val['tplc_id']] = array('det_title'=>$val['tplc_havetitle'],'det_url'=>$val['tplc_haveurl']
//                    ,'det_mediaurl'=>$val['tplc_havemediaurl'],'det_smallimg'=>$val['tplc_havesmallimg']
//                    ,'det_bigimg'=>$val['tplc_havebigimg'],'det_descript'=>$val['tplc_havedescript'],'det_date'=>$val['tplc_havedate']);
            }



            //逐一验证数据，并处理提交的数据，之后拼成sql
            $insertdatas = array();
            foreach($info['tplc_id'] as $key=>$val){
                if(!isset($tplcinfos[$val])){
                    cls_msgbox::show('系统提示','参数不匹配!',-1);
                    exit();
                }
                $recorddata = array();
                foreach($tplcinfos[$val] as $colkey => $colval){
                    if($colval==1 && isset($info[$colkey][$val]) && !empty($info[$colkey][$val])){
                            //文字类内容直接记录
                            $recorddata[$colkey] = $info[$colkey][$val];
                    }elseif($colval==1 && isset(req::$files[$colkey.'_'.$val]['tmp_name']) && !empty(req::$files[$colkey.'_'.$val]['tmp_name'])) {
                        //图片处理
                        $recorddata[$colkey] = $this->update_image(req::$files[$colkey.'_'.$val],$this->_uploadFile[$colkey],$colkey,date("z").rand(1,1000000));
                    }else{
                        cls_msgbox::show('系统提示',$colkey.'参数提供不全!',-1);
                        exit();
                    }
                }
                if(count($recorddata)>=1){
                    $recorddata['zt_id'] = $zt_id;
                    $recorddata['tplc_id'] = $val;
                    $recorddata['det_open'] = $info['det_open'][$val];
                    $insertdatas[] = $recorddata;
                }
            }
            //验证完后再入表，防止有部分数据不通过验证时，确有部分数据入表了
            if(count($insertdatas)){
                $succ = true;
                foreach($insertdatas as $val){
                    $insertid=db::insert($this->table,$val);
                    if(!$insertid){
                        $succ= false;
                    }
                }
                //已全部入表
                if($succ){
                    cls_msgbox::show('系统提示', '添加成功!', '?ct='.$this->ct.'&ac=index&data_id='.$zt_id);
                }else{
                    cls_msgbox::show('系统提示', '部分添加成功，请通过编辑修改数据并提交!', '?ct='.$this->ct.'&ac=index&data_id='.$zt_id);
                }
            }
            else{
                cls_msgbox::show('系统提示', '未获取到要添加的数据!', '?ct='.$this->ct.'&ac=index&data_id='.$zt_id);
            }

        }else{
            tpl::assign('data_list',$row);
        }
        echo '<!--';var_dump(req::$forms);echo '-->';
//var_dump($row);
        //tpl::assign('arrData',db::fetch_all(db::query('select * from qz_country order by sort asc')));
        if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.add.tpl')){
            tpl::display($this->ct.'.add.tpl');
        }else{
            exit('no tpl file');
        }
    }



    public function edit()
    {

        $zt_id = req::item('data_id', 0);
        if ($zt_id <= 0) {
            cls_msgbox::show('系统提示', '专题id缺少!', -1);
            exit();
        }
        tpl::assign('zt_id',$zt_id);
        //根据专题id获取模板列信息
        $row = db::get_all("SELECT zt_id,zt_name,ztc.* FROM zhuanti z LEFT JOIN zhuanti_template_column ztc
              ON z.tpl_id = ztc.tpl_id WHERE zt_id = {$zt_id};");
        if(!$row || !is_array($row)){
            cls_msgbox::show('系统提示', '专题id不正确!', -1);
            exit();
        }
        //根据专题id获取专题详细内容，然后按tplc_id组织，方便使用
        //det_id, zt_id, tplc_id, det_title, det_url, det_mediaurl, det_smallimg, det_bigimg, det_descript, det_date, det_open, det_addtime
        $ztdetailRows= db::get_all("SELECT * FROM zhuanti_detail WHERE zt_id={$zt_id} order by tplc_id;");
        if(!$row || !is_array($row)){
            cls_msgbox::show('系统提示', '根据专题id无法找到详细信息!', -1);
            exit();
        }
        //按照tplc_id重新组织，方便按照tplc_id直接定位数据
        $ztdetails = array();
        foreach($ztdetailRows as $val){
            $ztdetails[$val['tplc_id']] = array('det_id'=>$val['det_id'],'det_title'=>$val['det_title'],'det_url'=>$val['det_url']
                ,'det_mediaurl'=>$val['det_mediaurl'],'det_smallimg'=>$val['det_smallimg'],'det_bigimg'=>$val['det_bigimg']
                ,'det_descript'=>$val['det_descript'],'det_date'=>$val['det_date'],'det_open'=>$val['det_open']);
        }

        if (request('dosubmit', '')) {
            $info = req::$posts;

            //将数据按照tplc_id放置，之后根据tplc_id来验证所需数据是否均已提供
            $tplcinfos = array();
            foreach($row as $val){
//                tplc_havetitle, tplc_haveurl, tplc_havemediaurl, tplc_havesmallimg, tplc_havebigimg,
//	tplc_havedescript, tplc_havedate
                if($val['tplc_havetitle']==1){
                    $tplcinfos[$val['tplc_id']]['det_title']=1;
                }
                if($val['tplc_haveurl']==1){
                    $tplcinfos[$val['tplc_id']]['det_url']=1;
                }

                if($val['tplc_havemediaurl']==1){
                    $tplcinfos[$val['tplc_id']]['det_mediaurl']=1;
                }

                if($val['tplc_havesmallimg']==1){
                    $tplcinfos[$val['tplc_id']]['det_smallimg']=1;
                }

                if($val['tplc_havebigimg']==1){
                    $tplcinfos[$val['tplc_id']]['det_bigimg']=1;
                }

                if($val['tplc_havedescript']==1){
                    $tplcinfos[$val['tplc_id']]['det_descript']=1;
                }

                if($val['tplc_havedate']==1){
                    $tplcinfos[$val['tplc_id']]['det_date']=1;
                }

//                $tplcinfos[$val['tplc_id']] = array('det_title'=>$val['tplc_havetitle'],'det_url'=>$val['tplc_haveurl']
//                    ,'det_mediaurl'=>$val['tplc_havemediaurl'],'det_smallimg'=>$val['tplc_havesmallimg']
//                    ,'det_bigimg'=>$val['tplc_havebigimg'],'det_descript'=>$val['tplc_havedescript'],'det_date'=>$val['tplc_havedate']);
            }

            //逐一验证数据，并处理提交的数据（与旧数据比较不同的要进行记录，之后update）
            $updatas = array();
            foreach($info['tplc_id'] as $key=>$val){
                if(!isset($tplcinfos[$val])){
                    cls_msgbox::show('系统提示','参数不匹配!',-1);
                    exit();
                }
                $recorddata = array();
                foreach($tplcinfos[$val] as $colkey => $colval){
                    if($colval==1 && isset($info[$colkey][$val]) && !empty($info[$colkey][$val])){
                        //文字类内容,比较，如有变化则记录需要更新
                        if($info[$colkey][$val]!=$ztdetails[$val][$colkey]) $recorddata[$colkey] = $info[$colkey][$val];
                    }elseif($colval==1 && isset(req::$files[$colkey.'_'.$val]['tmp_name']) && !empty(req::$files[$colkey.'_'.$val]['tmp_name'])) {
                        //图片处理,图片则如果有新上传
                        $recorddata[$colkey] = $this->update_image(req::$files[$colkey.'_'.$val],$this->_uploadFile[$colkey],$colkey,date("z").rand(1,1000000));
                    }elseif($colval==1 && ($colkey=='det_smallimg' || $colkey=='det_bigimg' ) && !empty($ztdetails[$val][$colkey])) {
                        //如果是必须上传的图片，但是原有数据已经存在图片的话，忽略
                    }else{
                        cls_msgbox::show('系统提示','参数提供不全!',-1);
                        exit();
                    }
                }

                if($ztdetails[$val]['det_open']!=$info['det_open'][$val]){
                    $recorddata['det_open'] = $info['det_open'][$val];
                }
                if(count($recorddata)>=1){
                    if($info['det_id'][$val]>=1)
                        $recorddata['det_id'] = $info['det_id'][$val];//更新的记录id
                    else {
                        $recorddata['zt_id'] = $zt_id;
                        $recorddata['tplc_id'] = $val;
                    }
                    $updatas[] = $recorddata;
                }
            }
            //验证完后再入表，防止有部分数据不通过验证时，确有部分数据入表了
            if(count($updatas)) {
                $succ = true;
                foreach ($updatas as $val) {
                    if($val['det_id']<=0){
                        //可能模板发生变动，需要新增记录
                        $result = db::insert($this->table, $val);
                    }else {
                        $result = db::update($this->table, $val, array("`" . $this->_dbfield['mainKey'] . "`='{$val[$this->_dbfield['mainKey']]}'"));
                    }
                    if (!$result) {
                        $succ = false;
                    }
                }
                //已全部入表
                if ($succ) {
                    cls_msgbox::show('系统提示', '成功修改专题id为:' . $zt_id . '专题的信息!', '?ct=' . $this->ct . '&ac=index&data_id=' . $zt_id);
                } else {
                    cls_msgbox::show('系统提示', '部分修改专题成功，请通过编辑重新修改数据!', '?ct=' . $this->ct . '&ac=index&data_id=' . $zt_id);
                }
            }else{
                cls_msgbox::show('系统提示', '未检测到需要修改的内容!', '?ct=' . $this->ct . '&ac=index&data_id=' . $zt_id);
            }

        } else {

            tpl::assign('data_template',$row);
            tpl::assign('data', $ztdetails);


            if (file_exists(PATH_ROOT . '/templates/template/admin/' . $this->ct . '.edit.tpl')) {

                tpl::display($this->ct . '.edit.tpl');
            } else {
                exit('no tpl file');
            }
        }
    }


}