--
-- Table structure for table `contact`
--
CREATE DATABASE annuaire DEFAULT CHARSET=utf8;
use annuaire;

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `idContact` int(4) NOT NULL auto_increment,
  `nomContact` varchar(50),
  `telContact` varchar(10),
  `mailContact` varchar(40),
  `cpContact` varchar(5),
  `villeContact` varchar(20),
   PRIMARY KEY  (`idContact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
--  data for table `contact`
--
INSERT INTO `contact`
VALUES 
(1,'Cuset Jean','0651208586', 'j.cuset@gmail.com','69000','LYON'),
(2,'Dian Charles','0645414243','charleDian@laposte.net','38000','GRENOBLE'),
(3,'Paco Alain','0475123020','','69000','LYON'),
(4,'Perez Amanda','0696857412','amPrez@gmail.com','38000','GRENOBLE'),
(5,'Jeanu Elisa','0312589652','elisaJeanu@yahoo.fr','38200','VIENNE')
;


