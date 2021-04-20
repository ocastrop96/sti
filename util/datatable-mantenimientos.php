<?php
require_once "../controllers/ControladorMantenimiento.php";
require_once "../models/ModeloMantenimientos.php";

class TablaMantenimiento
{
    public function mostrarTablaMantenimiento()
    {
        $item = null;
        $valor = null;
        $mantenimiento = ControladorMantenimientos::ctrListarFichasManto($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($mantenimiento); $i++) {
            // Botones de Estado de Atención
            if ($mantenimiento[$i]["estAtencion"] == 1) {
                $estadoAte = "<button type='button' class='btn btn-block btn-success'><i class='fas fa-thumbs-up'></i>&nbsp;" . $mantenimiento[$i]["estAte"] . "</button>";
            } else {
                $estadoAte = "<button type='button' class='btn btn-block btn-secondary'><i class='far fa-clock'></i>&nbsp;" . $mantenimiento[$i]["estAte"] . "</button>";
            }
            // Botones de Estado de Atención
            // Botón de Estado de Ficha
            if ($mantenimiento[$i]["estAnulado"] == 1) {
                $estadoFicha = "<button type='button' class='btn btn-block btn-info'><i class='fas fa-check'></i>&nbsp;" . $mantenimiento[$i]["estadoDoc"] . "</button>";
            } else {
                $estadoFicha = "<button type='button' class='btn btn-block btn btn-block btn-danger'><i class='fas fa-ban'></i>&nbsp;" . $mantenimiento[$i]["estadoDoc"] . "</button>";
            }
            // Botón de Estado de Ficha
            if ($mantenimiento[$i]["estAnulado"] != 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning disabled'><i class='fas fa-edit'></i></button><button class='btn btn-info disabled'><i class='fas fa-print'></i></button><button class='btn btn-secondary disabled'><i class='fas fa-window-close'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarMant' idMantenimiento='" . $mantenimiento[$i]["idMantenimiento"] . "' data-toggle='modal' data-target='#modal-editar-mantenimiento'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaMant' idMantenimiento='" . $mantenimiento[$i]["idMantenimiento"] . "' tipoEquipo='" . $mantenimiento[$i]["tipEquipo"] . "'><i class='fas fa-print'></i></button><button class='btn btn-secondary btnAnularMantenimiento' idMantenimiento='" . $mantenimiento[$i]["idMantenimiento"] . "'><i class='fas fa-window-close'></i></button></div>";
            }
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $mantenimiento[$i]["correlativo_Mant"] . '",
                "' . $mantenimiento[$i]["fRegManto"] . '",
                "' . $mantenimiento[$i]["categoria"] . '",
                "' . $mantenimiento[$i]["serie"] . '",
                "' . $mantenimiento[$i]["responsable"] . '",
                "' . $mantenimiento[$i]["area"] . '",
                "' . $mantenimiento[$i]["subarea"] . '",
                "' . $mantenimiento[$i]["tecnico"] . '",
                "' . $estadoAte . '",
                "' . $estadoFicha . '",
                "' . $botones . '"
            ],';
        }
        $datos_json = substr($datos_json, 0, -1);
        $datos_json .= ']
        }';
        echo $datos_json;
    }
}

$tablaMantenimiento = new TablaMantenimiento();
$tablaMantenimiento->mostrarTablaMantenimiento();
