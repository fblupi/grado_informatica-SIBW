-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2015 a las 20:52:36
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
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `Nombre_act` varchar(30) NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_salida` time NOT NULL,
  `Hora_llegada` time DEFAULT NULL,
  `Descripcion` text NOT NULL,
  `Detalles` text NOT NULL,
  `Foto_src` varchar(256) NOT NULL,
  `Foto_title` varchar(32) NOT NULL,
  `Foto_alt` varchar(32) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`Nombre_act`, `Titulo`, `Fecha`, `Hora_salida`, `Hora_llegada`, `Descripcion`, `Detalles`, `Foto_src`, `Foto_title`, `Foto_alt`, `Precio`) VALUES
('alhambra', 'Visita a la Alhambra', '2015-06-02', '10:00:00', '18:00:00', '"Asentada sobre la Colina Roja o Cerro de la Sabika, la ciudadela de la Alhambra se presenta erguida, orgullosa y eterna, como uno de los complejos arquitectónicos más importantes de la Edad Media y máximo exponente del arte islámico en Occidente".;\r\n\r\nLa visita a la Alhambra, Patrimonio de la Humanidad por la UNESCO, es fundamental si va a pasar unos días en la ciudad.;\r\n\r\nEn esta visita se contará con guías turísticos oficiales que le acompañarán recorriendo un sitio único en el mundo.', 'Alcazaba: la zona más antigua del complejo con pasado militar.;\r\nPalacios Nazaríes: destacan los Palacios del Mexuar, de Comares y de los Leones, máximo exponente del arte nazarí.;\r\nGeneralife: palacio de verano del sultán, rodeado de extensos jardines.;\r\nIncluye autobús de ida y vuelta.', 'images/actividades/alhambra1.jpg', 'Sierra Nevada', '0', 45),
('sierra-nevada', 'Visita a Sierra Nevada', '2015-06-01', '08:00:00', '17:00:00', 'Sierra Nevada se encuentra en la parte central de la Cordillera Penibética y es una de las areas montañosas más extentas de la península.;\r\n\r\nPodrá visitar el CAR, donde entrenan deportistas de la talla de Mireia Belmonte, campeona mundial de natación.;\r\n\r\nAdemás la visita incluye una hora de alquiler de trineo, para poder sentir la experiencia de deslizarse por la nieve, y una vuelta en el Trineo Ruso y competir con sus amigos para ver quién es el más rápido.', 'Visita al Centro de Alto Rendimiento (CAR) deportivo.;\r\n1 hora de alquiler de trineos.;\r\n1 vuelta en el Trineo Ruso.;\r\nIncluye autobús de ida y vuelta.;\r\nSe recomienda llevar calzado cómodo.', 'images/actividades/sierra-nevada1.jpg', 'Sierra Nevada', 'sierra-nevada', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntados_actividad`
--

CREATE TABLE IF NOT EXISTS `apuntados_actividad` (
  `email` varchar(40) NOT NULL,
  `Nombre_act` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE IF NOT EXISTS `cuotas` (
  `Nombre_cuota` varchar(15) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`Nombre_cuota`, `Descripcion`, `Precio`) VALUES
('Estudiante', 'La cuota de estudiante es la cuota básica para las personas que quieran asistir al congreso como oyentes.', 10),
('Investigador', 'Esta cuota esta dirigida a los congresistas que tienen una investigación en curso. \r\nEn la cuota va incluida la cena de gala.', 20),
('Invitado', 'Cuota básica para las personas que quieran acceder al congreso y no pertenezcan a ninguna universidad.', 10),
('Profesor', 'Cuota para los profesores de alguna universidad.', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `email` varchar(40) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(20) NOT NULL,
  `Telefono` varchar(12) DEFAULT NULL,
  `Contraseña` char(40) NOT NULL,
  `Nombre_cuota` varchar(15) NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `Nombre`, `Apellidos`, `Telefono`, `Contraseña`, `Nombre_cuota`, `Tipo`) VALUES
('admin@admin.com', 'MiKe', 'Sanchez', '958151515', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Invitado', 1),
('juan@profesor.com', 'Juan', 'Cuesta', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Profesor', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
 ADD PRIMARY KEY (`Nombre_act`);

--
-- Indices de la tabla `apuntados_actividad`
--
ALTER TABLE `apuntados_actividad`
 ADD PRIMARY KEY (`email`,`Nombre_act`), ADD KEY `Restriccion actividad clave externa` (`Nombre_act`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
 ADD PRIMARY KEY (`Nombre_cuota`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`email`), ADD KEY `Nombre_cuota` (`Nombre_cuota`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuntados_actividad`
--
ALTER TABLE `apuntados_actividad`
ADD CONSTRAINT `Restriccion actividad clave externa` FOREIGN KEY (`Nombre_act`) REFERENCES `actividades` (`Nombre_act`) ON UPDATE CASCADE,
ADD CONSTRAINT `Restriccion email clave externa` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `Restriccion de clave externa` FOREIGN KEY (`Nombre_cuota`) REFERENCES `cuotas` (`Nombre_cuota`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
