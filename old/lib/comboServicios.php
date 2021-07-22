<?php
require_once "../models/ConnectAlt.php";

if (isset($_POST["idOficina"]) && !empty($_POST["idOficina"])) {
    $qstmt = $db->query("CALL LISTAR_SERVICIOS(" . $_POST["idOficina"] . ")");
    $rowCount = $qstmt->num_rows;

    if ($rowCount > 0) {
        echo '<option value="0">Seleccione Servicio</option>';

        while ($row = $qstmt->fetch_assoc()) {
            echo '<option value="' . $row['id_subarea'] . '">' . $row['subarea'] . '</option>';
        }
    } else {
        echo '<option value="0">No hay servicios relacionados</option>';
    }
}
