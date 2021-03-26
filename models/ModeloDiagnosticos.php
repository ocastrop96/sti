<?php
require_once "ConnectPDO.php";

class ModeloDiagnosticos
{
    static public function mdlListarDiagnosticos($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idDiagnostico,diagnostico,sgmto,descSegmento from ws_diagnosticos as d inner join ws_segmento as s on d.sgmto = s.idSegmento WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_DIAGNOSTICOS()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarTrabajosManto($item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM ws_tipotrabajo where idTipoTrabajo between 1 and 3 and $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_TRABAJOSMANTO()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarDiagnostico($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(diagnostico,sgmto) VALUES(:diagnostico,:categoria)");
        $stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarDiagnostico($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET diagnostico = :diagnostico, sgmto = :categoria WHERE idDiagnostico = :id");

        $stmt->bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
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

    static public function mdlEliminarDiagnostico($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idDiagnostico = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlValidarDiagnosticos($tabla, $item1, $valor1, $item2, $valor2)
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
