var perfilOcultoIntR = $("#pIntROculto").val();
$(".tablaIntegraER").DataTable({
    ajax: "util/datatable-integra-er.php?perfilOcultoIntR=" + perfilOcultoIntR,
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
    },
});
$('[data-mask]').inputmask();
$("#nroERed").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#edtnroERed").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#nroERed").keyup(function () {
    var nRed = $(this).val();
    var mayusnRED = nRed.toUpperCase();
    $("#nroERed").val(mayusnRED);
});
$("#edtnroERed").keyup(function () {
    var nRed2 = $(this).val();
    var mayusnRED2 = nRed2.toUpperCase();
    $("#edtnroERed").val(mayusnRED2);
});
$("#serieERed").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#erResp").val(data["uResponsable"]);
                $("#erOfi").val(data["office"]);
                $("#erServ").val(data["service"]);
                $("#erEst").val(data["condicion"]);
                $("#erCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#erResp").val("");
        $("#erOfi").val("");
        $("#erServ").val("");
        $("#erEst").val("");
        $("#erCond").val("");
    }
});


$(".tablaIntegraER tbody").on("click", ".btnEditarIntegraER", function () {
    var idIntegracion = $(this).attr("idIntegracion");

    var datos = new FormData();
    datos.append("idIntegracion4", idIntegracion);

    $.ajax({
        url: "lib/ajaxIntegraciones.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#edtEqRed").val(respuesta["tipo_equipo"]);
            $("#edtEqRed").html(respuesta["detaCategoria"]);
            $("#edtserieERed").val(respuesta["idEqRed"]);
            $("#edtserieERed").html(respuesta["serieEqRed"]);
            $("#idIntegracion").val(respuesta["idIntegracion"]);
            $("#edtnroERed").val(respuesta["nro_eq"]);
            $("#edtipERed").val(respuesta["ip"]);
            $("#edtResp").val(respuesta["responsable"]);
            $("#edtOfi").val(respuesta["oficina_in"]);
            $("#edtServ").val(respuesta["servicio_in"]);
            $("#edtEst").val(respuesta["estado"]);
            $("#edtCond").val(respuesta["condicionPC"]);
            $("#nroAnt3").val(respuesta["nro_eq"]);
            $("#ipAnt3").val(respuesta["ip"]);
        }
    });
});

$("#edtserieERed1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#edtResp").val(data["uResponsable"]);
                $("#edtOfi").val(data["office"]);
                $("#edtServ").val(data["service"]);
                $("#edtEst").val(data["condicion"]);
                $("#edtCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#edtResp").val("");
        $("#edtOfi").val("");
        $("#edtServ").val("");
        $("#edtEst").val("");
        $("#edtCond").val("");
    }
});
$("#edtEqRed1").on("change", function () {
    $("#edtnroERed").val("");
    $("#edtnroERed").attr("placeholder", "Ingresa el nuevo N°");
});
$(".tablaIntegraER tbody").on("click", ".btnAnularIntegraER", function () {
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
            window.location = "index.php?ruta=integracion-er&idIntegracion=" + idIntegracion;
        }
    })
});
$(".tablaIntegraER tbody").on("click", ".btnImprimirFichaER", function () {
    var idIntegracion = $(this).attr("idIntegracion");
    window.open("reports/ficha-integra-er.php?idIntegracion=" + idIntegracion, "_blank");
});
$.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
$("#btnRegIntR").on("click", function () {
    $("#formRegIntR").validate({
        rules: {
            tEqRed: {
                valueNotEquals: "0",
                required: true,
            },
            nroERed: {
                required: true,
            },
            serieERed: {
                valueNotEquals: "0",
                required: true,
            },
        },
        messages: {
            tEqRed: {
                valueNotEquals: "Seleccione Categoría",
                required: "Dato querido",
            },
            nroERed: {
                required: "Ingrese N° de Equipo",
            },
            serieERed: {
                valueNotEquals: "Seleccione N° serie de Equipo de Red",
                required: "Dato querido",
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
});
$("#btnEdtIntR").on("click", function () {
    $("#formEdtIntR").validate({
        rules: {
            edtnroERed: {
                required: true,
            },
        },
        messages: {
            edtnroERed: {
                required: "Ingrese N° de Equipo",
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
});

$("#nroERed").focusout(function () {
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
                $("#nroERed").val("");
                $("#nroERed").focus();
            }
        },
    });
});
$("#ipERed").focusout(function () {
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
                    $("#ipERed").val("");
                    $("#ipERed").focus();
                }
            },
        });
    }
});
$("#edtnroERed").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarNro2 = $(this).val();
    var v111 = $("#nroAnt3").val();

    if (validarNro2 != v111) {
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
                    $("#edtnroERed").val(v111);
                    $("#edtnroERed").focus();
                }
            },
        });
    }
});
$("#edtipERed").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarIP2 = $(this).val();
    var v222 = $("#ipAnt3").val();

    if (validarIP2 != v222 && validarIP2 != "") {
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
                    $("#edtipERed").val(v222);
                    $("#edtipERed").focus();
                }
            },
        });
    }
});