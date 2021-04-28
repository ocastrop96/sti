<?php
require_once "../controllers/ControladorReposiciones.php";
require_once "../models/ModeloReposiciones.php";
class AjaxReposiciones
{
    // Listar Datos Equipos PC,Laptop y Servidor
    public $idEq1;
    public $idTip1;
    public function ajaxListarEquiposRepo()
    {
        $dato = $this->idEq1;
        $tipo = $this->idTip1;
        // Listar Datos Equipos PC,Laptop y Servidor
        if ($tipo == 1 || $tipo == 4 || $tipo == 5) {
            $respuesta = ControladorReposiciones::ctrListarDatosEqComputoRepo($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Equipos de Red
        elseif ($tipo == 2 || $tipo == 6 || $tipo == 7 || $tipo == 8) {
            $respuesta = ControladorReposiciones::ctrListarDatosEqRedesRepo($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Equipos de Red
        // Listar Datos Equipos de Impresoras y Perifericos
        elseif ($tipo == 3 || $tipo == 9 || $tipo == 14 || $tipo == 15 || $tipo == 16 || $tipo == 17) {
            $respuesta = ControladorReposiciones::ctrListarDatosEqImpRepo($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Equipos de Impresoras y Perifericos
        // Listar Datos Resto de Equipos
        else {
            $respuesta = ControladorReposiciones::ctrListarDatosEqOtrosRepo($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Resto de Equipos
    }

    public $idReposicion;
    public function ajaxListarReposicion()
    {
        $item = "idReposicion";
        $valor = $this->idReposicion;
        $respuesta = ControladorReposiciones::ctrListarFichasRepo($item, $valor);

        echo json_encode($respuesta);
    }

    public $idEquipo;
    public function ajaxValidarEquipoConFicha()
    {
        $item = "idEquip";
        $valor = $this->idEquipo;
        $respuesta = ControladorReposiciones::ctrListarFichasRepo($item, $valor);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["idReposicion"])) {
    $list1 = new AjaxReposiciones();
    $list1->idReposicion = $_POST["idReposicion"];
    $list1->ajaxListarReposicion();
}

if (isset($_POST["idEq1"])) {
    $listInfo = new AjaxReposiciones();
    $listInfo->idEq1 = $_POST["idEq1"];
    $listInfo->idTip1 = $_POST["idTip1"];
    $listInfo->ajaxListarEquiposRepo();
}
if (isset($_POST["idEquipo"])) {
    $validaEq = new AjaxReposiciones();
    $validaEq->idEquipo = $_POST["idEquipo"];
    $validaEq->ajaxValidarEquipoConFicha();
}
