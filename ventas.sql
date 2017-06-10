-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ventas
DROP DATABASE IF EXISTS `ventas`;
CREATE DATABASE IF NOT EXISTS `ventas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ventas`;

-- Dumping structure for table ventas.administrador
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAdmin` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0',
  `fechaCreado` date NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.categorias
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.ciudad
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `nombreCiudad` varchar(60) NOT NULL,
  `codPostal` int(4) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  PRIMARY KEY (`idCiudad`),
  KEY `codPostal` (`codPostal`),
  KEY `FK_ciudad_provincia` (`idProvincia`),
  CONSTRAINT `FK_ciudad_provincia` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table ventas.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(150) NOT NULL,
  `apellidoCliente` varchar(150) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `usuarioCliente` varchar(50) NOT NULL,
  `passwordCliente` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `emailCliente` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `cuit` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `FK_clientes_provincia` (`idProvincia`),
  KEY `FK_clientes_ciudad` (`idCiudad`),
  CONSTRAINT `FK_clientes_ciudad` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_clientes_provincia` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.detalles
DROP TABLE IF EXISTS `detalles`;
CREATE TABLE IF NOT EXISTS `detalles` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fechaVenta` date NOT NULL,
  `precioVenta` double NOT NULL,
  `cantidadKilos` int(11) NOT NULL,
  `totalVenta` double NOT NULL,
  `numFac` int(110) NOT NULL,
  `tipoFactura` varchar(5) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `FK_detalles_clientes` (`idCliente`),
  KEY `FK_detalles_productos` (`idProducto`),
  CONSTRAINT `FK_detalles_clientes` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detalles_productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.factura
DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `numFac` int(110) NOT NULL,
  `fechaVenta` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `totalVenta` double NOT NULL,
  `tipoFactura` varchar(50) NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `FK_factura_clientes` (`idCliente`),
  KEY `FK_factura_administrador` (`idAdmin`),
  CONSTRAINT `FK_factura_administrador` FOREIGN KEY (`idAdmin`) REFERENCES `administrador` (`idAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_factura_clientes` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table ventas.inventario
DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `idInventario` int(11) NOT NULL AUTO_INCREMENT,
  `cantidadIngresada` int(11) NOT NULL,
  `precioVenta` double NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idInventario`),
  KEY `FK_inventario_productos` (`idProducto`),
  CONSTRAINT `FK_inventario_productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.pass
DROP TABLE IF EXISTS `pass`;
CREATE TABLE IF NOT EXISTS `pass` (
  `idpass` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  PRIMARY KEY (`idpass`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.productos
DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(50) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `precioProducto` double NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `FK_productos_categorias` (`idCategoria`),
  KEY `FK_productos_proveedores` (`idProveedor`),
  CONSTRAINT `FK_productos_categorias` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_productos_proveedores` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.proveedores
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProveedor` varchar(100) NOT NULL,
  `apellidoProveedor` varchar(100) NOT NULL,
  `nombreEmpresa` varchar(100) DEFAULT NULL,
  `telefonoProveedor` varchar(100) NOT NULL,
  `direccionProveedor` varchar(100) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  PRIMARY KEY (`idProveedor`),
  KEY `FK_proveedores_ciudad` (`idCiudad`),
  CONSTRAINT `FK_proveedores_ciudad` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ventas.provincia
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `idProvincia` int(11) NOT NULL,
  `nombreProvincia` varchar(50) NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table ventas.temp
DROP TABLE IF EXISTS `temp`;
CREATE TABLE IF NOT EXISTS `temp` (
  `idTemp` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `precioVenta` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iva` double NOT NULL,
  `totalVenta` double NOT NULL,
  `numFac` int(11) NOT NULL,
  `fechaVenta` date NOT NULL,
  `unidad` int(11) NOT NULL,
  `tipoFactura` varchar(5) NOT NULL,
  PRIMARY KEY (`idTemp`),
  KEY `FK_temp_productos` (`idProducto`),
  KEY `FK_temp_clientes` (`idCliente`),
  CONSTRAINT `FK_temp_clientes` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_temp_productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
