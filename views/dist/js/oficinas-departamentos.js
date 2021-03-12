// Cargar tabla con ajax
$(".tablaAreas").DataTable({
    "ajax": "util/datatable-oficinas.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "language": {
        "url": "views/dist/js/dataTables.spanish.lang"
    }
});

// Editar área
$(".tablaAreas tbody").on("click", ".btnEditarArea", function () {
    var idOficina = $(this).attr("idOficina");
    var datos = new FormData();

    datos.append("idOficina", idOficina);

    $.ajax({
        url: "lib/ajaxOficinas.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#edtArea").val(respuesta["area"]);
            $("#idArea").val(respuesta["id_area"]);
        }
    });
});

// Validar área existente tanto en nuevo y editar
$("#newArea").change(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var oficina = $(this).val();
    var datos = new FormData();
    datos.append("validarOficina", oficina);
    $.ajax({
        url: "lib/ajaxOficinas.php",
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
                    title: 'La Oficina o Departamento, ya se encuentra registrada'
                });
                $("#newArea").val("");
                $("#newArea").focus();
            }
        }
    });
});

$("#edtArea").change(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var area = $(this).val();
    var datosa = new FormData();
    datosa.append("validarOficina2", area);
    $.ajax({
        url: "lib/ajaxOficinas.php",
        method: "POST",
        data: datosa,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                Toast.fire({
                    icon: 'warning',
                    title: 'La Oficina o Departamento, ya se encuentra registrada'
                });
                $("#edtArea").focus();
            }
        }
    });
});

$(".tablaAreas tbody").on("click", ".btnEliminarArea", function () {
    var idOficina = $(this).attr("idOficina");
    Swal.fire({
        title: '¿Está seguro de eliminar el área?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=oficinas&idOficina=" + idOficina;
        }
    })
});
// Validación
$("#btnRegOficina").on("click", function () {
    $("#frmRegOficina").validate({
        rules: {
            newArea: {
                required: true,
            },
        },
        messages: {
            newArea: {
                required: "Oficina o Departamento requerido",
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
$("#btnEdtOficina").on("click", function () {
    $("#frmEdtOficina").validate({
        rules: {
            edtArea: {
                required: true,
            },
        },
        messages: {
            edtArea: {
                required: "Oficina o Departamento requerido",
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

$("#newArea").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, "");
});
$("#edtArea").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, "");
});