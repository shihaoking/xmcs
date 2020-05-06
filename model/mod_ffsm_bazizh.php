<?php
if (!defined('CORE')) {
	exit('Request Error!');
}

class mod_ffsm_bazizh {

	public static function bazizh($row){

        $row = json_decode(urldecode($row['data']),true);
        $sex = array(0=>'1',1=>'0');

        $cookies = mod_wuhangbazi::get_bzwh($row['username'],$row['username'],$sex[$row['gender']],$row['y'],$row['m'],$row['d'],$row['h'],$row['i'],$row['cY'],$row['cM'],$row['cD'],$row['cH'],$row['term1'],$row['term2'],$row['start_term'],$row['end_term'],$row['start_term1'],$row['end_term1'],$row['lDate']);
        $info = self::public_sm($cookies);

        $xiyongshen = self::xishen($cookies);
        $data['data']['xiyongshen'] = $xiyongshen;
        $data['user'] = $cookies;
        $data['info'] = $info;




        $sxarr = array('鼠','牛','虎','兔','龙','蛇','马','羊','猴','鸡','狗','猪');
        $arrkey = array_search($cookies['sx'],$sxarr);
        $arrkey = $arrkey+48;



        $sqlsx='select * from `ffsm_xz_xg_cy_aq_jk_sy` where sx = "'.$cookies['sx'].'"';
        $sxjj=db::queryone($sqlsx);
        $data['data']['zonghe'] = $sxjj;


        /*
        //四季用神参考
        $ganzhi=new cls_ganzhi();
        $sql='select * from `sm_sjrs` where wh="'.$cookies['wh'][4].'" and sj="'.$ganzhi->siji($cookies["nianling"]["m"]).'"';
        $sjrs=db::queryone($sql);
        $data['data']['sjrs'] = $sjrs;

        //穷通宝鉴
        $sql='select * from `sm_qtbj` where tg="'.$cookies['bazi'][4].'" and dz="'.$cookies['bazi'][3].'"';
        $qtbj=db::queryone($sql);
        $data['data']['qtbj'] = $qtbj;

        //日干心性
        $sql="select * from `sm_rgnm` where rgz='".$cookies['bazi'][4].$cookies['bazi'][5]."'";
        $rgxx=db::queryone($sql);
        $data['data']['rgxx'] = $rgxx;

        //三命通会
        $sql="select * from `sm_smtf` where ri='".$cookies['bazi'][4].$cookies['bazi'][5]."' and shi='".$cookies['bazi'][6].$cookies['bazi'][7]."'";
        $sxth=db::queryone($sql);
        $data['data']['sxth'] = $sxth;

        //月日时命理
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['m']."月'";
        $ml['yml']=db::queryone($sql);
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['d']."日'";
        $ml['rml']=db::queryone($sql);
        $sql="select * from `sm_rysmn` where siceng='".$cookies['jiuli']['h']."时'";
        $ml['sml']=db::queryone($sql);
        $data['data']['ml'] = $ml;
        */

        return $data;
	}



	public function xishen($row){

       
    }


    public function xishensy($xishen){

        if($xishen=='金'){
            $zgao='1、四柱喜金,有利的方位是西方（以父出生地为基准），不利南方，东南；其人喜白色，不利红色，喜居住坐西朝东的房子，床的放置东西向，床头在西。<br><br style=line-height=50%>
2、取名用字五行属金的有利。<br><br style=line-height=50%>
3、四柱喜金，应从事与金有关的事业或职业为宜，如经营五金器材，粗铁材或金属工具材料等方面事业，坚硬事业、决断事业、主动别人性质的事业，一切武术家、鉴定师（评估师）、拍卖人员、法官、执法人员、总主宰、汽车界、交通界、金融界、工程业、科学界、武术家、开矿界、民意代表、珠宝界、伐木事业。<br><br style=line-height=50%>
4、事业发展利西、中西, 不利南、东南。<br><br style=line-height=50%>
5、吉祥数字为: 7 8 <br><br style=line-height=50%>
6、吉利楼层末位数为：4 9<br>';
        }elseif($xishen=='木'){
            $zgao='1、四柱喜木，有利的方位是东方（以父出生地为基准），不利西方，西南；其人喜绿色，不利白色，喜居住坐东朝西的房子，床的放置东西向，床头在东，房间里适宜摆放绿色植物。<br><br style=line-height=50%>
2、取名用字五行属木的有利。<br><br style=line-height=50%>
3、四柱喜木，应从事与木有关的事业或职业为宜，文学、文艺、文具店、文化事业的文人，教育界、书店、出版社、公务界、司法界、治安警界、官途之界、政治界、新创设计、特殊动植物生长界之学者、植物载种试验界。<br><br style=line-height=50%>
木材、木器、木制品、家俱、装璜、纸界、竹界、种植界、花界、树苗界、青果商、草界、药物界（开药房或药剂师）、医疗界。<br><br style=line-height=50%>
培育人才界、布匹买卖界、售敬神物品或香料界、宗教应用物界、宗教家之事业、或售卖植物性之素食品，以上均属木之事业。<br><br style=line-height=50%>
4、事业发展利东、东北，不利西、西南。<br><br style=line-height=50%>
5、吉祥数字为: 1 2 <br><br style=line-height=50%>
6、吉利楼层末位数为：3 8<br>';
        }elseif($xishen=='水'){
            $zgao='1、四柱喜水，有利的方位是北方（以父出生地为基准），不利南方，中南；其人喜黑色，不利黄色，喜居住坐北朝南的房子，床的放置南北向，床头在北。<br><br style=line-height=50%>
2、取名用字五行属水的有利。<br><br style=line-height=50%>
3、四柱喜水, 应从事与水有关的事业或职业为宜, 如外勤职务, 奔波流动性事业, 制冰, 冷藏, 行海, 旅游, 运动家, 记者, 旅社等。 事业发展利北、西北, 不利中南。<br><br style=line-height=50%>
4、吉祥数字为: 0 9 <br><br style=line-height=50%>
5、吉利楼层末位数为：1 6 <br>';
        }elseif($xishen=='火'){
            $zgao='1、四柱喜火，有利的方位是南方（以父出生地为基准），不利北方，西北；其人喜红色，不利黑色，喜居住坐南朝北的房子，床的放置南北向，床头在南。<br><br style=line-height=50%>
2、取名用字五行属火的有利。<br><br style=line-height=50%>
3、四柱喜火，应从事与火有关的事业或职业为宜，热度性质、火爆性质、光线性质、加工修理性质、做工性质、易燃性质、手工艺性质、一切人身装饰物性质，均属之。<br><br style=line-height=50%>
放光、照光、照明、光学、高热、液热、易燃烧物。或油类界、酒类界、热饮食界、食品界、手工艺口、机械加工品。工厂、制造厂、衣帽行、理发馆、化学界、油漆橡胶、一切人生装饰物品。<br><br style=line-height=50%>
军界、歌舞艺术（以人对人之事业）、百货行、印刷业、雕刻师、评论家、心理学家、演说家均属之。<br><br style=line-height=50%>
4、事业发展利南、东南，不利北、西北。<br><br style=line-height=50%>
5、吉祥数字为:  3 4 <br><br style=line-height=50%>
6、吉利楼层末位数为：2 7<br>';
        }elseif($xishen=='土'){
            $zgao='1、四柱喜土，有利的方位是本地、南方（以父出生地为基准），不利北方，东北；其人喜红色，黄色，不利绿色，黑色，喜居住坐南朝北的房子，床的放置南北向，床头在南。<br><br style=line-height=50%>
2、取名用字五行属土的有利。<br><br style=line-height=50%>
3、四柱喜土，应从事与土有关的事业或职业为宜，土产或地产性质、农作性质、畜牧性质、大自然原物性质、中间人性质，又因土最卑下，最中央，故领导性质、人才事业、防水事业均属之。<br><br style=line-height=50%>
农人或土壤研究者、售现成菜业、售现成农作物（杂谷、米、麦等），畜牧兽类（如物牛羊或养鸡猪……等），售饲料界、所有农畜界百业。大自然原物售卖界{即石、石灰、土地（包括山地、水泥……等）}。建筑界、房地产买卖业、房屋买卖业。土是克水之物，故而防水事业（即雨衣、雨伞、雨帆、筑堤防……窖水物器……等）也是。<br><br style=line-height=50%>
当铺、古董家、鉴定师、所有中介、介绍业，及代书、律师、说客、法官、代理、管理。代替、买卖、设计、顾问、秘书、附属品、附属人均是（而土附火而生）。<br><br style=line-height=50%>
又领导事业（即高级官或职），及使人讨厌的事业（如殡葬等），又零碎整理事业：如书记、簿记、记录员、会计师也属之。<br><br style=line-height=50%>
4、事业发展利中南，不利东北。<br><br style=line-height=50%>
5、吉祥数字为: 5 6 <br><br style=line-height=50%>
6、吉利楼层末位数为：0 5 <br>';
        }

        return $zgao;

    }


    public function sanhe($sx){
        if($sx=='鼠'){
            $sanhe=array('鼠','猴','龙');
            $sanhetu=array('shu','hou','long');
        }elseif($sx=='牛'){
            $sanhe=array('牛','蛇','鸡');
            $sanhetu=array('niu','she','ji');
        }elseif($sx=='虎'){
            $sanhe=array('虎','马','狗');
            $sanhetu=array('hu','ma','gou');
        }elseif($sx=='猪'){
            $sanhe=array('猪','兔','羊');
            $sanhetu=array('猪','tu','yang');
        }elseif($sx=='兔'){
            $sanhe=array('兔','猪','羊');
            $sanhetu=array('tu','zhu','yang');
        }elseif($sx=='狗'){
            $sanhe=array('狗','虎','马');
            $sanhetu=array('gou','hu','ma');
        }elseif($sx=='龙'){
            $sanhe=array('龙','猴','鼠');
            $sanhetu=array('long','hou','shu');
        }elseif($sx=='鸡'){
            $sanhe=array('鸡','蛇','牛');
            $sanhetu=array('ji','she','niu');
        }elseif($sx=='蛇'){
            $sanhe=array('蛇','鸡','牛');
            $sanhetu=array('she','ji','niu');
        }elseif($sx=='猴'){
            $sanhe=array('猴','鼠','龙');
            $sanhetu=array('hou','shu','long');
        }elseif($sx=='马'){
            $sanhe=array('马','狗','虎');
            $sanhetu=array('ma','gou','hu');
        }elseif($sx=='羊'){
            $sanhe=array('羊','猪','兔');
            $sanhetu=array('yang','zhu','tu');
        }
        $data['sanhe'] = $sanhe;
        $data['sanhetu'] = $sanhetu;
        return $data;

    }

    /***
     * 获取生肖每月运势
     */
	public function yuefen($sx){
        $oinfo = db::querylist("select * from `ffsm_xz_m` where sx='".$sx."'");
        return $oinfo;

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

        $jd1=120;//经度度
        $jd2=0;//经度分



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

        $data_Array = array('taiyuan'=>$taiyuan,'nayintaiyuan'=>$nayintaiyuan,'minggong'=>$minggong,'zysj'=>$zysj,'sub_zysj'=>substr($zysj,3,1),'shishen'=>$shishen,'riyuan'=>$riyuan,'sizhu'=>$sizhu,'jqstr'=>$jqstr,'shishen1'=>$shishen1,'shishen2'=>$shishen2,'shishen3'=>$shishen3,'shishen4'=>$shishen4,'ygz'=>$ygz,'mgz'=>$mgz,'rgz'=>$rgz,'hgz'=>$hgz,'xkrgz'=>cls_paipan::xunkong($rgz),'nayinminggong'=>$nayinminggong,'zanggan1'=>$zanggan1,'zanggan2'=>$zanggan2,'zanggan3'=>$zanggan3,'zanggan4'=>$zanggan4,'nayin1'=>$nayin1,'nayin2'=>$nayin2,'nayin3'=>$nayin3,'nayin4'=>$nayin4,'jqstr'=>$jqstr);
        return $data_Array;
    }


    function whwq_ff($jin,$mu,$shui,$huo,$tu){
        if($jin>=3){
            $wangwh='<strong>金</strong>';
            $wangwhs = '金';
        }elseif($jin==0){
            $quewh='缺<strong>金</strong>';$jins=0;
        }

        if($mu>=3){
            $wangwh='<strong>木</strong>';
            $wangwhs = '木';
        }elseif($mu==0){
            $quewh='缺<strong>木</strong>';$mus=0;
        }
        if($shui>=3){
            $wangwh='<strong>水</strong>';
            $wangwhs = '水';
        }elseif($shui==0){
            $quewh='缺<strong>水</strong>';$shuis=0;
        }
        if($huo>=3){
            $wangwh='<strong>火</strong>';
            $wangwhs = '火';
        }elseif($huo==0){
            $quewh='缺<strong>火</strong>';$huos=0;
        }
        if($tu>=3){
            $wangwh='<strong>土</strong>';
            $wangwhs = '土';
        }elseif($tu==0){
            $quewh='缺<strong>土</strong>';$tus=0;
        }

        $arr['wang'] = $wangwh;
        $arr['que'] = $quewh;


        $sql='select * from `ffsm_whjk` where wh="'.$wangwhs.'"';
        $whjk=db::queryone($sql);
        $arr['whjk'] = $whjk;

        return $arr;
    }



}