// Tabla general
$(".tablaMantenimientos").DataTable({
    "ajax": "util/datatable-mantenimientos.php",
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
// Setting parameters
$("#descIniEQ").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
// $("#descIniEQ").keyup(function () {
//     var st = $(this).val();
//     var mayust = st.toUpperCase();
//     $("#descIniEQ").val(mayust);
// });
$("#descIniEQ").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
// $("#descIniEQ").keyup(function () {
//     var st = $(this).val();
//     var mayust = st.toUpperCase();
//     $("#descIniEQ").val(mayust);
// });
$("#priEvaEQ").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
// $("#priEvaEQ").keyup(function () {
//     var st = $(this).val();
//     var mayust = st.toUpperCase();
//     $("#priEvaEQ").val(mayust);
// });
$("#recoFEQ").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
// $("#recoFEQ").keyup(function () {
//     var st = $(this).val();
//     var mayust = st.toUpperCase();
//     $("#recoFEQ").val(mayust);
// });
$("#detalleOtros").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
// $("#detalleOtros").keyup(function () {
//     var st = $(this).val();
//     var mayust = st.toUpperCase();
//     $("#detalleOtros").val(mayust);
// });
// Setting parameters
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
    $("#tsegmento").val("0");
    $("#tsegmento").html('Seleccione Serie EQ primero');
    var idCatego = $(this).val();
    if (idCatego > 0) {
        $("#d1")[0].selectedIndex = 0;
        $("#d1").prop("disabled", true);
        $("#d2")[0].selectedIndex = 0;
        $("#d2").prop("disabled", true);
        $("#d3")[0].selectedIndex = 0;
        $("#d3").prop("disabled", true);
        $("#d4")[0].selectedIndex = 0;
        $("#d4").prop("disabled", true);
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
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
        $("#segmentado").val("0");
        $("#tsegmento").val("0");
        $("#tsegmento").html('Seleccione Serie EQ primero');
        $("#d1")[0].selectedIndex = 0;
        $("#d1").prop("disabled", true);
        $("#d2")[0].selectedIndex = 0;
        $("#d2").prop("disabled", true);
        $("#d3")[0].selectedIndex = 0;
        $("#d3").prop("disabled", true);
        $("#d4")[0].selectedIndex = 0;
        $("#d4").prop("disabled", true);
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
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
        $("#d2")[0].selectedIndex = 0;
        $("#d2").prop("disabled", true);
        $("#d3")[0].selectedIndex = 0;
        $("#d3").prop("disabled", true);
        $("#d4")[0].selectedIndex = 0;
        $("#d4").prop("disabled", true);
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
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
                            " || Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"] + " || IP: " + respuesta["ip"] + " || Procesador: " + respuesta["procesador"] + "-" + respuesta["vprocesador"] + " || RAM: " + respuesta["ram"] + " || Disco Duro: " + respuesta["discoDuro"]);
                        $("#segmentado").val(respuesta["tipSegmento"]);
                        $("#tsegmento").val(respuesta["tipSegmento"]);
                        $("#tsegmento").html(respuesta["descSegmento"]);
                        // Llamar lista inicial de diagnosticos
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#d1").prop("disabled", false);
                                $("#d1").html(html);
                                // $("#d2").prop("disabled", false);
                                // $("#d3").prop("disabled", false);
                                // $("#d4").prop("disabled", false);
                                // $("#d5").prop("disabled", false);
                                // $("#d6").prop("disabled", false);
                                // $("#d7").prop("disabled", false);
                                // $("#d8").prop("disabled", false);
                                $("#d2")[0].selectedIndex = 0;
                                $("#d2").prop("disabled", true);
                                $("#d3")[0].selectedIndex = 0;
                                $("#d3").prop("disabled", true);
                                $("#d4")[0].selectedIndex = 0;
                                $("#d4").prop("disabled", true);
                                $("#d5")[0].selectedIndex = 0;
                                $("#d5").prop("disabled", true);
                                $("#d6")[0].selectedIndex = 0;
                                $("#d6").prop("disabled", true);
                                $("#d7")[0].selectedIndex = 0;
                                $("#d7").prop("disabled", true);
                                $("#d8")[0].selectedIndex = 0;
                                $("#d8").prop("disabled", true);
                            },
                        });
                        // Llamar lista inicial de diagnosticos
                        // Llamar lista inicial de acciones
                        let idAcciona = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaAcciones.php",
                            data: "idAcciona=" + idAcciona,
                            success: function (html) {
                                $("#a1").prop("disabled", false);
                                $("#a1").html(html);
                                $("#a2").prop("disabled", false);
                                $("#a3").prop("disabled", false);
                                $("#a4").prop("disabled", false);
                                $("#a5").prop("disabled", false);
                                $("#a6").prop("disabled", false);
                                $("#a7").prop("disabled", false);
                                $("#a8").prop("disabled", false);
                            },
                        });
                        // Llamar lista inicial de acciones
                    }
                    else if (idTip1 == 2 || idTip1 == 6 || idTip1 == 7 || idTip1 == 8) {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            " || Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"] + " || IP: " + respuesta["ip"]);
                        $("#segmentado").val(respuesta["tipSegmento"]);
                        $("#tsegmento").val(respuesta["tipSegmento"]);
                        $("#tsegmento").html(respuesta["descSegmento"]);
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#d1").prop("disabled", false);
                                $("#d1").html(html);
                                // $("#d2").prop("disabled", false);
                                // $("#d3").prop("disabled", false);
                                // $("#d4").prop("disabled", false);
                                // $("#d5").prop("disabled", false);
                                // $("#d6").prop("disabled", false);
                                // $("#d7").prop("disabled", false);
                                // $("#d8").prop("disabled", false);
                                $("#d2")[0].selectedIndex = 0;
                                $("#d2").prop("disabled", true);
                                $("#d3")[0].selectedIndex = 0;
                                $("#d3").prop("disabled", true);
                                $("#d4")[0].selectedIndex = 0;
                                $("#d4").prop("disabled", true);
                                $("#d5")[0].selectedIndex = 0;
                                $("#d5").prop("disabled", true);
                                $("#d6")[0].selectedIndex = 0;
                                $("#d6").prop("disabled", true);
                                $("#d7")[0].selectedIndex = 0;
                                $("#d7").prop("disabled", true);
                                $("#d8")[0].selectedIndex = 0;
                                $("#d8").prop("disabled", true);
                            },
                        });
                        let idAcciona = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaAcciones.php",
                            data: "idAcciona=" + idAcciona,
                            success: function (html) {
                                $("#a1").prop("disabled", false);
                                $("#a1").html(html);
                                $("#a2").prop("disabled", false);
                                $("#a3").prop("disabled", false);
                                $("#a4").prop("disabled", false);
                                $("#a5").prop("disabled", false);
                                $("#a6").prop("disabled", false);
                                $("#a7").prop("disabled", false);
                                $("#a8").prop("disabled", false);
                            },
                        });
                    }
                    else if (idTip1 == 3 || idTip1 == 9 || idTip1 == 14 || idTip1 == 15 || idTip1 == 16 || idTip1 == 17) {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            " || Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"] + " || IP: " + respuesta["ip"]);
                        $("#segmentado").val(respuesta["tipSegmento"]);
                        $("#tsegmento").val(respuesta["tipSegmento"]);
                        $("#tsegmento").html(respuesta["descSegmento"]);
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#d1").prop("disabled", false);
                                $("#d1").html(html);
                                // $("#d2").prop("disabled", false);
                                // $("#d3").prop("disabled", false);
                                // $("#d4").prop("disabled", false);
                                // $("#d5").prop("disabled", false);
                                // $("#d6").prop("disabled", false);
                                // $("#d7").prop("disabled", false);
                                // $("#d8").prop("disabled", false);
                                $("#d2")[0].selectedIndex = 0;
                                $("#d2").prop("disabled", true);
                                $("#d3")[0].selectedIndex = 0;
                                $("#d3").prop("disabled", true);
                                $("#d4")[0].selectedIndex = 0;
                                $("#d4").prop("disabled", true);
                                $("#d5")[0].selectedIndex = 0;
                                $("#d5").prop("disabled", true);
                                $("#d6")[0].selectedIndex = 0;
                                $("#d6").prop("disabled", true);
                                $("#d7")[0].selectedIndex = 0;
                                $("#d7").prop("disabled", true);
                                $("#d8")[0].selectedIndex = 0;
                                $("#d8").prop("disabled", true);
                            },
                        });
                        let idAcciona = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaAcciones.php",
                            data: "idAcciona=" + idAcciona,
                            success: function (html) {
                                $("#a1").prop("disabled", false);
                                $("#a1").html(html);
                                $("#a2").prop("disabled", false);
                                $("#a3").prop("disabled", false);
                                $("#a4").prop("disabled", false);
                                $("#a5").prop("disabled", false);
                                $("#a6").prop("disabled", false);
                                $("#a7").prop("disabled", false);
                                $("#a8").prop("disabled", false);
                            },
                        });
                    }
                    else {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"]);
                        $("#segmentado").val(respuesta["tipSegmento"]);
                        $("#tsegmento").val(respuesta["tipSegmento"]);
                        $("#tsegmento").html(respuesta["descSegmento"]);
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#d1").prop("disabled", false);
                                $("#d1").html(html);
                                // $("#d2").prop("disabled", false);
                                // $("#d3").prop("disabled", false);
                                // $("#d4").prop("disabled", false);
                                // $("#d5").prop("disabled", false);
                                // $("#d6").prop("disabled", false);
                                // $("#d7").prop("disabled", false);
                                // $("#d8").prop("disabled", false);
                                $("#d2")[0].selectedIndex = 0;
                                $("#d2").prop("disabled", true);
                                $("#d3")[0].selectedIndex = 0;
                                $("#d3").prop("disabled", true);
                                $("#d4")[0].selectedIndex = 0;
                                $("#d4").prop("disabled", true);
                                $("#d5")[0].selectedIndex = 0;
                                $("#d5").prop("disabled", true);
                                $("#d6")[0].selectedIndex = 0;
                                $("#d6").prop("disabled", true);
                                $("#d7")[0].selectedIndex = 0;
                                $("#d7").prop("disabled", true);
                                $("#d8")[0].selectedIndex = 0;
                                $("#d8").prop("disabled", true);
                            },
                        });
                        let idAcciona = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaAcciones.php",
                            data: "idAcciona=" + idAcciona,
                            success: function (html) {
                                $("#a1").prop("disabled", false);
                                $("#a1").html(html);
                                $("#a2").prop("disabled", false);
                                $("#a3").prop("disabled", false);
                                $("#a4").prop("disabled", false);
                                $("#a5").prop("disabled", false);
                                $("#a6").prop("disabled", false);
                                $("#a7").prop("disabled", false);
                                $("#a8").prop("disabled", false);
                            },
                        });
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
        $("#segmentado").val("0");
        $("#tsegmento").val("0");
        $("#tsegmento").html('Seleccione Serie EQ primero');

        // $("#d2").val("0");
        // $("#d2").html('Seleccione Diagnóstico 2');
        $("#d2")[0].selectedIndex = 0;
        $("#d2").prop("disabled", true);
        $("#d3")[0].selectedIndex = 0;
        $("#d3").prop("disabled", true);
        $("#d4")[0].selectedIndex = 0;
        $("#d4").prop("disabled", true);
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }

});

$("#d1").on("change", function () {
    var existe = $(this).val();
    var sgmt = $("#segmentado").val();
    $("#d2")[0].selectedIndex = 0;
    $("#d2").prop("disabled", true);
    $("#d3")[0].selectedIndex = 0;
    $("#d3").prop("disabled", true);
    $("#d4")[0].selectedIndex = 0;
    $("#d4").prop("disabled", true);
    $("#d5")[0].selectedIndex = 0;
    $("#d5").prop("disabled", true);
    $("#d6")[0].selectedIndex = 0;
    $("#d6").prop("disabled", true);
    $("#d7")[0].selectedIndex = 0;
    $("#d7").prop("disabled", true);
    $("#d8")[0].selectedIndex = 0;
    $("#d8").prop("disabled", true);
    if (existe > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos.php",
            data: "sgmt=" + sgmt + "&existe=" + existe,
            success: function (html) {
                $("#d2").html(html);
                $("#d2").prop("disabled", false);
            },
        });
    }
    else {
        $("#d2")[0].selectedIndex = 0;
        $("#d2").prop("disabled", true);
        $("#d3")[0].selectedIndex = 0;
        $("#d3").prop("disabled", true);
        $("#d4")[0].selectedIndex = 0;
        $("#d4").prop("disabled", true);
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
});

$("#d2").on("change", function () {
    var existe = $("#d1").val();
    var existe2 = $(this).val();
    var sgmt = $("#segmentado").val();
    $("#d3")[0].selectedIndex = 0;
    $("#d3").prop("disabled", true);
    $("#d4")[0].selectedIndex = 0;
    $("#d4").prop("disabled", true);
    $("#d5")[0].selectedIndex = 0;
    $("#d5").prop("disabled", true);
    $("#d6")[0].selectedIndex = 0;
    $("#d6").prop("disabled", true);
    $("#d7")[0].selectedIndex = 0;
    $("#d7").prop("disabled", true);
    $("#d8")[0].selectedIndex = 0;
    $("#d8").prop("disabled", true);
    if (existe2 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos2.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2,
            success: function (html) {
                $("#d3").html(html);
                $("#d3").prop("disabled", false);
            },
        });
    }
    else {
        $("#d3")[0].selectedIndex = 0;
        $("#d3").prop("disabled", true);
        $("#d4")[0].selectedIndex = 0;
        $("#d4").prop("disabled", true);
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
});
$("#d3").on("change", function () {
    var existe = $("#d1").val();
    var existe2 = $("#d2").val();
    var existe3 = $(this).val();
    var sgmt = $("#segmentado").val();
    $("#d4")[0].selectedIndex = 0;
    $("#d4").prop("disabled", true);
    $("#d5")[0].selectedIndex = 0;
    $("#d5").prop("disabled", true);
    $("#d6")[0].selectedIndex = 0;
    $("#d6").prop("disabled", true);
    $("#d7")[0].selectedIndex = 0;
    $("#d7").prop("disabled", true);
    $("#d8")[0].selectedIndex = 0;
    $("#d8").prop("disabled", true);
    if (existe3 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos3.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3,
            success: function (html) {
                $("#d4").html(html);
                $("#d4").prop("disabled", false);
            },
        });
    }
    else {
        $("#d4")[0].selectedIndex = 0;
        $("#d4").prop("disabled", true);
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
});
$("#d4").on("change", function () {
    var existe = $("#d1").val();
    var existe2 = $("#d2").val();
    var existe3 = $("#d3").val();
    var existe4 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#d5")[0].selectedIndex = 0;
    $("#d5").prop("disabled", true);
    $("#d6")[0].selectedIndex = 0;
    $("#d6").prop("disabled", true);
    $("#d7")[0].selectedIndex = 0;
    $("#d7").prop("disabled", true);
    $("#d8")[0].selectedIndex = 0;
    $("#d8").prop("disabled", true);
    if (existe4 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos4.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4,
            success: function (html) {
                $("#d5").html(html);
                $("#d5").prop("disabled", false);
            },
        });
    }
    else {
        $("#d5")[0].selectedIndex = 0;
        $("#d5").prop("disabled", true);
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
});
$("#d5").on("change", function () {
    var existe = $("#d1").val();
    var existe2 = $("#d2").val();
    var existe3 = $("#d3").val();
    var existe4 = $("#d4").val();
    var existe5 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#d6")[0].selectedIndex = 0;
    $("#d6").prop("disabled", true);
    $("#d7")[0].selectedIndex = 0;
    $("#d7").prop("disabled", true);
    $("#d8")[0].selectedIndex = 0;
    $("#d8").prop("disabled", true);
    if (existe5 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos5.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5,
            success: function (html) {
                $("#d6").html(html);
                $("#d6").prop("disabled", false);
            },
        });
    }
    else {
        $("#d6")[0].selectedIndex = 0;
        $("#d6").prop("disabled", true);
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
});
$("#d6").on("change", function () {
    var existe = $("#d1").val();
    var existe2 = $("#d2").val();
    var existe3 = $("#d3").val();
    var existe4 = $("#d4").val();
    var existe5 = $("#d5").val();
    var existe6 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#d7")[0].selectedIndex = 0;
    $("#d7").prop("disabled", true);
    $("#d8")[0].selectedIndex = 0;
    $("#d8").prop("disabled", true);
    if (existe6 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos6.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6,
            success: function (html) {
                $("#d7").html(html);
                $("#d7").prop("disabled", false);
            },
        });
    }
    else {
        $("#d7")[0].selectedIndex = 0;
        $("#d7").prop("disabled", true);
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
});
$("#d7").on("change", function () {
    var existe = $("#d1").val();
    var existe2 = $("#d2").val();
    var existe3 = $("#d3").val();
    var existe4 = $("#d4").val();
    var existe5 = $("#d5").val();
    var existe6 = $("#d6").val();
    var existe7 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#d8")[0].selectedIndex = 0;
    $("#d8").prop("disabled", true);
    if (existe7 > 0) {

    }
    else {
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
    $.ajax({
        type: "POST",
        url: "lib/comboDiagnosticos7.php",
        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6 + "&existe7=" + existe7,
        success: function (html) {
            $("#d8").html(html);
            $("#d8").prop("disabled", false);
        },
    });
});
// Cargar información de equipo en base a serie y tipo seleccionado
// Cargar combos de diagnosticos y acciones
// Cargar combos de diagnosticos y acciones
// Radio otros
$('input[type=radio][name=obsOtros]').change(function () {
    if (this.value == 'NO') {
        $("#detalleOtros").val("");
        $("#detalleOtros").attr("readonly", true);
    }
    else if (this.value == 'SI') {
        $("#detalleOtros").attr("readonly", false);
        $("#detalleOtros").focus();
    }
});
// Radio otros
$("#fEva").change(function () {
    var fechaEva = $(this).val();
    var newFechaEva = fechaEva.split("/").reverse().join("-");
    $("#fEvaC").val(newFechaEva);

});
// Filtro de fechas
$("#fInicio").change(function () {
    var fechaEva1 = $(this).val();
    var newFechaEva1 = fechaEva1.split("/").reverse().join("-");
    var fevOr = $("#fEvaC").val();
    $("#fIniEv").val(newFechaEva1);

    if (newFechaEva1 < fevOr) {
        Swal.fire({
            icon: "error",
            title: "La fecha de Inicio debe ser mayor o igual que la Fecha de Evaluación",
            showConfirmButton: false,
            timer: 1300
        });
        $("#fInicio").focus();
        $("#fInicio").val("");
        $("#fFin").val("");
    }
    else {
        $("#fFin").focus();
    }
    // $("#fInicio").val(newFechaEva);

});
$("#fFin").change(function () {
    var fechaEva2 = $(this).val();
    var newFechaEva2 = fechaEva2.split("/").reverse().join("-");
    var fevOr2 = $("#fIniEv").val();
    $("#fFinEv").val(newFechaEva2);

    if (newFechaEva2 < fevOr2) {
        Swal.fire({
            icon: "error",
            title: "La fecha de Fin debe ser mayor o igual que la Fecha de Inicio",
            showConfirmButton: false,
            timer: 1300
        });

        $("#fFin").focus();
        $("#fFin").val("");
    }
    else {
        $("#tipTrabEQ").focus();
    }
});
// Filtro de Fechas
// Validacion de campos
$.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
$("#btnRegMant").on("click", function () {
    $("#formRegMant").validate({
        rules: {
            tipEquipo: {
                valueNotEquals: "0",
                required: true,
            },
            serieEQ: {
                valueNotEquals: "0",
                required: true,
            },
            ofiEq: {
                valueNotEquals: "0",
                required: true,
            },
            servEq: {
                valueNotEquals: "0",
                required: true,
            },
            respEq: {
                valueNotEquals: "0",
                required: true,
            },
            detaEQ: {
                required: true,
            },
            fEva: {
                required: true,
            },
            condInEQ: {
                valueNotEquals: "0",
                required: true,
            },
            tecEvEQ: {
                valueNotEquals: "0",
                required: true,
            },
            tipTrabEQ: {
                valueNotEquals: "0",
                required: true,
            },
            estAtEQ: {
                valueNotEquals: "0",
                required: true,
            },
            condFEQ: {
                valueNotEquals: "0",
                required: true,
            },
            descIniEQ: {
                required: true,
            },
            priEvaEQ: {
                required: true,
            },
            recoFEQ: {
                required: true,
            },
            fInicio: {
                required: true,
            },
            fFin: {
                required: true,
            },
        },
        messages: {
            tipEquipo: {
                valueNotEquals: "Seleccione Tipo de Equipo",
                required: "Seleccione Tipo de Equipo",
            },
            serieEQ: {
                valueNotEquals: "Selecciona Serie de EQ",
                required: "Selecciona Serie de EQ",
            },
            ofiEq: {
                valueNotEquals: "Selecciona Oficina",
                required: "Selecciona Oficina",
            },
            servEq: {
                valueNotEquals: "Selecciona Servicio",
                required: "Selecciona Servicio",
            },
            respEq: {
                valueNotEquals: "Selecciona Responsable",
                required: "Selecciona Responsable",
            },
            detaEQ: {
                required: "Complete detalles de Equipo",
            },
            fEva: {
                required: "Ingrese Fecha de Evaluación",
            },
            condInEQ: {
                valueNotEquals: "Selecciona Condición Inicial",
                required: "Selecciona Responsable",
            },
            tecEvEQ: {
                valueNotEquals: "Selecciona Técnico Evaluador",
                required: "Selecciona Responsable",
            },
            tipTrabEQ: {
                valueNotEquals: "Selecciona trabajo realizado",
                required: "Selecciona Responsable",
            },
            estAtEQ: {
                valueNotEquals: "Selecciona estado de Atención",
                required: "Selecciona Responsable",
            },
            condFEQ: {
                valueNotEquals: "Selecciona Condición Final",
                required: "Selecciona Responsable",
            },
            descIniEQ: {
                required: "Ingresa descripción inicial de incidente",
            },
            priEvaEQ: {
                required: "Ingresa primera evaluación",
            },
            recoFEQ: {
                required: "Ingresa recomendaciones finales",
            },
            fInicio: {
                required: "Ingresa Fecha de Inicio de Trabajo",
            },
            fFin: {
                required: "Ingresa Fecha de Fin de Trabajo",
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
$("#btnRegMant").click(function (e) {
    var form1 = $("#formRegMant");
    validacion = form1.valid();
    if (validacion == true) {
        let timerInterval;
        Swal.fire({
            title: "Registro en proceso!",
            html:
                "Su registro culminará en unos segundos.Espere ...",
            timer: 10000,
            timerProgressBar: true,
            onBeforeOpen: () => {
                Swal.showLoading();
                timerInterval = setInterval(() => {
                    const content = Swal.getContent();
                    if (content) {
                        const b = content.querySelector("b");
                        if (b) {
                            b.textContent = Swal.getTimerLeft();
                        }
                    }
                }, 10000);
            },
            onClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                //   console.log("I was closed by the timer");
            }
        });
    }
});
$("#btnEdtMant").on("click", function () {
    $("#formRegMant").validate({
        rules: {
            tipEquipo: {
                valueNotEquals: "0",
                required: true,
            },
            serieEQ: {
                valueNotEquals: "0",
                required: true,
            },
            ofiEq: {
                valueNotEquals: "0",
                required: true,
            },
            servEq: {
                valueNotEquals: "0",
                required: true,
            },
            respEq: {
                valueNotEquals: "0",
                required: true,
            },
            detaEQ: {
                required: true,
            },
            fEva: {
                required: true,
            },
            condInEQ: {
                valueNotEquals: "0",
                required: true,
            },
            tecEvEQ: {
                valueNotEquals: "0",
                required: true,
            },
            tipTrabEQ: {
                valueNotEquals: "0",
                required: true,
            },
            estAtEQ: {
                valueNotEquals: "0",
                required: true,
            },
            condFEQ: {
                valueNotEquals: "0",
                required: true,
            },
            descIniEQ: {
                required: true,
            },
            priEvaEQ: {
                required: true,
            },
            recoFEQ: {
                required: true,
            },
            fInicio: {
                required: true,
            },
            fFin: {
                required: true,
            },
        },
        messages: {
            tipEquipo: {
                valueNotEquals: "Seleccione Tipo de Equipo",
                required: "Seleccione Tipo de Equipo",
            },
            serieEQ: {
                valueNotEquals: "Selecciona Serie de EQ",
                required: "Selecciona Serie de EQ",
            },
            ofiEq: {
                valueNotEquals: "Selecciona Oficina",
                required: "Selecciona Oficina",
            },
            servEq: {
                valueNotEquals: "Selecciona Servicio",
                required: "Selecciona Servicio",
            },
            respEq: {
                valueNotEquals: "Selecciona Responsable",
                required: "Selecciona Responsable",
            },
            detaEQ: {
                required: "Complete detalles de Equipo",
            },
            fEva: {
                required: "Ingrese Fecha de Evaluación",
            },
            condInEQ: {
                valueNotEquals: "Selecciona Condición Inicial",
                required: "Selecciona Responsable",
            },
            tecEvEQ: {
                valueNotEquals: "Selecciona Técnico Evaluador",
                required: "Selecciona Responsable",
            },
            tipTrabEQ: {
                valueNotEquals: "Selecciona trabajo realizado",
                required: "Selecciona Responsable",
            },
            estAtEQ: {
                valueNotEquals: "Selecciona estado de Atención",
                required: "Selecciona Responsable",
            },
            condFEQ: {
                valueNotEquals: "Selecciona Condición Final",
                required: "Selecciona Responsable",
            },
            descIniEQ: {
                required: "Ingresa descripción inicial de incidente",
            },
            priEvaEQ: {
                required: "Ingresa primera evaluación",
            },
            recoFEQ: {
                required: "Ingresa recomendaciones finales",
            },
            fInicio: {
                required: "Ingresa Fecha de Inicio de Trabajo",
            },
            fFin: {
                required: "Ingresa Fecha de Fin de Trabajo",
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
$("#btnEdtMant").click(function (e) {
    var form1 = $("#formRegMant");
    validacion = form1.valid();
    if (validacion == true) {
        let timerInterval;
        Swal.fire({
            title: "Registro en proceso!",
            html:
                "Su registro culminará en unos segundos.Espere ...",
            timer: 10000,
            timerProgressBar: true,
            onBeforeOpen: () => {
                Swal.showLoading();
                timerInterval = setInterval(() => {
                    const content = Swal.getContent();
                    if (content) {
                        const b = content.querySelector("b");
                        if (b) {
                            b.textContent = Swal.getTimerLeft();
                        }
                    }
                }, 10000);
            },
            onClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                //   console.log("I was closed by the timer");
            }
        });
    }
});
// Validacion de campos
// Editar Mantenimiento
$(".tablaMantenimientos").on("click", ".btnEditarMant", function () {
    var idMantenimiento = $(this).attr("idMantenimiento");
    window.location = "index.php?ruta=editar-mantenimiento&idMantenimiento=" + idMantenimiento;
})
// Editar Mantenimiento
$(".tablaMantenimientos").on("click", ".btnAnularMantenimiento", function () {
    var idMantenimiento = $(this).attr("idMantenimiento");
    var idUsuario = $("#idOculto").val();

    Swal.fire({
        title: '¿Está seguro de anular la ficha?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, anular ficha!'
    }).then(function (result) {
        if (result.value) {
            let timerInterval;
            Swal.fire({
                title: "Anulación en proceso!",
                html:
                    "Su solicitud culminará en unos segundos.Espere ...",
                timer: 10000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                        const content = Swal.getContent();
                        if (content) {
                            const b = content.querySelector("b");
                            if (b) {
                                b.textContent = Swal.getTimerLeft();
                            }
                        }
                    }, 10000);
                },
                onClose: () => {
                    clearInterval(timerInterval);
                },
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    //   console.log("I was closed by the timer");
                }
            });
            window.location = "index.php?ruta=mantenimientos&idMantenimiento=" + idMantenimiento + "&idUsuario=" + idUsuario;
        }
    });
});
$(".tablaMantenimientos").on("click", ".btnImprimirFichaMant", function () {
    var idMantenimiento = $(this).attr("idMantenimiento");
    var idTipo = $(this).attr("tipoEquipo");
    window.open("reports/ficha-mantenimiento.php?idMantenimiento=" + idMantenimiento + "&idTipo=" + idTipo, "_blank");
});