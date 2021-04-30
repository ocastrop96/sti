var perfilOcultoIntP = $("#pIntPOculto").val();
$(".tablaIntegraEP").DataTable({
    ajax: "util/datatable-integra-ep.php?perfilOcultoIntP=" + perfilOcultoIntP,
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

$("#edtnroERed").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#edtnroImp").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#nroImp").keyup(function () {
    var nImp = $(this).val();
    var mayusnImp = nImp.toUpperCase();
    $("#nroImp").val(mayusnImp);
});

$("#edtnroImp").keyup(function () {
    var nImp2 = $(this).val();
    var mayusnImp2 = nImp2.toUpperCase();
    $("#edtnroImp").val(mayusnImp2);
});
$("#serieImp").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#impResp").val(data["uResponsable"]);
                $("#impOfi").val(data["office"]);
                $("#impServ").val(data["service"]);
                $("#impEst").val(data["condicion"]);
                $("#impCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#impResp").val("");
        $("#impOfi").val("");
        $("#impServ").val("");
        $("#impEst").val("");
        $("#impCond").val("");
    }
});

$(".tablaIntegraEP tbody").on("click", ".btnEditarIntegraEP", function () {
    var idIntegracion = $(this).attr("idIntegracion");

    var datos = new FormData();
    datos.append("idIntegracion3", idIntegracion);

    $.ajax({
        url: "lib/ajaxIntegraciones.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#edtEqImp").val(respuesta["tipo_equipo"]);
            $("#edtEqImp").html(respuesta["detaCategoria"]);
            $("#edtserieImp").val(respuesta["idimp"]);
            $("#edtserieImp").html(respuesta["serieimp"]);
            $("#idIntegracion").val(respuesta["idIntegracion"]);
            $("#edtnroImp").val(respuesta["nro_eq"]);
            $("#edtip_imp").val(respuesta["ip"]);
            $("#edtimpResp").val(respuesta["responsable"]);
            $("#edtimpOfi").val(respuesta["oficina_in"]);
            $("#edtimpServ").val(respuesta["servicio_in"]);
            $("#edtimpEst").val(respuesta["estado"]);
            $("#edtimpCond").val(respuesta["condicionPC"]);
            $("#nroAnt2").val(respuesta["nro_eq"]);
            $("#ipAnt2").val(respuesta["ip"]);
        }
    });
});

$("#edtserieImp1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#edtimpResp").val(data["uResponsable"]);
                $("#edtimpOfi").val(data["office"]);
                $("#edtimpServ").val(data["service"]);
                $("#edtimpEst").val(data["condicion"]);
                $("#edtimpCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#edtimpResp").val("");
        $("#edtimpOfi").val("");
        $("#edtimpServ").val("");
        $("#edtimpEst").val("");
        $("#edtimpCond").val("");
    }
});

$("#edtEqImp1").on("change", function () {
    $("#edtnroImp").val("");
    $("#edtnroImp").attr("placeholder", "Ingresa el nuevo N° de Imp");
});

$(".tablaIntegraEP tbody").on("click", ".btnAnularIntegraEP", function () {
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
            window.location = "index.php?ruta=integracion-ep&idIntegracion=" + idIntegracion;
        }
    })
});

$(".tablaIntegraEP tbody").on("click", ".btnImprimirFichaEP", function () {
    var idIntegracion = $(this).attr("idIntegracion");
    window.open("reports/ficha-integra-imp.php?idIntegracion=" + idIntegracion, "_blank");
});
$("#btnRegIntPO").on("click", function () {
    $("#formRegIntPO").validate({
        rules: {
            tEqImp: {
                valueNotEquals: "0",
                required: true,
            },
            nroImp: {
                required: true,
            },
            serieImp: {
                valueNotEquals: "0",
                required: true,
            },
        },
        messages: {
            tEqImp: {
                valueNotEquals: "Seleccione Categoría",
                required: "Dato querido",
            },
            nroImp: {
                required: "Ingrese dato requerido",
            },
            serieImp: {
                valueNotEquals: "Seleccione N° serie de Impresora o Periférico",
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
$("#btnEdtIntPO").on("click", function () {
    $("#formEdtIntPO").validate({
        rules: {
            edtnroImp: {
                required: true,
            },
        },
        messages: {
            edtnroImp: {
                required: "Ingrese dato requerido",
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

$("#nroImp").focusout(function () {
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
                $("#nroImp").val("");
                $("#nroImp").focus();
            }
        },
    });
});
$("#ip_imp").focusout(function () {
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
                    $("#ip_imp").val("");
                    $("#ip_imp").focus();
                }
            },
        });
    }
});

$("#edtnroImp").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarNro2 = $(this).val();
    var v11 = $("#nroAnt2").val();

    if (validarNro2 != v11) {
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
                    $("#edtnroImp").val(v11);
                    $("#edtnroImp").focus();
                }
            },
        });
    }
});
$("#edtip_imp").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var validarIP2 = $(this).val();
    var v22 = $("#ipAnt2").val();

    if (validarIP2 != v22 && validarIP2 != "") {
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
                    $("#edtip_imp").val(v22);
                    $("#edtip_imp").focus();
                }
            },
        });
    }
});