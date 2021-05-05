var perfilOcultoIntC = $("#pIntCOculto").val();
$(".tablaIntegraEC").DataTable({
    ajax: "util/datatable-integra-ec.php?perfilOcultoIntC=" + perfilOcultoIntC,
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
        emptyTable: "No data available in table"
    },
});
$('[data-mask]').inputmask();

$("#nroEquipo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#nroEquipo").keyup(function () {
    var neq = $(this).val();
    var mayusteq = neq.toUpperCase();
    $("#nroEquipo").val(mayusteq);
});



$("#tipEq").on("change", function () {
    let comboTipo = $(this).val();
    if (comboTipo == 1) {
        $("#bloquePC").removeClass("d-none");
        $("#bloqueLapServ").addClass("d-none");
    }
    else if (comboTipo == 4 || comboTipo == 5) {
        $("#bloquePC").addClass("d-none");
        $("#bloqueLapServ").removeClass("d-none");
    }
    else {
        $("#bloquePC").addClass("d-none");
        $("#bloqueLapServ").addClass("d-none");
    }
});

// Listar DATOS A PARTIR DE SERIE
$("#seriePC").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp").val(data["uResponsable"]);
                $("#datOfi").val(data["office"]);
                $("#datServ").val(data["service"]);
                $("#datEst").val(data["condicion"]);
                $("#datCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp").val("");
        $("#datOfi").val("");
        $("#datServ").val("");
        $("#datEst").val("");
        $("#datCond").val("");
    }
});


$("#serieLaptop").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp").val(data["uResponsable"]);
                $("#datOfi").val(data["office"]);
                $("#datServ").val(data["service"]);
                $("#datEst").val(data["condicion"]);
                $("#datCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp").val("");
        $("#datOfi").val("");
        $("#datServ").val("");
        $("#datEst").val("");
        $("#datCond").val("");
    }
});


$(".tablaIntegraEC tbody").on("click", ".btnEditarIntegraC", function () {
    // Setteo y Limpieza de Datos
    $("#idIntegracion").val("");
    $("#edtNEquipo").val("");
    $("#idIp").val("");
    $("#datResp2").val("");
    $("#datOfi2").val("");
    $("#datServ2").val("");
    $("#datEst2").val("");
    $("#datCond2").val("");
    $("#edtSeriePC").val("0");
    $("#edtSeriePC").html("Selecciona PC");
    $("#edtSerieMon").val("0");
    $("#edtSerieMon").html("Selecciona Monitor");
    $("#edtSerieTec").val("0");
    $("#edtSerieTec").html("Selecciona Teclado");
    $("#edtSerieAcu").val("0");
    $("#edtSerieAcu").html("Selecciona Tip Fuente");
    $("#edtSerieLap").val("0");
    $("#edtSerieLap").html("Selecciona Laptop o Servidor");
    // Setteo y Limpieza de Datos
    var idIntegracion = $(this).attr("idIntegracion");
    var tipEquipo = $(this).attr("idTipo");

    if (tipEquipo === "1") {
        $("#bloquePC2").removeClass("d-none");
        $("#bloqueLapServ2").addClass("d-none");
        var datos = new FormData();
        datos.append("idIntegracion", idIntegracion);

        $.ajax({
            url: "lib/ajaxIntegraciones.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#edtTip").val(respuesta["tipo_equipo"]);
                $("#edtTip").html(respuesta["categoria"]);
                $("#edtSeriePC").val(respuesta["idPc"]);
                $("#edtSeriePC").html(respuesta["seriepc"]);
                if (respuesta["serie_monitor"] == 0) {
                    $("#edtSerieMon").val(respuesta["serie_monitor"]);
                    $("#edtSerieMon").html("Selecciona Monitor");
                }
                else {
                    $("#edtSerieMon").val(respuesta["serie_monitor"]);
                    $("#edtSerieMon").html(respuesta["seriemon"]);
                }


                if (respuesta["serie_teclado"] == 0) {
                    $("#edtSerieTec").val(respuesta["serie_teclado"]);
                    $("#edtSerieTec").html("Selecciona Monitor");
                }
                else {
                    $("#edtSerieTec").val(respuesta["serie_teclado"]);
                    $("#edtSerieTec").html(respuesta["serietec"]);
                }

                if (respuesta["serie_EstAcu"] == 0) {
                    $("#edtSerieAcu").val(respuesta["serie_EstAcu"]);
                    $("#edtSerieAcu").html("Selecciona Tip Fuente");
                }
                else {
                    $("#edtSerieAcu").val(respuesta["serie_EstAcu"]);
                    $("#edtSerieAcu").html(respuesta["serieAcu"]);
                }
                $("#idIntegracion").val(respuesta["idIntegracion"]);
                $("#edtNEquipo").val(respuesta["nro_eq"]);
                $("#idIp").val(respuesta["ip"]);
                $("#datResp2").val(respuesta["responsable"]);
                $("#datOfi2").val(respuesta["oficina_in"]);
                $("#datServ2").val(respuesta["servicio_in"]);
                $("#datEst2").val(respuesta["estado"]);
                $("#datCond2").val(respuesta["condicionPC"]);
                $("#nroAnt").val(respuesta["nro_eq"]);
                $("#ipAnt").val(respuesta["ip"]);
            }
        });
    }
    else {
        $("#bloquePC2").addClass("d-none");
        $("#bloqueLapServ2").removeClass("d-none");
        var datos2 = new FormData();
        datos2.append("idIntegracion2", idIntegracion);
        $.ajax({
            url: "lib/ajaxIntegraciones.php",
            method: "POST",
            data: datos2,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idIntegracion").val(respuesta["idIntegracion"]);
                $("#edtNEquipo").val(respuesta["nro_eq"]);
                $("#edtTip").val(respuesta["tipo_equipo"]);
                $("#edtTip").html(respuesta["categoria"]);
                $("#idIp").val(respuesta["ip"]);
                $("#edtSerieLap").val(respuesta["idPc"]);
                $("#edtSerieLap").html(respuesta["seriepc"]);
                $("#datResp2").val(respuesta["responsable"]);
                $("#datOfi2").val(respuesta["oficina_in"]);
                $("#datServ2").val(respuesta["servicio_in"]);
                $("#datEst2").val(respuesta["estado"]);
                $("#datCond2").val(respuesta["condicionPC"]);
                $("#nroAnt").val(respuesta["nro_eq"]);
                $("#ipAnt").val(respuesta["ip"]);
            }
        });
    }
});

$("#edtSeriePC1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp2").val(data["uResponsable"]);
                $("#datOfi2").val(data["office"]);
                $("#datServ2").val(data["service"]);
                $("#datEst2").val(data["condicion"]);
                $("#datCond2").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp2").val("");
        $("#datOfi2").val("");
        $("#datServ2").val("");
        $("#datEst2").val("");
        $("#datCond2").val("");
    }
});

$("#edtSerieLap1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp2").val(data["uResponsable"]);
                $("#datOfi2").val(data["office"]);
                $("#datServ2").val(data["service"]);
                $("#datEst2").val(data["condicion"]);
                $("#datCond2").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp2").val("");
        $("#datOfi2").val("");
        $("#datServ2").val("");
        $("#datEst2").val("");
        $("#datCond2").val("");
    }
});

$("#edtTip1").on("change", function () {
    let comboTipo = $(this).val();
    if (comboTipo == 1) {
        $("#bloquePC2").removeClass("d-none");
        $("#bloqueLapServ2").addClass("d-none");
        $("#edtNEquipo").val("");
        $("#edtNEquipo").attr("placeholder", "Ingresa el nuevo N° de PC");
    }
    else if (comboTipo == 4 || comboTipo == 5) {
        $("#bloquePC2").addClass("d-none");
        $("#bloqueLapServ2").removeClass("d-none");
        $("#edtNEquipo").val("");
        $("#edtNEquipo").attr("placeholder", "Ingresa el nuevo N° de Lap o Serv");
    }
    else {
        $("#bloquePC").addClass("d-none");
        $("#bloqueLapServ2").addClass("d-none");
    }
});
$("#edtNEquipo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#edtNEquipo").keyup(function () {
    var edtneq = $(this).val();
    var mayusedtteq = edtneq.toUpperCase();
    $("#edtNEquipo").val(mayusedtteq);
});

$(".tablaIntegraEC tbody").on("click", ".btnAnularIntegraC", function () {
    var idIntegracion = $(this).attr("idIntegracion");
    Swal.fire({
        title: '¿Está seguro de anular la ficha?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, anular ficha!'
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=integracion-ec&idIntegracion=" + idIntegracion;
        }
    })
});

$(".tablaIntegraEC tbody").on("click", ".btnImprimirFichaC", function () {
    var idIntegracion = $(this).attr("idIntegracion");
    var idTipo = $(this).attr("idTipo");
    // var idTipo = $(this).attr("idTipo");
    window.open("reports/ficha-integra-ec.php?idIntegracion=" + idIntegracion + "&idTipo=" + idTipo, "_blank");
});
$.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
$("#btnRegIntC").on("click", function () {
    var tipoIntegra = $("#tipEq").val();
    if (tipoIntegra == 1) {
        $("#formRegIntC").validate({
            rules: {
                tipEq: {
                    valueNotEquals: "0",
                    required: true,
                },
                nroEquipo: {
                    required: true,
                },
                seriePC: {
                    valueNotEquals: "0",
                    required: true,
                },
            },
            messages: {
                tipEq: {
                    valueNotEquals: "Seleccione Categoría",
                    required: "Dato querido",
                },
                nroEquipo: {
                    required: "Ingrese dato requerido",
                },
                seriePC: {
                    valueNotEquals: "Selecciona Serie PC",
                    required: true,
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    }
    else {
        if (tipoIntegra == 4) {
            $("#formRegIntC").validate({
                rules: {
                    tipEq: {
                        valueNotEquals: "0",
                        required: true,
                    },
                    nroEquipo: {
                        required: true,
                    },
                    ip_comp: {
                        required: true,
                    },
                    serieLaptop: {
                        valueNotEquals: "0",
                        required: true,
                    },
                },
                messages: {
                    tipEq: {
                        valueNotEquals: "Seleccione Categoría",
                        required: "Dato querido",
                    },
                    nroEquipo: {
                        required: "Ingrese dato requerido",
                    },
                    ip_comp: {
                        required: "Ingrese dato requerido",
                    },
                    serieLaptop: {
                        valueNotEquals: "Selecciona Serie Laptop o Servidor",
                        required: true,
                    },
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".form-group").append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
            });
        }
        if (tipoIntegra == 5) {
            $("#formRegIntC").validate({
                rules: {
                    tipEq: {
                        valueNotEquals: "0",
                        required: true,
                    },
                    nroEquipo: {
                        required: true,
                    },
                    ip_comp: {
                        required: true,
                    },
                    serieLaptop: {
                        valueNotEquals: "0",
                        required: true,
                    },
                },
                messages: {
                    tipEq: {
                        valueNotEquals: "Seleccione Categoría",
                        required: "Dato querido",
                    },
                    nroEquipo: {
                        required: "Ingrese dato requerido",
                    },
                    ip_comp: {
                        required: "Ingrese dato requerido",
                    },
                    serieLaptop: {
                        valueNotEquals: "Selecciona Serie Laptop o Servidor",
                        required: true,
                    },
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".form-group").append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
            });
        }
    }
});

$.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
$("#btnEdtIntC").on("click", function () {
    var tipoIntegra2 = $("#edtTip").val();
    if (tipoIntegra2 == 1) {
        $("#formEdtIntC").validate({
            rules: {
                edtTip: {
                    valueNotEquals: "0",
                    required: true,
                },
                edtNEquipo: {
                    required: true,
                },
                edtSeriePC: {
                    valueNotEquals: "0",
                    required: true,
                },
            },
            messages: {
                edtTip: {
                    valueNotEquals: "Seleccione Categoría",
                    required: "Dato querido",
                },
                edtNEquipo: {
                    required: "Ingresa N° PC",
                },
                edtSeriePC: {
                    valueNotEquals: "Selecciona Serie PC",
                    required: true,
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    }
    else {
        if (tipoIntegra2 == 4) {
            $("#formEdtIntC").validate({
                rules: {
                    edtTip: {
                        valueNotEquals: "0",
                        required: true,
                    },
                    edtNEquipo: {
                        required: true,
                    },
                    idIp: {
                        required: true,
                    },
                    edtSerieLap: {
                        valueNotEquals: "0",
                        required: true,
                    },
                },
                messages: {
                    edtTip: {
                        valueNotEquals: "Seleccione Categoría",
                        required: "Dato querido",
                    },
                    edtNEquipo: {
                        required: "Ingrese dato requerido",
                    },
                    idIp: {
                        required: "Ingrese dato requerido",
                    },
                    edtSerieLap: {
                        valueNotEquals: "Selecciona Serie Laptop o Servidor",
                        required: true,
                    },
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".form-group").append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
            });
        }
        if (tipoIntegra2 == 5) {
            $("#formEdtIntC").validate({
                rules: {
                    edtTip: {
                        valueNotEquals: "0",
                        required: true,
                    },
                    edtNEquipo: {
                        required: true,
                    },
                    idIp: {
                        required: true,
                    },
                    edtSerieLap: {
                        valueNotEquals: "0",
                        required: true,
                    },
                },
                messages: {
                    edtTip: {
                        valueNotEquals: "Seleccione Categoría",
                        required: "Dato querido",
                    },
                    edtNEquipo: {
                        required: "Ingrese dato requerido",
                    },
                    idIp: {
                        required: "Ingrese dato requerido",
                    },
                    edtSerieLap: {
                        valueNotEquals: "Selecciona Serie Laptop o Servidor",
                        required: true,
                    },
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".form-group").append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
            });
        }
    }
});

// Validar IP existente
$("#nroEquipo").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarNro = $(this).val();
    var datos = new FormData();
    datos.append("validarNro", validarNro);
    $.ajax({
        url: "lib/ajaxIntegraciones.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                Toast.fire({
                    icon: "warning",
                    title: " El número de PC ya se encuentra registrado",
                });
                $("#nroEquipo").val("");
                $("#nroEquipo").focus();
            }
        },
    });
});
$("#edtNEquipo").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarNro2 = $(this).val();
    var v1 = $("#nroAnt").val();

    if (validarNro2 != v1) {
        var datos2 = new FormData();
        datos2.append("validarNro", validarNro2);
        $.ajax({
            url: "lib/ajaxIntegraciones.php",
            method: "POST",
            data: datos2,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta) {
                    Toast.fire({
                        icon: "warning",
                        title: " El número de PC ya se encuentra registrado",
                    });
                    $("#edtNEquipo").val(v1);
                    $("#edtNEquipo").focus();
                }
            },
        });
    }
});
$("#ip_comp").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarIP = $(this).val();

    if (validarIP != "") {
        var datos = new FormData();
        datos.append("validarIP", validarIP);
        $.ajax({
            url: "lib/ajaxIntegraciones.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta) {
                    Toast.fire({
                        icon: "warning",
                        title: " El número de IP ya se encuentra registrado",
                    });
                    $("#ip_comp").val("");
                    $("#ip_comp").focus();
                }
            },
        });
    }
});
$("#idIp").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarIP2 = $(this).val();
    var v2 = $("#ipAnt").val();

    if (validarIP2 != v2) {
        var datos = new FormData();
        datos.append("validarIP", validarIP2);
        $.ajax({
            url: "lib/ajaxIntegraciones.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta) {
                    Toast.fire({
                        icon: "warning",
                        title: " El número de IP ya se encuentra registrado",
                    });
                    $("#idIp").val(v2);
                    $("#idIp").focus();
                }
            },
        });
    }
});
// Validar Nro de Equipo Existente