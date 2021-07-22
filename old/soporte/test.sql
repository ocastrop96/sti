DELIMITER $$
CREATE PROCEDURE REGISTRAR_INTEGRACIONC(
IN _nro_eq TEXT,
IN _ip TEXT,
IN _serie_pc int(11),
IN _serie_monitor int(11),
IN _serie_teclado int(11),
IN _serie_EstAcu int(11),
IN _fecha_registro date,
IN _tipo_equipo int(11),
IN _responsable int(11),
IN _oficina_in int(11),
IN _servicio_in int(11),
IN _estado int(11),
IN _condicion int(11)
)
BEGIN
INSERT INTO ws_integraciones(nro_eq,ip,serie_pc,serie_monitor,serie_teclado,serie_EstAcu,fecha_registro,tipo_equipo,responsable,oficina_in,servicio_in,estado,condicion) VALUES (_nro_eq,_ip ,_serie_pc,_serie_monitor,_serie_teclado,_serie_EstAcu,_fecha_registro,_tipo_equipo,_responsable,_oficina_in,_servicio_in,_estado,_condicion);
END;

CALL REGISTRAR_INTEGRACIONC('PC-00025', 'TEST', 18, 28, 29, 23, '2021-02-19',1, 6, 13, 17, 1, 1);
CALL `sti-web`.`REGISTRAR_INTEGRACIONC`('PC-00025', '172.16.40.50', 18, 28, 29	, 23, '2021-02-19',1, 6, 13, 17, 1, 1);

