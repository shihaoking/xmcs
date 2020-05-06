<?php
/**
 * class attributeParse
 * 属性解析器
 * 把 att1='123' att2=1 att3 = "U\"U\"U" 这种属性串进行解析结果传递给 class attribute (属性的结构描述类)
 *
 * @version $Id$
 */
class cls_attributeparse
{
    var $source_string     = '';    //源字符串
    var $source_max_size   = 1024;  //最大源长度
    var $c_att             = '';    //模述属性的对象
    var $char_tolower      = true;  //具体属性项名称转为小写
    
    function set_source($str = '')
    {
        $this->c_att = new attribute();
        $strLen = 0;
        $this->source_string = trim(preg_replace("/[ \r\n\t\f]{1,}/", " ", $str));
        $strLen = strlen($this->source_string);
        if($strLen>0 && $strLen <= $this->source_max_size)
        {
            $this->parse_attribute();
        }
    }

    //解析属性
    function parse_attribute()
    {
        $d = '';
        $tmpatt = '';
        $tmpvalue = '';
        $startdd = -1;
        $ddtag = '';
        $hasattribute=false;
        $strLen = strlen($this->source_string);

        // 获得Tag的名称，解析到 cAtt->get_att('tagname') 中
        for($i=0; $i<$strLen; $i++)
        {
            if($this->source_string[$i]==' ')
            {
                $this->c_att->count++;
                $tmpvalues = explode('.', $tmpvalue);
                $this->c_att->items['tagname'] = ($this->char_tolower ? strtolower($tmpvalues[0]) : $tmpvalues[0]);
                if( isset($tmpvalues[2]) )
                {
                    $okname = $tmpvalues[1];
                    for($j=2;isset($tmpvalues[$j]);$j++)
                    {
                        $okname .= "['".$tmpvalues[$j]."']";
                    }
                    $this->c_att->items['name'] = $okname;
                }
                else if(isset($tmpvalues[1]) && $tmpvalues[1]!='')
                {
                    $this->c_att->items['name'] = $tmpvalues[1];
                }
                $tmpvalue = '';
                $hasattribute = true;
                break;
            }
            else
            {
                $tmpvalue .= $this->source_string[$i];
            }
        }

        //不存在属性列表的情况
        if(!$hasattribute)
        {
            $this->c_att->count++;
            $tmpvalues = explode('.', $tmpvalue);
            $this->c_att->items['tagname'] = ($this->char_tolower ? strtolower($tmpvalues[0]) : $tmpvalues[0]);
            if( isset($tmpvalues[2]) )
            {
                $okname = $tmpvalues[1];
                for($i=2;isset($tmpvalues[$i]);$i++)
                {
                    $okname .= "['".$tmpvalues[$i]."']";
                 }
                $this->c_att->items['name'] = $okname;
            }
            else if(isset($tmpvalues[1]) && $tmpvalues[1]!='')
            {
                $this->c_att->items['name'] = $tmpvalues[1];
            }
            return ;
        }
        $tmpvalue = '';

        //如果字符串含有属性值，遍历源字符串,并获得各属性
        for($i; $i<$strLen; $i++)
        {
            $d = $this->source_string[$i];
            //查找属性名称
            if($startdd==-1)
            {
                if($d != '=')
                {
                    $tmpatt .= $d;
                }
                else
                {
                    if($this->char_tolower)
                    {
                        $tmpatt = strtolower(trim($tmpatt));
                    }
                    else
                    {
                        $tmpatt = trim($tmpatt);
                    }
                    $startdd=0;
                }
            }

            //查找属性的限定标志
            else if($startdd==0)
            {
                switch($d)
                {
                    case ' ':
                        break;
                    case '\'':
                        $ddtag = '\'';
                        $startdd = 1;
                        break;
                    case '"':
                        $ddtag = '"';
                        $startdd = 1;
                        break;
                    default:
                        $tmpvalue .= $d;
                        $ddtag = ' ';
                        $startdd = 1;
                        break;
                }
            }
            else if($startdd==1)
            {
                if($d==$ddtag && ( isset($this->source_string[$i-1]) && $this->source_string[$i-1]!="\\") )
                {
                    $this->c_att->count++;
                    $this->c_att->items[$tmpatt] = trim($tmpvalue);
                    $tmpatt = '';
                    $tmpvalue = '';
                    $startdd = -1;
                }
                else
                {
                    $tmpvalue .= $d;
                }
            }
        }//for

        //最后一个属性的给值
        if($tmpatt != '')
        {
            $this->c_att->count++;
            $this->c_att->items[$tmpatt] = trim($tmpvalue);
        }//print_r($this->c_att->items);

    }// end func

}

/***************************
 * class attribute
 * 属性的数据描述
***************************/
class attribute
{
    var $count = -1;
    var $items = ''; //属性元素的集合

    //获得某个属性
    function get_att($str, $dfstr='')
    {
        if($str == '')
        {
            return '';
        }
        if(isset($this->items[$str]))
        {
            return $this->items[$str];
        }
        else
        {
            return $dfstr;
        }
    }

    //判断属性是否存在
    function is_att($str)
    {
        if(isset($this->items[$str])) return true;
        else return false;
    }

    //获得标记名称
    function get_tagname()
    {
        return $this->get_att('tagname');
    }

    // 获得属性个数
    function get_count()
    {
        return $this->count+1;
    }
}
