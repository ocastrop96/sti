<?php
require_once "../models/ConnectAlt2.php";
$idUsuario = $_POST["idUser"];
$newPassword = $_POST["chgClave"];
$vnewPassword = $_POST["vchgClave"];

if ($newPassword != "" && $vnewPassword != "") {
    $encrypta = crypt($newPassword, '$2a$07$usesomesillystringforsalt$');
    $cq = "call ACTUALIZAR_CONTRASEÑA($idUsuario,'$encrypta')";
    echo mysqli_query($conexion, $cq);
}
