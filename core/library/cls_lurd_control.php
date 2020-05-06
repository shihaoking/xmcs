<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * Lurd操作类，全自动操作的处理程序
 *
 * 可能通过 add、edit、list、delete 方法直接完成整个表相关的所有操作(模板也自动生成)
 *
 * @version $Id$
 *
 */
 class cls_lurd_control extends cls_lurd
 {

    public $appname = '';          //应用名称，没指定用表名

    public $template_path = '';     //生成的模板保存目录，由于模板类限制了目录为PATH_ROOT.'/templates/template/'
                                    //因此这里指定的是居于这个目录的子目录，不改变可以保留空，而不是绝对路径

    public $always_make = false;    //true--总是生成模板(通常在调试时才会使用)，false--没发现模板的情况才会生成。

    public $form_url = '?ct=lurd';  //默认控制器网址(在控制器的index方法里调用lurd类)

    public $list_config = array('listfield'=>'*', 'orderquery'=>'', 'wherequery'=>'', 'searchfield'=>'*');  //列出数据时指定的特殊条件

    public $datas = array();   //列表或编辑记录时的当前数据

    private $assign_vars = array();  //向模板传递特定值

    //手工指定模板文件名
    public $tpl_files = array('list'=>'', 'add'=>'', 'edit'=>'');
    
    //完成操作后自行操作还是lurd类由自行控制
    public $end_need_done = false;
    
    //类里控制输出还是手工控制(默认由类控制)
    public $end_display = true;
    
    private $display_tpl = '';


   /**
    * 把表名映射成类的工厂方法
    * @parem $tablename
    */
    public static function factory($tablename, $form_url='?ct=lurd', $template_path='', $always_make=false)
    {
        $cls = new cls_lurd_control();
        $cls->set_table( $tablename );
        $cls->template_path = $template_path;
        $cls->form_url = $form_url;
        $cls->always_make = $always_make;
        return $cls;
    }

   /**
    * 设置查询条件
    * @parem $listfield     列出的字段
    * @parem $orderquery    排序查询条件，如： order by id desc
    * @parem $wherequery    手动指定查询条件(建议用 add_search_condition($wherequery, $link='and') 指定
    * @parem $searchfield   like查询使用的字段
    */
    function set_list_config($listfield='*', $orderquery='', $wherequery='', $searchfield='*')
    {
        $this->list_config['listfield'] = $listfield;
        $this->list_config['orderquery'] = $orderquery;
        $this->list_config['wherequery'] = $wherequery;
        $this->list_config['searchfield'] = $searchfield;
    }
    
    /**
    * 追加手动查询条件
    * 会把查询条件追加到  $this->list_config['wherequery'] (注意使用了$this->list_config['wherequery']后 add_search_parameter 无效！)
    * @parem $wherequery    手动指定查询条件
    * @parem $link          用 and 还是 or 连结（如果list_config['wherequery']为空，会忽略此参数）
    * @return void
    */
    function add_search_condition($wherequery, $link='and')
    {
        $this->list_config['wherequery'] .= ($this->list_config['wherequery']=='' ? ' where '.$wherequery : " {$link} {$wherequery}");
    }

   /**
    * 手工指定生成的模板名
    */
    public function set_tplfiles($list='', $add='', $edit='')
    {
        $this->tpl_files['list'] = $list;
        $this->tpl_files['add']  = $add;
        $this->tpl_files['edit'] = $edit;
    }

    /**
    * 事件监听器
    * @parem array() $request_array  与字段相关的键值表
    * @parem  $even 事件（add, saveadd, edit, saveedit, delete, list）
    */
    public function listen(&$request_array)
    {
        $even = isset($request_array['even']) ? $request_array['even'] : 'list';
        switch($even)
        {
            case 'add':
                $this->e_add($request_array);
                break;
            case 'saveadd':
                $this->e_saveadd($request_array);
                break;
            case 'edit':
                $this->e_edit($request_array);
                break;
            case 'saveedit':
                $this->e_saveedit($request_array);
                break;
            case 'delete':
                $this->e_delete($request_array);
                break;
            default:
                $this->e_list($request_array);
                break;
        }
    }

   /**
    * 向模板传递特定的值(仅保存值)
    */
    public function assign($key, $value)
    {
        $this->assign_vars[$key] = $value;
    }

   /**
    * 向模板传递特定的值（实际处理）
    */
    private function assign_all()
    {
        foreach($this->assign_vars as $k=>$v)
        {
            tpl::assign($k, $v);
        }
    }

   /**
    * 显示模板
    */
    public function display( )
    {
        $this->assign_vars['lurd'] = $this;
        $this->assign_all();
        tpl::display( $this->display_tpl );
    }

   /**
    * 检测模板是否存在
    */
    function check_template( $even )
    {
        $tpl = tpl::init();
        $tpldir = $tpl->template_dir.( empty(tpl::$appname) ? '' : tpl::$appname.'/' );
        if( !is_dir($tpldir) )
        {
            mkdir($tpldir, 0777);
        }
        $tplfile = empty($this->tpl_files[$even]) ? $tpldir.'lurd.'.$this->table_name.'.'.$even.'.tpl' : $tpldir.$this->tpl_files[$even];
        return array(file_exists($tplfile), $tplfile);
    }

    /**
    * 获取lurd模板的模板
    */
    function get_template( $even )
    {
        $tpl = tpl::init();
        $tpldir = $tpl->template_dir.'system/';
        $tplfile = $tpldir.'lurd.'.$even.'.tpl';
        return (file_exists($tplfile) ? file_get_contents($tplfile) : '');
    }

   /**
    * 获取当前页的数据
    */
    public function list_datas()
    {
        $datas = $this->get_datas($this->page_no, $this->list_config['listfield'], $this->list_config['orderquery'], $this->list_config['wherequery']);
        $this->datas = $GLOBALS['lurd_datas'] = $datas['data'];
    }

    /**
    * 具体事件——列出数据
    */
    public function e_list(&$request_array)
    {
        //生成模板
        $primary_key = !preg_match("/,/", $this->primary_key) ? $this->primary_key : 'primarykey';
        $testtpl = $this->check_template( 'list' );
        if( !$testtpl[0] || $this->always_make )
        {
            $replaces = array('appname'=>'','lurdurl'=> $this->form_url,'tablename'=> $this->table_name,'primarykey'=>$primary_key,'listtitle'=>'', 'listitem'=>'', 'itemcount'=>2);
            $arr = $this->build_tamplate_list_r( $this->list_config['listfield'] );
            $replaces['listtitle'] = $arr['listtitle'];
            $replaces['listitem'] = $arr['listitem'];
            $replaces['itemcount'] = $arr['itemcount'];
            $replaces['appname'] = empty($this->appname) ? $this->table_name : $this->appname;
            $tmpstr = $this->get_template('list');
            foreach($replaces as $k=>$v)
            {
                $tmpstr = str_replace('~'.$k.'~', $v, $tmpstr);
            }
            file_put_contents($testtpl[1], $tmpstr);
        }
        $pagesize = $this->page_size;
        $orderby = preg_replace("/[^a-z_]/i", '', (isset($request_array['orderby']) ? $request_array['orderby'] : ''));
        $keyword = trim(isset($request_array['keyword']) ? $request_array['keyword'] : '');
        $start = isset($request_array['start']) ? intval($request_array['start']) : 0;
        $this->page_no = floor($start/$pagesize) + 1;
        $url = "{$this->form_url}&even=list&tb={$this->table_name}";

        $tpl = empty($this->tpl_files['list']) ? 'lurd.'.$this->table_name.'.list.tpl' : $this->tpl_files['list'];

        if($this->list_config['searchfield'] != '' && $this->list_config['searchfield'] != '*' && $keyword != '')
        {
            $fieldname = '`'.$this->list_config['searchfield'].'`';
            if( preg_match('/,/', $this->list_config['searchfield']) )
            {
                $fs = explode(',', $this->list_config['searchfield']);
                $fieldname = 'CONCAT(';
                foreach($fs as $f)
                {
                    $f = trim($f);
                    $fieldname .= ($fieldname=='CONCAT(' ? "`{$f}`" : ",`{$f}`");
                }
                $fieldname .= ' ) ';
            }
            $this->add_search_condition(" {$fieldname} like '%{$keyword}%' ", 'and');
            $url .= "&keyword=".urlencode(stripslashes($keyword));
        }
        if($orderby != '' && $this->list_config['orderquery']=='')
        {
            $this->list_config['orderquery'] = "order by `{$orderby}` desc";
            $url .= "&orderby={$orderby}";
        }
        $this->list_datas();
        $this->assign('lurd_pagination', $this->get_pagination($url));
        $this->display_tpl = $tpl;
        if($this->end_display)
        {
            $this->display();
        }
        if( !$this->end_need_done && $this->end_display )
        {
            exit();
        }
    }

   /**
    * 具体事件——添加数据（显示表单部份的程序）
    */
    public function e_add(&$request_array)
    {
        //生成模板
        $testtpl = $this->check_template( 'add' );
        if( !$testtpl[0] || $this->always_make )
        {
            $replaces = array('appname'=>'','lurdurl'=> $this->form_url,'tablename'=> $this->table_name, 'listitem');
            $arr = $this->build_tamplate_list_r( $this->list_config['listfield'] );
            $replaces['appname'] = empty($this->appname) ? $this->table_name : $this->appname;
            $replaces['listitem'] = $this->build_tamplate_add();
            $tmpstr = $this->get_template('add');
            foreach($replaces as $k=>$v)
            {
                $tmpstr = str_replace('~'.$k.'~', $v, $tmpstr);
            }
            file_put_contents($testtpl[1], $tmpstr);
        }
        $tpl = empty($this->tpl_files['add']) ? 'lurd.'.$this->table_name.'.add.tpl' : $this->tpl_files['add'];
        $this->display_tpl = $tpl;
        if($this->end_display)
        {
            $this->display( );
        }
        if( !$this->end_need_done && $this->end_display )
        {
            exit();
        }
    }

    /**
    * 具体事件——保存添加数据
    */
    public function e_saveadd(&$request_array)
    {
        $this->insert($request_array);
        if( !$this->end_need_done )
        {
            cls_msgbox::show('系统提示', '成功增加一条记录！', '');
            exit();
        }
    }

    /**
    * 具体事件——修改数据（显示表单部份的程序）
    */
    public function e_edit(&$request_array)
    {
        //生成模板
        $primary_key = !preg_match("/,/", $this->primary_key) ? $this->primary_key : 'primarykey';

        if( !isset($request_array[$primary_key]) )
        {
            cls_msgbox::show('系统提示', '没有指定要修改的记录！', '-1');
            exit();
        }

        //获取更新条件
        $keyvalue = $request_array[$primary_key];
        $condition = ( !preg_match("/,/", $this->primary_key) ? " `{$this->primary_key}`='{$keyvalue}' " : " MD5( CONCAT(`".str_replace(',', '`,`', $this->primary_key)."`) ) = '{$keyvalue}' " );

        $testtpl = $this->check_template( 'edit' );
        if( !$testtpl[0] || $this->always_make )
        {
            $replaces = array('appname'=>'','lurdurl'=> $this->form_url,'tablename'=> $this->table_name, 'listitem');
            $replaces['appname'] = empty($this->appname) ? $this->table_name : $this->appname;
            $replaces['listitem'] = $this->build_tamplate_edit();
            $tmpstr = $this->get_template('edit');
            foreach($replaces as $k=>$v)
            {
                $tmpstr = str_replace('~'.$k.'~', $v, $tmpstr);
            }
            file_put_contents($testtpl[1], $tmpstr);
        }
        $sql = "Select * From `{$this->table_name}` where {$condition} limit 1";
        $this->datas[] = db::get_one($sql);
        $tpl = empty($this->tpl_files['edit']) ? 'lurd.'.$this->table_name.'.edit.tpl' : $this->tpl_files['edit'];
        $this->display_tpl = $tpl;
        if($this->end_display)
        {
            $this->display( );
        }
        if( !$this->end_need_done && $this->end_display )
        {
            exit();
        }
    }

   /**
    * 具体事件——保存数据修改
    */
    public function e_saveedit(&$request_array)
    {
        $this->update($request_array);
        if( !$this->end_need_done )
        {
            cls_msgbox::show('系统提示', '成功修改一条记录！', '');
            exit();
        }
    }

    /**
    * 具体事件——删除记录
    */
    public function e_delete(&$request_array)
    {
        if( !preg_match("/,/", $this->primary_key) )
        {
            $primary_key = $this->primary_key;
        }
        else
        {
            $primary_key = 'primarykey';
        }
        if( !isset($request_array[$primary_key]) || !is_array($request_array[$primary_key]) )
        {
            cls_msgbox::show('系统提示', '你没指定要删除的记录！', $this->form_url.'&tb='.$this->table_name);
            exit();
        }
        else
        {
            $this->delete($request_array[$primary_key]);
            if( !$this->end_need_done )
            {
                cls_msgbox::show('系统提示', '成功删除指定记录！', $this->form_url.'&tb='.$this->table_name);
                exit();
            }
        }
    }

    /**
    * 生成列表模板
    * @parem  $listfields
    * @return array()
    */
    protected function build_tamplate_list_r($listfield="*")
    {
            $temparr = array();
            //设置选择项
            $totalitem = 1;
            $titleitem = "  <td> <a href='javascript:select_all(null);'>选择</a> </td>\n";
            if( !preg_match("/,/", $this->primary_key) )
            {
                    $fielditem = "  <td><a href=\"javascript:show_data('<{\$v.{$this->primary_key}}>');\"><img src='/static/images/ico-edit.png' alt='修改' title='修改' border='0' /></a><input type='checkbox' name='{$this->primary_key}[]' value='<{\$v.{$this->primary_key}}>' /></td>\n";
            }
            else
            {
                    $fielditem = "  <td><a href=\"javascript:show_data('<{lurd do=\"make_key\" var=\$v format=\"{$this->primary_key}\" }>');\"><img src='/static/images/ico-edit.png' alt='修改' title='修改' border='0' /></a><input type='checkbox' name='primarykey[]' value=\"<{lurd do='make_key' var=\$v format='{$this->primary_key}' }>\" /></td>\n";
            }
            //使用手工指定列出字段
            if(empty($listfield) || trim($listfield) == '*' )
            {
                $listfield = '';
                foreach($this->fields as $k=>$v)
                {
                    $listfield .= ($listfield=='' ? $k : ','.$k);
                }
            }
                $listfields = explode(',', $listfield);
                $totalitem = count($listfields) + 1;
                foreach($listfields as $k)
                {
                       $k = trim($k);
                       if( !isset($this->fields[$k]) ) continue;
                       $v = $this->fields[$k];
                       if( !empty($this->fields[$k]['comment']) )
                         {
                              $titlename = $this->fields[$k]['comment'];
                         }
                         else
                         {
                              $titlename = $k;
                         }
                       $titleitem .= "    <td><strong>{$titlename}</strong></td>\n";
                       $totalitem++;
                       if( !empty($v['listtemplate']) )
                       {
                            $fielditem .= "  <td>{$v['listtemplate']}</td>\n";
                       }
                       else
                       {
                            $dofunc = $dtype = $fformat = '';
                            $dtype = !empty($v['type']) ? $v['type'] : 'check';
                            if(isset($v['format']))
                            {
                                $fformat = $v['format'];
                            }
                            if(isset($v['dofunc']))
                            {
                                $dofunc = $v['dofunc'];
                            }
                            if(isset($v['type']))
                            {
                                $this->fields[$k]['type'] = $v['type'];
                            }
                            $dofunc = $this->get_field_template( $v['type'], $k, $fformat, $dofunc );
                            $fielditem .= "  <td> $dofunc </td>\n";
                    }
              }//End foreach
            //是否有联结其它的表
            $islink = count($this->link_tables) > 0 ? true : false;
            //附加表的字段
            if($islink)
            {
                 foreach($this->add_fields as $k=>$v)
                 {
                        if(in_array($v['type'], $this->bin_types) )
                        {
                            continue;
                        }
                        $totalitem++;
                        $titleitem .= "  <td>$k</td>\n";
                        $dofunc = $this->get_field_template( $v['type'], $k, '', '' );
                        $fielditem .= "  <td> $dofunc </td>\n";
                 }
            }
            $temparr['listtitle'] = $titleitem;
            $temparr['listitem'] = $fielditem;
            $temparr['itemcount'] = $totalitem;
            return $temparr;
    }

    /**
    * 生成列表模板(仅输出样例，用于由用户手动指定控制类的情况)
    * @parem  $listfields
    * @return string
    */
    public function build_tamplate_list($listfields="*")
    {
        $tempstr = '';
        $arr = $this->build_tamplate_list_r($listfields);
            $tempstr .= "<!-- datas数据来源： \$datas = \$lurdobj->get_datas( \$pageno, \$listfield, \$orderquery); -->\n";
            $tempstr .= '<form name="form1" action="" method="POST">'."\n";
            $tempstr .= '<table width="100%" border="0" cellspacing="1" cellpadding="1">'."\n";
            $tempstr .= "<tr>\n".$arr['listtitle']."</tr>\n";
            $tempstr .= "<{foreach from=\$datas.data key=k item=v}>\n";
            $tempstr .= "<tr>\n".$arr['listitem']."</tr>\n";
            $tempstr .= "<{/foreach}>\n";
            $tempstr .= "</table>\n";
            $tempstr .= "<form>\n";
            $tempstr .= "<{\$datas.pagination}>";
            return $tempstr;
    }

   /**
    * 获取字段处理模板
    */
    private function get_field_template( $ftype, $fname, $fformat='', $dofunc='' )
    {
        if( in_array($ftype, $this->float_types) )
                {
                        $dofunc = ($dofunc=='' ? "<{lurd do=\"format_float\" var=\$v.{$fname} format=\"$fformat\" }>" : $dofunc);
                }
                else if( in_array($ftype, $this->date_types) )
                {
                        $dofunc = ($dofunc=='' ? "<{lurd do=\"format_date\" var=\$v.{$fname} format=\"$fformat\" }>" : $dofunc);
                }
                else {
                    $dofunc = ($dofunc=='' ? "<{\$v.{$fname}}>" : $dofunc);
                }
        return $dofunc;
    }

    /**
    * 生成列表发布模板
    * @return string
    */
    public function build_tamplate_add()
    {
            return $this->build_tamplate_edit( 'add' );
    }

    /**
     *
     * 生成编辑模板
     *
     * @return string
    */
    public function build_tamplate_edit( $getTemplets='edit' )
    {
        $tempstr = '';
            $tempItems = array('fields'=>'', 'primarykey'=>'');
            $tempItems['fields'] = '';
            if( !preg_match('/,/', $this->primary_key) )
            {
                    $tempItems['primarykey'] = "<input type='hidden' name='{$this->primary_key}' value='<{\$v.{$this->primary_key}}>' />\n";
            }
            else
            {
                    $tempItems['primarykey'] = "<input type='hidden' name='primarykey' value=\"<{lurd var=\$data do='make_key' format='{$this->primary_key}' }>\" />\n";
            }
            $fielditem = '';
            foreach($this->fields as $k=>$v)
            {
                    $aeform = $dtype = $defaultvalue = $fformat = '';
                    //在指定了字段模板情况下不使用自动生成
                    if(isset($this->fields[$k][$getTemplets.'template']))
                    {
                            $fielditem .= $this->fields[$k][$getTemplets.'template'];
                            continue;
                    }
                    //排除自动递增键
                    if($k==$this->auto_field)
                    {
                        continue;
                    }
                    //编辑时，排除主键
                    if($k==$this->primary_key && $getTemplets=='edit')
                    {
                        continue;
                    }
                    //格式化选项(编辑时用)
                    if(isset($this->fields[$k]['format']))
                    {
                            $fformat = $this->fields[$k]['format'];
                    }
                    //获得字段默认值（编辑时从数据库获取）
                    if($getTemplets=='edit')
                    {
                            if( in_array($this->fields[$k]['type'], $this->bin_types) ) $dfvalue = '';
                            else $dfvalue = "<{\$v.{$k}}>";
                    }
                    else
                    {
                            $dfvalue = $this->fields[$k]['default'];
                    }
                    if( !empty($this->fields[$k]['comment']) )
                    {
                          $titlename = $this->fields[$k]['comment'];
                    }
                    else
                    {
                         $titlename = $k;
                     }
                    //小数类型
                    if( in_array($this->fields[$k]['type'], $this->float_types) )
                    {
                            if($getTemplets=='edit')
                            {
                                    $dfvalue = "<{lurd var=\$v.{$k} do=\"format_float\" format=\"{$fformat}\" }>";
                            }
                            else if($this->fields[$k]['default']=='')
                            {
                                    $dfvalue = 0;
                            }
                            $aeform  = "<input type='text' name='{$k}' class='text s' value='$dfvalue' />";
                    }
                    //整数类型
                    if( in_array($this->fields[$k]['type'], $this->int_types) )
                    {
                            $aeform  = "<input type='text' name='{$k}' class='text s' value='$dfvalue' />";
                    }
                    //时间类型
                    else if( in_array($this->fields[$k]['type'], $this->date_types))
                    {
                            if(empty($fformat)) $fformat = 'Y-m-d H:i:s';
                            if($getTemplets=='edit')
                            {
                                $dfvalue = "<{lurd var=\$v.{$k} do=\"format_date\" format=\"$fformat\" }>";
                            }
                            else if(empty($this->fields[$k]['default']))
                            {
                                $dfvalue = "<{lurd var=\"\" do=\"format_date\" format=\"\" }>";
                            }
                            $aeform  = "<input type='text' name='{$k}' class='txts' value='$dfvalue' />";
                    }
                    //长文本类型
                    else if( in_array($this->fields[$k]['type'], $this->text_types))
                    {
                            $aeform  = "<textarea name='$k' class='txtarea'>{$dfvalue}</textarea>";
                    }
                    //二进制类型
                    else if( in_array($this->fields[$k]['type'], $this->text_types))
                    {
                            $aeform = "<input type='file' name='$k' size='45' />";
                    }
                    //SET类型
                    else if( $this->fields[$k]['type']=='SET' )
                    {
                            $ems = explode(',', $this->fields[$k]['em']);
                            if($getTemplets=='edit')
                            {
                                $aeform .= "<{lurd_set item='em' em='{$fields[$k]}' sel='$v.{$k}'}>";
                            }
                            foreach($ems as $em)
                            {
                                 if($getTemplets=='add')
                                 {
                                      $aeform .= "<input type='checkbox' name='{$k}[]' value='<{$em}>' /><{$em}> \n";
                                 }
                                 else
                                 {
                                      $aeform .= "<input type='checkbox' name='{$k}[]' value='<{$em}>' <{if in_array('$em', \$enumItems)}>checked<{/if}> /><{$em}> \n";
                                 }
                            }
                            $aeform .= "<{/lurd_set}>";
                    }
                    //ENUM类型
                    else if( $this->fields[$k]['type']=='ENUM' )
                    {
                            $ems = explode(',', $this->fields[$k]['em']);
                            foreach($ems as $em)
                            {
                                    if($getTemplets=='edit')
                                    {
                                            $aeform .= "<input type='radio' name='$k' value='$em' <{if \$v.{$k}=='$em'}>checked<{/if}> />$em \n";
                                    }
                                    else
                                    {
                                            $aeform .= "<input type='radio' name='$k' value='$em' />$em \n";
                                    }
                            }
                    }
                    else
                    {
                            if($getTemplets=='add')
                              {
                                $aeform  = "<input type='text' name='{$k}' class='text' value='$dfvalue' />";
                            }
                            else
                            {
                                $aeform  = "<input type='text' name='{$k}' class='text' value='<{\$v.{$k}}>' />";
                            }
                    }
                    $fielditem .= "<tr>\n  <td class='title'>{$titlename}</td>\n  <td class='fitem'>{$aeform}</td>\n</tr>\n";
            }//end foreach
            $tempItems['fields'] = $fielditem;
            if($getTemplets=='edit')
                {
                    $tempstr .= $tempItems['primarykey'];
            }
                $tempstr .=$tempItems['fields'];
            return $tempstr;
    }

 }//end class
