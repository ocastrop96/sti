<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorAreas.php";
// LLamada a modelos necesarios
require_once "../models/ModeloAreas.php";

class TablaAreas
{

    public function mostrarTablaAreas()
    {
        $item = null;
        $valor = null;

        $areas = ControladorAreas::ctrListarAreas($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($areas); $i++) {
            $freg2 = date("d-m-Y", strtotime($areas[$i]["fecha_creacion"]));

            if (isset($_GET["perfilOcultoOf"]) && $_GET["perfilOcultoOf"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarArea' idOficina='" . $areas[$i]["id_area"] . "' data-toggle='modal' data-target='#modal-editar-ubicacion'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarArea' idOficina='" . $areas[$i]["id_area"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } elseif (isset($_GET["perfilOcultoOf"]) && $_GET["perfilOcultoOf"] == 2) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarArea' idOficina='" . $areas[$i]["id_area"] . "' data-toggle='modal' data-target='#modal-editar-ubicacion'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarArea' idOficina='" . $areas[$i]["id_area"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarArea' idOficina='" . $areas[$i]["id_area"] . "' data-toggle='modal' data-target='#modal-editar-ubicacion'><i class='fas fa-edit'></i></button></div>";
            }


            $logo = "<center><i class='fas fa-hospital text-center'></i></center>";
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $logo . '",
                "' . $areas[$i]["area"] . '",
                "' . $freg2 . '",
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
$tablaAreas = new TablaAreas();
$tablaAreas->mostrarTablaAreas();
