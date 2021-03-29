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
    $("#ofiEq1").prop("disabled", false);
    $("#ofiEq").val("0");
    $("#ofiEq").html('Seleccione Serie EQ primero');
    $("#servEq1").prop("disabled", false);
    $("#servEq").val("0");
    $("#servEq").html('Seleccione Serie EQ primero');
    $("#respEq1").prop("disabled", false);
    $("#respEq").val("0");
    $("#respEq").html('Seleccione Serie EQ primero');
    $("#detaEQ").val("");
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
        $("#serieEQ").html('<option value="">Seleccione tipo Equipo primero</option>');
        $("#serieEQ").prop("disabled", false);
        $("#ofiEq1").prop("disabled", false);
        $("#ofiEq").val("0");
        $("#ofiEq").html('Seleccione Serie EQ primero');
        $("#servEq1").prop("disabled", false);
        $("#servEq").val("0");
        $("#servEq").html('Seleccione Serie EQ primero');
        $("#respEq1").prop("disabled", false);
        $("#respEq").val("0");
        $("#respEq").html('Seleccione Serie EQ primero');
        $("#detaEQ").val("");
    }
});
// Cargar lista de series en base al tipo
// Cargar información de equipo en base a serie y tipo seleccionado
$("#serieEQ").on("change", function () {
    var idEq1 = $(this).val();
    var idTip1 = $("#tipEquipo").val();

    if (idEq1 > 0) {
        var datosEQ = new FormData();
        datosEQ.append("idEq1", idEq1);
        datosEQ.append("idTip1", idTip1);
        $.ajax({
            url: "lib/ajaxMantenimientos.php",
            method: "POST",
            data: datosEQ,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (idTip1 > 0) {
                    if (idTip1 == 1 || idTip1 == 4 || idTip1 == 5) {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            "|| Serie N°: " + respuesta["serie"] + "|| Cod.Patr: " + respuesta["sbn"] + "|| Marca: " + respuesta["marca"] + "|| Modelo: " + respuesta["modelo"] + "|| Descripción: " + respuesta["descripcion"] + "|| IP: " + respuesta["ip"]);
                    }
                    else if (idTip1 == 2 || idTip1 == 6 || idTip1 == 7 || idTip1 == 8) {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            "|| Serie N°: " + respuesta["serie"] + "|| Cod.Patr: " + respuesta["sbn"] + "|| Marca: " + respuesta["marca"] + "|| Modelo: " + respuesta["modelo"] + "|| Descripción: " + respuesta["descripcion"] + "|| IP: " + respuesta["ip"]);
                    }
                    else if (idTip1 == 3 || idTip1 == 9 || idTip1 == 14 || idTip1 == 15 || idTip1 == 16 || idTip1 == 17) {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            "|| Serie N°: " + respuesta["serie"] + "|| Cod.Patr: " + respuesta["sbn"] + "|| Marca: " + respuesta["marca"] + "|| Modelo: " + respuesta["modelo"] + "|| Descripción: " + respuesta["descripcion"] + "|| IP: " + respuesta["ip"]);
                    }
                    else {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("Serie N°: " + respuesta["serie"] + "|| Cod.Patr: " + respuesta["sbn"] + "|| Marca: " + respuesta["marca"] + "|| Modelo: " + respuesta["modelo"] + "|| Descripción: " + respuesta["descripcion"]);
                    }
                }
            }
        });
    }
    else {
        $("#ofiEq1").prop("disabled", false);
        $("#ofiEq").val("0");
        $("#ofiEq").html('Seleccione Serie EQ primero');
        $("#servEq1").prop("disabled", false);
        $("#servEq").val("0");
        $("#servEq").html('Seleccione Serie EQ primero');
        $("#respEq1").prop("disabled", false);
        $("#respEq").val("0");
        $("#respEq").html('Seleccione Serie EQ primero');
        $("#detaEQ").val("");
    }

});
// Cargar información de equipo en base a serie y tipo seleccionado