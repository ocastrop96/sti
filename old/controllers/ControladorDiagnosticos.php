<?php
class ControladorDiagnosticos
{
    static public function ctrListarDiagnosticos($item, $valor)
    {
        $respuesta = ModeloDiagnosticos::mdlListarDiagnosticos($item, $valor);
        return $respuesta;
    }
    static public function ctrListarTrabajosManto($item, $valor)
    {
        $respuesta = ModeloDiagnosticos::mdlListarTrabajosManto($item, $valor);
        return $respuesta;
    }

    static public function ctrRegistrarDiagnosticos()
    {
        if (isset($_POST["newDiagnostico"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newDiagnostico"])) {
                $tabla = "ws_diagnosticos";
                $datos = $_POST["newDiagnostico"];
                $datos = array(
                    "diagnostico" => $_POST["newDiagnostico"],
                    "categoria" => $_POST["caDiag"]
                );

                $rptRegDiagnostico = ModeloDiagnosticos::mdlRegistrarDiagnostico($tabla, $datos);
                if ($rptRegDiagnostico == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El diagnóstico ha sido registrado con éxito",
                            showConfirmButton: false,
                            timer: 1000
                              });
                              function redirect() {
                                  window.location = "diagnosticos";
                              }
                              setTimeout(redirect, 1000);
                      </script>';
                } else {
                    echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ha ocurrido un error al registrar sus datos",
                  showConfirmButton: false,
                  timer: 1400
                    });
                    function redirect() {
                        window.location = "diagnosticos";
                    }
                    setTimeout(redirect, 1400);
            </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ingrese correctamente sus datos, solo se permiten letras",
                  showConfirmButton: false,
                  timer: 1400
                    });
                    function redirect() {
                        window.location = "diagnosticos";
                    }
                    setTimeout(redirect, 1400);
            </script>';
            }
        }
    }

    static public function ctrEditarDiagnosticos()
    {
        if (isset($_POST["edtDiagnostico"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["edtDiagnostico"])) {
                $tabla = "ws_diagnosticos";
                $datos = array(
                    "diagnostico" => $_POST["edtDiagnostico"],
                    "categoria" => $_POST["edtcaDiag"],
                    "id" => $_POST["idDiagnostico"]
                );
                $rpteditDiag = ModeloDiagnosticos::mdlEditarDiagnostico($tabla, $datos);
                if ($rpteditDiag == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El diagnóstico ha sido editado con éxito",
                            showConfirmButton: false,
                            timer: 1400
                              });
                              function redirect() {
                                  window.location = "diagnosticos";
                              }
                              setTimeout(redirect, 1400);
                      </script>';
                } else {
                    echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ha ocurrido un error al actualizar sus datos",
                  showConfirmButton: false,
                  timer: 1400
                    });
                    function redirect() {
                        window.location = "diagnosticos";
                    }
                    setTimeout(redirect, 1400);
            </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ingrese correctamente sus datos, solo se admiten letras",
                  showConfirmButton: false,
                  timer: 1400
                    });
                    function redirect() {
                        window.location = "diagnosticos";
                    }
                    setTimeout(redirect, 1400);
            </script>';
            }
        }
    }

    static public function ctrEliminarDiagnosticos()
    {
        if (isset($_GET["idDiagnostico"])) {
            $tabla = "ws_diagnosticos";
            $datos = $_GET["idDiagnostico"];

            $respuesta = ModeloDiagnosticos::mdlEliminarDiagnostico($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡El diagnostico ha sido eliminado con éxito!",
                        showConfirmButton: false,
                        timer: 1400
                          });
                          function redirect() {
                              window.location = "diagnosticos";
                          }
                          setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }
}
