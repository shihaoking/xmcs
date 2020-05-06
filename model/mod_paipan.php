<?php 
if (!defined('CORE'))  exit('Request Error!'); 
class mod_paipan { 


	//八字排盘
	//真太阳时就设置为1
	function bazi($bzname,$area,$sex,$yezis,$nian1,$yue1,$ri1,$hour1,$minues,$taiyang){
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
		
		
		
		$lnp=1;//req::item('lnp');
		$ssp=1;//req::item('ssp');
		$cgp=1;//req::item('cgp');
		$qyp=1;//req::item('qyp');
		$nyp=1;//req::item('nyp');
		$shenshap=1;//req::item('shenshap');
		$csp=1;//req::item('csp');
		$mgp=1;//req::item('mgp');
		$xyp=1;//req::item('xyp');
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
		
		
		
		if($qyp==1){//起运交运时间go
		$file_dir=PATH_DATA."/paipan/jq.txt";
		
		
		
		$fp=fopen($file_dir,"r");
		$content=fread($fp,filesize($file_dir));
		fclose($fp);
		$arrdate=explode("\n",$content);
		$i=0;
		while(strtotime($arrdate[$i])<=$bzdate){
			if($bz_sx==1){
				$jqstr=$arrdate[$i+1];
				$qyjs=cls_paipan_function::Datecha($bzdate,strtotime($arrdate[$i+1]),"i");
			}else{
				$jqstr=$arrdate[$i];
				$qyjs=cls_paipan_function::Datecha($bzdate,strtotime($arrdate[$i]),"i");
			}
		$i++;
		} 
		
		
		
		$jqstr.=$jq[(int)(substr($jqstr,5,2)+10)%12];
		$qyjs=$qyjs/60/24;
		$qyjs1=floor($qyjs/3);		//'整天/3=要加的起运年数	8.126388889
		$qyjs9=$qyjs-$qyjs1*3;		//'余天		0.379166667
		$qyjs2=floor($qyjs9*4);		//'余天*4=月	1.516666666
		$qyjs9=($qyjs9-$qyjs2/4)*24;	//'余小时		3.099999998
		$qyjs3=floor($qyjs9*5);		//'余小时*5=天	15.49999999
		$qyjs4=floor(($qyjs9*5-$qyjs3)*24);	//'余小时
		if ($qyjs1!=0){
			$qysj = " <b>".$qyjs1."</b> 年 <b>".$qyjs2."</b> 个月 <b>".$qyjs3."</b> 天 <b>".$qyjs4."</b> 小时";
		}else{
			$qysj = " <b>".$qyjs2."</b> 个月 <b>".$qyjs3."</b> 天 <b>".$qyjs4."</b> 小时";
		}
		
		
		$zydate=mktime($hour1+$qyjs4,$minues,0,intval($yue1)+$qyjs2,intval($ri1)+$qyjs3,$nian1+$qyjs1);
		$zysj=date("Y年m月d日H时i分",$zydate);
		}//起运交运时间en
		
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
		
		for($i=1;$i<=9;$i++){//大运
			if ($bz_sx==1 ){
				$t=($mgx+$i)%10;
				$d=($mzx+$i)%12;
			}else{
			$t=($mgx-$i+10)%10;
			$d=($mzx-$i+12)%12;
			}
			$dayungz=$tiangan[$t].$dizhi[$d];
			if($ssp==1){$dygzsshen=cls_paipan::getShishen($t,$rgx)."<br>";}else{$dygzsshen='';}
			if($csp==1){$changsheng=cls_paipan::getChangshengg($rg,$d)."<br>";}else{$changsheng='';}
			$dayunhtml.='<div class="sm_kuang2">'.$changsheng.$dygzsshen.'<span class=sm_hong>'.$dayungz.'</span></div>';
		
		}//大运end
		
		$qycha=substr($zysj,0,6)-$nian1;//岁次go
		for ($i=1;$i<=9;$i++){
			$dayunq=($i-1)*10+$qycha;
			$dayunz=($i*10+$qycha-1);
			$dayun=$dayunq."-".$dayunz;
			$suicihtml.="<div class='sm_kuang2'>".$dayun."</div>";
			$suicihtmljs.=$dayun." &nbsp;";
		}//岁次end
		
		if($lnp==1){//流年干支go
			for ($i=1;$i<=9;$i++){
				$beginyear=substr($zysj,0,6);
				$beginyear+=($i-1)*10;
				$liunianhtml.="<div class='sm_kuang2'>".$beginyear."</div>";
				$liunianhtmljs.=$beginyear." &nbsp;";
			}//流年干支end
			
			$qygx=($ygx+$qycha)%10;//流年干支2go
			$qyzx=($yzx+$qycha)%12;
			for($i=1;$i<=9;$i++){
				$liunian2html.="<div class='sm_kuang2'>";
				for($j=0;$j<=9;$j++){
					$liugan=($qygx+$j)%10;
					$liuzhi=($qyzx+$j+($i-1)*10)%12;
					if($j<=4){
						$liugz="<font color=blue>".$tiangan[$liugan]."</font>".$dizhi[$liuzhi];
						$liunian2htmljs.=$tiangan[$liugan].$dizhi[$liuzhi]." &nbsp;";
					}else{
						$liugz=$tiangan[$liugan]."<font color=blue>".$dizhi[$liuzhi]."</font>";
						$liunian2htmljs.=$tiangan[$liugan].$dizhi[$liuzhi]." &nbsp;";
					}
					$liunian2html.=$liugz."<br>";
					$liunian2htmljs.=" &nbsp;";
				}
				$liunian2html.="</div>";
				$liunian2htmljs.="<br>";
			}//流年干支2end
		
			for ($i=1;$i<=9;$i++){//流年干支3go
				$endyear=substr($zysj,0,6)+9;
				$endyear+=($i-1)*10;
				$liunian3html.="<div class='sm_kuang2'>".$endyear."</div>";
				$liunian3htmljs.=$endyear." &nbsp;";
			}
		
		}//流年干支3end
		
		if($xyp==1){//小运go
			for($i=1;$i<=$qycha;$i++){
				if ($bz_sx==1 ){
					$tx=($hgx+$i)%10;
					$dx=($hzx+$i)%12;
				}else{
				$tx=($hgx-$i+10)%10;
				$dx=($hzx-$i+12)%12;
				}
				$xayungz=$tiangan[$tx].$dizhi[$dx];
				$xygzsshen=cls_paipan::getShishen($tx,$rgx);
				$xiaoyunhtml.='<div class="sm_kuang2">'.$xygzsshen.'<br><span class="sm_hong">'.$xayungz.'</span></div>';
			
			}//小运end
		
			for($i=1;$i<=$qycha;$i++){//流年-go
				$xliugan=$tiangan[($ygx+$i-1)%10];
				$xliuzhi=$dizhi[($yzx+$i-1)%12];
				$liunianenhtml.="<div class='sm_kuang2'>".$i."岁<br>".$xliugan.$xliuzhi."</div>";
			}
		}//end小运
		//echo $nongdate;die;
		$nayintaiyuan = cls_paipan::getNayin($taiyuan);
		
		$nayinminggong = cls_paipan::getNayin($minggong);
		
		$shishen = cls_paipan::getShishen($ygx,$rgx);
		$shishen .= cls_paipan::getShishen($mgx,$rgx);
		$riyuan = cls_paipan::getShishen($hgx,$rgx);
		$shishen1 = cls_paipan::getShishen($ygx,$rgx);
		$shishen2 = cls_paipan::getShishen($mgx,$rgx);
		$sizhu = $ygz.'&nbsp;'.$mgz.'&nbsp;'.$rgz.'&nbsp;'.$hgz.'&nbsp;空('.cls_paipan::xunkong($rgz).')';
		
		$zanggan1 = $ycg1.$ysshen1."<br>".$ycg2.$ysshen2."<br>".$ycg3.$ysshen3;
		
		
		
		$zanggan2 = $mcg1.$msshen1."<br>".$mcg2.$msshen2."<br>".$mcg3.$msshen3;
		$zanggan3 = $rcg1.$rsshen1."<br>".$rcg2.$rsshen2."<br>".$rcg3.$rsshen3;
		$zanggan4 = $hcg1.$hsshen1."<br>".$hcg2.$hsshen2."<br>".$hcg3.$hsshen3;
		
		$nayin1 = cls_paipan::getNayin($ygz);
		$nayin2 = cls_paipan::getNayin($mgz);
		$nayin3 = cls_paipan::getNayin($rgz);
		$nayin4 = cls_paipan::getNayin($hgz);
		
		$data_Array = array('bzdate'=>$bzdatess,'nongdate'=>$nongdate,'taiyuan'=>$taiyuan,'nayintaiyuan'=>$nayintaiyuan,'minggong'=>$minggong,'qysj'=>$qysj,'zysj'=>$zysj,'sub_zysj'=>substr($zysj,3,1),'shishen'=>$shishen,'riyuan'=>$riyuan,'sizhu'=>$sizhu,'jqstr'=>$jqstr,'suicihtmljs'=>$suicihtmljs,'liunianhtmljs'=>$liunianhtmljs,'liunian2htmljs'=>$liunian2htmljs,'liunian3htmljs'=>$liunian3htmljs,'shishen1'=>$shishen1,'shishen2'=>$shishen2,'ygz'=>$ygz,'mgz'=>$mgz,'rgz'=>$rgz,'hgz'=>$hgz,'xkrgz'=>cls_paipan::xunkong($rgz),'nayinminggong'=>$nayinminggong,'zanggan1'=>$zanggan1,'zanggan2'=>$zanggan2,'zanggan3'=>$zanggan3,'zanggan4'=>$zanggan4,'nayin1'=>$nayin1,'nayin2'=>$nayin2,'nayin3'=>$nayin3,'nayin4'=>$nayin4,'jqstr'=>$jqstr,'dayunhtml'=>$dayunhtml,'suicihtml'=>$suicihtml,'liunianhtml'=>$liunianhtml,'liunian2html'=>$liunian2html,'liunian3html'=>$liunian3html);
		return $data_Array;
	}
	
	
	
	/****
	 *奇门遁甲
	 */
	
	function qmdj($name,$sex,$birthyear,$zhanshi,$Pmethod,$jutag){
		
		include PATH_DATA.'/paipan/qmdj/jieqi.string.php';
		
		if($jutag==0)
		{
			$nian=req::item('yea');
			$yue=req::item('mont');
			$ri=req::item('dat');
			$shi=req::item('hou');
			$fen=req::item('minut');
			$nongn=cls_paipan_function::getNongli($nian,$yue,$ri,$shi,"quan");
			
			$NowTime=$nian."-".$yue."-".$ri;
			if(checkdate($yue,$ri,$nian)==false)
			{
				die($NowTime."不是一个合法的日期");
			}
			$ygz=cls_qmdj::sizhu($nian,$yue,$ri,$shi,$fen,"nian");
			$mgz=cls_qmdj::sizhu($nian,$yue,$ri,$shi,$fen,"yue");
			$dgz=cls_qmdj::sizhu($nian,$yue,$ri,$shi,$fen,"ri");
			$tgz=cls_qmdj::sizhu($nian,$yue,$ri,$shi,$fen,"shi");
		}
		
		$zhuanf=trim(req::item('R1'));
		if($zhuanf=="fg") 
		{
			$order=req::item('order');
		}
		$rxunk=cls_qmdj::xunkong($dgz,"no");
		$rxunshou=cls_qmdj::xunkong($dgz,"yes");
		$txunk=cls_qmdj::xunkong($tgz,"no");
		$txunshou=cls_qmdj::xunkong($tgz,"yes");
		$yxunk=cls_qmdj::xunkong($ygz,"no");
		$yxunshou=cls_qmdj::xunkong($ygz,"yes");
		$mxunk=cls_qmdj::xunkong($mgz,"no");
		$mxunshou=cls_qmdj::xunkong($mgz,"yes");
		if($jutag==0)
		{
			$jieqq=cls_qmdj::makejq($nian,$yue,$ri,$shi,$fen);
			$njieqi=substr(trim($jieqq),-6);
			switch($njieqi){
				case "立春":$tqindex=1;break;
				case "雨水":$tqindex=1;break;
				case "惊蛰":$tqindex=1;break;
				case "春分":$tqindex=2;break;
				case "清明":$tqindex=2;break;
				case "谷雨":$tqindex=2;break;
				case "立夏":$tqindex=3;break;
				case "小满":$tqindex=3;break;
				case "芒种":$tqindex=3;break;
				case "夏至":$tqindex=4;break;
				case "小暑":$tqindex=4;break;
				case "大暑":$tqindex=4;break;
				case "立秋":$tqindex=5;break;
				case "处暑":$tqindex=5;break;
				case "白露":$tqindex=5;break;
				case  "秋分":$tqindex=6;break;
				case  "寒露":$tqindex=6;break;
				case  "霜降":$tqindex=6;break;
				case "立冬":$tqindex=7;break;
				case "小雪":$tqindex=7;break;
				case "大雪":$tqindex=7;break;
				case "冬至":$tqindex=0;break;
				case "小寒":$tqindex=0;break;
				case "大寒":$tqindex=0;break;
			}
		}
		
		$tgi=cls_qmdj::Tgorder($dgz);
		$dzi=cls_qmdj::Dzorder($dgz);
		$yuan=cls_qmdj::sanyuan($dgz);
		
		
		
		if($jutag==0)
		{
			$dunyyx=explode("-",cls_qmdj::dunju($nian,$yue,$ri,$shi,$fen));
			$dunju=$dunyyx[0];
			$yinyang=$dunyyx[1];
			if(isset($order)&&$order==0) $yinyang=true;
			$JuXu=substr($dunyyx[0],6,3);
			switch($JuXu)
			{
				case "一":$JuX=1;break;
				case "二" :$JuX=2;break;
				case "三": $JuX=3;break;
				case "四" :$JuX=4;break;
				case "五" :$JuX=5;break;
				case "六" :$JuX=6;break;
				case "七" :$JuX=7;break;
				case "八" :$JuX=8;break;
				case "九" :$JuX=9;break;
			}//局数转为序号
		}//公历定局结束
		
		if($jutag==1)//四柱排门定局开始
		{
			$ju=req::item('ju');
			if($ju>0){
				$dunju="阳遁".$ju."局";
				$yinyang=true; 
			}else{
				$dunju="阴遁".abs($ju)."局";
				$yinyang=false; 
				if(isset($order)&&$order==0) $yinyang=true;
			}
			$JuX=abs($ju);
		}//四柱定局结束
		if($yinyang==true)
		{
			$ijk=0;
			for($i=$JuX-1;$i<=$JuX+7;$i++)
			{
				$sqindex=$i%9;
				$sqly[$sqindex]=substr($liuyi[$ijk],0,3);
				$LiuYiA[$sqindex]=$liuyi[$ijk];
				$ijk++;
			}
		}else{
			$ijk=10;
			for($i=$JuX-1;$i<=$JuX+7;$i++)//共9数
			{
				$sqindex=$i%9;
				$ijk=($ijk+8)%9;
				$sqly[$sqindex]=substr($liuyi[$ijk],0,3);
				$LiuYiA[$sqindex]=$liuyi[$ijk];
				//$ijk++;
			}
		}//'阴阳局三奇六议分别形成
		
		$zhufu=0;
		for($i=0;$i<=8;$i++)
		{
			if(substr($LiuYiA[$i],-6)==$txunshou){
				$zhufu=$i+1;
				break;
			}
		}
		switch($zhufu)
		{
			case 1: $zfindex=1;break;
			case 8 :$zfindex=2;break;
			case 3 :$zfindex=3;break;
			case 4 :$zfindex=4;break;
			case 9 :$zfindex=5;break;
			case 2 :$zfindex=6;break;
			case 7 :$zfindex=7;break;
			case 6 :$zfindex=8;break;
			case 5 :$zfindex=6;break;
		}//'转盘排法
		$zhifu=$jiuxing[$zfindex-1];//  '值符
		if($zfindex==9){
			$zfindex1=$tqindex+1;
		}else{
			$zfindex1=$zfindex ;// '值使
		}//'直符和直使  等于5怎么办
		$zhishi=$bamen[$zfindex1-1];
		
		if($zhuanf=="fg")
		{ //'飞宫排法
			$zhifu=$Fjiuxing[$zhufu-1];
			$zhishi=$Fjiumen[$zhufu-1];
		}
		$sg=substr($tgz,0,3);//时干
		if($sg=="甲")
		{
			switch($tgz)
			{
				case "甲子": $sg="戊";break;
				case "甲戌": $sg="己";break;
				case "甲申": $sg="庚";break;
				case "甲午": $sg="辛";break;
				case "甲辰": $sg="壬";break;
				case "甲寅": $sg="癸";break;
			}
		}
		for($ia=0;$ia<=8;$ia++)
		{
			if($sqly[$ia]==$sg)
			{
				$sgindex=$ia+1;
				break;
			} //求出时干所在的宫sgindex
		}
		
		switch($sgindex)
		{
			case 1 :$zfindexa=0;break;
			case 8 :$zfindexa=1;break;
			case 3 :$zfindexa=2;break;
			case 4 :$zfindexa=3;break;
			case 9 :$zfindexa=4;break;
			case 2 :$zfindexa=5;break;
			case 7 :$zfindexa=6;break;
			case 6 :$zfindexa=7;break;
			case 5 :$zfindexa=5;break;
		}
		if($sgindex==5){
			$trindex=6;
		}else{
			$trindex=$zfindex;
		}
		
		for($ib=0;$ib<=7;$ib++)
		{
		$zf=($zfindexa+$ib)%8;
		$zfindexb=($zfindex-1+$ib+8)%8;
		if($zfindexb==5) $tianqindex=$zf;
			$jiuxings[$zf]=substr($jiuxing[$zfindexb],0,6);//'九星
		}
		
		for($i=0;$i<=7;$i++)
		{
			$tianqin[$i]="&nbsp;&nbsp;";
		}
		$tianqingindex=($zfindexb+1)%9;
		$tianqin[$tianqindex]="<font color=red>禽</font>";
		
		for($i=0;$i<=9;$i++)
		{
			if($tg[$i]==substr($tgz,0,3))
			{
				$iindex=$i;
				break;
			}
		}
		
		switch($txunshou)
		{
			case "甲子": $sg1="戊";break;
			case "甲戌": $sg1="己";break;
			case "甲申": $sg1="庚";break;
			case "甲午": $sg1="辛";break;
			case "甲辰": $sg1="壬";break;
			case "甲寅": $sg1="癸";break;
		}
		for($i=0;$i<=7;$i++)
		{
			if($sqly[$i]==$sg1)
			{
				$xsindext=$i+1;
				break;
			}
		}
		
		switch($zhishi)
		{
			case "休门": $xsindex=1;break;
			case "死门": $xsindex=2;break;
			case "伤门": $xsindex=3;break;
			case "杜门": $xsindex=4;break;
			case "开门": $xsindex=6;break;
			case "惊门": $xsindex=7;break;
			case "生门": $xsindex=8;break;
			case "景门": $xsindex=9;break;
		}
		if($yinyang==true)
		{
			$bmIndex=($xsindext+$iindex)%9;
		}else{
			$bmIndex=($xsindext-$iindex+9)%9;
		}
		
		if($bmIndex==0) $bmIndex=9;
		switch($bmIndex)
		{
			case 1: $bmIndexa=0;break;
			case 8: $bmIndexa=1;break;
			case 3: $bmIndexa=2;break;
			case 4: $bmIndexa=3;break;
			case 9: $bmIndexa=4;break;
			case 2: $bmIndexa=5;break;
			case 7: $bmIndexa=6;break;
			case 6: $bmIndexa=7;break;
			case 5: $bmIndexa=5;break;
		}
		
		for($i=0;$i<=7;$i++)
		{
			$bamenindex=($bmIndexa+$i)%8;
			$zfindexb=($zfindex1-1+$i)%8;
			$bamens[$bamenindex]=$bamen[$zfindexb];
			switch($bamens[$bamenindex])
			{
				case "开门":$bamens[$bamenindex]="<font color=red>".$bamens[$bamenindex]."</font>";break;
				case "休门":$bamens[$bamenindex]="<font color=red>".$bamens[$bamenindex]."</font>";break;
				case "生门":$bamens[$bamenindex]="<font color=red>".$bamens[$bamenindex]."</font>";break;
			}
		}    
		//八门算法
		
		//' 天盘天干
		for($i=0;$i<=7;$i++)
		{
			switch($jiuxings[$i])
			{ 
				case "天蓬":  $tpi=0;break; 
				case "天任":  $tpi=7;break;
				case "天冲":  $tpi=2;break;
				case "天辅":  $tpi=3;break;
				case "天英":  $tpi=8;break;
				case "天芮":  $tpi=1;break;
				case "天柱":  $tpi=6;break;
				case "天心":  $tpi=5;break;
				case "天禽":  $tpi=4;break;
			}
			$tp[$i]=$sqly[$tpi];
			$sqtag[$tpi]=true;
		}
		
		for($i=0;$i<=8;$i++)
		{
			if(!isset($sqtag[$i]) && $zhufu<>5)
			{
				$tpj[$tianqindex]=$sqly[$i]; 
				break;
			}elseif(!isset($sqtag[$i])&& $zhufu==5)
			{   
				$tpj[$tianqindex]=$sqly[$i];
				break;
			}
		}
		//天盘天干
		for($i=0;$i<=7;$i++)
		{
			if(empty($tpj[$i])) $tpj[$i]="&nbsp;&nbsp;";
		}
		
		//八神
		if($yinyang==true)
		{
			for($i=0;$i<=7;$i++)
			{
				$ij=($zfindexa+$i)%8;
				$bashens[$ij]=$bashen[$i];
				if(!empty($bashens[$i]))
				{
					switch($bashens[$i])
					{
						case "直符": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
						case "六合": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
						case "九地": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
						case "九天": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
					}
				}
			}
		}else{
		
			for($i=0;$i<=7;$i++)
			{
				$ij=($zfindexa+$i)%8;
				$ik=(8-$i)%8;
				$bashens[$ij]=$bashen[$ik];
				if(!empty($bashens[$i]))
				{
					switch($bashens[$i])
					{
						case "直符": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
						case "六合": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
						case "九地": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
						case "九天": $bashens[$i]="<font color=red>".$bashens[$i]."</font>";break;
					}
				}
			}
		}
		
		
		
		
		//飞宫排法
		
		if($zhuanf=="fg" )// '飞宫排法
		{
				for($ia=0;$ia<=8;$ia++)
				{
					if($sqly[$ia]==$sg)
					{
						$FgSg=$ia;
						break;
					}
				}
				if($bmIndex==0 ) $bmIndex=9;
				if($yinyang==true)
				{// '九门九星顺排
					for($i=0;$i<=8;$i++)
					{
						$fgjX[($i+$FgSg)%9]=$Fjiuxing[($i+$zhufu-1)%9];
					}
					for($i=0;$i<=8;$i++)
					{
						$fgBm[($i+$bmIndex-1)%9]=$Fjiumen[($zhufu+$i-1)%9];
					}
					for($i=0;$i<=8;$i++)
					{// '天盘九神
						$fgtpjs[($i+$FgSg)%9]=$fJiushen[$i];
					}
					for($i=0;$i<=8;$i++)
					{// '地盘九神
						$fgdpjs[($i+$zhufu-1)%9]=$fJiushen[$i];
					}
				}else{//  '九门九星逆排
					for($i=0;$i<=8;$i++)
					{
						$fgjX[($i+$FgSg)%9]=$Fjiuxing[($zhufu-$i+8)% 9];
					}
					
					for($i=0;$i<=8;$i++)
					{//九门
						$fgBm[($i+$bmIndex-1)%9]=$Fjiumen[($zhufu-$i+8)%9];
					}
					
					for($i=0;$i<=8;$i++)
					{// '九神
						$fgtpjs[($i+$FgSg)%9]=$fyJiushen[(9-$i)%9];
					}
					for($i=0;$i<=8;$i++)
					{// '地盘九神
						$fgdpjs[($i+$zhufu-1)%9]=$fyJiushen[(9-$i)%9];
					}
				}// '九门九星结尾
			
			//天盘天干的
				for($i=0;$i<=8;$i++)
				{
					switch($fgjX[$i])
					{
						case "蓬": $fgtpIndex=0;break;
						case "芮": $fgtpIndex=1;break;
						case "冲": $fgtpIndex=2;break;
						case "辅": $fgtpIndex=3;break;
						case "禽": $fgtpIndex=4;break;
						case "心": $fgtpIndex=5;break;
						case "柱": $fgtpIndex=6;break;
						case "任": $fgtpIndex=7;break;
						case "英": $fgtpIndex=8;break;
					}
					$fgtp[$i]=$sqly[$fgtpIndex];
				}// '天盘天干
				
			}// '飞宫结尾
		
				for($i=0;$i<=8;$i++)
				{
					switch($sqly[$i])
					{
						case "乙":  $sqly[$i]="<font color=red>".$sqly[$i]."</font>";break;
						case "丙":  $sqly[$i]="<font color=red>".$sqly[$i]."</font>";break;
						case "丁":  $sqly[$i]="<font color=red>".$sqly[$i]."</font>";break;
					}
				} 
			
				for($i=0;$i<=7;$i++)
				{
					switch($tpj[$i])
					{
						case "乙": $tpj[$i]="<font color=red>".$tpj[$i]."</font>";break;
						case "丙": $tpj[$i]="<font color=red>".$tpj[$i]."</font>";break;
						case "丁": $tpj[$i]="<font color=red>".$tpj[$i]."</font>";break;
					}
					switch($tp[$i])
					{
						case "乙": $tp[$i]="<font color=red>".$tp[$i]."</font>";break;
						case "丙": $tp[$i]="<font color=red>".$tp[$i]."</font>";break;
						case "丁": $tp[$i]="<font color=red>".$tp[$i]."</font>";break;
					}
					switch($jiuxings[$i])
					{
						case "天辅": $jiuxings[$i]="<font color=red>".$jiuxings[$i]."</font>";break;
						case "天心": $jiuxings[$i]="<font color=red>".$jiuxings[$i]."</font>";break;
						case "天任": $jiuxings[$i]="<font color=red>".$jiuxings[$i]."</font>";break;
						case "天禽": $jiuxings[$i]="<font color=red>".$jiuxings[$i]."</font>";break;
					}
				}
			$times=mktime($shi,$fen,0,$yue,$ri,$nian);
			$timed=date("Y-m-d H:i:s",$times);
			
			if($zhuanf=="zp")
			{
				$sq6y=array($sqly[0],$sqly[7],$sqly[2],$sqly[3],$sqly[8],$sqly[1],$sqly[6],$sqly[5]);
				$gong=array("一","八","三","四","九","二","七","六");
				for($i=0;$i<=7;$i++)
				{
				$qmdj[$i]="<table width=95 border=0 cellspacing=0 cellpadding=0 align=center><tr><td height=32>&nbsp;</td><td>".$bashens[$i]."</td><td><font color=#aa9faa>".$gong[$i]."</font></td></tr><tr>
				<td height=32>".$tianqin[$i]."</td><td>".$jiuxings[$i]."</td><td>".$tp[$i]."</td></tr><tr><td height=32>".$tpj[$i]."</td><td>".$bamens[$i]."</td><td>".$sq6y[$i]."</td></tr></table>";
				}
			}else{
				
				$jiugonggua=array("坎","坤","震","巽","中","乾","兑","艮","离");
				for($i=0;$i<=8;$i++)
				{
				$qmdj[$i]="<table width=99% border=0 cellspacing=2 cellpadding=2 bgcolor=#eeeeee><tr><td height=30>".$fgtpjs[$i]."</td><td>".$fgjX[$i]."</td><td>".$fgtp[$i]."</td></tr><tr>
				<td height=30></td><td>".$fgBm[$i]."</td><td>&nbsp;</td></tr><tr><td height=30>".$fgdpjs[$i]."</td><td>".$jiugonggua[$i]."</td><td>".$sqly[$i]."</td></tr></table>";
				}
				
			}
			
			$data_Array = array('nongn'=>$nongn,'timed'=>$timed,'jieqq'=>$jieqq,'yuan'=>$yuan,'ygz'=>$ygz,'mgz'=>$mgz,'dgz'=>$dgz,'tgz'=>$tgz,'yxunk'=>$yxunk,'mxunk'=>$mxunk,'rxunk'=>$rxunk,'txunk'=>$txunk,'dunju'=>$dunju,'zhifu'=>$zhifu,'zhishi'=>$zhishi,'zhuanf'=>$zhuanf,'qmdj'=>$qmdj,'sqly'=>$sqly);	
				
			return $data_Array;	
	}
	
	
	/***
	 *六爻起卦
	 */
	
	function liuyao(){
		
		$nongliyu=array(NULL,"正","二","三","四","五","六","七","八","九","十","十一","十二");
		$nongliri=array(NULL,"初一","初二","初三","初四","初五","初六","初七","初八","初九","十","十一","十二","十三","十四","十五","十六","十七","十八","十九","二十","二十一","二十二","二十三","二十四","二十五","二十六","二十七","二十八","二十九","三十","三十一");
		$liuqing=array(NULL,"  父母","　兄弟","　官鬼","　妻财","　子孙");
		$liushen=array("玄武","白虎","腾蛇","勾陈","朱雀","青龙"); 
		$benbagua=array(NULL,array(NULL,1,1,1,1),array(NULL,1,1,2,2),array(NULL,1,2,1,3),array(NULL,1,2,2,4),array(NULL,2,1,1,5),array(NULL,2,1,2,6),array(NULL,2,2,1,7),array(NULL,2,2,2,8));
		
		require_once(PATH_DATA.'/paipan/6y/guadata.inc');
		require_once(PATH_DATA.'/paipan/6y/guadata3.inc');
		require_once(PATH_DATA.'/paipan/6y/guadata4.inc');
		require_once(PATH_DATA.'/paipan/6y/guadata5.inc');
		
		$fangfa=array(0,"电脑自动","手工指定","时间起卦","手动摇卦","报数起卦");
		$name=req::item('name');
		$reason=req::item('reason');
		$birthyear=req::item('birthyear');
		$sex=req::item('sex');
		if($sex=="1"){$sex="男";}else{ $sex="女";}
		$jd1=req::item('jd1');
		$jd2=req::item('jd2');
		$taiyang=req::item('taiyang');
		$sely=req::item('sely');
		$selmo=req::item('selmo');
		$seld=req::item('seld');
		$selh=req::item('selh');
		$selm=req::item('selm');
		$yao=array(0,req::item('Y1'),req::item('Y2'),req::item('Y3'),req::item('Y4'),req::item('Y5'),req::item('Y6'));
		$auto=req::item('auto');
		$times=mktime($selh,$selm,0,$selmo,$seld,$sely);
		$gongli=date("Y年m月d日H时",$times);
		if($taiyang==1){
		$times=cls_paipan::getTaiyang($times,$jd1,$jd2);
		$Truedate=date("Y年m月d日H时",$times);
		$sely=date("Y",$times);
		$selmo=date("m",$times);
		$seld=date("d",$times);
		$selh=date("H",$times);
		}
		$bazistr=cls_paipan_function::getSizhu($sely,$selmo,$seld,$selh,0);
		$ygz=$bazistr[0].$bazistr[1];
		$mgz=$bazistr[2].$bazistr[3];
		$dgz=$bazistr[4].$bazistr[5];
		$tgz=$bazistr[6].$bazistr[7];
		$dystr=cls_paipan_function::getSizhu($sely,$selmo,$seld,$selh,1);	
		$dy=$dystr[1];
		$ddz=$dystr[5];
		$dtg=$dystr[4];
		$tdz=$dystr[7];
		$nongliarr=cls_paipan_function::getNongli($sely,$selmo,$seld,$selh);
		$nonglistr=$nongliarr[0]."年".$nongliarr[1]."月".$nongliarr[2].$nongliarr[3];
		$mahua=cls_ziwei::getmaxing($ddz);
		$maxing=$mahua[0];
		$taohua=$mahua[1];
		$lu=cls_ziwei::getlushen($dtg);
		$guirenarr=cls_ziwei::getguiren($dtg);
		$guiren=$dizhi[$guirenarr[0]]." ".$dizhi[$guirenarr[1]];
		if($tdz==0){$guashi=12;}else{$guashi=$tdz;}
		if($auto==3)
		{ 
		if($dy==0){
		$nongzhi=12;
		}else{$nongzhi=$dy;}
		$nongmon=$nongliarr[1];
		if(substr($nongmon,0,3)=="闰") $nongmon=substr($nongmon,3,strlen($nongmon)-3);
		$nongmonth=array_search($nongmon,$nongliyu);
		$nongd=$nongliarr[2];
		$nongday=array_search($nongd,$nongliri);
		$shangguashu=$nongzhi+$nongmonth+$nongday;
		$shangguashu=$shangguashu%8; 
		if( $shangguashu == 0 ) $shangguashu=8;
		$xiaguashu=$nongzhi+$nongmonth+$nongday+$guashi;
		$xiaguashu=$xiaguashu%8; 
		if ($xiaguashu == 0) $xiaguashu=8;
		$bianguashu=$nongzhi+$nongmonth+$nongday+$guashi;
		$bianguashu=$bianguashu%6; 
		if( $bianguashu == 0) $bianguashu=6;
		foreach($benbagua as $key=>$arrval){ 
		if($shangguashu==$benbagua[$key][4]){
		for($j=1;$j<=3;$j++)
		{
		$yao[$j+3]=$benbagua[$key][$j];
		}
		}
		if($xiaguashu==$benbagua[$key][4]){
		for($j=1;$j<=3;$j++){
		$yao[$j]=$benbagua[$key][$j];
		} 
		}
		}
		if( $yao[$bianguashu]==1 ){
		$yao[$bianguashu]=3;
		}else{		
		$yao[$bianguashu]=4;
		}
		}
		
		if($auto==5)
		{
		$upgua=req::item('bsnums_up');
		$downgua=req::item('bsnums_down');
		$bianguashu=$upgua+$downgua;
		$shangguashu=$upgua%8;
		if($shangguashu == 0 ) $shangguashu=8;
		$xiaguashu=$downgua%8;
		if($xiaguashu == 0 ) $xiaguashu=8;
		if(req::item('addhour')==1 ) $bianguashu+=$guashi;
		$bianguashu%=6;
		if($bianguashu == 0 ) $bianguashu=6;
		foreach($benbagua as $key=>$arrval){ 
		if($shangguashu==$benbagua[$key][4]){
		for ($j=1;$j<=3;$j++){
		$yao[$j+3]=$benbagua[$key][$j];
		} 
		}
		
		if($xiaguashu==$benbagua[$key][4]){
		for($j=1 ;$j<=3;$j++)
		{
		$yao[$j]=$benbagua[$key][$j];
		} 
		}
		}
		if($yao[$bianguashu]==1)
		{
		$yao[$bianguashu]=3;
		}else{
		$yao[$bianguashu]=4;
		}
		}
		
		if($auto==1 ){
		$temprndyao=rand(1,100);
		$yao[1]=$temprndyao%4;
		if($yao[1]==0){
		$yao[1]=4;
		}
		$temprndyao=rand(2,100);
		$yao[2]=$temprndyao%4;
		if($yao[2]==0 ){
		$yao[2]=4;
		}
		$temprndyao=rand(3,100);
		$yao[3]=$temprndyao%4;
		if ($yao[3]==0){
		$yao[3]=4;
		}
		$temprndyao=rand(4,100);
		$yao[4]=$temprndyao%4;
		if($yao[4]==0){
		$yao[4]=4;
		}
		$temprndyao=rand(5,100);
		$yao[5]=$temprndyao%4;
		if ($yao[5]==0 ){
		$yao[5]=4;
		}
		$temprndyao=rand(6,100);
		$yao[6]=$temprndyao%4;
		if ($yao[6]==0 ){
		$yao[6]=4;
		}
		}
		//各种方式的装爻结束，开始排卦 
		$benggua="";
		$biangua="";
		$isbiangua=0; 
		for($i=6; $i>=1 ;$i--){
		switch($yao[$i]){
		case 1:$benggua.="1";
		$biangua.="1";
		break;
		case 3:$benggua.="1";
		$biangua.="0";
		$isbiangua=1;
		break;
		case 2:$benggua.="0";
		$biangua.="0";
		break;
		case 4:$benggua.="0";
		$biangua.="1";
		$isbiangua=1;
		break;
		}
		}
		
		$xunkong = cls_paipan::xunkong($ygz).'&nbsp;&nbsp;'.cls_paipan::xunkong($mgz).'&nbsp;&nbsp;'.cls_paipan::xunkong($dgz).'&nbsp;&nbsp;'.cls_paipan::xunkong($tgz);
		$yuma = $dizhi[$maxing];
        $taohua = $dizhi[$taohua];
        $rilu = $dizhi[$lu];
        $guiren = $guiren;
		
		
		switch($dtg){
			case 0:$liushenz=array("",$liushen[0],$liushen[1],$liushen[2],$liushen[3],$liushen[4],$liushen[5]);break;
			case 1:$liushenz=array("",$liushen[0],$liushen[1],$liushen[2],$liushen[3],$liushen[4],$liushen[5]);break;
			case 2:$liushenz=array("",$liushen[5],$liushen[0],$liushen[1],$liushen[2],$liushen[3],$liushen[4]);break;
			case 3:$liushenz=array("",$liushen[5],$liushen[0],$liushen[1],$liushen[2],$liushen[3],$liushen[4]);break;
			case 4:$liushenz=array("",$liushen[4],$liushen[5],$liushen[0],$liushen[1],$liushen[2],$liushen[3]);break;
			case 5:$liushenz=array("",$liushen[3],$liushen[4],$liushen[5],$liushen[0],$liushen[1],$liushen[2]);break;
			case 6:$liushenz=array("",$liushen[2],$liushen[3],$liushen[4],$liushen[5],$liushen[0],$liushen[1]);break;
			case 7:$liushenz=array("",$liushen[2],$liushen[3],$liushen[4],$liushen[5],$liushen[0],$liushen[1]);break;
			case 8:$liushenz=array("",$liushen[1],$liushen[2],$liushen[3],$liushen[4],$liushen[5],$liushen[0]);break;
			case 9:$liushenz=array("",$liushen[1],$liushen[2],$liushen[3],$liushen[4],$liushen[5],$liushen[0]);break;
		}
		for($i=1;$i<=64;$i++)
		{
			if($bagua[$i][12]==$benggua) $j=$i;
			if($bagua[$i][12]==$biangua ) $k=$i;
		} 
			$fu1=$bagua[$j][8];
			$fu2=$bagua[$j][10];
		
		if($isbiangua==0)
		{
			
			if ( $bagua[$j][8]=="0" )
			{
				$tplhtml = "&nbsp;&nbsp;" . $bagua[$j][1]."<br>"."<B>六神 【本　　卦】</B><br>";
				for($l=1;$l<=6;$l++)
				{
					$tplhtml.="&nbsp;&nbsp;".$liushenz[$l]."　".$bagua[$j][$l+1]."<br>";
				}
			}
			else
			{
				$fu1=$bagua[$j][8]*1; 
				$fu2=$bagua[$j][10]*1;
				
				$top2html = "　　　　　　　　　".$bagua[$j][1]."<br>"."<B>六神 　伏　　神　【本　　卦】</B>"."<br>";
				
				for($l=1;$l<=6;$l++)
				{
					if ($fu1<>(7-$l) && $fu2<>(7-$l))
					{
						$top2html.= $liushenz[$l]."　　　　　　　".$bagua[$j][$l+1]."<br>";
					}
					if ($fu1==(7-$l))
					{
						$top2html.= $liushenz[$l]."　".$bagua[$j][9].$bagua[$j][$l+1]."<br>";
					}
					if ($fu2==(7-$l))
					{
						$top2html.= $liushenz[$l]."　".$bagua[$j][11].$bagua[$j][$l+1]."<br>";
					}
				}
			}
		}
		else 
		{
			if( $bagua[$j][8]=="0")
			{
				$tempguaming= "&nbsp;&nbsp;&nbsp;&nbsp;".$bagua[$j][1];
				while (strlen($tempguaming)<38)
				{
					$tempguaming=$tempguaming."　　";
				}
				
				$top3html = "<br>".$tempguaming." 　　　　".$bagua[$k][1].'<br>' ."<B>六神 【本　　卦】　　　　　　　　　【变　　卦】</B><br>";
				
				for( $l=1;$l<=6;$l++)
				{ 
					if($yao[7-$l]!=3 && $yao[7-$l]!=4 )
					{
						$top3html.= $liushenz[$l]."　".$bagua[$j][$l+1] ."　　　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==3  )
					{
						$top3html.= $liushenz[$l]."　".$bagua[$j][$l+1] ."O-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==4 )
					{
						$top3html.= $liushenz[$l]."　".$bagua[$j][$l+1] ."X-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
				}
			}else {
			$fu1=$bagua[$j][8]; 
			$fu2=$bagua[$j][10]; 
			$tempguaming= "　　　　　　　　　".$bagua[$j][1];  
			while (strlen($tempguaming)<25)
			{
				$tempguaming=$tempguaming+"　";
			}
			$top4html = "<br>".$tempguaming."　　　　　　".$bagua[$k][1]."<br>"."<B>六神 　伏　　神&nbsp;【本　　卦】　　　　　　　　　【变　　卦】</B><br>";
			
			for($l=1; $l<=6;$l++)
			{
				if($fu1!=(7-$l) && $fu2!=(7-$l) )
				{
					if ($yao[7-$l]!=3 && $yao[7-$l]!=4 )
					{
						$top4html.= $liushenz[$l]."　　　　　　　".$bagua[$j][$l+1] ."　　　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==3)
					{
						$top4html.= $liushenz[$l]."　　　　　　　".$bagua[$j][$l+1] ."O-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==4 )
					{
						$top4html.= $liushenz[$l]."　　　　　　　".$bagua[$j][$l+1] ."X-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
				}
				if ($fu1==(7-$l) )
				{
					if ($yao[7-$l]!=3 && $yao[7-$l]!=4 )
					{
						$top4html.=  $liushenz[$l]."　".$bagua[$j][9].$bagua[$j][$l+1] ."　　　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==3 )
					{
						$top4html.= $liushenz[$l]."　".$bagua[$j][9].$bagua[$j][$l+1] ."O-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==4 )
					{
						$top4html.= $liushenz[$l]."　".$bagua[$j][9].$bagua[$j][$l+1] ."X-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
				}
				if ($fu2==(7-$l) )
				{
					if($yao[7-$l]!=3 && $yao[7-$l]!=4 )
					{
						$top4html.= $liushenz[$l]."　".$bagua[$j][11].$bagua[$j][$l+1] ."　　　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==3 )
					{
						$top4html.= $liushenz[$l]."　".$bagua[$j][11].$bagua[$j][$l+1] ."O-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
					if ($yao[7-$l]==4 )
					{
						$top4html.= $liushenz[$l]."　".$bagua[$j][11].$bagua[$j][$l+1] ."X-> "."　".$baguabian[$k][$l+1].$liuqing[cls_paipan_function::liunum($baguabian[$j][1],$baguaganzhi[$k][$l+1])].$baguabiangz[$k][$l+1]."<br>";
					}
				}
			}
			}
		}
		
		$bengua=substr($bagua[$j][1],9,9);
		$guaci="";
		$guayao="";
		$path=PATH_DATA."/paipan/6y/guaci.txt";
		$fop=fopen($path,"r");
		$fn=file($path);
		$i=0;
		while(array_key_exists($i,$fn))
		{
			$str=$fn[$i];
			if (strpos($str,$bengua)>0)
			{
				$title=$str;
				break;
			}
			$i++;
		}
		$n=$i;
		for($j=1;$j<=6;$j++){
			$guaci.=$fn[$n+$j]."<br>";
			if(strpos($fn[$n+$j],"**")>0) break;  
		}
		$m=$n+$j;
		for($d=1;$d<=12;$d++)
		{
			$guayao.=$fn[$m+$d]."<br>";
		}
		fclose($fop);
		$last = "<br><font color=#FF0000><strong>".$title."</strong></font><br>".$guaci."<br>".$guayao."<br>";
		
		
		
		$data_Array = array('gongli'=>$gongli,'nonglistr'=>$nonglistr,'ygz'=>$ygz,'mgz'=>$mgz,'dgz'=>$dgz,'tgz'=>$tgz,'xunkong'=>$xunkong,'yuma'=>$yuma,'taohua'=>$taohua,'rilu'=>$rilu,'guiren'=>$guiren,'last'=>$last,'tplhtml'=>$tplhtml,'top2html'=>$top2html,'top3html'=>$top3html,'top4html'=>$top4html);
		return $data_Array;
		
	}
	
	/***
	 *六壬排盘
	 */
	function liuren(){
		include PATH_DATA.'/paipan/qmdj/jieqi.string.php';
		$name = req::item('name');
		if(!isset($name))$name="无名氏";
		$zhanshi=req::item('zhanshi');
		if(!isset($zhanshi))$zhanshi="无所事事";
		$y=req::item('y');$m=req::item('m');$d=req::item('d');$mins=req::item('min');$h=req::item('h');$birthyear=req::item('birthyear');$sex=req::item('sex');
		if(req::item('pai')==1)
		{
			$phn=1;
		}
		else
		{
			$phn=0;
		}
		$gsarrage=req::item('guishen');
		$scpf=req::item('scpf');
		$zhouye=req::item('zhouye');
		$Nyangli=$y."年".$m."月".$d."日".$h."时".$mins."分";
		
		
		
		if ($birthyear>$y)
		{
			die("<a href=p6r.php>时间输入有误，<b>点击重新开始</b></a>");
		}
		//年命
		$dys=($birthyear-1924)%12;
		$dys=($dys+12)%12;
		$tys=($birthyear-1924)%10;
		$tys=($tys+10)%10;
		
		$ygzs=$tg[$tys].$dz[$dys];
		$yxks=cls_qmdj::xunkong($ygzs,"no");
		$yxss=cls_qmdj::xunkong($ygzs,"yes");
		$suishu=$y-$birthyear+1;
		if ($sex==1)
		{
			$hntg=(2+$suishu-1)%10;//男起丙寅顺排
			$hndz=(2+$suishu-1)%12;
		}
		else
		{
			$hntg=(8-$suishu%10+1)%10;//女起壬申逆排
			$hndz=(8-$suishu%12+1)%12;
		}
		$hangn=$tg[$hntg].$dz[$hndz];
		
		$dates=$y."-".$m."-".$d;
		$Ytime=date("Y-m-d H;i",mktime($h,$mins,0,$m,$d,$y));
		if (checkdate($m,$d,$y)==false)
		{
			echo $dates."不是一个合法的日期,<a href=p6r.php><b>重新开始</b></a>";
		}
		$ygz=cls_qmdj::sizhu($y,$m,$d,$h,$mins,"nian");
		$mgz=cls_qmdj::sizhu($y,$m,$d,$h,$mins,"yue");
		$dgz=cls_qmdj::sizhu($y,$m,$d,$h,$mins,"ri");
		$tgz=cls_qmdj::sizhu($y,$m,$d,$h,$mins,"shi");
		$ntime=cls_paipan_function::getNongli($y,$m,$d,$h,"quan");
		$cyue=cls_paipan_function::getNongli($y,$m,$d,$h,"yue");
		$cri=cls_paipan_function::getNongli($y,$m,$d,$h,"ri");
		$cyear=cls_paipan_function::getNongli($y,$m,$d,$h,"nian");
		$nextjq=cls_qmdj::makejq($y,$m,$d,$h,$mins);
		$yxk=cls_qmdj::xunkong($ygz,"no");
		$yxs=cls_qmdj::xunkong($ygz,"yes");
		$mxk=cls_qmdj::xunkong($mgz,"no");
		$mxs=cls_qmdj::xunkong($mgz,"yes");
		$dxk=cls_qmdj::xunkong($dgz,"no");
		$dxs=cls_qmdj::xunkong($dgz,"yes");
		$hxk=cls_qmdj::xunkong($tgz,"no");
		$hxs=cls_qmdj::xunkong($tgz,"yes");
		$njq=substr(trim($nextjq),-6);
		//月将
		switch($njq)
		{
			case "雨水":$yuej="亥";break;
			case "惊蛰":$yuej="亥";break;
			case "春分":$yuej="戌"; break;
			case "清明":$yuej="戌"; break;
			case "谷雨":$yuej="酉";break;
			case "立夏":$yuej="酉";break;
			case "小满":$yuej="申";break;
			case "芒种":$yuej="申";break;
			case "夏至":$yuej="未"; break;
			case "小暑":$yuej="未"; break;
			case "大暑":$yuej="午";break;
			case "立秋":$yuej="午";break;
			case "处暑":$yuej="巳";break;
			case "白露":$yuej="巳";break;
			case "秋分":$yuej="辰";break;
			case "寒露":$yuej="辰";break;
			case "霜降":$yuej="卯";break;
			case "立冬":$yuej="卯";break;
			case "小雪":$yuej="寅";break;
			case "大雪":$yuej="寅";break;
			case "冬至":$yuej="丑";break;
			case "小寒":$yuej="丑";break;
			case "大寒":$yuej="子";break;
			case "立春":$yuej="子";break;
		}
		//'月将
		$yjorder=cls_qmdj::DzOrder($yuej)+1;
		$szorder=cls_qmdj::DzOrder($tgz)+1;
		$xd=$yjorder-$szorder;
		$szindex=(1-$szorder+12)%12;
		$szindex=($szindex+$yjorder-1)%12;
		for($i=0;$i<=11;$i++)
		{
			$iindex =($szindex+12+$i-1) % 12;
			$tianpan[$i]=$dz[$iindex];
		}
		$shizhi=substr($tgz,-3);
		//'四课
		switch (substr($dgz,0,3))
		{
			case  '甲': $Jk="寅";break;  
			case  '乙': $Jk="辰" ;break;
			case  '丙': $Jk="巳" ;break;
			case  '戊': $Jk="巳" ;break;
			case  '丁': $Jk="未";break;
			case  '己': $Jk="未";break;
			case  '庚': $Jk="申";break;    
			case  '辛': $Jk="戌";break; 
			case  '壬': $Jk="亥" ; break;
			case  '癸': $Jk="丑";break;
		}
		
		$jk1index=(cls_qmdj::DzOrder($Jk)+1) %12;
		$jk3index=(cls_qmdj::DzOrder($dgz)+1) % 12;
		$jk1=$tianpan[$jk1index];
		$jk2index=(cls_qmdj::DzOrder($jk1)+1)% 12;
		$jk2=$tianpan[$jk2index];
		$jk3=$tianpan[$jk3index];
		$jk4index=(cls_qmdj::DzOrder($jk3)+1)% 12;
		$jk4=$tianpan[$jk4index];
		
		//'贵神
		$szorders=cls_qmdj::DzOrder($tgz)+1;
		if ($zhouye==2)
		{ 
			if ($szorders>=4 && $szorders<10 )
			{
				$zhouye=1;
			}
			else
			{
				$zhouye=0;
			}
		}  //'默认的昼夜选择
		if($gsarrage==1)
		{
			switch (substr($dgz,0,3))
			{
				case  "甲":
				if ($zhouye==1 ){$startGs="丑";break;}
				else{$startGs="未";break;}
				case  "戊":
				if ($zhouye==1 ){$startGs="丑";break;}
				else{$startGs="未";break;}
				case  "庚":
				if ($zhouye==1 ){$startGs="丑";break;}
				else{$startGs="未";break;}
				case "乙" :
				if ($zhouye==1){$startGs="子";break;}
				else{$startGs="申";break;}
				case "己" :
				if ($zhouye==1){$startGs="子";break;}
				else{$startGs="申";break;}
				case  "丙":
				if ($zhouye==1){$startGs="亥";break;}
				else{$startGs="酉";break;}
				case  "丁":
				if ($zhouye==1){$startGs="亥";break;}
				else{$startGs="酉";break;}
				case  "壬":      
				if ($zhouye==1){$startGs="巳";break;}
				else{$startGs="亥";break;}
				case  "癸":      
				if ($zhouye==1){$startGs="巳";break;}
				else{$startGs="亥";break;}
				case  "辛":          
				if ($zhouye==1){$startGs="午";break;}
				else{$startGs="寅";break;}
			}
		}
		else
		{
			switch (substr($dgz,0,3))
			{
				case  "甲":
				if($zhouye==1){$startGs="未";break;}
				else{$startGs="丑";break;}
				case  "戊":
				if($zhouye==1){$startGs="丑";break;}
				else{$startGs="未";break;}
				case  "庚":
				if($zhouye==1){$startGs="丑";break;}
				else{$startGs="未";break;}
				case  "乙" :      
				if($zhouye==1){$startGs="申";break;}
				else{$startGs="子";break;}
				case  "己":      
				if($zhouye==1){$startGs="子";break;}
				else{$startGs="申";break;}
				case  "丙" :
				if($zhouye==1){$startGs="酉";break;}
				else{$startGs="亥";break;}
				case  "丁":
				if($zhouye==1){$startGs="亥";break;}
				else{$startGs="酉";break;}
				case  "壬":
				if($zhouye==1){$startGs="卯";break;}
				else{$startGs="巳";break;}
				case  "癸":
				if($zhouye==1){$startGs="巳";break;}
				else{$startGs="卯";break;}
				case  "辛": 
				if($zhouye==1){$startGs="寅";break;}
				else{$startGs="午";break;}
			}
		}
		
		for($i=0 ;$i<=11;$i++)  //'找出在天盘的编号
		{
			if ($tianpan[$i]==$startGs)
			{
				break;
			}
		}
		//'确定顺序
		if($i>=0 && $i<=5 )
		{
			$orders=1;
		}
		else
		{
			$orders=0;
		}
		if ($orders==1)
		{
			for($j=0;$j<=11;$j++)
			{ 
				switch($j)
				{
					case 0 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],0,3);break;
					case  4 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],0,3);break;
					case  9:
					$guishens[($i+$j)% 12]=substr($guishen[$j],0,3);break;
					case 1:
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break;
					case 2 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break; 
					case  3 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break; 
					case 5 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break; 
					case  6 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break; 
					case  7 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break; 
					case  8 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break; 
					case 10 :
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break;
					case 11:
					$guishens[($i+$j)% 12]=substr($guishen[$j],-3);break;    
				}
			}
		} 
		else
		{
			for($j=0 ;$j<=11;	$j++)
			{
				switch($j)
				{
					case 0 :   
					$guishens[($i-$j+12)%12]=substr($guishen[$j],0,3);break;
					case 4 :   
					$guishens[($i-$j+12)%12]=substr($guishen[$j],0,3);break;
					case 9:   
					$guishens[($i-$j+12)%12]=substr($guishen[$j],0,3);break;
					case 1 :
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case  2 :
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case  3 :
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case  5:
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case  6 :
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case  7 :
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case  8:
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case  10 :
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break; 
					case 11:
					$guishens[($i-$j+12)% 12]=substr($guishen[$j],-3);break;  
				}
			}
		}
		
		//'四课贵神
		$gs1=$guishens[$jk1index];
		$gs2=$guishens[$jk2index];
		$gs3=$guishens[$jk3index];
		$gs4=$guishens[$jk4index];
		
		//'三传
		$schang=cls_qmdj::Tgorder($dgz)*6+round((cls_qmdj::DzOrder($dgz)+1)/2);
		$scorder=($szorder-$yjorder+13)%12;
		if ($scorder==0 )
		{
			$scorder=12;
		}
		$path=PATH_DATA."/paipan/qmdj/sanchuan.txt";
		$fpn=fopen($path,"r");
		$fn=file($path);
		//for($i=0 ;$i<=$schang-1;$i++)
		//{
		//next($fn);
		// }
		$str=$fn[$schang-1];
		
		$ScStr=explode(",",$str);
		$sanchuan=trim($ScStr[$scorder]);
		
		//
		
		
		$chuan1=substr($sanchuan,1,3);
		$chuan2=substr($sanchuan,4,3);
		$chuan3=substr($sanchuan,7,3);
		for($i= 0;$i<=11;$i++)
		{
		if ($tianpan[$i]==$chuan1)
		{
		$chuan1index=$i;
		}
		if ($tianpan[$i]==$chuan2)
		{
		$chuan2index=$i;
		}
		if ($tianpan[$i]==$chuan3 )
		{
		$chuan3index=$i;
		}
		}
		$scgs1=$guishens[$chuan1index];
		$scgs2=$guishens[$chuan2index];
		$scgs3=$guishens[$chuan3index];
		
		//'三传天干，和起时辰法相同
		
		$c1tgindex=cls_qmdj::DzOrder($chuan1);
		$c2tgindex=cls_qmdj::DzOrder($chuan2);
		$c3tgindex=cls_qmdj::DzOrder($chuan3);
		$riganorder=cls_qmdj::Tgorder($dgz);
		if ($riganorder>4 )
		{
			$ryindex=($riganorder-4)*2-2;
		}
		else
		{
			$ryindex=($riganorder+1)*2-2;
		}
		if ($scpf==1)// '时旬遁干【排法
		{
			$c1tgindexl=($c1tgindex+$ryindex)%10;
			$c2tgindexl=($c2tgindex+$ryindex)% 10;
			$c3tgindexl=($c3tgindex+$ryindex)% 10;
			$tg1=$tg[$c1tgindexl];
			$tg2=$tg[$c2tgindexl];
			$tg3=$tg[$c3tgindexl];
		}
		else
		{
			//'日旬遁干
			$rtgindex=cls_qmdj::Tgorder($dxs);
			$rdzindex=cls_qmdj::DzOrder($dxs);
			$c1tgindex=($c1tgindex-$rdzindex+12)% 12;
			$c2tgindex=($c2tgindex-$rdzindex+12)% 12;
			$c3tgindex=($c3tgindex-$rdzindex+12)% 12;
			
			if ($c1tgindex<10 )
			{
				$tg1=$tg[$c1tgindex];
			}
			else
			{
				$tg1="&nbsp&nbsp";
			}
			if($c2tgindex<10 )
			{
				$tg2=$tg[$c2tgindex];
			}
			else
			{
				$tg2="&nbsp&nbsp";
			}
			if($c3tgindex<10)
			{
				$tg3=$tg[$c3tgindex];
			}
			else
			{
				$tg3="&nbsp&nbsp";
			}
		}
		
		//六亲
		$rtgorder=cls_qmdj::Tgorder($dgz)+1;
		$rtg=round(($rtgorder)/2+0.01);
		
		switch($chuan1)
		{
			case  "寅":$b1=1 ;break;
			case  "卯":$b1=1 ;break;
			case  "巳":$b1=2 ;break;
			case  "午":$b1=2 ;break;
			case  "辰":$b1=3;break;
			case  "戌":$b1=3;break;
			case  "丑":$b1=3;break; 
			case  "未":$b1=3;break;    
			case  "申":$b1=4;break;
			case  "酉":$b1=4;break;
			case  "亥":$b1=5;break;
			case  "子":$b1=5;break;
		}
		
		switch($chuan2)
		{
			case "寅":$b2=1 ;break;
			case "卯":$b2=1 ;break;
			case "巳":$b2=2 ;break;
			case "午":$b2=2 ;break;
			case "辰":$b2=3 ;break;
			case "戌":$b2=3 ;break; 
			case "丑":$b2=3 ;break; 
			case "未":$b2=3 ;break;  
			case "申":$b2=4;break; 
			case "酉":$b2=4;break; 
			case "亥":$b2=5;break;
			case "子":$b2=5;break;
		}
		
		switch($chuan3)
		{
			case "寅":$b3=1 ;break;
			case "卯":$b3=1 ;break;
			case "巳":$b3=2 ;break;
			case "午":$b3=2 ;break;
			case "辰":$b3=3 ;break;
			case "戌":$b3=3 ;break; 
			case "丑":$b3=3 ;break; 
			case "未":$b3=3 ;break;  
			case "申":$b3=4;break; 
			case "酉":$b3=4;break; 
			case "亥":$b3=5;break;
			case "子":$b3=5;break;
		}
		
		$LqIndex1=($rtg-$b1+5)% 5;
		$LqIndex2=($rtg-$b2+5)% 5;
		$LqIndex3=($rtg-$b3+5)% 5;
		$lq1=$liuqin[$LqIndex1];
		$lq2=$liuqin[$LqIndex2];
		$lq3=$liuqin[$LqIndex3];
		
		$news_string = '&nbsp; '.$gs4.'&nbsp;&nbsp;'.$gs3.'&nbsp;&nbsp;'.$gs2.'&nbsp;&nbsp;'.$gs1.'<br>'.'&nbsp;'.$jk4.'&nbsp;&nbsp;'.$jk3.'&nbsp;&nbsp;'.$jk2.'&nbsp;&nbsp;'.$jk1.'<br>&nbsp;'.$jk3.'&nbsp;&nbsp;'.substr($dgz,-3).'&nbsp;&nbsp;'.$jk1.'&nbsp;&nbsp;'.substr($dgz,0,3);
		
		$news1 = $lq1.'&nbsp;&nbsp;'.$tg1.'&nbsp;&nbsp;'.$chuan1.'.&nbsp;&nbsp;'.$scgs1;
		
		$news2 = $lq2.'&nbsp;&nbsp;'.$tg2.'&nbsp;&nbsp;'.$chuan2.'.&nbsp;&nbsp;'.$scgs2;
		
		$news3 = $lq3.'&nbsp;&nbsp;'.$tg3.'&nbsp;&nbsp;'.$chuan3.'.&nbsp;&nbsp;'.$scgs3;
		
		$data_Array = array('Nyangli'=>$Nyangli,'ntime'=>$ntime,'nextjq'=>$nextjq,'ygz'=>$ygz,'mgz'=>$mgz,'dgz'=>$dgz,'tgz'=>$tgz,'yuej'=>$yuej,'yxk'=>$yxk,'mxk'=>$mxk,'dxk'=>$dxk,'hxk'=>$hxk,'phn'=>$phn,'ygzs'=>$ygzs,'hangn'=>$hangn,'guishens'=>$guishens,'tianpan'=>$tianpan,'news_string'=>$news_string,'news1'=>$news1,'news2'=>$news2,'news3'=>$news3);
		
		return $data_Array;
	}
	
	
	/***
	 *紫薇排盘
	 */

	function ziwei(){
		
		$segong=array("兄弟宫","夫妻宫","子女宫","财帛宫","疾厄宫（天使）","迁移宫","奴仆宫(天伤)","官禄宫","田宅宫","福德宫","父母宫");
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
		
		$name=req::item('name');
		$sex=req::item('sex');
		$DateType=req::item('DateType');
		$y=req::item('year');
		$m=req::item('month');
		$d=req::item('date');
		$h=req::item('hour');
		$hIndex=ceil($h/2)%12; 
		$minutes=req::item('minute');
		$runyue=req::item('other');
		$runfen=req::item('runfen');
		
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
		$minggong[$minggindex]="命宫";
		$shengong[$Shengindex]="(身宫)";
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
		$zwxing[$jindex]="<li><font color=#ae00ae>紫薇</font></li>";
		$zwxing[$tianjiindex]="<li><font color=#ae00ae>天机</font></li>";
		$zwxing[$taiyangindex]="<li><font color=#ae00ae>太阳</font></li>";
		$zwxing[$wuquindex]="<li><font color=#ae00ae>武曲</font></li>";
		$zwxing[$tiantongindex]="<li><font color=#ae00ae>天同</font></li>";
		$zwxing[$lianzhenindex]="<li><font color=#ae00ae>廉贞</font></li>";
		$tfxing[$TfIndex]="<li><font color=#ae00ae>天府</font></li>";
		$tfxing[$taiyinindex]="<li><font color=#ae00ae>太阴</font></li>";
		$tfxing[$tanlangindex]="<li><font color=#ae00ae>贪狼</font></li>";
		$tfxing[$jumenindex]="<li><font color=#ae00ae>巨门</font></li>";
		$tfxing[$tianxiangindex]="<li><font color=#ae00ae>天相</font></li>";
		$tfxing[$tianliangindex]="<li><font color=#ae00ae>天梁</font></li>";
		$tfxing[($TfIndex+6)% 12]="<li><font color=#ae00ae>七杀</font></li>";
		$tfxing[$pojunindex]="<li><font color=#ae00ae>破军</font></li>";
		$wenchang[$wencindex]="<li><font color=#ae00ae>文昌</font></li>";
		$wenchang[$wenqindex]="<li><font color=#007500>文曲</font></li>";
		switch($ytg)
		{
			case "乙":  $zwxing[$jindex]="<li><font color=#ae00ae>紫薇科</font></li>";
			$zwxing[$tianjiindex]="<li><font color=#ae00ae>天机禄</font></li>";
			$tfxing[$tianliangindex]="<li><font color=#ae00ae>天梁权</font></li>";
			$tfxing[$taiyinindex]="<li><font color=#ae00ae>太阴忌</font></li>";
			break;
			case "壬":  $tfxing[$tianliangindex]="<li><font color=#ae00ae>天梁禄</font></li>";
			$zwxing[$jindex]="<li><font color=#ae00ae>紫薇权</font></li>";
			$zwxing[$wuquindex] ="<li><font color=#ae00ae>武曲忌</font></li>";
			break;
			case "丙": $zwxing[$tianjiindex]="<li><font color=#ae00ae>天机权</font></li>";
			$zwxing[$tiantongindex]="<li><font color=#ae00ae>天同禄</font></li>";
			$zwxing[$lianzhenindex]="<li><font color=#ae00ae>廉贞忌</font></li>";
			$wenchang[$wencindex]="<li><font color=#ae00ae>文昌科</font></li>";
			break;
			case "丁": $zwxing[$tianjiindex]="<li><font color=#ae00ae>天机科</font></li>";
			$zwxing[$tiantongindex]="<li><font color=#ae00ae>天同权</font></li>";
			$tfxing[$taiyinindex]="<li><font color=#ae00ae>太阴禄</font></li>";
			$tfxing[$jumenindex]="<li><font color=#ae00ae>巨门忌</font></li>";
			break;
			case "戊": $zwxing[$tianjiindex]="<li><font color=#ae00ae>天机忌</font></li>";
			$tfxing[$taiyinindex]="<li><font color=#ae00ae>太阴权</font></li>";
			$tfxing[$tanlangindex]= "<li><font color=#ae00ae>贪狼禄</font></li>";
			break;
			case "甲": $zwxing[$taiyangindex]="<li><font color=#ae00ae>太阳忌</font></li>";
			$zwxing[$wuquindex] ="<li><font color=#ae00ae>武曲科</font></li>";
			$zwxing[$lianzhenindex]="<li><font color=#ae00ae>廉贞禄</font></li>";
			$tfxing[$pojunindex]="<li><font color=#ae00ae>破军权</font></li>";
			break;
			case "庚": $zwxing[$taiyangindex]="<li><font color=#ae00ae>太阳禄</font></li>";
			$zwxing[$wuquindex] ="<li><font color=#ae00ae>武曲权</font></li>";
			$tfxing[$taiyinindex]="<li><font color=#ae00ae>太阴科</font></li>";
			$zwxing[$tiantongindex]="<li><font color=#ae00ae>天同忌</font></li>";
			break;
			case "辛": $zwxing[$taiyangindex]="<li><font color=#ae00ae>太阳权</font></li>";
			$tfxing[$jumenindex]="<li><font color=#ae00ae>巨门禄</font></li>";
			$wenchang[$wencindex]="<li><font color=#ae00ae>文昌忌</font></li>";
			$wenchang[$wenqindex]="<li><font color=#007500>文曲科</font></li>";
			break;
			case "己": $zwxing[$wuquindex] ="<li><font color=#ae00ae>武曲禄</font></li>";
			$tfxing[$tanlangindex]= "<li><font color=#ae00ae>贪狼权</font></li>";
			$tfxing[$tianliangindex]="<li><font color=#ae00ae>天梁科</font></li>";
			$wenchang[$wenqindex]="<li><font color=#007500>文曲忌</font></li>";
			break;
			
			case "癸": $tfxing[$taiyinindex]="<li><font color=#ae00ae>太阴科</font></li>";
			$tfxing[$tanlangindex]= "<li><font color=#ae00ae>贪狼忌</font></li>";
			$tfxing[$jumenindex]="<li><font color=#ae00ae>巨门权</font></li>";
			$tfxing[$pojunindex]="<li><font color=#ae00ae>破军禄</font></li>";
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
			$wenchang[$apindex] .="<li><font color=#007500>台铺</font></li>";
		}else{
			$wenchang[$apindex] ="<li><font color=#007500>台铺</font></li>";
		}
		if(isset($wenchang[$hxindex])){
			$wenchang[$hxindex] .="<li><font color=#007500>封诰</font></li>";
		}else{
			$wenchang[$hxindex] ="<li><font color=#007500>封诰</font></li>";
		}
		if(isset($wenchang[$djindex])){ 
			$wenchang[$djindex].="<li><font color=#007500>地劫</font></li>";
		}else{
			$wenchang[$djindex]="<li><font color=#007500>地劫</font></li>";
		}
		if (isset($wenchang[$tkindex])){ 
			$wenchang[$tkindex].="<li><font color=#007500>天空</li>";
		}else{
			$wenchang[$tkindex]="<li><font color=#007500>天空</li>";
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
		$huoling[$hgindex]="<li><font color=#007500>火星</font></li>";
		$huoling[$lgindex]="<li><font color=#007500>铃星</font></li>";
		
		//'起月系星星
		$zpindex=(3+$m)% 12;//  '左辅
		$youbiindex=(23-$m)% 12;// '右弼
		$tianyindex=$m% 12;
		$tianxindex=(8+$m)% 12;
		if(!isset($huoling[$zpindex])){
			$huoling[$zpindex] ="<li><font color=#007500>左辅</font></li>";
			if($ytg=="壬" ){$huoling[$zpindex] ="<li><font color=#007500>左辅科</font></li>";}
		}else{
			if($ytg=="壬" )
			{
				$huoling[$zpindex] .="<li><font color=#007500>左辅科</font></li>";
			}else{
				$huoling[$zpindex].="<li><font color=#007500>左辅</font></li>";
			}
		}
		
		if(!isset($huoling[$youbiindex])){
			$huoling[$youbiindex]="<li><font color=#007500>右弼</font></li>";
			if($ytg=="戊" ){
				$huoling[$youbiindex] ="<li><font color=#007500>右弼科</font></li>";
			}
		}else{
			if($ytg=="戊" ){
				$huoling[$youbiindex] .="<li><font color=#007500>右弼科</font></li>";
			}else{
				$huoling[$youbiindex] .="<li><font color=#007500>右弼</font></li>";
			}
		}
		
		if(isset($huoling[$tianyindex])){
			$huoling[$tianyindex] .="<li><font color=#007500>天姚</font></li>";
		}else{
			$huoling[$tianyindex]="<li><font color=#007500>天姚</font></li>";
		}
		if (isset($huoling[$tianxindex])){
			$huoling[$tianxindex] .="<li><font color=#007500>天刑</font></li>";
		}else{
			$huoling[$tianxindex]="<li><font color=#007500>天刑</font></li>";
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
			$huoling[$tianwindex] .="<li><font color=#007500>天巫</font></li>";
		}else{
			$huoling[$tianwindex]="<li><font color=#007500>天巫</font></li>";
		}
		
		$jieshenindex=(22-$ydz)%12;
		
		$tianyuearr=array(0,10,5,4,2,7,3,11,7,2,6,10,2);
		$tianyueindex=$tianyuearr[$m];
		$yinshaarr=array(0,2,0,10,8,6,4,2,0,10,8,6,4);
		$yinshaindex=$yinshaarr[$m];
		if(isset($huoling[$jieshenindex])){
			$huoling[$jieshenindex].="<li><font color=#8c8c00>解神</font></li>";
		}else{
			$huoling[$jieshenindex]="<li><font color=#8c8c00>解神</font></li>";
		}
		if(isset($huoling[$tianyueindex])){
			switch($ytg)
			{
				case "乙": $huoling[$tianyueindex].="<li><font color=#8c8c00>天月忌</font></li>";break;
				case "戊": $huoling[$tianyueindex].="<li><font color=#8c8c00>天月权</font></li>";break;
				default:$huoling[$tianyueindex].="<li><font color=#8c8c00>天月</font></li>";
			}
		}else{
			switch($ytg)
			{
				case "乙": $huoling[$tianyueindex]="<li><font color=#8c8c00>天月忌</font></li>";break;
				case "戊": $huoling[$tianyueindex]="<li><font color=#8c8c00>天月权</font></li>";break;
				default:$huoling[$tianyueindex]="<li><font color=#8c8c00>天月</font></li>";
			}
		}
		
		if(isset($huoling[$yinshaindex])){
			$huoling[$yinshaindex].="<li><font color=#8c8c00>阴煞</font></li>";
		}else{
			$huoling[$yinshaindex]="<li><font color=#8c8c00>阴煞</font></li>";
		}
		// '日系星三台从左辅上起初一，顺行至本生日安之
		// '八座从右弼上起初一，逆行至本生日安之
		$santindex=($zpindex+$d-1)% 12;
		$bazuoindex=($youbiindex-(($d-1) % 12)+12)% 12;
		if(isset($wenchang[$santindex])){
			$wenchang[$santindex].="<li><font color=#007500>三台</font></li>";
		}else{
			$wenchang[$santindex]="<li><font color=#007500>三台</font></li>";
		}
		if(isset($wenchang[$bazuoindex])){
			$wenchang[$bazuoindex].="<li><font color=#007500>八座</font></li>";
		}else{
			$wenchang[$bazuoindex]="<li><font color=#007500>八座</font></li>";
		}
		if(isset($wenchang[$engindex])){
			$wenchang[$engindex].="<li><font color=#007500>恩光</font></li>";
		}else{
			$wenchang[$engindex]="<li><font color=#007500>恩光</font></li>";
		}
		if(isset($wenchang[$tianguiindex])){
			$wenchang[$tianguiindex].="<li><font color=#007500>天贵</font></li>";
		}else{
			$wenchang[$tianguiindex]="<li><font color=#007500>天贵</font></li>";
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
		$mingzhu="<font color=#8c8c00>禄存</font>";
		if(isset($zwxing[$lcindex])){
			$zwxing[$lcindex].="<li>".$mingzhu."</li>";
		}else{
			$zwxing[$lcindex]="<li>".$mingzhu."</li>";
		}
		if(isset($zwxing[$tuoluoindex])){
			$zwxing[$tuoluoindex].="<li><font color=#ae00ae>陀罗</font></li>";
		}else{
			$zwxing[$tuoluoindex]="<li><font color=#8c8c00>陀罗</font></li>";
		}
		if(isset($zwxing[$qingyindex])){
			$zwxing[$qingyindex].="<li><font color=#8c8c00>擎羊</font></li>";
		}else{
			$zwxing[$qingyindex]="<li><font color=#8c8c00>擎羊</font></li>";
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
			$zwxing[$tiankuiindex].="<li><font color=#8c8c00>天魁</font></li>";
		}else{
			$zwxing[$tiankuiindex]="<li><font color=#8c8c00>天魁</font></li>";
		}
		if(isset($zwxing[$tianjiindex])){
			$zwxing[$tianjiindex].="<li><font color=#8c8c00>天钺</font></li>";
		}else{
			$zwxing[$tianjiindex]="<li><font color=#8c8c00>天钺</font></li>";
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
			$zwxing[$tianfuindex].="<li><font color=#8c8c00>天福</font></li>";
		}else{
			$zwxing[$tianfuindex]="<li><font color=#8c8c00>天福</font></li>";
		}
		if(isset($zwxing[$tianguanindex])){
			$zwxing[$tianguanindex].="<li><font color=#8c8c00>天官</font></li>";
		}else{
			$zwxing[$tianguanindex]="<li><font color=#8c8c00>天官</font></li>";
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
			$huoling[$tianmindex] .="<li><font color=#007500>天马</font></li>";
		}else{
			$huoling[$tianmindex]="<li><font color=#007500>天马</font></li>";
		}
		$boshis[$tianxuindex] .=" <font color=#8c8c00>天虚</font>";
		$boshis[$tiankuindex] .=" <font color=#8c8c00>天哭</font>";
		$boshis[$longciindex] .=" <font color=#8c8c00>龙池</font>";
		$boshis[$fenggeindex] .=" <font color=#8c8c00>凤阁</font>";
		$boshis[$hongluanindex] .=" <font color=#8c8c00>红鸾</font>";
		$boshis[$tianxiindex] .=" <font color=#8c8c00>天喜</font>";
		
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
		
		$boshis[$guchenindex] .=" <font color=#8c8c00>孤辰</font>";
		$boshis[$guaxiuindex] .=" <font color=#8c8c00>寡宿</font>";
		$beilian=array(8,9,10,5,6,7,2,3,4,11,0,1);
		$beilianindex=$beilian[$ydz];
		if($ydz % 3==0) $poshuiindex=5;
		if($ydz % 3==2) $poshuiindex=9;
		if($ydz % 3==1) $poshuiindex=1;
		
		$boshis[$poshuiindex] .=" <font color=#8c8c00>破碎</font>";
		$boshis[$beilianindex] .=" <font color=#8c8c00>蜚廉</font>";
		$tiancaiindex=($minggindex+$ydz)% 12;
		$tianshouindex=($Shengindex+$ydz)% 12;
		$boshis[$tiancaiindex] .=" <font color=#8c8c00>天才</font>";
		$boshis[$tianshouindex] .=" <font color=#8c8c00>天寿</font>";
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
			$wenchang[$jieluindex] .="<li><font color=#8c8c00>截空</font></li>";
		}else{
			$wenchang[$jieluindex]="<li><font color=#8c8c00>截空</font></li>";
		}
		if(isset($wenchang[$kongmangindex])){
			$wenchang[$kongmangindex] .="<li><font color=#8c8c00>空亡</font></li>";
		}else{
			$wenchang[$kongmangindex]="<li><font color=#8c8c00>空亡</font></li>";
		}
		/*
		$xunzhong=xunkong($ygz);	
		$xunzhongindex=Dzorder(substr($xunzhong,0,2));
		$kongwangindex=Dzorder(substr($xunzhong,-2));
		if(isset($wenchang[$xunzhongindex])){
		$wenchang[$xunzhongindex] .="<li><font color=#8c8c00>旬中</font></li>";
		}else{
		$wenchang[$xunzhongindex]="<li><font color=#8c8c00>旬中</font></li>";
		}
		if(isset($wenchang[$kongwangindex])){
		$wenchang[$kongwangindex] .="<li><font color=#8c8c00>空亡</font></li>";
		}else{
		$wenchang[$kongwangindex]="<li><font color=#8c8c00>空亡</font></li>";
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
				$minggong[$i]="<font color=blue><b>".$minggong[$i]."</b></font>";
			}
			if(!isset($shengong[$i])){
				$shengong[$i]="";
			}else{
				$shengong[$i]="<font color=blue><b>".$shengong[$i]."</b></font>";
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
		for($i=0;$i<=11;$i++){
			$pan[$i]="<div class=zw_pan><ul>".$zwxing[$i].$tfxing[$i].$wenchang[$i].$huoling[$i]."</ul>";
			$pan[$i].="<div class=sm_clear></div>".$minggong[$i].$shengong[$i]."<br>".$boshis[$i]."<br>".$dptg[$i]."<font color=red>".$dz[$i]."</font><br>".$lyxing[$i]."</div>";
		}
		
		 $quanzao = $ygz."　　".$mgz."　　".$dgz."　　".$tgz;
		 
		 $nayinarr = cls_paipan::getNayin($ygz)."　".cls_paipan::getNayin($mgz)."　".cls_paipan::getNayin($dgz)."　".cls_paipan::getNayin($tgz);
		 
		$data_Array = array('pan'=>$pan,'dz'=>$dz,'doujunindex'=>$doujunindex,'dz_a1'=>$dz[$doujunindex],'zidouindex'=>$zidouindex,'dz_a2'=>$dz[$zidouindex],'mingzhum'=>$mingzhum,'shenzhum'=>$shenzhum,'wxju'=>$wxju,'yangdate'=>$yangdate,'NongLi'=>$NongLi,'quanzao'=>$quanzao,'nayinarr'=>$nayinarr);
		
		return $data_Array;
	}
	

	//public static $shanarr=array("丑","未","辰","戌","乙","辛","丁","癸","艮","坤","寅","申","子","午");
	/**
	 *悬空飞星
	 */
    function xuankongfeixing($gm,$dy,$sx,$pljsx,$nian,$sex,$y,$mont)
	{
		$sxid=substr($sx,0,(strlen($sx)-12));
		$sxname=substr($sx,-12);
		$shan=substr($sxname,0,3);
		$xiang=substr($sxname,6,3);
		$tixing=0;
		
		$shanarr=array("丑","未","辰","戌","乙","辛","丁","癸","艮","坤","寅","申","子","午");
		$sx1=array("壬","子","癸","丑","艮","寅","甲","卯","乙","辰","巽","巳","丙","午","丁","未","坤","申","庚","酉","辛","戌","乾","亥");
		$jiu=array(1,8,3,4,9,2,7,6);
		
		if(array_search($shan,$shanarr)) $tixing=1;
		$bgid=floor($sxid/3);
		$bgyu=$sxid %3;//'获得所在元龙。
		$bgidx=($jiu[$bgid]+4)%9;
		$bgidy=9-$bgidx;
		
		$dayunarr=array("一运","二运","三运","四运","五运","六运","七运","八运","九运");
		$dayun=$dayunarr[$dy];
		
		$daxie=array("一","二","三","四","五","六","七","八","九");
		for($i=0;$i<=8;$i++)
		{
			$ypindex=($i+$dy)%9;
			$yp[$i]=$daxie[$ypindex];
			$yporder[$i]=$ypindex+1;
		}
		//运盘
		$sp1=$yporder[$bgidx];
		$xp1=$yporder[$bgidy];
		for($i=0;$i<=7;$i++)
		{
			if($jiu[$i]==$sp1){
				$kki=$i;
				break;
			}
		}  
		for($i=0;$i<=7;$i++)
		{
			if($jiu[$i]==$xp1){
				$kkj=$i;
				break;
			}
		}  
		if($sp1==5 ) $kki=$dy;
		if($xp1==5 ) $kkj=$dy;
		
		if($gm=="挨星替卦")
		{
			$shangx=$kki*3+$bgyu;
			$xiangx=$kkj*3+$bgyu;
			$shan=$sx1[$shangx];
			$xiang=$sx1[$xiangx];
			if($sp1<>5){
				if($shan=="子"||$shan=="癸"||$shan=="甲"||$shan=="申") $dyys=1;
				if($shan=="坤"||$shan=="壬"||$shan=="乙"||$shan=="卯"||$shan=="未") $dyys=2;
				if($shan=="戌"||$shan=="乾"||$shan=="亥"||$shan=="辰"||$shan=="巽"||$shan=="巳") $dyys=6;
				if($shan=="艮"||$shan=="丙"||$shan=="辛"||$shan=="酉"||$shan=="丑")  $dyys=7;
				if($shan=="寅"||$shan=="午"||$shan=="庚"||$shan=="丁") $dyys=9;
			}
			if($xp1<>5)
			{
				if($xiang=="子"||$xiang=="癸"||$xiang=="甲"||$xiang=="申") $dyyx=1;
				if($xiang=="坤"||$xiang=="壬"||$xiang=="乙"||$xiang=="卯"||$xiang=="未") $dyyx=2;
				if($xiang=="戌"||$xiang=="乾"||$xiang=="亥"||$xiang=="辰"||$xiang=="巽"||$xiang=="巳") $dyyx=6;
				if($xiang=="艮"||$xiang=="丙"||$xiang=="辛"||$xiang=="酉"||$xiang=="丑")  $dyyx=7;
				if($xiang=="寅"||$xiang=="午"||$xiang=="庚"||$xiang=="丁") $dyyx=9;
			}
		}else{
			$dyy=$dy;
		}
		if($gm=="挨星替卦")
		{
			$sp[0]=$dyys;
			$xp[0]=$dyyx;
		}else{
			$sp[0]=$yporder[$bgidx];
			$xp[0]=$yporder[$bgidy];
		}//'获得中宫山向盘
		if($sp1==5) $sp[0]=5;
		if($xp1==5) $xp[0]=5;
		
		$sxids=$kki*3+$bgyu;
		$sxidx=$kkj*3+$bgyu;//'山向得到序号
		
		if(floor(($sxids-1)/3)%2==1){
			$orderx=true;
		}else{
			$orderx=false;
		}   // '确定阴阳
		if($sxids==0) $orderx=true;
		if(floor(($sxidx-1)/3)%2==1){
			$ordery=true;
		}else{
			$ordery=false;
		}//    '确定阴阳
		if($sxidx==0) $ordery=true;//'壬为阳
		
		if($orderx==true)
		{
			for($i=1;$i<=8;$i++)
			{
				$sp[$i]=($sp[0]+$i)%9;
				if($sp[$i]==0) $sp[$i]=9;
			}
		}else{
			for($i=1;$i<=8;$i++)
			{
				$sp[$i]=($sp[0]-$i+9)%9;
				if($sp[$i]==0) $sp[$i]=9;
			}
		}
		
		if($ordery==true)
		{
			for($i=1;$i<=8;$i++)
			{
				$xp[$i]=($xp[0]+$i)%9;
				if($xp[$i]==0) $xp[$i]=9;
			}
		}else{
			for($i=1;$i<=8;$i++)
			{
				$xp[$i]=($xp[0]-$i+9)%9;
				if($xp[$i]==0) $xp[$i]=9;
			}
		}
		
		$xkfx_Array = array('tixing'=>$tixing,'shan'=>$shan,'sxname'=>$sxname,'dayun'=>$dayun,'gm'=>$gm,'sp'=>$sp,'xp'=>$xp,'yp'=>$yp);
		return $xkfx_Array;
	}
	
	
    
} 