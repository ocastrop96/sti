DELIMITER $$
CREATE PROCEDURE `ELIMINAR_IMPRESORA_PERIFERICOS`(
IN _idEquipo int(11),
IN _idTipo int(11),
OUT nExistencia int(11)
)
BEGIN
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
END;



CALL `sti-web`.`ELIMINAR_IMPRESORA_PERIFERICOS`(64,16,@val);
