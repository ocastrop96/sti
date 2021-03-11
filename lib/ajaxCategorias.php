<?php
require_once "../controllers/ControladorCategorias.php";
require_once "../models/ModeloCategorias.php";

class AjaxCategorias
{
    public $idCategoria;
    public function ajaxListarCategoria()
    {
        $item = "idCategoria";
        $valor = $this->idCategoria;
        $respuesta = ControladorCategorias::ctrListarCategorias($item, $valor);

        echo json_encode($respuesta);
    }

    public $validarCategoria;

    public function ajaxValidarCategoria()
    {
        $item = "categoria";
        $valor = $this->validarCategoria;
        $respuesta = ControladorCategorias::ctrListarCategorias($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idCategoria"])) {
    $list1 = new AjaxCategorias();
    $list1->idCategoria = $_POST["idCategoria"];
    $list1->ajaxListarCategoria();
}

if (isset($_POST["validarCategoria"])) {
    $validar = new AjaxCategorias();
    $validar->validarCategoria = $_POST["validarCategoria"];
    $validar->ajaxValidarCategoria();
}
