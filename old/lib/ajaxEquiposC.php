<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class AjaxEquiposC{
    public $idEquipo;
    public function ajaxListarEquiposC()
    {
        $item = "idEquipo";
        $valor = $this->idEquipo;
        $respuesta = ControladorEquipos::ctrListarEquiposC($item, $valor);
        echo json_encode($respuesta);
    }

    public $validarSerie;

    public function ajaxValidarSerie()
    {
        $item = "serie";
        $valor = $this->validarSerie;
        $respuesta = ControladorEquipos::ctrListarEquiposC($item, $valor);

        echo json_encode($respuesta);
    }
    public $validarSBN;

    public function ajaxValidarSBN()
    {
        $item = "sbn";
        $valor = $this->validarSBN;
        $respuesta = ControladorEquipos::ctrListarEquiposC($item, $valor);

        echo json_encode($respuesta);
    }
}
if (isset($_POST["idEquipo"])) {
    $list1 = new AjaxEquiposC();
    $list1->idEquipo = $_POST["idEquipo"];
    $list1->ajaxListarEquiposC();
}
if (isset($_POST["validarSerie"])) {
    $validar = new AjaxEquiposC();
    $validar->validarSerie = $_POST["validarSerie"];
    $validar->ajaxValidarSerie();
}
if (isset($_POST["validarSBN"])) {
    $validar2 = new AjaxEquiposC();
    $validar2->validarSBN = $_POST["validarSBN"];
    $validar2->ajaxValidarSBN();
}