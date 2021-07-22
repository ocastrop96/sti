<?php
class ControladorResponsables
{
    static public function ctrListarResponsables($item, $valor)
    {
        $respuesta = ModeloResponsables::mdlListarResponsables($item, $valor);
        return $respuesta;
    }
    static public function ctrRegistrarResponsables()
    {
        if (isset($_POST["nombRes"]) && isset($_POST["apeRes"])) {
            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]+$/', $_POST["nombRes"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]+$/', $_POST["apeRes"])
            ) {
                $datos = array(
                    "dni" => $_POST["dniResponsable"],
                    "nombresResp" => $_POST["nombRes"],
                    "apellidosResp" => $_POST["apeRes"],
                    "idOficina" => $_POST["oficinaRes"],
                    "idServicio" => $_POST["servicioRes"]
                );
                $rptRegResp = ModeloResponsables::mdlRegistrarResponsables($datos);
                if ($rptRegResp == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "El Usuario responsable ha sido registrado con éxito",
                                showConfirmButton: false,
                                timer: 1300
                            });
                            function redirect() {
                                window.location = "responsables";
                            }
                            setTimeout(redirect, 1300);
                      </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Ingrese correctamente sus datos",
                    showConfirmButton: false,
                    timer: 1200
                });
                function redirect() {
                    window.location = "responsables";
                }
                setTimeout(redirect, 1200);
            </script>';
            }
        }
    }
    static public function ctrEditarResponsables()
    {
        if (isset($_POST["edtnombRes"]) && isset($_POST["edtapeRes"])) {
            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]+$/', $_POST["edtnombRes"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]+$/', $_POST["edtapeRes"])
            ) {
                $datos = array(
                    "dni" => $_POST["edtdniResponsable"],
                    "nombres" => $_POST["edtnombRes"],
                    "apellidos" => $_POST["edtapeRes"],
                    "oficina" => $_POST["edtoficinaRes"],
                    "servicio" => $_POST["edtservicioRes"],
                    "id" => $_POST["idResponsable"]
                );

                $respuestaEditarResp = ModeloResponsables::mdlEditarResponsables($datos);

                if ($respuestaEditarResp == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "El usuario responsable ha sido editado con éxito",
                                showConfirmButton: false,
                                timer: 1300
                            });
                            function redirect() {
                                window.location = "responsables";
                            }
                            setTimeout(redirect, 1300);
                      </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Ingrese correctamente sus datos",
                    showConfirmButton: false,
                    timer: 1200
                });
                function redirect() {
                    window.location = "responsables";
                }
                setTimeout(redirect, 1200);
                </script>';
            }
        }
    }
    static public function ctrEliminarResponsables()
    {
        if (isset($_GET["idResponsable"])) {
            $datos = $_GET["idResponsable"];

            $respuesta = ModeloResponsables::mdlEliminarResponsables($datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡El usuario responsable ha sido eliminado con éxito!",
                            showConfirmButton: false,
                            timer: 1400
                        });
                        function redirect() {
                            window.location = "responsables";
                        }
                        setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }
}
