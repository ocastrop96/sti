<?php

class ControladorAreas
{
    // Listar Áreas
    static public function ctrListarAreas($item, $valor)
    {
        $tabla = "ws_departamentos";
        $respuesta = ModeloAreas::mdlListarAreas($tabla, $item, $valor);
        return $respuesta;
    }

    // Crear Área
    static public function ctrRegistrarArea()
    {
        if (isset($_POST["newArea"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newArea"])) {
                $datos = $_POST["newArea"];
                $respuestaRegistroArea = ModeloAreas::mdlRegistrarAreas($datos);
                if ($respuestaRegistroArea == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "El área ha sido registrada con éxito",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            function redirect() {
                                window.location = "oficinas";
                            }
                            setTimeout(redirect, 1000);
                      </script>';
                }
            } else {
                echo '<script>
                  Swal.fire({
                    icon: "error",
                    title: "Ingrese correctamente sus datos",
                    showConfirmButton: false,
                    timer: 1000
                });
                function redirect() {
                    window.location = "oficinas";
                }
                setTimeout(redirect, 1000);
            </script>';
            }
        }
    }
    //Editar Área
    static public function ctrEditarArea()
    {
        if (isset($_POST["edtArea"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["edtArea"])) {
                $datos = array(
                    "area" => $_POST["edtArea"],
                    "id" => $_POST["idArea"]
                );
                $respuestaRegistroArea = ModeloAreas::mdlEditarAreas($datos);

                if ($respuestaRegistroArea == "ok") {
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "La Oficina o Departamento ha sido editado con éxito",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    function redirect() {
                        window.location = "oficinas";
                    }
                    setTimeout(redirect, 1500);
                      </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Ingrese correctamente sus datos",
                    showConfirmButton: false,
                    timer: 1500
                });
                function redirect() {
                    window.location = "oficinas";
                }
                setTimeout(redirect, 1500);
            </script>';
            }
        }
    }
    //Eliminar Área
    static public function ctrEliminarArea()
    {
        if (isset($_GET["idOficina"])) {
            $datos = $_GET["idOficina"];

            $respuesta = ModeloAreas::mdlEliminarArea($datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡La Oficina y/o Departamento ha sido eliminado con éxito!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        function redirect() {
                            window.location = "oficinas";
                        }
                        setTimeout(redirect, 1500);
                    </script>';
            }
        }
    }
}
