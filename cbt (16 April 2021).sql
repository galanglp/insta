-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 07:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_cbt`
--

CREATE TABLE `jawaban_cbt` (
  `jawaban_id` int(11) NOT NULL,
  `jawaban_soal_id` int(11) NOT NULL,
  `jawaban_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jawaban_kunci` int(11) NOT NULL DEFAULT 0 COMMENT '0=salah, 1=benar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_cbt`
--

INSERT INTO `jawaban_cbt` (`jawaban_id`, `jawaban_soal_id`, `jawaban_text`, `jawaban_kunci`) VALUES
(1, 1, '<p>impressive</p>\r\n', 0),
(2, 1, '<p>as impressive</p>\r\n', 0),
(3, 1, '<p>more impressive</p>\r\n', 1),
(4, 1, '<p>the most impressive</p>\r\n', 0),
(5, 2, '<p>meet</p>\r\n', 1),
(6, 2, '<p>meeting</p>\r\n', 0),
(7, 2, '<p>for meeting</p>\r\n', 0),
(8, 2, '<p>which meet</p>\r\n', 0),
(9, 3, '<p>it grows</p>\r\n', 0),
(10, 3, '<p>to grow</p>\r\n', 1),
(11, 3, '<p>they grow</p>\r\n', 0),
(12, 3, '<p>grow</p>\r\n', 0),
(13, 4, '<p>for the wind to blow determines</p>\r\n', 0),
(14, 4, '<p>causes the wind blowing to determine</p>\r\n', 0),
(15, 4, '<p>to determine what causes the wind to blow</p>\r\n', 1),
(16, 4, '<p>determine the wind&#39;s blowing</p>\r\n', 0),
(17, 5, '<p>The</p>\r\n', 1),
(18, 5, '<p>That the</p>\r\n', 0),
(19, 5, '<p>It was the</p>\r\n', 0),
(20, 5, '<p>There was a</p>\r\n', 0),
(21, 6, '<p>the aim</p>\r\n', 0),
(22, 6, '<p>aimed</p>\r\n', 1),
(23, 6, '<p>who aims</p>\r\n', 0),
(24, 6, '<p>by aiming</p>\r\n', 0),
(25, 7, '<p>that the process</p>\r\n', 0),
(26, 7, '<p>is a process</p>\r\n', 0),
(27, 7, '<p>the process</p>\r\n', 1),
(28, 7, '<p>in which the process</p>\r\n', 0),
(29, 8, '<p>Because of its density</p>\r\n', 0),
(30, 8, '<p>Because it is dense</p>\r\n', 1),
(31, 8, '<p>May be dense</p>\r\n', 0),
(32, 8, '<p>It&#39;s density</p>\r\n', 0),
(33, 9, '<p>and the</p>\r\n', 0),
(34, 9, '<p>and it is the</p>\r\n', 1),
(35, 9, '<p>that the</p>\r\n', 0),
(36, 9, '<p>that it is the</p>\r\n', 0),
(37, 10, '<p>being a nationally celebrated vocalist.</p>\r\n', 0),
(38, 10, '<p>a vocalist was nationally celebrated.</p>\r\n', 0),
(39, 10, '<p>as nationally celebrated vocalist.</p>\r\n', 0),
(40, 10, '<p>a nationally celebrated vocalist.</p>\r\n', 1),
(41, 11, '<p>are cut</p>\r\n', 0),
(42, 11, '<p>cuts</p>\r\n', 0),
(43, 11, '<p>to cut</p>\r\n', 0),
(44, 11, '<p>cutting</p>\r\n', 1),
(45, 12, '<p>contribution was most distinctive</p>\r\n', 0),
(46, 12, '<p>whose most distinctive contribution</p>\r\n', 0),
(47, 12, '<p>most contributions are distinctive</p>\r\n', 0),
(48, 12, '<p>most distinctive contribution</p>\r\n', 1),
(49, 13, '<p>free</p>\r\n', 1),
(50, 13, '<p>are free</p>\r\n', 0),
(51, 13, '<p>which free</p>\r\n', 0),
(52, 13, '<p>when are they free</p>\r\n', 0),
(53, 14, '<p>whistling</p>\r\n', 0),
(54, 14, '<p>is whistling</p>\r\n', 1),
(55, 14, '<p>that whistling is</p>\r\n', 0),
(56, 14, '<p>why is whistling</p>\r\n', 0),
(57, 15, '<p>than much faster</p>\r\n', 0),
(58, 15, '<p>much than faster</p>\r\n', 0),
(59, 15, '<p>much faster than</p>\r\n', 1),
(60, 15, '<p>faster than much</p>\r\n', 0),
(61, 16, '<p>A</p>\r\n', 0),
(62, 16, '<p>B</p>\r\n', 1),
(63, 16, '<p>C</p>\r\n', 0),
(64, 16, '<p>D</p>\r\n', 0),
(65, 17, '<p>A</p>\r\n', 0),
(66, 17, '<p>B</p>\r\n', 1),
(67, 17, '<p>C</p>\r\n', 0),
(68, 17, '<p>D</p>\r\n', 0),
(69, 18, '<p>A</p>\r\n', 1),
(70, 18, '<p>B</p>\r\n', 0),
(71, 18, '<p>C</p>\r\n', 0),
(72, 18, '<p>D</p>\r\n', 0),
(73, 19, '<p>A</p>\r\n', 1),
(74, 19, '<p>B</p>\r\n', 0),
(75, 19, '<p>C</p>\r\n', 0),
(76, 19, '<p>D</p>\r\n', 0),
(77, 20, '<p>A</p>\r\n', 1),
(78, 20, '<p>B</p>\r\n', 0),
(79, 20, '<p>C</p>\r\n', 0),
(80, 20, '<p>D</p>\r\n', 0),
(81, 21, '<p>Spiders</p>\r\n', 0),
(82, 21, '<p>Different types of webs spider make</p>\r\n', 0),
(83, 21, '<p>Dr. Peter N. Witt</p>\r\n', 0),
(84, 21, '<p>Orb spinners and their webs</p>\r\n', 1),
(85, 22, '<p>The pattern</p>\r\n', 1),
(86, 22, '<p>The size</p>\r\n', 0),
(87, 22, '<p>The texture</p>\r\n', 0),
(88, 22, '<p>The length of threads spun by the spiders</p>\r\n', 0),
(89, 23, '<p>arbitrarily</p>\r\n', 1),
(90, 23, '<p>quickly</p>\r\n', 0),
(91, 23, '<p>deffly</p>\r\n', 0),
(92, 23, '<p>incongruously</p>\r\n', 0),
(93, 24, '<p>a photographer</p>\r\n', 0),
(94, 24, '<p>a medic doctor</p>\r\n', 0),
(95, 24, '<p>a person who studies spiders</p>\r\n', 1),
(96, 24, '<p>a person who intensely dislikes spiders</p>\r\n', 0),
(97, 25, '<p>humans who build</p>\r\n', 1),
(98, 25, '<p>other arachnologists</p>\r\n', 0),
(99, 25, '<p>Witt and his associates</p>\r\n', 0),
(100, 25, '<p>orb spinners</p>\r\n', 0),
(101, 26, '<p>both dependent on removable scaffolding</p>\r\n', 1),
(102, 26, '<p>hard to compare</p>\r\n', 0),
(103, 26, '<p>simple to analyze</p>\r\n', 0),
(104, 26, '<p>lenghty procedures</p>\r\n', 0),
(105, 27, '<p>the web</p>\r\n', 1),
(106, 27, '<p>the food source</p>\r\n', 0),
(107, 27, '<p>the female spider</p>\r\n', 0),
(108, 27, '<p>the mating ground</p>\r\n', 0),
(109, 28, '<p>hard-working</p>\r\n', 0),
(110, 28, '<p>cautious</p>\r\n', 0),
(111, 28, '<p>solitary</p>\r\n', 0),
(112, 28, '<p>easily wooed</p>\r\n', 1),
(113, 29, '<p>to initiate courtship of spiders</p>\r\n', 0),
(114, 29, '<p>to engage spiders in usefull activity</p>\r\n', 0),
(115, 29, '<p>to provide a way for spiders to entrap food</p>\r\n', 1),
(116, 29, '<p>to display artistic talents of spiders</p>\r\n', 0),
(117, 30, '<p>Business should use the least expensive form of transortation</p>\r\n', 0),
(118, 30, '<p>Transportation is an important aspect of business</p>\r\n', 1),
(119, 30, '<p>Rail transportation is usually better for companies because it is cheaper than air transport</p>\r\n', 0),
(120, 30, '<p>Most manufacturers choose that fastest from of delivery</p>\r\n', 0),
(121, 31, '<p>the type of goods to be shipped</p>\r\n', 0),
(122, 31, '<p>the expense of the shipping</p>\r\n', 0),
(123, 31, '<p>the time it takes for delivery</p>\r\n', 0),
(124, 31, '<p>the size of its warehouse</p>\r\n', 1),
(125, 32, '<p>is based on the capability and cost effectiveness of a transportation system.</p>\r\n', 1),
(126, 32, '<p>advocates the use of air freight because of its efficiency</p>\r\n', 0),
(127, 32, '<p>suggests trading goods for transportation services</p>\r\n', 0),
(128, 32, '<p>relies on using warehouses for storing goods</p>\r\n', 0),
(129, 33, '<p>a sometimes engage in bartering goods</p>\r\n', 0),
(130, 33, '<p>may choose an expensive from of transportation if costs can be cut in another area</p>\r\n', 1),
(131, 33, '<p>prefer warehouse to air transportation</p>\r\n', 0),
(132, 33, '<p>rarely use rail transport</p>\r\n', 0),
(133, 34, '<p>important to continued successful sales</p>\r\n', 1),
(134, 34, '<p>independent of the other business concerns</p>\r\n', 0),
(135, 34, '<p>not used efficctively by business concerns</p>\r\n', 0),
(136, 34, '<p>too expensive for most mail-order insdustries to use</p>\r\n', 0),
(137, 35, '<p>rail</p>\r\n', 0),
(138, 35, '<p>truck</p>\r\n', 0),
(139, 35, '<p>air freight</p>\r\n', 1),
(140, 35, '<p>any type of cheap transport</p>\r\n', 0),
(141, 36, '<p>Marketing</p>\r\n', 1),
(142, 36, '<p>Statistics</p>\r\n', 0),
(143, 36, '<p>Mechanical engineering</p>\r\n', 0),
(144, 36, '<p>Historia</p>\r\n', 0),
(145, 37, '<p>Insect control</p>\r\n', 0),
(146, 37, '<p>Food harvesting and storage</p>\r\n', 0),
(147, 37, '<p>Tropical climates</p>\r\n', 1),
(148, 37, '<p>Grain loss</p>\r\n', 0),
(149, 38, '<p>dealt with</p>\r\n', 0),
(150, 38, '<p>mailed to</p>\r\n', 0),
(151, 38, '<p>neglected</p>\r\n', 0),
(152, 38, '<p>marketed</p>\r\n', 1),
(153, 39, '<p>Poor planting methods</p>\r\n', 0),
(154, 39, '<p>Damage from vandals</p>\r\n', 1),
(155, 39, '<p>Proper transportation of food products</p>\r\n', 0),
(156, 39, '<p>Harvesting procedures during rainly season</p>\r\n', 0),
(157, 40, '<p>Proper threshing methods</p>\r\n', 0),
(158, 40, '<p>Food preservation</p>\r\n', 0),
(159, 40, '<p>insect control</p>\r\n', 1),
(160, 40, '<p>Agriculture in North America</p>\r\n', 0),
(164, 41, '<p>Agricultural facilities used in North America are not appropriate in all parts of the world</p>\r\n', 1),
(165, 41, '<p>Drying food is easy in tropical climates</p>\r\n', 0),
(166, 41, '<p>African storage facilities are superior to North American ones</p>\r\n', 0),
(167, 41, '<p>Pest control is the biggest problem facing agricultural research today</p>\r\n', 0),
(169, 48, '<p>There are many different airline fares available</p>\r\n', 0),
(170, 48, '<p>Travel agents are all the same</p>\r\n', 0),
(171, 48, '<p>It matters where tickets are issued</p>\r\n', 0),
(172, 48, '<p>It makes no differece where the tickets are purchased</p>\r\n', 1),
(173, 43, '<p>Life in the city</p>\r\n', 0),
(174, 43, '<p>The effect of noise on our lives</p>\r\n', 1),
(175, 43, '<p>Diseases related to stress</p>\r\n', 0),
(176, 43, '<p>Why quiet is hard to find</p>\r\n', 0),
(177, 44, '<p>Humorous</p>\r\n', 0),
(178, 44, '<p>Critical</p>\r\n', 1),
(179, 44, '<p>Emotional</p>\r\n', 0),
(180, 44, '<p>Indifferent</p>\r\n', 0),
(181, 45, '<p>oversleeping</p>\r\n', 1),
(182, 45, '<p>stress</p>\r\n', 0),
(183, 45, '<p>higher blood pressure</p>\r\n', 0),
(184, 45, '<p>heightened aggression</p>\r\n', 0),
(185, 46, '<p>in the morning</p>\r\n', 0),
(186, 46, '<p>when we can&#39;t control it</p>\r\n', 1),
(187, 46, '<p>in the mountains</p>\r\n', 0),
(188, 46, '<p>from traffic</p>\r\n', 0),
(189, 49, '<p>They should be picked before they&#39;re ripe.</p>\r\n', 0),
(190, 49, '<p>They should have been picked already.</p>\r\n', 0),
(191, 49, '<p>They&#39;ll get picked when they turn a certain color</p>\r\n', 1),
(192, 49, '<p>They won&#39;t be picked until next year</p>\r\n', 0),
(193, 51, '<p>Watching a movie.</p>\r\n', 0),
(194, 51, '<p>Talking on the phone.</p>\r\n', 0),
(195, 51, '<p>Picking up her friends.</p>\r\n', 0),
(196, 51, '<p>Eating dinner.</p>\r\n', 1),
(197, 52, '<p>Notify the post office of his new address.</p>\r\n', 1),
(198, 52, '<p>Check to see if the mail has arrived</p>\r\n', 0),
(199, 52, '<p>Send the letter by special delivery</p>\r\n', 0),
(200, 52, '<p>Answer the letter after he moves.</p>\r\n', 0),
(201, 53, '<p>Talk to Dr. Boyd about an assignment.</p>\r\n', 1),
(202, 53, '<p>Return their books to the library.</p>\r\n', 0),
(203, 53, '<p>Meet Dr. Boyd at the library</p>\r\n', 0),
(204, 53, '<p>Make an appointment with their teacher on Friday.</p>\r\n', 0),
(205, 54, '<p>There is no orange juice in the machine.</p>\r\n', 1),
(206, 54, '<p>He doesn&#39;t like orange juice.</p>\r\n', 0),
(207, 54, '<p>He prefers milk to orange juice.</p>\r\n', 0),
(208, 54, '<p>The machine is broken</p>\r\n', 0),
(209, 55, '<p>The man shouldn&#39;t take the new job.</p>\r\n', 0),
(210, 55, '<p>She&#39;s sorry the man isn&#39;t being promoted</p>\r\n', 0),
(211, 55, '<p>It isn&#39;t easy to keep secrets at work.</p>\r\n', 0),
(212, 55, '<p>She won&#39;t tell anyone about the man&#39;s promotion.</p>\r\n', 1),
(213, 56, '<p>The exam had more sections than she expected.</p>\r\n', 0),
(214, 56, '<p>She was surprised that the exam was so difficult.</p>\r\n', 0),
(215, 56, '<p>Part of the exam was easier than she expected.</p>\r\n', 1),
(216, 56, '<p>She didn&#39;t have time to study for the exam.</p>\r\n', 0),
(217, 57, '<p>The bank was closed when she got there.</p>\r\n', 0),
(218, 57, '<p>The bank stayed open later than usual.</p>\r\n', 0),
(219, 57, '<p>She was able to do her banking.</p>\r\n', 1),
(220, 57, '<p>She didn&#39;t have enough time to go to the bank.</p>\r\n', 0),
(221, 58, '<p>To get help in finding a new college.</p>\r\n', 1),
(222, 58, '<p>To change his major.</p>\r\n', 0),
(223, 58, '<p>To fill out an application for college.</p>\r\n', 0),
(224, 58, '<p>To find out how to change dormitories.</p>\r\n', 0),
(225, 59, '<p>A small school does not offer awide range of courses.</p>\r\n', 0),
(226, 59, '<p>His tuition will not be refunded.</p>\r\n', 0),
(227, 59, '<p>Changing majors involves a lot of paperwork.</p>\r\n', 0),
(228, 59, '<p>He may not be able to transfer all his credits.</p>\r\n', 1),
(229, 60, '<p>He doesn&#39;t like his professors.</p>\r\n', 0),
(230, 60, '<p>His classes are too difficult.</p>\r\n', 0),
(231, 60, '<p>He can&#39;t transfer his credit from his previous school.</p>\r\n', 0),
(232, 60, '<p>He doesn&#39;t get along with his roommates.</p>\r\n', 1),
(233, 61, '<p>The registrar&#39;s office.</p>\r\n', 0),
(234, 61, '<p>The admissions office.</p>\r\n', 0),
(235, 61, '<p>The housing office.</p>\r\n', 1),
(236, 61, '<p>The math departement.</p>\r\n', 0),
(237, 62, '<p>She has won a literary award.</p>\r\n', 0),
(238, 62, '<p>She has been profiled in a literary journal.</p>\r\n', 0),
(239, 62, '<p>Her novel has sold very well.</p>\r\n', 1),
(240, 62, '<p>Her contact with a publisherhas been extended</p>\r\n', 0),
(241, 63, '<p>A criminal.</p>\r\n', 0),
(242, 63, '<p>A poet.</p>\r\n', 0),
(243, 63, '<p>A radio announcer</p>\r\n', 0),
(244, 63, '<p>A police officer</p>\r\n', 1),
(245, 64, '<p>To learn more about her research findings.</p>\r\n', 0),
(246, 64, '<p>To learn how she writes so many books.</p>\r\n', 1),
(247, 64, '<p>To find out how she learned to write poetry</p>\r\n', 0),
(248, 64, '<p>TO find ways to improve his own writing</p>\r\n', 0),
(249, 65, '<p>To take note for newspaper articles.</p>\r\n', 0),
(250, 65, '<p>To keep track of the number of hours she spends writing.</p>\r\n', 0),
(251, 65, '<p>To record ideas she has when she is not at her desk.</p>\r\n', 1),
(252, 65, '<p>To document evidence for a police investigation.</p>\r\n', 0),
(253, 66, '<p>Preparing for hurricane.</p>\r\n', 1),
(254, 66, '<p>Damage caused by a hurricane</p>\r\n', 0),
(255, 66, '<p>Coastal weather patterns</p>\r\n', 0),
(256, 66, '<p>Evacuation procedures.</p>\r\n', 0),
(257, 67, '<p>The navy.</p>\r\n', 0),
(258, 67, '<p>A government weather agency.</p>\r\n', 1),
(259, 67, '<p>State police headquarters.</p>\r\n', 0),
(260, 67, '<p>A local shelter</p>\r\n', 0),
(261, 68, '<p>Cover windows.</p>\r\n', 0),
(262, 68, '<p>Buy a supply of food and water</p>\r\n', 1),
(263, 68, '<p>Locate the nearest shelter</p>\r\n', 0),
(264, 68, '<p>Leave coastal areas</p>\r\n', 0),
(265, 69, '<p>Gas station might not be open.</p>\r\n', 1),
(266, 69, '<p>Fuel might increase in price</p>\r\n', 0),
(267, 69, '<p>They may need to drive neighbors to shelters.</p>\r\n', 0),
(268, 69, '<p>There may be long lines at the gas stations.</p>\r\n', 0),
(269, 70, '<p>The properties of quartz crystal.</p>\r\n', 0),
(270, 70, '<p>A method of identifying minerals.</p>\r\n', 1),
(271, 70, '<p>The life of Friedrich Mohs.</p>\r\n', 0),
(272, 70, '<p>A famous collection of minerals.</p>\r\n', 0),
(273, 71, '<p>Its estimated value.</p>\r\n', 0),
(274, 71, '<p>Its crystalline structure.</p>\r\n', 0),
(275, 71, '<p>Its chemical composition.</p>\r\n', 0),
(276, 71, '<p>Its relative hardness.</p>\r\n', 1),
(277, 72, '<p>Collect some minerals as homework.</p>\r\n', 0),
(278, 72, '<p>Identify the tools he is using.</p>\r\n', 0),
(279, 72, '<p>Apply the information given in the talk.</p>\r\n', 1),
(280, 72, '<p>Pass their papers to the front of the room.</p>\r\n', 0),
(281, 73, '<p>When it is scratched in different directions.</p>\r\n', 1),
(282, 73, '<p>When greater pressure is applied.</p>\r\n', 0),
(283, 73, '<p>When its surface is scratched too freequently.</p>\r\n', 0),
(284, 73, '<p>When the tester uses the wrong tools.</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` int(11) NOT NULL,
  `peserta_user_id` int(11) NOT NULL,
  `peserta_nim` int(11) NOT NULL,
  `peserta_nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `peserta_kelas` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `peserta_kelas_toefl` varchar(255) NOT NULL,
  `peserta_kelas_topsis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `peserta_user_id`, `peserta_nim`, `peserta_nama`, `peserta_kelas`, `peserta_kelas_toefl`, `peserta_kelas_topsis`) VALUES
(16, 17, 19650156, 'Nabil Rahmad I.', 'D', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(17, 18, 19650026, 'Thoriq Harizul Ahsan', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(18, 19, 19650109, 'Kevin Naufal Fahrezi', 'A', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(19, 20, 19650045, 'sari indah lestari', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(20, 21, 19650039, 'Moch Wahyu Fitra Choiri', 'A', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(21, 22, 19650092, 'Alvi Durunnafis', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(22, 23, 19650057, 'Syarif Hidayatulloh', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(23, 24, 19650110, 'Rega Harris Dea Saputra', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(24, 25, 19650079, 'Rahmat Zaki Muharom', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(25, 26, 19650062, 'KAMAL AL AKMAL', 'PKPBI B', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(26, 27, 19650139, 'Qanita Farah Fadilah', 'B', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(27, 28, 19650086, 'Rashad Fathin Kurniawan', 'Bahasa Inggris 2 D', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(28, 29, 19650116, 'Miftahul Hikmah', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(29, 30, 19650128, 'M Halvi Rahman', 'C', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(30, 31, 19650064, 'Rahma Khairunisa', 'D', 'Belum Dapat Kelas', 'Belum Dapat Kelas'),
(31, 31, 19650064, 'Rahma Khairunisa', 'D', 'Belum Dapat Kelas', 'Belum Dapat Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `soal_cbt`
--

CREATE TABLE `soal_cbt` (
  `soal_id` int(11) NOT NULL,
  `soal_jenis` int(11) NOT NULL DEFAULT 1 COMMENT '1=reading, 2=Listening, 3=Structure & Written Expression',
  `soal_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soal_audio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_cbt`
--

INSERT INTO `soal_cbt` (`soal_id`, `soal_jenis`, `soal_text`, `soal_audio`) VALUES
(1, 3, '<p>No spectacle in the universe is __________ than an exploding star.</p>\r\n', ''),
(2, 3, '<p>The Allegheny and Monongahela rivers ________ in Pittsburg, Pennsylvania, to from the Ohio River.</p>\r\n', ''),
(3, 3, '<p>The horns of a rhinoceros continue ________ throughout its entire lifetime.</p>\r\n', ''),
(4, 3, '<p>Mathematic helps meteorologists to predict the weather more accurately, to calculate the speed of stroom, and ________</p>\r\n', ''),
(5, 3, '<p>________ position of the planet Earth in relation to the Sun is always changing a little bit.</p>\r\n', ''),
(6, 3, '<p>Systems of phonetic writing are ________ at transcribing accurately any sequence of speech sound.</p>\r\n', ''),
(7, 3, '<p>In photosynthesis, ________ through which green plants manufacture food, energy from direct sunlight is trapped by a subtance called chlorophyll.</p>\r\n', ''),
(8, 3, '<p>________ and hard, ivoray may be carved with great delicacy into intricate patterns.</p>\r\n', ''),
(9, 3, '<p>A solar eclipse occurs when the Moon is between the Sun and the Earth, ________ shadow of the Moon moves across the face of the Earth.</p>\r\n', ''),
(10, 3, '<p>The spectaculary beautiful and sultry voice of Lena Horne made her ________</p>\r\n', ''),
(11, 3, '<p>The existence of very long channels ________ into the deep-sea floor of the Atlantic and Pacific oceans has been well documented.</p>\r\n', ''),
(12, 3, '<p>Lillian Wald&#39;s ________ lies in the field of public health nursing.</p>\r\n', ''),
(13, 3, '<p>Fine rubies ________ of flaws are extremely rare and command high prices.</p>\r\n', ''),
(14, 3, '<p>In some parts of the world, not only ________ a form of entertainment, but it is also a means of communication.</p>\r\n', ''),
(15, 3, '<p>Invented in the 1780&#39;s threshing machines enabled faarmers to process grain ________ they could by hand.</p>\r\n', ''),
(16, 3, '<p><ins>In</ins><strong>(A)</strong>&nbsp;1968, John Stenback <ins>was gave</ins><strong>(B)</strong>&nbsp;the Nobel Prize <ins>for<strong>(C)</strong></ins>&nbsp;literature for his <ins>acclaimed</ins><strong>(D)</strong>&nbsp;novel, The Grapes of Wrath.</p>\r\n', ''),
(17, 3, '<p>Nutritionists currently believe <ins>that<strong>(A)</strong></ins>&nbsp;vitamin A and beta-carotene <ins>aids<strong>(B)</strong></ins>&nbsp;<ins>in preventing<strong>(C)</strong></ins>&nbsp;some <ins>kinds<strong>(D)</strong></ins>&nbsp;of cancer.</p>\r\n', ''),
(18, 3, '<p>Democrats had (<ins>dominated)</ins><strong>(A)</strong>&nbsp;the White House (<ins>for)</ins><strong>(B)</strong>&nbsp;five terms (<ins>when)</ins><strong>(C)</strong>&nbsp;Republican Dwilight D. Eisenhower (<ins>was elected)</ins><strong>(D)</strong>&nbsp;in 1952.</p>\r\n', ''),
(19, 3, '<p>Important news (<ins>are)</ins><strong>(A)</strong>&nbsp;now conveyed (<ins>electronically)</ins><strong>(B)</strong>&nbsp;from one side of the globe (<ins>to)</ins><strong>(C)</strong>&nbsp;the other (<ins>in a matter of)</ins><strong>(D)</strong>&nbsp;seconds.</p>\r\n', ''),
(20, 3, '<p>The 1960 presidential campaign was marked by an innovation (<ins>into)</ins><strong>(A)</strong>&nbsp;American politics - a series of (<ins>television debates)</ins><strong>(B)</strong>&nbsp;(<ins>in)</ins><strong>(C)</strong> which the two candidates (<ins>responded)</ins><strong>(D)</strong>&nbsp;to questions put by newspaper reporters.</p>\r\n', ''),
(21, 1, '<p><strong>(For Question 1 - 9)</strong></p>\r\n\r\n<p>Spider produce three basic types of webs, The&nbsp;sheet webs a two-dimensional layer of threads seemingly laid out <strong>at random</strong>. The space web is a three-dimensional, wispy structure. The orb web, by far the most familiar, is two-dimensional cartwheel pattern.</p>\r\n\r\n<p>Of The 30,000 spider species, some 6,000 are orb spinners. For three decades Dr. Peter N. Witt has studies orb spinners, especially a species called&nbsp;<em>Areneus diadematus</em>, and their webs. Witt is a German-born medical doctor and self-taught arachnologis, whose passion is to understand the ways of spiders. Witt has delved deeply into the behavior of spiders and vastly expanded our knowledge about orb spinners and their webs. Some of his findings have even amazed other arachnologists.</p>\r\n\r\n<p>&quot;We have actually compared human building activities to spider building, and we find an enormous amount of parallel between the two, &quot; Witt says. For one thing, just like<strong> their </strong>human counterparts in the building trades, or spinners erect a from of removable scaffolding as they weave their webs.</p>\r\n\r\n<p>Orb spinners are solitary creatures who dwell one to a web. The&nbsp;web is home, food source, and mating ground, and it is guarded aggressively. When a male arrives at mating time, the courtship ritual is an intricate set of advances and retreats until the female is finally won over and no longer tries to kill her would-be lover.</p>\r\n\r\n<p>Orb spinners each weave a new web every day, working in the predawn darkness and executing the distinctive pattern of concentric circles and radial lines in a half hour or less. There is nothing as important as web building, because without the web there is no food&quot; Witt says.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The topic of this passage is......</p>\r\n', ''),
(22, 1, '<p>According to the passager, the difference between the sheet web and the orb web is...</p>\r\n', ''),
(23, 1, '<p>&quot;The&nbsp;sheet webs a two-dimensional layer of threads seemingly laid out&nbsp;<strong>at random.&quot;&nbsp;</strong>The phrase &quot;at random&quot; in line 2 is closest in meaning to...</p>\r\n', ''),
(24, 1, '<p>We can infer from the passage that an arachnologist is...</p>\r\n', ''),
(25, 1, '<p>&quot;For one thing, just like their human counterparts in....&quot;. The word &quot;their&quot; in paragraph 3 refers to...</p>\r\n', ''),
(26, 1, '<p>According to the passage, web-making by spiders and human building activities are...</p>\r\n', ''),
(27, 1, '<p>&quot;....and it is guarded aggressively.&quot; The word &quot;it&quot; in paragraph 4 refer to...</p>\r\n', ''),
(28, 1, '<p>We can infer that female orb spinner is <strong>NOT</strong>...</p>\r\n', ''),
(29, 1, '<p>We can conclude from the passage that the purpose of webs is...</p>\r\n', ''),
(30, 1, '<p><strong>(For Questions 10 - 16)</strong></p>\r\n\r\n<p>For any business, the cost of transportation is nomally the largest single item in the overall cost of physical distribution. It doesn&#39;t necessarily follow, though, that manufacturer should simply pick the cheapest available from of transportation. many companies today use the total physical distribution concept, an appoarch that involves maximizing the efficiency of phisical distribution activities while minimizing their cost. often, this means that the company will make<strong> cost tradeoffs </strong>between the various phisical distribution activities. For instance, air dreight may be much more expensive than rail transport, but a national manufacturer might use air freight to ship everthing from a single warehouse and thus avoid the greater expense of maintaining several warehouses.</p>\r\n\r\n<p>When a firm choose a type of transportation, it has to bear in mind its other marketing concern-storage, financing, sales, inventory size, and the like . Transportation, in fact, can be an especially important sales tool. If the firm can supply<strong> its</strong> costumers&#39; needs more quickly and reliabily than its competitors do, it will have a vital advantage: so it maybe more prfitable in the long run to pay higher transportation costs, rather than risk the loss of future sales. In addition, speedy delivery is crucial in some industries. A mail-order distribution sending fruit from Oregon to Pennsylvania needs the promptness of air freight. On the other gand a manufacturer shipping lingerie from New York to Massachusetts may be perfectly satisfied with slower (and cheaper) truck or rail transport.</p>\r\n\r\n<p>The passage support which of the following statements?</p>\r\n', ''),
(31, 1, '<p>According to the passage, all of the following would influence the type of transportation that a company might choose <strong>EXCEPT</strong></p>\r\n', ''),
(32, 1, '<p>The author states in the passage that the total physical distribution concept</p>\r\n', ''),
(33, 1, '<p>&quot;this means that the company will make<strong> cost tradeoffs </strong>between....&quot; The phrase &quot;cost tradeoffs&quot; in paragraph 1 means that companies...</p>\r\n', ''),
(34, 1, '<p>It can be inferred from the passage that transportation is...</p>\r\n', ''),
(35, 1, '<p>We can conclude from the pasage that a business that deals in perishable goods would probably choose to ship by...</p>\r\n', ''),
(36, 1, '<p>This passage would probably be assigned reading in which of the following academic courses?</p>\r\n', ''),
(37, 1, '<p><strong>Question 17 - 21</strong></p>\r\n\r\n<p>Insect control is only the one of the problems being <strong>addressed</strong> by cooperative agricultural research teams. Besides the problem of peats, great quantities of food are lost by improper threshing methods and by poor handling, storage, and food preservation.</p>\r\n\r\n<p>Fermentation and mold during wet-season crop harvesting and badly organized drying and miling facilities lose much grain. Grain dryers that work for North America may be useless in tropical climates. Grain bins designed for gentle prairie winds are no good for Africa&#39;s blazing sun. Developing the right storage facilities for local conditions is a great need.</p>\r\n\r\n<p>This passage mainly discusses......</p>\r\n', ''),
(38, 1, '<p>&quot;Insect control is only the one of the problems being <strong>addressed</strong> by cooperative.....&quot;. The word &quot;addressed&quot; in paragraph 1 is closest in meaning to....</p>\r\n', ''),
(39, 1, '<p>According to the passager, one problem leading to crop loss is....</p>\r\n', ''),
(40, 1, '<p>what did the paragraph preceding this passage most probably discuss?</p>\r\n', ''),
(41, 1, '<p>It can be inferred from the passage that....</p>\r\n', ''),
(43, 1, '<p><strong>Question 22 - 25</strong></p>\r\n\r\n<p>Noise is a given in our everyday lives. Form the moment the alarm clock buzzes or the garbage trucks route us, to the time we fall asleep despite the neighbor&#39;s stereo, we accommodate noisy instruction.</p>\r\n\r\n<p>Studies suggest that we pay a price for adapting to noise: higher blood pressure , heart rate, and adrenaline secretion - even after the noise stops; heightened aggression; impaired resistance to disease; a sense of a helplessness. In term of stress, unpredictability is an important factor. Studies suggest that when we can control noise, its effects are much less damaging.</p>\r\n\r\n<p>Although there are no studies on effect of quiet in repairing the stress of noise, those who have studied the physiological effect of noise believethat quiet providesan escape. Most people who work in a busy and fairly noisy environment love quiet and need it desperately.</p>\r\n\r\n<p>We are so acclimated to noise that complete quiet is sometimes unsetting. you might have trouble sleeping on vacation in the mountains, for example, without the background sound of traffic. But making the efford to find quiet gives us a chance to hear&nbsp; ourselves think, to become attuned to the world around us, to find peacefulness and calm. It provides a serene antidote to the intrusively loud world we live in the rest of the day.</p>\r\n\r\n<p>This passage mainly discusses....</p>\r\n', ''),
(44, 1, '<p>What is the author&#39;s attitude toward noise in the passage?</p>\r\n', ''),
(45, 1, '<p>According to the passage, noise cause all of the following&nbsp;<strong>EXCEPT</strong>....</p>\r\n', ''),
(46, 1, '<p>The author indicates in the passage that stress from noise occurs mainly....</p>\r\n', ''),
(48, 2, '', 'soal_1.mp3'),
(49, 2, '', 'soal_2.mp3'),
(51, 2, '', 'soal_5.mp3'),
(52, 2, '', 'soal_6.mp3'),
(53, 2, '', 'soal_8.mp3'),
(54, 2, '', 'soal_9.mp3'),
(55, 2, '', 'soal_10.mp3'),
(56, 2, '', 'soal_15.mp3'),
(57, 2, '', 'soal_17.mp3'),
(58, 2, '<p>(Question 35&nbsp;- 38)</p>\r\n', 'soal_gabungan_31.mp3'),
(59, 2, '', 'soal_32.mp3'),
(60, 2, '', 'soal_33.mp3'),
(61, 2, '', 'soal_34.mp3'),
(62, 2, '<p>(Question 39&nbsp;- 42)</p>\r\n', 'soal_gabungan_35.mp3'),
(63, 2, '', 'soal_36.mp3'),
(64, 2, '', 'soal_371.mp3'),
(65, 2, '', 'soal_38.mp3'),
(66, 2, '<p>(Question 43&nbsp;- 46)</p>\r\n', 'soal_gabungan_39.mp3'),
(67, 2, '', 'soal_40.mp3'),
(68, 2, '', 'soal_41.mp3'),
(69, 2, '', 'soal_42.mp3'),
(70, 2, '<p>(Question 47 - 50)</p>\r\n', 'soal_gabungan_47.mp3'),
(71, 2, '', 'soal_48.mp3'),
(72, 2, '', 'soal_49.mp3'),
(73, 2, '', 'soal_50.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `ujian_id` int(11) NOT NULL,
  `ujian_peserta_id` int(11) NOT NULL,
  `ujian_soal_id` int(11) NOT NULL,
  `ujian_jawaban_id` int(11) NOT NULL,
  `ujian_ragu` int(11) NOT NULL DEFAULT 0 COMMENT '0=tidak ragu, 1=ragu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`ujian_id`, `ujian_peserta_id`, `ujian_soal_id`, `ujian_jawaban_id`, `ujian_ragu`) VALUES
(1, 23, 21, 84, 0),
(2, 23, 22, 85, 0),
(3, 23, 23, 89, 0),
(4, 23, 24, 95, 0),
(5, 23, 25, 99, 0),
(6, 23, 26, 103, 0),
(7, 23, 27, 105, 0),
(8, 23, 28, 110, 0),
(9, 23, 29, 113, 0),
(10, 23, 30, 118, 0),
(11, 23, 31, 124, 0),
(12, 23, 32, 125, 0),
(13, 23, 33, 130, 0),
(14, 23, 34, 133, 0),
(15, 23, 35, 139, 0),
(16, 23, 36, 141, 0),
(17, 23, 37, 148, 0),
(18, 23, 38, 149, 0),
(19, 23, 39, 153, 0),
(20, 23, 40, 158, 0),
(21, 23, 41, 165, 0),
(22, 23, 43, 174, 0),
(23, 23, 44, 180, 0),
(24, 23, 45, 181, 0),
(25, 23, 46, 186, 0),
(26, 23, 1, 3, 0),
(27, 23, 2, 8, 0),
(28, 23, 3, 10, 0),
(29, 23, 4, 16, 0),
(30, 23, 5, 17, 0),
(31, 23, 6, 23, 0),
(32, 23, 7, 27, 0),
(33, 23, 8, 30, 0),
(34, 23, 9, 36, 0),
(35, 23, 10, 40, 0),
(36, 23, 11, 44, 0),
(37, 23, 12, 45, 0),
(38, 23, 13, 49, 0),
(39, 23, 14, 53, 0),
(40, 23, 15, 59, 0),
(41, 23, 16, 64, 0),
(42, 23, 17, 67, 0),
(43, 23, 18, 71, 0),
(44, 23, 19, 73, 0),
(45, 23, 20, 79, 0),
(46, 23, 48, 170, 0),
(47, 23, 49, 192, 0),
(48, 23, 51, 194, 0),
(49, 23, 52, 197, 0),
(50, 23, 53, 203, 0),
(51, 23, 54, 206, 0),
(52, 23, 55, 209, 0),
(53, 23, 56, 215, 0),
(54, 23, 57, 220, 0),
(55, 23, 58, 224, 0),
(56, 23, 59, 226, 0),
(57, 23, 60, 229, 0),
(58, 23, 61, 234, 0),
(59, 23, 62, 239, 0),
(60, 23, 63, 244, 0),
(61, 23, 64, 246, 0),
(62, 23, 65, 249, 0),
(63, 23, 66, 256, 0),
(64, 23, 67, 258, 0),
(65, 23, 68, 261, 0),
(66, 23, 69, 265, 0),
(67, 23, 70, 269, 0),
(68, 23, 71, 276, 0),
(69, 23, 72, 278, 0),
(70, 23, 73, 282, 0),
(71, 28, 21, 82, 0),
(72, 28, 22, 85, 0),
(73, 28, 23, 92, 0),
(74, 28, 24, 95, 0),
(75, 28, 25, 100, 0),
(76, 28, 26, 103, 0),
(77, 28, 27, 105, 0),
(78, 28, 28, 112, 0),
(79, 28, 29, 115, 0),
(80, 28, 48, 172, 0),
(81, 28, 49, 191, 0),
(82, 28, 51, 196, 0),
(83, 28, 52, 198, 0),
(84, 28, 53, 204, 0),
(85, 28, 54, 205, 0),
(86, 28, 55, 212, 0),
(87, 28, 56, 215, 0),
(88, 28, 57, 219, 0),
(89, 28, 58, 221, 0),
(90, 28, 59, 227, 0),
(91, 28, 60, 232, 0),
(92, 28, 61, 236, 0),
(93, 28, 62, 239, 0),
(94, 28, 63, 244, 0),
(95, 28, 64, 248, 0),
(96, 28, 65, 251, 0),
(97, 28, 66, 253, 0),
(98, 28, 67, 258, 0),
(99, 28, 68, 262, 0),
(100, 28, 69, 265, 0),
(101, 28, 1, 3, 0),
(102, 28, 2, 5, 0),
(103, 28, 3, 10, 0),
(104, 28, 4, 15, 0),
(105, 28, 5, 17, 0),
(106, 28, 6, 21, 0),
(107, 28, 7, 25, 0),
(108, 28, 8, 30, 0),
(109, 28, 9, 33, 0),
(110, 28, 10, 37, 0),
(111, 28, 11, 42, 0),
(112, 28, 12, 45, 0),
(113, 28, 13, 51, 0),
(114, 28, 14, 53, 0),
(115, 28, 15, 59, 0),
(116, 28, 16, 62, 0),
(117, 28, 17, 66, 0),
(118, 28, 18, 69, 0),
(119, 28, 19, 76, 0),
(120, 28, 20, 79, 0),
(121, 28, 30, 118, 0),
(122, 28, 31, 122, 0),
(123, 28, 32, 125, 0),
(124, 28, 33, 130, 0),
(125, 28, 34, 133, 0),
(126, 28, 35, 140, 0),
(127, 28, 36, 141, 0),
(128, 28, 37, 145, 0),
(129, 28, 38, 149, 0),
(130, 28, 39, 153, 0),
(131, 28, 40, 158, 0),
(132, 28, 41, 164, 0),
(133, 28, 43, 174, 0),
(134, 28, 44, 177, 0),
(135, 28, 45, 184, 0),
(136, 28, 46, 186, 0),
(137, 28, 70, 270, 0),
(138, 28, 71, 274, 0),
(139, 28, 72, 277, 0),
(140, 28, 73, 284, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses`) VALUES
(1, 'burhan', 'burhan0211', 1),
(17, '19650156', '12345', 2),
(18, '19650026', '19650026', 2),
(19, '19650109', 'drogba', 2),
(20, '19650045', 'sarindahlestari1234', 2),
(21, '19650039', 'as322655', 2),
(22, '19650092', 'alvidurunnafis', 2),
(23, '19650057', 'dayat', 2),
(24, '19650110', 'Rega1903', 2),
(25, '19650079', 'Demituhan_5_', 2),
(26, '19650062', '14april2001', 2),
(27, '19650139', 'haifar', 2),
(28, '19650086', 'fathin', 2),
(29, '19650116', 'metoderaphson!1', 2),
(30, '19650128', 'halvirahman00', 2),
(31, '19650064', 'pkpbi', 2),
(32, '19650064', 'pkpbi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `waktu_ujian`
--

CREATE TABLE `waktu_ujian` (
  `waktu_ujian_id` int(11) NOT NULL,
  `waktu_ujian_peserta_id` int(11) NOT NULL,
  `awal` time NOT NULL,
  `sekarang` time NOT NULL,
  `berhenti` time NOT NULL,
  `selesai` int(11) NOT NULL DEFAULT 0 COMMENT '0=belum, 1=selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waktu_ujian`
--

INSERT INTO `waktu_ujian` (`waktu_ujian_id`, `waktu_ujian_peserta_id`, `awal`, `sekarang`, `berhenti`, `selesai`) VALUES
(1, 20, '01:30:00', '01:29:52', '00:00:00', 0),
(2, 23, '01:30:00', '00:27:30', '00:27:30', 1),
(3, 28, '01:30:00', '00:35:31', '00:35:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban_cbt`
--
ALTER TABLE `jawaban_cbt`
  ADD PRIMARY KEY (`jawaban_id`),
  ADD KEY `soal_id` (`jawaban_soal_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`),
  ADD KEY `id_user` (`peserta_user_id`);

--
-- Indexes for table `soal_cbt`
--
ALTER TABLE `soal_cbt`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`ujian_id`),
  ADD KEY `peserta_id` (`ujian_peserta_id`),
  ADD KEY `soal_id` (`ujian_soal_id`),
  ADD KEY `jawaban_id` (`ujian_jawaban_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  ADD PRIMARY KEY (`waktu_ujian_id`),
  ADD KEY `peserta_id` (`waktu_ujian_peserta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban_cbt`
--
ALTER TABLE `jawaban_cbt`
  MODIFY `jawaban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `soal_cbt`
--
ALTER TABLE `soal_cbt`
  MODIFY `soal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `ujian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  MODIFY `waktu_ujian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban_cbt`
--
ALTER TABLE `jawaban_cbt`
  ADD CONSTRAINT `jawaban_cbt_ibfk_1` FOREIGN KEY (`jawaban_soal_id`) REFERENCES `soal_cbt` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`peserta_user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`ujian_jawaban_id`) REFERENCES `jawaban_cbt` (`jawaban_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`ujian_soal_id`) REFERENCES `soal_cbt` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ujian_ibfk_3` FOREIGN KEY (`ujian_peserta_id`) REFERENCES `peserta` (`peserta_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  ADD CONSTRAINT `waktu_ujian_ibfk_1` FOREIGN KEY (`waktu_ujian_peserta_id`) REFERENCES `peserta` (`peserta_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
