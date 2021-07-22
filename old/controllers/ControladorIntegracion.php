<?php
class ControladorIntegracion
{
    static public function ctrValidarIpNro($item, $valor)
    {
        $respuesta = ModeloIntegracion::mdlListarIntegracionIPNro($item, $valor);
        return $respuesta;
    }
    static public function ctrListarIntegracionesC($item, $valor)
    {
        $respuesta = ModeloIntegracion::mdlListarIntegracionC($item, $valor);
        return $respuesta;
    }
    static public function ctrListarIntegracionesC2($item, $valor)
    {
        $respuesta = ModeloIntegracion::mdlListarIntegracionC2($item, $valor);
        return $respuesta;
    }
    static public function ctrListarIntegracionesR($item, $valor)
    {
        $respuesta = ModeloIntegracion::mdlListarIntegracionR($item, $valor);
        return $respuesta;
    }
    static public function ctrListarIntegracionesI($item, $valor)
    {
        $respuesta = ModeloIntegracion::mdlListarIntegracionI($item, $valor);
        return $respuesta;
    }
    //  Bloque de Listado de Series
    static public function ctrListarSeriesPC()
    {
        $repuesta = ModeloIntegracion::mdlListarSeriesPC();
        return $repuesta;
    }
    static public function ctrListarSeriesMon()
    {
        $repuesta = ModeloIntegracion::mdlListarSeriesMon();
        return $repuesta;
    }
    static public function ctrListarSeriesTec()
    {
        $repuesta = ModeloIntegracion::mdlListarSeriesTec();
        return $repuesta;
    }
    static public function ctrListarSeriesEnergia()
    {
        $repuesta = ModeloIntegracion::mdlListarSeriesEner();
        return $repuesta;
    }
    static public function ctrListarSeriesLapServ()
    {
        $repuesta = ModeloIntegracion::mdlListarSeriesLapServ();
        return $repuesta;
    }

    static public function ctrListarSeriesImp()
    {
        $repuesta = ModeloIntegracion::mdlListarSeriesImp();
        return $repuesta;
    }
    static public function ctrListarSeriesRed()
    {
        $repuesta = ModeloIntegracion::mdlListarSeriesRed();
        return $repuesta;
    }
    //  Bloque de Listado de Series

    // Bloque de Registro de Intregraciones
    static public function ctrRegistrarIntegracionC()
    {
        if (isset($_POST["tipEq"]) && isset($_POST["nroEquipo"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["tipEq"]) &&
                preg_match('/^[a-zA-Z0-9_]+$/', $_POST["nroEquipo"])
            ) {
                date_default_timezone_set('America/Lima');
                // Bloque de filtro en caso no selecciona series
                if ($_POST["tipEq"] == 1) {
                    if ($_POST["seriePC"] > 0) {
                        $fechaReg = date("Y-m-d");
                        $datos = array(
                            "nro_eq" => $_POST["nroEquipo"],
                            "ip" => $_POST["ip_comp"],
                            "fecha_registro" => $fechaReg,
                            "serie_pc" => $_POST["seriePC"],
                            "serie_monitor" => $_POST["serieMon"],
                            "serie_teclado" => $_POST["serieTec"],
                            "serie_EstAcu" => $_POST["serieAcuEne"],
                            "tipo_equipo" => $_POST["tipEq"],
                            "responsable" => $_POST["datResp"],
                            "oficina_in" => $_POST["datOfi"],
                            "servicio_in" => $_POST["datServ"],
                            "estado" => $_POST["datEst"],
                            "condicion" => $_POST["datCond"]
                        );
                        $rptRegI1 = ModeloIntegracion::mdlRegistrarIntegracion1($datos);
                        if ($rptRegI1 == "ok") {
                            echo '<script>
                        Swal.fire({
                          icon: "success",
                          title: "La Ficha ha sido registrada con éxito",
                          showConfirmButton: false,
                          timer: 1400
                      });
                      function redirect() {
                          window.location = "integracion-ec";
                      }
                      setTimeout(redirect, 1400);
                        </script>';
                        } else {
                            echo '<script>
                          Swal.fire({
                          icon: "error",
                          title: "Ha ocurrido un error, revíse sus datos",
                          showConfirmButton: false,
                          timer: 1400
                          });
                            function redirect() {
                                window.location = "integracion-ec";
                            }
                            setTimeout(redirect, 1400);
                         </script>';
                        }
                    } else {
                        echo '<script>
                         Swal.fire({
                          icon: "error",
                          title: "Faltan datos, ingrese todos los datos solicitados",
                          showConfirmButton: false,
                          timer: 1400
                            });
                            function redirect() {
                                window.location = "integracion-ec";
                            }
                            setTimeout(redirect, 1400);
                            </script>';
                    }
                } else {
                    if ($_POST["serieLaptop"] > 0) {
                        $fechaReg2 = date("Y-m-d");
                        $datos = array(
                            "nro_eq" => $_POST["nroEquipo"],
                            "ip" => $_POST["ip_comp"],
                            "fecha_registro" => $fechaReg2,
                            "serie_pc" => $_POST["serieLaptop"],
                            "tipo_equipo" => $_POST["tipEq"],
                            "responsable" => $_POST["datResp"],
                            "oficina_in" => $_POST["datOfi"],
                            "servicio_in" => $_POST["datServ"],
                            "estado" => $_POST["datEst"],
                            "condicion" => $_POST["datCond"]
                        );
                        $rptRegI2 = ModeloIntegracion::mdlRegistrarIntegracion2($datos);
                        if ($rptRegI2 == "ok") {
                            echo '<script>
                                    Swal.fire({
                                    icon: "success",
                                    title: "La Ficha ha sido registrada con éxito",
                                    showConfirmButton: false,
                                    timer: 1400
                                    });
                                    function redirect() {
                                        window.location = "integracion-ec";
                                    }
                                    setTimeout(redirect, 1400);
                                    </script>';
                        } else {
                            echo '<script>
                                    Swal.fire({
                                    icon: "error",
                                    title: "Ha ocurrido un error, revíse sus datos",
                                    showConfirmButton: false,
                                    timer: 1400
                                    });
                                    function redirect() {
                                        window.location = "integracion-ec";
                                    }
                                    setTimeout(redirect, 1400);
                                    </script>';
                        }
                    } else {
                        echo '<script>
                         Swal.fire({
                          icon: "error",
                          title: "Faltan datos, ingrese todos los datos solicitados",
                          showConfirmButton: false,
                          timer: 1400
                            });
                            function redirect() {
                                window.location = "integracion-ec";
                            }
                            setTimeout(redirect, 1400);
                            </script>';
                    }
                }
            }
        }
    }

    static public function ctrRegistrarIntegracionI()
    {
        if (isset($_POST["tEqImp"]) && isset($_POST["nroImp"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["tEqImp"]) &&
                preg_match('/^[a-zA-Z0-9_]+$/', $_POST["nroImp"])
            ) {
                // $tabla = "ws_integraciones";
                $fechaRegImp = date("Y-m-d");
                $datos = array(
                    "nro_eq" => $_POST["nroImp"],
                    "ip" => $_POST["ip_imp"],
                    "fecha_registro" => $fechaRegImp,
                    "serie_imp" => $_POST["serieImp"],
                    "tipo_equipo" => $_POST["tEqImp"],
                    "responsable" => $_POST["impResp"],
                    "oficina_in" => $_POST["impOfi"],
                    "servicio_in" => $_POST["impServ"],
                    "estado" => $_POST["impEst"],
                    "condicion" => $_POST["impCond"]
                );
                $rptRegImp1 = ModeloIntegracion::mdlRegistrarIntegracionImp($datos);
                if ($rptRegImp1 == "ok") {
                    echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "La Ficha ha sido registrada con éxito",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-ep";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Ha ocurrido un error, revíse sus datos",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-ep";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                }
            }
        }
    }

    static public function ctrRegistrarIntegracionR()
    {
        if (isset($_POST["tEqRed"]) && isset($_POST["nroERed"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["tEqRed"]) &&
                preg_match('/^[a-zA-Z0-9_]+$/', $_POST["nroERed"])
            ) {
                // $tabla = "ws_integraciones";
                $fechaRegER = date("Y-m-d");
                $datos = array(
                    "nro_eq" => $_POST["nroERed"],
                    "ip" => $_POST["ipERed"],
                    "fecha_registro" => $fechaRegER,
                    "serie_eqred" => $_POST["serieERed"],
                    "tipo_equipo" => $_POST["tEqRed"],
                    "responsable" => $_POST["erResp"],
                    "oficina_in" => $_POST["erOfi"],
                    "servicio_in" => $_POST["erServ"],
                    "estado" => $_POST["erEst"],
                    "condicion" => $_POST["erCond"]
                );
                $rptRegERed1 = ModeloIntegracion::mdlRegistrarIntegracionRed($datos);
                if ($rptRegERed1 == "ok") {
                    echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "La Ficha ha sido registrada con éxito",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-er";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Ha ocurrido un error, revíse sus datos",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-er";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                }
            }
        }
    }

    static public function ctrEditarIntegracionI()
    {
        if (isset($_POST["edtEqImp"]) && isset($_POST["edtnroImp"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["edtEqImp"]) &&
                preg_match('/^[a-zA-Z0-9_]+$/', $_POST["edtnroImp"])
            ) {
                $datos = array(
                    "nro_eq" => $_POST["edtnroImp"],
                    "ip" => $_POST["edtip_imp"],
                    "serie_imp" => $_POST["edtserieImp"],
                    "tipo_equipo" => $_POST["edtEqImp"],
                    "responsable" => $_POST["edtimpResp"],
                    "oficina_in" => $_POST["edtimpOfi"],
                    "servicio_in" => $_POST["edtimpServ"],
                    "estado" => $_POST["edtimpEst"],
                    "condicion" => $_POST["edtimpCond"],
                    "idIntegracion" => $_POST["idIntegracion"]
                );
                $rptEdtImp1 = ModeloIntegracion::mdlEditarIntegracionImp($datos);
                if ($rptEdtImp1 == "ok") {
                    echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "La Ficha ha sido editada con éxito",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-ep";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Ha ocurrido un error, revíse sus datos",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-ep";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                }
            }
        }
    }

    static public function ctrEditarIntegracionR()
    {
        if (isset($_POST["edtEqRed"]) && isset($_POST["edtnroERed"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["edtEqRed"]) &&
                preg_match('/^[a-zA-Z0-9_]+$/', $_POST["edtnroERed"])
            ) {
                $datos = array(
                    "nro_eq" => $_POST["edtnroERed"],
                    "ip" => $_POST["edtipERed"],
                    "serie_eqred" => $_POST["edtserieERed"],
                    "tipo_equipo" => $_POST["edtEqRed"],
                    "responsable" => $_POST["edtResp"],
                    "oficina_in" => $_POST["edtOfi"],
                    "servicio_in" => $_POST["edtServ"],
                    "estado" => $_POST["edtEst"],
                    "condicion" => $_POST["edtCond"],
                    "idIntegracion" => $_POST["idIntegracion"]
                );
                $rptEdtER1 = ModeloIntegracion::mdlEditarIntegracionER($datos);
                if ($rptEdtER1 == "ok") {
                    echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "La Ficha ha sido editada con éxito",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-er";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Ha ocurrido un error, revíse sus datos",
                      showConfirmButton: false,
                      timer: 1400
                        });
                        function redirect() {
                            window.location = "integracion-er";
                        }
                        setTimeout(redirect, 1400);
                </script>';
                }
            }
        }
    }
    // Bloque de Registro de Intregraciones
    // Bloque de Editar Integraciones
    static public function ctrEditarIntegracionC()
    {
        if (isset($_POST["edtTip"]) && isset($_POST["edtNEquipo"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["edtTip"]) &&
                preg_match('/^[a-zA-Z0-9_]+$/', $_POST["edtNEquipo"])
            ) {
                if ($_POST["edtTip"] == 1) {

                    if ($_POST["edtSeriePC"] > 0) {
                        $datos = array(
                            "nro_eq" => $_POST["edtNEquipo"],
                            "ip" => $_POST["idIp"],
                            "serie_pc" => $_POST["edtSeriePC"],
                            "serie_monitor" => $_POST["edtSerieMon"],
                            "serie_teclado" => $_POST["edtSerieTec"],
                            "serie_EstAcu" => $_POST["edtSerieAcu"],
                            "tipo_equipo" => $_POST["edtTip"],
                            "responsable" => $_POST["datResp2"],
                            "oficina_in" => $_POST["datOfi2"],
                            "servicio_in" => $_POST["datServ2"],
                            "estado" => $_POST["datEst2"],
                            "condicion" => $_POST["datCond2"],
                            "idIntegracion" => $_POST["idIntegracion"]
                        );
                        $rptEdtI1 = ModeloIntegracion::mdlEditarIntegracion1($datos);
                        if ($rptEdtI1 == "ok") {
                            echo '<script>
                                Swal.fire({
                                icon: "success",
                                title: "La Ficha ha sido editada con éxito",
                                showConfirmButton: false,
                                timer: 1400
                            });
                            function redirect() {
                                window.location = "integracion-ec";
                            }
                            setTimeout(redirect, 1400);
                            </script>';
                        } else {
                            echo '<script>
                                    Swal.fire({
                                    icon: "error",
                                    title: "Ha ocurrido un error, revíse sus datos",
                                    showConfirmButton: false,
                                    timer: 1400
                                });
                                function redirect() {
                                    window.location = "integracion-ec";
                                }
                                setTimeout(redirect, 1400);
                                </script>';
                        }
                    } else {
                        echo '<script>
                        Swal.fire({
                         icon: "error",
                         title: "Faltan datos, ingrese todos los datos solicitados",
                         showConfirmButton: false,
                         timer: 1400
                           });
                           function redirect() {
                               window.location = "integracion-ec";
                           }
                           setTimeout(redirect, 1400);
                           </script>';
                    }
                } else {
                    if ($_POST["edtSerieLap"] > 0) {
                        $datos2 = array(
                            "nro_eq" => $_POST["edtNEquipo"],
                            "ip" => $_POST["idIp"],
                            "serie_pc" => $_POST["edtSerieLap"],
                            "tipo_equipo" => $_POST["edtTip"],
                            "responsable" => $_POST["datResp2"],
                            "oficina_in" => $_POST["datOfi2"],
                            "servicio_in" => $_POST["datServ2"],
                            "estado" => $_POST["datEst2"],
                            "condicion" => $_POST["datCond2"],
                            "idIntegracion" => $_POST["idIntegracion"]
                        );
                        $rptEdtI2 = ModeloIntegracion::mdlEditarIntegracion2($datos2);
                        if ($rptEdtI2 == "ok") {
                            echo '<script>
                        Swal.fire({
                          icon: "success",
                          title: "La Ficha ha sido editada con éxito",
                          showConfirmButton: false,
                          timer: 1400
                      });
                      function redirect() {
                          window.location = "integracion-ec";
                      }
                      setTimeout(redirect, 1400);
                        </script>';
                        } else {
                            echo '<script>
                                        Swal.fire({
                                        icon: "error",
                                        title: "Ha ocurrido un error, revíse sus datos",
                                        showConfirmButton: false,
                                        timer: 1400
                                    });
                                    function redirect() {
                                        window.location = "integracion-ec";
                                    }
                                    setTimeout(redirect, 1400);
                                    </script>';
                        }
                    } else {
                        echo '<script>
                        Swal.fire({
                         icon: "error",
                         title: "Faltan datos, ingrese todos los datos solicitados",
                         showConfirmButton: false,
                         timer: 1400
                           });
                           function redirect() {
                               window.location = "integracion-ec";
                           }
                           setTimeout(redirect, 1400);
                           </script>';
                    }
                }
            } else {
                echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Datos no válidos, ingreselos correctamente",
                  showConfirmButton: false,
                  timer: 1400
              });
              function redirect() {
                  window.location = "integracion-ec";
              }
              setTimeout(redirect, 1400);
            </script>';
            }
        }
    }

    static public function ctrAnularIntegracionC()
    {
        if (isset($_GET["idIntegracion"])) {

            $datos = $_GET["idIntegracion"];

            $respuesta = ModeloIntegracion::mdlAnularIntegracion($datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Ficha de Integración ha sido anulada con éxito!",
                        showConfirmButton: false,
                        timer: 1400
                    });
                    function redirect() {
                        window.location = "integracion-ec";
                    }
                    setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }

    static public function ctrAnularIntegracionI()
    {
        if (isset($_GET["idIntegracion"])) {

            $datos = $_GET["idIntegracion"];

            $respuesta = ModeloIntegracion::mdlAnularIntegracion($datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Ficha de Integración ha sido anulada con éxito!",
                        showConfirmButton: false,
                        timer: 1400
                          });
                          function redirect() {
                              window.location = "integracion-ep";
                          }
                          setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }

    static public function ctrAnularIntegracionR()
    {
        if (isset($_GET["idIntegracion"])) {

            $datos = $_GET["idIntegracion"];

            $respuesta = ModeloIntegracion::mdlAnularIntegracion($datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡La Ficha de Integración ha sido anulada con éxito!",
                        showConfirmButton: false,
                        timer: 1400
                          });
                          function redirect() {
                              window.location = "integracion-er";
                          }
                          setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }
}
