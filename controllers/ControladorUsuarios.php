<?php
class ControladorUsuarios
{
    // Clase para el login de los usuarios
    static public function ctrLoginUsuario()
    {
        if (isset($_POST["logCuenta"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["logCuenta"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ].{7,15}+$/', $_POST["logClave"])
            ) {

                $cuenta = $_POST["logCuenta"];
                $encriptacion = crypt($_POST["logClave"], '$2a$07$usesomesillystringforsalt$');
                $respuesta = ModeloUsuarios::mdlLoginUsuario($cuenta);
                if ($respuesta["cuenta"] == $_POST["logCuenta"] && $respuesta["clave"] == $encriptacion) {

                    if ($respuesta["estado"] == 1) {

                        if ($respuesta["nintentos"] <= 3) {
                            $_SESSION["loginWS"] = "ok";
                            $_SESSION["id"] = $respuesta["id_usuario"];
                            $_SESSION["cuenta"] = $respuesta["cuenta"];
                            $_SESSION["nombres"] = $respuesta["nombres"];
                            $_SESSION["paterno"] = $respuesta["apellido_paterno"];
                            $_SESSION["materno"] = $respuesta["apellido_materno"];
                            $_SESSION["perfil"] = $respuesta["id_perfil"];
                            echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Acceso concedido...¡Bienvenido!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            function redirect(){
                                window.location = "dashboard";
                            }
                            setTimeout(redirect,1000);
                             </script>';
                        } else {
                            echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Número de intentos de acceso excedidos, comuníquese con el administrador para desbloquear su cuenta",
                                showConfirmButton: false,
                                timer: 1200
                            });
                            function redirect(){
                                window.location = "login";
                            }
                            setTimeout(redirect,1200);
                             </script>';
                        }
                        // Datos a usar en sesiones

                    } else {
                        echo '<script>
                        Swal.fire({
                            icon: "warning",
                            title: "Su cuenta de  usuario se encuentra desactivada, comuníquese con el administrador del sistema",
                            showConfirmButton: false,
                            timer: 1200
                        });
                        function redirect(){
                            window.location = "login";
                        }
                        setTimeout(redirect,1200);
                            </script>';
                    }
                } else if ($respuesta["cuenta"] == $_POST["logCuenta"]) {
                    $id_usuario = $respuesta["id_usuario"];
                    $registroIntentos = ModeloUsuarios::mdlRegistroIntentos($id_usuario);

                    $mensajeIntentos = "";
                    $limite = 3;
                    if ($respuesta["nintentos"] < 3) {
                        $mensajeIntentos = "Te quedan " . ($limite - $respuesta["nintentos"]) . " intento(s)";
                    } elseif ($respuesta["nintentos"] == 3) {
                        $mensajeIntentos = "No te quedan más intentos";
                    } else {
                        $mensajeIntentos = "Haz excedido el número de intentos. Tu cuenta ha sido bloqueada";
                    }
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "El usuario y/o contraseña ingresados no son correctos.' . $mensajeIntentos . '",
                        showConfirmButton: false,
                        timer: 1200
                    });
                    function redirect(){
                        window.location = "login";
                    }
                    setTimeout(redirect,1200);
                </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "El usuario y/o contraseña ingresados no son correctos",
                      showConfirmButton: false,
                      timer: 1200
                    });
                    function redirect(){
                        window.location = "login";
                    }
                    setTimeout(redirect,1200);
                </script>';
                }
            }
        }
    }

    // Mostrar Usuarios
    static public function ctrListar($item, $valor)
    {
        $tabla = "ws_usuarios";
        $respuesta = ModeloUsuarios::mdlLista($tabla, $item, $valor);
        return $respuesta;
    }
    // Mostrar Perfiles de Usuarios
    static public function ctrListarPerfiles($item, $valor)
    {
        $tabla = "ws_perfiles";
        $respuesta = ModeloUsuarios::mdlListaPerfiles($tabla, $item, $valor);
        return $respuesta;
    }
    // Registrar Usuarios
    static public function ctrRegistrarUsuario()
    {
        if (isset($_POST["dniUsuario"]) && isset($_POST["cuentaUsuario"]) && isset($_POST["claveUsuario"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["dniUsuario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["cuentaUsuario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ].{7,15}+$/', $_POST["claveUsuario"])
            ) {
                $tabla = "ws_usuarios";
                $encriptacion1 = crypt($_POST["claveUsuario"], '$2a$07$usesomesillystringforsalt$');

                $datos = array(
                    "dni" => $_POST["dniUsuario"],
                    "nombres" => $_POST["nombreUsuario"],
                    "apellidoPat" => $_POST["apellidoUsuarioPat"],
                    "apellidoMat" => $_POST["apellidoUsuarioMat"],
                    "perfil" => $_POST["perfilUsuario"],
                    "cuenta" => $_POST["cuentaUsuario"],
                    "clave" => $encriptacion1
                );

                // Envio de datos por array
                $respuestaRegistro = ModeloUsuarios::mdlRegistrarUsuario($tabla, $datos);

                if ($respuestaRegistro == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "¡El usuario ha sido registrado con éxito!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            function redirect(){
                                window.location = "usuarios";
                            }
                            setTimeout(redirect,1500);
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
                function redirect(){
                    window.location = "usuarios";
                }
                setTimeout(redirect,1500);
            </script>';
            }
        }
    }

    static public function ctrEditarUsuario()
    {
        if (isset($_POST["edtdniUsuario"]) && isset($_POST["edtcuentaUsuario"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["edtdniUsuario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ].{7,15}+$/', $_POST["edtcuentaUsuario"])
            ) {

                $tabla = "ws_usuarios";

                if ($_POST["edtclaveUsuario"] != "") {
                    if (preg_match('/^[a-zA-Z0-9].+$/', $_POST["edtclaveUsuario"])) {
                        $encriptacion2 = crypt($_POST["edtclaveUsuario"], '$2a$07$usesomesillystringforsalt$');
                    } else {
                        echo '<script>
                                Swal.fire({
                                    icon: "error",
                                    title: "La contraseña no debe contener letras especiales",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                function redirect(){
                                    window.location = "usuarios";
                                }
                                setTimeout(redirect,1500);
                            </script>';
                    }
                } else {
                    $encriptacion2 = $_POST["passwordActual"];
                }

                // 
                $datos = array(
                    "dni" => $_POST["edtdniUsuario"],
                    "nombres" => $_POST["edtnombreUsuario"],
                    "apellidoPat" => $_POST["edtapellidoUsuarioPat"],
                    "apellidoMat" => $_POST["edtapellidoUsuarioMat"],
                    "perfil" => $_POST["edtperfilUsuario"],
                    "cuenta" => $_POST["edtcuentaUsuario"],
                    "clave" => $encriptacion2,
                    "id" => $_POST["idUsuario"]
                );
                // Envio de datos por array
                $respuestaEditar = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuestaEditar == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "El usuario ha sido modificado con éxito",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            function redirect(){
                                window.location = "usuarios";
                            }
                            setTimeout(redirect,1500);
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
                function redirect(){
                    window.location = "usuarios";
                }
                setTimeout(redirect,1500);
            </script>';
            }
        }
    }
    static public function ctrEliminarUsuario()
    {
        if (isset($_GET["idUsuario"])) {
            $tabla = "ws_usuarios";
            $datos = $_GET["idUsuario"];

            $respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡El usuario ha sido eliminado con éxito!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        function redirect(){
                            window.location = "usuarios";
                        }
                        setTimeout(redirect,1500);
                    </script>';
            }
        }
    }

    static public function ctrListarTecnicos($item, $valor)
    {
        $respuesta = ModeloUsuarios::mdlListaTecnicos($item, $valor);
        return $respuesta;
    }
}
