-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 10:10 AM
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
-- Database: `workly`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `status` enum('Pending','Reviewed','Accepted','Rejected') DEFAULT 'Pending',
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `job_seeker_id`, `resume`, `status`, `applied_at`) VALUES
(5, 3, 9, 'uploads/resumes/G…...pdf', 'Accepted', '2025-04-03 02:53:10'),
(6, 5, 9, 'uploads/resumes/Press-Release File.pdf', 'Accepted', '2025-04-03 13:36:42'),
(7, 6, 9, 'uploads/resumes/Press-Release File.pdf', 'Pending', '2025-04-03 13:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `employer_id`, `title`, `description`, `category`, `location`, `salary`, `created_at`) VALUES
(3, 10, 'Data Analyst job', 'ob Title: Data Analyst\r\n\r\nLocation: Toronto, Ontario, Canada\r\n\r\nJob Type: Full-Time\r\n\r\nAbout Us: BrightData Solutions Inc. is a fast-growing technology company dedicated to transforming how businesses leverage data for strategic decision-making. With a collaborative culture and a focus on innovation, we empower organizations worldwide with actionable insights from their data.\r\n\r\nRole Overview: BrightData Solutions Inc. is seeking a highly motivated and detail-oriented Data Analyst to join our dynamic team. In this role, you’ll analyze complex data sets, uncover valuable insights, and drive critical decisions that propel our clients toward success.\r\n\r\nKey Responsibilities:\r\n\r\nGather and clean data from multiple sources to ensure accuracy and completeness.\r\n\r\nConduct data analysis and uncover trends, patterns, and correlations.\r\n\r\nDevelop comprehensive dashboards, visualizations, and reports.\r\n\r\nPartner with cross-functional teams to address data needs and provide solutions.\r\n\r\nOptimize and maintain data systems for improved efficiency and scalability.\r\n\r\nQualifications:\r\n\r\nBachelor’s degree in Data Science, Statistics, Computer Science, or a related field.\r\n\r\nProficiency in SQL, Python, or R, and data visualization tools like Tableau or Power BI.\r\n\r\nStrong analytical and problem-solving skills with high attention to detail.\r\n\r\nExcellent communication skills to present findings to non-technical stakeholders.\r\n\r\n2+ years of relevant experience preferred but not mandatory.\r\n\r\nWhat We Offer:\r\n\r\nCompetitive salary and benefits package.\r\n\r\nFlexible work hours and hybrid options (work remotely 3 days per week).\r\n\r\nA supportive and collaborative work environment.\r\n\r\nOngoing training and professional development opportunities.\r\n\r\nModern office space located in the heart of downtown Toronto.\r\n\r\nHow to Apply: Send your resume and cover letter to careers@brightdatasolutions.com with the subject line “Application for Data Analyst – BrightData Solutions Inc.” Applications close on April 30, 2025.', 'IT Specialist', 'Toronto,Ontario', '25000', '2025-04-03 02:22:01'),
(4, 10, 'Data Analyst job', 'ob Title: Data Analyst\r\n\r\nLocation: Toronto, Ontario, Canada\r\n\r\nJob Type: Full-Time\r\n\r\nAbout Us: BrightData Solutions Inc. is a fast-growing technology company dedicated to transforming how businesses leverage data for strategic decision-making. With a collaborative culture and a focus on innovation, we empower organizations worldwide with actionable insights from their data.\r\n\r\nRole Overview: BrightData Solutions Inc. is seeking a highly motivated and detail-oriented Data Analyst to join our dynamic team. In this role, you’ll analyze complex data sets, uncover valuable insights, and drive critical decisions that propel our clients toward success.\r\n\r\nKey Responsibilities:\r\n\r\nGather and clean data from multiple sources to ensure accuracy and completeness.\r\n\r\nConduct data analysis and uncover trends, patterns, and correlations.\r\n\r\nDevelop comprehensive dashboards, visualizations, and reports.\r\n\r\nPartner with cross-functional teams to address data needs and provide solutions.\r\n\r\nOptimize and maintain data systems for improved efficiency and scalability.\r\n\r\nQualifications:\r\n\r\nBachelor’s degree in Data Science, Statistics, Computer Science, or a related field.\r\n\r\nProficiency in SQL, Python, or R, and data visualization tools like Tableau or Power BI.\r\n\r\nStrong analytical and problem-solving skills with high attention to detail.\r\n\r\nExcellent communication skills to present findings to non-technical stakeholders.\r\n\r\n2+ years of relevant experience preferred but not mandatory.\r\n\r\nWhat We Offer:\r\n\r\nCompetitive salary and benefits package.\r\n\r\nFlexible work hours and hybrid options (work remotely 3 days per week).\r\n\r\nA supportive and collaborative work environment.\r\n\r\nOngoing training and professional development opportunities.\r\n\r\nModern office space located in the heart of downtown Toronto.\r\n\r\nHow to Apply: Send your resume and cover letter to careers@brightdatasolutions.com with the subject line “Application for Data Analyst – BrightData Solutions Inc.” Applications close on April 30, 2025.', 'IT Specialist', 'Toronto,Ontario', '25000', '2025-04-03 02:22:10'),
(5, 13, 'Data entry jobs', 'Job Title: Remote Data Entry Operator\r\n\r\nCompany: [Your Company Name]\r\n\r\nLocation: Remote\r\n\r\nJob Type: Part-time/Full-time\r\n\r\nJob Description: We are seeking a detail-oriented and highly motivated individual to join our team as a Remote Data Entry Operator. In this role, you will be responsible for accurately entering, updating, and managing data within our digital systems while maintaining data integrity and confidentiality.\r\n\r\nKey Responsibilities:\r\n\r\nEnter and update data into databases and software systems.\r\n\r\nVerify data accuracy and resolve discrepancies.\r\n\r\nPerform data quality checks and maintain organized records.\r\n\r\nCollaborate with team members to complete tasks and meet deadlines.\r\n\r\nGenerate reports and summaries as needed.\r\n\r\nQualifications:\r\n\r\nHigh school diploma or equivalent; prior experience in data entry is preferred.\r\n\r\nStrong attention to detail and excellent typing skills.\r\n\r\nProficiency in data entry tools such as Microsoft Excel or Google Sheets.\r\n\r\nReliable internet connection and a distraction-free workspace.\r\n\r\nAbility to work independently and meet deadlines consistently.\r\n\r\nBenefits:\r\n\r\nFlexible working hours.\r\n\r\nOpportunity to work from the comfort of your own home.\r\n\r\nCompetitive salary.\r\n\r\nHow to Apply: Interested candidates should submit their resume and a brief cover letter to singhnavkirat126@gmail.com.', 'IT Specialist', 'Toronto,Ontario', '25000', '2025-04-03 11:55:49'),
(6, 13, 'Data entry jobs', 'remote job', 'IT Specialist', 'Brampton,Ontarion', '8000', '2025-04-03 13:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('employer','job_seeker') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(9, 'gurpreet', 'gurpreet@123gmail.com', '$2y$10$OxBA4HwFLVPcLUfE6fkEauXsg/1KN99rDG90wp4zIyIeaGifW3vmO', 'job_seeker', '2025-04-03 01:52:14'),
(10, 'Navkirat Singh', 'navkirat@gmail.com', '$2y$10$wwix/fTAGPFiJRRYkpDeL.hdRn3/aM.KS6YutsPsk5uEEIfiwPZOO', 'employer', '2025-04-03 01:52:45'),
(11, 'Navkirat ', 'navkirat123@gmail.com', '$2y$10$C6N8GL1dhPw7ya5DbGonCOrPdx46PTKQekKuXuNqk9wKCHv1IDlAK', 'employer', '2025-04-03 01:54:22'),
(13, 'Hargun', 'gungun123@gmail.com', '$2y$10$ssNyFynAJEC9D3hCmeE2w.LwVxP/6xKJB90LLkBQ2Ikg6YpzKlP26', 'employer', '2025-04-03 02:10:59'),
(14, 'harjinder kaur', 'hk@123gmail.com', '$2y$10$JjvmpqjF.tU4SRVn7WFeW.kb5KaYjG0kb0pADmg9QeCe47lN6wbyi', 'employer', '2025-04-03 14:16:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `job_seeker_id` (`job_seeker_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_seeker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
