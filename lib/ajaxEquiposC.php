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
}
if (isset($_POST["idEquipo"])) {
    $list1 = new AjaxEquiposC();
    $list1->idEquipo = $_POST["idEquipo"];
    $list1->ajaxListarEquiposC();
}