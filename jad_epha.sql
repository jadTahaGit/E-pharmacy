-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 03:26 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jad_epha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'epharmacy@admin.com', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff');

-- --------------------------------------------------------

--
-- Table structure for table `admin_privileges`
--

CREATE TABLE `admin_privileges` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `vm` varchar(10) NOT NULL,
  `vp` varchar(10) NOT NULL,
  `anm` varchar(10) NOT NULL,
  `anp` varchar(10) NOT NULL,
  `edm` varchar(10) NOT NULL,
  `edp` varchar(10) NOT NULL,
  `vc` varchar(10) NOT NULL,
  `anc` varchar(10) NOT NULL,
  `edc` varchar(10) NOT NULL,
  `vt` varchar(10) NOT NULL,
  `ant` varchar(10) NOT NULL,
  `edt` varchar(10) NOT NULL,
  `vo` varchar(10) NOT NULL,
  `roo` varchar(10) NOT NULL,
  `vpr` varchar(10) NOT NULL,
  `rop` varchar(10) NOT NULL,
  `vs` varchar(10) NOT NULL,
  `esd` varchar(10) NOT NULL,
  `vcm` varchar(10) NOT NULL,
  `rom` varchar(10) NOT NULL,
  `vcl` varchar(10) NOT NULL,
  `dcl` varchar(10) NOT NULL,
  `vws` varchar(10) NOT NULL,
  `ews` varchar(10) NOT NULL,
  `snl` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_privileges`
--

INSERT INTO `admin_privileges` (`id`, `admin_id`, `vm`, `vp`, `anm`, `anp`, `edm`, `edp`, `vc`, `anc`, `edc`, `vt`, `ant`, `edt`, `vo`, `roo`, `vpr`, `rop`, `vs`, `esd`, `vcm`, `rom`, `vcl`, `dcl`, `vws`, `ews`, `snl`) VALUES
(2, 6, 'true', 'true', 'false', 'false', 'false', 'false', 'true', 'false', 'false', 'true', 'false', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true'),
(3, 1, 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true'),
(4, 3, 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true'),
(5, 7, 'true', 'true', 'false', 'true', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'true', 'false', 'true'),
(6, 8, 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(7, 9, 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(8, 10, 'true', 'true', 'false', 'false', 'false', 'false', 'true', 'false', 'false', 'true', 'false', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true'),
(9, 11, 'true', 'true', 'false', 'false', 'false', 'false', 'true', 'false', 'false', 'true', 'false', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `medecine_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `finish` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `medecine_id`, `user_id`, `quantity`, `finish`, `is_deleted`) VALUES
(62, 1, 33, 9, 2, 1),
(13, 1, 1, 3, 2, 1),
(9, 4, 15, 2, 2, 1),
(57, 4, 1, 4, 2, 1),
(21, 1, 18, 1, 0, 1),
(19, 2, 17, 2, 1, 1),
(20, 1, 17, 1, 1, 1),
(22, 4, 20, 3, 0, 1),
(24, 1, 20, 1, 0, 1),
(54, 7, 33, 3, 2, 1),
(28, 4, 15, 2, 2, 1),
(52, 7, 15, 3, 0, 0),
(31, 4, 15, 2, 2, 1),
(83, 29, 35, 1, 2, 1),
(34, 4, 15, 2, 2, 1),
(67, 3, 33, 7, 2, 1),
(36, 6, 1, 1, 2, 1),
(66, 4, 33, 9, 2, 1),
(38, 4, 15, 2, 2, 1),
(39, 1, 1, 3, 2, 1),
(40, 4, 1, 4, 2, 1),
(65, 7, 33, 3, 2, 1),
(56, 2, 1, 2, 2, 1),
(82, 58, 35, 1, 2, 1),
(69, 1, 37, 9, 0, 0),
(70, 4, 37, 7, 0, 0),
(71, 1, 38, 1, 2, 1),
(72, 4, 38, 1, 2, 1),
(73, 2, 38, 1, 2, 1),
(74, 4, 33, 1, 2, 1),
(75, 4, 33, 1, 1, 0),
(103, 44, 35, 4, 2, 1),
(80, 1, 33, 1, 1, 0),
(79, 4, 33, 1, 1, 0),
(84, 25, 35, 1, 2, 1),
(85, 34, 35, 1, 2, 1),
(86, 63, 35, 1, 2, 1),
(87, 41, 35, 1, 2, 1),
(88, 45, 35, 1, 2, 1),
(89, 54, 35, 1, 2, 1),
(90, 60, 35, 1, 2, 1),
(91, 92, 35, 1, 2, 1),
(92, 80, 35, 1, 2, 1),
(93, 72, 35, 1, 2, 1),
(94, 70, 35, 1, 2, 1),
(95, 69, 35, 1, 2, 1),
(96, 71, 35, 1, 2, 1),
(97, 77, 35, 1, 2, 1),
(98, 82, 35, 1, 2, 1),
(99, 67, 35, 1, 2, 1),
(104, 1, 41, 1, 1, 0),
(105, 2, 41, 1, 1, 0),
(106, 92, 42, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_temp`
--

CREATE TABLE `cart_temp` (
  `id` int(11) NOT NULL,
  `medecine_id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_temp`
--

INSERT INTO `cart_temp` (`id`, `medecine_id`, `session_id`, `quantity`) VALUES
(37, 2, '2dj9rfqtnjae8h9gnpfv6790r2', 6),
(38, 4, '2dj9rfqtnjae8h9gnpfv6790r2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `pharmacy_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `pharmacy_type`, `name`) VALUES
(1, 1, 'Medicine & Treatments'),
(2, 1, 'Vitamins & Suppliments'),
(3, 1, 'Diabetic Care'),
(4, 1, 'First Aid'),
(5, 2, 'Beauty'),
(6, 2, 'Baby Products'),
(7, 2, 'Sport'),
(8, 2, 'Animal Productsss');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `subscribe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `telephone`, `sex`, `address`, `city`, `subscribe`) VALUES
(1, 1, '78938305', 'M', 'beirut', 'beirut', 0),
(2, 2, '78938305', 'M', 'beirut', 'beirut', 0),
(3, 3, '78938305', 'M', 'beirut', 'beirut', 0),
(4, 4, '78938305', 'M', 'beirut', 'beirut', 0),
(5, 5, '78938305', 'M', 'beirut', 'beirut', 0),
(6, 6, '78938305', 'M', 'beirut', 'beirut', 0),
(7, 7, '78938305', 'M', 'beirut', 'beirut', 0),
(8, 8, '78938305', 'M', 'beirut', 'beirut', 0),
(9, 9, '78938305', 'M', 'street', 'beirut', 0),
(10, 10, '78938305', 'M', 'beirut', 'beirut', 0),
(11, 11, '78938305', 'M', 'beirut', 'beirut', 0),
(12, 12, '78938305', 'M', 'beirut', 'beirut', 0),
(13, 13, '78938305', 'M', 'beirut', 'Beirut', 0),
(14, 14, '78938305', 'M', 'beirut', 'Beirut', 0),
(15, 15, '03123456', 'F', 'saida', 'Saida', 0),
(16, 17, '03123456', 'M', 'Nabatieh', 'Nabatieh', 0),
(17, 18, '78123456', 'F', 'nabatieh', 'nabatieh', 0),
(18, 19, '76159632', 'M', 'nabatieh', 'nabatieh', 0),
(19, 20, '03123456', 'F', 'India', 'India', 0),
(20, 21, '76123456', 'M', 'france', 'paris', 0),
(21, 22, '03123457', 'M', 'Nabatieh', 'Nabatieh', 0),
(22, 23, '03123456', 'M', 'test', 'test', 0),
(23, 24, '03123456', 'M', 'test', 'test', 0),
(24, 25, '03123456', 'M', 'test', 'test', 0),
(25, 26, '03123456', 'M', 'test', 'test', 0),
(26, 27, '03123456', 'M', 'test', 'test', 0),
(27, 28, '03123456', 'M', 'test', 'test', 0),
(28, 29, '03123456', 'M', 'test', 'test', 0),
(29, 30, '03123456', 'M', 'saida', 'saida', 0),
(30, 31, '03123456', 'M', 'saida', 'saida', 0),
(31, 32, '03123456', 'M', 'saida', 'saida', 0),
(32, 33, '71728348', 'M', 'Saida', 'abra', 0),
(33, 34, '71039605', 'M', 'Dalhoun ', 'Dalhoun ', 0),
(34, 35, '78938305', 'M', 'Houmine', 'Houmine', 0),
(35, 36, '03452136', 'M', 'Beirut', 'Beirut', 0),
(36, 37, '03450769', 'M', 'Abra', 'Saida', 1),
(37, 38, '81629814', 'M', '20 rue de la marne', 'Brest', 0),
(38, 39, '70816730', 'M', 'Saida', 'Saida', 1),
(39, 40, '71853079', 'M', 'Saida', 'Saida', 1),
(40, 41, '70004307', 'M', 'hello', 'abu dhabi', 0),
(41, 42, '03123456', 'M', 'Germany', 'Germany', 0),
(42, 43, '03014525', 'M', 'Freilasinger Strasse', 'Munich', 0),
(43, 44, '03014525', 'M', 'Freilasinger Strasse', 'Munich', 0),
(44, 45, '03589412', 'M', 'Freilasinger Strasse', 'Munich', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `date_time`) VALUES
(1, 'Jad Taha', 'test@gmail.com', '03123456', 'test', '2021-06-06 15:20:42'),
(2, 'Jado', 'jad@gmail.com', '76123456', 'test', '2021-06-06 15:20:42'),
(3, 'Test', 'test@gmail.com', '76123456', 'this is the message', '2021-06-06 15:20:42'),
(4, 'jado', 'taha@gmail.com', '03521478', 'Test\nTest\nTest test test\nTest multiple lines', '2021-06-06 15:27:13'),
(10, 'XSS', 'XSS@gmail.com', '03123456', '<b>XSS in BOLD</b>\n<h1>Heading 1</h1>', '2021-06-25 21:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `forgetpassword`
--

CREATE TABLE `forgetpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liked_medecines`
--

CREATE TABLE `liked_medecines` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medecine_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked_medecines`
--

INSERT INTO `liked_medecines` (`id`, `user_id`, `medecine_id`) VALUES
(10, 15, 2),
(6, 1, 1),
(9, 15, 1),
(11, 17, 6),
(14, 1, 2),
(20, 33, 2),
(17, 1, 4),
(19, 33, 1),
(21, 33, 4),
(24, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medcine`
--

CREATE TABLE `medcine` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price` int(11) NOT NULL,
  `picture_front` varchar(255) NOT NULL,
  `picture_back` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medcine`
--

INSERT INTO `medcine` (`id`, `type_id`, `name`, `description`, `price`, `picture_front`, `picture_back`) VALUES
(1, 4, 'Panadol Advance', 'Panadol Advance 500 mg Tablets are a mild analgesic and antipyretic, and are recommended for the treatment of most painful and febrile conditions, for example, headache including migraine and tension headaches, toothache, backache, rheumatic and muscle pains, dysmenorrhoea, sore throat, and for relieving the fever.', 4, 'panadoladvancefront.jpg', 'panadoladvanceback.jpg'),
(2, 4, 'Panadol Extra', 'Panadol Extra with Optizorb is ideal for those who want the benefits of Panadol, plus a little more pain relieving effect on tough pain.', 5, 'panadolextrafront.jpg', 'panadolextrafront.jpg'),
(3, 5, 'Advil 200mg', 'Advil Anti-Allergy contains fluticasone propionate, a corticosteroid which, when used daily, relieves allergic symptoms.', 9, 'otrivine.jpg', 'otrivine.jpg'),
(4, 6, 'Advil', 'Advil is a prescription medicine used to treat the symptoms of many different infections caused by bacteria such as lower respiratory tract infections, chronic obstructive pulmonary disease, bacterial sinusitis, animal/human bite wounds, and skin infections. Augmentin may be used alone or with other medications.', 10, 'augmentin.jpg', 'augmentin.jpg'),
(5, 7, 'Panadol Joint ', 'Food supplement based on vitamin D3 which helps maintain the immune system and protect bones and teeth.', 4, 'biform.jpg', 'biform.jpg'),
(6, 17, 'Panadol Joint', 'Food supplement based on vitamin D3 which helps maintain the immune system and protect bones and teeth.', 13, 'biform.jpg', 'biform.jpg'),
(7, 7, 'vitamine bio', 'test', 12, 'biform.jpg', 'biform.jpg'),
(17, 11, 'Test Quantity', 'test', 12, 'front_17.jpg', 'back_17.jpg'),
(76, 14, 'Bioderma', 'Hair care is an overall term for hygiene and cosmetology involving the hair which grows from the human scalp, and to a lesser extent facial, pubic and other body hair. Hair may be colored, trimmed, shaved, plucked or otherwise removed with treatments such as waxing, sugaring and threading.', 10, 'front_76.jpg', 'back_76.jpg'),
(25, 9, 'Alfa', 'Vitamin K refers to a group of fat-soluble vitamins that play a role in blood clotting, bone metabolism, and regulating blood calcium levels. The body needs vitamin K to produce prothrombin, a protein and clotting factor that is important in blood clotting and bone metabolism.', 9, 'front_25.jpg', 'back_25.jpg'),
(26, 9, 'Pure K', 'Vitamin K refers to a group of fat-soluble vitamins that play a role in blood clotting, bone metabolism, and regulating blood calcium levels. The body needs vitamin K to produce prothrombin, a protein and clotting factor that is important in blood clotting and bone metabolism.', 7, 'front_26.jpg', 'back_26.jpg'),
(27, 9, 'Ultra-K', 'Vitamin K refers to a group of fat-soluble vitamins that play a role in blood clotting, bone metabolism, and regulating blood calcium levels. The body needs vitamin K to produce prothrombin, a protein and clotting factor that is important in blood clotting and bone metabolism.', 16, 'front_27.png', 'back_27.png'),
(28, 8, 'Cetramine', 'An essential nutrient found mainly in fruits and vegetables. The body requires vitamin C to form and maintain bones, blood vessels, and skin. Vitamin C is also known as ascorbic acid. Vitamin C is a water-soluble vitamin, one that cannot be stored by the body except in insignificant amounts.', 4, 'front_28.jpg', 'back_28.jpg'),
(29, 8, 'C-Will', 'vitaminec', 9, 'front_29.png', 'back_29.png'),
(30, 8, 'Fytostar', 'An essential nutrient found mainly in fruits and vegetables. The body requires vitamin C to form and maintain bones, blood vessels, and skin. Vitamin C is also known as ascorbic acid. Vitamin C is a water-soluble vitamin, one that cannot be stored by the body except in insignificant amounts.', 7, 'front_30.jpg', 'back_30.jpg'),
(32, 8, 'Strepsils', 'An essential nutrient found mainly in fruits and vegetables. The body requires vitamin C to form and maintain bones, blood vessels, and skin. Vitamin C is also known as ascorbic acid. Vitamin C is a water-soluble vitamin, one that cannot be stored by the body except in insignificant amounts.', 5, 'front_32.jpg', 'back_32.jpg'),
(33, 8, 'UPSA-C', 'An essential nutrient found mainly in fruits and vegetables. The body requires vitamin C to form and maintain bones, blood vessels, and skin. Vitamin C is also known as ascorbic acid. Vitamin C is a water-soluble vitamin, one that cannot be stored by the body except in insignificant amounts.', 17, 'front_33.png', 'back_33.png'),
(34, 13, 'Care Plus', 'In case of emergencies when first aid is only the beginning of care, people should be prepared to give emergency personnel all of their current and past medical history (see below for methods).', 18, 'front_34.jpg', 'back_34.jpg'),
(35, 13, 'Nostalgic-Art', 'In case of emergencies when first aid is only the beginning of care, people should be prepared to give emergency personnel all of their current and past medical history (see below for methods).', 14, 'front_35.png', 'back_35.png'),
(36, 12, 'Mercurochrome', 'Ready-made first aid kits are commercially available from chain stores or outdoor retailers. But you can make a simple and inexpensive first aid kit yourself.', 3, 'front_36.png', 'back_36.png'),
(37, 12, 'Soft Next', 'Ready-made first aid kits are commercially available from chain stores or outdoor retailers. But you can make a simple and inexpensive first aid kit yourself.', 8, 'front_37.jpg', 'back_37.jpg'),
(38, 12, 'Sunware Trousse', 'Ready-made first aid kits are commercially available from chain stores or outdoor retailers. But you can make a simple and inexpensive first aid kit yourself.', 23, 'front_38.jpg', 'back_38.jpg'),
(39, 4, 'Aciclovir Teva', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 14, 'front_39.png', 'back_39.png'),
(40, 4, 'Aspirine', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 6, 'front_40.jpg', 'back_40.jpg'),
(41, 4, 'Daflagan', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 9, 'front_41.png', 'back_41.png'),
(42, 4, 'Excederyn', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 3, 'front_42.jpg', 'back_42.jpg'),
(43, 4, 'Ibuprofen', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 16, 'front_43.png', 'back_43.png'),
(44, 4, 'Nurofen', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 17, 'front_44.jpg', 'back_44.jpg'),
(45, 4, 'Paracetamol', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 15, 'front_45.png', 'back_45.png'),
(46, 4, 'Pedrofermina', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 10, 'front_46.jpg', 'back_46.jpg'),
(47, 4, 'Perdolan', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 7, 'front_47.png', 'back_47.png'),
(48, 4, 'Spidifen', 'You have a fever when your temperature rises above its normal range. What is normal for you may be a little higher or lower than the average normal temperature of 98.6 F (37 C).', 6, 'front_48.jpg', 'back_48.jpg'),
(49, 10, 'Contour Next', 'Glimepiride and Pioglitazone are oral diabetes medicines that help control blood sugar levels.\nPioglitazone/Glimepiride is used together with diet and exercise to improve blood sugar control in adults with type 2 diabetes.', 20, 'front_49.jpg', 'back_49.jpg'),
(50, 10, 'Contour XT', 'Glimepiride and Pioglitazone are oral diabetes medicines that help control blood sugar levels.\nPioglitazone/Glimepiride is used together with diet and exercise to improve blood sugar control in adults with type 2 diabetes.', 29, 'front_50.jpg', 'back_50.jpg'),
(51, 10, 'Microlet', 'Glimepiride and Pioglitazone are oral diabetes medicines that help control blood sugar levels.\nPioglitazone/Glimepiride is used together with diet and exercise to improve blood sugar control in adults with type 2 diabetes.', 12, 'front_51.png', 'back_51.png'),
(52, 11, 'Accu Fine', 'Accu Fine Pen Needles provide gentle injections for everyone, regardless of gender, age or BMI. The sterile needles fit all common insulin pens.', 4, 'front_52.jpg', 'back_52.jpg'),
(53, 11, 'Micro Fine', 'Avandaryl is a prescription medication used to treat type 2 diabetes. It is a single tablet containing two different medications, glimepiride and rosiglitazone. Glimepiride belongs to a group of drugs called sulfonylureas. It can help your body release more of its own insulin.', 6, 'front_53.png', 'back_53.png'),
(54, 6, 'Fucidin', 'Antibiotics are medicines that fight bacterial infections in people and animals. They work by killing the bacteria or by making it hard for the bacteria to grow and multiply. Antibiotics can be taken in different ways: Orally (by mouth). This could be pills, capsules, or liquids.', 5, 'front_54.png', 'back_54.png'),
(55, 6, 'Perio-Aid', 'Antibiotics are medicines that fight bacterial infections in people and animals. They work by killing the bacteria or by making it hard for the bacteria to grow and multiply. Antibiotics can be taken in different ways: Orally (by mouth). This could be pills, capsules, or liquids.', 9, 'front_55.jpg', 'back_55.jpg'),
(56, 6, 'Strepsils', 'Antibiotics are medicines that fight bacterial infections in people and animals. They work by killing the bacteria or by making it hard for the bacteria to grow and multiply. Antibiotics can be taken in different ways: Orally (by mouth). This could be pills, capsules, or liquids.', 8, 'front_56.jpg', 'back_56.jpg'),
(57, 6, 'Terramycine', 'Antibiotics are medicines that fight bacterial infections in people and animals. They work by killing the bacteria or by making it hard for the bacteria to grow and multiply. Antibiotics can be taken in different ways: Orally (by mouth). This could be pills, capsules, or liquids.', 7, 'front_57.png', 'back_57.png'),
(58, 5, 'Allegra', 'Allergies are your bodys reaction to a normally harmless substance such as pollen, molds, animal dander, latex, certain foods and insect stings. Allergy symptoms range from mild rash or hives, itchiness, runny nose, watery/red eyes to life-threatening.', 10, 'front_58.jpg', 'back_58.jpg'),
(59, 5, 'Allergodil', 'Allergies are your bodys reaction to a normally harmless substance such as pollen, molds, animal dander, latex, certain foods and insect stings. Allergy symptoms range from mild rash or hives, itchiness, runny nose, watery/red eyes to life-threatening.', 7, 'front_59.jpg', 'back_59.jpg'),
(60, 5, 'Centizine', 'Allergies are your bodys reaction to a normally harmless substance such as pollen, molds, animal dander, latex, certain foods and insect stings. Allergy symptoms range from mild rash or hives, itchiness, runny nose, watery/red eyes to life-threatening.', 10, 'front_60.png', 'back_60.png'),
(61, 5, 'Cirrus', 'Allergies are your bodys reaction to a normally harmless substance such as pollen, molds, animal dander, latex, certain foods and insect stings. Allergy symptoms range from mild rash or hives, itchiness, runny nose, watery/red eyes to life-threatening.', 4, 'front_61.png', 'back_61.png'),
(62, 5, 'Otrivine', 'Otrivine Anti-Allergy contains fluticasone propionate, a corticosteroid which, when used daily, relieves allergic symptoms.', 9, 'front_62.jpg', 'back_62.jpg'),
(63, 18, 'Covarmed Pince', 'A variety of animal supplies and pet accessories are also sold in pet shops. The products sold include: food, treats, toys, collars, leashes, cat litter, cages and aquariums.', 2, 'front_63.png', 'back_63.png'),
(64, 18, 'MP Neutrox', 'A variety of animal supplies and pet accessories are also sold in pet shops. The products sold include: food, treats, toys, collars, leashes, cat litter, cages and aquariums.', 5, 'front_64.jpg', 'back_64.jpg'),
(65, 18, 'Nippes Pince', 'A variety of animal supplies and pet accessories are also sold in pet shops. The products sold include: food, treats, toys, collars, leashes, cat litter, cages and aquariums.', 12, 'front_65.jpg', 'back_65.jpg'),
(66, 18, 'Vetrap Bleu', 'A variety of animal supplies and pet accessories are also sold in pet shops. The products sold include: food, treats, toys, collars, leashes, cat litter, cages and aquariums.', 6, 'front_66.jpg', 'back_66.jpg'),
(67, 18, 'Vity Pet Care', 'animal', 14, 'front_67.jpg', 'back_67.jpg'),
(68, 18, 'VMD Pince', 'A variety of animal supplies and pet accessories are also sold in pet shops. The products sold include: food, treats, toys, collars, leashes, cat litter, cages and aquariums.', 7, 'front_68.jpg', 'back_68.jpg'),
(69, 16, 'Avent Sterilisateur', 'The term infant care refers to the social welfare service concerning support for nursery facilities. and home fostering, taking care of and nurturing from 0 to 5 year old infants in a healthy and safe.', 12, 'front_69.jpg', 'back_69.jpg'),
(70, 16, 'Avent Trousse', 'The term infant care refers to the social welfare service concerning support for nursery facilities. and home fostering, taking care of and nurturing from 0 to 5 year old infants in a healthy and safe.', 10, 'front_70.png', 'back_70.png'),
(71, 16, 'Bibs 3 Glow in the Dark', 'The term infant care refers to the social welfare service concerning support for nursery facilities. and home fostering, taking care of and nurturing from 0 to 5 year old infants in a healthy and safe.', 9, 'front_71.jpg', 'back_71.jpg'),
(72, 16, 'Braun Mouche', 'The term infant care refers to the social welfare service concerning support for nursery facilities. and home fostering, taking care of and nurturing from 0 to 5 year old infants in a healthy and safe.', 19, 'front_72.jpg', 'back_72.jpg'),
(73, 16, 'Nattou Anneau', 'The term infant care refers to the social welfare service concerning support for nursery facilities. and home fostering, taking care of and nurturing from 0 to 5 year old infants in a healthy and safe.', 13, 'front_73.png', 'back_73.png'),
(74, 16, 'Noukie Ma Premiere', 'The term infant care refers to the social welfare service concerning support for nursery facilities. and home fostering, taking care of and nurturing from 0 to 5 year old infants in a healthy and safe.', 5, 'front_74.png', 'back_74.png'),
(75, 14, 'Adephare Brosse', 'Hair care is an overall term for hygiene and cosmetology involving the hair which grows from the human scalp, and to a lesser extent facial, pubic and other body hair. Hair may be colored, trimmed, shaved, plucked or otherwise removed with treatments such as waxing, sugaring and threading.', 4, 'front_75.jpg', 'back_75.jpg'),
(77, 14, 'Ducray Shampooing', 'Hair care is an overall term for hygiene and cosmetology involving the hair which grows from the human scalp, and to a lesser extent facial, pubic and other body hair. Hair may be colored, trimmed, shaved, plucked or otherwise removed with treatments such as waxing, sugaring and threading.', 14, 'front_77.jpg', 'back_77.jpg'),
(78, 14, 'Vichy Energisant', 'Hair care is an overall term for hygiene and cosmetology involving the hair which grows from the human scalp, and to a lesser extent facial, pubic and other body hair. Hair may be colored, trimmed, shaved, plucked or otherwise removed with treatments such as waxing, sugaring and threading.', 10, 'front_78.jpg', 'back_78.jpg'),
(79, 14, 'Vichy Neogenic', 'Hair care is an overall term for hygiene and cosmetology involving the hair which grows from the human scalp, and to a lesser extent facial, pubic and other body hair. Hair may be colored, trimmed, shaved, plucked or otherwise removed with treatments such as waxing, sugaring and threading.', 15, 'front_79.jpg', 'back_79.jpg'),
(80, 15, 'Dettol Gel', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients', 8, 'front_80.jpg', 'back_80.jpg'),
(81, 15, 'Dettol No-Touch', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients', 7, 'front_81.jpg', 'back_81.jpg'),
(82, 15, 'Eucerin pH5 Huile', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients', 4, 'front_82.jpg', 'back_82.jpg'),
(83, 15, 'Nivea Creme', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients', 17, 'front_83.jpg', 'back_83.jpg'),
(84, 15, 'Pure Clean Gel', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients', 9, 'front_84.jpg', 'back_84.jpg'),
(85, 15, 'Sterillium Med', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients', 15, 'front_85.jpg', 'back_85.jpg'),
(86, 17, 'DermaPlast Active', 'Sports medicine focuses on helping people improve their athletic performance, recover from injury and prevent future injuries. It is a fast growing health care field, because health workers who specialize in sports medicine help all kinds of people, not just athletes.', 14, 'front_86.jpg', 'back_86.jpg'),
(90, 17, 'Epitact Protections', 'Sports medicine focuses on helping people improve their athletic performance, recover from injury and prevent future injuries. It is a fast growing health care field, because health workers who specialize in sports medicine help all kinds of people, not just athletes.', 13, 'front_90.jpg', 'back_90.jpg'),
(89, 17, 'EasyTape Therapeutic', 'Sports medicine focuses on helping people improve their athletic performance, recover from injury and prevent future injuries. It is a fast growing health care field, because health workers who specialize in sports medicine help all kinds of people, not just athletes.', 10, 'front_89.jpg', 'back_89.jpg'),
(91, 17, 'Futuro Bandage', 'Sports medicine focuses on helping people improve their athletic performance, recover from injury and prevent future injuries. It is a fast growing health care field, because health workers who specialize in sports medicine help all kinds of people, not just athletes.', 39, 'front_91.jpg', 'back_91.jpg'),
(92, 17, 'Futuro Ceinture', 'Sports medicine focuses on helping people improve their athletic performance, recover from injury and prevent future injuries. It is a fast growing health care field, because health workers who specialize in sports medicine help all kinds of people, not just athletes.', 19, 'front_92.jpg', 'back_92.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `info`, `status`, `date_time`) VALUES
(1, 'New contact message recieved!', 1, '2021-06-06 17:14:38'),
(2, 'New contact message recieved!', 1, '2021-06-07 16:22:37'),
(3, 'New contact message recieved!', 1, '2021-06-11 13:59:08'),
(4, 'New contact message recieved!', 1, '2021-06-12 12:26:10'),
(5, 'New contact message recieved!', 1, '2021-06-24 11:41:34'),
(6, 'New contact message recieved!', 1, '2021-06-25 21:15:05'),
(7, 'New contact message recieved!', 1, '2021-06-29 13:40:11'),
(8, 'New order received!', 1, '2021-07-02 10:22:10'),
(9, 'New order received!', 1, '2021-07-04 14:05:37'),
(10, 'New order received!', 1, '2021-07-04 14:22:26'),
(11, 'New order received!', 1, '2021-07-04 14:22:31'),
(12, 'New order received!', 1, '2021-07-05 10:32:33'),
(13, 'New contact message received!', 1, '2021-07-05 11:22:22'),
(14, 'New contact message received!', 1, '2021-07-05 12:48:19'),
(15, 'New contact message received!', 1, '2021-07-05 12:48:56'),
(16, 'New contact message received!', 1, '2021-07-05 12:49:23'),
(17, 'New contact message received!', 1, '2021-07-08 07:35:18'),
(18, 'New Prescription received!', 1, '2021-07-10 12:00:24'),
(19, 'New Prescription received!', 1, '2021-07-10 12:02:01'),
(20, 'New Prescription received!', 1, '2021-07-10 12:02:45'),
(21, 'New contact message received!', 1, '2021-07-10 12:03:42'),
(22, 'New contact message received!', 1, '2021-07-10 14:24:04'),
(23, 'New order received!', 1, '2021-07-10 14:30:33'),
(24, 'Only 2 Panadol Advance left!', 1, '2021-07-10 14:32:01'),
(25, 'Only 1 Otrivine left!', 1, '2021-07-10 14:32:01'),
(26, 'Only -3 Augmentin left!', 1, '2021-07-10 14:32:01'),
(27, 'Only -1 Panadol Extra left!', 1, '2021-07-10 14:32:01'),
(28, 'New order received!', 1, '2021-07-10 14:32:01'),
(29, 'New order received!', 1, '2021-07-10 14:45:02'),
(30, 'New contact message received!', 1, '2021-07-10 18:14:53'),
(31, 'New contact message received!', 1, '2021-07-10 18:36:32'),
(32, 'New contact message received!', 1, '2021-07-10 18:43:39'),
(33, 'New order received!', 1, '2021-07-10 19:45:44'),
(34, 'New contact message received!', 1, '2021-07-11 06:28:09'),
(35, 'New contact message received!', 1, '2021-07-11 13:02:43'),
(36, 'New contact message received!', 1, '2021-07-11 17:52:01'),
(37, 'New contact message received!', 1, '2021-07-11 17:53:28'),
(38, 'New order received!', 1, '2021-07-11 18:38:52'),
(39, 'New order received!', 1, '2021-07-11 18:46:17'),
(40, 'New order received!', 1, '2021-07-11 18:47:57'),
(41, 'Only 0 Panadol Extra left!', 1, '2021-07-11 18:49:01'),
(42, 'Only -4 Panadol Extra left!', 1, '2021-07-11 18:49:01'),
(43, 'New order received!', 1, '2021-07-11 18:49:01'),
(44, 'New contact message received!', 1, '2021-07-12 08:08:40'),
(45, 'New order received!', 1, '2021-07-12 08:10:11'),
(46, 'New contact message received!', 1, '2021-07-12 12:55:29'),
(47, 'New contact message received!', 1, '2021-07-12 18:58:15'),
(48, 'New contact message received!', 1, '2021-07-12 19:01:51'),
(49, 'New Prescription received!', 1, '2021-07-12 19:08:03'),
(50, 'New contact message received!', 1, '2021-07-12 19:31:59'),
(51, 'New order received!', 1, '2021-07-13 15:45:43'),
(52, 'New order received!', 1, '2021-07-13 15:52:04'),
(53, 'New order received!', 1, '2021-07-13 16:33:42'),
(54, 'New Prescription received!', 1, '2021-07-13 17:02:05'),
(55, 'New Prescription received!', 1, '2021-07-13 17:02:44'),
(56, 'New Prescription received!', 1, '2021-07-13 18:43:57'),
(57, 'New contact message received!', 1, '2021-07-14 05:47:10'),
(58, 'New Prescription received!', 1, '2021-07-14 05:54:56'),
(59, 'New order received!', 1, '2021-07-14 05:57:50'),
(60, 'Only 0 Panadol Advance left!', 1, '2021-08-19 10:33:16'),
(61, 'New order received!', 1, '2021-08-19 10:33:16'),
(62, 'New contact message received!', 1, '2021-08-24 19:42:12'),
(63, 'New order received!', 1, '2021-08-24 19:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `delivery_method` int(11) NOT NULL,
  `delivery_comment` text NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_comment` text NOT NULL,
  `confirmation` int(11) NOT NULL,
  `date_of_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `firstname`, `lastname`, `email`, `telephone`, `sex`, `address`, `city`, `delivery_method`, `delivery_comment`, `payment_method`, `payment_comment`, `confirmation`, `date_of_order`, `is_deleted`) VALUES
(18, 17, 'Test', 'Test', 'jadtest@gmail.com', '03123456', 'M', 'Germany', 'berlin', 1, 'This is the comment...', 2, 'This is the comment...', 2, '2021-05-30 10:09:46', 1),
(41, 15, 'Taha', 'Sarah', 'adam@gmail.com', '03123456', 'F', 'lebanon', 'tyre', 1, '', 1, '', 2, '2021-06-24 11:20:00', 1),
(67, 42, 'Jad', 'Taha', 'jadtaha.de@gmail.com', '03123456', 'M', 'Germany', 'Germany', 1, '', 1, '', 2, '2021-08-24 19:51:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prescription_pic` varchar(250) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `user_id`, `prescription_pic`, `date_time`) VALUES
(12, 15, 'prescription_15.jpg', '2021-06-19 12:21:19'),
(17, 33, 'prescription_33.jfif', '2021-07-13 17:02:05'),
(20, 35, 'prescription_35.png', '2021-07-14 05:54:56'),
(16, 33, 'prescription_33.jpeg', '2021-07-12 19:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `medecine_id` int(11) NOT NULL,
  `new_price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `medecine_id`, `new_price`) VALUES
(1, 1, 3),
(2, 2, 4),
(9, 92, 9),
(5, 4, 9),
(10, 80, 5),
(11, 72, 14);

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medecine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `user_id`, `medecine_id`, `quantity`, `date_time`) VALUES
(1, 15, 7, 3, '2021-06-16 20:13:00'),
(2, 15, 4, 5, '2021-06-16 20:13:00'),
(3, 15, 3, 2, '2021-06-16 20:13:00'),
(4, 15, 1, 5, '2021-06-16 20:13:00'),
(37, 15, 6, 1, '2021-06-17 15:29:08'),
(36, 15, 1, 1, '2021-06-17 15:29:08'),
(35, 15, 4, 1, '2021-06-17 15:29:08'),
(44, 15, 1, 1, '2021-07-02 10:22:28'),
(43, 15, 2, 2, '2021-06-24 14:27:14'),
(42, 15, 1, 3, '2021-06-24 14:27:14'),
(41, 15, 4, 2, '2021-06-19 12:25:44'),
(40, 15, 1, 3, '2021-06-19 12:25:44'),
(39, 15, 6, 1, '2021-06-17 15:35:12'),
(38, 15, 4, 1, '2021-06-17 15:35:12'),
(24, 15, 2, 2, '2021-06-17 15:17:45'),
(25, 15, 4, 1, '2021-06-17 15:17:45'),
(45, 33, 7, 7, '2021-07-04 14:11:33'),
(46, 33, 1, 9, '2021-07-10 14:32:27'),
(47, 33, 3, 7, '2021-07-10 14:32:27'),
(48, 33, 4, 9, '2021-07-10 14:32:27'),
(49, 33, 7, 3, '2021-07-10 14:32:27'),
(50, 33, 2, 9, '2021-07-10 14:32:27'),
(51, 33, 2, 1, '2021-07-10 14:46:18'),
(52, 38, 1, 1, '2021-07-10 20:00:01'),
(53, 38, 4, 1, '2021-07-10 20:00:01'),
(54, 38, 2, 1, '2021-07-10 20:00:01'),
(55, 33, 4, 1, '2021-07-11 18:39:40'),
(56, 1, 4, 4, '2021-07-13 15:43:51'),
(57, 1, 6, 1, '2021-07-13 15:43:51'),
(58, 1, 1, 3, '2021-07-13 15:43:51'),
(59, 1, 4, 4, '2021-07-13 15:43:51'),
(60, 1, 2, 2, '2021-07-13 15:43:51'),
(61, 35, 1, 1, '2021-07-13 15:46:38'),
(62, 35, 29, 1, '2021-07-13 15:52:29'),
(63, 35, 58, 1, '2021-07-13 15:52:29'),
(64, 35, 25, 1, '2021-07-13 15:52:29'),
(65, 35, 34, 1, '2021-07-13 15:52:29'),
(66, 35, 63, 1, '2021-07-13 15:52:29'),
(67, 35, 41, 1, '2021-07-13 15:52:29'),
(68, 35, 45, 1, '2021-07-13 15:52:29'),
(69, 35, 54, 1, '2021-07-13 15:52:29'),
(70, 35, 60, 1, '2021-07-13 15:52:29'),
(71, 35, 92, 1, '2021-07-13 16:34:20'),
(72, 35, 80, 1, '2021-07-13 16:34:20'),
(73, 35, 72, 1, '2021-07-13 16:34:20'),
(74, 35, 70, 1, '2021-07-13 16:34:20'),
(75, 35, 69, 1, '2021-07-13 16:34:20'),
(76, 35, 71, 1, '2021-07-13 16:34:20'),
(77, 35, 77, 1, '2021-07-13 16:34:20'),
(78, 35, 82, 1, '2021-07-13 16:34:20'),
(79, 35, 67, 1, '2021-07-13 16:34:20'),
(80, 35, 44, 4, '2021-07-14 06:10:38'),
(81, 42, 92, 2, '2021-08-24 20:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`id`, `user_id`, `order_id`, `amount`, `date_time`) VALUES
(1, 15, 31, 133.4, '2021-06-16 20:14:53'),
(2, 15, 34, 155.4, '2021-06-17 14:51:35'),
(3, 15, 35, 30, '2021-06-17 15:17:45'),
(4, 15, 36, 22.3, '2021-06-17 15:29:08'),
(5, 15, 37, 20.9, '2021-06-17 15:35:12'),
(6, 17, 18, 20.1, '2021-06-17 17:54:00'),
(7, 15, 39, 37.7, '2021-06-19 12:25:44'),
(8, 15, 41, 26.7, '2021-06-24 14:27:14'),
(9, 15, 42, 11.3, '2021-07-02 10:22:28'),
(10, 33, 43, 100.4, '2021-07-04 14:11:33'),
(11, 33, 53, 275.3, '2021-07-10 14:32:27'),
(12, 33, 54, 8, '2021-07-10 14:32:39'),
(13, 33, 55, 4.4, '2021-07-10 14:46:18'),
(14, 38, 56, 17.6, '2021-07-10 20:00:01'),
(15, 33, 57, 17.9, '2021-07-11 18:39:40'),
(16, 1, 40, 116.9, '2021-07-13 15:43:51'),
(17, 35, 62, 11.3, '2021-07-13 15:46:38'),
(18, 35, 63, 103.7, '2021-07-13 15:52:29'),
(19, 35, 64, 108.1, '2021-07-13 16:34:20'),
(20, 35, 65, 82.8, '2021-07-14 06:10:38'),
(21, 42, 67, 27.8, '2021-08-24 20:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `setting_about`
--

CREATE TABLE `setting_about` (
  `id` int(11) NOT NULL,
  `idea` text NOT NULL,
  `offer` text NOT NULL,
  `journey` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_about`
--

INSERT INTO `setting_about` (`id`, `idea`, `offer`, `journey`) VALUES
(1, 'In healthcare, the information around our medicines and lab tests is either unavailable or incomprehensible to us.\nSo we decided to create a platform that stood for transparent, authentic and accessible information for all.', 'We provide accurate, authoritative & trustworthy information on medicines and help people use their medicines effectively and safely.', 'We have made health care accessible to millions by giving them quality care at affordable prices.');

-- --------------------------------------------------------

--
-- Table structure for table `setting_privacy`
--

CREATE TABLE `setting_privacy` (
  `id` int(11) NOT NULL,
  `limitation` text NOT NULL,
  `privacy` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_privacy`
--

INSERT INTO `setting_privacy` (`id`, `limitation`, `privacy`) VALUES
(1, 'All product descriptions on the E-Pharmacy website are based on information from the manufacturer or supplier. Use of the displayed products is at your own risk and the results are based on personal and specific circumstances. We advise you to always read the package leaflet and / or the packaging carefully before using a product and to contact your doctor or pharmacist if in doubt. All claims made are indications based on clinical trials or the experiences of other users and make no guarantees for future use. E-Pharmacy cannot be held responsible for any side effects or for a lack of concrete results.', 'E-Pharmacy attaches great importance to respecting your privacy. E-Pharmacy is legally obliged to include your personal data in its client list. The information provided is necessary for the processing and shipping of your order and / or to respond to your request. The data in question will be saved in your user account. In addition, your data will be used for other purposes:\n\n- Improving the quality of the website, both technically and in terms of content, p. ex. through market research.\n- Improving the services of E-Pharmacy.\n- Providing information via email, such as website updates, but also recommendations and promotions that may be of interest to you, based on your previous orders with E-Pharmacy.\n\nNB: promotions in the general newsletter are not based on your previous orders. You will only receive the newsletter after registering or through express acceptance during the ordering process (via the checkbox).');

-- --------------------------------------------------------

--
-- Table structure for table `setting_terms`
--

CREATE TABLE `setting_terms` (
  `id` int(11) NOT NULL,
  `overview` text NOT NULL,
  `contact_info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_terms`
--

INSERT INTO `setting_terms` (`id`, `overview`, `contact_info`) VALUES
(1, 'This website is operated by E-Pharmacy. Throughout the site, the terms we, us and our refer to E-Pharmacy. E-Pharmacy offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.\n\nBy visiting our site and/ or purchasing something from us, you engage in our Service and agree to be bound by the following terms and conditions (Terms & Conditions, Terms), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.\n\nPlease read these Terms & Conditions carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services.\n\nAny new features or products which are added to the current store shall also be subject to the Terms & Conditions. You can review the most current version of the Terms & Conditions at any time on this page. We reserve the right to update, change or replace any part of these Terms & Conditions by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.\n\nOur store is hosted on E-Pharmacy Inc. They provide us with the online e-commerce platform that allows us to sell our products to you.', 'Questions about the Terms of Service should be sent to us at our Contact Us page.');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `medecine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `medecine_id`, `quantity`) VALUES
(1, 1, 0),
(2, 2, 19),
(3, 3, 15),
(4, 4, 16),
(5, 5, 12),
(6, 6, 15),
(7, 7, 17),
(8, 17, 30),
(67, 76, 23),
(10, 19, 10),
(14, 23, 12),
(60, 69, 5),
(16, 25, 16),
(17, 26, 20),
(18, 27, 20),
(19, 28, 9),
(20, 29, 11),
(21, 30, 20),
(23, 32, 20),
(24, 33, 20),
(25, 34, 19),
(26, 35, 20),
(27, 36, 20),
(28, 37, 20),
(29, 38, 20),
(30, 39, 20),
(31, 40, 9),
(32, 41, 12),
(33, 42, 14),
(34, 43, 20),
(35, 44, 16),
(36, 45, 19),
(37, 46, 20),
(38, 47, 20),
(39, 48, 20),
(40, 49, 19),
(41, 50, 10),
(42, 51, 20),
(43, 52, 13),
(44, 53, 20),
(45, 54, 19),
(46, 55, 20),
(47, 56, 20),
(48, 57, 20),
(49, 58, 17),
(50, 59, 15),
(51, 60, 13),
(52, 61, 7),
(53, 62, 20),
(54, 63, 19),
(55, 64, 15),
(56, 65, 14),
(57, 66, 13),
(58, 67, 6),
(59, 68, 9),
(61, 70, 13),
(62, 71, 11),
(63, 72, 14),
(64, 73, 7),
(65, 74, 10),
(66, 75, 8),
(68, 77, 11),
(69, 78, 12),
(70, 79, 7),
(71, 80, 13),
(72, 81, 8),
(73, 82, 4),
(74, 83, 10),
(75, 84, 9),
(76, 85, 15),
(77, 86, 10),
(81, 90, 21),
(80, 89, 10),
(82, 91, 8),
(83, 92, 4);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `category_id`, `name`, `description`) VALUES
(7, 2, 'Vitamin D', 'A nutrient that the body needs in small amounts to function and stay healthy. Vitamin D helps the body use calcium and phosphorus to make strong bones and teeth. It is fat-soluble (can dissolve in fats and oils) and is found in fatty fish, egg yolks, and dairy products. Skin exposed to sunshine can also make vitamin D.'),
(6, 1, 'Antibiotics', 'Antibiotics are medicines that fight bacterial infections in people and animals. They work by killing the bacteria or by making it hard for the bacteria to grow and multiply. Antibiotics can be taken in different ways: Orally (by mouth). This could be pills, capsules, or liquids.'),
(4, 1, 'Fever', 'A person has a fever if their body temperature rises above the normal range of 98 100 F (36 37 C). It is a common sign of an infection. As a person body temperature increases, they may feel cold until it levels off and stops rising.'),
(5, 1, 'Allergy', 'Allergies are your bodys reaction to a normally harmless substance such as pollen, molds, animal dander, latex, certain foods and insect stings. Allergy symptoms range from mild rash or hives, itchiness, runny nose, watery/red eyes to life-threatening.'),
(8, 2, 'Vitamin C', 'An essential nutrient found mainly in fruits and vegetables. The body requires vitamin C to form and maintain bones, blood vessels, and skin. Vitamin C is also known as ascorbic acid. Vitamin C is a water-soluble vitamin, one that cannot be stored by the body except in insignificant amounts.'),
(9, 2, 'Vitamin K', 'Vitamin K refers to a group of fat-soluble vitamins that play a role in blood clotting, bone metabolism, and regulating blood calcium levels. The body needs vitamin K to produce prothrombin, a protein and clotting factor that is important in blood clotting and bone metabolism.'),
(10, 3, 'Duetact', 'Duetact (pioglitazone / glimepiride) is a combination medication made up of pioglitazone and glimepiride. This medication is an add-on to diet and exercise to control blood sugar in people with type 2 diabetes.'),
(11, 3, 'Avandaryl', 'Avandaryl is a prescription medication used to treat type 2 diabetes. It is a single tablet containing two different medications, glimepiride and rosiglitazone. Glimepiride belongs to a group of drugs called sulfonylureas. It can help your body release more of its own insulin.'),
(12, 4, 'House First Aid', 'Ready-made first aid kits are commercially available from chain stores or outdoor retailers. But you can make a simple and inexpensive first aid kit yourself.'),
(13, 4, 'Travel First Aid', 'In case of emergencies when first aid is only the beginning of care, people should be prepared to give emergency personnel all of their current and past medical history (see below for methods).'),
(14, 5, 'Hair Care', 'Hair care is an overall term for hygiene and cosmetology involving the hair which grows from the human scalp, and to a lesser extent facial, pubic and other body hair. Hair may be colored, trimmed, shaved, plucked or otherwise removed with treatments such as waxing, sugaring and threading.'),
(15, 5, 'Skin Care', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. Skin care is a routine daily procedure in many settings, such as skin that is either too dry or too moist, and prevention of dermatitis and prevention of skin injuries.'),
(16, 6, 'Baby Care', 'The term infant care refers to the social welfare service concerning support for nursery facilities. and home fostering, taking care of and nurturing from 0 to 5 year old infants in a healthy and safe.'),
(17, 7, 'Sport nutrition', 'Sports nutrition focuses its studies on the type, as well as the quantity of fluids and food taken by an athlete. In addition, it deals with the consumption of nutrients such as vitamins, minerals, supplements and organic substances that include carbohydrates, proteins and fats.'),
(18, 8, 'Accessory', 'A variety of animal supplies and pet accessories are also sold in pet shops. The products sold include: food, treats, toys, collars, leashes, cat litter, cages and aquariums.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `verified` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `registration_date`, `verified`) VALUES
(45, 'demo', 'demo', 'demo@gmail.com', '4af067aad26ea44f30106d42e248493fa54d122f', '2021-09-17 15:19:45', 1),
(43, 'Jad', 'Taha', 'jadtaha.de@gmail.com', '561b89cd0b9dbf093f989dce1fcae9c5625f8895', '2021-09-17 15:06:34', 0),
(44, 'test', 'Taha', 'neueStell.de@gmail.com', '5eab4ae24a21d21b7cea1cd40a1814f774a47934', '2021-09-17 15:17:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `verifyemail`
--

CREATE TABLE `verifyemail` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifyemail`
--

INSERT INTO `verifyemail` (`id`, `email`, `code`) VALUES
(28, 'neueStell.de@gmail.com', 'wUVSRQaO'),
(27, 'jadtaha.de@gmail.com', '1R9UYMB6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_privileges`
--
ALTER TABLE `admin_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_temp`
--
ALTER TABLE `cart_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liked_medecines`
--
ALTER TABLE `liked_medecines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medcine`
--
ALTER TABLE `medcine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_about`
--
ALTER TABLE `setting_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_privacy`
--
ALTER TABLE `setting_privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_terms`
--
ALTER TABLE `setting_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifyemail`
--
ALTER TABLE `verifyemail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_privileges`
--
ALTER TABLE `admin_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `cart_temp`
--
ALTER TABLE `cart_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `liked_medecines`
--
ALTER TABLE `liked_medecines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `medcine`
--
ALTER TABLE `medcine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `setting_about`
--
ALTER TABLE `setting_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_privacy`
--
ALTER TABLE `setting_privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_terms`
--
ALTER TABLE `setting_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `verifyemail`
--
ALTER TABLE `verifyemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
