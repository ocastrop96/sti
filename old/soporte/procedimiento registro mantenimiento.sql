DELIMITER $$
CREATE PROCEDURE REGISTRAR_MANTENIMIENTO(
IN _fRegistroMant date,
IN _tipEquipo int(11),
IN _condInicial int(11),
IN _idEquip int(11),
IN _oficEquip int(11),
IN _areaEquip int(11),
IN _respoEquip int(11),
IN _logdeta text,
IN _descInc text,
IN _diagnostico1 int(11),
IN _diagnostico2 int(11),
IN _diagnostico3 int(11),
IN _diagnostico4 int(11),
IN _diagnostico5 int(11),
IN _diagnostico6 int(11),
IN _diagnostico7 int(11),
IN _diagnostico8 int(11),
IN _tecEvalua int(11),
IN _fEvalua date,
IN _primera_eval text,
IN _fInicio date,
IN _fFin date,
IN _tipTrabajo int(11),
IN _accion1 int(11),
IN _accion2 int(11),
IN _accion3 int(11),
IN _accion4 int(11),
IN _accion5 int(11),
IN _accion6 int(11),
IN _accion7 int(11),
IN _accion8 int(11),
IN _recomendaciones text,
IN _estAtencion int(11),
IN _condFinal int(11),
IN _servTerce text,
IN _otros text,
IN _obsOtros text,
IN _usRegistra int(11),
IN _sgmtoManto int(11))
BEGIN
INSERT INTO ws_mantenimientos(fRegistroMant,tipEquipo,condInicial,idEquip,oficEquip,areaEquip,respoEquip,logdeta,descInc,diagnostico1,diagnostico2,diagnostico3,diagnostico4,diagnostico5,diagnostico6,diagnostico7,diagnostico8,tecEvalua,fEvalua,primera_eval,fInicio,fFin,tipTrabajo,accion1,accion2,accion3,accion4,accion5,accion6,accion7,accion8,recomendaciones,estAtencion,condFinal,servTerce,otros,obsOtros,usRegistra,sgmtoManto) VALUES(_fRegistroMant,_tipEquipo,_condInicial,_idEquip,_oficEquip,_areaEquip,_respoEquip,_logdeta,_descInc,_diagnostico1,_diagnostico2,_diagnostico3,_diagnostico4,_diagnostico5,_diagnostico6,_diagnostico7,_diagnostico8,_tecEvalua,_fEvalua,_primera_eval,_fInicio,_fFin,_tipTrabajo,_accion1,_accion2,_accion3,_accion4,_accion5,_accion6,_accion7,_accion8,_recomendaciones,_estAtencion,_condFinal,_servTerce,_otros,_obsOtros,_usRegistra,_sgmtoManto);
END;



CALL REGISTRAR_MANTENIMIENTO`(<{IN _fRegistroMant date}>, <{IN _tipEquipo int(11)}>, <{IN _condInicial int(11)}>, <{IN _idEquip int(11)}>, <{IN _oficEquip int(11)}>, <{IN _areaEquip int(11)}>, <{IN _respoEquip int(11)}>, <{IN _logdeta text}>, <{IN _descInc text}>, <{IN _diagnostico1 int(11)}>, <{IN _diagnostico2 int(11)}>, <{IN _diagnostico3 int(11)}>, <{IN _diagnostico4 int(11)}>, <{IN _diagnostico5 int(11)}>, <{IN _diagnostico6 int(11)}>, <{IN _diagnostico7 int(11)}>, <{IN _diagnostico8 int(11)}>, <{IN _tecEvalua int(11)}>, <{IN _fEvalua date}>, <{IN _primera_eval text}>, <{IN _fInicio date}>, <{IN _fFin date}>, <{IN _tipTrabajo int(11)}>, <{IN _accion1 int(11)}>, <{IN _accion2 int(11)}>, <{IN _accion3 int(11)}>, <{IN _accion4 int(11)}>, <{IN _accion5 int(11)}>, <{IN _accion6 int(11)}>, <{IN _accion7 int(11)}>, <{IN _accion8 int(11)}>, <{IN _recomendaciones text}>, <{IN _estAtencion int(11)}>, <{IN _condFinal int(11)}>, <{IN _servTerce text}>, <{IN _otros text}>, <{IN _obsOtros text}>, <{IN _usRegistra int(11)}>, <{IN _sgmtoManto int(11)}>);
