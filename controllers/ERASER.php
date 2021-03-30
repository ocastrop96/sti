static public function ctrRegistrarMantenimiento()
    {
        if (isset($_POST["detaEQ"]) && isset($_POST["descIniEQ"]) && isset($_POST["priEvaEQ"]) && isset($_POST["recoFEQ"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["detaEQ"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["descIniEQ"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["priEvaEQ"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["recoFEQ"])) {
                if ($_POST["listaDiagnosticos"] != "" && $_POST["listaDiagnosticos"] != "[]" && $_POST["listaAcciones"] != "" && $_POST["listaAcciones"] != "[]") {
                    date_default_timezone_set('America/Lima');
                    $fRegistroMant = date("Y-m-d");
                    // Bloque de conversión de fechas
                    $fE1 = $_POST["fEva"];
                    $dateFE1 = str_replace('/', '-', $fE1);
                    $fe1f = date('Y-m-d', strtotime($dateFE1));

                    $fE2 = $_POST["fEva"];
                    $dateFE2 = str_replace('/', '-', $fE2);
                    $fe2f = date('Y-m-d', strtotime($dateFE2));

                    $fE3 = $_POST["fEva"];
                    $dateFE3 = str_replace('/', '-', $fE3);
                    $fe3f = date('Y-m-d', strtotime($dateFE3));

                    $datos = array(
                        "fRegistroMant" => $fRegistroMant,
                        "logdeta" >= $_POST["detaEQ"],
                        "descInc" >= $_POST["descIniEQ"],
                        "diagnosticos" >= $_POST["priEvaEQ"],
                        "fEvalua" >= $fRegistroMant,
                        "primera_eval" >= $_POST["priEvaEQ"],
                        "fInicio" >= $fRegistroMant,
                        "fFin" >= $fRegistroMant,
                        "acciones" >= $_POST["priEvaEQ"],
                        "recomendaciones" >= $_POST["recoFEQ"],
                        "servTerce" >= $_POST["tercEq"],
                        "otros" >= $_POST["obsOtros"],
                        "obsOtros" >= $_POST["detalleOtros"],
                        "tipEquipo" >= $_POST["tipEquipo"],
                        "condInicial" >= $_POST["condInEQ"],
                        "idEquip" >= $_POST["serieEQ"],
                        "oficEquip" >= $_POST["ofiEq"],
                        "areaEquip" >= $_POST["servEq"],
                        "respoEquip" >= $_POST["respEq"],
                        "tecEvalua" >= $_POST["tecEvEQ"],
                        "tipTrabajo" >= $_POST["tipTrabEQ"],
                        "estAtencion" >= $_POST["estAtEQ"],
                        "condFinal" >= $_POST["condFEQ"],
                        "usRegistra" >= $_POST["uregMant"],
                        "sgmtoManto" >= $_POST["segmentado"]
                    );

                    $rptRegManto = ModeloMantenimientos::mdlRegistrarMantenimiento($datos);
                    if ($rptRegManto == "ok") {
                        echo '<script>
                                Swal.fire({
                                icon: "success",
                                title: "La Ficha de Mantenimiento ha sido registrada con éxito",
                                showConfirmButton: false,
                                timer: 1200
                            });
                            function redirect() {
                                window.location = "mantenimientos";
                            }
                            setTimeout(redirect, 1200);
                            </script>';
                    } else {
                        echo '<script>
                        Swal.fire({
                        icon: "error",
                        title: "Ha ocurrido un error al registrar, intente de nuevo por favor",
                        showConfirmButton: false,
                        timer: 1200
                    });
                    function redirect() {
                        window.location = "mantenimientos";
                    }
                    setTimeout(redirect, 1200);
                    </script>';
                    }
                } else {
                    echo '<script>
                    Swal.fire({
                    icon: "error",
                    title: "Ingresa correctamente todos los datos solicitados",
                    showConfirmButton: false,
                    timer: 1200
                });
                function redirect() {
                    window.location = "mantenimientos";
                }
                setTimeout(redirect, 1200);
                </script>';
                    // Si los diagnósticos y acciones están vacía o sin registro mostrar error
                }
            } else {
                // Si envía datos que no cumnplen las reglas
                echo '<script>
                    Swal.fire({
                    icon: "error",
                    title: "Ingresa correctamente todos los datos solicitados, no se permiten caracteres especiales.",
                    showConfirmButton: false,
                    timer: 1200
                });
                function redirect() {
                    window.location = "mantenimientos";
                }
                setTimeout(redirect, 1200);
                </script>';
            }
        }
    }