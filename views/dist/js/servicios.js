// Llamamiento de Tablas de Subareas
// Cargar tabla con ajax
var perfilOcultoService = $("#pServiceOculto").val();

$(".tablaSubAreas").DataTable({
    ajax: "util/datatable-servicios.php?perfilOcultoService="+perfilOcultoService,
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
    },
});
// Editar Subareas
$(".tablaSubAreas tbody").on("click", ".btnEditarSubArea", function () {
    var idSubArea = $(this).attr("idSubArea");
    var datos = new FormData();

    datos.append("idSubArea", idSubArea);
    $.ajax({
        url: "lib/ajaxSubareas.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            var idOficina = respuesta["id_area"];
            var dato1 = new FormData();
            dato1.append("idOficina", idOficina);
            $.ajax({
                url: "lib/ajaxOficinas.php",
                method: "POST",
                data: dato1,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    $("#edtoficina").val(respuesta["id_area"]);
                    $("#edtoficina").html(respuesta["area"]);
                }
            });
            $("#hOfi").val(respuesta["id_area"]);
            $("#hnSub").val(respuesta["subarea"]);
            $("#edtSubarea").val(respuesta["subarea"]);
            $("#idSubArea").val(respuesta["id_subarea"]);
        }
    });
});

$("#newSubarea").keyup(function () {
    var neq = $(this).val();
    var mayusteq = neq.toUpperCase();
    $("#newSubarea").val(mayusteq);
});
$("#edtSubarea").keyup(function () {
    var neq = $(this).val();
    var mayusteq = neq.toUpperCase();
    $("#edtSubarea").val(mayusteq);
});
// Validar subarea existente
$("#newSubarea").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var subarea = $(this).val();
    var oficina = $("#oficina").val();

    if (subarea != "" && oficina != 0) {
        var datos = new FormData();
        datos.append("validarSubArea", subarea);
        datos.append("validarOficina", oficina);
        $.ajax({
            url: "lib/ajaxSubareas.php",
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
                        title: 'El servicio ingresado para la Oficina ya existe'
                    });
                    $("#newSubarea").val("");
                    $("#newSubarea").focus();
                    $("#btnRegServicio").addClass("disabled");
                }
                else {
                    $("#newSubarea").focus();
                    $("#btnRegServicio").removeClass("disabled");
                }
            }
        });
    }
    else {
        $("#btnRegServicio").addClass("disabled");
    }
});

$("#edtSubarea").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var subarea2 = $(this).val();
    var a1 = $("#hOfi").val();
    var b1 = $("#hnSub").val();
    var oficina2 = $("#edtoficina1").val();


    if (subarea2 != "" && oficina2 != 0) {
        if (oficina2 != a1 && subarea2 != b1) {
            var datos2 = new FormData();
            datos2.append("validarSubArea", subarea2);
            datos2.append("validarOficina", oficina2);
            $.ajax({
                url: "lib/ajaxSubareas.php",
                method: "POST",
                data: datos2,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    console.log(respuesta);
                    if (respuesta) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'El servicio ingresado para la Oficina ya existe'
                        });
                        $("#edtSubarea").focus();
                        $("#edtSubarea").val("");
                        $("#btnEdtServicio").addClass("disabled");
                    }
                    else {
                        $("#btnEdtServicio").removeClass("disabled");
                    }
                }
            });
        }
        else if (oficina2 == a1 && subarea2 != b1) {
            var datos2 = new FormData();
            datos2.append("validarSubArea", subarea2);
            datos2.append("validarOficina", oficina2);
            $.ajax({
                url: "lib/ajaxSubareas.php",
                method: "POST",
                data: datos2,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    console.log(respuesta);
                    if (respuesta) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'El servicio ingresado para la Oficina ya existe'
                        });
                        $("#edtSubarea").focus();
                        $("#edtSubarea").val("");
                        $("#btnEdtServicio").addClass("disabled");
                    }
                    else {
                        $("#btnEdtServicio").removeClass("disabled");
                    }
                }
            });
        }
        else if (oficina2 != a1 && subarea2 == b1) {
            var datos2 = new FormData();
            datos2.append("validarSubArea", subarea2);
            datos2.append("validarOficina", oficina2);
            $.ajax({
                url: "lib/ajaxSubareas.php",
                method: "POST",
                data: datos2,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    console.log(respuesta);
                    if (respuesta) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'El servicio ingresado para la Oficina ya existe'
                        });
                        $("#edtSubarea").focus();
                        $("#edtSubarea").val("");
                        $("#btnEdtServicio").addClass("disabled");
                    }
                    else {
                        $("#btnEdtServicio").removeClass("disabled");
                    }
                }
            });
        }
        else if (oficina2 == a1 && subarea2 == b1) {
            $("#btnEdtServicio").removeClass("disabled");
        }
    }
    else {
        $("#btnEdtServicio").addClass("disabled");
    }
});
// Eliminar Servicio
$(".tablaSubAreas tbody").on("click", ".btnEliminarSubArea", function () {
    var idSubArea = $(this).attr("idSubArea");
    Swal.fire({
        title: '¿Está seguro de eliminar el servicio?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=servicios&idSubArea=" + idSubArea;
        }
    })
})

$("#btnRegServicio").on("click", function () {
    $.validator.addMethod(
        "valueNotEquals",
        function (value, element, arg) {
            return arg !== value;
        },
        "Value must not equal arg."
    );
    $("#frmRegServicio").validate({
        rules: {
            oficina: {
                valueNotEquals: "0",
                required: true,
            },
            newSubarea: {
                required: true,
            },
        },
        messages: {
            oficina: {
                valueNotEquals: "Seleccione Oficina o Departamento",
                required: "Seleccione Oficina o Departamento",
            },
            newSubarea: {
                required: "Servicio o sub-area requerido",
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
$("#btnEdtServicio").on("click", function () {
    $("#frmEdtServicio").validate({
        rules: {
            edtoficina1: {
                valueNotEquals: "0",
                required: true,
            },
            edtSubarea: {
                required: true,
            },
        },
        messages: {
            edtoficina1: {
                valueNotEquals: "Seleccione Oficina o Departamento",
                required: "Seleccione Oficina o Departamento",
            },
            edtSubarea: {
                required: "Servicio o sub-area requerido",
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
$("#newSubarea").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});
$("#edtSubarea").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});