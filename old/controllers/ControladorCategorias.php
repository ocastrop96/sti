<?php
class ControladorCategorias
{
    static public function ctrListarCategorias($item, $valor)
    {
        $tabla = "ws_categorias";
        $repuesta = ModeloCategorias::mdlListarCategorias($tabla, $item, $valor);
        return $repuesta;
    }

    static public function ctrListarCategoriaComputo()
    {
        $repuesta = ModeloCategorias::mdlListarCatComputo();
        return $repuesta;
    }

    static public function ctrListarCategoriaRedes()
    {
        $repuesta = ModeloCategorias::mdlListarCatRedes();
        return $repuesta;
    }

    static public function ctrListarCategoriaOtros()
    {
        $repuesta = ModeloCategorias::mdlListarCatOtros();
        return $repuesta;
    }

    static public function ctrListarCategoriaOtros2()
    {
        $repuesta = ModeloCategorias::mdlListarCatOtros2();
        return $repuesta;
    }

    static public function ctrRegistrarCategorias()
    {
        if (isset($_POST["newCategoria"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]+$/', $_POST["newCategoria"])) {
                $datos = array(
                    "categoria" => $_POST["newCategoria"],
                    "segmento" => $_POST["newSeg"]
                );

                $respuestReg = ModeloCategorias::mdlRegistrarCategoria($datos);
                if ($respuestReg == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "La Categoría ha sido registrada con éxito",
                            showConfirmButton: false,
                            timer: 1300
                            });
                            function redirect() {
                                window.location = "categorias";
                            }
                            setTimeout(redirect, 1300);
                      </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Hubo un error al registrar sus datos",
                      showConfirmButton: false,
                      timer: 1300
                      });
                      function redirect() {
                        window.location = "categorias";
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
                  timer: 1300
                });
                function redirect() {
                    window.location = "categorias";
                }
                setTimeout(redirect, 1300);
            </script>';
            }
        }
    }

    static public function ctrEditarCategorias()
    {
        if (isset($_POST["edtCategoria"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]+$/', $_POST["edtCategoria"])) {
                $datos = array(
                    "categoria" => $_POST["edtCategoria"],
                    "segmento" => $_POST["edtSeg"],
                    "id" => $_POST["idCategoria"]
                );

                $respuestEdit = ModeloCategorias::mdlEditarCategoria($datos);
                if ($respuestEdit == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "La Categoría ha sido editada con éxito",
                            showConfirmButton: false,
                            timer: 1300
                            });
                            function redirect() {
                              window.location = "categorias";
                            }
                            setTimeout(redirect, 1300);
                      </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Hubo un error al editar sus datos",
                      showConfirmButton: false,
                      timer: 1300
                      });
                      function redirect() {
                        window.location = "categorias";
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
                  timer: 1300
                  });
                  function redirect() {
                    window.location = "categorias";
                  }
                  setTimeout(redirect, 1300);
            </script>';
            }
        }
    }

    static public function ctrEliminarCategorias()
    {
        if (isset($_GET["idCategoria"])) {
            $tabla = "ws_categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModeloCategorias::mdlEliminarCategoria($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Categoría ha sido eliminada con éxito!",
                        showConfirmButton: false,
                        timer: 1300
                        });
                        function redirect() {
                          window.location = "categorias";
                        }
                        setTimeout(redirect, 1300);
                    </script>';
            }
        }
    }
}
