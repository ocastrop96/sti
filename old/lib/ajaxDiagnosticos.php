<?php
require_once "../controllers/ControladorDiagnosticos.php";
require_once "../models/ModeloDiagnosticos.php";

class AjaxDiagnosticos
{
    public $idDiagnostico;
    public function ajaxListarDiagnostico()
    {
        $item = "idDiagnostico";
        $valor = $this->idDiagnostico;
        $respuesta = ControladorDiagnosticos::ctrListarDiagnosticos($item, $valor);

        echo json_encode($respuesta);
    }

    public $validarDiagnostico;
    public $validarCategoria;
    public function ajaxValidarDiagnostico()
    {
        $tabla = "ws_diagnosticos";
        $item = "diagnostico";
        $valor = $this->validarDiagnostico;
        $item2 = "sgmto";
        $valor2 = $this->validarCategoria;

        $respuesta = ModeloDiagnosticos::mdlValidarDiagnosticos($tabla, $item, $valor, $item2, $valor2);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["idDiagnostico"])) {
    $list1 = new AjaxDiagnosticos();
    $list1->idDiagnostico = $_POST["idDiagnostico"];
    $list1->ajaxListarDiagnostico();
}

if (isset($_POST["validarDiagnostico"])) {
    $validar = new AjaxDiagnosticos();
    $validar->validarDiagnostico = $_POST["validarDiagnostico"];
    $validar->validarCategoria = $_POST["validarCategoria"];
    $validar->ajaxValidarDiagnostico();
}
