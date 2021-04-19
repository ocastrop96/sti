<?php
require_once "../models/ConnectAlt.php";
if (isset($_POST["idSegmento"]) && !empty($_POST["idSegmento"])) {
    $qstmt = $db->query("CALL LISTAR_DIAG_SEGMENTO(" . $_POST["idSegmento"] . ")");
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
