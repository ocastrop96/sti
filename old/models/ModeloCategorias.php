<?php
require_once "ConnectPDO.php";

class ModeloCategorias
{
    static public function mdlListarCategorias($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT idCategoria,segmento,categoria,descSegmento FROM ws_categorias as cat inner join ws_segmento as seg on cat.segmento = seg.idSegmento WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("CALL LISTAR_CATEGORIAS()");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Cerramos la conexion por seguridad
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarCatComputo()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_CATEGORIASC()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarCatRedes()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_CATEGORIASR()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarCatOtros()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_CATEGORIASP()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlListarCatOtros2()
    {
        $stmt = Conexion::conectar()->prepare("CALL LISTAR_CATEGORIASP2()");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarCategoria($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL REGISTRAR_CATEGORIA(:categoria,:segmento)");
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":segmento", $datos["segmento"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEditarCategoria($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL EDITAR_CATEGORIA(:id,:categoria,:segmento)");

        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":segmento", $datos["segmento"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEliminarCategoria($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("CALL ELIMINAR_CATEGORIA(:id)");
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
