-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-04-2021 a las 06:43:42
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
-- Base de datos: `sti-web`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_CONTRASEÑA` (IN `_id_usuario` INT(11), IN `_nclave` TEXT)  BEGIN
UPDATE ws_usuarios set clave = _nclave where id_usuario = _id_usuario;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_RESPONSABLE` (IN `_dniResp` TEXT, IN `_nombresResp` TEXT, IN `_apellidosResp` TEXT, IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_idResponsable` INT(11))  BEGIN
UPDATE ws_responsables SET dni=_dniResp,nombresResp = _nombresResp,apellidosResp = _apellidosResp,idOficina = _idOficina, idServicio = _idServicio where idResponsable = _idResponsable;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ANULAR_INTEGRACION` (IN `_idIntegracion` INT(11))  BEGIN
UPDATE ws_integraciones SET nro_eq = "ANULADO", ip = null,serie_pc = null, serie_monitor = null, serie_teclado = null,serie_EstAcu = null,serie_eqred = null,serie_imp = null, tipo_equipo = 0,responsable = 0, oficina_in = 0,servicio_in = 0, estado = 0, condicion = 0, estadoAnu = 1 WHERE idIntegracion = _idIntegracion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ANULAR_MANTENIMIENTO` (IN `_idMantenimiento` INT(11))  BEGIN
UPDATE ws_mantenimientos SET diagnostico1 = 0, diagnostico2 = 0, diagnostico3 = 0, diagnostico4 = 0, diagnostico5 = 0, diagnostico6 = 0, diagnostico7 = 0, diagnostico8 = 0, accion1 = 0, accion2 = 0, accion3 = 0, accion4 = 0, accion5 = 0, accion6 = 0, accion7 = 0, accion8 = 0, estAnulado = 2 where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DESBLOQUEAR_USUARIO` (IN `_id_usuario` INT(11))  BEGIN
UPDATE ws_usuarios set nintentos = 0 where id_usuario = _id_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_CATEGORIA` (IN `_idCategoria` INT(11), IN `_categoria` TEXT, IN `_segmento` INT(11))  BEGIN
UPDATE ws_categorias SET categoria = _categoria, segmento = _segmento WHERE idCategoria = _idCategoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_INTEGRACIONC` (IN `_idIntegracion` INT(11), IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_pc` INT(11), IN `_serie_monitor` INT(11), IN `_serie_teclado` INT(11), IN `_serie_EstAcu` INT(11), IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
UPDATE ws_integraciones SET nro_eq = _nro_eq,ip = _ip,serie_pc = _serie_pc,serie_monitor = _serie_monitor,serie_teclado = _serie_teclado, serie_EstAcu = _serie_EstAcu,tipo_equipo = _tipo_equipo,responsable = _responsable, oficina_in = _oficina_in,servicio_in = _servicio_in,estado = _estado,condicion = _condicion WHERE idIntegracion = _idIntegracion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_INTEGRACIONC1` (IN `_idIntegracion` INT(11), IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_pc` INT(11), IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
UPDATE ws_integraciones SET nro_eq = _nro_eq,ip = _ip,serie_pc = _serie_pc,serie_monitor = null,serie_teclado = null,serie_EstAcu = null,tipo_equipo = _tipo_equipo,responsable = _responsable, oficina_in = _oficina_in,servicio_in = _servicio_in,estado = _estado,condicion = _condicion WHERE idIntegracion = _idIntegracion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_INTEGRACIONI` (IN `_idIntegracion` INT(11), IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_imp` INT(11), IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
UPDATE ws_integraciones SET nro_eq = _nro_eq,ip = _ip,serie_imp = _serie_imp,tipo_equipo = _tipo_equipo,responsable = _responsable, oficina_in = _oficina_in,servicio_in = _servicio_in,estado = _estado,condicion = _condicion WHERE idIntegracion = _idIntegracion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_INTEGRACIONR` (IN `_idIntegracion` INT(11), IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_eqred` INT(11), IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
UPDATE ws_integraciones SET nro_eq = _nro_eq,ip = _ip,serie_eqred = _serie_eqred,tipo_equipo = _tipo_equipo,responsable = _responsable, oficina_in = _oficina_in,servicio_in = _servicio_in,estado = _estado,condicion = _condicion WHERE idIntegracion = _idIntegracion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_MANTENIMIENTO` (IN `_idMantenimiento` INT(11), IN `_tipEquipo` INT(11), IN `_condInicial` INT(11), IN `_idEquip` INT(11), IN `_oficEquip` INT(11), IN `_areaEquip` INT(11), IN `_respoEquip` INT(11), IN `_logdeta` TEXT, IN `_descInc` TEXT, IN `_tecEvalua` INT(11), IN `_diagnostico1` INT(11), IN `_diagnostico2` INT(11), IN `_diagnostico3` INT(11), IN `_diagnostico4` INT(11), IN `_diagnostico5` INT(11), IN `_diagnostico6` INT(11), IN `_diagnostico7` INT(11), IN `_diagnostico8` INT(11), IN `_fEvalua` DATE, IN `_primera_eval` TEXT, IN `_fInicio` DATE, IN `_fFin` DATE, IN `_tipTrabajo` INT(11), IN `_accion1` INT(11), IN `_accion2` INT(11), IN `_accion3` INT(11), IN `_accion4` INT(11), IN `_accion5` INT(11), IN `_accion6` INT(11), IN `_accion7` INT(11), IN `_accion8` INT(11), IN `_recomendaciones` TEXT, IN `_estAtencion` INT(11), IN `_condFinal` INT(11), IN `_servTerce` TEXT, IN `_otros` TEXT, IN `_obsOtros` TEXT, IN `_sgmtoManto` INT(11))  BEGIN
UPDATE ws_mantenimientos SET tipEquipo = _tipEquipo, condInicial = _condInicial, idEquip = _idEquip, oficEquip = _oficEquip, areaEquip = _areaEquip, respoEquip = _respoEquip, logdeta = _logdeta, descInc = _descInc, tecEvalua = _tecEvalua, diagnostico1 = _diagnostico1, diagnostico2 = _diagnostico2, diagnostico3 = _diagnostico3, diagnostico4 = _diagnostico4, diagnostico5 = _diagnostico5, diagnostico6 = _diagnostico6, diagnostico7 = _diagnostico7, diagnostico8 = _diagnostico8, fEvalua = _fEvalua, primera_eval = _primera_eval, fInicio = _fInicio, fFin = _fFin, tipTrabajo = _tipTrabajo, accion1 = _accion1, accion2 = _accion2, accion3 = _accion3, accion4 = _accion4, accion5 = _accion5, accion6 = _accion6, accion7 = _accion7, accion8 = _accion8, recomendaciones = _recomendaciones, estAtencion = _estAtencion, condFinal = _condFinal, servTerce = _servTerce, otros = _otros, obsOtros = _obsOtros, sgmtoManto = _sgmtoManto where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_OFICINA_DPTO` (IN `_id_area` INT(11), IN `_area` TEXT)  BEGIN
UPDATE ws_departamentos SET area = _area WHERE id_area = _id_area;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_SERVICIO_OD` (IN `_id_area` INT(11), IN `_id_subarea` INT(11), IN `_subarea` TEXT)  BEGIN
UPDATE ws_servicios SET subarea = _subarea, id_area = _id_area WHERE id_subarea = _id_subarea;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_CATEGORIA` (IN `_idCategoria` INT(11))  BEGIN
DELETE FROM ws_categorias WHERE idCategoria = _idCategoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_EQREDES` (IN `_idEquipo` INT(11), OUT `nExistencia` INT(11))  BEGIN
    DECLARE conteo INT;
	SET conteo = (SELECT count(idEquipo) as existencia FROM ws_equipos eq
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_eqred = eq.idEquipo) AND idEquipo = _idEquipo);
    IF(conteo >= 1) THEN
       SET nExistencia = 1;
    ELSE
       DELETE FROM ws_equipos WHERE idEquipo = _idEquipo;
       SET nExistencia = 0;
    END IF;
    SELECT nExistencia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_IMPRESORA_PERIFERICOS` (IN `_idEquipo` INT(11), IN `_idTipo` INT(11), OUT `nExistencia` INT(11))  BEGIN
DECLARE conteo INT;
DECLARE tipo int;
set tipo = _idTipo;

if (tipo = 10) then
   SET conteo = (SELECT count(idEquipo) as existencia FROM ws_equipos eq
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_monitor = eq.idEquipo) AND idEquipo = _idEquipo AND eq.idTipo = _idTipo);
elseif (tipo = 11) then
   SET conteo = (SELECT count(idEquipo) as existencia FROM ws_equipos eq
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_teclado = eq.idEquipo) AND idEquipo = _idEquipo AND eq.idTipo = _idTipo);
elseif (tipo = 12) then
   SET conteo = (SELECT count(idEquipo) as existencia FROM ws_equipos eq
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_EstAcu = eq.idEquipo) AND idEquipo = _idEquipo AND eq.idTipo = _idTipo);
elseif (tipo = 13) then
   SET conteo = (SELECT count(idEquipo) as existencia FROM ws_equipos eq
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_EstAcu = eq.idEquipo) AND idEquipo = _idEquipo AND eq.idTipo = _idTipo);
else
   SET conteo = (SELECT count(idEquipo) as existencia FROM ws_equipos eq
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones eimp
	WHERE eimp.serie_imp = eq.idEquipo)  AND idEquipo = _idEquipo AND eq.idTipo = _idTipo);
end if;
IF(conteo >= 1) THEN
	SET nExistencia = 1;
ELSE
 DELETE FROM ws_equipos WHERE idEquipo = _idEquipo;
 SET nExistencia = 0;
END IF;
 SELECT nExistencia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_OFICINA_DPTO` (IN `_id_area` INT(11))  BEGIN
DELETE FROM ws_departamentos WHERE id_area = _id_area;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_PC_LAPTOP` (IN `_idEquipo` INT(11), OUT `nExistencia` INT(11))  BEGIN
    DECLARE conteo INT;
	SET conteo = (SELECT count(idEquipo) as existencia FROM ws_equipos eq
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_pc = eq.idEquipo) AND idEquipo = _idEquipo);
    IF(conteo >= 1) THEN
       SET nExistencia = 1;
    ELSE
       DELETE FROM ws_equipos WHERE idEquipo = _idEquipo;
       SET nExistencia = 0;
    END IF;
    SELECT nExistencia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_RESPONSABLE` (IN `_id` INT(11))  BEGIN
DELETE FROM ws_responsables WHERE idResponsable = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_SERVICIO_OD` (IN `_id_subarea` INT(11))  BEGIN
DELETE FROM ws_servicios WHERE id_subarea = _id_subarea;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INTENTOS_USUARIO` (IN `_id_usuario` INT(11))  BEGIN
UPDATE ws_usuarios set nintentos = nintentos + 1 where id_usuario = _id_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_ACCIONES` ()  BEGIN
SELECT idAccion,accionrealizada,segment,descSegmento FROM ws_acciones AS a INNER JOIN ws_segmento AS s ON a.segment = s.idSegmento order by accionrealizada asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_ACCI_SEGMENTO` (IN `_idSegmento` INT(11))  BEGIN
select idAccion,accionrealizada,segment from ws_acciones where segment = _idSegmento order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIAS` ()  BEGIN
SELECT idCategoria,segmento,categoria,descSegmento FROM ws_categorias as cat inner join ws_segmento as seg on cat.segmento = seg.idSegmento order by segmento ,categoria asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIASC` ()  BEGIN
SELECT * FROM ws_categorias where segmento = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIASP` ()  BEGIN
SELECT * FROM ws_categorias where segmento = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIASP2` ()  BEGIN
SELECT * FROM ws_categorias where segmento = 3 AND (idCategoria = 3 or idCategoria = 9 or idCategoria = 14 or idCategoria = 15 or idCategoria = 16 or idCategoria = 17);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CATEGORIASR` ()  BEGIN
SELECT * FROM ws_categorias where segmento = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_CONDICIONMANTO` ()  BEGIN
select * from ws_situacion where idSituacion between 1 and 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_DATOS_EQCOMPUTO` (IN `_idEquipo` INT(11))  BEGIN
SELECT idEquipo,tipSegmento,descSegmento,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion,procesador,vprocesador,ram,discoDuro FROM ws_equipos eq 
inner join ws_integraciones as eint on eq.idEquipo = eint.serie_pc
inner join ws_responsables as eure on eq.uResponsable = eure.idResponsable
inner join ws_departamentos as edep on eq.office = edep.id_area
inner join ws_servicios as eserv on eq.service = eserv.id_subarea
inner join ws_segmento as eseg on eq.tipSegmento = eseg.idSegmento
WHERE EXISTS (SELECT NULL FROM ws_integraciones epc WHERE epc.serie_pc = eq.idEquipo) and idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_DATOS_EQIMP_OTROS` (IN `_idEquipo` INT(11))  BEGIN
SELECT idEquipo,tipSegmento,descSegmento,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_imp
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
inner join ws_segmento as eseg on eqp.tipSegmento = eseg.idSegmento
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_imp = eqp.idEquipo) and idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_DATOS_EQOTROS` (IN `_idEquipo` INT(11))  BEGIN
SELECT idEquipo,tipSegmento,descSegmento,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,serie,sbn,marca,modelo,descripcion FROM ws_equipos  as eqm 
inner join ws_responsables as erm on eqm.uResponsable = erm.idResponsable
inner join ws_departamentos as edm on eqm.office = edm.id_area
inner join ws_servicios as esm on eqm.service = esm.id_subarea
inner join ws_segmento as eseg on eqm.tipSegmento = eseg.idSegmento
where idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_DATOS_EQREDES` (IN `_idEquipo` INT(11))  BEGIN
SELECT idEquipo,tipSegmento,descSegmento,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_eqred
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
inner join ws_segmento as eseg on eqp.tipSegmento = eseg.idSegmento
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_eqred = eqp.idEquipo) and idEquipo = _idEquipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_DIAGNOSTICOS` ()  BEGIN
select idDiagnostico,diagnostico,sgmto,descSegmento from ws_diagnosticos as d inner join ws_segmento as s on d.sgmto = s.idSegmento order by diagnostico asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_DIAG_SEGMENTO` (IN `_idSegmento` INT(11))  BEGIN
select idDiagnostico,diagnostico,sgmto from ws_diagnosticos where sgmto = _idSegmento order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUIPOSC` ()  BEGIN
SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,segmento,serie,sbn,marca,modelo,descripcion,ordenCompra,garantia,placa,procesador,vprocesador,ram,discoDuro,observaciones,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario inner join ws_responsables as resp1 on eq.uResponsable = resp1.idResponsable inner join ws_departamentos as dep on eq.office = dep.id_area inner join ws_servicios as serv on eq.service = serv.id_subarea where segmento = 1 order by idEquipo desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUIPOSP` ()  BEGIN
SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,segmento,serie,sbn,marca,modelo,descripcion,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario where segmento = 3 order by idTipo desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUIPOSR` ()  BEGIN
SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,segmento,serie,sbn,marca,modelo,descripcion,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario where segmento = 2 order by idTipo desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUPOSCOMPUTOMANT` (IN `_idTipo` INT(11))  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq 
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_pc = eq.idEquipo AND idTipo = _idTipo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUPOSIMPREMANT` (IN `_idTipo` INT(11))  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq 
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_imp = eq.idEquipo)AND idTipo = _idTipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUPOSOTROS` (IN `_idTipo` INT(11))  BEGIN
select idEquipo,serie from ws_equipos where idTipo = _idTipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUPOSREDMANT` (IN `_idTipo` INT(11))  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq 
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_eqred = eq.idEquipo AND idTipo = _idTipo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_ESTATENCION` ()  BEGIN
SELECT idEstAte,estAte FROM ws_estadoatencion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_FICHAS_MANTO` ()  BEGIN
SELECT idMantenimiento,descSegmento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,oficEquip,area,areaEquip,subarea,uResponsable,concat(nombresResp,' ',apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres,' ',apellido_paterno,' ',apellido_materno) as tecnico,descInc,primera_eval,date_format(fInicio,'%d/%m/%Y') as fInic,date_format(fFin,'%d/%m/%Y') as fFinE,tipTrabajo,tipoTrabajo,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_segmento as eseg on fmant.sgmtoManto = eseg.idSegmento
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
order by correlativo_Mant desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_INTEGRACIONC` ()  BEGIN
SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,respon.nombresResp as nombRes,respon.apellidosResp as apellRes,oficina_in,dept.area as departamento,servicio_in,serv.subarea as servicio,pc.idEquipo as idPc,pc.serie as seriepc,pc.sbn as sbnpc,pc.marca as marcapc,pc.modelo as modelopc,pc.descripcion as descripcionpc,pc.ordenCompra as Ordenpc,date_format(pc.fechaCompra,'%d-%m-%Y') as fcomprapc,pc.garantia as garantiapc,pc.placa as placapc,pc.procesador as procesadorpc,pc.vprocesador as vprocesadorpc,pc.ram as rampc,pc.discoDuro as ddpc,estado,descEstado,siteq.idSituacion as condicionPC,situacion FROM ws_integraciones as integra 
inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
inner join ws_equipos as pc on integra.serie_pc = pc.idEquipo
inner join ws_estado as esteq on integra.estado = esteq.idEstado
inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
inner join ws_responsables as respon on integra.responsable = respon.idResponsable
inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
WHERE segmento = 1 and estadoAnu = 0 order by correlativo_integracion desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_INTEGRACIONI` ()  BEGIN
SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,respon.nombresResp as nombRes,respon.apellidosResp as apellRes,oficina_in,dept.area as departamento,servicio_in,serv.subarea as servicio,imp.idEquipo as idimp,imp.serie as serieimp,imp.sbn as sbnimp,imp.marca as marcaimp,imp.modelo as modeloimp,imp.descripcion as descripcionimp,imp.ordenCompra as Ordenimp,date_format(imp.fechaCompra,'%d-%m-%Y') as fcompraimp,estado,descEstado,siteq.idSituacion as condicionPC,situacion FROM ws_integraciones as integra 
inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
inner join ws_equipos as imp on integra.serie_imp = imp.idEquipo
inner join ws_estado as esteq on integra.estado = esteq.idEstado
inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
inner join ws_responsables as respon on integra.responsable = respon.idResponsable
inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
WHERE segmento = 3 and estadoAnu = 0 order by correlativo_integracion desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_INTEGRACIONR` ()  BEGIN
SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,respon.nombresResp as nombRes,respon.apellidosResp as apellRes,oficina_in,dept.area as departamento,servicio_in,serv.subarea as servicio,eqred.idEquipo as idEqRed,eqred.serie as serieEqRed,eqred.sbn as sbnEqRed,eqred.marca as marcaEqRed,eqred.modelo as modeloEqRed,eqred.descripcion as descripcionEqRed,eqred.ordenCompra as OrdenEqRed,date_format(eqred.fechaCompra,'%d-%m-%Y') as fcompraEqRed,eqred.puertos as PuertosEqRed,eqred.capa as CapaEqRed,estado,descEstado,siteq.idSituacion as condicionPC,situacion FROM ws_integraciones as integra 
inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
inner join ws_equipos as eqred on integra.serie_eqred = eqred.idEquipo
inner join ws_estado as esteq on integra.estado = esteq.idEstado
inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
inner join ws_responsables as respon on integra.responsable = respon.idResponsable
inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
WHERE segmento = 2 and estadoAnu = 0 order by correlativo_integracion desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_COMPUS` (IN `_idMantenimiento` INT(11))  BEGIN
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,placa,procesador,vprocesador,ram,discoDuro,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
inner join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_pc
inner join ws_diagnosticos as fdiag1 on fmant.diagnostico1 = fdiag1.idDiagnostico
left join ws_diagnosticos as fdiag2 on fmant.diagnostico2 = fdiag2.idDiagnostico
left join ws_diagnosticos as fdiag3 on fmant.diagnostico3 = fdiag3.idDiagnostico
left join ws_diagnosticos as fdiag4 on fmant.diagnostico4 = fdiag4.idDiagnostico
left join ws_diagnosticos as fdiag5 on fmant.diagnostico5 = fdiag5.idDiagnostico
left join ws_diagnosticos as fdiag6 on fmant.diagnostico6 = fdiag6.idDiagnostico
left join ws_diagnosticos as fdiag7 on fmant.diagnostico7 = fdiag7.idDiagnostico
left join ws_diagnosticos as fdiag8 on fmant.diagnostico8 = fdiag8.idDiagnostico
inner join ws_acciones as facc1 on fmant.accion1 = facc1.idAccion
left join ws_acciones as facc2 on fmant.accion2 = facc2.idAccion
left join ws_acciones as facc3 on fmant.accion3 = facc3.idAccion
left join ws_acciones as facc4 on fmant.accion4 = facc4.idAccion
left join ws_acciones as facc5 on fmant.accion5 = facc5.idAccion
left join ws_acciones as facc6 on fmant.accion6 = facc6.idAccion
left join ws_acciones as facc7 on fmant.accion7 = facc7.idAccion
left join ws_acciones as facc8 on fmant.accion8 = facc8.idAccion
where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_IMPRE_PERI` (IN `_idMantenimiento` INT(11))  BEGIN
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
inner join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_imp
inner join ws_diagnosticos as fdiag1 on fmant.diagnostico1 = fdiag1.idDiagnostico
left join ws_diagnosticos as fdiag2 on fmant.diagnostico2 = fdiag2.idDiagnostico
left join ws_diagnosticos as fdiag3 on fmant.diagnostico3 = fdiag3.idDiagnostico
left join ws_diagnosticos as fdiag4 on fmant.diagnostico4 = fdiag4.idDiagnostico
left join ws_diagnosticos as fdiag5 on fmant.diagnostico5 = fdiag5.idDiagnostico
left join ws_diagnosticos as fdiag6 on fmant.diagnostico6 = fdiag6.idDiagnostico
left join ws_diagnosticos as fdiag7 on fmant.diagnostico7 = fdiag7.idDiagnostico
left join ws_diagnosticos as fdiag8 on fmant.diagnostico8 = fdiag8.idDiagnostico
inner join ws_acciones as facc1 on fmant.accion1 = facc1.idAccion
left join ws_acciones as facc2 on fmant.accion2 = facc2.idAccion
left join ws_acciones as facc3 on fmant.accion3 = facc3.idAccion
left join ws_acciones as facc4 on fmant.accion4 = facc4.idAccion
left join ws_acciones as facc5 on fmant.accion5 = facc5.idAccion
left join ws_acciones as facc6 on fmant.accion6 = facc6.idAccion
left join ws_acciones as facc7 on fmant.accion7 = facc7.idAccion
left join ws_acciones as facc8 on fmant.accion8 = facc8.idAccion
where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_OTROS` (IN `_idMantenimiento` INT(11))  BEGIN
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
inner join ws_diagnosticos as fdiag1 on fmant.diagnostico1 = fdiag1.idDiagnostico
left join ws_diagnosticos as fdiag2 on fmant.diagnostico2 = fdiag2.idDiagnostico
left join ws_diagnosticos as fdiag3 on fmant.diagnostico3 = fdiag3.idDiagnostico
left join ws_diagnosticos as fdiag4 on fmant.diagnostico4 = fdiag4.idDiagnostico
left join ws_diagnosticos as fdiag5 on fmant.diagnostico5 = fdiag5.idDiagnostico
left join ws_diagnosticos as fdiag6 on fmant.diagnostico6 = fdiag6.idDiagnostico
left join ws_diagnosticos as fdiag7 on fmant.diagnostico7 = fdiag7.idDiagnostico
left join ws_diagnosticos as fdiag8 on fmant.diagnostico8 = fdiag8.idDiagnostico
inner join ws_acciones as facc1 on fmant.accion1 = facc1.idAccion
left join ws_acciones as facc2 on fmant.accion2 = facc2.idAccion
left join ws_acciones as facc3 on fmant.accion3 = facc3.idAccion
left join ws_acciones as facc4 on fmant.accion4 = facc4.idAccion
left join ws_acciones as facc5 on fmant.accion5 = facc5.idAccion
left join ws_acciones as facc6 on fmant.accion6 = facc6.idAccion
left join ws_acciones as facc7 on fmant.accion7 = facc7.idAccion
left join ws_acciones as facc8 on fmant.accion8 = facc8.idAccion
where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_REDES` (IN `_idMantenimiento` INT(11))  BEGIN
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,puertos,capa,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
inner join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_eqred
inner join ws_diagnosticos as fdiag1 on fmant.diagnostico1 = fdiag1.idDiagnostico
left join ws_diagnosticos as fdiag2 on fmant.diagnostico2 = fdiag2.idDiagnostico
left join ws_diagnosticos as fdiag3 on fmant.diagnostico3 = fdiag3.idDiagnostico
left join ws_diagnosticos as fdiag4 on fmant.diagnostico4 = fdiag4.idDiagnostico
left join ws_diagnosticos as fdiag5 on fmant.diagnostico5 = fdiag5.idDiagnostico
left join ws_diagnosticos as fdiag6 on fmant.diagnostico6 = fdiag6.idDiagnostico
left join ws_diagnosticos as fdiag7 on fmant.diagnostico7 = fdiag7.idDiagnostico
left join ws_diagnosticos as fdiag8 on fmant.diagnostico8 = fdiag8.idDiagnostico
inner join ws_acciones as facc1 on fmant.accion1 = facc1.idAccion
left join ws_acciones as facc2 on fmant.accion2 = facc2.idAccion
left join ws_acciones as facc3 on fmant.accion3 = facc3.idAccion
left join ws_acciones as facc4 on fmant.accion4 = facc4.idAccion
left join ws_acciones as facc5 on fmant.accion5 = facc5.idAccion
left join ws_acciones as facc6 on fmant.accion6 = facc6.idAccion
left join ws_acciones as facc7 on fmant.accion7 = facc7.idAccion
left join ws_acciones as facc8 on fmant.accion8 = facc8.idAccion
where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_RESPONSABLES` ()  BEGIN
select idResponsable,dni,nombresResp,apellidosResp,idOficina,area,idServicio,subarea from (ws_responsables as res inner join ws_departamentos as dep on res.idOficina = dep.id_area) inner join ws_servicios as serv on res.idServicio = serv.id_subarea;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_RESPONSABLES_ITEM` (IN `_campo` TEXT, IN `_valor` TEXT)  BEGIN
select idResponsable,nombresResp,apellidosResp,idOficina,area,idServicio,subarea from (ws_responsables as res inner join ws_departamentos as dep on res.idOficina = dep.id_area) inner join ws_servicios as serv on res.idServicio = serv.id_subarea where _campo = _valor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERIESENER` ()  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_EstAcu = eq.idEquipo) AND (eq.idTipo = 12 OR eq.idTipo = 13);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERIESIMP` ()  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones eimp
WHERE eimp.serie_imp = eq.idEquipo) AND (eq.idTipo = 3 or eq.idTipo = 9 or eq.idTipo = 14 or eq.idTipo = 15 or eq.idTipo = 16 or eq.idTipo = 17);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERIESLAPSERV` ()  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND (eq.idTipo = 4 OR eq.idTipo = 5);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERIESMON` ()  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_monitor = eq.idEquipo) AND eq.idTipo = 10;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERIESPC` ()  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND eq.idTipo = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERIESRED` ()  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_eqred = eq.idEquipo) AND eq.tipSegmento = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERIESTEC` ()  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_teclado = eq.idEquipo) AND eq.idTipo = 11;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_SERVICIOS` (IN `_id_area` INT)  BEGIN
	SELECT * FROM ws_servicios WHERE id_area = _id_area;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_TRABAJOSMANTO` ()  BEGIN
SELECT * FROM ws_tipotrabajo where idTipoTrabajo between 1 and 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_UTECNICOS` ()  BEGIN
select id_usuario,nombres,apellido_paterno,apellido_materno from ws_usuarios where id_perfil between 3 and 4;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SACCI1` (IN `_sgmt` INT(11), IN `_existe` INT(11))  BEGIN
SELECT idAccion,accionrealizada FROM ws_acciones where segment = _sgmt and  idAccion != _existe order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SACCI2` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11))  BEGIN
SELECT idAccion,accionrealizada FROM ws_acciones where segment = _sgmt and  idAccion != _existe and  idAccion != _existe2 order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SACCI3` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11))  BEGIN
SELECT idAccion,accionrealizada FROM ws_acciones where segment = _sgmt and  idAccion != _existe and  idAccion != _existe2 and  idAccion != _existe3 order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SACCI4` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11))  BEGIN
SELECT idAccion,accionrealizada FROM ws_acciones where segment = _sgmt and  idAccion != _existe and  idAccion != _existe2 and  idAccion != _existe3 and  idAccion != _existe4 order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SACCI5` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11), IN `_existe5` INT(11))  BEGIN
SELECT idAccion,accionrealizada FROM ws_acciones where segment = _sgmt and  idAccion != _existe and  idAccion != _existe2 and  idAccion != _existe3 and  idAccion != _existe4 and  idAccion != _existe5 order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SACCI6` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11), IN `_existe5` INT(11), IN `_existe6` INT(11))  BEGIN
SELECT idAccion,accionrealizada FROM ws_acciones where segment = _sgmt and  idAccion != _existe and  idAccion != _existe2 and  idAccion != _existe3 and  idAccion != _existe4 and  idAccion != _existe5 and  idAccion != _existe6 order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SACCI7` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11), IN `_existe5` INT(11), IN `_existe6` INT(11), IN `_existe7` INT(11))  BEGIN
SELECT idAccion,accionrealizada FROM ws_acciones where segment = _sgmt and  idAccion != _existe and  idAccion != _existe2 and  idAccion != _existe3 and  idAccion != _existe4 and  idAccion != _existe5 and  idAccion != _existe6 and  idAccion != _existe7 order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SDIAG` (IN `_sgmt` INT(11), IN `_existe` INT(11))  BEGIN
SELECT idDiagnostico,diagnostico FROM ws_diagnosticos where sgmto = _sgmt and  idDiagnostico != _existe order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SDIAG2` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11))  BEGIN
SELECT idDiagnostico,diagnostico FROM ws_diagnosticos where sgmto = _sgmt and  idDiagnostico != _existe and  idDiagnostico != _existe2 order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SDIAG3` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11))  BEGIN
SELECT idDiagnostico,diagnostico FROM ws_diagnosticos where sgmto = _sgmt and  idDiagnostico != _existe and  idDiagnostico != _existe2 and  idDiagnostico != _existe3 order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SDIAG4` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11))  BEGIN
SELECT idDiagnostico,diagnostico FROM ws_diagnosticos where sgmto = _sgmt and  idDiagnostico != _existe and  idDiagnostico != _existe2 and  idDiagnostico != _existe3 and  idDiagnostico != _existe4 order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SDIAG5` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11), IN `_existe5` INT(11))  BEGIN
SELECT idDiagnostico,diagnostico FROM ws_diagnosticos where sgmto = _sgmt and  idDiagnostico != _existe and  idDiagnostico != _existe2 and  idDiagnostico != _existe3 and  idDiagnostico != _existe4 and  idDiagnostico != _existe5 order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SDIAG6` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11), IN `_existe5` INT(11), IN `_existe6` INT(11))  BEGIN
SELECT idDiagnostico,diagnostico FROM ws_diagnosticos where sgmto = _sgmt and  idDiagnostico != _existe and  idDiagnostico != _existe2 and  idDiagnostico != _existe3 and  idDiagnostico != _existe4 and  idDiagnostico != _existe5 and  idDiagnostico != _existe6 order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_SDIAG7` (IN `_sgmt` INT(11), IN `_existe` INT(11), IN `_existe2` INT(11), IN `_existe3` INT(11), IN `_existe4` INT(11), IN `_existe5` INT(11), IN `_existe6` INT(11), IN `_existe7` INT(11))  BEGIN
SELECT idDiagnostico,diagnostico FROM ws_diagnosticos where sgmto = _sgmt and  idDiagnostico != _existe and  idDiagnostico != _existe2 and  idDiagnostico != _existe3 and  idDiagnostico != _existe4 and  idDiagnostico != _existe5 and  idDiagnostico != _existe6 and  idDiagnostico != _existe7 order by diagnostico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN_USUARIO` (IN `_cuenta` TEXT)  BEGIN
select * from ws_usuarios where cuenta= _cuenta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_CATEGORIA` (IN `_categoria` TEXT, IN `_segmento` INT(11))  BEGIN
INSERT INTO ws_categorias(categoria,segmento) VALUES(_categoria,_segmento);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_EQUIPOC` (IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` DATE, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_placa` TEXT, IN `_procesador` TEXT, IN `_vprocesador` TEXT, IN `_ram` TEXT, IN `_discoDuro` TEXT, IN `_observaciones` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11), IN `_registrador` INT(11), IN `_tipSegmento` INT(11))  BEGIN
insert into ws_equipos(idTipo,uResponsable,office,service,serie,sbn,marca,modelo,descripcion,fechaCompra,ordenCompra,garantia,placa,procesador,vprocesador,ram,discoDuro,observaciones,condicion,estadoEQ,registrador,tipSegmento) values(_idTipo,_uResponsable,_idOficina,_idServicio,_serie,_sbn,_marca,_modelo,_descripcion,_fechaCompra,_ordenCompra,_garantia,_placa,_procesador,_vprocesador,_ram,_discoDuro,_observaciones,_condicion,_estadoEQ,_registrador,_tipSegmento);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_EQUIPOP` (IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` TEXT, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_observaciones` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11), IN `_registrador` INT(11), IN `_tipSegmento` INT(11))  BEGIN
insert into ws_equipos(idTipo,uResponsable,office,service,serie,sbn,marca,modelo,descripcion,fechaCompra,ordenCompra,garantia,observaciones,condicion,estadoEQ,registrador,tipSegmento) values(_idTipo,_uResponsable,_idOficina,_idServicio,_serie,_sbn,_marca,_modelo,_descripcion,_fechaCompra,_ordenCompra,_garantia,_observaciones,_condicion,_estadoEQ,_registrador,_tipSegmento);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_EQUIPOR` (IN `_idTipo` INT(11), IN `_uResponsable` INT(11), IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_serie` TEXT, IN `_sbn` TEXT, IN `_marca` TEXT, IN `_modelo` TEXT, IN `_descripcion` TEXT, IN `_fechaCompra` TEXT, IN `_ordenCompra` TEXT, IN `_garantia` TEXT, IN `_puertos` TEXT, IN `_capa` TEXT, IN `_observaciones` TEXT, IN `_condicion` INT(11), IN `_estadoEQ` INT(11), IN `_registrador` INT(11), IN `_tipSegmento` INT(11))  BEGIN
INSERT INTO ws_equipos(idTipo,uResponsable,office,service,serie,sbn,marca,modelo,descripcion,fechaCompra,ordenCompra,garantia,puertos,capa,observaciones,condicion,estadoEQ,registrador,tipSegmento) VALUES(_idTipo,_uResponsable,_idOficina,_idServicio,_serie,_sbn,_marca,_modelo,_descripcion,_fechaCompra,_ordenCompra,_garantia,_puertos,_capa,_observaciones,_condicion,_estadoEQ,_registrador,_tipSegmento);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_INTEGRACIONC` (IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_pc` INT(11), IN `_serie_monitor` INT(11), IN `_serie_teclado` INT(11), IN `_serie_EstAcu` INT(11), IN `_fecha_registro` DATE, IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
INSERT INTO ws_integraciones(nro_eq,ip,serie_pc,serie_monitor,serie_teclado,serie_EstAcu,fecha_registro,tipo_equipo,responsable,oficina_in,servicio_in,estado,condicion) VALUES (_nro_eq,_ip ,_serie_pc,_serie_monitor,_serie_teclado,_serie_EstAcu,_fecha_registro,_tipo_equipo,_responsable,_oficina_in,_servicio_in,_estado,_condicion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_INTEGRACIONC1` (IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_pc` INT(11), IN `_fecha_registro` DATE, IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
INSERT INTO ws_integraciones(nro_eq,ip,serie_pc,fecha_registro,tipo_equipo,responsable,oficina_in,servicio_in,estado,condicion) VALUES (_nro_eq,_ip ,_serie_pc,_fecha_registro,_tipo_equipo,_responsable,_oficina_in,_servicio_in,_estado,_condicion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_INTEGRACIONCER` (IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_eqred` INT(11), IN `_fecha_registro` DATE, IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
INSERT INTO ws_integraciones(nro_eq,ip,serie_eqred,fecha_registro,tipo_equipo,responsable,oficina_in,servicio_in,estado,condicion) VALUES (_nro_eq,_ip ,_serie_eqred,_fecha_registro,_tipo_equipo,_responsable,_oficina_in,_servicio_in,_estado,_condicion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_INTEGRACIONCI` (IN `_nro_eq` TEXT, IN `_ip` TEXT, IN `_serie_imp` INT(11), IN `_fecha_registro` DATE, IN `_tipo_equipo` INT(11), IN `_responsable` INT(11), IN `_oficina_in` INT(11), IN `_servicio_in` INT(11), IN `_estado` INT(11), IN `_condicion` INT(11))  BEGIN
INSERT INTO ws_integraciones(nro_eq,ip,serie_imp,fecha_registro,tipo_equipo,responsable,oficina_in,servicio_in,estado,condicion) VALUES (_nro_eq,_ip ,_serie_imp,_fecha_registro,_tipo_equipo,_responsable,_oficina_in,_servicio_in,_estado,_condicion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_MANTENIMIENTO` (IN `_fRegistroMant` DATE, IN `_tipEquipo` INT(11), IN `_condInicial` INT(11), IN `_idEquip` INT(11), IN `_oficEquip` INT(11), IN `_areaEquip` INT(11), IN `_respoEquip` INT(11), IN `_logdeta` TEXT, IN `_descInc` TEXT, IN `_diagnostico1` INT(11), IN `_diagnostico2` INT(11), IN `_diagnostico3` INT(11), IN `_diagnostico4` INT(11), IN `_diagnostico5` INT(11), IN `_diagnostico6` INT(11), IN `_diagnostico7` INT(11), IN `_diagnostico8` INT(11), IN `_tecEvalua` INT(11), IN `_fEvalua` DATE, IN `_primera_eval` TEXT, IN `_fInicio` DATE, IN `_fFin` DATE, IN `_tipTrabajo` INT(11), IN `_accion1` INT(11), IN `_accion2` INT(11), IN `_accion3` INT(11), IN `_accion4` INT(11), IN `_accion5` INT(11), IN `_accion6` INT(11), IN `_accion7` INT(11), IN `_accion8` INT(11), IN `_recomendaciones` TEXT, IN `_estAtencion` INT(11), IN `_condFinal` INT(11), IN `_servTerce` TEXT, IN `_otros` TEXT, IN `_obsOtros` TEXT, IN `_usRegistra` INT(11), IN `_sgmtoManto` INT(11))  BEGIN
INSERT INTO ws_mantenimientos(fRegistroMant,tipEquipo,condInicial,idEquip,oficEquip,areaEquip,respoEquip,logdeta,descInc,diagnostico1,diagnostico2,diagnostico3,diagnostico4,diagnostico5,diagnostico6,diagnostico7,diagnostico8,tecEvalua,fEvalua,primera_eval,fInicio,fFin,tipTrabajo,accion1,accion2,accion3,accion4,accion5,accion6,accion7,accion8,recomendaciones,estAtencion,condFinal,servTerce,otros,obsOtros,usRegistra,sgmtoManto) VALUES(_fRegistroMant,_tipEquipo,_condInicial,_idEquip,_oficEquip,_areaEquip,_respoEquip,_logdeta,_descInc,_diagnostico1,_diagnostico2,_diagnostico3,_diagnostico4,_diagnostico5,_diagnostico6,_diagnostico7,_diagnostico8,_tecEvalua,_fEvalua,_primera_eval,_fInicio,_fFin,_tipTrabajo,_accion1,_accion2,_accion3,_accion4,_accion5,_accion6,_accion7,_accion8,_recomendaciones,_estAtencion,_condFinal,_servTerce,_otros,_obsOtros,_usRegistra,_sgmtoManto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_OFICINA_DPTO` (IN `_area` TEXT)  BEGIN
INSERT INTO ws_departamentos(area) VALUES(_area);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_RESPONSABLE` (IN `_dniResp` TEXT, IN `_nombresResp` TEXT, IN `_apellidosResp` TEXT, IN `_idOficina` INT(11), IN `_idServicio` INT(11))  BEGIN
INSERT INTO ws_responsables(dni,nombresResp,apellidosResp,idOficina,idServicio) VALUES(_dniResp,_nombresResp,_apellidosResp,_idOficina,_idServicio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_SERVICIO_OD` (IN `_id_area` INT(11), IN `_subarea` TEXT)  BEGIN
INSERT INTO ws_servicios(id_area, subarea) VALUES(_id_area,_subarea);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRO_USUARIO` (IN `_perfil` INT(11), IN `_dni` VARCHAR(8), IN `_nombres` TEXT, IN `_apellidoPat` TEXT, IN `_apellidoMat` TEXT, IN `_cuenta` TEXT, IN `_clave` TEXT)  BEGIN
INSERT INTO ws_usuarios(id_perfil, dni, nombres, apellido_paterno,apellido_materno, cuenta, clave) VALUES(_perfil,_dni,_nombres,_apellidoPat,_apellidoMat,_cuenta,_clave);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Z_REG_AUDITORIAMANT` (IN `_idDoc` INT(11), IN `_usExec` INT(11), IN `_accExec` TEXT, IN `_fecha_audi` DATE)  BEGIN
INSERT INTO ws_z_auditoria_mantenimientos(idDoc,usExec,accExec,fecha_audi) VALUES(_idDoc,_usExec,_accExec,_fecha_audi);
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `IFEMPTY` (`s` TEXT, `defaultValue` TEXT) RETURNS TEXT CHARSET latin1 return if(s is null or s = '', defaultValue, s)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_acciones`
--

CREATE TABLE `ws_acciones` (
  `idAccion` int(11) NOT NULL,
  `segment` int(11) NOT NULL,
  `accionrealizada` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_acciones`
--

INSERT INTO `ws_acciones` (`idAccion`, `segment`, `accionrealizada`) VALUES
(1, 1, 'Copia de Seguridad'),
(2, 1, 'Formateo de disco duro'),
(3, 3, 'Desmontaje de impresora'),
(4, 1, 'Mantenimiento físico'),
(5, 1, 'Mantenimiento lógico'),
(6, 1, 'Instalación de sistema operativo'),
(7, 3, 'Verificación de teclas y contactos'),
(8, 1, 'Verificación de teclas y contactos'),
(9, 3, 'Configuración de impresora'),
(10, 1, 'Revisión de disco duro'),
(11, 1, 'Revisión de tarjeta de vídeo'),
(12, 1, 'Eliminación de temporales'),
(13, 1, 'Instalación de programas'),
(14, 1, 'Instalación de drivers o controladores'),
(15, 1, 'Eliminación de virus'),
(17, 1, 'Instalación de antivirus'),
(18, 1, 'Mantenimiento general'),
(19, 2, 'Mantenimiento general'),
(20, 3, 'Mantenimiento general'),
(21, 3, 'Desmontaje y limpieza'),
(22, 1, 'Se recomienda baja por obsolescencia técnica'),
(23, 2, 'Se recomienda baja por obsolescencia técnica'),
(24, 3, 'Se recomienda baja por obsolescencia técnica'),
(25, 2, 'Limpieza de puertos RJ45'),
(26, 2, 'Limpieza de puertos RJ11'),
(27, 2, 'accion 5'),
(28, 2, 'Accion 6'),
(29, 2, 'Accion 7'),
(30, 2, 'Accion 8');

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
(15, 3, 'Escáner'),
(16, 3, 'Proyector'),
(17, 3, 'Marcador Electrónico');

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
(1, 'Archivo Central', '2020-09-16 18:21:44'),
(2, 'Asesoría Jurídica', '2020-09-16 18:23:54'),
(3, 'Cirugía', '2020-09-16 18:24:01'),
(4, 'Comunicaciones', '2020-09-16 18:24:09'),
(5, 'Consultorios Externos', '2020-09-16 18:24:17'),
(6, 'Órgano de Control Interno', '2020-09-16 18:24:26'),
(7, 'Diagnóstico por Imágenes', '2020-09-16 18:24:48'),
(8, 'Dirección General', '2020-09-16 18:24:57'),
(9, 'Docencia', '2020-09-16 18:25:03'),
(10, 'Economía', '2020-09-16 18:25:14'),
(11, 'Emergencia', '2020-09-16 18:25:24'),
(12, 'Epidemiología', '2020-09-16 18:25:40'),
(13, 'Estadística e Informática', '2020-09-16 18:26:05'),
(14, 'Farmacia', '2020-09-16 18:26:36'),
(15, 'Gestión de la Calidad', '2020-09-16 18:26:46'),
(16, 'Ginecología', '2020-09-16 18:27:04'),
(17, 'Laboratorio y Patología Clínica', '2020-09-16 18:28:06'),
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
(31, 'Anestesiología y Centro Quirúrgico', '2020-09-22 00:39:17'),
(32, 'Enfermería', '2021-03-12 15:42:20'),
(33, 'Medicina Física', '2021-03-12 15:42:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_diagnosticos`
--

CREATE TABLE `ws_diagnosticos` (
  `idDiagnostico` int(11) NOT NULL,
  `sgmto` int(11) NOT NULL,
  `diagnostico` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_diagnosticos`
--

INSERT INTO `ws_diagnosticos` (`idDiagnostico`, `sgmto`, `diagnostico`) VALUES
(4, 1, 'Equipo Averiado'),
(5, 2, 'Equipo Averiado'),
(6, 3, 'Equipo Averiado'),
(7, 1, 'Falla de disco duro'),
(8, 1, 'Sistema Operativo dañado'),
(9, 1, 'Memoria  RAM malograda'),
(10, 1, 'Placa madre malograda'),
(11, 1, 'Falta de mantenimiento'),
(12, 2, 'Falta de mantenimiento'),
(13, 3, 'Falta de mantenimiento'),
(14, 1, 'Falla de Equipo'),
(15, 2, 'Falla de Equipo'),
(16, 3, 'Falla de Equipo'),
(17, 3, 'Falla de Estabilizador'),
(18, 3, 'Falla de Teclado'),
(19, 3, 'Falla de UPS'),
(20, 1, 'Falla de Fuente de Energía'),
(21, 2, 'Falla de Fuente de Energía'),
(22, 3, 'Falla de Fuente de Energía'),
(23, 1, 'Falla de tarjeta de vídeo'),
(24, 1, 'Detección de virus'),
(25, 1, 'Equipo Obsoleto'),
(26, 2, 'Equipo Obsoleto'),
(27, 3, 'Equipo Obsoleto'),
(28, 2, 'Puertos RJ45 averiados'),
(29, 2, 'Puertos RJ11 averiados'),
(30, 3, 'Falla de teflón de impresora'),
(31, 3, 'Falla de impresora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_equipos`
--

CREATE TABLE `ws_equipos` (
  `idEquipo` int(11) NOT NULL,
  `tipSegmento` int(11) NOT NULL,
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

INSERT INTO `ws_equipos` (`idEquipo`, `tipSegmento`, `idTipo`, `uResponsable`, `office`, `service`, `serie`, `sbn`, `marca`, `modelo`, `descripcion`, `fechaCompra`, `ordenCompra`, `garantia`, `placa`, `procesador`, `vprocesador`, `ram`, `discoDuro`, `puertos`, `capa`, `observaciones`, `fichaBaja`, `fichaReposición`, `condicion`, `estadoEQ`, `registrador`, `registrof`) VALUES
(54, 1, 1, 9, 13, 18, 'MXL2500TDK', '740899500413', 'HP', 'ELITE 8300', 'PC DE ESCRITORIO', '2018-08-31', '11-445456', '5 AÑOS', 'HP', 'CORE I7', '3.40 GHZ', '12GB', '1TB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-15 09:54:39'),
(55, 3, 11, 9, 13, 18, 'BDMEP0C5Y7N1FM', '009038', 'HP', 'KB-1156', 'TECLADO PERFI', '2018-08-31', '11-121121', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-15 09:58:07'),
(56, 3, 10, 9, 13, 18, '6CM2480JSF', '740880370017', 'HP', 'LV2311', 'MONITOR 24 PLGDAS', '2018-08-31', '11-15151', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-15 10:18:13'),
(57, 3, 13, 9, 13, 18, 'ESTABLE1', '1515151515', 'APC', 'APC-125', 'ESTABILIZADOR DE ENERGIA', '2018-08-31', '11-151515', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-15 10:19:03'),
(58, 2, 2, 9, 13, 18, 'SWITCH123', '151518484546', 'HP', 'ARUBA', 'SWITCH ADMINISTRABLE', '2018-08-31', '11-151515', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, '48', '3', 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-15 10:19:59'),
(59, 3, 3, 9, 13, 18, 'BRBSXBT8XZ', '740841000067', 'HP', 'M426FDW', 'HP LASERJET LASERJET PRO', '2018-06-22', '11-11515', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-15 10:24:19'),
(69, 3, 9, 9, 13, 18, 'REFTC', '111515155', 'VACJ', 'VA', 'VA', '2021-03-08', 'AV', 'AS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-22 10:55:16'),
(75, 2, 6, 12, 10, 24, 'SWAR137', '740854554565', 'HP', 'ARUBA-123', 'ASAS', '2021-03-17', '155-1551', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, '48', '3', 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-22 12:19:40'),
(76, 1, 4, 9, 13, 18, 'LAPTO1', '155', 'ACER', 'AC-151', 'LAPTOP DE TRABAJO', '2021-03-01', '11-111', '3 AÑOS', 'ASUS', 'CORE I7', '3.40 GHZ', '8GB', '1TB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-22 14:53:24'),
(78, 3, 3, 11, 10, 24, 'IMPRE12', '112', 'IMP', 'UMO', 'UMo', '2021-03-02', '11-11', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-23 12:06:47'),
(80, 2, 7, 11, 10, 24, 'AAAAAAA', '1111111', 'AAAAAA', 'AAAAA', 'AAAAAA', '2021-03-03', 'AA11', 'AAAA', NULL, NULL, NULL, NULL, NULL, 'AA', 'AA', 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-23 12:46:58'),
(81, 1, 4, 9, 13, 18, 'AKA', '13253', 'AKA', 'AKA', 'AKA', '2021-03-04', 'AKA', 'AKA', 'AKA', 'AKA', 'AK', 'AKA', 'AKA', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-25 10:23:10'),
(82, 3, 11, 12, 10, 24, 'TECXLA', '1262', 'TECLADOA', 'ASJ', 'AJS', '2021-03-18', 'AJ', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-25 14:27:01'),
(83, 1, 5, 13, 13, 16, 'SERV1', '1177212', 'SAERV', 'SERV', 'SERV', '2021-03-11', 'SERV', '5 AÑOS', 'HP', 'XEON', '3.20 GHZ', '32GB', '4TB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-25 14:45:32'),
(84, 2, 8, 9, 13, 18, 'ACP', '12232', 'ACO', 'ACP', 'ACP', '2021-03-12', 'ACP', 'ACP', NULL, NULL, NULL, NULL, NULL, 'ACPO', 'ACP', 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 09:32:30'),
(85, 3, 15, 9, 13, 18, 'ESCANOR', '1237', 'ESCANER', 'ESCANER', 'ESNCAER', '2021-03-05', 'ESCA', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 09:59:06'),
(86, 3, 9, 9, 13, 18, 'FOCOTOCOPIOA', '136172', 'FOTO', 'FOTO', 'FOTO', '2021-03-12', '231-11221', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 09:59:49'),
(87, 3, 14, 13, 13, 16, 'TICKET', '1712128', 'TICKET', 'TICKET', 'TICKET', '2021-03-05', '11-1515', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 10:15:02'),
(88, 3, 16, 13, 13, 16, 'PROYECTOR', '1151515', 'PYT', 'PYT', 'PYT', '2021-03-12', '11-1515', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 10:16:59'),
(89, 3, 17, 13, 13, 16, 'MARCADOR1', '11212', 'MARJ', 'MARK211', 'KK', '2021-03-05', '11-111', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 10:19:32'),
(90, 1, 4, 9, 13, 18, 'LENOVO12', '17171828', 'LENOVO', 'LEVONO', 'LENOVO', '2021-03-05', '11-1212', '5 AÑOS', 'AYERA', 'CORE I3', '3.20GHZ', '8GB', '1TB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 10:21:25'),
(91, 3, 12, 13, 13, 16, 'ACUM1', '151515', 'ACUMU', 'ACUMLA', 'ACUMA', '2021-03-05', '11-122', '5 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-03-26 10:30:20');

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
(3, 'Reposición');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_estadoatencion`
--

CREATE TABLE `ws_estadoatencion` (
  `idEstAte` int(11) NOT NULL,
  `estAte` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_estadoatencion`
--

INSERT INTO `ws_estadoatencion` (`idEstAte`, `estAte`, `fecha_creacion`) VALUES
(1, 'Concluida', '2021-03-25 16:48:55'),
(2, 'Pendiente', '2021-03-25 16:48:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_estadosdoc`
--

CREATE TABLE `ws_estadosdoc` (
  `idEstaDoc` int(11) NOT NULL,
  `estadoDoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_estadosdoc`
--

INSERT INTO `ws_estadosdoc` (`idEstaDoc`, `estadoDoc`) VALUES
(1, 'Activo'),
(2, 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_integraciones`
--

CREATE TABLE `ws_integraciones` (
  `idIntegracion` int(11) NOT NULL,
  `correlativo_integracion` text COLLATE utf8_spanish_ci,
  `nro_eq` text COLLATE utf8_spanish_ci NOT NULL,
  `ip` text COLLATE utf8_spanish_ci,
  `serie_pc` int(11) DEFAULT NULL,
  `serie_monitor` int(11) DEFAULT NULL,
  `serie_teclado` int(11) DEFAULT NULL,
  `serie_EstAcu` int(11) DEFAULT NULL,
  `serie_eqred` int(11) DEFAULT NULL,
  `serie_imp` int(11) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `tipo_equipo` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `oficina_in` int(11) NOT NULL,
  `servicio_in` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `condicion` int(11) NOT NULL,
  `estadoAnu` int(11) NOT NULL DEFAULT '0',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_integraciones`
--

INSERT INTO `ws_integraciones` (`idIntegracion`, `correlativo_integracion`, `nro_eq`, `ip`, `serie_pc`, `serie_monitor`, `serie_teclado`, `serie_EstAcu`, `serie_eqred`, `serie_imp`, `fecha_registro`, `tipo_equipo`, `responsable`, `oficina_in`, `servicio_in`, `estado`, `condicion`, `estadoAnu`, `registro`) VALUES
(1, 'FT-2021-00001', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 15:26:22'),
(2, 'FT-2021-00002', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 15:26:46'),
(3, 'FT-2021-00003', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 15:27:04'),
(4, 'FT-2021-00004', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 15:27:46'),
(5, 'FT-2021-00005', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 15:29:32'),
(6, 'FT-2021-00006', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 16:05:17'),
(7, 'FT-2021-00007', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 16:31:05'),
(8, 'FT-2021-00008', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 18:11:49'),
(9, 'FT-2021-00009', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 18:14:35'),
(10, 'FT-2021-00010', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 18:15:19'),
(11, 'FT-2021-00011', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 18:32:56'),
(12, 'FT-2021-00012', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 19:21:44'),
(13, 'FT-2021-00013', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 19:39:11'),
(14, 'FT-2021-00014', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25', 0, 0, 0, 0, 0, 0, 1, '2021-02-25 19:47:03'),
(15, 'FT-2021-00015', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26', 0, 0, 0, 0, 0, 0, 1, '2021-02-26 15:24:00'),
(16, 'FT-2021-00016', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26', 0, 0, 0, 0, 0, 0, 1, '2021-02-26 15:59:14'),
(17, 'FT-2021-00017', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26', 0, 0, 0, 0, 0, 0, 1, '2021-02-26 16:08:50'),
(18, 'FT-2021-00018', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26', 0, 0, 0, 0, 0, 0, 1, '2021-02-26 19:41:50'),
(19, 'FT-2021-00019', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26', 0, 0, 0, 0, 0, 0, 1, '2021-02-26 19:42:13'),
(20, 'FT-2021-00020', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26', 0, 0, 0, 0, 0, 0, 1, '2021-02-26 19:45:12'),
(21, 'FT-2021-00021', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-04', 0, 0, 0, 0, 0, 0, 1, '2021-03-04 16:06:35'),
(22, 'FT-2021-00022', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-04', 0, 0, 0, 0, 0, 0, 1, '2021-03-04 19:47:04'),
(23, 'FT-2021-00023', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-04', 0, 0, 0, 0, 0, 0, 1, '2021-03-04 19:48:37'),
(24, 'FT-2021-00024', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-04', 0, 0, 0, 0, 0, 0, 1, '2021-03-04 19:49:02'),
(25, 'FT-2021-00025', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-04', 0, 0, 0, 0, 0, 0, 1, '2021-03-04 19:49:32'),
(26, 'FT-2021-00026', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-04', 0, 0, 0, 0, 0, 0, 1, '2021-03-04 19:50:00'),
(27, 'FT-2021-00027', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-04', 0, 0, 0, 0, 0, 0, 1, '2021-03-04 20:02:47'),
(28, 'FT-2021-00028', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08', 0, 0, 0, 0, 0, 0, 1, '2021-03-08 17:16:57'),
(29, 'FT-2021-00029', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08', 0, 0, 0, 0, 0, 0, 1, '2021-03-08 17:26:45'),
(30, 'FT-2021-00030', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08', 0, 0, 0, 0, 0, 0, 1, '2021-03-08 17:27:08'),
(31, 'FT-2021-00031', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08', 0, 0, 0, 0, 0, 0, 1, '2021-03-08 17:27:39'),
(32, 'FT-2021-00032', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08', 0, 0, 0, 0, 0, 0, 1, '2021-03-08 17:30:43'),
(33, 'FT-2021-00033', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08', 0, 0, 0, 0, 0, 0, 1, '2021-03-08 18:05:26'),
(34, 'FT-2021-00034', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08', 0, 0, 0, 0, 0, 0, 1, '2021-03-08 18:07:01'),
(35, 'FT-2021-00035', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-09', 0, 0, 0, 0, 0, 0, 1, '2021-03-09 16:15:20'),
(36, 'FT-2021-00036', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-09', 0, 0, 0, 0, 0, 0, 1, '2021-03-09 18:46:31'),
(37, 'FT-2021-00037', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-10', 0, 0, 0, 0, 0, 0, 1, '2021-03-10 14:23:57'),
(38, 'FT-2021-00038', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-15', 0, 0, 0, 0, 0, 0, 1, '2021-03-15 15:20:23'),
(39, 'FT-2021-00039', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-15', 0, 0, 0, 0, 0, 0, 1, '2021-03-15 15:26:13'),
(40, 'FT-2021-00040', 'SW_00001', '', NULL, NULL, NULL, NULL, 58, NULL, '2021-03-15', 2, 9, 13, 18, 1, 1, 0, '2021-03-15 15:26:46'),
(41, 'FT-2021-00041', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-15', 0, 0, 0, 0, 0, 0, 1, '2021-03-15 15:35:39'),
(42, 'FT-2021-00042', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-22', 0, 0, 0, 0, 0, 0, 1, '2021-03-22 15:22:50'),
(43, 'FT-2021-00043', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-22', 0, 0, 0, 0, 0, 0, 1, '2021-03-22 17:20:09'),
(44, 'FT-2021-00044', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-22', 0, 0, 0, 0, 0, 0, 1, '2021-03-22 19:53:44'),
(45, 'FT-2021-00045', 'LAP_0004', '172.16.5.125', 76, NULL, NULL, NULL, NULL, NULL, '2021-03-22', 4, 9, 13, 18, 1, 1, 0, '2021-03-22 19:56:21'),
(46, 'FT-2021-00046', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-22', 0, 0, 0, 0, 0, 0, 1, '2021-03-22 20:09:43'),
(49, 'FT-2021-00047', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-23', 0, 0, 0, 0, 0, 0, 1, '2021-03-23 17:07:08'),
(50, 'FT-2021-00048', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-23', 0, 0, 0, 0, 0, 0, 1, '2021-03-23 17:47:51'),
(51, 'FT-2021-00049', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-25', 0, 0, 0, 0, 0, 0, 1, '2021-03-25 19:27:35'),
(52, 'FT-2021-00050', 'LAP_054', '172.31.6.50', 81, NULL, NULL, NULL, NULL, NULL, '2021-03-25', 4, 9, 13, 18, 1, 1, 0, '2021-03-25 19:35:10'),
(53, 'FT-2021-00051', 'PC_OCP', '172.16.5.100', 54, 56, 55, 57, NULL, NULL, '2021-03-25', 1, 9, 13, 18, 1, 1, 0, '2021-03-25 19:35:29'),
(54, 'FT-2021-00052', 'SERV_0001', '172.16.0.4', 83, NULL, NULL, NULL, NULL, NULL, '2021-03-25', 5, 9, 13, 18, 1, 1, 0, '2021-03-25 19:45:50'),
(55, 'FT-2021-00053', 'ACP_0001', '', NULL, NULL, NULL, NULL, 84, NULL, '2021-03-26', 8, 9, 13, 18, 1, 1, 0, '2021-03-26 14:32:48'),
(56, 'FT-2021-00054', 'RT_0001', '', NULL, NULL, NULL, NULL, 75, NULL, '2021-03-26', 6, 12, 10, 24, 1, 1, 0, '2021-03-26 14:33:10'),
(57, 'FT-2021-00055', 'FRW_0001', '', NULL, NULL, NULL, NULL, 80, NULL, '2021-03-26', 8, 11, 10, 24, 1, 1, 0, '2021-03-26 14:33:34'),
(58, 'FT-2021-00056', 'ANULADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-26', 0, 0, 0, 0, 0, 0, 1, '2021-03-26 14:35:40'),
(59, 'FT-2021-00057', 'FTC_0001', '', NULL, NULL, NULL, NULL, NULL, 69, '2021-03-26', 9, 9, 13, 18, 1, 1, 0, '2021-03-26 15:03:30'),
(60, 'FT-2021-00058', 'ESC_001', '', NULL, NULL, NULL, NULL, NULL, 85, '2021-03-26', 3, 9, 13, 18, 1, 1, 0, '2021-03-26 15:04:50'),
(61, 'FT-2021-00059', 'IMP_0001', '172.16.5.210', NULL, NULL, NULL, NULL, NULL, 59, '2021-03-26', 3, 9, 13, 18, 1, 1, 0, '2021-03-26 15:09:11'),
(62, 'FT-2021-00060', 'FTC_001', '', NULL, NULL, NULL, NULL, NULL, 86, '2021-03-26', 9, 9, 13, 18, 1, 1, 0, '2021-03-26 15:12:42'),
(63, 'FT-2021-00061', 'IMP_0004', '', NULL, NULL, NULL, NULL, NULL, 78, '2021-03-26', 3, 11, 10, 24, 1, 1, 0, '2021-03-26 15:13:31'),
(64, 'FT-2021-00062', 'TIC_0001', '', NULL, NULL, NULL, NULL, NULL, 87, '2021-03-26', 14, 13, 13, 16, 1, 1, 0, '2021-03-26 15:15:50'),
(65, 'FT-2021-00063', 'PYT_001', '', NULL, NULL, NULL, NULL, NULL, 88, '2021-03-26', 16, 13, 13, 16, 1, 1, 0, '2021-03-26 15:17:29'),
(66, 'FT-2021-00064', 'MRK_0001', '', NULL, NULL, NULL, NULL, NULL, 89, '2021-03-26', 17, 13, 13, 16, 1, 1, 0, '2021-03-26 15:20:12'),
(67, 'FT-2021-00065', 'LAP_0555', '172.16.8.100', 90, NULL, NULL, NULL, NULL, NULL, '2021-03-26', 4, 9, 13, 18, 1, 1, 0, '2021-03-26 18:02:14');

--
-- Disparadores `ws_integraciones`
--
DELIMITER $$
CREATE TRIGGER `GENERAR_CORRELATIVO_INTEGRACION` BEFORE INSERT ON `ws_integraciones` FOR EACH ROW BEGIN
    DECLARE cont1 int default 0;
    DECLARE anio text;
    
    set anio = (SELECT YEAR(CURDATE()));
    SET cont1= (SELECT count(*) FROM ws_integraciones WHERE year(fecha_registro) = year(now()));
    IF (cont1 < 1) THEN
    SET NEW.correlativo_integracion = CONCAT('FT-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    ELSE
    SET NEW.correlativo_integracion = CONCAT('FT-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_mantenimientos`
--

CREATE TABLE `ws_mantenimientos` (
  `idMantenimiento` int(11) NOT NULL,
  `correlativo_Mant` text COLLATE utf8_spanish_ci NOT NULL,
  `fRegistroMant` date NOT NULL,
  `tipEquipo` int(11) NOT NULL,
  `condInicial` int(11) NOT NULL,
  `idEquip` int(11) NOT NULL,
  `oficEquip` int(11) NOT NULL,
  `areaEquip` int(11) NOT NULL,
  `respoEquip` int(11) NOT NULL,
  `logdeta` text COLLATE utf8_spanish_ci,
  `descInc` text COLLATE utf8_spanish_ci,
  `diagnostico1` int(11) NOT NULL,
  `diagnostico2` int(11) NOT NULL DEFAULT '0',
  `diagnostico3` int(11) NOT NULL DEFAULT '0',
  `diagnostico4` int(11) NOT NULL DEFAULT '0',
  `diagnostico5` int(11) NOT NULL DEFAULT '0',
  `diagnostico6` int(11) NOT NULL DEFAULT '0',
  `diagnostico7` int(11) NOT NULL DEFAULT '0',
  `diagnostico8` int(11) NOT NULL DEFAULT '0',
  `tecEvalua` int(11) NOT NULL,
  `fEvalua` date DEFAULT NULL,
  `primera_eval` text COLLATE utf8_spanish_ci,
  `fInicio` date DEFAULT NULL,
  `fFin` date DEFAULT NULL,
  `tipTrabajo` int(11) NOT NULL,
  `accion1` int(11) NOT NULL,
  `accion2` int(11) NOT NULL DEFAULT '0',
  `accion3` int(11) NOT NULL DEFAULT '0',
  `accion4` int(11) NOT NULL DEFAULT '0',
  `accion5` int(11) NOT NULL DEFAULT '0',
  `accion6` int(11) NOT NULL DEFAULT '0',
  `accion7` int(11) NOT NULL DEFAULT '0',
  `accion8` int(11) NOT NULL DEFAULT '0',
  `recomendaciones` text COLLATE utf8_spanish_ci,
  `estAtencion` int(11) NOT NULL,
  `condFinal` int(11) NOT NULL,
  `servTerce` text COLLATE utf8_spanish_ci,
  `otros` text COLLATE utf8_spanish_ci,
  `obsOtros` text COLLATE utf8_spanish_ci,
  `usRegistra` int(11) NOT NULL,
  `sgmtoManto` int(11) NOT NULL DEFAULT '0',
  `estAnulado` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_mantenimientos`
--

INSERT INTO `ws_mantenimientos` (`idMantenimiento`, `correlativo_Mant`, `fRegistroMant`, `tipEquipo`, `condInicial`, `idEquip`, `oficEquip`, `areaEquip`, `respoEquip`, `logdeta`, `descInc`, `diagnostico1`, `diagnostico2`, `diagnostico3`, `diagnostico4`, `diagnostico5`, `diagnostico6`, `diagnostico7`, `diagnostico8`, `tecEvalua`, `fEvalua`, `primera_eval`, `fInicio`, `fFin`, `tipTrabajo`, `accion1`, `accion2`, `accion3`, `accion4`, `accion5`, `accion6`, `accion7`, `accion8`, `recomendaciones`, `estAtencion`, `condFinal`, `servTerce`, `otros`, `obsOtros`, `usRegistra`, `sgmtoManto`, `estAnulado`, `fecha_creacion`) VALUES
(1, 'FM-2021-00001', '2021-04-25', 1, 1, 54, 13, 18, 9, 'N° Equipo: PC_OCP || Serie N°: MXL2500TDK || Cod.Patr: 740899500413 || Marca: HP || Modelo: ELITE 8300 || Descripción: PC DE ESCRITORIO || IP: 172.16.5.100 || Procesador: CORE I7-3.40 GHZ || RAM: 12GB || Disco Duro: 1TB', 'ajam1', 24, 4, 25, 7, 14, 20, 23, 11, 4, '2021-04-21', 'ssss', '2021-04-22', '2021-04-23', 3, 12, 1, 15, 2, 8, 11, 5, 13, 'asaa', 1, 1, 'NO', 'SI', 'aaaa', 1, 1, 1, '2021-04-26 03:38:29'),
(2, 'FM-2021-00002', '2021-04-25', 4, 1, 76, 13, 18, 9, 'N° Equipo: LAP_0004 || Serie N°: LAPTO1 || Cod.Patr: 155 || Marca: ACER || Modelo: AC-151 || Descripción: LAPTOP DE TRABAJO || IP: 172.16.5.125 || Procesador: CORE I7-3.40 GHZ || RAM: 8GB || Disco Duro: 1TB', 'asa', 4, 10, 24, 25, 7, 14, 0, 0, 6, '2021-04-22', 'asa', '2021-04-23', '2021-04-24', 1, 6, 1, 15, 12, 2, 13, 17, 0, 'asa', 2, 1, 'NO', 'SI', 'AASS', 1, 1, 1, '2021-04-26 03:43:23'),
(3, 'FM-2021-00003', '2021-04-26', 3, 1, 78, 10, 24, 11, 'N° Equipo: IMP_0004 || Serie N°: IMPRE12 || Cod.Patr: 112 || Marca: IMP || Modelo: UMO || Descripción: UMo || IP: ', 'imp2', 6, 27, 16, 17, 22, 0, 0, 0, 6, '2021-04-25', 'asas', '2021-04-25', '2021-04-25', 2, 9, 3, 21, 20, 24, 0, 0, 0, 'asas', 2, 1, 'NO', 'NO', '', 1, 3, 1, '2021-04-26 05:08:22'),
(4, 'FM-2021-00004', '2021-04-26', 12, 2, 91, 13, 16, 13, 'Serie N°: ACUM1 || Cod.Patr: 151515 || Marca: ACUMU || Modelo: ACUMLA || Descripción: ACUMA', 'asas', 13, 30, 27, 17, 0, 0, 0, 0, 5, '2021-04-24', 'asas', '2021-04-24', '2021-04-25', 2, 9, 21, 3, 24, 0, 0, 0, 0, 'asas', 1, 2, 'NO', 'SI', 'asasas', 1, 3, 1, '2021-04-26 05:09:22'),
(5, 'FM-2021-00005', '2021-04-26', 8, 1, 84, 13, 18, 9, 'N° Equipo: ACP_0001 || Serie N°: ACP || Cod.Patr: 12232 || Marca: ACO || Modelo: ACP || Descripción: ACP || IP: ', 'asas', 21, 5, 26, 15, 0, 0, 0, 0, 5, '2021-04-25', 'asas', '2021-04-25', '2021-04-25', 1, 27, 28, 29, 30, 0, 0, 0, 0, 'asas', 1, 2, 'NO', 'NO', '', 1, 2, 1, '2021-04-26 05:10:26'),
(6, 'FM-2021-00006', '2021-04-26', 9, 1, 86, 13, 18, 9, 'N° Equipo: FTC_001 || Serie N°: FOCOTOCOPIOA || Cod.Patr: 136172 || Marca: FOTO || Modelo: FOTO || Descripción: FOTO || IP: ', 'aaa', 6, 22, 27, 19, 0, 0, 0, 0, 5, '2021-04-26', 'eee', '2021-04-26', '2021-04-26', 1, 24, 0, 0, 0, 0, 0, 0, 0, 'eeee', 1, 1, 'NO', 'SI', 'aaaaa', 1, 3, 1, '2021-04-26 06:28:05');

--
-- Disparadores `ws_mantenimientos`
--
DELIMITER $$
CREATE TRIGGER `GENERAR_CORRELATIVO_MANTENIMIENTO` BEFORE INSERT ON `ws_mantenimientos` FOR EACH ROW BEGIN
    DECLARE cont1 int default 0;
    DECLARE anio text;
    set anio = (SELECT YEAR(CURDATE()));
    SET cont1= (SELECT count(*) FROM ws_mantenimientos WHERE year(fRegistroMant) = year(now()));
    IF (cont1 < 1) THEN
    SET NEW.correlativo_Mant = CONCAT('FM-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    ELSE
    SET NEW.correlativo_Mant = CONCAT('FM-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    END IF;
END
$$
DELIMITER ;

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
(2, 'Jefe', '2020-02-20 16:34:11'),
(3, 'Coordinador', '2020-09-16 18:34:30'),
(4, 'Técnico', '2021-03-01 16:33:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_responsables`
--

CREATE TABLE `ws_responsables` (
  `idResponsable` int(11) NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `nombresResp` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidosResp` text COLLATE utf8_spanish_ci NOT NULL,
  `idOficina` int(11) DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_responsables`
--

INSERT INTO `ws_responsables` (`idResponsable`, `dni`, `nombresResp`, `apellidosResp`, `idOficina`, `idServicio`) VALUES
(9, '77478995', 'Olger Ivan', 'Castro Palacios', 13, 18),
(11, '45249201', 'Moises Ronald', 'Calderon Cotos', 10, 24),
(12, '42095865', 'Roner', 'Mas Valle', 10, 24),
(13, '42162499', 'William', 'Guerrero Sandoval', 13, 16);

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
  `subarea` text CHARACTER SET latin1 NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_servicios`
--

INSERT INTO `ws_servicios` (`id_subarea`, `id_area`, `subarea`, `fecha_creacion`) VALUES
(12, 31, 'Sala de Operaciones', '2020-09-22 00:38:42'),
(13, 31, 'Jefatura', '2020-09-22 00:39:28'),
(14, 4, 'Jefatura', '2020-09-22 00:39:50'),
(15, 13, 'Digitación', '2020-09-22 19:14:30'),
(16, 13, 'Soporte Técnico', '2021-02-04 23:52:58'),
(17, 13, 'Jefatura', '2021-02-06 05:33:18'),
(18, 13, 'Desarrollo', '2021-02-07 01:46:17'),
(19, 3, 'Jefatura', '2021-03-10 15:33:55'),
(20, 8, 'Adjunta', '2021-03-12 18:37:30'),
(21, 8, 'Secretaría', '2021-03-12 18:38:02'),
(23, 32, 'Jefatura', '2021-03-12 19:10:57'),
(24, 10, 'Contabilidad', '2021-03-15 16:26:45');

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
(3, 'Otro'),
(4, 'Baja'),
(5, 'Reposición');

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
  `estado` int(11) NOT NULL DEFAULT '0',
  `nintentos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ws_usuarios`
--

INSERT INTO `ws_usuarios` (`id_usuario`, `id_perfil`, `dni`, `nombres`, `apellido_paterno`, `apellido_materno`, `cuenta`, `clave`, `fecha_registro`, `estado`, `nintentos`) VALUES
(1, 1, '77478995', 'Olger Ivan', 'Castro', 'Palacios', 'ocastrop', '$2a$07$usesomesillystringforeVF6hLwtgsUBAmUN4cGEd8tYF74gSHRW', '2020-03-02 16:22:25', 1, 1),
(2, 2, '40195996', 'Monica Nohemi', 'Rosas', 'Sanchez', 'rosasmn', '$2a$07$usesomesillystringforeoRNSqF5ebwOJ.HFIcVhNJ65bww3hpNi', '2021-03-11 15:46:33', 1, 0),
(3, 2, '09966920', 'Javier Octavio', 'Sernaque', 'Quintana', 'jsernaqueq', '$2a$07$usesomesillystringforeAR0AYDLcMUwZJGc02Ta3T98Pn6LH7pi', '2021-03-11 15:48:50', 1, 0),
(4, 3, '42162499', 'Edwin William', 'Guerrero', 'Sandoval', 'wguerreros', '$2a$07$usesomesillystringforeLTVm.b0q8aUqKwOyqhotBMNXub2QEkq', '2021-03-11 15:52:31', 1, 0),
(5, 4, '09401769', 'Segundo Andres', 'Cruzado', 'Cotrina', 'acruzadoc', '$2a$07$usesomesillystringfore9OBdlwIyha0dt84yf389aUSqD287miS', '2021-03-11 16:02:14', 1, 0),
(6, 4, '09965283', 'Ivan Victor', 'Chuquicaña', 'Fernandez', 'vchuquicañaf', '$2a$07$usesomesillystringforetG4v5XsxFT5vjiUpPsTv0VEdAMT4jmW', '2021-03-11 16:02:59', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_z_auditoria_mantenimientos`
--

CREATE TABLE `ws_z_auditoria_mantenimientos` (
  `idAudMant` int(11) NOT NULL,
  `idDoc` int(11) NOT NULL,
  `usExec` int(11) NOT NULL,
  `accExec` text NOT NULL,
  `fecha_audi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_z_auditoria_mantenimientos`
--

INSERT INTO `ws_z_auditoria_mantenimientos` (`idAudMant`, `idDoc`, `usExec`, `accExec`, `fecha_audi`) VALUES
(1, 1, 1, 'Modificación', '2021-04-04'),
(2, 5, 1, 'Modificación', '2021-04-04'),
(3, 5, 1, 'Modificación', '2021-04-04'),
(4, 4, 1, 'Modificación', '2021-04-04'),
(5, 5, 1, 'Modificación', '2021-04-05'),
(6, 6, 1, 'Modificación', '2021-04-05'),
(7, 5, 1, 'Modificación', '2021-04-05'),
(8, 10, 1, 'Anulación', '2021-04-05'),
(9, 10, 1, 'Anulación', '2021-04-05'),
(10, 9, 1, 'Anulación', '2021-04-05'),
(11, 11, 1, 'Modificación', '2021-04-05'),
(12, 6, 1, 'Modificación', '2021-04-05'),
(13, 6, 1, 'Modificación', '2021-04-05'),
(14, 6, 1, 'Modificación', '2021-04-05'),
(15, 8, 1, 'Modificación', '2021-04-06'),
(16, 5, 1, 'Modificación', '2021-04-06'),
(17, 7, 1, 'Modificación', '2021-04-06'),
(18, 2, 1, 'Anulación', '2021-04-25'),
(19, 5, 1, 'Modificación', '2021-04-25'),
(20, 4, 1, 'Modificación', '2021-04-25'),
(21, 3, 1, 'Modificación', '2021-04-25'),
(22, 1, 1, 'Modificación', '2021-04-25'),
(23, 1, 1, 'Modificación', '2021-04-25'),
(24, 1, 1, 'Modificación', '2021-04-25'),
(25, 2, 1, 'Modificación', '2021-04-25'),
(26, 2, 1, 'Modificación', '2021-04-25'),
(27, 2, 1, 'Modificación', '2021-04-25'),
(28, 1, 1, 'Modificación', '2021-04-25'),
(29, 2, 1, 'Modificación', '2021-04-25'),
(30, 2, 1, 'Modificación', '2021-04-25'),
(31, 2, 1, 'Modificación', '2021-04-25'),
(32, 2, 1, 'Modificación', '2021-04-25'),
(33, 2, 1, 'Modificación', '2021-04-25'),
(34, 2, 1, 'Modificación', '2021-04-25'),
(35, 2, 1, 'Modificación', '2021-04-25'),
(36, 2, 1, 'Modificación', '2021-04-25'),
(37, 2, 1, 'Modificación', '2021-04-25'),
(38, 2, 1, 'Modificación', '2021-04-25'),
(39, 1, 1, 'Modificación', '2021-04-25'),
(40, 2, 1, 'Modificación', '2021-04-25'),
(41, 3, 1, 'Modificación', '2021-04-26'),
(42, 4, 1, 'Modificación', '2021-04-26'),
(43, 4, 1, 'Modificación', '2021-04-26'),
(44, 5, 1, 'Modificación', '2021-04-26'),
(45, 1, 1, 'Modificación', '2021-04-26'),
(46, 1, 1, 'Modificación', '2021-04-26'),
(47, 1, 1, 'Modificación', '2021-04-26'),
(48, 1, 1, 'Modificación', '2021-04-26'),
(49, 3, 1, 'Modificación', '2021-04-26'),
(50, 5, 1, 'Modificación', '2021-04-26'),
(51, 5, 1, 'Modificación', '2021-04-26'),
(52, 4, 1, 'Modificación', '2021-04-26'),
(53, 4, 1, 'Modificación', '2021-04-26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ws_acciones`
--
ALTER TABLE `ws_acciones`
  ADD PRIMARY KEY (`idAccion`);

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
-- Indices de la tabla `ws_estadoatencion`
--
ALTER TABLE `ws_estadoatencion`
  ADD PRIMARY KEY (`idEstAte`);

--
-- Indices de la tabla `ws_estadosdoc`
--
ALTER TABLE `ws_estadosdoc`
  ADD PRIMARY KEY (`idEstaDoc`);

--
-- Indices de la tabla `ws_integraciones`
--
ALTER TABLE `ws_integraciones`
  ADD PRIMARY KEY (`idIntegracion`);

--
-- Indices de la tabla `ws_mantenimientos`
--
ALTER TABLE `ws_mantenimientos`
  ADD PRIMARY KEY (`idMantenimiento`);

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
-- Indices de la tabla `ws_z_auditoria_mantenimientos`
--
ALTER TABLE `ws_z_auditoria_mantenimientos`
  ADD PRIMARY KEY (`idAudMant`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ws_acciones`
--
ALTER TABLE `ws_acciones`
  MODIFY `idAccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ws_categorias`
--
ALTER TABLE `ws_categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ws_departamentos`
--
ALTER TABLE `ws_departamentos`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `ws_diagnosticos`
--
ALTER TABLE `ws_diagnosticos`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `ws_equipos`
--
ALTER TABLE `ws_equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `ws_estado`
--
ALTER TABLE `ws_estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_estadoatencion`
--
ALTER TABLE `ws_estadoatencion`
  MODIFY `idEstAte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_estadosdoc`
--
ALTER TABLE `ws_estadosdoc`
  MODIFY `idEstaDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_integraciones`
--
ALTER TABLE `ws_integraciones`
  MODIFY `idIntegracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `ws_mantenimientos`
--
ALTER TABLE `ws_mantenimientos`
  MODIFY `idMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ws_perfiles`
--
ALTER TABLE `ws_perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ws_responsables`
--
ALTER TABLE `ws_responsables`
  MODIFY `idResponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ws_segmento`
--
ALTER TABLE `ws_segmento`
  MODIFY `idSegmento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_servicios`
--
ALTER TABLE `ws_servicios`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ws_situacion`
--
ALTER TABLE `ws_situacion`
  MODIFY `idSituacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_tipotrabajo`
--
ALTER TABLE `ws_tipotrabajo`
  MODIFY `idTipoTrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ws_usuarios`
--
ALTER TABLE `ws_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ws_z_auditoria_mantenimientos`
--
ALTER TABLE `ws_z_auditoria_mantenimientos`
  MODIFY `idAudMant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
