<?php
if( !defined('CORE') ) exit('Request Error!');

class ctl_ffsm_order extends common{
    // 自动验证设置
    protected $_submit_validate     =   array(
        'oid'=>array('','notempty','','all'),
        'id'=>array('id','notempty','主键必须！','update'),
    );

    protected $_db_validate     =   array(
       // 'title'=>array('title','unique','已经存在！','all','extend'=>array('cp','type')),
    );
	protected $_uploadFile = array(
        'img'=>array('name'=>'img','size'=>'','format'=>array('jpg','png','gif'),'save_path'=>PATH_ROOT),
    );
    // 自动填充设置
    protected $_auto     =   array(
        //'status'=>array('status','value','1','all'),
        //入表时间和更新时间放到构造函数中执行，因为此处不支持动态赋值
    );


    protected $_allowAction = array();//允许操作的方法列表


    //对应的菜单项分类，1：内涵图；2：视频；3：段子手；4：微博热帖。
	protected $paytype = array( 1=>'微信', 2=>'支付宝');
    protected $status = array(0=>'待付费',1=>'已付费');
	protected $type = array(1=>'事业财运', 2=>'八字合婚', 3=>'姓名分析', 4=>'姓名配对', 5=>'紫薇命盘', 6=>'八字综合', 7=>'姻缘测算', 8=>'八字精批', 9=>'2020爱情运', 10=>'PC端测算', 25=>'在线预约', 12=>'鼠年运程', 21=>'许愿点灯', 16=>'月老姻缘', 18=>'号码测算',23=>'在线起名',24=>'公司起名',20=>'预约起名');
	
	
    public function __construct()
    {
		$this->categorys = $type;
		
        $this->_auto['uid'] = array('uid', 'value', cls_access::$accctl->uid, 'insert');//属性赋予默认值无法动态计算；放到此处执行
        //$this->_auto['uptime'] = array('uptime', 'value', date("Y-m-d H:i:s"), 'insert');//属性赋予默认值无法动态计算；放到此处执行
        
        $this->_dbfield=array(
            'mainKey'=>'id',
            'allTableField'=>array('id'=>'编号','oid'=>'订单号','uid'=>'推广id','paytype'=>'支付体系','data'=>'订单内容','money'=>'金额','createtime'=>'订单时间','data.gender'=>'性别','data.time'=>'生辰','createtime_start'=>'订单开始时间','createtime_end'=>'订单结束时间','status'=>'支付状态','paytime'=>'支付时间','paytime_start'=>'支付开始时间','paytime_end'=>'支付结束时间','ip'=>'ip','des'=>'标题','type'=>'栏目','trade_status'=>'第三方返回值'),
            'addTableField'=>array('oid','data','money','type'),
			
            'editTableField'=>array('oid','paytype','data','money','status'),
           
            'listTableField'=>array('oid','uid','paytype','money','status','data.gender','data.time','createtime','des','type'),
			
            'batchUpdateTableField'=>array('paytype','money','status'),
            'batchDeleteTableField'=>array(
                'mainKey'=>'id',
            ),
             'id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'des'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
                'search_extend'=>'like',
            ),
            'oid'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
                //'search_extend'=>'like',
            ),
			'paytype'=>array(
                //'element'=>array('e_name'=>'input','e_type'=>'text', 'richtext'=>true),
				'element'=>array('e_name'=>'select','datafrom'=>$this->paytype),
                
            ),
			'data'=>array(
                'element'=>array('e_name'=>'textarea','style'=>'width:200px;height:60px;'),
            ),
			'money'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text')
            ),
			'createtime'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
				
            ),
			'createtime_start'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
				'search'=>'1',
            ),
			'createtime_end'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
				'search'=>'1',
            ),
			'status'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->status),
                'search'=>'1',
            ),
			'type'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->type),
                'search'=>'1',
            ),
            'paytime'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
				
            ),
			'paytime_start'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
				
            ),
			'paytime_end'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
				
            ),
			'ip'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'trade_status'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
        );


        parent::__construct();

        $this->table = 'ffsm_orders';

        //add edit delete batch_update
        $this->_allowAction = array(
            'add'=>array('title'=>'添加','type'=>'dialog','width'=>'700','height'=>'700'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
            /*'_extend'=>array(
                '?ct=commend_data&ac=add'=>array('title'=>'添加到推荐位','type'=>'dialog','width'=>'700','height'=>'700','param'=>'data_id'),
            ),*/
        );

        tpl::assign('_allowAction',$this->_allowAction);
        

        tpl::assign('_submit_validate',$this->_submit_validate);

        tpl::assign('_dbfield',$this->_dbfield);


    }

    public function ajax(){
        $id = request('id',0);
        $currentValue = request('currentValue','');
        $GLOBALS['_debug_hidden']=true;
        if($id){
            $category2s = db::fetch_all(db::query('select id,il_name as name from m_type where pid='.$id.' order by id'));
            $data = '';
            foreach($category2s as $v){
                if($currentValue==$v['id'])
                    $data .= '<option value="'.$v['id'].'" selected>'.$v['name']."</option>";
                else
                    $data .= '<option value="'.$v['id'].'">'.$v['name']."</option>";
            }
            if($data){
                $data = '<option value="">请选择</option>'.$data;
                exit(json_encode(array('str'=>'success','data'=>$data)));
            }else{
                exit(json_encode(array('str'=>'success','data'=>'<option value="">请选择</option>')));
            }
        }else{
            exit(json_encode(array('str'=>'参数错误了')));
        }
    }
	public function excel_out(){
     	 $createtime_start=req::item('createtime_start', '');	
     	 $createtime_end=req::item('createtime_end', '');	
     	 $status=req::item('status', '');	
     	 $type=req::item('type', '');	
		 if($createtime_start){
			 $temp_s=strtotime($createtime_start);
			 $sqls.=" and `createtime` >= '".$temp_s."'";
		 }
		 if($createtime_end){
			 $temp_e=strtotime($createtime_end)+86399;
			 $sqls.=" and `createtime` <= '".$temp_e."'";
		 }
		 if($status==1){
			 $sqls.=" and `status` = 0 ";
		 }
		 if($status==2){
			 $sqls.=" and `status` = 1 ";
		 }
		 if($type){
			 $sqls.=" and `type` = '".$type."'";
		 }
		 $sql="SELECT * FROM `ffsm_orders` WHERE 1=1".$sqls;
         $filename="03ky.xls";//先定义一个excel文件
         header("Content-Type: application/vnd.ms-execl");
         header("Content-Type: application/vnd.ms-excel; charset=utf-8");
         header("Content-Disposition: attachment; filename=$filename");
         header("Pragma: no-cache"); header("Expires: 0");
         //我们先在excel输出表头，当然这不是必须的
         echo iconv("utf-8", "gb2312", "订单号")."\t";
         echo iconv("utf-8", "gb2312", "项目")."\t";
     	 echo iconv("utf-8", "gb2312", "姓名")."\t";
     	 echo iconv("utf-8", "gb2312", "性别")."\t";
     	 echo iconv("utf-8", "gb2312", "出生日期")."\t";
     	 
     	 
         echo iconv("utf-8", "gb2312", "价格")."\t";
         echo iconv("utf-8", "gb2312", "创建订单时间")."\t";
         echo iconv("utf-8", "gb2312", "支付状态")."\n";

         db::query('set names utf8');
         
         $result=db::query($sql); //查询的表条件
         $rows=db::fetch_all($result);

     	$arrtype=array(1=>'事业财运', 2=>'八字合婚', 3=>'姓名分析', 4=>'姓名配对', 5=>'紫薇命盘', 6=>'八字综合', 7=>'姻缘测算', 8=>'八字精批', 9=>'2019爱情运', 10=>'PC端测算', 11=>'结婚运', 12=>'猪年运程', 21=>'许愿点灯', 16=>'月老姻缘', 18=>'号码测算',23=>'在线起名',24=>'公司起名',20=>'预约起名');
         foreach($rows as $key=>$row){
           echo iconv("utf-8", "gb2312", "[".$row['oid']."]")."\t";
           echo iconv("utf-8", "gb2312", $arrtype[$row['type']])."\t"; 
           $row['data']=json_decode(urldecode($row['data']),true);
           echo iconv("utf-8", "gb2312", $row['data']['xing'].$row['data']['username'].$row['data']['word'].$row['data']['malexing'].$row['data']['malename'].$row['data']['malename'].$row['data']['malename'])."\t";
            if( $row['data']['gender']=="1"){
             $gender="男";
           }else{
             $gender="女";
           }
          if($row['data']['h']==-1){
          	$row['data']['h']="未知";
          }
           echo iconv("utf-8", "gb2312", $gender)."\t";
           echo iconv("utf-8", "gb2312", $row['data']['y'].$row['data']['year']."-".$row['data']['m'].$row['data']['month']."-".$row['data']['d'].$row['data']['day']."时辰".$row['data']['h'].$row['data']['hour'])."\t";
           echo iconv("utf-8", "gb2312", $row['money'])."\t";
           echo iconv("utf-8", "gb2312", date("Y-m-d H:i:s",$row['createtime']))."\t";
           if($row['status']==1){
             $status="已支付";
           }else{
             $status="未支付";
           }
           echo iconv("utf-8", "gb2312", $status)."\n"; 
       }
    }
    public function delete(){
		
        $id = (int)req::item($this->_dbfield['mainKey'],0);
		
        if($id && $this->table){
            $arrdata = array();
            //$arrdata = db::get_one('select cover,upload_cover,content,type,content_length from `'.$this->table.'` where id='.$id.' limit 1');

            $r = db::query('delete from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1');
			
            if($r){
                //删除图片
                if($arrdata['type']==1){
                    $this->_deleteImage($arrdata['cover']);
                    $this->_deleteImage($arrdata['upload_cover']);
                    $this->_deleteImage($arrdata['content']);
                }
                
                cls_msgbox::show('系统提示','删除成功！','?ct='.$this->ct.'&amp;ac='.$this->listPage);
            }else{
                cls_msgbox::show('系统提示','删除失败！',-1);
            }
        }else{
            cls_msgbox::show('系统提示','参数错误！',-1);
        }
    }

    private function _deleteImage($image){
        if(is_array($image)){
            foreach($image as $v){
                $this->_deleteImage($v);
            }
        }elseif($image && file_exists(PATH_ROOT.$image)){
            @unlink(PATH_ROOT.$image);
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

       
        $success   = $failure = 0;
        $arrDeleteFileFields = $arrDeleteExtendTables = array();
        if(isset($this->_dbfield['batchDeleteTableField']['extend']) && $this->_dbfield['batchDeleteTableField']['extend']){
            foreach($this->_dbfield['batchDeleteTableField']['extend'] as $k=>$v){
                if($k=='delete_file' && $v)$arrDeleteFileFields = $v;
                if($k=='delete_extend_table' && $v)$arrDeleteExtendTables = $v;
            }
        }
        
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
                    if($arrDeleteFileFields){
                        foreach($arrDeleteFileFields as $strFileField){
                            if(isset($arrTemp[$strFileField]) && $arrTemp[$strFileField]){
                                @unlink(PATH_ROOT.$arrTemp[$strFileField]);
                                if(OPEN_DEBUG){
                                    file_put_contents(PATH_ROOT.'/admin.txt', 'unlink :'.PATH_ROOT.$arrTemp[$strFileField],FILE_APPEND);
                                }
                            }
                        }
                    }
                    /*
                    'xingzuo_data_extend_image'=>array(
                            'mainKey'=>'id',
                            'unionKey'=>'data_id',
                            'delete_file'=>array('image','cover'),
                        ),         
                     */
                    if($arrDeleteExtendTables){
                        foreach($arrDeleteExtendTables as $strTableName=>$arrTableInfo){
                            if($strTableName && isset($arrTemp[$arrTableInfo['mainKey']]) && $arrTemp[$arrTableInfo['mainKey']] && isset($arrTableInfo['unionKey']) && $arrTableInfo['unionKey']){
                                $arrItemInfoTemp = array();
                                if(isset($arrTableInfo['delete_file']) && $arrTableInfo['delete_file']){
                                    $arrItemInfoTemp = db::fetch_all(db::query('select `'.$arrTableInfo['unionKey'].'`,'.trim(implode(',', $arrTableInfo['delete_file']),',').' from `'.$strTableName.'` where `'.$arrTableInfo['unionKey'].'`="'.  addslashes($arrTemp[$arrTableInfo['mainKey']]).'"'));
                                }else{
                                    $arrItemInfoTemp = db::fetch_all(db::query('select `'.$arrTableInfo['unionKey'].'` from `'.$strTableName.'` where `'.$arrTableInfo['unionKey'].'`="'.  addslashes($arrTemp[$arrTableInfo['mainKey']]).'"'));
                                }
                                if($arrItemInfoTemp){
                                    if(isset($arrTableInfo['delete_file']) && $arrTableInfo['delete_file']){
                                        foreach($arrItemInfoTemp as $arrdeleteFiles){
                                            foreach($arrTableInfo['delete_file'] as $strdeletefield){
                                                if(isset($arrdeleteFiles[$strdeletefield]) && $arrdeleteFiles[$strdeletefield]){
                                                    $this->_deleteImage($arrdeleteFiles[$strdeletefield]);
                                                }
                                            }
                                        }
                                    }
                                    if( $arrTemp[$arrTableInfo['mainKey']] && $arrTableInfo['unionKey'] ){
                                       db::query('delete from `'.$strTableName.'` where `'.$arrTableInfo['unionKey'].'`='.$arrTemp[$arrTableInfo['mainKey']].' limit '.(int)count($arrItemInfoTemp)); 
                                    }
                                }
                                
                            }
                        }
                    }
                    
                     //是否需要清理缓存
                    if(isset($this->_updateCache) && !empty($this->_updateCache)){
                        foreach($this->_updateCache as $arrItem){
                            if(isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])){
                                $strCacehKeyTemp = '';
                                foreach ($arrTemp as $strField=>$strFieldValue){
                                    $strCacehKeyTemp = str_ireplace('{{'.$strField.'}}', $arrTemp[$strField], $arrItem['key']);
                                }
                                if($strCacehKeyTemp){
                                    cache::del($arrItem['prefix'], $strCacehKeyTemp);
                                    cache::set($arrItem['prefix'], $strCacehKeyTemp,null);
                                }
                            }
                        }
                    }

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
        if(db::query('update news_data set `status`="1" where `status`="99" limit 1000')){
            echo 'success!';
        }else{
            echo 'fail!';
        }
        exit();
    }

    public function statistics(){
        $this->_dbfield=array(
            'mainKey'=>'category',
            'allTableField'=>array('total'=>'数量','status'=>'状态','start_date'=>'开始日期','end_date'=>'结束日期'),
            'listTableField'=>array('total'),
            'addTableField'=>array(),
            'editTableField'=>array(),
            'batchUpdateTableField'=>array(),
            'batchDeleteTableField'=>array(),
            'start_date'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text','class'=>'s','jstype'=>'cal'),
                'search'=>'1',
                'search_extend'=>array('direct'=>'>='),
            ),
            'end_date'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text','class'=>'s','jstype'=>'cal'),
                'search'=>'1',
                'search_extend'=>array('direct'=>'<='),
            )
        );
        tpl::assign('_allowAction',array());
        tpl::assign('_dbfield',$this->_dbfield);
        /**接收搜索值***/
        $where = '';
        $where_arr = array();
        $config['url_prefix'] = "?ct=".$this->ct."&ac=".$this->ac;
        foreach($this->_dbfield as $k=>$v){
            if(isset($v['search']) && $v['search']==1){
                $temp = '';
                $temp = 'search'.$k;
                $temp = req::item($k,'');

                tpl::assign('search'.$k,$temp);
//                SELECT tid,COUNT(*) FROM xingzuo_data WHERE uptime>='2015-09-15 0:00:00' AND uptime<='2015-09-15 23:59:59' GROUP BY tid
                if(!empty($temp)){
                    if(isset($v['search_extend']) && $v['search_extend']=='like'){
                        $where_arr[] = "`".$k."` like '%".$temp."%'";
                    }elseif(isset($v['search_extend']) && $v['search_extend']['direct']){
                        if($k=='start_date' ) {
                            $where_arr[] = "`uptime`".$v['search_extend']['direct']."'".date('Y-m-d', strtotime($temp))." 0:00:00'";
                        }elseif($k=='end_date'){
                            $where_arr[] = "`uptime`".$v['search_extend']['direct']."'".date('Y-m-d', strtotime($temp))." 23:59:59'";
                        }else {
                            $where_arr[] = "`" . $k . "`" . $v['search_extend']['direct'] . "'" . $temp . "'";
                        }
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
        $where = ' ';
        if(!empty($where_arr)) {
            $where .= ' where '.implode(' and ', $where_arr);
        }
        else{
            //默认设成当天的
            $where .= " where `uptime`>='".date('Y-m-d')." 0:00:00' and `uptime`<='".date('Y-m-d')." 23:59:59' ";
            $searchdate = date('Y-m-d');
            $config['url_prefix'] .='&start_date='.$searchdate.'&end_date='.$searchdate;
        }
        $sql = 'SELECT STR_TO_DATE(uptime, \'%Y-%m-%d\') as statdate,COUNT(*) as total FROM news_data '.$where.' GROUP BY STR_TO_DATE(uptime, \'%Y-%m-%d\');';
        $size = $config['page_size'] = 10; //每页显示多少
        $config['current_page'] = req::item('page_no'); //接收页码
        empty($config['current_page']) && $config['current_page'] = 1;
        tpl::assign('current_page',$config['current_page']);

        $config['total_rs'] = 1; //总记录数
        $recSum = 1; //总记录数

        $pages  = util::pagination($config); //取得分页信息
        tpl::assign('pages',$pages);

        $query = db::query($sql);
        $rows    = db::fetch_all($query);
        if(empty($rows)){
            echo '<!--';
            var_dump($sql);
            echo '-->';
        }

        $data_list = array();
        $totalarticle = 0;
        if(is_array($rows)) {
            foreach ($rows as $row) {
                $data_list[] = array('typename' => '十二星座', 'statdate' => $row['statdate'], 'total' => $row['total']);
                $totalarticle += $row['total'];
            }
        }

        //周公解梦
        $sql = 'SELECT STR_TO_DATE(uptime, \'%Y-%m-%d\') as statdate,COUNT(*) as total FROM zgjm_data '.$where.' and laiyuan=\'\' GROUP BY STR_TO_DATE(uptime, \'%Y-%m-%d\');';

        $query = db::query($sql);
        $rows    = db::fetch_all($query);
        if(empty($rows)){
            echo '<!--';
            var_dump($sql);
            echo '-->';
        }

        if(is_array($rows)) {
            foreach ($rows as $row){
                $data_list[] = array('typename' => '周公解梦', 'statdate' => $row['statdate'], 'total' => $row['total']);
                $totalarticle += $row['total'];
            }
        }

        //十二生肖
        $sql = 'SELECT STR_TO_DATE(uptime, \'%Y-%m-%d\') as statdate,COUNT(*) as total FROM shengxiao_data '.$where.' GROUP BY STR_TO_DATE(uptime, \'%Y-%m-%d\');';

        $query = db::query($sql);
        $rows    = db::fetch_all($query);
        if(empty($rows)){
            echo '<!--';
            var_dump($sql);
            echo '-->';
        }
        if(is_array($rows)){
            foreach($rows as $row){
                $data_list[] = array('typename'=>'十二生肖','statdate'=>$row['statdate'],'total'=>$row['total']);
                $totalarticle += $row['total'];
            }
        }

        tpl::assign('data_list',$data_list);
        tpl::assign('totalarticle',$totalarticle);
        $articlesum = 0;
        foreach($rows as $v){
            $articlesum += $v['total'];
        }
        tpl::assign('articlesum',$articlesum);

        //tpl::assign('arrData',db::fetch_all(db::query('select * from qz_country order by sort asc')));
        if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl')){
            //var_dump($this->ct.'.'.$this->ac.'.tpl');exit();
            tpl::display($this->ct.'.'.$this->ac.'.tpl');
        }else{
            exit('no tpl file');
        }
    }

}

