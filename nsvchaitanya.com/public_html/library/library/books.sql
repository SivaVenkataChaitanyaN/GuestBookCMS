-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2019 at 10:22 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaitanya_useraccounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `num_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `age` int(4) NOT NULL,
  `due` int(1) NOT NULL,
  `favouriteSubject` int(1) NOT NULL,
  `hobbies` set('Playing','Reading','Listening to music','Watching movies','Trekking','Hiking') COLLATE utf8_unicode_ci NOT NULL,
  `favouriteSport` enum('Cricket','Football','Hockey') COLLATE utf8_unicode_ci NOT NULL,
  `nameOfBooks` text COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latest` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `age` (`age`) USING BTREE,
  KEY `user` (`user`),
  KEY `numberOfBook` (`favouriteSubject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `num_id`, `user`, `age`, `due`, `favouriteSubject`, `hobbies`, `favouriteSport`, `nameOfBooks`, `dateCreated`, `dateUpdated`, `latest`) VALUES
(1, 1, 2, 45, 0, 2, 'Reading,Listening to music,Watching movies', 'Football', 'According to two people familiar with the matter, who asked not to be identified, the case pertains to jeweller Nirav Modi, who is already being investigated by the federal investigation agency ', '2018-02-13 00:23:00', '2018-02-14 13:20:11', 0),
(2, 1, 1, 12, 0, 2, 'Playing,Reading', 'Cricket', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in Pakistan\'s Punjab province, to attend a similar ceremony on the Indian side on November 26, according to officials here', '2018-11-25 05:06:00', '2018-11-25 07:21:59', 0),
(3, 1, 1, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 12:51:38', '2018-11-25 07:22:08', 0),
(4, 2, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:03', '2018-11-25 09:27:03', 0),
(5, 2, 0, 23, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:24', '2018-12-05 12:26:13', 0),
(6, 2, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in Ranchi', '2018-11-25 14:57:24', '2019-01-08 16:18:43', 0),
(7, 2, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:24', '2018-11-25 09:27:24', 0),
(8, 3, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:24', '2019-01-16 10:19:16', 0),
(9, 3, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:24', '2019-01-16 15:59:22', 0),
(10, 3, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:24', '2019-01-16 10:21:37', 0),
(11, 4, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:24', '2019-01-20 10:22:00', 0),
(12, 4, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:24', '2019-01-16 10:21:47', 0),
(13, 5, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:24', '2019-01-16 10:54:05', 1),
(14, 6, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:24', '2018-11-25 09:27:24', 0),
(15, 7, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(16, 8, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:05', 1),
(17, 9, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:13', 1),
(18, 10, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:13', 1),
(19, 11, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:13', 1),
(20, 12, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:13', 1),
(21, 13, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:17', 1),
(22, 14, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:17', 1),
(23, 15, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:17', 1),
(24, 16, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:17', 1),
(25, 17, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:21', 1),
(26, 18, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:21', 1),
(27, 19, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:21', 1),
(28, 20, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:21', 1),
(29, 21, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:27', 1),
(30, 22, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:27', 1),
(31, 23, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:27', 1),
(32, 24, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:27', 1),
(33, 25, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:31', 1),
(34, 26, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:31', 1),
(35, 27, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:31', 1),
(36, 28, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:31', 1),
(37, 29, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:35', 1),
(38, 30, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:35', 1),
(39, 31, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:35', 1),
(40, 32, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:35', 1),
(41, 32, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(42, 32, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(43, 33, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:40', 1),
(44, 33, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(45, 34, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:40', 1),
(46, 35, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:40', 1),
(47, 35, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(48, 35, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(49, 35, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(50, 36, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:40', 1),
(51, 36, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(52, 36, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(53, 36, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(54, 37, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:45', 1),
(55, 37, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2018-11-25 09:27:42', 0),
(56, 38, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:45', 1),
(57, 39, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:45', 1),
(58, 40, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:45', 1),
(59, 41, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:50', 1),
(60, 42, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:50', 1),
(61, 43, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:50', 1),
(62, 44, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:50', 1),
(63, 45, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:54', 1),
(64, 46, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:54:55', 1),
(65, 47, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:54:55', 1),
(66, 48, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:54:55', 1),
(67, 49, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:55:00', 1),
(68, 50, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:55:00', 1),
(69, 51, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:55:00', 1),
(70, 52, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:55:00', 1),
(71, 53, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:55:05', 1),
(72, 54, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:42', '2019-01-16 10:55:05', 1),
(73, 55, 2, 20, 0, 1, 'Reading,Listening to music,Hiking', 'Hockey', 'the two countries had strained after the terror attacks by Pakistan-based groups in 2016', '2018-11-25 14:57:42', '2019-01-16 10:55:05', 1),
(74, 56, 3, 25, 0, 2, 'Playing,Trekking', 'Cricket', 'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries ', '2018-11-25 14:57:42', '2019-01-16 10:55:05', 1),
(75, 6, 1, 18, 0, 2, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in Ranchi', '2018-11-25 14:57:24', '2019-01-11 10:44:17', 0),
(76, 7, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:42', '2019-01-11 14:17:01', 0),
(77, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 12:51:38', '2019-01-12 15:50:59', 0),
(78, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-12 15:58:30', 0),
(79, 6, 1, 18, 0, 1, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in Ranchi', '2018-11-25 14:57:24', '2019-01-14 09:34:04', 0),
(80, 6, 1, 18, 0, 1, 'Playing,Watching movies', 'Football', 'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India', '2018-11-25 14:57:24', '2019-01-14 09:35:19', 0),
(81, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:57:31', 0),
(82, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:57:31', 0),
(83, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:57:31', 0),
(84, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:57:31', 0),
(85, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:58:01', 0),
(86, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:58:01', 0),
(87, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:58:01', 0),
(88, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 08:58:01', 0),
(89, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:01:49', 0),
(90, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:01:49', 0),
(91, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:01:49', 0),
(92, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:01:49', 0),
(93, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:06:17', 0),
(94, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:06:17', 0),
(95, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:06:17', 0),
(96, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:06:17', 0),
(97, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:10:21', 0),
(98, 2, 1, 18, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:24', '2019-01-16 09:10:31', 0),
(99, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 09:10:49', 0),
(100, 2, 1, 18, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:24', '2019-01-16 09:12:29', 0),
(101, 2, 1, 18, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:24', '2019-01-16 09:14:39', 0),
(102, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 10:59:53', 0),
(103, 6, 1, 18, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:24', '2019-01-16 09:20:20', 0),
(104, 2, 1, 18, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:24', '2019-01-16 16:02:50', 0),
(105, 6, 1, 18, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:24', '2019-01-16 09:27:41', 0),
(106, 6, 1, 18, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:24', '2019-01-16 10:54:05', 1),
(107, 7, 0, 23, 0, 3, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September', '2018-11-25 14:57:42', '2019-01-16 10:54:05', 1),
(108, 1, 1, 23, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 11:12:17', 0),
(109, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-16 16:03:05', 0),
(110, 3, 0, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:24', '2019-01-16 16:16:55', 0),
(111, 2, 1, 18, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:24', '2019-01-18 16:54:52', 0),
(112, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-18 16:30:18', 0),
(113, 3, 0, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 14:57:24', '2019-01-16 16:16:55', 1),
(114, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-18 16:30:22', 0),
(115, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-18 16:31:55', 0),
(116, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-18 16:32:34', 0),
(117, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-18 16:32:37', 0),
(118, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October', '2018-11-25 12:51:38', '2019-01-18 16:33:05', 0),
(119, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 16:33:24', 0),
(120, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 16:34:26', 0),
(121, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 16:34:44', 0),
(122, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 16:36:23', 0),
(123, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 16:37:40', 0),
(124, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 16:38:57', 0),
(125, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 16:42:17', 0),
(126, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 16:50:17', 0),
(127, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 16:52:21', 0),
(128, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 16:53:21', 0),
(129, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 16:56:00', 0),
(130, 2, 1, 18, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 14:57:24', '2019-01-18 17:07:16', 0),
(131, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year.', '2018-11-25 12:51:38', '2019-01-18 16:57:28', 0),
(132, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 17:00:04', 0),
(133, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years.', '2018-11-25 12:51:38', '2019-01-18 17:00:26', 0),
(134, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 17:05:07', 0),
(135, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 17:06:16', 0),
(136, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year.', '2018-11-25 12:51:38', '2019-01-18 17:08:43', 0),
(137, 2, 1, 18, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year.', '2018-11-25 14:57:24', '2019-01-20 16:21:12', 0),
(138, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 17:09:50', 0),
(139, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 17:11:13', 0),
(140, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 17:11:58', 0),
(141, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 17:13:08', 0),
(142, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 17:15:31', 0),
(143, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 17:16:25', 0),
(144, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 17:17:05', 0),
(145, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-18 17:17:55', 0),
(146, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this years', '2018-11-25 12:51:38', '2019-01-18 17:18:48', 0),
(147, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-20 16:21:00', 0),
(148, 4, 2, 20, 0, 1, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year.', '2018-11-25 14:57:24', '2019-01-20 13:27:45', 1),
(149, 2, 1, 18, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 14:57:24', '2019-01-20 16:21:12', 1),
(150, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year.', '2018-11-25 12:51:38', '2019-01-20 16:22:30', 0),
(151, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October this year', '2018-11-25 12:51:38', '2019-01-20 16:22:59', 0),
(152, 1, 1, 23, 0, 2, 'Reading,Watching movies', 'Cricket', 'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in October 2017', '2018-11-25 12:51:38', '2019-01-20 16:22:59', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
