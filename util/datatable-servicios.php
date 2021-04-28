<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorAreas.php";
require_once "../controllers/ControladorSubareas.php";
// LLamada a modelos necesarios
require_once "../models/ModeloAreas.php";
require_once "../models/ModeloSubareas.php";

class TablaSubAreas
{

    public function mostrarTablaSubAreas()
    {
        $item = null;
        $valor = null;

        $subareas = ControladorSubareas::ctrListarSubAreas($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($subareas); $i++) {

            $item1 = "id_area";
            $valor1 = $subareas[$i]["id_area"];
            $areas = ControladorAreas::ctrListarAreas($item1, $valor1);

            $ar = "<i class='fas fa-sitemap'></i>&nbsp" . $areas["area"] . "";
            $freg22 = date("d-m-Y", strtotime($subareas[$i]["fecha_creacion"]));

            if (isset($_GET["perfilOcultoOf"]) && $_GET["perfilOcultoOf"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "' data-toggle='modal' data-target='#modal-editar-subarea'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } elseif (isset($_GET["perfilOcultoOf"]) && $_GET["perfilOcultoOf"] == 2) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "' data-toggle='modal' data-target='#modal-editar-subarea'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "' data-toggle='modal' data-target='#modal-editar-subarea'><i class='fas fa-edit'></i></button></div>";
            }

            // if (isset($_GET["perfilOcultoServ"]) && $_GET["perfilOcultoServ"] == 1) {
            //     $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "' data-toggle='modal' data-target='#modal-editar-subarea'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            // }
            // elseif (isset($_GET["perfilOcultoServ"]) && $_GET["perfilOcultoServ"] == 2) {
            //     $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "' data-toggle='modal' data-target='#modal-editar-subarea'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            // }
            //  else {
            //     $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubArea' idSubArea='" . $subareas[$i]["id_subarea"] . "' data-toggle='modal' data-target='#modal-editar-subarea'><i class='fas fa-edit'></i></button></div>";
            // }
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $ar . '",
                "' . $subareas[$i]["subarea"] . '",
                "' . $freg22 . '",
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
$tabla = new TablaSubAreas();
$tabla->mostrarTablaSubAreas();
