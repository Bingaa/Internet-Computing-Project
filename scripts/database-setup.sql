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

INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('andrew12345', 'andrew12345', 'Andrew', 'Fong', 'fong7680@mylaurier.ca', 'Just chilllling');
INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('shiv12345', 'shiv12345', 'Shiv', 'Gupta', 'fong7680@mylaurier.ca', 'At the Library');
INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('alex12345', 'alex12345', 'Alex', 'Yang', 'yang7680@mylaurier.ca', '');
INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('jasmaan123', 'jasmaan123', 'Jasmaan', 'Panesar', 'jasmaanp@hotmail.com', '');
INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('kevin12345', 'kevin12345', 'Kevin', 'Qiu', 'kevin@hotmail.com', '');
INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`, `Status` )
VALUES ('bowen12345', 'Bowen12345', 'Bowen', 'Law', 'kevin@hotmail.com', '');

#
# Table structure for table 'Contacts'
#

DROP TABLE IF EXISTS `Contacts`;

CREATE TABLE `Contacts` (
  `UserID` INTEGER NOT NULL, 
  `ContactID` INTEGER NOT NULL, 
  PRIMARY KEY (`UserID`,`ContactID`)
) ENGINE=innodb DEFAULT CHARSET=utf8mb4 COLLATE = utf8mb4_unicode_ci;;

INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (1, 2);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (1, 3);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (1, 4);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (1, 5);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (1, 6);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (2, 1);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (2, 3);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (2, 4);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (2, 5);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (2, 6);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (3, 1);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (3, 2);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (3, 4);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (3, 5);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (3, 6);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (4, 1);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (4, 2);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (4, 3);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (4, 5);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (4, 6);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (5, 1);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (5, 2);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (5, 3);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (5, 4);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (5, 6);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (6, 1);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (6, 2);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (6, 3);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (6, 4);
INSERT INTO Contacts (`UserID`, `ContactID`)
VALUES (6, 5);

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

INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (1, 1);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (2, 1);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (3, 1);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (4, 1);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (5, 1);
INSERT INTO `UserGroup`(`UserID`, `GroupID`)
VALUES (6, 1);

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