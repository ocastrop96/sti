<?php
require_once "ConnectPDO.php";
class ModeloEquipos
{
    static public function mdlListarEquiposC($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,segmento,serie,sbn,marca,modelo,descripcion,ordenCompra,garantia,placa,procesador,vprocesador,ram,discoDuro,observaciones,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario inner join ws_responsables as resp1 on eq.uResponsable = resp1.idResponsable inner join ws_departamentos as dep on eq.office = dep.id_area inner join ws_servicios as serv on eq.service = serv.id_subarea WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_EQUIPOSC()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }
    static public function mdlListarEquiposP($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,segmento,serie,sbn,marca,modelo,descripcion,ordenCompra,garantia,observaciones,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario inner join ws_responsables as resp1 on eq.uResponsable = resp1.idResponsable inner join ws_departamentos as dep on eq.office = dep.id_area inner join ws_servicios as serv on eq.service = serv.id_subarea WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_EQUIPOSP()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }
    static public function mdlListarEquiposR($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idEquipo,date_format(fechaCompra,'%d-%m-%Y') as fComp,idTipo,categoria,uResponsable,nombresResp,apellidosResp,office,area,service,subarea,segmento,serie,sbn,marca,modelo,descripcion,ordenCompra,garantia,puertos,capa,observaciones,condicion,situacion,estadoEQ,descEstado FROM ws_equipos as eq inner join ws_categorias as cat on eq.idTipo = cat.idCategoria inner join ws_situacion as sit on eq.condicion = sit.idSituacion inner join ws_estado as est on eq.estadoEQ = est.idEstado inner join ws_usuarios as us on eq.registrador = us.id_usuario inner join ws_responsables as resp1 on eq.uResponsable = resp1.idResponsable inner join ws_departamentos as dep on eq.office = dep.id_area inner join ws_servicios as serv on eq.service = serv.id_subarea WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_EQUIPOSR()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarEquiposC($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_EQUIPOC(:idTipo,:uResponsable,:idOficina,:idServicio,:serie,:sbn,:marca,:modelo,:descripcion,:fechaCompra,:ordenCompra,:garantia,:placa,:procesador,:vprocesador,:ram,:discoDuro,:observaciones,:condicion,:estadoEQ,:registrador,:tipSegmento)");
        $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
        $stmt->bindParam(":uResponsable", $datos["uResponsable"], PDO::PARAM_INT);
        $stmt->bindParam(":idOficina", $datos["idOficina"], PDO::PARAM_INT);
        $stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":estadoEQ", $datos["estadoEQ"], PDO::PARAM_INT);
        $stmt->bindParam(":registrador", $datos["registrador"], PDO::PARAM_INT);
        $stmt->bindParam(":tipSegmento", $datos["tipSegmento"], PDO::PARAM_INT);
        $stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":sbn", $datos["sbn"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":garantia", $datos["garantia"], PDO::PARAM_STR);
        $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
        $stmt->bindParam(":procesador", $datos["procesador"], PDO::PARAM_STR);
        $stmt->bindParam(":vprocesador", $datos["vprocesador"], PDO::PARAM_STR);
        $stmt->bindParam(":ram", $datos["ram"], PDO::PARAM_STR);
        $stmt->bindParam(":discoDuro", $datos["discoDuro"], PDO::PARAM_STR);
        $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEditarEquiposC($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ACTUALIZAR_EQUIPOC(:id,:idTipo,:uResponsable,:idOficina,:idServicio,:serie,:sbn,:marca,:modelo,:descripcion,:fechaCompra,:ordenCompra,:garantia,:placa,:procesador,:vprocesador,:ram,:discoDuro,:condicion,:estadoEQ)");
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
        $stmt->bindParam(":uResponsable", $datos["uResponsable"], PDO::PARAM_INT);
        $stmt->bindParam(":idOficina", $datos["idOficina"], PDO::PARAM_INT);
        $stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":estadoEQ", $datos["estadoEQ"], PDO::PARAM_INT);
        $stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":sbn", $datos["sbn"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":garantia", $datos["garantia"], PDO::PARAM_STR);
        $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
        $stmt->bindParam(":procesador", $datos["procesador"], PDO::PARAM_STR);
        $stmt->bindParam(":vprocesador", $datos["vprocesador"], PDO::PARAM_STR);
        $stmt->bindParam(":ram", $datos["ram"], PDO::PARAM_STR);
        $stmt->bindParam(":discoDuro", $datos["discoDuro"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEliminarEquiposC($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ELIMINAR_PC_LAPTOP(:id, @val)");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->fetch();
        $val2 = $value['nExistencia'];

        if ($val2 == 0) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlRegistrarEquiposPO($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_EQUIPOP(:idTipo,:uResponsable,:idOficina,:idServicio,:serie,:sbn,:marca,:modelo,:descripcion,:fechaCompra,:ordenCompra,:garantia,:observaciones,:condicion,:estadoEQ,:registrador,:tipSegmento)");
        $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
        $stmt->bindParam(":uResponsable", $datos["uResponsable"], PDO::PARAM_INT);
        $stmt->bindParam(":idOficina", $datos["idOficina"], PDO::PARAM_INT);
        $stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":estadoEQ", $datos["estadoEQ"], PDO::PARAM_INT);
        $stmt->bindParam(":registrador", $datos["registrador"], PDO::PARAM_INT);
        $stmt->bindParam(":tipSegmento", $datos["tipSegmento"], PDO::PARAM_INT);
        $stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":sbn", $datos["sbn"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":garantia", $datos["garantia"], PDO::PARAM_STR);
        $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarEquiposP($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ACTUALIZAR_EQUIPOP(:id,:idTipo,:uResponsable,:idOficina,:idServicio,:serie,:sbn,:marca,:modelo,:descripcion,:fechaCompra,:ordenCompra,:garantia,:condicion,:estadoEQ)");
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
        $stmt->bindParam(":uResponsable", $datos["uResponsable"], PDO::PARAM_INT);
        $stmt->bindParam(":idOficina", $datos["idOficina"], PDO::PARAM_INT);
        $stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":estadoEQ", $datos["estadoEQ"], PDO::PARAM_INT);
        $stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":sbn", $datos["sbn"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":garantia", $datos["garantia"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEliminarEquiposP($datos1, $datos2)
    {
        $stmt = Conexion::conectar()->prepare("CALL ELIMINAR_IMPRESORA_PERIFERICOS(:id,:tipo,@val)");
        $stmt->bindParam(":id", $datos1, PDO::PARAM_INT);
        $stmt->bindParam(":tipo", $datos2, PDO::PARAM_INT);
        $stmt->execute();
        $value23 = $stmt->fetch();
        $val23 = $value23['nExistencia'];
        if ($val23 == 0) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarEquiposR($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_EQUIPOR(:idTipo,:uResponsable,:idOficina,:idServicio,:serie,:sbn,:marca,:modelo,:descripcion,:fechaCompra,:ordenCompra,:garantia,:puertos,:capa,:observaciones,:condicion,:estadoEQ,:registrador,:tipSegmento)");
        $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
        $stmt->bindParam(":uResponsable", $datos["uResponsable"], PDO::PARAM_INT);
        $stmt->bindParam(":idOficina", $datos["idOficina"], PDO::PARAM_INT);
        $stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":estadoEQ", $datos["estadoEQ"], PDO::PARAM_INT);
        $stmt->bindParam(":registrador", $datos["registrador"], PDO::PARAM_INT);
        $stmt->bindParam(":tipSegmento", $datos["tipSegmento"], PDO::PARAM_INT);
        $stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":sbn", $datos["sbn"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":garantia", $datos["garantia"], PDO::PARAM_STR);
        $stmt->bindParam(":puertos", $datos["puertos"], PDO::PARAM_STR);
        $stmt->bindParam(":capa", $datos["capa"], PDO::PARAM_STR);
        $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarEquiposRTC($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ACTUALIZAR_EQUIPORED(:id,:idTipo,:uResponsable,:idOficina,:idServicio,:serie,:sbn,:marca,:modelo,:descripcion,:fechaCompra,:ordenCompra,:garantia,:puertos,:capa,:condicion,:estadoEQ)");
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":idTipo", $datos["idTipo"], PDO::PARAM_INT);
        $stmt->bindParam(":uResponsable", $datos["uResponsable"], PDO::PARAM_INT);
        $stmt->bindParam(":idOficina", $datos["idOficina"], PDO::PARAM_INT);
        $stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        $stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_INT);
        $stmt->bindParam(":estadoEQ", $datos["estadoEQ"], PDO::PARAM_INT);
        $stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":sbn", $datos["sbn"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":ordenCompra", $datos["ordenCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":garantia", $datos["garantia"], PDO::PARAM_STR);
        $stmt->bindParam(":puertos", $datos["puertos"], PDO::PARAM_STR);
        $stmt->bindParam(":capa", $datos["capa"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEliminarEquiposR($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ELIMINAR_EQREDES(:id,@val)");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt->execute();
        $value1 = $stmt->fetch();
        $val1 = $value1['nExistencia'];
        if ($val1 == 0) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlActualizarEstadoEQRepo($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ACTUALIZAR_ESTADO_REPO(:idEquipo,:observaciones,:estadoEQ)");
        $stmt->bindParam(":idEquipo", $datos["idEquipo"], PDO::PARAM_INT);
        $stmt->bindParam(":estadoEQ", $datos["estadoEQ"], PDO::PARAM_INT);
        $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
}
