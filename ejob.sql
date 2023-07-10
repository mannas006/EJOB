-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 01:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ejob`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate`
--

CREATE TABLE `tbl_candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL COMMENT '1=male, 2= female',
  `description` text NOT NULL,
  `dob_day` varchar(100) NOT NULL,
  `dob_month` varchar(100) NOT NULL,
  `dob_year` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `full_address` text NOT NULL,
  `experience` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `current_salary` varchar(255) NOT NULL,
  `expected_salary` varchar(255) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `required_skills` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_candidate`
--

INSERT INTO `tbl_candidate` (`id`, `name`, `password`, `imagename`, `email`, `phone`, `gender`, `description`, `dob_day`, `dob_month`, `dob_year`, `country`, `city`, `full_address`, `experience`, `age`, `current_salary`, `expected_salary`, `languages`, `qualification`, `required_skills`) VALUES
(1, 'Biswajit Maity', '1234567', 'Birds-Image.jpg', 'biswajitmaityniit@gmail.coms', '8768624650', 'Male', 'dcdcdc', '16', '01', '1991', '1', '2', 'durgapur, msav 22sssss', '3', '27', '4000', '15000', 'English', 'MCS', 'php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate_applied_for_job`
--

CREATE TABLE `tbl_candidate_applied_for_job` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_apply_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate_wishlist`
--

CREATE TABLE `tbl_candidate_wishlist` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `land_line_no` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `organization_type` varchar(100) NOT NULL,
  `cell_phone` varchar(100) NOT NULL,
  `no_of_employee` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `full_address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `name`, `email`, `password`, `imagename`, `company_name`, `company_logo`, `industry`, `land_line_no`, `website`, `description`, `organization_type`, `cell_phone`, `no_of_employee`, `country`, `city`, `full_address`) VALUES
(1, 'Biswajit Maity', 'biswajitmaityniit@gmail.com', '123456', 'df4578c1a6490ad025f2c5d3f4c16add.jpg', 'Best Web Solutions ', '', '1', '8768624650', '', 'It\'s a durgapur based software company', 'Private', '8768624650', '1501-2000', '1', '2', 'MSAV-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_industries`
--

CREATE TABLE `tbl_job_industries` (
  `id` int(11) NOT NULL,
  `industry_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_titles`
--

CREATE TABLE `tbl_job_titles` (
  `id` int(11) NOT NULL,
  `job_titles` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_jobs`
--

CREATE TABLE `tbl_post_jobs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_date` date NOT NULL,
  `job_description` text NOT NULL,
  `vacancies` varchar(100) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `job_mode` enum('Home Based','Part Time','Full Time') NOT NULL,
  `pay` varchar(60) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `required_skills` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` tinyint(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post_jobs`
--

INSERT INTO `tbl_post_jobs` (`id`, `company_id`, `job_title`, `added_date`, `last_date`, `job_description`, `vacancies`, `industry_id`, `job_mode`, `pay`, `experience`, `qualification`, `required_skills`, `contact_person`, `contact_email`, `contact_phone`, `country`, `city`, `status`) VALUES
(1, 1, 'PHP Web Developer', '2019-04-27 06:56:13', '2019-04-30', 'Experience building and optimizing applications for WebDirect.\r\nPreferred experience with PHP - CodeIgniter framework.\r\nExperience building plugins and understanding of REST, web services, and external APIs. \r\nDesign, build, and maintain efficient, reusable and reliable codes\r\nEnsure the best possible performance, quality, and responsiveness of the applications\r\nIdentify bottlenecks/bugs and devise solutions to these problems.', '10', 1, 'Full Time', '25000', '1', 'BA', 'php', 'biswajit maity', 'biswajit@gmail.com', '8768624650', '1', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualifications`
--

CREATE TABLE `tbl_qualifications` (
  `id` int(11) NOT NULL,
  `val` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_candidate_applied_for_job`
--
ALTER TABLE `tbl_candidate_applied_for_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_candidate_wishlist`
--
ALTER TABLE `tbl_candidate_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_industries`
--
ALTER TABLE `tbl_job_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_titles`
--
ALTER TABLE `tbl_job_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post_jobs`
--
ALTER TABLE `tbl_post_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_candidate_applied_for_job`
--
ALTER TABLE `tbl_candidate_applied_for_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_candidate_wishlist`
--
ALTER TABLE `tbl_candidate_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_job_industries`
--
ALTER TABLE `tbl_job_industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_job_titles`
--
ALTER TABLE `tbl_job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post_jobs`
--
ALTER TABLE `tbl_post_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
