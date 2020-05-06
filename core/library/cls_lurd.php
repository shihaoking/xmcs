<?php

if (!defined('CORE'))
    exit('Request Error!');
/**
 * 数据库综合操作类
 *
 * 对指定数据表进行insert、delete、update、list等操作
 *
 * 传入本类的字段数据应先经过 addslashes 转义
 *
 * @version $Id$
 *
 */
@mb_internal_encoding('UTF-8');

class cls_lurd
{

    //固定属性
    var $date_types = array('DATE', 'DATETIME', 'TIMESTAMP', 'TIME', 'YEAR');
    var $float_types = array('FLOAT', 'DOUBLE', 'DECIMAL');
    var $int_types = array('TINYINT', 'SMALLINT', 'MEDIUMINT', 'INT', 'BIGINT');
    var $char_types = array('VARCHAR', 'CHAR', 'TINYTEXT');
    var $text_types = array('TEXT', 'MEDIUMTEXT', 'LONGTEXT');
    var $bin_types = array('TINYBLOB', 'BLOB', 'MEDIUMBLOB', 'LONGBLOB', 'BINARY', 'VARBINARY');
    var $em_types = array('ENUM', 'SET');
    //普通属性
    var $table_name = '';
    var $primary_key = '';
    var $auto_field = '';
    var $order_query = '';
    //所的字段及属性数组
    var $fields = array();
    //不需过滤的字段(通常是一些json或序列化保存的东西)
    //array(tablename=>array(fields))
    var $not_filter_fields = array();
    //当这个值为true，每次都会生成新模板，用于调试模式
    var $is_debug = false;
    //文本内容安全级别
    //0 为不处理， 1 为禁止不安全HTML内容(javascript等)，2完全禁止HTML内容，并替换部份不安全字符串（如：eval(、union、CONCAT(、--、等）
    var $string_safe = 2;
    //这个变量用于存放连结表的参数
    //可以通过 $lurd->add_link_table($tablelurd, linkfields, mylinkid, linkid); 联结一个表
    var $link_tables = array();
    //联结表的指定字段(如果后一个表的字段和前一个重名, 前者会被替换)
    var $add_fields = array();
    //分页相关数据
    var $total_page = 0;
    var $total_result = 0;
    var $page_size = 25;
    var $page_no = 1;
    //增加修改记录锁定的字段
    var $lock_fields = array();
    //查询条件(在get_datas中使用)
    var $search_parameters = array();
    //上次运行的实际SQL(只用于非查询语句)
    var $last_sql = '';
    //从主库查询
    var $query_master = false;

    /**
     * 设置数据表
     * @return void
     */
    public function set_table($tablename)
    {
        $this->table_name = $tablename;
        $this->primary_key = '';
        $this->auto_field = '';
        $this->order_query = '';
        $this->fields = array();
        $this->link_tables = array();
        $this->add_fields = array();
        $this->lock_fields = array();
        $this->search_parameters = array();
        $this->analyse_table();
    }

    /**
     * 把表名映射成类的工厂方法
     * @parem $tablename
     */
    public static function factory($tablename)
    {
        $cls = new cls_lurd();
        $cls->set_table($tablename);
        $GLOBALS[$tablename] = $cls;
        return $cls;
    }

    /**
     * 获取上次 insert 操作产生的id
     */
    public function insert_id()
    {
        return db::insert_id();
    }

    /**
     * 获取上次操作影响的行数
     */
    public function affected_rows()
    {
        return db::affected_rows();
    }

    /**
     * 限定插入、更新操作时传递过来的字段名(每次进行操作前都必须限制，因为操作后系统会清空这个属性)
     * @parem $fieldstr 用 ',' 分开的字段列表
     * @return bool
     */
    public function set_lock_fields($fieldstr)
    {
        $tmparr = explode(',', $fieldstr);
        foreach ($tmparr as $f)
        {
            $f = trim($f);
            if (isset($this->fields[$f]))
            {
                $this->lock_fields[$f] = 1;
            }
        }
        return (count($this->lock_fields) > 0 ? true : false);
    }

    /**
     * 清空限定插入、更新操作时传递过来的字段名
     */
    public function clear_lock_fields()
    {
        $this->lock_fields = array();
    }

    /**
     * 向数据表插入一条数据(只获得SQL)
     * @parem $key_value_array
     * @parem $$tablename  如果已经用 set_table 指定，这个参数可以省略
     * @return int result
     */
    public function get_insert($key_value_array, $tablename = '', $use_default = false)
    {
        if ($tablename != '' && $this->table_name != $tablename)
        {
            $this->set_table($tablename);
        }
        $allfield = $allvalue = '';
        $check_lock_field = (count($this->lock_fields) > 0 ? true : false);
        foreach ($this->fields as $k => $v)
        {
            //自动递增键不处理
            if ($k == $this->auto_field)
            {
                continue;
            }
            if ($check_lock_field && !isset($this->lock_fields[$k])) //不处理没指定的字段
            {
                continue;
            }
            $allfield .= ($allfield == '' ? "`$k`" : ' , ' . "`$k`");
            $df = empty($v['default']) ? null : $v['default'];
            $v = isset($key_value_array[$k]) ? $key_value_array[$k] : $df;
            $v = $this->filter_data($k, $v);
            $allvalue .= ($allvalue == '' ? "'$v'" : ",'{$v}'");
        }
        return array($allfield, $allvalue);
    }

    /**
     * 向数据表插入一条数据
     * @param $key_value_array
     * @param $$tablename  如果已经用 set_table 指定，这个参数可以省略
     * @param $insert_id 如果设置了insert_id,则返回insert_id;
     * @return int result
     */
    public function insert($key_value_array, $tablename = '', $use_default = false, $insert_id = false)
    {
        if ($tablename != '' && $this->table_name != $tablename)
        {
            $this->set_table($tablename);
        }
        $allfield = $allvalue = '';
        $check_lock_field = (count($this->lock_fields) > 0 ? true : false);
        foreach ($this->fields as $k => $v)
        {
            //自动递增键不处理
            if ($k == $this->auto_field)
            {
                continue;
            }
            if ($check_lock_field && !isset($this->lock_fields[$k])) //不处理没指定的字段
            {
                continue;
            }
            $allfield .= ($allfield == '' ? "`$k`" : ' , ' . "`$k`");
            $df = ($use_default ? (empty($v['default']) ? null : $v['default']) : null);
            $v = isset($key_value_array[$k]) ? $key_value_array[$k] : $df;
            $v = $this->filter_data($k, $v);
            $allvalue .= ($allvalue == '' ? "'$v'" : ' , ' . "'$v'");
        }
        $this->last_sql = "Insert Into `{$this->table_name}`($allfield) Values($allvalue); ";
        //echo $this->last_sql;
        $rs = db::query($this->last_sql, true);
        if ($insert_id)
            return db::insert_id();
        return $rs;
    }

    /*
     * 更新数据表的某条数据
     *
     * @parem $key_value_array
     * 如果没有主键的情况下，必须指定 key_value_array['primarykey'] = "所有字段值的md5 value"，如果有某些未知字段为NULL的情况下，这种方式可能不可靠
     *
     * @parem $condition  手动指定更新条件(指定条件的情况下务必预先做好安全检查)
     *
     * @parem $tablename  如果已经用 set_table 指定，这个参数可以省略
     *
     * @return int result
     */

    public function update($key_value_array, $condition = '', $tablename = '')
    {
        if ($tablename != '' && $this->table_name != $tablename)
        {
            $this->set_table($tablename);
        }
        $editfield = '';
        $check_lock_field = (count($this->lock_fields) > 0 ? true : false);
        //var_dump($key_value_array);
        //print_r($this->fields);
        foreach ($this->fields as $k => $v)
        {
            //自动递增键不处理
            if ($k == $this->auto_field || !isset($key_value_array[$k]) || $k == 'primarykey')
            {
                continue;
            }
            //不处理没指定的字段
            if ($check_lock_field && !isset($this->lock_fields[$k]))
            {
                continue;
            }
            $v = $key_value_array[$k];
            $v = $this->filter_data($k, $v);
            $editfield .= ($editfield == '' ? " `$k`='$v' " : ",\n `$k`='$v' ");
        }
        if (empty($editfield))
        {
            return false;
        }
        //var_dump($editfield);
        //获取更新条件
        if ($condition == '')
        {
            $ispk = false;
            if (preg_match("/,/", $this->primary_key))
            {
                $keyvalue = (isset($key_value_array['primarykey']) ? $key_value_array['primarykey'] : '');
                $ispk = true;
            } else
            {
                $keyvalue = $this->filter_data($this->primary_key, $key_value_array[$this->primary_key]);
            }
            $keyvalue = preg_replace("/[^0-9a-z]/i", '', $keyvalue);
            if ($keyvalue == '')
            {
                echo("cls_lurd-&gt;update Update error -- empty primary key value! <hr/>");
            }
            $condition = (!$ispk ? " `{$this->primary_key}`='{$keyvalue}' " : " MD5( CONCAT(`" . str_replace(',', '`,`', $this->primary_key) . "`) ) = '{$keyvalue}' " );
        } else
        {
            $condition = $this->filter_condition($condition);
        }
        $this->last_sql = " Update `{$this->table_name}` set {$editfield} where $condition ";
        $rs = db::query($this->last_sql, true);
        return $rs;
    }

    /*
     * 删除数据表里指定的多条记录
     *
     * @parem $primarykey_values 要删除的内容的主键值数组(可以同时删除多条记录)
     * 如果没有主键的情况下，$primarykey_value = "所有字段值的md5 value"，如果有某些未知字段为NULL的情况下，这种方式可能不可靠
     *
     * @parem $tablename  如果已经用 set_table 指定，这个参数可以省略
     *
     * @return int 返回删除记录的总数
     */

    public function delete($primarykey_values, $tablename = '')
    {
        if ($tablename != '' && $this->table_name != $tablename)
        {
            $this->set_table($tablename);
        }
        $keyArr = $primarykey_values;
        $has_primary_key = !preg_match("/,/", $this->primary_key) ? true : false;
        $i = 0;
        foreach ($keyArr as $v)
        {
            $v = preg_replace("/[^0-9a-z]/i", '', $v);
            if ($v == '')
                continue;
            $i++;
            if ($has_primary_key)
            {
                $this->last_sql = "Delete From `{$this->table_name}` where `{$this->primary_key}`='$v' ";
                db::query($this->last_sql, true);
            } else
            {
                $this->last_sql = "Delete From `{$this->table_name}` where MD5( CONCAT(`" . str_replace(',', '`,`', $this->primary_key) . "`) = '$v' ";
                db::query($this->last_sql, true);
            }
        }
        return $i;
    }

    /*
     * 删除数据表的指定记录
     *
     * @parem $condition  手动指定更新条件(务必预先做好安全检查)
     *
     * @parem $tablename  如果已经用 set_table 指定，这个参数可以省略
     *
     * @return int result
     */

    public function delete_one($condition = '', $tablename = '')
    {
        if ($tablename != '' && $this->table_name != $tablename)
        {
            $this->set_table($tablename);
        }
        $condition = $this->filter_condition($condition);
        $query = " Delete From `{$this->table_name}` where $condition ";
        $rs = db::query($query, true);
        return $rs;
    }

    /**
     * 过滤手动指定的查询条件(暂未实现)
     */
    public function filter_condition(&$str)
    {
        return $str;
    }

    /**
     * 增加搜索条件
     * @parem $fieldname 字段名称
     * @parem $fieldvalue 传入的 value 值必须先经过转义
     * @parem $condition 条件 >、<、=、<> 、like、%like%、%like、like%
     * @parem $linkmode and 或 or
     *
     */
    public function add_search_parameter($fieldname, $fieldvalue, $condition, $linkmode = 'and')
    {
        $c = count($this->search_parameters);
        //对于指定了多个字段，使用 CONCAT 进行联结（通常是like操作）
        if (preg_match('/,/', $fieldname))
        {
            $fs = explode(',', $fieldname);
            $fieldname = "CONCAT(";
            $ft = '';
            foreach ($fs as $f)
            {
                $f = trim($f);
                $ft .= ($ft == '' ? "`{$f}`" : ",`{$f}`");
            }
            $fieldname .= "{$ft}) ";
        }
        $this->search_parameters[$c]['field'] = $fieldname;
        $this->search_parameters[$c]['value'] = $fieldvalue;
        $this->search_parameters[$c]['condition'] = $condition;
        $this->search_parameters[$c]['mode'] = $linkmode;
    }

    /**
     * 获取搜索条件
     * @return string
     */
    public function get_search_query()
    {
        $wquery = '';
        if (count($this->search_parameters) == 0)
        {
            return '';
        } else
        {
            foreach ($this->search_parameters as $k => $v)
            {
                if (preg_match("/like/i", $v['condition']))
                {
                    $v['value'] = preg_replace("/like/i", $v['value'], $v['condition']);
                }
                $v['condition'] = preg_replace("/%/", '', $v['condition']);
                if ($wquery == '')
                {
                    if (!preg_match("/\./", $v['field']))
                        $v['field'] = "{$v['field']}";
                    $wquery .= "where " . $v['field'] . " {$v['condition']} '{$v['value']}' ";
                }
                else
                {
                    if (!preg_match("/\./", $v['field']))
                        $v['field'] = "{$v['field']}";
                    $wquery .= $v['mode'] . " " . $v['field'] . " {$v['condition']} '{$v['value']}' ";
                }
            }
        }
        return $wquery;
    }

    /**
     * 列出数据(查询)
     *
     * @parem $listfield = ''
     * 指定要列出的字段(默认为'*') ，只需填写当前表
     * 联结表需列出的字段在 join_table() 指定， 因此不需要 表名.字段名 表示字段
     *
     * @parem $orderquery = '' 排序query，如果联结了其它表，需用 表名.字段名 表示字段
     *
     * @return datas
     */
    public function get_datas($pageno = 1, $listfield = '*', $orderquery = '', $wherequery = '', $tablename = '', $count_row = true)
    {
        $__t = microtime(true);
        if ($wherequery == '')
        {
            $wherequery = $this->get_search_query();
        } else
        {
            $wherequery = $this->filter_condition($wherequery);
        }
        if ($tablename != '' && $this->table_name != $tablename)
        {
            $this->set_table($tablename);
        }
        $listdd = '';
        if (trim($listfield) == '')
            $listfield = '*';

        //是否有联结其它的表
        $islink = count($this->link_tables) > 0 ? true : false;
        //主表索引字段(Select * From 部份)
        $listfields = explode(',', str_replace('`', '', $listfield));
        foreach ($listfields as $v)
        {
            $v = trim($v);
            if (!isset($this->fields[$v]) && $v != '*')
            {
                continue;
            }
            if ($islink)
            {
                $listdd .= ($listdd == '' ? "{$this->table_name}.{$v}" : ", {$this->table_name}.{$v} ");
            } else
            {
                if ($v == '*')
                {
                    $listdd .= ' * ';
                } else
                {
                    $listdd .= ($listdd == '' ? "`$v`" : ",`$v`");
                }
            }
        }
        if ($listdd == '')
        {
            $listdd = " * ";
        }
        //联结表索引字段
        if ($islink)
        {
            $joinQuery = '';
            foreach ($this->link_tables as $k => $link_table)
            {
                $k++;
                $link_tablename = $link_table[0]->table_name;
                $joinQuery .= " left join `{$link_tablename}` on `{$link_tablename}`.`{$link_table[2]}` = `{$this->table_name}`.`{$link_table[1]}` ";
                foreach ($this->add_fields as $f => $v)
                {
                    if ($v['table'] != $link_tablename)
                        continue;
                    $listdd .= ", {$link_tablename}.{$f} ";
                }
            }
            $countQuery = "Select count(*) as dd From `{$this->table_name}` $joinQuery $wherequery ";
            $query = "Select $listdd From `{$this->table_name}` $joinQuery $wherequery $orderquery ";
        }
        else
        {
            $countQuery = "Select count(*) as dd From `{$this->table_name}` $wherequery ";
            $query = "Select $listdd From `{$this->table_name}` $wherequery $orderquery ";
        }

        //传统count统计记录数
        if ($count_row)
        {
            $row = db::get_one($countQuery . ' limit 1');
            $this->total_result = $row['dd'];
            $this->total_page = ceil($this->total_result / $this->page_size);
        } else
        {
            $this->total_page = 1;
            $this->total_result = -1;
        }

        //居于游标统计记录数
        $limit_start = ($pageno - 1) * $this->page_size;
        $this->last_sql = $query = $query . " limit {$limit_start}, {$this->page_size}";
        $q = db::query($query, $this->query_master, 'lurd_d');

        //SQL_CALC_FOUND_ROWS 模式某些情况下性能不好, 如果程序里优化处理得当, 用count更合理些
        //$row = db::get_one(' SELECT FOUND_ROWS() as dd ', MYSQL_ASSOC, $this->query_master);
        //获取数据
        $this->total_page = 0;
        $this->page_no = $pageno;
        $datas['data'] = array();
        if ($this->total_result > 0 || $this->total_result == -1)
        {
            $datas['data'] = db::fetch_all($q);
        }

        $datas['total_result'] = $this->total_result;
        $datas['total_page'] = $this->total_page;
        $datas['page_no'] = $this->page_no;

        $this->debug('time=' . (microtime(true) - $__t) . "\n\tsql=" . $query);

        return $datas;
    }

    /**
     * 列出数据(同get_data)
     * @param int $start    数据偏移值，和get_datas唯一不同的地方
     * @param string $listfield
     * @param string $orderquery
     * @param string $wherequery
     * @param string $tablename
     */
    public function get_datas2($start = 0, $listfield = '*', $orderquery = '', $wherequery = '', $tablename = '', $count_row = true)
    {
        $pageno = ceil($start / $this->page_size) + 1;
        return $this->get_datas($pageno, $listfield, $orderquery, $wherequery, $tablename, $count_row);
    }

    /**
     * 列出数据并返回分页相关信息
     * @param int $start    数据偏移值，和get_datas唯一不同的地方
     * @parem string $url
     * @param string $listfield
     * @param string $orderquery
     * @param string $wherequery
     * @param string $tablename
     */
    public function get_pagination_datas($start = 0, $url = '?', $listfield = '*', $orderquery = '', $wherequery = '', $tablename = '', $count_row = true)
    {
        $pageno = ceil($start / $this->page_size) + 1;
        $datas = $this->get_datas($pageno, $listfield, $orderquery, $wherequery, $tablename, $count_row);
        $datas['pagination'] = $this->get_pagination($url);
        return $datas;
    }

    /**
     * 获取单条记录
     *
     * @parem $wherequery = '' 查询query，如果联结了其它表，需用 表名.字段名 表示字段
     *
     * @return datas
     */
    public function get_one($wherequery = '', $tablename = '', $listfield = '*')
    {
        if ($wherequery == '')
        {
            $wherequery = $this->get_search_query();
        }
        if ($tablename != '' && $this->table_name != $tablename)
        {
            $this->set_table($tablename);
        }
        $listdd = '';
        if (trim($listfield) == '')
            $listfield = '*';
        //是否有联结其它的表
        $islink = count($this->link_tables) > 0 ? true : false;
        //主表索引字段(Select * From 部份)
        if ('*' !== $listfield)
        {
            $listfields = explode(',', $listfield);
            foreach ($listfields as $v)
            {
                $v = trim($v);
                if ($islink)
                {
                    $listdd .= ($listdd == '' ? "`{$this->table_name}`.`{$v}`" : ", `{$this->table_name}`.`{$v}` ");
                } else
                {
                    $listdd .= $v == '*' ? ' * ' : ($listdd == '' ? "`$v`" : ",`$v`");
                }
            }
        } else
        {
            $listdd .= "`{$this->table_name}`.*";
        }
        //联结表索引字段
        if ($islink)
        {
            $joinQuery = '';
            //echo "<!--";var_dump($this->add_fields);echo "-->";
            foreach ($this->link_tables as $k => $link_table)
            {
                $k++;
                $link_tablename = $link_table[0]->table_name;
                $joinQuery .= " left join `{$link_tablename}` on `{$link_tablename}`.`{$link_table[2]}` = `{$this->table_name}`.`{$link_table[1]}` ";
                foreach ($this->add_fields as $f => $v)
                {
                    if ($v['table'] != $link_tablename)
                        continue;
                    $listdd .= ", `{$link_tablename}`.`{$f}` ";
                }
            }
            $query = "Select $listdd From `{$this->table_name}` $joinQuery $wherequery limit 1";
        }
        else
        {
            $query = "Select $listdd From `{$this->table_name}` $wherequery limit 1 ";
        }
        $this->last_sql = $query;
        $q = db::query($query, $this->query_master);
        //echo "<!--";var_dump($query);echo "-->";
        $datas = array();
        $datas['data'][0] = db::fetch_one($q);
        $datas['total_result'] = $datas['total_page'] = $datas['page_no'] = 1;
        return $datas;
    }

    /**
     * 获得分页符列表
     * @param $url 前置url（如果为空，则使用当前url，过滤start=\d+等这些内容）
     * @param $style 样式
     * @return string
     */
    public function get_pagination($url = '', $style = "ylmf-page")
    {
        $config['start'] = ($this->page_no - 1) * $this->page_size;
        $config['per_count'] = $this->page_size;
        $config['count_number'] = $this->total_result;
        if (empty($url))
        {
            $config['url'] = preg_replace('/start=\d+/i', '', '?' . $_SERVER['QUERY_STRING']);
            $config['url'] = preg_replace('/&{2,}/', '&', $config['url']);
        } else
        {
            $config['url'] = $url;
        }

        // 总记录数
        $config['count_number'] = empty($config['count_number']) ? 0 : (int) $config['count_number'];
        // 每页显示数
        $config['per_count'] = empty($config['per_count']) ? 10 : (int) $config['per_count'];
        // 总页数
        $config['count_page'] = ceil($config['count_number'] / $config['per_count']);
        // 分页名
        $config['page_name'] = empty($config['page_name']) ? 'start' : $config['page_name'];
        // 当前页数
        $config['current_page'] = max(1, ceil($config['start'] / $config['per_count']) + 1);

        // 总页数不到二页时不分页
        if (empty($config) or $config['count_page'] < 2)
        {
            return false;
        }
        // 分页内容
        $pages = '<div class="' . $style . '">';
        // $pages = '';
        // 下一页
        $next_page = $config['start'] + $config['per_count'];
        // 上一页
        $prev_page = $config['start'] - $config['per_count'];
        // 末页
        $last_page = ($config['count_page'] - 1) * $config['per_count'];


        $flag = 0;

        if ($config['current_page'] > 1)
        {
            // 首页
            $pages .= "<a href='{$config['url']}' class='nextprev'>&laquo;首页</a>\n";
            // 上一页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$prev_page}' class='nextprev'>&laquo;上一页</a>\n";
        } else
        {
            //$pages .= "<span class='nextprev'>&laquo;首页</span>\n";
            //$pages .= "<span class='nextprev'>&laquo;上一页</span>\n";
        }
        // 前偏移
        for ($i = $config['current_page'] - 6; $i <= $config['current_page'] - 1; $i++)
        {
            if ($i < 1)
            {
                continue;
            }

            $_start = ($i - 1) * $config['per_count'];


            $pages .= "<a href='{$config['url']}&{$config['page_name']}=$_start'>$i</a>\n";
        }
        // 当前页
        $pages .= "<span class='current'>" . $config['current_page'] . "</span>\n";
        // 后偏移
        if ($config['current_page'] < $config['count_page'])
        {
            for ($i = $config['current_page'] + 1; $i <= $config['count_page']; $i++)
            {
                $_start = ($i - 1) * $config['per_count'];

                $pages .= "<a href='{$config['url']}&{$config['page_name']}=$_start'>$i</a>\n";

                $flag++;

                if ($flag == 6)
                {
                    break;
                }
            }
        }
        if ($config['current_page'] != $config['count_page'])
        {
            // 下一页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$next_page}' class='nextprev'>下一页&raquo;</a>\n";
            // 末页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$last_page}'>末页&raquo;</a>\n";
        } else
        {
            //$pages .= "<span class='nextprev'>下一页&raquo;</span>\n";
            //$pages .= "<span class='nextprev'>末页&raquo;</span>\n";
        }
        // 输入框跳转
        if (!empty($config['input']))
        {
            $pages .= '<input type="text" onkeydown="javascript:if(event.keyCode==13){ var offset = ' . $config['per_count'] . '*(this.value-1);location=\'' . $config["url"] . '&' . $config["page_name"] . '=\'+offset;}" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        }
        $pages .= "<span>共 {$config['count_page']} 页，{$config['count_number']} 记录</span>\n";
        $pages .= '</div>';

        return $pages;
        //return pagination ( $config );
    }

    /*
     * 联结其它表(用于数据查询的情况)
     *
     * @parem $tablelurd 目标表lurd对象, $linkfields select的字段
     *
     * @parem $mylinkid 当前表用于联结的字段
     *
     * @parem $linkid 目标表用于联结的字段
     *
     * @return void
     */

    public function join_table($tablename, $mylinkid, $linkid, $linkfields = '*')
    {
        if (trim($linkfields) == '')
        {
            $linkfields = '*';
        }
        $tablelurd = new cls_lurd();
        $tablelurd->set_table($tablename);
        $this->link_tables[] = array($tablelurd, $mylinkid, $linkid, $linkfields);
        //记录附加表的字段信息
        if ($linkfields != '*')
        {
            $fs = explode(',', $linkfields);
            foreach ($fs as $f)
            {
                $f = trim($f);
                if (isset($tablelurd->fields[$f]))
                {
                    $this->add_fields[$f] = $tablelurd->fields[$f];
                    $this->add_fields[$f]['table'] = $tablelurd->table_name;
                }
            }
        } else
        {
            foreach ($tablelurd->fields as $k => $v)
            {
                $this->add_fields[$k] = $v;
                $this->add_fields[$k]['table'] = $tablelurd->table_name;
            }
        }
    }

    /**
     * 分析数据表
     * @return void
     */
    public function analyse_table()
    {
        if ($this->table_name == '')
        {
            exit(" No Input Table! ");
        }

        $infos_file = 'table_infos_' . $this->table_name;

        //本地缓存(如果增加了新表或修改离某表结构，临时屏蔽后面第二行让系统更新缓存)
        $tb_infos = false;
        //$tb_infos = cls_cache_native::get('lurd_', $infos_file);

        if (!empty($tb_infos))
        {
            $this->primary_key = $tb_infos['primary_key'];
            $this->fields = $tb_infos['fields'];
            $this->auto_field = $tb_infos['auto_field'];
            $this->primary_key = $tb_infos['primary_key'];
            return true;
        }

        $q = db::query(" SHOW CREATE TABLE `{$this->table_name}`; ", $this->query_master);
        $row = db::fetch_one($q, MYSQL_NUM);
        $tb_info_str = $row[1];
        if (empty($tb_info_str))
        {
            exit(" Analyse Table `{$this->table_name}` Error! ");
        }

        $flines = explode("\n", $tb_info_str);
        $parArray = array('date', 'float', 'int', 'char', 'text', 'bin', 'em');
        $prikeyTmp = '';
        for ($i = 1; $i < count($flines) - 1; $i++)
        {
            $line = trim($flines[$i]);
            $lines = explode(' ', str_replace('`', '', $line));

            if ($lines[0] == 'KEY' || $lines[0] == 'FULLTEXT')
            {
                continue;
            } else if ($lines[0] == 'UNIQUE')
            {
                //没用PRIMARY KEY的情况下用UNIQUE KEY作为主键
                if (!preg_match("/PRIMARY/", $tb_info_str))
                {
                    $this->primary_key = preg_replace("/[\(\)]|,$/", '', $lines[count($lines) - 1]);
                }
                continue;
            } else if ($lines[0] == 'PRIMARY')
            {
                $this->primary_key = preg_replace("/[\(\)]|,$/", '', $lines[count($lines) - 1]);
                continue;
            }

            //字段名称、类型
            $this->fields[$lines[0]] = array('type' => '', 'length' => '', 'unsigned' => false, 'autokey' => false, 'null' => true, 'default' => '', 'em' => '', 'comment' => '');
            $this->fields[$lines[0]]['type'] = strtoupper(preg_replace("/\(.*$|,/", '', $lines[1]));
            $this->fields[$lines[0]]['length'] = preg_replace("/^.*\(|\)/", '', $lines[1]);
            if (preg_match("/[^0-9]/", $this->fields[$lines[0]]['length']))
            {
                if ($this->fields[$lines[0]]['type'] == 'SET' || $this->fields[$lines[0]]['type'] == 'ENUM')
                {
                    $this->fields[$lines[0]]['em'] = preg_replace("/'/", '', $this->fields[$lines[0]]['length']);
                }
                $this->fields[$lines[0]]['length'] = 0;
            }

            //把特定类型的数据加入数组中
            foreach ($parArray as $v)
            {
                $tmpstr = "if(in_array(\$this->fields[\$lines[0]]['type'], \$this->{$v}_types))
                        {
                            \$this->{$v}Fields[] = \$lines[0];
                        }";
                eval($tmpstr);
            }

            if (!in_array($this->fields[$lines[0]]['type'], $this->text_types) && !in_array($this->fields[$lines[0]]['type'], $this->bin_types))
            {
                $prikeyTmp .= ($prikeyTmp == '' ? $lines[0] : ',' . $lines[0]);
            }

            //分析其它属性
            if (preg_match("/unsigned/i", $line))
            {
                $this->fields[$lines[0]]['unsigned'] = true;
            }
            if (preg_match("/auto_increment/i", $line))
            {
                $this->fields[$lines[0]]['autokey'] = true;
                $this->auto_field = $lines[0];
            }
            if (preg_match("/NOT NULL/i", $line))
            {
                $this->fields[$lines[0]]['null'] = false;
            }
            //默认值
            $arr = array();
            preg_match("/default '([^']*)'/i", $line, $arr);
            if (isset($arr[1]))
            {
                $this->fields[$lines[0]]['default'] = $arr[1];
            }
            //注解
            $arr = array();
            preg_match("/comment '([^']*)'/i", $line, $arr);
            if (isset($arr[1]))
            {
                $this->fields[$lines[0]]['comment'] = $arr[1];
            }
        }//end for

        if ($this->primary_key == '')
        {
            $this->primary_key = $prikeyTmp;
        }

        //写缓存
        $tb_infos['primary_key'] = $this->primary_key;
        $tb_infos['fields'] = $this->fields;
        $tb_infos['auto_field'] = $this->auto_field;
        $tb_infos['primary_key'] = $this->primary_key;
        cls_cache_native::set('lurd_', $infos_file, $tb_infos);

        return true;
    }

//end ayalyse_table

    /**
     * 强制指定字段为其它类型(通常是用于处理用int类型表示时间的情况，可以指定为TIMESTAMP)
     * @return void
     */
    public function bind_type($fieldname, $ftype, $format = '')
    {
        //'type' =>'','length' =>'0','unsigned'=>false,'autokey'=>false,'null'=>false,default'=>'','em'=>'','format'=>'','listtemplate'=>'','edittemplate'=>''
        $typesArr = array_merge($this->date_types, $this->float_types, $this->int_types, $this->char_types, $this->text_types, $this->bin_types, $this->em_types);
        if (isset($this->fields[$fieldname]) && in_array(strtoupper($ftype), $typesArr))
        {
            $this->fields[$fieldname]['type'] = $ftype;
            $this->fields[$fieldname]['format'] = $format;
        }
    }

    /**
     * 强制指定字模板（列表list和编辑edit、增加add模板里用）
     * @return void
     */
    public function bind_template($fieldname, $tmptype = 'list', $temp = '')
    {
        if (isset($this->fields[$fieldname]))
        {
            $this->fields[$fieldname][$tmptype . 'template'] = $temp;
        }
    }

    /**
     * 格式化Linux时间戳格式的日期
     * @parem $format
     * @parem $time
     * @return string
     */
    public static function format_date($format, $time = 0)
    {
        if (empty($time))
            $time = time();
        return date($format, $time);
    }

    /*
     * 把从表单传递回来的数值进行处理
     * @parem $fname
     * @parem $fvalue
     * @return string
     */

    public function filter_data($fname, $fvalue)
    {
        $revalue = '';
        $ftype = $this->fields[$fname]['type'];
        //二进制单独处理
        if (in_array($ftype, $this->bin_types))
        {
            return $this->filter_bindata($fvalue);
        }
        //返回默认值
        else if ($fvalue === null)
        {
            if (isset($this->fields[$fname]['default']))
            {
                return $this->fields[$fname]['default'];
            } else
            {
                if (in_array($ftype, $this->int_types) || in_array($ftype, $this->float_types))
                {
                    return '0';
                } else if (in_array($ftype, $this->char_types) || in_array($ftype, $this->text_types))
                {
                    return '';
                } else
                {
                    return 'NULL';
                }
            }
        }
        //处理整数
        else if (preg_match("/YEAR|INT/", $ftype))
        {
            $revalue = preg_replace("/[^0-9-]/", '', $fvalue);
            /*
              $negTag = is_int($fvalue)&&$fvalue<0 ? '-' : $fvalue[0];
              $revalue = preg_replace("/[^0-9]/", '', $fvalue);
              $revalue = empty($revalue) ? 0 : intval($revalue);
              if($negTag=='-' && !$this->fields[$fname]['unsigned']
              && $revalue != 0 && $ftype != 'YEAR')
              {
              $revalue = intval('-'.$revalue);
              }
             */
        }
        //处理小数类型
        else if (in_array($ftype, $this->float_types))
        {
            $negTag = $fvalue[0];
            $revalue = preg_replace("/[^0-9\.]|^\./", '', $fvalue);
            $revalue = empty($revalue) ? 0 : doubleval($revalue);
            if ($negTag == '-' && !$this->fields[$fname]['unsigned'] && $revalue != 0)
            {
                $revalue = intval('-' . $revalue);
            }
        }
        //字符串类型
        else if (in_array($ftype, $this->char_types))
        {
            $revalue = addslashes(mb_substr(stripslashes($this->String_safe($fvalue, $fname)), 0, $this->fields[$fname]['length'], 'utf-8'));
        }
        //文本类型
        else if (in_array($ftype, $this->text_types))
        {
            $revalue = $this->string_safe($fvalue, $fname);
        }
        //SET类型
        else if ($ftype == 'SET')
        {
            $sysSetArr = explode(',', $this->fields[$fname]['em']);
            if (!is_array($fvalue))
            {
                $setArr[] = $fvalue;
            } else
            {
                $setArr = $fvalue;
            }
            $revalues = array();
            foreach ($setArr as $a)
            {
                if (in_array($a, $sysSetArr))
                    $revalues[] = $a;
            }
            $revalue = count($revalues) == 0 ? 'NULL' : join(',', $revalues);
        }
        //枚举类型
        else if ($ftype == 'ENUM')
        {
            $sysEnumArr = explode(',', $this->fields[$fname]['em']);
            if (in_array($fvalue, $sysEnumArr))
            {
                $revalue = $fvalue;
            } else
            {
                $revalue = 'NULL';
            }
        }
        //时间日期类型
        else if (in_array($ftype, $this->date_types))
        {
            if ($ftype == 'TIMESTAMP')
            {
                $revalue = cls_lurd::get_mktime($fvalue);
            } else
            {
                $revalue = preg_replace("/[^0-9 :-]/", '', $fvalue);
            }
        }
        return $revalue;
    }

    /*
     * 对插入数据库的字符串进行安全处理
     * @parem $str
     * @parem $safestep (-1 不处理、 1 去除 script 等不安全html、 2 完全禁止html并替换一些不安全字符)
     * @return string
     */

    public function string_safe(&$str, $fieldname = '', $safestep = -1)
    {
        //不需过滤的字段
        if (isset($this->not_filter_fields[$this->table_name]))
        {
            if (in_array($fieldname, $this->not_filter_fields[$this->table_name]))
            {
                return $str;
            }
        }

        $safestep = ($safestep > -1) ? $safestep : $this->string_safe;
        //过滤危险的HTML(默认级别)
        if ($safestep == 1)
        {
            $str = stripslashes($str);
            $str = preg_replace("/script:/i", "ｓｃｒｉｐｔ：", $str);
            $str = preg_replace("/<[\/]{0,1}(link|meta|ifr|fra|scr|sty)[^>]*>/isU", '', $str);
            $str = preg_replace("/[\n\t ]{1,}/", ' ', $str);
            return addslashes($str);
        }
        //完全禁止HTML
        //并转换一些不安全字符串（如：eval(、union、CONCAT(、--、等）
        else if ($safestep == 2)
        {
            $str = stripslashes($str);
            $r_arr = array(array('\'', '"', '<', '>', '--'),
                array('&#039;', '&quot;', '&lt;', '&gt;', '－－'));
            $str = str_replace($r_arr[0], $r_arr[1], $str);
            $str = preg_replace("/eval/i", 'ｅｖａｌ', $str);
            $str = preg_replace("/union/i", 'ｕｎｉｏｎ', $str);
            $str = preg_replace("/concat/i", 'ｃｏｎｃａｔ', $str);
            $str = preg_replace("/[\n\t ]{1,}/", ' ', $str);
            //exit( '<xmp>'.addslashes($str) );
            return addslashes($str);
        }
        //不作安全处理
        else
        {
            return $str;
        }
    }

    /**
     * 保存二进制文件数据
     * 为了安全起见，对二进制数据保存使用base64编码后存入
     * @return string (bin => base64)
     */
    public function filter_bindata($fname, $files)
    {
        $lurdtmp = PATH_DATA . '/lurdtmp';
        if (!is_dir($lurdtmp))
        {
            mkdir($lurdtmp, 0755);
        }
        if (!isset($files[$fname]['tmp_name']) || !is_uploaded_file($files[$fname]['tmp_name']))
        {
            return '';
        } else
        {
            $tmpfile = $lurdtmp . '/' . md5(microtime(true) . mt_rand(1000, 5000)) . '.tmp';
            $rs = move_uploaded_file($files[$fname]['tmp_name'], $tmpfile);
            if (!$rs)
                return '';
            $fp = fopen($tmpfile, 'r');
            $data = base64_encode(fread($fp, filesize($tmpfile)));
            fclose($fp);
            return $data;
        }
    }

    /*
     * 从普通时间返回Linux时间截
     * parem string $dtime
     * @return int
     */

    public static function get_mktime($dtime)
    {
        return util::cn_strtotime($dtime);
    }

    /**
     * 计算满足条件的数据的记录条数
     * @param $where string
     * @return int|false
     */
    public static function count_field($where, $table = 'users_details')
    {
        if (empty($where))
        {
            return false;
        }

        $sql = "Select count(*) as c from `{$table}` where {$where}";
        $row = db::get_one($sql);
        if ($row)
        {
            return intval($row['c']);
        } else
        {
            return false;
        }
    }

    /**
     * 测试日志
     * @param string $msg
     */
    public static function debug($msg)
    {
        if (false)
        {
            $log = PATH_DATA . '/log/query.log';
            $msg = "\n" . date('Y-m-d H:i:s') . "\t{$msg}";
            @put_file($log, $msg, FILE_APPEND);
        }
    }

}

//end class
