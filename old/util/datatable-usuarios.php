<?php
// Llamada a controladores necesarios
require_once "../controllers/ControladorUsuarios.php";
// LLamada a modelos necesarios
require_once "../models/ModeloUsuarios.php";

class TablaUsuarios
{

    public function mostrarTablaUsuarios()
    {
        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrListar($item, $valor);
        $datos_json = '{
            "data": [';

        for ($i = 0; $i < count($usuarios); $i++) {

            // Traemos los datos de Perfiles, Areas y SubAreas
            // Llamamiento de datos de perfiles
            // $item1 = "id_perfil";
            // $valor1 = $usuarios[$i]["id_perfil"];
            // $perfiles = ControladorUsuarios::ctrListarPerfiles($item1, $valor1);

            // Perfil con iconos
            if (($usuarios[$i]["id_perfil"] == 1)) {
                $perfil = "<i class='fas fa-user-tie'></i>&nbsp" . $usuarios[$i]["perfil"] . "";
            } else {
                $perfil = "<i class='fas fa-user-cog'></i>&nbsp" . $usuarios[$i]["perfil"] . "";
            }
            //Botones de activado o desactivo
            if (($usuarios[$i]["estado"] != 0)) {
                $actdesact = "<button type='button' class='btn btn-block btn-success btnActivar' idUsuario='" . $usuarios[$i]["id_usuario"] . "' estadoUsuario='0'><i class='fas fa-user-check'></i>Activo</button>";
            } else {
                $actdesact = "<button type='button' class='btn btn-block btn-danger btnActivar' idUsuario='" . $usuarios[$i]["id_usuario"] . "' estadoUsuario='0'><i class='fas fa-user-minus'></i>Inactivo</button>";
            }
            
            if (isset($_GET["pUsuOculto"]) && $_GET["pUsuOculto"] == 1) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarUsuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "' data-toggle='modal' data-target='#modal-editar-usuario'><i class='fas fa-edit'></i></button><button class='btn btn-info btnDesbloquearUsuario' data-toggle='tooltip' data-placement='left' title='Desbloquear Usuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "'><i class='fas fa-unlock-alt'></i></button><button class='btn btn-danger btnEliminarUsuario' data-toggle='tooltip' data-placement='left' title='Eliminar Usuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            } else if (isset($_GET["pUsuOculto"]) && $_GET["pUsuOculto"] == 2) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarUsuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "' data-toggle='modal' data-target='#modal-editar-usuario'><i class='fas fa-edit'></i></button><button class='btn btn-info btnDesbloquearUsuario' data-toggle='tooltip' data-placement='left' title='Desbloquear Usuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "'><i class='fas fa-unlock-alt'></i></button></div>";
            } else if (isset($_GET["pUsuOculto"]) && $_GET["pUsuOculto"] == 3) {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarUsuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "' data-toggle='modal' data-target='#modal-editar-usuario'><i class='fas fa-edit'></i></button><button class='btn btn-info btnDesbloquearUsuario' data-toggle='tooltip' data-placement='left' title='Desbloquear Usuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "'><i class='fas fa-unlock-alt'></i></button></div>";
            } else {
                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarUsuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "' data-toggle='modal' data-target='#modal-editar-usuario'><i class='fas fa-edit'></i></button><button class='btn btn-info btnDesbloquearUsuario' data-toggle='tooltip' data-placement='left' title='Desbloquear Usuario' idUsuario='" . $usuarios[$i]["id_usuario"] . "'><i class='fas fa-unlock-alt'></i></button></div>";
            }
            $datos_json .= '[
                "' . ($i + 1) . '",
                "' . $usuarios[$i]["dni"] . '",
                "' . $usuarios[$i]["nombres"] . '",
                "' . $usuarios[$i]["apellido_paterno"] . '",
                "' . $usuarios[$i]["apellido_materno"] . '",
                "' . $perfil . '",
                "' . $usuarios[$i]["cuenta"] . '",
                "' . $usuarios[$i]["fecha_registro"] . '",
                "' . $actdesact . '",
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
$tablaUsuarios = new TablaUsuarios();
$tablaUsuarios->mostrarTablaUsuarios();
