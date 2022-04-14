-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 07:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `chef` (
  `userid` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `repassword` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`userid`, `username`, `fullname`, `email`, `password`, `repassword`, `phone`, `address`, `dob`) VALUES
(1, 'rahman', 'rahman habib', 'rahmanh@outlook.com', 'rahman', 'rahman', '01756587110', 'Dhaka, 1200', '06-11-2000'),
(2, 'test', 'test', 'test@gmail.com', '$2y$10$fBZcrNMzEXndps0CujrRSeLknB3RgARYqYnvDqguMTjnWY8iN8Lie', '$2y$10$Ovr9EKC8q69dzBCFDjshUeQ06FXr3QYHe8VoG43p5oevSOQ3gImZC', '12345', 'Dhaka, 1200', '00-11-06');
 
-- Indexes for table `admin`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`userid`);
  
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `chef`
  MODIFY `userid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
