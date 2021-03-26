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
}
