-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 02:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovhijog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `created_time`, `user_id`, `post_id`) VALUES
(23, '12123123', '2022-09-09 00:36:21', 2, 3),
(24, 'sdfdsfsdf', '2022-09-09 00:36:25', 2, 3),
(25, 'fdsddsds', '2022-09-09 00:36:27', 2, 3),
(26, 'sdasdsd', '2022-09-09 00:36:31', 2, 3),
(27, 'gfgfgfgs', '2022-09-09 00:36:54', 2, 3),
(28, 'Nice pic bhai', '2022-09-09 01:23:32', 2, 8),
(29, 'dgvdcvcv', '2022-09-09 01:24:46', 2, 8),
(30, 'vfcxvfcv', '2022-09-10 19:05:16', 2, 21),
(31, 'cvcvc', '2022-09-10 19:05:18', 2, 21),
(32, 'cvcvc', '2022-09-10 19:05:22', 2, 21),
(33, 'cvcvc', '2022-09-10 19:05:24', 2, 21),
(38, 'hello', '2022-09-16 13:53:43', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `post_id`, `text`) VALUES
(1, 1, 24, '<p>You have a new vote on your post <a href=\"http://localhost/ovijog/posts/show/24\">Title</a><p>'),
(2, 1, 3, '<p>You have a new vote on your post <a href=\"http://localhost/ovijog/posts/show/3\">Its arnab</a><p>'),
(3, 1, 3, '<p>You have a new comment on your post <a href=\"http://localhost/ovijog/posts/show/3\">Its arnab</a><p>'),
(4, 2, 19, '<p>You have a new vote on your post <a href=\"http://localhost/ovijog/posts/show/19\">9</a><p>'),
(5, 1, 19, '<p>Post <a href=\"http://localhost/ovijog/posts/show/19\">9</a> is now solved!<p>'),
(6, 1, 24, '<p>You have a new vote on your post <a href=\"http://localhost/ovijog/posts/show/24\">Title</a><p>');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` longtext DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `issolved` tinyint(1) DEFAULT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `img_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `body`, `category`, `issolved`, `created_time`, `user_id`, `img_link`) VALUES
(3, 'Its arnab', 'Hi, I am Arnab.', 'Political', 1, '2022-09-05 06:11:00', 1, 'http://localhost/ovijog/dir/63153e940a8a3.jpg'),
(8, 'Test', 'Test', 'Political', 1, '2022-09-09 01:21:49', 2, 'http://localhost/ovijog/dir/631a40cd559fb.jpg'),
(9, 'TestTest', 'Testysesas', 'Electricity', 1, '2022-09-09 01:40:00', 2, ''),
(10, 'Te', 'sdfdsfdsfsfg', 'Electricity', 1, '2022-09-09 03:01:20', 2, ''),
(11, '1', '1', 'Electricity', 0, '2022-09-09 06:09:59', 2, ''),
(12, '2', '2', 'Electricity', 0, '2022-09-09 06:10:03', 2, ''),
(13, '3', '3', 'Electricity', 0, '2022-09-09 06:10:07', 2, ''),
(14, '4', '4', 'Electricity', 0, '2022-09-09 06:10:11', 2, ''),
(15, '5', '5', 'Electricity', 0, '2022-09-09 06:10:15', 2, ''),
(16, '6', '6', 'Electricity', 0, '2022-09-09 06:10:21', 2, ''),
(17, '7', '7', 'Electricity', 0, '2022-09-09 06:10:25', 2, ''),
(18, '8', '8', 'Electricity', 0, '2022-09-09 06:10:28', 2, ''),
(19, '9', '9', 'Electricity', 1, '2022-09-09 06:10:32', 2, ''),
(21, 'tags', 'tags test', 'Political', 1, '2022-09-10 16:20:08', 2, ''),
(24, 'Title', 'solve test', 'Eve Teasing', 1, '2022-09-15 21:32:31', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`category`) VALUES
('Electricity'),
('Eve Teasing'),
('Food'),
('Political'),
('Ragging'),
('Residence'),
('Safety'),
('Transport'),
('Water');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `feedback` longtext DEFAULT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `category`, `feedback`, `created_time`, `post_id`, `user_id`) VALUES
(11, 'Bad Language', '', '2022-09-16 17:41:59', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_categories`
--

CREATE TABLE `report_categories` (
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `post_id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`post_id`, `tag`) VALUES
(21, 'hajshauis'),
(21, 'tags'),
(24, 'solve');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `edu_mail` varchar(255) DEFAULT NULL,
  `pass_hash` varchar(255) DEFAULT NULL,
  `isverified` tinyint(1) DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `edu_mail`, `pass_hash`, `isverified`, `isadmin`) VALUES
(1, 'Arnab', 'Dey', 'arnab2514@student.nstu.edu.bd', '$2y$10$WzmxOioDiDNNG5xNqGR5POhsLaV2vWabcFt/18DeIlO6cdnVDSFn2', 1, 0),
(2, 'Arman', 'Blogger', 'armanur2514@student.nstu.edu.bd', '$2y$10$yCKKTyzQIiv8pD4Ou1KuxeQndm2EKsYgttCGf6I8MrqItjJME0X.G', 0, 1),
(7, 'Arnab', 'Dey', 'arnabdey778@gmail.com', '$2y$10$L1f0O.E5AiIwgoNz5.MtI.x2SJKvQcfH6fVAFLC/IyQ24loDka95W', 1, 0),
(9, 'Project', 'Admin', 'projectovijog@gmail.com', '$2y$10$YMYpSTpmOCvibtj4r8Xd2uBhA3b4tGH9o93ZjgP8v2w9YJ8ljEEI2', 0, 1),
(12, 'sadfsd', 'sdsds', 'anupa2514@student.nstu.edu.bd', '$2y$10$jpjg3ddmuj6pqNGGf6JVR.e9W3MB3uOdyJVAkvDpA9XUT70mCJIw6', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verify_keys`
--

CREATE TABLE `verify_keys` (
  `user_id` int(11) NOT NULL,
  `v_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify_keys`
--

INSERT INTO `verify_keys` (`user_id`, `v_key`) VALUES
(1, '31f9f3f101439ef63b774084d5695b8fa3'),
(7, '379e5243862e94685b7074b8033afe5046'),
(9, '39597e6704509c51f324d7559a9f7ae14b'),
(12, '31324142212bdb89d23079486a49595e6531');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`user_id`, `post_id`, `time`) VALUES
(1, 3, '2022-09-06 11:21:29'),
(1, 21, '2022-09-15 21:29:29'),
(1, 24, '2022-09-15 21:32:38'),
(2, 3, '2022-09-06 11:20:53'),
(2, 8, '2022-09-09 01:23:20'),
(2, 9, '2022-09-09 01:40:45'),
(2, 10, '2022-09-09 03:01:23'),
(2, 19, '2022-09-16 14:13:58'),
(2, 21, '2022-09-10 18:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `isagree` tinyint(1) DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`user_id`, `post_id`, `isagree`, `time`) VALUES
(1, 3, 0, '2022-09-06 10:51:36'),
(1, 19, 1, '2022-09-16 14:13:43'),
(1, 24, 1, '2022-09-16 17:49:26'),
(2, 3, 0, '2022-09-06 10:54:06'),
(2, 9, 1, '2022-09-09 01:54:18'),
(2, 10, 0, '2022-09-09 05:17:48'),
(2, 21, 0, '2022-09-10 19:05:38'),
(2, 24, 0, '2022-09-16 13:33:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notifications_ibfk_1` (`user_id`),
  ADD KEY `notifications_ibfk_2` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `report_categories`
--
ALTER TABLE `report_categories`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`post_id`,`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verify_keys`
--
ALTER TABLE `verify_keys`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `verify_keys`
--
ALTER TABLE `verify_keys`
  ADD CONSTRAINT `verify_keys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
