-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2021 at 02:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Timetable_Generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `Course_id` int(200) NOT NULL,
  `Course_name` varchar(200) NOT NULL,
  `Course_desc` longtext NOT NULL,
  `Course_Department_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`Course_id`, `Course_name`, `Course_desc`, `Course_Department_id`) VALUES
(2, 'Certificate In Quantum Computing', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo nulla \r\nfacilisi nullam. Orci phasellus egestas tellus rutrum. Nulla facilisi \r\ncras fermentum odio eu feugiat. Dis parturient montes nascetur ridiculus\r\n mus. Scelerisque in dictum non consectetur a era</p>', 3),
(3, 'Diploma In Computational Sciences', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo nulla \r\nfacilisi nullam. Orci phasellus egestas tellus rutrum. Nulla facilisi \r\ncras fermentum odio eu feugiat. Dis parturient montes nascetur ridiculus\r\n mus. Scelerisque in dictum non consectetur a era</p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `Department_id` int(200) NOT NULL,
  `Department_name` varchar(200) NOT NULL,
  `Department_desc` longtext NOT NULL,
  `Department_faculty_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`Department_id`, `Department_name`, `Department_desc`, `Department_faculty_id`) VALUES
(2, 'Computational Sciences', '<blockquote class=\"page-generator__lorem\" id=\"output\">Lorem ipsum dolor \r\nsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt \r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>', 2),
(3, 'Quantum Computing', '<blockquote class=\"page-generator__lorem\" id=\"output\">Lorem ipsum dolor \r\nsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt \r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE `Faculty` (
  `Faculty_id` int(200) NOT NULL,
  `Faculty_name` varchar(200) NOT NULL,
  `Faculty_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`Faculty_id`, `Faculty_name`, `Faculty_desc`) VALUES
(2, 'Computer Science', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `Lecturer`
--

CREATE TABLE `Lecturer` (
  `Lecturer_id` int(200) NOT NULL,
  `Lecturer_name` varchar(200) NOT NULL,
  `Lecturer_email` varchar(200) NOT NULL,
  `Lecturer_Mobile_Number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lecturer`
--

INSERT INTO `Lecturer` (`Lecturer_id`, `Lecturer_name`, `Lecturer_email`, `Lecturer_Mobile_Number`) VALUES
(2, 'Jane Doe', 'janedoe@mail.com', '90100190109');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Login_id` int(200) NOT NULL,
  `Login_username` varchar(200) NOT NULL,
  `Login_password` varchar(200) NOT NULL,
  `Login_Rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Login_id`, `Login_username`, `Login_password`, `Login_Rank`) VALUES
(1, 'System Administrator', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Administrator'),
(2, 'Staff', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `Room_id` int(200) NOT NULL,
  `Room_name` varchar(200) NOT NULL,
  `Room_desc` longtext NOT NULL,
  `Room_No_floor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`Room_id`, `Room_name`, `Room_desc`, `Room_No_floor`) VALUES
(2, 'Room One', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo</p>', 'Ground Flow');

-- --------------------------------------------------------

--
-- Table structure for table `Semester`
--

CREATE TABLE `Semester` (
  `Semester_id` int(200) NOT NULL,
  `Semester_name` varchar(200) NOT NULL,
  `Semester_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Semester`
--

INSERT INTO `Semester` (`Semester_id`, `Semester_name`, `Semester_desc`) VALUES
(2, 'Jan 2021 - Apr 2021', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo nulla \r\nfacilisi nullam. Orci phasellus egestas tellus rutrum. Nulla facilisi \r\ncras fermentum odio eu feugiat. Dis parturient montes nascetur ridiculus\r\n mus. Scelerisque in dictum non consectetur </p>');

-- --------------------------------------------------------

--
-- Table structure for table `Time`
--

CREATE TABLE `Time` (
  `Time_id` int(200) NOT NULL,
  `Time_name` varchar(200) NOT NULL,
  `Time_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Time`
--

INSERT INTO `Time` (`Time_id`, `Time_name`, `Time_desc`) VALUES
(2, '1300 HRS - 1400 HRS', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo</p>');

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

CREATE TABLE `Timetable` (
  `Timetable_id` int(200) NOT NULL,
  `Timetable_Unit_id` int(200) NOT NULL,
  `Timetable_Year_id` int(200) NOT NULL,
  `Timetable_Semester_id` int(200) NOT NULL,
  `Timetable_Lecturer_id` int(200) NOT NULL,
  `Timetable_Time_id` int(200) NOT NULL,
  `Timetable_Room_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Timetable`
--

INSERT INTO `Timetable` (`Timetable_id`, `Timetable_Unit_id`, `Timetable_Year_id`, `Timetable_Semester_id`, `Timetable_Lecturer_id`, `Timetable_Time_id`, `Timetable_Room_id`) VALUES
(9, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Unit`
--

CREATE TABLE `Unit` (
  `Unit_id` int(200) NOT NULL,
  `Unit_name` varchar(200) NOT NULL,
  `Unit_desc` longtext NOT NULL,
  `Unit_Course_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Unit`
--

INSERT INTO `Unit` (`Unit_id`, `Unit_name`, `Unit_desc`, `Unit_Course_id`) VALUES
(2, 'Digital Electronics 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo nulla \r\nfacilisi nullam. Orci phasellus egestas tellus rutrum. Nulla facilisi \r\ncras fermentum odio eu feugiat. Dis parturient montes nascetur ridiculus\r\n mus. Scelerisque in dictum non consectetur </p>', 2),
(3, 'Digital Electronics 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo nulla \r\nfacilisi nullam. Orci phasellus egestas tellus rutrum. Nulla facilisi \r\ncras fermentum odio eu feugiat. Dis parturient montes nascetur ridiculus\r\n mus. Scelerisque in dictum non consectetur </p>', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Year`
--

CREATE TABLE `Year` (
  `Year_id` int(200) NOT NULL,
  `Year_name` varchar(200) NOT NULL,
  `Year_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Year`
--

INSERT INTO `Year` (`Year_id`, `Year_name`, `Year_desc`) VALUES
(2, 'Sep 2021 - Sep 2022', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Proin fermentum leo \r\nvel orci. Tristique sollicitudin nibh sit amet commodo. Odio facilisis \r\nmauris sit amet massa vitae. Tincidunt praesent semper feugiat nibh sed \r\npulvinar proin. Tristique sollicitudin nibh sit amet commodo nulla \r\nfacilisi nullam. Orci phasellus egestas tellus rutrum. Nulla facilisi \r\ncras fermentum odio eu feugiat. Dis parturient montes nascetur ridiculus\r\n mus. Scelerisque in dictum non consectetur </p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`Course_id`),
  ADD KEY `Course_Department_id` (`Course_Department_id`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`Department_id`),
  ADD KEY `Department_faculty_id` (`Department_faculty_id`);

--
-- Indexes for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD PRIMARY KEY (`Faculty_id`);

--
-- Indexes for table `Lecturer`
--
ALTER TABLE `Lecturer`
  ADD PRIMARY KEY (`Lecturer_id`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`Room_id`);

--
-- Indexes for table `Semester`
--
ALTER TABLE `Semester`
  ADD PRIMARY KEY (`Semester_id`);

--
-- Indexes for table `Time`
--
ALTER TABLE `Time`
  ADD PRIMARY KEY (`Time_id`);

--
-- Indexes for table `Timetable`
--
ALTER TABLE `Timetable`
  ADD PRIMARY KEY (`Timetable_id`),
  ADD KEY `Timetable_Unit_id` (`Timetable_Unit_id`),
  ADD KEY `Timetable_Year_id` (`Timetable_Year_id`),
  ADD KEY `Timetable_Semester_id` (`Timetable_Semester_id`),
  ADD KEY `Timetable_Lecturer_id` (`Timetable_Lecturer_id`),
  ADD KEY `Timetable_Time_id` (`Timetable_Time_id`),
  ADD KEY `Timetable_Room_id` (`Timetable_Room_id`);

--
-- Indexes for table `Unit`
--
ALTER TABLE `Unit`
  ADD PRIMARY KEY (`Unit_id`),
  ADD KEY `Unit_Course_id` (`Unit_Course_id`);

--
-- Indexes for table `Year`
--
ALTER TABLE `Year`
  ADD PRIMARY KEY (`Year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `Course_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Department`
--
ALTER TABLE `Department`
  MODIFY `Department_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Faculty`
--
ALTER TABLE `Faculty`
  MODIFY `Faculty_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Lecturer`
--
ALTER TABLE `Lecturer`
  MODIFY `Lecturer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `Login_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Room`
--
ALTER TABLE `Room`
  MODIFY `Room_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Semester`
--
ALTER TABLE `Semester`
  MODIFY `Semester_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Time`
--
ALTER TABLE `Time`
  MODIFY `Time_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Timetable`
--
ALTER TABLE `Timetable`
  MODIFY `Timetable_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Unit`
--
ALTER TABLE `Unit`
  MODIFY `Unit_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Year`
--
ALTER TABLE `Year`
  MODIFY `Year_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Courses`
--
ALTER TABLE `Courses`
  ADD CONSTRAINT `CourseDepartment` FOREIGN KEY (`Course_Department_id`) REFERENCES `Department` (`Department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Department`
--
ALTER TABLE `Department`
  ADD CONSTRAINT `FacultyDepartment` FOREIGN KEY (`Department_faculty_id`) REFERENCES `Faculty` (`Faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Timetable`
--
ALTER TABLE `Timetable`
  ADD CONSTRAINT `TimeTable_Room` FOREIGN KEY (`Timetable_Room_id`) REFERENCES `Room` (`Room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TimeTable_Semester` FOREIGN KEY (`Timetable_Semester_id`) REFERENCES `Semester` (`Semester_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Timetable_Lecturer` FOREIGN KEY (`Timetable_Lecturer_id`) REFERENCES `Lecturer` (`Lecturer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Timetable_Unit` FOREIGN KEY (`Timetable_Unit_id`) REFERENCES `Unit` (`Unit_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Timetable_Year` FOREIGN KEY (`Timetable_Year_id`) REFERENCES `Year` (`Year_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Timetable_time` FOREIGN KEY (`Timetable_Time_id`) REFERENCES `Time` (`Time_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Unit`
--
ALTER TABLE `Unit`
  ADD CONSTRAINT `UnitCourse` FOREIGN KEY (`Unit_Course_id`) REFERENCES `Courses` (`Course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
