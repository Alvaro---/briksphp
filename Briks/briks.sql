-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2015 a las 05:29:25
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE IF NOT EXISTS `horas` (
  `codHora` varchar(5) NOT NULL,
  `horaInicial` time NOT NULL,
  `horaFinal` time NOT NULL,
  `dia` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `idInscripcion` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `idNiño` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `idMateria` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `idModelo` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `idMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niño`
--

CREATE TABLE IF NOT EXISTS `niño` (
  `idNiño` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apPaterno` varchar(30) NOT NULL,
  `apMaterno` varchar(30) NOT NULL,
  `telefono` varchar(7) NOT NULL,
  `idContactoPapa` int(11) NOT NULL,
  `idContactoMama` int(11) NOT NULL,
  `nacimiento` date NOT NULL,
  `notas` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `telefono`, `nick`, `clave`, `tipo`, `calular`) VALUES
(1, 'system', NULL, 'system', 'system', 'admin', '0000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsistencia`), ADD KEY `foreignKey_asistencia_usuario` (`idUsuario`), ADD KEY `foreignKey_asistencia_inscripcion` (`idInscripcion`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

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
  ADD PRIMARY KEY (`idInscripcion`), ADD KEY `foreignKey_inscripcion_horario` (`idHorario`), ADD KEY `foreignKey_inscripcion_niño` (`idNiño`);

--
-- Indices de la tabla `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`idModelo`), ADD KEY `foreignKey_modelo_materias` (`idMateria`);

--
-- Indices de la tabla `niño`
--
ALTER TABLE `niño`
  ADD PRIMARY KEY (`idNiño`), ADD KEY `contactoPapa` (`idContactoPapa`), ADD KEY `contactoMama` (`idContactoMama`);

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
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materi`
--
ALTER TABLE `materi`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `idModelo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `niño`
--
ALTER TABLE `niño`
  MODIFY `idNiño` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`idAsistencia`) REFERENCES `modelos` (`idModelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `asistencia_ibfk_3` FOREIGN KEY (`idInscripcion`) REFERENCES `inscripcion` (`idInscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materi` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`codHora`) REFERENCES `horas` (`codHora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`idDocente`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`idNiño`) REFERENCES `niño` (`idNiño`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
ADD CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materi` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `niño`
--
ALTER TABLE `niño`
ADD CONSTRAINT `contactoMama` FOREIGN KEY (`idContactoMama`) REFERENCES `contacto` (`idContacto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `contactoPapa` FOREIGN KEY (`idContactoPapa`) REFERENCES `contacto` (`idContacto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
