/*LISTAR SERIES DE LAPTOP O SERVIDOR*/
SELECT * FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND eq.idTipo = 4;

DELIMITER $$
CREATE PROCEDURE LISTAR_SERIESLAPSERV()
BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND eq.idTipo = 4;
END;
CALL `sti-web`.`LISTAR_SERIESLAPSERV`();


/*LISTAR SERIES DE PC DISPONIBLES*/
SELECT * FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND eq.idTipo = 1;

DELIMITER $$
CREATE PROCEDURE LISTAR_SERIESPC()
BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND eq.idTipo = 1 AND idEquipo = 20;
END;
CALL `sti-web`.`LISTAR_SERIESPC`();

/*LISTAR DATOS DE PC SERIE*/
SELECT * FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_pc = eq.idEquipo) AND eq.idTipo = 1 AND idEquipo = 20;

/*LISTAR SERIES DE MONITORES DISPONIBLES*/
SELECT * FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_monitor = eq.idEquipo) AND eq.idTipo = 10;

DELIMITER $$
CREATE PROCEDURE LISTAR_SERIESMON()
BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_monitor = eq.idEquipo) AND eq.idTipo = 10;
END;
CALL `sti-web`.`LISTAR_SERIESMON`();

/*LISTAR SERIES DE TECLADOS DISPONIBLES*/
SELECT * FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_teclado = eq.idEquipo) AND eq.idTipo = 11;

DELIMITER $$
CREATE PROCEDURE LISTAR_SERIESTEC()
BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_teclado = eq.idEquipo) AND eq.idTipo = 11;
END;
CALL `sti-web`.`LISTAR_SERIESTEC`();


/*LISTAR SERIES DE FUENTES Y ESTABILIZADORES*/
SELECT * FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_EstAcu = eq.idEquipo) AND eq.idTipo = 12 or eq.idTipo = 13 ;

DELIMITER $$
CREATE PROCEDURE LISTAR_SERIESENER()
BEGIN
SELECT idEquipo,serie FROM ws_equipos eq
WHERE NOT EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_EstAcu = eq.idEquipo) AND eq.idTipo = 12 or eq.idTipo = 13 ;
END;
CALL `sti-web`.`LISTAR_SERIESENER`();