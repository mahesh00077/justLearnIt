-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 10:18 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `just_learn_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:inactive 1:active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `overview`, `duration`, `price`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(3, 'PHP', '<p>Contents</p>\r\n\r\n<p>1 Data Science Training Overview</p>\r\n\r\n<p>1.1 Objectives of the Course</p>\r\n\r\n<p>1.2 Pre-Requites of the Course</p>\r\n\r\n<p>1.3 Course Duration</p>\r\n\r\n<p>2 Data Science Course Content</p>\r\n\r\n<p>2.1 Introduction to Data Science</p>\r\n\r\n<p>2.2 Data</p>\r\n\r\n<p>2.3 Big Data</p>\r\n\r\n<p>2.4 Data Science Deep Dive</p>', '20days', '1500', '1', '1', '2021-01-11 05:54:57', '2021-01-12 02:19:36'),
(4, 'Java', '<p>Contents</p>\r\n\r\n<p>1 Core Java Training Overview</p>\r\n\r\n<p>1.1 Core Java Training Prerequisites</p>\r\n\r\n<p>1.2 Core Java Course Duration</p>\r\n\r\n<p>2 Core Java Training Content Overview</p>\r\n\r\n<p>2.1 Java Language, OOPS, Programming</p>\r\n\r\n<p>2.2 Java API and Project</p>\r\n\r\n<p>2.3 Share this:</p>', '30days', '3000', '1', '1', '2021-01-11 05:55:11', '2021-01-12 02:19:01'),
(5, 'Data Science', '<p>Contents</p>\r\n\r\n<p>1 Data Science Training Overview</p>\r\n\r\n<p>1.1 Objectives of the Course</p>\r\n\r\n<p>1.2 Pre-Requites of the Course</p>\r\n\r\n<p>1.3 Course Duration</p>\r\n\r\n<p>2 Data Science Course Content</p>\r\n\r\n<p>2.1 Introduction to Data Science</p>\r\n\r\n<p>2.2 Data</p>\r\n\r\n<p>2.3 Big Data</p>\r\n\r\n<p>2.4 Data Science Deep Dive</p>\r\n\r\n<p>2.5 Intro to R Programming</p>\r\n\r\n<p>2.6 R Programming Concepts</p>\r\n\r\n<p>2.7 Data Manipulation in R</p>\r\n\r\n<p>2.8 Data Import Techniques in R</p>\r\n\r\n<p>2.9 Exploratory Data Analysis (EDA) using R 2.10 Data Visualization in R</p>\r\n\r\n<p>2.11 HADOOP</p>\r\n\r\n<p>2.11.1 Big Data and Hadoop Introduction</p>\r\n\r\n<p>2.11.2 Understand Hadoop Cluster Architecture 2.11.3 Map Reduce Concepts</p>\r\n\r\n<p>2.11.4 Advanced Map Reduce Concepts</p>\r\n\r\n<p>2.12 Hadoop 2.0 and YARN</p>\r\n\r\n<p>2.13 PIG 2.14 HIVE</p>\r\n\r\n<p>2.14.1 Module-9 2.15 HBASE</p>\r\n\r\n<p>2.15.1 Module-11 2.16 SQOOP</p>\r\n\r\n<p>2.17 Flume and Oozie</p>\r\n\r\n<p>2.18 Projects</p>\r\n\r\n<p>2.19 Project in Healthcare Domain</p>\r\n\r\n<p>2.20 Project in Finance/Banking Domain</p>\r\n\r\n<p>2.21 Spark 2.21.1 Apache Spark</p>\r\n\r\n<p>2.21.2 Introduction to Scala</p>\r\n\r\n<p>2.21.3 Spark Core Architecture</p>\r\n\r\n<p>2.21.4 Spark Internals</p>\r\n\r\n<p>2.21.5 Spark Streaming 2.22 Statistics + Machine Learning 2.22.1 Statistics 2.22.1.1 What is Statistics? 2.23 Machine Learning 2.23.1 Machine Learning Introduction 2.24 Python 2.24.1 Getting Started with Python 2.24.2 Sequences and File Operations 2.25 Deep Dive &ndash; Functions Sorting Errors and Exception Handling 2.26 Regular Expressionist&rsquo;s Packages and Object &ndash; Oriented Programming in Python 2.27 Debugging, Databases and Project Skeletons 2.28 Machine Learning Using Python 2.29 Supervised and Unsupervised learning 2.30 Algorithm 2.31 Application Example 2.32 Scikit and Introduction to Hadoop 2.33 Hadoop and Python 2.34 Python Project Work 2.35 Share this:</p>', '60 days', '4000', '1', '1', '2021-01-11 06:01:58', '2021-01-12 02:18:24'),
(6, 'python', '<p>Contents&nbsp;</p>\r\n\r\n<p>1&nbsp;Python Training Overview</p>\r\n\r\n<ul>\r\n	<li>1.1&nbsp;What are the Python Course Pre-requisites</li>\r\n	<li>1.2&nbsp;Objectives of the Course</li>\r\n	<li>1.3&nbsp;Who should do the course</li>\r\n	<li>1.4&nbsp;Python Training Course Duration</li>\r\n</ul>\r\n\r\n<p>2&nbsp;Python Course Content</p>\r\n\r\n<ul>\r\n	<li>2.1&nbsp;Core Python\r\n	<ul>\r\n		<li>2.1.1&nbsp;Introduction to Languages</li>\r\n		<li>2.1.2&nbsp;Introduction to Python</li>\r\n		<li>2.1.3&nbsp;Python Software&rsquo;s</li>\r\n		<li>2.1.4&nbsp;Python Language Fundamentals</li>\r\n		<li>2.1.5&nbsp;Different Modes of Python</li>\r\n		<li>2.1.6&nbsp;Python Variables</li>\r\n		<li>2.1.7&nbsp;Operators</li>\r\n		<li>2.1.8&nbsp;Input &amp; Output Operators</li>\r\n		<li>2.1.9&nbsp;Data Structures or Collections</li>\r\n		<li>2.1.10&nbsp;List Collection</li>\r\n		<li>2.1.11&nbsp;Tuple Collection</li>\r\n		<li>2.1.12&nbsp;Set Collection</li>\r\n		<li>2.1.13&nbsp;Dictionary Collection</li>\r\n		<li>2.1.14&nbsp;Functions</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.2&nbsp;Advanced Python\r\n	<ul>\r\n		<li>2.2.1&nbsp;Python Modules</li>\r\n		<li>2.2.2&nbsp;Packages</li>\r\n		<li>2.2.3&nbsp;OOPs</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.3&nbsp;PANDAS</li>\r\n	<li>2.4&nbsp;NUMPY</li>\r\n	<li>2.5&nbsp;Share this</li>\r\n</ul>', '60 days', '5000', '1', '1', '2021-01-12 08:30:00', '2021-01-16 00:25:09'),
(7, 'C Language', '<p>Contents&nbsp;</p>\r\n\r\n<ul>\r\n	<li>1&nbsp;About C-Language Training</li>\r\n	<li>2&nbsp;C Training Course Objective</li>\r\n	<li>3&nbsp;Why This Course is Required</li>\r\n	<li>4&nbsp;C &nbsp;Training Course Overview\r\n	<ul>\r\n		<li>4.1&nbsp;Fundamentals in C</li>\r\n		<li>4.2&nbsp;Operators and Expressions</li>\r\n		<li>4.3&nbsp;Input-Output Functions</li>\r\n		<li>4.4&nbsp;Control Statements</li>\r\n		<li>4.5&nbsp;Arrays</li>\r\n		<li>4.6&nbsp;Strings</li>\r\n		<li>4.7&nbsp;Pointers</li>\r\n		<li>4.8&nbsp;Functions</li>\r\n		<li>4.9&nbsp;Storage Classes</li>\r\n		<li>4.10&nbsp;Preprocessor Directives</li>\r\n		<li>4.11&nbsp;Structures, Unions, Enumerations and Typedef</li>\r\n		<li>4.12&nbsp;Command Line Arguments</li>\r\n		<li>4.13&nbsp;Files</li>\r\n		<li>4.14&nbsp;Graphics</li>\r\n		<li>4.15&nbsp;Share this</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '20days', '1000', '1', '1', '2021-01-13 01:56:09', '2021-01-16 00:23:17'),
(8, 'Hadoop', '<p>Contents</p>\r\n\r\n<p>1&nbsp;Hadoop Course Overview</p>\r\n\r\n<p>2&nbsp;Hadoop&nbsp;Training Course Prerequisites</p>\r\n\r\n<p>3&nbsp;Hadoop Course System Requirements</p>\r\n\r\n<p>4&nbsp;Hadoop Training Course Duration</p>\r\n\r\n<p>5&nbsp;Hadoop Course Content</p>\r\n\r\n<ul>\r\n	<li>5.1&nbsp;Introduction to Hadoop</li>\r\n	<li>5.2&nbsp;Introduction to Big Data</li>\r\n	<li>5.3&nbsp;Introduction to Hadoop</li>\r\n	<li>5.4&nbsp;Hadoop Distributed File System (HDFS)</li>\r\n	<li>5.5&nbsp;Map Reduce</li>\r\n	<li>5.6&nbsp;Map Reduce Programming &ndash; Java Programming</li>\r\n	<li>5.7&nbsp;NOSQL</li>\r\n	<li>5.8&nbsp;HBase</li>\r\n	<li>5.9&nbsp;Hive</li>\r\n	<li>5.10&nbsp;Pig</li>\r\n	<li>5.11&nbsp;SQOOP</li>\r\n	<li>5.12&nbsp;HCatalog</li>\r\n	<li>5.13&nbsp;Flume</li>\r\n	<li>5.14&nbsp;More Ecosystems</li>\r\n	<li>5.15&nbsp;Oozie</li>\r\n	<li>5.16&nbsp;SPARK</li>\r\n</ul>\r\n\r\n<p>6&nbsp;Share this</p>', '30days', '5000', '1', '1', '2021-01-16 00:26:54', '2021-01-16 00:26:54'),
(9, 'AWS', '<p>Contents&nbsp;</p>\r\n\r\n<p>1&nbsp;AWS Training Overview</p>\r\n\r\n<ul>\r\n	<li>1.1&nbsp;AWS Training Objectives</li>\r\n	<li>1.2&nbsp;AWS Training Prerequisites</li>\r\n	<li>1.3&nbsp;AWS System Requirements</li>\r\n	<li>1.4&nbsp;AWS Course Duration</li>\r\n</ul>\r\n\r\n<p>2&nbsp;AWS Course Content</p>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>2.0.1&nbsp;Introduction to Cloud Computing</li>\r\n		<li>2.0.2&nbsp;Identity Access Management</li>\r\n		<li>2.0.3&nbsp;Glacier Storage</li>\r\n		<li>2.0.4&nbsp;Compute</li>\r\n		<li>2.0.5&nbsp;Route 53</li>\r\n		<li>2.0.6&nbsp;Databases</li>\r\n		<li>2.0.7&nbsp;VPC (Virtual Private Cloud)</li>\r\n		<li>2.0.8&nbsp;Security Options</li>\r\n		<li>2.0.9&nbsp;Application Services</li>\r\n		<li>2.0.10&nbsp;DevOps Tools Overview</li>\r\n		<li>2.0.11&nbsp;Monitoring Tools</li>\r\n		<li>2.0.12&nbsp;Amazon White Papers review</li>\r\n		<li>2.0.13&nbsp;Quiz and Scenario-based Questions Discussion Resume Key Points and AWS Certifications overview</li>\r\n		<li>2.0.14&nbsp;AWS Interview Questions</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.1&nbsp;Share this:</li>\r\n</ul>', '30days', '6000', '1', '1', '2021-01-16 00:27:51', '2021-01-16 00:27:51'),
(10, 'SalesForce', '<p>Contents</p>\r\n\r\n<p>1&nbsp;SalesForce CRM Training Overview</p>\r\n\r\n<ul>\r\n	<li>1.1&nbsp;Objectives of the Course</li>\r\n	<li>1.2&nbsp;Who can attend This Course</li>\r\n	<li>1.3&nbsp;Prerequisites to learn Salesforce</li>\r\n	<li>1.4&nbsp;SalesForce CRM Course Duration</li>\r\n</ul>\r\n\r\n<p>2&nbsp;SalesForce CRM Course Content</p>\r\n\r\n<ul>\r\n	<li>2.1&nbsp;Definition Of Cloud Computing And Types</li>\r\n	<li>2.2&nbsp;Definition Of Salesforce And It&rsquo;s Products</li>\r\n	<li>2.3&nbsp;&nbsp;Salesforce Administration\r\n	<ul>\r\n		<li>2.3.1&nbsp;Sales Cloud-Generic Business Process</li>\r\n		<li>2.3.2&nbsp;Service Cloud and Customer Service</li>\r\n		<li>2.3.3&nbsp;Company Information</li>\r\n		<li>2.3.4&nbsp;Salesforce-Force.Com Platform</li>\r\n		<li>2.3.5&nbsp;Manage Users</li>\r\n		<li>2.3.6&nbsp;Relationships In&nbsp;Salesforce</li>\r\n		<li>2.3.7&nbsp;Applying Validations And Formulas</li>\r\n		<li>2.3.8&nbsp;Object Level Security Model (Table)</li>\r\n		<li>2.3.9&nbsp;Field Level Security Model (Column)</li>\r\n		<li>2.3.10&nbsp;Record Level Security Model-Sharing Settings(Row)</li>\r\n		<li>2.3.11&nbsp;Workflows And Approvals</li>\r\n		<li>2.3.12&nbsp;Data Management With SFDC</li>\r\n		<li>2.3.13&nbsp;Process Builder</li>\r\n		<li>2.3.14&nbsp;Community Creation</li>\r\n		<li>2.3.15&nbsp;Security Settings</li>\r\n		<li>2.3.16&nbsp;Email Administration</li>\r\n		<li>2.3.17&nbsp;Administrative Integration</li>\r\n		<li>2.3.18&nbsp;Reports And Dashboards</li>\r\n		<li>2.3.19&nbsp;Resolving Project Issues</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.4&nbsp;Salesforce Development\r\n	<ul>\r\n		<li>2.4.1&nbsp;Project Related</li>\r\n		<li>2.4.2&nbsp;Before Start Development</li>\r\n		<li>2.4.3&nbsp;Visualforce Pages</li>\r\n		<li>2.4.4&nbsp;Data Sources In Visualforce</li>\r\n		<li>2.4.5&nbsp;Pageblock Tags</li>\r\n		<li>2.4.6&nbsp;Input Components</li>\r\n		<li>2.4.7&nbsp;Select Components</li>\r\n		<li>2.4.8&nbsp;Message Tags</li>\r\n		<li>2.4.9&nbsp;Panel Tags</li>\r\n		<li>2.4.10&nbsp;Other VF Tags</li>\r\n		<li>2.4.11&nbsp;List Views</li>\r\n		<li>2.4.12&nbsp;Action Components In Visualforce</li>\r\n		<li>2.4.13&nbsp;Real Time Topics With Visualforce</li>\r\n		<li>2.4.14&nbsp;Usage Of CSS In Visualforce</li>\r\n		<li>2.4.15&nbsp;Usage Of JavaScript</li>\r\n		<li>2.4.16&nbsp;Usage Of jQuery In Visualforce</li>\r\n		<li>2.4.17&nbsp;Usage Ajax In Visualforce</li>\r\n		<li>2.4.18&nbsp;Usage Of Angular Js In Visualforce</li>\r\n		<li>2.4.19&nbsp;OOPS ( Object Oriented Programming )</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.5&nbsp;APEX\r\n	<ul>\r\n		<li>2.5.1&nbsp;Collections</li>\r\n		<li>2.5.2&nbsp;SOQL And SOSL</li>\r\n		<li>2.5.3&nbsp;DML Operations</li>\r\n		<li>2.5.4&nbsp;Controllers In APEX</li>\r\n		<li>2.5.5&nbsp;Schema Programming</li>\r\n		<li>2.5.6&nbsp;Email Service Using Apex Class</li>\r\n		<li>2.5.7&nbsp;Custom Setting</li>\r\n		<li>2.5.8&nbsp;Asynchronous APEX</li>\r\n		<li>2.5.9&nbsp;Batch APEX</li>\r\n		<li>2.5.10&nbsp;Apex Triggers</li>\r\n		<li>2.5.11&nbsp;Test Class</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.6&nbsp;&nbsp;Programmatic Integration\r\n	<ul>\r\n		<li>2.6.1&nbsp;Integration and WebServices</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.7&nbsp;Share this</li>\r\n</ul>', '45days', '7000', '1', '1', '2021-01-16 00:29:16', '2021-01-16 00:29:16'),
(11, 'Android', '<p>Contents</p>\r\n\r\n<p>1&nbsp;Android Course Overview</p>\r\n\r\n<ul>\r\n	<li>1.1&nbsp;Pre-requisites of the Course</li>\r\n	<li>1.2&nbsp;Android Training Objectives</li>\r\n	<li>1.3&nbsp;Course Duration</li>\r\n</ul>\r\n\r\n<p>2&nbsp;Android Training Course Overview</p>\r\n\r\n<ul>\r\n	<li>2.1&nbsp;Introduction to Android</li>\r\n	<li>2.2&nbsp;Android Architecture Overview</li>\r\n	<li>2.3&nbsp;Setup of Android Development Environment</li>\r\n	<li>2.4&nbsp;Your Android Application</li>\r\n	<li>2.5&nbsp;Your First Android Application</li>\r\n	<li>2.6&nbsp;Publishing to the Play Store</li>\r\n	<li>2.7&nbsp;Activities</li>\r\n	<li>2.8&nbsp;Android Testing</li>\r\n	<li>2.9&nbsp;Fragments</li>\r\n	<li>2.10&nbsp;User Interfaces</li>\r\n	<li>2.11&nbsp;Advanced UI</li>\r\n	<li>2.12&nbsp;Android Material Design</li>\r\n	<li>2.13&nbsp;Resources</li>\r\n	<li>2.14&nbsp;Broadcast Receivers</li>\r\n	<li>2.15&nbsp;Background Services</li>\r\n	<li>2.16&nbsp;Intents</li>\r\n	<li>2.17&nbsp;Storing and Retrieving Data</li>\r\n	<li>2.18&nbsp;SQLite Database</li>\r\n	<li>2.19&nbsp;Native Content Providers</li>\r\n	<li>2.20&nbsp;Custom Content Providers</li>\r\n	<li>2.21&nbsp;Web Services</li>\r\n	<li>2.22&nbsp;Parsing, Parsers</li>\r\n	<li>2.23&nbsp;Location Based Services</li>\r\n	<li>2.24&nbsp;Integrating Google Maps</li>\r\n	<li>2.25&nbsp;Telephony</li>\r\n	<li>2.26&nbsp;Multimedia in Android</li>\r\n	<li>2.27&nbsp;Bluetooth</li>\r\n	<li>2.28&nbsp;Social Networking Integrations</li>\r\n	<li>2.29&nbsp;Debugging&nbsp; and Testing Android Apps</li>\r\n	<li>2.30&nbsp;Share this</li>\r\n</ul>', '60days', '10000', '1', '1', '2021-01-16 00:30:24', '2021-01-16 00:30:24'),
(12, 'Digital Marketing', '<p>Contents</p>\r\n\r\n<p>1&nbsp;Digital Marketing Training Overview</p>\r\n\r\n<ul>\r\n	<li>1.1&nbsp;Course Duration</li>\r\n	<li>1.2&nbsp;Course Prerequisites</li>\r\n</ul>\r\n\r\n<p>2&nbsp;Digital Marketing&nbsp;Course Content</p>\r\n\r\n<ul>\r\n	<li>2.1&nbsp;Digital Marketing Introduction</li>\r\n	<li>2.2&nbsp;Understanding the Website</li>\r\n	<li>2.3&nbsp;Website Creations</li>\r\n	<li>2.4&nbsp;Keyword Selection Strategies</li>\r\n	<li>2.5&nbsp;Search Engine Optimization (SEO)</li>\r\n	<li>2.6&nbsp;On Page Optimization</li>\r\n	<li>2.7&nbsp;Offpage Optimization</li>\r\n	<li>2.8&nbsp;Social Media Optimization (SMO)\r\n	<ul>\r\n		<li>2.8.1&nbsp;Google+</li>\r\n		<li>2.8.2&nbsp;Facebook</li>\r\n		<li>2.8.3&nbsp;Twitter</li>\r\n		<li>2.8.4&nbsp;LinkedIn</li>\r\n		<li>2.8.5&nbsp;Instagram</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.9&nbsp;Search Engine Marketing (SEM)\r\n	<ul>\r\n		<li>2.9.1&nbsp;Introduction to SEM\r\n		<ul>\r\n			<li>2.9.1.1&nbsp;Google Adwords</li>\r\n			<li>2.9.1.2&nbsp;Google Adwords Express</li>\r\n			<li>2.9.1.3&nbsp;Bing Ads</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.10&nbsp;Social Media Marketing (SMM)\r\n	<ul>\r\n		<li>2.10.1&nbsp;Introduction to SMM\r\n		<ul>\r\n			<li>2.10.1.1&nbsp;Facebook</li>\r\n			<li>2.10.1.2&nbsp;Twitter</li>\r\n			<li>2.10.1.3&nbsp;LinkedIn</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.11&nbsp;Affiliate Marketing</li>\r\n	<li>2.12&nbsp;Email Marketing</li>\r\n	<li>2.13&nbsp;Mobile App Promotions</li>\r\n	<li>2.14&nbsp;Certifications</li>\r\n	<li>2.15&nbsp;Reporting</li>\r\n	<li>2.16&nbsp;Tools</li>\r\n	<li>2.17&nbsp;Youtube Marketing</li>\r\n	<li>2.18&nbsp;Online Earning Types</li>\r\n	<li>2.19&nbsp;Google Adsense\r\n	<ul>\r\n		<li>2.19.1&nbsp;Affiliate Marketing</li>\r\n		<li>2.19.2&nbsp;Freelancing</li>\r\n		<li>2.19.3&nbsp;Entrepreneur</li>\r\n		<li>2.19.4&nbsp;Resume Preparation Guidance</li>\r\n		<li>2.19.5&nbsp;Mock Interviews</li>\r\n		<li>2.19.6&nbsp;Interview Tips</li>\r\n	</ul>\r\n	</li>\r\n	<li>2.20&nbsp;Are you Located in any of these locations:</li>\r\n	<li>2.21&nbsp;Share this</li>\r\n</ul>', '45days', '15000', '1', '1', '2021-01-16 00:31:30', '2021-01-16 00:31:30');

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
(3, '2021_01_11_075214_course', 1),
(4, '2021_01_11_075303_content', 1),
(5, '2021_01_11_075341_schedule', 1),
(6, '2021_01_11_081309_customer', 1),
(7, '2021_01_11_081759_registered_course_info', 1);

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
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `priority_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `priority_name`, `created_at`, `updated_at`) VALUES
(1, 'High', '2021-01-18 10:10:58', NULL),
(2, 'Medium', '2021-01-18 10:10:58', NULL),
(3, 'Low', '2021-01-18 10:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registered_course_info`
--

CREATE TABLE `registered_course_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:inactive 1:active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered_course_info`
--

INSERT INTO `registered_course_info` (`id`, `uid`, `course_id`, `schedule_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 2, 3, 3, '1', '2021-01-13 09:01:24', NULL),
(6, 3, 4, 1, '1', '2021-01-16 02:21:55', NULL),
(7, 3, 3, 3, '1', '2021-01-16 02:22:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-01-12 06:50:56', NULL),
(2, 'users', '2021-01-12 06:50:56', NULL),
(3, 'students', '2021-01-12 06:51:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `time_from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:inactive 1:active',
  `added_by` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `time_from`, `time_to`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '07:15 AM', '08:00 AM', '1', '1', '2021-01-11 04:43:37', '2021-01-12 02:56:18'),
(3, '08:15 Am', '09:00 Am', '1', '1', '2021-01-11 06:00:32', '2021-01-12 02:57:19'),
(4, '09:15 AM', '10:00 AM', '1', '1', '2021-01-11 06:00:43', '2021-01-12 02:57:36'),
(5, '10:15 AM', '11:00 AM', '1', '1', '2021-01-11 06:00:50', '2021-01-12 02:57:51'),
(6, '04:00 PM', '05:00 PM', '1', '1', '2021-01-11 06:00:59', '2021-01-12 02:58:05'),
(7, '05:30 PM', '06:30 PM', '1', '1', '2021-01-11 06:01:07', '2021-01-12 02:58:25'),
(8, '07:00 PM', '08:00 PM', '1', '1', '2021-01-11 06:01:16', '2021-01-12 02:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_class`
--

CREATE TABLE `schedule_class` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `schedule_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_class`
--

INSERT INTO `schedule_class` (`id`, `course_id`, `schedule_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '3', 1, '2021-01-13 12:20:29', '2021-01-13 06:50:29'),
(3, 4, '1', 1, '2021-01-13 14:25:53', '2021-01-13 08:55:53'),
(4, 5, '6', 1, '2021-01-13 07:00:01', '2021-01-13 07:00:01'),
(5, 6, '7', 1, '2021-01-13 07:00:13', '2021-01-13 07:00:13'),
(6, 7, '5,8', 1, '2021-01-13 07:00:25', '2021-01-13 07:00:25'),
(7, 11, '5', 1, '2021-01-16 00:48:16', '2021-01-16 00:48:16'),
(8, 12, '7,8', 1, '2021-01-16 00:48:34', '2021-01-16 00:48:34'),
(9, 10, '3', 1, '2021-01-16 00:48:57', '2021-01-16 00:48:57'),
(10, 9, '1', 1, '2021-01-16 00:49:07', '2021-01-16 00:49:07'),
(11, 8, '8', 1, '2021-01-16 00:49:20', '2021-01-16 00:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_contents`
--

CREATE TABLE `syllabus_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabus_contents`
--

INSERT INTO `syllabus_contents` (`id`, `course_id`, `title`, `content`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 'what is php ?', '<p>PHP is an open-source, interpreted, and object-oriented scripting language that can be executed at the server-side. PHP is well suited for web development. Therefore, it is used to develop web applications (an application that executes on the server and generates the dynamic page.).</p>\r\n\r\n<p>PHP was created by&nbsp;<strong>Rasmus Lerdorf in 1994</strong>&nbsp;but appeared in the market in 1995.&nbsp;<strong>PHP 7.4.0</strong>&nbsp;is the latest version of PHP, which was released on&nbsp;<strong>28 November</strong>. Some important points need to be noticed about PHP are as followed:</p>\r\n\r\n<ul>\r\n	<li>PHP stands for Hypertext Preprocessor.</li>\r\n	<li>PHP is an interpreted language, i.e., there is no need for compilation.</li>\r\n	<li>PHP is faster than other scripting languages, for example, ASP and JSP.</li>\r\n	<li>PHP is a server-side scripting language, which is used to manage the dynamic content of the website.</li>\r\n	<li>PHP can be embedded into HTML.</li>\r\n	<li>PHP is an object-oriented language.</li>\r\n	<li>PHP is an open-source scripting language.</li>\r\n	<li>PHP is simple and easy to learn language.</li>\r\n</ul>', '1', 1, '2021-01-12 02:50:23', '2021-01-12 02:50:23'),
(4, 3, 'How to run PHP code in XAMPP', '<p>Generally, a PHP file contains HTML tags and some PHP scripting code. It is very easy to create a simple PHP example. To do so, create a file and write HTML tags + PHP code and save this file with .php extension.</p>\r\n\r\n<p>Note: PHP statements ends with semicolon (;).</p>\r\n\r\n<p>All PHP code goes between the php tag. It starts with &lt;?php and ends with ?&gt;. The syntax of PHP tag is given below:</p>\r\n\r\n<p>&lt;?php</p>\r\n\r\n<p>//your&nbsp;code&nbsp;here&nbsp;&nbsp;</p>\r\n\r\n<p>?&gt;&nbsp;&nbsp;</p>\r\n\r\n<p>Let&#39;s see a simple PHP example where we are writing some text using PHP echo command.</p>', '1', 1, '2021-01-12 03:00:58', '2021-01-12 03:00:58'),
(5, 3, 'PHP echo and print Statements', '<p>We frequently use the echo statement to display the output. There are two basic ways to get the output in PHP:</p>\r\n\r\n<ul>\r\n	<li>echo</li>\r\n	<li>print</li>\r\n</ul>\r\n\r\n<p>echo and print are language constructs, and they never behave like a function. Therefore, there is no requirement for parentheses. However, both the statements can be used with or without parentheses. We can use these statements to output variables or strings.</p>\r\n\r\n<h2>Difference between echo and print</h2>\r\n\r\n<h3>echo</h3>\r\n\r\n<ul>\r\n	<li>echo is a statement, which is used to display the output.</li>\r\n	<li>echo can be used with or without parentheses.</li>\r\n	<li>echo does not return any value.</li>\r\n	<li>We can pass multiple strings separated by comma (,) in echo.</li>\r\n	<li>echo is faster than print statement.</li>\r\n</ul>\r\n\r\n<h3>print</h3>\r\n\r\n<ul>\r\n	<li>print is also a statement, used as an alternative to echo at many times to display the output.</li>\r\n	<li>print can be used with or without parentheses.</li>\r\n	<li>print always returns an integer value, which is 1.</li>\r\n	<li>Using print, we cannot pass multiple arguments.</li>\r\n	<li>print is slower than echo statement.</li>\r\n</ul>\r\n\r\n<p>You can see the difference between echo and print statements with the help of the following programs.</p>', '1', 1, '2021-01-12 03:01:56', '2021-01-12 03:01:56'),
(7, 4, 'What is Java', '<p>Java is a&nbsp;<strong>programming language</strong>&nbsp;and a&nbsp;<strong>platform</strong>. Java is a high level, robust, object-oriented and secure programming language.</p>\r\n\r\n<p>Java was developed by&nbsp;<em>Sun Microsystems</em>&nbsp;(which is now the subsidiary of Oracle) in the year 1995.&nbsp;<em>James Gosling</em>&nbsp;is known as the father of Java. Before Java, its name was&nbsp;<em>Oak</em>. Since Oak was already a registered company, so James Gosling and his team changed the Oak name to Java.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Platform</strong>: Any hardware or software environment in which a program runs, is known as a platform. Since Java has a runtime environment (JRE) and API, it is called a platform.</p>', '1', 1, '2021-01-12 03:06:40', '2021-01-12 03:06:40'),
(58, 7, 'About C-Language', '<p>C is an basic building block for every languages. It is a general Purpose Language.&nbsp; To develop the programming skills &lsquo;C&rsquo; is the only platform for to develop programming techniques for&nbsp;any type languages. It is an Mid-level programming language for systems programming very widely used, relatively low-level, weakly typed, systems programming language associated with Unix and through that with Linux and the open source movement Performance becomes somewhat portable. Many Applications Like System Software, Application Software, Embedded Systems, Cool Games, Mobile applications, Device Drivers Programming etc of the World applications written in C and the List continues&hellip;C Designed and implemented by Dennis Ritchie 1972.</p>', '1', 1, '2021-01-16 00:36:18', '2021-01-16 00:36:18'),
(59, 7, 'Why This Course is Required', '<p>One thing we can speak without C Knowledge there is no Programming Logics to learn any language. There is no interviews for a Fresher without C language. To learn Java, .Net, Databases the list continues so many we require &ldquo;C&rdquo; Knowledge&nbsp; for a student&nbsp; Finally to tell many languages are internally Programmed by only C Language.</p>', '1', 1, '2021-01-16 00:36:19', '2021-01-16 00:36:19'),
(60, 7, 'Fundamentals in C', '<ul>\r\n	<li>Program</li>\r\n	<li>Programming</li>\r\n	<li>Programming Languages</li>\r\n	<li>Types of software</li>\r\n	<li>Introduction to C</li>\r\n	<li>History of C</li>\r\n	<li>Features of C</li>\r\n	<li>Applications of C</li>\r\n	<li>Character set, ASCII Table</li>\r\n	<li>Tokens</li>\r\n	<li>Keywords</li>\r\n	<li>Identifiers &amp; Naming Rules</li>\r\n	<li>constants</li>\r\n	<li>Data Types</li>\r\n	<li>Type Qualifiers</li>\r\n	<li>How does the data stored in Computers Memory</li>\r\n	<li>Variables</li>\r\n	<li>Variable Declaration</li>\r\n	<li>Variable Assignment</li>\r\n	<li>Variable Initialization</li>\r\n	<li>Comments</li>\r\n	<li>Defining Constants</li>\r\n	<li>MCQs</li>\r\n</ul>', '1', 1, '2021-01-16 00:36:19', '2021-01-16 00:36:19'),
(61, 7, 'Operators and Expressions', '<ul>\r\n	<li>Arithmetic operators</li>\r\n	<li>Arithmetic expressions</li>\r\n	<li>Evaluation of expressions</li>\r\n	<li>Relational operators</li>\r\n	<li>Logical operators</li>\r\n	<li>Assignment operators</li>\r\n	<li>Increment &amp; decrement operators</li>\r\n	<li>Conditional operator</li>\r\n	<li>Bitwise operators</li>\r\n	<li>Type casting</li>\r\n	<li>Sizeof operator</li>\r\n	<li>Comma operator</li>\r\n	<li>Operators Precedence and Associativity</li>\r\n	<li>Expressions</li>\r\n	<li>Evaluation of Expressions</li>\r\n	<li>MCQs</li>\r\n</ul>', '1', 1, '2021-01-16 00:36:19', '2021-01-16 00:36:19'),
(62, 7, 'Arrays', '<ul>\r\n	<li>Arrays</li>\r\n	<li>One dimensional arrays</li>\r\n	<li>Declaration of 1D arrays</li>\r\n	<li>Initialization of 1D arrays</li>\r\n	<li>Accessing element of 1D arrays</li>\r\n	<li>Reading and displaying elements</li>\r\n	<li>Programs on 1D Arrays</li>\r\n	<li>Two dimensional arrays</li>\r\n	<li>Declaration of 2D arrays</li>\r\n	<li>Initialization of 2D arrays</li>\r\n	<li>Accessing element of 2D arrays</li>\r\n	<li>Reading and displaying elements</li>\r\n	<li>Programs on 2D Arrays</li>\r\n	<li>Three dimensional arrays</li>\r\n	<li>MCQs</li>\r\n</ul>', '1', 1, '2021-01-16 00:36:19', '2021-01-16 00:36:19'),
(63, 7, 'Strings', '<ul>\r\n	<li>String Concept</li>\r\n	<li>Introduction to String in C</li>\r\n	<li>Storing Strings</li>\r\n	<li>The string Delimiter</li>\r\n	<li>String Literals (String Constants)</li>\r\n	<li>Strings and Characters</li>\r\n	<li>Declaring Strings</li>\r\n	<li>Initializing Strings</li>\r\n	<li>Strings and the Assignment Operator</li>\r\n	<li>String Input Functions / Reading Strings</li>\r\n	<li>String Output Functions / Writing Strings</li>\r\n	<li>String Input-Output using fscanf() and fprintf() Functions</li>\r\n	<li>Single Character Library Functions / Character Manipulation in the String</li>\r\n	<li>String Manipulation Library Functions</li>\r\n	<li>Programs Using Character Arrays</li>\r\n	<li>Array of Strings (2D Character Arrays)</li>\r\n	<li>Programs Using Array of Strings</li>\r\n	<li>MCQs</li>\r\n</ul>', '1', 1, '2021-01-16 00:36:19', '2021-01-16 00:36:19'),
(64, 6, 'Python', '<p>Python is a general-purpose interpreted, interactive, object-oriented, and high-level programming language. Python has been one of the premier, flexible, and powerful open-source language that is easy to learn, easy to use, and has powerful libraries for data manipulation and analysis</p>', '1', 1, '2021-01-16 00:39:35', '2021-01-16 00:39:35'),
(65, 6, 'Objectives of the Course', '<ul>\r\n	<li>To understand the concepts and constructs of Python</li>\r\n	<li>To create own Python programs, know the machine learning algorithms in Python and work on a real-time project running on Python</li>\r\n</ul>', '1', 1, '2021-01-16 00:39:36', '2021-01-16 00:39:36'),
(66, 6, 'Introduction to Languages', '<ul>\r\n	<li>What is Language?</li>\r\n	<li>Types of languages</li>\r\n	<li>Introduction to Translators\r\n	<ul>\r\n		<li>Compiler</li>\r\n		<li>Interpreter</li>\r\n	</ul>\r\n	</li>\r\n	<li>What is Scripting Language?</li>\r\n	<li>Types of Script</li>\r\n	<li>Programming Languages v/s Scripting Languages</li>\r\n	<li>Difference between Scripting and Programming languages</li>\r\n	<li>What is programming paradigm?</li>\r\n	<li>Procedural programming paradigm</li>\r\n	<li>Object Oriented Programming paradigm</li>\r\n</ul>', '1', 1, '2021-01-16 00:39:36', '2021-01-16 00:39:36'),
(67, 6, 'Introduction to Python', '<ul>\r\n	<li>What is Python?</li>\r\n	<li>WHY PYTHON?</li>\r\n	<li>History</li>\r\n	<li>Features &ndash; Dynamic, Interpreted, Object oriented, Embeddable, Extensible, Large standard libraries, Free and Open source</li>\r\n	<li>Why Python is General Language?</li>\r\n	<li>Limitations of Python</li>\r\n	<li>What is PSF?</li>\r\n	<li>Python implementations</li>\r\n	<li>Python applications</li>\r\n	<li>Python versions</li>\r\n	<li>PYTHON IN REALTIME INDUSTRY</li>\r\n	<li>Difference between Python 2.x and 3.x</li>\r\n	<li>Difference between Python 3.7 and 3.8</li>\r\n	<li>Software Development Architectures</li>\r\n</ul>', '1', 1, '2021-01-16 00:39:36', '2021-01-16 00:39:36'),
(68, 6, 'Python Software’s', '<ul>\r\n	<li>Python Distributions</li>\r\n	<li>Download &amp;Python Installation Process in Windows, Unix, Linux and Mac</li>\r\n	<li>Online Python IDLE</li>\r\n	<li>Python Real-time IDEs like Spyder, Jupyter Note Book, PyCharm, Rodeo, Visual Studio Code, ATOM, PyDevetc</li>\r\n</ul>', '1', 1, '2021-01-16 00:39:36', '2021-01-16 00:39:36'),
(69, 12, 'Digital Marketing Introduction', '<ul>\r\n	<li>What is Digital Marketing?</li>\r\n	<li>Why Digital Marketing?</li>\r\n	<li>Digital Marketing platforms?</li>\r\n	<li>Digital Marketing Strategy</li>\r\n	<li>Types of Digital Marketing &ndash; Organic &amp; Paid</li>\r\n	<li>Digital Marketing VS Traditional Marketing</li>\r\n	<li>How is it different from traditional marketing?</li>\r\n	<li>ROI between Digital and traditional marketing?</li>\r\n</ul>', '1', 1, '2021-01-16 00:41:13', '2021-01-16 00:41:13'),
(70, 12, 'Understanding the Website', '<ul>\r\n	<li>What is a website</li>\r\n	<li>Types of websites?</li>\r\n	<li>Static Website</li>\r\n	<li>Dynamic Website</li>\r\n	<li>E-Commerce Website</li>\r\n	<li>Domain Booking</li>\r\n	<li>Web Hosting Purchase</li>\r\n	<li>Website Architecture</li>\r\n</ul>', '1', 1, '2021-01-16 00:41:14', '2021-01-16 00:41:14'),
(71, 12, 'Search Engine Optimization (SEO)', '<ul>\r\n	<li>What is SEO?</li>\r\n	<li>How do search engines work?</li>\r\n	<li>SEO Tools</li>\r\n	<li>Web position Analysis</li>\r\n	<li>Competition Analysis</li>\r\n	<li>Google Algorithms and Updates</li>\r\n</ul>', '1', 1, '2021-01-16 00:41:14', '2021-01-16 00:41:14'),
(72, 11, 'Introduction to Android', '<ul>\r\n	<li>Overview of Android</li>\r\n	<li>Java Editions and comparison with Android</li>\r\n	<li>Android Apps &ndash; Design, Vendor, Behavioral Classification</li>\r\n</ul>', '1', 1, '2021-01-16 00:42:52', '2021-01-16 00:42:52'),
(73, 11, 'Android Architecture Overview', '<ul>\r\n	<li>Android Architecture</li>\r\n	<li>Application Frameworks</li>\r\n	<li>Android Libraries, Run time, Dalvik Virtual Machine</li>\r\n</ul>', '1', 1, '2021-01-16 00:42:53', '2021-01-16 00:42:53'),
(74, 11, 'Your First Android Application', '<ul>\r\n	<li>Creating Android Application</li>\r\n	<li>Creating Configurations</li>\r\n	<li>Testing the app: AVD, Active Device</li>\r\n	<li>Android Project Structure and Manifest file</li>\r\n</ul>', '1', 1, '2021-01-16 00:42:53', '2021-01-16 00:42:53'),
(75, 11, 'Publishing to the Play Store', '<ul>\r\n	<li>Release process and Release build of Android Application</li>\r\n	<li>Signing the .apk file</li>\r\n	<li>Preparing the Store Listing page</li>\r\n	<li>Content Rating</li>\r\n	<li>Distributing the Application</li>\r\n	<li>Merchant Registration for Paid Applications</li>\r\n</ul>', '1', 1, '2021-01-16 00:42:53', '2021-01-16 00:42:53'),
(76, 10, 'SalesForce CRM', '<p>Salesforce&nbsp;<strong>Customer Relationship Management</strong>&nbsp;usually pronounced as Salesforce CRM which has began with the vision of re-inventing CRM. The major role of Salesforce is to run entirely in the cloud storage and there is no need of setup costs which helps your workers to do work from any device just with an internet connection either it may be a smartphone, tablet, laptop or PC. Salesforce CRM is easy to operate for small business as well as large business organizations. It not only starts and end with CRM for sales and marketing but also enables you to manage all interactions with your customers.</p>', '1', 1, '2021-01-16 00:44:43', '2021-01-16 00:44:43'),
(77, 10, 'Definition Of Cloud Computing And Types', '<ul>\r\n	<li>Definition of cloud computing</li>\r\n	<li>On-demand advantages of Cloud computing</li>\r\n	<li>Services of Cloud computing\r\n	<ul>\r\n		<li>Saas(Software as a Service)</li>\r\n		<li>PaaS(Platform as a Service)</li>\r\n		<li>IaaS(Infrastructure as a Service)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Types of Clouds\r\n	<ul>\r\n		<li>Public Cloud</li>\r\n		<li>Private Cloud</li>\r\n		<li>Hybrid Cloud</li>\r\n		<li>Community Cloud</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '1', 1, '2021-01-16 00:44:43', '2021-01-16 00:44:43'),
(78, 10, 'Sales Cloud-Generic Business Process', '<ul>\r\n	<li>Features of Sales Cloud</li>\r\n	<li>Products</li>\r\n	<li>Campaign</li>\r\n	<li>Lead</li>\r\n	<li>Account</li>\r\n	<li>Opportunity</li>\r\n	<li>Contact</li>\r\n	<li>Contract</li>\r\n	<li>QuoteManage</li>\r\n	<li>Order</li>\r\n	<li>Forecast</li>\r\n	<li>Entitlement</li>\r\n</ul>', '1', 1, '2021-01-16 00:44:43', '2021-01-16 00:44:43'),
(79, 9, 'AWS', '<p>This Instructor-led comprehensive AWS Training<strong>&nbsp;</strong>(&nbsp;<strong>AWS Solutions Architect &ndash; Associate and Sysops&nbsp;&nbsp;Administrator</strong>&nbsp;) designed to show how to setup and run&nbsp;<a href=\"http://13.235.101.185/cloud-computing-using-windows-azure/\" target=\"_blank\">Cloud Services</a>&nbsp;in Amazon Web Services (AWS) all the way through to IaaS with hands-on experience on AWS Public cloud.</p>', '1', 1, '2021-01-16 00:46:02', '2021-01-16 00:46:02'),
(80, 9, 'Introduction to Cloud Computing', '<ul>\r\n	<li>Introduction to cloud computing</li>\r\n	<li>Essential Characteristics of Cloud Computing</li>\r\n	<li>Service Models in Cloud computing</li>\r\n	<li>Deployment models in Cloud Computing</li>\r\n	<li>Introduction to AWS</li>\r\n	<li>AWS Account creation &amp;free tier limitations overview</li>\r\n</ul>', '1', 1, '2021-01-16 00:46:02', '2021-01-16 00:46:02'),
(81, 9, 'Identity Access Management', '<ul>\r\n	<li>Root Account Vs IAM user</li>\r\n	<li>Multi-FactorAuthentication for Users</li>\r\n	<li>IAM Password Policies</li>\r\n	<li>Creating Customer Managed Policies.</li>\r\n	<li>Groups</li>\r\n	<li>Roles</li>\r\n</ul>', '1', 1, '2021-01-16 00:46:02', '2021-01-16 00:46:02'),
(82, 8, 'Hadoop', '<p>Hadoop Development course teaches the skill set required for the learners how to setup Hadoop Cluster, how to store Big Data using Hadoop (HDFS) and how to process/analyze the Big Data using Map-Reduce Programming or by using other Hadoop ecosystems. Attend Hadoop Training demo by Real-Time Expert.</p>', '1', 1, '2021-01-16 00:47:21', '2021-01-16 00:47:21'),
(83, 8, 'Introduction to Hadoop', '<ul>\r\n	<li>High Availability</li>\r\n	<li>Scaling</li>\r\n	<li>Advantages and Challenges<strong>&nbsp;</strong></li>\r\n</ul>', '1', 1, '2021-01-16 00:47:22', '2021-01-16 00:47:22'),
(84, 8, 'Hadoop Distributed File System (HDFS)', '<ul>\r\n	<li>HDFS Design &amp; Concepts</li>\r\n	<li>Blocks, Name nodes and Data nodes</li>\r\n	<li>HDFS High-Availability and HDFS Federation</li>\r\n	<li>Hadoop DFS The Command-Line Interface</li>\r\n	<li>Basic File System Operations</li>\r\n	<li>Anatomy of File Read,File Write</li>\r\n	<li>Block Placement Policy and Modes</li>\r\n	<li>More detailed explanation about Configuration files</li>\r\n	<li>Metadata, FS image, Edit log, Secondary Name Node and Safe Mode</li>\r\n	<li>How to add New Data Node dynamically,decommission a Data Node dynamically (Without stopping cluster)</li>\r\n	<li>FSCK Utility. (Block report)</li>\r\n	<li>How to override default configuration at system level and Programming level</li>\r\n	<li>HDFS Federation</li>\r\n	<li>ZOOKEEPER Leader Election Algorithm</li>\r\n	<li>Exercise and small use case on HDFS</li>\r\n</ul>', '1', 1, '2021-01-16 00:47:22', '2021-01-16 00:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `uniq_id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `init_msg` text NOT NULL,
  `role` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `last_reply` int(11) NOT NULL,
  `user_read` int(11) NOT NULL,
  `admin_read` int(11) NOT NULL,
  `resolved` int(11) NOT NULL COMMENT '0:open & 1:close',
  `priority` int(11) NOT NULL COMMENT '1:high,2:medium,3:low',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `uniq_id`, `user_id`, `title`, `init_msg`, `role`, `date`, `last_reply`, `user_read`, `admin_read`, `resolved`, `priority`, `created_at`, `updated_at`) VALUES
(1, '60057f2610a7c', 2, 'edit testing not wokring', 'plese solve thsi prolem !', 3, '2021-01-18 14:15:44', 2, 0, 0, 1, 1, '2021-01-19 08:08:09', '2021-01-19 02:38:09'),
(2, '6006942b2d9c5', 3, 'PHP course in that some content now showing', 'Hello please check php content not showing in side', 3, '2021-01-19 08:11:23', 3, 0, 0, 0, 1, '2021-01-19 08:16:11', '2021-01-19 02:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `ticket_id` text NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `user_id`, `text`, `ticket_id`, `date`, `created_at`, `updated_at`) VALUES
(2, 1, 'ok wait i will check first', '1', '2021-01-19 07:22:34', '2021-01-19 07:23:52', '2021-01-19 01:52:34'),
(3, 1, 'and i will solve fews days', '1', '2021-01-19 07:25:20', '2021-01-19 01:55:20', '2021-01-19 01:55:20'),
(4, 2, 'ok try to solve quickly', '1', '2021-01-19 07:27:20', '2021-01-19 01:57:20', '2021-01-19 01:57:20'),
(5, 1, 'ok it will done tomaroow', '1', '2021-01-19 08:00:52', '2021-01-19 02:30:52', '2021-01-19 02:30:52'),
(6, 2, 'good', '1', '2021-01-19 08:01:43', '2021-01-19 02:31:43', '2021-01-19 02:31:43'),
(7, 1, 'hi nandu bhai what happen', '2', '2021-01-19 08:14:41', '2021-01-19 02:44:41', '2021-01-19 02:44:41'),
(8, 3, 'some videos not showing in php larvel tutorial', '2', '2021-01-19 08:15:28', '2021-01-19 02:45:28', '2021-01-19 02:45:28'),
(9, 1, 'ok i will check and solve the problem', '2', '2021-01-19 08:15:49', '2021-01-19 02:45:49', '2021-01-19 02:45:49'),
(10, 3, 'ok', '2', '2021-01-19 08:16:11', '2021-01-19 02:46:11', '2021-01-19 02:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `name`, `email`, `mobile_no`, `email_verified_at`, `password`, `added_by`, `remember_token`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '', NULL, 'roaH3a5VEAXGA', '1', NULL, 1, 1, '2021-01-12 06:52:13', NULL),
(2, 'kiran', 'kiran', 'kiran@gmail.com', '9657379318', NULL, 'roaH3a5VEAXGA', NULL, NULL, 1, 3, '2021-01-08 09:58:44', NULL),
(3, 'nandu', 'Nandu', 'nandu.racharla1991@gmail.com', '9876543211', NULL, 'roaH3a5VEAXGA', NULL, NULL, 1, 3, '2021-01-11 09:58:54', NULL),
(4, 'rahul', 'Rahul', 'rahul@gmail.com', '9876543210', NULL, 'roaH3a5VEAXGA', NULL, NULL, 1, 3, '2021-01-13 09:59:01', NULL),
(5, 'lokesh', 'lokesh', 'lokesh@gmail.com', '9876543209', NULL, 'roaH3a5VEAXGA', NULL, NULL, 1, 3, '2021-01-14 09:59:05', NULL),
(6, 'pradip', 'Pradip', 'pradip@gmail.com', '8899776655', NULL, 'roaH3a5VEAXGA', NULL, NULL, 0, 3, '2021-01-16 09:59:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

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
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_course_info`
--
ALTER TABLE `registered_course_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `schedule_class`
--
ALTER TABLE `schedule_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus_contents`
--
ALTER TABLE `syllabus_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registered_course_info`
--
ALTER TABLE `registered_course_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule_class`
--
ALTER TABLE `schedule_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `syllabus_contents`
--
ALTER TABLE `syllabus_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
