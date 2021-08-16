-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 10:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_ready`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `school` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `field_of_study` varchar(100) NOT NULL,
  `grade` int(11) NOT NULL,
  `start_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `student_id`, `school`, `degree`, `field_of_study`, `grade`, `start_year`, `end_year`) VALUES
(4, 1, 'giao thong', 'master', 'infomation techonogy', 5, 2013, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `salary` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `last_date` date NOT NULL,
  `job_type` int(11) NOT NULL,
  `job_category` int(11) NOT NULL,
  `time_type` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `staff_id`, `title`, `description`, `content`, `salary`, `country`, `last_date`, `job_type`, `job_category`, `time_type`, `image`, `created_at`) VALUES
(1, 1, 'Room Leader - Pagewood', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '1000 usd', 'Australia', '2021-08-11', 3, 1, 'Full time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(2, 1, 'Apply php developer', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '2000 usd', 'Viet Nam', '2021-08-12', 2, 1, 'Full time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(3, 1, 'Apply java developer', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '3000 usd', 'Viet Nam', '2021-08-12', 2, 1, 'Full time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(4, 1, 'Apply ReactJs developer', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '5000 usd', 'Viet Nam', '2021-08-12', 2, 1, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(5, 1, 'Apply Nodejs developer', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '1000 usd', 'Thai land', '2021-08-12', 2, 1, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(6, 1, 'Apply Front end developer', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '3000 usd', 'Campuchia', '2021-08-12', 5, 1, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(7, 1, 'Apply Ke toan', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '3000 usd', 'Campuchia', '2021-08-12', 6, 1, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(8, 1, 'Intern java', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '300 usd', 'Campuchia', '2021-08-12', 2, 2, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(9, 1, 'Intern php', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '300 usd', 'Campuchia', '2021-08-12', 2, 2, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(10, 1, 'Intern react js', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '300 usd', 'Campuchia', '2021-08-12', 3, 2, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07'),
(11, 1, 'Intern laravel', '', 'Join a leading Australian Early Education Company\r\nLead a passionate team\r\nNew and innovative centre', '300 usd', 'Campuchia', '2021-08-12', 2, 2, 'Part time', 'https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218', '2021-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `name`, `created_at`) VALUES
(1, 'Accounting', '2021-08-07'),
(2, 'IT', '2021-08-07'),
(3, 'Advertising', '2021-08-07'),
(4, 'Banking', '2021-08-07'),
(5, 'CEO', '2021-08-07'),
(6, 'Construction', '2021-08-07'),
(7, 'Consulting and Strategy', '2021-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_phone` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `business_name`, `business_phone`, `user_name`, `email`, `role`, `first_name`, `last_name`, `address`, `city`, `country`, `postal_code`, `description`, `password`) VALUES
(1, 'Creative Code Inc.', '0123456744', 'thanhtungadmin', 'duy3@gmail.com', 'manager', 'Duy', 'Bui', '259 Phu Dien', 'Bac Tu Niem', 'Ha Noi', '00001', 'The best business in the world, making the best things in the world ', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `experience` int(11) NOT NULL,
  `work_in_australia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `company`, `position`, `user_name`, `password`, `email`, `first_name`, `last_name`, `address`, `city`, `country`, `postal_code`, `description`, `resume`, `experience`, `work_in_australia`) VALUES
(1, 'sotatek', 'frontend developer', 'thanhtung123', 'e10adc3949ba59abbe56e057f20f883e', 'tung@123gmail.com', 'Tung', 'Thanh', 'Habel', 'Habel', 'Autralia', '123445', 'I am Thanh Tung.\r\nI am 25 age.', NULL, 2, 0),
(2, 'bidgear', 'php developer', 'thanhtung4545', 'e10adc3949ba59abbe56e057f20f883e', 'thanhtung4545@gmail.com', 'quang', 'diu', 'Habel', 'Habel', 'Autralia', '5556', 'I am Duy.\r\nI am 25 age.', NULL, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_job`
--

CREATE TABLE `student_job` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `status_approve` int(11) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `cover_letter` varchar(255) NOT NULL,
  `selection_criteria` varchar(255) NOT NULL,
  `date_apply` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_job`
--

INSERT INTO `student_job` (`id`, `student_id`, `job_id`, `status_approve`, `resume`, `cover_letter`, `selection_criteria`, `date_apply`) VALUES
(1, 1, 1, 0, '', '', '', '2021-08-07'),
(2, 1, 2, 0, '', '', '', '2021-08-07'),
(3, 2, 1, 0, '', '', '', '2021-08-08'),
(4, 2, 3, 0, '', '', '', '2021-08-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_job`
--
ALTER TABLE `student_job`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_job`
--
ALTER TABLE `student_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
