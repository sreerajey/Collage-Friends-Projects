-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 02:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fencing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

CREATE TABLE IF NOT EXISTS `auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_group_permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_group_permissions_group_id_permission_id_0cd325b0_uniq` (`group_id`,`permission_id`),
  KEY `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

CREATE TABLE IF NOT EXISTS `auth_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `codename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_permission_content_type_id_codename_01ab375a_uniq` (`content_type_id`,`codename`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `name`, `content_type_id`, `codename`) VALUES
(1, 'Can add log entry', 1, 'add_logentry'),
(2, 'Can change log entry', 1, 'change_logentry'),
(3, 'Can delete log entry', 1, 'delete_logentry'),
(4, 'Can view log entry', 1, 'view_logentry'),
(5, 'Can add permission', 2, 'add_permission'),
(6, 'Can change permission', 2, 'change_permission'),
(7, 'Can delete permission', 2, 'delete_permission'),
(8, 'Can view permission', 2, 'view_permission'),
(9, 'Can add group', 3, 'add_group'),
(10, 'Can change group', 3, 'change_group'),
(11, 'Can delete group', 3, 'delete_group'),
(12, 'Can view group', 3, 'view_group'),
(13, 'Can add user', 4, 'add_user'),
(14, 'Can change user', 4, 'change_user'),
(15, 'Can delete user', 4, 'delete_user'),
(16, 'Can view user', 4, 'view_user'),
(17, 'Can add content type', 5, 'add_contenttype'),
(18, 'Can change content type', 5, 'change_contenttype'),
(19, 'Can delete content type', 5, 'delete_contenttype'),
(20, 'Can view content type', 5, 'view_contenttype'),
(21, 'Can add session', 6, 'add_session'),
(22, 'Can change session', 6, 'change_session'),
(23, 'Can delete session', 6, 'delete_session'),
(24, 'Can view session', 6, 'view_session'),
(25, 'Can add regtable', 7, 'add_regtable'),
(26, 'Can change regtable', 7, 'change_regtable'),
(27, 'Can delete regtable', 7, 'delete_regtable'),
(28, 'Can view regtable', 7, 'view_regtable'),
(29, 'Can add tournamenttable', 8, 'add_tournamenttable'),
(30, 'Can change tournamenttable', 8, 'change_tournamenttable'),
(31, 'Can delete tournamenttable', 8, 'delete_tournamenttable'),
(32, 'Can view tournamenttable', 8, 'view_tournamenttable'),
(33, 'Can add tournament_schedule', 9, 'add_tournament_schedule'),
(34, 'Can change tournament_schedule', 9, 'change_tournament_schedule'),
(35, 'Can delete tournament_schedule', 9, 'delete_tournament_schedule'),
(36, 'Can view tournament_schedule', 9, 'view_tournament_schedule'),
(37, 'Can add tournament_medals', 10, 'add_tournament_medals'),
(38, 'Can change tournament_medals', 10, 'change_tournament_medals'),
(39, 'Can delete tournament_medals', 10, 'delete_tournament_medals'),
(40, 'Can view tournament_medals', 10, 'view_tournament_medals'),
(41, 'Can add tournament_register', 11, 'add_tournament_register'),
(42, 'Can change tournament_register', 11, 'change_tournament_register'),
(43, 'Can delete tournament_register', 11, 'delete_tournament_register'),
(44, 'Can view tournament_register', 11, 'view_tournament_register'),
(45, 'Can add tournament_pools', 12, 'add_tournament_pools'),
(46, 'Can change tournament_pools', 12, 'change_tournament_pools'),
(47, 'Can delete tournament_pools', 12, 'delete_tournament_pools'),
(48, 'Can view tournament_pools', 12, 'view_tournament_pools');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE IF NOT EXISTS `auth_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(128) NOT NULL,
  `last_login` datetime(6) DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `username` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_joined` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_groups`
--

CREATE TABLE IF NOT EXISTS `auth_user_groups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_user_groups_user_id_group_id_94350c0c_uniq` (`user_id`,`group_id`),
  KEY `auth_user_groups_group_id_97559544_fk_auth_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_user_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_user_user_permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_user_user_permissions_user_id_permission_id_14a6b632_uniq` (`user_id`,`permission_id`),
  KEY `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `django_admin_log`
--

CREATE TABLE IF NOT EXISTS `django_admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_time` datetime(6) NOT NULL,
  `object_id` longtext,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) unsigned NOT NULL,
  `change_message` longtext NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `django_admin_log_content_type_id_c4bce8eb_fk_django_co` (`content_type_id`),
  KEY `django_admin_log_user_id_c564eba6_fk_auth_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `django_content_type`
--

CREATE TABLE IF NOT EXISTS `django_content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `django_content_type_app_label_model_76bd3d3b_uniq` (`app_label`,`model`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `django_content_type`
--

INSERT INTO `django_content_type` (`id`, `app_label`, `model`) VALUES
(1, 'admin', 'logentry'),
(3, 'auth', 'group'),
(2, 'auth', 'permission'),
(4, 'auth', 'user'),
(5, 'contenttypes', 'contenttype'),
(7, 'Fencing', 'regtable'),
(8, 'Fencing', 'tournamenttable'),
(10, 'Fencing', 'tournament_medals'),
(12, 'Fencing', 'tournament_pools'),
(11, 'Fencing', 'tournament_register'),
(9, 'Fencing', 'tournament_schedule'),
(6, 'sessions', 'session');

-- --------------------------------------------------------

--
-- Table structure for table `django_migrations`
--

CREATE TABLE IF NOT EXISTS `django_migrations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `app` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `applied` datetime(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `django_migrations`
--

INSERT INTO `django_migrations` (`id`, `app`, `name`, `applied`) VALUES
(1, 'Fencing', '0001_initial', '2024-03-07 04:28:32.651128'),
(2, 'contenttypes', '0001_initial', '2024-03-07 04:28:32.810740'),
(3, 'auth', '0001_initial', '2024-03-07 04:28:33.851783'),
(4, 'admin', '0001_initial', '2024-03-07 04:28:34.058511'),
(5, 'admin', '0002_logentry_remove_auto_add', '2024-03-07 04:28:34.058511'),
(6, 'admin', '0003_logentry_add_action_flag_choices', '2024-03-07 04:28:34.081664'),
(7, 'contenttypes', '0002_remove_content_type_name', '2024-03-07 04:28:34.146267'),
(8, 'auth', '0002_alter_permission_name_max_length', '2024-03-07 04:28:34.168104'),
(9, 'auth', '0003_alter_user_email_max_length', '2024-03-07 04:28:34.198820'),
(10, 'auth', '0004_alter_user_username_opts', '2024-03-07 04:28:34.210032'),
(11, 'auth', '0005_alter_user_last_login_null', '2024-03-07 04:28:34.245755'),
(12, 'auth', '0006_require_contenttypes_0002', '2024-03-07 04:28:34.250528'),
(13, 'auth', '0007_alter_validators_add_error_messages', '2024-03-07 04:28:34.258077'),
(14, 'auth', '0008_alter_user_username_max_length', '2024-03-07 04:28:34.284709'),
(15, 'auth', '0009_alter_user_last_name_max_length', '2024-03-07 04:28:34.317561'),
(16, 'auth', '0010_alter_group_name_max_length', '2024-03-07 04:28:34.362239'),
(17, 'auth', '0011_update_proxy_permissions', '2024-03-07 04:28:34.376585'),
(18, 'auth', '0012_alter_user_first_name_max_length', '2024-03-07 04:28:34.403724'),
(19, 'sessions', '0001_initial', '2024-03-07 04:28:34.542588'),
(20, 'Fencing', '0002_tournament_schedule', '2024-03-07 05:56:53.999739'),
(21, 'Fencing', '0003_alter_tournament_schedule_start_time', '2024-03-07 05:58:21.715460'),
(22, 'Fencing', '0004_alter_tournament_schedule_status', '2024-03-07 05:59:54.142862'),
(23, 'Fencing', '0005_tournament_medals', '2024-03-07 07:35:44.381302'),
(24, 'Fencing', '0006_auto_20240307_1313', '2024-03-07 07:43:07.659893'),
(25, 'Fencing', '0007_tournament_register', '2024-03-08 07:15:44.369399'),
(26, 'Fencing', '0008_tournament_register_status', '2024-03-08 07:26:28.394928'),
(27, 'Fencing', '0009_tournament_register_score', '2024-03-08 07:28:35.184675'),
(28, 'Fencing', '0010_tournament_pools', '2024-03-11 11:11:23.184011'),
(29, 'Fencing', '0011_tournament_pools_country', '2024-03-11 11:23:38.296204'),
(30, 'Fencing', '0012_alter_tournament_pools_vm', '2024-03-11 11:42:23.849381');

-- --------------------------------------------------------

--
-- Table structure for table `django_session`
--

CREATE TABLE IF NOT EXISTS `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime(6) NOT NULL,
  PRIMARY KEY (`session_key`),
  KEY `django_session_expire_date_a5c62663` (`expire_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_session`
--

INSERT INTO `django_session` (`session_key`, `session_data`, `expire_date`) VALUES
('1g5is3vie66mkd160i65ddbua0a41pmm', 'e30:1rjJjc:XcOt-Zoeu3-nPOjPhJ-km2En39ZRHoZcHcZXF_8CXek', '2024-03-24 14:01:04.106226'),
('33aafgg1dyg7dbkfpsrpfxxexvitb0r6', '.eJyrVkpMyc3Mc0jPTczM0UvOz1WywhDRgYjAZJRqAfXkEjs:1ri61b:SMun6YozcxaMMksM7sTcrcZfcbehJF7wGfTZkw-tJh8', '2024-03-21 05:10:35.780745'),
('4xyjyr2hehf98v5hxuk1df7qaqj6r4ar', '.eJyrVkpMyc3Mc0jPTczM0UvOz1WywhDRgYjAZJRqAfXkEjs:1riUtF:IMc2_EqTnlYglpcQZl4nx2dS7sUM4dZKRQIaYPfQ2dU', '2024-03-22 07:43:37.980247'),
('h6tbic1h4dybm44w3ladko91t3h49wz4', 'e30:1rjfpx:CnrP4lrf9dBxVckJt1Md5l1vovJR6bdHnKzgYOJvTQw', '2024-03-25 13:37:05.361512'),
('hglvrbii6hzh4m0i8r2ycjuptn7t0mru', 'eyJ1c2VyaWQiOjEsInVzZXJuYW1lIjoiSmVyaW4gSmFtZXMifQ:1rjK3J:RYBN7soaz-_lfQhaZlOC2Pksnljn3ed_1fkIW9f1aaM', '2024-03-24 14:21:25.382185'),
('hsd18yke9v8oc1zd22cjg2623qpa06tq', '.eJyrVkpMyc3Mc0jPTczM0UvOz1WywhDRgYjAZJRqAfXkEjs:1riB3v:fUzYqIXe4bvt232vnWgwLdBUDOlleBUkBY2_LM2k_GA', '2024-03-21 10:33:19.694894'),
('n0jyv1texj0yz90s4kc4w2w89mcdhx8v', '.eJyrVkpMyc3Mc0jPTczM0UvOz1WywhDRgYjAZJRqAfXkEjs:1riYbB:QldlKxuj0Dgp9PV_JT2yqy2PloUTdVqiA___qKJcK0U', '2024-03-22 11:41:13.353409');

-- --------------------------------------------------------

--
-- Table structure for table `fencing_regtable`
--

CREATE TABLE IF NOT EXISTS `fencing_regtable` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(150) NOT NULL,
  `Gender` varchar(150) NOT NULL,
  `Dob` varchar(150) NOT NULL,
  `Aadhar` varchar(150) NOT NULL,
  `Weapon` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Mobile` varchar(150) NOT NULL,
  `Blood_group` varchar(150) NOT NULL,
  `Height` varchar(150) NOT NULL,
  `Weight` varchar(150) NOT NULL,
  `Fencer_category` varchar(150) NOT NULL,
  `District` varchar(150) NOT NULL,
  `Father_name` varchar(150) NOT NULL,
  `Mother_name` varchar(150) NOT NULL,
  `Mobile_No` varchar(150) NOT NULL,
  `Pincode` varchar(150) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Landmark` varchar(150) NOT NULL,
  `District_p` varchar(150) NOT NULL,
  `State` varchar(150) NOT NULL,
  `City` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fencing_regtable`
--

INSERT INTO `fencing_regtable` (`id`, `FullName`, `Gender`, `Dob`, `Aadhar`, `Weapon`, `Email`, `Mobile`, `Blood_group`, `Height`, `Weight`, `Fencer_category`, `District`, `Father_name`, `Mother_name`, `Mobile_No`, `Pincode`, `Address`, `Landmark`, `District_p`, `State`, `City`, `password`, `image`) VALUES
(1, 'Jerin James', 'Male', '1998-01-09', '6732676237873', 'Foil', 'j@gmail.com', '9887767783', 'o+', '180', '78', 'Foil', 'Pathanamthitta', 'Father', 'Mother', '9836677366', '687789', 'Pathanamthita', 'Konni', 'Pathanamthitta', 'kerala', 'Konni', '123', '0.jpeg'),
(2, 'Davood', 'Male', '1998-01-09', '6732676237873', 'Foil', 'd@gmail.com', '9887767783', 'o+', '180', '78', 'Foil', 'Pathanamthitta', 'Father', 'Mother', '9836677366', '687789', 'Pathanamthita', 'Konni', 'Pathanamthitta', 'kerala', 'Konni', '123', '0.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `fencing_tournamenttable`
--

CREATE TABLE IF NOT EXISTS `fencing_tournamenttable` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `place` varchar(150) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fencing_tournamenttable`
--

INSERT INTO `fencing_tournamenttable` (`id`, `name`, `place`, `start_date`, `end_date`) VALUES
(1, 'Finale provinciale Jeux du Québec 2024', 'Sherbrooke, CAN', '2024-03-07', '2024-03-11'),
(2, 'GARY BAKER 2024', 'NORTHAMPTON, GBR', '2024-03-11', '2024-03-07'),
(3, 'Junior & Cadet African Championships', 'Cairo, EGY', '2024-03-18', '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `fencing_tournament_medals`
--

CREATE TABLE IF NOT EXISTS `fencing_tournament_medals` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `country` varchar(150) NOT NULL,
  `gold` int(11) NOT NULL,
  `silver` int(11) NOT NULL,
  `bronze` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tournament_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fencing_tournament_m_tournament_id_902f5dab_fk_Fencing_t` (`tournament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fencing_tournament_medals`
--

INSERT INTO `fencing_tournament_medals` (`id`, `country`, `gold`, `silver`, `bronze`, `total`, `tournament_id`) VALUES
(1, 'India', 3, 2, 4, 9, 1),
(2, 'England', 2, 1, 1, 4, 1),
(3, 'Canada', 3, 1, 2, 6, 1),
(4, 'England', 3, 5, 2, 10, 2),
(5, 'India', 10, 2, 12, 24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fencing_tournament_pools`
--

CREATE TABLE IF NOT EXISTS `fencing_tournament_pools` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `participant1` varchar(150) NOT NULL,
  `participant2` varchar(150) NOT NULL,
  `v` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `vm` double NOT NULL,
  `ts` int(11) NOT NULL,
  `tr` int(11) NOT NULL,
  `tournament_id` bigint(20) NOT NULL,
  `country` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fencing_tournament_p_tournament_id_ee000f0d_fk_Fencing_t` (`tournament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fencing_tournament_pools`
--

INSERT INTO `fencing_tournament_pools` (`id`, `participant1`, `participant2`, `v`, `m`, `vm`, `ts`, `tr`, `tournament_id`, `country`) VALUES
(1, 'Jerin James', 'Davood', 5, 6, 0.83, 29, 28, 1, 'IND');

-- --------------------------------------------------------

--
-- Table structure for table `fencing_tournament_register`
--

CREATE TABLE IF NOT EXISTS `fencing_tournament_register` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `tournament_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(150) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fencing_tournament_r_tournament_id_c3a30534_fk_Fencing_t` (`tournament_id`),
  KEY `Fencing_tournament_r_user_id_02ad3ba1_fk_Fencing_r` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fencing_tournament_register`
--

INSERT INTO `fencing_tournament_register` (`id`, `category`, `date`, `tournament_id`, `user_id`, `status`, `score`) VALUES
(1, 'Cadet Women''s Foil', '2024-03-08', 1, 1, 'Accepted', 100),
(2, 'Cadet Men''s Épée', '2024-03-10', 3, 2, 'Accepted', 200),
(3, 'Cadet Men''s Épée', '2024-03-10', 1, 2, 'Accepted', 200);

-- --------------------------------------------------------

--
-- Table structure for table `fencing_tournament_schedule`
--

CREATE TABLE IF NOT EXISTS `fencing_tournament_schedule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `event` varchar(150) NOT NULL,
  `start_time` time(6) NOT NULL,
  `status` varchar(150) NOT NULL,
  `tournament_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fencing_tournament_s_tournament_id_c17cac99_fk_Fencing_t` (`tournament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fencing_tournament_schedule`
--

INSERT INTO `fencing_tournament_schedule` (`id`, `event`, `start_time`, `status`, `tournament_id`) VALUES
(1, 'Cadet Men''s Épée', '10:00:00.000000', '10:00', 1),
(2, 'Cadet Women''s Foil', '12:00:00.000000', '20:00', 1),
(3, 'Cadet Men''s Saber', '15:00:00.000000', '22:00', 1),
(4, 'Cadet Women''s Saber', '22:00:00.000000', 'Active', 1),
(5, 'Junior Women''s Épée', '10:00:00.000000', 'Active', 2),
(6, 'Junior Women''s Saber', '11:00:00.000000', 'Active', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD CONSTRAINT `auth_group_permissions_group_id_b120cbf9_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`);

--
-- Constraints for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD CONSTRAINT `auth_permission_content_type_id_2f476e4b_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD CONSTRAINT `auth_user_groups_group_id_97559544_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_user_groups_user_id_6a12ed8b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD CONSTRAINT `auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`),
  ADD CONSTRAINT `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`);

--
-- Constraints for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD CONSTRAINT `django_admin_log_content_type_id_c4bce8eb_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `django_admin_log_user_id_c564eba6_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `fencing_tournament_medals`
--
ALTER TABLE `fencing_tournament_medals`
  ADD CONSTRAINT `Fencing_tournament_m_tournament_id_902f5dab_fk_Fencing_t` FOREIGN KEY (`tournament_id`) REFERENCES `fencing_tournamenttable` (`id`);

--
-- Constraints for table `fencing_tournament_pools`
--
ALTER TABLE `fencing_tournament_pools`
  ADD CONSTRAINT `Fencing_tournament_p_tournament_id_ee000f0d_fk_Fencing_t` FOREIGN KEY (`tournament_id`) REFERENCES `fencing_tournamenttable` (`id`);

--
-- Constraints for table `fencing_tournament_register`
--
ALTER TABLE `fencing_tournament_register`
  ADD CONSTRAINT `Fencing_tournament_r_tournament_id_c3a30534_fk_Fencing_t` FOREIGN KEY (`tournament_id`) REFERENCES `fencing_tournamenttable` (`id`),
  ADD CONSTRAINT `Fencing_tournament_r_user_id_02ad3ba1_fk_Fencing_r` FOREIGN KEY (`user_id`) REFERENCES `fencing_regtable` (`id`);

--
-- Constraints for table `fencing_tournament_schedule`
--
ALTER TABLE `fencing_tournament_schedule`
  ADD CONSTRAINT `Fencing_tournament_s_tournament_id_c17cac99_fk_Fencing_t` FOREIGN KEY (`tournament_id`) REFERENCES `fencing_tournamenttable` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
