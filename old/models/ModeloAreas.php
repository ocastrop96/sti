<?php
require_once "ConnectPDO.php";
class ModeloAreas
{
	static public function mdlListarAreas($tabla, $item, $valor)
	{
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY area asc");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			$stmt = Conexion::conectar()->prepare("CALL LISTAR_OFICINAS()");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//Cerramos la conexion por seguridad
		$stmt->close();
		$stmt = null;
	}

	// Modelo para registrar áreas
	static public function mdlRegistrarAreas($datos)
	{
		$stmt = Conexion::conectar()->prepare("CALL REGISTRAR_OFICINA_DPTO(:area)");
		$stmt->bindParam(":area", $datos, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	// Modelo para editar áreas
	static public function mdlEditarAreas($datos)
	{
		$stmt = Conexion::conectar()->prepare("CALL EDITAR_OFICINA_DPTO(:id,:area)");
		$stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	// Eliminar Perfiles
	static public function mdlEliminarArea($datos)
	{

		$stmt = Conexion::conectar()->prepare("CALL ELIMINAR_OFICINA_DPTO(:id)");
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
