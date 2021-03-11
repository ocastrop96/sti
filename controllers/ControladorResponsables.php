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
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombRes"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apeRes"])
            ) {
                $datos = array(
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
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          }).then((result)=>{
                            if(result.value){
                                window.location = "responsables";
                            }});
                      </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ingrese correctamente sus datos",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                }).then((result)=>{
                  if(result.value){
                      window.location = "responsables";
                  }});
            </script>';
            }
        }
    }
    static public function ctrEditarResponsables()
    {
        if (isset($_POST["edtnombRes"]) && isset($_POST["edtapeRes"])) {
            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["edtnombRes"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["edtapeRes"])
            ) {
                $datos = array(
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
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                          }).then((result)=>{
                            if(result.value){
                                window.location = "responsables";
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
                      window.location = "responsables";
                  }});
                </script>';
            }
        }
    }
    static public function ctrEliminarResponsables()
    {
        if (isset($_GET["idResponsable"])) {
            $tabla = "ws_responsables";
            $datos = $_GET["idResponsable"];

            $respuesta = ModeloResponsables::mdlEliminarResponsables($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡El usuario responsable ha sido eliminado con éxito!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result)=>{
                        if(result.value){
                            window.location = "responsables";
                        }});
                    </script>';
            }
        }
    }
}
