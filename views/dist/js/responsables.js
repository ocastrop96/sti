var perfilOcultoRespon = $("#pResponsableOculto").val();
$(".tablaResponsables").DataTable({
    ajax: "util/datatable-responsables.php?perfilOcultoRespon="+perfilOcultoRespon,
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    order: [
        [4, "asc"]
    ],
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
    },
});
// Cargar combos
$("#oficinaRes").on("change", function () {
    var idOficina = $(this).val();
    if (idOficina > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboServicios.php",
            data: "idOficina=" + idOficina,
            success: function (html) {
                console.log(html);
                $("#servicioRes").prop("disabled", false);
                $("#servicioRes").html(html);
            },
        });
    } else {
        $("#servicioRes").html('<option value="">Seleccione área primero</option>');
        $("#servicioRes").prop("disabled", true);
    }
});
// Cargar combos

// Validar campos
$.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
// btnRegistrarResponsable
$("#btnRegistrarResponsable").on("click", function () {
    $("#frmRegistroResponsable").validate({
        rules: {
            dniResponsable: {
                required: true,
            },
            nombRes: {
                required: true,
            },
            apeRes: {
                required: true,
            },
            oficinaRes: {
                valueNotEquals: "0",
                required: true,
            },
            servicioRes: {
                valueNotEquals: "0",
                required: true,
            },
        },
        messages: {
            dniResponsable: {
                required: "Ingrese DNI",
            },
            nombRes: {
                required: "Ingrese nombres",
            },
            apeRes: {
                required: "Ingrese apellidos",
            },
            oficinaRes: {
                valueNotEquals: "Selecciona Oficina",
                required: "Selecciona Oficina",
            },
            servicioRes: {
                valueNotEquals: "Selecciona Servicio o Área",
                required: "Selecciona Servicio o Área",
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
$("#btnEditarResponsable").on("click", function () {
    $("#frmEditarResponsable").validate({
        rules: {
            edtdniResponsable: {
                required: true,
            },
            edtnombRes: {
                required: true,
            },
            edtapeRes: {
                required: true,
            },
            edtoficinaRes: {
                valueNotEquals: "0",
                required: true,
            },
            edtservicioRes: {
                valueNotEquals: "0",
                required: true,
            },
        },
        messages: {
            edtdniResponsable: {
                required: "Ingrese DNI",
            },
            edtnombRes: {
                required: "Ingrese nombres",
            },
            edtapeRes: {
                required: "Ingrese apellidos",
            },
            edtoficinaRes: {
                valueNotEquals: "Selecciona Oficina",
                required: "Selecciona Oficina",
            },
            edtservicioRes: {
                valueNotEquals: "Selecciona Servicio o Área",
                required: "Selecciona Servicio o Área",
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
// Validar campos
// Editar Usuario Responsable
$(".tablaResponsables tbody").on("click", ".btnEditarResponsable", function () {
    var idResponsable = $(this).attr("idResponsable");
    var datos = new FormData();

    datos.append("idResponsable", idResponsable);
    $.ajax({
        url: "lib/ajaxResponsables.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idResponsable").val(respuesta["idResponsable"]);
            $("#hdni").val(respuesta["dni"]);
            $("#edtdniResponsable").val(respuesta["dni"]);
            $("#edtnombRes").val(respuesta["nombresResp"]);
            $("#edtapeRes").val(respuesta["apellidosResp"]);
            $("#edtoficinaRes").val(respuesta["idOficina"]);
            $("#edtoficinaRes").html(respuesta["area"]);
            $("#edtservicioRes").val(respuesta["idServicio"]);
            $("#edtservicioRes").html(respuesta["subarea"]);
        }
    });
});
// Editar Usuario responsable
// Eliminar Usuario responsable
$(".tablaResponsables tbody").on("click", ".btnEliminarResponsable", function () {
    var idResponsable = $(this).attr("idResponsable");
    Swal.fire({
        title: '¿Está seguro de eliminar el usuario seleccionado?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'No, cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar usuario responsable!'
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=responsables&idResponsable=" + idResponsable;
        }
    });

});
// Eliminar Usuario Responsable
$("#edtOfi").on("change", function () {
    var idOficina2 = $(this).val();
    if (idOficina2) {
        $.ajax({
            type: "POST",
            url: "lib/comboServicios.php",
            data: "idOficina=" + idOficina2,
            success: function (html) {
                $("#edtSer").prop("disabled", false);
                $("#edtSer").html(html);
            },
        });
    }
});
// Validar Usuario Responsable Existente

$("#dniResponsable").attr("maxlength", "8");
$("#edtdniResponsable").attr("maxlength", "8");

$("#dniResponsable").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var dni = $(this).val();
    if (dni != "") {
        var datos = new FormData();
        datos.append("validarDni", dni);
        $.ajax({
            url: "lib/ajaxResponsables.php",
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
                        title: "El DNI Ingresado ya se encuentra registrado",
                    });
                    $("#dniResponsable").val("");
                    $("#dniResponsable").focus();
                    $("#nombRes").val("");
                    $("#apeRes").val("");
                    $("#btnRegistrarResponsable").addClass("disabled");
                } else {
                    $("#nombRes").val("");
                    $("#apeRes").val("");
                    $("#btnRegistrarResponsable").removeClass("disabled");
                    $("#btnDNIResponsable").on("click", function () {
                        var dni = $("#dniResponsable").val();
                        $.ajax({
                            type: "GET",
                            url:
                                "https://dniruc.apisperu.com/api/v1/dni/" +
                                dni +
                                "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9jYXN0cm9wLnRpQGdtYWlsLmNvbSJ9.XtrYx8wlARN2XZwOZo6FeLuYDFT6Ljovf7_X943QC_E",
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                $("#nombRes").val(data["nombres"]);
                                $("#apeRes").val(data["apellidoPaterno"] + " " + data["apellidoMaterno"]);
                                $("#oficinaRes").focus();
                                $("#nombRes").prop("readonly", true);
                                $("#apeRes").prop("readonly", true);
                            },
                            failure: function (data) {
                                toastr.info("No se pudo conectar los datos", "DNI");
                            },
                            error: function (data) {
                                $('#frmRegistroResponsable').trigger("reset");
                                $("#nombRes").prop("readonly", false);
                                $("#apeRes").prop("readonly", false);
                            },
                        });
                    });

                }
            },
        });
    }
});
$("#edtdniResponsable").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var dni1 = $(this).val();
    var dniOri = $("#hdni").val();

    if (dni1 != dniOri) {
        var datos1 = new FormData();
        datos1.append("validarDni", dni1);
        $.ajax({
            url: "lib/ajaxResponsables.php",
            method: "POST",
            data: datos1,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta) {
                    Toast.fire({
                        icon: "warning",
                        title: "El DNI Ingresado ya se encuentra registrado",
                    });
                    $("#edtdniResponsable").val("");
                    $("#edtdniResponsable").focus();
                    $("#edtnombRes").val("");
                    $("#edtapeRes").val("");
                    $("#btnEditarResponsable").addClass("disabled");
                } else {
                    $("#btnEditarResponsable").removeClass("disabled");
                    $("#btnedtDNIResponsable").on("click", function () {
                        var dni = $("#edtdniResponsable").val();
                        $.ajax({
                            type: "GET",
                            url:
                                "https://dniruc.apisperu.com/api/v1/dni/" +
                                dni +
                                "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9jYXN0cm9wLnRpQGdtYWlsLmNvbSJ9.XtrYx8wlARN2XZwOZo6FeLuYDFT6Ljovf7_X943QC_E",
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                $("#edtnombRes").val(data["nombres"]);
                                $("#edtapeRes").val(data["apellidoPaterno"] + " " + data["apellidoMaterno"]);
                                $("#edtOfi").focus();
                                $("#edtnombRes").prop("readonly", true);
                                $("#edtapeRes").prop("readonly", true);
                            },
                            failure: function (data) {
                                toastr.info("No se pudo conectar los datos", "DNI");
                            },
                            error: function (data) {
                                $('#frmEditarResponsable').trigger("reset");
                                $("#edtnombRes").prop("readonly", false);
                                $("#edtapeRes").prop("readonly", false);
                            },
                        });
                    });
                }
            },
        });
    }

});
$("#oficinaRes").change(function () {
    var name12 = $("#nombRes").val();
    var name13 = $("#apeRes").val();

    var rechange12 = name12
        .toLowerCase()
        .trim()
        .split(" ")
        .map((v) => v[0].toUpperCase() + v.substr(1))
        .join(" ");
    var rechange13 = name13
        .toLowerCase()
        .trim()
        .split(" ")
        .map((v) => v[0].toUpperCase() + v.substr(1))
        .join(" ");
    $("#nombRes").val(rechange12);
    $("#apeRes").val(rechange13);
});
$("#edtOfi").change(function () {
    var name121 = $("#edtnombRes").val();
    var name131 = $("#edtapeRes").val();

    var rechange121 = name121
        .toLowerCase()
        .trim()
        .split(" ")
        .map((v) => v[0].toUpperCase() + v.substr(1))
        .join(" ");
    var rechange131 = name131
        .toLowerCase()
        .trim()
        .split(" ")
        .map((v) => v[0].toUpperCase() + v.substr(1))
        .join(" ");
    $("#edtnombRes").val(rechange121);
    $("#edtapeRes").val(rechange131);
});
$("#dniResponsable").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});
$("#nombRes").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});
$("#apeRes").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});
$("#edtdniResponsable").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});
$("#edtnombRes").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});
$("#edtapeRes").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});