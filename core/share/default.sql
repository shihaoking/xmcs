CREATE TABLE IF NOT EXISTS `~users~` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `user_name` varchar(20) default NULL,
  `userpwd` char(32) default NULL,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `pools` varchar(20) default NULL,
  `groups` varchar(100) NOT NULL,
  `regtime` int(11) NOT NULL,
  `regip` varchar(15) NOT NULL,
  `sta` smallint(6) NOT NULL,
  `logintime` int(10) unsigned NOT NULL,
  `loginip` varchar(15) NOT NULL,
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `userid` (`user_name`),
  KEY `sta` (`sta`),
  KEY `pools` (`pools`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

##

INSERT INTO `~users~` (`uid`, `user_name`, `userpwd`, `email`, `pools`, `groups`, `regtime`, `regip`, `sta`, `logintime`, `loginip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', 'admin_admin', 0, '', 0, 1316423109, '127.0.0.1');

##

CREATE TABLE IF NOT EXISTS `~users~_admin_log` (
  `id` int(11) NOT NULL auto_increment COMMENT '记录id',
  `user_name` varchar(20) NOT NULL COMMENT '用户名',
  `operate_msg` varchar(100) NOT NULL COMMENT '操作说明',
  `operate_time` int(11) unsigned NOT NULL COMMENT '操作时间',
  `isalert` tinyint(1) unsigned NOT NULL default '0' COMMENT '是否系统警告',
  `msg_hash` varchar(32) NOT NULL COMMENT '消息hash',
  `isread` tinyint(1) unsigned NOT NULL default '0' COMMENT '是否已阅',
  PRIMARY KEY  (`id`),
  KEY `isread` (`isread`),
  KEY `isalert` (`isalert`),
  KEY `msg_hash` (`msg_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##

CREATE TABLE IF NOT EXISTS `~users~_login_history` (
  `autoid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `accounts` varchar(60) NOT NULL COMMENT '用户名',
  `loginip` varchar(15) NOT NULL COMMENT '登录ip',
  `logintime` int(10) unsigned NOT NULL COMMENT '登录时间',
  `pools` varchar(20) NOT NULL COMMENT '应用池',
  `loginsta` tinyint(2) unsigned NOT NULL COMMENT '登录时状态',
  `cli_hash` varchar(32) NOT NULL COMMENT '用户登录名和ip的hash',
  PRIMARY KEY  (`autoid`),
  KEY `logintime` (`logintime`),
  KEY `cli_hash` (`cli_hash`,`loginsta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##

CREATE TABLE IF NOT EXISTS `~users~_purview` (
  `uid` int(11) NOT NULL,
  `purviews` text NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##

CREATE TABLE IF NOT EXISTS `~users~_purview_config` (
  `name` char(50) NOT NULL COMMENT '配置名',
  `config` text NOT NULL COMMENT '配置内容',
  PRIMARY KEY  (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='应用权限配置（原来存放在文件，考虑不适合分布式，所以改存数据库）';

##

INSERT INTO `~users~_purview_config` (`name`, `config`) VALUES
('ip_limit', '127.0.0.1\r\n10.0.0.*\r\n192.168.1.*\r\n119.145.100.138'),
('purview_xml', '<pools:admin name="管理员" allowpool="member" auttype="session" login_control="?ct=index&ac=login">\n\n    <!-- //公开的控制器，不需登录就能访问 -->\n    <ctl:public>index-login,index-loginout</ctl:public>\n\n    <!-- //保护的控制器，当前池会员登录后都能访问 -->\n    <ctl:protected>index-index,index-adminmsg,users-mypurview</ctl:protected>\n\n    <!-- //私有控制器，只有特定组才能访问 -->\n    <ctl:private>\n        <admin name="管理员">*</admin>\n        <test name="测试组">index-index,users-iplimit,users-editpwd,users-log,users-login_log</test>\n        <boy name="帅哥组">index-index,users-editpwd,users-log</boy>\n    </ctl:private>\n\n</pools:admin>\n\n<pools:member name="网站会员" allowpool="" auttype="cookie" login_control="?ct=index&ac=login">\n\n    <!-- //公开的控制器，不需登录就能访问 -->\n    <ctl:public>index-login,index-loginout,index-register,index-get_password,index-validate_image,index-test_user_name,index-test_email</ctl:public>\n\n    <!-- //保护的控制器，当前池会员登录后都能访问 -->\n    <ctl:protected>index-index</ctl:protected>\n\n    <!-- //私有控制器，只有特定组才能访问 -->\n    <ctl:private>\n        <normal name="普通会员">*</normal>\n    </ctl:private>\n\n</pools:member>\n\n');

 