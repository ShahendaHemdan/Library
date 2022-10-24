-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for library
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `library`;

-- Dumping structure for table library.book
CREATE TABLE IF NOT EXISTS `book` (
  `bookid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `writer` varchar(50) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `bookcover` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table library.book: ~47 rows (approximately)
INSERT INTO `book` (`bookid`, `name`, `writer`, `cost`, `category`, `bookcover`) VALUES
	(1, 'Prisoner of Zenda', 'Anthony Hope', 17, 'Science Fiction', '42317-prisoner of zenda.jpg'),
	(2, 'Dragon Heart', 'Charles Edward Pogue', 15, 'Science Fiction', '2818-dragon heart.jpg'),
	(3, 'Game Of Thrones', 'George R. R. Martin', 40, 'Science Fiction', '98593-game of thrones.jpg'),
	(4, 'Robin Hood', 'Lawrence Edward Watkin', 24, 'Science Fiction', '23885-robin hood.jpg'),
	(5, 'The Goblin Wars', 'Stuart Thaman', 60, 'Stuart Thaman', '83204-the goblin wars.jpg'),
	(6, 'Gulliver\'s Travels', 'Jonathan Swift', 25, 'Science Fiction', '8062-gulliver\'s travels.jpg'),
	(7, 'City of ember', 'Jeanne DuPrau', 35, 'Science Fiction', '31177-The-City-of-Ember.jpg'),
	(8, 'Dragon hunter', 'Nazam Anhar', 65, 'Science Fiction', '87679-dragon hunter.jpg'),
	(9, 'Poseidon\'s labor', 'T. Hunter', 24, 'Science Fiction', '95349-poseidon\'s labor.jpg'),
	(10, 'Revenge', 'Mike Kelley', 44, 'Science Fiction', '21665-revenge.jpg'),
	(11, 'Art Illumination', 'unknown', 33, 'Science Fiction', '54028-the art of illumination.png'),
	(12, 'The lonely girl', 'Edna O\'Brien', 33, 'Science Fiction', '69685-lonely girl.jpg'),
	(13, 'Gary day', 'Gary Day', 47, 'Science Fiction', '48357-gary day.jpg'),
	(14, 'Prey for me', 'anonymous', 54, 'Science Fiction', '83637-prey for me.jpg'),
	(15, 'Greek mythology', 'unknown', 45, 'Science Fiction', '2798-greek mythology.png'),
	(16, 'هاري بوتر وحجر الفيلسوف', 'J. K. Rowling', 60, 'Science Fiction', '65089-potter1.jpg'),
	(17, 'هاري بوتر وحجرة الأسرار', 'J. K. Rowling', 70, 'Science Fiction', '4847-potter2.jpg'),
	(18, 'هاري بوتر وسجين أزكابان', 'J. K. Rowling', 40, 'Science Fiction', '50307-potter3.jpg'),
	(19, 'هاري بوتر وكأس النار', 'J. K. Rowling', 35, 'Science Fiction', '6971-potter4.jpg'),
	(20, 'هاري بوتر وجماعة العنقاء', 'J. K. Rowling', 25, 'Science Fiction', '98771-potter5.jpg'),
	(21, 'هاري بوتر والأمير الهجين', 'J. K. Rowling', 75, 'Science Fiction', '50356-potter6.jpg'),
	(22, 'هاري بوتر ومقدسات الموت', 'J. K. Rowling', 65, 'Science Fiction', '88127-potter7.jpg'),
	(23, 'هاري بوتر والطفل الملعون', 'J. K. Rowling', 68, 'Science Fiction', '84119-potter8.jpg'),
	(24, 'فيرتيجو', 'Ahmed Morad', 40, 'psychology', '29012-morad1.png'),
	(25, 'الفيل الازرق', 'Ahmed Morad', 44, 'psychology', '85771-morad2.jpg'),
	(26, 'تراب الماس', 'Ahmed Morad', 35, 'psychology', '15368-morad4.png'),
	(27, 'رواية أرض الإله', 'Ahmed Morad', 65, 'psychology', '76537-morad5.jpg'),
	(28, 'موسم صيد الغزلان', 'Ahmed Morad', 48, 'psychology', '24636-morad6.jpg'),
	(29, 'لوكاندة بير الوطاويط', 'Ahmed Morad', 48, 'psychology', '85383-morad7.jpg'),
	(30, '1919', 'Ahmed Morad', 34, 'psychology', '6895-morad3.jpg'),
	(31, 'ما لا نبوح به', 'Sandra Serag', 44, 'novel', '13893-sandra.jpg'),
	(32, 'الى ما لا نهاية', 'Sandra Serag', 54, 'novel', '32451-sandra1.jpg'),
	(33, 'يوتوبيا', 'DR.Ahmed Khaled Tawfiq', 34, 'psychology', '61826-tawfiq1.jpg'),
	(34, 'في ممر الفئران', 'DR.Ahmed Khaled Tawfiq', 65, 'psychology', '82665-tawfiq2.jpg'),
	(35, 'رواية الغرفة 207', 'DR.Ahmed Khaled Tawfiq', 19, 'horror', '60008-tawfiq6.png'),
	(36, 'هادم الأساطير', 'DR.Ahmed Khaled Tawfiq', 46, 'horror', '61765-tawfiq5.jpg'),
	(37, 'رواية شآبيب', 'DR.Ahmed Khaled Tawfiq', 64, 'novel', '5157-tawfiq3.jpg'),
	(38, 'موسوعة الظلام', 'DR.Ahmed Khaled Tawfiq', 35, 'horror', '96202-tawfiq7.jpg'),
	(39, 'الخروج عن النص', 'DR.Mohamed Taha', 33, 'psychology', '79367-taha.png'),
	(40, 'ذكر شرقى منقرض', 'DR.Mohamed Taha', 64, 'psychology', '13653-taha3.jpg'),
	(41, 'لأ بطعم الفلامنكو', 'DR.Mohamed Taha', 47, 'psychology', '12153-taha2.png'),
	(42, 'علاقات خطرة', 'DR.Mohamed Taha', 77, 'psychology', '69843-taha1.jpg'),
	(43, 'بضع ساعات فى يوم ما', 'Mohamed Sadek', 78, 'novel', '16759-sadek.jpg'),
	(44, 'طه الغريب', 'Mohamed Sadek', 75, 'novel', '31066-tarek5.jpg'),
	(45, 'أنت فليبدأ العبث', 'Mohamed Sadek', 79, 'novel', '10998-tarek3.jpg'),
	(46, 'انستا حياة', 'Mohamed Sadek', 35, 'novel', '54245-tarek2.jpg'),
	(47, 'هيبتا', 'Mohamed Sadek', 26, 'novel', '30480-tarek1.jpg');

-- Dumping structure for table library.buy
CREATE TABLE IF NOT EXISTS `buy` (
  `bookid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `bought_day` timestamp NOT NULL DEFAULT current_timestamp(),
  KEY `CUSTOMER_FK` (`cid`),
  KEY `BOOK_FK` (`bookid`),
  CONSTRAINT `BOOK_FK` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`),
  CONSTRAINT `CUSTOMER_FK` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table library.buy: ~3 rows (approximately)
INSERT INTO `buy` (`bookid`, `cid`, `bought_day`) VALUES
	(2, 2, '2022-08-10 17:17:17'),
	(3, 2, '2022-08-10 17:46:17'),
	(1, 2, '2022-08-10 17:46:19');

-- Dumping structure for table library.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(20) DEFAULT 'unknown',
  `role` varchar(20) DEFAULT 'user',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table library.customer: ~2 rows (approximately)
INSERT INTO `customer` (`cid`, `username`, `password`, `fname`, `lname`, `gender`, `role`) VALUES
	(1, 'admin@gmail.com', 'admin', 'site', 'owner', 'M', 'admin'),
	(2, 'ahmedelseaidy22@gmail.com', '2000', 'ahmed', 'maher', 'M', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
