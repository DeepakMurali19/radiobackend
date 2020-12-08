-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 07, 2019 at 10:48 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `castio`
--

-- --------------------------------------------------------

--
-- Table structure for table `apple`
--

CREATE TABLE `apple` (
  `id` int(11) NOT NULL,
  `name_track` text NOT NULL,
  `cover_url` text NOT NULL,
  `name_radio` text NOT NULL,
  `track_url` text NOT NULL,
  `is_found` tinyint(4) NOT NULL DEFAULT '0',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_covercat` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `url_covercat`, `added`) VALUES
(81, 'RADIO RECORD', '123.jpg', '2018-12-17 17:59:34'),
(82, 'Radio Pop', '600x600wa.jpg', '2019-01-04 19:06:03'),
(83, 'Jazz radio', 'btr-default-image-for-user-profile.jpg', '2019-01-04 19:06:41'),
(84, 'Ground radio', 'download.png', '2019-01-04 19:07:24'),
(85, 'Trap', 'TRAP-FOR-RADIO-cover.jpg', '2019-01-04 19:07:56'),
(86, 'House radio', 'RadioWaves_store_c6160bf0-4048-48c1-9656-ac923651be54.png', '2019-01-04 19:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 'testkey', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_desc` text NOT NULL,
  `module_icon` varchar(100) NOT NULL,
  `ordering` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `module_desc`, `module_icon`, `ordering`) VALUES
(1, 'users', 'Administrator & demo', 'glyphicon glyphicon-cog', 1),
(2, 'category', 'Radio Style', 'glyphicon glyphicon-bullhorn', 2),
(3, 'radio', 'Radio station', 'glyphicon glyphicon-headphones', 3),
(4, 'apple', 'Apple Music', 'fa fa-apple', 4),
(5, 'news', 'Radio News', 'glyphicon glyphicon-list-alt', 5),
(7, 'podcast', 'Podcast', 'glyphicon glyphicon-music', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `image_file` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `image`, `image_file`, `date`) VALUES
(1, 'Test N', ' Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. ', 'http://192.168.0.77/castio/uploads/Heart-Attack-Jump-Smokers-Radio-Edit-Single-cover.jpg', 'Heart-Attack-Jump-Smokers-Radio-Edit-Single-cover.jpg', '2019-01-04 19:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`user_id`, `module_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `podcast`
--

CREATE TABLE `podcast` (
  `id` int(11) NOT NULL,
  `track_name` text CHARACTER SET utf8 NOT NULL,
  `track_file` text CHARACTER SET utf8 NOT NULL,
  `file` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podcast`
--

INSERT INTO `podcast` (`id`, `track_name`, `track_file`, `file`) VALUES
(1, 'Test P', 'http://192.168.0.77/castio/music/4656_tom_budin_lucia.mp3', '4656_tom_budin_lucia.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `push`
--

CREATE TABLE `push` (
  `id` int(11) NOT NULL,
  `textpush` text CHARACTER SET utf8 NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `push`
--

INSERT INTO `push` (`id`, `textpush`, `added`) VALUES
(15, 'sdfgsdgsdgsdgsdgsdgsdgsdgsdgsdfgsdg', '2016-04-07 23:07:00'),
(16, 'zxvzxvzxvzxvzxvzxvzxvzxv', '2016-04-07 23:08:17'),
(17, 'zxvzxvzxvzxvzxvzxvzxvzxv', '2016-04-07 23:09:05'),
(18, 'asdfasfvxvzxvzxvzxvzxvzxv', '2016-04-07 23:09:26'),
(19, 'asfasdfasdfasdfasdf', '2016-04-07 23:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `radio_url` text NOT NULL,
  `image_url` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_id` int(11) NOT NULL,
  `image_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `radio`
--

INSERT INTO `radio` (`id`, `name`, `radio_url`, `image_url`, `added`, `cat_id`, `image_file`) VALUES
(15, 'SLOW FM', 'http://air2.radiorecord.ru:805/mdl_320', 'http://192.168.0.77/castio/uploads/1024.png', '2018-12-17 17:59:56', 81, '1024.png'),
(16, 'Deep House Network', 'http://51.254.130.212:8000', 'http://192.168.0.77/castio/uploads/Heart-Attack-Jump-Smokers-Radio-Edit-Single-cover.jpg', '2019-01-04 19:18:08', 86, 'Heart-Attack-Jump-Smokers-Radio-Edit-Single-cover.jpg'),
(17, 'Hirschmilch Prog-House', 'http://144.76.106.52:7000/prog-house.mp3', 'http://192.168.0.77/castio/uploads/11175.jpeg', '2019-01-04 19:19:39', 86, '11175.jpeg'),
(18, 'OUR HOUSE FM', 'http://5.63.151.52:7136', 'http://192.168.0.77/castio/uploads/b1a8d3a9-e3f9-41c6-9576-55260779bb11_grande.jpg', '2019-01-04 19:55:19', 86, 'b1a8d3a9-e3f9-41c6-9576-55260779bb11_grande.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'admin', 'Administrator'),
(2, 'manager', 'Manager'),
(3, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE `role_access` (
  `role_id` int(11) NOT NULL,
  `action_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_access`
--

INSERT INTO `role_access` (`role_id`, `action_id`) VALUES
(1, 'add'),
(1, 'edit'),
(1, 'delete'),
(1, 'publish'),
(2, 'add'),
(2, 'edit'),
(2, 'publish'),
(1, 'module'),
(1, 'ban'),
(2, 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `trend`
--

CREATE TABLE `trend` (
  `id` int(11) NOT NULL,
  `radio_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trend`
--

INSERT INTO `trend` (`id`, `radio_id`, `count`) VALUES
(50, 15, 12),
(51, 16, 12),
(52, 17, 9),
(53, 18, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` text NOT NULL,
  `user_pass` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_owner` tinyint(1) NOT NULL DEFAULT '0',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `role_id`, `is_owner`, `added`, `status`, `deleted`) VALUES
(1, 'admin', 'help@appteve.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2016-02-04 12:34:53', 1, 0),
(6, 'demo', 'demo@appteve.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 3, 1, '2016-02-29 10:19:08', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apple`
--
ALTER TABLE `apple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push`
--
ALTER TABLE `push`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `trend`
--
ALTER TABLE `trend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apple`
--
ALTER TABLE `apple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `push`
--
ALTER TABLE `push`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trend`
--
ALTER TABLE `trend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
