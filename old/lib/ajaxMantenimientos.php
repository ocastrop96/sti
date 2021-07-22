<?php
require_once "../controllers/ControladorMantenimiento.php";
require_once "../models/ModeloMantenimientos.php";
class AjaxMantenimientos
{
    // Listar Datos Equipos PC,Laptop y Servidor
    public $idEq1;
    public $idTip1;
    public function ajaxListarEquiposMant()
    {
        $dato = $this->idEq1;
        $tipo = $this->idTip1;
        // Listar Datos Equipos PC,Laptop y Servidor
        if ($tipo == 1 || $tipo == 4 || $tipo == 5) {
            $respuesta = ControladorMantenimientos::ctrListarDatosEqComputo($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Equipos de Red
        elseif ($tipo == 2 || $tipo == 6 || $tipo == 7 || $tipo == 8) {
            $respuesta = ControladorMantenimientos::ctrListarDatosEqRedes($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Equipos de Red
        // Listar Datos Equipos de Impresoras y Perifericos
        elseif ($tipo == 3 || $tipo == 9 || $tipo == 14 || $tipo == 15 || $tipo == 16 || $tipo == 17) {
            $respuesta = ControladorMantenimientos::ctrListarDatosEqImp($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Equipos de Impresoras y Perifericos
        // Listar Datos Resto de Equipos
        else {
            $respuesta = ControladorMantenimientos::ctrListarDatosEqOtros($dato);
            echo json_encode($respuesta);
        }
        // Listar Datos Resto de Equipos
    }

    public $idMantenimiento;
    public function ajaxListarMantenimiento()
    {
        $item = "idMantenimiento";
        $valor = $this->idMantenimiento;
        $respuesta = ControladorMantenimientos::ctrListarFichasManto($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idMantenimiento"])) {
    $list1 = new AjaxMantenimientos();
    $list1->idMantenimiento = $_POST["idMantenimiento"];
    $list1->ajaxListarMantenimiento();
}

if (isset($_POST["idEq1"])) {
    $listInfo = new AjaxMantenimientos();
    $listInfo->idEq1 = $_POST["idEq1"];
    $listInfo->idTip1 = $_POST["idTip1"];
    $listInfo->ajaxListarEquiposMant();
}
