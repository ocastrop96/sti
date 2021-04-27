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
            // 
            $datos = array(
                "fRegistroMant" => $fRegistroMant,
                "tipEquipo" => $_POST["tipEquipo"],
                "condInicial" => $_POST["condInEQ"],
                "idEquip" => $_POST["serieEQ"],
                "oficEquip" => $_POST["ofiEq"],
                "areaEquip" => $_POST["servEq"],
                "respoEquip" => $_POST["respEq"],
                "logdeta" => $_POST["detaEQ"],
                "descInc" => $_POST["descIniEQ"],
                "tecEvalua" => $_POST["tecEvEQ"],
                "diagnostico1" => $_POST["d1"],
                "diagnostico2" => $_POST["d2"],
                "diagnostico3" => $_POST["d3"],
                "diagnostico4" => $_POST["d4"],
                "diagnostico5" => $_POST["d5"],
                "diagnostico6" => $_POST["d6"],
                "diagnostico7" => $_POST["d7"],
                "diagnostico8" => $_POST["d8"],
                "fEvalua" => $fe1f,
                "primera_eval" => $_POST["priEvaEQ"],
                "fInicio" => $fe2f,
                "fFin" => $fe3f,
                "tipTrabajo" => $_POST["tipTrabEQ"],
                "tecResp" => $_POST["tecResEQ"],
                "accion1" => $_POST["a1"],
                "accion2" => $_POST["a2"],
                "accion3" => $_POST["a3"],
                "accion4" => $_POST["a4"],
                "accion5" => $_POST["a5"],
                "accion6" => $_POST["a6"],
                "accion7" => $_POST["a7"],
                "accion8" => $_POST["a8"],
                "recomendaciones" => $_POST["recoFEQ"],
                "estAtencion" => $_POST["estAtEQ"],
                "condFinal" => $_POST["condFEQ"],
                "servTerce" => $_POST["tercEq"],
                "otros" => $_POST["obsOtros"],
                "obsOtros" => $_POST["detalleOtros"],
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

            // Condiciones para el listado de diagnosticos y acciones realizadas
        }
    }
    static public function ctrEditarMantenimiento()
    {
        if (isset($_POST["ncorrelativo"])) {
            $item = "correlativo_Mant";
            $valor = $_POST["ncorrelativo"];
            $traerFichaMant = ModeloMantenimientos::mdlListarFichasMant($item, $valor);
            // Condiciones si se modificaron o no las tablas

            // Bloque de guardado de edición
            date_default_timezone_set('America/Lima');
            $fRegistroMant = date("Y-m-d");
            // Bloque de conversión de fechas
            $fE1 = $_POST["edfEva"];
            $dateFE1 = str_replace('/', '-', $fE1);
            $fe1f = date('Y-m-d', strtotime($dateFE1));

            $fE2 = $_POST["edfInicio"];
            $dateFE2 = str_replace('/', '-', $fE2);
            $fe2f = date('Y-m-d', strtotime($dateFE2));

            $fE3 = $_POST["edfFin"];
            $dateFE3 = str_replace('/', '-', $fE3);
            $fe3f = date('Y-m-d', strtotime($dateFE3));
            //Añadir Contador en Acciones
            //Añadir Contador en Acciones
            $datos = array(
                "idMantenimiento" => $_POST["idMantenimiento"],
                "tipEquipo" => $_POST["edtipEquipo"],
                "condInicial" => $_POST["edcondInEQ"],
                "idEquip" => $_POST["edserieEQ"],
                "oficEquip" => $_POST["edofiEq"],
                "areaEquip" => $_POST["edservEq"],
                "respoEquip" => $_POST["edrespEq"],
                "logdeta" => $_POST["eddetaEQ"],
                "descInc" => $_POST["eddescIniEQ"],
                "tecEvalua" => $_POST["edtecEvEQ"],
                "diagnostico1" => $_POST["edd1"],
                "diagnostico2" => $_POST["edd2"],
                "diagnostico3" => $_POST["edd3"],
                "diagnostico4" => $_POST["edd4"],
                "diagnostico5" => $_POST["edd5"],
                "diagnostico6" => $_POST["edd6"],
                "diagnostico7" => $_POST["edd7"],
                "diagnostico8" => $_POST["edd8"],
                "fEvalua" => $fe1f,
                "primera_eval" => $_POST["edpriEvaEQ"],
                "fInicio" => $fe2f,
                "fFin" => $fe3f,
                "tipTrabajo" => $_POST["edtipTrabEQ"],
                "tecResp" => $_POST["edtecResEQ"],
                "accion1" => $_POST["eda1"],
                "accion2" => $_POST["eda2"],
                "accion3" => $_POST["eda3"],
                "accion4" => $_POST["eda4"],
                "accion5" => $_POST["eda5"],
                "accion6" => $_POST["eda6"],
                "accion7" => $_POST["eda7"],
                "accion8" => $_POST["eda8"],
                "recomendaciones" => $_POST["edrecoFEQ"],
                "estAtencion" => $_POST["edestAtEQ"],
                "condFinal" => $_POST["edcondFEQ"],
                "servTerce" => $_POST["edtercEq"],
                "otros" => $_POST["edobsOtros"],
                "obsOtros" => $_POST["eddetalleOtros"],
                "sgmtoManto" => $_POST["edsegmentado"]
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
    // bloque de reporte de mantenimientos PC
    static public function ctrListarMantoPC($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarMantoComputo($dato);
        return $repuesta;
    }
    // bloque de reporte de mantenimientos PC
    // bloque de reporte de mantenimientos Redes
    static public function ctrListarMantoRedes($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarMantoRedes($dato);
        return $repuesta;
    }
    // bloque de reporte de mantenimientos Redes
    // bloque de reporte de mantenimientos Impresoras y perifericos
    static public function ctrListarMantoImpresoras($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarMantoImpre($dato);
        return $repuesta;
    }
    // bloque de reporte de mantenimientos Impresoras y perifericos
    // bloque de reporte de mantenimientos Restantes
    static public function ctrListarMantoOtros($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarMantoOtros($dato);
        return $repuesta;
    }
    // bloque de reporte de mantenimientos Restantes
}
