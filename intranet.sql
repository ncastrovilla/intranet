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
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo_alumnos` varchar(100) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alumnos`),
  KEY `FK_alumnos_curso` (`id_curso`),
  CONSTRAINT `FK_alumnos_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla intranet.alumnos: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id_alumnos`, `nombre_alumnos`, `apellido_paterno`, `apellido_materno`, `rut`, `direccion`, `correo_alumnos`, `id_curso`, `created_at`, `updated_at`) VALUES
	(3, 'Justine Sharpe', '', '', '44562525', 'Apartado núm.: 780, 8383 Iaculis, Calle', 'enim@consequatenimdiam.co.uk', 1, NULL, NULL),
	(4, 'Thaddeus Stewart', '', '', '49187095', '469-6805 Nec, Av.', 'vitae.sodales.at@nonummyultricies.com', 1, NULL, NULL),
	(5, 'Kennan Olsen', '', '', '15099167', '5359 Molestie C.', 'lacus.Etiam@orci.edu', 2, NULL, NULL),
	(6, 'Curran Fuentes', '', '', '12827430', '3607 Etiam Avda.', 'nec@risusDonecegestas.net', 2, NULL, NULL),
	(7, 'Nathan Sykes', '', '', '9453738', '888-5417 Est. Avda.', 'odio.Aliquam@purusNullam.ca', 3, NULL, NULL),
	(8, 'Liberty Kim', '', '', '8698278', 'Apartado núm.: 801, 7743 Maecenas Carretera', 'inceptos.hymenaeos@loremacrisus.com', 3, NULL, NULL),
	(9, 'Debra Berg', '', '', '12812147', 'Apdo.:187-7338 Magna. ', 'sem.mollis@ipsum.ca', 4, NULL, NULL),
	(10, 'Howard Duffy', '', '', '45123560', 'Apartado núm.: 806, 2830 Convallis Carretera', 'leo.in@egestasurnajusto.net', 4, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.anotaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `anotaciones` DISABLE KEYS */;
INSERT INTO `anotaciones` (`id_anotacion`, `id_alumno`, `id_asignatura`, `anotacion`, `fecha_anotacion`, `hora_anotacion`, `id_curso`, `id_profesor`) VALUES
	(1, 3, 2, 'probando insert', '2020-12-18', '22:26', 1, 2);
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

-- Volcando estructura para tabla intranet.asistencia
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `fecha_asistencia` date NOT NULL,
  `presente_asistencia` varchar(50) NOT NULL,
  `id_alumnos` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_asistencia`,`id_alumnos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.asistencia: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` (`id_asistencia`, `fecha_asistencia`, `presente_asistencia`, `id_alumnos`, `id_curso`, `id_profesor`, `id_asignatura`, `created_at`, `updated_at`) VALUES
	(1, '2020-12-23', 'Si', 3, 1, 3, 3, '2020-12-24 00:29:44', '2020-12-24 00:29:44'),
	(1, '2020-12-23', 'Si', 4, 1, 3, 3, '2020-12-24 00:29:44', '2020-12-24 00:29:44'),
	(2, '2020-12-30', 'Si', 3, 1, 3, 3, '2020-12-26 06:42:46', '2020-12-26 06:42:46'),
	(2, '2020-12-30', 'Si', 4, 1, 3, 3, '2020-12-26 06:42:46', '2020-12-26 06:42:46'),
	(3, '2020-12-29', 'Si', 3, 1, 3, 3, '2020-12-26 06:43:18', '2020-12-26 06:43:18'),
	(3, '2020-12-29', 'No', 4, 1, 3, 3, '2020-12-26 06:43:18', '2020-12-26 06:43:18'),
	(4, '2020-12-31', 'Si', 5, 2, 3, 3, '2020-12-26 18:53:56', '2020-12-26 18:53:56'),
	(4, '2020-12-31', 'Si', 6, 2, 3, 3, '2020-12-26 18:53:56', '2020-12-26 18:53:56'),
	(4, '2020-12-31', 'No', 11, 2, 3, 3, '2020-12-26 18:53:56', '2020-12-26 18:53:56'),
	(5, '2020-12-29', 'Si', 5, 2, 3, 3, '2020-12-26 20:26:05', '2020-12-26 20:26:05'),
	(5, '2020-12-29', 'Si', 6, 2, 3, 3, '2020-12-26 20:26:05', '2020-12-26 20:26:05'),
	(5, '2020-12-29', 'Si', 11, 2, 3, 3, '2020-12-26 20:26:05', '2020-12-26 20:26:05'),
	(6, '2021-01-02', 'Si', 3, 1, 2, 2, '2021-01-03 01:37:00', '2021-01-03 01:37:00'),
	(6, '2021-01-02', 'Si', 4, 1, 2, 2, '2021-01-03 01:37:00', '2021-01-03 01:37:00'),
	(6, '2021-01-02', 'No', 13, 1, 2, 2, '2021-01-03 01:37:00', '2021-01-03 01:37:00'),
	(7, '2021-01-03', 'Si', 3, 1, 2, 2, '2021-01-03 01:37:13', '2021-01-03 01:37:13'),
	(7, '2021-01-03', 'Si', 4, 1, 2, 2, '2021-01-03 01:37:13', '2021-01-03 01:37:13'),
	(7, '2021-01-03', 'Si', 13, 1, 2, 2, '2021-01-03 01:37:13', '2021-01-03 01:37:13');
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.calendario
CREATE TABLE IF NOT EXISTS `calendario` (
  `id_calendario` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_evaluacion` date NOT NULL,
  `descripcion_evaluacion` varchar(50) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  PRIMARY KEY (`id_calendario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.calendario: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
INSERT INTO `calendario` (`id_calendario`, `fecha_evaluacion`, `descripcion_evaluacion`, `id_curso`, `id_asignatura`, `id_profesor`) VALUES
	(1, '2020-12-25', 'Verbo', 1, 3, 3),
	(2, '2020-12-19', 'verbo tobe', 1, 3, 3),
	(3, '2020-12-18', 'Logaritmos', 1, 1, 1),
	(4, '2020-12-25', 'Integrales por parte', 1, 1, 1),
	(5, '2020-12-23', 'asda', 1, 1, 1),
	(6, '2020-12-24', 'derivadas', 1, 1, 1);
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;

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
	(3, 5, 6),
	(4, 4, 1);
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

-- Volcando estructura para tabla intranet.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla intranet.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla intranet.migrations: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2014_10_12_000000_create_users_table', 1),
	(5, '2014_10_12_100000_create_password_resets_table', 1),
	(6, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

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
  PRIMARY KEY (`id_notas`,`id_alumno`),
  KEY `FK_notas_alumnos` (`id_alumno`),
  KEY `FK_notas_asignatura` (`id_asignatura`),
  KEY `FK_notas_profesor` (`id_profesor`),
  KEY `FK_notas_curso` (`id_curso`),
  CONSTRAINT `FK_notas_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumnos`),
  CONSTRAINT `FK_notas_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  CONSTRAINT `FK_notas_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `FK_notas_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla intranet.notas: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` (`id_notas`, `nota`, `descripcion`, `semestre`, `año`, `id_alumno`, `id_asignatura`, `id_profesor`, `id_curso`, `created_at`, `updated_at`) VALUES
	(1, '5', 'Pronombres', '2', '2020', 3, 2, 2, 1, '2020-12-24 00:45:57', '2020-12-24 00:45:57'),
	(1, '3', 'Pronombres', '2', '2020', 4, 2, 2, 1, '2020-12-24 00:45:57', '2020-12-24 00:45:57'),
	(2, '6', 'Prueba subir primera fila', '2', '2020', 3, 2, 2, 1, '2020-12-24 00:49:18', '2020-12-24 00:49:18'),
	(2, '7', 'Prueba subir primera fila', '2', '2020', 4, 2, 2, 1, '2020-12-24 00:49:18', '2020-12-24 00:49:18'),
	(3, '1', 'prueba', '1', '2021', 3, 2, 2, 1, '2021-01-16 23:38:23', '2021-01-16 23:38:23'),
	(3, '1', 'prueba', '1', '2021', 4, 2, 2, 1, '2021-01-16 23:38:23', '2021-01-16 23:38:23'),
	(4, '5', 'Consultas', '1', '2021', 5, 2, 2, 2, '2021-01-18 06:21:01', '2021-01-18 06:21:01'),
	(4, '4', 'Consultas', '1', '2021', 6, 2, 2, 2, '2021-01-18 06:21:01', '2021-01-18 06:21:01'),
	(5, '5', 'Prueba subir primera fila', '1', '2021', 5, 2, 2, 2, '2021-01-18 06:26:56', '2021-01-18 06:26:56'),
	(5, '6', 'Prueba subir primera fila', '1', '2021', 6, 2, 2, 2, '2021-01-18 06:26:56', '2021-01-18 06:26:56');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla intranet.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('nikolas7000@gmail.com', '$2y$10$W3eT78cOIGTbv9lIA4p6fuCXc1aGVfh6IKASj5VnS1s67Ki5ThSbW', '2021-01-02 22:30:13');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

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

-- Volcando estructura para tabla intranet.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla intranet.users: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `rut`, `password`, `remember_token`, `rol`, `created_at`, `updated_at`) VALUES
	(1, 'Nicolas', 'nikolas7000@gmail.com', NULL, '193351972', '$2y$10$cyV19cudXAn/RAZPQgzLb.te5OhdWFjKdQ/qs5NsL5P/5W3MCY5by', NULL, '1', '2021-01-01 06:33:12', '2021-01-01 06:33:12'),
	(4, 'Justine Sharpe  ', 'enim@consequatenimdiam.co.uk', NULL, '44562525', '$2y$10$MPzPy3wOb363Swbi9AtJIu6ZXoNMSiykfdSbRJ9Ae4ExGoDphzrku', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(5, 'Thaddeus Stewart  ', 'vitae.sodales.at@nonummyultricies.com', NULL, '49187095', '$2y$10$dBquCR8unRTjhVH6xOcqauXG0B17DkhgJiYvZdRI2COjgwKrcs1uK', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(6, 'Kennan Olsen  ', 'lacus.Etiam@orci.edu', NULL, '15099167', '$2y$10$HZ56DHlNaH6DbgdYlG/hTu2jmNTRVbFRUAgwCHZXoJx3EVvFRJg3i', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(7, 'Curran Fuentes  ', 'nec@risusDonecegestas.net', NULL, '12827430', '$2y$10$LRG27uJK3g4BMdB33N8O/.Y87hfZ4rfSQJf1oYBtJovKhEx9zVJMK', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(8, 'Nathan Sykes  ', 'odio.Aliquam@purusNullam.ca', NULL, '9453738', '$2y$10$SvkV5U6epbI5vESE9sqtGu6J61swOwltEhUEgy2uj.MzIv7YUD.Sa', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(9, 'Liberty Kim  ', 'inceptos.hymenaeos@loremacrisus.com', NULL, '8698278', '$2y$10$GAQinRW8CwbTP.QvcO9tf.Bbmp6jhEm/R902XxHxKieEyFndtTEP6', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(10, 'Debra Berg  ', 'sem.mollis@ipsum.ca', NULL, '12812147', '$2y$10$WGxymt0R3ErDm7c3uRf2cu39pdEZTE8YE4f0D2H/6jH/taDOQPkYG', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(11, 'Howard Duffy  ', 'leo.in@egestasurnajusto.net', NULL, '45123560', '$2y$10$GbW1lCpJs27VV1ON0ooDV.848He7sPCXWgho/d7MQAZhOSZyuM8k.', NULL, '3', '2021-01-02 07:03:12', '2021-01-02 07:03:12'),
	(12, 'Raul Antonio Cisternas Valencia', 'rcisternas@gmail.com', NULL, '87518932', '$2y$10$Vjlke0F.olMnj.ma1vCzO.lM7pyO7AsyskhbT8Ls5AO/A1nKPNl0C', NULL, '2', '2021-01-02 21:52:26', '2021-01-02 21:52:26'),
	(13, 'Maria Fernanda Vazquez Moraga', 'mariaVM@gmail.co', NULL, '181112', '$2y$10$ahvqknL6gX7wUDLUCgS0XeXaLeVM1VQLRCHbGbc2.hgFshoyVAU2W', NULL, '2', '2021-01-02 21:52:26', '2021-01-02 21:52:26'),
	(14, 'Roberto Eliecer Castro Figueroa', 'robertoecastrof@gmail.com', NULL, '93109619', '$2y$10$hxVol2vWbjfmsuZoBlUT9.Q7lPS8./X2jwJPSxQGJt0K5UADi5HMS', NULL, '2', '2021-01-02 21:52:26', '2021-01-02 21:52:26'),
	(15, 'Cecilia Beatriz Villa Jimenez', 'ceciliavillajimenez@gmail.com', NULL, '133085718', '$2y$10$OssU1rnD1XqvHj7oCioa1.EIQ7.sEzq1H/uCIhrUFQDnstE.8c/E2', NULL, '2', '2021-01-02 21:52:26', '2021-01-02 21:52:26'),
	(16, 'Lorena Paredes Sanchez', 'lorenap@gmail.com', NULL, '211520787', '$2y$10$5tyJ2j4VIAJ89UUCezqBYuzH3Y1DCi2mNR/dHGQGi4anz5uUy7EpS', NULL, '2', '2021-01-02 21:52:26', '2021-01-02 21:52:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
