-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_cafe_bintang
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kategori_bintang`
--

DROP TABLE IF EXISTS `kategori_bintang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_bintang` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_bintang`
--

LOCK TABLES `kategori_bintang` WRITE;
/*!40000 ALTER TABLE `kategori_bintang` DISABLE KEYS */;
INSERT INTO `kategori_bintang` VALUES (2,'Minuman'),(3,'Makanan'),(4,'Snack');
/*!40000 ALTER TABLE `kategori_bintang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_bintang`
--

DROP TABLE IF EXISTS `menu_bintang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_bintang` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) DEFAULT NULL,
  `harga_menu` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `foto_menu` varchar(100) DEFAULT NULL,
  `status_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_bintang`
--

LOCK TABLES `menu_bintang` WRITE;
/*!40000 ALTER TABLE `menu_bintang` DISABLE KEYS */;
INSERT INTO `menu_bintang` VALUES (7,'Katsu_Ramen',27000,3,'Capture.PNG','Tersedia'),(8,'Curry_Beef_Udon',36000,3,'Capture.PNG','Tersedia'),(9,'Hiyashi_Chuka',25000,3,'Capture.PNG','Tidak Tersedia'),(10,'Gyoza',5000,4,'Capture_4.PNG','Tersedia'),(11,'Karaage',10000,4,'Capture_4.PNG','Tidak Tersedia'),(12,'Tri_Color_Dango',5000,4,'Capture_4.PNG','Tersedia'),(13,'Sea_Salt_Matcha',18000,2,'Capture_2.PNG','Tersedia'),(14,'Japanese_Iced_Coffee',18000,2,'Capture_2.PNG','Tersedia'),(15,'Chocolatte',15000,2,'Capture_2.PNG','Tersedia');
/*!40000 ALTER TABLE `menu_bintang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan_bintang`
--

DROP TABLE IF EXISTS `pelanggan_bintang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan_bintang` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `jenis_pelanggan` enum('Gold','Silver','Bronze') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan_bintang`
--

LOCK TABLES `pelanggan_bintang` WRITE;
/*!40000 ALTER TABLE `pelanggan_bintang` DISABLE KEYS */;
INSERT INTO `pelanggan_bintang` VALUES (1,'Pardofelis','Aurum Alley','0821212121','Perempuan','Aurum Alley','Silver','2023-11-15'),(6,'Hua','Mount Taixuan','082113131313','Perempuan','Shenzou','Bronze','2023-11-09'),(7,'Eden','The MOTH','0822808080','Perempuan','Unknown','Gold','2023-11-28'),(8,'Su','Sumeru Tree','0822707700','Laki-laki','Unknown','Silver','2023-11-07');
/*!40000 ALTER TABLE `pelanggan_bintang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_bintang`
--

DROP TABLE IF EXISTS `role_bintang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_bintang` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_bintang`
--

LOCK TABLES `role_bintang` WRITE;
/*!40000 ALTER TABLE `role_bintang` DISABLE KEYS */;
INSERT INTO `role_bintang` VALUES (1,'Admin'),(2,'Manager'),(3,'Kasir');
/*!40000 ALTER TABLE `role_bintang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_bintang`
--

DROP TABLE IF EXISTS `user_bintang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_bintang` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `nama_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_bintang`
--

LOCK TABLES `user_bintang` WRITE;
/*!40000 ALTER TABLE `user_bintang` DISABLE KEYS */;
INSERT INTO `user_bintang` VALUES (1,1,'Kevin','$2y$10$sD4Bjb/tLztvGtRL6cliGuI3v0HRkgvFuEaFhdXLMzuSUtt9k6WiG','Kevin Kaslana','Admin'),(2,1,'Elysiaa~','$2y$10$ZSTzmDGibS7/GWd4GrRU/.3zLhfF.HMUFCtAYePynFaUwx7EHeQMK','Elysia','Manager'),(3,3,'Griseo','$2y$10$bfHDCHWAzpwkBUt0k0Ih7uoQWX0h2wton9lt95rOacwjT35Wt2xxW','Griseo','Kasir'),(17,NULL,'Silverwing: N-EX','$2y$10$2oD/e6Js.XB0FRwK7tWy6ON4QPxrBlqjaJzMhTx7GyDTYgovkj3s6','Bronya','Manager'),(18,NULL,'Seele','$2y$10$kkZt.1zPTZ9xr6RAIMg7x.tuXFYi0sGpmZAEtV0AXmYacMl.U.zsi','Seele','Kasir');
/*!40000 ALTER TABLE `user_bintang` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-06 11:08:53
