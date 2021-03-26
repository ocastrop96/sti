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
    } elseif ($_POST["idCatego"] == 2 || $_POST["idCatego"] == 6 || $_POST["idCatego"] == 7 || $_POST["idCatego"] == 8) {
        $qstmt = $db->query("CALL LISTAR_EQUPOSREDMANT(" . $_POST["idCatego"] . ")");
        $rowCount = $qstmt->num_rows;
        if ($rowCount > 0) {
            echo '<option value="0">Seleccione serie EQ</option>';

            while ($row = $qstmt->fetch_assoc()) {
                echo '<option value="' . $row['idEquipo'] . '">' . $row['serie'] . '</option>';
            }
        } else {
            echo '<option value="0">No hay  equipos existentes</option>';
        }
    } elseif ($_POST["idCatego"] == 3 || $_POST["idCatego"] == 9 || $_POST["idCatego"] == 14 || $_POST["idCatego"] == 15 || $_POST["idCatego"] == 16 || $_POST["idCatego"] == 17) {
        $qstmt = $db->query("CALL LISTAR_EQUPOSIMPREMANT(" . $_POST["idCatego"] . ")");
        $rowCount = $qstmt->num_rows;
        if ($rowCount > 0) {
            echo '<option value="0">Seleccione serie EQ</option>';

            while ($row = $qstmt->fetch_assoc()) {
                echo '<option value="' . $row['idEquipo'] . '">' . $row['serie'] . '</option>';
            }
        } else {
            echo '<option value="0">No hay  equipos existentes</option>';
        }
    } else {
        $qstmt = $db->query("CALL LISTAR_EQUPOSOTROS(" . $_POST["idCatego"] . ")");
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
}