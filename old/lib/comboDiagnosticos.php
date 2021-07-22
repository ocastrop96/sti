<?php
require_once "../models/ConnectAlt.php";
if (isset($_POST["sgmt"]) && !empty($_POST["existe"])) {
    $qstmt = $db->query("CALL LISTA_SDIAG(" . $_POST["sgmt"] . "," . $_POST["existe"] . ")");
    $rowCount = $qstmt->num_rows;
    if ($rowCount > 0) {
        echo '<option value="0">Seleccione Diagnostico</option>';
        while ($row = $qstmt->fetch_assoc()) {
            echo '<option value="' . $row['idDiagnostico'] . '">' . $row['diagnostico'] . '</option>';
        }
    } else {
        echo '<option value="0">No hay diagnósticos existentes</option>';
    }
}