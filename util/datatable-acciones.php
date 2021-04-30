<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorAcciones.php";
// LLamada a modelos necesarios
require_once "../models/ModeloAcciones.php";

class TablaAcciones
{

    public function mostrarTablaAcciones()
    {
        $item = null;
        $valor = null;

        $tablaAcciones = ControladorAcciones::ctrListarAcciones($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($tablaAcciones); $i++) {
            if (isset($_GET["perfilOcultoAcci"]) && $_GET["perfilOcultoAcci"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarAccion' idAccion='" . $tablaAcciones[$i]["idAccion"] . "' data-toggle='modal' data-target='#modal-editar-accion'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarAccion' idAccion='" . $tablaAcciones[$i]["idAccion"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else if (isset($_GET["perfilOcultoAcci"]) && $_GET["perfilOcultoAcci"] == 4) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarAccion' idAccion='" . $tablaAcciones[$i]["idAccion"] . "' data-toggle='modal' data-target='#modal-editar-accion'><i class='fas fa-edit'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarAccion' idAccion='" . $tablaAcciones[$i]["idAccion"] . "' data-toggle='modal' data-target='#modal-editar-accion'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarAccion' idAccion='" . $tablaAcciones[$i]["idAccion"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            }

            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $tablaAcciones[$i]["accionrealizada"] . '",
                "' . $tablaAcciones[$i]["descSegmento"] . '",
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
$tablaAcciones = new TablaAcciones();
$tablaAcciones->mostrarTablaAcciones();
