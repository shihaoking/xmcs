<?php
if (!defined('CORE')) {
    exit('Request Error!');
}

class mod_ffsm_xingming {

    public static function xmfx($row,$baziwuhang=1){

        $sex = array(0=>'1',1=>'0');

        $cookies = mod_wuhangbazi::get_bzwh($row['xing'],$row['username'],$sex[$row['gender']],$row['y'],$row['m'],$row['d'],$row['h'],$row['i'],$row['cY'],$row['cM'],$row['cD'],$row['cH'],$row['term1'],$row['term2'],$row['start_term'],$row['end_term'],$row['start_term1'],$row['end_term1'],$row['lDate']);
        $info = self::public_sm($cookies);

        $sqlsx='select * from `ffsm_xz_xg_cy_aq_jk_sy` where sx = "'.$cookies['sx'].'"';
        $sxjj=db::queryone($sqlsx);
        $return['data']['zonghe'] = $sxjj;


        $xiyongshen = mod_ffsm_bazi::xishen($cookies);
        $return['data']['xiyongshen'] = $xiyongshen;


        $sql='select * from `sm_qtbj` where tg="'.$cookies['bazi'][4].'" and dz="'.$cookies['bazi'][3].'"';
        $qtbj=db::queryone($sql);
        $return['data']['qtbj'] = $qtbj;


        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['m']."月'";
        $ml['yml']=db::queryone($sql);
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['d']."日'";
        $ml['rml']=db::queryone($sql);
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['h']."时'";
        $ml['sml']=db::queryone($sql);
        $return['data']['ml'] = $ml;

        $return['user'] = $cookies;
        $return['info'] = $info;

        $xing = $row['xing'];
        $ming = $row['username'];

        $xing1=substr($xing,0,3);
        $ming1=substr($ming,0,3);

        $wh_bh_arr = mod_xingming::get_bihua($xing1);

        $bihua1 = $wh_bh_arr['bihua'];
        $hzwh1 = $wh_bh_arr['hzwh'];
        $tiange=$bihua1+1;
        $tiangee=$bihua1+1;
        $renge1=$bihua1;


        $xing2=substr($xing,3,3);
        if($xing2!=''){
            $wh_bh_arr2 = mod_xingming::get_bihua($xing2);
            $bihua2 = $wh_bh_arr2['bihua'];
            $hzwh2 = $wh_bh_arr2['hzwh'];
            $xing22=$xing2;
            $tiange=$bihua1+$bihua2;
            $tiangee=$bihua1+$bihua2;
            $renge1=$bihua2;

            $xing2py = mod_xingming::Pinyin_sm($xing2,1);
            $xing2gb = mod_xingming::gb_big5($xing2);
        }


        $ming_wh_bh_arr = mod_xingming::get_bihua($ming1);
        $bihua3 = $ming_wh_bh_arr['bihua'];
        $hzwh3 = $ming_wh_bh_arr['hzwh'];
        $dige=$bihua3+1;
        $digee=$bihua3+1;
        $renge2=$bihua3;


        $ming2=substr($ming,3,3);
        if($ming2!=''){
            $ming_wh_bh_arr2 = mod_xingming::get_bihua($ming2);
            $bihua4 = $ming_wh_bh_arr2['bihua'];
            $hzwh4 = $ming_wh_bh_arr2['hzwh'];

            $dige=$bihua3+$bihua4;
            $digee=$bihua3+$bihua4;

            $ming2py = mod_xingming::Pinyin_sm($ming2,1);
            $ming2gb = mod_xingming::gb_big5($ming2);
        }

        //gb_big5
        $xm_arr = array('xing1'=>$xing1,'xing1py'=>mod_xingming::Pinyin_sm($xing1,1),'xing1gb'=>mod_xingming::gb_big5($xing1),'xing2'=>$xing2,'xing2py'=>$xing2py,'xing2gb'=>$xing2gb,'ming1'=>$ming1,'ming1py'=>mod_xingming::Pinyin_sm($ming1,1),'ming1gb'=>mod_xingming::gb_big5($ming1),'ming2'=>$ming2,'ming2py'=>$ming2py,'ming2gb'=>$ming2gb);

        $return['xm_arr'] = $xm_arr;
        $bh_wh_arr = array('bihua1'=>$bihua1,'bihua2'=>$bihua2,'bihua3'=>$bihua3,'bihua4'=>$bihua4,'hzwh1'=>$hzwh1,'hzwh2'=>$hzwh2,'hzwh3'=>$hzwh3,'hzwh4'=>$hzwh4);

        $return['bh_wh_arr'] = $bh_wh_arr;


        $zhongge=$bihua1+$bihua2+$bihua3+$bihua4;
        $zhonggee=$bihua1+$bihua2+$bihua3+$bihua4;
        //计算三才
        $renge=$renge1+$renge2;
        $rengee=$renge1+$renge2;
        $waige=$zhongge-$renge;
        $waigee=$zhonggee-$rengee;
        if($xing2==''){
            $waige=$waige+1;
            $waigee=$waigee+1;
        }
        if($ming2==''){
            $waige=$waige+1;
            $waigee=$waigee+1;
        }

        //天格	$bihua1=db::queryone($sql);

        $sql="select * from `sm_81` where num='".$tiangee."'";
        $tiangearr=db::queryone($sql);
        $tiangearr['tiangee'] = $tiangee;
        $return['tiangearr'] = $tiangearr;


        //人格	$bihua1=db::queryone($sql);
        $sql="select * from `sm_81` where num='".$rengee."'";
        $rengearr=db::queryone($sql);
        $rengearr['rengee'] = $rengee;
        $return['rengearr'] = $rengearr;

        //地格	$bihua1=db::queryone($sql);
        $sql="select * from `sm_81` where num='".$digee."'";
        $digearr=db::queryone($sql);
        $digearr['digee'] = $digee;
        $return['digearr'] = $digearr;

        //外格	$bihua1=db::queryone($sql);
        $sql="select * from `sm_81` where num='".$waigee."'";
        $waigearr=db::queryone($sql);
        $waigearr['waigee'] = $waigee;
        $return['waigearr'] = $waigearr;

        //总格	$bihua1=db::queryone($sql);
        $sql="select * from `sm_81` where num='".$zhongge."'";
        $zonggearr=db::queryone($sql);
        //$zonggearr['waigee'] = $zonggee;
        //tpl::assign('zonggearr',$zonggearr);





        $tian_sancai = mod_xingming::getsancai($tiange);
        $ren_sancai = mod_xingming::getsancai($renge);
        $di_sancai = mod_xingming::getsancai($dige);
        //三才吉凶
        $sancai=$tian_sancai.$ren_sancai.$di_sancai;
        $sqlsancai="select * from `sm_sancai` where `title`='".$sancai."'";
        $rssancai=db::queryone($sqlsancai);
        $rssancai['sancai'] = $sancai;
        $return['rssancai'] = $rssancai;

        $tdr_ge = array('renge'=>$renge,'tiange'=>$tiange,'dige'=>$dige,'tian_sancai'=>$tian_sancai,'ren_sancai'=>$ren_sancai,'di_sancai'=>$di_sancai,'waige'=>$waige,'waige_sancai'=>mod_xingming::getsancai($waige),'zhongge'=>$zhongge,'zongge_sancai'=>mod_xingming::getsancai($zhongge));

        $return['tdr_ge'] = $tdr_ge;

        $xmdf=mod_xingming::getpf($tiangearr['jx'])/10+mod_xingming::getpf($rengearr['jx'])+mod_xingming::getpf($digearr['jx'])+mod_xingming::getpf($zonggearr['jx'])+mod_xingming::getpf($waigearr['jx'])/10+mod_xingming::getpf($rssancai['jx'])/4+mod_xingming::getpf($rssancai['jx1'])/4+mod_xingming::getpf($rssancai['jx2'])/4+mod_xingming::getpf($rssancai['jx3'])/4;
        if($zhonggee>60){
            $xmdf=$xmdf-4;
        }



        $xmdf=58+$xmdf;
        $return['xmdf'] = $xmdf;

        return $return;
    }


    private static function public_sm($cookies){
        $jmsh['jin'] = mod_suanming::howstring($cookies['wh'],'金');
        $jmsh['mu'] = mod_suanming::howstring($cookies['wh'],'木');
        $jmsh['shui'] = mod_suanming::howstring($cookies['wh'],'水');
        $jmsh['huo'] = mod_suanming::howstring($cookies['wh'],'火');
        $jmsh['tu'] = mod_suanming::howstring($cookies['wh'],'土');


        $wharr = self::whwq_ff($jmsh['jin'],$jmsh['mu'],$jmsh['shui'],$jmsh['huo'],$jmsh['tu']);
        //同类异类五行
        $sql="select * from `sm_wh` where wh='".$cookies['wh'][4]."'";
        $tywh = db::queryone($sql);



        //纳音
        $sql='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][0].$cookies['bazi'][1].'"';
        $nayin[]=db::queryone($sql);
        $sql2='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][2].$cookies['bazi'][3].'"';
        $nayin[]=db::queryone($sql2);
        $sql3='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][4].$cookies['bazi'][5].'"';
        $nayin[]=db::queryone($sql3);
        $sql4='select * from `sm_jiazi` where jiazi="'.$cookies['bazi'][6].$cookies['bazi'][7].'"';
        $nayin[]=db::queryone($sql4);

        foreach($nayin as $ksi=>$vsi){
            $nayin[$ksi]['whsx']=mod_ffsm_public::jiazi_to_wh_sx($vsi['jiazi']);
        }


        //生肖个性
        $sql="select * from `sm_sxgx` where sx='".$cookies['sx']."'";
        $sxgx=db::queryone($sql);


        //节气
        $solarTerm =array("小寒","大寒 ","立春","雨水 ","惊蛰","春分 ","清明","谷雨 ","立夏","小满 ","芒种","夏至 ","小暑","大暑 ","立秋","处暑 ","白露","秋分 ","寒露","霜降 ","立冬","小雪 ","大雪","冬至 ");
        eregi("(.*)/(.*)", $cookies['jieqi']['term1'],$zc_1);
        $zc1 = $solarTerm[$zc_1[1]].$zc_1[2];
        eregi("(.*)/(.*)", $cookies['jieqi']['term2'], $zc_2);
        $zc2 = $solarTerm[$zc_2[1]].$zc_2[2];

        $info['jmsh'] = $jmsh;
        $info['wharr'] = $wharr;
        $info['tywh'] = $tywh;
        $info['nayin'] = $nayin;
        $info['sxgx'] = $sxgx;
        return $info;
    }


    //八字排盘
    //真太阳时就设置为1
    function bazipp($row){

        $row = json_decode(urldecode($row['data']),true);

        $sex = array(0=>'1',1=>'0');

        $bzname = $row['username'];
        $area='';
        $sex = $sex[$row['gender']];
        $yezis=0;
        $nian1=$row['y'];
        $yue1=$row['m'];
        $ri1=$row['d'];
        $hour1=$row['h'];
        $minues=$row['i'];
        $taiyang='';

        $tiangan=array("癸","甲","乙","丙","丁","戊","己","庚","辛","壬");
        $dizhi=array("亥","子","丑","寅","卯","辰","巳","午","未","申","酉","戌");
        $jq=array("立春","惊蛰" ,"清明"  ,"立夏" ,"芒种","小暑","立秋" ,"白露","寒露" ,"立冬","大雪","小寒");

        if($jd1=='') $jd1=120;//经度度
        if($jd2=='') $jd2=0;//经度分



        $notydate=mktime($hour1,$minues,0,$yue1,$ri1,$nian1);
        if($taiyang==0){
            $bzdate=$notydate;
            $bzdatess = date('Y年m月d日',$bzdate);
        }else{
            $bzdate=cls_paipan::getTaiyang($notydate,$jd1,$jd2);
            $nian1=date("Y",$bzdate);
            $yue1=date("m",$bzdate);
            $ri1=date("d",$bzdate);
            $hour1=date("H",$bzdate);
            $minues=date("i",$bzdate);
        }

        //echo $nian1.$yue1.$ri1.$hour1;

        $nongarr=cls_paipan_function::getNongli($nian1,$yue1,$ri1,$hour1);

        //$nongli = new cls_nongli();
        //$xinli = $nongli->convertSolarToLunar($nian1,$yue1,$ri1);

        $nongdate=$nongarr[0]."年(生肖".$nongarr[5].")".$nongarr[1]."月".$nongarr[2].$nongarr[3]."时";




        $cgp=1;//req::item('cgp');

        if($yezis==1 && $hour1>=23){
            $yedundate=mktime($hour1,$minues,0,$yue1,$ri1+1,$nian1);
            $nian1=date("Y",$yedundate);
            $yue1=date("m",$yedundate);
            $ri1=date("d",$yedundate);
        }
        $gzx=cls_paipan_function::getSizhu($nian1,$yue1,$ri1,$hour1,'1');
        $ygx=$gzx[0];
        $yzx=$gzx[1];
        $mgx=$gzx[2];
        $mzx=$gzx[3];
        $rgx=$gzx[4];
        $rzx=$gzx[5];
        $hgx=$gzx[6];
        $hzx=$gzx[7];

        $gz=cls_paipan_function::getSizhu($nian1,$yue1,$ri1,$hour1,'0',$minues);

        $yg=$gz[0];$yz=$gz[1];$ygz=$yg.$yz;
        $mg=$gz[2];$mz=$gz[3];$mgz=$mg.$mz;
        $rg=$gz[4];$rz=$gz[5];$rgz=$rg.$rz;
        $hg=$gz[6];$hz=$gz[7];$hgz=$hg.$hz;
        //--》以上生辰八字没有精准到节气

        $flag=0;
        if ($ygx%2==1) $flag=1; //阳年
        if(($sex==1 && $flag==1) or ($sex==0 and $flag==0)){
            $bz_sx=1;
        }else{
            $bz_sx=0;
        }
        $taiyuan=cls_paipan::getTaiyuan($mgx,$mzx);
        $minggong=cls_paipan::getMinggong($mzx,$hzx,$ygx);//胎元



        if($cgp==1){//藏干go
            $ycg=cls_paipan::getDcang($yzx);

            $ycg1=substr($ycg,0,3);
            $ycg1x=array_search($ycg1,$tiangan);
            $ysshen1="(".cls_paipan::getShishen($ycg1x,$rgx).")";

            $ycg2='';
            $ycg2x='';
            $ysshen2='';
            if(substr($ycg,3,3)!=''){
                $ycg2=substr($ycg,3,3);
                $ycg2x=array_search($ycg2,$tiangan);
                $ysshen2="(".cls_paipan::getShishen($ycg2x,$rgx).")";
            }
            $ycg3='';
            $ycg3x='';
            $ysshen3='';
            if(substr($ycg,6,3)!=''){

                $ycg3=substr($ycg,6,3);
                $ycg3x=array_search($ycg3,$tiangan);
                $ysshen3="(".cls_paipan::getShishen($ycg3x,$rgx).")";
            }
            $mcg=cls_paipan::getDcang($mzx);
            $mcg1=substr($mcg,0,3);
            $mcg1x=array_search($mcg1,$tiangan);
            $msshen1="(".cls_paipan::getShishen($mcg1x,$rgx).")";
            $mcg2='';
            $mcg2x='';
            $msshen2='';
            if(substr($mcg,3,3)!=''){
                $mcg2=substr($mcg,3,3);
                $mcg2x=array_search($mcg2,$tiangan);
                $msshen2="(".cls_paipan::getShishen($mcg2x,$rgx).")";
            }
            $mcg3='';
            $mcg3x='';
            $msshen3='';
            if(substr($mcg,6,3)!=''){
                $mcg3=substr($mcg,6,3);
                $mcg3x=array_search($mcg3,$tiangan);
                $msshen3="(".cls_paipan::getShishen($mcg3x,$rgx).")";
            }
            $rcg=cls_paipan::getDcang($rzx);
            $rcg1=substr($rcg,0,3);
            $rcg1x=array_search($rcg1,$tiangan);
            $rsshen1="(".cls_paipan::getShishen($rcg1x,$rgx).")";
            $rcg2='';
            $rcg2x='';
            $rsshen2='';
            if(substr($rcg,3,3)!=''){
                $rcg2=substr($rcg,3,3);
                $rcg2x=array_search($rcg2,$tiangan);
                $rsshen2="(".cls_paipan::getShishen($rcg2x,$rgx).")";
            }
            $rcg3='';
            $rcg3x='';
            $rsshen3='';
            if(substr($rcg,6,3)!=''){
                $rcg3=substr($rcg,6,3);
                $rcg3x=array_search($rcg3,$tiangan);
                $rsshen3="(".cls_paipan::getShishen($rcg3x,$rgx).")";
            }
            $hcg=cls_paipan::getDcang($hzx);
            $hcg1=substr($hcg,0,3);
            $hcg1x=array_search($hcg1,$tiangan);
            $hsshen1="(".cls_paipan::getShishen($hcg1x,$rgx).")";
            $hcg2='';
            $hcg2x='';
            $hsshen2='';
            if(substr($hcg,3,3)!=''){
                $hcg2=substr($hcg,3,3);
                $hcg2x=array_search($hcg2,$tiangan);
                $hsshen2="(".cls_paipan::getShishen($hcg2x,$rgx).")";
            }
            $hcg3='';
            $hcg3x='';
            $hsshen3='';
            if(substr($hcg,6,3)!=''){
                $hcg3=substr($hcg,6,3);
                $hcg3x=array_search($hcg3,$tiangan);
                $hsshen3="(".cls_paipan::getShishen($hcg3x,$rgx).")";
            }
        }//藏干end


        $nayintaiyuan = cls_paipan::getNayin($taiyuan);
        $nayinminggong = cls_paipan::getNayin($minggong);

        $shishen = cls_paipan::getShishen($ygx,$rgx);
        $shishen .= cls_paipan::getShishen($mgx,$rgx);
        $riyuan = cls_paipan::getShishen($hgx,$rgx);
        $shishen1 = cls_paipan::getShishen($ygx,$rgx);
        $shishen2 = cls_paipan::getShishen($mgx,$rgx);
        $shishen3 = cls_paipan::getShishen($dgx,$rgx);
        $shishen4 = cls_paipan::getShishen($hgx,$rgx);
        $sizhu = $ygz.'&nbsp;'.$mgz.'&nbsp;'.$rgz.'&nbsp;'.$hgz.'&nbsp;空('.cls_paipan::xunkong($rgz).')';

        $zanggan1 = $ycg1.$ycg2.$ycg3;



        $zanggan2 = $mcg1.$mcg2.$mcg3;
        $zanggan3 = $rcg1.$rcg2.$rcg3;
        $zanggan4 = $hcg1.$hcg2.$hcg3;

        $nayin1 = cls_paipan::getNayin($ygz);
        $nayin2 = cls_paipan::getNayin($mgz);
        $nayin3 = cls_paipan::getNayin($rgz);
        $nayin4 = cls_paipan::getNayin($hgz);

        $data_Array = array('taiyuan'=>$taiyuan,'nayintaiyuan'=>$nayintaiyuan,'minggong'=>$minggong,'qysj'=>$qysj,'zysj'=>$zysj,'sub_zysj'=>substr($zysj,3,1),'shishen'=>$shishen,'riyuan'=>$riyuan,'sizhu'=>$sizhu,'jqstr'=>$jqstr,'shishen1'=>$shishen1,'shishen2'=>$shishen2,'shishen3'=>$shishen3,'shishen4'=>$shishen4,'ygz'=>$ygz,'mgz'=>$mgz,'rgz'=>$rgz,'hgz'=>$hgz,'xkrgz'=>cls_paipan::xunkong($rgz),'nayinminggong'=>$nayinminggong,'zanggan1'=>$zanggan1,'zanggan2'=>$zanggan2,'zanggan3'=>$zanggan3,'zanggan4'=>$zanggan4,'nayin1'=>$nayin1,'nayin2'=>$nayin2,'nayin3'=>$nayin3,'nayin4'=>$nayin4,'jqstr'=>$jqstr);
        return $data_Array;
    }


    function whwq_ff($jin,$mu,$shui,$huo,$tu){
        if($jin>=3){
            $wangwh='<strong>金</strong>';
        }elseif($jin==0){
            $quewh='缺<strong>金</strong>';$jins=0;
        }

        if($mu>=3){
            $wangwh='<strong>木</strong>';
        }elseif($mu==0){
            $quewh='缺<strong>木</strong>';$mus=0;
        }
        if($shui>=3){
            $wangwh='<strong>水</strong>';
        }elseif($shui==0){
            $quewh='缺<strong>水</strong>';$shuis=0;
        }
        if($huo>=3){
            $wangwh='<strong>火</strong>';
        }elseif($huo==0){
            $quewh='缺<strong>火</strong>';$huos=0;
        }
        if($tu>=3){
            $wangwh='<strong>土</strong>';
        }elseif($tu==0){
            $quewh='缺<strong>土</strong>';$tus=0;
        }

        $arr['wang'] = $wangwh;
        $arr['que'] = $quewh;
        return $arr;
    }


}