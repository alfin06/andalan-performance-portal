-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for andalan
CREATE DATABASE IF NOT EXISTS `andalan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `andalan`;

-- Dumping structure for table andalan.movements
CREATE TABLE IF NOT EXISTS `movements` (
  `id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table andalan.movements: ~421 rows (approximately)
INSERT INTO `movements` (`id`, `name`, `categories`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'Hamstring', 'Alternating Bridge March', NULL, NULL, NULL, NULL),
	(2, 'Hamstring', 'Alternating Bridge March Back on Bench', NULL, NULL, NULL, NULL),
	(3, 'Hamstring', 'Alternating Reverse Plank', NULL, NULL, NULL, NULL),
	(4, 'Hamstring', 'Alternating Reverse Plank Spring Ankle', NULL, NULL, NULL, NULL),
	(5, 'Hamstring', 'Bench Hamstring Curl', NULL, NULL, NULL, NULL),
	(6, 'Hamstring', 'Bench Single Leg Hamstring Curl', NULL, NULL, NULL, NULL),
	(7, 'Hamstring', 'Hooklying Calf Raise', NULL, NULL, NULL, NULL),
	(8, 'Hamstring', 'Hooklying Low Reach', NULL, NULL, NULL, NULL),
	(9, 'Hamstring', 'Hooklying Low Reach Midfoot', NULL, NULL, NULL, NULL),
	(10, 'Hamstring', 'Hooklying Low Reach Spring Ankle', NULL, NULL, NULL, NULL),
	(11, 'Hamstring', 'Hooklying Wall Tap', NULL, NULL, NULL, NULL),
	(12, 'Hamstring', 'Hooklying Wall Tap Up and Down', NULL, NULL, NULL, NULL),
	(13, 'Hamstring', 'Reverse Plank', NULL, NULL, NULL, NULL),
	(14, 'Hamstring', 'Single Leg Hooklying Calf Raise', NULL, NULL, NULL, NULL),
	(15, 'Hamstring', 'Single Leg Hooklying Low Reach', NULL, NULL, NULL, NULL),
	(16, 'Hamstring', 'Single Leg Hooklying Low Reach Midfoot', NULL, NULL, NULL, NULL),
	(17, 'Hamstring', 'Single Leg Hooklying Low Reach Oscilating', NULL, NULL, NULL, NULL),
	(18, 'Hamstring', 'Single Leg Hooklying Low Reach Oscilating w/ Slam Ball', NULL, NULL, NULL, NULL),
	(19, 'Hamstring', 'Single Leg Hooklying Low Reach Spring Ankle', NULL, NULL, NULL, NULL),
	(20, 'Hamstring', 'Slider Hamstring Curl', NULL, NULL, NULL, NULL),
	(21, 'Hamstring', 'Slider Hamstring Curl 2/1', NULL, NULL, NULL, NULL),
	(22, 'Hamstring', 'Slider Hamstring Curl Eccentric', NULL, NULL, NULL, NULL),
	(23, 'Hamstring', 'Slider Single Leg Hamstring Curl', NULL, NULL, NULL, NULL),
	(24, 'Hamstring', 'Slider Single Leg Hamstring Curl Eccentric', NULL, NULL, NULL, NULL),
	(25, 'Hamstring', 'Suspension Hamstring Curl', NULL, NULL, NULL, NULL),
	(26, 'Hamstring', 'Suspension Hamstring Curl 2/1', NULL, NULL, NULL, NULL),
	(27, 'Hamstring', 'Swiss Ball Hamstring Curl', NULL, NULL, NULL, NULL),
	(28, 'Hamstring', 'Swiss Ball Hamstring Curl 2/1', NULL, NULL, NULL, NULL),
	(29, 'Hinge', 'Assisted Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(30, 'Hinge', 'Barbell Deadlift', NULL, NULL, NULL, NULL),
	(31, 'Hinge', 'Barbell Deadlift 2/1', NULL, NULL, NULL, NULL),
	(32, 'Hinge', 'Barbell Deadlift Overcoming Isometric', NULL, NULL, NULL, NULL),
	(33, 'Hinge', 'Barbell Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(34, 'Hinge', 'Barbell Staggered Stance Deadlift', NULL, NULL, NULL, NULL),
	(35, 'Hinge', 'Barbell Staggered Stance Deadlift Overcoming Isometric', NULL, NULL, NULL, NULL),
	(36, 'Hinge', 'Dumbbell Deadlift', NULL, NULL, NULL, NULL),
	(37, 'Hinge', 'Dumbbell Deadlift 2/1', NULL, NULL, NULL, NULL),
	(38, 'Hinge', 'Dumbbell Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(39, 'Hinge', 'Dumbbell Staggered Stance Deadlift', NULL, NULL, NULL, NULL),
	(40, 'Hinge', 'Hinge', NULL, NULL, NULL, NULL),
	(41, 'Hinge', 'Jammer Arm Deadlift', NULL, NULL, NULL, NULL),
	(42, 'Hinge', 'Jammer Arm Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(43, 'Hinge', 'Kettlebell Deadlift', NULL, NULL, NULL, NULL),
	(44, 'Hinge', 'Kettlebell Deadlift', NULL, NULL, NULL, NULL),
	(45, 'Hinge', 'Kettlebell Deadlift 2/1', NULL, NULL, NULL, NULL),
	(46, 'Hinge', 'Kettlebell Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(47, 'Hinge', 'Kettlebell Staggered Stance Deadlift', NULL, NULL, NULL, NULL),
	(48, 'Hinge', 'Kettlebell Staggered Stance Swing', NULL, NULL, NULL, NULL),
	(49, 'Hinge', 'Kettlebell Swing', NULL, NULL, NULL, NULL),
	(50, 'Hinge', 'Landmine Deadlift', NULL, NULL, NULL, NULL),
	(51, 'Hinge', 'Landmine Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(52, 'Hinge', 'Low Cable Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(53, 'Hinge', 'Low Cable Staggered Stance Deadlift', NULL, NULL, NULL, NULL),
	(54, 'Hinge', 'Romanian Deadlift', NULL, NULL, NULL, NULL),
	(55, 'Hinge', 'Single Leg Deadlift', NULL, NULL, NULL, NULL),
	(56, 'Hinge', 'Single Leg Turn', NULL, NULL, NULL, NULL),
	(57, 'Hinge', 'Single Leg Turn w/ Perturbation', NULL, NULL, NULL, NULL),
	(58, 'Hinge', 'Staggered Stance Deadlift Spring Ankle', NULL, NULL, NULL, NULL),
	(59, 'Hinge', 'Sumo Deadlift', NULL, NULL, NULL, NULL),
	(60, 'Hinge', 'Transformer Bar Hinge Deadlift', NULL, NULL, NULL, NULL),
	(61, 'Hinge', 'Trap Bar Deadlift', NULL, NULL, NULL, NULL),
	(62, 'Hinge', 'Trap Bar Deadlift 2/1', NULL, NULL, NULL, NULL),
	(63, 'Hinge', 'Trap Bar Staggered Stance Deadlift', NULL, NULL, NULL, NULL),
	(64, 'Power', '45? Counter Slide', NULL, NULL, NULL, NULL),
	(65, 'Power', '45? Counter Slide Double', NULL, NULL, NULL, NULL),
	(66, 'Power', '45? Slide', NULL, NULL, NULL, NULL),
	(67, 'Power', '45? Slide Double', NULL, NULL, NULL, NULL),
	(68, 'Power', '90? Counter Slide', NULL, NULL, NULL, NULL),
	(69, 'Power', '90? Counter Slide Double', NULL, NULL, NULL, NULL),
	(70, 'Power', '90? Slide', NULL, NULL, NULL, NULL),
	(71, 'Power', '90? Slide Double', NULL, NULL, NULL, NULL),
	(72, 'Power Cardio', 'Alternating Lateral Hop', NULL, NULL, NULL, NULL),
	(73, 'Power Cardio', 'Alternating Pogo', NULL, NULL, NULL, NULL),
	(74, 'Power Cardio', 'Alternating Reverse Lunge w/ Kettlebell Swing', NULL, NULL, NULL, NULL),
	(75, 'Power Cardio', 'Alternating Sagittal Hop', NULL, NULL, NULL, NULL),
	(76, 'Power Cardio', 'Alternating Sagittal/Lateral Hop', NULL, NULL, NULL, NULL),
	(77, 'Power', 'Approach Jump', NULL, NULL, NULL, NULL),
	(78, 'Power', 'Approach Jump Double', NULL, NULL, NULL, NULL),
	(79, 'Power', 'Approach Jump Triple', NULL, NULL, NULL, NULL),
	(80, 'Power', 'Ball 90? Punch', NULL, NULL, NULL, NULL),
	(81, 'Power', 'Ball Approach Punch', NULL, NULL, NULL, NULL),
	(82, 'Power', 'Ball Chest Pass Rhythm', NULL, NULL, NULL, NULL),
	(83, 'Power', 'Ball Fake Slam to Split Squat', NULL, NULL, NULL, NULL),
	(84, 'Power Cardio', 'Ball Open Step Side to Side Scoop Pass', NULL, NULL, NULL, NULL),
	(85, 'Power', 'Ball Scoop Pass', NULL, NULL, NULL, NULL),
	(86, 'Power Cardio', 'Ball Side Step Side to Side Scoop Pass', NULL, NULL, NULL, NULL),
	(87, 'Power', 'Ball Side to Side (Open Step) Punch', NULL, NULL, NULL, NULL),
	(88, 'Power', 'Ball Side to Side (Open Step) Punch w/ Band Resistance', NULL, NULL, NULL, NULL),
	(89, 'Power', 'Ball Single Leg Toss', NULL, NULL, NULL, NULL),
	(90, 'Power', 'Ball Single Leg Toss from Depth Drop', NULL, NULL, NULL, NULL),
	(91, 'Power', 'Ball Single Leg Toss from Drop', NULL, NULL, NULL, NULL),
	(92, 'Power Cardio', 'Ball Skater Side to Side Scoop Pass', NULL, NULL, NULL, NULL),
	(93, 'Power', 'Ball Slam', NULL, NULL, NULL, NULL),
	(94, 'Power', 'Ball Staggered Stance Toss', NULL, NULL, NULL, NULL),
	(95, 'Power', 'Ball Staggered Stance Toss from Depth Drop', NULL, NULL, NULL, NULL),
	(96, 'Power', 'Ball Staggered Stance Toss from Drop', NULL, NULL, NULL, NULL),
	(97, 'Power', 'Ball Stepping Scoop Pass', NULL, NULL, NULL, NULL),
	(98, 'Power', 'Ball Supine Chest Pass', NULL, NULL, NULL, NULL),
	(99, 'Power', 'Ball Toss', NULL, NULL, NULL, NULL),
	(100, 'Power', 'Ball Toss from Depth Drop', NULL, NULL, NULL, NULL),
	(101, 'Power', 'Ball Toss from Drop', NULL, NULL, NULL, NULL),
	(102, 'Power', 'BallStepping Chest Pass', NULL, NULL, NULL, NULL),
	(103, 'Power Cardio', 'Band Assisted Alternating Pogo', NULL, NULL, NULL, NULL),
	(104, 'Power', 'Band Assisted First Step', NULL, NULL, NULL, NULL),
	(105, 'Power Cardio', 'Band Assisted Hop', NULL, NULL, NULL, NULL),
	(106, 'Power', 'Band Assisted Jump', NULL, NULL, NULL, NULL),
	(107, 'Power Cardio', 'Band Assisted Pogo', NULL, NULL, NULL, NULL),
	(108, 'Power Cardio', 'Band Assisted Single Leg Pogo', NULL, NULL, NULL, NULL),
	(109, 'Power', 'Band Assisted Staggered Stance Jump', NULL, NULL, NULL, NULL),
	(110, 'Power', 'Band Resisted Broad Jump', NULL, NULL, NULL, NULL),
	(111, 'Power', 'Band Resisted Cross Step from Open Step (Power)', NULL, NULL, NULL, NULL),
	(112, 'Power', 'Band Resisted Lay Up Step', NULL, NULL, NULL, NULL),
	(113, 'Power', 'Band Resisted Slide', NULL, NULL, NULL, NULL),
	(114, 'Power', 'Band Resisted Step Up', NULL, NULL, NULL, NULL),
	(115, 'Power', 'Band Resisted Step Up w/ Initial Step', NULL, NULL, NULL, NULL),
	(116, 'Power', 'Bound', NULL, NULL, NULL, NULL),
	(117, 'Power', 'Box Cross Step Jump', NULL, NULL, NULL, NULL),
	(118, 'Power', 'Box Hop Land on Two', NULL, NULL, NULL, NULL),
	(119, 'Power', 'Box Jump', NULL, NULL, NULL, NULL),
	(120, 'Power', 'Box Jump from Depth Drop', NULL, NULL, NULL, NULL),
	(121, 'Power', 'Box Jump from Drop', NULL, NULL, NULL, NULL),
	(122, 'Power', 'Box Slide Jump', NULL, NULL, NULL, NULL),
	(123, 'Power', 'Box Slide, Cross Step Jump', NULL, NULL, NULL, NULL),
	(124, 'Power', 'Box Split Jump Land on Two', NULL, NULL, NULL, NULL),
	(125, 'Power', 'Broad Jump', NULL, NULL, NULL, NULL),
	(126, 'Power', 'Broad Jump Continuous', NULL, NULL, NULL, NULL),
	(127, 'Power', 'Broad Jump Double', NULL, NULL, NULL, NULL),
	(128, 'Power', 'Broad Jump Triple', NULL, NULL, NULL, NULL),
	(129, 'Power', 'Counter Slide', NULL, NULL, NULL, NULL),
	(130, 'Power', 'Counter Slide Double', NULL, NULL, NULL, NULL),
	(131, 'Power', 'Cross Step from Open Step (Power)', NULL, NULL, NULL, NULL),
	(132, 'Power', 'Cross Step from Open Step (Rhythm)', NULL, NULL, NULL, NULL),
	(133, 'Power Cardio', 'Flying Sprint', NULL, NULL, NULL, NULL),
	(134, 'Power Cardio', 'Forward Lunge w/ Vipr Swing', NULL, NULL, NULL, NULL),
	(135, 'Power', 'Jump from Depth Drop', NULL, NULL, NULL, NULL),
	(136, 'Power', 'Jump from Drop', NULL, NULL, NULL, NULL),
	(137, 'Power', 'Kettlebell Snatch', NULL, NULL, NULL, NULL),
	(138, 'Power Cardio', 'Lateral Hop', NULL, NULL, NULL, NULL),
	(139, 'Power Cardio', 'Lateral Jump', NULL, NULL, NULL, NULL),
	(140, 'Power Cardio', 'Line Alternating Lateral Hop', NULL, NULL, NULL, NULL),
	(141, 'Power Cardio', 'Line Alternating Sagittal Hop', NULL, NULL, NULL, NULL),
	(142, 'Power Cardio', 'Line Alternating Sagittal/Lateral Hop', NULL, NULL, NULL, NULL),
	(143, 'Power Cardio', 'Line Lateral Hop', NULL, NULL, NULL, NULL),
	(144, 'Power Cardio', 'Line Lateral Jump', NULL, NULL, NULL, NULL),
	(145, 'Power Cardio', 'Line Sagittal Hop', NULL, NULL, NULL, NULL),
	(146, 'Power Cardio', 'Line Sagittal Jump', NULL, NULL, NULL, NULL),
	(147, 'Power Cardio', 'Line Sagittal/Lateral Hop', NULL, NULL, NULL, NULL),
	(148, 'Power Cardio', 'Line Sagittal/Lateral Jump', NULL, NULL, NULL, NULL),
	(149, 'Power Cardio', 'Open Step Side to Side', NULL, NULL, NULL, NULL),
	(150, 'Power Cardio', 'Pogo', NULL, NULL, NULL, NULL),
	(151, 'Power Cardio', 'Reverse Lunge w/ Kettlebell Swing', NULL, NULL, NULL, NULL),
	(152, 'Power Cardio', 'Reverse Lunge w/ Vipr Swing', NULL, NULL, NULL, NULL),
	(153, 'Power Cardio', 'Sagittal Hop', NULL, NULL, NULL, NULL),
	(154, 'Power Cardio', 'Sagittal Jump', NULL, NULL, NULL, NULL),
	(155, 'Power Cardio', 'Sagittal/Lateral Hop', NULL, NULL, NULL, NULL),
	(156, 'Power Cardio', 'Sagittal/Lateral Jump', NULL, NULL, NULL, NULL),
	(157, 'Power Cardio', 'Side Step Side to Side', NULL, NULL, NULL, NULL),
	(158, 'Power', 'Side to Side (Open Step) Jab', NULL, NULL, NULL, NULL),
	(159, 'Power', 'Side to Side (Open Step) Jab w/ Band Resistance', NULL, NULL, NULL, NULL),
	(160, 'Power', 'Single Leg Bound', NULL, NULL, NULL, NULL),
	(161, 'Power Cardio', 'Single Leg Pogo', NULL, NULL, NULL, NULL),
	(162, 'Power Cardio', 'Skater Side to Side', NULL, NULL, NULL, NULL),
	(163, 'Power', 'Slide Double', NULL, NULL, NULL, NULL),
	(164, 'Power', 'Split Jump', NULL, NULL, NULL, NULL),
	(165, 'Power', 'Split Jump Double', NULL, NULL, NULL, NULL),
	(166, 'Power', 'Split Jump from Depth Drop', NULL, NULL, NULL, NULL),
	(167, 'Power', 'Split Jump from Drop', NULL, NULL, NULL, NULL),
	(168, 'Power', 'Split Jump Triple', NULL, NULL, NULL, NULL),
	(169, 'Power Cardio', 'Sprint', NULL, NULL, NULL, NULL),
	(170, 'Power Cardio', 'Sprint Slide', NULL, NULL, NULL, NULL),
	(171, 'Power', 'Vipr 45? Open Step Power (Double)', NULL, NULL, NULL, NULL),
	(172, 'Power', 'Vipr 45? Open Step Power (Single)', NULL, NULL, NULL, NULL),
	(173, 'Power', 'Vipr 45? Open Step Power, Rhythm', NULL, NULL, NULL, NULL),
	(174, 'Power', 'Vipr 45? Open Step Power, Rhythm, Rhythm', NULL, NULL, NULL, NULL),
	(175, 'Power Cardio', 'Vipr 45? Open Step Rhythm', NULL, NULL, NULL, NULL),
	(176, 'Power', 'Vipr Cross Step Power (Double)', NULL, NULL, NULL, NULL),
	(177, 'Power', 'Vipr Cross Step Power (Single)', NULL, NULL, NULL, NULL),
	(178, 'Power', 'Vipr Cross Step Power, Rhythm', NULL, NULL, NULL, NULL),
	(179, 'Power', 'Vipr Cross Step Power, Rhythm, Rhythm', NULL, NULL, NULL, NULL),
	(180, 'Power Cardio', 'Vipr Cross Step Rhythm', NULL, NULL, NULL, NULL),
	(181, 'Power', 'Vipr Open Step Power (Double)', NULL, NULL, NULL, NULL),
	(182, 'Power', 'Vipr Open Step Power (Single)', NULL, NULL, NULL, NULL),
	(183, 'Power', 'Vipr Open Step Power, Rhythm', NULL, NULL, NULL, NULL),
	(184, 'Power', 'Vipr Open Step Power, Rhythm, Rhythm', NULL, NULL, NULL, NULL),
	(185, 'Power Cardio', 'Vipr Open Step Rhythm', NULL, NULL, NULL, NULL),
	(186, 'Pull', 'Band Assisted Neutral Grip Pull Up', NULL, NULL, NULL, NULL),
	(187, 'Pull', 'Barbell Bentover Row', NULL, NULL, NULL, NULL),
	(188, 'Pull', 'Barbell Chest Supported Row', NULL, NULL, NULL, NULL),
	(189, 'Pull', 'Cable Half Kneeling Row', NULL, NULL, NULL, NULL),
	(190, 'Pull', 'Cable Half Kneeling Single Arm Row', NULL, NULL, NULL, NULL),
	(191, 'Pull', 'Cable Seated Row', NULL, NULL, NULL, NULL),
	(192, 'Pull', 'Cable Short Seated Single Arm Row', NULL, NULL, NULL, NULL),
	(193, 'Pull', 'Cable Single Arm Row', NULL, NULL, NULL, NULL),
	(194, 'Pull', 'Cable Tall Kneeling Row', NULL, NULL, NULL, NULL),
	(195, 'Pull', 'Cable Tall Kneeling Single Arm Row', NULL, NULL, NULL, NULL),
	(196, 'Pull', 'Dumbbell Chest Supported Alternating Row', NULL, NULL, NULL, NULL),
	(197, 'Pull', 'Dumbbell Chest Supported Alternating Row w/ Isometric Hold', NULL, NULL, NULL, NULL),
	(198, 'Pull', 'Dumbbell Chest Supported Row', NULL, NULL, NULL, NULL),
	(199, 'Pull', 'Dumbbell Chest Supported Row Isometric Hold', NULL, NULL, NULL, NULL),
	(200, 'Pull', 'Dumbbell Chest Supported Single Arm Row', NULL, NULL, NULL, NULL),
	(201, 'Pull', 'Dumbbell Renegade Row', NULL, NULL, NULL, NULL),
	(202, 'Pull', 'High Cable Half Kneeling Row', NULL, NULL, NULL, NULL),
	(203, 'Pull', 'High Cable Half Kneeling Single Arm Row', NULL, NULL, NULL, NULL),
	(204, 'Pull', 'High Cable Short Seated Row', NULL, NULL, NULL, NULL),
	(205, 'Pull', 'High Cable Short Seated Single Arm Row', NULL, NULL, NULL, NULL),
	(206, 'Pull', 'High Cable Single Arm Row', NULL, NULL, NULL, NULL),
	(207, 'Pull', 'High Cable Squated Row', NULL, NULL, NULL, NULL),
	(208, 'Pull', 'High Cable Squated Single Arm Row', NULL, NULL, NULL, NULL),
	(209, 'Pull', 'High Cable Tall Kneeling Row', NULL, NULL, NULL, NULL),
	(210, 'Pull', 'High Cable Tall Kneeling Single Arm Row', NULL, NULL, NULL, NULL),
	(211, 'Pull', 'Jammer Arm Bilateral Stance Row', NULL, NULL, NULL, NULL),
	(212, 'Pull', 'Jammer Arm Bilateral Stance Row Explosive', NULL, NULL, NULL, NULL),
	(213, 'Pull', 'Jammer Arm Bilateral Stance Row Explosive (Continuous)', NULL, NULL, NULL, NULL),
	(214, 'Pull', 'Jammer Arm Staggered Stance Row', NULL, NULL, NULL, NULL),
	(215, 'Pull', 'Jammer Arm Staggered Stance Row Explosive', NULL, NULL, NULL, NULL),
	(216, 'Pull', 'Jammer Arm Swing', NULL, NULL, NULL, NULL),
	(217, 'Pull', 'Landmine Bilateral Stance Row', NULL, NULL, NULL, NULL),
	(218, 'Pull', 'Landmine Staggered Stance Row', NULL, NULL, NULL, NULL),
	(219, 'Pull', 'Low Cable Half Kneeling Row', NULL, NULL, NULL, NULL),
	(220, 'Pull', 'Low Cable Half Kneeling Single Arm Row', NULL, NULL, NULL, NULL),
	(221, 'Pull', 'Low Cable Seated Row', NULL, NULL, NULL, NULL),
	(222, 'Pull', 'Low Cable Short Seated Single Arm Row', NULL, NULL, NULL, NULL),
	(223, 'Pull', 'Low Cable Single Arm Row', NULL, NULL, NULL, NULL),
	(224, 'Pull', 'Low Cable Tall Kneeling Row', NULL, NULL, NULL, NULL),
	(225, 'Pull', 'Low Cable Tall Kneeling Single Arm Row', NULL, NULL, NULL, NULL),
	(226, 'Pull', 'Neutral Grip Pull Up', NULL, NULL, NULL, NULL),
	(227, 'Pull', 'Neutral Grip Pull Up Eccentric', NULL, NULL, NULL, NULL),
	(228, 'Pull', 'Neutral Grip Pull Up Explosive', NULL, NULL, NULL, NULL),
	(229, 'Pull', 'Neutral Grip Pull Up Isometric Hold', NULL, NULL, NULL, NULL),
	(230, 'Pull', 'Suspension Archer Row', NULL, NULL, NULL, NULL),
	(231, 'Pull', 'Suspension Archer Row Isometric Hold', NULL, NULL, NULL, NULL),
	(232, 'Pull', 'Suspension Row', NULL, NULL, NULL, NULL),
	(233, 'Pull', 'Suspension Row 2/1', NULL, NULL, NULL, NULL),
	(234, 'Pull', 'Suspension Row Isometric Hold', NULL, NULL, NULL, NULL),
	(235, 'Pull', 'Suspension Row Isometric Hold', NULL, NULL, NULL, NULL),
	(236, 'Pull', 'Suspension Seated Row', NULL, NULL, NULL, NULL),
	(237, 'Pull', 'Suspension Single Arm Row', NULL, NULL, NULL, NULL),
	(238, 'Pull', 'Suspension Single Arm Row Isometric Hold', NULL, NULL, NULL, NULL),
	(239, 'Pull', 'Suspension Y Row 2/1', NULL, NULL, NULL, NULL),
	(240, 'Pull', 'Weighted Neutral Grip Pull Up', NULL, NULL, NULL, NULL),
	(241, 'Pull', 'Weighted Neutral Grip Pull Up Eccentric', NULL, NULL, NULL, NULL),
	(242, 'Pull', 'Weighted Neutral Grip Pull Up Isometric Hold', NULL, NULL, NULL, NULL),
	(243, 'Push', 'Alternating Shoulder Tap', NULL, NULL, NULL, NULL),
	(244, 'Push', 'Band Assisted Push Up Plyometric', NULL, NULL, NULL, NULL),
	(245, 'Push', 'Barbell Abdominal Roll Out', NULL, NULL, NULL, NULL),
	(246, 'Push', 'Barbell Bench Press', NULL, NULL, NULL, NULL),
	(247, 'Push', 'Barbell Floor Press', NULL, NULL, NULL, NULL),
	(248, 'Push', 'Barbell Floor Press Overcoming Isometric', NULL, NULL, NULL, NULL),
	(249, 'Push', 'Bear', NULL, NULL, NULL, NULL),
	(250, 'Push', 'Cable Bilateral Stance Single Arm Press', NULL, NULL, NULL, NULL),
	(251, 'Push', 'Cable Staggered Stance Single Arm Press', NULL, NULL, NULL, NULL),
	(252, 'Push', 'Dead Bug', NULL, NULL, NULL, NULL),
	(253, 'Push', 'Dead Bug Contralateral', NULL, NULL, NULL, NULL),
	(254, 'Push', 'Dead Bug Hands Only', NULL, NULL, NULL, NULL),
	(255, 'Push', 'Dead Bug Ipsilateral', NULL, NULL, NULL, NULL),
	(256, 'Push', 'Dead Bug Legs Only', NULL, NULL, NULL, NULL),
	(257, 'Push', 'Dumbbell Bench Alternating Press', NULL, NULL, NULL, NULL),
	(258, 'Push', 'Dumbbell Bench Press', NULL, NULL, NULL, NULL),
	(259, 'Push', 'Dumbbell Bench Reciprocal Press', NULL, NULL, NULL, NULL),
	(260, 'Push', 'Dumbbell Bench Single Arm Press', NULL, NULL, NULL, NULL),
	(261, 'Push', 'Dumbbell Floor Alternating Press', NULL, NULL, NULL, NULL),
	(262, 'Push', 'Dumbbell Floor Hooklying Alternating Press', NULL, NULL, NULL, NULL),
	(263, 'Push', 'Dumbbell Floor Hooklying Press', NULL, NULL, NULL, NULL),
	(264, 'Push', 'Dumbbell Floor Hooklying Reciprocal Press', NULL, NULL, NULL, NULL),
	(265, 'Push', 'Dumbbell Floor Hooklying Single Arm Press', NULL, NULL, NULL, NULL),
	(266, 'Push', 'Dumbbell Floor Press', NULL, NULL, NULL, NULL),
	(267, 'Push', 'Dumbbell Floor Reciprocal Press', NULL, NULL, NULL, NULL),
	(268, 'Push', 'Dumbbell Floor Single Arm Press', NULL, NULL, NULL, NULL),
	(269, 'Push', 'Dumbbell Incline (*) Bench Alternating Press', NULL, NULL, NULL, NULL),
	(270, 'Push', 'Dumbbell Incline (*) Bench Press', NULL, NULL, NULL, NULL),
	(271, 'Push', 'Dumbbell Incline (*) Bench Reciprocal Press', NULL, NULL, NULL, NULL),
	(272, 'Push', 'Dumbbell Incline (*) Bench Single Arm Press', NULL, NULL, NULL, NULL),
	(273, 'Push', 'Elbow Plank', NULL, NULL, NULL, NULL),
	(274, 'Push', 'Feet Elevated Plank', NULL, NULL, NULL, NULL),
	(275, 'Push', 'Feet Elevated Push Up', NULL, NULL, NULL, NULL),
	(276, 'Push', 'Feet Elevated Push Up Isometric Hold', NULL, NULL, NULL, NULL),
	(277, 'Push', 'Heel Supported Hip Flexion', NULL, NULL, NULL, NULL),
	(278, 'Push', 'Heel Supported Plank', NULL, NULL, NULL, NULL),
	(279, 'Push', 'Hip Flexion', NULL, NULL, NULL, NULL),
	(280, 'Push', 'Incline Push Up', NULL, NULL, NULL, NULL),
	(281, 'Push', 'Incline Push Up', NULL, NULL, NULL, NULL),
	(282, 'Push', 'Jammer Arm 180? Punch', NULL, NULL, NULL, NULL),
	(283, 'Push', 'Jammer Arm Bilateral Stance Press', NULL, NULL, NULL, NULL),
	(284, 'Push', 'Jammer Arm Bilateral Stance Punch', NULL, NULL, NULL, NULL),
	(285, 'Push', 'Jammer Arm Single Arm Bilateral Stance Press', NULL, NULL, NULL, NULL),
	(286, 'Push', 'Jammer Arm Single Arm Bilateral Stance Punch', NULL, NULL, NULL, NULL),
	(287, 'Push', 'Jammer Arm Single Arm Staggered Stance Press', NULL, NULL, NULL, NULL),
	(288, 'Push', 'Jammer Arm Single Arm Staggered Stance Punch', NULL, NULL, NULL, NULL),
	(289, 'Push', 'Jammer Arm Staggered Stance Press', NULL, NULL, NULL, NULL),
	(290, 'Push', 'Jammer Arm Staggered Stance Punch', NULL, NULL, NULL, NULL),
	(291, 'Push', 'Landmine 90? Punch', NULL, NULL, NULL, NULL),
	(292, 'Push', 'Landmine 90? Punch', NULL, NULL, NULL, NULL),
	(293, 'Push', 'Landmine Bilateral Stance Press', NULL, NULL, NULL, NULL),
	(294, 'Push', 'Landmine Bilateral Stance Punch', NULL, NULL, NULL, NULL),
	(295, 'Push', 'Landmine Bilateral Stance Punch to Staggered Stance', NULL, NULL, NULL, NULL),
	(296, 'Push', 'Landmine H Press', NULL, NULL, NULL, NULL),
	(297, 'Push', 'Landmine H Punch', NULL, NULL, NULL, NULL),
	(298, 'Push', 'Landmine H Punch to Staggered Stance', NULL, NULL, NULL, NULL),
	(299, 'Push', 'Landmine Half Kneeling Press', NULL, NULL, NULL, NULL),
	(300, 'Push', 'Landmine Staggered Stance Press', NULL, NULL, NULL, NULL),
	(301, 'Push', 'Landmine Staggered Stance Press w/ Reach Through', NULL, NULL, NULL, NULL),
	(302, 'Push', 'Landmine Staggered Stance Punch', NULL, NULL, NULL, NULL),
	(303, 'Push', 'Landmine Tall Kneeling Press', NULL, NULL, NULL, NULL),
	(304, 'Push', 'Landmine Tall Kneeling Punch', NULL, NULL, NULL, NULL),
	(305, 'Push', 'Lazy Bear', NULL, NULL, NULL, NULL),
	(306, 'Push', 'Plank', NULL, NULL, NULL, NULL),
	(307, 'Push', 'Plank', NULL, NULL, NULL, NULL),
	(308, 'Push', 'Push Up', NULL, NULL, NULL, NULL),
	(309, 'Push', 'Push Up Explosive to Plate', NULL, NULL, NULL, NULL),
	(310, 'Push', 'Push Up Isometric Hold', NULL, NULL, NULL, NULL),
	(311, 'Push', 'Push Up Plyometric', NULL, NULL, NULL, NULL),
	(312, 'Push', 'Slider Abdominal Roll Out', NULL, NULL, NULL, NULL),
	(313, 'Push', 'Suspension Abdominal Roll Out', NULL, NULL, NULL, NULL),
	(314, 'Push', 'Suspension Hip Flexion', NULL, NULL, NULL, NULL),
	(315, 'Push', 'Suspension Plank', NULL, NULL, NULL, NULL),
	(316, 'Push', 'Suspension Push Up', NULL, NULL, NULL, NULL),
	(317, 'Push', 'Swiss Ball Abdominal Roll Out', NULL, NULL, NULL, NULL),
	(318, 'Push', 'Swiss Ball Plank', NULL, NULL, NULL, NULL),
	(319, 'Squat', 'Barbell Front Squat', NULL, NULL, NULL, NULL),
	(320, 'Squat', 'Barbell High Back Squat', NULL, NULL, NULL, NULL),
	(321, 'Squat', 'Barbell High Back Squat Overcoming Isometric', NULL, NULL, NULL, NULL),
	(322, 'Squat', 'Barbell Low Back Squat', NULL, NULL, NULL, NULL),
	(323, 'Squat', 'Barbell Staggered Stance High Back Squat Overcoming Isometric', NULL, NULL, NULL, NULL),
	(324, 'Squat', 'Depth Squat', NULL, NULL, NULL, NULL),
	(325, 'Squat', 'Double Kettlebell Rack Depth Squat', NULL, NULL, NULL, NULL),
	(326, 'Squat', 'Double Kettlebell Rack Front Foot Elevated Split Squat', NULL, NULL, NULL, NULL),
	(327, 'Squat', 'Double Kettlebell Rack Pistol Squat', NULL, NULL, NULL, NULL),
	(328, 'Squat', 'Double Kettlebell Rack Single Leg Squat to Box', NULL, NULL, NULL, NULL),
	(329, 'Squat', 'Double Kettlebell Rack Skater Squat', NULL, NULL, NULL, NULL),
	(330, 'Squat', 'Double Kettlebell Rack Squat', NULL, NULL, NULL, NULL),
	(331, 'Squat', 'Double Kettlebell Rack Step Up', NULL, NULL, NULL, NULL),
	(332, 'Squat', 'Double Kettlebell Step Down', NULL, NULL, NULL, NULL),
	(333, 'Squat', 'Double Kettlebell Step Up w/ Knee Drive', NULL, NULL, NULL, NULL),
	(334, 'Squat', 'Dumbbell Depth Squat', NULL, NULL, NULL, NULL),
	(335, 'Squat', 'Dumbbell Goblet Squat', NULL, NULL, NULL, NULL),
	(336, 'Squat', 'Dumbbell Lateral Squat', NULL, NULL, NULL, NULL),
	(337, 'Squat', 'Dumbbell Single Leg Calf Raise', NULL, NULL, NULL, NULL),
	(338, 'Squat', 'Dumbbell Step Down', NULL, NULL, NULL, NULL),
	(339, 'Squat', 'Dumbbell Step Up', NULL, NULL, NULL, NULL),
	(340, 'Squat', 'Dumbbell Step Up w/ Knee Drive', NULL, NULL, NULL, NULL),
	(341, 'Squat', 'Forward Lunge', NULL, NULL, NULL, NULL),
	(342, 'Squat', 'Front Foot Elevated Split Squat', NULL, NULL, NULL, NULL),
	(343, 'Squat', 'Front Foot Elevated Split Squat Isometric Hold', NULL, NULL, NULL, NULL),
	(344, 'Squat', 'Front Foot Elevated Split Squat Spring Ankle', NULL, NULL, NULL, NULL),
	(345, 'Squat', 'Front Foot Elevated Split Squat Spring Ankle Isometric Hold', NULL, NULL, NULL, NULL),
	(346, 'Squat', 'Kettlebell Depth Squat', NULL, NULL, NULL, NULL),
	(347, 'Squat', 'Kettlebell Goblet Squat', NULL, NULL, NULL, NULL),
	(348, 'Squat', 'Kettlebell Lateral Squat', NULL, NULL, NULL, NULL),
	(349, 'Squat', 'Kettlebell Rack Front Foot Elevated Split Squat Contralateral', NULL, NULL, NULL, NULL),
	(350, 'Squat', 'Kettlebell Rack Lateral Lunge Contralateral', NULL, NULL, NULL, NULL),
	(351, 'Squat', 'Kettlebell Rack Lateral Squat Contralateral', NULL, NULL, NULL, NULL),
	(352, 'Squat', 'Kettlebell Rack Pistol Squat', NULL, NULL, NULL, NULL),
	(353, 'Squat', 'Kettlebell Rack Single Leg Squat to Box', NULL, NULL, NULL, NULL),
	(354, 'Squat', 'Kettlebell Rack Skater Squat', NULL, NULL, NULL, NULL),
	(355, 'Squat', 'Kettlebell Rack Step Down', NULL, NULL, NULL, NULL),
	(356, 'Squat', 'Kettlebell Rack Step Up Ipsilateral', NULL, NULL, NULL, NULL),
	(357, 'Squat', 'Kettlebell Rack Step Up w/ Knee Drive', NULL, NULL, NULL, NULL),
	(358, 'Squat', 'Kettlebell Single Leg Calf Raise', NULL, NULL, NULL, NULL),
	(359, 'Squat', 'Kettlebell Step Down', NULL, NULL, NULL, NULL),
	(360, 'Squat', 'Kettlebell Step Up', NULL, NULL, NULL, NULL),
	(361, 'Squat', 'Kettlebell Step Up w/ Knee Drive', NULL, NULL, NULL, NULL),
	(362, 'Squat', 'Lateral Lunge', NULL, NULL, NULL, NULL),
	(363, 'Squat', 'Lateral Squat', NULL, NULL, NULL, NULL),
	(364, 'Squat', 'Pistol Squat', NULL, NULL, NULL, NULL),
	(365, 'Squat', 'Rear Foot Elevated Split Squat', NULL, NULL, NULL, NULL),
	(366, 'Squat', 'Rear Foot Elevated Split Squat Isometric', NULL, NULL, NULL, NULL),
	(367, 'Squat', 'Rear Foot Elevated Split Squat Isometric Hold', NULL, NULL, NULL, NULL),
	(368, 'Squat', 'Rear Foot Elevated Split Squat Spring Ankle', NULL, NULL, NULL, NULL),
	(369, 'Squat', 'Rear Foot Elevated Split Squat Spring Ankle Isometric Hold', NULL, NULL, NULL, NULL),
	(370, 'Squat', 'Reverse Lunge', NULL, NULL, NULL, NULL),
	(371, 'Squat', 'Short Stance Split Squat', NULL, NULL, NULL, NULL),
	(372, 'Squat', 'Short Stance Split Squat Spring Ankle', NULL, NULL, NULL, NULL),
	(373, 'Squat', 'Single Leg Calf Raise', NULL, NULL, NULL, NULL),
	(374, 'Squat', 'Single Leg Partial Squat Isometric Hold (Lateral Step)', NULL, NULL, NULL, NULL),
	(375, 'Squat', 'Single Leg Partial Squat Isometric Hold (Sagittal Step)', NULL, NULL, NULL, NULL),
	(376, 'Squat', 'Single Leg Squat to Box', NULL, NULL, NULL, NULL),
	(377, 'Squat', 'Skater Squat', NULL, NULL, NULL, NULL),
	(378, 'Squat', 'Squat', NULL, NULL, NULL, NULL),
	(379, 'Squat', 'Step Down', NULL, NULL, NULL, NULL),
	(380, 'Squat', 'Step Up', NULL, NULL, NULL, NULL),
	(381, 'Squat', 'Step Up w/ Knee Drive', NULL, NULL, NULL, NULL),
	(382, 'Squat', 'Transformer Bar Front Squat', NULL, NULL, NULL, NULL),
	(383, 'Squat', 'Transformer Bar Goblet Squat', NULL, NULL, NULL, NULL),
	(384, 'Squat', 'Transformer Bar Goblet Squat Concentric', NULL, NULL, NULL, NULL),
	(385, 'Squat', 'Transformer Bar Goblet Squat Eccentric', NULL, NULL, NULL, NULL),
	(386, 'Squat', 'Transformer Bar Goblet Squat Isometric', NULL, NULL, NULL, NULL),
	(387, 'Squat', 'Transformer Bar Goblet Squat Oscilating', NULL, NULL, NULL, NULL),
	(388, 'Squat', 'Transformer Bar High Back Squat', NULL, NULL, NULL, NULL),
	(389, 'Squat', 'Transformer Bar Low Back Squat', NULL, NULL, NULL, NULL),
	(390, 'Squat', 'Transformer Bar Safety Squat Bar Squat', NULL, NULL, NULL, NULL),
	(391, 'Squat', 'Transformer Bar Safety Squat Bar Squat Concentric', NULL, NULL, NULL, NULL),
	(392, 'Squat', 'Transformer Bar Safety Squat Bar Squat Eccentric', NULL, NULL, NULL, NULL),
	(393, 'Squat', 'Transformer Bar Safety Squat Bar Squat Isometric', NULL, NULL, NULL, NULL),
	(394, 'Squat', 'Transformer Bar Safety Squat Bar Squat Oscilating', NULL, NULL, NULL, NULL),
	(395, 'Squat', 'Trap Bar Rear Foot Elevated Split Squat', NULL, NULL, NULL, NULL),
	(396, 'Squat', 'Trap Bar Rear Foot Elevated Split Squat Isometric Hold', NULL, NULL, NULL, NULL),
	(397, 'Squat', 'Vipr Single Leg Partial Squat Isometric Hold (Lateral Step)', NULL, NULL, NULL, NULL),
	(398, 'Squat', 'Vipr Single Leg Partial Squat Isometric Hold (Sagittal Step)', NULL, NULL, NULL, NULL),
	(399, 'Cardio', 'Ball 90? Punch Continuous', NULL, NULL, NULL, NULL),
	(400, 'Cardio', 'Ball Approach Punch Continuous', NULL, NULL, NULL, NULL),
	(401, 'Cardio', 'Ball Side to Side (Open Step) Punch Continuous', NULL, NULL, NULL, NULL),
	(402, 'Cardio', 'Ball Side to Side (Open Step) Punch w/ Band Resistance Continuous', NULL, NULL, NULL, NULL),
	(403, 'Cardio', 'Ball Stepping Chest Pass Continuous', NULL, NULL, NULL, NULL),
	(404, 'Cardio', 'Ball Stepping Scoop Pass Continuous', NULL, NULL, NULL, NULL),
	(405, 'Cardio', 'Band Resisted Cross Step from Open Step (Pace)', NULL, NULL, NULL, NULL),
	(406, 'Cardio', 'Band Resisted Sprint', NULL, NULL, NULL, NULL),
	(407, 'Cardio', 'Cross Step from Open Step (Pace)', NULL, NULL, NULL, NULL),
	(408, 'Cardio', 'Cross Step Jump Continuous', NULL, NULL, NULL, NULL),
	(409, 'Cardio', 'Kettlebell Volley', NULL, NULL, NULL, NULL),
	(410, 'Cardio', 'Prowler Bound', NULL, NULL, NULL, NULL),
	(411, 'Cardio', 'Prowler Sprint', NULL, NULL, NULL, NULL),
	(412, 'Cardio', 'Reverse/Forward Lunge w/ Vipr Swing', NULL, NULL, NULL, NULL),
	(413, 'Cardio', 'Side to Side (Open Step) Jab w/ Band Resistance Continuous', NULL, NULL, NULL, NULL),
	(414, 'Cardio', 'Slide Jump Continuous', NULL, NULL, NULL, NULL),
	(415, 'Cardio', 'Slide, Cross Step Jump Continuous', NULL, NULL, NULL, NULL),
	(416, 'Cardio', 'Split Jump Rhythm', NULL, NULL, NULL, NULL),
	(417, 'Cardio', 'Sprint Slide Verbal Cue', NULL, NULL, NULL, NULL),
	(418, 'Cardio', 'Sprint Slide Visual Cue', NULL, NULL, NULL, NULL),
	(419, 'Cardio', 'Vipr 45? Open Step Power', NULL, NULL, NULL, NULL),
	(420, 'Cardio', 'Vipr Cross Step Power', NULL, NULL, NULL, NULL),
	(421, 'Cardio', 'Vipr Open Step Power', NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;