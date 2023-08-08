-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 04:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h-school`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `Title`, `Category`, `Description`, `StartDate`, `EndDate`, `Status`) VALUES
(7, 'Economics 101', 'Economics', 'Microeconomics', '2023-08-15', '2023-10-20', 'Inactive'),
(8, 'Music Theory', 'Music', 'Fundamentals', '2023-07-25', '2023-09-30', 'Active'),
(9, 'Psychology 101', 'Psychology', 'Introduction', '2023-09-10', '2023-12-05', 'Active'),
(10, 'Chemistry 101', 'Science', 'Basic Chemistry', '2023-07-30', '2023-10-05', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `CourseID` int(11) DEFAULT NULL,
  `InstructorID` int(11) DEFAULT NULL,
  `availability` enum('available','notavailable') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`CourseID`, `InstructorID`, `availability`) VALUES
(7, 8, 'notavailable'),
(8, 9, 'available'),
(9, 10, 'notavailable'),
(10, 3, 'available'),
(10, 4, 'available'),
(10, 5, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `InstructorID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Status` enum('Active','Inactive') DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Specialization` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `FirstName`, `LastName`, `Gender`, `Birthdate`, `Status`, `Email`, `Phone`, `Password`, `Specialization`, `Description`) VALUES
(2, 'Sarah', 'Johnson', 'Female', '1988-09-15', 'Active', 'sarahjohnson@example.com', '+0987654321', '1234', 'English', 'Certified ESL instructor'),
(3, 'Michael', 'Smith', 'Male', '1979-07-20', 'Active', 'm.smith@example.com', '+1122334455', '1234', 'History', 'History PhD'),
(4, 'Emily', 'Wilson', 'Female', '1992-03-12', 'Active', 'emilywilson@example.com', '+1567890123', '1234', 'Science', 'Chemistry specialist'),
(5, 'David', 'Brown', 'Male', '1983-11-28', 'Active', 'dbrown@example.com', '+1789012345', '1234', 'Computer Science', 'Software engineer'),
(6, 'Olivia', 'Davis', 'Female', '1986-06-25', 'Active', 'odavis@example.com', '+1346798521', '1234', 'Art History', 'Art historian'),
(7, 'Daniel', 'Miller', 'Male', '1990-02-02', 'Active', 'dmiller@example.com', '+1111111111', '1234', 'Economics', 'Financial analyst'),
(8, 'Ava', 'Anderson', 'Female', '1994-08-18', 'Active', 'a.anderson@example.com', '+1222222222', '1234', 'Music', 'Professional musician'),
(9, 'James', 'Martinez', 'Male', '1982-04-06', 'Inactive', 'jmartinez@example.com', '+1333333333', '1234', 'Psychology', 'Therapist'),
(10, 'Mia', 'Thompson', 'Female', '1989-12-24', 'Active', 'mthompson@example.com', '+1444444444', '1234', 'Sociology', 'Social researcher');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Status` enum('Active','Inactive') DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `FirstName`, `LastName`, `Gender`, `Birthdate`, `Status`, `Email`, `Phone`, `Password`) VALUES
(4, 'Liam', 'Brown', 'Male', '1997-05-12', 'Active', 'liambrown@example.com', '+1567890123', '1234'),
(5, 'Olivia', 'Miller', 'Female', '1999-09-28', 'Active', 'oliviamiller@example.com', '+1789012345', '1234'),
(7, 'Isabella', 'Anderson', 'Female', '1998-10-02', 'Active', 'isabellaanderson@example.com', '+1111111111', '1234'),
(8, 'Sophia', 'Martinez', 'Female', '1996-06-18', 'Active', 'sophiamartinez@example.com', '+1222222222', '1234'),
(9, 'Mia', 'Thompson', 'Female', '2000-12-06', 'Inactive', 'miathompson@example.com', '+1333333333', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `StudentID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`StudentID`, `CourseID`) VALUES
(4, 8),
(5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `trainingprovider`
--

CREATE TABLE `trainingprovider` (
  `TrainingProviderID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainingprovider`
--

INSERT INTO `trainingprovider` (`TrainingProviderID`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
(1, 'hschool', 'Courses', 'hschool@example.com', '1234'),
(2, 'Education', 'Experts', 'edexperts@example.com', '1234'),
(3, 'Learning', 'Hub', 'learninghub@example.com', '1234'),
(4, 'Global', 'Academy', 'globalacademy@example.com', '1234'),
(5, 'Pro', 'Training', 'protraining@example.com', '1234'),
(6, 'Tech', 'Solutions', 'techsolutions@example.com', '1234'),
(7, 'Elite', 'Learning', 'elitelearning@example.com', '1234'),
(8, 'Master', 'Courses', 'mastercourses@example.com', '1234'),
(9, 'Skills', 'Institute', 'skillsinstitute@example.com', '1234'),
(10, 'Prime', 'Education', 'primeeducation@example.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD KEY `InstructorID` (`InstructorID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`InstructorID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD KEY `new_constraint_name_here` (`CourseID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `trainingprovider`
--
ALTER TABLE `trainingprovider`
  ADD PRIMARY KEY (`TrainingProviderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainingprovider`
--
ALTER TABLE `trainingprovider`
  MODIFY `TrainingProviderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD CONSTRAINT `course_instructor_ibfk_3` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_instructor_ibfk_4` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `new_constraint_name_here` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
