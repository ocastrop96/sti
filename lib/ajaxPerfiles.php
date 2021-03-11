<?php
require_once "../controllers/ControladorUsuarios.php";
require_once "../models/ModeloUsuarios.php";

class ajaxPerfiles
{
    public $idPerfil;
    public function ajaxListarUsuarioPerfil(){
        $item = "id_perfil";
        $valor = $this->idPerfil;
        $respuesta = ControladorUsuarios::ctrListarPerfiles($item,$valor);
        echo json_encode($respuesta);
    }
}

// Listar usuarios
if (isset($_POST["idPerfil"])) {
    $list1 = new ajaxPerfiles();
    $list1 -> idPerfil = $_POST["idPerfil"];
    $list1 -> ajaxListarUsuarioPerfil();
}