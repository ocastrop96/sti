<?php
require_once "ConnectPDO.php";

class ModeloSubareas
{

	static public function mdlListarSubareas($tabla, $item, $valor)
	{
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//Cerramos la conexion por seguridad
		$stmt->close();
		$stmt = null;
	}

	// Modelo para registrar usuarios
	static public function mdlRegistrarSubarea($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( id_area, subarea) VALUES(:area,:subarea)");
		$stmt->bindParam(":area", $datos["area"], PDO::PARAM_INT);
		$stmt->bindParam(":subarea", $datos["subarea"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	// Modelo editar subareas
	static public function mdlEditarSubarea($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET subarea = :subarea, id_area = :area WHERE id_subarea = :id");

		$stmt->bindParam(":subarea", $datos["subarea"], PDO::PARAM_STR);
		$stmt->bindParam(":area", $datos["area"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	// Eliminar Servicio
	static public function mdlEliminarSubarea($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_subarea = :id");
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	// Validar existencia de subarea
	static public function mdlValidarExistencia($tabla, $item1, $valor1, $item2, $valor2)
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
