<?php
//核心库目录
define('CORE', dirname(__FILE__));

//熊掌号
define("client_id", "uwAbgjN959uvF8nS2dcwcEmOtWpzTGVe");
define("client_secret", "XFgO5tG1OwZlPkMRfGMlKiBsPDPm4rVm");

//系统配置
require '../../config/inc_config.php';

//加载核心类库
require '../../core/util.php';
require '../../core/db.php';
require '../../core/function.php';


class MyCurl {    
    private static  $url = ''; // 访问的url
    private static $oriUrl = ''; // referer url
    private static $data = array(); // 可能发出的数据 post,put
    private   static $method; // 访问方式，默认是GET请求
    public static function login_sq($url, $data = array()) {
		self::$data=implode("&",$data);
		foreach($data as $key => $value){
			if($key=='response_type'){
				$stcs.="?".$key."=".$value;
			}else{
				$stcs.="&".$key."=".$value;
			}
		}
		header("location:".$url.$stcs);

    }
    public static function send($url, $data = array(), $method = 'get',$rul_class = 'json') {
        if (!$url) exit('url can not be null');
        self::$url = $url;
        self::$method = $method;
        $urlArr = parse_url($url);
        self::$oriUrl = $urlArr['scheme'] .'://'. $urlArr['host'];
        self::$data = $data;
        if ( !in_array(
                self::$method,
                array('get', 'post', 'put', 'delete')
             )
           ) {
                    exit('error request method type!');
             }
				
                $func = self::$method . 'Request';
				if($rul_class == 'json'){
					return json_decode(self::$func(self::$url),true);
				}
                return self::$func(self::$url);
    }
	public static function login_ip() {
		 if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
			 $ip = getenv('HTTP_CLIENT_IP');
		 } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
			 $ip = getenv('HTTP_X_FORWARDED_FOR');
		 } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
			 $ip = getenv('REMOTE_ADDR');
		 } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
			 $ip = $_SERVER['REMOTE_ADDR'];
		 }
		 return preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
	}
    /**
     * 基础发起curl请求函数
     * @param int $is_post 是否是post请求
     */
    private static  function doRequest($is_post = 0) {
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL, self::$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        // 来源一定要设置成来自本站
        curl_setopt($ch, CURLOPT_REFERER, self::$oriUrl);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        if($is_post == 1) curl_setopt($ch, CURLOPT_POST, $is_post);//post提交方式
        if (!empty(self::$data)) {
            self::$data = self::dealPostData(self::$data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, self::$data);
        }
        
        $data = curl_exec($ch);//运行curl    
        curl_close($ch);
        return $data;
    }
    /**
     * 发起get请求
     */
    public static function getRequest() {
        return self::doRequest(0);
    }
    /**
     * 发起post请求
     */
    public  static function postRequest() {
        return self::doRequest(1);
    }
    /**
     * 处理发起非get请求的传输数据
     * 
     * @param array $postData
     */
    public static function dealPostData($postData) {
        if (!is_array($postData)) exit('post data should be array');
        foreach ($postData as $k => $v) {
            $o .= "$k=" . urlencode($v) . "&";
        }
        $postData = substr($o, 0, -1);
        return $postData;
    }
    /**
     * 发起put请求
     */
    public static function putRequest($param) {
        return self::doRequest(2);
    }
    
    /**
     * 发起delete请求
     */
    public static function deleteRequest($param) {
        return self::doRequest(3);
    }
	
	public static function access_token($client_id,$client_secret) {
		$buxz_arr2=array('grant_type' => 'client_credentials','client_id' => $client_id,'client_secret' => $client_secret);
		$tk_od = self::send('https://openapi.baidu.com/oauth/2.0/token',$buxz_arr2);
        return $tk_od;
    }
    public static function user_login($client_id,$client_secret,$redirect_uri,$code) {
      // $redirect_uri=urlencode($redirect_uri);
        if(!empty($code)){
			$buxz_arr3=array('grant_type' => 'authorization_code','code' => $code,'client_id' => $client_id,'client_secret' => $client_secret,'redirect_uri' =>$redirect_uri);
			$tk_od = self::send('https://openapi.baidu.com/oauth/2.0/token',$buxz_arr3);
          print_r($tk_od);
			if($tk_od[access_token]){
				$buxz_arr3=array('access_token' => $tk_od[access_token],'openid' => $tk_od[openid]);
				$user_info = self::send('https://openapi.baidu.com/rest/2.0/cambrian/sns/userinfo',$buxz_arr3);
				print_r($user_info);
				if($user_info['openid']){
					//查询是否有已经注册过
					$member_u = db::get_one("select * from member order by mid;");
					if($member_u[openid]!=""){

						$user_log=array('mid'=>$member_u['mid'],'ip'=>self::login_ip(),'login_time'=>time());
						db::insert('member_log',$user_log); 
					}else{
						//存入用户信息
						$user_info['class']=1;
						$user_info['register_time']=time();
						db::insert('member',$user_info);
					}
					//存入cookie
					$expire=time()+60*60*24*30;
					setcookie("openid", $user_info['openid'], $expire,'/');
				}
				
			}else{
				echo "未获取到access_token";
			}
		}else{
			//获取用户openid
			$buxz_arr=array('response_type' => 'code','client_id' => $client_id,'redirect_uri' =>$redirect_uri,'scope' => 'snsapi_userinfo','state' => '1');
			self::login_sq('https://openapi.baidu.com/oauth/2.0/authorize',$buxz_arr);
		}
    }
  public static function pay_xz($client_id,$client_secret,$oid,$money,$pay_result_url,$payname,$payinfo,$payimg) {
        $display_data='{"cashier_top_block": [[{"left_col": "商品名称","right_col": "'.$payname.'"},{"left_col": "数量","right_col": "1"},{
          "left_col": "价格",
          "right_col": "'.$money.'元"
        }]]}';


		$access_token= MyCurl::access_token($client_id,$client_secret);
		$money_xz=$money*100;
		$arr=array('access_token'=>$access_token['access_token'],'tp_order_id'=>$oid,'total_amount'=>$money_xz,'pay_result_url'=>$pay_result_url,'return_data'=>'','display_data'=>$display_data,'deal_title'=>$payname,'deal_sub_title'=>$payinfo,'deal_thumb_view'=>$payimg);
		$cashierurl=MyCurl::send("https://openapi.baidu.com/rest/2.0/mch/se/cashierurl",$arr,"post");
		return $cashierurl;
    }
	
}




