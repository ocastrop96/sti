/* CONSULTA PARA ANULAR FICHAS TECNICAS */
DELIMITER $$
CREATE PROCEDURE ANULAR_INTEGRACION( IN _idIntegracion int(11))
BEGIN
UPDATE ws_integraciones SET nro_eq = null, ip = null,serie_pc = null, serie_monitor = null, serie_teclado = null,serie_EstAcu = null,tipo_equipo = null,responsable = null, oficina_in = null,servicio_in = null, estado = null, condicion = null, estadoAnu = 1 WHERE idIntegracion = _idIntegracion;
END;
/* CONSULTA PARA ANULAR FICHAS TECNICAS */