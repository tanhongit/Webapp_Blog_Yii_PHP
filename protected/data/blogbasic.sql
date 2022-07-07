-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 09:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogbasic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `meta_key` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `description`, `status`, `meta_key`, `meta_description`, `create_time`, `update_time`) VALUES
(1, 'Lenovo', 'sếtgr', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Dell', '', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Asus', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'HP', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `author` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1622098175),
('m210514_021022_lookup', 1622098179),
('m210514_021723_user', 1622098179),
('m210514_022239_post', 1622098180),
('m210514_022656_comment', 1622098180),
('m210514_023450_tag', 1622098180),
('m210514_024239_post_foreigin_key', 1622098181),
('m210514_024701_comment_foreigin_key', 1622098182),
('m210521_080731_product', 1622098182),
('m210521_082103_category', 1622098182),
('m210521_082404_product_category_foreigin_key', 1622098184),
('m210602_062822_order', 1622617744);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_optional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `ship_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_company_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address_optional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `tag`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(3, 'The First Post', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio obcaecati eius necessitatibus rerum, harum, fugiat ducimus eos consequatur aliquam repellendus perferendis dolor iure esse ipsum nobis! Nobis aspernatur atque ex?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio obcaecati eius necessitatibus rerum, harum, fugiat ducimus eos consequatur aliquam repellendus perferendis dolor iure esse ipsum nobis! Nobis aspernatur atque ex?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio obcaecati eius necessitatibus rerum, harum, fugiat ducimus eos consequatur aliquam repellendus perferendis dolor iure esse ipsum nobis! Nobis aspernatur atque ex?\r\n\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Odio obcaecati eius necessitatibus rerum, harum, fugiat ducimus eos consequatur aliquam repellendus perferendis dolor iure esse ip', '1', 1, '2021-05-28 17:17:34', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `meta_key` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `description`, `category_id`, `price`, `image`, `image2`, `image3`, `image4`, `status`, `meta_key`, `meta_description`, `create_time`, `update_time`, `author_id`) VALUES
(1, 'Dell M4700', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.', 2, 15000000, '/uploads/1622098297_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg', '', '', '', NULL, '', '', '2021-05-27 13:51:37', '0000-00-00 00:00:00', 1),
(2, 'Dell M4800', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.', 2, 18000000, '/uploads/1622098363_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg', '', '', '', 1, '', '', '2021-05-27 13:52:43', '0000-00-00 00:00:00', NULL),
(3, 'Dell M4800 VGA K2000', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.', 2, 18000000, '/uploads/1622098389_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg', '', '', '', NULL, '', '', '2021-05-27 13:53:09', '0000-00-00 00:00:00', NULL),
(4, 'Máy tính HP 1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptas laudantium minus? Quidem, corporis sunt asperiores similique, obcaecati magnam mollitia ad voluptatibus a omnis ducimus minima ipsa necessitatibus temporibus voluptate.', 4, 18000000, '/uploads/1622098411_1-thiet-ke-ben-ngoai-cua-dell-precision-m4800.jpg', '', '', '', NULL, '', '', '2021-05-27 13:53:31', '0000-00-00 00:00:00', NULL),
(5, 'Laptop  Dell Precision 7710 Core I7', 'Laptop  Dell Precision 7710 Core I7Laptop  Dell Precision 7710 Core I7Laptop  Dell Precision 7710 Core I7', 2, 14500000, '/uploads/1622124648_laptop-cu-dell-precision-7710-core-i7-3.jpg', '', '', '', NULL, '', '', '2021-05-27 21:10:48', '0000-00-00 00:00:00', NULL),
(6, 'LAPTOP HP Elitebook 820-G2', 'LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2LAPTOP HP Elitebook 820-G2', 4, 15000000, '/uploads/1622124836_LAPTOP-HP-Elitebook-820-G2.jpg', '', '', '', NULL, '', '', '2021-05-27 21:13:56', '0000-00-00 00:00:00', NULL),
(7, 'Laptop Asus Vivobook X509JP i5 1035G1 2020', 'Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020Laptop Asus Vivobook X509JP i5 1035G1 2020', 3, 19500000, '/uploads/1622124995_121277701_352157449201209_8169048760513127722_n.jpg', '', '', '', NULL, '', '', '2021-05-27 21:16:35', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `profile`) VALUES
(1, 'admin', 'admin', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`);

--
-- Indexes for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_post` (`author_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_category` (`category_id`);

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_user_post` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
