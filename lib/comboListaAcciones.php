<?php
require_once "../models/ConnectAlt.php";
if (isset($_POST["idAcciona"]) && !empty($_POST["idAcciona"])) {
    $qstmt = $db->query("CALL LISTAR_ACCI_SEGMENTO(" . $_POST["idAcciona"] . ")");
    $rowCount = $qstmt->num_rows;
    if ($rowCount > 0) {
        echo '<option value="0">Seleccione Accion realizada</option>';
        while ($row = $qstmt->fetch_assoc()) {
            echo '<option value="' . $row['idAccion'] . '">' . $row['accionrealizada'] . '</option>';
        }
    } else {
        echo '<option value="0">No hay acciones existentes</option>';
    }
}
