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
$(".select2").select2()