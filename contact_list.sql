-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2013 at 10:36 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `contact_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Keluarga'),
(2, 'Teman Kampus'),
(3, 'Teman Kantor'),
(4, 'Teman Chating'),
(5, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`, `phone`, `address`, `category_id`) VALUES
(1, 'Anya', 'Anya@example.com', '0888776666', 'Kuningan, Jawa Barat', 1),
(2, 'Putri', 'Putri@example.com', '0787855666', 'Tuban, Surabaya', 1),
(3, 'Heru', 'Heru@example.com', '088888655555', 'Jakarta', 5),
(4, 'Chester', 'Chester@example.com', '088127387878', 'Bali', 3),
(5, 'Giens', 'Giens@example.com', '0888976767677', 'Bandung', 4),
(6, 'Tatang', 'Tatang@example.com', '0854456566', 'Ciamis', 3),
(7, 'Yusuf', 'Yusuf@example.com', '0886666666', 'Ciamis', 4),
(8, 'Tauhidi', 'Tauhidi@example.com', '08866544366', 'jakarta', 3),
(9, 'Mita', 'Mita@example.com', '085544444', 'Surabaya', 3),
(10, 'Natasya', 'Natasya@example.com', '085555556677', 'Kuningan', 1),
(11, 'Abdul Ghani', 'Abdul Ghani@example.com', '085555577', 'Karawang', 5),
(12, 'Doni', 'Doni@example.com', '08787866767', 'Jakarta', 3),
(13, 'Jono', 'Jono@example.com', '878766887', 'Yogyakarta', 4),
(14, 'Salim', 'Salim@example.com', '087878766', 'Ciamis', 4),
(15, 'Sodiq', 'Sodiq@example.com', '08655787887878', 'Semarang', 5),
(16, 'Mita', 'Mita@example.com', '08777464646', 'Yogyakarta', 4),
(18, 'Hasan', 'hasan@example.com', '08787878', 'Jakarta', 3),
(19, 'Jaja', 'jaja@example.com', '087878787', 'Jakarta', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
