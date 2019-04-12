--
-- Table structure for table `authors`
--
CREATE TABLE IF NOT EXISTS `authors` (
 `id` int(10) unsigned auto_increment NOT NULL PRIMARY KEY,
 `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--
INSERT INTO `authors` (`name`) VALUES
('Robert C. Martin'),
('William Sanders'),
('Steve Krug');

--
-- Table structure for table `publishers`
--
CREATE TABLE IF NOT EXISTS `publishers` (
 `id` int(10) unsigned auto_increment NOT NULL PRIMARY KEY,
 `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--
INSERT INTO `publishers` (`name`) VALUES
('Pearson Education'),
('O''Reilly Media');

--
-- Table structure for table `books`
--
CREATE TABLE IF NOT EXISTS `books` (
 `id` int(10) unsigned auto_increment NOT NULL PRIMARY KEY,
 `title` varchar(255) NOT NULL,
 `subtitle` varchar(255) DEFAULT NULL,
 `isbn` varchar(16) NOT NULL,
 `author_id` int(10) NOT NULL,
 `publisher_id` int(10) NOT NULL,
 `description` text DEFAULT NULL,
 `price` decimal(10,2) DEFAULT NULL,
 `pages` int(10) DEFAULT NULL,
 `image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Dumping data for table `books`
--
INSERT INTO `books` (`title`, `subtitle`, `isbn`, `author_id`, `publisher_id`, `description`, `price`, `pages`, `image`) VALUES
('Clean Code', 'A Handbook of Agile Software Craftmanship', '9780132350884', 1, 1, 'Even bad code can function. But if code isn''t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code. But it doesn''t have to be that way.', 35.95, 464, 'book-clean-code.jpg'),
('Learning PHP Design Patterns', '', '9781449344917', 2, 2, 'Build server-side applications more efficiently and improve your PHP programming skills in the process by learning how to use design patterns in your code. This book shows you how to apply several object-oriented patterns through simple examples, and demonstrates many of them in full-fledged working applications.', 29.95, 350, 'book-learning-php-design-patterns.jpg'),
('Don''t make me think', 'A Common Sense Approach to Web Usability', '9780321965516', 3, 1, 'Since Don''t Make Me Think was first published in 2000, hundreds of thousands of Web designers and developers have relied on usability guru Steve Krug''s guide to help them understand the principles of intuitive navigation and information design. Witty, commonsensical, and eminently practical, it''s one of the best-loved and most recommended books on the subject. Now Steve returns with fresh perspective to reexamine the principles that made Don''t Make Me Think a classic-with updated examples and a new chapter on mobile usability.', 43.99, 216, 'book-dont-make-me-think.jpg');