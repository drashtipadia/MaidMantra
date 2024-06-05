-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2023 at 06:49 AM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`) VALUES
(1, 'admin', '123'),
(2, 'drashti', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `comQ_id_list` varchar(100) NOT NULL,
  `comQ_val_list` varchar(100) NOT NULL,
  `speQ_id_list` varchar(100) NOT NULL,
  `speQ_val_list` varchar(100) NOT NULL,
  `sal_id` int(11) NOT NULL,
  `maid_id` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `card_name` varchar(50) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `card_cvv` varchar(3) DEFAULT NULL,
  `card_expirydate` date DEFAULT NULL,
  `bookingdate` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `service_Id` int(11) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `maid_id` (`maid_id`),
  KEY `sal_id` (`sal_id`),
  KEY `ID` (`ID`),
  KEY `service_Id` (`service_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `comQ_id_list`, `comQ_val_list`, `speQ_id_list`, `speQ_val_list`, `sal_id`, `maid_id`, `ID`, `card_name`, `card_number`, `card_cvv`, `card_expirydate`, `bookingdate`, `status`, `Amount`, `service_Id`) VALUES
(1, '1,2,3,4,5', 'Female,2023-09-21,10:00,1,maninager bus stop', '1', '2 year', 1, 1, 1, 'darshti padia', '1234567887456321', '123', '2023-11-01', '2023-09-06', 'Done', 150, 1),
(2, '1,2,3,4,5', 'Any,2023-10-03,12:00,2,maninager bus stop', '1', '2 year', 2, NULL, 3, NULL, NULL, NULL, NULL, '2023-09-07', NULL, NULL, 1),
(3, '1,2,3,4,5', 'Female,2023-11-12,12:00,1,lal darvaja', '3,5,6,9', '1,lanch,veg,with Utensil', 2, 17, 5, NULL, NULL, NULL, NULL, '2023-09-13', 'approved', NULL, 2),
(4, '1,2,3,4,5', 'Any,2023-10-21,11:00,3,maninager bus stop', '2,7', '2 bhk,Ground floor', 2, 10, 4, NULL, NULL, NULL, NULL, '2023-09-13', NULL, NULL, 3),
(5, '1,2,3,4,5', 'Any,2023-10-24,08:00,5,neharunagar ', '4', 'etc', 2, 21, 2, NULL, NULL, NULL, NULL, '2023-09-13', NULL, NULL, 4),
(6, '1,2,3,4,5', 'Any,2023-10-10,12:00,2,maninager bus stop', '1', '2 year', 1, 14, 1, 'darshti padia', '1234567812345678', '123', '2023-10-10', '2023-09-15', 'Done', 300, 1);

-- --------------------------------------------------------

--
-- Table structure for table `commonquestion`
--

DROP TABLE IF EXISTS `commonquestion`;
CREATE TABLE IF NOT EXISTS `commonquestion` (
  `que_id` int(11) NOT NULL AUTO_INCREMENT,
  `que_description` varchar(50) NOT NULL,
  `que_value` varchar(100) DEFAULT NULL,
  `que_val_type` varchar(20) NOT NULL,
  PRIMARY KEY (`que_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commonquestion`
--

INSERT INTO `commonquestion` (`que_id`, `que_description`, `que_value`, `que_val_type`) VALUES
(1, 'Maid Gender', 'Male,Female,Any', 'radio'),
(2, 'Date', '', 'date'),
(3, 'Time', '', 'time'),
(4, 'Days', '', 'number'),
(5, 'Address', '', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `contactuser`
--

DROP TABLE IF EXISTS `contactuser`;
CREATE TABLE IF NOT EXISTS `contactuser` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_name` varchar(20) NOT NULL,
  `con_number` varchar(10) NOT NULL,
  `con_location` varchar(20) NOT NULL,
  `con_time` varchar(20) NOT NULL,
  `service_Id` int(11) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `contactuser_ibfk_1` (`service_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactuser`
--

INSERT INTO `contactuser` (`con_id`, `con_name`, `con_number`, `con_location`, `con_time`, `service_Id`) VALUES
(1, 'jhon', '9632587410', 'Narol', '8 Hours', 3),
(2, 'Het Mehta', '8521479630', 'Paldi', '3 Hours', 2),
(4, 'Nisha Shrma', '5263417890', 'Navrangpura', '6 Hours', 1),
(5, 'Manaya Roy', '8529614750', 'Paldi', '12 Hour', 4),
(6, 'Parv Patel', '8521479630', 'Isanpur', '3 Hours', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `feed_name` varchar(20) NOT NULL,
  `feed_email` varchar(30) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `feed_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `feed_name`, `feed_email`, `feedback`, `feed_status`) VALUES
(1, 'Jay Padia', 'j@gmail.com', 'We had a good experience with Maid Mantra. The proprietor is professional and reliable. He understands our needs and accordingly provides maid as per the requirement. We have to be clear with our requirements. ', 'True'),
(2, 'Mahi', 'm@gmail.com', 'When I heard maid mantra has launched maid services in Ahemdabad I was super excited and tried them. My friends inAhemdabad had used their services', 'True'),
(3, 'Nisha', 'n@gmail.cm', 'Good Serviec, maid behaviour is very nice..\r\nWoek very carely done', 'True'),
(4, 'neha', 'n@gmaul.com', 'good service provide, cleaning service is best..', NULL),
(5, 'xswxw', 'csac@gmail.com', 'cdeecec', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `service_Id` int(11) NOT NULL,
  PRIMARY KEY (`info_id`),
  KEY `service_Id` (`service_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `title`, `details`, `image`, `service_Id`) VALUES
(1, 'Cooking', '<h2>Cooking service</h2>\r\n<p>\r\nHiring an ideal cook is not an easy Job! the cook needs to understand your tastes, preferences & also your way of cooking meals. \r\nDomestic cook is all about that, making the dishes as per your style, taste & preference. You can rely on Maid Mantra to find that right cook for your household. \r\nWe can find you all types of cooks as per your requirement be it a Maharaj, North Indian, South Indian, Jain, Bengali etc. \r\nPlease note that while we try our best to find you the right cook who meets your requirement, \r\nwe advise you to guide the cook during the initial days to help the cook prepare meals suited best for your familys taste.\r\n</p>\r\n<h5> You can expect the following work activities form them:</h5>\r\n<li> with utensils</li> \r\n<li>without utensils</li> \r\n<li>clean kitchan</li>\r\n<h5>Five Qualities of a Good Maid</h5>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'info-cook.webp', 2),
(2, 'Baby-sitter', '<h2>Babysitter service</h2>\r\n<p>\r\nBeing a parent, who you choose to take care of your child when you are away is a very important decision to make& we understand that completely. \r\nMaid Mantra is here to simplify that decision and help you hire the right nurturing caretaker for your baby.\r\nBe it a caretaker for your newborn or a caretaker for your growing baby we can help you with your requirement. \r\nA caretaker is perfect not just when she is nurturing but also when she is fitting right into your home & family.\r\n With our experience of helping hundreds of families find the right caretaker for their households, we are confident we will be able to provide you the right choices to hire.</p>\r\n<h5> You can expect the following work activities form them:</h5>\r\n<li> Baby-meassage</li>\r\n<li>baby-wrap</li>\r\n<li>baby-bath</li>\r\n<h5>Five Qualities of a Good Maid</h5>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'info-babysitter.webp', 1),
(3, 'Cleaning Service', '<h2>Cleaning service</h2>\r\n<p>\r\nNearly all homes have regular chores like sweeping, cleaning the floor, and cleaning the kitchen, laundry and cleaning bathrooms. \r\nThese chores are necessary but they can take up a lot of your time and time is what people are short of in the metro cities. \r\nIn a city like Ahemdabad, busy schedules of working professionals make it impossible for them to work and also maintain the house.\r\nThat is the reason majority of them opt for maids who maintain their houses and provide more than what they would possibly do on their own.\r\n</p>\r\n<h5> You can expect the following work activities form them:</h5>\r\n<li> Floor sweeping & cleaning</li>\r\n<li>Cleaning bathroom/washrooms</li>\r\n<h5>Five Qualities of a Good Maid</h5>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'info-clean.jpg', 3),
(4, 'Elder Care', '<h2>Elder care service</h2>\r\n<p>\r\nElder care or care for the elderly refers to fulfilling special needs of senior citizens.\r\n Senior citizens today means aged parents, elderly destitute people, the homeless and others of old age who may be infirm or ill.\r\nYou will have a lot of peace of mind if you know and recognize that you can rely on professionally run elder care services caretaker at home to look after the aged members of your family who cannot take care of their needs on their own. \r\nYou will then be able to focus on work and also on the needs of other members of the family as well.\r\n</p>\r\n<h5> Our maids are experienced in providing a complete range of nursing care specializations like</h5>\r\n<li>Cardiac & Respiratory Care<li>\r\n<li>Post operative care</li>\r\n<h5>Five Qualities of a Good Maid</h5>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'info-elder.webp', 4);

-- --------------------------------------------------------

--
-- Table structure for table `maids`
--

DROP TABLE IF EXISTS `maids`;
CREATE TABLE IF NOT EXISTS `maids` (
  `maid_id` int(11) NOT NULL AUTO_INCREMENT,
  `maid_name` varchar(30) NOT NULL,
  `maid_age` varchar(30) NOT NULL,
  `maid_gender` varchar(30) NOT NULL,
  `maid_number` varchar(30) NOT NULL,
  `maid_picture` varchar(100) NOT NULL,
  `maid_status` varchar(50) DEFAULT NULL,
  `service_Id` int(11) NOT NULL,
  PRIMARY KEY (`maid_id`),
  KEY `service_Id` (`service_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maids`
--

INSERT INTO `maids` (`maid_id`, `maid_name`, `maid_age`, `maid_gender`, `maid_number`, `maid_picture`, `maid_status`, `service_Id`) VALUES
(1, 'Rekha Sharma', '41', 'female', '9874563210', 'images (10).jpg', 'Availble', 1),
(2, 'Mohan Gupta', '26', 'male', '9871234560', 'download (2).jpg', 'Availble', 2),
(3, 'Pooja Mehta', '26', 'female', '9874125630', 'download (3).jpg', 'Availble', 3),
(4, 'Nisha mehra', '24', 'female', '9632014578', 'download (4).jpg', 'Availble', 4),
(5, 'Darsh John', '31', 'male', '9632058741', 'maid-image-2.jpg', 'Availble', 4),
(6, 'Rudra Shrma', '29', 'male', '9674581230', 'download (5).jpg', 'Availble', 3),
(7, 'Smit Modi', '30', 'male', '9614785230', 'images (3).jpg', 'Availble', 4),
(8, 'Jay Agarwal', '24', 'male', '9745863201', 'images (6).jpg', 'Availble', 2),
(9, 'Arjun Prohit', '25', 'male', '9457863210', 'maid-image.jpg', 'Availble', 2),
(10, 'Rishi Bhatt', '28', 'male', '9124578630', 'images (8).jpg', 'Availble', 3),
(11, 'Aditi Chopra', '23', 'female', '9120358745', 'images (1).jpg', 'Availble', 1),
(12, 'Bimala Chawla', '36', 'female', '987410456', 'images (2).jpg', 'Booked', 2),
(13, 'Daksha  Das', '26', 'female', '9245786310', 'image-1.jpg', 'Availble', 3),
(14, 'Divya Goel', '27', 'female', '8632541790', 'images (7).jpg', 'Booked', 1),
(15, 'Ekta Joshi', '25', 'female', '9652078314', 'images (9).jpg', 'Availble', 1),
(16, 'Garima Mehra', '25', 'female', '9321065874', 'images (11).jpg', 'Availble', 1),
(17, 'Hiral Khatri', '27', 'female', '6325417890', 'images (13).jpg', 'Availble', 2),
(18, '	Ishani Nayak', '32', 'female', '7523698410', 'images (12).jpg', 'Availble', 3),
(19, 'Krisha Rana', '26', 'female', '7896325410', 'download (3).jpg', 'Availble', 1),
(20, 'Parth Seth', '26', 'male', '7521489630', 'maid-image-3.jpg', 'Availble', 4),
(21, 'Niharika Sheth', '36', 'female', '8521479630', 'maid3.jfif', 'Availble', 4);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(20) NOT NULL,
  `p_info` varchar(2000) NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `service_Id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `service_Id` (`service_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`p_id`, `p_title`, `p_info`, `p_image`, `service_Id`) VALUES
(1, 'Baby-sitter', '<heading>Babysitter service</heading>\r\n<h1>10% discount in </h1>\r\n<p>\r\nBeing a parent, who you choose to take care of your child when you are away is a very important decision to make& we understand that completely. \r\nMaid Mantra is here to simplify that decision and help you hire the right nurturing caretaker for your baby.\r\nBe it a caretaker for your newborn or a caretaker for your growing baby we can help you with your requirement. \r\nA caretaker is perfect not just when she is nurturing but also when she is fitting right into your home & family.\r\n With our experience of helping hundreds of families find the right caretaker for their households, we are confident we will be able to provide you the right choices to hire.</p>\r\n<p> You can expect the following work activities form them:</p>\r\n<li> Baby-meassage</li>\r\n<li>baby-wrap</li>\r\n<li>baby-bath</li>\r\n<h6>Five Qualities of a Good Maid</h6>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'babysitter.webp', 1),
(2, 'Cooking', '<heading>Cooking service</heading>\r\n<h1>10% discount in </h1>\r\n<p>\r\nHiring an ideal cook is not an easy Job! the cook needs to understand your tastes, preferences & also your way of cooking meals. \r\nDomestic cook is all about that, making the dishes as per your style, taste & preference. You can rely on Maid Mantra to find that right cook for your household. \r\nWe can find you all types of cooks as per your requirement be it a Maharaj, North Indian, South Indian, Jain, Bengali etc. \r\nPlease note that while we try our best to find you the right cook who meets your requirement, \r\nwe advise you to guide the cook during the initial days to help the cook prepare meals suited best for your familys taste.\r\n</p>\r\n<p> You can expect the following work activities form them:</p>\r\n<li> with utensils</li>\r\n<li> without utensils </li>\r\n<li>clean kitchan</li>\r\n<h6>Five Qualities of a Good Maid</h6>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'cook.jpg', 2),
(3, 'Cleaning', '<heading>Cleaning service</heading>\r\n<h1>10% discount in </h1>\r\n<p>\r\nNearly all homes have regular chores like sweeping, cleaning the floor, and cleaning the kitchen, laundry and cleaning bathrooms. \r\nThese chores are necessary but they can take up a lot of your time and time is what people are short of in the metro cities. \r\nIn a city like Ahemdabad, busy schedules of working professionals make it impossible for them to work and also maintain the house.\r\nThat is the reason majority of them opt for maids who maintain their houses and provide more than what they would possibly do on their own.\r\n</p>\r\n<p> You can expect the following work activities form them:</p>\r\n<li> Floor sweeping & cleaning,Cleaning bathroom/washrooms</li>\r\n<li> Cleaning bathroom/washrooms</li>\r\n<h6>Five Qualities of a Good Maid</h6>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'clean.jpg', 3),
(4, 'Elder Care', '<heading>Elder care service</heading>\r\n<h1>10% discount on this package</h1>\r\n<p>\r\nElder care or care for the elderly refers to fulfilling special needs of senior citizens.\r\n Senior citizens today means aged parents, elderly destitute people, the homeless and others of old age who may be infirm or ill.\r\nYou will have a lot of peace of mind if you know and recognize that you can rely on professionally run elder care services caretaker at home to look after the aged members of your family who cannot take care of their needs on their own. \r\nYou will then be able to focus on work and also on the needs of other members of the family as well.\r\n</p>\r\n<p> Our maids are experienced in providing a complete range of nursing care specializations like</p>\r\n<li>Cardiac & Respiratory Care</li>\r\n<li>Post operative care</li>\r\n<li>other dieses</li>\r\n<h6>Five Qualities of a Good Maid</h6>\r\n<li>Hardworking</li>\r\n<li>Detail oriented</li>\r\n<li>Ownership Mindset</li>\r\n<li>Resilience</li>\r\n<li>Shows Empathy</li>', 'info-elder.webp', 4);

-- --------------------------------------------------------

--
-- Table structure for table `packagebooking`
--

DROP TABLE IF EXISTS `packagebooking`;
CREATE TABLE IF NOT EXISTS `packagebooking` (
  `pb_id` int(11) NOT NULL AUTO_INCREMENT,
  `pcomq_ids` varchar(50) NOT NULL,
  `pcomq_values` varchar(100) NOT NULL,
  `pspeq_ids` varchar(50) NOT NULL,
  `pspeq_values` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `sal_id` int(11) NOT NULL,
  `maid_id` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `p_cardname` varchar(50) DEFAULT NULL,
  `p_cardnumber` varchar(16) DEFAULT NULL,
  `p_cardcvv` varchar(3) DEFAULT NULL,
  `p_cardexpiry` date DEFAULT NULL,
  `pbookingdate` date NOT NULL,
  `p_status` varchar(20) DEFAULT NULL,
  `p_amount` int(11) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`pb_id`),
  KEY `ID` (`ID`),
  KEY `maid_id` (`maid_id`),
  KEY `sal_id` (`sal_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packagebooking`
--

INSERT INTO `packagebooking` (`pb_id`, `pcomq_ids`, `pcomq_values`, `pspeq_ids`, `pspeq_values`, `month`, `sal_id`, `maid_id`, `ID`, `p_cardname`, `p_cardnumber`, `p_cardcvv`, `p_cardexpiry`, `pbookingdate`, `p_status`, `p_amount`, `p_id`) VALUES
(1, '1,2,3,5', 'Female,2023-10-06,10:00,maninage', '3,5,6,9', '2,breakfast,nonveg,with Utensil', 2, 4, 12, 2, 'neha', '8765432112345678', '963', '2023-09-10', '2023-09-06', 'Done', 48600, 2),
(5, '1,2,3,5', ',,', '2,7', '', 1, 4, 18, 3, NULL, NULL, NULL, NULL, '2023-09-10', NULL, NULL, 3),
(6, '1,2,3,5', ',,', '2,7', '', 1, 4, NULL, 3, NULL, NULL, NULL, NULL, '2023-09-10', NULL, NULL, 3),
(7, '1,2,3,5', '2023-10-11,11:00,maninage', '2,7', '2 bhk,Ground floor', 1, 4, NULL, 3, NULL, NULL, NULL, NULL, '2023-09-10', NULL, NULL, 3),
(8, '1,2,3,5', 'Female,2023-09-14,09:00,isanpur', '1', '2 year', 1, 1, 19, 6, NULL, NULL, NULL, NULL, '2023-09-13', NULL, NULL, 1),
(9, '1,2,3,5', 'Male,2023-10-07,10:00,maninager bus stop', '4', 'etc', 1, 4, 7, 5, NULL, NULL, NULL, NULL, '2023-09-13', NULL, NULL, 4),
(10, '1,2,3,5', 'Any,2023-09-27,22:00,jetpur', '3,5,6,9', '3,lanch,veg,without Utensil', 1, 3, 9, 1, NULL, NULL, NULL, NULL, '2023-09-16', 'approved', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `sal_id` int(11) NOT NULL AUTO_INCREMENT,
  `hours` varchar(20) NOT NULL,
  `Salary` int(100) NOT NULL,
  PRIMARY KEY (`sal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `hours`, `Salary`) VALUES
(1, '3 Hours', 500),
(2, '6 Hours', 750),
(3, '8 Hours', 1000),
(4, '12 Hour', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `service_Id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(20) NOT NULL,
  PRIMARY KEY (`service_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_Id`, `service_name`) VALUES
(1, 'Baby-sitter'),
(2, 'Cooking'),
(3, 'Cleaning'),
(4, 'Elder Care');

-- --------------------------------------------------------

--
-- Table structure for table `specificquestion`
--

DROP TABLE IF EXISTS `specificquestion`;
CREATE TABLE IF NOT EXISTS `specificquestion` (
  `speQ_id` int(11) NOT NULL AUTO_INCREMENT,
  `speQ_name` varchar(50) NOT NULL,
  `speQ_value` varchar(100) NOT NULL,
  `service_Id` int(11) NOT NULL,
  PRIMARY KEY (`speQ_id`),
  KEY `service_Id` (`service_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specificquestion`
--

INSERT INTO `specificquestion` (`speQ_id`, `speQ_name`, `speQ_value`, `service_Id`) VALUES
(1, 'Age', '0-1 year,2 year,3-4 year,4 to up', 1),
(2, 'House Size', '1bhk,2 bhk, 3 bhk,4bhk', 3),
(3, 'Person', '1,2,3,4,5,5-7', 2),
(4, 'diease', 'cancer,peralysis,kidney problem,etc', 4),
(5, 'Meal par day', 'breakfast,lanch,dinner', 2),
(6, 'food type', 'veg,nonveg,veg & nonveg', 2),
(7, 'floor', 'Ground floor,1st floor,2nd floor,3floor', 3),
(9, 'cook service include', 'with Utensil,without Utensil', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `number`, `email`, `gender`, `password`) VALUES
(1, 'Drashti', '1478523690', 'd@gmail.com', 'female', '123'),
(2, 'Neha Shrma', '9632587410', 'neha@gmail.com', 'female', 'neha123'),
(3, 'Jay patel', '3698521470', 'jay@gmail.com', 'male', 'jay123'),
(4, 'Misha Mehra', '9874563510', 'misha@gmail.com', 'female', 'misha@1'),
(5, 'john devid', '9633274185', 'john@gmail.com', 'male', 'j123'),
(6, 'riya patel', '8347365260', 'riya2@gmail.com', 'female', 'riya2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`maid_id`) REFERENCES `maids` (`maid_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`sal_id`) REFERENCES `salary` (`sal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`service_Id`) REFERENCES `service` (`service_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contactuser`
--
ALTER TABLE `contactuser`
  ADD CONSTRAINT `contactuser_ibfk_1` FOREIGN KEY (`service_Id`) REFERENCES `service` (`service_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`service_Id`) REFERENCES `service` (`service_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maids`
--
ALTER TABLE `maids`
  ADD CONSTRAINT `maids_ibfk_1` FOREIGN KEY (`service_Id`) REFERENCES `service` (`service_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`service_Id`) REFERENCES `service` (`service_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packagebooking`
--
ALTER TABLE `packagebooking`
  ADD CONSTRAINT `packagebooking_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `packagebooking_ibfk_2` FOREIGN KEY (`maid_id`) REFERENCES `maids` (`maid_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `packagebooking_ibfk_3` FOREIGN KEY (`sal_id`) REFERENCES `salary` (`sal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `packagebooking_ibfk_4` FOREIGN KEY (`p_id`) REFERENCES `package` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specificquestion`
--
ALTER TABLE `specificquestion`
  ADD CONSTRAINT `specificquestion_ibfk_1` FOREIGN KEY (`service_Id`) REFERENCES `service` (`service_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
