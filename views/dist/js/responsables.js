$(".tablaResponsables").DataTable({
    ajax: "util/datatable-responsables.php",
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    order: [
        [0, "asc"]
    ],
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
    },
});

// Cargar combos
$("#oficinaRes").on("change", function() {
    var idOficina = $(this).val();
    if (idOficina) {
        $.ajax({
            type: "POST",
            url: "lib/comboServicios.php",
            data: "idOficina=" + idOficina,
            success: function(html) {
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
    function(value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);

// btnRegistrarResponsable
$("#btnRegistrarResponsable").on("click", function() {
    $("#frmRegistroResponsable").validate({
        rules: {
            oficinaRes: {
                valueNotEquals: "0",
            },
            servicioRes: {
                valueNotEquals: "0",
            },
            nombRes: {
                required: true,
            },
            apeRes: {
                required: true,
            },
        },
        messages: {
            oficinaRes: {
                valueNotEquals: "Selecciona oficina",
            },
            servicioRes: {
                valueNotEquals: "Selecciona servicio",
            },
            nombRes: {
                required: "Ingresa nombres del responsable",
            },
            apeRes: {
                required: "Ingresa apellidos del responsable",
            },
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });
});
// Validar campos

// Editar Usuario Responsable
$(".tablaResponsables tbody").on("click", ".btnEditarResponsable", function() {
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
        success: function(respuesta) {
            $("#idResponsable").val(respuesta["idResponsable"]);
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
$(".tablaResponsables tbody").on("click", ".btnEliminarResponsable", function() {
    var idResponsable = $(this).attr("idResponsable");
    Swal.fire({
        title: '¿Está seguro de eliminar el usuario seleccionada?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar usuario responsable!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=responsables&idResponsable=" + idResponsable;
        }
    });

});
// Eliminar Usuario Responsable

$("#edtOfi").on("change", function() {
    var idOficina2 = $(this).val();
    if (idOficina2) {
        $.ajax({
            type: "POST",
            url: "lib/comboServicios.php",
            data: "idOficina=" + idOficina2,
            success: function(html) {
                $("#edtSer").prop("disabled", false);
                $("#edtSer").html(html);
            },
        });
    }
});