<?php
require_once "../models/ConnectAlt.php";

if (isset($_POST["idUsuarioDes"]) && !empty($_POST["idUsuarioDes"])) {

    $id = $_POST["idUsuarioDes"];
    $qstmt = $db->query("call DESBLOQUEAR_USUARIO($id)");
    $row =  array(
        "mensaje" => "ok"
    );
    echo json_encode($row);
}
