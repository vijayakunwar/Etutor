-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 12:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_ID` int(11) NOT NULL,
  `book_Date` date NOT NULL,
  `student_ID` int(11) NOT NULL,
  `tutor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_ID`, `book_Date`, `student_ID`, `tutor_ID`) VALUES
(1, '2019-09-25', 2, 1),
(2, '2019-09-17', 1, 2),
(3, '2019-09-18', 1, 1),
(5, '2019-09-28', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_ID`, `user_ID`) VALUES
(1, 2),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(11) NOT NULL,
  `subject_Name` varchar(250) NOT NULL,
  `subject_length` int(11) NOT NULL,
  `tutor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_ID`, `subject_Name`, `subject_length`, `tutor_ID`) VALUES
(1, 'Html', 10, 1),
(2, 'javaScript', 12, 2),
(3, 'CSS3', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_ID` int(11) NOT NULL,
  `tutor_Mode` varchar(100) NOT NULL,
  `tutor_location` varchar(100) NOT NULL,
  `tutor_rate` int(20) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_ID`, `tutor_Mode`, `tutor_location`, `tutor_rate`, `user_ID`) VALUES
(1, 'distance', 'spring hill', 100, 1),
(2, 'onsite', 'toombul', 67, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `user_Fname` varchar(100) NOT NULL,
  `user_Lname` varchar(100) NOT NULL,
  `user_Password` longtext NOT NULL,
  `user_Email` varchar(250) NOT NULL,
  `user_Type` int(11) NOT NULL,
  `user_Phone` int(11) NOT NULL,
  `user_Gender` varchar(15) NOT NULL,
  `user_Age` int(11) NOT NULL,
  `user_DOB` date NOT NULL,
  `user_Pay_Type` varchar(100) NOT NULL,
  `user_Image` varchar(255) NOT NULL,
  `user_Name` varchar(45) NOT NULL,
  `user_Certificate` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_Fname`, `user_Lname`, `user_Password`, `user_Email`, `user_Type`, `user_Phone`, `user_Gender`, `user_Age`, `user_DOB`, `user_Pay_Type`, `user_Image`, `user_Name`, `user_Certificate`) VALUES
(1, 'Vijaya', 'Kunwar', '123456789', 'vijaya.kunwar@gmail.com', 1, 1234567890, 'Male', 33, '1990-09-19', 'Debit card', 'vijay.jpg', 'vijaykunwar', ''),
(2, 'Eswor', 'Ghanta', '$2y$10$fKCOP39BUd46C4Xm49iInO7ijJZHfElCPQIs0iMrEPy5IVwJTFvaK', 'eswar@gmail.com', 2, 1433214324, 'male', 20, '2000-09-26', 'paypal', 'eswar.jpg', 'eswar1', ''),
(3, 'jeremy', 'Hi', '$2y$10$fKCOP39BUd46C4Xm49iInO7ijJZHfElCPQIs0iMrEPy5IVwJTFvaK', 'jeremy@gmail.com', 2, 1234567890, 'male', 23, '2001-09-10', 'paypal', 'jeremy.jpg', 'jeremy1', ''),
(4, 'Harry', 'Qi', '$2y$10$fKCOP39BUd46C4Xm49iInO7ijJZHfElCPQIs0iMrEPy5IVwJTFvaK', 'harry@gmail.com', 1, 324321421, 'male', 24, '2001-09-25', 'Cash', 'harry.jpg', 'harry1', ''),
(5, 'Kimberly', 'Clark', '$2y$10$fKCOP39BUd46C4Xm49iInO7ijJZHfElCPQIs0iMrEPy5IVwJTFvaK', 'jhon@gmail.com', 2, 1244546732, 'female', 20, '2000-09-10', 'paypal', 'kimberly.jpg', 'kimberly1', ''),
(6, 'vijay', 'kunwar', '$2y$10$fKCOP39BUd46C4Xm49iInO7ijJZHfElCPQIs0iMrEPy5IVwJTFvaK', 'kunwar.vijaya@gmail.com', 1, 422033078, 'Male', 0, '1999-10-24', '', '', 'vijaytutor', ''),
(7, 'Jhon', 'Kunwar', '$2y$10$/Q.lOBfSRxECY.HweeOeQerEivx7V2/peEzO33MacYUd0Pw/GD8nm', 'jhon.vijaya@gmail.com', 2, 422033079, 'Male', 0, '1994-01-03', '', '', 'vijaystudent', ''),
(8, 'student', 'one', '$2y$10$1n43G8mtn5OozFkR.QscMuEVIz9gMQfzKQKsc9XDTHRxz.CvaN7z2', 'student.one@gmail.com', 2, 2147483647, 'Male', 0, '1994-01-03', '', 'student_one.jpg', 'student1', ''),
(9, 'student', 'two', '$2y$10$R0IXR4sEl7OwHfEtbq./L.9PH9cZJugkOvxW43E/WaODgYk7Rjcc2', 'student.two@gmail.com', 2, 422044078, 'Female', 0, '2003-10-24', '', '', 'student2', ''),
(10, 'tutor', 'one', '$2y$10$EOAsqJ7N4MIN0m1kQhrIm.R6FVIu7.tpCi8WYn.30Uvv5KIBmoSOK', 'tutor.one@gmail.com', 1, 1234567890, 'Male', 0, '1990-04-09', '', '', 'tutor1', ''),
(11, 'tutor', 'two', '$2y$10$T1vuwIVJcU4L5rw.XKhPfuaMC/z7wW4./5oS1aTg6OPJWt.5a7hGm', 'tutor.two@gmail.com', 1, 1234567891, 'Male', 0, '1998-04-02', '', '', 'Tutor2', ''),
(12, 'tutor', 'three', '$2y$10$zZQZj2EIpL2f1cO4IcIlYudSFy.s9NkwAK.WSegjyvhhN8G7onHzi', 'tutor.three@gmail.com', 1, 1234567893, 'Male', 0, '2020-04-24', '', 'tutor.jpg', 'tutor3', ''),
(13, 'student', 'four', '$2y$10$Qjjto/./eUrg7l/X7hcDTO86WXipzNpv.ThzhNo/a6AtLuz8CDIzK', 'student.four@gmail.com', 2, 0, 'Female', 0, '1997-05-26', '', 'kimberly.jpg', 'student4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_ID`),
  ADD KEY `student_ID` (`student_ID`),
  ADD KEY `tutor_ID` (`tutor_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_ID`),
  ADD KEY `tutor_ID` (`tutor_ID`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`tutor_ID`) REFERENCES `tutor` (`tutor_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`tutor_ID`) REFERENCES `tutor` (`tutor_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
