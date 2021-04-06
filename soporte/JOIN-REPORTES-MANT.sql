/* COMPUTADORAS, LAPTOPS Y SERVIDORES */
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,placa,procesador,vprocesador,ram,discoDuro,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,descInc,diagnosticos,primera_eval,fInicio,fFin,tipTrabajo,tipoTrabajo,acciones,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
inner join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_pc
where idMantenimiento = 6;




/* redes */
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,puertos,capa,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,descInc,diagnosticos,primera_eval,fInicio,fFin,tipTrabajo,tipoTrabajo,acciones,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
inner join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_eqred
where idMantenimiento = 4;


/* PERFERICOS E IMPRESORAS 'Ivan Victor Chuquicaña Fernandez' */
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,nro_eq,ip,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,descInc,diagnosticos,primera_eval,fInicio,fFin,tipTrabajo,tipoTrabajo,acciones,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
inner join ws_integraciones as fintMant on fmant.idEquip = fintMant.serie_imp
where idMantenimiento = 5;


/* PARA EL RESTO 'Edwin William Guerrero Sandoval';*/
select idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,sbn,marca,modelo,oficEquip,area,oficEquip,subarea,uResponsable,concat(nombresResp," ",apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres," ",apellido_paterno," ",apellido_materno) as tecnico,descInc,diagnosticos,primera_eval,fInicio,fFin,tipTrabajo,tipoTrabajo,acciones,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
where idMantenimiento = 7;