-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2024 lúc 01:14 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotelmanagement`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_details`
--

CREATE TABLE `booking_details` (
  `no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `total_pay` double NOT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_details`
--

INSERT INTO `booking_details` (`no`, `booking_id`, `room_name`, `price`, `total_pay`, `room_no`, `user_name`, `phonenum`, `address`) VALUES
(12, 23, 'Room 1', 30, 31.5, '111', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(13, 24, 'Room 2', 25, 26.25, NULL, 'SodaOnix', '1231221324', 'Đà Nẵng'),
(14, 25, 'Room 1', 30, 31.5, '123', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(15, 26, 'Room 1', 30, 157.5, NULL, 'Lê Quốc Huy', '0706163387', 'Quảng Nam'),
(16, 27, 'Room 3', 20, 21, '112', 'Lê Quốc Huy', '0706163387', 'Quảng Nam'),
(17, 28, 'Room 1', 30, 220.5, NULL, 'qhuy', '0983434543', 'Quảng Bình'),
(18, 29, 'Room 1', 30, 63, NULL, 'qhuy', '0983434543', 'Quảng Bình'),
(19, 30, 'Room 6', 40, 84, NULL, 'Lê Quốc Huy', '0706163387', 'Quảng Nam'),
(20, 31, 'Room 7', 55, 57.75, NULL, 'Lê Quốc Huy', '0706163387', 'Quảng Nam'),
(21, 32, 'Room 5', 30, 31.5, '1', 'Lê Quốc Huy', '0706163387', 'Quảng Nam'),
(22, 33, 'Room 1', 30, 31.5, NULL, 'Lê Quốc Huy', '0706163387', 'Quảng Nam'),
(23, 34, 'Room 1', 30, 31.5, '2', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(24, 35, 'Room 3', 20, 21, '3', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(25, 36, 'Room 6', 40, 42, '1', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(26, 37, 'Room 3', 20, 21, '2', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(27, 38, 'Room 3', 20, 21, '3', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(28, 39, 'Room 6', 40, 84, '4', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(29, 40, 'Room 2', 25, 367.5, '4', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(30, 41, 'Room 6', 40, 42, '123', 'SodaOnix', '1231221324', 'Đà Nẵng'),
(31, 42, 'Room 2', 25, 52.5, NULL, 'SodaOnix', '1231221324', 'Đà Nẵng'),
(32, 43, 'Room 1', 30, 31.5, '54', 'qhuy', '0983434543', 'Quảng Bình'),
(33, 44, 'Room 3', 20, 21, NULL, 'Thu Trang', '0987893321', 'Thừa Thiên - Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(255) NOT NULL DEFAULT 'booked',
  `order_id` varchar(255) NOT NULL,
  `trans_status` varchar(50) NOT NULL DEFAULT 'SUCCESS',
  `trans_resp_msg` varchar(50) NOT NULL DEFAULT 'success',
  `rate_review` int(11) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_status`, `trans_resp_msg`, `rate_review`, `datentime`) VALUES
(23, 16, 24, '2024-11-05', '2024-11-06', 1, NULL, 'booked', 'gd56F3', 'SUCCESS', 'success', 1, '2024-11-05 21:19:40'),
(24, 16, 25, '2024-11-05', '2024-11-06', 0, 1, 'cancelled', 'KehYxz', 'SUCCESS', 'success', NULL, '2024-11-05 21:21:25'),
(25, 16, 24, '2024-11-07', '2024-11-08', 1, NULL, 'booked', '9czsWw', 'SUCCESS', 'success', 1, '2024-11-05 21:22:55'),
(26, 12, 24, '2024-11-09', '2024-11-14', 0, 1, 'cancelled', 'FFzlQF', 'SUCCESS', 'success', NULL, '2024-11-05 21:24:04'),
(27, 12, 26, '2024-11-06', '2024-11-07', 1, NULL, 'booked', 'BBZYLh', 'SUCCESS', 'success', NULL, '2024-11-06 11:46:41'),
(28, 17, 24, '2024-11-15', '2024-11-22', 0, 1, 'cancelled', 'vqe0AI', 'SUCCESS', 'success', NULL, '2024-11-06 11:48:12'),
(29, 17, 24, '2024-11-15', '2024-11-17', 0, 1, 'cancelled', '0wOm8r', 'SUCCESS', 'success', NULL, '2024-11-06 15:53:54'),
(30, 12, 30, '2024-11-06', '2024-11-08', 0, 1, 'cancelled', 'zovnxV', 'SUCCESS', 'success', NULL, '2024-11-06 21:15:46'),
(31, 12, 31, '2024-11-06', '2024-11-07', 0, 1, 'cancelled', 'd9eRvg', 'SUCCESS', 'success', NULL, '2024-11-06 21:19:58'),
(32, 12, 29, '2024-11-06', '2024-11-07', 1, NULL, 'booked', 'csnRSi', 'SUCCESS', 'success', NULL, '2024-11-06 21:23:40'),
(33, 12, 24, '2024-11-21', '2024-11-22', 0, 1, 'cancelled', 'FSxdUd', 'SUCCESS', 'success', NULL, '2024-11-06 21:32:00'),
(34, 16, 24, '2024-11-15', '2024-11-16', 1, NULL, 'booked', '2SCTyt', 'SUCCESS', 'success', 1, '2024-09-08 13:29:12'),
(35, 16, 26, '2024-11-15', '2024-11-16', 1, NULL, 'booked', 'oLKJZP', 'SUCCESS', 'success', 1, '2024-11-07 13:30:05'),
(36, 16, 30, '2024-11-09', '2024-11-10', 1, NULL, 'booked', 'siROss', 'SUCCESS', 'success', 1, '2024-11-07 16:22:45'),
(37, 16, 26, '2024-11-08', '2024-11-09', 0, 1, 'cancelled', 'bpkfLh', 'SUCCESS', 'success', 1, '2024-11-07 16:22:58'),
(38, 16, 26, '2024-11-21', '2024-11-22', 1, NULL, 'booked', 'eMH8c4', 'SUCCESS', 'success', 1, '2024-11-07 16:23:09'),
(39, 16, 30, '2024-11-14', '2024-11-16', 1, NULL, 'booked', 'maPrNh', 'SUCCESS', 'success', 1, '2024-11-08 16:23:45'),
(40, 16, 25, '2024-11-08', '2024-11-22', 1, NULL, 'booked', 'S0X7Iz', 'SUCCESS', 'success', 1, '2022-11-08 17:05:08'),
(41, 16, 30, '2024-12-01', '2024-12-02', 1, NULL, 'booked', 'ol5UpL', 'SUCCESS', 'success', 0, '2024-11-07 21:18:29'),
(42, 16, 25, '2024-12-02', '2024-12-04', 0, 1, 'cancelled', 'QbcXXR', 'SUCCESS', 'success', NULL, '2024-11-07 21:18:59'),
(43, 17, 24, '2024-11-09', '2024-11-10', 1, NULL, 'booked', 'AZvjnn', 'SUCCESS', 'success', 1, '2024-11-08 12:01:40'),
(44, 18, 26, '2024-11-09', '2024-11-10', 0, NULL, 'booked', '8XTimI', 'SUCCESS', 'success', NULL, '2024-11-08 22:56:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_details`
--

CREATE TABLE `contact_details` (
  `no` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `phoneNumber1` bigint(20) NOT NULL,
  `phoneNumber2` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `ig` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `tt` varchar(100) NOT NULL,
  `iframe` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact_details`
--

INSERT INTO `contact_details` (`no`, `address`, `gmap`, `phoneNumber1`, `phoneNumber2`, `email`, `fb`, `ig`, `tw`, `tt`, `iframe`) VALUES
(1, '470 Đ. Trần Đại Nghĩa, Hòa Hải, Ngũ Hành Sơn, Đà Nẵng', 'https://maps.app.goo.gl/REzouy5HpVVJqbQW7', 84706163387, 84773515796, 'lehuy2425@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.facebook.com/', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7751.379186571129!2d108.253227!3d15.975259999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f:0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4sIMSQ4bqhaSBo4buNYyDEkMOgIE7hurVuZw!5e1!3m2!1svi!2sus!4v1730218318867!5m2!1svi!2sus');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(9, 'IMG_51164.svg', 'Air-conditioner', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(10, 'IMG_42171.svg', 'Telephone', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(11, 'IMG_72193.svg', 'Television', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(12, 'IMG_91257.svg', 'Sofa', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(13, 'IMG_15207.svg', 'Lamp', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(15, 'IMG_31213.svg', 'Hair Dryer', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(16, 'IMG_94303.svg', 'Water Heater', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(18, 'IMG_76699.svg', 'Wifi', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(21, 'IMG_92982.svg', 'Spa', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(23, 'IMG_64839.svg', 'Sauna', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(24, 'IMG_50992.svg', 'Gym', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(25, 'IMG_15563.svg', 'Elevator', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(26, 'IMG_91731.svg', 'Swimming Pools', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(27, 'IMG_14650.svg', 'Ironing board', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(28, 'IMG_25310.svg', 'Speaker', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(29, 'IMG_30009.svg', 'Fan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(30, 'IMG_27007.svg', 'Desk', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(31, 'IMG_14020.svg', 'Toletries', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(32, 'IMG_89962.svg', 'Towel', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(33, 'IMG_18622.svg', 'Bathrope', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?'),
(34, 'IMG_27165.svg', 'Slipper', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(13, 'bedroom'),
(14, 'kitchen'),
(15, 'balcony'),
(16, 'living room'),
(25, 'Bathroom'),
(26, 'Gym'),
(28, 'Office');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_review`
--

CREATE TABLE `rating_review` (
  `no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating_review`
--

INSERT INTO `rating_review` (`no`, `booking_id`, `room_id`, `user_id`, `rating`, `review`, `seen`, `datentime`) VALUES
(1, 34, 24, 16, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?', 1, '2024-11-07 15:47:58'),
(5, 39, 30, 16, 5, '1Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?', 1, '2024-11-07 16:24:45'),
(6, 38, 26, 16, 3, '2Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?', 1, '2024-11-07 16:24:51'),
(7, 37, 26, 16, 2, '31Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?', 1, '2024-11-07 16:24:55'),
(8, 36, 30, 16, 1, '41Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?', 1, '2024-11-07 16:25:01'),
(9, 40, 25, 16, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?', 1, '2024-11-07 17:05:40'),
(10, 40, 25, 16, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?', 1, '2024-11-07 17:05:40'),
(11, 40, 25, 16, 3, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam al', 1, '2024-11-07 17:05:40'),
(12, 40, 25, 16, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam al', 1, '2024-11-07 17:05:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(24, 'Room 1', 70, 30, 10, 5, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas voluptates veritatis nesciunt assumenda porro rem perferendis saepe eaque perspiciatis. Facere minima cum tempore magnam illo quos atque temporibus doloremque possimus.Lorem ipsum dolor sit ame', 1, 0),
(25, 'Room 2', 60, 25, 10, 5, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas voluptates veritatis nesciunt assumenda porro rem perferendis saepe eaque perspiciatis. Facere minima cum tempore magnam illo quos atque temporibus doloremque possimus.Lorem ipsum dolor sit ame', 1, 0),
(26, 'Room 3', 50, 20, 10, 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas voluptates veritatis nesciunt assumenda porro rem perferendis saepe eaque perspiciatis. Facere minima cum tempore magnam illo quos atque temporibus doloremque possimus.Lorem ipsum dolor sit ame', 1, 0),
(27, 'Room 4', 55, 30, 10, 5, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas voluptates veritatis nesciunt assumenda porro rem perferendis saepe eaque perspiciatis. Facere minima cum tempore magnam illo quos atque temporibus doloremque possimus.Lorem ipsum dolor sit ame', 1, 0),
(28, 'Room 5', 44, 44, 44, 4, 4, '414', 1, 1),
(29, 'Room 5', 55, 30, 10, 6, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas voluptates veritatis nesciunt assumenda porro rem', 1, 0),
(30, 'Room 6', 60, 40, 10, 2, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas voluptates veritatis nesciunt assumenda porro rem', 1, 0),
(31, 'Room 7', 44, 55, 12, 6, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta quidem sapiente culpa quos numquam quam alias repellendus rerum blanditiis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas voluptates veritatis nesciunt assumenda porro rem', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_facilities`
--

CREATE TABLE `room_facilities` (
  `no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room_facilities`
--

INSERT INTO `room_facilities` (`no`, `room_id`, `facilities_id`) VALUES
(159, 24, 9),
(160, 24, 10),
(161, 24, 11),
(162, 24, 16),
(163, 25, 9),
(164, 25, 10),
(165, 25, 15),
(166, 25, 16),
(167, 26, 9),
(168, 26, 11),
(169, 26, 13),
(170, 26, 16),
(171, 26, 24),
(176, 27, 11),
(177, 27, 12),
(178, 27, 16),
(179, 27, 18),
(187, 29, 16),
(188, 29, 24),
(189, 29, 26),
(190, 29, 30),
(191, 29, 31),
(192, 29, 32),
(193, 29, 33),
(194, 30, 12),
(195, 30, 23),
(196, 30, 24),
(197, 30, 26),
(198, 30, 28),
(199, 30, 29),
(200, 30, 30),
(208, 31, 27),
(209, 31, 28),
(210, 31, 29),
(211, 31, 30),
(212, 31, 32),
(213, 31, 33),
(214, 31, 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_features`
--

CREATE TABLE `room_features` (
  `no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room_features`
--

INSERT INTO `room_features` (`no`, `room_id`, `features_id`) VALUES
(99, 24, 13),
(100, 24, 14),
(101, 25, 15),
(102, 25, 16),
(103, 26, 13),
(104, 26, 14),
(105, 26, 15),
(106, 26, 16),
(110, 27, 13),
(111, 27, 15),
(112, 27, 16),
(117, 29, 13),
(118, 29, 14),
(119, 29, 15),
(120, 29, 16),
(121, 30, 14),
(122, 30, 16),
(123, 30, 28),
(127, 31, 16),
(128, 31, 26),
(129, 31, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_images`
--

CREATE TABLE `room_images` (
  `no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room_images`
--

INSERT INTO `room_images` (`no`, `room_id`, `image`, `thumb`) VALUES
(24, 24, 'IMG_81554.png', 1),
(27, 25, 'IMG_92495.png', 1),
(30, 26, 'IMG_37703.png', 1),
(33, 26, 'IMG_26197.png', 0),
(34, 27, 'IMG_62099.png', 1),
(35, 27, 'IMG_60891.png', 0),
(36, 27, 'IMG_81966.png', 0),
(37, 24, 'IMG_24739.png', 0),
(38, 24, 'IMG_29071.png', 0),
(40, 24, 'IMG_81476.png', 0),
(41, 25, 'IMG_64583.png', 0),
(42, 25, 'IMG_47119.png', 0),
(43, 25, 'IMG_16130.png', 0),
(44, 26, 'IMG_75293.png', 0),
(46, 24, 'IMG_45330.png', 0),
(47, 25, 'IMG_56776.png', 0),
(50, 26, 'IMG_35757.png', 0),
(51, 26, 'IMG_97832.png', 0),
(53, 27, 'IMG_52269.png', 0),
(54, 27, 'IMG_81814.png', 0),
(55, 29, 'IMG_36805.png', 0),
(56, 29, 'IMG_95418.png', 0),
(57, 29, 'IMG_30828.png', 1),
(58, 29, 'IMG_75325.png', 0),
(60, 30, 'IMG_23872.png', 0),
(61, 30, 'IMG_30932.png', 1),
(64, 30, 'IMG_21726.png', 0),
(65, 30, 'IMG_42048.png', 0),
(67, 30, 'IMG_97211.png', 0),
(68, 31, 'IMG_46846.png', 0),
(69, 31, 'IMG_36963.png', 0),
(70, 31, 'IMG_27151.png', 0),
(71, 31, 'IMG_29887.png', 1),
(72, 31, 'IMG_52993.png', 0),
(73, 29, 'IMG_39877.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `no` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_about` varchar(255) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'ONIX HOTEL', 'Onix Hotel is located in the city center.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoanadmin`
--

CREATE TABLE `taikhoanadmin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoanadmin`
--

INSERT INTO `taikhoanadmin` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoanuser`
--

CREATE TABLE `taikhoanuser` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoanuser`
--

INSERT INTO `taikhoanuser` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(12, 'Lê Quốc Huy', 'tho100622051@gmail.com', 'Quảng Nam', '0706163387', 5600, '2024-11-16', 'IMG_28553.jpeg', '$2y$10$RbtK3GTpO7rTh2.MrsuQrOjv/JHZh4wtQmeA.KOqvLHe5LwYjT5S.', 1, 'e1d923341749e3ea5aa046350ed63d0a', '2024-11-07', 0, '2024-09-03 13:56:02'),
(16, 'SodaOnix', 'tho10062205@gmail.com', 'Đà Nẵng', '1231221324', 2000, '2024-10-30', 'IMG_61702.jpeg', '$2y$10$G0rWJxEtPrPshrZSzSlOf.I5KHiEGDzm9cTgRP3B9vd95x1MNy0r2', 1, '52d0cae8248268f68768ac0c94adcfc9', '2024-12-31', 1, '2024-11-03 14:16:39'),
(17, 'qhuy', 'huy1@gmail.com', 'Quảng Bình', '0983434543', 12343, '2005-06-10', 'IMG_29912.jpeg', '$2y$10$vPwfgISGbJl/abyj3AAR0OFu3IjqNNWVb/MJoXot.kKfXs2VchvYK', 1, '2ca26b623b4db2188d909ed015c17693', '2024-12-31', 1, '2024-11-03 21:38:38'),
(18, 'Thu Trang', 'trang@gmail.com', 'Thừa Thiên - Huế', '0987893321', 54532, '2024-11-12', 'IMG_55962.jpeg', '$2y$10$wOcuJgsXK1RU7WuK1kPjg.aDelGjVBkW2/BJdr05dMWxqsUgmwhKu', 1, '4c1c5bee1bf9bfba3bfe30e5c635a68d', '2024-11-07', 1, '2024-11-03 21:39:56'),
(19, 'Thị Nở', 'no100@gmail.com', 'Quảng Ngãi', '0934123433', 42356, '2024-11-06', 'IMG_95397.jpeg', '$2y$10$ua2Pd.I4PpsYqpzsDl3rbO6MxpeXMknR/qhgdHWLIMHMgDTnfzLqK', 1, '017c946b1b73cee45f3e8ecc16f0e347', NULL, 1, '2024-11-03 21:47:58'),
(20, 'PTX', 'PTX@gmail.com', 'Bình Định', '0934155376', 46245, '2024-11-08', 'IMG_94715.jpeg', '$2y$10$BeVPd3doYE6VvaiQM2jsE.EqKoInBoPysyNiURaRajEa2lyVnx2ZO', 1, '66dd30714c5cf60ea1500f883de378ce', NULL, 1, '2024-11-03 21:48:45'),
(21, 'Hello', 'hel@gmail.com', 'Cao Bằng', '0387412345', 13452, '2024-10-30', 'IMG_29501.jpeg', '$2y$10$KLsIBeWSFzb3KLfZ82KDxO4aGysVZ93SAno1sj3FBGixZFCj0nrpm', 1, 'db56df2f3384b64c6c3422a94beb03bb', NULL, 1, '2024-11-03 21:50:26'),
(22, 'DinhVuongDK', 'dcmDV@gmail.com', 'Quảng Trị', '0382412312', 62345, '2024-10-31', 'IMG_60550.jpeg', '$2y$10$FhGrCN3EeNJeSZa0XjwhBOfJQmnD.nF1RwMOgpeDiPrjvIR.6bJG6', 1, '9c9a9f2c6003bfa2ff68605fbc1f5c14', NULL, 1, '2024-11-03 21:51:34'),
(23, 'QuocHuyd1', 'lehuy2425@gmail.com2', 'Điện Biên', '0934123451', 42343, '2024-11-06', 'IMG_20993.jpeg', '$2y$10$U6SJ9qFx6n3cU6ndq9alluZMppMvIIgGGmYRUtwgKKYOdQAzlNIJK', 0, 'dffbcbb944a6838dc79a12eea4a6f23a', NULL, 1, '2024-11-03 21:52:16'),
(24, 'Bé Na', 'na_92@gmail.com', 'TP. Hồ Chí Minh', '0893231234', 23415, '2024-11-16', 'IMG_13686.jpeg', '$2y$10$qmrFmqMBRnlIr4MHcyehX.84i7T22ApJQwQS4lKxvhOL8xMjzHOZ.', 0, '4988e59fd5ef6076ebbac7e2cc7eee8e', NULL, 1, '2024-10-07 22:03:19'),
(25, 'BatMan', 'bbat@gmail.com', 'Bà Rịa - Vũng Tàu', '0830234233', 42341, '2024-11-14', 'IMG_39278.jpeg', '$2y$10$khTIZd/RT2MNk17F3EBvVOSd97j1SZPKkmQXlXbhwhXrT2aJQY4zW', 0, 'c6a54d72da8f8dc3c415c9a3f2e8012e', NULL, 1, '2023-11-03 22:05:27'),
(26, 'Joker Hề', 'jocer_2@gmail.com', 'DakLak', '0983123412', 52343, '2024-11-16', 'IMG_94987.jpeg', '$2y$10$t.fvaLldBMvhM0vpt/20ve4asI5ehycyWisEFFKhkt0U2H7KatgYe', 0, 'be212beadb1fb903b97059aca7372ef4', NULL, 1, '2022-11-03 22:06:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_queries`
--

CREATE TABLE `user_queries` (
  `no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_queries`
--

INSERT INTO `user_queries` (`no`, `name`, `email`, `subject`, `message`, `datentime`, `seen`) VALUES
(25, 'Qhuy', 'qhuy@gmail.com', 'Lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 0),
(26, 'Okday', '3@gmail.com', 'Lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 0),
(27, 'VuiDay', '2@gmail.com', 'Lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 1),
(28, 'Bé Na', 'Bena@gmail.com', 'lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 0),
(29, 'Bé Khỉ', '1@gmail.com', 'lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 0),
(32, 'VuiLamRoi', '25@gmail.com', 'Lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 0),
(33, 'BéQuáNgu', 'Ben32a@gmail.com', 'lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 0),
(34, 'Phiếu bé ngoan', '151Ads@gmail.com', 'lorem', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta velit perferendis magnam molestias eligendi sunt cupiditate voluptatum dolorum aut assumenda.', '2024-11-03 00:00:00', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Chỉ mục cho bảng `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Chỉ mục cho bảng `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`no`);

--
-- Chỉ mục cho bảng `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`no`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Chỉ mục cho bảng `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Chỉ mục cho bảng `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`no`),
  ADD KEY `room_id` (`room_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`no`);

--
-- Chỉ mục cho bảng `taikhoanadmin`
--
ALTER TABLE `taikhoanadmin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `taikhoanuser`
--
ALTER TABLE `taikhoanuser`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT cho bảng `room_features`
--
ALTER TABLE `room_features`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `room_images`
--
ALTER TABLE `room_images`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taikhoanuser`
--
ALTER TABLE `taikhoanuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Các ràng buộc cho bảng `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `taikhoanuser` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Các ràng buộc cho bảng `rating_review`
--
ALTER TABLE `rating_review`
  ADD CONSTRAINT `rating_review_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`),
  ADD CONSTRAINT `rating_review_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `rating_review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `taikhoanuser` (`id`);

--
-- Các ràng buộc cho bảng `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
