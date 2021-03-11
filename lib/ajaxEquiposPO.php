<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class AjaxEquiposPO{
    public $idEquipo;
    public function ajaxListarEquiposPO()
    {
        $item = "idEquipo";
        $valor = $this->idEquipo;
        $respuesta = ControladorEquipos::ctrListarEquiposP($item, $valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idEquipo"])) {
    $list1 = new AjaxEquiposPO();
    $list1->idEquipo = $_POST["idEquipo"];
    $list1->ajaxListarEquiposPO();
}