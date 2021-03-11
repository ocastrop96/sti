<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class AjaxEquiposR{
    public $idEquipo;
    public function ajaxListarEquiposR()
    {
        $item = "idEquipo";
        $valor = $this->idEquipo;
        $respuesta = ControladorEquipos::ctrListarEquiposR($item, $valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idEquipo"])) {
    $list1 = new AjaxEquiposR();
    $list1->idEquipo = $_POST["idEquipo"];
    $list1->ajaxListarEquiposR();
}