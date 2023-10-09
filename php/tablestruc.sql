--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `memID` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `memFirst` varchar(50) NOT NULL,
  `memLast` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `streetName` varchar(100) DEFAULT NULL,
  `suburb` varchar(30) DEFAULT NULL,
  `state` char(3) DEFAULT NULL,
  `postcode` char(4) DEFAULT NULL,
  `dob` datetime NOT NULL,
  `memIcon` varchar(100) DEFAULT NULL COMMENT 'contains reference link to s3 object',
  PRIMARY KEY (`memID`),
  UNIQUE KEY `memID_UNIQUE` (`memID`)
);

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `pdID` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `pdName` varchar(20) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`pdID`),
  UNIQUE KEY `pdID_UNIQUE` (`pdID`)
);

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `inID` INT(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `pdID` int(5) unsigned zerofill NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `expDate` datetime NOT NULL,
  `count` int unsigned NOT NULL,
  PRIMARY KEY (`inID`),
  UNIQUE KEY `inID_UNIQUE` (`inID`),
  KEY `FK_pdID_inventory` (`pdID`)
  );

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `saleID` INT(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `memID` int(5) unsigned zerofill NOT NULL,
  `pdID` int(5) unsigned zerofill NOT NULL,
  `saleDate` datetime NOT NULL,
  `salePrice` decimal(10,2) unsigned NOT NULL,
  `quantity` int unsigned NOT NULL,
  PRIMARY KEY (`saleID`),
  UNIQUE KEY `saleID_UNIQUUE` (`saleID`)
);
