CREATE DATABASE  IF NOT EXISTS `arquigrafia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `arquigrafia`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: localhost    Database: arquigrafia
-- ------------------------------------------------------
-- Server version	5.6.19

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
-- Table structure for table `androidapplication`
--

DROP TABLE IF EXISTS `androidapplication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `androidapplication` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `backgroundColor` varchar(255) DEFAULT NULL,
  `componentInstallFolder` varchar(255) DEFAULT NULL,
  `displayName` varchar(255) DEFAULT NULL,
  `textColor` varchar(255) DEFAULT NULL,
  `urlLogoImage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `androidapplication`
--

LOCK TABLES `androidapplication` WRITE;
/*!40000 ALTER TABLE `androidapplication` DISABLE KEYS */;
/*!40000 ALTER TABLE `androidapplication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collablet`
--

DROP TABLE IF EXISTS `collablet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collablet` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `componentClassName` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `enabled` bit(1) NOT NULL,
  `folderName` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `FKE77CFACED31C1502` (`parent_id`),
  CONSTRAINT `FKE77CFACED31C1502` FOREIGN KEY (`parent_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collablet`
--

LOCK TABLES `collablet` WRITE;
/*!40000 ALTER TABLE `collablet` DISABLE KEYS */;
INSERT INTO `collablet` VALUES (1,NULL,NULL,'\0',NULL,NULL,NULL),(2,NULL,NULL,'\0',NULL,NULL,NULL),(3,NULL,NULL,'\0',NULL,NULL,NULL),(4,NULL,NULL,'\0',NULL,NULL,NULL),(5,NULL,NULL,'\0',NULL,NULL,NULL);
/*!40000 ALTER TABLE `collablet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collablet_collabletproperty`
--

DROP TABLE IF EXISTS `collablet_collabletproperty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collablet_collabletproperty` (
  `Collablet_id` bigint(20) NOT NULL,
  `properties_id` bigint(20) NOT NULL,
  UNIQUE KEY `properties_id` (`properties_id`),
  KEY `FKECCC9B92F45B47CE` (`properties_id`),
  KEY `FKECCC9B92D6F1EC3E` (`Collablet_id`),
  CONSTRAINT `FKECCC9B92D6F1EC3E` FOREIGN KEY (`Collablet_id`) REFERENCES `collablet` (`id`),
  CONSTRAINT `FKECCC9B92F45B47CE` FOREIGN KEY (`properties_id`) REFERENCES `collabletproperty` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collablet_collabletproperty`
--

LOCK TABLES `collablet_collabletproperty` WRITE;
/*!40000 ALTER TABLE `collablet_collabletproperty` DISABLE KEYS */;
/*!40000 ALTER TABLE `collablet_collabletproperty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collablet_dependencies`
--

DROP TABLE IF EXISTS `collablet_dependencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collablet_dependencies` (
  `dependents_id` bigint(20) NOT NULL,
  `dependencies_id` bigint(20) NOT NULL,
  `dependencies_KEY` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`dependents_id`,`dependencies_KEY`),
  KEY `FK23D33F1AFB821018` (`dependents_id`),
  KEY `FK23D33F1AA7055C23` (`dependencies_id`),
  CONSTRAINT `FK23D33F1AA7055C23` FOREIGN KEY (`dependencies_id`) REFERENCES `collablet` (`id`),
  CONSTRAINT `FK23D33F1AFB821018` FOREIGN KEY (`dependents_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collablet_dependencies`
--

LOCK TABLES `collablet_dependencies` WRITE;
/*!40000 ALTER TABLE `collablet_dependencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `collablet_dependencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collabletproperty`
--

DROP TABLE IF EXISTS `collabletproperty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collabletproperty` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `k` varchar(255) DEFAULT NULL,
  `v` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collabletproperty`
--

LOCK TABLES `collabletproperty` WRITE;
/*!40000 ALTER TABLE `collabletproperty` DISABLE KEYS */;
/*!40000 ALTER TABLE `collabletproperty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `component`
--

DROP TABLE IF EXISTS `component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `component` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `insertionDate` datetime NOT NULL,
  `md5hash` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `packageName` varchar(255) DEFAULT NULL,
  `size` bigint(20) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `component`
--

LOCK TABLES `component` WRITE;
/*!40000 ALTER TABLE `component` DISABLE KEYS */;
/*!40000 ALTER TABLE `component` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `component_configurations`
--

DROP TABLE IF EXISTS `component_configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `component_configurations` (
  `Component_id` bigint(20) NOT NULL,
  `componentConfigurations_id` bigint(20) NOT NULL,
  `componentConfigurations_KEY` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Component_id`,`componentConfigurations_KEY`),
  UNIQUE KEY `componentConfigurations_id` (`componentConfigurations_id`),
  KEY `FK34BA31FF8774651F` (`Component_id`),
  KEY `FK34BA31FF5B1E3994` (`componentConfigurations_id`),
  CONSTRAINT `FK34BA31FF5B1E3994` FOREIGN KEY (`componentConfigurations_id`) REFERENCES `componentconfiguration` (`id`),
  CONSTRAINT `FK34BA31FF8774651F` FOREIGN KEY (`Component_id`) REFERENCES `component` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `component_configurations`
--

LOCK TABLES `component_configurations` WRITE;
/*!40000 ALTER TABLE `component_configurations` DISABLE KEYS */;
/*!40000 ALTER TABLE `component_configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componentconfiguration`
--

DROP TABLE IF EXISTS `componentconfiguration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componentconfiguration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collabletName` varchar(255) DEFAULT NULL,
  `menuLabel` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componentconfiguration`
--

LOCK TABLES `componentconfiguration` WRITE;
/*!40000 ALTER TABLE `componentconfiguration` DISABLE KEYS */;
/*!40000 ALTER TABLE `componentconfiguration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componentconfiguration_nextcomponents`
--

DROP TABLE IF EXISTS `componentconfiguration_nextcomponents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componentconfiguration_nextcomponents` (
  `ComponentConfiguration_id` bigint(20) NOT NULL,
  `nextComponents` varchar(255) DEFAULT NULL,
  `nextComponents_KEY` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ComponentConfiguration_id`,`nextComponents_KEY`),
  KEY `FK3FC6246FF89C6E95` (`ComponentConfiguration_id`),
  CONSTRAINT `FK3FC6246FF89C6E95` FOREIGN KEY (`ComponentConfiguration_id`) REFERENCES `componentconfiguration` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componentconfiguration_nextcomponents`
--

LOCK TABLES `componentconfiguration_nextcomponents` WRITE;
/*!40000 ALTER TABLE `componentconfiguration_nextcomponents` DISABLE KEYS */;
/*!40000 ALTER TABLE `componentconfiguration_nextcomponents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componentconfiguration_properties`
--

DROP TABLE IF EXISTS `componentconfiguration_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componentconfiguration_properties` (
  `ComponentConfiguration_id` bigint(20) NOT NULL,
  `customProperties` varchar(255) DEFAULT NULL,
  `customProperties_KEY` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ComponentConfiguration_id`,`customProperties_KEY`),
  KEY `FK639C8E39F89C6E95` (`ComponentConfiguration_id`),
  CONSTRAINT `FK639C8E39F89C6E95` FOREIGN KEY (`ComponentConfiguration_id`) REFERENCES `componentconfiguration` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componentconfiguration_properties`
--

LOCK TABLES `componentconfiguration_properties` WRITE;
/*!40000 ALTER TABLE `componentconfiguration_properties` DISABLE KEYS */;
/*!40000 ALTER TABLE `componentconfiguration_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counterlog`
--

DROP TABLE IF EXISTS `counterlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counterlog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `accessDate` datetime DEFAULT NULL,
  `counter_id` bigint(20) DEFAULT NULL,
  `viewer_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK39721FC8D0882A1A` (`viewer_id`),
  KEY `FK39721FC8B80E16AC` (`counter_id`),
  CONSTRAINT `FK39721FC8B80E16AC` FOREIGN KEY (`counter_id`) REFERENCES `gw_collab_counter` (`id`),
  CONSTRAINT `FK39721FC8D0882A1A` FOREIGN KEY (`viewer_id`) REFERENCES `gw_collab_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counterlog`
--

LOCK TABLES `counterlog` WRITE;
/*!40000 ALTER TABLE `counterlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `counterlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entitymappertest$embeddedidfieldbasedentitymock`
--

DROP TABLE IF EXISTS `entitymappertest$embeddedidfieldbasedentitymock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entitymappertest$embeddedidfieldbasedentitymock` (
  `field1` bigint(20) NOT NULL,
  `field2` varchar(255) NOT NULL,
  `crap` int(11) DEFAULT NULL,
  `thrash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`field1`,`field2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entitymappertest$embeddedidfieldbasedentitymock`
--

LOCK TABLES `entitymappertest$embeddedidfieldbasedentitymock` WRITE;
/*!40000 ALTER TABLE `entitymappertest$embeddedidfieldbasedentitymock` DISABLE KEYS */;
/*!40000 ALTER TABLE `entitymappertest$embeddedidfieldbasedentitymock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entitymappertest$embeddedidgetterbasedentitymock`
--

DROP TABLE IF EXISTS `entitymappertest$embeddedidgetterbasedentitymock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entitymappertest$embeddedidgetterbasedentitymock` (
  `field1` bigint(20) NOT NULL,
  `field2` varchar(255) NOT NULL,
  PRIMARY KEY (`field1`,`field2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entitymappertest$embeddedidgetterbasedentitymock`
--

LOCK TABLES `entitymappertest$embeddedidgetterbasedentitymock` WRITE;
/*!40000 ALTER TABLE `entitymappertest$embeddedidgetterbasedentitymock` DISABLE KEYS */;
/*!40000 ALTER TABLE `entitymappertest$embeddedidgetterbasedentitymock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entitymappertest$nestedembeddedidfieldbasedentitymock`
--

DROP TABLE IF EXISTS `entitymappertest$nestedembeddedidfieldbasedentitymock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entitymappertest$nestedembeddedidfieldbasedentitymock` (
  `field1` bigint(20) NOT NULL DEFAULT '0',
  `field2` varchar(255) NOT NULL DEFAULT '',
  `field3` bit(1) NOT NULL,
  `crap` int(11) DEFAULT NULL,
  `thrash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`field1`,`field2`,`field3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entitymappertest$nestedembeddedidfieldbasedentitymock`
--

LOCK TABLES `entitymappertest$nestedembeddedidfieldbasedentitymock` WRITE;
/*!40000 ALTER TABLE `entitymappertest$nestedembeddedidfieldbasedentitymock` DISABLE KEYS */;
/*!40000 ALTER TABLE `entitymappertest$nestedembeddedidfieldbasedentitymock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entitymappertest$nestedembeddedidgetterbasedentitymock`
--

DROP TABLE IF EXISTS `entitymappertest$nestedembeddedidgetterbasedentitymock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entitymappertest$nestedembeddedidgetterbasedentitymock` (
  `field1` bigint(20) NOT NULL DEFAULT '0',
  `field2` varchar(255) NOT NULL DEFAULT '',
  `field3` bit(1) NOT NULL,
  PRIMARY KEY (`field1`,`field2`,`field3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entitymappertest$nestedembeddedidgetterbasedentitymock`
--

LOCK TABLES `entitymappertest$nestedembeddedidgetterbasedentitymock` WRITE;
/*!40000 ALTER TABLE `entitymappertest$nestedembeddedidgetterbasedentitymock` DISABLE KEYS */;
/*!40000 ALTER TABLE `entitymappertest$nestedembeddedidgetterbasedentitymock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entitymappertest$simplefieldbasedentitymock`
--

DROP TABLE IF EXISTS `entitymappertest$simplefieldbasedentitymock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entitymappertest$simplefieldbasedentitymock` (
  `magicNumber` bigint(20) NOT NULL,
  `dontCare` varchar(255) DEFAULT NULL,
  `junk` int(11) DEFAULT NULL,
  PRIMARY KEY (`magicNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entitymappertest$simplefieldbasedentitymock`
--

LOCK TABLES `entitymappertest$simplefieldbasedentitymock` WRITE;
/*!40000 ALTER TABLE `entitymappertest$simplefieldbasedentitymock` DISABLE KEYS */;
/*!40000 ALTER TABLE `entitymappertest$simplefieldbasedentitymock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entitymappertest$simplegetterbasedentitymock`
--

DROP TABLE IF EXISTS `entitymappertest$simplegetterbasedentitymock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entitymappertest$simplegetterbasedentitymock` (
  `theKey` bigint(20) NOT NULL,
  PRIMARY KEY (`theKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entitymappertest$simplegetterbasedentitymock`
--

LOCK TABLES `entitymappertest$simplegetterbasedentitymock` WRITE;
/*!40000 ALTER TABLE `entitymappertest$simplegetterbasedentitymock` DISABLE KEYS */;
/*!40000 ALTER TABLE `entitymappertest$simplegetterbasedentitymock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pergunta` longtext,
  `resposta` longtext,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK112F6D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK112F6D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_album`
--

DROP TABLE IF EXISTS `gw_collab_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `creationDate` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `urlCover` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `owner_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKF0E868C911899D9` (`owner_id`),
  KEY `FKF0E868CD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKF0E868C911899D9` FOREIGN KEY (`owner_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKF0E868CD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_album`
--

LOCK TABLES `gw_collab_album` WRITE;
/*!40000 ALTER TABLE `gw_collab_album` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_album_elements`
--

DROP TABLE IF EXISTS `gw_collab_album_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_album_elements` (
  `Album_id` bigint(20) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  KEY `FK12D26D6A1EA10E3D` (`Album_id`),
  CONSTRAINT `FK12D26D6A1EA10E3D` FOREIGN KEY (`Album_id`) REFERENCES `gw_collab_album` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_album_elements`
--

LOCK TABLES `gw_collab_album_elements` WRITE;
/*!40000 ALTER TABLE `gw_collab_album_elements` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_album_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_binomial`
--

DROP TABLE IF EXISTS `gw_collab_binomial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_binomial` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `defaultValue` int(11) NOT NULL,
  `firstDescription` varchar(255) DEFAULT NULL,
  `firstLink` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `secondDescription` varchar(255) DEFAULT NULL,
  `secondLink` varchar(255) DEFAULT NULL,
  `secondName` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK8B109D2D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK8B109D2D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_binomial`
--

LOCK TABLES `gw_collab_binomial` WRITE;
/*!40000 ALTER TABLE `gw_collab_binomial` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_binomial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_binomial_evaluation`
--

DROP TABLE IF EXISTS `gw_collab_binomial_evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_binomial_evaluation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `evaluationPosition` int(11) NOT NULL,
  `binomial_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKC81537E92531E9C1` (`user_id`),
  KEY `FKC81537E9DBDD193B` (`binomial_id`),
  CONSTRAINT `FKC81537E92531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKC81537E9DBDD193B` FOREIGN KEY (`binomial_id`) REFERENCES `gw_collab_binomial` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_binomial_evaluation`
--

LOCK TABLES `gw_collab_binomial_evaluation` WRITE;
/*!40000 ALTER TABLE `gw_collab_binomial_evaluation` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_binomial_evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_category`
--

DROP TABLE IF EXISTS `gw_collab_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `collablet_id` (`collablet_id`,`name`),
  KEY `FKD30DE3C1D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKD30DE3C1D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_category`
--

LOCK TABLES `gw_collab_category` WRITE;
/*!40000 ALTER TABLE `gw_collab_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_category_assignments`
--

DROP TABLE IF EXISTS `gw_collab_category_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_category_assignments` (
  `Category_id` bigint(20) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  KEY `FK4DB4A3A8B02DA38E` (`Category_id`),
  CONSTRAINT `FK4DB4A3A8B02DA38E` FOREIGN KEY (`Category_id`) REFERENCES `gw_collab_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_category_assignments`
--

LOCK TABLES `gw_collab_category_assignments` WRITE;
/*!40000 ALTER TABLE `gw_collab_category_assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_category_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_comment`
--

DROP TABLE IF EXISTS `gw_collab_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `postDate` datetime DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `text` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKF509633C2531E9C1` (`user_id`),
  KEY `FKF509633CD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKF509633C2531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKF509633CD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_comment`
--

LOCK TABLES `gw_collab_comment` WRITE;
/*!40000 ALTER TABLE `gw_collab_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_community`
--

DROP TABLE IF EXISTS `gw_collab_community`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_community` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `administrator_id` bigint(20) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKD91EE18625069B7F` (`administrator_id`),
  KEY `FKD91EE186D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKD91EE18625069B7F` FOREIGN KEY (`administrator_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKD91EE186D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_community`
--

LOCK TABLES `gw_collab_community` WRITE;
/*!40000 ALTER TABLE `gw_collab_community` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_community` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_community_members`
--

DROP TABLE IF EXISTS `gw_collab_community_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_community_members` (
  `community_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  KEY `FKC4D703402531E9C1` (`user_id`),
  KEY `FKC4D703405310A1A8` (`community_id`),
  CONSTRAINT `FKC4D703402531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKC4D703405310A1A8` FOREIGN KEY (`community_id`) REFERENCES `gw_collab_members_community` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_community_members`
--

LOCK TABLES `gw_collab_community_members` WRITE;
/*!40000 ALTER TABLE `gw_collab_community_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_community_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_counter`
--

DROP TABLE IF EXISTS `gw_collab_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_counter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dataCriacao` datetime DEFAULT NULL,
  `idUser` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `type` varchar(255) DEFAULT NULL,
  `value` int(11) NOT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKF57ACAD9D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKF57ACAD9D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_counter`
--

LOCK TABLES `gw_collab_counter` WRITE;
/*!40000 ALTER TABLE `gw_collab_counter` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_counter_counterlog`
--

DROP TABLE IF EXISTS `gw_collab_counter_counterlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_counter_counterlog` (
  `gw_collab_Counter_id` bigint(20) NOT NULL,
  `counterLogs_id` bigint(20) NOT NULL,
  UNIQUE KEY `counterLogs_id` (`counterLogs_id`),
  KEY `FKE6A898EE804D7025` (`counterLogs_id`),
  KEY `FKE6A898EE3B18BC8F` (`gw_collab_Counter_id`),
  CONSTRAINT `FKE6A898EE3B18BC8F` FOREIGN KEY (`gw_collab_Counter_id`) REFERENCES `gw_collab_counter` (`id`),
  CONSTRAINT `FKE6A898EE804D7025` FOREIGN KEY (`counterLogs_id`) REFERENCES `counterlog` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_counter_counterlog`
--

LOCK TABLES `gw_collab_counter_counterlog` WRITE;
/*!40000 ALTER TABLE `gw_collab_counter_counterlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_counter_counterlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_external_account`
--

DROP TABLE IF EXISTS `gw_collab_external_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_external_account` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `accessToken` varchar(255) DEFAULT NULL,
  `accountType` int(11) DEFAULT NULL,
  `tokenSecret` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK6AEBE55C2531E9C1` (`user_id`),
  KEY `FK6AEBE55CD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK6AEBE55C2531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FK6AEBE55CD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_external_account`
--

LOCK TABLES `gw_collab_external_account` WRITE;
/*!40000 ALTER TABLE `gw_collab_external_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_external_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_flag`
--

DROP TABLE IF EXISTS `gw_collab_flag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_flag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `flagDate` datetime DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `collablet_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK320AFFAF2531E9C1` (`user_id`),
  KEY `FK320AFFAFD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK320AFFAF2531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FK320AFFAFD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_flag`
--

LOCK TABLES `gw_collab_flag` WRITE;
/*!40000 ALTER TABLE `gw_collab_flag` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_flag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_friends`
--

DROP TABLE IF EXISTS `gw_collab_friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_friends` (
  `friends_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  KEY `FK989EBE722531E9C1` (`user_id`),
  KEY `FK989EBE7292520EA5` (`friends_id`),
  CONSTRAINT `FK989EBE722531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FK989EBE7292520EA5` FOREIGN KEY (`friends_id`) REFERENCES `gw_collab_friendship` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_friends`
--

LOCK TABLES `gw_collab_friends` WRITE;
/*!40000 ALTER TABLE `gw_collab_friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_friends_requests`
--

DROP TABLE IF EXISTS `gw_collab_friends_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_friends_requests` (
  `friends_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  KEY `FK759A57112531E9C1` (`user_id`),
  KEY `FK759A571192520EA5` (`friends_id`),
  CONSTRAINT `FK759A57112531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FK759A571192520EA5` FOREIGN KEY (`friends_id`) REFERENCES `gw_collab_friendship` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_friends_requests`
--

LOCK TABLES `gw_collab_friends_requests` WRITE;
/*!40000 ALTER TABLE `gw_collab_friends_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_friends_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_friendship`
--

DROP TABLE IF EXISTS `gw_collab_friendship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_friendship` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collablet_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK9135E7DD2531E9C1` (`user_id`),
  KEY `FK9135E7DDD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK9135E7DD2531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FK9135E7DDD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_friendship`
--

LOCK TABLES `gw_collab_friendship` WRITE;
/*!40000 ALTER TABLE `gw_collab_friendship` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_friendship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_georeference`
--

DROP TABLE IF EXISTS `gw_collab_georeference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_georeference` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKF79D883DD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKF79D883DD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_georeference`
--

LOCK TABLES `gw_collab_georeference` WRITE;
/*!40000 ALTER TABLE `gw_collab_georeference` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_georeference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_members_community`
--

DROP TABLE IF EXISTS `gw_collab_members_community`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_members_community` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collablet_id` bigint(20) DEFAULT NULL,
  `community_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK47460CC0D94CA3B9` (`community_id`),
  KEY `FK47460CC0D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK47460CC0D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`),
  CONSTRAINT `FK47460CC0D94CA3B9` FOREIGN KEY (`community_id`) REFERENCES `gw_collab_community` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_members_community`
--

LOCK TABLES `gw_collab_members_community` WRITE;
/*!40000 ALTER TABLE `gw_collab_members_community` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_members_community` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_members_requests`
--

DROP TABLE IF EXISTS `gw_collab_members_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_members_requests` (
  `community_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  KEY `FKABA40C0D2531E9C1` (`user_id`),
  KEY `FKABA40C0D5310A1A8` (`community_id`),
  CONSTRAINT `FKABA40C0D2531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKABA40C0D5310A1A8` FOREIGN KEY (`community_id`) REFERENCES `gw_collab_members_community` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_members_requests`
--

LOCK TABLES `gw_collab_members_requests` WRITE;
/*!40000 ALTER TABLE `gw_collab_members_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_members_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_profile`
--

DROP TABLE IF EXISTS `gw_collab_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `nativeLanguage` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `scholarity` varchar(255) DEFAULT NULL,
  `secondName` varchar(255) DEFAULT NULL,
  `stateOrProvince` varchar(255) DEFAULT NULL,
  `webPage` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKA9F1FE862531E9C1` (`user_id`),
  KEY `FKA9F1FE86D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKA9F1FE862531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKA9F1FE86D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_profile`
--

LOCK TABLES `gw_collab_profile` WRITE;
/*!40000 ALTER TABLE `gw_collab_profile` DISABLE KEYS */;
INSERT INTO `gw_collab_profile` VALUES (1,'Rua Townsville','10/01/90','Rio de Janeiro','Lorem','Brasil','Ninjutsu','male','Konoha','elfo','Chunnin','55883322','5 stars','enrolado','Chunnin Superior','Carvalho','Sao Paulo','soltahadouken@ryu.com',1,1),(2,'Rua asdasd','05/05/95','Sao Paulo','Lero','Brasil','NInja','masc','OI','eng','engenheiro','12342134','eng','solt','medio','Madalozzo','SP','pudim.com',2,2),(3,'Rua Ponta Pora','20/05/85','Sao Paulo','Rocket','Brasil','Laravel','male','Mackenzie','portugues','estudante','99887766','Desenvolvedor','solteiro','Ensino Medio','Silva','SP','rckt@science.com',3,3),(4,'Rua Lorem',NULL,'São Paulo',NULL,'Brasil',NULL,'male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Gonçalves','SP',NULL,NULL,4),(5,'Rua Ipsum',NULL,'São Paulo',NULL,'Brasil',NULL,'male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'da Silva','SP',NULL,NULL,5),(6,'Rua Ipsum',NULL,'São Paulo',NULL,'Brasil',NULL,'male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Moraes','SP',NULL,NULL,6),(7,'Rua Ipsum',NULL,'São Paulo',NULL,'Brasil',NULL,'male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Valente','SP',NULL,NULL,7),(8,'Rua Ipsum',NULL,'São Paulo',NULL,'Brasil',NULL,'male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Moreira','SP',NULL,NULL,8),(9,'Rua Moreia',NULL,'São Paulo',NULL,'Brasil',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Chang','SP',NULL,NULL,9);
/*!40000 ALTER TABLE `gw_collab_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_profile_profilefield`
--

DROP TABLE IF EXISTS `gw_collab_profile_profilefield`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_profile_profilefield` (
  `profiles_id` bigint(20) NOT NULL,
  `extensionFields_fieldName` varchar(255) NOT NULL,
  KEY `FKE1CAD20AD65D3C58` (`profiles_id`),
  KEY `FKE1CAD20AD74A9D0` (`extensionFields_fieldName`),
  CONSTRAINT `FKE1CAD20AD65D3C58` FOREIGN KEY (`profiles_id`) REFERENCES `gw_collab_profile` (`id`),
  CONSTRAINT `FKE1CAD20AD74A9D0` FOREIGN KEY (`extensionFields_fieldName`) REFERENCES `profilefield` (`fieldName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_profile_profilefield`
--

LOCK TABLES `gw_collab_profile_profilefield` WRITE;
/*!40000 ALTER TABLE `gw_collab_profile_profilefield` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_profile_profilefield` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_rating`
--

DROP TABLE IF EXISTS `gw_collab_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_rating` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rateDate` datetime DEFAULT NULL,
  `score` int(11) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `collablet_id` bigint(20) DEFAULT NULL,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKEF31AD20D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKEF31AD20D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_rating`
--

LOCK TABLES `gw_collab_rating` WRITE;
/*!40000 ALTER TABLE `gw_collab_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_role`
--

DROP TABLE IF EXISTS `gw_collab_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK321080B9D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK321080B9D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_role`
--

LOCK TABLES `gw_collab_role` WRITE;
/*!40000 ALTER TABLE `gw_collab_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_tag`
--

DROP TABLE IF EXISTS `gw_collab_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `count` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `collablet_id` (`collablet_id`,`name`),
  KEY `FK5C742AF7D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK5C742AF7D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_tag`
--

LOCK TABLES `gw_collab_tag` WRITE;
/*!40000 ALTER TABLE `gw_collab_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_tag_assignments`
--

DROP TABLE IF EXISTS `gw_collab_tag_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_tag_assignments` (
  `Tag_id` bigint(20) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pk` tinyblob,
  `idReferencedClass` bigint(20) DEFAULT NULL,
  KEY `FK948BC9DE64A88AFA` (`Tag_id`),
  CONSTRAINT `FK948BC9DE64A88AFA` FOREIGN KEY (`Tag_id`) REFERENCES `gw_collab_tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_tag_assignments`
--

LOCK TABLES `gw_collab_tag_assignments` WRITE;
/*!40000 ALTER TABLE `gw_collab_tag_assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_tag_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_user`
--

DROP TABLE IF EXISTS `gw_collab_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `creationDate` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `encryptedPassword` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photoURL` varchar(255) DEFAULT NULL,
  `statusToken` bit(1) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK3211EC0ED6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK3211EC0ED6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_user`
--

LOCK TABLES `gw_collab_user` WRITE;
/*!40000 ALTER TABLE `gw_collab_user` DISABLE KEYS */;
INSERT INTO `gw_collab_user` VALUES (1,'2014-09-23 07:23:46','goku@gmail.com','1234','goku','João',NULL,'\0',NULL,NULL,NULL,1),(2,'2014-09-17 10:24:25','kuririn@gmail.com','4321','kuririn','Mário',NULL,'\0',NULL,NULL,NULL,2),(3,NULL,'odeiokakaroto@gmail.com','$2y$10$xnL2sldEYuGyIN4ZBJUgcum.PCLRku92OvLMjaaM1zqW3zTwCyr0m','chico','Francisco',NULL,'\0',NULL,NULL,NULL,3),(4,NULL,'Ryu@gmail.com','$2y$10$RPqJ7NR3JmnxQSHASj32JuqRXebkFAGirGlMCXttVqDSd8q9L/n8O','ryu','Maria',NULL,'\0',NULL,NULL,NULL,4),(5,NULL,'ken@gmail.com','$2y$10$yEZHq7B8Dacuq3AxiK5aaecoV10TcHfcNtbKBlipHR0bpjuxP9DPu','ken','Fernanda',NULL,'\0',NULL,NULL,NULL,5),(6,NULL,'ken@gmail.com','$2y$10$JMScytMlSacWPA9pdOk4keu14dfQupkSjKIjwysg3IH/jc8.ob8ya','ken','Gustavo',NULL,'\0',NULL,NULL,NULL,NULL),(7,NULL,'ken@gmail.com','$2y$10$bxMNEw0Jr.JMDUjKndewreBe.05NyXDXHIORORqUx2NAAQOR9wxT2','ken','Henrique',NULL,'\0',NULL,NULL,NULL,NULL),(8,NULL,'ken@gmail.com','$2y$10$oKfDQMO.W26Ahtq9zaYgpeXyQv.WOlJcS58eS.AehIrGQNBUfc/Ti','ken','Francisco',NULL,'\0',NULL,NULL,NULL,NULL),(9,NULL,'ken@gmail.com','$2y$10$mQD.Jd27V9DMfEtiC9PoMOiQjPz51RvPGnx2Lzm5OdQNymoGMkLzO','ken','ken',NULL,'\0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `gw_collab_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_user_update`
--

DROP TABLE IF EXISTS `gw_collab_user_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_user_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `resourceUrl` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKD883963A2531E9C1` (`user_id`),
  KEY `FKD883963AD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FKD883963A2531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FKD883963AD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_user_update`
--

LOCK TABLES `gw_collab_user_update` WRITE;
/*!40000 ALTER TABLE `gw_collab_user_update` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_user_update` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_collab_users_roles`
--

DROP TABLE IF EXISTS `gw_collab_users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_collab_users_roles` (
  `gw_collab_User_id` bigint(20) NOT NULL,
  `roles_id` bigint(20) NOT NULL,
  PRIMARY KEY (`gw_collab_User_id`,`roles_id`),
  KEY `FKD516F0437E5CC6BE` (`gw_collab_User_id`),
  KEY `FKD516F0431DEA3C6F` (`roles_id`),
  CONSTRAINT `FKD516F0431DEA3C6F` FOREIGN KEY (`roles_id`) REFERENCES `gw_collab_role` (`id`),
  CONSTRAINT `FKD516F0437E5CC6BE` FOREIGN KEY (`gw_collab_User_id`) REFERENCES `gw_collab_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_collab_users_roles`
--

LOCK TABLES `gw_collab_users_roles` WRITE;
/*!40000 ALTER TABLE `gw_collab_users_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_collab_users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_coord_management_canvas`
--

DROP TABLE IF EXISTS `gw_coord_management_canvas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_coord_management_canvas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `canvasType` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_coord_management_canvas`
--

LOCK TABLES `gw_coord_management_canvas` WRITE;
/*!40000 ALTER TABLE `gw_coord_management_canvas` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_coord_management_canvas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_coord_management_canvas_gw_coord_management_graph`
--

DROP TABLE IF EXISTS `gw_coord_management_canvas_gw_coord_management_graph`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_coord_management_canvas_gw_coord_management_graph` (
  `gw_coord_management_canvas_id` bigint(20) NOT NULL,
  `graphInfo_id` bigint(20) NOT NULL,
  PRIMARY KEY (`gw_coord_management_canvas_id`,`graphInfo_id`),
  UNIQUE KEY `graphInfo_id` (`graphInfo_id`),
  KEY `FK6AF6B30774CAA64B` (`graphInfo_id`),
  KEY `FK6AF6B307C0CB9926` (`gw_coord_management_canvas_id`),
  CONSTRAINT `FK6AF6B30774CAA64B` FOREIGN KEY (`graphInfo_id`) REFERENCES `gw_coord_management_graph` (`id`),
  CONSTRAINT `FK6AF6B307C0CB9926` FOREIGN KEY (`gw_coord_management_canvas_id`) REFERENCES `gw_coord_management_canvas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_coord_management_canvas_gw_coord_management_graph`
--

LOCK TABLES `gw_coord_management_canvas_gw_coord_management_graph` WRITE;
/*!40000 ALTER TABLE `gw_coord_management_canvas_gw_coord_management_graph` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_coord_management_canvas_gw_coord_management_graph` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_coord_management_canvas_gw_coord_management_relation`
--

DROP TABLE IF EXISTS `gw_coord_management_canvas_gw_coord_management_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_coord_management_canvas_gw_coord_management_relation` (
  `gw_coord_management_canvas_id` bigint(20) NOT NULL,
  `relation_id` bigint(20) NOT NULL,
  PRIMARY KEY (`gw_coord_management_canvas_id`,`relation_id`),
  UNIQUE KEY `relation_id` (`relation_id`),
  KEY `FK53A081A3C7B6EC29` (`relation_id`),
  KEY `FK53A081A3C0CB9926` (`gw_coord_management_canvas_id`),
  CONSTRAINT `FK53A081A3C0CB9926` FOREIGN KEY (`gw_coord_management_canvas_id`) REFERENCES `gw_coord_management_canvas` (`id`),
  CONSTRAINT `FK53A081A3C7B6EC29` FOREIGN KEY (`relation_id`) REFERENCES `gw_coord_management_relation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_coord_management_canvas_gw_coord_management_relation`
--

LOCK TABLES `gw_coord_management_canvas_gw_coord_management_relation` WRITE;
/*!40000 ALTER TABLE `gw_coord_management_canvas_gw_coord_management_relation` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_coord_management_canvas_gw_coord_management_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_coord_management_extended_collablet`
--

DROP TABLE IF EXISTS `gw_coord_management_extended_collablet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_coord_management_extended_collablet` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bigIcon` varchar(255) DEFAULT NULL,
  `componentClassName` varchar(255) DEFAULT NULL,
  `componentTypeName` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `installed` bit(1) NOT NULL,
  `smallIcon` varchar(255) DEFAULT NULL,
  `dependencies_id` bigint(20) DEFAULT NULL,
  `subordinations_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKFE094BF23C28F8` (`dependencies_id`),
  KEY `FKFE094B433A471D` (`subordinations_id`),
  CONSTRAINT `FKFE094B433A471D` FOREIGN KEY (`subordinations_id`) REFERENCES `gw_coord_management_canvas` (`id`),
  CONSTRAINT `FKFE094BF23C28F8` FOREIGN KEY (`dependencies_id`) REFERENCES `gw_coord_management_canvas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_coord_management_extended_collablet`
--

LOCK TABLES `gw_coord_management_extended_collablet` WRITE;
/*!40000 ALTER TABLE `gw_coord_management_extended_collablet` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_coord_management_extended_collablet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_coord_management_graph`
--

DROP TABLE IF EXISTS `gw_coord_management_graph`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_coord_management_graph` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coordinateX` int(11) NOT NULL,
  `coordinateY` int(11) NOT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK35E6328BD6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK35E6328BD6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_coord_management_graph`
--

LOCK TABLES `gw_coord_management_graph` WRITE;
/*!40000 ALTER TABLE `gw_coord_management_graph` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_coord_management_graph` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_coord_management_relation`
--

DROP TABLE IF EXISTS `gw_coord_management_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_coord_management_relation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collabletFrom_id` bigint(20) DEFAULT NULL,
  `collabletTo_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK2848A39FD88C4354` (`collabletFrom_id`),
  KEY `FK2848A39FFB1ABB63` (`collabletTo_id`),
  CONSTRAINT `FK2848A39FD88C4354` FOREIGN KEY (`collabletFrom_id`) REFERENCES `collablet` (`id`),
  CONSTRAINT `FK2848A39FFB1ABB63` FOREIGN KEY (`collabletTo_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_coord_management_relation`
--

LOCK TABLES `gw_coord_management_relation` WRITE;
/*!40000 ALTER TABLE `gw_coord_management_relation` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_coord_management_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gw_security_permission`
--

DROP TABLE IF EXISTS `gw_security_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gw_security_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `actions` varchar(255) NOT NULL,
  `className` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `className` (`className`,`name`,`actions`,`role_id`),
  KEY `FK21433A7F7FD1C416` (`role_id`),
  CONSTRAINT `FK21433A7F7FD1C416` FOREIGN KEY (`role_id`) REFERENCES `gw_collab_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gw_security_permission`
--

LOCK TABLES `gw_security_permission` WRITE;
/*!40000 ALTER TABLE `gw_security_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `gw_security_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maincollablet`
--

DROP TABLE IF EXISTS `maincollablet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maincollablet` (
  `id` int(11) NOT NULL,
  `main_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK98918515893DC993` (`main_id`),
  CONSTRAINT `FK98918515893DC993` FOREIGN KEY (`main_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maincollablet`
--

LOCK TABLES `maincollablet` WRITE;
/*!40000 ALTER TABLE `maincollablet` DISABLE KEYS */;
/*!40000 ALTER TABLE `maincollablet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `aditionalImageComments` varchar(255) DEFAULT NULL,
  `allowCommercialUses` varchar(255) DEFAULT NULL,
  `allowModifications` varchar(255) DEFAULT NULL,
  `cataloguingTime` varchar(255) DEFAULT NULL,
  `characterization` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `collection` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `dataCriacao` varchar(255) DEFAULT NULL,
  `dataUpload` datetime DEFAULT NULL,
  `deleted` bit(1) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `imageAuthor` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `tombo` varchar(255) DEFAULT NULL,
  `workAuthor` varchar(255) DEFAULT NULL,
  `workdate` varchar(255) DEFAULT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK4984E12D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK4984E12D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (1,NULL,NULL,NULL,NULL,NULL,'Sao Paulo',NULL,'Brasil',NULL,NULL,'\0','Vista da Praca Ramos de Azevedo','SP','Silva, Fabio','Fabio','180_view.jpg','SP','Praca Ramos de Azevedo',NULL,NULL,'1911',NULL),(2,NULL,NULL,NULL,NULL,NULL,'Sao Paulo',NULL,'Brasil',NULL,NULL,'\0','Vista do Ibirapuera','SP','KAGAWA, Shinji','Shinji','2522_view.jpg','SP','Ibirapuera',NULL,NULL,'1920',NULL),(3,NULL,NULL,NULL,NULL,NULL,'Sao Paulo',NULL,'Brasil',NULL,NULL,'\0','Pacaembu','SP','HONDA, Keysuke','Keysuke','4579_view.jpg','SP','Pacaembu',NULL,NULL,'1910',NULL),(4,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3607_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2001',NULL),(5,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3608_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1993',NULL),(6,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3886_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1997',NULL),(7,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3888_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(8,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','4579_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1997',NULL),(9,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','4785_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1997',NULL),(10,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','4786_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(11,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','4791_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1997',NULL),(12,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','65_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(13,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','180_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1993',NULL),(14,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','730_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1920',NULL),(15,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','809_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(16,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','917_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,NULL,NULL),(17,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','924_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1987',NULL),(18,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','1246_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2013',NULL),(19,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','1267_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1989',NULL),(20,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','1369_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(21,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','2035_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1987',NULL),(22,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','2488_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1987',NULL),(23,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','2522_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1993',NULL),(24,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','2852_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1989',NULL),(25,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','2954_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(26,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3170_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1987',NULL),(27,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3345_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(28,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3452_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1993',NULL),(29,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3589_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1989',NULL),(30,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3600_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1989',NULL),(31,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3601_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'2012',NULL),(32,NULL,NULL,NULL,NULL,NULL,'São Paulo',NULL,'Brasil',NULL,NULL,'\0',NULL,'SP','Oksana Kuchar','Pinacoteca do Estado de São Paulo','3602_view.jpg','SP','Rua Lorem Ipsum',NULL,NULL,'1989',NULL);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_gw_collab_user`
--

DROP TABLE IF EXISTS `photo_gw_collab_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_gw_collab_user` (
  `Photo_id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  KEY `FK10C1E5DB1E22C264` (`users_id`),
  KEY `FK10C1E5DBF27F4989` (`Photo_id`),
  CONSTRAINT `FK10C1E5DB1E22C264` FOREIGN KEY (`users_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FK10C1E5DBF27F4989` FOREIGN KEY (`Photo_id`) REFERENCES `photo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_gw_collab_user`
--

LOCK TABLES `photo_gw_collab_user` WRITE;
/*!40000 ALTER TABLE `photo_gw_collab_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo_gw_collab_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profilefield`
--

DROP TABLE IF EXISTS `profilefield`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profilefield` (
  `fieldName` varchar(255) NOT NULL,
  PRIMARY KEY (`fieldName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profilefield`
--

LOCK TABLES `profilefield` WRITE;
/*!40000 ALTER TABLE `profilefield` DISABLE KEYS */;
/*!40000 ALTER TABLE `profilefield` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profilefieldvalue`
--

DROP TABLE IF EXISTS `profilefieldvalue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profilefieldvalue` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `field_fieldName` varchar(255) DEFAULT NULL,
  `profile_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK621F300F639F092` (`field_fieldName`),
  KEY `FK621F30089FF1239` (`profile_id`),
  CONSTRAINT `FK621F30089FF1239` FOREIGN KEY (`profile_id`) REFERENCES `gw_collab_profile` (`id`),
  CONSTRAINT `FK621F300F639F092` FOREIGN KEY (`field_fieldName`) REFERENCES `profilefield` (`fieldName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profilefieldvalue`
--

LOCK TABLES `profilefieldvalue` WRITE;
/*!40000 ALTER TABLE `profilefieldvalue` DISABLE KEYS */;
/*!40000 ALTER TABLE `profilefieldvalue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trackinginfo`
--

DROP TABLE IF EXISTS `trackinginfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trackinginfo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `accuracy` double NOT NULL,
  `dateUpdate` datetime DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `collablet_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK997C18252531E9C1` (`user_id`),
  KEY `FK997C1825D6F1EC3E` (`collablet_id`),
  CONSTRAINT `FK997C18252531E9C1` FOREIGN KEY (`user_id`) REFERENCES `gw_collab_user` (`id`),
  CONSTRAINT `FK997C1825D6F1EC3E` FOREIGN KEY (`collablet_id`) REFERENCES `collablet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackinginfo`
--

LOCK TABLES `trackinginfo` WRITE;
/*!40000 ALTER TABLE `trackinginfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `trackinginfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-30 14:23:57
