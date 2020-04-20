-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2020 a las 16:00:27
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `integradornueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `mail`, `pass`) VALUES
(15, 'pedro@mail.com', '$2y$10$9sz5iix9XSv5UZ9ytDqaselV9Q0parrnj8wcrI3oYywmV1sV5P0SW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabania`
--

CREATE TABLE `cabania` (
  `id` int(11) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `localidad` varchar(200) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `idPropietario` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabania`
--

INSERT INTO `cabania` (`id`, `domicilio`, `localidad`, `capacidad`, `observaciones`, `idPropietario`, `precio`) VALUES
(24, 'Las termas 45', 'Trapiche', 5, 'Sin Observaciones', 8, '100.00'),
(25, 'Las Moras 185', 'Juana Koslay', 10, 'Sin observaciones                        ', 7, '200.00'),
(26, 'Av. Illia 1050', 'San Luis', 2, 'Zona centrica', 7, '3000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `dni`, `domicilio`, `mail`, `telefono`) VALUES
(12, 'Pamela Evelin', 'Ramos', '3512365', 'Mirador del Cerro', 'pamela@mail.com', '2605516588'),
(13, 'Javier Hernan', 'Garro', '321236523', 'B&deg; Universitario', 'javier@mail.com', '2665458965');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `uri` varchar(200) NOT NULL,
  `idCabania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `uri`, `idCabania`) VALUES
(47, '5e9d236386abcimages.png', 26),
(48, '5e9d238cbaec75e9873173da17kata.jpg', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id`, `nombre`, `apellido`, `dni`, `domicilio`, `mail`, `telefono`, `pass`, `codigo`) VALUES
(7, 'Cintia Carla', 'Lucero', '356965478', 'Lince 22 19', 'cintia@mail.com', '2664578999', '123', ''),
(8, 'Silvia Mabel', 'Torres', '36606989', 'Lince 22 19', 'silvia@mail.com', '26568523', '$2y$10$aLS/zeRcPaEE7r.QYNQIQOYx02GIhorugUwA1mORAdoYsyXvp31hS', NULL),
(11, 'Perseo', 'Lucero', '65845632', 'La Punta', 'perseo.lucero@gmail.com', '2664565685', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idCabania` int(11) NOT NULL,
  `comision` decimal(10,2) NOT NULL,
  `ganancia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `inicio`, `fin`, `costo`, `idCliente`, `idCabania`, `comision`, `ganancia`) VALUES
(35, '2020-04-19', '2020-04-20', '100.00', 12, 24, '3.65', '96.35'),
(36, '2020-08-30', '2020-10-24', '5500.00', 13, 24, '200.75', '5299.25'),
(37, '2020-04-20', '2020-04-25', '1000.00', 13, 25, '36.50', '963.50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indices de la tabla `cabania`
--
ALTER TABLE `cabania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPropietario` (`idPropietario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cabania` (`idCabania`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCabania` (`idCabania`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cabania`
--
ALTER TABLE `cabania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabania`
--
ALTER TABLE `cabania`
  ADD CONSTRAINT `cabania_ibfk_1` FOREIGN KEY (`idPropietario`) REFERENCES `propietario` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idCabania`) REFERENCES `cabania` (`id`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idCabania`) REFERENCES `cabania` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
