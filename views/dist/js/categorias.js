$(".tablaCategorias").DataTable({
    ajax: "util/datatable-categorias.php",
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
$(".tablaCategorias tbody").on("click", ".btnEditarCategoria", function() {
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
        success: function(respuesta) {
            $("#edtCategoria").val(respuesta["categoria"]);
            $("#idCategoria").val(respuesta["idCategoria"]);
            $("#edtSeg").val(respuesta["segmento"]);
            $("#edtSeg").html(respuesta["descSegmento"]);
        },
    });
});
// Editar Categorias
// Validar
$("#newCategoria").change(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var categoria = $(this).val();
    var datos = new FormData();
    datos.append("validarCategoria", categoria);
    $.ajax({
        url: "lib/ajaxCategorias.php",
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
                    title: 'La categoría, ya se encuentra registrada'
                });
                $("#newCategoria").val("");
            }
        }
    });
});

$("#edtCategoria").change(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
    });
    var categoria1 = $(this).val();
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
        success: function(respuesta) {
            if (respuesta) {
                Toast.fire({
                    type: 'warning',
                    title: 'La categoría, ya se encuentra registrada'
                });
                $("#edtCategoria").val("");
            }
        }
    });
});
// Validar

// Eliminar categoría
$(".tablaCategorias tbody").on("click", ".btnEliminarCategoria", function() {
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
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=categorias&idCategoria=" + idCategoria;
        }
    })
});