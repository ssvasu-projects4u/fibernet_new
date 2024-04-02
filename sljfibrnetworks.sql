-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 01:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sljfibrnetworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_lead`
--

CREATE TABLE `add_lead` (
  `id` int(11) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `customer_name` varchar(50) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `landmark` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `priority` varchar(20) DEFAULT NULL,
  `lead_source` varchar(30) DEFAULT NULL,
  `lead_type` varchar(30) DEFAULT NULL,
  `conn_type` varchar(30) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `from_time` varchar(30) DEFAULT NULL,
  `to_time` varchar(30) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_lead`
--

INSERT INTO `add_lead` (`id`, `branch`, `customer_name`, `mobile`, `address_1`, `address_2`, `landmark`, `email`, `priority`, `lead_source`, `lead_type`, `conn_type`, `notes`, `status`, `date`, `from_date`, `from_time`, `to_time`, `to_date`, `last_update`) VALUES
(1, 'NagaramPalem', 'OGIRALA VENKAT ROHITH', '8297723638', '402', '', 'ANDHRA PRADESH', 'ogiralavenkatrohith@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'Call Back', '2019-04-01', '0000-00-00', '', '', '0000-00-00', '2019-04-08'),
(2, 'Panduranga landmark', 'Vamshi kilaru', '9703471965', '101', '', 'Inner ring road', 'vamshikilaru1aj@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'On Progress', '2019-04-05', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(3, 'Arundelpet', 'Lokesh', '9030520419', '10/3', '', 'Opp Tea Stall', 'lokesh@siimatechnologies.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'Confirm FSB', '2019-04-05', '2019-04-30', '1:30am', '3:30am', '2019-05-01', '2019-04-05'),
(4, 'Lakshmipuram', 'Mastan', '7730956277', '3rd Line, Lakshmi Puram', '', 'Near Relince Degital', 'mastan1893@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'Call Back', '2019-04-05', '0000-00-00', '', '', '0000-00-00', '2019-04-05'),
(5, 'Sangadi Gunta', 'PATHAN FIROZ KHAN', '9700689838', '64-3-1648', '', 'Yanadi colony 10th line old guntur', 'modernagrofiroz@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-04-05', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(6, 'Swarna Bharathi Nagar', 'Shaik Javed', '7097832542', 'Door No 123-18-3027 8th Lane B Block Swarna bharathi Nagar', '', 'Andhrapradesh', 'javidhymad5@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-04-08', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(7, 'Anantavarapadu', 'balashowry', '7799620955', 'Door No:2-120, ', '', 'Near Ramayalam,', 'balashowry.a@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'NC', '2019-04-14', '0000-00-00', '', '', '0000-00-00', '2019-04-14'),
(8, 'Koritepadu', 'ravi', '9908989189', '12-18', '', 'NEAR RAMA BUILDINGS', 'RAVIDAR3@GMAIL.COM', 'medium', 'Website Lead', 'Home', 'Cable', '', 'FSB Clear', '2019-04-26', '0000-00-00', '', '', '0000-00-00', '2019-04-26'),
(9, 'Aphb landmark', 'Rsbxystx', 'Tdodiyd', 'Kgdkgxgx', '', 'Kgxkgzkzg', 'fuchc@itsitsti.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-05-09', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(10, 'AT Agraharam', 'G VASUDEVA RAJU', '9494825944', '92-5-362', '', '11th line', 'vasu.granitemart@gmail.com', 'medium', 'Website Lead', 'Home', 'Cable', '', 'On Progress', '2019-05-11', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(11, 'AT Agraharam', 'Aravind', '8019089992', '26-36-194', '', 'Ankamma Nagar', 'aravindpuvvaada@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-05-11', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(12, 'Swarna Bharathi Nagar', 'Shaik Javed', '7097832542', 'Door No 435 8th Lane B Block Swarna bharathi Nagar', '', 'Andhrapradesh', 'javidhymad5@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-05-12', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(13, 'Nayi Brahmana landmark', 'Suresh Babu ', '9923548566', '105, 4th line maruthi nagar ', '', 'Near ramu hotel ', 'sbabu.bo9@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-05-31', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(14, 'Gujjana Gundla', 'UMA SANKAR MOOLAM', '8500620020', 'Flat No. 304,Vijaya Lakshmi Apts,Opp road of Banti Chamanthi Show Room', '', 'ANDHRA PRADESH', 'umasankar.moolam@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-06-04', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(15, 'Kotapet', 'sai kumar pabb', '9100054556', '62-18-831', '', 'sai baba temple', 'sai.pabbala@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'On Progress', '2019-06-04', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(16, 'Vinayak Nagar', 'Kalyan chakravarthy', '9347734879', '4-5-32/40', '', 'Near little flower school', 'kalyan.pcn@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'On Progress', '2019-06-08', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(17, 'AT Agraharam', 'Anil Kumar mandapati', '9000438511 ', '26-19-110, main road, AT AGRAHARAM 1st line', '', 'Nearly opposite SBI atm', 'anilmandapati84@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-06-10', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(18, 'Gandhi Nagar', 'Ch Narasimha Rao', '9949757645', '70-13-1450/6, sai krishna nagar, opp ipd colony 2nd line, sangadigunta', '', 'Andhra Pradesh', 'simha.chalavadi@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-06-11', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(19, 'Krishna Babu landmark', 'Jetty Swaroop  babu', '9154670595', '1-1-1', '', 'Palakaluru road opposite current office', 'Jswaroop9772597@gmail.com', 'medium', 'Website Lead', 'Home', 'Cable', '', 'On Progress', '2019-06-12', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(20, 'Mangaldas Nagar', 'Sivaramakrishnarao kongara', '9700654590', '8-19-4', '', 'Beside reliance market', 'rkkongara77@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'On Progress', '2019-06-14', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(21, 'Sangadi Gunta', 'Kiran Franklin Devarapalli ', '8184968490', '65-5-506', '', 'Anandapet 5th lane', 'franpree@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-06-15', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(22, 'Vikas Nagar', 'Rakesh', '6304332236', '4-19-103/2', '', 'Near Kkr Gotham school', 'rakeshkorrapati@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-06-28', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(23, 'Brodipet', 'P. Deepak Kumar', '8919296547', '30-4-501, 6/13 B, briodipet, guntur', '', 'Opposite prime reading room', 'www.chinnabbai555@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-06-29', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(24, 'Lakshmipuram', 'Nagarjuna', '8096554748', '5-87-19', '', 'Opposite chaitanya college', 'nagarjunamuppalla522@gmail.com', 'medium', 'Website Lead', 'Office', 'Broadband', '', 'On Progress', '2019-07-02', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(25, 'Koritepadu', 'ashok', '7416194171', '966', '', 'Venugopal Nagar', 'mailtoashok123@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-07-06', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(26, 'Pattabipuram', 'Vikas reddy', '7032994125', '10-5-119', '', 'Ysr centre, sthambalagaruvu', 'vikasreddy1303@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'On Progress', '2019-07-19', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(27, 'Mangaldas Nagar', 'Nakka nagaraju', '0903 243 8947', 'Vasavi nager 1 st line pedda kakani raod, Guntur., guntur, andhra pradesh, pin 522001', '', 'Andhra', 'swarupinirayalu.91214@gmail.com', 'medium', 'Website Lead', 'Home', 'Cable', '', 'On Progress', '2019-07-23', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(28, 'Anantavarapadu', 'SRIKANTH', '7569065913', '1-153', '', ' garapadu,beside high school,vatticherukuru,guntur', 'srikanthhcooll@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-07-31', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(29, 'Koritepadu', 'David ch', '8686143753', '4-23-48/a', '', 'Tirupathamma temple, Ntr colony 3rd line', 'Davidcma8686@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'On Progress', '2019-08-01', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(30, 'Pattabipuram', 'sudhir ahirwar', '9402430377', 'army recruiting office pattabhipuram shymala nagar entrance ', '', 'guntur ', 'sudhir.ahirwar@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-08-01', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(31, 'Nallacheruvu', 'Ravindra Kumar r', '9866741504', '6-54a', '', 'Lalupuram, near sivalayam,1st floor', 'ravindra.rekapalli@gmail.com', 'medium', 'Website Lead', 'Home', 'Broadband', '', 'On Progress', '2019-08-06', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(32, 'Gujjana Gundla', 'Anjaneyareddy', '7032018834', 'Flat no 6,Garudadri Towers,Maruthi Nagar', '', 'Next to Chandra gas Agency', 'anji838@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-08-07', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(33, 'Gandhi Nagar', 'Lokesh', '7981652246', '3-333/2', '', 'Flower Market,Sarpavaram, Kakinada', 'lokeshpalepu33456@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-08-12', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(34, 'Gorantla', 'pradeep kumar', '8019409493', '155-130,opp Vijay digital,innerringroad, guntur', '', 'Andhra Pradesh', 'pradeep.velavarthipati@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-08-14', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(35, '', 'Adhi Lakshmi', '8008782707', '8-3-363', '', 'Opp.Sbi Branch', 'dineshkandimalla5@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-09-02', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(36, 'Koritepadu', 'National collateral management services ltd', '9652161919', '2-2-2', '', 'Opposite Mourya hotel', 'kaminedi436@gmail.com', 'medium', 'Website Lead', 'Office', 'Combo', '', 'On Progress', '2019-09-03', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(37, 'Gorantla', 'V pradeep kumar', '8019409493', '155-130,opp Vijay digital,innerringroad, guntur', '', 'Andhra Pradesh', 'pradeep.velavarthipati@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-09-05', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(38, 'LIC landmark', 'Vinay', '7416163935', '5-1-340 , Satyanarayana Puram 4th lane', '', 'Exactly back side of hanumayya company', 'winii648@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-09-08', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(39, 'NagaramPalem', 'Dr Satyamurthy', '9655032266', 'C4 staff quarter, KMCH', '', 'Chinakondrupadu', 'satya24murthy@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-09-15', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(40, 'Sivareddy Palem', 'Linga Reddy', '8125934834', '6-22/56', '', 'Anjaneya colony near shanti arts', 'jinnalingareddy@gmail.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2019-09-15', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(41, '', 'Subrahmayan', '545343535', 'dgdg df', '', 'sdf dsfdsf', 'sdsd@dddff.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2020-06-06', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(42, '', 'Subrahmayan', '545343535', 'dgdg df', '', 'sdf dsfdsf', 'sdsd@dddff.com', 'medium', 'Website Lead', 'Home', 'Combo', '', 'On Progress', '2020-06-06', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(43, NULL, 'Subrahmayan', '08125449686', 'Road No.4a', NULL, NULL, 'saivarma@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'On Progress', '2020-06-06', NULL, NULL, NULL, NULL, NULL),
(44, NULL, 'Subrahmayan', '08125449686', 'Road No.4a', NULL, NULL, 'saivarma@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'On Progress', '2020-06-06', NULL, NULL, NULL, NULL, NULL),
(45, NULL, 'Subrahmayan', '08125449686', 'Road No.4a', NULL, NULL, 'saivarma@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'On Progress', '2020-06-06', NULL, NULL, NULL, NULL, NULL),
(46, NULL, 'Subrahmayan', '08125449686', 'Road No.4a', NULL, NULL, 'sdsadasd@sdff.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'On Progress', '2020-06-06', NULL, NULL, NULL, NULL, NULL),
(47, NULL, 'Subrahmayan', '08125449686', 'Road No.4a', NULL, NULL, 'saivarma@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-06', NULL, NULL, NULL, NULL, NULL),
(48, NULL, 'Prasad', '9032250584', 'Guntour', NULL, NULL, 's.prasadreddy1118@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-06', NULL, NULL, NULL, NULL, NULL),
(49, NULL, 'Prasad', '9032250584', 'Guntur', NULL, NULL, 's.prasadreddy1118@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-06', NULL, NULL, NULL, NULL, NULL),
(50, NULL, 'MOHAMMAD', '7032136173', 'D.no 8-17-77, 1/3 LINE MANGALDAS NAGAR, Guntur', NULL, NULL, 'firrozh.mohammad@outlook.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-07', NULL, NULL, NULL, NULL, NULL),
(51, NULL, 'Kishan', '9701231238', '33-10-561, Mallikarjuna pet 5/4 Lane beside sai baba temple, guntur', NULL, NULL, 'kishandonepudi@yahoo.in', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-07', NULL, NULL, NULL, NULL, NULL),
(52, NULL, 'sivaji', '9160072782', 'chuttugunta', NULL, NULL, 'sivaji.ganesh1100@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-07', NULL, NULL, NULL, NULL, NULL),
(53, NULL, 'Hima Nitesh', '7981673918', 'Bhagya nagar', NULL, NULL, 'himanitesh009@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-08', NULL, NULL, NULL, NULL, NULL),
(54, NULL, 'Kusuma', '7075767778', 'Ipd colony', NULL, NULL, 'charykadali1819@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-08', NULL, NULL, NULL, NULL, NULL),
(55, NULL, 'Bhaskar', '8790038085', 'Kidambi Residency, Behind Narasimhaswami Temple, R. Agraharam, Guntur - 522003', NULL, NULL, 'k_v_b2005@live.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-09', NULL, NULL, NULL, NULL, NULL),
(56, NULL, 'Ramakrishna', '9493445537', 'Stambalagaruvu', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-09', NULL, NULL, NULL, NULL, NULL),
(57, NULL, 'ramana', '9492314485', 'shiva green vally', NULL, NULL, 'ramana6666@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-09', NULL, NULL, NULL, NULL, NULL),
(58, NULL, 'ramana', '9492314485', 'shivagreen vally', NULL, NULL, 'ramana6666@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-09', NULL, NULL, NULL, NULL, NULL),
(59, NULL, 'Mahima somepalli', '9959113111', '19/12/248,LR Colony,Sangadigunta,Guntur', NULL, NULL, 'mahimasomepalli111@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-09', NULL, NULL, NULL, NULL, NULL),
(60, NULL, 'Salma', '7780183056', 'Vavilala Samstha, 12/3 Arundalpet, Guntur', NULL, NULL, 'salmabano2008@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-10', NULL, NULL, NULL, NULL, NULL),
(61, NULL, 'Dhulipalla vijaykumar ', '9704007809', 'D.no:5-1-169 Vard no:1 Maruthinagar near Urdu school  Gujanagulla Guntur -522006 Phone number:9704007809', NULL, NULL, 'vijaykumar.d222@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-11', NULL, NULL, NULL, NULL, NULL),
(62, NULL, 'Anji babu', '9848116729', 'Sangadigunta guntur', NULL, NULL, 'sribhavana9@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-11', NULL, NULL, NULL, NULL, NULL),
(63, NULL, 'Pavankalyan', '8555839411', 'At agraharam 18 line', NULL, NULL, 'sudapavankalyan5@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-11', NULL, NULL, NULL, NULL, NULL),
(64, NULL, 'Rambabu', '9493117871', 'Inner ring road railwaygate, Guntur', NULL, NULL, 'srambabuca@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-11', NULL, NULL, NULL, NULL, NULL),
(65, NULL, 'Dhanunjay', '9347001792', 'Near mee seva launchestar road', NULL, NULL, 'dhanum2608@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-11', NULL, NULL, NULL, NULL, NULL),
(66, NULL, 'D Chandrasekhar', '9642204160', 'Balaji nagar old guntur Guntur', NULL, NULL, 'chandradevathi123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-11', NULL, NULL, NULL, NULL, NULL),
(67, NULL, 'NIKHIL CHAVA', '6281955538', 'Dr.No:7-6-706, Sanjeevaiah Nagar,Main Road,opposite Rajiv gandhi nagar 3rd line, Guntur ,522002.', NULL, NULL, 'nikky.chava2014@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-12', NULL, NULL, NULL, NULL, NULL),
(68, NULL, 'Ramesh Telukutla', '09618618697', 'tirumala chari colony,3rd line, near nallamatti grounds ,(Sangadigunta vinayaka temple),guntur,522003', NULL, NULL, 'ramfuture09@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-12', NULL, NULL, NULL, NULL, NULL),
(69, NULL, 'Syed Razakh', '7799120011', '70-5-821, Bavaji Nagar 2nd Line', NULL, NULL, 'syed.razakh930@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-12', NULL, NULL, NULL, NULL, NULL),
(70, NULL, 'Pavan', '9550225565', 'D.no 3-125/62, Anjaneya colony,reddypalem ,guntur', NULL, NULL, 'pavansureiisad@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-06-14', NULL, NULL, NULL, NULL, NULL),
(71, NULL, 'Varagani Ramakrishna', '8977789180', 'Ipd colony 11th line', NULL, NULL, 'chaitanyasubhashvcs@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-14', NULL, NULL, NULL, NULL, NULL),
(72, NULL, 'Amit', '09398886337', '4/1 Vidya Nagar, Sai Krishna Residency, Flat #5', NULL, NULL, 'acad.amitchandak@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-14', NULL, NULL, NULL, NULL, NULL),
(73, NULL, 'Rizwan', '8688738073', '#19-12-255,9th lane', NULL, NULL, 'rizone43@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-15', NULL, NULL, NULL, NULL, NULL),
(74, NULL, 'Umar Mukthar', '8184923520', 'Flat No. 401, Sri Harivasam, Balaji Na gar main road, Nagaralu, Guntur - 522034, A.P', NULL, NULL, 'umarmuktharshaik@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-15', NULL, NULL, NULL, NULL, NULL),
(75, NULL, 'Pavan Kalyan', '8919029491', 'Janani apartments, budampadu, guntur', NULL, NULL, 'bbt22001@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-15', NULL, NULL, NULL, NULL, NULL),
(76, NULL, 'Vidyasagar', '9491953354', 'Butchiah thota', NULL, NULL, 'vsgade7707@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-15', NULL, NULL, NULL, NULL, NULL),
(77, NULL, 'Nandigama Pundaree', '9177428659', 'Flat No:502, Lokesh Towers, Balajinagar, 1st line. Amarawathi Road. Guntur. Ap. Landmark : Besides Vamsi Krishna Rice mill ', NULL, NULL, 'nandigama.pundaree@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-16', NULL, NULL, NULL, NULL, NULL),
(78, NULL, 'Suprabhat Gopaluni ', '9962987009', 'D NO 1-34-244/2 MARUTHI NAGAR ROAD, OPP L V HEIGHTS, GUNTUR -522006', NULL, NULL, 'gsuprabhat@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-16', NULL, NULL, NULL, NULL, NULL),
(79, NULL, 'Sumanth', '7207219809', 'near Skylark appartments', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-17', NULL, NULL, NULL, NULL, NULL),
(80, NULL, 'Hari Charan Teja G', '8939515670', 'Satyanarayana Swamy Temple, Old Guntur', NULL, NULL, 'charan2130@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-17', NULL, NULL, NULL, NULL, NULL),
(81, NULL, 'Rajesh', '9030099663', 'Opp Sai Baba temple, pedakakani', NULL, NULL, 'rajash1913@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-17', NULL, NULL, NULL, NULL, NULL),
(82, NULL, 'pusuluri pavan kumar', '7659070982', 'yamarru village,vatticherukuru mandal,guntur', NULL, NULL, 'pusuluri.pavan@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-17', NULL, NULL, NULL, NULL, NULL),
(83, NULL, 'Nagaraju', '7530001174', 'Near Vasavi complex', NULL, NULL, 'rajuu605@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-18', NULL, NULL, NULL, NULL, NULL),
(84, NULL, 'K madhavarao', '9885060481', 'Flat no 612612,palnadu towers,pattabipuram,near municipal.high school,Guntur', NULL, NULL, 'findsuneeta@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-19', NULL, NULL, NULL, NULL, NULL),
(85, NULL, 'D.sai mallik', '7020897086', 'butchaiah thota 5th lane,guntur', NULL, NULL, 'malliksai1997@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-19', NULL, NULL, NULL, NULL, NULL),
(86, NULL, 'Indrasen', '8977352819', 'Stambhalagaruvu', NULL, NULL, 'indra.pvmai@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-19', NULL, NULL, NULL, NULL, NULL),
(87, NULL, 'Dr P. Naveen Krishna', '+919611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-20', NULL, NULL, NULL, NULL, NULL),
(88, NULL, 'Shaileshwar', '9885797123', 'Beside Devi theatre,Jadcherla', NULL, NULL, 'shaileshwarsurisetty@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-21', NULL, NULL, NULL, NULL, NULL),
(89, NULL, 'Jayarambabu l', '8332818549', '501, svr daffodils   Krishna nagar 1st lane, guntur', NULL, NULL, 'jayarambabu2508@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-22', NULL, NULL, NULL, NULL, NULL),
(90, NULL, 'Dr P. Naveen Krishna', '+919611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-22', NULL, NULL, NULL, NULL, NULL),
(91, NULL, 'V Srinadh', '9440794767', '# 301, SAVEER TOWERS, RTC COLONY,', NULL, NULL, 'srinadhspdcl@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-22', NULL, NULL, NULL, NULL, NULL),
(92, NULL, 'M Bhaskara Rao', '8179518560', 'D.No 130/225, Flat No  201 Geetha Enclave, Tirumula nagar 2 line, gorantla village, Guntur.', NULL, NULL, 'merugurakesh91@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-23', NULL, NULL, NULL, NULL, NULL),
(93, NULL, 'Pathan shanvaj khan', '9959127898', 'Al Azeem masjid ponnur road ', NULL, NULL, 'pathan5426@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-24', NULL, NULL, NULL, NULL, NULL),
(94, NULL, 'Ramesh Pandalaneni', '9966241111', 'Near Kanna school,Rtc Coloney 4th lane', NULL, NULL, 'ramesh.pandalaneni@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-24', NULL, NULL, NULL, NULL, NULL),
(95, NULL, 'Saiteja', '9966383463', '24-12-119,0 Line 4th Cross Road', NULL, NULL, 'prudhvisaiteja41@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-25', NULL, NULL, NULL, NULL, NULL),
(96, NULL, 'Viharika', '9010533581', 'Ganeshwara rao street, Kothapet, Guntur', NULL, NULL, 'sviharika7@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-25', NULL, NULL, NULL, NULL, NULL),
(97, NULL, 'Akhil', '9700978848', 'Old guntur', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-25', NULL, NULL, NULL, NULL, NULL),
(98, NULL, 'MD H SHARIEF', '9542760062', 'SYED KHAN STREET, CHINN BAZAR,', NULL, NULL, 'mdhsharief123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-25', NULL, NULL, NULL, NULL, NULL),
(99, NULL, 'Khasim', '+919542760062', 'syed khan street, chinn bazar,, door no:18-15-7, br. stadium', NULL, NULL, 'mdhsharief123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-25', NULL, NULL, NULL, NULL, NULL),
(100, NULL, 'G Srinivasa Rao', '9490115226', 'Near Ramalayam,Chowtra centre,guntur-522003', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-25', NULL, NULL, NULL, NULL, NULL),
(101, NULL, 'Modukuru Padmavathi', '9133788889', 'Near Bharath Petrol Bunk, Nallapadu Road, Chuttugunta', NULL, NULL, 'patelagenciesguntur@gmsil.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-26', NULL, NULL, NULL, NULL, NULL),
(102, NULL, 'Kasturi ', '9550911609', 'chaitanya puri 5th line opp: Sree greeshma nivas ', NULL, NULL, 'eamaniramyasreereddy@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-26', NULL, NULL, NULL, NULL, NULL),
(103, NULL, 'Devi prasanna', '9494415158', 'Pulladigunta, guntur', NULL, NULL, 'deviprasanna5c8@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-26', NULL, NULL, NULL, NULL, NULL),
(104, NULL, 'Shaik.rashiq', '9959270076', 'Sangadigunta, gunta factory  street, opposite  apollo pharmacy,  20-13-33', NULL, NULL, 'raashiqraheem@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-26', NULL, NULL, NULL, NULL, NULL),
(105, NULL, 'R.prasad', '9908606096', 'R.prasad', NULL, NULL, 'rprasad9908@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-26', NULL, NULL, NULL, NULL, NULL),
(106, NULL, 'R.prasad', '9908606096', 'R.prasad Ã§/o Gurrala subramanyam garu, Gurrala vari veedhi , Maruti Nagar, Guntur', NULL, NULL, 'rprasad9908@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-26', NULL, NULL, NULL, NULL, NULL),
(107, NULL, 'Manohar', '+91 85220 01596', '12-10-12, behind Sivalayam Street, Ganeshrao Peta, Kothapeta, Guntur, Andhra Pradesh 522001', NULL, NULL, 'manohar.akula@hotmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-27', NULL, NULL, NULL, NULL, NULL),
(108, NULL, 'Pathan Mahamoodkhan ', '9032348663', '8-22-105, Sitaram Nagar 2nd Line, Near Ramalayam, Guntur-522001', NULL, NULL, 'pathanmehemudkhan@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-06-27', NULL, NULL, NULL, NULL, NULL),
(109, NULL, 'Vamsi', '07416777383', '4th Main HBCS Layout', NULL, NULL, 'vamsi.pasupulati@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-27', NULL, NULL, NULL, NULL, NULL),
(110, NULL, 'Chakravarti', '8142866229', 'Ananthavarapadu  near prathipadu', NULL, NULL, 'chakri143@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-27', NULL, NULL, NULL, NULL, NULL),
(111, NULL, 'K Surya Rao', '9441127501', 'Amaravati Road, Nagaralu, Telecom Nagar', NULL, NULL, 'ksurya74@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-28', NULL, NULL, NULL, NULL, NULL),
(112, NULL, 'Dhanalakshmi', '+919885408919', 'Pattabhisitarama Nagar, 8 th lane,nagaralu,amaravathi road', NULL, NULL, 'Dhanalakshmi.bits@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-29', NULL, NULL, NULL, NULL, NULL),
(113, NULL, 'nizamuddin', '9110313128', 'h.no 19-12-42/A LR colony sangadi gunta ,guntur', NULL, NULL, 'sayednizamuddeen@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-29', NULL, NULL, NULL, NULL, NULL),
(114, NULL, 'Praneeth', '8297377256', 'Chebrolu', NULL, NULL, 'krishnapraneeth.000@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-06-29', NULL, NULL, NULL, NULL, NULL),
(115, NULL, 'Naveen krishna', '+919611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-01', NULL, NULL, NULL, NULL, NULL),
(116, NULL, 'Naveen krishna', '9611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-01', NULL, NULL, NULL, NULL, NULL),
(117, NULL, 'M saipriya ', '9502964246', 'Flat no :501 ,sunrise towers,jkc college road', NULL, NULL, 'saipriyamakkena@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-01', NULL, NULL, NULL, NULL, NULL),
(118, NULL, 'Subbareddy', '8919918385', 'Sangadigunta , I.p.d colony , 1 st line', NULL, NULL, 'subbareddykesari786@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-02', NULL, NULL, NULL, NULL, NULL),
(119, NULL, 'BANDARU NAGARAJU', '9493445500', 'DOOR NO. 53-2-94, MAIN ROAD, VENKATRAO PETA, NEAR DHANAMMA HOTEL, R T C COLONY ROAD, GUNTUR-522001', NULL, NULL, 'bandaru.nagaraj@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-02', NULL, NULL, NULL, NULL, NULL),
(120, NULL, 'Rajani', '9177440497', 'Pedakakani', NULL, NULL, 'davalarajani3@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-03', NULL, NULL, NULL, NULL, NULL),
(121, NULL, 'BASAM MADHU BABU', '7619523835', 'Rajagopal Nagar,522002', NULL, NULL, 'basammadhubabu@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-03', NULL, NULL, NULL, NULL, NULL),
(122, NULL, 'Koteswararao', '9986694215', 'Koritepadu', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-04', NULL, NULL, NULL, NULL, NULL),
(123, NULL, 'V Kali Prasad ', '9491200913 ', 'Madhuranagar 7th Lane, Amaravathi Road, Guntur ', NULL, NULL, 'vsrskp@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-05', NULL, NULL, NULL, NULL, NULL),
(124, NULL, 'Upendra', '9192410276', 'Chimalamarri,nakarikallu Guntur district', NULL, NULL, 'upendrapemmasani1999@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-06', NULL, NULL, NULL, NULL, NULL),
(125, NULL, 'Mohammed shoyab', '8522030363', 'Anandapet,8th line,DNo:-17-17-9', NULL, NULL, 'mshoyab65@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-06', NULL, NULL, NULL, NULL, NULL),
(126, NULL, 'Kksp Sainath', '7019534992', '4-15-100/1, Bharath Pet 7th line, Amaravathi Road, Opp. HDFC Bank', NULL, NULL, 'sainathkksp96@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-07', NULL, NULL, NULL, NULL, NULL),
(127, NULL, 'P SANTOSH', '7780523486', 'Vasantarayapuram,4th lane,sarada colony main road, beside Chaitanya E m school ', NULL, NULL, 'edupidatala@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-07', NULL, NULL, NULL, NULL, NULL),
(128, NULL, 'B basavadevudu', '07013875894', 'Guntur', NULL, NULL, 'basavadevudu201@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-08', NULL, NULL, NULL, NULL, NULL),
(129, NULL, 'Narasimha S', '8553330709', '130-7-436, Near Panchayathi office, Gorantla, Guntur - 522034', NULL, NULL, 'jk96221@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-08', NULL, NULL, NULL, NULL, NULL),
(130, NULL, 'Chakravarti', '8142866229', '1-56, Vatticherukuru, Ananthavarapadu', NULL, NULL, 'chakri143@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-08', NULL, NULL, NULL, NULL, NULL),
(131, NULL, 'Phanindra', '8247773115', '6 th lane , REDLA bazar , launchestar road sangadiguntaGuntur', NULL, NULL, 'dhanum2608@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-08', NULL, NULL, NULL, NULL, NULL),
(132, NULL, 'Chakravarti', '8142866229', '1-56, Vatticherukuru, Ananthavarapadu, 522017', NULL, NULL, 'chakri143@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-08', NULL, NULL, NULL, NULL, NULL),
(133, NULL, 'PRABHAKAR', '9652702429', 'PRABHAKAR DIVYA H NO :8, plot no 101, vijayapuri colony 7th lane ,OPP TO ARENA9 play ground GUN', NULL, NULL, 'divyaprabhakar19@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-08', NULL, NULL, NULL, NULL, NULL),
(134, NULL, 'Basavadevudu', '07013875894', 'Guntur', NULL, NULL, 'basavadevudu201@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-08', NULL, NULL, NULL, NULL, NULL),
(135, NULL, 'Ansari', '9849238128', '# 54-12-2682, Rahulgandhi nagar 1st lane, RTC Colony, Guntur', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-09', NULL, NULL, NULL, NULL, NULL),
(136, NULL, 'Venkata', '09491896117', 'Door No: 7-7/1, Near Vigneswara Temple, Nudurupadu, Phirangipuram, Guntur, Andhra Pradesh - 522529', NULL, NULL, 'anjaneyulu171@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-09', NULL, NULL, NULL, NULL, NULL),
(137, NULL, 'SHAIK MOHAMMAD AKRAM ', '8333896900', 'DOOR NO:13-6-31,5TH LINE GUNTURVARITHOTA,OPPOSITE VICTORIA HOSPITAL,BUS STAND ROAD,GUNTUR-522001', NULL, NULL, 'akram.sk1653@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-09', NULL, NULL, NULL, NULL, NULL),
(138, NULL, 'Naveen krishna', '9611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-09', NULL, NULL, NULL, NULL, NULL),
(139, NULL, 'PALATHI SITHARAMARAJU', '9700233274', 'GUJJANAGUNDLLA ', NULL, NULL, 'SITHARAMARAJU9700@GMAIL.COM', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-09', NULL, NULL, NULL, NULL, NULL),
(140, NULL, 'Rohith', '7093279636', 'Amruthalur mandal, Moparru village, near cooperative bank, 2-91/2', NULL, NULL, 'kodalirohith77@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-10', NULL, NULL, NULL, NULL, NULL),
(141, NULL, 'V RAVI KUMAR', '8886812571', 'Flat No.2G , Bommarillu@Himani Nagar Apartment,Madura Nagar 7th Lane. Behind Industrial Estate, Nagaralu', NULL, NULL, 'veraku1972@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-10', NULL, NULL, NULL, NULL, NULL),
(142, NULL, 'Shaistha', '6305889520', '5/1 anandapet, house no:197, d no:17-9-19, guntur-522001', NULL, NULL, 'mustaqeemmuhammed2@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-11', NULL, NULL, NULL, NULL, NULL),
(143, NULL, 'Shaistha', '6305889520', '5/1 anandapet, house no:197, d no:17-9-19, guntur-522001', NULL, NULL, 'mustaqeemmuhammed2@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-11', NULL, NULL, NULL, NULL, NULL),
(144, NULL, 'Shaistha', '6305889520', '5/1 anandapet, house no:197, d no:17-9-19, guntur-522001', NULL, NULL, 'mustaqeemmuhammed2@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-11', NULL, NULL, NULL, NULL, NULL),
(145, NULL, 'Nagendra D', '8519886099', 'Sagara palem, Peda kakani, Guntur', NULL, NULL, 'Nagendradhupati@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-11', NULL, NULL, NULL, NULL, NULL),
(146, NULL, 'Nagendra D', '8519886099', 'Sagara palem, Peda kakani, Guntur', NULL, NULL, 'Nagendradhupati@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-11', NULL, NULL, NULL, NULL, NULL),
(147, NULL, 'kosana gangadhara rao', '9052485978', 'hno11-4 chenghiskhanpet Edlapadu Guntur 522529', NULL, NULL, 'gangadharkosana@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-11', NULL, NULL, NULL, NULL, NULL),
(148, NULL, 'Basavadevudu', '07013875894', 'Guntur', NULL, NULL, 'basavadevudu201@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-07-12', NULL, NULL, NULL, NULL, NULL),
(149, NULL, 'Prakash Murthy', '07411000749', '4-15-24b, bharatpet 5th line, opp sivagreen wood aparts', NULL, NULL, 'mprakashmca@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-13', NULL, NULL, NULL, NULL, NULL),
(150, NULL, 'Vidyasagar', '09494956180', 'Gummadidurru', NULL, NULL, 'Vidyachowdary880@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-13', NULL, NULL, NULL, NULL, NULL),
(151, NULL, 'Chakravarthi', '7799196957', 'Saibaba temple,RTC colony', NULL, NULL, 'sapbi.chakri@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-14', NULL, NULL, NULL, NULL, NULL),
(152, NULL, 'Varshitha', '8886344333', '1st floor', NULL, NULL, 'saivarshi21@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-14', NULL, NULL, NULL, NULL, NULL),
(153, NULL, 'Naveen krishna', '9611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-15', NULL, NULL, NULL, NULL, NULL),
(154, NULL, 'Amaralingeswarao', '8555872483', 'Srinivasarao pet,2 ne line guntur', NULL, NULL, 'nagamadhavi82423@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-15', NULL, NULL, NULL, NULL, NULL),
(155, NULL, 'Bharath', '7702730444', 'R agraharam', NULL, NULL, 'dasaribharath20@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-16', NULL, NULL, NULL, NULL, NULL),
(156, NULL, 'Harish', '+919677005573', 'D.No: 62-19-925 ,2/6 Sri krishna nagar', NULL, NULL, 'psp.psph@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-16', NULL, NULL, NULL, NULL, NULL),
(157, NULL, 'kosana gangadhara rao', '9052485978', 'HNO 11-4 chenghiskhanpet edlapadu guntur 522529', NULL, NULL, 'gangadharkosana@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-17', NULL, NULL, NULL, NULL, NULL),
(158, NULL, 'Mudigonda Datta sai teja', '7013597797', 'Near kkr theater guntur', NULL, NULL, 'dattasai.7575@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-17', NULL, NULL, NULL, NULL, NULL),
(159, NULL, 'Manikanta A', '9493499666', 'maruthi nagar lane1, old guntur, guntur - 522001', NULL, NULL, 'avm393@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-18', NULL, NULL, NULL, NULL, NULL),
(160, NULL, 'Shaik Meeravali', '7893328862', 'Mandapadu', NULL, NULL, 'Meeravali.shaik98@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-19', NULL, NULL, NULL, NULL, NULL),
(161, NULL, 'P M V Sukumar', '8897119491', 'H.No. 4-15-24A, Bharath pet, 6th line, Guntur', NULL, NULL, 'sushil.pandit@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-19', NULL, NULL, NULL, NULL, NULL),
(162, NULL, 'S NAV ya', '7207322991', 'Nallapadu', NULL, NULL, 'navyasri.28@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-20', NULL, NULL, NULL, NULL, NULL),
(163, NULL, 'Aswinikumar Chembeti', '09096291757', 'Colors park, Ankireddypalem road, Nallapadu', NULL, NULL, 'aswinidattu123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-22', NULL, NULL, NULL, NULL, NULL),
(164, NULL, 'Eswara Kumar', '8008000507', '', NULL, NULL, 'eshtheking@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-23', NULL, NULL, NULL, NULL, NULL),
(165, NULL, 'Nagaraju ', '7530001174', 'Arundhati nagar ,4th Lane, Kakani road ,Guntur ', NULL, NULL, 'rajuu605@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-23', NULL, NULL, NULL, NULL, NULL),
(166, NULL, 'Prasanth Mandava', '8790912124', 'Ala hospital', NULL, NULL, 'mprasanth173@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-23', NULL, NULL, NULL, NULL, NULL),
(167, NULL, 'gudivada', '+917981373959', 'Kothapet beside ganesh mahal', NULL, NULL, 'gudivadajayanth189@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-24', NULL, NULL, NULL, NULL, NULL),
(168, NULL, 'Aditya', '8639297975', 'Maruthi Nagar', NULL, NULL, 'adityasindhursamineni@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-24', NULL, NULL, NULL, NULL, NULL),
(169, NULL, 'Mani', '9966183018', 'venugopala swami temple,', NULL, NULL, 'mani.kishore2604@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-24', NULL, NULL, NULL, NULL, NULL),
(170, NULL, 'Mallikarjuna rao Pappula', '09297450927', 'rajeevgandhinagar', NULL, NULL, 'Pappulam5@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-25', NULL, NULL, NULL, NULL, NULL),
(171, NULL, 'Kamala sunkari Rajeevgandhinagar,5thline,Guntur', '09297450927', 'rajeevgandhinagar', NULL, NULL, 'Pappulam5@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-25', NULL, NULL, NULL, NULL, NULL),
(172, NULL, 'Guru Konjetu', '08309249937', '101 Etukuru Rd', NULL, NULL, 'auchuta@yahoo.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-25', NULL, NULL, NULL, NULL, NULL),
(173, NULL, 'Abida farheen', '7661078667', 'Panchavati apartment,guntyr', NULL, NULL, 'farheenabida1@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-26', NULL, NULL, NULL, NULL, NULL),
(174, NULL, 'P Chengalrayam', '8686818558', 'Cherivi village ', NULL, NULL, 'chengalrayam@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-27', NULL, NULL, NULL, NULL, NULL),
(175, NULL, 'Aditya', '8639297975', 'Maruthi Nagar', NULL, NULL, 'adityasindhursamineni@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-27', NULL, NULL, NULL, NULL, NULL),
(176, NULL, 'Sai krishna', '9985737828', 'Rtc colony Gandhi nagar, 2nd line Guntur', NULL, NULL, 'saikrishnathota29@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-27', NULL, NULL, NULL, NULL, NULL),
(177, NULL, 'Sai kruthik Malle ', '9059777943', 'ipd colony extension near putapathi sai baba trust ', NULL, NULL, 'kushiharitha284@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-28', NULL, NULL, NULL, NULL, NULL),
(178, NULL, 'Chenchulu kumbha', '9441560834', 'D no.19-9-477, TULASI RESIDENCY, FLAT NO.202, NEAR IIT MATRIX ,KOMMINENINAGR', NULL, NULL, 'chenchulu.kumbha@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-28', NULL, NULL, NULL, NULL, NULL),
(179, NULL, 'Chennareddy', '9032823837', 'Prathipadu', NULL, NULL, 'nani46335@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-28', NULL, NULL, NULL, NULL, NULL),
(180, NULL, 'Gogulamudi Srikanth Reddy', '7013705454', 'uppalapadu', NULL, NULL, 'reddysrikanth2000@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-29', NULL, NULL, NULL, NULL, NULL),
(181, NULL, 'VEERANJANEYULU PALLAMALLI', '9154765512', '27-4-214, 4th Lane, Cobald Pet, Guntur', NULL, NULL, 'mihira.lucky@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-29', NULL, NULL, NULL, NULL, NULL),
(182, NULL, 'Vemula.Sai Ajith Kumar', '9908974080', 'Dr no:24-9-120,R.Agraharam', NULL, NULL, 'ajith1223@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-30', NULL, NULL, NULL, NULL, NULL),
(183, NULL, 'N Radharani', '9248473611', '1-33-49/a, Nethaji Nagar 6th Lane, S.V.N Colony, Guntur', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-07-30', NULL, NULL, NULL, NULL, NULL),
(184, NULL, 'Srinivasarao ', '9177646830', 'Tarakarama Nagar 4th Lane Guntur', NULL, NULL, 'gsrao5444@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-31', NULL, NULL, NULL, NULL, NULL),
(185, NULL, 'Srinivasarao ', '9177646830', 'Tarakarama Nagar 4th Lane Guntur', NULL, NULL, 'gsrao5444@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-31', NULL, NULL, NULL, NULL, NULL),
(186, NULL, 'bMGFynjiQPzpu', '9976302743', 'nhtlgfTkRyGZse', NULL, NULL, 'dorseyemery4@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-31', NULL, NULL, NULL, NULL, NULL),
(187, NULL, 'CBHwXPFkeLf', '8099239386', 'PlsLYQmeBrUqnGZ', NULL, NULL, 'dorseyemery4@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-07-31', NULL, NULL, NULL, NULL, NULL),
(188, NULL, 'Manikanta A', '9493499666', 'Maruthi Nagar Lane1, Opposite Mani Hotel Center,Old Guntur, Guntur-522001', NULL, NULL, 'avm393@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-01', NULL, NULL, NULL, NULL, NULL),
(189, NULL, 'Ali Basha Syed', '8861667202', 'Islampet, Nandyal, 518502', NULL, NULL, 'alibasha202@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-02', NULL, NULL, NULL, NULL, NULL),
(190, NULL, 'Tarun', '+91 91540 76673', '', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-03', NULL, NULL, NULL, NULL, NULL),
(191, NULL, 'Sai Aditya', '8801912619', 'DNo: 15-14-139 D/1 , The Shop Employees Colony , 8 th Line , Kakani Road , Guntur', NULL, NULL, 'saiaditya11994@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-03', NULL, NULL, NULL, NULL, NULL),
(192, NULL, 'Ravichandra Thota', '6281021150', '2-127/koppuravuru/Pedakakani/guntur-522508', NULL, NULL, 'ravichandra24.thota@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-03', NULL, NULL, NULL, NULL, NULL),
(193, NULL, 'Kishore kumar', '9052666998', 'KAKINADA, TURANGI,NEAR SAI BABA TEMPLE,', NULL, NULL, 'hv15508@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-04', NULL, NULL, NULL, NULL, NULL),
(194, NULL, 'kavya korivi', '09676293427', 'lakshmipuram', NULL, NULL, 'kavyakorivi110@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-05', NULL, NULL, NULL, NULL, NULL),
(195, NULL, 'Reagan', '9848759239', 'AT Agarharam', NULL, NULL, 'reaganharvey@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-05', NULL, NULL, NULL, NULL, NULL),
(196, NULL, 'Sai Kiran Grandi', '07397391794', 'Dr.no:121-57,Janmabhuminagar 7th line,Turakapalem Road', NULL, NULL, 'grandhi57@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-05', NULL, NULL, NULL, NULL, NULL),
(197, NULL, 'HARSHA', '9642890109', '87-2-186,opposite sai soundarya sadhana, kvp colony,guntur,522003', NULL, NULL, 'harshavardhanreddy8@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-07', NULL, NULL, NULL, NULL, NULL),
(198, NULL, 'V Chaitanya', '8328676219', 'Vasantarayapuram', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-07', NULL, NULL, NULL, NULL, NULL),
(199, NULL, 'Mahesh Yerramsetti', '9959084880', 'D.no: 7-20-1048, sarada colony 26th line', NULL, NULL, 'yerramsetti.mahesh@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(200, NULL, 'ramana', '8885638989', 'Near HDFC Bank', NULL, NULL, 'ramana6666@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(201, NULL, 'rambabu', '8341143166', 'gorantoa', NULL, NULL, 'rambabu.prathi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(202, NULL, 'rambabu', '8341143166', 'gorantoa', NULL, NULL, 'rambabu.prathi@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(203, NULL, 'Sairam choda', '9482863595', 'sri siva naga sai apartment, shop employees colony', NULL, NULL, 'sairam.cad@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(204, NULL, 'AKHIL TEJA', '9989687682', 'SAI BHARTHI CAPITAL SQUARE ', NULL, NULL, 'AKHILTEJA44@GMAIL.COM', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(205, NULL, 'Kishore babu', '7416360928', 'Rajeev Gandhi Nagar 10 th lane ', NULL, NULL, 'kishorekohli54@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(206, NULL, 'Sanjeevula prem kumar', '9949293275', 'Revenue kalyana mandapam', NULL, NULL, 'sonp199726@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(207, NULL, 'Rabbani', '63010-66569', 'Mangaldas Nagar 1st lane', NULL, NULL, 'naatachota@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(208, NULL, 'Siva Prasad', '6362659668', 'Margopalli(vill), chitvel(mdl),kadapa(dist),AP-516104', NULL, NULL, 'cherry.shiva36@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-08', NULL, NULL, NULL, NULL, NULL),
(209, NULL, 'Naveen Kumar Pusuluru', '08105411122', '205, Veda Srinivasam, Taraka Rama Nagar, Near Vikas Inn, Jkc College Road, Guntur', NULL, NULL, 'naveen.pusuluru123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-09', NULL, NULL, NULL, NULL, NULL),
(210, NULL, 'Nazeer Basha', '7989570429', '1-4-28, Sadasiva nagar colony road corner, beside Gujjanagundla walking track, Guntur', NULL, NULL, 'nazeer04a6@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-09', NULL, NULL, NULL, NULL, NULL),
(211, NULL, 'Venkateswara Rao Bondalapati', '8329691458', '3/9 YADAVA street Old Guntur, Guntur', NULL, NULL, 'venkatesh14386@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-09', NULL, NULL, NULL, NULL, NULL),
(212, NULL, 'Sunitha', '9014402026', 'Olg guntur,Lb nagar', NULL, NULL, 'suneethareddyboina@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-09', NULL, NULL, NULL, NULL, NULL),
(213, NULL, 'Surinarayanareddy', '8919151863', 'Balajinager 6th line, old guntur, guntur', NULL, NULL, 'surinarayana8@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-09', NULL, NULL, NULL, NULL, NULL),
(214, NULL, 'Suneel Kommuri', '9923548385', '502 The Prince Apartment, 2nd Line Pattabhipuram, /guntur', NULL, NULL, 'suneelkumar56@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(215, NULL, 'Gujjula pandurangaReddy', '9290647913', 'A T Agra haram,11th lane,3rd cross Road, Door no : 26-38-143/3C.', NULL, NULL, 'prreddygujjula@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(216, NULL, 'Sanjeevula prem kumar', '9949293275', 'Revenue kalyana mandapam', NULL, NULL, 'sonp199726@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(217, NULL, 'Kranthi Kiran Gude', '7090437699', 'Flat# B-419', NULL, NULL, 'kranths@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(218, NULL, 'Sattu venkatesh', '7981199700', 'Beside king hotel ', NULL, NULL, 'venkatesh.sattu123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(219, NULL, 'Veerendra', '08008818818', 'DOOR NO:8-7-65,Nehru Nagar 4th lane ', NULL, NULL, 'VEERENDRATEJA@GMAIL.COM', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(220, NULL, 'Subhani Shaik', '9966726643', 'Anandapet 8th line, Ponnur road,guntur', NULL, NULL, 'ayaanshaik001@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `add_lead` (`id`, `branch`, `customer_name`, `mobile`, `address_1`, `address_2`, `landmark`, `email`, `priority`, `lead_source`, `lead_type`, `conn_type`, `notes`, `status`, `date`, `from_date`, `from_time`, `to_time`, `to_date`, `last_update`) VALUES
(221, NULL, 'YARRAGORLA NARESH ', '9133200784', 'St colony manckallu 3/98 1 line ', NULL, NULL, 'tonynaresh65@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(222, NULL, 'Gopi', '9066785194', '', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(223, NULL, 'Naresh', '9866665292', 'Chowtra ', NULL, NULL, 'jalackjain18@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(224, NULL, 'Daggupati Praveen kumar', '8309336346', 'Basavataraka Rama nagar, kakani road', NULL, NULL, 'dagupatipraveenkumar17@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-10', NULL, NULL, NULL, NULL, NULL),
(225, NULL, 'Vamsi Ikkurthi', '9666632240', 'Srinagar', NULL, NULL, 'vamsiikkurthi58@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(226, NULL, 'satya vara prasad raju', '8555960379', 'Menakagandhi Nagar', NULL, NULL, 'satya555prasad@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(227, NULL, 'P.venkata rao', '7702588974', 'Flat no:102 Modepalli residency Sainath colony inner ring road gorantla', NULL, NULL, 'bhargavkrishna028@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(228, NULL, 'P.venkata rao', '7702588974', 'Flat no:102 Modepalli residency Sainath colony inner ring road gorantla', NULL, NULL, 'bhargavkrishna028@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(229, NULL, 'Mohan', '8106191522', '3c, 3rd floor, block-1, anandha nilayam, ipd colony guntur', NULL, NULL, 'mohankadium8@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(230, NULL, 'Vasu', '9491714155', 'New RTO Office, Swarna bharathi nagar,', NULL, NULL, 'vasi161113@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(231, NULL, 'P v s ramarao', '9912537295', 'Mig 243', NULL, NULL, 'suryakailash181@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(232, NULL, 'P v s ramarao', '9912537295', 'Mig 243', NULL, NULL, 'suryakailash181@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(233, NULL, 'P v s ramarao', '9912537295', 'Mig 243', NULL, NULL, 'suryakailash181@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-11', NULL, NULL, NULL, NULL, NULL),
(234, NULL, 'CHEPURI MADHAVA', '7036222263', 'door no 8-12-12 nehru nagar 9th lane guntur 522001', NULL, NULL, 'chepurimadhava001@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-12', NULL, NULL, NULL, NULL, NULL),
(235, NULL, 'Ravi', '9903611011', 'NagaRaj Colony 9 th line, D.No : 7-6-848/306, Reddy Palem,Guntur-522009', NULL, NULL, 'kumar.palnati243@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-12', NULL, NULL, NULL, NULL, NULL),
(236, NULL, 'Viswadeep', '8328693980', 'Aidtya nagar 1st lane, Reddy palem road', NULL, NULL, 'viswadeep523@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-12', NULL, NULL, NULL, NULL, NULL),
(237, NULL, 'Vivek', '7995883125', 'NH 5 Guntur , near enadu office ankireddy palem Brahma Reddy colony', NULL, NULL, 'vivektiwari7702@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-12', NULL, NULL, NULL, NULL, NULL),
(238, NULL, 'Vivek', '7995883125', 'NH 5 Guntur , near enadu office ankireddy palem Brahma Reddy colony', NULL, NULL, 'vivektiwari7702@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-12', NULL, NULL, NULL, NULL, NULL),
(239, NULL, 'srikanth', '7569065913', 'etukuru', NULL, NULL, 'srikanthhcooll@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-12', NULL, NULL, NULL, NULL, NULL),
(240, NULL, 'Ch ramesh', '9848399492', 'Srinivasarao peta', NULL, NULL, 'chennupati.cr@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-13', NULL, NULL, NULL, NULL, NULL),
(241, NULL, 'Nandam sai', '8297710405', '2-70 mandepudi , Amaravathi', NULL, NULL, 'nandamsai143@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-13', NULL, NULL, NULL, NULL, NULL),
(242, NULL, 'Nandam sai', '8297710405', '2-70 mandepudi , Amaravathi', NULL, NULL, 'nandamsai143@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-13', NULL, NULL, NULL, NULL, NULL),
(243, NULL, 'Nandam sai', '8297710405', '2-70 mandepudi , Amaravathi', NULL, NULL, 'nandamsai143@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-13', NULL, NULL, NULL, NULL, NULL),
(244, NULL, 'jani khan.p', '08886586464', 'guntur vari thota 6 th line', NULL, NULL, 'pathanjanikhan2525@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-13', NULL, NULL, NULL, NULL, NULL),
(245, NULL, 'Ankammanaidu', '8184811225', 'Ganeshwara Street,', NULL, NULL, 'ankammanaidu2401@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-13', NULL, NULL, NULL, NULL, NULL),
(246, NULL, 'Padma kode', '9949531015', 'Appapuram ', NULL, NULL, 'padmakode44@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(247, NULL, 'Koteswara rao G', '9618966465', 'Ano 16-5-111/A,  1/2lalbahadurnagar, Nandi velugu road , old guntur AP', NULL, NULL, '9618966465g@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(248, NULL, 'Koteswara rao G', '9618966465', 'Ano 16-5-111/A,  1/2lalbahadurnagar, Nandi velugu road , old guntur AP', NULL, NULL, '9618966465g@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(249, NULL, 'Chennakesava Reddy', '9542511515', 'SVN Colony', NULL, NULL, 'chennuaso@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(250, NULL, 'Vinuth Guntakala', '8309282054', 'Flat no:403,Tejaswini Towers, Inner ring road, Opposite to chillies dhaba', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(251, NULL, 'Siva kumar', '09398259907', '50-91/1, Prakash Nagar 1st line', NULL, NULL, 'saisiva9494@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(252, NULL, 'SaiGopal', '9032745802', 'Kodanda Ramaiah Nagar, KVP Colony', NULL, NULL, 'saigopal009@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(253, NULL, 'Koteswarao', '7731839636', 'kalyan nagar palakaluru road guntur', NULL, NULL, 'Prajkumar7547@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-14', NULL, NULL, NULL, NULL, NULL),
(254, NULL, 'Dr P. Naveen Krishna', '+919611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-15', NULL, NULL, NULL, NULL, NULL),
(255, NULL, 'kothari naresh', '8465919347', 'Nallacheruvu 1st line 2nd cross road near sri majety school', NULL, NULL, 'nareshkothari789@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-16', NULL, NULL, NULL, NULL, NULL),
(256, NULL, 'Nazeer Basha Shaik', '07989570429', '1-4-28', NULL, NULL, 'nazeer04a6@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-16', NULL, NULL, NULL, NULL, NULL),
(257, NULL, 'D.Narasimharao', '9848198764', 'Back side lane of DCB Bank, Nallapadu-522 005, Guntur', NULL, NULL, 'dendukurinarasimharao@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-16', NULL, NULL, NULL, NULL, NULL),
(258, NULL, 'D.Narasimharao', '9848198764', 'Back side lane of DCB Bank, Nallapadu-522 005, Guntur', NULL, NULL, 'dendukurinarasimharao@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-16', NULL, NULL, NULL, NULL, NULL),
(259, NULL, 'Madhuri', '8074774409', 'Saivilla apartment,5/3 mallikarjunapeta,Guntur-522002', NULL, NULL, 'mmadhuri369@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-17', NULL, NULL, NULL, NULL, NULL),
(260, NULL, 'Kancharla Mrunalini', '9346678342', 'Luthern church,ithanagar,nehru road,tenali,guntur', NULL, NULL, 'kancharlamrunalini@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-17', NULL, NULL, NULL, NULL, NULL),
(261, NULL, 'Viswanath Allam', '6302664268', '4th Lane,Bavaji Nagar,IPD Colony,Guntur', NULL, NULL, 'vishwanath.allam@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-17', NULL, NULL, NULL, NULL, NULL),
(262, NULL, 'Mahesh', '8897689664', '', NULL, NULL, 'mahesh.rc25@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(263, NULL, 'Aravind Mavuri', '8886209020', 'door number 7-9-12 kakumanu vari thota 4/4 th line', NULL, NULL, 'aravindtruth@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(264, NULL, 'Hemanth Kethinedi', '9932022557', 'Flat no. 502, Dhruva Pearl, 8th Line, Shyamala Nagar, 522006', NULL, NULL, 'hemanth.kethinedi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(265, NULL, 'Vamsi', '9666299890', 'Paladugu ', NULL, NULL, 'vamsi2495@gmail.con', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(266, NULL, 'A sivanageswararao', '8341825563', 'Ratnagiri Nagar', NULL, NULL, 'sivanageswara5563@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(267, NULL, 'Mani deep kumar', '09766838815', 'Nudurupadu, Phirangipuram, guntur', NULL, NULL, 'rajavarapumanideep@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(268, NULL, 'Shaik Mastan Vali', '9700301791', 'Rahul Gandhi Nagar 5 th line masjid line after RTC colony, Guntur-522001', NULL, NULL, 'mastan955v@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(269, NULL, 'Rajesh A', '9390235587', '2/82,near ntr statue,kothurulanka', NULL, NULL, 'raja.arv1231@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(270, NULL, 'Balusupati. Srinivasa Rao', '8247897953', 'Innar Ring road reddypalem', NULL, NULL, 'balusupati78@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(271, NULL, 'Linga Reddy', '9739462369', '53-11-1309, 2nd line, Gandhinagar, RTC colony', NULL, NULL, 'lingaredy@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-18', NULL, NULL, NULL, NULL, NULL),
(272, NULL, 'Kilaru deepak', '9603309291', '4-5-44, Kalyani road, beside Donbosco', NULL, NULL, 'deepakchowdarykilaru@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(273, NULL, 'Kilaru deepak', '9603309291', '4-5-44, Kalyani road, beside Donbosco', NULL, NULL, 'deepakchowdarykilaru@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(274, NULL, 'Sai kumar reddy', '8686887077', '59-2-221, reddla bazar, old guntur, guntur 522001', NULL, NULL, 'saikumarreddy003@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(275, NULL, 'Ravi prasad', '09182016986', 'Antharvedipalem,sakhinetipalli Mandal, kobbarithota Kalavagattu', NULL, NULL, 'ravichinna428@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(276, NULL, 'Bindukrishna Kandimalla', '9666065001', 'Lemallepadu ', NULL, NULL, 'bindukrishnakandimalla@gmail.con', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(277, NULL, 'SV reddy', '97916 99539', '53-11-1309, 2nd line, Gandhinagar, RTC colony', NULL, NULL, 'lingaredy@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(278, NULL, 'Saifuddin Shaik ', '9052076786', 'Flat No:114,Sheshadri Block,Near Tagore Rice Mill,Nagaralu,Amaravathi Road,Guntur ', NULL, NULL, 'mdsaif777@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(279, NULL, 'Pavan', '9701592703', 'srinivasarao pet, 2nd lane.', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(280, NULL, 'Amaralingeswarao', '8555872483', 'Srinivasarao pet,2 ne line guntur', NULL, NULL, 'nagamadhavi82423@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(281, NULL, 'Amaralingeswaraoc', '8555872483', 'Srinivasarao pet,2 ne line guntur', NULL, NULL, 'nagamadhavi82423@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-19', NULL, NULL, NULL, NULL, NULL),
(282, NULL, 'Sv nageswararao', '9246465266', 'Narasaraopet', NULL, NULL, 'svnag2018@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-20', NULL, NULL, NULL, NULL, NULL),
(283, NULL, 'Linga Reddy Tiyyagura', '9951322116', 'MG Inner Ring Road,LBC Beside Gandhi Statue', NULL, NULL, 'lingareddyt@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-20', NULL, NULL, NULL, NULL, NULL),
(284, NULL, 'Siva Kalyan', '7406241122', 'Anandpet Extn, Opp Sangadigunta Power Station, Behind Matrusri College.', NULL, NULL, 'kskb4u@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-20', NULL, NULL, NULL, NULL, NULL),
(285, NULL, 'Mallikharjunareddy ', '6304750802', 'Sampathnagr ', NULL, NULL, 'shivanagamallikarajunareddy143@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-20', NULL, NULL, NULL, NULL, NULL),
(286, NULL, 'Marella Durgaprasad', '9177780709', 'D.No: 18-41-56, 2nd line, vaddera bazar, sangadigunta near launcheater road, Guntur-522003', NULL, NULL, 'marella98480@yahoo.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-20', NULL, NULL, NULL, NULL, NULL),
(287, NULL, 'Hri g gu uh', '3677445556', 'Fr[yyuuhgdd', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-20', NULL, NULL, NULL, NULL, NULL),
(288, NULL, 'YARRAGORLA NARESH ', '9133200784', 'St colony manckallu 3/98 1 line ', NULL, NULL, 'tonynaresh65@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-21', NULL, NULL, NULL, NULL, NULL),
(289, NULL, 'Vijay', '9398244617', 'Ananthavarappadu ', NULL, NULL, 'vijaynani453@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-21', NULL, NULL, NULL, NULL, NULL),
(290, NULL, 'Vijay', '9398244617', 'Ananthavarappadu ', NULL, NULL, 'vijaynani453@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-21', NULL, NULL, NULL, NULL, NULL),
(291, NULL, 'Murali ', '8374188561', 'IDVA NAGAR 8TH LINE E-BLOCK,SWARNA BHARATHI NAGAR, ADAVI TAKKELLAPADU,GUNTUR', NULL, NULL, 'muralibattula3456@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-21', NULL, NULL, NULL, NULL, NULL),
(292, NULL, 'Suresh', '7815992377', '15-121 Netaji Nagar piduguralla', NULL, NULL, 'b.suresh5187@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-21', NULL, NULL, NULL, NULL, NULL),
(293, NULL, 'K Ramu', '7702922714', 'Lalpuram road ,near gemini school , guntur', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-21', NULL, NULL, NULL, NULL, NULL),
(294, NULL, 'Narasimharao mandadi', '7893866814', 'Satyanarayanapuram ', NULL, NULL, 'sweety897870@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-22', NULL, NULL, NULL, NULL, NULL),
(295, NULL, 'Sateesh', '9030108143', 'Srinivasaraopet', NULL, NULL, 'sskumar.sskumar@yahoo.co.in', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-22', NULL, NULL, NULL, NULL, NULL),
(296, NULL, 'T gopi raju', '8499977795', '8-69,near railway gate ,pedakakanu,guntur-522509', NULL, NULL, 'gopiraju012@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-22', NULL, NULL, NULL, NULL, NULL),
(297, NULL, 'Ganga', '7993896187', 'Kakumanuvari thota 8th line guntur', NULL, NULL, 'gangagandra26@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-23', NULL, NULL, NULL, NULL, NULL),
(298, NULL, 'Madhava Hari Krishna', '+919581919309', 'Balaji Nagar 9th Lane, old-guntur', NULL, NULL, 'mnani242011@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-23', NULL, NULL, NULL, NULL, NULL),
(299, NULL, 'G.GOWTHAM ', '9652332413', 'Pangidigudem,dwarakatirumala mandala,west godavari district,near santhamarket,pin code 534425', NULL, NULL, 'gowthambgt00@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-23', NULL, NULL, NULL, NULL, NULL),
(300, NULL, 'KAllappa', '8501886307', 'HNo3/1sugur.villge.mantrlaymma.mandla.kurnool.Dist.AP', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-23', NULL, NULL, NULL, NULL, NULL),
(301, NULL, 'Sathya', '8498964153', 'Balaji Nagar 9th line 1st cross old Guntur, Guntur', NULL, NULL, 'sathyanaidu78@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-23', NULL, NULL, NULL, NULL, NULL),
(302, NULL, 'Hemanth Kethinedi', '9932022557', 'Flat no.502, Dhruva Pearl, 8th Ln Shyamala Nagar, Guntur, Andhra Pradesh 522006, India', NULL, NULL, 'hemanth.kethinedi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(303, NULL, 'Nageswararao Jampala', '8122262206', '69-20-1418,Prashanthi Nagar, Ipd colony, sangadigunta', NULL, NULL, 'jnageswararao2010@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(304, NULL, 'Harika Palaparthi', '09789903489', 'NGOs colony, 1st lane main road, beside venugopalaswamy tenple', NULL, NULL, 'harikapalaparthi07@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(305, NULL, 'Pullagura sri chand krishna teja', '9866077885', 'Arundelpet', NULL, NULL, 'sri.shadi143@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(306, NULL, 'Sekhar Munnangi ', '9908904402', '32-23-1999 1/7 kaakumaanuvaarithota Guntur ', NULL, NULL, 'sekhar.munnangi4402@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(307, NULL, 'udaykumar', '6305879302', 'Budampadu', NULL, NULL, 'caudaykumardadi@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(308, NULL, 'Pradeep Reddy', '07893876290', 'Maruthi Nagar,Main Road', NULL, NULL, 'rebelstar106@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(309, NULL, 'Harika Palaparthi', '09789903489', 'NGOs colony, 1st lane main road, beside venugopalaswamy temple', NULL, NULL, 'harikapalaparthi07@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(310, NULL, 'Harika Palaparthi', '09789903489', 'NGOs colony, 1st lane main road, beside venugopalaswamy temple', NULL, NULL, 'harikapalaparthi07@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-24', NULL, NULL, NULL, NULL, NULL),
(311, NULL, 'VINAY KUMAR', '8328605671', '501, SAI SIDDHARTHA PRIME CASTLE, MALLIKARJUNAPURAM,  INNER RING ROAD, GORANTLA, GUNTUR, ANDHRA PRADESH', NULL, NULL, 'vinaykumarch.12@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-25', NULL, NULL, NULL, NULL, NULL),
(312, NULL, 'Nazeer Ahmed', '9000907007', 'YAGANTI PARK WOOD APPARTMENT, 5th Floor, Flat # 504, Sri Ram Nagar, 12th Line, Inner Ring Road, Guntur - 522034', NULL, NULL, 'nazir9999online@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-25', NULL, NULL, NULL, NULL, NULL),
(313, NULL, 'Pravallika', '07207591958', '5-69-19, 6/20 brodipet', NULL, NULL, 'pravallikasai934@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-25', NULL, NULL, NULL, NULL, NULL),
(314, NULL, 'Vanaga manohar reddy', '8885999650', 'Jonnalagadda', NULL, NULL, 'manoharluminous888@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-26', NULL, NULL, NULL, NULL, NULL),
(315, NULL, 'Sai kiran', '9030107749', '#19-16-5,bavaji nagar 1st lane,ipd colony,  sangadigunta,  guntur', NULL, NULL, 'kiranravipudi@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-27', NULL, NULL, NULL, NULL, NULL),
(316, NULL, 'Sai kiran', '9030107749', '#19-16-5,bavaji nagar 1st lane,ipd colony,  sangadigunta,  guntur', NULL, NULL, 'kiranravipudi@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-27', NULL, NULL, NULL, NULL, NULL),
(317, NULL, 'K.bhaskar rao', '8008473101', 'Namburu', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-27', NULL, NULL, NULL, NULL, NULL),
(318, NULL, 'M.Manoj Kumar', '8247672610', '2nd line, Parvathipuram, SampathNagar, Guntur', NULL, NULL, 'kumar21566@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-28', NULL, NULL, NULL, NULL, NULL),
(319, NULL, 'M.Manoj Kumar', '8247672610', '2nd line, Parvathipuram, SampathNagar, Guntur', NULL, NULL, 'kumar21566@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-08-28', NULL, NULL, NULL, NULL, NULL),
(320, NULL, 'M.Manoj Kumar', '8247672610', '2nd line, Parvathipuram, SampathNagar, Guntur', NULL, NULL, 'kumar21566@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-28', NULL, NULL, NULL, NULL, NULL),
(321, NULL, 'M.Manoj Kumar', '8247672610', '2nd line, Parvathipuram, SampathNagar, Guntur', NULL, NULL, 'kumar21566@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-28', NULL, NULL, NULL, NULL, NULL),
(322, NULL, 'Vijay Krishna', '8208886155', 'Near Shop Employees Colony', NULL, NULL, 'jaivijayb4u@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-29', NULL, NULL, NULL, NULL, NULL),
(323, NULL, 'Pavan', '8106403861', 'H. No 1-56, yamarru', NULL, NULL, 'Pusuluri.pavan@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-29', NULL, NULL, NULL, NULL, NULL),
(324, NULL, 'Vijay', '8208886155', 'Shop Employees Colony Guntur', NULL, NULL, 'jaivijayb4u@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-29', NULL, NULL, NULL, NULL, NULL),
(325, NULL, 'Narendra', '9885117272', 'Hno:2-140, budampadu, Guntur', NULL, NULL, 'narendra.dadi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-30', NULL, NULL, NULL, NULL, NULL),
(326, NULL, 'Srinivasa Rao Thurakapalli', '9611814448', '4-22-77/3,Gowthami Nagar 5th Lane, Koritepadu, Guntur', NULL, NULL, 'thurakapalli.srinivasarao@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-30', NULL, NULL, NULL, NULL, NULL),
(327, NULL, 'Ashok kumar edara', '9182936764', 'Ipd colony sangadigunta', NULL, NULL, 'e.ashok09.09@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-30', NULL, NULL, NULL, NULL, NULL),
(328, NULL, 'Ramu samineni', '8142853086', 'PSR homes 2nd floor 2nd house, near park, Ramalayam road', NULL, NULL, 'samineni.ramu@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-08-31', NULL, NULL, NULL, NULL, NULL),
(329, NULL, 'Vasim', '6304343832', 'Dr.No:54-16-3025,Rahul Gandhi Nagar 5th ;Guntur PIN:522001', NULL, NULL, 'vasim1406@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-08-31', NULL, NULL, NULL, NULL, NULL),
(330, NULL, 'M.Manoj Kumar', '8247672610', '2nd line, Parvathipuram, SampathNagar, Guntur', NULL, NULL, 'kumar21566@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-01', NULL, NULL, NULL, NULL, NULL),
(331, NULL, 'MUNI', '9743025700', 'Urdhu school road,Gujjanagundla,Guntur', NULL, NULL, 'naagamuni@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-01', NULL, NULL, NULL, NULL, NULL),
(332, NULL, 'Ranadheer', '9000453275', 'Akkina pragada vari street ', NULL, NULL, 'ranadheergnt2020@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-02', NULL, NULL, NULL, NULL, NULL),
(333, NULL, 'Bhanu Rekha Chundu', '+917287838387', 'Muthyala Reddy Nagar 4th lane, Guntur', NULL, NULL, 'chundubhanu254@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-02', NULL, NULL, NULL, NULL, NULL),
(334, NULL, 'Thullimella Mukhesh', '7075587818', 'Flat.no-101,dr.no:25-16-106,sai brundavan apartment Kodanda Ramaiah nagar 3rd line, lalpuram Road 522003', NULL, NULL, 'mukheshsarvan1999@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-02', NULL, NULL, NULL, NULL, NULL),
(335, NULL, 'Maguluri Srinivasarao', '09985893546', '4-139 obulesunipalle village durgi mandal guntur dist', NULL, NULL, 'maguluri.srinu1985@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-02', NULL, NULL, NULL, NULL, NULL),
(336, NULL, 'Surya', '9059959838', 'Sanjeevaiah Nagar', NULL, NULL, 'punurichandra138@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-02', NULL, NULL, NULL, NULL, NULL),
(337, NULL, 'Trivikram', '9704546308', 'Navabharath colony main road', NULL, NULL, 'pandustar2006@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-03', NULL, NULL, NULL, NULL, NULL),
(338, NULL, 'Trivikram', '9704546308', 'Navabharath colony main road', NULL, NULL, 'pandustar2006@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-03', NULL, NULL, NULL, NULL, NULL),
(339, NULL, 'Chytanya krishna pula', '8297837611', '15-8-82, jakeer Hussain nagar 1st line, nandivelugu road, old guntur, guntur, 522001', NULL, NULL, 'chytanyak001@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-03', NULL, NULL, NULL, NULL, NULL),
(340, NULL, 'Amulya', '9848831941', 'opp to lem school,6/13A,brodipet,guntur', NULL, NULL, 'blessie.gera9@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-05', NULL, NULL, NULL, NULL, NULL),
(341, NULL, 'Shaik Shabbir', '07619137623', 'End', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-05', NULL, NULL, NULL, NULL, NULL),
(342, NULL, 'Rayapati Venkatesh', '9640852458', '88 Thalluru, Krosur MD, Guntur Dt', NULL, NULL, 'venkateshr59@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-07', NULL, NULL, NULL, NULL, NULL),
(343, NULL, 'sachin', '8178804929', 'opposite gorella mandi , nallapadu', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-07', NULL, NULL, NULL, NULL, NULL),
(344, NULL, 'Manasa Dade', '9207978686', '#4-12-13, Naidupet 1st Lane, Near Sub Registar Office, Opposite to sachivalayam, Guntur-522007', NULL, NULL, 'manasarao_218@yahoo.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-07', NULL, NULL, NULL, NULL, NULL),
(345, NULL, 'NAGA LAKSHMAN', '9948843383', 'RTC-COLONY 4TH LINE OPPOSITE YRK SITARAM ENCLAVE APARTMENT', NULL, NULL, 'm.nagalakshman@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-07', NULL, NULL, NULL, NULL, NULL),
(346, NULL, 'Ramgopal', '9390334811', 'Police Parade Ground, Collector Office Road, Nagarampalem, Guntur, Andhra Pradesh, India', NULL, NULL, 'ramgopalhyndavgoud@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-08', NULL, NULL, NULL, NULL, NULL),
(347, NULL, 'Govardhan', '9885470906', 'Jonnalagadda', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-08', NULL, NULL, NULL, NULL, NULL),
(348, NULL, 'Meha Jabeen', '8985373458', 'D.No: 15-14-83/37, Rahul Gandhi Nagar 5th lane, Guntur-522001', NULL, NULL, 'mdjabeen12@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-09', NULL, NULL, NULL, NULL, NULL),
(349, NULL, 'Nazeer Basha Shaik', '9160923804', '1-4-28', NULL, NULL, 'nazeer04a6@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-09', NULL, NULL, NULL, NULL, NULL),
(350, NULL, 'Satwic Pabbisetty', '+918754683933', '18-28-14, Mantri vari street, sangadigunta', NULL, NULL, 'satwicpabbisetty@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-09', NULL, NULL, NULL, NULL, NULL),
(351, NULL, 'Bhargav', '7993652335', 'Santhi Arts backside , Reddypalem , Guntur', NULL, NULL, 'ankammaraoalp45@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-10', NULL, NULL, NULL, NULL, NULL),
(352, NULL, 'Pavani', '9010744800', 'Gv thota 1st lane', NULL, NULL, 'syamalathaguntur@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-11', NULL, NULL, NULL, NULL, NULL),
(353, NULL, 'Ramakrishna', '9032999666', 'Ch road,mirch yard', NULL, NULL, 'rramkri99@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-11', NULL, NULL, NULL, NULL, NULL),
(354, NULL, 'Nazeer Basha Shaik', '9160923804', '1-4-28', NULL, NULL, 'nazeer04a6@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-12', NULL, NULL, NULL, NULL, NULL),
(355, NULL, 'SATUPATI JOSHUA', '9676000306', 'Flat no 303 kkr arcade vasantharayapuram 2nd line', NULL, NULL, 'joshua.xyz@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-14', NULL, NULL, NULL, NULL, NULL),
(356, NULL, 'Dr P. Naveen Krishna', '+919611223378', 'Krishna nursing home, beside head post office,', NULL, NULL, 'naveenpeddi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-14', NULL, NULL, NULL, NULL, NULL),
(357, NULL, 'vijay', '9909324780', 'Lakshmi Nagar zero line suddapalli donka', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-14', NULL, NULL, NULL, NULL, NULL),
(358, NULL, 'Shaik ibrim', '9703372450', 'Lalapet near murthy fashion', NULL, NULL, 'a9885521378@gamil.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-14', NULL, NULL, NULL, NULL, NULL),
(359, NULL, 'Ganeshyt', '9390638702', 'Reddy gudem sattapalli ', NULL, NULL, 'kumarganesh1463@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-15', NULL, NULL, NULL, NULL, NULL),
(360, NULL, 'Sathishkumar Borugadda', '8097290313', '7th Cross Road, Shop Employees Colony', NULL, NULL, 'sathish8097@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-15', NULL, NULL, NULL, NULL, NULL),
(361, NULL, 'SAI RAM UPPU', '7993959365', 'Behind OK ND new Rto office ', NULL, NULL, 'uppu.sairam@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-15', NULL, NULL, NULL, NULL, NULL),
(362, NULL, 'K.s.c.dattu', '7013129349', 'Sangadigunta,guntur', NULL, NULL, 'chandradattu@yahoo.co.in', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-09-16', NULL, NULL, NULL, NULL, NULL),
(363, NULL, 'Suseel', '9491926687', 'Nallapadu Temple tree apartment', NULL, NULL, 'suseel.kaile@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-17', NULL, NULL, NULL, NULL, NULL),
(364, NULL, 'hemanth sai kumar', '9346024056', 'Adithya Nagar 1st line 136/19  reddypalem main road', NULL, NULL, 'hemanthpandu0@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-17', NULL, NULL, NULL, NULL, NULL),
(365, NULL, 'Bharadwaja', '6303218085', 'Jandachetu', NULL, NULL, 'juturibharadwaja3@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-18', NULL, NULL, NULL, NULL, NULL),
(366, NULL, 'Manikanta', '8008696816', 'Gorantla', NULL, NULL, 'manikantaspicy06@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-18', NULL, NULL, NULL, NULL, NULL),
(367, NULL, 'phani pallapothu', '9866033122', 'Bapuji road,sangadi gunta,guntur -522003', NULL, NULL, 'phanivissu@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-19', NULL, NULL, NULL, NULL, NULL),
(368, NULL, 'Salivendra Madhavilatha', '7981820644', '133-10-2346, Prasanthinagar 1st line', NULL, NULL, 'salprudvi69@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-19', NULL, NULL, NULL, NULL, NULL),
(369, NULL, 'Likhil ', '7702447156', 'Thumuluru', NULL, NULL, 'likhil28@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-19', NULL, NULL, NULL, NULL, NULL),
(370, NULL, 'K mallikharjuna rao', '9848403322', 'Svncolony', NULL, NULL, 'mallikharjuna.katipalli@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-19', NULL, NULL, NULL, NULL, NULL),
(371, NULL, 'Jaya sai', '9618608339', 'Nehru Nagar 10th line', NULL, NULL, 'saicherupalli@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-19', NULL, NULL, NULL, NULL, NULL),
(372, NULL, 'Saran', '9573735696', 'Chinna ramalayam,koritipadu', NULL, NULL, 'saranfreak72@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-20', NULL, NULL, NULL, NULL, NULL),
(373, NULL, 'SreeHarsha', '7989806242', 'SriDevi Homes, 2nd line, Raghavendra Nagar, Palakaluru Road, Guntur', NULL, NULL, 'srharshajava@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-21', NULL, NULL, NULL, NULL, NULL),
(374, NULL, 'Rafi', '8297576611', 'Lanchester road ,sangadigunta, Guntur', NULL, NULL, 'srafi347@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-22', NULL, NULL, NULL, NULL, NULL),
(375, NULL, 'Prabodh', '7286834949', 'Abbirajupalem west godavari district 534266', NULL, NULL, 'prabodh1432@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-22', NULL, NULL, NULL, NULL, NULL),
(376, NULL, 'J bhanu', '9550363796', 'D no:6-8-1, 8/3 Arundelpet.Guntur', NULL, NULL, 'jbms.bhanu@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-22', NULL, NULL, NULL, NULL, NULL),
(377, NULL, 'NAMA KAMALAKARA NAGA SANTHOSH KUMAR ', '9944942399', '88-13-3810, laxmi nagar, Nallapadu road', NULL, NULL, 'santhosh241296@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-22', NULL, NULL, NULL, NULL, NULL),
(378, NULL, 'Kotakonda Harikiran', '9494797135', 'Atmakur, nellore dt', NULL, NULL, 'harikirankumarraj@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-22', NULL, NULL, NULL, NULL, NULL),
(379, NULL, 'XKBkmYaPFhLxrQ', '6914333809', 'aNpQPIfAOvn', NULL, NULL, 'helenbalwin0@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-23', NULL, NULL, NULL, NULL, NULL),
(380, NULL, 'NGyrMXYLOPTs', '3083096856', 'qDUASxuKWzlnHJ', NULL, NULL, 'helenbalwin0@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-23', NULL, NULL, NULL, NULL, NULL),
(381, NULL, 'Sowpatikishorebabu', '9989592536', 'Mangala das agar 2ndline guntur', NULL, NULL, 'sowpatibabu1969@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-23', NULL, NULL, NULL, NULL, NULL),
(382, NULL, 'Sambasivarao', '8328388802', 'Bonthapadu . Guntur district. Andhra Pradesh', NULL, NULL, 'samba88802@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-23', NULL, NULL, NULL, NULL, NULL),
(383, NULL, 'Vijay Tella', '8142396693', 'Bashyam BIIT Samata Mamata campus', NULL, NULL, 'vijaytellas@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-23', NULL, NULL, NULL, NULL, NULL),
(384, NULL, 'Harsha', '7382727468', 'Reddypalem', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-23', NULL, NULL, NULL, NULL, NULL),
(385, NULL, 'Muppana siva prasad', '09700209406', 'D. No:36_18_1189,vasantha raya Puram 2nd lane, Opp. Water tankies, near chintha chettu, guntur', NULL, NULL, 'muppanasivaprasad95@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-23', NULL, NULL, NULL, NULL, NULL),
(386, NULL, 'Natthala venkatarao', '9866412613', 'Vengamukka palem', NULL, NULL, 'natthala.venkatarao@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-09-24', NULL, NULL, NULL, NULL, NULL),
(387, NULL, 'Mani', '7989756128', 'Tenali near umeshchandra statue', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-25', NULL, NULL, NULL, NULL, NULL),
(388, NULL, 'Sujit kumar ', '7675030191', 'Gsr residency plot no SF-5, gujjnagundla, Guntur ', NULL, NULL, 'sujitkumar.mn@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-25', NULL, NULL, NULL, NULL, NULL),
(389, NULL, 'Sujit kumar ', '7675030191', 'Gsr residency plot no SF-5, gujjnagundla, Guntur ', NULL, NULL, 'sujitkumar.mn@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-25', NULL, NULL, NULL, NULL, NULL),
(390, NULL, 'Ganeshyt', '9390638702', 'Reddy gudem sattapalli ', NULL, NULL, 'kumarganesh1463@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-25', NULL, NULL, NULL, NULL, NULL),
(391, NULL, 'Naga Jayanthi', '8374835387', 'SriNagar5thlane', NULL, NULL, 'varikutijayanthi123@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-28', NULL, NULL, NULL, NULL, NULL),
(392, NULL, 'r rajesh', '9676247677', 'near sangam dairy adapabazar r agraharam guntur ', NULL, NULL, 'rajesh6633784@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-09-28', NULL, NULL, NULL, NULL, NULL),
(393, NULL, 'Shaik ayesha', '9652420886', 'Balaji nagar old guntur', NULL, NULL, 'Ayesha4a0@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-09-28', NULL, NULL, NULL, NULL, NULL),
(394, NULL, 'Sivanath ', '8179444212', '4-430, shivalayam road, pedakakani,  guntur', NULL, NULL, 'Sivachowdary111.sn@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-03', NULL, NULL, NULL, NULL, NULL),
(395, NULL, 'SarathRaja', '8143029222', 'Poranki', NULL, NULL, 'atlurisarathraja@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-03', NULL, NULL, NULL, NULL, NULL),
(396, NULL, 'Parameswarao', '9848778937', 'Korietupadu', NULL, NULL, 'bhashyampress@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-06', NULL, NULL, NULL, NULL, NULL),
(397, NULL, 'Parameswarao Rao', '8688548303', 'Korietupadu', NULL, NULL, 'bhashyampress@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-06', NULL, NULL, NULL, NULL, NULL),
(398, NULL, 'PTV KRISHNA PRASAD', '8374744711', 'Vasavi Nagar Guntur', NULL, NULL, 'pkp.paruchuri@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-06', NULL, NULL, NULL, NULL, NULL),
(399, NULL, 'Venkat Teja', '07382609231', 'Chuttugunta,kvp colony 2nd lane,door no :86-4-1331, guntur', NULL, NULL, 'nvtejanallapu2000@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-07', NULL, NULL, NULL, NULL, NULL),
(400, NULL, 'Gopichand', '9550575478', 'D.No-6-8-A,Gorlavaripalem', NULL, NULL, 'nallapanenigopichand@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-08', NULL, NULL, NULL, NULL, NULL),
(401, NULL, 'Tharaka prathap ', '9885551346', 'Old guntur, redla bazar, bus stand back side', NULL, NULL, 'tharakaprathap.v@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-08', NULL, NULL, NULL, NULL, NULL),
(402, NULL, 'rWfIGYavuDCTzs', '2412760923', 'IyNbJFltaX', NULL, NULL, 'pakukizuminaoten@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-08', NULL, NULL, NULL, NULL, NULL),
(403, NULL, 'LHSzxdjFsy', '8918627299', 'RIbhTLZHzeX', NULL, NULL, 'pakukizuminaoten@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-08', NULL, NULL, NULL, NULL, NULL),
(404, NULL, 'Sk.Shoyeab', '8978245224', 'Beside water tanks ponnur road guntur', NULL, NULL, 'sk.shoyeab5678@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-09', NULL, NULL, NULL, NULL, NULL),
(405, NULL, 'Sk.Shoyeab', '8978245224', 'Beside water tanks ponnur road guntur', NULL, NULL, 'sk.shoyeab5678@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-09', NULL, NULL, NULL, NULL, NULL),
(406, NULL, 'Parchuri Venkata Vinay Kumar', '9642772437', '5-49, Ramalayam Street, East Gangavaram, Tallur mandal, Prakasam district, Andhra Pradesh. Pin code: 523264', NULL, NULL, 'venni7p@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-09', NULL, NULL, NULL, NULL, NULL),
(407, NULL, 'Manikanta B', '6281285224', 'Anjaneya colony, reddy palem road. Guntur', NULL, NULL, 'manikanta152915@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-09', NULL, NULL, NULL, NULL, NULL),
(408, NULL, 'Ranjit Patil', '+919850698763', '101,24,kh2,vastu vihar', NULL, NULL, 'royalkol@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-10-09', NULL, NULL, NULL, NULL, NULL),
(409, NULL, 'Meda srinivasa rao', '9989973227', 'Madinapadu road ', NULL, NULL, 'srinu.meda275@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-09', NULL, NULL, NULL, NULL, NULL),
(410, NULL, 'p koteswararao', '8801280431', 'dno 49-5-169,syamala das agraharam, bestha veedhi, guntur 522001', NULL, NULL, 'koteswararaopittala@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-10', NULL, NULL, NULL, NULL, NULL),
(411, NULL, 'Cheeli Sruthi', '+917396198066', 'Sekur', NULL, NULL, 'sruthicheeli984@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-11', NULL, NULL, NULL, NULL, NULL),
(412, NULL, 'Syed iliyas', '9154577272', 'Srinivasa Rao peta 11th line 60feet road', NULL, NULL, 'syediliyas2786@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-11', NULL, NULL, NULL, NULL, NULL),
(413, NULL, 'VENU GOPAL', '8099085666', 'Flat.no.109', NULL, NULL, 'venu19298@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-12', NULL, NULL, NULL, NULL, NULL),
(414, NULL, 'bala', '9949928827', 'a.t.agraharam', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-10-12', NULL, NULL, NULL, NULL, NULL),
(415, NULL, 'Shaik Mastansharif', '8142528105', '4-144, near jendachettu , phirangipuram', NULL, NULL, 'mastansharif92@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-12', NULL, NULL, NULL, NULL, NULL),
(416, NULL, 'Shaik kazima', '9398484622', 'Door no 65-3-135, Anandapet 9/1 line', NULL, NULL, 'skbashamujahid@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-12', NULL, NULL, NULL, NULL, NULL),
(417, NULL, 'Vijaya', '8341842783', 'Nallapadu, Andhra Pradesh, India', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-13', NULL, NULL, NULL, NULL, NULL),
(418, NULL, 'Bulla syam kumar', '7780544151', 'Venigandla ,pedakakani ,guntur', NULL, NULL, 'thambybulla@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-13', NULL, NULL, NULL, NULL, NULL),
(419, NULL, 'TADIGIRI VIDYA SAGAR', '9700854255', 'Velangini Nagar, Near RCM Church, Guntur', NULL, NULL, 'sagar_tadigiri@rediffmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-13', NULL, NULL, NULL, NULL, NULL),
(420, NULL, 'VIJAY DANDU', '9032336335', 'Behind JMJ Residency Nandikatla Complex KVP Colony Road Near to Vijayawada Highway', NULL, NULL, 'dvijay.dandu@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-14', NULL, NULL, NULL, NULL, NULL),
(421, NULL, 'Kumar', '9985252540', '15th AT Agraharam', NULL, NULL, 'kumaresan1993tk@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-14', NULL, NULL, NULL, NULL, NULL),
(422, NULL, 'Vamsi Krishna Avula', '9980387986', '401, Sneha Enclave, Lakshmipuram, Guntur - 522007', NULL, NULL, 'avamsi07@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-14', NULL, NULL, NULL, NULL, NULL),
(423, NULL, 'Lakshmi Narayana Reddy', '7702769132', 'High school Road, Kothareddipalem, chebrole', NULL, NULL, 'lakshminarayana.jonnala@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-14', NULL, NULL, NULL, NULL, NULL),
(424, NULL, 'Chandra Shekhar', '9381990388', 'Gamala street govind palli kota mandal', NULL, NULL, 'lovely.chandra.royals.1998@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-14', NULL, NULL, NULL, NULL, NULL),
(425, NULL, 'Goutham Buggaveeti', '9663049634', 'Kannavaarithota 4th lane,guntur', NULL, NULL, 'prnce.goutham93@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-15', NULL, NULL, NULL, NULL, NULL),
(426, NULL, 'Seshanadh', '9849110770', 'Near sims my school ', NULL, NULL, 'seshunathkv@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-15', NULL, NULL, NULL, NULL, NULL),
(427, NULL, 'Naveen', '9663752173', '7-6-765,Sanjeevaiah Nagar,4/3 Lane,Guntur,AP,522002', NULL, NULL, 'naveen.gangula235@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-15', NULL, NULL, NULL, NULL, NULL),
(428, NULL, 'James', '7981583698', 'Israel pet Manipuram park RTC colony road', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-15', NULL, NULL, NULL, NULL, NULL),
(429, NULL, 'Hari Babu', '7702294444', '16-31-49/A,BALAJI NAGAR 10TH LANE ,OLD GUNTUR,GUNTUR', NULL, NULL, 'hariasicv@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-15', NULL, NULL, NULL, NULL, NULL),
(430, NULL, 'Karavalla somaiah', '8328265380', 'Thuffan nagar-2nd line', NULL, NULL, 'karavallasomaiah117@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-16', NULL, NULL, NULL, NULL, NULL),
(431, NULL, 'G v ramana', '9573799937', 'Nizamabad', NULL, NULL, 'akki86870@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-16', NULL, NULL, NULL, NULL, NULL),
(432, NULL, 'Durga Maheswari', '9666673888', 'putta road, 7/7, srinagar colony, guntur', NULL, NULL, 'ylnarayan@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-16', NULL, NULL, NULL, NULL, NULL),
(433, NULL, 'T Ramamohana Rao', '+919441244442', 'Telecom Nagar 7th Lane Anaravathi Road', NULL, NULL, 'ramamohanaraot@hotmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-17', NULL, NULL, NULL, NULL, NULL),
(434, NULL, 'Nagi reddy ', '9908055599', '4th lane RTC colony ', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-17', NULL, NULL, NULL, NULL, NULL),
(435, NULL, 'Leena Abhinaya', '8297185803', 'Flat No. 102, AB Towers, Dr. APJ Abdul Kalam Street, Near Sri Chaitanya School, Mahatma Gandhi Inner Ring Road, Guntur', NULL, NULL, 'leenaabhinaya@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-17', NULL, NULL, NULL, NULL, NULL),
(436, NULL, 'Ms Murthy', '7207878909', 'Peda palakaluru, guntur', NULL, NULL, 'rushimanohar123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-17', NULL, NULL, NULL, NULL, NULL),
(437, NULL, 'Ms Murthy', '7207878909', 'Peda palakaluru, guntur', NULL, NULL, 'rushimanohar123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-17', NULL, NULL, NULL, NULL, NULL),
(438, NULL, 'Kalyani', '9121002446', 'Lalapet,old Bus stand', NULL, NULL, 'kalyanipmca@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-18', NULL, NULL, NULL, NULL, NULL),
(439, NULL, 'Abdul farook shaik', '7893551999', 'Chowtra  centre bikaredas street d.no:20-2-11', NULL, NULL, 'abdulfarook2@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-18', NULL, NULL, NULL, NULL, NULL),
(440, NULL, 'Kallagunta siva nagaraju', '9492985601', '26-35-42/A hanuman nagar 2nd line, nallapadu road, guntur, 522004', NULL, NULL, 'nagarajukallagunta1@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-18', NULL, NULL, NULL, NULL, NULL),
(441, NULL, 'Rajavarapusrilaksi', '6303754546', 'Gujjanagundla ', NULL, NULL, 'rajavarapusrilakshmi1@gmail', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-18', NULL, NULL, NULL, NULL, NULL),
(442, NULL, 'Saathvik Vura', '9010742413', 'Swathishoppingmall lakshmipuram main road guntur', NULL, NULL, 'saathvik.venkata@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-18', NULL, NULL, NULL, NULL, NULL),
(443, NULL, 'Gnanadeep ', '7989752859', '301 Gokulkrishna residency  Mallareddynagr ', NULL, NULL, 'gnanadeep.nani@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-18', NULL, NULL, NULL, NULL, NULL),
(444, NULL, 'raghavendra Rao Gumma', '09880057227', 'Guntur', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-19', NULL, NULL, NULL, NULL, NULL),
(445, NULL, 'Chandra sekhar ', '8225812631', 'D.no 7-6-765, sanjeevaih nahar 3/3 line', NULL, NULL, 'chandra.sekhar32@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL),
(446, NULL, 'KAKARLA BALU SURESH', '08106037061', 'Guntur', NULL, NULL, 'kakarlasuresh1995@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL),
(447, NULL, 'Amar pullamsetty', '9866770699', 'Sampath nagar', NULL, NULL, 'aponlineguntur@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL),
(448, NULL, 'madhu krishna', '06302327023', 'guntur', NULL, NULL, 'madhu297697@outlook.ccom', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL),
(449, NULL, 'madhu krishna', '06302327023', 'guntur', NULL, NULL, 'madhu297697@outlook.ccom', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `add_lead` (`id`, `branch`, `customer_name`, `mobile`, `address_1`, `address_2`, `landmark`, `email`, `priority`, `lead_source`, `lead_type`, `conn_type`, `notes`, `status`, `date`, `from_date`, `from_time`, `to_time`, `to_date`, `last_update`) VALUES
(450, NULL, 'Madhu Krishna Sai Naveen', '9491836248', '5/21 brodipet guntur', NULL, NULL, 'madhu.vankayalapati04@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL),
(451, NULL, 'Elugu Manojkumar ', '8688115090', '3rd line ,rahul gandhi nagar,guntur ', NULL, NULL, 'elugumanojkumar@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL),
(452, NULL, 'Gsrkprasad', '9490723355', 'Srinagar7/5.', NULL, NULL, 'gsrkprasad17@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-20', NULL, NULL, NULL, NULL, NULL),
(453, NULL, 'KUPLvnlRy', '3379811783', 'sCzBgOGca', NULL, NULL, 'tateracennf@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-21', NULL, NULL, NULL, NULL, NULL),
(454, NULL, 'OTZdAntlBEgqaf', '5826091091', 'iuncVrTGvBWdqsmh', NULL, NULL, 'tateracennf@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-21', NULL, NULL, NULL, NULL, NULL),
(455, NULL, 'Anil', '9030160556', '', NULL, NULL, 'mnvanilkumar@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-21', NULL, NULL, NULL, NULL, NULL),
(456, NULL, 'SHAIK ABDUL HAQ', '9100040392', '16-15-215/b, YADAVA BAZAR, OLD GUNTUR', NULL, NULL, 'haq.ahbc1970@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-21', NULL, NULL, NULL, NULL, NULL),
(457, NULL, 'Jhansi', '9515351531', '', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-22', NULL, NULL, NULL, NULL, NULL),
(458, NULL, 'SHAIK NAGOOR', '7799669000', 'L R COLONY 8TH LINE SANGADIGUNTA GUNTUR', NULL, NULL, 'd.n0007144@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-22', NULL, NULL, NULL, NULL, NULL),
(459, NULL, 'sambaiah pelluri', '7310664663', 'park center, old guntur', NULL, NULL, 'sambaiah439@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-22', NULL, NULL, NULL, NULL, NULL),
(460, NULL, 'Alapati Rajasekhar', '8639519530', '25/8/33 Ramanama keshtram 2nd lane', NULL, NULL, 'arsmcom8815@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-22', NULL, NULL, NULL, NULL, NULL),
(461, NULL, 'Harsha', '7989806242', 'Vignan College, Palakaluru Road', NULL, NULL, 'srharshajava@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-22', NULL, NULL, NULL, NULL, NULL),
(462, NULL, 'A VENU', '08074209780', 'NALLACHERUVU', NULL, NULL, 'venuranjithkumar@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-23', NULL, NULL, NULL, NULL, NULL),
(463, NULL, 'NAVEEN', '9398750902', '28-13-537 6/21  brodipet guntur  522002', NULL, NULL, 'madhu297697@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-23', NULL, NULL, NULL, NULL, NULL),
(464, NULL, 'sharon rose', '9705460612', 'sarada colony 9 th line guntur ', NULL, NULL, 'jittahavilah2004@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-10-23', NULL, NULL, NULL, NULL, NULL),
(465, NULL, 'SHAIK NAGOOR VALI', '8686430723', '19-7-477, SANGADIGUNTA 3RD LINE', NULL, NULL, 'sk.jani78622@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-24', NULL, NULL, NULL, NULL, NULL),
(466, NULL, 'Ch. Vineeth Kumar', '+918277574707', 'KAZA', NULL, NULL, 'vineethvicky12@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-26', NULL, NULL, NULL, NULL, NULL),
(467, NULL, 'Lokesh Reddy Dantla', '9492789410', 'Vejendla, chebrole', NULL, NULL, 'lokeshreddy999999999@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-26', NULL, NULL, NULL, NULL, NULL),
(468, NULL, 'Vinay Kumar ', '8500779196', '17-81, ambedkar colony 2nd lane,pogaku company road,Pedda Kakani, Guntur', NULL, NULL, 'Avinay222@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-27', NULL, NULL, NULL, NULL, NULL),
(469, NULL, 'Pathan jafar', '9346685005', 'Sitanagar 2nd line rosewood apartment', NULL, NULL, 'pathanjaffer166@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-27', NULL, NULL, NULL, NULL, NULL),
(470, NULL, 'Pathan jafar', '9346685005', 'Sitanagar 2nd line rosewood apartment', NULL, NULL, 'pathanjaffer166@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-27', NULL, NULL, NULL, NULL, NULL),
(471, NULL, 'Yarlagadda bujji', '8096774242', '522257. ', NULL, NULL, 'paladugulavenkataswarao@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-27', NULL, NULL, NULL, NULL, NULL),
(472, NULL, 'Gadde Ramesh', '9912650506', '1-72/a chandapuram post Nandigama pin code 521185', NULL, NULL, 'ramesh9912650506@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-28', NULL, NULL, NULL, NULL, NULL),
(473, NULL, 'Shaik Jaipal', '9959942977', 'Jesus Christ Prayer House Church, Medikonduru Road, Perecherla', NULL, NULL, 'jaipaulshaik123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-10-30', NULL, NULL, NULL, NULL, NULL),
(474, NULL, 'Mani Kumar', '7702922277', 'RTC colony', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-10-31', NULL, NULL, NULL, NULL, NULL),
(475, NULL, 'Krishna D', '9581958045', 'Ramaiah nagar 1/4 th line', NULL, NULL, 'krishnamurthy.2976@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-01', NULL, NULL, NULL, NULL, NULL),
(476, NULL, 'Kanaparthi Sunil Kumar', '8919868775', '#18-24-22,  S.S.V.Street, Ananadapet,', NULL, NULL, 'kumar.kanaparthi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-01', NULL, NULL, NULL, NULL, NULL),
(477, NULL, 'SunilKumar', '8919868775', '#18-24-22, S.S.V.Street, Anandapet, Guntur', NULL, NULL, 'kumar.kanaparthi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-01', NULL, NULL, NULL, NULL, NULL),
(478, NULL, 'Mahesh', '8885471444', '501, Gorantla Residency, Mahatma Gandhi Inner ring Road, Bhasyam hostel road, Guntur', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-01', NULL, NULL, NULL, NULL, NULL),
(479, NULL, 'Sk Ghouse Basha', '9912281744', 'D.no 59-3-449 redla baat 3rd line old guntur', NULL, NULL, 'skrabani1987@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-03', NULL, NULL, NULL, NULL, NULL),
(480, NULL, 'Lingala jayalakshmi ', '6309068078', 'Dno-63-11-1778,balajinagar, old guntur, Guntur ', NULL, NULL, 'srija239@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-03', NULL, NULL, NULL, NULL, NULL),
(481, NULL, 'Teja sree', '9742467554', '2, 2nd Ln, Redla Bazar, Thamma Ranga Reddy Nagar, Guntur, Andhra Pradesh 522001, India', NULL, NULL, 'balamcakmm@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-03', NULL, NULL, NULL, NULL, NULL),
(482, NULL, 'nNQWjurw', '6386801665', 'uGwFBnRkvqytbEfV', NULL, NULL, 'robertross9071@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-04', NULL, NULL, NULL, NULL, NULL),
(483, NULL, 'SfrbEupcOqehdM', '7870660547', 'jTWKOSknZM', NULL, NULL, 'robertross9071@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-04', NULL, NULL, NULL, NULL, NULL),
(484, NULL, 'Ramu', '8555919424', 'Chebrolu', NULL, NULL, 'ram.padala3@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-05', NULL, NULL, NULL, NULL, NULL),
(485, NULL, 'Leela Prakash Pittala', '+917032389298', 'Balaji Nagar 3rd lane , Old Guntur', NULL, NULL, 'leelaprakashpittala@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-05', NULL, NULL, NULL, NULL, NULL),
(486, NULL, 'Mastan shaik', '8519842817', 'A.t.agraharam', NULL, NULL, 'maddieshaik@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-06', NULL, NULL, NULL, NULL, NULL),
(487, NULL, 'vali shaik', '07989813683', 'Opp koretipadu cheruvu  GUNTUR', NULL, NULL, 'skv1036699@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-06', NULL, NULL, NULL, NULL, NULL),
(488, NULL, 'RAMESH VALLURI', '+919739766000', 'Kendriya vidyalaya, BAck side of Gorrelamandi, Nallapadu', NULL, NULL, 'valluri.blacjberry@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-09', NULL, NULL, NULL, NULL, NULL),
(489, NULL, 'VENIGALLA JAYA VENKATA SIVANATH', '08179444212', '4-430, shivalayam road, pedakakani,  guntur', NULL, NULL, 'Sivachowdary111.sn@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-10', NULL, NULL, NULL, NULL, NULL),
(490, NULL, 'Srinivas ', '9172724196', 'Mutlur ', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-10', NULL, NULL, NULL, NULL, NULL),
(491, NULL, 'Venkat', '8885471444', 'Inner ring Road', NULL, NULL, 'venkat1995@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-11', NULL, NULL, NULL, NULL, NULL),
(492, NULL, 'Venkat', '8885471444', 'Inner ring Road', NULL, NULL, 'venkat1995@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-11', NULL, NULL, NULL, NULL, NULL),
(493, NULL, 'B Tarun', '9493944804', 'Telecom nagar Nagaralu 6 the line sarada school', NULL, NULL, 'bitratarun1996@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-11', NULL, NULL, NULL, NULL, NULL),
(494, NULL, 'Siva', '8328335667', 'Sattenapalli ', NULL, NULL, 'pasupulati00@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-11', NULL, NULL, NULL, NULL, NULL),
(495, NULL, 'Ramu Asa', '9030108052', 'D.no87-16-2698 Kamakshi Nagar,11th line,Guntur', NULL, NULL, 'ramudigi2016@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-12', NULL, NULL, NULL, NULL, NULL),
(496, NULL, 'G SREE HARI', '7730842720', 'D.NO.19-9-86/A,BONTHAPADU DONKA,', NULL, NULL, 'SREEHARI.111986@GMAIL.COM', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-13', NULL, NULL, NULL, NULL, NULL),
(497, NULL, 'Ch gopi', '9160804991', '7-6-155,bongralabeedu.6 th lane', NULL, NULL, 'chdivya@gmil.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-11-14', NULL, NULL, NULL, NULL, NULL),
(498, NULL, 'mfngfngk', '8787789987', '', NULL, NULL, 'anudsdfdf@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-14', NULL, NULL, NULL, NULL, NULL),
(499, NULL, 'mfngfngk', '8787789987', '', NULL, NULL, 'anudsdfdf@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-14', NULL, NULL, NULL, NULL, NULL),
(500, NULL, 'Dethv', '8654321123', '', NULL, NULL, 'gfyhgf@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-14', NULL, NULL, NULL, NULL, NULL),
(501, NULL, 'Sandeep', '7287029348', 'Barampet, Narasaraopet, Guntur', NULL, NULL, 'sandeepyarroju@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-15', NULL, NULL, NULL, NULL, NULL),
(502, NULL, 'chenna malleswararao', '09396451764', 'Taraka Rama Nagar, Sivasai Sadan', NULL, NULL, 'chenna.malleswararao@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-16', NULL, NULL, NULL, NULL, NULL),
(503, NULL, 'Syed Munna', '9985325310', '40-6-271, Sitanagar 3rd line', NULL, NULL, 'syednazar906@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-16', NULL, NULL, NULL, NULL, NULL),
(504, NULL, 'Ravuri Venkata Naga Karthik', '9390208054', '4th Line, Nehru Nagar, Guntur, Andhra Pradesh, India, Dno:-8-7-90,lnfront of As', NULL, NULL, 'rvlgs2002@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-17', NULL, NULL, NULL, NULL, NULL),
(505, NULL, 'Mahendra Reddy', '8331941704', 'Near Kailasagiri Road, Jayaraj fortune packaging Pvt Ltd, Nallapadu village, Guntur, Andhra Pradesh,522005', NULL, NULL, 'mahendrareddyannapureddy@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-17', NULL, NULL, NULL, NULL, NULL),
(506, NULL, 'Lohith Kumar', '9948491407', 'Sri Kanaka Durga Temple', NULL, NULL, 'lohithlp92@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-18', NULL, NULL, NULL, NULL, NULL),
(507, NULL, 'RAMAKRISHNA NELAKUDITI', '09030517108', 'Ankireddy palem road, Nallapadu, Guntur', NULL, NULL, 'Nrk6208@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-21', NULL, NULL, NULL, NULL, NULL),
(508, NULL, 'Dasari Deva Manikanta', '8184945039', 'amaravathi , mandal , guntur distric , amaravathi village, near register office', NULL, NULL, 'dasaridevamanikanta@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-22', NULL, NULL, NULL, NULL, NULL),
(509, NULL, 'Rafiq', '8919578560', 'Krishna Babu colony', NULL, NULL, 'rafiqshaik35@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-25', NULL, NULL, NULL, NULL, NULL),
(510, NULL, 'Reshma', '8919471018', 'Lalpuram Donka, Krishna Babu colony, Guntur 522004', NULL, NULL, 'skreshma1206@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-25', NULL, NULL, NULL, NULL, NULL),
(511, NULL, 'Sai Teja Reddy Kypu', '7674875871', '25-10-118, 3rd Lane, Srinivasarao Peta, Guntur', NULL, NULL, 'kypusaiteja.2307@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-25', NULL, NULL, NULL, NULL, NULL),
(512, NULL, 'Mohammed Riyaz', '9849508085', 'VURAVARI STREET, LALAPET', NULL, NULL, 'noor78646@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2020-11-25', NULL, NULL, NULL, NULL, NULL),
(513, NULL, 'Sujatha ', '9640096523', 'Maruthi Nagar Main Road, 2nd cross road, Guntur', NULL, NULL, 'nandiaptisivachowdeswar@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-28', NULL, NULL, NULL, NULL, NULL),
(514, NULL, 'G Siva Sidhardha', '09160478813', '5-108', NULL, NULL, 'sivasidhardha143.ss@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-11-29', NULL, NULL, NULL, NULL, NULL),
(515, NULL, 'Muthkumar', '8886494466', 'Bommerilu apartment, Vasavi nagar, Guntur', NULL, NULL, 'balanbit@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-11-30', NULL, NULL, NULL, NULL, NULL),
(516, NULL, 'U srinivasareddy', '6303474339', 'Temple tree park,nallapadu', NULL, NULL, 'srinubingo@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-02', NULL, NULL, NULL, NULL, NULL),
(517, NULL, 'Prasad', '9032223457', 'D. No: 10-138, Near RCM church, Gorantla, Guntur', NULL, NULL, 'prasadguntur@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-04', NULL, NULL, NULL, NULL, NULL),
(518, NULL, 'sudheer', '9581179771', 'vijaywada', NULL, NULL, 'mavillasudheer1431@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-05', NULL, NULL, NULL, NULL, NULL),
(519, NULL, 'Bhanu Prakash', '7799352594', 'ponnekallu', NULL, NULL, 'kalari.bhanuprakash@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-06', NULL, NULL, NULL, NULL, NULL),
(520, NULL, 'ACScOijTgkFtUsNX', '7597229582', 'VOzkMuwYpS', NULL, NULL, 'mm9796806@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-06', NULL, NULL, NULL, NULL, NULL),
(521, NULL, 'pOHsQtUyBG', '6456547525', 'SGcfwHDumV', NULL, NULL, 'mm9796806@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-06', NULL, NULL, NULL, NULL, NULL),
(522, NULL, 'KOVELAMPATI VENKATESH', '9393962753', 'D.no 3-1-608/A, Fathimapuram 2nd lane, Near Jute Mill, Guntur-522006', NULL, NULL, 'kov.venki2439@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-07', NULL, NULL, NULL, NULL, NULL),
(523, NULL, 'Premchand Kollipara', '09885287072', 'D-no 10-10,gorantla,Guntur', NULL, NULL, 'kollipara63@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-08', NULL, NULL, NULL, NULL, NULL),
(524, NULL, 'Vamsee P', '7981483693', 'Kandukur, prakasam dtc', NULL, NULL, 'vamseepade6@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-09', NULL, NULL, NULL, NULL, NULL),
(525, NULL, 'Ranjan', '7892807372', 'BTR puram,mangalam,tirupati', NULL, NULL, 'ranjankumard34@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-11', NULL, NULL, NULL, NULL, NULL),
(526, NULL, 'Prasanth Kalluri', '7981890257', 'OPPOSITE post office VENGALAYAPALEM NALLAPADU', NULL, NULL, 'PRASANTH.KALLURI1@GMAIL.COM', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-13', NULL, NULL, NULL, NULL, NULL),
(527, NULL, 'Vidyasagar G', '9603930412', 'Flat No 002, Block-D, Siva Green Valley Apartments, Gorantla, Guntur 522034', NULL, NULL, 'gsagar.gmj@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-14', NULL, NULL, NULL, NULL, NULL),
(528, NULL, 'Shaik tabraz ali', '8639984480', 'Pothurivari thota 2nd line guntur , d:no:- 14-3-25', NULL, NULL, 'shaiktabrazali0@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-15', NULL, NULL, NULL, NULL, NULL),
(529, NULL, 'Shaik Jani', '9866346990', 'Chandra Babu Naidu Colony Main Road', NULL, NULL, 'info.sice.in@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-15', NULL, NULL, NULL, NULL, NULL),
(530, NULL, 'Shaik Jani', '9866346990', 'Jinnah Tower Center', NULL, NULL, 'info.sice.in@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-15', NULL, NULL, NULL, NULL, NULL),
(531, NULL, 'P Sathvik', '8179714954', 'Srinivasa Citadel opposite to Hosanna Mandir Gorantla', NULL, NULL, 'sathvik276@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-16', NULL, NULL, NULL, NULL, NULL),
(532, NULL, 'MANI TEJA', '9908168948', 'Door no:132-137, Main road Reddypalem, Near Substation Reddypalem, Guntur', NULL, NULL, 'mani.teja.338658@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-18', NULL, NULL, NULL, NULL, NULL),
(533, NULL, 'vijaya', 'kishore', '7/6/933 sarada colony', NULL, NULL, 'sayhai2kishore@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-19', NULL, NULL, NULL, NULL, NULL),
(534, NULL, 'ROHITH', '7337519232', 'Dondapadu, thullur, guntur, Andhra Pradesh, 522237.', NULL, NULL, 'rohithkumarnelluri99@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-19', NULL, NULL, NULL, NULL, NULL),
(535, NULL, 'Narsimha Reddy ', '8978525368', 'Flat no. 301 elite Castillo apartment ', NULL, NULL, 'soumith225@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-20', NULL, NULL, NULL, NULL, NULL),
(536, NULL, 'Pardhu', '7901336962', 'Door NO:2-264,Kandrika,Phirangi puram Mandal,Guntur District.522529', NULL, NULL, 'Pardhulucky210@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-21', NULL, NULL, NULL, NULL, NULL),
(537, NULL, 'kadiyala sai madhu pavan', '08801141799', 'nehru nagar 2nd line', NULL, NULL, 'saimadhupavan@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-22', NULL, NULL, NULL, NULL, NULL),
(538, NULL, 'Sriram Polepeddi', '9052341348', '133A, Teachers Colony, East Marredpally, Secunderabad 500026', NULL, NULL, 'polsriram@yahoo.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-26', NULL, NULL, NULL, NULL, NULL),
(539, NULL, 'Rao', '6305658519', 'Vikas nagar', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2020-12-27', NULL, NULL, NULL, NULL, NULL),
(540, NULL, 'Pakala Lohith Kumar', '9100149248', 'Flat no 401,Sri aditya homes,beside masjid,nallapadu', NULL, NULL, 'lohithpkumar7@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-28', NULL, NULL, NULL, NULL, NULL),
(541, NULL, 'vivekananda reddy ', '9581234559', 'kannavari thota 6th line, guntur', NULL, NULL, 'gnt.suswadeep@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2020-12-28', NULL, NULL, NULL, NULL, NULL),
(542, NULL, 'Praveena', '9441159805', 'Perecherla, Guntur - 522005', NULL, NULL, 'muvvapraveena@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-01', NULL, NULL, NULL, NULL, NULL),
(543, NULL, 'jitendra', '7396651353', 'gurus academy,some palli garden,isharon enclave', NULL, NULL, 'doppalapudi.jitendra@yahoo.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-01', NULL, NULL, NULL, NULL, NULL),
(544, NULL, 'Satish', '7675963536', 'Plot no 123 takkellapadu village towards nandhivelugu road', NULL, NULL, 'satishkumar.mothukuri@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-06', NULL, NULL, NULL, NULL, NULL),
(545, NULL, 'VJ', '09515735499', 'Srinivasarao pet 9th line', NULL, NULL, 'guttipraveen@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-07', NULL, NULL, NULL, NULL, NULL),
(546, NULL, 'Rajesh', '9538481030', 'Perecherla ', NULL, NULL, 'chrajesh.379@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2021-01-10', NULL, NULL, NULL, NULL, NULL),
(547, NULL, 'Valluri venkata Ramana', '6301411278', 'NALLAPADU', NULL, NULL, 'vallurive@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-11', NULL, NULL, NULL, NULL, NULL),
(548, NULL, 'Shaik Adilshah', '09618620074', 'Guntur', NULL, NULL, 'shaikadilshah001@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-11', NULL, NULL, NULL, NULL, NULL),
(549, NULL, 'Dhana lakshmi', '8790298809', 'ipd colony', NULL, NULL, 'aadhyasreecollections@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-15', NULL, NULL, NULL, NULL, NULL),
(550, NULL, 'Rajasekhar', '09494743473', 'Lakshmi Nagar  1st Line', NULL, NULL, 'marri.raja111@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-15', NULL, NULL, NULL, NULL, NULL),
(551, NULL, 'Joshua', '9676000306', 'Vasantharayapuram', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-17', NULL, NULL, NULL, NULL, NULL),
(552, NULL, 'Sumanth ', '08688758599', 'Kolanukonda ', NULL, NULL, 'sumanth7899@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-18', NULL, NULL, NULL, NULL, NULL),
(553, NULL, 'Lakshman Birapuneni', '09966916028', '9966916028', NULL, NULL, 'birapunenilakshman@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-19', NULL, NULL, NULL, NULL, NULL),
(554, NULL, 'qRFjKMurzwlUHda', '6488923583', 'gzyopSkldtH', NULL, NULL, 'marye6870@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-20', NULL, NULL, NULL, NULL, NULL),
(555, NULL, 'QUGKSDIdabOZH', '7062505752', 'LQeuJjRymAK', NULL, NULL, 'marye6870@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-20', NULL, NULL, NULL, NULL, NULL),
(556, NULL, 'Bharath babu', '9542248728', '20th line saradha colony, near state bank of india, guntur', NULL, NULL, 'mbbabu369@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-20', NULL, NULL, NULL, NULL, NULL),
(557, NULL, 'Inturi venkata sandeep', '7093815424', 'Rtc colony main road, venkataraopet 1st lane near dhannama hotel', NULL, NULL, 'sandeepinturi1@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-22', NULL, NULL, NULL, NULL, NULL),
(558, NULL, 'Hima bindu', '9550225949', '', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2021-01-26', NULL, NULL, NULL, NULL, NULL),
(559, NULL, 'Mohammad', '9701644963', 'Hussain nagar 8th lane guntur', NULL, NULL, 'iemjalaal@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-27', NULL, NULL, NULL, NULL, NULL),
(560, NULL, 'vinod kumar Karri', '8121262777', '41-1-101/1, Ambedkar nagar 1 st line, Guntur-522001', NULL, NULL, 'vinodkumarkarri@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-28', NULL, NULL, NULL, NULL, NULL),
(561, NULL, 'PRAVEEN ', '9705952926', 'santhinagar,RAYANAPADU, Near gollapudi, vijayawada', NULL, NULL, 'lalith.kmv20@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-01-29', NULL, NULL, NULL, NULL, NULL),
(562, NULL, 'Sandeep', '9701527672', 'House no 7-236, Geethanjali school road, Gowdapalem, pedakakani Guntur-522509 ', NULL, NULL, 'sandeepnithin.1988@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-01-30', NULL, NULL, NULL, NULL, NULL),
(563, NULL, 'Pavani', '9398393200', 'Gv thota 1st lane', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-02-01', NULL, NULL, NULL, NULL, NULL),
(564, NULL, 'YfBrWnopHU', '5517826914', 'zfdalUupTQFXMcNq', NULL, NULL, 'hickmanxox55@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-02-04', NULL, NULL, NULL, NULL, NULL),
(565, NULL, 'EMnPfJYlg', '6690335259', 'YbNIBQeAfcu', NULL, NULL, 'hickmanxox55@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-02-04', NULL, NULL, NULL, NULL, NULL),
(566, NULL, 'Purushotham', '8106156682', '12/650 BUGGA street renigunta', NULL, NULL, 'chinnu0125@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-02-07', NULL, NULL, NULL, NULL, NULL),
(567, NULL, 'Saipriya Mettu', '7032755910', '5-42/3, Turakapalem,Pedapalakaluru', NULL, NULL, 'Swapnamettu4a7@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-02-09', NULL, NULL, NULL, NULL, NULL),
(568, NULL, 'govardhanreddy', '7893306384', 'sanketapuram', NULL, NULL, 'vardhanmca11@yahoo.co.in', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-02-22', NULL, NULL, NULL, NULL, NULL),
(569, NULL, 'govardhanreddy', '9885470906', 'sanketapuram', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-02-22', NULL, NULL, NULL, NULL, NULL),
(570, NULL, 'Job Jawahar', '7842484931', '4th lane Gandhinagar, Etukuru road', NULL, NULL, 'licsoon37@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-02-23', NULL, NULL, NULL, NULL, NULL),
(571, NULL, 'Leela Manohar', '9573656446', 'Door No: 36-15-649, Bongaralabeedu 7th Line, Guntur, Andra Pradesh - 522002', NULL, NULL, 'leelamanohar202@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-02-24', NULL, NULL, NULL, NULL, NULL),
(572, NULL, 'Abishai', '9666932450', 'Pottisriramula nagar 3 rd line', NULL, NULL, 'abishaikattupalli1310@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-02-24', NULL, NULL, NULL, NULL, NULL),
(573, NULL, 'chandra', '9966590919', 'rahul gandhi nagar ', NULL, NULL, 'chandrasekhar.tangirala314@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-02', NULL, NULL, NULL, NULL, NULL),
(574, NULL, 'Ramana', '08885368989', 'Flat:101, Block-B, Shiva green Valley, Near Venkateswara sway temple, gorantla', NULL, NULL, 'ramana6666@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-02', NULL, NULL, NULL, NULL, NULL),
(575, NULL, 'Kasu sankarreddy ', '9966221836', 'Nallapadu ', NULL, NULL, 'sankarreddykasu@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-02', NULL, NULL, NULL, NULL, NULL),
(576, NULL, 'Pavani', '9398393200', 'Near brindhavan apartment Gv thota 1st lane', NULL, NULL, 'satyapavani04@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-02', NULL, NULL, NULL, NULL, NULL),
(577, NULL, 'Pavani', '9398393200', 'Guntur vari thota 1st lane', NULL, NULL, 'satyapavani04@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-02', NULL, NULL, NULL, NULL, NULL),
(578, NULL, 'Dawar khan', '8975689755', 'Government appartment flatno. 7', NULL, NULL, 'dawarkhan112233@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-03', NULL, NULL, NULL, NULL, NULL),
(579, NULL, 'Satheesh Kumar Panchumarthi', '09966543408', '3-31, Lemallepadu, Vatticherukuru mandal', NULL, NULL, 'satishp23@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-05', NULL, NULL, NULL, NULL, NULL),
(580, NULL, 'Anil Kumar', '09885166070', 'DIDUGU, AMRAVATHI', NULL, NULL, 'anilkumarmamidi4@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-11', NULL, NULL, NULL, NULL, NULL),
(581, NULL, 'QPiGjfKCuAgRmTs', '5508897245', 'iKCgLFtPQaVI', NULL, NULL, 'piercebuddy59@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-14', NULL, NULL, NULL, NULL, NULL),
(582, NULL, 'BMwPCNVlEr', '9105375967', 'bqBFtkxiGcUYQon', NULL, NULL, 'piercebuddy59@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-14', NULL, NULL, NULL, NULL, NULL),
(583, NULL, 'Anil Kumar Dabburi', '9121215888', '5-143/A, Turakapalem, Pedapalakaluru, Guntur-522005', NULL, NULL, 'anildabburi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-14', NULL, NULL, NULL, NULL, NULL),
(584, NULL, 'Nagendra', '9700355461', 'Percherla', NULL, NULL, 'nagendra549@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-14', NULL, NULL, NULL, NULL, NULL),
(585, NULL, 'Naveen', '8125471346', '12-17 ANGALAKUDURU POST TENALI MANDAL GUNTUR DISTRICT PIN:522211', NULL, NULL, 'npreetham1@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-14', NULL, NULL, NULL, NULL, NULL),
(586, NULL, 'Sunilkumar P', '9848809144', 'KRR Hights Platno 206 Lawyerpet Exe ongole Prakasam ', NULL, NULL, 'chintasuresh462@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2021-03-17', NULL, NULL, NULL, NULL, NULL),
(587, NULL, 'Samba Siva Rao', '9959941280', 'Sreenivasa Grand Apartment Complex, Near Nallabadu Railway station, Andhra Pradesh', NULL, NULL, 'sudapavankalyan5@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-18', NULL, NULL, NULL, NULL, NULL),
(588, NULL, 'bandaru satyanarayana', '9618888395', 'Vaddeswaram', NULL, NULL, 'bsnvzm@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-19', NULL, NULL, NULL, NULL, NULL),
(589, NULL, 'Sudapavankalyan', '8555839411', 'Sreenivasa Grand Apartment ,Nallabadu Railway station, Andhra Pradesh', NULL, NULL, 'Sudapavankalyan5@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-22', NULL, NULL, NULL, NULL, NULL),
(590, NULL, 'p sairam', '8142041888', 'sarada colony', NULL, NULL, 'sairam.psr88@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-25', NULL, NULL, NULL, NULL, NULL),
(591, NULL, 'lMdkaGuxWQpe', '9850390348', 'XRPSfDpvwQN', NULL, NULL, 'ethanhudson8071@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-26', NULL, NULL, NULL, NULL, NULL),
(592, NULL, 'kheWqSDmzBMpas', '9956473014', 'YiInWJgDs', NULL, NULL, 'ethanhudson8071@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-26', NULL, NULL, NULL, NULL, NULL),
(593, NULL, 'Eswar', '9081403381', '', NULL, NULL, 'ajayb7210@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-27', NULL, NULL, NULL, NULL, NULL),
(594, NULL, 'Ramakrishna ', '9397889758', '4-5-8/12b,navabharath nagar ,guntur,522007', NULL, NULL, 'manjusajja299@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-03-29', NULL, NULL, NULL, NULL, NULL),
(595, NULL, 'girish', '9703044614', 'krishna babu colony ', NULL, NULL, 'sontigirishbabu@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-03-29', NULL, NULL, NULL, NULL, NULL),
(596, NULL, 'Krishna', '09677092902', 'Flat 202, Hamsini Enclave, Opposite Lifeline Hospital, Inner Ring Road, Guntur', NULL, NULL, 'murali.06265@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-01', NULL, NULL, NULL, NULL, NULL),
(597, NULL, 'sayedzaheer', '7674819081', '32-34-19 SRR COLLEGE OPP LINE MASJID ROAD', NULL, NULL, 'sdzaheer56@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-02', NULL, NULL, NULL, NULL, NULL),
(598, NULL, 'M.Nagaraju', '08008438122', 'At. agraharam 1st, line Guntur AP', NULL, NULL, 'maddiralanagaraju244@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-04', NULL, NULL, NULL, NULL, NULL),
(599, NULL, 'Satyanarayana', '7382892476', 'Mahatma Gandhi inner ring road, Reddy palem ', NULL, NULL, 'devineni.narayana18@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-04', NULL, NULL, NULL, NULL, NULL),
(600, NULL, 'Satyanarayana', '7382892476', 'Mahatma Gandhi inner ring road, Reddy palem ', NULL, NULL, 'devineni.narayana18@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-05', NULL, NULL, NULL, NULL, NULL),
(601, NULL, 'Venkat', '9066610607', 'Pattabhipuram, near railway quarters', NULL, NULL, 'venkatadk4677@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-05', NULL, NULL, NULL, NULL, NULL),
(602, NULL, 'sofia', '7396065956', '8-20-34/11,sitaram nagar 3rd lane, back of padmaja petrol bunk,Guntur', NULL, NULL, 'sofiabulla14@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-07', NULL, NULL, NULL, NULL, NULL),
(603, NULL, 'Sk razak', '9885432746', 'Cobald pet 5 th line', NULL, NULL, 'razzakshaik3@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-11', NULL, NULL, NULL, NULL, NULL),
(604, NULL, 'srinivasa reddy', '9603275275', '', NULL, NULL, 'sri.enimireddy@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-11', NULL, NULL, NULL, NULL, NULL),
(605, NULL, 'ARIEF shaik', '9014264004', '83-4-557 7th line krishna babu colony lalpuram road guntur', NULL, NULL, 'ariefsk36@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-11', NULL, NULL, NULL, NULL, NULL),
(606, NULL, 'Venkatasudhakar', '6281757350', 'Nehru Nagar 4th Line, ', NULL, NULL, 'vsnujella@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-15', NULL, NULL, NULL, NULL, NULL),
(607, NULL, 'Sandeep', '09866643464', 'Nagaralu himaninagar 4th lone', NULL, NULL, 'majetisandeep@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-17', NULL, NULL, NULL, NULL, NULL),
(608, NULL, 'Balu', '8465858585', 'Etukru road apparment', NULL, NULL, 'Smcoexports@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-17', NULL, NULL, NULL, NULL, NULL),
(609, NULL, 'RZlKTJXxjtOQDrgv', '6351221037', 'ZrDekQxhYl', NULL, NULL, 'yoceptirun@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-17', NULL, NULL, NULL, NULL, NULL),
(610, NULL, 'YzoKAJsdZCxDtOHF', '8684670869', 'XiEWOUeHnVcf', NULL, NULL, 'yoceptirun@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-17', NULL, NULL, NULL, NULL, NULL),
(611, NULL, 'Bhanu Prakash Pedapudi', '8328145962', 'Pesarlanka, Bhattiprolu Guntur', NULL, NULL, 'bhanupedapudi2504@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-19', NULL, NULL, NULL, NULL, NULL),
(612, NULL, 'Mannava Aswanth', '9966889101', 'Pulladigunta vatticherukuru Mandal,Guntur Dist', NULL, NULL, 'aswanthchowdary1247@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-04-20', NULL, NULL, NULL, NULL, NULL),
(613, NULL, 'Koteswararao B', '09966079080', 'Ambedkar Statue Opp, Gorantla Post, Guntur', NULL, NULL, 'koteswararaomba.99@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2021-04-23', NULL, NULL, NULL, NULL, NULL),
(614, NULL, 'SATHEESH KUMAR PANCHUMARTHI', '09966543408', '3-31, Lemallepadu, Vatticherukuru mandal - 522212', NULL, NULL, 'satishp23@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-24', NULL, NULL, NULL, NULL, NULL),
(615, NULL, 'hemanth ', '8985034455', 'Gujjanagundla', NULL, NULL, 'hemanth.31200@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-25', NULL, NULL, NULL, NULL, NULL),
(616, NULL, 'Piazrehman', '8142423046', 'Garapdu', NULL, NULL, 'piazrehmanshaik23@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-26', NULL, NULL, NULL, NULL, NULL),
(617, NULL, 'M Ramakrishna', '9908548787', 'Flat 201, sanjanas brundavanam,Saibaba Road,', NULL, NULL, 'mandru.harish@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-28', NULL, NULL, NULL, NULL, NULL),
(618, NULL, 'B RAMU', '9441660683', '4-8-216  arundhathi nagar near govt.school saketpuram koritepadu  ', NULL, NULL, 'Bulla.Ramu@sbicapsec.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-04-30', NULL, NULL, NULL, NULL, NULL),
(619, NULL, 'PcCNmEIQJVwDO', '5859646585', 'cgCmXWLDEZjvBGlN', NULL, NULL, 'wiciantsdn@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-01', NULL, NULL, NULL, NULL, NULL),
(620, NULL, 'fNcqdZgS', '4038465068', 'UHPMAklSqh', NULL, NULL, 'wiciantsdn@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-01', NULL, NULL, NULL, NULL, NULL),
(621, NULL, 'Gopalakrishna Govada', '08639463576', 'H.NO:11-81,KISHNKINDAPLAEM, KOLLURU MDL', NULL, NULL, 'krishnagovada5@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-02', NULL, NULL, NULL, NULL, NULL),
(622, NULL, 'Sai', '7981020769', 'Vengalaya palem', NULL, NULL, 'saipawan1308@gamil.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-03', NULL, NULL, NULL, NULL, NULL),
(623, NULL, 'Anusha', '8331822393', '403, Srinidhi Enclave, Gorantla, Behind ID Hospital', NULL, NULL, 'anushaelohim@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-04', NULL, NULL, NULL, NULL, NULL),
(624, NULL, 'Allavuddin shaik', '7680915242', ' Gujjanagundla Ratnagiri nagar ', NULL, NULL, 'aahan9000@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-05', NULL, NULL, NULL, NULL, NULL),
(625, NULL, 'Mounika', '8523052982', 'Pedakakani, sivalayamroad, 522509', NULL, NULL, 'mounikarayapati69@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-05', NULL, NULL, NULL, NULL, NULL),
(626, NULL, 'Gopichand', '6309036239', 'Cherlagudipadu', NULL, NULL, 'gopic0459@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-05', NULL, NULL, NULL, NULL, NULL),
(627, NULL, 'Prasad', '9989167149', 'Pachaltadiparru', NULL, NULL, 'prasadbabunitw@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-07', NULL, NULL, NULL, NULL, NULL),
(628, NULL, 'Pothireddy Mahendra Reddy', '9655996333', 'Pedakakani', NULL, NULL, 'mahendrarpothireddy@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-07', NULL, NULL, NULL, NULL, NULL),
(629, NULL, 'Rishi pamar', '9346856266', 'R&R center Machayapallem', NULL, NULL, 'rishi.pamar2004@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-09', NULL, NULL, NULL, NULL, NULL),
(630, NULL, 'K Mallikarjuna Rao', '09000838618', '1st line, ipd colony, Sangadigunta', NULL, NULL, 'malli.siva2000@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-09', NULL, NULL, NULL, NULL, NULL),
(631, NULL, 'Suresh kumar', '9182757233', 'LALAPET ', NULL, NULL, 'sureshkumarvoosa9999@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-09', NULL, NULL, NULL, NULL, NULL),
(632, NULL, 'Raj Seshu Gopal', '6302734519', '15-8-184/B, Zakir Hussain Nagar 4th Line, Old Guntur', NULL, NULL, 'sunnysammub@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-09', NULL, NULL, NULL, NULL, NULL),
(633, NULL, 'naveen', '9000077733', 'perecharla.,opp,viswabarathi college', NULL, NULL, 'naveedhanaa9192@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-11', NULL, NULL, NULL, NULL, NULL),
(634, NULL, 'Adiseshubabu Kaliyapudi', '8688787599', 'Old Guntur', NULL, NULL, 'adiseshu.babu99@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-11', NULL, NULL, NULL, NULL, NULL),
(635, NULL, 'Manoj Kumar ', '8015973413', '32/81 vasantharayapuram main road, guntur', NULL, NULL, 'elurimanoj26@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-11', NULL, NULL, NULL, NULL, NULL),
(636, NULL, 'Sivabhaskar Dumpa', '9398782803', '70-11-1403 4th line ipd colony, Ipd colony 4th line sangadigunta', NULL, NULL, 'sivabhaskardumpa55@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-12', NULL, NULL, NULL, NULL, NULL),
(637, NULL, 'Nagaraju', '9046781046', 'perecherla', NULL, NULL, 'nnraju211@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-13', NULL, NULL, NULL, NULL, NULL),
(638, NULL, 'Bandlamudi Indra Syam', '8095673464', 'Ludhargiri Bus Stand, Near Pedakakani Railway Station, Pedakakani,Guntur', NULL, NULL, 'indrasyam9@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-15', NULL, NULL, NULL, NULL, NULL),
(639, NULL, 'Vishal ', '7729075969', 'Vejendla', NULL, NULL, 'vishalfrooty@gmail.con', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-16', NULL, NULL, NULL, NULL, NULL),
(640, NULL, 'Vishal ', '7729075969', 'Vejendla', NULL, NULL, 'vishalfrooty@gmail.con', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-16', NULL, NULL, NULL, NULL, NULL),
(641, NULL, 'Makke Navya', '09133858493', 'Sangadigunta, beside line of sri vision public school, 69-1-34, Reddy street', NULL, NULL, 'makke.ravi35@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-18', NULL, NULL, NULL, NULL, NULL),
(642, NULL, 'Sireesha', '9347193365', 'Golusukondala Rao Nagar Old guntur Near Suddapallidonka, guntur', NULL, NULL, 'siriparimi92@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-18', NULL, NULL, NULL, NULL, NULL),
(643, NULL, 'Kaushik D', '09113635577', 'D No16-18-29, Boorlea Vari Street, Old Guntur', NULL, NULL, 'kaushik2d@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-19', NULL, NULL, NULL, NULL, NULL),
(644, NULL, 'Pallemannepareddy', '9390118352', '3rd line,near masjid center,kedreswarpeta,vijayawada ', NULL, NULL, 'pallemannepareddy@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-19', NULL, NULL, NULL, NULL, NULL),
(645, NULL, 'Parveen S S', '08879533055', '133-13-3722 , Saraswati Nagar, 11th line', NULL, NULL, 'mehermaggi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-22', NULL, NULL, NULL, NULL, NULL),
(646, NULL, 'SRINIVASARAO', '9705569399', 'Shivalingeswara nagar,yanamalakuduru', NULL, NULL, 'nagarjunachagantipati3@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-22', NULL, NULL, NULL, NULL, NULL),
(647, NULL, 'Prudhvi maripudi', '7661006797', '4th lane himani nagar, Naveena play ground', NULL, NULL, 'prudhviraj.maripudi@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-24', NULL, NULL, NULL, NULL, NULL),
(648, NULL, 'Saiveda', '9052848889', '', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-25', NULL, NULL, NULL, NULL, NULL),
(649, NULL, 'karthik', '08341228175', '59-4-720, thamma ranga reddy nagar 3rd line, old guntur, Guntur.', NULL, NULL, 'bullakarthik@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-05-27', NULL, NULL, NULL, NULL, NULL),
(650, NULL, 'Sreekanth', '9491042133', 'Maruthinagar main road pattabhipuram  riad', NULL, NULL, 'sreek0831@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-05-27', NULL, NULL, NULL, NULL, NULL),
(651, NULL, 'M NIRANJAN', '8985055078', 'SNl', NULL, NULL, 'niranjancs.jnv@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-05', NULL, NULL, NULL, NULL, NULL),
(652, NULL, 'M NIRANJAN', '8985055078', 'SNL NEST OPPOSITE INNER SQUARE HOTEL ROAD Inner Ring Road', NULL, NULL, 'niranjancs.jnv@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-06-05', NULL, NULL, NULL, NULL, NULL),
(653, NULL, 'prasad akki', '7093703374', '33-8-504/1, mallikarjuna peta 5th lane extn,', NULL, NULL, 'leelaprasad.akki@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-06-07', NULL, NULL, NULL, NULL, NULL),
(654, NULL, 'prasad akki', '7093903374', '33-8-504/1, mallikarjuna peta 5th lane extn,', NULL, NULL, 'leelaprasad.akki@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-06-07', NULL, NULL, NULL, NULL, NULL),
(655, NULL, 'mgupDWGK', '9352425166', 'mcQrHjoRyAKPht', NULL, NULL, 'pauldalton4718@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-07', NULL, NULL, NULL, NULL, NULL),
(656, NULL, 'maSLWovQkV', '6182678228', 'RHvTYdqODg', NULL, NULL, 'pauldalton4718@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-07', NULL, NULL, NULL, NULL, NULL),
(657, NULL, 'M.Venkat', '9652077997', 'Vasantarayapuram 2 line oop Vinayaka temple', NULL, NULL, 'venkatmallemkonda417496@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-06-07', NULL, NULL, NULL, NULL, NULL),
(658, NULL, 'Abu taleeb', '8374140596', '19-19-93/1', NULL, NULL, 'mourifwarshadalimohamed@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-06-08', NULL, NULL, NULL, NULL, NULL),
(659, NULL, 'LAASYA MALLEMPUDI', '8688261123', '7-11-207,KAKUMANUVARI THOTA,DONKA ROAD-4TH LANE, GUNTUR', NULL, NULL, 'laasyamallempudi7@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-08', NULL, NULL, NULL, NULL, NULL),
(660, NULL, 'TsPVpxwX', '8133474292', 'XlOdubfDTt', NULL, NULL, 'cookpierce002@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-13', NULL, NULL, NULL, NULL, NULL),
(661, NULL, 'M Siva krishna', '9701379210', 'r r castel apparentment, flat no.202, 1st line Sitaram nagar ,near maniouram bridge', NULL, NULL, 'mskrishna.m@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-14', NULL, NULL, NULL, NULL, NULL),
(662, NULL, 'sunil kumar somu', '8247783067', '3-132,Sbi Road', NULL, NULL, 'sunilkumarsomu45@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-15', NULL, NULL, NULL, NULL, NULL),
(663, NULL, 'Shaik Rehman ', '9550057269', '56-6-698, Maruthi nagar 2nd line, Old Guntur, Guntur 522001', NULL, NULL, 'muzibulrehman26@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-06-16', NULL, NULL, NULL, NULL, NULL),
(664, NULL, 'Paleru lakshmikanth', '9177370825', 'Maruti nagar 4th line, nandivelugu Road, Old Guntur , Guntur-522001', NULL, NULL, 'lakshmikanth528@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-19', NULL, NULL, NULL, NULL, NULL),
(665, NULL, 'GMyxzBOhoQtvLu', '4222128658', 'eLPadyoV', NULL, NULL, 'alinehendrix69@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-20', NULL, NULL, NULL, NULL, NULL),
(666, NULL, 'WwamrGyk', '8489095003', 'hsGNpyjUHCE', NULL, NULL, 'alinehendrix69@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-20', NULL, NULL, NULL, NULL, NULL),
(667, NULL, 'Narendra', '9701741894', 'Rtc colony', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-23', NULL, NULL, NULL, NULL, NULL),
(668, NULL, 'Ramesh Telukutla', '09618618697', '30, bhuvaneswari nagar,', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-06-25', NULL, NULL, NULL, NULL, NULL),
(669, NULL, 'rPEQDJzuLTSmY', '3263221233', 'OsANlKEDUZduvR', NULL, NULL, 'keckmargo@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-29', NULL, NULL, NULL, NULL, NULL),
(670, NULL, 'MVOSuNgl', '6664015638', 'fBXgtqVGs', NULL, NULL, 'keckmargo@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-29', NULL, NULL, NULL, NULL, NULL),
(671, NULL, 'Nabikhan ', '9494994242', 'Ipd colony ', NULL, NULL, 'pathannabikhan@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-06-30', NULL, NULL, NULL, NULL, NULL),
(672, NULL, 'jZJqYkxSc', '4849226210', 'GTQzEOMA', NULL, NULL, 'vera.chapaeva92@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-08', NULL, NULL, NULL, NULL, NULL),
(673, NULL, 'DiMJtRIScxWvP', '2488540113', 'brKVAqgXnLuyl', NULL, NULL, 'vera.chapaeva92@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-08', NULL, NULL, NULL, NULL, NULL),
(674, NULL, 'Siddik', '9381093868', 'Lalapet Guntur', NULL, NULL, 'sksiddikshaik@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-07-11', NULL, NULL, NULL, NULL, NULL),
(675, NULL, 'POORNANANDA MURALI MOHAN CHINTALAPATI', '7702202730', 'Door No. 24-3-35, Challavari Veedhi, R.Agraharam, Guntur', NULL, NULL, 'anandshfl@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-13', NULL, NULL, NULL, NULL, NULL),
(676, NULL, 'purnima', '7671834341', 'sampath nagar', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-07-15', NULL, NULL, NULL, NULL, NULL),
(677, NULL, 'B. SAMBA SIVA RAO', '9866710106', 'Lalapata besta vari street guntur 522003', NULL, NULL, 'samba1433@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-16', NULL, NULL, NULL, NULL, NULL),
(678, NULL, 'Jani', '9866346990', 'Chandra Babu Naidu Colony Main Road Ponnur Road', NULL, NULL, 'info.sice.in@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-19', NULL, NULL, NULL, NULL, NULL),
(679, NULL, 'V.PRASAD REDDY', '09494230441', 'VASANTHAPETA ,PRODDATUR', NULL, NULL, 'SREELAKSHMILINKS@GMAIL.COM', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-22', NULL, NULL, NULL, NULL, NULL),
(680, NULL, 'Shaik', '9866346990', 'Chandra Babu Naidu Colony Main Road Ponnur Road', NULL, NULL, 'info.sice.in@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-24', NULL, NULL, NULL, NULL, NULL),
(681, NULL, 'Teja', '09640293959', ' Ukkunagaram', NULL, NULL, 'ravitejapetta@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2021-07-24', NULL, NULL, NULL, NULL, NULL),
(682, NULL, 'Kuncha surendra prasad', '9700063649', 'Flat No:-412, Yaganti grand, vasantaraya puram, guntur. ', NULL, NULL, 'kunchasurendra007@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-25', NULL, NULL, NULL, NULL, NULL),
(683, NULL, 'Mohammad Sameeruddin', '08801180120', '7-57 vvit college road near janda chitu ,namburu', NULL, NULL, 'md.sameer1302@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-07-26', NULL, NULL, NULL, NULL, NULL),
(684, NULL, 'naseer ', '8919710537', 'vvit college road namburu', NULL, NULL, 'nas9848@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-07-26', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `add_lead` (`id`, `branch`, `customer_name`, `mobile`, `address_1`, `address_2`, `landmark`, `email`, `priority`, `lead_source`, `lead_type`, `conn_type`, `notes`, `status`, `date`, `from_date`, `from_time`, `to_time`, `to_date`, `last_update`) VALUES
(685, NULL, 'Chakravarthi', '7989236231', 'Near teja bar and restaurant , naaz center', NULL, NULL, 'chakribala1977@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-09', NULL, NULL, NULL, NULL, NULL),
(686, NULL, 'samba siva Rao', '09963927741', '403 MM TEMPLE BELLS', NULL, NULL, 'psrao456@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-10', NULL, NULL, NULL, NULL, NULL),
(687, NULL, 'samba siva', '09963927741', '403 MM TEMPLE BELLS', NULL, NULL, 'psrao456@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-10', NULL, NULL, NULL, NULL, NULL),
(688, NULL, 'Niraj Mittal', '09845030080', '109 B Mittal Tower, M.G. Road', NULL, NULL, 'nirajmittalblr@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-11', NULL, NULL, NULL, NULL, NULL),
(689, NULL, 'Sai Sashankh Donkena', '08861066141', '16-18-29, boorelavari street, old guntur, guntur.', NULL, NULL, 'donkena.sai@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-12', NULL, NULL, NULL, NULL, NULL),
(690, NULL, 'Damarla balaji', '9440304994', '12-22-182/A, seelamvari street, kothapeta, Guntur.', NULL, NULL, 'damarlabalaji2012@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-17', NULL, NULL, NULL, NULL, NULL),
(691, NULL, 'Prasad Reddy S', '9032250584', '', NULL, NULL, 's.prasadreddy1118@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-17', NULL, NULL, NULL, NULL, NULL),
(692, NULL, 'Shaik', '9676302218', 'Sangadigunta', NULL, NULL, 'shaikmarzia@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-18', NULL, NULL, NULL, NULL, NULL),
(693, NULL, 'Zubear', '8886565104', '15-10-85, 4th Line Vinobhanagar Old Guntur.', NULL, NULL, 'zubearshaik.5@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-19', NULL, NULL, NULL, NULL, NULL),
(694, NULL, 'Chinna Raja', '7680898018', '2/4 line Vasantha raya puram', NULL, NULL, 'chinnaraja.mechanical@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-19', NULL, NULL, NULL, NULL, NULL),
(695, NULL, 'Guntamukkala Brahmateja', '06302073377', '115-62, SRINIVASA COLONY,NALLAPADU, GUNTUR. ', NULL, NULL, 'brahmateja464@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-19', NULL, NULL, NULL, NULL, NULL),
(696, NULL, 'Gopi', '7981477118', 'D no 25-17-138 12/5 Srinivasa Rao peta Guntur', NULL, NULL, 'sai.gopi37@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-19', NULL, NULL, NULL, NULL, NULL),
(697, NULL, 'Sadiq', '8686418671', 'Old guntur', NULL, NULL, 'iamsyedsadiq@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-20', NULL, NULL, NULL, NULL, NULL),
(698, NULL, 'Paul yanggicho ', '79935 06740 ', '7-268 mangalagiri  nutakki beside rcm church 522303', NULL, NULL, 'nutakkipaulpaulyanggicho411@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-20', NULL, NULL, NULL, NULL, NULL),
(699, NULL, 'Srikanth Kareedu', '7993412085', '1-242, near Anjaneya swamy temple, Dokiparru -522438', NULL, NULL, 'srikanth.kareedu123@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-20', NULL, NULL, NULL, NULL, NULL),
(700, NULL, 'Ripon', '1930205010', '127/distalary road gandaria dhaka Bangladesh', NULL, NULL, 'mdripon654@gmail.com', NULL, 'Website Lead', NULL, 'Cable', NULL, 'new', '2021-08-21', NULL, NULL, NULL, NULL, NULL),
(701, NULL, 'Ripon', '1930205010', '127/distalary road gandaria dhaka Bangladesh', NULL, NULL, 'mdripon654@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-21', NULL, NULL, NULL, NULL, NULL),
(702, NULL, 'KfxQkvdJWe', '2700821456', 'NWlTSkuU', NULL, NULL, 'ronaldchambers3003@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-23', NULL, NULL, NULL, NULL, NULL),
(703, NULL, 'pQLiOzvCgU', '2324269363', 'FtGzykNiK', NULL, NULL, 'ronaldchambers3003@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-23', NULL, NULL, NULL, NULL, NULL),
(704, NULL, 'Ram Charan Tej', '09642458805', 'Door no: 25-27-24, Ram Charan villa, 1/5 lakshmi nagar, Near Mirchi yard', NULL, NULL, 'jramcharantej@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-26', NULL, NULL, NULL, NULL, NULL),
(705, NULL, 'poojitha', '8297475864', 'Rajahmundry', NULL, NULL, 'poojitha.peka@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-27', NULL, NULL, NULL, NULL, NULL),
(706, NULL, 'YALAMANDALA ADAM', '7995405888', 'S v n colony netagenagar', NULL, NULL, 'yalamandalaadam786@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-08-28', NULL, NULL, NULL, NULL, NULL),
(707, NULL, 'FubKhtyW', '6314152381', 'uifpNUWxIC', NULL, NULL, 'suzannaboone989@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-29', NULL, NULL, NULL, NULL, NULL),
(708, NULL, 'rKuiPhHWsTO', '5521785434', 'msGgqxYNzMdDrco', NULL, NULL, 'suzannaboone989@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-08-29', NULL, NULL, NULL, NULL, NULL),
(709, NULL, 'Farooq', '9505635786', 'At agraharam ramireddynagar 5/2lane last', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-01', NULL, NULL, NULL, NULL, NULL),
(710, NULL, 'punnarao', '9347777888', 'svncolony guntur', NULL, NULL, 'k.b.punnaraochowdhary@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-01', NULL, NULL, NULL, NULL, NULL),
(711, NULL, 'Khasim', '9700439322', 'Seema devi colony 2nd lane vasantha rayatam guntur-2', NULL, NULL, 'sk.khasimvli@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-01', NULL, NULL, NULL, NULL, NULL),
(712, NULL, 'Venkatesh Nallapaneni ', '9441334759', 'Pedakurapadu,guntur,andhrapradesh', NULL, NULL, 'nallapanenivenkatesh1999@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-09-03', NULL, NULL, NULL, NULL, NULL),
(713, NULL, 'J SRINIVASA REDDY ', '09493243503', 'ABBARAJUPALEM', NULL, NULL, 'jsreddyjrgr@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-09-04', NULL, NULL, NULL, NULL, NULL),
(714, NULL, 'Kumar', '6303313664', 'Patarailway kata palakaluru road', NULL, NULL, 'iloveyouragetthikageetika@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-09-05', NULL, NULL, NULL, NULL, NULL),
(715, NULL, 'Kumar', '6303313664', 'Patarailway kata palakaluru road', NULL, NULL, 'iloveyouragetthikageetika@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-09-05', NULL, NULL, NULL, NULL, NULL),
(716, NULL, 'Anand', '9666633578', 'Inner ring road opp var gardens', NULL, NULL, 'psajn504@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-09-05', NULL, NULL, NULL, NULL, NULL),
(717, NULL, 'Yeddu Dinesh babu ', '8861043355', '8-8/1, Narakoduru, chebrolu, Guntur ', NULL, NULL, 'ydineshy225@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-09-05', NULL, NULL, NULL, NULL, NULL),
(718, NULL, 'Raghavendra', '8801234014', 'Balaji Nagar 8th line old Guntur Guntur', NULL, NULL, 'raghavendrarao0207@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-08', NULL, NULL, NULL, NULL, NULL),
(719, NULL, 'Sreekanth Mallela', '09000988095', 'Guntur, Andhra Pradesh, India', NULL, NULL, 'crazysri421@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-09-08', NULL, NULL, NULL, NULL, NULL),
(720, NULL, 'Anand kumar', '9492871558', 'Flat No 1H, Ananda Nilayam Apartments,  IPD colony main Road,', NULL, NULL, 'anandkumarperla1028@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-11', NULL, NULL, NULL, NULL, NULL),
(721, NULL, 'Saiteja', '09966383463', 'Bramhamgari Temple Street, Venugopal nagar, 60 feet road, Srinivasraopet', NULL, NULL, 'prudhvisaiteja41@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-13', NULL, NULL, NULL, NULL, NULL),
(722, NULL, 'Manvith sai', '9063458889', '281, Block m, unnamed road, from sub centre pin', NULL, NULL, 'manvithsai9689@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-16', NULL, NULL, NULL, NULL, NULL),
(723, NULL, 'Sk Khwazavali', '8919590910', 'Cobaltpet, Guntur', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-17', NULL, NULL, NULL, NULL, NULL),
(724, NULL, 'jmvwXxrszKZe', '3535345702', 'tXqkPoNLvuBQdD', NULL, NULL, 'janicedl81o17@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-28', NULL, NULL, NULL, NULL, NULL),
(725, NULL, 'KOtoNeIT', '2703348327', 'UyasgMWfOhSB', NULL, NULL, 'janicedl81o17@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-09-28', NULL, NULL, NULL, NULL, NULL),
(726, NULL, 'Ayush Sharma', '8340370082', 'Nallapadu road , sitaram township, Sitara galaxy appartment', NULL, NULL, 'minuajit87@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-10-03', NULL, NULL, NULL, NULL, NULL),
(727, NULL, 'PxzJyntSCgiIHd', '8198600351', 'BXmZElKrNRafU', NULL, NULL, 'elissarn9yf29@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-05', NULL, NULL, NULL, NULL, NULL),
(728, NULL, 'YKlUwAoJgMV', '7028131679', 'OiRwXNoxDaB', NULL, NULL, 'elissarn9yf29@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-05', NULL, NULL, NULL, NULL, NULL),
(729, NULL, 'Manasa', '8985548121', 'Pedakakani', NULL, NULL, '', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-06', NULL, NULL, NULL, NULL, NULL),
(730, NULL, 'Praveen', '7732037593 ', 'Svsp spinning mill unit - 1, near bharat petrol bunk, Chebrolu, Guntur, Andhra Pradesh - 522212', NULL, NULL, 'praveenpappala085@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-10-07', NULL, NULL, NULL, NULL, NULL),
(731, NULL, 'yiXmdNeZCv', '9683942957', 'mPFfBXknieucTDV', NULL, NULL, 'madelainexeyik55@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-12', NULL, NULL, NULL, NULL, NULL),
(732, NULL, 'rDSzFmPXeHKdu', '6832409934', 'cjTJUBNXysQtWIv', NULL, NULL, 'madelainexeyik55@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-12', NULL, NULL, NULL, NULL, NULL),
(733, NULL, 'gYoWXfuxRHs', '6983602094', 'pPHkzwMarCGUfO', NULL, NULL, 'kikelianj7yw75@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-20', NULL, NULL, NULL, NULL, NULL),
(734, NULL, 'yLSsRNEDIkqfYM', '6549666381', 'nmgcEzkhUdX', NULL, NULL, 'kikelianj7yw75@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-20', NULL, NULL, NULL, NULL, NULL),
(735, NULL, 'Narendra Nath', '7330843328', 'Gardens', NULL, NULL, 'koppallinarendranath22@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-20', NULL, NULL, NULL, NULL, NULL),
(736, NULL, 'Adithya', '9381244379', 'D:No 39-13-1349, Nehru Nagar, Guntur', NULL, NULL, 'koakumar2013@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-10-21', NULL, NULL, NULL, NULL, NULL),
(737, NULL, 'wWeHQxCmfrP', '9018106681', 'pLUTNwKlgBszvPeO', NULL, NULL, 'greerthomasine1@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-10-29', NULL, NULL, NULL, NULL, NULL),
(738, NULL, 'K Krupa Rao', '6302533395', 'Flat no: 103, Saivilla apartment,5/3 Mallikarjuna peta, Guntur', NULL, NULL, 'kkrao189@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-11-05', NULL, NULL, NULL, NULL, NULL),
(739, NULL, 'Katta sateesh babu', '9182858728', '8-170 pulladigunta, vatticheruku(m), guntur(d),522017,near raithu nestam foundation', NULL, NULL, 'satti0246@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-11-08', NULL, NULL, NULL, NULL, NULL),
(740, NULL, 'Dondapati SivaReddy', '9494499021', '69-16-1183, 9/2 line, IPD Colony, Sangadigunta, Guntur', NULL, NULL, 'rsiva3660@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-11-11', NULL, NULL, NULL, NULL, NULL),
(741, NULL, 'SRINIVASAREDDY', '8639703410', '19-12-129, L R COLONY 6th LANE', NULL, NULL, 'srinivasa446@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-11-11', NULL, NULL, NULL, NULL, NULL),
(742, NULL, 'Chenchamma ', '9948491343', 'Medavaripalem, Prathipadu, Guntur 522015', NULL, NULL, 'bhimi1d@gmail.com', NULL, 'Website Lead', NULL, 'Broadband', NULL, 'new', '2021-11-14', NULL, NULL, NULL, NULL, NULL),
(743, NULL, 'PyUGjZmNiTkaIL', '5490413886', 'EhJWaecX', NULL, NULL, 'mervynd85@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-11-24', NULL, NULL, NULL, NULL, NULL),
(744, NULL, 'ZWQgdobiKN', '2398195557', 'zaLOTGKWBUZP', NULL, NULL, 'williamrobinson59481@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-12-06', NULL, NULL, NULL, NULL, NULL),
(745, NULL, 'CsjeymMaRPr', '6933051242', 'DXTbIBisQxG', NULL, NULL, 'williamrobinson59481@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-12-06', NULL, NULL, NULL, NULL, NULL),
(746, NULL, 'fuBnArtaEGmWOz', '7749638231', 'nzYgRGwXWM', NULL, NULL, 'morrismichaelmorris384@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-12-15', NULL, NULL, NULL, NULL, NULL),
(747, NULL, 'svYNtzIQD', '8375300272', 'fDYwzlyCVOHqm', NULL, NULL, 'morrismichaelmorris384@gmail.com', NULL, 'Website Lead', NULL, 'Combo', NULL, 'new', '2021-12-15', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_payments`
--

CREATE TABLE `branch_payments` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_name` varchar(120) DEFAULT NULL,
  `trans_id` varchar(100) DEFAULT NULL,
  `manual_transid` bigint(20) DEFAULT NULL,
  `pay_mode` varchar(100) DEFAULT NULL,
  `pay_type` varchar(100) DEFAULT NULL,
  `trans_date` datetime DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_payments`
--

CREATE TABLE `customer_payments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `distributor` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `franch` int(11) DEFAULT NULL,
  `paytype` varchar(100) DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `connection_type` varchar(200) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `installation_address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payments`
--

INSERT INTO `customer_payments` (`id`, `customer_id`, `city`, `distributor`, `branch`, `franch`, `paytype`, `payment_mode`, `amount`, `connection_type`, `payment_status`, `paid_date`, `installation_address`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 9, 21, 'new', 'Cash', 506, 'broadband', NULL, NULL, 'dd', '2023-02-11 15:24:09', '2023-02-11 15:24:09'),
(2, 1, 1, 5, 9, 21, 'new', NULL, 0, 'cable', NULL, NULL, 'dd', '2023-09-09 14:25:03', '2023-09-09 14:25:03'),
(3, 2, 1, 5, 9, 21, 'new', NULL, 0, 'cable', NULL, NULL, 'dd', '2023-09-09 15:03:57', '2023-09-09 15:03:57'),
(4, 3, 1, 6, 11, 29, 'new', NULL, 514, NULL, NULL, NULL, '8th Lane, Lakshmi Nagar, Gorantla', '2023-11-12 18:59:04', '2023-11-12 18:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `original_filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `certification_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franch_payments`
--

CREATE TABLE `franch_payments` (
  `id` int(11) NOT NULL,
  `franch_id` int(11) DEFAULT NULL,
  `franch_name` varchar(129) DEFAULT NULL,
  `trans_id` varchar(150) DEFAULT NULL,
  `pay_mode` varchar(100) DEFAULT NULL,
  `pay_type` varchar(100) DEFAULT NULL,
  `trans_date` datetime DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipaddress`
--

CREATE TABLE `ipaddress` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `IpName` varchar(66) DEFAULT NULL,
  `Ip_number` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ippool`
--

CREATE TABLE `ippool` (
  `id` int(11) NOT NULL,
  `city` int(11) DEFAULT NULL,
  `distributor` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `pool_name` varchar(190) DEFAULT NULL,
  `ip_from` varchar(120) DEFAULT NULL,
  `ip_to` varchar(120) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ippool`
--

INSERT INTO `ippool` (`id`, `city`, `distributor`, `branch`, `franchise`, `pool_name`, `ip_from`, `ip_to`, `description`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 4, 8, 18, 'Lakshmi Nagar Series', '172.18.32.2', '172.18.32.254', 'Gorantla Lakshmi Nagar Area', 'y', '2023-01-21 21:12:46', '2023-01-21 21:12:46'),
(9, 1, 4, 8, 19, 'Next Gen School Series', '172.18.33.2', '172.18.33.254', 'Gorantla Next Gen School Area', 'y', '2023-01-21 21:14:20', '2023-01-21 21:14:20'),
(10, 1, 4, 8, 20, 'Vijaya Durga Nagar Area', '172.18.34.2', '172.18.34.254', 'Gorantla Vijaya Durga Nagar Area', 'y', '2023-01-21 21:15:13', '2023-01-21 21:15:13'),
(11, 1, 4, 8, 28, 'Boddurai Center Series', '172.18.35.2', '172.18.35.254', 'Gortantla Village Boddurai Center', 'y', '2023-01-21 21:32:14', '2023-01-21 21:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_24_190659_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2),
(1, 'App\\User', 204),
(2, 'App\\User', 309),
(2, 'App\\User', 332),
(2, 'App\\User', 345),
(2, 'App\\User', 346),
(3, 'App\\User', 333),
(3, 'App\\User', 344),
(3, 'App\\User', 347),
(4, 'App\\User', 211),
(4, 'App\\User', 227),
(4, 'App\\User', 230),
(4, 'App\\User', 231),
(4, 'App\\User', 232),
(4, 'App\\User', 234),
(4, 'App\\User', 235),
(4, 'App\\User', 236),
(4, 'App\\User', 237),
(4, 'App\\User', 238),
(4, 'App\\User', 239),
(4, 'App\\User', 240),
(4, 'App\\User', 241),
(4, 'App\\User', 245),
(4, 'App\\User', 246),
(4, 'App\\User', 247),
(4, 'App\\User', 248),
(4, 'App\\User', 249),
(4, 'App\\User', 250),
(4, 'App\\User', 251),
(4, 'App\\User', 252),
(4, 'App\\User', 253),
(4, 'App\\User', 254),
(4, 'App\\User', 255),
(4, 'App\\User', 256),
(4, 'App\\User', 257),
(4, 'App\\User', 258),
(4, 'App\\User', 259),
(4, 'App\\User', 260),
(4, 'App\\User', 261),
(4, 'App\\User', 262),
(4, 'App\\User', 264),
(4, 'App\\User', 265),
(4, 'App\\User', 278),
(4, 'App\\User', 279),
(4, 'App\\User', 280),
(4, 'App\\User', 281),
(4, 'App\\User', 282),
(4, 'App\\User', 283),
(4, 'App\\User', 284),
(4, 'App\\User', 285),
(4, 'App\\User', 292),
(4, 'App\\User', 293),
(4, 'App\\User', 294),
(4, 'App\\User', 295),
(4, 'App\\User', 296),
(4, 'App\\User', 297),
(4, 'App\\User', 299),
(4, 'App\\User', 300),
(4, 'App\\User', 301),
(4, 'App\\User', 302),
(4, 'App\\User', 303),
(4, 'App\\User', 304),
(4, 'App\\User', 305),
(4, 'App\\User', 306),
(4, 'App\\User', 307),
(4, 'App\\User', 308),
(4, 'App\\User', 310),
(4, 'App\\User', 311),
(4, 'App\\User', 327),
(4, 'App\\User', 338),
(4, 'App\\User', 339),
(4, 'App\\User', 355),
(7, 'App\\User', 208),
(7, 'App\\User', 214),
(7, 'App\\User', 216),
(7, 'App\\User', 217),
(7, 'App\\User', 218),
(7, 'App\\User', 219),
(7, 'App\\User', 221),
(7, 'App\\User', 222),
(7, 'App\\User', 233),
(7, 'App\\User', 242),
(7, 'App\\User', 263),
(7, 'App\\User', 266),
(7, 'App\\User', 268),
(7, 'App\\User', 271),
(7, 'App\\User', 272),
(7, 'App\\User', 274),
(7, 'App\\User', 275),
(7, 'App\\User', 276),
(7, 'App\\User', 277),
(7, 'App\\User', 288),
(7, 'App\\User', 289),
(7, 'App\\User', 290),
(7, 'App\\User', 312),
(7, 'App\\User', 315),
(7, 'App\\User', 316),
(7, 'App\\User', 319),
(7, 'App\\User', 320),
(7, 'App\\User', 321),
(7, 'App\\User', 322),
(7, 'App\\User', 323),
(7, 'App\\User', 324),
(7, 'App\\User', 325),
(7, 'App\\User', 326),
(7, 'App\\User', 343),
(7, 'App\\User', 349),
(7, 'App\\User', 352),
(7, 'App\\User', 354),
(7, 'App\\User', 356),
(8, 'App\\User', 209),
(8, 'App\\User', 210),
(8, 'App\\User', 313),
(8, 'App\\User', 317),
(8, 'App\\User', 340),
(8, 'App\\User', 357),
(9, 'App\\User', 205),
(9, 'App\\User', 220),
(9, 'App\\User', 223),
(9, 'App\\User', 228),
(9, 'App\\User', 273),
(9, 'App\\User', 287),
(9, 'App\\User', 291),
(9, 'App\\User', 314),
(9, 'App\\User', 318),
(9, 'App\\User', 342),
(9, 'App\\User', 351),
(11, 'App\\User', 224),
(11, 'App\\User', 286),
(11, 'App\\User', 298),
(11, 'App\\User', 328),
(11, 'App\\User', 331),
(11, 'App\\User', 348),
(11, 'App\\User', 350),
(12, 'App\\User', 225),
(13, 'App\\User', 3),
(13, 'App\\User', 334),
(13, 'App\\User', 335),
(14, 'App\\User', 330),
(15, 'App\\User', 329),
(16, 'App\\User', 353);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('venr109@gmail.com', '$2y$10$O/BySWh/FVpdSf7N8MeXHOns..8QjKwcLahk2Hk2K1WFZIfCMgNMa', '2020-10-17 03:31:07'),
('ramana6666@gmail.com', '$2y$10$PPrxyqJ7GAz8Db8M58WsK.tBrfIcIPw4YHbR9TYbDX6gea/RV7hAu', '2024-02-11 17:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sub_category` tinyint(4) DEFAULT '0',
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `category`, `sub_category`, `is_sub_category`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'olt', 'OLT', 'Technical', NULL, 0, 'web', 'Y', '2019-05-24 21:18:47', '2020-07-02 07:42:36'),
(2, 'edfa', 'EDFA', 'Technical', NULL, 0, 'web', 'Y', '2019-05-24 21:27:51', '2020-07-02 07:42:32'),
(3, 'dp', 'DP', 'Technical', NULL, 0, 'web', 'Y', '2019-05-24 21:29:14', '2020-07-02 07:42:28'),
(4, 'dpd', 'DPD', 'Technical', NULL, 0, 'web', 'Y', '2020-06-23 21:06:59', '2020-07-02 07:42:24'),
(5, 'fiber-laying', 'Fiber Laying', 'Technical', NULL, 0, 'web', 'Y', '2020-06-24 12:24:39', '2020-07-02 07:42:20'),
(6, 'fh', 'FH', 'Technical', NULL, 0, 'web', 'Y', '2020-06-24 12:45:24', '2020-07-02 07:42:14'),
(7, 'departments', 'Departments', 'Administration', NULL, 0, 'web', 'Y', '2020-07-01 00:56:23', '2020-07-02 07:34:12'),
(8, 'designations', 'Designations', 'Administration', NULL, 0, 'web', 'Y', '2020-07-01 00:56:40', '2020-07-02 07:34:27'),
(9, 'employees', 'Employees', 'Administration', NULL, 0, 'web', 'Y', '2020-07-01 00:56:59', '2020-07-02 07:34:37'),
(10, 'city', 'City', 'Administration', NULL, 0, 'web', 'Y', '2020-07-01 00:57:39', '2020-07-02 07:34:50'),
(11, 'distributors', 'Distributors', 'Administration', NULL, 0, 'web', 'Y', '2020-07-01 00:57:52', '2020-07-02 07:34:58'),
(12, 'branches', 'Branches', 'Administration', NULL, 0, 'web', 'Y', '2020-07-01 00:58:14', '2020-07-02 07:35:05'),
(13, 'franchises', 'Franchises', 'Administration', NULL, 0, 'web', 'Y', '2020-07-01 00:58:28', '2020-07-02 07:35:13'),
(14, 'connection-types', 'Connection Types', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 00:59:06', '2020-07-02 07:40:02'),
(15, 'combo-plans', 'Combo Plans', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 00:59:40', '2020-07-02 07:40:19'),
(16, 'combo-packages', 'Combo Packages', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:00:05', '2020-07-02 07:40:24'),
(17, 'broadband-plans', 'Broadband Plans', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:00:37', '2020-07-02 07:40:28'),
(18, 'broadband-packages', 'Broadband Packages', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:00:59', '2020-07-02 07:40:32'),
(19, 'iptv-base', 'IPTV - Base', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:03:49', '2020-07-02 07:40:37'),
(20, 'iptv-packages', 'IPTV - Packages', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:12:01', '2020-07-02 07:40:41'),
(21, 'iptv-allacart', 'IPTV - Allacart', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:12:17', '2020-07-02 07:40:45'),
(22, 'iptv-local', 'IPTV - Local', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:12:48', '2020-07-02 07:40:50'),
(23, 'cable-base', 'Cable - Base', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:13:14', '2020-07-02 07:40:55'),
(24, 'cable-packages', 'Cable - Packages', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:13:34', '2020-07-02 08:02:30'),
(25, 'cable-allacart', 'Cable - Allacart', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:14:05', '2020-07-02 08:02:35'),
(26, 'cable-local', 'Cable - Local', 'Packages', NULL, 0, 'web', 'Y', '2020-07-01 01:14:32', '2020-07-02 08:02:40'),
(27, 'users', 'Users', 'Users', '', 1, 'web', 'Y', '2020-07-01 10:41:03', '2020-07-02 07:41:52'),
(28, 'roles', 'Roles', 'Users', '', 1, 'web', 'Y', '2020-07-01 10:41:11', '2020-07-02 07:41:48'),
(29, 'permissions', 'Permissions', 'Users', '', 1, 'web', 'Y', '2020-07-01 10:41:21', '2020-07-02 07:41:44'),
(30, 'add-customer-application', 'Add Customer Application', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:42:32', '2020-07-02 07:38:00'),
(31, 'all-customers', 'All Customers', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:42:45', '2020-07-02 07:38:17'),
(32, 'new-customers', 'New Customers', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:43:11', '2020-07-02 07:38:28'),
(33, 'add-technical', 'Add Technical', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:43:28', '2020-07-02 07:38:38'),
(34, 'scheduled-customers', 'Scheduled Customers', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:47:42', '2020-07-02 07:38:54'),
(35, 'activate-customers', 'Activate Customers', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:48:02', '2020-07-02 07:39:10'),
(36, 'active-customers', 'Active Customers', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:52:46', '2020-07-02 07:39:15'),
(37, 'expired-customers', 'Expired Customers', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:53:08', '2020-07-02 07:39:22'),
(38, 'disconnection-customers', 'Disconnection Customers', 'Customers', NULL, 0, 'web', 'Y', '2020-07-01 10:53:18', '2020-07-02 07:39:41'),
(39, 'complaint-types', 'Complaint Types', 'Complaints', NULL, 0, 'web', 'Y', '2020-07-01 11:04:13', '2020-07-02 07:35:20'),
(40, 'add-complaint', 'Add Complaint', 'Complaints', NULL, 0, 'web', 'Y', '2020-07-01 11:04:38', '2020-07-02 07:35:28'),
(41, 'all-complaints', 'All Complaints', 'Complaints', NULL, 0, 'web', 'Y', '2020-07-01 11:04:53', '2020-07-02 07:36:34'),
(46, 'payment-types', 'Payment Types', 'Accounts', NULL, 0, 'web', 'Y', '2020-07-01 11:07:16', '2020-07-02 09:11:41'),
(47, 'purchase-order', 'Purchase Order', 'Accounts', NULL, 0, 'web', 'Y', '2020-07-01 11:07:30', '2020-07-02 07:33:20'),
(48, 'add-purchase-order', 'Add Purchase Order', 'Accounts', NULL, 0, 'web', 'Y', '2020-07-01 11:07:42', '2020-07-02 07:32:35'),
(49, 'inward-cash-flow', 'Inward Cash Flow', 'Accounts', NULL, 0, 'web', 'Y', '2020-07-01 11:08:00', '2020-07-02 07:32:51'),
(50, 'outward-cash-flow', 'Outward Cash Flow', 'Accounts', NULL, 0, 'web', 'Y', '2020-07-01 11:08:16', '2020-07-02 07:32:58'),
(51, 'gst', 'GST', 'Accounts', NULL, 0, 'web', 'Y', '2020-07-01 11:08:31', '2020-07-02 07:33:06'),
(52, 'balance-sheet', 'Balance Sheet', 'Accounts', NULL, 0, 'web', 'Y', '2020-07-01 11:08:40', '2020-07-02 07:32:43'),
(53, 'paid-invoices', 'Paid Invoices', 'Accounts', NULL, 0, 'web', 'Y', NULL, NULL),
(54, 'unpaid-invoices', 'Unpaid Invoices', 'Accounts', NULL, 0, 'web', 'Y', NULL, NULL),
(55, 'generate-invoices', 'Generate invoices', 'Accounts', NULL, 0, 'web', 'Y', NULL, NULL),
(56, 'bank-accounts', 'Bank Accounts', 'Accounts', NULL, 0, 'web', 'Y', NULL, NULL),
(58, 'feasibility-check', 'Feasibility Check', 'Feasibility Check', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(59, 'create-department', 'Create Department', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(60, 'edit-department', 'Edit Department', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(61, 'delete-department', 'Delete Department', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(62, 'create-designation', 'Create Designation', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(63, 'edit-designation', 'Edit Designation', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(64, 'delete-designation', 'Delete Designation', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(65, 'create-employee', 'Create Employee', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(66, 'edit-employee', 'Edit Employee', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(67, 'delete-employee', 'Delete Employee', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(68, 'create-branch', 'Create Branch', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(69, 'edit-branch', 'Edit Branch', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(70, 'delete-branch', 'Delete Branch', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(71, 'change-password-branch', 'Change Password Branch', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(72, 'branch-deposit', 'Branch Deposit', 'Administration', NULL, 0, 'web', 'Y', NULL, NULL),
(73, 'create-city', 'Create City', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(74, 'edit-city', 'Edit City', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(75, 'delete-city', 'Delete City', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(76, 'create-distributor', 'Create Distributor', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(77, 'edit-distributor', 'Edit Distributor', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(78, 'delete-distributor', 'Delete Distributor', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(79, 'change-password-distributor', 'Change Password Distributor', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(80, 'view-distributor', 'View distributor', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(81, 'view-employee', 'View Employee', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(82, 'create-franchise', 'Create Franchise', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(83, 'edit-franchise', 'Edit Franchise', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(84, 'delete-franchise', 'Delete franchise', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(85, 'change-password-franchise', 'Change Password Franchise', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(86, 'franchise-deposit', 'Franchise Deposit', 'Administration', NULL, 0, 'web', 'Y', '2021-04-01 07:00:00', '2021-04-01 07:00:00'),
(87, 'olt', 'OLT', 'Technical', '', 1, 'web', 'Y', '2019-05-25 04:18:47', '2021-04-06 08:24:20'),
(88, 'edfa', 'EDFA', 'Technical', '', 1, 'web', 'Y', '2019-05-25 04:27:51', '2021-04-06 08:27:08'),
(89, 'dp', 'DP', 'Technical', '', 1, 'web', 'Y', '2019-05-25 04:29:14', '2021-04-06 08:27:04'),
(90, 'dpd', 'DPD', 'Technical', '', 1, 'web', 'Y', '2020-06-24 04:06:59', '2021-04-06 08:24:45'),
(91, 'fiber-laying', 'Fiber Laying', 'Technical', '', 1, 'web', 'Y', '2020-06-24 19:24:39', '2021-04-06 08:25:18'),
(92, 'fh', 'FH', 'Technical', '', 1, 'web', 'Y', '2020-06-24 19:45:24', '2021-04-06 08:24:40'),
(93, 'departments', 'Departments', 'Administration', NULL, 1, 'web', 'Y', '2020-07-01 07:56:23', '2020-07-02 14:34:12'),
(94, 'designations', 'Designations', 'Administration', NULL, 1, 'web', 'Y', '2020-07-01 07:56:40', '2020-07-02 14:34:27'),
(95, 'employees', 'Employees', 'Administration', '', 1, 'web', 'Y', '2020-07-01 07:56:59', '2021-04-06 11:25:37'),
(96, 'city', 'City', 'Administration', '', 1, 'web', 'Y', '2020-07-01 07:57:39', '2021-04-06 10:11:49'),
(97, 'distributors', 'Distributors', 'Administration', NULL, 1, 'web', 'Y', '2020-07-01 07:57:52', '2020-07-02 14:34:58'),
(98, 'branches', 'Branches', 'Administration', '', 1, 'web', 'Y', '2020-07-01 07:58:14', '2021-04-06 10:13:09'),
(99, 'franchises', 'Franchises', 'Administration', '', 1, 'web', 'Y', '2020-07-01 07:58:28', '2021-04-06 11:28:28'),
(100, 'connection-types', 'Connection Types', 'Packages', '', 1, 'web', 'Y', '2020-07-01 07:59:06', '2021-04-07 13:10:21'),
(101, 'combo-plans', 'Combo Plans', 'Packages', '', 1, 'web', 'Y', '2020-07-01 07:59:40', '2021-04-07 13:09:08'),
(102, 'combo-packages', 'Combo Packages', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:00:05', '2021-04-07 13:07:35'),
(103, 'broadband-plans', 'Broadband Plans', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:00:37', '2021-04-07 12:47:15'),
(104, 'broadband-packages', 'Broadband Packages', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:00:59', '2021-04-07 12:46:40'),
(105, 'iptv-base', 'IPTV - Base', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:03:49', '2021-04-07 13:18:57'),
(106, 'iptv-packages', 'IPTV - Packages', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:12:01', '2021-04-07 13:39:00'),
(107, 'iptv-allacart', 'IPTV - Allacart', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:12:17', '2021-04-07 13:19:22'),
(108, 'iptv-local', 'IPTV - Local', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:12:48', '2021-04-07 13:38:57'),
(109, 'cable-base', 'Cable - Base', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:13:14', '2021-04-07 12:54:30'),
(110, 'cable-packages', 'Cable - Packages', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:13:34', '2021-04-07 12:57:30'),
(111, 'cable-allacart', 'Cable - Allacart', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:14:05', '2021-04-07 12:54:34'),
(112, 'cable-local', 'Cable - Local', 'Packages', '', 1, 'web', 'Y', '2020-07-01 08:14:32', '2021-04-07 12:54:53'),
(116, 'add-customer-application', 'Add Customer Application', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:42:32', '2021-04-07 12:35:59'),
(117, 'all-customers', 'All Customers', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:42:45', '2021-04-07 12:37:06'),
(118, 'new-customers', 'New Customers', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:43:11', '2021-04-07 12:42:20'),
(119, 'add-technical', 'Add Technical', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:43:28', '2021-04-07 12:36:26'),
(120, 'scheduled-customers', 'Scheduled Customers', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:47:42', '2021-04-07 12:42:41'),
(121, 'activate-customers', 'Activate Customers', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:48:02', '2021-04-07 12:34:33'),
(122, 'active-customers', 'Active Customers', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:52:46', '2021-04-07 12:35:24'),
(123, 'expired-customers', 'Expired Customers', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:53:08', '2021-04-07 12:41:36'),
(124, 'disconnection-customers', 'Disconnection Customers', 'Customers', '', 1, 'web', 'Y', '2020-07-01 17:53:18', '2021-04-07 12:39:40'),
(125, 'complaint-types', 'Complaint Types', 'Complaints', '', 1, 'web', 'Y', '2020-07-01 18:04:13', '2021-04-06 08:34:55'),
(126, 'add-complaint', 'Add Complaint', 'Complaints', 'Complaints', 0, 'web', 'Y', '2020-07-01 18:04:38', '2021-04-06 11:31:19'),
(127, 'complaints', 'Complaints', 'Complaints', '', 1, 'web', 'Y', '2020-07-01 18:04:53', '2021-04-06 08:39:32'),
(132, 'payment-types', 'Payment Types', 'Accounts', '', 1, 'web', 'Y', '2020-07-01 18:07:16', '2021-04-06 08:18:14'),
(133, 'purchase-order', 'Purchase Order', 'Accounts', '', 1, 'web', 'Y', '2020-07-01 18:07:30', '2021-04-06 08:18:51'),
(134, 'add-purchase-order', 'Add Purchase Order', 'Accounts', 'Purchase Order', 0, 'web', 'Y', '2020-07-01 18:07:42', '2021-04-06 11:21:07'),
(135, 'inward-cash-flow', 'Inward Cash Flow', 'Accounts', '', 1, 'web', 'Y', '2020-07-01 18:08:00', '2021-04-06 11:19:54'),
(136, 'outward-cash-flow', 'Outward Cash Flow', 'Accounts', '', 1, 'web', 'Y', '2020-07-01 18:08:16', '2021-04-06 11:19:50'),
(137, 'gst', 'GST', 'Accounts', '', 1, 'web', 'Y', '2020-07-01 18:08:31', '2021-04-06 11:20:00'),
(138, 'balance-sheet', 'Balance Sheet', 'Accounts', '', 1, 'web', 'Y', '2020-07-01 18:08:40', '2021-04-06 11:20:29'),
(139, 'paid-invoices', 'Paid Invoices', 'Accounts', '', 1, 'web', 'Y', NULL, '2021-04-06 11:19:33'),
(140, 'unpaid-invoices', 'Unpaid Invoices', 'Accounts', '', 1, 'web', 'Y', NULL, '2021-04-06 11:18:43'),
(141, 'generate-invoices', 'Generate invoices', 'Accounts', NULL, 0, 'web', 'Y', NULL, NULL),
(142, 'bank-accounts', 'Bank Accounts', 'Accounts', '', 1, 'web', 'Y', '2020-12-19 11:49:43', '2021-04-06 08:13:20'),
(144, 'create-department', 'Create Department', 'Administration', 'Departments', 0, 'web', 'Y', '2021-03-30 07:23:09', '2021-04-06 10:25:40'),
(145, 'edit-department', 'Edit Department', 'Administration', 'Departments', 0, 'web', 'Y', '2021-03-30 07:27:18', '2021-04-06 11:03:15'),
(146, 'delete-department', 'Delete Department', 'Administration', 'Departments', 0, 'web', 'Y', '2021-03-30 07:29:24', '2021-04-06 11:09:02'),
(147, 'create-designation', 'Create Designation', 'Administration', 'Designations', 0, 'web', 'Y', '2021-03-30 08:18:12', '2021-04-06 10:27:20'),
(148, 'edit-designation', 'Edit Designation', 'Administration', 'Designations', 0, 'web', 'Y', '2021-03-30 08:19:49', '2021-04-06 11:04:19'),
(149, 'delete-designation', 'Delete Designation', 'Administration', 'Designations', 0, 'web', 'Y', '2021-03-30 08:20:53', '2021-04-06 11:08:39'),
(150, 'create-employee', 'Create Employee', 'Administration', 'Employees', 0, 'web', 'Y', '2021-03-30 08:38:57', '2021-04-06 10:27:50'),
(151, 'edit-employee', 'Edit Employee', 'Administration', 'Employees', 0, 'web', 'Y', '2021-03-30 08:40:52', '2021-04-06 11:05:35'),
(152, 'delete-employee', 'Delete Employee', 'Administration', 'Employees', 0, 'web', 'Y', '2021-03-30 08:41:44', '2021-04-06 11:06:30'),
(153, 'create-branch', 'Create Branch', 'Administration', 'Branches', 0, 'web', 'Y', '2021-03-30 09:32:55', '2021-04-06 11:17:46'),
(154, 'edit-branch', 'Edit Branch', 'Administration', 'Branches', 0, 'web', 'Y', '2021-03-30 09:34:47', '2021-04-06 11:17:16'),
(155, 'delete-branch', 'Delete Branch', 'Administration', 'Branches', 0, 'web', 'Y', '2021-03-30 09:36:18', '2021-04-06 11:10:01'),
(156, 'change-password-branch', 'Change Password Branch', 'Administration', 'Branches', 0, 'web', 'Y', '2021-03-30 09:37:12', '2021-04-06 10:20:20'),
(157, 'branch-deposit', 'Branch Deposit', 'Administration', 'Branches', 0, 'web', 'Y', '2021-03-30 09:37:50', '2021-04-06 10:21:25'),
(158, 'create-city', 'Create City', 'Administration', 'City', 0, 'web', 'Y', '2021-03-30 10:15:45', '2021-04-06 10:24:56'),
(159, 'edit-city', 'Edit City', 'Administration', 'City', 0, 'web', 'Y', '2021-03-30 10:16:40', '2021-04-06 11:02:44'),
(160, 'delete-city', 'Delete City', 'Administration', 'City', 0, 'web', 'Y', '2021-03-30 10:18:26', '2021-04-06 11:09:44'),
(161, 'create-distributor', 'Create Distributor', 'Administration', 'Distributors', 0, 'web', 'Y', '2021-03-30 10:27:35', '2021-04-06 11:10:34'),
(162, 'edit-distributor', 'Edit Distributor', 'Administration', 'Distributors', 0, 'web', 'Y', '2021-03-30 10:28:21', '2021-04-06 11:05:02'),
(163, 'delete-distributor', 'Delete Distributor', 'Administration', 'Distributors', 0, 'web', 'Y', '2021-03-30 10:29:45', '2021-04-06 11:07:58'),
(164, 'change-password-distributor', 'Change Password Distributor', 'Administration', 'Distributors', 0, 'web', 'Y', '2021-03-30 10:30:56', '2021-04-06 10:22:41'),
(165, 'view-distributor', 'View distributor', 'Administration', 'Distributors', 0, 'web', 'Y', '2021-03-30 10:34:39', '2021-04-06 11:29:44'),
(166, 'view-employee', 'View Employee', 'Administration', 'Employees', 0, 'web', 'Y', '2021-03-30 10:38:48', '2021-04-06 11:30:17'),
(167, 'create-franchise', 'Create Franchise', 'Administration', 'Franchises', 0, 'web', 'Y', '2021-03-30 10:45:25', '2021-04-06 11:10:59'),
(168, 'edit-franchise', 'Edit Franchise', 'Administration', 'Franchises', 0, 'web', 'Y', '2021-03-30 10:46:22', '2021-04-06 11:24:49'),
(169, 'delete-franchise', 'Delete franchise', 'Administration', 'Franchises', 0, 'web', 'Y', '2021-03-30 10:48:05', '2021-04-06 11:06:41'),
(170, 'change-password-franchise', 'Change Password Franchise', 'Administration', 'Franchises', 0, 'web', 'Y', '2021-03-30 10:49:13', '2021-04-06 10:23:22'),
(171, 'franchise-deposit', 'Franchise Deposit', 'Administration', 'Franchises', 0, 'web', 'Y', '2021-03-30 10:50:25', '2021-04-06 11:26:28'),
(172, 'feasibility-check', 'Feasibility Check', 'Feasibility Check', '', 1, 'web', 'Y', '2021-03-30 14:00:00', '2021-04-06 09:50:37'),
(173, 'create-connection-type', 'Create Connection Type', 'Packages', 'Connection Types', 0, 'web', 'Y', '2021-04-01 10:16:02', '2021-04-07 13:34:09'),
(174, 'edit-connection-type', 'Edit Connection Type', 'Packages', 'Connection Types', 0, 'web', 'Y', '2021-04-01 10:16:37', '2021-04-07 13:19:48'),
(175, 'delete-connection-type', 'Delete Connection Type', 'Packages', 'Connection Types', 0, 'web', 'Y', '2021-04-01 10:17:28', '2021-04-07 13:29:12'),
(176, 'create-combo-plans', 'Create Combo Plans', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-04-01 10:21:03', '2021-04-07 13:34:29'),
(177, 'edit-combo-plans', 'Edit Combo Plans', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-04-01 10:22:08', '2021-04-07 13:21:04'),
(178, 'delete-combo-plans', 'Delete Combo Plans', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-04-01 10:23:15', '2021-04-07 13:33:13'),
(179, 'combo-sub-plans', 'Combo Sub Plans', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-04-01 10:25:56', '2021-04-07 13:10:07'),
(180, 'create-combo-sub-plans', 'Create Combo Sub Plans', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-04-01 10:27:26', '2021-04-07 13:34:24'),
(181, 'edit-combo-sub-plans', 'Edit Combo Sub Plans', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-04-01 10:28:24', '2021-04-07 13:20:18'),
(182, 'delete-combo-sub-plans', 'Delete Combo Sub Plans', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-04-01 10:29:32', '2021-04-07 13:33:09'),
(183, 'create-combo-package', 'Create Combo Package', 'Packages', 'Combo Packages', 0, 'web', 'Y', '2021-04-01 10:30:47', '2021-04-07 13:34:43'),
(184, 'edit-combo-packages', 'Edit Combo Packages', 'Packages', 'Combo Packages', 0, 'web', 'Y', '2021-04-01 10:31:22', '2021-04-07 13:21:18'),
(185, 'edit-combo-package', 'Edit Combo Package', 'Packages', 'Combo Packages', 0, 'web', 'Y', '2021-04-01 10:32:17', '2021-04-07 13:22:50'),
(186, 'delete-combo-package', 'Delete Combo Package', 'Packages', 'Combo Packages', 0, 'web', 'Y', '2021-04-01 10:33:43', '2021-04-07 13:33:32'),
(187, 'view-sub-plans', 'View Sub Plans', 'Packages', NULL, 0, 'web', 'Y', '2021-04-01 10:36:54', '2021-04-01 10:36:54'),
(188, 'broadband-sub-plans', 'Broadband Sub Plans', 'Packages', 'Broadband Plans', 0, 'web', 'Y', '2021-04-01 10:38:23', '2021-04-07 12:52:48'),
(189, 'create-broadband-sub-plans', 'Create Broadband Sub Plans', 'Packages', 'Broadband Plans', 0, 'web', 'Y', '2021-04-01 10:39:11', '2021-04-07 13:13:18'),
(190, 'edit-broadband-sub-plans', 'Edit Broadband Sub Plans', 'Packages', 'Broadband Plans', 0, 'web', 'Y', '2021-04-01 10:40:17', '2021-04-07 13:24:10'),
(191, 'edit-broadband-sub-plan', 'Edit Broadband Sub Plan', 'Packages', 'Broadband Plans', 0, 'web', 'Y', '2021-04-01 10:40:24', '2021-04-07 13:25:14'),
(192, 'create-broadband-sub-plan', 'Create Broadband Sub Plan', 'Packages', 'Broadband Plans', 0, 'web', 'Y', '2021-04-01 10:41:02', '2021-04-07 13:12:52'),
(193, 'delete-broadband-sub-plan', 'Delete Broadband Sub Plan', 'Packages', 'Broadband Plans', 0, 'web', 'Y', '2021-04-01 10:42:00', '2021-04-07 13:33:37'),
(194, 'create-broadband-package', 'Create Broadband Package', 'Packages', 'Broadband Packages', 0, 'web', 'Y', '2021-04-01 10:43:42', '2021-04-07 13:12:01'),
(195, 'edit-broadband-package', 'Edit Broadband Package', 'Packages', 'Broadband Packages', 0, 'web', 'Y', '2021-04-01 10:44:39', '2021-04-07 13:27:04'),
(196, 'delete-broadband-package', 'Delete Broadband Package', 'Packages', 'Broadband Packages', 0, 'web', 'Y', '2021-04-01 10:47:00', '2021-04-07 13:33:56'),
(197, 'view-broadband-sub-plan', 'View Broadband Sub Plan', 'Packages', 'Broadband Plans', 0, 'web', 'Y', '2021-04-01 10:49:02', '2021-04-07 13:53:46'),
(198, 'iptv-base-edit', 'Iptv Base Edit', 'Packages', 'IPTV - Base', 0, 'web', 'Y', '2021-04-01 10:51:37', '2021-04-07 13:45:11'),
(199, 'iptv-base-create', 'Iptv Base Create', 'Packages', 'IPTV - Base', 0, 'web', 'Y', '2021-04-01 10:52:23', '2021-04-07 13:43:21'),
(200, 'iptv-base-delete', 'Iptv Base Delete', 'Packages', 'IPTV - Base', 0, 'web', 'Y', '2021-04-01 10:53:16', '2021-04-07 13:44:36'),
(201, 'iptv-list-packages', 'IPTV List Packages', 'Packages', NULL, 0, 'web', 'Y', '2021-04-01 10:56:41', '2021-04-01 10:56:41'),
(202, 'iptv-package-create', 'IPTV Package Create', 'Packages', 'IPTV - Packages', 0, 'web', 'Y', '2021-04-01 10:57:46', '2021-04-07 13:46:08'),
(203, 'iptv-package-edit', 'IPTV Package Edit', 'Packages', 'IPTV - Packages', 0, 'web', 'Y', '2021-04-01 10:59:07', '2021-04-07 13:47:48'),
(204, 'iptv-package-delete', 'IPTV Package Delete', 'Packages', 'IPTV - Packages', 0, 'web', 'Y', '2021-04-01 11:00:33', '2021-04-07 13:46:50'),
(205, 'iptv-allacart-create', 'IPTV Allacart Create', 'Packages', 'IPTV - Allacart', 0, 'web', 'Y', '2021-04-01 11:03:07', '2021-04-07 13:41:37'),
(206, 'iptv-allacart-edit', 'IPTV Allacart Edit', 'Packages', 'IPTV - Allacart', 0, 'web', 'Y', '2021-04-01 11:03:52', '2021-04-07 13:42:47'),
(207, 'iptv-allacart-delete', 'IPTV Allacart Delete', 'Packages', 'IPTV - Allacart', 0, 'web', 'Y', '2021-04-01 11:04:48', '2021-04-07 13:42:16'),
(208, 'iptv-local-create', 'IPTV Local Create', 'Packages', 'IPTV - Local', 0, 'web', 'Y', '2021-04-01 11:07:05', '2021-04-07 13:49:15'),
(209, 'iptv-local-edit', 'IPTV Local Edit', 'Packages', 'IPTV - Local', 0, 'web', 'Y', '2021-04-01 11:07:50', '2021-04-07 13:51:22'),
(210, 'iptv-local-delete', 'IPTV Local Delete', 'Packages', 'IPTV - Local', 0, 'web', 'Y', '2021-04-01 11:08:47', '2021-04-07 13:50:38'),
(211, 'cable-base-create', 'Cable Base Create', 'Packages', 'Cable - Base', 0, 'web', 'Y', '2021-04-01 11:12:08', '2021-04-07 13:01:39'),
(212, 'cable-base-edit', 'Cable Base Edit', 'Packages', 'Cable - Base', 0, 'web', 'Y', '2021-04-01 11:13:20', '2021-04-07 13:02:55'),
(213, 'cable-base-delete', 'Cable Base Delete', 'Packages', 'Cable - Base', 0, 'web', 'Y', '2021-04-01 11:14:18', '2021-04-07 13:02:15'),
(214, 'cable-package-create', 'Cable Package Create', 'Packages', 'Cable - Packages', 0, 'web', 'Y', '2021-04-01 11:19:59', '2021-04-07 13:06:54'),
(215, 'cable-package-edit', 'Cable Package Edit', 'Packages', 'Cable - Packages', 0, 'web', 'Y', '2021-04-01 11:20:33', '2021-04-07 13:08:04'),
(216, 'cable-package-delete', 'Cable Package Delete', 'Packages', 'Cable - Packages', 0, 'web', 'Y', '2021-04-01 11:21:18', '2021-04-07 13:08:01'),
(217, 'cable-allacart-create', 'Cable Allacart Create', 'Packages', 'Cable - Allacart', 0, 'web', 'Y', '2021-04-01 11:22:50', '2021-04-07 12:58:34'),
(218, 'cable-allacart-edit', 'Cable Allacart Edit', 'Packages', 'Cable - Allacart', 0, 'web', 'Y', '2021-04-01 11:23:26', '2021-04-07 13:00:35'),
(219, 'cable-allacart-delete', 'Cable Allacart Delete', 'Packages', 'Cable - Allacart', 0, 'web', 'Y', '2021-04-01 11:24:13', '2021-04-07 12:59:33'),
(220, 'cable-local-create', 'Cable Local Create', 'Packages', 'Cable - Local', 0, 'web', 'Y', '2021-04-01 11:26:20', '2021-04-07 13:03:58'),
(221, 'cable-local-edit', 'Cable Local Edit', 'Packages', 'Cable - Local', 0, 'web', 'Y', '2021-04-01 11:27:02', '2021-04-07 13:05:09'),
(222, 'cable-local-delete', 'Cable Local Delete', 'Packages', 'Cable - Local', 0, 'web', 'Y', '2021-04-01 11:28:26', '2021-04-07 13:04:31'),
(223, 'create-customer', 'Create Customer', 'Customers', 'Customers', 0, 'web', 'Y', '2021-04-01 11:31:32', '2021-04-07 12:38:35'),
(224, 'customers', 'Customers', 'Customers', '', 1, 'web', 'Y', '2021-04-01 11:32:34', '2021-04-07 12:37:53'),
(225, 'edit-customer', 'Edit Customer', 'Customers', 'Customers', 0, 'web', 'Y', '2021-04-01 11:36:52', '2021-04-07 12:40:36'),
(226, 'disconnections', 'Disconnections', 'Customers', '', 1, 'web', 'Y', '2021-04-01 11:41:13', '2021-04-07 12:39:57'),
(227, 'view-customer', 'View Customer', 'Customers', 'Customers', 0, 'web', 'Y', '2021-04-01 11:44:35', '2021-04-07 12:43:29'),
(228, 'delete-customer', 'Delete Customer', 'Customers', 'Customers', 0, 'web', 'Y', '2021-04-01 11:47:00', '2021-04-07 12:39:24'),
(229, 'create-complaint-type', 'Create Complaint Type', 'Complaints', 'Complaint Types', 0, 'web', 'Y', '2021-04-01 11:49:42', '2021-04-06 11:34:18'),
(230, 'edit-complaint-type', 'Edit Complaint Type', 'Complaints', 'Complaint Types', 0, 'web', 'Y', '2021-04-01 11:50:48', '2021-04-06 11:37:42'),
(231, 'delete-complaint-type', 'Delete Complaint Type', 'Complaints', 'Complaint Types', 0, 'web', 'Y', '2021-04-01 12:02:52', '2021-04-06 11:34:54'),
(233, 'create-olt', 'Create OLT', 'Technical', 'OLT', 0, 'web', 'Y', '2021-04-07 14:06:24', '2021-04-07 14:06:24'),
(234, 'edit-olt', 'Edit OLT', 'Technical', 'OLT', 0, 'web', 'Y', '2021-04-07 14:07:28', '2021-04-07 14:07:28'),
(235, 'delete-olt', 'Delete OLT', 'Technical', 'OLT', 0, 'web', 'Y', '2021-04-07 14:08:51', '2021-04-07 14:08:51'),
(236, 'manage-ports', 'Manage Ports', 'Technical', 'OLT', 0, 'web', 'Y', '2021-04-07 14:10:49', '2021-04-07 14:10:49'),
(237, 'create-edfa', 'Create EDFA', 'Technical', 'EDFA', 0, 'web', 'Y', '2021-04-07 14:12:40', '2021-04-08 05:24:02'),
(238, 'delete-edfa', 'Delete EDFA', 'Technical', 'EDFA', 0, 'web', 'Y', '2021-04-07 14:13:49', '2021-04-07 14:13:49'),
(239, 'edit-edfa', 'Edit EDFA', 'Technical', 'EDFA', 0, 'web', 'Y', '2021-04-08 05:17:19', '2021-04-08 05:17:19'),
(240, 'create-dp', 'Create DP', 'Technical', 'DP', 0, 'web', 'Y', '2021-04-08 05:38:30', '2021-04-08 05:38:30'),
(241, 'edit-dp', 'Edit DP', 'Technical', 'DP', 0, 'web', 'Y', '2021-04-08 05:38:37', '2021-04-08 05:38:37'),
(242, 'delete-dp', 'Delete DP', 'Technical', 'DP', 0, 'web', 'Y', '2021-04-08 05:38:47', '2021-04-08 05:38:47'),
(243, 'create-dpd', 'Create DPD', 'Technical', 'DPD', 0, 'web', 'Y', '2021-04-08 05:42:47', '2021-04-08 05:42:47'),
(244, 'edit-dpd', 'Edit DPD', 'Technical', 'DPD', 0, 'web', 'Y', '2021-04-08 05:43:31', '2021-04-08 05:43:31'),
(245, 'delete-dpd', 'Delete DPD', 'Technical', 'DPD', 0, 'web', 'Y', '2021-04-08 05:43:36', '2021-04-08 05:43:36'),
(246, 'create-fiber-laying', 'Create Fiber Laying', 'Technical', 'Fiber Laying', 0, 'web', 'Y', '2021-04-08 05:44:35', '2021-04-08 05:44:35'),
(247, 'edit-fiber-laying', 'Edit Fiber Laying', 'Technical', 'Fiber Laying', 0, 'web', 'Y', '2021-04-08 05:45:02', '2021-04-08 05:45:02'),
(248, 'delete-fiber-laying', 'Delete Fiber Laying', 'Technical', 'Fiber Laying', 0, 'web', 'Y', '2021-04-08 05:46:26', '2021-04-08 05:46:26'),
(249, 'delete-fh', 'Delete FH', 'Technical', 'FH', 0, 'web', 'Y', '2021-04-08 05:48:04', '2021-04-08 05:48:04'),
(250, 'edit-fh', 'Edit FH', 'Technical', 'FH', 0, 'web', 'Y', '2021-04-08 05:48:04', '2021-04-08 05:48:04'),
(251, 'create-fh', 'Create FH', 'Technical', 'FH', 0, 'web', 'Y', '2021-04-08 05:48:34', '2021-04-08 05:48:34'),
(252, 'online-payments', 'Online Payments', 'Reports', NULL, 1, 'web', 'Y', '2021-04-08 05:54:51', '2021-04-08 05:54:51'),
(253, 'deposit-reports', 'Deposit Reports', 'Reports', NULL, 1, 'web', 'Y', '2021-04-08 05:55:30', '2021-04-08 05:55:30'),
(254, 'vendors-suppliers', 'Vendors & Suppliers', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-04-08 06:27:28', '2021-04-08 06:27:28'),
(255, 'create-vendors-suppliers', 'Create Vendors & Suppliers', 'Inventory Management', 'Vendors & Suppliers', 0, 'web', 'Y', '2021-04-08 06:28:30', '2021-04-08 06:28:30'),
(256, 'edit-vendors-suppliers', 'Edit Vendors & Suppliers', 'Inventory Management', 'Vendors & Suppliers', 0, 'web', 'Y', '2021-04-08 06:29:23', '2021-04-08 06:29:23'),
(257, 'delete-vendors-suppliers', 'Delete Vendors & Suppliers', 'Inventory Management', 'Vendors & Suppliers', 0, 'web', 'Y', '2021-04-08 06:30:29', '2021-04-08 06:30:29'),
(258, 'product-categories', 'Product Categories', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-04-08 06:31:52', '2021-04-08 06:31:52'),
(259, 'create-product-category', 'Create Product Category', 'Inventory Management', 'Product Categories', 0, 'web', 'Y', '2021-04-08 06:33:18', '2021-04-08 06:33:18'),
(260, 'edit-product-category', 'Edit Product Category', 'Inventory Management', 'Product Categories', 0, 'web', 'Y', '2021-04-08 06:34:15', '2021-04-08 06:34:15'),
(261, 'delete-product-category', 'Delete Product Category', 'Inventory Management', 'Product Categories', 0, 'web', 'Y', '2021-04-08 06:36:31', '2021-04-08 06:36:31'),
(262, 'view-vendors-supplier', 'View Vendors & Supplier', 'Inventory Management', 'Vendors & Suppliers', 0, 'web', 'Y', '2021-04-08 06:39:40', '2021-04-08 06:39:40'),
(263, 'view-product-category', 'View Product Category', 'Inventory Management', 'Product Categories', 0, 'web', 'Y', '2021-04-08 06:40:45', '2021-04-08 06:40:45'),
(264, 'products', 'Products', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-04-08 06:41:16', '2021-04-08 06:41:16'),
(265, 'create-product', 'Create Product', 'Inventory Management', 'Products', 0, 'web', 'Y', '2021-04-08 06:42:35', '2021-04-08 06:42:35'),
(266, 'delete-product', 'Delete Product', 'Inventory Management', 'Products', 0, 'web', 'Y', '2021-04-08 06:43:37', '2021-04-08 06:43:37'),
(267, 'edit-product', 'Edit Product', 'Inventory Management', 'Products', 0, 'web', 'Y', '2021-04-08 06:43:42', '2021-04-08 06:43:42'),
(268, 'view-product', 'View Product', 'Inventory Management', 'Products', 0, 'web', 'Y', '2021-04-08 06:45:32', '2021-04-08 06:45:32'),
(269, 'add-stock', 'Add Stock', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-04-08 06:47:55', '2021-04-08 06:47:55'),
(270, 'manage-stocks', 'Manage Stocks', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-04-08 06:48:21', '2021-04-08 06:48:21'),
(271, 'transfer-stocks', 'Transfer Stocks', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-04-08 06:49:04', '2021-04-08 06:49:04'),
(272, 'stock-upload-history', 'Stock Upload History', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-04-08 06:49:58', '2021-04-08 06:49:58'),
(273, 'edit-user', 'Edit User', 'Users', 'Users', 0, 'web', 'Y', '2021-04-08 06:53:05', '2021-04-08 06:53:05'),
(274, 'delete-user', 'Delete User', 'Users', 'Users', 0, 'web', 'Y', '2021-04-08 06:54:06', '2021-04-08 06:54:06'),
(275, 'view-user', 'View User', 'Users', 'Users', 0, 'web', 'Y', '2021-04-08 06:55:21', '2021-04-08 06:55:21'),
(276, 'create-role', 'Create Role', 'Users', 'Roles', 0, 'web', 'Y', '2021-04-08 06:56:25', '2021-04-08 06:56:25'),
(277, 'edit-role', 'Edit Role', 'Users', 'Roles', 0, 'web', 'Y', '2021-04-08 06:58:25', '2021-04-08 06:58:25'),
(278, 'delete-role', 'Delete Role', 'Users', 'Roles', 0, 'web', 'Y', '2021-04-08 06:59:20', '2021-04-08 06:59:20'),
(279, 'create-permission', 'Create Permission', 'Users', 'Permissions', 0, 'web', 'Y', '2021-04-08 06:59:49', '2021-04-08 06:59:49'),
(280, 'edit-permission', 'Edit Permission', 'Users', 'Permissions', 0, 'web', 'Y', '2021-04-08 07:00:31', '2021-04-08 07:00:31'),
(281, 'delete-permission', 'Delete Permission', 'Users', 'Permissions', 0, 'web', 'Y', '2021-04-08 07:00:37', '2021-04-08 07:00:37'),
(282, 'view-fiber-laying', 'View Fiber Laying', 'Technical', 'Fiber Laying', 0, 'web', 'Y', '2021-04-08 08:53:37', '2021-04-08 08:53:37'),
(283, 'customer-renewal-invoices', 'Customer Renewal Invoices', 'Customers', NULL, 1, 'web', 'Y', '2021-04-10 03:35:31', '2021-04-10 03:35:31'),
(284, 'renewal-history', 'Renewal history', 'Customers', NULL, 1, 'web', 'Y', '2021-04-10 03:36:37', '2021-04-10 03:36:37'),
(285, 'renew-user', 'Renew User', 'Customers', NULL, 1, 'web', 'Y', '2021-04-10 03:35:31', '2021-04-10 03:35:31'),
(286, 'cheque-invoices', 'Cheque Invoices', 'Accounts', NULL, 1, 'web', 'Y', '2021-04-10 03:35:31', '2021-04-10 03:35:31'),
(287, 'cheque-bounce-invoices', 'Cheque Bounce Invoices', 'Accounts', NULL, 1, 'web', 'Y', '2021-04-10 03:35:31', '2021-04-10 03:35:31'),
(288, 'all-deleted', 'All deleted', 'Accounts', NULL, 1, 'web', 'Y', '2021-04-10 03:35:31', '2021-04-10 03:35:31'),
(289, 'all-cancelled', 'All Cancelled', 'Accounts', NULL, 1, 'web', 'Y', '2021-04-10 03:35:31', '2021-04-10 03:35:31'),
(290, 'open-complaints', 'Open Complaints', 'Complaints', '', 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(291, 'in-progress-complaints', 'In Progress Complaints', 'Complaints', '', 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(292, 'resolved-complaints', 'Resolved Complaints', 'Complaints', '', 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(293, 'closed-complaints', 'Closed Complaints', 'Complaints', '', 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(294, 'deleted-complaints', 'Deleted Complaints', 'Complaints', '', 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(295, 'edit-combo-sub-plan', 'Edit Combo Sub Plan', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(296, 'delete-combo-sub-plan', 'Delete Combo Sub Plan', 'Packages', 'Combo Plans', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(298, 'update-employee-status', 'Update Employee Status', 'Administration', 'Employees', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(299, 'edit-stock-upload-history', 'Edit Stock Upload History', 'Inventory Management', 'Stock Upload History', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(300, 'delete-stock-upload-history', 'Delete Stock Upload History', 'Inventory Management', 'Stock Upload History', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(301, 'warehouses', 'Warehouses', 'Inventory Management', 'Manage Stocks', 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(302, 'create-warehouse', 'Create Warehouse', 'Inventory Management', 'Warehouses', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(303, 'edit-warehouse', 'Edit Warehouse', 'Inventory Management', 'Warehouses', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(304, 'delete-warehouse', 'Delete Warehouse', 'Inventory Management', 'Warehouses', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(305, 'transfer-from-stocks-to-warehouse', 'Transfer From Stocks to Warehouse', 'Inventory Management', 'Manage Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(306, 'transfer-from-stocks-to-distributor', 'Transfer From Stocks to Distributor', 'Inventory Management', 'Manage Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(307, 'transfer-from-stocks-to-branch', 'Transfer From Stocks to Branch', 'Inventory Management', 'Manage Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(308, 'transfer-from-stocks-to-franchise', 'Transfer From Stocks to Franchise', 'Inventory Management', 'Manage Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(309, 'transfer-from-stocks-to-employee', 'Transfer From Stocks to Employee', 'Inventory Management', 'Manage Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(310, 'transfer-from-warehouse-to-distributor', 'Transfer From Warehouse to Distributor', 'Inventory Management', 'Warehouse Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(311, 'transfer-from-warehouse-to-branch', 'Transfer From Warehouse to Branch', 'Inventory Management', 'Warehouse Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(312, 'transfer-from-warehouse-to-franchise', 'Transfer From Warehouse to Franchise', 'Inventory Management', 'Warehouse Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(313, 'transfer-from-warehouse-to-employee', 'Transfer From Warehouse to Employee', 'Inventory Management', 'Warehouse Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(314, 'transfer-from-franchise-to-employee', 'Transfer From Franchise to Employee', 'Inventory Management', 'Franchise Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(315, 'transfer-from-branch-to-employee', 'Transfer From Branch to Employee', 'Inventory Management', 'Branch Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(316, 'transfer-from-branch-to-franchise', 'Transfer From Branch to Franchise', 'Inventory Management', 'Branch Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(317, 'transfer-from-distributor-to-branch', 'Transfer From Distributor to Branch', 'Inventory Management', 'Distributor Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(318, 'transfer-from-distributor-to-franchise', 'Transfer From Distributor to Franchise', 'Inventory Management', 'Distributor Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(319, 'transfer-from-distributor-to-employee', 'Transfer From Distributor to Employee', 'Inventory Management', 'Distributor Stocks', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(320, 'restore-deleted-complaint', 'Restore Deleted Complaint', 'Complaints', 'Deleted Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(321, 'edit-deleted-complaint', 'Edit Deleted Complaint', 'Complaints', 'Deleted Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(322, 'edit-closed-complaint', 'Edit Closed Complaint', 'Complaints', 'Closed Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(323, 'delete-closed-complaint', 'Delete Closed Complaint', 'Complaints', 'Closed Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(324, 'edit-resolved-complaint', 'Edit Resolved Complaint', 'Complaints', 'Resolved Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(325, 'delete-resolved-complaint', 'Delete Resolved Complaint', 'Complaints', 'Resolved Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(326, 'reopen-resolved-complaint', 'Reopen Resolved Complaint', 'Complaints', 'Resolved Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(327, 'edit-in-progress-complaint', 'Edit In Progress Complaint', 'Complaints', 'In Progress Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(328, 'delete-in-progress-complaint', 'Delete In Progress Complaint', 'Complaints', 'In Progress Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(329, 'resolve-in-progress-complaint', 'Resolve In Progress Complaint', 'Complaints', 'In Progress Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(330, 'edit-open-complaint', 'Edit Open Complaint', 'Complaints', 'Open Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(331, 'delete-open-complaint', 'Delete Open Complaint', 'Complaints', 'Open Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(332, 'schedule-open-complaint', 'Schedule Open Complaint', 'Complaints', 'Open Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(333, 'edit-complaint', 'Edit Complaint', 'Complaints', 'Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(334, 'delete-complaint', 'Delete Complaint', 'Complaints', 'Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(335, 'schedule-complaint', 'Schedule Complaint', 'Complaints', 'Complaints', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(336, 'edit-payment-type', 'Edit Payment Type', 'Accounts', 'Payment Types', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(337, 'delete-payment-type', 'Delete Payment Type', 'Accounts', 'Payment Types', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(338, 'edit-purchase-order', 'Edit Purchase Order', 'Accounts', 'Purchase Order', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(339, 'delete-purchase-order', 'Delete Purchase Order', 'Accounts', 'Purchase Order', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(340, 'pay-invoice', 'Pay invoice', 'Accounts', 'Unpaid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(341, 'payment-pickup', 'Payment Pickup', 'Accounts', 'Unpaid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(342, 'download-unpaid-invoice', 'Download Unpaid Invoice', 'Accounts', 'Unpaid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(343, 'send-email-unpaid-invoice', 'Send Email Unpaid Invoice', 'Accounts', 'Unpaid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(344, 'print-unpaid-invoice', 'Print Unpaid Invoice', 'Accounts', 'Unpaid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(345, 'cancel-unpaid-invoice', 'Cancel Unpaid Invoice', 'Accounts', 'Unpaid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(346, 'delete-unpaid-invoice', 'Delete Unpaid Invoice', 'Accounts', 'Unpaid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(347, 'edit-purchase-order-in-generate-invoices', 'Edit Purchase Order In Generate Invoices', 'Accounts', 'Generate invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(348, 'delete-purchase-order-in-generate-invoices', 'Delete Purchase Order In Generate Invoices', 'Accounts', 'Generate invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(349, 'generate-invoice', 'Generate Invoice', 'Accounts', 'Generate invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(350, 'download-paid-invoice', 'Download Paid Invoice', 'Accounts', 'Paid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(351, 'send-email-paid-invoice', 'Send Email Paid Invoice', 'Accounts', 'Paid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(352, 'print-paid-invoice', 'Print Paid Invoice', 'Accounts', 'Paid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(353, 'cancel-paid-invoice', 'Cancel Paid Invoice', 'Accounts', 'Paid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(354, 'delete-paid-invoice', 'Delete Paid Invoice', 'Accounts', 'Paid Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(355, 'cheque-update', 'Cheque Update', 'Accounts', 'Cheque Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(356, 'cheque-bounce-invoice-update', 'Cheque Bounce Invoice Update', 'Accounts', 'Cheque Bounce Invoices', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(357, 'renew-user-in-customers', 'Renew User In Customers', 'Customers', 'All Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(358, 'edit-new-customer', 'Edit New Customer', 'Customers', 'New Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(359, 'pay-invoice-in-renewal-invoice', 'Pay Invoice In Renewal Invoice', 'Customers', 'Renewal Invoice', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(360, 'payment-pickup-in-renewal-invoice', 'Payment Pickup In Renewal Invoice', 'Customers', 'Renewal Invoice', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(361, 'download-in-renewal-invoice', 'Download In Renewal Invoice', 'Customers', 'Renewal Invoice', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(362, 'print-in-renewal-invoice', 'Print In Renewal Invoice', 'Customers', 'Renewal Invoice', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(363, 'send-email-in-renewal-invoice', 'Send Email In Renewal Invoice', 'Customers', 'Renewal Invoice', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(364, 'cancel-in-renewal-invoice', 'Cancel In Renewal Invoice', 'Customers', 'Renewal Invoice', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(365, 'renew-expired-customer', 'Renew Expired Customer', 'Customers', 'Expired Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(366, 'customer-detail-in-expired-customer', 'Customer Detail In Expired Customer', 'Customers', 'Expired Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(367, 'customer-detail-in-active-customer', 'Customer Detail In Active Customer', 'Customers', 'Active Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(368, 'renew-user-in-active-customer', 'Renew User In Active Customer', 'Customers', 'Active Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(369, 'activate-customer', 'Activate Customer', 'Customers', 'Activate Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(370, 'edit-activate-customers', 'Edit Activate Customers', 'Customers', 'Activate Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(371, 'edit-schedule-customer', 'Edit Schedule Customer', 'Customers', 'Scheduled Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(372, 'edit-add-technical', 'Edit Add Technical', 'Customers', 'Add Technical', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(373, 'customer-detail-in-add-technical', 'Customer Detail In Add Technical', 'Customers', 'Add Technical', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(374, 'customer-detail-in-new-customer', 'Customer Detail In New Customer', 'Customers', 'New Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(375, 'view-broadband-sub-plans', 'View Broadband Sub Plans', 'Packages', 'Broadband Packages', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(376, 'view-combo-sub-plans', 'View Combo Sub Plans', 'Packages', 'Combo Packages', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(377, 'renew-user-history-invoice-pay', 'Renew User History Invoice Pay', 'Customers', 'Renewal history', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(378, 'renew-user-history-invoice-payment-pickup', 'Renew User History Invoice Payment Pickup', 'Customers', 'Renewal history', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(379, 'renew-user-history-invoice-download', 'Renew User History Invoice Download', 'Customers', 'Renewal history', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(380, 'renew-user-history-invoice-send-email', 'Renew User History Invoice Send Email', 'Customers', 'Renewal history', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(381, 'renew-user-history-invoice-print', 'Renew User History Invoice Print', 'Customers', 'Renewal history', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(382, 'renew-user-history-invoice-cancel', 'Renew User History Invoice Cancel', 'Customers', 'Renewal history', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(383, 'renew-user-history-invoice-delete', 'Renew User History Invoice Delete', 'Customers', 'Renewal history', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(384, 'edit-disconnected-customer', 'Edit Disconnected Customer', 'Customers', 'Disconnection Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `category`, `sub_category`, `is_sub_category`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(385, 'delete-disconnected-customer', 'Delete Disconnected Customer', 'Customers', 'Disconnection Customers', 0, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(386, 'employee-stocks', 'Employee Stocks', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(387, 'franchise-stocks', 'Franchise Stocks', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(388, 'branch-stocks', 'Branch Stocks', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(389, 'distributor-stocks', 'Distributor Stocks', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(390, 'warehouse-stocks', 'Warehouse Stocks', 'Inventory Management', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(391, 'all-deleted', 'All deleted', 'Accounts', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(392, 'all-cancelled', 'All Cancelled', 'Accounts', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(393, 'cheque-bounce-invoices', 'Cheque Bounce Invoices', 'Accounts', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(394, 'cheque-invoices', 'Cheque Invoices', 'Accounts', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(395, 'generate-invoices', 'Generate invoices', 'Accounts', NULL, 1, 'web', 'Y', '2021-06-15 14:37:47', '2021-06-15 14:37:47'),
(397, 'add-fiberproduct', 'Add Fiber Product', 'Inventory Management', NULL, 1, 'web', 'Y', '2023-07-24 18:47:55', '2023-07-24 18:47:55'),
(398, 'fiber', 'Fiber Stock', 'Inventory Management', NULL, 1, 'web', 'Y', '2023-07-24 21:36:44', '2023-07-24 21:36:44'),
(399, 'proepsect', 'Proepsect', 'Lead Management', NULL, 1, 'web', 'Y', '2023-08-18 23:56:34', '2023-08-18 23:56:34'),
(400, 'followup', 'Followup', 'Lead Management', NULL, 1, 'web', 'Y', '2023-08-19 00:14:29', '2023-08-19 00:14:29'),
(401, 'intrested', 'Intrested', 'Lead Management', NULL, 1, 'web', 'Y', '2023-08-19 00:23:31', '2023-08-19 00:23:31'),
(402, 'notinterested', 'Notinterested', 'Lead Management', NULL, 1, 'web', 'Y', '2023-08-19 00:26:06', '2023-08-19 00:26:06'),
(403, 'competator', 'Competator', 'Lead Management', NULL, 1, 'web', 'Y', '2023-08-19 00:32:19', '2023-08-19 00:32:19'),
(404, 'ippool', 'Ippool', 'Control Panel', NULL, 1, 'web', 'Y', '2023-08-19 00:47:45', '2023-08-19 00:47:45'),
(405, 'subdistributors', 'subdistributors', 'Administration', NULL, 1, 'web', 'Y', '2024-03-03 19:36:11', '2024-03-05 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_copy`
--

CREATE TABLE `permissions_copy` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sub_category` tinyint(4) DEFAULT '0',
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prospect`
--

CREATE TABLE `prospect` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mob` bigint(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(222) DEFAULT NULL,
  `intercompany` varchar(145) DEFAULT NULL,
  `cablecompany` varchar(200) DEFAULT NULL,
  `status` varchar(99) DEFAULT NULL,
  `followdt` datetime DEFAULT NULL,
  `followtime` time DEFAULT NULL,
  `active` varchar(2) DEFAULT NULL,
  `service` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospect`
--

INSERT INTO `prospect` (`id`, `name`, `mob`, `address`, `branch`, `intercompany`, `cablecompany`, `status`, `followdt`, `followtime`, `active`, `service`, `created_at`, `updated_at`) VALUES
(1, 'Chandu', 6300447802, 'LR colony 1st line', 'IPD COLONY', NULL, 'SITI CABLE', 'Intrested', NULL, NULL, 'Y', NULL, '2023-09-10 01:08:07', '2023-09-10 01:40:11'),
(2, 'Pradeep', 6304085126, 'Lakshmi nagar', 'Gorantla Village', 'ACT', NULL, 'Not-Intrested', NULL, NULL, 'Y', NULL, '2023-11-11 02:23:52', '2023-11-21 02:16:02'),
(3, 'Manoj', 7989415184, 'Lakshmi nagar', 'Gorantla Village', NULL, NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-11-11 02:24:49', '2023-11-11 02:24:49'),
(4, 'Koteswara Rao', 9494742582, 'Lakshmi nagar', 'Gorantla Village', NULL, 'unconnected user', 'Intrested', NULL, NULL, 'Y', NULL, '2023-11-11 02:28:43', '2023-12-17 23:18:34'),
(5, 'N.Ranjith Kumar', 9160260331, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Willing', NULL, NULL, 'Y', NULL, '2023-11-11 02:30:13', '2023-11-11 02:30:13'),
(6, 'Prakash', 7288002018, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-12 17:51:07', '2023-11-12 17:51:07'),
(7, 'Nagul meera', 9966704062, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-13 01:40:06', '2023-11-13 01:40:06'),
(8, 'Ramu', 9908643981, 'Lakshmi nagar', 'Gorantla Village', 'ACT', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-11-13 01:40:43', '2023-11-13 01:40:43'),
(9, 'Naveen', 8688964327, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-13 01:41:59', '2023-11-13 01:41:59'),
(10, 'Praneeth', 9490311293, 'Lakshmi nagar', 'Gorantla Village', 'ACT', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-13 01:42:53', '2023-11-13 01:42:53'),
(11, 'Anil', 9550905623, 'Lakshmi nagar', 'Gorantla Village', 'ACT', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-11-13 01:43:29', '2023-11-13 01:43:29'),
(12, 'Rajesh', 8554056789, 'Lakshmi nagar', 'Gorantla Village', 'ACT', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-15 00:01:59', '2023-11-15 00:01:59'),
(13, 'L.Rajashekhar', 7207002992, 'Lakshmi nagar', 'Gorantla Village', NULL, 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-15 00:03:14', '2023-11-15 00:03:14'),
(14, 'Sk.ibrahim', 6302001403, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-15 00:04:01', '2023-11-15 00:04:01'),
(15, 'Viswanadh', 7396551999, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-17 01:03:07', '2023-11-17 01:03:07'),
(16, 'Ch.Ranga', 9397603634, 'Lakshmi nagar', 'Gorantla Village', 'Local Internet', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-17 01:04:01', '2023-11-17 01:04:01'),
(17, 'Anil', 9912571236, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-17 01:04:40', '2023-11-17 01:04:40'),
(18, 'Rafi', 6281686227, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-17 01:05:22', '2023-11-17 01:05:22'),
(19, 'Murthy', 9440368583, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-17 01:06:08', '2023-11-17 01:06:08'),
(20, 'SK. Jaleel', 9491897949, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-17 01:06:45', '2023-11-17 01:06:45'),
(21, 'S.Raju', 7816092862, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-11-18 02:45:59', '2023-11-18 02:45:59'),
(22, 'Israel', 9542182632, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-18 02:46:55', '2023-11-18 02:46:55'),
(23, 'M. Chandra shekhar', 9603208792, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-11-19 18:24:23', '2023-11-19 18:24:23'),
(24, 'Balaraju', 8099805412, 'NextGen school area', 'Gorantla Village', 'ACT', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-21 01:06:29', '2023-11-21 01:06:29'),
(25, 'Narasimharao', 9133620309, 'Lakshmi nagar', 'Gorantla Village', 'ACT', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-21 01:07:33', '2023-11-21 01:07:33'),
(26, 'Fayaz', 9885360989, 'Lam', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-21 01:08:21', '2023-11-21 01:08:21'),
(27, 'Gopi', 9010011262, 'Lakshmi nagar', 'Gorantla Village', 'ACT', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-21 01:09:29', '2023-11-21 01:09:29'),
(28, 'Mastan', 9059626259, 'Sarada colony', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-21 01:10:15', '2023-11-21 01:10:15'),
(29, 'V.S.Kumar', 9849375051, 'Lakshmi nagar', 'Gorantla Village', 'ACT', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-24 21:55:47', '2023-11-24 21:55:47'),
(30, 'V.S.kumar', 9849375051, 'Lakshmi nagar', 'Gorantla Village', NULL, NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-11-27 23:15:07', '2023-11-27 23:15:07'),
(31, 'Pramodh', 9441902764, 'Lakshmi Nagar', 'Gorantla Village', 'ACT', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-27 23:16:27', '2023-11-27 23:16:27'),
(32, 'Rakesh', 9866912005, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-11-27 23:17:17', '2023-11-27 23:17:17'),
(33, 'Tej', 7700023628, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-11-27 23:17:58', '2023-11-27 23:17:58'),
(34, 'K. Prasad', 9398627724, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:09:57', '2023-12-04 01:09:57'),
(35, 'Hanumanth Rao', 7013029553, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:11:10', '2023-12-04 01:11:10'),
(36, 'Koteswara Rao', 9640638769, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:12:19', '2023-12-04 01:12:19'),
(37, 'Naresh', 6300118584, 'Lakshmi Nagar', 'Gorantla Village', 'ACT', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:13:19', '2023-12-04 01:13:19'),
(38, 'M. Subbarao', 8074458009, 'Lakshmi Nagar', 'Gorantla Village', NULL, 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:14:13', '2023-12-04 01:14:13'),
(39, 'A.Srinivasarao', 8555982355, 'Mother Teresa colony inner ring road', 'Gorantla Village', 'unconnected user', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:15:55', '2023-12-04 01:15:55'),
(40, 'Nagaraju', 9059086377, 'Lakshmi Nagar', 'Gorantla Village', 'ACT', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:16:45', '2023-12-04 01:16:45'),
(41, 'Siroz', 9030520400, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:17:38', '2023-12-04 01:17:38'),
(42, 'A. Pawan', 8464892637, 'Lakshmi Nagar.thurpu bazaar', 'Gorantla Village', 'unconnected user', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-04 01:18:52', '2023-12-04 01:18:52'),
(43, 'Swapna', 8977422661, 'gorantla', 'Gorantla Village', NULL, NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-12-17 23:11:46', '2023-12-17 23:11:46'),
(44, 'mehabbi', 9326542960, 'gorantla', 'IPD COLONY', NULL, NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-12-17 23:23:56', '2023-12-17 23:23:56'),
(45, 'Prasanth', 9666067562, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-18 00:04:35', '2023-12-18 00:04:35'),
(46, 'J. Rambabu', 8885123744, 'Chuttugunta', 'Gorantla Village', 'unconnected user', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-18 00:05:37', '2023-12-18 00:05:37'),
(47, 'Vemula venkateswarao', 9052636428, 'Lakshmi Nagar', 'Gorantla Village', 'ACT', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-18 00:06:22', '2023-12-18 00:06:22'),
(48, 'Nagamani', 8152697979, 'Guntur', 'IPD COLONY', 'ACT', NULL, 'Willing', NULL, NULL, 'Y', NULL, '2023-12-19 19:11:22', '2023-12-19 19:11:22'),
(49, 'prasad', 8885638989, 'Koritepadu', 'IPD COLONY', 'unconnected user', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-12-19 19:12:22', '2023-12-19 19:12:22'),
(50, 'Manideep', 9848798175, 'Lakshmi Nagar', 'Gorantla Village', 'ACT', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-28 01:18:53', '2023-12-28 01:18:53'),
(51, 'Balaram', 9959085103, 'Lakshmi nagar', 'Gorantla Village', 'unconnected user', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-28 01:21:34', '2023-12-28 01:21:34'),
(52, 'M.Vaasu', 9949140529, 'Lakshmi Nagar', 'Gorantla Village', 'ACT', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-28 01:22:07', '2023-12-28 01:22:07'),
(53, 'Anil', 9133491920, 'Lakshmi Nagar', 'Gorantla Village', 'ACT', 'unconnected user', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-28 01:22:54', '2023-12-28 01:22:54'),
(54, 'Dayakar', 8106672927, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-28 01:23:55', '2023-12-28 01:23:55'),
(55, 'Hari Babu', 8500586302, 'Sampath Nagar', 'Gorantla Village', 'unconnected user', 'SITI CABLE', 'Followup', NULL, NULL, 'Y', NULL, '2023-12-28 01:24:36', '2023-12-28 01:24:36'),
(56, 'Vamsi', 9494846679, 'Lakshmi Nagar', 'Gorantla Village', 'unconnected user', NULL, 'Followup', NULL, NULL, 'Y', NULL, '2023-12-28 01:25:06', '2023-12-28 01:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', 'Y', '2019-05-24 13:43:38', '2019-05-25 05:57:19'),
(2, 'employee', 'web', 'D', '2019-05-24 14:07:39', '2023-01-02 02:46:34'),
(3, 'customercare', 'web', 'D', '2019-05-24 14:07:54', '2023-03-04 18:29:09'),
(4, 'customer', 'web', 'Y', '2019-05-25 08:53:05', '2019-06-02 08:47:43'),
(7, 'franchise', 'web', 'Y', '2019-06-08 04:30:52', '2019-06-08 04:30:52'),
(8, 'distributor', 'web', 'Y', '2019-06-08 05:30:39', '2019-06-08 05:30:39'),
(9, 'branch', 'web', 'Y', '2019-06-08 07:48:57', '2021-03-03 18:04:02'),
(10, 'rtr', 'web', 'D', '2020-07-03 05:28:34', '2023-03-04 18:28:47'),
(11, 'Area Tech Incharge', 'web', 'Y', '2020-10-20 19:50:48', '2023-01-02 02:53:27'),
(12, 'Inbound CC', 'web', 'Y', '2020-10-20 22:27:01', '2020-10-20 22:27:01'),
(13, 'HR', 'web', 'Y', '2023-07-14 18:10:59', '2023-07-14 18:10:59'),
(14, 'Inventory Manager', 'web', 'Y', '2023-07-14 20:52:25', '2023-07-14 20:52:25'),
(15, 'Sales Manager', 'web', 'Y', '2023-09-07 21:29:24', '2023-09-07 21:29:24'),
(16, 'Sales Executive', 'web', 'Y', '2023-11-11 02:14:36', '2023-11-11 02:14:36'),
(17, 'subdistributor', 'web', 'Y', '2024-03-01 18:30:00', '2024-03-04 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 7),
(3, 11),
(4, 1),
(4, 7),
(4, 9),
(4, 11),
(5, 1),
(5, 7),
(5, 9),
(5, 11),
(6, 1),
(6, 7),
(6, 9),
(6, 11),
(7, 1),
(8, 1),
(9, 1),
(9, 13),
(10, 1),
(11, 1),
(12, 1),
(12, 11),
(13, 1),
(13, 11),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(24, 15),
(25, 1),
(26, 1),
(27, 1),
(27, 9),
(28, 1),
(29, 1),
(30, 1),
(30, 15),
(30, 16),
(31, 1),
(32, 1),
(32, 11),
(33, 1),
(33, 11),
(34, 1),
(34, 11),
(35, 1),
(35, 11),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(39, 12),
(40, 1),
(40, 12),
(41, 12),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(58, 1),
(58, 11),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(65, 13),
(66, 1),
(66, 13),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(127, 1),
(127, 11),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(214, 15),
(215, 1),
(215, 15),
(216, 1),
(216, 15),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(226, 11),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(233, 1),
(234, 1),
(235, 1),
(236, 1),
(237, 1),
(238, 1),
(239, 1),
(240, 1),
(240, 7),
(240, 9),
(240, 11),
(241, 1),
(241, 7),
(241, 9),
(241, 11),
(242, 1),
(243, 1),
(243, 7),
(243, 9),
(243, 11),
(244, 1),
(244, 7),
(244, 9),
(244, 11),
(245, 1),
(246, 1),
(246, 7),
(246, 9),
(246, 11),
(247, 1),
(247, 7),
(247, 9),
(247, 11),
(248, 1),
(249, 1),
(250, 1),
(250, 7),
(250, 9),
(250, 11),
(251, 1),
(251, 7),
(251, 9),
(251, 11),
(252, 1),
(253, 1),
(254, 1),
(255, 1),
(256, 1),
(257, 1),
(258, 1),
(259, 1),
(260, 1),
(261, 1),
(262, 1),
(263, 1),
(264, 1),
(264, 11),
(264, 14),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(268, 14),
(269, 1),
(269, 14),
(270, 1),
(270, 14),
(271, 1),
(271, 14),
(272, 1),
(272, 14),
(273, 1),
(274, 1),
(275, 1),
(276, 1),
(277, 1),
(278, 1),
(279, 1),
(280, 1),
(281, 1),
(282, 1),
(282, 7),
(282, 9),
(282, 11),
(283, 1),
(284, 1),
(285, 1),
(286, 1),
(287, 1),
(288, 1),
(289, 1),
(290, 1),
(290, 11),
(291, 1),
(291, 11),
(292, 1),
(292, 11),
(293, 1),
(294, 1),
(295, 1),
(296, 1),
(298, 1),
(299, 1),
(300, 1),
(301, 1),
(301, 14),
(302, 1),
(303, 1),
(304, 1),
(305, 1),
(305, 14),
(306, 1),
(306, 14),
(307, 1),
(308, 1),
(308, 14),
(309, 1),
(309, 14),
(310, 1),
(310, 14),
(311, 1),
(311, 14),
(312, 1),
(312, 14),
(313, 1),
(313, 14),
(314, 1),
(315, 1),
(316, 1),
(317, 1),
(318, 1),
(319, 1),
(320, 1),
(321, 1),
(322, 1),
(323, 1),
(324, 1),
(324, 11),
(325, 1),
(326, 1),
(326, 11),
(327, 1),
(327, 11),
(328, 1),
(329, 1),
(329, 11),
(330, 1),
(330, 11),
(331, 1),
(332, 1),
(332, 11),
(333, 1),
(333, 11),
(334, 1),
(335, 1),
(335, 11),
(336, 1),
(337, 1),
(338, 1),
(339, 1),
(340, 1),
(341, 1),
(342, 1),
(343, 1),
(344, 1),
(345, 1),
(346, 1),
(347, 1),
(348, 1),
(349, 1),
(350, 1),
(351, 1),
(352, 1),
(353, 1),
(354, 1),
(355, 1),
(356, 1),
(357, 1),
(358, 1),
(358, 11),
(359, 1),
(360, 1),
(361, 1),
(362, 1),
(363, 1),
(364, 1),
(365, 1),
(366, 1),
(367, 1),
(368, 1),
(369, 1),
(369, 11),
(370, 1),
(370, 11),
(371, 1),
(371, 11),
(372, 1),
(372, 11),
(373, 1),
(373, 11),
(374, 1),
(375, 1),
(376, 1),
(377, 1),
(378, 1),
(379, 1),
(380, 1),
(381, 1),
(382, 1),
(383, 1),
(384, 1),
(385, 1),
(386, 1),
(386, 11),
(387, 1),
(388, 1),
(389, 1),
(390, 1),
(397, 1),
(398, 1),
(398, 14),
(399, 1),
(399, 15),
(399, 16),
(400, 1),
(400, 15),
(400, 16),
(401, 1),
(401, 15),
(402, 1),
(402, 15),
(403, 1),
(403, 15),
(404, 1),
(405, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions_copy`
--

CREATE TABLE `role_has_permissions_copy` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slj_bankaccounts`
--

CREATE TABLE `slj_bankaccounts` (
  `id` int(11) NOT NULL,
  `name` varchar(105) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `branch` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slj_branches`
--

CREATE TABLE `slj_branches` (
  `id` int(11) NOT NULL,
  `branch_id` varchar(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `subdistributor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `long_lat` varchar(255) DEFAULT NULL,
  `rent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `credited_balance` float DEFAULT '0',
  `debited_balance` float DEFAULT '0',
  `available_balance` float DEFAULT '0',
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_branches`
--

INSERT INTO `slj_branches` (`id`, `branch_id`, `branch_name`, `city`, `distributor_id`, `subdistributor_id`, `user_id`, `office_address`, `long_lat`, `rent`, `created_at`, `updated_at`, `credited_balance`, `debited_balance`, `available_balance`, `status`) VALUES
(9, 'SLJBR00008', 'IPD COLONY', 1, 5, 0, 318, 'IPD Colony', '16.3122746,80.4346877', '2500', '2023-01-21 18:29:23', '2023-01-21 18:29:23', 0, 0, 0, 1),
(10, 'SLJBR00009', 'ANNAPURNA NAGAR', 1, 6, 0, 342, 'Annapurna Nagar West', '16.335828168479523, 80.43873690068722', '4000', '2023-10-15 12:45:11', '2023-10-16 01:15:11', 0, 0, 0, 1),
(11, 'SLJBR00010', 'Gorantla Village', 1, 6, 0, 351, 'Opp: old SBI bank Building, Gorantla Village,', '16.3014,80.4571', '3000', '2023-11-11 00:39:26', '2023-11-11 00:39:26', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slj_broadband_packages`
--

CREATE TABLE `slj_broadband_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `download_speed` varchar(255) NOT NULL,
  `upload_speed` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `package_data_type` varchar(255) NOT NULL,
  `fup_limit` varchar(255) DEFAULT NULL,
  `fup_calculation_type` varchar(255) DEFAULT NULL,
  `fallback_plan` int(11) DEFAULT NULL,
  `carry_remaining_data` varchar(255) DEFAULT NULL,
  `split_fup` varchar(255) DEFAULT NULL,
  `limit_online_time` varchar(255) DEFAULT NULL,
  `online_time_perday` varchar(255) DEFAULT NULL,
  `billing_type` varchar(255) DEFAULT NULL,
  `billing_mode` varchar(255) DEFAULT NULL,
  `self_care_portal` varchar(255) DEFAULT NULL,
  `service_tax` varchar(255) DEFAULT NULL,
  `service_tax_type` varchar(255) DEFAULT NULL,
  `expiry_date_change_mode` varchar(255) DEFAULT NULL,
  `enable_brust` varchar(255) DEFAULT NULL,
  `brust_download` varchar(255) DEFAULT NULL,
  `brust_upload` varchar(255) DEFAULT NULL,
  `brust_threshold_download` varchar(255) DEFAULT NULL,
  `burst_threshold_upload` varchar(255) DEFAULT NULL,
  `brust_download_time` varchar(255) DEFAULT NULL,
  `brust_upload_time` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `custom_attributes` varchar(255) DEFAULT NULL,
  `your_comments` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_broadband_packages`
--

INSERT INTO `slj_broadband_packages` (`id`, `package_name`, `download_speed`, `upload_speed`, `package_type`, `package_data_type`, `fup_limit`, `fup_calculation_type`, `fallback_plan`, `carry_remaining_data`, `split_fup`, `limit_online_time`, `online_time_perday`, `billing_type`, `billing_mode`, `self_care_portal`, `service_tax`, `service_tax_type`, `expiry_date_change_mode`, `enable_brust`, `brust_download`, `brust_upload`, `brust_threshold_download`, `burst_threshold_upload`, `brust_download_time`, `brust_upload_time`, `priority`, `custom_attributes`, `your_comments`, `status`, `created_at`, `updated_at`) VALUES
(5, 'SLJ Starter Infinity', '5120', '5120', 'base plan', 'unlimited', NULL, NULL, 1, 'on', '1', 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', 'inclusive', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-08-12 13:04:13', '2019-07-16 20:37:51'),
(6, 'SLJ Home', '30720', '30720', 'base plan', 'fup', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', 'inclusive', '1', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdadsad', 'Y', '2019-08-12 13:04:18', '2019-08-06 08:13:59'),
(11, 'SLJ Starter', '102400', '102400', 'base plan', 'fup', '153600', '1', 10, 'off', 'monthly', 'off', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-08-12 13:04:27', '2019-08-07 07:22:24'),
(12, 'SLJ Basic', '51200', '51200', 'fall back plan', 'fup', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', 'exclusive', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-10 20:13:54', '2019-11-10 20:13:54'),
(13, 'SLJ Superior', '102400', '102400', 'fall back plan', 'fup', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-10 20:26:05', '2019-11-10 20:26:05'),
(14, 'SLJ Standard', '51200', '51200', 'base plan', 'fup', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-10 23:47:53', '2019-11-10 23:47:53'),
(15, 'SLJ Rapid', '102400', '102400', 'base plan', 'fup', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-10 23:57:40', '2019-11-10 23:57:40'),
(16, 'SLJ Premium Infinity', '20480', '20480', 'base plan', 'unlimited', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-11 00:06:45', '2019-11-11 00:06:45'),
(17, 'SLJ Thunder', '102400', '102400', 'base plan', 'fup', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-11 00:18:36', '2019-11-11 00:18:36'),
(18, 'SLJ Rapid Infinity', '10240', '10240', 'base plan', 'unlimited', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-13 23:38:16', '2019-11-13 23:38:16'),
(19, 'SLJ Premium Infinity', '15360', '15360', 'base plan', 'unlimited', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-14 01:44:26', '2019-11-14 01:44:26'),
(20, 'SLJ Thunder Infinity', '25600', '25600', 'base plan', 'unlimited', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'prepaid', 'broadband prepaid', 'active', 'active', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2019-11-14 02:18:06', '2019-11-14 02:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `slj_broadband_subpackages`
--

CREATE TABLE `slj_broadband_subpackages` (
  `id` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `sub_plan_name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `time_unit` varchar(50) NOT NULL,
  `package_selection` varchar(20) DEFAULT NULL,
  `distributor_share` float DEFAULT '0',
  `franchise_share` float DEFAULT '0',
  `short_description` varchar(1000) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_broadband_subpackages`
--

INSERT INTO `slj_broadband_subpackages` (`id`, `package`, `sub_plan_name`, `price`, `gst`, `total`, `unit_type`, `time_unit`, `package_selection`, `distributor_share`, `franchise_share`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'SLJ Starter Infinity Monthly', '400', '18', '472', 'day', '30', 'renew', 20, 160, NULL, 'Y', '2019-11-10 07:33:06', '2019-11-10 20:03:06'),
(2, 6, 'SLJ Home Monthly', '500', '18', '590', 'day', '30', 'renew', 20, 200, NULL, 'Y', '2019-11-10 07:24:51', '2019-11-10 19:54:51'),
(3, 5, 'SLJ Starter Infinity Quartely', '1200', '18', '1416', 'day', '90', 'renew', 60, 480, NULL, 'Y', '2019-11-10 07:33:36', '2019-11-10 20:03:36'),
(4, 5, 'SLJ Starter Infinity Half Yearly + One Month Free', '2400', '18', '2832', 'day', '210', 'both', 100, 800, NULL, 'Y', '2019-11-10 07:35:53', '2019-11-10 20:05:53'),
(8, 5, 'SLJ Starter Infinity Yearly + Two Months Free', '4800', '18', '5664', 'day', '420', 'both', 200, 1600, NULL, 'Y', '2019-11-10 07:36:46', '2019-11-10 20:06:46'),
(9, 11, 'SLJ Starter Monthly', '449', '18', '530', 'day', '30', 'renew', 20, 180, NULL, 'Y', '2019-11-10 13:11:57', '2019-11-11 01:41:57'),
(10, 11, 'SLJ Starter Quarterly', '1347', '18', '1590', 'day', '90', 'renew', 60, 540, NULL, 'Y', '2019-11-10 13:12:16', '2019-11-11 01:42:16'),
(11, 11, 'SLJ Starter Half-Yearly + One Month Free', '2694', '18', '3179', 'day', '210', 'both', 100, 900, NULL, 'Y', '2019-11-10 13:12:38', '2019-11-11 01:42:38'),
(12, 11, 'SLJ Starter Yearly + Two Months Free', '5388', '18', '6358', 'day', '420', 'both', 200, 1800, NULL, 'Y', '2019-11-10 13:12:53', '2019-11-11 01:42:53'),
(13, 6, 'SLJ Home Quarterly', '1500', '18', '1770', 'day', '90', 'both', 60, 600, NULL, 'Y', '2019-11-10 07:25:28', '2019-11-10 19:55:28'),
(14, 6, 'SLJ Home Half-Yearly + One Month Free', '3000', '18', '3540', 'day', '210', 'both', 100, 1000, NULL, 'Y', '2019-11-10 07:25:55', '2019-11-10 19:55:55'),
(15, 6, 'SLJ Home Yearly + Two Months Free', '6000', '18', '7080', 'day', '420', 'both', 200, 2000, NULL, 'Y', '2019-11-10 07:26:27', '2019-11-10 19:56:27'),
(16, 12, 'SLJ Basic Monthly', '549', '18', '648', 'day', '30', 'renew', 20, 219, NULL, 'Y', '2019-11-10 13:13:54', '2019-11-11 01:43:54'),
(17, 12, 'SLJ Basic Quarterly', '1647', '18', '1944', 'day', '120', 'both', 60, 658, NULL, 'Y', '2019-11-10 13:14:11', '2019-11-11 01:44:11'),
(18, 12, 'SLJ Basic Half-Yearly + One Month Free', '3294', '18', '3887', 'day', '210', 'both', 100, 1098, NULL, 'Y', '2019-11-10 13:14:24', '2019-11-11 01:44:24'),
(19, 12, 'SLJ Basic Yearly + Two Months', '6588', '18', '7774', 'day', '420', 'both', 200, 2196, NULL, 'Y', '2019-11-10 13:14:36', '2019-11-11 01:44:36'),
(20, 13, 'SLJ Superior Monthly', '549', '18', '648', 'day', '30', 'renew', 20, 219, NULL, 'Y', '2019-11-10 13:17:46', '2019-11-11 01:47:46'),
(21, 13, 'SLJ Superior Quarterly', '1647', '18', '1944', 'day', '90', 'both', 60, 658, NULL, 'Y', '2019-11-10 13:17:57', '2019-11-11 01:47:57'),
(22, 13, 'SLJ Superior Half-Yearly + One Month Free', '3294', '18', '3887', 'day', '210', 'both', 100, 1098, NULL, 'Y', '2019-11-10 13:18:09', '2019-11-11 01:48:09'),
(23, 13, 'SLJ Superior Yearly + Two Months Free', '6588', '18', '7774', 'day', '420', 'both', 200, 2196, NULL, 'Y', '2019-11-10 13:18:20', '2019-11-11 01:48:20'),
(24, 14, 'SLJ Standard Monthly', '699', '18', '825', 'day', '30', 'renew', 20, 279, NULL, 'Y', '2019-11-10 23:50:03', '2019-11-10 23:50:03'),
(25, 14, 'SLJ Standard Quarterly', '2097', '18', '2475', 'day', '90', 'both', 60, 838, NULL, 'Y', '2019-11-10 23:52:01', '2019-11-10 23:52:01'),
(26, 14, 'SLJ Standrd Half-Yearly + One Month Free', '4194', '18', '4949', 'day', '210', 'both', 100, 1398, NULL, 'Y', '2019-11-10 13:16:32', '2019-11-11 01:46:32'),
(27, 14, 'SLJ Standard Yearly + 2months Free', '8388', '18', '9898', 'day', '420', 'both', 200, 2796, NULL, 'Y', '2019-11-10 23:55:14', '2019-11-10 23:55:14'),
(28, 15, 'SLJ Rapid Monthly', '1099', '18', '1297', 'day', '30', 'renew', 20, 439, NULL, 'Y', '2019-11-10 11:31:23', '2019-11-11 00:01:23'),
(29, 15, 'SLJ Rapid Quarterly', '3297', '18', '3891', 'day', '90', 'both', 60, 1318, NULL, 'Y', '2019-11-11 00:01:06', '2019-11-11 00:01:06'),
(30, 15, 'SLJ Rapid Half-Yearly + One Month Free', '6594', '18', '7781', 'day', '210', 'both', 100, 2198, NULL, 'Y', '2019-11-11 00:02:51', '2019-11-11 00:02:51'),
(31, 15, 'SLJ Rapid Yearly + 2 Months Free', '14287', '18', '16859', 'day', '420', 'both', 200, 4396, NULL, 'Y', '2019-11-11 00:04:57', '2019-11-11 00:04:57'),
(32, 16, 'SLJ Premium Infinity Monthly', '1099', '18', '1297', 'day', '30', 'both', 20, 439, NULL, 'Y', '2019-11-11 00:11:14', '2019-11-11 00:11:14'),
(33, 16, 'SLJ Premium Infinity Quarterly', '3297', '18', '3891', 'day', '90', 'both', 60, 1318, NULL, 'Y', '2019-11-11 00:12:47', '2019-11-11 00:12:47'),
(34, 16, 'SLJ Premium Infinity Half-Yearly + One Month Free', '6594', '18', '7781', 'day', '210', 'both', 100, 2198, NULL, 'Y', '2019-11-11 00:15:21', '2019-11-11 00:15:21'),
(35, 16, 'SLJ Premium Infinity Yearly + 2 Months', '13188', '18', '15562', 'day', '420', 'both', 200, 4396, NULL, 'Y', '2019-11-11 00:16:43', '2019-11-11 00:16:43'),
(36, 17, 'SLJ Thunder Monthly', '1499', '18', '1769', 'day', '30', 'renew', 20, 599, NULL, 'Y', '2019-11-10 11:51:45', '2019-11-11 00:21:45'),
(37, 17, 'SLJ Thunder Quarterly', '4497', '18', '5307', 'day', '90', 'both', 60, 1798, NULL, 'Y', '2019-11-11 00:21:31', '2019-11-11 00:21:31'),
(38, 17, 'SLJ Thunder Half-Yearly + One Month Free', '8994', '18', '10613', 'day', '210', 'both', 100, 2998, NULL, 'Y', '2019-11-11 00:23:24', '2019-11-11 00:23:24'),
(39, 17, 'SLJ Thunder Yearly + Two Months Free', '17988', '18', '21226', 'day', '420', 'both', 200, 5996, NULL, 'Y', '2019-11-11 00:25:39', '2019-11-11 00:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `slj_cable_packages`
--

CREATE TABLE `slj_cable_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `channels_description` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `gst` varchar(10) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `status` varchar(1) DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `distributor_share` float DEFAULT NULL,
  `franchise_share` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_cable_packages`
--

INSERT INTO `slj_cable_packages` (`id`, `package_name`, `channels_description`, `type`, `price`, `gst`, `total_amount`, `status`, `created_at`, `updated_at`, `distributor_share`, `franchise_share`) VALUES
(1, 'MAA TV', 'MAA TV', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:22:00', '2019-09-20 19:52:00', NULL, 1.9),
(2, 'ETV', 'ETV', 'allacart', '17', '18', '20.06', 'Y', '2019-09-20 07:05:35', '2019-09-20 19:35:35', NULL, 1.7),
(4, 'GEMINI TV', 'GEMINI TV', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:11:25', '2019-09-20 19:41:25', NULL, 1.9),
(5, 'ZEE TELUGU', 'ZEE TELUGU', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:40:15', '2019-09-20 19:10:15', NULL, 1.9),
(6, 'MAA MOVIES', 'MAA MOVIES', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 07:21:05', '2019-09-20 19:51:05', NULL, 1),
(7, 'ETV CINEMA', 'ETV CINEMA', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:07:58', '2019-09-20 19:37:58', NULL, 0.6),
(8, 'GEMINI MOVIES', 'GEMINI MOVIES', 'allacart', '17', '18', '20.06', 'Y', '2019-09-20 07:10:39', '2019-09-20 19:40:39', NULL, 1.7),
(9, 'ZEE CINEMALU', 'ZEE CINEMALU', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 06:28:19', '2019-09-20 18:58:19', NULL, 0.1),
(10, 'MAA GOLD', 'MAA GOLD', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:20:55', '2019-09-20 19:50:55', NULL, 0.2),
(11, 'ETV PLUS', 'ETV PLUS', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 07:08:18', '2019-09-20 19:38:18', NULL, 0.7),
(12, 'GEMINI COMEDY', 'GEMINI COMEDY', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:10:22', '2019-09-20 19:40:22', NULL, 0.5),
(13, 'ETV LIFE', 'ETV LIFE', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:08:07', '2019-09-20 19:38:07', NULL, 0.1),
(14, 'ETV ABHIRUCHI', 'ETV ABHIRUCHI', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:07:37', '2019-09-20 19:37:37', NULL, 0.2),
(15, 'GEMINI LIFE', 'GEMINI LIFE', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:10:30', '2019-09-20 19:40:30', NULL, 0.5),
(16, 'MAA MUSIC', 'MAA MUSIC', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:21:36', '2019-09-20 19:51:36', NULL, 0.1),
(17, 'GEMINI MUSIC', 'GEMINI MUSIC', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 07:10:59', '2019-09-20 19:40:59', NULL, 0.4),
(18, 'KUSHI TV', 'KUSHI TV', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 07:20:35', '2019-09-20 19:50:35', NULL, 0.4),
(19, 'VISSA TV', 'VISSA TV', 'allacart', '0.5', '18', '0.59', 'Y', '2019-09-20 06:46:21', '2019-09-20 19:16:21', NULL, 0.05),
(20, 'STAR PLUS', 'STAR PLUS', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:21:32', '2019-09-20 20:51:32', NULL, 1.9),
(24, 'Telugu Base Pack', 'All Telugu Base Channels', 'base', '130', '18', '153.4', 'Y', '2019-08-06 19:05:54', '2019-08-07 07:35:54', 20, 100),
(25, 'BOLLYWOOD HITZ', 'BOLLYWOOD HITZ', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 05:46:05', '2019-09-20 18:16:05', NULL, 0.5),
(26, 'COMEDY 24/7', 'COMEDY 24/7', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:01:20', '2019-09-20 19:31:20', NULL, 0.5),
(27, 'HARIOM TV', 'HARIOM TV', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:11:16', '2019-09-20 19:41:16', NULL, 0.5),
(28, 'IBADAAT TV', 'IBADAAT TV', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:18:08', '2019-09-20 19:48:08', NULL, 0.5),
(29, 'FILIMI GAME', 'FILIMI GAME', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:08:36', '2019-09-20 19:38:36', NULL, 0.5),
(30, 'NXT HOLLYWOOD ACTION', 'NXT HOLLYWOOD ACTION', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:39:58', '2019-09-20 20:09:58', NULL, 0.5),
(31, 'NXT TOONS', 'NXT TOONS', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:54:28', '2019-09-20 20:24:28', NULL, 0.5),
(32, 'NXT RHYEMS', 'NXT RHYEMS', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:53:36', '2019-09-20 20:23:36', NULL, 0.5),
(33, 'NXT KIDS MOVIES', 'NXT KIDS MOVIES', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:53:16', '2019-09-20 20:23:16', NULL, 0.5),
(34, 'NXT SANGDEW', 'NXT SANGDEW', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:53:45', '2019-09-20 20:23:45', NULL, 0.5),
(35, 'NXT TAMIL', 'NXT TAMIL', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:54:02', '2019-09-20 20:24:02', NULL, 0.5),
(36, 'NXT TELUGU', 'NXT TELUGU', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:54:11', '2019-09-20 20:24:11', NULL, 0.5),
(37, 'NXT K-WORLD', 'NXT K-WORLD', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:42:20', '2019-09-20 20:12:20', NULL, 0.5),
(38, 'NXT SOUTH ACTION', 'NXT SOUTH ACTION', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:53:53', '2019-09-20 20:23:53', NULL, 0.5),
(39, 'NXT BENGALI', 'NXT BENGALI', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:38:29', '2019-09-20 20:08:29', NULL, 0.5),
(40, 'NXT BHOJPURI', 'NXT BHOJPURI', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:39:41', '2019-09-20 20:09:41', NULL, 0.5),
(41, 'NXT COOKING', 'NXT COOKING', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:39:50', '2019-09-20 20:09:50', NULL, 0.5),
(42, 'NXT MALAYALAM', 'NXT MALAYALAM', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:53:27', '2019-09-20 20:23:27', NULL, 0.5),
(43, 'NXT KIDDO', 'NXT KIDDO', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:42:46', '2019-09-20 20:12:46', NULL, 0.5),
(44, 'COLORS', 'COLORS', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 05:47:50', '2019-09-20 18:17:50', NULL, 1.9),
(45, 'SAB TV', 'SAB TV', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:58:36', '2019-09-20 20:28:36', NULL, 1.9),
(46, 'SONY PAL', 'SONY PAL', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 08:02:05', '2019-09-20 20:32:05', NULL, 0.1),
(47, 'JEET', 'JEET', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:20:07', '2019-09-20 19:50:07', NULL, 0.1),
(48, '& TV', '& TV', 'allacart', '12', '18', '14.16', 'Y', '2019-09-20 05:39:12', '2019-09-20 18:09:12', NULL, 1.2),
(49, 'ZEE TV', 'ZEE TV', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:40:31', '2019-09-20 19:10:31', NULL, 1.9),
(50, 'STAR UTSAV', 'STAR UTSAV', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 09:59:45', '2019-09-20 22:29:45', NULL, 0.1),
(51, 'RISHTEY', 'RISHTEY', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:57:34', '2019-09-20 20:27:34', NULL, 0.1),
(52, 'ZEE ANMOL', 'ZEE ANMOL', 'allacart', '0.1', '18', '0.12', 'Y', '2019-09-20 06:49:24', '2019-09-20 19:19:24', NULL, 0.01),
(53, 'BIG MAGIC', 'BIG MAGIC', 'allacart', '0.10', '18', '0.12', 'Y', '2019-09-20 05:45:19', '2019-09-20 18:15:19', NULL, 0.01),
(54, 'ZEE BIHAR  JHARKHAND', 'ZEE BIHAR  JHARKHAND', 'allacart', '0.1', '18', '0.12', 'Y', '2019-09-20 06:51:49', '2019-09-20 19:21:49', NULL, 0.01),
(55, 'SONY MAX', 'SONY MAX', 'allacart', '15', '18', '17.7', 'Y', '2019-09-20 08:01:45', '2019-09-20 20:31:45', NULL, 1.5),
(56, 'STAR GOLD SELECT', 'STAR GOLD SELECT', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 08:19:01', '2019-09-20 20:49:01', NULL, 0.7),
(57, 'RISHTEY CINEPLEX', 'RISHTEY CINEPLEX', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:58:18', '2019-09-20 20:28:18', NULL, 0.3),
(58, 'SONY WAH', 'SONY WAH', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 08:12:53', '2019-09-20 20:42:53', NULL, 0.1),
(59, 'SONY MAX 2', 'SONY MAX 2', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 08:01:55', '2019-09-20 20:31:55', NULL, 0.1),
(60, 'STAR UTSAV MOVIES', 'STAR UTSAV MOVIES', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 10:01:57', '2019-09-20 22:31:57', NULL, 0.1),
(61, '& PICTURES', '& PICTURES', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 05:38:55', '2019-09-20 18:08:55', NULL, 0.6),
(62, 'ZEE ANMOL CINEMA', 'ZEE ANMOL CINEMA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:51:14', '2019-09-20 19:21:14', NULL, 0.1),
(63, 'ZEE BOLLYWOOD', 'ZEE BOLLYWOOD', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 06:52:03', '2019-09-20 19:22:03', NULL, 0.2),
(64, 'ZEE ACTION', 'ZEE ACTION', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:48:21', '2019-09-20 19:18:21', NULL, 0.1),
(65, 'COLORS MARATHI', 'COLORS MARATHI', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 07:00:18', '2019-09-20 19:30:18', NULL, 0.1),
(66, 'ZEE MARATHI', 'ZEE MARATHI', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:30:03', '2019-09-20 19:00:03', NULL, 1.9),
(67, 'ZEE YUVA', 'ZEE YUVA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:41:31', '2019-09-20 19:11:31', NULL, 0.1),
(68, 'SONY MARATHI', 'SONY MARATHI', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 08:01:36', '2019-09-20 20:31:36', NULL, 0.4),
(69, 'ZEE TALKIES', 'ZEE TALKIES', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 06:39:39', '2019-09-20 19:09:39', NULL, 0.2),
(70, 'NEWS18 LOKMAT', 'NEWS18 LOKMAT', 'allacart', '0.5', '18', '0.59', 'Y', '2019-09-20 07:40:53', '2019-09-20 20:10:53', NULL, 0.05),
(71, 'COLORS GUJARATI', 'COLORS GUJARATI', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 05:48:33', '2019-09-20 18:18:33', NULL, 0.5),
(72, 'CNBC BAZAAR', 'CNBC BAZAAR', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 05:46:58', '2019-09-20 18:16:58', NULL, 0.1),
(73, 'ZEE 24 KALAK', 'ZEE 24 KALAK', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:47:32', '2019-09-20 19:17:32', NULL, 0.1),
(74, 'ZEE PUNJAB HARYANA HIMACHAL', 'ZEE PUNJAB HARYANA HIMACHAL', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:38:53', '2019-09-20 19:08:53', NULL, 0.1),
(75, 'STAR JALSHA', 'STAR JALSHA', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:19:22', '2019-09-20 20:49:22', NULL, 1.9),
(76, 'SONY AATH', 'SONY AATH', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 08:00:33', '2019-09-20 20:30:33', NULL, 0.4),
(77, 'ZEE BANGLA', 'ZEE BANGLA', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:51:24', '2019-09-20 19:21:24', NULL, 1.9),
(78, 'JALSHA MOVIES', 'JALSHA MOVIES', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:18:38', '2019-09-20 19:48:38', NULL, 0.6),
(79, 'ZEE BANGLA CINEMA', 'ZEE BANGLA CINEMA', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 06:51:35', '2019-09-20 19:21:35', NULL, 0.2),
(80, 'ZEE CAFE', 'ZEE CAFE', 'allacart', '15', '18', '17.7', 'D', '2019-09-20 06:58:15', '2019-09-20 19:28:15', NULL, 1.5),
(81, 'ALANKAR', 'ALANKAR', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 05:43:19', '2019-09-20 18:13:19', NULL, 0.4),
(82, 'TARANG MUSIC', 'TARANG MUSIC', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 10:12:48', '2019-09-20 22:42:48', NULL, 0.2),
(83, 'ZEE SARTHAK', 'ZEE SARTHAK', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:39:29', '2019-09-20 19:09:29', NULL, 1.9),
(84, 'ZEE RAJASTHAN', 'ZEE RAJASTHAN', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:39:03', '2019-09-20 19:09:03', NULL, 0.1),
(85, 'BIG GANGA', 'BIG GANGA', 'allacart', '0.5', '18', '0.59', 'Y', '2019-09-20 05:44:49', '2019-09-20 18:14:49', NULL, 0.05),
(86, 'STAR WORLD', 'STAR WORLD', 'allacart', '8', '18', '9.44', 'Y', '2019-09-20 10:02:09', '2019-09-20 22:32:09', NULL, 0.8),
(87, 'COMEDY CENTRAL', 'COMEDY CENTRAL', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 07:01:33', '2019-09-20 19:31:33', NULL, 0.7),
(88, 'COLORS INFINITY', 'COLORS INFINITY', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 06:21:35', '2019-09-20 18:51:35', NULL, 0.7),
(89, 'ZEE BUSINESS', 'ZEE BUSINESS', 'allacart', '0.1', '18', '0.12', 'Y', '2019-09-20 06:59:18', '2019-09-20 19:29:18', NULL, 0.01),
(90, 'STAR MOVIES', 'STAR MOVIES', 'allacart', '12', '18', '14.16', 'Y', '2019-09-20 08:19:55', '2019-09-20 20:49:55', NULL, 1.2),
(91, 'MOVIES NOW', 'MOVIES NOW', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 07:24:01', '2019-09-20 19:54:01', NULL, 1),
(92, 'SONY PIX', 'SONY PIX', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 08:02:16', '2019-09-20 20:32:16', NULL, 1),
(93, 'ROMEDY NOW', 'ROMEDY NOW', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:58:27', '2019-09-20 20:28:27', NULL, 0.6),
(94, 'MNX', 'MNX', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:23:49', '2019-09-20 19:53:49', NULL, 0.6),
(95, '& FLIX', '& FLIX', 'allacart', '15', '18', '17.7', 'Y', '2019-09-20 05:38:28', '2019-09-20 18:08:28', NULL, 1.5),
(96, 'MTV', 'MTV', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:35:53', '2019-09-20 20:05:53', NULL, 0.3),
(97, 'VH1', 'VH1', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:45:36', '2019-09-20 19:15:36', NULL, 0.1),
(98, 'ZING', 'ZING', 'allacart', '0.2', '18', '0.24', 'Y', '2019-09-20 06:42:04', '2019-09-20 19:12:04', NULL, 0.02),
(99, 'SUVARNA', 'SUVARNA', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:05:11', '2019-09-20 22:35:11', NULL, 1.9),
(100, 'COLORS KANNADA', 'COLORS KANNADA', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:27:50', '2019-09-20 18:57:50', NULL, 1.9),
(101, 'SUVARNA PLUS', 'SUVARNA PLUS', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 10:12:36', '2019-09-20 22:42:36', NULL, 0.5),
(102, 'UDAYA TV', 'UDAY TV', 'allacart', '17', '18', '20.06', 'Y', '2019-09-20 06:45:03', '2019-09-20 19:15:03', NULL, 1.7),
(103, 'UDAYA COMEDY', 'UDAY COMEDY', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 06:44:18', '2019-09-20 19:14:18', NULL, 0.6),
(104, 'ZEE KANNADA', 'ZEE KANNADA', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:29:25', '2019-09-20 18:59:25', NULL, 1.9),
(105, 'COLORS SUPER', 'COLORS SUPER', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:00:50', '2019-09-20 19:30:50', NULL, 0.3),
(106, 'COLORS KANNADA CINEMA', 'COLORS KANNADA CINEMA', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:00:06', '2019-09-20 19:30:06', NULL, 0.2),
(107, 'UDAYA MOVIES', 'UDAYA MOVIES', 'allacart', '16', '18', '18.88', 'Y', '2019-09-20 06:44:27', '2019-09-20 19:14:27', NULL, 1.6),
(108, 'RAJ MUSIX KANNADA', 'RAJ MUSIX KANNADA', 'allacart', '0.25', '18', '0.295', 'Y', '2019-09-20 07:56:59', '2019-09-20 20:26:59', NULL, 0.025),
(109, 'UDAYA MUSIC', 'UDAYA MUSIC', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 06:44:53', '2019-09-20 19:14:53', NULL, 0.6),
(110, 'CHINTU TV', 'CHINTU TV', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 05:46:25', '2019-09-20 18:16:25', NULL, 0.6),
(111, 'SUN TV', 'SUN TV', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:04:14', '2019-09-20 22:34:14', NULL, 1.9),
(112, 'VIJAY TV', 'VIJAY TV', 'allacart', '17', '18', '20.06', 'Y', '2019-09-20 06:46:10', '2019-09-20 19:16:10', NULL, 1.7),
(113, 'RAJ TV', 'RAJ TV', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:57:24', '2019-09-20 20:27:24', NULL, 0.3),
(114, 'MEGA TV', 'MEGA TV', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:23:29', '2019-09-20 19:53:29', NULL, 0.3),
(115, 'MEGA 24', 'MEGA 24', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:23:19', '2019-09-20 19:53:19', NULL, 0.1),
(116, 'VIJAY SUPER', 'VIJAY SUPER', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 06:45:50', '2019-09-20 19:15:50', NULL, 0.2),
(117, 'COLORS TAMIL', 'COLORS TAMIL', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:00:59', '2019-09-20 19:30:59', NULL, 0.3),
(118, 'ADITHYA TV', 'ADITHYA TV', 'allacart', '9', '18', '10.62', 'Y', '2019-09-20 05:43:09', '2019-09-20 18:13:09', NULL, 0.9),
(119, 'ZEE TAMIZH', 'ZEE TAMIZH', 'allacart', '12', '18', '14.16', 'Y', '2019-09-20 06:40:05', '2019-09-20 19:10:05', NULL, 1.2),
(120, 'CHUTTI TV', 'CHUTTI TV', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 05:46:33', '2019-09-20 18:16:33', NULL, 0.6),
(121, 'MEGA MUSIQ', 'MEGA MUSIQ', 'allacart', '2', '18', '2.36', 'Y', '2019-09-19 08:10:32', '2019-09-19 20:40:32', NULL, 0.2),
(122, 'KTV', 'KTV', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:20:26', '2019-09-20 19:50:26', NULL, 1.9),
(123, 'J MOVIES-SD', 'J MOVIES-SD', 'allacart', '2.25', '18', '2.655', 'Y', '2019-09-20 07:18:31', '2019-09-20 19:48:31', NULL, 0.225),
(124, 'SUN NEWS', 'SUN NEWS', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 10:03:58', '2019-09-20 22:33:58', NULL, 0.1),
(125, 'JAYA PLUS', 'JAYA PLUS', 'allacart', '0.5', '18', '0.59', 'Y', '2019-09-20 07:19:03', '2019-09-20 19:49:03', NULL, 0.05),
(126, 'RAJ DIGITAL PLUS', 'RAJ DIGITAL PLUS', 'allacart', '1.50', '18', '1.77', 'Y', '2019-09-20 07:56:46', '2019-09-20 20:26:46', NULL, 0.15),
(127, 'SUN MUSIC', 'SUN MUSIC', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 10:03:41', '2019-09-20 22:33:41', NULL, 0.6),
(128, 'JAYA MAX', 'JAYA MAX', 'allacart', '2.25', '18', '2.655', 'Y', '2019-09-20 07:18:48', '2019-09-20 19:48:48', NULL, 0.225),
(129, 'SUN LIFE', 'SUN LIFE', 'allacart', '9', '18', '10.62', 'Y', '2019-09-20 10:03:31', '2019-09-20 22:33:31', NULL, 0.9),
(130, 'DISCOVERY TAMIL', 'DISCOVERY TAMIL', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 07:02:29', '2019-09-20 19:32:29', NULL, 0.4),
(131, 'ASIANET', 'ASIANET', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 05:43:45', '2019-09-20 18:13:45', NULL, 1.9),
(132, 'ASIANET PLUS', 'ASIANET PLUS', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 05:44:03', '2019-09-20 18:14:03', NULL, 0.5),
(133, 'SURYA TV', 'SURYA TV', 'allacart', '12', '18', '14.16', 'Y', '2019-09-20 10:05:00', '2019-09-20 22:35:00', NULL, 1.2),
(134, 'SURYA COMEDY', 'SURYA COMEDY', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 10:04:25', '2019-09-20 22:34:25', NULL, 0.4),
(135, 'GEMINI PACKAGE', 'GEMINI COMEDY,GEMINI LIFE,GEMINI MOVIES,GEMINI MUSIC,GEMINI TV,KUSHI TV,MIRROR NOW', 'packages', '100', '20', '120', 'D', '2019-07-03 05:43:33', '2019-07-03 12:43:33', NULL, NULL),
(136, 'ETV ANDHRA PRADESH', 'ETV ANDHRA PRADESH', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:07:47', '2019-09-20 19:37:47', NULL, 0.1),
(137, 'ETV TELANGANA', 'ETV TELANGANA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:08:27', '2019-09-20 19:38:27', NULL, 0.1),
(138, 'ETV PACKAGE', 'ETV,ETV ABHIRUCHI,ETV ANDHRA PRADESH,ETV CINEMA,ETV LIFE,ETV PLUS,ETV TELANGANA', 'packages', '24', '18', '28.32', 'Y', '2019-06-09 10:41:42', '2019-06-09 05:11:42', NULL, NULL),
(139, 'ZEE KERALAM', 'ZEE KERALAM', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:29:41', '2019-09-20 18:59:41', NULL, 0.1),
(140, 'ZEE SALAAM', 'ZEE SALAAM', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:39:15', '2019-09-20 19:09:15', NULL, 0.1),
(141, 'SURYA MOVIES', 'SURYA MOVIES', 'allacart', '11', '18', '12.98', 'Y', '2019-09-20 10:04:36', '2019-09-20 22:34:36', NULL, 1.1),
(142, 'SURYA MUSIC', 'SURYA MUSIC', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 10:04:48', '2019-09-20 22:34:48', NULL, 0.4),
(143, 'KOCHU TV', 'KOCHU TV', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:20:15', '2019-09-20 19:50:15', NULL, 0.5),
(144, 'CNN NEWS18', 'CNN NEWS18', 'allacart', '0.50', '18', '0.59', 'Y', '2019-09-20 05:47:40', '2019-09-20 18:17:40', NULL, 0.05),
(145, 'TIMES NOW', 'TIMES NOW', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 10:15:00', '2019-09-20 22:45:00', NULL, 0.3),
(146, 'WION', 'WION', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:47:20', '2019-09-20 19:17:20', NULL, 0.1),
(147, 'ET NOW', 'ET NOW', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:05:22', '2019-09-20 19:35:22', NULL, 0.3),
(148, 'NDTV 24/7', 'NDTV 24/7', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:36:55', '2019-09-20 20:06:55', NULL, 0.3),
(149, 'NDTV PROFIT', 'NDTV PROFIT', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:37:54', '2019-09-20 20:07:54', NULL, 0.1),
(150, 'CNN INTERNATIONAL', 'CNN INTERNATIONAL', 'allacart', '0.50', '18', '0.59', 'Y', '2019-09-20 05:47:26', '2019-09-20 18:17:26', NULL, 0.05),
(151, 'MIRROR NOW', 'MIRROR NOW', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:23:38', '2019-09-20 19:53:38', NULL, 0.2),
(152, 'NEWS 18 INDIA', 'NEWS 18 INDIA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:38:19', '2019-09-20 20:08:19', NULL, 0.1),
(153, 'AAJ TAK', 'AAJ TAK', 'allacart', '0.75', '18', '0.885', 'Y', '2019-09-20 05:41:55', '2019-09-20 18:11:55', NULL, 0.075),
(154, 'ZEE NEWS', 'ZEE NEWS', 'allacart', '0.2', '18', '0.24', 'Y', '2019-09-20 06:38:34', '2019-09-20 19:08:34', NULL, 0.02),
(155, 'ZEE HINDUSTAN', 'ZEE HINDUSTAN', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:29:13', '2019-09-20 18:59:13', NULL, 0.1),
(156, 'NDTV INDIA', 'NDTV INDIA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:37:25', '2019-09-20 20:07:25', NULL, 0.1),
(157, 'CNBC AWAAZ', 'CNBC AWAAZ', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 05:46:49', '2019-09-20 18:16:49', NULL, 0.1),
(158, 'SONY SIX', 'SONY SIX', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:12:39', '2019-09-20 20:42:39', NULL, 1.9),
(159, 'STAR SPORTS 2', 'STAR SPORTS 2', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 10:00:29', '2019-09-20 22:30:29', NULL, 0.6),
(160, 'STAR SPORTS 1 HINDI', 'STAR SPORTS 1 HINDI', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:21:50', '2019-09-20 20:51:50', NULL, 1.9),
(161, 'SONY ESPN', 'SONY ESPN', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 08:00:50', '2019-09-20 20:30:50', NULL, 0.5),
(162, 'TEN2', 'TEN2', 'allacart', '15', '18', '17.7', 'Y', '2019-09-20 10:13:39', '2019-09-20 22:43:39', NULL, 1.5),
(163, 'TEN3', 'TEN3', 'allacart', '17', '18', '20.06', 'Y', '2019-09-20 10:14:05', '2019-09-20 22:44:05', NULL, 1.7),
(164, 'DSPORT', 'DSPORT', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 07:05:01', '2019-09-20 19:35:01', NULL, 0.4),
(165, 'STAR SPORTS 1 TELUGU', 'STAR SPORTS 1 TELUGU', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:00:15', '2019-09-20 22:30:15', NULL, 1.9),
(166, 'STAR SPORTS 1 TAMIL', 'STAR SPORTS 1 TAMIL', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:00:00', '2019-09-20 22:30:00', NULL, 1.9),
(167, 'STAR SPORTS 1 KANNADA', 'STAR SPORTS 1 KANNADA', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 09:59:31', '2019-09-20 22:29:31', NULL, 1.9),
(168, 'STAR SPORTS FIRST', 'STAR SPORTS FIRST', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 10:00:56', '2019-09-20 22:30:56', NULL, 0.1),
(169, 'SONY YAY', 'SONY YAY', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 08:14:16', '2019-09-20 20:44:16', NULL, 0.2),
(170, 'SONIC', 'SONIC', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 08:00:23', '2019-09-20 20:30:23', NULL, 0.2),
(171, 'NIC JR', 'NIC JR', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:37:16', '2019-09-20 20:07:16', NULL, 0.1),
(172, 'DISCOVERY KIDS', 'DISCOVERY KIDS', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:02:12', '2019-09-20 19:32:12', NULL, 0.3),
(173, 'CARTOON NETWORK', 'CARTOON NETWORK', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 05:46:14', '2019-09-20 18:16:14', NULL, 0.5),
(174, 'NGC', 'NGC', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:42:01', '2019-09-20 20:12:01', NULL, 0.2),
(175, 'FOX LIFE', 'FOX LIFE', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:09:23', '2019-09-20 19:39:23', NULL, 0.1),
(176, 'HISTORY TV 18', 'HISTORY TV 18', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:17:50', '2019-09-20 19:47:50', NULL, 0.3),
(177, 'SONY BBC EARTH', 'SONY BBC EARTH', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 08:00:42', '2019-09-20 20:30:42', NULL, 0.4),
(178, 'NAT GEO WILD', 'NAT GEO WILD', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:36:39', '2019-09-20 20:06:39', NULL, 0.1),
(179, 'DISCOVERY TURBO', 'DISCOVERY TURBO', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:03:22', '2019-09-20 19:33:22', NULL, 0.1),
(180, 'NDTV GOOD TIMES', 'NDTV GOOD TIMES', 'allacart', '1.50', '18', '1.77', 'Y', '2019-09-20 07:37:05', '2019-09-20 20:07:05', NULL, 0.15),
(181, 'DISCOVERY SCIENCE', 'DISCOVERY SCIENCE', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:02:21', '2019-09-20 19:32:21', NULL, 0.1),
(182, 'LIVING FOODZ', 'LIVING FOODZ', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:20:45', '2019-09-20 19:50:45', NULL, 0.1),
(183, 'STAR PLUS HD', 'STAR PLUS HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:20:53', '2019-09-20 20:50:53', NULL, 1.9),
(184, 'STAR BHARAT HD', 'STAR BHARAT HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:18:27', '2019-09-20 20:48:27', NULL, 1.9),
(185, 'COLORS HD', 'COLORS HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 06:21:23', '2019-09-20 18:51:23', NULL, 1.9),
(186, 'SONY HD', 'SONY HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:01:25', '2019-09-20 20:31:25', NULL, 1.9),
(187, 'HD STAR GOLD', 'HD STAR GOLD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:15:38', '2019-09-20 19:45:38', NULL, 1.9),
(188, 'HD STAR MOVIES', 'HD STAR MOVIES', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:15:57', '2019-09-20 19:45:57', NULL, 1.9),
(189, 'STAR MOVIES SELECT HD', 'STAR MOVIES SELECT HD', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 08:20:03', '2019-09-20 20:50:03', NULL, 1),
(190, 'NGC HD', 'NGC HD', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 07:42:11', '2019-09-20 20:12:11', NULL, 1),
(191, 'HD SONY SIX', 'HD SONY SIX', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:15:07', '2019-09-20 19:45:07', NULL, 1.9),
(192, 'SONY ESPN HD', 'SONY ESPN HD', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 08:01:03', '2019-09-20 20:31:03', NULL, 0.7),
(193, 'STAR SPORTS1 HD', 'STAR SPORTS1 HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:03:14', '2019-09-20 22:33:14', NULL, 1.9),
(194, 'HD STAR SPORTS 2', 'STAR SPORTS 2 HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:17:04', '2019-09-20 19:47:04', NULL, 1.9),
(195, 'STAR SPORTS SELECT HD', 'STAR SPORTS SELECT HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:01:10', '2019-09-20 22:31:10', NULL, 1.9),
(196, 'MAA MOVIES HD', 'MAA MOVIES HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:21:15', '2019-09-20 19:51:15', NULL, 1.9),
(197, 'HD MAA MOVIES', 'HD MAA MOVIES', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:12:36', '2019-09-20 19:42:36', NULL, 1.9),
(198, 'HD JALSHA MOVIES', 'HD JALSHA MOVIES', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:11:08', '2019-09-20 19:41:08', NULL, 1.9),
(199, 'STAR JALSHA HD', 'STAR JALSHA HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 08:19:43', '2019-09-20 20:49:43', NULL, 1.9),
(200, 'HD ETV', 'HD ETV', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:10:48', '2019-09-20 19:40:48', NULL, 1.9),
(201, 'HD MAA', 'MAA HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 07:12:22', '2019-09-20 19:42:22', NULL, 1.9),
(202, 'TEN1 HD', 'TEN1 HD', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:13:26', '2019-09-20 22:43:26', NULL, 1.9),
(203, 'TEN2 HD', 'TEN2 HD', 'allacart', '17', '18', '20.06', 'Y', '2019-09-20 10:13:53', '2019-09-20 22:43:53', NULL, 1.7),
(204, 'TEN3 HD', 'TEN3 HD', 'allacart', '17', '18', '20.06', 'Y', '2019-09-20 10:14:19', '2019-09-20 22:44:19', NULL, 1.7),
(205, 'NAT GEO WILD HD', 'NAT GEO WILD HD', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:36:46', '2019-09-20 20:06:46', NULL, 0.5),
(206, 'ANIMAL PLANET HD', 'ANIMAL PLANET HD', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 05:43:35', '2019-09-20 18:13:35', NULL, 0.3),
(207, 'TLC HD', 'TLC HD', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 06:35:55', '2019-09-20 19:05:55', NULL, 0.3),
(208, 'ZEE PACKAGE', 'ZEE TELUGU,ZEE CINEMALU,ZEE ACTION,ZEE KERALAM,WION,ZEE NEWS,ZEE HINDUSTAN,LIVING FOODZ', 'packages', '20', '18', '23.6', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(209, 'STAR TELUGU', 'MAA GOLD,MAA MOVIES,MAA MUSIC,MAA TV,NAT GEO WILD,STAR SPORTS 1 TELUGU,STAR SPORTS 2,STAR SPORTS FIRST', 'packages', '39', '18', '46.02', 'Y', '2019-06-09 10:41:28', '2019-06-09 05:11:28', NULL, NULL),
(210, 'Local', 'Local Channels,', 'local', '12', '18', '14', 'Y', '2019-06-11 07:59:41', '2019-06-11 14:59:41', NULL, NULL),
(213, 'SET MAX', 'SET MAX', 'allacart', '15', '18', '17.7', 'D', '2019-09-20 07:59:01', '2019-09-20 20:29:01', NULL, 1.5),
(215, 'Random Package', '& FLIX,& PICTURES,& TV,24 GHANTA,AAJ TAK,ADITHYA TV,COLORS KANNADA,COLORS KANNADA CINEMA,COLORS MARATHI,COMEDY CENTRAL,DISCOVERY KIDS,DISCOVERY SCIENCE,ETV ABHIRUCHI,ETV TELANGANA,GEMINI MUSIC,JALSHA MOVIES', 'packages', '1001', '111', '2201', 'Y', '2019-06-01 13:54:19', '2019-06-01 08:24:19', NULL, NULL),
(216, 'dcfdfsdf1', 'ETV PLUS,GEMINI MOVIES,J MOVIES', 'packages', '200', '10', '220', 'D', '2019-06-09 10:50:40', '2019-06-09 05:20:40', NULL, NULL),
(217, '24 GANTA', '24 GANTA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 05:39:37', '2019-09-20 18:09:37', NULL, 0.1),
(218, 'Hindi Base Pack', 'Hindi Base channels', 'base', '130', '18', '153.4', 'Y', '2019-08-06 19:06:18', '2019-08-07 07:36:18', 20, 100),
(219, 'Test1', 'Test is a telugu channel', 'allacart', '19', '18', '22.42', 'D', '2019-08-06 19:08:10', '2019-08-07 07:38:10', NULL, 1.9),
(220, 'Foundation + APTL South Pack 3M', 'All South Channels 3 Months', 'base', '390', '18', '460.2', 'Y', '2019-11-13 11:50:43', '2019-11-14 00:20:43', 20, 100),
(221, 'News18 Tamil Nadu', 'News18 Tamil Nadu', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:41:41', '2019-09-20 20:11:41', NULL, 0.1),
(222, 'News18 Bangla', 'News18 Bangla', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:39:32', '2019-09-20 20:09:32', NULL, 0.1),
(223, 'News18 Rajasthan', 'News18 Rajasthan', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:41:33', '2019-09-20 20:11:33', NULL, 0.1),
(224, 'MTV BEATS', 'MTV BEATS', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:36:16', '2019-09-20 20:06:16', NULL, 0.1),
(225, 'NEWS18 BIHAR JHARKHAND', 'NEWS18 BIHAR JHARKHAND', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:41:06', '2019-09-20 20:11:06', NULL, 0.1),
(226, 'NEWS 18 KANNADA', 'NEWS 18 KANNADA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:38:39', '2019-09-20 20:08:39', NULL, 0.1),
(227, 'NEWS18 ODIA', 'NEWS18 ODIA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:41:16', '2019-09-20 20:11:16', NULL, 0.1),
(228, 'NEWS18 PUNJAB HARYANA HIMACHAL', 'NEWS18 PUNJAB HARYANA HIMACHAL', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:41:25', '2019-09-20 20:11:25', NULL, 0.1),
(229, 'NEWS18 UP & UK', 'NEWS18 UP & UK', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:41:51', '2019-09-20 20:11:51', NULL, 0.1),
(230, 'ZEE ETC', 'ZEE ETC', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:28:55', '2019-09-20 18:58:55', NULL, 0.1),
(231, 'Zee Uttar Pradesh Uttarakhand', 'Zee Uttar Pradesh Uttarakhand', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:40:54', '2019-09-20 19:10:54', NULL, 0.1),
(232, 'ZEE 24 TAAS', 'ZEE 24 TAAS', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:48:08', '2019-09-20 19:18:08', NULL, 0.1),
(233, 'NEWS 18 MP CHHATTISGARH', 'NEWS 18 MP CHHATTISGARH', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:39:13', '2019-09-20 20:09:13', NULL, 0.1),
(234, 'ZEE ODISHA', 'ZEE ODISHA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:36:36', '2019-09-20 19:06:36', NULL, 0.1),
(235, 'ZEE MADHYA PRADESH CHATTISGARH', 'ZEE MADHYA PRADESH CHHATTISGARH', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:29:53', '2019-09-20 18:59:53', NULL, 0.1),
(236, 'NEWS 18 ASSAM/NORTH EAST', 'NEWS 18 ASSAM/NORTH EAST', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:37:40', '2019-09-20 20:07:40', NULL, 0.1),
(237, 'NEWS 18 KERALA', 'NEWS 18 KERALA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:38:48', '2019-09-20 20:08:48', NULL, 0.1),
(238, 'BINDASS', 'BINDASS', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 05:45:53', '2019-09-20 18:15:53', NULL, 0.1),
(239, 'NEWS 18 URDU', 'NEWS 18 URDU', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:39:23', '2019-09-20 20:09:23', NULL, 0.1),
(240, 'TEZ', 'TEZ', 'allacart', '0.27', '18', '0.32', 'Y', '2019-09-20 10:14:36', '2019-09-20 22:44:36', NULL, 0.027),
(241, 'RAJ NEWS TAMIL', 'RAJ NEWS TAMIL', 'allacart', '0.27', '18', '0.32', 'Y', '2019-09-20 07:58:04', '2019-09-20 20:28:04', NULL, 0.027),
(242, 'FYI TV 18', 'FYI TV 18', 'allacart', '0.25', '18', '0.3', 'Y', '2019-09-20 07:10:12', '2019-09-20 19:40:12', NULL, 0.25),
(243, 'ZOOM TV', 'ZOOM TV', 'allacart', '0.53', '18', '0.63', 'Y', '2019-09-20 06:42:20', '2019-09-20 19:12:20', NULL, 0.053),
(244, 'MOVIES OK', 'MOVIES OK', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:24:45', '2019-09-20 19:54:45', NULL, 0.1),
(245, 'COLORS RISHTEY', 'COLORS RISHTEY', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:00:39', '2019-09-20 19:30:39', NULL, 0.1),
(246, 'PAL', 'PAL', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:54:37', '2019-09-20 20:24:37', NULL, 0.1),
(247, 'SONY MIX', 'SONY MIX', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 08:02:37', '2019-09-20 20:32:37', NULL, 0.1),
(248, 'MAX 2', 'MAX 2', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:23:09', '2019-09-20 19:53:09', NULL, 0.1),
(249, 'INDIA TODAY', 'INDIA TODAY', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:18:19', '2019-09-20 19:48:19', NULL, 0.1),
(250, 'WB', 'WB', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:47:09', '2019-09-20 19:17:09', NULL, 0.1),
(251, 'DISCOVERY JEET', 'DISCOVERY JEET', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:02:03', '2019-09-20 19:32:03', NULL, 0.1),
(252, 'BBC WORLD NEWS', 'BBC WORLD NEWS', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 05:44:21', '2019-09-20 18:14:21', NULL, 0.1),
(253, 'COLORS BANGLA CINEMA', 'COLORS BANGLA CINEMA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 05:48:12', '2019-09-20 18:18:12', NULL, 0.1),
(254, 'COLORS GUJARATI CINEMA', 'COLORS GUJARATI CINEMA', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 06:21:11', '2019-09-20 18:51:11', NULL, 0.1),
(255, 'RAJ MUSIX TAMIL', 'RAJ MUSIX TAMIL', 'allacart', '1', '18', '1.18', 'Y', '2019-09-20 07:57:14', '2019-09-20 20:27:14', NULL, 0.1),
(256, 'TLC', 'TLC', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 10:15:14', '2019-09-20 22:45:14', NULL, 0.2),
(257, 'STAR SPORTS 3', 'STAR SPORTS 3', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 10:00:42', '2019-09-20 22:30:42', NULL, 0.2),
(258, 'NAT GEO CHANNEL', 'NAT GEO CHANNEL', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:36:30', '2019-09-20 20:06:30', NULL, 0.2),
(259, 'PRARTHANA TV', 'PRARTHANA TV', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:56:36', '2019-09-20 20:26:36', NULL, 0.2),
(260, 'UTV ACTION', 'UTV ACTION', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 06:45:13', '2019-09-20 19:15:13', NULL, 0.2),
(261, 'UTV MOVIES', 'UTV MOVIES', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 06:45:23', '2019-09-20 19:15:23', NULL, 0.2),
(262, 'ANIMAL PLANET', 'ANIMAL PLANET', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 05:43:27', '2019-09-20 18:13:27', NULL, 0.2),
(263, 'EPIC TV', 'EPIC TV', 'allacart', '2', '18', '2.36', 'Y', '2019-09-20 07:05:13', '2019-09-20 19:35:13', NULL, 0.2),
(264, 'MARVEL HQ', 'MARVEL HQ', 'allacart', '3', '18', '3.54', 'D', '2019-09-20 07:22:36', '2019-09-20 19:52:36', NULL, 0),
(265, 'MARVEL HQ', 'MARVEL HQ', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:22:16', '2019-09-20 19:52:16', NULL, 0.3),
(266, 'DISNEY JUNIOR', 'DISNEY JUNIOR', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:04:53', '2019-09-20 19:34:53', NULL, 0.3),
(267, 'COLORS CINEPLEX', 'Colors Cineplex', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 05:48:22', '2019-09-20 18:18:22', NULL, 0.3),
(268, 'HD TLC WORLD', 'HD TLC WORLD', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:17:30', '2019-09-20 19:47:30', NULL, 0.3),
(269, 'HD ANIMAL PLANET WORLD', 'HD ANIMAL PLANET WORLD', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 07:11:55', '2019-09-20 19:41:55', NULL, 0.3),
(270, 'TRAVELXP', 'TRAVELXP', 'allacart', '3', '18', '3.54', 'Y', '2019-09-20 06:42:41', '2019-09-20 19:12:41', NULL, 0.3),
(271, 'CNBC TV18', 'CNBC TV18', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 05:47:10', '2019-09-20 18:17:10', NULL, 0.4),
(272, 'AATH', 'AATH', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 05:42:50', '2019-09-20 18:12:50', NULL, 0.4),
(273, 'DISCOVERY CHANNEL', 'DISCOVERY CHANNEL', 'allacart', '4', '18', '4.72', 'Y', '2019-09-20 07:01:46', '2019-09-20 19:31:46', NULL, 0.4),
(274, 'POGO', 'POGO', 'allacart', '4.2', '18', '4.96', 'Y', '2019-09-20 07:54:47', '2019-09-20 20:24:47', NULL, 0.42),
(275, 'SHEMAROO HARIOM TV', 'SHEMAROO HARIOM TV', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:59:46', '2019-09-20 20:29:46', NULL, 0.5),
(276, 'SHEMAROO BOLLYWOOD', 'SHEMAROO BOLLYWOOD', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:59:14', '2019-09-20 20:29:14', NULL, 0.5),
(277, 'SHEMAROO COMEDY', 'SHEMAROO COMEDY', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:59:28', '2019-09-20 20:29:28', NULL, 0.5),
(278, 'SHEMAROO FILMY GAANE', 'SHEMAROO FILMY GAANE', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:59:37', '2019-09-20 20:29:37', NULL, 0.5),
(279, 'SHEMAROO IBAADAT', 'SHEMAROO IBAADAT', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:59:55', '2019-09-20 20:29:55', NULL, 0.5),
(280, 'SHEMAROO KIDS', 'SHEMAROO KIDS', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 08:00:04', '2019-09-20 20:30:04', NULL, 0.5),
(281, 'AXN', 'AXN', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 05:44:13', '2019-09-20 18:14:13', NULL, 0.5),
(282, 'HD NAT GEO WILD', 'HD NAT GEO WILD', 'allacart', '5', '18', '5.9', 'Y', '2019-09-20 07:14:04', '2019-09-20 19:44:04', NULL, 0.5),
(283, 'COLORS ORIYA', 'COLORS ORIYA', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:00:29', '2019-09-20 19:30:29', NULL, 0.6),
(284, 'NICK', 'NICK', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:38:03', '2019-09-20 20:08:03', NULL, 0.6),
(285, 'HUNGAMA TV', 'HUNGAMA TV', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:17:58', '2019-09-20 19:47:58', NULL, 0.6),
(286, 'DISCOVERY HD WORLD', 'DISCOVERY HD WORLD', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 07:01:54', '2019-09-20 19:31:54', NULL, 0.6),
(287, 'STAR SPORTS 1 BANGLA', 'STAR SPORTS 1 BANGLA', 'allacart', '6', '18', '7.08', 'Y', '2019-09-20 08:22:38', '2019-09-20 20:52:38', NULL, 0.6),
(288, 'STAR SPORTS SELECT 2', 'STAR SPORTS SELECT 2', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 10:03:00', '2019-09-20 22:33:00', NULL, 0.7),
(289, 'COLORS BANGLA', 'COLORS BANGLA', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 05:48:01', '2019-09-20 18:18:01', NULL, 0.7),
(290, 'HD SONY ESPN', 'HD SONY ESPN', 'allacart', '7', '18', '8.26', 'Y', '2019-09-20 07:14:58', '2019-09-20 19:44:58', NULL, 0.7),
(291, 'HD UTV', 'HD UTV', 'allacart', '8', '18', '9.44', 'Y', '2019-09-20 07:17:40', '2019-09-20 19:47:40', NULL, 0.8),
(292, 'STAR GOLD', 'STAR GOLD', 'allacart', '8', '18', '9.44', 'Y', '2019-09-20 08:18:39', '2019-09-20 20:48:39', NULL, 0.8),
(293, 'DISNEY CHANNEL', 'DISNEY CHANNEL', 'allacart', '8', '18', '9.44', 'Y', '2019-09-20 07:04:44', '2019-09-20 19:34:44', NULL, 0.8),
(294, 'STAR PRAVAH', 'STAR PRAVAH', 'allacart', '9', '18', '10.62', 'Y', '2019-09-20 08:22:21', '2019-09-20 20:52:21', NULL, 0.9),
(295, 'HBO', 'HBO', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 07:11:45', '2019-09-20 19:41:45', NULL, 1),
(296, 'HD STAR GOLD', 'HD STAR GOLD', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 07:15:30', '2019-09-20 19:45:30', NULL, 1),
(297, 'HD STAR MOVIES SELECT', 'HD STAR MOVIES SELECT', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 07:16:16', '2019-09-20 19:46:16', NULL, 1),
(298, 'STAR BHARAT', 'STAR BHARAT', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 08:16:52', '2019-09-20 20:46:52', NULL, 1),
(299, 'TARANG TV', 'TARANG TV', 'allacart', '10', '18', '11.8', 'Y', '2019-09-20 10:13:01', '2019-09-20 22:43:01', NULL, 1),
(300, 'ZEE TAMIL', 'Zee Tamil', 'allacart', '12', '18', '14.16', 'Y', '2019-09-20 06:39:51', '2019-09-20 19:09:51', NULL, 1.2),
(301, 'ASIANET MOVIES', 'ASIANET MOVIES', 'allacart', '15', '18', '17.7', 'Y', '2019-09-20 05:43:53', '2019-09-20 18:13:53', NULL, 1.5),
(302, 'SIX', 'SIX', 'allacart', '15', '18', '17.7', 'Y', '2019-09-20 08:00:14', '2019-09-20 20:30:14', NULL, 1.5),
(303, 'ZEE CINEMA', 'ZEE CINEMA', 'allacart', '15', '18', '17.7', 'Y', '2019-09-20 06:28:02', '2019-09-20 18:58:02', NULL, 1.5),
(304, 'HD STAR SPORTS 1 HINDI', 'HD STAR SPORTS 1 HIND', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:16:53', '2019-09-20 19:46:53', NULL, 1.881),
(305, 'HD STAR SPORTS 1', 'HD STAR SPORTS 1', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:16:40', '2019-09-20 19:46:40', NULL, 1.881),
(306, 'HD STAR PLUS', 'HD STAR PLUS', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:16:26', '2019-09-20 19:46:26', NULL, 1.881),
(307, 'HD STAR JALSHA', 'HD STAR JALSHA', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:15:49', '2019-09-20 19:45:49', NULL, 1.881),
(308, 'HD STAR BHARAT', 'HD STAR BHARAT', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:15:19', '2019-09-20 19:45:19', NULL, 1.881),
(309, 'HD COLORS', 'HD COLORS', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:12:09', '2019-09-20 19:42:09', NULL, 1.881),
(310, 'SET', 'SET', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:58:47', '2019-09-20 20:28:47', NULL, 1.881),
(311, 'HD SET', 'HD SET', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:14:47', '2019-09-20 19:44:47', NULL, 1.881),
(312, 'HD STAR MOVIES', 'HD STAR MOVIES', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:16:07', '2019-09-20 19:46:07', NULL, 1.881),
(313, 'HD STAR SPORTS SELECT 1', 'HD STAR SPORTS SELECT 1', 'allacart', '18.81', '18', '22.2', 'Y', '2019-09-20 07:17:15', '2019-09-20 19:47:15', NULL, 1.881),
(314, 'STAR SPORTS SELECT 1', 'STAR SPORTS SELECT 1', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:02:46', '2019-09-20 22:32:46', NULL, 1.9),
(315, 'Ten 1', 'Ten 1', 'allacart', '19', '18', '22.42', 'Y', '2019-09-20 10:13:15', '2019-09-20 22:43:15', NULL, 1.9),
(316, 'Foundation Pack 3M', 'All Telugu Base Channels 3 Months', 'base', '390', '18', '460.2', 'Y', '2019-11-13 11:39:51', '2019-11-14 00:09:51', 20, 100),
(317, 'Foundation Pack 6M', 'All Telugu Base Channels 6 Months', 'base', '780', '18', '920.4', 'Y', '2019-11-13 11:40:05', '2019-11-14 00:10:05', 20, 100),
(318, 'Foundation Pack 12M', 'All Telugu Base Channels 12 Months', 'base', '1560', '18', '1840.8', 'Y', '2019-11-13 11:39:39', '2019-11-14 00:09:39', 20, 100),
(319, 'Foundation + APTL South Pack 6M', 'All South Channels 6 Months', 'base', '780', '18', '920.4', 'Y', '2019-11-13 11:50:15', '2019-11-14 00:20:15', 20, 100),
(320, 'Foundation + Telugu Smart Pack', 'All Telugu Channels', 'base', '243', '18', '286.74', 'Y', '2019-11-14 00:16:20', '2019-11-14 00:16:20', 20, 100),
(321, 'Foundation + Telugu Smart Pack 3M', 'All Telugu Channels 3 months', 'base', '729', '18', '860.22', 'Y', '2019-11-13 11:48:16', '2019-11-14 00:18:16', 20, 100),
(322, 'Foundation + Telugu Smart Pack 6M', 'All Telugu Channels 6 Months', 'base', '1458', '18', '1720.44', 'Y', '2019-11-14 00:22:38', '2019-11-14 00:22:38', 20, 100),
(323, 'Foundation + Telugu Smart Pack 12M', 'All Telugu Channels 12 Months', 'base', '1560', '18', '1840.8', 'Y', '2019-11-14 00:45:45', '2019-11-14 00:45:45', 20, 100),
(324, 'GEMINI PACKAGE', 'GEMINI COMEDY,GEMINI LIFE,GEMINI MOVIES,GEMINI MUSIC,GEMINI TV,KUSHI TV', 'packages', '30', '18', '35.4', 'Y', '2021-03-17 00:53:28', '2021-03-17 00:53:28', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `slj_cities`
--

CREATE TABLE `slj_cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_cities`
--

INSERT INTO `slj_cities` (`id`, `name`, `status`) VALUES
(1, 'Guntur', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `slj_combo_packages`
--

CREATE TABLE `slj_combo_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `broadband_package` int(11) DEFAULT NULL,
  `connection_type` varchar(50) NOT NULL,
  `cable_allacart` varchar(1000) DEFAULT NULL,
  `cable_packages` varchar(1000) DEFAULT NULL,
  `cable_base` varchar(200) DEFAULT NULL,
  `cable_local` varchar(200) DEFAULT NULL,
  `iptv_allacart` varchar(1000) DEFAULT NULL,
  `iptv_packages` varchar(1000) DEFAULT NULL,
  `iptv_base` varchar(200) DEFAULT NULL,
  `iptv_local` varchar(200) DEFAULT NULL,
  `your_comments` varchar(255) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_combo_packages`
--

INSERT INTO `slj_combo_packages` (`id`, `package_name`, `broadband_package`, `connection_type`, `cable_allacart`, `cable_packages`, `cable_base`, `cable_local`, `iptv_allacart`, `iptv_packages`, `iptv_base`, `iptv_local`, `your_comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SLJ Combo Starter', 11, 'iptv', NULL, NULL, '24', '210', '', '138,208,209', '24', '', NULL, 'Y', '2019-09-01 06:11:48', '2019-11-13 22:36:15'),
(2, 'SLJ Combo Rapid', 13, 'iptv', NULL, NULL, NULL, NULL, '', '138,208,209', '24', '', NULL, 'Y', '2019-09-01 06:12:13', '2019-11-13 22:37:09'),
(3, 'SLJ Combo Starter Infinity', 5, 'iptv', '8,4', '138,208,209', '24', '210', '', '138,208,209', '24', '', NULL, 'Y', '2019-09-16 19:41:18', '2019-11-13 22:35:05'),
(4, 'SLJ Combo Rapid Infinity', 18, 'iptv', NULL, NULL, NULL, NULL, '', '138,208,209', '24', '', NULL, 'Y', '2019-11-13 23:39:25', '2019-11-13 23:39:56'),
(5, 'SLJ Combo Premium Infinity', 19, 'iptv', NULL, NULL, NULL, NULL, NULL, '138,208,209', '24', NULL, NULL, 'Y', '2019-11-14 01:47:43', '2019-11-14 01:47:43'),
(6, 'SLJ Combo Premium', 15, 'iptv', NULL, NULL, NULL, NULL, NULL, '138,208,209', '24', NULL, NULL, 'Y', '2019-11-14 01:59:24', '2019-11-14 01:59:24'),
(7, 'SLJ Combo Thunder', 17, 'iptv', NULL, NULL, NULL, NULL, NULL, '138,208,209', '24', NULL, NULL, 'Y', '2019-11-14 02:11:07', '2019-11-14 02:11:07'),
(8, 'SLJ Combo Thunder Infinity', 20, 'iptv', NULL, NULL, NULL, NULL, NULL, '138,208,209', '24', NULL, NULL, 'Y', '2019-11-14 02:18:56', '2019-11-14 02:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `slj_combo_subpackages`
--

CREATE TABLE `slj_combo_subpackages` (
  `id` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `sub_plan_name` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `time_unit` varchar(50) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `package_selection` varchar(20) DEFAULT NULL,
  `distributor_share` float DEFAULT '0',
  `franchise_share` float DEFAULT '0',
  `short_description` varchar(1000) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_combo_subpackages`
--

INSERT INTO `slj_combo_subpackages` (`id`, `package`, `sub_plan_name`, `price`, `gst`, `total`, `time_unit`, `unit_type`, `package_selection`, `distributor_share`, `franchise_share`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'SLJ Combo Starter Monthly', '419', '18', '494.42', '30', 'day', 'renew', 20, 200, NULL, 'Y', '2019-09-01 06:13:44', '2021-04-01 22:53:39'),
(2, 1, 'SLJ Combo Starter Half-Yearly + One Month Free', '3594', '18', '4241', '210', 'day', 'both', 100, 1000, NULL, 'Y', '2019-09-01 06:14:25', '2019-11-13 23:31:31'),
(3, 2, 'SLJ Combo Rapid Monthly', '749', '18', '884', '30', 'day', 'renew', 20, 305, NULL, 'Y', '2019-09-01 06:14:57', '2019-11-13 22:52:24'),
(5, 1, 'SLJ Combo Starter Yearly + Two Months Free', '7188', '18', '8482', '420', 'day', 'both', 200, 2000, NULL, 'Y', '2019-11-13 22:43:52', '2019-11-13 22:59:55'),
(6, 3, 'SLJ Combo Starter Infinity Monthly', '549', '18', '648', '30', 'day', 'renew', 20, 175, NULL, 'Y', '2019-11-13 22:45:12', '2019-11-13 22:45:12'),
(7, 3, 'SLJ Combo Starter Infinity Half-Yearly + One Month Free', '3294', '18', '3887', '210', 'day', 'both', 100, 875, NULL, 'Y', '2019-11-13 22:47:00', '2019-11-13 22:47:00'),
(8, 3, 'SLJ Combo Starter Infinity Yearly + Two Months Free', '6588', '18', '7774', '420', 'day', 'both', 200, 1750, NULL, 'Y', '2019-11-13 22:49:10', '2019-11-13 22:49:10'),
(9, 2, 'SLJ Combo Rapid + One Month Free', '4494', '18', '5303', '210', 'day', 'both', 200, 1525, NULL, 'Y', '2019-11-13 22:55:26', '2019-11-13 22:55:26'),
(10, 2, 'SLJ Combo Rapid  Yearly + Two Months Free', '8988', '18', '10606', '420', 'day', 'both', 200, 3050, NULL, 'Y', '2019-11-13 22:57:04', '2019-11-13 22:57:19'),
(11, 4, 'SLJ Combo Rapid Infinity Monthly', '749', '18', '884', '30', 'day', 'renew', 30, 305, NULL, 'Y', '2019-11-13 23:42:25', '2019-11-13 23:48:43'),
(12, 4, 'SLJ Rapid Infinity Half-Yearly + One Month Free', '4494', '18', '5303', '210', 'day', 'both', 150, 1525, NULL, 'Y', '2019-11-13 23:45:55', '2019-11-13 23:48:26'),
(13, 4, 'SLJ  Combo Rapid Infinity Yearly + Two Months Free', '8988', '18', '10606', '420', 'day', 'both', 300, 3050, NULL, 'Y', '2019-11-13 23:47:35', '2019-11-13 23:48:14'),
(14, 5, 'SLJ Combo Premium Infinity Monthly', '1099', '18', '1297', '30', 'day', 'renew', 30, 385, NULL, 'Y', '2019-11-14 01:51:22', '2019-11-14 01:53:51'),
(15, 5, 'SLJ Combo Premium Infinity Quarterly', '3297', '18', '3891', '90', 'day', 'both', 90, 1155, NULL, 'Y', '2019-11-14 01:53:27', '2019-11-14 01:54:10'),
(16, 5, 'SLJ Combo Premium Infinity Half-Yearly + One Month Free', '6594', '18', '7781', '210', 'day', 'both', 150, 1925, NULL, 'Y', '2019-11-14 01:55:44', '2019-11-14 02:09:54'),
(17, 5, 'SLJ Combo Premium Infinity Yearly + Two Months Free', '13188', '18', '15562', '420', 'day', 'both', 300, 3850, NULL, 'Y', '2019-11-14 01:57:29', '2019-11-14 02:10:07'),
(18, 6, 'SLJ Combo Premium Monthly', '1299', '18', '1533', '30', 'day', 'both', 30, 464, NULL, 'Y', '2019-11-14 02:02:08', '2019-11-14 02:07:15'),
(19, 6, 'SLJ Combo Premium Quarterly', '3897', '18', '4599', '90', 'day', 'both', 90, 1395, NULL, 'Y', '2019-11-14 02:03:54', '2019-11-14 02:07:41'),
(20, 6, 'SLJ Combo Premium Half-Yearly + One Month Free', '7794', '18', '9197', '210', 'day', 'both', 150, 2325, NULL, 'Y', '2019-11-14 02:06:37', '2019-11-14 02:06:37'),
(21, 6, 'SLJ Combo Premium Yearly + Two Months Free', '15588', '18', '18394', '420', 'day', 'both', 300, 4650, NULL, 'Y', '2019-11-14 02:09:05', '2019-11-14 02:09:05'),
(22, 7, 'SLJ Combo Thunder Monthly', '1699', '18', '2005', '30', 'day', 'renew', 30, 625, NULL, 'Y', '2019-11-14 02:12:35', '2019-11-14 02:12:35'),
(23, 7, 'SLJ Combo Thunder Quarterly', '5097', '18', '6015', '90', 'day', 'both', 90, 1875, NULL, 'Y', '2019-11-14 02:13:50', '2019-11-14 02:13:50'),
(24, 7, 'SLJ Combo Half-Yearly + One Month Free', '10194', '18', '12029', '210', 'day', 'both', 150, 3125, NULL, 'Y', '2019-11-14 02:15:16', '2019-11-14 02:15:16'),
(25, 7, 'SLJ Combo Thunder Yearly + Two Months Free', '20388', '18', '24058', '420', 'day', 'both', 300, 6250, NULL, 'Y', '2019-11-14 02:16:44', '2019-11-14 02:24:35'),
(26, 8, 'SLJ Combo Thunder Infinity Monthly', '1699', '18', '2005', '30', 'day', 'renew', 30, 625, NULL, 'Y', '2019-11-14 02:19:56', '2019-11-14 02:21:04'),
(27, 8, 'SLJ Combo Thunder Infinity Quarterly', '5097', '18', '6015', '90', 'day', 'both', 90, 1875, NULL, 'Y', '2019-11-14 02:20:51', '2019-11-14 02:21:17'),
(28, 8, 'SLJ  Combo Thunder Infinity Yearly + Two Months Free', '20388', '18', '24058', '420', 'day', 'both', 300, 6250, NULL, 'Y', '2019-11-14 02:22:23', '2019-11-14 02:22:23'),
(29, 8, 'SLJ Combo Thunder Infinity Half-Yearly + One Month Free', '10194', '18', '12029', '210', 'day', 'both', 150, 3125, NULL, 'Y', '2019-11-14 02:23:47', '2019-11-14 02:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `slj_competators`
--

CREATE TABLE `slj_competators` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `conectiontype` varchar(150) DEFAULT NULL,
  `status` varchar(44) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_competators`
--

INSERT INTO `slj_competators` (`id`, `name`, `conectiontype`, `status`) VALUES
(1, 'Jio', 'Internet', 'Y'),
(2, 'SITI CABLE', 'Cable', 'Y'),
(3, 'ACT', 'Internet', 'Y'),
(4, 'unconnected user', 'Cable', 'Y'),
(5, 'unconnected user', 'Internet', 'Y'),
(6, 'Airtel', 'Internet', 'Y'),
(7, 'Local Internet', 'Internet', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `slj_complaints`
--

CREATE TABLE `slj_complaints` (
  `id` int(11) NOT NULL,
  `complaint_slno` varchar(15) NOT NULL DEFAULT '',
  `customerid` varchar(50) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `call_from` varchar(30) DEFAULT NULL,
  `complaint_type` varchar(30) NOT NULL,
  `complaint_sub_type` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `expected_resolved_by` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `inprogress_start_at` datetime DEFAULT NULL,
  `resolved_at` datetime DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slj_complaint_types`
--

CREATE TABLE `slj_complaint_types` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `connection_type` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_complaint_types`
--

INSERT INTO `slj_complaint_types` (`id`, `title`, `connection_type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Red Light on REG or PON', 3, 'optical fiber broken or tite', '2019-09-18 04:25:03', '2019-09-24 16:57:13'),
(2, 'ERROR 7', 5, 'Wire broken or Power source Issue', '2019-09-24 16:56:35', '2019-09-24 16:57:55'),
(3, 'Speed Issue', 3, 'Cutomer not awaire about Internet Usage. with technical Problems', '2019-09-24 20:33:36', '2019-09-24 20:33:36'),
(4, 'Net Not Working Everything Perfect.', 3, 'May Lose contact, Not aware about connectivity', '2019-09-24 20:35:28', '2019-09-24 20:35:28'),
(5, 'Blear or Picture not clear', 5, 'Signal Issue', '2019-09-24 20:36:37', '2019-09-24 20:36:37'),
(6, 'Red Light PON or REG', 7, 'Fiber broken or Fiber Tight', '2019-09-24 20:38:36', '2019-09-24 20:38:36'),
(7, 'Technical', 6, NULL, '2022-11-11 19:32:35', '2022-11-11 19:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `slj_connection_types`
--

CREATE TABLE `slj_connection_types` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `installation_amount` double NOT NULL DEFAULT '0',
  `olt_security_deposit` double NOT NULL DEFAULT '0',
  `setupbox_amount` double NOT NULL DEFAULT '0',
  `ont_security_deposit` double NOT NULL DEFAULT '0',
  `rental_amount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_connection_types`
--

INSERT INTO `slj_connection_types` (`id`, `title`, `installation_amount`, `olt_security_deposit`, `setupbox_amount`, `ont_security_deposit`, `rental_amount`, `created_at`, `updated_at`) VALUES
(7, 'Cable TV Combo', 1000, 1000, 500, 0, 0, '2019-09-15 12:03:42', '2022-04-17 20:30:15'),
(6, 'IPTV Combo', 1000, 1000, 0, 500, 0, '2019-09-15 12:03:26', '2022-04-17 20:30:38'),
(3, 'Broadband', 500, 500, 0, 0, 0, '2019-09-15 11:23:53', '2022-04-17 20:29:42'),
(5, 'Cable TV', 1000, 0, 500, 0, 0, '2019-09-15 12:03:06', '2022-04-17 20:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `slj_customers`
--

CREATE TABLE `slj_customers` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `franchise` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `f_name_c_name` varchar(50) NOT NULL,
  `caf_no` varchar(50) DEFAULT NULL,
  `gstin` varchar(50) DEFAULT NULL,
  `alt_mobile_num` varchar(50) DEFAULT NULL,
  `address_proof` varchar(150) DEFAULT NULL,
  `identity_proof` varchar(150) DEFAULT NULL,
  `customer_pic` varchar(150) DEFAULT NULL,
  `connection_type` varchar(50) NOT NULL,
  `package` int(11) DEFAULT NULL,
  `sub_package` int(11) DEFAULT NULL,
  `combo_package` int(11) DEFAULT NULL,
  `combo_local` varchar(255) DEFAULT NULL,
  `combo_base` varchar(255) DEFAULT NULL,
  `combo_allacart` varchar(255) DEFAULT NULL,
  `combo_sub_package` int(11) DEFAULT NULL,
  `cable_allacart` varchar(1000) DEFAULT NULL,
  `cable_packages` varchar(1000) DEFAULT NULL,
  `cable_base` varchar(200) DEFAULT NULL,
  `cable_local` varchar(200) DEFAULT NULL,
  `iptv_allacart` varchar(1000) DEFAULT NULL,
  `iptv_packages` varchar(1000) DEFAULT NULL,
  `iptv_base` varchar(200) DEFAULT NULL,
  `iptv_local` varchar(200) DEFAULT NULL,
  `installation_amount` float DEFAULT NULL,
  `secure_deposite_amount` float DEFAULT NULL,
  `setup_box_amount` float DEFAULT NULL,
  `androidbox_security_deposit` int(11) NOT NULL DEFAULT '0',
  `discount_reason` varchar(255) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `discount_comments` varchar(255) DEFAULT NULL,
  `billing_address` varchar(250) DEFAULT NULL,
  `landmark` varchar(200) DEFAULT NULL,
  `installation_address` varchar(250) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `user_created_date` date DEFAULT NULL,
  `olt` varchar(50) DEFAULT NULL,
  `dp` varchar(50) DEFAULT NULL,
  `fh` varchar(50) DEFAULT NULL,
  `fh_color` varchar(50) DEFAULT NULL,
  `fh_port` int(11) DEFAULT NULL,
  `fiber_length` varchar(50) DEFAULT NULL,
  `stb_num` varchar(50) DEFAULT NULL,
  `stb_model` varchar(50) DEFAULT NULL,
  `stb_company` varchar(50) DEFAULT NULL,
  `long_lat` varchar(50) DEFAULT NULL,
  `technical_details_status` varchar(50) DEFAULT NULL,
  `technical_details_c_date` date DEFAULT NULL,
  `renew_accept` varchar(30) DEFAULT NULL,
  `renewal_cycle` varchar(30) DEFAULT NULL,
  `schedule_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `active_updated_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `current_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `renew_from_date` datetime DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `ucreateddt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_customers`
--

INSERT INTO `slj_customers` (`id`, `city`, `distributor`, `branch`, `franchise`, `user_id`, `f_name_c_name`, `caf_no`, `gstin`, `alt_mobile_num`, `address_proof`, `identity_proof`, `customer_pic`, `connection_type`, `package`, `sub_package`, `combo_package`, `combo_local`, `combo_base`, `combo_allacart`, `combo_sub_package`, `cable_allacart`, `cable_packages`, `cable_base`, `cable_local`, `iptv_allacart`, `iptv_packages`, `iptv_base`, `iptv_local`, `installation_amount`, `secure_deposite_amount`, `setup_box_amount`, `androidbox_security_deposit`, `discount_reason`, `discount_amount`, `discount_comments`, `billing_address`, `landmark`, `installation_address`, `pincode`, `user_created_date`, `olt`, `dp`, `fh`, `fh_color`, `fh_port`, `fiber_length`, `stb_num`, `stb_model`, `stb_company`, `long_lat`, `technical_details_status`, `technical_details_c_date`, `renew_accept`, `renewal_cycle`, `schedule_date`, `expiry_date`, `department`, `active_updated_date`, `status`, `current_status`, `created_at`, `updated_at`, `renew_from_date`, `eid`, `ucreateddt`) VALUES
(2, 1, 5, 9, 21, 339, 'Hari Prasad', NULL, NULL, NULL, '339-address-proof-1694252037.jpeg', '339-identity-proof-1694252037.jpeg', '339-photo-1694252037.jpeg', '5', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', NULL, NULL, NULL, NULL, NULL, 500, 0, 500, 0, NULL, NULL, NULL, 'dd', 'dd', 'dd', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'new', '2023-09-09 10:53:10', '2023-09-09 22:03:57', NULL, 335, NULL),
(3, 1, 6, 11, 29, 355, 'Venkateswara Reddy', NULL, NULL, NULL, '355-address-proof-1699795744.jpeg', '355-identity-proof-1699795744.jpeg', '355-photo-1699795744.jpeg', '3', 14, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500, 500, 0, 500, NULL, NULL, NULL, '8th Lane, Lakshmi Nagar, Gorantla', 'Opp: Next Gen School Road', '8th Lane, Lakshmi Nagar, Gorantla', '522034', NULL, NULL, 'brahmareddy.finrelevant@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'technical', '2023-11-12 13:29:16', '2023-11-13 01:59:16', NULL, 353, '2023-11-12 18:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `slj_departments`
--

CREATE TABLE `slj_departments` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_departments`
--

INSERT INTO `slj_departments` (`id`, `department`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fiber Team', 'Y', '2020-10-20 13:13:36', '2020-10-20 13:13:36'),
(2, 'Customer Care', 'Y', '2020-10-20 13:49:31', '2020-10-20 13:49:31'),
(3, 'HR', 'Y', '2023-07-14 11:12:10', '2023-07-14 11:12:10'),
(4, 'Inventory Management', 'Y', '2023-07-14 14:59:01', '2023-07-14 14:59:01'),
(5, 'Sales', 'Y', '2023-09-07 14:33:58', '2023-09-07 14:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `slj_deposits`
--

CREATE TABLE `slj_deposits` (
  `id` int(11) NOT NULL,
  `order_number` varchar(40) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `deposit_amount` varchar(100) NOT NULL,
  `deposit_type` varchar(100) NOT NULL,
  `deposit_date` datetime NOT NULL,
  `deposit_desc` varchar(250) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deposit_for` tinyint(2) NOT NULL COMMENT '1-Franchise,2-Branch',
  `franchise_branch_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `slj_deposits`
--

INSERT INTO `slj_deposits` (`id`, `order_number`, `name`, `deposit_amount`, `deposit_type`, `deposit_date`, `deposit_desc`, `created_by`, `created_at`, `deposit_for`, `franchise_branch_id`, `updated_at`) VALUES
(1, NULL, 'ARUNDALPET', '1000', 'Cash', '2020-12-03 00:00:00', NULL, NULL, '2020-12-03 17:03:15', 2, 2, '2020-12-03 17:03:15'),
(2, NULL, 'GORANTLA', '1000', 'Cash', '2020-12-03 00:00:00', NULL, NULL, '2020-12-03 17:03:58', 2, 3, '2020-12-03 17:03:58'),
(3, NULL, 'LRCOLONY', '1000', 'Cash', '2020-12-03 00:00:00', NULL, NULL, '2020-12-03 20:17:43', 1, 1, '2020-12-03 20:17:43'),
(4, NULL, 'IPD COLONY', '5000', 'Cash', '2021-02-02 11:06:00', 'hh', NULL, '2021-02-02 11:06:08', 2, 1, '2021-02-02 11:06:08'),
(5, NULL, 'IPD COLONY', '5000', 'Cash', '2021-02-14 13:21:00', 'sfs', NULL, '2021-02-14 13:21:54', 2, 1, '2021-02-14 13:21:54'),
(6, NULL, 'MARUTHI NAGAR', '5000', 'Cash', '2021-02-14 13:21:00', 'sfs', NULL, '2021-02-14 13:22:38', 2, 4, '2021-02-14 13:22:38'),
(7, NULL, 'MARUTHI NAGAR', '5000', 'Cash', '2021-02-14 13:21:00', 'sfs', NULL, '2021-02-14 13:22:52', 2, 4, '2021-02-14 13:22:52'),
(8, NULL, 'IPD COLONY', '5000', 'Cash', '2021-02-14 13:26:00', 'ad', NULL, '2021-02-14 13:26:23', 2, 1, '2021-02-14 13:26:23'),
(9, NULL, 'GANDHI NAGAR', '500', 'Cash', '2021-02-14 13:31:00', 's', NULL, '2021-02-14 13:31:56', 1, 5, '2021-02-14 13:31:56'),
(10, 'DP100000', 'IPD COLONY', '500', 'Cash', '2021-02-15 11:00:00', NULL, NULL, '2021-02-15 10:37:16', 2, 1, '2021-02-15 10:37:16'),
(11, 'DP100000', 'IPD COLONY', '1000', 'Cash', '2021-02-15 11:00:00', NULL, NULL, '2021-02-15 10:39:39', 2, 1, '2021-02-15 10:39:39'),
(12, 'DP100000', 'IPD COLONY', '500', 'Cash', '2021-02-15 11:00:00', NULL, NULL, '2021-02-15 10:45:59', 2, 1, '2021-02-15 10:45:59'),
(13, 'DP100000', 'ARUNDALPET', '5000', 'Cash', '2021-03-07 18:00:00', NULL, NULL, '2021-03-07 18:01:11', 2, 2, '2021-03-07 18:01:11'),
(14, 'DP100000', 'ARUNDALPET', '5000', 'Cash', '2021-03-07 18:00:00', NULL, NULL, '2021-03-07 18:02:32', 2, 2, '2021-03-07 18:02:32'),
(15, 'DP100000', 'ARUNDALPET', '5000', 'Cash', '2021-03-07 18:00:00', NULL, NULL, '2021-03-07 18:08:02', 2, 2, '2021-03-07 18:08:02');

--
-- Triggers `slj_deposits`
--
DELIMITER $$
CREATE TRIGGER `slj_deposits_order_number` BEFORE INSERT ON `slj_deposits` FOR EACH ROW IF NEW.order_number IS NULL THEN
           SET NEW.order_number = concat("DP",  IF((SELECT MAX(id) FROM slj_deposits ) < 100000,  100000,  (SELECT MAX(id)+ 1 FROM slj_deposits )));        
    END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slj_designations`
--

CREATE TABLE `slj_designations` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `department` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_designations`
--

INSERT INTO `slj_designations` (`id`, `designation`, `status`, `department`, `created_at`, `updated_at`) VALUES
(1, 'Fiber Tech Incharge', 'Y', 1, '2020-10-20 20:16:30', '2020-10-20 20:16:30'),
(2, 'In Bound Customer Care Executive', 'Y', 2, '2020-10-20 20:50:12', '2020-10-20 20:50:12'),
(3, 'HR Manager', 'Y', 3, '2023-07-14 18:12:42', '2023-07-14 18:12:42'),
(4, 'Inventory Manager', 'Y', 4, '2023-07-14 21:59:26', '2023-07-14 21:59:26'),
(5, 'Sales Manager', 'Y', 5, '2023-09-07 21:34:10', '2023-09-07 21:34:10'),
(6, 'Sales Excutive', 'Y', 5, '2023-11-11 02:16:34', '2023-11-11 02:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `slj_distributors`
--

CREATE TABLE `slj_distributors` (
  `id` int(11) NOT NULL,
  `distributor_id` varchar(11) NOT NULL,
  `distributor_name` varchar(255) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `area_description` varchar(200) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `rent` int(11) DEFAULT NULL,
  `long_lat` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bank_account` varchar(30) DEFAULT NULL,
  `bank_holder_name` varchar(200) DEFAULT NULL,
  `ifsc_code` varchar(30) DEFAULT NULL,
  `bank_branch_name` varchar(200) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_distributors`
--

INSERT INTO `slj_distributors` (`id`, `distributor_id`, `distributor_name`, `office_address`, `area_description`, `city`, `rent`, `long_lat`, `user_id`, `bank_account`, `bank_holder_name`, `ifsc_code`, `bank_branch_name`, `bank_name`, `created_at`, `updated_at`) VALUES
(3, 'SLJDR00001', 'Prathipadu', '12345678', 'Prathipadu constency', 1, 16000, '16.3404422,80.4359842', 210, '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', '2020-08-03 16:50:45', '2020-08-03 16:50:45'),
(5, 'SLJDR00003', 'Guntur East', 'SLJ FIBER NETWORKS PVT.LTD', 'Guntur East Assambly Constitution', 1, 16000, '16.3122746,80.4346877', 317, '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'Lakshmi villas Bank', '2023-01-21 18:25:28', '2023-01-21 18:25:28'),
(6, 'SLJDR00004', 'Prathipadu', 'Annapurna Nagar West', 'Prathipadu Constency', 1, 4000, '16.335825319390914, 80.43873540447942', 340, '12346796789', 'Balakoti Reddy', 'SBI12345678', 'Gorantla', 'SBI Bank', '2023-10-16 01:08:07', '2023-10-16 01:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `slj_dp`
--

CREATE TABLE `slj_dp` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `franchise` int(11) NOT NULL,
  `fiber` int(11) NOT NULL,
  `fiber_color` varchar(55) DEFAULT NULL,
  `olt_id` int(11) NOT NULL,
  `olt_port_num` varchar(50) NOT NULL,
  `long_lat` varchar(50) NOT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `splitter` varchar(50) NOT NULL,
  `generate_dp` varchar(30) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `splitter_serialno` int(11) DEFAULT NULL,
  `enclosure_serialno` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_dp`
--

INSERT INTO `slj_dp` (`id`, `city`, `distributor`, `branch`, `franchise`, `fiber`, `fiber_color`, `olt_id`, `olt_port_num`, `long_lat`, `latitude`, `longitude`, `splitter`, `generate_dp`, `user_id`, `splitter_serialno`, `enclosure_serialno`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 9, 21, 3, 'blue', 1, '2', '16.2802828,80.4498619', '16.2802828', '80.4498619', '8', '1/2', 331, 61, 98, '2024-02-26 05:15:56', '2024-02-26 05:15:56'),
(2, 1, 5, 9, 21, 2, 'orange', 1, '2', '16.2799319,80.4497635', '16.2799319', '80.4497635', '8', '1/2', 331, 62, 99, '2023-08-27 09:38:34', '2023-08-27 21:48:04'),
(3, 1, 5, 9, 21, 15, 'green', 1, '3', '16.2797863,80.4493472', '16.2797863', '80.4493472', '8', '1/3', 331, 63, 100, '2023-09-07 04:51:08', '2023-09-02 23:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `slj_dpd`
--

CREATE TABLE `slj_dpd` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `franchise` int(11) NOT NULL,
  `fiber` int(11) NOT NULL,
  `long_lat` varchar(255) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `Enclosure` varchar(190) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_dpd`
--

INSERT INTO `slj_dpd` (`id`, `city`, `distributor`, `branch`, `franchise`, `fiber`, `long_lat`, `user_id`, `Enclosure`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 9, 21, 1, '16.2793605,80.4493861', '331', '97', '2023-08-27 17:49:42', '2023-08-27 17:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `slj_edfa`
--

CREATE TABLE `slj_edfa` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `franchise` int(11) NOT NULL,
  `edfa_serial_number` varchar(255) NOT NULL,
  `edfa_ports` varchar(255) NOT NULL,
  `edfa_company` varchar(255) NOT NULL,
  `edfa_model` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_edfa`
--

INSERT INTO `slj_edfa` (`id`, `city`, `distributor`, `branch`, `franchise`, `edfa_serial_number`, `edfa_ports`, `edfa_company`, `edfa_model`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 9, 0, 'SY2009C00005', '32', 'SYROTECH', 'SY-EYDFA-32x19-36MSW', '2023-08-27 17:28:06', '2023-08-27 17:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `slj_emailverification`
--

CREATE TABLE `slj_emailverification` (
  `id` int(11) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `chkemail` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_emailverification`
--

INSERT INTO `slj_emailverification` (`id`, `email`, `cust_id`, `token`, `status`, `chkemail`, `created_at`, `updated_at`) VALUES
(73, 'sljfibernetworksteam@gmail.com', 1, '9c7de84e5a57b716aba453e3cf78ace61decb91b', 1, NULL, '2023-08-15 22:50:03', '2023-08-15 22:50:03'),
(74, 'kiranbhargavdurgaprasadTivari@gmail.com', 1, '641e166484e245f6f65fffd975066fcc24b3f03d', NULL, NULL, '2023-09-09 19:26:58', '2023-09-09 19:26:58'),
(75, 'kiranbhargavdurgaprasadthivari@gmail.com', 1, '0f4eab2f099148777ab5f98e978686dd7cba3f1f', NULL, NULL, '2023-09-09 19:32:30', '2023-09-09 19:32:30'),
(76, 'kiranbhargavdurgaprasad@gmail.com', 1, '5eabd56b3d97e3adfb7a04243450bfa8470380a5', NULL, NULL, '2023-09-09 19:58:36', '2023-09-09 19:58:36'),
(77, 'kiranbhargavdurgaprasad@gmail.com', 1, '029c7214120cbed2813b68ec546c6b2496e43fd6', NULL, NULL, '2023-09-09 21:19:51', '2023-09-09 21:19:51'),
(78, 'kiranbhargavdurgaprasad@gmail.com', 1, 'fecf50a69374023feb3a0cbebc3790b9eda64560', NULL, NULL, '2023-09-09 21:24:12', '2023-09-09 21:24:12'),
(79, ' kiranbhargavdurgaprasad@gmail.com', 1, '85cd6c02b0870604cc9dee86af84fb79a422d583', NULL, NULL, '2023-09-09 22:03:06', '2023-09-09 22:03:06'),
(80, 'kiranbhargavdurgaprasad@gmail.com', 1, '5d5300cde793a15ec128b139a9e4117f9c6c7f57', NULL, NULL, '2023-09-09 22:03:15', '2023-09-09 22:03:15'),
(81, 'brahmareddy.finrelevent@gmail.com', NULL, '83cfd2c212e9405f335465b6b9d0e4038c4b2145', NULL, NULL, '2023-11-13 01:47:58', '2023-11-13 01:47:58'),
(82, 'brahmareddy.finrelevant@gmail.com', NULL, '6c54d0797dfd244bedcc762356265c1c7219e2a9', NULL, NULL, '2023-11-13 01:56:34', '2023-11-13 01:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `slj_employees`
--

CREATE TABLE `slj_employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(40) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `f_name_c_name` varchar(150) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `department` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `aadhar_card` varchar(125) DEFAULT NULL,
  `pan_card` varchar(125) DEFAULT NULL,
  `employee_photo` varchar(200) DEFAULT NULL,
  `resume` varchar(200) DEFAULT NULL,
  `id_proof` varchar(250) DEFAULT NULL,
  `experience_letter` varchar(250) DEFAULT NULL,
  `sslc` varchar(250) DEFAULT NULL,
  `puc_diploma` varchar(250) DEFAULT NULL,
  `under_graduate` varchar(250) DEFAULT NULL,
  `post_graduate` varchar(250) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `alt_mobile_num` varchar(15) DEFAULT NULL,
  `resignation_date` date DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `resignation_letter` varchar(250) DEFAULT NULL,
  `distributor` varchar(180) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `franch` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_employees`
--

INSERT INTO `slj_employees` (`id`, `employee_id`, `city`, `f_name_c_name`, `user_id`, `address`, `department`, `designation`, `aadhar_card`, `pan_card`, `employee_photo`, `resume`, `id_proof`, `experience_letter`, `sslc`, `puc_diploma`, `under_graduate`, `post_graduate`, `joining_date`, `alt_mobile_num`, `resignation_date`, `note`, `resignation_letter`, `distributor`, `branch`, `franch`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Veeraraghavaiah', 328, 'Flat:502, Tejeswani Appartment, Annapurna Nagar, Gorantla, AP-522007', '1', '1', '', '', '', '', '328-photo-1677909420.pdf', '', '', '', '', '', '2023-03-04', NULL, NULL, NULL, NULL, '5', '9', '21,22,23,24,25,26', '2023-03-05 01:27:00', '2023-03-05 01:27:00'),
(3, 'EID00003', 1, 'Sattar Saheb', 330, 'D.No: 7-25, Pericharla, Guntur-522005', '4', '4', '330-photo-1689335280.jpg', '330-photo-1689335280.jpg', '330-photo-1689335280.jpeg', '330-photo-1689335280.pdf', '330-photo-1689335280.jpg', '', '330-photo-1689335280.jpg', '', '330-aadhar-1689335280.jpg', '', '2023-08-18', NULL, NULL, NULL, NULL, '5', '9', '22', '2023-08-18 05:12:38', '2023-08-18 17:42:38'),
(4, 'EID00004', 1, 'Srinivasa Rao', 331, 'D.No:2-153, Dharmavaram Village, Durgi Manadal,Guntur-522612.', '1', '1', '331-photo-1689769537.jpg', '', '331-photo-1689769537.jpeg', '331-photo-1689769537.pdf', '331-photo-1689769537.jpg', '', '331-photo-1689769537.jpg', '', '331-aadhar-1689769537.jpg', '', '2023-08-26', '8374112383', NULL, NULL, NULL, '5', '9', '21,22,23,24,25,26', '2023-08-26 06:47:04', '2023-08-26 19:17:04'),
(7, 'EID00005', 1, 'Dasu', 334, 'Flat:307, Privallage Block, Hasini Infra, Opp: Hosanna Ministries, Gorantla, Pin-522034', '3', '3', '334-photo-1693291198.pdf', '334-photo-1693291198.pdf', '334-photo-1693291198.jpeg', '334-photo-1693291198.pdf', '334-photo-1693291198.pdf', '', '334-photo-1693291198.pdf', '334-photo-1693291198.pdf', '334-aadhar-1693291198.pdf', '', '2023-08-29', '9573650150', '2023-12-17', 'resigned', '', '5', '9', '21,22,23,24,25,26', '2023-12-17 10:37:17', '2023-12-17 23:07:17'),
(8, 'EID00008', 1, 'Kota Dasu', 335, 'D.No: 4-71,Hanuman Nagar 2nd Line,Gorantla,Guntur-522034.', '3', '3', '335-photo-1694080742.jpeg', '335-photo-1694080742.jpeg', '335-photo-1694080760.jpeg', '335-photo-1694080742.pdf', '335-photo-1694080742.jpeg', '', '335-photo-1694080742.jpeg', '335-photo-1694080742.jpeg', '', '', '2023-11-12', NULL, NULL, NULL, NULL, '5', '9', '21,22,23,24,25,26', '2023-11-12 12:59:27', '2023-11-13 01:29:27'),
(13, 'EID00009', 1, 'Srinivas', 348, 'Guntur', '1', '1', '348-photo-1699160266.jpeg', '348-photo-1699160266.jpeg', '348-photo-1699160281.jpeg', '348-photo-1699160266.jpg', '348-photo-1699114293.png', '', '348-photo-1699160266.jpg', '348-photo-1699114293.png', '348-aadhar-1699114293.png', '', '2023-11-05', NULL, '2023-12-17', 'resigned', '', '6', '10', '27', '2023-12-17 10:36:59', '2023-12-17 23:06:59'),
(14, 'EID00014', 1, 'Ramarao', 350, 'D.No: 3-68,  Peravalli(V), Vemuru(M), Guntur-5222261.', '1', '1', '350-photo-1699600629.pdf', '350-photo-1699600629.pdf', '350-photo-1699601174.jpeg', '350-photo-1699600629.docx', '350-photo-1699600629.pdf', '', '', '350-photo-1699600629.pdf', '350-aadhar-1699600629.pdf', '', '2023-11-13', '8142633338', NULL, NULL, NULL, '6', '11', '29', '2023-11-13 04:47:29', '2023-11-13 17:17:29'),
(15, 'EID00015', 1, 'Nagamalleswara Rao', 353, 'D.no:1-48, SC Colony, Narnepadu, Muppallamandal, palnadu Zilla, AP-522403', '5', '6', '353-photo-1699796430.jpeg', '353-photo-1699796430.jpeg', '353-photo-1699796427.jpeg', '353-photo-1699796485.pdf', '353-photo-1699623814.jpg', '', '353-photo-1699796430.jpeg', '', '', '', '2023-11-12', '9010998929', NULL, NULL, NULL, '6', '11', '29', '2023-11-12 13:41:25', '2023-11-13 02:11:25');

--
-- Triggers `slj_employees`
--
DELIMITER $$
CREATE TRIGGER `slj_employees_BEFORE_INSERT` BEFORE INSERT ON `slj_employees` FOR EACH ROW BEGIN
	  SET @auto_id := (SELECT
		  MAX(ID)
		FROM slj_employees);
	IF ( @auto_id = NULL) THEN
		SET @auto_id = 1;
	ELSE 
		SET @auto_id = @auto_id + 1;    
	END IF;

	  SET new.employee_id = CONCAT('EID', LPAD(@auto_id, 5, 0));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slj_fh`
--

CREATE TABLE `slj_fh` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `franchise` int(11) NOT NULL,
  `olt_id` int(11) NOT NULL,
  `dp_num` int(11) NOT NULL,
  `fiber` int(11) NOT NULL,
  `fiber_color` varchar(50) NOT NULL,
  `splitter` varchar(20) DEFAULT NULL,
  `serial_no` varchar(233) DEFAULT NULL,
  `splitter_core` varchar(50) NOT NULL,
  `dp_port` int(30) DEFAULT NULL,
  `long_lat` varchar(50) NOT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `generate_fh_id` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `termination_box` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_fh`
--

INSERT INTO `slj_fh` (`id`, `city`, `distributor`, `branch`, `franchise`, `olt_id`, `dp_num`, `fiber`, `fiber_color`, `splitter`, `serial_no`, `splitter_core`, `dp_port`, `long_lat`, `latitude`, `longitude`, `generate_fh_id`, `user_id`, `termination_box`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 9, 21, 1, 1, 4, 'blue', '8', NULL, '1', NULL, '16.2805274,80.4505963', NULL, NULL, '1/1/1', 331, '10', '2023-08-28 01:30:36', '2023-08-28 01:30:36'),
(2, 1, 5, 9, 21, 1, 1, 5, 'orange', '8', NULL, '2', NULL, '16.2800662,80.4504717', NULL, NULL, '1/1/2', 331, '10', '2023-08-28 01:35:18', '2023-08-28 01:35:18'),
(3, 1, 5, 9, 21, 1, 1, 6, 'green', '8', NULL, '3', NULL, '16.2777514,80.4502096', NULL, NULL, '1/1/3', 331, '10', '2023-08-28 20:26:51', '2023-08-28 20:26:51'),
(4, 1, 5, 9, 21, 1, 1, 8, 'brown', '8', NULL, '4', NULL, '16.2808873,80.4491844', NULL, NULL, '1/1/4', 331, '10', '2023-08-29 19:53:35', '2023-08-29 19:53:35'),
(5, 1, 5, 9, 21, 1, 1, 7, 'slate', '8', NULL, '5', NULL, '16.279587,80.4484988', NULL, NULL, '1/1/5', 331, '10', '2023-08-29 20:01:58', '2023-08-29 20:01:58'),
(6, 1, 5, 9, 21, 1, 2, 9, 'blue', '8', NULL, '1', NULL, '16.2799261,80.4498254', NULL, NULL, '1/2/1', 331, '10', '2023-08-30 23:39:05', '2023-08-30 23:39:05'),
(7, 1, 5, 9, 21, 1, 2, 14, 'orange', '8', NULL, '2', NULL, '16.2799266,80.4498062', NULL, NULL, '1/2/2', 331, '10', '2023-08-30 23:41:19', '2023-08-30 23:41:19'),
(8, 1, 5, 9, 21, 1, 2, 10, 'green', '8', NULL, '3', NULL, '16.2799266,80.4498062', NULL, NULL, '1/2/3', 331, '10', '2023-08-30 23:43:07', '2023-08-30 23:43:07'),
(9, 1, 5, 9, 21, 1, 2, 11, 'brown', '8', NULL, '4', NULL, '16.2777514,80.4502096', NULL, NULL, '1/2/4', 331, '10', '2023-08-30 23:45:39', '2023-08-30 23:45:39'),
(10, 1, 5, 9, 21, 1, 2, 12, 'slate', '8', NULL, '5', NULL, '16.2808374,80.4460378', NULL, NULL, '1/2/5', 331, '10', '2023-08-30 23:47:45', '2023-08-30 23:47:45'),
(11, 1, 5, 9, 21, 1, 2, 13, 'white', '8', NULL, '6', NULL, '16.2808066,80.4459837', NULL, NULL, '1/2/6', 331, '10', '2023-08-30 23:49:37', '2023-08-30 23:49:37'),
(12, 1, 5, 9, 21, 1, 3, 17, 'blue', '8', NULL, '1', NULL, '16.2796348,80.4494378', NULL, NULL, '1/3/1', 331, '10', '2023-09-02 23:05:55', '2023-09-02 23:05:55'),
(13, 1, 5, 9, 21, 1, 3, 21, 'red', '8', NULL, '3', NULL, '16.2796331,80.4503613', NULL, NULL, '1/3/3', 331, '10', '2023-09-02 12:49:09', '2023-09-02 23:09:26'),
(14, 1, 5, 9, 21, 1, 3, 20, 'green', '8', NULL, '2', NULL, '16.2799189,80.4498619', NULL, NULL, '1/3/2', 331, '10', '2023-09-03 01:22:51', '2023-09-03 01:22:51'),
(15, 1, 5, 9, 21, 1, 3, 16, 'blue', '8', NULL, '4', NULL, '16.2799189,80.4498619', NULL, NULL, '1/3/4', 331, '10', '2023-09-03 01:27:56', '2023-09-03 01:27:56'),
(16, 1, 5, 9, 21, 1, 3, 18, 'slate', '8', NULL, '5', NULL, '16.2797732,80.4493307', NULL, NULL, '1/3/5', 331, '10', '2023-09-03 01:31:09', '2023-09-03 01:31:09'),
(17, 1, 5, 9, 21, 1, 3, 19, 'blue', '8', NULL, '6', NULL, '16.2801651,80.4479482', NULL, NULL, '1/3/6', 331, '10', '2023-09-03 01:34:44', '2023-09-03 01:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `slj_fiberlaying_stock`
--

CREATE TABLE `slj_fiberlaying_stock` (
  `id` int(11) NOT NULL,
  `product_name` varchar(150) DEFAULT NULL,
  `manufact_year` int(11) DEFAULT NULL,
  `drum_number` varchar(120) DEFAULT NULL,
  `vendors_suppliers` varchar(150) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `start_reading` int(11) DEFAULT NULL,
  `end_reading` int(11) DEFAULT NULL,
  `fiber_core` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_fiberlaying_stock`
--

INSERT INTO `slj_fiberlaying_stock` (`id`, `product_name`, `manufact_year`, `drum_number`, `vendors_suppliers`, `length`, `start_reading`, `end_reading`, `fiber_core`, `created_at`, `updated_at`) VALUES
(1, '19', 2018, 'D5689', '5', 107, 1625, 1518, 6, NULL, NULL),
(2, '19', 2019, 'D3237', '5', 168, 1002, 1170, 6, NULL, NULL),
(5, '19', 2019, 'D1678', '5', 46, 651, 697, 6, NULL, NULL),
(6, '19', 2016, 'D3237', '5', 90, 250, 340, 6, NULL, NULL),
(7, '19', 2016, 'D8589', '5', 95, 1730, 1825, 6, NULL, NULL),
(8, '19', 2016, 'D3237', '5', 62, 348, 410, 6, NULL, NULL),
(9, '19', 2016, 'D3237', '5', 78, 415, 493, 6, NULL, NULL),
(10, '19', 2019, 'D0784', '5', 134, 1167, 1301, 6, NULL, NULL),
(11, '19', 2016, 'D3237', '5', 166, 173, 339, 6, NULL, NULL),
(12, '20', 2017, 'D6418', '5', 192, 404, 596, 4, NULL, NULL),
(13, '20', 2018, 'D1334', '5', 273, 974, 1247, 4, NULL, NULL),
(14, '20', 2018, 'D1334', '5', 119, 789, 908, 4, NULL, NULL),
(15, '20', 2015, 'D0138', '5', 108, 1555, 1663, 4, NULL, NULL),
(16, '20', 2016, 'D3994', '5', 91, 46, 137, 4, NULL, NULL),
(17, '20', 2017, 'D0418', '5', 303, 609, 912, 4, NULL, NULL),
(18, '20', 2016, 'D8368', '5', 290, 2707, 2997, 4, NULL, NULL),
(19, '19', 2019, 'D3614', '5', 372, 351, 723, 6, NULL, NULL),
(20, '19', 2020, 'D6766', '5', 318, 1431, 1749, 6, NULL, NULL),
(21, '19', 2020, 'D7475', '5', 220, 2001, 2221, 6, NULL, NULL),
(22, '19', 2021, 'D1678', '5', 121, 529, 650, 6, NULL, NULL),
(23, '19', 2021, 'D1678', '5', 46, 651, 697, 6, NULL, NULL),
(24, '20', 2017, 'D6418', '5', 28, 467, 495, 4, NULL, NULL),
(25, '19', 2018, 'D5689', '5', 98, 1628, 1726, 6, NULL, NULL),
(26, '19', 2018, 'D5689', '5', 95, 1730, 1825, 6, NULL, NULL),
(27, '19', 2020, 'D7475', '5', 187, 1811, 1998, 6, '2023-09-01 18:26:06', '2023-09-01 18:26:06'),
(28, '20', 2018, 'D6418', '5', 215, 689, 904, 4, '2023-09-01 23:31:59', '2023-09-01 23:31:59'),
(29, '20', 2017, 'D6418', '5', 21, 443, 464, 4, '2023-09-03 20:03:25', '2023-09-03 20:03:25'),
(30, '20', 2016, 'D8368', '5', 235, 1799, 2034, 4, '2023-09-03 20:07:51', '2023-09-03 20:07:51'),
(31, '19', 2016, 'D3237', '5', 66, 23, 89, 6, '2023-09-03 20:11:29', '2023-09-03 20:11:29'),
(32, '20', 2015, 'D0138', '5', 105, 1557, 1662, 4, '2023-09-03 20:16:42', '2023-09-03 20:16:42'),
(33, '19', 2021, 'D1678', '5', 171, 225, 396, 6, '2023-09-05 18:54:23', '2023-09-05 18:54:23'),
(34, '20', 2016, 'D8368', '5', 136, 2799, 2935, 4, '2023-09-05 18:59:50', '2023-09-05 18:59:50'),
(35, '19', 2016, 'D3237', '5', 66, 23, 89, 6, '2023-09-05 19:08:39', '2023-09-05 19:08:39'),
(36, '20', 2017, 'D6418', '5', 21, 443, 464, 4, '2023-09-05 19:13:59', '2023-09-05 19:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `slj_fiber_laying`
--

CREATE TABLE `slj_fiber_laying` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `franchise` int(11) NOT NULL,
  `fiber_to` varchar(30) NOT NULL,
  `fiber_name` varchar(50) NOT NULL,
  `fiber_company_name` varchar(50) NOT NULL,
  `fiber_code` varchar(50) NOT NULL,
  `fiber_core` varchar(50) NOT NULL,
  `fiber_color` varchar(200) NOT NULL,
  `route_description` varchar(255) NOT NULL,
  `fiber_starting_reading` varchar(50) DEFAULT NULL,
  `fiber_starting_long_lat` varchar(50) DEFAULT NULL,
  `fiber_ending_reading` varchar(50) DEFAULT NULL,
  `ending_long_lat` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fiber_laying_fiber_distance` decimal(13,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_fiber_laying`
--

INSERT INTO `slj_fiber_laying` (`id`, `city`, `distributor`, `branch`, `franchise`, `fiber_to`, `fiber_name`, `fiber_company_name`, `fiber_code`, `fiber_core`, `fiber_color`, `route_description`, `fiber_starting_reading`, `fiber_starting_long_lat`, `fiber_ending_reading`, `ending_long_lat`, `created_at`, `updated_at`, `fiber_laying_fiber_distance`, `user_id`) VALUES
(1, 1, 5, 9, 21, 'dpd', 'LR COLONY DPD 1', 'Hexa gold willett', 'D6766', '6', 'blue,orange,green,brown,slate,white', 'LR colony office opp road,lr colony 4th line ,1st cross road', '1749', '16.2789413,80.4503875', '1431', '16.2777514,80.4502096', '2023-08-25 20:46:26', '2023-08-25 20:46:26', '318.00', 331),
(2, 1, 5, 9, 21, 'dp', 'LR COLONY DPD 1 to DP2', 'HEXA GOLD WILLETT', 'D7475', '6', 'blue,orange,green,brown,slate,white', 'Dpd to towards 3rd ,2nd & 1 st cross road', '2001', '16.2793565,80.44934', '2221', '16.2800376,80.4492503', '2023-08-26 01:38:43', '2023-08-26 01:38:43', '220.00', 331),
(3, 1, 5, 9, 21, 'dp', 'LR COLONY DP2 TO DP1', 'SPEC', 'D1678', '6', 'blue,orange,green,brown,slate,white', 'LR colony dp2 to dp 1 towards the 1st line &0th line cross road', '529', '16.280067,80.4492444', '650', '16.2777514,80.4502096', '2023-08-28 09:03:40', '2023-08-26 22:21:27', '121.00', 331),
(4, 1, 5, 9, 21, 'fh', 'LR DP1 to FH 1', 'POLYWIRES', 'D3237', '6', 'blue,orange,green,brown,slate,white', 'dp1 to towards the main road', '1002', '16.2805435,80.4492349', '1170', '16.2802828,80.4498619', '2023-08-26 23:33:33', '2023-08-26 23:33:33', '168.00', 331),
(5, 1, 5, 9, 21, 'fh', 'FH1 to FH2', 'POLYWIRES', 'D5689', '6', 'blue,orange,green,brown,slate,white', 'FH1 to towards the main road', '1625', '16.2801715,80.4492406', '1518', '16.2800664,80.4504624', '2023-08-26 23:38:25', '2023-08-26 23:38:25', '107.00', 331),
(6, 1, 5, 9, 21, 'fh', 'dp1 to fh3', 'WALLETT', 'D6418', '4', 'blue,orange,green,brown', 'dp1pole,same pole in fh3', '467', '16.2801446,80.4492522', '0495', '16.2801446,80.4492522', '2023-08-28 17:56:39', '2023-08-28 17:56:39', '28.00', 331),
(7, 1, 5, 9, 21, 'fh', 'dp1 to fh5', 'SPEC', 'D1678', '6', 'blue,orange,green,brown,slate,white', 'dp1 to up side of the lr 0th line', '651', '16.2801757,80.4492462', '697', '16.2802356,80.448819', '2023-08-28 18:50:19', '2023-08-28 18:50:19', '46.00', 331),
(8, 1, 5, 9, 21, 'fh', 'dp1 to fh4', 'POLYWIRES', '150', '6', 'blue,orange,green,brown,slate,white', 'dp1 point towards the right side', '1726', '16.2805808,80.4492029', '1628', '16.2808986,80.449187', '2023-08-29 19:49:51', '2023-08-29 19:49:51', '98.00', 331),
(9, 1, 5, 9, 21, 'fh', 'dp2 to fh1', 'POLYWIRES', '130', '6', 'blue,orange,green,brown,slate,white', 'dp2 towards the cross road pole', '410', '16.2799697,80.4492434', '348', '16.2799697,80.4492434', '2023-08-29 23:14:11', '2023-08-29 23:14:11', '62.00', 331),
(10, 1, 5, 9, 21, 'fh', 'fh2 to fh3', 'POLYWIRES', '128', '6', 'blue,orange,green,brown,slate,white', 'fh2 to towards the main road 1st. pole', '340', '16.2797049,80.4492783', '250', '16.2797049,80.4492783', '2023-08-29 23:29:10', '2023-08-29 23:29:10', '90.00', 331),
(11, 1, 5, 9, 21, 'fh', 'dp2 to fh4', 'POLYWIRES', '131', '6', 'blue,orange,green,brown,slate,white', 'dp to upside of the 2cross road', '415', '16.2800971,80.4492463', '493', '16.280272,80.4486155', '2023-08-30 00:17:06', '2023-08-30 00:17:06', '78.00', 331),
(12, 1, 5, 9, 21, 'fh', 'Fh 4th to Fh 5th', 'POLYWIRES', '132', '6', 'blue,orange,green,brown,slate,white', 'fh4 to towards the up side 3 pole', '1301', '16.2802702,80.4486184', '1167', '16.2803861,80.4479906', '2023-08-30 00:55:14', '2023-08-30 00:55:14', '134.00', 331),
(13, 1, 5, 9, 21, 'fh', 'Fh 5th to  Fh 6th', 'POLYWIRES', '133', '6', 'blue,orange,green,brown,slate,white', 'fh5 to upside of the 2 pole', '173', '16.2808374,80.4460378', '339', '16.2807834,80.4465146', '2023-08-30 01:55:15', '2023-08-30 01:55:15', '166.00', 331),
(14, 1, 5, 9, 21, 'fh', 'Fh 1st to 2 Fh', 'POLYWIRES', '151', '6', 'blue,orange,green,brown,slate,white', 'LR 1 fh towards the main road 1pole', '1825', '16.2799385,80.4497511', '1730', '16.2799129,80.4498701', '2023-08-30 23:35:03', '2023-08-30 23:35:03', '95.00', 331),
(15, 1, 5, 9, 21, 'dp', 'DPD1 TO DP3', 'HEXA GOLD WILLETT', '152', '6', 'blue,orange,green,brown,slate,white', 'dpd1 to towards the 3rd , cross road to 2 line left 1 pole', '1811', '16.2774247704204,80.45300960540771', '1998', '16.2797752,80.4493244', '2023-09-01 22:18:59', '2023-09-01 22:18:59', '187.00', 331),
(16, 1, 5, 9, 21, 'fh', 'dp3 to fh4', 'WILLET', '136', '4', 'blue,orange,green,slate', 'fh 4 is the sne pole of dp pole', '789', '16.2797752,80.4493354', '814', '16.2797834,80.4493429', '2023-09-02 12:39:35', '2023-09-03 01:09:35', '25.00', 331),
(17, 1, 5, 9, 21, 'fh', 'dp3 to fh1', 'WILLET', '136', '4', 'blue,orange,green,brown', 'dp3 towards the 2nd line cross road pole', '815', '16.279781,80.44934', '907', '16.2797838,80.4493413', '2023-09-01 23:06:05', '2023-09-01 23:06:05', '92.00', 331),
(18, 1, 5, 9, 21, 'fh', 'dp3 to fh5', 'WILLET', '135', '4', 'blue,orange,green,slate', 'dp3 to upside of the 2 line 1 st pole', '974', '16.2797838,80.4493413', '1073', '16.2797838,80.4493413', '2023-09-02 12:40:49', '2023-09-03 01:10:49', '99.00', 331),
(19, 1, 5, 9, 21, 'fh', 'dp3 to fh6', 'WILLET', '135', '4', 'blue,orange,green,slate', 'fh 5 to upside of the 2nd line 2pole', '1074', '16.2797838,80.4493413', '1246', '16.2797435,80.449222', '2023-09-02 12:41:07', '2023-09-03 01:11:07', '172.00', 331),
(20, 1, 5, 9, 21, 'fh', 'dp3 to fh2', 'WILLET', '153', '4', 'blue,green,red,yellow', 'dp3 to towards the main road', '689', '16.2798173,80.4492862', '824', '16.2798173,80.4492862', '2023-09-02 12:32:33', '2023-09-03 01:02:33', '135.00', 331),
(21, 1, 5, 9, 21, 'fh', 'fh2 to fh3', 'WILLET', '153', '4', 'blue,green,red,yellow', 'fh2 to towards the main road', '825', '16.2796351,80.4503499', '904', '16.2796357,80.4503494', '2023-09-02 12:34:42', '2023-09-03 01:04:42', '79.00', 331),
(22, 1, 5, 9, 21, 'dp', 'DPD 1 TO DP 4', 'SPEC', '158', '6', 'blue,orange,green,brown,slate,white', '4th cross to towards the 3rd line cross road left side 2 ploe', '396', '16.2795714,80.448589', '225', '16.2795714,80.448589', '2023-09-05 19:45:55', '2023-09-05 19:45:55', '171.00', 331);

-- --------------------------------------------------------

--
-- Table structure for table `slj_franchises`
--

CREATE TABLE `slj_franchises` (
  `id` int(11) NOT NULL,
  `franchise_id` varchar(11) DEFAULT NULL,
  `franchise_name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `aadhar` varchar(12) DEFAULT NULL,
  `landline` varchar(30) DEFAULT NULL,
  `agreement_address` varchar(255) DEFAULT NULL,
  `bank_account` varchar(30) DEFAULT NULL,
  `bank_holder_name` varchar(200) DEFAULT NULL,
  `ifsc_code` varchar(30) DEFAULT NULL,
  `bank_branch_name` varchar(30) DEFAULT NULL,
  `bank_name` varchar(30) DEFAULT NULL,
  `area_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `credited_balance` float DEFAULT '0',
  `debited_balance` float DEFAULT '0',
  `available_balance` float DEFAULT '0',
  `vlan` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_franchises`
--

INSERT INTO `slj_franchises` (`id`, `franchise_id`, `franchise_name`, `user_id`, `city`, `distributor_id`, `branch`, `aadhar`, `landline`, `agreement_address`, `bank_account`, `bank_holder_name`, `ifsc_code`, `bank_branch_name`, `bank_name`, `area_description`, `created_at`, `updated_at`, `credited_balance`, `debited_balance`, `available_balance`, `vlan`) VALUES
(21, 'SLJFR00004', 'LRCOLONY', 319, 1, 5, 9, '4453457', NULL, 'Flat:101, Block:B, Shiva Green Vally, Gorantla.', '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', 'LR COLONY', '2023-01-21 19:23:32', '2023-01-21 19:23:32', 0, 0, 0, '1100'),
(22, 'SLJFR00005', 'IPD COLONY', 320, 1, 5, 9, '0975432455', NULL, 'Flat:101, Block: B, Siva Green Valley, Gorantla', '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', 'IPD COLONY 1st Lane To 11th Lane', '2023-01-21 19:26:36', '2023-01-21 19:26:36', 0, 0, 0, '1100'),
(23, 'SLJFR00006', 'REDLA BAZAR', 321, 1, 5, 9, '0975432455', NULL, 'Flat:101, Block: B, Siva Green Valley, Gorantla', '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', 'Redla bazar area', '2023-01-21 19:28:49', '2023-01-21 19:28:49', 0, 0, 0, '1100'),
(24, 'SLJFR00007', 'INDRA COLONY', 322, 1, 5, 9, '0975432455', NULL, 'Flat:101, Block: B, Siva Green Valley, Gorantla', '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', 'Indra colony area', '2023-01-21 19:31:07', '2023-01-21 19:31:07', 0, 0, 0, '1100'),
(25, 'SLJFR00008', 'GANDHI NAGAR', 323, 1, 5, 9, '0975432455', NULL, 'Flat:101, Block: B, Siva Green Valley, Gorantla', '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', 'Gandhi nagar area', '2023-01-21 19:32:53', '2023-01-21 19:32:53', 0, 0, 0, '1100'),
(26, 'SLJFR00009', 'KOTHAREDDY COLONY', 324, 1, 5, 9, '8765444445', NULL, 'Flat:101, Block-B, Shiva green Valley', '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', 'KOTHA REDDY AREA', '2023-01-21 19:35:21', '2023-01-21 19:35:21', 0, 0, 0, '1100'),
(27, 'SLJFR00010', 'SRI RAM NAGAR', 343, 1, 6, 10, '121243254363', NULL, 'Flat:502, Tejeswani apt, Annapurna nagar west', '65235478963', 'SAMMETA VENKATA RAMANA PRASAD', 'sbi76557289', 'GORANTLA', 'SBI', 'ANNAPURNA NAGAR EAST', '2023-10-16 01:19:09', '2023-10-16 01:19:09', 0, 0, 0, '1000'),
(28, 'SLJFR00011', 'Annapurna Nagar East', 349, 1, 6, 10, '343213213322', NULL, NULL, '43243232432432', 'dsadasd asdas da', '3424324423', 'dsfds fdsffsd', 'efsd fdsfsdsfds', 'Annapurna Nagar East area', '2023-11-10 12:16:18', '2023-11-11 00:46:18', 0, 0, 0, '3239'),
(29, 'SLJFR00012', 'LAKSHMI NAGAR', 352, 1, 6, 11, '6985214753', NULL, 'Flat:502, Tejeswani Appartment, Annapurna nagar,Gorantla', '044674987265456', 'Sammeta Venkata Ramana Prasad', 'LAVBDS00408', 'Lakshmi Puram', 'DBS Bank', 'Hosanna Mandhir Back Side', '2023-11-11 00:42:32', '2023-11-11 00:42:32', 0, 0, 0, '980'),
(30, 'SLJFR00013', 'Next Gen School', 354, 1, 6, 11, '0986643456', NULL, 'Flat:502,Tejeswani apt', '0986543357', 'Ramana Prasad', 'Lvbdbs00408', 'Lakshmipuram', 'Db\'s lvb', 'Next Gen school area', '2023-11-11 06:00:11', '2023-11-11 06:00:11', 0, 0, 0, '981'),
(31, 'SLJFR00014', 'Vijaya Durga Nagar', 356, 1, 6, 11, '6985214753', NULL, 'Flat: 502', '044674987265456', 'Sammeta Venkata Ramana Prasad', 'LAVBDS00408', 'Lakshmi Puram', 'DBS Bank', 'Beside hosanna Mandhir', '2024-02-17 18:59:09', '2024-02-17 18:59:09', 0, 0, 0, '982');

-- --------------------------------------------------------

--
-- Table structure for table `slj_invoices`
--

CREATE TABLE `slj_invoices` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(50) DEFAULT NULL,
  `txn_id` int(11) DEFAULT NULL,
  `payment_gateway_txn_id` varchar(250) DEFAULT NULL,
  `ptype` int(11) DEFAULT NULL,
  `po_number` varchar(45) DEFAULT NULL,
  `from_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `renewed_by` int(11) DEFAULT NULL,
  `payment_mode` varchar(200) DEFAULT NULL,
  `payment_details` varchar(200) DEFAULT NULL,
  `payment_gateway` varchar(200) DEFAULT NULL,
  `sub_package` varchar(5000) DEFAULT NULL,
  `package` varchar(5000) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `Invoice_date` timestamp NULL DEFAULT NULL,
  `base_price` decimal(13,2) DEFAULT NULL,
  `paid_amount` decimal(13,2) DEFAULT NULL,
  `current_balance` decimal(13,2) DEFAULT '0.00',
  `gst_value` varchar(45) DEFAULT NULL,
  `sgst_value` varchar(45) DEFAULT NULL,
  `cgst_value` varchar(45) DEFAULT NULL,
  `gst_amount` decimal(13,2) DEFAULT NULL,
  `sgst_amount` decimal(13,2) DEFAULT NULL,
  `cgst_amount` decimal(13,2) DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `address` text,
  `gst_number` varchar(20) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(105) DEFAULT NULL,
  `name` varchar(105) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `cancelled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: cancelled 0: not cancelled',
  `paid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - un-paid, 1-paid ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_for` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `invoice_type` varchar(50) NOT NULL COMMENT '''monthly''=> ''Monthly'',''quarterly''=>''Quarterly'', ''half_yearly'' => ''Half-Yearly'', ''yearly''=> ''yearley''',
  `payment_flow_type` varchar(50) NOT NULL COMMENT '''inward''=>''Inward Cash Flow'',''outward''=>''Outward Cash Flow''',
  `created_to` int(11) DEFAULT NULL COMMENT 'Invoice create to user role \n\n1. Branch\n2. Franchise \n3. Customer \n4. SLJ admin',
  `franchise_branch_id` int(11) DEFAULT NULL,
  `created_from` int(11) DEFAULT NULL COMMENT 'Logged in user role \n\n1. Branch\n2. Franchise \n3. Customer \n4. SLJ admin',
  `discount_amount` decimal(13,2) DEFAULT NULL,
  `pay_mode` varchar(100) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `reference_number` varchar(500) DEFAULT NULL,
  `paid_through` varchar(100) DEFAULT NULL,
  `paid_date` timestamp NULL DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_pickup_date` timestamp NULL DEFAULT NULL,
  `cheque_status` varchar(100) DEFAULT NULL,
  `bill_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_invoices`
--

INSERT INTO `slj_invoices` (`id`, `invoice_number`, `txn_id`, `payment_gateway_txn_id`, `ptype`, `po_number`, `from_date`, `end_date`, `amount`, `renewed_by`, `payment_mode`, `payment_details`, `payment_gateway`, `sub_package`, `package`, `payment_date`, `Invoice_date`, `base_price`, `paid_amount`, `current_balance`, `gst_value`, `sgst_value`, `cgst_value`, `gst_amount`, `sgst_amount`, `cgst_amount`, `total_amount`, `address`, `gst_number`, `phone`, `email`, `name`, `type`, `status`, `cancelled`, `paid`, `created_at`, `updated_at`, `created_by`, `created_for`, `updated_by`, `invoice_type`, `payment_flow_type`, `created_to`, `franchise_branch_id`, `created_from`, `discount_amount`, `pay_mode`, `note`, `reference_number`, `paid_through`, `paid_date`, `payment_type`, `payment_pickup_date`, `cheque_status`, `bill_number`) VALUES
(1, NULL, 1, NULL, 1, 'SLJ00000001', NULL, NULL, '590.00', NULL, 'Cash', NULL, NULL, 'SLJ Home Monthly', 'SLJ Home', '2023-02-11 22:24:15', '2023-02-11 22:24:15', '590.00', '590.00', '590.00', NULL, NULL, NULL, NULL, NULL, NULL, '590.00', 'dd', NULL, '9502973367', 'jivi@gmail.com', 'durga prasad', NULL, 1, 0, 1, '2023-02-11 22:24:15', '2023-02-11 22:24:15', 2, 1, NULL, 'New', 'inward', 3, NULL, 4, NULL, NULL, NULL, NULL, 'cash', NULL, 'New Connection', NULL, NULL, 1),
(2, 'IN100000', 1, NULL, 1, 'SLJ00000003', NULL, NULL, '5949.00', NULL, 'Cash', NULL, NULL, 'SLJ Standrd Half-Yearly + One Month Free', 'SLJ Standard', '2023-11-13 01:59:16', '2023-11-13 01:59:16', '4949.00', '5949.00', '5949.00', NULL, NULL, NULL, NULL, NULL, NULL, '5949.00', '8th Lane, Lakshmi Nagar, Gorantla', NULL, '7680081678', 'brahmareddy.finrelevant@gmail.com', 'Brahmareddy Kandhula', NULL, 1, 0, 1, '2023-11-13 01:59:16', '2023-11-13 01:59:16', 353, 3, NULL, 'New', 'inward', 3, NULL, 4, NULL, NULL, NULL, NULL, 'cash', NULL, 'New Connection', NULL, NULL, 2);

--
-- Triggers `slj_invoices`
--
DELIMITER $$
CREATE TRIGGER `slj_invoices_invoice_number` BEFORE INSERT ON `slj_invoices` FOR EACH ROW IF NEW.invoice_number IS NULL THEN
           SET NEW.invoice_number = concat("IN",  IF((SELECT MAX(id) FROM slj_invoices ) < 100000,  100000,  (SELECT MAX(id)+1 FROM slj_invoices )  ));
    END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slj_iptv_packages`
--

CREATE TABLE `slj_iptv_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `channels_description` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `gst` varchar(10) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `status` varchar(1) DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `distributor_share` float DEFAULT NULL,
  `franchise_share` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_iptv_packages`
--

INSERT INTO `slj_iptv_packages` (`id`, `package_name`, `channels_description`, `type`, `price`, `gst`, `total_amount`, `status`, `created_at`, `updated_at`, `distributor_share`, `franchise_share`) VALUES
(1, 'MAA TV', 'MAA TV', 'allacart', '19', '18', '22.42', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(2, 'ETV', 'ETV', 'allacart', '17', '18', '20.06', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(4, 'GEMINI TV', 'GEMINI TV', 'allacart', '19', '18', '22.42', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(5, 'ZEE TELUGU', 'ZEE TELUGU', 'allacart', '19', '18', '22.42', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(6, 'MAA MOVIES', 'MAA MOVIES', 'allacart', '10', '18', '11.8', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(7, 'ETV CINEMA', 'ETV CINEMA', 'allacart', '6', '18', '7.08', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(8, 'GEMINI MOVIES', 'GEMINI MOVIES', 'allacart', '17', '18', '20.06', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(9, 'ZEE CINEMALU', 'ZEE CINEMALU', 'allacart', '10', '18', '11.8', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(10, 'MAA GOLD', 'MAA GOLD', 'allacart', '2', '18', '2.36', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(11, 'ETV PLUS', 'ETV PLUS', 'allacart', '7', '18', '8.26', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(12, 'GEMINI COMEDY', 'GEMINI COMEDY', 'allacart', '5', '18', '5.9', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(13, 'ETV LIFE', 'ETV LIFE', 'allacart', '1', '18', '1.18', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(14, 'ETV ABHIRUCHI', 'ETV ABHIRUCHI', 'allacart', '2', '18', '2.36', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(15, 'GEMINI LIFE', 'GEMINI LIFE', 'allacart', '5', '18', '5.9', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(16, 'MAA MUSIC', 'MAA MUSIC', 'allacart', '1', '18', '1.18', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(17, 'GEMINI MUSIC', 'GEMINI MUSIC', 'allacart', '4', '18', '4.72', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(18, 'KUSHI TV', 'KUSHI TV', 'allacart', '4', '18', '4.72', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(19, 'VISSA TV', 'VISSA TV', 'allacart', '0.5', '18', '0.59', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(20, 'STAR PLUS', 'STAR PLUS', 'allacart', '19', '18', '22.42', 'Y', '2019-03-10 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(24, 'Telugu Base Pack', 'All Telugu Base Channels', 'base', '130', '18', '153.4', 'Y', '2019-08-06 19:05:54', '2019-08-07 07:35:54', 20, 100),
(25, 'BOLLYWOOD HITZ', 'BOLLYWOOD HITZ', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(26, 'COMEDY 24/7', 'COMEDY 24/7', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(27, 'HARIOM TV', 'HARIOM TV', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(28, 'IBADAAT TV', 'IBADAAT TV', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(29, 'FILIMI GAME', 'FILIMI GAME', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(30, 'NXT HOLLYWOOD ACTION', 'NXT HOLLYWOOD ACTION', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(31, 'NXT TOONS', 'NXT TOONS', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(32, 'NXT RHYEMS', 'NXT RHYEMS', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(33, 'NXT KIDS MOVIES', 'NXT KIDS MOVIES', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(34, 'NXT SANGDEW', 'NXT SANGDEW', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(35, 'NXT TAMIL', 'NXT TAMIL', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(36, 'NXT TELUGU', 'NXT TELUGU', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(37, 'NXT K-WORLD', 'NXT K-WORLD', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(38, 'NXT SOUTH ACTION', 'NXT SOUTH ACTION', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(39, 'NXT BENGALI', 'NXT BENGALI', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(40, 'NXT BHOJPURI', 'NXT BHOJPURI', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(41, 'NXT COOKING', 'NXT COOKING', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(42, 'NXT MALAYALAM', 'NXT MALAYALAM', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(43, 'NXT KIDDO', 'NXT KIDDO', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(44, 'COLORS', 'COLORS', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(45, 'SAB TV', 'SAB TV', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(46, 'SONY PAL', 'SONY PAL', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(47, 'JEET', 'JEET', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(48, '& TV', '& TV', 'allacart', '12', '18', '14.16', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(49, 'ZEE TV', 'ZEE TV', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(50, 'STAR UTSAV', 'STAR UTSAV', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(51, 'RISHTEY', 'RISHTEY', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(52, 'ZEE ANMOL', 'ZEE ANMOL', 'allacart', '0.10', '18', '0.11800000000000001', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(53, 'BIG MAGIC', 'BIG MAGIC', 'allacart', '0.10', '18', '0.12', 'Y', '2019-06-09 11:20:27', '2019-06-09 05:50:27', NULL, NULL),
(54, 'ZEE BIHAR  JHARKHAND', 'ZEE BIHAR  JHARKHAND', 'allacart', '0.10', '18', '0.11800000000000001', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(55, 'SONY MAX', 'SONY MAX', 'allacart', '15', '18', '17.7', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(56, 'STAR GOLD SELECT', 'STAR GOLD SELECT', 'allacart', '7', '18', '8.26', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(57, 'RISHTEY CINEPLEX', 'RISHTEY CINEPLEX', 'allacart', '3', '18', '3.54', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(58, 'SONY WAH', 'SONY WAH', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(59, 'SONY MAX 2', 'SONY MAX 2', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(60, 'STAR UTSAV MOVIES', 'STAR UTSAV MOVIES', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(61, '& PICTURES', '& PICTURES', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(62, 'ZEE ANMOL CINEMA', 'ZEE ANMOL CINEMA', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(63, 'ZEE BOLLYWOOD', 'ZEE BOLLYWOOD', 'allacart', '2', '18', '2.36', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(64, 'ZEE ACTION', 'ZEE ACTION', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(65, 'COLORS MARATHI', 'COLORS MARATHI', 'allacart', '10', '18', '11.8', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(66, 'ZEE MARATHI', 'ZEE MARATHI', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(67, 'ZEE YUVA', 'ZEE YUVA', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(68, 'SONY MARATHI', 'SONY MARATHI', 'allacart', '4', '18', '4.72', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(69, 'ZEE TALKIES', 'ZEE TALKIES', 'allacart', '2', '18', '2.36', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(70, 'NEWS18 LOKMAT', 'NEWS18 LOKMAT', 'allacart', '0.5', '18', '0.59', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(71, 'COLORS GUJARATI', 'COLORS GUJARATI', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(72, 'CNBC BAZAAR', 'CNBC BAZAAR', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(73, 'ZEE 24 KALAK', 'ZEE 24 KALAK', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(74, 'ZEE PUNJAB HARYANA HIMACHAL', 'ZEE PUNJAB HARYANA HIMACHAL', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(75, 'STAR JALSHA', 'STAR JALSHA', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(76, 'SONY AATH', 'SONY AATH', 'allacart', '4', '18', '4.72', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(77, 'ZEE BANGLA', 'ZEE BANGLA', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(78, 'JALSHA MOVIES', 'JALSHA MOVIES', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(79, 'ZEE BANGLA CINEMA', 'ZEE BANGLA CINEMA', 'allacart', '2', '18', '2.36', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(80, '24 GHANTA', '24 GHANTA', 'allacart', '0.10', '18', '0.12', 'D', '2019-07-03 05:47:07', '2019-07-03 12:47:07', NULL, NULL),
(81, 'ALANKAR', 'ALANKAR', 'allacart', '4', '18', '4.72', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(82, 'TARANG MUSIC', 'TARANG MUSIC', 'allacart', '2', '18', '2.36', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(83, 'ZEE SARTHAK', 'ZEE SARTHAK', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(84, 'ZEE RAJASTHAN', 'ZEE RAJASTHAN', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(85, 'BIG GANGA', 'BIG GANGA', 'allacart', '0.50', '18', '0.59', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(86, 'STAR WORLD', 'STAR WORLD', 'allacart', '8', '18', '9.44', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(87, 'COMEDY CENTRAL', 'COMEDY CENTRAL', 'allacart', '7', '18', '8.26', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(88, 'COLORS INFINITY', 'COLORS INFINITY', 'allacart', '7', '18', '8.26', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(89, 'ZEE CAFE', 'ZEE CAFE', 'allacart', '15', '18', '17.7', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(90, 'STAR MOVIES', 'STAR MOVIES', 'allacart', '12', '18', '14.16', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(91, 'MOVIES NOW', 'MOVIES NOW', 'allacart', '10', '18', '11.8', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(92, 'SONY PIX', 'SONY PIX', 'allacart', '10', '18', '11.8', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(93, 'ROMEDY NOW', 'ROMEDY NOW', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(94, 'MNX', 'MNX', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(95, '& FLIX', '& FLIX', 'allacart', '15', '18', '17.7', 'Y', '2019-07-03 05:45:49', '2019-07-03 12:45:49', NULL, NULL),
(96, 'MTV', 'MTV', 'allacart', '3', '18', '3.54', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(97, 'VH1', 'VH1', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(98, 'ZING', 'ZING', 'allacart', '0.10', '18', '0.11800000000000001', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(99, 'SUVARNA', 'SUVARNA', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(100, 'COLORS KANNADA', 'COLORS KANNADA', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(101, 'SUVARNA PLUS', 'SUVARNA PLUS', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(102, 'UDAY TV', 'UDAY TV', 'allacart', '17', '18', '20.06', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(103, 'UDAY COMEDY', 'UDAY COMEDY', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(104, 'ZEE KANNADA', 'ZEE KANNADA', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(105, 'COLORS SUPER', 'COLORS SUPER', 'allacart', '3', '18', '3.54', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(106, 'COLORS KANNADA CINEMA', 'COLORS KANNADA CINEMA', 'allacart', '2', '18', '2.36', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(107, 'UDAYA MOVIES', 'UDAYA MOVIES', 'allacart', '16', '18', '18.88', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(108, 'RAJ MUSIX KANNADA', 'RAJ MUSIX KANNADA', 'allacart', '0.25', '18', '0.295', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(109, 'UDAYA MUSIC', 'UDAYA MUSIC', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(110, 'CHINTU TV', 'CHINTU TV', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(111, 'SUN TV', 'SUN TV', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(112, 'VIJAY TV', 'VIJAY TV', 'allacart', '17', '18', '20.06', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(113, 'RAJ TV', 'RAJ TV', 'allacart', '3', '18', '3.54', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(114, 'MEGA TV', 'MEGA TV', 'allacart', '3', '18', '3.54', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(115, 'MEGA 24', 'MEGA 24', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(116, 'VIJAY SUPER', 'VIJAY SUPER', 'allacart', '2', '18', '2.36', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(117, 'COLORS TAMIL', 'COLORS TAMIL', 'allacart', '3', '18', '3.54', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(118, 'ADITHYA TV', 'ADITHYA TV', 'allacart', '9', '18', '10.62', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(119, 'ZEE TAMIZH', 'ZEE TAMIZH', 'allacart', '12', '18', '14.16', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(120, 'CHUTTI TV', 'CHUTTI TV', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(121, 'MEGA MUSIQ', 'MEGA MUSIQ', 'allacart', '2', '18', '2.36', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(122, 'KTV', 'KTV', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(123, 'J MOVIES', 'J MOVIES', 'allacart', '2.25', '18', '2.655', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(124, 'SUN NEWS', 'SUN NEWS', 'allacart', '1', '18', '1.18', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(125, 'JAYA PLUS', 'JAYA PLUS', 'allacart', '0.50', '18', '0.59', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(126, 'RAJ DIGITAL PLUS', 'RAJ DIGITAL PLUS', 'allacart', '1.50', '18', '1.77', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(127, 'SUN MUSIC', 'SUN MUSIC', 'allacart', '6', '18', '7.08', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(128, 'JAYA MAX', 'JAYA MAX', 'allacart', '2.25', '18', '2.655', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(129, 'SUN LIFE', 'SUN LIFE', 'allacart', '9', '18', '10.62', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(130, 'DISCOVERY TAMIL', 'DISCOVERY TAMIL', 'allacart', '4', '18', '4.72', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(131, 'ASIANET', 'ASIANET', 'allacart', '19', '18', '22.42', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(132, 'ASIANET PLUS', 'ASIANET PLUS', 'allacart', '5', '18', '5.9', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(133, 'SURYA TV', 'SURYA TV', 'allacart', '12', '18', '14.16', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(134, 'SURYA COMEDY', 'SURYA COMEDY', 'allacart', '4', '18', '4.72', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(135, 'GEMINI PACKAGE', 'GEMINI COMEDY,GEMINI LIFE,GEMINI MOVIES,GEMINI MUSIC,GEMINI TV,KUSHI TV,MIRROR NOW', 'packages', '100', '20', '120', 'D', '2019-07-03 05:43:33', '2019-07-03 12:43:33', NULL, NULL),
(136, 'ETV ANDHRA PRADESH', 'ETV ANDHRA PRADESH', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(137, 'ETV TELANGANA', 'ETV TELANGANA', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(138, 'ETV PACKAGE', 'ETV,ETV ABHIRUCHI,ETV ANDHRA PRADESH,ETV CINEMA,ETV LIFE,ETV PLUS,ETV TELANGANA', 'packages', '24', '18', '28.32', 'Y', '2019-06-09 10:41:42', '2019-06-09 05:11:42', NULL, NULL),
(139, 'ZEE KERALAM', 'ZEE KERALAM', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(140, 'ZEE KERALAM', 'ZEE KERALAM', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(141, 'SURYA MOVIES', 'SURYA MOVIES', 'allacart', '11', '18', '12.98', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(142, 'SURYA MUSIC', 'SURYA MUSIC', 'allacart', '4', '18', '4.72', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(143, 'KOCHU TV', 'KOCHU TV', 'allacart', '5', '18', '5.9', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(144, 'CNN NEWS18', 'CNN NEWS18', 'allacart', '0.50', '18', '0.59', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(145, 'TIMES NOW', 'TIMES NOW', 'allacart', '3', '18', '3.54', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(146, 'WION', 'WION', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(147, 'ET NOW', 'ET NOW', 'allacart', '3', '18', '3.54', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(148, 'NDTV 24/7', 'NDTV 24/7', 'allacart', '3', '18', '3.54', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(149, 'NDTV PROFIT', 'NDTV PROFIT', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(150, 'CNN INTERNATIONAL', 'CNN INTERNATIONAL', 'allacart', '0.50', '18', '0.59', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(151, 'MIRROR NOW', 'MIRROR NOW', 'allacart', '2', '18', '2.36', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(152, 'NEWS 18 INDIA', 'NEWS 18 INDIA', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(153, 'AAJ TAK', 'AAJ TAK', 'allacart', '0.75', '18', '0.885', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(154, 'ZEE NEWS', 'ZEE NEWS', 'allacart', '0.10', '18', '0.11800000000000001', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(155, 'ZEE HINDUSTAN', 'ZEE HINDUSTAN', 'allacart', '0.10', '18', '0.11800000000000001', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(156, 'NDTV INDIA', 'NDTV INDIA', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(157, 'CNBC AWAAZ', 'CNBC AWAAZ', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(158, 'SONY SIX', 'SONY SIX', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(159, 'STAR SPORTS 2', 'STAR SPORTS 2', 'allacart', '6', '18', '7.08', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(160, 'STAR SPORTS 1 HINDI', 'STAR SPORTS 1 HINDI', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(161, 'SONY ESPN', 'SONY ESPN', 'allacart', '5', '18', '5.9', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(162, 'TEN2', 'TEN2', 'allacart', '15', '18', '17.7', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(163, 'TEN3', 'TEN3', 'allacart', '17', '18', '20.06', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(164, 'DSPORT', 'DSPORT', 'allacart', '4', '18', '4.72', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(165, 'STAR SPORTS 1 TELUGU', 'STAR SPORTS 1 TELUGU', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(166, 'STAR SPORTS 1 TAMIL', 'STAR SPORTS 1 TAMIL', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(167, 'STAR SPORTS 1 KANNADA', 'STAR SPORTS 1 KANNADA', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(168, 'STAR SPORTS FIRST', 'STAR SPORTS FIRST', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(169, 'SONY YAY', 'SONY YAY', 'allacart', '2', '18', '2.36', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(170, 'SONIC', 'SONIC', 'allacart', '2', '18', '2.36', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(171, 'NIC JR', 'NIC JR', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(172, 'DISCOVERY KIDS', 'DISCOVERY KIDS', 'allacart', '3', '18', '3.54', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(173, 'CARTOON NETWORK', 'CARTOON NETWORK', 'allacart', '5', '18', '5.9', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(174, 'NGC', 'NGC', 'allacart', '2', '18', '2.36', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(175, 'FOX LIFE', 'FOX LIFE', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(176, 'HISTORY TV 18', 'HISTORY TV 18', 'allacart', '3', '18', '3.54', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(177, 'SONY BBC EARTH', 'SONY BBC EARTH', 'allacart', '4', '18', '4.72', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(178, 'NAT GEO WILD', 'NAT GEO WILD', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(179, 'DISCOVERY TURBO', 'DISCOVERY TURBO', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(180, 'NDTV GOOD TIMES', 'NDTV GOOD TIMES', 'allacart', '1.50', '18', '1.77', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(181, 'DISCOVERY SCIENCE', 'DISCOVERY SCIENCE', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(182, 'LIVING FOODZ', 'LIVING FOODZ', 'allacart', '1', '18', '1.18', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(183, 'STAR PLUS HD', 'STAR PLUS HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(184, 'STAR BHARAT HD', 'STAR BHARAT HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(185, 'COLORS HD', 'COLORS HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(186, 'SONY HD', 'SONY HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(187, 'STAR GOLD HD', 'STAR GOLD HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(188, 'STAR MOVIES HD', 'STAR MOVIES HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(189, 'STAR MOVIES SELECT HD', 'STAR MOVIES SELECT HD', 'allacart', '10', '18', '11.8', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(190, 'NGC HD', 'NGC HD', 'allacart', '10', '18', '11.8', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(191, 'SONY SIX HD', 'SONY SIX HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(192, 'SONY ESPN HD', 'SONY ESPN HD', 'allacart', '7', '18', '8.26', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(193, 'STAR SPORTS1 HD', 'STAR SPORTS1 HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(194, 'STAR SPORTS 2 HD', 'STAR SPORTS 2 HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(195, 'STAR SPORTS SELECT HD', 'STAR SPORTS SELECT HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(196, 'MAA MOVIES HD', 'MAA MOVIES HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(197, 'MAA MOVIES HD', 'MAA MOVIES HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(198, 'JALSHA MOVIES HD', 'JALSHA MOVIES HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(199, 'STAR JALSHA HD', 'STAR JALSHA HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(200, 'ETV HD', 'ETV HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(201, 'MAA HD', 'MAA HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(202, 'TEN1 HD', 'TEN1 HD', 'allacart', '19', '18', '22.42', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(203, 'TEN2 HD', 'TEN2 HD', 'allacart', '17', '18', '20.06', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(204, 'TEN3 HD', 'TEN3 HD', 'allacart', '17', '18', '20.06', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(205, 'NAT GEO WILD HD', 'NAT GEO WILD HD', 'allacart', '5', '18', '5.9', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(206, 'ANIMAL PLANET HD', 'ANIMAL PLANET HD', 'allacart', '3', '18', '3.54', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(207, 'TLC HD', 'TLC HD', 'allacart', '3', '18', '3.54', 'Y', '2019-06-01 13:36:06', '0000-00-00 00:00:00', NULL, NULL),
(208, 'ZEE PACKAGE', 'ZEE TELUGU,ZEE CINEMALU,ZEE ACTION,ZEE KERALAM,WION,ZEE NEWS,ZEE HINDUSTAN,LIVING FOODZ', 'packages', '20', '18', '23.6', 'Y', '2019-03-13 18:30:00', '0000-00-00 00:00:00', NULL, NULL),
(209, 'STAR TELUGU', 'MAA GOLD,MAA MOVIES,MAA MUSIC,MAA TV,NAT GEO WILD,STAR SPORTS 1 TELUGU,STAR SPORTS 2,STAR SPORTS FIRST', 'packages', '39', '18', '46.02', 'Y', '2019-06-09 10:41:28', '2019-06-09 05:11:28', NULL, NULL),
(210, 'Local', 'Local Channels,', 'local', '12', '18', '14', 'Y', '2019-06-11 07:59:41', '2019-06-11 14:59:41', NULL, NULL),
(213, 'sddasdsad222', 'sddasdsad222', 'allacart', '10', '18', '111122', 'D', '2019-06-09 11:07:11', '2019-06-09 05:37:11', NULL, NULL),
(215, 'Random Package', '& FLIX,& PICTURES,& TV,24 GHANTA,AAJ TAK,ADITHYA TV,COLORS KANNADA,COLORS KANNADA CINEMA,COLORS MARATHI,COMEDY CENTRAL,DISCOVERY KIDS,DISCOVERY SCIENCE,ETV ABHIRUCHI,ETV TELANGANA,GEMINI MUSIC,JALSHA MOVIES', 'packages', '1001', '111', '2201', 'Y', '2019-06-01 13:54:19', '2019-06-01 08:24:19', NULL, NULL),
(216, 'dcfdfsdf1', 'ETV PLUS,GEMINI MOVIES,J MOVIES', 'packages', '200', '10', '220', 'D', '2019-06-09 10:50:40', '2019-06-09 05:20:40', NULL, NULL),
(217, '24 GANTA', '24 GANTA', 'allacart', '0.10', '18', '0.12', 'Y', '2019-07-03 05:48:00', '2019-07-03 12:48:00', NULL, NULL),
(218, 'Hindi Base Pack', 'Hindi Base channels', 'base', '130', '18', '153.4', 'Y', '2019-08-06 19:06:18', '2019-08-07 07:36:18', 20, 100);

-- --------------------------------------------------------

--
-- Table structure for table `slj_items_sales`
--

CREATE TABLE `slj_items_sales` (
  `id` int(11) NOT NULL,
  `itemname` varchar(200) DEFAULT NULL,
  `distributor` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `brand` varchar(150) DEFAULT NULL,
  `modelno` varchar(100) DEFAULT NULL,
  `serialno` varchar(190) DEFAULT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_items_sales`
--

INSERT INTO `slj_items_sales` (`id`, `itemname`, `distributor`, `branch`, `brand`, `modelno`, `serialno`, `customer_name`, `price`, `created_at`, `updated_at`) VALUES
(8, 'TV', 3, NULL, 'Neelkamal', 'Dp-444', NULL, 'Durga Enterprise', 23233, '2023-06-19 15:33:01', '2023-06-19 15:33:01'),
(9, 'Fan', 3, NULL, 'Neelkamal', 'k-200', NULL, 'Raja', 20000, '2023-06-19 15:34:42', '2023-06-19 15:34:42'),
(10, 'Chair', 1, NULL, 'Neelkamal', 'Dp-444', NULL, 'Durga Enterprise', 1212, '2023-06-19 15:36:45', '2023-06-19 15:36:45'),
(11, 'Chair', 1, NULL, 'Neelkamal', 'U76', NULL, 'Durga Enterprise', 34342, '2023-06-19 15:39:58', '2023-06-19 15:39:58'),
(12, 'Chair', 1, NULL, 'Creative', 'Dp-444', NULL, 'Durga Enterprise', 1212, '2023-06-19 15:42:19', '2023-06-19 15:42:19'),
(13, 'TV', 1, NULL, NULL, NULL, NULL, 'Durga Enterprise', 23233, '2023-06-19 15:43:54', '2023-06-19 15:43:54'),
(14, 'Chair', 1, NULL, 'Neelkamal', 'Dp-444', NULL, 'Durga Enterprise', 23233, '2023-06-19 15:45:58', '2023-06-19 15:45:58'),
(15, 'Chair', NULL, 2, 'Neelkamal', 'Dp-444', NULL, 'Durga Enterprise', 23233, '2023-06-20 15:30:34', '2023-06-20 15:30:34'),
(16, '5KV CAPASITOR', NULL, 8, 'DELL', '34', NULL, 'Durga Enterprise', 20000, '2023-07-01 12:13:30', '2023-07-01 12:13:30'),
(17, 'Chair', 5, NULL, 'Neelkamal', 'Dp-444', NULL, 'Anadad', 1212, '2023-07-01 13:57:08', '2023-07-01 13:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `slj_logs`
--

CREATE TABLE `slj_logs` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `action_name` varchar(100) DEFAULT NULL,
  `value_of_action` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_logs`
--

INSERT INTO `slj_logs` (`id`, `employee_id`, `action_name`, `value_of_action`, `created_at`, `updated_at`) VALUES
(1, 2, 'Update Franchises', 'Lakshmi Nagar', '2023-04-14 18:57:24', '2023-04-14 18:57:24'),
(2, 2, 'Distributor List', NULL, '2023-07-01 12:14:22', '2023-07-01 12:14:22'),
(3, 2, 'Distributor List', NULL, '2023-07-01 12:14:22', '2023-07-01 12:14:22'),
(4, 2, 'Distributor List', NULL, '2023-07-01 12:17:52', '2023-07-01 12:17:52'),
(5, 2, 'OLT List', NULL, '2023-07-14 13:43:03', '2023-07-14 13:43:03'),
(6, 2, 'Distributor List', NULL, '2023-07-14 14:02:37', '2023-07-14 14:02:37'),
(7, 2, 'Product List', NULL, '2023-07-15 11:53:49', '2023-07-15 11:53:49'),
(8, 2, 'Product List', NULL, '2023-07-19 11:05:49', '2023-07-19 11:05:49'),
(9, 2, 'Product List', NULL, '2023-07-19 11:08:40', '2023-07-19 11:08:40'),
(10, 2, 'Product Updating', 'FOBER 1X8 SPLITTERS', '2023-07-19 11:08:59', '2023-07-19 11:08:59'),
(11, 2, 'Product List', NULL, '2023-07-19 11:08:59', '2023-07-19 11:08:59'),
(12, 2, 'Product List', NULL, '2023-07-19 11:13:35', '2023-07-19 11:13:35'),
(13, 2, 'Product Updating', 'FOBER 1X8 SPLITTERS', '2023-07-19 11:13:49', '2023-07-19 11:13:49'),
(14, 2, 'Product List', NULL, '2023-07-19 11:13:49', '2023-07-19 11:13:49'),
(15, 2, 'Product List', NULL, '2023-07-19 11:16:07', '2023-07-19 11:16:07'),
(16, 2, 'Product List', NULL, '2023-07-19 11:17:53', '2023-07-19 11:17:53'),
(17, 2, 'Product List', NULL, '2023-07-19 11:21:27', '2023-07-19 11:21:27'),
(18, 2, 'Product List', NULL, '2023-07-19 11:27:09', '2023-07-19 11:27:09'),
(19, 2, 'Product List', NULL, '2023-07-19 11:29:23', '2023-07-19 11:29:23'),
(20, 2, 'Product List', NULL, '2023-07-19 11:29:58', '2023-07-19 11:29:58'),
(21, 2, 'Product List', NULL, '2023-07-19 11:30:07', '2023-07-19 11:30:07'),
(22, 2, 'Product List', NULL, '2023-07-19 11:31:05', '2023-07-19 11:31:05'),
(23, 2, 'Product List', NULL, '2023-07-19 11:31:15', '2023-07-19 11:31:15'),
(24, 2, 'Product List', NULL, '2023-07-19 11:42:22', '2023-07-19 11:42:22'),
(25, 2, 'Product List', NULL, '2023-07-19 11:42:24', '2023-07-19 11:42:24'),
(26, 2, 'Product List', NULL, '2023-07-19 11:43:37', '2023-07-19 11:43:37'),
(27, 2, 'Product List', NULL, '2023-07-19 11:43:40', '2023-07-19 11:43:40'),
(28, 2, 'Product List', NULL, '2023-07-19 11:44:43', '2023-07-19 11:44:43'),
(29, 2, 'Product List', NULL, '2023-07-19 11:44:53', '2023-07-19 11:44:53'),
(30, 2, 'Product List', NULL, '2023-07-19 11:45:13', '2023-07-19 11:45:13'),
(31, 330, 'Stock List', NULL, '2023-07-19 11:54:36', '2023-07-19 11:54:36'),
(32, 330, 'Stock List', NULL, '2023-07-19 11:54:56', '2023-07-19 11:54:56'),
(33, 2, 'Product List', NULL, '2023-07-19 11:55:10', '2023-07-19 11:55:10'),
(34, 2, 'Product List', NULL, '2023-07-19 11:56:45', '2023-07-19 11:56:45'),
(35, 330, 'Product List', NULL, '2023-07-19 11:58:35', '2023-07-19 11:58:35'),
(36, 330, 'Product List', NULL, '2023-07-19 12:00:59', '2023-07-19 12:00:59'),
(37, 330, 'Product List', NULL, '2023-07-19 12:01:09', '2023-07-19 12:01:09'),
(38, 2, 'Product List', NULL, '2023-07-19 12:02:49', '2023-07-19 12:02:49'),
(39, 2, 'Product List', NULL, '2023-07-19 12:03:35', '2023-07-19 12:03:35'),
(40, 2, 'Product List', NULL, '2023-07-19 12:04:42', '2023-07-19 12:04:42'),
(41, 2, 'Product List', NULL, '2023-07-19 12:05:07', '2023-07-19 12:05:07'),
(42, 2, 'Product List', NULL, '2023-07-19 12:05:16', '2023-07-19 12:05:16'),
(43, 2, 'Product List', NULL, '2023-07-19 12:05:33', '2023-07-19 12:05:33'),
(44, 330, 'Product List', NULL, '2023-07-19 12:06:09', '2023-07-19 12:06:09'),
(45, 330, 'Product List', NULL, '2023-07-19 12:06:20', '2023-07-19 12:06:20'),
(46, 2, 'Product List', NULL, '2023-07-19 12:07:05', '2023-07-19 12:07:05'),
(47, 330, 'Product List', NULL, '2023-07-19 12:07:13', '2023-07-19 12:07:13'),
(48, 2, 'Product List', NULL, '2023-07-19 12:08:21', '2023-07-19 12:08:21'),
(49, 2, 'Product List', NULL, '2023-07-19 12:09:08', '2023-07-19 12:09:08'),
(50, 330, 'Product List', NULL, '2023-07-19 12:09:37', '2023-07-19 12:09:37'),
(51, 330, 'Product List', NULL, '2023-07-19 12:09:49', '2023-07-19 12:09:49'),
(52, 2, 'Product List', NULL, '2023-07-19 12:10:09', '2023-07-19 12:10:09'),
(53, 2, 'Product List', NULL, '2023-07-19 12:10:33', '2023-07-19 12:10:33'),
(54, 2, 'Product List', NULL, '2023-07-19 12:14:06', '2023-07-19 12:14:06'),
(55, 2, 'Product List', NULL, '2023-07-19 12:14:46', '2023-07-19 12:14:46'),
(56, 2, 'Product List', NULL, '2023-07-19 12:14:55', '2023-07-19 12:14:55'),
(57, 2, 'Product List', NULL, '2023-07-19 12:15:21', '2023-07-19 12:15:21'),
(58, 330, 'Product List', NULL, '2023-07-19 12:17:15', '2023-07-19 12:17:15'),
(59, 330, 'Product List', NULL, '2023-07-19 12:17:25', '2023-07-19 12:17:25'),
(60, 330, 'Product List', NULL, '2023-07-19 12:19:18', '2023-07-19 12:19:18'),
(61, 330, 'Product List', NULL, '2023-07-19 12:19:29', '2023-07-19 12:19:29'),
(62, 330, 'Product List', NULL, '2023-07-19 12:19:50', '2023-07-19 12:19:50'),
(63, 2, 'Product List', NULL, '2023-07-19 14:01:31', '2023-07-19 14:01:31'),
(64, 2, 'Product List', NULL, '2023-07-19 14:02:04', '2023-07-19 14:02:04'),
(65, 330, 'Product List', NULL, '2023-07-19 14:05:16', '2023-07-19 14:05:16'),
(66, 2, 'Stock List', NULL, '2023-07-19 14:06:43', '2023-07-19 14:06:43'),
(67, 2, 'Stock List', NULL, '2023-07-19 14:06:52', '2023-07-19 14:06:52'),
(68, 2, 'Stock List', NULL, '2023-07-19 14:07:06', '2023-07-19 14:07:06'),
(69, 330, 'Stock List', NULL, '2023-07-19 14:22:13', '2023-07-19 14:22:13'),
(70, 330, 'Product List', NULL, '2023-07-19 14:22:44', '2023-07-19 14:22:44'),
(71, 330, 'Stock List', NULL, '2023-07-19 14:23:08', '2023-07-19 14:23:08'),
(72, 330, 'Stock List', NULL, '2023-07-19 14:23:16', '2023-07-19 14:23:16'),
(73, 330, 'Stock List', NULL, '2023-07-19 14:23:30', '2023-07-19 14:23:30'),
(74, 330, 'Stock List', NULL, '2023-07-19 14:24:21', '2023-07-19 14:24:21'),
(75, 330, 'Product List', NULL, '2023-07-19 14:24:32', '2023-07-19 14:24:32'),
(76, 2, 'Product List', NULL, '2023-07-19 14:25:33', '2023-07-19 14:25:33'),
(77, 330, 'Stock List', NULL, '2023-07-19 14:26:27', '2023-07-19 14:26:27'),
(78, 330, 'Product List', NULL, '2023-07-19 14:26:35', '2023-07-19 14:26:35'),
(79, 2, 'Product List', NULL, '2023-07-19 14:28:56', '2023-07-19 14:28:56'),
(80, 330, 'Stock List', NULL, '2023-07-19 14:35:43', '2023-07-19 14:35:43'),
(81, 330, 'Product List', NULL, '2023-07-19 14:35:53', '2023-07-19 14:35:53'),
(82, 2, 'Product List', NULL, '2023-07-19 14:36:17', '2023-07-19 14:36:17'),
(83, 330, 'Product List', NULL, '2023-07-19 14:37:05', '2023-07-19 14:37:05'),
(84, 330, 'Stock List', NULL, '2023-07-19 14:37:32', '2023-07-19 14:37:32'),
(85, 330, 'Product List', NULL, '2023-07-19 14:37:41', '2023-07-19 14:37:41'),
(86, 330, 'Stock List', NULL, '2023-07-19 14:39:15', '2023-07-19 14:39:15'),
(87, 330, 'Product List', NULL, '2023-07-19 14:39:30', '2023-07-19 14:39:30'),
(88, 330, 'Stock List', NULL, '2023-07-19 14:42:09', '2023-07-19 14:42:09'),
(89, 330, 'Product List', NULL, '2023-07-19 14:42:16', '2023-07-19 14:42:16'),
(90, 330, 'Stock List', NULL, '2023-07-19 14:47:10', '2023-07-19 14:47:10'),
(91, 330, 'Product List', NULL, '2023-07-19 14:47:16', '2023-07-19 14:47:16'),
(92, 330, 'Stock List', NULL, '2023-07-19 14:49:48', '2023-07-19 14:49:48'),
(93, 330, 'Product List', NULL, '2023-07-19 14:49:55', '2023-07-19 14:49:55'),
(94, 330, 'Stock List', NULL, '2023-07-19 14:52:35', '2023-07-19 14:52:35'),
(95, 330, 'Product List', NULL, '2023-07-19 14:52:42', '2023-07-19 14:52:42'),
(96, 330, 'Stock List', NULL, '2023-07-19 14:55:13', '2023-07-19 14:55:13'),
(97, 330, 'Product List', NULL, '2023-07-19 14:55:24', '2023-07-19 14:55:24'),
(98, 330, 'Stock List', NULL, '2023-07-19 14:56:57', '2023-07-19 14:56:57'),
(99, 330, 'Product List', NULL, '2023-07-19 14:57:13', '2023-07-19 14:57:13'),
(100, 2, 'Stock List', NULL, '2023-07-19 14:59:34', '2023-07-19 14:59:34'),
(101, 330, 'Stock List', NULL, '2023-07-19 14:59:51', '2023-07-19 14:59:51'),
(102, 330, 'Stock List', NULL, '2023-07-19 15:00:00', '2023-07-19 15:00:00'),
(103, 330, 'Stock List', NULL, '2023-07-19 15:00:11', '2023-07-19 15:00:11'),
(104, 330, 'Stock List', NULL, '2023-07-19 15:00:25', '2023-07-19 15:00:25'),
(105, 330, 'Stock List', NULL, '2023-07-19 15:03:59', '2023-07-19 15:03:59'),
(106, 330, 'Stock List', NULL, '2023-07-19 15:04:12', '2023-07-19 15:04:12'),
(107, 330, 'Stock List', NULL, '2023-07-19 15:04:19', '2023-07-19 15:04:19'),
(108, 330, 'Stock List', NULL, '2023-07-19 17:57:45', '2023-07-19 17:57:45'),
(109, 330, 'Stock List', NULL, '2023-07-19 17:58:29', '2023-07-19 17:58:29'),
(110, 330, 'Stock List', NULL, '2023-07-19 17:58:35', '2023-07-19 17:58:35'),
(111, 2, 'Stock List', NULL, '2023-07-19 18:00:05', '2023-07-19 18:00:05'),
(112, 2, 'Stock List', NULL, '2023-07-19 18:00:07', '2023-07-19 18:00:07'),
(113, 2, 'Stock List', NULL, '2023-07-19 18:00:21', '2023-07-19 18:00:21'),
(114, 2, 'Stock List', NULL, '2023-07-19 18:00:24', '2023-07-19 18:00:24'),
(115, 2, 'Product List', NULL, '2023-07-20 10:06:49', '2023-07-20 10:06:49'),
(116, 330, 'Stock List', NULL, '2023-07-20 13:04:26', '2023-07-20 13:04:26'),
(117, 330, 'Product List', NULL, '2023-07-20 13:04:41', '2023-07-20 13:04:41'),
(118, 330, 'Stock List', NULL, '2023-07-20 13:42:03', '2023-07-20 13:42:03'),
(119, 330, 'Product List', NULL, '2023-07-20 13:42:22', '2023-07-20 13:42:22'),
(120, 330, 'Product List', NULL, '2023-07-20 13:44:35', '2023-07-20 13:44:35'),
(121, 330, 'Stock List', NULL, '2023-07-20 13:45:04', '2023-07-20 13:45:04'),
(122, 330, 'Stock List', NULL, '2023-07-20 13:46:13', '2023-07-20 13:46:13'),
(123, 330, 'Product List', NULL, '2023-07-20 13:46:23', '2023-07-20 13:46:23'),
(124, 331, 'List FiberLaying', NULL, '2023-07-20 14:54:37', '2023-07-20 14:54:37'),
(125, 331, 'List FiberLaying', NULL, '2023-07-20 14:55:34', '2023-07-20 14:55:34'),
(126, 2, 'Product List', NULL, '2023-07-20 14:57:03', '2023-07-20 14:57:03'),
(127, 330, 'Stock List', NULL, '2023-07-20 14:57:56', '2023-07-20 14:57:56'),
(128, 330, 'Stock List', NULL, '2023-07-20 14:58:11', '2023-07-20 14:58:11'),
(129, 331, 'Product List', NULL, '2023-07-20 14:58:13', '2023-07-20 14:58:13'),
(130, 330, 'Stock List', NULL, '2023-07-20 14:58:17', '2023-07-20 14:58:17'),
(131, 331, 'List DPD', NULL, '2023-07-20 14:58:59', '2023-07-20 14:58:59'),
(132, 2, 'Product List', NULL, '2023-07-20 15:04:20', '2023-07-20 15:04:20'),
(133, 2, 'List DPD', NULL, '2023-07-20 15:06:03', '2023-07-20 15:06:03'),
(134, 330, 'Stock List', NULL, '2023-07-20 15:06:13', '2023-07-20 15:06:13'),
(135, 331, 'List DPD', NULL, '2023-07-20 15:06:33', '2023-07-20 15:06:33'),
(136, 331, 'List DP', NULL, '2023-07-20 15:07:11', '2023-07-20 15:07:11'),
(137, 331, 'List DP', NULL, '2023-07-20 15:07:17', '2023-07-20 15:07:17'),
(138, 331, 'List DP', NULL, '2023-07-20 15:07:17', '2023-07-20 15:07:17'),
(139, 330, 'Product List', NULL, '2023-07-20 15:07:39', '2023-07-20 15:07:39'),
(140, 331, 'List DPD', NULL, '2023-07-20 15:07:39', '2023-07-20 15:07:39'),
(141, 330, 'Stock List', NULL, '2023-07-20 15:07:50', '2023-07-20 15:07:50'),
(142, 330, 'Stock List', NULL, '2023-07-20 15:08:03', '2023-07-20 15:08:03'),
(143, 330, 'Stock List', NULL, '2023-07-20 15:08:32', '2023-07-20 15:08:32'),
(144, 331, 'List DP', NULL, '2023-07-20 15:09:09', '2023-07-20 15:09:09'),
(145, 331, 'List DP', NULL, '2023-07-20 15:09:09', '2023-07-20 15:09:09'),
(146, 331, 'List DP', NULL, '2023-07-20 15:09:09', '2023-07-20 15:09:09'),
(147, 331, 'List FH', NULL, '2023-07-20 15:09:10', '2023-07-20 15:09:10'),
(148, 330, 'Product List', NULL, '2023-07-20 15:09:50', '2023-07-20 15:09:50'),
(149, 2, 'List FiberLaying', NULL, '2023-07-20 16:49:20', '2023-07-20 16:49:20'),
(150, 2, 'List FH', NULL, '2023-07-20 18:51:52', '2023-07-20 18:51:52'),
(151, 331, 'List FH', NULL, '2023-07-20 19:05:22', '2023-07-20 19:05:22'),
(152, 2, 'Product List', NULL, '2023-07-24 10:51:58', '2023-07-24 10:51:58'),
(153, 2, 'Product List', NULL, '2023-07-24 11:00:13', '2023-07-24 11:00:13'),
(154, 2, 'Product List', NULL, '2023-07-24 11:02:14', '2023-07-24 11:02:14'),
(155, 2, 'Fiber Laying Stock', '19', '2023-07-24 11:20:25', '2023-07-24 11:20:25'),
(156, 330, 'List FiberLaying', NULL, '2023-07-24 13:55:17', '2023-07-24 13:55:17'),
(157, 330, 'List FiberLaying', NULL, '2023-07-24 14:00:19', '2023-07-24 14:00:19'),
(158, 330, 'List FiberLaying', NULL, '2023-07-24 14:01:07', '2023-07-24 14:01:07'),
(159, 330, 'List FiberLaying', NULL, '2023-07-24 14:01:09', '2023-07-24 14:01:09'),
(160, 330, 'List FiberLaying', NULL, '2023-07-24 14:02:00', '2023-07-24 14:02:00'),
(161, 330, 'List FiberLaying', NULL, '2023-07-24 14:02:06', '2023-07-24 14:02:06'),
(162, 330, 'List FiberLaying', NULL, '2023-07-24 14:02:43', '2023-07-24 14:02:43'),
(163, 330, 'List FiberLaying', NULL, '2023-07-24 14:02:46', '2023-07-24 14:02:46'),
(164, 330, 'List FiberLaying', NULL, '2023-07-24 14:16:03', '2023-07-24 14:16:03'),
(165, 330, 'List FiberLaying', NULL, '2023-07-24 14:17:46', '2023-07-24 14:17:46'),
(166, 330, 'Product List', NULL, '2023-07-24 14:25:24', '2023-07-24 14:25:24'),
(167, 330, 'Product List', NULL, '2023-07-24 14:26:36', '2023-07-24 14:26:36'),
(168, 330, 'Product List', NULL, '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(169, 330, 'Product List', NULL, '2023-07-24 14:30:24', '2023-07-24 14:30:24'),
(170, 330, 'Product List', NULL, '2023-07-24 14:30:27', '2023-07-24 14:30:27'),
(171, 330, 'Stock List', NULL, '2023-07-24 14:30:36', '2023-07-24 14:30:36'),
(172, 330, 'Stock List', NULL, '2023-07-24 14:30:39', '2023-07-24 14:30:39'),
(173, 330, 'Product List', NULL, '2023-07-24 14:30:48', '2023-07-24 14:30:48'),
(174, 330, 'Product List', NULL, '2023-07-24 14:30:54', '2023-07-24 14:30:54'),
(175, 330, 'Fiber Laying Stock', '19', '2023-07-24 15:11:49', '2023-07-24 15:11:49'),
(176, 2, 'List of Fiber', NULL, '2023-07-24 15:12:12', '2023-07-24 15:12:12'),
(177, 2, 'List of Fiber', NULL, '2023-07-24 15:13:36', '2023-07-24 15:13:36'),
(178, 2, 'List of Fiber', NULL, '2023-07-24 15:13:38', '2023-07-24 15:13:38'),
(179, 2, 'List of Fiber', NULL, '2023-07-24 15:13:42', '2023-07-24 15:13:42'),
(180, 2, 'List of Fiber', NULL, '2023-07-24 15:18:46', '2023-07-24 15:18:46'),
(181, 330, 'List of Fiber', NULL, '2023-07-24 15:23:10', '2023-07-24 15:23:10'),
(182, 330, 'List of Fiber', NULL, '2023-07-24 15:23:17', '2023-07-24 15:23:17'),
(183, 330, 'List of Fiber', NULL, '2023-07-24 15:25:29', '2023-07-24 15:25:29'),
(184, 330, 'List of Fiber', NULL, '2023-07-24 15:25:34', '2023-07-24 15:25:34'),
(185, 330, 'List of Fiber', NULL, '2023-07-24 15:37:31', '2023-07-24 15:37:31'),
(186, 330, 'List of Fiber', NULL, '2023-07-24 15:37:49', '2023-07-24 15:37:49'),
(187, 2, 'Fiber Laying Stock', '19', '2023-07-24 15:42:35', '2023-07-24 15:42:35'),
(188, 330, 'List of Fiber', NULL, '2023-07-24 15:42:59', '2023-07-24 15:42:59'),
(189, 330, 'List of Fiber', NULL, '2023-07-24 15:43:06', '2023-07-24 15:43:06'),
(190, 2, 'List of Fiber', NULL, '2023-07-24 15:46:31', '2023-07-24 15:46:31'),
(191, 2, 'List of Fiber', NULL, '2023-07-24 15:46:34', '2023-07-24 15:46:34'),
(192, 2, 'List of Fiber', NULL, '2023-07-24 15:46:42', '2023-07-24 15:46:42'),
(193, 2, 'List of Fiber', NULL, '2023-07-24 15:46:45', '2023-07-24 15:46:45'),
(194, 330, 'Fiber Laying Stock', '19', '2023-07-24 15:48:29', '2023-07-24 15:48:29'),
(195, 330, 'List of Fiber', NULL, '2023-07-24 15:48:34', '2023-07-24 15:48:34'),
(196, 330, 'List of Fiber', NULL, '2023-07-24 15:48:41', '2023-07-24 15:48:41'),
(197, 2, 'List of Fiber', NULL, '2023-07-24 15:48:47', '2023-07-24 15:48:47'),
(198, 330, 'List of Fiber', NULL, '2023-07-24 15:49:32', '2023-07-24 15:49:32'),
(199, 2, 'List of Fiber', NULL, '2023-07-24 15:50:15', '2023-07-24 15:50:15'),
(200, 2, 'List of Fiber', NULL, '2023-07-24 15:56:39', '2023-07-24 15:56:39'),
(201, 330, 'List of Fiber', NULL, '2023-07-24 15:58:03', '2023-07-24 15:58:03'),
(202, 2, 'List of Fiber', NULL, '2023-07-24 16:00:14', '2023-07-24 16:00:14'),
(203, 2, 'List of Fiber', NULL, '2023-07-24 16:00:23', '2023-07-24 16:00:23'),
(204, 2, 'List of Fiber', NULL, '2023-07-24 16:00:31', '2023-07-24 16:00:31'),
(205, 2, 'List of Fiber', NULL, '2023-07-24 16:00:33', '2023-07-24 16:00:33'),
(206, 2, 'List of Fiber', NULL, '2023-07-24 16:01:00', '2023-07-24 16:01:00'),
(207, 2, 'List of Fiber', NULL, '2023-07-24 16:01:05', '2023-07-24 16:01:05'),
(208, 2, 'List of Fiber', NULL, '2023-07-24 16:01:07', '2023-07-24 16:01:07'),
(209, 2, 'List of Fiber', NULL, '2023-07-24 16:01:15', '2023-07-24 16:01:15'),
(210, 2, 'List of Fiber', NULL, '2023-07-24 16:01:17', '2023-07-24 16:01:17'),
(211, 2, 'List of Fiber', NULL, '2023-07-24 16:03:28', '2023-07-24 16:03:28'),
(212, 2, 'List of Fiber', NULL, '2023-07-24 16:03:31', '2023-07-24 16:03:31'),
(213, 2, 'List of Fiber', NULL, '2023-07-24 16:03:39', '2023-07-24 16:03:39'),
(214, 2, 'List of Fiber', NULL, '2023-07-24 16:03:42', '2023-07-24 16:03:42'),
(215, 2, 'List of Fiber', NULL, '2023-07-24 16:03:46', '2023-07-24 16:03:46'),
(216, 2, 'List of Fiber', NULL, '2023-07-24 16:03:48', '2023-07-24 16:03:48'),
(217, 2, 'List of Fiber', NULL, '2023-07-24 16:05:34', '2023-07-24 16:05:34'),
(218, 2, 'List of Fiber', NULL, '2023-07-24 16:05:37', '2023-07-24 16:05:37'),
(219, 2, 'List of Fiber', NULL, '2023-07-24 16:06:50', '2023-07-24 16:06:50'),
(220, 330, 'List of Fiber', NULL, '2023-07-24 16:08:53', '2023-07-24 16:08:53'),
(221, 330, 'List of Fiber', NULL, '2023-07-24 16:09:00', '2023-07-24 16:09:00'),
(222, 2, 'List of Fiber', NULL, '2023-07-24 16:10:40', '2023-07-24 16:10:40'),
(223, 330, 'Fiber Laying Stock', '19', '2023-07-24 16:19:15', '2023-07-24 16:19:15'),
(224, 330, 'List of Fiber', NULL, '2023-07-24 16:19:24', '2023-07-24 16:19:24'),
(225, 2, 'List of Fiber', NULL, '2023-07-24 16:19:27', '2023-07-24 16:19:27'),
(226, 330, 'List of Fiber', NULL, '2023-07-24 16:19:37', '2023-07-24 16:19:37'),
(227, 2, 'List of Fiber', NULL, '2023-07-24 16:20:03', '2023-07-24 16:20:03'),
(228, 330, 'List of Fiber', NULL, '2023-07-24 16:20:43', '2023-07-24 16:20:43'),
(229, 330, 'Fiber Laying Stock', '19', '2023-07-24 16:23:02', '2023-07-24 16:23:02'),
(230, 330, 'List of Fiber', NULL, '2023-07-24 16:23:08', '2023-07-24 16:23:08'),
(231, 330, 'List of Fiber', NULL, '2023-07-24 16:23:14', '2023-07-24 16:23:14'),
(232, 330, 'List of Fiber', NULL, '2023-07-24 16:23:39', '2023-07-24 16:23:39'),
(233, 330, 'Fiber Laying Stock', '19', '2023-07-24 16:27:07', '2023-07-24 16:27:07'),
(234, 330, 'Fiber Laying Stock', '19', '2023-07-24 16:29:41', '2023-07-24 16:29:41'),
(235, 2, 'List of Fiber', NULL, '2023-07-24 16:31:50', '2023-07-24 16:31:50'),
(236, 330, 'Fiber Laying Stock', '19', '2023-07-24 16:32:23', '2023-07-24 16:32:23'),
(237, 2, 'List of Fiber', NULL, '2023-07-24 16:35:44', '2023-07-24 16:35:44'),
(238, 330, 'Fiber Laying Stock', '19', '2023-07-24 16:36:12', '2023-07-24 16:36:12'),
(239, 330, 'Fiber Laying Stock', '19', '2023-07-24 16:39:04', '2023-07-24 16:39:04'),
(240, 330, 'List of Fiber', NULL, '2023-07-24 16:39:35', '2023-07-24 16:39:35'),
(241, 330, 'List of Fiber', NULL, '2023-07-24 16:39:39', '2023-07-24 16:39:39'),
(242, 2, 'List of Fiber', NULL, '2023-07-24 16:41:37', '2023-07-24 16:41:37'),
(243, 330, 'List of Fiber', NULL, '2023-07-24 16:44:27', '2023-07-24 16:44:27'),
(244, 2, 'List of Fiber', NULL, '2023-07-24 16:45:21', '2023-07-24 16:45:21'),
(245, 330, 'List of Fiber', NULL, '2023-07-24 17:14:12', '2023-07-24 17:14:12'),
(246, 330, 'List of Fiber', NULL, '2023-07-24 17:14:18', '2023-07-24 17:14:18'),
(247, 2, 'List of Fiber', NULL, '2023-07-24 17:15:00', '2023-07-24 17:15:00'),
(248, 2, 'List of Fiber', NULL, '2023-07-24 17:15:04', '2023-07-24 17:15:04'),
(249, 330, 'List of Fiber', NULL, '2023-07-24 17:15:49', '2023-07-24 17:15:49'),
(250, 330, 'Fiber Laying Stock', '20', '2023-07-24 18:03:16', '2023-07-24 18:03:16'),
(251, 330, 'Fiber Laying Stock', '20', '2023-07-24 18:06:48', '2023-07-24 18:06:48'),
(252, 330, 'Fiber Laying Stock', '20', '2023-07-24 18:09:48', '2023-07-24 18:09:48'),
(253, 330, 'Fiber Laying Stock', '20', '2023-07-24 18:15:54', '2023-07-24 18:15:54'),
(254, 330, 'Fiber Laying Stock', '20', '2023-07-24 18:22:58', '2023-07-24 18:22:58'),
(255, 330, 'List of Fiber', NULL, '2023-07-24 18:25:13', '2023-07-24 18:25:13'),
(256, 330, 'List of Fiber', NULL, '2023-07-24 18:25:19', '2023-07-24 18:25:19'),
(257, 330, 'List of Fiber', NULL, '2023-07-24 18:25:53', '2023-07-24 18:25:53'),
(258, 330, 'Fiber Laying Stock', '20', '2023-07-24 18:31:33', '2023-07-24 18:31:33'),
(259, 330, 'Fiber Laying Stock', '20', '2023-07-24 18:35:29', '2023-07-24 18:35:29'),
(260, 330, 'List of Fiber', NULL, '2023-07-24 18:35:55', '2023-07-24 18:35:55'),
(261, 330, 'List of Fiber', NULL, '2023-07-24 18:36:04', '2023-07-24 18:36:04'),
(262, 2, 'List of Fiber', NULL, '2023-07-24 18:56:57', '2023-07-24 18:56:57'),
(263, 2, 'List of Fiber', NULL, '2023-07-24 18:57:00', '2023-07-24 18:57:00'),
(264, 2, 'List of Fiber', NULL, '2023-07-24 18:57:03', '2023-07-24 18:57:03'),
(265, 2, 'List of Fiber', NULL, '2023-07-24 18:57:08', '2023-07-24 18:57:08'),
(266, 2, 'List of Fiber', NULL, '2023-07-24 18:57:12', '2023-07-24 18:57:12'),
(267, 2, 'List of Fiber', NULL, '2023-07-25 10:29:31', '2023-07-25 10:29:31'),
(268, 2, 'List of Fiber', NULL, '2023-07-25 10:29:35', '2023-07-25 10:29:35'),
(269, 2, 'Stock List', NULL, '2023-07-25 10:29:45', '2023-07-25 10:29:45'),
(270, 2, 'List of Fiber', NULL, '2023-07-25 10:31:43', '2023-07-25 10:31:43'),
(271, 2, 'List of Fiber', NULL, '2023-07-25 10:45:57', '2023-07-25 10:45:57'),
(272, 2, 'List of Fiber', NULL, '2023-07-25 10:46:02', '2023-07-25 10:46:02'),
(273, 2, 'List of Fiber', NULL, '2023-07-25 10:46:18', '2023-07-25 10:46:18'),
(274, 2, 'List of Fiber', NULL, '2023-07-25 10:46:22', '2023-07-25 10:46:22'),
(275, 2, 'List of Fiber', NULL, '2023-07-25 10:46:26', '2023-07-25 10:46:26'),
(276, 2, 'List of Fiber', NULL, '2023-07-25 10:46:35', '2023-07-25 10:46:35'),
(277, 330, 'Stock List', NULL, '2023-07-25 10:47:08', '2023-07-25 10:47:08'),
(278, 330, 'List of Fiber', NULL, '2023-07-25 10:47:26', '2023-07-25 10:47:26'),
(279, 330, 'List of Fiber', NULL, '2023-07-25 10:47:34', '2023-07-25 10:47:34'),
(280, 2, 'List of Fiber', NULL, '2023-07-25 10:48:09', '2023-07-25 10:48:09'),
(281, 330, 'List of Fiber', NULL, '2023-07-25 10:48:15', '2023-07-25 10:48:15'),
(282, 330, 'List of Fiber', NULL, '2023-07-25 10:48:24', '2023-07-25 10:48:24'),
(283, 330, 'List of Fiber', NULL, '2023-07-25 10:48:37', '2023-07-25 10:48:37'),
(284, 330, 'List of Fiber', NULL, '2023-07-25 10:48:41', '2023-07-25 10:48:41'),
(285, 330, 'List of Fiber', NULL, '2023-07-25 10:49:06', '2023-07-25 10:49:06'),
(286, 2, 'List of Fiber', NULL, '2023-07-25 10:49:07', '2023-07-25 10:49:07'),
(287, 2, 'List of Fiber', NULL, '2023-07-25 10:49:12', '2023-07-25 10:49:12'),
(288, 2, 'List of Fiber', NULL, '2023-07-25 10:49:15', '2023-07-25 10:49:15'),
(289, 330, 'List of Fiber', NULL, '2023-07-25 10:49:37', '2023-07-25 10:49:37'),
(290, 2, 'List of Fiber', NULL, '2023-07-25 10:49:57', '2023-07-25 10:49:57'),
(291, 330, 'List of Fiber', NULL, '2023-07-25 10:50:07', '2023-07-25 10:50:07'),
(292, 2, 'List of Fiber', NULL, '2023-07-25 10:50:23', '2023-07-25 10:50:23'),
(293, 2, 'List of Fiber', NULL, '2023-07-25 10:50:29', '2023-07-25 10:50:29'),
(294, 2, 'List of Fiber', NULL, '2023-07-25 10:50:32', '2023-07-25 10:50:32'),
(295, 2, 'List of Fiber', NULL, '2023-07-25 10:50:41', '2023-07-25 10:50:41'),
(296, 330, 'List of Fiber', NULL, '2023-07-25 10:50:41', '2023-07-25 10:50:41'),
(297, 2, 'List of Fiber', NULL, '2023-07-25 10:50:45', '2023-07-25 10:50:45'),
(298, 2, 'List of Fiber', NULL, '2023-07-25 10:51:18', '2023-07-25 10:51:18'),
(299, 2, 'List of Fiber', NULL, '2023-07-25 10:51:27', '2023-07-25 10:51:27'),
(300, 330, 'Product List', NULL, '2023-07-25 10:51:35', '2023-07-25 10:51:35'),
(301, 2, 'List of Fiber', NULL, '2023-07-25 10:51:56', '2023-07-25 10:51:56'),
(302, 330, 'List of Fiber', NULL, '2023-07-25 10:52:54', '2023-07-25 10:52:54'),
(303, 330, 'List of Fiber', NULL, '2023-07-25 10:53:01', '2023-07-25 10:53:01'),
(304, 330, 'List of Fiber', NULL, '2023-07-25 10:53:27', '2023-07-25 10:53:27'),
(305, 330, 'List of Fiber', NULL, '2023-07-25 10:54:02', '2023-07-25 10:54:02'),
(306, 2, 'List of Fiber', NULL, '2023-07-25 10:59:55', '2023-07-25 10:59:55'),
(307, 330, 'List of Fiber', NULL, '2023-07-25 11:12:27', '2023-07-25 11:12:27'),
(308, 330, 'Stock List', NULL, '2023-07-25 11:20:21', '2023-07-25 11:20:21'),
(309, 330, 'Stock List', NULL, '2023-07-25 11:20:30', '2023-07-25 11:20:30'),
(310, 330, 'Stock List', NULL, '2023-07-25 11:20:42', '2023-07-25 11:20:42'),
(311, 330, 'Stock List', NULL, '2023-07-25 11:20:59', '2023-07-25 11:20:59'),
(312, 330, 'Stock List', NULL, '2023-07-25 11:21:28', '2023-07-25 11:21:28'),
(313, 330, 'Stock List', NULL, '2023-07-25 11:21:33', '2023-07-25 11:21:33'),
(314, 2, 'List of Fiber', NULL, '2023-07-25 11:22:53', '2023-07-25 11:22:53'),
(315, 330, 'Product List', NULL, '2023-07-25 11:24:12', '2023-07-25 11:24:12'),
(316, 330, 'Stock List', NULL, '2023-07-25 11:25:11', '2023-07-25 11:25:11'),
(317, 330, 'Stock List', NULL, '2023-07-25 11:25:20', '2023-07-25 11:25:20'),
(318, 330, 'List of Fiber', NULL, '2023-07-25 11:27:03', '2023-07-25 11:27:03'),
(319, 330, 'List of Fiber', NULL, '2023-07-25 11:27:11', '2023-07-25 11:27:11'),
(320, 330, 'List of Fiber', NULL, '2023-07-25 11:27:48', '2023-07-25 11:27:48'),
(321, 2, 'Stock List', NULL, '2023-07-25 11:28:04', '2023-07-25 11:28:04'),
(322, 2, 'Stock List', NULL, '2023-07-25 11:28:07', '2023-07-25 11:28:07'),
(323, 330, 'List of Fiber', NULL, '2023-07-25 11:28:09', '2023-07-25 11:28:09'),
(324, 2, 'Stock List', NULL, '2023-07-25 11:28:10', '2023-07-25 11:28:10'),
(325, 330, 'List of Fiber', NULL, '2023-07-25 11:28:16', '2023-07-25 11:28:16'),
(326, 330, 'Product List', NULL, '2023-07-25 11:28:59', '2023-07-25 11:28:59'),
(327, 330, 'Product List', NULL, '2023-07-25 11:29:15', '2023-07-25 11:29:15'),
(328, 2, 'List of Fiber', NULL, '2023-07-25 11:30:41', '2023-07-25 11:30:41'),
(329, 2, 'List of Fiber', NULL, '2023-07-25 11:30:44', '2023-07-25 11:30:44'),
(330, 2, 'List of Fiber', NULL, '2023-07-25 11:31:27', '2023-07-25 11:31:27'),
(331, 2, 'List of Fiber', NULL, '2023-07-25 11:33:44', '2023-07-25 11:33:44'),
(332, 2, 'List of Fiber', NULL, '2023-07-25 11:39:28', '2023-07-25 11:39:28'),
(333, 2, 'List of Fiber', NULL, '2023-07-25 11:39:32', '2023-07-25 11:39:32'),
(334, 2, 'List of Fiber', NULL, '2023-07-25 11:39:42', '2023-07-25 11:39:42'),
(335, 2, 'List of Fiber', NULL, '2023-07-25 11:41:52', '2023-07-25 11:41:52'),
(336, 2, 'Stock List', NULL, '2023-07-25 11:46:08', '2023-07-25 11:46:08'),
(337, 2, 'Stock List', NULL, '2023-07-25 11:46:11', '2023-07-25 11:46:11'),
(338, 2, 'Stock List', NULL, '2023-07-25 11:46:17', '2023-07-25 11:46:17'),
(339, 2, 'Stock List', NULL, '2023-07-25 11:46:34', '2023-07-25 11:46:34'),
(340, 330, 'List of Fiber', NULL, '2023-07-25 11:46:55', '2023-07-25 11:46:55'),
(341, 330, 'List of Fiber', NULL, '2023-07-25 11:47:01', '2023-07-25 11:47:01'),
(342, 330, 'Stock List', NULL, '2023-07-25 11:47:49', '2023-07-25 11:47:49'),
(343, 330, 'Stock List', NULL, '2023-07-25 11:47:57', '2023-07-25 11:47:57'),
(344, 330, 'Stock List', NULL, '2023-07-25 11:49:02', '2023-07-25 11:49:02'),
(345, 330, 'Stock List', NULL, '2023-07-25 11:49:07', '2023-07-25 11:49:07'),
(346, 330, 'Product List', NULL, '2023-07-25 11:50:37', '2023-07-25 11:50:37'),
(347, 2, 'List of Fiber', NULL, '2023-07-25 11:51:00', '2023-07-25 11:51:00'),
(348, 2, 'List of Fiber', NULL, '2023-07-25 11:51:04', '2023-07-25 11:51:04'),
(349, 2, 'Stock List', NULL, '2023-07-25 11:51:16', '2023-07-25 11:51:16'),
(350, 2, 'Stock List', NULL, '2023-07-25 11:51:19', '2023-07-25 11:51:19'),
(351, 2, 'Stock List', NULL, '2023-07-25 11:57:58', '2023-07-25 11:57:58'),
(352, 2, 'Stock List', NULL, '2023-07-25 12:08:03', '2023-07-25 12:08:03'),
(353, 2, 'List of Fiber', NULL, '2023-07-25 12:08:16', '2023-07-25 12:08:16'),
(354, 2, 'List of Fiber', NULL, '2023-07-25 12:08:18', '2023-07-25 12:08:18'),
(355, 2, 'List of Fiber', NULL, '2023-07-25 12:16:05', '2023-07-25 12:16:05'),
(356, 2, 'List of Fiber', NULL, '2023-07-25 12:16:08', '2023-07-25 12:16:08'),
(357, 2, 'Stock List', NULL, '2023-07-25 12:16:35', '2023-07-25 12:16:35'),
(358, 2, 'Stock List', NULL, '2023-07-25 12:16:38', '2023-07-25 12:16:38'),
(359, 2, 'Stock List', NULL, '2023-07-25 12:17:49', '2023-07-25 12:17:49'),
(360, 2, 'Stock List', NULL, '2023-07-25 12:17:58', '2023-07-25 12:17:58'),
(361, 2, 'Stock List', NULL, '2023-07-25 12:18:30', '2023-07-25 12:18:30'),
(362, 2, 'List of Fiber', NULL, '2023-07-25 12:18:48', '2023-07-25 12:18:48'),
(363, 2, 'List of Fiber', NULL, '2023-07-25 12:18:53', '2023-07-25 12:18:53'),
(364, 2, 'List of Fiber', NULL, '2023-07-25 12:19:09', '2023-07-25 12:19:09'),
(365, 2, 'List of Fiber', NULL, '2023-07-25 12:19:53', '2023-07-25 12:19:53'),
(366, 2, 'Stock List', NULL, '2023-07-25 12:20:40', '2023-07-25 12:20:40'),
(367, 2, 'Stock List', NULL, '2023-07-25 12:20:42', '2023-07-25 12:20:42'),
(368, 2, 'List of Fiber', NULL, '2023-07-25 12:21:04', '2023-07-25 12:21:04'),
(369, 2, 'List of Fiber', NULL, '2023-07-25 12:22:29', '2023-07-25 12:22:29'),
(370, 2, 'List of Fiber', NULL, '2023-07-25 12:25:44', '2023-07-25 12:25:44'),
(371, 2, 'List of Fiber', NULL, '2023-07-25 12:25:56', '2023-07-25 12:25:56'),
(372, 2, 'List of Fiber', NULL, '2023-07-25 13:54:32', '2023-07-25 13:54:32'),
(373, 330, 'Stock List', NULL, '2023-08-05 14:16:31', '2023-08-05 14:16:31'),
(374, 330, 'Product List', NULL, '2023-08-05 14:16:40', '2023-08-05 14:16:40'),
(375, 330, 'Stock List', NULL, '2023-08-05 14:18:04', '2023-08-05 14:18:04'),
(376, 330, 'Stock List', NULL, '2023-08-05 14:18:10', '2023-08-05 14:18:10'),
(377, 330, 'Stock List', NULL, '2023-08-05 14:18:15', '2023-08-05 14:18:15'),
(378, 2, 'Stock List', NULL, '2023-08-05 14:19:43', '2023-08-05 14:19:43'),
(379, 2, 'Stock List', NULL, '2023-08-05 14:19:51', '2023-08-05 14:19:51'),
(380, 2, 'Stock List', NULL, '2023-08-05 14:19:56', '2023-08-05 14:19:56'),
(381, 2, 'List of Fiber', NULL, '2023-08-05 14:20:28', '2023-08-05 14:20:28'),
(382, 2, 'List of Fiber', NULL, '2023-08-05 14:20:37', '2023-08-05 14:20:37'),
(383, 2, 'List of Fiber', NULL, '2023-08-05 14:20:41', '2023-08-05 14:20:41'),
(384, 2, 'Product List', NULL, '2023-08-05 14:20:51', '2023-08-05 14:20:51'),
(385, 2, 'Stock List', NULL, '2023-08-05 14:21:03', '2023-08-05 14:21:03'),
(386, 2, 'Stock List', NULL, '2023-08-05 14:21:08', '2023-08-05 14:21:08'),
(387, 330, 'Stock List', NULL, '2023-08-05 14:30:52', '2023-08-05 14:30:52'),
(388, 330, 'Fiber Laying Stock', '19', '2023-08-08 14:27:21', '2023-08-08 14:27:21'),
(389, 330, 'List of Fiber', NULL, '2023-08-08 14:28:23', '2023-08-08 14:28:23'),
(390, 330, 'List of Fiber', NULL, '2023-08-08 14:28:36', '2023-08-08 14:28:36'),
(391, 330, 'Product List', NULL, '2023-08-08 14:30:05', '2023-08-08 14:30:05'),
(392, 330, 'Stock List', NULL, '2023-08-08 14:30:43', '2023-08-08 14:30:43'),
(393, 330, 'Stock List', NULL, '2023-08-08 14:30:59', '2023-08-08 14:30:59'),
(394, 330, 'Product List', NULL, '2023-08-08 14:32:07', '2023-08-08 14:32:07'),
(395, 2, 'List FiberLaying', NULL, '2023-08-14 13:53:49', '2023-08-14 13:53:49'),
(396, 2, 'List of Fiber', NULL, '2023-08-14 13:54:14', '2023-08-14 13:54:14'),
(397, 2, 'List of Fiber', NULL, '2023-08-14 13:54:17', '2023-08-14 13:54:17'),
(398, 2, 'List of Fiber', NULL, '2023-08-14 13:54:42', '2023-08-14 13:54:42'),
(399, 330, 'List of Fiber', NULL, '2023-08-14 13:56:08', '2023-08-14 13:56:08'),
(400, 330, 'List of Fiber', NULL, '2023-08-14 13:56:11', '2023-08-14 13:56:11'),
(401, 330, 'List of Fiber', NULL, '2023-08-14 13:56:17', '2023-08-14 13:56:17'),
(402, 330, 'List of Fiber', NULL, '2023-08-14 13:56:29', '2023-08-14 13:56:29'),
(403, 330, 'Stock List', NULL, '2023-08-14 13:56:53', '2023-08-14 13:56:53'),
(404, 330, 'Stock List', NULL, '2023-08-14 13:56:58', '2023-08-14 13:56:58'),
(405, 330, 'Stock List', NULL, '2023-08-14 13:57:10', '2023-08-14 13:57:10'),
(406, 330, 'Stock List', NULL, '2023-08-14 13:57:14', '2023-08-14 13:57:14'),
(407, 330, 'Stock List', NULL, '2023-08-14 13:57:17', '2023-08-14 13:57:17'),
(408, 330, 'Product List', NULL, '2023-08-14 13:57:56', '2023-08-14 13:57:56'),
(409, 331, 'List FiberLaying', NULL, '2023-08-14 14:35:55', '2023-08-14 14:35:55'),
(410, 331, 'List FiberLaying', NULL, '2023-08-14 14:36:04', '2023-08-14 14:36:04'),
(411, 331, 'List FiberLaying', NULL, '2023-08-14 14:36:08', '2023-08-14 14:36:08'),
(412, 331, 'List FiberLaying', NULL, '2023-08-14 14:36:11', '2023-08-14 14:36:11'),
(413, 331, 'List FiberLaying', NULL, '2023-08-14 14:36:15', '2023-08-14 14:36:15'),
(414, 331, 'List FiberLaying', NULL, '2023-08-14 14:45:06', '2023-08-14 14:45:06'),
(415, 2, 'List FH', NULL, '2023-08-17 11:42:06', '2023-08-17 11:42:06'),
(416, 2, 'List EDFA', NULL, '2023-08-17 11:42:11', '2023-08-17 11:42:11'),
(417, 2, 'List FiberLaying', NULL, '2023-08-17 11:42:13', '2023-08-17 11:42:13'),
(418, 2, 'List DP', NULL, '2023-08-17 11:42:19', '2023-08-17 11:42:19'),
(419, 2, 'List FH', NULL, '2023-08-17 11:42:21', '2023-08-17 11:42:21'),
(420, 331, 'List FiberLaying', NULL, '2023-08-18 09:38:56', '2023-08-18 09:38:56'),
(421, 330, 'Stock List', NULL, '2023-08-18 10:46:27', '2023-08-18 10:46:27'),
(422, 330, 'Stock List', NULL, '2023-08-18 10:46:32', '2023-08-18 10:46:32'),
(423, 330, 'List of Fiber', NULL, '2023-08-18 10:47:02', '2023-08-18 10:47:02'),
(424, 330, 'List of Fiber', NULL, '2023-08-18 10:47:05', '2023-08-18 10:47:05'),
(425, 330, 'Stock List', NULL, '2023-08-18 10:47:15', '2023-08-18 10:47:15'),
(426, 330, 'Stock List', NULL, '2023-08-18 10:47:20', '2023-08-18 10:47:20'),
(427, 2, 'OLT List', NULL, '2023-08-18 17:22:41', '2023-08-18 17:22:41'),
(428, 2, 'OLT List', NULL, '2023-08-18 17:23:02', '2023-08-18 17:23:02'),
(429, 330, 'Stock List', NULL, '2023-08-25 10:52:04', '2023-08-25 10:52:04'),
(430, 330, 'Product List', NULL, '2023-08-25 10:52:18', '2023-08-25 10:52:18'),
(431, 330, 'Stock List', NULL, '2023-08-25 10:53:31', '2023-08-25 10:53:31'),
(432, 330, 'Stock List', NULL, '2023-08-25 10:53:46', '2023-08-25 10:53:46'),
(433, 330, 'Stock List', NULL, '2023-08-25 10:53:54', '2023-08-25 10:53:54'),
(434, 331, 'List DPD', NULL, '2023-08-25 11:21:29', '2023-08-25 11:21:29'),
(435, 331, 'List DPD', NULL, '2023-08-25 11:25:24', '2023-08-25 11:25:24'),
(436, 331, 'List DPD', NULL, '2023-08-25 11:25:32', '2023-08-25 11:25:32'),
(437, 331, 'List DPD', NULL, '2023-08-25 11:25:32', '2023-08-25 11:25:32'),
(438, 331, 'List FiberLaying', NULL, '2023-08-25 11:27:29', '2023-08-25 11:27:29'),
(439, 331, 'List FiberLaying', NULL, '2023-08-25 11:27:57', '2023-08-25 11:27:57'),
(440, 330, 'Fiber Laying Stock', '19', '2023-08-25 11:30:57', '2023-08-25 11:30:57'),
(441, 331, 'List FiberLaying', NULL, '2023-08-25 11:32:12', '2023-08-25 11:32:12'),
(442, 330, 'List of Fiber', NULL, '2023-08-25 11:34:47', '2023-08-25 11:34:47'),
(443, 330, 'List of Fiber', NULL, '2023-08-25 11:34:53', '2023-08-25 11:34:53'),
(444, 330, 'List of Fiber', NULL, '2023-08-25 11:35:08', '2023-08-25 11:35:08'),
(445, 331, 'List FiberLaying', NULL, '2023-08-25 11:35:46', '2023-08-25 11:35:46'),
(446, 331, 'List FiberLaying', NULL, '2023-08-25 11:35:50', '2023-08-25 11:35:50'),
(447, 331, 'List FiberLaying', NULL, '2023-08-25 11:36:18', '2023-08-25 11:36:18'),
(448, 331, 'List FiberLaying', NULL, '2023-08-25 11:37:24', '2023-08-25 11:37:24'),
(449, 331, 'List FiberLaying', NULL, '2023-08-25 11:39:21', '2023-08-25 11:39:21'),
(450, 331, 'List FiberLaying', NULL, '2023-08-25 11:39:39', '2023-08-25 11:39:39'),
(451, 330, 'Stock List', NULL, '2023-08-25 11:40:12', '2023-08-25 11:40:12'),
(452, 330, 'Stock List', NULL, '2023-08-25 11:41:32', '2023-08-25 11:41:32'),
(453, 330, 'Stock List', NULL, '2023-08-25 11:41:39', '2023-08-25 11:41:39'),
(454, 330, 'Stock List', NULL, '2023-08-25 11:41:44', '2023-08-25 11:41:44'),
(455, 2, 'Product List', NULL, '2023-08-25 11:43:04', '2023-08-25 11:43:04'),
(456, 2, 'List of Fiber', NULL, '2023-08-25 11:44:44', '2023-08-25 11:44:44'),
(457, 2, 'List of Fiber', NULL, '2023-08-25 11:44:47', '2023-08-25 11:44:47'),
(458, 2, 'List of Fiber', NULL, '2023-08-25 11:45:42', '2023-08-25 11:45:42'),
(459, 2, 'List of Fiber', NULL, '2023-08-25 11:46:15', '2023-08-25 11:46:15'),
(460, 2, 'List of Fiber', NULL, '2023-08-25 11:46:19', '2023-08-25 11:46:19'),
(461, 2, 'List of Fiber', NULL, '2023-08-25 11:48:05', '2023-08-25 11:48:05'),
(462, 2, 'List of Fiber', NULL, '2023-08-25 11:48:09', '2023-08-25 11:48:09'),
(463, 2, 'List of Fiber', NULL, '2023-08-25 11:48:12', '2023-08-25 11:48:12'),
(464, 331, 'List FiberLaying', NULL, '2023-08-25 11:49:39', '2023-08-25 11:49:39'),
(465, 330, 'Stock List', NULL, '2023-08-25 11:53:21', '2023-08-25 11:53:21'),
(466, 330, 'Stock List', NULL, '2023-08-25 11:53:32', '2023-08-25 11:53:32'),
(467, 330, 'Stock List', NULL, '2023-08-25 11:53:38', '2023-08-25 11:53:38'),
(468, 331, 'List FiberLaying', NULL, '2023-08-25 13:28:51', '2023-08-25 13:28:51'),
(469, 331, 'List FiberLaying', NULL, '2023-08-25 13:43:09', '2023-08-25 13:43:09'),
(470, 331, 'List FiberLaying', NULL, '2023-08-25 13:46:02', '2023-08-25 13:46:02'),
(471, 331, 'List FiberLaying', NULL, '2023-08-25 13:46:08', '2023-08-25 13:46:08'),
(472, 331, 'List FiberLaying', NULL, '2023-08-25 13:46:14', '2023-08-25 13:46:14'),
(473, 331, 'List FiberLaying', NULL, '2023-08-25 13:46:20', '2023-08-25 13:46:20'),
(474, 331, 'List FiberLaying', NULL, '2023-08-25 13:46:24', '2023-08-25 13:46:24'),
(475, 331, 'Create FiberLaying ', 'LR COLONY DPD 1', '2023-08-25 13:46:26', '2023-08-25 13:46:26'),
(476, 331, 'List FiberLaying', NULL, '2023-08-25 13:46:26', '2023-08-25 13:46:26'),
(477, 331, 'List FiberLaying', NULL, '2023-08-25 13:46:32', '2023-08-25 13:46:32'),
(478, 331, 'List DPD', NULL, '2023-08-25 13:46:46', '2023-08-25 13:46:46'),
(479, 331, 'List DPD', NULL, '2023-08-25 13:46:48', '2023-08-25 13:46:48'),
(480, 330, 'Fiber Laying Stock', '19', '2023-08-25 18:20:53', '2023-08-25 18:20:53'),
(481, 330, 'List of Fiber', NULL, '2023-08-25 18:21:00', '2023-08-25 18:21:00'),
(482, 330, 'List of Fiber', NULL, '2023-08-25 18:21:05', '2023-08-25 18:21:05'),
(483, 331, 'List FiberLaying', NULL, '2023-08-25 18:22:11', '2023-08-25 18:22:11'),
(484, 331, 'List FiberLaying', NULL, '2023-08-25 18:29:30', '2023-08-25 18:29:30'),
(485, 331, 'List FiberLaying', NULL, '2023-08-25 18:30:05', '2023-08-25 18:30:05'),
(486, 331, 'Create FiberLaying ', 'LR COLONY DPD 1 to DP2', '2023-08-25 18:38:43', '2023-08-25 18:38:43'),
(487, 331, 'List FiberLaying', NULL, '2023-08-25 18:38:43', '2023-08-25 18:38:43'),
(488, 331, 'List DPD', NULL, '2023-08-26 12:04:02', '2023-08-26 12:04:02'),
(489, 331, 'List FiberLaying', NULL, '2023-08-26 12:22:21', '2023-08-26 12:22:21'),
(490, 331, 'List FiberLaying', NULL, '2023-08-26 12:24:01', '2023-08-26 12:24:01'),
(491, 331, 'List FiberLaying', NULL, '2023-08-26 12:31:56', '2023-08-26 12:31:56'),
(492, 331, 'List FiberLaying', NULL, '2023-08-26 12:32:36', '2023-08-26 12:32:36'),
(493, 2, 'List FiberLaying', NULL, '2023-08-26 12:33:29', '2023-08-26 12:33:29'),
(494, 2, 'List FiberLaying', NULL, '2023-08-26 12:34:10', '2023-08-26 12:34:10'),
(495, 331, 'List FiberLaying', NULL, '2023-08-26 12:38:59', '2023-08-26 12:38:59'),
(496, 331, 'List FiberLaying', NULL, '2023-08-26 13:19:56', '2023-08-26 13:19:56'),
(497, 331, 'List FiberLaying', NULL, '2023-08-26 13:23:44', '2023-08-26 13:23:44'),
(498, 331, 'List FiberLaying', NULL, '2023-08-26 13:23:44', '2023-08-26 13:23:44'),
(499, 2, 'List FiberLaying', NULL, '2023-08-26 13:39:22', '2023-08-26 13:39:22'),
(500, 330, 'Fiber Laying Stock', '19', '2023-08-26 15:00:09', '2023-08-26 15:00:09'),
(501, 331, 'List FiberLaying', NULL, '2023-08-26 15:00:53', '2023-08-26 15:00:53'),
(502, 330, 'List of Fiber', NULL, '2023-08-26 15:01:36', '2023-08-26 15:01:36'),
(503, 330, 'List of Fiber', NULL, '2023-08-26 15:01:40', '2023-08-26 15:01:40'),
(504, 330, 'Stock List', NULL, '2023-08-26 15:02:56', '2023-08-26 15:02:56'),
(505, 330, 'Stock List', NULL, '2023-08-26 15:03:05', '2023-08-26 15:03:05'),
(506, 330, 'Product List', NULL, '2023-08-26 15:03:29', '2023-08-26 15:03:29'),
(507, 331, 'List FiberLaying', NULL, '2023-08-26 15:03:32', '2023-08-26 15:03:32'),
(508, 331, 'List FiberLaying', NULL, '2023-08-26 15:04:57', '2023-08-26 15:04:57'),
(509, 331, 'List FiberLaying', NULL, '2023-08-26 15:04:58', '2023-08-26 15:04:58'),
(510, 331, 'List FiberLaying', NULL, '2023-08-26 15:05:02', '2023-08-26 15:05:02'),
(511, 331, 'List FiberLaying', NULL, '2023-08-26 15:05:11', '2023-08-26 15:05:11'),
(512, 331, 'List FiberLaying', NULL, '2023-08-26 15:13:12', '2023-08-26 15:13:12'),
(513, 331, 'Create FiberLaying ', 'LR COLONY DP2 TO DP1', '2023-08-26 15:21:27', '2023-08-26 15:21:27'),
(514, 331, 'List FiberLaying', NULL, '2023-08-26 15:21:27', '2023-08-26 15:21:27'),
(515, 331, 'List FiberLaying', NULL, '2023-08-26 15:23:07', '2023-08-26 15:23:07'),
(516, 330, 'Product List', NULL, '2023-08-26 15:24:30', '2023-08-26 15:24:30'),
(517, 2, 'Product List', NULL, '2023-08-26 15:25:14', '2023-08-26 15:25:14'),
(518, 2, 'Product List', NULL, '2023-08-26 15:30:37', '2023-08-26 15:30:37'),
(519, 330, 'Product List', NULL, '2023-08-26 15:30:47', '2023-08-26 15:30:47'),
(520, 330, 'Product List', NULL, '2023-08-26 15:30:53', '2023-08-26 15:30:53'),
(521, 330, 'Product List', NULL, '2023-08-26 15:33:09', '2023-08-26 15:33:09'),
(522, 2, 'List DPD', NULL, '2023-08-26 15:39:05', '2023-08-26 15:39:05'),
(523, 330, 'Stock List', NULL, '2023-08-26 15:40:31', '2023-08-26 15:40:31'),
(524, 330, 'Stock List', NULL, '2023-08-26 15:40:42', '2023-08-26 15:40:42'),
(525, 330, 'Stock List', NULL, '2023-08-26 15:40:56', '2023-08-26 15:40:56'),
(526, 330, 'Stock List', NULL, '2023-08-26 15:41:02', '2023-08-26 15:41:02'),
(527, 330, 'Stock List', NULL, '2023-08-26 15:43:30', '2023-08-26 15:43:30'),
(528, 330, 'Stock List', NULL, '2023-08-26 15:43:41', '2023-08-26 15:43:41'),
(529, 330, 'Stock List', NULL, '2023-08-26 15:43:47', '2023-08-26 15:43:47'),
(530, 2, 'Product List', NULL, '2023-08-26 15:46:07', '2023-08-26 15:46:07'),
(531, 2, 'Product List', NULL, '2023-08-26 15:46:21', '2023-08-26 15:46:21'),
(532, 2, 'List DPD', NULL, '2023-08-26 15:48:33', '2023-08-26 15:48:33'),
(533, 2, 'Product List', NULL, '2023-08-26 16:03:36', '2023-08-26 16:03:36'),
(534, 2, 'List DPD', NULL, '2023-08-26 16:06:05', '2023-08-26 16:06:05'),
(535, 2, 'List DPD', NULL, '2023-08-26 16:12:17', '2023-08-26 16:12:17'),
(536, 331, 'List FiberLaying', NULL, '2023-08-26 16:26:44', '2023-08-26 16:26:44'),
(537, 331, 'Create FiberLaying ', 'LR DP1 to FH 1', '2023-08-26 16:33:33', '2023-08-26 16:33:33'),
(538, 331, 'List FiberLaying', NULL, '2023-08-26 16:33:33', '2023-08-26 16:33:33'),
(539, 331, 'Create FiberLaying ', 'FH1 to FH2', '2023-08-26 16:38:25', '2023-08-26 16:38:25'),
(540, 331, 'List FiberLaying', NULL, '2023-08-26 16:38:25', '2023-08-26 16:38:25'),
(541, 2, 'Product List', NULL, '2023-08-26 16:41:51', '2023-08-26 16:41:51'),
(542, 2, 'Stock List', NULL, '2023-08-26 16:42:23', '2023-08-26 16:42:23'),
(543, 2, 'Stock List', NULL, '2023-08-26 16:42:29', '2023-08-26 16:42:29'),
(544, 331, 'List FiberLaying', NULL, '2023-08-26 16:43:02', '2023-08-26 16:43:02'),
(545, 330, 'Stock List', NULL, '2023-08-26 16:44:28', '2023-08-26 16:44:28'),
(546, 330, 'Stock List', NULL, '2023-08-26 16:44:31', '2023-08-26 16:44:31'),
(547, 330, 'List of Fiber', NULL, '2023-08-26 16:44:43', '2023-08-26 16:44:43'),
(548, 330, 'Stock List', NULL, '2023-08-26 16:44:56', '2023-08-26 16:44:56'),
(549, 330, 'Stock List', NULL, '2023-08-26 16:45:00', '2023-08-26 16:45:00'),
(550, 330, 'Stock List', NULL, '2023-08-26 16:45:06', '2023-08-26 16:45:06'),
(551, 330, 'Stock List', NULL, '2023-08-26 16:45:59', '2023-08-26 16:45:59'),
(552, 330, 'Stock List', NULL, '2023-08-26 16:46:21', '2023-08-26 16:46:21'),
(553, 330, 'Product List', NULL, '2023-08-26 16:48:01', '2023-08-26 16:48:01'),
(554, 2, 'List DPD', NULL, '2023-08-26 16:49:41', '2023-08-26 16:49:41'),
(555, 2, 'List FiberLaying', NULL, '2023-08-26 16:51:03', '2023-08-26 16:51:03'),
(556, 331, 'List FiberLaying', NULL, '2023-08-26 16:52:24', '2023-08-26 16:52:24'),
(557, 331, 'List FiberLaying', NULL, '2023-08-26 16:55:01', '2023-08-26 16:55:01'),
(558, 2, 'List DPD', NULL, '2023-08-26 16:59:22', '2023-08-26 16:59:22'),
(559, 2, 'Stock List', NULL, '2023-08-26 17:01:43', '2023-08-26 17:01:43'),
(560, 2, 'Stock List', NULL, '2023-08-26 17:01:47', '2023-08-26 17:01:47'),
(561, 2, 'Stock List', NULL, '2023-08-26 17:01:51', '2023-08-26 17:01:51'),
(562, 2, 'List DP', NULL, '2023-08-26 17:14:05', '2023-08-26 17:14:05'),
(563, 330, 'Fiber Laying Stock', '19', '2023-08-26 17:26:08', '2023-08-26 17:26:08'),
(564, 330, 'List of Fiber', NULL, '2023-08-26 17:26:13', '2023-08-26 17:26:13'),
(565, 330, 'List of Fiber', NULL, '2023-08-26 17:26:19', '2023-08-26 17:26:19'),
(566, 330, 'List of Fiber', NULL, '2023-08-26 17:26:27', '2023-08-26 17:26:27'),
(567, 2, 'Product List', NULL, '2023-08-26 17:28:25', '2023-08-26 17:28:25'),
(568, 330, 'Stock List', NULL, '2023-08-26 17:31:02', '2023-08-26 17:31:02'),
(569, 330, 'Stock List', NULL, '2023-08-26 17:31:11', '2023-08-26 17:31:11'),
(570, 330, 'Stock List', NULL, '2023-08-26 17:31:15', '2023-08-26 17:31:15'),
(571, 330, 'Product List', NULL, '2023-08-26 17:31:55', '2023-08-26 17:31:55'),
(572, 2, 'List DP', NULL, '2023-08-26 17:47:54', '2023-08-26 17:47:54'),
(573, 2, 'List DP', NULL, '2023-08-26 18:39:41', '2023-08-26 18:39:41'),
(574, 2, 'List FH', NULL, '2023-08-26 18:46:08', '2023-08-26 18:46:08'),
(575, 2, 'List DP', NULL, '2023-08-26 18:46:57', '2023-08-26 18:46:57'),
(576, 2, 'List FH', NULL, '2023-08-26 18:47:14', '2023-08-26 18:47:14'),
(577, 2, 'List DP', NULL, '2023-08-26 18:49:05', '2023-08-26 18:49:05'),
(578, 2, 'List FH', NULL, '2023-08-26 18:54:19', '2023-08-26 18:54:19'),
(579, 2, 'List DP', NULL, '2023-08-27 09:08:15', '2023-08-27 09:08:15'),
(580, 2, 'List FH', NULL, '2023-08-27 09:08:27', '2023-08-27 09:08:27'),
(581, 2, 'List FiberLaying', NULL, '2023-08-27 09:34:26', '2023-08-27 09:34:26'),
(582, 2, 'List DPD', NULL, '2023-08-27 09:35:16', '2023-08-27 09:35:16'),
(583, 2, 'List DP', NULL, '2023-08-27 09:37:27', '2023-08-27 09:37:27'),
(584, 2, 'List FiberLaying', NULL, '2023-08-27 09:39:52', '2023-08-27 09:39:52'),
(585, 2, 'List DP', NULL, '2023-08-27 10:09:33', '2023-08-27 10:09:33'),
(586, 2, 'Product List', NULL, '2023-08-27 10:15:24', '2023-08-27 10:15:24'),
(587, 2, 'Product List', NULL, '2023-08-27 10:15:36', '2023-08-27 10:15:36'),
(588, 2, 'Stock List', NULL, '2023-08-27 10:15:45', '2023-08-27 10:15:45'),
(589, 2, 'Stock List', NULL, '2023-08-27 10:15:48', '2023-08-27 10:15:48'),
(590, 2, 'List DP', NULL, '2023-08-27 10:16:50', '2023-08-27 10:16:50'),
(591, 2, 'List EDFA', NULL, '2023-08-27 10:26:11', '2023-08-27 10:26:11'),
(592, 2, 'List EDFA', NULL, '2023-08-27 10:28:28', '2023-08-27 10:28:28'),
(593, 2, 'List EDFA', NULL, '2023-08-27 10:28:29', '2023-08-27 10:28:29'),
(594, 2, 'List EDFA', NULL, '2023-08-27 10:28:34', '2023-08-27 10:28:34'),
(595, 2, 'OLT List', NULL, '2023-08-27 10:29:23', '2023-08-27 10:29:23'),
(596, 2, 'OLT List', NULL, '2023-08-27 10:33:15', '2023-08-27 10:33:15'),
(597, 2, 'OLT List', NULL, '2023-08-27 10:44:19', '2023-08-27 10:44:19'),
(598, 2, 'OLT List', NULL, '2023-08-27 10:44:28', '2023-08-27 10:44:28'),
(599, 331, 'List DPD', NULL, '2023-08-27 10:45:34', '2023-08-27 10:45:34'),
(600, 331, 'List DPD', NULL, '2023-08-27 10:46:46', '2023-08-27 10:46:46'),
(601, 331, 'List DPD', NULL, '2023-08-27 10:48:37', '2023-08-27 10:48:37'),
(602, 331, 'Create DPD', '1', '2023-08-27 10:49:42', '2023-08-27 10:49:42'),
(603, 331, 'List DPD', NULL, '2023-08-27 10:49:42', '2023-08-27 10:49:42'),
(604, 331, 'List DPD', NULL, '2023-08-27 10:49:54', '2023-08-27 10:49:54'),
(605, 331, 'List DPD', NULL, '2023-08-27 10:49:56', '2023-08-27 10:49:56'),
(606, 331, 'List DPD', NULL, '2023-08-27 10:50:05', '2023-08-27 10:50:05'),
(607, 331, 'List DPD', NULL, '2023-08-27 10:50:07', '2023-08-27 10:50:07'),
(608, 331, 'List FiberLaying', NULL, '2023-08-27 10:50:18', '2023-08-27 10:50:18'),
(609, 331, 'List DPD', NULL, '2023-08-27 10:51:10', '2023-08-27 10:51:10'),
(610, 331, 'List DPD', NULL, '2023-08-27 10:51:14', '2023-08-27 10:51:14'),
(611, 331, 'List FiberLaying', NULL, '2023-08-27 10:51:24', '2023-08-27 10:51:24'),
(612, 2, 'OLT List', NULL, '2023-08-27 10:52:02', '2023-08-27 10:52:02'),
(613, 2, 'List DPD', NULL, '2023-08-27 10:52:13', '2023-08-27 10:52:13'),
(614, 2, 'OLT List', NULL, '2023-08-27 10:55:00', '2023-08-27 10:55:00'),
(615, 2, 'Create OLT', 'SY2006VS215', '2023-08-27 11:20:05', '2023-08-27 11:20:05'),
(616, 2, 'OLT List', NULL, '2023-08-27 11:20:05', '2023-08-27 11:20:05'),
(617, 2, 'OLT List', NULL, '2023-08-27 11:21:38', '2023-08-27 11:21:38'),
(618, 2, 'Create OLT', 'SY2006VS215', '2023-08-27 11:22:11', '2023-08-27 11:22:11'),
(619, 2, 'OLT List', NULL, '2023-08-27 11:22:11', '2023-08-27 11:22:11'),
(620, 2, 'OLT List', NULL, '2023-08-27 11:23:09', '2023-08-27 11:23:09'),
(621, 2, 'Create OLT', 'SY2006VS215', '2023-08-27 11:23:34', '2023-08-27 11:23:34'),
(622, 2, 'OLT List', NULL, '2023-08-27 11:23:34', '2023-08-27 11:23:34'),
(623, 2, 'OLT List', NULL, '2023-08-27 11:23:52', '2023-08-27 11:23:52'),
(624, 2, 'OLT List', NULL, '2023-08-27 11:24:37', '2023-08-27 11:24:37'),
(625, 2, 'OLT List', NULL, '2023-08-27 11:24:41', '2023-08-27 11:24:41'),
(626, 2, 'OLT List', NULL, '2023-08-27 11:24:45', '2023-08-27 11:24:45'),
(627, 2, 'OLT List', NULL, '2023-08-27 11:25:14', '2023-08-27 11:25:14'),
(628, 2, 'OLT List', NULL, '2023-08-27 11:25:29', '2023-08-27 11:25:29'),
(629, 2, 'OLT List', NULL, '2023-08-27 11:26:13', '2023-08-27 11:26:13'),
(630, 2, 'List DP', NULL, '2023-08-27 11:26:18', '2023-08-27 11:26:18'),
(631, 2, 'OLT List', NULL, '2023-08-27 11:28:14', '2023-08-27 11:28:14'),
(632, 2, 'List DP', NULL, '2023-08-27 11:28:53', '2023-08-27 11:28:53'),
(633, 2, 'List DP', NULL, '2023-08-27 11:37:18', '2023-08-27 11:37:18'),
(634, 2, 'List DP', NULL, '2023-08-27 11:39:29', '2023-08-27 11:39:29'),
(635, 2, 'List DP', NULL, '2023-08-27 11:42:44', '2023-08-27 11:42:44'),
(636, 331, 'List DP', NULL, '2023-08-27 11:43:30', '2023-08-27 11:43:30'),
(637, 331, 'List DP', NULL, '2023-08-27 11:43:56', '2023-08-27 11:43:56'),
(638, 331, 'List DP', NULL, '2023-08-27 11:44:05', '2023-08-27 11:44:05'),
(639, 331, 'List DP', NULL, '2023-08-27 11:44:09', '2023-08-27 11:44:09'),
(640, 331, 'List DP', NULL, '2023-08-27 11:44:10', '2023-08-27 11:44:10'),
(641, 331, 'List DP', NULL, '2023-08-27 11:48:26', '2023-08-27 11:48:26'),
(642, 2, 'List DP', NULL, '2023-08-27 11:53:45', '2023-08-27 11:53:45'),
(643, 331, 'List FH', NULL, '2023-08-27 11:54:56', '2023-08-27 11:54:56'),
(644, 331, 'List DP', NULL, '2023-08-27 11:55:20', '2023-08-27 11:55:20'),
(645, 331, 'List DP', NULL, '2023-08-27 11:55:39', '2023-08-27 11:55:39'),
(646, 331, 'List DP', NULL, '2023-08-27 11:58:36', '2023-08-27 11:58:36');
INSERT INTO `slj_logs` (`id`, `employee_id`, `action_name`, `value_of_action`, `created_at`, `updated_at`) VALUES
(647, 331, 'List DP', NULL, '2023-08-27 11:59:45', '2023-08-27 11:59:45'),
(648, 331, 'List DP', NULL, '2023-08-27 12:01:36', '2023-08-27 12:01:36'),
(649, 331, 'List DP', NULL, '2023-08-27 12:01:59', '2023-08-27 12:01:59'),
(650, 331, 'List DP', NULL, '2023-08-27 12:34:29', '2023-08-27 12:34:29'),
(651, 331, 'List DP', NULL, '2023-08-27 12:36:00', '2023-08-27 12:36:00'),
(652, 331, 'List DP', NULL, '2023-08-27 13:01:50', '2023-08-27 13:01:50'),
(653, 331, 'List DP', NULL, '2023-08-27 13:24:21', '2023-08-27 13:24:21'),
(654, 331, 'List DP', NULL, '2023-08-27 13:32:21', '2023-08-27 13:32:21'),
(655, 331, 'List DP', NULL, '2023-08-27 13:33:40', '2023-08-27 13:33:40'),
(656, 331, 'List DP', NULL, '2023-08-27 13:36:25', '2023-08-27 13:36:25'),
(657, 331, 'List DP', NULL, '2023-08-27 13:37:50', '2023-08-27 13:37:50'),
(658, 331, 'List DP', NULL, '2023-08-27 13:39:58', '2023-08-27 13:39:58'),
(659, 331, 'List DP', NULL, '2023-08-27 13:42:15', '2023-08-27 13:42:15'),
(660, 331, 'List FH', NULL, '2023-08-27 13:44:19', '2023-08-27 13:44:19'),
(661, 331, 'List DP', NULL, '2023-08-27 13:44:29', '2023-08-27 13:44:29'),
(662, 2, 'List FH', NULL, '2023-08-27 13:48:15', '2023-08-27 13:48:15'),
(663, 331, 'List DP', NULL, '2023-08-27 13:49:11', '2023-08-27 13:49:11'),
(664, 331, 'List DP', NULL, '2023-08-27 13:52:05', '2023-08-27 13:52:05'),
(665, 2, 'List DP', NULL, '2023-08-27 13:53:06', '2023-08-27 13:53:06'),
(666, 2, 'List DP', NULL, '2023-08-27 13:57:47', '2023-08-27 13:57:47'),
(667, 2, 'List DP', NULL, '2023-08-27 14:05:16', '2023-08-27 14:05:16'),
(668, 2, 'List DP', NULL, '2023-08-27 14:07:26', '2023-08-27 14:07:26'),
(669, 2, 'List DP', NULL, '2023-08-27 14:08:41', '2023-08-27 14:08:41'),
(670, 331, 'List DP', NULL, '2023-08-27 14:10:42', '2023-08-27 14:10:42'),
(671, 2, 'List DP', NULL, '2023-08-27 14:13:47', '2023-08-27 14:13:47'),
(672, 331, 'List DP', NULL, '2023-08-27 14:46:23', '2023-08-27 14:46:23'),
(673, 2, 'List DP', NULL, '2023-08-27 14:48:27', '2023-08-27 14:48:27'),
(674, 2, 'List DP', NULL, '2023-08-27 14:59:17', '2023-08-27 14:59:17'),
(675, 2, 'List DP', NULL, '2023-08-27 14:59:24', '2023-08-27 14:59:24'),
(676, 2, 'List DP', NULL, '2023-08-27 15:06:10', '2023-08-27 15:06:10'),
(677, 2, 'List DPD', NULL, '2023-08-27 15:06:29', '2023-08-27 15:06:29'),
(678, 2, 'List DPD', NULL, '2023-08-27 15:06:38', '2023-08-27 15:06:38'),
(679, 2, 'List DP', NULL, '2023-08-27 15:09:06', '2023-08-27 15:09:06'),
(680, 2, 'List DP', NULL, '2023-08-27 15:09:14', '2023-08-27 15:09:14'),
(681, 2, 'List DP', NULL, '2023-08-27 15:09:20', '2023-08-27 15:09:20'),
(682, 2, 'List DP', NULL, '2023-08-27 15:09:27', '2023-08-27 15:09:27'),
(683, 2, 'List DP', NULL, '2023-08-27 15:09:31', '2023-08-27 15:09:31'),
(684, 331, 'List FH', NULL, '2023-08-27 15:28:33', '2023-08-27 15:28:33'),
(685, 2, 'List DP', NULL, '2023-08-27 15:30:14', '2023-08-27 15:30:14'),
(686, 2, 'List DP', NULL, '2023-08-27 15:30:20', '2023-08-27 15:30:20'),
(687, 2, 'List FH', NULL, '2023-08-27 15:32:27', '2023-08-27 15:32:27'),
(688, 2, 'List FH', NULL, '2023-08-27 15:42:39', '2023-08-27 15:42:39'),
(689, 2, 'List DP', NULL, '2023-08-27 15:53:51', '2023-08-27 15:53:51'),
(690, 331, 'List FiberLaying', NULL, '2023-08-27 16:17:54', '2023-08-27 16:17:54'),
(691, 331, 'List FiberLaying', NULL, '2023-08-27 16:20:42', '2023-08-27 16:20:42'),
(692, 2, 'List FH', NULL, '2023-08-27 16:25:10', '2023-08-27 16:25:10'),
(693, 2, 'Product List', NULL, '2023-08-27 16:50:09', '2023-08-27 16:50:09'),
(694, 2, 'Product List', NULL, '2023-08-27 16:50:09', '2023-08-27 16:50:09'),
(695, 2, 'Product List', NULL, '2023-08-27 16:51:00', '2023-08-27 16:51:00'),
(696, 2, 'Product List', NULL, '2023-08-27 16:51:04', '2023-08-27 16:51:04'),
(697, 2, 'List FH', NULL, '2023-08-27 16:54:18', '2023-08-27 16:54:18'),
(698, 331, 'List FiberLaying', NULL, '2023-08-27 17:23:20', '2023-08-27 17:23:20'),
(699, 331, 'List FiberLaying', NULL, '2023-08-27 17:24:40', '2023-08-27 17:24:40'),
(700, 331, 'List FH', NULL, '2023-08-27 18:23:28', '2023-08-27 18:23:28'),
(701, 331, 'List FH', NULL, '2023-08-27 18:24:09', '2023-08-27 18:24:09'),
(702, 331, 'List FH', NULL, '2023-08-27 18:31:12', '2023-08-27 18:31:12'),
(703, 331, 'List FH', NULL, '2023-08-27 18:33:49', '2023-08-27 18:33:49'),
(704, 331, 'List FH', NULL, '2023-08-27 18:36:09', '2023-08-27 18:36:09'),
(705, 331, 'List FH', NULL, '2023-08-27 18:39:23', '2023-08-27 18:39:23'),
(706, 2, 'List FH', NULL, '2023-08-28 09:15:41', '2023-08-28 09:15:41'),
(707, 2, 'List FiberLaying', NULL, '2023-08-28 09:21:05', '2023-08-28 09:21:05'),
(708, 2, 'List DP', NULL, '2023-08-28 09:36:19', '2023-08-28 09:36:19'),
(709, 331, 'List DP', NULL, '2023-08-28 09:37:00', '2023-08-28 09:37:00'),
(710, 331, 'List DPD', NULL, '2023-08-28 09:37:50', '2023-08-28 09:37:50'),
(711, 2, 'List DP', NULL, '2023-08-28 09:44:26', '2023-08-28 09:44:26'),
(712, 2, 'OLT List', NULL, '2023-08-28 10:00:54', '2023-08-28 10:00:54'),
(713, 2, 'OLT List', NULL, '2023-08-28 10:01:13', '2023-08-28 10:01:13'),
(714, 2, 'OLT List', NULL, '2023-08-28 10:01:46', '2023-08-28 10:01:46'),
(715, 2, 'List DPD', NULL, '2023-08-28 10:01:53', '2023-08-28 10:01:53'),
(716, 2, 'List DPD', NULL, '2023-08-28 10:02:13', '2023-08-28 10:02:13'),
(717, 2, 'List DP', NULL, '2023-08-28 10:02:15', '2023-08-28 10:02:15'),
(718, 2, 'List FiberLaying', NULL, '2023-08-28 10:02:51', '2023-08-28 10:02:51'),
(719, 2, 'List FiberLaying', NULL, '2023-08-28 10:03:29', '2023-08-28 10:03:29'),
(720, 2, 'OLT List', NULL, '2023-08-28 10:03:50', '2023-08-28 10:03:50'),
(721, 2, 'List DPD', NULL, '2023-08-28 10:04:13', '2023-08-28 10:04:13'),
(722, 2, 'List DP', NULL, '2023-08-28 10:04:22', '2023-08-28 10:04:22'),
(723, 2, 'List DP', NULL, '2023-08-28 10:04:32', '2023-08-28 10:04:32'),
(724, 2, 'List DPD', NULL, '2023-08-28 10:17:04', '2023-08-28 10:17:04'),
(725, 2, 'List DPD', NULL, '2023-08-28 10:17:07', '2023-08-28 10:17:07'),
(726, 2, 'List DPD', NULL, '2023-08-28 10:17:11', '2023-08-28 10:17:11'),
(727, 331, 'List FiberLaying', NULL, '2023-08-28 10:21:09', '2023-08-28 10:21:09'),
(728, 330, 'Fiber Laying Stock', '20', '2023-08-28 10:33:03', '2023-08-28 10:33:03'),
(729, 330, 'Stock List', NULL, '2023-08-28 10:33:12', '2023-08-28 10:33:12'),
(730, 330, 'Stock List', NULL, '2023-08-28 10:33:15', '2023-08-28 10:33:15'),
(731, 330, 'Product List', NULL, '2023-08-28 10:38:22', '2023-08-28 10:38:22'),
(732, 330, 'Product List', NULL, '2023-08-28 10:38:46', '2023-08-28 10:38:46'),
(733, 330, 'Fiber Laying Stock', '19', '2023-08-28 10:41:43', '2023-08-28 10:41:43'),
(734, 330, 'List of Fiber', NULL, '2023-08-28 10:41:47', '2023-08-28 10:41:47'),
(735, 330, 'List of Fiber', NULL, '2023-08-28 10:41:50', '2023-08-28 10:41:50'),
(736, 330, 'List of Fiber', NULL, '2023-08-28 10:41:51', '2023-08-28 10:41:51'),
(737, 331, 'List FiberLaying', NULL, '2023-08-28 10:43:57', '2023-08-28 10:43:57'),
(738, 331, 'List FiberLaying', NULL, '2023-08-28 10:49:01', '2023-08-28 10:49:01'),
(739, 331, 'List FiberLaying', NULL, '2023-08-28 10:53:53', '2023-08-28 10:53:53'),
(740, 331, 'Create FiberLaying ', 'dp1 to fh3', '2023-08-28 10:56:39', '2023-08-28 10:56:39'),
(741, 331, 'List FiberLaying', NULL, '2023-08-28 10:56:39', '2023-08-28 10:56:39'),
(742, 331, 'List DPD', NULL, '2023-08-28 11:00:01', '2023-08-28 11:00:01'),
(743, 331, 'List FiberLaying', NULL, '2023-08-28 11:00:02', '2023-08-28 11:00:02'),
(744, 330, 'List of Fiber', NULL, '2023-08-28 11:06:10', '2023-08-28 11:06:10'),
(745, 330, 'List of Fiber', NULL, '2023-08-28 11:06:13', '2023-08-28 11:06:13'),
(746, 2, 'List FH', NULL, '2023-08-28 11:06:30', '2023-08-28 11:06:30'),
(747, 2, 'List FiberLaying', NULL, '2023-08-28 11:06:50', '2023-08-28 11:06:50'),
(748, 2, 'List FiberLaying', NULL, '2023-08-28 11:08:37', '2023-08-28 11:08:37'),
(749, 331, 'List FiberLaying', NULL, '2023-08-28 11:13:24', '2023-08-28 11:13:24'),
(750, 331, 'List FiberLaying', NULL, '2023-08-28 11:14:14', '2023-08-28 11:14:14'),
(751, 331, 'List FiberLaying', NULL, '2023-08-28 11:15:54', '2023-08-28 11:15:54'),
(752, 331, 'List FiberLaying', NULL, '2023-08-28 11:16:56', '2023-08-28 11:16:56'),
(753, 331, 'List FiberLaying', NULL, '2023-08-28 11:21:09', '2023-08-28 11:21:09'),
(754, 331, 'List FiberLaying', NULL, '2023-08-28 11:21:16', '2023-08-28 11:21:16'),
(755, 331, 'List FiberLaying', NULL, '2023-08-28 11:21:20', '2023-08-28 11:21:20'),
(756, 331, 'List FiberLaying', NULL, '2023-08-28 11:22:29', '2023-08-28 11:22:29'),
(757, 331, 'List FiberLaying', NULL, '2023-08-28 11:39:16', '2023-08-28 11:39:16'),
(758, 331, 'List FiberLaying', NULL, '2023-08-28 11:43:53', '2023-08-28 11:43:53'),
(759, 331, 'List FiberLaying', NULL, '2023-08-28 11:46:59', '2023-08-28 11:46:59'),
(760, 331, 'Create FiberLaying ', 'dp1 to fh5', '2023-08-28 11:50:19', '2023-08-28 11:50:19'),
(761, 331, 'List FiberLaying', NULL, '2023-08-28 11:50:19', '2023-08-28 11:50:19'),
(762, 331, 'List FiberLaying', NULL, '2023-08-28 11:51:38', '2023-08-28 11:51:38'),
(763, 331, 'List FiberLaying', NULL, '2023-08-28 12:20:51', '2023-08-28 12:20:51'),
(764, 331, 'List FiberLaying', NULL, '2023-08-28 12:23:15', '2023-08-28 12:23:15'),
(765, 331, 'List FiberLaying', NULL, '2023-08-28 12:28:45', '2023-08-28 12:28:45'),
(766, 331, 'List FiberLaying', NULL, '2023-08-28 12:29:33', '2023-08-28 12:29:33'),
(767, 331, 'Product List', NULL, '2023-08-28 12:31:57', '2023-08-28 12:31:57'),
(768, 2, 'Product List', NULL, '2023-08-28 12:32:26', '2023-08-28 12:32:26'),
(769, 2, 'Product List', NULL, '2023-08-28 12:32:35', '2023-08-28 12:32:35'),
(770, 331, 'List FH', NULL, '2023-08-28 13:20:51', '2023-08-28 13:20:51'),
(771, 331, 'List FH', NULL, '2023-08-28 13:25:33', '2023-08-28 13:25:33'),
(772, 331, 'List FiberLaying', NULL, '2023-08-28 13:38:23', '2023-08-28 13:38:23'),
(773, 331, 'Product List', NULL, '2023-08-28 14:19:23', '2023-08-28 14:19:23'),
(774, 331, 'List FiberLaying', NULL, '2023-08-28 14:19:29', '2023-08-28 14:19:29'),
(775, 2, 'List FiberLaying', NULL, '2023-08-28 15:19:13', '2023-08-28 15:19:13'),
(776, 2, 'List FiberLaying', NULL, '2023-08-28 15:20:40', '2023-08-28 15:20:40'),
(777, 2, 'List FiberLaying', NULL, '2023-08-28 17:06:05', '2023-08-28 17:06:05'),
(778, 2, 'List FiberLaying', NULL, '2023-08-28 17:07:14', '2023-08-28 17:07:14'),
(779, 2, 'List FiberLaying', NULL, '2023-08-28 17:09:26', '2023-08-28 17:09:26'),
(780, 331, 'List FH', NULL, '2023-08-28 19:04:34', '2023-08-28 19:04:34'),
(781, 2, 'List FH', NULL, '2023-08-29 09:22:21', '2023-08-29 09:22:21'),
(782, 331, 'List FiberLaying', NULL, '2023-08-29 09:25:48', '2023-08-29 09:25:48'),
(783, 2, 'Stock List', NULL, '2023-08-29 09:30:35', '2023-08-29 09:30:35'),
(784, 2, 'Stock List', NULL, '2023-08-29 09:30:39', '2023-08-29 09:30:39'),
(785, 2, 'Stock List', NULL, '2023-08-29 09:30:42', '2023-08-29 09:30:42'),
(786, 331, 'List FiberLaying', NULL, '2023-08-29 10:42:42', '2023-08-29 10:42:42'),
(787, 331, 'List DP', NULL, '2023-08-29 11:41:59', '2023-08-29 11:41:59'),
(788, 2, 'List DP', NULL, '2023-08-29 11:52:32', '2023-08-29 11:52:32'),
(789, 2, 'List FH', NULL, '2023-08-29 12:26:16', '2023-08-29 12:26:16'),
(790, 331, 'List FH', NULL, '2023-08-29 12:38:57', '2023-08-29 12:38:57'),
(791, 331, 'List FiberLaying', NULL, '2023-08-29 12:41:47', '2023-08-29 12:41:47'),
(792, 331, 'List FiberLaying', NULL, '2023-08-29 12:42:17', '2023-08-29 12:42:17'),
(793, 331, 'Create FiberLaying ', 'dp1 to fh4', '2023-08-29 12:49:51', '2023-08-29 12:49:51'),
(794, 331, 'List FiberLaying', NULL, '2023-08-29 12:49:51', '2023-08-29 12:49:51'),
(795, 331, 'List FH', NULL, '2023-08-29 12:50:18', '2023-08-29 12:50:18'),
(796, 331, 'List FH', NULL, '2023-08-29 12:52:10', '2023-08-29 12:52:10'),
(797, 331, 'List FH', NULL, '2023-08-29 12:52:30', '2023-08-29 12:52:30'),
(798, 331, 'List FH', NULL, '2023-08-29 12:54:05', '2023-08-29 12:54:05'),
(799, 331, 'List FH', NULL, '2023-08-29 12:54:44', '2023-08-29 12:54:44'),
(800, 331, 'List FH', NULL, '2023-08-29 12:55:55', '2023-08-29 12:55:55'),
(801, 331, 'List FH', NULL, '2023-08-29 12:56:32', '2023-08-29 12:56:32'),
(802, 331, 'List FH', NULL, '2023-08-29 13:02:21', '2023-08-29 13:02:21'),
(803, 331, 'List DP', NULL, '2023-08-29 13:08:33', '2023-08-29 13:08:33'),
(804, 331, 'List DP', NULL, '2023-08-29 13:08:47', '2023-08-29 13:08:47'),
(805, 2, 'List DP', NULL, '2023-08-29 13:09:54', '2023-08-29 13:09:54'),
(806, 331, 'List DP', NULL, '2023-08-29 13:09:59', '2023-08-29 13:09:59'),
(807, 331, 'List FiberLaying', NULL, '2023-08-29 13:11:44', '2023-08-29 13:11:44'),
(808, 331, 'List FiberLaying', NULL, '2023-08-29 13:13:36', '2023-08-29 13:13:36'),
(809, 331, 'List FiberLaying', NULL, '2023-08-29 13:17:45', '2023-08-29 13:17:45'),
(810, 331, 'List FiberLaying', NULL, '2023-08-29 13:52:02', '2023-08-29 13:52:02'),
(811, 331, 'List FiberLaying', NULL, '2023-08-29 13:53:08', '2023-08-29 13:53:08'),
(812, 2, 'Product List', NULL, '2023-08-29 14:14:14', '2023-08-29 14:14:14'),
(813, 2, 'List FiberLaying', NULL, '2023-08-29 14:14:23', '2023-08-29 14:14:23'),
(814, 2, 'List FiberLaying', NULL, '2023-08-29 14:14:26', '2023-08-29 14:14:26'),
(815, 331, 'List FiberLaying', NULL, '2023-08-29 14:20:48', '2023-08-29 14:20:48'),
(816, 331, 'List FiberLaying', NULL, '2023-08-29 14:22:32', '2023-08-29 14:22:32'),
(817, 2, 'List FiberLaying', NULL, '2023-08-29 15:15:02', '2023-08-29 15:15:02'),
(818, 2, 'List FiberLaying', NULL, '2023-08-29 15:20:03', '2023-08-29 15:20:03'),
(819, 331, 'List FiberLaying', NULL, '2023-08-29 16:07:57', '2023-08-29 16:07:57'),
(820, 331, 'List FiberLaying', NULL, '2023-08-29 16:11:03', '2023-08-29 16:11:03'),
(821, 2, 'List FH', NULL, '2023-08-29 16:13:20', '2023-08-29 16:13:20'),
(822, 331, 'Create FiberLaying ', 'dp2 to fh1', '2023-08-29 16:14:11', '2023-08-29 16:14:11'),
(823, 331, 'List FiberLaying', NULL, '2023-08-29 16:14:11', '2023-08-29 16:14:11'),
(824, 2, 'OLT List', NULL, '2023-08-29 16:14:30', '2023-08-29 16:14:30'),
(825, 2, 'List EDFA', NULL, '2023-08-29 16:14:37', '2023-08-29 16:14:37'),
(826, 2, 'List FiberLaying', NULL, '2023-08-29 16:14:43', '2023-08-29 16:14:43'),
(827, 331, 'List FiberLaying', NULL, '2023-08-29 16:14:45', '2023-08-29 16:14:45'),
(828, 2, 'List DPD', NULL, '2023-08-29 16:14:50', '2023-08-29 16:14:50'),
(829, 2, 'List DP', NULL, '2023-08-29 16:14:55', '2023-08-29 16:14:55'),
(830, 2, 'List FH', NULL, '2023-08-29 16:15:00', '2023-08-29 16:15:00'),
(831, 331, 'List FiberLaying', NULL, '2023-08-29 16:19:45', '2023-08-29 16:19:45'),
(832, 331, 'List FiberLaying', NULL, '2023-08-29 16:20:21', '2023-08-29 16:20:21'),
(833, 331, 'List FiberLaying', NULL, '2023-08-29 16:22:53', '2023-08-29 16:22:53'),
(834, 331, 'Create FiberLaying ', 'fh2 to fh3', '2023-08-29 16:29:10', '2023-08-29 16:29:10'),
(835, 331, 'List FiberLaying', NULL, '2023-08-29 16:29:10', '2023-08-29 16:29:10'),
(836, 331, 'List FiberLaying', NULL, '2023-08-29 16:43:43', '2023-08-29 16:43:43'),
(837, 331, 'List FiberLaying', NULL, '2023-08-29 16:46:17', '2023-08-29 16:46:17'),
(838, 331, 'List FiberLaying', NULL, '2023-08-29 16:50:15', '2023-08-29 16:50:15'),
(839, 331, 'List FiberLaying', NULL, '2023-08-29 16:52:44', '2023-08-29 16:52:44'),
(840, 2, 'Fiber Laying Stock', '19', '2023-08-29 16:53:35', '2023-08-29 16:53:35'),
(841, 2, 'List of Fiber', NULL, '2023-08-29 16:54:33', '2023-08-29 16:54:33'),
(842, 2, 'List of Fiber', NULL, '2023-08-29 16:54:36', '2023-08-29 16:54:36'),
(843, 331, 'List FiberLaying', NULL, '2023-08-29 17:13:42', '2023-08-29 17:13:42'),
(844, 331, 'List FiberLaying', NULL, '2023-08-29 17:14:08', '2023-08-29 17:14:08'),
(845, 331, 'List DPD', NULL, '2023-08-29 17:16:07', '2023-08-29 17:16:07'),
(846, 331, 'List FiberLaying', NULL, '2023-08-29 17:16:13', '2023-08-29 17:16:13'),
(847, 331, 'Create FiberLaying ', 'dp2 to fh4', '2023-08-29 17:17:06', '2023-08-29 17:17:06'),
(848, 331, 'List FiberLaying', NULL, '2023-08-29 17:17:06', '2023-08-29 17:17:06'),
(849, 331, 'List FiberLaying', NULL, '2023-08-29 17:19:41', '2023-08-29 17:19:41'),
(850, 331, 'List FiberLaying', NULL, '2023-08-29 17:22:00', '2023-08-29 17:22:00'),
(851, 2, 'List FiberLaying', NULL, '2023-08-29 17:24:42', '2023-08-29 17:24:42'),
(852, 2, 'List FiberLaying', NULL, '2023-08-29 17:25:19', '2023-08-29 17:25:19'),
(853, 2, 'Product List', NULL, '2023-08-29 17:31:04', '2023-08-29 17:31:04'),
(854, 2, 'Product List', NULL, '2023-08-29 17:31:12', '2023-08-29 17:31:12'),
(855, 331, 'List FiberLaying', NULL, '2023-08-29 17:48:21', '2023-08-29 17:48:21'),
(856, 331, 'Create FiberLaying ', 'Fh 4th to Fh 5th', '2023-08-29 17:55:14', '2023-08-29 17:55:14'),
(857, 331, 'List FiberLaying', NULL, '2023-08-29 17:55:14', '2023-08-29 17:55:14'),
(858, 331, 'List FiberLaying', NULL, '2023-08-29 17:57:42', '2023-08-29 17:57:42'),
(859, 331, 'List FiberLaying', NULL, '2023-08-29 18:38:30', '2023-08-29 18:38:30'),
(860, 331, 'List FiberLaying', NULL, '2023-08-29 18:38:59', '2023-08-29 18:38:59'),
(861, 331, 'List FiberLaying', NULL, '2023-08-29 18:42:23', '2023-08-29 18:42:23'),
(862, 331, 'List FiberLaying', NULL, '2023-08-29 18:42:29', '2023-08-29 18:42:29'),
(863, 331, 'List FiberLaying', NULL, '2023-08-29 18:42:51', '2023-08-29 18:42:51'),
(864, 331, 'List FiberLaying', NULL, '2023-08-29 18:46:32', '2023-08-29 18:46:32'),
(865, 331, 'List FH', NULL, '2023-08-29 18:47:10', '2023-08-29 18:47:10'),
(866, 331, 'List FiberLaying', NULL, '2023-08-29 18:47:58', '2023-08-29 18:47:58'),
(867, 331, 'List FiberLaying', NULL, '2023-08-29 18:50:09', '2023-08-29 18:50:09'),
(868, 331, 'List FiberLaying', NULL, '2023-08-29 18:52:36', '2023-08-29 18:52:36'),
(869, 331, 'Create FiberLaying ', 'Fh 5th to  Fh 6th', '2023-08-29 18:55:15', '2023-08-29 18:55:15'),
(870, 331, 'List FiberLaying', NULL, '2023-08-29 18:55:15', '2023-08-29 18:55:15'),
(871, 331, 'List FiberLaying', NULL, '2023-08-30 09:14:02', '2023-08-30 09:14:02'),
(872, 331, 'List FiberLaying', NULL, '2023-08-30 09:14:13', '2023-08-30 09:14:13'),
(873, 331, 'List DP', NULL, '2023-08-30 10:03:19', '2023-08-30 10:03:19'),
(874, 331, 'List DP', NULL, '2023-08-30 10:05:00', '2023-08-30 10:05:00'),
(875, 331, 'List DP', NULL, '2023-08-30 10:38:19', '2023-08-30 10:38:19'),
(876, 331, 'List FiberLaying', NULL, '2023-08-30 16:30:25', '2023-08-30 16:30:25'),
(877, 331, 'Create FiberLaying ', 'Fh 1st to 2 Fh', '2023-08-30 16:35:03', '2023-08-30 16:35:03'),
(878, 331, 'List FiberLaying', NULL, '2023-08-30 16:35:03', '2023-08-30 16:35:03'),
(879, 331, 'List FH', NULL, '2023-08-30 16:35:58', '2023-08-30 16:35:58'),
(880, 331, 'List FH', NULL, '2023-08-30 16:38:05', '2023-08-30 16:38:05'),
(881, 331, 'List FH', NULL, '2023-08-30 16:40:01', '2023-08-30 16:40:01'),
(882, 331, 'List FH', NULL, '2023-08-30 16:41:56', '2023-08-30 16:41:56'),
(883, 331, 'List FH', NULL, '2023-08-30 16:44:29', '2023-08-30 16:44:29'),
(884, 331, 'List FH', NULL, '2023-08-30 16:46:38', '2023-08-30 16:46:38'),
(885, 331, 'List FH', NULL, '2023-08-30 16:48:30', '2023-08-30 16:48:30'),
(886, 331, 'List FH', NULL, '2023-08-30 16:50:54', '2023-08-30 16:50:54'),
(887, 331, 'List DP', NULL, '2023-08-30 17:56:48', '2023-08-30 17:56:48'),
(888, 331, 'List DP', NULL, '2023-08-30 18:01:25', '2023-08-30 18:01:25'),
(889, 331, 'List DP', NULL, '2023-08-30 18:43:15', '2023-08-30 18:43:15'),
(890, 331, 'List DP', NULL, '2023-08-31 10:52:40', '2023-08-31 10:52:40'),
(891, 331, 'List FiberLaying', NULL, '2023-08-31 10:55:47', '2023-08-31 10:55:47'),
(892, 331, 'List DP', NULL, '2023-08-31 10:55:50', '2023-08-31 10:55:50'),
(893, 331, 'List DP', NULL, '2023-08-31 11:13:50', '2023-08-31 11:13:50'),
(894, 331, 'List FiberLaying', NULL, '2023-08-31 11:51:35', '2023-08-31 11:51:35'),
(895, 331, 'List DP', NULL, '2023-08-31 13:44:21', '2023-08-31 13:44:21'),
(896, 331, 'List DP', NULL, '2023-08-31 13:47:13', '2023-08-31 13:47:13'),
(897, 331, 'List DPD', NULL, '2023-08-31 13:48:07', '2023-08-31 13:48:07'),
(898, 331, 'List DP', NULL, '2023-08-31 16:07:29', '2023-08-31 16:07:29'),
(899, 331, 'List DP', NULL, '2023-08-31 16:18:53', '2023-08-31 16:18:53'),
(900, 331, 'List DP', NULL, '2023-08-31 16:19:41', '2023-08-31 16:19:41'),
(901, 331, 'List DP', NULL, '2023-08-31 16:47:20', '2023-08-31 16:47:20'),
(902, 331, 'List DP', NULL, '2023-08-31 16:54:49', '2023-08-31 16:54:49'),
(903, 331, 'List DP', NULL, '2023-09-01 10:44:03', '2023-09-01 10:44:03'),
(904, 331, 'List DP', NULL, '2023-09-01 10:45:02', '2023-09-01 10:45:02'),
(905, 331, 'List DP', NULL, '2023-09-01 10:45:05', '2023-09-01 10:45:05'),
(906, 331, 'List DP', NULL, '2023-09-01 10:45:10', '2023-09-01 10:45:10'),
(907, 331, 'List FiberLaying', NULL, '2023-09-01 10:45:10', '2023-09-01 10:45:10'),
(908, 331, 'List DP', NULL, '2023-09-01 10:45:14', '2023-09-01 10:45:14'),
(909, 331, 'List DP', NULL, '2023-09-01 10:45:20', '2023-09-01 10:45:20'),
(910, 331, 'List DP', NULL, '2023-09-01 10:45:24', '2023-09-01 10:45:24'),
(911, 331, 'List DP', NULL, '2023-09-01 10:45:25', '2023-09-01 10:45:25'),
(912, 331, 'List DP', NULL, '2023-09-01 10:45:25', '2023-09-01 10:45:25'),
(913, 331, 'List DP', NULL, '2023-09-01 10:45:25', '2023-09-01 10:45:25'),
(914, 331, 'List DP', NULL, '2023-09-01 10:45:25', '2023-09-01 10:45:25'),
(915, 331, 'List DP', NULL, '2023-09-01 10:45:25', '2023-09-01 10:45:25'),
(916, 331, 'List FiberLaying', NULL, '2023-09-01 11:24:18', '2023-09-01 11:24:18'),
(917, 330, 'Fiber Laying Stock', '19', '2023-09-01 11:26:06', '2023-09-01 11:26:06'),
(918, 330, 'List of Fiber', NULL, '2023-09-01 11:26:12', '2023-09-01 11:26:12'),
(919, 330, 'List of Fiber', NULL, '2023-09-01 11:26:16', '2023-09-01 11:26:16'),
(920, 331, 'List FiberLaying', NULL, '2023-09-01 11:29:20', '2023-09-01 11:29:20'),
(921, 330, 'Product List', NULL, '2023-09-01 11:30:44', '2023-09-01 11:30:44'),
(922, 331, 'List FiberLaying', NULL, '2023-09-01 11:33:37', '2023-09-01 11:33:37'),
(923, 331, 'List FiberLaying', NULL, '2023-09-01 11:37:17', '2023-09-01 11:37:17'),
(924, 331, 'List FiberLaying', NULL, '2023-09-01 11:41:07', '2023-09-01 11:41:07'),
(925, 331, 'List FiberLaying', NULL, '2023-09-01 11:54:03', '2023-09-01 11:54:03'),
(926, 331, 'List DP', NULL, '2023-09-01 11:54:46', '2023-09-01 11:54:46'),
(927, 331, 'List DP', NULL, '2023-09-01 11:55:32', '2023-09-01 11:55:32'),
(928, 331, 'List DP', NULL, '2023-09-01 11:55:33', '2023-09-01 11:55:33'),
(929, 331, 'List FiberLaying', NULL, '2023-09-01 12:04:49', '2023-09-01 12:04:49'),
(930, 331, 'List FiberLaying', NULL, '2023-09-01 12:12:20', '2023-09-01 12:12:20'),
(931, 331, 'List FiberLaying', NULL, '2023-09-01 12:13:50', '2023-09-01 12:13:50'),
(932, 331, 'List FiberLaying', NULL, '2023-09-01 12:14:04', '2023-09-01 12:14:04'),
(933, 330, 'Stock List', NULL, '2023-09-01 12:16:09', '2023-09-01 12:16:09'),
(934, 330, 'Stock List', NULL, '2023-09-01 12:16:18', '2023-09-01 12:16:18'),
(935, 330, 'Stock List', NULL, '2023-09-01 12:16:37', '2023-09-01 12:16:37'),
(936, 2, 'Stock List', NULL, '2023-09-01 12:18:19', '2023-09-01 12:18:19'),
(937, 2, 'Stock List', NULL, '2023-09-01 12:18:21', '2023-09-01 12:18:21'),
(938, 2, 'Stock List', NULL, '2023-09-01 12:18:27', '2023-09-01 12:18:27'),
(939, 2, 'Stock List', NULL, '2023-09-01 12:18:36', '2023-09-01 12:18:36'),
(940, 2, 'Stock List', NULL, '2023-09-01 12:18:40', '2023-09-01 12:18:40'),
(941, 330, 'Product List', NULL, '2023-09-01 12:18:53', '2023-09-01 12:18:53'),
(942, 330, 'Product List', NULL, '2023-09-01 12:18:54', '2023-09-01 12:18:54'),
(943, 330, 'Stock List', NULL, '2023-09-01 12:19:36', '2023-09-01 12:19:36'),
(944, 330, 'Stock List', NULL, '2023-09-01 12:19:46', '2023-09-01 12:19:46'),
(945, 330, 'Stock List', NULL, '2023-09-01 12:20:17', '2023-09-01 12:20:17'),
(946, 331, 'List FiberLaying', NULL, '2023-09-01 12:20:18', '2023-09-01 12:20:18'),
(947, 330, 'Stock List', NULL, '2023-09-01 12:20:24', '2023-09-01 12:20:24'),
(948, 330, 'Stock List', NULL, '2023-09-01 12:21:58', '2023-09-01 12:21:58'),
(949, 330, 'Stock List', NULL, '2023-09-01 12:22:10', '2023-09-01 12:22:10'),
(950, 330, 'Stock List', NULL, '2023-09-01 12:25:02', '2023-09-01 12:25:02'),
(951, 330, 'Stock List', NULL, '2023-09-01 12:25:25', '2023-09-01 12:25:25'),
(952, 331, 'List DP', NULL, '2023-09-01 12:27:51', '2023-09-01 12:27:51'),
(953, 331, 'List DP', NULL, '2023-09-01 12:28:37', '2023-09-01 12:28:37'),
(954, 331, 'List FiberLaying', NULL, '2023-09-01 12:28:52', '2023-09-01 12:28:52'),
(955, 331, 'List FiberLaying', NULL, '2023-09-01 12:31:32', '2023-09-01 12:31:32'),
(956, 331, 'List FiberLaying', NULL, '2023-09-01 12:46:57', '2023-09-01 12:46:57'),
(957, 331, 'List FiberLaying', NULL, '2023-09-01 14:42:51', '2023-09-01 14:42:51'),
(958, 331, 'List FiberLaying', NULL, '2023-09-01 15:03:25', '2023-09-01 15:03:25'),
(959, 331, 'List FiberLaying', NULL, '2023-09-01 15:08:02', '2023-09-01 15:08:02'),
(960, 331, 'Create FiberLaying ', 'DPD1 TO DP3', '2023-09-01 15:18:59', '2023-09-01 15:18:59'),
(961, 331, 'List FiberLaying', NULL, '2023-09-01 15:19:00', '2023-09-01 15:19:00'),
(962, 331, 'List FiberLaying', NULL, '2023-09-01 15:19:20', '2023-09-01 15:19:20'),
(963, 331, 'List DP', NULL, '2023-09-01 15:21:27', '2023-09-01 15:21:27'),
(964, 331, 'List DP', NULL, '2023-09-01 15:23:16', '2023-09-01 15:23:16'),
(965, 331, 'List FiberLaying', NULL, '2023-09-01 15:23:50', '2023-09-01 15:23:50'),
(966, 331, 'List FiberLaying', NULL, '2023-09-01 15:24:36', '2023-09-01 15:24:36'),
(967, 331, 'List FiberLaying', NULL, '2023-09-01 15:25:19', '2023-09-01 15:25:19'),
(968, 331, 'List FH', NULL, '2023-09-01 15:25:42', '2023-09-01 15:25:42'),
(969, 331, 'List DPD', NULL, '2023-09-01 15:26:23', '2023-09-01 15:26:23'),
(970, 331, 'List DP', NULL, '2023-09-01 15:28:38', '2023-09-01 15:28:38'),
(971, 331, 'List FiberLaying', NULL, '2023-09-01 15:31:15', '2023-09-01 15:31:15'),
(972, 331, 'Create FiberLaying ', 'dp3 to fh4', '2023-09-01 15:59:57', '2023-09-01 15:59:57'),
(973, 331, 'List FiberLaying', NULL, '2023-09-01 15:59:58', '2023-09-01 15:59:58'),
(974, 331, 'List FiberLaying', NULL, '2023-09-01 16:02:43', '2023-09-01 16:02:43'),
(975, 331, 'Create FiberLaying ', 'dp3 to fh1', '2023-09-01 16:06:05', '2023-09-01 16:06:05'),
(976, 331, 'List FiberLaying', NULL, '2023-09-01 16:06:05', '2023-09-01 16:06:05'),
(977, 331, 'List FiberLaying', NULL, '2023-09-01 16:06:21', '2023-09-01 16:06:21'),
(978, 331, 'List FiberLaying', NULL, '2023-09-01 16:06:22', '2023-09-01 16:06:22'),
(979, 331, 'Create FiberLaying ', 'dp3 to fh5', '2023-09-01 16:12:10', '2023-09-01 16:12:10'),
(980, 331, 'List FiberLaying', NULL, '2023-09-01 16:12:11', '2023-09-01 16:12:11'),
(981, 331, 'Create FiberLaying ', 'dp3 to fh6', '2023-09-01 16:16:07', '2023-09-01 16:16:07'),
(982, 331, 'List FiberLaying', NULL, '2023-09-01 16:16:08', '2023-09-01 16:16:08'),
(983, 331, 'List FiberLaying', NULL, '2023-09-01 16:16:53', '2023-09-01 16:16:53'),
(984, 331, 'List FiberLaying', NULL, '2023-09-01 16:18:22', '2023-09-01 16:18:22'),
(985, 331, 'List FiberLaying', NULL, '2023-09-01 16:19:40', '2023-09-01 16:19:40'),
(986, 331, 'List FiberLaying', NULL, '2023-09-01 16:19:45', '2023-09-01 16:19:45'),
(987, 331, 'List FiberLaying', NULL, '2023-09-01 16:31:33', '2023-09-01 16:31:33'),
(988, 330, 'Fiber Laying Stock', '20', '2023-09-01 16:31:59', '2023-09-01 16:31:59'),
(989, 330, 'List of Fiber', NULL, '2023-09-01 16:32:06', '2023-09-01 16:32:06'),
(990, 330, 'List of Fiber', NULL, '2023-09-01 16:32:50', '2023-09-01 16:32:50'),
(991, 330, 'List of Fiber', NULL, '2023-09-01 16:33:18', '2023-09-01 16:33:18'),
(992, 331, 'List FiberLaying', NULL, '2023-09-01 16:37:09', '2023-09-01 16:37:09'),
(993, 331, 'Create FiberLaying ', 'dp3 to fh2', '2023-09-01 16:41:36', '2023-09-01 16:41:36'),
(994, 331, 'List FiberLaying', NULL, '2023-09-01 16:41:36', '2023-09-01 16:41:36'),
(995, 331, 'Create FiberLaying ', 'fh2 to fh3', '2023-09-01 16:45:52', '2023-09-01 16:45:52'),
(996, 331, 'List FiberLaying', NULL, '2023-09-01 16:45:52', '2023-09-01 16:45:52'),
(997, 331, 'List DP', NULL, '2023-09-01 17:56:22', '2023-09-01 17:56:22'),
(998, 2, 'List FiberLaying', NULL, '2023-09-01 17:56:48', '2023-09-01 17:56:48'),
(999, 2, 'List FH', NULL, '2023-09-01 17:56:52', '2023-09-01 17:56:52'),
(1000, 2, 'List FiberLaying', NULL, '2023-09-01 17:57:08', '2023-09-01 17:57:08'),
(1001, 2, 'List FiberLaying', NULL, '2023-09-01 17:57:23', '2023-09-01 17:57:23'),
(1002, 2, 'List FiberLaying', NULL, '2023-09-01 17:57:59', '2023-09-01 17:57:59'),
(1003, 331, 'List FiberLaying', NULL, '2023-09-01 18:16:57', '2023-09-01 18:16:57'),
(1004, 331, 'List FH', NULL, '2023-09-02 15:56:06', '2023-09-02 15:56:06'),
(1005, 331, 'List DP', NULL, '2023-09-02 15:57:03', '2023-09-02 15:57:03'),
(1006, 331, 'List FH', NULL, '2023-09-02 16:02:23', '2023-09-02 16:02:23'),
(1007, 331, 'List FH', NULL, '2023-09-02 16:02:26', '2023-09-02 16:02:26'),
(1008, 331, 'List DPD', NULL, '2023-09-02 16:06:09', '2023-09-02 16:06:09'),
(1009, 331, 'List DP', NULL, '2023-09-02 16:06:13', '2023-09-02 16:06:13'),
(1010, 331, 'List FH', NULL, '2023-09-02 16:06:17', '2023-09-02 16:06:17'),
(1011, 331, 'List FH', NULL, '2023-09-02 16:06:18', '2023-09-02 16:06:18'),
(1012, 331, 'List FH', NULL, '2023-09-02 16:09:35', '2023-09-02 16:09:35'),
(1013, 331, 'List FH', NULL, '2023-09-02 16:09:37', '2023-09-02 16:09:37'),
(1014, 331, 'List FH', NULL, '2023-09-02 17:45:44', '2023-09-02 17:45:44'),
(1015, 331, 'List FH', NULL, '2023-09-02 17:45:47', '2023-09-02 17:45:47'),
(1016, 331, 'List FH', NULL, '2023-09-02 17:45:54', '2023-09-02 17:45:54'),
(1017, 331, 'List FH', NULL, '2023-09-02 17:45:56', '2023-09-02 17:45:56'),
(1018, 331, 'List FH', NULL, '2023-09-02 17:45:59', '2023-09-02 17:45:59'),
(1019, 331, 'List FH', NULL, '2023-09-02 17:46:02', '2023-09-02 17:46:02'),
(1020, 331, 'List FH', NULL, '2023-09-02 17:46:03', '2023-09-02 17:46:03'),
(1021, 331, 'List FH', NULL, '2023-09-02 17:57:22', '2023-09-02 17:57:22'),
(1022, 331, 'List FiberLaying', NULL, '2023-09-02 17:57:41', '2023-09-02 17:57:41'),
(1023, 331, 'List FiberLaying', NULL, '2023-09-02 17:59:45', '2023-09-02 17:59:45'),
(1024, 331, 'List FiberLaying', NULL, '2023-09-02 17:59:50', '2023-09-02 17:59:50'),
(1025, 331, 'List FiberLaying', NULL, '2023-09-02 17:59:51', '2023-09-02 17:59:51'),
(1026, 2, 'List FiberLaying', NULL, '2023-09-02 18:02:01', '2023-09-02 18:02:01'),
(1027, 2, 'List FiberLaying', NULL, '2023-09-02 18:02:06', '2023-09-02 18:02:06'),
(1028, 2, 'List FiberLaying', NULL, '2023-09-02 18:02:09', '2023-09-02 18:02:09'),
(1029, 2, 'List FiberLaying', NULL, '2023-09-02 18:02:33', '2023-09-02 18:02:33'),
(1030, 331, 'List FH', NULL, '2023-09-02 18:02:55', '2023-09-02 18:02:55'),
(1031, 331, 'List FiberLaying', NULL, '2023-09-02 18:03:15', '2023-09-02 18:03:15'),
(1032, 2, 'List FiberLaying', NULL, '2023-09-02 18:03:20', '2023-09-02 18:03:20'),
(1033, 2, 'List FiberLaying', NULL, '2023-09-02 18:03:27', '2023-09-02 18:03:27'),
(1034, 2, 'List FiberLaying', NULL, '2023-09-02 18:03:41', '2023-09-02 18:03:41'),
(1035, 331, 'List FiberLaying', NULL, '2023-09-02 18:03:42', '2023-09-02 18:03:42'),
(1036, 331, 'List FH', NULL, '2023-09-02 18:03:48', '2023-09-02 18:03:48'),
(1037, 2, 'List FiberLaying', NULL, '2023-09-02 18:04:23', '2023-09-02 18:04:23'),
(1038, 2, 'List FiberLaying', NULL, '2023-09-02 18:04:42', '2023-09-02 18:04:42'),
(1039, 2, 'List FiberLaying', NULL, '2023-09-02 18:04:47', '2023-09-02 18:04:47'),
(1040, 331, 'List FH', NULL, '2023-09-02 18:04:50', '2023-09-02 18:04:50'),
(1041, 331, 'List FH', NULL, '2023-09-02 18:04:58', '2023-09-02 18:04:58'),
(1042, 331, 'List FH', NULL, '2023-09-02 18:05:12', '2023-09-02 18:05:12'),
(1043, 2, 'List FiberLaying', NULL, '2023-09-02 18:05:13', '2023-09-02 18:05:13'),
(1044, 331, 'List FiberLaying', NULL, '2023-09-02 18:05:15', '2023-09-02 18:05:15'),
(1045, 2, 'List FiberLaying', NULL, '2023-09-02 18:05:17', '2023-09-02 18:05:17'),
(1046, 331, 'List FiberLaying', NULL, '2023-09-02 18:08:08', '2023-09-02 18:08:08'),
(1047, 2, 'List FiberLaying', NULL, '2023-09-02 18:08:58', '2023-09-02 18:08:58'),
(1048, 2, 'List FiberLaying', NULL, '2023-09-02 18:09:35', '2023-09-02 18:09:35'),
(1049, 331, 'List FiberLaying', NULL, '2023-09-02 18:09:46', '2023-09-02 18:09:46'),
(1050, 331, 'List FiberLaying', NULL, '2023-09-02 18:10:22', '2023-09-02 18:10:22'),
(1051, 2, 'List FiberLaying', NULL, '2023-09-02 18:10:49', '2023-09-02 18:10:49'),
(1052, 331, 'List FiberLaying', NULL, '2023-09-02 18:10:58', '2023-09-02 18:10:58'),
(1053, 2, 'List FiberLaying', NULL, '2023-09-02 18:11:07', '2023-09-02 18:11:07'),
(1054, 331, 'List FiberLaying', NULL, '2023-09-02 18:12:11', '2023-09-02 18:12:11'),
(1055, 331, 'List FiberLaying', NULL, '2023-09-02 18:12:12', '2023-09-02 18:12:12'),
(1056, 331, 'List FiberLaying', NULL, '2023-09-02 18:12:13', '2023-09-02 18:12:13'),
(1057, 2, 'List FiberLaying', NULL, '2023-09-02 18:12:34', '2023-09-02 18:12:34'),
(1058, 2, 'List FiberLaying', NULL, '2023-09-02 18:12:39', '2023-09-02 18:12:39'),
(1059, 331, 'List FH', NULL, '2023-09-02 18:12:41', '2023-09-02 18:12:41'),
(1060, 2, 'List FiberLaying', NULL, '2023-09-02 18:12:56', '2023-09-02 18:12:56'),
(1061, 331, 'List FH', NULL, '2023-09-02 18:14:57', '2023-09-02 18:14:57'),
(1062, 331, 'List FH', NULL, '2023-09-02 18:15:01', '2023-09-02 18:15:01'),
(1063, 331, 'List FH', NULL, '2023-09-02 18:15:10', '2023-09-02 18:15:10'),
(1064, 2, 'List FH', NULL, '2023-09-02 18:15:14', '2023-09-02 18:15:14'),
(1065, 331, 'List FiberLaying', NULL, '2023-09-02 18:19:34', '2023-09-02 18:19:34'),
(1066, 331, 'List FH', NULL, '2023-09-02 18:19:38', '2023-09-02 18:19:38'),
(1067, 331, 'List FH', NULL, '2023-09-02 18:21:08', '2023-09-02 18:21:08'),
(1068, 331, 'List FH', NULL, '2023-09-02 18:24:23', '2023-09-02 18:24:23'),
(1069, 331, 'List FH', NULL, '2023-09-02 18:24:47', '2023-09-02 18:24:47'),
(1070, 331, 'List FH', NULL, '2023-09-02 18:28:03', '2023-09-02 18:28:03'),
(1071, 331, 'List FH', NULL, '2023-09-02 18:30:04', '2023-09-02 18:30:04'),
(1072, 331, 'List FH', NULL, '2023-09-02 18:30:06', '2023-09-02 18:30:06'),
(1073, 331, 'List FH', NULL, '2023-09-02 18:30:16', '2023-09-02 18:30:16'),
(1074, 331, 'List FH', NULL, '2023-09-02 18:31:12', '2023-09-02 18:31:12'),
(1075, 331, 'List FH', NULL, '2023-09-02 18:31:14', '2023-09-02 18:31:14'),
(1076, 331, 'List FH', NULL, '2023-09-02 18:33:43', '2023-09-02 18:33:43'),
(1077, 331, 'List FH', NULL, '2023-09-02 18:33:47', '2023-09-02 18:33:47'),
(1078, 331, 'List FH', NULL, '2023-09-02 18:35:02', '2023-09-02 18:35:02'),
(1079, 331, 'List FH', NULL, '2023-09-02 18:35:14', '2023-09-02 18:35:14'),
(1080, 331, 'List FiberLaying', NULL, '2023-09-03 11:16:31', '2023-09-03 11:16:31'),
(1081, 330, 'Fiber Laying Stock', '20', '2023-09-03 13:03:25', '2023-09-03 13:03:25'),
(1082, 330, 'List of Fiber', NULL, '2023-09-03 13:03:31', '2023-09-03 13:03:31'),
(1083, 330, 'List of Fiber', NULL, '2023-09-03 13:03:36', '2023-09-03 13:03:36'),
(1084, 330, 'List of Fiber', NULL, '2023-09-03 13:03:48', '2023-09-03 13:03:48'),
(1085, 330, 'Fiber Laying Stock', '20', '2023-09-03 13:07:51', '2023-09-03 13:07:51'),
(1086, 330, 'List of Fiber', NULL, '2023-09-03 13:08:04', '2023-09-03 13:08:04'),
(1087, 330, 'List of Fiber', NULL, '2023-09-03 13:08:09', '2023-09-03 13:08:09'),
(1088, 330, 'Fiber Laying Stock', '19', '2023-09-03 13:11:29', '2023-09-03 13:11:29'),
(1089, 330, 'List of Fiber', NULL, '2023-09-03 13:13:20', '2023-09-03 13:13:20'),
(1090, 330, 'List of Fiber', NULL, '2023-09-03 13:13:27', '2023-09-03 13:13:27'),
(1091, 330, 'Fiber Laying Stock', '20', '2023-09-03 13:16:42', '2023-09-03 13:16:42'),
(1092, 330, 'List of Fiber', NULL, '2023-09-03 13:16:46', '2023-09-03 13:16:46'),
(1093, 330, 'List of Fiber', NULL, '2023-09-03 13:16:51', '2023-09-03 13:16:51'),
(1094, 331, 'List FiberLaying', NULL, '2023-09-05 11:39:27', '2023-09-05 11:39:27'),
(1095, 331, 'List FiberLaying', NULL, '2023-09-05 11:39:57', '2023-09-05 11:39:57'),
(1096, 330, 'Fiber Laying Stock', '19', '2023-09-05 11:54:23', '2023-09-05 11:54:23'),
(1097, 330, 'List of Fiber', NULL, '2023-09-05 11:54:41', '2023-09-05 11:54:41'),
(1098, 330, 'List of Fiber', NULL, '2023-09-05 11:54:48', '2023-09-05 11:54:48'),
(1099, 330, 'Fiber Laying Stock', '20', '2023-09-05 11:59:50', '2023-09-05 11:59:50'),
(1100, 330, 'List of Fiber', NULL, '2023-09-05 11:59:59', '2023-09-05 11:59:59'),
(1101, 330, 'List of Fiber', NULL, '2023-09-05 12:00:07', '2023-09-05 12:00:07'),
(1102, 330, 'Fiber Laying Stock', '19', '2023-09-05 12:08:39', '2023-09-05 12:08:39'),
(1103, 330, 'List of Fiber', NULL, '2023-09-05 12:08:59', '2023-09-05 12:08:59'),
(1104, 330, 'List of Fiber', NULL, '2023-09-05 12:09:35', '2023-09-05 12:09:35'),
(1105, 330, 'Fiber Laying Stock', '20', '2023-09-05 12:13:59', '2023-09-05 12:13:59'),
(1106, 330, 'List of Fiber', NULL, '2023-09-05 12:14:05', '2023-09-05 12:14:05'),
(1107, 330, 'List of Fiber', NULL, '2023-09-05 12:14:11', '2023-09-05 12:14:11'),
(1108, 331, 'Create FiberLaying ', 'DPD 1 TO DP 4', '2023-09-05 12:45:55', '2023-09-05 12:45:55'),
(1109, 331, 'List FiberLaying', NULL, '2023-09-05 12:45:55', '2023-09-05 12:45:55'),
(1110, 331, 'List DPD', NULL, '2023-09-05 12:46:01', '2023-09-05 12:46:01'),
(1111, 331, 'List DP', NULL, '2023-09-05 12:46:08', '2023-09-05 12:46:08'),
(1112, 331, 'List DP', NULL, '2023-09-05 12:46:23', '2023-09-05 12:46:23'),
(1113, 331, 'List DP', NULL, '2023-09-05 12:47:17', '2023-09-05 12:47:17'),
(1114, 2, 'OLT List', NULL, '2023-09-05 12:51:10', '2023-09-05 12:51:10'),
(1115, 331, 'List FiberLaying', NULL, '2023-09-05 14:37:00', '2023-09-05 14:37:00'),
(1116, 331, 'List DP', NULL, '2023-09-05 14:37:14', '2023-09-05 14:37:14'),
(1117, 331, 'List DP', NULL, '2023-09-05 14:38:21', '2023-09-05 14:38:21'),
(1118, 331, 'List DPD', NULL, '2023-09-05 14:39:31', '2023-09-05 14:39:31'),
(1119, 331, 'List FiberLaying', NULL, '2023-09-05 14:39:43', '2023-09-05 14:39:43'),
(1120, 331, 'List DP', NULL, '2023-09-05 14:39:46', '2023-09-05 14:39:46'),
(1121, 2, 'OLT List', NULL, '2023-09-05 14:40:31', '2023-09-05 14:40:31'),
(1122, 2, 'List FH', NULL, '2023-09-05 14:40:51', '2023-09-05 14:40:51'),
(1123, 2, 'List DP', NULL, '2023-09-05 14:41:09', '2023-09-05 14:41:09'),
(1124, 2, 'List FiberLaying', NULL, '2023-09-05 14:41:32', '2023-09-05 14:41:32'),
(1125, 2, 'Stock List', NULL, '2023-09-05 14:42:05', '2023-09-05 14:42:05'),
(1126, 2, 'List DP', NULL, '2023-09-05 14:42:54', '2023-09-05 14:42:54'),
(1127, 2, 'List FH', NULL, '2023-09-05 14:59:28', '2023-09-05 14:59:28'),
(1128, 2, 'List DP', NULL, '2023-09-05 15:01:53', '2023-09-05 15:01:53'),
(1129, 331, 'List DP', NULL, '2023-09-05 15:02:57', '2023-09-05 15:02:57'),
(1130, 331, 'List FH', NULL, '2023-09-05 15:04:21', '2023-09-05 15:04:21'),
(1131, 2, 'List DP', NULL, '2023-09-07 09:49:58', '2023-09-07 09:49:58'),
(1132, 2, 'List DP', NULL, '2023-09-07 09:50:11', '2023-09-07 09:50:11'),
(1133, 330, 'Stock List', NULL, '2023-09-07 09:52:14', '2023-09-07 09:52:14'),
(1134, 330, 'Product List', NULL, '2023-09-07 09:52:20', '2023-09-07 09:52:20'),
(1135, 2, 'Stock List', NULL, '2023-09-07 09:55:43', '2023-09-07 09:55:43'),
(1136, 2, 'Stock List', NULL, '2023-09-07 09:55:58', '2023-09-07 09:55:58'),
(1137, 2, 'Stock List', NULL, '2023-09-07 09:55:59', '2023-09-07 09:55:59'),
(1138, 2, 'Stock List', NULL, '2023-09-07 09:56:12', '2023-09-07 09:56:12'),
(1139, 2, 'Stock List', NULL, '2023-09-07 09:56:15', '2023-09-07 09:56:15'),
(1140, 2, 'Stock List', NULL, '2023-09-07 09:56:19', '2023-09-07 09:56:19'),
(1141, 2, 'Product List', NULL, '2023-09-07 09:57:25', '2023-09-07 09:57:25'),
(1142, 2, 'Product List', NULL, '2023-09-07 09:57:34', '2023-09-07 09:57:34'),
(1143, 2, 'Product List', NULL, '2023-09-07 09:57:54', '2023-09-07 09:57:54'),
(1144, 2, 'Product List', NULL, '2023-09-07 09:58:16', '2023-09-07 09:58:16'),
(1145, 2, 'Product List', NULL, '2023-09-07 09:58:24', '2023-09-07 09:58:24'),
(1146, 2, 'Product List', NULL, '2023-09-07 09:58:34', '2023-09-07 09:58:34'),
(1147, 2, 'Product List', NULL, '2023-09-07 09:59:21', '2023-09-07 09:59:21'),
(1148, 2, 'Product List', NULL, '2023-09-07 09:59:41', '2023-09-07 09:59:41'),
(1149, 2, 'List DP', NULL, '2023-09-07 10:00:25', '2023-09-07 10:00:25'),
(1150, 330, 'Stock List', NULL, '2023-09-07 10:07:05', '2023-09-07 10:07:05'),
(1151, 330, 'Product List', NULL, '2023-09-07 10:07:13', '2023-09-07 10:07:13'),
(1152, 330, 'Stock List', NULL, '2023-09-07 10:07:32', '2023-09-07 10:07:32'),
(1153, 2, 'Stock List', NULL, '2023-09-07 10:07:48', '2023-09-07 10:07:48'),
(1154, 330, 'Stock List', NULL, '2023-09-07 10:07:49', '2023-09-07 10:07:49'),
(1155, 2, 'Stock List', NULL, '2023-09-07 10:07:52', '2023-09-07 10:07:52'),
(1156, 331, 'List DP', NULL, '2023-09-07 10:13:24', '2023-09-07 10:13:24'),
(1157, 331, 'List DP', NULL, '2023-09-07 10:21:51', '2023-09-07 10:21:51'),
(1158, 331, 'List DP', NULL, '2023-09-07 12:13:32', '2023-09-07 12:13:32'),
(1159, 331, 'List FiberLaying', NULL, '2023-09-07 12:14:26', '2023-09-07 12:14:26'),
(1160, 331, 'List FiberLaying', NULL, '2023-09-07 12:16:32', '2023-09-07 12:16:32'),
(1161, 331, 'List FiberLaying', NULL, '2023-09-07 12:17:05', '2023-09-07 12:17:05'),
(1162, 331, 'List FiberLaying', NULL, '2023-09-07 12:17:09', '2023-09-07 12:17:09'),
(1163, 331, 'List FiberLaying', NULL, '2023-09-07 12:17:42', '2023-09-07 12:17:42'),
(1164, 335, 'Create CustomerApplication ', '1', '2023-09-09 14:25:03', '2023-09-09 14:25:03'),
(1165, 335, 'Create Process Payment ', '1', '2023-09-09 14:41:03', '2023-09-09 14:41:03'),
(1166, 335, 'Create Process Payment ', '1', '2023-09-09 14:41:26', '2023-09-09 14:41:26'),
(1167, 335, 'Create Process Payment ', '1', '2023-09-09 14:41:27', '2023-09-09 14:41:27'),
(1168, 335, 'Create Process Payment ', '1', '2023-09-09 14:41:28', '2023-09-09 14:41:28'),
(1169, 335, 'Create Process Payment ', '1', '2023-09-09 14:41:28', '2023-09-09 14:41:28'),
(1170, 335, 'Create Process Payment ', '1', '2023-09-09 14:41:28', '2023-09-09 14:41:28'),
(1171, 335, 'Create Process Payment ', '1', '2023-09-09 14:43:17', '2023-09-09 14:43:17'),
(1172, 335, 'Create Process Payment ', '1', '2023-09-09 14:45:07', '2023-09-09 14:45:07'),
(1173, 335, 'Create Process Payment ', '1', '2023-09-09 14:45:08', '2023-09-09 14:45:08'),
(1174, 335, 'Create Process Payment ', '1', '2023-09-09 14:45:08', '2023-09-09 14:45:08'),
(1175, 335, 'Create Process Payment ', '1', '2023-09-09 14:45:09', '2023-09-09 14:45:09'),
(1176, 335, 'Create Process Payment ', '1', '2023-09-09 14:45:09', '2023-09-09 14:45:09'),
(1177, 335, 'Create Process Payment ', '1', '2023-09-09 14:45:09', '2023-09-09 14:45:09'),
(1178, 335, 'Create Process Payment ', '1', '2023-09-09 14:45:09', '2023-09-09 14:45:09'),
(1179, 335, 'Create Process Payment ', '1', '2023-09-09 14:47:16', '2023-09-09 14:47:16'),
(1180, 335, 'Create Process Payment ', '1', '2023-09-09 14:47:17', '2023-09-09 14:47:17'),
(1181, 335, 'Create Process Payment ', '1', '2023-09-09 14:47:17', '2023-09-09 14:47:17'),
(1182, 335, 'Create Process Payment ', '1', '2023-09-09 14:47:23', '2023-09-09 14:47:23'),
(1183, 335, 'Create Process Payment ', '1', '2023-09-09 14:47:40', '2023-09-09 14:47:40'),
(1184, 335, 'Create Process Payment ', '1', '2023-09-09 14:47:41', '2023-09-09 14:47:41'),
(1185, 335, 'Create Process Payment ', '1', '2023-09-09 14:47:41', '2023-09-09 14:47:41'),
(1186, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:28', '2023-09-09 14:55:28'),
(1187, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:29', '2023-09-09 14:55:29'),
(1188, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:30', '2023-09-09 14:55:30'),
(1189, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:30', '2023-09-09 14:55:30'),
(1190, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:30', '2023-09-09 14:55:30'),
(1191, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:30', '2023-09-09 14:55:30'),
(1192, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:30', '2023-09-09 14:55:30'),
(1193, 335, 'Create Process Payment ', '1', '2023-09-09 14:55:30', '2023-09-09 14:55:30'),
(1194, 335, 'Create Process Payment ', '1', '2023-09-09 14:56:47', '2023-09-09 14:56:47'),
(1195, 335, 'Create CustomerApplication ', '2', '2023-09-09 15:03:57', '2023-09-09 15:03:57'),
(1196, 335, 'Create Process Payment ', '2', '2023-09-09 15:03:57', '2023-09-09 15:03:57'),
(1197, 2, 'Customer Information', NULL, '2023-09-09 15:06:54', '2023-09-09 15:06:54'),
(1198, 2, 'Create Process Payment ', '2', '2023-09-09 16:28:43', '2023-09-09 16:28:43'),
(1199, 2, 'Create Process Payment ', '2', '2023-09-09 16:28:50', '2023-09-09 16:28:50'),
(1200, 2, 'Create Process Payment ', '2', '2023-09-09 16:28:54', '2023-09-09 16:28:54'),
(1201, 2, 'Create Process Payment ', '2', '2023-09-09 17:01:02', '2023-09-09 17:01:02'),
(1202, 335, 'Create Prospect', 'Chandu', '2023-09-09 18:08:07', '2023-09-09 18:08:07'),
(1203, 2, 'Distributor List', NULL, '2023-10-15 18:02:22', '2023-10-15 18:02:22'),
(1204, 2, 'Ramana PrasadDistributor Was Created', NULL, '2023-10-15 18:08:07', '2023-10-15 18:08:07'),
(1205, 2, 'Distributor List', NULL, '2023-10-15 18:08:07', '2023-10-15 18:08:07'),
(1206, 2, 'Ramana PrasadDistributor Was Created', NULL, '2023-10-15 18:11:15', '2023-10-15 18:11:15'),
(1207, 2, 'Distributor List', NULL, '2023-10-15 18:11:15', '2023-10-15 18:11:15'),
(1208, 2, 'Distributor List', NULL, '2023-10-15 18:11:43', '2023-10-15 18:11:43'),
(1209, 2, 'Created Franchise ', 'RAMANA', '2023-10-15 18:19:09', '2023-10-15 18:19:09'),
(1210, 331, 'List FiberLaying', NULL, '2023-11-02 10:53:05', '2023-11-02 10:53:05'),
(1211, 331, 'List DPD', NULL, '2023-11-02 11:06:36', '2023-11-02 11:06:36'),
(1212, 331, 'List FiberLaying', NULL, '2023-11-02 11:06:50', '2023-11-02 11:06:50'),
(1213, 331, 'List DPD', NULL, '2023-11-02 11:06:54', '2023-11-02 11:06:54'),
(1214, 331, 'List DPD', NULL, '2023-11-02 11:07:11', '2023-11-02 11:07:11'),
(1215, 331, 'List DP', NULL, '2023-11-02 11:07:18', '2023-11-02 11:07:18'),
(1216, 331, 'List FH', NULL, '2023-11-02 11:07:25', '2023-11-02 11:07:25'),
(1217, 331, 'List DPD', NULL, '2023-11-02 11:07:34', '2023-11-02 11:07:34'),
(1218, 2, 'Created Franchise ', 'Ramana', '2023-11-04 21:44:38', '2023-11-04 21:44:38'),
(1219, 331, 'List DPD', NULL, '2023-11-05 19:26:19', '2023-11-05 19:26:19'),
(1220, 348, 'List DPD', NULL, '2023-11-05 19:44:27', '2023-11-05 19:44:27'),
(1221, 348, 'List DPD', NULL, '2023-11-06 08:10:33', '2023-11-06 08:10:33'),
(1222, 348, 'List DPD', NULL, '2023-11-06 08:10:45', '2023-11-06 08:10:45'),
(1223, 2, 'Created Franchise ', 'Ramana', '2023-11-10 17:42:32', '2023-11-10 17:42:32'),
(1224, 350, 'Product List', NULL, '2023-11-10 17:42:55', '2023-11-10 17:42:55'),
(1225, 350, 'Product List', NULL, '2023-11-10 17:43:04', '2023-11-10 17:43:04'),
(1226, 350, 'Product List', NULL, '2023-11-10 17:43:09', '2023-11-10 17:43:09'),
(1227, 350, 'List FiberLaying', NULL, '2023-11-10 17:45:42', '2023-11-10 17:45:42'),
(1228, 350, 'List FH', NULL, '2023-11-10 17:46:06', '2023-11-10 17:46:06'),
(1229, 2, 'Update Franchises', 'Annapurna Nagar East', '2023-11-10 17:46:18', '2023-11-10 17:46:18'),
(1230, 350, 'List FiberLaying', NULL, '2023-11-10 17:46:19', '2023-11-10 17:46:19'),
(1231, 350, 'List FiberLaying', NULL, '2023-11-10 17:46:39', '2023-11-10 17:46:39'),
(1232, 350, 'List FiberLaying', NULL, '2023-11-10 17:46:48', '2023-11-10 17:46:48'),
(1233, 350, 'List FiberLaying', NULL, '2023-11-10 17:46:52', '2023-11-10 17:46:52'),
(1234, 350, 'List FiberLaying', NULL, '2023-11-10 17:50:40', '2023-11-10 17:50:40'),
(1235, 2, 'Update Franchises', 'LAKSHMI NAGAR', '2023-11-10 17:50:46', '2023-11-10 17:50:46'),
(1236, 350, 'List FiberLaying', NULL, '2023-11-10 17:50:48', '2023-11-10 17:50:48'),
(1237, 350, 'List FiberLaying', NULL, '2023-11-10 17:50:54', '2023-11-10 17:50:54'),
(1238, 350, 'List FiberLaying', NULL, '2023-11-10 17:50:59', '2023-11-10 17:50:59'),
(1239, 350, 'Product List', NULL, '2023-11-10 17:51:14', '2023-11-10 17:51:14'),
(1240, 350, 'List FH', NULL, '2023-11-10 17:51:21', '2023-11-10 17:51:21'),
(1241, 350, 'List FH', NULL, '2023-11-10 17:51:30', '2023-11-10 17:51:30'),
(1242, 350, 'List DPD', NULL, '2023-11-10 17:53:15', '2023-11-10 17:53:15'),
(1243, 350, 'List FiberLaying', NULL, '2023-11-10 18:29:10', '2023-11-10 18:29:10'),
(1244, 350, 'List FiberLaying', NULL, '2023-11-10 18:33:49', '2023-11-10 18:33:49'),
(1245, 353, 'Create Prospect', 'Pradeep', '2023-11-10 19:23:52', '2023-11-10 19:23:52'),
(1246, 353, 'Create Prospect', 'Manoj', '2023-11-10 19:24:49', '2023-11-10 19:24:49'),
(1247, 353, 'Create Prospect', 'Koteswara Rao', '2023-11-10 19:28:43', '2023-11-10 19:28:43'),
(1248, 353, 'Create Prospect', 'N.Ranjith Kumar', '2023-11-10 19:30:13', '2023-11-10 19:30:13'),
(1249, 2, 'Created Franchise ', 'Ramana', '2023-11-10 23:00:11', '2023-11-10 23:00:11'),
(1250, 353, 'Create Prospect', 'Prakash', '2023-11-12 10:51:07', '2023-11-12 10:51:07'),
(1251, 353, 'Create Prospect', 'Nagul meera', '2023-11-12 18:40:06', '2023-11-12 18:40:06'),
(1252, 353, 'Create Prospect', 'Ramu', '2023-11-12 18:40:43', '2023-11-12 18:40:43'),
(1253, 353, 'Create Prospect', 'Naveen', '2023-11-12 18:41:59', '2023-11-12 18:41:59'),
(1254, 353, 'Create Prospect', 'Praneeth', '2023-11-12 18:42:53', '2023-11-12 18:42:53'),
(1255, 353, 'Create Prospect', 'Anil', '2023-11-12 18:43:29', '2023-11-12 18:43:29'),
(1256, 353, 'Create CustomerApplication ', '3', '2023-11-12 18:59:04', '2023-11-12 18:59:04'),
(1257, 353, 'Create Process Payment ', '3', '2023-11-12 18:59:04', '2023-11-12 18:59:04'),
(1258, 353, 'Create Prospect', 'Rajesh', '2023-11-14 17:01:59', '2023-11-14 17:01:59'),
(1259, 353, 'Create Prospect', 'L.Rajashekhar', '2023-11-14 17:03:14', '2023-11-14 17:03:14'),
(1260, 353, 'Create Prospect', 'Sk.ibrahim', '2023-11-14 17:04:01', '2023-11-14 17:04:01'),
(1261, 353, 'Create Prospect', 'Viswanadh', '2023-11-16 18:03:07', '2023-11-16 18:03:07'),
(1262, 353, 'Create Prospect', 'Ch.Ranga', '2023-11-16 18:04:01', '2023-11-16 18:04:01'),
(1263, 353, 'Create Prospect', 'Anil', '2023-11-16 18:04:40', '2023-11-16 18:04:40'),
(1264, 353, 'Create Prospect', 'Rafi', '2023-11-16 18:05:22', '2023-11-16 18:05:22'),
(1265, 353, 'Create Prospect', 'Murthy', '2023-11-16 18:06:08', '2023-11-16 18:06:08'),
(1266, 353, 'Create Prospect', 'SK. Jaleel', '2023-11-16 18:06:45', '2023-11-16 18:06:45'),
(1267, 353, 'Create Prospect', 'S.Raju', '2023-11-17 19:45:59', '2023-11-17 19:45:59'),
(1268, 353, 'Create Prospect', 'Israel', '2023-11-17 19:46:55', '2023-11-17 19:46:55'),
(1269, 353, 'Create Prospect', 'M. Chandra shekhar', '2023-11-19 11:24:23', '2023-11-19 11:24:23'),
(1270, 353, 'Create Prospect', 'Balaraju', '2023-11-20 18:06:29', '2023-11-20 18:06:29'),
(1271, 353, 'Create Prospect', 'Narasimharao', '2023-11-20 18:07:33', '2023-11-20 18:07:33'),
(1272, 353, 'Create Prospect', 'Fayaz', '2023-11-20 18:08:21', '2023-11-20 18:08:21'),
(1273, 353, 'Create Prospect', 'Gopi', '2023-11-20 18:09:29', '2023-11-20 18:09:29'),
(1274, 353, 'Create Prospect', 'Mastan', '2023-11-20 18:10:15', '2023-11-20 18:10:15'),
(1275, 353, 'Create Prospect', 'V.S.Kumar', '2023-11-24 14:55:47', '2023-11-24 14:55:47');
INSERT INTO `slj_logs` (`id`, `employee_id`, `action_name`, `value_of_action`, `created_at`, `updated_at`) VALUES
(1276, 353, 'Create Prospect', 'V.S.kumar', '2023-11-27 16:15:07', '2023-11-27 16:15:07'),
(1277, 353, 'Create Prospect', 'Pramodh', '2023-11-27 16:16:27', '2023-11-27 16:16:27'),
(1278, 353, 'Create Prospect', 'Rakesh', '2023-11-27 16:17:17', '2023-11-27 16:17:17'),
(1279, 353, 'Create Prospect', 'Tej', '2023-11-27 16:17:58', '2023-11-27 16:17:58'),
(1280, 353, 'Create Prospect', 'K. Prasad', '2023-12-03 18:09:57', '2023-12-03 18:09:57'),
(1281, 353, 'Create Prospect', 'Hanumanth Rao', '2023-12-03 18:11:10', '2023-12-03 18:11:10'),
(1282, 353, 'Create Prospect', 'Koteswara Rao', '2023-12-03 18:12:19', '2023-12-03 18:12:19'),
(1283, 353, 'Create Prospect', 'Naresh', '2023-12-03 18:13:19', '2023-12-03 18:13:19'),
(1284, 353, 'Create Prospect', 'M. Subbarao', '2023-12-03 18:14:13', '2023-12-03 18:14:13'),
(1285, 353, 'Create Prospect', 'A.Srinivasarao', '2023-12-03 18:15:55', '2023-12-03 18:15:55'),
(1286, 353, 'Create Prospect', 'Nagaraju', '2023-12-03 18:16:45', '2023-12-03 18:16:45'),
(1287, 353, 'Create Prospect', 'Siroz', '2023-12-03 18:17:38', '2023-12-03 18:17:38'),
(1288, 353, 'Create Prospect', 'A. Pawan', '2023-12-03 18:18:52', '2023-12-03 18:18:52'),
(1289, 2, 'Create Prospect', 'Swapna', '2023-12-17 16:11:46', '2023-12-17 16:11:46'),
(1290, 2, 'Create Prospect', 'mehabbi', '2023-12-17 16:23:56', '2023-12-17 16:23:56'),
(1291, 2, 'List FiberLaying', NULL, '2023-12-17 16:44:23', '2023-12-17 16:44:23'),
(1292, 353, 'Create Prospect', 'Prasanth', '2023-12-17 17:04:35', '2023-12-17 17:04:35'),
(1293, 353, 'Create Prospect', 'J. Rambabu', '2023-12-17 17:05:37', '2023-12-17 17:05:37'),
(1294, 353, 'Create Prospect', 'Vemula venkateswarao', '2023-12-17 17:06:22', '2023-12-17 17:06:22'),
(1295, 2, 'Create Prospect', 'Nagamani', '2023-12-19 12:11:22', '2023-12-19 12:11:22'),
(1296, 2, 'Create Prospect', 'prasad', '2023-12-19 12:12:22', '2023-12-19 12:12:22'),
(1297, 353, 'Create Prospect', 'Manideep', '2023-12-27 18:18:53', '2023-12-27 18:18:53'),
(1298, 353, 'Create Prospect', 'Balaram', '2023-12-27 18:21:34', '2023-12-27 18:21:34'),
(1299, 353, 'Create Prospect', 'M.Vaasu', '2023-12-27 18:22:07', '2023-12-27 18:22:07'),
(1300, 353, 'Create Prospect', 'Anil', '2023-12-27 18:22:54', '2023-12-27 18:22:54'),
(1301, 353, 'Create Prospect', 'Dayakar', '2023-12-27 18:23:55', '2023-12-27 18:23:55'),
(1302, 353, 'Create Prospect', 'Hari Babu', '2023-12-27 18:24:36', '2023-12-27 18:24:36'),
(1303, 353, 'Create Prospect', 'Vamsi', '2023-12-27 18:25:06', '2023-12-27 18:25:06'),
(1304, 2, 'Distributor List', NULL, '2024-02-11 11:05:39', '2024-02-11 11:05:39'),
(1305, 2, 'OLT List', NULL, '2024-02-11 11:10:28', '2024-02-11 11:10:28'),
(1306, 2, 'List EDFA', NULL, '2024-02-11 11:10:35', '2024-02-11 11:10:35'),
(1307, 2, 'List FiberLaying', NULL, '2024-02-11 11:10:39', '2024-02-11 11:10:39'),
(1308, 2, 'List DPD', NULL, '2024-02-11 11:11:08', '2024-02-11 11:11:08'),
(1309, 2, 'List DP', NULL, '2024-02-11 11:11:21', '2024-02-11 11:11:21'),
(1310, 2, 'List FH', NULL, '2024-02-11 11:11:30', '2024-02-11 11:11:30'),
(1311, 2, 'List FiberLaying', NULL, '2024-02-11 11:15:20', '2024-02-11 11:15:20'),
(1312, 2, 'Created Franchise ', 'Sammeta Venkata Ramana Prasad', '2024-02-17 11:59:09', '2024-02-17 11:59:09'),
(1313, 2, 'OLT List', NULL, '2024-02-22 09:32:59', '2024-02-22 09:32:59'),
(1314, 2, 'List EDFA', NULL, '2024-02-22 09:34:48', '2024-02-22 09:34:48'),
(1315, 2, 'OLT List', NULL, '2024-02-26 09:37:16', '2024-02-26 09:37:16'),
(1316, 2, 'List DP', NULL, '2024-02-26 09:43:26', '2024-02-26 09:43:26'),
(1317, 2, 'List DP', NULL, '2024-02-26 10:27:28', '2024-02-26 10:27:28'),
(1318, 2, 'List DP', NULL, '2024-02-26 10:29:55', '2024-02-26 10:29:55'),
(1319, 2, 'List DP', NULL, '2024-02-26 10:38:17', '2024-02-26 10:38:17'),
(1320, 2, 'List DP', NULL, '2024-02-26 10:45:00', '2024-02-26 10:45:00'),
(1321, 2, 'List DP', NULL, '2024-02-26 10:45:57', '2024-02-26 10:45:57'),
(1322, 2, 'List DP', NULL, '2024-02-26 10:46:51', '2024-02-26 10:46:51'),
(1323, 2, 'OLT List', NULL, '2024-02-26 10:49:25', '2024-02-26 10:49:25'),
(1324, 2, 'OLT List', NULL, '2024-02-26 10:49:38', '2024-02-26 10:49:38'),
(1325, 2, 'OLT List', NULL, '2024-02-26 10:50:12', '2024-02-26 10:50:12'),
(1326, 2, 'Create OLT', 'SY2006VS216', '2024-02-26 10:51:40', '2024-02-26 10:51:40'),
(1327, 2, 'OLT List', NULL, '2024-02-26 10:51:41', '2024-02-26 10:51:41'),
(1328, 2, 'OLT List', NULL, '2024-02-26 10:52:15', '2024-02-26 10:52:15'),
(1329, 2, 'OLT List', NULL, '2024-02-26 10:52:58', '2024-02-26 10:52:58'),
(1330, 2, 'OLT List', NULL, '2024-03-04 11:11:13', '2024-03-04 11:11:13'),
(1331, 2, 'Distributor List', NULL, '2024-03-06 04:30:45', '2024-03-06 04:30:45'),
(1332, 2, 'OLT List', NULL, '2024-03-06 04:31:59', '2024-03-06 04:31:59'),
(1333, 2, 'Product List', NULL, '2024-03-06 05:08:36', '2024-03-06 05:08:36'),
(1334, 2, 'Stock List', NULL, '2024-03-06 05:10:52', '2024-03-06 05:10:52'),
(1335, 2, 'OLT List', NULL, '2024-03-06 05:23:29', '2024-03-06 05:23:29'),
(1336, 2, 'List EDFA', NULL, '2024-03-06 05:23:34', '2024-03-06 05:23:34'),
(1337, 2, 'List FiberLaying', NULL, '2024-03-06 05:23:40', '2024-03-06 05:23:40'),
(1338, 2, 'List DPD', NULL, '2024-03-06 05:23:47', '2024-03-06 05:23:47'),
(1339, 2, 'List DP', NULL, '2024-03-06 05:23:54', '2024-03-06 05:23:54'),
(1340, 2, 'List FH', NULL, '2024-03-06 05:23:59', '2024-03-06 05:23:59'),
(1341, 2, 'OLT List', NULL, '2024-03-14 07:04:58', '2024-03-14 07:04:58'),
(1342, 2, 'List DP', NULL, '2024-03-14 07:05:09', '2024-03-14 07:05:09'),
(1343, 2, 'List DP', NULL, '2024-03-14 07:05:34', '2024-03-14 07:05:34'),
(1344, 2, 'List DPD', NULL, '2024-03-14 07:06:12', '2024-03-14 07:06:12'),
(1345, 2, 'OLT List', NULL, '2024-03-14 17:13:21', '2024-03-14 17:13:21'),
(1346, 2, 'List DPD', NULL, '2024-03-14 17:14:25', '2024-03-14 17:14:25'),
(1347, 2, 'Distributor List', NULL, '2024-03-14 17:33:31', '2024-03-14 17:33:31'),
(1348, 2, 'OLT List', NULL, '2024-03-14 18:04:43', '2024-03-14 18:04:43'),
(1349, 2, 'OLT List', NULL, '2024-03-19 04:54:20', '2024-03-19 04:54:20'),
(1350, 2, 'Distributor List', NULL, '2024-03-19 05:05:13', '2024-03-19 05:05:13'),
(1351, 2, 'aaDistributor Was Created', NULL, '2024-03-19 05:10:14', '2024-03-19 05:10:14'),
(1352, 2, 'Distributor List', NULL, '2024-03-19 05:15:15', '2024-03-19 05:15:15'),
(1353, 2, 'OLT List', NULL, '2024-03-19 13:02:17', '2024-03-19 13:02:17'),
(1354, 2, 'OLT List', NULL, '2024-03-19 13:03:56', '2024-03-19 13:03:56'),
(1355, 2, 'OLT List', NULL, '2024-03-19 13:05:15', '2024-03-19 13:05:15'),
(1356, 2, 'List DP', NULL, '2024-03-19 13:06:25', '2024-03-19 13:06:25'),
(1357, 2, 'OLT List', NULL, '2024-03-19 13:06:35', '2024-03-19 13:06:35'),
(1358, 2, 'OLT List', NULL, '2024-03-19 14:07:31', '2024-03-19 14:07:31'),
(1359, 2, 'List EDFA', NULL, '2024-03-19 14:07:39', '2024-03-19 14:07:39'),
(1360, 2, 'List FiberLaying', NULL, '2024-03-19 14:07:46', '2024-03-19 14:07:46'),
(1361, 2, 'List DPD', NULL, '2024-03-19 14:07:53', '2024-03-19 14:07:53'),
(1362, 2, 'OLT List', NULL, '2024-03-19 14:13:34', '2024-03-19 14:13:34'),
(1363, 2, 'OLT List', NULL, '2024-03-19 14:16:09', '2024-03-19 14:16:09'),
(1364, 2, 'List EDFA', NULL, '2024-03-19 14:16:25', '2024-03-19 14:16:25'),
(1365, 2, 'OLT List', NULL, '2024-03-19 14:16:32', '2024-03-19 14:16:32'),
(1366, 2, 'OLT List', NULL, '2024-03-20 10:09:23', '2024-03-20 10:09:23'),
(1367, 2, 'OLT List', NULL, '2024-03-25 13:38:02', '2024-03-25 13:38:02'),
(1368, 2, 'OLT List', NULL, '2024-03-25 13:38:15', '2024-03-25 13:38:15'),
(1369, 2, 'Distributor List', NULL, '2024-03-29 10:52:03', '2024-03-29 10:52:03'),
(1370, 2, 'Distributor List', NULL, '2024-03-29 12:32:58', '2024-03-29 12:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `slj_olt`
--

CREATE TABLE `slj_olt` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `franchise_id` int(11) DEFAULT NULL,
  `olt_model` varchar(125) DEFAULT NULL,
  `olt_serial_number` varchar(50) NOT NULL,
  `olt_port` varchar(10) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `olt_ip_address` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `vlan` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_olt`
--

INSERT INTO `slj_olt` (`id`, `city`, `distributor`, `branch`, `franchise_id`, `olt_model`, `olt_serial_number`, `olt_port`, `company_name`, `olt_ip_address`, `username`, `password`, `vlan`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 9, NULL, 'SY-GPON-8OLT', 'SY2006VS215', '32', 'SYROTECH', '192.168.8.200', 'admin', 'admin', '0', '2023-08-27 06:01:53', '2023-08-27 18:23:34'),
(2, 1, 5, 9, NULL, '2', 'SY2006VS216', '32', 'SYROTECH', '192.168.8.200', 'demo', 'demo', NULL, '2024-02-26 05:21:40', '2024-02-26 05:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `slj_olt_ports`
--

CREATE TABLE `slj_olt_ports` (
  `id` bigint(20) NOT NULL,
  `olt_id` int(11) NOT NULL,
  `olt_port` int(11) NOT NULL,
  `franchise_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_olt_ports`
--

INSERT INTO `slj_olt_ports` (`id`, `olt_id`, `olt_port`, `franchise_id`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 21, '2023-08-27 18:24:09', '2023-08-27 18:24:09'),
(6, 1, 2, 21, '2023-08-27 18:24:23', '2023-08-27 18:24:23'),
(7, 1, 3, 21, '2023-08-27 18:28:49', '2023-08-27 18:28:49'),
(8, 1, 4, 21, '2023-09-05 19:51:30', '2023-09-05 19:51:30'),
(9, 1, 5, 21, '2023-09-05 19:51:52', '2023-09-05 19:51:52'),
(10, 2, 2, 21, '2024-02-26 05:22:40', '2024-02-26 05:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `slj_opt`
--

CREATE TABLE `slj_opt` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(250) DEFAULT NULL,
  `payment_status` varchar(250) DEFAULT NULL,
  `attempt_type` varchar(250) DEFAULT NULL,
  `gateway` varchar(250) DEFAULT NULL,
  `order_no` varchar(250) DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `transaction_id` varchar(250) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `franchise_name` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `package_name` varchar(250) DEFAULT NULL,
  `sub_package` varchar(250) DEFAULT NULL,
  `duration` decimal(13,2) DEFAULT NULL,
  `invoice_amount` decimal(13,2) DEFAULT NULL,
  `paid_amount` decimal(13,2) DEFAULT NULL,
  `bank_transaction_id` varchar(250) DEFAULT NULL,
  `bank_name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `slj_opt`
--
DELIMITER $$
CREATE TRIGGER `slj_opt_serial_number` BEFORE INSERT ON `slj_opt` FOR EACH ROW IF NEW.serial_number IS NULL THEN
           SET NEW.serial_number = concat("OPT",  IF((SELECT MAX(id) FROM slj_opt ) < 100000,  100000,  (SELECT MAX(id)+1 FROM slj_opt )));
    END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slj_payment_details`
--

CREATE TABLE `slj_payment_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `txnid` varchar(150) NOT NULL,
  `payment_source` varchar(150) NOT NULL,
  `payment_from` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1-Branch,2-Franchise',
  `payment_message` varchar(150) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slj_payment_type`
--

CREATE TABLE `slj_payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(105) NOT NULL,
  `payment_flow_type` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_payment_type`
--

INSERT INTO `slj_payment_type` (`id`, `name`, `payment_flow_type`, `created_at`, `updated_at`) VALUES
(1, 'Porting Channel', 'inward', '2021-01-08 19:25:06', NULL),
(2, 'Advertisement Amount', 'inward', '2020-10-25 20:53:33', '2020-10-25 20:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `slj_poles`
--

CREATE TABLE `slj_poles` (
  `id` int(11) NOT NULL,
  `fiber_id` int(11) NOT NULL,
  `long_lat` varchar(50) DEFAULT NULL,
  `loop_meters` float DEFAULT '0',
  `pole_series` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_poles`
--

INSERT INTO `slj_poles` (`id`, `fiber_id`, `long_lat`, `loop_meters`, `pole_series`, `created_at`, `updated_at`) VALUES
(1, 1, '16.2789484,80.4504123', 76, 'Pole 1', '2023-08-25 20:46:26', '2023-08-25 20:46:26'),
(2, 1, '16.2789813,80.4504021', 0, 'Pole 2', '2023-08-25 20:46:26', '2023-08-25 20:46:26'),
(3, 1, '16.2789673,80.4499318', 0, 'Pole 3', '2023-08-25 20:46:26', '2023-08-25 20:46:26'),
(4, 1, '16.2789658,80.4498911', 0, 'Pole 4', '2023-08-25 20:46:26', '2023-08-25 20:46:26'),
(5, 1, '16.2799189,80.4498619', 0, 'Pole 5', '2023-08-25 20:46:26', '2023-08-25 20:46:26'),
(6, 1, '16.2777514,80.4502096', 60, 'Pole 6', '2023-08-25 20:46:26', '2023-08-25 20:46:26'),
(7, 2, '16.2793565,80.44934', 47, 'Pole 1', '2023-08-26 01:38:43', '2023-08-26 01:38:43'),
(8, 2, '16.2788468,80.4487692', 0, 'Pole 2', '2023-08-26 01:38:43', '2023-08-26 01:38:43'),
(9, 2, '16.2777514,80.4502096', 0, 'Pole 3', '2023-08-26 01:38:43', '2023-08-26 01:38:43'),
(10, 2, '16.2797161,80.4493849', 0, 'Pole 4', '2023-08-26 01:38:43', '2023-08-26 01:38:43'),
(11, 2, '16.2797025,80.4493898', 0, 'Pole 5', '2023-08-26 01:38:43', '2023-08-26 01:38:43'),
(12, 2, '16.2801082,80.4493466', 0, 'Pole 6', '2023-08-26 01:38:43', '2023-08-26 01:38:43'),
(13, 2, '16.2800376,80.4492503', 0, 'Pole 7', '2023-08-26 01:38:43', '2023-08-26 01:38:43'),
(14, 3, '16.280067,80.4492444', 0, 'Pole 1', '2023-08-26 22:21:27', '2023-08-26 22:21:27'),
(15, 3, '16.2800605,80.4495212', 0, 'Pole 2', '2023-08-26 22:21:27', '2023-08-26 22:21:27'),
(16, 3, '16.2801709,80.4492502', 0, 'Pole 3', '2023-08-26 22:21:27', '2023-08-26 22:21:27'),
(17, 3, '16.2801757,80.4492468', 0, 'Pole 4', '2023-08-26 22:21:27', '2023-08-26 22:21:27'),
(18, 3, '16.2777514,80.4502096', 0, 'Pole 5', '2023-08-26 22:21:27', '2023-08-26 22:21:27'),
(19, 3, '16.2801765,80.4492516', 0, 'Pole 6', '2023-08-26 22:21:27', '2023-08-26 22:21:27'),
(20, 4, '16.2801709,80.4492502', 20, 'Pole 1', '2023-08-26 23:33:33', '2023-08-26 23:33:33'),
(21, 4, '16.2801779,80.4492525', 0, 'Pole 2', '2023-08-26 23:33:33', '2023-08-26 23:33:33'),
(22, 4, '16.2801769,80.4492491', 0, 'Pole 3', '2023-08-26 23:33:33', '2023-08-26 23:33:33'),
(23, 4, '16.2802828,80.4498619', 0, 'Pole 4', '2023-08-26 23:33:33', '2023-08-26 23:33:33'),
(24, 4, '16.2802828,80.4498619', 0, 'Pole 5', '2023-08-26 23:33:33', '2023-08-26 23:33:33'),
(25, 5, '16.2806152,80.4491667', 5, 'Pole 1', '2023-08-26 23:38:25', '2023-08-26 23:38:25'),
(26, 5, '16.2799027,80.4502653', 0, 'Pole 2', '2023-08-26 23:38:25', '2023-08-26 23:38:25'),
(27, 5, '16.2806467,80.4498619', 5, 'Pole 3', '2023-08-26 23:38:25', '2023-08-26 23:38:25'),
(28, 6, '16.2801446,80.4492522', 10, 'Pole 1', '2023-08-28 17:56:39', '2023-08-28 17:56:39'),
(29, 7, '16.2801757,80.4492462', 0, 'Pole 1', '2023-08-28 18:50:19', '2023-08-28 18:50:19'),
(30, 7, '16.2802537,80.4496945', 0, 'Pole 2', '2023-08-28 18:50:19', '2023-08-28 18:50:19'),
(31, 7, '16.2802356,80.448819', 0, 'Pole 3', '2023-08-28 18:50:19', '2023-08-28 18:50:19'),
(32, 8, '16.2805808,80.4492029', 5, 'Pole 1', '2023-08-29 19:49:51', '2023-08-29 19:49:51'),
(33, 8, '16.2809319,80.4492179', 0, 'Pole 2', '2023-08-29 19:49:51', '2023-08-29 19:49:51'),
(34, 8, '16.2808879,80.449178', 10, 'Pole 3', '2023-08-29 19:49:51', '2023-08-29 19:49:51'),
(35, 9, '16.2799697,80.4492434', 5, 'Pole 1', '2023-08-29 23:14:11', '2023-08-29 23:14:11'),
(36, 9, '16.2799697,80.4492434', 5, 'Pole 2', '2023-08-29 23:14:11', '2023-08-29 23:14:11'),
(37, 10, '16.2797049,80.4492783', 10, 'Pole 1', '2023-08-29 23:29:10', '2023-08-29 23:29:10'),
(38, 10, '16.2797049,80.4492783', 25, 'Pole 2', '2023-08-29 23:29:10', '2023-08-29 23:29:10'),
(39, 11, '16.2800725,80.4492452', 5, 'Pole 1', '2023-08-30 00:17:06', '2023-08-30 00:17:06'),
(40, 11, '16.2800427,80.4492488', 0, 'Pole 2', '2023-08-30 00:17:06', '2023-08-30 00:17:06'),
(41, 11, '16.280272,80.4486155', 10, 'Pole 3', '2023-08-30 00:17:06', '2023-08-30 00:17:06'),
(42, 12, '16.2802701,80.4486173', 5, 'Pole 1', '2023-08-30 00:55:14', '2023-08-30 00:55:14'),
(43, 12, '16.280273,80.4485196', 0, 'Pole 2', '2023-08-30 00:55:14', '2023-08-30 00:55:14'),
(44, 12, '16.2803883,80.4479979', 0, 'Pole 3', '2023-08-30 00:55:14', '2023-08-30 00:55:14'),
(45, 12, '16.2803861,80.4479906', 0, 'Pole 4', '2023-08-30 00:55:14', '2023-08-30 00:55:14'),
(46, 13, '16.2808374,80.4460378', 25, 'Pole 1', '2023-08-30 01:55:15', '2023-08-30 01:55:15'),
(47, 13, '16.280735,80.4479228', 0, 'Pole 2', '2023-08-30 01:55:15', '2023-08-30 01:55:15'),
(48, 13, '16.2808374,80.4460378', 20, 'Pole 3', '2023-08-30 01:55:15', '2023-08-30 01:55:15'),
(49, 14, '16.2799252,80.449781', 10, 'Pole 1', '2023-08-30 23:35:03', '2023-08-30 23:35:03'),
(50, 14, '16.279912,80.4498611', 5, 'Pole 2', '2023-08-30 23:35:03', '2023-08-30 23:35:03'),
(51, 15, '16.2777514,80.4502096', 45, 'Pole 1', '2023-09-01 22:18:59', '2023-09-01 22:18:59'),
(52, 15, '16.2793852,80.4494011', 0, 'Pole 2', '2023-09-01 22:18:59', '2023-09-01 22:18:59'),
(53, 15, '16.2795833,80.4494419', 0, 'Pole 3', '2023-09-01 22:18:59', '2023-09-01 22:18:59'),
(54, 15, '16.2797012,80.4493969', 0, 'Pole 4', '2023-09-01 22:18:59', '2023-09-01 22:18:59'),
(55, 15, '16.2797752,80.4493244', 0, 'Pole 5', '2023-09-01 22:18:59', '2023-09-01 22:18:59'),
(56, 16, '16.2797804,80.4493392', 0, 'Pole 1', '2023-09-01 22:59:57', '2023-09-01 22:59:57'),
(57, 17, '16.279781,80.44934', 20, 'Pole 1', '2023-09-01 23:06:05', '2023-09-01 23:06:05'),
(58, 17, '16.2797838,80.4493413', 5, 'Pole 2', '2023-09-01 23:06:05', '2023-09-01 23:06:05'),
(59, 18, '16.2797838,80.4493413', 25, 'Pole 1', '2023-09-01 23:12:10', '2023-09-01 23:12:10'),
(60, 18, '16.2797838,80.4493413', 15, 'Pole 2', '2023-09-01 23:12:10', '2023-09-01 23:12:10'),
(61, 19, '16.2797753,80.4493311', 30, 'Pole 1', '2023-09-01 23:16:07', '2023-09-01 23:16:07'),
(62, 19, '16.2797435,80.449222', 0, 'Pole 2', '2023-09-01 23:16:07', '2023-09-01 23:16:07'),
(63, 19, '16.2797435,80.449222', 20, 'Pole 3', '2023-09-01 23:16:07', '2023-09-01 23:16:07'),
(64, 20, '16.2798173,80.4492862', 25, 'Pole 1', '2023-09-01 23:41:36', '2023-09-01 23:41:36'),
(65, 20, '16.2798173,80.4492862', 0, 'Pole 2', '2023-09-01 23:41:36', '2023-09-01 23:41:36'),
(66, 20, '16.2798173,80.4492862', 0, 'Pole 3', '2023-09-01 23:41:36', '2023-09-01 23:41:36'),
(67, 20, '16.2798173,80.4492862', 10, 'Pole 4', '2023-09-01 23:41:36', '2023-09-01 23:41:36'),
(68, 21, '16.2796357,80.4503494', 10, 'Pole 1', '2023-09-01 23:45:52', '2023-09-01 23:45:52'),
(69, 21, '16.2796357,80.4503494', 0, 'Pole 2', '2023-09-01 23:45:52', '2023-09-01 23:45:52'),
(70, 21, '16.2796357,80.4503494', 15, 'Pole 3', '2023-09-01 23:45:52', '2023-09-01 23:45:52'),
(71, 22, '16.2795714,80.448589', 0, 'Pole 1', '2023-09-05 19:45:55', '2023-09-05 19:45:55'),
(72, 22, '16.2795714,80.448589', 0, 'Pole 2', '2023-09-05 19:45:55', '2023-09-05 19:45:55'),
(73, 22, '16.2795714,80.448589', 0, 'Pole 3', '2023-09-05 19:45:55', '2023-09-05 19:45:55'),
(74, 22, '16.2795714,80.448589', 30, 'Pole 4', '2023-09-05 19:45:55', '2023-09-05 19:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `slj_products`
--

CREATE TABLE `slj_products` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` varchar(220) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `sub_category` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `fiber_core` int(11) DEFAULT NULL,
  `product_photo` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_products`
--

INSERT INTO `slj_products` (`id`, `name`, `description`, `category`, `sub_category`, `unit`, `sku`, `status`, `fiber_core`, `product_photo`, `created_at`, `updated_at`) VALUES
(12, 'OPT', NULL, 1, 2, 'nos', '0', 'Y', NULL, 'WhatsApp Image 2023-07-19 at 11.04.50.jpeg', '2023-07-19 18:05:49', '2023-07-19 18:05:49'),
(13, 'FOBER 1X8 SPLITTERS', NULL, 3, 4, 'nos', '1', 'Y', NULL, 'WhatsApp Image 2023-07-19 at 11.08.12.jpeg', '2023-07-19 18:08:40', '2023-07-19 18:13:49'),
(14, 'NEXT VISION 60MMX1.2MM', NULL, 5, 6, 'nos', '100', 'Y', NULL, 'WhatsApp Image 2023-07-19 at 11.13.06.jpeg', '2023-07-19 18:13:35', '2023-07-19 18:13:35'),
(15, 'F3-FELDER', NULL, 7, 8, 'nos', '1', 'Y', NULL, 'WhatsApp Image 2023-07-19 at 11.17.13.jpeg', '2023-07-19 18:17:53', '2023-07-19 18:17:53'),
(16, 'NETLINE', NULL, 9, 10, 'nos', '1', 'Y', NULL, 'WhatsApp Image 2023-07-19 at 11.20.59.jpeg', '2023-07-19 18:21:27', '2023-07-19 18:21:27'),
(17, 'HCT MESSENGER 1X16', NULL, 11, 12, 'mtrs', '305', 'Y', NULL, 'WhatsApp Image 2023-07-19 at 11.26.37.jpeg', '2023-07-19 18:27:09', '2023-07-19 18:27:09'),
(18, 'SUPERTECH 200ML SPRY', NULL, 1, 13, 'mltr', '200ML', 'Y', NULL, 'WhatsApp Image 2023-07-20 at 10.04.29.jpeg', '2023-07-20 17:06:49', '2023-07-20 17:06:49'),
(19, '6 FIBER', NULL, 14, 15, 'Mtrs', '1 Mtr', 'Y', 6, NULL, '2023-07-24 18:06:08', '2023-07-24 18:06:08'),
(20, '4 FIBER', NULL, 14, 17, 'Mtrs', '1 Mtr', 'Y', 4, NULL, '2023-07-25 00:16:34', '2023-07-25 00:16:34'),
(21, 'GENERAL ENCLOSURE', NULL, 18, 19, 'nos', '1', 'Y', NULL, 'JointEnclosure.jpg', '2023-08-26 22:30:37', '2023-08-26 22:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `slj_product_categories`
--

CREATE TABLE `slj_product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_product_categories`
--

INSERT INTO `slj_product_categories` (`id`, `name`, `description`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ISOPROPYL ALCOHOL', NULL, NULL, 'Y', '2023-07-19 11:00:54', '2023-07-19 11:00:54'),
(2, 'ISOPROPYL ALCOHOL 500 ML', NULL, 1, 'Y', '2023-07-19 11:01:44', '2023-07-19 11:01:44'),
(3, 'PLC SPLITTERS', NULL, NULL, 'Y', '2023-07-19 11:06:40', '2023-07-19 11:06:40'),
(4, '1X8 PLC SPLITTERS', NULL, 3, 'Y', '2023-07-19 11:07:19', '2023-07-19 11:07:19'),
(5, 'FIBER SLEEVES', NULL, NULL, 'Y', '2023-07-19 11:10:39', '2023-07-19 11:10:39'),
(6, '60X1.2MM SLEEVES', NULL, 5, 'Y', '2023-07-19 11:11:11', '2023-07-19 11:11:11'),
(7, 'CATV FTTH NODE', NULL, NULL, 'Y', '2023-07-19 11:15:23', '2023-07-19 11:15:23'),
(8, 'CATV FTTH 1550 FILTER NODE', NULL, 7, 'Y', '2023-07-19 11:15:56', '2023-07-19 11:15:56'),
(9, 'FIBER TERMINATION BOXES', NULL, NULL, 'Y', '2023-07-19 11:19:06', '2023-07-19 11:19:06'),
(10, '2 OUT TERMNATION BOX', NULL, 9, 'Y', '2023-07-19 11:19:50', '2023-07-19 11:19:50'),
(11, 'MESSENGER WIRE', NULL, NULL, 'Y', '2023-07-19 11:24:28', '2023-07-19 11:24:28'),
(12, 'MESSENGER WIRE 1X16MM', NULL, 11, 'Y', '2023-07-19 11:25:09', '2023-07-19 11:25:09'),
(13, 'SUPERTECH 200ML', NULL, 1, 'Y', '2023-07-20 10:01:50', '2023-07-20 10:01:50'),
(14, 'FIBER', NULL, NULL, 'Y', '2023-07-24 10:52:19', '2023-07-24 10:52:19'),
(15, '6 FIBER', NULL, 14, 'Y', '2023-07-24 11:01:21', '2023-07-24 11:01:21'),
(16, '12 FIBER', NULL, 14, 'Y', '2023-07-24 11:02:34', '2023-07-24 11:02:34'),
(17, '4 FIBER', NULL, 14, 'Y', '2023-07-24 17:15:35', '2023-07-24 17:15:35'),
(18, 'JOINT ENCLOSURE', NULL, NULL, 'Y', '2023-08-26 15:26:26', '2023-08-26 15:26:26'),
(19, '24 FIBER JOINT ENCLOSURE', NULL, 18, 'Y', '2023-08-26 15:26:58', '2023-08-26 15:26:58'),
(20, '1X4 PLC SPLITTERS', NULL, 3, 'Y', '2023-08-26 17:37:48', '2023-08-26 17:37:48'),
(21, '1X16 PLC SPLITTERS', NULL, 3, 'Y', '2023-08-27 15:40:28', '2023-08-27 15:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `slj_purchase_order`
--

CREATE TABLE `slj_purchase_order` (
  `id` int(11) NOT NULL,
  `ptype` int(11) DEFAULT NULL,
  `invoice_type` varchar(50) NOT NULL COMMENT '''monthly''=> ''Monthly'',''quarterly''=>''Quarterly'', ''half_yearly'' => ''Half-Yearly'', ''yearly''=> ''yearley''',
  `payment_flow_type` varchar(50) NOT NULL COMMENT ' ''inward''=>''Inward Cash Flow'',''outward''=>''Outward Cash Flow''',
  `po_number` varchar(45) DEFAULT NULL,
  `from_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `gst_value` varchar(45) DEFAULT NULL,
  `gst_amount` decimal(13,2) DEFAULT NULL,
  `cgst_value` varchar(45) DEFAULT NULL,
  `cgst_amount` decimal(13,2) DEFAULT NULL,
  `sgst_value` varchar(45) DEFAULT NULL,
  `sgst_amount` decimal(13,2) DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `address` text,
  `gst_number` varchar(20) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(105) DEFAULT NULL,
  `name` varchar(105) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `renew_date` date DEFAULT NULL,
  `invoice_created` smallint(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `invoice_create_complete` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_purchase_order`
--

INSERT INTO `slj_purchase_order` (`id`, `ptype`, `invoice_type`, `payment_flow_type`, `po_number`, `from_date`, `end_date`, `amount`, `gst_value`, `gst_amount`, `cgst_value`, `cgst_amount`, `sgst_value`, `sgst_amount`, `total_amount`, `address`, `gst_number`, `phone`, `email`, `name`, `type`, `status`, `created_at`, `renew_date`, `invoice_created`, `updated_at`, `created_by`, `updated_by`, `invoice_create_complete`) VALUES
(1, 2, '', '', 'SLJ000001', '2020-09-01 07:00:00', '2020-09-30 07:00:00', '10000.00', '18', '1800.00', NULL, NULL, NULL, NULL, '11800.00', 'Murthy Fashions\r\nLalapet,\r\nGuntur', '8878762662ZE', '8125617777', 'murthyfashions@gmail.com', 'Murthy Fashions', 'postpaid', 1, '2020-10-25 20:58:32', NULL, NULL, '2020-10-25 20:58:32', 2, NULL, 0),
(2, 1, 'monthly', 'inward', 'PO100000', '2021-02-15 07:00:00', '2022-02-15 07:00:00', '10000.00', '18', '21900.00', '9', '10950.00', '9', '10950.00', '143566.67', 'Flat:101, Block-B, Shiva green Valley\r\nNear Venkateswara sway temple, gorantla', '8878762662ZE', '0888 536 8989', 'vamsikrishna.might@gmail.com', 'Vamsi Krishna Manchala1', 'prepaid', 1, '2021-02-15 17:50:49', '2021-03-17', NULL, '2021-02-15 20:52:42', 2, NULL, 0),
(3, 1, 'monthly', 'inward', 'PO100000', '2021-02-15 07:00:00', '2021-03-25 07:00:00', '10000.00', '18', '2280.00', '9', '1140.00', '9', '1140.00', '14946.67', 'Flat:101, Block-B, Shiva green Valley\r\nNear Venkateswara sway temple, gorantla', '8878762662ZE', '0888 536 8989', 'ramana1@gmail.com', 'ramana Sammeta', 'prepaid', 1, '2021-02-15 17:52:26', '2021-03-25', NULL, '2021-02-15 17:53:36', 2, NULL, 0),
(4, 2, 'monthly', 'inward', 'PO100000', '2021-02-15 07:00:00', '2021-03-17 07:00:00', '10000.00', '18', '1800.00', '9', '900.00', '9', '900.00', '11800.00', 'Flat:101, Block-B, Shiva green Valley\r\nNear Venkateswara sway temple, gorantla', '8878762662ZE', '0888 536 8989', 'sljfibernet1@gmail.com', 'Murthy Fashions', 'prepaid', 1, '2021-02-15 20:35:39', '2021-02-15', NULL, '2021-02-15 20:35:39', 2, NULL, 0),
(5, 1, 'monthly', 'inward', 'PO100000', '2021-03-07 07:00:00', '2022-03-07 07:00:00', '15000.00', '18', '32850.00', '9', '16425.00', '9', '16425.00', '215350.00', 'Yahoo', '3284246IN1', '9985039240', 'srinivas@gmail.com', 'Swapna', 'prepaid', 1, '2021-03-08 00:54:30', '2021-04-06', NULL, '2021-03-08 00:55:57', 2, 2, 0),
(6, 1, 'monthly', 'inward', 'PO100000', '2021-03-07 07:00:00', '2022-03-06 07:00:00', '12000.00', '18', '26208.00', '9', '13104.00', '9', '13104.00', '171808.00', 'yahoo', '3284246IN1', '9985039240', 'srinivas@gmail.com', 'ashok surisetty', 'prepaid', 1, '2021-03-08 00:58:39', '2021-04-06', NULL, '2021-03-08 00:58:50', 2, NULL, 0);

--
-- Triggers `slj_purchase_order`
--
DELIMITER $$
CREATE TRIGGER `slj_purchase_order_po_number` BEFORE INSERT ON `slj_purchase_order` FOR EACH ROW IF NEW.po_number IS NULL THEN
           SET NEW.po_number = concat("PO",  IF((SELECT MAX(id) FROM slj_purchase_order ) < 100000,  100000,  (SELECT MAX(id)+1 FROM slj_purchase_order )));
    END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slj_renewuser_invoices`
--

CREATE TABLE `slj_renewuser_invoices` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(50) DEFAULT NULL,
  `renew_id` int(11) DEFAULT NULL,
  `scheduled_datetime` timestamp NULL DEFAULT NULL,
  `from_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `base_price` decimal(13,2) DEFAULT NULL,
  `paid_amount` decimal(13,2) DEFAULT NULL,
  `current_balance` decimal(13,2) DEFAULT '0.00',
  `total_amount` decimal(13,2) DEFAULT NULL,
  `billing_address` text,
  `gst_number` varchar(20) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(105) DEFAULT NULL,
  `name` varchar(105) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `cancelled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: cancelled 0: not cancelled',
  `paid` tinyint(1) DEFAULT '0' COMMENT '0 - un-paid, 1-paid ',
  `updated_by` int(11) DEFAULT NULL,
  `invoice_type` varchar(50) NOT NULL COMMENT '''monthly''=> ''Monthly'',''quarterly''=>''Quarterly'', ''half_yearly'' => ''Half-Yearly'', ''yearly''=> ''yearley''',
  `bill_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `renew_date` timestamp NULL DEFAULT NULL,
  `note` varchar(350) DEFAULT NULL,
  `payment_pickup_date` datetime DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `slj_renewuser_invoices`
--
DELIMITER $$
CREATE TRIGGER `slj_renewuser_invoices_invoice_number` BEFORE INSERT ON `slj_renewuser_invoices` FOR EACH ROW BEGIN
	  SET @auto_id := (SELECT
		  MAX(ID)
		FROM slj_renewuser_invoices);
	IF ( @auto_id = NULL) THEN
		SET @auto_id = 1;
	ELSE 
		SET @auto_id = @auto_id + 1;    
	END IF;

	  SET new.invoice_number = CONCAT('RIN', LPAD(@auto_id, 5, 0));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slj_renew_user_history`
--

CREATE TABLE `slj_renew_user_history` (
  `id` int(11) NOT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `distributor` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `franchise_name` varchar(150) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `renew_cycle` varchar(50) NOT NULL,
  `renew_type` varchar(50) NOT NULL,
  `confirmed` tinyint(4) DEFAULT '0',
  `scheduled_datetime` datetime DEFAULT NULL,
  `connection_type` varchar(50) NOT NULL,
  `package` int(11) DEFAULT NULL,
  `sub_package` int(11) DEFAULT NULL,
  `combo_package` int(11) DEFAULT NULL,
  `combo_sub_package` int(11) DEFAULT NULL,
  `cable_allacart` varchar(1000) DEFAULT NULL,
  `cable_packages` varchar(1000) DEFAULT NULL,
  `cable_base` varchar(200) DEFAULT NULL,
  `cable_local` varchar(200) DEFAULT NULL,
  `iptv_allacart` varchar(1000) DEFAULT NULL,
  `iptv_packages` varchar(1000) DEFAULT NULL,
  `iptv_base` varchar(200) DEFAULT NULL,
  `iptv_local` varchar(200) DEFAULT NULL,
  `installation_amount` float DEFAULT NULL,
  `secure_deposite_amount` float DEFAULT NULL,
  `setup_box_amount` float DEFAULT NULL,
  `androidbox_security_deposit` int(11) DEFAULT '0',
  `enable_discount` tinyint(4) DEFAULT '0',
  `discount_reason` varchar(255) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `enable_additional_charges` tinyint(4) DEFAULT '0',
  `additional_charges_reason` varchar(500) DEFAULT NULL,
  `additional_amount` float DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `payment_type` varchar(150) DEFAULT NULL,
  `bill_comment` varchar(1000) DEFAULT NULL,
  `invoice_comment` varchar(1000) DEFAULT NULL,
  `new_expiry_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `generate_invoice` varchar(150) DEFAULT NULL,
  `package_amount` float DEFAULT NULL,
  `cgst_amount` float DEFAULT NULL,
  `cgst` float DEFAULT NULL,
  `sgst` varchar(45) DEFAULT NULL,
  `sgst_amount` float DEFAULT NULL,
  `invoice_amount` float DEFAULT NULL,
  `final_payable` float DEFAULT NULL,
  `payment` varchar(150) DEFAULT NULL,
  `ref_no` varchar(120) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `bank_name` varchar(150) DEFAULT NULL,
  `cheque_no` varchar(150) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `renew_by` int(11) NOT NULL,
  `customer_renewed` tinyint(4) DEFAULT '0',
  `paid_date` datetime DEFAULT NULL,
  `paid_through` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `end_date` datetime DEFAULT NULL,
  `from_date` datetime DEFAULT NULL,
  `csbu` varchar(20) DEFAULT NULL COMMENT 'Customer status before update',
  `ccsbu` varchar(50) DEFAULT NULL COMMENT 'Customer current status before update',
  `cle` datetime DEFAULT NULL COMMENT 'Customer last expiry date',
  `clp` int(11) DEFAULT NULL COMMENT 'Customer last package ',
  `clsp` int(11) DEFAULT NULL,
  `clconnectiontype` varchar(150) DEFAULT NULL,
  `clil` varchar(200) DEFAULT NULL COMMENT 'Customer last iptv local',
  `clib` varchar(200) DEFAULT NULL COMMENT 'Customer last iptv base',
  `clip` varchar(200) DEFAULT NULL COMMENT 'Customer last iptv package',
  `clia` varchar(200) DEFAULT NULL COMMENT 'Customer last iptv allacart',
  `clcl` varchar(200) DEFAULT NULL COMMENT 'Customer last cable local',
  `clcb` varchar(200) DEFAULT NULL COMMENT 'Customer last cable base',
  `clcpa` varchar(200) DEFAULT NULL COMMENT 'Customer last cable package',
  `clca` varchar(200) DEFAULT NULL COMMENT 'Customer last cable allacart',
  `clcsp` int(11) DEFAULT NULL COMMENT 'Customer last combo sub package',
  `clcp` int(11) DEFAULT NULL COMMENT 'Customer last combo package',
  `cheque_status` varchar(100) DEFAULT NULL,
  `installation_address` varchar(500) DEFAULT NULL,
  `pay_mode` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `slj_renew_user_history`
--
DELIMITER $$
CREATE TRIGGER `slj_renew_user_history_order_number` BEFORE INSERT ON `slj_renew_user_history` FOR EACH ROW BEGIN
	  SET @auto_id := (SELECT
		  MAX(ID)
		FROM slj_renew_user_history);
	IF ( @auto_id = NULL) THEN
		SET @auto_id = 1;
	ELSE 
		SET @auto_id = @auto_id + 1;    
	END IF;

	  SET new.order_number = CONCAT('RU', LPAD(@auto_id, 5, 0));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slj_stock_history`
--

CREATE TABLE `slj_stock_history` (
  `id` bigint(20) NOT NULL,
  `stock_ids` varchar(255) DEFAULT NULL,
  `from_user_type` varchar(20) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_type` varchar(20) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_stock_history`
--

INSERT INTO `slj_stock_history` (`id`, `stock_ids`, `from_user_type`, `from_user_id`, `to_user_type`, `to_user_id`, `description`, `created_at`, `updated_at`) VALUES
(10, '83,82,81,80,79', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-07-20 01:35:39', '2023-07-20 01:35:39'),
(11, '104,103,102,101,100,99,98', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-07-20 22:05:36', '2023-07-20 22:05:36'),
(12, '122', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-07-20 22:09:22', '2023-07-20 22:09:22'),
(13, '119', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-07-25 18:24:03', '2023-07-25 18:24:03'),
(14, '121', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-07-25 18:26:13', '2023-07-25 18:26:13'),
(15, '140,139,138,137,136,135,134', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-07-25 18:48:44', '2023-07-25 18:48:44'),
(16, '133,132,131,130,129,128,127,126,124,123', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-07-25 18:50:10', '2023-07-25 18:50:10'),
(17, '141', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-08 21:29:45', '2023-08-08 21:29:45'),
(18, '118', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-08 21:31:58', '2023-08-08 21:31:58'),
(19, '142', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-25 18:35:51', '2023-08-25 18:35:51'),
(20, '143', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-26 01:22:00', '2023-08-26 01:22:00'),
(21, '144', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-26 22:02:46', '2023-08-26 22:02:46'),
(22, '147,146,145', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-26 23:45:49', '2023-08-26 23:45:49'),
(23, '114,113,112,111', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-26 23:47:41', '2023-08-26 23:47:41'),
(24, '148', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-27 00:28:14', '2023-08-27 00:28:14'),
(25, '149', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-28 17:37:54', '2023-08-28 17:37:54'),
(26, '150', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-08-28 17:42:27', '2023-08-28 17:42:27'),
(27, '151', 'superadmin', 2, 'employee', 331, NULL, '2023-08-29 23:55:06', '2023-08-29 23:55:06'),
(28, '152', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-01 18:27:14', '2023-09-01 18:27:14'),
(29, '117', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-01 19:21:17', '2023-09-01 19:21:17'),
(30, '97,96,95,94,93,92,91,90,89,88,87', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-01 19:24:29', '2023-09-01 19:24:29'),
(31, '78,77,76,75,74,73,72,71,70,69', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-01 19:28:08', '2023-09-01 19:28:08'),
(32, '153', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-01 23:36:26', '2023-09-01 23:36:26'),
(33, '155,154', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-03 20:09:13', '2023-09-03 20:09:13'),
(34, '156', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-03 20:14:12', '2023-09-03 20:14:12'),
(35, '157', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-03 20:17:36', '2023-09-03 20:17:36'),
(36, '158', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-05 18:55:44', '2023-09-05 18:55:44'),
(37, '159', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-05 19:01:08', '2023-09-05 19:01:08'),
(38, '160', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-05 19:10:30', '2023-09-05 19:10:30'),
(39, '161', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-05 19:14:54', '2023-09-05 19:14:54'),
(40, '162', 'Inventory Manager', 330, 'employee', 331, NULL, '2023-09-07 17:11:41', '2023-09-07 17:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `slj_stock_items`
--

CREATE TABLE `slj_stock_items` (
  `id` int(11) NOT NULL,
  `itemname` varchar(124) DEFAULT NULL,
  `brand` varchar(123) DEFAULT NULL,
  `modelno` varchar(125) DEFAULT NULL,
  `serial_no` varchar(100) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `distributor` varchar(140) DEFAULT NULL,
  `branch` varchar(140) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_name` varchar(145) DEFAULT NULL,
  `buyingdate` datetime DEFAULT NULL,
  `buyingprice` bigint(20) DEFAULT NULL,
  `invoice_file` varchar(222) DEFAULT NULL,
  `serialnum_file` varchar(120) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_stock_items`
--

INSERT INTO `slj_stock_items` (`id`, `itemname`, `brand`, `modelno`, `serial_no`, `photo`, `city`, `distributor`, `branch`, `description`, `category_name`, `buyingdate`, `buyingprice`, `invoice_file`, `serialnum_file`, `created_at`, `updated_at`) VALUES
(41, 'Chair', 'Neelkamal', 'U76', '233434', '2-photo-1687170944.jpg', '1', '1', NULL, 'we', 'Furniture', '2023-06-12 16:05:00', 25000, '2-invoice-1687170944.jpg', NULL, '2023-06-19 16:05:44', '2023-06-19 16:09:53'),
(42, 'Chair', 'Neelkamal', 'Dp-444', '233434', '2-photo-1687171232.jpg', '1', '1', NULL, 'we', 'Furniture', '2023-06-12 16:10:00', 25000, '2-invoice-1687171232.jpg', NULL, '2023-06-19 16:10:32', '2023-06-19 16:10:51'),
(43, 'TV', 'Neelkamal', 'U76', '44', '2-photo-1687171376.jpg', '1', '1', NULL, 'we', 'Electronics', '2023-06-16 12:15:00', 25000, '2-invoice-1687171376.jpg', NULL, '2023-06-19 16:12:56', '2023-06-19 16:16:35'),
(44, 'Chair', 'Neelkamal', 'Dp-444', '233434', '2-photo-1687173228.jpg', '1', '3', NULL, NULL, 'Furniture', '2023-06-16 12:15:00', 25000, '2-invoice-1687173228.jpg', NULL, '2023-06-19 16:43:48', '2023-06-19 16:43:48'),
(45, 'Chair', 'Neelkamal', 'Dp-444', '233434', NULL, '1', '3', NULL, 'p', 'Furniture', '2023-06-16 12:15:00', 25000, NULL, NULL, '2023-06-19 16:50:37', '2023-06-19 16:50:37'),
(46, 'Chair', 'Neelkamal', 'Dp-444', '233434', NULL, '1', '3', NULL, 'p', 'Furniture', '2023-06-16 12:15:00', 25000, NULL, NULL, '2023-06-19 16:56:04', '2023-06-19 16:56:04'),
(47, 'TV', 'Creative', 'Dp-444', '233434', '2-photo-1687174128.jpg', '1', '3', NULL, 'Welcome to assign values', 'Electronics', '2023-06-19 16:58:00', 25000, '2-invoice-1687174128.jpg', NULL, '2023-06-19 16:58:48', '2023-06-19 16:58:48'),
(48, 'Chair', 'Comfort', '444', '44', NULL, '1', '3', NULL, 'df', 'Furniture', '2023-06-12 17:00:00', 25000, NULL, NULL, '2023-06-19 17:00:15', '2023-06-19 17:00:15'),
(49, 'Fan', 'Creative', 'Dp-444', '233434', '2-photo-1687174306.jpg', '1', '3', NULL, 'wee', 'Furniture', '2023-06-16 12:15:00', 25000, '2-invoice-1687174306.jpg', '2-invoice-1687174306.jpg', '2023-06-19 17:01:46', '2023-06-19 17:01:46'),
(50, 'Chair', 'Neelkamal', 'Dp-444', '233434', '2-photo-1687250859.jpg', NULL, NULL, '5', 'Welcome', 'Furniture', NULL, NULL, NULL, NULL, '2023-06-20 14:17:39', '2023-06-20 14:38:13'),
(53, 'Fan', 'Creative', 'U76', '233434', '2-photo-1687254108.jpg', NULL, '1', NULL, 'welcome to new world', 'Electronics', NULL, NULL, NULL, NULL, '2023-06-20 15:11:48', '2023-06-20 15:34:00'),
(57, 'TV', 'PANASONIC', 'PAN22', '9KK335KK', '2-photo-1687329584.jpg', '1', '1', NULL, 'WE', 'Electronics', '2023-06-21 12:09:00', 25000, '2-invoice-1687329584.jpg', '2-invoice-1687329584.jpg', '2023-06-21 12:09:44', '2023-06-21 12:22:30'),
(58, 'Chair', 'Neelkamal', 'Dp-444', '233434', '2-photo-1687841421.jpg', '1', NULL, '1', 'welcome', 'Furniture', '2023-06-16 12:15:00', 25000, '2-invoice-1687841421.jpg', '2-invoice-1687841421.jpg', '2023-06-27 10:20:21', '2023-06-27 10:21:04'),
(61, 'TV', 'Sony', 'U76', '3434', '2-photo-1688194221.jpg', '1', NULL, '8', 'welcome to new world', 'Electronics', '2023-07-01 12:18:00', 25000, '2-invoice-1688194221.jpg', '2-invoice-1688194221.jpg', '2023-07-01 12:20:21', '2023-07-01 13:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `slj_stock_products`
--

CREATE TABLE `slj_stock_products` (
  `id` bigint(20) NOT NULL,
  `product` int(11) NOT NULL,
  `vendor` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `notes` varchar(220) DEFAULT NULL,
  `serial_no` varchar(30) DEFAULT NULL,
  `identification` varchar(200) DEFAULT NULL,
  `manufacturer` varchar(200) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `warranty` varchar(100) DEFAULT NULL,
  `buy_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `current_user_type` varchar(20) DEFAULT NULL,
  `current_user_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `transferred_from` int(11) DEFAULT NULL,
  `transferred_user_type` varchar(45) DEFAULT NULL,
  `warehouse_status` varchar(45) DEFAULT NULL,
  `distributor_status` varchar(45) DEFAULT NULL,
  `branch_status` varchar(45) DEFAULT NULL,
  `employee_status` varchar(45) DEFAULT NULL,
  `franchise_status` varchar(45) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `manufacture_year` int(11) DEFAULT NULL,
  `drum_number` varchar(200) DEFAULT NULL,
  `price_per_meter` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `start_reading` int(11) DEFAULT NULL,
  `end_reading` int(11) DEFAULT NULL,
  `dummy_startreading` int(11) DEFAULT NULL,
  `dummy_endreading` int(11) DEFAULT NULL,
  `assign_status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warranty_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_stock_products`
--

INSERT INTO `slj_stock_products` (`id`, `product`, `vendor`, `type`, `notes`, `serial_no`, `identification`, `manufacturer`, `brand`, `warranty`, `buy_price`, `selling_price`, `barcode`, `current_user_type`, `current_user_id`, `status`, `transferred_from`, `transferred_user_type`, `warehouse_status`, `distributor_status`, `branch_status`, `employee_status`, `franchise_status`, `customer_id`, `manufacture_year`, `drum_number`, `price_per_meter`, `length`, `start_reading`, `end_reading`, `dummy_startreading`, `dummy_endreading`, `assign_status`, `created_at`, `updated_at`, `warranty_date`) VALUES
(24, 16, 4, 'new', NULL, '1', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '1', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(25, 16, 4, 'new', NULL, '2', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '2', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(26, 16, 4, 'new', NULL, '3', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '3', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(27, 16, 4, 'new', NULL, '4', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '4', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(28, 16, 4, 'new', NULL, '5', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '5', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(29, 16, 4, 'new', NULL, '6', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '6', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(30, 16, 4, 'new', NULL, '7', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '7', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(31, 16, 4, 'new', NULL, '8', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '8', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(32, 16, 4, 'new', NULL, '9', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '9', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(33, 16, 4, 'new', NULL, '10', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '10', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(34, 16, 4, 'new', NULL, '11', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '11', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(35, 16, 4, 'new', NULL, '12', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '12', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(36, 16, 4, 'new', NULL, '13', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '13', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(37, 16, 4, 'new', NULL, '14', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '14', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(38, 16, 4, 'new', NULL, '15', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '15', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(39, 16, 4, 'new', NULL, '16', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '16', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(40, 16, 4, 'new', NULL, '17', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '17', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(41, 16, 4, 'new', NULL, '18', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '18', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(42, 16, 4, 'new', NULL, '19', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '19', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(43, 16, 4, 'new', NULL, '20', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '20', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(44, 16, 4, 'new', NULL, '21', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '21', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(45, 16, 4, 'new', NULL, '22', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '22', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(46, 16, 4, 'new', NULL, '23', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '23', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(47, 16, 4, 'new', NULL, '24', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '24', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(48, 16, 4, 'new', NULL, '25', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '25', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(49, 16, 4, 'new', NULL, '26', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '26', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(50, 16, 4, 'new', NULL, '27', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '27', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(51, 16, 4, 'new', NULL, '28', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '28', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(52, 16, 4, 'new', NULL, '29', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '29', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(53, 16, 4, 'new', NULL, '30', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '30', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(54, 16, 4, 'new', NULL, '31', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '31', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(55, 16, 4, 'new', NULL, '32', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '32', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(56, 16, 4, 'new', NULL, '33', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '33', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(57, 16, 4, 'new', NULL, '34', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '34', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(58, 16, 4, 'new', NULL, '35', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '35', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(59, 16, 4, 'new', NULL, '36', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '36', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(60, 16, 4, 'new', NULL, '37', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '37', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(61, 16, 4, 'new', NULL, '38', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '38', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(62, 16, 4, 'new', NULL, '39', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '39', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(63, 16, 4, 'new', NULL, '40', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '40', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(64, 16, 4, 'new', NULL, '41', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '41', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(65, 16, 4, 'new', NULL, '42', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '42', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(66, 16, 4, 'new', NULL, '43', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '43', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(67, 16, 4, 'new', NULL, '44', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '44', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(68, 16, 4, 'new', NULL, '45', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '45', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-19 18:54:35', '1970-01-01 05:30:00'),
(69, 16, 4, 'new', NULL, '46', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '46', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(70, 16, 4, 'new', NULL, '47', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '47', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(71, 16, 4, 'new', NULL, '48', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '48', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(72, 16, 4, 'new', NULL, '49', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '49', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(73, 16, 4, 'new', NULL, '50', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '50', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(74, 16, 4, 'new', NULL, '51', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '51', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(75, 16, 4, 'new', NULL, '52', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '52', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(76, 16, 4, 'new', NULL, '53', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '53', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(77, 16, 4, 'new', NULL, '54', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '54', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(78, 16, 4, 'new', NULL, '55', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '55', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 18:54:35', '2023-09-01 19:28:08', '1970-01-01 05:30:00'),
(79, 16, 4, 'new', NULL, '56', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '56', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-20 01:35:39', '1970-01-01 05:30:00'),
(80, 16, 4, 'new', NULL, '57', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '57', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-20 01:35:39', '1970-01-01 05:30:00'),
(81, 16, 4, 'new', NULL, '58', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '58', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-20 01:35:39', '1970-01-01 05:30:00'),
(82, 16, 4, 'new', NULL, '59', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '59', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-20 01:35:39', '1970-01-01 05:30:00'),
(83, 16, 4, 'new', NULL, '60', 'JC BOX -1', 'NETLINE DIGITAL SOLUTIONS', 'NETLINE', NULL, 70, 75, '60', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 18:54:35', '2023-07-20 01:35:39', '1970-01-01 05:30:00'),
(87, 13, 4, 'new', NULL, '61', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '1', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:42:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(88, 13, 4, 'new', NULL, '62', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '2', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:42:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(89, 13, 4, 'new', NULL, '63', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '63', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(90, 13, 4, 'new', NULL, '64', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '64', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(91, 13, 4, 'new', NULL, '65', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '65', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(92, 13, 4, 'new', NULL, '66', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '66', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(93, 13, 4, 'new', NULL, '67', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '67', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(94, 13, 4, 'new', NULL, '68', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '68', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(95, 13, 4, 'new', NULL, '69', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '69', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(96, 13, 4, 'new', NULL, '70', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '70', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(97, 13, 4, 'new', NULL, '71', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '71', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:47:09', '2023-09-01 19:24:29', '1970-01-01 05:30:00'),
(98, 13, 4, 'new', NULL, '72', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '72', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:47:09', '2023-07-20 22:05:36', '1970-01-01 05:30:00'),
(99, 13, 4, 'new', NULL, '73', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '73', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:47:09', '2023-07-20 22:05:36', '1970-01-01 05:30:00'),
(100, 13, 4, 'new', NULL, '74', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '74', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:47:09', '2023-07-20 22:05:36', '1970-01-01 05:30:00'),
(101, 13, 4, 'new', NULL, '75', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '75', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:47:09', '2023-07-20 22:05:36', '1970-01-01 05:30:00'),
(102, 13, 4, 'new', NULL, '76', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '76', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:47:09', '2023-07-20 22:05:36', '1970-01-01 05:30:00'),
(103, 13, 4, 'new', NULL, '77', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '77', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:47:09', '2023-07-20 22:05:36', '1970-01-01 05:30:00'),
(104, 13, 4, 'new', NULL, '78', 'PLC SPLITTER 1X8 -1', 'NETLINK ICT PVT LTD', 'FOBER', NULL, 190, 200, '78', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:47:09', '2023-07-20 22:05:36', '1970-01-01 05:30:00'),
(105, 15, 4, 'new', NULL, '79', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '79', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-07-19 21:49:48', '1970-01-01 05:30:00'),
(106, 15, 4, 'new', NULL, '80', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '80', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-07-19 21:49:48', '1970-01-01 05:30:00'),
(107, 15, 4, 'new', NULL, '81', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '81', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-07-19 21:49:48', '1970-01-01 05:30:00'),
(108, 15, 4, 'new', NULL, '82', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '82', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-07-19 21:49:48', '1970-01-01 05:30:00'),
(109, 15, 4, 'new', NULL, '83', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '83', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-07-19 21:49:48', '1970-01-01 05:30:00'),
(110, 15, 4, 'new', NULL, '84', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '84', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-07-19 21:49:48', '1970-01-01 05:30:00'),
(111, 15, 4, 'new', NULL, '85', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '85', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-08-26 23:47:41', '1970-01-01 05:30:00'),
(112, 15, 4, 'new', NULL, '86', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '86', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-08-26 23:47:41', '1970-01-01 05:30:00'),
(113, 15, 4, 'new', NULL, '87', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '87', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-08-26 23:47:41', '1970-01-01 05:30:00'),
(114, 15, 4, 'new', NULL, '88', '1550  NM FILTER NODE', 'F3 FELDER', 'F3 FELDER', NULL, 100, 110, '88', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:49:48', '2023-08-26 23:47:41', '1970-01-01 05:30:00'),
(115, 14, 4, 'new', NULL, '89', 'SLEEVES 60 MM*1.2 MM', 'NEXT VISION', 'NEXT VISION', NULL, 100, 110, '89', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:52:35', '2023-07-19 21:52:35', '1970-01-01 05:30:00'),
(116, 14, 4, 'new', NULL, '90', 'SLEEVES 60 MM*1.2 MM', 'NEXT VISION', 'NEXT VISION', NULL, 100, 110, '90', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:52:35', '2023-07-19 21:52:35', '1970-01-01 05:30:00'),
(117, 14, 4, 'new', NULL, '91', 'SLEEVES 60 MM*1.2 MM', 'NEXT VISION', 'NEXT VISION', NULL, 100, 110, '91', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-19 21:52:35', '2023-09-01 19:21:17', '1970-01-01 05:30:00'),
(118, 14, 4, 'new', NULL, '92', 'SLEEVES 60 MM*1.2 MM', 'NEXT VISION', 'NEXT VISION', NULL, 100, 110, '92', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:52:35', '2023-08-08 21:31:58', '1970-01-01 05:30:00'),
(119, 14, 4, 'new', NULL, '93', 'SLEEVES 60 MM*1.2 MM', 'NEXT VISION', 'NEXT VISION', NULL, 100, 110, '93', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:52:35', '2023-07-25 18:24:03', '1970-01-01 05:30:00'),
(120, 12, 4, 'new', NULL, '94', 'ISOPROPYL ALCOHOL 500 ML', 'OPT ELECTRONIC GRADE', 'OPT ELECTRONIC GRADE', NULL, 160, 175, '94', NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:55:13', '2023-07-19 21:55:13', '1970-01-01 05:30:00'),
(121, 17, 4, 'new', NULL, '95', 'MESSENGER WIRE 1 X 16', 'HCT MESSENGER WIRE', 'HCT MESSENGER WIRE', NULL, 650, 700, '95', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19 21:56:56', '2023-07-25 18:26:13', '1970-01-01 05:30:00'),
(122, 18, 4, 'new', NULL, '96', 'ISOPROPYL ALCOHOLSPRAY 200 ML', 'SUPERTECH', 'SUPERTECH', NULL, 60, 70, '96', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-20 20:46:12', '2023-07-20 22:09:22', '1970-01-01 05:30:00'),
(123, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 842, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D5689', 735, 107, 1625, 1518, 1519, 1518, NULL, '2023-07-24 18:20:25', '2023-08-26 23:38:25', NULL),
(124, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 1344, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3237', 1176, 168, 1002, 1170, 1171, 1170, NULL, '2023-07-24 22:11:49', '2023-08-26 23:33:33', NULL),
(127, 19, 5, 'new', '', NULL, NULL, 'SPEC', 'SPEC', NULL, NULL, 368, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D1678', 322, 46, 651, 697, 698, 697, NULL, '2023-07-24 23:19:15', '2023-08-28 18:50:19', NULL),
(151, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 8.5, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D5689', 8, 95, 1730, 1825, 1731, 1730, 1, '2023-08-29 23:53:35', '2023-08-30 23:35:03', NULL),
(128, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 720, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3237', 630, 90, 250, 340, 251, 250, NULL, '2023-07-24 23:23:02', '2023-08-29 23:29:10', NULL),
(129, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 760, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D8589', 665, 95, 1730, 1825, 1730, 1825, NULL, '2023-07-24 23:27:07', '2023-07-25 18:50:10', NULL),
(130, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 496, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3237', 434, 62, 348, 410, 349, 348, NULL, '2023-07-24 23:29:41', '2023-08-29 23:14:11', NULL),
(131, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 624, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3237', 546, 78, 415, 493, 494, 493, NULL, '2023-07-24 23:32:23', '2023-08-30 00:17:06', NULL),
(132, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 1072, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D0784', 938, 134, 1167, 1301, 1168, 1167, NULL, '2023-07-24 23:36:12', '2023-08-30 00:55:14', NULL),
(133, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 1328, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3237', 1162, 166, 173, 339, 340, 339, NULL, '2023-07-24 23:39:04', '2023-08-30 01:55:15', NULL),
(134, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 1536, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D6418', 1344, 192, 404, 596, 404, 596, NULL, '2023-07-25 01:03:16', '2023-07-25 18:48:44', NULL),
(135, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 2184, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D1334', 1911, 273, 974, 1247, 1247, 1247, NULL, '2023-07-25 01:06:48', '2023-09-01 23:16:07', NULL),
(136, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 952, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D1334', 833, 119, 789, 908, 908, 908, NULL, '2023-07-25 01:09:48', '2023-09-01 23:06:05', NULL),
(137, 20, 5, 'new', '', NULL, NULL, 'HARMOY GOLD', 'HARMOY GOLD', NULL, NULL, 864, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D0138', 756, 108, 1555, 1663, 1555, 1663, NULL, '2023-07-25 01:15:54', '2023-07-25 18:48:44', NULL),
(138, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 728, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3994', 637, 91, 46, 137, 46, 137, NULL, '2023-07-25 01:22:58', '2023-07-25 18:48:44', NULL),
(139, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 2424, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D0418', 2121, 303, 609, 912, 609, 912, NULL, '2023-07-25 01:31:33', '2023-07-25 18:48:44', NULL),
(140, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 2320, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D 8368', 2030, 290, 2707, 2997, 2707, 2997, NULL, '2023-07-25 01:35:29', '2023-07-25 18:48:44', NULL),
(141, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 2976, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3614', 2604, 372, 351, 723, 351, 723, NULL, '2023-08-08 21:27:21', '2023-08-08 21:29:45', NULL),
(142, 19, 5, 'new', '', NULL, NULL, 'Hexa gold willett', 'Hexa gold willett', NULL, NULL, 2544, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D6766', 2226, 318, 1431, 1749, 1432, 1431, NULL, '2023-08-25 18:30:57', '2023-08-25 20:46:26', NULL),
(143, 19, 5, 'new', '', NULL, NULL, 'HEXA GOLD WILLETT', 'HEXA GOLD WILLETT', NULL, NULL, 1760, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D7475', 1540, 220, 2001, 2221, 2222, 2221, NULL, '2023-08-26 01:20:53', '2023-08-26 01:38:43', NULL),
(144, 19, 5, 'new', '', NULL, NULL, 'SPEC', 'SPEC', NULL, NULL, 968, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D1678', 847, 121, 529, 650, 651, 650, NULL, '2023-08-26 22:00:09', '2023-08-26 22:21:27', NULL),
(145, 21, 5, 'new', NULL, '97', 'GENERAL ENCLOSER ', 'GENERAL', 'GENERAL', NULL, 350, 400, '97', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-08-26 22:40:31', '2023-08-27 17:49:42', '1970-01-01 05:30:00'),
(146, 21, 5, 'new', NULL, '98', 'GENERAL ENCLOSER ', 'GENERAL', 'GENERAL', NULL, 350, 400, '98', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-08-26 22:40:31', '2023-08-26 23:45:49', '1970-01-01 05:30:00'),
(147, 21, 5, 'new', NULL, '99', 'GENERAL ENCLOSER ', 'GENERAL', 'GENERAL', NULL, 350, 400, '99', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-08-26 22:40:31', '2023-08-26 23:45:49', '1970-01-01 05:30:00'),
(149, 20, 5, 'new', '', NULL, NULL, 'WALLETT', 'WALLETT', NULL, NULL, 224, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D6418', 196, 28, 467, 495, 496, 495, 1, '2023-08-28 17:33:03', '2023-08-28 17:56:39', NULL),
(162, 21, 5, 'new', NULL, '100', 'GENERAL ENCLOSER ', 'GENERAL', 'GENERAL', NULL, 350, 400, '100', 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-09-07 17:07:05', '2023-09-07 17:11:41', '1970-01-01 05:30:00'),
(148, 19, 5, 'new', '', NULL, NULL, 'SPEC', 'SPEC', NULL, NULL, 368, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D1678', 322, 46, 651, 697, 651, 697, 1, '2023-08-27 00:26:08', '2023-08-27 00:28:14', NULL),
(150, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 784, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D5689', 686, 98, 1628, 1726, 1628, 1726, 1, '2023-08-28 17:41:43', '2023-08-28 17:42:27', NULL),
(152, 19, 5, 'new', '', NULL, NULL, 'HEXA GOLD WILLETT', 'HEXA GOLD WILLETT', NULL, NULL, 1496, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D7475', 1309, 187, 1811, 1998, 1999, 1998, 1, '2023-09-01 18:26:06', '2023-09-01 22:18:59', NULL),
(153, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 1720, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D6418', 1505, 215, 689, 904, 905, 904, 1, '2023-09-01 23:31:59', '2023-09-01 23:45:52', NULL),
(154, 20, 5, 'new', '', NULL, NULL, 'WILLETT', 'WILLETT', NULL, NULL, 168, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D6418', 147, 21, 443, 464, 443, 464, 1, '2023-09-03 20:03:25', '2023-09-03 20:09:13', NULL),
(155, 20, 5, 'new', '', NULL, NULL, 'WILLET', 'WILLET', NULL, NULL, 1880, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D8368', 1645, 235, 1799, 2034, 1799, 2034, 1, '2023-09-03 20:07:51', '2023-09-03 20:09:13', NULL),
(156, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 528, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3237', 462, 66, 23, 89, 23, 89, 1, '2023-09-03 20:11:29', '2023-09-03 20:14:12', NULL),
(157, 20, 5, 'new', '', NULL, NULL, 'SCIENTIFIC MEGA BOND', 'SCIENTIFIC MEGA BOND', NULL, NULL, 840, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D0138', 735, 105, 1557, 1662, 1557, 1662, 1, '2023-09-03 20:16:42', '2023-09-03 20:17:36', NULL),
(158, 19, 5, 'new', '', NULL, NULL, 'SPEC', 'SPEC', NULL, NULL, 1368, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D1678', 1197, 171, 225, 396, 226, 225, 1, '2023-09-05 18:54:23', '2023-09-05 19:45:55', NULL),
(159, 20, 5, 'new', '', NULL, NULL, 'WILLETT', 'WILLETT', NULL, NULL, 1088, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D8368', 952, 136, 2799, 2935, 2799, 2935, 1, '2023-09-05 18:59:50', '2023-09-05 19:01:08', NULL),
(160, 19, 5, 'new', '', NULL, NULL, 'POLYWIRES', 'POLYWIRES', NULL, NULL, 528, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D3237', 462, 66, 23, 89, 23, 89, 1, '2023-09-05 19:08:39', '2023-09-05 19:10:30', NULL),
(161, 20, 5, 'new', '', NULL, NULL, 'WILLETT', 'WILLETT', NULL, NULL, 168, NULL, 'employee', 331, 'transferred', NULL, NULL, NULL, NULL, NULL, 'available', NULL, NULL, NULL, 'D6418', 147, 21, 443, 464, 443, 464, 1, '2023-09-05 19:13:59', '2023-09-05 19:14:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slj_stock_product_history`
--

CREATE TABLE `slj_stock_product_history` (
  `id` bigint(20) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_stock_product_history`
--

INSERT INTO `slj_stock_product_history` (`id`, `stock_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'item added', '2020-08-16 14:05:30', '2020-08-16 14:05:30'),
(2, 2, 'item added', '2020-08-16 14:05:30', '2020-08-16 14:05:30'),
(3, 3, 'item added', '2020-08-16 14:05:30', '2020-08-16 14:05:30'),
(4, 4, 'item added', '2020-08-16 14:05:30', '2020-08-16 14:05:30'),
(5, 5, 'item added', '2020-08-16 14:05:30', '2020-08-16 14:05:30'),
(6, 6, 'item added', '2020-08-16 14:05:30', '2020-08-16 14:05:30'),
(7, 7, 'item added', '2022-12-22 23:07:09', '2022-12-22 23:07:09'),
(8, 8, 'item added', '2022-12-22 23:07:09', '2022-12-22 23:07:09'),
(9, 9, 'item added', '2022-12-22 23:07:09', '2022-12-22 23:07:09'),
(10, 10, 'item added', '2022-12-22 23:07:09', '2022-12-22 23:07:09'),
(11, 11, 'item added', '2022-12-22 23:07:09', '2022-12-22 23:07:09'),
(12, 12, 'item added', '2022-12-22 23:07:09', '2022-12-22 23:07:09'),
(13, 16, 'item added', '2023-01-05 21:45:04', '2023-01-05 21:45:04'),
(14, 17, 'item added', '2023-01-05 21:45:04', '2023-01-05 21:45:04'),
(15, 18, 'item added', '2023-01-05 21:45:04', '2023-01-05 21:45:04'),
(16, 19, 'item added', '2023-01-06 17:36:10', '2023-01-06 17:36:10'),
(17, 20, 'item added', '2023-01-06 17:36:10', '2023-01-06 17:36:10'),
(18, 21, 'item added', '2023-01-06 17:36:10', '2023-01-06 17:36:10'),
(19, 22, 'item added', '2023-01-06 17:36:10', '2023-01-06 17:36:10'),
(20, 23, 'item added', '2023-01-06 17:36:10', '2023-01-06 17:36:10'),
(21, 24, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(22, 25, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(23, 26, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(24, 27, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(25, 28, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(26, 29, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(27, 30, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(28, 31, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(29, 32, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(30, 33, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(31, 34, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(32, 35, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(33, 36, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(34, 37, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(35, 38, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(36, 39, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(37, 40, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(38, 41, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(39, 42, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(40, 43, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(41, 44, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(42, 45, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(43, 46, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(44, 47, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(45, 48, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(46, 49, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(47, 50, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(48, 51, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(49, 52, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(50, 53, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(51, 54, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(52, 55, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(53, 56, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(54, 57, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(55, 58, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(56, 59, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(57, 60, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(58, 61, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(59, 62, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(60, 63, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(61, 64, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(62, 65, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(63, 66, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(64, 67, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(65, 68, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(66, 69, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(67, 70, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(68, 71, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(69, 72, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(70, 73, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(71, 74, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(72, 75, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(73, 76, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(74, 77, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(75, 78, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(76, 79, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(77, 80, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(78, 81, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(79, 82, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(80, 83, 'item added', '2023-07-19 18:54:35', '2023-07-19 18:54:35'),
(81, 84, 'item added', '2023-07-19 21:29:08', '2023-07-19 21:29:08'),
(82, 85, 'item added', '2023-07-19 21:29:08', '2023-07-19 21:29:08'),
(83, 86, 'item added', '2023-07-19 21:29:08', '2023-07-19 21:29:08'),
(84, 87, 'item added', '2023-07-19 21:42:09', '2023-07-19 21:42:09'),
(85, 88, 'item added', '2023-07-19 21:42:09', '2023-07-19 21:42:09'),
(86, 89, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(87, 90, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(88, 91, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(89, 92, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(90, 93, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(91, 94, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(92, 95, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(93, 96, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(94, 97, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(95, 98, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(96, 99, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(97, 100, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(98, 101, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(99, 102, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(100, 103, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(101, 104, 'item added', '2023-07-19 21:47:09', '2023-07-19 21:47:09'),
(102, 105, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(103, 106, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(104, 107, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(105, 108, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(106, 109, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(107, 110, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(108, 111, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(109, 112, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(110, 113, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(111, 114, 'item added', '2023-07-19 21:49:48', '2023-07-19 21:49:48'),
(112, 115, 'item added', '2023-07-19 21:52:35', '2023-07-19 21:52:35'),
(113, 116, 'item added', '2023-07-19 21:52:35', '2023-07-19 21:52:35'),
(114, 117, 'item added', '2023-07-19 21:52:35', '2023-07-19 21:52:35'),
(115, 118, 'item added', '2023-07-19 21:52:35', '2023-07-19 21:52:35'),
(116, 119, 'item added', '2023-07-19 21:52:35', '2023-07-19 21:52:35'),
(117, 120, 'item added', '2023-07-19 21:55:13', '2023-07-19 21:55:13'),
(118, 121, 'item added', '2023-07-19 21:56:56', '2023-07-19 21:56:56'),
(119, 122, 'item added', '2023-07-20 20:46:12', '2023-07-20 20:46:12'),
(120, 145, 'item added', '2023-08-26 22:40:31', '2023-08-26 22:40:31'),
(121, 146, 'item added', '2023-08-26 22:40:31', '2023-08-26 22:40:31'),
(122, 147, 'item added', '2023-08-26 22:40:31', '2023-08-26 22:40:31'),
(123, 162, 'item added', '2023-09-07 17:07:05', '2023-09-07 17:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `slj_subdistributors`
--

CREATE TABLE `slj_subdistributors` (
  `id` int(11) NOT NULL,
  `subdistributor_id` varchar(11) NOT NULL,
  `subdistributor_name` varchar(255) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `area_description` varchar(200) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `rent` int(11) DEFAULT NULL,
  `long_lat` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bank_account` varchar(30) DEFAULT NULL,
  `bank_holder_name` varchar(200) DEFAULT NULL,
  `ifsc_code` varchar(30) DEFAULT NULL,
  `bank_branch_name` varchar(200) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_subdistributors`
--

INSERT INTO `slj_subdistributors` (`id`, `subdistributor_id`, `subdistributor_name`, `office_address`, `area_description`, `city`, `rent`, `long_lat`, `user_id`, `bank_account`, `bank_holder_name`, `ifsc_code`, `bank_branch_name`, `bank_name`, `created_at`, `updated_at`) VALUES
(3, 'SLJDR00001', 'Prathipadu', '12345678', 'Prathipadu constency', 1, 16000, '16.3404422,80.4359842', 210, '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'LVB Bank', '2020-08-03 11:20:45', '2020-08-03 11:20:45'),
(5, 'SLJDR00003', 'Guntur East', 'SLJ FIBER NETWORKS PVT.LTD', 'Guntur East Assambly Constitution', 1, 16000, '16.3122746,80.4346877', 317, '08630000005480', 'Sammeta Venkata Ramana Prasad', 'LAVB0000408', 'Lakshmipuram', 'Lakshmi villas Bank', '2023-01-21 12:55:28', '2023-01-21 12:55:28'),
(6, 'SLJDR00004', 'Prathipadu', 'Annapurna Nagar West', 'Prathipadu Constency', 1, 4000, '16.335825319390914, 80.43873540447942', 340, '12346796789', 'Balakoti Reddy', 'SBI12345678', 'Gorantla', 'SBI Bank', '2023-10-15 19:38:07', '2023-10-15 19:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `slj_txns`
--

CREATE TABLE `slj_txns` (
  `id` bigint(20) NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user id of whom transaction is made',
  `payment_from` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1-Branch,2-Franchise,3-Customer,4-Slj',
  `amount` float NOT NULL,
  `payment_mode` varchar(25) NOT NULL,
  `cheque_no` varchar(50) DEFAULT NULL,
  `issuing_bank_name` varchar(250) DEFAULT NULL,
  `issuing_date` timestamp NULL DEFAULT NULL,
  `branch` varchar(500) DEFAULT NULL,
  `payment_source` varchar(100) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  `payment_flow_type` int(11) DEFAULT NULL,
  `payment_message` varchar(300) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_txns`
--

INSERT INTO `slj_txns` (`id`, `txnid`, `user_id`, `payment_from`, `amount`, `payment_mode`, `cheque_no`, `issuing_bank_name`, `issuing_date`, `branch`, `payment_source`, `payment_type`, `payment_flow_type`, `payment_message`, `status`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, '', 355, 3, 5949, 'Cash', NULL, NULL, NULL, NULL, NULL, 'new', 1, '3__3__4949', 'success', 3, '2023-11-13 01:59:16', '2023-11-13 01:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `slj_utlity_cat`
--

CREATE TABLE `slj_utlity_cat` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_utlity_cat`
--

INSERT INTO `slj_utlity_cat` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Furniture', '2023-06-10 13:25:09', '2023-06-10 13:25:09'),
(3, 'Electronics', '2023-06-13 10:16:36', '2023-06-13 10:16:36'),
(4, 'Electrical', '2023-06-27 10:53:35', '2023-06-27 10:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `slj_vendors`
--

CREATE TABLE `slj_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'v',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slj_vendors`
--

INSERT INTO `slj_vendors` (`id`, `type`, `company_name`, `contact_name`, `email`, `mobile`, `landline`, `address`, `notes`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vendor', 'Syroteck', 'Shaker Mittal', 'shekhar.mittal@goip.in', '9888352622', NULL, 'Delhi', NULL, '', 'Y', '2020-08-12 23:42:56', '2020-08-12 23:42:56'),
(2, 'vendor', 'ZTT', 'Arun kumar', 'arunkumar@zttcable.com', '8897537866', NULL, '956 Jeedi Drive, Sector 28, Sri City,  Satyavedu mandal, Chittor District, A.P.-517588', NULL, '', 'Y', '2021-04-12 01:25:28', '2021-04-12 01:25:28'),
(3, 'supplier', 'Naresh Technologies', 'Naresh', 'naresh.naresh@gmail.com', '9494442231', NULL, 'Mehadhipatnam, Hyderabad', NULL, '', 'Y', '2023-01-05 21:34:21', '2023-01-05 21:34:21'),
(4, 'supplier', 'Chandana Electronics', 'Satyanaryana', 'chandanaelectronics@gmail.com', '9298302960', NULL, 'Chandana Electronics, NTR Complex, Vijayawada', NULL, '', 'Y', '2023-07-19 17:58:37', '2023-07-19 17:58:37'),
(5, 'supplier', 'SLJ FIBER NETWORKS', 'RAMANA PRASAD', 'ramana6666@gmail.com', '8885638989', NULL, '5th Line Naidupeta, Sakethpuram,Koritepadu,\r\nGuntur-2.', NULL, '', 'Y', '2023-07-24 18:18:23', '2023-07-24 18:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `slj_warehouses`
--

CREATE TABLE `slj_warehouses` (
  `id` int(11) NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slj_warehouses`
--

INSERT INTO `slj_warehouses` (`id`, `warehouse_name`, `city`, `address`, `description`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Guntur Warehouse', 1, 'Road No.4a', 'dsa dsadas1', '17.5213178', '78.382494', 'Y', '2020-08-16 14:06:06', '2020-08-16 14:06:06'),
(2, 'HYD Warehouse', 1, 'Addagutta', 'adda guttta socity', '17.504715665555224', '78.39584112167358', 'Y', '2021-04-12 01:31:56', '2021-04-12 01:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `splitter_data`
--

CREATE TABLE `splitter_data` (
  `id` int(11) NOT NULL,
  `franch` int(11) DEFAULT NULL,
  `seriatype` varchar(12) DEFAULT NULL,
  `serial_no` varchar(12) DEFAULT NULL,
  `type` varchar(34) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `splitter_data`
--

INSERT INTO `splitter_data` (`id`, `franch`, `seriatype`, `serial_no`, `type`, `created_at`, `updated_at`) VALUES
(1, 21, '8', '61', 'dp', '2023-08-27 16:11:06', '2023-08-27 16:34:12'),
(2, 21, '8', '62', 'dp', '2023-08-27 16:33:59', '2023-08-27 16:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `mobile`, `password`, `status`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(2, 'Srinivas', 'Srinivas', NULL, NULL, 'srinivas@gmail.com', NULL, NULL, '$2a$12$EWX8VMqkTQ0SvzVOsI68m.jlFJIDzfa39u9250MW/iZ0OmcjawVlq', 'Y', 'SGbnFoENOkL4tB3toJcUJaRERIBLcwcHPBjG2KhiabWsNa5mg155Wnu40IAu', '2024-03-29 07:05:45', '2019-05-25 15:58:34', '2024-03-29 07:05:45'),
(312, '8885368989', '8885368989', '', NULL, 'ramana16@gmail.com', NULL, '8885368989', '$2y$10$EPqjAK7bRGHCPql5/TtzBOaHl6G1o.e604ze1mk5B7XJLpHV4P0K.', 'Y', NULL, NULL, '2023-01-22 00:54:13', '2023-01-22 00:54:13'),
(313, 'Ramana prasadsammeta', 'Ramana prasadsammeta', NULL, NULL, 'sljfibernet3@gmail.com', NULL, '8885368989', '$2y$10$d4eRA6jkoYD1DzCmF7oveOH3PWFMLUZYAzpA4LS5RZ4OAkrBKkTJa', 'Y', NULL, NULL, '2023-01-22 01:04:01', '2023-01-22 01:04:01'),
(314, 'Ramana', 'Ramana', NULL, NULL, 'sljfiber6@gmail.com', NULL, '9490222823', '$2y$10$ZskY3W99AOi4nU9FNSPBHextMO61qTR2vL13kQvt.lWQqWS5QNAyi', 'Y', NULL, NULL, '2023-01-22 01:08:54', '2023-01-22 01:08:54'),
(315, 'Ramana prasadsammeta', 'Ramana prasadsammeta', '', NULL, 'ramana19@gmail.com', NULL, '8885368989', '$2y$10$l6Oup0y8Zwh3dldrBb7vkee1O18gyNqWk2Pn.hA9ZB6yMOR2V2Fm6', 'Y', NULL, NULL, '2023-01-22 01:13:10', '2023-01-22 01:13:10'),
(316, 'Ramana', 'Ramana', '', NULL, 'ramana20@gmail.com', NULL, '8885368989', '$2y$10$ZW7D2rtvnSBg5vCL5dtj7.UZ.IbOJC/J1AK78nBpjxRhctpE/19nS', 'Y', NULL, NULL, '2023-01-22 01:15:03', '2023-01-22 01:15:03'),
(317, 'SLJ Fiber', 'SLJ Fiber', NULL, NULL, 'sljfibernet1@gmail.com', NULL, '8885368989', '$2y$10$eHntuBZzyd7qauZ1UmSTvecW1DwUKIPFemDu/CwWoQTSw3JyAjnRi', 'Y', NULL, NULL, '2023-01-22 01:25:28', '2023-01-22 01:25:28'),
(318, 'RAMANA', 'RAMANA', NULL, NULL, 'sljfiber1@gmail.com', NULL, '8885368989', '$2y$10$nYEt91xc0Ky3Ryb7QH5p8.cVGZvoKAcBk6C8N5r7C.taoaMfY3EtO', 'Y', NULL, NULL, '2023-01-22 01:29:23', '2023-01-22 01:29:23'),
(319, 'ramana Sammeta', 'ramana Sammeta', '', NULL, 'ramana1@gmail.com', NULL, '9492314485', '$2y$10$2nhZbG5AjHFKrn07MhYlr..N3EZ192eyWepK8XnJl4OOEU7xtBaZa', 'Y', NULL, NULL, '2023-01-22 02:23:32', '2023-01-22 02:23:32'),
(320, 'Ramana', 'Ramana', '', NULL, 'ramana2@gmail.com', NULL, '9492314485', '$2y$10$8Ax4H.psVsfhUHIxbB1vOuZajh4tF.nLr.XQnHKX2C9d6UyudOrPK', 'Y', NULL, NULL, '2023-01-22 02:26:36', '2023-01-22 02:26:36'),
(321, 'Ramana', 'Ramana', '', NULL, 'ramana3@gmail.com', NULL, '9492314485', '$2y$10$npBxFYd6h1T.VKvui7rY.e7GG/93FvaoWlMg8YCos1VxgG/9/QFLG', 'Y', NULL, NULL, '2023-01-22 02:28:49', '2023-01-22 02:28:49'),
(322, 'Ramana', 'Ramana', '', NULL, 'ramana4@gmail.com', NULL, '9492314485', '$2y$10$6AgqMn6LQgtCVhenGl0Vv.fqyrAz4tFHxmIlEg70H1rYxZbZITQTK', 'Y', NULL, NULL, '2023-01-22 02:31:07', '2023-01-22 02:31:07'),
(323, 'Ramana', 'Ramana', '', NULL, 'ramana5@gmail.com', NULL, '9492314485', '$2y$10$lir1ZlqWCDlrBv0s84z3m.4VS/DYZclZ.10Wa1ED2Phq1JRPUyfOq', 'Y', NULL, NULL, '2023-01-22 02:32:53', '2023-01-22 02:32:53'),
(324, 'Ramana Prasad Sammeta', 'Ramana Prasad Sammeta', '', NULL, 'ramana10@gmail.com', NULL, '9912270722', '$2y$10$36ciR/2WqXCc9EnLREpKm.VnaoPdib/Pf9YBtFKsi2ShjZMljIHaC', 'Y', NULL, NULL, '2023-01-22 02:35:21', '2023-01-22 02:35:21'),
(328, 'Venkata', 'Ramana Prasad', 'Sammeta', NULL, 'e-ramana6666@gmail.com', NULL, '8885368989', '$2y$10$k4WJ3mR25qwuQ2oAr8N97u7dw2FijWd6A2PTM75f6r2PE80RgYNpW', 'Y', NULL, '2023-03-05 01:49:47', '2023-03-05 01:27:00', '2023-03-05 01:49:47'),
(330, 'Shaik-Mahabbii', 'Mahabbi', 'Shaik', 'EID00003', 'e-mahabbishaik33@gmail.com', NULL, '9346542960', '$2y$10$jEqp/ENOZW4kz0qUcZei.uRaBb9uLM81aH.RFjXadxGvd9LGPy5UK', 'Y', NULL, '2023-09-07 16:52:05', '2023-07-15 07:18:00', '2023-09-07 16:52:05'),
(331, 'Velisela-Naveen-Kumar', 'Naveen-Kumar', 'Velisela', 'EID00004', 'e-velnaveen97@gmail.com', NULL, '9703644447', '$2y$10$sHIaULvynw8VBJc4Qa6i7ucQfwqjkcac7tctGEkaoAUruaP3vXbnC', 'Y', 'nH8zA7ubwuEyLcfnFu5Lery8UMSsKdfAf7Hb8Zw6cf9avdIiJvZKIe07aS8p', '2024-02-11 17:32:29', '2023-07-20 07:55:37', '2024-02-11 17:32:29'),
(334, 'Himabindu', 'Bindu', 'Velagalati', 'EID00005', 'e-bindu.velagaleti92@gmail.com', NULL, '7702670164', '$2y$10$eQ4M3mTZZFZa/L1OAG4kE.vxyXkm02wgxprsHARfTmF0fAzAhmzmO', 'N', NULL, '2023-08-29 19:16:45', '2023-08-29 19:09:58', '2023-12-17 23:07:17'),
(335, 'Swapna', 'Swapna', 'Kota', 'EID00008', 'e-sales@sljfibernetworks.com', NULL, '8977422661', '$2y$10$D1iGUnTCe9Z0.pWahXP.6uMYOi99ha8S.kC0VRvAp8xOPY8YcRJfi', 'Y', NULL, '2023-11-13 17:12:12', '2023-09-07 22:29:02', '2023-11-13 17:12:12'),
(339, 'Thivari Lokeswar prasad', 'Thivari', 'Lokeswar prasad', NULL, 'kiranbhargavdurgaprasad@gmail.com', NULL, '996341424', '', 'N', NULL, NULL, '2023-09-09 22:03:57', '2023-09-09 22:03:57'),
(340, 'Ramana Prasad', 'Ramana Prasad', NULL, NULL, 'ramana6666@gmail.com', NULL, '8885368989', '$2y$10$QtTrB1mAjLoQrvlub3pJuuUqHG1ws7loK8mdNy7gD3.EWULxn.Htm', 'Y', NULL, NULL, '2023-10-16 01:08:07', '2023-10-16 01:08:07'),
(342, 'Sammeta Venkata Ramana Prasad', 'Sammeta Venkata Ramana Prasad', NULL, NULL, 'ramana6@gmail.com', NULL, '8885368989', '$2y$10$ILksmT8aopKQqIL8XBDev.mBTPzpcchm.4HSV4W11CIJ1OAGeExAW', 'Y', NULL, NULL, '2023-10-16 01:14:44', '2023-10-16 01:14:44'),
(343, 'RAMANA', 'RAMANA', '', NULL, 'ramana7@gmail.com', NULL, '8885368989', '$2y$10$j3NVbismLe1.BZEHoN2eoejAMoxbxoP2DQAebja/a9tWcIi2v1XFq', 'Y', NULL, NULL, '2023-10-16 01:19:09', '2023-10-16 01:19:09'),
(348, 'Udaykiran', 'Udaykiran', 'Mirapalli', 'EID00009', 'e-udaykiran.mirapalli@gmail.com', NULL, '9100453294', '$2y$10$CuHnoyIu1Pv6R2.yvcRA.u7S5dUXDv93sSqsAlIBqOzoAup.HmdsS', 'N', NULL, '2023-11-06 15:09:56', '2023-11-05 04:41:33', '2023-12-17 23:06:59'),
(349, 'Ramana', 'Ramana', '', NULL, 'ramana71@gmail.com', NULL, '88181818111', '$2y$10$15T79VRaWBNbT41WqKlnv./OkHj1ewuzVxKbZCjTEVLPkNcvLjGse', 'Y', NULL, NULL, '2023-11-05 04:44:38', '2023-11-05 04:44:38'),
(350, 'Rajesh', 'Vasimalla', 'Vasimalla', 'EID00014', 'e-vasimalla.rajesh@gmail.com', NULL, '9959657647', '$2y$10$qL6nsPdNSQlwDbSZrPTPDuvuxrAk/3UEUwxePbI7vki7x3k8mMxkC', 'N', '70qTvhykRZ0XHa4YpykORkxpZ09GYY2HpomPc6UTgojQVBXguz06x6kOxLa8', '2023-11-13 02:03:36', '2023-11-10 19:47:09', '2023-11-13 17:18:46'),
(351, 'Ramana', 'Ramana', NULL, NULL, 'sljfiber2@gmail.com', NULL, '9492314485', '$2y$10$AIZzjp9YDRLiMAmXShHBZ.nDB4GhiNBdfnSAFgXUpq4NS74i3r9gq', 'Y', NULL, NULL, '2023-11-11 00:39:26', '2023-11-11 00:39:26'),
(352, 'Ramana', 'Ramana', '', NULL, 'ramana73@gmail.com', NULL, '8885368989', '$2y$10$VmNeh2VocpbVqrft0B82F.4yuQS5FfX21BUgP1S3F5LeQffJjKeAm', 'Y', NULL, NULL, '2023-11-11 00:42:32', '2023-11-11 00:42:32'),
(353, 'Syam', 'Syam', 'Javallamudi', 'EID00015', 'e-ssr092501@gmail.com', NULL, '9550170769', '$2y$10$u7wUFuXkXMcZbtnZojDs5.8yEEfxgrD5M75QKhNOj5/RrJ10MDmRW', 'Y', NULL, '2024-02-11 17:59:43', '2023-11-11 02:13:34', '2024-02-11 17:59:43'),
(354, 'Ramana', 'Ramana', '', NULL, 'ramana66@gmail.com', NULL, '8885368989', '$2y$10$hhKGHBfoKYyVlnjlGX6XK.xfye5zToqRuhSygXkOCr3NlEwirLsC2', 'Y', NULL, NULL, '2023-11-11 06:00:11', '2023-11-11 06:00:11'),
(355, 'Brahmareddy Kandhula', 'Brahmareddy', 'Kandhula', NULL, 'brahmareddy.finrelevant@gmail.com', NULL, '7680081678', '', 'N', NULL, NULL, '2023-11-13 01:59:04', '2023-11-13 01:59:04'),
(356, 'Sammeta Venkata Ramana Prasad', 'Sammeta Venkata Ramana Prasad', '', NULL, 'ramana15@gmail.com', NULL, '08885368989', '$2y$10$7xHTXhsCpa0FoD0NLENPEOhVALFZmSeKzzs7zHA4J.0t6m8fpy396', 'Y', NULL, NULL, '2024-02-17 18:59:09', '2024-02-17 18:59:09'),
(357, 'aa', 'aa', NULL, NULL, 'sai@gmail.com', NULL, '7777722223', '$2y$10$RE15eqMxy84pWHaMHUI9nuuL4c4ZK1JPhmbVW6Fkucb3Kybl9qxua', 'Y', NULL, NULL, '2024-03-18 23:40:14', '2024-03-18 23:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_lead`
--
ALTER TABLE `add_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_payments`
--
ALTER TABLE `branch_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payments`
--
ALTER TABLE `customer_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_id_index` (`user_id`);

--
-- Indexes for table `franch_payments`
--
ALTER TABLE `franch_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipaddress`
--
ALTER TABLE `ipaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ippool`
--
ALTER TABLE `ippool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_copy`
--
ALTER TABLE `permissions_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_has_permissions_copy`
--
ALTER TABLE `role_has_permissions_copy`
  ADD PRIMARY KEY (`permission_id`,`role_id`);

--
-- Indexes for table `slj_bankaccounts`
--
ALTER TABLE `slj_bankaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_branches`
--
ALTER TABLE `slj_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_distributors_fk_idx` (`distributor_id`);

--
-- Indexes for table `slj_broadband_packages`
--
ALTER TABLE `slj_broadband_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_broadband_subpackages`
--
ALTER TABLE `slj_broadband_subpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_cable_packages`
--
ALTER TABLE `slj_cable_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_cities`
--
ALTER TABLE `slj_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_combo_packages`
--
ALTER TABLE `slj_combo_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_combo_subpackages`
--
ALTER TABLE `slj_combo_subpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_competators`
--
ALTER TABLE `slj_competators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_complaints`
--
ALTER TABLE `slj_complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_complaint_types`
--
ALTER TABLE `slj_complaint_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_connection_types`
--
ALTER TABLE `slj_connection_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `slj_customers`
--
ALTER TABLE `slj_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_departments`
--
ALTER TABLE `slj_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `slj_deposits`
--
ALTER TABLE `slj_deposits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `slj_designations`
--
ALTER TABLE `slj_designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_departmentdesignation` (`department`);

--
-- Indexes for table `slj_distributors`
--
ALTER TABLE `slj_distributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_city_fk_idx` (`city`);

--
-- Indexes for table `slj_dp`
--
ALTER TABLE `slj_dp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_fiber_laying_olt_fk_idx` (`olt_id`);

--
-- Indexes for table `slj_dpd`
--
ALTER TABLE `slj_dpd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_fiber_laying_fk_idx` (`fiber`);

--
-- Indexes for table `slj_edfa`
--
ALTER TABLE `slj_edfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_emailverification`
--
ALTER TABLE `slj_emailverification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_employees`
--
ALTER TABLE `slj_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_fh`
--
ALTER TABLE `slj_fh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sslj_fiber_laying_fh_fk_idx` (`fiber`),
  ADD KEY `slj_olt_fh_fk_idx` (`olt_id`),
  ADD KEY `slj_franchise_fh_fk_idx` (`franchise`);

--
-- Indexes for table `slj_fiberlaying_stock`
--
ALTER TABLE `slj_fiberlaying_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_fiber_laying`
--
ALTER TABLE `slj_fiber_laying`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_franchise_fk_idx` (`franchise`);

--
-- Indexes for table `slj_franchises`
--
ALTER TABLE `slj_franchises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_branches_fk_idx` (`branch`);

--
-- Indexes for table `slj_invoices`
--
ALTER TABLE `slj_invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `slj_iptv_packages`
--
ALTER TABLE `slj_iptv_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_items_sales`
--
ALTER TABLE `slj_items_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_logs`
--
ALTER TABLE `slj_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_olt`
--
ALTER TABLE `slj_olt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_branch_fk_idx` (`branch`);

--
-- Indexes for table `slj_olt_ports`
--
ALTER TABLE `slj_olt_ports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slj_olt_fk_idx` (`olt_id`);

--
-- Indexes for table `slj_opt`
--
ALTER TABLE `slj_opt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_payment_details`
--
ALTER TABLE `slj_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_payment_type`
--
ALTER TABLE `slj_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_poles`
--
ALTER TABLE `slj_poles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_products`
--
ALTER TABLE `slj_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_product_categories`
--
ALTER TABLE `slj_product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `slj_purchase_order`
--
ALTER TABLE `slj_purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `slj_renewuser_invoices`
--
ALTER TABLE `slj_renewuser_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`renew_id`);

--
-- Indexes for table `slj_renew_user_history`
--
ALTER TABLE `slj_renew_user_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_stock_history`
--
ALTER TABLE `slj_stock_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_stock_items`
--
ALTER TABLE `slj_stock_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_stock_products`
--
ALTER TABLE `slj_stock_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_stock_product_history`
--
ALTER TABLE `slj_stock_product_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_txns`
--
ALTER TABLE `slj_txns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_flow_type` (`payment_flow_type`);

--
-- Indexes for table `slj_utlity_cat`
--
ALTER TABLE `slj_utlity_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_vendors`
--
ALTER TABLE `slj_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slj_warehouses`
--
ALTER TABLE `slj_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `splitter_data`
--
ALTER TABLE `splitter_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_lead`
--
ALTER TABLE `add_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;

--
-- AUTO_INCREMENT for table `branch_payments`
--
ALTER TABLE `branch_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_payments`
--
ALTER TABLE `customer_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franch_payments`
--
ALTER TABLE `franch_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipaddress`
--
ALTER TABLE `ipaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ippool`
--
ALTER TABLE `ippool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT for table `permissions_copy`
--
ALTER TABLE `permissions_copy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slj_bankaccounts`
--
ALTER TABLE `slj_bankaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slj_branches`
--
ALTER TABLE `slj_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slj_broadband_packages`
--
ALTER TABLE `slj_broadband_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slj_broadband_subpackages`
--
ALTER TABLE `slj_broadband_subpackages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `slj_cable_packages`
--
ALTER TABLE `slj_cable_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `slj_cities`
--
ALTER TABLE `slj_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slj_combo_packages`
--
ALTER TABLE `slj_combo_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slj_combo_subpackages`
--
ALTER TABLE `slj_combo_subpackages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `slj_competators`
--
ALTER TABLE `slj_competators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slj_complaints`
--
ALTER TABLE `slj_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slj_complaint_types`
--
ALTER TABLE `slj_complaint_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slj_connection_types`
--
ALTER TABLE `slj_connection_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slj_customers`
--
ALTER TABLE `slj_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slj_departments`
--
ALTER TABLE `slj_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slj_deposits`
--
ALTER TABLE `slj_deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slj_designations`
--
ALTER TABLE `slj_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slj_distributors`
--
ALTER TABLE `slj_distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slj_dp`
--
ALTER TABLE `slj_dp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slj_dpd`
--
ALTER TABLE `slj_dpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slj_edfa`
--
ALTER TABLE `slj_edfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slj_emailverification`
--
ALTER TABLE `slj_emailverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `slj_employees`
--
ALTER TABLE `slj_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slj_fh`
--
ALTER TABLE `slj_fh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slj_fiberlaying_stock`
--
ALTER TABLE `slj_fiberlaying_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `slj_fiber_laying`
--
ALTER TABLE `slj_fiber_laying`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slj_franchises`
--
ALTER TABLE `slj_franchises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `slj_invoices`
--
ALTER TABLE `slj_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slj_iptv_packages`
--
ALTER TABLE `slj_iptv_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `slj_items_sales`
--
ALTER TABLE `slj_items_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slj_logs`
--
ALTER TABLE `slj_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1371;

--
-- AUTO_INCREMENT for table `slj_olt`
--
ALTER TABLE `slj_olt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slj_olt_ports`
--
ALTER TABLE `slj_olt_ports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slj_opt`
--
ALTER TABLE `slj_opt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slj_payment_details`
--
ALTER TABLE `slj_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slj_payment_type`
--
ALTER TABLE `slj_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slj_poles`
--
ALTER TABLE `slj_poles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `slj_products`
--
ALTER TABLE `slj_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slj_product_categories`
--
ALTER TABLE `slj_product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slj_purchase_order`
--
ALTER TABLE `slj_purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slj_renewuser_invoices`
--
ALTER TABLE `slj_renewuser_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slj_renew_user_history`
--
ALTER TABLE `slj_renew_user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slj_stock_history`
--
ALTER TABLE `slj_stock_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `slj_stock_items`
--
ALTER TABLE `slj_stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `slj_stock_products`
--
ALTER TABLE `slj_stock_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `slj_stock_product_history`
--
ALTER TABLE `slj_stock_product_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `slj_txns`
--
ALTER TABLE `slj_txns`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slj_utlity_cat`
--
ALTER TABLE `slj_utlity_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slj_vendors`
--
ALTER TABLE `slj_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slj_warehouses`
--
ALTER TABLE `slj_warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `splitter_data`
--
ALTER TABLE `splitter_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slj_branches`
--
ALTER TABLE `slj_branches`
  ADD CONSTRAINT `slj_distributors_fk` FOREIGN KEY (`distributor_id`) REFERENCES `slj_distributors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_designations`
--
ALTER TABLE `slj_designations`
  ADD CONSTRAINT `FK_departmentdesignation` FOREIGN KEY (`department`) REFERENCES `slj_departments` (`id`);

--
-- Constraints for table `slj_distributors`
--
ALTER TABLE `slj_distributors`
  ADD CONSTRAINT `slj_city_fk` FOREIGN KEY (`city`) REFERENCES `slj_cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_dp`
--
ALTER TABLE `slj_dp`
  ADD CONSTRAINT `slj_fiber_laying_olt_fk` FOREIGN KEY (`olt_id`) REFERENCES `slj_olt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_dpd`
--
ALTER TABLE `slj_dpd`
  ADD CONSTRAINT `slj_fiber_laying_fk` FOREIGN KEY (`fiber`) REFERENCES `slj_fiber_laying` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_fh`
--
ALTER TABLE `slj_fh`
  ADD CONSTRAINT `slj_fiber_laying_fh_fk` FOREIGN KEY (`fiber`) REFERENCES `slj_fiber_laying` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slj_franchise_fh_fk` FOREIGN KEY (`franchise`) REFERENCES `slj_franchises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slj_olt_fh_fk` FOREIGN KEY (`olt_id`) REFERENCES `slj_olt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_fiber_laying`
--
ALTER TABLE `slj_fiber_laying`
  ADD CONSTRAINT `slj_franchise_fiber_laying_fk` FOREIGN KEY (`franchise`) REFERENCES `slj_franchises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_franchises`
--
ALTER TABLE `slj_franchises`
  ADD CONSTRAINT `slj_branches_fk` FOREIGN KEY (`branch`) REFERENCES `slj_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_olt`
--
ALTER TABLE `slj_olt`
  ADD CONSTRAINT `slj_branch_fk` FOREIGN KEY (`branch`) REFERENCES `slj_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_olt_ports`
--
ALTER TABLE `slj_olt_ports`
  ADD CONSTRAINT `slj_olt_fk` FOREIGN KEY (`olt_id`) REFERENCES `slj_olt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slj_renewuser_invoices`
--
ALTER TABLE `slj_renewuser_invoices`
  ADD CONSTRAINT `id` FOREIGN KEY (`renew_id`) REFERENCES `slj_renew_user_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
