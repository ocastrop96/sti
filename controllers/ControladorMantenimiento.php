<?php
class ControladorMantenimientos
{
    static public function ctrListarDatosEqOtros($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqOtros($dato);
        return $repuesta;
    }
    static public function ctrListarDatosEqComputo($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqComputo($dato);
        return $repuesta;
    }

    static public function ctrListarDatosEqRedes($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqRedes($dato);
        return $repuesta;
    }
    static public function ctrListarDatosEqImp($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqImp($dato);
        return $repuesta;
    }
    // listar mantenimientos
    static public function ctrListarFichasManto($item, $valor)
    {
        $respuesta = ModeloMantenimientos::mdlListarFichasMant($item, $valor);
        return $respuesta;
    }
    // listar mantenimientos
    // Registrar Mantenimiento
    static public function ctrRegistrarMantenimiento()
    {
        if (isset($_POST["detaEQ"])) {
            // Condiciones para el listado de diagnosticos y acciones realizadas
            if ($_POST["listaDiagnosticos"] == "" || $_POST["listaDiagnosticos"] == "[]" || $_POST["listaAcciones"] == "" || $_POST["listaAcciones"] == "[]") {
                echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "La Ficha no puede registrarse, si no hay diagnósticos y acciones ingresadas",
                        showConfirmButton: false,
                        timer: 1700
                    });
                    function redirect() {
                        window.location = "mantenimientos";
                    }
                    setTimeout(redirect, 1700);
                    </script>';
            } else {
                date_default_timezone_set('America/Lima');
                $fRegistroMant = date("Y-m-d");
                // Bloque de conversión de fechas
                $fE1 = $_POST["fEva"];
                $dateFE1 = str_replace('/', '-', $fE1);
                $fe1f = date('Y-m-d', strtotime($dateFE1));

                $fE2 = $_POST["fInicio"];
                $dateFE2 = str_replace('/', '-', $fE2);
                $fe2f = date('Y-m-d', strtotime($dateFE2));

                $fE3 = $_POST["fFin"];
                $dateFE3 = str_replace('/', '-', $fE3);
                $fe3f = date('Y-m-d', strtotime($dateFE3));
                //Añadir Contador en Diagnosticos
                $listaDiag = json_decode($_POST["listaDiagnosticos"], true);
                foreach ($listaDiag as $key => $value) {
                    // array_push($totalDiagnosticosRegistrados, $value["conteo"]);
                    $datos = $value["id"];
                    $contDiagnosticos = ModeloMantenimientos::mdlActualizarDiagnostico($datos);
                }
                //Añadir Contador en Diagnosticos
                //Añadir Contador en Acciones
                $listaAcci = json_decode($_POST["listaAcciones"], true);
                foreach ($listaAcci as $key => $value) {
                    $datos2 = $value["id"];
                    $contAcciones = ModeloMantenimientos::mdlActualizarAccion($datos2);
                }
                //Añadir Contador en Acciones
                // 
                $datos = array(
                    "logdeta" => $_POST["detaEQ"],
                    "fRegistroMant" => $fRegistroMant,
                    "primera_eval" => $_POST["priEvaEQ"],
                    "fEvalua" => $fe1f,
                    "fInicio" => $fe2f,
                    "fFin" => $fe3f,
                    "descInc" => $_POST["descIniEQ"],
                    "diagnosticos" => $_POST["listaDiagnosticos"],
                    "acciones" => $_POST["listaAcciones"],
                    "recomendaciones" => $_POST["recoFEQ"],
                    "servTerce" => $_POST["tercEq"],
                    "otros" => $_POST["obsOtros"],
                    "obsOtros" => $_POST["detalleOtros"],
                    "tipEquipo" => $_POST["tipEquipo"],
                    "condInicial" => $_POST["condInEQ"],
                    "idEquip" => $_POST["serieEQ"],
                    "oficEquip" => $_POST["ofiEq"],
                    "areaEquip" => $_POST["servEq"],
                    "respoEquip" => $_POST["respEq"],
                    "tecEvalua" => $_POST["tecEvEQ"],
                    "tipTrabajo" => $_POST["tipTrabEQ"],
                    "estAtencion" => $_POST["estAtEQ"],
                    "condFinal" => $_POST["condFEQ"],
                    "usRegistra" => $_POST["uregMant"],
                    "sgmtoManto" => $_POST["segmentado"]
                );

                $rptRegDManto = ModeloMantenimientos::mdlRegistrarMantenimiento($datos);
                if ($rptRegDManto == "ok") {

                    echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "La Ficha de Mantenimiento ha sido registrada con éxito",
                        showConfirmButton: false,
                        timer: 1300
                    });
                    function redirect() {
                        window.location = "mantenimientos";
                    }
                    setTimeout(redirect, 1300);
                    </script>';
                } else {
                    echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "Ha ocurrido un error, intente nuevamente",
                        showConfirmButton: false,
                        timer: 1300
                    });
                    function redirect() {
                        window.location = "mantenimientos";
                    }
                    setTimeout(redirect, 1300);
                    </script>';
                }
            }
            // Condiciones para el listado de diagnosticos y acciones realizadas
        }
    }
    static public function ctrEditarMantenimiento()
    {
        if (isset($_POST["ncorrelativo"])) {
            if ($_POST["listaDiagnosticos"] == "[]" || $_POST["listaAcciones"] == "[]") {
                echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "La Ficha no puede registrarse, si no hay diagnósticos y acciones ingresadas",
                        showConfirmButton: false,
                        timer: 1700
                    });
                    function redirect() {
                        window.location = "mantenimientos";
                    }
                    setTimeout(redirect, 1700);
                    </script>';
            } else {
                $item = "correlativo_Mant";
                $valor = $_POST["ncorrelativo"];
                $traerFichaMant = ModeloMantenimientos::mdlListarFichasMant($item, $valor);
                // Condiciones si se modificaron o no las tablas

                if ($_POST["listaDiagnosticos"] == "" && $_POST["listaAcciones"] == "") {
                    $listadoDiagnosticos = $traerFichaMant["diagnosticos"];
                    $listadoAcciones = $traerFichaMant["acciones"];
                    $cambioDiagnosticos = false;
                    $cambioAcciones = false;
                } elseif ($_POST["listaDiagnosticos"] != "" && $_POST["listaAcciones"] == "") {
                    $listadoDiagnosticos = $_POST["listaDiagnosticos"];
                    $listadoAcciones = $traerFichaMant["acciones"];
                    $cambioDiagnosticos = true;
                    $cambioAcciones = false;
                } elseif ($_POST["listaDiagnosticos"] == "" && $_POST["listaAcciones"] != "") {
                    $listadoDiagnosticos = $traerFichaMant["diagnosticos"];
                    $listadoAcciones = $_POST["listaAcciones"];
                    $cambioDiagnosticos = false;
                    $cambioAcciones = true;
                } elseif ($_POST["listaDiagnosticos"] != "" && $_POST["listaAcciones"] != "") {
                    $listadoDiagnosticos = $_POST["listaDiagnosticos"];
                    $listadoAcciones = $_POST["listaAcciones"];
                    $cambioDiagnosticos = true;
                    $cambioAcciones = true;
                }
                // Condiciones si se modificaron o no las tablas
                // Verificación de cambios
                if ($cambioDiagnosticos && $cambioAcciones) {
                    // Seteo Pre-modificación
                    $diagnosticos = json_decode($traerFichaMant["diagnosticos"], true);
                    foreach ($diagnosticos as $key => $value) {
                        $datos = $value["id"];
                        $nuevoConteoDiag = ModeloMantenimientos::mdlActualizarDiagnostico2($datos);
                    }
                    $acciones = json_decode($traerFichaMant["acciones"], true);
                    foreach ($acciones as $key => $value) {
                        $datos2 = $value["id"];
                        $nuevoConteoAcc = ModeloMantenimientos::mdlActualizarAccion2($datos2);
                    }
                    // Seteo Post-modificación
                    $diagnosticos_2 = json_decode($listadoDiagnosticos, true);
                    foreach ($diagnosticos_2 as $key => $value) {
                        $datos_2 = $value["id"];
                        $nuevoConteoDiag_2 = ModeloMantenimientos::mdlActualizarDiagnostico($datos_2);
                    }
                    $acciones_2 = json_decode($listadoAcciones, true);
                    foreach ($acciones_2 as $key => $value) {
                        $datos2_2 = $value["id"];
                        $nuevoConteoAcc_2 = ModeloMantenimientos::mdlActualizarAccion($datos2_2);
                    }
                } elseif (!$cambioDiagnosticos && $cambioAcciones) {
                    // Seteo Pre-modificación
                    $acciones = json_decode($traerFichaMant["acciones"], true);
                    foreach ($acciones as $key => $value) {
                        $datos2 = $value["id"];
                        $nuevoConteoAcc = ModeloMantenimientos::mdlActualizarAccion2($datos2);
                    }
                    // Seteo Post-modificación
                    $acciones_2 = json_decode($listadoAcciones, true);
                    foreach ($acciones_2 as $key => $value) {
                        $datos2_2 = $value["id"];
                        $nuevoConteoAcc_2 = ModeloMantenimientos::mdlActualizarAccion($datos2_2);
                    }
                } elseif ($cambioDiagnosticos && !$cambioAcciones) {
                    // Seteo Pre-modificación
                    $diagnosticos = json_decode($traerFichaMant["diagnosticos"], true);
                    foreach ($diagnosticos as $key => $value) {
                        $datos = $value["id"];
                        $nuevoConteoDiag = ModeloMantenimientos::mdlActualizarDiagnostico2($datos);
                    }
                    // Seteo Post-modificación
                    $diagnosticos_2 = json_decode($listadoDiagnosticos, true);
                    foreach ($diagnosticos_2 as $key => $value) {
                        $datos_2 = $value["id"];
                        $nuevoConteoDiag_2 = ModeloMantenimientos::mdlActualizarDiagnostico($datos_2);
                    }
                }

                // Bloque de guardado de edición
                date_default_timezone_set('America/Lima');
                $fRegistroMant = date("Y-m-d");
                // Bloque de conversión de fechas
                $fE1 = $_POST["fEva"];
                $dateFE1 = str_replace('/', '-', $fE1);
                $fe1f = date('Y-m-d', strtotime($dateFE1));

                $fE2 = $_POST["fInicio"];
                $dateFE2 = str_replace('/', '-', $fE2);
                $fe2f = date('Y-m-d', strtotime($dateFE2));

                $fE3 = $_POST["fFin"];
                $dateFE3 = str_replace('/', '-', $fE3);
                $fe3f = date('Y-m-d', strtotime($dateFE3));
                //Añadir Contador en Acciones
                //Añadir Contador en Acciones
                $datos = array(
                    "correlativo_Mant" => $_POST["ncorrelativo"],
                    "logdeta" => $_POST["detaEQ"],
                    "primera_eval" => $_POST["priEvaEQ"],
                    "fEvalua" => $fe1f,
                    "fInicio" => $fe2f,
                    "fFin" => $fe3f,
                    "descInc" => $_POST["descIniEQ"],
                    "diagnosticos" => $listadoDiagnosticos,
                    "acciones" => $listadoAcciones,
                    "recomendaciones" => $_POST["recoFEQ"],
                    "servTerce" => $_POST["tercEq"],
                    "otros" => $_POST["obsOtros"],
                    "obsOtros" => $_POST["detalleOtros"],
                    "tipEquipo" => $_POST["tipEquipo"],
                    "condInicial" => $_POST["condInEQ"],
                    "idEquip" => $_POST["serieEQ"],
                    "oficEquip" => $_POST["ofiEq"],
                    "areaEquip" => $_POST["servEq"],
                    "respoEquip" => $_POST["respEq"],
                    "tecEvalua" => $_POST["tecEvEQ"],
                    "tipTrabajo" => $_POST["tipTrabEQ"],
                    "estAtencion" => $_POST["estAtEQ"],
                    "condFinal" => $_POST["condFEQ"],
                    "sgmtoManto" => $_POST["segmentado"]
                );

                $accExc = "Modificación";
                $datosAudi = array(
                    "accExec" => $accExc,
                    "fecha_audi" => $fRegistroMant,
                    "idDoc" => $traerFichaMant["idMantenimiento"],
                    "usExec" => $_POST["uedtMant"]
                );
                $regAudito = ModeloMantenimientos::mdlRegistroAuditoria($datosAudi);

                $rptRegDManto = ModeloMantenimientos::mdlEditarMantenimiento($datos);
                if ($rptRegDManto == "ok") {
                    echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "La Ficha de Mantenimiento ha sido actualizada con éxito",
                        showConfirmButton: false,
                        timer: 1300
                    });
                    function redirect() {
                        window.location = "mantenimientos";
                    }
                    setTimeout(redirect, 1300);
                    </script>';
                } else {
                    echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "Ha ocurrido un error, intente nuevamente",
                        showConfirmButton: false,
                        timer: 1300
                    });
                    function redirect() {
                        window.location = "mantenimientos";
                    }
                    setTimeout(redirect, 1300);
                    </script>';
                }
            }
        }
    }

    static public function ctrAnularMantenimiento()
    {
        if (isset($_GET["idMantenimiento"])) {

            $datos = $_GET["idMantenimiento"];
            $usuarioAnu = $_GET["idUsuario"];

            date_default_timezone_set('America/Lima');
            $fAnulaMant = date("Y-m-d");

            $item = "idMantenimiento";
            $valor = $datos;
            $traerFichaMant2 = ModeloMantenimientos::mdlListarFichasMant($item, $valor);

            // Reduccion de conteo de diagnosticos y acciones
            $diagnosticos = json_decode($traerFichaMant2["diagnosticos"], true);
            foreach ($diagnosticos as $key => $value) {
                $datos3 = $value["id"];
                $nuevoConteoDiag3 = ModeloMantenimientos::mdlActualizarDiagnostico2($datos3);
            }
            $acciones = json_decode($traerFichaMant2["acciones"], true);
            foreach ($acciones as $key => $value) {
                $datos3 = $value["id"];
                $nuevoConteoAcc3 = ModeloMantenimientos::mdlActualizarAccion2($datos3);
            }

            // Registro auditoría
            $accExc = "Anulación";
            $datosAudi = array(
                "accExec" => $accExc,
                "fecha_audi" => $fAnulaMant,
                "idDoc" => $traerFichaMant2["idMantenimiento"],
                "usExec" => $usuarioAnu
            );
            $regAudito = ModeloMantenimientos::mdlRegistroAuditoria($datosAudi);
            // Registro auditoría
            $respuesta = ModeloMantenimientos::mdlAnularMantenimiento($datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Ficha de Integración ha sido anulada con éxito!",
                        showConfirmButton: false,
                        timer: 1300
                          });
                          function redirect() {
                              window.location = "mantenimientos";
                          }
                          setTimeout(redirect, 1300);
                    </script>';
            }
        }
    }
}
