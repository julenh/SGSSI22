-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 02-10-2022 a las 16:57:07
-- Versión del servidor: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Versión de PHP: 7.4.20

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
-- Estructura de tabla para la tabla `actividad`
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
(1, 'leer un libro', 35, '2022-12-10', 'Bilbao'),
(2, 'ver la ciudad', 25, '2022-12-24', 'Bilbao'),
(3, 'salir de fiesta', 20, '2022-12-29', 'Bilbao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos_usuarios`
--

CREATE TABLE `intentos_usuarios` (
  `correo` varchar(30) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `tipo_conexion` varchar(10) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intentos_usuarios`
--

INSERT INTO `intentos_usuarios` (`correo`, `dni`, `tipo_conexion`, `fecha`) VALUES
('dwhd@eje.egdy', '----------', 'Fallida', '2022-12-02 16:37:05'),
('manolo@ejemplo.eus', '12345678-A', 'Fallida', '2022-10-02 16:40:41'),
('manolo@ejemplo.eus', '12345678-A', 'Exitosa', '2022-10-02 16:40:53'),
('dolores@ejemplo.eus', '23456789-B', 'Exitosa', '2022-10-02 16:43:51'),
('dolores@ejemplo.eus', '23456789-B', 'Exitosa', '2022-10-02 16:45:28');

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
('12345678-A', 'manolo@ejemplo.eus', 1, '2022-10-10'),
('12345678-A', 'manolo@ejemplo.eus', 2, '2022-11-24'),
('23456789-B', 'dolores@ejemplo.eus', 3, '2022-12-29');

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
  `contrasena` varchar(255) DEFAULT NULL,
  `cuentaBanc` varchar(255) NOT NULL,
  `fechanac` date DEFAULT NULL,
  `telef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `dni`, `email`, `contrasena`, `cuentaBanc`, `fechanac`, `telef`) VALUES
('Dolores', 'Garcia', '23456789-B', 'dolores@ejemplo.eus', 'contrasenaDolores', 'YS8xV0xkR043bDF3RUFKYUMzY1gveldXclNUZnRqakdSVlRWVU1PWmI3bz06Os0a1W8hWtHLAF1JDCPrsGk=', '1968-10-06', 123456789),
('Manolo', 'Escobar', '12345678-A', 'manolo@ejemplo.eus', 'contrasenaManolo', 'eE9QUHVyd0lmbERTQ2xpNWJCNm1hcHhTUnBFaEt0MWxMdTJueFpMTWZ4OD06OrK9rg4xrzV59efgG5tveSM=', '1968-11-29', 123456789);

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
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
