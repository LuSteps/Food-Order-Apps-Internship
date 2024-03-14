-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 09:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'admin@gmail.com', 'Admin123.', 'Admin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `Sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_by`, `created_date`, `modified_by`, `modified_date`, `Sort`) VALUES
(1, 'Daily Set', NULL, NULL, NULL, NULL, 0),
(2, 'Soup', NULL, NULL, NULL, NULL, 0),
(3, 'Pasta', NULL, NULL, NULL, NULL, 0),
(4, 'Breakfast and Stall', NULL, NULL, NULL, NULL, 0),
(5, 'Protein (Chicken)', NULL, NULL, 1, '2024-01-16 05:13:29', 0),
(6, 'Protein (Fish)', 1, '2024-01-16 11:13:49', NULL, NULL, 0),
(7, 'Protein (Seafood)', 1, '2024-01-16 11:13:59', NULL, NULL, 0),
(8, 'Protein (Beef)', 1, '2024-01-16 11:14:06', NULL, NULL, 0),
(9, 'Side dish', NULL, NULL, NULL, NULL, 0),
(10, 'Vegetables', NULL, NULL, NULL, NULL, 0),
(11, 'tes', 1, '2024-02-20 14:17:19', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(3) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `date`, `description`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, '2023-10-08', 'Independence day', NULL, NULL, NULL, NULL),
(2, '2023-10-14', 'Another holiday', NULL, NULL, NULL, NULL),
(3, '2024-01-01', 'Public Holiday (New Year)', NULL, NULL, NULL, NULL),
(4, '2024-01-02', 'Semester 1 Vacaation', NULL, NULL, NULL, NULL),
(5, '2024-01-03', 'Semester 1 Vacation', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `Link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category_id`, `name`, `created_by`, `created_date`, `modified_by`, `modified_date`, `Link`) VALUES
(1, 2, 'Sausage and corn soup (Sup Sosis & Jagung)\r\n', NULL, NULL, NULL, NULL, ''),
(2, 2, 'Miso soup (Sup Miso)\r\n', NULL, NULL, NULL, NULL, ''),
(3, 2, 'Macaroni and vegetable soup (Sup Makaroni & Sayuran)\r\n', NULL, NULL, NULL, NULL, ''),
(4, 2, 'Chicken and skin bean curd soup (Sup Ayam & Kulit Tahu)\r\n', NULL, NULL, NULL, NULL, ''),
(5, 2, 'Red bean soup and carrot (Sup Kacang Merah & Wortel)\r\n', NULL, NULL, NULL, NULL, ''),
(6, 2, 'Meatball and bean curd soup (Sup Bakso dan Tahu)\r\n', NULL, NULL, NULL, NULL, 'https://img-global.cpcdn.com/recipes/bdee0521443e5606/680x482cq70/sup-bakso-tahu-goreng-super-simple-foto-resep-utama.jpg'),
(7, 2, 'Clear corn soup (Sup Jagung)\r\n', NULL, NULL, NULL, NULL, ''),
(8, 2, 'Vegetable soup (Sup Sayur)\r\n', NULL, NULL, NULL, NULL, ''),
(9, 2, 'Chicken ball soup (Sup Baso Ayam)\r\n', NULL, NULL, NULL, NULL, ''),
(10, 2, 'Spinach and corn soup (Sup Bayam & Jagung)\r\n', NULL, NULL, NULL, NULL, ''),
(11, 2, 'Sausage & vegetable soup (Sop Sosis & Sayuran)\r\n', NULL, NULL, NULL, NULL, ''),
(12, 2, 'Creamy Corn Soup (Sop Jagung Creamy)\r\n', NULL, NULL, NULL, NULL, ''),
(13, 2, 'Fish ball soup (Sop Baso ikan)\r\n', NULL, NULL, NULL, NULL, ''),
(14, 2, 'Macaroni and chicken soup (Sup Makaroni & Ayam)\r\n', NULL, NULL, NULL, NULL, ''),
(15, 2, 'Chicken and vegetable soup (Sup Ayam & Sayuran)\r\n', NULL, NULL, NULL, NULL, ''),
(16, 2, 'Clear chicken soup (Sup Ayam)\r\n', NULL, NULL, NULL, NULL, ''),
(17, 2, 'Kimlo Soup (Sup Kimlo)\r\n', NULL, NULL, NULL, NULL, ''),
(18, 2, 'Pumpkin Soup (Sup Labu Kuning)\r\n', NULL, NULL, NULL, NULL, ''),
(19, 2, 'Mushroom cream soup (Sup Jamur Creamy)\r\n', NULL, NULL, NULL, NULL, ''),
(20, 2, 'Tomato Soup (Sup Tomat)\r\n', NULL, NULL, NULL, NULL, ''),
(21, 2, 'Crabstick soup (Sup Kepiting)\r\n', NULL, NULL, NULL, NULL, ''),
(22, 10, 'Sauteed broccolli and carrot (Tumis Brokoli dan Wortel)\r\n', NULL, NULL, NULL, NULL, ''),
(23, 10, 'Sauteed green bean (Tumis Buncis)\r\n', NULL, NULL, NULL, NULL, ''),
(24, 10, 'Potato and carrot curry (Kari Kentang dan Wortel)\r\n', NULL, NULL, NULL, NULL, ''),
(25, 10, 'Sauteed pok choy (Tumis Pok Choy)\r\n', NULL, NULL, NULL, NULL, ''),
(26, 10, 'Sauteed squash with egg (Tumis Labu dengan Telor)', NULL, NULL, NULL, NULL, ''),
(27, 10, 'Sauteed caisim with bean curd (Tumis Caisim dan Tahu)\r\n', NULL, NULL, NULL, NULL, ''),
(28, 10, 'Sauteed mix vegetable (Tumis Sayuran)\r\n', NULL, NULL, NULL, NULL, ''),
(29, 10, 'Sauteed green bean with oyster sauce (Tumis Buncis dengan Saus Tiram)\r\n', NULL, NULL, NULL, NULL, ''),
(30, 10, 'Japchae\r\n', NULL, NULL, NULL, NULL, ''),
(31, 10, 'Sauteed green bean with Sechuan sauce (Tumis Buncis dengan Saus Sechuan)\r\n', NULL, NULL, NULL, NULL, ''),
(32, 10, 'Sauteed cauliflower and carrot (Tumis Kembang Kol dan Wortel)\r\n', NULL, NULL, NULL, NULL, ''),
(33, 10, 'Sauteed squash (Tumis Labu)\r\n', NULL, NULL, NULL, NULL, ''),
(34, 10, 'Yellow pickle (Acar Kuning)\r\n', NULL, NULL, NULL, NULL, ''),
(35, 10, 'Sauteed caisim with oyster sauce \r\n', NULL, NULL, NULL, NULL, ''),
(36, 10, 'Steamed mix vegetable (Kukusan Campuran Sayuran)\r\n', NULL, NULL, NULL, NULL, ''),
(37, 10, 'Sauteed green bean with egg (Tumis Buncis & Telor)\r\n', NULL, NULL, NULL, NULL, ''),
(38, 10, 'Coleslaw\r\n', NULL, NULL, NULL, NULL, ''),
(39, 10, 'Sauteed carrot with baby corn (Tumis wortel dengan jagung muda)\r\n', NULL, NULL, NULL, NULL, ''),
(40, 10, 'Sauteed chinese cabbage (Tumis sawi putih)\r\n', NULL, NULL, NULL, NULL, ''),
(41, 10, 'Sauteed sprout bean & bean curd (Tumis toge & tahu)\r\n', NULL, NULL, NULL, NULL, ''),
(42, 10, 'Sauteed kaylan (Tumis kaylan)\r\n', NULL, NULL, NULL, NULL, ''),
(43, 10, 'Sauteed Siomak(Tumis Selada Wangi)\r\n', NULL, NULL, NULL, NULL, ''),
(44, 10, 'Sauteed water spinach (Tumis Kangkung)\r\n', NULL, NULL, NULL, NULL, ''),
(45, 10, 'Creamy Spinach (Bayam Creamy)\r\n', NULL, NULL, NULL, NULL, ''),
(46, 10, 'Stir fried mix vegetable (Cap Cay)\r\n', NULL, NULL, NULL, NULL, ''),
(47, 10, 'Sauteed squash with egg (Tumis Labu dengan Telor)\r\n', NULL, NULL, NULL, NULL, ''),
(48, 10, 'Sauteed pok choy with oyster sauce\r\n', NULL, NULL, NULL, NULL, ''),
(49, 10, 'Spinach and carrot with sesame sauce (Bayam dan Wortel Wijen)\r\n', NULL, NULL, NULL, NULL, ''),
(50, 10, 'Mix Salad\r\n', NULL, NULL, NULL, NULL, ''),
(51, 10, 'Cassava leaves curry (Kari Daun Singkong)\r\n', NULL, NULL, NULL, NULL, ''),
(52, 10, 'Sauteed cabbage with egg (Tumis Kol dengan Telor)', NULL, NULL, NULL, NULL, ''),
(53, 10, 'Sauteed green bean and carrot (Cah Buncis & Wortel)\r\n', NULL, NULL, NULL, NULL, ''),
(54, 10, 'Baked potato and carrot \r\n', NULL, NULL, NULL, NULL, ''),
(55, 10, 'Sauteed chicken dumpling\r\n', NULL, NULL, NULL, NULL, ''),
(56, 10, 'teriyaki tempeh \r\n', NULL, NULL, NULL, NULL, ''),
(57, 9, 'fried wonton \r\n', NULL, NULL, NULL, NULL, ''),
(58, 9, 'bean curd teriyaki \r\n', NULL, NULL, NULL, NULL, ''),
(59, 9, 'sunny side up egg with sweet soy \r\n', NULL, NULL, NULL, NULL, ''),
(60, 9, 'fried fish ball \r\n', NULL, NULL, NULL, NULL, ''),
(61, 9, 'bean curd stuffed with vegetable \r\n', NULL, NULL, NULL, NULL, ''),
(62, 9, 'tempeh with sweet soy\r\n', NULL, NULL, NULL, NULL, ''),
(63, 9, 'potato wedge \r\n', NULL, NULL, NULL, NULL, ''),
(64, 9, 'Grilled sweet corn\r\n', NULL, NULL, NULL, NULL, ''),
(65, 9, 'Claypot tofu\r\n', NULL, NULL, NULL, NULL, ''),
(66, 9, 'crispy mushroom \r\n', NULL, NULL, NULL, NULL, ''),
(67, 9, 'hard boiled egg with soy sauce\r\n', NULL, NULL, NULL, NULL, ''),
(68, 9, 'braised spiced tempe \r\n', NULL, NULL, NULL, NULL, ''),
(69, 9, 'Japhae\r\n', NULL, NULL, NULL, NULL, ''),
(70, 9, 'potato with sweet balado sauce \r\n', NULL, NULL, NULL, NULL, ''),
(71, 9, 'sauteed oyster mushroom with carrot \r\n', NULL, NULL, NULL, NULL, ''),
(72, 9, 'Korean pancake \r\n', NULL, NULL, NULL, NULL, ''),
(73, 9, 'sausage with scrambled egg \r\n', NULL, NULL, NULL, NULL, ''),
(74, 9, 'crispy potato \r\n', NULL, NULL, NULL, NULL, ''),
(75, 9, 'Mun Tofu \r\n', NULL, NULL, NULL, NULL, ''),
(76, 9, 'sunny side up egg with tomato sauce\r\n', NULL, NULL, NULL, NULL, ''),
(77, 9, 'vegetable fritter \r\n', NULL, NULL, NULL, NULL, ''),
(78, 9, 'sausage green chilli \r\n', NULL, NULL, NULL, NULL, ''),
(79, 9, 'braised spiced bean curd\r\n', NULL, NULL, NULL, NULL, ''),
(80, 9, 'sunny side up egg with marinara sauce\r\n', NULL, NULL, NULL, NULL, ''),
(81, 9, 'tempeh curry \r\n', NULL, NULL, NULL, NULL, ''),
(82, 9, 'potato fritter\r\n', NULL, NULL, NULL, NULL, ''),
(83, 9, 'tempeh with sweet balado sauce\r\n', NULL, NULL, NULL, NULL, ''),
(84, 9, 'crab stick tempura \r\n', NULL, NULL, NULL, NULL, ''),
(85, 9, 'braised spiced bean curd \r\n', NULL, NULL, NULL, NULL, ''),
(86, 9, 'Crispy egg plant with raos sauce \r\n', NULL, NULL, NULL, NULL, ''),
(87, 9, 'seafood tofu with oyster sauce \r\n', NULL, NULL, NULL, NULL, ''),
(88, 9, 'sauteed meatball with scrambled egg \r\n', NULL, NULL, NULL, NULL, ''),
(89, 9, 'corn fritter \r\n', NULL, NULL, NULL, NULL, ''),
(90, 9, 'sauteed fish roll \r\n', NULL, NULL, NULL, NULL, ''),
(91, 9, 'fish cake with tomato sauce\r\n', NULL, NULL, NULL, NULL, ''),
(92, 9, 'stir fried chicken ball\r\n', NULL, NULL, NULL, NULL, ''),
(93, 9, 'stir fried sausage\r\n', NULL, NULL, NULL, NULL, ''),
(94, 9, 'crispy eggplant \r\n', NULL, NULL, NULL, NULL, ''),
(95, 9, 'chicken rolled bean curd skin (Kekian)\r\n', NULL, NULL, NULL, NULL, ''),
(96, 9, 'potato with minced chicken \r\n', NULL, NULL, NULL, NULL, ''),
(97, 9, 'bean curd stuffed with vegetable\r\n', NULL, NULL, NULL, NULL, ''),
(98, 9, 'stir fried sausage with oyster sauce \r\n', NULL, NULL, NULL, NULL, ''),
(99, 9, 'Spring roll\r\n', NULL, NULL, NULL, NULL, ''),
(100, 9, 'Sauteed wonton\r\n', NULL, NULL, NULL, NULL, ''),
(101, 9, 'bean curd with sweet sauce\r\n', NULL, NULL, NULL, NULL, ''),
(102, 9, 'fried seafood tofu\r\n', NULL, NULL, NULL, NULL, ''),
(103, 9, 'Sauteed fish cake\r\n', NULL, NULL, NULL, NULL, ''),
(104, 9, 'Egg Roll\r\n', NULL, NULL, NULL, NULL, ''),
(105, 9, 'Shrimp roll\r\n', NULL, NULL, NULL, NULL, ''),
(106, 9, 'egg curry \r\n', NULL, NULL, NULL, NULL, ''),
(107, 9, 'steamed siomay \r\n', NULL, NULL, NULL, NULL, ''),
(108, 9, 'sauteed chicken sausage with scrambled egg \r\n', NULL, NULL, NULL, NULL, ''),
(109, 9, 'toppoki gochujang\r\n', NULL, NULL, NULL, NULL, ''),
(110, 9, 'baked mushroom\r\n', NULL, NULL, NULL, NULL, ''),
(111, 9, 'Mashed potato\r\n', NULL, NULL, NULL, NULL, ''),
(112, 9, 'bean curd fritter \r\n', NULL, NULL, NULL, NULL, ''),
(113, 9, 'grilled sausage with garlic\r\n', NULL, NULL, NULL, NULL, ''),
(114, 9, 'Sausage with soy sauve\r\n', NULL, NULL, NULL, NULL, ''),
(115, 9, 'egg foo young\r\n', NULL, NULL, NULL, NULL, ''),
(116, 9, 'Sauteed mushroom\r\n', NULL, NULL, NULL, NULL, ''),
(117, 9, 'stir fried meatball with balado sauce\r\n', NULL, NULL, NULL, NULL, ''),
(118, 9, 'vegetable tempura \r\n', NULL, NULL, NULL, NULL, ''),
(119, 9, 'Ang Sio Tofu \r\n', NULL, NULL, NULL, NULL, ''),
(120, 9, 'tofu omelette \r\n', NULL, NULL, NULL, NULL, ''),
(121, 9, 'grilled meat ball\r\n', NULL, NULL, NULL, NULL, ''),
(122, 9, 'salt pepper tofu \r\n', NULL, NULL, NULL, NULL, ''),
(123, 9, 'Mapo Tofu\r\n', NULL, NULL, NULL, NULL, ''),
(124, 9, 'Sauteed chicken dumpling\r\n', NULL, NULL, NULL, NULL, ''),
(125, 9, 'Crispy tempeh with sweet soy (Kering Tempe)\r\n', NULL, NULL, NULL, NULL, ''),
(126, 5, 'Chicken with butter sauce\r\n', NULL, NULL, NULL, NULL, ''),
(127, 5, 'Mongolian chicken \r\n', NULL, NULL, NULL, NULL, ''),
(128, 5, 'Chicken steak \r\n', NULL, NULL, NULL, NULL, ''),
(129, 5, 'Korean barbeque chicken\r\n', NULL, NULL, NULL, NULL, ''),
(130, 5, 'Karaage chicken \r\n', NULL, NULL, NULL, NULL, ''),
(131, 5, 'Chicken charsio\r\n', NULL, NULL, NULL, NULL, ''),
(132, 5, 'Chicken with curry sauce\r\n', NULL, NULL, NULL, NULL, ''),
(133, 5, 'Chicken bulgogi\r\n', NULL, NULL, NULL, NULL, ''),
(134, 5, 'Chicken popcorn \r\n', NULL, NULL, NULL, NULL, ''),
(135, 5, 'Crispy chicken\r\n', NULL, NULL, NULL, NULL, ''),
(136, 5, 'Chicken Satay \r\n', NULL, NULL, NULL, NULL, ''),
(137, 5, 'Kung pao chicken\r\n', NULL, NULL, NULL, NULL, ''),
(138, 5, 'Crushed crispy fried chicken (Ayam Geprek) \r\n', NULL, NULL, NULL, NULL, ''),
(139, 5, 'Pan seared chicken with barbeque sauce \r\n', NULL, NULL, NULL, NULL, ''),
(140, 5, 'Braised chicken with coconut milk\r\n', NULL, NULL, NULL, NULL, ''),
(141, 5, 'Sauteed chicken with mushroom \r\n', NULL, NULL, NULL, NULL, ''),
(142, 5, 'Chicken rolled spinach\r\n', NULL, NULL, NULL, NULL, ''),
(143, 5, 'Chicken Nanking \r\n', NULL, NULL, NULL, NULL, ''),
(144, 5, 'Thai chicken basil \r\n', NULL, NULL, NULL, NULL, ''),
(145, 5, 'Korean butter chicken \r\n', NULL, NULL, NULL, NULL, ''),
(146, 5, 'Steamed ginger chicken \r\n', NULL, NULL, NULL, NULL, ''),
(147, 5, 'Stewed chicken and potato \r\n', NULL, NULL, NULL, NULL, ''),
(148, 5, 'Chicken namban\r\n', NULL, NULL, NULL, NULL, ''),
(149, 5, 'Grilled Hainam chicken\r\n', NULL, NULL, NULL, NULL, ''),
(150, 5, 'Orange chicken\r\n', NULL, NULL, NULL, NULL, ''),
(151, 5, 'Roasted Hainam chicken\r\n', NULL, NULL, NULL, NULL, ''),
(152, 5, 'Balinese fried chicken\r\n', NULL, NULL, NULL, NULL, ''),
(153, 5, 'Chicken cordon bleu\r\n', NULL, NULL, NULL, NULL, ''),
(154, 5, 'Teriyaki Chicken\r\n', NULL, NULL, NULL, NULL, ''),
(155, 5, 'Chicken katsu \r\n', NULL, NULL, NULL, NULL, ''),
(156, 5, 'Chicken black pepper\r\n', NULL, NULL, NULL, NULL, ''),
(157, 5, 'Chicken yakiniku\r\n', NULL, NULL, NULL, NULL, 'https://cdn.idntimes.com/content-images/post/20220525/160639893-283206759865382-196928739556697873-n-ffcb994140a375219c02534d06b65b7c_600x400.jpg'),
(158, 5, 'Chicken finger with chilli mayo\r\n', NULL, NULL, NULL, NULL, ''),
(159, 5, 'Grilled chicken steak\r\n', NULL, NULL, NULL, NULL, ''),
(160, 5, 'Chicken tempura \r\n', NULL, NULL, NULL, NULL, ''),
(161, 5, 'Chicken & potato with sweet soy sauce\r\n', NULL, NULL, NULL, NULL, ''),
(162, 5, 'Galangal fried chicken (Ayam Serundeng)\r\n', NULL, NULL, NULL, NULL, ''),
(163, 6, 'Fish katsu \r\n', NULL, NULL, NULL, NULL, ''),
(164, 6, 'Grilled fish with honey sauce\r\n', NULL, NULL, NULL, NULL, ''),
(165, 6, 'Fish and chip with tartar sauce\r\n', NULL, NULL, NULL, NULL, ''),
(166, 6, 'Grilled fish with barbegue sauce \r\n', NULL, NULL, NULL, NULL, ''),
(167, 6, 'Pan seared fish with sweet corn \r\n', NULL, NULL, NULL, NULL, ''),
(168, 6, 'Palembang fish brine\r\n', NULL, NULL, NULL, NULL, ''),
(169, 6, 'Fish with sweet sour sauce\r\n', NULL, NULL, NULL, NULL, ''),
(170, 6, 'Fish and potato Curry\r\n', NULL, NULL, NULL, NULL, ''),
(171, 6, 'Concasse Fish\r\n', NULL, NULL, NULL, NULL, ''),
(172, 6, 'Kung pao fish\r\n', NULL, NULL, NULL, NULL, ''),
(173, 6, 'Baked fish rosemary\r\n', NULL, NULL, NULL, NULL, ''),
(174, 6, 'Fish with sweet balado sauce\r\n', NULL, NULL, NULL, NULL, ''),
(175, 6, 'Salted egg fish\r\n', NULL, NULL, NULL, NULL, ''),
(176, 6, 'Fish with oyster sauce\r\n', NULL, NULL, NULL, NULL, ''),
(177, 6, 'Steamed fish with soy sauce \r\n', NULL, NULL, NULL, NULL, ''),
(178, 6, 'Fish with yellow pickle\r\n', NULL, NULL, NULL, NULL, ''),
(179, 6, 'Fish with rica rica sauce\r\n', NULL, NULL, NULL, NULL, ''),
(180, 6, 'Balinese shredded fish\r\n', NULL, NULL, NULL, NULL, ''),
(181, 6, 'Fried fish onion caramel\r\n', NULL, NULL, NULL, NULL, ''),
(182, 6, 'Salted pepper fish\r\n', NULL, NULL, NULL, NULL, ''),
(183, 6, 'Fried fish with mushroom sauce\r\n', NULL, NULL, NULL, NULL, ''),
(184, 6, 'Pan seared fish with chilli & garlic\r\n', NULL, NULL, NULL, NULL, ''),
(185, 6, 'Fish with Thai sauce \r\n', NULL, NULL, NULL, NULL, ''),
(186, 6, 'Finger fish with chili mayo sauce\r\n', NULL, NULL, NULL, NULL, ''),
(187, 6, 'Pan seared fish with Japanese salad\r\n', NULL, NULL, NULL, NULL, ''),
(188, 6, 'Fish butter sauce\r\n', NULL, NULL, NULL, NULL, ''),
(189, 6, 'Steamed fish Hong Kong\r\n', NULL, NULL, NULL, NULL, ''),
(190, 6, 'Steamed fish with ginger\r\n', NULL, NULL, NULL, NULL, ''),
(191, 6, 'Fish black pepper\r\n', NULL, NULL, NULL, NULL, ''),
(192, 6, 'Fish with lemon sauce\r\n', NULL, NULL, NULL, NULL, ''),
(193, 6, 'Fish concasse \r\n', NULL, NULL, NULL, NULL, ''),
(194, 6, 'Fish Finger\r\n', NULL, NULL, NULL, NULL, ''),
(195, 6, 'Fried fish onion caramel a\r\n', NULL, NULL, NULL, NULL, ''),
(196, 7, 'Hokben platter (Ebi Furay + Egg Roll + Shrimp Roll)\r\n', NULL, NULL, NULL, NULL, ''),
(197, 7, 'Salted egg calamari \r\n', NULL, NULL, NULL, NULL, ''),
(198, 7, 'Crispy shrimp \r\n', NULL, NULL, NULL, NULL, ''),
(199, 7, 'Crispy calamari with mayonaise sauce\r\n', NULL, NULL, NULL, NULL, ''),
(200, 7, 'Shrimp ball with dices of bread \r\n', NULL, NULL, NULL, NULL, ''),
(201, 7, 'Calamari with black pepper sauce\r\n', NULL, NULL, NULL, NULL, ''),
(202, 7, 'Salted egg shrimp\r\n', NULL, NULL, NULL, NULL, ''),
(203, 7, 'Ebi katsu\r\n', NULL, NULL, NULL, NULL, ''),
(204, 7, 'Seafood with Sechuan tofu\r\n', NULL, NULL, NULL, NULL, ''),
(205, 7, 'Crispy Calamari with sweet sour sauce\r\n', NULL, NULL, NULL, NULL, ''),
(206, 7, 'Calamari with Padang sauce\r\n', NULL, NULL, NULL, NULL, ''),
(207, 8, 'Stewed beef with potato\r\n', NULL, NULL, NULL, NULL, ''),
(208, 8, 'Beef bulgogi \r\n', NULL, NULL, NULL, NULL, ''),
(209, 8, 'Beef winner\r\n', NULL, NULL, NULL, NULL, ''),
(210, 8, 'Beef stroganoff\r\n', NULL, NULL, NULL, NULL, ''),
(211, 8, 'Bulgogi Beef\r\n', NULL, NULL, NULL, NULL, ''),
(212, 8, 'Swedish meatball \r\n', NULL, NULL, NULL, NULL, ''),
(213, 8, 'Beef black pepper\r\n', NULL, NULL, NULL, NULL, ''),
(214, 8, 'Spicy coconut beef \r\n', NULL, NULL, NULL, NULL, ''),
(215, 1, 'Daily Set 1', NULL, NULL, NULL, NULL, ''),
(216, 1, 'Daily Set 2', NULL, NULL, NULL, NULL, ''),
(217, 1, 'Daily Set 3', NULL, NULL, NULL, NULL, ''),
(218, 1, 'Daily Set 4', NULL, NULL, NULL, NULL, ''),
(219, 1, 'Daily Set 5', NULL, NULL, NULL, NULL, ''),
(220, 1, 'Daily Set 6', NULL, NULL, NULL, NULL, ''),
(221, 1, 'Daily Set 7', NULL, NULL, NULL, NULL, ''),
(222, 1, 'Daily Set 8', NULL, NULL, NULL, NULL, ''),
(223, 1, 'Daily Set 9', NULL, NULL, NULL, NULL, ''),
(224, 1, 'Daily Set 10', NULL, NULL, NULL, NULL, ''),
(225, 4, 'Singapore fried kwetiau (Kwetiau Goreng Singapore)', NULL, NULL, NULL, NULL, ''),
(226, 4, 'Chicken porridge (Bubur Ayam)', NULL, NULL, NULL, NULL, ''),
(227, 4, 'Hot dog', NULL, NULL, NULL, NULL, ''),
(228, 3, 'Spaghetti bolognese', NULL, NULL, NULL, NULL, ''),
(229, 4, 'Oriental fried noodle (Mie Goreng Oriental)', NULL, NULL, NULL, NULL, ''),
(230, 4, 'Medan Chicken Soup (Soto Ayam Medan)', NULL, NULL, NULL, NULL, ''),
(231, 4, 'Pizza', NULL, NULL, NULL, NULL, ''),
(232, 3, 'Fettucini Carbonara', NULL, NULL, NULL, NULL, ''),
(233, 4, 'Siomay', NULL, NULL, NULL, NULL, ''),
(234, 4, 'Chicken noodle with wonton (Mie Ayam Wonton)', NULL, NULL, NULL, NULL, ''),
(235, 4, 'Sausage rolled noodle (Sosis Gulung Mie)', NULL, NULL, NULL, NULL, ''),
(236, 3, 'Lasagna', NULL, NULL, NULL, NULL, ''),
(237, 4, 'Hawaii fried rice (Nasi Goreng Hawaii)', NULL, NULL, NULL, NULL, ''),
(238, 4, 'Bakso Malang', NULL, NULL, NULL, NULL, ''),
(239, 4, 'Kimbab', NULL, NULL, NULL, NULL, ''),
(240, 3, 'Fried macaroni with egg and garlic', NULL, NULL, NULL, NULL, ''),
(241, 4, 'Fried vermicelli (Bihun Goreng)', NULL, NULL, NULL, NULL, ''),
(242, 4, 'Laksa Singapore', NULL, NULL, NULL, NULL, ''),
(243, 4, 'Shihlin fried chicken', NULL, NULL, NULL, NULL, ''),
(244, 3, 'Fettucine chicken marinara', NULL, NULL, NULL, NULL, ''),
(245, 4, 'Penang fried noodle (Mie Goreng Penang)', NULL, NULL, NULL, NULL, ''),
(246, 4, 'Hokkien Mie', NULL, NULL, NULL, NULL, ''),
(247, 4, 'Chicken Burger', NULL, NULL, NULL, NULL, ''),
(248, 3, 'Spaghetti Bolognese', NULL, NULL, NULL, NULL, ''),
(249, 4, 'Dimsum', NULL, NULL, NULL, NULL, ''),
(250, 4, 'Chicken Noodle with meatball (Mie Ayam Bakso)', NULL, NULL, NULL, NULL, ''),
(251, 4, 'Sausage rolled bread (Sosis Gulung Roti)', NULL, NULL, NULL, NULL, ''),
(252, 3, 'Fettucine Carbonara', NULL, NULL, NULL, NULL, ''),
(253, 4, 'Steamed Chicken Rice (Nasi Tim Ayam)', NULL, NULL, NULL, NULL, ''),
(254, 4, 'Tomyam vermicelli', NULL, NULL, NULL, NULL, ''),
(255, 4, 'Chicken Wing', NULL, NULL, NULL, NULL, ''),
(256, 3, 'Mac and cheese', NULL, NULL, NULL, NULL, ''),
(257, 4, 'Melayu fried noodle (Mie Goreng Melayu)', NULL, NULL, NULL, NULL, ''),
(258, 4, 'Soto Lamongan', NULL, NULL, NULL, NULL, ''),
(259, 4, 'Siomay Bandung', NULL, NULL, NULL, NULL, ''),
(260, 3, 'Fettucine chicken marinara', NULL, NULL, NULL, NULL, ''),
(261, 4, 'Singapore fried vermicelli (Bihun Goreng Singapore)', NULL, NULL, NULL, NULL, ''),
(262, 4, 'Noodle with chicken ball (Mie Sop Ayam Medan)', NULL, NULL, NULL, NULL, ''),
(263, 4, 'Crispy chicken sandwich (Roti Isi Ayam)', NULL, NULL, NULL, NULL, ''),
(264, 3, 'Chicken spaghetti aglio olio', NULL, NULL, NULL, NULL, ''),
(265, 9, 'Sauteed oyster mushroom with carrot (Tumis jamur tiram dengan Wortel)', NULL, NULL, NULL, NULL, ''),
(266, 6, 'Fish with sweet and sour sauce (Ikan Asam Manis)', NULL, NULL, NULL, NULL, ''),
(267, 5, 'Chicken bugolgi', NULL, NULL, NULL, NULL, ''),
(268, 10, 'Sauteed long bean and tempeh (Tumis Kacang Panjang &  Tempe)', NULL, NULL, NULL, NULL, ''),
(269, 9, 'Sauteed tempeh with sweet soy (Tempe Orek)', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_dtl`
--

CREATE TABLE `order_dtl` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_po_purchase_meal_dtl` int(11) NOT NULL,
  `cancel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_dtl`
--

INSERT INTO `order_dtl` (`id`, `id_order`, `id_po_purchase_meal_dtl`, `cancel`) VALUES
(1, 1, 2, 0),
(2, 1, 3, 0),
(3, 19, 10, 0),
(4, 19, 22, 0),
(5, 19, 24, 0),
(6, 19, 20, 0),
(7, 19, 13, 0),
(8, 19, 22, 0),
(9, 19, 24, 0),
(10, 19, 21, 0),
(11, 19, 12, 0),
(12, 19, 23, 0),
(13, 19, 21, 0),
(14, 20, 10, 0),
(15, 20, 22, 0),
(16, 20, 24, 0),
(17, 20, 20, 0),
(18, 21, 17, 0),
(19, 21, 10, 0),
(20, 21, 22, 0),
(21, 21, 24, 0),
(22, 21, 20, 0),
(23, 21, 19, 0),
(24, 21, 13, 0),
(25, 21, 22, 0),
(26, 21, 24, 0),
(27, 21, 21, 0),
(28, 21, 26, 0),
(29, 21, 12, 0),
(30, 21, 23, 0),
(31, 21, 21, 0),
(32, 22, 10, 0),
(33, 22, 22, 0),
(34, 22, 24, 0),
(35, 24, 17, 0),
(36, 24, 10, 0),
(37, 24, 22, 0),
(38, 24, 24, 0),
(39, 24, 20, 0),
(40, 25, 1, 0),
(41, 25, 2, 0),
(42, 25, 3, 0),
(43, 25, 4, 0),
(44, 25, 5, 0),
(45, 26, 21, 0),
(46, 26, 23, 0),
(47, 26, 8, 0),
(48, 26, 10, 0),
(49, 30, 17, 0),
(50, 30, 10, 0),
(51, 30, 22, 0),
(52, 30, 24, 0),
(53, 30, 20, 0),
(54, 31, 17, 0),
(55, 31, 10, 0),
(56, 31, 22, 0),
(57, 31, 24, 0),
(58, 31, 20, 0),
(59, 35, 17, 0),
(60, 35, 10, 0),
(61, 35, 22, 0),
(62, 35, 24, 0),
(63, 35, 20, 0),
(64, 38, 10, 2023),
(65, 39, 10, 2023),
(66, 40, 10, 2023),
(67, 41, 10, 2023),
(68, 44, 17, 2023),
(69, 44, 10, 2023),
(70, 44, 22, 2023),
(71, 44, 24, 2023),
(72, 44, 20, 2023),
(73, 47, 1, 2023),
(74, 47, 2, 2023),
(75, 47, 3, 2023),
(76, 47, 4, 2023),
(77, 47, 5, 2023),
(78, 48, 1, 2023),
(79, 48, 2, 2023),
(80, 48, 3, 2023),
(81, 48, 4, 2023),
(82, 48, 5, 2023),
(83, 49, 1, 2023),
(84, 49, 2, 2023),
(85, 49, 3, 2023),
(86, 49, 4, 2023),
(87, 49, 5, 2023),
(88, 50, 1, 2023),
(89, 50, 2, 2023),
(90, 50, 3, 2023),
(91, 50, 4, 2023),
(92, 50, 5, 2023),
(93, 51, 1, 2023),
(94, 51, 2, 2023),
(95, 51, 3, 2023),
(96, 51, 4, 2023),
(97, 51, 5, 2023),
(98, 52, 1, 0),
(99, 52, 2, 0),
(100, 52, 3, 0),
(101, 52, 4, 0),
(102, 52, 5, 0),
(103, 53, 1, 0),
(104, 53, 2, 0),
(105, 53, 3, 0),
(106, 53, 4, 0),
(107, 53, 5, 0),
(108, 53, 21, 0),
(109, 53, 22, 0),
(110, 53, 23, 0),
(111, 53, 24, 0),
(112, 53, 6, 0),
(113, 53, 7, 0),
(114, 53, 8, 0),
(115, 53, 9, 0),
(116, 53, 10, 0),
(117, 53, 12, 0),
(118, 53, 13, 0),
(119, 54, 11, 0),
(120, 54, 25, 0),
(121, 54, 13, 0),
(122, 55, 11, 0),
(123, 55, 25, 0),
(124, 56, 26, 0),
(125, 56, 27, 0),
(126, 56, 28, 0),
(127, 57, 1, 0),
(128, 57, 2, 0),
(129, 57, 3, 0),
(130, 57, 4, 0),
(131, 57, 5, 0),
(132, 57, 15, 0),
(133, 57, 16, 0),
(134, 57, 17, 0),
(135, 57, 18, 0),
(136, 57, 19, 0),
(137, 58, 30, 0),
(138, 58, 31, 0),
(139, 58, 33, 0),
(140, 58, 41, 0),
(141, 58, 47, 0),
(142, 58, 81, 0),
(143, 58, 27, 0),
(144, 58, 28, 0),
(145, 58, 34, 0),
(146, 58, 36, 0),
(147, 58, 42, 0),
(148, 58, 58, 0),
(149, 58, 60, 0),
(150, 58, 66, 0),
(151, 58, 68, 0),
(152, 58, 75, 0),
(153, 59, 27, 0),
(154, 59, 28, 0),
(155, 60, 26, 0),
(156, 60, 27, 0),
(157, 60, 28, 0),
(158, 60, 66, 0),
(159, 60, 67, 0),
(160, 60, 68, 0),
(161, 61, 29, 0),
(162, 61, 30, 0),
(163, 61, 31, 0),
(164, 61, 41, 0),
(165, 61, 43, 0),
(166, 62, 30, 0),
(167, 62, 31, 0),
(168, 63, 29, 0),
(169, 63, 30, 0),
(170, 63, 31, 0),
(171, 64, 29, 0),
(172, 64, 30, 0),
(173, 64, 31, 0),
(174, 64, 69, 0),
(175, 64, 70, 0),
(176, 64, 72, 0),
(177, 64, 77, 0),
(178, 64, 78, 0),
(179, 64, 79, 0),
(180, 65, 26, 0),
(181, 65, 28, 0),
(182, 66, 30, 0),
(183, 66, 61, 0),
(184, 66, 62, 0),
(185, 66, 64, 0),
(186, 67, 44, 0),
(187, 68, 29, 0),
(188, 68, 30, 0),
(189, 68, 31, 0),
(190, 69, 30, 0),
(191, 70, 60, 0),
(192, 71, 31, 0),
(193, 72, 29, 0),
(194, 72, 30, 0),
(195, 72, 31, 0),
(196, 72, 37, 0),
(197, 72, 38, 0),
(198, 72, 40, 0),
(199, 73, 52, 0),
(200, 73, 97, 0),
(201, 73, 98, 0),
(202, 73, 99, 0),
(203, 73, 100, 0),
(204, 74, 73, 0),
(205, 74, 34, 0),
(206, 74, 29, 0),
(207, 75, 70, 0),
(208, 76, 32, 0),
(209, 77, 100, 0),
(210, 78, 100, 0),
(211, 79, 100, 0),
(212, 80, 46, 0),
(213, 80, 67, 0),
(214, 80, 68, 0),
(215, 80, 69, 0),
(216, 80, 70, 0),
(217, 80, 37, 0),
(218, 80, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_hdr`
--

CREATE TABLE `order_hdr` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `grade_level` varchar(50) NOT NULL,
  `parent_phone_number` varchar(50) NOT NULL,
  `submitted_date` datetime NOT NULL,
  `Notes` varchar(105) NOT NULL,
  `id_po_purchase_meal_hdr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_hdr`
--

INSERT INTO `order_hdr` (`id`, `email`, `student_name`, `grade_level`, `parent_phone_number`, `submitted_date`, `Notes`, `id_po_purchase_meal_hdr`) VALUES
(1, 'johndoe@swa-jkt.com', 'Diana Doe', 'Grade 10', '0812328312312', '2023-10-20 13:22:06', '', 2),
(2, 'jeremy@gmail.com', 'jeremy', '1', '1223444332', '2023-11-03 04:28:13', '', 2),
(3, 'jeremya@gmail.com', 'jeremy', '1', '1223444332', '2023-11-06 04:20:58', '', 2),
(4, 'mic@gmail.com', 'mich', '1', '1223444332', '2023-11-06 04:22:05', '', 2),
(5, 'jason@gmail.com', 'jason', '2', '1223444332', '2023-11-06 04:23:12', '', 2),
(6, 'jason@gmail.com', 'jeremy', '1', '1223444332', '2023-11-06 04:23:48', '', 2),
(7, 'aaaaaaaaaa@gmail.com', 'oei', '2', '333232323', '2023-11-22 03:18:20', '', 2),
(8, 'bbbbb@gmail.com', 'mich', '2', '231331231331', '2023-11-22 03:19:57', '', 2),
(9, 'jason@gmail.com', 'Jason Oei Tes', 'Grade 2', '0811877555', '2023-12-12 11:14:26', '', 2),
(10, 'jasonoei@gmail.com', 'Jason Oei TESST', 'Grade 2', '0811877555', '2023-12-12 11:14:54', '', 2),
(11, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '0811877555', '2023-12-12 11:16:31', '', 2),
(12, 'jason@gmail.com', 'Jason Oei', 'as', '081182921901', '2023-12-12 11:21:28', '', 2),
(13, 'jason@gmail.com', 'as', 'Grade 1', '0811877555', '2023-12-12 11:21:36', '', 2),
(14, 'jason@gmail.com', 'Jason Oei', 'Level 1', '0811877555', '2023-12-12 11:22:33', '', 2),
(15, 'jason@gmail.com', 'Jason Oei', 'Grade 2', '081182921905', '2023-12-12 11:26:05', '', 2),
(16, 'jason@gmail.com', 'Jason Oei', 'Grade 2', '0811877555', '2023-12-12 11:27:33', '', 2),
(17, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921905', '2023-12-12 11:29:55', '', 2),
(18, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 11:31:50', '', 2),
(19, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 11:39:12', '', 2),
(20, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 11:40:49', '', 2),
(21, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 11:42:30', '', 2),
(22, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 11:44:06', '', 2),
(23, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '0811877555', '2023-12-12 14:40:18', '', 2),
(24, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '0811877555', '2023-12-12 14:40:45', '', 2),
(25, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 14:45:09', '', 2),
(26, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 14:45:48', '', 2),
(27, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 15:44:25', '', 2),
(28, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 15:44:43', '', 2),
(29, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 15:46:03', '', 2),
(30, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 15:47:44', '', 2),
(31, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 15:48:44', '', 2),
(32, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 15:54:57', '', 2),
(33, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 16:01:13', '', 2),
(34, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 16:12:10', '', 2),
(35, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 16:12:52', '', 2),
(36, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 16:15:41', '', 2),
(37, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 16:16:40', '', 2),
(38, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921905', '2023-12-12 16:17:03', '', 2),
(39, 'jason@gmail.com', 'as', 'as', '081182921901', '2023-12-12 16:17:45', '', 2),
(40, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '0811877555', '2023-12-12 16:19:47', '', 2),
(41, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 16:20:24', '', 2),
(42, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-12 16:21:12', '', 2),
(43, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-13 09:09:48', '', 2),
(44, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-13 09:10:37', '', 2),
(45, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-13 09:14:22', '', 2),
(46, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-13 09:20:54', '', 2),
(47, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-13 09:21:16', '', 2),
(48, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-14 14:33:48', '', 2),
(49, 'jason@gmail.com', 'as', 'Grade 1', '081182921901', '2023-12-14 14:38:08', '', 2),
(50, 'jason@gmail.com', 'as', 'Grade 1', '081182921901', '2023-12-14 14:38:08', '', 2),
(51, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-14 14:38:24', '', 2),
(52, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-14 14:48:13', '', 2),
(53, 'jason@gmail.com', 'jason Oei', 'Grade 2', '0811877555', '2023-12-18 13:44:19', '', 2),
(54, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-18 14:44:09', '', 2),
(55, 'jason@gmail.com', 'as', 'Grade 1', '081182921901', '2023-12-18 14:46:03', '', 2),
(56, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-20 08:15:38', '', 2),
(57, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-20 08:22:07', '', 2),
(58, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-21 08:03:53', '', 2),
(59, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-21 08:07:25', '', 2),
(60, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-21 08:07:57', '', 2),
(61, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-21 12:03:59', '', 2),
(62, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921905', '2023-12-26 08:36:09', '', 2),
(63, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-26 09:12:30', '', 2),
(64, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2023-12-27 11:24:30', '', 2),
(65, 'jason@gmail.com', 'Jason', 'Grade 1', '081182921901', '2024-01-03 11:19:56', '', 2),
(66, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2024-01-03 11:23:32', '', 2),
(67, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2024-01-03 11:25:41', '', 2),
(68, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2024-01-09 14:53:42', '', 2),
(69, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '0000-00-00 00:00:00', '', 2),
(70, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2024-01-11 08:03:31', 'asca', 2),
(71, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2024-01-11 08:04:46', 'ascas', 2),
(72, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921905', '2024-01-11 16:20:30', 'as', 2),
(73, 'jason@gmail.com', 'Jason Oei', 'Grade 1', '081182921901', '2024-01-29 10:20:30', '', 2),
(74, 'test@test.com', 'test', 'Grade 09', '08129289282', '2024-02-20 08:40:28', 'Kasih di jam 12:00', 2),
(75, 'Vame@gmail.com', 'Vame', 'Grade 09', '0818999922222', '2024-02-20 11:45:25', 'No need', 2),
(76, 'john_doe@swa-jkt.com', 'John Doe', 'Grade 09', '08182828282', '2024-02-20 13:23:13', 'Testing TestingTestingTestingTestingTestingTestingTestingTestingTestingTestingTestingTestingTestingT', 0),
(77, 'Vame@gmail.com', 'vame', 'Grade 10', '081312312312312', '2024-02-20 13:27:36', 'testingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingte', 0),
(78, 'Vame@gmail.com', 'vame', 'Grade 10', '081312312312312', '2024-02-20 13:28:48', 'testingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingtestingte', 2),
(79, 'rudi_pranata@swa-jkt.com', 'claudia', 'Pre-K A', '081231231231231', '2024-02-20 13:29:53', 'confirm', 2),
(80, 'John@swa-jkt.com', 'Sisca', 'Prek-K B', '08127777772', '2024-02-20 13:48:35', 'no need notes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `po_purchase_meal_dtl`
--

CREATE TABLE `po_purchase_meal_dtl` (
  `id` int(11) NOT NULL,
  `id_po_purchase_meal_hdr` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_purchase_meal_dtl`
--

INSERT INTO `po_purchase_meal_dtl` (`id`, `id_po_purchase_meal_hdr`, `date`, `id_category`, `id_menu`, `parent`, `price`) VALUES
(1, 2, '2024-01-04', 5, 157, 215, 15000),
(2, 2, '2024-01-04', 1, 215, 0, 45000),
(3, 2, '2024-01-15', 4, 225, 0, 25000),
(4, 2, '2024-01-15', 4, 226, 0, 20000),
(5, 2, '2024-01-15', 4, 227, 0, 30000),
(6, 2, '2024-01-16', 4, 229, 0, 30000),
(7, 2, '2024-01-16', 4, 230, 0, 20000),
(8, 2, '2024-01-16', 4, 231, 0, 20000),
(9, 2, '2024-01-17', 4, 233, 0, 15000),
(10, 2, '2024-01-17', 4, 234, 0, 30000),
(11, 2, '2024-01-17', 4, 235, 0, 25000),
(12, 2, '2024-01-18', 4, 237, 0, 25000),
(13, 2, '2024-01-18', 4, 238, 0, 20000),
(14, 2, '2024-01-18', 4, 239, 0, 15000),
(15, 2, '2024-01-19', 4, 241, 0, 20000),
(16, 2, '2024-01-19', 4, 242, 0, 25000),
(17, 2, '2024-01-19', 4, 243, 0, 25000),
(18, 2, '2024-01-22', 4, 245, 0, 20000),
(19, 2, '2024-01-22', 4, 246, 0, 20000),
(20, 2, '2024-01-22', 4, 247, 0, 15000),
(21, 2, '2024-01-23', 4, 249, 0, 20000),
(22, 2, '2024-01-23', 4, 250, 0, 25000),
(23, 2, '2024-01-23', 4, 251, 0, 20000),
(24, 2, '2024-01-24', 4, 253, 0, 20000),
(25, 2, '2024-01-24', 4, 254, 0, 30000),
(26, 2, '2024-01-24', 4, 255, 0, 20000),
(27, 2, '2024-01-25', 4, 257, 0, 25000),
(28, 2, '2024-01-25', 4, 258, 0, 15000),
(29, 2, '2024-01-25', 4, 259, 0, 25000),
(30, 2, '2024-01-26', 4, 261, 0, 25000),
(31, 2, '2024-01-26', 4, 262, 0, 20000),
(32, 2, '2024-01-26', 4, 263, 0, 30000),
(33, 2, '2024-01-15', 3, 248, 0, 30000),
(34, 2, '2024-01-16', 3, 252, 0, 25000),
(35, 2, '2024-01-17', 3, 256, 0, 20000),
(36, 2, '2024-01-18', 3, 260, 0, 25000),
(37, 2, '2024-01-19', 3, 264, 0, 25000),
(38, 2, '2024-01-22', 3, 248, 0, 20000),
(39, 2, '2024-01-23', 3, 252, 0, 20000),
(40, 2, '2024-01-24', 3, 256, 0, 30000),
(41, 2, '2024-01-25', 3, 260, 0, 30000),
(42, 2, '2024-01-26', 3, 264, 0, 30000),
(43, 2, '2024-01-15', 1, 215, 0, 45000),
(44, 2, '2024-01-16', 1, 216, 0, 45000),
(45, 2, '2024-01-17', 1, 217, 0, 45000),
(46, 2, '2024-01-18', 1, 218, 0, 45000),
(47, 2, '2024-01-19', 1, 219, 0, 45000),
(48, 2, '2024-01-22', 1, 220, 0, 45000),
(49, 2, '2024-01-23', 1, 221, 0, 45000),
(50, 2, '2024-01-24', 1, 222, 0, 45000),
(51, 2, '2024-01-25', 1, 223, 0, 45000),
(52, 2, '2024-01-26', 1, 224, 0, 45000),
(53, 2, '2024-01-15', 7, 265, 215, 15000),
(54, 2, '2024-01-15', 2, 6, 215, 12000),
(55, 2, '2024-01-15', 10, 27, 215, 15000),
(56, 2, '2024-01-15', 6, 266, 215, 15000),
(57, 2, '2024-01-16', 2, 2, 216, 12000),
(58, 2, '2024-01-16', 5, 267, 216, 15000),
(59, 2, '2024-01-16', 9, 72, 216, 15000),
(60, 2, '2024-01-16', 10, 30, 216, 15000),
(61, 2, '2024-01-17', 1, 217, 0, 45000),
(62, 2, '2024-01-17', 2, 7, 217, 12000),
(63, 2, '2024-01-17', 9, 198, 217, 15000),
(64, 2, '2024-01-17', 9, 65, 217, 12000),
(65, 2, '2024-01-17', 10, 29, 217, 12000),
(66, 2, '2024-01-18', 1, 218, 0, 45000),
(67, 2, '2024-01-18', 2, 5, 218, 12000),
(68, 2, '2024-01-18', 5, 134, 218, 15000),
(69, 2, '2024-01-18', 9, 73, 218, 15000),
(70, 2, '2024-01-18', 10, 22, 218, 15000),
(71, 2, '2024-01-19', 1, 219, 0, 45000),
(72, 2, '2024-01-19', 2, 8, 219, 12000),
(73, 2, '2024-01-19', 6, 170, 219, 15000),
(74, 2, '2024-01-19', 9, 74, 219, 15000),
(75, 2, '2024-01-19', 10, 268, 219, 15000),
(76, 2, '2024-01-22', 1, 220, 0, 45000),
(77, 2, '2024-01-22', 2, 3, 220, 12000),
(78, 2, '2024-01-22', 5, 135, 220, 15000),
(79, 2, '2024-01-22', 9, 75, 220, 15000),
(80, 2, '2024-01-22', 10, 25, 220, 15000),
(81, 2, '2024-01-23', 1, 221, 0, 45000),
(82, 2, '2024-01-23', 2, 4, 221, 12000),
(83, 2, '2024-01-23', 6, 182, 221, 15000),
(84, 2, '2024-01-23', 9, 100, 221, 15000),
(85, 2, '2024-01-23', 10, 32, 221, 15000),
(86, 2, '2024-01-24', 1, 222, 0, 45000),
(87, 2, '2024-01-24', 2, 9, 222, 12000),
(88, 2, '2024-01-24', 7, 199, 222, 15000),
(89, 2, '2024-01-24', 9, 76, 222, 15000),
(90, 2, '2024-01-24', 10, 33, 222, 15000),
(91, 2, '2024-01-25', 1, 223, 0, 45000),
(92, 2, '2024-01-25', 2, 10, 223, 12000),
(93, 2, '2024-01-25', 5, 136, 223, 15000),
(94, 2, '2024-01-25', 9, 77, 223, 15000),
(95, 2, '2024-01-25', 10, 34, 223, 15000),
(96, 2, '2024-01-26', 1, 224, 0, 45000),
(97, 2, '2024-01-26', 1, 2, 224, 12000),
(98, 2, '2024-01-26', 6, 171, 224, 15000),
(99, 2, '2024-01-26', 9, 269, 224, 15000),
(100, 2, '2024-01-26', 10, 46, 224, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `po_purchase_meal_hdr`
--

CREATE TABLE `po_purchase_meal_hdr` (
  `id` int(11) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_purchase_meal_hdr`
--

INSERT INTO `po_purchase_meal_hdr` (`id`, `remark`, `begin_date`, `end_date`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, 'Weekly menu SWA - Bamboo Court\r\n\r\nJanuary 2024', '2024-01-15', '2024-01-26', 'ACTIVE', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_dtl`
--
ALTER TABLE `order_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_hdr`
--
ALTER TABLE `order_hdr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_purchase_meal_dtl`
--
ALTER TABLE `po_purchase_meal_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_purchase_meal_hdr`
--
ALTER TABLE `po_purchase_meal_hdr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `order_dtl`
--
ALTER TABLE `order_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `order_hdr`
--
ALTER TABLE `order_hdr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `po_purchase_meal_dtl`
--
ALTER TABLE `po_purchase_meal_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `po_purchase_meal_hdr`
--
ALTER TABLE `po_purchase_meal_hdr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
