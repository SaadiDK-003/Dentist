-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 11:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentist`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_by_specialist` (IN `specialist` TEXT)   SELECT
    u.id AS 'u_id',
    u.name,
    u.username,
    u.email,
    u.phone,
    u.certificate,
    u.experience,
    u.checkin_time,
    u.checkout_time,
    c.id AS 'c_id',
    c.clinic_name,
    c.clinic_location,
    c.city
FROM 
    users u
INNER JOIN 
    clinic c ON u.clinic_id = c.id
WHERE 
    u.certificate LIKE CONCAT('%', specialist, '%')
GROUP BY 
    u.id, u.name, u.username, u.email, u.phone, u.certificate, 
    u.experience, u.checkin_time, u.checkout_time, 
    c.id, c.clinic_name, c.clinic_location, c.city$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_by_specialist_and_rating` (IN `specialist` TEXT, IN `rating` INT)   SELECT
    u.id AS 'u_id',
    u.name,
    u.username,
    u.email,
    u.phone,
    u.certificate,
    u.experience,
    u.checkin_time,
    u.checkout_time,
    c.id AS 'c_id',
    c.clinic_name,
    c.clinic_location,
    c.city,
    r.comments,
    ROUND(AVG(r.rating)) AS 'rating'
FROM 
    users u
INNER JOIN 
    clinic c ON u.clinic_id = c.id
INNER JOIN 
    reviews r ON u.id = r.doc_id
WHERE
	r.rating = rating AND
    u.certificate LIKE CONCAT('%', specialist, '%')
GROUP BY 
    u.id, u.name, u.username, u.email, u.phone, u.certificate, 
    u.experience, u.checkin_time, u.checkout_time, 
    c.id, c.clinic_name, c.clinic_location, c.city$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_reservation_visitor` (IN `resr_id` INT)   SELECT
r.id AS 'r_id',
r.start_time AS 'st',
r.total_members AS 'tm',
r.total_tables AS 'tt',
r.table_location AS 'tl',
r.events,
r.end_time AS 'et',
r.cafe_id AS 'cafe_id',
r.created_date,
c.store_name
FROM reservation r
INNER JOIN cafe c
WHERE r.cafe_id = c.id AND r.id = resr_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_categories` ()   SELECT
*
FROM categories c$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_doctors` ()   SELECT
    u.id AS 'u_id',
    u.name,
    u.username,
    u.email,
    u.phone,
    u.certificate,
    u.experience,
    u.checkin_time,
    u.checkout_time,
    u.profile_pic,
    c.id AS 'c_id',
    c.clinic_name,
    c.clinic_location,
    c.city
FROM 
    users u
INNER JOIN 
    clinic c ON u.clinic_id = c.id
WHERE u.role = 'doctor'
GROUP BY 
    u.id, u.name, u.username, u.email, u.phone, u.certificate, 
    u.experience, u.checkin_time, u.checkout_time, 
    c.id, c.clinic_name, c.clinic_location, c.city$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_products` ()   SELECT
p.id AS 'p_id',
p.prod_name,
p.prod_reg_price,
p.prod_disc_price,
p.prod_desc,
p.prod_img,
cat.category_name,
c.id AS 'cafe_id'
FROM
products p
INNER JOIN categories cat
INNER JOIN cafe c
WHERE p.prod_category_id=cat.id AND p.cafe_id=c.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_products_by_cafe_id` (IN `cafe_id` INT)   SELECT
p.id AS 'p_id',
p.prod_name,
p.prod_reg_price,
p.prod_disc_price,
p.prod_desc,
p.prod_img,
cat.category_name,
c.id AS 'cafe_id'
FROM
products p
INNER JOIN categories cat
INNER JOIN cafe c
WHERE p.prod_category_id=cat.id AND p.cafe_id=c.id AND p.cafe_id=cafe_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_products_by_cat_id` (IN `filter_id` INT)   SELECT
p.id AS 'p_id',
p.prod_name,
p.prod_reg_price,
p.prod_disc_price,
p.prod_desc,
p.prod_img,
cat.category_name,
c.id AS 'cafe_id'
FROM
products p
INNER JOIN categories cat
INNER JOIN cafe c
WHERE p.cafe_id=c.id AND p.prod_category_id=cat.id AND p.prod_category_id=filter_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_reviews` ()   SELECT
r.rating AS 'stars',
r.comments,
r.cafe_id,
c.store_name,
u.name AS 'visitor_name'
FROM reviews r
INNER JOIN cafe c
INNER JOIN users u
WHERE r.cafe_id=c.id AND r.user_id=u.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_users` ()   SELECT
*
FROM users WHERE role != 'admin'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_appointment_patient` (IN `doctor_id` INT)   SELECT
r.id AS 'r_id',
r.start_time,
r.end_time,
r.patient_id AS 'patient_id',
r.clinic_id AS 'clinic_id',
r.status AS 'r_status'
FROM reservation r
INNER JOIN users u
WHERE r.doctor_id = u.id AND r.status != 'completed' AND r.doctor_id = doctor_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_appointment_patient_completed` (IN `doctor_id` INT)   SELECT
r.id AS 'r_id',
r.start_time,
r.end_time,
r.patient_id AS 'patient_id',
r.clinic_id AS 'clinic_id',
r.status AS 'r_status'
FROM reservation r
INNER JOIN users u
WHERE r.doctor_id = u.id AND r.status = 'completed' AND r.doctor_id = doctor_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_doctor_info` (IN `doc_id` INT)   SELECT
u.id,
u.name,
u.phone,
u.certificate,
u.experience,
u.checkin_time,
u.checkout_time,
u.weekend_available,
c.id AS 'c_id',
c.clinic_name,
c.clinic_location,
c.clinic_open,
c.clinic_close,
c.status AS 'c_status'
FROM users u
INNER JOIN clinic c
WHERE u.clinic_id = c.id AND u.id = doc_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_doc_by_clinic_id` (IN `clinic_id` INT)   SELECT
u.name,
u.certificate,
u.experience,
c.clinic_name,
c.clinic_location,
c.city
FROM users u
INNER JOIN clinic c
WHERE u.clinic_id = c.id AND u.clinic_id = clinic_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_doc_by_spe_city` (IN `spe` VARCHAR(255), IN `city` VARCHAR(255))   SELECT
u.name,
u.certificate,
u.experience,
u.profile_pic,
c.clinic_name,
c.clinic_location,
c.city
FROM users u
INNER JOIN clinic c
WHERE u.clinic_id = c.id AND u.city = city AND u.certificate = spe$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_doc_info` (IN `doc_id` INT)   SELECT
u.name,
u.email,
u.phone,
u.certificate,
u.experience,
u.checkin_time,
u.checkout_time,
u.weekend_available,
u.profile_pic,
c.clinic_name,
c.clinic_location,
c.city,
c.clinic_number
FROM users u
INNER JOIN clinic c
WHERE u.clinic_id = c.id AND u.id = doc_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_last_five_reviews` ()   SELECT
    u.id AS 'u_id',
    u.name,
    u.username,
    u.email,
    u.phone,
    u.certificate,
    u.experience,
    u.checkin_time,
    u.checkout_time,
    c.id AS 'c_id',
    c.clinic_name,
    c.clinic_location,
    c.city,
    r.comments,
    ROUND(AVG(r.rating)) AS 'rating'
FROM 
    users u
INNER JOIN 
    clinic c ON u.clinic_id = c.id
INNER JOIN 
    reviews r ON u.id = r.doc_id
GROUP BY 
    u.id, u.name, u.username, u.email, u.phone, u.certificate, 
    u.experience, u.checkin_time, u.checkout_time, 
    c.id, c.clinic_name, c.clinic_location, c.city
DESC LIMIT 5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reservation_for_cafe_owner_completed` (IN `cafe_id` INT)   SELECT
r.id AS 'r_id',
r.start_time,
r.total_members,
r.total_tables,
r.table_location,
r.events,
r.users_id AS 'visitor_id',
r.status AS 'r_status'
FROM cafe c
INNER JOIN reservation r
WHERE c.id = r.cafe_id AND r.status = 'completed' AND c.users_id = cafe_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reservation_for_patient` (IN `patient_id` INT)   SELECT
r.id AS 'r_id',
r.start_time,
r.clinic_id AS 'clinic_id',
r.doctor_id AS 'doc_id',
r.status as 'r_status',
r.reviewed
FROM reservation r
INNER JOIN users u
WHERE r.patient_id = u.id AND r.status != 'completed' AND r.patient_id = patient_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reservation_for_patient_completed` (IN `patient_id` INT)   SELECT
r.id AS 'r_id',
r.start_time,
r.clinic_id AS 'clinic_id',
r.doctor_id AS 'doc_id',
r.status as 'r_status',
r.reviewed
FROM reservation r
INNER JOIN users u
WHERE r.patient_id = u.id AND r.status = 'completed' AND r.patient_id = patient_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reviews_by_cafe_id` (IN `cafe_id` INT)   SELECT
r.rating AS 'stars',
r.comments,
r.cafe_id,
c.store_name,
u.name AS 'visitor_name'
FROM reviews r
INNER JOIN cafe c
INNER JOIN users u
WHERE r.cafe_id=c.id AND r.user_id=u.id AND r.cafe_id=cafe_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_visitor_info` (IN `visitor_id` INT)   SELECT
*
FROM
users u
WHERE u.id = visitor_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_all_cafe` ()   SELECT
c.id AS 'cafeID',
c.store_name AS 'store_name'
FROM cafe c
INNER JOIN users u
WHERE c.users_id = u.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_all_doctors` ()   SELECT
u.id AS 'DocID',
u.name AS 'DocName'
FROM users u
WHERE u.role = 'doctor'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `clinic_name` varchar(255) NOT NULL,
  `clinic_location` varchar(255) NOT NULL,
  `clinic_open` time NOT NULL,
  `clinic_close` time NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `city` varchar(255) DEFAULT NULL,
  `clinic_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `clinic_name`, `clinic_location`, `clinic_open`, `clinic_close`, `status`, `city`, `clinic_number`) VALUES
(1, 'no-clinic', 'abc xyz', '00:00:00', '00:00:00', '0', NULL, NULL),
(2, 'Clinic A', 'abc xyz', '09:00:00', '20:00:00', '1', 'Riyadh', '0321-5151242'),
(3, 'Clinic B', 'abc xyz', '10:00:00', '20:00:00', '1', 'Makkah', '0231-5125123');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_hours`
--

CREATE TABLE `doctor_hours` (
  `id` int(11) NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout_time` time NOT NULL,
  `weekend_available` enum('yes','no') NOT NULL DEFAULT 'no',
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `clinic_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','reserved','completed') NOT NULL DEFAULT 'pending',
  `reviewed` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `start_time`, `end_time`, `clinic_id`, `doctor_id`, `patient_id`, `created_date`, `status`, `reviewed`) VALUES
(54, '2024-09-16 17:00:00', '2024-09-16 18:00:00', 3, 39, 36, '2024-09-16 15:05:23', 'completed', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text NOT NULL,
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comments`, `doc_id`, `user_id`) VALUES
(5, 4, 'good doctor.', 39, 36),
(6, 5, 'very good doctor.', 39, 36);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `status`, `img`) VALUES
(1, 'Dental Aesthetic Fillings', '1', './img/prod/dentalaestheticfillings.jpg'),
(2, 'Gum Disease Treatment', '1', './img/prod/GumDiseaseTreatment.jpg'),
(17, 'Tooth Decay', '1', './img/prod/abc.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `diseases` text DEFAULT NULL,
  `certificate` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `role` enum('admin','doctor','patient') NOT NULL DEFAULT 'patient',
  `clinic_id` int(11) NOT NULL,
  `checkin_time` time DEFAULT NULL,
  `checkout_time` time DEFAULT NULL,
  `weekend_available` enum('yes','no') NOT NULL DEFAULT 'no',
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `city` varchar(255) DEFAULT NULL,
  `profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phone`, `diseases`, `certificate`, `experience`, `role`, `clinic_id`, `checkin_time`, `checkout_time`, `weekend_available`, `dob`, `gender`, `city`, `profile_pic`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, 'admin', 1, '00:00:00', '00:00:00', 'no', NULL, 'Male', NULL, NULL),
(36, 'patient_one152', 'p_one', 'patient@gmail.com', '4297f44b13955235245b2497399d7a93', '123123123512323', 'Tooth Issue.', '', '', 'patient', 1, '00:00:00', '00:00:00', 'no', '2010-01-01', 'Male', NULL, NULL),
(37, 'Dr.Junaid', 'junaid', 'doctor@gmail.com', '4297f44b13955235245b2497399d7a93', '1245123141231231', '', 'Dental Aesthetic Fillings', '3 years', 'doctor', 2, '10:30:00', '19:30:00', 'no', NULL, 'Male', 'Makkah', NULL),
(38, 'Dr.Jameel', 'Jameel', 'doctor321@gmail.com', '4297f44b13955235245b2497399d7a93', '1245123141231231', '', 'Gum Disease Treatment', '4 years', 'doctor', 3, '11:30:00', '20:30:00', 'yes', '2024-09-09', 'Male', 'Riyadh', NULL),
(39, 'Dr. Muhammad Ahsan', 'MuhammadAhsan', 'doctor2@gmail.com', '4297f44b13955235245b2497399d7a93', '051251231512', '', 'Tooth Decay', '6 years', 'doctor', 3, '12:30:00', '20:30:00', 'no', '1998-01-01', 'Male', 'Riyadh', './img/prod/abc.png'),
(40, 'patient_two', 'p_two', 'patient1@gmail.com', '4297f44b13955235245b2497399d7a93', '123123123512323', 'Root canal.', '', '', 'patient', 1, '00:00:00', '00:00:00', 'no', NULL, 'Male', NULL, NULL),
(41, 'Carson Peters', 'mipijojaci', 'heyasa@gmail.com', '4297f44b13955235245b2497399d7a93', '+1 (672) 526-5775', 'Dolor quaerat natus ', '', '', 'patient', 1, '00:00:00', '00:00:00', 'no', '2015-01-01', 'Male', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
