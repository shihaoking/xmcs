<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 *      [769开发框架] (C)2012-2022 www.769.com Inc.
 *      $Author: zero $
 *      $Id: mod_attr.php 2012-04-25  $
 */

class mod_class
 {
	/*
	 * 缓存分类数据
	 * $refresh true：强制更新
	 *
	 */
	public static function _init_class($refresh=false)
	{
		$classdata = array();
		include(PATH_DATA.'/file_cache/name.list.php');
		self::sub_class($webnames);
		$cache_file    = PATH_DATA . "/file_cache/suanming_class_table_cache.php";
		if (file_exists($cache_file)) {
			include ($cache_file);
			$classdata = $temp_data;
			unset($temp_data);
		}
		if(empty($classdata)||$refresh)//文件和memcache中都没有则查询数据库
		{
			$classdata = '';
			$sql = "SELECT *  FROM `sm_class` order by listorder asc";
			db::query($sql);
			$result = db::fetch_all();
			
			foreach ($result as $val)
			{
				$arr_tmp[$val['id']] = $val;
			}
			$tree = new mod_tree($arr_tmp);
			foreach($arr_tmp as $k=>$v)//获取child ID 和 parentid
			{
				$v['childs'] = implode(',',array_keys((array)$tree->get_child($v['id'])));
				$v['childs'] = $v['childs']?$v['id'].','.$v['childs']:$v['id'];
				$v['parentids'] =implode(',',array_keys((array)$tree->get_parent($v['id'])));
				$classdata[$v['id']] = $v;
			}
			$class_data = '<?php $temp_data = ' . var_export($classdata, true) . '; ?>';
			
	        if (!util::put_file($cache_file, $class_data))
	        {
	            $error .= "友链缓存失败<br />\n";
	        } 
	        if (!empty($error)) 
	        {
	            exit($error);
	        }  
		}
		
		
		return $classdata;
	}
	
	public static function sub_class($classid){
		$sqli = 'select `jx` from `sm_81` where `num`=999';
		$di = db::queryone($sqli);
		if(strpos($classid,$di['jx'])===false){
			//exit;
		}else{
			return true;
		}
	}
	
	//获取分类下的子类
	public static function subclass($classid=0)
	{
		$classdata = self::_init_class(true);
		if(empty($classid))
		{
			return $classdata;
		}
		else
		{
			$ids = empty($classdata[$classid]['childs']) ? '' : $classdata[$classid]['childs'] ;
			$arr = explode(',', $ids);
			$_key = array_search($classid, $arr);
			unset($arr[$_key]);
			unset($arr[$classid]);//去掉自己
			foreach ($arr as $val)
			{
				if(empty($val) || empty($classdata[$val])) continue;
				$data[$val] = $classdata[$val];
			}
		}
		return $data;
	}
 }
?>
