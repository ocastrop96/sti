<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorResponsables.php";
// LLamada a modelos necesarios
require_once "../models/ModeloResponsables.php";


class TablaResponsables
{

    public function mostrarTablaResponsables()
    {
        $item = null;
        $valor = null;

        $responsables = ControladorResponsables::ctrListarResponsables($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($responsables); $i++) {
            if (isset($_GET["perfilOcultoRespon"]) && $_GET["perfilOcultoRespon"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarResponsable' idResponsable='" . $responsables[$i]["idResponsable"] . "' data-toggle='modal' data-target='#modal-editar-responsable'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarResponsable' idResponsable='" . $responsables[$i]["idResponsable"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else if (isset($_GET["perfilOcultoRespon"]) && $_GET["perfilOcultoRespon"] == 2) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarResponsable' idResponsable='" . $responsables[$i]["idResponsable"] . "' data-toggle='modal' data-target='#modal-editar-responsable'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarResponsable' idResponsable='" . $responsables[$i]["idResponsable"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarResponsable' idResponsable='" . $responsables[$i]["idResponsable"] . "' data-toggle='modal' data-target='#modal-editar-responsable'><i class='fas fa-edit'></i></button></div>";
            }
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $responsables[$i]["dni"] . '",
                "' . $responsables[$i]["nombresResp"] . '",
                "' . $responsables[$i]["apellidosResp"] . '",
                "' . $responsables[$i]["area"] . '",
                "' . $responsables[$i]["subarea"] . '",
                "' . $botones . '"
            ],';
        }
        $datos_json = substr($datos_json, 0, -1);
        $datos_json .= ']
        }';
        echo $datos_json;
    }
}

// Llamamos a la tabla de Usuarios
$tabla = new TablaResponsables();
$tabla->mostrarTablaResponsables();
