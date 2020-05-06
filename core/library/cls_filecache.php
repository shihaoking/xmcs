<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * 文件key-value缓存系统
 *
 * 使用散列格式存储数据的key-value类：
 * 考虑效率原因, 这个程序并无replace的选项, 当重新set一个值的时候
 * 原来的值只是被标识为删除, 但实际是没有删除的, 新值追加在文件后面, 
 * 因此多次set同一个key会让文件不断增大, 所以只适用于短期缓存, 不适合长期缓存
 *
 * @author itprato<2500875@qq>
 * $Id$ 
 */
define('CFC_PHP_EXIT_CODE', '<'.'?php exit(); ?'.'>');
class cls_filecache
{
    //缓存文件
    private $_cache_file = '';
    
    //hash算法掩码0x7FFF = 32767，总数据量 ≈ $this->_mask_value * $this->_link_max / 2
    private $_mask_value = 0x7FFF;
    
    //链表最大长度（当单个hash链表太长时，性能将比较差，直接清空这个链表）
    private $_link_max = 10000;
    
    //缓存文件最大大小，超过会后rebuild收缩(单位M/默认1G)
    private $_file_max = 1024;
    
    //重建的最小间隔时间(如果重建后数据仍然过大, 会超过这个时间才重新rebuild以免死循环)
    private $_rebuild_time = 86400;
    
    //默认保留块大小(serialize 后 byte)
    //对于小于或等于这个块的数据reset时直接更新块从而不占用新的空间，此参数也可以在进行set时指定
    //如果block相对于数据块平均值过大， 会影响写入速度， 1 表示使用动态大小
    private $_default_block = 1;
    
    //文件防下载编码
    private $_exit_code = CFC_PHP_EXIT_CODE;
    
    //文件防下载编码长度
    private $_exit_code_length = 16;
    
    //删除元素时是否保留块
    //保留则下次再set时, 可以使用回这个块, 但缺点是可能导致链表增长查询变慢,
    //不保留重复删除和set则可能导致数据量增长, 视情况选择
    private $_reserve_del_block = true;
    
    //删除替代符(32位以上,非a-e的字母)
    private $_empty_key = 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh';
    
    //key和元素基本信息长度
    private $_sign_length  = 32;
    private $_meta_length = 28;
    
    private $_cache_fp = null;
    
   /**
    * 构造函数
    * @return void
    */
    public function __construct( $cache_file='filecache_data' )
    {
        $this->_file_max = $this->_file_max * 1024 * 1024;
        $this->_cache_file = $cache_file.'.php';
        if( !file_exists( $this->_cache_file ) )
        {
            $this->_create();
        }
        else if( filesize($this->_cache_file) > $this->_file_max )
        {
            $this->rebuild();
        }
    }
    
    /**
     * 清除所有缓存(实际就是重设缓存文件)
     *
     * @param $cachefile='' 文件名. 默认在 PATH_DAT.'/cache/qf_quick_cache.dat';
     *                     如果手工指定其它缓存文件, 需要用绝对路径
     * @return void
     */ 
    public function clear( )
    {
        $this->_create( $this->_cache_file );
    }
    
    /**
     * 获取指定key_index的所有链表数据
     * 返回的数据本身已经是顺序排序，所以原来的 p/n 是无效的
     * @parem $fp    文件游标
     * @parem $n_pos 起点位置
     * @return array()
     */ 
    public function _get_list( &$fp, $n_pos )
    {
        $link_datas = array();
        $n = 0;
        $pointers[] = $n_pos;
        do
        {
            fseek($fp, $n_pos);
            $sign  = fread($fp, $this->_sign_length);
            $dat   = fread($fp, $this->_meta_length);
            if( strlen($dat) < $this->_meta_length )
            {
                return $link_datas;
            }
            $darr  = unpack('l1p/l1n/l1l/l1b/l1time/l1exptime/l1rank', $dat);
            $n_pos = $darr['n'];
            if( in_array($n_pos, $pointers) ) //出现死循环
            {
                return $link_datas;
            }
            //跳过已经删除或过期的数据
            if( $darr['b'] == 0 || ($darr['exptime'] > 0 && $darr['exptime'] + $darr['time'] < time()) ) {
                continue;
            }
            $data = fread($fp, $darr['l']);
            $link_datas[ $sign ] = array('metas' => $darr, 'data' => $data);
            $n++;
            $pointers[] = $n_pos;
        } while( $n_pos > 0 && $n < $this->_link_max );
        return $link_datas;
    }
    
    /**
     * 重建缓存(此操作可以删除原来缓存多次修改后占用的空间)
     *
     * @param $cachefile='' 文件名. 默认在 PATH_DAT.'/cache/qf_quick_cache.dat';
     *                      如果手工指定其它缓存文件, 需要用绝对路径
     *
     * @return void
     */ 
    public function rebuild( )
    {
        //检查文件是否已经打开
        $this->open();
        
        $cfc_last_rebuild_time_key = 'cfc_last_rebuild_time';
        
        //检查两次rebuild间隔时间
        $last_time = $this->get( $cfc_last_rebuild_time_key );
        if( !empty($last_time) && time() - $last_time < $this->_rebuild_time )
        {
            return true;
        }
        
        //必须执行完才会结束程序
        ignore_user_abort();
        set_time_limit(0);
        ini_set('memory_limit', '128M');
        
        dump( $this->_cache_file);
        //把源数据复制到另一个文件
        $tmpfile = $this->_cache_file.'.tmp';
        flock($this->_cache_fp, LOCK_EX);
        copy($this->_cache_file, $tmpfile);
        flock($this->_cache_fp, LOCK_UN);
        fclose( $this->_cache_fp );
        
        //创建新文件
        $tmpfile_new = $this->_cache_file.'.tmp.new';
        
        //如果tmpfile_new文件不存在，可能是上次操作失败
        if( file_exists($tmpfile_new) ) {
            //return false;
        }
        
        $fpw = fopen($tmpfile_new, 'w+');
        fwrite($fpw, $this->_exit_code);
        for($i=0; $i <= $this->_mask_value; $i++)
        {
            fwrite($fpw, pack("l", 0));
        }
        $cur_w_pos = ftell( $fpw );
        
        //读原文件的数据并转移到新文件
        $link_datas = array();
        $_cache_fp = fopen($tmpfile, 'rb');
        $_cache_file_size = filesize( $this->_cache_file );
        
        $g = 0;
        
        for($i=0; $i <= $this->_mask_value; $i++)
        {
            fseek( $_cache_fp, $i * 4 + $this->_exit_code_length );
            $dat = fread($_cache_fp, 4);
            $darr = unpack('l1h', $dat);
            $d_pos = $darr['h'];
            if( $d_pos==0 )
            {
                continue;
            }
            else
            {
                $head_pos = 0;
                $link_datas = $this->_get_list( $_cache_fp, $d_pos );
                //数据为空时, 把hash头设置为0
                if( empty($link_datas) )
                {
                    fseek($fpw, $i * 4 + $this->_exit_code_length );
                    fwrite($fpw, pack("l", 0));
                    continue;
                }
                else
                {
                    //修改$head_pos
                    fseek($fpw, 0, SEEK_END);
                    $head_pos = ftell($fpw);
                    fseek($fpw, $i * 4 + $this->_exit_code_length );
                    fwrite($fpw, pack("l", $head_pos));
                }
                //写入数据(这里先用一个字符串对写入的块进行缓存, 避免太频繁的读写数据)
                $tmp_data = '';
                $p_node = 0;
                $n_start = 0;
                foreach($link_datas as $sign => $datas)
                {
                    //在结尾写数据
                    $a_len  = strlen($tmp_data);
                    $cur_pos = $head_pos + $a_len;
                    
                    $tmp_data .= $sign.pack('lllllll', $p_node, 0 , $datas['metas']['l'], $datas['metas']['b'], $datas['metas']['time'],$datas['metas']['l']['exptime'], $datas['metas']['rank']).$datas['data'];
                    
                    //修改上级的next
                    if( $p_node > 0 && $n_start > 0 ) {
                        $tmp_data = substr_replace($tmp_data, pack("l", $cur_pos), $n_start, 4 );
                    }                       
                    $p_node  = $cur_pos;
                    $n_start = $a_len + $this->_sign_length + 4;
                }
                fseek($fpw, 0, SEEK_END);
                fwrite($fpw, $tmp_data);
            }
        }
        
        fclose( $_cache_fp );
        fclose( $fpw );
        
        //转移处理后的文件
        unlink( $this->_cache_file );
        
        //把新文件改为源数据名
        rename($tmpfile_new, $this->_cache_file);
        
        //删除临时文件
        unlink($tmpfile);
        
        //重新打开文件
        $this->_cache_fp = @fopen($this->_cache_file, 'rb+');
        
        //记住当前rebuild时间, 避免数据已经无法压缩时, 无限循环的进行rebuild
        $this->set( $cfc_last_rebuild_time_key, $compress, time(), 0);
        
        return $this->_cache_fp;
    }
    
    /**
     * 打开文件
     * @return filehand
     */ 
    public function open()
    {
        if( $this->_cache_fp ) {
            return $this->_cache_fp;
        }
        
        if( !file_exists($this->_cache_file) ) {
            return $this->_create();
        }
        
        $this->_cache_fp = @fopen($this->_cache_file, 'rb+');
        
        if( !$this->_cache_fp ) {
            throw new Exception ( "Cache file is not exists or no purview!" );
        }
        
        return $this->_cache_fp;
    }
    
    /*
    * 用工厂方法创建对象实例
    *
    * @param $cachefile='' 文件名. 默认在 PATH_DAT.'/cache/'.$this->_cache_file;
    *                      如果手工指定其它缓存文件, 需要用绝对路径
    * @param $type='rb+' 打开模式(rb/rb+), 如果只读的才使用 rb 模式                   
    *
    * @return $this
    */ 
    public static function factory($cachefile='', $type='rb+')
    {
       $qc = new cls_filecache( $cachefile );
       $qc->open();
       return $qc;
    }
    
    /**
     * 创建新文件
     *
     * @param $cachefile 文件名
     * @return void
     *
     */ 
    private function _create( )
    {
        $this->_cache_fp = fopen($this->_cache_file, 'wb+');
        fwrite($this->_cache_fp, $this->_exit_code);
        for($i=0; $i <= $this->_mask_value; $i++)
        {
            fwrite($this->_cache_fp, pack("l", 0));
        }
        rewind($this->_cache_fp);
        return $this->_cache_fp;
    }
    
    /**
     * 获得索引数组
     * @param $key
     * @return array
     *
     */ 
    private function _get_index_sign( $key )
    {
        $keyindex = $this->_get_index( $key );
        $keysign  = md5(md5($key).'_'.$key);
        return array($keyindex, $keysign);
    }
    
    /**
     * 删除整个链接(把header设为0)
     * @param $key
     * @return bool
     *
     */ 
    private function _del_link( $keyindex )
    {
        fseek($this->_cache_fp, $keyindex * 4 + $this->_exit_code_length);
        fwrite($this->_cache_fp, pack("l", 0));
    }
    
    /**
     * 删除缓存(仅进行标识)
     *
     * @param $key
     * @return void
     *
     */ 
    public function delete( $key )
    {
        //检查文件是否已经打开
        $this->open();
        
        $index_sign = $this->_get_index_sign( $key );
        $key_index  = $index_sign[0];
        $key_sign   = $index_sign[1];
        
        //读取head位移
        fseek($this->_cache_fp, $key_index * 4 + $this->_exit_code_length );
        $dat = fread($this->_cache_fp, 4);
        $darr = unpack('l1h', $dat);
        $head_pos = $darr['h'];
        
        //head_pos为0, 直接返回true
        if( $head_pos==0 )
        {
            return true;
        }
        //非0, 查找数据
        else
        {
            $has_key = false;
            $n_pos = $head_pos;
            $cur_node = array();
            $n = 0;
            $pointers[] = $n_pos; //如果出现重复相同 pointer 视为死循环, 删除整条主链
            do
            {
                fseek($this->_cache_fp, $n_pos);
                $sign = fread($this->_cache_fp, $this->_sign_length);
                $dat  = fread($this->_cache_fp, $this->_meta_length);
                if( strlen($dat) < $this->_meta_length ) break;
                $cur_node = unpack('l1p/l1n/l1l/l1b/l1time/l1exptime/l1rank', $dat);
                $cur_node['pos'] = $n_pos;
                $n = 0;
                if( $sign==$key_sign ) //找到key
                {
                    //对已经标识为删除的不作处理
                    if( $cur_node['b']==0 ) {
                        return true;
                    }
                    //锁定文件
                    flock($this->_cache_fp, LOCK_EX);
                    fseek($this->_cache_fp, $n_pos);
                    if( $this->_reserve_del_block ) //保留数据块的情况下, 仅对 b/time/exptime 标识为 0/0/1，get时返回false
                    {
                        fwrite($this->_cache_fp, $key_sign.pack('lllllll', $cur_node['p'], $cur_node['n'], $cur_node['l'], 0, 0, 1, $cur_node['rank']) );
                    }
                    else  //不保留数据块，直接删除链接关系， 下次set相同key时， 开新数据块
                    {
                        fwrite($this->_cache_fp, $this->_empty_key.pack('lllllll', 0, 0, $cur_node['l'], 0, 0, 1, $cur_node['rank']) );
                        //修改父元素的next
                        if( $cur_node['p'] > 0 )
                        {
                            fseek($this->_cache_fp, $cur_node['p'] + $this->_sign_length + 4 );
                            fwrite($this->_cache_fp, pack('l', $cur_node['n']) );
                        } else {
                            fseek($this->_cache_fp, $key_index * 4 + $this->_exit_code_length );
                            fwrite($this->_cache_fp, pack('l', 0) );
                        }
                        //修改子元素的parent
                        if( $cur_node['n'] > 0 ) {
                            fseek($this->_cache_fp, $cur_node['n'] + $this->_sign_length );
                            fwrite($this->_cache_fp, pack('l', $cur_node['p']) );
                        }
                    }
                    flock($this->_cache_fp, LOCK_UN);  //解除写保护
                    return true;
                }
                $n_pos = $cur_node['n'];
                if( in_array($n_pos, $pointers) )
                {
                    $this->_del_link( $key_index );
                    throw new Exception ( 'set:'.$key.'__'.$key_index." recursion error !" );
                    return true;
                } else {
                    $pointers[] = $n_pos;
                }
                $n++;
            } while( $n_pos > 0 && $n < $this->_link_max );
            
            //当超过链表长时，清空这条链表
            if( $n > $this->_link_max ) {
                $this->_del_link( $key_index );
                return true;
            }
            
        }
        return true;
    }
    
    /**
     * delete 同名函数
     */
    public function del( $key )
    {
        return $this->delete( $key );
    }
    
    /**
     * 读缓存
     *
     * @param $key
     * @return void
     *
     */ 
    public function get( $key )
    {
        //检查文件是否已经打开
        $this->open();
        
        $index_sign = $this->_get_index_sign( $key );
        $key_index = $index_sign[0];
        $key_sign  = $index_sign[1];
        
        fseek($this->_cache_fp, $key_index * 4 + $this->_exit_code_length);
        $dat = fread($this->_cache_fp, 4);
        $darr = unpack('l1h', $dat);
        $head_pos = $darr['h'];
        if( $head_pos==0 )
        {
            return false;
        }
        $n_pos = $head_pos;
        $n = 0;
        $pointers[] = $n_pos; //如果出现重复 pointer 视为死循环, 删除整条主链
        do
        {
            fseek($this->_cache_fp, $n_pos);
            $sign  = fread($this->_cache_fp, $this->_sign_length);
            $dat   = fread($this->_cache_fp, $this->_meta_length);
            if( strlen($dat) < $this->_meta_length ) {
                return false;
            }
            $darr  = unpack('l1p/l1n/l1l/l1b/l1time/l1exptime/l1rank', $dat);
            $cur_pos = $n_pos;
            $n_pos = $darr['n'];
            if( in_array($n_pos, $pointers) ) //出现死循环
            {
                $this->_del_link( $key_index );
                throw new Exception ( 'get:'.$key.'__'.$key_index." recursion error !" );
                break;
            }
            $pointers[] = $n_pos;
            if( $sign==$key_sign )
            {
                //过期或已经删除的缓存
                if( $darr['b'] == 0 || ($darr['exptime'] > 0 && $darr['time'] + $darr['exptime'] < time()) ) {
                    return false;
                }
                
                //取数据
                $data = fread($this->_cache_fp, $darr['l']);
                $d = unserialize( $data );
                
                //增加rank(缓存的热度标识)
                fseek($this->_cache_fp, $cur_pos + $this->_sign_length + 24 );
                fwrite($this->_cache_fp, pack('l', $darr['rank']+1) );
                
                return $d;
            }
            $n++;
        } while( $n_pos > 0 && $n < $this->_link_max );
        
        //当超过链表长时，清空这条链表
        if( $n > $this->_link_max ) {
            $this->_del_link( $key_index );
        }
        
        return false;
    }
    
    /**
     * 写缓存
     *
     * 单条数据格式(sign/pre/next/datalen/data)
     *
     * @param $key
     * @param $value
     * @parem $compress 是否压缩（实际上不使用，这里仅是为了和memcache方法一致）
     * @parem $exptime 超时时间
     * @parem $block_size
     *        块大小，如果这个key的数据要经常更新， 把这个值设置比实际数据大一些， 这样在在重复set时， 就不会占用新的空间，
     *        值默认为 1 表示使用实际数据大小，在实际文件中 $block_size == 0 表示这个数据为删除状态
     * @return void
     *
     */
    public function set( $key, $value, $compress=0, $exptime=0, $block_size=1 )
    {
        //检查文件是否已经打开
        $this->open();
        
        $index_sign = $this->_get_index_sign( $key );
        $key_index  = $index_sign[0];
        $key_sign   = $index_sign[1];
        
        $value    = serialize( $value );
        if( $block_size <= 1 ) {
            $block_size = $this->_default_block;
        }
        $true_data_len = strlen( $value );
        if( $block_size==1 || $true_data_len > $block_size )
        {
            $block_size = $true_data_len;
        }
        else if( $block_size > 0 ) //补全block
        {
            $limit_size = $block_size - $true_data_len;
            for($i=0; $i < $limit_size; $i++) $value .= chr(0);
        }
        
        //锁定文件
        flock($this->_cache_fp, LOCK_EX);
        
        //读取head位移
        fseek($this->_cache_fp, $key_index * 4 + $this->_exit_code_length );
        $dat = fread($this->_cache_fp, 4);
        $darr = unpack('l1h', $dat);
        $head_pos = $darr['h'];
        
        //head_pos为0, 增加值并改变$head_pos值
        if( $head_pos==0 )
        {
            //删除数据的情况, 如果找不到, 就直接返回
            if( $block_size == 0 ) {
                return true;
            }
            
            //在结尾写数据
            fseek($this->_cache_fp, 0, SEEK_END);
            $pos = ftell($this->_cache_fp);
            fwrite($this->_cache_fp, $key_sign.pack('lllllll', 0, 0 , $true_data_len, $block_size, time(), $exptime, 1).$value );
            
            //在索引区写位移
            fseek($this->_cache_fp, $key_index * 4 + $this->_exit_code_length );
            fwrite($this->_cache_fp, pack('l', $pos) );
        }
        //非0, 查找数据
        else
        {
            $has_key = false;
            $n_pos = $head_pos;
            $cur_node = array();
            $n = 0;
            $pointers[] = $n_pos; //如果出现重复相同 pointer 视为死循环, 删除整条主链
            do
            {
                fseek($this->_cache_fp, $n_pos);
                $sign = fread($this->_cache_fp, $this->_sign_length);
                $dat  = fread($this->_cache_fp, $this->_meta_length);
                if( strlen($dat) < $this->_meta_length ) break;
                $cur_node = unpack('l1p/l1n/l1l/l1b/l1time/l1exptime/l1rank', $dat);
                $cur_node['pos'] = $n_pos;
                $n = 0;
                if( $sign==$key_sign ) //找到key
                {
                    //直接替换原数据块的数据
                    if( $cur_node['b'] >= $true_data_len )
                    {
                        fseek($this->_cache_fp, $n_pos);
                        fwrite($this->_cache_fp, $key_sign.pack('lllllll', $cur_node['p'], $cur_node['n'], $true_data_len, $block_size, time(), $exptime, $cur_node['rank']).$value );
                    }
                    //开新数据块来放置数据
                    else
                    {
                        //保存数据块
                        fseek($this->_cache_fp, 0, SEEK_END);
                        $pos = ftell($this->_cache_fp);
                        fwrite($this->_cache_fp, $key_sign.pack('lllllll', $cur_node['p'], $cur_node['n'] , $true_data_len, $block_size, time(), $exptime, $cur_node['rank']).$value );
                        
                        //标识原来元素作废
                        fseek($this->_cache_fp, $n_pos);
                        fwrite($this->_cache_fp, $this->_empty_key.pack('lllllll', 0, 0, $cur_node['b'], $cur_node['b'], 0, 1, 0) );
                        
                        //标识父元素的next
                        if( $cur_node['p'] > 0 )
                        {
                            fseek($this->_cache_fp, $cur_node['p'] + $this->_sign_length + 4 );
                            fwrite($this->_cache_fp, pack('l', $pos) );
                        }
                        
                        //标识下级元素p
                        if( $cur_node['n'] > 0 )
                        {
                            fseek($this->_cache_fp, $cur_node['n'] + $this->_sign_length );
                            fwrite($this->_cache_fp, pack('l', $pos) );
                        }
                    }
                    flock($this->_cache_fp, LOCK_UN);  //解除写保护
                    return true;
                }
                $n_pos = $cur_node['n'];
                if( in_array($n_pos, $pointers) )
                {
                    flock($this->_cache_fp, LOCK_UN);  //解除写保护
                    $this->_del_link( $key_index );
                    throw new Exception ( 'set:'.$key.'__'.$key_index." recursion error !" );
                    return $this->set( $key, $value, $compress, $exptime, $block_size );
                } else {
                    $pointers[] = $n_pos;
                }
                $n++;
            } while( $n_pos > 0 && $n < $this->_link_max );
            
            //当超过链表长时，清空这条链表
            if( $n > $this->_link_max ) {
                $this->_del_link( $key_index );
                return $this->set( $key, $value, $compress, $exptime, $block_size );
            }
            
            //如果找不到key，增加一个值
            $p_pos = empty($cur_node['pos']) ? 0 : $cur_node['pos'];
            fseek($this->_cache_fp, 0, SEEK_END);
            $pos = ftell($this->_cache_fp);
            fwrite($this->_cache_fp, $key_sign.pack('lllllll', $p_pos, 0 , $true_data_len, $block_size, time(), $exptime, 1).$value );
                
            //修改上上级链表元素节点next(n)
            if( $p_pos > 0 )
            {
                fseek($this->_cache_fp, $p_pos + $this->_sign_length + 4 );
                fwrite($this->_cache_fp, pack('l', $pos) );
            }
        }
        flock($this->_cache_fp, LOCK_UN);  //解除写保护
        return true;
    }
    
    /**
     * 关闭文件
     * (只有写入数据时, 在执行过程中才会有文件保护, 但写完后会自行解锁, 因此一般情况不需要关闭文件)
     *
     * @return void
     */ 
    public function close()
    {
        @fclose( $this->_cache_fp );
        $this->_cache_fp = null;
    }
    
    /**
     * 根据字符串计算key索引
     * @param $key
     * @return short int
     */
    private function _get_index( $key )
    {
        $l = strlen($key);
        $h = 0x238f13af;
        while ($l--)
        {
            $h += ($h << 5);
            $h ^= ord($key[$l]);
            $h &= 0x7fffffff;
        }
        return ($h % $this->_mask_value);
    }
}
