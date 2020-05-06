<?php

/*
 获取所有文章栏目的对象
 */

if (!defined('CORE'))
    exit('Request Error!');

class mod_wuhangbazi
{
	
	/***
	 *获取五行八字
	 所有八字五行都在里面
	 */
	public function get_bzwh($xing,$ming,$sex,$y,$m,$d,$h,$i,$cY,$cM,$cD,$cH,$term1,$term2,$start_term,$end_term,$start_term1,$end_term1,$lDate){
		
            $gz=mod_suanming::getSizhu($y,$m,$d,$h,'0',$i);
            $yg=$gz[0];$yz=$gz[1];$b1=$yg.$yz;
            $mg=$gz[2];$mz=$gz[3];$b2=$mg.$mz;
            $rg=$gz[4];$rz=$gz[5];$b3=$rg.$rz;
            $hg=$gz[6];$hz=$gz[7];$b4=$hg.$hz;
            $bazi=$b1.$b2.$b3.$b4;
            $bazi=$b1.$b2.$b3.$b4;

			$ganzhi=new cls_ganzhi();

            $hold=substr($ganzhi->GetHour($y,$m,$d,$h),3,3);//时辰，

            $siji = $ganzhi->siji($m);
			
            $bazi1=substr($bazi,0,3);

            $bazi2=substr($bazi,3,3);

            $bazi3=substr($bazi,6,3);

            $bazi4=substr($bazi,9,3);

            $bazi5=substr($bazi,12,3);

            $bazi6=substr($bazi,15,3);

            $bazi7=substr($bazi,18,3);

            $bazi8=substr($bazi,21,3);

            $wh1=$ganzhi->tgdzwh($bazi1);

            $wh2=$ganzhi->tgdzwh($bazi2);

            $wh3=$ganzhi->tgdzwh($bazi3);

            $wh4=$ganzhi->tgdzwh($bazi4);

            $wh5=$ganzhi->tgdzwh($bazi5);

            $wh6=$ganzhi->tgdzwh($bazi6);

            $wh7=$ganzhi->tgdzwh($bazi7);

            $wh8=$ganzhi->tgdzwh($bazi8);

            //include PATH_LIBRARY . '/suanming/cls_nongli.php';

            $nongli = new cls_nongli();
            $month = $nongli->convertSolarToLunar($y,$m,$d);
			
            $darray=array("初一","初二","初三","初四","初五","初六","初七","初八","初九","初十",

                "十一","十二","十三","十四","十五","十六","十七","十八","十九","二十",

                "廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十");

            $marray=array('正月','二月','三月','四月','五月','六月','七月','八月','九月','十月','冬月','腊月');

            $ndarray=array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30');

            $nmarray=array('1','2','3','4','5','6','7','8','9','10','11','12');

            $date = strtotime($month[0].str_replace($marray,$nmarray,$month[1]).str_replace($darray,$ndarray,$month[2]));

            $lunar = new cls_lunar();
            $sx=$lunar->get_animal($month[0]);//生肖
			
			//if(strpos($_SERVER['HTTP_HOST'],'ka')===false && strpos($_SERVER['HTTP_HOST'],'lo')===false && strpos($_SERVER['HTTP_HOST'],'nh')===false)exit;

            $ayear=explode('年',$lDate);

            $ayue=explode('月',$ayear[1]);

            $ari=explode('日',$ayue[1]);

            $nownian=date('Y',time());
            $nianling=$nownian-$y;

            //将个人信息封装成数组

            $sex==0?$sex='男':$sex='女';

            $cookies_x['siji'] = $siji;

            $cookies_x['xingming']=array('xing'=>$xing,'ming'=>$ming);

            $cookies_x['sex']=$sex;
			
			$cookies_x['sx'] = $sx;

            $cookies_x['xuexing']=$xuexing;

            $cookies_x['nianling']=array('y'=>$y,'m'=>$m,'d'=>$d,'h'=>$h,'i'=>$i,'nl'=>$nianling);

            $cookies_x['jieqi']=array('term1'=>$term1,'term2'=>$term2);

            $cookies_x['jiuli']=array('y'=>$ayear[0],'m'=>$ayue[0],'d'=>$ari[0],'h'=>$hold);

            $cookies_x['bazi']=array($bazi1,$bazi2,$bazi3,$bazi4,$bazi5,$bazi6,$bazi7,$bazi8);

            $cookies_x['wh']=array($wh1,$wh2,$wh3,$wh4,$wh5,$wh6,$wh7,$wh8);

            $cookies_x['cD']=$cD;

            $cookies_x['lDate']=$lDate;

            $cookies_x['cY']=$cY;

            $cookies_x['cH']=$cH;

            $cookies_x['cM']=$cM;

            $cookies_x['start_term']=$start_term;

            $cookies_x['end_term']=$end_term;

            $cookies_x['start_term1']=$start_term1;

            $cookies_x['end_term1']=$end_term1;
			
			return $cookies_x;
	}
}
