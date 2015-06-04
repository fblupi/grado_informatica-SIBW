-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2015 a las 13:51:47
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
CREATE DATABASE IF NOT EXISTS `sibw_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sibw_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `ID_act` varchar(30) NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_salida` time NOT NULL,
  `Hora_llegada` time DEFAULT NULL,
  `Descripcion` text NOT NULL,
  `Detalles` text NOT NULL,
  `Foto_src` varchar(256) NOT NULL,
  `Foto_title` varchar(32) NOT NULL,
  `Foto_alt` varchar(32) NOT NULL,
  `Precio` float NOT NULL,
  `Minifoto_src` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`ID_act`, `Titulo`, `Fecha`, `Hora_salida`, `Hora_llegada`, `Descripcion`, `Detalles`, `Foto_src`, `Foto_title`, `Foto_alt`, `Precio`, `Minifoto_src`) VALUES
('alhambra', 'Visita a la Alhambra', '2015-06-02', '10:00:00', '18:00:00', 'Asentada sobre la Colina Roja o Cerro de la Sabika, la ciudadela de la Alhambra se presenta erguida, orgullosa y eterna, como uno de los complejos arquitectÃ³nicos mÃ¡s importantes de la Edad Media y mÃ¡ximo exponente del arte islÃ¡mico en Occidente.;\r\nLa visita a la Alhambra, Patrimonio de la Humanidad por la UNESCO, es fundamental si va a pasar unos dÃ­as en la ciudad.;\r\nEn esta visita se contarÃ¡ con guÃ­as turÃ­sticos oficiales que le acompaÃ±arÃ¡n recorriendo un sitio Ãºnico en el mundo.', 'Alcazaba: la zona mÃ¡s antigua del complejo con pasado militar.;\r\nPalacios NazarÃ­es: destacan los Palacios del Mexuar, de Comares y de los Leones, mÃ¡ximo exponente del arte nazarÃ­.;\r\nGeneralife: palacio de verano del sultÃ¡n, rodeado de extensos jardines.;\r\nIncluye autobÃºs de ida y vuelta.', 'images/actividades/alhambra1.jpg', 'Alhambra', 'alhambra', 45, 'images/actividades/miniAlhambra.jpg'),
('cahorros', 'Ruta por los Cahorros', '2015-06-02', '10:00:00', '14:00:00', 'Monachil es un pueblo que estÃ¡ situado a tan sÃ³lo unos 8 kilÃ³metros hacia el sureste de Granada, en la parte del centro-sur de la comarca de la Vega de Granada. Es aquÃ­ donde estÃ¡n Los Cahorros, una zona de alucinantes paisajes ideal para hacer senderismo o practicar escalada.;\r\n\r\nLa ruta de Los Cahorros discurre bordeando el rÃ­o Monachil, el cual nace en el pico Veleta (el segundo mÃ¡s alto de la Sierra Nevada y el cuarto del paÃ­s). Y este rÃ­o es el gran artÃ­fice del impresionante paisaje, altas montaÃ±as que han sido escarvadas durante siglos por sus aguas. Los viajeros van caminando entre las paredes, en ocasiones bastante estrechas, que el Monachil consiguir modelar.;', 'Incluye autobÃºs ida y vuelta.;\r\nPicnic incluido.', 'images/actividades/cahorros1.jpg', 'Cahorros', 'cahorros', 10, 'images/actividades/miniCahorros.jpg'),
('cena-gala', 'Cena de gala', '2015-06-03', '22:00:00', '00:00:00', 'La cena de gala se harÃ¡ en el hotel NazarÃ­es.\r\n', 'Obligatorio ir de etiqueta.', 'images/actividades/cena1.jpg', 'Cena de Gala', 'cena-gala', 25, 'images/actividades/miniCena.jpg'),
('sierra-nevada', 'Visita a Sierra Nevada', '2015-06-01', '08:00:00', '17:00:00', 'Sierra Nevada se encuentra en la parte central de la Cordillera PenibÃ©tica y es una de las areas montaÃ±osas mÃ¡s extentas de la penÃ­nsula.;\r\n\r\nPodrÃ¡ visitar el CAR, donde entrenan deportistas de la talla de Mireia Belmonte, campeona mundial de nataciÃ³n.;\r\n\r\nAdemÃ¡s la visita incluye una hora de alquiler de trineo, para poder sentir la experiencia de deslizarse por la nieve, y una vuelta en el Trineo Ruso y competir con sus amigos para ver quiÃ©n es el mÃ¡s rÃ¡pido.', 'Visita al Centro de Alto Rendimiento (CAR) deportivo.;1 hora de alquiler de trineos.;1 vuelta en el Trineo Ruso.;Incluye autobÃºs de ida y vuelta.;Se recomienda llevar calzado cÃ³modo.', 'images/actividades/sierra-nevada1.jpg', 'Sierra Nevada', 'sierra-nevada', 70, 'images/actividades/miniSierra.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntados_actividad`
--

CREATE TABLE IF NOT EXISTS `apuntados_actividad` (
  `email` varchar(40) NOT NULL,
  `ID_act` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apuntados_actividad`
--

INSERT INTO `apuntados_actividad` (`email`, `ID_act`) VALUES
('admin@admin.com', 'alhambra'),
('pepe@congresista.com', 'alhambra'),
('luis@profesor.com', 'cahorros'),
('admin@admin.com', 'cena-gala'),
('pepe@congresista.com', 'cena-gala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE IF NOT EXISTS `cuotas` (
  `ID_cuota` varchar(15) NOT NULL,
  `Nombre_cuota` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`ID_cuota`, `Nombre_cuota`, `Descripcion`, `Precio`) VALUES
('Estudiante', 'Estudiante', 'Cuota para estudiante.', 15),
('Invitado', 'Invitado', 'Cuota par a inivitado.', 15),
('Profesor', 'Profesor', 'Cuota de profesor.', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota_actividad`
--

CREATE TABLE IF NOT EXISTS `cuota_actividad` (
  `ID_cuota` varchar(15) NOT NULL,
  `ID_act` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuota_actividad`
--

INSERT INTO `cuota_actividad` (`ID_cuota`, `ID_act`) VALUES
('Profesor', 'cena-gala');

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
  `Tipo` int(11) NOT NULL,
  `Centro` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `Nombre`, `Apellidos`, `Telefono`, `Contrasena`, `ID_cuota`, `Tipo`, `Centro`) VALUES
('aceitedesilicona@gmail.com', 'Aceite', 'Silicona', '958445544', 'bbdcec4f0a79d68c048fbfb7ba7d936b8f040e26', 'Estudiante', 0, NULL),
('admin@admin.com', 'MiKe', 'Sanchez', '958151515', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Invitado', 1, NULL),
('antonio@estudiante.com', 'Antonio', 'Jimenez', '958774477', '4c663d666680cd1a68d6c3c63327aade2545a647', 'Estudiante', 0, NULL),
('Juan@profesor.com', 'Juan', 'Cuesta', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Profesor', 0, 'UCM'),
('luis@profesor.com', 'Luis', 'Martinez', '958145451', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Profesor', 0, NULL),
('pedro@congresista.com', 'Pedro', 'Perez', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Estudiante', 0, NULL),
('pepe@congresista.com', 'Pepe', 'Sanchez', '958665566', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Estudiante', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
 ADD PRIMARY KEY (`ID_act`);

--
-- Indices de la tabla `apuntados_actividad`
--
ALTER TABLE `apuntados_actividad`
 ADD PRIMARY KEY (`email`,`ID_act`), ADD KEY `Restriccion de ID_act externa` (`ID_act`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
 ADD PRIMARY KEY (`ID_cuota`);

--
-- Indices de la tabla `cuota_actividad`
--
ALTER TABLE `cuota_actividad`
 ADD PRIMARY KEY (`ID_cuota`,`ID_act`), ADD KEY `Actividad clave externa` (`ID_act`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`email`), ADD KEY `Nombre_cuota` (`ID_cuota`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuntados_actividad`
--
ALTER TABLE `apuntados_actividad`
ADD CONSTRAINT `Restriccion de ID_act externa` FOREIGN KEY (`ID_act`) REFERENCES `actividades` (`ID_act`) ON UPDATE CASCADE,
ADD CONSTRAINT `Restriccion de email usuario externa` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuota_actividad`
--
ALTER TABLE `cuota_actividad`
ADD CONSTRAINT `Actividad clave externa` FOREIGN KEY (`ID_act`) REFERENCES `actividades` (`ID_act`) ON UPDATE CASCADE,
ADD CONSTRAINT `Cuota clave externa` FOREIGN KEY (`ID_cuota`) REFERENCES `cuotas` (`ID_cuota`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `Restriccion clave externa cuota` FOREIGN KEY (`ID_cuota`) REFERENCES `cuotas` (`ID_cuota`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
