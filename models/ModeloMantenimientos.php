<?php
require_once "ConnectPDO.php";

class ModeloMantenimientos
{
    static public function mdlListarFichasMant($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idMantenimiento,correlativo_Mant,date_format(fRegistroMant,'%d/%m/%Y') as fRegManto,tipEquipo,categoria,idEquip,serie,oficEquip,area,areaEquip,subarea,uResponsable,concat(nombresResp,' ',apellidosResp) as responsable,logdeta,date_format(fEvalua,'%d/%m/%Y') as fEval,condInicial,fsitu.situacion as cinicial,tecEvalua,concat(nombres,' ',apellido_paterno,' ',apellido_materno) as tecnico,descInc,primera_eval,date_format(fInicio,'%d/%m/%Y') as fInic,date_format(fFin,'%d/%m/%Y') as fFinE,tipTrabajo,tipoTrabajo,recomendaciones,estAtencion,estAte,condFinal,fsitu2.situacion as cfinal,servTerce,otros,obsOtros,sgmtoManto,estAnulado,estadoDoc from ws_mantenimientos as fmant
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
            inner join ws_tipotrabajo as ftiptrab on fmant.tipTrabajo = ftiptrab.idTipoTrabajo WHERE $item = :$item");
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
        $stmt = Conexion::conectar()->prepare("INSERT INTO ws_mantenimientos(fRegistroMant,descInc,tipEquipo,condInicial,idEquip,oficEquip,areaEquip,respoEquip,tecEvalua,tipTrabajo,fEvalua,primera_eval,fInicio,fFin,recomendaciones,estAtencion,condFinal,servTerce,otros,obsOtros,usRegistra,sgmtoManto,logdeta,diagnostico1,accion1) VALUES('2021-04-21','okas',1,2,54,13,18,9,4,1,'2021-04-20','okis','2021-04-20','2021-04-20','OKIS',1,1,'NO','SI','AJA',1,1,'AA',4,1");

        $stmt->bindParam(":tipEquipo", $datos["tipEquipo"], PDO::PARAM_INT);
        $stmt->bindParam(":condInicial", $datos["condInicial"], PDO::PARAM_INT);
        $stmt->bindParam(":idEquip", $datos["idEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":oficEquip", $datos["oficEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":areaEquip", $datos["areaEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":respoEquip", $datos["respoEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":tecEvalua", $datos["tecEvalua"], PDO::PARAM_INT);
        $stmt->bindParam(":tipTrabajo", $datos["tipTrabajo"], PDO::PARAM_INT);
        $stmt->bindParam(":estAtencion", $datos["estAtencion"], PDO::PARAM_INT);
        $stmt->bindParam(":condFinal", $datos["condFinal"], PDO::PARAM_INT);
        $stmt->bindParam(":usRegistra", $datos["usRegistra"], PDO::PARAM_INT);
        $stmt->bindParam(":sgmtoManto", $datos["sgmtoManto"], PDO::PARAM_INT);

        // $stmt->bindParam(":diagnostico1", $datos["diagnostico1"], PDO::PARAM_INT);
        // $stmt->bindParam(":diagnostico2", $datos["diagnostico2"], PDO::PARAM_INT);
        // $stmt->bindParam(":diagnostico3", $datos["diagnostico3"], PDO::PARAM_INT);
        // $stmt->bindParam(":diagnostico4", $datos["diagnostico4"], PDO::PARAM_INT);
        // $stmt->bindParam(":diagnostico5", $datos["diagnostico5"], PDO::PARAM_INT);
        // $stmt->bindParam(":diagnostico6", $datos["diagnostico6"], PDO::PARAM_INT);
        // $stmt->bindParam(":diagnostico7", $datos["diagnostico7"], PDO::PARAM_INT);
        // $stmt->bindParam(":diagnostico8", $datos["diagnostico8"], PDO::PARAM_INT);

        // $stmt->bindParam(":accion1", $datos["accion1"], PDO::PARAM_INT);
        // $stmt->bindParam(":accion2", $datos["accion2"], PDO::PARAM_INT);
        // $stmt->bindParam(":accion3", $datos["accion3"], PDO::PARAM_INT);
        // $stmt->bindParam(":accion4", $datos["accion4"], PDO::PARAM_INT);
        // $stmt->bindParam(":accion5", $datos["accion5"], PDO::PARAM_INT);
        // $stmt->bindParam(":accion6", $datos["accion6"], PDO::PARAM_INT);
        // $stmt->bindParam(":accion7", $datos["accion7"], PDO::PARAM_INT);
        // $stmt->bindParam(":accion8", $datos["accion8"], PDO::PARAM_INT);

        $stmt->bindParam(":fRegistroMant", $datos["fRegistroMant"], PDO::PARAM_STR);
        $stmt->bindParam(":descInc", $datos["descInc"], PDO::PARAM_STR);
        $stmt->bindParam(":logdeta", $datos["logdeta"], PDO::PARAM_STR);
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
        $stmt = Conexion::conectar()->prepare("CALL EDITAR_MANTENIMIENTO(:correlativo_Mant,:descInc,:tipEquipo,:condInicial,:idEquip,:oficEquip,:areaEquip,:respoEquip,:tecEvalua,:tipTrabajo,:fEvalua,:primera_eval,:fInicio,:fFin,:recomendaciones,:estAtencion,:condFinal,:servTerce,:otros,:obsOtros,:sgmtoManto,:logdeta,:diagnosticos,:acciones)");
        $stmt->bindParam(":tipEquipo", $datos["tipEquipo"], PDO::PARAM_INT);
        $stmt->bindParam(":condInicial", $datos["condInicial"], PDO::PARAM_INT);
        $stmt->bindParam(":idEquip", $datos["idEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":oficEquip", $datos["oficEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":areaEquip", $datos["areaEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":respoEquip", $datos["respoEquip"], PDO::PARAM_INT);
        $stmt->bindParam(":tecEvalua", $datos["tecEvalua"], PDO::PARAM_INT);
        $stmt->bindParam(":tipTrabajo", $datos["tipTrabajo"], PDO::PARAM_INT);
        $stmt->bindParam(":estAtencion", $datos["estAtencion"], PDO::PARAM_INT);
        $stmt->bindParam(":condFinal", $datos["condFinal"], PDO::PARAM_INT);
        $stmt->bindParam(":sgmtoManto", $datos["sgmtoManto"], PDO::PARAM_INT);
        $stmt->bindParam(":descInc", $datos["descInc"], PDO::PARAM_STR);
        $stmt->bindParam(":logdeta", $datos["logdeta"], PDO::PARAM_STR);
        $stmt->bindParam(":correlativo_Mant", $datos["correlativo_Mant"], PDO::PARAM_STR);
        $stmt->bindParam(":diagnosticos", $datos["diagnosticos"], PDO::PARAM_STR);
        $stmt->bindParam(":fEvalua", $datos["fEvalua"], PDO::PARAM_STR);
        $stmt->bindParam(":primera_eval", $datos["primera_eval"], PDO::PARAM_STR);
        $stmt->bindParam(":fInicio", $datos["fInicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fFin", $datos["fFin"], PDO::PARAM_STR);
        $stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":servTerce", $datos["servTerce"], PDO::PARAM_STR);
        $stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
        $stmt->bindParam(":obsOtros", $datos["obsOtros"], PDO::PARAM_STR);
        $stmt->bindParam(":acciones", $datos["acciones"], PDO::PARAM_STR);

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
