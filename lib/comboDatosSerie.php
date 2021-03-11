<?php
require_once "../models/ConnectAlt.php";

if (isset($_POST["idEquipo"]) && !empty($_POST["idEquipo"])) {
    $qstmt = $db->query("SELECT uResponsable,office,service,condicion,estadoEQ FROM ws_equipos where idEquipo = " . $_POST["idEquipo"] . "");
    $row = $qstmt->fetch_assoc();
    echo json_encode($row);
}
