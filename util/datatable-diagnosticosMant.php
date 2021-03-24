<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorDiagnosticos.php";
// LLamada a modelos necesarios
require_once "../models/ModeloDiagnosticos.php";

class TablaDiagnosticos2
{

    public function mostrarTablaDiagnosticos2()
    {
        $item = null;
        $valor = null;

        $diagnosticos = ControladorDiagnosticos::ctrListarDiagnosticos($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($diagnosticos); $i++) {
            $botones = "<div class='btn-group'><button class='btn btn-success agregarDiagnostico recuperarDiagnostico' idDiagnostico='" . $diagnosticos[$i]["idDiagnostico"] . "'><i class='fas fa-plus-circle'></i>&nbsp;Añadir</button>";
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $diagnosticos[$i]["diagnostico"] . '",
                "' . $diagnosticos[$i]["descSegmento"] . '",
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
$tablaDiagnosticos = new TablaDiagnosticos2();
$tablaDiagnosticos->mostrarTablaDiagnosticos2();
