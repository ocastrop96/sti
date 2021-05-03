SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_eqred
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_eqred = eqp.idEquipo);


/*idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion */

SELECT idEquipo,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,nro_eq,serie,sbn,ip,marca,modelo,descripcion FROM ws_equipos eqp
inner join ws_integraciones as inteR on eqp.idEquipo = inteR.serie_imp
inner join ws_responsables as ures on eqp.uResponsable = ures.idResponsable
inner join ws_departamentos as deq on eqp.office = deq.id_area
inner join ws_servicios as sreq on eqp.service = sreq.id_subarea
WHERE EXISTS (SELECT NULL
FROM ws_integraciones epc
WHERE epc.serie_imp = eqp.idEquipo) and idEquipo = 88;