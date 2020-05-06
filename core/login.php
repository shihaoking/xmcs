<?php


class Login
{
  static $username; //用户名
  static $userpass; //密码
  static $userid; //用户id

  static $authtable="account"; //验证用数据表

  static $usecookie=true; //使用cookie保存sessionid
  static $cookiepath='/'; //cookie路径
  static $cookietime=108000; //cookie有效时间

  static $err_mysql="mysql error"; //mysql出错提示
  static $err_username="用户名无效"; //用户名无效提示
  static $err_user="用户无效"; //用户无效提示(被封禁)
  static $err_password="密码错误提示"; //密码错误提示

  static $err; //出错提示

  static $errorreport=false; //显示错误

  public static function isLoggedin() //判断是否登录
  {
    if(isset($_COOKIE['user_name'])) //如果cookie中保存有user_name
    {
      return true;
    }
    else //如果cookie中未保存user_name,则直接检查session
    {
     return false;
    }
    
  }

  public static function userAuth($username,$userpass) //用户认证
  {
    self::$username=$username;
    self::$userpass=$userpass;
    $query="select * from `users` where `user_name`='".$username."'";
    $result = db::get_one($query);
    $reset=array();
    if($result['user_name']!="") //找到此用户
    {
      
      if(md5($userpass)==$result['userpwd']) //密码匹配
      {
        self::$userid=$result['uid'];
        setcookie('user_name',$result['user_name'],time()+self::$cookietime,self::$cookiepath);
        setcookie("usermore", 1, time()+self::$cookietime,self::$cookiepath);
        $reset['userlog']=true;
        return $reset;
      }
      else //密码不匹配
      {
        $reset['userlog']=false;
        $reset['usererr']=self::$err_password;
        return $reset;
      }
    }
    else //没有找到此用户
    {
      $reset['userlog']=false;
      $reset['usererr']=self::$err_username;
      return $reset;
    }
  }

  public static function setSession() //置session
  {
    $sid=uniqid('sid'); //生成sid
    session_id($sid);
    session_start();
    $_SESSION['user_name']=self::$username; //给session变量赋值
    $_SESSION['uid']=self::$userid; //..
    if(self::$usecookie) //如果使用cookie保存sid
    {
      if(!setcookie('sid',$sid,time()+self::$cookietime,self::$cookiepath))
        self::$errReport("set cookie failed");
    }
    else{
      setcookie('sid','',time()-3600); //清除cookie中的sid
    }
  }

  public static function userLogout() //用户注销
  {
    if(setcookie('user_name','',time()-3600))//清除cookie中的sid
      return true;
    else
      return false;
  }

  function errReport($str) //报错
  {
    if(self::$error_report)
      echo "ERROR: $str";
  }
}
?>