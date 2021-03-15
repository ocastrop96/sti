<?php
require_once "../controllers/ControladorResponsables.php";
require_once "../models/ModeloResponsables.php";

class AjaxResponsables
{
    public $idResponsable;
    public function ajaxListarResponsable()
    {
        $item = "idResponsable";
        $valor = $this->idResponsable;
        $respuesta = ControladorResponsables::ctrListarResponsables($item, $valor);

        echo json_encode($respuesta);
    }
    public $validarDni;

    public function ajaxDNIRepetidaResponsable()
    {
        $item = "dni";
        $valor = $this->validarDni;
        $respuesta = ControladorResponsables::ctrListarResponsables($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idResponsable"])) {
    $list1 = new AjaxResponsables();
    $list1->idResponsable = $_POST["idResponsable"];
    $list1->ajaxListarResponsable();
}
// Validar DNI existente
if (isset($_POST["validarDni"])) {
	$validar= new AjaxResponsables();
	$validar -> validarDni = $_POST["validarDni"];
	$validar -> ajaxDNIRepetidaResponsable();
}