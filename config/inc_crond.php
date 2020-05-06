<?php

/* CROND 定时器 配置文件
php D:\upupw\htdocs\xiaohua.demo.114la.com\core\crond\index.php
*/

$GLOBALS['CROND_TIMER'] = array(
    /* 配置支持的格式 */
    'the_format' => array(
                '*',        //每分钟
                '*:i',      //每小时 某分
                'H:i',      //每天 某时:某分
                '@-w H:i',  //每周-某天 某时:某分  0=周日
                '*-d H:i',  //每月-某天 某时:某分
                'm-d H:i',  //某月-某日 某时-某分
                'Y-m-d H:i',//某年-某月-某日 某时-某分
    ),
    /* 配置执行的文件 */
    'the_time' => array(  
               //'14:43' => array('crond_wyk.php'),
                /* 每分钟 */
//              '*' => array('crond_recache_expired_data.php'), //每分钟对缓存中即将过期的数据进行预缓存

                /* 每小时 某分 */
//              '*:01' => array('crond_mail_task.php'), //发邮件

                /* 每小时 某分 */
//               '*:34' => array('crond_db_hour.php'),

                /* 每天 某时:某分 */
//               '10:00' => array('crond_tempfile_email_send.php'), //每天定时更新汇率数据

                /* 每周-某天 某时:某分 */
//               '@-0 01:30' => array('crond_clear_week_count.php'),//每周定时对搜索记录数清零
//               '@-3 01:00' => array('crond_check_site_auth_file.php'), //星期三验证网站是否有效
//               '@-6 01:00' => array('crond_check_site_auth_file.php'), //星期六验证网站是否有效

                /* 每月-某天 某时:某分 */
//                '*-05 01:00' => array('crond_calculate_finance_day.php'),//统计上月收入
//                '*-21 *:26' => array('crond_db_mooth.php'),

                /*每年 某月-某日 某时-某分 */
//                '12-12 23:43' => array('crond_create_month_table.php'),
//                '11-19 16:14' => array('crond_create_month_table.php'),

                /* 某年某月某日某时某分 */
//                '2008-12-12 23:43' => array('crond_db_year.php'),
//                '2008-12-12 13:43' => array('crond_db_year.php'),
        //'*' => array('crond_weiyunke.php'),
        //'*' => array('crond_yesky.php'),
//'*' => array('crond_yesky_mobile.php'),
//'*' => array('test_caiji.php'),
               // '*' => array('pengfu_3.php'),
        //'*' => array('mahua_3.php'),
        //'*' => array('youku_2.php'),
        //'*' => array('juyouqu_1.php'),
        //'*' => array('baozoumanhua_1.php'),
        //'*' => array('duowan_1_tucao.php'),
        //'*' => array('duowan_1_gif.php'),
        //'*' => array('3jy_1_gif.php'),
        //'*' => array('weibo_1_gif.php'),
        //'*' => array('duowan_1_tupian.php'),
        //'*' => array('laifudao_1.php'),
        //'*' => array('haha_1.php'),
        //'*' => array('get_image_size.php'),

        /*
        '*' => array('mahua_3.php'),// ok
        '*' => array('youku_2.php'),// ok
        '*' => array('juyouqu_1.php'),// ok
        '*' => array('baozoumanhua_1.php'),// ok
        '*' => array('duowan_1_tucao.php'),// ok
        '*' => array('duowan_1_gif.php'),// ok
        '*' => array('3jy_1_gif.php'),// ok
        '*' => array('duowan_1_tupian.php'),// ok
        '*' => array('laifudao_1.php'),// ok
        '*' => array('haha_1.php'),// ok
        */
        //'*' => array('3jy_1_gif.php'),
        //'*' => array('make_hot_data.php'),
        //'*' => array('make_rand_sort.php'),
        //'*' => array('api_negui.php'),
        //'*' => array('jokeji_3.php'),
        '*' => array('jokeji_1.php'),
    ),
);
 