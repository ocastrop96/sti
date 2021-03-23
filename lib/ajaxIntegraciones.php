<?php
require_once "../controllers/ControladorIntegracion.php";
require_once "../models/ModeloIntegracion.php";

class AjaxIntegracionesC
{

    public $idIntegracion;
    public function ajaxListarEquiposPO()
    {
        $item = "idIntegracion";
        $valor = $this->idIntegracion;
        $respuesta = ControladorIntegracion::ctrListarIntegracionesC($item, $valor);
        echo json_encode($respuesta);
    }

    public $idIntegracion2;
    public function ajaxListarEquiposPO2()
    {
        $item2 = "idIntegracion";
        $valor2 = $this->idIntegracion2;
        $respuesta2 = ControladorIntegracion::ctrListarIntegracionesC2($item2, $valor2);
        echo json_encode($respuesta2);
    }

    public $idIntegracion3;
    public function ajaxListarEquiposI()
    {
        $item3 = "idIntegracion";
        $valor3 = $this->idIntegracion3;
        $respuesta3 = ControladorIntegracion::ctrListarIntegracionesI($item3, $valor3);
        echo json_encode($respuesta3);
    }

    public $idIntegracion4;
    public function ajaxListarEquiposR()
    {
        $item4 = "idIntegracion";
        $valor4 = $this->idIntegracion4;
        $respuesta4 = ControladorIntegracion::ctrListarIntegracionesR($item4, $valor4);
        echo json_encode($respuesta4);
    }

    // Validar IP Y Nombre de Equipo PC
    public $validarIP;

    public function ajaxValidarIP()
    {
        $item = "ip";
        $valor = $this->validarIP;
        $respuesta = ControladorIntegracion::ctrValidarIpNro($item, $valor);
        echo json_encode($respuesta);
    }

    public $validarNro;

    public function ajaxValidarNro()
    {
        $item = "nro_eq";
        $valor = $this->validarNro;
        $respuesta = ControladorIntegracion::ctrValidarIpNro($item, $valor);

        echo json_encode($respuesta);
    }
    // Validar IP Y Nombre de Equipo PC

}
if (isset($_POST["idIntegracion"])) {
    $list1 = new AjaxIntegracionesC();
    $list1->idIntegracion = $_POST["idIntegracion"];
    $list1->ajaxListarEquiposPO();
}
if (isset($_POST["idIntegracion2"])) {
    $l2 = new AjaxIntegracionesC();
    $l2->idIntegracion2 = $_POST["idIntegracion2"];
    $l2->ajaxListarEquiposPO2();
}

if (isset($_POST["idIntegracion3"])) {
    $l3 = new AjaxIntegracionesC();
    $l3->idIntegracion3 = $_POST["idIntegracion3"];
    $l3->ajaxListarEquiposI();
}
if (isset($_POST["idIntegracion4"])) {
    $l4 = new AjaxIntegracionesC();
    $l4->idIntegracion4 = $_POST["idIntegracion4"];
    $l4->ajaxListarEquiposR();
}
if (isset($_POST["validarIP"])) {
    $validar = new AjaxIntegracionesC();
    $validar->validarIP = $_POST["validarIP"];
    $validar->ajaxValidarIP();
}
if (isset($_POST["validarNro"])) {
    $validar2 = new AjaxIntegracionesC();
    $validar2->validarNro = $_POST["validarNro"];
    $validar2->ajaxValidarNro();
}
