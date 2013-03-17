-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 17/03/2013 às 00:00:37
-- Versão do Servidor: 5.5.29
-- Versão do PHP: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `cakecms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=671 ;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 424),
(2, 1, NULL, NULL, 'Groups', 2, 19),
(5, 2, NULL, NULL, 'add', 3, 4),
(6, 2, NULL, NULL, 'edit', 5, 6),
(7, 2, NULL, NULL, 'delete', 7, 8),
(8, 1, NULL, NULL, 'Users', 20, 45),
(9, 8, NULL, NULL, 'login', 21, 22),
(10, 8, NULL, NULL, 'logout', 23, 24),
(12, 8, NULL, NULL, 'view', 25, 26),
(13, 8, NULL, NULL, 'add', 27, 28),
(14, 8, NULL, NULL, 'edit', 29, 30),
(15, 8, NULL, NULL, 'delete', 31, 32),
(71, 1, NULL, NULL, 'Pages', 46, 71),
(334, 1, NULL, NULL, 'Acl', 72, 151),
(335, 334, NULL, NULL, 'Acl', 73, 86),
(336, 335, NULL, NULL, 'index', 74, 75),
(337, 335, NULL, NULL, 'admin_index', 76, 77),
(338, 334, NULL, NULL, 'Acos', 87, 106),
(339, 338, NULL, NULL, 'admin_index', 88, 89),
(340, 338, NULL, NULL, 'admin_empty_acos', 90, 91),
(341, 338, NULL, NULL, 'admin_build_acl', 92, 93),
(342, 338, NULL, NULL, 'admin_prune_acos', 94, 95),
(343, 338, NULL, NULL, 'admin_synchronize', 96, 97),
(344, 334, NULL, NULL, 'Aros', 107, 150),
(345, 344, NULL, NULL, 'admin_index', 108, 109),
(346, 344, NULL, NULL, 'admin_check', 110, 111),
(347, 344, NULL, NULL, 'admin_users', 112, 113),
(348, 344, NULL, NULL, 'admin_update_user_role', 114, 115),
(349, 344, NULL, NULL, 'admin_ajax_role_permissions', 116, 117),
(350, 344, NULL, NULL, 'admin_role_permissions', 118, 119),
(351, 344, NULL, NULL, 'admin_user_permissions', 120, 121),
(352, 344, NULL, NULL, 'admin_empty_permissions', 122, 123),
(353, 344, NULL, NULL, 'admin_clear_user_specific_permissions', 124, 125),
(354, 344, NULL, NULL, 'admin_grant_all_controllers', 126, 127),
(355, 344, NULL, NULL, 'admin_deny_all_controllers', 128, 129),
(356, 344, NULL, NULL, 'admin_get_role_controller_permission', 130, 131),
(357, 344, NULL, NULL, 'admin_grant_role_permission', 132, 133),
(358, 344, NULL, NULL, 'admin_deny_role_permission', 134, 135),
(359, 344, NULL, NULL, 'admin_get_user_controller_permission', 136, 137),
(360, 344, NULL, NULL, 'admin_grant_user_permission', 138, 139),
(361, 344, NULL, NULL, 'admin_deny_user_permission', 140, 141),
(448, 2, NULL, NULL, 'is_LoggedIn', 9, 10),
(450, 71, NULL, NULL, 'is_LoggedIn', 47, 48),
(451, 8, NULL, NULL, 'is_LoggedIn', 33, 34),
(452, 335, NULL, NULL, 'is_LoggedIn', 78, 79),
(453, 338, NULL, NULL, 'is_LoggedIn', 98, 99),
(454, 344, NULL, NULL, 'is_LoggedIn', 142, 143),
(455, 1, NULL, NULL, 'Posts', 152, 183),
(457, 455, NULL, NULL, 'view', 153, 154),
(458, 455, NULL, NULL, 'add', 155, 156),
(459, 455, NULL, NULL, 'edit', 157, 158),
(460, 455, NULL, NULL, 'delete', 159, 160),
(461, 455, NULL, NULL, 'is_LoggedIn', 161, 162),
(463, 455, NULL, NULL, 'view_admin', 163, 164),
(465, 71, NULL, NULL, 'view_admin', 49, 50),
(472, 71, NULL, NULL, 'add', 51, 52),
(473, 71, NULL, NULL, 'edit', 53, 54),
(474, 71, NULL, NULL, 'delete', 55, 56),
(475, 1, NULL, NULL, 'Categories', 184, 205),
(476, 475, NULL, NULL, 'view_admin', 185, 186),
(477, 475, NULL, NULL, 'add', 187, 188),
(478, 475, NULL, NULL, 'edit', 189, 190),
(479, 475, NULL, NULL, 'delete', 191, 192),
(480, 475, NULL, NULL, 'is_LoggedIn', 193, 194),
(481, 8, NULL, NULL, 'view_admin', 35, 36),
(482, 71, NULL, NULL, 'index', 57, 58),
(483, 71, NULL, NULL, 'view', 59, 60),
(484, 1, NULL, NULL, 'Galleries', 206, 231),
(485, 484, NULL, NULL, 'view_admin', 207, 208),
(486, 484, NULL, NULL, 'add', 209, 210),
(487, 484, NULL, NULL, 'edit', 211, 212),
(488, 484, NULL, NULL, 'delete', 213, 214),
(489, 484, NULL, NULL, 'is_LoggedIn', 215, 216),
(490, 1, NULL, NULL, 'Images', 232, 259),
(491, 490, NULL, NULL, 'view_admin', 233, 234),
(492, 490, NULL, NULL, 'add', 235, 236),
(493, 490, NULL, NULL, 'edit', 237, 238),
(494, 490, NULL, NULL, 'delete', 239, 240),
(495, 490, NULL, NULL, 'is_LoggedIn', 241, 242),
(496, 1, NULL, NULL, 'Templates', 260, 281),
(497, 496, NULL, NULL, 'is_LoggedIn', 261, 262),
(499, 455, NULL, NULL, 'index', 165, 166),
(500, 1, NULL, NULL, 'Contacts', 282, 301),
(501, 500, NULL, NULL, 'view', 283, 284),
(502, 500, NULL, NULL, 'view_admin', 285, 286),
(503, 500, NULL, NULL, 'result', 287, 288),
(504, 500, NULL, NULL, 'add', 289, 290),
(505, 500, NULL, NULL, 'delete', 291, 292),
(506, 500, NULL, NULL, 'is_LoggedIn', 293, 294),
(507, 2, NULL, NULL, 'view_admin', 11, 12),
(508, 1, NULL, NULL, 'Options', 302, 321),
(510, 508, NULL, NULL, 'is_LoggedIn', 303, 304),
(511, 1, NULL, NULL, 'Menus', 322, 341),
(512, 511, NULL, NULL, 'view_admin', 323, 324),
(513, 511, NULL, NULL, 'is_LoggedIn', 325, 326),
(514, 511, NULL, NULL, 'add', 327, 328),
(515, 511, NULL, NULL, 'edit', 329, 330),
(516, 511, NULL, NULL, 'delete', 331, 332),
(524, 511, NULL, NULL, 'view', 333, 334),
(525, 475, NULL, NULL, 'get_categories', 195, 196),
(526, 475, NULL, NULL, 'index', 197, 198),
(527, 1, NULL, NULL, 'Comments', 342, 361),
(529, 527, NULL, NULL, 'view_admin', 343, 344),
(530, 527, NULL, NULL, 'add', 345, 346),
(531, 527, NULL, NULL, 'edit', 347, 348),
(532, 527, NULL, NULL, 'delete', 349, 350),
(534, 527, NULL, NULL, 'is_LoggedIn', 351, 352),
(535, 527, NULL, NULL, 'get_comments', 353, 354),
(536, 455, NULL, NULL, 'last_posts', 167, 168),
(537, 455, NULL, NULL, 'search', 169, 170),
(538, 490, NULL, NULL, 'add_iframe', 243, 244),
(540, 484, NULL, NULL, 'add_iframe', 217, 218),
(541, 490, NULL, NULL, 'delete_iframe', 245, 246),
(542, 490, NULL, NULL, 'edit_iframe', 247, 248),
(543, 484, NULL, NULL, 'delete_iframe', 219, 220),
(544, 1, NULL, NULL, 'Positions', 362, 379),
(545, 544, NULL, NULL, 'is_LoggedIn', 363, 364),
(546, 508, NULL, NULL, 'view_admin', 305, 306),
(547, 508, NULL, NULL, 'add', 307, 308),
(548, 508, NULL, NULL, 'edit', 309, 310),
(549, 508, NULL, NULL, 'delete', 311, 312),
(550, 508, NULL, NULL, 'get_value', 313, 314),
(551, 1, NULL, NULL, 'Widgets', 380, 401),
(552, 551, NULL, NULL, 'view_admin', 381, 382),
(553, 551, NULL, NULL, 'add', 383, 384),
(554, 551, NULL, NULL, 'edit', 385, 386),
(555, 551, NULL, NULL, 'delete', 387, 388),
(556, 551, NULL, NULL, 'get_value', 389, 390),
(557, 551, NULL, NULL, 'is_LoggedIn', 391, 392),
(558, 484, NULL, NULL, 'check_gallery', 221, 222),
(559, 484, NULL, NULL, 'set_url_iframe', 223, 224),
(560, 551, NULL, NULL, 'get_values', 393, 394),
(561, 1, NULL, NULL, 'Inputs', 402, 423),
(562, 561, NULL, NULL, 'view_admin', 403, 404),
(563, 561, NULL, NULL, 'add', 405, 406),
(564, 561, NULL, NULL, 'edit', 407, 408),
(565, 561, NULL, NULL, 'delete', 409, 410),
(566, 561, NULL, NULL, 'is_LoggedIn', 411, 412),
(567, 561, NULL, NULL, 'get_inputs', 413, 414),
(568, 496, NULL, NULL, 'get_ids', 263, 264),
(569, 561, NULL, NULL, 'get_name_inputs', 415, 416),
(570, 496, NULL, NULL, 'get_data_radio', 265, 266),
(571, 71, NULL, NULL, 'delete_thumb', 61, 62),
(572, 490, NULL, NULL, 'gallery_home', 249, 250),
(573, 455, NULL, NULL, 'delete_thumb', 171, 172),
(575, 455, NULL, NULL, 'get_post_paginator', 173, 174),
(577, 71, NULL, NULL, 'display', 63, 64),
(579, 490, NULL, NULL, 'gallery_home_admin', 251, 252),
(580, 455, NULL, NULL, 'popular_posts', 175, 176),
(581, 8, NULL, NULL, 'index', 37, 38),
(606, 475, NULL, NULL, 'get_theme', 199, 200),
(607, 475, NULL, NULL, 'get_base_url', 201, 202),
(608, 475, NULL, NULL, 'get_emails', 203, 204),
(609, 527, NULL, NULL, 'get_theme', 355, 356),
(610, 527, NULL, NULL, 'get_base_url', 357, 358),
(611, 527, NULL, NULL, 'get_emails', 359, 360),
(612, 500, NULL, NULL, 'get_theme', 295, 296),
(613, 500, NULL, NULL, 'get_base_url', 297, 298),
(614, 500, NULL, NULL, 'get_emails', 299, 300),
(615, 484, NULL, NULL, 'get_theme', 225, 226),
(616, 484, NULL, NULL, 'get_base_url', 227, 228),
(617, 484, NULL, NULL, 'get_emails', 229, 230),
(618, 2, NULL, NULL, 'get_theme', 13, 14),
(619, 2, NULL, NULL, 'get_base_url', 15, 16),
(620, 2, NULL, NULL, 'get_emails', 17, 18),
(621, 490, NULL, NULL, 'get_theme', 253, 254),
(622, 490, NULL, NULL, 'get_base_url', 255, 256),
(623, 490, NULL, NULL, 'get_emails', 257, 258),
(624, 561, NULL, NULL, 'get_theme', 417, 418),
(625, 561, NULL, NULL, 'get_base_url', 419, 420),
(626, 561, NULL, NULL, 'get_emails', 421, 422),
(627, 511, NULL, NULL, 'get_theme', 335, 336),
(628, 511, NULL, NULL, 'get_base_url', 337, 338),
(629, 511, NULL, NULL, 'get_emails', 339, 340),
(630, 508, NULL, NULL, 'get_theme', 315, 316),
(631, 508, NULL, NULL, 'get_base_url', 317, 318),
(632, 508, NULL, NULL, 'get_emails', 319, 320),
(633, 71, NULL, NULL, 'get_theme', 65, 66),
(634, 71, NULL, NULL, 'get_base_url', 67, 68),
(635, 71, NULL, NULL, 'get_emails', 69, 70),
(636, 544, NULL, NULL, 'get_theme', 365, 366),
(637, 544, NULL, NULL, 'get_base_url', 367, 368),
(638, 544, NULL, NULL, 'get_emails', 369, 370),
(639, 455, NULL, NULL, 'get_theme', 177, 178),
(640, 455, NULL, NULL, 'get_base_url', 179, 180),
(641, 455, NULL, NULL, 'get_emails', 181, 182),
(642, 496, NULL, NULL, 'get_theme', 267, 268),
(643, 496, NULL, NULL, 'get_base_url', 269, 270),
(644, 496, NULL, NULL, 'get_emails', 271, 272),
(648, 8, NULL, NULL, 'get_theme', 39, 40),
(649, 8, NULL, NULL, 'get_base_url', 41, 42),
(650, 8, NULL, NULL, 'get_emails', 43, 44),
(651, 551, NULL, NULL, 'get_theme', 395, 396),
(652, 551, NULL, NULL, 'get_base_url', 397, 398),
(653, 551, NULL, NULL, 'get_emails', 399, 400),
(654, 335, NULL, NULL, 'get_theme', 80, 81),
(655, 335, NULL, NULL, 'get_base_url', 82, 83),
(656, 335, NULL, NULL, 'get_emails', 84, 85),
(657, 338, NULL, NULL, 'get_theme', 100, 101),
(658, 338, NULL, NULL, 'get_base_url', 102, 103),
(659, 338, NULL, NULL, 'get_emails', 104, 105),
(660, 344, NULL, NULL, 'get_theme', 144, 145),
(661, 344, NULL, NULL, 'get_base_url', 146, 147),
(662, 344, NULL, NULL, 'get_emails', 148, 149),
(663, 544, NULL, NULL, 'view_admin', 371, 372),
(664, 544, NULL, NULL, 'add', 373, 374),
(665, 544, NULL, NULL, 'edit', 375, 376),
(666, 544, NULL, NULL, 'delete', 377, 378),
(667, 496, NULL, NULL, 'view_admin', 273, 274),
(668, 496, NULL, NULL, 'add', 275, 276),
(669, 496, NULL, NULL, 'edit', 277, 278),
(670, 496, NULL, NULL, 'delete', 279, 280);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 4),
(15, 1, 'User', 1, NULL, 2, 3),
(20, NULL, 'Group', 2, NULL, 5, 8),
(22, 20, 'User', 2, NULL, 6, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Extraindo dados da tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(3, 1, 8, '1', '1', '1', '1'),
(15, 20, 477, '1', '1', '1', '1'),
(16, 20, 479, '1', '1', '1', '1'),
(17, 20, 478, '1', '1', '1', '1'),
(18, 20, 525, '1', '1', '1', '1'),
(19, 20, 526, '1', '1', '1', '1'),
(20, 20, 480, '1', '1', '1', '1'),
(21, 20, 476, '1', '1', '1', '1'),
(22, 20, 530, '1', '1', '1', '1'),
(23, 20, 532, '1', '1', '1', '1'),
(24, 20, 531, '1', '1', '1', '1'),
(25, 20, 535, '1', '1', '1', '1'),
(26, 20, 534, '1', '1', '1', '1'),
(27, 20, 529, '1', '1', '1', '1'),
(28, 20, 504, '1', '1', '1', '1'),
(29, 20, 505, '1', '1', '1', '1'),
(30, 20, 506, '1', '1', '1', '1'),
(31, 20, 503, '1', '1', '1', '1'),
(32, 20, 501, '1', '1', '1', '1'),
(33, 20, 502, '1', '1', '1', '1'),
(34, 20, 486, '1', '1', '1', '1'),
(35, 20, 488, '1', '1', '1', '1'),
(36, 20, 540, '1', '1', '1', '1'),
(37, 20, 543, '1', '1', '1', '1'),
(38, 20, 487, '1', '1', '1', '1'),
(39, 20, 489, '1', '1', '1', '1'),
(40, 20, 485, '1', '1', '1', '1'),
(41, 20, 5, '1', '1', '1', '1'),
(42, 20, 7, '1', '1', '1', '1'),
(43, 20, 6, '1', '1', '1', '1'),
(44, 20, 492, '1', '1', '1', '1'),
(45, 20, 538, '1', '1', '1', '1'),
(46, 20, 494, '1', '1', '1', '1'),
(47, 20, 541, '1', '1', '1', '1'),
(48, 20, 493, '1', '1', '1', '1'),
(49, 20, 542, '1', '1', '1', '1'),
(50, 20, 495, '1', '1', '1', '1'),
(51, 20, 491, '1', '1', '1', '1'),
(52, 20, 514, '1', '1', '1', '1'),
(53, 20, 516, '1', '1', '1', '1'),
(54, 20, 515, '1', '1', '1', '1'),
(55, 20, 513, '1', '1', '1', '1'),
(56, 20, 524, '1', '1', '1', '1'),
(57, 20, 512, '1', '1', '1', '1'),
(59, 20, 510, '1', '1', '1', '1'),
(60, 20, 472, '1', '1', '1', '1'),
(61, 20, 474, '1', '1', '1', '1'),
(62, 20, 473, '1', '1', '1', '1'),
(63, 20, 482, '1', '1', '1', '1'),
(64, 20, 450, '1', '1', '1', '1'),
(65, 20, 483, '1', '1', '1', '1'),
(66, 20, 465, '1', '1', '1', '1'),
(67, 20, 545, '1', '1', '1', '1'),
(68, 20, 458, '1', '1', '1', '1'),
(69, 20, 460, '1', '1', '1', '1'),
(70, 20, 459, '1', '1', '1', '1'),
(71, 20, 499, '1', '1', '1', '1'),
(72, 20, 461, '1', '1', '1', '1'),
(73, 20, 536, '1', '1', '1', '1'),
(74, 20, 537, '1', '1', '1', '1'),
(75, 20, 457, '1', '1', '1', '1'),
(76, 20, 463, '1', '1', '1', '1'),
(77, 20, 497, '1', '1', '1', '1'),
(78, 20, 13, '1', '1', '1', '1'),
(79, 20, 15, '1', '1', '1', '1'),
(80, 20, 14, '1', '1', '1', '1'),
(81, 20, 451, '1', '1', '1', '1'),
(82, 20, 9, '1', '1', '1', '1'),
(83, 20, 481, '1', '1', '1', '1'),
(84, 20, 12, '1', '1', '1', '1'),
(85, 20, 10, '1', '1', '1', '1'),
(88, 20, 507, '1', '1', '1', '1'),
(89, 20, 448, '1', '1', '1', '1'),
(154, 20, 577, '1', '1', '1', '1'),
(156, 20, 572, '1', '1', '1', '1'),
(158, 20, 554, '1', '1', '1', '1'),
(161, 20, 579, '1', '1', '1', '1'),
(163, 20, 552, '1', '1', '1', '1'),
(166, 20, 573, '1', '1', '1', '1'),
(168, 20, 575, '1', '1', '1', '1'),
(170, 20, 580, '1', '1', '1', '1'),
(173, 20, 570, '1', '1', '1', '1'),
(174, 20, 568, '1', '1', '1', '1'),
(177, 20, 571, '1', '1', '1', '1'),
(183, 20, 558, '1', '1', '1', '1'),
(185, 20, 559, '1', '1', '1', '1'),
(187, 20, 567, '1', '1', '1', '1'),
(189, 20, 569, '1', '1', '1', '1'),
(191, 20, 566, '1', '1', '1', '1'),
(193, 20, 548, '1', '1', '1', '1'),
(194, 20, 550, '1', '1', '1', '1'),
(195, 20, 546, '1', '1', '1', '1'),
(196, 20, 581, '1', '1', '1', '1'),
(198, 20, 556, '1', '1', '1', '1'),
(201, 20, 560, '1', '1', '1', '1'),
(202, 20, 557, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(170) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(210) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `slug`, `description`) VALUES
(1, NULL, 'CakePHP', 'CakePHP', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories_posts`
--

CREATE TABLE IF NOT EXISTS `categories_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`,`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `categories_posts`
--

INSERT INTO `categories_posts` (`id`, `category_id`, `post_id`) VALUES
(4, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `post` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `parent_id`, `name`, `email`, `text`, `created`, `published`) VALUES
(1, 1, NULL, NULL, 'WIlly Chagas', 'pinguimch@gmail.com', 'Very good.', '2013-03-14 19:13:24', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created`) VALUES
(1, 'Lucas', 'willychagass@gmail.com', '(48) 99949590', 'dsa', '2013-01-24 14:11:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `slug` varchar(170) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `description`) VALUES
(1, 'Demo', 'Demo', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Dev', '2012-02-12 20:05:16', '2013-03-02 22:00:57'),
(2, 'Admin', '2012-12-16 01:14:25', '2013-03-02 22:00:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `title` varchar(170) NOT NULL,
  `slug` varchar(170) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `small` varchar(250) DEFAULT NULL,
  `medium` varchar(250) DEFAULT NULL,
  `large` varchar(250) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `ord` int(11) DEFAULT '0',
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_id` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `title`, `slug`, `description`, `small`, `medium`, `large`, `url`, `ord`, `published`) VALUES
(1, 1, 'Image 1', 'Image_1', 'Image 1', '/files/uploads/slider-img2-940x358resized-225x170.jpg', '/files/uploads/slider-img2-940x358resized-940x358.jpg', '/files/uploads/slider-img2-940x358.jpg', '', 2, 0),
(2, 1, 'Image 2', 'Image_2', 'Image 2', '/files/uploads/slider-img1-940x358resized-225x170.jpg', '/files/uploads/slider-img1-940x358resized-940x358.jpg', '/files/uploads/slider-img1-940x358.jpg', '', 3, 0),
(3, 1, 'Image 3', 'Image_3', 'Image 3', '/files/uploads/slider-img3-940x358resized-225x170.jpg', '/files/uploads/slider-img3-940x358resized-940x358.jpg', '/files/uploads/slider-img3-940x358.jpg', '', 4, 0),
(4, 1, 'Image 4', 'Image_4', 'Image 4', '/files/uploads/slider-img5-940x358resized-225x170.jpg', '/files/uploads/slider-img5-940x358resized-940x358.jpg', '/files/uploads/slider-img5-940x358.jpg', '', 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inputs`
--

CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('textarea','input') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `template` (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `_blank` tinyint(1) NOT NULL,
  `ord` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `page` (`page_id`),
  KEY `category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`id`, `position_id`, `name`, `page_id`, `category_id`, `parent_id`, `url`, `_blank`, `ord`) VALUES
(1, 1, 'Contact', NULL, NULL, 0, 'contact/index/', 0, 5),
(2, 1, 'Home', NULL, NULL, 0, '/', 0, 2),
(3, 1, 'Example', 1, NULL, 0, 'Example_of_page', 0, 3),
(4, 1, 'Gallery', 2, NULL, 0, 'Gallery', 0, 4),
(5, 2, 'Contact', NULL, NULL, 0, 'contact/index/', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `options`
--

INSERT INTO `options` (`id`, `title`, `key`, `value`) VALUES
(1, 'Titulo do Site', 'title', 'DemostraÃ§Ã£o de sites desenvolvido com CakeCMS.'),
(2, 'DescriÃ§Ã£o do site', 'description', 'Veja o exemplo de utilizaÃ§Ã£o do CakeCMS'),
(3, 'Palavras-Chave (Utilizado na pesquisa do Google)', 'keywords', 'cakecms, cakephp, cms'),
(4, 'E-mails utilizados no formulÃ¡rio de contato.', 'cakecms_emails', 'cakecms@gmail.com'),
(5, 'Vimeo', 'social_vimeo', 'http://www.google.com.br'),
(6, 'Facebook', 'social_facebook', 'http://www.google.com.br'),
(7, 'Linkedin', 'social_linkedin', 'http://www.google.com.br'),
(8, 'Twitter', 'social_twitter', 'http://www.google.com.br'),
(9, 'Pinterest', 'social_pinterest', 'http://www.google.com.br'),
(10, 'Flickr', 'social_flickr', 'http://www.google.com.br'),
(11, 'Theme', 'cakecms_theme', 'Example'),
(12, 'Base Url', 'cakecms_base_url', '/cakecms/'),
(13, 'E-mails', 'cakecms_emails', 'willychagass@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `gallery_id` int(11) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(170) NOT NULL,
  `description` text,
  `thumb` varchar(150) NOT NULL DEFAULT '/files/uploads/default.jpg',
  `text` longtext NOT NULL,
  `title_page` varchar(170) DEFAULT NULL,
  `description_page` varchar(250) DEFAULT NULL,
  `keywords_page` varchar(170) DEFAULT NULL,
  `template_id` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL,
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `template` (`template_id`),
  KEY `gallery` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `parent_id`, `gallery_id`, `slug`, `title`, `description`, `thumb`, `text`, `title_page`, `description_page`, `keywords_page`, `template_id`, `created`, `modified`, `order`, `published`, `views`) VALUES
(1, 1, 0, NULL, 'Example_of_page', 'Example of page', '', '/files/uploads/default.jpg', '<p>\r\n	&nbsp;</p>\r\n<p style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">\r\n	<img alt="" src="/cakecms/app/webroot/files/uploads/images/typical-cake-request.png" style="width: 300px; height: 197px; margin-right: 15px; margin-left: 15px; float: left;" />has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">\r\n	Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">\r\n	Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n', '', '', '', 1, '2013-03-14 22:12:54', '2013-03-16 01:40:33', 0, 1, 21),
(2, 1, 0, 1, 'Gallery', 'Gallery', NULL, '/files/uploads/default.jpg', '<p>\r\n	<span style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</span></p>\r\n', '', '', '', 2, '2013-03-14 22:28:31', '2013-03-16 01:40:31', 0, 1, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(170) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `positions`
--

INSERT INTO `positions` (`id`, `name`, `slug`) VALUES
(1, 'Header', 'header'),
(2, 'Footer', 'footer');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `template_id` int(11) NOT NULL DEFAULT '1',
  `gallery_id` int(11) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(170) NOT NULL,
  `description` text,
  `title_page` varchar(170) DEFAULT NULL,
  `description_page` varchar(250) DEFAULT NULL,
  `keywords_page` varchar(170) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT '/files/uploads/default.jpg',
  `text` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL,
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `template_id` (`template_id`),
  KEY `gallery` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `parent_id`, `template_id`, `gallery_id`, `slug`, `title`, `description`, `title_page`, `description_page`, `keywords_page`, `thumb`, `text`, `created`, `modified`, `order`, `published`, `views`) VALUES
(1, 2, 0, 1, NULL, 'Example_of_post', 'Example of post', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English.', '', '', '', '/files/uploads/default.jpg', '<p>\r\n	<span style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</span></p>\r\n<p>\r\n	<span style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</span><span style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</span></p>\r\n<p>\r\n	<span style="color: rgb(51, 51, 51); font-family: ''Lucida Grande'', lucida_granderegular, tahoma, arial; line-height: 18px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</span></p>\r\n', '2013-03-14 22:11:01', '2013-03-15 18:55:35', 0, 1, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `file` varchar(70) DEFAULT NULL,
  `icon` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `templates`
--

INSERT INTO `templates` (`id`, `name`, `file`, `icon`) VALUES
(1, 'Default', 'view', '/files/uploads/padraocropped-110x110cropped-110x110.png'),
(2, 'Gallery', 'gallery', '/files/uploads/galeriacropped-110x110.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `description` text,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `google+` varchar(100) DEFAULT NULL,
  `pinterest` varchar(100) DEFAULT NULL,
  `flickr` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `description`, `facebook`, `twitter`, `google+`, `pinterest`, `flickr`, `linkedin`, `group_id`, `mobile_no`, `published`) VALUES
(1, '2012-12-15 19:44:26', '2013-03-03 22:41:01', 1, 'Administrador', 'Do Sistema', 'admin', 'ce09b95ad9725c19130b1a4ab5270b4447dad98f', 'willychagasss@gmail.com', '<p>\r\n	<img alt="" src="/demo/app/webroot/js/admin/ckeditor/ckfinder/userfiles/images/logo.png" style="color: rgb(119, 119, 119); font-family: Arial, sans-serif; line-height: 20px; margin-left: 10px; margin-right: 10px; float: left; width: 72px; height: 56px; " /><span style="color: rgb(119, 119, 119); font-family: Arial, sans-serif; line-height: 20px; ">Willy Chagas seGuys is reponsive, flexible, highly customizable and loaded with options. It comes with over 200 shortcodes and element</span></p>\r\n', 'http://www.google.com.br', 'http://www.google.com.br', 'http://www.google.com.br', 'http://www.google.com.br', 'http://www.google.com.br', 'http://www.google.com.br', 1, '', 1),
(2, '2012-12-16 01:15:58', '2013-03-14 02:51:07', 1, 'Administrador', 'Do Sistema', 'administrador', 'ce09b95ad9725c19130b1a4ab5270b4447dad98f', 'administrador@cakecms.com.br', '<p>\r\n	<img alt="" src="/cakecms/app/webroot/files/uploads/images/logo.png" style="color: rgb(119, 119, 119); font-family: Arial, sans-serif; line-height: 20px; margin-left: 10px; margin-right: 10px; float: left; width: 72px; height: 56px;" /><span style="color: rgb(119, 119, 119); font-family: Arial, sans-serif; line-height: 20px; ">Carlos Henrique&nbsp;</span><span style="color: rgb(119, 119, 119); font-family: Arial, sans-serif; line-height: 20px;">aos 112 anos de nascimento do inventor norte-americano &nbsp;criou um ve&iacute;culo reparador de gelo bastante utilizado at&eacute; hoje nas pistas de patina&ccedil;&atilde;o.</span></p>\r\n', '', '', '', '', '', '', 2, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `widgets`
--

INSERT INTO `widgets` (`id`, `page_id`, `post_id`, `title`, `key`, `value`) VALUES
(1, NULL, NULL, 'About', 'about', '<p>\r\n	<img alt="" src="/cakecms/app/webroot/files/uploads/images/logo.png" style="color: rgb(119, 119, 119); font-family: Arial, sans-serif; line-height: 20px; margin-left: 10px; margin-right: 10px; float: left; width: 72px; height: 56px;" /><span style="color: rgb(119, 119, 119); font-family: Arial, sans-serif; line-height: 20px;">Willy Chagas seGuys is reponsive, flexible, highly customizable and loaded with options. It comes with over 200 shortcodes and element</span></p>\r\n');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD CONSTRAINT `categories_posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_posts_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `widgets`
--
ALTER TABLE `widgets`
  ADD CONSTRAINT `widgets_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `widgets_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
