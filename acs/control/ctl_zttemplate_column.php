<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 星座专题模板列信息管理
 * 后台数据管理
 * 控制器部分
 * @author mayi <mayi@ylmf.com>
 * @version $Id$
 */


class ctl_zttemplate_column extends common{

    // 自动验证设置
    protected $_submit_validate     =   array(
        'tplc_name'=>array('','notempty','名称必须！','all'),
        'tplc_code'=>array('','notempty','列标识必须！','all'),
        'tpl_id'=>array('','notempty','所属模板id必须！','insert'),
        'tplc_id'=>array('tplc_id','notempty','主键必须！','update'),
    );

    protected $_db_validate     =   array(
        'tpl_name'=>array('tplc_name','unique','名称已经存在！','all','extend'=>array('tpl_id')),
        'tplc_code'=>array('tplc_code','unique','标识已经存在！','all','extend'=>array('tpl_id')),
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

//tplc_id, tpl_id, tplc_name, tplc_code, tplc_havetitle, tplc_haveurl, tplc_havemediaurl, tplc_havesmallimg, tplc_havebigimg,
//tplc_havedescript, tplc_havedate, tplc_uptime, tplc_addtime

        $this->_dbfield=array(
            'mainKey'=>'tplc_id',
            'allTableField'=>array('tplc_id'=>'列编号','tpl_name'=>'模板名称','tpl_id'=>'模板编号','tplc_name'=>'列名称','tplc_code'=>'列标识'
            ,'tplccontent'=>'包含内容','tplc_havetitle'=>'设置标题','tplc_haveurl'=>'设置跳转地址','tplc_havemediaurl'=>'设置媒体地址'
            ,'tplc_havesmallimg'=>'设置小图','tplc_havebigimg'=>'设置大图','tplc_havedescript'=>'设置描述','tplc_havedate'=>'设置日期'
            ,'tplc_uptime'=>'更新时间','tplc_addtime'=>'添加时间'),
            'addTableField'=>array('tpl_id','tplc_name','tplc_code','tplc_havetitle','tplc_haveurl'
                ,'tplc_havemediaurl','tplc_havesmallimg','tplc_havebigimg','tplc_havedescript','tplc_havedate'),

            'editTableField'=>array('tplc_id','tplc_name','tplc_code','tplc_havetitle','tplc_haveurl'
            ,'tplc_havemediaurl','tplc_havesmallimg','tplc_havebigimg','tplc_havedescript','tplc_havedate'),

            'listTableField'=>array('tplc_id','tplc_name','tplc_code','tplccontent','tpl_id','tpl_name','havecontent','tpl_addtime'),

            'batchUpdateTableField'=>array(),
            'batchDeleteTableField'=>array(
                'mainKey'=>'tplc_id',
            ),
            'tplc_id'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
            ),
            'tplc_name'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
                'search_extend'=>'like',
            ),
            'tpl_name'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),
            'tplc_code'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
                'search'=>'1',
                'search_extend'=>'like',
            ),
            'tplc_havetitle'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'checkbox'),
            ),
            'tplc_haveurl'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'checkbox'),
            ),
            'tplc_havemediaurl'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'checkbox'),
            ),
            'tplc_havesmallimg'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'checkbox'),
            ),
            'tplc_havebigimg'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'checkbox'),
            ),
            'tplc_havedescript'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'checkbox'),
            ),
            'tplc_havedate'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'checkbox'),
            ),
            'tpl_addtime'=>array(
                'element'=>array('e_name'=>'input','e_type'=>'text'),
            ),


        );

        parent::__construct();

        $this->table = 'zhuanti_template_column';

        //add edit delete batch_update
        $this->_allowAction = array(
            'add'=>array('title'=>'添加','type'=>'dialog','width'=>'700','height'=>'600','paramto'=>'data_id','paramfrom'=>'tpl_id'),
            'edit'=>array('title'=>'编辑','type'=>'href',),
            'delete'=>array('title'=>'删除','type'=>'href',),
            'batch_update'=>array('title'=>'批量修改','type'=>'href',),
        );

        tpl::assign('_allowAction',$this->_allowAction);
        

        tpl::assign('_submit_validate',$this->_submit_validate);

        tpl::assign('_dbfield',$this->_dbfield);


    }


    public function index(){

        $tpl_id = req::item('data_id',0);
        if($tpl_id<=0){
            cls_msgbox::show('系统提示','主模板id缺少!',-1);
            exit();
        }
        tpl::assign('data_id',$tpl_id);
        /**接收搜索值***/
        $where = '';
        $where_arr = array('zhuanti_template_column.tpl_id = '.$tpl_id);
        $config['url_prefix'] = "?ct=".$this->ct."&ac=".$this->ac."&data_id=".$tpl_id;
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
        $config['total_rs'] = $rsid['total']; //总记录数

        $pages  = util::pagination($config); //取得分页信息
        tpl::assign('pages',$pages);

        $offset = ($config['current_page'] - 1) * $size;
        $sql2 = "SELECT zhuanti_template_column.*,zt.tpl_name FROM `".$this->table."` left join zhuanti_template zt on zhuanti_template_column.tpl_id=zt.tpl_id ".$where." order by ".$this->_dbfield['mainKey']." desc LIMIT {$offset},{$size}";
        $query = db::query($sql2);
        $rows    = db::fetch_all($query);
        if(empty($rows)){
            echo '<!--';
            var_dump($sql2);
            echo '-->';
        }

//tplc_id, tpl_id, tplc_name, tplc_code, tplc_havetitle, tplc_haveurl, tplc_havemediaurl, tplc_havesmallimg, tplc_havebigimg,
//tplc_havedescript, tplc_havedate, tplc_uptime, tplc_addtime
        if($rows && is_array($rows)) {
            for ($i = 0; $i < count($rows); $i++) {
                $tplccontent = '';
                if ($rows[$i]['tplc_havetitle'])
                    $tplccontent .= '标题、';
                if ($rows[$i]['tplc_haveurl'])
                    $tplccontent .= '跳转地址、';
                if ($rows[$i]['tplc_havemediaurl'])
                    $tplccontent .= '媒体播放地址、';
                if ($rows[$i]['tplc_havesmallimg'])
                    $tplccontent .= '小图、';
                if ($rows[$i]['tplc_havebigimg'])
                    $tplccontent .= '大图、';
                if ($rows[$i]['tplc_havedescript'])
                    $tplccontent .= '简介、';
                if ($rows[$i]['tplc_havedate'])
                    $tplccontent .= '日期、';
                if (!empty($tplccontent)) {
                    $tplccontent = mb_substr($tplccontent, 0, mb_strlen($tplccontent,'utf-8') - 1,"utf-8");
                }
                $rows[$i]['tplccontent'] = $tplccontent;
            }
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

                cls_msgbox::show('系统提示', '添加成功!', '?ct='.$this->ct.'&ac='.$this->listPage.'&data_id='.$info['tpl_id']);
            }
        }
        else
        {
            $tpl_id = req::item('data_id', 0);
            if ($tpl_id <= 0) {
                cls_msgbox::show('系统提示', '主模板id缺少!', -1);
                exit();
            }
            tpl::assign('tpl_id',$tpl_id);
            //根据模板id获取模板名称
            $row = db::get_one("select tpl_name from zhuanti_template where tpl_id={$tpl_id};");
            if(!$row || !is_array($row)){
                cls_msgbox::show('系统提示', '主模板id不正确!', -1);
                exit();
            }
            tpl::assign('tpl_name',$row['tpl_name']);

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



    public function edit()
    {
        $id = request($this->_dbfield['mainKey'], '') ? request($this->_dbfield['mainKey'], '') : cls_msgbox::show('系统提示', '缺少id！', -1);
        if (request('dosubmit', '')) {
            $info = req::$posts;

            if ($info['shorttxt'] == '') {
                $info['shorttxt'] = strip_tags($info['content']);
                $info['shorttxt'] = mb_substr($info['shorttxt'], 0, 160, 'utf-8');
            }

            //自动验证
            if (isset($this->_submit_validate) && $this->_submit_validate) {
                foreach ($this->_submit_validate as $field => $vali) {
                    if (!isset($info[$field]) || empty($info[$field])) {
                        if (($vali['3'] == 'all' || $vali['3'] == 'update') && $vali['1'] == 'notempty') {
                            cls_msgbox::show('系统提示', $vali['2'] ? $vali['2'] : $this->_dbfield['allTableField'][$field] . '必须!', -1);
                            exit();
                        }
                    } else {
                        //其他验证
                    }
                }
            }
            //db 验证
            if (isset($this->_db_validate) && $this->_db_validate) {
                foreach ($this->_db_validate as $field => $vali) {
                    if (isset($info[$field]) && !empty($info[$field])) {
                        if (($vali['3'] == 'all' || $vali['3'] == 'update') && $vali['1'] == 'unique') {
                            $arrTempData = array();
                            if (isset($vali['extend']) && $vali['extend']) {
                                $arrtempWhere = array();
                                $arrtempWhere[] = '`' . $field . '`="' . $info[$field] . '"';
                                foreach ($vali['extend'] as $extendField) {
                                    if (isset($info[$extendField])) $arrtempWhere[] = '`' . $extendField . '`="' . $info[$extendField] . '"';
                                }
                                $strTempwhere = '';
                                if (!empty($arrtempWhere)) {
                                    $strTempwhere = ' where ' . implode(' and ', $arrtempWhere);
                                    if (in_array($this->ac, array('edit', 'batch_update'))) $strTempwhere .= ' and `' . $this->_dbfield['mainKey'] . '`!="' . $info[$this->_dbfield['mainKey']] . '"';
                                }
                                if ($strTempwhere) $arrTempData = db::get_one('select `' . $this->_dbfield['mainKey'] . '` from `' . $this->table . '` ' . $strTempwhere . ' limit 1');
                            } else {

                                if (in_array($this->ac, array('edit', 'batch_update'))) {
                                    $arrTempData = db::get_one('select `' . $this->_dbfield['mainKey'] . '` from `' . $this->table . '` where `' . $field . '`="' . $info[$field] . '" and `' . $this->_dbfield['mainKey'] . '`!="' . $info[$this->_dbfield['mainKey']] . '" limit 1');
                                } else {
                                    $arrTempData = db::get_one('select `' . $this->_dbfield['mainKey'] . '` from `' . $this->table . '` where `' . $field . '`="' . $info[$field] . '" limit 1');
                                }
                            }

                            if ($arrTempData) {
                                cls_msgbox::show('系统提示', $vali['2'], -1);
                                exit();
                            }
                        }
                    }
                }
            }
            //auto
            if (isset($this->_auto) && $this->_auto) {
                foreach ($this->_auto as $field => $vali) {
                    if (!isset($info[$field]) || empty($info[$field])) {
                        if (($vali['3'] == 'all' || $vali['3'] == 'update')) {
                            if ($vali['1'] == 'value' && isset($vali['2'])) {
                                $info[$field] = $vali['2'];
                            } elseif ($vali['1'] == 'function' && isset($vali['2'])) {
                                $info[$field] = $vali['2'];
                            }
                        }
                    }
                }
            }

            //验证上传文件
            if (isset($this->_uploadFile) && $this->_uploadFile) {
                foreach ($this->_uploadFile as $field => $arrItem) {
                    if (isset(req::$files[$field]['tmp_name']) && !empty(req::$files[$field]['tmp_name'])) {
                        $info[$field] = $this->update_image(req::$files[$field], $arrItem, $field, $info[$this->_dbfield['mainKey']]);
                        /*if($info[$field] && is_numeric($info[$this->_dbfield['mainKey']]) && $info[$this->_dbfield['mainKey']]>0){
                            db::query('update '.$this->table.' set `'.$field.'`="'. $info[$field].'" where `'.$this->_dbfield['mainKey'].'`='.$info[$this->_dbfield['mainKey']].' limit 1');
                        }*/

                    }
                }
            }


            $where_arr[] = "`" . $this->_dbfield['mainKey'] . "`='{$info[$this->_dbfield['mainKey']]}'";


            $result = false;
            if ($info && $where_arr) {
                //复选框未选中则不提交，应该把这部分清0。
                //tplc_havetitle, tplc_haveurl, tplc_havemediaurl, tplc_havesmallimg, tplc_havebigimg, tplc_havedescript, tplc_havedate
                if(!isset($info['tplc_havetitle'])) $info['tplc_havetitle'] = 0;
                if(!isset($info['tplc_haveurl'])) $info['tplc_haveurl'] = 0;
                if(!isset($info['tplc_havemediaurl'])) $info['tplc_havemediaurl'] = 0;
                if(!isset($info['tplc_havesmallimg'])) $info['tplc_havesmallimg'] = 0;
                if(!isset($info['tplc_havebigimg'])) $info['tplc_havebigimg'] = 0;
                if(!isset($info['tplc_havedescript'])) $info['tplc_havedescript'] = 0;
                if(!isset($info['tplc_havedate'])) $info['tplc_havedate'] = 0;
                $result = db::update($this->table, $info, $where_arr);
            }
            if ($result) {
                //是否需要清理缓存
                if (isset($this->_updateCache) && !empty($this->_updateCache)) {
                    foreach ($this->_updateCache as $arrItem) {
                        if (isset($arrItem['prefix']) && isset($arrItem['key']) && !empty($arrItem['key'])) {
                            $strCacehKeyTemp = '';
                            foreach ($info as $strField => $strFieldValue) {
                                $strCacehKeyTemp = str_ireplace('{{' . $strField . '}}', $strFieldValue, $arrItem['key']);
                            }
                            if ($strCacehKeyTemp) {
                                cache::del($arrItem['prefix'], $strCacehKeyTemp);
                                cache::set($arrItem['prefix'], $strCacehKeyTemp, null);
                            }
                        }
                    }
                }

                cls_msgbox::show('系统提示', '成功修改 id 为:' . $info[$this->_dbfield['mainKey']] . '的信息！', '?ct=' . $this->ct . '&ac=' . $this->listPage.'&data_id='.$info['tpl_id']);
            } else {
                cls_msgbox::show('系统提示', '没有检测到修改的更新信息！', -1);
            }

        } else {
            $sql = "SELECT {$this->table}.*,zhuanti_template.tpl_name FROM `{$this->table}` left join zhuanti_template on {$this->table}.tpl_id=zhuanti_template.tpl_id WHERE `" . $this->_dbfield['mainKey'] . "`='{$id}' LIMIT 1";
            $data = db::get_one($sql);

            tpl::assign('data', $data);


            if (file_exists(PATH_ROOT . '/templates/template/admin/' . $this->ct . '.' . $this->ac . '.tpl')) {

                tpl::display($this->ct . '.' . $this->ac . '.tpl');
            } else {
                exit('no tpl file');
            }
        }
    }

}