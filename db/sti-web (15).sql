-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-05-2021 a las 15:47:39
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTADO_USUARIOS_SISTEMA` ()  SELECT id_usuario,usuario.id_perfil,perfil,dni,nombres,apellido_paterno,apellido_materno,cuenta,clave,date_format(fecha_registro,'%d-%m-%Y') as fecha_registro,estado FROM ws_usuarios as usuario inner join ws_perfiles as perf on usuario.id_perfil = perf.id_perfil$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_ACCIONES` ()  BEGIN
SELECT idAccion,accionrealizada,segment,descSegmento FROM ws_acciones AS a INNER JOIN ws_segmento AS s ON a.segment = s.idSegmento order by accionrealizada asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_ACCI_SEGMENTO` (IN `_idSegmento` INT(11))  BEGIN
select idAccion,accionrealizada,segment from ws_acciones where segment = _idSegmento order by accionrealizada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_AREAS_SERV` ()  SELECT
	id_subarea,
	subarea,
	serv.id_area,
	area,
	date_format( serv.fecha_creacion, '%d-%m-%Y' ) AS fecha_creacion 
FROM
	ws_servicios AS serv
	INNER JOIN ws_departamentos AS dept ON dept.id_area = serv.id_area 
ORDER BY
	subarea ASC$$

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
left join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_imp
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
inner join ws_segmento as eseg on eqp.tipSegmento = eseg.idSegmento
WHERE idEquipo = _idEquipo;
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
left join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_eqred
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
inner join ws_segmento as eseg on eqp.tipSegmento = eseg.idSegmento
WHERE idEquipo = _idEquipo;
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
SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,segmento,serie,sbn,marca,modelo,descripcion,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario where segmento = 3 order by cat.categoria ASC;
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
SELECT idEquipo,serie FROM ws_equipos WHERE idTipo = _idTipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUPOSOTROS` (IN `_idTipo` INT(11))  BEGIN
select idEquipo,serie from ws_equipos where idTipo = _idTipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTAR_EQUPOSREDMANT` (IN `_idTipo` INT(11))  BEGIN
SELECT idEquipo,serie FROM ws_equipos eq 
	WHERE idTipo = _idTipo;
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
left join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_imp
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
left join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_imp
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
left join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_eqred
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
left join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_eqred
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
select idResponsable,dni,UPPER(nombresResp) AS nombresResp,UPPER(apellidosResp) AS apellidosResp,idOficina,area,idServicio,subarea from (ws_responsables as res inner join ws_departamentos as dep on res.idOficina = dep.id_area) inner join ws_servicios as serv on res.idServicio = serv.id_subarea ORDER BY area ASC;
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
  `accionrealizada` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ws_acciones`
--

INSERT INTO `ws_acciones` (`idAccion`, `segment`, `accionrealizada`) VALUES
(1, 1, 'Limpieza general'),
(2, 1, 'Revisión técnica'),
(3, 3, 'Revisión General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_categorias`
--

CREATE TABLE `ws_categorias` (
  `idCategoria` int(11) NOT NULL,
  `segmento` int(11) DEFAULT NULL,
  `categoria` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(14, 3, 'Etiquetera'),
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
  `area` text COLLATE utf8_bin NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(30, 'MEDICINA FISICA Y REHABILITACION', '2021-05-04 14:42:49'),
(31, 'OFICINA EJECUTIVA DE ADMINISTRACION', '2021-05-07 16:01:09'),
(32, 'SIN UBICACION', '2021-05-07 16:22:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_diagnosticos`
--

CREATE TABLE `ws_diagnosticos` (
  `idDiagnostico` int(11) NOT NULL,
  `sgmto` int(11) NOT NULL,
  `diagnostico` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ws_diagnosticos`
--

INSERT INTO `ws_diagnosticos` (`idDiagnostico`, `sgmto`, `diagnostico`) VALUES
(1, 1, 'Fuente malograda'),
(2, 3, 'Equipo malogrado');

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
  `serie` text COLLATE utf8_bin NOT NULL,
  `sbn` text COLLATE utf8_bin NOT NULL,
  `marca` text COLLATE utf8_bin NOT NULL,
  `modelo` text COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `fechaCompra` date NOT NULL,
  `ordenCompra` text COLLATE utf8_bin NOT NULL,
  `garantia` text COLLATE utf8_bin NOT NULL,
  `placa` text COLLATE utf8_bin,
  `procesador` text COLLATE utf8_bin,
  `vprocesador` text COLLATE utf8_bin,
  `ram` text COLLATE utf8_bin,
  `discoDuro` text COLLATE utf8_bin,
  `puertos` text COLLATE utf8_bin,
  `capa` text COLLATE utf8_bin,
  `observaciones` text COLLATE utf8_bin,
  `fichaBaja` text COLLATE utf8_bin,
  `fichaReposición` text COLLATE utf8_bin,
  `condicion` int(11) NOT NULL,
  `estadoEQ` int(11) NOT NULL,
  `registrador` int(11) NOT NULL,
  `registrof` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ws_equipos`
--

INSERT INTO `ws_equipos` (`idEquipo`, `tipSegmento`, `idTipo`, `uResponsable`, `office`, `service`, `serie`, `sbn`, `marca`, `modelo`, `descripcion`, `fechaCompra`, `ordenCompra`, `garantia`, `placa`, `procesador`, `vprocesador`, `ram`, `discoDuro`, `puertos`, `capa`, `observaciones`, `fichaBaja`, `fichaReposición`, `condicion`, `estadoEQ`, `registrador`, `registrof`) VALUES
(1, 1, 1, 1, 1, 1, 'MXL4420TS6', '740899500567', 'HP', 'ELITE DESK', 'ESTACION DE TRABAJO', '2014-01-01', '632-2014', '3 AÑOS', 'HP', 'CORE I7', '3.40 GHZ', '8GB', '1TB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-03 15:17:21'),
(2, 1, 1, 2, 20, 3, 'MXL32438YX', '740899500492', 'HP', 'ELITE 8300', 'ESTACION DE TRABAJO', '2013-01-01', '789-2013', '3 AÑOS', 'HP', 'CORE I5', '3.20 GHZ', '4GB', '500GB', NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-04 09:54:17'),
(3, 3, 10, 32, 1, 4, '911UXMTOA291', '740877000252', 'LG', 'FLATRON - 1943SB', 'MONITOR A COLOR', '2017-01-31', '1747', '3 AÑOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-05-05 15:16:06'),
(4, 3, 3, 30, 28, 6, 'CNF8G5SHZH', '740841000109', 'HP', 'HP LASERJET PRO 400 M401dn', 'IMPRESORA LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(5, 3, 3, 30, 28, 128, 'CNF8G5SH0C', '740841000118', 'HP', 'HP LASERJET PRO 400 M425dn', 'IMPRESORA LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(6, 3, 3, 10, 9, 5, 'BPFSF5WSLS', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(7, 3, 9, 10, 9, 5, '21220126', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 350', 'LASER', '2017-01-01', 'SIN-DATO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(8, 3, 9, 10, 9, 5, 'A789041005886', '742223580068', 'KONICA MINOLTA', 'BIZHUB 367', 'FOTOCOPIADORA', '2017-01-01', '1136-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(9, 3, 3, 10, 9, 5, 'BRFSG7L2NV', '7408410000137', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(10, 3, 3, 10, 9, 5, 'BRFSF5WSLS', '740841000085', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(11, 3, 3, 17, 16, 7, 'BRFSDDCK88', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(12, 3, 3, 17, 16, 7, 'CNF8G5SJ4B', '740841000122', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(13, 3, 3, 17, 16, 7, 'BRFSF6FSVD', '740841000103', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(14, 3, 3, 17, 16, 7, 'BRFSF8XSLJ', '740841000134', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(15, 3, 3, 17, 16, 7, 'E8CY063149', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(16, 3, 3, 17, 16, 7, 'E8CY037873', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(17, 3, 3, 17, 16, 7, 'CNF8G5SJ0P', '740841000112', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(18, 3, 3, 17, 16, 7, 'E8CY024860', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(19, 3, 3, 17, 16, 7, 'BRFSDDCK98', '740841000074', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(20, 3, 3, 9, 13, 9, 'CNF8G5SHTM', '740841000104', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(21, 3, 3, 9, 13, 9, 'U63089B5N992505', '0', 'BROTHER ', 'MFC-8910DW', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(22, 3, 3, 15, 13, 15, 'CNF8G5SHSQ', '742223580028', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(23, 3, 9, 15, 13, 15, '11V4WY4305477', '742223580030', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(24, 3, 3, 15, 13, 15, 'BRFSF5WSM8', '740845500384', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(25, 3, 3, 22, 23, 13, 'CND8F3H8SW', '742223580062', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(26, 3, 3, 22, 23, 13, 'NZCY027108', '742223580061', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(27, 3, 3, 22, 23, 13, 'NZCY027109', '742223580031', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(28, 3, 3, 22, 23, 13, 'BRFSF6FSV0', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(29, 3, 3, 22, 23, 13, 'NZCY027110', '740841000101', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(30, 3, 3, 22, 23, 13, 'NZCY027112', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(31, 3, 3, 22, 23, 13, 'NZCY027111', '740845500339', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(32, 3, 3, 22, 23, 13, 'NZCY035245', '740845500363', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(33, 3, 3, 22, 23, 13, 'NZCY053183', '740845500407', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(34, 3, 3, 22, 23, 13, 'NZVY052583', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(35, 3, 3, 22, 23, 13, 'BRBSKBT8X5', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(36, 3, 3, 22, 23, 13, 'NZCY027113', '740845500341', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(37, 3, 3, 22, 23, 13, 'CND8F3H8SM', '742223580023', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(38, 3, 3, 3, 2, 10, 'BRFSF5QSN6', '740841000086', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(39, 3, 3, 3, 2, 10, 'BRFSF8XSLG', '740841000124', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(40, 3, 3, 3, 2, 10, 'CND8F3H5MM', '742223580014', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(41, 3, 9, 3, 2, 10, 'A789041006594', '0', 'KONICA MINOLTA', 'BIZHUB 367', 'FOTOCOPIADORA', '2017-01-01', '1136-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(42, 3, 9, 3, 2, 10, 'A1UE041105437', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2014-01-01', '352-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(43, 3, 3, 13, 14, 16, 'Z3J154200043', '0', 'ZEBRA', 'ZEBRA ZXP SERIES 3', 'LASER', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(44, 3, 9, 13, 14, 16, 'A1UE041011518', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(45, 3, 3, 13, 14, 16, 'CND8F3H5BR', '742223580013', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(46, 3, 3, 7, 4, 17, 'NZCY035238', '740845500362', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(47, 3, 3, 7, 4, 17, 'NZCY027126', '740845500354', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(48, 3, 3, 7, 4, 17, 'BRFSF5QSN3', '740841000083', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(49, 3, 3, 7, 4, 17, 'CNF8G5SHSH', '740841000105', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(50, 3, 3, 7, 4, 17, 'NZCY024845', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(51, 3, 3, 7, 4, 17, 'NZCY035260', '740845500367', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(52, 3, 3, 7, 4, 17, 'NZCY027117', '740845500345', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(53, 3, 3, 7, 4, 17, 'NZCY024852', '740845500227', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(54, 3, 3, 7, 4, 17, 'BRFSF5QSNB', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(55, 3, 3, 7, 4, 17, 'BRFSF8XSLT', '740841000125', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(56, 3, 3, 7, 4, 17, 'BRBFC7NR35', '740841000059', 'HP', 'HP LASERJET P2055dn', 'LASER', '2014-01-01', '732-2011', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(57, 3, 9, 7, 4, 17, 'A1UE041011271', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2013-01-01', '658-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(58, 3, 3, 7, 4, 17, 'NZCY024849', '740845500224', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(59, 3, 9, 7, 4, 17, 'A789041006527', '0', 'KONICA MINOLTA', 'BIZHUB 367', 'FOTOCOPIADORA', '2017-01-01', '1136-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(60, 3, 3, 7, 4, 17, 'NZCY05362', '740845500390', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(61, 3, 3, 7, 4, 17, 'NZCY053489', '740845500389', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(62, 3, 3, 7, 4, 17, 'NZCY053479', '740845500391', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(63, 3, 3, 7, 4, 17, 'NZCY053277', '740845500392', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(64, 3, 14, 7, 4, 17, 'MXKF806934', '0', 'EPSON', 'TM-T88V', 'ETIQUETERA', '2017-01-01', '927-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(65, 3, 14, 7, 4, 17, 'MXK806950', '0', 'EPSON', 'TM-T88V', 'ETIQUETERA', '2017-01-01', '927-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(66, 3, 14, 7, 4, 17, 'MXK806953', '0', 'EPSON', 'TM-T88V', 'ETIQUETERA', '2017-01-01', '927-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(67, 3, 14, 7, 4, 17, 'MXK806956', '0', 'EPSON', 'TM-T88V', 'ETIQUETERA', '2017-01-01', '927-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(68, 3, 14, 7, 4, 17, 'FFCF295254', '740840430026', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(69, 3, 14, 7, 4, 17, 'FFCF295261', '740840430027', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(70, 3, 14, 7, 4, 17, 'FFBF210590', '740840430001', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2012-01-01', '1652-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(71, 3, 14, 7, 4, 17, 'FFCF279240', '740840430009', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', '038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(72, 3, 14, 7, 4, 17, 'FFCF280873', '740840430012', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2014-01-01', '038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(73, 3, 14, 7, 4, 17, 'FFCF291024', '740840430030', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '927-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(74, 3, 3, 7, 4, 17, 'NZCY027120', '740845500348', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 12:01:16'),
(75, 3, 3, 7, 4, 17, 'BRBSKBT8XY', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(76, 3, 3, 7, 4, 17, 'BRBSKBT8X9', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(77, 3, 3, 7, 4, 17, 'BRBSKBT8WP', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(78, 3, 3, 7, 4, 17, 'NZCY035259', '740845500366', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(79, 3, 3, 7, 4, 17, 'NZCY035262', '740845500368', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(80, 3, 3, 7, 4, 17, 'NZCY027125', '740845500353', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(81, 3, 3, 16, 29, 18, 'NZCY024841', '740845500216', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 2, 2, 4, '2021-05-06 12:01:16'),
(82, 3, 3, 16, 29, 18, 'BRFSF6FSV6', '740841000091', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(83, 3, 3, 16, 29, 18, 'NZCY027121', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(84, 3, 3, 16, 29, 18, 'BRFSG7L2MX', '740841000136', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 2, 2, 4, '2021-05-06 12:01:16'),
(85, 3, 3, 16, 29, 18, 'CNF8G5SJ23', '740841000107', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(86, 3, 9, 16, 29, 18, 'A1UE041010330', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(87, 3, 3, 16, 29, 18, 'U62508K0F395405', '0', 'BROTHER ', 'LC1100', 'MULTIFUNCIONAL', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(88, 3, 3, 16, 29, 18, 'CNF8G5SJ38', '740841000106', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(89, 3, 3, 16, 29, 18, 'BRFSF6FSVG', '740841000090', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(90, 3, 3, 16, 29, 18, 'NZCY035405', '740845500370', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(91, 3, 3, 16, 29, 18, 'NZCY024861', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(92, 3, 3, 16, 29, 18, 'BRFSG7L2P0', '740841000138', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(93, 3, 3, 16, 29, 18, 'NZCY035404', '740845500369', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 12:01:16'),
(94, 3, 3, 23, 21, 8, 'BRFSDDBKTM', '740841000068', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(95, 3, 3, 23, 21, 8, 'CNC9120233', '0', 'HP ', 'HP LASER JET P2055dn', 'LASER', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(96, 3, 3, 23, 21, 8, 'BRBSD81QG2', '740841000062', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1282-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(97, 3, 3, 23, 21, 8, 'CNF8G5SJ2P', '740841000120', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(98, 3, 3, 21, 10, 14, 'BRBSKBT8XL', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(99, 3, 3, 32, 1, 4, 'NZCY024836', '740845500211', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(100, 3, 3, 32, 1, 4, 'CNCKB06060', '0', 'HP ', 'HP LASER JET P2055dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(101, 3, 3, 32, 1, 4, 'CNF8G5SJ1H', '0', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(102, 3, 3, 32, 1, 4, 'CNF8G5SHYY', '740841000108', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(103, 3, 3, 32, 1, 4, 'U63089B5N992506', '0', 'BROTHER ', 'MFC-8910DW', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(104, 3, 3, 32, 1, 4, '44B04222978', '0', 'EPSON', 'LX-810', 'MATRICIAL', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(105, 3, 3, 32, 1, 4, 'NA6Y036685', '0', 'EPSON', 'STYLUS TX 430', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(106, 3, 3, 32, 1, 4, 'BRBSKBT8X2', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(107, 3, 3, 32, 1, 4, 'BRBSKBT8X1', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(108, 3, 14, 32, 1, 4, 'FFCF260094', '740840430006', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2013-01-01', '175-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(109, 3, 3, 32, 1, 4, 'CND8F3H8TQ', '742223580025', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(110, 3, 3, 32, 1, 4, 'BRFSF6FSV8', '740841000093', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(111, 3, 3, 32, 1, 4, 'NZCY035085', '740845500360', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(112, 3, 3, 32, 1, 4, 'NZCY027090', '740845500329', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(113, 3, 3, 32, 1, 4, 'BRBSKBT8XZ', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(114, 3, 3, 32, 1, 4, 'BRBSKBT8WX', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(115, 3, 3, 25, 19, 19, 'BRFSF6FSV9', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(116, 3, 3, 25, 19, 19, 'NZCY024840', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(117, 3, 3, 25, 19, 19, 'NZCY035412', '740845500374', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(118, 3, 3, 25, 19, 19, 'NZCY035408', '740845500371', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(119, 3, 3, 25, 19, 19, 'CNF8G5SJ02', '740841000110', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(120, 3, 3, 25, 19, 19, 'NZCY024844', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(121, 3, 3, 25, 19, 19, 'NZCY027119', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(122, 3, 3, 25, 19, 19, 'NZCY024858', '0', 'EPSON', 'FX-890', 'MATRICIAL ', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(123, 3, 3, 25, 19, 19, 'NZCY053436', '740845500400', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(124, 3, 3, 25, 19, 19, 'NZCY052591', '740845500395', 'EPSON', 'FX-890', 'MATRICIAL ', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(125, 3, 3, 25, 19, 19, 'NZCY052598', '740845500394', 'EPSON', 'FX-890', 'MATRICIAL ', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(126, 3, 3, 25, 19, 19, 'NZCY053423', '740845500399', 'EPSON', 'FX-890', 'MATRICIAL ', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(127, 3, 3, 25, 19, 19, 'NZCY052593', '740845500393', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(128, 3, 3, 25, 19, 19, 'NZCY052601', '740845500396', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(129, 3, 3, 25, 19, 19, 'NZCY053428', '740845500397', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(130, 3, 3, 25, 19, 19, 'NZCY053421', '740845500398', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(131, 3, 3, 25, 19, 19, 'NZCY053427', '740845500401', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(132, 3, 3, 25, 19, 19, 'BRBSKBT8WZ', '742223580050', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(133, 3, 3, 25, 19, 19, 'BRBSKBT8XV', '742223580049', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(134, 3, 3, 25, 19, 19, 'BRBSKBT8XW', '742223580051', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(135, 3, 3, 25, 19, 19, 'BRBSKBT8WS', '742223580048', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(136, 3, 3, 25, 19, 19, 'NZCY035410', '740845500372', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(137, 3, 3, 25, 19, 19, 'NZCY024851', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(138, 3, 3, 25, 19, 19, 'NZCY024850', '740845500225', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(139, 3, 3, 12, 11, 20, 'A1V4WY4103486', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(140, 3, 3, 12, 11, 20, 'NZCY035415', '740845500375', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(141, 3, 3, 19, 26, 21, 'BRFSG7L2NL', '740841000126', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(142, 3, 3, 19, 26, 21, 'BRFSDDCKb2', '740841000075', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(143, 3, 3, 19, 26, 21, 'BRFSG7L2NS', '740841000127', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(144, 3, 3, 19, 26, 21, 'CND8F3H8W8', '742223580020', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(145, 3, 3, 19, 26, 21, 'NZCY035418', '740845500376', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(146, 3, 3, 19, 26, 21, 'BRBFC7NR6F', '0', 'HP ', 'HP LASER JET P2055dn', 'LASER', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(147, 3, 3, 19, 26, 21, 'BRBSD81QGK', '740841000066', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1282-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(148, 3, 3, 19, 26, 21, 'SD60B0731', '0', 'HP ', 'HP PHOTOSMART C5280', 'TINTA', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(149, 3, 3, 19, 26, 21, 'BRBSKBT8Y1', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(150, 3, 3, 19, 26, 21, 'BRBSKBT8XB', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(151, 3, 3, 19, 26, 21, 'NZCY027122', '740845500350', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(152, 3, 3, 6, 5, 22, 'CND8F3H90N', '742223580018', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(153, 3, 3, 6, 5, 22, 'BRFSF5WSM7', '740841000079', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(154, 3, 9, 6, 5, 22, 'A1UE041108429', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'LASER', '2014-01-01', '661-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(155, 3, 3, 6, 5, 22, 'NZCY035427', '740845500383', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(156, 3, 3, 6, 5, 22, 'BRFSF6FSTT', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(157, 3, 3, 6, 5, 22, 'CND8F3H5F8', '742223580015', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(158, 3, 9, 6, 5, 22, 'A789041006578', '0', 'KONICA MINOLTA', 'BIZHUB 367', 'FOTOCOPIADORA', '2017-01-01', '1136-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(159, 3, 3, 6, 5, 22, 'BRBSKBT8X7', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(160, 3, 3, 6, 5, 22, 'BRBSKBT8XF', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(161, 3, 3, 6, 5, 22, 'NZCY027141', '740845500357', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(162, 3, 3, 6, 5, 22, 'NZCY028241', '740845500358', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(163, 3, 3, 6, 5, 22, 'NZCY027127', '740845500355', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(164, 3, 3, 6, 5, 22, 'BRFSF5QSN0', '740841000078', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(165, 3, 3, 6, 5, 22, 'NZCY027135', '740845500356', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(166, 3, 9, 6, 5, 22, 'A1UE041105437', '740832000040', 'KONICA MINOLTA', 'BIZHUB 363', 'FOTOCOPIADORA', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(167, 3, 3, 6, 5, 22, 'U63089B5N992506', '742223580075', 'BROTHER ', 'BR-15', 'EQUPO MULTIFUNCIONAL', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(168, 3, 3, 18, 15, 23, 'NZCY035411', '740845500373', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(169, 3, 3, 18, 15, 23, 'BRBSD81QG6', '740841000065', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2012-01-01', '1282-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(170, 3, 3, 18, 15, 23, 'E8CY020269', '740845500147', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', 'NEA 999 -2005', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(171, 3, 3, 18, 15, 23, 'CNC6DCTH6M', '0', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(172, 3, 3, 18, 15, 23, 'BRFSDDCK9L', '740841000072', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(173, 3, 3, 18, 15, 23, 'CNF8H5TBCD', '740841000140', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2015-01-01', '914-2015', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(174, 3, 3, 18, 15, 23, 'NZCY027116', '740845500344', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(175, 3, 3, 24, 22, 25, 'BRFSF8XSLF', '740841000132', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(176, 3, 3, 24, 22, 25, '740845500382', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(177, 3, 3, 24, 22, 25, 'NZCY035425', '740845500382', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(178, 3, 3, 24, 22, 25, 'BRBSKBT8WN', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(179, 3, 9, 15, 13, 15, 'A1UE041105678', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2014-01-01', '352-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(180, 3, 3, 28, 27, 26, 'BRFSDDCK9V', '740841000071', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(181, 3, 3, 20, 17, 28, 'BRF5DDCK95', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '0', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(182, 3, 3, 20, 17, 28, 'CNF8G5SJ2G', '740841000121', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(183, 3, 3, 20, 17, 28, 'BRFSF6FSVL', '740841000096', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(184, 3, 3, 20, 17, 28, 'BRFSDDCK9S', '740841000076', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(185, 3, 3, 5, 6, 29, 'CND8F3H5ZB', '742223580016', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(186, 3, 3, 5, 6, 29, 'CNCKB11914', '0', 'HP ', 'HP LASER JET P2055dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(187, 3, 3, 5, 6, 29, 'BRFSF8WST7', '740841000128', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(188, 3, 3, 5, 6, 29, 'BRFSG7L2NT', '740841000129', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(189, 3, 3, 5, 6, 29, 'GKK0021705', '0', 'EPSON', 'DFX-9000', 'MATRICIAL', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(190, 3, 3, 5, 6, 29, 'BRFSFSWSM6', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(191, 3, 3, 5, 6, 29, 'A1UE041108703', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(192, 3, 3, 5, 6, 29, 'BRBFC7NRGB', '0', 'HP ', 'HP LASER JET P2055dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(193, 3, 3, 5, 6, 29, 'GKK0026254', '0', 'EPSON', 'DFX-9000', 'MATRICIAL', '2017-01-01', '927-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(194, 3, 3, 5, 6, 29, 'BRBSKBT8Y6', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(195, 3, 3, 5, 6, 29, 'BRBSKBT8X4', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(196, 3, 3, 5, 6, 29, 'GKK0023119', '740845500208', 'EPSON', 'DFX-9000', 'MATRICIAL', '2014-01-01', '846-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(197, 3, 3, 5, 6, 29, 'BRFSF5WSLX', '740841000080', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(198, 3, 3, 5, 6, 29, 'BRFSF5WSW6', '740841000081', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(199, 3, 3, 5, 6, 29, 'GKK0021706', '0', 'EPSON', 'DFX-9000', 'IMPRESORA MATRIZ DE PUNTO', '2013-01-01', '987-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(200, 3, 3, 5, 6, 29, 'GKK0021894', '0', 'EPSON', 'DFX-9000', 'IMPRESORA MATRIZ DE PUNTO', '2013-01-01', '987-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(201, 3, 3, 8, 7, 30, 'A1UE041108364', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'LASER', '2014-01-01', '661-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(202, 3, 3, 8, 7, 30, 'CND8F3H8Y6', '742223580017', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(203, 3, 3, 8, 7, 30, 'CND8F3H937', '0', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(204, 3, 3, 26, 18, 31, 'CND8F348WW', '0', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(205, 3, 3, 26, 18, 31, 'NZCY027114', '740845500342', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(206, 3, 3, 26, 18, 31, 'BRFSDDCK9H', '740841000069', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(207, 3, 3, 26, 18, 31, 'NZCY027115', '740845500343', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(208, 3, 3, 14, 12, 32, 'NZCY027096', '740845500331', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(209, 3, 3, 14, 12, 32, 'NZCY024837', '740845500212', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(210, 3, 3, 14, 12, 32, 'NZCY035109', '740845500361', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(211, 3, 3, 14, 12, 32, 'CND8F473Y1', '742223580012', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 3, 4, '2021-05-06 14:28:24'),
(212, 3, 14, 14, 12, 32, 'FFCF279230', '740840430015', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(213, 3, 14, 14, 12, 32, 'FFCF294787', '740840430024', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(214, 3, 14, 14, 12, 32, 'FFCF295212', '740840430025', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(215, 3, 14, 14, 12, 32, 'FFCF295225', '740840430021', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(216, 3, 3, 14, 12, 32, 'BRFSF5QSMY', '740841000087', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(217, 3, 9, 14, 12, 32, 'A1UE041105290', '742223580027', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2014-01-01', '346-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(218, 3, 3, 14, 12, 32, 'CN8FG7KBOG', '742223580028', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '662-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24');
INSERT INTO `ws_equipos` (`idEquipo`, `tipSegmento`, `idTipo`, `uResponsable`, `office`, `service`, `serie`, `sbn`, `marca`, `modelo`, `descripcion`, `fechaCompra`, `ordenCompra`, `garantia`, `placa`, `procesador`, `vprocesador`, `ram`, `discoDuro`, `puertos`, `capa`, `observaciones`, `fichaBaja`, `fichaReposición`, `condicion`, `estadoEQ`, `registrador`, `registrof`) VALUES
(219, 3, 3, 14, 12, 32, 'CNF8G7KBOP', '742223580030', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '662-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(220, 3, 3, 14, 12, 32, 'NZCY035428', '740845500384', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(221, 3, 9, 14, 12, 32, 'A789041005902', '742223580071', 'KONICA MINOLTA', 'BIZHUB 367', 'FOTOCOPIADORA', '2017-01-01', '1136-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(222, 3, 3, 14, 12, 32, 'BRBSKBT8XR', '742223580059', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(223, 3, 3, 14, 12, 32, 'BRBSKBT8XH', '742223580064', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(224, 3, 3, 14, 12, 32, 'BRBSKBT8WM', '742223580062', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(225, 3, 3, 14, 12, 32, 'BRBSKBT8XJ', '742223580061', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(226, 3, 3, 14, 12, 32, 'CNF8G7K92Y', '742223580031', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '662-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(227, 3, 3, 14, 12, 32, 'NZCY027106', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(228, 3, 3, 14, 12, 32, 'BRFSF6FSV4', '740841000101', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(229, 3, 3, 2, 20, 3, 'CND8F3H8FK', '742223580026', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(230, 3, 3, 2, 20, 3, 'BRFSF5QSMQ', '740841000084', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(231, 3, 3, 2, 20, 3, 'BRFSG7F5QSMQ', '0', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(232, 3, 3, 11, 8, 33, 'E8CY017290', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(233, 3, 3, 11, 8, 33, 'CNF8G5SLGX', '740841000115', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(234, 3, 3, 11, 8, 33, 'CNRCB56407', '0', 'HP ', 'HP LASERJET M3035MFP', 'LASER', '2011-01-01', '752-2011', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(235, 3, 3, 11, 8, 33, 'CNF8G5SHYP', '0', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(236, 3, 3, 11, 8, 33, 'BRB5644GDH', '0', 'HP', 'Q5912A', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(237, 3, 3, 11, 8, 33, 'BRFSF6FSV7', '740841000098', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(238, 3, 3, 11, 8, 33, 'CNF8G5SHVJ', '740841000116', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(239, 3, 3, 11, 8, 33, 'NZCY006082', '740845500203', 'EPSON', 'FX-890', 'MATRICIAL', '2011-01-01', 'NEA 178 -2011', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(240, 3, 3, 11, 8, 33, 'F8FE042265', '0', 'EPSON', 'ESTYLUS CX3500', 'TINTA', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-06 14:28:24'),
(241, 3, 3, 11, 8, 33, 'BRBSD81GGD', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(242, 3, 3, 11, 8, 33, 'BRBSKBT8WY', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(243, 3, 3, 11, 8, 33, 'BRFSF5QSMW', '740841000088', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(244, 3, 3, 11, 8, 33, 'BRBSD81QGD', '740841000061', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1282-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-06 14:28:24'),
(245, 3, 12, 3, 2, 10, '1011010450244', '462200500054', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA  EQUIPO DE UPS', '2012-05-30', 'SN', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-05-06 14:41:06'),
(246, 3, 3, 30, 28, 38, 'BRFSF6FSVC', '740841000102', 'HP ', 'HP LASERJET PRO 400 M401DN', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-05-06 14:45:59'),
(247, 3, 3, 33, 31, 129, 'BRFSF6FSVM', '740841000095', 'HP ', 'HP LASERJET PRO 400 M401DN', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-05-07 11:05:41'),
(248, 3, 3, 33, 31, 129, 'NZCY024842', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 2, 1, 1, '2021-05-07 11:06:37'),
(249, 3, 3, 27, 24, 12, 'CNF8G5SHZ3', '740841000111', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 3, 4, '2021-05-07 11:16:59'),
(250, 3, 3, 27, 24, 12, 'NZCY024855', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 3, 4, '2021-05-07 11:16:59'),
(251, 3, 3, 27, 24, 12, 'BR5DDCK9Z', '740841000073', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', 'NEA-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 3, 4, '2021-05-07 11:16:59'),
(252, 3, 14, 27, 24, 12, 'FFCF260054', '740840430005', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2013-01-01', '175-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 3, 4, '2021-05-07 11:16:59'),
(253, 3, 14, 27, 24, 12, 'FFBF210589', '740840430004', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2012-01-01', '1652-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 3, 4, '2021-05-07 11:16:59'),
(254, 3, 14, 27, 24, 12, 'FFCF210567', '0', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(255, 3, 9, 27, 24, 12, 'A1UEO41108024', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(256, 3, 15, 27, 24, 12, 'SG359015VK', '0', 'HP ', 'HP 8500 FN1', 'ESCANER', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(257, 3, 3, 27, 24, 12, 'NZCY024834', '740845500209', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(258, 3, 3, 27, 24, 12, 'NZCY024839', '740845500214', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(259, 3, 3, 27, 24, 12, 'CNCKB06064', '0', 'HP ', 'HP LASER JET P2055dn', 'LASER', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(260, 3, 14, 27, 24, 12, 'FFCF280607', '740840430019', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(261, 3, 14, 27, 24, 12, 'FFCF279220', '740840430013', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', '2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(262, 3, 3, 27, 24, 12, 'BRFSF8XSLN', '740841000133', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(263, 3, 3, 27, 24, 12, 'BRF5G7L2NP', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(264, 3, 3, 27, 24, 12, 'BRBSD81QGF', '740841000063', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1282-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(265, 3, 3, 27, 24, 12, 'NZCY053438', '740845500402', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(266, 3, 3, 27, 24, 12, 'NZCY053206', '740845500403', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(267, 3, 3, 27, 24, 12, 'BRBSKBT8XQ', '742223580036', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(268, 3, 3, 27, 24, 12, 'BRBSKBT8XN', '742223580037', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(269, 3, 3, 27, 24, 12, 'BRBSKBT8WH', '742223580039', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(270, 3, 3, 27, 24, 12, 'BRBSKBT8WW', '742223580038', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(271, 3, 14, 27, 24, 12, 'FFCF293587', '740840430028', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(272, 3, 14, 27, 24, 12, 'FFCF295229', '740840430022', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(273, 3, 14, 27, 24, 12, 'FFCF295264', '740840430023', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2017-01-01', '926-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(274, 3, 3, 27, 24, 12, 'A1UE041108024', '742223580034', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'LASER', '2014-01-01', '661-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(275, 3, 3, 27, 24, 12, 'NZCY035253', '740845500364', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(276, 3, 14, 27, 24, 12, 'FFCF260235', '740840430007', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2013-01-01', '175-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(277, 3, 14, 27, 24, 12, 'FFCF250319', '740840430008', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2014-01-01', '175-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(278, 3, 3, 27, 24, 12, 'BRFSF6FSVJ', '0', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(279, 3, 3, 27, 24, 12, 'NZCY024835', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(280, 3, 3, 27, 24, 12, 'NZCY027104', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(281, 3, 3, 27, 24, 12, 'NZCY027118', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(282, 3, 14, 27, 24, 12, 'FFBF210587', '740840430003', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2012-01-01', '1652-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(283, 3, 3, 27, 24, 12, 'BRBSD81QGG', '740841000064', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2012-01-01', '1282-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(284, 3, 3, 27, 24, 12, 'BRFSDDCK97', '740841000070', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(285, 3, 14, 27, 24, 12, 'FFCF278674', '740840430011', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(286, 3, 14, 27, 24, 12, 'FFCF278671', '740840430017', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(287, 3, 14, 27, 24, 12, 'FFCF280563', '740840430018', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(288, 3, 14, 27, 24, 12, 'FFCF288594', '0', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(289, 3, 14, 27, 24, 12, 'FFCF279124', '740840430010', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(290, 3, 14, 27, 24, 12, 'FFCF280645', '740840430016', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(291, 3, 14, 27, 24, 12, 'FFCF280639', '740840430020', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(292, 3, 3, 27, 24, 12, 'BRFSG7L2NW', '740841000123', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(293, 3, 3, 27, 24, 12, 'NZCY019050', '740845500208', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(294, 3, 14, 27, 24, 12, 'FFBF210586', '740840430002', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2012-01-01', '1652-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(295, 3, 3, 27, 24, 12, 'CND8F3H8V8', '742223580021', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(296, 3, 3, 31, 25, 27, 'NZCY053176', '740845500404', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(297, 3, 3, 31, 25, 27, 'NZCY035423', '740845500380', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(298, 3, 3, 31, 25, 27, 'NZCY035424', '740845500381', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(299, 3, 3, 31, 25, 27, 'NZCY024856', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-07 11:16:59'),
(300, 3, 3, 31, 25, 27, 'CNF8G5SJI7', '740841000119', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '252-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(301, 3, 3, 31, 25, 27, 'BRFSG7L2P2', '740841000135', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(302, 3, 3, 31, 25, 27, 'NZCY035257', '740845500365', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-07 11:16:59'),
(303, 3, 3, 31, 25, 27, 'CND8F3H8YZ', '742223580022', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(304, 3, 3, 31, 25, 27, 'BRBSD5WM8J', '0', 'HP ', 'HP LASER JET P1102W', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(305, 3, 3, 31, 25, 27, 'BRBFC5LR0C', '0', 'HP ', 'HP LASER JET P2055dn', 'LASER', '2013-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(306, 3, 3, 31, 25, 27, 'NZCY024857', '740845500232', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-07 11:16:59'),
(307, 3, 3, 31, 25, 27, 'NZCY053173', '740845500405', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(308, 3, 3, 31, 25, 27, 'NZCY053433', '740845500406', 'EPSON', 'FX-890', 'MATRICIAL', '2018-01-01', '1133-2018', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(309, 3, 3, 31, 25, 27, 'BRBSKBT8W8', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(310, 3, 3, 31, 25, 27, 'NZCY035419', '740845500377', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(311, 3, 3, 31, 25, 27, 'NZCY035421', '740845500378', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(312, 3, 3, 31, 25, 27, 'NZCY035422', '740845500379', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(313, 3, 3, 29, 30, 24, 'BRFSF6FSVF', '740841000099', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '791-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(314, 3, 14, 29, 30, 24, 'FFCF278639', '740840430014', 'EPSON', 'TM-U220A', 'ETIQUETERA', '2016-01-01', 'NEA 038 -2016', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(315, 3, 14, 18, 15, 94, 'BRBSKBT8WV', '0', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(316, 3, 14, 18, 15, 96, 'BRFSDDCK9W', '740841000067', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2012-01-01', '1853-2012', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(317, 3, 3, 14, 12, 32, 'NZCY024843', '740845500218', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-07 11:16:59'),
(318, 3, 3, 14, 12, 32, 'CNF867KB13', '0', 'HP ', 'HP LASERJET PRO 400 M425dn', 'LASER', '2014-01-01', '662-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(319, 3, 3, 14, 12, 32, 'NZCY035678', '740845500386', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(320, 3, 3, 14, 12, 32, 'BRFSG7L2NY', '740841000131', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2014-01-01', '286-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(321, 3, 3, 14, 12, 32, 'BRFSF5QSN1', '740841000089', 'HP ', 'HP LASERJET PRO 400 M401dn', 'LASER', '2013-01-01', '657-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(322, 3, 3, 14, 12, 32, 'NZCY024860', '740845500235', 'EPSON', 'FX-890', 'MATRICIAL', '2012-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(323, 3, 3, 14, 12, 32, 'BRBSKBT8XT', '742223580059', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(324, 3, 3, 14, 12, 32, 'BRBSKBT8Y3', '742223580061', 'HP ', 'LASERJET PRO M426FDW', 'LASER', '2017-01-01', '925-2017', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(325, 3, 3, 14, 12, 32, 'NZCY035431', '740845500385', 'EPSON', 'FX-890', 'MATRICIAL', '2014-01-01', '290-2014', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(326, 3, 3, 14, 12, 32, 'NZCY027103', '740845500332', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:16:59'),
(327, 3, 3, 34, 32, 130, 'NZCY024838', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(328, 3, 3, 34, 32, 130, 'NZCY024846', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(329, 3, 3, 34, 32, 130, 'NZCY024847', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(330, 3, 3, 34, 32, 130, 'NZCY024848', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 2, 2, 4, '2021-05-07 11:33:18'),
(331, 3, 3, 34, 32, 130, 'NZCY024853', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(332, 3, 3, 34, 32, 130, 'NZCY024854', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 2, 2, 4, '2021-05-07 11:33:18'),
(333, 3, 3, 34, 32, 130, 'NZCY026382', '740845500328', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(334, 3, 3, 34, 32, 130, 'NZCY027092', '740845500330', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(335, 3, 3, 34, 32, 130, 'NZCY027107', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(336, 3, 3, 34, 32, 130, 'NZCY028243', '0', 'EPSON', 'FX-890', 'MATRICIAL', '2013-01-01', '790-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(337, 3, 9, 34, 32, 130, 'A1UE041011173', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2013-01-01', '658-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 2, 2, 4, '2021-05-07 11:33:18'),
(338, 3, 9, 34, 32, 130, 'A1UE041011159', '0', 'KONICA MINOLTA', 'MINOLTA BIZ HUB 363', 'FOTOCOPIADORA', '2013-01-01', '658-2013', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-07 11:33:18'),
(339, 3, 10, 3, 2, 10, '911QXMTOA345', '740877000223', 'LG', 'W19435B', 'MONITOR A COLOR', '2012-01-31', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-05-09 23:37:39'),
(340, 3, 10, 30, 28, 6, '911UXVWOA351', '740877000258', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-09 23:51:44'),
(341, 3, 10, 30, 28, 6, '6CM3101X2R', '740880370083', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(342, 3, 10, 30, 28, 6, '6CM3101X2D', '740880370084', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(343, 3, 10, 30, 28, 6, 'ZZ8EH4LF709507', '740880370215', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(344, 3, 10, 10, 9, 5, '6CM2480JRZ', '740880370020', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(345, 3, 10, 10, 9, 5, '6CM2480KCX', '740880370021', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(346, 3, 10, 10, 9, 5, 'ZZ8EH4LF708632', '740880370152', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(347, 3, 10, 10, 9, 5, 'ZZ8EH4LF708634', '740880370153', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(348, 3, 10, 10, 9, 5, '3CQ5301Q4J', '740880370340', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(349, 3, 10, 10, 9, 5, '3CQ5301NWW', '740880370341', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(350, 3, 10, 10, 9, 5, 'ETH5B1103019', '740881870051', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(351, 3, 10, 17, 16, 7, '6CM2480JV1', '740880370046', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(352, 3, 10, 17, 16, 7, '6CM2480K5G', '740880370047', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(353, 3, 10, 17, 16, 7, 'ZZ8EH4LF708635', '740880370154', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(354, 3, 10, 17, 16, 7, '3CQ5301NY5', '740880370305', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(355, 3, 10, 17, 16, 7, '3CQ5301QGX', '740880370306', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(356, 3, 10, 17, 16, 7, '3CQ5301QRL', '740880370307', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(357, 3, 10, 17, 16, 7, '3CQ5291C43', '740880370308', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(358, 3, 10, 17, 16, 7, 'ETH5B11143019', '740881870062', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(359, 3, 10, 9, 13, 9, '911UXNUOA271', '740877000251', 'LG', 'W194358', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EQUIPO EN BAJA', NULL, NULL, 1, 2, 4, '2021-05-09 23:51:44'),
(360, 3, 10, 9, 13, 9, '6CM2480KCC', '740880370022', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(361, 3, 10, 9, 13, 9, 'ZZ8EH4LF708636', '740880370155', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(362, 3, 10, 9, 13, 9, 'ZZ8EH4LF708712', '740880370156', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(363, 3, 10, 9, 13, 9, '3CQ5301NWZ', '740880370338', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(364, 3, 10, 9, 13, 9, '3CQ5301NWV', '740880370339', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(365, 3, 10, 9, 13, 9, 'ETH5B09774019', '740881870064', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(366, 3, 10, 27, 24, 12, '911UXWEOA297', '740877000261', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(367, 3, 10, 27, 24, 12, '6CM2480JRJ', '740880370034', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(368, 3, 10, 27, 24, 12, 'ZZ8EH4LF708713', '740880370157', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(369, 3, 10, 27, 24, 12, 'ZZ8EH4LF708714K', '740880370158', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(370, 3, 10, 27, 24, 12, 'ZZ8EH4LF708715', '740880370159', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(371, 3, 10, 27, 24, 12, 'ZZ8EH4LF709247', '740880370198', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(372, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01203', '740880370242', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(373, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01216K', '740880370243', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(374, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01224', '740880370244', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(375, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01378', '740880370245', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(376, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01682', '740880370247', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(377, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01708', '740880370248', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(378, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01712K', '740880370249', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(379, 3, 10, 27, 24, 12, 'ZZ8EH4LFA01875', '740880370250', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(380, 3, 10, 27, 24, 12, '3CQ5301NY7', '740880370256', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(381, 3, 10, 27, 24, 12, '3CQ5301QKX', '740880370287', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(382, 3, 10, 27, 24, 12, '3CQ5301QPL', '740880370288', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(383, 3, 10, 27, 24, 12, '3CQ5301Q34', '740880370289', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(384, 3, 10, 27, 24, 12, '3CQ5301QSH', '740880370290', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(385, 3, 10, 27, 24, 12, '3CQ5301NW3', '740880370291', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(386, 3, 10, 27, 24, 12, 'ETH5B09819019', '740881870013', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(387, 3, 10, 27, 24, 12, 'ETH5B09819019', '740881870014', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 20', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(388, 3, 10, 27, 24, 12, 'ETH5B07667019', '740881870015', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 21', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(389, 3, 10, 27, 24, 12, 'ETH5B07488019', '740881870016', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 22', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(390, 3, 10, 27, 24, 12, 'ETH5B08401019', '740881870017', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 23', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(391, 3, 10, 27, 24, 12, 'ETH5B07852019', '740881870018', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 24', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(392, 3, 10, 27, 24, 12, 'ETH5B11134019', '740881870066', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 25', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(393, 3, 10, 27, 24, 12, '6CM537187L', '740881870072', 'HP', 'V221', 'MONITOR PLANO', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(394, 3, 10, 27, 24, 12, '6CM5371829', '740881870073', 'HP', 'V221', 'MONITOR PLANO', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(395, 3, 10, 27, 24, 12, '501NDYG2F690', '740881870075', 'LG', '23MP57HQ', 'MONITOR PLANO', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(396, 3, 10, 15, 3, 15, '911UXJXOA396', '740877000224', 'LG', 'WI9435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(397, 3, 10, 15, 3, 15, '911UXQAOA332', '740877000225', 'LG', 'W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(398, 3, 10, 15, 3, 15, '6CM2480K5B', '740880370027', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(399, 3, 10, 15, 3, 15, '6CM2480JZC', '740880370028', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(400, 3, 10, 15, 3, 15, 'ZZ8EH4LF708716', '740880370160', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(401, 3, 10, 15, 3, 15, 'ZZ8EH4LF708721', '740880370161', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(402, 3, 10, 15, 3, 15, '3CQ5301NX1', '740880370360', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(403, 3, 10, 15, 3, 15, '3CQ529098K', '740880370361', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(404, 3, 10, 15, 3, 15, 'ETH5B09836019', '740881870061', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(405, 3, 10, 22, 23, 13, '911UXUNUA294', '740877000271', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(406, 3, 10, 22, 23, 13, '6CM3101X2Z', '740880370068', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(407, 3, 10, 22, 23, 13, '6CM3243C3Z', '740880370069', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(408, 3, 10, 22, 23, 13, '6CM3101XLC', '740880370070', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(409, 3, 10, 22, 23, 13, '6CM3101X2Q', '740880370071', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(410, 3, 10, 22, 23, 13, '6CM3101XKC', '740880370072', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(411, 3, 10, 22, 23, 13, 'ZZ8EH4LF709504', '740880370212', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(412, 3, 10, 22, 23, 13, 'ZZ8EH4LF709505', '740880370213', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(413, 3, 10, 22, 23, 13, 'ZZ8EH4LF709506', '740880370214', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(414, 3, 10, 22, 23, 13, '3CQ5301QNZ', '740880370323', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(415, 3, 10, 22, 23, 13, '3CQ5282DXL', '740880370324', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(416, 3, 10, 22, 23, 13, '3CQ5301NYB', '740880370325', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(417, 3, 10, 22, 23, 13, '3CQ5301QQ7', '740880370326', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(418, 3, 10, 22, 23, 13, 'ETH5B10391019', '740881870027', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(419, 3, 10, 3, 2, 10, '6CM3172K2J', '740880370100', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(420, 3, 10, 3, 2, 10, 'ZZ8EH4LF708631', '740880370151', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(421, 3, 10, 3, 2, 10, 'ZZ8EH4LF708734', '740880370162', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(422, 3, 10, 3, 2, 10, 'ZZ8EH4LF708735', '740880370163', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(423, 3, 10, 3, 2, 10, 'ZZ8EH4LF708736', '740880370164', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(424, 3, 10, 3, 2, 10, 'ZZ8EH4LFA00232', '740880370231', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(425, 3, 10, 3, 2, 10, '3CQ5301QRX', '740880370320', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(426, 3, 10, 3, 2, 10, '3CQ5301QSZ', '740880370321', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(427, 3, 10, 3, 2, 10, '3CQ5301NXG', '740880370322', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(428, 3, 10, 3, 2, 10, '3CQ5301QRZ', '740880370337', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(429, 3, 10, 3, 2, 10, 'ETH5B08948019', '740881870028', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(430, 3, 10, 13, 14, 16, 'ZZ8EH4LF708737', '740880370165', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(431, 3, 10, 13, 14, 16, 'ZZ8EH4LFA00251', '740880370232', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(432, 3, 10, 13, 14, 16, '3CQ5301QSD', '740880370335', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(433, 3, 10, 13, 14, 16, '3CQ5301QQ9', '740880370336', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(434, 3, 10, 7, 4, 17, '911UXHB0A305', '740877000247', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44');
INSERT INTO `ws_equipos` (`idEquipo`, `tipSegmento`, `idTipo`, `uResponsable`, `office`, `service`, `serie`, `sbn`, `marca`, `modelo`, `descripcion`, `fechaCompra`, `ordenCompra`, `garantia`, `placa`, `procesador`, `vprocesador`, `ram`, `discoDuro`, `puertos`, `capa`, `observaciones`, `fichaBaja`, `fichaReposición`, `condicion`, `estadoEQ`, `registrador`, `registrof`) VALUES
(435, 3, 10, 7, 4, 17, '911UXDMOA290', '740877000248', 'LG', 'W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(436, 3, 10, 7, 4, 17, '911UXSK09758', '740877000250', 'HP', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(437, 3, 10, 7, 4, 17, '6CM2480KC9', '740880370001', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(438, 3, 10, 7, 4, 17, '6CM2480KDO', '740880370002', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(439, 3, 10, 7, 4, 17, '6CM2480KO7', '740880370003', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(440, 3, 10, 7, 4, 17, '6CM2480KCN', '740880370004', 'HP DESKJET', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(441, 3, 10, 7, 4, 17, '6CM2480KCM', '740880370005', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(442, 3, 10, 7, 4, 17, '6CM2480JS9', '740880370006', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(443, 3, 10, 7, 4, 17, '6CM2480JZ4', '740880370007', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(444, 3, 10, 7, 4, 17, '6CM2480KCB', '740880370008', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(445, 3, 10, 7, 4, 17, '6CM2480JS3', '740880370009', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(446, 3, 10, 7, 4, 17, '6CM2480K52', '740880370010', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(447, 3, 10, 7, 4, 17, '6CM2480KCW', '740880370011', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(448, 3, 10, 7, 4, 17, '6CM2480K5Z', '740880370012', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(449, 3, 10, 7, 4, 17, '6CM2480KCS', '740880370013', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(450, 3, 10, 7, 4, 17, '6CM2480K04', '740880370014', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(451, 3, 10, 7, 4, 17, '6CM2480JZX', '740880370015', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(452, 3, 10, 7, 4, 17, '6CM2480KC8', '740880370016', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(453, 3, 10, 7, 4, 17, '6CM3101XKK', '740880370104', 'SAMSUNG', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(454, 3, 10, 7, 4, 17, 'ZZ8EH4LF709110', '740880370190', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(455, 3, 10, 7, 4, 17, 'ZZ8EH4LF709154', '740880370191', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(456, 3, 10, 7, 4, 17, 'ZZ8EH4LF709156', '740880370192', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(457, 3, 10, 7, 4, 17, 'ZZ8EH4LF709157', '740880370193', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(458, 3, 10, 7, 4, 17, 'ZZ8EH4LF709158', '740880370194', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(459, 3, 10, 7, 4, 17, 'ZZ8EH4LF709161', '740880370195', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(460, 3, 10, 7, 4, 17, 'ZZ8EH4LFA00875', '740880370238', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(461, 3, 10, 7, 4, 17, 'ZZ8EH4LFA01176', '740880370239', 'HP', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(462, 3, 10, 7, 4, 17, '3CQ5301P03', '740880370327', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(463, 3, 10, 7, 4, 17, '3CQ5301QT2', '740880370328', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(464, 3, 10, 7, 4, 17, '3CQ5301Q48', '740880370329', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(465, 3, 10, 7, 4, 17, '3CQ5301P6B', '740880370330', 'SAMSUNG', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(466, 3, 10, 7, 4, 17, 'CM17H9NQA02573V', '740881870003', 'SAMSUNG', '733N', 'MONITOR PLANO LCD 17', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(467, 3, 10, 7, 4, 17, 'CM17H9NQA02572W', '740881870004', 'BENQ', '733N', 'MONITOR PLANO LCD 17', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(468, 3, 10, 7, 4, 17, 'ETH5B10418019', '740881870065', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(469, 3, 10, 16, 29, 18, '6CM2480K5W', '740880370049', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(470, 3, 10, 16, 29, 18, '6CM2480JZP', '740880370050', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(471, 3, 10, 16, 29, 18, '6CM3101XKY', '740880370058', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(472, 3, 10, 16, 29, 18, '6CM3I72JWW', '740880370059', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(473, 3, 10, 16, 29, 18, 'ZZ8EH4LF708741', '740880370169', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(474, 3, 10, 16, 29, 18, 'ZZ8EH4LF708835', '740880370170', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(475, 3, 10, 16, 29, 18, 'ZZ8EH4LFA00392', '740880370234', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(476, 3, 10, 16, 29, 18, '3CQ5301R0K', '740880370266', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(477, 3, 10, 16, 29, 18, '3CQ5301QP2', '740880370267', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(478, 3, 10, 16, 29, 18, '3CQ5301R0B', '740880370268', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(479, 3, 10, 16, 29, 18, '3CQ52909CD', '740880370269', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(480, 3, 10, 16, 29, 18, '3CQ5301QSJ', '740880370270', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(481, 3, 10, 16, 29, 18, '3CQ5301NX0', '740880370271', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(482, 3, 10, 16, 29, 18, '3CQ5301QBH', '740880370272', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(483, 3, 10, 16, 29, 18, '3CQ5301NWX', '740880370273', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(484, 3, 10, 16, 29, 18, 'ETH5B08429019', '740881870038', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(485, 3, 10, 16, 29, 18, 'ETH5B09778019', '740881870039', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(486, 3, 10, 16, 29, 18, 'ETH5B09202019', '740881870040', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(487, 3, 10, 16, 29, 18, 'ETH5B08630019', '740881870041', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(488, 3, 10, 16, 29, 18, '501NDCR2F667', '740881870077', 'LG', '23MP57HQ', 'MONITOR PLANO', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(489, 3, 10, 23, 21, 8, '911UXRFOA302', '740877000265', 'LG', 'W194SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(490, 3, 10, 23, 21, 8, '6CM3101X2H', '740880370117', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(491, 3, 10, 23, 21, 8, 'ZZ8EH4LF708836', '740880370171', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(492, 3, 10, 23, 21, 8, 'ZZ8EH4LF708837', '740880370172', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(493, 3, 10, 23, 21, 8, '3CQ5301QRB', '740880370316', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(494, 3, 10, 23, 21, 8, '3CQ5301QR5', '740880370317', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(495, 3, 10, 21, 10, 14, '911QXGLOA287', '740877000230', 'LG', 'FLATRON W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(496, 3, 10, 21, 10, 14, '911UXRF09750', '740877000249', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(497, 3, 10, 21, 10, 14, '6CM3101X29', '740880370051', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(498, 3, 10, 21, 10, 14, 'ZZ8EH4LF708838', '740880370173', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(499, 3, 10, 21, 10, 14, 'ZZ8EH4LF708918', '740880370174', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(500, 3, 10, 21, 10, 14, '3CQ5301Q3M', '740880370300', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(501, 3, 10, 21, 10, 14, '3CQ5301QRW', '740880370301', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(502, 3, 10, 21, 10, 14, '3CQ5301QRM', '740880370302', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(503, 3, 10, 21, 10, 14, 'ETH5B08951019', '740881870063', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(504, 3, 10, 25, 19, 19, '6CM3172JWM', '740880370078', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(505, 3, 10, 25, 19, 19, '6CM3101X2X', '740880370079', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(506, 3, 10, 25, 19, 19, '6CM3101XKQ', '740880370092', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(507, 3, 10, 25, 19, 19, '6CM3101XKN', '740880370093', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(508, 3, 10, 25, 19, 19, '6CM3101XKW', '740880370094', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(509, 3, 10, 25, 19, 19, '6CM3101X2K', '740880370095', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(510, 3, 10, 25, 19, 19, '6CM3101XL8', '740880370096', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(511, 3, 10, 25, 19, 19, 'ZZ8EH4LF708923', '740880370178', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(512, 3, 10, 25, 19, 19, 'ZZ8EH4LF708996', '740880370179', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(513, 3, 10, 25, 19, 19, 'ZZ8EH4LF708997', '740880370180', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(514, 3, 10, 25, 19, 19, 'ZZ8EH4LF708999', '740880370227', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(515, 3, 10, 25, 19, 19, '3CQ5301QQP', '740880370282', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(516, 3, 10, 25, 19, 19, '3CQ5301Q1M', '740880370283', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(517, 3, 10, 25, 19, 19, '3CQ5301NYF', '740880370284', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(518, 3, 10, 25, 19, 19, '3CQ5301NWK', '740880370285', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(519, 3, 10, 25, 19, 19, '3CQ5301Q1N', '740880370286', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(520, 3, 10, 25, 19, 19, '910INAR4A008', '740881870008', 'LG', 'W2043S', 'MONITOR PLANO LCD 20', '2012-01-01', '1674', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(521, 3, 10, 25, 19, 19, '910INEW47316', '740881870010', 'LG', 'W2043T', 'MONITOR PLANO LCD 20', '2012-01-01', '1674', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(522, 3, 10, 25, 19, 19, '911UXJXOA324', '740881870011', 'LG', 'W194358', 'MONITOR PLANO LCD 20', '2012-01-01', '1674', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(523, 3, 10, 25, 19, 19, 'ETH5B08611019', '740881870044', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(524, 3, 10, 12, 11, 20, '6CM2480JRW', '740880370023', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(525, 3, 10, 12, 11, 20, '6CM3101X2B', '740880370087', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(526, 3, 10, 12, 11, 20, 'ZZ8EH4LF709004', '740880370181', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(527, 3, 10, 12, 11, 20, 'ZZ8EH4LF709016', '740880370182', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(528, 3, 10, 19, 26, 21, '6CM3101XKV', '740880370086', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(529, 3, 10, 19, 26, 21, '6CM3101XLB', '740880370111', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(530, 3, 10, 19, 26, 21, '6CM3101XKT', '740880370112', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(531, 3, 10, 19, 26, 21, '6CM3101XKR', '740880370113', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(532, 3, 10, 19, 26, 21, 'ZZ8EH4LF709017', '740880370183', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(533, 3, 10, 19, 26, 21, 'ZZ8EH4LF709019', '740880370184', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(534, 3, 10, 19, 26, 21, '3CQ5301P36', '740880370292', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(535, 3, 10, 19, 26, 21, '3CQ5301QS7', '740880370293', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(536, 3, 10, 19, 26, 21, '3CQ5301QPN', '740880370294', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(537, 3, 10, 19, 26, 21, '3CQ5301Q2D', '740880370295', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(538, 3, 10, 19, 26, 21, '3CQ5301NW9', '740880370296', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(539, 3, 10, 19, 26, 21, '3CQ5301NX2', '740880370297', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(540, 3, 10, 19, 26, 21, '3CQ5301NXD', '740880370298', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(541, 3, 10, 19, 26, 21, '3CQ5301Q2H', '740880370299', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(542, 3, 10, 19, 26, 21, 'GGZH4HA048017', '740880370368', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(543, 3, 10, 19, 26, 21, 'GGZH4HA048045', '740880370369', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(544, 3, 10, 19, 26, 21, 'GGZH4HA048277', '740880370370', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(545, 3, 10, 19, 26, 21, 'GGZH4HA047506', '740880370371', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(546, 3, 10, 19, 26, 21, 'GGZH4HA048276', '740880370372', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(547, 3, 10, 19, 26, 21, 'GGZH4HA048024', '740880370373', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(548, 3, 10, 19, 26, 21, 'GGZH4HA047748', '740880370374', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(549, 3, 10, 19, 26, 21, 'GGZH4HA048027', '740880370375', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(550, 3, 10, 19, 26, 21, 'GGZH4HA047588', '740880370376', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(551, 3, 10, 19, 26, 21, 'GGZH4HA047768', '740880370377', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(552, 3, 10, 19, 26, 21, 'GGZH4HA048028', '740880370378', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(553, 3, 10, 19, 26, 21, 'GGZH4HA048035', '740880370379', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(554, 3, 10, 19, 26, 21, 'GGZH4HA048278', '740880370380', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(555, 3, 10, 19, 26, 21, 'GGZH4HA047529', '740880370381', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(556, 3, 10, 19, 26, 21, 'GGZH4HA047514', '740880370382', 'AOC', 'M2470SW', 'MONITOR LED 24 in', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(557, 3, 10, 19, 26, 21, 'ETH5B09197019', '740881870059', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(558, 3, 10, 33, 31, 129, 'CM19H9NS606575', '740881870007', 'SAMSUNG', '933SN', 'MONITOR PLANO LCD 17', '2012-01-01', '1334', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(559, 3, 10, 33, 31, 129, 'ETH5B08932019', '740881870029', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(560, 3, 10, 6, 5, 22, '911UXFVOA299', '740877000237', 'LG', 'FLATRON  W 994350', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(561, 3, 10, 6, 5, 22, '911UXJXOA300', '740877000239', 'LG', 'W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(562, 3, 10, 6, 5, 22, '911UXSKOA286', '740877000240', 'LG', 'W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(563, 3, 10, 6, 5, 22, '911UXSK0A310', '740877000243', 'LG', 'W1943SI', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(564, 3, 10, 6, 5, 22, '6CM2480K2W', '740880370035', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(565, 3, 10, 6, 5, 22, '6CM2480K01', '740880370036', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(566, 3, 10, 6, 5, 22, '6CM2480JZB', '740880370037', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(567, 3, 10, 6, 5, 22, '6CM2480JSG', '740880370038', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(568, 3, 10, 6, 5, 22, '6CM2480JRK', '740880370039', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(569, 3, 10, 6, 5, 22, '6CM2480K00', '740880370040', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(570, 3, 10, 6, 5, 22, '6CM2480JZS', '740880370041', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(571, 3, 10, 6, 5, 22, '6CM2480JTV', '740880370042', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(572, 3, 10, 6, 5, 22, '6CM2480JZI', '740880370043', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(573, 3, 10, 6, 5, 22, '6CM2480JZN', '740880370044', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(574, 3, 10, 6, 5, 22, '6CM2480K5Q', '740880370045', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(575, 3, 10, 6, 5, 22, 'T8BJSY2PDBHPNNF', '740880370105', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(576, 3, 10, 6, 5, 22, '6CM3101XLD', '740880370106', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(577, 3, 10, 6, 5, 22, '6CM3101X2P', '740880370107', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(578, 3, 10, 6, 5, 22, '6CM3101XK5', '740880370108', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(579, 3, 10, 6, 5, 22, '6CM3172K2P', '740880370109', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(580, 3, 10, 6, 5, 22, '6CM3101X1P', '740880370110', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(581, 3, 10, 6, 5, 22, 'ZZ8EH4LF708738', '740880370166', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(582, 3, 10, 6, 5, 22, 'ZZ8EH4LF708739', '740880370167', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(583, 3, 10, 6, 5, 22, 'ZZ8EH4LF708740', '740880370168', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(584, 3, 10, 6, 5, 22, 'ZZ8EH4LFA00370', '740880370233', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(585, 3, 10, 6, 5, 22, '3CQ5301NZT', '740880370342', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(586, 3, 10, 6, 5, 22, '3CQ5301Q4T', '740880370343', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(587, 3, 10, 6, 5, 22, '3CQ5301Q23', '740880370344', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(588, 3, 10, 6, 5, 22, '3CQ5301R0M', '740880370345', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(589, 3, 10, 6, 5, 22, '3CQ5301Q1R', '740880370346', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(590, 3, 10, 6, 5, 22, 'ETH5B09872019', '740881870046', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(591, 3, 10, 6, 5, 22, 'ETH5B09765019', '740881870047', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(592, 3, 10, 6, 5, 22, 'ETH5B1120019', '740881870048', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(593, 3, 10, 6, 5, 22, 'ETH5B11088019', '740881870049', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(594, 3, 10, 6, 5, 22, 'ETH5B09820019', '740881870050', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(595, 3, 10, 18, 15, 23, '6CM2480JV9', '740880370048', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(596, 3, 10, 18, 15, 23, '6CM3101X1Y', '740880370085', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(597, 3, 10, 18, 15, 23, '6CM3101X2T', '740880370091', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(598, 3, 10, 18, 15, 23, 'ZZ8EH4LF709162', '740880370228', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(599, 3, 10, 18, 15, 23, 'ZZ8EH4LF709243', '740880370229', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(600, 3, 10, 18, 15, 23, 'ZZ8EH4LF709244', '740880370230', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(601, 3, 10, 18, 15, 23, 'ZZ8EH4LFA01676', '740880370246', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(602, 3, 10, 18, 15, 23, '3CQ5301NWJ', '740880370318', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(603, 3, 10, 18, 15, 23, '3CQ5301QRH', '740880370319', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(604, 3, 10, 18, 15, 23, 'ETH5B08426019', '740881870052', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(605, 3, 10, 29, 30, 24, '6CM3101X21', '740880370088', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(606, 3, 10, 29, 30, 24, '3CQ5301NYN', '740880370314', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(607, 3, 10, 29, 30, 24, 'ETH5B11127019', '740881870053', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(608, 3, 10, 24, 22, 25, '6CM3172JWX', '740880370089', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(609, 3, 10, 24, 22, 25, 'ZZ8EH4LF709245', '740880370196', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(610, 3, 10, 24, 22, 25, '3CQ5301NY1', '740880370315', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(611, 3, 10, 24, 22, 25, 'ETH5B08343019', '740881870060', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(612, 3, 10, 28, 27, 26, '911UXUU0A319', '740877000260', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(613, 3, 10, 28, 27, 26, 'ZZ8EH4LF709246', '740880370197', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(614, 3, 10, 31, 25, 27, '15H9LP308573B', '740877000267', 'SAMSUNG', '522Y', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(615, 3, 10, 31, 25, 27, '911UXKOCA317', '740877000268', 'LG', 'W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(616, 3, 10, 31, 25, 27, 'CN313YA904', '740877000283', 'HP', 'PE1160 T', 'MONITOR A COLOR', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(617, 3, 10, 31, 25, 27, '6CM3172JWB', '740880370073', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(618, 3, 10, 31, 25, 27, '6CM3101X1M', '740880370074', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(619, 3, 10, 31, 25, 27, '6CM3101X2J', '740880370075', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(620, 3, 10, 31, 25, 27, '6CM3172KV', '740880370076', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(621, 3, 10, 31, 25, 27, '6CM3101XK9', '740880370077', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(622, 3, 10, 31, 25, 27, 'ZZ8EH4LF709021', '740880370185', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(623, 3, 10, 31, 25, 27, 'ZZ8EH4LF709022', '740880370186', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(624, 3, 10, 31, 25, 27, 'ZZ8EH4LF709025', '740880370187', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(625, 3, 10, 31, 25, 27, 'ZZ8EH4LF709107', '740880370188', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(626, 3, 10, 31, 25, 27, 'ZZ8EH4LF709108', '740880370189', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(627, 3, 10, 31, 25, 27, 'ZZ8EH4LFA00762', '740880370237', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(628, 3, 10, 31, 25, 27, '3CQ5301QR8', '740880370274', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(629, 3, 10, 31, 25, 27, '3CQ5301NWB', '740880370275', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(630, 3, 10, 31, 25, 27, '3CQ5301NZD', '740880370276', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(631, 3, 10, 31, 25, 27, '3CQ5301QPO', '740880370277', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(632, 3, 10, 31, 25, 27, '3CQ5301NY2', '740880370278', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(633, 3, 10, 31, 25, 27, '3CQ5301QSQ', '740880370279', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(634, 3, 10, 31, 25, 27, '3CQ5301NWM', '740880370280', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(635, 3, 10, 31, 25, 27, '3CQ5301NXS', '740880370281', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(636, 3, 10, 31, 25, 27, 'CNC116QW8M', '740881870012', 'HP', 'HP 51933 WIDE LCD', 'MONITOR PLANO LCD 17', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(637, 3, 10, 31, 25, 27, 'ETH5B07562019', '740881870055', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(638, 3, 10, 20, 17, 28, '6CM3101X25', '740880370114', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(639, 3, 10, 20, 17, 28, 'ZZ8EH4LF709249', '740880370199', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(640, 3, 10, 20, 17, 28, 'ZZ8EH4LF709250', '740880370200', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(641, 3, 10, 20, 17, 28, '3CQ5301QC4', '740880370303', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(642, 3, 10, 20, 17, 28, '3CQ5301QQD', '740880370304', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(643, 3, 10, 20, 17, 28, 'ETH5B09835019', '740881870054', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(644, 3, 10, 20, 17, 28, 'ETH5B08996019', '740881870056', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(645, 3, 10, 5, 6, 29, '6CM2480KCT', '740880370024', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(646, 3, 10, 5, 6, 29, '6CM2480K09', '740880370025', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(647, 3, 10, 5, 6, 29, '6CM2480JZM', '740880370026', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(648, 3, 10, 5, 6, 29, '6CM3101X1S', '740880370052', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(649, 3, 10, 5, 6, 29, '6CM3161XK6', '740880370053', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(650, 3, 10, 5, 6, 29, '6CM3101XL8', '740880370054', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44');
INSERT INTO `ws_equipos` (`idEquipo`, `tipSegmento`, `idTipo`, `uResponsable`, `office`, `service`, `serie`, `sbn`, `marca`, `modelo`, `descripcion`, `fechaCompra`, `ordenCompra`, `garantia`, `placa`, `procesador`, `vprocesador`, `ram`, `discoDuro`, `puertos`, `capa`, `observaciones`, `fichaBaja`, `fichaReposición`, `condicion`, `estadoEQ`, `registrador`, `registrof`) VALUES
(651, 3, 10, 5, 6, 29, '6CM3172JWT', '740880370055', 'HP DESKJET', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(652, 3, 10, 5, 6, 29, '6CM3101XL6', '740880370056', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(653, 3, 10, 5, 6, 29, '6CM31011X37', '740880370057', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(654, 3, 10, 5, 6, 29, '6CM3101XL7', '740880370115', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(655, 3, 10, 5, 6, 29, 'ZZ8EH4LF709272', '740880370201', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(656, 3, 10, 5, 6, 29, 'ZZ8EH4LF709273', '740880370202', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(657, 3, 10, 5, 6, 29, 'ZZ8EH4LF709277', '740880370203', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(658, 3, 10, 5, 6, 29, 'ZZ8EH4LF709278', '740880370204', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(659, 3, 10, 5, 6, 29, 'ZZ8EH4LF709279', '740880370205', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(660, 3, 10, 5, 6, 29, 'ZZ8EH4LFA00407', '740880370236', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(661, 3, 10, 5, 6, 29, '3CQ5301QST', '740880370347', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(662, 3, 10, 5, 6, 29, '3CQ5301NZL', '740880370348', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(663, 3, 10, 5, 6, 29, '3CQ5301QR1', '740880370349', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(664, 3, 10, 5, 6, 29, '3CQ5301QR3', '740880370350', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(665, 3, 10, 5, 6, 29, '3CQ5301NXP', '740880370351', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(666, 3, 10, 5, 6, 29, '3CQ5301NVX', '740880370352', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(667, 3, 10, 5, 6, 29, '3CQ5301QQW', '740880370353', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(668, 3, 10, 5, 6, 29, 'CM17H9NQA014982', '740881870005', 'SAMSUNG', 'SMG', 'MONITOR PLANO LCD 17', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(669, 3, 10, 8, 7, 30, '911UXPHOA352', '740877000226', 'LG', 'FLATRON W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(670, 3, 10, 8, 7, 30, '911UXWEOA273', '740877000227', 'LG', 'FLATRON W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(671, 3, 10, 8, 7, 30, '6CM2480JZ3', '740880370029', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(672, 3, 10, 8, 7, 30, '6CM2480JS8', '740880370030', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(673, 3, 10, 8, 7, 30, '6CM2480K60', '740880370031', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(674, 3, 10, 8, 7, 30, '6CM2480KD2', '740880370032', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(675, 3, 10, 8, 7, 30, '6CM2480K06', '740880370033', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(676, 3, 10, 8, 7, 30, '6CM3101X26', '740880370090', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(677, 3, 10, 8, 7, 30, 'ZZ8EH4LF709280H', '740880370206', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(678, 3, 10, 8, 7, 30, 'ZZ8EH4LF709381', '740880370207', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(679, 3, 10, 8, 7, 30, 'ZZ8EH4LF709382X', '740880370208', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(680, 3, 10, 8, 7, 30, 'ZZ8EH4LF709383', '740880370209', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(681, 3, 10, 8, 7, 30, '3CQ5291C53', '740880370331', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(682, 3, 10, 8, 7, 30, '3CQ5301NWP', '740880370332', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(683, 3, 10, 8, 7, 30, '3CQ5301QT4', '740880370333', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(684, 3, 10, 8, 7, 30, '3CQ5301P7L', '740880370334', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(685, 3, 10, 8, 7, 30, 'ETH5B09002019', '740881870057', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(686, 3, 10, 8, 7, 30, 'ETH5B09846019', '740881870058', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(687, 3, 10, 26, 18, 31, '911UXCROA307', '740877000273', 'NIPRO', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(688, 3, 10, 26, 18, 31, '6CM3101X12', '740880370080', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(689, 3, 10, 26, 18, 31, '6CM3101XKL', '740880370081', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(690, 3, 10, 26, 18, 31, '6CM3101X2G', '740880370082', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(691, 3, 10, 26, 18, 31, 'ZZ8EH4LF709386', '740880370210', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(692, 3, 10, 26, 18, 31, 'ZZ8EH4LF709503', '740880370211', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(693, 3, 10, 26, 18, 31, '3CQ5501P86', '740880370312', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(694, 3, 10, 26, 18, 31, '3CQ5301Q3V', '740880370313', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(695, 3, 10, 14, 12, 32, '911UXBPOA373', '740877000255', 'LG', 'W19435B', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(696, 3, 10, 14, 12, 32, '911UXNT09739', '740877000256', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(697, 3, 10, 14, 12, 32, '911UXVWOA279', '740877000257', 'LG', 'W1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(698, 3, 10, 14, 12, 32, '6CM3172JWN', '740880370060', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(699, 3, 10, 14, 12, 32, '6CM3101XKB', '740880370061', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(700, 3, 10, 14, 12, 32, '6CM3172K2P', '740880370062', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(701, 3, 10, 14, 12, 32, '6CM3172JWN', '740880370063', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(702, 3, 10, 14, 12, 32, '6CM3101X28', '740880370064', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(703, 3, 10, 14, 12, 32, '6CM3101X22', '740880370065', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(704, 3, 10, 14, 12, 32, '6CM3172K21', '740880370066', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(705, 3, 10, 14, 12, 32, '6CM3101X1V', '740880370067', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(706, 3, 10, 14, 12, 32, 'ZZ8EH4LF709509', '740880370216', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(707, 3, 10, 14, 12, 32, 'ZZ8EH4LF709511', '740880370217', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(708, 3, 10, 14, 12, 32, 'ZZ8EH4LF709531', '740880370218', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(709, 3, 10, 14, 12, 32, 'ZZ8EH4LF709532', '740880370219', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(710, 3, 10, 14, 12, 32, 'ZZ8EH4LF709533', '740880370220', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(711, 3, 10, 14, 12, 32, 'ZZ8EH4LF709534', '740880370221', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(712, 3, 10, 14, 12, 32, 'ZZ8EH4LFA01183', '740880370240', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(713, 3, 10, 14, 12, 32, '3CQ5031QRT', '740880370251', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(714, 3, 10, 14, 12, 32, '3CQ5301QSG', '740880370252', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(715, 3, 10, 14, 12, 32, '3CQ5301NZV', '740880370253', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(716, 3, 10, 14, 12, 32, '3CQ5301NW7', '740880370254', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(717, 3, 10, 14, 12, 32, '3CQ5301NYX', '740880370255', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(718, 3, 10, 14, 12, 32, '3CQ5301NYC', '740880370257', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(719, 3, 10, 14, 12, 32, '3CQ5301QR9', '740880370258', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(720, 3, 10, 14, 12, 32, '3CQ5301QS5', '740880370259', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(721, 3, 10, 14, 12, 32, '3CQ5282F29', '740880370260', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(722, 3, 10, 14, 12, 32, '3C5301NWT', '740880370261', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(723, 3, 10, 14, 12, 32, '3CQ5301QS4', '740880370262', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(724, 3, 10, 14, 12, 32, '3CQ5301NYH', '740880370263', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(725, 3, 10, 14, 12, 32, '3CQ5301NY3', '740880370264', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(726, 3, 10, 14, 12, 32, '3CQ5301NZ7', '740880370265', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(727, 3, 10, 14, 12, 32, 'CM17H9NQ808681W', '740881870001', 'SAMSUNG', '733N', 'MONITOR PLANO LCD 17', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(728, 3, 10, 14, 12, 32, 'ETH5B08581019', '740881870031', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(729, 3, 10, 14, 12, 32, 'ETH5B11150019', '740881870032', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(730, 3, 10, 14, 12, 32, 'ETH5B07473019', '740881870033', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(731, 3, 10, 14, 12, 32, 'ETH5B10446019', '740881870034', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(732, 3, 10, 14, 12, 32, 'ETH5B07537019', '740881870035', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(733, 3, 10, 14, 12, 32, 'ETH5B09843019', '740881870037', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(734, 3, 10, 14, 12, 32, '501NDFV2F587', '740881870076', 'LG', '23MP57HQ', 'MONITOR PLANO', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(735, 3, 10, 2, 20, 3, '6CM3101XK8', '740880370101', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(736, 3, 10, 2, 20, 3, '6CM3101XK2', '740880370102', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(737, 3, 10, 2, 20, 3, 'ZZ8EH4LF709535', '740880370222', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(738, 3, 10, 2, 20, 3, 'ZZ8EH4LF709536', '740880370223', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(739, 3, 10, 2, 20, 3, 'ZZ8EH4LFA01190', '740880370241', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(740, 3, 10, 2, 20, 3, '3CQ5301Q3D', '740880370309', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(741, 3, 10, 2, 20, 3, '3CQ5301QBW', '740880370310', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(742, 3, 10, 2, 20, 3, '3CQ5301QSX', '740880370311', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(743, 3, 10, 2, 20, 3, 'ETH5B11108019', '740881870025', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(744, 3, 10, 2, 20, 3, 'ETH5B09763019', '740881870026', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(745, 3, 10, 11, 8, 33, 'P11UXXQOA394R', '740877000244', 'LG', 'W1943SI', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(746, 3, 10, 11, 8, 33, '6CM3101X2M', '740880370103', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(747, 3, 10, 11, 8, 33, 'ZZ8EH4LF709541', '740880370224', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(748, 3, 10, 11, 8, 33, 'ZZ8EH4LF709542', '740880370225', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(749, 3, 10, 11, 8, 33, 'ZZ8EH4LF709651', '740880370226', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(750, 3, 10, 11, 8, 33, '3CQ5301NXL', '740880370362', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(751, 3, 10, 11, 8, 33, '3CQ5301NXJ', '740880370363', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(752, 3, 10, 11, 8, 33, '3CQ5301NX6', '740880370364', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(753, 3, 10, 11, 8, 33, '3CQ5301QRY', '740880370365', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(754, 3, 10, 11, 8, 33, '3CQ5301QQX', '740880370366', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(755, 3, 10, 11, 8, 33, '3CQ5301QR7', '740880370367', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(756, 3, 10, 32, 1, 4, '911UXDM04314', '740877000253', 'LG', 'FLATRON 1943SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(757, 3, 10, 32, 1, 4, '911UXHB09753', '740877000254', 'LG', 'FLATRON -  W194SB', 'MONITOR A COLOR', '2012-01-01', '1747', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(758, 3, 10, 32, 1, 4, 'C0096070', '740877000284', 'BELTRON', 'BEL-500', 'MONITOR A COLOR', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(759, 3, 10, 32, 1, 4, 'MX05C5444780120', '740877000285', 'DELL', 'M99I', 'MONITOR A COLOR', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(760, 3, 10, 32, 1, 4, '6CM2480JSF', '740880370017', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(761, 3, 10, 32, 1, 4, '6CM2480KCJ', '740880370018', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(762, 3, 10, 32, 1, 4, '6CM2480KCY', '740880370019', 'HP', 'LV2311', 'MONITOR LED 23 in', '2012-01-01', '426', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(763, 3, 10, 32, 1, 4, '6CM310X2F', '740880370097', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(764, 3, 10, 32, 1, 4, '6CM3101XLB', '740880370098', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(765, 3, 10, 32, 1, 4, '6CM31001XKJ', '740880370099', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(766, 3, 10, 32, 1, 4, '6CM3101XKV', '740880370118', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(767, 3, 10, 32, 1, 4, 'ZZ8EH4LF708919', '740880370175', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(768, 3, 10, 32, 1, 4, 'ZZ8EH4LF708921', '740880370176', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(769, 3, 10, 32, 1, 4, 'ZZ8EH4LF708922', '740880370177', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '632', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(770, 3, 10, 32, 1, 4, 'ZZ8EH4LFA00398', '740880370235', 'SAMSUNG', 'S19D300NY', 'MONITOR LED 18.5 in', '2012-01-01', '786', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(771, 3, 10, 32, 1, 4, '3CQ5301QS0', '740880370354', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(772, 3, 10, 32, 1, 4, '3CQ5301NXM', '740880370355', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(773, 3, 10, 32, 1, 4, '3CQ5290982', '740880370356', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(774, 3, 10, 32, 1, 4, '3CQ5301QBZ', '740880370357', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(775, 3, 10, 32, 1, 4, '3CQ5301NWH', '740880370358', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(776, 3, 10, 32, 1, 4, '3CQ5301NYG', '740880370359', 'HP', 'HP V193', 'MONITOR LED 18.5 in', '2012-01-01', '407', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(777, 3, 10, 32, 1, 4, 'ETH5B08409019', '740881870019', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(778, 3, 10, 32, 1, 4, 'ETH5B09851019', '740881870020', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(779, 3, 10, 32, 1, 4, 'ETH5B10414019', '740881870021', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(780, 3, 10, 32, 1, 4, 'ETH5B07656019', '740881870022', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(781, 3, 10, 32, 1, 4, 'ETH5B07500019', '740881870023', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(782, 3, 10, 32, 1, 4, 'ETH5B07669019', '740881870024', 'BENQ', 'G925HDA', 'MONITOR PLANO LCD 19', '2012-01-01', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(783, 3, 10, 32, 1, 4, '6CM3101XKV', '740880370120', 'HP', 'LV1911', 'MONITOR LED 18.5 in', '2012-01-01', '789', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-09 23:51:44'),
(784, 3, 12, 10, 9, 5, '1011010450274', '462200500077', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(785, 3, 12, 9, 13, 9, '1011010450303', '462200500090', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(786, 3, 12, 27, 24, 12, '1011010450147', '462200500040', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(787, 3, 12, 27, 24, 12, '101101-0450146', '462200500042', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(788, 3, 12, 27, 24, 12, '1011010450275', '462200500043', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(789, 3, 12, 27, 24, 12, '1011010450099', '462200500092', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-31', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(790, 3, 12, 27, 24, 12, '7B1301L01906', '462200500097', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(791, 3, 12, 15, 3, 15, '1011010450301', '462200500087', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(792, 3, 12, 15, 3, 15, '1011010450302', '462200500088', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(793, 3, 12, 22, 23, 13, '10110104500554', '462200500053', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(794, 3, 12, 22, 23, 13, '7B1251L08512', '462200500122', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(795, 3, 12, 22, 23, 13, '7B1301L02014', '462200500123', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(796, 3, 12, 22, 23, 13, '7B1301L02010', '462200500124', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(797, 3, 12, 3, 2, 10, '1011010450140', '462200500055', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(798, 3, 12, 7, 4, 17, '1011010450135', '462200500091', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(799, 3, 12, 7, 4, 17, '7B1301L02065', '462200500129', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(800, 3, 12, 7, 4, 17, '7B1301L02084', '462200500130', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(801, 3, 12, 16, 29, 18, '1011010450258', '462200500067', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(802, 3, 12, 16, 29, 18, '7B1301L02082', '462200500125', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(803, 3, 12, 16, 29, 18, '7B1301L02060', '462200500126', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(804, 3, 12, 16, 29, 18, '7B1301L02863', '462200500127', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(805, 3, 12, 16, 29, 18, '7B1301L02867', '462200500128', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(806, 3, 12, 21, 10, 14, '1011010450304', '462200500089', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(807, 3, 12, 25, 19, 19, '1011010450160', '462200500070', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(808, 3, 12, 25, 19, 19, '1011010450126', '462200500071', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(809, 3, 12, 6, 5, 22, '1011010450273', '462200500072', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(810, 3, 12, 6, 5, 22, '1011010450125', '462200500073', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(811, 3, 12, 6, 5, 22, '1011010450159', '462200500074', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(812, 3, 12, 6, 5, 22, '1011010450097', '462200500075', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(813, 3, 12, 6, 5, 22, '1011010450', '462200500076', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(814, 3, 12, 6, 5, 22, '7B1301L02873', '462200500105', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(815, 3, 12, 6, 5, 22, '7B1301L02066', '462200500106', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(816, 3, 12, 6, 5, 22, '7B1301L02051', '462200500107', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(817, 3, 12, 6, 5, 22, '7B1301L02059', '462200500108', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(818, 3, 12, 6, 5, 22, '7B1301L02041', '462200500109', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(819, 3, 12, 18, 15, 23, '1011010450128', '462200500078', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(820, 3, 12, 29, 30, 24, '1011010450127', '462200500079', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(821, 3, 12, 24, 22, 25, '1011010450067', '462200500086', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(822, 3, 12, 31, 25, 27, '1011010450100', '462200500081', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(823, 3, 12, 31, 25, 27, '7B1301L02073', '462200500113', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(824, 3, 12, 31, 25, 27, '7B1301L02078', '462200500114', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(825, 3, 12, 31, 25, 27, '7B1301L02057', '462200500115', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(826, 3, 12, 31, 25, 27, '7B1301L02075', '462200500116', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(827, 3, 12, 20, 17, 28, '1011010450066', '462200500080', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(828, 3, 12, 8, 7, 30, '1011010450136', '462200500083', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(829, 3, 12, 8, 7, 30, '1011010450068', '462200500084', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(830, 3, 12, 26, 18, 31, '7B1251L08445', '462200500101', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(831, 3, 12, 26, 18, 31, '7B1251L08442', '462200500102', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(832, 3, 12, 14, 12, 32, '1011010450139', '462200500057', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(833, 3, 12, 14, 12, 32, '1011010450150', '462200500058', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(834, 3, 12, 14, 12, 32, '1011010450242', '462200500060', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(835, 3, 12, 14, 12, 32, '1011010450243', '462200500061', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(836, 3, 12, 14, 12, 32, '1011010450151', '462200500062', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(837, 3, 12, 14, 12, 32, '1011010450241', '462200500063', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(838, 3, 12, 14, 12, 32, '7B1301L02068', '462200500132', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(839, 3, 12, 14, 12, 32, '7B1301L02896', '462200500133', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(840, 3, 12, 14, 12, 32, '7B1301L02898', '462200500134', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(841, 3, 12, 14, 12, 32, '7B1301L02761', '462200500135', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(842, 3, 12, 14, 12, 32, '7B1251L08425', '462200500136', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(843, 3, 12, 14, 12, 32, '7B1251L08428', '462200500137', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(844, 3, 12, 14, 12, 32, '7B1301L02763', '462200500138', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(845, 3, 12, 2, 20, 3, '101010450137', '462200500051', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(846, 3, 12, 2, 20, 3, '1011010450053', '462200500052', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(847, 3, 12, 2, 20, 3, '7B1301L02054', '462200500140', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(848, 3, 12, 2, 20, 3, '7B1301L02039', '462200500141', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(849, 3, 12, 32, 1, 4, '1011010450148', '462200500045', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(850, 3, 12, 32, 1, 4, '1011010450152', '462200500046', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(851, 3, 12, 32, 1, 4, '1011010450117', '462200500047', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(852, 3, 12, 32, 1, 4, '1011010450118', '462200500048', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(853, 3, 12, 32, 1, 4, '1011010450259', '462200500049', 'CDP', 'B-UPR5051', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2012-05-30', 'SO', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(854, 3, 12, 32, 1, 4, '7B1301L02069', '462200500110', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(855, 3, 12, 32, 1, 4, '7B1301L01917', '462200500111', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(856, 3, 12, 32, 1, 4, '7B1301L01910', '462200500112', 'APC', 'ES 500', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2013-11-27', '1129', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(857, 3, 12, 32, 1, 4, 'SQS1436271281', '462200500142', 'APC', 'SMART SURT6000XLI', 'ACUMULADOR DE ENERGIA - EQUIPO DE UPS', '2016-04-29', '195', '1 AÑO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGISTRO NUEVO', NULL, NULL, 1, 1, 4, '2021-05-10 10:24:06'),
(858, 2, 2, 18, 15, 23, 'CN57GNR0XF', '952281170021', 'HP', '1620-24G', 'SMART', '2016-12-29', '1494-2016', '3 AÑOS', NULL, NULL, NULL, NULL, NULL, '24', 'SMART', 'REGISTRO NUEVO', NULL, NULL, 1, 1, 1, '2021-05-10 10:33:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_estado`
--

CREATE TABLE `ws_estado` (
  `idEstado` int(11) NOT NULL,
  `descEstado` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `estAte` mediumtext COLLATE utf8_bin NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `estadoDoc` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `correlativo_integracion` text COLLATE utf8_bin,
  `nro_eq` text COLLATE utf8_bin NOT NULL,
  `ip` text COLLATE utf8_bin,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `correlativo_Mant` text COLLATE utf8_bin NOT NULL,
  `fRegistroMant` date NOT NULL,
  `tipEquipo` int(11) NOT NULL,
  `condInicial` int(11) NOT NULL,
  `idEquip` int(11) NOT NULL,
  `oficEquip` int(11) NOT NULL,
  `areaEquip` int(11) NOT NULL,
  `respoEquip` int(11) NOT NULL,
  `logdeta` text COLLATE utf8_bin,
  `descInc` text COLLATE utf8_bin,
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
  `primera_eval` text COLLATE utf8_bin,
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
  `recomendaciones` text COLLATE utf8_bin,
  `estAtencion` int(11) NOT NULL,
  `condFinal` int(11) NOT NULL,
  `servTerce` text COLLATE utf8_bin,
  `otros` text COLLATE utf8_bin,
  `obsOtros` text COLLATE utf8_bin,
  `usRegistra` int(11) NOT NULL,
  `sgmtoManto` int(11) NOT NULL DEFAULT '0',
  `estAnulado` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `perfil` text COLLATE utf8_bin NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `correlativo_Repo` text COLLATE utf8_bin NOT NULL,
  `fRegistroRepo` date NOT NULL,
  `tipEquipo` int(11) NOT NULL,
  `condInicial` int(11) NOT NULL,
  `idEquip` int(11) NOT NULL,
  `oficEquip` int(11) NOT NULL,
  `areaEquip` int(11) NOT NULL,
  `respoEquip` int(11) NOT NULL,
  `logdeta` text COLLATE utf8_bin,
  `descInc` text COLLATE utf8_bin,
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
  `primera_eval` text COLLATE utf8_bin,
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
  `recomendaciones` text COLLATE utf8_bin,
  `estAtencion` int(11) NOT NULL,
  `condFinal` int(11) NOT NULL,
  `servTerce` text COLLATE utf8_bin,
  `otros` text COLLATE utf8_bin,
  `obsOtros` text COLLATE utf8_bin,
  `usRegistra` int(11) NOT NULL,
  `sgmtoManto` int(11) NOT NULL DEFAULT '0',
  `estAnulado` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `dni` text COLLATE utf8_bin NOT NULL,
  `nombresResp` text COLLATE utf8_bin NOT NULL,
  `apellidosResp` text COLLATE utf8_bin NOT NULL,
  `idOficina` int(11) DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ws_responsables`
--

INSERT INTO `ws_responsables` (`idResponsable`, `dni`, `nombresResp`, `apellidosResp`, `idOficina`, `idServicio`) VALUES
(1, '42162499', 'Edwin William', 'Guerrero Sandoval', 1, 1),
(2, '08633489', 'Violeta', 'Aguirre Arellano', 20, 3),
(3, '08744316', 'Julio Antonio', 'Silva Ramos', 2, 10),
(4, '24710107', 'Juan Martin', 'Nina Caceres', 2, 11),
(5, '06915051', 'Feliciano', 'Portuguez Luyo', 6, 29),
(6, '16019775', 'Zoila Teodolinda', 'Moya Soto', 5, 22),
(7, '09350275', 'Elsa Maribel', 'Salcedo Alfaro De Lorino', 4, 17),
(8, '15597345', 'Maritza Victoria', 'Rodriguez Ramirez', 7, 30),
(9, '10685597', 'Mayra', 'Rengifo Gonzales', 13, 9),
(10, '07647956', 'Javier Lucio', 'Zuñiga Barrios', 9, 5),
(11, '08469701', 'Jorge Vidal', 'Leyva Vilchez', 8, 33),
(12, '43603812', 'Jenny Mayne', 'Espada Camones', 11, 20),
(13, '06030638', 'Epifanio', 'Sanchez Garavito', 14, 16),
(14, '42591784', 'Carlos Martin', 'Tineo Valencia', 12, 32),
(15, '07287291', 'Ponciano Faustino', 'Samaniego Casallo', 3, 15),
(16, '00508608', 'Judith Elizabeth', 'Danz Luque', 29, 18),
(17, '07937673', 'Jorge Emilio', 'Colina Casas', 16, 7),
(18, '08344235', 'Orlando Fortunato', 'Herrera Alania', 15, 23),
(19, '08498700', 'Oscar Orlando', 'Otoya Petit', 26, 21),
(20, '08024773', 'Alejandro Victor', 'Perez Valle', 17, 28),
(21, '41900137', 'Vanessa Karin', 'Perez Rodriguez', 10, 14),
(22, '07024404', 'Hugo Javier', 'Florez Villaverde', 23, 13),
(23, '09264802', 'Zena Alejandrina', 'Villaorduña Martinez', 21, 8),
(24, '40720390', 'Rosa Evelia', 'Chumpen Amaro', 22, 25),
(25, '41906750', 'Jessica Karina', 'Garcia Yacila', 19, 19),
(26, '09512967', 'Zonia Emperatriz', 'Mori Zubiate', 18, 31),
(27, '06846511', 'Roberto', 'Jauregui Santa Cruz', 24, 12),
(28, '40288009', 'Karina Graciela', 'Reyes Reyes De Correa', 27, 26),
(29, '07265839', 'Ana Maria', 'Cotrina Llamocca', 30, 24),
(30, '09757496', 'Julio Cesar', 'Calderon Vivanco', 28, 6),
(31, '29467464', 'Giuliana Margarita', 'Urquizo Salas', 25, 27),
(32, '40195996', 'Monica Nohemi', 'Rosas Sanchez', 1, 4),
(33, '06236191', 'Eduardo Luis', 'Cerro Olivares', 31, 129),
(34, '10000001', 'Sin', 'Responsable', 32, 130);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_segmento`
--

CREATE TABLE `ws_segmento` (
  `idSegmento` int(11) NOT NULL,
  `descSegmento` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `subarea` mediumtext COLLATE utf8_bin NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ws_servicios`
--

INSERT INTO `ws_servicios` (`id_subarea`, `id_area`, `subarea`, `fecha_creacion`) VALUES
(1, 1, 'SOPORTE TECNICO', '2021-05-03 20:09:46'),
(2, 1, 'DIGITACION', '2021-05-03 20:11:34'),
(3, 20, 'JEFATURA', '2021-05-04 14:46:01'),
(4, 1, 'JEFATURA', '2021-05-04 17:45:11'),
(5, 9, 'JEFATURA', '2021-05-04 17:46:34'),
(6, 28, 'JEFATURA', '2021-05-04 17:46:41'),
(7, 16, 'JEFATURA', '2021-05-04 17:46:55'),
(8, 21, 'JEFATURA', '2021-05-04 17:47:08'),
(9, 13, 'JEFATURA', '2021-05-04 17:47:26'),
(10, 2, 'DIRECCION', '2021-05-04 17:47:45'),
(11, 2, 'ADJUNTA', '2021-05-04 17:47:55'),
(12, 24, 'JEFATURA', '2021-05-04 17:48:51'),
(13, 23, 'JEFATURA', '2021-05-04 17:48:59'),
(14, 10, 'JEFATURA', '2021-05-04 17:49:10'),
(15, 3, 'JEFATURA', '2021-05-04 17:49:18'),
(16, 14, 'JEFATURA', '2021-05-04 17:49:34'),
(17, 4, 'JEFATURA', '2021-05-04 17:49:42'),
(18, 29, 'JEFATURA', '2021-05-04 17:49:51'),
(19, 19, 'JEFATURA', '2021-05-04 17:50:24'),
(20, 11, 'JEFATURA', '2021-05-04 17:50:57'),
(21, 26, 'JEFATURA', '2021-05-04 17:51:18'),
(22, 5, 'JEFATURA', '2021-05-04 17:51:25'),
(23, 15, 'JEFATURA', '2021-05-04 17:51:32'),
(24, 30, 'JEFATURA', '2021-05-04 17:51:39'),
(25, 22, 'JEFATURA', '2021-05-04 17:51:47'),
(26, 27, 'JEFATURA', '2021-05-04 17:51:55'),
(27, 25, 'JEFATURA', '2021-05-04 17:52:16'),
(28, 17, 'JEFATURA', '2021-05-04 17:52:27'),
(29, 6, 'JEFATURA', '2021-05-04 17:53:20'),
(30, 7, 'JEFATURA', '2021-05-04 17:53:28'),
(31, 18, 'JEFATURA', '2021-05-04 17:53:36'),
(32, 12, 'JEFATURA', '2021-05-04 17:53:49'),
(33, 8, 'JEFATURA', '2021-05-04 17:54:04'),
(34, 2, 'ADMINISTRATIVA', '2021-05-05 19:01:37'),
(35, 2, 'SECRETARIA', '2021-05-05 19:01:48'),
(36, 2, 'SUB DIRECCION', '2021-05-05 19:01:59'),
(37, 2, 'TRAMITE DOCUMENTARIO', '2021-05-05 19:02:14'),
(38, 28, 'SALA DE OPERACIONES', '2021-05-05 19:04:37'),
(39, 3, 'SECRETARIA', '2021-05-05 19:06:14'),
(40, 23, 'SECRETARIA', '2021-05-05 19:09:12'),
(41, 23, 'SALA DE LECTURA', '2021-05-05 19:09:40'),
(42, 14, 'SECRETARIA', '2021-05-05 19:10:02'),
(43, 4, 'CAJA', '2021-05-05 19:10:13'),
(44, 4, 'CAJA EMERGENCIA', '2021-05-05 19:10:21'),
(45, 4, 'CONCILIACION', '2021-05-05 19:10:33'),
(46, 4, 'CONTROL PREVIO', '2021-05-05 19:10:43'),
(47, 4, 'CUENTAS CORRIENTES', '2021-05-05 19:10:53'),
(48, 4, 'INTEGRACION CONTABLE', '2021-05-05 19:11:08'),
(49, 4, 'PRESUPUESTO', '2021-05-05 19:11:18'),
(50, 4, 'TESORERIA', '2021-05-05 19:11:27'),
(51, 4, 'TRIBUTACION', '2021-05-05 19:11:38'),
(52, 29, 'OBSERVACION', '2021-05-05 19:12:49'),
(53, 29, 'ADMISION 1', '2021-05-05 19:13:58'),
(54, 29, 'ADMISION 2', '2021-05-05 19:14:07'),
(55, 29, 'COE', '2021-05-05 19:14:16'),
(56, 29, 'SHOCK TRAUMA', '2021-05-05 19:14:35'),
(57, 29, 'UCI', '2021-05-05 19:14:41'),
(58, 21, 'SECRETARIA', '2021-05-05 19:15:15'),
(59, 21, 'CRED', '2021-05-05 19:15:21'),
(60, 21, 'VACUNACION', '2021-05-05 19:15:29'),
(61, 10, 'ENFERMERIA', '2021-05-05 19:23:05'),
(62, 10, 'INTELIGENCIA SANITARIA', '2021-05-05 19:23:15'),
(63, 10, 'SECRETARIA', '2021-05-05 19:23:33'),
(64, 10, 'VIGILANCIA EPIDEMIOLOGICA', '2021-05-05 19:23:47'),
(65, 1, 'SALA DE SERVIDORES', '2021-05-05 19:24:14'),
(66, 1, 'INFORMATICA', '2021-05-05 19:24:21'),
(67, 19, 'ALMACEN', '2021-05-05 19:24:48'),
(68, 19, 'DISPENSACION', '2021-05-05 19:24:56'),
(69, 19, 'SECRETARIA', '2021-05-05 19:25:04'),
(70, 19, 'EMERGENCIA', '2021-05-05 19:25:11'),
(71, 19, 'SALA DE OPERACIONES', '2021-05-05 19:25:21'),
(72, 19, 'DOSIS UNITARIA', '2021-05-05 19:25:32'),
(73, 11, 'SECRETARIA', '2021-05-05 19:25:55'),
(74, 26, 'ARO 1', '2021-05-05 19:26:13'),
(75, 26, 'ARO 2', '2021-05-05 19:26:21'),
(76, 26, 'EMERGENCIA', '2021-05-05 19:26:38'),
(77, 26, 'MONITOREO FETAL', '2021-05-05 19:26:53'),
(78, 26, 'SECRETARIA', '2021-05-05 19:27:03'),
(79, 26, 'STAR MEDICOS', '2021-05-05 19:27:10'),
(80, 25, 'BANCO DE SANGRE', '2021-05-05 19:31:23'),
(81, 25, 'LAB EMERGENCIA', '2021-05-05 19:31:35'),
(82, 25, 'INMUNOLOGIA', '2021-05-05 19:31:44'),
(83, 25, 'LAB TBC', '2021-05-05 19:31:53'),
(84, 25, 'MICROBIOLOGIA', '2021-05-05 19:32:05'),
(85, 25, 'NECROPSIAS', '2021-05-05 19:32:32'),
(86, 25, 'PATOLOGIA', '2021-05-05 19:32:42'),
(87, 25, 'TOMA DE MUESTRA', '2021-05-05 19:32:50'),
(88, 5, 'ALMACEN', '2021-05-05 19:33:25'),
(89, 5, 'COMPRAS', '2021-05-05 19:33:31'),
(90, 5, 'INFORMACION', '2021-05-05 19:33:40'),
(91, 5, 'PATRIMONIO', '2021-05-05 19:33:47'),
(92, 5, 'PROGRAMACION', '2021-05-05 19:33:55'),
(93, 15, 'NEUMOLOGIA', '2021-05-05 19:34:27'),
(94, 15, 'PROCETSS', '2021-05-05 19:34:45'),
(95, 15, 'SECRETARIA', '2021-05-05 19:34:54'),
(96, 15, 'TBC', '2021-05-05 19:35:02'),
(97, 22, 'HOSPITALIZACION', '2021-05-05 19:35:18'),
(98, 22, 'SECRETARIA', '2021-05-05 19:35:26'),
(99, 27, 'SECRETARIA', '2021-05-05 19:35:42'),
(100, 17, 'NEONATOLOGIA', '2021-05-05 19:36:04'),
(101, 17, 'SECRETARIA', '2021-05-05 19:36:11'),
(102, 6, 'BENEFICIO Y PENSIONES', '2021-05-05 19:37:09'),
(103, 6, 'BIENESTAR', '2021-05-05 19:37:18'),
(104, 6, 'CONTROL', '2021-05-05 19:37:25'),
(105, 6, 'LEGAJOS', '2021-05-05 19:37:31'),
(106, 6, 'REMUNERACIONES', '2021-05-05 19:37:42'),
(107, 6, 'SECRETARIA', '2021-05-05 19:37:50'),
(108, 6, 'SECRETARIA TECNICA', '2021-05-05 19:38:04'),
(109, 7, 'PRESUPUESTO', '2021-05-05 19:38:37'),
(110, 7, 'PROYECTOS', '2021-05-05 19:38:43'),
(111, 7, 'PPR', '2021-05-05 19:38:59'),
(112, 18, 'CONSULTORIOS', '2021-05-05 19:39:21'),
(113, 18, 'SECRETARIA', '2021-05-05 19:39:30'),
(114, 30, 'SECRETARIA', '2021-05-05 19:39:55'),
(115, 12, 'DIGITACION', '2021-05-05 19:40:13'),
(116, 12, 'SECRETARIA', '2021-05-05 19:40:41'),
(117, 12, 'AUDITORES', '2021-05-05 19:40:49'),
(118, 12, 'EMERGENCIA', '2021-05-05 19:40:57'),
(119, 20, 'CODIFICACION', '2021-05-05 19:41:27'),
(120, 20, 'ASISTENTA', '2021-05-05 19:41:43'),
(121, 20, 'TBC', '2021-05-05 19:41:52'),
(122, 20, 'EMERGENCIA', '2021-05-05 19:42:01'),
(123, 8, 'RESIDUOS SOLIDOS', '2021-05-05 19:42:15'),
(124, 8, 'LAVANDERIA', '2021-05-05 19:42:23'),
(125, 8, 'MANTENIMIENTO', '2021-05-05 19:42:40'),
(126, 8, 'SECRETARIA', '2021-05-05 19:42:58'),
(127, 8, 'VIGILANCIA', '2021-05-05 19:43:10'),
(128, 28, 'CENTRAL DE ESTERILIZACION', '2021-05-05 19:48:22'),
(129, 31, 'JEFATURA', '2021-05-07 16:01:21'),
(130, 32, 'SIN UBICACION', '2021-05-07 16:22:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_situacion`
--

CREATE TABLE `ws_situacion` (
  `idSituacion` int(11) NOT NULL,
  `situacion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `tipoTrabajo` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `dni` varchar(8) COLLATE utf8_bin NOT NULL,
  `nombres` text COLLATE utf8_bin NOT NULL,
  `apellido_paterno` text COLLATE utf8_bin NOT NULL,
  `apellido_materno` text COLLATE utf8_bin NOT NULL,
  `cuenta` text COLLATE utf8_bin NOT NULL,
  `clave` text COLLATE utf8_bin NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '0',
  `nintentos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ws_usuarios`
--

INSERT INTO `ws_usuarios` (`id_usuario`, `id_perfil`, `dni`, `nombres`, `apellido_paterno`, `apellido_materno`, `cuenta`, `clave`, `fecha_registro`, `estado`, `nintentos`) VALUES
(1, 1, '77478995', 'Olger Ivan', 'Castro', 'Palacios', 'ocastrop', '$2a$07$usesomesillystringforeVF6hLwtgsUBAmUN4cGEd8tYF74gSHRW', '2020-03-02 16:22:25', 1, 0),
(2, 2, '40195996', 'Monica Nohemi', 'Rosas', 'Sanchez', 'rosasmn', '$2a$07$usesomesillystringforeoRNSqF5ebwOJ.HFIcVhNJ65bww3hpNi', '2021-03-11 15:46:33', 0, 0),
(3, 2, '09966920', 'Javier Octavio', 'Sernaque', 'Quintana', 'jsernaqueq', '$2a$07$usesomesillystringforeAR0AYDLcMUwZJGc02Ta3T98Pn6LH7pi', '2021-03-11 15:48:50', 0, 0),
(4, 3, '42162499', 'Edwin William', 'Guerrero', 'Sandoval', 'wguerreros', '$2a$07$usesomesillystringforeLTVm.b0q8aUqKwOyqhotBMNXub2QEkq', '2021-03-11 15:52:31', 1, 1),
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
  `accExec` mediumtext COLLATE utf8_bin NOT NULL,
  `fecha_audi` date NOT NULL,
  `dateInstant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_z_auditoria_reposiciones`
--

CREATE TABLE `ws_z_auditoria_reposiciones` (
  `idAudRepo` int(11) NOT NULL,
  `idDoc` int(11) NOT NULL,
  `usExec` int(11) NOT NULL,
  `accExec` mediumtext COLLATE utf8_bin NOT NULL,
  `fecha_audi` date NOT NULL,
  `dateInstant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  MODIFY `idAccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_categorias`
--
ALTER TABLE `ws_categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ws_departamentos`
--
ALTER TABLE `ws_departamentos`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `ws_diagnosticos`
--
ALTER TABLE `ws_diagnosticos`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_equipos`
--
ALTER TABLE `ws_equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;

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
  MODIFY `idResponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `ws_segmento`
--
ALTER TABLE `ws_segmento`
  MODIFY `idSegmento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_servicios`
--
ALTER TABLE `ws_servicios`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

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
