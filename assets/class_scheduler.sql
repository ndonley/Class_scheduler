-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2015 at 10:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `class_scheduler`
--
CREATE DATABASE IF NOT EXISTS `class_scheduler` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `class_scheduler`;

-- --------------------------------------------------------

--
-- Table structure for table `cs_classes`
--

DROP TABLE IF EXISTS `cs_classes`;
CREATE TABLE IF NOT EXISTS `cs_classes` (
  `class_id` varchar(25) NOT NULL,
  `class_name` varchar(25) NOT NULL,
  `class_code` varchar(20) NOT NULL,
  `class_start_time` varchar(25) NOT NULL,
  `class_end_time` varchar(25) NOT NULL,
  `teacher_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_classes`
--

INSERT INTO `cs_classes` (`class_id`, `class_name`, `class_code`, `class_start_time`, `class_end_time`, `teacher_id`) VALUES
('ENG101', 'English', 'mwf', '12:00', '1:00', 100),
('BIO101', 'Biology', 'tr', '2:00', '3:00', 102),
('CHM101', 'Chemistry', 'mwf', '9:00', '10:00', 100),
('MAT200', 'Algebra 2', 'w', '6:00', '8:00', 100),
('PHY101', 'Physics', 'mwf', '10:00', '11:00', 100),
('WEB101', 'Intro to Web', 'tr', '1:00', '2:00', 102),
('HIS101', 'History', 'tr', '11:00', '12:00', 102);

-- --------------------------------------------------------

--
-- Table structure for table `cs_students`
--

DROP TABLE IF EXISTS `cs_students`;
CREATE TABLE IF NOT EXISTS `cs_students` (
  `student_id` int(20) NOT NULL,
  `student_firstname` varchar(25) NOT NULL,
  `student_lastname` varchar(25) NOT NULL,
  `student_email` varchar(35) NOT NULL,
  `student_date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_students`
--

INSERT INTO `cs_students` (`student_id`, `student_firstname`, `student_lastname`, `student_email`, `student_date_of_birth`) VALUES
(100001, 'Bob', 'Smith', 'bobsmith@gmail.com', '0000-00-00'),
(100002, 'John', 'Doe', 'johndoe@gmail.com', '0000-00-00'),
(100003, 'Jane', 'Johnson', 'janejohnson@yahoo.com', '1987-02-21'),
(100004, 'Matt', 'Thomas', 'mthomas@gmail.com', '1982-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `cs_student_enrollment`
--

DROP TABLE IF EXISTS `cs_student_enrollment`;
CREATE TABLE IF NOT EXISTS `cs_student_enrollment` (
  `student_id` int(20) NOT NULL,
  `class_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_student_enrollment`
--

INSERT INTO `cs_student_enrollment` (`student_id`, `class_id`) VALUES
(100001, 'ENG101'),
(100002, 'ENG101'),
(100003, 'ENG101'),
(100001, 'MAT200'),
(100001, 'BIO101');

-- --------------------------------------------------------

--
-- Table structure for table `cs_teachers`
--

DROP TABLE IF EXISTS `cs_teachers`;
CREATE TABLE IF NOT EXISTS `cs_teachers` (
  `teacher_id` int(20) NOT NULL,
  `teacher_firstname` varchar(30) NOT NULL,
  `teacher_lastname` varchar(30) NOT NULL,
  `teacher_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_teachers`
--

INSERT INTO `cs_teachers` (`teacher_id`, `teacher_firstname`, `teacher_lastname`, `teacher_email`) VALUES
(100, 'Dave', 'Riley', 'driley@gmail.com'),
(101, 'Alex', 'Brody', 'alexb@yahoo.com'),
(102, 'Ernest', 'Stevens', 'ernestmstevens@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cs_users`
--

DROP TABLE IF EXISTS `cs_users`;
CREATE TABLE IF NOT EXISTS `cs_users` (
  `user_id` varchar(25) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_permission` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_users`
--

INSERT INTO `cs_users` (`user_id`, `user_name`, `user_password`, `user_permission`) VALUES
('1', 'TimMeadows', 'adminPassword', 'A'),
('100', 'DaveRiley', 'teacherPassword', 'T'),
('100001', 'BobSmith', 'studentPassword', 'S');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
