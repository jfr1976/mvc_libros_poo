-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.33-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para libreria
CREATE DATABASE IF NOT EXISTS `libreria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `libreria`;

-- Volcando estructura para tabla libreria.editoriales
CREATE TABLE IF NOT EXISTS `editoriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `logo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla libreria.editoriales: ~4 rows (aproximadamente)
INSERT INTO `editoriales` (`id`, `nombre`, `direccion`, `telefono`, `logo`) VALUES
	(2, 'Plaza & Janés', 'Travessera de Grácia, 47 08008 Barcelona', '666666666', 'pj.png'),
	(3, 'Planeta', 'Av. Diagonal 662-664 08034 Barcelona', '655555555', 'planeta.jpg'),
	(4, 'Santillana', 'Gran Vía 32 28013 Madrid', '644444444', 'santillana.gif'),
	(5, 'Anagrama', 'Pau Claris 172 08037 Barcelona', '633333333', 'anagrama.jpg');

-- Volcando estructura para tabla libreria.libros
CREATE TABLE IF NOT EXISTS `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `titulo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `descripcion` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `editorial` int(10) DEFAULT NULL,
  `n_pags` int(11) NOT NULL DEFAULT '0',
  `precio` decimal(6,2) NOT NULL DEFAULT '0.00',
  `portada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_libros_editoriales` (`editorial`),
  CONSTRAINT `FK_libros_editoriales` FOREIGN KEY (`editorial`) REFERENCES `editoriales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla libreria.libros: ~7 rows (aproximadamente)
INSERT INTO `libros` (`id`, `isbn`, `titulo`, `descripcion`, `editorial`, `n_pags`, `precio`, `portada`) VALUES
	(1, '9788408175725', 'El Código Da Vinci', 'Una mezcla trepidante de aventuras, intrigas vaticanas, simbología y enigmas cifrados que provocó una extraordinaria polémica al poner en duda algunos de los dogmas sobre los que se asienta la Iglesia católica. Una de las novelas más leídas de todos los tiempos.  ', 2, 545, 25.95, '9788408175725.jpg'),
	(2, '9788466345347', 'It (Eso)', 'It es una de las novelas más ambiciosas de Stephen King, con la que ha logrado perfeccionar de un modo muy personal las claves del género de terror.', 2, 1100, 24.95, '9788466345347.jpg'),
	(3, '9788466341783', 'Los Pilares de la Tierra', 'Los pilares de la Tierra es la obra maestra de Ken Follett y constituye una excepcional evocación de una época de violentas pasiones.', 4, 1125, 23.95, '9788466341783.jpg'),
	(4, '9781234567890', 'Matemáticas', 'Matemáticas 3º ESO', 5, 300, 40.00, '9781234567890.jpg'),
	(10, '9788425354755', 'La Catedral Del Mar', 'Una catedral construida por el pueblo y para el pueblo en la Barcelona medieval es el escenario de una apasionante historia de intriga, violencia y pasión.', 3, 500, 45.00, '9788425354755.jpg'),
	(14, '9788466345682', 'Misery', 'Misery Chastain ha muerto. Paul Sheldon la ha matado. Con alivio y hasta con alegría. Misery lo ha hecho rico. Porque Misery es la heroína que ha protagonizado sus exitosos libros.', 3, 500, 20.00, '9788466345682.jpg'),
	(15, '9788408175742', 'Ángeles y Demonios', 'Ángeles y demonios, la primera aventura del carismático e inolvidable Robert Langdon, es un adictivo y trepidante thriller sobre la eterna pugna entre ciencia y religión. Esta lucha se convierte en una verdadera guerra que pondrá en jaque a toda la humanidad, que deberá luchar hasta el último minuto para evitar un gran desastre.', 2, 300, 20.00, '9788408175742.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
