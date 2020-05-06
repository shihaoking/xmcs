<?php
if (!defined('CORE')) {
    exit('Request Error!');
}

class mod_ffsm_ziwei {

    /***
     *紫薇排盘
     */

    public function ziwei($row){

        $name = $row['username'];
        $sex=$row['gender'];
        $DateType=1;
        $y=$row['y'];
        $m=$row['m'];
        $d=$row['d'];
        $h=$row['h'];
        $hIndex=ceil($h/2)%12;

        $runyue=0;//阴历闰月
        $runfen=1;//闰月分界



        $segong=array("兄弟宫","夫妻宫","子女宫","财帛宫","疾厄宫","迁移宫","奴仆宫","官禄宫","田宅宫","福德宫","父母宫");
        $boshi=array("博士","力士","青龙","小耗","将军","奏书","飞廉","喜神","病符","大耗","伏兵","官府");
        $changsheng=array("长生","沐浴","冠带","临官","帝旺","衰","病","死","墓","绝","胎","养");
        $liunianxing=array("岁建","晦气","丧门","贯索","官符","小耗","大耗","龙德","白虎","天德","吊客","病符");
        $liunianxing2=array("将星","攀鞍","岁驿","息神","华盖","劫煞","灾煞","天煞","指背","咸池","月煞","亡神");
        $mpx=array(
            0=>array("紫微","平","庙","庙","旺","陷","旺","庙","庙","旺","平","闲","旺"),
            1=>array("天机","庙","陷","旺","旺","庙","平","庙","陷","平","旺","庙","平"),
            2=>array("太阳","陷","陷","旺","庙","旺","旺","庙","平","闲","闲","陷","陷"),
            3=>array("武曲","旺","庙","闲","陷","庙","平","旺","庙","平","旺","庙","平"),
            4=>array("天同","旺","陷","闲","庙","平","庙","陷","陷","旺","平","平","庙"),
            5=>array("廉贞","平","旺","庙","闲","旺","陷","平","庙","庙","平","旺","陷"),
            6=>array("天府","庙","庙","庙","平","庙","平","旺","庙","平","陷","庙","旺"),
            7=>array("太阴","庙","庙","闲","陷","闲","陷","陷","平","平","旺","旺","庙"),
            8=>array("贪狼","旺","庙","平","地","庙","陷","旺","庙","平","平","庙","陷"),
            9=>array("巨门","旺","旺","庙","庙","平","平","旺","陷","庙","庙","旺","旺"),
            10=>array("天相","庙","庙","庙","陷","旺","平","旺","闲","庙","陷","闲","平"),
            11=>array("天粱","庙","旺","庙","庙","旺","陷","庙","旺","陷","地","旺","陷"),
            12=>array("七杀","旺","庙","庙","陷","旺","平","旺","旺","庙","闲","庙","平"),
            13=>array("破军","庙","旺","陷","旺","旺","闲","庙","庙","陷","陷","旺","平"),
            14=>array("天魁","旺","旺",NULL,"庙",NULL,NULL,"庙",NULL,NULL,NULL,NULL,"旺"),
            15=>array("天钺",NULL,NULL,"旺",NULL,NULL,"旺",NULL,"旺","庙","庙",NULL,NULL),
            16=>array("左辅","旺","庙","庙","陷","庙","平","旺","庙","平","陷","庙","闲"),
            17=>array("右弼","庙","庙","旺","陷","庙","平","旺","庙","闲","陷","庙","平"),
            18=>array("文昌","旺","庙","陷","平","旺","庙","陷","平","旺","庙","陷","旺"),
            19=>array("文曲","庙","庙","平","旺","庙","庙","陷","旺","平","庙","陷","旺"),
            20=>array("禄存","旺",NULL,"庙","旺",NULL,"庙","旺",NULL,"庙","旺",NULL,"庙"),
            21=>array("天马",NULL,NULL,"旺",NULL,NULL,"平",NULL,NULL,"旺",NULL,NULL,"平"),
            22=>array("擎羊","陷","庙",NULL,"陷","庙",NULL,"平","庙",NULL,"陷","庙",NULL),
            23=>array("铃星","陷","陷","庙","庙","旺","旺","庙","旺","旺","陷","庙","庙"),
            24=>array("陀罗",NULL,"庙","陷",NULL,"庙","陷",NULL,"庙","陷",NULL,"庙","陷"),
            25=>array("火星","平","旺","庙","平","闲","旺","庙","闲","陷","陷","庙","平"));

        $tg=array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
        $dz=array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
        $mmonth=array(NULL,"正","二","三","四","五","六","七","八","九","十","十一","十二");
        $mday=array(NULL,"初一","初二","初三","初四","初五","初六","初七","初八","初九","初十","十一","十二","十三","十四","十五","十六","十七","十八","十九","二十","廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十");


        if($DateType==0 ){//农历转新历
            $NongLi=$y."年".$mmonth[$m]."月".$mday[$d].$dz[$hIndex]."时";
            $ytg=$tg[($y-1914)%10];
            $ydz=($y-1912)%12;
            if($runyue==1){
                $nm=$m+1;
                $NongLi=$y."年闰".$mmonth[$m]."月".$mday[$d].$dz[$hIndex]."时";
                if($runfen==1){
                    $m++;
                }else{
                    if($d>15)$m++;
                }
            }else{
                $ifrunyue=cls_nongli::getLeapMonth($y);
                if($ifrunyue>0&&$ifrunyue<$m){
                    $nm=$m+1;
                }else{
                    $nm=$m;
                }
            }

            $yangliarr=cls_nongli::convertLunarToSolar($y,$nm,$d);
            $yy=(int)$yangliarr[0];
            $ym=(int)$yangliarr[1];
            $yd=(int)$yangliarr[2];
            $minues=0;
            $yangdate=$yy."年".$ym."月".$yd."日".$h."时";
            $gz=cls_paipan_function::getSizhu($yy,$ym,$yd,$h,'0');
        }else{
            $gz=cls_paipan_function::getSizhu($y,$m,$d,$h,'0');
            $yangdate=$y."年".$m."月".$d."日".$h."时";
            $ntime=cls_paipan_function::getNongli($y,$m,$d,$h);
            $cyue=$ntime[1];
            $cyear=$ntime[0];
            $cri=$ntime[2];
            if(substr($cyue,0,2)=="闰"){
                $cyuem=substr($cyue,-(strlen($cyue)-2));
            }else{
                $cyuem=$cyue;
            }
            $m=array_search($cyuem,$mmonth);
            $d=array_search($cri,$mday);
            if(substr($cyue,0,3)=="闰"&&$runfen==1) $m++;
            if(substr($cyue,0,3)=="闰"&&$runfen==0&&$d>15) $m++;
            $NongLi=$ntime[0].$ntime[5]."年".$ntime[1]."月".$ntime[2].$ntime[3]."时";
            $ytg=substr($ntime[0],0,3);
            $ydz=substr($ntime[0],3,3);
            $ydz=array_search($ydz,$dz);
        }

        $ygz=$gz[0].$gz[1];
        $mgz=$gz[2].$gz[3];
        $dgz=$gz[4].$gz[5];
        $tgz=$gz[6].$gz[7];

        if(($sex==0 &&(cls_qmdj::Tgorder($ytg)%2)==1) || ($sex==1 &&(cls_qmdj::Tgorder($ytg)% 2)==0)){
            $orders=1;
        }else{
            $orders=0;
        }//阳男阴女顺俳，阴男阳女逆俳
        //'给12宫配上天干和年上起月法相同

        $tm=array_search($ytg,$tg);
        if($tm<0 ) $tm+=10;
        for($i=0;$i<=11;$i++){
            if( $i > 1 && $i <= 11)
            {
                $TgIndex = ($tm * 2 + $i + 10) % 10;
            }else{
                $TgIndex = ($tm * 2 + $i+2) % 10;
            }
            $dptg[$i]=$tg[$TgIndex];
        }
        //'命宫和身宫，
        $minggindex=($m+1-$hIndex+12)% 12;
        $Shengindex=($m+1+$hIndex+12)% 12;
        for($i=0;$i<=11;$i++){
            $shengong[$i]="&nbsp&nbsp";
        }
        $minggong[$minggindex]="命宫";//"命宫"
        $shengong[$Shengindex]="";//"(身宫)"
        //排12宫，以命宫为基准逆排剩下11宫
        for($i=1;$i<=11;$i++)
        {
            $mgindex=($minggindex-$i+12)% 12;
            $minggong[$mgindex]=$segong[$i-1];
        }
        //'五行局和五行纳音
        //$wxIndex=($minggindex+2)%12;
        $wxgz=$dptg[$minggindex].$dz[$minggindex];
        $wxNayin=cls_paipan::getNayin($wxgz);
        $jumingz=substr(trim($wxNayin),-2);
        $arrzwgong=array(
            0=>array("水","丑","寅","寅","卯","卯","辰","辰","巳","巳","午","午","未","未","申","申","酉","酉","戌","戌","亥","亥","子","子","丑","丑","寅","寅","卯","卯","辰","水二局",2),
            1=>array("木","辰","丑","寅","巳","寅","卯","午","卯","辰","未","辰","巳","申","巳","午","酉","午","未","戌","未","申","亥","申","酉","子","酉","戌","丑","戌","亥","木三局",3),
            2=>array("金","亥","辰","丑","寅","子","巳","寅","卯","丑","午","卯","辰","寅","未","辰","巳","卯","申","巳","午","辰","酉","午","未","巳","戌","未","申","午","亥","金四局",4),
            3=>array("土","午","亥","辰","丑","寅","未","子","巳","寅","卯","申","丑","午","卯","辰","酉","寅","未","辰","巳","戌","卯","申","巳","午","亥","辰","酉","午","未","土五局",5),
            4=>array("火","酉","午","亥","辰","丑","寅","戌","未","子","巳","寅","卯","亥","申","丑","午","卯","辰","子","酉","寅","未","辰","巳","丑","戌","卯","申","巳","午","火六局",6));
        for($i=0;$i<=4;$i++){
            if($arrzwgong[$i][0]==$jumingz){
                $wxju=$arrzwgong[$i][31];
                $juxu=$arrzwgong[$i][32];
                $zw=$arrzwgong[$i][$d];
                $jindex=array_search($zw,$dz);
                break;
            }
        }
        $tianjiindex=($jindex+11)% 12;
        $taiyangindex=($jindex+9)% 12;
        $wuquindex=($jindex+8)%12;
        $tiantongindex=($jindex+7)% 12;
        $lianzhenindex=($jindex+4)% 12;
        $TfIndex=(16-$jindex)% 12;
        $taiyinindex=($TfIndex+1)% 12;
        $tanlangindex=($TfIndex+2)% 12;
        $jumenindex=($TfIndex+3)% 12;
        $tianxiangindex=($TfIndex+4)% 12;
        $tianliangindex=($TfIndex+5)% 12;
        $pojunindex=($TfIndex+10)% 12;
        $wencindex=(12-$hIndex+10)% 12;
        $wenqindex=($hIndex+4)% 12;
        $zwxing[$jindex]="<li><font >紫薇</font></li>";
        $zwxing[$tianjiindex]="<li><font >天机</font></li>";
        $zwxing[$taiyangindex]="<li><font >太阳</font></li>";
        $zwxing[$wuquindex]="<li><font >武曲</font></li>";
        $zwxing[$tiantongindex]="<li><font >天同</font></li>";
        $zwxing[$lianzhenindex]="<li><font >廉贞</font></li>";
        $tfxing[$TfIndex]="<li><font >天府</font></li>";
        $tfxing[$taiyinindex]="<li><font >太阴</font></li>";
        $tfxing[$tanlangindex]="<li><font >贪狼</font></li>";
        $tfxing[$jumenindex]="<li><font >巨门</font></li>";
        $tfxing[$tianxiangindex]="<li><font >天相</font></li>";
        $tfxing[$tianliangindex]="<li><font >天梁</font></li>";
        $tfxing[($TfIndex+6)% 12]="<li><font >七杀</font></li>";
        $tfxing[$pojunindex]="<li><font >破军</font></li>";
        $wenchang[$wencindex]="<li><font >文昌</font></li>";
        $wenchang[$wenqindex]="<li><font >文曲</font></li>";
        switch($ytg)
        {
            case "乙":  $zwxing[$jindex]="<li><font >紫薇科</font></li>";
                $zwxing[$tianjiindex]="<li><font >天机禄</font></li>";
                $tfxing[$tianliangindex]="<li><font >天梁权</font></li>";
                $tfxing[$taiyinindex]="<li><font >太阴忌</font></li>";
                break;
            case "壬":  $tfxing[$tianliangindex]="<li><font >天梁禄</font></li>";
                $zwxing[$jindex]="<li><font >紫薇权</font></li>";
                $zwxing[$wuquindex] ="<li><font >武曲忌</font></li>";
                break;
            case "丙": $zwxing[$tianjiindex]="<li><font >天机权</font></li>";
                $zwxing[$tiantongindex]="<li><font >天同禄</font></li>";
                $zwxing[$lianzhenindex]="<li><font >廉贞忌</font></li>";
                $wenchang[$wencindex]="<li><font >文昌科</font></li>";
                break;
            case "丁": $zwxing[$tianjiindex]="<li><font >天机科</font></li>";
                $zwxing[$tiantongindex]="<li><font >天同权</font></li>";
                $tfxing[$taiyinindex]="<li><font >太阴禄</font></li>";
                $tfxing[$jumenindex]="<li><font >巨门忌</font></li>";
                break;
            case "戊": $zwxing[$tianjiindex]="<li><font >天机忌</font></li>";
                $tfxing[$taiyinindex]="<li><font >太阴权</font></li>";
                $tfxing[$tanlangindex]= "<li><font >贪狼禄</font></li>";
                break;
            case "甲": $zwxing[$taiyangindex]="<li><font >太阳忌</font></li>";
                $zwxing[$wuquindex] ="<li><font >武曲科</font></li>";
                $zwxing[$lianzhenindex]="<li><font >廉贞禄</font></li>";
                $tfxing[$pojunindex]="<li><font >破军权</font></li>";
                break;
            case "庚": $zwxing[$taiyangindex]="<li><font >太阳禄</font></li>";
                $zwxing[$wuquindex] ="<li><font >武曲权</font></li>";
                $tfxing[$taiyinindex]="<li><font >太阴科</font></li>";
                $zwxing[$tiantongindex]="<li><font >天同忌</font></li>";
                break;
            case "辛": $zwxing[$taiyangindex]="<li><font >太阳权</font></li>";
                $tfxing[$jumenindex]="<li><font >巨门禄</font></li>";
                $wenchang[$wencindex]="<li><font >文昌忌</font></li>";
                $wenchang[$wenqindex]="<li><font >文曲科</font></li>";
                break;
            case "己": $zwxing[$wuquindex] ="<li><font >武曲禄</font></li>";
                $tfxing[$tanlangindex]= "<li><font >贪狼权</font></li>";
                $tfxing[$tianliangindex]="<li><font >天梁科</font></li>";
                $wenchang[$wenqindex]="<li><font >文曲忌</font></li>";
                break;

            case "癸": $tfxing[$taiyinindex]="<li><font >太阴科</font></li>";
                $tfxing[$tanlangindex]= "<li><font >贪狼忌</font></li>";
                $tfxing[$jumenindex]="<li><font >巨门权</font></li>";
                $tfxing[$pojunindex]="<li><font >破军禄</font></li>";
                break;

        }


        // '恩光序号文昌顺数到生日，退后一步是恩光，文曲顺数到生日，退后一步天贵扬
        $engindex=($wencindex+$d-2)%12;
        $tianguiindex=($wenqindex+$d-2)%12;//'天贵序号
        $djindex=(11+$hIndex)% 12;//地劫
        $tkindex=(11-$hIndex+12)% 12;//天空
        $apindex=($hIndex+6)% 12;// 台铺
        $hxindex=($hIndex+2)% 12;// 诰乡
        if(isset($wenchang[$apindex])){
            $wenchang[$apindex] .="<li><font >台铺</font></li>";
        }else{
            $wenchang[$apindex] ="<li><font >台铺</font></li>";
        }
        if(isset($wenchang[$hxindex])){
            $wenchang[$hxindex] .="<li><font >封诰</font></li>";
        }else{
            $wenchang[$hxindex] ="<li><font >封诰</font></li>";
        }
        if(isset($wenchang[$djindex])){
            $wenchang[$djindex].="<li><font >地劫</font></li>";
        }else{
            $wenchang[$djindex]="<li><font >地劫</font></li>";
        }
        if (isset($wenchang[$tkindex])){
            $wenchang[$tkindex].="<li><font >天空</li>";
        }else{
            $wenchang[$tkindex]="<li><font >天空</li>";
        }
        //'火灵二星
        if($ydz==2||$ydz==6||$ydz==10){
            $hgindex=($hIndex+1)%12;
            $lgindex=($hIndex+3)%12;
            $xiaoxian=4;
        }
        if($ydz==8||$ydz==0||$ydz==4 ){
            $hgindex=($hIndex+2)%12;
            $lgindex=($hIndex+10)%12;
            $xiaoxian=10;
        }
        if($ydz==11||$ydz==3||$ydz==7){
            $hgindex=($hIndex+3)%12;
            $lgindex=($hIndex+10)%12;
            $xiaoxian=1;
        }
        if($ydz==5||$ydz==9||$ydz==1){
            $hgindex=($hIndex+9)%12;
            $lgindex=($hIndex+10)%12;
            $xiaoxian=7;
        }
        $huoling[$hgindex]="<li><font >火星</font></li>";
        $huoling[$lgindex]="<li><font >铃星</font></li>";

        //'起月系星星
        $zpindex=(3+$m)% 12;//  '左辅
        $youbiindex=(23-$m)% 12;// '右弼
        $tianyindex=$m% 12;
        $tianxindex=(8+$m)% 12;
        if(!isset($huoling[$zpindex])){
            $huoling[$zpindex] ="<li><font >左辅</font></li>";
            if($ytg=="壬" ){$huoling[$zpindex] ="<li><font >左辅科</font></li>";}
        }else{
            if($ytg=="壬" )
            {
                $huoling[$zpindex] .="<li><font >左辅科</font></li>";
            }else{
                $huoling[$zpindex].="<li><font >左辅</font></li>";
            }
        }

        if(!isset($huoling[$youbiindex])){
            $huoling[$youbiindex]="<li><font >右弼</font></li>";
            if($ytg=="戊" ){
                $huoling[$youbiindex] ="<li><font >右弼科</font></li>";
            }
        }else{
            if($ytg=="戊" ){
                $huoling[$youbiindex] .="<li><font >右弼科</font></li>";
            }else{
                $huoling[$youbiindex] .="<li><font >右弼</font></li>";
            }
        }

        if(isset($huoling[$tianyindex])){
            $huoling[$tianyindex] .="<li><font >天姚</font></li>";
        }else{
            $huoling[$tianyindex]="<li><font >天姚</font></li>";
        }
        if (isset($huoling[$tianxindex])){
            $huoling[$tianxindex] .="<li><font >天刑</font></li>";
        }else{
            $huoling[$tianxindex]="<li><font >天刑</font></li>";
        }
        if($m%4==1){
            $tianwindex=5;
        }
        if($m%4==3){
            $tianwindex=11;
        }
        if($m%4==0){
            $tianwindex=2;
        }
        if($m%4==2){
            $tianwindex=8;
        }
        if(isset($huoling[$tianwindex])){
            $huoling[$tianwindex] .="<li><font >天巫</font></li>";
        }else{
            $huoling[$tianwindex]="<li><font >天巫</font></li>";
        }

        $jieshenindex=(22-$ydz)%12;

        $tianyuearr=array(0,10,5,4,2,7,3,11,7,2,6,10,2);
        $tianyueindex=$tianyuearr[$m];
        $yinshaarr=array(0,2,0,10,8,6,4,2,0,10,8,6,4);
        $yinshaindex=$yinshaarr[$m];
        if(isset($huoling[$jieshenindex])){
            $huoling[$jieshenindex].="<li><font >解神</font></li>";
        }else{
            $huoling[$jieshenindex]="<li><font >解神</font></li>";
        }
        if(isset($huoling[$tianyueindex])){
            switch($ytg)
            {
                case "乙": $huoling[$tianyueindex].="<li><font >天月忌</font></li>";break;
                case "戊": $huoling[$tianyueindex].="<li><font >天月权</font></li>";break;
                default:$huoling[$tianyueindex].="<li><font >天月</font></li>";
            }
        }else{
            switch($ytg)
            {
                case "乙": $huoling[$tianyueindex]="<li><font >天月忌</font></li>";break;
                case "戊": $huoling[$tianyueindex]="<li><font >天月权</font></li>";break;
                default:$huoling[$tianyueindex]="<li><font >天月</font></li>";
            }
        }

        if(isset($huoling[$yinshaindex])){
            $huoling[$yinshaindex].="<li><font >阴煞</font></li>";
        }else{
            $huoling[$yinshaindex]="<li><font >阴煞</font></li>";
        }
        // '日系星三台从左辅上起初一，顺行至本生日安之
        // '八座从右弼上起初一，逆行至本生日安之
        $santindex=($zpindex+$d-1)% 12;
        $bazuoindex=($youbiindex-(($d-1) % 12)+12)% 12;
        if(isset($wenchang[$santindex])){
            $wenchang[$santindex].="<li><font >三台</font></li>";
        }else{
            $wenchang[$santindex]="<li><font >三台</font></li>";
        }
        if(isset($wenchang[$bazuoindex])){
            $wenchang[$bazuoindex].="<li><font >八座</font></li>";
        }else{
            $wenchang[$bazuoindex]="<li><font >八座</font></li>";
        }
        if(isset($wenchang[$engindex])){
            $wenchang[$engindex].="<li><font >恩光</font></li>";
        }else{
            $wenchang[$engindex]="<li><font >恩光</font></li>";
        }
        if(isset($wenchang[$tianguiindex])){
            $wenchang[$tianguiindex].="<li><font >天贵</font></li>";
        }else{
            $wenchang[$tianguiindex]="<li><font >天贵</font></li>";
        }
        //'干系星星 甲寅乙卯丙禄巳，丁己午兮禄所至，庚禄居申辛禄酉，壬禄在亥癸禄子
        switch($ytg)
        {
            case  "甲":  $lcindex=2;break;
            case  "乙":  $lcindex=3;break;
            case  "丙":  $lcindex=5;break;
            case  "丁": $lcindex=6;break;
            case  "戊":  $lcindex=5;break;
            case  "己": $lcindex=6;break;
            case  "庚": $lcindex=8;break;
            case  "辛": $lcindex=9;break;
            case  "壬": $lcindex=11;break;
            case  "癸": $lcindex=0;break;
        }
        $qingyindex=($lcindex+1)% 12;
        $tuoluoindex=($lcindex+11)% 12;
        $mingzhu="<font >禄存</font>";
        if(isset($zwxing[$lcindex])){
            $zwxing[$lcindex].="<li>".$mingzhu."</li>";
        }else{
            $zwxing[$lcindex]="<li>".$mingzhu."</li>";
        }
        if(isset($zwxing[$tuoluoindex])){
            $zwxing[$tuoluoindex].="<li><font >陀罗</font></li>";
        }else{
            $zwxing[$tuoluoindex]="<li><font >陀罗</font></li>";
        }
        if(isset($zwxing[$qingyindex])){
            $zwxing[$qingyindex].="<li><font >擎羊</font></li>";
        }else{
            $zwxing[$qingyindex]="<li><font >擎羊</font></li>";
        }

        if($ytg=="甲"||$ytg=="戊"||$ytg=="庚"){
            $tiankuiindex=1;
            $tianjiindex=7;
        }
        if($ytg=="乙"||$ytg=="己"){
            $tiankuiindex=0;
            $tianjiindex=8;
        }
        if($ytg=="丙"||$ytg=="丁"){
            $tiankuiindex=11;
            $tianjiindex=9;
        }
        if($ytg=="壬"||$ytg=="癸"){
            $tiankuiindex=3;
            $tianjiindex=5;
        }
        if($ytg=="辛"){
            $tiankuiindex=6;
            $tianjiindex=2;
        }

        if(isset($zwxing[$tiankuiindex])){
            $zwxing[$tiankuiindex].="<li><font >天魁</font></li>";
        }else{
            $zwxing[$tiankuiindex]="<li><font >天魁</font></li>";
        }
        if(isset($zwxing[$tianjiindex])){
            $zwxing[$tianjiindex].="<li><font >天钺</font></li>";
        }else{
            $zwxing[$tianjiindex]="<li><font >天钺</font></li>";
        }
        switch($ytg)
        {
            case "甲":  $tianguanindex=7;
                $tianfuindex=9;break;
            case "乙":  $tianguanindex=4;
                $tianfuindex=8;break;
            case "丙":  $tianguanindex=5;
                $tianfuindex=0;break;
            case "丁":  $tianguanindex=2;
                $tianfuindex=11;break;
            case "戊":  $tianguanindex=3;
                $tianfuindex=3;break;
            case "己":  $tianguanindex=9;
                $tianfuindex=2;break;
            case "庚":  $tianguanindex=11;
                $tianfuindex=6;break;
            case "辛": $tianguanindex=9;
                $tianfuindex=5;break;
            case "壬": $tianguanindex=10;
                $tianfuindex=6;break;
            case "癸": $tianguanindex=6;
                $tianfuindex=5;break;
        }

        if(isset($zwxing[$tianfuindex])){
            $zwxing[$tianfuindex].="<li><font >天福</font></li>";
        }else{
            $zwxing[$tianfuindex]="<li><font >天福</font></li>";
        }
        if(isset($zwxing[$tianguanindex])){
            $zwxing[$tianguanindex].="<li><font >天官</font></li>";
        }else{
            $zwxing[$tianguanindex]="<li><font >天官</font></li>";
        }
        //12博士
        if($orders==1){
            for($i=0;$i<=11;$i++){
                $boshis[($lcindex+$i)% 12]="<font color=#930000>".$boshi[$i]."</font>";
            }
        }else{
            for($i=0;$i<=11;$i++){
                $boshis[($lcindex+12-$i)% 12]="<font color=#930000>".$boshi[$i]."</font>";
            }
        }

        $tianxuindex=(6+$ydz)% 12;
        $tiankuindex=(18-$ydz)% 12;
        $longciindex=(4+$ydz)% 12;
        $fenggeindex=(22-$ydz)% 12;
        $hongluanindex=(15-$ydz)% 12;
        $tianxiindex=($hongluanindex+6)% 12;
        if($ydz%4==0){//天马
            $tianmindex=2;
        }
        if($ydz%4==1){
            $tianmindex=11;
        }
        if($ydz%4==2){
            $tianmindex=8;
        }
        if($ydz%4==3){
            $tianmindex=5;
        }
        if(isset($huoling[$tianmindex])){
            $huoling[$tianmindex] .="<li><font >天马</font></li>";
        }else{
            $huoling[$tianmindex]="<li><font >天马</font></li>";
        }
        $boshis[$tianxuindex] .=" <font >天虚</font>";
        $boshis[$tiankuindex] .=" <font >天哭</font>";
        $boshis[$longciindex] .=" <font >龙池</font>";
        $boshis[$fenggeindex] .=" <font >凤阁</font>";
        $boshis[$hongluanindex] .=" <font >红鸾</font>";
        $boshis[$tianxiindex] .=" <font >天喜</font>";

        if($ydz==2||$ydz==3||$ydz==4){
            $guchenindex=5;
            $guaxiuindex=1;
        }
        if($ydz==5||$ydz==6||$ydz==7){
            $guchenindex=8;
            $guaxiuindex=4;
        }
        if($ydz==8||$ydz==9||$ydz==10){
            $guchenindex=11;
            $guaxiuindex=7;
        }
        if($ydz==11||$ydz==0||$ydz==1){
            $guchenindex=2;
            $guaxiuindex=10;
        }

        $boshis[$guchenindex] .=" <font >孤辰</font>";
        $boshis[$guaxiuindex] .=" <font >寡宿</font>";
        $beilian=array(8,9,10,5,6,7,2,3,4,11,0,1);
        $beilianindex=$beilian[$ydz];
        if($ydz % 3==0) $poshuiindex=5;
        if($ydz % 3==2) $poshuiindex=9;
        if($ydz % 3==1) $poshuiindex=1;

        $boshis[$poshuiindex] .=" <font >破碎</font>";
        $boshis[$beilianindex] .=" <font >蜚廉</font>";
        $tiancaiindex=($minggindex+$ydz)% 12;
        $tianshouindex=($Shengindex+$ydz)% 12;
        $boshis[$tiancaiindex] .=" <font >天才</font>";
        $boshis[$tianshouindex] .=" <font >天寿</font>";
        switch($wxju){
            case "水二局": $changshIndex=8;break;
            case "木三局": $changshIndex=11;break;
            case "金四局": $changshIndex=5;break;
            case "土五局": $changshIndex=8;break;
            case "火六局": $changshIndex=2;break;
        }
        if($orders==1 ){
            for($i=0;$i<=11;$i++){
                $dptg[($i+$changshIndex)% 12]=$changsheng[$i]." ".$dptg[($i+$changshIndex)% 12];
            }
        }else{
            for($i=0;$i<=11;$i++){
                $dptg[($changshIndex-$i+12)% 12]=$changsheng[$i]." ".$dptg[($changshIndex-$i+12)% 12];
            }
        }

        switch($ytg){
            case "甲": $jiekong="申酉";break;
            case "己": $jiekong="酉申";break;
            case "乙": $jiekong="未午";break;
            case "庚": $jiekong="午未";break;
            case "丙": $jiekong="辰巳";break;
            case "辛": $jiekong="巳辰";break;
            case "丁": $jiekong="卯寅";break;
            case "壬": $jiekong="寅卯";break;
            case "戊": $jiekong="子丑";break;
            case "癸": $jiekong="丑子";break;
        }
        $jieluindex=cls_qmdj::Dzorder(substr($jiekong,0,2));
        $kongmangindex=cls_qmdj::Dzorder(substr($jiekong,-2));
        if(isset($wenchang[$jieluindex])){
            $wenchang[$jieluindex] .="<li><font >截空</font></li>";
        }else{
            $wenchang[$jieluindex]="<li><font >截空</font></li>";
        }
        if(isset($wenchang[$kongmangindex])){
            $wenchang[$kongmangindex] .="<li><font >空亡</font></li>";
        }else{
            $wenchang[$kongmangindex]="<li><font >空亡</font></li>";
        }
        /*
        $xunzhong=xunkong($ygz);
        $xunzhongindex=Dzorder(substr($xunzhong,0,2));
        $kongwangindex=Dzorder(substr($xunzhong,-2));
        if(isset($wenchang[$xunzhongindex])){
        $wenchang[$xunzhongindex] .="<li><font >旬中</font></li>";
        }else{
        $wenchang[$xunzhongindex]="<li><font >旬中</font></li>";
        }
        if(isset($wenchang[$kongwangindex])){
        $wenchang[$kongwangindex] .="<li><font >空亡</font></li>";
        }else{
        $wenchang[$kongwangindex]="<li><font >空亡</font></li>";
        }
        */
        //起大限
        $xushuig=$minggindex;
        $xushui=$juxu;
        if($orders==1 ){
            for($i=0;$i<=11;$i++){
                $dptg[($i+$xushuig)% 12]=$xushui."－".($xushui+9)."&nbsp;".$dptg[($i+$xushuig)% 12];
                $xushui++;
                $xushui +=9;
            }
        }else{
            for($i=0;$i<=11;$i++){
                $dptg[($xushuig-$i+12)% 12]=$xushui."－".($xushui+9)."".$dptg[($xushuig-$i+12)% 12];
                $xushui++;
                $xushui +=9;
            }
        }
        //'流年星
        if($ydz==2||$ydz==6||$ydz==10) $startly=6;
        if($ydz==8||$ydz==0||$ydz==4) $startly=0;
        if($ydz== 5||$ydz==9||$ydz==1) $startly=9;
        if($ydz==11||$ydz==3||$ydz==7) $startly=3;

        for($i=0;$i<=11;$i++){
            $lyxing[($startly+$i)% 12]="<font color=#6c6c6c>".$liunianxing2[$i]."</font>";
        }
        //'起小限
        if($sex==1){
            for($i=0;$i<=11;$i++){
                $lyxing[($xiaoxian+$i)% 12]=str_pad($lyxing[($xiaoxian+$i)% 12]." [".($i+1),2-strlen($i+1)," ")."] ";
            }
        }else{
            for($i=0;$i<=11;$i++){
                $lyxing[($xiaoxian-$i+12)% 12]=str_pad($lyxing[($xiaoxian-$i+12)% 12]." [".($i+1),2-strlen($i+1)," ")."] ";
            }
        }
        //'太岁一年一替换，岁前首先是晦气，
        for($i=0;$i<=11;$i++){
            $lyxing[($ydz+$i)% 12] .="<font color=#6c6c6c>".$liunianxing[$i]."</font>";
        }
        //斗君]
        $liunian=(date("Y")-1912)%12;
        $doujunindex=((($liunian-$m+13)%12)+$hIndex+1)%12;
        $zidouindex=(0-$m+13+$hIndex)%12;
        for($j=0;$j<=25;$j++){
            for($i=0;$i<=11;$i++){
                $mpxstr=$mpx[$j][(($i-10+12)%12)+1];
                if(isset($tfxing[$i])&&strpos($tfxing[$i],$mpx[$j][0])>0 &&$mpxstr!=NULL){
                    $tfxing[$i]=str_replace($mpx[$j][0],$mpx[$j][0].$mpxstr,$tfxing[$i]);
                }
                if(isset($zwxing[$i])&&strpos($zwxing[$i],$mpx[$j][0])>0 &&$mpxstr!=NULL){
                    $zwxing[$i]=str_replace($mpx[$j][0],$mpx[$j][0].$mpxstr,$zwxing[$i]);
                }
                $mpxstr2=$mpx[$j][$i+1];
                if(isset($wenchang[$i])&&strpos($wenchang[$i],$mpx[$j][0])>0 &&$mpxstr2!=NULL){
                    $wenchang[$i]=str_replace($mpx[$j][0],$mpx[$j][0].$mpxstr2,$wenchang[$i]);
                }
                if(isset($huoling[$i])&&strpos($huoling[$i],$mpx[$j][0])>0 &&$mpxstr2!=NULL){
                    $huoling[$i]=str_replace($mpx[$j][0],$mpx[$j][0].$mpxstr2,$huoling[$i]);
                }
                if(isset($boshis[$i])&&strpos($boshis[$i],$mpx[$j][0])>0 &&$mpxstr2!=NULL){
                    $boshis[$i]=str_replace($mpx[$j][0],$mpx[$j][0].$mpxstr2,$boshis[$i]);
                }
            }
        }
        for($i=0;$i<=11;$i++){
            if(!isset($zwxing[$i])) $zwxing[$i]="";
            if(!isset($tfxing[$i])) $tfxing[$i]="";
            if(!isset($wenchang[$i])) $wenchang[$i]="";
            if(!isset($huoling[$i])) $huoling[$i]="";
            if(!isset($minggong[$i])){
                $minggong[$i]="";
            }else{
                $minggong[$i]="<b>".$minggong[$i]."</b>";
            }
            if(!isset($shengong[$i])){
                $shengong[$i]="";
            }else{
                $shengong[$i]="<b>".$shengong[$i]."</b>";
            }
            if(!isset($boshis[$i])) $boshis[$i]="";
            if(!isset($lyxing[$i])) $lyxing[$i]="";
        }
        switch($minggindex){
            case 1: $mingzhum="巨门";break;
            case 2: $mingzhum="禄存";break;
            case 3: $mingzhum="文曲";break;
            case 4: $mingzhum="廉贞";break;
            case 5: $mingzhum="武曲";break;
            case 6: $mingzhum="破军";break;
            case 7: $mingzhum="武曲";break;
            case 8: $mingzhum="廉贞";break;
            case 9: $mingzhum="文曲";break;
            case 10: $mingzhum="禄存";break;
            case 11: $mingzhum="巨门";break;
            case 0: $mingzhum="贪狼";break;
        }

        $shenzhuarr=array("铃星","天相","天梁","天同","文昌","天机","火星","天相","天梁","天同","文昌","天机");
        $shenzhum=$shenzhuarr[$ydz];


        $li_span1 = array('<li>','</li>');
        $li_span2 = array('<span>','</span>');

        for($i=0;$i<=11;$i++){
            $pan[$i]="<div class='zd_tip'>".str_replace($li_span1,$li_span2,$zwxing[$i]).str_replace($li_span1,$li_span2,$tfxing[$i]).str_replace($li_span1,$li_span2,$wenchang[$i]).str_replace($li_span1,$li_span2,$huoling[$i])."</div>";
            $pan[$i].="<div class='zd_minggong'>".$minggong[$i].$shengong[$i]."</div>";
            $pan[$i].="<div class='zd_txt'>".$dz[$i]."</div>";
        }

        $quanzao = $ygz."　　".$mgz."　　".$dgz."　　".$tgz;

        $nayinarr = cls_paipan::getNayin($ygz)."　".cls_paipan::getNayin($mgz)."　".cls_paipan::getNayin($dgz)."　".cls_paipan::getNayin($tgz);

        $data_Array = array('pan'=>$pan,'dz'=>$dz,'doujunindex'=>$doujunindex,'dz_a1'=>$dz[$doujunindex],'zidouindex'=>$zidouindex,'dz_a2'=>$dz[$zidouindex],'mingzhum'=>$mingzhum,'shenzhum'=>$shenzhum,'wxju'=>$wxju,'yangdate'=>$yangdate,'NongLi'=>$NongLi,'quanzao'=>$quanzao,'nayinarr'=>$nayinarr);

        return $data_Array;
    }




}