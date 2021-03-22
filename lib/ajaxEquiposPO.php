<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class AjaxEquiposPO
{
    public $idEquipo;
    public function ajaxListarEquiposPO()
    {
        $item = "idEquipo";
        $valor = $this->idEquipo;
        $respuesta = ControladorEquipos::ctrListarEquiposP($item, $valor);
        echo json_encode($respuesta);
    }

    public $validarSerie;

    public function ajaxValidarSerie()
    {
        $item = "serie";
        $valor = $this->validarSerie;
        $respuesta = ControladorEquipos::ctrListarEquiposP($item, $valor);

        echo json_encode($respuesta);
    }
    public $validarSBN;

    public function ajaxValidarSBN()
    {
        $item = "sbn";
        $valor = $this->validarSBN;
        $respuesta = ControladorEquipos::ctrListarEquiposP($item, $valor);

        echo json_encode($respuesta);
    }
}
if (isset($_POST["idEquipo"])) {
    $list1 = new AjaxEquiposPO();
    $list1->idEquipo = $_POST["idEquipo"];
    $list1->ajaxListarEquiposPO();
}
if (isset($_POST["validarSerie"])) {
    $validar = new AjaxEquiposPO();
    $validar->validarSerie = $_POST["validarSerie"];
    $validar->ajaxValidarSerie();
}
if (isset($_POST["validarSBN"])) {
    $validar2 = new AjaxEquiposPO();
    $validar2->validarSBN = $_POST["validarSBN"];
    $validar2->ajaxValidarSBN();
}
