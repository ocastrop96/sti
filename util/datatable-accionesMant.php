<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorAcciones.php";
// LLamada a modelos necesarios
require_once "../models/ModeloAcciones.php";

class TablaAcciones1
{

    public function mostrarTablaAcciones1()
    {
        $item = null;
        $valor = null;

        $tablaAcciones = ControladorAcciones::ctrListarAcciones($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($tablaAcciones); $i++) {
            $botones = "<div class='btn-group'><button class='btn btn-success agregarAccion recuperarAccion' idAccion='" . $tablaAcciones[$i]["idAccion"] . "'><i class='fas fa-plus-circle'></i> &nbsp;Añadir</button>";
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
$tablaAcciones = new TablaAcciones1();
$tablaAcciones->mostrarTablaAcciones1();
