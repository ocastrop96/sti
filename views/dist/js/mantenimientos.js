// Tabla general
$(".tablaMantenimientos").DataTable({
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
// Tabla general

// Tabla de Diagnosticos
$(".tablaMDiagnosticoFrm").DataTable({
    "ajax": "util/datatable-diagnosticosMant.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": true,
    "lengthChange": false,
    "pageLength": 5,
    "searching": true,
    "ordering": true,
    "order": [
        [2, "asc"]
    ],
    "info": false,
    "autoWidth": false,
    "dom": '<lf<t>ip>',
    "oLanguage": {
        "sSearch": "Buscar diagnóstico :",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
    },
});
// Tabla de Diagnosticos

// Tabla de Acciones
$(".tablaAccionesFrm").DataTable({
    "ajax": "util/datatable-accionesMant.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": true,
    "lengthChange": false,
    "pageLength": 5,
    "searching": true,
    "ordering": true,
    "order": [
        [2, "asc"]
    ],
    "info": false,
    "autoWidth": false,
    "dom": '<lf<t>ip>',
    "oLanguage": {
        "sSearch": "Buscar acción realizada :",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
    },
});
// Tabla de Acciones
$(".select2").select2();
$("#fEva").inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
$('#fEva').datepicker({
    'format': 'dd/mm/yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
$("#fInicio").inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
$('#fInicio').datepicker({
    'format': 'dd/mm/yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
$("#fFin").inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
$('#fFin').datepicker({
    'format': 'dd/mm/yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
// Cargar lista de series en base al tipo
$("#tipEquipo").on("change", function () {
    var idCatego = $(this).val();
    if (idCatego > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboSeriesManto.php",
            data: "idCatego=" + idCatego,
            success: function (html) {
                $("#serieEQ").prop("disabled", false);
                $("#serieEQ").html(html);
            },
        });
    }
    else {
        $("#serieEQ").html('<option value="">Seleccione área primero</option>');
        $("#serieEQ").prop("disabled", true);
    }
});


// $("#oficinaRes").on("change", function () {
//     var idOficina = $(this).val();
//     if (idOficina > 0) {
//         $.ajax({
//             type: "POST",
//             url: "lib/comboServicios.php",
//             data: "idOficina=" + idOficina,
//             success: function (html) {
//                 $("#servicioRes").prop("disabled", false);
//                 $("#servicioRes").html(html);
//             },
//         });
//     } else {
//         $("#servicioRes").html('<option value="">Seleccione área primero</option>');
//         $("#servicioRes").prop("disabled", true);
//     }
// });