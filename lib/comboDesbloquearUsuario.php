<?php
require_once "../models/ConnectAlt.php";

if (isset($_POST["idUsuarioDes"]) && !empty($_POST["idUsuarioDes"])) {
    $qstmt = $db->query("UPDATE ws_usuarios set nintentos = 0 where id_usuario = " . $_POST["idUsuarioDes"] . "");
    $row =  array(
        "mensaje" => "ok"
    );
    echo json_encode($row);
}
