-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 03:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'Danh mục sản phẩm', 'Danh mục sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 0, ''),
(2, 'Xem danh mục', 'Xem danh sách danh mục sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 1, 'list_category'),
(3, 'Thêm danh mục', 'Thêm mới danh mục sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 1, 'add_category'),
(4, 'Sửa danh mục', 'Cập nhật danh mục sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 1, 'edit_category'),
(5, 'Xóa danh mục', 'Xóa danh mục sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 1, 'delete_category'),
(6, 'Menu', 'Menu', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 0, ''),
(7, 'Xem menu', 'Xem danh sách menu', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 6, 'list_menu'),
(8, 'Thêm menu', 'Thêm mới menu', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 6, 'add_menu'),
(9, 'Sửa menu', 'Cập nhật menu', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 6, 'edit_menu'),
(10, 'Xóa menu', 'Xóa menu', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 6, 'delete_menu'),
(11, 'Sản phẩm', 'Sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 0, ''),
(12, 'Xem sản phẩm', 'Xem danh sách sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 11, 'list_product'),
(13, 'Thêm sản phẩm', 'Thêm mới sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 11, 'add_product'),
(14, 'Sửa sản phẩm', 'Cập nhật sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 11, 'edit_product'),
(15, 'Xóa sản phẩm', 'Xóa sản phẩm', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 11, 'delete_product'),
(16, 'Slider', 'Slider', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 0, ''),
(17, 'Xem slider', 'Xem danh sách slider', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 16, 'list_slider'),
(18, 'Thêm slider', 'Thêm mới slider', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 16, 'add_slider'),
(19, 'Sửa slider', 'Cập nhật slider', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 16, 'edit_slider'),
(20, 'Xóa slider', 'Xóa slider', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 16, 'delete_slider'),
(21, 'Cấu hình', 'Cấu hình', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 0, ''),
(22, 'Xem cấu hình', 'Xem danh sách cấu hình', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 21, 'list_setting'),
(23, 'Thêm cấu hình', 'Thêm mới cấu hình', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 21, 'add_setting'),
(24, 'Sửa cấu hình', 'Cập nhật cấu hình', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 21, 'edit_setting'),
(25, 'Xóa cấu hình', 'Xóa cấu hình', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 21, 'delete_setting'),
(26, 'Tài khoản', 'Tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 0, ''),
(27, 'Xem tài khoản', 'Xem danh sách tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 26, 'list_user'),
(28, 'Thêm tài khoản', 'Thêm mới tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 26, 'add_user'),
(29, 'Sửa tài khoản', 'Cập nhật tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 26, 'edit_user'),
(30, 'Xóa tài khoản', 'Xóa tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 26, 'delete_user'),
(31, 'Nhóm tài khoản', 'Nhóm tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 0, ''),
(32, 'Xem nhóm tài khoản', 'Xem danh sách nhóm tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 31, 'list_role'),
(33, 'Thêm nhóm tài khoản', 'Thêm mới nhóm tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 31, 'add_role'),
(34, 'Sửa nhóm tài khoản', 'Cập nhật nhóm tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 31, 'edit_role'),
(35, 'Xóa nhóm tài khoản', 'Xóa nhóm tài khoản', '2021-02-18 17:00:00', '2021-02-18 17:00:00', 31, 'delete_role');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
