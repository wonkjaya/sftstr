-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dev_softwarestore
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `log_type`
--

DROP TABLE IF EXISTS `log_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) NOT NULL,
  `nama_type` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_type`
--

LOCK TABLES `log_type` WRITE;
/*!40000 ALTER TABLE `log_type` DISABLE KEYS */;
INSERT INTO `log_type` VALUES (1,'100','aktivitas'),(2,'200','login');
/*!40000 ALTER TABLE `log_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `id_kode_type` int(11) NOT NULL COMMENT 'mengambil di log_type',
  `id_user` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(200) NOT NULL,
  `status` int(3) NOT NULL COMMENT '100:error;111:sukses',
  `keterangan` tinytext NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_kode_type` (`id_kode_type`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_kode_type`) REFERENCES `log_type` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `meta_name` varchar(50) NOT NULL,
  `meta_tag` varchar(100) NOT NULL,
  `meta_description` varchar(160) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
INSERT INTO `metas` VALUES (2,'meta-1','tag-1','description-1'),(3,'meta-2','tag-2','description-2');
/*!40000 ALTER TABLE `metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_pelanggan`
--

DROP TABLE IF EXISTS `pengajuan_pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengajuan_pelanggan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_telpon` varchar(16) NOT NULL,
  `keluhan` text NOT NULL COMMENT 'bentuk json',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_pelanggan`
--

LOCK TABLES `pengajuan_pelanggan` WRITE;
/*!40000 ALTER TABLE `pengajuan_pelanggan` DISABLE KEYS */;
INSERT INTO `pengajuan_pelanggan` VALUES (1,'Masukkan No. Tel','{\"domain\":\"Cari nama Domain\",\"deskripsi\":\"Tulis Deskripsi\"}',0),(2,'Masukkan No. Tel','{\"domain\":\"Cari nama Domain\",\"deskripsi\":\"Tulis Deskripsi\"}',0);
/*!40000 ALTER TABLE `pengajuan_pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_data`
--

DROP TABLE IF EXISTS `produk_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `kode_produk` char(10) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `id_meta` int(11) NOT NULL,
  `nama_produk` char(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL,
  `id_kode_gambar` int(11) NOT NULL,
  `url_demo` tinytext NOT NULL,
  `id_deskripsi` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `kode_product` (`kode_produk`),
  UNIQUE KEY `kode_gambar` (`id_kode_gambar`),
  UNIQUE KEY `kode_gambar_2` (`id_kode_gambar`),
  UNIQUE KEY `kode_gambar_3` (`id_kode_gambar`),
  UNIQUE KEY `kode_gambar_4` (`id_kode_gambar`),
  UNIQUE KEY `slug` (`slug`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_kategori_2` (`id_kategori`),
  KEY `id_user` (`id_user`),
  KEY `id_meta` (`id_meta`),
  KEY `id_deskripsi` (`id_deskripsi`),
  CONSTRAINT `produk_data_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `produk_data_ibfk_5` FOREIGN KEY (`id_meta`) REFERENCES `metas` (`ID`) ON DELETE NO ACTION,
  CONSTRAINT `produk_data_ibfk_6` FOREIGN KEY (`id_kategori`) REFERENCES `produk_kategori` (`ID`),
  CONSTRAINT `produk_data_ibfk_7` FOREIGN KEY (`id_kode_gambar`) REFERENCES `produk_gambar` (`ID`),
  CONSTRAINT `produk_data_ibfk_8` FOREIGN KEY (`id_deskripsi`) REFERENCES `produk_deskripsi` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_data`
--

LOCK TABLES `produk_data` WRITE;
/*!40000 ALTER TABLE `produk_data` DISABLE KEYS */;
INSERT INTO `produk_data` VALUES (1,2,'K-111','slug-produk-pertama',2,'Produk Pertama',1,60000,70000,2,1,'http://localhost/DEV/softwarestore/dashboard',1);
/*!40000 ALTER TABLE `produk_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_deskripsi`
--

DROP TABLE IF EXISTS `produk_deskripsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_deskripsi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi_produk` text NOT NULL,
  `deskripsi_developer` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_deskripsi`
--

LOCK TABLES `produk_deskripsi` WRITE;
/*!40000 ALTER TABLE `produk_deskripsi` DISABLE KEYS */;
INSERT INTO `produk_deskripsi` VALUES (1,'software ini adalah sebuah software yang digunakan untuk proses kerja dari akunting dengan menggunakan sister berbasis website sehingga tidak memerlukan spesifikasi software ataupun perangkat dengan spesifik','s',1),(2,'w','e',1);
/*!40000 ALTER TABLE `produk_deskripsi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_gambar`
--

DROP TABLE IF EXISTS `produk_gambar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_gambar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `image1` tinytext NOT NULL,
  `image2` tinytext NOT NULL,
  `image3` tinytext NOT NULL,
  `image4` tinytext NOT NULL,
  `image5` tinytext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_gambar`
--

LOCK TABLES `produk_gambar` WRITE;
/*!40000 ALTER TABLE `produk_gambar` DISABLE KEYS */;
INSERT INTO `produk_gambar` VALUES (1,'','','','',''),(3,'','','','','');
/*!40000 ALTER TABLE `produk_gambar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_kategori`
--

DROP TABLE IF EXISTS `produk_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_kategori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_kategori`
--

LOCK TABLES `produk_kategori` WRITE;
/*!40000 ALTER TABLE `produk_kategori` DISABLE KEYS */;
INSERT INTO `produk_kategori` VALUES (1,'Akuntansi',1),(2,'Pajak',1),(3,'Perkantoran',1),(4,'Gudang',1),(5,'Logistik',1),(6,'Penjualan',1);
/*!40000 ALTER TABLE `produk_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_detail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ktp` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL COMMENT 'L/P',
  `nomor_telp` varchar(14) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `id_user` (`id_user`,`id_ktp`),
  CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_detail`
--

LOCK TABLES `user_detail` WRITE;
/*!40000 ALTER TABLE `user_detail` DISABLE KEYS */;
INSERT INTO `user_detail` VALUES (2,2,'879879757646563','admin','jalan simpang sulfat utara','1','089776554330'),(3,3,'120002333421123','akhmad abdul rohman','jalan ikan gurami perum litle kyoto blok C1','1','089766544366');
/*!40000 ALTER TABLE `user_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL COMMENT '* tidak boleh ada yang sama',
  `user_pass` varchar(200) NOT NULL,
  `user_level` varchar(3) NOT NULL DEFAULT '10' COMMENT '00:admin;01:developer;03:staf-editor;10:user;',
  `user_registered_date` datetime NOT NULL,
  `user_activation_key` varchar(200) NOT NULL COMMENT 'bentuk MD5',
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:nonaktif;1:aktif;2:banned',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin@admin.com','21232f297a57a5a743894a0e4a801fc3','00','2015-09-22 00:00:00','',1),(3,'rohmanmail@gmail.com','ae904550432a4be80ac0606f4e808d18','00','2016-04-02 20:12:49','',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-26 17:23:13
