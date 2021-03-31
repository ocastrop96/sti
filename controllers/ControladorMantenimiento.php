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
                $tabla = "ws_mantenimientos";
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

                $rptRegDManto = ModeloMantenimientos::mdlRegistrarMantenimiento($tabla, $datos);
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
    }
    // Registrar Mantenimiento
}
