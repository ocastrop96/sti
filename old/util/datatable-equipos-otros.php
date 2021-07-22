<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class TablaEquiposOtros
{
    public function mostrasTablaEquiposOtros()
    {
        $item = null;
        $valor = null;

        $equipos = ControladorEquipos::ctrListarEquiposP($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($equipos); $i++) {

            if (isset($_GET["perfilOcultoEqOtros"]) && $_GET["perfilOcultoEqOtros"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoP' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoP'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarEquipoP' idEquipo='" . $equipos[$i]["idEquipo"] . "' idCategoria='" . $equipos[$i]["idTipo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else if (isset($_GET["perfilOcultoEqOtros"]) && $_GET["perfilOcultoEqOtros"] == 4) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoP' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoP'><i class='fas fa-edit'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoP' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoP'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarEquipoP' idEquipo='" . $equipos[$i]["idEquipo"] . "' idCategoria='" . $equipos[$i]["idTipo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            }
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $equipos[$i]["categoria"] . '",
                "' . $equipos[$i]["serie"] . '",
                "' . $equipos[$i]["sbn"] . '",
                "' . $equipos[$i]["marca"] . '",
                "' . $equipos[$i]["modelo"] . '",
                "' . $equipos[$i]["descripcion"] . '",
                "' . $equipos[$i]["situacion"] . '",
                "' . $equipos[$i]["descEstado"] . '",
                "' . $botones . '"
            ],';
        }
        $datos_json = substr($datos_json, 0, -1);
        $datos_json .= ']
        }';
        echo $datos_json;
    }
}

$tablaEquiposR = new TablaEquiposOtros();
$tablaEquiposR->mostrasTablaEquiposOtros();
