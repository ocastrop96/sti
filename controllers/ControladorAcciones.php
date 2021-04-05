<?php
class ControladorAcciones
{
    static public function ctrListarAcciones($item, $valor)
    {
        $respuesta = ModeloAcciones::mdlListarAcciones($item, $valor);
        return $respuesta;
    }

    static public function ctrRegistrarAccion()
    {
        if (isset($_POST["newAccion"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newAccion"])) {
                $tabla = "ws_acciones";
                $datos = array(
                    "accion" => $_POST["newAccion"],
                    "categoria" => $_POST["acDiag"]
                );

                $respuestaRegistroAccion = ModeloAcciones::mdlRegistrarAccion($tabla, $datos);

                if ($respuestaRegistroAccion == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "La acción ha sido registrada con éxito",
                            showConfirmButton: false,
                            timer: 1100
                              });
                              function redirect() {
                                  window.location = "acciones";
                              }
                              setTimeout(redirect, 1100);
                      </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Hubo un error al registrar sus datos",
                      showConfirmButton: false,
                      timer: 1100
                        });
                        function redirect() {
                            window.location = "acciones";
                        }
                        setTimeout(redirect, 1100);
                </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ingrese correctamente sus datos, solo se admiten letras",
                  showConfirmButton: false,
                  timer: 1100
                    });
                    function redirect() {
                        window.location = "acciones";
                    }
                    setTimeout(redirect, 1100);
            </script>';
            }
        }
    }
    static public function ctrEditarAccion()
    {
        if (isset($_POST["edtAccion"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["edtAccion"])) {
                $tabla = "ws_acciones";
                $datos = array(
                    "accion" => $_POST["edtAccion"],
                    "categoria" => $_POST["edtacDiag"],
                    "id" => $_POST["idAccion"]
                );

                $rpteditarAccion = ModeloAcciones::mdlEditarAccion($tabla, $datos);
                if ($rpteditarAccion == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "La acción seleccionada ha sido editada con éxito",
                            showConfirmButton: false,
                            timer: 1100
                              });
                              function redirect() {
                                  window.location = "acciones";
                              }
                              setTimeout(redirect, 1100);
                      </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Hubo un error al actualizar sus datos",
                      showConfirmButton: false,
                      timer: 1100
                        });
                        function redirect() {
                            window.location = "acciones";
                        }
                        setTimeout(redirect, 1100);
                </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ingrese correctamente sus datos, solo se admiten letras",
                  showConfirmButton: false,
                  timer: 1100
                    });
                    function redirect() {
                        window.location = "acciones";
                    }
                    setTimeout(redirect, 1100);
            </script>';
            }
        }
    }
    static public function ctrEliminarAccion()
    {
        if (isset($_GET["idAccion"])) {
            $tabla = "ws_acciones";
            $datos = $_GET["idAccion"];

            $respuesta = ModeloAcciones::mdlEliminarAccion($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Acción ha sido eliminada con éxito!",
                        showConfirmButton: false,
                        timer: 1100
                          });
                          function redirect() {
                              window.location = "acciones";
                          }
                          setTimeout(redirect, 1100);
                    </script>';
            }
        }
    }
}
