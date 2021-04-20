<?php
require_once "../models/ConnectAlt.php";
if (isset($_POST["sgmt"]) && !empty($_POST["existe"]) && !empty($_POST["existe2"]) && !empty($_POST["existe3"]) && !empty($_POST["existe4"]) && !empty($_POST["existe5"]) && !empty($_POST["existe6"]) && !empty($_POST["existe7"])) {
    $qstmt = $db->query("CALL LISTA_SACCI7(" . $_POST["sgmt"] . "," . $_POST["existe"] . "," . $_POST["existe2"] . "," . $_POST["existe3"] . "," . $_POST["existe4"] . "," . $_POST["existe5"] . "," . $_POST["existe6"] . "," . $_POST["existe7"] . ")");
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
