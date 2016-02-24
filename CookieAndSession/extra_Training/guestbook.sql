-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2010 年 08 月 20 日 08:58
-- 服务器版本: 5.0.27
-- PHP 版本: 5.2.1
-- 
-- 数据库: `guestbook`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `message`
-- 

CREATE TABLE `message` (
  `mes_id` int(10) NOT NULL auto_increment COMMENT '留言编号',
  `user_id` int(10) NOT NULL COMMENT '用户编号',
  `title` varchar(500) character set gb2312 NOT NULL COMMENT '主题',
  `content` mediumtext character set gb2312 NOT NULL COMMENT '内容',
  `write_date` datetime NOT NULL COMMENT '留言时间',
  PRIMARY KEY  (`mes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `message`
-- 

INSERT INTO `message` VALUES (1, 4, '大家好', '今天天气晴朗<br />\r\n秋天快来吧', '2010-08-20 15:13:50');
INSERT INTO `message` VALUES (2, 0, '听说。。。', '进口马自达3召回了', '2010-08-20 15:19:48');
INSERT INTO `message` VALUES (4, 2, '我来了', '我要好好学习', '2010-08-20 15:25:45');
INSERT INTO `message` VALUES (5, 3, '科比下季将超越乔丹? 专家:踩着热火夺冠壮举可成', '　　新浪体育讯　北京时间8月20日消息，美国《Dime》杂志的专家雷-杰弗森撰文称，2010-11赛季对于科比-布莱恩特来说意义重大，因为在这一年他将有望超越飞人迈克尔-乔丹。<br />\r\n<br />\r\n　　杰弗森在文章中称，科比现在已经有5枚冠军戒指在手，如果下个赛季他率领湖人卫冕成功实现三连冠，那么他的戒指数量就将再增加一枚，同时追平乔丹。届时势必会有很多人再次旧事重提，拿科比和飞人做比较。尽管科比一直在强调，自己不会活在“乔丹的6枚冠军戒指”的单调目标里，但若能完成此项壮举，他将有望成为一名和乔丹齐名甚至超过他的球员。<br />\r\n<br />\r\n　　过去的几个赛季科比一直大小伤势不断，但是湖人近三个赛季总决赛无一缺席并连续夺得了两个冠军。下个赛季他们面临的最大竞争者是刚刚组建三巨头的热火。如果科比率领湖人击败他们最终夺得总冠军，那么对于24号来说，在这一点上，他的成就是23号所没有的。<br />\r\n<br />\r\n　　杰弗森称乔丹在总决赛的对手都没有强到真正能和公牛匹敌的地步。他认为，乔丹总决赛最强的对手是1993年由查尔斯-巴克利率领的太阳队。但是即便队中也有由巴克利、凯文-约翰逊和丹-马尔利组成的BIG&nbsp;3，不过就天赋和实力上讲，他们不如当今的热火三巨头。<br />\r\n<br />\r\n　　这支由勒布朗-詹姆斯、德维恩-韦德和克里斯-波什的带领的队伍，已经有专家预测他们能够在常规赛拿下70场胜利了。三巨头中的两位是联盟前三的球员，波什也是联盟前五的内线，假设他们和湖人在总决赛相遇，你会看到很多人看好热火，而将湖人看作弱势一方。<br />\r\n<br />\r\n　　其实无论下个赛季如何，科比都将会是最伟大的球员之一，但是如果他能够成为一支像火箭前主帅杰夫-范甘迪所说的常规赛胜场数超越公牛72胜纪录的球队，并最终夺得总冠军，那么他的成就将高出乔丹一个层次。<br />\r\n', '2010-08-20 15:30:49');
INSERT INTO `message` VALUES (6, 7, '请问', '我是李明', '2010-08-20 16:52:06');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `users`
-- 

INSERT INTO `users` VALUES (1, 'Mary', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mary@126.com', '2010-08-07 17:29:45');
INSERT INTO `users` VALUES (3, 'John', '7c222fb2927d828af22f592134e8932480637c0d', 'john@example.com', '2010-08-07 17:34:16');
INSERT INTO `users` VALUES (4, 'Paul', '7d8f4b4b4613dc7e15333e6449692ad4af502d1d', 'paul@example.com', '2010-08-07 17:34:16');
INSERT INTO `users` VALUES (5, 'George', '4cc19aaff82f60ac4097f935ab4a06ad4f0891cc', 'george@example.com', '2010-08-07 17:34:16');
INSERT INTO `users` VALUES (6, 'Ringo', 'a74aec849c6a1de9b8491c43c53fccfbf59c6649', 'ringo@example.com', '2010-08-07 17:34:16');
INSERT INTO `users` VALUES (7, '李明', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'liming@126.com', '2010-08-20 16:50:49');
