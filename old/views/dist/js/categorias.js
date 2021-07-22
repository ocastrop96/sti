var perfilOcultoCatego = $("#pCategoriaOculto").val();
$(".tablaCategorias").DataTable({
    ajax: "util/datatable-categorias.php?perfilOcultoCatego="+perfilOcultoCatego,
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    order: [
        [2, "asc"]
    ],
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
    },
});

// Editar Categorias
$(".tablaCategorias tbody").on("click", ".btnEditarCategoria", function () {
    var idCategoria = $(this).attr("idCategoria");
    var datos = new FormData();
    console.log(idCategoria);

    datos.append("idCategoria", idCategoria);
    $.ajax({
        url: "lib/ajaxCategorias.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#edtCategoria").val(respuesta["categoria"]);
            $("#ctgDet").val(respuesta["categoria"]);
            $("#idCategoria").val(respuesta["idCategoria"]);
            $("#edtSeg").val(respuesta["segmento"]);
            $("#edtSeg").html(respuesta["descSegmento"]);
        },
    });
});
// Editar Categorias
// Validar
$("#newCategoria").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var categoria = $(this).val();
    var datos = new FormData();

    if (categoria != "") {
        datos.append("validarCategoria", categoria);
        $.ajax({
            url: "lib/ajaxCategorias.php",
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
                        title: 'La categoría, ya se encuentra registrada'
                    });
                    $("#newCategoria").val("");
                    $("#newCategoria").focus();
                    $("#btnRegCategoria").addClass("d-none");
                }
                else {
                    $("#btnRegCategoria").removeClass("d-none");
                }
            }
        });
    }
    else {
        $("#btnRegCategoria").addClass("d-none");
    }
});

$("#edtCategoria").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var categoria1 = $(this).val();
    var ck1 = $("#ctgDet").val();

    if (categoria1 != "") {
        if (categoria1 != ck1) {
            var datos = new FormData();
            datos.append("validarCategoria", categoria1);
            $.ajax({
                url: "lib/ajaxCategorias.php",
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
                            title: 'La categoría, ya se encuentra registrada'
                        });
                        $("#edtCategoria").val("");
                        $("#edtCategoria").focus();
                        $("#btnEdtCategoria").addClass("d-none");
                    }
                }
            });
        }
        else {
            $("#btnEdtCategoria").removeClass("d-none");
        }
    }
    else {
        $("#btnEdtCategoria").addClass("d-none");
    }
});
// Validar

// Eliminar categoría
$(".tablaCategorias tbody").on("click", ".btnEliminarCategoria", function () {
    var idCategoria = $(this).attr("idCategoria");
    Swal.fire({
        title: '¿Está seguro de eliminar la categoría?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=categorias&idCategoria=" + idCategoria;
        }
    })
});

$("#btnRegCategoria").on("click", function () {
    $("#frmRegCategoria").validate({
        rules: {
            newSeg: {
                valueNotEquals: "0",
                required: true,
            },
            newCategoria: {
                required: true,
            },
        },
        messages: {
            newSeg: {
                valueNotEquals: "Seleccione segmento",
                required: "Seleccione segmento",
            },
            newCategoria: {
                required: "Ingrese nombre Categoría",
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
$("#newCategoria").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});
$("#edtCategoria").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚÜü ]/g, "");
});
$("#btnEdtCategoria").on("click", function () {
    $("#frmEdtCategoria").validate({
        rules: {
            edtSeg: {
                valueNotEquals: "0",
                required: true,
            },
            edtCategoria: {
                required: true,
            },
        },
        messages: {
            edtSeg: {
                valueNotEquals: "Seleccione segmento",
                required: "Seleccione segmento",
            },
            edtCategoria: {
                required: "Ingrese nombre Categoría",
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