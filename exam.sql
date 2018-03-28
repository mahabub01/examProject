-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 01:19 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Admin Hossain', 'Admin', '$2y$12$q28wwVJGHC50tbcr1R7PEORh7g9aTnLNJgVby4Yy2b8vx2S.TtL5i', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(5000) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `questionid` int(11) DEFAULT NULL,
  `reply` int(11) DEFAULT NULL,
  `dates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `username`, `questionid`, `reply`, `dates`) VALUES
(1, '\'test comments\',', ' \'Admin\'', 5, NULL, '0000-00-00 00:00:00'),
(2, '\'hello test\',', ' \'Admin\'', 5, 1, '2018-03-18 00:00:00'),
(3, '\'There are two broadcast domains in the network. There are seven collision domains in the network\',', ' \'Admin\'', 5, 1, '2018-03-18 00:00:00'),
(4, '\'You need to use DSC to configure Server1 as defined in the configuration. What should you run first?\',', ' \'mahabubs4@gmail.com\'', 5, NULL, '2018-03-19 00:00:00'),
(5, '\'\',', ' \'mahabubs4@gmail.com\'', 5, NULL, '2018-03-19 00:00:00'),
(6, '\'\',', ' \'mahabubs4@gmail.com\'', 5, 5, '2018-03-19 00:00:00'),
(7, '\'testing\',', ' \'mahabubs4@gmail.com\'', 5, NULL, '2018-03-19 00:00:00'),
(8, '\'\',', ' \'mahabubs4@gmail.com\'', 5, 5, '2018-03-19 00:00:00'),
(9, '\'asdfasdfasdfasd asdfasdf\',', ' \'mahabubs4@gmail.com\'', 5, NULL, '2018-03-19 00:00:00'),
(10, '\'hello ti aia main\',', ' \'mahabubs4@gmail.com\'', 5, NULL, '2018-03-19 00:00:00'),
(11, '\'You need to use DSC to configure Server1 as defined in the configuration. What should you run first?\',', ' \'mahabubs4@gmail.com\'', 5, NULL, '2018-03-19 00:00:00'),
(12, '\'testing ggggggggggggggggggggggggg\',', ' \'mahabubs4@gmail.com\'', 5, NULL, '2018-03-19 00:00:00'),
(13, 'gsdfasdfasdfasdfasdf,', ' mahabubs4@gmail.com', 5, 5, '0000-00-00 00:00:00'),
(14, 'hello ggggggggg,', ' mahabubs4@gmail.com', 5, 5, '0000-00-00 00:00:00'),
(15, 'testing ssdfsafd,', ' mahabubs4@gmail.com', 5, 12, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `coursecode` varchar(200) DEFAULT NULL,
  `subcourse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `coursecode`, `subcourse`) VALUES
(1, 'CISCO', NULL, NULL),
(2, 'CCNA', '100-120', 1),
(3, 'Linux', NULL, NULL),
(4, 'Juniper', NULL, NULL),
(5, 'Microsoft', NULL, NULL),
(6, 'MCSA', '4010', 5),
(7, 'MCSA', '740', 5),
(8, 'MCSA', '7041', 5),
(9, 'MCSA', '742', 5);

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE `coursedetails` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) DEFAULT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `coursecode` varchar(200) DEFAULT NULL,
  `dates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedetails`
--

INSERT INTO `coursedetails` (`id`, `fullname`, `details`, `coursecode`, `dates`) VALUES
(1, 'CCNA 100-120 Certified Examiner Exam', '<p>“At first I was unsure about the validity of the website, but was surprised to find that more than 80% of the questions appeared in the actual AccessData Certified Examiner A30-327 exam.”</p>\r\n\r\n<p>“Exam-Labs was a tremendous help! After taking the test I can definitely say that having so many practice questions and answers is what helped me pass the AccessData Certified Examiner A30-327 exam.”</p>\r\n<p>“Always on the go, or rarely able to sit down to study, I found myself using the mobile access all the time. It helped me prepare for the AccessData Certified Examiner A30-327 exam everyday, even if for just five minutes. ”</p>', '100-120', '2018-03-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `commentid` int(11) DEFAULT NULL,
  `questionsid` int(11) DEFAULT NULL,
  `dates` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `commentid`, `questionsid`, `dates`) VALUES
(1, 3, 5, '2018-03-19 00:00:00'),
(2, 3, 5, '2018-03-19 00:00:00'),
(3, 2, 5, '2018-03-19 00:00:00'),
(4, 2, 5, '2018-03-19 00:00:00'),
(5, 1, 5, '2018-03-19 00:00:00'),
(6, 1, 5, '2018-03-19 00:00:00'),
(7, 2, 5, '2018-03-19 00:00:00'),
(8, 1, 5, '2018-03-19 00:00:00'),
(9, 1, 5, '2018-03-19 00:00:00'),
(10, 1, 5, '2018-03-19 00:00:00'),
(11, 1, 5, '2018-03-19 00:00:00'),
(12, 1, 5, '2018-03-19 00:00:00'),
(13, 1, 5, '2018-03-19 00:00:00'),
(14, 2, 5, '2018-03-19 00:00:00'),
(15, 2, 5, '2018-03-19 00:00:00'),
(16, 2, 5, '2018-03-19 00:00:00'),
(17, 3, 5, '2018-03-19 00:00:00'),
(18, 3, 5, '2018-03-19 00:00:00'),
(19, 3, 5, '2018-03-19 00:00:00'),
(20, 2, 5, '2018-03-19 00:00:00'),
(21, 2, 5, '2018-03-19 00:00:00'),
(22, 1, 5, '2018-03-19 00:00:00'),
(23, 3, 5, '2018-03-19 00:00:00'),
(27, 2, 5, '2018-03-19 00:00:00'),
(28, 3, 5, '2018-03-19 00:00:00'),
(29, 3, 5, '2018-03-19 00:00:00'),
(30, 3, 5, '2018-03-19 00:00:00'),
(31, 3, 5, '2018-03-19 00:00:00'),
(32, 3, 5, '2018-03-19 00:00:00'),
(33, 2, 5, '2018-03-19 00:00:00'),
(34, 3, 5, '2018-03-19 00:00:00'),
(35, 4, 5, '2018-03-19 00:00:00'),
(36, 12, 5, '2018-03-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `questions` varchar(5000) NOT NULL,
  `answer` varchar(5000) NOT NULL,
  `question_title` varchar(500) NOT NULL,
  `coursecode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questions`, `answer`, `question_title`, `coursecode`) VALUES
(5, '<p>You have a server named Server1 that runs Windows Server 2012 R2. You plan to use Windows PowerShell Desired State Configuration (DSC) to confirm that the Application Identity service is running on all file servers. You define the following configuration in the Windows PowerShell Integrated Scripting Environment (ISE):</p>\r\n\r\n<p><img alt=\"\" src=\"/examFinal/kcfinder/upload/images/Microsoft-70-410-14_3.png\" style=\"height:129px; margin-left:10px; margin-right:10px; width:248px\" /></p>\r\n\r\n<p>You need to use DSC to configure Server1 as defined in the configuration. What should you run first?</p>\r\n\r\n<p>A. Service1</p>\r\n\r\n<p>B. Configuration1</p>\r\n\r\n<p>C. Start DscConfiguration</p>\r\n\r\n<p>D. Test-DscConfigu ration</p>', '<p>Answer : A,F</p>\r\n\r\n<p>Explanation: Only router can break up broadcast domains so in the exhibit there are 2 broadcast domains: from e0 interface to the left is a broadcast domain and from e1 interface to the right is another broadcast domain -&gt;. Both router and switch can break up collision domains so there is only 1 collision domain on the left of the router (because hub doesnt break up collision domain) and there are 6 collision domains on the right of the router (1 collision domain from e1 interface to the switch + 5 collision domains for 5 PCs in Production) -&gt;.</p>', 'Question No : 11 - Topic 1', '100-120'),
(6, '<p>You have a server named Server1 that runs Windows Server 2012 R2. You plan to use Windows PowerShell Desired State Configuration (DSC) to confirm that the Application Identity service is running on all file servers. You define the following configuration in the Windows PowerShell Integrated Scripting Environment (ISE):</p>\r\n\r\n<p><img alt=\"\" src=\"/examFinal/kcfinder/upload/images/Microsoft-70-410-14_3.png\" style=\"height:129px; width:248px\" /></p>\r\n\r\n<p>You need to use DSC to configure Server1 as defined in the configuration. What should you run first?</p>\r\n\r\n<p>A. Service1</p>\r\n\r\n<p>B. Configuration1</p>\r\n\r\n<p>C. Start DscConfiguration</p>\r\n\r\n<p>D. Test-DscConfigu ration</p>', '<p>Answer : A,F</p>\r\n\r\n<p>Explanation: Only router can break up broadcast domains so in the exhibit there are 2 broadcast domains: from e0 interface to the left is a broadcast domain and from e1 interface to the right is another broadcast domain -&gt;. Both router and switch can break up collision domains so there is only 1 collision domain on the left of the router (because hub doesnt break up collision domain) and there are 6 collision domains on the right of the router (1 collision domain from e1 interface to the switch + 5 collision domains for 5 PCs in Production) -&gt;.</p>', 'Question No : 12 - Topic 1', '100-120');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Mehrab Hossain', 'mahabub01', 'mahabubs4@gmail.com', '123456'),
(4, 'Mehrab Hossain', 'mahabub02', 'mahabubs4@gmail.com', '$2y$12$KEtI0oBOMklvfrF.KEBd4elCOqDypsSISPq52eUX1eeOw7X3pX.Xa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionid` (`questionid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcourse` (`subcourse`);

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coursecode` (`coursecode`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentid` (`commentid`),
  ADD KEY `questionsid` (`questionsid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coursedetails`
--
ALTER TABLE `coursedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`questionid`) REFERENCES `questions` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`subcourse`) REFERENCES `course` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`commentid`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`questionsid`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
