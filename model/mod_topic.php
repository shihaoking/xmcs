<?php

/*
 获取所有文章栏目的对象
 */

if (!defined('CORE'))
    exit('Request Error!');

class mod_topic
{
	
	
	/***
	 *根据id获取父级id
	 */
	
	function get_parentid($id){
		$sql = "select `parentid` from `sm_class` where id='".$id."'";
		$data = db::queryone($sql);
		return $data['parentid'];
		
	}

	function get_topic_h5($id,$tid,$opt){
		if($id==0){ return '';}
		$sql = 'select * from `sm_class` where `parentid` = "'.$id.'" and status=0 order by `listorder` asc';
		$data = db::querylist($sql);

		if($tid==''){
			if($opt['date']){
				$sql = 'select `tid` from `'.$opt["date"].'` where id="'.$opt['id'].'"';
				$data_n = db::queryone($sql);
				$tid = $data_n['tid'];
			}

		}

		$count = count($data);
		foreach($data as $k=>$v){

			if($v['extra']==''){
				if($v['mid']==2){//文章
					$data[$k]['extra'] = '/list-'.$v["id"].'.html';
				}elseif($v['mid']==4){//解梦
					$data[$k]['extra'] = '/zgjm/list-'.$v["id"].'.html';
				}elseif($v['mid']==3){//单页
					$data[$k]['extra'] = '/page-'.$v["id"].'.html';
				}else{
					$data[$k]['extra'] = '/index.php?ct='.$v["f_ct"].'&ac='.$v['f_ac'];
				}
			}

		}
		return $data;

	}
	
	
	/*
	 * 获取二级栏目=文章
	 * $id==父级栏目
	 * $tid==子级栏目
	 * opt=array(opt=>'数据库表','id'=>'文章id')
	 */
	function get_topic($id,$tid,$opt){
		if($id==0){ return '';}
		$sql = 'select * from `sm_class` where `parentid` = "'.$id.'" and status=0 order by `listorder` asc';
		$data = db::querylist($sql);

		if($tid==''){
			if($opt['date']){
				$sql = 'select `tid` from `'.$opt["date"].'` where id="'.$opt['id'].'"';
				$data_n = db::queryone($sql);
				$tid = $data_n['tid'];
			}

		}

		$topic = '<div class="submenu_list">';
		$count = count($data);
		foreach($data as $k=>$v){
			
				$count==($k+1)?$em='':$em='<em></em>';
				$v['id']==$tid?$current = 'class="current"':$current='';
				
				if($v['extra']==''){
						if($v['mid']==2){//文章
							$topic .='<a title="'.$v["name"].'" '.$current.' href="'.URL.'list-'.$v["id"].'.html">'.$v["name"].'</a>'.$em;
						}elseif($v['mid']==4){//解梦
							$topic .='<a title="'.$v["name"].'" '.$current.' href="'.URL.'zgjm/list-'.$v["id"].'.html">'.$v["name"].'</a>'.$em;
						}elseif($v['mid']==3){//单页
							$topic .='<a title="'.$v["name"].'" '.$current.' href="'.URL.'page-'.$v["id"].'.html">'.$v["name"].'</a>'.$em;
						}else{
							$topic .='<a title="'.$v["name"].'" '.$current.' href="'.URL.'index.php?ct='.$v["f_ct"].'&ac='.$v['f_ac'].'">'.$v["name"].'</a>'.$em;
						}
				}else {
					$topic .= '<a title="' . $v["name"] . '" ' . $current . ' href="' .URL. $v["extra"] . '">' . $v["name"] . '</a>' . $em;
				}
				
		}
		$topic .='</div>';
		return $topic;
	}
	

	/*
	 * 获取一级栏目
	 */
	function get_p_id(){
		$ct = req::item('ct', 'index');

		$sql='select * from sm_class where `parentid`=0 and status=0 ORDER BY `listorder` ASC';
		
		
		$data = db::querylist($sql);

		$ct = req::item('ct', 'index');

		if($ct=='index'){
			$li ='<li><a title="八字网" class="current" href="'.URL.'"><span>首页</span></a></li>';
		}else{
			$li ='<li><a title="八字网" href="'.URL.'"><span>首页</span></a></li>';
		}

		foreach($data as $k=>$v){

			if($ct=='suanming' && ($v['parentid']=='357' || $v['id']=='357')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='xingming' && ($v['parentid']=='358' || $v['id']=='358')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='paipan' && ($v['parentid']=='359' || $v['id']=='359')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='peidui' && ($v['parentid']=='360' || $v['id']=='360')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='haoma' && ($v['parentid']=='361' || $v['id']=='361')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='chouqian' && ($v['parentid']=='362' || $v['id']=='362')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='hdjr' && ($v['parentid']=='363' || $v['id']=='363')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='zgjm' && ($v['parentid']=='349' || $v['id']=='349')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='xingzuo' && ($v['parentid']=='364' || $v['id']=='364')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='news' && ($v['parentid']=='344' || $v['id']=='344')){
					$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif(($ct=='page' || $ct=='minjian') && ($v['parentid']=='431' || $v['id']=='431')){
				$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}elseif($ct=='shengxiao' && ($v['parentid']=='417' || $v['id']=='417')){
				$li .='<li><a title="'.$v['name'].'" class="current" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}else{
				$li .='<li><a title="'.$v['name'].'" href="'.URL.$v["extra"].'"><span>'.$v['name'].'</span></a></li>';
			}
		}
		return $li;

	}

	/**
	 * @param $id
	 * @param $tid
	 * @return string
	 * 获取栏目id返回arr
	 */
	function get_topic_arr($id,$tid){
		$sql = 'select * from `sm_class` where `parentid` = "'.$id.'" and status=0';
		$data = db::querylist($sql);
		return $data;
	}

	function seo_info($tid,$category=0){
		$sql = 'select * from `sm_class` where `id` = "'.$tid.'"';
		$data = db::queryone($sql);
		
		if($category!='0'){//文章二级分类
			$category_Arr = array(1=>'白羊座', 2=>'金牛座', 3=>'双子座', 4=>'巨蟹座', 5=>'狮子座', 6=>'处女座', 7=>'天秤座', 8=>'天蝎座', 9=>'射手座', 10=>'摩羯座', 11=>'水瓶座', 12=>'双鱼座',13=>'鼠', 14=>'牛', 15=>'虎', 16=>'兔', 17=>'龙', 18=>'蛇', 19=>'马', 20=>'羊', 21=>'猴', 22=>'鸡', 23=>'狗', 24=>'猪','25'=>'星座爱情',26=>'星座性格',27=>'星座时尚',28=>'星座开运',29=>'星座知识',30=>'星座情感',31=>'爱情测试',32=>'性格测试',33=>'财富测试',34=>'智商测试',35=>'家居',36=>'事业',37=>'爱情',38=>'灵异');//该变量应该从后台ctl_news.php获取
			$data['name'] = $category_Arr[$category].'-'.$data['name'];
			$data['title'] = $category_Arr[$category].'，'.$data['title'];
			$data['keywords'] = $category_Arr[$category].'，'.$data['keywords'];
			$data['description'] = $category_Arr[$category].'，'.$data['description'];
			
		}
		return $data;
	}

	/**
	 * @param $id
	 * @return 获取子级栏目
	 */
	function get_selftid($tid,$num=12){
		$sql = 'select * from `sm_class` WHERE `parentid`="'.$tid.'"  order by `listorder` asc limit 0,'.$num;
		$data = db::querylist($sql);
		return $data;
	}
	
	function sm_opt($id){
		if($id==365){
			$arr['postbase']=365;
			$arr['titleclass']='fn_bz';
			$arr['oneheclass']='class="current"';
			$arr['jianjie']='<strong>「生辰八字」</strong>八字完全是由人的出生时间所确定，相传古代天上有十个太阳，他们分别叫：甲、乙、丙、丁、戊、己、庚、辛、壬、癸。这十个太阳的名字（日名）就叫“十干”也叫“天干”，不同时辰出生的生辰八字不一样四柱八字也有所不同、八字网免费生辰八字算命，是指人出生年月日时的干支表示，又有年柱、月柱、日柱、时柱之分，而且每柱有2字，一共有八个字，所以称为"八字"，又叫「四柱八字」- 来八字网测一下你的生辰八字，四柱八字到底隐藏多少天机！';
			$arr['h1']='生辰八字算命';
			$arr['seotitle']='生辰八字算命，四柱八字算命，免费算命';
			$arr['k']='四柱八字算命';
		}elseif($id==367){
			$arr['titleclass']='fn_cg';
			$arr['postbase']=367;
			$arr['h1']='称骨论命';
			$arr['k']='称骨论命,袁天罡称骨';
			$arr['seotitle']='称骨论命，袁天罡称骨，周易算命，免费算命';
			$arr['jianjie']='<strong>「称骨论命」</strong>称骨算命法是唐代著名的星象预测家袁天罡称骨的预测方法，八字袁天罡称骨算命法同四柱算命一样，能确定一个人一生的吉凶祸福、荣辱盛衰，准确率很高，又便于掌握和运用。 一个人出生的年、月、日、时各有定数，年、月、日、时的重量都有具体规定。只要把年、月、日、时的重量加在一起，在这里输入信息经过系统分析就能得到称骨论命，袁天罡称骨，的骨重再按照"称骨算命歌"一查，就可大概确定这个人一生的命运。';
                $arr['twoheclass']='class="current"';
		}elseif($id==366){
			$arr['titleclass']='fn_rg';
			$arr['postbase']=366;
			$arr['threeheclass']='class="current"';
			$arr['h1']='日干论命';
			$arr['k']='日干论命,四柱推断';
			$arr['jianjie']='<strong>「日干论命」</strong>"日干"就是生辰八字中"日"上的天干，即：甲、乙、丙、丁、戊、己、庚、辛、壬、癸中的某一个，整个四柱（年、月、日、时四柱）可以代表一个整体的人，日干是人的核心；根据四柱推断与命主密切相关的人事时，日干就代表命主本人，其余干支十神代表六亲人事。所以，日干是四柱的轴或核心。
日干论命仅对八字中日柱的信息进行分析，为片面的信息。';
			$arr['seotitle']='日干论命，四柱推断，周易算命，免费算命';
		}elseif($id==368){
			$arr['titleclass']='fn_caiyun';
			$arr['fourheclass']='class="current"';
			$arr['postbase']=368;
			$arr['h1']='三世财运';
			$arr['k']='三世财运,一年运势,三世书,前世因，今世果';
			$arr['seotitle']='三世财运测算，一年运势，周易算命，免费算命，前世因，今世果';
			$arr['jianjie']='<strong>「三世财运」</strong>佛曰："前世因，今世果"，故虽云冥冥中自有主宰，但影响今世财运的，可能正是我们的前生。
《三世书》起源于佛教的《三世因果经》，是传说中一本可以推演前世、今生和来世的算命奇书，内容丰富奇特。只要掌握了其中的诀要密码，轮回的秘密便无所遁形。
　　《三世书》很多是用来算财运的，翻查《三世书》的财禄篇，便能预知自己今世的财力是强是弱，知道自己的财运是属于哪种类型，算尽自己一生的荣华富贵。';
		}elseif($id==369){
			$arr['titleclass']='fn_cs';
			$arr['sevenheclass']='class="current"';
			$arr['postbase']=369;
			$arr['h1']='八字测算';
			$arr['k']='八字测算,生辰八字测算,免费算命生辰八字测算';
			$arr['seotitle']='八字测算，生辰八字测算，免费算命生辰八字测算';
			$arr['jianjie']='<strong>「八字测算」</strong>八字完全是由人的出生时间所确定，是指人出生年月日时的干支表示，又有年柱、月柱、日柱、时柱之分，而且每柱有2字，一共有八个字，所以称为"八字"，又叫「四柱八字」。';
		}
		
		return $arr;
	}

}
