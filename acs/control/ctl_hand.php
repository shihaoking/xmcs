<?php

if (!defined('CORE'))
    exit('Request Error!');

/**
 * 手机频道：游戏、应用
 * 后台数据管理
 *
 * @version $Id$
 */
class ctl_hand
{
    public $ct;
    public $ac;
    public $opt;
    public $items;
    public $pre_url;
    public $pagesize = 15;
	
    
    public function __construct()
    {
		
        if (empty($this->items))
        {
            $this->items = new mod_hand();
        }
        $this->ct = request('ct');
        tpl::assign('ct', $this->ct);

        $this->ac = request('ac');
        tpl::assign('ac', $this->ac);

        $this->get_opt();
    }
	
	
	//设置的参数
    public function get_opt()
    {
        $site_url = 'http://www.kaiy8.com'; //后台访问的链接
        $dir_img = '';
        $this->opt = array(
            'site_url' => $site_url,
            'images_dir_url' => $site_url . $dir_img,
            'type_ad_array' => array('common'=>'公用页面'),
            'images_upload_dir' =>  $dir_img,
            'handapitype' => array('noapi' => '无API', 'onlyapi' => '只取API数据', 'both' => '手动结合API数据'),
            'siteordby' => array('uptime DESC' => '按最新更新时间', 'ord ASC' => '接口定义正序', 'ord DESC' => '接口定义倒序', 'click DESC' => '按最多点击'),
        );
        $this->items->opt = $this->opt;
        tpl::assign('opt', $this->opt);
    }
	
	
	public function hand()
    {
		
		
        $tablename = 'hand_data';
        $table_join = 'hand_type';

        //全部键名
        $tb_info = $this->items->showTableColumn($tablename);
        $tbj_info = $this->items->showTableColumn($table_join);
        $tb_column = array_merge($tb_info, $tbj_info);
        tpl::assign('tb_column', $tb_column);
		

//        ppr($tb_info);
        //自定义各项, ('是否显示','显示方式:text直接列出,input_text用表单input的text方式,input_select用表单下拉框','显示长度')
        $self_opt = array(
            'typename' => array('show'), //分类名
            'yh_id' => array('show', '', 's'), //
            'yh_name' => array('show', 'input_text', ''), //标题
            'yh_url' => array('show', 'input_text', ''), //链接
            'yh_imgurl' => array('show', 'pic', ''), //图片
            'yh_info' => array('show', 'input_text', ''), //描述
            'yh_type_id' => array('hide'), //分类id
            'yh_ord' => array('show', 'input_text', 's'), //顺序(1在前)
            'yh_uptime' => array('show'), //更新时间
            'id' => array('hide'), //分类id
            'typecode' => array('hide'), //分类代码
            
        );

        //全部是后接每条的ID的
        $self_opt['opt_button'] = array(
            '编辑' => array(
                "?ct={$this->ct}&ac={$this->ac}_edit&id=" => array('修改', 1),
                "?ct={$this->ct}&ac={$this->ac}_do&sub=del&id=" => array('删除'),
            ),
        );

        tpl::assign('self_opt', $self_opt);

        $wherequery = "WHERE 1 ";
//        $wherequery = "WHERE typename <> '' ";
        $others = null;
        //筛选方式
		
        $type_arr = $this->items->get_handtype();
		
        if (!empty($type_arr))
        {
            foreach ($type_arr as $kta => $vta)
            {
                $type_arr[$kta] = sprintf('%03s', $kta) . ' : ' . $vta;
            }
        }
//        ppr($type_arr);
        $search_value = request('search_value', null);
        $select_value = request('select_value', null);
        tpl::assign('select_value',$select_value);
        !empty($search_value) && $others.="&search_value=" . $search_value;
        !empty($select_value) && $others.="&select_value=" . $select_value;

        !empty($search_value) && $wherequery.=" AND yh_name LIKE '%{$search_value}%'";
        !empty($select_value) && $wherequery.=" AND yh_type_id='{$select_value}'";

        $filter_array = array(
            'yh_type_id' => array('版块', 'select', $type_arr, $select_value),
            'yh_name' => array('标题', 'text', $search_value),
        );
        tpl::assign('filter_array', $filter_array);

        //主键
        $tb_mk = $this->items->showTableMainColumn($tablename);
        tpl::assign('tb_mk', $tb_mk);

        $orderquery = "ORDER BY yh_ord,yh_id";
        $listfield = '*';

        $mylinkid = 'yh_type_id';
        $linkid = 'id';
		
        $this->items->showPageList($tablename, $this->ct, $this->ac, $listfield, $orderquery, $wherequery, $others, $this->pagesize, $table_join, $mylinkid, $linkid);
		
        tpl::display('hand.list.tpl');
		
    }	

    public function hand_edit()
    {
        $tablename = 'hand_data';
        $tb_column = $this->items->showTableColumn($tablename);
        tpl::assign('tb_column', $tb_column);
        $tb_mk = $this->items->showTableMainColumn($tablename);
        tpl::assign('tb_mk', $tb_mk);

        $type_arr = $this->items->get_handtype();
        tpl::assign('type_arr', $type_arr);
		$color = array('1'=>'红色','2'=>'绿色','3'=>'蓝色');
		$blank = array('1'=>'新窗口');
        $self_opt = array(
            'yh_type_id' => array('show', 'select', $type_arr, 1), //分类id
            'yh_id' => array('hide', '', 's'), //
            'yh_name' => array('show', 'input_text', ''), //标题
            'yh_url' => array('show', 'input_text', 'l'), //链接
            'yh_imgurl' => array('show', 'pic', ''), //图片
            'yh_info' => array('show', 'input_text', 'l'), //描述
            'yh_ord' => array('show', 'input_text', 's'), //顺序(1在前)
			'color'=>array('show','select',$color,1),
			'blank'=>array('show','select',$blank,1),
            'yh_uptime' => array('show', 'text'), //更新时间
        );
		
        tpl::assign('self_opt', $self_opt);

        $id = request('id', null);
		$select_value = request('select_value', null);
		
		//echo $tablename.'||'.$id.'222';
        
		if ($id > 0)
        {
            tpl::assign('id', $id);

            $data_array = $this->items->selectOneBase($tablename, "`$tb_mk`='$id'");	
			
            $data_array['yh_imgurl'] = $this->items->correctImgUrl($data_array['yh_imgurl']);
			
			
			
//            ppr($data_array);
            tpl::assign('data_array', $data_array);
        }elseif($select_value > 0)//默认选中栏目
		{
			$data_array['yh_type_id'] = $select_value;	
			tpl::assign('data_array', $data_array);	 
		}

        tpl::assign('ac_list', 'hand');
        tpl::display('hand.edit.tpl');
    }

    public function hand_do()
    {
        $this->items->pre_url='/114la_ylmf_ssl/index.php?ct=hand&ac=hand_edit&select_value=';
        $this->items->doBase('hand_data');
    }

    public function hand_type()
    {
		
        $tablename = 'hand_type';
        //自定义各项, ('是否显示','显示方式:text直接列出,input_text用表单input的text方式,input_select用表单下拉框','显示长度')
        //全部键名
        $tb_column = $this->items->showTableColumn($tablename);
        tpl::assign('tb_column', $tb_column);
	
       // $allclass = $this->items->getAllClass();
	   	
       // $allclass = array('none' => '无定义') + $allclass;
	
        $self_opt = array(
            'id' => array('show'), //分类id
            'typename' => array('show', 'input_text', 'l'), //分类名
            'typecode' => array('show', 'input_text'), //分类代码
            'shownum' => array('show', 'input_text', 's'),
            'api_mark' => array('show', 'input_select', $this->opt['handapitype']),
           // 'cid' => array('show', 'input_select', $allclass),
           // 'ordby' => array('show', 'input_select', $this->opt['siteordby']),
        );

        //全部是后接每条的ID的
        $self_opt['opt_button'] = array(
            '编辑' => array(
                "?ct={$this->ct}&ac={$this->ac}_edit&id=" => array('修改', 1),
                "?ct={$this->ct}&ac={$this->ac}_do&do=1&sub=del&id=" => '删除',
                "?ct={$this->ct}&ac=hand&select_value=" => '手动',
                "?ct={$this->ct}&ac=duli&select_value=" => '接口数据',
            ),
        );

        tpl::assign('self_opt', $self_opt);

        $wherequery = "WHERE 1 ";
        $others = null;

        $select_value = request('select_value', null);
        $search_value = request('search_value', null);

        !empty($select_value) && $others.="&select_value=" . $select_value;
        !empty($search_value) && $others.="&search_value=" . $search_value;

        !empty($select_value) && $wherequery.=" AND typecode LIKE '{$select_value}%'";
        !empty($search_value) && $wherequery.=" AND (typecode LIKE '%{$search_value}%' OR typename LIKE '%{$search_value}%')";
        $filter_array = array(
            'typecode' => array('范围', 'select', array_merge(array('com' => '公用版块')), $select_value),
            'typename' => array('搜索', 'text', $search_value),
        );
        tpl::assign('filter_array', $filter_array);

//        ppr($self_opt);
//        ppr($filter_array);
        //主键
        $tb_mk = $this->items->showTableMainColumn($tablename);
        tpl::assign('tb_mk', $tb_mk);

//        $wherequery = "WHERE typename <> '' ";

        $orderquery = "ORDER BY {$tb_mk} ASC";
        $listfield = '*';
        $this->items->showPageList($tablename, $this->ct, $this->ac, $listfield, $orderquery, $wherequery, $others, $this->pagesize);
		
		
		
        tpl::display('hand.type.list.tpl');
    }

    public function hand_type_edit()
    {
        $tablename = 'hand_type';
        $tb_column = $this->items->showTableColumn($tablename);
        tpl::assign('tb_column', $tb_column);
        $tb_mk = $this->items->showTableMainColumn($tablename);
        tpl::assign('tb_mk', $tb_mk);
        
		$classarr=$this->items->getAllClass();
		$classarr[0] = '无定义';
		ksort($classarr);
        $self_opt = array(
            'id' => array('show', 'text'), //id
            'typename' => array('show', 'input_text', ''), //分类名
            'typecode' => array('show', 'input_text', ''), //分类代码
            'shownum' => array('show', 'input_text', '', 0), //展示的数量
			
            'cid' => array('show', 'input_select', $classarr),
            'api_mark' => array('show', 'input_select', $this->opt['handapitype']),
            'ordby' => array('show', 'input_select', $this->opt['siteordby']),
//            'api_mark' => array('show','input_select',array('noapi'=>'无API', 'onlyapi'=>'只取API数据', 'both'=>'手动结合API数据')), 
        );
        tpl::assign('self_opt', $self_opt);

        $id = request('id', null);

        if ($id > 0)
        {
            tpl::assign('id', $id);
            $data_array = $this->items->selectOneBase($tablename, "`$tb_mk`='$id'");
            
			//ppr($data_array);
            tpl::assign('data_array', $data_array);
        }

        tpl::assign('ac_list', 'hand_type');
        tpl::display('hand.type.edit.tpl');
    }

    public function hand_type_do()
    {
       // ppr(req::$forms);        ppr(req::$files);        exit;
        $this->items->doBase('hand_type');
    }
	
	
	/************
	 *
	 //////////////*/
	 
	 public function ad()
    {
        $tablename = 'ad';
        //自定义各项, ('是否显示','显示方式:text直接列出,input_text用表单input的text方式,input_select用表单下拉框','显示长度')
        //全部键名
        $tb_column = $this->items->showTableColumn($tablename);
        tpl::assign('tb_column', $tb_column);
        $self_opt = array(
            'id' => array('show'), //分类id
            'title' => array('show', 'input_text'),
            'endtime' => array('show'),
            'titlere' => array('show', 'input_text'),
            'type' => array('show', 'input_select', $this->opt['type_ad_array'], 1), //分类id
        );

        tpl::assign('self_opt', $self_opt);
        
        tpl::assign('type_ad_array', $this->opt['type_ad_array']);
        
        //全部是后接每条的ID的
        $self_opt['opt_button'] = array(
            '编辑' => array(
                "?ct={$this->ct}&ac={$this->ac}_edit&id=" => array('修改', 1),
            ),
        );

        tpl::assign('self_opt', $self_opt);

        //提前3天
        $tq = 86400*3;
        $wherequery = $others = null;
        $tp_value = request('tp', null);
        tpl::assign('tp', $tp_value);
        if(!empty($tp_value))
        {
            $nowday = time();
            $theday = $nowday + $tq;
            $others.="&tp=" . $tp_value;
            $wherequery.=" AND `endtime`>0 AND `endtime`<='{$theday}' AND `endtime`>'{$nowday}'";
        }
        
        $select_value = request('select_value', null);
        
        !empty($select_value) && $others.="&select_value=" . $select_value;

        !empty($select_value) && $wherequery.=" AND type='{$select_value}'";

        $filter_array = array(
            'type' => array('页面', 'select', $this->opt['type_ad_array'], $select_value),
        );
        tpl::assign('filter_array', $filter_array);
        
        
        $wherequery = "WHERE 1 ".$wherequery;
        $others = null;

        //主键
        $tb_mk = $this->items->showTableMainColumn($tablename);
        tpl::assign('tb_mk', $tb_mk);

//        $wherequery = "WHERE typename <> '' ";

        $orderquery = "ORDER BY id DESC";
        $listfield = '*';
        
        $start = request('start', '0');
        
//        ppr($wherequery);
        $array_list = $this->items->showTablePageList($tablename, $this->ct, $this->ac, $start, $listfield, $orderquery, $wherequery, $others, $this->pagesize);
//        ppr($array_list);
        $due = null;
        if(!empty($array_list['data']))
        {
            $nowtime = time();
            
            foreach ($array_list['data'] as $k => $v)
            {
                
                $endtime = $v['endtime'];
                
                if($endtime == 0)
                {
                    $mark = 'front'; //前者有效
                    $endtime = 0;
                }elseif($endtime >$nowtime)
                {
                    $mark = 'front'; //前者有效
                    if($endtime-$nowtime<$tq)
                    {
                        $due[] = $v['id'];
                        $array_list['data'][$k]['due'] = 1;
                    }
                }  else
                {
                    $mark = 'after';
                }
                $array_list['data'][$k]['endtime'] = date('Y-m-d H:i:s',$endtime);
                $array_list['data'][$k]['mark'] = $mark;
            }
        }
//        ppr($array_list);
        tpl::assign('due', $due);
        tpl::assign('array_list', $array_list['data']);
        tpl::assign('pagination', $array_list['pagination']);
        tpl::display('ad.list.tpl');
    }

    public function ad_add()
    {
        $this->items->addBase('ad', "`id`=''");
        cls_msgbox::show('成功了！', "成功增加！", $this->pre_url, 1000);
    }

    public function ad_edit()
    {
        $id = request('id', null);

        if ($id > 0)
        {
            tpl::assign('id', $id);
            $data_array = $this->items->selectOneBase('ad', "`id`='$id'");
            $data_array['endtime'] = date('Y-m-d H:i:s',$data_array['endtime']);
            tpl::assign('data_array', $data_array);
        }
        tpl::assign('type_ad_array', $this->opt['type_ad_array']);
        tpl::display('ad.edit.tpl');
    }

    
    public function ad_do()
    {
        $do = request('do', null);
		
		
		
        if (empty($do))
        {
            $this->items->doBatchBaseAd('ad');
        }  else
        {
            $id = request('id',0);
            $title = request('title',null);
            $content = request('content',null);
            if (empty($title) || empty($content) )
            {
                cls_msgbox::show('对不起，出错了！', '必填数据不能为空。', '-1');
            }
            $titlere = request('titlere',null);
            $endtime = request('endtime',null);
            $reserve = request('reserve',null);
            $type = request('type','other');
            $content = $this->items->getStrEncode($content);
            $reserve = $this->items->getStrEncode($reserve);
            $opt = array(
                'title'=> trim($title),
                'titlere'=> trim($titlere),
                'endtime'=> strtotime(trim($endtime)),
                'content'=> $content,
                'reserve'=> $reserve,
                'type'=> $type,
            );
            $this->items->updateBase('ad',"`id`='{$id}'",$opt);
            cls_msgbox::show('成功了！', "成功增加！", $this->pre_url, 1000);
        }
    }
	
	
	
	public function opt()
    {
        $tablename = 'opt';
        //自定义各项, ('是否显示','显示方式:text直接列出,input_text用表单input的text方式,input_select用表单下拉框','显示长度')
        //全部键名
        $tb_column = $this->items->showTableColumn($tablename);
        tpl::assign('tb_column', $tb_column);
        $self_opt = array(
            'id' => array('show'), //分类id
            'optname' => array('show', 'input_text'),
            'optcode' => array('show', 'input_text'),
            'optcontent' => array('show', 'input_text', 'l'),
            'optcaption' => array('show', 'input_text', 'l'),
        );

        tpl::assign('self_opt', $self_opt);

        $wherequery = "WHERE 1 ";
        $others = null;

        //主键
        $tb_mk = $this->items->showTableMainColumn($tablename);
        tpl::assign('tb_mk', $tb_mk);

//        $wherequery = "WHERE typename <> '' ";

        $orderquery = "ORDER BY {$tb_mk} ASC";
        $listfield = '*';
        $this->items->showPageList($tablename, $this->ct, $this->ac, $listfield, $orderquery, $wherequery, $others, $this->pagesize);
        tpl::display('opt.list.tpl');
    }

    public function opt_add()
    {
        $t = time();
        $optname = '新增名称' . $t;
        $optcode = 'code_' . $t;
        $this->items->addBase('opt', "`optname`='{$optname}',`optcode`='{$optcode}'");
        cls_msgbox::show('成功了！', "成功增加！", $this->pre_url, 1000);
    }

    public function opt_do()
    {
//        ppr(req::$forms);        ppr(req::$files);        exit;
        $this->items->doBase('opt');
    }

    

}
