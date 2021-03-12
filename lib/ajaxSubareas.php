<?php
require_once "../controllers/ControladorSubareas.php";
require_once "../models/ModeloSubareas.php";

class AjaxSubareas{

    public $idSubArea;
    public function ajaxListarSubArea()
    {
        $item = "id_subarea";
        $valor = $this->idSubArea;
        $respuesta = ControladorSubareas::ctrListarSubAreas($item, $valor);
        echo json_encode($respuesta);
    }

    public $validarSubArea;
    public $validarOficina;

    public function ajaxSubAreaRepetida()
    {
        $tabla = "ws_servicios";
        $item1 = "subarea";
        $valor1 = $this-> validarSubArea;
        $item2 = "id_area";
        $valor2 = $this-> validarOficina;
        $respuesta= ModeloSubareas::mdlValidarExistencia($tabla,$item1,$valor1,$item2,$valor2);
        echo json_encode($respuesta);
    }
}

// Listar subareas
if (isset($_POST["idSubArea"])) {
    $list1 = new AjaxSubareas();
    $list1->idSubArea = $_POST["idSubArea"];
    $list1->ajaxListarSubArea();
}

// Validar subarea existente
if (isset($_POST["validarSubArea"])) {
	$validar= new AjaxSubareas();
    $validar -> validarSubArea = $_POST["validarSubArea"];
    $validar -> validarOficina = $_POST["validarOficina"];
	$validar -> ajaxSubAreaRepetida();
}
// // Activar Estado
// if (isset($_POST["activarUsuario"])) {
//     $activarEst = new ajaxUsuarios();
//     $activarEst -> activarUsuario = $_POST["activarUsuario"];
//     $activarEst -> activarId = $_POST["activarId"];
//     $activarEst-> CambiarEstado();
// }