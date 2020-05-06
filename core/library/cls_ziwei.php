<?php
/**
 * 黄道吉日查询(黄历)
 */
class cls_ziwei
{
	
	
		function liunum($tempgong,$tempyaozhi){
			 $gong=$tempgong;
			 $yaozhi=$tempyaozhi;
				switch($gong){
				case 1:
				if($yaozhi==1){	$liunum=2;break;}
				if($yaozhi==2){$liunum=4;break;}
				if($yaozhi==3 ){$liunum=5;break;}
				if($yaozhi==4 ){$liunum=1;break;}
				if($yaozhi==5 ){$liunum=3;break;}
				case 2:
				if( $yaozhi==1 ){$liunum=3;break;}
				if( $yaozhi==2 ){$liunum=2;break;}
				if( $yaozhi==3 ){$liunum=1;break;}
				if( $yaozhi==4 ){$liunum=4;break;}
				if( $yaozhi==5 ){$liunum=5;break;}
				case 3:
				if( $yaozhi==1 ){$liunum=1;break;}
				if( $yaozhi==2 ){$liunum=5;break;}
				if( $yaozhi==3 ){$liunum=2;break;}
				if( $yaozhi==4 ){$liunum=3;break;}
				if( $yaozhi==5 ){$liunum=4;break;}
			
				case 4:
				if( $yaozhi==1 ){$liunum=5;break;}
				if( $yaozhi==2 ){$liunum=3;break;}
				if( $yaozhi==3 ){$liunum=4;break;}
				if( $yaozhi==4 ){$liunum=2;break;}
				if( $yaozhi==5 ){$liunum=1;break;}
				case 5:
				if( $yaozhi==1 ){$liunum=4;break;}
				if( $yaozhi==2 ){$liunum=1;break;}
				if( $yaozhi==3 ){$liunum=3;break;}
				if( $yaozhi==4 ){$liunum=5;break;}
				if( $yaozhi==5 ){$liunum=2;break;}
				}
			return($liunum);
		}
		
		//配驿马桃花
		function getmaxing($ddz){
			if($ddz==2 || $ddz==6 || $ddz==10 ){
			$maxing=7;
			$taohua=0;
			}
			if ($ddz== 0 || $ddz==4 || $ddz==8 ){
			$maxing=6;
			$taohua=1;
			}
			if($ddz== 3 || $ddz==7 || $ddz==11 )
			{
			$maxing=9;
			$taohua=4;
			}
			
			if ($ddz== 1 || $ddz==5 || $ddz==9 )
			{
			$maxing=3;
			$taohua=10;
			}
			return array($maxing,$taohua);
		}
		//配禄神
		function getlushen($dtg){
			switch($dtg){	
			case 0: $lu=1;break;
			case 1:$lu=3;break;
			case 2:$lu=4;break;
			case 3:$lu=6;break;
			case 4:$lu=7;break;
			case 5:$lu=6;break;
			case 6:$lu=7;break;
			case 7:$lu=9;break;
			case 8:$lu=10;break;
			case 9:$lu=0;break;
			}
			return $lu;
		}
		
		function getguiren($dtg){
			if($dtg==3 || $dtg==4 ){
			$guiren1=10;
			$guiren2=0;
			}
			if ($dtg==1 || $dtg==5 || $dtg==7){
			$guiren1=2;
			$guiren2=8;
			}
			if ($dtg==2 || $dtg==6){
			$guiren1=1;
			$guiren2=9;
			}
			if ($dtg==0 || $dtg==9 ){
			$guiren1=6;
			$guiren2=4;
			}
			if ($dtg==8 ){
			$guiren1=3;
			$guiren2=7;
			}
			return array($guiren1,$guiren2);
		}
		//配贵人
}
?>
