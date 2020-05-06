<?php
/**
 * 黄道吉日查询(黄历)
 */
class cls_laohuangli
{
    /**
     * 开启缓存
     * @var boolean
     */
    public static $cache_enabled = true;
     
    /**
     * 缓存 prefix
     * @var string
     */
    public static $cache_prefix = 'tool_live_nongli';
    
    /**
     * 默认缓存时间
     * @var int
     */
    public static $cache_default_timeout = 86400; // 24 * 60 * 60 = 86400

	/**
	 * 获取老黄历
	 *
	 * @param  string $date   1999-9-9
	 * @return array
	 */
	public static function get_hdjr($date)
	{
        // 取缓存
        if($data = self::get_cache($date, 1))
        {
			
            return $data;
        }
		
		$url = "http://www.kaiy8.com/?ct=api&ac=huangli_ajax&type=".$date;
		$data =file_get_contents($url);
		$data = json_decode($data,true);
		
        if (empty($data)) return false;

        if ($data)
        {
            $cache_path = PATH_DATA.'/db/nongli/'.substr($date, 0, 4);
            $handle = put_file($cache_path.'/'.$date.'_hdjr.txt', serialize($data));

            if($handle === false)
            {
                self::log('无法写入'.$date);
            }

        }
        return $data;
	}

	/**
	 * 获取时辰格局
	 *
	 * @param  string $date   1999-9-9
	 * @return array
	 */
	public static function get_scgj($date)
	{
        // 取缓存
        if($data = self::get_cache($date, 2))
        {
            return $data;
        }
        // 取数据库
        $data=db::queryone("select * from `tool_hdjr_scgj` where `date` = '$date' order by `date`,'shichen'");
        
        if (empty($data)) return false;

        if ($data)
        {
			
            $cache_path = PATH_DATA.'/db/nongli/'.substr($date, 0, 4);
            $handle = put_file($cache_path.'/'.$date.'_hdjr_scgj.txt', serialize($data));
            if($handle === false)
            {
                self::log('无法写入'.$date);
            }

        }
        return $data;
	}

	
	/****
	 *黄道吉日择日
	 */
	public static function zeri($s_time,$e_time,$lmanacType,$lmanacCond){
		tpl::hosts($_SERVER['HTTP_HOST'])==false?exit:"";
		$data = file_get_contents('http://www.kaiy8.com/?ct=api&ac=zeri&s_time='.$s_time.'&e_time='.$e_time.'&lmanacType='.$lmanacType.'&lmanacCond='.$lmanacCond);
		$data=json_decode($data,true);
		return $data['datalist'];
		
	}
	
	/**
	 * 搜索黄道吉日
	 *
	 * @param  string $sth '嫁娶'
	 * @return array
	 */
	public static function search_hdjr($year = '', $sth = '')
	{
        if(!$sth || !$year)
        {
            return false;
        }
        // 取缓存
        if($data = self::get_cache($year, 3, $sth))
        {
            return $data;
        }
        
        cls_database::query("select `date` from `tool_hdjr` where `date` like '$year%' and yi like '%$sth%'");
        $result = cls_database::fetch_all();
        if (empty($result)) return false;
        foreach($result as $row)
        {
            $data[] = $row['date'];
        }

        if ($data)
        {
            $cache_path = PATH_DATA.'/db/nongli/'.$year;
            $handle = put_file($cache_path.'/'.$year.'_'.$sth.'.txt', serialize($data));

            if($handle === false)
            {
                self::log('无法写入'.$year);
            }

        }
        return $data;
	}

	/**
	 * 读缓存
	 *
	 * @param  string $date   1999-9-9
	 * @param  int $type_id   1
	 * @return array
	 */
	public static function get_cache($date, $type_id = 1, $sth = '')
	{
        $types = array(1 => 'hdjr', 2 => 'scgj', 3 => $sth);
        $cache_path = PATH_DATA.'/db/nongli/'.substr($date, 0, 4).'/'.$date.'_'.$types[$type_id].'.txt';
        if(is_file($cache_path))
        {
			
            $content = file_get_contents($cache_path);
			
            $content = unserialize($content);
			
            return $content;
        }
        return false;
	}

    /* 记录错误日志 */
    public static function log($content)
    {
        // 记录错误日志
        $log = date ( "Y-m-d h:i:s" ) .' '.$content."\n";
        $log_path = PATH_DATA . '/log/nongli-'.date('Y-m-d').'.log';
        error_log ( $log, 3,  $log_path);
    }


    /* 历史上的今天接口 */
    public static function history_api($date)
    {
        //取缓存
        if (self::$cache_enabled) 
        {
	        $cache_data = get_cache(self::$cache_prefix . '_history_api', $date);
	        if (!empty($cache_data)) return $cache_data;
        }

		$api = "http://history.xxx.com/api/?date=" . $date;
		$data = cls_curl::get ( $api );

        if(self::$cache_enabled && $data != 'var history_data = false')
        {
	        set_cache(self::$cache_prefix . '_history_api', $date, $data, self::$cache_default_timeout);
        }
        return $data;
    }
}
?>
