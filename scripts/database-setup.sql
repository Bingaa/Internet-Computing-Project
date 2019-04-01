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
  `Status` VARCHAR(50) NOT NULL,
  `Image` VARCHAR(50) DEFAULT 'error.png', 
  `Job` VARCHAR(50), 
  `Location` VARCHAR(50), 
  `Email` VARCHAR(50) NOT NULL,  
  `Birthday` DATETIME, 
  `Interests` LONGTEXT, 
  PRIMARY KEY (`UserID`), 
  UNIQUE(`UserName`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('andrew69', 'andrew69', 'Andrew', 'Fong', 'fong7680@mylaurier.ca', 'Just chillllaaanggg XD');
INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('andrew70', 'andrew70', 'Andrea', 'Fong', 'fong7680@mylaurier.ca', 'fEEDING');
INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('alex', 'alex', 'Alex', 'yang', 'yang7680@mylaurier.ca', 'taking a toasty dab');

#
# Table structure for table 'Contacts'
#

DROP TABLE IF EXISTS `Contacts`;

CREATE TABLE `Contacts` (
  `UserID` INTEGER NOT NULL, 
  `ContactID` INTEGER NOT NULL, 
  PRIMARY KEY (`UserID`,`ContactID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (1, 2);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (1, 3);

#
# Table structure for table 'Contacts'
#


DROP TABLE IF EXISTS `Group`;

CREATE TABLE `Group` (
  `GroupID` INTEGER NOT NULL AUTO_INCREMENT,
  `Groupname` VARCHAR(50) NOT NULL, 
  `GroupImage` VARCHAR(50) DEFAULT 'error.png',
  PRIMARY KEY (`GroupID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Table structure for table 'UserGroup'
#


DROP TABLE IF EXISTS UserGroup;

CREATE TABLE UserGroup (
    UserID INT,
    GroupID INT,
    FOREIGN KEY (UserID)
        REFERENCES User(UserID)
        ON DELETE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8;
SET autocommit=1;

#
# Table structure for table 'User'
#

DROP TABLE IF EXISTS `Message`;

CREATE TABLE `Message` (
  `MessageID` INTEGER NOT NULL AUTO_INCREMENT, 
  `Type` VARCHAR(50) NOT NULL, 
  `Content` LONGTEXT NOT NULL, 
  `CreateDate` DATETIME,  
  `GroupID` INTEGER NOT NULL,
  `UserID` INTEGER NOT NULL, 
  PRIMARY KEY (`MessageID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;