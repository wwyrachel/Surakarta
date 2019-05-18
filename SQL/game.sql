-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-15 20:00:29
-- 伺服器版本: 5.7.20-log
-- PHP 版本： 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `a2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `lose` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `locatLat` varchar(50) NOT NULL,
  `locatLng` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `game`
--

INSERT INTO `game` (`id`, `win`, `lose`, `username`, `password`, `gender`, `age`, `locatLat`, `locatLng`) VALUES
(14, 5, 0, 'john12', '123', 'Male', 5, '22.3055658', '114.18872329999999'),
(18, 3, 0, 'sam23', '234', 'Male', 33, '22.2418581', '114.15285319999998'),
(20, 4, 5, 'tina45', '123', 'Female', 65, '22.3771304', '114.19743979999998'),
(21, 0, 9, 'mary12', '123', 'Female', 4, '22.543096', '114.05786499999999'),
(22, 3, 4, 'joe567', '234', 'Male', 10, '22.2016179', '114.02650070000004'),
(23, 2, 0, 'sara23', '234', 'Female', 46, '22.3285899', '114.16028460000007'),
(24, 2, 1, 'jacky45', '123', 'Male', 8, '22.3476872', '114.1106972'),
(25, 3, 1, 'sam23', '234', 'Male', 33, '22.2418581', '114.15285319999998');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
