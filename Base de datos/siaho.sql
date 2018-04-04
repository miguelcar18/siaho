DROP DATABASE `siaho`;
CREATE DATABASE  IF NOT EXISTS `siaho` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `siaho`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: siaho
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `trabajador` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_trabajador_foreign` (`trabajador`),
  CONSTRAINT `cursos_trabajador_foreign` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delegados`
--

DROP TABLE IF EXISTS `delegados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delegados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trabajador` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delegados_trabajador_foreign` (`trabajador`),
  CONSTRAINT `delegados_trabajador_foreign` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delegados`
--

LOCK TABLES `delegados` WRITE;
/*!40000 ALTER TABLE `delegados` DISABLE KEYS */;
/*!40000 ALTER TABLE `delegados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formaciones`
--

DROP TABLE IF EXISTS `formaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `trabajador` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formaciones_trabajador_foreign` (`trabajador`),
  CONSTRAINT `formaciones_trabajador_foreign` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formaciones`
--

LOCK TABLES `formaciones` WRITE;
/*!40000 ALTER TABLE `formaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `formaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspecciones`
--

DROP TABLE IF EXISTS `inspecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inspecciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sede` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realizado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones`
--

LOCK TABLES `inspecciones` WRITE;
/*!40000 ALTER TABLE `inspecciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `inspecciones` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (23,'2014_10_12_000000_create_users_table',1),(24,'2014_10_12_100000_create_password_resets_table',1),(25,'2018_01_31_045320_create_trabajadors_table',1),(26,'2018_02_01_091656_create_cursos_table',1),(27,'2018_02_01_091818_create_delegados_table',1),(28,'2018_02_01_091839_create_politicas_table',1),(29,'2018_02_01_091920_create_inspeccions_table',1),(30,'2018_02_01_092131_create_notificacions_table',1),(31,'2018_03_10_233729_create_formacions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `lugar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `trabajador` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notificaciones_trabajador_foreign` (`trabajador`),
  CONSTRAINT `notificaciones_trabajador_foreign` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `politicas`
--

DROP TABLE IF EXISTS `politicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `politicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `trabajador` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `politicas_trabajador_foreign` (`trabajador`),
  CONSTRAINT `politicas_trabajador_foreign` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `politicas`
--

LOCK TABLES `politicas` WRITE;
/*!40000 ALTER TABLE `politicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `politicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trabajadores_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
INSERT INTO `trabajadores` VALUES (1,'EMIRVIS DEL VALLE','BAEZA R','14487829','COORDINADOR DE EXTENSION ( E )','Coordinación de Extensión','2018-03-11 10:03:59','2018-03-11 10:03:59'),(2,'DALIANNY','POLANCO ','25355344','SECRETARIA','Coordinación de Extensión','2018-03-11 10:03:59','2018-03-11 10:03:59'),(3,'CARLOS ENRIQUE','MEZA','16174185','JEFE DEL DPTO. DE PASANTIAS','Coordinación de Extensión','2018-03-11 10:03:00','2018-03-11 10:03:00'),(4,'ROXY','GARCIA','10742811','GERENTE DE FINANZAS DIR NAL','Dirección Nacional','2018-03-11 10:03:00','2018-03-11 10:03:00'),(5,'PEDRO','BRICEÑO','3524288','DIRECTOR EJECUTIVO NACIONAL','Dirección Nacional','2018-03-11 10:03:00','2018-03-11 10:03:00'),(6,'LUISA','SALAZAR','12791806','JEFE DE DIV. DE PERSONAL','Personal','2018-03-11 10:03:00','2018-03-11 10:03:00'),(7,'ANAHERMIS','PALOMO','20139014','SECRETARIA','Personal','2018-03-11 10:03:00','2018-03-11 10:03:00'),(8,'JESSICA','MOTA','19092297','JEFE DE AREA HIGIENE Y SEGURIDAD','Personal','2018-03-11 10:03:00','2018-03-11 10:03:00'),(9,'MARIELYS DEL VALLE','RUIZ NADALES','16174142','JEFE DE DIV. DE ADMINISTRACION','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(10,'CRISBEL','COVA','17590760','JEFE DE COMPRAS','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(11,'MARIANNY','GUEVARA','14423654','SECRETARIA','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(12,'YICETH MARIA','RIVERO','17404920','AUXILIAR (PROVEDURIA)','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(13,'PATRICIA','MAITA','11335938','AUXILIAR (PROVEDURIA)','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(14,'NORELYS','BUTTO','8435200','AUXILIAR (PROVEDURIA)','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(15,'OMAR','VALERA','17935264','SOPORTE TECNICO','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(16,'HELY','VASQUEZ','18651622','MENSAJERO','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(17,'JESUS','ALFARO','8373546','CHOFER','Administración','2018-03-11 10:03:00','2018-03-11 10:03:00'),(18,'YENNI COROMOTO','MILLAN RAUSEO','13915635','JEFE DE DPTO.CONTABILIDAD','Contabilidad','2018-03-11 10:03:00','2018-03-11 10:03:00'),(19,'EILYNN','QUISPE','17092577','SECRETARIA','Contabilidad','2018-03-11 10:03:00','2018-03-11 10:03:00'),(20,'ANGIE','GUEVARA','17529219','CAJERO (A)','Contabilidad','2018-03-11 10:03:01','2018-03-11 10:03:01'),(21,'GUSTAVO','TOVAR ','23897719','CAJERO (A)','Contabilidad','2018-03-11 10:03:01','2018-03-11 10:03:01'),(22,'RUAL','RUIZ','13056624','CAJERO (A)','Contabilidad','2018-03-11 10:03:01','2018-03-11 10:03:01'),(23,'NILYAN','TORCAT','17623411','CAJERO (A)','Contabilidad','2018-03-11 10:03:01','2018-03-11 10:03:01'),(24,'OSCAR RICARDO','RAMIREZ','13250004','JEFE DE AREA SEVICIOS GENERALES','Servicios Generales','2018-03-11 10:03:01','2018-03-11 10:03:01'),(25,'FRANKLIN ANTONIO','CORTEZ FIGUEROA','11377105','VIGILANTE','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(26,'DAVID JOSE','ZAPATA FUENTES','5399556','VIGILANTE','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(27,'JUAN','ROCCA','10309909','VIGILANTE','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(28,'MAURICIO','GONZALEZ','14619818','VIGILANTE','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(29,'MIRIAN','MARVAL','5391169','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(30,'DANNY','MUDARRA','10830425','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(31,'CRUZ JOSE','GONZALEZ LOPEZ','17721026','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(32,'GLADYS DEL VALLE','MARCANO','8950807','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(33,'BELKIS JOSEFINA','MENDOZA DE ACEVEDO','9281680','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(34,'NEICI DEL VALLE','GUZMAN','9284972','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(35,'OLGA MARIA','ROJAS','6341001','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(36,'ADELAIDA','BARCENAS','8378322','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:01','2018-03-11 10:03:01'),(37,'GERONIMA MILAGROS','SUBERO','13998670','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(38,'DORIS','ANDRADE','4623583','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(39,'ALEXIS','BENAVIDEZ','12151334','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(40,'JUDITH','GRANADILLO','14253291','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(41,'ODALIS COROMOTO','CARRION','8379256','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(42,'LUISA ELENA','RIVAS','15116925','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(43,'CARLOS ALFREDO','RODRIGUEZ','20002987','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(44,'IRAIMA','PALMA','16175642','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(45,'YONNY','HERNANDEZ','16809424','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(46,'HILDA','RIOS','6487749','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(47,'JOSE ','ARIAS','20248764','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(48,'MIRAIDA','ECHEVERRIA','15279981','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(49,'YIRBIN','ROJAS','20917545','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(50,'PEDRO','RONDON','15030226','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(51,'ADALGIZA','MENDOZA','18600189','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(52,'JOSE LUIS','ROMERO','13940961','PERSONAL DE  MANTENIMIENTO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(53,'LINDOLFO','SAVEDRA','8136794','JEFE DE ESC. ING. CIVIL','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(54,'MIRIAM','SALAS','592313','JEFE DE ESC. DE ARQUITECTURA','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(55,'JESUS','COA','11774062','JEFE DE ESC.ING.MANT.MECANICO','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(56,'RIGOBERTO','RODRIGUEZ','5073644','JEFE ESC.ING.ELECTRONICA Y ELECTRICA','Sección de Vigilancia','2018-03-11 10:03:02','2018-03-11 10:03:02'),(57,'MARIANN ','MARTINEZ','13994708','JEFE DE ESC.ING.DE SISTEMAS','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(58,'LIRIANNIS','GOMEZ','20420081','COORDINADORA DE CICLO BASICO','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(59,'JOSE','BLANCO','16311428','COORDINADOR DE SAIA','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(60,'MARIA ALEJANDRA','FLORES ASENSO','12537343','SECRETARIA ','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(61,'AURAMARINA','LOPEZ','24344471','SECRETARIA','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(62,'ROSMARY','MARCANO RODULFO','15576755','SECRETARIA ','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(63,'MARIANNYS','GOMEZ','22974551','SECRETARIA ','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(64,'MANUEL','MAGO','13250974','ENCARGADO DE LAB','Sección de Vigilancia','2018-03-11 10:03:03','2018-03-11 10:03:03'),(65,'MAXS','RUETTE','4776619','COORDINADOR CADETEC','Cadetec','2018-03-11 10:03:03','2018-03-11 10:03:03'),(66,'MERALBYS JACKELINE','CARMONA COA','19781834','SECRETARIO','Cadetec','2018-03-11 10:03:03','2018-03-11 10:03:03'),(67,'RAUL JOSE','BETANCOURT RODRIGUEZ','20645567','SECRETARIA','Cadetec','2018-03-11 10:03:03','2018-03-11 10:03:03'),(68,'PEDRO','LOPEZ','25282162','SECRETARIO','Cadetec','2018-03-11 10:03:03','2018-03-11 10:03:03'),(69,'ROSANNI','SALAZAR','19077966','JEFE DPTO.PASANTIAS ','Calidad','2018-03-11 10:03:03','2018-03-11 10:03:03'),(70,'LEVYS','FIGUEROA','4025556','JEFE DPTO.DE TECNOLOGIA EDUCATIVA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(71,'RUDIS DEL VALLE','AGUILERA','12538357','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(72,'LISY DEL VALLE','ALCALA GARCIA','13249112','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(73,'ELIZABETH','NORIEGA','4046434','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(74,'DELIA','ROMERO','9289983','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(75,'NELLYA M','CEDEÑO','9900632','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(76,'LINNEYS','VILLARROEL','9898658','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(77,'RICCI','MOROCOIMA','12966235','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:03','2018-03-11 10:03:03'),(78,'MARIA','GONZALEZ','11344699','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:04','2018-03-11 10:03:04'),(79,'SIMON','RAMIREZ','12537040','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:04','2018-03-11 10:03:04'),(80,'ANALIZ','HERNANDEZ','14187975','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:04','2018-03-11 10:03:04'),(81,'YUDIRMA BAUTISTA','CEDEÑO DE PEREZ','12792662','AUXILIAR DE BIBLIOTECA','Tecnología Educativa','2018-03-11 10:03:04','2018-03-11 10:03:04'),(82,'KEILYN','SOLORZANO','15563928','JEFE DIVISION DE ADMISION Y CONTROL DE ESTUDIO ','Control Académico','2018-03-11 10:03:04','2018-03-11 10:03:04'),(83,'JOSE','FIGUERA','19747527','SECRETARIO','Control Académico','2018-03-11 10:03:04','2018-03-11 10:03:04'),(84,'ANACARLS','GARCIA','14508136','COORD. DE EVALUACION Y EQUIVALENCIA','Control Académico','2018-03-11 10:03:04','2018-03-11 10:03:04'),(85,'EDUARDO','ARMAS ','20535591','SECRETARIO','Control Académico','2018-03-11 10:03:04','2018-03-11 10:03:04'),(86,'JESSICA','PRADO','15618325','SECRETARIA','Control Académico','2018-03-11 10:03:04','2018-03-11 10:03:04'),(87,'MIGUEL','RAMIREZ','12150420','SECRETARIO','Control Académico','2018-03-11 10:03:04','2018-03-11 10:03:04'),(88,'MARISOL','LARA','14424146','ARCHIVISTA','Control Académico','2018-03-11 10:03:04','2018-03-11 10:03:04'),(89,'LUISANGELA','VELASQUEZ ','17934194','JEFE DE DPTO.DE DOBE','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(90,'JUAN','FIGUEROA','11773081','COORDINADOR DE DEPORTE','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(91,'ANGEL','MUNDARAY','11339916','COORDINADOR DE CULTURA','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(92,'MAXS','FEBRES','22969003','SECRETARIO','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(93,'RITA','PUENTE','10935981','PARAMEDICO','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(94,'MARIA','MENESES','10837096','PSICOLOGO','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(95,'BENITO','MATOS','2627158','ORIENTADOR VOCACIONAL','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(96,'JORGE','MARIN','10307009','INSTRUCTOR DE CULTURA','Dobe','2018-03-11 10:03:04','2018-03-11 10:03:04'),(97,'XIOMARA','BASTARDO DE MOYA','3701377','JEFE DPTO.EXTENSION UNIVERSITARIA','Extensión Universitaria','2018-03-11 10:03:04','2018-03-11 10:03:04'),(98,'BERNADETTE','CANELON','18272743','SECRETARIA','Extensión Universitaria','2018-03-11 10:03:04','2018-03-11 10:03:04'),(99,'KARELYS','SANCHEZ','11775226','JEFE DE AREA PROMOCION Y DIFUSION','Extensión Universitaria','2018-03-11 10:03:04','2018-03-11 10:03:04'),(100,'YOLIS','LUNA','10830929','JEFE DE AREA (SERVICIO Y PROYECTO COMUNITARIO)','Extensión Universitaria','2018-03-11 10:03:05','2018-03-11 10:03:05'),(101,'SUSA','PRADA','12150296','SECRETARIA (SERVICIO Y PROYECTO COMUNITARIO)','Extensión Universitaria','2018-03-11 10:03:05','2018-03-11 10:03:05'),(102,'ANA','SABINO','16809220','JEFE DE DPTO.INVESTIGACION Y POST GRADO','Investigación Y Postgrado','2018-03-11 10:03:05','2018-03-11 10:03:05'),(103,'MIGDALIA','BLANCA','9287960','JEFE DE AREA TRABAJO DE GRADO','Investigación Y Postgrado','2018-03-11 10:03:05','2018-03-11 10:03:05'),(104,'WILBERTO','RAMIREZ','23606497','SECRETARIO','Investigación Y Postgrado','2018-03-11 10:03:05','2018-03-11 10:03:05');
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  UNIQUE KEY `usuarios_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Ricardo Hernandez','ricardohernandez@gmail.com','$2y$10$R12rr5WEXIpg94W2Get3qeSiM9jD.6gf2wjM8.cTKBj1conqjkZ06',NULL,'ricardo.png','ricardo',1,NULL,'2018-03-11 10:03:59','2018-03-11 10:03:59');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-11  2:47:26
