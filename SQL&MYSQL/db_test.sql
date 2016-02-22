-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2010 年 08 月 07 日 07:09
-- 服务器版本: 5.0.27
-- PHP 版本: 5.2.1
-- 
-- 数据库: `db_test`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '用户编号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `password` varchar(20) NOT NULL COMMENT '密码',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COMMENT='用户信息表' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` VALUES (1, 'Mary', '123456');
INSERT INTO `user` VALUES (2, 'Jack', '654321');
