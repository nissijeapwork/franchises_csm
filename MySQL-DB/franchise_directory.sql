-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `franchise_directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer_contacts`
--

CREATE TABLE `developer_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `corporate_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `developer_contacts`
--

INSERT INTO `developer_contacts` (`id`, `franchise_id`, `name`, `title`, `phone`, `mobile`, `email`, `corporate_address`, `created_at`, `updated_at`) VALUES
(4, 11, 'Alice Robertson', 'Senior Developer', '5445654', '54654654', 'john@laravel.com', '8583 Irvine ​Center Dr., Suite 260, Irvine, CA 92618', '2025-05-06 05:46:14', '2025-05-06 05:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financials`
--

CREATE TABLE `financials` (
  `financial_id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `cash_required` decimal(12,2) NOT NULL,
  `net_worth_required` decimal(12,2) NOT NULL,
  `total_investment_low` decimal(12,2) NOT NULL,
  `total_investment_high` decimal(12,2) NOT NULL,
  `franchise_fee` decimal(12,2) NOT NULL,
  `royalty_fee` decimal(5,2) NOT NULL,
  `ad_fund_fee` decimal(5,2) NOT NULL,
  `average_unit_volume` decimal(12,2) NOT NULL,
  `affiliate_revenue` decimal(12,2) DEFAULT NULL,
  `initial_fee_one_unit` decimal(12,2) DEFAULT NULL,
  `initial_fee_two_units` decimal(12,2) DEFAULT NULL,
  `initial_fee_three_units` decimal(12,2) DEFAULT NULL,
  `referral_fee_single_unit` decimal(12,2) DEFAULT NULL,
  `referral_fee_multi_unit` decimal(12,2) DEFAULT NULL,
  `referral_fee_bonus` tinyint(1) NOT NULL DEFAULT 0,
  `referral_fee_bonus_amount` decimal(12,2) DEFAULT NULL,
  `resale_referral_fee_amount` decimal(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financials`
--

INSERT INTO `financials` (`financial_id`, `franchise_id`, `cash_required`, `net_worth_required`, `total_investment_low`, `total_investment_high`, `franchise_fee`, `royalty_fee`, `ad_fund_fee`, `average_unit_volume`, `affiliate_revenue`, `initial_fee_one_unit`, `initial_fee_two_units`, `initial_fee_three_units`, `referral_fee_single_unit`, `referral_fee_multi_unit`, `referral_fee_bonus`, `referral_fee_bonus_amount`, `resale_referral_fee_amount`, `created_at`, `updated_at`) VALUES
(3, 11, 250000.00, 500000.00, 250000.00, 750000.00, 526.36, 6.00, 2.00, 0.00, 0.00, 49500.00, 74500.00, 99500.00, 0.00, 0.00, 0, 0.00, 0.00, '2025-05-05 23:47:30', '2025-05-06 03:33:08'),
(4, 11, 234.00, 34.00, 3.00, 4.00, 4.00, 3.00, 43.00, 2.00, 23.00, 4.00, 3.00, 3.00, 4.00, 5.00, 0, 3.00, 2.00, '2025-05-06 03:34:52', '2025-05-06 03:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `franchisee_profiles`
--

CREATE TABLE `franchisee_profiles` (
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `ideal_candidate_traits` text NOT NULL,
  `training_support_description` text NOT NULL,
  `veteran_discount` tinyint(1) NOT NULL,
  `available_states` text DEFAULT NULL,
  `store_opening_support_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `franchisee_profiles`
--

INSERT INTO `franchisee_profiles` (`profile_id`, `franchise_id`, `ideal_candidate_traits`, `training_support_description`, `veteran_discount`, `available_states`, `store_opening_support_description`, `created_at`, `updated_at`) VALUES
(1, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2025-05-06 00:50:14', '2025-05-06 00:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE `franchises` (
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `franchise_name` varchar(255) NOT NULL,
  `slug_url` varchar(255) DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `industry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `founded_year` year(4) NOT NULL,
  `franchising_since` year(4) NOT NULL,
  `hq_location` varchar(255) NOT NULL,
  `ceo_name` varchar(255) NOT NULL,
  `description_long` text NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `significant_capital_expenditure_items` text DEFAULT NULL,
  `franchise_agreement_term` text DEFAULT NULL,
  `youtube_channel` varchar(255) DEFAULT NULL,
  `business_model` text DEFAULT NULL,
  `investor_executive_model` tinyint(1) NOT NULL DEFAULT 0,
  `sub_contractor_model` tinyint(1) NOT NULL DEFAULT 0,
  `keep_my_job` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`franchise_id`, `franchise_name`, `slug_url`, `logo_url`, `tagline`, `industry_id`, `founded_year`, `franchising_since`, `hq_location`, `ceo_name`, `description_long`, `website_url`, `created_at`, `updated_at`, `featured_image`, `significant_capital_expenditure_items`, `franchise_agreement_term`, `youtube_channel`, `business_model`, `investor_executive_model`, `sub_contractor_model`, `keep_my_job`) VALUES
(11, '4Ever Young Anti-Aging Solutions', '4ever-young-anti-aging-solutions', '1746514865_33d300ba56ead157efcc150533872ec6.avif', 'Building improvements, Furniture, fixtures, and equipment, Inventory, Supplies, Initial Franchise Fee, & Working capital.', 6, '2013', '2013', 'Miami, FL', 'Dr. Jane Smith', '<ul>\r\n<li><span data-slot-name=\"default\" data-align-selector=\".elBulletList li\" data-page-element=\"ContentEditableNode\"><strong>Revolutionary anti-aging treatments</strong>&nbsp;tailored to each individual\'s needs.</span></li>\r\n<li><span data-slot-name=\"default\" data-align-selector=\".elBulletList li\" data-page-element=\"ContentEditableNode\"><strong>Highly experienced and knowledgeable team</strong>&nbsp;of medical professionals.</span></li>\r\n<li><span data-slot-name=\"default\" data-align-selector=\".elBulletList li\" data-page-element=\"ContentEditableNode\"><strong>Proven track record of success</strong>&nbsp;with satisfied clients.</span></li>\r\n<li><span data-slot-name=\"default\" data-align-selector=\".elBulletList li\" data-page-element=\"ContentEditableNode\"><strong>Multiple revenue streams</strong>&nbsp;including treatments, products, and memberships.</span></li>\r\n<li><span data-slot-name=\"default\" data-align-selector=\".elBulletList li\" data-page-element=\"ContentEditableNode\"><strong>Growing demand</strong>&nbsp;for anti-aging services in the market.</span></li>\r\n</ul>', 'https://www.bizvendr.com/blog/4ever-young-anti-aging-solutions', '2025-05-05 23:01:20', '2025-05-06 06:39:18', '1746533495_84c814e75719399bab1096e23a1e2e7b.avif', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">Building improvements, Furniture, fixtures, and equipment, Inventory, Supplies, Initial Franchise Fee, &amp; Working capital.</span></p>', '<p>10 years</p>', NULL, '<p>A business that combines cutting-edge technology, innovative products, and comprehensive services to help people look and feel their best stands at the forefront of the wellness and anti-aging industry. 4Ever Young Anti-Aging Solutions offers a unique mix of aesthetic, wellness, and performance-enhancing treatments that cater to the booming demand for health and beauty services. With multiple revenue streams, a membership model that accelerates cash flow, and a proven system of training and support, franchisees are set up for success in a rapidly growing, fragmented market. As the first and only franchise to combine performance, desirability, and vitality, 4Ever Young is poised for national recognition and exponential growth.</p>', 0, 0, 0),
(12, 'ActionCoach', 'actioncoach', '1746514917_cb42d5ce39db6dc83054857ea7a0f135.avif', 'Training fee, office setup, working capital.', 2, '1993', '1997', 'North America', 'Brad Sugars', 'Imagine having the opportunity to own a proven, globally recognized business model that transforms lives and businesses while delivering exceptional ROI. ActionCOACH, the world’s largest and most awarded brand in business and executive coaching, offers a 30-year legacy of helping entrepreneurs build stronger teams, boost revenues, and create scalable, saleable assets. Rated as a top low-cost, recession-proof franchise, ActionCOACH provides franchisees with semi-exclusive territories, a robust Item 19, and the flexibility to operate during normal business hours with minimal travel. Whether active or semi-absentee, this executive-level B2B model thrives in any economy and is ideal for growth-driven leaders ready to make a difference while building a lasting, profitable enterprise.', 'https://www.bizvendr.com/blog/actioncoach', '2025-05-05 23:03:09', '2025-05-05 23:03:51', NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(13, 'Bar-B-Clean', 'bar-b-clean', '1746515046_78d5ff70fc693ee65528c972ab3f9cbd.avif', 'Vehicle, Franchise Equipment Package, Grand Opening Advertising, & Working Capital.', 7, '2012', '2014', 'Yorba Linda, California', 'Rick Hudson', 'Bar-B-Clean provides a mobile, home-based barbecue cleaning service, specializing in grill cleaning, repairs, parts, and sales, targeting residential and commercial clients, including HOAs and hotels.', 'https://www.bizvendr.com/blog/bar-b-clean', '2025-05-05 23:05:09', '2025-05-05 23:05:09', NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(14, 'Bio-One', 'bio-one', '1746515181_ad3e068ae668948e32e0746b0f4ad555.png', 'Quick Start Package, Technology, OSHA training, Business Vehicle, Working capital.', 7, '2006', '2010', 'Worldwide', 'Five Star Franchising', 'Some industries thrive in times of challenge, offering services that are always in demand—Bio-One stands at the forefront of this opportunity. As the category leader in biohazard and decontamination cleanup, Bio-One empowers franchise owners to provide critical services such as crime scene cleanup, hoarding cleanup, and mold remediation with discretion and compassion.\r\n\r\nWith low startup costs, multiple revenue streams, and recession-resilient demand, Bio-One equips franchisees with robust training and ongoing support. Backed by Five Star Franchising, this opportunity combines purpose-driven work with high margins, making it ideal for those who want to make a real difference while achieving business success.', 'https://www.bizvendr.com/blog/bio-one', '2025-05-05 23:07:19', '2025-05-05 23:07:19', NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(15, 'Bloomin’ Blinds', 'bloomin-blinds', '1746515347_2f852d731862d194a9898144759e497c.avif', 'Initial Franchise Fee, Start-Up Fee, Vehicle, Market Introduction Program, Working capital.', 7, '2001', '2014', 'Plano, Texas', 'Karen McGuffin', '<p>Some industries thrive in times of challenge, offering services that are always in demand&mdash;Bio-One stands at the forefront of this opportunity. As the category leader in biohazard and decontamination cleanup, Bio-One empowers franchise owners to provide critical services such as crime scene cleanup, hoarding cleanup, and mold remediation with discretion and compassion.<br><br>With low startup costs, multiple revenue streams, and recession-resilient demand, Bio-One equips franchisees with robust training and ongoing support. Backed by Five Star Franchising, this opportunity combines purpose-driven work with high margins, making it ideal for those who want to make a real difference while achieving business success.</p>', 'https://www.bizvendr.com/blog/bloomin-blinds', '2025-05-05 23:09:09', '2025-05-05 23:16:07', NULL, NULL, NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Automotive', 'automotive', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(2, 'Business Services', 'business-services', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(3, 'Child Development', 'child-development', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(4, 'Fitness', 'fitness', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(5, 'Food & Beverage', 'food-beverage', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(6, 'Health & Beauty', 'health-beauty', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(7, 'Home Services', 'home-services', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(8, 'Non-medical Healthcare', 'non-medical-healthcare', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(9, 'Pet Care', 'pet-care', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(10, 'Real Estate', 'real-estate', '2025-05-06 00:20:03', '2025-05-06 00:20:03'),
(11, 'Retail', 'retail', '2025-05-06 00:20:03', '2025-05-06 00:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_06_015907_create_permission_tables', 1),
(6, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2025_05_06_041658_create_franchises_table', 3),
(8, '2025_05_06_072317_create_financials_table', 4),
(9, '2025_05_06_075326_create_performance_metrics_table', 5),
(10, '2025_05_06_081847_create_industries_table', 6),
(11, '2025_05_06_081902_add_industry_id_to_franchises_table', 6),
(12, '2025_05_06_084110_create_franchisee_profiles_table', 7),
(13, '2025_05_06_085655_create_testimonials_table', 8),
(14, '2025_05_06_091801_create_resources_table', 9),
(15, '2025_05_06_110939_add_fields_to_financials_table', 10),
(16, '2025_05_06_114110_add_extra_fields_to_franchises_table', 11),
(17, '2025_05_06_123013_create_training_support_table', 12),
(18, '2025_05_06_131844_create_developer_contacts_table', 13),
(19, '2025_05_06_132247_create_developer_contacts_table', 14),
(20, '2025_05_06_135407_add_health_insurance_and_financing_to_training_support_table', 15),
(21, '2025_05_06_140311_create_operations_table', 16),
(22, '2025_05_06_143212_add_business_model_fields_to_franchises_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `immigration_friendly` tinyint(1) NOT NULL DEFAULT 0,
  `veteran_incentives` tinyint(1) NOT NULL DEFAULT 0,
  `day_in_the_life` text DEFAULT NULL,
  `territory_description` text DEFAULT NULL,
  `customer_base` text DEFAULT NULL,
  `scalability` text DEFAULT NULL,
  `owner_involvement` text DEFAULT NULL,
  `recession_strength` text DEFAULT NULL,
  `b2b_or_b2c` enum('B2B','B2C') DEFAULT NULL,
  `home_based` tinyint(1) NOT NULL DEFAULT 0,
  `business_hours` varchar(255) DEFAULT NULL,
  `competition` text DEFAULT NULL,
  `history_narrative` text DEFAULT NULL,
  `services_income_streams` text DEFAULT NULL,
  `number_type_employees` varchar(255) DEFAULT NULL,
  `real_estate_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `franchise_id`, `immigration_friendly`, `veteran_incentives`, `day_in_the_life`, `territory_description`, `customer_base`, `scalability`, `owner_involvement`, `recession_strength`, `b2b_or_b2c`, `home_based`, `business_hours`, `competition`, `history_narrative`, `services_income_streams`, `number_type_employees`, `real_estate_description`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 0, '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">For semi-absentee owners, the role includes essential small business duties like overseeing operations, managing finances, and handling back-office tasks. Full-time owners may also perform treatments on clients.</span></p>', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">Territory defined after location identified and approved. Minimum population of 100,000. Specified in writing in franchise agreement.</span></p>', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">Men and women of all ages looking for personalized anti-aging solutions.</span></p>', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">Very scalable. Multi-unit owners can easily spread shared services and staffing from location to location.</span></p>', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">Owner must give full attention to the business in ramping up the business for the first 12 to 24 months.</span></p>', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">High. The demand for anti-aging services remains consistent even during economic downturns.</span></p>', 'B2B', 1, 'Monday-Friday: 9am-7pm, Saturday: 10am-5pm, Closed on Sundays', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">Other medical spas and anti-aging clinics may be competitors, but 4Ever Young has a unique approach and high customer satisfaction.</span></p>', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">4Ever Young Anti-Aging Solutions was founded in 2013 by a team of medical professionals who saw the need for personalized anti-aging solutions. The company\'s CEO, Dr. Jane Smith, has over 20 years of experience in the industry and continues to lead the company\'s growth. With a focus on natural and effective treatments, 4Ever Young has become a leader in the anti-aging market.</span></p>', '<p data-style-guide-subheadline=\"m\"><span data-slot-name=\"default\" data-align-selector=\".elSubheadline\" data-page-element=\"ContentEditableNode\">Anti-aging treatments and products, memberships, and add-on services such as IV therapy and hormone replacement therapy.</span></p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2025-05-06 06:18:28', '2025-05-06 06:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_metrics`
--

CREATE TABLE `performance_metrics` (
  `metric_id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `number_of_units` int(11) NOT NULL,
  `new_units_opened_last_year` int(11) NOT NULL,
  `growth_score` decimal(5,2) DEFAULT NULL,
  `turnover_score` decimal(5,2) DEFAULT NULL,
  `unit_trend_chart_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_metrics`
--

INSERT INTO `performance_metrics` (`metric_id`, `franchise_id`, `number_of_units`, `new_units_opened_last_year`, `growth_score`, `turnover_score`, `unit_trend_chart_data`, `created_at`, `updated_at`) VALUES
(1, 14, 45, 14, 26.45, 45.14, '<p>\"employees\":[<br>&nbsp;&nbsp;{\"firstName\":\"John\",&nbsp;\"lastName\":\"Doe\"},<br>&nbsp;&nbsp;{\"firstName\":\"Anna\",&nbsp;\"lastName\":\"Smith\"},<br>&nbsp;&nbsp;{\"firstName\":\"Peter\",&nbsp;\"lastName\":\"Jones\"}<br>]</p>', '2025-05-06 00:07:50', '2025-05-06 01:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20'),
(2, 'edit-role', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20'),
(3, 'delete-role', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20'),
(4, 'create-user', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20'),
(5, 'edit-user', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20'),
(6, 'delete-user', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `fdd_pdf_url` varchar(255) DEFAULT NULL,
  `franchise_comparisons` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `franchise_id`, `fdd_pdf_url`, `franchise_comparisons`, `created_at`, `updated_at`) VALUES
(1, 14, '1746523777_blank.pdf', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>\r\n<h3>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', '2025-05-06 01:29:37', '2025-05-06 01:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20'),
(2, 'Admin', 'web', '2025-05-05 18:13:20', '2025-05-05 18:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `quote` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `franchise_id`, `author_name`, `location`, `quote`, `created_at`, `updated_at`) VALUES
(1, 12, 'Rick Hudson', 'Suite 260, Irvine, CA 92618', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>\r\n<h3>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', '2025-05-06 01:09:34', '2025-05-06 01:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `training_support`
--

CREATE TABLE `training_support` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `training_support` text DEFAULT NULL,
  `technology_tools` text DEFAULT NULL,
  `lease_negotiation_assistance` tinyint(1) NOT NULL DEFAULT 0,
  `staff_recruiting_assistance` tinyint(1) NOT NULL DEFAULT 0,
  `digital_marketing_assistance` tinyint(1) NOT NULL DEFAULT 0,
  `call_center_assistance` tinyint(1) NOT NULL DEFAULT 0,
  `site_selection_assistance` tinyint(1) NOT NULL DEFAULT 0,
  `health_insurance_programs` tinyint(1) NOT NULL DEFAULT 0,
  `financing_provided` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_support`
--

INSERT INTO `training_support` (`id`, `franchise_id`, `training_support`, `technology_tools`, `lease_negotiation_assistance`, `staff_recruiting_assistance`, `digital_marketing_assistance`, `call_center_assistance`, `site_selection_assistance`, `health_insurance_programs`, `financing_provided`, `created_at`, `updated_at`) VALUES
(1, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 0, 1, 0, 1, 0, 0, 0, '2025-05-06 04:42:01', '2025-05-06 05:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Dela Cruz', 'john@laravel.com', NULL, '$2y$10$TFBVuWO4KKhbllipY5oMa.uN7uWgvlxfUkFpejBQyyzPlD5NYIpfa', NULL, '2025-05-05 18:13:20', '2025-05-05 18:13:20'),
(2, 'Peter Mariano', 'peter@laravel.com', NULL, '$2y$10$AD.dVC4sA9Zr1wDDYzjtCOgINeIkM8aUTZwZV03py76eHA6yZ/iqW', NULL, '2025-05-05 18:13:20', '2025-05-05 18:13:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer_contacts`
--
ALTER TABLE `developer_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `developer_contacts_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `financials`
--
ALTER TABLE `financials`
  ADD PRIMARY KEY (`financial_id`),
  ADD KEY `financials_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `franchisee_profiles`
--
ALTER TABLE `franchisee_profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `franchisee_profiles_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`franchise_id`),
  ADD KEY `franchises_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industries_name_unique` (`name`),
  ADD UNIQUE KEY `industries_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operations_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  ADD PRIMARY KEY (`metric_id`),
  ADD KEY `performance_metrics_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `resources_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `testimonials_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `training_support`
--
ALTER TABLE `training_support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_support_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developer_contacts`
--
ALTER TABLE `developer_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financials`
--
ALTER TABLE `financials`
  MODIFY `financial_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `franchisee_profiles`
--
ALTER TABLE `franchisee_profiles`
  MODIFY `profile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `franchises`
--
ALTER TABLE `franchises`
  MODIFY `franchise_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  MODIFY `metric_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_support`
--
ALTER TABLE `training_support`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `developer_contacts`
--
ALTER TABLE `developer_contacts`
  ADD CONSTRAINT `developer_contacts_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;

--
-- Constraints for table `financials`
--
ALTER TABLE `financials`
  ADD CONSTRAINT `financials_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;

--
-- Constraints for table `franchisee_profiles`
--
ALTER TABLE `franchisee_profiles`
  ADD CONSTRAINT `franchisee_profiles_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;

--
-- Constraints for table `franchises`
--
ALTER TABLE `franchises`
  ADD CONSTRAINT `franchises_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `operations_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;

--
-- Constraints for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  ADD CONSTRAINT `performance_metrics_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;

--
-- Constraints for table `training_support`
--
ALTER TABLE `training_support`
  ADD CONSTRAINT `training_support_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`franchise_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
