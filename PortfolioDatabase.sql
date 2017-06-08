-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: portfolio.cga94bd83uty.ca-central-1.rds.amazonaws.com    Database: portfolio
-- ------------------------------------------------------
-- Server version	5.7.11-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Accounts`
--

DROP TABLE IF EXISTS `Accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Accounts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RoleId` int(11) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PasswordSalt` varchar(20) NOT NULL,
  `PasswordHash` varchar(50) NOT NULL,
  `Activated` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`Id`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `Accounts_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `Roles` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Accounts`
--

LOCK TABLES `Accounts` WRITE;
/*!40000 ALTER TABLE `Accounts` DISABLE KEYS */;
INSERT INTO `Accounts` VALUES (1,1,'Boss','Bernard.Monette@humber.ca','root','1a935314579adfe8dc18db6ae1e8aec4df941a93',''),(2,3,'student','student@gmail.com','student','81291dee22e3be6d899743420c20764845b74dc0','');
/*!40000 ALTER TABLE `Accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Admins`
--

DROP TABLE IF EXISTS `Admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admins` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccountId` int(11) DEFAULT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `AccountId` (`AccountId`),
  CONSTRAINT `Admins_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `Accounts` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admins`
--

LOCK TABLES `Admins` WRITE;
/*!40000 ALTER TABLE `Admins` DISABLE KEYS */;
INSERT INTO `Admins` VALUES (1,1,'Bernard','Monette','444 444 5555');
/*!40000 ALTER TABLE `Admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Enrollment`
--

DROP TABLE IF EXISTS `Enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Enrollment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `YearId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `Graduated` bit(1) DEFAULT b'0',
  PRIMARY KEY (`Id`),
  KEY `YearId` (`YearId`),
  KEY `StudentId` (`StudentId`),
  CONSTRAINT `Enrollment_ibfk_1` FOREIGN KEY (`YearId`) REFERENCES `Years` (`Id`),
  CONSTRAINT `Enrollment_ibfk_2` FOREIGN KEY (`StudentId`) REFERENCES `Students` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Enrollment`
--

LOCK TABLES `Enrollment` WRITE;
/*!40000 ALTER TABLE `Enrollment` DISABLE KEYS */;
INSERT INTO `Enrollment` VALUES (1,1,1,'');
/*!40000 ALTER TABLE `Enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ExternalServices`
--

DROP TABLE IF EXISTS `ExternalServices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ExternalServices` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `BaseLink` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ExternalServices`
--

LOCK TABLES `ExternalServices` WRITE;
/*!40000 ALTER TABLE `ExternalServices` DISABLE KEYS */;
INSERT INTO `ExternalServices` VALUES (1,'GitHub',NULL),(2,'LinkedIn',NULL),(3,'Portfolio',NULL),(4,'Facebook',NULL),(5,'Google',NULL),(6,'Twitter',NULL);
/*!40000 ALTER TABLE `ExternalServices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Images`
--

DROP TABLE IF EXISTS `Images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Images` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` int(11) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Path` varchar(50) NOT NULL,
  `Size` float NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProjectId` (`ProjectId`),
  CONSTRAINT `Images_ibfk_1` FOREIGN KEY (`ProjectId`) REFERENCES `Projects` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Images`
--

LOCK TABLES `Images` WRITE;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;
/*!40000 ALTER TABLE `Images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Invitations`
--

DROP TABLE IF EXISTS `Invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Invitations` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `YearId` int(11) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `ValidDate` datetime NOT NULL,
  `ActivationToken` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `YearId` (`YearId`),
  CONSTRAINT `Invitations_ibfk_1` FOREIGN KEY (`YearId`) REFERENCES `Years` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Invitations`
--

LOCK TABLES `Invitations` WRITE;
/*!40000 ALTER TABLE `Invitations` DISABLE KEYS */;
INSERT INTO `Invitations` VALUES (1,1,'newstudent@gmail.com','2017-09-01 12:00:00','year2016-2017');
/*!40000 ALTER TABLE `Invitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Positions`
--

DROP TABLE IF EXISTS `Positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Positions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Positions`
--

LOCK TABLES `Positions` WRITE;
/*!40000 ALTER TABLE `Positions` DISABLE KEYS */;
INSERT INTO `Positions` VALUES (1,'Team Lead'),(2,'Developer'),(3,'Designer');
/*!40000 ALTER TABLE `Positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Programs`
--

DROP TABLE IF EXISTS `Programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Programs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProgramName` varchar(30) NOT NULL,
  `Credentials` varchar(50) NOT NULL,
  `Length` varchar(30) NOT NULL,
  `Campus` varchar(50) NOT NULL,
  `AreaOfInterest` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Programs`
--

LOCK TABLES `Programs` WRITE;
/*!40000 ALTER TABLE `Programs` DISABLE KEYS */;
INSERT INTO `Programs` VALUES (1,'Web Development','Ontario Graduate Certificate','3 semesters','North','Media Studies & Information Technology');
/*!40000 ALTER TABLE `Programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProjectTechs`
--

DROP TABLE IF EXISTS `ProjectTechs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProjectTechs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` int(11) DEFAULT NULL,
  `TechId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProjectId` (`ProjectId`),
  KEY `TechId` (`TechId`),
  CONSTRAINT `ProjectTechs_ibfk_1` FOREIGN KEY (`ProjectId`) REFERENCES `Projects` (`Id`),
  CONSTRAINT `ProjectTechs_ibfk_2` FOREIGN KEY (`TechId`) REFERENCES `Techs` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProjectTechs`
--

LOCK TABLES `ProjectTechs` WRITE;
/*!40000 ALTER TABLE `ProjectTechs` DISABLE KEYS */;
INSERT INTO `ProjectTechs` VALUES (1,1,2),(2,1,6),(3,1,7);
/*!40000 ALTER TABLE `ProjectTechs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Projects`
--

DROP TABLE IF EXISTS `Projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Projects` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `MainPicture` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `FinishDate` datetime NOT NULL,
  `TeamProject` bit(1) DEFAULT b'0',
  `PositionId` int(11) DEFAULT NULL,
  `ShortDesc` varchar(200) DEFAULT NULL,
  `Description` varchar(750) NOT NULL,
  `Url` varchar(50) DEFAULT NULL,
  `GitHub` varchar(50) DEFAULT NULL,
  `UploadDate` datetime NOT NULL,
  `Approved` bit(1) NOT NULL DEFAULT b'0',
  `Published` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`Id`),
  KEY `StudentId` (`StudentId`),
  KEY `PositionId` (`PositionId`),
  CONSTRAINT `Projects_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `Students` (`Id`),
  CONSTRAINT `Projects_ibfk_2` FOREIGN KEY (`PositionId`) REFERENCES `Positions` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Projects`
--

LOCK TABLES `Projects` WRITE;
/*!40000 ALTER TABLE `Projects` DISABLE KEYS */;
INSERT INTO `Projects` VALUES (1,1,'main.png','Hospital website redesign','2017-04-28 12:00:00','',1,'Short description to show in search results.','Full description of the project.','www.sample.com','','2017-06-08 11:11:11','','');
/*!40000 ALTER TABLE `Projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Roles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) DEFAULT NULL,
  `AccessLevel` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES (1,'superadmin',1),(2,'admin',2),(3,'student',3);
/*!40000 ALTER TABLE `Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `StudentExternals`
--

DROP TABLE IF EXISTS `StudentExternals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `StudentExternals` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `EServiceId` int(11) DEFAULT NULL,
  `PersonalLink` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `StudentId` (`StudentId`),
  KEY `EServiceId` (`EServiceId`),
  CONSTRAINT `StudentExternals_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `Students` (`Id`),
  CONSTRAINT `StudentExternals_ibfk_2` FOREIGN KEY (`EServiceId`) REFERENCES `ExternalServices` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `StudentExternals`
--

LOCK TABLES `StudentExternals` WRITE;
/*!40000 ALTER TABLE `StudentExternals` DISABLE KEYS */;
INSERT INTO `StudentExternals` VALUES (1,1,1,'https://github.com'),(2,1,2,'https://www.linkedin.com/'),(3,1,3,'https://www.student.com');
/*!40000 ALTER TABLE `StudentExternals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `StudentTechs`
--

DROP TABLE IF EXISTS `StudentTechs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `StudentTechs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `TechId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `StudentId` (`StudentId`),
  KEY `TechId` (`TechId`),
  CONSTRAINT `StudentTechs_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `Students` (`Id`),
  CONSTRAINT `StudentTechs_ibfk_2` FOREIGN KEY (`TechId`) REFERENCES `Techs` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `StudentTechs`
--

LOCK TABLES `StudentTechs` WRITE;
/*!40000 ALTER TABLE `StudentTechs` DISABLE KEYS */;
INSERT INTO `StudentTechs` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7);
/*!40000 ALTER TABLE `StudentTechs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Students`
--

DROP TABLE IF EXISTS `Students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Students` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccountId` int(11) DEFAULT NULL,
  `ProfileImg` varchar(100) DEFAULT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `ContactEmail` varchar(100) NOT NULL,
  `LastUpdate` datetime NOT NULL,
  `ContactNumber` varchar(100) DEFAULT NULL,
  `CurrentJob` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `AccountId` (`AccountId`),
  CONSTRAINT `Students_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `Accounts` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Students`
--

LOCK TABLES `Students` WRITE;
/*!40000 ALTER TABLE `Students` DISABLE KEYS */;
INSERT INTO `Students` VALUES (1,2,NULL,'Student','Studentovich','n00000000','student@gmail.com','2017-06-08 11:06:06','647-555-5555',NULL);
/*!40000 ALTER TABLE `Students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Techs`
--

DROP TABLE IF EXISTS `Techs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Techs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Techs`
--

LOCK TABLES `Techs` WRITE;
/*!40000 ALTER TABLE `Techs` DISABLE KEYS */;
INSERT INTO `Techs` VALUES (1,'PHP'),(2,'ASP.NET'),(3,'JavaScript'),(4,'CSS'),(5,'HTML'),(6,'jQuery'),(7,'Bootstrap');
/*!40000 ALTER TABLE `Techs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Years`
--

DROP TABLE IF EXISTS `Years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Years` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProgramId` int(11) DEFAULT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProgramId` (`ProgramId`),
  CONSTRAINT `Years_ibfk_1` FOREIGN KEY (`ProgramId`) REFERENCES `Programs` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Years`
--

LOCK TABLES `Years` WRITE;
/*!40000 ALTER TABLE `Years` DISABLE KEYS */;
INSERT INTO `Years` VALUES (1,1,'2016-09-01 00:00:00','2017-08-31 00:00:00');
/*!40000 ALTER TABLE `Years` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-08 11:24:02
