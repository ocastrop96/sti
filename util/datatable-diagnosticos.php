<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorDiagnosticos.php";
// LLamada a modelos necesarios
require_once "../models/ModeloDiagnosticos.php";

class TablaDiagnosticos
{

    public function mostrarTablaDiagnosticos()
    {
        $item = null;
        $valor = null;

        $diagnosticos = ControladorDiagnosticos::ctrListarDiagnosticos($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($diagnosticos); $i++) {
            $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarDiagnostico' idDiagnostico='" . $diagnosticos[$i]["idDiagnostico"] . "' data-toggle='modal' data-target='#modal-editar-diagnostico'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarDiagnostico' idDiagnostico='" . $diagnosticos[$i]["idDiagnostico"] . "'><i class='fas fa-trash-alt'></i></button></div>";
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
$tablaDiagnosticos = new TablaDiagnosticos();
$tablaDiagnosticos->mostrarTablaDiagnosticos();
