

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `ans_id`) VALUES
(1, 'str_length()', 1),
(2, 'strlen()', 1),
(3, 'String_length()', 1),
(4, 'str_count()', 1),
(5, '//This is comment', 2),
(6, '/*This is comment*/', 2),
(7, '<--This is comment-->', 2),
(8, '--This is comment', 2),
(9, 'timestamp()', 3),
(10, 'time()', 3),
(11, 'current_time()', 3),
(12, 'time_now()', 3),
(13, 'concat()', 4),
(14, 'unshift()', 4),
(15, 'push()', 4),
(16, 'append()', 4),
(17, 'destroy_session()', 5),
(18, 'end_session()',5),
(19, 'session_destroy()',5),
(20, 'remove_session',5),
(21, 'onfocus',6),
(22, 'onhover',6),
(23, 'oncharge',6),
(24, 'onclick',6),
(25, 'to check a if a variable is defined and is not null',7),
(26, 'to check if a variable is empty',7),
(27, 'to verify if a variable is an array',7),
(28, 'to determine if a variable is numeric',7),
(29,'array',8),
(30, 'undefined',8),
(31, 'object',8),
(32, 'function',8),
(33, 'shift()',9),
(34, 'pop()',9),
(35, 'slice()',9),
(36, 'remove()',9),
(37, 'const',10),
(38, 'static',10),
(39, 'var',10),
(40, 'let',10),
(41, 'mysqli_close()',11),
(42, 'mysqli_disconnect()',11),
(43, 'mysqli_shutdown()',11),
(44, 'mysqli_end()',11),
(45, 'remove the last element from an array',12),
(46, 'adds one or more elements to the end of an array',12),
(47, 'combines two arrays into a single array',12),
(48, 'reverse the order of elements in an array',12),
(49, 'joins array elements into a string',13),
(50, 'removes elements from an array',13),
(51, 'splits a string into an array',13),
(52, 'finds specific value in an array',13),
(53, 'redirect()',14),
(54, 'header()',14),
(55, 'go_to()',14),
(56, 'change_page()',14),
(57, 'mysql_escape_string()',15),
(58, 'pdo_escape_string()',15),
(59, 'mysqli_real_escape_string()',15),
(60, 'mysqli_escape_string()',15),
(61, 'to search for a substring within a string',16),
(62, 'to convert a string to uppercase',16),
(63, 'to replace a substring ina string',16) ,
(64, 'to extract a part of a string',16),
(65, 'to retrieve data from an external JSON file',17),
(66, 'to convert a JavaScript object into a JSON string',17),
(67, 'to parse a JSON string into an object',17),
(68, 'to format JSON data for readability',17),
(69, 'to select the first element that matches a specified CSS selector',18),
(70, 'to select multiple elements based on a class name',18),
(71, 'to select elements by their HTML tag names',18),
(72, 'to select elements by their data attributes',18),
(73, 'group_number()',19),
(74, 'format_number()',19),
(75, 'number_format()',19),
(76, 'numeric_format()',19),
(77, 'to create encrypted database connections',20),
(78, 'to execute multiple queries simultaneously',20),
(79, 'to prevent SQL injection attacks',20),
(80, 'to compress data transmitted between PHP and MySQl',20)
;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `ans_id`) VALUES
(1, 'Which PHP function is used to find the length of a string?', 2),
(2, 'How is a single line comment written in JavaScript?', 7),
(3, 'Which PHP function is used to obtain the current timestamp?', 10),
(4, 'Which method in JavaScript is used to add new elements to the biginning of an array?', 16),
(5, 'Which PHP function used to destroy a session?', 17),
(6, 'Which event in JavaScript is triggered when a user clicks on html element?',24),
(7, 'What is purpose of the isset() function in PHP?',25),
(8, 'What does the typeof operator in JavaScript return for a function?',32),
(9, 'Which method  is used to remove the last element from an array in JavaScript?',36),
(10, 'What keyword is used to declare variables in JavaScript that cannot be reassigned ane value?',37),
(11, 'Which PHP function closes apreviously opened database connection?',41),
(12, 'What does array_push() function in PHP do?',46),
(13, 'What does the implode() function in php do?',51),
(14, 'Which PHP function is used to redirect the user to a different web page?',54),
(15, 'Which PHP function is used to escape special charecters in a string  for use in an SQL statement?',60),
(16, 'What is the purpose of the substr() function in PHP?',64),
(17, 'What is the purpose of JSon.stringfly() in JavaScript?',66),
(18, 'What is the purpose of  the querySelector() method in JavaScript?',71),
(19, 'Which PHP function used to format a number with grouped thousands?',73),
(20, 'What is the purpose of using PDO in PHP?',77)
;


ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);


ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);


ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;