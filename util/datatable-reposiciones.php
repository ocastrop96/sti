<?php
require_once "../controllers/ControladorReposiciones.php";
require_once "../models/ModeloReposiciones.php";

class TablaReposicion
{
    public function mostrarTablaReposicion()
    {
        $item = null;
        $valor = null;
        $reposicion = ControladorReposiciones::ctrListarFichasRepo($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($reposicion); $i++) {
            // Botones de Estado de Atención
            if ($reposicion[$i]["estAtencion"] == 1) {
                $estadoAte = "<button type='button' class='btn btn-block btn-success'><i class='fas fa-thumbs-up'></i>&nbsp;" . $reposicion[$i]["estAte"] . "</button>";
            } else {
                $estadoAte = "<button type='button' class='btn btn-block btn-secondary'><i class='far fa-clock'></i>&nbsp;" . $reposicion[$i]["estAte"] . "</button>";
            }
            // Botones de Estado de Atención
            // Botón de Estado de Ficha
            if ($reposicion[$i]["estAnulado"] == 1) {
                $estadoFicha = "<button type='button' class='btn btn-block btn-info'><i class='fas fa-check'></i>&nbsp;" . $reposicion[$i]["estadoDoc"] . "</button>";
            } else {
                $estadoFicha = "<button type='button' class='btn btn-block btn btn-block btn-danger'><i class='fas fa-ban'></i>&nbsp;" . $reposicion[$i]["estadoDoc"] . "</button>";
            }
            // Botón de Estado de Ficha
            if ($reposicion[$i]["estAnulado"] != 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning disabled'><i class='fas fa-edit'></i></button><button class='btn btn-info disabled'><i class='fas fa-print'></i></button><button class='btn btn-secondary disabled'><i class='fas fa-window-close'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarRepo' idReposicion='" . $reposicion[$i]["idReposicion"] . "' data-toggle='modal' data-target='#modal-editar-reposicion'><i class='fas fa-edit'></i></button><button class='btn btn-info btnImprimirFichaRepo' idReposicion='" . $reposicion[$i]["idReposicion"] . "' tipoEquipo='" . $reposicion[$i]["tipEquipo"] . "'><i class='fas fa-print'></i></button><button class='btn btn-secondary btnAnularReposicion' idReposicion='" . $reposicion[$i]["idReposicion"] . "'><i class='fas fa-window-close'></i></button></div>";
            }
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $reposicion[$i]["correlativo_Repo"] . '",
                "' . $reposicion[$i]["fRegRepo"] . '",
                "' . $reposicion[$i]["categoria"] . '",
                "' . $reposicion[$i]["serie"] . '",
                "' . $reposicion[$i]["responsable"] . '",
                "' . $reposicion[$i]["area"] . '",
                "' . $reposicion[$i]["subarea"] . '",
                "' . $reposicion[$i]["tecnico"] . '",
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

$tablaReposicion = new TablaReposicion();
$tablaReposicion->mostrarTablaReposicion();
