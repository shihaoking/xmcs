<?php
/**
 * 黄道吉日查询(黄历)
 */
class cls_xuankongfeixing
{
	/**
	*排龙诀
	*/
	
    public function plj($shanx)
	{
		$sx=$shanx;
		$sxid=substr($sx,0,(strlen($sx)-12));
		$sxname=substr($sx,-12);
		$shan=substr($sxname,0,3);
		$pojun=array("破军","<font color=red>右弼</font>","廉贞","破军","<font color=red>武曲</font>","<font color=red>贪狼</font>","破军","<font color=red>左辅</font>","文曲","破军","<font color=red>巨门</font>","禄存");
		$sxid%2==1?$tag=true:$tag=false;
		$sxid=$sxid+1;
		$starts=round($sxid/2);
		if($starts==0) $starts=1;
		if($tag==true){
			for($i=0;$i<=11;$i++)
			{
				$sk[($starts+$i-1)%12]=$pojun[$i];
			}
		}else{
			for($i=0;$i<=11;$i++)
			{
				$sk[($starts-$i+12-1)%12]=$pojun[$i];
			}
		}        
		$plj .="<table width=600 align=center><tr><td align=center>水口在：".$shan."</td></tr><tr>";
		$plj .="<td height=156 align=center valign=top>┌──┬──┬──┬──┐<br>";
		$plj .="│".$sk[5]."│".$sk[6]."│".$sk[7]."│".$sk[8]."│<br>";
		$plj .="│巳丙│午丁│未坤│申庚│<br>";
		$plj .="├──┼──┼──┼──┤ <br>";
		$plj .="│".$sk[4]."│&nbsp;&nbsp;&nbsp;&nbsp;│&nbsp;&nbsp;&nbsp;&nbsp;│".$sk[9]."│<br>";
		$plj .="│辰巽│ &nbsp;&nbsp; │ &nbsp;&nbsp; │酉辛│<br>";
		$plj .="├──┼──┼──┼──┤ <br>";
		$plj .="│".$sk[3]."│&nbsp;&nbsp;&nbsp;&nbsp;│&nbsp;&nbsp;&nbsp;&nbsp;│".$sk[10]."│<br>";
		$plj .="│卯乙│ &nbsp;&nbsp; │ &nbsp;&nbsp; │戌乾│<br>";
		$plj .="├──┼──┼──┼──┤ <br>";
		$plj .="│".$sk[2]."│".$sk[1]."│".$sk[0]."│".$sk[11]."│<br>";
		$plj .="      │寅甲│丑艮│子癸│亥壬│<br>";
		$plj .="└──┴──┴──┴──┘</td>";
		$plj .="</tr></table>";
		return $plj;
	}
	
	/**
	 *排命挂
	 */
	
	public function minggua($y,$s,$ys,$ms)
	{
		$nian=$y;
		$sex=$s;
		$lyp=9-(($nian-110)% 9);
		if ($lyp==0 ) $lyp=9;
		$sex=="male"?$ming=9-(($nian-110)% 9):$ming=($nian-104)%9;
		
		if ($ming==0 ) $ming=9;
		if($ming==5){
			if($sex=="male"){
				$ming=2;
			}else{
				$ming=8;
			}
		}
		$ly[0]=$lyp;
		$mg[0]=$ming;
		for($i=1 ;$i<=8;$i++)
		{
			$mg[$i]=($mg[0]+$i)% 9;
			$ly[$i]=($ly[0]+$i)% 9;
			if ($mg[$i]==0 ) $mg[$i]=9;
			if ($ly[$i]==0 ) $ly[$i]=9;
		}
		if($sex=="male")
		{
			$sex="男";
		}else{
			$sex="女";
		}
		$nian=$ys;
		$yue=$ms;
		$dz=array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
		$dy=($nian-724)% 12;
		$dizhi=$dz[$dy];
		if($dizhi=="子"||$dizhi=="午"||$dizhi=="卯"||$dizhi=="酉")  $lyz=8;
		if($dizhi=="辰"||$dizhi=="戌"||$dizhi=="丑"||$dizhi=="未")  $lyz=5;
		if($dizhi=="寅"||$dizhi=="申"||$dizhi=="巳"||$dizhi=="亥")  $lyz=2;
		$lyz=($lyz-$yue+1+9)%9;
		if($lyz==0) $lyz=9;
		$liuy[0]=$lyz;
		for($i=0;$i<=8;$i++)
		{
			$liuy[$i]=($liuy[0]+$i)%9;
			if($liuy[$i]==0 ) $liuy[$i]=9;
		}
		for($i=0;$i<=8;$i++)
		switch($mg[$i])
		{
		case 1:$mg[$i]="<font color=red>一</font>";break;
		case 2:$mg[$i]="<font color=red>二</font>" ;break;
		case 3:$mg[$i]="<font color=red>三</font>" ;break;
		case 4:$mg[$i]="<font color=red>四</font>" ;break;
		case 5:$mg[$i]="<font color=red>五</font>" ;break;
		case 6:$mg[$i]="<font color=red>六</font>" ;break;
		case 7:$mg[$i]="<font color=red>七</font>" ;break;
		case 8:$mg[$i]="<font color=red>八</font>" ;break;
		case 9:$mg[$i]="<font color=red>九</font>" ;break;
		}
		for($i=0;$i<=8;$i++)
		{
			$ly[$i]="<font color=green>".$ly[$i]."</font>";
			$liuy[$i]="<font color=blue>".$liuy[$i]."</font>";
		}
		$minggua .="<table width=200 border=0 cellspacing=0 cellpadding=0 bordercolor=#333333><tr>";
		$minggua .="<td class=tdx>".$ly[8]."&nbsp;".$liuy[8]."<br>".$mg[8]."</td>";
		$minggua .="<td class=tdx>".$ly[4]."&nbsp;".$liuy[4]."<br>".$mg[4]."</td>";
		$minggua .="<td class=tdx>".$ly[6]."&nbsp;".$liuy[6]."<br>".$mg[6]."</td></tr><tr>";
		$minggua .="<td class=tdx>".$ly[7]."&nbsp;".$liuy[7]."<br>".$mg[7]."</td>";
		$minggua .="<td class=tdx>".$ly[0]."&nbsp;".$liuy[0]."<br>" .$mg[0]."</td>";
		$minggua .="<td class=tdx>".$ly[2]."&nbsp;".$liuy[2]."<br>".$mg[2]."</td></tr><tr>";
		$minggua .="<td class=tdx>".$ly[3]."&nbsp;".$liuy[3]."<br>".$mg[3]."</td>";
		$minggua .= "<td class=tdx>".$ly[5]."&nbsp;".$liuy[5]."<br>".$mg[5]."</td>";
		$minggua .= "<td class=tdx>".$ly[1]."&nbsp;".$liuy[1]."<br>" .$mg[1]."</td></tr></table>";
		
		return $minggua;
	}
	
}
?>
