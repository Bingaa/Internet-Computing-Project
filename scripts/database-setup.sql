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



INSERT INTO `Group` (`Groupname`,`GroupImage`)
VALUES ('Group1','../images/profiles/kyuYang69.jpg');

INSERT INTO `Group` (`Groupname`,`GroupImage`)
VALUES ('Group2','../images/profiles/kyuYang69.jpg');

INSERT INTO `Group` (`Groupname`,`GroupImage`)
VALUES ('Group3','../images/profiles/kyuYang69.jpg');


#
# Table structure for table 'UserGroup'
#


DROP TABLE IF EXISTS UserGroup;

CREATE TABLE UserGroup (
    UserID INT,
    GroupID INT,
    Primary KEY (UserID, GroupID),
    FOREIGN KEY (UserID)
        REFERENCES User(UserID)
        ON DELETE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8;
SET autocommit=1;

INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (1, 1);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (2, 1);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (1, 2);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (3, 2);
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
  `SenderName` VARCHAR(50) NOT NULL,  
  PRIMARY KEY (`MessageID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

INSERT INTO `Message`(`Content`, `CreateDate`,`GroupID`,`UserID`, `SenderName` )
VALUES ("first sikh message", '1000-01-01 01:23:00', 1, 1, 'Andrew Fong' );
INSERT INTO `Message`(`Content`, `CreateDate`,`GroupID`,`UserID`, `SenderName` )
VALUES ("first sikh message", '1000-01-01 01:23:00', 1, 2, 'Andrea Fong' );
INSERT INTO `Message`(`Content`, `CreateDate`,`GroupID`,`UserID`, `SenderName` )
VALUES ("second sikh message", '2000-01-01 02:45:00', 2, 3, 'Alex yang');




SET autocommit=1;