<?php
/**
 * 任意位进制转换算法（本实例为32进位）
 *
 * @author IT柏拉图 2500875
 *
 * 在32位条件下位数对应最大数字为(即是32的n次方-1)，可随用途决定选用进位数：
 * 1 - 31
 * 2 - 1023
 * 3 - 32767
 * 4 - 1048575
 * 5 - 33554431
 * 6 - 1073741823
*/
class cls_super2dec32
{
    ///个位对比数组（第一次用 make_contrast() 生成，以后不可更改）
    protected static $_super2dec_arr = array('k'=>0,'b'=>1,'n'=>2,'g'=>3,'a'=>4,'4'=>5,'9'=>6,'e'=>7,'c'=>8,'p'=>9,'3'=>10,
                                             '5'=>11,'t'=>12,'8'=>13,'w'=>14,'u'=>15,'q'=>16,'i'=>17,'r'=>18,'2'=>19,'m'=>20,'s'=>21,
                                             '0'=>22,'v'=>23,'o'=>24,'6'=>25,'1'=>26,'x'=>27,'d'=>28,'z'=>29,'j'=>30,'f'=>31);

    protected static $_dec2super_arr = array(0=>'k',1=>'b',2=>'n',3=>'g',4=>'a',5=>'4',6=>'9',7=>'e',8=>'c',9=>'p',10=>'3',
                                             11=>'5',12=>'t',13=>'8',14=>'w',15=>'u',16=>'q',17=>'i',18=>'r',19=>'2',20=>'m',21=>'s',
                                             22=>'0',23=>'v',24=>'o',25=>'6',26=>'1',27=>'x',28=>'d',29=>'z',30=>'j',31=>'f');

   ///进制数（最大为64）
   protected static $_digit = 32;

   ///随机加密最小位数
   public static $min_slen  = 16;

   ///随机加密最大位数
   public static $max_slen  = 32;

   /**
    * 生成对比位数数组
    */
    public static function make_contrast()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $super2dec_arr = '$_super2dec_arr = array(';
        $dec2super_arr = '$_dec2super_arr = array(';
        for($i=0; $i < self::$_digit; $i++)
        {
            $c = $chars[mt_rand(1, strlen($chars))-1];
            $chars = str_replace($c, '', $chars);
            $super2dec_arr .= "'{$c}'=>{$i},";
            $dec2super_arr .= "{$i}=>'{$c}',";
        }
        $super2dec_arr .= ');';
        $dec2super_arr .= ');';
        return $super2dec_arr."\n".$dec2super_arr;
    }

   /**
    * 超进位数和十进位数的个位对照数
    * @parem string $number
    * @return int | false
    */
    private static function _super2dec_base($number)
    {
        return isset(self::$_super2dec_arr[$number]) ? self::$_super2dec_arr[$number] : false;
    }

   /**
    * 十进位数和超进位数的个位对照数
    * @parem int $number
    * @return string | false
    */
    private static function _dec2super_base($number)
    {
        return isset(self::$_dec2super_arr[$number]) ? self::$_dec2super_arr[$number] : false;
    }

   /**
    * 超进位数转换为十进位数
    * @parem string $number
    * @return int | false
    */
    public static function get_dec($number)
    {
        $renum = 0;
        $nlength = strlen($number) - 1;
        $j = 0;
        for($i = $nlength; $i > -1; $i-- )
        {
            if( self::_super2dec_base($number[$i])===false )
            {
                return false;
            }
            $renum += self::_super2dec_base($number[$i]) * pow(self::$_digit, $j);
            $j++;
        }
        return $renum;
    }

   /**
    * 十进位数转为超进位数
    * @parem int $number
    * @return string | false
    */
    public static function get_super($number)
    {
        $renum = '';
        if( empty($number) )
        {
            return self::_dec2super_base(0);
        }
        $_loop = 0;
        while(true)
        {
            $_loop++;
            $next_dd   = floor( $number / self::$_digit );
            $cur_limit = $number % self::$_digit;
            if( $next_dd==0 )
            {
                if( $cur_limit != 0)
                {
                    if( self::_dec2super_base($cur_limit)===false )
                    {
                        return false;
                    }
                    $renum = self::_dec2super_base($cur_limit).$renum;
                }
                break;
            }
            else
            {
                if( self::_dec2super_base($cur_limit)===false )
                {
                     return false;
                }
                $renum = self::_dec2super_base($cur_limit).$renum;
                $number = $next_dd;
            }
            if( $_loop > 20 ) {
                return false;
            }
        }
        return $renum;
    }

   /**
    * 超进位数转换为十进位数（加密模式--超数第一位为进位标识）
    * @parem string $number
    * @return int | false
    */
    public static function get_dec_s($number)
    {
        $dd = $number[0];
        if( self::_super2dec_base($dd)===false )
        {
            return false;
        }
        self::$_digit = self::_super2dec_base($dd) + 1;
        return self::get_dec( preg_replace('/^'.$dd.'/', '', $number) );
    }

   /**
    * 十进位数转为超进位数（加密模式--随机选取数据位数进行加密，并在第一位增加位数标识）
    * @parem int $number
    * @return string | false
    */
    public static function get_super_s($number)
    {
        self::$_digit = mt_rand(self::$min_slen, self::$max_slen);
        if( self::_dec2super_base(self::$_digit-1)===false )
        {
            return false;
        }
        $snum = self::_dec2super_base(self::$_digit-1).self::get_super($number);
        return $snum;
    }

    /**
    * 获得一个和时间关连的12-x位唯一标识符
    * @parem $ulen 字符串长度（最小为12位）
    * @return string
    */
    public static function get_unique($ulen=15, $germ='')
    {
        //按每百万位数取62进制转字符串（会转换为4位字符）
        $plen = 7;
        self::$_digit = 62;
        if( empty($germ) )
        {
            //种子一，毫秒数数字去除 . ，不足14位随机补数字
            $germ1 = str_replace('.', '', sprintf('%0.4f', microtime(true)));
            while( strlen($germ1) < 14 )
            {
                $germ1 .= mt_rand(0, 9);
            }
            //种子二，百万间的随机数
            $germ2 = mt_rand(1000000, 9999999);
        
            //按每10亿位数取62进制转字符串
            $germ  = $germ1.$germ2;
        }
        $glen  = strlen($germ);
        $estr = '';
        $i = 0;
        while( $i < $glen)
        {
            $t  = substr($germ, $i, $plen);
            $estr .= self::get_super( intval($t) );
            $i += $plen;
            
        }
        while( $ulen >0 && strlen($estr) < $ulen )
        {
            $estr = self::get_super( mt_rand(0, self::$_digit-1) ).$estr;
        }
        return $estr;
    }

}

/*
//按正常的方式转换10进制数
$t = time();
$s = cls_super2dec::get_super($t);
echo 'T1:'.cls_super2dec::get_dec($s).'--'.$s.'<hr/>';

//用加密的方式转换10进制数
$s = cls_super2dec::get_super_s($t);
echo 'T2:'.cls_super2dec::get_dec_s($s).'--'.$s.'<hr/>';

//获得一个唯一标识（长度12-16）
echo 'T3:'.cls_super2dec::get_unique(16).'<hr/>';
*/


