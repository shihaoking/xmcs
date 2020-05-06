<?php
    // 上线时把demo.去掉
    define('MYAPI_URL_MY', 'http://my.demo.115.com');               //  用户中心网址
    define('MYAPI_URL_PASSPORT',"http://passport.demo.115.com");    //  PASSPORT 网址
    
    // 各个项目的私KEY
    define('MYAPI_APP_ID', 'my');                                  //  使用的API_ID
    define('MYAPI_APP_KEY', 'AnkbzY6854wOpn2sYh');               //  使用的API_KEY
    //-------------------------以下两项请参照注释内容进行修改    -----------------------//

    define('MYAPI_SERVER_URL', MYAPI_URL_MY.'/api/user-api.php');         //  服务端网址
    define("MYAPI_USE_CURL", true);

    // MYAPI COOKIE
    define('MYAPI_COOKIE', "OOFA");                                 // COOKIE 名称
    define('MYAPI_ONLINE_REPORT',true);                             // 是否向MY汇报在线情况
    define('MYAPI_COOKIE_ONLINE',"OOFO");                           // 在线COOKIE标志
    define("MYAPI_ONLINE_INTERVAL",900);                            // 在线时间间隔 15分钟,15分钟向my汇报一次在线情况
    define('MYAPI_COOKIE_DOMAIN',  ".115.com");                     // COOKIE 域名.115.com
    define('MYAPI_COOKIE_EXPIRE',1209600);                         // 自己设定的cookie 14天
    
    // MYAPI签名,加密KEY
    define('MYAPI_SIGN_KEY', 'ACS567DADDCGLP82JG');               // COOKIE签名KEY
    define('MYAPI_ENCRYPT_KEY', 'XDzmcx9283azklZCVSDWEl');          // COOKIE加密KEY
    

    // API 缓存设置
    define("MYAPI_MEMCACHE",true);                                  // 是否使用缓存,需要有cache::get方法
    define("MYAPI_USERINFO_PREFIX","my_userinfo");            // 用户资料缓存前缀
    define("MYAPI_NOTICE_PREFIX","notice_total");                   // 用户通知(分类)总数
    define("MYAPI_MESSAGE_PREFIX","inbox_total");                   // 用户收件箱(分类)总数
?>
