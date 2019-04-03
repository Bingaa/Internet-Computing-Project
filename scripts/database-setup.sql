DROP DATABASE IF EXISTS `chatTime`;
CREATE DATABASE IF NOT EXISTS `chatTime` CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
USE `chatTime`;

#
# Table structure for table 'User'
#

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `UserID` INTEGER NOT NULL AUTO_INCREMENT, 
  `UserName` VARCHAR(50) NOT NULL, 
  `Password` VARCHAR(255) NOT NULL,
  `FirstName` VARCHAR(50) NOT NULL, 
  `LastName` VARCHAR(50) NOT NULL,
  `Status` VARCHAR(50) NOT NULL,
  `Image` VARCHAR(50) DEFAULT '../images/error.png', 
  `Job` VARCHAR(50), 
  `Location` VARCHAR(50), 
  `Email` VARCHAR(50) NOT NULL,  
  `Birthday` DATETIME, 
  `Interests` LONGTEXT, 
  PRIMARY KEY (`UserID`), 
  UNIQUE(`UserName`)
) ENGINE=innodb DEFAULT CHARSET=utf8mb4 COLLATE = utf8mb4_unicode_ci;


#
# Table structure for table 'Contacts'
#

DROP TABLE IF EXISTS `Contacts`;

CREATE TABLE `Contacts` (
  `UserID` INTEGER NOT NULL, 
  `ContactID` INTEGER NOT NULL, 
  PRIMARY KEY (`UserID`,`ContactID`)
) ENGINE=innodb DEFAULT CHARSET=utf8mb4 COLLATE = utf8mb4_unicode_ci;;

#
# Table structure for table 'Contacts'
#


DROP TABLE IF EXISTS `Group`;

CREATE TABLE `Group` (
  `GroupID` INTEGER NOT NULL AUTO_INCREMENT,
  `Groupname` VARCHAR(50) NOT NULL, 
  `GroupImage` VARCHAR(50) DEFAULT '../images/group.png',
  PRIMARY KEY (`GroupID`)
) ENGINE=innodb DEFAULT CHARSET=utf8mb4 COLLATE = utf8mb4_unicode_ci;;

SET autocommit=1;

INSERT INTO `Group` (`Groupname`,`GroupImage`)
VALUES ('Squad Chat','../images/group.png');


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
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE = utf8mb4_unicode_ci;;
SET autocommit=1;

#
# Table structure for table 'UserGroup'
#

DROP TABLE IF EXISTS `Message`;

CREATE TABLE `Message` (
  `MessageID` INTEGER NOT NULL AUTO_INCREMENT, 
  `Type` VARCHAR(50) NOT NULL, 
  `ImageSource` VARCHAR(50) DEFAULT NULL, 
  `Content` LONGTEXT NOT NULL, 
  `CreateDate` DATETIME DEFAULT now(),  
  `GroupID` INTEGER NOT NULL,
  `UserID` INTEGER NOT NULL, 
  `SenderName` VARCHAR(50) NOT NULL,  
  PRIMARY KEY (`MessageID`)
) ENGINE=innodb DEFAULT CHARSET=utf8mb4 COLLATE = utf8mb4_unicode_ci;;


SET autocommit=1;