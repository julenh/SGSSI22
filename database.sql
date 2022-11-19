-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-09-2020 a las 16:37:17
-- Versión del servidor: 10.5.5-MariaDB-1:10.5.5+maria~focal
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `actividad` (
  `idAct` int(11) NOT NULL,
  `descrip` varchar(300) DEFAULT NULL,
  `numPlazas` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idAct`, `descrip`, `numPlazas`, `fecha`, `lugar`) VALUES
(1, 'ver la ciudad de erasmus', 50, '2021-12-29', 'Bilbao'),
(2, 'aprender la lengua natal', 75, '2021-09-11', 'Sarriko'),
(3, 'salir de fiesta', 40, '2021-11-03', 'San Mames'),
(4, 'dar un paseo', 50, '2021-03-08', 'Deusto'),
(5, 'comer palomitas', 2, '2021-06-03', 'Deusto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realizaractividad`
--

CREATE TABLE `realizaractividad` (
  `dniAl` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `idAct` int(11) NOT NULL,
  `fechaActi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `realizaractividad`
--

INSERT INTO `realizaractividad` (`dniAl`, `email`, `idAct`, `fechaActi`) VALUES
('11111113-A', 'ejemplo@ejemplo.eus', 1, '2021-12-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `nomUni` varchar(50) NOT NULL,
  `numEstudiantes` int(11) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `telf` int(11) DEFAULT NULL,
  `ciudadUni` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`nomUni`, `numEstudiantes`, `correo`, `telf`, `ciudadUni`) VALUES
('EHU leioa', 140, 'upv@leioa.eus', 940000001, 'Bilbao'),
('EHU san mames', 100, 'upv@sanma.eus', 940000000, 'Bilbao'),
('EHU sarriko', 120, 'upv@sarriko.eus', 940000002, 'Bilbao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `dni` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `telef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `dni`, `email`, `contrasena`, `fechanac`, `telef`) VALUES
('manolo', 'garcia', '00000000-X', 'manolo@upvsanma.eus', 'mgF3h%dF1', '2001-06-05', 444444444),
('Lucas', 'Abaitua', '11111111-A', 'lucas@ejemplo.eus', '123', '2001-06-05', 999999999),
('ejemplo', 'ejemplo', '11111112-A', 'lucas2@ejemplo.eus', '456', '2021-10-17', 11),
('ejemplo2', 'ej', '11111113-A', 'ejemplo@ejemplo.eus', '123', '0000-00-00', 12),
('ejemplo3', 'ej', '11111114-A', 'ejemplo1@ejemplo.eus', '123', '2021-10-10', 13),
('Paco', 'Escopeta', '12345678-A', 'paco@ejemplo.eus', '12345', '0000-00-00', 333333333),
('Estefania', 'O?ate', '22222222-O', 'tefi@ejemplo.eus', '5678', '0000-00-00', 600000001),
('luis', 'garcia', '77777777-Y', 'luis@ejemplo.eus', '123', '2002-02-02', 123456789),
('manolo', 'elDelBombo', '99999999-S', 'manolo@upvsanma.eus', '123', '0000-00-00', 555555555);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idAct`);

--
-- Indices de la tabla `realizaractividad`
--
ALTER TABLE `realizaractividad`
  ADD KEY `dniAl` (`dniAl`),
  ADD KEY `idAct` (`idAct`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`nomUni`,`ciudadUni`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`,`email`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `realizaractividad`
--
ALTER TABLE `realizaractividad`
  ADD CONSTRAINT `realizaractividad_ibfk_1` FOREIGN KEY (`dniAl`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `realizaractividad_ibfk_2` FOREIGN KEY (`idAct`) REFERENCES `actividad` (`idAct`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
