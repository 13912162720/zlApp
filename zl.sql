-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-03-27 02:33:25
-- 服务器版本： 5.7.15
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zl`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL COMMENT 'id',
  `cid` int(11) NOT NULL COMMENT '课程id',
  `lid` int(11) NOT NULL COMMENT '不需要，用创建时间代替//当前课程数id，越大越近',
  `l_title` varchar(128) NOT NULL COMMENT '文章名称',
  `text` longtext NOT NULL COMMENT '正文',
  `l_thumbnail` varchar(255) NOT NULL COMMENT '当前课程缩略图',
  `create_time` int(16) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `cid`, `lid`, `l_title`, `text`, `l_thumbnail`, `create_time`) VALUES
(1, 1, 1, '', '123sadasdas', '1-1', 20170308),
(2, 2, 1, '123', '123321', '123', 123321213),
(3, 2, 2, '2', '2', '2', 146723223);

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL COMMENT 'id',
  `title` varchar(256) NOT NULL COMMENT '课程名称',
  `subhead` varchar(128) NOT NULL COMMENT '副标题',
  `news` varchar(4196) NOT NULL COMMENT '最新',
  `price` int(11) NOT NULL COMMENT '价格',
  `unit` char(16) NOT NULL COMMENT '价格单位',
  `thumbnail` varchar(256) DEFAULT NULL COMMENT '缩略图',
  `banner` varchar(255) DEFAULT NULL,
  `s_intro` varchar(1024) DEFAULT NULL COMMENT '简介',
  `l_intro` varchar(4196) DEFAULT NULL COMMENT '介绍',
  `author` varchar(64) DEFAULT NULL COMMENT '作者',
  `author_intro` varchar(4196) DEFAULT NULL COMMENT '作者介绍',
  `suit` varchar(256) DEFAULT NULL COMMENT '适宜人群',
  `notice` varchar(4196) DEFAULT NULL COMMENT '须知',
  `reco` varchar(4196) DEFAULT NULL COMMENT '推荐语',
  `comment` text NOT NULL COMMENT '评价',
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`id`, `title`, `subhead`, `news`, `price`, `unit`, `thumbnail`, `banner`, `s_intro`, `l_intro`, `author`, `author_intro`, `suit`, `notice`, `reco`, `comment`, `update_time`) VALUES
(1, '1', '', '1', 1, '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', 0),
(2, '2', '', '2', 2, '2', '2', NULL, '2', '2', '2', '2', '2', '2', '2', '2', 0),
(3, '3', '', '3', 3, '3', '3', NULL, '3', '3', '3', '3', '3', '3', '3', '3', 0),
(4, '4', '', '4', 4, '4', '4', NULL, '4', '4', '4', '4', '4', '4', '4', '4', 0);

-- --------------------------------------------------------

--
-- 表的结构 `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `cid` int(11) NOT NULL COMMENT '课程id',
  `s_time` int(11) NOT NULL COMMENT '开始时间',
  `e_time` int(11) NOT NULL COMMENT '结束时间'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `subscribe`
--

INSERT INTO `subscribe` (`id`, `uid`, `cid`, `s_time`, `e_time`) VALUES
(1, 1, 2, 12312, 3213123),
(2, 1, 3, 123, 123);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `openid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `openid`) VALUES
(1, 'oRfAns_c3v_WCGKVx2cCHFGH4M-Y'),
(2, 'oRfAns7ia-_UHPXgZqWXAPMb_rHY'),
(3, 'oRfAns3qzEgrNyobS1zdOfGQGB2g'),
(4, 'oRfAns_vL4bWES_NLETkEqYpK6W8'),
(5, 'oRfAnszxah76HPStxpXIfDkfothg'),
(6, 'oRfAns1B4QqkNMgeNimuJAY0HEko'),
(7, 'oRfAnsxRo4t5E6vVfbqr9C1skCY4'),
(8, 'oRfAns1iFnf8Jlnp2DNyBMlBNJvE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`(32));

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
