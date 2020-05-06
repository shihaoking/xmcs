<?php
/**
 * 公共类
 * Created by PhpStorm.
 * User: linbo
 * Date: 14-5-28
 * Time: 下午2:47
 */
if (!defined('CORE'))   exit('Request Error!');
class common
{
    public $intCurrentUid = 0;//当前用户id
    public $ct = 'index';//控制器
    public $ac = 'index'; //方法
    public $dosubmit = ''; //操作
    public $refer = ''; //来源页面
    public $table = ''; // 当前操作的数据表
    public $listPage = 'index';//列表页
    public $defaultPage = 'index';//默认页



    // 自动验证设置
    /*protected $_submit_validate     =   array(
        'data_id'=>array('','notempty','','all'),
        'commend_id'=>array('','notempty','','all'),
        'id'=>array('','notempty','主键必须！','update'),
    );*/

    /*protected $_db_validate     =   array(
        'content'=>array('content','unique','已经存在！','all','extend'=>array('data_id')),
    );*/
    // 自动填充设置
    /*protected $_auto     =   array(
        'status'=>array('status','value','1','all'),
        'start_date'=>array('start_date','value','1970-01-01','all'),
        'end_date'=>array('end_date','value','9999-01-01','all'),
    );*/

    /*protected $_uploadFile = array(
        'small_image'=>array('name'=>'small_image','size'=>'','format'=>array('jpg','png'),'save_path'=>PATH_ROOT),
        'big_image'=>array('name'=>'big_image','size'=>'','format'=>array('jpg','png'),'save_path'=>PATH_ROOT),
    );*/

    /*protected $_addFieldAuto = array(
        'data_id'=>array('var','request'),
        'commend_id'=>array('var','request'),
    );*/
    
    /**
     *$this->_updateCache = array(
             array('prefix'=>URL,'key'=>"get_hand_data{{commend_id}}"),
        );
     * @var type 
     */
    protected $_updateCache = array();

    function __construct(){
        $this->ct = req::$forms['ct'];
        $this->ac = req::$forms['ac'];
		//util::get_client_ip()!='127.0.0.1'?die:"";
        tpl::assign('ct',$this->ct);
        tpl::assign('ac',$this->ac);
        $this->dosubmit =  request('dosubmit');
        $this->refer = $_SERVER['HTTP_HOST']? $_SERVER['HTTP_HOST']:'?ct='.$this->ct.'&ac=index';

        //$this->table = 'qz_'.$this->ct;

        if(!file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl') && file_exists(PATH_ROOT.'/templates/template/admin/__common.'.$this->ac.'.tpl')){
            copy(PATH_ROOT.'/templates/template/admin/__common.'.$this->ac.'.tpl',PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl');
        }

        /*$this->_dbfield=array(
            'mainKey'=>'id',
            'allTableField'=>array('id'=>'编号','title'=>'标题','content'=>'内容','data_id'=>'笑话id','uname'=>'用户昵称','content_display'=>'显示内容','status'=>'状态','ip'=>'ip','ip_address'=>'地址','add_date'=>'添加日期',),
            'listTableField'=>array('id','data_id','content_display','status','ip','add_date'),
            'addTableField'=>array('content','status'),
            'editTableField'=>array('ip_address','status'),
            'batchUpdateTableField'=>array('ip_address','status',),
            'batchDeleteTableField'=>array(
                'mainKey'=>'id',
                'extend'=>array(
                    'delete_file'=>array('image','cover'),
                    'delete_extend_table'=>array(
                        'user'=>array(
                            'mainKey'=>'id',
                            'unionKey'=>'user_id',
                            'delete_file'=>array('image','cover'),
                        ),
                    ),
                ),
            ),
            //jstype  cal||int
            'title'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text','class'=>'m'),
                'search'=>'1',
                'search_extend'=>'like',
            ),
            'url'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text','class'=>'m'),
            ),
            'data_id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text','class'=>'s'),
                'search'=>'1',
            ),
            'content'=>array(
                'element'=>array('e_name'=>'textarea','style'=>'width:200px;height:60px;'),
            ),
            'start_date'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text','class'=>'s','jstype'=>'cal'),
                'search'=>'1',
                'search_extend'=>array('direct'=>'>='),
            ),
            'end_date'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text','class'=>'s','jstype'=>'cal'),
                'search'=>'1',
                'search_extend'=>array('direct'=>'<='),
            ),
            'status'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>array('1'=>'正常','-1'=>'禁用',)),
                'search'=>'1',
            ),
            'commend_id'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->commends),
                'search'=>'1',
            ),
            'small_image'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'file','type'=>'image','src'=>URL.'/'),
            ),
            'big_image'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'file','type'=>'image','src'=>URL.'/'),
            ),
            'soft_id'=>array(
                'element'=>array('e_name'=>'select','datafrom'=>$this->webpages),
                'search'=>'1',
            ),
        );*/

        /*$this->_allowAction = array(
            'add'=>array('title'=>'添加','type'=>'dialog','width'=>'700','height'=>'700'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
            'batch_delete'=>array('title'=>'批量修改','type'=>'href',),
            '_extend'=>array(
                '?ct=commend_data&ac=add'=>array('title'=>'添加到推荐位','type'=>'dialog','width'=>'700','height'=>'700','paramto'=>'commend_id','paramfrom'=>'id'),
                '?ct=commend_data&ac=index'=>array('title'=>'查看该推荐位','type'=>'dialog','width'=>'700','height'=>'700','paramto'=>'commend_id','paramfrom'=>'id'),
            ),
        );*/

        /*tpl::assign('_allowAction',$this->_allowAction);
        parent::__construct();
        $this->table = 'gaoxiao_comment';
        tpl::assign('_submit_validate',$this->_submit_validate);
        tpl::assign('_dbfield',$this->_dbfield);
        tpl::assign('_addFieldAuto',$this->_addFieldAuto);*/


    }



    public function index(){
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
			
              
                if(!empty($temp)  || strlen($temp)==1 ){
                    if(isset($v['search_extend']) && $v['search_extend']=='like'){
                        $where_arr[] = "`".$k."` like '%".$temp."%'";
                    }elseif(isset($v['search_extend']) && $v['search_extend']['direct']){
                        $where_arr[] = "`".$k."`".$v['search_extend']['direct']."'".$temp."'";
                    }else{
                    	if($k=="createtime_start"){
							$temp_s=strtotime($temp);
						
							$where_arr[] = "`createtime` >= '".$temp_s."'";
							$where_arr_og[] = "og.`createtime` >= '".$temp_s."'";
							
						}
						else if($k=="createtime_end"){
							$temp_s=strtotime($temp)+86399;
							
							$where_arr[] = "`createtime` <= '".$temp_s."'";
							$where_arr_og[] = "og.`createtime` <= '".$temp_s."'";
							
						}
						else if($k=="paytime_start"){
							$temp_s=strtotime($temp);
							
							$where_arr[] = "`paytime` >= '".$temp_s."'";
							$where_arr_og[] = "og.`paytime` >= '".$temp_s."'";
							
						}
						else if($k=="paytime_end"){
							$temp_s=strtotime($temp)+86399;
							
							$where_arr[] = "`paytime` <= '".$temp_s."'";
							$where_arr_og[] = "og.`paytime` <= '".$temp_s."'";
							
						}
						else{
							
							$where_arr[] = "`".$k."` = '".$temp."'";
							$where_arr_og[] = "og.`".$k."` = '".$temp."'";
							
						}
                    }
                    //将查询关键字添加到页码后面
                    $config['url_prefix'] .='&'.$k.'='.$temp;
                }
            }
        }

        //exit();

        /**************/

        if(!empty($where_arr)){ 
				$whereog = ' where '.implode(' and ', $where_arr_og);
				$where = ' where '.implode(' and ', $where_arr);	
		}
        $size = $config['page_size'] = 200; //每页显示多少
        $config['current_page'] = req::item('page_no'); //接收页码
        empty($config['current_page']) && $config['current_page'] = 1;
        tpl::assign('current_page',$config['current_page']);
		//cls_access::$accctl->uid;//当前用户uid
		tpl::assign('uid',cls_access::$accctl->uid);
		$uid_qx=cls_access::$cfg_groups;//当前用户权限
		//pools.admin.private.test.allow.fxdl
		//pools.admin.private.test.allow.fxdltxzh
		$fields = db::get_one("Select * From `users` where `uid`='".cls_access::$accctl->uid."' ");
        $groups = cls_access_cfg::get_acc_groups($fields['uid'], 'admin', $fields['groups']);
		if(in_array("edit", $groups['fxdltxzh']) || $groups=="*"){
			tpl::assign('uid_dkqx',1);//打款权限
		}
		if(($this->ct=="fxdltxzh" || $this->ct=="fxdl") && $groups!="*"){
			  
			  if($where!=""){
				  $where_uid=" and `uid`= '".cls_access::$accctl->uid."'";
				  $where_uidog=" and og.`uid`= '".cls_access::$accctl->uid."'";
			  }else{
				  $where_uid=" where `uid`= '".cls_access::$accctl->uid."'";
				  $where_uidog=" where og.`uid`= '".cls_access::$accctl->uid."'";
			  }
		  }
		if($groups == "*" && $this->ct=="fxdl"){
			if($where=="" && $where_uid==""){
				  $where_dlid=" where `uid`> '0'";
				  $where_dlidog=" where og.`uid`> '0'";
			  }else{
				  $where_dlid=" and `uid`> '0'";
				  $where_dlidog=" and og.`uid`> '0'";
			  }
		}
  if($this->table == "ffsm_orders"){
        $sql1 = "SELECT count(".$this->_dbfield['mainKey'].") as  total,sum(money) as money_all,sum(if(status > 0, money, 0)) as money_cj,sum(if(status > 0, 1, 0)) as sum_cj,sum(dl_money) as dl_money  FROM (SELECT * FROM  `".$this->table."`".$where.$where_uid.$where_dlid." GROUP BY  `oid`) AA";
        $rsid = db::fetch_one(db::query($sql1));
         $offset = ($config['current_page'] - 1) * $size;
        $sql2 = "SELECT *,max(og.status) as status FROM `".$this->table."` AS og LEFT JOIN `users` AS g ON g.uid = og.uid  ".$whereog.$where_uidog.$where_dlidog." GROUP BY  og.`oid` order by og.id  desc LIMIT {$offset},{$size}";
        $rsid['money_all']=round($rsid['money_all'],2);
        $rsid['money_cj']=round($rsid['money_cj'],2);
        tpl::assign('money_all',$rsid['money_all']); //总金额
        tpl::assign('money_cj',$rsid['money_cj']); //总金额
        tpl::assign('sum_total',$rsid['total']); //总记录数
        tpl::assign('sum_cj',$rsid['sum_cj']); //成交数
        tpl::assign('sum_wcj',$rsid['total']-$rsid['sum_cj']); //未成交数
        tpl::assign('money_wcj',$rsid['money_all']-$rsid['money_cj']); //未成交金额 
    	tpl::assign('money_fxdl',$rsid['dl_money']); //分销金额 

    
      }
      else if($this->table == "ffsm_dl_log"){
		$sql1 = "SELECT count(og.".$this->_dbfield['mainKey'].") as  total FROM `".$this->table."` AS og LEFT JOIN `ffsm_dl_txzh` AS g ON g.id = og.txzh_id ";
		$rsid = db::fetch_one(db::query($sql1));
		$offset = ($config['current_page'] - 1) * $size;
		$sql2 = "SELECT * FROM `".$this->table."` AS og LEFT JOIN `ffsm_dl_txzh` AS g ON g.id = og.txzh_id  order by og.".$this->_dbfield['mainKey']." desc LIMIT {$offset},{$size}";
	  }
      else{
		  
		  
        $sql1 = "SELECT count(".$this->_dbfield['mainKey'].") as total FROM `".$this->table."`".$where.$where_uid;
        $rsid = db::fetch_one(db::query($sql1));
         $offset = ($config['current_page'] - 1) * $size;
        $sql2 = "SELECT * FROM `".$this->table."`".$where.$where_uid." order by ".$this->_dbfield['mainKey']." desc LIMIT {$offset},{$size}";
      }
		$config['total_rs'] = $rsid['total']; //总记录数
        $pages  = util::pagination($config); //取得分页信息

        tpl::assign('pages',$pages);


        $query = db::query($sql2);
        $rows    = db::fetch_all($query);
        if(empty($rows)){
            echo '<!--';
            var_dump($sql2);
            echo '-->';
        }

        $rowss=array();
		foreach($rows as $key=>$row){
			$row['data']=json_decode(urldecode($row['data']),true);
			$rowss[]=$row;
		}
     // print_r($rowss);
        tpl::assign('data_list',$rowss);

        //tpl::assign('arrData',db::fetch_all(db::query('select * from qz_country order by sort asc')));
        if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl')){
            //var_dump($this->ct.'.'.$this->ac.'.tpl');exit();
            tpl::display($this->ct.'.'.$this->ac.'.tpl');
        }else{
            exit('no tpl file');
        }

    }
public function excel()
    {
  		$fields = db::get_one("Select * From `users` where `uid`='".cls_access::$accctl->uid."' ");
		tpl::assign('dl_syjf',$fields['dl_syjf']);
        if(request('dosubmit',''))
        {
            $info=req::$posts;
			
			
			if($info['shorttxt']==''){
				$info['shorttxt'] = strip_tags($info['content']);
				$info['shorttxt'] = mb_substr($info['shorttxt'],0,160,'utf-8');
			}
			

            //自动验证
            if(isset($this->_submit_validate) && $this->_submit_validate){
                foreach($this->_submit_validate as $field=>$vali){
                    if(!isset($info[$field]) || empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'insert') && $vali['1']=='notempty'){
                            cls_msgbox::show('系统提示',$vali['2']?$vali['2']:$this->_dbfield['allTableField'][$field].'必须!',-1);
                            exit();
                        }
                    }else{
                        //其他验证
                    }
                }
            }

            //db 验证
            if(isset($this->_db_validate) && $this->_db_validate){
                foreach($this->_db_validate as $field=>$vali){
                    if(isset($info[$field]) && !empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'insert') && $vali['1']=='unique'){
                            $arrTempData = array();
                            if(isset($vali['extend']) && $vali['extend']){
                                $arrtempWhere = array();
                                $arrtempWhere[] = '`'.$field.'`="'.$info[$field].'"';
                                foreach($vali['extend'] as $extendField){
                                    if(isset($info[$extendField]))$arrtempWhere[] = '`'.$extendField.'`="'.$info[$extendField].'"';
                                }
                                $strTempwhere = '';
                                if(!empty($arrtempWhere)) $strTempwhere = ' where '.implode(' and ', $arrtempWhere);
                                if($strTempwhere)$arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` '.$strTempwhere.' limit 1');
                            }else{
                                $arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` where `'.$field.'`="'.$info[$field].'" limit 1');
                            }

                            if($arrTempData){
                                cls_msgbox::show('系统提示',$vali['2'],-1);
                                exit();
                            }
                        }
                    }
                }
            }
            //auto
            if(isset($this->_auto) && $this->_auto){
                foreach($this->_auto as $field=>$vali){
                    if(!isset($info[$field]) || empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'insert')){
                            if($vali['1']=='value' && isset($vali['2'])){
                                $info[$field] = $vali['2'];
                            }elseif($vali['1']=='function' && isset($vali['2'])){
                                $info[$field] = $vali['2'];
                            }
                        }
                    }
                }
            }
			//print_r($info['dl_jf']);
			if($this->table=="ffsm_dl_txzh")
			{
				if($info['dl_jf']>$fields['dl_syjf'])
				{
					cls_msgbox::show('系统提示','您的剩余积分不足，请重新操作',-1);
					exit();
				}
				else{
					db::query("UPDATE `users` SET `dl_syjf` = `dl_syjf`-'".$info['dl_jf']."' WHERE `uid` = '".cls_access::$accctl->uid."' limit 1");
				}
			}

            $insertid=db::insert($this->table,$info);
            if($insertid)
            {
                //验证上传文件
                //req::$files['update_image']['tmp_name']
                if(isset($this->_uploadFile) && $this->_uploadFile){
                    foreach($this->_uploadFile as $field=>$arrItem){
                        if(isset(req::$files[$field]['tmp_name']) && !empty(req::$files[$field]['tmp_name'])){
                            $info[$field] = $this->update_image(req::$files[$field],$arrItem,$field,$insertid);
                            if($info[$field] && is_numeric($insertid) && $insertid>0){
                                db::query('update '.$this->table.' set `'.$field.'`="'. $info[$field].'" where `'.$this->_dbfield['mainKey'].'`='.$insertid.' limit 1');
                            }
                        }
                    }
                }
                
                //是否需要清理缓存
                if(isset($this->_updateCache) && !empty($this->_updateCache)){
                    foreach($this->_updateCache as $arrItem){
                        if(isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])){
                            $strCacehKeyTemp = '';
                            foreach ($info as $strField=>$strFieldValue){
                                $strCacehKeyTemp = str_ireplace('{{'.$strField.'}}', $strFieldValue, $arrItem['key']);
                            }
                            if($strCacehKeyTemp){
                               cache::del($arrItem['prefix'], $strCacehKeyTemp);
                               cache::set($arrItem['prefix'], $strCacehKeyTemp,null);
                            }
                        }
                    }
                }

                cls_msgbox::show('系统提示', '添加成功!', '?ct='.$this->ct.'&ac='.$this->listPage);
            }
        }
        else
        {
            //addFieldAuto
            if(isset($this->_addFieldAuto) && $this->_addFieldAuto){
                $arrAddFieldAuto = array();
                foreach($this->_addFieldAuto as $field=>$vali){
                    if(req::$forms[$field]){
                        //tpl::assign($field,req::$forms[$field]);
                        $arrAddFieldAuto[$field] = req::$forms[$field];
                    }
                }
                tpl::assign('arrAddFieldAuto',$arrAddFieldAuto);
            }

        }
        echo '<!--';var_dump(req::$forms);var_dump($arrAddFieldAuto);echo '-->';

        //tpl::assign('arrData',db::fetch_all(db::query('select * from qz_country order by sort asc')));
        if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl')){
            tpl::display($this->ct.'.'.$this->ac.'.tpl');
        }else{
            exit('no tpl file');
        }
  	}
    /**
     * 添加
     */
    public function add()
    {
		

		$fields = db::get_one("Select * From `users` where `uid`='".cls_access::$accctl->uid."' ");
		tpl::assign('dl_syjf',$fields['dl_syjf']);
        if(request('dosubmit',''))
        {
            $info=req::$posts;
			
			
			if($info['shorttxt']==''){
				$info['shorttxt'] = strip_tags($info['content']);
				$info['shorttxt'] = mb_substr($info['shorttxt'],0,160,'utf-8');
			}
			

            //自动验证
            if(isset($this->_submit_validate) && $this->_submit_validate){
                foreach($this->_submit_validate as $field=>$vali){
                    if(!isset($info[$field]) || empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'insert') && $vali['1']=='notempty'){
                            cls_msgbox::show('系统提示',$vali['2']?$vali['2']:$this->_dbfield['allTableField'][$field].'必须!',-1);
                            exit();
                        }
                    }else{
                        //其他验证
                    }
                }
            }

            //db 验证
            if(isset($this->_db_validate) && $this->_db_validate){
                foreach($this->_db_validate as $field=>$vali){
                    if(isset($info[$field]) && !empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'insert') && $vali['1']=='unique'){
                            $arrTempData = array();
                            if(isset($vali['extend']) && $vali['extend']){
                                $arrtempWhere = array();
                                $arrtempWhere[] = '`'.$field.'`="'.$info[$field].'"';
                                foreach($vali['extend'] as $extendField){
                                    if(isset($info[$extendField]))$arrtempWhere[] = '`'.$extendField.'`="'.$info[$extendField].'"';
                                }
                                $strTempwhere = '';
                                if(!empty($arrtempWhere)) $strTempwhere = ' where '.implode(' and ', $arrtempWhere);
                                if($strTempwhere)$arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` '.$strTempwhere.' limit 1');
                            }else{
                                $arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` where `'.$field.'`="'.$info[$field].'" limit 1');
                            }

                            if($arrTempData){
                                cls_msgbox::show('系统提示',$vali['2'],-1);
                                exit();
                            }
                        }
                    }
                }
            }
            //auto
            if(isset($this->_auto) && $this->_auto){
                foreach($this->_auto as $field=>$vali){
                    if(!isset($info[$field]) || empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'insert')){
                            if($vali['1']=='value' && isset($vali['2'])){
                                $info[$field] = $vali['2'];
                            }elseif($vali['1']=='function' && isset($vali['2'])){
                                $info[$field] = $vali['2'];
                            }
                        }
                    }
                }
            }
			//print_r($info['dl_jf']);
			if($this->table=="ffsm_dl_txzh")
			{
				if($info['dl_jf']>$fields['dl_syjf'])
				{
					cls_msgbox::show('系统提示','您的剩余积分不足，请重新操作',-1);
					exit();
				}
				else{
					db::query("UPDATE `users` SET `dl_syjf` = `dl_syjf`-'".$info['dl_jf']."' WHERE `uid` = '".cls_access::$accctl->uid."' limit 1");
				}
			}

            $insertid=db::insert($this->table,$info);
            if($insertid)
            {
                //验证上传文件
                //req::$files['update_image']['tmp_name']
                if(isset($this->_uploadFile) && $this->_uploadFile){
                    foreach($this->_uploadFile as $field=>$arrItem){
                        if(isset(req::$files[$field]['tmp_name']) && !empty(req::$files[$field]['tmp_name'])){
                            $info[$field] = $this->update_image(req::$files[$field],$arrItem,$field,$insertid);
                            if($info[$field] && is_numeric($insertid) && $insertid>0){
                                db::query('update '.$this->table.' set `'.$field.'`="'. $info[$field].'" where `'.$this->_dbfield['mainKey'].'`='.$insertid.' limit 1');
                            }
                        }
                    }
                }
                
                //是否需要清理缓存
                if(isset($this->_updateCache) && !empty($this->_updateCache)){
                    foreach($this->_updateCache as $arrItem){
                        if(isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])){
                            $strCacehKeyTemp = '';
                            foreach ($info as $strField=>$strFieldValue){
                                $strCacehKeyTemp = str_ireplace('{{'.$strField.'}}', $strFieldValue, $arrItem['key']);
                            }
                            if($strCacehKeyTemp){
                               cache::del($arrItem['prefix'], $strCacehKeyTemp);
                               cache::set($arrItem['prefix'], $strCacehKeyTemp,null);
                            }
                        }
                    }
                }

                cls_msgbox::show('系统提示', '添加成功!', '?ct='.$this->ct.'&ac='.$this->listPage);
            }
        }
        else
        {
            //addFieldAuto
            if(isset($this->_addFieldAuto) && $this->_addFieldAuto){
                $arrAddFieldAuto = array();
                foreach($this->_addFieldAuto as $field=>$vali){
                    if(req::$forms[$field]){
                        //tpl::assign($field,req::$forms[$field]);
                        $arrAddFieldAuto[$field] = req::$forms[$field];
                    }
                }
                tpl::assign('arrAddFieldAuto',$arrAddFieldAuto);
            }

        }
        echo '<!--';var_dump(req::$forms);var_dump($arrAddFieldAuto);echo '-->';

        //tpl::assign('arrData',db::fetch_all(db::query('select * from qz_country order by sort asc')));
        if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl')){
            tpl::display($this->ct.'.'.$this->ac.'.tpl');
        }else{
            exit('no tpl file');
        }
    }



    /**
     * 编辑
     */
    public function edit()
    {
		
		
		
        $id=request($this->_dbfield['mainKey'],'') ? request($this->_dbfield['mainKey'],'') : cls_msgbox::show('系统提示','缺少id！',-1);
        if(request('dosubmit',''))
        {
            $info=req::$posts;
			
			if($info['shorttxt']==''){
				$info['shorttxt'] = strip_tags($info['content']);
				$info['shorttxt'] = mb_substr($info['shorttxt'],0,160,'utf-8');
			}

            //自动验证
            if(isset($this->_submit_validate) && $this->_submit_validate){
                foreach($this->_submit_validate as $field=>$vali){
                    if(!isset($info[$field]) || empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'update') && $vali['1']=='notempty'){
                            cls_msgbox::show('系统提示',$vali['2']?$vali['2']:$this->_dbfield['allTableField'][$field].'必须!',-1);
                            exit();
                        }
                    }else{
                        //其他验证
                    }
                }
            }
            //db 验证
            if(isset($this->_db_validate) && $this->_db_validate){
                foreach($this->_db_validate as $field=>$vali){
                    if(isset($info[$field]) && !empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'update') && $vali['1']=='unique'){
                            $arrTempData = array();
                            if(isset($vali['extend']) && $vali['extend']){
                                $arrtempWhere = array();
                                $arrtempWhere[] = '`'.$field.'`="'.$info[$field].'"';
                                foreach($vali['extend'] as $extendField){
                                    if(isset($info[$extendField]))$arrtempWhere[] = '`'.$extendField.'`="'.$info[$extendField].'"';
                                }
                                $strTempwhere = '';
                                if(!empty($arrtempWhere)) {
                                    $strTempwhere = ' where '.implode(' and ', $arrtempWhere);
                                    if(in_array($this->ac,array('edit','batch_update')))$strTempwhere .=' and `'.$this->_dbfield['mainKey'].'`!="'.$info[$this->_dbfield['mainKey']].'"';
                                }
                                if($strTempwhere)$arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` '.$strTempwhere.' limit 1');
                            }else{

                                if(in_array($this->ac,array('edit','batch_update'))){
                                    $arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` where `'.$field.'`="'.$info[$field].'" and `'.$this->_dbfield['mainKey'].'`!="'.$info[$this->_dbfield['mainKey']].'" limit 1');
                                }else{
                                    $arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` where `'.$field.'`="'.$info[$field].'" limit 1');
                                }
                            }

                            if($arrTempData){
                                cls_msgbox::show('系统提示',$vali['2'],-1);
                                exit();
                            }
                        }
                    }
                }
            }
            //auto
            if(isset($this->_auto) && $this->_auto){
                foreach($this->_auto as $field=>$vali){
                    if(!isset($info[$field]) || empty($info[$field])){
                        if(($vali['3'] == 'all' || $vali['3'] == 'update')){
                            if($vali['1']=='value' && isset($vali['2'])){
                                $info[$field] = $vali['2'];
                            }elseif($vali['1']=='function' && isset($vali['2'])){
                                $info[$field] = $vali['2'];
                            }
                        }
                    }
                }
            }
			
			
			$data['content'] = str_replace(PHP_EOL,'', $data['content']);
			$data['content'] = str_replace(array("\r\n", "\r", "\n"), "", $data['content']);

            //验证上传文件
            if(isset($this->_uploadFile) && $this->_uploadFile){
                foreach($this->_uploadFile as $field=>$arrItem){
                    if(isset(req::$files[$field]['tmp_name']) && !empty(req::$files[$field]['tmp_name'])){
                        $info[$field] = $this->update_image(req::$files[$field],$arrItem,$field,$info[$this->_dbfield['mainKey']]);
                        /*if($info[$field] && is_numeric($info[$this->_dbfield['mainKey']]) && $info[$this->_dbfield['mainKey']]>0){
                            db::query('update '.$this->table.' set `'.$field.'`="'. $info[$field].'" where `'.$this->_dbfield['mainKey'].'`='.$info[$this->_dbfield['mainKey']].' limit 1');
                        }*/

                    }
                }
            }
            
            


            $where_arr[] = "`".$this->_dbfield['mainKey']."`='{$info[$this->_dbfield['mainKey']]}'";

			if($this->table=="ffsm_dl_txzh")
			{
				$dl_txzh_sc = db::get_one("Select * From `".$this->table."` where `id`='".$info['id']."' ");
				if($dl_txzh_sc['dl_sc']>=1)
				{
					$info['dl_sc']=$dl_txzh_sc['dl_sc'];
				}else{
					if($info['dl_sc']==2){
						db::query("UPDATE `users` SET `dl_syjf` = `dl_syjf`+'".$info['dl_jf']."' WHERE `uid` = '".cls_access::$accctl->uid."' limit 1");
					}
				}
				
				
			}

            $result = false;
            if($info && $where_arr)$result=db::update($this->table,$info,$where_arr);
            if($result)
            {
                 //是否需要清理缓存
                if(isset($this->_updateCache) && !empty($this->_updateCache)){
                    foreach($this->_updateCache as $arrItem){
                        if(isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])){
                            $strCacehKeyTemp = '';
                            foreach ($info as $strField=>$strFieldValue){
                                $strCacehKeyTemp = str_ireplace('{{'.$strField.'}}', $strFieldValue, $arrItem['key']);
                            }
                            if($strCacehKeyTemp){
                                cache::del($arrItem['prefix'], $strCacehKeyTemp);
                                cache::set($arrItem['prefix'], $strCacehKeyTemp,null);
                            }
                        }
                    }
                }
                
                cls_msgbox::show('系统提示','成功修改 id 为:'.$info[$this->_dbfield['mainKey']].'的信息！','?ct='.$this->ct.'&ac='.$this->listPage);
            }
            else
            {
                cls_msgbox::show('系统提示','没有检测到修改的更新信息！',-1);
            }

        }
        else
        {
            $sql = "SELECT * FROM `{$this->table}` WHERE `".$this->_dbfield['mainKey']."`='{$id}' LIMIT 1";
            $data = db::get_one($sql);
			$data['content'] = str_replace(PHP_EOL,'', $data['content']);
			$data['content'] = str_replace(array("\r\n", "\r", "\n"), "", $data['content']);
            tpl::assign('data',$data);
			
			
			
            if(file_exists(PATH_ROOT.'/templates/template/admin/'.$this->ct.'.'.$this->ac.'.tpl')){
				
                tpl::display($this->ct.'.'.$this->ac.'.tpl');
            }else{
                exit('no tpl file');
            }
        }

    }

    public function delete(){
        $id = (int)req::item($this->_dbfield['mainKey'],0);
        if($id && $this->table){
            $info = db::get_one('select * from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1');
            $r = db::query('delete from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1');
            if($r){
                
                 //是否需要清理缓存
                if(isset($this->_updateCache) && !empty($this->_updateCache)){
                    foreach($this->_updateCache as $arrItem){
                        if(isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])){
                            $strCacehKeyTemp = '';
                            foreach ($info as $strField=>$strFieldValue){
                                $strCacehKeyTemp = str_ireplace('{{'.$strField.'}}', $info[$strField], $arrItem['key']);
                            }
                            if($strCacehKeyTemp){
                               // cache::set($arrItem['prefix'], $strCacehKeyTemp,null);
                                cache::del($arrItem['prefix'], $strCacehKeyTemp);
                            }
                            if(OPEN_DEBUG){
                                    file_put_contents(PATH_ROOT.'/admin.txt', 'cache::del :'.$arrItem['prefix'].','.$strCacehKeyTemp,FILE_APPEND);
                            }
                        }
                    }
                }
                
                //是否要删除图片  和关联删除
                $arrDeleteFileFields = $arrDeleteExtendTables = array();
                if(isset($this->_dbfield['batchDeleteTableField']['extend']) && $this->_dbfield['batchDeleteTableField']['extend']){
                    foreach($this->_dbfield['batchDeleteTableField']['extend'] as $k=>$v){
                        if($k=='delete_file' && !$v)$arrDeleteFileFields = $v;
                        if($k=='delete_extend_table' && !$v)$arrDeleteExtendTables = $v;
                    }
                }
                if($arrDeleteFileFields){
                        foreach($arrDeleteFileFields as $strFileField){
                            if(isset($info[$strFileField]) && $info[$strFileField]){
                                @unlink(PATH_ROOT.$info[$strFileField]);
                                if(OPEN_DEBUG){
                                    file_put_contents(PATH_ROOT.'/admin.txt', 'unlink :'.PATH_ROOT.$info[$strFileField],FILE_APPEND);
                                }
                            }
                        }
                    }
                    //array('user'=>array('mainKey'=>'id','unionKey'=>'user_id'), 暂时不实现 安全性
                    /*if($arrDeleteExtendTables){
                        foreach($arrDeleteExtendTables as $strTable=>$arrFieldInfo){
                            if($strTable && isset($info[$arrFieldInfo['unionKey']]) && $info[$arrFieldInfo['unionKey']] && isset($arrFieldInfo['mainKey']) && $arrFieldInfo['mainKey']){
                                db::query('delete from `'.$strTable.'` where `'.$arrFieldInfo['mainKey'].'`='.$info[$arrFieldInfo['unionKey']].' limit 1');
                            }
                        }
                    }*/
                
                cls_msgbox::show('系统提示','删除成功！','?ct='.$this->ct.'&amp;ac='.$this->listPage);
            }else{
                cls_msgbox::show('系统提示','删除失败！',-1);
            }
        }else{
            cls_msgbox::show('系统提示','参数错误！',-1);
        }
    }

    protected function debug($mixData){
        echo '<!--';
        echo '<pre>';
        var_dump($mixData);
        file_put_contents(PATH_ROOT.'/debug.log',var_export($mixData,true)."\n",FILE_APPEND);
        echo '-->';
    }

    /**
     * 批量修改信息
     */
    public function batch_update(){
        $ids    = req::item('ids', '');
        if(empty($ids))
        {
            cls_msgbox::show('对不起，出错了！', '你没有选择项目！', '-1');
        }
        /*$sorts = req::item('sort', array());
        $country_ids = req::item('country_id', array());
        $prices = req::item('price', array());
        $work_days = req::item('work_day', array());
        */
        $success   = $failure = 0;
        $arrData = array();
        if(isset($this->_dbfield['batchUpdateTableField']) && $this->_dbfield['batchUpdateTableField']){
            foreach($this->_dbfield['batchUpdateTableField'] as $v){
                $arrData[$v] = req::item($v, array());
            }
        }else{
            cls_msgbox::show('对不起，出错了！', '你没有授权批量修改的字段！', '-1');
            exit();
        }
        /**
         * 全选$ids:
         * Array ( [0] => s [1] => h [2] => f [3] => c [4] => p [5] => j [6] => a [7] => b )
         */

        if(!$arrData){
            cls_msgbox::show('对不起，出错了！', '你没有选择项目2！', '-1');
            exit();
        }


        foreach ($ids as $key => $id)
        {
            /*$intsort = empty($sorts[$key]) ? 99 : $sorts[$key];
            $intcountry_id = empty($country_ids[$key]) ? 0 : $country_ids[$key];
            $strprice = empty($prices[$key]) ? '2000' : $prices[$key];
            $str_work_day = empty($work_days[$key]) ? '10个工作日' : $work_days[$key];*/
            $strUpdateSql = '';
            $arrRow = array();
            foreach($arrData as $field=>$arrValues){
                if($arrValues && $arrValues[$key]){
                    $arrRow[$field]=$arrValues[$key];
                    $arrtemp = array();
                    //$arrtemp = $this->_autoHandle($arrValues[$key],$field,'update');
                    /*var_dump($arrValues);exit();
                    $arrtemp = $this->_autoHandle($arrValues,$field,'update');
                    if($arrtemp[$key])$strUpdateSql .='`'.$field.'`="'.$arrtemp[$key].'",';*/
                }
            }
            foreach($arrData as $field=>$arrValues){
                if($arrRow){
                    $arrRow[$this->_dbfield['mainKey']] = $id;
                    $arrtemp = array();
                    $arrtemp = $this->_autoHandle($arrRow,$field,'update');
                    if($arrtemp[$field])$strUpdateSql .='`'.$field.'`="'.$arrtemp[$field].'",';
                }else{
                    $failure++;
                }
            }
            //$sql = "UPDATE `".$this->table."` SET `sort` = '{$intsort}',`country_id` = '{$intcountry_id}',`price` = '{$strprice}',`work_day` = '{$str_work_day}' WHERE `id` ='{$id}'";
            $strUpdateSql = trim($strUpdateSql,',');
            if($strUpdateSql && $id && $this->_dbfield['mainKey']){
                $strUpdateSql = "UPDATE `".$this->table."` SET ".$strUpdateSql.' where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1';
                $result =  db::query($strUpdateSql);
                if($result >= 0)
                {
                    
                    $success++;
                    //是否需要清理缓存
                    if(isset($this->_updateCache) && !empty($this->_updateCache)){
                        foreach($this->_updateCache as $arrItem){
                            if(isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])){
                                $strCacehKeyTemp = '';
                                foreach($arrData as $field=>$arrValues){
                                    if($arrValues && $arrValues[$key]){
                                        $strCacehKeyTemp = str_ireplace('{{'.$field.'}}', $arrValues[$key], $arrItem['key']);
                                    }
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
        cls_msgbox::show('成功了！', "成功修改：{$success}条，失败:{$failure}条！", $referurl);
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
         'mainKey'=>主键
         'extend'=>array('delete_file'=>array('image','cover'),'delete_extend_table'=>array('user'=>array('mainKey'=>'id','unionKey'=>'user_id'),)),
         )
         */
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

                $strSql = 'delete from `'.$this->table.'` where `'.$this->_dbfield['mainKey'].'`='.$id.' limit 1';
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
                    //array('user'=>array('mainKey'=>'id','unionKey'=>'user_id'), 暂时不实现 安全性
                    /*if($arrDeleteExtendTables){
                        foreach($arrDeleteExtendTables as $strTable=>$arrFieldInfo){
                            if($strTable && isset($arrTemp[$arrFieldInfo['unionKey']]) && $arrTemp[$arrFieldInfo['unionKey']] && isset($arrFieldInfo['mainKey']) && $arrFieldInfo['mainKey']){
                                db::query('delete from `'.$strTable.'` where `'.$arrFieldInfo['mainKey'].'`='.$arrTemp[$arrFieldInfo['unionKey']].' limit 1');
                            }
                        }
                    }*/
                    
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


    protected function _autoHandle($info,$field,$operation){
        if($info && !is_array($info)){
            $info = array($field=>$info);
        }
        //自动验证
        if(isset($this->_submit_validate) && $this->_submit_validate){
            foreach($this->_submit_validate as $field=>$vali){
                if(in_array($this->ac,array('batch_update')) && !$this->_dbfield['batchUpdateTableField'][$field]){
                    continue;
                }
                if(!isset($info[$field]) || empty($info[$field])){
                    if(($vali['3'] == 'all' || $vali['3'] == $operation) && $vali['1']=='notempty'){
                        cls_msgbox::show('系统提示',($vali['2']?$vali['2']:$this->_dbfield['allTableField'][$field].'必须!').' 当前值为:'.$info[$field],-1);
                        exit();
                    }
                }else{
                    //其他验证
                }
            }
        }
        //db 验证
        if(isset($this->_db_validate) && $this->_db_validate){
            foreach($this->_db_validate as $field=>$vali){
                if(isset($info[$field]) && !empty($info[$field])){
                    if(($vali['3'] == 'all' || $vali['3'] == $operation) && $vali['1']=='unique'){
                        $arrTempData = array();
                        if(isset($vali['extend']) && $vali['extend']){
                            $arrtempWhere = array();
                            $arrtempWhere[] = '`'.$field.'`="'.$info[$field].'"';
                            foreach($vali['extend'] as $extendField){
                                if(isset($info[$extendField]))$arrtempWhere[] = '`'.$extendField.'`="'.$info[$extendField].'"';
                            }
                            $strTempwhere = '';
                            if(!empty($arrtempWhere)) {
                                $strTempwhere = ' where '.implode(' and ', $arrtempWhere);
                                if(in_array($this->ac,array('edit','batch_update')))$strTempwhere .=' and `'.$this->_dbfield['mainKey'].'`!="'.$info[$this->_dbfield['mainKey']].'"';
                            }
                            if($strTempwhere)$arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` '.$strTempwhere.' limit 1');
                        }else{

                            if(in_array($this->ac,array('edit','batch_update'))){
                                $arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` where `'.$field.'`="'.$info[$field].'" and `'.$this->_dbfield['mainKey'].'`!="'.$info[$this->_dbfield['mainKey']].'" limit 1');
                            }else{
                                $arrTempData = db::get_one('select `'.$this->_dbfield['mainKey'].'` from `'.$this->table.'` where `'.$field.'`="'.$info[$field].'" limit 1');
                            }
                        }
                        if($arrTempData){
                            cls_msgbox::show('系统提示',$vali['2'],-1);
                            exit();
                        }
                    }
                }
            }
        }
        //auto
        if(isset($this->_auto) && $this->_auto){
            foreach($this->_auto as $field=>$vali){
                if(!isset($info[$field]) || empty($info[$field])){
                    if(($vali['3'] == 'all' || $vali['3'] == $operation)){
                        if($vali['1']=='value' && isset($vali['2'])){
                            $info[$field] = $vali['2'];
                        }elseif($vali['1']=='function' && isset($vali['2'])){
                            $info[$field] = $vali['2'];
                        }
                    }
                }
            }
        }
        return $info;
    }


    /**
     * 图片上传
     * @param $imgurl 图片上传信息
     * @param $filevali 图片验证信息
     * @param $itemName 字段信息
     * @param $id 上传记录的主键id
     * @return string 文件名字
     */
    public function update_image($imgurl,$filevali,$itemName,$id)
    {
        if (empty($imgurl['name']))
        {
            return '';
        }else{
            $tem_arr = explode('.', $imgurl['name']);
            $ext = array_pop($tem_arr);//图片扩展名
            if($filevali['format']){
                if(!in_array($ext,$filevali['format'])){
                    cls_msgbox::show('系统提示', '上传图片格式有误！'.implode(',',$filevali['format']), '-1');
                    exit();
                }
            }elseif( !preg_match("#(gif|jpg|png)#", $ext) ) {
                cls_msgbox::show('系统提示', '上传图片格式有误！', '-1');
                exit();
            }

            //上传文件大小限制, 单位BYTE
            $max_file_size=5000000;
            //上传文件类型列表
            if($filevali['size']){
                $max_file_size = $filevali['size'];
            }

            if($max_file_size < $imgurl['size'])
            {
                cls_msgbox::show('系统提示', '上传图片太大！', '-1');exit();
            }



            $imgUrl = PATH_ROOT.'/static/upload/'.date('Y').'/';## 绝对路径
            $relaUrl = '/static/upload/'.date('Y').'/'; ## 相对路径
            if (file_exists ($imgUrl) === false) mkdir ( $imgUrl, 0777, true );

            /*if($filevali['save_path']){

            }*/

            //$file_name =$id.'.'.$ext;
            //$file_name =$this->table.'_'.$id.'.'.$ext;//加上表名 防止重复
            $file_name =$this->table.'_'.$id.'_'.$itemName.'.'.$ext;//加上表名 字段名 防止重复
            //如果文件名已经存在了
            if($file_name && file_exists($imgUrl.$file_name)){

            }
            $local_File = $imgUrl.$file_name;  //绝对路径

            $relative_File  = $relaUrl.$file_name; //相对路径
            //new add
            $imgurl['tmp_name'] = str_ireplace("\\\\","\\",$imgurl['tmp_name']);

            if (move_uploaded_file($imgurl['tmp_name'], $local_File))
            {
                return $relative_File;
            }else{

                cls_msgbox::show('系统提示', '图片上传失败22！'.$imgurl['tmp_name'].'  to '.$local_File, '-1');exit;
            }
        }
    }
}