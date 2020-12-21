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

-- Volcando datos para la tabla intranet.alumnos: ~9 rows (aproximadamente)
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

-- Volcando datos para la tabla intranet.anotaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `anotaciones` DISABLE KEYS */;
INSERT INTO `anotaciones` (`id_anotacion`, `id_alumno`, `id_asignatura`, `anotacion`, `fecha_anotacion`, `hora_anotacion`, `id_curso`, `id_profesor`) VALUES
	(0, 5, 2, 'Cabro qlo no vuelve del baño', '2020-12-18', '19:51', 2, 2);
/*!40000 ALTER TABLE `anotaciones` ENABLE KEYS */;

-- Volcando datos para la tabla intranet.asignatura: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` (`id_asignatura`, `nombre_asignatura`, `codigo`) VALUES
	(1, 'Matematica', 'MATE0001'),
	(2, 'Lenguaje y comunicacion', 'LEN0002'),
	(3, 'Ingles', 'ING0003'),
	(4, 'Educacion Fisica', 'EF0004'),
	(5, 'Historia', 'H0005');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;

-- Volcando datos para la tabla intranet.calendario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
INSERT INTO `calendario` (`id_calendario`, `fecha_evaluacion`, `descripcion_evaluacion`, `id_curso`, `id_asignatura`, `id_profesor`) VALUES
	(1, '2020-12-25', 'Verbo', 1, 3, 3),
	(2, '2020-12-19', 'verbo tobe', 1, 3, 3);
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;

-- Volcando datos para la tabla intranet.cuenta: ~20 rows (aproximadamente)
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

-- Volcando datos para la tabla intranet.curso: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id_curso`, `grado`, `letra`, `id_profesor`) VALUES
	(1, 'Octavo', 'A', 1),
	(2, 'Sexto', 'B', 2),
	(3, 'Octavo', 'B', 3),
	(4, 'Sexto', 'A', 4);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;

-- Volcando datos para la tabla intranet.notas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` (`id_notas`, `nota`, `descripcion`, `semestre`, `año`, `id_alumno`, `id_asignatura`, `id_profesor`, `id_curso`, `created_at`, `updated_at`) VALUES
	(30, '5', 'Pronombres', '2', '2101', 3, 2, 2, 1, '2020-12-18 21:40:45', '2020-12-18 21:40:45'),
	(31, '5', 'Pronombres', '2', '2101', 4, 2, 2, 1, '2020-12-18 21:40:45', '2020-12-18 21:41:03');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando datos para la tabla intranet.profesor: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` (`id_profesor`, `nombres_profesor`, `apellido_paterno`, `apellido_materno`, `rut`, `correo`, `created_at`, `updated_at`) VALUES
	(1, 'Raul Antonio', 'Cisternas', 'Valencia', '87518932', 'rcisternas@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Maria Fernanda', 'Vazquez', 'Moraga', '181112', 'mariaVM@gmail.co', '0000-00-00 00:00:00', '2020-12-08 02:34:40'),
	(3, 'Roberto Eliecer', 'Castro', 'Figueroa', '93109619', 'robertoecastrof@gmail.com', '0000-00-00 00:00:00', '2020-12-08 23:43:09'),
	(4, 'Cecilia Beatriz', 'Villa', 'Jimenez', '133085718', 'ceciliavillajimenez@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Lorena', 'Paredes', 'Sanchez', '211520787', 'lorenap@gmail.com', '2020-12-10 01:03:48', '2020-12-10 01:03:48');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
