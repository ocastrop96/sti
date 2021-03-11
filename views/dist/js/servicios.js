// Llamamiento de Tablas de Subareas
// Cargar tabla con ajax
$(".tablaSubAreas").DataTable({
    "ajax": "util/datatable-servicios.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "order": [
        [1, "asc"]
    ],
    "info": true,
    "autoWidth": false,
    "language": {
        "url": "views/dist/js/dataTables.spanish.lang"
    }
});
// Editar Subareas
$(".tablaSubAreas tbody").on("click", ".btnEditarSubArea", function() {
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
        success: function(respuesta) {
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
                success: function(respuesta) {
                    $("#edtoficina").val(respuesta["id_area"]);
                    $("#edtoficina").html(respuesta["area"]);
                }
            });

            $("#edtSubarea").val(respuesta["subarea"]);
            $("#idSubArea").val(respuesta["id_subarea"]);
        }
    });
});
// Validar subarea existente
$("#newSubarea").change(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var subarea = $(this).val();
    var oficina = $("#oficina").val();
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
        success: function(respuesta) {
            if (respuesta) {
                Toast.fire({
                    type: 'warning',
                    title: 'El servicio ingresado para la Oficina ya existe'
                });
                $("#newSubarea").val("");
            }
        }
    });
});

$("#edtSubarea").change(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var subarea = $(this).val();
    var oficina = $("#edtoficina").val();
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
        success: function(respuesta) {
            if (respuesta) {
                Toast.fire({
                    type: 'warning',
                    title: 'El servicio ingresado para la Oficina ya existe'
                });
                $("#edtSubarea").val("");
            }
        }
    });
});
// Eliminar Servicio
$(".tablaSubAreas tbody").on("click", ".btnEliminarSubArea", function() {
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
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=servicios&idSubArea=" + idSubArea;
        }
    })
})