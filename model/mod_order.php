<?php
if (!defined('CORE')) {
	exit('Request Error!');
}

class mod_order {

	public static function add_order($data) {
		$reo = db::insert('ffsm_orders', $data);
		return $reo;
	}
	public static function get_order($id) {
		$oinfo = db::queryone("select * from `ffsm_orders` where oid=$id");
		return $oinfo;
	}
	public static function up_order($data, $where) {
		return db::update('ffsm_orders', $data, $where);
	}


	public static function set_history($oid){

	    $history = self::get_history();
        if($history==''){
            $cookies=array('ord_history'=>array($oid));
            $cookies_s=json_encode($cookies);
            setCookie('ord_history',$cookies_s);
        }else{
            if(!in_array($oid,$history)){
                $new_history = array_merge($history,array($oid));
                $cookies=array('ord_history'=>$new_history);
                $cookies_s=json_encode($cookies);
                setCookie('ord_history',$cookies_s);
            }
        }
        return true;

    }


	public static function get_history(){
        $history = $_COOKIE['ord_history'];
        if(empty($history)){
            return '';
        }
        $history=json_decode(str_replace('\"','"',$history),true);
        return $history['ord_history'];

    }
	/***
		 *内容页分页
	*/

    public static function typetochannel($type){
        if($type==1){
            $ac = 'bazi';
        }elseif($type==2){
            $ac = 'hehun';
        }elseif($type==3){
            $ac = 'xmfx';
        }elseif($type==4){
            $ac = 'xmpd';
        }elseif($type==5){
            $ac = 'ziwei';
		}elseif($type==6){
            $ac = 'bazizh';
		}elseif($type==7){
            $ac = 'yinyuancs';
		}elseif($type==8){
            $ac = 'bazijp';
		}elseif($type==9){
            $ac = 'aiqingyun';
		}elseif($type==10){
            $ac = 'pc';
		}elseif($type==11){
            $ac = 'jiehun';
		}elseif($type==12){
            $ac = 'jinnian';
		}elseif($type==13){
            $ac = 'sndy';
		}elseif($type==14){
            $ac = 'cyxp';
		}elseif($type==15){
            $ac = 'xys';
		}elseif($type==16){
            $ac = 'bzyy';
		}elseif($type==17){
            $ac = 'bzhh';
		}elseif($type==18){
            $ac = 'hmjx';
        }elseif($type==20){
            $ac = 'qiming';
        }elseif($type==21){
            $ac = 'xydd';
        }elseif($type==22){
            $ac = 'hmjx';
        }elseif($type==23){
            $ac = 'ffqm';
        }elseif($type==24){
            $ac = 'gsqm';
        }elseif($type==25){
            $ac = 'dashi';
        }
        return $ac;
    }


}