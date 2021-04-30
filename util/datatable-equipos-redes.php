<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class TablaEquiposRedes
{
    public function mostrasTablaEquiposRedes()
    {
        $item = null;
        $valor = null;

        $equipos = ControladorEquipos::ctrListarEquiposR($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($equipos); $i++) {

            if (isset($_GET["perfilOcultoEqRedes"]) && $_GET["perfilOcultoEqRedes"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoR' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoR'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarEquipoR' idEquipo='" . $equipos[$i]["idEquipo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else if (isset($_GET["perfilOcultoEqRedes"]) && $_GET["perfilOcultoEqRedes"] == 4) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoR' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoR'><i class='fas fa-edit'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoR' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoR'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarEquipoR' idEquipo='" . $equipos[$i]["idEquipo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
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

$tablaEquiposR = new TablaEquiposRedes();
$tablaEquiposR->mostrasTablaEquiposRedes();
