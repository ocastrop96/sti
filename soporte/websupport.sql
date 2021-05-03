-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-02-2021 a las 05:33:20
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `websupport`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_EQUIPOC` (IN `_idEquipo` INT(11), IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_office` INT(11), IN `_service` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` DATE, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_placa` TEXT, IN `_procesador` TEXT, IN `_vprocesador` TEXT, IN `_ram` TEXT, IN `_discoDuro` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11))  BEGIN
UPDATE ws_equipos SET idTipo = _idTipo, uResponsable = _uResponsable, office = _office, service = _service, serie = _serie,sbn = _sbn,marca = _marca, modelo = _modelo,descripcion = _descripcion, fechaCompra = _fechaCompra, ordenCompra = _ordenCompra,garantia = _garantia, placa = _placa, procesador = _procesador, vprocesador = _vprocesador, ram = _ram,discoDuro = _discoDuro, condicion = _condicion, estadoEQ = _estadoEQ where idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_EQUIPOP` (IN `_idEquipo` INT(11), IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_office` INT(11), IN `_service` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` DATE, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11))  BEGIN
UPDATE ws_equipos SET idTipo = _idTipo, uResponsable = _uResponsable, office = _office, service = _service, serie = _serie,sbn = _sbn,marca = _marca, modelo = _modelo,descripcion = _descripcion, fechaCompra = _fechaCompra, ordenCompra = _ordenCompra,garantia = _garantia,condicion = _condicion, estadoEQ = _estadoEQ where idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_EQUIPOR` (IN `_idEquipo` INT(11), IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_office` INT(11), IN `_service` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` DATE, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_puertos` TEXT, IN `_capa` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11))  BEGIN
UPDATE ws_equipos SET idTipo = _idTipo, uResponsable = _uResponsable, office = _office, service = _service, serie = _serie,sbn = _sbn,marca = _marca, modelo = _modelo,descripcion = _descripcion, fechaCompra = _fechaCompra, ordenCompra = _ordenCompra,garantia = _garantia,puertos = _puertos,capa = _capa,condicion = _condicion, estadoEQ = _estadoEQ where idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_EQUIPORED` (IN `_idEquipo` INT(11), IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_office` INT(11), IN `_service` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` DATE, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_puertos` TEXT, IN `_capa` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11))  BEGIN
UPDATE ws_equipos SET idTipo = _idTipo, uResponsable = _uResponsable, office = _office, service = _service, serie = _serie,sbn = _sbn,marca = _marca, modelo = _modelo,descripcion = _descripcion, fechaCompra = _fechaCompra, ordenCompra = _ordenCompra,garantia = _garantia,puertos = _puertos, capa = _capa, condicion = _condicion, estadoEQ = _estadoEQ where idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_RESPONSABLE` (IN `_nombresResp` TEXT, IN `_apellidosResp` TEXT, IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_idResponsable` INT(11))  BEGIN
UPDATE ws_responsables SET nombresResp = _nombresResp,apellidosResp = _apellidosResp,idOficina = _idOficina, idServicio = _idServicio where idResponsable = _idResponsable;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_ACCIONES` ()  BEGIN
select idAccion,accionrealizada,category,categoria from ws_acciones as a inner join ws_categorias as c on a.category = c.idCategoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIAS` ()  BEGIN
SELECT idCategoria,segmento,categoria,descSegmento FROM ws_categorias as cat inner join ws_segmento as seg on cat.segmento = seg.idSegmento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIASC` ()  BEGIN
SELECT * FROM websupport.ws_categorias where segmento = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIASP` ()  BEGIN
SELECT * FROM websupport.ws_categorias where segmento = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIASR` ()  BEGIN
SELECT * FROM websupport.ws_categorias where segmento = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_DIAGNOSTICOS` ()  BEGIN
select idDiagnostico,diagnostico,category,categoria from ws_diagnosticos as d inner join ws_categorias as c on d.category = c.idCategoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUIPOSC` ()  BEGIN
SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,segmento,serie,sbn,marca,modelo,descripcion,ordenCompra,garantia,placa,procesador,vprocesador,ram,discoDuro,observaciones,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario inner join ws_responsables as resp1 on eq.uResponsable = resp1.idResponsable inner join ws_departamentos as dep on eq.office = dep.id_area inner join ws_servicios as serv on eq.service = serv.id_subarea where segmento = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUIPOSP` ()  BEGIN
SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,segmento,serie,sbn,marca,modelo,descripcion,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario where segmento = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUIPOSR` ()  BEGIN
SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,segmento,serie,sbn,marca,modelo,descripcion,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario where segmento = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_INTEGRACIONC` ()  BEGIN
SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,respon.nombresResp as nombRes,respon.apellidosResp as apellRes,oficina_in,dept.area as departamento,servicio_in,serv.subarea as servicio,pc.idEquipo as idPc,pc.serie as seriepc,pc.sbn as sbnpc,pc.marca as marcapc,pc.modelo as modelopc,pc.descripcion as descripcionpc,pc.ordenCompra as Ordenpc,date_format(pc.fechaCompra,'%d-%m-%Y') as fcomprapc,pc.garantia as garantiapc,pc.placa as placapc,pc.procesador as procesadorpc,pc.vprocesador as vprocesadorpc,pc.ram as rampc,pc.discoDuro as ddpc,estado,descEstado,siteq.idSituacion as condicionPC,situacion,serie_monitor,mon.serie as seriemon,mon.sbn as sbnmon,mon.marca as marcamon,mon.modelo as modelomon,mon.descripcion as descripcionmon,serie_teclado, tecl.serie as serietec, tecl.sbn as sbntec,tecl.marca as marcatec,tecl.modelo as modelotec,tecl.descripcion as descripciontec,serie_EstAcu,energia.serie as serieAcu,energia.sbn as sbnAcu,energia.marca as marcaAcu,energia.modelo as modeloAcu,energia.descripcion as descripcionAcu FROM ws_integraciones as integra 
inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
inner join ws_equipos as pc on integra.serie_pc = pc.idEquipo
inner join ws_estado as esteq on integra.estado = esteq.idEstado
inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
inner join ws_equipos as mon on integra.serie_monitor = mon.idEquipo
inner join ws_equipos as tecl on integra.serie_teclado = tecl.idEquipo
inner join ws_equipos as energia on integra.serie_EstAcu = energia.idEquipo
inner join ws_responsables as respon on integra.responsable = respon.idResponsable
inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
WHERE segmento = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_RESPONSABLES` ()  BEGIN
select idResponsable,nombresResp,apellidosResp,idOficina,area,idServicio,subarea from (ws_responsables as res inner join ws_departamentos as dep on res.idOficina = dep.id_area) inner join ws_servicios as serv on res.idServicio = serv.id_subarea;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_RESPONSABLES_ITEM` (IN `_campo` TEXT, IN `_valor` TEXT)  BEGIN
select idResponsable,nombresResp,apellidosResp,idOficina,area,idServicio,subarea from (ws_responsables as res inner join ws_departamentos as dep on res.idOficina = dep.id_area) inner join ws_servicios as serv on res.idServicio = serv.id_subarea where _campo = _valor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERVICIOS` (IN `_id_area` INT)  BEGIN
	SELECT * FROM ws_servicios WHERE id_area = _id_area;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_EQUIPOC` (IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` DATE, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_placa` TEXT, IN `_procesador` TEXT, IN `_vprocesador` TEXT, IN `_ram` TEXT, IN `_discoDuro` TEXT, IN `_observaciones` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11), IN `_registrador` INT(11))  BEGIN
insert into ws_equipos(idTipo,uResponsable,office,service,serie,sbn,marca,modelo,descripcion,fechaCompra,ordenCompra,garantia,placa,procesador,vprocesador,ram,discoDuro,observaciones,condicion,estadoEQ,registrador) values(_idTipo,_uResponsable,_idOficina,_idServicio,_serie,_sbn,_marca,_modelo,_descripcion,_fechaCompra,_ordenCompra,_garantia,_placa,_procesador,_vprocesador,_ram,_discoDuro,_observaciones,_condicion,_estadoEQ,_registrador);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_EQUIPOP` (IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` TEXT, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_observaciones` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11), IN `_registrador` INT(11))  BEGIN
insert into ws_equipos(idTipo,uResponsable,office,service,serie,sbn,marca,modelo,descripcion,fechaCompra,ordenCompra,garantia,observaciones,condicion,estadoEQ,registrador) values(_idTipo,_uResponsable,_idOficina,_idServicio,_serie,_sbn,_marca,_modelo,_descripcion,_fechaCompra,_ordenCompra,_garantia,_observaciones,_condicion,_estadoEQ,_registrador);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_EQUIPOR` (IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` TEXT, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_puertos` TEXT, IN `_capa` TEXT, IN `_observaciones` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11), IN `_registrador` INT(11))  BEGIN
INSERT INTO ws_equipos(idTipo,uResponsable,office,service,serie,sbn,marca,modelo,descripcion,fechaCompra,ordenCompra,garantia,puertos,capa,observaciones,condicion,estadoEQ,registrador) VALUES(_idTipo,_uResponsable,_idOficina,_idServicio,_serie,_sbn,_marca,_modelo,_descripcion,_fechaCompra,_ordenCompra,_garantia,_puertos,_capa,_observaciones,_condicion,_estadoEQ,_registrador);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_RESPONSABLE` (IN `_nombresResp` TEXT, IN `_apellidosResp` TEXT, IN `_idOficina` INT(11), IN `_idServicio` INT(11))  BEGIN
INSERT INTO ws_responsables(nombresResp,apellidosResp,idOficina,idServicio) VALUES(_nombresResp,_apellidosResp,_idOficina,_idServicio);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_acciones`
--

CREATE TABLE `ws_acciones` (
  `idAccion` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `accionrealizada` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_acciones`
--

INSERT INTO `ws_acciones` (`idAccion`, `category`, `accionrealizada`) VALUES
(1, 4, 'Formateo de sistema operativo'),
(3, 9, 'Tambor malogrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_bajas`
--

CREATE TABLE `ws_bajas` (
  `idBaja` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_categorias`
--

CREATE TABLE `ws_categorias` (
  `idCategoria` int(11) NOT NULL,
  `segmento` int(11) DEFAULT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_categorias`
--

INSERT INTO `ws_categorias` (`idCategoria`, `segmento`, `categoria`) VALUES
(1, 1, 'PC'),
(2, 2, 'Switch'),
(3, 3, 'Impresora'),
(4, 1, 'Laptop'),
(5, 1, 'Servidor'),
(6, 2, 'Router'),
(7, 2, 'Firewall'),
(8, 2, 'Acces Point'),
(9, 3, 'Fotocopiadora'),
(10, 3, 'Monitor'),
(11, 3, 'Teclado'),
(12, 3, 'Acumulador de Energía'),
(13, 3, 'Estabilizador'),
(14, 3, 'Ticketera'),
(15, 3, 'Escáner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_departamentos`
--

CREATE TABLE `ws_departamentos` (
  `id_area` int(11) NOT NULL,
  `area` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_departamentos`
--

INSERT INTO `ws_departamentos` (`id_area`, `area`, `fecha_creacion`) VALUES
(1, 'Anestesiología', '2020-09-16 18:21:44'),
(2, 'Asesoría Legal', '2020-09-16 18:23:54'),
(3, 'Cirugía', '2020-09-16 18:24:01'),
(4, 'Comunicaciones', '2020-09-16 18:24:09'),
(5, 'Consultorios Externos', '2020-09-16 18:24:17'),
(6, 'Control Interno', '2020-09-16 18:24:26'),
(7, 'Diagnóstico por Imágenes', '2020-09-16 18:24:48'),
(8, 'Dirección', '2020-09-16 18:24:57'),
(9, 'Docencia', '2020-09-16 18:25:03'),
(10, 'Economía', '2020-09-16 18:25:14'),
(11, 'Emergencia', '2020-09-16 18:25:24'),
(12, 'Epidemiología', '2020-09-16 18:25:40'),
(13, 'Estadística e Informática', '2020-09-16 18:26:05'),
(14, 'Farmacia', '2020-09-16 18:26:36'),
(15, 'Gestión de la Calidad', '2020-09-16 18:26:46'),
(16, 'Ginecología', '2020-09-16 18:27:04'),
(17, 'Laboratorio', '2020-09-16 18:28:06'),
(18, 'Logística', '2020-09-16 18:28:17'),
(19, 'Medicina', '2020-09-16 18:28:24'),
(20, 'Nutrición', '2020-09-16 18:28:33'),
(21, 'Odontoestomatología', '2020-09-16 18:28:51'),
(22, 'Pediatría', '2020-09-16 18:29:03'),
(23, 'Personal', '2020-09-16 18:29:18'),
(24, 'Planeamiento Estratégico', '2020-09-16 18:29:32'),
(25, 'Psicología', '2020-09-16 18:29:39'),
(26, 'Rehabilitación', '2020-09-16 18:29:48'),
(27, 'Seguros', '2020-09-16 18:29:57'),
(28, 'Servicio Social', '2020-09-16 18:30:14'),
(30, 'Servicios Generales', '2020-09-17 20:04:23'),
(31, 'Archivo Central', '2020-09-22 00:39:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_diagnosticos`
--

CREATE TABLE `ws_diagnosticos` (
  `idDiagnostico` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `diagnostico` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_diagnosticos`
--

INSERT INTO `ws_diagnosticos` (`idDiagnostico`, `category`, `diagnostico`) VALUES
(1, 1, 'Sistema Operativo dañado'),
(2, 3, 'Tóner desgastado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_equipos`
--

CREATE TABLE `ws_equipos` (
  `idEquipo` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `uResponsable` int(11) NOT NULL,
  `office` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `serie` text COLLATE utf8_spanish_ci NOT NULL,
  `sbn` text COLLATE utf8_spanish_ci NOT NULL,
  `marca` text COLLATE utf8_spanish_ci NOT NULL,
  `modelo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaCompra` date NOT NULL,
  `ordenCompra` text COLLATE utf8_spanish_ci NOT NULL,
  `garantia` text COLLATE utf8_spanish_ci NOT NULL,
  `placa` text COLLATE utf8_spanish_ci,
  `procesador` text COLLATE utf8_spanish_ci,
  `vprocesador` text COLLATE utf8_spanish_ci,
  `ram` text COLLATE utf8_spanish_ci,
  `discoDuro` text COLLATE utf8_spanish_ci,
  `puertos` text COLLATE utf8_spanish_ci,
  `capa` text COLLATE utf8_spanish_ci,
  `observaciones` text COLLATE utf8_spanish_ci,
  `fichaBaja` text COLLATE utf8_spanish_ci,
  `fichaReposición` text COLLATE utf8_spanish_ci,
  `condicion` int(11) NOT NULL,
  `estadoEQ` int(11) NOT NULL,
  `registrador` int(11) NOT NULL,
  `registrof` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_equipos`
--

INSERT INTO `ws_equipos` (`idEquipo`, `idTipo`, `uResponsable`, `office`, `service`, `serie`, `sbn`, `marca`, `modelo`, `descripcion`, `fechaCompra`, `ordenCompra`, `garantia`, `placa`, `procesador`, `vprocesador`, `ram`, `discoDuro`, `puertos`, `capa`, `observaciones`, `fichaBaja`, `fichaReposición`, `condicion`, `estadoEQ`, `registrador`, `registrof`) VALUES
(18, 1, 6, 13, 17, 'MXLJKASFDA', '5555555', 'VASTEC', 'COMPAQ PRESARIO', 'ESTACION DE TRABAJO', '2021-02-04', 'AAA5-11A', '3 AÑOS', 'ASUS', 'INTEL CORE I3', '3.40 GHZ', '8GB', '1TB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-06 00:35:09'),
(19, 4, 4, 4, 14, 'AAQ11', '111111111', 'LG', 'LGG12-1', 'LG GRAM 17 PGDAS', '2021-02-01', '1171-11AA', '5 AÑOS', 'LG', 'INTEL CORE I7', '3.20 GHZ', '16GB', '512GB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-06 00:38:23'),
(20, 1, 2, 1, 12, 'AA', '1111111212', 'ZSZXZX', 'AAAS12', 'ASAS', '2021-02-04', 'AAA122', 'A1A', 'AA', 'AA', 'A', 'A', 'A', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 2, 2, 1, '2021-02-06 17:20:18'),
(23, 12, 6, 13, 17, 'A111', '111', 'APC', 'BV500I-MS', 'UPS SAY EASY', '2021-02-01', '111-22', '2 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-06 18:06:50'),
(26, 6, 6, 13, 17, 'SKALSL', '123', 'TPLINK', 'TP-21', 'DE PARED', '2021-02-03', '11-1112', '3 AÑOS', NULL, NULL, NULL, NULL, NULL, '4', '2', 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-07 11:30:34'),
(27, 6, 6, 13, 17, 'AJA', '123456789', 'PRUEBITA123', 'MODELO-PRUEBA', 'DESCRIP PRUEBA', '2021-02-05', 'ORDE-PRUEBA', 'GARANTE PRUEBA', NULL, NULL, NULL, NULL, NULL, '5', '2', 'REGISTRO NUEVO', NULL, NULL, 3, 2, 1, '2021-02-07 16:24:40'),
(28, 10, 6, 13, 17, 'XLMONITOR', '122333', 'SAMSUNG', 'S-340', 'MONITOR DE 21 PLGDAS', '2021-02-01', '11-111', '2 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-08 08:05:25'),
(29, 11, 6, 13, 17, 'TEC123', '12222', 'GENIUS', 'TC-123', 'TECLADO USB', '2021-02-01', '111-111', '3 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-08 08:06:18'),
(30, 15, 6, 13, 17, 'ESCANERX', '1234', 'CANON', 'LIDE 300', 'ESCANER DE SUPERFICIE PLANA', '2021-02-02', '11-111', '3 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-08 10:39:23'),
(31, 14, 6, 13, 17, 'ASA111', '1111', 'ECLINE', 'XP', 'IMPRESORA TICKETERA TERMICA USB 80MM FACTURACION ELECTRONICA', '2021-02-01', '11-1121-11', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-08 10:40:32'),
(32, 3, 6, 13, 17, '111A12', '112133', 'HP', 'M283FDW', 'IMPRESORA MULTIFUNCIONAL HP COLOR LASERJET PRO MFP M283FDW B', '2021-01-20', '11-121121', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-08 10:42:02'),
(33, 9, 6, 13, 17, 'AS21122', '122390', 'RICOH', 'MP 3351', 'COPIADORA  IMPRESORA  SCANNER', '2020-12-24', '11-2ASA', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-02-08 10:44:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_estado`
--

CREATE TABLE `ws_estado` (
  `idEstado` int(11) NOT NULL,
  `descEstado` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_estado`
--

INSERT INTO `ws_estado` (`idEstado`, `descEstado`) VALUES
(1, 'Activo'),
(2, 'Baja'),
(3, 'Repuesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_integraciones`
--

CREATE TABLE `ws_integraciones` (
  `idIntegracion` int(11) NOT NULL,
  `correlativo_integracion` text COLLATE utf8_spanish_ci NOT NULL,
  `nro_eq` text COLLATE utf8_spanish_ci NOT NULL,
  `ip` text COLLATE utf8_spanish_ci NOT NULL,
  `serie_pc` int(11) DEFAULT NULL,
  `serie_monitor` int(11) DEFAULT NULL,
  `serie_teclado` int(11) DEFAULT NULL,
  `serie_EstAcu` int(11) DEFAULT NULL,
  `serie_eqred` int(11) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `tipo_equipo` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `oficina_in` int(11) NOT NULL,
  `servicio_in` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `condicion` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_integraciones`
--

INSERT INTO `ws_integraciones` (`idIntegracion`, `correlativo_integracion`, `nro_eq`, `ip`, `serie_pc`, `serie_monitor`, `serie_teclado`, `serie_EstAcu`, `serie_eqred`, `fecha_registro`, `tipo_equipo`, `responsable`, `oficina_in`, `servicio_in`, `estado`, `condicion`, `registro`) VALUES
(1, 'FT-000001', 'PC_0001', '172.16.0.100', 18, 28, 29, 23, NULL, '2021-02-05', 1, 6, 13, 17, 1, 1, '2021-02-08 13:11:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_mantenimientos`
--

CREATE TABLE `ws_mantenimientos` (
  `idMant` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_perfiles`
--

CREATE TABLE `ws_perfiles` (
  `id_perfil` int(11) NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_perfiles`
--

INSERT INTO `ws_perfiles` (`id_perfil`, `perfil`, `fecha_creacion`) VALUES
(1, 'Administrador', '2020-02-20 16:34:02'),
(2, 'Coordinador', '2020-02-20 16:34:11'),
(3, 'Técnico', '2020-09-16 18:34:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_responsables`
--

CREATE TABLE `ws_responsables` (
  `idResponsable` int(11) NOT NULL,
  `nombresResp` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidosResp` text COLLATE utf8_spanish_ci NOT NULL,
  `idOficina` int(11) DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_responsables`
--

INSERT INTO `ws_responsables` (`idResponsable`, `nombresResp`, `apellidosResp`, `idOficina`, `idServicio`) VALUES
(2, 'Usuario', 'Cirugía', 1, 12),
(3, 'Usuario', 'Archivo', 31, 13),
(4, 'Usuario', 'Comunicaciones', 4, 14),
(5, 'Betty', 'Aguilar Padilla', 13, 15),
(6, 'Mónica Nohemí', 'Rosas Sánchez', 13, 17),
(7, 'Olger', 'Castro Palacios', 13, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_segmento`
--

CREATE TABLE `ws_segmento` (
  `idSegmento` int(11) NOT NULL,
  `descSegmento` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_segmento`
--

INSERT INTO `ws_segmento` (`idSegmento`, `descSegmento`) VALUES
(1, 'Equipo de Cómputo'),
(2, 'Redes y Telecomunicaciones'),
(3, 'Periféricos y otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_servicios`
--

CREATE TABLE `ws_servicios` (
  `id_subarea` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `subarea` text NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_servicios`
--

INSERT INTO `ws_servicios` (`id_subarea`, `id_area`, `subarea`, `fecha_creacion`) VALUES
(12, 1, 'Sala de Operaciones', '2020-09-22 00:38:42'),
(13, 31, 'Jefatura', '2020-09-22 00:39:28'),
(14, 4, 'Jefatura', '2020-09-22 00:39:50'),
(15, 13, 'Digitación', '2020-09-22 19:14:30'),
(16, 13, 'Soporte Técnico', '2021-02-04 23:52:58'),
(17, 13, 'Jefatura', '2021-02-06 05:33:18'),
(18, 13, 'Desarrollo', '2021-02-07 01:46:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_situacion`
--

CREATE TABLE `ws_situacion` (
  `idSituacion` int(11) NOT NULL,
  `situacion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_situacion`
--

INSERT INTO `ws_situacion` (`idSituacion`, `situacion`) VALUES
(1, 'Operativo'),
(2, 'Inoperativo'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_tipotrabajo`
--

CREATE TABLE `ws_tipotrabajo` (
  `idTipoTrabajo` int(11) NOT NULL,
  `tipoTrabajo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_tipotrabajo`
--

INSERT INTO `ws_tipotrabajo` (`idTipoTrabajo`, `tipoTrabajo`) VALUES
(1, 'Mantenimiento Preventivo'),
(2, 'Mantenimiento Correctivo'),
(3, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_usuarios`
--

CREATE TABLE `ws_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `dni` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` text COLLATE utf8_spanish_ci NOT NULL,
  `cuenta` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_usuarios`
--

INSERT INTO `ws_usuarios` (`id_usuario`, `id_perfil`, `dni`, `nombres`, `apellido_paterno`, `apellido_materno`, `cuenta`, `clave`, `fecha_registro`, `estado`) VALUES
(1, 1, '77478995', 'Olger Ivan', 'Castro', 'Palacios', 'ocastrop', '$2a$07$usesomesillystringforeVF6hLwtgsUBAmUN4cGEd8tYF74gSHRW', '2020-03-02 16:22:25', 1),
(2, 3, '42162499', 'Edwin William', 'Guerrero', 'Sandoval', 'wguerreros', '$2a$07$usesomesillystringforeLTVm.b0q8aUqKwOyqhotBMNXub2QEkq', '2020-09-18 17:18:39', 1),
(4, 3, '09401769', 'Segundo Andres', 'Cruzado', 'Cotrina', 'acruzadoc', '$2a$07$usesomesillystringfore9OBdlwIyha0dt84yf389aUSqD287miS', '2021-02-04 23:50:33', 1),
(5, 3, '09965283', 'Victor Ivan', 'Chuquicaña', 'Fernandez', 'vchuquicañaf', '$2a$07$usesomesillystringforetG4v5XsxFT5vjiUpPsTv0VEdAMT4jmW', '2021-02-04 23:51:47', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ws_acciones`
--
ALTER TABLE `ws_acciones`
  ADD PRIMARY KEY (`idAccion`);

--
-- Indices de la tabla `ws_bajas`
--
ALTER TABLE `ws_bajas`
  ADD PRIMARY KEY (`idBaja`);

--
-- Indices de la tabla `ws_categorias`
--
ALTER TABLE `ws_categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `ws_departamentos`
--
ALTER TABLE `ws_departamentos`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `ws_diagnosticos`
--
ALTER TABLE `ws_diagnosticos`
  ADD PRIMARY KEY (`idDiagnostico`);

--
-- Indices de la tabla `ws_equipos`
--
ALTER TABLE `ws_equipos`
  ADD PRIMARY KEY (`idEquipo`);

--
-- Indices de la tabla `ws_estado`
--
ALTER TABLE `ws_estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `ws_integraciones`
--
ALTER TABLE `ws_integraciones`
  ADD PRIMARY KEY (`idIntegracion`);

--
-- Indices de la tabla `ws_mantenimientos`
--
ALTER TABLE `ws_mantenimientos`
  ADD PRIMARY KEY (`idMant`);

--
-- Indices de la tabla `ws_perfiles`
--
ALTER TABLE `ws_perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `ws_responsables`
--
ALTER TABLE `ws_responsables`
  ADD PRIMARY KEY (`idResponsable`);

--
-- Indices de la tabla `ws_segmento`
--
ALTER TABLE `ws_segmento`
  ADD PRIMARY KEY (`idSegmento`);

--
-- Indices de la tabla `ws_servicios`
--
ALTER TABLE `ws_servicios`
  ADD PRIMARY KEY (`id_subarea`);

--
-- Indices de la tabla `ws_situacion`
--
ALTER TABLE `ws_situacion`
  ADD PRIMARY KEY (`idSituacion`);

--
-- Indices de la tabla `ws_tipotrabajo`
--
ALTER TABLE `ws_tipotrabajo`
  ADD PRIMARY KEY (`idTipoTrabajo`);

--
-- Indices de la tabla `ws_usuarios`
--
ALTER TABLE `ws_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ws_acciones`
--
ALTER TABLE `ws_acciones`
  MODIFY `idAccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_bajas`
--
ALTER TABLE `ws_bajas`
  MODIFY `idBaja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ws_categorias`
--
ALTER TABLE `ws_categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ws_departamentos`
--
ALTER TABLE `ws_departamentos`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `ws_diagnosticos`
--
ALTER TABLE `ws_diagnosticos`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_equipos`
--
ALTER TABLE `ws_equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `ws_estado`
--
ALTER TABLE `ws_estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_integraciones`
--
ALTER TABLE `ws_integraciones`
  MODIFY `idIntegracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ws_mantenimientos`
--
ALTER TABLE `ws_mantenimientos`
  MODIFY `idMant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ws_perfiles`
--
ALTER TABLE `ws_perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_responsables`
--
ALTER TABLE `ws_responsables`
  MODIFY `idResponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ws_segmento`
--
ALTER TABLE `ws_segmento`
  MODIFY `idSegmento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_servicios`
--
ALTER TABLE `ws_servicios`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ws_situacion`
--
ALTER TABLE `ws_situacion`
  MODIFY `idSituacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_tipotrabajo`
--
ALTER TABLE `ws_tipotrabajo`
  MODIFY `idTipoTrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_usuarios`
--
ALTER TABLE `ws_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
