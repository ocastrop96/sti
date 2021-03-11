<?php
require_once "../controllers/ControladorEquipos.php";
require_once "../models/ModeloEquipos.php";

class TablaEquipos
{
    public function mostrasTablaEquipos()
    {
        $item = null;
        $valor = null;

        $equipos = ControladorEquipos::ctrListarEquiposC($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($equipos); $i++) {
            $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoC' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoC'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarEquipoC' idEquipo='" . $equipos[$i]["idEquipo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            // else if ($equipos[$i]["segmento"] == 2) {
            //     $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoR' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoR'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarEquipo' idEquipo='" . $equipos[$i]["idEquipo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            // }
            // else if($equipos[$i]["segmento"] == 3) {
            //     $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarEquipoC' idEquipo='" . $equipos[$i]["idEquipo"] . "' data-toggle='modal' data-target='#modal-editar-equipoP'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarEquipo' idEquipo='" . $equipos[$i]["idEquipo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            // }
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

$tablaEquipos = new TablaEquipos();
$tablaEquipos->mostrasTablaEquipos();
