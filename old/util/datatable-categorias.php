<?php
require_once "../controllers/ControladorCategorias.php";
require_once "../models/ModeloCategorias.php";

class TablaCategorias
{
    public function mostrarTablaCategorias()
    {
        $item = null;
        $valor = null;
        $categorias = ControladorCategorias::ctrListarCategorias($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($categorias); $i++) {

            if (isset($_GET["perfilOcultoCatego"]) && $_GET["perfilOcultoCatego"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["idCategoria"] . "' data-toggle='modal' data-target='#modal-editar-categoria'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='" . $categorias[$i]["idCategoria"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["idCategoria"] . "' data-toggle='modal' data-target='#modal-editar-categoria'><i class='fas fa-edit'></i></button></div>";
            }

            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $categorias[$i]["categoria"] . '",
                "' . $categorias[$i]["descSegmento"] . '",
                "' . $botones . '"
            ],';
        }
        $datos_json = substr($datos_json, 0, -1);
        $datos_json .= ']
        }';
        echo $datos_json;
    }
}
$tablaCategorias = new TablaCategorias();
$tablaCategorias->mostrarTablaCategorias();
