-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2020 at 02:40 AM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arunqmar_JobPortal`
--

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `head_office` varchar(20) DEFAULT NULL,
  `lob` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `employees` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`id`, `name`, `description`, `head_office`, `lob`, `website`, `employees`, `status`) VALUES
(1, 'No Frills', 'We had to close the doors at 10:30 this morning and let people in as other people left.It was the kind of problem every store manager dreams of, especially on opening day. The first No Frills® prototype store had swung open its doors in East York, near Toronto. The reaction on the part of shoppers was enthusiastic, to say the least. The rush never stopped, explained Loblaws manager Robert St. Jean, back in July 1978. We\'re really excited about it... really excited!', 'Mississauga', 'Grocery', 'nofrills.com', '0-10', 1),
(2, 'TD Bank', 'As a top 10 North American bank, TD aims to stand out from its peers by having a differentiated brand – anchored in our proven business model, and rooted in a desire to give our customers, communities and colleagues the confidence to thrive in a changing world.', 'Toronto', 'Banking', 'td.com', '10,000+', 1),
(3, 'Royal Bank of Canada', 'For more than 150 years, we’ve gone where our clients have gone – expanding across Canada, the United States, and to select global markets. Today, we hold strong market positions in five business segments, with 17 million clients who continue to put their trust in RBC.', 'Toronto', 'Banking', 'rbc.com', '10,000+', 1),
(4, 'Costco', 'The Costco story begins in 1976, when entrepreneur Sol Price introduced a groundbreaking retail concept in San Diego, California. Price Club was the world’s first membership warehouse club, a place where efficient buying and operating practices gave members access to unmatched savings.', 'Kirkland', 'Wholesale', 'costco.ca', '10,000+', 0),
(5, 'Desjardins Insurance', 'Desjardins Insurance is a trademark used by Desjardins General Insurance Group (DGIG), which was founded in 1944. A subsidiary of Desjardins Group, Canada’s leading cooperative financial group, DGIG ranks today among the leaders in property and casualty insurance in Canada.Under the Desjardins Insurance brand, policies are underwritten by Certas Direct Insurance Company', 'Toronto', 'Insurance', 'https://www.desjardins.com/', '5,001-10,0', 1),
(6, 'Amazon', 'Its a big company', 'Toronto', 'Ecommerce', 'amazon.ca', '10,000+', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE `Jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `company` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`id`, `title`, `company`, `location`, `salary`, `description`, `date`) VALUES
(1, 'Software Developer', 'Amazon', 'Toronto', 100000, 'The Amazon Device Services organization is hiring a Software Development Engineer to help us build cross-platform software to enable the seamless launch, provisioning and management of devices. The team is responsible for building solutions that enable Device Operations and Supply Chain end-to-end: from product design and component sourcing, through production and shipment, to returns, screening and repair. We innovate to deliver timely and scalable technological solutions and automate operational tasks to allow the business to focus on high value-add activities and grow.\r\nWe are looking for a talented Software Development Engineer to help build from ground up our Supply Chain and Operations platform of the future. We are starting an exciting journey of building full stack platform for our internal customers, including Forward and Reverse Logistics, Operations, Finance, and internal technical teams. We are looking for someone who is passionate about delivering the best possible customer experience and allowing us to meet our customer obsession of making our current and upcoming line of devices available in-stock to delight our customers.\r\nIn this role you will be a leader in the engineering group of full stack engineers and contribute to design, architecture and implementation for one or more of supply chain applications. We are looking to re-invent the supply chain with end to end network optimization and use data to build intelligent, self-learning platform to build the world class platform. Great opportunity to bootstrap a team in early stages and make a huge impact in developing next generation of solutions in rapidly growing devices group.', '2020-03-25'),
(2, 'Software Developer', 'Google', 'Montreal', 150000, 'Join us for a unique internship that offers personal and professional development, executive speaker series, and community-building. This program will give you an opportunity to work on complex computer science solutions, develop scalable, distributed software systems and also collaborate on multitudes of smaller projects that have universal appeal - which requires research, awareness, interactivity, and asking questions.\r\n\r\nAs a Software Developer Intern, you will work on our core products and services as well as those who support critical functions of our engineering operations. Depending on your background and experience, you will be working in one of the following areas:\r\n\r\nProduct and Systems Development', '2020-03-28'),
(3, 'Web Developer', 'Shopify', 'Toronto', 80000, 'Were looking for a Front End Web Developer (Shopify Expert) who can help keep our site running smoothly as we work to increase sales through TKEES.com.\r\n\r\nYoull be part of a tight knit team and will be collaborating with the creative and marketing teams to understand and improve on the TKEES digital experience.\r\n\r\nPast Shopify experience is mandatory and interest in analytics, SEO, UX and UI are strongly encouraged.\r\n\r\nResponsibilities and Duties\r\n\r\nExecute online merchandising activities and promotions in line with digital, creative and sales strategies\r\n\r\nTranslate requirements and mockups to Shopify using HTML/CSS/JS\r\n\r\nSupport the delivery of the online vision by drilling into the data provided by Shopify, Google Analytics, Kissmetrics and other channels.\r\n\r\nUnderstand existing SEO and content strategies and implement site based plans as needed.\r\n\r\nDrilling into the data provided by Google Analytics, Zaius and other analytics platforms to understand customer habits.\r\n\r\nAssist with email campaigns...', '2020-03-30'),
(4, 'Front End Developer', 'Facebook', 'Vancouver', 120000, 'Facebooks mission is to give people the power to build community and bring the world closer together. Through our family of apps and services, were building a different kind of company that connects billions of people around the world, gives them ways to share what matters most to them, and helps bring people closer together. Whether were creating new products or helping a small business expand its reach, people at Facebook are builders at heart. Our global teams are constantly iterating, solving problems, and working together to empower people around the world to build community and connect in meaningful ways. Together, we can help people build stronger communities - were just getting started.Facebook is seeking AI Software Engineers to join our Research & Development teams. The ideal candidate will have industry experience working on a range of problems. The position will involve taking these skills and applying them to some of the most exciting and massive social data and prediction problems that exist on the web. We are hiring in multiple locations.Responsibilities:Apply relevant AI and machine learning techniques to build intelligent user experiences.Develop novel, accurate AI algorithms and advanced systems for applications.Code deliverables in tandem with the engineering team.Work with product managers to define use cases, and develop methodology and benchmarks to evaluate different approaches.Mininum Qualifications. BS, MS or Ph.D. degree in Computer Science or related quantitative field 5+ years of experience in one or more of the following areas: Deep Learning, Computer Vision, NLP, Speech, AR/VR, Conversational AI, Dialogue, Robotics, AI-Infrastructure, Machine Learning or artificial intelligence\r\nProven ability to translate insights into business recommendations Experience with Hadoop/HBase/Pig or MapReduce/Sawzall/Bigtable Knowledge developing and debugging in C/C++ and Java Experience with scripting languages such as Perl, Python, PHP, and shell scripts\r\nPreferred Qualifications:Experience with filesystems, server architectures, and distributed systems Experience developing software for consumer devices or mobile, including algorithm design and systems software development', '2020-03-05'),
(5, 'Backend Developer', 'Oracle', 'Toronto', 90000, 'Design, develop, troubleshoot and debug software programs for databases, applications, tools, networks etc.\r\nAs a member of the software engineering division, you will apply basic to intermediate knowledge of software architecture to perform software development tasks associated with developing, debugging or designing software applications or operating systems according to provided design specifications. Build enhancements within an existing software architecture and occasionally suggest improvements to the architecture.\r\nDuties and tasks are standard with some variation; displays understanding of roles, processes and procedures. Performs moderately complex problem solving with assistance and guidance in understanding and applying company policies and processes. BS degree or equivalent experience relevant to functional area. 1 year of software engineering or related experience.\r\nQualifications Oracle Eloqua is looking for a passionate Software...\r\n', '2020-03-10'),
(6, 'Full Stack Developer', 'Intel', 'Toronto', 80000, 'FPGA Software Engineers research, design, develop, and optimize software tools that enable the use of Field Programmable Gate Arrays. Develop and optimize compilers, flows, assemblers, models, tools and runtimes that are closely coupled to FPGA silicon, IP and boards, while leveraging strong knowledge of FPGA hardware, logic design, board design, semiconductor devices and chip layout. Design, develop & optimize software abstractions and frameworks for acceleration with the FPGA, for domains such as deep learning, DSP algorithms, and data analytics. Responds to customer/client requests or events as they occur. Develops solutions to problems utilizing formal education, judgment and formal software process.Minimum Qualifications:BSc in Electrical Engineering, Computer Engineering, Computing Science or a related field with a minimum 5 years of related industrial experience Experience with software development in C++', '2020-03-31'),
(7, 'PHP Developer', 'Amazon', 'Toronto', 130000, 'Are you interested in being part of a team that is powering the growth at Amazon and you can make a direct impact to the business? Do you want to build scalable systems that can work in hundreds of different countries, handle millions of users, and you have the power to set the standard for web experience on world class website? If this excites you, please read on.You will be an important part of Amazons Advertising Analytics and Insights (A&I) team within Amazon Advertising that builds our main advertising portal and backend systems that support the portal. The team is growing rapidly and your work will be highly visible, providing ample opportunities for growth. We are ideally looking for full stack engineers who will be comfortable with both backend and front-end technologies, or have the desire to learn all aspects of a complex system. You will get to work in cool AWS technologies like lambdas, DynamoDB, Elastic Search, build infinitely scalable systems with zero downtown, and you will also get to work on front end technologies like React, TypeScript, and state of the art content management systems. An SDE in A&I team will be fully responsible for every aspect of the software development cycle, including software architectural design, data integration from various internal systems, building backend services for data recommendations, development of highly interactive web applications, software deployment using continuous integration tools, and monitoring to ensure high availability. Youll participate in all major software/architectural design decisions, help to define and optimize the teams development workflow, ensure code quality is of the highest possible quality, and ensure the team is adhering to software development best practices.', '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `company_review_id` int(6) UNSIGNED NOT NULL,
  `company_review_summary` varchar(100) NOT NULL,
  `company_review` varchar(200) NOT NULL,
  `pros` varchar(100) DEFAULT NULL,
  `cons` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `company_rating` smallint(6) NOT NULL,
  `company_id` int(6) NOT NULL,
  `user_id` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`company_review_id`, `company_review_summary`, `company_review`, `pros`, `cons`, `job_title`, `job_location`, `company_rating`, `company_id`, `user_id`) VALUES
(1, 'Better', 'Busy schedule', 'Sift trades', 'Timing', 'Web Developer', 'Toronto', 3, 1, 1),
(8, 'bb', 'bb', 'bb', 'bb', 'bb', 'bb', 2, 1, NULL),
(9, 'Good companys', 'sGood pay', 'rates', 'timingss', 'saless', 'YYZs', 4, 1, 1),
(10, 'Good company1', 'Good pay1', 'rate1', 'timings1', 'sales1', 'YYZ1', 5, 1, 2),
(11, 'ff', 'ff', 'ff', 'ff', 'ff', 'ff', 4, 1, NULL),
(12, 'ff', 'ff', 'ff', 'ff', 'ff', 'ff', 4, 1, NULL),
(13, 'ss', 'ss', 'ss', 'ss', 'sss', 'ss', 4, 1, NULL),
(14, 'ss', 'ss', 'ss', 'ss', 'sss', 'ss', 4, 1, NULL),
(15, 'aa', 'aa', 'aa', 'aa', 'a', 'aa', 5, 2, NULL),
(18, 'Summary', 'Everything', 'Good company', 'Crowded', 'Manager', 'Brampton', 4, 4, NULL),
(19, 'Good store', 'You can find whtever you want', 'Pros', 'Cons', 'Supervisor', 'Malton', 3, 3, 1),
(20, 'jhvdsi', 'cvghvh', 'jhvjhvjh', 'vjhvjh', 'hvhjvhj', 'vjhjh', 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `activation_code` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `email`, `password`, `role`, `status`, `activation_code`) VALUES
(1, 'Madhusudhan1221', 'madhusudhanreddy1221@live.com', '12345678', NULL, 'ACTIVE', 'c63f2d49bc32754fba87b37eeacedf92'),
(3, 'madhusudhann1221', 'madhusudhanreddy1221@gmail.com', 'qwerty', NULL, 'ACTIVE', 'c8bb855e4a37302a146dc5f7258e2ee1'),
(4, 'arun', 'arun.saiyan@gmail.com', 'password', NULL, 'INACTIVE', '03e14d57e95286c63b09547d024597ef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`company_review_id`),
  ADD KEY `Reviews_FK1` (`company_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Jobs`
--
ALTER TABLE `Jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `company_review_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
