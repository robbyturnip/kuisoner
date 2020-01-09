-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: kuisoner
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `fasilitas`
--

DROP TABLE IF EXISTS `fasilitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fasilitas` (
  `id_fasilitas` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fasilitas`
--

LOCK TABLES `fasilitas` WRITE;
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
INSERT INTO `fasilitas` VALUES (3,'Kamar'),(4,'Kamar Mandi'),(5,'Aula'),(6,'Parkiran'),(7,'Dapur');
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kuisoner`
--

DROP TABLE IF EXISTS `kuisoner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kuisoner` (
  `id_kuisoner` bigint(20) NOT NULL,
  `id_penunjang_fasilitas` bigint(20) NOT NULL,
  `id_penilaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kuisoner`
--

LOCK TABLES `kuisoner` WRITE;
/*!40000 ALTER TABLE `kuisoner` DISABLE KEYS */;
/*!40000 ALTER TABLE `kuisoner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2020_01_01_011853_create_user_table',1),(2,'2020_01_05_080346_create_model_fasilitas_table',1),(3,'2020_01_05_081222_create_model_penunjangs_table',1),(4,'2020_01_05_081237_create_model_penilaians_table',1),(5,'2020_01_05_081252_create_model_kuisoners_table',1),(6,'2020_01_05_081310_create_model_penunjang__fasilitas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penilaian` (
  `kode_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penilaian` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian`
--

LOCK TABLES `penilaian` WRITE;
/*!40000 ALTER TABLE `penilaian` DISABLE KEYS */;
INSERT INTO `penilaian` VALUES ('SP','5','Sangat Puas',1),('P','4','Puas',2),('CP','3','Cukup Puas',3),('KP','2','Kurang Puas',4),('SKP','1','Sangat Kurang Puas',5);
/*!40000 ALTER TABLE `penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penunjang`
--

DROP TABLE IF EXISTS `penunjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penunjang` (
  `id_penunjang` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penunjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_penunjang`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penunjang`
--

LOCK TABLES `penunjang` WRITE;
/*!40000 ALTER TABLE `penunjang` DISABLE KEYS */;
INSERT INTO `penunjang` VALUES (6,'Luas'),(7,'Sirkulasi'),(8,'Kondisi bangunan (dinding, lantai dan plafon)'),(9,'Instalasi listrik (stopkontak dan lampu)'),(10,'Pintu dan jendela'),(11,'Closet'),(12,'Keran air'),(13,'Sirkulasi udara'),(14,'Paving block'),(15,'Gerbang'),(16,'Atap'),(17,'Daya tampung'),(18,'Wastafel'),(19,'Meja kompor'),(20,'Peralatan memasak (panci, wajan dll)'),(21,'Kompor');
/*!40000 ALTER TABLE `penunjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penunjang_fasilitas`
--

DROP TABLE IF EXISTS `penunjang_fasilitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penunjang_fasilitas` (
  `id_penunjang_fasilitas` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_fasilitas` bigint(20) NOT NULL,
  `id_penunjang` bigint(20) NOT NULL,
  PRIMARY KEY (`id_penunjang_fasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penunjang_fasilitas`
--

LOCK TABLES `penunjang_fasilitas` WRITE;
/*!40000 ALTER TABLE `penunjang_fasilitas` DISABLE KEYS */;
INSERT INTO `penunjang_fasilitas` VALUES (3,1,3),(5,3,6),(6,3,7),(7,3,8),(8,3,9),(9,3,10),(10,4,6),(11,4,11),(12,4,8),(13,4,12),(14,4,13),(15,5,6),(16,5,13),(17,5,8),(18,5,9),(19,5,10),(20,6,6),(21,6,14),(22,6,15),(23,6,16),(24,6,17),(25,7,18),(26,7,19),(27,7,20),(28,7,12),(29,7,21);
/*!40000 ALTER TABLE `penunjang_fasilitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'aristiawan','08dd2b5f22783d1c88eb0ca0c9e65356',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-10  6:26:41
