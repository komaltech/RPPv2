-- MySQL dump 10.13  Distrib 5.5.41, for Linux (x86_64)
--
-- Host: localhost    Database: sipla
-- ------------------------------------------------------
-- Server version	5.5.41

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
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departements` (
  `id_departement` int(11) NOT NULL AUTO_INCREMENT,
  `nama_departement` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_departement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departements`
--

LOCK TABLES `departements` WRITE;
/*!40000 ALTER TABLE `departements` DISABLE KEYS */;
INSERT INTO `departements` VALUES (1,'Keuangan','2014-11-14 08:00:00','2014-11-14 08:00:00'),(2,'Pendidikan & Kebudayaan','2014-11-14 08:00:00','2014-11-14 08:00:00'),(3,'Sekretariat daerah','2014-12-16 07:51:04','2014-12-16 07:51:04'),(4,'Bagian Keuangan dan Perlengkapan Sekretariat Daerah','2014-12-16 08:01:04','2014-12-16 08:01:04');
/*!40000 ALTER TABLE `departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detil_pengadaan`
--

DROP TABLE IF EXISTS `detil_pengadaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detil_pengadaan` (
  `id_detil` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengadaan` int(11) NOT NULL,
  `nama_brg` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spesifikasi` text COLLATE utf8_unicode_ci NOT NULL,
  `kebutuhan` int(11) NOT NULL,
  `hrg_satuan_hps` int(11) DEFAULT NULL,
  `total_hrg_hps` int(11) DEFAULT NULL,
  `hrg_satuan_rkn` int(11) DEFAULT NULL,
  `total_hrg_rkn` int(11) DEFAULT NULL,
  `hrg_satuan_deal` int(11) DEFAULT NULL,
  `total_hrg_deal` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_detil`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detil_pengadaan`
--

LOCK TABLES `detil_pengadaan` WRITE;
/*!40000 ALTER TABLE `detil_pengadaan` DISABLE KEYS */;
INSERT INTO `detil_pengadaan` VALUES (1,1,'Meja Kayu','<ul>\r\n<li>Tinggi : 2meter</li>\r\n</ul>',10,50000,500000,600000,6000000,400000,4000000,'2014-12-13 09:09:33','2014-12-13 11:02:28'),(2,2,'jasa kebersihan kantor','<p>Seluruh perkantoran sekretariat daerah</p>',10,1200000,12000000,1150000,11500000,1100000,11000000,'2014-12-13 12:43:32','2014-12-15 01:59:29'),(3,2,'jasa kebersihan halaman kantor','<p>kebersihan halaman parkir dan halaman lapangan apel</p>',10,5000000,50000000,5000000,50000000,5000000,50000000,'2014-12-15 02:50:10','2014-12-15 04:40:48'),(4,3,'Meja Kerja Eselon III','<ul>\r\n<li>Bahan : Kayu Jati</li>\r\n<li>Ukuran : 175x80xT.75 cm</li>\r\n<li>Finishing : Sped Melamin</li>\r\n</ul>',2,8000000,16000000,8000000,16000000,8000000,16000000,'2014-12-15 06:30:20','2014-12-16 08:55:02'),(5,3,'Meja Kerja Eselon IV','<ul>\r\n<li>BAHAN : KAYU JATI</li>\r\n<li>UKURAN : 160 X 70 X T. 75 cm</li>\r\n<li>FINISHING : SPED MELAMIN</li>\r\n</ul>',6,6500000,39000000,6500000,39000000,6500000,39000000,'2014-12-15 06:32:01','2014-12-16 08:55:10'),(6,3,'Meja Kerja Staf','<ul>\r\n<li>Bahan : Kayu Jati</li>\r\n<li>Ukuran : 120 x 60 x T. 75 cm</li>\r\n<li>Laci : 2 buah dan kunci</li>\r\n<li>Finishing : Sped Melamin</li>\r\n</ul>',9,2200000,19800000,2200000,19800000,2200000,19800000,'2014-12-15 06:34:09','2014-12-16 08:55:21'),(7,4,'Laptop','<ul>\r\n<li>Layar 17\"</li>\r\n<li>Processor Intel Core i7</li>\r\n<li>Memory 4 Gb</li>\r\n<li>Hardisk 600 Gb</li>\r\n<li>Wifi</li>\r\n<li>Bloetooth</li>\r\n<li>OS Windows 8 original</li>\r\n</ul>',10,12500000,125000000,12300000,123000000,12200000,122000000,'2014-12-15 06:52:00','2014-12-15 07:52:38'),(8,5,'tablet','<ul>\r\n<li>7 Inchi</li>\r\n<li>dualcore</li>\r\n<li>wifi</li>\r\n<li>bluetooth</li>\r\n</ul>',50,1000000,50000000,900000,45000000,850000,42500000,'2014-12-16 06:00:12','2014-12-16 06:08:59'),(9,6,'Kalender 2015','<ul>\r\n<li>ukuran 45 x 60 cm</li>\r\n<li>kertas 12 lbr AP 230 gr, full colour, 1 muka</li>\r\n<li>kertas 1 lbr HVS 70 gr, cetak 1 warna, 1 muka</li>\r\n<li>jilid spiral</li>\r\n</ul>',2500,58000,145000000,56000,140000000,55000,137500000,'2014-12-16 09:32:57','2014-12-16 09:52:41'),(10,7,'buku','<ul>\r\n<li>folio 70 gr</li>\r\n<li>isi 50 hal</li>\r\n</ul>',200,4000,800000,NULL,NULL,NULL,NULL,'2014-12-18 02:45:49','2014-12-18 02:45:49');
/*!40000 ALTER TABLE `detil_pengadaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwals`
--

DROP TABLE IF EXISTS `jadwals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwals` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_table` int(11) NOT NULL,
  `jenis_jadwal` varchar(10) DEFAULT NULL,
  `thp1_dari` date DEFAULT NULL,
  `thp1_smp` date DEFAULT NULL,
  `thp2_dari` date DEFAULT NULL,
  `thp2_smp` date DEFAULT NULL,
  `thp3_dari` date DEFAULT NULL,
  `thp3_smp` date DEFAULT NULL,
  `thp4_dari` date DEFAULT NULL,
  `thp4_smp` date DEFAULT NULL,
  `thp5_dari` date DEFAULT NULL,
  `thp5_smp` date DEFAULT NULL,
  `thp6_dari` date DEFAULT NULL,
  `thp6_smp` date DEFAULT NULL,
  `thp7_dari` date DEFAULT NULL,
  `thp7_smp` date DEFAULT NULL,
  `thp8_dari` date DEFAULT NULL,
  `thp8_smp` date DEFAULT NULL,
  `thp9_dari` date DEFAULT NULL,
  `thp9_smp` date DEFAULT NULL,
  `thp10_dari` date DEFAULT NULL,
  `thp10_smp` date DEFAULT NULL,
  `thp11_dari` date DEFAULT NULL,
  `thp11_smp` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwals`
--

LOCK TABLES `jadwals` WRITE;
/*!40000 ALTER TABLE `jadwals` DISABLE KEYS */;
INSERT INTO `jadwals` VALUES (1,1,'pengadaan','2014-12-13','2014-12-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-13','2014-12-13'),(2,1,'rekanan','2014-12-10','2014-12-09','2014-12-17','2014-12-23','2014-12-18','2014-12-09','2014-12-23','2014-12-26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-13','2014-12-13'),(3,2,'pengadaan','2014-12-13','2014-12-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-13','2014-12-13'),(4,2,'rekanan','2014-12-15','2014-12-18','2014-12-18','2014-12-31','2014-12-18','2014-12-31','2014-12-18','2014-12-31',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-15','2014-12-15'),(5,3,'pengadaan','2014-12-15','2014-12-15','2014-01-08','2014-01-09','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','1970-01-01','2014-12-15','2014-12-17'),(6,4,'pengadaan','2014-02-06','2014-02-06','2014-02-07','2014-02-07','2014-02-10','2014-02-12','2014-02-13','2014-02-13','2014-02-14','2014-02-14','2014-02-17','2014-02-17','2014-02-18','2014-02-18','2014-02-19','2014-02-19','2014-02-19','2014-02-19','2014-02-20','2014-02-20','2014-02-21','2014-02-21','2014-12-15','2014-12-15'),(7,4,'rekanan','2014-12-01','2014-12-02','2014-12-03','2014-12-10','2014-12-11','2014-12-15','2014-12-16','2014-12-16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-15','2014-12-15'),(8,5,'pengadaan','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-16','2014-12-21','2014-12-16','2014-12-31','2014-12-16','2014-12-17'),(9,5,'rekanan','2014-10-29','2014-12-01','2014-12-02','2014-12-04','2014-12-05','2014-12-01','2014-12-05','2014-12-05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-16','2014-12-16'),(10,3,'rekanan','2014-12-15','2014-12-18','2014-12-16','2014-12-31','2014-12-16','2014-12-31','2014-12-16','2014-12-31',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-16','2014-12-16'),(11,6,'pengadaan','2014-10-21','2014-10-21','2014-10-22','2014-10-22','2014-10-23','2014-10-27','2014-10-28','2014-10-28','2014-10-29','2014-10-29','2014-10-29','2014-10-29','2014-10-29','2014-10-29','2014-10-30','2014-10-30','2014-10-31','2014-10-31','2014-11-03','2014-11-03','2014-11-04','2014-12-03','2014-12-16','2014-12-16'),(12,6,'rekanan','2014-11-04','2014-11-08','2014-11-09','2014-12-02','2014-12-03','2014-12-03','2014-12-03','2014-12-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-16','2014-12-16'),(13,7,'pengadaan','2014-12-18','2014-12-18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-18','2014-12-18');
/*!40000 ALTER TABLE `jadwals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Pengadaan Barang','2014-11-14 03:55:34','2014-11-14 03:55:38'),(2,'Jasa Konsultasi Badan Usaha','2014-11-14 03:56:17','2014-11-14 03:56:20'),(3,'Jasa Konsultasi Perorangan','2014-11-14 03:56:39','2014-11-14 03:56:42'),(4,'Pekerjaan Konstruksi','2014-11-14 03:56:58','2014-11-14 03:57:00'),(5,'Jasa & Lainnya','2014-11-14 11:32:10','2014-11-14 19:32:10');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pajak`
--

DROP TABLE IF EXISTS `pajak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pajak` (
  `id_pajak` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan` int(11) DEFAULT NULL,
  `no_pajak` varchar(50) DEFAULT NULL,
  `jenis_pajak` varchar(100) DEFAULT NULL,
  `tgl_pajak` date DEFAULT NULL,
  `file_pajak` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pajak`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pajak`
--

LOCK TABLES `pajak` WRITE;
/*!40000 ALTER TABLE `pajak` DISABLE KEYS */;
INSERT INTO `pajak` VALUES (1,1,'23423423','pph 234234','2014-12-10','1_1.jpeg','2014-12-13 10:57:59','2014-12-13 10:57:59'),(2,1,'34523453245','ppn','2014-12-23','1_2.jpeg','2014-12-13 10:58:36','2014-12-13 10:58:36'),(3,2,'2566261','PPN','2014-10-21','2_3.jpeg','2014-12-15 01:52:44','2014-12-15 01:52:44'),(4,2,'35895212','PPH 21','2014-10-08','2_4.png','2014-12-15 01:58:13','2014-12-15 01:58:13'),(6,4,'35895212','PPN','2014-12-31','4_6.png','2014-12-15 07:46:15','2014-12-15 07:46:15'),(7,4,'2566261','PPH 21','2014-09-30','4_7.png','2014-12-15 07:46:46','2014-12-15 07:46:46'),(8,4,'365147895','PPH 23','2014-09-30','4_8.png','2014-12-15 07:47:33','2014-12-15 07:47:33'),(11,3,'365147895','PPN','2014-10-21','3_11.png','2014-12-16 08:47:13','2014-12-16 08:47:13'),(12,3,'2566261','PPH 21','2014-10-31','3_12.png','2014-12-16 08:47:43','2014-12-16 08:47:43'),(13,3,'35895212','PPH 23','2014-09-30','3_13.png','2014-12-16 08:47:59','2014-12-16 08:47:59'),(14,3,'65465161','PPH 21','2014-11-30','3_14.png','2014-12-16 08:48:41','2014-12-16 08:48:41'),(15,3,'2654679866865','PPH 21','2014-12-31','3_15.png','2014-12-16 08:49:22','2014-12-16 08:49:22'),(16,3,'365147895','PPN','2014-11-30','3_16.png','2014-12-16 08:50:06','2014-12-16 08:50:06'),(17,3,'35895212','PPN','2014-12-31','3_17.png','2014-12-16 08:50:26','2014-12-16 08:50:26'),(24,6,'S-01053504/PPN1111/WPJ.12/KP.0503/2014','PPN','2014-09-19','6_24.jpeg','2014-12-16 09:45:36','2014-12-16 09:45:36'),(25,6,'S-01053505/PPH2114/WPJ.12/KP.0503/2014','PPH21','2014-09-19','6_25.jpeg','2014-12-16 09:46:51','2014-12-16 09:46:52'),(26,6,'S-01061091/PPN1111/WPJ.12/KP.0503/2014','PPN','2014-10-29','6_26.jpeg','2014-12-16 09:48:20','2014-12-16 09:48:21'),(27,6,'S-01045863/PPN1111/WPJ.12/KP.0503/2014','PPN','2014-08-15',NULL,'2014-12-16 09:49:36','2014-12-16 09:49:36'),(28,6,'S-01045863/PPN1111/WPJ.12/KP.0503/2014','PPN','2014-08-15',NULL,'2014-12-16 09:49:56','2014-12-16 09:49:56'),(29,6,'S-01045863/PPN1111/WPJ.12/KP.0503/2014','PPN','2014-08-15',NULL,'2014-12-16 09:50:17','2014-12-16 09:50:17'),(30,6,'S-01045863/PPN1111/WPJ.12/KP.0503/2014','PPN','2014-08-15',NULL,'2014-12-16 09:50:44','2014-12-16 09:50:44'),(31,5,'365147895','PPN','2014-10-31','5_31.png','2014-12-17 00:33:57','2014-12-17 00:33:58'),(32,5,'2566261','PPN','2014-11-30','5_32.png','2014-12-17 00:34:26','2014-12-17 00:34:26'),(33,5,'35895212','PPN','2014-12-31','5_33.png','2014-12-17 00:34:37','2014-12-17 00:34:37'),(34,5,'2654679866865','PPH 21','2014-10-31','5_34.png','2014-12-17 00:34:58','2014-12-17 00:34:58'),(35,5,'3436534','PPH 21','2014-11-30','5_35.png','2014-12-17 00:35:11','2014-12-17 00:35:11'),(36,5,'45756757','PPH 21','2014-12-31','5_36.png','2014-12-17 00:35:34','2014-12-17 00:35:34'),(37,5,'4756787908','PPH 23','2014-10-31','5_37.png','2014-12-17 00:35:54','2014-12-17 00:35:54');
/*!40000 ALTER TABLE `pajak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile_phone` varchar(25) NOT NULL,
  `id_departement` varchar(25) DEFAULT NULL,
  `golongan` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('12312312312','guntur','madiun','1977-12-12','Laki-laki','Purwosari','234234234','2342342','2','III/a','guntur_ay@yahoo.com','2','12312312312.jpeg','2014-12-13 02:14:19','2014-12-15 06:44:53'),('23412341234121','Firman Hidayah','Malang','1970-01-01','Laki-laki','asdfasdf','05649926667','085649926667','1','III/a','radityaw@gmail.com','0',NULL,'2014-11-28 18:27:12','2014-12-13 02:05:08'),('23412341234123','IR. INDRA HERNANDI, M.SI','Pasuruan','1962-09-08','Laki-laki','Jl. apel raya c-21 perum bugul Pasuruan','426641','081249733616','2','IV/a','radityaw@gmail.com','1','23412341234123.jpeg','2014-12-11 07:27:48','2014-12-16 06:53:11');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengadaans`
--

DROP TABLE IF EXISTS `pengadaans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengadaans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rekanan` int(11) NOT NULL,
  `id_users` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_cat` int(11) NOT NULL,
  `no_srt_permintaan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `no_srt_tawar_rekanan` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sifat` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `desk_kegiatan` text COLLATE utf8_unicode_ci NOT NULL,
  `lokasi_kegiatan` text COLLATE utf8_unicode_ci NOT NULL,
  `alamat_pengerjaan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telp_lokasi_pengerjaan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sumber_dana` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pagu` int(11) NOT NULL,
  `hps` int(11) DEFAULT NULL,
  `hps_rkn` int(11) DEFAULT NULL,
  `hps_deal` int(11) DEFAULT NULL,
  `thn_anggaran` int(4) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `aksi` int(1) DEFAULT NULL,
  `no_srt1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt7` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt8` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt9` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt10` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt11` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt12` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt13` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt14` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_srt15` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengadaans`
--

LOCK TABLES `pengadaans` WRITE;
/*!40000 ALTER TABLE `pengadaans` DISABLE KEYS */;
INSERT INTO `pengadaans` VALUES (1,1,'23412341234123',1,'100/1123123.10001.1.1','','segera','Pengadaan Meja komputer','Dinas pendidikan','pasuruan','242342','asdfasdfas','APBN',234234,500000,6000000,4000000,2014,4,4,'10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','10001/10/2001','','0000-00-00 00:00:00','2014-12-15 06:03:15'),(2,2,'23412341234123',5,'027/009/424.022/2014','','penting','Pengadaan jasa kebersihan kantor sekretariat daerah','kantor sekretariat daerah kab. pasuruan','Jl. Hayam wuruk 14 pasuruan','0343431788','','APBD',150000000,62000000,61500000,61000000,2014,4,4,'','','','','','','','','','','','','','','','0000-00-00 00:00:00','2014-12-15 04:47:50'),(3,2,'23412341234123',1,'027/005/ 424.031/ 2014','','Segera','Pengadaan Meja Kerja dan Kursi Kerja Keperluan Bagian Keuangan dan Perlengkapan Setda. Kabupaten Pasuruan Tahun 2014','Bagian Keuangan dan Perlengkapan Sekretariat Daerah Kabupaten Pasuruan ','Jl. Hayam Wuruk No 14 Pasuruan','0343426501','','APBD',104870000,74800000,74800000,74800000,2014,4,4,'027/038/424.022/2014','027/828/424.022/2014','027/827-PP/424.022/2014','027/827-PP/424.022/2014','AL/PEN-29/X/2014','027/829-PP/424.022/2014','027/830-PP/424.022/2014','027/831-PP/424.022/2014','027/832-PP/424.022/2014','027/833-PP/424.022/2014','027/834-PP/424.022/2014','027/129/424.031/2014','027/130/424.031/2014','027/034/424.031/2014','950/1/HK/424.013/2014','0000-00-00 00:00:00','2014-12-17 12:50:32'),(4,2,'23412341234123',1,'027/005/ 424.031/ 2014','','Segera','Pengadaan Laptop Keperluan Bagian Keuangan dan Perlengkapan pada Sekretariat Daerah Kab. Pasuruan','Bagian Keuangan dan Perlengkapan Sekretariat Daerah Kabupaten Pasuruan','Jl. Hayam Wuruk 14 Pasuruan','0343426501','','APBD',135000000,125000000,123000000,122000000,2014,4,4,'027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','027/005/ 424.031/ 2014','0000-00-00 00:00:00','2014-12-17 07:07:13'),(5,2,'23412341234123',1,'027/005/ 424.031/ 2014','','Segera','pengadaan tablet','Bagian Keuangan dan Perlengkapan Sekretariat Daerah Kabupaten Pasuruan','hayam wuruk','0343426501','','APBD',50000000,50000000,45000000,42500000,2014,4,4,'01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','0000-00-00 00:00:00','2014-12-17 00:37:34'),(6,2,'23412341234123',5,'027/038/424.031/2014','','segera','Pengadaan Kalender Pemerintah Kabupaten Pasuruan Tahun 2015 Keperluan Bagian Keuangan dan Perlengkapan Setda Kab. Pasuruan tahun 2014','Bagian Keuangan & Perlengkapan Setda Kab. Pasuruan','Jl. Hayam Wuruk 14 Pasuuan','0343426641','','APBD',150000000,145000000,140000000,137500000,2014,4,4,'027/038/424.022/2014','027/828/424.022/2014','027/827-PP/424.022/2014','027/827-PP/424.022/2014','AL/PEN-29/X/2014','027/829-PP/424.022/2014','027/830-PP/424.022/2014','027/831-PP/424.022/2014','027/832-PP/424.022/2014','027/833-PP/424.022/2014','027/834-PP/424.022/2014','027/129/424.031/2014','027/130/424.031/2014','027/034/424.031/2014','950/1/HK/424.013/2014','0000-00-00 00:00:00','2014-12-17 05:31:23'),(7,0,'23412341234123',1,'0001','','segera','pengadaan buku','Bagian Keuangan & Perlengkapan Setda Kab. Pasuruan','jl hayam wuruk','0343426641','','APBD',1000000,800000,NULL,NULL,2014,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','2014-12-18 02:45:54');
/*!40000 ALTER TABLE `pengadaans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekanan_pengurus`
--

DROP TABLE IF EXISTS `rekanan_pengurus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekanan_pengurus` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `id_rekanan` int(11) DEFAULT NULL,
  `nama_pengurus` varchar(50) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `prosentase_shm` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekanan_pengurus`
--

LOCK TABLES `rekanan_pengurus` WRITE;
/*!40000 ALTER TABLE `rekanan_pengurus` DISABLE KEYS */;
INSERT INTO `rekanan_pengurus` VALUES (1,1,'Numan','2372983729','Direktur','nongko jajar','232342',80,'2014-12-13 10:43:58','2014-12-13 10:43:58'),(2,1,'Lutfi','23423423','Komanditer','Pasuruan','2342342',20,'2014-12-13 10:44:28','2014-12-13 10:44:28'),(3,2,'budi','32124566180006','Direktur','Purwosari','0343431788',75,'2014-12-15 07:36:46','2014-12-15 07:36:46');
/*!40000 ALTER TABLE `rekanan_pengurus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekanans`
--

DROP TABLE IF EXISTS `rekanans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekanans` (
  `id_rkn` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_rkn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_rkn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telp_rkn` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fax_rkn` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_phone_rkn` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status_rekanan` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `npwp_rkn` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email_rkn` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `ius_no` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ius_berlaku` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ius_instansi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_ius` date DEFAULT NULL,
  `deskripsi_rkn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_akte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_akte` date DEFAULT NULL,
  `notaris_akte` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_tdp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_tdp` date DEFAULT NULL,
  `masa_tdp` date DEFAULT NULL,
  `instansi_tdp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direktori` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_kop` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_tdp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_npwp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_akte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_siup` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_ktp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_rkt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_rkn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekanans`
--

LOCK TABLES `rekanans` WRITE;
/*!40000 ALTER TABLE `rekanans` DISABLE KEYS */;
INSERT INTO `rekanans` VALUES (1,'CV. WAHYU MULYA','Pandaan','234523452345','34234234','234523452345','Pusat','9234823423','radityaw@gmail.com','98798798789','sampai habi perusahaan','dinas perindustrian','2000-01-15','suplier barang','2423423423','2000-01-20','numa ,SH','324234324','2000-01-20','2000-01-20','dinas Perindustrian','1','1_kop.jpeg','1_akte.jpeg','1_tdp.jpeg','1_npwp.pdf','1_siup.jpeg','1_ktp.jpeg','1_skt.jpeg',1,'2014-12-13 02:24:05','2014-12-13 10:57:18'),(2,'CV. BUDI SENTOSA','Perum Purwosari Regency Martopuro Purwosari Pasuruan','0343431788','','082140024534','Pusat','1112352211','gunsgen@gmail.com','263661321345','2222222','Disnaker','1970-01-01','khusus ujicoba','5','2000-03-07','ludiro','54984654','2001-01-01','2020-01-01','Disperindag','2','2_kop.jpeg','2_akte.png','2_tdp.png','2_npwp.pdf','2_siup.png','2_ktp.jpeg','2_skt.jpeg',1,'2014-12-13 12:46:42','2014-12-15 01:51:54'),(3,'CV. RIA RIO','','0343426501',NULL,'081249733616',NULL,'','riaindriyani@ymail.com',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2014-12-16 06:59:52','2014-12-16 06:59:52'),(4,'CV. DHIMASCOM','','03437797228',NULL,'082140024534',NULL,'','guntur_ay@yahoo.com',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2014-12-23 03:33:56','2014-12-23 03:33:56');
/*!40000 ALTER TABLE `rekanans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `protokol` varchar(10) DEFAULT NULL,
  `email_sender` varchar(100) DEFAULT NULL,
  `port` varchar(5) DEFAULT NULL,
  `host` varchar(20) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `pass_email` varchar(50) DEFAULT NULL,
  `enkripsi` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'smtp','gunsgen@gmail.com','465','smtp.gmail.com','gunsgen','muhammadiyah','ssl','2014-11-20 03:18:33','2014-12-16 02:05:35');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_users` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `get_pass` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_users` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'23412341234123','komitmen','$2y$10$Zmad5T8qOyoCNUwqffEd7epcRR0n.zoGScstEi4kpa3mhSu3xrIN2',NULL,'1','CbyIKaTDbhmtUMYzQXHX2hEOoSNdwA0lRhmRht1iff7qM8PoqSYrjfkLPjBV','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'23412341234121','admin','$2y$10$wSuIVmG1s4lrIeO7IfFoweCRmN822OTc.MTaYNCM9PF4XcDpTeI0u',NULL,'0','8hyjVMGACZWjGVnSejWuUJi3E8CrV3a0Wp2YWB5KqMBFvVGodwLdJ9tfW50t','2014-11-20 13:45:53','2014-11-20 13:45:53'),(4,'12312312312','pengadaan','$2y$10$DGesMMSWaIAmkQYYZxshPek.1UuAXLQf7oxy00NZLTgHdD5pbuK1K',NULL,'2','n60R5istrCqnfaA9oeDq2okCKrK6gNNUZQMKfPtWX6a4qzls4uRUYidGYENU','2014-12-13 02:14:19','2014-12-13 02:14:19'),(5,'1','radityaw@gmail.com','$2y$10$cOXatYDnbJ8Avt/E0y/FeuzRjZ7LZ177BLrw3FYhgL4KlIwc/NzvS','q9zMhT','3','fTQAw5xHqX5iWddLaeIjf4zoGlVwwf8cO81UvX8kzWUXz9ttjCNuTlQcjkj4','2014-12-13 10:42:14','2014-12-13 10:42:14'),(6,'2','gunsgen@gmail.com','$2y$10$OgGoqYXWA1DDWge2u.Zi0eU88hvNhdyrhYbLA1YSqUtGaRK9V1Zyu','tasdTD','3','dMn1iuk7HUHxnss6it1jYru2joT7haI3Nsspm0TwKhbgu8iL6nbMZqfsmd23','2014-12-13 12:47:36','2014-12-13 12:47:36');
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

-- Dump completed on 2015-09-21  9:00:01
