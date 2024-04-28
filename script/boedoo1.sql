-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 08:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boedoo1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(6, 'admin6', 'c6b853d6a7cc7ec49172937f68f446c8');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `proposal` text DEFAULT NULL,
  `ktm` varchar(255) DEFAULT NULL,
  `submit_date` date DEFAULT NULL,
  `employees_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`proposal`, `ktm`, `submit_date`, `employees_id`, `job_id`) VALUES
('test', 'TCMZyWBN.jpeg', '2023-06-15', 11, 24),
('lorem ipsum dolor sit amet', 'YRMWTYMx.jpeg', '2023-06-14', 11, 25),
('lorem ipsum dolor sit amet', 'EHhfJFWN.jpeg', '2023-06-14', 13, 25),
('test', 'FCXoXaFA.pdf', '2023-06-17', 14, 21);

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `certif_file` varchar(255) DEFAULT NULL,
  `profiles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `title`, `description`, `certif_file`, `profiles_id`) VALUES
(0, 'Test', 'test', 'ltIHqCTt.jpeg', 3),
(1, ' Front-End Web Development Certification', 'Sertifikasi ini memvalidasi pengetahuan dan keterampilan Anda dalam merancang dan mengembangkan antarmuka pengguna (UI) yang menarik, responsif, dan berkinerja tinggi menggunakan teknologi dan praktik terkini.', 'GoEDEzzQ.pdf', NULL),
(2, 'Certified Front-End Developer (CFED)', 'Sertifikasi ini memberikan pengakuan atas keahlian dan pengetahuan Anda dalam mengembangkan antarmuka pengguna (UI) yang menarik dan responsif menggunakan teknologi terkini serta praktik terbaik dalam industri.', 'GoEDEzzQ.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

CREATE TABLE `employment_history` (
  `id` int(11) NOT NULL,
  `work_position` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `work_start_date` date DEFAULT NULL,
  `work_end_date` date DEFAULT NULL,
  `profiles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment_history`
--

INSERT INTO `employment_history` (`id`, `work_position`, `company_name`, `work_start_date`, `work_end_date`, `profiles_id`) VALUES
(1, 'Junior Front-End Developer', 'Tokopedia', '2022-05-05', '2023-05-16', NULL),
(2, 'Web Developer', 'Gojek', '2020-05-27', '2021-05-09', NULL),
(3, 'Intern', 'BliBli', '2022-01-22', '2022-06-01', NULL),
(4, 'Team Lead', 'PinkSun dotCo', '2023-02-12', '2023-06-17', 3),
(5, 'Team Lead', 'Guidence In', '2023-02-13', '2023-06-17', 4),
(6, 'Test', 'PinkSun dotCo', '2009-05-07', '2015-09-04', 8);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `message_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `message`, `message_date`) VALUES
(2, 11, 'test', '2023-06-03'),
(3, 11, 'apaya', '2023-06-14'),
(4, 12, 'mantap', '2023-06-14'),
(5, 12, 'aku ganteng', '2023-06-14'),
(6, 14, 'Webnya keren..', '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `wage` varchar(255) DEFAULT NULL,
  `duration_in_day` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `working_type` varchar(255) DEFAULT NULL,
  `employee_level` varchar(255) DEFAULT NULL,
  `job_desc` text DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `employer_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `wage`, `duration_in_day`, `industry`, `working_type`, `employee_level`, `job_desc`, `job_type`, `posted_date`, `employer_id`, `status`, `admin_id`) VALUES
(21, 'Customer Service Representative', '12', '180', 'Retail', 'Onsite', 'Advanced', 'Job Description:\r\nWe are seeking a friendly and empathetic Customer Service Representative to join our team. As a Customer Service Representative, you will be the first point of contact for our valued customers, providing exceptional assistance and support. Your primary responsibilities will include:\r\n\r\nAnswering incoming customer inquiries via phone, email, or live chat in a timely and professional manner.\r\nResolving customer issues and complaints with patience and diplomacy, aiming for first-contact resolution whenever possible.\r\nProviding accurate and detailed information about our products, services, and company policies to customers.\r\nAssisting customers with order placement, tracking, and returns, ensuring a seamless shopping experience.\r\nCollaborating with internal teams to address and escalate complex customer concerns.\r\nMaintaining a comprehensive knowledge base of our products, promotions, and policies to deliver accurate information to customers.\r\n\r\nRequirements:\r\n\r\nHigh school diploma or equivalent; additional education or training is a plus.\r\nProven experience in a customer service role or similar position is preferred.\r\nExcellent verbal and written communication skills.\r\n\r\nIf you enjoy helping others and have a passion for delivering exceptional customer experiences, we would love to hear from you. Apply now to join our dynamic and supportive customer service team!', 'jobs', '2023-06-07', 11, 'Approved', 6),
(23, 'Market Analysis Research', '8', '60', 'Consumer Goods', 'Onsite', 'Intermediate', 'Research Description:\r\nWe are seeking a Research Analyst to conduct a comprehensive Market Analysis Research project. The objective of this research is to gather and analyze data on market trends, customer preferences, competitors, and potential opportunities in the target industry. As the Research Analyst, your responsibilities will include:\r\n\r\n- Collecting primary and secondary data through surveys, interviews, industry reports, and online sources.\r\n\r\n- Analyzing market dynamics, including supply and demand, pricing trends, and consumer behavior.\r\n\r\n- Identifying key competitors, their market share, and their strengths and weaknesses.\r\n\r\n- Assessing customer preferences, needs, and buying patterns to identify market gaps and opportunities.\r\n\r\nRequirements :\r\n- Strong analytical skills and proficiency in quantitative and qualitative research methods.\r\n\r\n- Proficiency in data analysis tools and software, such as Excel, SPSS, or SAS.\r\n\r\n- Excellent written and verbal communication skills to present research findings effectively.\r\n\r\n- Attention to detail and ability to work independently to meet project deadlines.', 'research', '2023-06-07', 11, 'Approved', 6),
(24, 'Administrative Assistant', '1.5', '120', 'Healthcare', 'Onsite', 'Intermediate', 'Job Description:\r\n\r\nWe are seeking a detail-oriented and organized Administrative Assistant to provide administrative support to our team. As an Administrative Assistant, your main responsibilities will include:\r\n\r\nManaging and organizing schedules, appointments, and meetings for team members,\r\nHandling incoming and outgoing communications, such as phone calls, emails, and mail,\r\nDrafting and preparing documents, memos, and reports,\r\nMaintaining and updating databases and filing systems.\r\n\r\nRequirements:\r\n\r\nHigh school diploma or equivalent; additional education or certification in office administration is a plus,\r\nProven experience as an administrative assistant or in a similar role,\r\nProficient computer skills, including Microsoft Office suite and database management,\r\nExcellent communication skills, both verbal and written,\r\nStrong organizational and time management abilities.', 'jobs', '2023-06-08', 12, 'Approved', 6),
(25, 'Employee Wellness Program ', '4.3', '90', 'Government', 'Remote', 'Intermediate', 'Project Description:\r\nWe are looking for a dedicated Project Manager to oversee the implementation of an Employee Wellness Program. The goal of this project is to promote the physical and mental well-being of our employees, improve work-life balance, and create a positive and healthy workplace environment. As the Project Manager, your responsibilities will include:\r\n\r\nConducting a needs assessment and surveying employees to identify wellness program preferences and areas of improvement,\r\nDeveloping a comprehensive wellness program framework, including initiatives, activities, and resources,\r\nCollaborating with cross-functional teams to secure necessary resources, such as budget allocation, space, and equipment.\r\n\r\nRequirements:\r\n\r\nBachelor\'s degree in human resources, business administration, or a related field. Relevant certifications are a plus,\r\nProven experience in project management, preferably in implementing employee wellness programs,\r\nStrong knowledge of wellness program design, health promotion, and employee engagement strategies.', 'jobs', '2023-06-09', 12, 'Approved', 6),
(26, 'Customer Satisfaction Survey', '3', '30', 'Technology', 'Remote', 'Beginner', 'Research Description:\r\nWe are seeking a Research Analyst to conduct a Customer Satisfaction Survey to gather feedback and insights from our customer base. The objective of this research is to assess customer satisfaction levels, identify areas for improvement, and make data-driven decisions to enhance the overall customer experience. As the Research Analyst, your responsibilities will include:\r\n\r\nDesigning and developing a comprehensive customer satisfaction survey questionnaire.\r\nImplementing the survey through various channels, such as online platforms, email, or phone.\r\nCollecting and analyzing survey responses to evaluate customer satisfaction levels and identify trends or patterns.\r\nConducting statistical analysis to derive meaningful insights and correlations from the survey data.\r\n\r\nRequirements:\r\nDetail-oriented with a focus on accuracy in data collection, analysis, and reporting.\r\nAbility to work independently, prioritize tasks, and meet project deadlines.\r\nFamiliarity with customer experience management principles and best practices.\r\nExperience in utilizing customer feedback to drive business improvements is preferred.', 'research', '2023-06-10', 12, 'Approved', 6),
(28, 'UI/UX Designer', '8', '25', 'Creative Industry', 'Remote', 'Intermediate', 'lorem ipsum dolor sit amet', 'projects', '2023-06-14', 12, 'Approved', 6),
(29, 'Asdasd', '5', '5', 'Asdasd', 'Remote', 'Beginner', 'asdasdasd', 'jobs', '2023-06-15', 11, 'Rejected', 6),
(30, 'POP', '5', '23', 'Po', 'Remote', 'Intermediate', 'apsoda', 'jobs', '2023-06-15', 11, 'Pending', NULL),
(31, 'Farmer WOW', '300k', '7', 'Gaming', 'Onsite', 'Beginner', 'dicari farmer wow main 12 jam perhari', 'jobs', '2023-07-29', 15, 'Approved', 6),
(32, 'Asdasd123', '123', '132', 'Aasds', 'Remote', 'Beginner', 'asdasd', 'jobs', '2023-07-29', 15, 'Rejected', 6);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `profiles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `link`, `description`, `profiles_id`) VALUES
(1, 'Portofolio Desain Grafis dan Ilustrasi oleh John Doe', ' www.aisyahfh.com/design', 'Portofolio ini berisi karya-karya desain grafis dan ilustrasi yang dibuat oleh Aisyah Fadzila. Dalam portofolio ini, Aisyah memamerkan keahlian dan kreativitasnya dalam menghasilkan desain grafis yang menarik dan ilustrasi yang mengesankan.', NULL),
(2, 'Portofolio Pengembangan Web oleh Amru Abid', 'www.amruabidwebdevelopment.com/projects', 'Portofolio ini menampilkan proyek-proyek pengembangan web yang telah diselesaikan oleh Amru Abid. Abid memperlihatkan kemampuannya dalam merancang dan mengembangkan situs web yang responsif, interaktif, dan menarik secara visual. Portofolio ini mencerminkan keahlian teknis Abid dalam bidang pengembangan web.', NULL),
(9, 'BoeDoo', 'boedoo.com', 'Web Based Job Seeking App by PinkSun Team.', 3),
(11, 'Guidence.In', 'guidence.in', '', 4),
(13, 'Test', 'google.com', 'test', 7);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon_profile` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `address`, `linkedin`, `profession`, `description`, `icon_profile`, `user_id`, `cv`) VALUES
(3, 'Permata Buah Batu Blok D/22', 'linkedin.com/amruabid', 'Fullstack Dev', 'As a fullstack developer, I possess expertise in both frontend and backend web development. With a strong command of languages like HTML, CSS, JavaScript, PHP, and SQL, I am capable of creating dynamic and interactive web applications that seamlessly integrate user interfaces with server-side functionalities. My skills encompass designing appealing UI/UX, developing robust backend systems, working with databases, and utilizing version control systems for efficient collaboration in Agile environments.', 'qhekWNsG.jpeg', 11, 'XIctroiC.pdf'),
(4, 'Pasir Koja', 'linkedin.com/cowboybeebop', 'UI/UX Designer', 'As a UI/UX designer, I specialize in creating intuitive and visually appealing user interfaces for web and mobile applications. I have a strong understanding of user-centered design principles, wireframing, prototyping, and conducting user research to ensure the best user experience. With a keen eye for aesthetics and a focus on usability, I strive to deliver designs that not only look great but also enhance the overall usability and satisfaction of the end-users.', 'wxDAWlyM.png', 12, 'uozKcbhV.pdf'),
(5, 'Kost Adik', 'linkedin.com/icahani', '', '', NULL, 13, 'DZIGryVp.pdf'),
(6, 'Permata Buah Batu Blok D/22', 'test.com', 'Software Engineer', 'this is my description.', NULL, 14, 'QrdrDTsT.pdf'),
(7, '', '', 'Professional E-Sport Athlete', 'I\'m Good', NULL, 16, NULL),
(8, '', '', '', '', 'eDaLaSjc.jpeg', 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`) VALUES
(1, 'What was your nickname as a child?'),
(2, 'What is your favorite food?'),
(3, 'What is your childhood best friend\'s name?');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `profiles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `description`, `profiles_id`) VALUES
(1, 'HTML', 'Advanced', NULL),
(2, 'JavaScript', 'Intermediate', NULL),
(3, 'CSS', 'Advanced', NULL),
(4, 'Java', 'Quite adept', 3),
(5, 'Photoshop', 'Quite Adept', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `question_id`, `answer`) VALUES
(11, 'Abid', 'Zakly', 'abidzakly', 'abid@gmail.com', '$2y$10$EyvjispOJDo/s/dVWWbaSOQu1UcWioU7NVXEQfBf0zfTWgGfT6iVG', 1, 'abid'),
(12, 'Fawwaz', 'Maulana', 'wajet', 'fawwaz@gmail.com', '$2y$10$McBMIqM237P1OLaYl7kaZOEswHn/c5kz3p/ZcQAeVemBmrXYxoiRy', 1, '$2y$10$THRyXMnDjQsXdW4AHuSYpO.v254lvQomrgM.uHs9dW7qM0bcmOZD.'),
(13, 'Ica', 'Hani', 'ica', 'ica@gmail.com', '$2y$10$5SttrpUU1RH1zSZS9KnhfeGrzALunSDbrpe5MJPZphfu1hwBoW8CO', 1, '$2y$10$uBMuuJhTb1PGpzcFGyN7uueOvvA2AHMH6UVTE2/aLtWuNgQ4aaAf6'),
(14, 'Muh', 'Haikel', 'haikel', 'haikel@gmail.com', '$2y$10$gWc5hVrohsY9Pgi8LK1Zou0KF3jz9F/W7cli/IpzR7zKYXWsRMJZi', 1, '$2y$10$zp3ytV1xi2alOlI00j5cwuUZsjDblO6fBe4uJlrFlJNQNQzb9RFaG'),
(15, 'Dede', 'Asdsa', 'dede21', 'dede@gmail.com', '$2y$10$7o6n2ELR7GjfdUfaq9V7kez3YNLQVFOtDr.1smlObgIZ51rpZE99i', 2, '$2y$10$6n0nCnxI1pYdwbklPk4nx.wpDaB0UVl47NHnMibBIAbB8HttmHoCi'),
(16, 'Muhtadi', 'Yazid', 'muhtadi21', 'muh@gmail.com', '$2y$10$YjrNF9sco3QXa3pSORNZKuBX3538lk6xH40uPBnZxqAOa7AT3jYwm', 2, '$2y$10$yC7khgNk/A6CVu3hf6/pf.2roeVpaLip.OoW1y.8EBPhGcADctk8.'),
(17, 'Nailan', 'Nabil', 'nabil12', 'nabil@gmail.com', '$2y$10$xR.QPO2boOm9UY09eg3G5eK6LHe2bpThhwMaDmOw8Qf6DtNZImOEe', 1, '$2y$10$otA6VAIpHcXRYbr5LARCA.ACWmjvbz3C5XzeqfqHF0zikvtXFfCtW'),
(18, '2024', 'Testint', 'test2024', 'amru@gmail.com', '$2y$10$I/SBGT5M4Rre6XZO.j9yAeoRpCwmefDhDJXDMLrutFa2cMM3Esipi', 2, '$2y$10$WSGzhE6mF7OB/GM70ZhHguG1n1ph.eob4trjGvsHoTuC3.XKMCaJ2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`employees_id`,`job_id`),
  ADD KEY `fk_apply_jobs` (`job_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_certif_profiles` (`profiles_id`);

--
-- Indexes for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_workhistory_profiles` (`profiles_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jobs_admins` (`admin_id`),
  ADD KEY `fk_jobs_userss` (`employer_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_porto_profiles` (`profiles_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_skills_profiles` (`profiles_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employment_history`
--
ALTER TABLE `employment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `fk_apply_jobs` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `submit_fk-user` FOREIGN KEY (`employees_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `fk_certif_profiles` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD CONSTRAINT `fk_workhistory_profiles` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_jobs_admins` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_jobs_userss` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `fk_porto_profiles` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_skills_profiles` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
