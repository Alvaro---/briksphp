-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2015 a las 17:47:12
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`idAsistencia`, `fecha`, `idModelo`, `idUsuario`, `idInscripcion`) VALUES
(1, '2015-07-07', 1, 1, 27),
(2, '2015-07-29', 1, 2, 14),
(3, '2015-07-29', 2, 0, 15),
(4, '2015-07-29', 1, 2, 20),
(5, '2015-07-29', 0, 0, 19),
(6, '2015-07-27', 0, 0, 14),
(7, '2015-07-26', 1, 1, 14),
(8, '0000-00-00', 0, 0, 0),
(9, '2015-07-29', 2, 2, 0),
(10, '2015-07-29', 2, 2, 33),
(11, '2015-07-29', 2, 2, 29),
(12, '2015-07-29', 2, 2, 22),
(13, '2015-07-28', 1, 1, 24),
(14, '2015-07-28', 1, 1, 26),
(15, '2015-07-28', 1, 1, 35);

--
-- Disparadores `asistencia`
--
DELIMITER $$
CREATE TRIGGER `triger_bajaSesionesRestantes` AFTER INSERT ON `asistencia`
 FOR EACH ROW UPDATE inscripcion SET sesiones = sesiones - 1 WHERE idInscripcion = NEW.idInscripcion
$$
DELIMITER ;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `nombre`, `celular`, `correo`, `direccion`) VALUES
(1, '', '', '', ''),
(2, 'Cesar Mercado', '72525503', 'cesar@hotmail.com', 'Alto Seguencoma calle 12'),
(3, ' Alan Sanjines', '124578', 'alana@hotmail.com', 'Alto Tejar Calle 20 #85'),
(4, 'Alana Martinez', '124578', 'alana@yahoo.es', 'Alto Tejar Calle 20 #85'),
(5, 'Victor Pelaez', '784512', 'vico@hotmail.com', 'Obrajes calle 17 '),
(6, 'Vilma', '456789', '', 'Achumani calle 22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma`
--

CREATE TABLE IF NOT EXISTS `cronograma` (
  `idCronograma` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `idModelo` int(11) NOT NULL,
  `nota` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cronograma`
--

INSERT INTO `cronograma` (`idCronograma`, `fecha`, `idHorario`, `idModelo`, `nota`) VALUES
(1, '2015-07-28', 4, 2, 'Si viene Juancito hacer otro modelo'),
(3, '2015-07-28', 6, 1, 'Si viene Pedrito no hacer nada'),
(4, '2015-07-29', 4, 2, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `codHora`, `idMateria`, `aula`, `idDocente`) VALUES
(1, 'A1', 1, '3', 2),
(3, 'A2', 2, 'Robotica', 2),
(4, 'C1', 5, '5', 2),
(5, 'E1', 6, 'a', 2),
(6, 'B1', 6, '', 1),
(7, 'D1', 5, '1', 2),
(8, 'E2', 1, '', 1);

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
('A4', '16:15:00', '17:45:00', 'Lunes'),
('E2', '11:00:00', '12:30:00', 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `idInscripcion` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `idNino` int(11) NOT NULL,
  `sesiones` int(11) NOT NULL,
  `fechaInscripcion` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idInscripcion`, `idHorario`, `idNino`, `sesiones`, `fechaInscripcion`) VALUES
(14, 1, 1, 70, '2015-07-22'),
(15, 3, 1, 3, '2015-07-22'),
(16, 3, 3, 20, '0000-00-00'),
(17, 4, 3, 36, '2015-07-08'),
(18, 5, 2, 0, '0000-00-00'),
(19, 4, 1, -1, '2015-07-22'),
(20, 5, 1, 2, '2015-07-22'),
(21, 1, 2, 7, '2015-07-22'),
(22, 4, 2, 19, '2015-07-22'),
(23, 5, 3, 7, '2015-07-22'),
(24, 6, 1, 10, '2015-07-22'),
(25, 6, 2, 9, '2015-07-22'),
(26, 6, 3, 9, '2015-07-22'),
(27, 1, 4, 4, '2015-07-23'),
(29, 4, 5, 6, '2015-07-23'),
(30, 1, 6, 7, '2015-07-23'),
(31, 1, 5, 8, '2015-07-23'),
(32, 7, 7, 2, '2015-07-24'),
(33, 4, 7, 1, '2015-07-24'),
(34, 7, 1, 1, '2015-07-24'),
(35, 6, 8, 1, '2015-07-24'),
(36, 5, 8, 2, '2015-07-24'),
(37, 3, 8, 4, '2015-07-24'),
(38, 8, 8, 4, '2015-07-24');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`idModelo`, `modelo`, `idMateria`) VALUES
(1, 'Conejo', 5),
(2, 'Roller Ball', 5);

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
  `estado` varchar(10) NOT NULL,
  `colegio` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nino`
--

INSERT INTO `nino` (`idNino`, `nombres`, `apPaterno`, `apMaterno`, `telefono`, `idContactoPapa`, `idContactoMama`, `nacimiento`, `notas`, `estado`, `colegio`) VALUES
(1, 'Alvaro Miguel', 'Mercado', 'Valle', '2751200', 2, 1, '1992-02-08', '			', 'no', ''),
(2, 'Matias', '', '', '784512', 1, 1, '2011-05-02', '			', 'no', ''),
(3, 'Monserrat', '', '', '', 1, 1, '2003-02-05', '			', 'no', ''),
(4, 'Alan', 'Sanjines', 'Pelaez', '784512', 3, 4, '2012-12-15', '			', 'no', 'San Benito Nombre Largo'),
(5, 'Lucero', 'Palaez', 'YaÃ±ez', '745120', 5, 1, '2000-12-18', '			', 'no', 'Colegio 3 de Tarija '),
(6, 'Silvio', 'Rodriguez', '', '1234698', 1, 1, '2010-05-02', '			', 'no', 'San Ignacio de Loyola'),
(7, 'Juan ', 'Perez', 'Seras', '2756532', 1, 1, '2011-02-05', '			', 'no', 'Santo Domingo '),
(8, 'Joaquin Mateo', 'Quispe', 'Quispe', '2710112', 1, 6, '2009-02-05', '			', 'no', 'San Matias');

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

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_sesionesmateria`
--
CREATE TABLE IF NOT EXISTS `view_sesionesmateria` (
`idMateria` int(11)
,`suma` decimal(32,0)
,`idNino` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_sistentesdia`
--
CREATE TABLE IF NOT EXISTS `view_sistentesdia` (
`idHorario` int(11)
,`idNino` int(11)
,`sesiones` int(11)
,`idInscripcion` int(11)
,`idMateria` int(11)
,`nombre` varchar(112)
,`suma` decimal(32,0)
,`codHora` varchar(5)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_sesionesmateria`
--
DROP TABLE IF EXISTS `view_sesionesmateria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sesionesmateria` AS select `a`.`idMateria` AS `idMateria`,sum(`b`.`sesiones`) AS `suma`,`c`.`idNino` AS `idNino` from ((`horario` `a` join `inscripcion` `b`) join `nino` `c`) where ((`b`.`idHorario` = `a`.`idHorario`) and (`c`.`idNino` = `b`.`idNino`)) group by `c`.`idNino`,`a`.`idMateria`;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_sistentesdia`
--
DROP TABLE IF EXISTS `view_sistentesdia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sistentesdia` AS select `a`.`idHorario` AS `idHorario`,`b`.`idNino` AS `idNino`,`b`.`sesiones` AS `sesiones`,`b`.`idInscripcion` AS `idInscripcion`,`a`.`idMateria` AS `idMateria`,concat(`c`.`nombres`,' ',`c`.`apPaterno`,' ',`c`.`apMaterno`) AS `nombre`,`total`.`suma` AS `suma`,`d`.`codHora` AS `codHora` from ((((`horario` `a` join `inscripcion` `b`) join `nino` `c`) join `horas` `d`) join `view_sesionesmateria` `total`) where ((`b`.`idHorario` = `a`.`idHorario`) and (`c`.`idNino` = `b`.`idNino`) and (`a`.`codHora` = `d`.`codHora`) and (`total`.`idNino` = `b`.`idNino`) and (`total`.`idMateria` = `a`.`idMateria`));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsistencia`), ADD UNIQUE KEY `fecha` (`fecha`,`idInscripcion`), ADD KEY `foreignKey_asistencia_usuario` (`idUsuario`), ADD KEY `foreignKey_asistencia_inscripcion` (`idInscripcion`), ADD KEY `asistencia_ibfk_1` (`idModelo`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`), ADD UNIQUE KEY `usuarioCelular` (`celular`,`nombre`);

--
-- Indices de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`idCronograma`);

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
  ADD PRIMARY KEY (`idInscripcion`), ADD UNIQUE KEY `idHorario` (`idHorario`,`idNino`), ADD UNIQUE KEY `idHorario_2` (`idHorario`,`idNino`), ADD KEY `foreignKey_inscripcion_horario` (`idHorario`), ADD KEY `foreignKey_inscripcion_Nino` (`idNino`);

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
  MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `idCronograma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `idModelo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `nino`
--
ALTER TABLE `nino`
  MODIFY `idNino` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
