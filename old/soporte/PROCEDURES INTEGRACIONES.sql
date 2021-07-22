SELECT * FROM `sti-web`.ws_integraciones;

DELIMITER $$
CREATE PROCEDURE REGISTRAR_INTEGRACIONC1(
IN _nro_eq TEXT,
IN _ip TEXT,
IN _serie_pc int(11),
IN _fecha_registro date,
IN _tipo_equipo int(11),
IN _responsable int(11),
IN _oficina_in int(11),
IN _servicio_in int(11),
IN _estado int(11),
IN _condicion int(11))
BEGIN
INSERT INTO ws_integraciones(nro_eq,ip,serie_pc,fecha_registro,tipo_equipo,responsable,oficina_in,servicio_in,estado,condicion) VALUES (_nro_eq,_ip ,_serie_pc,_fecha_registro,_tipo_equipo,_responsable,_oficina_in,_servicio_in,_estado,_condicion);
END;

DELIMITER $$
CREATE PROCEDURE EDITAR_INTEGRACIONC(
IN _idIntegracion int(11),
IN _nro_eq TEXT,
IN _ip TEXT,
IN _serie_pc int(11),
IN _serie_monitor int(11),
IN _serie_teclado int(11),
IN _serie_EstAcu int(11),
IN _tipo_equipo int(11),
IN _responsable int(11),
IN _oficina_in int(11),
IN _servicio_in int(11),
IN _estado int(11),
IN _condicion int(11))
BEGIN
UPDATE ws_integraciones SET nro_eq = _nro_eq,ip = _ip,serie_pc = _serie_pc,serie_monitor = _serie_monitor,serie_teclado = _serie_teclado, serie_EstAcu = _serie_EstAcu,tipo_equipo = _tipo_equipo,responsable = _responsable, oficina_in = _oficina_in,servicio_in = _servicio_in,estado = _estado,condicion = _condicion WHERE idIntegracion = _idIntegracion;
END;

DELIMITER $$
CREATE PROCEDURE EDITAR_INTEGRACIONC1(
IN _idIntegracion int(11),
IN _nro_eq TEXT,
IN _ip TEXT,
IN _serie_pc int(11),
IN _tipo_equipo int(11),
IN _responsable int(11),
IN _oficina_in int(11),
IN _servicio_in int(11),
IN _estado int(11),
IN _condicion int(11))
BEGIN
UPDATE ws_integraciones SET nro_eq = _nro_eq,ip = _ip,serie_pc = _serie_pc,tipo_equipo = _tipo_equipo,responsable = _responsable, oficina_in = _oficina_in,servicio_in = _servicio_in,estado = _estado,condicion = _condicion WHERE idIntegracion = _idIntegracion;
END;

