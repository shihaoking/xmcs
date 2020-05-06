<?php

class mod_cai extends mod_base
{
	

    public $array1 = array('周公解梦','星座','生肖','天蝎座','金牛座','猪');
    public $array2 = array('<a href="/zgjm">周公解梦</a>','<a href="/xingzuo">星座</a>','生肖','<a href="/xingzuo/tianxie/">天蝎座</a>','<a href="/xingzuo/jinniu/">金牛座</a>','<a href="/shengxiao/zhu/">猪</a>');
	
	
	/****
	 *替换关键词，截取内容描述，获取远程图片
	 第二个参数是表示看那个渠道
	 */
	public function replace($content,$http){
		$utf8 = util::is_utf8($content);
		if($utf8===false){
			 $content = iconv('GBK', 'UTF-8', $content);
		}
		$content1 = preg_replace("/<a[^>]*>(.*)<\/a>/isU",'${1}',$content);
		$content2 = preg_replace("/<script[^>]*>(.*)<\/script>/isU",'',$content1);
		$content3 = preg_replace("/<iframe[^>]*>(.*)<\/iframe>/isU",'',$content2);
		
		$content = $content3;
		
		
		if($http=='http://www.xzw.com'){
			$content = self::xingzuowu_replace($content);
		}elseif($http=='http://www.zgjm.org'){
			$content = self::zgjmorg($content);
		}elseif($http=='http://www.meiguoshenpo.com'){
			$content = self::meiguoshenpo($content);
		}
		
		if(is_array($content)){//如果是数组表示有分页内容
			foreach($content as $k=>$v){
				if($k==0){
					$contents .= $v.'';
				}else{
					$contents .= '_ueditor_page_break_tag_'.$v.'';
				}
			}
			$content = $contents;
		}
		
		$a1 = $this->array1;
		$a2 = $this->array2;
		$content = str_replace($a1,$a2,$content);
		
		$img_list = self::get_http_img($content,'ALL',$http);
		
		if(is_array($img_list['httpimg'])){
			$content = str_replace($img_list['httpimg'],$img_list['dowimg'],$content);
			$img1 = $img_list['dowimg'][0];//取第一个图片作为封面
		}
		$shorttxt = util::cn_truncate(strip_tags($content),100);
		$data['content'] = $content;
		$data['img'] = $img1;
		$data['shorttxt'] = trim($shorttxt);
		return $data;
	}
	
	
	/***
	 *获取远程图片保存
	 */
	public function get_http_img($content,$order='ALL',$http){
		$pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$content,$match);
		if(isset($match[1])&&!empty($match[1])){
			if($order==='ALL'){
				
				foreach($match[1] as $k=>$v){
					if (strpos($v, 'http') === false) {
                        $v = $http.$v;
                    }
					$imgs = util::downloadfile($v,'up_img/');//下载图片
					if($imgs=='download errors'){
						$dow_imglist[] = $v;
					}else{
						$dow_imglist[] = $imgs;
					}
				}
				$imgArr = array('httpimg'=>$match[1],'dowimg'=>$dow_imglist);
				return $imgArr;
			}
			if(is_numeric($order)&&isset($match[1][$order])){
				return $match[1][$order];
			}
		}
		
		return '';
	}
	
	/***
	 *星座房的内容处理
	 */
	public function xingzuowu_replace($content){
		$content = preg_replace("/<div class=\"info\">(.*)<\/div>/isU",'',$content);
		$content = preg_replace("/<div class=[\'|\"]adb adb_[0-9]+[\'|\"]>(.*)<\/div>/isU",'',$content);
		$content = preg_replace("/注：(.*)不得转载/isU",'',$content);
		$content = str_replace("微信公众号：kaiyunkj",'文章来源：开运网',$content);
		$content = str_replace("<strong>&nbsp; &nbsp; （本次测试共1小题，分析结果请在本页往下&darr;拉。）</strong></div>",'<strong>&nbsp; &nbsp; （本次测试共1小题，分析结果请在本页往下&darr;拉。）</strong></div>_ueditor_page_break_tag_',$content);
		$content = str_replace("'","\'",$content);
		return $content;
	}
	
	
	public function zgjmorg($content){
		$content = str_replace("www.kaiy8.com",'03ky.com',$content);
		$content = str_replace("www.kaiy8.com",'www.kaiy8.com',$content);
		$content = preg_replace("/<a[^>]*>(.*)<\/a>/isU",'${1}',$content);
		$content = str_replace("'","\'",$content);
		return $content;
	}
	
	public function meiguoshenpo($content){
		//$content = str_replace("meiguoshenpo",'03ky',$content);
		
		//分析分页
		preg_match_all('/<option value=\"(.*?)\"/is',$content,$page_arr);
		if($page_arr[1][0]!=''){
			foreach($page_arr[1] as $k=>$v){
				$contentss[] = self::shenponeirong($v);
			}
			$content = $contentss;
			
		}else{
			
			$content = preg_replace("/<a[^>]*>(.*)<\/a>/isU",'${1}',$content);
			$content = preg_replace("/<script[^>]*>(.*)<\/script>/isU",'',$content);
			$content = str_replace("'","\'",$content);
			$content = preg_replace("/<p class=\"ARTICLE_INDEX\"[^>]*>(.*)<\/p>/isU",'',$content);
		}
		
		return $content;
	}
	
	public function shenponeirong($url){
		$file = file_get_contents($url);
		preg_match_all('/<div class=\"show_cnt\">([\W\w]*?)<\/div>[\n]<div class=\"show_page\">/is',$file,$nnc);
		$cc = $nnc[1][0];
		$cc = preg_replace("/<script[^>]*>(.*)<\/script>/isU",'',$cc);
		
		//$img_list = self::get_http_img($cc,'ALL','http://www.meiguoshenpo.com');
		//if(is_array($img_list['httpimg'])){
			//$cc = str_replace($img_list['httpimg'],$img_list['dowimg'],$cc);
		//}
		
		return $cc;
	}
	
}
?>