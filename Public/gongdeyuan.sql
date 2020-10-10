/*
Navicat MySQL Data Transfer

Source Server         : 本地phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : gongdeyuan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-09-15 13:10:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gd_abc
-- ----------------------------
DROP TABLE IF EXISTS `gd_abc`;
CREATE TABLE `gd_abc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `remark` varchar(50) DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `setting` varchar(200) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类型',
  `num` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '调用数',
  `items` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_abc_detail
-- ----------------------------
DROP TABLE IF EXISTS `gd_abc_detail`;
CREATE TABLE `gd_abc_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `start_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `end_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_active_code
-- ----------------------------
DROP TABLE IF EXISTS `gd_active_code`;
CREATE TABLE `gd_active_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类型[1邮箱,0手机]',
  `code` varchar(20) NOT NULL DEFAULT '' COMMENT '激活码',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期[为0时直接过期]',
  `address` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱|手机号',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '激活时间[状态|0未激活_>0激活]',
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_admin
-- ----------------------------
DROP TABLE IF EXISTS `gd_admin`;
CREATE TABLE `gd_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '登录名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `encrypt` varchar(6) NOT NULL DEFAULT '',
  `department` varchar(255) DEFAULT '' COMMENT '部门',
  `realname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `login_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `login_ip` varchar(30) NOT NULL DEFAULT '' COMMENT '登录IP',
  `is_lock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '锁定状态',
  `login_num` int(11) DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='网站后台管理员表';

-- ----------------------------
-- Table structure for gd_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `gd_admin_log`;
CREATE TABLE `gd_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '管理员名字',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '操作地址',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '日志标题',
  `content` text COMMENT '日志详情',
  `ip` varchar(50) NOT NULL DEFAULT '' COMMENT 'IP',
  `useragent` varchar(255) NOT NULL DEFAULT '' COMMENT 'User-Agent',
  `login_flag` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录标志',
  `operate_status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作状态|1成功',
  `operate_time` datetime NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`,`login_flag`,`operate_status`,`operate_time`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员日志表';

-- ----------------------------
-- Table structure for gd_announce
-- ----------------------------
DROP TABLE IF EXISTS `gd_announce`;
CREATE TABLE `gd_announce` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `start_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '开始时间',
  `end_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '结束时间',
  `post_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '添加时间',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_area
-- ----------------------------
DROP TABLE IF EXISTS `gd_area`;
CREATE TABLE `gd_area` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `sname` varchar(10) NOT NULL DEFAULT '' COMMENT '简称',
  `ename` varchar(50) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_article
-- ----------------------------
DROP TABLE IF EXISTS `gd_article`;
CREATE TABLE `gd_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `short_title` varchar(100) NOT NULL DEFAULT '' COMMENT '副标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `copyfrom` varchar(30) NOT NULL DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `content` text COMMENT '内容',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `point` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_attachment
-- ----------------------------
DROP TABLE IF EXISTS `gd_attachment`;
CREATE TABLE `gd_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '原文件名',
  `file_path` varchar(200) NOT NULL DEFAULT '',
  `file_type` smallint(6) NOT NULL DEFAULT '1',
  `file_size` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `has_litpic` tinyint(1) NOT NULL DEFAULT '1',
  `upload_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_attachment_index
-- ----------------------------
DROP TABLE IF EXISTS `gd_attachment_index`;
CREATE TABLE `gd_attachment_index` (
  `att_id` int(10) unsigned NOT NULL DEFAULT '0',
  `arc_id` int(10) unsigned NOT NULL DEFAULT '0',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0',
  `desc` varchar(20) NOT NULL DEFAULT '',
  KEY `att_id` (`att_id`) USING BTREE,
  KEY `arc_id` (`arc_id`) USING BTREE,
  KEY `model_id` (`model_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `gd_auth_group`;
CREATE TABLE `gd_auth_group` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `description` varchar(200) DEFAULT '' COMMENT '描述',
  `status` tinyint(3) unsigned DEFAULT '0',
  `rules` text,
  `department_id` int(11) DEFAULT '0' COMMENT '部门ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `gd_auth_group_access`;
CREATE TABLE `gd_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `gd_auth_rule`;
CREATE TABLE `gd_auth_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '' COMMENT '规则',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型[1支持表达式]',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `condition` varchar(100) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  `icon` varchar(50) NOT NULL DEFAULT '' COMMENT '图标样式',
  `is_menu` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '是否为菜单',
  `is_quick` int(1) unsigned NOT NULL DEFAULT '0',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '显示',
  `sort` int(10) unsigned NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_bad_ip
-- ----------------------------
DROP TABLE IF EXISTS `gd_bad_ip`;
CREATE TABLE `gd_bad_ip` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ip` varchar(50) NOT NULL DEFAULT '' COMMENT 'IP',
  `note` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `forever_flag` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1永久|0临时',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '状态|0不启用,1启用',
  `expire_time` datetime DEFAULT NULL COMMENT '临时有效时间',
  `update_time` datetime NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `expire_time` (`expire_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='不良IP表';

-- ----------------------------
-- Table structure for gd_category
-- ----------------------------
DROP TABLE IF EXISTS `gd_category`;
CREATE TABLE `gd_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目分类名称',
  `ename` varchar(200) NOT NULL DEFAULT '' COMMENT '别名',
  `cat_pic` varchar(150) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属模型',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类别',
  `seo_title` varchar(50) NOT NULL DEFAULT '',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT '' COMMENT '关键字',
  `template_category` varchar(60) NOT NULL DEFAULT '',
  `template_list` varchar(60) NOT NULL DEFAULT '',
  `template_show` varchar(60) NOT NULL DEFAULT '',
  `style` varchar(70) DEFAULT '' COMMENT 'css样式class',
  `content` text COMMENT '内容',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '显示',
  `sort` smallint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='栏目分类表';

-- ----------------------------
-- Table structure for gd_category_access
-- ----------------------------
DROP TABLE IF EXISTS `gd_category_access`;
CREATE TABLE `gd_category_access` (
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `role_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action` varchar(30) NOT NULL DEFAULT '',
  KEY `catid` (`cat_id`),
  KEY `roleid` (`role_id`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_comment
-- ----------------------------
DROP TABLE IF EXISTS `gd_comment`;
CREATE TABLE `gd_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `agent` varchar(255) NOT NULL DEFAULT '',
  `post_time` datetime NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `post_id` (`post_id`) USING BTREE,
  KEY `model_id` (`model_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_config
-- ----------------------------
DROP TABLE IF EXISTS `gd_config`;
CREATE TABLE `gd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '标识',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '说明',
  `t_value` varchar(150) NOT NULL DEFAULT '' COMMENT 'html元素类型',
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '类型',
  `group_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分组',
  `s_value` text COMMENT '值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_copyfrom
-- ----------------------------
DROP TABLE IF EXISTS `gd_copyfrom`;
CREATE TABLE `gd_copyfrom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `siteurl` varchar(200) NOT NULL DEFAULT '',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_department
-- ----------------------------
DROP TABLE IF EXISTS `gd_department`;
CREATE TABLE `gd_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '部门名称',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级部门',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述',
  `sorting` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_free_block
-- ----------------------------
DROP TABLE IF EXISTS `gd_free_block`;
CREATE TABLE `gd_free_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `remark` varchar(200) NOT NULL DEFAULT '' COMMENT '说明',
  `content` text COMMENT '内容',
  `block_type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `gd_guestbook`;
CREATE TABLE `gd_guestbook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `tel` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `homepage` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(15) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `post_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `reply_time` datetime DEFAULT NULL COMMENT '更新时间',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `private_flag` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '悄悄话',
  `content` text,
  `reply` text,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_item_group
-- ----------------------------
DROP TABLE IF EXISTS `gd_item_group`;
CREATE TABLE `gd_item_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `remark` varchar(20) DEFAULT '',
  `status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_item_info
-- ----------------------------
DROP TABLE IF EXISTS `gd_item_info`;
CREATE TABLE `gd_item_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `group` varchar(20) NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_link
-- ----------------------------
DROP TABLE IF EXISTS `gd_link`;
CREATE TABLE `gd_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `is_check` tinyint(1) NOT NULL DEFAULT '1' COMMENT '首页|内页',
  `post_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_member
-- ----------------------------
DROP TABLE IF EXISTS `gd_member`;
CREATE TABLE `gd_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL,
  `encrypt` varchar(6) NOT NULL DEFAULT '',
  `nickname` varchar(20) DEFAULT '',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '总金额',
  `score` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `face` varchar(60) NOT NULL DEFAULT '' COMMENT '头像',
  `reg_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `login_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `login_ip` varchar(20) DEFAULT '',
  `login_num` int(10) unsigned DEFAULT '0',
  `group_id` int(10) unsigned DEFAULT '0',
  `message` tinyint(1) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_lock` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_member_detail
-- ----------------------------
DROP TABLE IF EXISTS `gd_member_detail`;
CREATE TABLE `gd_member_detail` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `realname` varchar(30) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '1980-01-01',
  `province` int(10) unsigned NOT NULL DEFAULT '0',
  `area` int(10) unsigned NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(12) NOT NULL DEFAULT '',
  `tel` varchar(15) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL DEFAULT '',
  `animal` int(10) unsigned NOT NULL DEFAULT '0',
  `star` int(10) unsigned NOT NULL DEFAULT '0',
  `blood` int(10) unsigned NOT NULL DEFAULT '0',
  `marital` int(10) unsigned NOT NULL DEFAULT '0',
  `education` int(10) unsigned NOT NULL DEFAULT '0',
  `vocation` int(10) unsigned NOT NULL DEFAULT '0',
  `income` int(10) unsigned NOT NULL DEFAULT '0',
  `maxim` varchar(100) NOT NULL DEFAULT '',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_member_group
-- ----------------------------
DROP TABLE IF EXISTS `gd_member_group`;
CREATE TABLE `gd_member_group` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `rank` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `sort` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_model
-- ----------------------------
DROP TABLE IF EXISTS `gd_model`;
CREATE TABLE `gd_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `table_name` varchar(30) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `template_category` varchar(60) NOT NULL DEFAULT '',
  `template_list` varchar(60) NOT NULL DEFAULT '',
  `template_show` varchar(60) NOT NULL DEFAULT '',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_order_action
-- ----------------------------
DROP TABLE IF EXISTS `gd_order_action`;
CREATE TABLE `gd_order_action` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '流水号',
  `order_id` varchar(30) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `distribution_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配送状态',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `aid` int(10) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  `publish_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orderid` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `gd_order_detail`;
CREATE TABLE `gd_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(30) DEFAULT NULL COMMENT '订单ID',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `market_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `num` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_order_info
-- ----------------------------
DROP TABLE IF EXISTS `gd_order_info`;
CREATE TABLE `gd_order_info` (
  `order_id` varchar(30) NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pay_id` tinyint(2) NOT NULL DEFAULT '1' COMMENT '支付方式',
  `express_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '邮费/运费',
  `prdouct_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '产品总价格',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '总价格',
  `consignee` varchar(30) DEFAULT '' COMMENT '收件人',
  `address` varchar(255) NOT NULL DEFAULT '',
  `zip` int(10) NOT NULL DEFAULT '0',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `order_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `distribution_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配送状态',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `confirm_time` datetime DEFAULT NULL COMMENT '确认时间',
  `pay_time` datetime DEFAULT NULL COMMENT '支付时间',
  `distribution_time` datetime DEFAULT NULL COMMENT '配送时间',
  PRIMARY KEY (`order_id`),
  KEY `add_time` (`add_time`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_picture
-- ----------------------------
DROP TABLE IF EXISTS `gd_picture`;
CREATE TABLE `gd_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `copyfrom` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `picture_urls` text COMMENT '图片地址',
  `content` text COMMENT '内容',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `point` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_product
-- ----------------------------
DROP TABLE IF EXISTS `gd_product`;
CREATE TABLE `gd_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `picture_urls` text COMMENT '图片地址',
  `content` text COMMENT '内容',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `market_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `brand` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌',
  `units` varchar(50) NOT NULL DEFAULT '' COMMENT '单位',
  `specification` varchar(50) NOT NULL DEFAULT '' COMMENT '规格',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `point` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_search_all
-- ----------------------------
DROP TABLE IF EXISTS `gd_search_all`;
CREATE TABLE `gd_search_all` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `arc_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  `point` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `delete_status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_soft
-- ----------------------------
DROP TABLE IF EXISTS `gd_soft`;
CREATE TABLE `gd_soft` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `picture_urls` text,
  `content` text COMMENT '内容',
  `update_log` text COMMENT '更新日志',
  `down_link` text COMMENT '下载地址',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `version` varchar(20) NOT NULL DEFAULT '' COMMENT '版本号',
  `soft_type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '软件类型',
  `copy_type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '授权形式',
  `language` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '语言',
  `os` varchar(100) NOT NULL DEFAULT '' COMMENT '运行环境',
  `file_size` varchar(10) NOT NULL DEFAULT '' COMMENT '文件大小',
  `official_url` varchar(100) NOT NULL DEFAULT '' COMMENT '官方网站',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `point` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_special
-- ----------------------------
DROP TABLE IF EXISTS `gd_special`;
CREATE TABLE `gd_special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `short_title` varchar(100) NOT NULL DEFAULT '' COMMENT '副标题',
  `color` char(10) NOT NULL DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `description` varchar(255) NOT NULL DEFAULT '',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `content` text COMMENT '内容',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `point` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `filename` varchar(60) DEFAULT '',
  `template` varchar(60) NOT NULL DEFAULT '',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_tag
-- ----------------------------
DROP TABLE IF EXISTS `gd_tag`;
CREATE TABLE `gd_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) NOT NULL DEFAULT '',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档数',
  `hit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `sort` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `add_time` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gd_tag_index
-- ----------------------------
DROP TABLE IF EXISTS `gd_tag_index`;
CREATE TABLE `gd_tag_index` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `arc_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  PRIMARY KEY (`tag_id`,`arc_id`,`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
