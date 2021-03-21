SELECT * FROM `db-reclamos-web`.lr_tab_reclamo order by correlativo desc;

SELECT * FROM `db-reclamos-web`.lr_tab_reclamo order by correlativo desc;


SELECT * FROM lr_tab_reclamo WHERE YEAR(fechaReclamo) = "2021" order by correlativo desc;

select correlativo,fechaReclamo,desctipoDoc,nDocUsuario,nombUsuario,apePatUsuario,apeMatUsuario,descsexoUsuario,emailUsuario,telUsuario,descDepartamento,descProvincia,descDistrito,domUsuario,desctipoUsuario,desc_causaGeneral,desc_causaEspecifica,detalleReclamo,fecha_registro from lr_tab_reclamo as ltrec 
inner join lr_tab_tipo_doc as t1u on ltrec.idTipoDocUsuario = t1u.idtipoDoc
inner join lr_tab_sexo_usuario as s1u on ltrec.idSexUsuario = s1u.idsexoUsuario
inner join lr_tab_departamento as d1u on ltrec.idDepa = d1u.idDepa
inner join lr_tab_provincia as p1u on ltrec.idProv = p1u.idProv
inner join lr_tab_distrito as dt1u on ltrec.idDist = dt1u.idDist
inner join lr_tab_tipo_usuario as tu1u on ltrec.idTipUsuario = tu1u.idtipoUsuario
inner join lr_tab_causa_general as cg1u on ltrec.idcausaGeneral = cg1u.id_causaGeneral
inner join lr_tab_causa_especifica as ce1u on ltrec.idcausaEspecifica = ce1u.id_causaEspecifica
WHERE YEAR(fechaReclamo) = "2021" order by correlativo desc; 















SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,respon.nombresResp as nombRes,respon.apellidosResp as apellRes,oficina_in,dept.area as departamento,servicio_in,serv.subarea as servicio,imp.idEquipo as idimp,imp.serie as serieimp,imp.sbn as sbnimp,imp.marca as marcaimp,imp.modelo as modeloimp,imp.descripcion as descripcionimp,imp.ordenCompra as Ordenimp,date_format(imp.fechaCompra,'%d-%m-%Y') as fcompraimp,estado,descEstado,siteq.idSituacion as condicionPC,situacion FROM ws_integraciones as integra 
inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
inner join ws_equipos as imp on integra.serie_imp = imp.idEquipo
inner join ws_estado as esteq on integra.estado = esteq.idEstado
inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
inner join ws_responsables as respon on integra.responsable = respon.idResponsable
inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
WHERE segmento = 3 and estadoAnu = 0 order by correlativo_integracion desc;