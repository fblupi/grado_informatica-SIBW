-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2015 a las 00:32:51
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sibw_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `email` varchar(40) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(20) NOT NULL,
  `Telefono` varchar(12) DEFAULT NULL,
  `Contrasena` char(40) NOT NULL,
  `ID_cuota` varchar(15) NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `Nombre`, `Apellidos`, `Telefono`, `Contrasena`, `ID_cuota`, `Tipo`) VALUES
('aceitedesilicona@gmail.com', 'Aceite', 'Silicona', '958445544', 'bbdcec4f0a79d68c048fbfb7ba7d936b8f040e26', 'congresista', 0),
('admin@admin.com', 'MiKe', 'Sanchez', '958151515', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'invitado', 1),
('antonio@estudiante.com', 'Antonio', 'Jimenez', '958774477', '4c663d666680cd1a68d6c3c63327aade2545a647', 'estudiante', 0),
('Juan@profesor.com', 'Juan', 'Cuesta', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 0),
('juancuesta@mailinator.com', 'AS', 'asd', '958141414', '8b6f92a45f6d7a568ed80251d6834a2a6c1ed491', 'estudiante', 0),
('luis@profesor.com', 'Luis', 'Martinez', '958145451', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 0),
('pedro@congresista.com', 'Pedro', 'Perez', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'congresista', 0),
('pepe@congresista.com', 'Pepe', 'Sanchez', '958665566', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'congresista', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`email`), ADD KEY `Nombre_cuota` (`ID_cuota`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `Restriccion clave externa cuota` FOREIGN KEY (`ID_cuota`) REFERENCES `cuotas` (`ID_cuota`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
