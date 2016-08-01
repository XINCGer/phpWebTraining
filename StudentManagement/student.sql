-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 07 月 19 日 07:02
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `student`
--

-- --------------------------------------------------------

--
-- 表的结构 `kcb`
--

CREATE TABLE IF NOT EXISTS `kcb` (
  `kch` varchar(100) COLLATE utf8_bin NOT NULL,
  `kcm` varchar(30) COLLATE utf8_bin NOT NULL,
  `kkxq` int(10) NOT NULL DEFAULT '1',
  `xs` int(10) NOT NULL DEFAULT '0',
  `xf` int(10) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`kch`),
  UNIQUE KEY `kch` (`kch`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `kcb`
--

INSERT INTO `kcb` (`kch`, `kcm`, `kkxq`, `xs`, `xf`, `uid`) VALUES
('1', '软件技术', 1, 12, 100, 1),
('222', '网络基础', 1, 0, 0, 0),
('22', 'Unity3D游戏开发', 3, 3, 3, 0),
('3', 'Python程序设计', 2, 2, 2, 0),
('4', '计算机图形学', 2, 4, 4, 0);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `pwd` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `pwd`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `xsb`
--

CREATE TABLE IF NOT EXISTS `xsb` (
  `xh` varchar(6) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `xm` varchar(8) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `xb` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别',
  `cssj` date NOT NULL COMMENT '出生时间',
  `zy` varchar(12) COLLATE utf8_bin NOT NULL COMMENT '专业',
  `zxf` int(4) NOT NULL COMMENT '总学分',
  `bz` varchar(11) COLLATE utf8_bin NOT NULL COMMENT '备注',
  `kc` varchar(100) COLLATE utf8_bin NOT NULL,
  `cj` int(100) NOT NULL,
  PRIMARY KEY (`xh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `xsb`
--

INSERT INTO `xsb` (`xh`, `xm`, `xb`, `cssj`, `zy`, `zxf`, `bz`, `kc`, `cj`) VALUES
('12', '段伟光', 99, '0000-00-00', '99', 99, '99', '软件技术', 100),
('120', '张三', 0, '1994-08-12', '88', 88, '88', 'Unity3D游戏开发', 97),
('123', '张三丰', 99, '1992-09-09', '99', 99, '99', '网络基础', 96),
('123412', '喜爱哈哈', 99, '1992-09-09', '99', 99, '99', '网络基础', 98),
('333', '马五', 1, '1994-08-23', '99', 99, '99', '软件技术', 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
