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
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["newArea"])) {
                $tabla = "ws_departamentos";
                $datos = $_POST["newArea"];

                $respuestaRegistroArea = ModeloAreas::mdlRegistrarAreas($tabla, $datos);

                if ($respuestaRegistroArea == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El área ha sido registrada con éxito",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          }).then((result)=>{
                            if(result.value){
                                window.location = "oficinas";
                            }});
                      </script>';
                }
            }
            else{
                echo '<script>
                Swal.fire({
                  type: "error",
                  title: "Ingrese correctamente sus datos",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                }).then((result)=>{
                  if(result.value){
                      window.location = "oficinas";
                  }});
            </script>';
            }
        }
     }
    //Editar Área
    static public function ctrEditarArea()
    { 
        if (isset($_POST["edtArea"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["edtArea"])) {
                $tabla = "ws_departamentos";
                $datos = array(
                    "area" => $_POST["edtArea"],
                    "id" => $_POST["idArea"]
                );

                $respuestaRegistroArea = ModeloAreas::mdlEditarAreas($tabla, $datos);

                if ($respuestaRegistroArea == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "La Oficina o Departamento ha sido editado con éxito",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          }).then((result)=>{
                            if(result.value){
                                window.location = "oficinas";
                            }});
                      </script>';
                }
            }
            else{
                echo '<script>
                Swal.fire({
                  type: "error",
                  title: "Ingrese correctamente sus datos",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                }).then((result)=>{
                  if(result.value){
                      window.location = "oficinas";
                  }});
            </script>';
            }
        }
    }
    //Eliminar Área
    static public function ctrEliminarArea()
    { 
        if (isset($_GET["idOficina"])) {
            $tabla = "ws_departamentos";
            $datos = $_GET["idOficina"];

            $respuesta = ModeloAreas::mdlEliminarArea($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Oficina y/o Departamento ha sido eliminado con éxito!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result)=>{
                        if(result.value){
                            window.location = "oficinas";
                        }});
                    </script>';
            }
        }
    }
}
