<?php
if (!defined('CORE')) {
	exit('Request Error!');
}

class mod_ffsm {

    public static function test($row){
        return $row;
    }



    public static function xmfx($row){

        $data = (json_decode(urldecode($row['data']),true));
        $return = array();



        $name1=$data['malexing'].$data['malename'];
        $name2=$data['femalexing'].$data['femalename'];
        $xing1=1;$xing2=1;$sex1='男';$sex2='女';
        ////
        $tiange=0;$dige=0;$renge1=0;$renge2=0;$renge=0;$bihua1=0;$bihua2=0;$nming2="";$nxing2="";
        $nxing1=substr($data['malexing'],0,3);
        $bihua1=mod_xingming::getnumft($nxing1);

        $nan_xing_2 = substr($data['malexing'],3,3);
        $nv_xing_2 = substr($data['femalexing'],3,3);

        $x1arr = array('nxing1'=>$nxing1,'bihua1'=>$bihua1,'n1py'=>mod_xingming::Pinyin_sm($nxing1,1),'n1gb'=>mod_xingming::gb_big5($nxing1),'n1wh'=>mod_xingming::getzywh($nxing1));


        $return['x1arr'] = $x1arr;



        $tiange1=$bihua1+1;
        $renge1=$bihua1;
        $bihua3=0;
        $bihua4=0;

        $return['x2arr'] = '';
        if ($nan_xing_2<>""){
            $nxing2= $nan_xing_2;
            $bihua2=mod_xingming::getnumft($nxing2);
            $tiange1=$bihua1+$bihua2;
            $renge1=$bihua2;
            $nming1=substr($name1,6,3);
            $bihua3=mod_xingming::getnumft($nming1);
            $dige1=$bihua3+1;
            $renge2=$bihua3;
            if (substr($name1,9,3) <> ""){
                $nming2= substr($name1,9,3);
                $bihua4=mod_xingming::getnumft($nming2);
                $dige1=$bihua3+$bihua4;
            }

            $x2arr = array('nxing2'=>$nxing2,'bihua2'=>$bihua2,'n2py'=>mod_xingming::Pinyin_sm($nxing2,1),'n2gb'=>mod_xingming::gb_big5($nxing2),'n2wh'=>mod_xingming::getzywh($nxing2));
            $return['x2arr'] = $x2arr;

        }else{
            $nming1=substr($data['malename'],0,3);
            $bihua3=mod_xingming::getnumft($nming1);
            $dige1=$bihua3+1;
            $renge2=$bihua3;
            if (substr($data['malename'],3,3) <> ""){
                $nming2=substr($data['malename'],3,3);
                $bihua4=mod_xingming::getnumft($nming2);
                $dige1=$bihua3+$bihua4;
            }
        }

        $m1arr = array('nming1'=>$nming1,'bihua3'=>$bihua3,'m1py'=>mod_xingming::Pinyin_sm($nming1,1),'m1gb'=>mod_xingming::gb_big5($nming1),'m1wh'=>mod_xingming::getzywh($nming1));
        $return['m1arr'] = $m1arr;

        $m2arr = array('nming2'=>$nming2,'bihua4'=>$bihua4,'m2py'=>mod_xingming::Pinyin_sm($nming2,1),'m2gb'=>mod_xingming::gb_big5($nming2),'m2wh'=>mod_xingming::getzywh($nming2));
        $return['m2arr'] = $m2arr;

        $zhongge1=$bihua1+$bihua2+$bihua3+$bihua4;
        $renge1+=$renge2;
        $waige1=$zhongge1-$renge1;
        if ($nxing2 == ""){
            $waige1++;
        }
        if ($nming2 =="" ){
            $waige1++;
        }

        //天格地格人格
        $sql="select * from `sm_81` where num=".$tiange1;
        $arr=db::queryone($sql);
        $tgjx1=$arr['jx'];
        $tgf1=mod_xingming::getpf_133($tgjx1);


        $sql="select * from `sm_81` where num=".$renge1;
        $arr=db::queryone($sql);
        $rgjx1=$arr['jx'];
        $rgf1=mod_xingming::getpf_133($rgjx1);

        $sql="select * from `sm_81` where num=".$dige1;
        $arr=db::queryone($sql);
        $dgjx1=$arr['jx'];
        $dgf1=mod_xingming::getpf_133($dgjx1);

        //总格

        $sql="select * from `sm_81` where num=".$waige1;
        $arr=db::queryone($sql);
        $wgjx1=$arr['jx'];
        $wgf1=mod_xingming::getpf_133($wgjx1);

        $sql="select * from `sm_81` where num=".$zhongge1;
        $arr=db::queryone($sql);
        $zgjx1=$arr['jx'];
        $zgf1=mod_xingming::getpf_133($zgjx1);

        $sancai1=mod_xingming::getsancai_133($tiange1).mod_xingming::getsancai_133($renge1).mod_xingming::getsancai_133($dige1);
        $sql="select * from `sm_sancai` where title='".$sancai1."'";
        $arr=db::queryone($sql);
        $xg1=$arr['xg'];

        $tian_sancai = mod_xingming::getsancai($tiange1);
        $ren_sancai = mod_xingming::getsancai($renge1);
        $di_sancai = mod_xingming::getsancai($dige1);
        $sancai=$tian_sancai.$ren_sancai.$di_sancai;
        $sqlsancai="select * from `sm_sancai` where `title`='".$sancai."'";
        $rssancai=db::queryone($sqlsancai);
        $rssancai['sancai'] = $sancai;


        $tdrh_ge_arr = array('tiange1'=>$tiange1,'tgsancai'=>mod_xingming::getsancai($tiange1),'renge1'=>$renge1,'yuanshen'=>self::get_yuanshen($renge1),'renge1_sancai133'=>mod_xingming::getsancai_133($renge1),'dige1'=>$dige1,'dige1_sancai133'=>mod_xingming::getsancai_133($dige1),'waige1'=>$waige1,'waige1_sancai133'=>mod_xingming::getsancai_133($waige1),'zhongge1'=>$zhongge1,'zhongge1_sancai133'=>mod_xingming::getsancai_133($zhongge1),'sancai'=>$rssancai);

        $return['tdrh_ge_arr'] = $tdrh_ge_arr;

        $one_arr = array('name1'=>$name1,'sex1'=>$sex1,'xg1'=>$xg1);

        $return['one_arr'] = $one_arr;

        //one-end

        //two--go

        $ntiange=0;$ndige=0;$nrenge1=0;$nrenge2=0;$nrenge=0;$nbihua1=0;$nbihua2=0;$n2xing2="";$n2ming2="";
        $n2xing1=substr($name2,0,3);
        $nbihua1=mod_xingming::getnumft($n2xing1);

        $ntiange1=$nbihua1+1;
        $nrenge1=$nbihua1;
        $nbihua3=0;
        $nbihua4=0;
        $return['n2x2arr'] = '';
        if($nv_xing_2<>""){
            $n2xing2=$nv_xing_2;
            $nbihua2=mod_xingming::getnumft($n2xing2);
            $ntiange1=$nbihua1+$nbihua2;
            $nrenge1=$nbihua2;
            $n2ming1=substr($name2,6,3);
            $nbihua3=mod_xingming::getnumft($n2ming1);
            $ndige1=$nbihua3+1;
            $nrenge2=$nbihua3;
            if(substr($name2,9,3) <> ""){
                $n2ming2 =substr($name2,9,3);
                $nbihua4=mod_xingming::getnumft($n2ming2);
                $ndige1=$nbihua3+$nbihua4;
            }
            $n2x2arr = array('n2xing2'=>$n2xing2,'nbihua2'=>$nbihua2,'n2x2py'=>mod_xingming::Pinyin_sm($n2xing2,1),'n2x2gb'=>mod_xingming::gb_big5($n2xing2),'n2x2wh'=>mod_xingming::getzywh($n2xing2));
            $return['n2x2arr'] = $n2x2arr;
        }else{
            $n2ming1=substr($name2,3,3);
            $nbihua3=mod_xingming::getnumft($n2ming1);
            $ndige1=$nbihua3+1;
            $ndigee1=$nbihua3+1;
            $nrenge2=$nbihua3;
            $nrengee2=$nbihua3;
            if (substr($name2,6,3) <> ""){
                $n2ming2 =substr($name2,6,3);
                $nbihua4=mod_xingming::getnumft($n2ming2);
                $ndige1=$nbihua3+$nbihua4;
            }
        }

        $nzhongge1=$nbihua1+$nbihua2+$nbihua3+$nbihua4;
        $nrenge1=$nrenge1+$nrenge2;
        $nwaige1=$nzhongge1-$nrenge1;
        if($n2xing2 == ""){
            $nwaige1++;
        }
        if($n2ming2 == ""){
            $nwaige1++;
        }

        //two 天个人各地各
        $sql="select * from `sm_81` where num=".$ntiange1;
        $arr=db::queryone($sql);
        $tgjx=$arr['jx'];
        $tgf2=mod_xingming::getpf_133($tgjx);

        $sql="select * from `sm_81` where num=".$nrenge1;
        $arr=db::queryone($sql);
        $rgjx=$arr['jx'];
        $rgf2=mod_xingming::getpf_133($rgjx);

        $sql="select * from `sm_81` where num=".$ndige1;
        $arr=db::queryone($sql);
        $dgjx=$arr['jx'];
        $dgf2=mod_xingming::getpf_133($dgjx);

        $sql="select * from `sm_81` where num=".$nwaige1;
        $arr=db::queryone($sql);
        $wgjx=$arr['jx'];
        $wgf2=mod_xingming::getpf_133($wgjx);


        $sql="select * from `sm_81` where num=".$nzhongge1;
        $arr=db::queryone($sql);
        $zgjx=$arr['jx'];
        $zgf2=mod_xingming::getpf_133($zgjx);
        $nsancai1=mod_xingming::getsancai_133($ntiange1).mod_xingming::getsancai_133($nrenge1).mod_xingming::getsancai_133($ndige1);
        $sql="select * from `sm_sancai` where title='".$nsancai1."'";
        $arrxx=db::queryone($sql);
        $xg1xx=$arrxx['xg'];

        //配对分数
        $n1=abs($rgf1-$rgf2);
        $n2=abs($dgf1-$dgf2);
        $n3=abs($zgf1-$zgf2);
        $n4=abs($tgf1-$tgf2);
        $n5=abs($wgf1-$wgf2);
        $zf=($n1+$n2+$n3)+($n4+$n5)/5;
        $zf=round(100-$zf);



        ////

        $n2x1arr = array('n2xing1'=>$n2xing1,'nbihua1'=>$nbihua1,'n2x1py'=>mod_xingming::Pinyin_sm($n2xing1,1),'n2x1gb'=>mod_xingming::gb_big5($n2xing1),'n2x1wh'=>mod_xingming::getzywh($n2xing1));

        $return['n2x1arr'] = $n2x1arr;

        $n2m1arr = array('n2ming1'=>$n2ming1,'nbihua3'=>$nbihua3,'n2m1py'=>mod_xingming::Pinyin_sm($n2ming1,1),'n2m1gb'=>mod_xingming::gb_big5($n2ming1),'n2m1wh'=>mod_xingming::getzywh($n2ming1));

        $return['n2m1arr'] = $n2m1arr;

        $n2m2arr = array('n2ming2'=>$n2ming2,'nbihua4'=>$nbihua4,'n2m2py'=>mod_xingming::Pinyin_sm($n2ming2,1),'n2m2gb'=>mod_xingming::gb_big5($n2ming2),'n2m2wh'=>mod_xingming::getzywh($n2ming2));

        $return['n2m2arr'] = $n2m2arr;


        $tian_sancai = mod_xingming::getsancai($ntiange1);
        $ren_sancai = mod_xingming::getsancai($nrenge1);
        $di_sancai = mod_xingming::getsancai($ndige1);
        $sancai=$tian_sancai.$ren_sancai.$di_sancai;
        $sqlsancai="select * from `sm_sancai` where `title`='".$sancai."'";
        $rssancai=db::queryone($sqlsancai);
        $rssancai['sancai'] = $sancai;

        $tdrh2_ge_arr = array('ntiange1'=>$ntiange1,'tg2sancai'=>mod_xingming::getsancai($ntiange1),'nrenge1'=>$nrenge1,'yuanshen'=>self::get_yuanshen($nrenge1),'nrenge1_sancai133'=>mod_xingming::getsancai_133($nrenge1),'ndige1'=>$ndige1,'ndige1_sancai133'=>mod_xingming::getsancai_133($ndige1),'nwaige1'=>$nwaige1,'nwaige1_sancai133'=>mod_xingming::getsancai_133($nwaige1),'nzhongge1'=>$nzhongge1,'nzhongge1_sancai133'=>mod_xingming::getsancai_133($nzhongge1),'sancai'=>$rssancai);

        $return['tdrh2_ge_arr'] = $tdrh2_ge_arr;

        $two_arr = array('name2'=>$name2,'sex2'=>$sex2,'xg1xx'=>$xg1xx,'zf'=>$zf);
        $return['two_arr'] = $two_arr;

        $gua = $return['tdrh_ge_arr']['waige1']+$return['tdrh_ge_arr']['zhongge1']+$return['tdrh2_ge_arr']['nwaige1']+$return['tdrh2_ge_arr']['nzhongge1'];

        $guas = $gua%64;

        $sql="select * from `ffsm_xmpd_gua` where gua=".$guas;
        $arr=db::queryone($sql);

        $return['gua'] = $arr;

        return $return;
    }


    private function get_64gua(){


    }

    /***
     * 获取元神
     */
    private function get_yuanshen($renge){
        $renge=$renge%10;
        if($renge==1){
            $data['msg'] = '志氣高大，仁慈喜助人，不過稍嫌一板一眼、愛做作。';
            $data['yuanshen'] = '參天「甲木」';
            $data['wh'] = '木';
            $data['wh_'] = 'mu';
        }elseif($renge==2){
            $data['msg'] = '思緒敏捷，環境適應力強，但常沒安全感，潛意識喜歡找靠山。';
            $data['yuanshen'] = '柔韌「乙芽」';
            $data['wh'] = '木';
            $data['wh_'] = 'mu';
        }elseif($renge==3){
            $data['msg'] = '本人光明磊落，自信豪爽，可是性情急燥，做事衝動。';
            $data['yuanshen'] = '陽光「丙火」';
            $data['wh'] = '火';
            $data['wh_'] = 'huo';
        }elseif($renge==4){
            $data['msg'] = '當事人心思細密，深具耐心，不過做事常考慮太多，決斷力不足。';
            $data['yuanshen'] = '長明「丁星」';
            $data['wh'] = '火';
            $data['wh_'] = 'huo';
        }elseif($renge==5){
            $data['msg'] = '誠實可靠，穩重有信用，不過稍嫌頑固不化，變通力差。';
            $data['yuanshen'] = '厚重「戊山」';
            $data['wh'] = '土';
            $data['wh_'] = 'tu';
        }elseif($renge==6){
            $data['msg'] = '處事精明，身段柔軟，但經常堅持力不夠，遇難易退縮。';
            $data['yuanshen'] = '可塑「己泥」';
            $data['wh'] = '土';
            $data['wh_'] = 'tu';
        }elseif($renge==7){
            $data['msg'] = '性剛強重義氣，做事效率高，但嫌待人處事細膩感不足，欠缺謀略。';
            $data['yuanshen'] = '堅強「庚金」';
            $data['wh'] = '金';
            $data['wh_'] = 'jin';
        }elseif($renge==8){
            $data['msg'] = '其人清秀，才華高超，可是魄力不足且行動力不夠。';
            $data['yuanshen'] = '晶瑩「辛鑽」';
            $data['wh'] = '金';
            $data['wh_'] = 'jin';
        }elseif($renge==9){
            $data['msg'] = '其性樂觀豪邁不拘小節且熱情奔放，但有時衝動莽撞，容易情緒化。';
            $data['yuanshen'] = '濤濤「壬海」」';
            $data['wh'] = '水';
            $data['wh_'] = 'shui';
        }elseif($renge==0){
            $data['msg'] = '本人聰慧，足智多謀，缺點則不切實際，愛鑽牛角尖。';
            $data['yuanshen'] = '清澈「癸水';
            $data['wh'] = '水';
            $data['wh_'] = 'shui';
        }
        return $data;
    }


}