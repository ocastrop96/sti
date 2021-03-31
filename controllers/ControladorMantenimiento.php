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
                $tabla = "ws_mantenimientos";
                $datos = array(
                    "fRegistroMant" => $fRegistroMant,
                    "diagnosticos" => $_POST["listaDiagnosticos"],
                    "acciones" => $_POST["listaAcciones"],
                    "logdeta" => $_POST["detaEQ"]
                );

                $rptRegDManto = ModeloMantenimientos::mdlRegistrarMantenimiento($tabla, $datos);
                if ($rptRegDManto == "ok") {
                    echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "Todo okey",
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
                // echo '<script>
                //         Swal.fire({
                //         icon: "success",
                //         title: "Todo okey",
                //         showConfirmButton: false,
                //         timer: 1200
                //     });
                //     function redirect() {
                //         window.location = "mantenimientos";
                //     }
                //     setTimeout(redirect, 1500);
                //     </script>';
            }
            // Condiciones para el listado de diagnosticos y acciones realizadas
        }
    }
    static public function ctrEditarMantenimiento()
    {
    }
    // Registrar Mantenimiento
}
