-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-28 09:32:16
-- 服务器版本： 5.1.73-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- 表的结构 `memoinfo`
--

CREATE TABLE IF NOT EXISTS `memoinfo` (
  `mID` int(11) NOT NULL AUTO_INCREMENT,
  `qID` int(11) NOT NULL DEFAULT '0' COMMENT '问题ID',
  `content` text,
  `sender` varchar(64) DEFAULT NULL COMMENT '发送者uid',
  `senderName` varchar(64) DEFAULT NULL COMMENT '发送者名称',
  `createTime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`mID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
