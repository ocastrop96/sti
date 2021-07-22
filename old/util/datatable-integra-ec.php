<?php
require_once "../controllers/ControladorIntegracion.php";
require_once "../models/ModeloIntegracion.php";

class TablaIntegraC
{
    public function mostrarTablaIntegraC()
    {
        $item = null;
        $valor = null;

        $integracion = ControladorIntegracion::ctrListarIntegracionesC($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($integracion); $i++) {

            if (isset($_GET["perfilOcultoIntC"]) && $_GET["perfilOcultoIntC"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIntegraC' idTipo='" . $integracion[$i]["tipo_equipo"] . "' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' data-toggle='modal' data-target='#modal-editar-integraC'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaC' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' idTipo='" . $integracion[$i]["tipo_equipo"] . "'><i class='fas fa-print'></i></button><button class='btn btn-secondary btnAnularIntegraC' idIntegracion='" . $integracion[$i]["idIntegracion"] . "'><i class='fas fa-window-close'></i></button></div>";
            } else if (isset($_GET["perfilOcultoIntC"]) && $_GET["perfilOcultoIntC"] == 4) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIntegraC' idTipo='" . $integracion[$i]["tipo_equipo"] . "' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' data-toggle='modal' data-target='#modal-editar-integraC'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaC' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' idTipo='" . $integracion[$i]["tipo_equipo"] . "'><i class='fas fa-print'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIntegraC' idTipo='" . $integracion[$i]["tipo_equipo"] . "' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' data-toggle='modal' data-target='#modal-editar-integraC'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaC' idIntegracion='" . $integracion[$i]["idIntegracion"] . "' idTipo='" . $integracion[$i]["tipo_equipo"] . "'><i class='fas fa-print'></i></button><button class='btn btn-secondary btnAnularIntegraC' idIntegracion='" . $integracion[$i]["idIntegracion"] . "'><i class='fas fa-window-close'></i></button></div>";
            }

            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $integracion[$i]["correlativo_integracion"] . '",
                "' . $integracion[$i]["fReg"] . '",
                "' . $integracion[$i]["categoria"] . '",
                "' . $integracion[$i]["nro_eq"] . '",
                "' . $integracion[$i]["marcapc"] . '",
                "' . $integracion[$i]["seriepc"] . '",
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

$tablaIntegracion = new TablaIntegraC();
$tablaIntegracion->mostrarTablaIntegraC();
