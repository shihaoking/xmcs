<?php

ini_set('display_errors', 1);
$time_start = microtime(true);
require_once PATH_ROOT . '/model/mod_cai_xingzuo.php';


$cls = new mod_cai_xingzuo();


$cls->news_52pk_day();

?>