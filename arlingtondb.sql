SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `student` (
  `StID` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `ClID` varchar(20) NOT NULL,
  `ParID` varchar(15) NOT NULL,
  PRIMARY KEY (`StID`),
  FOREIGN KEY (`ParID`) REFERENCES `parent`(`ParID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `subject` (
  `SubID` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Coeff` decimal(5,2) NOT NULL,
  PRIMARY KEY (`SubID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `marks` (
  `SubID` varchar(15) NOT NULL,
  `StID` varchar(15) NOT NULL,
  `TypeTest` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Mark` decimal(4,2) NOT NULL,
  PRIMARY KEY (`SubID`,`StID`,`TypeTest`,`Date`),
  FOREIGN KEY (`SubID`) REFERENCES `subject`(`SubID`),
  FOREIGN KEY (`StID`) REFERENCES `student`(`StID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `parent` (
  `ParID` varchar(8) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  PRIMARY KEY (`ParID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `presence` (
  `Start` datetime NOT NULL,
  `StID` varchar(15) NOT NULL,
  `Pres` varchar(1) NOT NULL,
  PRIMARY KEY (`Start`,`StID`),
  FOREIGN KEY (`StID`) REFERENCES `student`(`StID`),
  FOREIGN KEY (`Start`) REFERENCES `session`(`Start`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `session` (
  `TeaID` varchar(8) NOT NULL,
  `ClID` varchar(15) NOT NULL,
  `Start` datetime NOT NULL,
  `Duration` INT(3) NOT NULL,
  PRIMARY KEY (`TeaID`,`Start`),
  FOREIGN KEY (`TeaID`) REFERENCES `teacher`(`TeaID`),
  FOREIGN KEY (`ClID`) REFERENCES `class`(`ClID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `sign_in` (
  `Username` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `FamilyName` varchar(11) NOT NULL,
  `Password` text NOT NULL,
  `Profession` varchar(20) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `teacher` (
  `TeaID` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `SubID` varchar(15) NOT NULL,
  PRIMARY KEY (`TeaID`),
  FOREIGN KEY (`SubID`) REFERENCES `subject`(`SubID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `sign_in` (`Username`, `Name`, `FamilyName`, `Password`, `Profession`) VALUES
('admin', 'admin', 'admin', 'admin', 'Admin');

INSERT INTO `subject` (`SubID`, `Name`, `Coeff`) VALUES
('eng', 'English', 1),
('math', 'Maths', 1),
('phy', 'Physics', 1),
('info', 'Physics', 1),
('sc', 'Science', 1); 