-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2022 at 07:40 PM
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
-- Database: `applicationOrganizer`
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
('NCR', 'Atlanta', 'SWE Intern', '2022-03-23', 'in-person', 'Really cool people.', 'user1'),
('Microsoft', 'Atlanta', 'SWE', '2022-04-15', 'remote', 'Apparently they have a really cool office here in ATL.', 'user1'),
('Google', 'Atlanta', 'SWE', '2022-03-26', 'unclear', 'Everyone is applying here haha.', 'user1'),
('CGI', 'Atlanta', 'SWE', '2022-04-23', 'hybrid', 'Seems like a good place to work ', 'user1'),
('Amazon', 'Seattle', 'SWE', '2022-04-10', 'unclear', 'Leetcode  ', 'user1'),
('Meta', 'Cali', 'SWE', '2022-04-12', 'in-person', 'stock is tanking ', 'user1'),
('NCR', 'Somewhere', 'SWE', '2022-04-16', 'in-person', 'would be cool', 'user1'),
('NCR', 'Somewhere else', 'swe', '2022-04-24', 'remote', 'this is a comment.', 'user1'),
('Meta', 'Seattle', 'swe', '2022-05-01', 'remote', 'this is a comment.', 'user1'),
('Startup 1', 'SF', 'SWE', '2022-04-17', 'in-person', 'Cool startup.', 'user1'),
('Startup 2', 'SF', 'SWE', '2022-04-17', 'in-person', 'Another cool startup', 'user1'),
('Startup 3', 'ATL', 'SWE', '2022-03-11', 'unclear', 'And another cool startup', 'user1'),
('Startup 1', 'ATL', 'SWE', '2022-04-23', 'in-person', 'Another location for the cool startup', 'user1'),
('Startup 2', 'Alabama', 'SWE', '2022-04-25', 'remote', 'Another location for another cool startup...', 'user1'),
('BigCommerce', 'Tenessee', 'Full Stack Engineer', '2022-03-17', 'remote', 'Revolutionizing commerce', 'user1'),
('Alfred', 'New York', 'Front end engineer', '2022-03-24', 'in-person', 'Real Estate company.', 'user1'),
('Ascent', 'Chicago', 'SWE', '2022-04-18', 'hybrid', 'Fintech company', 'user1'),
('Dandy', 'New York', 'Data Analysis', '2022-04-22', 'unclear', 'Health tech company, cool stuff', 'user1'),
('Workiva', 'Florida', 'SWE', '2022-04-23', 'in-person', 'Cloud software company', 'user1'),
('NCR', 'Atlanta', 'SWE', '2022-03-17', 'hybrid', 'Met them at a hackathon', 'user2'),
('CNA', 'Chicago', 'SWE', '2022-03-10', 'remote', 'Insurance company', 'user2'),
('8fig', 'Austin', 'SWE', '2022-03-18', 'in-person', 'Ecommerce company.', 'user2'),
('Striveworks', 'Austin', 'SWE', '2022-03-23', 'in-person', 'AI company', 'user2'),
('Vouch Insurance', 'Chicago', 'SWE', '2022-05-01', 'hybrid', 'Business insurance company', 'user2'),
('Yotpo', 'North Carolina', 'SWE', '2022-03-25', 'unclear', 'Marketing tech company', 'user2'),
('Benchling', 'San Francisco', 'SWE', '2022-03-26', 'in-person', 'Healthcare tech company', 'user2');

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

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`company`, `location`, `jobTitle`, `date`, `comments`, `username`) VALUES
('Company1', 'Atlanta', 'SWE', '2022-05-20', 'Get on the leetcode grind!', 'user1'),
('Company2', 'SF', 'SWE', '2022-05-15', 'Behavioral interview', 'user1'),
('Company3', 'Seattle', 'SWE', '2022-05-27', 'They like to ask system design questions.', 'user1');

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
('Company1', 'Atlanta', 'SWE', '2022-04-14', 'in-person', 'Cool opportunity', 'user1'),
('Company2', 'Seattle', 'SWE', '2022-04-16', 'in-person', 'The housing costs though..', 'user1'),
('Company3', 'SF', 'SWE', '2022-03-17', 'in-person', 'Negotiating salary', 'user1'),
('Company4', 'New York', 'SWE', '2022-03-12', 'unclear', 'Sounds like a good time', 'user1'),
('Torii', 'New York', 'SWE', '2022-04-05', 'remote', 'software focused company, about 40 employees', 'user2'),
('Jellyvision', 'Chicago', 'SWE', '2022-04-19', 'unclear', 'HR tech software', 'user2'),
('Wing', 'Palo Alto', 'SWE', '2022-03-10', 'remote', 'IOT company', 'user2'),
('Aurora Solar', 'Fully Remote', 'SWE', '2022-02-18', 'remote', 'Fully remote company focused on having a positive social impact. Competitive pay and a lot of benefits.', 'user2');

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
('Google ', 'SF', 'SWE', '2022-02-02', 'Very tough interviews', 'user1'),
('Meta', 'SF', 'SWE', '2022-03-17', 'Gave it a try', 'user1'),
('Invicti', 'Austin TX', 'SWE', '2022-03-16', 'cool software security company', 'user1'),
('Apollo', 'Fully Remote', 'Software Engineer', '2022-04-13', 'Seems like a good team', 'user1');

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

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`priority`, `company`, `location`, `jobTitle`, `date`, `workLocation`, `comments`, `username`) VALUES
(1, 'Syndigo', 'Atlanta', 'SWE', '2022-05-14', 'in-person', 'Focused on marketing tech and analytics. Make sure to emphasize personal project based on retail.', 'user1'),
(2, 'TravelPerk', 'Boston', 'SWE', '2022-05-21', 'in-person', 'IOT software company. Talk about experience traveling and personal project on the topic.', 'user1'),
(3, 'CodeSignal', 'Fully Remote', 'SWE', '2022-05-28', 'in-person', 'Very flexible work style. HR tech company. About 80 employees', 'user1');

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
('user1', '$2y$10$gFtUIbGuo0yCYaH3df9WaeXmYeSl7kfB7lRT3EXktZ3b2H8lsJiHG', 'raymondfeckoury@icloud.com', '16515131597a4d6853a9f967c7d3957ff8c9fc59a1'),
('user2', '$2y$10$Bhw8bwbpwqGPEaYLW.jmNekpAz5etHnJTh9IHomTq2UVljl.yd/3C', 'email@email.com', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;