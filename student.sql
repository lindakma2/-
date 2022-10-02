-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-06-11 16:28:41
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `myschool`
--

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `stdnum` varchar(11) NOT NULL,
  `stdname` varchar(12) NOT NULL,
  `department` varchar(12) NOT NULL,
  `stddate` varchar(12) NOT NULL,
  `stdtime` varchar(12) NOT NULL,
  `classroom` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`stdnum`, `stdname`, `department`, `stddate`, `stdtime`, `classroom`) VALUES
('S10859007', '陳博琳', '資工2', '5/13', '2-4', 'z105'),
('S10859008', '許雅婷', '資工2', '5/13', '4-6', 'z105');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
