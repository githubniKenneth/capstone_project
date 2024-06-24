-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 11:47 AM
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
(1, 'Cavite Branch', 'B38 L23', 'P1 Cityhomes Resortsville Langkaan 2', 'Dasmariñas', 'Cavite', 'B38 L23 P1 Cityhomes Resortsville Langkaan 2 Dasmariñas Cavite', '(046)-866-7729', '09123456789', 'citisec2020@gmail.com', 1, 1, 1, '2023-08-17 05:16:22', '2023-08-19 17:23:45'),
(2, 'Manila Branch', NULL, '2675 Pinoy St.', 'Brgy. 135 Balut Tondo', 'Manila', ' 2675 Pinoy St. Brgy. 135 Balut Tondo Manila', '(02)-8-635-7552', '+639560896852', 'citisec2020@gmail.com', 1, 1, 1, '2023-08-17 18:13:15', '2023-08-18 19:31:37'),
(3, 'Batangas Branch', NULL, 'Sitio Pulo 7B', 'Brgy. Tambo,', 'Lipa City Batangas', ' Sitio Pulo 7B Brgy. Tambo, Lipa City Batangas', '(046)-866-7729', '+639770553036', 'citisec2020@gmail.com', 1, 1, 1, '2023-08-17 18:28:18', '2023-10-14 00:46:03');

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
(1, 2, '2024-06-07', 'QWE', 1, 1, 2, 0, '2024-06-07 10:27:00', '2024-06-07 10:27:00'),
(2, 4, '2024-06-08', NULL, 1, 1, 2, 2, '2024-06-08 11:55:14', '2024-06-11 07:21:26'),
(3, 2, '2024-06-11', NULL, 1, 1, 2, 2, '2024-06-11 08:49:26', '2024-06-11 08:54:41'),
(4, 3, '2024-06-11', NULL, 1, 1, 2, 0, '2024-06-11 08:56:27', '2024-06-11 08:56:27'),
(5, 3, '2024-06-11', NULL, 2, 1, 2, 2, '2024-06-11 08:58:35', '2024-06-11 10:11:15');

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
(2, 2, 2, 'Cyber', 'C', 'Angustia', 'Cyber C Angustia Jr.', 'Jr.', '1', 'Street', 'Barangay', 'City', '1 Street Barangay City', NULL, '09123613732', 'cyber@gmail.com', 1, 1, 1, '2023-08-18 19:59:08', '2023-08-18 19:59:08'),
(3, 3, 4, 'Roice Ivan', 'B', 'Bulalacao', 'Roice Ivan B Bulalacao ', NULL, '2', 'Street', 'BCDA', 'Taguig City', '2 Street BCDA Taguig City', NULL, '09123456789', 'roice@gmail.com', 1, 1, 1, '2023-08-18 19:59:34', '2023-08-18 19:59:34'),
(4, 2, 2, 'Christy', NULL, 'Fab', 'Christy  Fab ', NULL, NULL, 'Limasawa St.', 'Pitogo', 'Makati City', ' Limasawa St. Pitogo Makati City', NULL, '09123456789', 'christy.fab@gmail.com', 1, 1, 1, '2023-10-15 05:43:56', '2024-04-03 02:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `employee_inventory`
--

CREATE TABLE `employee_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `issued_qty` int(11) NOT NULL,
  `returned_qty` int(11) DEFAULT NULL,
  `balance_qty` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_inventory`
--

INSERT INTO `employee_inventory` (`id`, `emp_id`, `item_id`, `issued_qty`, `returned_qty`, `balance_qty`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, 1, NULL, '2024-03-30 09:11:59', '2024-03-30 09:13:32'),
(2, 1, 2, 6, NULL, 6, NULL, '2024-03-30 09:11:59', '2024-03-30 09:13:32'),
(3, 1, 4, 5, NULL, 5, NULL, '2024-03-30 09:11:59', '2024-03-30 09:13:32'),
(4, 4, 1, 1, NULL, 1, NULL, '2024-03-30 09:12:48', '2024-03-30 09:13:32'),
(5, 4, 2, 1, NULL, 1, NULL, '2024-03-30 09:12:48', '2024-03-30 09:13:32'),
(6, 2, 4, 1, NULL, 1, NULL, '2024-03-30 09:14:44', '2024-03-30 09:14:44'),
(7, 2, 6, 1, NULL, 1, NULL, '2024-03-30 09:14:44', '2024-03-30 09:14:44');

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
(5, 'Clients', '/client', 'fa fa-user', NULL, 1, 1, 1, '2023-10-15 05:32:20', '2024-04-03 12:30:47'),
(6, 'Deployment', '/deployment/job-order', 'fa-solid fa-van-shuttle', NULL, 1, 1, 1, '2023-10-17 01:52:19', '2023-10-17 05:39:25'),
(7, 'Sales', '/request', 'fa-solid fa-sack-dollar', NULL, 1, 1, 1, '2023-10-19 06:33:47', '2023-10-19 06:33:47'),
(8, 'Inventory', '/inventory', 'fa-solid fa-warehouse', NULL, 1, 1, 1, '2024-01-17 17:22:30', '2024-01-17 17:22:30');

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
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_posted` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_issuances`
--

INSERT INTO `inv_issuances` (`id`, `issuance_type`, `issuance_date`, `issuance_number`, `issuance_control_no`, `issued_by`, `received_by`, `remarks`, `is_posted`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-04-30', '00001', 'IS24-00001', 2, 2, '5', 0, 1, 2, 0, '2024-04-30 08:53:05', '2024-04-30 08:53:05');

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
(1, 1, 4, NULL, 1, NULL, 1, 2, 0, '2024-04-30 08:53:05', '2024-04-30 08:53:05'),
(2, 1, 5, NULL, 1, NULL, 1, 2, 0, '2024-04-30 08:53:05', '2024-04-30 08:53:05'),
(3, 1, 6, NULL, 1, NULL, 1, 2, 0, '2024-04-30 08:53:05', '2024-04-30 08:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `inv_receivings`
--

CREATE TABLE `inv_receivings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rec_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `inv_receivings` (`id`, `rec_code`, `rec_supplier`, `rec_date`, `rec_remarks`, `status`, `is_posted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'h', 'i', '2024-02-19', 'o', 1, 1, 2, 0, '2024-02-19 05:36:52', '2024-02-19 05:36:52'),
(2, '2', 'k', '2024-02-19', NULL, 1, 1, 2, 0, '2024-02-19 05:38:33', '2024-02-19 05:38:33'),
(3, '03', 'ASDXW', '2024-03-11', 'QWE', 1, 1, 2, 0, '2024-03-11 12:22:52', '2024-03-11 12:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `inv_receiving_details`
--

CREATE TABLE `inv_receiving_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rec_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
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
(1, 1, 1, 2, 2, 1, 1, 2, 0, '2024-02-19 05:36:52', '2024-02-19 05:36:52'),
(2, 1, 4, 5, 5, 1, 1, 2, 0, '2024-02-19 05:36:52', '2024-02-19 05:36:52'),
(3, 2, 1, 1, 1, 1, 1, 2, 0, '2024-02-19 05:38:33', '2024-02-19 05:38:33'),
(4, 2, 4, 1, 1, 1, 1, 2, 0, '2024-02-19 05:38:33', '2024-02-19 05:38:33'),
(5, 2, 6, 10, 10, 1, 1, 2, 0, '2024-02-19 05:38:33', '2024-02-19 05:38:33'),
(6, 3, 1, 50, 50, 1, 1, 2, 0, '2024-03-11 12:22:52', '2024-03-11 12:22:52'),
(7, 3, 2, 50, 50, 1, 1, 2, 0, '2024-03-11 12:22:52', '2024-03-11 12:22:52'),
(8, 3, 3, 50, 50, 1, 1, 2, 0, '2024-03-11 12:22:52', '2024-03-11 12:22:52'),
(9, 3, 4, 50, 50, 1, 1, 2, 0, '2024-03-11 12:22:52', '2024-03-11 12:22:52'),
(10, 3, 5, 50, 50, 1, 1, 2, 0, '2024-03-11 12:22:52', '2024-03-11 12:22:52'),
(11, 3, 6, 50, 50, 1, 1, 2, 0, '2024-03-11 12:22:52', '2024-03-11 12:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `inv_stocks`
--

CREATE TABLE `inv_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
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

INSERT INTO `inv_stocks` (`id`, `item_id`, `issued_qty`, `ordered_qty`, `returned_qty`, `sold_qty`, `adjusted_qty`, `balance_qty`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 0, 0, 0, 41, 1, 2, 0, NULL, NULL),
(2, 4, 0, 15, 0, 2, 0, 33, 1, 2, 0, NULL, NULL),
(3, 6, 0, 15, 0, 2, 0, 42, 1, 2, 0, NULL, NULL),
(4, 2, 0, 16, 0, 2, 0, 21, 1, 2, 0, NULL, NULL),
(5, 3, 0, 15, 0, 2, 0, 33, 1, 2, 0, NULL, NULL),
(6, 5, 0, 15, 0, 2, 0, 33, 1, 2, 0, NULL, NULL);

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
(1, '00001', 'JO24-00001', 3, 1, 1, NULL, '2024-06-07T18:39:24', '2024-06-07T18:39', 1, 2, 0, '2024-06-07 10:39:47', '2024-06-07 10:39:47'),
(2, '00002', 'JO24-00002', 4, 2, 2, NULL, '2024-06-07T18:59', '2024-06-07T19:00', 1, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39');

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
(1, 1, 1, 4, 1, 2, 0, '2024-06-07 10:27:00', '2024-06-07 10:27:00'),
(2, 1, 2, 3, 1, 2, 0, '2024-06-07 10:39:47', '2024-06-07 10:39:47'),
(4, 2, 2, 4, 1, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39'),
(5, 2, 2, 3, 1, 2, 0, '2024-06-08 11:55:14', '2024-06-08 11:55:14'),
(8, 4, 1, 3, 1, 2, 0, '2024-06-11 08:56:27', '2024-06-11 08:56:27'),
(30, 5, 1, 1, 1, 2, 0, '2024-06-11 10:11:15', '2024-06-11 10:11:15'),
(31, 5, 1, 4, 1, 2, 0, '2024-06-11 10:11:15', '2024-06-11 10:11:15');

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
(70, '2024_05_21_231444_create_user_access_modules_table', 33);

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
(3, 1, 'Employee Role', '/personnel/employee-role', NULL, 1, 1, 1, '2023-10-08 02:37:17', '2023-10-17 05:59:29'),
(4, 2, 'Item', '/product/item', NULL, 1, 1, 1, '2023-10-11 06:41:47', '2023-10-17 06:01:55'),
(5, 2, 'Brand', '/product/brand', NULL, 1, 1, 1, '2023-10-11 06:42:32', '2023-10-11 06:42:32'),
(6, 2, 'Category', '/product/category', NULL, 1, 1, 1, '2023-10-11 06:43:07', '2023-10-11 06:43:07'),
(7, 2, 'Series', '/product/series', NULL, 1, 1, 1, '2023-10-11 06:43:34', '2023-11-07 22:16:00'),
(8, 3, 'User', '/user-account/user', NULL, 1, 1, 1, '2023-10-11 06:43:56', '2023-10-11 06:43:56'),
(9, 3, 'User Role', '/user-account/user-role', NULL, 1, 1, 1, '2023-10-11 06:44:32', '2023-10-11 06:44:32'),
(10, 4, 'Group', '/component/group', NULL, 1, 1, 1, '2023-10-11 06:45:07', '2023-10-11 06:45:07'),
(11, 4, 'Module', '/component/module', NULL, 1, 1, 1, '2023-10-11 06:45:34', '2023-10-11 06:45:34'),
(12, 4, 'Sub-Module', '/component/sub-module', NULL, 1, 1, 1, '2023-10-11 06:46:42', '2023-10-11 06:46:42'),
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
(32, 5, 'Feed Back', '/clients/feedback', NULL, 1, 1, 1, '2024-04-03 12:22:51', '2024-04-03 12:22:51'),
(33, 5, 'Client List', '/client', NULL, 1, 1, 1, '2024-04-03 12:23:56', '2024-04-03 12:24:12');

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
(2, 2, 1, 2, 'r', 'Package 2', 45000.00, 'r', 'r', NULL, 1, 2, 0, '2024-06-09 10:16:35', '2024-06-09 10:16:35');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `code`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create', 'Create', 'Can create Data', '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(2, 'read', 'Read', 'Can Read', '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(3, 'update', 'Update', 'Can Update', '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(4, 'delete', 'Delete', 'Can Delete', '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(5, 'remove', 'Remove', 'Can Remove', '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(6, 'approve', 'Approve', 'Can Approve', '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(7, 'disapprove', 'Disapprove', 'Can Disapprove', '2023-05-29 03:24:28', '2023-05-29 03:24:28'),
(8, 'download', 'Download', 'Can Download', '2023-05-29 03:24:28', '2023-05-29 03:24:28');

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
(1, 'ASUS', 1, 1, 1, '2023-11-07 22:40:17', '2023-11-07 22:40:17'),
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
(1, 'Digital Camera', 1, 1, 1, '2023-11-08 06:43:28', '2023-11-08 06:43:28');

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
(8, 2, 1, 1, NULL, NULL, NULL, NULL, 'Connector', 'e', 50.00, 'r', NULL, 2, 0, 1, '2024-06-09 10:15:49', '2024-06-09 10:15:49');

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
(1, '1080p 60fps', 1, 1, 1, '2023-11-26 01:31:56', '2023-11-26 01:31:56');

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
(1, 'Value Series', 1, 1, 1, '2023-11-07 22:20:14', '2023-11-07 22:38:18');

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
(1, 3, 1, 3, 'O24-00001', '00001', '20000.00', 20001.00, 1.00, 0.00, 1.00, 1, 12, 1, '2400.12', '200.01', 22200.11, 2, 0, '2024-06-07', NULL, 1, 1, 2, 0, '2024-06-07 10:31:04', '2024-06-07 10:31:04'),
(2, 3, 2, 4, 'O24-00002', '00002', '20000.00', 20000.00, 0.00, 0.00, 0.00, 0, 0, 0, '0.00', '0.00', 20000.00, 1, 0, '2024-06-07', NULL, 1, 1, 2, 0, '2024-06-07 10:47:23', '2024-06-07 10:47:23'),
(3, 3, 3, 4, 'O24-00003', '00003', '20000.00', 20000.00, 0.00, 0.00, 0.00, 0, 0, 0, '0.00', '0.00', 20000.00, 1, 1, '2024-06-09', NULL, 1, 1, 2, 0, '2024-06-09 03:15:02', '2024-06-09 03:15:02'),
(4, 3, 4, 4, 'O24-00006', '00004', NULL, 53151.00, NULL, 0.00, 0.00, 0, 0, 0, '0.00', '0.00', 53151.00, 1, 0, '2024-06-16', NULL, 1, 1, 2, 0, '2024-06-09 03:42:28', '2024-06-17 02:17:19'),
(5, 3, 4, 4, 'O24-00005', '00005', '52751.00', 52751.00, 0.00, 0.00, 0.00, 1, 12, 0, '6330.12', '0.00', 59081.12, 1, 0, '2024-06-16', NULL, 1, 1, 2, 0, '2024-06-16 10:25:18', '2024-06-16 10:25:18'),
(6, 3, 4, 4, 'O24-00006', '00006', '53151.00', 53151.00, NULL, 0.00, 0.00, 0, 0, 0, '0.00', '0.00', 53151.01, 1, 0, '2024-06-16', NULL, 1, 1, 2, 0, '2024-06-16 10:34:01', '2024-06-17 02:25:08'),
(7, 3, 4, 4, 'O24-00007', '00007', '50251.00', 70251.00, NULL, 20000.00, 0.00, 0, 0, 0, '0.00', '0.00', 70251.00, 1, 0, '2024-06-18', NULL, 1, 1, 2, 0, '2024-06-18 00:57:15', '2024-06-18 01:01:18'),
(8, 3, 4, 4, 'O24-00008', '00008', '52100.00', 119100.00, NULL, 67000.00, 0.00, 0, 0, 0, '0.00', '0.00', 119100.00, 1, 0, '2024-06-18', NULL, 1, 1, 2, 0, '2024-06-18 01:02:42', '2024-06-18 01:15:34'),
(9, 3, 4, 4, 'O24-00009', '00009', '46150.00', 50200.00, NULL, 4050.00, 0.00, 0, 0, 0, '0.00', '0.00', 50200.00, 1, 1, '2024-06-18', NULL, 1, 1, 2, 0, '2024-06-18 01:17:17', '2024-06-18 03:16:11'),
(10, 3, 4, 4, 'O24-00010', '00010', '48600.00', 71223.00, NULL, 22623.00, 0.00, 0, 0, 0, '0.00', '0.00', 71223.00, 1, 0, '2024-06-18', NULL, 1, 1, 2, 0, '2024-06-18 03:17:26', '2024-06-18 04:09:08');

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
(1, 1, 0, 1, 1, 1, 20000.00, 20000.00, 0, 2, 0, '2024-06-07 10:31:04', '2024-06-07 10:31:04'),
(2, 1, 2, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:31:04', '2024-06-07 10:31:04'),
(3, 1, 3, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:31:04', '2024-06-07 10:31:04'),
(4, 1, 4, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:31:04', '2024-06-07 10:31:04'),
(5, 1, 5, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:31:04', '2024-06-07 10:31:04'),
(6, 1, 6, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:31:04', '2024-06-07 10:31:04'),
(13, 2, 0, 1, 1, 1, 20000.00, 20000.00, 0, 2, 0, '2024-06-07 10:47:23', '2024-06-07 10:47:23'),
(14, 2, 2, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:47:23', '2024-06-07 10:47:23'),
(15, 2, 3, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:47:23', '2024-06-07 10:47:23'),
(16, 2, 4, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:47:23', '2024-06-07 10:47:23'),
(17, 2, 5, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:47:23', '2024-06-07 10:47:23'),
(18, 2, 6, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 10:47:23', '2024-06-07 10:47:23'),
(19, 2, 0, 1, 1, 1, 20000.00, 20000.00, 0, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39'),
(20, 2, 2, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39'),
(21, 2, 3, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39'),
(22, 2, 4, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39'),
(23, 2, 5, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39'),
(24, 2, 6, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-07 11:00:39', '2024-06-07 11:00:39'),
(25, 3, 0, 1, 1, 1, 20000.00, 20000.00, 0, 2, 0, '2024-06-09 03:15:02', '2024-06-09 03:15:02'),
(26, 3, 2, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-09 03:15:02', '2024-06-09 03:15:02'),
(27, 3, 3, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-09 03:15:02', '2024-06-09 03:15:02'),
(28, 3, 4, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-09 03:15:02', '2024-06-09 03:15:02'),
(29, 3, 5, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-09 03:15:02', '2024-06-09 03:15:02'),
(30, 3, 6, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-09 03:15:02', '2024-06-09 03:15:02'),
(37, 5, 8, 0, 0, 2, 50.00, 100.00, 0, 2, 0, '2024-06-16 10:25:18', '2024-06-16 10:25:18'),
(38, 5, 0, 2, 1, 1, 45000.00, 45000.00, 0, 2, 0, '2024-06-16 10:25:18', '2024-06-16 10:25:18'),
(39, 5, 7, 2, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-16 10:25:18', '2024-06-16 10:25:18'),
(40, 5, 8, 2, 1, 5, 0.00, 0.00, 0, 2, 0, '2024-06-16 10:25:18', '2024-06-16 10:25:18'),
(52, 4, 0, 2, 1, 1, 45000.00, 45000.00, 0, 2, 0, '2024-06-17 02:17:19', '2024-06-17 02:17:19'),
(53, 4, 7, 2, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-17 02:17:19', '2024-06-17 02:17:19'),
(54, 4, 8, 2, 1, 5, 0.00, 0.00, 0, 2, 0, '2024-06-17 02:17:19', '2024-06-17 02:17:19'),
(55, 4, 7, 0, 0, 1, 3000.00, 3000.00, 0, 2, 0, '2024-06-17 02:17:19', '2024-06-17 02:17:19'),
(56, 4, 5, 0, 0, 1, 5151.00, 5151.00, 0, 2, 0, '2024-06-17 02:17:19', '2024-06-17 02:17:19'),
(57, 6, 0, 2, 1, 1, 45000.00, 45000.00, 0, 2, 0, '2024-06-17 02:25:08', '2024-06-17 02:25:08'),
(58, 6, 7, 2, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-17 02:25:08', '2024-06-17 02:25:08'),
(59, 6, 8, 2, 1, 5, 0.00, 0.00, 0, 2, 0, '2024-06-17 02:25:08', '2024-06-17 02:25:08'),
(60, 6, 7, 0, 0, 1, 3000.00, 3000.00, 0, 2, 0, '2024-06-17 02:25:08', '2024-06-17 02:25:08'),
(61, 6, 5, 0, 0, 1, 5151.00, 5151.00, 0, 2, 0, '2024-06-17 02:25:08', '2024-06-17 02:25:08'),
(72, 7, 8, 0, 0, 2, 50.00, 100.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(73, 7, 0, 2, 1, 1, 45000.00, 45000.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(74, 7, 7, 2, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(75, 7, 0, 1, 1, 1, 20000.00, 20000.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(76, 7, 2, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(77, 7, 3, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(78, 7, 4, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(79, 7, 5, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(80, 7, 6, 1, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-18 01:01:18', '2024-06-18 01:01:18'),
(143, 8, 0, 2, 1, 1, 45000.00, 45000.00, 1, 2, 0, '2024-06-18 01:15:34', '2024-06-18 01:15:34'),
(144, 8, 7, 2, 1, 1, 0.00, 0.00, 1, 2, 0, '2024-06-18 01:15:34', '2024-06-18 01:15:34'),
(145, 8, 8, 2, 1, 5, 0.00, 0.00, 1, 2, 0, '2024-06-18 01:15:34', '2024-06-18 01:15:34'),
(159, 9, 1, 0, 0, 1, 1000.00, 1000.00, 1, 2, 0, '2024-06-18 03:16:11', '2024-06-18 03:16:11'),
(160, 9, 7, 0, 0, 1, 3000.00, 3000.00, 1, 2, 0, '2024-06-18 03:16:11', '2024-06-18 03:16:11'),
(161, 9, 8, 0, 0, 1, 50.00, 50.00, 1, 2, 0, '2024-06-18 03:16:11', '2024-06-18 03:16:11'),
(176, 10, 8, 0, 0, 2, 50.00, 100.00, 0, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(177, 10, 0, 2, 1, 1, 45000.00, 45000.00, 0, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(178, 10, 7, 2, 1, 1, 0.00, 0.00, 0, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(179, 10, 8, 2, 1, 5, 0.00, 0.00, 0, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(180, 10, 1, 0, 0, 1, 1000.00, 1000.00, 0, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(181, 10, 3, 0, 0, 1, 2500.00, 2500.00, 0, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(182, 10, 4, 0, 0, 1, 123.00, 123.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(183, 10, 3, 0, 0, 1, 2500.00, 2500.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(184, 10, 0, 1, 1, 1, 20000.00, 20000.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(185, 10, 2, 1, 1, 1, 0.00, 0.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(186, 10, 3, 1, 1, 1, 0.00, 0.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(187, 10, 4, 1, 1, 1, 0.00, 0.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(188, 10, 5, 1, 1, 1, 0.00, 0.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08'),
(189, 10, 6, 1, 1, 1, 0.00, 0.00, 1, 2, 0, '2024-06-18 04:09:08', '2024-06-18 04:09:08');

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
(1, 1, '00001', 'RFQ24-00001', 0, 3, 1, 1, 2, 2, 2, '2024-06-07', 3, 'qej ndqwj qwd', 'hontucankenneth@gmail.com', '09124124124', 'Nlex Pampanga', NULL, 20000.00, 0.00, 0.00, 20000.00, 0.00, 0, 0, 0, 0.00, 0.00, 20000.00, 1, 1, 2, 0, '2024-06-07 10:30:12', '2024-06-07 10:30:12'),
(2, 1, '00002', 'RFQ24-00002', 0, 2, 1, 1, 1, 1, 1, '2024-06-07', 4, 'Rakk Enroll', 'hontucankenneth@gmail.com', '123123', 'QWE QWE ASD', NULL, 20000.00, 0.00, 0.00, 20000.00, 0.00, 0, 0, 0, 0.00, 0.00, 20000.00, 1, 1, 2, 0, '2024-06-07 10:46:36', '2024-06-07 10:46:36'),
(3, 1, '00003', 'RFQ24-00003', 0, 3, NULL, 1, 1, 1, 1, '2024-06-09', 4, 'Rakk Enroll', 'hontucankenneth@gmail.com', '123123', 'QWE QWE ASD', NULL, 20000.00, 0.00, 0.00, 20000.00, 0.00, 0, 0, 0, 0.00, 0.00, 20000.00, 1, 1, 2, 0, '2024-06-09 03:14:37', '2024-06-20 03:05:08'),
(4, 2, '00004', 'RFQ24-00004', 0, 1, NULL, NULL, NULL, NULL, NULL, '2024-06-09', 4, 'Rakk Enroll', 'hontucankenneth@gmail.com', '123123', 'QWE QWE ASD', NULL, 46100.00, 0.00, 0.00, 46100.00, 0.00, 0, 0, 0, 0.00, 0.00, 46100.00, 1, 1, 2, 0, '2024-06-09 03:41:23', '2024-06-20 03:01:16'),
(5, 3, '00005', 'RFQ24-00005', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-20', 4, 'Rakk Enroll', 'hontucankenneth@gmail.com', '123123', 'QWE QWE ASD', NULL, 45000.00, 0.00, 0.00, 45000.00, 0.00, 0, 0, 0, 0.00, 0.00, 45000.00, 1, 1, 2, 0, '2024-06-20 03:31:06', '2024-06-20 03:31:06');

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
(1, 1, 0, 1, 1, 1, '20000.00', 20000.00, 1, 2, 0, '2024-06-07 10:30:12', '2024-06-07 10:30:12'),
(2, 1, 2, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:30:12', '2024-06-07 10:30:12'),
(3, 1, 3, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:30:12', '2024-06-07 10:30:12'),
(4, 1, 4, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:30:12', '2024-06-07 10:30:12'),
(5, 1, 5, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:30:12', '2024-06-07 10:30:12'),
(6, 1, 6, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:30:12', '2024-06-07 10:30:12'),
(7, 2, 0, 1, 1, 1, '20000.00', 20000.00, 1, 2, 0, '2024-06-07 10:46:36', '2024-06-07 10:46:36'),
(8, 2, 2, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:46:36', '2024-06-07 10:46:36'),
(9, 2, 3, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:46:36', '2024-06-07 10:46:36'),
(10, 2, 4, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:46:36', '2024-06-07 10:46:36'),
(11, 2, 5, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:46:36', '2024-06-07 10:46:36'),
(12, 2, 6, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-07 10:46:36', '2024-06-07 10:46:36'),
(55, 4, 8, 0, 0, 2, '100.00', 50.00, 1, 2, 0, '2024-06-20 03:01:16', '2024-06-20 03:01:16'),
(56, 4, 0, 2, 1, 1, '45000.00', 45000.00, 1, 2, 0, '2024-06-20 03:01:16', '2024-06-20 03:01:16'),
(57, 4, 7, 2, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:01:16', '2024-06-20 03:01:16'),
(58, 4, 8, 2, 1, 5, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:01:16', '2024-06-20 03:01:16'),
(59, 4, 1, 0, 0, 1, '1000.00', 1000.00, 1, 2, 0, '2024-06-20 03:01:16', '2024-06-20 03:01:16'),
(66, 3, 0, 1, 1, 1, '20000.00', 20000.00, 1, 2, 0, '2024-06-20 03:05:08', '2024-06-20 03:05:08'),
(67, 3, 2, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:05:08', '2024-06-20 03:05:08'),
(68, 3, 3, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:05:08', '2024-06-20 03:05:08'),
(69, 3, 4, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:05:08', '2024-06-20 03:05:08'),
(70, 3, 5, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:05:08', '2024-06-20 03:05:08'),
(71, 3, 6, 1, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:05:08', '2024-06-20 03:05:08'),
(72, 5, 0, 2, 1, 1, '45000.00', 45000.00, 1, 2, 0, '2024-06-20 03:31:06', '2024-06-20 03:31:06'),
(73, 5, 7, 2, 1, 1, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:31:06', '2024-06-20 03:31:06'),
(74, 5, 8, 2, 1, 5, '0.00', 0.00, 1, 2, 0, '2024-06-20 03:31:06', '2024-06-20 03:31:06');

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
(3, 'Meter', 'M', 1, 1, 1, '2023-11-07 21:55:03', '2023-11-07 21:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `emp_id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 'test@account.com', NULL, '$2y$10$G4CsE4CEahMU3We5EUG56eDXNm2i/VPfQreTAUGthpWtuH/XGSwZe', NULL, 1, 1, NULL, '2023-10-09 06:30:18', '2024-06-24 08:54:50'),
(2, 2, 'cyber123', 'cyber.angustia@gmail.com', NULL, '$2y$10$K9.H3tIJmPxL8OJGJ0z2puGSAPGozq5Sd9LwvGgYuTcBtW1rRu0Q2', 'mVqvxPo82ORt88YdeDTnpcrT5rPezeY1xH7u2dqud1qNaldTas52ejBePIxt', 1, 2, NULL, '2023-10-09 06:33:48', '2023-10-09 06:33:48'),
(3, 0, 'guest1', 'guest@email.com', NULL, '$2y$10$mWiPywDBALhp0Y4BYe1hqudfcpTYu.mbHCai2N9AFeGUOdxDTSHTG', NULL, 1, 2, NULL, '2024-04-30 13:23:01', '2024-04-30 13:23:01'),
(4, 4, 'christy', 'chr@gmail.com', NULL, '$2y$10$3lRNMflh1Dyt8utT6a1GtOKciVbVVL3jm34fAAtrBKVpHHxU6ZLCO', NULL, 1, 1, NULL, '2024-05-01 03:00:59', '2024-06-24 08:54:18');

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
(2, 2, 2, 'Read,Update,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-22 09:30:58', '2024-05-24 03:10:28'),
(3, 4, 6, 'Create', 1, 2, 1, '2024-05-22 09:31:30', '2024-06-24 08:54:18'),
(4, 4, 1, 'Create,Delete', 1, 2, 2, '2024-05-22 12:17:58', '2024-05-22 12:17:58'),
(5, 2, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-22 12:23:24', '2024-05-24 03:10:28'),
(82, 2, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 08:59:32', '2024-05-24 08:59:32'),
(83, 2, 4, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 08:59:57', '2024-05-24 08:59:57'),
(84, 3, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:04:14'),
(85, 2, 6, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(86, 2, 7, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(87, 2, 8, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(88, 1, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(89, 1, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(90, 1, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(91, 1, 4, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(92, 1, 6, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(93, 1, 7, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(94, 1, 8, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50');

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
(1, 2, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-22 12:23:24', '2024-05-24 03:05:43'),
(2, 2, 2, 'Create,Read,Update,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-22 12:23:24', '2024-05-24 03:08:29'),
(3, 2, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-22 12:23:24', '2024-05-24 03:05:43'),
(4, 2, 4, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-22 12:23:24', '2024-05-22 12:23:24'),
(5, 2, 5, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-22 12:23:24', '2024-05-22 12:23:24'),
(32, 2, 8, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 03:36:46', '2024-05-24 03:36:46'),
(33, 2, 9, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 03:36:46', '2024-05-24 03:36:46'),
(34, 2, 10, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 08:59:57', '2024-05-24 08:59:57'),
(35, 2, 11, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 08:59:57', '2024-05-24 08:59:57'),
(36, 2, 12, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 08:59:57', '2024-05-24 08:59:57'),
(37, 3, 1, 'Read,Update,Remove,Approve,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:40:26'),
(38, 3, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:04:14'),
(39, 3, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-05-24 09:04:14', '2024-05-24 09:04:14'),
(40, 2, 15, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(41, 2, 16, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(42, 2, 17, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(43, 2, 18, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(44, 2, 19, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(45, 2, 20, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(46, 2, 21, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(47, 2, 22, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(48, 2, 23, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(49, 2, 24, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(50, 2, 28, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(51, 2, 29, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(52, 2, 30, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(53, 2, 31, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-05 08:07:20', '2024-06-05 08:07:20'),
(54, 2, 27, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 2, '2024-06-09 08:49:43', '2024-06-09 08:49:43'),
(55, 1, 1, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(56, 1, 2, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(57, 1, 3, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(58, 1, 4, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(59, 1, 5, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(60, 1, 6, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(61, 1, 7, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(62, 1, 25, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(63, 1, 26, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(64, 1, 27, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(65, 1, 8, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(66, 1, 9, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(67, 1, 10, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(68, 1, 11, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(69, 1, 12, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(70, 1, 15, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(71, 1, 16, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(72, 1, 17, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(73, 1, 18, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(74, 1, 19, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(75, 1, 20, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(76, 1, 21, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(77, 1, 22, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(78, 1, 23, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(79, 1, 24, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(80, 1, 28, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(81, 1, 29, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(82, 1, 30, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50'),
(83, 1, 31, 'Create,Read,Update,Delete,Remove,Approve,Disapprove,Download', 1, 2, 1, '2024-06-24 08:49:37', '2024-06-24 08:54:50');

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
-- AUTO_INCREMENT for table `dep_oculars`
--
ALTER TABLE `dep_oculars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_inventory`
--
ALTER TABLE `employee_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inv_receivings`
--
ALTER TABLE `inv_receivings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inv_receiving_details`
--
ALTER TABLE `inv_receiving_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inv_stocks`
--
ALTER TABLE `inv_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_orders`
--
ALTER TABLE `job_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jo_employees`
--
ALTER TABLE `jo_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_series`
--
ALTER TABLE `product_series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `sales_quotations`
--
ALTER TABLE `sales_quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_quotation_details`
--
ALTER TABLE `sales_quotation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_controls`
--
ALTER TABLE `user_access_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_access_groups`
--
ALTER TABLE `user_access_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user_access_modules`
--
ALTER TABLE `user_access_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `work_scopes`
--
ALTER TABLE `work_scopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
