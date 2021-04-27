<?php
require_once "ConnectPDO.php";

class ModeloMantenimientos
{
    static public function mdlListarFichasMant($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idMantenimiento,fEvalua,fInicio,fFin,descSegmento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,oficEquip,area,areaEquip,subarea,uResponsable,concat(nombresResp,' ',apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(ftec.nombres,' ',ftec.apellido_paterno,' ',ftec.apellido_materno) as tecnico,tecResp,concat(ftec2.nombres,' ',ftec2.apellido_paterno,' ',ftec2.apellido_materno) as tecresponsable,descInc,diagnostico1,fdiag1.diagnostico as d1,diagnostico2,fdiag2.diagnostico as d2,diagnostico3,fdiag3.diagnostico as d3,diagnostico4,fdiag4.diagnostico as d4,diagnostico5,fdiag5.diagnostico as d5,diagnostico6,fdiag6.diagnostico as d6,diagnostico7,fdiag7.diagnostico as d7,diagnostico8,fdiag8.diagnostico as d8,primera_eval,date_format(fInicio,'%d/%m/%Y') as fInic,date_format(fFin,'%d/%m/%Y') as fFinE,tipTrabajo,tipoTrabajo,accion1,facc1.accionrealizada as a1,accion2,facc2.accionrealizada as a2,accion3,facc3.accionrealizada as a3,accion4,facc4.accionrealizada as a4,accion5,facc5.accionrealizada as a5,accion6,facc6.accionrealizada as a6,accion7,facc7.accionrealizada as a7,accion8,facc8.accionrealizada as a8,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
            inner join ws_categorias as fcat on fmant.tipEquipo = fcat.idCategoria
            inner join ws_segmento as eseg on fmant.sgmtoManto = eseg.idSegmento
            inner join ws_situacion as fsitu on fmant.condInicial = fsitu.idSituacion
            inner join ws_equipos as fequip on fmant.idEquip = fequip.idEquipo
            inner join ws_departamentos as fdept on fmant.oficEquip = fdept.id_area
            inner join ws_servicios as fserv on fmant.areaEquip = fserv.id_subarea
            inner join ws_responsables as fresp on fmant.respoEquip = fresp.idResponsable
            inner join ws_usuarios as ftec on fmant.tecEvalua = ftec.id_usuario
            inner join ws_usuarios as ftec2 on fmant.tecResp = ftec2.id_usuario
            inner join ws_estadoatencion as festat on fmant.estAtencion = festat.idEstAte
            inner join ws_situacion as fsitu2 on fmant.condFinal = fsitu2.idSituacion
            inner join ws_estadosdoc as festdoc on fmant.estAnulado = festdoc.idEstaDoc
            inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo
            inner join ws_diagnosticos as fdiag1 on fmant.diagnostico1 = fdiag1.idDiagnostico
            left join ws_diagnosticos as fdiag2 on fmant.diagnostico2 = fdiag2.idDiagnostico
            left join ws_diagnosticos as fdiag3 on fmant.diagnostico3 = fdiag3.idDiagnostico
            left join ws_diagnosticos as fdiag4 on fmant.diagnostico4 = fdiag4.idDiagnostico
            left join ws_diagnosticos as fdiag5 on fmant.diagnostico5 = fdiag5.idDiagnostico
            left join ws_diagnosticos as fdiag6 on fmant.diagnostico6 = fdiag6.idDiagnostico
            left join ws_diagnosticos as fdiag7 on fmant.diagnostico7 = fdiag7.idDiagnostico
            left join ws_diagnosticos as fdiag8 on fmant.diagnostico8 = fdiag8.idDiagnostico
            inner join ws_acciones as facc1 on fmant.accion1 = facc1.idAccion
            left join ws_acciones as facc2 on fmant.accion2 = facc2.idAccion
            left join ws_acciones as facc3 on fmant.accion3 = facc3.idAccion
            left join ws_acciones as facc4 on fmant.accion4 = facc4.idAccion
            left join ws_acciones as facc5 on fmant.accion5 = facc5.idAccion
            left join ws_acciones as facc6 on fmant.accion6 = facc6.idAccion
            left join ws_acciones as facc7 on fmant.accion7 = facc7.idAccion
            left join ws_acciones as facc8 on fmant.accion8 = facc8.idAccion
            WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_FICHAS_MANTO()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }
    static public function mdlListarDatosEqOtros($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_DATOS_EQOTROS(:idEquipo)");
        $stmt->bindParam(":idEquipo", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }
    static public function mdlListarDatosEqComputo($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_DATOS_EQCOMPUTO(:idEquipo)");
        $stmt->bindParam(":idEquipo", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }
    static public function mdlListarDatosEqRedes($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_DATOS_EQREDES(:idEquipo)");
        $stmt->bindParam(":idEquipo", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }
    static public function mdlListarDatosEqImp($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_DATOS_EQIMP_OTROS(:idEquipo)");
        $stmt->bindParam(":idEquipo", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }

    static public function mdlRegistrarMantenimiento($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_MANTENIMIENTO(:fRegistroMant,:tipEquipo,:condInicial,:idEquip,:oficEquip,:areaEquip,:respoEquip,:logdeta,:descInc,:diagnostico1,:diagnostico2,:diagnostico3,:diagnostico4,:diagnostico5,:diagnostico6,:diagnostico7,:diagnostico8,:tecEvalua,:fEvalua,:primera_eval,:fInicio,:fFin,:tipTrabajo,:tecResp,:accion1,:accion2,:accion3,:accion4,:accion5,:accion6,:accion7,:accion8,:recomendaciones,:estAtencion,:condFinal,:servTerce,:otros,:obsOtros,:usRegistra,:sgmtoManto)");

        $stmt->bindParam(":tipEquipo", $datos["tipEquipo"], PDO::PARAM_INT);
        $stmt->bindParam(":condInicial", $datos["condInicial"], PDO::PARAM_INT);
        $stmt->bindParam(":idEquip", $datos["idEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":oficEquip", $datos["oficEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":areaEquip", $datos["areaEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":respoEquip", $datos["respoEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":tecEvalua", $datos["tecEvalua"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico1", $datos["diagnostico1"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico2", $datos["diagnostico2"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico3", $datos["diagnostico3"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico4", $datos["diagnostico4"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico5", $datos["diagnostico5"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico6", $datos["diagnostico6"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico7", $datos["diagnostico7"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico8", $datos["diagnostico8"], PDO::PARAM_INT);
        $stmt->bindParam(":tipTrabajo", $datos["tipTrabajo"], PDO::PARAM_INT);
        $stmt->bindParam(":tecResp", $datos["tecResp"], PDO::PARAM_INT);
        $stmt->bindParam(":accion1", $datos["accion1"], PDO::PARAM_INT);
        $stmt->bindParam(":accion2", $datos["accion2"], PDO::PARAM_INT);
        $stmt->bindParam(":accion3", $datos["accion3"], PDO::PARAM_INT);
        $stmt->bindParam(":accion4", $datos["accion4"], PDO::PARAM_INT);
        $stmt->bindParam(":accion5", $datos["accion5"], PDO::PARAM_INT);
        $stmt->bindParam(":accion6", $datos["accion6"], PDO::PARAM_INT);
        $stmt->bindParam(":accion7", $datos["accion7"], PDO::PARAM_INT);
        $stmt->bindParam(":accion8", $datos["accion8"], PDO::PARAM_INT);
        $stmt->bindParam(":estAtencion", $datos["estAtencion"], PDO::PARAM_INT);
        $stmt->bindParam(":condFinal", $datos["condFinal"], PDO::PARAM_INT);
        $stmt->bindParam(":usRegistra", $datos["usRegistra"], PDO::PARAM_INT);
        $stmt->bindParam(":sgmtoManto", $datos["sgmtoManto"], PDO::PARAM_INT);
        $stmt->bindParam(":fRegistroMant", $datos["fRegistroMant"], PDO::PARAM_STR);
        $stmt->bindParam(":logdeta", $datos["logdeta"], PDO::PARAM_STR);
        $stmt->bindParam(":descInc", $datos["descInc"], PDO::PARAM_STR);
        $stmt->bindParam(":fEvalua", $datos["fEvalua"], PDO::PARAM_STR);
        $stmt->bindParam(":primera_eval", $datos["primera_eval"], PDO::PARAM_STR);
        $stmt->bindParam(":fInicio", $datos["fInicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fFin", $datos["fFin"], PDO::PARAM_STR);
        $stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":servTerce", $datos["servTerce"], PDO::PARAM_STR);
        $stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
        $stmt->bindParam(":obsOtros", $datos["obsOtros"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEditarMantenimiento($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL EDITAR_MANTENIMIENTO(:idMantenimiento, :tipEquipo, :condInicial, :idEquip, :oficEquip, :areaEquip, :respoEquip, :logdeta, :descInc, :tecEvalua, :diagnostico1, :diagnostico2, :diagnostico3, :diagnostico4, :diagnostico5, :diagnostico6, :diagnostico7, :diagnostico8, :fEvalua, :primera_eval, :fInicio, :fFin, :tipTrabajo, :tecResp, :accion1, :accion2, :accion3, :accion4, :accion5, :accion6, :accion7, :accion8, :recomendaciones, :estAtencion, :condFinal, :servTerce, :otros, :obsOtros, :sgmtoManto)");

        $stmt->bindParam(":idMantenimiento", $datos["idMantenimiento"], PDO::PARAM_INT);
        $stmt->bindParam(":tipEquipo", $datos["tipEquipo"], PDO::PARAM_INT);
        $stmt->bindParam(":condInicial", $datos["condInicial"], PDO::PARAM_INT);
        $stmt->bindParam(":idEquip", $datos["idEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":oficEquip", $datos["oficEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":areaEquip", $datos["areaEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":respoEquip", $datos["respoEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":tecEvalua", $datos["tecEvalua"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico1", $datos["diagnostico1"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico2", $datos["diagnostico2"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico3", $datos["diagnostico3"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico4", $datos["diagnostico4"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico5", $datos["diagnostico5"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico6", $datos["diagnostico6"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico7", $datos["diagnostico7"], PDO::PARAM_INT);
        $stmt->bindParam(":diagnostico8", $datos["diagnostico8"], PDO::PARAM_INT);
        $stmt->bindParam(":tecResp", $datos["tecResp"], PDO::PARAM_INT);
        $stmt->bindParam(":tipTrabajo", $datos["tipTrabajo"], PDO::PARAM_INT);
        $stmt->bindParam(":accion1", $datos["accion1"], PDO::PARAM_INT);
        $stmt->bindParam(":accion2", $datos["accion2"], PDO::PARAM_INT);
        $stmt->bindParam(":accion3", $datos["accion3"], PDO::PARAM_INT);
        $stmt->bindParam(":accion4", $datos["accion4"], PDO::PARAM_INT);
        $stmt->bindParam(":accion5", $datos["accion5"], PDO::PARAM_INT);
        $stmt->bindParam(":accion6", $datos["accion6"], PDO::PARAM_INT);
        $stmt->bindParam(":accion7", $datos["accion7"], PDO::PARAM_INT);
        $stmt->bindParam(":accion8", $datos["accion8"], PDO::PARAM_INT);
        $stmt->bindParam(":estAtencion", $datos["estAtencion"], PDO::PARAM_INT);
        $stmt->bindParam(":condFinal", $datos["condFinal"], PDO::PARAM_INT);
        $stmt->bindParam(":sgmtoManto", $datos["sgmtoManto"], PDO::PARAM_INT);

        $stmt->bindParam(":logdeta", $datos["logdeta"], PDO::PARAM_STR);
        $stmt->bindParam(":descInc", $datos["descInc"], PDO::PARAM_STR);
        $stmt->bindParam(":fEvalua", $datos["fEvalua"], PDO::PARAM_STR);
        $stmt->bindParam(":primera_eval", $datos["primera_eval"], PDO::PARAM_STR);
        $stmt->bindParam(":fInicio", $datos["fInicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fFin", $datos["fFin"], PDO::PARAM_STR);
        $stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":servTerce", $datos["servTerce"], PDO::PARAM_STR);
        $stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
        $stmt->bindParam(":obsOtros", $datos["obsOtros"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlAnularMantenimiento($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ANULAR_MANTENIMIENTO(:idMantenimiento)");
        $stmt->bindParam(":idMantenimiento", $datos, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlRegistroAuditoria($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL Z_REG_AUDITORIAMANT(:idDoc,:usExec,:accExec,:fecha_audi)");
        $stmt->bindParam(":idDoc", $datos["idDoc"], PDO::PARAM_INT);
        $stmt->bindParam(":usExec", $datos["usExec"], PDO::PARAM_INT);
        $stmt->bindParam(":accExec", $datos["accExec"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_audi", $datos["fecha_audi"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    // Bloque de mantenimientos
    static public function mdlListarMantoComputo($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_MANTO_COMPUS(:idMantenimiento)");
        $stmt->bindParam(":idMantenimiento", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }
    static public function mdlListarMantoRedes($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_MANTO_REDES(:idMantenimiento)");
        $stmt->bindParam(":idMantenimiento", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }
    static public function mdlListarMantoImpre($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_MANTO_IMPRE_PERI(:idMantenimiento)");
        $stmt->bindParam(":idMantenimiento", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }
    static public function mdlListarMantoOtros($dato)
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_MANTO_OTROS(:idMantenimiento)");
        $stmt->bindParam(":idMantenimiento", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
        //Cerramos la conexion por seguridad
    }
}
