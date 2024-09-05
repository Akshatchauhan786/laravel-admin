-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2024 at 11:35 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmsdemoc_budzet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super admin kjijrijg', 'admin@gmail.com', '$2y$12$eXSBpGTyYW6OFvxxc9WN0eiVdwBaJnT3gmxa9FuS1OAVgEcodR/Ei', '240220125244download.jpg', NULL, NULL, '2024-06-26 06:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `published_date` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `category`, `author`, `published_date`, `content`, `status`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, '5 Must-Know Tips to Invest in Gold for Millennials and Gen Z', '5-Must-Know-Tips-to-Invest-in-Gold-for-Millennials-and-Gen Z', '/media/1719298274_6660540b23fb5.jpeg', 'Tech', 'Budget', '2024-06-23', '<p>Gold has been a classic investment for centuries, but it&#39;s gaining renewed popularity with younger investors looking to diversify and protect their money. If you&#39;re a millennial or Gen-Zer considering adding some golden bling to your portfolio, here are five key things to know before taking the plunge.</p>\r\n\r\n<p><b>Understand Why You Want to Invest</b></p>\r\n\r\n<p>Before buying gold, get clear on your investing goals. Are you looking to hedge against inflation? Diversify from stocks and crypto? Have a tangible asset? Knowing your &quot;why&quot; will help determine how much to invest and what types of gold products fit best.</p>\r\n\r\n<p><b>Don&#39;t Put All Your Golden Eggs in One Basket</b></p>\r\n\r\n<p>While gold can be a great stabilizing force, it shouldn&#39;t be the only thing in your portfolio. Smart investors split their money across a variety of assets like stocks, bonds, real estate, and cash. Having a diversified mix reduces your overall risk.</p>\r\n\r\n<p><b>Choose Your Gold Flavor</b></p>\r\n\r\n<p>When it comes to investing in gold, you&#39;ve got options. Physical gold like coins and bars lets you get your hands on the goods. Or you can go the indirect &quot;paper&quot; route through gold stocks, ETFs, or mutual funds. Physical gold is more secure but requires storage. Paper gold is liquid but exposes you to broader market risks.</p>\r\n\r\n<p><b>Buy Wise by Timing the Market</b></p>\r\n\r\n<p>The price of gold can fluctuate based on economic conditions, holidays, and &lsquo;supply and demand&rsquo;. Do your research to find advantageous times for buying. During stock market slides or periods of uncertainty, gold prices often rise as investors flock to the safe haven asset.</p>\r\n\r\n<p><b>Mind the Fees and Risks</b></p>\r\n\r\n<p>Like any investment, gold carries costs and risks to be aware of. With physical gold, you may face premiums, storage fees, and insurance costs. Paper investments charge management fees. And while gold is traditionally a &quot;safe&quot; asset, prices can still drop unexpectedly due to market forces. Know what you&#39;re getting into.</p>\r\n\r\n<p>At the end of the day, gold can be a great way for young investors to diversify and protect their hard-earned money. Just make sure to have a strategy, do your homework, and invest wisely. An ounce of preparation is worth a ton of gold!</p>', 1, '2024-06-23 16:19:42', '2024-07-08 16:00:53', NULL, NULL, NULL),
(2, 'How to Buy Your First Home in 2024: A 2-Minute Guide', 'How-to-Buy-Your-First-Home-in-2024:-A-2-Minute-Guide', '/media/1719298713_664ed69a29858.jpeg', 'Lifestyle', 'Jane Smith', '2024-06-23', '<p>Listen up, future homeowners! Buying your first place is an adventure, but we&#39;ve got the tips to make your dream home a reality. Picture this: lounging in your cozy new home, basking in homeownership bliss. Ready to make it happen?</p>\r\n\r\n<p><strong>Step 1: Know the current real estate market trends.</strong></p>\r\n\r\n<p>Keep an eye on the mortgage rates and housing market in the area where you want to buy your new home. The National Association of Realtors predicts mortgage rates could hit the mid-to-low 6% range in 2024, but the extent may vary across markets.</p>\r\n\r\n<p><strong>Step 2: Define Your Home Search Criteria.</strong></p>\r\n\r\n<p>What&#39;s your dream home? Cozy cottage or urban pad? List your desired features and neighborhood, then scour Zillow, Trulia, and the like to find matches in your budget.</p>\r\n\r\n<p><strong>Step 3: Get Those Finances in Order.</strong></p>\r\n\r\n<p>Home-buying is a major financial commitment. Check that credit score (620+ for most loans), assess income, debts, and savings. Lenders want to see you&#39;re payment-ready.</p>\r\n\r\n<p><strong>Step 4: Get a Preapproval Letter.</strong></p>\r\n\r\n<p>Get preapproved by providing lenders - it shows sellers you&#39;re a serious, golden-ticketed buyer.</p>\r\n\r\n<p><strong>Step 5: Get a Trusted Local Real Estate Agent.</strong></p>\r\n\r\n<p>Interview local real estate agents to find a partner who can guide you with local market insights and find homes that match your preferences.</p>\r\n\r\n<p><strong>Step 6: Don&rsquo;t Feel Shy to Negotiate.</strong></p>\r\n\r\n<p>With your agent&#39;s help, obtain a savvy offer based on recent local sales. With current market conditions, homebuyers may have bargaining power now, so negotiate skilfully.</p>\r\n\r\n<p><strong>Step 7: Commit with Earnest Money</strong></p>\r\n\r\n<p>If your offer&#39;s accepted, put down earnest money (typically 1-5% of the price) to show you&#39;re serious.</p>\r\n\r\n<p><strong>Step 8: Schedule Home Inspection</strong></p>\r\n\r\n<p>Schedule a home inspection to assess your future home&#39;s condition and negotiate any needed repairs. No surprises wanted!</p>\r\n\r\n<p><strong>Step 9: Secure That Mortgage Masterfully</strong></p>\r\n\r\n<p>Submit your application ASAP, compare lenders for the best rates and terms, and get that all-important appraisal done.</p>\r\n\r\n<p><strong>Step 10: Final Walk &amp; Closing Celebrations!</strong></p>\r\n\r\n<p>Do a final walk-through and then close the deal by signing the ownership transfer. Get the Keys to your new home!</p>\r\n\r\n<p>With prep and pro guidance, you&#39;ll be a homeowner soon. Happy house hunting!</p>', 1, '2024-06-23 16:19:42', '2024-06-25 01:28:33', NULL, NULL, NULL),
(5, 'Financial Wellness Quiz: Check Your Financial Health', 'Financial-Wellness-Quiz:-Check-Your-Financial-Health', '/images/1719205190.jpg', 'Secret', 'akshat', '2024-06-24', '<p>Things to Know Before Starting the Financial Wellness Quiz:</p>\r\n\r\n<p>&middot;&nbsp;Answer each question honestly based on your current financial situation and habits.</p>\r\n\r\n<p>&middot;&nbsp; Select the option that best reflects your circumstances from the provided choices.</p>\r\n\r\n<p>&middot;&nbsp; After answering all questions, add up the scores associated with your chosen options.</p>\r\n\r\n<p>&middot;&nbsp; Once you have your total score, compare it to the scoring guide provided below to determine your financial wellness level.</p>\r\n\r\n<p>&middot;&nbsp; Financially stable individuals typically score higher, while those needing to take care of their financial health may score lower.</p>\r\n\r\n<p>&middot;&nbsp; Use the quiz results to identify areas for improvement and consider seeking further guidance or support if needed to enhance your financial well-being.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>1. How do you feel about your current level of savings?</h3>\r\n\r\n<p>a) I have significant savings for emergencies and future goals <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) I have some savings, but I could save more<strong> (Score: 4)</strong></p>\r\n\r\n<p>c) I struggle to save regularly <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) I have no savings at all <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>2. How do you manage your monthly expenses?</h3>\r\n\r\n<p>a) I budget and track my expenses carefully <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) I try to budget but sometimes overspend <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) I don&#39;t budget and often overspend <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) I struggle to cover my basic expenses <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>3. How would you rate your debt level?</h3>\r\n\r\n<p>a) I have no debt or very manageable debt <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) I have some debt, but it&#39;s under control <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) I have significant debt that I&#39;m working to pay off <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) I&#39;m overwhelmed by debt and struggle to make payments <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>4. How prepared are you for retirement?</h3>\r\n\r\n<p>a) I have a solid retirement plan and regularly contribute to it <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) I have a retirement plan but need to increase contributions <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) I haven&#39;t started planning for retirement yet <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) I&#39;m worried about retirement and don&#39;t have a plan <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>5. How do you handle unexpected expenses?</h3>\r\n\r\n<p>a) I have an emergency fund to cover unexpected expenses <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) I use savings or credit cards for unexpected expenses <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) I struggle to cover unexpected expenses and often rely on loans or borrowing <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) I can&#39;t afford unexpected expenses and go into debt to cover them <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>6. How often do you review your financial goals?</h3>\r\n\r\n<p>a) Regularly - at least once a year <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) Occasionally - every few years <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) Rarely - only when something major changes<strong> (Score: 3)</strong></p>\r\n\r\n<p>d) Never - I don&#39;t have financial goals <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>7. How confident are you in your financial knowledge?</h3>\r\n\r\n<p>a) Very confident - I understand various financial concepts and strategies <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) Somewhat confident - I have a basic understanding but could learn more <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) Not very confident - I struggle to understand financial matters <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) Not confident at all - I find financial topics overwhelming <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>8. How do you handle financial setbacks or failures?</h3>\r\n\r\n<p>a) I learn from them and adjust my financial strategy <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) I try to bounce back but sometimes feel discouraged <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) I struggle to recover from setbacks and often feel overwhelmed <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) I feel defeated and give up on improving my financial situation <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>9. How often do you seek professional financial advice?</h3>\r\n\r\n<p>a) Regularly - I have a financial advisor and consult them as needed <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) Occasionally - I seek advice when facing major financial decisions <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) Rarely - I prefer to handle my finances independently <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) Never - I don&#39;t see the need for professional financial advice <strong>(Score: 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>10. How satisfied are you with your current financial situation?</h3>\r\n\r\n<p>a) Very satisfied - I feel financially secure and content <strong>(Score: 5)</strong></p>\r\n\r\n<p>b) Somewhat satisfied - I&#39;m doing okay but have room for improvement <strong>(Score: 4)</strong></p>\r\n\r\n<p>c) Not very satisfied - I&#39;m struggling to meet my financial goals <strong>(Score: 3)</strong></p>\r\n\r\n<p>d) Not satisfied at all - I feel overwhelmed and hopeless about my finances <strong>(Score: 1)</strong></p>\r\n\r\n<h2>Scoring:</h2>\r\n\r\n<p><strong>Now, total your scores from each question to determine your financial wellness level.</strong></p>\r\n\r\n<h3>40-50 points: Financially Stable</h3>\r\n\r\n<p>You have very healthy financial habits and are well prepared for the future. Keep up the great work!</p>\r\n\r\n<h3>Below 40: Need to Take Care of Financial Health</h3>\r\n\r\n<p>There are some areas where your finances could use some improvement. Review your weakest areas and make an action plan.</p>', 1, '2024-06-23 23:29:50', '2024-06-26 06:10:27', 'meta title', 'meta description', 'Meta Keywords');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_verify` int(11) NOT NULL DEFAULT '0',
  `is_forgot_password` int(11) NOT NULL DEFAULT '0',
  `rand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `zip`, `company`, `gstin`, `status`, `is_verify`, `is_forgot_password`, `rand_id`, `created_at`, `updated_at`) VALUES
(1, 'vinod', 'vkv4052@gmail.com', '1234567890', 'eyJpdiI6Iks2MTRrVXc1M0RKYmZ6SFp1OGhnVVE9PSIsInZhbHVlIjoiUXJVK2x0WldoUTFKREVwY3BNNE04UT09IiwibWFjIjoiODg1OGVkODdlOTFiNzE3YzI0NDYwZTNkZmQzZWZlZGMzN2E2NWFlM2IwYjUyNmFlOWI0MTQ0YmMwYzBhNDM4NiIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '', '2024-04-08 04:07:13', '2024-04-08 04:07:13'),
(2, 'vinod', 'vinod.mediasearchgroup@gmail.com', '1234567890', 'eyJpdiI6ImJibVZ3Z3ZWQ2VWdnE5RjYxOTEyc1E9PSIsInZhbHVlIjoiU0RqRVUrWDZETDZ6V2c4UWxxYTA4QT09IiwibWFjIjoiMTY3YzA0ZTg3YTU2NGJjMDg2ZWVkZDk5Y2M1NzEwYmY5MWMzYmM5ZjJmMjBmMjEzZTU0MTgyMGU0NWU0YzNkNCIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '639708014', '2024-04-08 00:36:11', '2024-04-08 00:36:11');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_16_174530_create_courses_table', 2),
(6, '2023_02_16_174645_create_years_table', 2),
(7, '2023_02_17_051208_create_students_table', 3),
(8, '2023_03_15_052716_create_fees_table', 3),
(9, '2023_03_17_153739_create_flights_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vkv4052@gmail.com', 'dXnrzWqcQehxyr3QbAFbEKrTVR0SnVuRQzhHezM9', '2024-02-04 11:52:30'),
('vkv4052@gmail.com', 'st6g0UItBsTJ227LeXFTwyFgELZnKNqb8u7kHCEn', '2024-02-04 11:58:56'),
('vkv4052@gmail.com', 'iL2UKd33Td67LYDbOprb7BcUNpSj28GGM0JeP0iq', '2024-02-04 12:00:29'),
('vkv4052@gmail.com', 'nYjgXXSs9mUPHJ7fIWcxMO9IjjvbtqWCYExHgpZU', '2024-02-04 12:00:35'),
('vkv4052@gmail.com', 'PpuIZlg1x3xa3ceQNiKlia4kwfK6MiqziIRPxIi8', '2024-02-04 12:01:00'),
('vkv4052@gmail.com', 'wlY9Tn5G9BdOGw3arWhdcdHLMApJymalyzE5bmk3', '2024-02-04 12:02:24'),
('vkv4052@gmail.com', 'H03SYDq8d7SY9sq18Fwiyd4KlHqxcHKeslMGBhFW', '2024-02-04 12:22:40'),
('vkv4052@gmail.com', '9FKwRA8oMfM3tdJxaSGpKhJJmCc1N7O72tMmtcG9', '2024-02-04 12:23:32'),
('vkv4052@gmail.com', 'jkzbBxcNNYLdWBWo5azDnjRbkPSvncvnhawqtXUE', '2024-02-04 12:24:18'),
('vkv4052@gmail.com', 'oQ2XvGNPSoKTRaewOhR07PsiLLnftBPlsAZongz2', '2024-02-04 12:31:27'),
('vkv4052@gmail.com', 'Xz4uH3CjjtJ5Ywaxi3ujSeUrtUc4VncaZdyNjXyf', '2024-02-04 12:37:24'),
('vkv4052@gmail.com', '3naFYht3h2Eu7BcRFELCFIJUss3HqLkj77Q0Z3Jp', '2024-02-04 12:38:41'),
('vkv4052@gmail.com', '09kEcaYvyjG0yHOeTKdmN6issQ9w2UyQdpFUIiri', '2024-02-04 12:39:50'),
('vkv4052@gmail.com', '3kI3cNytpa6wkqjVdIbc1lebbpDTMMPGZrCG04Zn', '2024-02-06 10:27:20'),
('vkv4052@gmail.com', 'p6bZPGqND3U3yoXGjJZCXRgsLsn3spvcdBeJKqkt', '2024-02-17 12:56:42');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `your_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `company_phone_number` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_office_hours` varchar(255) DEFAULT NULL,
  `contact_phone_numbers` varchar(255) DEFAULT NULL,
  `service` text,
  `company_name` varchar(255) DEFAULT NULL,
  `type_of_registration` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `owners_name` text,
  `percentage_of_ownership` text,
  `address` text,
  `phone_number` varchar(255) DEFAULT NULL,
  `file_ein` text,
  `healthcare_business_types` varchar(255) DEFAULT NULL,
  `explain_the_services` varchar(255) DEFAULT NULL,
  `counties_where` varchar(255) DEFAULT NULL,
  `company_mission_vision_and_goals` text,
  `name_of_the_director` text,
  `upload_company_logo` text,
  `completion_and_submission` text,
  `completion_of_accreditation` text,
  `mock_survey` text,
  `office_address` text,
  `office_phone` varchar(255) DEFAULT NULL,
  `office_fax_number` varchar(255) DEFAULT NULL,
  `corporate_address` text,
  `corporate_phone` varchar(255) DEFAULT NULL,
  `corporate_fax_number` varchar(255) DEFAULT NULL,
  `business_corporation_name` varchar(255) DEFAULT NULL,
  `type_of_business` varchar(255) DEFAULT NULL,
  `doing_business_as_name` varchar(255) DEFAULT NULL,
  `organizational_npi` varchar(255) DEFAULT NULL,
  `business_license` text,
  `w_9` text,
  `irs_business` text,
  `business_insurance` text,
  `disclosure_of_ownership` text,
  `managing_partners` text,
  `state_licensures` text,
  `clia_licensures` text,
  `facility_roster` text,
  `any_specialized` text,
  `nppes_login` text,
  `pecos_login` text,
  `caqh_login` text,
  `medicaid_number` text,
  `website_address` text,
  `hosting_provider` text,
  `hosting_login` text,
  `preferred_colors` text,
  `do_you_need_a_logo_design` text,
  `upload_logo` text,
  `uploade_file` text,
  `consulting` text,
  `other` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `your_name`, `phone`, `c_name`, `company_phone_number`, `company_email`, `company_address`, `company_office_hours`, `contact_phone_numbers`, `service`, `company_name`, `type_of_registration`, `state`, `owners_name`, `percentage_of_ownership`, `address`, `phone_number`, `file_ein`, `healthcare_business_types`, `explain_the_services`, `counties_where`, `company_mission_vision_and_goals`, `name_of_the_director`, `upload_company_logo`, `completion_and_submission`, `completion_of_accreditation`, `mock_survey`, `office_address`, `office_phone`, `office_fax_number`, `corporate_address`, `corporate_phone`, `corporate_fax_number`, `business_corporation_name`, `type_of_business`, `doing_business_as_name`, `organizational_npi`, `business_license`, `w_9`, `irs_business`, `business_insurance`, `disclosure_of_ownership`, `managing_partners`, `state_licensures`, `clia_licensures`, `facility_roster`, `any_specialized`, `nppes_login`, `pecos_login`, `caqh_login`, `medicaid_number`, `website_address`, `hosting_provider`, `hosting_login`, `preferred_colors`, `do_you_need_a_logo_design`, `upload_logo`, `uploade_file`, `consulting`, `other`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, 'YJRGJO', '7390865055', 'sdkvk', 'sdnvjfni111', 'vkv40523@gmail.com', 'sdnvjfni', 'jenrgi', 'ksngkrgi', 'Business Registration/FEIN/Foreign Corporation Filing', 'abc', 'Limited liability company (LLC)', 'Indiana', '<p>regtrth</p>', '<p>yj</p>', '<p>rhyj</p>', '1234567890', '766306029.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-02-17 13:56:18', '2024-02-17 13:56:18'),
(5, 3, 'YJRGJOfgj', '7390865055', 'sdkvkty', 'sdnvjfnirhtj', 'vkv40523@gmail.com', 'sdnvjfni', 'jenrgirhtrj', 'ksngkrgihty', 'Health care business Licensing', NULL, NULL, 'Indiana', NULL, NULL, NULL, NULL, NULL, '[\"Assisted Living\",\"Continued Care Retirement Communities\",\"Durable and Home Medical Equipment companies\",\"Sleep Lab Clinics\"]', '<p>trhtyjuopfbgnrhrtj</p>', '<p>yjtykyukp90prehtrj</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-02-18 05:10:42', '2024-02-18 05:10:42'),
(6, 3, 'vinod', '7390865055', 'sdkvk', '7390865005', 'vkv4052@gmail.com', 'Delhi', '4', '6', 'Policies and Procedures', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Adult Day Care\",\"Continued Care Retirement Communities\",\"Durable and Home Medical Equipment companies\",\"Medical Courier Service Business\"]', NULL, NULL, '<p>zxfgm</p>', '<p>dgmgfmh</p>', '881845307.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-02-18 05:11:48', '2024-02-18 05:11:48'),
(7, 3, 'Vinod', '7390865055', 'Abc', '7390865005', 'vkv40523@gmail.com', 'sdnvjfni', 'jenrgi', 'ksngkrgi', 'Credentialing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Testing', '7390865005', '7390865005', 'Testing', '7390865005', '7390865005', 'Testing1', 'Testing', 'Testing1', 'Testing1', '573263124.jpg', '574695290.jpg', '586544815.jpg', '608943793.jpg', '921903404.jpg', '642580737.jpg', '932087168.jpg', '426264752.jpg', '854373171.jpg', '156521631.jpg', '<p>jklui;io;oi;</p>', '<p>djveufguwey7</p>', '<p>fhuehufewuyg8rey8ty8</p>', '<p>ieureu88reiug</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-02-18 05:14:20', '2024-02-18 05:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Vinod Kumar Vishwakarma', 'vkv4052@gmail.com', NULL, '$2y$10$1.dnfSAWRvx8qzFtOhQsH.Fm6PGFi4c0wG1J3LtuK4uosxR1StwKO', NULL, '2402176143857ea09df-f72a-40cb-a50d-8d710a4626a6.jpg', 1, '2024-02-17 12:37:25', '2024-02-17 12:52:57'),
(4, 'Martion', 'vkv40523@gmail.com', NULL, '$2y$10$1f7ua/wbnhlbaDciR8ecG.rdUlpKZgKwBD4xSe27AhZu1o4EWnSHK', NULL, NULL, 1, '2024-02-17 12:53:36', '2024-02-17 12:56:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
