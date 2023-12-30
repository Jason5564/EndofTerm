-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-30 19:20:19
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `learn_platform`
--

-- --------------------------------------------------------

--
-- 資料表結構 `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `note_name` varchar(20) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `opening_course`
--

CREATE TABLE `opening_course` (
  `id` int(11) NOT NULL,
  `school` varchar(20) NOT NULL,
  `Course_Title` varchar(20) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `opening_course`
--

INSERT INTO `opening_course` (`id`, `school`, `Course_Title`, `url`) VALUES
(1001, '逢甲大學', '微積分', 'https://www.junyiacademy.org/course-compare/math-univ/math-calculus/feng-chia-calculus'),
(1002, '台灣大學', '普通物理學實驗', 'http://ocw.aca.ntu.edu.tw/ntu-ocw/ocw/cou/110S105'),
(1003, '清華大學', '材料力學', 'https://ocw.nthu.edu.tw/ocw/index.php?page=course&cid=8&'),
(1004, '成功大學', '語言學概論', 'https://i-ocw.ctld.ncku.edu.tw/site/course_content/F22R2S22hji'),
(1005, '台灣大學', '微積分', 'http://ocw.aca.ntu.edu.tw/ntu-ocw/ocw/cou/100S111'),
(1006, '台灣大學', '材料力學', 'http://ocw.aca.ntu.edu.tw/ntu-ocw/ocw/cou/103S111'),
(1007, '成功大學', '微積分(一)', 'https://i-ocw.ctld.ncku.edu.tw/site/course_content/arS_S_00219'),
(1008, '成功大學', '微積分(二)', 'https://i-ocw.ctld.ncku.edu.tw/site/course_content/bqr1_rR0S9e'),
(1009, '清華大學', '微積分一', 'https://ocw.nthu.edu.tw/ocw/index.php?page=course&cid=7&'),
(1010, '清華大學', '微積分二', 'https://ocw.nthu.edu.tw/ocw/index.php?page=course&cid=34&'),
(1011, '陽明交通大學', '微積分(一)', 'https://ocw.nycu.edu.tw/?course_page=all-course%2Fcollege-of-science%2Fam%2F微積分一-calculus-i-103學年度-應用數學系-莊重老師'),
(1012, '陽明交通大學', '材料力學', 'https://ocw.nycu.edu.tw/?course_page=all-course%2Fcollege-of-engineering%2F材料力學-mechanics-of-materials-108學年度-材料科學與工程學系-鄒年'),
(1013, '陽明交通大學', '電子學(一)(二)', 'https://ocw.nycu.edu.tw/?course_page=all-course%2Fcollege-of-science%2Fep%2F電子學一二-electronics-i、ii-電子物理系-陳振芳老師');

-- --------------------------------------------------------

--
-- 資料表結構 `qa_shows`
--

CREATE TABLE `qa_shows` (
  `id` int(11) NOT NULL,
  `post_user` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `qa_shows`
--

INSERT INTO `qa_shows` (`id`, `post_user`, `title`, `content`, `created_at`) VALUES
(1, 'Ray', 'AAAAAA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-12-29 16:05:43'),
(2, 'TTR', 'BBBBB', '12312312312\r\n2\r\n323oi1br12\r\n\r\n213124\r\n124', '2023-12-29 16:05:43'),
(8, 'aaa', 'ww', 'wewewe', '2023-12-30 13:35:24'),
(13, 'aaa', '22222222222', '1313313', '2023-12-30 16:07:21'),
(14, 'aaa', 'daadad', 'wd', '2023-12-30 16:50:29'),
(15, 'bbb', '324234', '2424', '2023-12-30 17:13:55');

-- --------------------------------------------------------

--
-- 資料表結構 `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `content` mediumtext NOT NULL,
  `qa_id` int(11) NOT NULL,
  `response_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `response`
--

INSERT INTO `response` (`id`, `user_name`, `content`, `qa_id`, `response_time`) VALUES
(1, 'aaa', 'testeststestsetsts', 1, '2023-12-30 15:58:32'),
(2, 'bbb', 'eewewrwerwerwer', 1, '2023-12-30 15:58:32'),
(5, 'aaa', 'sadsadada', 1, '2023-12-30 15:58:32'),
(6, 'aaa', 'sdadad', 1, '2023-12-30 15:58:32'),
(7, 'aaa', 'lll', 1, '2023-12-30 15:58:32'),
(8, 'aaa', 'jkhjk', 2, '2023-12-30 15:58:32'),
(9, 'aaa', 'www', 1, '2023-12-30 15:58:47'),
(10, 'aaa', 'ww', 1, '2023-12-30 16:50:23'),
(11, 'bbb', '33344', 1, '2023-12-30 17:14:04'),
(12, 'bbb', 'sss', 14, '2023-12-30 18:19:56');

-- --------------------------------------------------------

--
-- 資料表結構 `user_account`
--

CREATE TABLE `user_account` (
  `id` varchar(15) NOT NULL,
  `hash_pwd` varchar(80) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `nickname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_account`
--

INSERT INTO `user_account` (`id`, `hash_pwd`, `gmail`, `nickname`) VALUES
('aaa', '$2y$10$vV6.EB7WgfRNHB3BnUh4HOi1UwBlBbt68J2tIXXM00FvtOFNzBKUG', 'rayc021014@gmail.com', 'qwe'),
('bbb', '$2y$10$qkn15Dn85wFwND0fhnkFVODdzgjaJpWEDPQCg8EMGpOPaWJjHtA0G', 'ss@email.com', 'qwe');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `notes`
--
ALTER TABLE `notes`
  ADD KEY `note_id` (`note_id`);

--
-- 資料表索引 `opening_course`
--
ALTER TABLE `opening_course`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `qa_shows`
--
ALTER TABLE `qa_shows`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `opening_course`
--
ALTER TABLE `opening_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `qa_shows`
--
ALTER TABLE `qa_shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
