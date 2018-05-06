-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2017 at 01:09 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nucatalo_nuCatNewDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `address` blob NOT NULL,
  `tin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `year_of_inception` varchar(10) NOT NULL,
  `categories` blob NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  `activation_date` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `buyer_name`, `business_name`, `address`, `tin`, `pan`, `phone`, `mobile`, `office`, `year_of_inception`, `categories`, `email`, `password`, `status`, `reg_date`, `activation_date`, `updated_by`, `updated_on`) VALUES
(1, 'VIKAS', 'Chopra exports', 0x4c616c206275696c64696e67, '25896541231', '123ZXCVFS', '', '9886899159', '55632222', '1985', 0x4d454e204554484e49432057454152, 'vikas11chopra@gmail.com', '11b4c47969c869ba4dc703bb9448922c', '1', '2017-07-24 17:32:36', '2017-07-31 19:34:23', 'VIKAS', '2017-07-31 19:40:26'),
(2, 'Prakash jain', 'premdeep garments', 0x6e6f20372c20626865727520636f6d706c65782c20286c616c206275696c64696e67292c206d616d756c7065742c2062616e67616c6f726520353630303533, '29aaaaa1111aabc', 'aaaaa1111a', '', '9900960591', '08022259727', '1996', 0x4d454e2c20574f4d454e2c204b494453, 'prakashjainmail@gmail.com', '73803249c6667c5af2d51c0dedfae487', '1', '2017-07-24 21:05:26', '2017-07-24 21:06:58', 'Prakash jain', '2017-09-20 18:41:25'),
(3, 'Basavaraj', 'clothing', 0x746573742061646472657373, 'ghghj568hjkb', 'vhhvj1234j', '', '9686562658', '', '2016', 0x476a68, 'basu.belgaum@gmail.com', '582b6b981a58f3c6d1511756722f9a00', '1', '2017-07-28 11:26:26', '2017-08-01 19:01:10', 'Nucatalog', '2017-08-01 19:01:10'),
(4, 'Basavaraj', 'clothing', 0x746573742061646472657373, 'ghghj568hjkb', 'vhhvj1234j', '', '9686567064', '', '2016', 0x476a68, 'basavaraj.superfast@gmail.com', 'a477cff422c4f121890ec5b40d87f07e', '1', '2017-07-28 11:28:50', '2017-08-01 19:00:52', 'Nucatalog', '2017-08-01 19:00:52'),
(5, 'siddu', 'cciipp', 0x76696a61796e61676172, '123', '321', '', '9743665506', '2121', '2017', 0x61616161, 'siddu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2017-07-28 11:37:06', '2017-07-28 13:45:37', 'siddu', '2017-07-31 18:50:25'),
(6, 'VIKAS', 'Chopra exports', 0x4c616c206275696c64696e67, '29ASKGKKFGJD1ZQ', 'ASKGKKFGJD1', '', '9986419579', '08040900446', '1985', 0x5348495254532c20542e5348495254532c204554484e49432057454152, 'nishachopra05@gmail.com', 'bb1208535ef8d53ca61dd6498ddd880d', '1', '2017-07-28 12:21:35', '2017-07-31 19:33:28', 'Nucatalog', '2017-07-31 19:33:28'),
(7, 'Test', 'Test', 0x54657374, '123', '123', '', '7676304305', '1233', '1662', 0x477a68736a6a73, 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '1', '2017-07-29 15:19:57', '2017-07-29 15:20:38', 'Test', '2017-07-29 15:49:42'),
(8, 'SURESH', 'SURESH CO', 0x4c616c206275696c64696e67, '29ASDFGHOKZQ', 'ASDFGH12WZ2', '', '9945787245', '22257957', '1991', 0x5348455257414e49, 'TINADILU2230@GMAIL.COM', '77ef23562f494768a1e09c76608ac6e7', '1', '2017-08-10 14:48:19', '2017-08-10 14:51:50', 'Nucatalog', '2017-08-10 14:51:50'),
(9, '123', '123', 0x313233, '123', '123', '', '1234567890', '123456789', '1234', 0x64646464, 'testing@gmail.com', '6c139b5050cb8d06c51213d5f5a5b3a0', '2', '2017-09-16 12:13:18', '0000-00-00 00:00:00', '', '2017-09-16 12:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `parent_category_id` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_category_id`, `status`, `updated_by`, `updated_on`) VALUES
(1, 'MEN', '0', 1, 'Nucatalog', '2017-07-24 21:35:02'),
(2, 'WOMEN', '0', 1, 'Nucatalog', '2017-07-24 21:35:25'),
(3, 'BOYS', '0', 1, 'Nucatalog', '2017-07-24 21:38:47'),
(4, 'GIRLS', '0', 1, 'Nucatalog', '2017-07-24 21:39:07'),
(5, 'CASUAL SHIRTS', '1', 1, 'Nucatalog', '2017-07-24 21:42:37'),
(8, 'FORMAL SHIRTS', '1', 1, 'Nucatalog', '2017-07-24 21:42:59'),
(9, 'JEANS', '1', 1, 'Nucatalog', '2017-07-24 21:43:15'),
(10, 'COTTON TROUSERS', '1', 1, 'Nucatalog', '2017-07-24 21:43:34'),
(11, 'T-SHIRTS', '1', 1, 'Nucatalog', '2017-07-24 21:43:59'),
(12, 'JEANS', '2', 1, 'Nucatalog', '2017-07-24 21:44:21'),
(13, 'TOPS,T-SHIRTS & SHIRTS', '2', 1, 'Nucatalog', '2017-07-24 21:45:15'),
(14, 'KURTI &TUNICS', '2', 1, 'Nucatalog', '2017-07-24 21:45:48'),
(15, 'LEGGINGS', '2', 1, 'Nucatalog', '2017-07-24 21:46:27'),
(16, 'CHUDIDARS', '2', 1, 'Nucatalog', '2017-07-24 21:46:54'),
(17, 'SAREES', '2', 1, 'Nucatalog', '2017-07-24 21:47:05'),
(18, 'INFANT', '0', 1, 'Nucatalog', '2017-07-27 17:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `updated_by`, `updated_on`) VALUES
(1, 'WHITE', 'Nucatalog', '2017-07-24 21:54:08'),
(2, 'BLACK', 'Nucatalog', '2017-07-24 21:54:18'),
(3, 'RED', 'Nucatalog', '2017-07-24 21:54:24'),
(4, 'GREEN', 'Nucatalog', '2017-07-24 21:54:33'),
(5, 'YELLOW', 'Nucatalog', '2017-07-24 21:54:43'),
(6, 'BLUE', 'Nucatalog', '2017-07-24 21:54:54'),
(7, 'BROWN', 'Nucatalog', '2017-07-24 21:55:11'),
(8, 'CREAM', 'Nucatalog', '2017-07-24 21:55:20'),
(9, 'GREY', 'Nucatalog', '2017-07-24 21:55:35'),
(10, 'ORANGE', 'Nucatalog', '2017-07-24 21:55:42'),
(11, 'PINK', 'Nucatalog', '2017-07-24 21:55:49'),
(12, 'PURPLE', 'Nucatalog', '2017-07-24 21:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_leads`
--

CREATE TABLE IF NOT EXISTS `contact_form_leads` (
  `contact_form_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_form_name` varchar(255) NOT NULL,
  `contact_form_email_id` varchar(255) NOT NULL,
  `contact_form_subjet` varchar(400) NOT NULL,
  `contact_form_message` text NOT NULL,
  `contact_form_lead_date` date NOT NULL,
  PRIMARY KEY (`contact_form_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `contact_form_leads`
--

INSERT INTO `contact_form_leads` (`contact_form_id`, `contact_form_name`, `contact_form_email_id`, `contact_form_subjet`, `contact_form_message`, `contact_form_lead_date`) VALUES
(1, 'safasef', 'asdfasd@gmail.com', 'dszvsdv', 'sdvsdv', '0000-00-00'),
(2, 'safasef', 'asdfasd@gmail.com', 'dszvsdv', 'sdvsdv', '0000-00-00'),
(14, 'sfwsfaaaaaaaaaaa', 'sdfs@fdg.com', 'xfvdxfc', 'xcvxv', '0000-00-00'),
(13, 'sdfsd', 'sdfsdf@dg.com', 'zxcvvzx', 'zxvzxv', '0000-00-00'),
(12, 'sdfsd', 'sdfsdf@dg.com', 'zxcvvzx', 'zxvzxv', '0000-00-00'),
(11, 'sdfsd', 'sdfsdf@dg.com', 'zxcvvzx', 'zxvzxv', '0000-00-00'),
(10, 'sdfsd', 'sdfsdf@dg.com', 'zxcvvzx', 'zxvzxv', '0000-00-00'),
(9, 'sdfsd', 'sdfsdf@dg.com', 'zxcvvzx', 'zxvzxv', '0000-00-00'),
(15, 'sfwsfaaaaaaaaaaa', 'sdfs@fdg.com', 'xfvdxfc', 'xcvxv', '0000-00-00'),
(16, 'sfwsfaaaaaaaaaaa', 'sdfs@fdg.com', 'xfvdxfc', 'xcvxv', '0000-00-00'),
(17, 'sfwsfaaaaaaaaaaa', 'sdfs@fdg.com', 'xfvdxfc', 'xcvxv', '0000-00-00'),
(18, 'sfwsfaaaaaaaaaaa', 'sdfs@fdg.com', 'xfvdxfc', 'xcvxv', '0000-00-00'),
(19, 'Winston Redford', 'w@thefirstpageplan.com', 'Quick question about your site..', 'I went through http://nucatalog.com yesterday, I just wondered if youve done any search engine marketing yet this year. I am self employed doing that for various businesses for a number of years now, I feed my family doing it so I wont complain :-).\r\n\r\nI first find out what your competitors have done that we havnt done yet and address those issues.  Usually there are quite a few things, more social media involement, improving the number and quality of inbound links, on site content, video creation.  With the videos, after I create a few for you, I can get those to rank very quickly for highly competitve keywords.  \r\n\r\nI use tools that most people dont know about and would like to use them for your site. Let me know if youd like more information or references, I have more than I know what to do with.\r\n\r\nWinston\r\n1.319.423.9938', '0000-00-00'),
(20, 'aaaa', 'aaaaa@aaa.com', 'kjjx', 'hiduhwdwduhq', '0000-00-00'),
(21, 'Ukrainian girl wants to get acquainted! www.godatenow.pro', '3333333@111.com', '5048424', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now!\nEverybody knows that the most beautiful girls are Ukrainka.\n\nYou can meet pretty Ukrainian girl if you will register on our dating site.\n\nRegistration is free! Enjoy dating Ukrainian beauties right now! http://godatenow.pro', '0000-00-00'),
(22, 'Ukrainian girl wants to get acquainted! www.godatenow.pro', '00000@111111.com', '36677924', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now!\nEverybody knows that the most beautiful girls are Ukrainka.\n\nYou can meet pretty Ukrainian girl if you will register on our dating site.\n\nRegistration is free! Enjoy dating Ukrainian beauties right now! http://godatenow.pro', '0000-00-00'),
(23, 'Ukrainian girl wants to get acquainted! www.godatenow.pro', '-------@1111.com', '7153626', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now!\nEverybody knows that the most beautiful girls are Ukrainka.\n\nYou can meet pretty Ukrainian girl if you will register on our dating site.\n\nRegistration is free! Enjoy dating Ukrainian beauties right now! http://godatenow.pro', '0000-00-00'),
(24, 'Learn how you can control our sex toys from any distance: www.loveloves.pro', '111111@------.ru', '6099131', 'Hello!\nOur sex shop will help you to recognize yourself from a new, unexplored side and discover the deep world of magical erotic experiences.\n\nHere your waiting is pleasant, only pleasant and nothing but pleasant!\n\nA place where everyone wants to go, but only a few decide to do it: http://loveloves.pro', '0000-00-00'),
(25, 'Here are the girls who want your heat: www.godatenow.pro', '333@3333.com', '0609261', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now!\nEverybody knows that the most beautiful girls are Ukrainka.\n\nYou can meet pretty Ukrainian girl if you will register on our dating site.\n\nRegistration is free! Enjoy dating Ukrainian beauties right now! http://godatenow.pro', '0000-00-00'),
(26, 'Choose your Russian girlfriend: www.ru-brides.pro', '-----@111.com', '77890270', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(27, 'Here are the girls who want your heat: www.godatenow.pro', '-----@333.com', '40108584', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now!\nEverybody knows that the most beautiful girls are Ukrainka.\n\nYou can meet pretty Ukrainian girl if you will register on our dating site.\n\nRegistration is free! Enjoy dating Ukrainian beauties right now! http://godatenow.pro', '0000-00-00'),
(28, 'Choose your Russian girlfriend: www.ru-brides.pro', '3333@---.com', '461724', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(29, 'Choose your Russian girlfriend: www.ru-brides.pro', '111111@-----.ru', '581850', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(30, 'Choose your Russian girlfriend: www.ru-brides.pro', '3333333@00000.ru', '3828460', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(31, 'Here are the girls who want your heat: www.godatenow.pro', '1111111@1111111.com', '623775949', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now!\nEverybody knows that the most beautiful girls are Ukrainka.\n\nYou can meet pretty Ukrainian girl if you will register on our dating site.\n\nRegistration is free! Enjoy dating Ukrainian beauties right now! http://godatenow.pro', '0000-00-00'),
(32, 'Get muscled body without excess fat in just a few weeks: www.ghbalance.pro', '1111@111.ru', '4783038', 'Hello!\n With developed in the United States, unique composition of 100% natural ingredients that are safe for your health you will increase muscle mass, get rid of unwanted fat and get firm skin.\n\n The male growth hormone contained in the formulation is the top secret. So far it was expensive and inaccessible. \nToday, thanks to GH Balance it is available within your fingertips.  \n\nBuy today and get a 50% discount. http://ghbalance.pro', '0000-00-00'),
(33, 'Choose your Russian girlfriend: www.ru-brides.pro', '----@111.com', '58626859', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(34, 'Your ad in my blog: www.lionsmedia.ru', 'trnpzzx@mail.com', '110373', 'I suggest posting your advertisement on your blog: https://lionsmedia.ru', '0000-00-00'),
(35, 'Your ad in my blog: www.lionsmedia.ru', 'dnbbdrinf@hotmail.com', '355338', 'I suggest posting your advertisement on your blog: https://lionsmedia.ru', '0000-00-00'),
(36, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(37, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(38, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(39, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(40, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(41, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(42, 'Choose your Russian girlfriend: www.ru-brides.pro', '333333@000.ru', '4337303', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(43, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(44, 'Get muscled body without excess fat in just a few weeks: www.ghbalance.pro', '-------@111111.com', '369660', 'Hello!\n With developed in the United States, unique composition of 100% natural ingredients that are safe for your health you will increase muscle mass, get rid of unwanted fat and get firm skin.\n\n The male growth hormone contained in the formulation is the top secret. So far it was expensive and inaccessible. \nToday, thanks to GH Balance it is available within your fingertips.  \n\nBuy today and get a 50% discount. http://ghbalance.pro', '0000-00-00'),
(45, 'Whiter teeth in 5 days? How? Find out: www.buyibright.pro', '-------@1111111.ru', '7012375', 'Depending on the way to use the system, 5 or 7 days are enough to get whiter teeth.\n\nMake your teeth shine white and dazzle your friends â€“ smile is one of the first things that people notice when they see you. Join the group of over 40 000 satisfied customers all over the world.  http://buyibright.pro', '0000-00-00'),
(46, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(47, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(48, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(49, 'Do you want to lose weight fast without yo-yo effect, but nothing helps? www.acaiberry900.pro', '111@111111.ru', '358994009', 'Lose 25 pounds and feel great in 5 weeks. No effort, wasting time and strict diets.\n\nWith AcaiBerry900 you will rapidly get rid of a record number of pounds. \nNeither gym nor strict diets can equal to it. In addition, you will save a lot of time. \nBuy with discount: http://acaiberry900.pro', '0000-00-00'),
(50, 'Do you want to lose weight fast without yo-yo effect, but nothing helps? www.acaiberry900.pro', '333333@000000.ru', '2311948', 'Lose 25 pounds and feel great in 5 weeks. No effort, wasting time and strict diets.\n\nWith AcaiBerry900 you will rapidly get rid of a record number of pounds. \nNeither gym nor strict diets can equal to it. In addition, you will save a lot of time. \nBuy with discount: http://acaiberry900.pro', '0000-00-00'),
(51, 'Choose your Russian girlfriend: www.ru-brides.pro', '-------@1111.com', '36805129', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(52, 'Choose your Russian girlfriend: www.ru-brides.pro', '-------@3333333.com', '37325477', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(53, 'Choose your Russian girlfriend: www.ru-brides.pro', '00000@1111111.com', '91877028', 'Are you still lonely?\nDon`t be upset! Join our dating website and you can find your happiness just now! Everybody know that the most beautiful girls are Russians.\n\nYou can meet pretty Russian girl  if you will register on our dating site. Registration is free! Don`t waste your time! Enjoy dating Russian beauties right now! http://ru-brides.pro', '0000-00-00'),
(54, 'Do you want to lose weight fast without yo-yo effect, but nothing helps? www.acaiberry900.pro', '000000@00000.ru', '96378907', 'Lose 25 pounds and feel great in 5 weeks. No effort, wasting time and strict diets.\n\nWith AcaiBerry900 you will rapidly get rid of a record number of pounds. \nNeither gym nor strict diets can equal to it. In addition, you will save a lot of time. \nBuy with discount: http://acaiberry900.pro', '0000-00-00'),
(55, 'Do you have sex for a short time? No problem Tablets for long sex! www.pornpropills.pro', '3333@111111.com', '113392108', 'Have you ever reached orgasm just when your partner was just starting to hot up? How did it make you feel? Were you ashamed?\n\nâ€¢	DO YOU WANT LONGER AND BETTER SEX?\nâ€¢	DO YOU WANT MULTIPLE ORGASMS?\nâ€¢	DO YOU WANT TO BE MORE EFFICIENT IN BED?\nâ€¢	DO YOU WANT TO GIVE YOUR PARTNER UNFORGETTABLE PLEASURE?\nIF YOU ANSWER ANY OF THESE QUESTIONS â€œYESâ€ YOU SHOULDNâ€™T HESITATE TO BUY http://pornpropills.pro', '0000-00-00'),
(56, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(57, 'Do you have sex for a short time? No problem Tablets for long sex! www.pornpropills.pro', '00000@3333333.ru', '69860223', 'Have you ever reached orgasm just when your partner was just starting to hot up? How did it make you feel? Were you ashamed?\n\nâ€¢	DO YOU WANT LONGER AND BETTER SEX?\nâ€¢	DO YOU WANT MULTIPLE ORGASMS?\nâ€¢	DO YOU WANT TO BE MORE EFFICIENT IN BED?\nâ€¢	DO YOU WANT TO GIVE YOUR PARTNER UNFORGETTABLE PLEASURE?\nIF YOU ANSWER ANY OF THESE QUESTIONS â€œYESâ€ YOU SHOULDNâ€™T HESITATE TO BUY http://pornpropills.pro', '0000-00-00'),
(58, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(59, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(60, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(61, 'www.vk.com/email_rassylka The lie and the truth about email newsletters', 'email_rassylka', 'email_rassylka', 'Review of the best mailing services on our page: https://vk.com/email_rassylka', '0000-00-00'),
(62, 'www.vk.com/rassylka__email The lie and the truth about email newsletters', 'rassylka__email', 'rassylka__email', 'Review of the best mailing services on our page: https://vk.com/rassylka__email', '0000-00-00'),
(63, 'www.vk.com/rassylka__email The lie and the truth about email newsletters', 'rassylka__email', 'rassylka__email', 'Review of the best mailing services on our page: https://vk.com/rassylka__email', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `msg` blob NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `delivered_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `cart_id`, `status`, `buyer_id`, `vendor_id`, `delivered_on`, `updated_on`) VALUES
(1, 'OD59773250cf80c', 1, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-25 17:28:08'),
(2, 'OD59773250cf80c', 2, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-25 17:28:08'),
(3, 'OD5979da4a62597', 4, 2, 2, 2, '2017-07-31 12:50:55', '2017-07-27 17:49:22'),
(4, 'OD5979da4a62597', 5, 2, 2, 2, '2017-07-31 12:51:00', '2017-07-27 17:49:22'),
(5, 'OD5979da4a62597', 6, 2, 2, 2, '2017-07-31 12:51:05', '2017-07-27 17:49:22'),
(6, 'OD5979db931c971', 7, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-27 17:54:51'),
(7, 'OD5979db931c971', 8, 2, 2, 2, '2017-07-31 12:50:49', '2017-07-27 17:54:51'),
(8, 'OD597b036a2b736', 9, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-28 14:57:06'),
(9, 'OD597b0396ec1f2', 10, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-28 14:57:50'),
(10, 'OD597b040b79582', 11, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-28 14:59:47'),
(11, 'OD597b27eff33c8', 12, 1, 5, 4, '0000-00-00 00:00:00', '2017-07-28 17:32:55'),
(12, 'OD597b2883ed7ef', 13, 1, 5, 1, '0000-00-00 00:00:00', '2017-07-28 17:35:23'),
(13, 'OD597b4117c6570', 14, 1, 5, 4, '0000-00-00 00:00:00', '2017-07-28 19:20:15'),
(14, 'OD597b4ab53b15e', 15, 1, 1, 4, '0000-00-00 00:00:00', '2017-07-28 20:01:17'),
(15, 'OD597de46817df1', 17, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-30 19:21:36'),
(16, 'OD597eb2a39b6e6', 18, 2, 2, 1, '2017-07-31 10:04:43', '2017-07-31 10:01:31'),
(17, 'OD597ee0a11ffda', 19, 1, 2, 2, '0000-00-00 00:00:00', '2017-07-31 13:17:45'),
(18, 'OD597ee0a11ffda', 20, 1, 2, 2, '0000-00-00 00:00:00', '2017-07-31 13:17:45'),
(19, 'OD597ee0a11ffda', 21, 1, 2, 1, '0000-00-00 00:00:00', '2017-07-31 13:17:45'),
(20, 'OD597f2f0c38dfa', 22, 1, 5, 1, '0000-00-00 00:00:00', '2017-07-31 18:52:20'),
(21, 'OD597f2f310f8c0', 23, 1, 5, 2, '0000-00-00 00:00:00', '2017-07-31 18:52:57'),
(22, 'OD597f2f310f8c0', 24, 1, 5, 2, '0000-00-00 00:00:00', '2017-07-31 18:52:57'),
(23, 'OD597f2f43dbd79', 25, 1, 5, 1, '0000-00-00 00:00:00', '2017-07-31 18:53:15'),
(24, 'OD597f2f72904a6', 26, 2, 5, 1, '2017-07-31 19:30:54', '2017-07-31 18:54:02'),
(25, 'OD597f2f72904a6', 27, 2, 5, 1, '2017-07-31 19:30:40', '2017-07-31 18:54:02'),
(26, 'OD597f2f72904a6', 28, 2, 5, 1, '2017-07-31 19:30:22', '2017-07-31 18:54:02'),
(27, 'OD597f2fab768de', 29, 1, 5, 5, '0000-00-00 00:00:00', '2017-07-31 18:54:59'),
(28, 'OD59807f2081c54', 30, 1, 1, 2, '0000-00-00 00:00:00', '2017-08-01 18:46:16'),
(29, 'OD59807f2081c54', 31, 1, 1, 4, '0000-00-00 00:00:00', '2017-08-01 18:46:16'),
(30, 'OD59807f2081c54', 32, 1, 1, 2, '0000-00-00 00:00:00', '2017-08-01 18:46:16'),
(36, 'OD5981d90eb3d9c', 38, 1, 5, 4, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(37, 'OD5981d90eb3d9c', 39, 1, 5, 5, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(38, 'OD5981d90eb3d9c', 42, 1, 5, 2, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(39, 'OD5981d90eb3d9c', 43, 1, 5, 4, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(40, 'OD5981d90eb3d9c', 44, 1, 5, 1, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(41, 'OD5981d90eb3d9c', 45, 1, 5, 5, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(42, 'OD5981d90eb3d9c', 46, 1, 5, 2, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(43, 'OD5981d90eb3d9c', 47, 1, 5, 1, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(44, 'OD5981d90eb3d9c', 48, 1, 5, 1, '0000-00-00 00:00:00', '2017-08-02 19:22:14'),
(45, 'OD598a9b1b14588', 49, 1, 4, 5, '0000-00-00 00:00:00', '2017-08-09 10:48:19'),
(46, 'OD598aac011a074', 50, 1, 5, 2, '0000-00-00 00:00:00', '2017-08-09 12:00:25'),
(47, 'OD598ab5e9a9ec1', 51, 1, 2, 4, '0000-00-00 00:00:00', '2017-08-09 12:42:41'),
(48, 'OD598ab7c072504', 52, 1, 5, 2, '0000-00-00 00:00:00', '2017-08-09 12:50:32'),
(49, 'OD598ab7fa5fdc3', 53, 1, 5, 2, '0000-00-00 00:00:00', '2017-08-09 12:51:30'),
(50, 'OD598aba6214390', 54, 1, 5, 1, '0000-00-00 00:00:00', '2017-08-09 13:01:46'),
(51, 'OD598abba6c6fc6', 55, 1, 5, 1, '0000-00-00 00:00:00', '2017-08-09 13:07:10'),
(52, 'OD598abc0bb2de9', 56, 1, 5, 2, '0000-00-00 00:00:00', '2017-08-09 13:08:51'),
(53, 'OD598abc50bad8d', 57, 1, 5, 5, '0000-00-00 00:00:00', '2017-08-09 13:10:00'),
(54, 'OD598abc9ab0873', 58, 1, 5, 5, '0000-00-00 00:00:00', '2017-08-09 13:11:14'),
(55, 'OD598abebb426b4', 59, 1, 1, 5, '0000-00-00 00:00:00', '2017-08-09 13:20:19'),
(56, 'OD598abebb426b4', 60, 1, 1, 1, '0000-00-00 00:00:00', '2017-08-09 13:20:19'),
(57, 'OD598abf6477bda', 61, 1, 1, 1, '0000-00-00 00:00:00', '2017-08-09 13:23:08'),
(58, 'OD598abf6477bda', 62, 1, 1, 2, '0000-00-00 00:00:00', '2017-08-09 13:23:08'),
(59, 'OD598af63304379', 63, 1, 2, 4, '0000-00-00 00:00:00', '2017-08-09 17:16:59'),
(60, 'OD598bf511b1938', 64, 1, 2, 1, '0000-00-00 00:00:00', '2017-08-10 11:24:25'),
(61, 'OD598bf5a1e1d10', 65, 1, 2, 1, '0000-00-00 00:00:00', '2017-08-10 11:26:49'),
(62, 'OD598bf5a1e1d10', 66, 1, 2, 1, '0000-00-00 00:00:00', '2017-08-10 11:26:49'),
(63, 'OD598bf5d96c523', 67, 1, 2, 1, '0000-00-00 00:00:00', '2017-08-10 11:27:45'),
(64, 'OD598c2a46b25fc', 68, 1, 1, 8, '0000-00-00 00:00:00', '2017-08-10 15:11:26'),
(65, 'OD598c2a46b25fc', 70, 1, 1, 1, '0000-00-00 00:00:00', '2017-08-10 15:11:26'),
(66, 'OD598c2a46b25fc', 72, 1, 1, 8, '0000-00-00 00:00:00', '2017-08-10 15:11:26'),
(67, 'OD598c314782cbf', 74, 1, 8, 8, '0000-00-00 00:00:00', '2017-08-10 15:41:19'),
(68, 'OD598c3325b2f80', 75, 1, 8, 8, '0000-00-00 00:00:00', '2017-08-10 15:49:17'),
(69, 'OD598c33697436c', 76, 1, 8, 8, '0000-00-00 00:00:00', '2017-08-10 15:50:25'),
(70, 'OD59af88bc267c5', 77, 1, 1, 8, '0000-00-00 00:00:00', '2017-09-06 11:03:48'),
(71, 'OD59af88bc267c5', 81, 1, 1, 1, '0000-00-00 00:00:00', '2017-09-06 11:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `validity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `price`, `validity`) VALUES
(1, 'Seed', '999', 6),
(2, 'Seed', '899', 12),
(3, 'Grow', '2499', 6),
(4, 'Grow', '2299', 12),
(5, 'Established', '4999', 6),
(6, 'Established', '4499', 12);

-- --------------------------------------------------------

--
-- Table structure for table `products_cart`
--

CREATE TABLE IF NOT EXISTS `products_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) DEFAULT NULL,
  `productid` varchar(50) DEFAULT NULL,
  `size_id` varchar(50) DEFAULT NULL,
  `buyer_id` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `productcolor` varchar(50) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `products_cart`
--

INSERT INTO `products_cart` (`id`, `product_id`, `productid`, `size_id`, `buyer_id`, `quantity`, `productcolor`, `status`, `updated_on`) VALUES
(1, '3', 'PRAK003', '5', '2', 3, 'BLUE', 2, '2017-07-25 17:27:23'),
(2, '3', 'PRAK003', '5', '2', 3, 'BLACK', 2, '2017-07-25 17:27:36'),
(4, '8', 'vikas11', '15', '2', 1, 'WHITE', 2, '2017-07-27 17:47:25'),
(5, '8', 'vikas11', '15', '2', 1, 'WHITE', 2, '2017-07-27 17:47:51'),
(6, '8', 'vikas11', '15', '2', 9, 'YELLOW', 2, '2017-07-27 17:48:33'),
(7, '1', 'PRAK001', '1', '2', 4, 'GREEN', 2, '2017-07-27 17:54:11'),
(8, '8', 'vikas11', '15', '2', 2, 'BLUE', 2, '2017-07-27 17:54:34'),
(9, '9', 'PRAK007', '18', '2', 2, 'BLUE', 2, '2017-07-28 14:56:55'),
(10, '5', 'PRAK005', '9', '2', 1, 'ORANGE', 2, '2017-07-28 14:57:38'),
(11, '3', 'PRAK003', '5', '2', 1, 'BLACK', 2, '2017-07-28 14:59:15'),
(12, '10', '12', '19', '5', 2, 'WHITE', 2, '2017-07-28 17:31:57'),
(13, '3', 'PRAK003', '5', '5', 1, 'BLACK', 2, '2017-07-28 17:35:16'),
(14, '10', '12', '19', '5', 1, 'WHITE', 2, '2017-07-28 19:20:09'),
(15, '10', '12', '19', '1', 1, 'WHITE', 2, '2017-07-28 20:01:12'),
(17, '5', 'PRAK005', '9', '2', 3, 'ORANGE', 2, '2017-07-30 19:21:15'),
(18, '1', 'PRAK001', '2', '2', 1, 'RED', 2, '2017-07-31 10:00:06'),
(19, '14', 'RAMBO1', '25', '2', 3, 'BLACK', 2, '2017-07-31 13:16:31'),
(20, '8', 'vikas11', '16', '2', 8, 'RED', 2, '2017-07-31 13:16:58'),
(21, '9', 'PRAK007', '18', '2', 2, 'BLACK', 2, '2017-07-31 13:17:34'),
(22, '3', 'PRAK003', '5', '5', 1, 'BLACK', 2, '2017-07-31 18:52:07'),
(23, '14', 'RAMBO1', '24', '5', 1, 'WHITE', 2, '2017-07-31 18:52:33'),
(24, '8', 'vikas11', '15', '5', 1, 'WHITE', 2, '2017-07-31 18:52:51'),
(25, '9', 'PRAK007', '17', '5', 1, 'WHITE', 2, '2017-07-31 18:53:11'),
(26, '3', 'PRAK003', '5', '5', 1, 'BLACK', 2, '2017-07-31 18:53:50'),
(27, '3', 'PRAK003', '5', '5', 1, 'BLACK', 2, '2017-07-31 18:53:52'),
(28, '3', 'PRAK003', '5', '5', 1, 'BLACK', 2, '2017-07-31 18:53:55'),
(29, '11', 'sdf', '20', '5', 1, 'BLACK', 2, '2017-07-31 18:54:53'),
(30, '8', 'vikas11', '15', '1', 5, 'RED', 2, '2017-08-01 18:44:59'),
(31, '10', '12', '19', '1', 4, 'BLACK', 2, '2017-08-01 18:45:30'),
(32, '14', 'RAMBO1', '24', '1', 5, 'RED', 2, '2017-08-01 18:46:04'),
(33, '3', 'PRAK003', '5', '5', 1, 'BLACK', 2, '2017-08-02 10:16:48'),
(34, '1', 'PRAK001', '2', '5', 3, 'GREEN', 2, '2017-08-02 12:44:53'),
(35, '5', 'PRAK005', '9', '5', 4, 'PINK', 2, '2017-08-02 12:45:11'),
(36, '8', 'vikas11', '16', '5', 5, 'BLACK', 2, '2017-08-02 12:45:32'),
(37, '14', 'RAMBO1', '24', '5', 1, 'WHITE', 2, '2017-08-02 12:45:47'),
(38, '10', '12', '19', '5', 1, 'WHITE', 2, '2017-08-02 15:41:21'),
(39, '11', 'sdf', '20', '5', 1, 'BLACK', 2, '2017-08-02 15:41:43'),
(42, '14', 'RAMBO1', '24', '5', 1, 'WHITE', 2, '2017-08-02 19:21:49'),
(43, '10', '12', '19', '5', 1, 'WHITE', 2, '2017-08-02 19:21:53'),
(44, '9', 'PRAK007', '17', '5', 1, 'WHITE', 2, '2017-08-02 19:21:55'),
(45, '11', 'sdf', '20', '5', 1, 'BLACK', 2, '2017-08-02 19:21:58'),
(46, '8', 'vikas11', '15', '5', 1, 'WHITE', 2, '2017-08-02 19:22:00'),
(47, '3', 'PRAK003', '5', '5', 1, 'BLACK', 2, '2017-08-02 19:22:02'),
(48, '5', 'PRAK005', '9', '5', 1, 'ORANGE', 2, '2017-08-02 19:22:04'),
(49, '11', 'sdf', '20', '4', 1, 'BLACK', 2, '2017-08-09 10:47:56'),
(50, '14', 'RAMBO1', '24', '5', 1, 'WHITE', 2, '2017-08-09 11:56:51'),
(51, '10', '12', '19', '2', 3, 'WHITE', 2, '2017-08-09 12:42:19'),
(52, '14', 'RAMBO1', '24', '5', 1, 'WHITE', 2, '2017-08-09 12:50:11'),
(53, '14', 'RAMBO1', '24', '5', 4, 'WHITE', 2, '2017-08-09 12:51:24'),
(54, '9', 'PRAK007', '17', '5', 6, 'WHITE', 2, '2017-08-09 13:01:37'),
(55, '9', 'PRAK007', '17', '5', 6, 'WHITE', 2, '2017-08-09 13:06:58'),
(56, '14', 'RAMBO1', '24', '5', 6, 'WHITE', 2, '2017-08-09 13:08:46'),
(57, '11', 'sdf', '20', '5', 2, 'BLACK', 2, '2017-08-09 13:09:52'),
(58, '11', 'sdf', '20', '5', 2, 'BLACK', 2, '2017-08-09 13:11:10'),
(59, '11', 'sdf', '20', '1', 2, 'BLACK', 2, '2017-08-09 13:19:28'),
(60, '3', 'PRAK003', '5', '1', 10, 'BLACK', 2, '2017-08-09 13:20:13'),
(61, '3', 'PRAK003', '5', '1', 5, 'BLACK', 2, '2017-08-09 13:22:05'),
(62, '14', 'RAMBO1', '24', '1', 5, 'WHITE', 2, '2017-08-09 13:22:28'),
(63, '10', '12', '19', '2', 3, 'WHITE', 2, '2017-08-09 17:16:49'),
(64, '9', 'PRAK007', '17', '2', 6, 'WHITE', 2, '2017-08-10 11:24:17'),
(65, '9', 'PRAK007', '17', '2', 10, 'WHITE', 2, '2017-08-10 11:26:17'),
(66, '9', 'PRAK007', '18', '2', 6, 'WHITE', 2, '2017-08-10 11:26:36'),
(67, '9', 'PRAK007', '17', '2', 2, 'WHITE', 2, '2017-08-10 11:27:33'),
(68, '15', 'SM001', '27', '1', 2, 'BLUE', 2, '2017-08-10 15:08:38'),
(70, '9', 'PRAK007', '18', '1', NULL, 'WHITE', 2, '2017-08-10 15:10:08'),
(72, '15', 'SM001', '26', '1', 1, 'WHITE', 2, '2017-08-10 15:11:02'),
(74, '15', 'SM001', '26', '8', 4, 'YELLOW', 2, '2017-08-10 15:40:43'),
(75, '16', 'MS001', '28', '8', 30, 'BLACK', 2, '2017-08-10 15:49:06'),
(76, '16', 'MS001', '28', '8', 1, 'WHITE', 2, '2017-08-10 15:50:17'),
(77, '15', 'SM001', '27', '1', 1, '', 2, '2017-08-17 17:35:01'),
(81, '5', 'PRAK005', '9', '1', 5, 'ORANGE', 2, '2017-09-06 11:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `products_cart_final`
--

CREATE TABLE IF NOT EXISTS `products_cart_final` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

CREATE TABLE IF NOT EXISTS `products_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `parent_category` int(50) NOT NULL,
  `sub_colors` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) NOT NULL,
  `size_from` varchar(100) NOT NULL,
  `size_to` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_fit` varchar(100) NOT NULL,
  `fabric` varchar(100) NOT NULL,
  `colors` varchar(100) NOT NULL,
  `sales_packages` varchar(100) NOT NULL,
  `style` varchar(100) NOT NULL,
  `inventory` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `description` blob NOT NULL,
  `vendor_id` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `products_details`
--

INSERT INTO `products_details` (`id`, `category`, `parent_category`, `sub_colors`, `brand_name`, `size_from`, `size_to`, `price`, `product_id`, `product_fit`, `fabric`, `colors`, `sales_packages`, `style`, `inventory`, `availability`, `description`, `vendor_id`, `image_name`, `status`) VALUES
(1, '5', 1, NULL, 'PRAK', '', '', '600', 'PRAK001', 'SLIM', 'COTTON', 'RED,GREEN', '5', 'DOTTED', '50', 'Available', 0x534c494d204649542053484952545320464f52205045524645435420464954, '1', 'prd_img_1_Men-Shirt-2016-New-Fashion-Mens-Shirts-W-Letter-Print-Long-Sleeve-Casual-Shirt-Slim-Fit.jp', 1),
(3, '11', 1, NULL, 'PRAK', '', '', '400', 'PRAK003', 'Regular', 'COTTON', 'BLACK,BLUE', '3', 'ROUND NECK', '40', 'Available', 0x524f554e44204e45434b20524547554c415220542d53484952542e5749544820504f434b4554, '1', 'prd_img_3_bde2f04b2c98b0bbaddf854ff78b364f.jpg', 1),
(5, '5', 1, NULL, 'PRAK', '', '', '800', 'PRAK005', 'REGULAR', 'COTTON', 'ORANGE,PINK', '4', 'STRIPED', '25', 'Available', 0x4f4646494345205745415220534849525453, '1', 'prd_img_5_79cb18a265f5c27d15ceb46615bafbf3.jpg', 1),
(8, '5', 1, NULL, 'vika', '', '', '49995', 'vikas11', 'slim', 'jacquard', 'WHITE,BLACK,RED,GREEN,YELLOW,BLUE', '6', 'Basic', '36', 'Pre-Book', 0x776f6e64657266756c206a61637561726420696e646f, '2', 'prd_img_8_600.800.jpg', 1),
(12, '10', 1, NULL, 'sas', '', '', '234', 'asas', 'ass', 'assa', 'GREEN,YELLOW', '2', 'as', '3', 'Available', 0x617364, '5', 'prd_img_12_prd_img_11_13.jpg', 0),
(14, '5', 1, NULL, 'RAMBO', '', '', '1295', 'RAMBO1', 'CASUSL', 'COTTON', 'WHITE,BLACK,RED,GREEN', '6', 'poncho', '20', 'Available', 0x4453464d44464c4d47424b4446, '2', 'prd_img_14_1200-12001.jpg', 1),
(17, '5', 1, NULL, 'ZSADFDSA', '', '', '', 'XDFSD', 'XDFGDS', 'XDFDS', 'WHITE,BLACK,RED', '11', '11', '11', 'Available', 0x4453464453, '8', '', 2),
(18, '16', 2, NULL, 'dfxf', '', '', '', 'xcvcxcv', 'xcvxcv', 'xcvxcv', 'RED,GREEN', '3', 'dcs', '3', 'Available', 0x64667364, '4', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image_name`) VALUES
(1, 1, 'prd_img_1_de4050e7d669a97dbc0838f0fe125d53.jpg'),
(6, 3, 'prd_img_3_275d69407c622c1bb6ffca057e3d8d04.jpg'),
(7, 3, 'prd_img_3_bde2f04b2c98b0bbaddf854ff78b364f.jpg'),
(10, 5, 'prd_img_5_79cb18a265f5c27d15ceb46615bafbf3.jpg'),
(14, 8, 'prd_img_8_indian-sherwani-500x500.jpg'),
(15, 8, 'prd_img_8_KP-18-1500x1500.jpg'),
(16, 8, 'prd_img_8_men3900.900.jpg'),
(17, 8, 'prd_img_8_600.800.jpg'),
(21, 12, 'prd_img_12_prd_img_11_13.jpg'),
(25, 14, 'prd_img_14_1000-1000.jpg'),
(26, 14, 'prd_img_14_1200-1200.jpg'),
(27, 14, 'prd_img_14_1200-12001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_reviews`
--

CREATE TABLE IF NOT EXISTS `products_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `price_id` int(10) NOT NULL,
  `review_product` varchar(100) NOT NULL,
  `staring` int(10) NOT NULL,
  `approval` int(10) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products_reviews`
--

INSERT INTO `products_reviews` (`id`, `product_id`, `price_id`, `review_product`, `staring`, `approval`, `updated_by`, `updated_on`) VALUES
(1, 8, 0, 'Wooooonderrrrful????', 0, 1, 'Prakash jain', '2017-07-27 18:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE IF NOT EXISTS `product_prices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `sizes_from` varchar(100) NOT NULL,
  `sizes_to` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `sizes_from`, `sizes_to`, `price`) VALUES
(2, '1', '6', '10', '600'),
(5, '3', '76', '78', '350'),
(6, '3', '78', '80', '400'),
(9, '5', '1', '4', '750'),
(10, '5', '3', '5', '800'),
(15, '8', '1', '5', '39995'),
(16, '8', '6', '10', '49995'),
(21, '12', '17', '20', '234'),
(24, '14', '1', '5', '999'),
(25, '14', '6', '10', '1295');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `sizes` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `category_id`, `sizes`) VALUES
(1, 5, 'S'),
(2, 5, 'M'),
(3, 5, 'L'),
(4, 5, 'XL'),
(5, 5, 'XXL'),
(6, 5, '36'),
(7, 5, '38'),
(8, 5, '40'),
(9, 5, '42'),
(10, 5, '44'),
(11, 16, 'ONE SIZE'),
(12, 16, 'S'),
(13, 16, 'M'),
(14, 16, 'L'),
(15, 16, 'XL'),
(16, 16, 'XXL'),
(17, 10, '28'),
(18, 10, '30'),
(19, 10, '32'),
(20, 10, '34'),
(21, 10, '36'),
(22, 10, '38'),
(23, 10, '40'),
(24, 10, '42'),
(25, 10, '44'),
(26, 8, 'S'),
(27, 8, 'M'),
(28, 8, 'L'),
(29, 8, 'XL'),
(30, 8, 'XXL'),
(31, 8, '36'),
(32, 8, '38'),
(33, 8, '40'),
(34, 8, '42'),
(35, 8, '44'),
(36, 9, '28'),
(37, 9, '30'),
(38, 9, '32'),
(39, 9, '34'),
(40, 9, '36'),
(41, 9, '38'),
(42, 9, '40'),
(43, 9, '42'),
(44, 9, '44'),
(45, 12, '28'),
(46, 12, '30'),
(47, 12, '32'),
(48, 12, '34'),
(49, 12, '36'),
(50, 12, '38'),
(51, 12, '40'),
(52, 12, '42'),
(53, 12, '44'),
(63, 14, 'ONE SIZE'),
(64, 14, 'S'),
(65, 14, 'M'),
(66, 14, 'L'),
(67, 14, 'XL'),
(68, 14, 'XXL'),
(69, 15, 'ONE SIZE'),
(70, 15, 'S'),
(71, 15, 'M'),
(72, 15, 'L'),
(73, 15, 'XL'),
(74, 15, 'XXL'),
(75, 17, 'ONE SIZE'),
(76, 11, 'S'),
(77, 11, 'M'),
(78, 11, 'L'),
(79, 11, 'XL'),
(80, 11, 'XXL'),
(81, 11, '36'),
(82, 11, '38'),
(83, 11, '40'),
(84, 11, '42'),
(85, 11, '44'),
(86, 11, '46'),
(87, 13, 'S'),
(88, 13, 'M'),
(89, 13, 'L'),
(90, 13, 'XL'),
(91, 13, 'XXL'),
(92, 13, '36'),
(93, 13, '38'),
(94, 13, '40'),
(95, 13, '42'),
(96, 13, '44'),
(97, 13, '46');

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE IF NOT EXISTS `request_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `request_details`
--

INSERT INTO `request_details` (`id`, `request_id`, `user_type`, `user_id`, `status`, `updated_on`) VALUES
(1, 'RES59761770132c2', 1, 2, 0, '2017-07-24 21:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `sadmin`
--

CREATE TABLE IF NOT EXISTS `sadmin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sadmin`
--

INSERT INTO `sadmin` (`id`, `username`, `password`) VALUES
(1, 'Nucatalog', 'fd6aa68700a195cc205cf07ed38d1702'),
(7, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_leads`
--

CREATE TABLE IF NOT EXISTS `subscribe_leads` (
  `subscribed_id` int(11) NOT NULL AUTO_INCREMENT,
  `subscribed_email_id` varchar(255) NOT NULL,
  `subscribed_date` date NOT NULL,
  PRIMARY KEY (`subscribed_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subscribe_leads`
--

INSERT INTO `subscribe_leads` (`subscribed_id`, `subscribed_email_id`, `subscribed_date`) VALUES
(1, 'siddu@gmail.com', '0000-00-00'),
(2, 'prakashjainmail@gmail.com', '0000-00-00'),
(3, 'prakashjainmail@gmail.com', '0000-00-00'),
(4, '', '0000-00-00'),
(5, 'test@gmail.com', '0000-00-00'),
(6, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `vendorDOB` varchar(100) DEFAULT NULL,
  `address` blob NOT NULL,
  `tin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  `package` int(10) NOT NULL,
  `validity` int(10) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `txnid` varchar(200) NOT NULL,
  `activation_date` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  `agreement` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
