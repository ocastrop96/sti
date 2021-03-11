<?php
require_once "../controllers/ControladorUsuarios.php";
require_once "../models/ModeloUsuarios.php";

class ajaxUsuarios
{
    public $idUsuario;
    public function ajaxListarUsuario()
    {
        $item = "id_usuario";
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrListar($item, $valor);
        echo json_encode($respuesta);
    }
    public $activarId;
    public $activarUsuario;

    public function CambiarEstado(){
        $tabla = "ws_usuarios";
        $item1 = "estado";
        $valor1 = $this-> activarUsuario;
        $item2 = "id_usuario";
        $valor2 = $this->activarId;
       $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
    }

    public $validarDni;

    public function ajaxDNIRepetida()
    {
        $item = "dni";
        $valor = $this->validarDni;
        $respuesta = ControladorUsuarios::ctrListar($item, $valor);

        echo json_encode($respuesta);
    }


    public $validarCuenta;

    public function ajaxCuentaRepetida()
    {
        $item = "cuenta";
        $valor = $this->validarCuenta;
        $respuesta = ControladorUsuarios::ctrListar($item, $valor);

        echo json_encode($respuesta);
    }

    public $validarCuentaLog;

    public function ajaxCuentaLog()
    {
        $item = "cuenta";
        $valor = $this->validarCuentaLog;
        $respuesta = ControladorUsuarios::ctrListar($item, $valor);

        echo json_encode($respuesta);
    }

}
// Listar usuarios
if (isset($_POST["idUsuario"])) {
    $list1 = new ajaxUsuarios();
    $list1->idUsuario = $_POST["idUsuario"];
    $list1->ajaxListarUsuario();
}
// Activar Estado
if (isset($_POST["activarUsuario"])) {
    $activarEst = new ajaxUsuarios();
    $activarEst -> activarUsuario = $_POST["activarUsuario"];
    $activarEst -> activarId = $_POST["activarId"];
    $activarEst-> CambiarEstado();
}
// Validar DNI existente
if (isset($_POST["validarDni"])) {
	$validar= new ajaxUsuarios();
	$validar -> validarDni = $_POST["validarDni"];
	$validar -> ajaxDNIRepetida();
}

// Validar Cuenta existente
if (isset($_POST["validarCuenta"])) {
	$validarc= new ajaxUsuarios();
	$validarc -> validarCuenta = $_POST["validarCuenta"];
	$validarc -> ajaxCuentaRepetida();
}
// Validar existencia de cuenta
if (isset($_POST["validarCuentaLog"])) {
	$validarcL= new ajaxUsuarios();
	$validarcL -> validarCuentaLog = $_POST["validarCuentaLog"];
	$validarcL -> ajaxCuentaLog();
}