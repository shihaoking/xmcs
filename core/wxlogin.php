<?php
/**
 * 微信授权相关接口
 */

class Wechat {

//高级功能-》开发者模式-》获取

  /**
   * 获取微信授权链接
   *
   * @param string $redirect_uri 跳转地址
   * @param mixed $state 参数 snsapi_base snsapi_userinfo
   */
  public static  function get_authorize_url($app_id,$redirect_uri,$state)
  {	
	
    $redirect_uri = urlencode($redirect_uri);
    $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$app_id}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state={$state}#wechat_redirect";
    header("location:".$url);
    
  }
  /**
   * 获取授权token
   *
   * @param string $code 通过get_authorize_url获取到的code
   */
  public static function get_access_token($app_id,$app_secret,$code)
  {
    $token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$app_id}&secret={$app_secret}&code={$code}&grant_type=authorization_code";
    $token_data = self::http($token_url,'', '',array(), false);


    if($token_data[0] == 200)
    {
      return json_decode($token_data[1], TRUE);
    }

    return FALSE;
  }

  /**
   * 获取授权后的微信用户信息
   *
   * @param string $access_token
   * @param string $open_id
   */
  public static  function get_user_info($access_token,$open_id)
  {
    if($access_token && $open_id)
    {
      $info_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
      $info_data = self::http($info_url,'', '', array(), false);

      if($info_data[0] == 200)
      {
        return json_decode($info_data[1], TRUE);
      }
    }

    return FALSE;
  }
  public static  function login_ip() {
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
  public static function dl_findNumc($str){
			if(is_numeric($str)){
              $result=$str;
            }else{
              $result=0;
            }
      return $result;

      }
  public static function user_login($app_id,$app_secret,$code) {
	  
			$token_data=self::get_access_token($app_id,$app_secret,$code);
			if($token_data[access_token]){
				$user_info=self::get_user_info($token_data[access_token],$token_data[openid]);
				if($user_info['openid']){
					//查询是否有已经注册过
					$member_u = db::fetch_one(db::query("SELECT count(*) as num FROM `users` WHERE `user_name` = '".$user_info['openid']."'"));
					if($member_u['num']<1 && $user_info['openid']){ 
						//存入用户信息
                      if($_COOKIE["dl"]!=''){
							$user_into['sd_uid']=self::dl_findNumc($_COOKIE["dl"]);
						}
                      
                       
						$user_into['class']=2;
						$user_into['regtime']=time();
						$user_into['regip']=self::login_ip();
						$user_into['user_name']=$user_info['openid'];
                     	$user_into['nickname']=$user_info['nickname'];
						$user_into['headimgurl']=$user_info['headimgurl'];
                        $user_into['pools']='admin';
                        $user_into['groups']='member_pub';
						db::insert('users',$user_into);
					}
					//存入cookie
					$expire=time()+60*60*24*30;
					setcookie("user_name", $user_info['openid'], $expire,'/');
                  	setcookie("usermore", 1, $expire,'/');
                 
				}
				
			}else{
				echo "未获取到access_token";
			}
		
    }

  public static function http($url, $method, $postfields = null, $headers = array(), $debug = false)
  {
    $ci = curl_init();
    /* Curl settings */
    curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ci, CURLOPT_TIMEOUT, 30);
    curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

    switch ($method) {
      case 'POST':
        curl_setopt($ci, CURLOPT_POST, true);
        if (!empty($postfields)) {
          curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
          $this->postdata = $postfields;
        }
        break;
    }
    curl_setopt($ci, CURLOPT_URL, $url);
    curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ci, CURLINFO_HEADER_OUT, true);

    $response = curl_exec($ci);
    $http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);

    if ($debug) {
      echo "=====post data======\r\n";
      var_dump($postfields);

      echo '=====info=====' . "\r\n";
      print_r(curl_getinfo($ci));

      echo '=====$response=====' . "\r\n";
      print_r($response);
    }
    curl_close($ci);
    return array($http_code, $response);
  }

}


