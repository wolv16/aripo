-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-02-2015 a las 21:50:15
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aripo`
--
--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE IF NOT EXISTS `regiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `nombre`) VALUES
(1, 'mixteca'),
(2, 'valles'),
(3, 'istmo'),
(4, 'papaloapan'),
(5, 'sierra norte'),
(6, 'sierra sur'),
(7, 'cañada'),
(8, 'costa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE IF NOT EXISTS `distritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`, `region_id`) VALUES
(1, 'etla', 3),
(2, 'zimatlan', 2),
(3, 'centro', 3),
(4, 'ocotlan', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distrito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`, `distrito_id`) VALUES
(1, 'Municipio uno', 1),
(2, 'Municipio dos', 2),
(3, 'Municipio tres', 1);

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`, `municipio_id`) VALUES
(1, 'Localidad uno', 1),
(2, 'Localidad dos', 1),
(3, 'Localidad tres', 2),
(4, 'Localidad cuatro', 2),
(5, 'Localidad cinco', 2),
(6, 'Localidad seis', 3),
(7, 'Localidad siete', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposetnicos`
--

CREATE TABLE IF NOT EXISTS `gruposetnicos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `gruposetnicos`
--

INSERT INTO `gruposetnicos` (`id`, `nombre`) VALUES
(1, 'TRIQUIS'),
(2, 'MIXES'),
(3, 'HUICHOLES'),
(4, 'TOTONACAS'),
(5, 'CUICATECOS'),
(6, 'CHONTALES'),
(7, 'AMUZGOS'),
(8, 'CHATINOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ramas`
--

CREATE TABLE IF NOT EXISTS `ramas` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `ramas`
--

INSERT INTO `ramas` (`id`, `nombre`) VALUES
(1, 'Textiles'),
(2, 'Madera'),
(3, 'Cerería'),
(4, 'Metalistería'),
(5, 'Orfebrería'),
(6, 'Joyería'),
(7, 'Arte Huichol'),
(8, 'Concha y Caracol'),
(9, 'Vidrio'),
(10, 'Plumaría'),
(11, 'Maque y Laca'),
(12, 'Cuerno y Hueso'),
(13, 'Fibras Vegetales'),
(14, 'Cartonería y Papel'),
(15, 'Talabartería y Peletería'),
(16, 'Lapidaría y Cantería'),
(17, 'Alfarería y Cerámica');

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `comprasyventas`
--

CREATE TABLE IF NOT EXISTS `comprasyventas` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `comprasyventas`
--

INSERT INTO `comprasyventas` (`id`, `nombre`) VALUES
(1, 'LA MISMA COMUNIDAD'),
(2, 'CAPITAL DEL EDO'),
(3, 'MISMO MUNICIPIO'),
(4, 'DISTRITO CERCANO'),
(5, 'CIUDAD'),
(6, 'LOCALIDAD CERCANA'),
(7, 'siete'),
(8, 'ochos'),
(9, 'nueves'),
(10, 'MISMA LOCALIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concursos`
--

CREATE TABLE IF NOT EXISTS `concursos` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `nivel` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `premiacion` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `concursos`
--

INSERT INTO `concursos` (`id`, `nombre`, `fecha`, `nivel`, `premiacion`) VALUES
(4, 'BENITO JUAREZ', '2015-01-16', 'NACIONAL', '2014-12-12'),
(5, 'GRANDES MAESTROS', '2015-01-14', 'REGIONAL', '2015-12-12'),
(6, 'MAESTROS DE MARTE', '2015-01-22', 'ESTATAL', '2015-01-29'),
(7, 'GUELAGUETZA', '2015-01-09', 'ESTATAL', '2014-12-17'),
(8, 'ARTE DE MADERA', '2014-11-12', 'NACIONAL', '2014-12-25'),
(10, 'GRANDES MAESTROS DEL ARTE', '2014-12-10', 'NACIONAL', '2014-12-19'),
(11, 'CONCURSO DE PRUEBA', '2015-02-06', 'ESTATAL', '2015-02-24'),
(12, 'CONCURSO EJEMPLO', '2014-12-30', 'NACIONAL', '2015-01-31'),
(13, 'OTRO CONCURSO', '2015-02-05', 'ESTATAL', '2015-02-20'),
(14, 'CONCURSOUNO', '2015-02-13', 'NACIONAL', '2015-02-27'),
(15, 'CONCURSODOS', '2015-02-20', 'ESTATAL', '2015-01-13');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE IF NOT EXISTS `talleres` (
`id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `maestro` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `nombre`, `fechainicio`, `fechafin`, `maestro`) VALUES
(5, 'TALLER EJEMPLO', '2014-12-12', '2015-02-13', 'MAESTRO '),
(6, 'TALLER EJEMPLO2', '2014-12-25', '2015-02-27', 'MAESTRO 2'),
(12, 'TALLER EJEMPLO 3', '2014-12-26', '2015-01-30', 'OTRO MAESTRO DE EJEMPLO'),
(13, 'TALLER EJEMPLO4', '2014-12-22', '2015-01-25', 'MAESTRO DE EJEMPLO'),
(14, 'UN TALLER MÁS', '2014-12-01', '2015-02-12', 'MAESTRO MAS'),
(15, 'TALLER DE FIBRAS', '2015-01-23', '2015-03-11', 'JUAN MARTINEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizaciones`
--

CREATE TABLE IF NOT EXISTS `organizaciones` (
`id` int(11) NOT NULL COMMENT ' ',
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` char(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `organizaciones`
--

INSERT INTO `organizaciones` (`id`, `nombre`, `telefono`) VALUES
(1, 'SIERRA MADRE', '1234511123'),
(2, 'TECNOLOGICO DE OAXACA', '1431211331'),
(3, 'ARIPO', '1234567'),
(4, 'HERNANDEZ', '1234567'),
(5, 'ACADEMIA SISTEMAS', '1234568'),
(6, 'ACADEMIA', '985423'),
(9, 'ejeomplo', '9511674934');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comites`
--

CREATE TABLE IF NOT EXISTS `comites` (
`id` int(11) NOT NULL,
  `organizacion_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `comites`
--

INSERT INTO `comites` (`id`, `organizacion_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 9);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT ' ',
  `cuis` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT ' ',
  `observaciones` text COLLATE utf8_spanish_ci,
  `fechanacimiento` date NOT NULL,
  `grupoetnico_id` int(11) NOT NULL,
  `localidad_id` int(11) NOT NULL,
  `rama_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `paterno`, `materno`, `curp`, `sexo`, `cuis`, `observaciones`, `fechanacimiento`, `grupoetnico_id`, `localidad_id`, `rama_id`) VALUES
(1, 'ELIEL', 'NAVA', 'CANO', 'NACE911116HOCVNL02', 'Masculino', 'numcuis1223', 'ninguna', '2014-11-16', 2, 4, 2),
(3, 'DAVID', 'RAMIREZ', '', 'CURPDEDAVIDOP14HOC', 'Masculino', 'cuisdedavid12', 'Ninguna', '2014-12-28', 2, 7, 3),
(4, 'ALBERTO', 'RAMÍREZ', '', 'CURPDELALBERTO2922', 'Masculino', 'cuisdealberto', 'Ninguna', '1955-04-08', 2, 5, 3),
(5, 'MIGUEL ANGEL', 'RODRÍGUEZ', 'MORALES', 'ROMM571223HO', 'Masculino', 'numcuis12', 'Ninguna', '2015-01-20', 2, 2, 1),
(6, 'MARIA', 'CHUCHENA', 'LARA', 'CURPDEMARI123', 'Femenino', '', '', '2015-01-23', 1, 1, 1),
(7, 'DIANA', 'MORALES', 'LIMON', 'CURPDEDIANA123456', 'Femenino', 'nodecuis1234', 'no hay', '2014-11-16', 2, 3, 2),
(8, 'FRANCISCO', 'SÁNCHEZ', 'SÁNCHEZ', 'XISKSSKSKKSKSKKKKK', 'Masculino', '', 'ninguna', '2015-01-13', 1, 1, 1),
(9, 'JOSE', 'MARTINEZ', 'SÁNCHEZ', 'CURPDEJOSEEEEEEEEE', 'Masculino', '', '', '2015-01-26', 1, 1, 1),
(16, 'ALGUIEN', 'PEREZ', '', 'NACE911116HOCVNL01', 'Masculino', 'cuisnumber', '', '2008-02-05', 5, 1, 1),
(17, 'WENDY', 'PEREZ', 'marquez', 'curpdewendyperes', 'Femenino', NULL, 'no', '2003-10-15', 3, 2, 5),
(20, 'ELIEL', 'NAVA', 'CANO', 'NACE911116HOCVNL08', 'Femenino', 'Sin numero', 'Ninguna', '2007-01-29', 5, 3, 9),
(21, 'SAS', 'ASAS', 'ASAS', 'NACE911116HOCVNL07', 'Masculino', 'Sin numero', 'Ninguna', '2007-02-18', 1, 1, 1),
(22, 'RICARDO', 'BAÑOS', 'SOLIS', 'BASR860219HOCXLR09', 'Masculino', '', '', '1986-02-19', 4, 5, 12),
(23, 'RICARDO', 'BAÑOS', 'MARTINEZ', 'RASR860219HOCXLR09', 'Masculino', '', '', '2009-01-12', 1, 1, 6);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `artesanos`
--

CREATE TABLE IF NOT EXISTS `artesanos` (
`id` int(11) NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estadocivil` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `ine` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `taller` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `artesanos`
--

INSERT INTO `artesanos` (`id`, `rfc`, `estadocivil`, `fecharegistro`, `ine`, `taller`, `persona_id`) VALUES
(1, 'RFCFICTICIODE', 'Soltero', '2014-11-30', '1212343848588', 'Familiar', 1),
(3, 'RFCDELAWENDY3', 'Casado', '2015-01-10', '1212343848588', 'Familiar', 3),
(4, '', 'Casado', '2015-01-11', '1213444444433', 'Familiar', 4),
(5, 'HSHSHHDH23445', 'Soltero', '2015-01-25', '', 'Individual', 5),
(6, '', 'Soltero', '2015-01-26', '', 'Familiar', 6),
(7, '', 'Soltero', '2015-01-26', '', 'Familiar', 7),
(9, '', 'Casado', '2015-02-16', '', 'Individual', 16),
(10, '', 'Soltero', '2015-02-19', '1234567920322', 'Individual', 22),
(11, '', 'Casado', '2015-02-19', '1234556893023', 'Familiar', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ferias`
--

CREATE TABLE IF NOT EXISTS `ferias` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lugar` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ferias`
--

INSERT INTO `ferias` (`id`, `nombre`, `fechainicio`, `fechafin`, `tipo`, `lugar`) VALUES
(2, 'FERIA DE LOS MOLES', '2014-12-09', '2015-01-30', 'NACIONAL', 'Oaxaca centro'),
(3, 'FERIA DE PRODUCTORES DE BARRO NEGRO', '2014-12-17', '2015-01-29', 'PABELLON FONART', 'San Bartolo'),
(4, 'FERIA DEL METAL', '2014-12-30', '2015-01-25', 'PABELLÓN FONART', 'SAN JUAN'),
(5, 'FERIA FIBRAS NATURALES', '2015-01-01', '2015-02-27', 'NACIONAL', 'OAXACA DE JUAREZ'),
(6, 'FERIA 5 GRANDES RAMAS', '2015-01-01', '2015-02-25', 'REGIONAL', 'COL ESTRELLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano_comite`
--

CREATE TABLE IF NOT EXISTS `artesano_comite` (
  `artesano_id` int(11) NOT NULL,
  `comite_id` int(11) NOT NULL,
  `cargo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artesano_comite`
--

INSERT INTO `artesano_comite` (`artesano_id`, `comite_id`, `cargo`) VALUES
(1, 4, 'Secretario'),
(3, 4, 'Tesorero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano_comprasyventa`
--

CREATE TABLE IF NOT EXISTS `artesano_comprasyventa` (
  `artesano_id` int(11) NOT NULL,
  `comprasyventa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artesano_comprasyventa`
--

INSERT INTO `artesano_comprasyventa` (`artesano_id`, `comprasyventa_id`) VALUES
(10, 1),
(1, 2),
(3, 3),
(11, 3),
(3, 5),
(10, 5),
(5, 7),
(7, 7),
(10, 7),
(11, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano_concurso`
--

CREATE TABLE IF NOT EXISTS `artesano_concurso` (
  `concurso_id` int(11) NOT NULL,
  `artesano_id` int(11) NOT NULL,
  `premio` varchar(80) COLLATE utf8_spanish_ci DEFAULT 'Ninguno',
  `numregistro` int(11) NOT NULL,
  `categoria` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pieza` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `produccion` int(11) DEFAULT NULL,
  `costounitario` int(11) DEFAULT NULL,
  `avaluo` int(11) DEFAULT NULL,
  `entrego` varchar(100) COLLATE utf8_spanish_ci DEFAULT 'Artesano',
  `fechadev` date DEFAULT '0000-00-00',
  `calidad` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recibio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artesano_concurso`
--

INSERT INTO `artesano_concurso` (`concurso_id`, `artesano_id`, `premio`, `numregistro`, `categoria`, `pieza`, `produccion`, `costounitario`, `avaluo`, `entrego`, `fechadev`, `calidad`, `recibio`, `fecharegistro`, `observaciones`) VALUES
(4, 6, 'Ninguno', 20501, 'algodon', 'manta', 23, 23, 23, 'malena', '2015-02-03', 'Buena', 'profirio', '2015-02-01', 'Ninguna'),
(7, 4, 'Primer lugar', 20501, 'algodon', 'manta', 23, 23, 23, 'porfis', '2015-02-19', 'Buena', 'profirio', '2015-02-01', 'Ninguna'),
(11, 4, 'Ninguno', 20505, 'barro', 'jarron', 12, 12, 12, 'Sin registro', '2015-02-27', 'buena', 'porfirio', '2015-02-12', 'Ninguna'),
(15, 11, 'Ninguno', 20505, 'assas', 'asasasa', 12, 12, 12, NULL, '0000-00-00', 'buena', NULL, '2015-02-19', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano_feria`
--

CREATE TABLE IF NOT EXISTS `artesano_feria` (
  `feria_id` int(11) NOT NULL,
  `artesano_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artesano_feria`
--

INSERT INTO `artesano_feria` (`feria_id`, `artesano_id`) VALUES
(5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano_organizacion`
--

CREATE TABLE IF NOT EXISTS `artesano_organizacion` (
  `artesano_id` int(11) NOT NULL,
  `organizacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `artesano_organizacion`
--

INSERT INTO `artesano_organizacion` (`artesano_id`, `organizacion_id`) VALUES
(3, 2),
(4, 2),
(4, 4),
(7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano_taller`
--

CREATE TABLE IF NOT EXISTS `artesano_taller` (
  `artesano_id` int(11) NOT NULL,
  `taller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso_persona`
--

CREATE TABLE IF NOT EXISTS `concurso_persona` (
  `concurso_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `premio` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numregistro` int(11) NOT NULL,
  `categoria` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pieza` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `produccion` int(11) DEFAULT NULL,
  `costounitario` int(11) DEFAULT NULL,
  `avaluo` int(11) DEFAULT NULL,
  `entrego` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechadev` date DEFAULT NULL,
  `calidad` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recibio` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecharegistro` date DEFAULT '0000-00-00' COMMENT '	',
  `observaciones` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `concurso_persona`
--

INSERT INTO `concurso_persona` (`concurso_id`, `persona_id`, `premio`, `numregistro`, `categoria`, `pieza`, `produccion`, `costounitario`, `avaluo`, `entrego`, `fechadev`, `calidad`, `recibio`, `fecharegistro`, `observaciones`) VALUES
(15, 1, 'Primer Lugar', 20501, 'asass', 'asa', 12, 12, 212121, 'Artesano', '2015-02-25', 'as', 'asas', '2015-02-18', 'sasas'),
(15, 9, 'Segungo Lugar', 20502, 'asasas', 'asasas', 12, 12, 12, 'Artesano', '2015-02-14', 'asa', 'asas', '2015-02-18', 'asas'),
(15, 20, 'Ninguno', 20503, 'asas', 'asas', 12, 23, 23, 'Artesano', '2015-02-01', 'asas', 'asa', '2015-02-18', 'asas'),
(15, 21, 'Mencion Honorifica', 20504, 'asa', 'asa', 12, 12, 12, 'Artesano', '2015-02-24', 'as', 'ass', '2015-02-18', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE IF NOT EXISTS `direcciones` (
`id` int(11) NOT NULL,
  `calle` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `colonia` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `calle`, `num`, `cp`, `colonia`, `persona_id`) VALUES
(1, 'INDEPENDENCIA', 21, 68263, 'SANTIAGO', 1),
(3, 'INDEPENDENCIA', 21, 68263, '1ERA ETAPA', 3),
(4, 'TINOCO', 21, 68263, 'SANTIAGO', 4),
(5, 'INDEPENDENCIA', 21, 68263, 'CENTRO', 5),
(6, 'MARTIRES', 21, 68263, 'SANTIAGO', 6),
(7, 'INDEPENDENCIA', 21, 68263, 'ESTRELLA', 7),
(8, 'HIDALGO', 21, 68263, 'SANTIAGO', 8),
(9, 'MORELOS', 21, 68263, 'VOLCANES', 9),
(11, 'nose', NULL, 0, 'col buena vista', 16),
(13, 'asasa', NULL, 12212, 'sanan', 20),
(14, '', NULL, 0, 'as', 21),
(15, 'INDEPENDENCIA', NULL, 68000, 'CENTRO', 22),
(16, 'MORELOS', NULL, 68900, 'CENTROO', 23);

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`, `ruta`, `persona_id`) VALUES
(1, 'Foto del artesano', 'imgs/perfil/default.png', 22),
(2, 'Foto del artesano', 'imgs/perfil/default.png', 23);

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `produccionmensual` smallint(6) DEFAULT NULL,
  `costoaprox` smallint(6) DEFAULT NULL,
  `artesano_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `produccionmensual`, `costoaprox`, `artesano_id`) VALUES
(1, 'CANASTA', 23, 140, 10),
(2, '', 0, 0, 11);

-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'normal'),
(2, 'admin');

-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE IF NOT EXISTS `telefonos` (
`id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `lada` smallint(6) DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id`, `numero`, `lada`, `tipo`, `persona_id`) VALUES
(1, 5123333, 951, 'Vecino', 1),
(3, 5123333, 951, 'Casa', 3),
(4, 5123333, 951, 'Casa', 4),
(5, 5123333, 951, 'Casa', 5),
(6, 5123333, 951, 'Casa', 6),
(7, 5123333, 951, 'Casa', 7),
(8, 5123333, 951, 'Casa', 8),
(9, 5123333, 951, 'Casa', 9),
(16, 21, 0, 'Celular', 16),
(18, 12, 122, 'Vecino', 20),
(19, 0, 0, '', 21),
(20, 12, 951, 'Caseta', 22),
(21, 12, 123, 'Casa', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT '		',
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `role_id`) VALUES
(1, 'Eliel', '$2y$10$Fb8ECxfzLJdhhA9VezQYQuil34H6F.J/8oextGJehs4PbFra96haa', 'WZBiy1I6FC5IAq79vzgZYVfUiN38WGIYW3QuO0BhqspT3CjNB3hSzJCHALE9', 2),
(2, 'Omar', '$2y$10$ufFmzJ4W3MAVN2AH7UB/IuKk5sk0kgjj5DczJXtTpKHquG5UNG5T6', 'Cb2Hk1tx10piKrZdS6wCNJsvcfsqrWULYt1Z9w2bWWnwfMiMl1qHa74wgU7l', 2),
(3, 'Usuario', '$2y$10$Fb8ECxfzLJdhhA9VezQYQuil34H6F.J/8oextGJehs4PbFra96haa', 'zwqKHaUjpj0EdMZVOxCoLnDRNcNjUlwUTggjCJrg34vsvNa3HhRpcyVqsrdh', 1),
(5, 'Administrador', '$2y$10$se9Lfn7wyE4aD1NiUPUOiOuYraOZF/x7BlOGm6Qux3fBUMVK3cr1m', 'KFMMhG7iCcH408SiWJReE1o0foV66X67ySAbxIw6w6n25VBH7l5TltLHQrXe', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artesanos`
--
ALTER TABLE `artesanos`
 ADD PRIMARY KEY (`id`,`persona_id`), ADD KEY `fk_artesanos_personas1_idx` (`persona_id`);

--
-- Indices de la tabla `artesano_comite`
--
ALTER TABLE `artesano_comite`
 ADD PRIMARY KEY (`artesano_id`,`comite_id`), ADD KEY `fk_artesanos_has_comites_comites1_idx` (`comite_id`), ADD KEY `fk_artesanos_has_comites_artesanos1_idx` (`artesano_id`);

--
-- Indices de la tabla `artesano_comprasyventa`
--
ALTER TABLE `artesano_comprasyventa`
 ADD PRIMARY KEY (`artesano_id`,`comprasyventa_id`), ADD KEY `fk_artesanos_has_comprasyventas_comprasyventas1_idx` (`comprasyventa_id`), ADD KEY `fk_artesanos_has_comprasyventas_artesanos1_idx` (`artesano_id`);

--
-- Indices de la tabla `artesano_concurso`
--
ALTER TABLE `artesano_concurso`
 ADD PRIMARY KEY (`concurso_id`,`artesano_id`), ADD KEY `fk_concursos_has_artesanos_artesanos1_idx` (`artesano_id`), ADD KEY `fk_concursos_has_artesanos_concursos1_idx` (`concurso_id`);

--
-- Indices de la tabla `artesano_feria`
--
ALTER TABLE `artesano_feria`
 ADD PRIMARY KEY (`feria_id`,`artesano_id`), ADD KEY `fk_ferias_has_artesanos_artesanos1_idx` (`artesano_id`), ADD KEY `fk_ferias_has_artesanos_ferias1_idx` (`feria_id`);

--
-- Indices de la tabla `artesano_organizacion`
--
ALTER TABLE `artesano_organizacion`
 ADD PRIMARY KEY (`artesano_id`,`organizacion_id`), ADD KEY `fk_artesanos_has_organizaciones_organizaciones1_idx` (`organizacion_id`), ADD KEY `fk_artesanos_has_organizaciones_artesanos1_idx` (`artesano_id`);

--
-- Indices de la tabla `artesano_taller`
--
ALTER TABLE `artesano_taller`
 ADD PRIMARY KEY (`taller_id`,`artesano_id`), ADD KEY `fk_artesanos_has_talleres_talleres1_idx` (`taller_id`), ADD KEY `fk_artesanos_has_talleres_artesanos1_idx` (`artesano_id`);

--
-- Indices de la tabla `comites`
--
ALTER TABLE `comites`
 ADD PRIMARY KEY (`id`,`organizacion_id`), ADD KEY `fk_comite_organizaciones1` (`organizacion_id`);

--
-- Indices de la tabla `comprasyventas`
--
ALTER TABLE `comprasyventas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concursos`
--
ALTER TABLE `concursos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concurso_persona`
--
ALTER TABLE `concurso_persona`
 ADD PRIMARY KEY (`concurso_id`,`persona_id`), ADD KEY `fk_concursos_has_personas_personas1_idx` (`persona_id`), ADD KEY `fk_concursos_has_personas_concursos1_idx` (`concurso_id`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
 ADD PRIMARY KEY (`id`,`persona_id`), ADD KEY `fk_direcciones_personas1_idx` (`persona_id`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
 ADD PRIMARY KEY (`id`,`region_id`), ADD KEY `fk_distritos_regiones1_idx` (`region_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_documentos_personas1_idx` (`persona_id`);

--
-- Indices de la tabla `ferias`
--
ALTER TABLE `ferias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gruposetnicos`
--
ALTER TABLE `gruposetnicos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
 ADD PRIMARY KEY (`id`,`municipio_id`), ADD KEY `fk_localidades_municipios1_idx` (`municipio_id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
 ADD PRIMARY KEY (`id`,`distrito_id`), ADD KEY `fk_municipios_distritos1_idx` (`distrito_id`);

--
-- Indices de la tabla `organizaciones`
--
ALTER TABLE `organizaciones`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
 ADD PRIMARY KEY (`id`,`localidad_id`,`grupoetnico_id`,`rama_id`), ADD KEY `fk_personas_grupoetnico1_idx` (`grupoetnico_id`), ADD KEY `fk_personas_localidades1_idx` (`localidad_id`), ADD KEY `fk_personas_ramas1_idx` (`rama_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`,`artesano_id`), ADD KEY `fk_productos_artesanos1_idx` (`artesano_id`);

--
-- Indices de la tabla `ramas`
--
ALTER TABLE `ramas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
 ADD PRIMARY KEY (`id`,`persona_id`), ADD KEY `fk_telefonos_personas1_idx` (`persona_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`,`role_id`), ADD KEY `fk_users_roles1_idx` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artesanos`
--
ALTER TABLE `artesanos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `comites`
--
ALTER TABLE `comites`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `comprasyventas`
--
ALTER TABLE `comprasyventas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `concursos`
--
ALTER TABLE `concursos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ferias`
--
ALTER TABLE `ferias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `gruposetnicos`
--
ALTER TABLE `gruposetnicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `organizaciones`
--
ALTER TABLE `organizaciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ramas`
--
ALTER TABLE `ramas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `artesanos`
--
ALTER TABLE `artesanos`
ADD CONSTRAINT `fk_artesanos_personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `artesano_comite`
--
ALTER TABLE `artesano_comite`
ADD CONSTRAINT `fk_artesanos_has_comites_artesanos1` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_artesanos_has_comites_comites1` FOREIGN KEY (`comite_id`) REFERENCES `comites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `artesano_comprasyventa`
--
ALTER TABLE `artesano_comprasyventa`
ADD CONSTRAINT `fk_artesanos_has_comprasyventas_artesanos1` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_artesanos_has_comprasyventas_comprasyventas1` FOREIGN KEY (`comprasyventa_id`) REFERENCES `comprasyventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `artesano_concurso`
--
ALTER TABLE `artesano_concurso`
ADD CONSTRAINT `fk_concursos_artesanos_artesanos1` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_concursos_artesanos_concursos1` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `artesano_feria`
--
ALTER TABLE `artesano_feria`
ADD CONSTRAINT `fk_ferias_artesanos_artesanos1` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ferias_artesanos_ferias1` FOREIGN KEY (`feria_id`) REFERENCES `ferias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `artesano_organizacion`
--
ALTER TABLE `artesano_organizacion`
ADD CONSTRAINT `fk_artesanos_has_organizaciones_artesanos1` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_artesanos_has_organizaciones_organizaciones1` FOREIGN KEY (`organizacion_id`) REFERENCES `organizaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `artesano_taller`
--
ALTER TABLE `artesano_taller`
ADD CONSTRAINT `fk_artesanos_has_talleres_artesanos1` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_artesanos_has_talleres_talleres1` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comites`
--
ALTER TABLE `comites`
ADD CONSTRAINT `fk_comite_organizaciones1` FOREIGN KEY (`organizacion_id`) REFERENCES `organizaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `concurso_persona`
--
ALTER TABLE `concurso_persona`
ADD CONSTRAINT `fk_concursos_personas_concursos1` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_concursos_personas_personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
ADD CONSTRAINT `fk_direcciones_personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `distritos`
--
ALTER TABLE `distritos`
ADD CONSTRAINT `fk_distritos_regiones1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
ADD CONSTRAINT `fk_documentos_personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
ADD CONSTRAINT `fk_localidades_municipios1` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
ADD CONSTRAINT `fk_municipios_distritos1` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
ADD CONSTRAINT `fk_personas_grupoetnico1` FOREIGN KEY (`grupoetnico_id`) REFERENCES `gruposetnicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_personas_localidades1` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_personas_ramas1` FOREIGN KEY (`rama_id`) REFERENCES `ramas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `fk_productos_artesanos1` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
ADD CONSTRAINT `fk_telefonos_personas1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
