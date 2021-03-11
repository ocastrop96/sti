CALL `sti-web`.`LISTAR_INTEGRACIONC`();
SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,respon.nombresResp as nombRes,respon.apellidosResp as apellRes,oficina_in,dept.area as departamento,servicio_in,serv.subarea as servicio,pc.idEquipo as idPc,pc.serie as seriepc,pc.sbn as sbnpc,pc.marca as marcapc,pc.modelo as modelopc,pc.descripcion as descripcionpc,pc.ordenCompra as Ordenpc,date_format(pc.fechaCompra,'%d-%m-%Y') as fcomprapc,pc.garantia as garantiapc,pc.placa as placapc,pc.procesador as procesadorpc,pc.vprocesador as vprocesadorpc,pc.ram as rampc,pc.discoDuro as ddpc,estado,descEstado,siteq.idSituacion as condicionPC,situacion,serie_monitor,mon.serie as seriemon,mon.sbn as sbnmon,mon.marca as marcamon,mon.modelo as modelomon,mon.descripcion as descripcionmon,serie_teclado, tecl.serie as serietec, tecl.sbn as sbntec,tecl.marca as marcatec,tecl.modelo as modelotec,tecl.descripcion as descripciontec,serie_EstAcu,energia.serie as serieAcu,energia.sbn as sbnAcu,energia.marca as marcaAcu,energia.modelo as modeloAcu,energia.descripcion as descripcionAcu FROM ws_integraciones as integra 
            inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
            inner join ws_equipos as pc on integra.serie_pc = pc.idEquipo
            inner join ws_estado as esteq on integra.estado = esteq.idEstado
            inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
            inner join ws_equipos as mon on integra.serie_monitor = mon.idEquipo
            inner join ws_equipos as tecl on integra.serie_teclado = tecl.idEquipo
            inner join ws_equipos as energia on integra.serie_EstAcu = energia.idEquipo
            inner join ws_responsables as respon on integra.responsable = respon.idResponsable
            inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
            inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
            WHERE segmento = 1;