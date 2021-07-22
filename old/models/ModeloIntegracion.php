<?php
require_once "ConnectPDO.php";
class ModeloIntegracion
{
    static public function mdlListarIntegracionIPNro($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT nro_eq,ip FROM ws_integraciones WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_INTEGRACIONC()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }
    static public function mdlListarIntegracionC($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,UPPER(respon.nombresResp) as nombRes,UPPER(respon.apellidosResp) as apellRes,oficina_in,UPPER(dept.area) as departamento,servicio_in,UPPER(serv.subarea) as servicio,pc.idEquipo as idPc,pc.serie as seriepc,pc.sbn as sbnpc,pc.marca as marcapc,pc.modelo as modelopc,pc.descripcion as descripcionpc,pc.ordenCompra as Ordenpc,date_format(pc.fechaCompra,'%d/%m/%Y') as fcomprapc,pc.garantia as garantiapc,pc.placa as placapc,pc.procesador as procesadorpc,pc.vprocesador as vprocesadorpc,pc.ram as rampc,pc.discoDuro as ddpc,estado,UPPER(esteq.descEstado) as detaEstado,siteq.idSituacion as condicionPC,situacion,serie_monitor,mon.serie as seriemon,mon.sbn as sbnmon,mon.marca as marcamon,mon.modelo as modelomon,mon.descripcion as descripcionmon,serie_teclado, tecl.serie as serietec, tecl.sbn as sbntec,tecl.marca as marcatec,tecl.modelo as modelotec,tecl.descripcion as descripciontec,serie_EstAcu,energia.serie as serieAcu,energia.sbn as sbnAcu,energia.marca as marcaAcu,energia.modelo as modeloAcu,energia.descripcion as descripcionAcu FROM ws_integraciones as integra 
            inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
            inner join ws_equipos as pc on integra.serie_pc = pc.idEquipo
            inner join ws_estado as esteq on integra.estado = esteq.idEstado
            inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
            left join ws_equipos as mon on integra.serie_monitor = mon.idEquipo
            left join ws_equipos as tecl on integra.serie_teclado = tecl.idEquipo
            left join ws_equipos as energia on integra.serie_EstAcu = energia.idEquipo
            inner join ws_responsables as respon on integra.responsable = respon.idResponsable
            inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
            inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
            WHERE segmento = 1 AND $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_INTEGRACIONC()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarIntegracionC2($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,categoria,segmento,responsable,UPPER(respon.nombresResp) as nombRes,UPPER(respon.apellidosResp) as apellRes,oficina_in,UPPER(dept.area) as departamento,servicio_in,UPPER(serv.subarea) as servicio,pc.idEquipo as idPc,pc.serie as seriepc,pc.sbn as sbnpc,pc.marca as marcapc,pc.modelo as modelopc,pc.descripcion as descripcionpc,pc.ordenCompra as Ordenpc,date_format(pc.fechaCompra,'%d/%m/%Y') as fcomprapc,pc.garantia as garantiapc,pc.placa as placapc,pc.procesador as procesadorpc,pc.vprocesador as vprocesadorpc,pc.ram as rampc,pc.discoDuro as ddpc,estado,UPPER(esteq.descEstado) as detaEstado,siteq.idSituacion as condicionPC,situacion FROM ws_integraciones as integra 
            inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
            inner join ws_equipos as pc on integra.serie_pc = pc.idEquipo
            inner join ws_estado as esteq on integra.estado = esteq.idEstado
            inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
            inner join ws_responsables as respon on integra.responsable = respon.idResponsable
            inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
            inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
            WHERE segmento = 1 AND (tipo_equipo = 4 OR tipo_equipo = 5) AND $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_INTEGRACIONC()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }
    static public function mdlListarIntegracionR($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,UPPER(categoria) AS detaCategoria,segmento,responsable,UPPER(respon.nombresResp) as nombRes,UPPER(respon.apellidosResp) as apellRes,oficina_in,UPPER(dept.area) as departamento,servicio_in,UPPER(serv.subarea) as servicio,eqred.idEquipo as idEqRed,eqred.serie as serieEqRed,eqred.sbn as sbnEqRed,eqred.marca as marcaEqRed,eqred.modelo as modeloEqRed,eqred.descripcion as descripcionEqRed,eqred.ordenCompra as OrdenEqRed,date_format(eqred.fechaCompra,'%d/%m/%Y') as fcompraEqRed,eqred.garantia as garantiaER,eqred.puertos as PuertosEqRed,eqred.capa as CapaEqRed,estado,UPPER(descEstado) as detaEstado,siteq.idSituacion as condicionPC,situacion FROM ws_integraciones as integra 
            inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
            inner join ws_equipos as eqred on integra.serie_eqred = eqred.idEquipo
            inner join ws_estado as esteq on integra.estado = esteq.idEstado
            inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
            inner join ws_responsables as respon on integra.responsable = respon.idResponsable
            inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
            inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
            WHERE segmento = 2 AND $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_INTEGRACIONR()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarIntegracionI($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idIntegracion,correlativo_integracion,date_format(fecha_registro,'%d-%m-%Y') as fReg,nro_eq,ip,tipo_equipo,UPPER(categoria) AS detaCategoria,segmento,responsable,UPPER(respon.nombresResp) as nombRes,UPPER(respon.apellidosResp) as apellRes,oficina_in,UPPER(dept.area) as departamento,servicio_in,UPPER(serv.subarea) as servicio,imp.idEquipo as idimp,imp.serie as serieimp,imp.sbn as sbnimp,imp.marca as marcaimp,imp.modelo as modeloimp,imp.descripcion as descripcionimp,imp.ordenCompra as Ordenimp,date_format(imp.fechaCompra,'%d/%m/%Y') as fcompraimp,imp.garantia as garantiaimp,estado,UPPER(descEstado) as detaEstado,siteq.idSituacion as condicionPC,situacion FROM ws_integraciones as integra 
            inner join ws_categorias as cat on integra.tipo_equipo = cat.idCategoria
            inner join ws_equipos as imp on integra.serie_imp = imp.idEquipo
            inner join ws_estado as esteq on integra.estado = esteq.idEstado
            inner join ws_situacion as siteq on integra.condicion = siteq.idSituacion
            inner join ws_responsables as respon on integra.responsable = respon.idResponsable
            inner join ws_departamentos as dept on integra.oficina_in = dept.id_area
            inner join ws_servicios as serv on integra.servicio_in = serv.id_subarea
            WHERE segmento = 3 AND $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_INTEGRACIONI()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarSeriesPC()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_SERIESPC()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarSeriesMon()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_SERIESMON()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarSeriesTec()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_SERIESTEC()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarSeriesEner()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_SERIESENER()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarSeriesLapServ()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_SERIESLAPSERV()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlListarSeriesImp()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_SERIESIMP()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlListarSeriesRed()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_SERIESRED()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlRegistrarIntegracion1($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_INTEGRACIONC(:nro_eq,:ip ,:serie_pc,:serie_monitor,:serie_teclado,:serie_EstAcu,:fecha_registro,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":serie_pc", $datos["serie_pc"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_monitor", $datos["serie_monitor"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_teclado", $datos["serie_teclado"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_EstAcu", $datos["serie_EstAcu"], PDO::PARAM_INT);

        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);

        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlRegistrarIntegracion2($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_INTEGRACIONC1(:nro_eq,:ip ,:serie_pc,:fecha_registro,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":serie_pc", $datos["serie_pc"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarIntegracionImp($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_INTEGRACIONCI(:nro_eq,:ip ,:serie_imp,:fecha_registro,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":serie_imp", $datos["serie_imp"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);

        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarIntegracionRed($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_INTEGRACIONCER(:nro_eq,:ip ,:serie_eqred,:fecha_registro,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":serie_eqred", $datos["serie_eqred"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);

        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEditarIntegracion1($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL EDITAR_INTEGRACIONC(:idIntegracion,:nro_eq,:ip ,:serie_pc,:serie_monitor,:serie_teclado,:serie_EstAcu,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":idIntegracion", $datos["idIntegracion"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_pc", $datos["serie_pc"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_monitor", $datos["serie_monitor"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_teclado", $datos["serie_teclado"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_EstAcu", $datos["serie_EstAcu"], PDO::PARAM_INT);

        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarIntegracion2($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL EDITAR_INTEGRACIONC1(:idIntegracion,:nro_eq,:ip ,:serie_pc,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":idIntegracion", $datos["idIntegracion"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_pc", $datos["serie_pc"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarIntegracionImp($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL EDITAR_INTEGRACIONI(:idIntegracion,:nro_eq,:ip ,:serie_imp,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":idIntegracion", $datos["idIntegracion"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_imp", $datos["serie_imp"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarIntegracionER($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL EDITAR_INTEGRACIONR(:idIntegracion,:nro_eq,:ip ,:serie_eqred,:tipo_equipo,:responsable,:oficina_in,:servicio_in,:estado,:condicion)");

        $stmt->bindParam(":idIntegracion", $datos["idIntegracion"], PDO::PARAM_INT);
        $stmt->bindParam(":serie_eqred", $datos["serie_eqred"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_equipo", $datos["tipo_equipo"], PDO::PARAM_INT);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina_in", $datos["oficina_in"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio_in", $datos["servicio_in"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":nro_eq", $datos["nro_eq"], PDO::PARAM_STR);
        $stmt->bindParam(":ip", $datos["ip"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlAnularIntegracion($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ANULAR_INTEGRACION(:id)");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
}
