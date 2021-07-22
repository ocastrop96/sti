<?php
require_once "../models/ConnectAlt.php";
if (isset($_POST["sgmt"]) && !empty($_POST["existe"])) {
    $qstmt = $db->query("CALL LISTA_SACCI1(" . $_POST["sgmt"] . "," . $_POST["existe"] . ")");
    $rowCount = $qstmt->num_rows;
    if ($rowCount > 0) {
        echo '<option value="0">Seleccione Accion Realizada</option>';
        while ($row = $qstmt->fetch_assoc()) {
            echo '<option value="' . $row['idAccion'] . '">' . $row['accionrealizada'] . '</option>';
        }
    } else {
        echo '<option value="0">No hay acciones existentes</option>';
    }
}