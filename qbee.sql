-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 10:54 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qbee`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_pin` int(11) NOT NULL,
  `total_score` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `reaction` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `quiztitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quizauthor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_pin`, `total_score`, `comment`, `reaction`, `created_at`, `updated_at`, `user_id`, `quiz_id`, `quiztitle`, `quizauthor`) VALUES
(1, 598278695, NULL, NULL, NULL, '2019-04-01 08:53:25', '2019-04-01 08:53:25', 2, 5, 'C Programming', 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `games_total_score` int(11) NOT NULL,
  `hosted_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_played` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_19_135036_create_quizzes_table', 1),
(4, '2019_01_19_135633_create_questions_table', 1),
(5, '2019_01_26_112349_add_user_id_to_quizzes', 1),
(6, '2019_02_08_024853_create_games_table', 1),
(7, '2019_02_08_025736_create_history_table', 1),
(8, '2019_03_01_022932_add_userid_quizid_to_questions', 1),
(9, '2019_03_08_091045_add_short_answer_to_questions', 1),
(10, '2019_03_11_025317_true_false_questions', 1),
(11, '2019_03_15_083801_add_game_pin_to_quizzes', 1),
(12, '2019_03_19_070233_create_websockets_statistics_entries_table', 2),
(13, '2019_03_19_091417_create_websockets_statistics_entries_table', 3),
(14, '2019_03_23_091708_right_answer_questions', 4),
(15, '2019_03_30_075450_add_foreignkeys_games', 5),
(16, '2019_03_28_024031_add_status_to_games', 6),
(17, '2019_03_28_084857_status_to_questions', 7),
(18, '2019_04_01_103854_add_quiztitle_and_quizauthor_to_games', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `short_answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_false` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_answer` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `question_type`, `choice1`, `choice2`, `choice3`, `choice4`, `points`, `time_limit`, `created_at`, `updated_at`, `user_id`, `quiz_id`, `short_answer`, `true_false`, `right_answer`, `status`) VALUES
(1, 'What time _______ the train _______ for Hyderabad?', 'a', 'shall, leave', 'will, leaving', 'is, going to leave', 'will, leave', 10, 10, '2019-03-24 17:45:48', '2019-03-27 00:14:03', 1, 1, NULL, NULL, 3, 1),
(2, 'What time _______ you _______ to Delhi today?', 'mc', 'shall, go', 'will, going', 'are, going to go', 'will, go', 10, 10, '2019-03-24 17:46:47', '2019-03-24 17:46:47', 1, 1, NULL, NULL, 4, 1),
(3, 'What time _______ the train _______ for Hyderabad?', 'a', 'largest railway station', 'highest railway station', 'longest railway station', 'None of the above', 10, 10, '2019-03-24 17:51:44', '2019-03-24 17:51:53', 1, 1, NULL, NULL, 1, 1),
(4, 'Entomology is the science that studies', 'mc', 'Behavior of human beings', 'Insects', 'The origin and history of technical and scientific terms', 'The formation of rocks', 10, 10, '2019-03-24 17:52:32', '2019-03-24 17:52:32', 1, 1, NULL, NULL, 2, 1),
(5, 'Eritrea, which became the 182nd member of the UN in 1993, is in the continent of', 'mc', 'Asia', 'Africa', 'Europe', 'Australia', 10, 10, '2019-03-24 17:53:16', '2019-03-24 17:53:16', 1, 1, NULL, NULL, 2, 1),
(6, 'Garampani sanctuary is located at Diphu, Assam', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 17:54:38', '2019-03-24 17:54:38', 1, 1, NULL, '1', NULL, 1),
(7, 'Hitler party which came into power in 1933 is known as Labour Party', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 17:55:33', '2019-03-24 17:55:33', 1, 1, NULL, '0', NULL, 1),
(8, 'FFC stands for Film Finance Corporation', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 17:56:06', '2019-03-24 17:56:06', 1, 1, NULL, '1', NULL, 1),
(9, 'Fastest shorthand writer was J.M. Tagore', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 17:56:40', '2019-03-24 17:56:40', 1, 1, NULL, '0', NULL, 1),
(10, 'Epsom (England) is the place associated with Polo', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 17:57:07', '2019-03-24 17:57:07', 1, 1, NULL, '0', NULL, 1),
(11, 'First human heart transplant operation conducted by Dr. Christiaan Barnard on Louis Washkansky, was conducted in', 'shan', NULL, NULL, NULL, NULL, 20, 20, '2019-03-24 17:57:45', '2019-03-24 17:57:45', 1, 1, '1967', NULL, NULL, 1),
(12, 'Golf player Vijay Singh belongs to which country?', 'shan', NULL, NULL, NULL, NULL, 20, 20, '2019-03-24 17:58:29', '2019-03-24 17:58:29', 1, 1, 'Fiji', NULL, NULL, 1),
(13, 'First Afghan War took place in', 'shan', NULL, NULL, NULL, NULL, 20, 20, '2019-03-24 17:58:49', '2019-03-24 17:58:49', 1, 1, '1839', NULL, NULL, 1),
(14, 'ederation Cup, World Cup, Allywyn International Trophy and Challenge Cup are awarded to winners of', 'shan', NULL, NULL, NULL, NULL, 20, 20, '2019-03-24 17:59:17', '2019-03-24 17:59:17', 1, 1, 'Volleyball', NULL, NULL, 1),
(15, 'Georgia, Uzbekistan and Turkmenistan became the members of UNO in', 'shan', NULL, NULL, NULL, NULL, 20, 20, '2019-03-24 17:59:45', '2019-03-24 17:59:45', 1, 1, '1992', NULL, NULL, 1),
(16, 'In which year of First World War Germany declared war on Russia and France?', 'shan', NULL, NULL, NULL, NULL, 20, 20, '2019-03-24 18:00:43', '2019-03-24 18:00:43', 1, 2, '1914', NULL, NULL, 0),
(17, 'ICAO stands for', 'mc', 'International Civil Aviation Organization', 'Indian Corporation of Agriculture Organization', 'Institute of Company of Accounts Organization', 'None of the above', 10, 10, '2019-03-24 18:01:28', '2019-03-24 18:01:28', 1, 2, NULL, NULL, 1, 0),
(18, 'India\'s first Technicolor film ____ in the early 1950s was produced by ____', 'mc', '\'Jhansi Ki Rani\', Sohrab Modi', '\'Jhansi Ki Rani\', Sir Syed Ahmed', '\'Mirza Ghalib\', Sohrab Modi', '\'Mirza Ghalib\', Munshi Premchand', 10, 10, '2019-03-24 18:02:14', '2019-03-24 18:02:14', 1, 2, NULL, NULL, 1, 0),
(19, 'India has largest deposits of ____ in the world.', 'mc', 'gold', 'copper', 'mica', 'None of the above', 10, 10, '2019-03-24 18:02:52', '2019-03-24 18:02:52', 1, 2, NULL, NULL, 3, 0),
(20, 'How many Lok Sabha seats belong to Rajasthan?', 'shan', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 18:04:15', '2019-03-24 18:04:15', 1, 2, '25', NULL, NULL, 0),
(21, 'The Homolographic projection has the correct representation of', 'shan', NULL, NULL, NULL, NULL, 20, 20, '2019-03-24 18:09:45', '2019-03-24 18:09:45', 1, 2, 'area', NULL, NULL, 0),
(22, 'The latitudinal differences in pressure delineate a number of major pressure zones, which correspond with zones of climate', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 18:10:32', '2019-03-24 18:10:32', 1, 2, NULL, '1', NULL, 0),
(23, 'The hazards of radiation belts include', 'mc', 'deterioration of electronic circuits', 'damage of solar cells of spacecraft', 'adverse effect on living organisms', 'All of the above', 10, 10, '2019-03-24 18:11:14', '2019-03-24 18:11:14', 1, 2, NULL, NULL, 4, 0),
(24, 'The great Victoria Desert is located in West Africa', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 18:11:41', '2019-03-24 18:11:41', 1, 2, NULL, '1', NULL, 0),
(25, 'The intersecting lines drawn on maps and globes are longitudes', 'tf', NULL, NULL, NULL, NULL, 10, 10, '2019-03-24 18:12:04', '2019-03-24 18:12:04', 1, 2, NULL, '0', NULL, 0),
(26, 'Kiran Bedi received Magsaysay Award for government service in 1992', 'b', '1992', '1993', '1994', '1995', 10, 10, '2019-03-26 22:41:41', '2019-03-26 23:42:45', 1, 4, NULL, '1', 1, 0),
(27, 'Logarithm tables were invented by John Doe', 'b', NULL, NULL, NULL, NULL, 10, 10, '2019-03-26 22:43:01', '2019-03-26 22:43:22', 1, 4, NULL, NULL, NULL, 0),
(28, 'With which sport is the Jules Rimet trophy associated?', 'mc', 'Basketball', 'Football', 'Hockey', 'Golf', 10, 10, '2019-03-26 23:11:34', '2019-03-26 23:11:34', 1, 4, NULL, NULL, 2, 0),
(29, 'Joule is the unit of heat', 'a', 'temperature', 'pressure', 'energy', 'heat', 10, 10, '2019-03-26 23:12:14', '2019-03-26 23:22:14', 1, 4, NULL, NULL, 3, 0),
(30, 'Kemal Ataturk was the founder of modern Turkey', 'b', 'the first President of Independent Kenya', 'the founder of modern Turkey', 'revolutionary leader of Soviet Union', 'None of the above', 10, 10, '2019-03-26 23:22:54', '2019-03-26 23:45:56', 1, 4, NULL, '1', 2, 0),
(31, 'Which of the following statements should be used to obtain a remainder after dividing 3.14 by 2.1 ?', 'mc', 'rem = 3.14 % 2.1;', 'rem = modf(3.14, 2.1);', 'rem = fmod(3.14, 2.1);', 'Remainder cannot be obtain in floating point division.', 10, 10, '2019-04-01 03:00:45', '2019-04-01 03:00:45', 2, 5, NULL, NULL, 3, 0),
(32, 'What are the types of linkages?', 'mc', 'Internal and External', 'External, Internal and None', 'External and None', 'Internal', 10, 10, '2019-04-01 03:01:29', '2019-04-01 03:01:29', 2, 5, NULL, NULL, 2, 0),
(33, 'Which of the following special symbol allowed in a variable name?', 'mc', '* (asterisk)', '| (pipeline)', '- (hyphen)', '_ (underscore)', 10, 10, '2019-04-01 03:01:59', '2019-04-01 03:01:59', 2, 5, NULL, NULL, 4, 0),
(34, 'How would you round off a value from 1.66 to 2.0?', 'mc', 'ceil(1.66)', 'floor(1.66)', 'roundup(1.66)', 'roundto(1.66)', 10, 10, '2019-04-01 03:08:54', '2019-04-01 03:08:54', 2, 5, NULL, NULL, 1, 0),
(35, 'When we mention the prototype of a function?', 'mc', 'Defining', 'Declaring', 'Prototyping', 'Calling', 10, 10, '2019-04-01 03:09:41', '2019-04-01 03:09:41', 2, 5, NULL, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `game_pin` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `category`, `description`, `created_at`, `updated_at`, `user_id`, `game_pin`) VALUES
(1, 'Test1', 'General Knowledge', 'wqeqwewqeqwe', '2019-03-23 00:13:41', '2019-03-23 00:13:41', 1, 429496729),
(2, 'legit quiz', 'General Knowledge', 'Basic General Knowledge - Section 2', '2019-03-24 18:00:19', '2019-03-24 18:00:19', 1, NULL),
(3, 'quiz2', 'General Knowledge', 'test', '2019-03-25 00:00:18', '2019-03-25 00:00:18', 1, 714098761),
(4, 'gennum', 'General Knowledge', 'gennum', '2019-03-25 21:18:35', '2019-03-25 21:18:35', 1, 182139581),
(5, 'C Programming', 'Technologies', 'q1', '2019-03-30 01:39:24', '2019-04-01 03:10:10', 2, 598278695),
(6, '21', 'General Knowledge', 'q1212', '2019-03-30 01:40:05', '2019-03-30 01:40:05', 2, 859133);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@qbee.com', NULL, '$2y$10$tfxU4Jn/zsoRCH739mu9fe0v33xCdC8WEPKDmskP8BJ0rZcvPklCy', 'HLxnVuxmre7JGBd4IKq1OX9xV4FerAuJLX8Bzsgacm3PbRrvJIxGiRaJqQto', '2019-03-19 00:56:29', '2019-03-19 00:56:29'),
(2, 'user2', 'user2@qbee.com', NULL, '$2y$10$O2E4HmZHwMtGS4HPRzSBqO5TIpYThBPkqq7labpBGhWPngRZ4w4PO', '8DWPhWBNB1uvTgtT24mp7ASrJTt3voURecmJ96sgx1ew8Hvl1eplLpQfPhPu', '2019-03-28 01:32:56', '2019-03-28 01:32:56'),
(3, 'user3', 'user3@qbee.com', NULL, '$2y$10$0ruJ6IBjdYjr/RFhKKd54eBrvBQa0axpiccBzQWKya6JugQAil6FS', NULL, '2019-03-28 01:34:10', '2019-03-28 01:34:10'),
(4, 'Lorenz', 'seerenz@gmail.com', NULL, '$2y$10$T1AgflzwEBcSUSMBqWou4..IIN78/TaMYW.A7KpzbuGG2o2istXFO', NULL, '2019-03-30 01:42:31', '2019-03-30 01:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_user_id_foreign` (`user_id`),
  ADD KEY `games_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_user_id_foreign` (`user_id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `games_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
