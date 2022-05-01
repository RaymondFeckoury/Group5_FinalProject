-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2022 at 03:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applicationorganizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed`
--

CREATE TABLE `completed` (
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `workLocation` text NOT NULL,
  `comments` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completed`
--

INSERT INTO `completed` (`company`, `location`, `jobTitle`, `date`, `workLocation`, `comments`, `username`) VALUES
('Amazon', 'Chicgo', 'SWE', '2022-03-17', 'in-person', '', 'raymo'),
('Micro', 'ATL', 'SWE', '2022-04-18', 'hybrid', 'hellothere', 'Raymond'),
('google', 'atl', 'swe', '2022-04-01', 'in-person', 'cool2', 'Raymond'),
('', '', '', '', '', '', ''),
('Google', 'sjhfdjsdhf', 'fshjdhsdj ', '2022-05-04', 'in-person', 'dsfdsfds', 'testing3'),
('Google', 'sfakdhfd', 'fksdjhds', '2022-05-20', 'in-person', 'dsfsdfsd', 'testing3'),
('Google', 'fjdshfd s', 'kdhfjdshf', '2022-05-15', 'in-person', 'fsdfss', 'testing3');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `workLocation` text NOT NULL,
  `comments` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`company`, `location`, `jobTitle`, `date`, `workLocation`, `comments`, `username`) VALUES
('NCR', 'ATL', 'SWE Intern', '2022-04-02', 'in-person', 'part 2', 'Raymond'),
('NCR', 'Atlanta', 'SWE', '2022-04-04', 'in-person', 'hello', 'Raymond'),
('Micro', 'ATL', 'SWE', '2022-03-24', 'in-person', 'hi', 'Raymond'),
('google', 'atl', 'swe', '2022-04-13', 'in-person', 'hi', 'Raymond'),
('NCR', 'Atlanta', 'SWE', '2022-04-18', 'unclear', 'another one', 'Raymond'),
('google', 'Cali', 'swe', '2022-04-11', 'in-person', 'cool2', 'Raymond'),
('google', 'Atlanta', 'swe', '2022-04-21', 'in-person', 'cool2', 'Raymond'),
('google', 'Montana', 'swe', '2022-04-10', 'in-person', 'cool2', 'Raymond');

-- --------------------------------------------------------

--
-- Table structure for table `rejections`
--

CREATE TABLE `rejections` (
  `company` text NOT NULL,
  `location` text NOT NULL,
  `jobTitle` text NOT NULL,
  `date` date NOT NULL,
  `comments` text NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejections`
--

INSERT INTO `rejections` (`company`, `location`, `jobTitle`, `date`, `comments`, `username`) VALUES
('Google', 'Atlanta', 'SWE', '0000-00-00', 'in ur dreamsssss', 'Raymond'),
('Google', 'ATL', 'SWE', '0000-00-00', 'nice.', 'Raymond');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `priority` int(11) NOT NULL,
  `company` text NOT NULL,
  `location` text NOT NULL,
  `jobTitle` text NOT NULL,
  `date` text NOT NULL,
  `workLocation` text NOT NULL,
  `comments` text NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`username`, `password`, `email`, `reset_token`) VALUES
('raymo', 'password123', 'raymo@email.com', ''),
('test', 'testpw123', 'test@email.com', ''),
('test2', '$2y$10$3T88ovNG/85GIRrj0QBwKulNNb//CVNFY8Nmiye0aZJxreRNjjgre', 'test@gmail.com', ''),
('test4', '$2y$10$20nvcnZihqPWXrNUonwm0ugrf3Iaxscc0jb9SutoXZ7SDhdww.D9i', 'test4@gmail.com', ''),
('test3', '$2y$10$xXHHO6tv1JnPOpqOubtgEO.fei2.5UhcQ4xCbSCVe257B/VZUm6pO', 'test3@gmail.com', ''),
('test6', '$2y$10$CCFdicRNIGKaX0mPF32SOuenvKcj6UwWKGE2/2.KJ8b9HSIKvKQhG', 'test6@gmail.com', ''),
('test9', '$2y$10$wkMX.LIHuu6bNcFBTfA4OeXZySXqYkJWTQZlzs3lWmWuMD3Gnxjb2', 'test9@email.com', ''),
('Raymond', '$2y$10$qNvhcRrG99r9mHLDBVQX5e0kfQu9YpT2QtnhKoVRf5ienkLIW7fum', 'rjf21434@uga.edu', '1651353871bb113c5509077ba714043691de9389b6'),
('testing', '$2y$10$T8yM6M3MDGOxiFROC9g35OBZIPyzEEx/ui4ODN5Yul00q71tsFgHS', 'raymondfeckoury@icloud.com', '16513540627a4d6853a9f967c7d3957ff8c9fc59a1'),
('testing2', '$2y$10$NtVIxZN2LXiIyczzgCvW7egqs8W3iHAc3Azj6a32/Cla3/QzYGYqS', 'raymondfeckoury@icloud.com', ''),
('testing3', '$2y$10$dBHtQP.mb1AysXoOGOwx8OIpdAwLiG9dvC7RKfbZfRfc8BohF5IQy', 'email@email.com', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
