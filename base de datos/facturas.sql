-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2018 a las 17:09:54
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
('1', 'farmaco', 'Rintal'),
('2', 'no farmaco', 'Gotas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `direccion`, `fecha_nacimiento`, `telefono`, `email`) VALUES
('4548565', 'andres', 'ortega rojas', 'calle6 #7-46 tucunare', '0000-00-00', '5811854', 'andresor@gmail.com'),
('5156154', 'fabian', 'tarazona villamizar', 'carrera 4 av 5-13 villa rosa', '0000-00-00', '5741236', 'fabian@misena.edu.co'),
('7894561', 'nelson', 'perez gomez', 'av 5# 5-24 rosal', '0000-00-00', '3121478523', 'nel@gmail.com'),
('88888888', 'nmnmnmnmnm', 'nmnmnmnmnmnm', 'nmnmnmnmnm', '2018-08-10', '4546456', 'xgdthdfghfdhf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` varchar(250) NOT NULL,
  `id_facturas` varchar(250) NOT NULL,
  `id_producto` varchar(250) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `id_facturas`, `id_producto`, `cantidad`, `precio`) VALUES
('2', '5456415', '1236975', 20, 2000),
('3', '5456415', '02', 500, 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_facturas` varchar(250) NOT NULL,
  `id_cliente` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `id_vendedor` varchar(250) NOT NULL,
  `num_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_facturas`, `id_cliente`, `fecha`, `id_vendedor`, `num_pago`) VALUES
('12', '4548565', '0000-00-00', '5244454', 12345),
('5456415', '4548565', '2018-04-11', '5244454', 123456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modo_pago`
--

CREATE TABLE `modo_pago` (
  `num_pago` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `otros_detalles` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modo_pago`
--

INSERT INTO `modo_pago` (`num_pago`, `nombre`, `otros_detalles`) VALUES
(12345, 'esfectivo', 'ninguna'),
(123456, 'tarje', 'ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `stock`, `id_categoria`, `imagen`) VALUES
('01', 'Rintal', 24, 50, '1', ''),
('02', 'Ventolin', 23, 24, '2', ''),
('1236975', 'metacarcamol', 2000, 50, '2', 'no'),
('1569000', 'acetaminofen', 2000, 49, '2', 'no'),
('1569874', 'dolex', 2500, 50, '2', 'no'),
('7920000', 'tiamina', 2000, 50, '2', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefonos` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nombre`, `apellido`, `direccion`, `fecha_nacimiento`, `telefonos`, `email`) VALUES
('5244454', 'Jairo enrique', 'Orozco', 'mz10B1 Lt AB motilones', '0000-00-00', '5885204', 'jeorozco55@gmail.com'),
('5451056', 'nelson', 'perez colmenares', 'calle5av2-30 la victoria', '0000-00-00', '5714569', 'nelson@misena.edu.co');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_factura` (`id_facturas`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_facturas`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `num_pago` (`num_pago`);

--
-- Indices de la tabla `modo_pago`
--
ALTER TABLE `modo_pago`
  ADD PRIMARY KEY (`num_pago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_facturas`) REFERENCES `factura` (`id_facturas`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vendedor`) ON DELETE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`num_pago`) REFERENCES `modo_pago` (`num_pago`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
