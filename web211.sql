SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web211`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `create_time`, `update_time`, `id_product`, `id_user`, `content`) VALUES
(1, '2021-10-09 08:40:28', '2021-10-09 08:40:28', 1, 2, 'ok á'),
(2, '2021-10-09 08:40:44', '2021-10-09 08:40:44', 2, 3, 'cũng được');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `note` varchar(255) DEFAULT NULL,
  `number` int(10) UNSIGNED DEFAULT NULL,
  `money` int(10) UNSIGNED DEFAULT NULL,
  `is_paid` bit(1) DEFAULT b'0',
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `create_time`, `update_time`, `note`, `number`, `money`, `is_paid`, `id_product`, `id_user`) VALUES
(3, '2021-10-05 08:47:37', '2021-10-05 08:47:37', 'mua2', 3, 600000, b'1', 1, 2),
(4, '2021-10-05 08:48:01', '2021-10-05 08:48:01', 'mua3', 1, 400000, b'1', 2, 2),
(6, '2021-10-06 00:00:00', '2021-10-06 00:00:00', 'mua5', 2, 150000, b'1', 2, 3),
(7, '2021-10-07 00:00:00', '2021-10-07 00:00:00', 'mua6', 2, 200000, b'1', 1, 3),
(8, '2021-10-08 00:00:00', '2021-10-08 00:00:00', 'mua7', 2, 800000, b'1', 1, 3),
(9, '2021-10-09 00:00:00', '2021-10-09 00:00:00', 'mua6', 2, 200000, b'1', 1, 3),
(10, '2021-10-10 00:00:00', '2021-10-10 00:00:00', 'mua6', 2, 200000, b'1', 1, 3),
(11, '2021-10-11 00:00:00', '2021-10-11 00:00:00', 'mua6', 2, 200000, b'1', 1, 3),
(12, '2021-10-12 00:00:00', '2021-10-12 00:00:00', 'mua6', 2, 500000, b'1', 1, 3),
(13, '2021-10-05 10:18:33', '2021-10-05 10:18:33', 'test', 1, 100000, b'1', 1, 3),
(14, '2021-10-12 05:18:04', '2021-10-12 05:18:04', 'mua12', 2, 900000, b'1', 1, 2),
(15, '2021-10-09 08:07:47', '2021-10-09 08:07:47', NULL, 3, 900000, b'1', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `discount` int(10) UNSIGNED DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `create_time`, `update_time`, `type`, `name`, `number`, `description`, `price`, `discount`, `image`, `is_deleted`) VALUES
(1, '2021-09-27 09:53:35', '2021-09-27 09:53:35', 'giải cảm', 'Bột Gừng Túi Lọc', 1, 'Dùng để pha trà, giải cảm, chữa cúm, vv, just test', 45000, 10, 'tragiaicam.jpg', b'0'),
(2, '2021-09-27 09:54:38', '2021-09-27 09:54:38', 'giải cảm', 'Combo Giải Cảm 1', 5, 'Combo giải cảm', 330000, 10, 'combo1.png', b'0'),
(3, '2021-10-08 14:23:32', '2021-10-08 14:23:32', 'test', 'test', 0, 'test', 12, 21, 'tesst', b'1'),
(4, '2021-10-08 14:34:37', '2021-10-08 14:34:37', 'test', 'test', 0, 'test thoi', 12, 1, 'Untitled Diagram.drawio.png', b'1'),
(5, '2021-10-08 14:35:24', '2021-10-08 14:35:24', 'test', 'test', 0, 'test thoi', 12, 1, 'Untitled Diagram.drawio.png', b'1'),
(6, '2021-10-08 14:36:12', '2021-10-08 14:36:12', 'test', 'Internship', 0, 'test thoi', 12, 1, 'Untitled Diagram.drawio.png', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'create time',
  `update_time` datetime DEFAULT current_timestamp() COMMENT 'update time',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `roles` bit(1) DEFAULT b'0',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `create_time`, `update_time`, `username`, `password`, `name`, `email`, `address`, `roles`, `is_deleted`) VALUES
(2, '2021-09-27 09:31:13', '2021-09-27 09:31:13', 'john', '123123', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(3, '2021-09-27 09:32:23', '2021-09-27 09:32:23', 'test', 'test', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(4, '2021-10-09 06:42:41', '2021-10-09 06:42:41', 'root', '', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(5, '2021-10-09 06:45:26', '2021-10-09 06:45:26', 'root', '', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(6, '2021-10-09 06:47:31', '2021-10-09 06:47:31', 'username', 'password', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(7, '2021-10-09 06:48:13', '2021-10-09 06:48:13', 'username', 'password', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(8, '2021-10-09 07:07:44', '2021-10-09 07:07:44', 'tets', 'test', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(9, '2021-10-09 07:08:26', '2021-10-09 07:08:26', 'John', '12', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(10, '2021-10-09 07:11:05', '2021-10-09 07:11:05', 'John', '12', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(11, '2021-10-09 07:19:57', '2021-10-09 07:19:57', 'JohnHoan', 'test', 'John Nguyen', 'hoan.nguyenjohn2004@hcmut.edu.vn', 'Ho Chi Minh city Viet Nam', b'1', b'1'),
(12, '2021-10-09 07:23:36', '2021-10-09 07:23:36', 'john', '123', 'John', 'john@gmail.com', 'HCM', b'1', b'0'),
(13, '2021-10-09 07:24:09', '2021-10-09 07:24:09', 'test', 'test', 'Test', 'test@gmail.com', 'NA', b'0', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;