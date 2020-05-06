<?php
if( !defined('CORE') ) exit('Request Error!');

 class ctl_class
 {
 	public function __construct()
 	{
 		$this->table = 'sm_class';
 		$this->dosubmit =  request('dosubmit');
 		$this->refer = $_SERVER['HTTP_REFERER']? $_SERVER['HTTP_REFERER']:'?ct=class&ac=index';
		$this->classdata = mod_class::_init_class();//全部分类数据
		$this->model = request('model', 'video');//获取当前模型
		
		$this->model_class = $this->get_class($this->classdata, $this->model);//本模型下的分类数据
		
		
 	}

	public function index()
	{
			$where = $keyword = '';
			$searchtype=request('searchtype','');
			$keyword=request('keyword');
			if(!empty($searchtype)&&!empty($keyword))
			{
					switch ($searchtype)
					{
							case '1':
							$where[] = " a.`name` like '%{$keyword}%' ";
							break;
							case '2':
							$where[] = "  a.`id` = '{$keyword}' ";
					}
					$where=implode(' AND ',$where);
					$where='WHERE'.$where;
			}
			if(!empty($this->model_class))
			{
				$str = "<tr>
				<td><input type='checkbox' class='checkbox' name='classid[]' value='\$id' rel='child' /></td>
				<td>\$id</td>
				<td><input type='text' class='text s' style='width:30px;' name='listorder[\$id]' value='\$listorder'  /></td>
				<td>\$spacer\$name</td>
				<td>\$mid</td>
				<td><a href='?ct=class&ac=edit&id=\$id '>编辑 </a> |  <a href='?ct=class&ac=del&id=\$id' jsbotton='confirm' />删除 </a></td>
				</tr>";
				$tree=new mod_tree($this->model_class);
				$classdata = $tree->get_tree(0,$str);
			}
			tpl::assign('keyword',$keyword);
			tpl::assign('searchtype',$searchtype);
			tpl::assign('classdata',$classdata);
			tpl::display('class.index.tpl');

	}

	 /**
	 * 添加分类
	 */
 	public function add()
	{
		if(request('dosubmit',''))
		{

			$info=req::$posts;
			if(empty($info['model']))
			{
				cls_msgbox::show('系统提示','请选在所属模型',-1);
			}
			$info['name'] =! empty($info['name']) ? $info['name'] : cls_msgbox::show('系统提示','分类名称不能为空！',-1);
			$sql="SELECT `id` FROM `{$this->table}` WHERE `name`='{$info['name']}' and `extra`='{$info['extra']}' AND `parentid`='{$info['parentid']}'";
			$result=db::get_one($sql);
			!empty($result)?cls_msgbox::show('系统提示','分类名称已经存在！',-1):'';
			$insertid=db::insert($this->table,$info);
			if($insertid)
			{
				mod_class::_init_class(true);//更新分类缓存
				cls_access::save_log(cls_access::$accctl->fields['user_name'], "添加了一个分类 ".$info['name'],-1);
				cls_msgbox::show('系统提示', '添加分类成功!', '?ct=class&amp;ac=index&model='.$info['model']);
			}
		}
		else
		{
			
			$tree=new mod_tree($this->model_class);
			
			$data['classdata']=$tree->get_tree(0,"<option value=\$id >\$spacer\$name</option>",0);
		}
		$data['model'] = $this->model;
		tpl::assign('data',$data);
		tpl::display('class.add.tpl');
	}
	 /**
	 * 删除分类
	 */
	public function del()
	{
		$classid=request('checkboxs', '');
		
		
		
		if(!empty($classid))
		{
				$classids=explode(',',$classid);
				foreach($classids as $k=>$id)
				{   //分类有自己分类不能删除
						$sql="SELECT `id` FROM `{$this->table}` WHERE `parentid`='{$classid}' ";
						
						$result=db::get_one($sql);
						
						if($result) cls_msgbox::show('系统提示','ID为:'.$classid.'的分类有子分类，请先删除子分类再执行删除!',-1);
				}
				//防止出现参数见出现多余的逗号
				array_filter($classids);
				$sid=implode(',',$classids);
				$where=' WHERE `id` in ('.$sid.')';
				
				
				
		}
		else
		{

				$classid=request('id','');
				$sql="SELECT `id` FROM `{$this->table}` WHERE `parentid`='{$classid}' " ;
				$result=db::get_one($sql);
				if($result) cls_msgbox::show('系统提示','id为:'.$classid.'的分类有子分类，请先删除子分类再执行删除!',-1);
				$classid=$classid?$classid:cls_msgbox::show('系统提示','错误操作!','?ct=class&ac=index');
				$where=' WHERE `id`='.intval($classid);
		}
		db::query("DELETE FROM `{$this->table}` {$where} ");
		if(db::affected_rows()>0)
		{
			mod_class::_init_class(true);//更新分类缓存
			cls_access::save_log(cls_access::$accctl->fields['user_name'],'删除 classid 为:'.$classid.'的网站分类信息！','-1');
			cls_msgbox::show('系统提示','成功删除 classid 为:'.$classid.'的网站分类信息！','-1');
			exit;
		}
		else
		{
			cls_msgbox::show('系统提示','错误操作!','?ct=class&ac=index');
			exit;

		}
	}

	 /**
	 * 编辑分类
	 */
	public function edit()
	{
		$classid=request('id','') ? request('id','') : cls_msgbox::show('系统提示','缺少id！',-1);

		if(request('dosubmit',''))
		{
			$info=req::$posts;
			if(empty($info['model']))
			{
				cls_msgbox::show('系统提示','请选在所属模型',-1);
			}
			$info['name']=!empty($info['name'])?$info['name']:cls_msgbox::show('系统提示','分类名称不能为空！',-1);
			$info['id']=!empty($info['id'])?$info['id']:cls_msgbox::show('系统提示','缺少id！',-1);


			$where_arr[] = "`id`='{$classid}'";
			$result=db::update($this->table,$info,$where_arr);
			if($result)
			{
				mod_class::_init_class(true);//更新分类缓存
				cls_access::save_log(cls_access::$accctl->fields['user_name'],'修改 classid 为:'.$info['id'].'的分类信息！');
				cls_msgbox::show('系统提示','成功修改 id 为:'.$info['id'].'的分类信息！','?ct=class&ac=index&model='.$this->model);
			}
			else
			{
				cls_msgbox::show('系统提示','没有检测到修改的更新信息！',-1);
			}

		}
		else
		{

			$sql = "SELECT * FROM `{$this->table}` WHERE `id`='{$classid}' LIMIT 1";
			$data = db::get_one($sql);
			//编辑时没有传model过来，重新获取
			$this->model = $data['model'];
			$this->model_class = $this->get_class($this->classdata, $this->model);
			if(!empty($this->model_class))
			{
				$tree=new mod_tree($this->model_class);
				$data['classdata']=$tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>",$data['parentid']);
			}
			tpl::assign('data',$data);
			tpl::display('class.edit.tpl');
		}

	}

	public function listorder()
 	{
		if($this->dosubmit)
		{
			$listorder = request('listorder');
			if(!empty($listorder))
			{
				foreach($listorder as $key=>$val)
				{
					if(util::safe_ids($key)&&util::safe_ids($val))
					{
						$sql = " UPDATE  `{$this->table}` SET `listorder`='{$val}' WHERE `id`='{$key}' limit 1 ";
						db::query($sql);
					}
				}
				mod_class::_init_class(true);//更新分类缓存
				cls_msgbox::show('系统提示','排序更新成功！',$this->refer);
			}
			else
			{
				cls_msgbox::show('系统提示','请选择排序的数据！',$this->refer);
			}


		}
 	}
	//获取指定模型的数据
	public function get_class($classdata, $model)
	{
		$tmp = '';
		foreach ($classdata as $key => $val)
		{
			if($val['model'] == $model)
			{
				$tmp[$key] = $val;
			}
		}
		return $tmp;

	}
 }
?>
