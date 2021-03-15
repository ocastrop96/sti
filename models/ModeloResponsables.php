<?php
require_once "ConnectPDO.php";

class ModeloResponsables
{
    static public function mdlListarResponsables($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idResponsable,dni,nombresResp,apellidosResp,idOficina,area,idServicio,subarea from (ws_responsables as res inner join ws_departamentos as dep on res.idOficina = dep.id_area) inner join ws_servicios as serv on res.idServicio = serv.id_subarea where $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_RESPONSABLES()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }
    static public function mdlRegistrarResponsables($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_RESPONSABLE(:dni,:nombresResp,:apellidosResp,:idOficina,:idServicio)");
        $stmt->bindParam(":idOficina", $datos["idOficina"], PDO::PARAM_INT);
        $stmt->bindParam(":idServicio", $datos["idServicio"], PDO::PARAM_INT);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":nombresResp", $datos["nombresResp"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidosResp", $datos["apellidosResp"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEditarResponsables($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ACTUALIZAR_RESPONSABLE(:dni,:nombres,:apellidos,:oficina,:servicio,:id)");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_INT);
        $stmt->bindParam(":servicio", $datos["servicio"], PDO::PARAM_INT);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEliminarResponsables($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL ELIMINAR_RESPONSABLE(:id)");
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
