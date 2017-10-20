-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2017 at 02:46 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_asset`
--

CREATE TABLE `tb_asset` (
  `id` int(255) NOT NULL,
  `asset_name` varchar(100) NOT NULL,
  `asset_description` varchar(100) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_asset`
--

INSERT INTO `tb_asset` (`id`, `asset_name`, `asset_description`, `date_of_purchase`, `serial_number`, `brand`, `owner`, `status`, `image`, `location`, `pic`) VALUES
(2, 'Table', 'table amir', '2017-08-01', 'atamkta', 'mau', 'els', 'Not use', '', 't3qtq', 'tqt');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url_banner` text NOT NULL,
  `ukuran_banner` text NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `id` int(255) NOT NULL,
  `company` text NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`id`, `company`, `full_name`, `email`, `alamat`, `no_hp`) VALUES
(6, 'Petronas Company', 'Lingga', 'abdi@petronas.com', 'address is here malaysia', '01142492');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(255) NOT NULL,
  `id_produk` text NOT NULL,
  `myfile` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id` int(255) NOT NULL,
  `level` text NOT NULL,
  `slug` text NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id`, `level`, `slug`, `user`) VALUES
(1, 'Admin', 'admin', 'master'),
(5, 'Supervisor', 'supervisor', 'master'),
(4, 'Staff', 'staff', 'master'),
(7, 'project manager', 'project manager', '1601'),
(8, 'intership', 'intership', '1601');

-- --------------------------------------------------------

--
-- Table structure for table `tb_page`
--

CREATE TABLE `tb_page` (
  `id` int(255) NOT NULL,
  `slug` text NOT NULL,
  `nama_page` text NOT NULL,
  `content` longtext NOT NULL,
  `sort` int(3) NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

CREATE TABLE `tb_position` (
  `id` int(255) NOT NULL,
  `position` text NOT NULL,
  `slug` text NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_position`
--

INSERT INTO `tb_position` (`id`, `position`, `slug`, `user`) VALUES
(1, 'Supervisor', 'supervisor', 'master'),
(2, 'Enggenring', 'enggenring', 'master'),
(3, 'Project Manager', 'project manager', 'master'),
(4, 'Chairman', 'chairman', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(255) NOT NULL,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `kategori` text NOT NULL,
  `content` longtext NOT NULL,
  `author` text NOT NULL,
  `date` date NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `id` int(255) NOT NULL,
  `client` text NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `pm` text NOT NULL,
  `status` text NOT NULL,
  `project_value` bigint(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`id`, `client`, `code`, `title`, `pm`, `status`, `project_value`, `start_date`, `end_date`) VALUES
(4, 'Petronas Company', 'WO20', 'Cable ', 'FEBBY PURNAMA', 'Active', 20000000, '2017-08-01', '2017-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_project_file`
--

CREATE TABLE `tb_project_file` (
  `id` int(255) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_seo`
--

CREATE TABLE `tb_seo` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'logo.png',
  `title` text NOT NULL,
  `keyword` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gmap` text NOT NULL,
  `urlweb` text NOT NULL,
  `user` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_seo`
--

INSERT INTO `tb_seo` (`id`, `image`, `title`, `keyword`, `deskripsi`, `gmap`, `urlweb`, `user`, `date`) VALUES
(1, 'logo.png', '', '', '', '', 'http://localhost/management', 'master', '2017-02-19 20:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id` int(255) NOT NULL,
  `user` varchar(15) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `position` text NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`id`, `user`, `full_name`, `position`, `rate`) VALUES
(3, '1702', 'LINGGA ADI PRATAM', 'intership', 10),
(4, '1608', 'FEBBY PURNAMA', 'project manager', 12000),
(5, '1603', 'AMIRUDDIN', 'Staff', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE `tb_task` (
  `id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `project_title` text NOT NULL,
  `staff_name` text NOT NULL,
  `project_task` text NOT NULL,
  `supervisor` text NOT NULL,
  `progress` int(3) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_task`
--

INSERT INTO `tb_task` (`id`, `project_id`, `project_title`, `staff_name`, `project_task`, `supervisor`, `progress`, `start_date`, `end_date`, `user`, `status`) VALUES
(13, 4, 'Cable ', 'LINGGA ADI PRATAM', 'autocad', 'FEBBY PURNAMA', 0, '2017-08-01', '2017-08-02', '1702', 1),
(14, 4, 'Cable ', 'AMAL QURANY', 'afaf', 'FEBBY PURNAMA', 0, '2017-08-01', '2017-08-02', '1701', 0),
(15, 4, 'Cable ', 'LINGGA ADI PRATAM', 'tracker', 'FEBBY PURNAMA', 0, '2017-09-01', '2017-09-03', '1702', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_task_progress`
--

CREATE TABLE `tb_task_progress` (
  `id` int(255) NOT NULL,
  `task_id` int(255) NOT NULL,
  `project_title` text NOT NULL,
  `project_task` text NOT NULL,
  `title` text NOT NULL,
  `progress` decimal(5,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `break_start` datetime NOT NULL,
  `break_end` datetime NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_task_progress`
--

INSERT INTO `tb_task_progress` (`id`, `task_id`, `project_title`, `project_task`, `title`, `progress`, `description`, `image`, `start_date`, `end_date`, `break_start`, `break_end`, `user`) VALUES
(1, 13, 'Cable ', 'autocad', 'mau tahu aja ', '0.00', 'agaga', '', '2017-08-24 08:41:46', '2017-08-24 08:51:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1702');

-- --------------------------------------------------------

--
-- Table structure for table `tb_token`
--

CREATE TABLE `tb_token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_token`
--

INSERT INTO `tb_token` (`id`, `token`) VALUES
(1, '0a60f4f7879b21172a57296b5af4fcbe'),
(2, '31c3cc1873cfa3943884a83e307799a5'),
(3, '6761c811ccda995404482361949b99a0'),
(4, '6a286b7ce43d28247932d8f34991671c'),
(5, '4140d380a8b1d960dba1446e75b4b840'),
(6, '01352650cf5bc4022b06be1b1bde1822'),
(7, '452e0d2bce8d817536e9e4c09fb16b33'),
(8, 'ec13e3ac531b53c9c7da968c770e2bd3'),
(9, '3916fabf75dbc0fd79f65b4a15f901c0'),
(10, '85fade3daa37b648622f7c0e402f259f'),
(11, '47dcb248b37d67f11acb68ecbf21ba3a'),
(12, '39977ab313777a2d67a1a74df9fdebec'),
(13, 'e02d452a87b61d232c5893f59d3e58bc'),
(14, '01cf495a99e5cb22ef9c3ccea0ec67fc'),
(15, '814ff947a78d1455cd604e85d312e4b0'),
(16, '76b651e4616260708ac190b03c04744a'),
(17, '54ad8903312e500bd123b91f0b61df27'),
(18, '011c42734361ca6da245d3cd7717888f'),
(19, '1da074ccd205295bda3c6e6d16cf7b4c'),
(20, '8d1eaed55e70c9ca748df4b88670baa6'),
(21, 'd6f85d8e8e37513eb1c49f9b680e1bc2'),
(22, '7fa1f0cafcd06e65de678c2bafa4dd33'),
(23, 'c3d4e6cba4c18c19d144645cffb2b1b0'),
(24, '6c0fae09cacddeee0d97d7d029b73302'),
(25, 'fbbacded21e546843e57fa933a84d7ec'),
(26, '7a3408d513ad1476ed57d0a8552d6923'),
(27, '9b29e533717b8c64f8895ba8a8a6a107'),
(28, '1f7df2be0ac59213e024a5c29aaf10f2'),
(29, '4385ab53a3018e46b4ba8190d55516e2'),
(30, '25e0691217e23aa0cae2990be0b06603'),
(31, '843e6e8dc1ee7af7ecf088a68300e553'),
(32, '21f8b95406706989bc1c2b888d4cb40b'),
(33, '99682f76a48f6832eabec0d6e4c7815e'),
(34, '0444655b7b5ef1d25a6a456f176d1472'),
(35, '73a58570c211fba2857ccc3893907bda'),
(36, '513df54eb6d09a91bd0fa06635fc681d'),
(37, 'bba5ee7ba95135903e44b0603bbb95f6'),
(38, '31bd3d446c904f6bfe366f72e2530d19'),
(39, 'fc38c1af23fbdb88f421cdf86dc58272'),
(40, 'ad4f2f858cc9785b138b8a6601a39adc'),
(41, 'e335c90a7adbc59973f7953961d6245e'),
(42, 'd7ae1df9215515a964d658dbb29ab6d0'),
(43, '3d8c889b1b24df2337f5f82cb34a1cb5'),
(44, '3590a8336bc36d01bf9bfa578f74a808'),
(45, '405655ead1997ceaa3e279f8334713b6'),
(46, 'c1555df54a72ff10e80f1a7c8172f5a6'),
(47, 'c290f4413a2f2cc08816453983010deb'),
(48, '4f6c009100fe4b1e7aa3a0360c450690'),
(49, '810b6ec7e856fa625350eb4be8019182'),
(50, '66d929e075fb596b18a3eb74e3e466b1'),
(51, '293e19ad366a6b10ef24fc6254513413'),
(52, 'a212127420167094bc04c182769716ba'),
(53, '8b1e9cac6d79bfbcae2c9315f275fc58'),
(54, '8b328d121d531b06543ad66f3a62dbc1'),
(55, '34ee84455b0d8ac664e1da956bf65589'),
(56, 'c420e932d401f9cc557a3996407a8ac6'),
(57, '13ea770ad1b9cca97c6c312f27b3119b'),
(58, '1ddea6354c9dc6b284d4bb22d59410d4'),
(59, 'a92394137ffc74c23e56ce81d93670ef'),
(60, '8b452140cf94c7f4977c68e059aba618'),
(61, 'd40983fa981189344abb9ff93926cd82'),
(62, '3cb4acc1006527f6bc4a4c577c39bacb'),
(63, '27f992b8d315d6d17af531d84e4083a7'),
(64, 'fd827d7d2c6b7d03dc2dabfdfd18c89a'),
(65, '24b92e9e4e580d720d4dd2c65124b7a7'),
(66, '43690de80c6083ed67ecd356f817c0c4'),
(67, '69bac507cd1579057b0c4e129f56ecea'),
(68, 'e373e304ed4bcbf69a2dfeba1c62bc92'),
(69, '0ea3b3984d8828edf51f465a9c1198dd'),
(70, 'd7942cf3fdc1fa5e90dc160e7831574c'),
(71, '2b03a3052a8ec20ac0cedbfd927592cd'),
(72, '8494e770324384508197e797a8b9088f'),
(73, '092a631aed6beea66b20fb26f25989ba'),
(74, '226e4f6a55a8fdc9792209070413e877'),
(75, 'a2a0b487bd9edf1e76b6e2e8ceb75511'),
(76, '5f47936a67a184cf42f6b0a24e49ab45'),
(77, '91a0cb9c4eb8d2cde974218007c095c4'),
(78, 'c036d0a22d330f3518971503beb02b53'),
(79, 'bd0bea33049dd7a53e3c3e537f14e073'),
(80, '6bc57ca3c45e92d43128e42720337834'),
(81, '9fd12ab749881467169f58d81d5bc9e9'),
(82, 'b05da47198e0e68085b2f80ee6da68d8'),
(83, '27849c570d393372b8d582ec60cbbb71'),
(84, 'a900d185d868d33af59956e7b60f1f02'),
(85, 'c66275fbc9208b4493b897969ecabc3c'),
(86, 'a4baf5cc539f90c5086178f46965a363'),
(87, 'f857285d05fb39dfa216386e8067589c');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(255) NOT NULL,
  `user` text NOT NULL,
  `pass` varchar(100) NOT NULL,
  `re_pass` text NOT NULL,
  `token_id` int(10) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'avatar5.png',
  `full_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `provinsi` text NOT NULL,
  `kota` text NOT NULL,
  `no_hp` text NOT NULL,
  `level` text NOT NULL,
  `join_date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user`, `pass`, `re_pass`, `token_id`, `image`, `full_name`, `email`, `alamat`, `provinsi`, `kota`, `no_hp`, `level`, `join_date`, `status`) VALUES
(1, 'master', '3e8496c99d2a2899bace3c05cf06313d', 'default123!!', 56, 'profile_master_20170708212612.', 'Arie Budi', 'arie.budip@gmail.com', '', 'Jawa Barat', 'Kota Depok', '085717004115', 'admin', '2017-02-15 20:20:18', 1),
(2, 'briant', 'cda77467e1ee349558e329de4563c362', 'test123!!', 0, 'avatar5.png', 'Briant Fiqqih', 'briantfiqqih28@gmail.com', '', 'Jawa Barat', 'Kota Depok', '085211100301', 'staff', '2017-08-07 23:10:14', 1),
(3, '1601', 'c559da2ba967eb820766939a658022c8', '1601', 69, 'profile_1601_20172008090858.png', 'EKO SUPRIYANTO', 'ekosupriyanto@gmail.com', '', '', '', '', 'Supervisor', '2017-08-09 23:22:31', 1),
(4, '1602', '1bc0249a6412ef49b07fe6f62e6dc8de', '1602', 84, 'avatar5.png', 'NORAYATI NORDIN', 'norayatinordin@gmail.com', '', '', '', '', 'supervisor', '2017-08-09 23:23:59', 1),
(5, '1603', 'f3173935ed8ac4bf073c1bcd63171f8a', '1603', 42, 'avatar5.png', 'AMIRUDDIN', 'suwarnoamiruddin@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:24:20', 1),
(6, '1604', 'a368b0de8b91cfb3f91892fbf1ebd4b2', '1604', 0, 'avatar5.png', 'JOANNE SOH', 'joanne@elife-solutions.com', '', '', '', '', 'staff', '2017-08-09 23:24:40', 1),
(7, '1605', 'f18a6d1cde4b205199de8729a6637b42', '1605', 0, 'avatar5.png', 'NISHA NADHIRA NAZIRUN', 'nnishanadhiran@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:25:06', 1),
(8, '1606', '495dabfd0ca768a3c3abd672079f48b6', '1606', 0, 'avatar5.png', 'INDRA HARDIAN MULYADI', 'indra.mulyadi@fkegraduate.utm.my', '', '', '', '', 'staff', '2017-08-09 23:25:28', 1),
(9, '1607', '9597353e41e6957b5e7aa79214fcb256', '1607', 0, 'avatar5.png', 'MUHAMMAD HAIKAL SATRIA', 'iamhaikal@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:25:54', 1),
(10, '1608', 'faafda66202d234463057972460c04f5', '1608', 41, 'avatar5.png', 'FEBBY PURNAMA', 'febby.p.madrin@students.itb.ac.id', '', '', '', '', 'staff', '2017-08-09 23:26:32', 1),
(11, '1709', '52d080a3e172c33fd6886a37e7288491', '1709', 0, 'avatar5.png', 'ABDULLAH AZAM', 'professionalone6@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:26:54', 1),
(12, '1701', '15231a7ce4ba789d13b722cc5c955834', '1701', 38, 'avatar5.png', 'AMAL QURANY', 'mal.qurany@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:27:16', 1),
(13, '1702', 'b9f94c77652c9a76fc8a442748cd54bd', '1702', 87, 'avatar5.png', 'LINGGA ADI PRATAM', 'linggaadi4nd@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:27:42', 1),
(14, '1710', '5a142a55461d5fef016acfb927fee0bd', '1710', 0, 'avatar5.png', 'MUHAMMAD AKMAL BIN YAKOB', 'm.akmal@utm.my', '', '', '', '', 'staff', '2017-08-09 23:28:12', 1),
(15, '1711', 'a941493eeea57ede8214fd77d41806bc', '1711', 0, 'avatar5.png', 'INDHIKA FAUZHAN WARSITO', 'indika8f@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:28:33', 1),
(16, '1712', 'a51c896c9cb81ecb5a199d51ac9fc3c5', '1712', 0, 'avatar5.png', 'FARIS YAHYA', 'mfarisyahya@gmail.com ', '', '', '', '', 'staff', '2017-08-09 23:28:52', 1),
(17, '1713', '464d828b85b0bed98e80ade0a5c43b0f', '1713', 0, 'avatar5.png', 'NAQUIB KHALID', 'naquibkhalid@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:29:11', 1),
(18, '1703', '375c71349b295fbe2dcdca9206f20a06', '1703', 51, 'avatar5.png', 'AHMAD BURHANUDDIN', 'burhanmnasir93@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:29:28', 1),
(19, '1704', 'a588a6199feff5ba48402883d9b72700', '1704', 0, 'avatar5.png', 'MUHAMMAD DHIMAS A', 'dimas.adi455@gmail.com', '', '', '', '', 'staff', '2017-08-09 23:29:46', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_position`
--
ALTER TABLE `tb_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_project_file`
--
ALTER TABLE `tb_project_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_seo`
--
ALTER TABLE `tb_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_task_progress`
--
ALTER TABLE `tb_task_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_asset`
--
ALTER TABLE `tb_asset`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_position`
--
ALTER TABLE `tb_position`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_project_file`
--
ALTER TABLE `tb_project_file`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_seo`
--
ALTER TABLE `tb_seo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_task_progress`
--
ALTER TABLE `tb_task_progress`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
