<?php
require_once "../models/ConnectAlt.php";
if (isset($_POST["idCatego"]) && !empty($_POST["idCatego"])) {
    if ($_POST["idCatego"] == 1 || $_POST["idCatego"] == 4 || $_POST["idCatego"] == 5) {
        $qstmt = $db->query("CALL LISTAR_EQUPOSCOMPUTOMANT(" . $_POST["idCatego"] . ")");
        $rowCount = $qstmt->num_rows;
        if ($rowCount > 0) {
            echo '<option value="0">Seleccione serie EQ</option>';

            while ($row = $qstmt->fetch_assoc()) {
                echo '<option value="' . $row['idEquipo'] . '">' . $row['serie'] . '</option>';
            }
        } else {
            echo '<option value="0">No hay  equipos existentes</option>';
        }
    } 
    elseif ($_POST["idCatego"] == 2 || $_POST["idCatego"] == 6 || $_POST["idCatego"] == 7 || $_POST["idCatego"] == 8) {
        # code...
    }
    else {
        echo '<option value="0">No hay  equipos existentes</option>';
    }
}
// if (isset($_POST["idOficina"]) && !empty($_POST["idOficina"])) {
//     $qstmt = $db->query("CALL LISTAR_SERVICIOS(" . $_POST["idOficina"] . ")");
//     $rowCount = $qstmt->num_rows;

//     if ($rowCount > 0) {
//         echo '<option value="0">Seleccione Servicio</option>';

//         while ($row = $qstmt->fetch_assoc()) {
//             echo '<option value="' . $row['id_subarea'] . '">' . $row['subarea'] . '</option>';
//         }
//     } else {
//         echo '<option value="0">No hay servicios relacionados</option>';
//     }
// }
