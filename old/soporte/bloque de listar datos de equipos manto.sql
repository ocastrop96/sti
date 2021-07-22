/*LISTAR DATOS DE EQUIPOS OTROS */
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,marca,modelo,descripcion FROM ws_equipos  as eqm 
inner join ws_responsables as erm on eqm.uResponsable = erm.idResponsable
inner join ws_departamentos as edm on eqm.office = edm.id_area
inner join ws_servicios as esm on eqm.service = esm.id_subarea
where idEquipo = 55;
DELIMITER $$
CREATE PROCEDURE LISTAR_DATOS_EQOTROS(
in _idEquipo int(11)
)
BEGIN
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,serie,modelo,descripcion FROM ws_equipos  as eqm 
inner join ws_responsables as erm on eqm.uResponsable = erm.idResponsable
inner join ws_departamentos as edm on eqm.office = edm.id_area
inner join ws_servicios as esm on eqm.service = esm.id_subarea
where idEquipo = _idEquipo;
END;
CALL `sti-web`.`LISTAR_DATOS_EQOTROS`(55);

/*LISTAR DATOS DE EQUIPOS OTROS */
/*LISTAR DATOS DE EQUIPOS COMPUTO */
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eq 
inner join ws_integraciones as eint on eq.idEquipo = eint.serie_pc
inner join ws_responsables as eure on eq.uResponsable = eure.idResponsable
inner join ws_departamentos as edep on eq.office = edep.id_area
inner join ws_servicios as eserv on eq.service = eserv.id_subarea
WHERE EXISTS (SELECT NULL FROM ws_integraciones epc WHERE epc.serie_pc = eq.idEquipo) and idEquipo = 76;

DELIMITER $$
CREATE PROCEDURE LISTAR_DATOS_EQCOMPUTO(
in _idEquipo int(11)
)
BEGIN
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eq 
inner join ws_integraciones as eint on eq.idEquipo = eint.serie_pc
inner join ws_responsables as eure on eq.uResponsable = eure.idResponsable
inner join ws_departamentos as edep on eq.office = edep.id_area
inner join ws_servicios as eserv on eq.service = eserv.id_subarea
WHERE EXISTS (SELECT NULL FROM ws_integraciones epc WHERE epc.serie_pc = eq.idEquipo) and idEquipo = _idEquipo;
END;

CALL LISTAR_DATOS_EQCOMPUTO(76);

/*LISTAR DATOS DE EQUIPOS COMPUTO */
/*LISTAR DATOS DE EQUIPOS DE REDES */
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_eqred
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_eqred = eqp.idEquipo) and idEquipo = 58;


DELIMITER $$
CREATE PROCEDURE LISTAR_DATOS_EQREDES(
in _idEquipo int(11)
)
BEGIN
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_eqred
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_eqred = eqp.idEquipo) and idEquipo = _idEquipo;
END;

CALL LISTAR_DATOS_EQREDES(58);
/*LISTAR DATOS DE EQUIPOS DE REDES */
/*LISTAR DATOS DE EQUIPOS DE IMPRESORA Y OTROS */
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_imp
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_imp = eqp.idEquipo) and idEquipo = 88;


DELIMITER $$
CREATE PROCEDURE LISTAR_DATOS_EQIMP_OTROS(
in _idEquipo int(11)
)
BEGIN
SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_imp
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_imp = eqp.idEquipo) and idEquipo = _idEquipo;
END;

CALL LISTAR_DATOS_EQIMP_OTROS(88);
/*LISTAR DATOS DE EQUIPOS DE IMPRESORA Y OTROS */


