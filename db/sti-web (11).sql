-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-05-2021 a las 17:35:52
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.15

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_ESTADO_REPO` (IN `_idEquipo` INT(11), IN `_observaciones` TEXT, IN `_estadoEQ` INT(11))  UPDATE ws_equipos set observaciones= _observaciones,estadoEQ = _estadoEQ where idEquipo = _idEquipo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_RESPONSABLE` (IN `_dniResp` TEXT, IN `_nombresResp` TEXT, IN `_apellidosResp` TEXT, IN `_idOficina` INT(11), IN `_idServicio` INT(11), IN `_idResponsable` INT(11))  BEGIN
UPDATE ws_responsables SET dni=_dniResp,nombresResp = _nombresResp,apellidosResp = _apellidosResp,idOficina = _idOficina, idServicio = _idServicio where idResponsable = _idResponsable;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ANULAR_INTEGRACION` (IN `_idIntegracion` INT(11))  BEGIN
UPDATE ws_integraciones SET nro_eq = "ANULADO", ip = null,serie_pc = null, serie_monitor = null, serie_teclado = null,serie_EstAcu = null,serie_eqred = null,serie_imp = null, tipo_equipo = 0,responsable = 0, oficina_in = 0,servicio_in = 0, estado = 0, condicion = 0, estadoAnu = 1 WHERE idIntegracion = _idIntegracion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ANULAR_MANTENIMIENTO` (IN `_idMantenimiento` INT(11))  BEGIN
UPDATE ws_mantenimientos SET diagnostico1 = 0, diagnostico2 = 0, diagnostico3 = 0, diagnostico4 = 0, diagnostico5 = 0, diagnostico6 = 0, diagnostico7 = 0, diagnostico8 = 0, accion1 = 0, accion2 = 0, accion3 = 0, accion4 = 0, accion5 = 0, accion6 = 0, accion7 = 0, accion8 = 0, estAnulado = 2 where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ANULAR_REPOSICION` (IN `_idReposicion` INT(11))  BEGIN
UPDATE ws_reposiciones SET diagnostico1 = 0, diagnostico2 = 0, diagnostico3 = 0, diagnostico4 = 0, diagnostico5 = 0, diagnostico6 = 0, diagnostico7 = 0, diagnostico8 = 0, accion1 = 0, accion2 = 0, accion3 = 0, accion4 = 0, accion5 = 0, accion6 = 0, accion7 = 0, accion8 = 0, estAnulado = 2 where idReposicion = _idReposicion;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_MANTENIMIENTO` (IN `_idMantenimiento` INT(11), IN `_tipEquipo` INT(11), IN `_condInicial` INT(11), IN `_idEquip` INT(11), IN `_oficEquip` INT(11), IN `_areaEquip` INT(11), IN `_respoEquip` INT(11), IN `_logdeta` TEXT, IN `_descInc` TEXT, IN `_tecEvalua` INT(11), IN `_diagnostico1` INT(11), IN `_diagnostico2` INT(11), IN `_diagnostico3` INT(11), IN `_diagnostico4` INT(11), IN `_diagnostico5` INT(11), IN `_diagnostico6` INT(11), IN `_diagnostico7` INT(11), IN `_diagnostico8` INT(11), IN `_fEvalua` DATE, IN `_primera_eval` TEXT, IN `_fInicio` DATE, IN `_fFin` DATE, IN `_tipTrabajo` INT(11), IN `_tecResp` INT(11), IN `_accion1` INT(11), IN `_accion2` INT(11), IN `_accion3` INT(11), IN `_accion4` INT(11), IN `_accion5` INT(11), IN `_accion6` INT(11), IN `_accion7` INT(11), IN `_accion8` INT(11), IN `_recomendaciones` TEXT, IN `_estAtencion` INT(11), IN `_condFinal` INT(11), IN `_servTerce` TEXT, IN `_otros` TEXT, IN `_obsOtros` TEXT, IN `_sgmtoManto` INT(11))  BEGIN
UPDATE ws_mantenimientos SET tipEquipo = _tipEquipo, condInicial = _condInicial, idEquip = _idEquip, oficEquip = _oficEquip, areaEquip = _areaEquip, respoEquip = _respoEquip, logdeta = _logdeta, descInc = _descInc, tecEvalua = _tecEvalua, diagnostico1 = _diagnostico1, diagnostico2 = _diagnostico2, diagnostico3 = _diagnostico3, diagnostico4 = _diagnostico4, diagnostico5 = _diagnostico5, diagnostico6 = _diagnostico6, diagnostico7 = _diagnostico7, diagnostico8 = _diagnostico8, fEvalua = _fEvalua, primera_eval = _primera_eval, fInicio = _fInicio, fFin = _fFin, tipTrabajo = _tipTrabajo, tecResp = _tecResp,accion1 = _accion1, accion2 = _accion2, accion3 = _accion3, accion4 = _accion4, accion5 = _accion5, accion6 = _accion6, accion7 = _accion7, accion8 = _accion8, recomendaciones = _recomendaciones, estAtencion = _estAtencion, condFinal = _condFinal, servTerce = _servTerce, otros = _otros, obsOtros = _obsOtros, sgmtoManto = _sgmtoManto where idMantenimiento = _idMantenimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_OFICINA_DPTO` (IN `_id_area` INT(11), IN `_area` TEXT)  BEGIN
UPDATE ws_departamentos SET area = _area WHERE id_area = _id_area;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_REPOSICION` (IN `_idReposicion` INT(11), IN `_tipEquipo` INT(11), IN `_condInicial` INT(11), IN `_idEquip` INT(11), IN `_oficEquip` INT(11), IN `_areaEquip` INT(11), IN `_respoEquip` INT(11), IN `_logdeta` TEXT, IN `_descInc` TEXT, IN `_tecEvalua` INT(11), IN `_diagnostico1` INT(11), IN `_diagnostico2` INT(11), IN `_diagnostico3` INT(11), IN `_diagnostico4` INT(11), IN `_diagnostico5` INT(11), IN `_diagnostico6` INT(11), IN `_diagnostico7` INT(11), IN `_diagnostico8` INT(11), IN `_fEvalua` DATE, IN `_primera_eval` TEXT, IN `_fInicio` DATE, IN `_fFin` DATE, IN `_tipTrabajo` INT(11), IN `_tecResp` INT(11), IN `_accion1` INT(11), IN `_accion2` INT(11), IN `_accion3` INT(11), IN `_accion4` INT(11), IN `_accion5` INT(11), IN `_accion6` INT(11), IN `_accion7` INT(11), IN `_accion8` INT(11), IN `_recomendaciones` TEXT, IN `_estAtencion` INT(11), IN `_condFinal` INT(11), IN `_servTerce` TEXT, IN `_otros` TEXT, IN `_obsOtros` TEXT, IN `_sgmtoManto` INT(11))  BEGIN
UPDATE ws_reposiciones SET tipEquipo = _tipEquipo, condInicial = _condInicial, idEquip = _idEquip, oficEquip = _oficEquip, areaEquip = _areaEquip, respoEquip = _respoEquip, logdeta = _logdeta, descInc = _descInc, tecEvalua = _tecEvalua, diagnostico1 = _diagnostico1, diagnostico2 = _diagnostico2, diagnostico3 = _diagnostico3, diagnostico4 = _diagnostico4, diagnostico5 = _diagnostico5, diagnostico6 = _diagnostico6, diagnostico7 = _diagnostico7, diagnostico8 = _diagnostico8, fEvalua = _fEvalua, primera_eval = _primera_eval, fInicio = _fInicio, fFin = _fFin, tipTrabajo = _tipTrabajo, tecResp = _tecResp,accion1 = _accion1, accion2 = _accion2, accion3 = _accion3, accion4 = _accion4, accion5 = _accion5, accion6 = _accion6, accion7 = _accion7, accion8 = _accion8, recomendaciones = _recomendaciones, estAtencion = _estAtencion, condFinal = _condFinal, servTerce = _servTerce, otros = _otros, obsOtros = _obsOtros, sgmtoManto = _sgmtoManto where idReposicion = _idReposicion;
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
SELECT idMantenimiento,descSegmento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,oficEquip,area,areaEquip,subarea,uResponsable,concat(nombresResp,' ',apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,primera_eval,date_format(fInicio,'%d/%m/%Y') as fInic,date_format(fFin,'%d/%m/%Y') as fFinE,tipTrabajo,tipoTrabajo,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_segmento as eseg on fmant.sgmtoManto = eseg.idSegmento
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
order by correlativo_Mant desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_FICHAS_REPO` ()  BEGIN
SELECT idReposicion,descSegmento,correlativo_Repo,date_format(fRegistroRepo,'%d/%m/%Y') as fRegRepo,tipEquipo,categoria,idEquip,serie,oficEquip,area,areaEquip,subarea,uResponsable,concat(nombresResp,' ',apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,primera_eval,date_format(fInicio,'%d/%m/%Y') as fInic,date_format(fFin,'%d/%m/%Y') as fFinE,tipTrabajo,tipoTrabajo,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_reposiciones as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_segmento as eseg on fmant.sgmtoManto = eseg.idSegmento
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
order by correlativo_Repo desc;
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
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,placa,procesador,vprocesador,ram,discoDuro,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_COMPUS_REPO` (IN `_idReposicion` INT(11))  BEGIN
select idReposicion,correlativo_Repo,date_format(fRegistroRepo,'%d/%m/%Y') as fRegRepo,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,placa,procesador,vprocesador,ram,discoDuro,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_reposiciones as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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
where idReposicion = _idReposicion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_IMPRE_PERI` (IN `_idMantenimiento` INT(11))  BEGIN
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_IMPRE_PERI_REPO` (IN `_idReposicion` INT(11))  BEGIN
select idReposicion,correlativo_Repo,date_format(fRegistroRepo,'%d/%m/%Y') as fRegRepo,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_reposiciones as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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
where idReposicion = _idReposicion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_OTROS` (IN `_idMantenimiento` INT(11))  BEGIN
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_OTROS_REPO` (IN `_idReposicion` INT(11))  BEGIN
select idReposicion,correlativo_Repo,date_format(fRegistroRepo,'%d/%m/%Y') as fRegRepo,tipEquipo,categoria,idEquip,serie,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_reposiciones as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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
where idReposicion = _idReposicion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_REDES` (IN `_idMantenimiento` INT(11))  BEGIN
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,puertos,capa,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_MANTO_REDES_REPO` (IN `_idReposicion` INT(11))  BEGIN
select idReposicion,correlativo_Repo,date_format(fRegistroRepo,'%d/%m/%Y') as fRegRepo,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,puertos,capa,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as finic,date_format(fFin,'%d/%m/%Y') as ffin,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_reposiciones as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
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
where idReposicion = _idReposicion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_OFICINAS` ()  SELECT * FROM ws_departamentos  ORDER BY area asc$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_MANTENIMIENTO` (IN `_fRegistroMant` DATE, IN `_tipEquipo` INT(11), IN `_condInicial` INT(11), IN `_idEquip` INT(11), IN `_oficEquip` INT(11), IN `_areaEquip` INT(11), IN `_respoEquip` INT(11), IN `_logdeta` TEXT, IN `_descInc` TEXT, IN `_diagnostico1` INT(11), IN `_diagnostico2` INT(11), IN `_diagnostico3` INT(11), IN `_diagnostico4` INT(11), IN `_diagnostico5` INT(11), IN `_diagnostico6` INT(11), IN `_diagnostico7` INT(11), IN `_diagnostico8` INT(11), IN `_tecEvalua` INT(11), IN `_fEvalua` DATE, IN `_primera_eval` TEXT, IN `_fInicio` DATE, IN `_fFin` DATE, IN `_tipTrabajo` INT(11), IN `_tecResp` INT(11), IN `_accion1` INT(11), IN `_accion2` INT(11), IN `_accion3` INT(11), IN `_accion4` INT(11), IN `_accion5` INT(11), IN `_accion6` INT(11), IN `_accion7` INT(11), IN `_accion8` INT(11), IN `_recomendaciones` TEXT, IN `_estAtencion` INT(11), IN `_condFinal` INT(11), IN `_servTerce` TEXT, IN `_otros` TEXT, IN `_obsOtros` TEXT, IN `_usRegistra` INT(11), IN `_sgmtoManto` INT(11))  BEGIN
INSERT INTO ws_mantenimientos(fRegistroMant,tipEquipo,condInicial,idEquip,oficEquip,areaEquip,respoEquip,logdeta,descInc,diagnostico1,diagnostico2,diagnostico3,diagnostico4,diagnostico5,diagnostico6,diagnostico7,diagnostico8,tecEvalua,fEvalua,primera_eval,fInicio,fFin,tipTrabajo,tecResp,accion1,accion2,accion3,accion4,accion5,accion6,accion7,accion8,recomendaciones,estAtencion,condFinal,servTerce,otros,obsOtros,usRegistra,sgmtoManto) VALUES(_fRegistroMant,_tipEquipo,_condInicial,_idEquip,_oficEquip,_areaEquip,_respoEquip,_logdeta,_descInc,_diagnostico1,_diagnostico2,_diagnostico3,_diagnostico4,_diagnostico5,_diagnostico6,_diagnostico7,_diagnostico8,_tecEvalua,_fEvalua,_primera_eval,_fInicio,_fFin,_tipTrabajo,_tecResp,_accion1,_accion2,_accion3,_accion4,_accion5,_accion6,_accion7,_accion8,_recomendaciones,_estAtencion,_condFinal,_servTerce,_otros,_obsOtros,_usRegistra,_sgmtoManto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_OFICINA_DPTO` (IN `_area` TEXT)  BEGIN
INSERT INTO ws_departamentos(area) VALUES(_area);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_REPOSICION` (IN `_fRegistroRepo` DATE, IN `_tipEquipo` INT(11), IN `_condInicial` INT(11), IN `_idEquip` INT(11), IN `_oficEquip` INT(11), IN `_areaEquip` INT(11), IN `_respoEquip` INT(11), IN `_logdeta` TEXT, IN `_descInc` TEXT, IN `_diagnostico1` INT(11), IN `_diagnostico2` INT(11), IN `_diagnostico3` INT(11), IN `_diagnostico4` INT(11), IN `_diagnostico5` INT(11), IN `_diagnostico6` INT(11), IN `_diagnostico7` INT(11), IN `_diagnostico8` INT(11), IN `_tecEvalua` INT(11), IN `_fEvalua` DATE, IN `_primera_eval` TEXT, IN `_fInicio` DATE, IN `_fFin` DATE, IN `_tipTrabajo` INT(11), IN `_tecResp` INT(11), IN `_accion1` INT(11), IN `_accion2` INT(11), IN `_accion3` INT(11), IN `_accion4` INT(11), IN `_accion5` INT(11), IN `_accion6` INT(11), IN `_accion7` INT(11), IN `_accion8` INT(11), IN `_recomendaciones` TEXT, IN `_estAtencion` INT(11), IN `_condFinal` INT(11), IN `_servTerce` TEXT, IN `_otros` TEXT, IN `_obsOtros` TEXT, IN `_usRegistra` INT(11), IN `_sgmtoManto` INT(11))  BEGIN
INSERT INTO ws_reposiciones(fRegistroRepo,tipEquipo,condInicial,idEquip,oficEquip,areaEquip,respoEquip,logdeta,descInc,diagnostico1,diagnostico2,diagnostico3,diagnostico4,diagnostico5,diagnostico6,diagnostico7,diagnostico8,tecEvalua,fEvalua,primera_eval,fInicio,fFin,tipTrabajo,tecResp,accion1,accion2,accion3,accion4,accion5,accion6,accion7,accion8,recomendaciones,estAtencion,condFinal,servTerce,otros,obsOtros,usRegistra,sgmtoManto) VALUES(_fRegistroRepo,_tipEquipo,_condInicial,_idEquip,_oficEquip,_areaEquip,_respoEquip,_logdeta,_descInc,_diagnostico1,_diagnostico2,_diagnostico3,_diagnostico4,_diagnostico5,_diagnostico6,_diagnostico7,_diagnostico8,_tecEvalua,_fEvalua,_primera_eval,_fInicio,_fFin,_tipTrabajo,_tecResp,_accion1,_accion2,_accion3,_accion4,_accion5,_accion6,_accion7,_accion8,_recomendaciones,_estAtencion,_condFinal,_servTerce,_otros,_obsOtros,_usRegistra,_sgmtoManto);
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `Z_REG_AUDITORIAREPO` (IN `_idDoc` INT(11), IN `_usExec` INT(11), IN `_accExec` TEXT, IN `_fecha_audi` DATE)  BEGIN
INSERT INTO ws_z_auditoria_reposiciones(idDoc,usExec,accExec,fecha_audi) VALUES(_idDoc,_usExec,_accExec,_fecha_audi);
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
(1, 1, 'Limpieza general'),
(2, 1, 'Revisión técnica');

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
(17, 3, 'Marcador Electrónico'),
(18, 3, 'Mouse');

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
(1, 'ESTADISTICA E INFORMATICA', '2021-05-03 20:09:11'),
(2, 'DIRECCION GENERAL', '2021-05-04 14:34:15'),
(3, 'CONTROL INTERNO', '2021-05-04 14:35:43'),
(4, 'ECONOMIA', '2021-05-04 14:35:58'),
(5, 'LOGISTICA', '2021-05-04 14:36:04'),
(6, 'PERSONAL', '2021-05-04 14:36:13'),
(7, 'PLANEAMIENTO ESTRATEGICO', '2021-05-04 14:36:26'),
(8, 'SERVICIOS GENERALES', '2021-05-04 14:36:35'),
(9, 'ASESORIA JURIDICA', '2021-05-04 14:37:09'),
(10, 'EPIDEMIOLOGIA', '2021-05-04 14:37:18'),
(11, 'GESTION DE CALIDAD', '2021-05-04 14:37:28'),
(12, 'SEGUROS', '2021-05-04 14:37:43'),
(13, 'COMUNICACIONES', '2021-05-04 14:37:51'),
(14, 'DOCENCIA', '2021-05-04 14:39:04'),
(15, 'MEDICINA', '2021-05-04 14:39:12'),
(16, 'CIRUGIA', '2021-05-04 14:39:20'),
(17, 'PEDIATRIA', '2021-05-04 14:39:26'),
(18, 'PSICOLOGIA', '2021-05-04 14:39:34'),
(19, 'FARMACIA', '2021-05-04 14:39:41'),
(20, 'SERVICIO SOCIAL', '2021-05-04 14:39:46'),
(21, 'ENFERMERIA', '2021-05-04 14:39:52'),
(22, 'NUTRICION', '2021-05-04 14:40:04'),
(23, 'DIAGNOSTICO POR IMAGENES', '2021-05-04 14:40:13'),
(24, 'CONSULTA EXTERNA Y HOSPITALIZACION', '2021-05-04 14:40:25'),
(25, 'PATOLOGIA CLINICA Y ANATOMIA PATOLOGICA', '2021-05-04 14:40:49'),
(26, 'GINECO OBSTETRICIA', '2021-05-04 14:41:29'),
(27, 'ODONTOESTOMATOLOGIA', '2021-05-04 14:41:44'),
(28, 'ANESTESIOLOGIA Y CENTRO QUIRURGICO', '2021-05-04 14:41:58'),
(29, 'EMERGENCIA Y CUIDADOS CRITICOS', '2021-05-04 14:42:14'),
(30, 'MEDICINA FISICA Y REHABILITACION', '2021-05-04 14:42:49');

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
(1, 1, 'Fuente malograda');

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
(1, 1, 1, 1, 1, 1, 'MXL4420TS6', '740899500567', 'HP', 'ELITE DESK', 'ESTACION DE TRABAJO', '2014-01-01', '632-2014', '3 AÑOS', 'HP', 'CORE I7', '3.40 GHZ', '8GB', '1TB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-03 15:17:21'),
(2, 1, 1, 2, 20, 3, 'MXL32438YX', '740899500492', 'HP', 'ELITE 8300', 'ESTACION DE TRABAJO', '2013-01-01', '789-2013', '3', 'HP', 'CORE I5', '3.20 GHZ', '4GB', '500GB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-04 09:54:17');

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
  `serie_monitor` int(11) DEFAULT '0',
  `serie_teclado` int(11) DEFAULT '0',
  `serie_EstAcu` int(11) DEFAULT '0',
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
(1, 'FT-2021-00001', 'PC_0744', '', 1, 0, 0, 0, NULL, NULL, '2021-05-04', 1, 1, 1, 1, 1, 1, 0, '2021-05-04 15:11:25'),
(2, 'FT-2021-00002', 'PC_0602', '', 2, 0, 0, 0, NULL, NULL, '2021-05-04', 1, 2, 20, 3, 1, 1, 0, '2021-05-04 15:53:34');

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
  `tecResp` int(11) NOT NULL,
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

INSERT INTO `ws_mantenimientos` (`idMantenimiento`, `correlativo_Mant`, `fRegistroMant`, `tipEquipo`, `condInicial`, `idEquip`, `oficEquip`, `areaEquip`, `respoEquip`, `logdeta`, `descInc`, `diagnostico1`, `diagnostico2`, `diagnostico3`, `diagnostico4`, `diagnostico5`, `diagnostico6`, `diagnostico7`, `diagnostico8`, `tecEvalua`, `fEvalua`, `primera_eval`, `fInicio`, `fFin`, `tipTrabajo`, `tecResp`, `accion1`, `accion2`, `accion3`, `accion4`, `accion5`, `accion6`, `accion7`, `accion8`, `recomendaciones`, `estAtencion`, `condFinal`, `servTerce`, `otros`, `obsOtros`, `usRegistra`, `sgmtoManto`, `estAnulado`, `fecha_creacion`) VALUES
(1, 'FM-2021-00001', '2021-05-04', 1, 2, 2, 20, 3, 2, 'N° Equipo: PC_0602 || Serie N°: MXL32438YX || Cod.Patr: 740899500492 || Marca: HP || Modelo: ELITE 8300 || Descripción: ESTACION DE TRABAJO || IP:  || Procesador: CORE I5-3.20 GHZ || RAM: 4GB || Disco Duro: 500GB', 'No enciende la pc', 1, 0, 0, 0, 0, 0, 0, 0, 4, '2021-04-30', 'Fuente malograda, se requiere cambio de fuente', '2021-05-03', '2021-05-04', 3, 4, 2, 1, 0, 0, 0, 0, 0, 0, 'Se requiere la adquisición de una nueva fuente para su buen funcionamiento.', 1, 2, 'NO', 'NO', '', 4, 1, 1, '2021-05-04 16:53:07');

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
-- Estructura de tabla para la tabla `ws_reposiciones`
--

CREATE TABLE `ws_reposiciones` (
  `idReposicion` int(11) NOT NULL,
  `correlativo_Repo` text COLLATE utf8_spanish_ci NOT NULL,
  `fRegistroRepo` date NOT NULL,
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
  `tecResp` int(11) NOT NULL,
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
-- Disparadores `ws_reposiciones`
--
DELIMITER $$
CREATE TRIGGER `GENERAR_CORRELATIVO_REPOSICION` BEFORE INSERT ON `ws_reposiciones` FOR EACH ROW BEGIN
    DECLARE cont1 int default 0;
    DECLARE anio text;
    set anio = (SELECT YEAR(CURDATE()));
    SET cont1= (SELECT count(*) FROM ws_reposiciones WHERE year(fRegistroRepo) = year(now()));
    IF (cont1 < 1) THEN
    SET NEW.correlativo_Repo = CONCAT('FR-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    ELSE
    SET NEW.correlativo_Repo = CONCAT('FR-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    END IF;
END
$$
DELIMITER ;

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
(1, '42162499', 'Edwin William', 'Guerrero Sandoval', 1, 1),
(2, '08633489', 'Violeta', 'Aguirre Arellano', 20, 3);

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
(1, 1, 'SOPORTE TECNICO', '2021-05-03 20:09:46'),
(2, 1, 'DIGITACION', '2021-05-03 20:11:34'),
(3, 20, 'JEFATURA', '2021-05-04 14:46:01');

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
(1, 1, '77478995', 'Olger Ivan', 'Castro', 'Palacios', 'ocastrop', '$2a$07$usesomesillystringforeVF6hLwtgsUBAmUN4cGEd8tYF74gSHRW', '2020-03-02 16:22:25', 1, 0),
(2, 2, '40195996', 'Monica Nohemi', 'Rosas', 'Sanchez', 'rosasmn', '$2a$07$usesomesillystringforeoRNSqF5ebwOJ.HFIcVhNJ65bww3hpNi', '2021-03-11 15:46:33', 0, 0),
(3, 2, '09966920', 'Javier Octavio', 'Sernaque', 'Quintana', 'jsernaqueq', '$2a$07$usesomesillystringforeAR0AYDLcMUwZJGc02Ta3T98Pn6LH7pi', '2021-03-11 15:48:50', 0, 0),
(4, 3, '42162499', 'Edwin William', 'Guerrero', 'Sandoval', 'wguerreros', '$2a$07$usesomesillystringforeLTVm.b0q8aUqKwOyqhotBMNXub2QEkq', '2021-03-11 15:52:31', 0, 1),
(5, 4, '09401769', 'Segundo Andres', 'Cruzado', 'Cotrina', 'acruzadoc', '$2a$07$usesomesillystringfore9OBdlwIyha0dt84yf389aUSqD287miS', '2021-03-11 16:02:14', 0, 0),
(6, 4, '09965283', 'Ivan Victor', 'Chuquicaña', 'Fernandez', 'vchuquicañaf', '$2a$07$usesomesillystringforetG4v5XsxFT5vjiUpPsTv0VEdAMT4jmW', '2021-03-11 16:02:59', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_z_auditoria_mantenimientos`
--

CREATE TABLE `ws_z_auditoria_mantenimientos` (
  `idAudMant` int(11) NOT NULL,
  `idDoc` int(11) NOT NULL,
  `usExec` int(11) NOT NULL,
  `accExec` text NOT NULL,
  `fecha_audi` date NOT NULL,
  `dateInstant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_z_auditoria_reposiciones`
--

CREATE TABLE `ws_z_auditoria_reposiciones` (
  `idAudRepo` int(11) NOT NULL,
  `idDoc` int(11) NOT NULL,
  `usExec` int(11) NOT NULL,
  `accExec` text NOT NULL,
  `fecha_audi` date NOT NULL,
  `dateInstant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `ws_reposiciones`
--
ALTER TABLE `ws_reposiciones`
  ADD PRIMARY KEY (`idReposicion`);

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
-- Indices de la tabla `ws_z_auditoria_reposiciones`
--
ALTER TABLE `ws_z_auditoria_reposiciones`
  ADD PRIMARY KEY (`idAudRepo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ws_acciones`
--
ALTER TABLE `ws_acciones`
  MODIFY `idAccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_categorias`
--
ALTER TABLE `ws_categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ws_departamentos`
--
ALTER TABLE `ws_departamentos`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ws_diagnosticos`
--
ALTER TABLE `ws_diagnosticos`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ws_equipos`
--
ALTER TABLE `ws_equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `idIntegracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_mantenimientos`
--
ALTER TABLE `ws_mantenimientos`
  MODIFY `idMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ws_perfiles`
--
ALTER TABLE `ws_perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ws_reposiciones`
--
ALTER TABLE `ws_reposiciones`
  MODIFY `idReposicion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ws_responsables`
--
ALTER TABLE `ws_responsables`
  MODIFY `idResponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_segmento`
--
ALTER TABLE `ws_segmento`
  MODIFY `idSegmento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_servicios`
--
ALTER TABLE `ws_servicios`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idAudMant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ws_z_auditoria_reposiciones`
--
ALTER TABLE `ws_z_auditoria_reposiciones`
  MODIFY `idAudRepo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
