-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2010 年 08 月 09 日 03:12
-- 服务器版本: 5.0.27
-- PHP 版本: 5.2.1
-- 
-- 数据库: `mydatabase`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `users`
-- 

CREATE TABLE `users` (
  `user_id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `users`
-- 

INSERT INTO `users` VALUES (1, 'Mary', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mary@126.com', '2010-08-07 17:29:45');
INSERT INTO `users` VALUES (3, 'John', '7c222fb2927d828af22f592134e8932480637c0d', 'john@example.com', '2010-08-07 17:34:16');
INSERT INTO `users` VALUES (4, 'Paul', '7d8f4b4b4613dc7e15333e6449692ad4af502d1d', 'paul@example.com', '2010-08-07 17:34:16');
INSERT INTO `users` VALUES (5, 'George', '4cc19aaff82f60ac4097f935ab4a06ad4f0891cc', 'george@example.com', '2010-08-07 17:34:16');
INSERT INTO `users` VALUES (6, 'Ringo', 'a74aec849c6a1de9b8491c43c53fccfbf59c6649', 'ringo@example.com', '2010-08-07 17:34:16');
