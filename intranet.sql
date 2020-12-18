-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para intranet
CREATE DATABASE IF NOT EXISTS `intranet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `intranet`;

-- Volcando estructura para tabla intranet.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumnos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alumnos` varchar(100) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo_alumnos` varchar(100) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alumnos`),
  KEY `FK_alumnos_curso` (`id_curso`),
  CONSTRAINT `FK_alumnos_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla intranet.alumnos: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id_alumnos`, `nombre_alumnos`, `rut`, `direccion`, `correo_alumnos`, `id_curso`, `created_at`, `updated_at`) VALUES
	(3, 'Justine Sharpe', '44562525', 'Apartado núm.: 780, 8383 Iaculis, Calle', 'enim@consequatenimdiam.co.uk', 1, NULL, NULL),
	(4, 'Thaddeus Stewart', '49187095', '469-6805 Nec, Av.', 'vitae.sodales.at@nonummyultricies.com', 1, NULL, NULL),
	(5, 'Kennan Olsen', '15099167', '5359 Molestie C.', 'lacus.Etiam@orci.edu', 2, NULL, NULL),
	(6, 'Curran Fuentes', '12827430', '3607 Etiam Avda.', 'nec@risusDonecegestas.net', 2, NULL, NULL),
	(7, 'Nathan Sykes', '9453738', '888-5417 Est. Avda.', 'odio.Aliquam@purusNullam.ca', 3, NULL, NULL),
	(8, 'Liberty Kim', '8698278', 'Apartado núm.: 801, 7743 Maecenas Carretera', 'inceptos.hymenaeos@loremacrisus.com', 3, NULL, NULL),
	(9, 'Debra Berg', '12812147', 'Apdo.:187-7338 Magna. ', 'sem.mollis@ipsum.ca', 4, NULL, NULL),
	(10, 'Howard Duffy', '45123560', 'Apartado núm.: 806, 2830 Convallis Carretera', 'leo.in@egestasurnajusto.net', 4, NULL, NULL),
	(11, 'Colleen Langley', '16588693', 'Apartado núm.: 160, 5956 Donec Av.', 'Sed.malesuada.augue@nec.com', 2, NULL, NULL);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.anotaciones
CREATE TABLE IF NOT EXISTS `anotaciones` (
  `id_anotacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `anotacion` varchar(200) NOT NULL DEFAULT '',
  `fecha_anotacion` date NOT NULL,
  `hora_anotacion` varchar(50) NOT NULL DEFAULT '',
  `id_curso` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  PRIMARY KEY (`id_anotacion`),
  KEY `FK__alumnos` (`id_alumno`),
  KEY `FK__asignatura` (`id_asignatura`),
  KEY `FK__curso` (`id_curso`),
  KEY `FK__profesor` (`id_profesor`),
  CONSTRAINT `FK__alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumnos`),
  CONSTRAINT `FK__asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  CONSTRAINT `FK__curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `FK__profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.anotaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `anotaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `anotaciones` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.asignatura
CREATE TABLE IF NOT EXISTS `asignatura` (
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla intranet.asignatura: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` (`id_asignatura`, `nombre_asignatura`, `codigo`) VALUES
	(1, 'Matematica', 'MATE0001'),
	(2, 'Lenguaje y comunicacion', 'LEN0002'),
	(3, 'Ingles', 'ING0003'),
	(4, 'Educacion Fisica', 'EF0004'),
	(5, 'Historia', 'H0005');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.cuenta
CREATE TABLE IF NOT EXISTS `cuenta` (
  `id_curso` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  KEY `FK_cuenta_asignatura` (`id_asignatura`),
  KEY `FK_cuenta_profesor` (`id_profesor`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `FK_cuenta_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  CONSTRAINT `FK_cuenta_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `FK_cuenta_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.cuenta: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`id_curso`, `id_asignatura`, `id_profesor`) VALUES
	(1, 1, 1),
	(1, 2, 2),
	(1, 3, 3),
	(1, 4, 4),
	(2, 1, 1),
	(2, 2, 2),
	(2, 3, 3),
	(2, 4, 4),
	(3, 1, 1),
	(3, 2, 2),
	(3, 3, 3),
	(3, 4, 4),
	(4, 1, 1),
	(4, 2, 2),
	(4, 3, 3),
	(4, 4, 4),
	(4, 5, 6),
	(1, 5, 6),
	(2, 5, 6),
	(3, 5, 6);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `grado` varchar(40) NOT NULL,
  `letra` varchar(20) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `FK_curso_profesor` (`id_profesor`),
  CONSTRAINT `FK_curso_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla intranet.curso: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id_curso`, `grado`, `letra`, `id_profesor`) VALUES
	(1, 'Octavo', 'A', 1),
	(2, 'Sexto', 'B', 2),
	(3, 'Octavo', 'B', 3),
	(4, 'Sexto', 'A', 4);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id_notas` int(11) NOT NULL AUTO_INCREMENT,
  `nota` varchar(5) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `semestre` varchar(5) NOT NULL,
  `año` varchar(10) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_notas`),
  KEY `FK_notas_alumnos` (`id_alumno`),
  KEY `FK_notas_asignatura` (`id_asignatura`),
  KEY `FK_notas_profesor` (`id_profesor`),
  KEY `FK_notas_curso` (`id_curso`),
  CONSTRAINT `FK_notas_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumnos`),
  CONSTRAINT `FK_notas_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  CONSTRAINT `FK_notas_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `FK_notas_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla intranet.notas: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` (`id_notas`, `nota`, `descripcion`, `semestre`, `año`, `id_alumno`, `id_asignatura`, `id_profesor`, `id_curso`, `created_at`, `updated_at`) VALUES
	(1, '3.5', 'Prueba 1', '1', '2020', 3, 1, 2, 1, NULL, NULL),
	(2, '5', 'Prueba 2', '1', '2020', 3, 1, 2, 1, NULL, NULL),
	(3, '7', 'Prueba 1', '1', '2020', 4, 1, 2, 1, NULL, NULL),
	(4, '5', 'Prueba 1', '1', '2020', 5, 1, 2, 2, NULL, NULL),
	(5, '6', 'Prueba 1', '1', '2020', 7, 1, 2, 3, NULL, NULL),
	(6, '7', 'Logaritmos', '2', '2020', 11, 1, 2, 2, NULL, NULL),
	(7, '5', 'Pronombres', '2', '3434', 5, 2, 2, 2, '2020-12-18 03:34:14', '2020-12-18 03:34:14'),
	(8, '6', 'Pronombres', '2', '3434', 6, 2, 2, 2, '2020-12-18 03:34:14', '2020-12-18 03:34:14'),
	(9, '7', 'Pronombres', '2', '3434', 11, 2, 2, 2, '2020-12-18 03:34:14', '2020-12-18 03:34:14'),
	(10, '2', 'Pronombres', '2', '2132', 7, 2, 2, 3, '2020-12-18 03:35:46', '2020-12-18 03:35:46'),
	(11, '3', 'Pronombres', '2', '2132', 8, 2, 2, 3, '2020-12-18 03:35:46', '2020-12-18 03:35:46'),
	(12, '34', 'Pronombres', '2', '3434', 9, 2, 2, 4, '2020-12-18 03:36:32', '2020-12-18 03:36:32'),
	(13, '43', 'Pronombres', '2', '3434', 10, 2, 2, 4, '2020-12-18 03:36:32', '2020-12-18 03:36:32'),
	(14, '4', 'prueba', '2', '2112', 5, 2, 2, 2, '2020-12-18 05:28:12', '2020-12-18 05:28:12'),
	(15, '5', 'prueba', '2', '2112', 6, 2, 2, 2, '2020-12-18 05:28:12', '2020-12-18 05:28:12'),
	(16, '6', 'prueba', '2', '2112', 11, 2, 2, 2, '2020-12-18 05:28:12', '2020-12-18 05:28:12'),
	(17, '34', 'Prueba subir primera fila', '2', '3434', 9, 2, 2, 4, '2020-12-18 05:31:57', '2020-12-18 05:31:57'),
	(18, '43', 'Prueba subir primera fila', '2', '3434', 10, 2, 2, 4, '2020-12-18 05:31:57', '2020-12-18 05:31:57'),
	(19, '5', 'Prueba subir primera fila', '2', '3434', 3, 2, 2, 1, '2020-12-18 06:02:37', '2020-12-18 06:02:37'),
	(20, '4', 'Prueba subir primera fila', '2', '3434', 4, 2, 2, 1, '2020-12-18 06:02:37', '2020-12-18 06:02:37');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.profesor
CREATE TABLE IF NOT EXISTS `profesor` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_profesor` varchar(40) NOT NULL,
  `apellido_paterno` varchar(40) NOT NULL,
  `apellido_materno` varchar(40) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla intranet.profesor: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` (`id_profesor`, `nombres_profesor`, `apellido_paterno`, `apellido_materno`, `rut`, `correo`, `created_at`, `updated_at`) VALUES
	(1, 'Raul Antonio', 'Cisternas', 'Valencia', '87518932', 'rcisternas@gmail.com', '0000-00-00 00:00:00', '2020-12-18 06:02:01'),
	(2, 'Maria Fernanda', 'Vazquez', 'Moraga', '181112', 'mariaVM@gmail.co', '0000-00-00 00:00:00', '2020-12-08 02:34:40'),
	(3, 'Roberto Eliecer', 'Castro', 'Figueroa', '93109619', 'robertoecastrof@gmail.com', '0000-00-00 00:00:00', '2020-12-08 23:43:09'),
	(4, 'Cecilia Beatriz', 'Villa', 'Jimenez', '133085718', 'ceciliavillajimenez@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Lorena', 'Paredes', 'Sanchez', '211520787', 'lorenap@gmail.com', '2020-12-10 01:03:48', '2020-12-10 01:03:48');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
