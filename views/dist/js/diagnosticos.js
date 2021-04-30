var perfilOcultoDiag = $("#pDiagnosticoOculto").val();
$(".tablaDiagnosticos").DataTable({
    "ajax": "util/datatable-diagnosticos.php?perfilOcultoDiag=" + perfilOcultoDiag,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "order": [
        [0, "asc"]
    ],
    "info": true,
    "autoWidth": false,
    "language": {
        "url": "views/dist/js/dataTables.spanish.lang"
    }
});

// Editar diagnostico
$(".tablaDiagnosticos tbody").on("click", ".btnEditarDiagnostico", function () {
    var idDiagnostico = $(this).attr("idDiagnostico");
    var datos = new FormData();

    datos.append("idDiagnostico", idDiagnostico);
    $.ajax({
        url: "lib/ajaxDiagnosticos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#edtDiagnostico").val(respuesta["diagnostico"]);
            $("#idDiagnostico").val(respuesta["idDiagnostico"]);
            $("#edtcaDiag").val(respuesta["sgmto"]);
            $("#edtcaDiag").html(respuesta["descSegmento"]);
            $("#nSegmento").val(respuesta["sgmto"]);
            $("#diagAnt").val(respuesta["diagnostico"]);
        }
    });
});
// Editar diagnostico

// Validar diagnostico repetido
$("#newDiagnostico").change(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var categoria = $("#caDiag").val();
    var diagnostico = $(this).val();
    var datos = new FormData();
    datos.append("validarDiagnostico", diagnostico);
    datos.append("validarCategoria", categoria);
    $.ajax({
        url: "lib/ajaxDiagnosticos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                Toast.fire({
                    icon: 'warning',
                    title: 'El diagnóstico ingresado ya existe para el segmento'
                });
                $("#newDiagnostico").val("");
                $("#newDiagnostico").focus();
            }
        }
    });
});


$("#edtDiagnostico").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var categoria2 = $("#edtcaDiag2").val();
    var diagnostico = $(this).val();

    // Bloque de condiciones
    var abSeg = $("#nSegmento").val();
    var bcDiag = $("#diagAnt").val();
    // Bloque de condiciones
    if (diagnostico != "" && categoria2 != 0) {
        if (categoria2 != abSeg && diagnostico != bcDiag) {
            var datos = new FormData();
            datos.append("validarDiagnostico", diagnostico);
            datos.append("validarCategoria", categoria2);
            $.ajax({
                url: "lib/ajaxDiagnosticos.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    if (respuesta) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'El diagnóstico ingresado ya existe para el segmento'
                        });
                        $("#edtDiagnostico").val("");
                        $("#edtDiagnostico").focus();
                    }
                }
            });
        }
        else if (categoria2 == abSeg && diagnostico != bcDiag) {
            var datos = new FormData();
            datos.append("validarDiagnostico", diagnostico);
            datos.append("validarCategoria", categoria2);
            $.ajax({
                url: "lib/ajaxDiagnosticos.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    if (respuesta) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'El diagnóstico ingresado ya existe para el segmento'
                        });
                        $("#edtDiagnostico").val("");
                        $("#edtDiagnostico").focus();
                    }
                }
            });
        }
        else if (categoria2 != abSeg && diagnostico == bcDiag) {
            var datos = new FormData();
            datos.append("validarDiagnostico", diagnostico);
            datos.append("validarCategoria", categoria2);
            $.ajax({
                url: "lib/ajaxDiagnosticos.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    if (respuesta) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'El diagnóstico ingresado ya existe para el segmento'
                        });
                        $("#edtDiagnostico").val("");
                        $("#edtDiagnostico").focus();
                    }
                }
            });
        }
    }
});
// Validar diagnostico repetido

// Eliminar diagnostico
$(".tablaDiagnosticos tbody").on("click", ".btnEliminarDiagnostico", function () {
    var idDiagnostico = $(this).attr("idDiagnostico");
    Swal.fire({
        title: '¿Está seguro de eliminar el diagnóstico?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar diagnóstico!'
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=diagnosticos&idDiagnostico=" + idDiagnostico;
        }
    })
});

$("#newDiagnostico").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});
$("#edtDiagnostico").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});
// Eliminar diagnostico
$.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
$("#btnRegDiag").on("click", function () {
    $("#formRegDiag").validate({
        rules: {
            caDiag: {
                valueNotEquals: "0",
                required: true,
            },
            newDiagnostico: {
                required: true,
            },
        },
        messages: {
            caDiag: {
                valueNotEquals: "Selecciona Segmento",
                required: true,
            },
            newDiagnostico: {
                required: "Ingrese diagnóstico",
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
$("#btnEdtDiag").on("click", function () {
    $("#formEdtDiag").validate({
        rules: {
            edtcaDiag: {
                valueNotEquals: "0",
                required: true,
            },
            edtDiagnostico: {
                required: true,
            },
        },
        messages: {
            edtcaDiag: {
                valueNotEquals: "Selecciona Segmento",
                required: true,
            },
            edtDiagnostico: {
                required: "Ingrese diagnóstico",
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