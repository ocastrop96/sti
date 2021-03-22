<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class AjaxEquiposR
{
    public $idEquipo;
    public function ajaxListarEquiposR()
    {
        $item = "idEquipo";
        $valor = $this->idEquipo;
        $respuesta = ControladorEquipos::ctrListarEquiposR($item, $valor);
        echo json_encode($respuesta);
    }
    public $validarSerie;

    public function ajaxValidarSerie()
    {
        $item = "serie";
        $valor = $this->validarSerie;
        $respuesta = ControladorEquipos::ctrListarEquiposR($item, $valor);

        echo json_encode($respuesta);
    }
    public $validarSBN;

    public function ajaxValidarSBN()
    {
        $item = "sbn";
        $valor = $this->validarSBN;
        $respuesta = ControladorEquipos::ctrListarEquiposR($item, $valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idEquipo"])) {
    $list1 = new AjaxEquiposR();
    $list1->idEquipo = $_POST["idEquipo"];
    $list1->ajaxListarEquiposR();
}
if (isset($_POST["validarSerie"])) {
    $validar = new AjaxEquiposR();
    $validar->validarSerie = $_POST["validarSerie"];
    $validar->ajaxValidarSerie();
}
if (isset($_POST["validarSBN"])) {
    $validar2 = new AjaxEquiposR();
    $validar2->validarSBN = $_POST["validarSBN"];
    $validar2->ajaxValidarSBN();
}
