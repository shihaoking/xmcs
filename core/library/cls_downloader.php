<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * Http 下载器
 *
 * 使用Http协议的下载类
 *
 * @version $Id$
 */
class cls_downloader
{
    var $m_url = '';
    var $m_urlpath = '';
    var $m_scheme = 'http';
    var $m_host = '';
    var $m_port = '80';
    var $m_user = '';
    var $m_pass = '';
    var $m_path = '/';
    var $m_query = '';
    var $m_fp = '';
    var $m_error = '';
    var $m_httphead = '';
    var $m_content = '';
    var $m_puthead = '';
    var $m_base_urlpath = '';
    var $m_homeurl = '';
    var $m_retry = 0;
    var $m_jumpcount = 0;
    var $m_connect_time = 5;
    var $m_iserr = false;

    
    //打开指定网址(仅开始会话)
    function open_url($url, $requestType='GET')
    {
        $this->reset();
        $this->m_jumpcount = 0;
        $this->m_httphead = Array() ;
        $this->m_content = '';
        $this->m_retry = 0;
        $this->close();

        //初始化系统
        if( !preg_match("/http:\/\//i", $url) )
        {
            $url = "http://".$url;
        }
        $this->init($url);
        $this->start($requestType);
    }
    
    //直接获得某网址内容
    public static function get_content($url)
    {
        $dl = new cls_downloader();
        $dl->open_url($url);
        return $dl->get_stream();
    }
    
    //获得文件流
    function get_stream()
    {
        if($this->m_iserr)
        {
            return '';
        }
        $this->m_content = '';
        while( !feof($this->m_fp) )
        {
           $this->m_content .= fread($this->m_fp, 10240);
        }
        $this->close();
        return $this->m_content;
    }
    
    //初始化系统
    function init($url)
    {
        if($url=='')
        {
            return ;
        }
        $urls = '';
        $urls = @parse_url($url);
        $this->m_url = $url;
        if(is_array($urls))
        {
            $this->m_host = $urls['host'];
            if(!empty($urls['scheme']))
            {
                $this->m_scheme = $urls['scheme'];
            }
            if(!empty($urls['user']))
            {
                $this->m_user = $urls['user'];
            }
            if(!empty($urls['pass']))
            {
                $this->m_pass = $urls['pass'];
            }
            if(!empty($urls['port']))
            {
                $this->m_port = $urls['port'];
            }
            if(!empty($urls['path']))
            {
                $this->m_path = $urls['path'];
            }
            $this->m_urlpath = $this->m_path;
            if(!empty($urls['query']))
            {
                $this->m_query = $urls['query'];
                $this->m_urlpath .= "?".$this->m_query;
            }
            $this->m_homeurl = $urls['host'];
            $this->m_base_urlpath = $this->m_homeurl.(isset($urls['path']) ? $urls['path'] : '');
            $this->m_base_urlpath = preg_replace("/\/([^\/]*)\.(.*)$/", "/", $this->m_base_urlpath);
            $this->m_base_urlpath = preg_replace("/\/$/", "", $this->m_base_urlpath);
        }
    }

    function reset()
    {
        //重设各参数
        $this->m_url = '';
        $this->m_urlpath = '';
        $this->m_scheme = 'http';
        $this->m_host = '';
        $this->m_port = '80';
        $this->m_user = '';
        $this->m_pass = '';
        $this->m_path = '/';
        $this->m_query = '';
        $this->m_error = '';
    }

    //转到303重定向网址
    function Jumpopen_url($url)
    {
        $this->reset();
        $this->m_jumpcount++;
        $this->m_httphead = array() ;
        $this->m_content = '';
        $this->close();

        //初始化系统
        $this->init($url);
        $this->start('GET');
    }

    //获得某操作错误的原因
    function print_error()
    {
        echo "错误信息：".$this->m_error;
        echo "<br/>具体返回头：<br/>";
        foreach($this->m_httphead as $k=>$v){ echo "$k => $v <br/>\r\n"; }
    }

    //判别用Get方法发送的头的应答结果是否正确
    function is_get_ok()
    {
        if( ereg("^2",$this->get_head("http-state")) )
        {
            return true;
        }
        else
        {
            $this->m_error .= $this->get_head("http-state")." - ".$this->get_head("http-describe")."<br/>";
            return false;
        }
    }

    //看看返回的网页是否是text类型
    function is_text()
    {
        if( ereg("^2",$this->get_head("http-state")) && eregi("text|xml",$this->get_head("content-type")) )
        {
            return true;
        }
        else
        {
            $this->m_error .= "内容为非文本类型或网址重定向<br/>";
            return false;
        }
    }

    //判断返回的网页是否是特定的类型
    function is_type($ctype)
    {
        if(ereg("^2",$this->get_head("http-state"))
        && $this->get_head("content-type")==strtolower($ctype))
        {    return true; }
        else
        {
            $this->m_error .= "类型不对 ".$this->get_head("content-type")."<br/>";
            return false;
        }
    }

    //用Http协议下载文件
    function save_bin($savefilename)
    {
        $fp = fopen($savefilename, 'wb');
        if( $this->m_content != '' )
        {
            fwrite($fp, $this->m_content);
        }
        else
        {
            fwrite($fp, $this->get_stream());
        }
        fclose($fp);
        return true;
    }

    //保存网页内容为Text文件
    function save_text($savefilename)
    {
        if($this->is_text())
        {
            return $this->save_bin($savefilename);
        }
        else
        {
            return false;
        }
    }

    //用Http协议获得一个网页的内容
    function get_html()
    {
        if( !$this->is_text() )
        {
            return '';
        }
        if( $this->m_content != '' )
        {
            return $this->m_content;
        }
        $this->get_stream();
        return $this->m_content;
    }

    //开始HTTP会话
    function start($requestType = 'GET')
    {
        
        if($this->m_host=='')
        {
            $this->m_iserr = true;
            return false;
        }
        
        $this->m_retry++;

        //发送用户自定义的请求头
        if(!isset($this->m_puthead['Accept']))
        {
            $this->m_puthead['Accept'] = '*/*';
        }
        
        //这几个head，可能导致部份网站速度变慢
        //$this->m_puthead['Cache-Control'] = 'no-cache';
        //$this->m_puthead['Connection'] = 'Keep-Alive';
        //$this->m_puthead['Pragma'] = 'no-cache';
        
        if(!isset($this->m_puthead['User-Agent']))
        {
            $this->m_puthead['User-Agent'] = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 2.0.50727)';
        }
        if( !isset($this->m_puthead['Refer']) )
        {
            $this->m_puthead['Refer'] = 'http://'.$this->m_host;
        }
        $headString = '';
        foreach($this->m_puthead as $k=>$v)
        {
            $k = trim($k);
            $v = trim($v);
            if($k!='' && $v!='')
            {
                $headString .= "$k: $v\r\n";
            }
        }

        $opts = array(
            'http'=>array(
                'method'=>$requestType,
                'header'=>$headString
            )
        );
        
        //post数据时先把url get部份提取出来（目前只支持非urlencoded形式的数据）
        if($requestType=='POST')
        {
            $postdata = preg_replace("/^(.*)\?/U", '', $this->m_url);
            if(empty($postdata)) { $postdata = 'empty=yes'; }
            $plen = strlen($postdata);
            $headString .= "Content-Type: application/x-www-form-urlencoded\r\n";
            $headString .= "Content-Length: {$plen}\r\n";
            $opts['http']['content'] = $postdata;
        }
        
        $sr = stream_context_create($opts);
        
        $this->m_fp = @fopen($this->m_url, 'rb', false, $sr);
        @stream_set_timeout($this->m_fp, $this->m_connect_time);
        
        if( !$this->m_fp )
        {
            $this->m_iserr = true;
            $this->m_error .= "打开远程主机出错!";
            return false;
        }
        
        $arr = stream_get_meta_data($this->m_fp);
        
        if( empty($arr['wrapper_data']) )
        {
            $this->m_iserr = true;
            fclose($this->m_fp);
            $this->m_error .= "通讯错误!";
            return false;
        }
        
        //获取应答头状态信息
        $httpstas = explode(' ', trim($arr['wrapper_data'][0]) );
        $this->m_httphead['http-edition'] = trim($httpstas[0]);
        $this->m_httphead['http-state'] = trim($httpstas[1]);
        $this->m_httphead['http-describe'] = (!empty($httpstas[2]) ? trim($httpstas[2]) : '');

        for($i=1; $i < count($arr['wrapper_data']); $i++)
        {
            $vstart = strpos($arr['wrapper_data'][$i], ':');
            if($vstart>0)
            {
                $k = strtolower( substr($arr['wrapper_data'][$i], 0, $vstart)  );
                $v = trim( substr($arr['wrapper_data'][$i], $vstart+1, strlen($arr['wrapper_data'][$i])-$vstart) );
                if( empty($k) )
                {
                    continue;
                }
                //数组类型的head(如cookie)
                if( isset($this->m_httphead[$k]) && $k=='set-cookie' )
                {
                    if( !is_array($this->m_httphead[$k]) )
                    {
                        $tmp = $this->m_httphead[$k];
                        $this->m_httphead[$k] = array();
                        $this->m_httphead[$k][] = $tmp;
                    }
                    $this->m_httphead[$k][] = $v;
                }
                else
                {
                    $this->m_httphead[$k] = $v;
                }
            }
        }
        if( !empty($this->m_httphead['content-type']) )
        {
            $this->m_httphead['charset'] = '';
            if( preg_match('/charset=/', $this->m_httphead['content-type']) )
            {
                $this->m_httphead['charset'] = strtolower(trim( preg_replace('/(.*)charset=/', '', $this->m_httphead['content-type']) ));
                $this->m_httphead['content-type'] = strtolower(trim( preg_replace('/;(.*)/', '', $this->m_httphead['content-type']) ));
            }
        }
        
        //如果连接被不正常关闭，重试
        if( feof($this->m_fp) )
        {
            if($this->m_retry > 3)
            {
                $this->m_iserr = true;
                $this->m_error .= "连接意外关闭!";
                return false;
            }
            $this->m_httphead = array();
            $this->start($requestType);
        }

        //判断是否是3xx开头的应答
        if(ereg('^3', $this->m_httphead['http-state']))
        {
            if($this->m_jumpcount > 3)
            {
                $this->m_iserr = true;
                $this->m_error .= "跳转次数太多！";
                return false;
            }
            if( isset($this->m_httphead['location']) )
            {
                $newurl = $this->m_httphead['location'];
                if(eregi('^http', $newurl))
                {
                    $this->Jumpopen_url($newurl);
                }
                else
                {
                    $newurl = $this->fill_url($newurl);
                    $this->Jumpopen_url($newurl);
                }
            }
            else
            {
                $this->m_error = "无法识别的答复！";
                $this->m_iserr = true;
                return false;
            }
        }

    }

    //获得一个Http头的值
    function get_head($headname)
    {
        $headname = strtolower($headname);
        return isset($this->m_httphead[$headname]) ? $this->m_httphead[$headname] : '';
    }
    
    //获取服务器端发送的页面编码信息
    function get_charset()
    {
        return $this->get_head('charset');
    }

    //设置Http头的值
    function set_head($skey,$svalue)
    {
        $this->m_puthead[$skey] = $svalue;
    }

    //关闭连接
    function close()
    {
        @fclose($this->m_fp);
    }
    
    //补全相对网址
    function fill_url($surl)
    {
        $dstr = $pstr = $okurl = '';
        $i = $pathStep = 0;
        $surl = trim($surl);
        if($surl=='')
        {
            return '';
        }
        $pos = strpos($surl,"#");
        if($pos>0)
        {
            $surl = substr($surl,0,$pos);
        }
        if($surl[0]=="/")
        {
            $okurl = "http://".$this->m_homeurl.$surl;
        }
        else if($surl[0]==".")
        {
            if(strlen($surl)<=1)
            {
                return '';
            }
            else if($surl[1]=="/")
            {
                $okurl = "http://".$this->m_base_urlpath."/".substr($surl,2,strlen($surl)-2);
            }
            else
            {
                $urls = explode("/", $surl);
                foreach($urls as $u)
                {
                    if($u=="..")
                    {
                        $pathStep++;
                    }
                    else if($i<count($urls)-1)
                    {
                        $dstr .= $urls[$i]."/";
                    }
                    else
                    {
                        $dstr .= $urls[$i];
                    }
                    $i++;
                }
                $urls = explode("/",$this->m_base_urlpath);
                if(count($urls) <= $pathStep)
                {
                    return '';
                }
                else
                {
                    $pstr = "http://";
                    for($i=0; $i<count($urls)-$pathStep; $i++)
                    {
                        $pstr .= $urls[$i]."/";
                    }
                    $okurl = $pstr.$dstr;
                }
            }
        }
        else
        {
            if(strlen($surl)<7)
            {
                $okurl = "http://".$this->m_base_urlpath."/".$surl;
            }
            else if(strtolower(substr($surl,0,7))=="http://")
            {
                $okurl = $surl;
            }
            else
            {
                $okurl = "http://".$this->m_base_urlpath."/".$surl;
            }
        }
        $okurl = eregi_replace("^(http://)","",$okurl);
        $okurl = eregi_replace("/{1,}","/",$okurl);
        return "http://".$okurl;
    }

}

