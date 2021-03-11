<?php
require_once "../controllers/ControladorAcciones.php";
require_once "../models/ModeloAcciones.php";

class AjaxAcciones{
    public $idAccion;
    public function ajaxListarAccion(){
        $item = "idAccion";
        $valor = $this -> idAccion;
        $respuesta = ControladorAcciones::ctrListarAcciones($item, $valor);
    
        echo json_encode($respuesta);
    }

    public $validarAccion;
    public $validarCategoria;
    public function ajaxValidarAccion(){
        $tabla = "ws_acciones";
        $item = "accionrealizada";
        $valor = $this->validarAccion;
        $item2 = "segment";
        $valor2 = $this->validarCategoria;

        $respuesta = ModeloAcciones::mdlValidarAcciones($tabla,$item,$valor,$item2,$valor2);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["idAccion"])) {
    $list1 = new AjaxAcciones();
    $list1->idAccion = $_POST["idAccion"];
    $list1->ajaxListarAccion();
}

if (isset($_POST["validarAccion"])) {
	$validar= new AjaxAcciones();
    $validar -> validarAccion = $_POST["validarAccion"];
    $validar -> validarCategoria = $_POST["validarCategoria"];
	$validar -> ajaxValidarAccion();
}