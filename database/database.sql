-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 06:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_citi_sec`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_lot_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_brgy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_tele_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_lot_no`, `branch_street`, `branch_brgy`, `branch_city`, `full_address`, `branch_tele_no`, `branch_phone_no`, `branch_email`, `branch_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Cavite Branch', 'B38 L23', 'P1 Cityhomes Resortsville Langkaan 2', 'Dasmariñas', 'Cavite', 'B38 L23 P1 Cityhomes Resortsville Langkaan 2 Dasmariñas Cavite', '(046)-866-7729', '09123456789', 'citisec2020@gmail.com', 1, 1, 1, '2023-08-17 05:16:22', '2024-07-16 08:21:20'),
(2, 'Manila Branch', NULL, '2675 Pinoy St.', 'Brgy. 135 Balut Tondo', 'Manila', ' 2675 Pinoy St. Brgy. 135 Balut Tondo Manila', '(02)-8-635-7552', '+639560896852', 'citisec2020@gmail.com', 1, 1, 1, '2023-08-17 18:13:15', '2023-08-18 19:31:37'),
(3, 'Batangas Branch', NULL, 'Sitio Pulo 7B', 'Brgy. Tambo,', 'Lipa City Batangas', ' Sitio Pulo 7B Brgy. Tambo, Lipa City Batangas', '(046)-866-7729', '+639770553036', 'citisec2020@gmail.com', 1, 1, 1, '2023-08-17 18:28:18', '2024-07-21 06:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_lot_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_brgy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_full_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_tele_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_business_name`, `client_first_name`, `client_middle_name`, `client_last_name`, `client_full_name`, `client_suffix`, `client_lot_no`, `client_street`, `client_brgy`, `client_city`, `client_full_address`, `client_mobile_no`, `client_tele_no`, `client_email`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Kenneth Inc.', NULL, NULL, NULL, '', NULL, NULL, NULL, 'asd', 'asd', '', 'asd', 'asd', 'asf@gmail.com', 1, 1, 1, '2023-10-16 06:25:21', '2023-10-16 06:25:21'),
(2, 'Dyn', 'Kenneth', 'B', 'Hontucan', 'Kenneth B Hontucan', NULL, '123', 'Wjef', 'Krnvr', 'Wimce City', '', '091203912', NULL, 'as@gmail.com', 1, 1, 1, '2024-02-16 02:30:12', '2024-02-16 02:30:12'),
(3, 'Starbucks', 'qej', 'ndqwj', 'qwd', 'qej ndqwj qwd', NULL, NULL, NULL, 'Nlex', 'Pampanga', 'Nlex Pampanga', '09124124124', NULL, 'hontucankenneth@gmail.com', 1, 1, 1, '2024-02-16 02:32:00', '2024-02-16 02:32:00'),
(4, 'Rakk', 'Rakk', NULL, 'Enroll', 'Rakk Enroll', NULL, NULL, 'QWE', 'QWE', 'ASD', 'QWE QWE ASD', '123123', '123123', 'hontucankenneth@gmail.com', 1, 1, 1, '2024-06-07 10:45:56', '2024-06-07 10:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_access`
--

CREATE TABLE `dashboard_access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `dashboard_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dashboard_access`
--

INSERT INTO `dashboard_access` (`id`, `role_id`, `dashboard_id`, `created_at`, `updated_at`) VALUES
(58, 3, 6, '2024-07-08 06:58:31', '2024-07-08 06:58:31'),
(59, 3, 7, '2024-07-08 06:58:31', '2024-07-08 06:58:31'),
(60, 3, 9, '2024-07-08 06:58:31', '2024-07-08 06:58:31'),
(70, 1, 1, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(71, 1, 2, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(72, 1, 3, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(73, 1, 4, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(74, 1, 5, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(75, 1, 6, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(76, 1, 7, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(77, 1, 8, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(78, 1, 9, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(79, 1, 10, '2024-07-15 06:56:59', '2024-07-15 06:56:59'),
(80, 5, 2, '2024-08-06 03:07:00', '2024-08-06 03:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `dep_oculars`
--

CREATE TABLE `dep_oculars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `ocular_date` date NOT NULL,
  `ocular_landmark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ocular_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dep_oculars`
--

INSERT INTO `dep_oculars` (`id`, `client_id`, `ocular_date`, `ocular_landmark`, `ocular_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, '2024-07-27', NULL, 3, 1, 2, 2, '2024-07-27 04:09:14', '2024-08-06 11:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `empr_id` int(11) NOT NULL,
  `emp_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_lot_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_brgy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_full_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_tele_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `branch_id`, `empr_id`, `emp_first_name`, `emp_middle_name`, `emp_last_name`, `emp_full_name`, `emp_suffix`, `emp_lot_no`, `emp_street`, `emp_brgy`, `emp_city`, `emp_full_address`, `emp_tele_no`, `emp_phone_no`, `emp_email`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kenneth', 'Buli', 'Hontucan', 'Kenneth Buli Hontucan ', NULL, '787-C', 'Limasawa St.', 'Pitogo', 'Makati City', '787-C Limasawa St. Pitogo Makati City', NULL, '09123123123', 'hontucankenneth@gmail.com', 1, 1, 1, '2023-08-18 19:58:33', '2023-11-06 03:47:48'),
(2, 3, 2, 'Cyber', 'C', 'Angustia', 'Cyber C Angustia Jr.', 'Jr.', '3', 'Street', 'Barangay', 'City', '3 Street Barangay, City', NULL, '09123613732', 'cyber@gmail.com', 1, 1, 1, '2023-08-18 19:59:08', '2024-08-24 14:27:56'),
(3, 3, 4, 'Roice Ivan', 'B', 'Bulalacao', 'Roice Ivan B Bulalacao ', NULL, '2', 'Street', 'BCDA', 'Taguig City', '2 Street BCDA Taguig City', NULL, '09123456789', 'roice@gmail.com', 1, 1, 1, '2023-08-18 19:59:34', '2023-08-18 19:59:34'),
(4, 2, 2, 'Christy', NULL, 'Fab', 'Christy  Fab ', NULL, NULL, 'Limasawa St.', 'Pitogo', 'Makati City', ' Limasawa St. Pitogo Makati City', NULL, '09123456789', 'christy.fab@gmail.com', 1, 1, 1, '2023-10-15 05:43:56', '2024-04-03 02:35:22'),
(5, 1, 1, 'asd', NULL, 'dsa', 'asd  dsa asd', 'asd', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe qwe qwe qwe', '213', '31231', 'zxc@gmail.com', 1, 1, 1, '2024-07-09 12:28:32', '2024-07-09 12:28:32'),
(6, 1, 2, 'zxc', 'zxc', 'zxc', 'zxc zxc zxc ', NULL, 'zxc', 'zcx', 'zxc', 'zxc', 'zxc zcx zxc zxc', 'zxc', 'zxc', 'zxc@gmail.com', 1, 1, 1, '2024-07-09 12:54:40', '2024-07-09 12:54:40'),
(7, 1, 1, 'qwe', 'qwe', 'wqe', 'qwe qwe wqe qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe qwe qwe qwe', 'qwe', 'qwe', 'qwe@gmail.com', 1, 1, 1, '2024-07-09 13:00:25', '2024-07-09 13:00:25'),
(8, 1, 1, 'ty', 'ty', 'ty', 'ty ty ty ty', 'ty', 'ty', 'ty', 'ty', 'ty', 'ty ty ty ty', 'ty', 'ty', 'ty@gmail.com', 1, 1, 1, '2024-07-09 13:01:46', '2024-07-09 13:01:46'),
(9, 1, 1, 'gg', 'gg', 'gg', 'gg gg gg gg', 'gg', 'gg', 'gg', 'gg', 'gg', 'gg gg gg gg', 'gg', 'gg', 'gg@gmail.com', 1, 1, 1, '2024-07-09 13:04:06', '2024-07-09 13:04:06'),
(10, 1, 1, 'jj', 'jj', 'jj', 'jj jj jj ', NULL, 'jj', 'jj', 'jj', 'jj', 'jj jj jj jj', 'jj', 'jj', 'jj@gmail.com', 1, 1, 1, '2024-07-09 13:05:01', '2024-07-09 13:05:01'),
(11, 1, 1, 'oo', 'oo', 'oo', 'oo oo oo oo', 'oo', NULL, 'oo', 'oo', 'oo', ' oo oo oo', 'oo', 'oo', 'oo@gmail.com', 1, 1, 1, '2024-07-09 13:05:40', '2024-07-09 13:05:40'),
(12, 1, 1, 'pp', 'pp', 'pp', 'pp pp pp pp', 'pp', 'pp', 'pp', 'pp', 'pp', 'pp pp pp pp', 'pp', 'pp', 'pp@gmail.com', 1, 1, 1, '2024-07-09 13:11:29', '2024-07-09 13:11:29'),
(13, 1, 1, 'mm', 'mm', 'mm', 'mm mm mm mm', 'mm', 'mm', 'mm', 'mm', 'mm', 'mm mm mm mm', 'mm', 'mm', 'mm@gmail.com', 1, 1, 1, '2024-07-09 13:13:02', '2024-07-16 10:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee_inventory`
--

CREATE TABLE `employee_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `issued_qty` int(11) NOT NULL,
  `returned_qty` int(11) DEFAULT 0,
  `balance_qty` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_inventory`
--

INSERT INTO `employee_inventory` (`id`, `emp_id`, `item_id`, `issued_qty`, `returned_qty`, `balance_qty`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 10, 8, 6, 0, 6, NULL, '2024-08-06 09:26:03', '2024-08-06 09:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `employee_roles`
--

CREATE TABLE `employee_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empr_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empr_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_roles`
--

INSERT INTO `employee_roles` (`id`, `empr_role`, `empr_desc`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'Manage the Branch Request for Quotation', 1, 1, 1, '2023-08-17 05:16:57', '2023-08-17 08:26:03'),
(2, 'Field Technician', 'Goes to clients\' location to configure', 1, 1, 1, '2023-08-17 05:17:31', '2023-08-19 17:18:18'),
(3, 'ASD', NULL, 0, 1, 1, '2023-08-17 18:23:17', '2023-08-22 06:01:18'),
(4, 'Sales Staffs', 'Manage clients\' product inquiries', 1, 1, 1, '2023-08-17 18:29:45', '2023-08-19 17:17:44'),
(5, 'qwe', 'qwe', 1, 1, 1, '2024-02-14 21:52:34', '2024-02-14 21:52:34'),
(6, 'Guest', NULL, 1, 1, 1, '2024-04-30 13:17:33', '2024-04-30 13:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `group_code`, `group_icon`, `group_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Personnel', '/personnel', 'fa fa-users', NULL, 1, 1, 1, '2023-09-05 05:59:18', '2023-09-05 05:59:18'),
(2, 'Product', '/product', 'fa-solid fa-suitcase', NULL, 1, 1, 1, '2023-09-05 05:59:27', '2023-09-05 05:59:27'),
(3, 'User Account', '/user-account', 'fa-regular fa-user', NULL, 1, 1, 1, '2023-09-05 06:00:05', '2023-09-05 06:00:05'),
(4, 'Component', '/component', 'fa-solid fa-bars', NULL, 1, 1, 1, '2023-09-05 06:00:19', '2023-09-05 06:00:19'),
(5, 'Client', '/client', 'fa fa-user', NULL, 1, 1, 1, '2023-10-15 05:32:20', '2024-07-21 07:39:43'),
(6, 'Deployment', '/deployment', 'fa-solid fa-van-shuttle', NULL, 1, 1, 1, '2023-10-17 01:52:19', '2024-07-12 03:30:33'),
(7, 'Sales', '/sales', 'fa-solid fa-sack-dollar', NULL, 1, 1, 1, '2023-10-19 06:33:47', '2024-07-12 03:30:02'),
(8, 'Inventory', '/inventory', 'fa-solid fa-warehouse', NULL, 1, 1, 1, '2024-01-17 17:22:30', '2024-07-18 04:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `inv_issuances`
--

CREATE TABLE `inv_issuances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issuance_type` int(11) NOT NULL,
  `issuance_date` date NOT NULL,
  `issuance_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuance_control_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_by` int(11) NOT NULL,
  `received_by` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_cancelled` int(11) DEFAULT NULL COMMENT 'if 1 = cancelled',
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_issuances`
--

INSERT INTO `inv_issuances` (`id`, `issuance_type`, `issuance_date`, `issuance_number`, `issuance_control_no`, `issued_by`, `received_by`, `branch_id`, `remarks`, `is_cancelled`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-08-06', '00001', 'IS24-00001', 2, 10, 3, NULL, NULL, 1, 2, 0, '2024-08-06 06:44:37', '2024-08-06 06:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `inv_issuance_items`
--

CREATE TABLE `inv_issuance_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issuance_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `issued_qty` int(11) NOT NULL,
  `is_posted` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_issuance_items`
--

INSERT INTO `inv_issuance_items` (`id`, `issuance_id`, `item_id`, `uom_id`, `issued_qty`, `is_posted`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, 6, NULL, 1, 2, 0, '2024-08-06 06:44:37', '2024-08-06 06:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `inv_receivings`
--

CREATE TABLE `inv_receivings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rec_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_date` date NOT NULL,
  `rec_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_posted` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_receivings`
--

INSERT INTO `inv_receivings` (`id`, `rec_code`, `rec_number`, `rec_supplier`, `rec_date`, `rec_remarks`, `status`, `is_posted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'RCV24-00001', '00001', 'qwe', '2024-07-26', NULL, 1, 1, 2, 0, '2024-07-26 03:07:54', '2024-07-26 03:07:54'),
(2, 'RCV24-00002', '00002', 'qwe', '2024-07-26', 'qwe', 1, 0, 2, 2, '2024-07-26 03:44:33', '2024-07-26 03:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `inv_receiving_details`
--

CREATE TABLE `inv_receiving_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rec_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `rec_qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_posted` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_receiving_details`
--

INSERT INTO `inv_receiving_details` (`id`, `rec_id`, `item_id`, `uom_id`, `rec_qty`, `status`, `is_posted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 10, 1, 1, 2, 0, '2024-07-26 03:07:54', '2024-07-26 03:07:54'),
(2, 1, 7, NULL, 10, 1, 1, 2, 0, '2024-07-26 03:07:54', '2024-07-26 03:07:54'),
(3, 1, 8, NULL, 10, 1, 1, 2, 0, '2024-07-26 03:07:54', '2024-07-26 03:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `inv_returns`
--

CREATE TABLE `inv_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `return_date` date NOT NULL,
  `return_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_control_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returned_by` int(11) NOT NULL,
  `received_by` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_returns`
--

INSERT INTO `inv_returns` (`id`, `return_date`, `return_number`, `return_control_no`, `returned_by`, `received_by`, `branch_id`, `remarks`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2024-08-06', '00001', 'RTN24-00001', 10, 2, 2, 'qwe', 2, 2, 2, '2024-08-06 09:00:31', '2024-08-06 09:19:54'),
(2, '2024-08-06', '00002', 'RTN24-00002', 10, 2, 2, NULL, 2, 2, 2, '2024-08-06 09:23:14', '2024-08-06 09:23:28'),
(3, '2024-08-06', '00003', 'RTN24-00003', 10, 2, 1, NULL, 2, 2, 2, '2024-08-06 09:24:39', '2024-08-06 09:24:50'),
(4, '2024-08-06', '00004', 'RTN24-00004', 10, 2, 2, NULL, 2, 2, 2, '2024-08-06 09:25:57', '2024-08-06 09:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `inv_return_items`
--

CREATE TABLE `inv_return_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `return_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_return_items`
--

INSERT INTO `inv_return_items` (`id`, `return_id`, `item_id`, `return_qty`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 6, 1, 2, 0, '2024-08-06 09:00:31', '2024-08-06 09:00:31'),
(2, 2, 8, 6, 1, 2, 0, '2024-08-06 09:23:14', '2024-08-06 09:23:14'),
(3, 3, 8, 6, 1, 2, 0, '2024-08-06 09:24:40', '2024-08-06 09:24:40'),
(4, 4, 8, 6, 1, 2, 0, '2024-08-06 09:25:57', '2024-08-06 09:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `inv_stocks`
--

CREATE TABLE `inv_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `issued_qty` int(11) NOT NULL,
  `ordered_qty` int(11) NOT NULL,
  `returned_qty` int(11) NOT NULL,
  `sold_qty` int(11) NOT NULL,
  `adjusted_qty` int(11) NOT NULL,
  `balance_qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_stocks`
--

INSERT INTO `inv_stocks` (`id`, `item_id`, `received_qty`, `issued_qty`, `ordered_qty`, `returned_qty`, `sold_qty`, `adjusted_qty`, `balance_qty`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 0, 0, 0, 0, 0, 10, 1, 2, 0, NULL, NULL),
(2, 7, 10, 0, 0, 0, 0, 0, 10, 1, 2, 0, NULL, NULL),
(3, 8, 10, 6, 0, 0, 0, 0, 4, 1, 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_orders`
--

CREATE TABLE `job_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jo_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jo_control_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `scope_id` int(11) NOT NULL,
  `jo_landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jo_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jo_turnover_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_orders`
--

INSERT INTO `job_orders` (`id`, `jo_number`, `jo_control_no`, `client_id`, `order_id`, `scope_id`, `jo_landmark`, `jo_date`, `jo_turnover_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '00001', 'JO24-00001', 4, 1, 2, NULL, '2024-07-27T15:12:59', '2024-07-27T15:13', 1, 2, 0, '2024-07-27 07:13:14', '2024-07-29 04:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `jo_employees`
--

CREATE TABLE `jo_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deployment_id` int(11) NOT NULL,
  `deployment_type` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jo_employees`
--

INSERT INTO `jo_employees` (`id`, `deployment_id`, `deployment_type`, `emp_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 3, 1, 2, 0, '2024-07-27 07:13:14', '2024-07-27 07:13:14'),
(4, 1, 1, 9, 1, 2, 0, '2024-08-06 11:51:48', '2024-08-06 11:51:48'),
(5, 1, 1, 11, 1, 2, 0, '2024-08-06 11:51:48', '2024-08-06 11:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_08_03_134135_create_branches_table', 1),
(13, '2023_08_17_025446_create_employee_roles_table', 1),
(18, '2023_08_17_130854_create_employees_table', 2),
(19, '2014_10_12_000000_create_users_table', 3),
(22, '2023_09_05_013731_create_groups_table', 4),
(24, '2023_09_05_135443_create_modules_table', 5),
(25, '2023_09_13_135646_create_sub_modules_table', 6),
(26, '2023_09_20_093930_create_permissions_table', 7),
(28, '2023_10_03_092310_create_user_access_control_table', 8),
(30, '2023_10_15_024722_create_clients_table', 9),
(38, '2023_10_24_013306_create_jo_employees_table', 11),
(39, '2023_10_24_012035_create_job_orders_table', 12),
(40, '2023_11_07_140846_create_product_items_table', 13),
(41, '2023_10_24_042555_create_unit_of_measurements_table', 14),
(42, '2023_10_20_144845_create_product_brands_table', 15),
(43, '2023_10_20_142517_create_product_categories_table', 16),
(44, '2023_10_18_144406_create_product_series_table', 17),
(45, '2023_11_03_143243_create_dep_oculars_table', 18),
(46, '2023_11_09_104328_create_product_resolutions_table', 19),
(47, '2024_01_15_061746_create_packaged_items_table', 20),
(48, '2024_01_15_061800_create_packaged_item_details_table', 21),
(49, '2024_01_18_024217_create_inv_receivings_table', 22),
(50, '2024_01_18_024238_create_inv_receiving_details_table', 23),
(51, '2024_01_22_140142_create_inv_stocks_table', 24),
(52, '2023_12_19_142953_create_sales_quotations_table', 25),
(53, '2024_01_24_024517_create_sales_quotation_details_table', 26),
(54, '2023_12_19_143827_create_sales_orders_table', 27),
(57, '2024_02_15_035424_create_sales_order_details_table', 28),
(65, '2024_03_22_202633_create_inv_issuances_table', 29),
(66, '2024_03_28_195612_create_inv_issuance_items_table', 30),
(67, '2024_03_22_201048_create_employee_inventory_table', 31),
(68, '2024_05_21_231433_create_user_access_groups_table', 32),
(70, '2024_05_21_231444_create_user_access_modules_table', 33),
(71, '2024_05_01_104421_create_user_roles_table', 34),
(72, '2024_07_08_142612_create_dashboard_access_table', 35),
(73, '2024_07_25_135816_create_inv_returns_table', 36),
(74, '2024_07_25_135830_create_inv_return_items_table', 37),
(75, '2024_08_24_153926_create_online_payments_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `group_id`, `module_name`, `module_code`, `module_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Branch', '/personnel/branch', NULL, 1, 1, 1, '2023-09-13 06:38:24', '2023-10-17 05:59:05'),
(2, 1, 'Employee', '/personnel/employee', NULL, 1, 1, 1, '2023-10-08 02:36:57', '2023-10-17 05:59:20'),
(3, 8, 'q', '/qwe', NULL, 0, 1, 1, '2023-10-08 02:37:17', '2024-07-18 07:07:09'),
(4, 2, 'Item', '/product/item', NULL, 1, 1, 1, '2023-10-11 06:41:47', '2023-10-17 06:01:55'),
(5, 2, 'Brand', '/product/brand', NULL, 1, 1, 1, '2023-10-11 06:42:32', '2023-10-11 06:42:32'),
(6, 2, 'Category', '/product/category', NULL, 1, 1, 1, '2023-10-11 06:43:07', '2023-10-11 06:43:07'),
(7, 2, 'Series', '/product/series', NULL, 1, 1, 1, '2023-10-11 06:43:34', '2023-11-07 22:16:00'),
(8, 3, 'User', '/user-account/user', NULL, 1, 1, 1, '2023-10-11 06:43:56', '2023-10-11 06:43:56'),
(9, 3, 'User Role', '/user-account/user-role', NULL, 1, 1, 1, '2023-10-11 06:44:32', '2023-10-11 06:44:32'),
(10, 4, 'Group', '/component/group', NULL, 1, 1, 1, '2023-10-11 06:45:07', '2023-10-11 06:45:07'),
(11, 4, 'Module', '/component/module', NULL, 1, 1, 1, '2023-10-11 06:45:34', '2023-10-11 06:45:34'),
(12, 4, 'Sub-Module', '/component/sub-module', NULL, 0, 1, 1, '2023-10-11 06:46:42', '2024-07-18 04:10:01'),
(13, 3, 'User', '/user-account/user', NULL, 0, 1, 1, '2023-10-14 06:10:48', '2023-11-07 21:18:45'),
(14, 3, 'User Role', '/user-account/user-role', NULL, 0, 1, 1, '2023-10-14 06:12:40', '2023-11-07 21:18:51'),
(15, 6, 'Ocular', '/deployment/ocular', NULL, 1, 1, 1, '2023-10-17 05:08:42', '2023-10-17 05:08:42'),
(16, 6, 'Job Order', '/deployment/job-order', NULL, 1, 1, 1, '2023-10-17 05:09:23', '2023-10-17 05:09:23'),
(17, 6, 'Installation', '/deployment/installation', NULL, 1, 1, 1, '2023-10-17 05:09:44', '2023-10-17 05:09:44'),
(18, 6, 'Additional/Upgrade', '/deployment/upgrade', NULL, 1, 1, 1, '2023-10-17 05:10:19', '2023-10-17 05:10:19'),
(19, 6, 'Structure Cabling', '/deployment/structure-cabling', NULL, 1, 1, 1, '2023-10-17 05:10:51', '2023-10-17 05:10:51'),
(20, 6, 'Rehabilitation/Repair', '/deployment/rehab-repair', NULL, 1, 1, 1, '2023-10-17 05:12:25', '2023-10-17 05:12:25'),
(21, 7, 'Quotation', '/sales/quotation', NULL, 1, 1, 1, '2023-10-19 06:38:06', '2023-10-19 06:38:06'),
(22, 7, 'Order', '/sales/order', NULL, 1, 1, 1, '2023-10-19 06:38:26', '2023-10-19 06:38:26'),
(23, 7, 'Online Payment', '/sales/payment', NULL, 1, 1, 1, '2023-10-19 06:38:51', '2024-06-24 08:55:38'),
(24, 7, 'Remittance', '/sales/remittance', NULL, 0, 1, 1, '2023-10-19 06:39:13', '2024-06-24 08:55:51'),
(25, 2, 'Unit of Measurement', '/product/uom', NULL, 1, 1, 1, '2023-11-07 21:53:14', '2023-11-07 22:16:16'),
(26, 2, 'Camera Resolution', '/product/resolution', NULL, 1, 1, 1, '2023-11-26 01:30:52', '2023-11-26 01:30:52'),
(27, 2, 'Packages', '/product/packages', NULL, 1, 1, 1, '2023-11-27 17:10:29', '2023-11-27 17:23:38'),
(28, 8, 'Receives', '/inventory/receive', NULL, 1, 1, 1, '2024-01-17 17:25:02', '2024-01-17 17:25:02'),
(29, 8, 'Stocks', '/inventory/stocks', NULL, 1, 1, 1, '2024-01-17 17:26:34', '2024-01-17 17:26:34'),
(30, 8, 'Issuance', '/inventory/issuances', NULL, 1, 1, 1, '2024-03-21 12:34:02', '2024-03-21 12:34:02'),
(31, 8, 'Employee Items', '/inventory/employee-items', NULL, 1, 1, 1, '2024-03-22 13:27:04', '2024-03-22 13:27:04'),
(32, 5, 'Payments', '/clients/payments', NULL, 1, 1, 1, '2024-04-03 12:22:51', '2024-07-21 07:41:23'),
(33, 5, 'Client List', '/client/', NULL, 1, 1, 1, '2024-04-03 12:23:56', '2024-07-21 07:39:05'),
(34, 8, 'Returns', '/inventory/returns', NULL, 1, 1, 1, '2024-07-18 07:07:21', '2024-07-25 09:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `online_payments`
--

CREATE TABLE `online_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_control_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_order_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double(11,2) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_payments`
--

INSERT INTO `online_payments` (`id`, `client_id`, `branch_id`, `payment_control_no`, `payment_number`, `job_order_id`, `total_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'OP24-00001', '00001', 'JO24-00001', 23015.00, 1, '2024-08-24 15:50:51', '2024-08-24 15:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `packaged_items`
--

CREATE TABLE `packaged_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `resolution_id` int(11) NOT NULL,
  `camera_number` int(11) NOT NULL,
  `technical_specification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_price` double(8,2) NOT NULL,
  `pack_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pack_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packaged_items`
--

INSERT INTO `packaged_items` (`id`, `brand_id`, `resolution_id`, `camera_number`, `technical_specification`, `pack_name`, `pack_price`, `pack_description`, `pack_remarks`, `path_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '', 'PC SET', 20000.00, 'INTEL RyZWEN', 'COmputer settings', NULL, 1, 2, 0, '2024-03-11 12:38:35', '2024-03-11 12:38:35'),
(2, 2, 1, 2, 'r', 'Package 2', 45000.00, 'r', 'r', NULL, 1, 2, 0, '2024-06-09 10:16:35', '2024-07-17 04:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `packaged_item_details`
--

CREATE TABLE `packaged_item_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packaged_item_details`
--

INSERT INTO `packaged_item_details` (`id`, `package_id`, `item_id`, `item_qty`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 2, 0, '2024-03-11 12:38:35', '2024-03-11 12:38:35'),
(2, 1, 3, 1, 1, 2, 0, '2024-03-11 12:38:35', '2024-03-11 12:38:35'),
(3, 1, 4, 1, 1, 2, 0, '2024-03-11 12:38:35', '2024-03-11 12:38:35'),
(4, 1, 5, 1, 1, 2, 0, '2024-03-11 12:38:35', '2024-03-11 12:38:35'),
(5, 1, 6, 1, 1, 2, 0, '2024-03-11 12:38:35', '2024-03-11 12:38:35'),
(6, 2, 7, 1, 1, 2, 0, '2024-06-09 10:16:35', '2024-06-09 10:16:35'),
(7, 2, 8, 5, 1, 2, 0, '2024-06-09 10:16:35', '2024-06-09 10:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `code`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'create', 'Create', 'Can create Data', 1, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(2, 'read', 'Read', 'Can Read', 1, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(3, 'update', 'Update', 'Can Update', 1, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(4, 'delete', 'Delete', 'Can Delete', 0, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(5, 'remove', 'Remove', 'Can Remove', 1, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(6, 'approve', 'Approve', 'Can Approve', 0, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(7, 'disapprove', 'Disapprove', 'Can Disapprove', 0, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(8, 'download', 'Download', 'Can Download', 0, '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(9, 'email', 'Email', 'Can send Email', 1, '2023-05-29 03:24:28', '2023-05-29 03:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `brand_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ASUS', 1, 1, 1, '2023-11-07 22:40:17', '2024-07-17 04:48:48'),
(2, 'Rapoo', 1, 1, 1, '2023-11-27 01:35:00', '2023-11-27 01:35:00'),
(3, 'A4TECH', 1, 1, 1, '2023-11-27 01:35:18', '2023-11-27 01:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Digital Camera', 1, 1, 1, '2023-11-08 06:43:28', '2024-07-17 04:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_type` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `series_id` int(11) DEFAULT NULL,
  `resolution_id` int(11) DEFAULT NULL,
  `camera_specs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(11,2) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `item_type`, `uom_id`, `brand_id`, `category_id`, `series_id`, `resolution_id`, `camera_specs`, `product_name`, `product_desc`, `product_price`, `remarks`, `file_path`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, NULL, NULL, 'DSLR', NULL, 1000.00, NULL, NULL, 2, 2, 1, '2023-11-26 22:41:56', '2023-11-26 22:41:56'),
(2, 1, 1, 3, 1, NULL, 1, NULL, 'Keyboard', NULL, 300.00, NULL, NULL, 2, 2, 1, '2023-11-27 01:35:46', '2023-11-27 01:35:46'),
(3, 2, 1, 1, NULL, 1, 1, NULL, 'SSD', '1TB', 2500.00, NULL, NULL, 2, 2, 1, '2023-11-28 04:22:59', '2023-11-28 04:22:59'),
(4, 2, 1, 3, 1, NULL, NULL, NULL, 'Monitor', 'dwa', 123.00, NULL, NULL, 0, 2, 1, '2024-01-22 23:38:02', '2024-03-11 12:21:28'),
(5, 1, 2, 3, NULL, NULL, NULL, NULL, 'Mouse Pad', NULL, 5151.00, NULL, NULL, 0, 2, 1, '2024-01-22 23:38:19', '2024-03-11 12:21:14'),
(6, 1, 1, 2, NULL, NULL, NULL, NULL, 'Mouse', NULL, 14.00, NULL, NULL, 0, 2, 1, '2024-01-22 23:38:35', '2024-03-11 12:20:59'),
(7, 1, 1, 2, 1, 1, 1, NULL, 'Dome Type Camera', 'Cam', 3000.00, NULL, NULL, 2, 0, 1, '2024-06-09 10:15:10', '2024-06-09 10:15:10'),
(8, 2, 1, 1, NULL, NULL, NULL, NULL, 'Connector', 'e', 50.00, 'r', NULL, 2, 0, 1, '2024-06-09 10:15:49', '2024-07-17 04:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_resolutions`
--

CREATE TABLE `product_resolutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resolution_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_resolutions`
--

INSERT INTO `product_resolutions` (`id`, `resolution_desc`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1080p 60fps', 1, 1, 1, '2023-11-26 01:31:56', '2024-07-18 03:58:51'),
(2, '2MP / 1080p', 1, 1, 1, '2024-08-10 09:04:22', '2024-08-10 09:04:22'),
(3, '1 MP / 720p', 1, 1, 1, '2024-08-10 09:05:43', '2024-08-10 09:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_series`
--

CREATE TABLE `product_series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_series`
--

INSERT INTO `product_series` (`id`, `series_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Value Series', 1, 1, 1, '2023-11-07 22:20:14', '2024-07-17 05:07:13'),
(2, 'Turbo Series', 1, 1, 1, '2024-08-10 09:01:01', '2024-08-10 09:01:01'),
(3, 'Webcam Series', 1, 1, 1, '2024-08-10 09:01:12', '2024-08-10 09:01:12'),
(4, 'Ultra Series', 1, 1, 1, '2024-08-10 09:01:30', '2024-08-10 09:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `order_control_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_material_cost` decimal(11,2) DEFAULT NULL,
  `order_sub_total` double(11,2) NOT NULL,
  `order_labor_cost` double(11,2) DEFAULT 0.00,
  `order_other_cost` double(11,2) DEFAULT 0.00,
  `order_discount` double(11,2) DEFAULT 0.00,
  `is_vat` int(11) DEFAULT NULL,
  `vat_percentage` int(11) DEFAULT NULL,
  `ewt_percentage` int(11) DEFAULT NULL,
  `vat_amount` decimal(11,2) DEFAULT NULL,
  `ewt_amount` decimal(11,2) DEFAULT NULL,
  `order_total_amount` double(11,2) NOT NULL,
  `payment_type` int(11) NOT NULL COMMENT '1 = Cash, 2 = Online, 3 = Check',
  `payment_status` int(11) NOT NULL COMMENT '0 = Pending, 1 = Paid, 2 = Check Pending',
  `order_date` date NOT NULL,
  `order_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `is_posted` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `branch_id`, `quotation_id`, `client_id`, `order_control_no`, `order_number`, `order_material_cost`, `order_sub_total`, `order_labor_cost`, `order_other_cost`, `order_discount`, `is_vat`, `vat_percentage`, `ewt_percentage`, `vat_amount`, `ewt_amount`, `order_total_amount`, `payment_type`, `payment_status`, `order_date`, `order_remarks`, `order_status`, `is_posted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 'O24-00001', '00001', '20000.00', 20550.00, 500.00, 50.00, 1.00, 1, 12, 0, '2466.00', '0.00', 23015.00, 2, 1, '2024-07-27', NULL, 1, 1, 2, 0, '2024-07-27 04:10:57', '2024-08-11 09:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details`
--

CREATE TABLE `sales_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `is_package` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_amount` double(8,2) NOT NULL,
  `order_total_amount` double(8,2) NOT NULL,
  `is_additional` int(1) DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_order_details`
--

INSERT INTO `sales_order_details` (`id`, `order_id`, `item_id`, `package_id`, `is_package`, `order_qty`, `order_amount`, `order_total_amount`, `is_additional`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 1, 1, 20000.00, 20000.00, 0, 2, 0, '2024-07-27 04:10:57', '2024-07-27 04:10:57'),
(2, 1, 2, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-07-27 04:10:57', '2024-07-27 04:10:57'),
(3, 1, 3, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-07-27 04:10:57', '2024-07-27 04:10:57'),
(4, 1, 4, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-07-27 04:10:57', '2024-07-27 04:10:57'),
(5, 1, 5, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-07-27 04:10:57', '2024-07-27 04:10:57'),
(6, 1, 6, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-07-27 04:10:57', '2024-07-27 04:10:57'),
(7, 1, 8, 0, 0, 1, 50.00, 50.00, 1, 2, 0, '2024-07-27 04:10:57', '2024-07-27 04:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quotations`
--

CREATE TABLE `sales_quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `quote_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_control_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_request` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `installation_type` int(11) DEFAULT NULL,
  `resolution_id` int(11) DEFAULT NULL,
  `channel_id` int(11) DEFAULT NULL,
  `indoor_cam_no` int(11) DEFAULT NULL,
  `outdoor_cam_no` int(11) DEFAULT NULL,
  `quote_date` date NOT NULL,
  `client_id` int(11) DEFAULT NULL COMMENT 'ref-table: clients.id',
  `quote_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote_material_cost` double(11,2) NOT NULL DEFAULT 0.00,
  `quote_labor_cost` double(11,2) NOT NULL DEFAULT 0.00,
  `quote_other_cost` double(11,2) NOT NULL DEFAULT 0.00,
  `quote_sub_total` double(11,2) NOT NULL DEFAULT 0.00,
  `quote_discount` double(11,2) NOT NULL DEFAULT 0.00,
  `is_vat` int(11) DEFAULT NULL,
  `vat_percentage` int(11) DEFAULT NULL,
  `ewt_percentage` int(11) DEFAULT NULL,
  `vat_amount` double(11,2) DEFAULT NULL,
  `ewt_amount` double(11,2) DEFAULT NULL,
  `total_amount` double(11,2) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_posted` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_quotations`
--

INSERT INTO `sales_quotations` (`id`, `branch_id`, `quote_number`, `quote_control_number`, `is_request`, `brand_id`, `installation_type`, `resolution_id`, `channel_id`, `indoor_cam_no`, `outdoor_cam_no`, `quote_date`, `client_id`, `quote_name`, `quote_email`, `quote_contact_no`, `quote_address`, `remarks`, `quote_material_cost`, `quote_labor_cost`, `quote_other_cost`, `quote_sub_total`, `quote_discount`, `is_vat`, `vat_percentage`, `ewt_percentage`, `vat_amount`, `ewt_amount`, `total_amount`, `status`, `is_posted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, '00001', 'RFQ24-00001', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', 4, 'Rakk Enroll', 'hontucankenneth@gmail.com', '123123', 'QWE QWE ASD', NULL, 20000.00, 0.00, 0.00, 20000.00, 0.00, 0, 0, 0, 0.00, 0.00, 20000.00, 1, 1, 2, 0, '2024-07-27 04:09:44', '2024-07-27 04:09:44'),
(2, 3, '00002', 'RFQ24-00002', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-06', 4, 'Rakk Enroll', 'hontucankenneth@gmail.com', '123123', 'QWE QWE ASD', NULL, 40000.00, 0.00, 0.00, 40000.00, 0.00, 1, 12, 0, 4800.00, 0.00, 44800.00, 1, 0, 2, 0, '2024-08-06 09:44:59', '2024-08-06 09:44:59'),
(3, 3, '00003', 'RFQ24-00003', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-06', 4, 'Rakk Enroll', 'hontucankenneth@gmail.com', '123123', 'QWE QWE ASD', NULL, 20000.00, 1.00, 2.00, 20003.00, 3.00, 1, 12, 2, 2400.36, 400.06, 22000.30, 1, 0, 2, 0, '2024-08-06 09:48:09', '2024-08-06 09:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quotation_details`
--

CREATE TABLE `sales_quotation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL COMMENT 'if 0 = parent of package',
  `package_id` int(11) NOT NULL,
  `is_package` int(11) NOT NULL,
  `quote_qty` int(11) NOT NULL,
  `quote_total_amount` decimal(14,2) NOT NULL,
  `quote_amount` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_quotation_details`
--

INSERT INTO `sales_quotation_details` (`id`, `quotation_id`, `item_id`, `package_id`, `is_package`, `quote_qty`, `quote_total_amount`, `quote_amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 1, 1, '20000.00', 20000.00, 1, 2, 0, '2024-07-27 04:09:44', '2024-07-27 04:09:44'),
(2, 1, 2, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-07-27 04:09:44', '2024-07-27 04:09:44'),
(3, 1, 3, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-07-27 04:09:44', '2024-07-27 04:09:44'),
(4, 1, 4, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-07-27 04:09:44', '2024-07-27 04:09:44'),
(5, 1, 5, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-07-27 04:09:44', '2024-07-27 04:09:44'),
(6, 1, 6, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-07-27 04:09:44', '2024-07-27 04:09:44'),
(7, 2, 0, 1, 1, 2, '40000.00', 20000.00, 1, 2, 0, '2024-08-06 09:44:59', '2024-08-06 09:44:59'),
(8, 2, 2, 1, 1, 2, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:44:59', '2024-08-06 09:44:59'),
(9, 2, 3, 1, 1, 2, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:44:59', '2024-08-06 09:44:59'),
(10, 2, 4, 1, 1, 2, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:44:59', '2024-08-06 09:44:59'),
(11, 2, 5, 1, 1, 2, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:44:59', '2024-08-06 09:44:59'),
(12, 2, 6, 1, 1, 2, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:44:59', '2024-08-06 09:44:59'),
(13, 3, 0, 1, 1, 1, '20000.00', 20000.00, 1, 2, 0, '2024-08-06 09:48:09', '2024-08-06 09:48:09'),
(14, 3, 2, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:48:09', '2024-08-06 09:48:09'),
(15, 3, 3, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:48:09', '2024-08-06 09:48:09'),
(16, 3, 4, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:48:09', '2024-08-06 09:48:09'),
(17, 3, 5, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:48:09', '2024-08-06 09:48:09'),
(18, 3, 6, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-08-06 09:48:09', '2024-08-06 09:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `sub_modules`
--

CREATE TABLE `sub_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `sub_module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_module_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_module_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_measurements`
--

CREATE TABLE `unit_of_measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom_shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_of_measurements`
--

INSERT INTO `unit_of_measurements` (`id`, `uom_name`, `uom_shortname`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Piece', 'PC', 1, 1, 1, '2023-11-07 21:54:37', '2023-11-07 21:54:37'),
(2, 'Box', 'BOX', 1, 1, 1, '2023-11-07 21:54:48', '2023-11-07 21:54:48'),
(3, 'Meter', 'M', 1, 1, 1, '2023-11-07 21:55:03', '2024-07-17 05:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `data_access` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `role_id`, `data_access`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Test', 'test@account.com', NULL, '$2y$10$G4CsE4CEahMU3We5EUG56eDXNm2i/VPfQreTAUGthpWtuH/XGSwZe', NULL, 1, 1, 2, '2023-10-09 06:30:18', '2024-08-05 17:55:28'),
(2, 2, 1, 2, 'cyber123', 'cyber.angustia@gmail.com', NULL, '$2y$10$NpR3iF.Tuw4ueahzD0.Txefg8OIPQZ2UnXgFVuJMvGUEu2ZTeDxRe', 'slGSVkCkpy77DmyMa51xUEP6h01IDig3H8fe0pDJXDoUenLwr1bCViJrqOYN', 1, 2, 2, '2023-10-09 06:33:48', '2024-08-24 14:27:31'),
(3, 0, 1, 1, 'guest1', 'guest@email.com', NULL, '$2y$10$mWiPywDBALhp0Y4BYe1hqudfcpTYu.mbHCai2N9AFeGUOdxDTSHTG', NULL, 1, 2, NULL, '2024-04-30 13:23:01', '2024-04-30 13:23:01'),
(4, 4, 1, 1, 'christy', 'chr@gmail.com', NULL, '$2y$10$3lRNMflh1Dyt8utT6a1GtOKciVbVVL3jm34fAAtrBKVpHHxU6ZLCO', NULL, 1, 1, NULL, '2024-05-01 03:00:59', '2024-06-24 08:54:18'),
(5, 5, 1, 1, NULL, 'asd@gmail.com', NULL, '$2y$10$Tb8f9Y9s7Y0OaX8KcqR2mOtOq1XGrRShu/SbI456wWK.9eCUgu6Oq', NULL, 1, 2, NULL, '2024-07-09 12:44:29', '2024-07-09 12:44:29'),
(6, 6, 1, 1, NULL, 'zxc@gmail.com', NULL, '$2y$10$YsI6Zz4Z.YN2D537hHTpdOA1mO2RFeAu/KQ3VaBPhf8s0ZVXSozK2', NULL, 1, 2, NULL, '2024-07-09 12:59:03', '2024-07-09 12:59:03'),
(7, 7, 1, 1, NULL, 'qwe@gmail.com', NULL, '$2y$10$1pV8a6ARmp9y/3B.8yovp.YJ7vJitZFaTK55EsBJoL2J.l8FHGm8u', NULL, 1, 2, NULL, '2024-07-09 13:00:37', '2024-07-09 13:00:37'),
(8, 8, 1, 1, NULL, 'ty@gmail.com', NULL, '$2y$10$SHYZd/d/jh0yQ6Qwa7Vyxe1IBLoe4TDs0kU1sULwTaLnvcMCUMccW', NULL, 1, 2, NULL, '2024-07-09 13:02:29', '2024-07-09 13:02:29'),
(9, 9, 1, 1, NULL, 'gg@gmail.com', NULL, '$2y$10$vnJ6mldAOWw6W0C6t9MYUe1PsI9/Z2QPYb1nwCsO/QmYXwki68yjm', NULL, 1, 2, NULL, '2024-07-09 13:04:26', '2024-07-09 13:04:26'),
(10, 10, 1, 1, NULL, 'jj@gmail.com', NULL, '$2y$10$Qw.kT4OWE7Tz3s0q1mCD0uafL4azAE5qv9TlBFUr55Pgkjf5Pvw.C', NULL, 1, 2, NULL, '2024-07-09 13:05:12', '2024-07-09 13:05:12'),
(11, 11, 1, 1, NULL, 'oo@gmail.com', NULL, '$2y$10$L8huhiai2q3lcMXXDhk0n.CZ4XbFDO6S7AaAFWkXcpey5CRW8hwz2', NULL, 1, 2, NULL, '2024-07-09 13:05:55', '2024-07-09 13:05:55'),
(12, 12, 1, 1, NULL, 'pp@gmail.com', NULL, '$2y$10$4acnZBtfcQ2qcIT0HiR2tOTtHGNec7p8omPZD0a4JWaOOHsAb4ulC', NULL, 1, 2, NULL, '2024-07-09 13:11:48', '2024-07-09 13:11:48'),
(13, 13, 3, 3, NULL, 'mm@gmail.com', NULL, '$2y$10$RGDj/Z.NofgY56cSHW6OHe/5rki5HCgUR59Vajir7yVSX4FyindHG', NULL, 1, 2, 2, '2024-07-09 13:13:15', '2024-07-18 07:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_controls`
--

CREATE TABLE `user_access_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_permission_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_access_groups`
--

CREATE TABLE `user_access_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_access_groups`
--

INSERT INTO `user_access_groups` (`id`, `user_id`, `group_id`, `permissions`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Create,Read,Delete,Remove', 1, 2, 1, '2024-05-22 09:30:25', '2024-06-24 08:54:18'),
(3, 4, 6, 'Create', 1, 2, 1, '2024-05-22 09:31:30', '2024-06-24 08:54:18'),
(4, 4, 1, 'Create,Delete', 1, 2, 2, '2024-05-22 12:17:58', '2024-05-22 12:17:58'),
(84, 3, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:04:14'),
(88, 1, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(89, 1, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(90, 1, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(91, 1, 4, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(92, 1, 6, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(93, 1, 7, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(94, 1, 8, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(98, 1, 5, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-05 17:55:27', '2024-08-05 17:55:27'),
(159, 13, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(160, 13, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(161, 13, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(162, 13, 4, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(171, 2, 1, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(172, 2, 2, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(173, 2, 3, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(174, 2, 4, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(175, 2, 5, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(176, 2, 6, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(177, 2, 7, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(178, 2, 8, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_modules`
--

CREATE TABLE `user_access_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_access_modules`
--

INSERT INTO `user_access_modules` (`id`, `user_id`, `module_id`, `permissions`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(37, 3, 1, 'Read,Update,Remove,Approve,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:40:26'),
(38, 3, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:04:14'),
(39, 3, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:04:14'),
(55, 1, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(56, 1, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(57, 1, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(58, 1, 4, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(59, 1, 5, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(60, 1, 6, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(61, 1, 7, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(62, 1, 25, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(63, 1, 26, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(64, 1, 27, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(65, 1, 8, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(66, 1, 9, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(67, 1, 10, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:27'),
(68, 1, 11, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(69, 1, 12, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(70, 1, 15, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(71, 1, 16, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(72, 1, 17, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(73, 1, 18, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(74, 1, 19, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(75, 1, 20, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(76, 1, 21, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(77, 1, 22, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(78, 1, 23, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(79, 1, 24, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(80, 1, 28, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(81, 1, 29, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(82, 1, 30, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(83, 1, 31, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-24 08:49:37', '2024-08-05 17:55:28'),
(102, 1, 33, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-05 17:55:28', '2024-08-05 17:55:28'),
(103, 1, 34, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-05 17:55:28', '2024-08-05 17:55:28'),
(279, 13, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(280, 13, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(281, 13, 4, 'Create,Read,Update,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(282, 13, 5, 'Read,Update,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(283, 13, 6, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(284, 13, 7, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(285, 13, 25, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(286, 13, 26, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(287, 13, 27, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(288, 13, 8, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(289, 13, 9, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(290, 13, 10, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(291, 13, 11, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(292, 13, 15, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(293, 13, 16, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(294, 13, 17, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(295, 13, 18, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(296, 13, 19, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(297, 13, 20, 'Read,Update,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(298, 13, 28, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(299, 13, 29, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(300, 13, 30, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(301, 13, 31, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(302, 13, 34, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-08-06 03:08:25', '2024-08-06 03:08:25'),
(332, 2, 1, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(333, 2, 2, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(334, 2, 4, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(335, 2, 5, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(336, 2, 6, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(337, 2, 7, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(338, 2, 25, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(339, 2, 26, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(340, 2, 27, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(341, 2, 8, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(342, 2, 9, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(343, 2, 10, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(344, 2, 11, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(345, 2, 32, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(346, 2, 33, 'Read,Update', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(347, 2, 15, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(348, 2, 16, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(349, 2, 17, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(350, 2, 18, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(351, 2, 19, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(352, 2, 20, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(353, 2, 21, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(354, 2, 22, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(355, 2, 23, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(356, 2, 28, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(357, 2, 29, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(358, 2, 30, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(359, 2, 31, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31'),
(360, 2, 34, 'Create,Read,Update,Remove', 1, 2, 2, '2024-08-24 14:27:31', '2024-08-24 14:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 2, 2, '2024-06-30 11:08:10', '2024-06-30 11:08:10'),
(2, 'Staff', 1, 2, 2, '2024-06-30 11:12:58', '2024-06-30 11:12:58'),
(3, 'Technicians', 1, 2, 2, '2024-06-30 11:14:02', '2024-07-08 05:25:33'),
(4, 'ASD', 1, 2, 2, '2024-07-09 12:40:25', '2024-07-09 12:40:25'),
(5, 'Test', 1, 2, 2, '2024-07-16 08:36:44', '2024-07-18 04:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `work_scopes`
--

CREATE TABLE `work_scopes` (
  `id` int(11) NOT NULL,
  `scope_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_scopes`
--

INSERT INTO `work_scopes` (`id`, `scope_desc`) VALUES
(1, 'New Installation'),
(2, 'Additional/Upgrade'),
(3, 'Structure Cabling'),
(4, 'Rehabilitation/Repair');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_access`
--
ALTER TABLE `dashboard_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dep_oculars`
--
ALTER TABLE `dep_oculars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_inventory`
--
ALTER TABLE `employee_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_roles`
--
ALTER TABLE `employee_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_issuances`
--
ALTER TABLE `inv_issuances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_issuance_items`
--
ALTER TABLE `inv_issuance_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_receivings`
--
ALTER TABLE `inv_receivings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_receiving_details`
--
ALTER TABLE `inv_receiving_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_returns`
--
ALTER TABLE `inv_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_return_items`
--
ALTER TABLE `inv_return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_stocks`
--
ALTER TABLE `inv_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_orders`
--
ALTER TABLE `job_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jo_employees`
--
ALTER TABLE `jo_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packaged_items`
--
ALTER TABLE `packaged_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packaged_item_details`
--
ALTER TABLE `packaged_item_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_resolutions`
--
ALTER TABLE `product_resolutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_series`
--
ALTER TABLE `product_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_quotations`
--
ALTER TABLE `sales_quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_quotation_details`
--
ALTER TABLE `sales_quotation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_modules`
--
ALTER TABLE `sub_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_of_measurements`
--
ALTER TABLE `unit_of_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_access_controls`
--
ALTER TABLE `user_access_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_groups`
--
ALTER TABLE `user_access_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_modules`
--
ALTER TABLE `user_access_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_scopes`
--
ALTER TABLE `work_scopes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dashboard_access`
--
ALTER TABLE `dashboard_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `dep_oculars`
--
ALTER TABLE `dep_oculars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_inventory`
--
ALTER TABLE `employee_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_roles`
--
ALTER TABLE `employee_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inv_issuances`
--
ALTER TABLE `inv_issuances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inv_issuance_items`
--
ALTER TABLE `inv_issuance_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inv_receivings`
--
ALTER TABLE `inv_receivings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inv_receiving_details`
--
ALTER TABLE `inv_receiving_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inv_returns`
--
ALTER TABLE `inv_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inv_return_items`
--
ALTER TABLE `inv_return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inv_stocks`
--
ALTER TABLE `inv_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_orders`
--
ALTER TABLE `job_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jo_employees`
--
ALTER TABLE `jo_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `online_payments`
--
ALTER TABLE `online_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packaged_items`
--
ALTER TABLE `packaged_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packaged_item_details`
--
ALTER TABLE `packaged_item_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_resolutions`
--
ALTER TABLE `product_resolutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_series`
--
ALTER TABLE `product_series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_quotations`
--
ALTER TABLE `sales_quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_quotation_details`
--
ALTER TABLE `sales_quotation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_of_measurements`
--
ALTER TABLE `unit_of_measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_controls`
--
ALTER TABLE `user_access_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_access_groups`
--
ALTER TABLE `user_access_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `user_access_modules`
--
ALTER TABLE `user_access_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_scopes`
--
ALTER TABLE `work_scopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
