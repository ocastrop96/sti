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
$(".tablaAreas tbody").on("click", ".btnEditarArea", function() {
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
        success: function(respuesta) {
            $("#edtArea").val(respuesta["area"]);
            $("#idArea").val(respuesta["id_area"]);
        }
    });
});

// Validar área existente tanto en nuevo y editar
$("#newArea").change(function() {
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
        success: function(respuesta) {
            if (respuesta) {
                Toast.fire({
                    type: 'warning',
                    title: 'La Oficina o Departamento, ya se encuentra registrada'
                });
                $("#newArea").val("");
            }
        }
    });
});

$("#edtArea").change(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var area = $(this).val();
    var datos = new FormData();
    datos.append("validarArea", area);
    $.ajax({
        url: "lib/ajaxOficinas.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                Toast.fire({
                    type: 'warning',
                    title: 'El área  ya se encuentra registrada'
                });
                $("#edtArea").val("");
            }
        }
    });
});

$(".tablaAreas tbody").on("click", ".btnEliminarArea", function() {
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
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=oficinas&idOficina=" + idOficina;
        }
    })
});