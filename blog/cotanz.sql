-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2016 at 11:22 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cotanz`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
`blog_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `blog_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'My Blog',
  `blog_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `user_id`, `blog_code`, `blog_name`, `blog_desc`, `created_at`, `updated_at`) VALUES
(1, 1, '@test', 'My Blog', 'This Is Test Blog', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_articles`
--

CREATE TABLE IF NOT EXISTS `blog_articles` (
`article_id` int(10) unsigned NOT NULL,
  `article_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_body` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  `short_desc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_articles`
--

INSERT INTO `blog_articles` (`article_id`, `article_title`, `article_body`, `blog_id`, `short_desc`, `slug`, `cover_pic`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'This Is test', 'Mic testing\r\n\r\nHello...Hello...!\r\n\r\n!!!', 1, NULL, '1', 'postpic1.jpg', 'culpa, laboris, labore', '2016-02-27 12:07:30', '2016-03-02 22:12:54'),
(2, 'This is Testing2', 'Checking\r\n\r\nAnybody there??\r\n\r\nHello!!!!', 1, NULL, '2', 'postpic2.jpg', 'culpa,eu', '2016-02-27 13:18:11', '2016-03-02 21:39:10'),
(3, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu odio purus. Nullam sit amet purus rhoncus, aliquam mi in, blandit mauris. Nunc tortor dolor, facilisis et commodo eu, imperdiet dapibus tortor. Ut vel pretium sapien, ut rhoncus lacus. Sed imperdiet magna quis nisl luctus condimentum. Cras ut condimentum justo. Pellentesque vel felis quis enim pulvinar lacinia. Proin in magna faucibus, mattis elit a, pretium erat. Praesent vulputate nulla neque, nec tempus lorem rhoncus nec. Sed pulvinar augue mollis leo feugiat, eu bibendum quam vehicula. Donec auctor nisi egestas, luctus leo ac, egestas tortor. Suspendisse feugiat dictum urna ac feugiat. Aliquam mi lectus, accumsan et tincidunt vel, faucibus nec diam. Quisque vitae imperdiet nisi. Cras fermentum mi dui, ut gravida nisl iaculis elementum.\r\n\r\nNunc eleifend blandit velit at auctor. Maecenas ut dapibus urna. Curabitur nec dapibus tortor. Vestibulum dictum ultrices ex, sit amet sodales nunc dapibus a. Morbi eros ante, fermentum et ante et, rutrum feugiat elit. Donec quis egestas odio. In luctus, ipsum vitae sagittis volutpat, nunc dolor maximus lacus, nec hendrerit risus metus ut leo. Etiam blandit gravida dui, eu fringilla odio tincidunt et. Integer aliquet malesuada purus, et pharetra purus pharetra vel. Morbi pulvinar orci non augue iaculis sodales. Sed et nisl metus. Sed imperdiet vulputate tempus. Curabitur luctus quis urna quis feugiat. Integer iaculis, nisl et ultrices viverra, neque massa accumsan est, ac viverra arcu libero ut ex. Ut eget pellentesque justo.', 1, NULL, '3', 'postpic3.jpg', 'labore,nulla,eu', '2016-03-02 05:12:14', '2016-03-02 21:39:10'),
(4, 'Lorem Ipsum Dolor', 'Cras molestie iaculis vehicula. Etiam odio eros, bibendum nec nibh vel, ornare tincidunt justo. Nullam nec cursus augue, finibus dignissim est. Mauris placerat commodo urna ac gravida. Aliquam nec tortor vitae lectus suscipit dignissim dapibus nec risus. Pellentesque arcu sem, facilisis quis sapien non, scelerisque facilisis eros. Praesent quis ultricies urna.\r\n\r\nCurabitur tellus turpis, egestas a quam venenatis, ultrices lobortis urna. Proin scelerisque dignissim ultrices. Aenean ac est lorem. Sed bibendum felis nunc, in cursus nisi laoreet in. Donec feugiat ornare est, et cursus metus porttitor sed. Integer ut dolor ut erat condimentum sagittis. Vivamus id molestie risus.', 1, NULL, '4', 'postpic4.jpg', 'culpa,laboris,labore', '2016-03-02 05:13:00', '2016-03-02 21:39:10'),
(6, 'This is test blog', '<p>This is the testing for the articleController. We will be online shortly.</p>\r\n<p>This is only a test blog</p>', 1, NULL, '6', NULL, NULL, '2016-03-03 20:01:52', '2016-03-03 20:01:52'),
(7, 'This is test blog 1', '<p><img src="http://cdn.earthporm.com/wp-content/uploads/2015/06/plitvice.jpg" alt="" width="471" height="313" /></p>\r\n<p>This is the testing for the articleController. We will be online shortly.</p>\r\n<p>This is only a test blog</p>', 1, NULL, '7', NULL, NULL, '2016-03-03 20:08:35', '2016-03-03 20:08:35'),
(8, 'This Is Sparta', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna leo, ullamcorper sit amet ullamcorper quis, viverra ac dolor. In vulputate varius nibh, maximus varius turpis sollicitudin eget. Donec ligula dui, euismod volutpat orci ut, viverra malesuada elit. Proin nisl augue, tristique eget nunc vel, sodales molestie magna. Nam et mattis quam, sit amet imperdiet lacus. Duis et nisl vel massa commodo volutpat a nec sem. Vestibulum id magna maximus, faucibus lorem non, condimentum eros. Nam sagittis mi ac velit mattis dapibus et ut ligula. Integer ex augue, finibus vel blandit et, mollis quis ligula. Mauris dapibus ac tortor sit amet auctor. Etiam <strong>massa sapien, tristique non massa vitae, porttitor molestie sem. Duis molestie, nisi et porta faucibus, sem augue finibus odio, quis iaculis mi massa vitae ligula. Vestibulum imperdiet nisl leo, a pulvinar nunc interdum et. Nunc ornare tincidunt neque non efficitur. Suspendisse non cursus ex. Praesent tincidunt, urna ut malesuada semper, elit nisl aliquet nibh, nec volutpat velit metus ut quam.</strong></p>\r\n<p><img src="http://www.mitrofm.com/en/wp-content/uploads/edd/2015/09/linkin-park.jpg" alt="" width="1920" height="1080" /></p>\r\n<p>Donec orci est, gravida vitae egestas vitae, maximus sit amet urna. Vestibulum tristique velit ut variu<em>s bibendum. Proin ac lorem a mi finibus viverra eu eu sem. Vestibulum semper leo laoreet, tristique dolor iaculis, faucibus lacus. Donec posuere purus enim. Aliquam lacinia placerat volutpat. Fusce pharetra, tortor eget</em> fermentum dictum, lorem augue molestie magna, ut vestibulum nisl est sed velit. Nunc a risus justo.</p>\r\n<p>Aenean ornare arcu nisl, ut rutrum sem tincidunt interdum. Aenean feugiat magna vitae molestie molestie. Integer sit amet felis non urna hendrerit aliquet. Sed eu tincidunt felis. Suspendisse dictum felis ut ante interdum, sed pulvinar enim venenatis. Aliquam in lorem metus. Phasellus sagittis ante vitae eros condimentum eleifend. Vivamus est magna, ultricies eget blandit at, ornare eu mauris. Vestibulum fermentum laoreet justo vitae vehicula. Mauris nec lectus blandit, eleifend lectus at, laoreet urna. Etiam vitae ante sollicitudin, elementum quam ut, cursus ligula. Ut varius porttitor augue a finibus. Donec semper elit et pulvinar pellentesque.</p>\r\n<p>Quisque consectetur dolor quis ante viverra, fringilla eleifend tortor pellentesque. Suspendisse interdum tristique neque nec pulvinar. Ut volutpat urna ut hendrerit feugiat. Quisque quis ex sit amet mi porttitor sollicitudin. Mauris quis aliquet orci, nec ultricies odio. Vestibulum aliquet condimentum scelerisque. Nulla efficitur risus tellus. Quisque congue malesuada lacus, quis tincidunt leo imperdiet non. Aliquam id mollis leo.</p>\r\n<p>Aliquam erat volutpat. Integer vitae congue ligula. Phasellus rutrum turpis in turpis mattis sagittis. Integer luctus gravida erat, vitae faucibus enim porta id. Proin vel mi ac sem fermentum sollicitudin. Nunc ut nunc porttitor, tempor nisl nec, accumsan est. Curabitur egestas luctus placerat. Pellentesque at leo efficitur, tristique neque non, dapibus orci. Nulla faucibus, magna mollis vulputate fermentum, nunc felis sodales purus, et lobortis eros ante vitae augue. Fusce gravida libero vel velit lobortis varius. Nullam posuere sed odio non iaculis. Phasellus bibendum fermentum odio, at vehicula tellus suscipit ut. Praesent sodales rhoncus arcu, et eleifend enim aliquet nec.</p>', 1, NULL, '8', NULL, NULL, '2016-03-04 09:47:50', '2016-03-04 09:47:50'),
(15, 'This is Hutiya', '<p>cdsnvsk nfj ndfk lg lm l; kmgl kml mklg mc mlgm gflk ml mlkxg mlkc mgl mxgk mgkc kn lkcn ln lkm lkmcl m lkmx lklk mlck mklcvm lcv mlk mlckm mlcv mlk klc lc.</p>', 1, NULL, 'this-is-hutiya', NULL, NULL, '2016-03-05 04:17:58', '2016-03-05 04:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
`college_id` int(10) unsigned NOT NULL,
  `college_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `college_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `college_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `college_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name`, `college_location`, `college_description`, `college_logo`) VALUES
(1, 'GLA University', 'Mathura', NULL, NULL),
(2, 'GDBMS', 'Ranikhet', NULL, 'logoBlue.png');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`company_id` int(10) unsigned NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_location`, `company_description`, `company_logo`) VALUES
(1, 'Cotanz', NULL, NULL, 'logoBlue.png'),
(2, 'Omitra', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`course_id` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'B.Tech'),
(2, 'Intermediate');

-- --------------------------------------------------------

--
-- Table structure for table `course_major`
--

CREATE TABLE IF NOT EXISTS `course_major` (
`course_major_id` int(10) unsigned NOT NULL,
  `course_major_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_major`
--

INSERT INTO `course_major` (`course_major_id`, `course_major_name`, `course_id`) VALUES
(1, 'Computer Science & Engineering', 1),
(2, 'CBSE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_17_124236_create_user_profiles_table', 1),
('2016_02_08_003051_create_user_projects_table', 1),
('2016_02_08_003159_create_skills_table', 1),
('2016_02_08_003227_create_user_skills_table', 1),
('2016_02_08_003255_create_user_interests_table', 1),
('2016_02_08_003315_create_user_recommendations_table', 1),
('2016_02_10_043843_create_blogs_table', 1),
('2016_02_10_045635_create_college_table', 1),
('2016_02_10_045647_create_company_table', 1),
('2016_02_10_050359_create_user_experience_table', 1),
('2016_02_10_174834_create_blog_articles_table', 1),
('2016_02_12_170453_create_course_table', 1),
('2016_02_12_170636_create_course_major_table', 1),
('2016_02_12_172742_create_user_education_table', 1),
('2016_02_13_121005_name_map_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `name_map`
--

CREATE TABLE IF NOT EXISTS `name_map` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `name_map`
--

INSERT INTO `name_map` (`name`, `name_type`) VALUES
('baldevp', 'user'),
('yabhis', 'user'),
('test', 'blog'),
('kapil', 'user'),
('5', 'user'),
('6', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
`skill_id` int(10) unsigned NOT NULL,
  `skill_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`) VALUES
(1, 'Coding'),
(2, 'Video Games'),
(3, 'Web Development'),
(4, 'Music'),
(5, 'Origami'),
(6, 'Painting'),
(7, 'Pottery'),
(8, 'Puzzles'),
(9, 'Singing'),
(10, 'Sudoku'),
(11, 'Coloring'),
(12, 'Cosplay'),
(13, 'Knapping'),
(14, 'Writing'),
(15, 'Yoga'),
(16, 'Cryptography'),
(17, 'Mountaneering'),
(18, 'Shooting'),
(19, 'Archery');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `user_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Baldev', 'Patwari', 'baldevp', 'baldevp@gmail.com', '$2y$10$F7TQ6KEA7lPBJGPjwblkBuns77DBBvLQozUO9BcFVLpT0fgRa9O8e', 'SpzIO7Deo4AcGrNhdM2UYVXXiIkzNkgxHJxFhAMCSN53cJd5LIas81c7AETw', '2016-02-24 23:39:46', '2016-03-02 00:42:28'),
(6, 'Abhishek', 'Kumar Singh', 'yabhis', 'abhishek291093@gmail.com', '$2y$10$fQCCIkLhR065RyOexUODYu8tOo7gF4F3R8JHQYPXcp.jFYtaaqu4m', 'iAhRjzh1fJfsqObKeKJvToKRuJRJWr0ZjXbQpqzG9qNYy4ufPaIFFIvP0MNf', '2016-03-02 00:43:26', '2016-03-02 00:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE IF NOT EXISTS `user_education` (
  `user_id` int(10) unsigned NOT NULL,
  `college_id` int(10) unsigned NOT NULL,
  `college_start_year` int(11) NOT NULL,
  `college_end_year` int(11) DEFAULT NULL,
  `course_major_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`user_id`, `college_id`, `college_start_year`, `college_end_year`, `course_major_id`) VALUES
(1, 1, 2012, 2016, 1),
(1, 2, 2010, 2012, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_experience`
--

CREATE TABLE IF NOT EXISTS `user_experience` (
  `user_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `experience_start_year` int(11) NOT NULL,
  `experience_end_year` int(11) DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_experience`
--

INSERT INTO `user_experience` (`user_id`, `company_id`, `experience_start_year`, `experience_end_year`, `position`) VALUES
(1, 1, 2015, 2016, 'Co-Founder'),
(1, 2, 2015, 2015, 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE IF NOT EXISTS `user_interests` (
  `user_id` int(10) unsigned NOT NULL,
  `interest_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`user_id`, `interest_id`) VALUES
(1, 2),
(1, 17),
(1, 15),
(1, 13),
(1, 14),
(1, 12),
(1, 11),
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Hi, Im on Cotanz',
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `bio`, `linkedin`, `github`, `twitter`, `website`, `resume`, `profile_pic`, `tagline`, `location`, `created_at`, `updated_at`) VALUES
(1, 'A current student of B.Tech at GLA University with a love of web development, coding, music and travelling. I	love web designing and coding as I like to push myself to the boundries and test my potential. I have executed several website, all of them made me learn new skills.\r\nMy current short term goals are to work on my current ventures and learn from the hurdles. My long term goals are bit ambitious, I''d like to be the best in-class web developer. For completing this goal, I try to implement new things in every project.', 'in/baldevp', 'baldevp', 'baldevp92', 'baldev.me', NULL, 'baldevp.jpg', 'START-UP ENTREPRENEUR | DESIGNER | CODER', '127.0.0.1', '2016-02-29 12:55:24', '2016-02-29 12:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE IF NOT EXISTS `user_projects` (
`project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `project_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_desc` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `project_started` date NOT NULL,
  `project_ended` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_recommendations`
--

CREATE TABLE IF NOT EXISTS `user_recommendations` (
  `user_id` int(10) unsigned NOT NULL,
  `recommender_id` int(10) unsigned NOT NULL,
  `recommendation` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE IF NOT EXISTS `user_skills` (
  `user_id` int(10) unsigned NOT NULL,
  `skill_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`user_id`, `skill_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 6),
(1, 18),
(1, 19),
(1, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
 ADD PRIMARY KEY (`blog_id`), ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_articles`
--
ALTER TABLE `blog_articles`
 ADD PRIMARY KEY (`article_id`), ADD KEY `blog_articles_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
 ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_major`
--
ALTER TABLE `course_major`
 ADD PRIMARY KEY (`course_major_id`), ADD KEY `course_major_course_id_foreign` (`course_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
 ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD UNIQUE KEY `users_user_name_unique` (`user_name`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
 ADD KEY `user_education_user_id_foreign` (`user_id`), ADD KEY `user_education_college_id_foreign` (`college_id`), ADD KEY `user_education_course_major_id_foreign` (`course_major_id`);

--
-- Indexes for table `user_experience`
--
ALTER TABLE `user_experience`
 ADD KEY `user_experience_user_id_foreign` (`user_id`), ADD KEY `user_experience_company_id_foreign` (`company_id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
 ADD KEY `user_interests_user_id_foreign` (`user_id`), ADD KEY `user_interests_interest_id_foreign` (`interest_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
 ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_projects`
--
ALTER TABLE `user_projects`
 ADD PRIMARY KEY (`project_id`), ADD KEY `user_projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_recommendations`
--
ALTER TABLE `user_recommendations`
 ADD KEY `user_recommendations_user_id_foreign` (`user_id`), ADD KEY `user_recommendations_recommender_id_foreign` (`recommender_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
 ADD KEY `user_skills_user_id_foreign` (`user_id`), ADD KEY `user_skills_skill_id_foreign` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
MODIFY `blog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_articles`
--
ALTER TABLE `blog_articles`
MODIFY `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
MODIFY `college_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `course_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course_major`
--
ALTER TABLE `course_major`
MODIFY `course_major_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
MODIFY `skill_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_projects`
--
ALTER TABLE `user_projects`
MODIFY `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_articles`
--
ALTER TABLE `blog_articles`
ADD CONSTRAINT `blog_articles_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`blog_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_major`
--
ALTER TABLE `course_major`
ADD CONSTRAINT `course_major_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_education`
--
ALTER TABLE `user_education`
ADD CONSTRAINT `user_education_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_education_course_major_id_foreign` FOREIGN KEY (`course_major_id`) REFERENCES `course_major` (`course_major_id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_experience`
--
ALTER TABLE `user_experience`
ADD CONSTRAINT `user_experience_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_experience_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_interests`
--
ALTER TABLE `user_interests`
ADD CONSTRAINT `user_interests_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `skills` (`skill_id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
ADD CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_projects`
--
ALTER TABLE `user_projects`
ADD CONSTRAINT `user_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_recommendations`
--
ALTER TABLE `user_recommendations`
ADD CONSTRAINT `user_recommendations_recommender_id_foreign` FOREIGN KEY (`recommender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_recommendations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
ADD CONSTRAINT `user_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
