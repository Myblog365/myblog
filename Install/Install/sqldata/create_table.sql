DROP TABLE IF EXISTS `zswin_mrole`;

--
-- 表的结构 `zswin_access`
--

DROP TABLE IF EXISTS `zswin_access`;
CREATE TABLE `zswin_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_addons`
--

DROP TABLE IF EXISTS `zswin_addons`;
CREATE TABLE `zswin_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='插件表' AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_article`
--

DROP TABLE IF EXISTS `zswin_article`;
CREATE TABLE `zswin_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `description` text NOT NULL COMMENT '内容',
  `uid` int(10) DEFAULT '0' COMMENT '用户ID',
  `cid` int(10) DEFAULT '0' COMMENT '分类',
  `view` int(10) DEFAULT '0' COMMENT '查看数',
  `sccount` int(10) DEFAULT '0' COMMENT '收藏',
  `reply_count` int(10) DEFAULT '0' COMMENT '评论数',
  `ding` int(10) DEFAULT '0' COMMENT '支持',
  `cai` int(10) DEFAULT '0' COMMENT '反对',
  `tj` tinyint(1) DEFAULT '0' COMMENT '1推荐2置顶3全局置顶',
  `tag` varchar(255) DEFAULT '' COMMENT '标签',
  `copyright` varchar(255) DEFAULT '' COMMENT '版权信息',
  `status` tinyint(1) DEFAULT '0' COMMENT '审核状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_avatar`
--

DROP TABLE IF EXISTS `zswin_avatar`;
CREATE TABLE `zswin_avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_temp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=151 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_cate`
--

DROP TABLE IF EXISTS `zswin_cate`;
CREATE TABLE `zswin_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `des` varchar(255) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '0',
  `pid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `spid` varchar(50) NOT NULL,
  `ordid` smallint(4) unsigned NOT NULL DEFAULT '255',
  `type` tinyint(1) DEFAULT '1' COMMENT '分类类型',
  `enable` tinyint(1) DEFAULT '1' COMMENT '会员是否可发布',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_config`
--

DROP TABLE IF EXISTS `zswin_config`;
CREATE TABLE `zswin_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_district`
--

DROP TABLE IF EXISTS `zswin_district`;
CREATE TABLE `zswin_district` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `upid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='中国省市区乡镇数据表' AUTO_INCREMENT=45052 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_file`
--

DROP TABLE IF EXISTS `zswin_file`;
CREATE TABLE `zswin_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(20) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(30) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(40) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `location` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件保存位置',
  `create_time` int(10) unsigned NOT NULL COMMENT '上传时间',
 `download` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_md5` (`md5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文件表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_group`
--

DROP TABLE IF EXISTS `zswin_group`;
CREATE TABLE `zswin_group` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  `icon` varchar(50) NOT NULL DEFAULT 'icon-bar-chart',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_hooks`
--

DROP TABLE IF EXISTS `zswin_hooks`;
CREATE TABLE `zswin_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_local_comment`
--

DROP TABLE IF EXISTS `zswin_local_comment`;
CREATE TABLE `zswin_local_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `app` text NOT NULL,
  `con` text NOT NULL,
  `row_id` int(11) NOT NULL,
  `parse` int(11) NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `ding` int(10) DEFAULT '0' COMMENT '支持',
  `cai` int(10) DEFAULT '0' COMMENT '反对',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_member`
--

DROP TABLE IF EXISTS `zswin_member`;
CREATE TABLE `zswin_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态',
  `signature` text,
  `tox_money` int(11) NOT NULL DEFAULT '0',
  `pos_province` int(11) NOT NULL DEFAULT '0',
  `pos_city` int(11) NOT NULL DEFAULT '0',
  `pos_district` int(11) NOT NULL DEFAULT '0',
  `pos_community` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `status` (`status`),
  KEY `name` (`nickname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='会员表' AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_message`
--

DROP TABLE IF EXISTS `zswin_message`;
CREATE TABLE `zswin_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) NOT NULL,
  `to_uid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0系统消息,1用户消息,2应用消息',
  `is_read` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='消息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_mrole`
--

DROP TABLE IF EXISTS `zswin_mrole`;
CREATE TABLE `zswin_mrole` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `ename` varchar(5) DEFAULT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `ename` (`ename`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_mroleconfig`
--

DROP TABLE IF EXISTS `zswin_mroleconfig`;
CREATE TABLE `zswin_mroleconfig` (
  `id` int(10) unsigned NOT NULL COMMENT 'mroleID',
  `value` text NOT NULL COMMENT '配置值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_mrole_user`
--

DROP TABLE IF EXISTS `zswin_mrole_user`;
CREATE TABLE `zswin_mrole_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 表的结构 `zswin_nav`
--

DROP TABLE IF EXISTS `zswin_nav`;
CREATE TABLE `zswin_nav` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `controll` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `win` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `url` varchar(255) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  `gid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=500 ;


-- --------------------------------------------------------

--
-- 表的结构 `zswin_node`
--

DROP TABLE IF EXISTS `zswin_node`;
CREATE TABLE `zswin_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` int(10) unsigned DEFAULT '0',
  `icon` varchar(50) NOT NULL DEFAULT 'icon-bar-chart',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_picture`
--

DROP TABLE IF EXISTS `zswin_picture`;
CREATE TABLE `zswin_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_role`
--

DROP TABLE IF EXISTS `zswin_role`;
CREATE TABLE `zswin_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `ename` varchar(5) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `ename` (`ename`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_role_user`
--

DROP TABLE IF EXISTS `zswin_role_user`;
CREATE TABLE `zswin_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_sync_login`
--

DROP TABLE IF EXISTS `zswin_sync_login`;
CREATE TABLE `zswin_sync_login` (
  `uid` int(11) NOT NULL,
  `type_uid` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `oauth_token` varchar(255) NOT NULL,
  `oauth_token_secret` varchar(255) NOT NULL,
  `is_sync` tinyint(4) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_syslogs`
--

DROP TABLE IF EXISTS `zswin_syslogs`;
CREATE TABLE `zswin_syslogs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(30) DEFAULT '',
  `actionname` varchar(30) DEFAULT '',
  `opname` varchar(30) DEFAULT '',
  `message` varchar(30) DEFAULT '',
  `userid` smallint(5) NOT NULL DEFAULT '0',
  `username` varchar(64) DEFAULT '',
  `userip` varchar(40) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_tags`
--

DROP TABLE IF EXISTS `zswin_tags`;
CREATE TABLE `zswin_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '标签',
  `num` int(10) DEFAULT '0' COMMENT '标签数',
  `des` varchar(255) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '0',
  `type` tinyint(1) DEFAULT '0' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_ucenter_member`
--

DROP TABLE IF EXISTS `zswin_ucenter_member`;
CREATE TABLE `zswin_ucenter_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL DEFAULT '0' COMMENT '用户手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=500 ;

-- --------------------------------------------------------

--
-- 表的结构 `zswin_userexp`
--

DROP TABLE IF EXISTS `zswin_userexp`;
CREATE TABLE `zswin_userexp` (
  `id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `email` char(32) NOT NULL COMMENT '用户认证邮箱',
  `rztype` tinyint(4) DEFAULT '0' COMMENT '认证类别',
  `rz` tinyint(4) DEFAULT '0' COMMENT '是否认证',
  `signature` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户扩展表';

-- --------------------------------------------------------

--
-- 表的结构 `zswin_user_token`
--

DROP TABLE IF EXISTS `zswin_user_token`;
CREATE TABLE `zswin_user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

DROP TABLE IF EXISTS `zswin_focus`;
CREATE TABLE `zswin_focus` (
  `id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `rowid` char(32) NOT NULL COMMENT '事件id',
  `type` tinyint(4) DEFAULT '0' COMMENT '0用户1文章2标签3分类',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户关注表';