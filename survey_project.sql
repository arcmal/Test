-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 04:05 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL,
  `date_created` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `name`, `email`, `date_update`, `date_created`) VALUES
(1, '2016501629', '5f4dcc3b5aa765d61d8327deb882cf99', 'Muhammad Akmal Rasydan Bin Mohd Rosni', 'rasydanakmal@gmail.com', '21-05-2018', '27-11-2017'),
(2, '2014825282', '5f4dcc3b5aa765d61d8327deb882cf99', 'Nurul Aida Binti Yang', 'akmalrasydan@gmail.com', '17-04-2018', '14-01-2018');

-- --------------------------------------------------------

--
-- Table structure for table `question_result`
--

CREATE TABLE IF NOT EXISTS `question_result` (
`id` int(5) NOT NULL,
  `id_survey` varchar(50) DEFAULT NULL,
  `question_name` varchar(100) DEFAULT NULL,
  `rating_1` int(5) DEFAULT '0',
  `rating_2` int(5) DEFAULT '0',
  `rating_3` int(5) DEFAULT '0',
  `rating_4` int(5) DEFAULT '0',
  `rating_5` int(5) DEFAULT '0',
  `date_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `question_result`
--

INSERT INTO `question_result` (`id`, `id_survey`, `question_name`, `rating_1`, `rating_2`, `rating_3`, `rating_4`, `rating_5`, `date_created`) VALUES
(6, '20180419042529', 'What Was Your First Impression When You Entered The Website?', 1, 3, 2, 8, 5, '19-04-2018'),
(7, '20180419042529', 'How Likely Are You To Recommend Us To A User Friend Or Colleague?', 0, 0, 5, 8, 5, '20-04-2018'),
(8, '20180419042529', 'Satisfaction Using This System?', 0, 0, 2, 4, 1, '20-04-2018'),
(9, '2018101', 'Hehe Hehe', 0, 0, 0, 0, 0, '20-04-2018'),
(10, '20180419042529', 'Is This System Make Easy For You?', 0, 1, 0, 2, 4, '20-04-2018'),
(11, '2018101', 'Haha Haha', 0, 0, 0, 0, 0, '23-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `survey_category`
--

CREATE TABLE IF NOT EXISTS `survey_category` (
`id` int(5) NOT NULL,
  `id_survey` varchar(50) DEFAULT NULL,
  `admin_id` varchar(50) DEFAULT NULL,
  `survey_name` varchar(100) DEFAULT NULL,
  `available` varchar(10) DEFAULT NULL,
  `date_update` varchar(50) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `survey_category`
--

INSERT INTO `survey_category` (`id`, `id_survey`, `admin_id`, `survey_name`, `available`, `date_update`, `date_created`) VALUES
(2, '2018101', '2016501629', 'Programming Language', 'No', '23-04-2018', '17-04-2018'),
(3, '2018102', '2014825282', 'Training Network Application System', 'No', '20-04-2018', '18-04-2018'),
(5, '20180419042529', '2016501629', 'Website Survey Questions', 'Yes', '20-04-2018', '19-04-2018'),
(6, '20180419043309', '2016501629', 'Website Feedback Template', 'Yes', NULL, '19-04-2018'),
(7, '20180420043822', '2016501629', 'Php Training', 'No', '20-04-2018', '20-04-2018'),
(9, '20180502085032', '2014825282', 'Hehe', 'Yes', '02-05-2018', '02-05-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_result`
--
ALTER TABLE `question_result`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_category`
--
ALTER TABLE `survey_category`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question_result`
--
ALTER TABLE `question_result`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `survey_category`
--
ALTER TABLE `survey_category`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
