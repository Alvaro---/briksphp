-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2015 a las 18:50:44
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `briks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idModelo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idInscripcion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idContacto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `celular` varchar(8) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `nombre`, `celular`, `correo`, `direccion`) VALUES
(1, '', '', '', ''),
(2, 'Cesar Mercado', '72525503', 'cesar@hotmail.com', 'Alto Seguencoma calle 12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `idHorario` int(11) NOT NULL,
  `codHora` varchar(5) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `aula` varchar(10) NOT NULL,
  `idDocente` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `codHora`, `idMateria`, `aula`, `idDocente`) VALUES
(1, 'A1', 1, '3', 2),
(3, 'A2', 2, 'Robotica', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE IF NOT EXISTS `horas` (
  `codHora` varchar(5) NOT NULL,
  `horaInicial` time NOT NULL,
  `horaFinal` time NOT NULL,
  `dia` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`codHora`, `horaInicial`, `horaFinal`, `dia`) VALUES
('A1', '09:30:00', '11:00:00', 'Lunes'),
('B1', '09:00:00', '11:00:00', 'Martes'),
('C1', '09:00:00', '11:00:00', 'Miercoles'),
('D1', '09:00:00', '11:00:00', 'Jueves'),
('E1', '09:00:00', '11:00:00', 'Viernes'),
('A2', '11:00:00', '12:00:00', 'Lunes'),
('B2', '11:00:00', '12:00:00', 'Martes'),
('A3', '14:30:00', '16:00:00', 'Lunes'),
('A4', '16:15:00', '17:45:00', 'Lunes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `idInscripcion` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `idNino` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `idMateria` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `menorEdad` int(2) NOT NULL,
  `mayorEdad` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `materia`, `estado`, `menorEdad`, `mayorEdad`) VALUES
(1, 'Arquitectura', 'no activa', 3, 5),
(2, 'robotica Junior', 'no activa', 6, 8),
(5, 'Robotica b4k', 'no activa', 9, 15),
(6, 'Ingenieria', 'no activa', 6, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `idModelo` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `idMateria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nino`
--

CREATE TABLE IF NOT EXISTS `nino` (
  `idNino` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apPaterno` varchar(30) NOT NULL,
  `apMaterno` varchar(30) NOT NULL,
  `telefono` varchar(7) NOT NULL,
  `idContactoPapa` int(11) NOT NULL,
  `idContactoMama` int(11) NOT NULL,
  `nacimiento` date NOT NULL,
  `notas` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nino`
--

INSERT INTO `nino` (`idNino`, `nombres`, `apPaterno`, `apMaterno`, `telefono`, `idContactoPapa`, `idContactoMama`, `nacimiento`, `notas`, `estado`) VALUES
(1, 'Alvaro Miguel', 'Mercado', 'Valle', '2751200', 2, 1, '1992-02-08', '			', 'no'),
(2, 'Matias', '', '', '784512', 1, 1, '2011-05-02', '			', 'no'),
(3, 'Monserrat', '', '', '', 1, 1, '2003-02-05', '			', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(7) DEFAULT NULL,
  `nick` varchar(10) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `calular` varchar(8) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `telefono`, `nick`, `clave`, `tipo`, `calular`) VALUES
(1, 'system', NULL, 'system', 'system', 'admin', '0000'),
(2, 'system2', '2751200', 'system2', 'system2', 'user', '74084619');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsistencia`), ADD KEY `foreignKey_asistencia_usuario` (`idUsuario`), ADD KEY `foreignKey_asistencia_inscripcion` (`idInscripcion`), ADD KEY `asistencia_ibfk_1` (`idModelo`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`), ADD UNIQUE KEY `usuarioCelular` (`celular`,`nombre`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`), ADD KEY `foreignKey_horario_materia` (`idMateria`), ADD KEY `foreignKey_horario_hora` (`codHora`), ADD KEY `foreignKey_horario_docente` (`idDocente`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`codHora`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idInscripcion`), ADD KEY `foreignKey_inscripcion_horario` (`idHorario`), ADD KEY `foreignKey_inscripcion_Nino` (`idNino`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`idModelo`), ADD KEY `foreignKey_modelo_materias` (`idMateria`);

--
-- Indices de la tabla `nino`
--
ALTER TABLE `nino`
  ADD PRIMARY KEY (`idNino`), ADD UNIQUE KEY `nombreTelefono` (`telefono`,`nombres`), ADD KEY `contactoPapa` (`idContactoPapa`), ADD KEY `contactoMama` (`idContactoMama`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `idModelo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nino`
--
ALTER TABLE `nino`
  MODIFY `idNino` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
