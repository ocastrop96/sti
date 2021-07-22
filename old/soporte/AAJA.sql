SELECT idEquipo,serie,nro_eq FROM ws_equipos eq 
inner join ws_integraciones as inte 
on eq.idEquipo = inte.serie_pc
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_eqred = eq.idEquipo AND idTipo = _idTipo);

DELIMITER $$
CREATE PROCEDURE `LISTAR_EQUPOSOTROS`(
in _idTipo int(11))
BEGIN
select idEquipo,serie from ws_equipos where idTipo = _idTipo;
END;

SELECT idEquipo,serie FROM ws_equipos eq 
	WHERE EXISTS (SELECT NULL
	FROM ws_integraciones epc
	WHERE epc.serie_pc = eq.idEquipo AND idTipo = 2);
    
    CALL `sti-web`.`LISTAR_SERIESIMP`();
    CALL `sti-web`.`LISTAR_EQUPOSOTROS`(12);
