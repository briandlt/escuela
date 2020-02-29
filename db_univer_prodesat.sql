-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-02-2020 a las 05:44:38
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_univer_prodesat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_alumnos`
--

CREATE TABLE `cat_alumnos` (
  `iCodigoAlumno` int(4) NOT NULL,
  `vchNombres` varchar(50) NOT NULL,
  `vchApellidos` varchar(50) NOT NULL,
  `dtFechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='catalogo de alumnos';

--
-- Volcado de datos para la tabla `cat_alumnos`
--

INSERT INTO `cat_alumnos` (`iCodigoAlumno`, `vchNombres`, `vchApellidos`, `dtFechaNac`) VALUES
(1, 'juan pablo', 'perez sanchez', '1998-02-26'),
(2, 'maria', 'prado suarez', '1992-04-14'),
(3, 'mauricio', 'lopez juarez', '1996-05-12'),
(4, 'alan', 'ruiz santillan', '1995-09-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_materias`
--

CREATE TABLE `cat_materias` (
  `vchCodigoMateria` varchar(5) NOT NULL,
  `vchMateria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='catalogo de materias';

--
-- Volcado de datos para la tabla `cat_materias`
--

INSERT INTO `cat_materias` (`vchCodigoMateria`, `vchMateria`) VALUES
('mat04', 'fisica'),
('mat06', 'quimica'),
('mat09', 'español'),
('mat11', 'ingles'),
('mat12', 'matematicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rel_alumno_materia`
--

CREATE TABLE `cat_rel_alumno_materia` (
  `iCodigoAlumno` int(4) NOT NULL,
  `vchCodigoMateria` varchar(5) NOT NULL,
  `fCalificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla donde se guarda la calificacion del alumno. Para saber a que materia corresponde la calificacion, se guarda tambien la clave de la materia, ademas del codigo del alumno';

--
-- Volcado de datos para la tabla `cat_rel_alumno_materia`
--

INSERT INTO `cat_rel_alumno_materia` (`iCodigoAlumno`, `vchCodigoMateria`, `fCalificacion`) VALUES
(1, 'mat12', 7.7),
(1, 'mat11', 8.8),
(3, 'mat09', NULL),
(2, 'mat11', NULL),
(2, 'mat09', NULL),
(3, 'mat11', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_alumnos`
--
ALTER TABLE `cat_alumnos`
  ADD PRIMARY KEY (`iCodigoAlumno`);

--
-- Indices de la tabla `cat_materias`
--
ALTER TABLE `cat_materias`
  ADD PRIMARY KEY (`vchCodigoMateria`);

--
-- Indices de la tabla `cat_rel_alumno_materia`
--
ALTER TABLE `cat_rel_alumno_materia`
  ADD KEY `iCodigoAlumno` (`iCodigoAlumno`),
  ADD KEY `vchCodigoMateria` (`vchCodigoMateria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_alumnos`
--
ALTER TABLE `cat_alumnos`
  MODIFY `iCodigoAlumno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_rel_alumno_materia`
--
ALTER TABLE `cat_rel_alumno_materia`
  ADD CONSTRAINT `cat_rel_alumno_materia_ibfk_1` FOREIGN KEY (`iCodigoAlumno`) REFERENCES `cat_alumnos` (`iCodigoAlumno`),
  ADD CONSTRAINT `cat_rel_alumno_materia_ibfk_2` FOREIGN KEY (`vchCodigoMateria`) REFERENCES `cat_materias` (`vchCodigoMateria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
