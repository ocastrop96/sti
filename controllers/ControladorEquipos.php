<?php
class ControladorEquipos
{

    static public function ctrListarEquiposC($item, $valor)
    {
        $respuesta = ModeloEquipos::mdlListarEquiposC($item, $valor);
        return $respuesta;
    }
    static public function ctrListarEquiposR($item, $valor)
    {
        $respuesta = ModeloEquipos::mdlListarEquiposR($item, $valor);
        return $respuesta;
    }
    static public function ctrListarEquiposP($item, $valor)
    {
        $respuesta = ModeloEquipos::mdlListarEquiposP($item, $valor);
        return $respuesta;
    }
    // Equipos de Computo
    static public function ctrRegistrarEquipoC()
    {
        if (isset($_POST["ecSerie"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["ecSerie"])) {
                date_default_timezone_set('America/Lima');
                // $FAct = date('Y-m-d');
                $a = $_POST["ecFCompra"];
                $fechaC = date("Y-m-d", strtotime($a));
                $obs = "REGISTRO NUEVO";
                $datos = array(
                    "serie" => $_POST["ecSerie"],
                    "sbn" => $_POST["ecSBN"],
                    "marca" => $_POST["ecMarca"],
                    "modelo" => $_POST["ecModelo"],
                    "descripcion" => $_POST["ecDescripcion"],
                    "fechaCompra" => $fechaC,
                    "ordenCompra" => $_POST["ecOrden"],
                    "garantia" => $_POST["ecGarantia"],
                    "placa" => $_POST["ecPlaca"],
                    "procesador" => $_POST["ecProcesador"],
                    "vprocesador" => $_POST["ecVProc"],
                    "ram" => $_POST["ecRAM"],
                    "discoDuro" => $_POST["ecDD"],
                    "observaciones" => $obs,
                    "idTipo" => $_POST["ecCat"],
                    "uResponsable" => $_POST["ecRes"],
                    "idOficina" => $_POST["ecOfi"],
                    "idServicio" => $_POST["ecServ"],
                    "condicion" => $_POST["ecCondicion"],
                    "estadoEQ" => $_POST["ecEstado"],
                    "registrador" => $_POST["reg1"],
                    "tipSegmento" => $_POST["segmento"]
                );

                $rptRegEC = ModeloEquipos::mdlRegistrarEquiposC($datos);
                if ($rptRegEC == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El Equipo de Cómputo ha sido registrado con éxito",
                            showConfirmButton: false,
                            timer: 900
                        });
                        function redirect() {
                            window.location = "equipos-computo";
                        }
                        setTimeout(redirect, 900);
                      </script>';
                } else {
                    var_dump($rptRegEC);
                    echo '<script>
                Swal.fire({
                  type: "error",
                  title: "Ha ocurrido un error al registrar sus datos",
                  showConfirmButton: false,
                  timer: 900
              });
              function redirect() {
                  window.location = "equipos-computo";
              }
              setTimeout(redirect, 900);
            </script>';
                }
            } else {
                echo '<script>
            Swal.fire({
              type: "error",
              title: "Ingrese sus datos correctamente",
              showConfirmButton: false,
              timer: 900
            });
            function redirect() {
                window.location = "equipos-computo";
            }
            setTimeout(redirect, 900);
        </script>';
            }
        }
    }
    static public function ctrEditarEquipoC()
    {
        if (isset($_POST["edtecSerie"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["edtecSerie"])) {
                date_default_timezone_set('America/Lima');
                // $FAct = date('Y-m-d');
                $a2 = $_POST["edtecFCompra"];
                $fechaC2 = date("Y-m-d", strtotime($a2));

                $datos = array(
                    "serie" => $_POST["edtecSerie"],
                    "sbn" => $_POST["edtecSBN"],
                    "marca" => $_POST["edtecMarca"],
                    "modelo" => $_POST["edtecModelo"],
                    "descripcion" => $_POST["edtecDescripcion"],
                    "fechaCompra" => $fechaC2,
                    "ordenCompra" => $_POST["edtecOrden"],
                    "garantia" => $_POST["edtecGarantia"],
                    "placa" => $_POST["edtecPlaca"],
                    "procesador" => $_POST["edtecProcesador"],
                    "vprocesador" => $_POST["edtecVProc"],
                    "ram" => $_POST["edtecRAM"],
                    "discoDuro" => $_POST["edtecDD"],
                    "idTipo" => $_POST["edtecCat"],
                    "uResponsable" => $_POST["edtecRes"],
                    "idOficina" => $_POST["edtecOfi"],
                    "idServicio" => $_POST["edtecServ"],
                    "condicion" => $_POST["edtecCondicion"],
                    "estadoEQ" => $_POST["edtecEstado"],
                    "id" => $_POST["idEquipo"]
                );
                $rptEdtEC = ModeloEquipos::mdlEditarEquiposC($datos);
                if ($rptEdtEC == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El Equipo de Cómputo ha sido editado con éxito",
                            showConfirmButton: false,
                            timer: 900
                        });
                        function redirect() {
                            window.location = "equipos-computo";
                        }
                        setTimeout(redirect, 900);
                      </script>';
                } else {
                    echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Ha ocurrido un error al editar sus datos",
                  showConfirmButton: false,
                  timer: 900
              });
              function redirect() {
                  window.location = "equipos-computo";
              }
              setTimeout(redirect, 900);
            </script>';
                }
            } else {
                echo '<script>
            Swal.fire({
              type: "error",
              title: "Ingrese sus datos correctamente",
              showConfirmButton: false,
              timer: 1400
                });
                function redirect() {
                    window.location = "equipos-computo";
                }
                setTimeout(redirect, 900);
        </script>';
            }
        }
    }

    static public function ctrEliminarEquipoC()
    {

        if (isset($_GET["idEquipo"])) {
            $datos = $_GET["idEquipo"];

            $respuesta = ModeloEquipos::mdlEliminarEquiposC($datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡El equipo ha sido eliminado con éxito!",
                        showConfirmButton: false,
                        timer: 1400
                    });
                    function redirect() {
                        window.location = "equipos-computo";
                    }
                    setTimeout(redirect, 1400);
                    </script>';
            } else {
                echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "¡El equipo se encuentra integrado, no puede ser eliminado!",
                        showConfirmButton: false,
                        timer: 1400
                    });
                    function redirect() {
                        window.location = "equipos-computo";
                    }
                    setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }
    // Equipos de Computo

    // Equipos Periféricos y Otros
    static public function ctrRegistrarEquipoPO()
    {
        if (isset($_POST["epoSerie"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["epoSerie"])) {
                date_default_timezone_set('America/Lima');
                // $FAct = date('Y-m-d');
                $EP = $_POST["epoFCompra"];
                $fechaEP = date("Y-m-d", strtotime($EP));
                $obsEP = "REGISTRO NUEVO";
                $datos = array(
                    "serie" => $_POST["epoSerie"],
                    "sbn" => $_POST["epoSBN"],
                    "marca" => $_POST["epoMarca"],
                    "modelo" => $_POST["epoModelo"],
                    "descripcion" => $_POST["epoDescripcion"],
                    "fechaCompra" => $fechaEP,
                    "ordenCompra" => $_POST["epoOrden"],
                    "garantia" => $_POST["epoGarantia"],
                    "observaciones" => $obsEP,
                    "idTipo" => $_POST["epoCat"],
                    "uResponsable" => $_POST["epoRes"],
                    "idOficina" => $_POST["epoOfi"],
                    "idServicio" => $_POST["epoServ"],
                    "condicion" => $_POST["epoCondicion"],
                    "estadoEQ" => $_POST["epoEstado"],
                    "registrador" => $_POST["reg3"],
                    "tipSegmento" => $_POST["segmentoP"]
                );

                $rptRegEPO = ModeloEquipos::mdlRegistrarEquiposPO($datos);
                if ($rptRegEPO == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El Equipo Periférico ha sido registrado con éxito",
                            showConfirmButton: false,
                            timer: 1400
                        });
                        function redirect() {
                            window.location = "equipos-otros";
                        }
                        setTimeout(redirect, 1400);
                      </script>';
                } else {
                    echo '<script>
                Swal.fire({
                  type: "error",
                  title: "Ha ocurrido un error al registrar sus datos",
                  showConfirmButton: false,
                  timer: 1400
              });
              function redirect() {
                  window.location = "equipos-otros";
              }
              setTimeout(redirect, 1400);
            </script>';
                }
            } else {
                echo '<script>
            Swal.fire({
              type: "error",
              title: "Ingrese sus datos correctamente",
              showConfirmButton: false,
              timer: 1400
          });
          function redirect() {
              window.location = "equipos-otros";
          }
          setTimeout(redirect, 1400);
        </script>';
            }
        }
    }

    static public function ctrEditarEquipoPO()
    {
        if (isset($_POST["edtpoSerie"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["edtpoSerie"])) {
                date_default_timezone_set('America/Lima');
                // $FAct = date('Y-m-d');
                $EP2 = $_POST["edtpoFCompra"];
                $fechaEP2 = date("Y-m-d", strtotime($EP2));

                $datos = array(
                    "serie" => $_POST["edtpoSerie"],
                    "sbn" => $_POST["edtpoSBN"],
                    "marca" => $_POST["edtpoMarca"],
                    "modelo" => $_POST["edtpoModelo"],
                    "descripcion" => $_POST["edtpoDescripcion"],
                    "fechaCompra" => $fechaEP2,
                    "ordenCompra" => $_POST["edtpoOrden"],
                    "garantia" => $_POST["edtpoGarantia"],
                    "idTipo" => $_POST["edtpoCat"],
                    "uResponsable" => $_POST["edtpoRes"],
                    "idOficina" => $_POST["edtpoOfi"],
                    "idServicio" => $_POST["edtpoServ"],
                    "condicion" => $_POST["edtpoCondicion"],
                    "estadoEQ" => $_POST["epdtoEstado"],
                    "id" => $_POST["idEquipo"]
                );
                $rptEdtEC = ModeloEquipos::mdlEditarEquiposP($datos);
                if ($rptEdtEC == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El Equipo Periférico ha sido editado con éxito",
                            showConfirmButton: false,
                            timer: 1400
                        });
                        function redirect() {
                            window.location = "equipos-otros";
                        }
                        setTimeout(redirect, 1400);
                      </script>';
                } else {
                    echo '<script>
                Swal.fire({
                  type: "error",
                  title: "Ha ocurrido un error al editar sus datos",
                  showConfirmButton: false,
                  timer: 1400
              });
              function redirect() {
                  window.location = "equipos-otros";
              }
              setTimeout(redirect, 1400);
            </script>';
                }
            } else {
                echo '<script>
            Swal.fire({
              type: "error",
              title: "Ingrese sus datos correctamente",
              showConfirmButton: false,
              timer: 1400
          });
          function redirect() {
              window.location = "equipos-otros";
          }
          setTimeout(redirect, 1400);
        </script>';
            }
        }
    }

    static public function ctrEliminarEquipoP()
    {
        if (isset($_GET["idEquipo"])) {
            $datos1 = $_GET["idEquipo"];
            $datos2 = $_GET["idCategoria"];
            $respuesta = ModeloEquipos::mdlEliminarEquiposP($datos1, $datos2);
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡El equipo ha sido eliminado con éxito!",
                        showConfirmButton: false,
                        timer: 1400
                    });
                    function redirect() {
                        window.location = "equipos-otros";
                    }
                    setTimeout(redirect, 1400);
                    </script>';
            } else {
                echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "¡El equipo se encuentra integrado, no puede ser eliminado!",
                        showConfirmButton: false,
                        timer: 1400
                    });
                    function redirect() {
                        window.location = "equipos-otros";
                    }
                    setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }
    // Equipos Periféricos y Otros

    // Equipos Redes
    static public function ctrRegistrarEquipoR()
    {
        if (isset($_POST["erSerie"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["erSerie"])) {
                date_default_timezone_set('America/Lima');
                // $FAct = date('Y-m-d');
                $ER = $_POST["erFCompra"];
                $fechaER = date("Y-m-d", strtotime($ER));
                $obsER = "REGISTRO NUEVO";
                $datos = array(
                    "serie" => $_POST["erSerie"],
                    "sbn" => $_POST["erSBN"],
                    "marca" => $_POST["erMarca"],
                    "modelo" => $_POST["erModelo"],
                    "descripcion" => $_POST["erDescrip"],
                    "fechaCompra" => $fechaER,
                    "ordenCompra" => $_POST["erOrden"],
                    "garantia" => $_POST["erGarantia"],
                    "puertos" => $_POST["erPuertos"],
                    "capa" => $_POST["erCapa"],
                    "observaciones" => $obsER,
                    "idTipo" => $_POST["erCat"],
                    "uResponsable" => $_POST["erRes"],
                    "idOficina" => $_POST["erOficina"],
                    "idServicio" => $_POST["erServ"],
                    "condicion" => $_POST["erCond"],
                    "estadoEQ" => $_POST["erEstado"],
                    "registrador" => $_POST["reg4"],
                    "tipSegmento" => $_POST["segmentoR"]
                );

                $rptRegER = ModeloEquipos::mdlRegistrarEquiposR($datos);
                if ($rptRegER == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El Equipo Periférico ha sido registrado con éxito",
                            showConfirmButton: false,
                            timer: 1400
                        });
                        function redirect() {
                            window.location = "equipos-redes";
                        }
                        setTimeout(redirect, 1400);
                      </script>';
                } else {
                    echo '<script>
                Swal.fire({
                  type: "error",
                  title: "Ha ocurrido un error al registrar sus datos",
                  showConfirmButton: false,
                  timer: 1400
              });
              function redirect() {
                  window.location = "equipos-redes";
              }
              setTimeout(redirect, 1400);
            </script>';
                }
            } else {
                echo '<script>
            Swal.fire({
              type: "error",
              title: "Ingrese sus datos correctamente",
              showConfirmButton: false,
              timer: 1400
          });
          function redirect() {
              window.location = "equipos-redes";
          }
          setTimeout(redirect, 1400);
        </script>';
            }
        }
    }

    static public function ctrEditarEquipoRTC()
    {
        if (isset($_POST["edtrSerie"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["edtrSerie"])) {
                date_default_timezone_set('America/Lima');
                // $FAct = date('Y-m-d');
                $EP25 = $_POST["edtrFCompra"];
                $fechaEP25 = date("Y-m-d", strtotime($EP25));

                $datos = array(
                    "serie" => $_POST["edtrSerie"],
                    "sbn" => $_POST["edtrSBN"],
                    "marca" => $_POST["edtrMarca"],
                    "modelo" => $_POST["edtrModelo"],
                    "descripcion" => $_POST["edtrDescrip"],
                    "fechaCompra" => $fechaEP25,
                    "ordenCompra" => $_POST["edtrOrden"],
                    "garantia" => $_POST["edtrGarantia"],
                    "puertos" => $_POST["edtrPuertos"],
                    "capa" => $_POST["edtrCapa"],
                    "idTipo" => $_POST["edtrCat"],
                    "uResponsable" => $_POST["edtrRes"],
                    "idOficina" => $_POST["edtrOficina"],
                    "idServicio" => $_POST["edtrServ"],
                    "condicion" => $_POST["edtrCond"],
                    "estadoEQ" => $_POST["edtrEstado"],
                    "id" => $_POST["idEquipo"]
                );
                $rptEdtRTC = ModeloEquipos::mdlEditarEquiposRTC($datos);
                if ($rptEdtRTC == "ok") {
                    echo '<script>
                          Swal.fire({
                            icon: "success",
                            title: "El Equipo de Redes y Telecomunicaciones ha sido editado con éxito",
                            showConfirmButton: false,
                            timer: 1400
                        });
                        function redirect() {
                            window.location = "equipos-redes";
                        }
                        setTimeout(redirect, 1400);
                      </script>';
                } else {
                    echo '<script>
                Swal.fire({
                  type: "error",
                  title: "Ha ocurrido un error al editar sus datos",
                  showConfirmButton: false,
                  timer: 1400
              });
              function redirect() {
                  window.location = "equipos-redes";
              }
              setTimeout(redirect, 1400);
            </script>';
                }
            } else {
                echo '<script>
            Swal.fire({
              type: "error",
              title: "Ingrese sus datos correctamente",
              showConfirmButton: false,
              timer: 1400
          });
          function redirect() {
              window.location = "equipos-redes";
          }
          setTimeout(redirect, 1400);
        </script>';
            }
        }
    }

    static public function ctrEliminarEquipoR()
    {

        if (isset($_GET["idEquipo"])) {
            $tabla = "ws_equipos";
            $datos = $_GET["idEquipo"];

            $respuesta = ModeloEquipos::mdlEliminarEquiposR($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                        icon: "success",
                        title: "¡El equipo de red y telecomunicaciones ha sido eliminado con éxito!",
                        showConfirmButton: false,
                        timer: 1400
                    });
                    function redirect() {
                        window.location = "equipos-redes";
                    }
                    setTimeout(redirect, 1400);
                    </script>';
            } else {
                echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "¡El equipo se encuentra integrado, no puede ser eliminado!",
                        showConfirmButton: false,
                        timer: 1400
                    });
                    function redirect() {
                        window.location = "equipos-redes";
                    }
                    setTimeout(redirect, 1400);
                    </script>';
            }
        }
    }
    // Equipos Redes
    static public function ctrActualizaRepo($dato)
    {
        $repuesta = ModeloEquipos::mdlActualizarEstadoEQRepo($dato);
        return $repuesta;
    }
}
