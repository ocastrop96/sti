<?php
require_once "../controllers/ControladorAreas.php";
require_once "../models/ModeloAreas.php";

class ajaxAreas
{
    public $idOficina;
    public function ajaxListarOficina()
    {
        $item = "id_area";
        $valor = $this->idOficina;
        $respuesta = ControladorAreas::ctrListarAreas($item, $valor);
        echo json_encode($respuesta);
    }

    public $validarOficina;

    public function ajaxOficinaRepetida()
    {
        $item = "area";
        $valor = $this->validarOficina;
        $respuesta = ControladorAreas::ctrListarAreas($item, $valor);

        echo json_encode($respuesta);
    }

    public $validarOficina2;

    public function ajaxOficinaRepetida2()
    {
        $item = "area";
        $valor = $this->validarOficina2;
        $respuesta = ControladorAreas::ctrListarAreas($item, $valor);

        echo json_encode($respuesta);
    }
}
// Listar areas
if (isset($_POST["idOficina"])) {
    $list1 = new ajaxAreas();
    $list1->idOficina = $_POST["idOficina"];
    $list1->ajaxListarOficina();
}

// Validar area existente
if (isset($_POST["validarOficina"])) {
    $validar = new ajaxAreas();
    $validar->validarOficina = $_POST["validarOficina"];
    $validar->ajaxOficinaRepetida();
}

if (isset($_POST["validarOficina2"])) {
    $validar2 = new ajaxAreas();
    $validar2->validarOficina2 = $_POST["validarOficina2"];
    $validar2->ajaxOficinaRepetida2();
}
