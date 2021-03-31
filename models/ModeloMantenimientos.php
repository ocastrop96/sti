<?php
require_once "ConnectPDO.php";

class ModeloMantenimientos
{
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

    static public function mdlRegistrarMantenimiento($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fRegistroMant,descInc,tipEquipo,condInicial,idEquip,oficEquip,areaEquip,respoEquip,tecEvalua,tipTrabajo,fEvalua,primera_eval,fInicio,fFin,recomendaciones,estAtencion,condFinal,servTerce,otros,obsOtros,usRegistra,sgmtoManto,logdeta,diagnosticos,acciones) VALUES(:fRegistroMant,:descInc,:tipEquipo,:condInicial,:idEquip,:oficEquip,:areaEquip,:respoEquip,:tecEvalua,:tipTrabajo,:fEvalua,:primera_eval,:fInicio,:fFin,:recomendaciones,:estAtencion,:condFinal,:servTerce,:otros,:obsOtros,:usRegistra,:sgmtoManto,:logdeta,:diagnosticos,:acciones)");
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
        $stmt->bindParam(":fRegistroMant", $datos["fRegistroMant"], PDO::PARAM_STR);
        $stmt->bindParam(":descInc", $datos["descInc"], PDO::PARAM_STR);
        $stmt->bindParam(":logdeta", $datos["logdeta"], PDO::PARAM_STR);
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

    // static public function mdlRegistrarMantenimiento($datos)
    // {
    //     $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_MANTENIMIENTO(:fRegistroMant,:tipEquipo,:condInicial,:idEquip,:oficEquip,:areaEquip,:respoEquip,:logdeta,:descInc,:diagnosticos,:tecEvalua,:fEvalua,:primera_eval,:fInicio,:fFin,:tipTrabajo,:acciones,:recomendaciones,:estAtencion,:condFinal,:servTerce,:otros,:obsOtros,:usRegistra,:sgmtoManto)");

    //     $stmt->bindParam(":tipEquipo", $datos["tipEquipo"], PDO::PARAM_INT);
    //     $stmt->bindParam(":condInicial", $datos["condInicial"], PDO::PARAM_INT);
    //     $stmt->bindParam(":idEquip", $datos["idEquip"], PDO::PARAM_INT);
    //     $stmt->bindParam(":oficEquip", $datos["oficEquip"], PDO::PARAM_INT);
    //     $stmt->bindParam(":areaEquip", $datos["areaEquip"], PDO::PARAM_INT);
    //     $stmt->bindParam(":respoEquip", $datos["respoEquip"], PDO::PARAM_INT);
    //     $stmt->bindParam(":tecEvalua", $datos["tecEvalua"], PDO::PARAM_INT);
    //     $stmt->bindParam(":tipTrabajo", $datos["tipTrabajo"], PDO::PARAM_INT);
    //     $stmt->bindParam(":estAtencion", $datos["estAtencion"], PDO::PARAM_INT);
    //     $stmt->bindParam(":condFinal", $datos["condFinal"], PDO::PARAM_INT);
    //     $stmt->bindParam(":usRegistra", $datos["usRegistra"], PDO::PARAM_INT);
    //     $stmt->bindParam(":sgmtoManto", $datos["sgmtoManto"], PDO::PARAM_INT);

    //     $stmt->bindParam(":fRegistroMant", $datos["fRegistroMant"], PDO::PARAM_STR);
    //     $stmt->bindParam(":logdeta", $datos["logdeta"], PDO::PARAM_STR);
    //     $stmt->bindParam(":descInc", $datos["descInc"], PDO::PARAM_STR);
    //     $stmt->bindParam(":diagnosticos", $datos["diagnosticos"], PDO::PARAM_STR);
    //     $stmt->bindParam(":fEvalua", $datos["fEvalua"], PDO::PARAM_STR);
    //     $stmt->bindParam(":primera_eval", $datos["primera_eval"], PDO::PARAM_STR);
    //     $stmt->bindParam(":fInicio", $datos["fInicio"], PDO::PARAM_STR);
    //     $stmt->bindParam(":fFin", $datos["fFin"], PDO::PARAM_STR);
    //     $stmt->bindParam(":acciones", $datos["acciones"], PDO::PARAM_STR);
    //     $stmt->bindParam(":recomendaciones", $datos["recomendaciones"], PDO::PARAM_STR);
    //     $stmt->bindParam(":servTerce", $datos["servTerce"], PDO::PARAM_STR);
    //     $stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
    //     $stmt->bindParam(":obsOtros", $datos["obsOtros"], PDO::PARAM_STR);

    //     if ($stmt->execute()) {
    //         return "ok";
    //     } else {
    //         return "error";
    //     }
    //     $stmt->close();
    //     $stmt = null;
    // }

    // static public function mdlRegistrarIntegracion1($datos)
    // {
    //     $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_INTEGRACIONC(:nro_eq,:ip ,:serie_pc,:serie_monitor,:serie_teclado,:serie_EstAcu,:fecha_registro,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

    //     $stmt->bindParam(":serie_pc", $datos["serie_pc"], PDO::PARAM_INT);
    //     $stmt->bindParam(":serie_monitor", $datos["serie_monitor"], PDO::PARAM_INT);
    //     $stmt->bindParam(":serie_teclado", $datos["serie_teclado"], PDO::PARAM_INT);
    //     $stmt->bindParam(":serie_EstAcu", $datos["serie_EstAcu"], PDO::PARAM_INT);

    //     $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
    //     $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
    //     $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
    //     $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
    //     $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
    //     $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);

    //     $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
    //     $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
    //     $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

    //     if ($stmt->execute()) {
    //         return "ok";
    //     } else {
    //         return "error";
    //     }
    //     $stmt->close();
    //     $stmt = null;
    // }
}
