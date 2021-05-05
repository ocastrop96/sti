<?php
class ControladorSubareas
{
    // Listar Subareas
    static public function ctrListarSubAreas($item, $valor)
    {
        $tabla = "ws_servicios";
        $respuesta = ModeloSubareas::mdlListarSubareas($tabla, $item, $valor);
        return $respuesta;
    }
    // Registrar Subareas
    static public function ctrRegistrarSubarea()
    {
        if (isset($_POST["newSubarea"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newSubarea"])) {
                $datos = array(
                    "area" => $_POST["oficina"],
                    "subarea" => $_POST["newSubarea"]
                );
                $respuestaReg = ModeloSubareas::mdlRegistrarSubarea($datos);
                if ($respuestaReg == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "La subarea ha sido registrada con éxito",
                                showConfirmButton: false,
                                timer: 900
                            });
                            function redirect() {
                                window.location = "servicios";
                            }
                            setTimeout(redirect, 900);
                      </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "Ingrese correctamente sus datos sin caracteres especiales ni tildes",
                        showConfirmButton: false,
                        timer: 900
                        });
                        function redirect() {
                            window.location = "servicios";
                        }
                        setTimeout(redirect, 900);
                    </script>';
            }
        }
    }

    // Editar Subareas
    static public function ctrEditarSubarea()
    {
        if (isset($_POST["edtSubarea"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["edtSubarea"])) {
                $table = "ws_servicios";
                $datos = array(
                    "subarea" => $_POST["edtSubarea"],
                    "area" => $_POST["edtoficina"],
                    "id" => $_POST["idSubArea"]
                );

                $respuestaRegSubarea = ModeloSubareas::mdlEditarSubarea($table, $datos);

                if ($respuestaRegSubarea == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El servicio ha sido editado con éxito",
                            showConfirmButton: false,
                            timer: 900
                          });
                          function redirect() {
                            window.location = "servicios";
                        }
                        setTimeout(redirect, 900);
                      </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "No ingrese caracteres especiales, solo se admiten números y letras",
                  showConfirmButton: false,
                  timer: 900
                });
                function redirect() {
                    window.location = "servicios";
                }
                setTimeout(redirect, 900);
            </script>';
            }
        }
    }

    // Eliminar Subarea
    static public function ctrEliminarSubarea()
    {
        if (isset($_GET["idSubArea"])) {
            $datos = $_GET["idSubArea"];
            $respuesta = ModeloSubareas::mdlEliminarSubarea($datos);
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡El servicio ha sido eliminado con éxito!",
                        showConfirmButton: false,
                        timer: 1500
                        });
                        function redirect() {
                            window.location = "servicios";
                        }
                        setTimeout(redirect, 1500);
                    </script>';
            }
        }
    }
}
