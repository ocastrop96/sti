SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND eq.idTipo = 1;


SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_eqred = eq.idEquipo) AND eq.tipSegmento = 2;

DELIMITER $$
CREATE PROCEDURE LISTAR_SERIESRED()
BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_eqred = eq.idEquipo) AND eq.tipSegmento = 2;
END


select * from ws_equipos where tipSegmento = 2;