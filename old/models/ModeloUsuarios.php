<?php
require_once "ConnectPDO.php";
class ModeloUsuarios
{
	static public function mdlLoginUsuario($dato)
	{
		$stmt = Conexion::conectar()->prepare("CALL LOGIN_USUARIO(:cuenta)");
		$stmt->bindParam(":cuenta", $dato, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;
	}

	static public function mdlDesbloquearUsuario($dato)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE ws_usuarios set nintentos = 0 where id_usuario = :id_usuario");
		$stmt->bindParam(":id_usuario", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;
	}
	static public function mdlRegistroIntentos($dato)
	{
		$stmt = Conexion::conectar()->prepare("CALL INTENTOS_USUARIO(:id_usuario)");
		$stmt->bindParam(":id_usuario", $dato, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;
	}
	// Modelo para listar usuarios
	static public function mdlLista($tabla, $item, $valor)
	{
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			$stmt = Conexion::conectar()->prepare("CALL LISTADO_USUARIOS_SISTEMA()");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//Cerramos la conexion por seguridad
		$stmt->close();
		$stmt = null;
	}

	static public function mdlListaTecnicos($item, $valor)
	{
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT id_usuario,nombres,apellido_paterno,apellido_materno from ws_usuarios WHERE id_perfil between 3 and 4 and $item = :$item");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			$stmt = Conexion::conectar()->prepare("CALL LISTAR_UTECNICOS()");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//Cerramos la conexion por seguridad
		$stmt->close();
		$stmt = null;
	}

	// Modelo para listar perfiles de usuarios
	static public function mdlListaPerfiles($tabla, $item, $valor)
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
	static public function mdlRegistrarUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("CALL REGISTRO_USUARIO(:perfil,:dni,:nombres,:apellidoPat,:apellidoMat,:cuenta,:clave)");
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_INT);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoPat", $datos["apellidoPat"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoMat", $datos["apellidoMat"], PDO::PARAM_STR);
		$stmt->bindParam(":cuenta", $datos["cuenta"], PDO::PARAM_STR);
		$stmt->bindParam(":clave", $datos["clave"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	// Modelo para editar usuarios
	static public function mdlEditarUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_perfil= :perfil, dni= :dni, nombres = :nombres, apellido_paterno = :apellidoPat, apellido_materno = :apellidoMat, cuenta = :cuenta, clave = :clave WHERE id_usuario = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_INT);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoPat", $datos["apellidoPat"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoMat", $datos["apellidoMat"], PDO::PARAM_STR);
		$stmt->bindParam(":cuenta", $datos["cuenta"], PDO::PARAM_STR);
		$stmt->bindParam(":clave", $datos["clave"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	// Modelo para actualizar datos de usuarios
	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	// Modelo para eliminar datos del usuario
	static public function mdlEliminarUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id");
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
