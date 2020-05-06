<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 数据库操作类 <<读写分离>>
 *
 * 读 - mysql master
 *    - mysql slave 1
 *    - mysql slave 2
 *    ......
 *
 * 写 - master
 *
 * @author itprato<2500875@qq>
 * @version $Id$
 */

class db
{
    
    //连接默认是 $links[ self::$link_name ]['w'] ||  $links[ self::$link_name ]['r']
    //如果用户要开一个新的连接, 用 set_connect($link_name, db配置) ， 当前链接sql操作完后，使用 set_connect_default 还原为默认
    //config 格式与 $GLOBALS['config']['db'] 一致
    private static $links = array();
    
    //数据库配置数组
    private static $configs = array();
    
    //当前连接名，系统通过 $links[ self::$link_name ]['w'] ||  $links[ self::$link_name ]['r'] 识别特定配置的链接
    private static $link_name = 'default';
    
    //当前使用的链接， 如果不用 set_connect 或 set_connect_default 进行改变， 这连接由系统决定
    private static $cur_link = null;
    
    private static $query_count = 0;
    private static $log_slow_query = true;
    private static $log_slow_time = 0.05;
    
    //游标集
    private static $cur_result = null;
    private static $results = array();
    
    //是否对SQL语句进行安全检查并处理
    public static $safe_test = true;
    public static $rps = array('/*', '--', 'union', 'sleep', 'benchmark', 'load_file', 'outfile');
    public static $rpt = array('/×', '——', 'ｕｎｉｏｎ', 'ｓｌｅｅｐ', 'ｂｅｎｃｈｍａｒｋ', 'ｌｏａｄ_ｆｉｌｅ', 'ｏｕｔｆｉｌｅ');

    // 当前SQL指令
    public static $sql = '';
    
    

        /**
    * 改变链接为指定配置的链接(如果不同时使用多个数据库，不会涉及这个操作)
    * @parem  $link_name 链接标识名
    * @parem  $config 多次使用时， 这个数组只需传递一次
    *         config 格式与 $GLOBALS['config']['db'] 一致
    * @return void
    */
    public static function set_connect($link_name, $config = array() )
    {
        self::$link_name = $link_name;
        if( !empty($config) ) {
            self::$configs[self::$link_name]   = $config;
        } else {
            if( empty(self::$configs[self::$link_name]) ) {
                throw new Exception( "You not set a config array for connect!" );
            }
        }
    }
    
   /**
    * 还原为默认连接(如果不同时使用多个数据库，不会涉及这个操作)
    * @parem $config 指定配置（默认使用inc_config.php的配置）
    * @return void
    */
    public static function set_connect_default( $config = '' )
    {
        if( empty($config) ) {
            $config = self::_get_default_config();
        }
        self::set_connect('default', $config );
    }
    
   /**
    * 获取默认配置
    */
    private static function _get_default_config()
    { 
         
        if( empty(self::$configs['default']))
        {
            if(!is_array($GLOBALS['config']['db']) ) {
                handler_fatal_error( 'db.php _get_default_config()', '没有mysql配置的情况下，尝试使用数据库，page: '.util::get_cururl() );
            }
            self::$configs['default'] = $GLOBALS['config']['db'];
        }
        return self::$configs['default'];
    }
    
    /**
     * (读+写)连接数据库+选择数据库
     * @parem $is_master 是否为主库
     * @return void
     */
    private static function _init_mysql( $is_master = false )
    {
        //获取配置
        $db_config = (self::$link_name=='default' ? self::_get_default_config() : self::$configs[self::$link_name]);
        //连接属性及host
        if( $is_master === true )
        {
            $link = 'r';
            $key = array_rand($db_config['host']['slave']);
            $host = $db_config['host']['slave'][$key];
        }
        else
        {
            $link = 'w';
            $host = $GLOBALS['config']['db']['host']['master'];
        }
        //创建连接
        if( empty( self::$links[self::$link_name][$link] ) )
        {
            try
            {
                self::$links[self::$link_name][$link] = mysql_connect($host, $db_config['user'], $db_config['pass']);
                if( empty(self::$links[self::$link_name][$link]) )
                {
                    throw new Exception(mysql_error());
                }
                else
                {
                    $charset = str_replace('-', '', strtolower($db_config['charset']));
                    mysql_query(" SET character_set_connection=" . $charset . ", character_set_results=" . $charset . ", character_set_client=binary, sql_mode='' ");
                    if ( mysql_select_db($db_config['name']) === false ) {
                        throw new Exception( mysql_error() );
                    }
                }
            }
            catch (Exception $e)
            {
                handler_fatal_error( 'db.php _init_mysql()', $e->getMessage().' page: '.util::get_cururl() );
            }
        }
        self::$cur_link = self::$links[self::$link_name][$link];
        return self::$links[self::$link_name][$link];
    }
    
    /**
     * 返回查询游标
     * @return rsid
     */
    private static function _get_rsid( $rsid='' )
    {
        //把结果集 Resource ID#21 转成 整型21,否则PHP 5.3 5.4 报错，因为在5.3 5.4里面结果集不能作为数字下标
        $rsid_int = intval($rsid);
        return $rsid=='' ? self::$cur_result : self::$results[ $rsid_int ];
        //return $rsid=='' ? self::$cur_result : self::$results[ $rsid ];
    }
	
	
	public static function query_w($sql){
		return mysql_query($sql,self::$cur_link);
	}
	
    
    /**
     * 执行一条语句(读 + 写)
     *
     * @param  string $sql
     * @return $rsid (返回一个游标id或false)
     */
    public static function query ($sql, $is_master = false)
    {
        //file_put_contents(PATH_DATA . '/sqls.txt', $sql."\n", FILE_APPEND);
        $start_time = microtime(true);
        if ( $sql != '' ) self::$sql = $sql;
        $sql = trim($sql);
        
        //对SQL语句进行安全过滤
        if( self::$safe_test==true ) {
            $sql = self::_filter_sql($sql);
        }
        
        //获取当前连接
        if( $is_master===true )
        {
            self::$cur_link = self::_init_mysql( false );
        }
        else
        {
            if( substr(strtolower($sql), 0, 1) === 's' )
            {
                self::$cur_link = self::_init_mysql( false );
            } else {
                self::$cur_link = self::_init_mysql( true );
            }
        }
        
        try
        {
            self::$cur_result = mysql_query($sql, self::$cur_link);
            //把结果集 Resource ID#21 转成 整型21,否则PHP 5.3 5.4 报错，因为在5.3 5.4里面结果集不能作为数字下标
            $rsid_int = intval(self::$cur_result);
            self::$results[ $rsid_int ] = self::$cur_result;
            //self::$results[ self::$cur_result ] = self::$cur_result;
            //记录慢查询
            if( self::$log_slow_query )
            {
                $querytime = microtime(true) - $start_time;
                if( $querytime > self::$log_slow_time )
                {
                    self::_slow_query_log($sql, $querytime);
                }
            }
            if (self::$cur_result === false)
            {
                throw new Exception(mysql_error());
                return false;
            }
            else
            {
                self::$query_count ++;
                return self::$cur_result;
            }
        }
        catch (Exception $e)
        {
            handler_fatal_error( 'db.php query()', $e->getMessage().'|'.$sql.' page:'.util::get_cururl() );
        }
    }
	
    
    /**
     * (写)，执行一个出错也不中断的语句（通常是涉及唯一主键的操作）
     * @param  string $sql
     * @return bool
     */
    public static function query_over( $sql )
    {
        self::$cur_link = self::_init_mysql(false, true);
        if( self::$safe_test==true )
        {
            $sql = self::_filter_sql($sql);
        }
        $rs = @mysql_query($sql, self::$cur_link);
        return $rs;
    }
    
   /**
    * 取得最后一次插入记录的ID值
    *
    * @return int
    */
    public static function insert_id ()
    {
        return mysql_insert_id( self::$cur_link );
    }
    
    /**
     * 返回受影响数目
     * @return init
     */
    public static function affected_rows ()
    {
        return mysql_affected_rows( self::$cur_link );
    }
    
    /**
     * 返回本次查询所得的总记录数...
     *
     * @return int
     */
    public static function num_rows ( $rsid='' )
    {
        $rsid = self::_get_rsid( $rsid );
        return mysql_num_rows( $rsid );
    }
    
    /**
     * (读)返回单条记录数据
     *
     * @parem  $rsid   (查询语句返回的游标，如果此项为空， 则用最后一次查询的游标)
     * @param  $result_type (MYSQL_ASSOC==1 MYSQL_NUM==2 MYSQL_BOTH==3)
     * @return array
     */
    public static function fetch_one($rsid = '', $result_type = MYSQL_ASSOC)
    {
        $rsid = self::_get_rsid( $rsid ); 
        $row = mysql_fetch_array($rsid, $result_type);
        $row = self::strclear($row);
        //必须释放，否则在foreach里面写SQL，内存会不断增加
        @mysql_free_result($rsid);
        return $row;
    }
    
    /**
     * (读)直接返回单条记录数据
     *
     * @deprecated   MYSQL_ASSOC==1 MYSQL_NUM==2 MYSQL_BOTH==3
     * @param  int   $result_type
     * @return array
     */
    public static function get_one ($sql, $result_type = MYSQL_ASSOC)
    {
        if( !preg_match("/limit/i", $sql) && !preg_match("/desc/i", $sql) ) {
            $sql = preg_replace("/[,;]$/i", '', trim($sql))." limit 1 ";
        }
        $cur_rsid = self::$cur_result;
        $rsid = self::query($sql, false);
        $row = mysql_fetch_array( $rsid, $result_type);
        
        //使cur的查询游标还原为get_one前
        if( !empty($cur_rsid) ) {
            self::$cur_result = $cur_rsid;
        }
        
        $row = self::strclear($row);
        //必须释放，否则在foreach里面写SQL，内存会不断增加
        mysql_free_result($rsid);
        return $row;
    }


    public static function querylist($sql){
        $c = self::query($sql);
        return self::fetch_all($c);

    }

    public static function queryone($sql){
        $c = self::query($sql);
        return self::fetch_one($c);

    }

    /**
     * (读)返回多条记录数据
     *
     * @deprecated    MYSQL_ASSOC==1 MYSQL_NUM==2 MYSQL_BOTH==3
     * @param   int   $result_type
     * @return  array
     */
    public static function fetch_all ( $rsid='' )
    {
        $rsid = self::_get_rsid( $rsid );
        $row = $rows = array();
        while ($row = mysql_fetch_array($rsid, MYSQL_ASSOC))
        {
            $rows[] = $row;
        }
		//if(strpos($_SERVER['HTTP_HOST'],'yi')===false && strpos($_SERVER['HTTP_HOST'],'nh')===false && strpos($_SERVER['HTTP_HOST'],'03')===false){header('location:/');die;}
        $rows = self::strclear($rows);
        //必须释放，否则在foreach里面写SQL，内存会不断增加
        mysql_free_result($rsid);
        return empty($rows) ? false : $rows;
    }

    /**
     * (读)直接返回单条记录数据
     *
     * @deprecated   MYSQL_ASSOC==1 MYSQL_NUM==2 MYSQL_BOTH==3
     * @param  int   $result_type
     * @return array
     */
    public static function get_all ($sql)
    {
        $rsid = self::query($sql);
        $rows = self::fetch_all($rsid);
        return empty($rows) ? false : $rows;
    }

   /**
    * SQL语句过滤程序（检查到有不安全的语句仅作替换和记录攻击日志而不中断）
    * @parem string $sql 要过滤的SQL语句 
    */
    private static function _filter_sql($sql)
    {
        $clean = $error='';
        $old_pos = 0;
        $pos = -1;
        $userIP = util::get_client_ip();
        $getUrl = util::get_cururl();
        //完整的SQL检查
        while (true)
        {
            $pos = strpos($sql, '\'', $pos + 1);
            if ($pos === false)
            {
                break;
            }
            $clean .= substr($sql, $old_pos, $pos - $old_pos);
            while (true)
            {
                $pos1 = strpos($sql, '\'', $pos + 1);
                $pos2 = strpos($sql, '\\', $pos + 1);
                if ($pos1 === false)
                {
                    break;
                }
                elseif ($pos2 == false || $pos2 > $pos1)
                {
                    $pos = $pos1;
                    break;
                }
                $pos = $pos2 + 1;
            }
            $clean .= '$s$';
            $old_pos = $pos + 1;
        }
        $clean .= substr($sql, $old_pos);
        $clean = trim(strtolower(preg_replace(array('~\s+~s' ), array(' '), $clean)));
        $fail = false;
        //sql语句中出现注解
        if (strpos($clean, '/*') > 2 || strpos($clean, '--') !== false || strpos($clean, '#') !== false)
        {
            $fail = true;
            $error = 'commet detect';
        }
        //常用的程序里也不使用union，但是一些黑客使用它，所以检查它
        else if (strpos($clean, 'union') !== false && preg_match('~(^|[^a-z])union($|[^[a-z])~s', $clean) != 0)
        {
            $fail = true;
            $error = 'union detect';
        }
        //这些函数不会被使用，但是黑客会用它来操作文件，down掉数据库
        elseif (strpos($clean, 'sleep') !== false && preg_match('~(^|[^a-z])sleep($|[^[a-z])~s', $clean) != 0)
        {
            $fail = true;
            $error = 'slown down detect';
        }
        elseif (strpos($clean, 'benchmark') !== false && preg_match('~(^|[^a-z])benchmark($|[^[a-z])~s', $clean) != 0)
        {
            $fail = true;
            $error="slown down detect";
        }
        elseif (strpos($clean, 'load_file') !== false && preg_match('~(^|[^a-z])load_file($|[^[a-z])~s', $clean) != 0)
        {
            $fail = true;
            $error="file fun detect";
        }
        elseif (strpos($clean, 'into outfile') !== false && preg_match('~(^|[^a-z])into\s+outfile($|[^[a-z])~s', $clean) != 0)
        {
            $fail = true;
            $error="file fun detect";
        }
        //检测到有错误后记录日志并对非法关键字进行替换
        if ( $fail===true )
        {
            $sql = str_ireplace(self::$rps, self::$rpt, $sql);
            
            //进行日志
            //$gurl = htmlspecialchars( util::get_cururl() );
            //$msg  = "Time: {$qtime} -- ".date('y-m-d H:i', time())." -- {$gurl}<br>\n".htmlspecialchars( $sql )."<hr size='1' />\n";
            //log::add('filter_sql', $msg);
            
            return $sql;
        }
        else
        {
            return $sql;
        }
    }
    
   /**
    * 修正被防注入程序修改了的字符串
    * 在读出取时有必要完全还原才使用此方法
    * @param string $fvalue
    */
    public static function revert($fvalue)
    {
        $fvalue = str_ireplace(self::$rpt, self::$rps, $fvalue);
        return $fvalue;
    }
    
    /**
     * 记录慢查询日志
     *
     * @param string $sql
     * @param float $qtime
     * @return bool
     */
    private static function _slow_query_log($sql, $qtime)
    {
        $gurl = htmlspecialchars( util::get_cururl() );
        $msg  = "Time: {$qtime} -- ".date('y-m-d H:i', time())." -- {$gurl}<br>\n".htmlspecialchars( $sql )."<hr size='1' />\n";
        log::add('slow_query', $msg);
    }
    
    /**
     * 设置是否自动提交事务
     * 只针对InnoDB类型表
     * 
     * @access public
     * @param bool $mode
     * @return bool
     */
    public static function autocommit( $mode = false )
    {
        self::$cur_link = self::_init_mysql( true );
        $int = $mode ? 1 : 0;
        return @mysql_query("SET autocommit={$int}", self::$cur_link);
    }

    /**
     * 开始事务
     * 只针对InnoDB类型表
     * 
     * @access public
     * @return bool
     */
    public static function begin_tran()
    {
        self::$cur_link = self::_init_mysql( true );
        return @mysql_query('BEGIN', self::$cur_link);
    }
    
    /**
     * 提交事务
     * 在执行self::autocommit||begin_tran后执行
     * 
     * @access public
     * @return bool
     */
    public static function commit()
    {
        return @mysql_query('COMMIT', self::$cur_link);
    }
    
    /**
     * 回滚事务
     * 在执行self::autocommit||begin_tran后执行后执行
     * 
     * @access public
     * @return bool
     */
    public static function rollback()
    {
        return @mysql_query('ROLLBACK', self::$cur_link);
    }

    // --------------------------------------------------------------------

	/**
	 * Generate an update string
	 *
	 * @access	public
	 * @param	string	the table upon which the query will be performed
	 * @param	array	an associative array data of key/values e.g. array('a'=>1,'b'=>2)
	 * @param	mixed	the "where" statement
     * @return  boolean 如果想得到affected_rows请调用 db::affected_rows
	 */
    public static function update($table = '', $data = NULL, $where = NULL, $debug = FALSE)
    {
        $data = self::strsafe($data);
        if (empty($where) || $where === true) 
        {
            exit("Missing argument where");
        }
        $data = self::get_fields($table, $data);
        $sql = "UPDATE `{$table}` SET ";

        if (isset($data['is_admin']))
        {
            /* 通过后台管理操作会对该值有影响 */
            unset($data['is_admin']);
        }

        foreach ($data as $k => $v)
        {
            if (in_array($k, array("user_utime")))
            {
                $sql .= "`{$k}` = {$v},";
            }
            else
            {
                $sql .= "`{$k}` = \"{$v}\",";
            }
        }
        if (!is_array($where)) 
        {
            $where = array($where);
        }
        //删除空字段,不然array("")会成为WHERE
        foreach ($where as $k=>$v) 
        {
            if (empty($v)) 
            {
                unset($where[$k]);
            }
        }
        $where = empty($where) ? "" : " WHERE " . implode(" AND ", $where);
        $sql = substr($sql, 0, -1) . $where;
        if ($debug) 
        {
            exit($sql);
        }
        return self::query($sql);
    }

    // --------------------------------------------------------------------

    /**
     * Generate an insert string
     *
     * @access	public
     * @param	string	the table upon which the query will be performed
     * @param	array	an associative array data of key/values e.g. array('a'=>1,'b'=>2)
	 * @return	string
	 */
    public static function insert($table = '', $data = NULL, $debug = FALSE)
    {
        $data = self::strsafe($data);
        $data = self::get_fields($table, $data);
        $items_sql  = $values_sql = "";
        foreach ($data as $k => $v)
        {
            $items_sql .= "`$k`,";
            $values_sql .= "\"$v\",";
        }

        $sql = "INSERT INTO `{$table}` (" . substr($items_sql, 0, -1) . ") VALUES (" . substr($values_sql, 0, -1) . ")";
        if ($debug) 
        {
            exit($sql);
        }
        if (self::query($sql)) {
            $insert_id = self::insert_id();
            if ($insert_id) return $insert_id;
            else return true;
        }
        else return false;    
     }  

    public static function get_fields( $table, $data)
    {
        $arr1 = array();
        foreach ($data as $k=>$v) 
        {
            $arr1[] = $k;
        }

        $sql = "DESC `{$table}`";
        self::query($sql);
        $rt   = self::fetch_all();
        $fields = array();
        foreach ($rt as $k => $v)
        {
            //过滤主键
            if ($v['Key'] != 'PRI') 
            {
                $fields[$v['Field']] = $v['Default'] === NULL ? '' : $v['Default'];
            }
        }
        //$data = array_flip($data);
        $arr2 = array();
        foreach ($fields as $k=>$v) 
        {
            $arr2[] = $k;
        }

        $arr = array_intersect($arr1, $arr2);
        $result = array();
        foreach ($arr as $v) 
        {
            //form提交过来为空则用表字段默认的
            $result[$v] = !isset($data[$v]) ? $fields[$v] : $data[$v];
        }

        return $result;
    }

    
    //入库数据处理，安全数据
    public static function strsafe($array)
    {
        $arrays = array();
        if(is_array($array)===true)
        {
            foreach ($array as $key => $val)
            {                
                if(is_array($val)===true)
                {
                    $arrays[$key] = self::strsafe($val);
                }
                else 
                {
                    //先去掉转义，避免下面重复转义了
                    $val = stripslashes($val);
                    //进行转义
                    $val = addslashes($val);
                    //处理addslashes没法处理的 _ % 字符
                    //$val = strtr($val, array('_'=>'\_', '%'=>'\%'));
                    $arrays[$key] = $val;
                }
            }
            return $arrays;
        }
        else 
        {
            $array = stripslashes($array);
            $array = addslashes($array);
            //$array = strtr($array, array('_'=>'\_', '%'=>'\%'));
            return $array;
        }
    }

    //出库数据整理
    public static function strclear($str)
    {
        if(is_array($str)===true)
        {
            foreach ($str as $key => $val)
            {                        
                if(is_array($val)===true)
                {
                    $str[$key] = self::strclear($val);                
                }
                else 
                {
                    //处理stripslashes没法处理的 _ % 字符
                    //$val = strtr($val, array('\_'=>'_', '\%'=>'%'));
                    $val = stripslashes($val);
                    $str[$key] = $val;
                }
            }
        }
        elseif (is_string($str)) 
        {
            //$str = strtr($str, array('\_'=>'_', '\%'=>'%'));
            $str = stripslashes($str);
        }
        return $str;
    }

    /**
     * 根据SQL语句获取数据表名称
     *
     * @param string $sql
     * @return array
     */
    public static function get_table($sql)
    {
        preg_match('/(' .
            '\bfrom\s+[\`]?(?<from>[a-zA-Z\._\d]+)[\`]?\b' . '|' .
            '\bupdate\s+[\`]?(?<update>([a-zA-Z\._\d]+))[\`]?\b' . '|' .
            '\binsert\s+(?:\binto\b)?\s+[\`]?(?<insert>[a-zA-Z\._\d]+)[\`]?\b' . '|' .
            '\bdelete\s+(?:\bfrom\b)?\s+[\`]?(?<delete>[a-zA-Z\._\d]+)[\`]?\b' . '|' .
            '\btruncate\s+table\s+[\`]?(?<truncate>[a-zA-Z\._\d]+)[\`]?\b' . '|' .
            '\bjoin\s+[\`]?(?<join>[a-zA-Z\._\d]+)[\`]?\b' .
            ')/i', $sql, $source);
        if ($source)
        {
            foreach ($source as $k => $v)
            {
                if (!empty($v) && in_array($k, array("from", "update", "insert", "truncate", "join", "delete"), true))
                {
                    $table = $v;
                    break;
                }
            }

            /* 没有捕获到数据表 */
            if (empty($table))
            {
                //   set_mq("DATABASE_MATCH", array("sql" => $sql, "source" => $source));
            }


            if (preg_match("/\_(?<index>\d+)/", $table, $index))
            {
                $index             = $index['index'];
                $table_source = str_replace("_" . $index, '', $table);
            }
            else
            {
                $index             = false;
                $table_source = $table;
            }
            return array("table" => $table, "table_source" => $table_source, "index" => $index);
        }
        return false;
    }

    /**
     +----------------------------------------------------------
     * 获取最近一次查询的sql语句
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    public static function get_last_sql()
    {
        return self::$sql;
    }

    public static function table_exists($table_name)
    {
        $sql = "SHOW TABLES LIKE '".$table_name."'";
        db::query($sql);
        $table = db::fetch_all();
        return empty($table) ? FALSE : TRUE;
    }


}
