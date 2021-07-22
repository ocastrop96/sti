<?php
require_once "ConnectPDO.php";

class ModeloAcciones
{
    static public function mdlListarAcciones($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idAccion,accionrealizada,segment,descSegmento FROM ws_acciones AS a INNER JOIN ws_segmento AS s ON a.segment = s.idSegmento WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_ACCIONES()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarAccion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(accionrealizada,segment) VALUES(:accion,:categoria)");
        $stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarAccion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET accionrealizada = :accion, segment = :categoria WHERE idAccion = :id");

        $stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEliminarAccion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idAccion = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlValidarAcciones($tabla, $item1, $valor1, $item2, $valor2)
    {
        if ($item1 != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item1 = :$item1 and $item2 = :$item2");
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
        $stmt->close();
        $stmt = null;
    }
}
