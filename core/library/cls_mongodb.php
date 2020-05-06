<?php
/**
 * mongodb 操作类
 *
 * 保存mondb的数据时需要注意,
 * 对于 int 类型, 必须严格声明, 否则可能在特殊情况下会被当成字符串, 从而无法识别
 * 可以用 MongoInt32/64 , 也可以用php默认的 intval(假如不限定整形长度的话)
 *
 * mongodb 内置的数据类型：
 * MongoId
 * MongoCode
 * MongoDate
 * MongoRegex
 * MongoBinData
 * MongoInt32
 * MongoInt64
 * MongoDBRef
 * MongoMinKey
 * MongoMaxKey
 * MongoTimestamp
 *
 * @since 2011-03-14 10:28:41
 * @author itprato<2500875@qq>
 * $Id$
 */

class cls_mongodb
{
    public static $wait_time = 500;
    protected static $db = null;
    protected static $cols = array();
    public static $con = null;

    /**
     * 构造函数
     * @parem $host 主机
     * @parem $wait_time 超时时间
     * @return void
     */
    private static function init_mongodb( $host='', $dbname='', $wait_time=0 )
    {
        if( self::$db === null )
        {
            if(empty($host)) $host = $GLOBALS['config']['mongo_host'];
            if(empty($dbname)) $dbname = $GLOBALS['config']['mongo_db'];
            if( !empty($wait_time) ) self::$wait_time = $wait_time;
            
            if( self::$con === null )
            {
                self::$con = new Mongo( $host, array('timeout'=>$wait_time, 'connect'=>true) );
            }

            self::$db = self::$con->selectDB( $dbname );
            self::$db->wtimeout = self::$wait_time;
        }
        return self::$db;
    }

    /**
     * 创建MongoDB集合
     *
     * @param string $collection_name
     * @return MongoCollection
     */
    private static function _createCollection( $collection_name )
    {
        self::init_mongodb();        
        return self::$db->createCollection( $collection_name );
    }
    
    /**
     * 选择MongoDB集合
     * 
     * @param string $collection_name
     * @return MongoCollection
     */
    private static function _selectCollection( $collection_name )
    {
        self::init_mongodb();        
        return self::$db->selectCollection( $collection_name );
    }

    /**
     * 选择集合
     *
     * @param $collection_name 数据库名
     * @return MongoCollection
     */
    public static function select( $collection_name )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::_selectCollection( $collection_name );
        }
        return self::$cols[$collection_name];
    }

    /**
     * 创建集合
     *
     * @param $collection_name 数据库名
     * @return MongoCollection
     */
    public static function create( $collection_name )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::_createCollection( $collection_name );
        }
        return self::$cols[$collection_name];
    }

    /**
     * 删除集合
     *
     * @param $collection_name 数据库名
     * @return mixed
     */
    public static function delete_col( $collection_name )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::_createCollection( $collection_name );
        }
        if( is_object(self::$cols[$collection_name]) )
        {
            return self::$cols[$collection_name]->drop();
        }
        else
        {
            return true;
        }
    }

    /**
     * 创建集合索引
     *
     * @param $collection_name 数据库名
     * @param $keys            字段 keyname=>排序方式
     * @param $options         选项 ("unique","dropDups","background","safe","name","timeout" )
     * @return MongoCollection
     */
    public static function create_index( $collection_name, $keys=array(), $options=array() )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        return self::$cols[$collection_name]->ensureIndex( $keys, $options );
    }

    /**
     * 查询单个记录
     *
     * @param $collection_name 集合名称
     * @param $condition   查询条件, 如: array("uid" => array('$gt', 100) )\array("uname" => 'test' )
     * @param $fields      返回字段
     * @return array
     */
    public static function get_one( $collection_name='', $condition=array(), $fields=array(), $key='' )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        $rs = self::$cols[$collection_name]->findOne($condition, $fields);
        return empty($key) ? $rs :( isset($rs[$key]) ? $rs[$key] : false );
    }

    /**
     * 查询多个记录
     *
     * @param $collection_name 集合名称
     * @param $condition   查询条件, 如: array("uid" => array('$gt', 100) )\array("uname" => 'test' )
     * @param $fields      返回字段
     * @param $param       参数
     * @return array
     */
    public static function get_list( $collection_name='', $condition=array(), $fields=array(), $param=array() )
    {
        // 获取记录指针
        $mongoCursor = self::find($collection_name, $condition, $fields, $param);
        // 返回数组
        return iterator_to_array($mongoCursor);        
    }

    /**
     * 查询多个记录
     * 支持order/offset/limit操作
     *
     * @param $collection_name 集合名称
     * @param $condition   查询条件, 如: array("uid" => array('$gt' , 100) ) | array("uname" => array('$in'=>array('test') ) | array("uname" => 'test' )
     * @param $fields      返回字段
     * @param $param       其他参数
     * @return MongoCursor
     */
    public static function find( $collection_name='', $condition=array(), $fields=array(), $param=array() )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        
        $mongoCursor = self::$cols[$collection_name]->find($condition, $fields);
        
        // 排序
        if( !empty($param['order']) )
        {
            self::cur_sort($mongoCursor, $param['order']);
        }
        
        // 跳过的记录数
        if( !empty($param['offset']) )
        {
            self::cur_skip($mongoCursor, $param['offset']);
        }

        // 返回游标的记录数 | 取多少条记录
        if( !empty($param['limit']) )
        {
            self::cur_limit($mongoCursor, $param['limit']);
        }
        
        return $mongoCursor;
    }
        
    /**
     * 插入一条记录
     *
     * @param $collection_name 集合名称
     * @param $docarray    文档数组
     * @param $options     选项
     * @return mixed
     */
    public static function insert_one( $collection_name='', $docarray=array(), $options=array() )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        return self::$cols[$collection_name]->insert( $docarray, $options );
    }
    public static function insert( $collection_name='', $docarray=array(), $options=array() )
    {
        return self::insert_one( $collection_name, $docarray, $options );
    }

    /**
     * 插入一条记录(如果有同样对象则更新, 没有则插入)
     *
     * @param $collection_name 集合名称
     * @param $docarray    文档数组
     * @param $options     选项
     * @return mixed
     */
    public static function insert_replace( $collection_name='', $docarray=array(), $options=array() )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        return self::$cols[$collection_name]->save( $docarray, $options );
    }

    /**
     * 插入多条记录
     *
     * @param $collection_name 集合名称
     * @param $docarray    文档数组(用 arr[]=doc1, arr[]=doc2 这样的格式)
     * @param $options     选项
     * @return mixed
     */
    public function insert_batch( $collection_name='', $docarray=array(), $options=array() )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        return self::$cols[$collection_name]->batchInsert( $docarray, $options );
    }

    /**
     * 删除记录
     *
     * @param $collection_name 集合名称
     * @param $condition   查询条件
     * @param $options     选项(justOne(bool), safe(bool), fsync(bool), timeout(int))
     * @return mixed
     */
    public static function delete( $collection_name='', $condition=array(), $options=array() )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        return self::$cols[$collection_name]->remove( $condition, $options );
    }

    /**
     * 更新记录
     *
     * @param $collection_name 集合名称
     * @param $condition   条件, 如: array("uid" => array('$gt', 100) )\array("uname" => 'test' )
     * @param $docarray    文档更新内容数组 如: array('$set' => array('gift' => $surprise)), array("multiple" => true)
     * @param $options     选项(upsert\multiple\safe\fsync\timeout)
     * @return mixed
     */
    public static function update( $collection_name='', $condition=array(), $docarray=array(), $options=array() )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        return self::$cols[$collection_name]->update( $condition, $docarray, $options );
    }

    /**
     * 记录数统计
     *
     * @param $collection_name 集合(表)名称
     * @param $condition   条件, 如: array("uid" => array('$gt', 100) )\array("uname" => 'test' )
     * @param $options     选项(upsert\multiple\safe\fsync\timeout)
     * @return mixed
     */
    public static function count( $collection_name='', $condition=array(), $limit = 0, $skip = 0 )
    {
        if( !isset( self::$cols[$collection_name] ) )
        {
            self::$cols[$collection_name] = self::select( $collection_name );
        }
        return self::$cols[$collection_name]->count( $condition, $limit, $skip );
    }

    /**
     * 从游标里取得一条记录
     *
     * @param $mcursor     游标对象
     * @return mixed
     */
    public static function cur_get( $mcursor )
    {
        if( !$mcursor->hasNext() )
        {
            return null;
        }
        else
        {
            return $mcursor->getNext();
        }
    }

    /**
     * 把游标转换成数据(获得游标所有记录)
     *
     * @param $mcursor     游标对象
     * @return mixed
     */
    public static function cur_toarray( $mcursor )
    {
        return $mcursor->explain();
    }

    /**
     * 析放游标
     *
     * @param $mcursor     游标对象
     * @return mixed
     */
    public static function cur_free( $mcursor )
    {
        return $mcursor->reset();
    }

    /**
     * 重设游标
     *
     * @param $mcursor     游标对象
     * @return mixed
     */
    public static function cur_rewind( $mcursor )
    {
        return $mcursor->rewind();
    }
    
    /**
     * 跳过记录数
     *
     * @param $mcursor      游标对象
     * @param $skip         记录数
     * @return MongoCursor  (返回一个新游标)
     */
    public static function cur_skip( $mcursor, $skip )
    {
        return $mcursor->skip( $skip );
    }

    /**
     * 取游标记录条数
     *
     * @param $mcursor      游标对象
     * @param $limit        位置
     * @return MongoCursor  (返回一个新游标)
     */
    public static function cur_limit( $mcursor, $limit )
    {
        return $mcursor->limit( $limit );
    }
    
    /**
     * 返回根据条件找到的记录数
     * 如果$foundonly=TRUE,则返回受skip,limit影响的行数
     * 
     * @access public
     * @param mixed $mcursor
     * @param bool $foundonly
     * @return void
     */
    public static function cur_count($mcursor, $foundonly = FALSE)
    {
        return $mcursor->count($foundonly);
    }

    /**
     * 游标记录排序
     *
     * @param $mcursor     游标对象
     * @parem $fields      排序字段(如: array('date' => 1, 'age' => -1) 其实是 1 是 asc -1 是desc)
     * @return mixed
     */
    public static function cur_sort( $mcursor, $fields )
    {
        $arr = array('asc'=>1, 'desc'=>-1);
        foreach($fields as $k => $v)
        {
            $v = strtolower($v);
            if (isset($arr[$v]))
            {
                $fields[$k] = $arr[$v];
            }
        }
        return $mcursor->sort( $fields );
    }

}
