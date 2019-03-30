DROP DATABASE IF EXISTS `chatTime`;
CREATE DATABASE IF NOT EXISTS `chatTime`;
USE `chatTime`;

#
# Table structure for table 'User'
#

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `UserID` INTEGER NOT NULL AUTO_INCREMENT, 
  `UserName` VARCHAR(50) NOT NULL, 
  `Password` VARCHAR(50) NOT NULL,
  `FirstName` VARCHAR(50) NOT NULL, 
  `LastName` VARCHAR(50) NOT NULL, 
  `Job` VARCHAR(50), 
  `Location` VARCHAR(50), 
  `Email` VARCHAR(50) NOT NULL,  
  `Birthday` DATETIME, 
  `Interests` LONGTEXT, 
  PRIMARY KEY (`UserID`), 
  UNIQUE(`UserName`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`)
VALUES ('andrew69', 'andrew69', 'Andrew', 'Fong', 'fong7680@mylaurier.ca')