<?php
require_once "../controllers/ControladorIntegracion.php";
require_once "../models/ModeloIntegracion.php";

class TablaIntegraR
{
    public function mostrarTablaIntegraR()
    {
        $item = null;
        $valor = null;

        $integracion = ControladorIntegracion::ctrListarIntegracionesR($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($integracion); $i++) {

            if (isset($_GET["perfilOcultoIntR"]) && $_GET["perfilOcultoIntR"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIntegraER' idTipo='" . $integracion[$i]["tipo_equipo"] . "' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' data-toggle='modal' data-target='#modal-editar-integraER'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaER' idIntegracion='" . $integracion[$i]["idIntegracion"] . "'><i class='fas fa-print'></i></button><button class='btn btn-secondary btnAnularIntegraER' idIntegracion='" . $integracion[$i]["idIntegracion"] . "'><i class='fas fa-window-close'></i></button></div>";
            } else if (isset($_GET["perfilOcultoIntR"]) && $_GET["perfilOcultoIntR"] == 4) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIntegraER' idTipo='" . $integracion[$i]["tipo_equipo"] . "' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' data-toggle='modal' data-target='#modal-editar-integraER'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaER' idIntegracion='" . $integracion[$i]["idIntegracion"] . "'><i class='fas fa-print'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIntegraER' idTipo='" . $integracion[$i]["tipo_equipo"] . "' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' data-toggle='modal' data-target='#modal-editar-integraER'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaER' idIntegracion='" . $integracion[$i]["idIntegracion"] . "'><i class='fas fa-print'></i></button><button class='btn btn-secondary btnAnularIntegraER' idIntegracion='" . $integracion[$i]["idIntegracion"] . "'><i class='fas fa-window-close'></i></button></div>";
            }

            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $integracion[$i]["correlativo_integracion"] . '",
                "' . $integracion[$i]["fReg"] . '",
                "' . $integracion[$i]["categoria"] . '",
                "' . $integracion[$i]["nro_eq"] . '",
                "' . $integracion[$i]["marcaEqRed"] . '",
                "' . $integracion[$i]["serieEqRed"] . '",
                "' . $integracion[$i]["ip"] . '",
                "' . $integracion[$i]["nombRes"] . ' '.$integracion[$i]["apellRes"].'",
                "' . $integracion[$i]["departamento"] . '",
                "' . $integracion[$i]["servicio"] . '",
                "' . $botones . '"
            ],';
        }
        $datos_json = substr($datos_json, 0, -1);
        $datos_json .= ']
        }';
        echo $datos_json;
    }
}

$tablaIntegracion = new TablaIntegraR();
$tablaIntegracion->mostrarTablaIntegraR();
