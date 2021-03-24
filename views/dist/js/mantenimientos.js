// Tabla general
$(".tablaMantenimientos").DataTable({
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
        emptyTable: "No data available in table"
    },
});
// Tabla general

// Tabla de Diagnosticos
$(".tablaMDiagnosticoFrm").DataTable({
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
        emptyTable: "No data available in table"
    },
});
// Tabla de Diagnosticos

// Tabla de Acciones
$(".tablaAccionesFrm").DataTable({
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
        emptyTable: "No data available in table"
    },
});
// Tabla de Acciones