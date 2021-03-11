<?php
class ControladorCategorias{
    static public function ctrListarCategorias($item,$valor){
        $tabla = "ws_categorias";
        $repuesta = ModeloCategorias::mdlListarCategorias($tabla,$item,$valor);
        return $repuesta;
    }

    static public function ctrListarCategoriaComputo(){
        $repuesta = ModeloCategorias::mdlListarCatComputo();
        return $repuesta;
    }

    static public function ctrListarCategoriaRedes(){
        $repuesta = ModeloCategorias::mdlListarCatRedes();
        return $repuesta;
    }

    static public function ctrListarCategoriaOtros(){
        $repuesta = ModeloCategorias::mdlListarCatOtros();
        return $repuesta;
    }

    static public function ctrListarCategoriaOtros2(){
        $repuesta = ModeloCategorias::mdlListarCatOtros2();
        return $repuesta;
    }

    static public function ctrRegistrarCategorias(){
        if (isset($_POST["newCategoria"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["newCategoria"])) {
                $tabla = "ws_categorias";
                $datos = array(
                    "categoria" => $_POST["newCategoria"],
                    "segmento" => $_POST["newSeg"]
                );

                $respuestReg = ModeloCategorias::mdlRegistrarCategoria($tabla,$datos);
                if ($respuestReg == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "La Categoría ha sido registrada con éxito",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          }).then((result)=>{
                            if(result.value){
                                window.location = "categorias";
                            }});
                      </script>';
                }
                else{
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Hubo un error al registrar sus datos",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                    }).then((result)=>{
                      if(result.value){
                          window.location = "categorias";
                      }});
                </script>';
                }
            }
            else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ingrese correctamente sus datos",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                }).then((result)=>{
                  if(result.value){
                      window.location = "categorias";
                  }});
            </script>';
            }  
        }
    }

    static public function ctrEditarCategorias(){
        if (isset($_POST["edtCategoria"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["edtCategoria"])) {
                $tabla = "ws_categorias";
                $datos = array(
                    "categoria" => $_POST["edtCategoria"],
                    "segmento" => $_POST["edtSeg"],
                    "id" => $_POST["idCategoria"]
                );

                $respuestEdit = ModeloCategorias::mdlEditarCategoria($tabla,$datos);
                if ($respuestEdit == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "La Categoría ha sido editada con éxito",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          }).then((result)=>{
                            if(result.value){
                                window.location = "categorias";
                            }});
                      </script>';
                }
                else{
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Hubo un error al editar sus datos",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                    }).then((result)=>{
                      if(result.value){
                          window.location = "categorias";
                      }});
                </script>';
                }
            }
            else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ingrese correctamente sus datos",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                }).then((result)=>{
                  if(result.value){
                      window.location = "categorias";
                  }});
            </script>';
            }  
        }
    }

    static public function ctrEliminarCategorias(){
        if (isset($_GET["idCategoria"])) {
            $tabla = "ws_categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModeloCategorias::mdlEliminarCategoria($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Categoría ha sido eliminada con éxito!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result)=>{
                        if(result.value){
                            window.location = "categorias";
                        }});
                    </script>';
            }
        }
    }
}