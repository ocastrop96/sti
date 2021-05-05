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


$("#edfEva").inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
$('#edfEva').datepicker({
    'format': 'dd/mm/yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
$("#edfInicio").inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
$('#edfInicio').datepicker({
    'format': 'dd/mm/yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
$("#edfFin").inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
$('#edfFin').datepicker({
    'format': 'dd/mm/yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});

$("#modal-registro-mantenimiento").on('hidden.bs.modal', function (e) {
    // alert('exito');
    $('#formRegMant')[0].reset();
    $("#segmentado").val("");
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
    $("#a1")[0].selectedIndex = 0;
    $("#a1").prop("disabled", true);
    $("#a2")[0].selectedIndex = 0;
    $("#a2").prop("disabled", true);
    $("#a3")[0].selectedIndex = 0;
    $("#a3").prop("disabled", true);
    $("#a4")[0].selectedIndex = 0;
    $("#a4").prop("disabled", true);
    $("#a5")[0].selectedIndex = 0;
    $("#a5").prop("disabled", true);
    $("#a6")[0].selectedIndex = 0;
    $("#a6").prop("disabled", true);
    $("#a7")[0].selectedIndex = 0;
    $("#a7").prop("disabled", true);
    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);

    $("#tsegmento").val("0");
    $("#tsegmento").html("Selecciona Segmento");
    $("#ofiEq").val("0");
    $("#ofiEq").html("Selecciona Oficina");
    $("#servEq").val("0");
    $("#servEq").html("Selecciona Área");
    $("#respEq").val("0");
    $("#respEq").html("Selecciona Responsable");
});

$("#modal-editar-mantenimiento").on('hidden.bs.modal', function (e) {

    window.location = "mantenimientos";
});

// Setting parameters
// $("#descIniEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, ",");
// });
// $("#edescIniEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });
// $("#priEvaEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });
// $("#recoFEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });
// $("#detalleOtros").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });

// $("#eddescIniEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });
// $("#eddescIniEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });
// $("#edpriEvaEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });
// $("#edrecoFEQ").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
// });
// $("#eddetalleOtros").keyup(function () {
//     this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
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

        $("#a1")[0].selectedIndex = 0;
        $("#a1").prop("disabled", true);
        $("#a2")[0].selectedIndex = 0;
        $("#a2").prop("disabled", true);
        $("#a3")[0].selectedIndex = 0;
        $("#a3").prop("disabled", true);
        $("#a4")[0].selectedIndex = 0;
        $("#a4").prop("disabled", true);
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
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

        $("#a1")[0].selectedIndex = 0;
        $("#a1").prop("disabled", true);
        $("#a2")[0].selectedIndex = 0;
        $("#a2").prop("disabled", true);
        $("#a3")[0].selectedIndex = 0;
        $("#a3").prop("disabled", true);
        $("#a4")[0].selectedIndex = 0;
        $("#a4").prop("disabled", true);
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
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

        $("#a1")[0].selectedIndex = 0;
        $("#a1").prop("disabled", true);
        $("#a2")[0].selectedIndex = 0;
        $("#a2").prop("disabled", true);
        $("#a3")[0].selectedIndex = 0;
        $("#a3").prop("disabled", true);
        $("#a4")[0].selectedIndex = 0;
        $("#a4").prop("disabled", true);
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
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

        $("#a1")[0].selectedIndex = 0;
        $("#a1").prop("disabled", true);
        $("#a2")[0].selectedIndex = 0;
        $("#a2").prop("disabled", true);
        $("#a3")[0].selectedIndex = 0;
        $("#a3").prop("disabled", true);
        $("#a4")[0].selectedIndex = 0;
        $("#a4").prop("disabled", true);
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }

});

// Bloque de selects diagnosticos
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
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos7.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6 + "&existe7=" + existe7,
            success: function (html) {
                $("#d8").html(html);
                $("#d8").prop("disabled", false);
            },
        });
    }
    else {
        $("#d8")[0].selectedIndex = 0;
        $("#d8").prop("disabled", true);
    }
});
// Bloque de selects diagnosticos

// Bloque de selects acciones
$("#a1").on("change", function () {
    var existe = $(this).val();
    var sgmt = $("#segmentado").val();
    $("#a2")[0].selectedIndex = 0;
    $("#a2").prop("disabled", true);
    $("#a3")[0].selectedIndex = 0;
    $("#a3").prop("disabled", true);
    $("#a4")[0].selectedIndex = 0;
    $("#a4").prop("disabled", true);
    $("#a5")[0].selectedIndex = 0;
    $("#a5").prop("disabled", true);
    $("#a6")[0].selectedIndex = 0;
    $("#a6").prop("disabled", true);
    $("#a7")[0].selectedIndex = 0;
    $("#a7").prop("disabled", true);
    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);
    if (existe > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones.php",
            data: "sgmt=" + sgmt + "&existe=" + existe,
            success: function (html) {
                $("#a2").html(html);
                $("#a2").prop("disabled", false);
            },
        });
    }
    else {
        $("#a2")[0].selectedIndex = 0;
        $("#a2").prop("disabled", true);
        $("#a3")[0].selectedIndex = 0;
        $("#a3").prop("disabled", true);
        $("#a4")[0].selectedIndex = 0;
        $("#a4").prop("disabled", true);
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }
});

$("#a2").on("change", function () {
    var existe = $("#a1").val();
    var existe2 = $(this).val();
    var sgmt = $("#segmentado").val();
    $("#a3")[0].selectedIndex = 0;
    $("#a3").prop("disabled", true);
    $("#a4")[0].selectedIndex = 0;
    $("#a4").prop("disabled", true);
    $("#a5")[0].selectedIndex = 0;
    $("#a5").prop("disabled", true);
    $("#a6")[0].selectedIndex = 0;
    $("#a6").prop("disabled", true);
    $("#a7")[0].selectedIndex = 0;
    $("#a7").prop("disabled", true);
    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);
    if (existe2 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones2.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2,
            success: function (html) {
                $("#a3").html(html);
                $("#a3").prop("disabled", false);
            },
        });
    }
    else {
        $("#a3")[0].selectedIndex = 0;
        $("#a3").prop("disabled", true);
        $("#a4")[0].selectedIndex = 0;
        $("#a4").prop("disabled", true);
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }
});
$("#a3").on("change", function () {
    var existe = $("#a1").val();
    var existe2 = $("#a2").val();
    var existe3 = $(this).val();
    var sgmt = $("#segmentado").val();
    $("#a4")[0].selectedIndex = 0;
    $("#a4").prop("disabled", true);
    $("#a5")[0].selectedIndex = 0;
    $("#a5").prop("disabled", true);
    $("#a6")[0].selectedIndex = 0;
    $("#a6").prop("disabled", true);
    $("#a7")[0].selectedIndex = 0;
    $("#a7").prop("disabled", true);
    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);
    if (existe3 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones3.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3,
            success: function (html) {
                $("#a4").html(html);
                $("#a4").prop("disabled", false);
            },
        });
    }
    else {
        $("#a4")[0].selectedIndex = 0;
        $("#a4").prop("disabled", true);
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }
});
$("#a4").on("change", function () {
    var existe = $("#a1").val();
    var existe2 = $("#a2").val();
    var existe3 = $("#a3").val();
    var existe4 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#a5")[0].selectedIndex = 0;
    $("#a5").prop("disabled", true);
    $("#a6")[0].selectedIndex = 0;
    $("#a6").prop("disabled", true);
    $("#a7")[0].selectedIndex = 0;
    $("#a7").prop("disabled", true);
    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);
    if (existe4 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones4.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4,
            success: function (html) {
                $("#a5").html(html);
                $("#a5").prop("disabled", false);
            },
        });
    }
    else {
        $("#a5")[0].selectedIndex = 0;
        $("#a5").prop("disabled", true);
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }
});
$("#a5").on("change", function () {
    var existe = $("#a1").val();
    var existe2 = $("#a2").val();
    var existe3 = $("#a3").val();
    var existe4 = $("#a4").val();
    var existe5 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#a6")[0].selectedIndex = 0;
    $("#a6").prop("disabled", true);
    $("#a7")[0].selectedIndex = 0;
    $("#a7").prop("disabled", true);
    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);
    if (existe5 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones5.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5,
            success: function (html) {
                $("#a6").html(html);
                $("#a6").prop("disabled", false);
            },
        });
    }
    else {
        $("#a6")[0].selectedIndex = 0;
        $("#a6").prop("disabled", true);
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }
});
$("#a6").on("change", function () {
    var existe = $("#a1").val();
    var existe2 = $("#a2").val();
    var existe3 = $("#a3").val();
    var existe4 = $("#a4").val();
    var existe5 = $("#a5").val();
    var existe6 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#a7")[0].selectedIndex = 0;
    $("#a7").prop("disabled", true);
    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);
    if (existe6 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones6.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6,
            success: function (html) {
                $("#a7").html(html);
                $("#a7").prop("disabled", false);
            },
        });
    }
    else {
        $("#a7")[0].selectedIndex = 0;
        $("#a7").prop("disabled", true);
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }
});
$("#a7").on("change", function () {
    var existe = $("#a1").val();
    var existe2 = $("#a2").val();
    var existe3 = $("#a3").val();
    var existe4 = $("#a4").val();
    var existe5 = $("#a5").val();
    var existe6 = $("#a6").val();
    var existe7 = $(this).val();
    var sgmt = $("#segmentado").val();

    $("#a8")[0].selectedIndex = 0;
    $("#a8").prop("disabled", true);
    if (existe7 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones7.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6 + "&existe7=" + existe7,
            success: function (html) {
                $("#a8").html(html);
                $("#a8").prop("disabled", false);
            },
        });
    }
    else {
        $("#a8")[0].selectedIndex = 0;
        $("#a8").prop("disabled", true);
    }
});

$("#condFEQ").on("change", function () {
    $("#d2").prop("disabled", false);
    $("#d3").prop("disabled", false);
    $("#d4").prop("disabled", false);
    $("#d5").prop("disabled", false);
    $("#d6").prop("disabled", false);
    $("#d7").prop("disabled", false);
    $("#d8").prop("disabled", false);
    $("#a2").prop("disabled", false);
    $("#a3").prop("disabled", false);
    $("#a4").prop("disabled", false);
    $("#a5").prop("disabled", false);
    $("#a6").prop("disabled", false);
    $("#a7").prop("disabled", false);
    $("#a8").prop("disabled", false);
});
// Bloque de selects acciones
// Cargar información de equipo en base a serie y tipo seleccionado
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
$('input[type=radio][name=edobsOtros]').change(function () {
    if (this.value == 'NO') {
        $("#eddetalleOtros").val("");
        $("#eddetalleOtros").attr("readonly", true);
    }
    else if (this.value == 'SI') {
        $("#eddetalleOtros").attr("readonly", false);
        $("#eddetalleOtros").focus();
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

$("#edfEva").change(function () {
    var fechaEva = $(this).val();
    var newFechaEva = fechaEva.split("/").reverse().join("-");
    $("#edfEvaC").val(newFechaEva);

});
// Filtro de fechas
$("#edfInicio").change(function () {
    var fechaEva1 = $(this).val();
    var newFechaEva1 = fechaEva1.split("/").reverse().join("-");
    var fevOr = $("#edfEvaC").val();
    $("#edfIniEv").val(newFechaEva1);

    if (newFechaEva1 < fevOr) {
        Swal.fire({
            icon: "error",
            title: "La fecha de Inicio debe ser mayor o igual que la Fecha de Evaluación",
            showConfirmButton: false,
            timer: 1300
        });
        $("#edfInicio").focus();
        $("#edfInicio").val("");
        $("#edfFin").val("");
    }
    else {
        $("#edfFin").focus();
    }
    // $("#fInicio").val(newFechaEva);

});
$("#edfFin").change(function () {
    var fechaEva2 = $(this).val();
    var newFechaEva2 = fechaEva2.split("/").reverse().join("-");
    var fevOr2 = $("#edfIniEv").val();
    $("#edfFinEv").val(newFechaEva2);

    if (newFechaEva2 < fevOr2) {
        Swal.fire({
            icon: "error",
            title: "La fecha de Fin debe ser mayor o igual que la Fecha de Inicio",
            showConfirmButton: false,
            timer: 1300
        });

        $("#edfFin").focus();
        $("#edfFin").val("");
    }
    else {
        $("#edtipTrabEQ").focus();
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
            d1: {
                valueNotEquals: "0",
                required: true,
            },
            a1: {
                valueNotEquals: "0",
                required: true,
            },
            descIniEQ: {
                required: true,
            },
            priEvaEQ: {
                required: true,
            },
            tecResEQ: {
                valueNotEquals: "0",
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
            d1: {
                valueNotEquals: "Seleccione al menos un diagnóstico",
                required: true,
            },
            a1: {
                valueNotEquals: "Seleccione al menos una acción realizada",
                required: true,
            },
            descIniEQ: {
                required: "Ingresa descripción inicial de incidente",
            },
            priEvaEQ: {
                required: "Ingresa primera evaluación",
            },
            tecResEQ: {
                valueNotEquals: "Selecciona Técnico Responsable",
                required: "Selecciona Técnico Responsable",
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
    $("#formEdtMant").validate({
        rules: {
            edtipEquipo: {
                valueNotEquals: "0",
                required: true,
            },
            edserieEQ: {
                valueNotEquals: "0",
                required: true,
            },
            edofiEq: {
                valueNotEquals: "0",
                required: true,
            },
            edservEq: {
                valueNotEquals: "0",
                required: true,
            },
            edrespEq: {
                valueNotEquals: "0",
                required: true,
            },
            eddetaEQ: {
                required: true,
            },
            edfEva: {
                required: true,
            },
            edcondInEQ: {
                valueNotEquals: "0",
                required: true,
            },
            edtecEvEQ: {
                valueNotEquals: "0",
                required: true,
            },
            edtipTrabEQ: {
                valueNotEquals: "0",
                required: true,
            },
            edestAtEQ: {
                valueNotEquals: "0",
                required: true,
            },
            edcondFEQ: {
                valueNotEquals: "0",
                required: true,
            },
            edd1: {
                valueNotEquals: "0",
                required: true,
            },
            eda1: {
                valueNotEquals: "0",
                required: true,
            },
            eddescIniEQ: {
                required: true,
            },
            edpriEvaEQ: {
                required: true,
            },
            edtecResEQ: {
                valueNotEquals: "Selecciona Técnico Responsable",
                required: "Selecciona Técnico Responsable",
            },
            edrecoFEQ: {
                required: true,
            },
            edfInicio: {
                required: true,
            },
            edfFin: {
                required: true,
            },
        },
        messages: {
            edtipEquipo: {
                valueNotEquals: "Seleccione Tipo de Equipo",
                required: "Seleccione Tipo de Equipo",
            },
            edserieEQ: {
                valueNotEquals: "Selecciona Serie de EQ",
                required: "Selecciona Serie de EQ",
            },
            edofiEq: {
                valueNotEquals: "Selecciona Oficina",
                required: "Selecciona Oficina",
            },
            edservEq: {
                valueNotEquals: "Selecciona Servicio",
                required: "Selecciona Servicio",
            },
            edrespEq: {
                valueNotEquals: "Selecciona Responsable",
                required: "Selecciona Responsable",
            },
            eddetaEQ: {
                required: "Complete detalles de Equipo",
            },
            edfEva: {
                required: "Ingrese Fecha de Evaluación",
            },
            edcondInEQ: {
                valueNotEquals: "Selecciona Condición Inicial",
                required: "Selecciona Responsable",
            },
            edtecEvEQ: {
                valueNotEquals: "Selecciona Técnico Evaluador",
                required: "Selecciona Responsable",
            },
            edtipTrabEQ: {
                valueNotEquals: "Selecciona trabajo realizado",
                required: "Selecciona Responsable",
            },
            edestAtEQ: {
                valueNotEquals: "Selecciona estado de Atención",
                required: "Selecciona Responsable",
            },
            edcondFEQ: {
                valueNotEquals: "Selecciona Condición Final",
                required: "Selecciona Responsable",
            },
            edd1: {
                valueNotEquals: "Seleccione al menos un diagnóstico",
                required: true,
            },
            eda1: {
                valueNotEquals: "Seleccione al menos una acción realizada",
                required: true,
            },
            eddescIniEQ: {
                required: "Ingresa descripción inicial de incidente",
            },
            edpriEvaEQ: {
                required: "Ingresa primera evaluación",
            },
            edtecResEQ: {
                valueNotEquals: "Selecciona Técnico Responsable",
                required: "Selecciona Técnico Responsable",
            },
            edrecoFEQ: {
                required: "Ingresa recomendaciones finales",
            },
            edfInicio: {
                required: "Ingresa Fecha de Inicio de Trabajo",
            },
            edfFin: {
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
    var form1 = $("#formEdtMant");
    validacion = form1.valid();
    if (validacion == true) {
        let timerInterval;
        Swal.fire({
            title: "Actualización en proceso!",
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
    var datos = new FormData();
    datos.append("idMantenimiento", idMantenimiento);
    $.ajax({
        url: "lib/ajaxMantenimientos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log(respuesta)
            $("#idMantenimiento").val(respuesta["idMantenimiento"]);
            $("#ncorrelativo").val(respuesta["correlativo_Mant"]);
            $("#edsegmentado").val(respuesta["sgmtoManto"]);

            $("#edtipEquip1").val(respuesta["tipEquipo"]);
            $("#edtipEquip1").html(respuesta["categoria"]);

            $("#edserieEQ1").val(respuesta["idEquip"]);
            $("#edserieEQ1").html(respuesta["serie"]);

            $("#edtsegmento").val(respuesta["sgmtoManto"]);
            $("#edtsegmento").html(respuesta["descSegmento"]);

            $("#edofiEq").val(respuesta["oficEquip"]);
            $("#edofiEq").html(respuesta["area"]);

            $("#edservEq").val(respuesta["areaEquip"]);
            $("#edservEq").html(respuesta["subarea"]);

            $("#edrespEq").val(respuesta["uResponsable"]);
            $("#edrespEq").html(respuesta["responsable"]);

            $("#eddetaEQ").val(respuesta["logdeta"]);

            $("#edfEva").val(respuesta["fEval"]);

            $("#edfEvaC").val(respuesta["fEvalua"]);

            $("#edcondInEQ1").val(respuesta["condInicial"]);
            $("#edcondInEQ1").html(respuesta["cinicial"]);

            $("#edtecEvEQ1").val(respuesta["tecEvalua"]);
            $("#edtecEvEQ1").html(respuesta["tecnico"]);

            $("#eddescIniEQ").val(respuesta["descInc"]);

            // Bloque de diagnosticos


            if (respuesta["diagnostico1"] != 0) {
                $("#edd1_").val(respuesta["diagnostico1"]);
                $("#edd1_").html(respuesta["d1"]);
            }

            // Crearé una función recursiva
            if (respuesta["diagnostico2"] != 0) {
                $("#edd2_").val(respuesta["diagnostico2"]);
                $("#edd2_").html(respuesta["d2"]);
                $("#edd2").prop("disabled", false);

            }
            else {
                if (respuesta["diagnostico1"] != 0) {
                    var existe = respuesta["diagnostico1"];
                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboDiagnosticos.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe,
                        success: function (html) {
                            $("#edd2").html(html);
                            $("#edd2").prop("disabled", false);

                            $("#edd3").prop("disabled", false);
                            $("#edd3")[0].selectedIndex = 0;
                            $("#edd3_").val(0);
                            $("#edd3_").html("Selecciona Diagnostico");

                            $("#edd4").prop("disabled", false);
                            $("#edd4")[0].selectedIndex = 0;
                            $("#edd4_").val(0);
                            $("#edd4_").html("Selecciona Diagnostico");

                            $("#edd5").prop("disabled", false);
                            $("#edd5")[0].selectedIndex = 0;
                            $("#edd5_").val(0);
                            $("#edd5_").html("Selecciona Diagnostico");

                            $("#edd6").prop("disabled", false);
                            $("#edd6")[0].selectedIndex = 0;
                            $("#edd6_").val(0);
                            $("#edd6_").html("Selecciona Diagnostico");

                            $("#edd7").prop("disabled", false);
                            $("#edd7")[0].selectedIndex = 0;
                            $("#edd7_").val(0);
                            $("#edd7_").html("Selecciona Diagnostico");

                            $("#edd8").prop("disabled", false);
                            $("#edd8")[0].selectedIndex = 0;
                            $("#edd8_").val(0);
                            $("#edd8_").html("Selecciona Diagnostico");
                        },
                    });
                }
                else {
                    $("#edd2_").val("0");
                    $("#edd2_").html("Selecciona Diagnostico");
                }
            }

            if (respuesta["diagnostico3"] != 0) {
                $("#edd3_").val(respuesta["diagnostico3"]);
                $("#edd3_").html(respuesta["d3"]);
                $("#edd3").prop("disabled", false);
            }
            else {
                if (respuesta["diagnostico1"] != 0 && respuesta["diagnostico2"] != 0) {
                    var existe = respuesta["diagnostico1"];
                    var existe2 = respuesta["diagnostico2"];
                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboDiagnosticos2.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2,
                        success: function (html) {
                            $("#edd3").html(html);
                            $("#edd3").prop("disabled", false);

                            $("#edd4").prop("disabled", false);
                            $("#edd4")[0].selectedIndex = 0;
                            $("#edd4_").val(0);
                            $("#edd4_").html("Selecciona Diagnostico");

                            $("#edd5").prop("disabled", false);
                            $("#edd5")[0].selectedIndex = 0;
                            $("#edd5_").val(0);
                            $("#edd5_").html("Selecciona Diagnostico");

                            $("#edd6").prop("disabled", false);
                            $("#edd6")[0].selectedIndex = 0;
                            $("#edd6_").val(0);
                            $("#edd6_").html("Selecciona Diagnostico");

                            $("#edd7").prop("disabled", false);
                            $("#edd7")[0].selectedIndex = 0;
                            $("#edd7_").val(0);
                            $("#edd7_").html("Selecciona Diagnostico");

                            $("#edd8").prop("disabled", false);
                            $("#edd8")[0].selectedIndex = 0;
                            $("#edd8_").val(0);
                            $("#edd8_").html("Selecciona Diagnostico");
                        },
                    });
                }
                else {
                    $("#edd3_").val("0");
                    $("#edd3_").html("Selecciona Diagnostico");
                }
            }
            if (respuesta["diagnostico4"] != 0) {
                $("#edd4_").val(respuesta["diagnostico4"]);
                $("#edd4_").html(respuesta["d4"]);
                $("#edd4").prop("disabled", false);
            }
            else {

                if (respuesta["diagnostico1"] != 0 && respuesta["diagnostico2"] != 0 && respuesta["diagnostico3"] != 0) {
                    var existe = respuesta["diagnostico1"];
                    var existe2 = respuesta["diagnostico2"];
                    var existe3 = respuesta["diagnostico3"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboDiagnosticos3.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3,
                        success: function (html) {
                            $("#edd4").html(html);
                            $("#edd4").prop("disabled", false);

                            $("#edd5").prop("disabled", false);
                            $("#edd5")[0].selectedIndex = 0;
                            $("#edd5_").val(0);
                            $("#edd5_").html("Selecciona Diagnostico");

                            $("#edd6").prop("disabled", false);
                            $("#edd6")[0].selectedIndex = 0;
                            $("#edd6_").val(0);
                            $("#edd6_").html("Selecciona Diagnostico");

                            $("#edd7").prop("disabled", false);
                            $("#edd7")[0].selectedIndex = 0;
                            $("#edd7_").val(0);
                            $("#edd7_").html("Selecciona Diagnostico");

                            $("#edd8").prop("disabled", false);
                            $("#edd8")[0].selectedIndex = 0;
                            $("#edd8_").val(0);
                            $("#edd8_").html("Selecciona Diagnostico");
                        },
                    });
                }
                else {
                    $("#edd4_").val("0");
                    $("#edd4_").html("Selecciona Diagnostico");

                }
            }
            if (respuesta["diagnostico5"] != 0) {
                $("#edd5_").val(respuesta["diagnostico5"]);
                $("#edd5_").html(respuesta["d5"]);
                $("#edd5").prop("disabled", false);
            }
            else {
                if (respuesta["diagnostico1"] != 0 && respuesta["diagnostico2"] != 0 && respuesta["diagnostico3"] != 0 && respuesta["diagnostico4"] != 0) {
                    var existe = respuesta["diagnostico1"];
                    var existe2 = respuesta["diagnostico2"];
                    var existe3 = respuesta["diagnostico3"];
                    var existe4 = respuesta["diagnostico4"];

                    var sgmt = $("#edsegmentado").val();

                    $.ajax({
                        type: "POST",
                        url: "lib/comboDiagnosticos4.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4,
                        success: function (html) {
                            console.log(html);
                            $("#edd5").html(html);
                            $("#edd5").prop("disabled", false);

                            $("#edd6").prop("disabled", false);
                            $("#edd6")[0].selectedIndex = 0;
                            $("#edd6_").val(0);
                            $("#edd6_").html("Selecciona Diagnostico");

                            $("#edd7").prop("disabled", false);
                            $("#edd7")[0].selectedIndex = 0;
                            $("#edd7_").val(0);
                            $("#edd7_").html("Selecciona Diagnostico");

                            $("#edd8").prop("disabled", false);
                            $("#edd8")[0].selectedIndex = 0;
                            $("#edd8_").val(0);
                            $("#edd8_").html("Selecciona Diagnostico");
                        },
                    });
                }
                else {
                    $("#edd5_").val("0");
                    $("#edd5_").html("Selecciona Diagnostico");
                }
            }
            if (respuesta["diagnostico6"] != 0) {
                $("#edd6_").val(respuesta["diagnostico6"]);
                $("#edd6_").html(respuesta["d6"]);
                $("#edd6").prop("disabled", false);
            }
            else {

                if (respuesta["diagnostico1"] != 0 && respuesta["diagnostico2"] != 0 && respuesta["diagnostico3"] != 0 && respuesta["diagnostico4"] != 0 && respuesta["diagnostico5"] != 0) {

                    var existe = respuesta["diagnostico1"];
                    var existe2 = respuesta["diagnostico2"];
                    var existe3 = respuesta["diagnostico3"];
                    var existe4 = respuesta["diagnostico4"];
                    var existe5 = respuesta["diagnostico5"];

                    var sgmt = $("#edsegmentado").val();

                    $.ajax({
                        type: "POST",
                        url: "lib/comboDiagnosticos5.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5,
                        success: function (html) {
                            $("#edd6").html(html);
                            $("#edd6").prop("disabled", false);

                            $("#edd7").prop("disabled", false);
                            $("#edd7")[0].selectedIndex = 0;
                            $("#edd7_").val(0);
                            $("#edd7_").html("Selecciona Diagnostico");

                            $("#edd8").prop("disabled", false);
                            $("#edd8")[0].selectedIndex = 0;
                            $("#edd8_").val(0);
                            $("#edd8_").html("Selecciona Diagnostico");
                        },
                    });

                } else {
                    $("#edd6_").val("0");
                    $("#edd6_").html("Selecciona Diagnostico");
                }
            }
            if (respuesta["diagnostico7"] != 0) {
                $("#edd7_").val(respuesta["diagnostico7"]);
                $("#edd7_").html(respuesta["d7"]);
                $("#edd7").prop("disabled", false);
            }
            else {

                if (respuesta["diagnostico1"] != 0 && respuesta["diagnostico2"] != 0 && respuesta["diagnostico3"] != 0 && respuesta["diagnostico4"] != 0 && respuesta["diagnostico5"] != 0 && respuesta["diagnostico6"] != 0) {
                    var existe = respuesta["diagnostico1"];
                    var existe2 = respuesta["diagnostico2"];
                    var existe3 = respuesta["diagnostico3"];
                    var existe4 = respuesta["diagnostico4"];
                    var existe5 = respuesta["diagnostico5"];
                    var existe6 = respuesta["diagnostico6"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboDiagnosticos6.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6,
                        success: function (html) {
                            $("#edd7").html(html);
                            $("#edd7").prop("disabled", false);

                            $("#edd8").prop("disabled", false);
                            $("#edd8")[0].selectedIndex = 0;
                            $("#edd8_").val(0);
                            $("#edd8_").html("Selecciona Diagnostico");
                        },
                    });

                } else {
                    $("#edd7_").val("0");
                    $("#edd7_").html("Selecciona Diagnostico");
                }
            }
            if (respuesta["diagnostico8"] != 0) {
                $("#edd8_").val(respuesta["diagnostico8"]);
                $("#edd8_").html(respuesta["d8"]);
                $("#edd8").prop("disabled", false);
            }
            else {

                if (respuesta["diagnostico1"] != 0 && respuesta["diagnostico2"] != 0 && respuesta["diagnostico3"] != 0 && respuesta["diagnostico4"] != 0 && respuesta["diagnostico5"] != 0 && respuesta["diagnostico6"] != 0 && respuesta["diagnostico7"] != 0) {
                    var existe = respuesta["diagnostico1"];
                    var existe2 = respuesta["diagnostico2"];
                    var existe3 = respuesta["diagnostico3"];
                    var existe4 = respuesta["diagnostico4"];
                    var existe5 = respuesta["diagnostico5"];
                    var existe6 = respuesta["diagnostico6"];
                    var existe7 = respuesta["diagnostico7"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboDiagnosticos7.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6 + "&existe7=" + existe7,
                        success: function (html) {
                            $("#edd8").html(html);
                            $("#edd8").prop("disabled", false);
                        },
                    });

                } else {
                    $("#edd8_").val("0");
                    $("#edd8_").html("Selecciona Diagnostico");
                }
            }
            // Crearé una función recursiva

            // Bloque de diagnosticos
            $("#edfInicio").val(respuesta["fInic"]);
            $("#edfIniEv").val(respuesta["fInicio"]);


            $("#edfFin").val(respuesta["fFinE"]);
            $("#edfFinEv").val(respuesta["fFin"]);

            $("#edtipTrabEQ1").val(respuesta["tipTrabajo"]);
            $("#edtipTrabEQ1").html(respuesta["tipoTrabajo"]);

            $("#edtecResEQ1").val(respuesta["tecResp"]);
            $("#edtecResEQ1").html(respuesta["tecresponsable"]);

            // Bloque de acciones realizadas
            $("#eda1_").val(respuesta["accion1"]);
            $("#eda1_").html(respuesta["a1"]);

            if (respuesta["accion2"] != 0) {
                $("#eda2_").val(respuesta["accion2"]);
                $("#eda2_").html(respuesta["a2"]);
                $("#eda2").prop("disabled", false);
            }
            else {
                if (respuesta["accion1"] != 0) {
                    var existe = respuesta["accion1"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboAcciones.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe,
                        success: function (html) {
                            $("#eda2").html(html);
                            $("#eda2").prop("disabled", false);

                            $("#eda3").prop("disabled", false);
                            $("#eda3")[0].selectedIndex = 0;
                            $("#eda3_").val(0);
                            $("#eda3_").html("Selecciona Accion realizada");

                            $("#eda4").prop("disabled", false);
                            $("#eda4")[0].selectedIndex = 0;
                            $("#eda4_").val(0);
                            $("#eda4_").html("Selecciona Accion realizada");

                            $("#eda5").prop("disabled", false);
                            $("#eda5")[0].selectedIndex = 0;
                            $("#eda5_").val(0);
                            $("#eda5_").html("Selecciona Accion realizada");

                            $("#eda6").prop("disabled", false);
                            $("#eda6")[0].selectedIndex = 0;
                            $("#eda6_").val(0);
                            $("#eda6_").html("Selecciona Accion realizada");

                            $("#eda7").prop("disabled", false);
                            $("#eda7")[0].selectedIndex = 0;
                            $("#eda7_").val(0);
                            $("#eda7_").html("Selecciona Accion realizada");

                            $("#eda8").prop("disabled", false);
                            $("#eda8")[0].selectedIndex = 0;
                            $("#eda8_").val(0);
                            $("#eda8_").html("Selecciona Accion realizada");
                        },
                    });
                } else {
                    $("#eda2_").val("0");
                    $("#eda2_").html("Seleccione Accion realizada");
                }
            }

            if (respuesta["accion3"] != 0) {
                $("#eda3_").val(respuesta["accion3"]);
                $("#eda3_").html(respuesta["a3"]);
                $("#eda3").prop("disabled", false);
            }
            else {

                if (respuesta["accion1"] != 0 && respuesta["accion2"] != 0) {
                    var existe = respuesta["accion1"];
                    var existe2 = respuesta["accion2"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboAcciones2.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2,
                        success: function (html) {
                            $("#eda3").html(html);
                            $("#eda3").prop("disabled", false);

                            $("#eda4").prop("disabled", false);
                            $("#eda4")[0].selectedIndex = 0;
                            $("#eda4_").val(0);
                            $("#eda4_").html("Selecciona Accion realizada");

                            $("#eda5").prop("disabled", false);
                            $("#eda5")[0].selectedIndex = 0;
                            $("#eda5_").val(0);
                            $("#eda5_").html("Selecciona Accion realizada");

                            $("#eda6").prop("disabled", false);
                            $("#eda6")[0].selectedIndex = 0;
                            $("#eda6_").val(0);
                            $("#eda6_").html("Selecciona Accion realizada");

                            $("#eda7").prop("disabled", false);
                            $("#eda7")[0].selectedIndex = 0;
                            $("#eda7_").val(0);
                            $("#eda7_").html("Selecciona Accion realizada");

                            $("#eda8").prop("disabled", false);
                            $("#eda8")[0].selectedIndex = 0;
                            $("#eda8_").val(0);
                            $("#eda8_").html("Selecciona Accion realizada");
                        },
                    });
                } else {
                    $("#eda3_").val("0");
                    $("#eda3_").html("Selecciona Accion realizada");
                }
            }
            if (respuesta["accion4"] != 0) {
                $("#eda4_").val(respuesta["accion4"]);
                $("#eda4_").html(respuesta["a4"]);
                $("#eda4").prop("disabled", false);
            }
            else {
                if (respuesta["accion1"] != 0 && respuesta["accion2"] != 0 && respuesta["accion3"] != 0) {
                    var existe = respuesta["accion1"];
                    var existe2 = respuesta["accion2"];
                    var existe3 = respuesta["accion3"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboAcciones3.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3,
                        success: function (html) {
                            $("#eda4").html(html);
                            $("#eda4").prop("disabled", false);

                            $("#eda5").prop("disabled", false);
                            $("#eda5")[0].selectedIndex = 0;
                            $("#eda5_").val(0);
                            $("#eda5_").html("Selecciona Accion realizada");

                            $("#eda6").prop("disabled", false);
                            $("#eda6")[0].selectedIndex = 0;
                            $("#eda6_").val(0);
                            $("#eda6_").html("Selecciona Accion realizada");

                            $("#eda7").prop("disabled", false);
                            $("#eda7")[0].selectedIndex = 0;
                            $("#eda7_").val(0);
                            $("#eda7_").html("Selecciona Accion realizada");

                            $("#eda8").prop("disabled", false);
                            $("#eda8")[0].selectedIndex = 0;
                            $("#eda8_").val(0);
                            $("#eda8_").html("Selecciona Accion realizada");
                        },
                    });
                } else {
                    $("#eda4_").val("0");
                    $("#eda4_").html("Selecciona Accion realizada");
                }
            }
            if (respuesta["accion5"] != 0) {
                $("#eda5_").val(respuesta["accion5"]);
                $("#eda5_").html(respuesta["a5"]);
                $("#eda5").prop("disabled", false);
            }
            else {
                if (respuesta["accion1"] != 0 && respuesta["accion2"] != 0 && respuesta["accion3"] != 0 && respuesta["accion4"] != 0) {
                    var existe = respuesta["accion1"];
                    var existe2 = respuesta["accion2"];
                    var existe3 = respuesta["accion3"];
                    var existe4 = respuesta["accion4"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboAcciones4.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4,
                        success: function (html) {
                            $("#eda5").html(html);
                            $("#eda5").prop("disabled", false);

                            $("#eda6").prop("disabled", false);
                            $("#eda6")[0].selectedIndex = 0;
                            $("#eda6_").val(0);
                            $("#eda6_").html("Selecciona Accion realizada");

                            $("#eda7").prop("disabled", false);
                            $("#eda7")[0].selectedIndex = 0;
                            $("#eda7_").val(0);
                            $("#eda7_").html("Selecciona Accion realizada");

                            $("#eda8").prop("disabled", false);
                            $("#eda8")[0].selectedIndex = 0;
                            $("#eda8_").val(0);
                            $("#eda8_").html("Selecciona Accion realizada");
                        },
                    });
                } else {
                    $("#eda5_").val("0");
                    $("#eda5_").html("Selecciona Accion realizada");
                }
            }
            if (respuesta["accion6"] != 0) {
                $("#eda6_").val(respuesta["accion6"]);
                $("#eda6_").html(respuesta["a6"]);
                $("#eda6").prop("disabled", false);
            }
            else {

                if (respuesta["accion1"] != 0 && respuesta["accion2"] != 0 && respuesta["accion3"] != 0 && respuesta["accion4"] != 0 && respuesta["accion5"] != 0) {
                    var existe = respuesta["accion1"];
                    var existe2 = respuesta["accion2"];
                    var existe3 = respuesta["accion3"];
                    var existe4 = respuesta["accion4"];
                    var existe5 = respuesta["accion5"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboAcciones5.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5,
                        success: function (html) {
                            $("#eda6").html(html);
                            $("#eda6").prop("disabled", false);

                            $("#eda7").prop("disabled", false);
                            $("#eda7")[0].selectedIndex = 0;
                            $("#eda7_").val(0);
                            $("#eda7_").html("Selecciona Accion realizada");

                            $("#eda8").prop("disabled", false);
                            $("#eda8")[0].selectedIndex = 0;
                            $("#eda8_").val(0);
                            $("#eda8_").html("Selecciona Accion realizada");
                        },
                    });
                } else {
                    $("#eda6_").val("0");
                    $("#eda6_").html("Selecciona Accion realizada");
                }
            }
            if (respuesta["accion7"] != 0) {
                $("#eda7_").val(respuesta["accion7"]);
                $("#eda7_").html(respuesta["a7"]);
                $("#eda7").prop("disabled", false);
            }
            else {
                if (respuesta["accion1"] != 0 && respuesta["accion2"] != 0 && respuesta["accion3"] != 0 && respuesta["accion4"] != 0 && respuesta["accion5"] != 0 && respuesta["accion6"] != 0) {
                    var existe = respuesta["accion1"];
                    var existe2 = respuesta["accion2"];
                    var existe3 = respuesta["accion3"];
                    var existe4 = respuesta["accion4"];
                    var existe5 = respuesta["accion5"];
                    var existe6 = respuesta["accion6"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboAcciones6.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6,
                        success: function (html) {
                            $("#eda7").html(html);
                            $("#eda7").prop("disabled", false);

                            $("#eda8").prop("disabled", false);
                            $("#eda8")[0].selectedIndex = 0;
                            $("#eda8_").val(0);
                            $("#eda8_").html("Selecciona Accion realizada");
                        },
                    });
                } else {
                    $("#eda7_").val("0");
                    $("#eda7_").html("Selecciona Accion realizada");
                }
            }
            if (respuesta["accion8"] != 0) {
                $("#eda8_").val(respuesta["accion8"]);
                $("#eda8_").html(respuesta["a8"]);
                $("#eda8").prop("disabled", false);
            }
            else {

                if (respuesta["accion1"] != 0 && respuesta["accion2"] != 0 && respuesta["accion3"] != 0 && respuesta["accion4"] != 0 && respuesta["accion5"] != 0 && respuesta["accion6"] != 0 && respuesta["accion7"] != 0) {
                    var existe = respuesta["accion1"];
                    var existe2 = respuesta["accion2"];
                    var existe3 = respuesta["accion3"];
                    var existe4 = respuesta["accion4"];
                    var existe5 = respuesta["accion5"];
                    var existe6 = respuesta["accion6"];
                    var existe7 = respuesta["accion7"];

                    var sgmt = $("#edsegmentado").val();
                    $.ajax({
                        type: "POST",
                        url: "lib/comboAcciones7.php",
                        data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6 + "&existe7=" + existe7,
                        success: function (html) {
                            $("#eda8").html(html);
                            $("#eda8").prop("disabled", false);
                        },
                    });
                } else {
                    $("#eda8_").val("0");
                    $("#eda8_").html("Selecciona Accion realizada");
                }
            }
            // Bloque de acciones realizadas

            $("#edpriEvaEQ").val(respuesta["primera_eval"]);

            $("#edrecoFEQ").val(respuesta["recomendaciones"]);

            $("#edestAtEQ1").val(respuesta["estAtencion"]);
            $("#edestAtEQ1").html(respuesta["estAte"]);

            $("#edcondFEQ1").val(respuesta["condFinal"]);
            $("#edcondFEQ1").html(respuesta["cfinal"]);

            $("#edtercEq1").val(respuesta["servTerce"]);
            $("#edtercEq1").html(respuesta["servTerce"]);

            if (respuesta["otros"] == 'SI') {
                $("#edradiorep1").prop("checked", true);
                $("#eddetalleOtros").prop("readonly", false);
                $("#eddetalleOtros").val(respuesta["obsOtros"]);
            }
            else {
                $("#edradiorep2").prop("checked", true);
                $("#eddetalleOtros").prop("readonly", true);
                $("#eddetalleOtros").val(respuesta["obsOtros"]);
            }

        }
    });
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

$("#edtipEquipo").on("change", function () {
    $("#edofiEq1").prop("disabled", false);
    $("#edofiEq").val("0");
    $("#edofiEq").html('Seleccione Serie EQ primero');
    $("#edservEq1").prop("disabled", false);
    $("#edservEq").val("0");
    $("#edservEq").html('Seleccione Serie EQ primero');
    $("#edrespEq1").prop("disabled", false);
    $("#edrespEq").val("0");
    $("#edrespEq").html('Seleccione Serie EQ primero');
    $("#eddetaEQ").val("");
    $("#edtsegmento").val("0");
    $("#edtsegmento").html('Seleccione Serie EQ primero');
    var idCatego = $(this).val();
    if (idCatego > 0) {
        $("#edd1")[0].selectedIndex = 0;
        $("#edd1_").val(0);
        $("#edd1_").html("Selecciona Diagnostico");

        $("#edd2")[0].selectedIndex = 0;
        $("#edd2_").val(0);
        $("#edd2_").html("Selecciona Diagnostico");

        $("#edd3")[0].selectedIndex = 0;
        $("#edd3_").val(0);
        $("#edd3_").html("Selecciona Diagnostico");

        $("#edd4")[0].selectedIndex = 0;
        $("#edd4_").val(0);
        $("#edd4_").html("Selecciona Diagnostico");

        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");


        $("#eda1")[0].selectedIndex = 0;
        $("#eda1_").val(0);
        $("#eda1_").html("Selecciona Accion Realizada");

        $("#eda2")[0].selectedIndex = 0;
        $("#eda2_").val(0);
        $("#eda2_").html("Selecciona Accion Realizada");

        $("#eda3")[0].selectedIndex = 0;
        $("#eda3_").val(0);
        $("#eda3_").html("Selecciona Accion Realizada");

        $("#eda4")[0].selectedIndex = 0;
        $("#eda4_").val(0);
        $("#eda4_").html("Selecciona Accion Realizada");

        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");

        $.ajax({
            type: "POST",
            url: "lib/comboSeriesManto.php",
            data: "idCatego=" + idCatego,
            success: function (html) {
                $("#edserieEQ").prop("disabled", false);
                $("#edserieEQ").html(html);
            },
        });
    }
    else {
        $("#edserieEQ").html('<option value="">Seleccione tipo Equipo primero</option>');
        $("#edserieEQ").prop("disabled", false);
        $("#edofiEq1").prop("disabled", false);
        $("#edofiEq").val("0");
        $("#edofiEq").html('Seleccione Serie EQ primero');
        $("#edservEq1").prop("disabled", false);
        $("#edservEq").val("0");
        $("#edservEq").html('Seleccione Serie EQ primero');
        $("#edrespEq1").prop("disabled", false);
        $("#edrespEq").val("0");
        $("#edrespEq").html('Seleccione Serie EQ primero');
        $("#eddetaEQ").val("");
        $("#edsegmentado").val("0");
        $("#edtsegmento").val("0");
        $("#edtsegmento").html('Seleccione Serie EQ primero');

        $("#edd1")[0].selectedIndex = 0;
        $("#edd1_").val(0);
        $("#edd1_").html("Selecciona Diagnostico");

        $("#edd2")[0].selectedIndex = 0;
        $("#edd2_").val(0);
        $("#edd2_").html("Selecciona Diagnostico");

        $("#edd3")[0].selectedIndex = 0;
        $("#edd3_").val(0);
        $("#edd3_").html("Selecciona Diagnostico");

        $("#edd4")[0].selectedIndex = 0;
        $("#edd4_").val(0);
        $("#edd4_").html("Selecciona Diagnostico");

        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");


        $("#eda1")[0].selectedIndex = 0;
        $("#eda1_").val(0);
        $("#eda1_").html("Selecciona Accion Realizada");

        $("#eda2")[0].selectedIndex = 0;
        $("#eda2_").val(0);
        $("#eda2_").html("Selecciona Accion Realizada");

        $("#eda3")[0].selectedIndex = 0;
        $("#eda3_").val(0);
        $("#eda3_").html("Selecciona Accion Realizada");

        $("#eda4")[0].selectedIndex = 0;
        $("#eda4_").val(0);
        $("#eda4_").html("Selecciona Accion Realizada");

        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});
$("#edserieEQ").on("change", function () {
    var idEq1 = $(this).val();
    var idTip1 = $("#edtipEquipo").val();

    if (idEq1 > 0) {
        var datosEQ = new FormData();
        datosEQ.append("idEq1", idEq1);
        datosEQ.append("idTip1", idTip1);
        $("#edd2")[0].selectedIndex = 0;
        $("#edd2_").val(0);
        $("#edd2_").html("Selecciona Diagnostico");

        $("#edd3")[0].selectedIndex = 0;
        $("#edd3_").val(0);
        $("#edd3_").html("Selecciona Diagnostico");

        $("#edd4")[0].selectedIndex = 0;
        $("#edd4_").val(0);
        $("#edd4_").html("Selecciona Diagnostico");

        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");

        $("#eda2")[0].selectedIndex = 0;
        $("#eda2_").val(0);
        $("#eda2_").html("Selecciona Accion Realizada");

        $("#eda3")[0].selectedIndex = 0;
        $("#eda3_").val(0);
        $("#eda3_").html("Selecciona Accion Realizada");

        $("#eda4")[0].selectedIndex = 0;
        $("#eda4_").val(0);
        $("#eda4_").html("Selecciona Accion Realizada");

        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
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
                        $("#edofiEq").val(respuesta["office"]);
                        $("#edofiEq").html(respuesta["area"]);
                        $("#edservEq").val(respuesta["service"]);
                        $("#edservEq").html(respuesta["subarea"]);
                        $("#edrespEq").val(respuesta["uResponsable"]);
                        $("#edrespEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#eddetaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            " || Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"] + " || IP: " + respuesta["ip"] + " || Procesador: " + respuesta["procesador"] + "-" + respuesta["vprocesador"] + " || RAM: " + respuesta["ram"] + " || Disco Duro: " + respuesta["discoDuro"]);
                        $("#edsegmentado").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").html(respuesta["descSegmento"]);
                        // Llamar lista inicial de diagnosticos
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#edd1").prop("disabled", false);
                                $("#edd1").html(html);
                                $("#edd2")[0].selectedIndex = 0;
                                $("#edd2_").val(0);
                                $("#edd2_").html("Selecciona Diagnostico");

                                $("#edd3")[0].selectedIndex = 0;
                                $("#edd3_").val(0);
                                $("#edd3_").html("Selecciona Diagnostico");

                                $("#edd4")[0].selectedIndex = 0;
                                $("#edd4_").val(0);
                                $("#edd4_").html("Selecciona Diagnostico");

                                $("#edd5")[0].selectedIndex = 0;
                                $("#edd5_").val(0);
                                $("#edd5_").html("Selecciona Diagnostico");

                                $("#edd6")[0].selectedIndex = 0;
                                $("#edd6_").val(0);
                                $("#edd6_").html("Selecciona Diagnostico");

                                $("#edd7")[0].selectedIndex = 0;
                                $("#edd7_").val(0);
                                $("#edd7_").html("Selecciona Diagnostico");

                                $("#edd8")[0].selectedIndex = 0;
                                $("#edd8_").val(0);
                                $("#edd8_").html("Selecciona Diagnostico");
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
                                $("#eda1").prop("disabled", false);
                                $("#eda1").html(html);
                                $("#eda2")[0].selectedIndex = 0;
                                $("#eda2_").val(0);
                                $("#eda2_").html("Selecciona Accion Realizada");

                                $("#eda3")[0].selectedIndex = 0;
                                $("#eda3_").val(0);
                                $("#eda3_").html("Selecciona Accion Realizada");

                                $("#eda4")[0].selectedIndex = 0;
                                $("#eda4_").val(0);
                                $("#eda4_").html("Selecciona Accion Realizada");

                                $("#eda5")[0].selectedIndex = 0;
                                $("#eda5_").val(0);
                                $("#eda5_").html("Selecciona Accion Realizada");

                                $("#eda6")[0].selectedIndex = 0;
                                $("#eda6_").val(0);
                                $("#eda6_").html("Selecciona Accion Realizada");

                                $("#eda7")[0].selectedIndex = 0;
                                $("#eda7_").val(0);
                                $("#eda7_").html("Selecciona Accion Realizada");

                                $("#eda8")[0].selectedIndex = 0;
                                $("#eda8_").val(0);
                                $("#eda8_").html("Selecciona Accion Realizada");
                            },
                        });
                        // Llamar lista inicial de acciones
                    }
                    else if (idTip1 == 2 || idTip1 == 6 || idTip1 == 7 || idTip1 == 8) {
                        $("#edofiEq").val(respuesta["office"]);
                        $("#edofiEq").html(respuesta["area"]);
                        $("#edservEq").val(respuesta["service"]);
                        $("#edservEq").html(respuesta["subarea"]);
                        $("#edrespEq").val(respuesta["uResponsable"]);
                        $("#edrespEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#eddetaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            " || Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"] + " || IP: " + respuesta["ip"]);
                        $("#edsegmentado").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").html(respuesta["descSegmento"]);
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#edd1").prop("disabled", false);
                                $("#edd1").html(html);
                                $("#edd2")[0].selectedIndex = 0;
                                $("#edd2_").val(0);
                                $("#edd2_").html("Selecciona Diagnostico");

                                $("#edd3")[0].selectedIndex = 0;
                                $("#edd3_").val(0);
                                $("#edd3_").html("Selecciona Diagnostico");

                                $("#edd4")[0].selectedIndex = 0;
                                $("#edd4_").val(0);
                                $("#edd4_").html("Selecciona Diagnostico");

                                $("#edd5")[0].selectedIndex = 0;
                                $("#edd5_").val(0);
                                $("#edd5_").html("Selecciona Diagnostico");

                                $("#edd6")[0].selectedIndex = 0;
                                $("#edd6_").val(0);
                                $("#edd6_").html("Selecciona Diagnostico");

                                $("#edd7")[0].selectedIndex = 0;
                                $("#edd7_").val(0);
                                $("#edd7_").html("Selecciona Diagnostico");

                                $("#edd8")[0].selectedIndex = 0;
                                $("#edd8_").val(0);
                                $("#edd8_").html("Selecciona Diagnostico");
                            },
                        });
                        let idAcciona = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaAcciones.php",
                            data: "idAcciona=" + idAcciona,
                            success: function (html) {
                                $("#eda1").prop("disabled", false);
                                $("#eda1").html(html);
                                $("#eda2")[0].selectedIndex = 0;
                                $("#eda2_").val(0);
                                $("#eda2_").html("Selecciona Accion Realizada");

                                $("#eda3")[0].selectedIndex = 0;
                                $("#eda3_").val(0);
                                $("#eda3_").html("Selecciona Accion Realizada");

                                $("#eda4")[0].selectedIndex = 0;
                                $("#eda4_").val(0);
                                $("#eda4_").html("Selecciona Accion Realizada");

                                $("#eda5")[0].selectedIndex = 0;
                                $("#eda5_").val(0);
                                $("#eda5_").html("Selecciona Accion Realizada");

                                $("#eda6")[0].selectedIndex = 0;
                                $("#eda6_").val(0);
                                $("#eda6_").html("Selecciona Accion Realizada");

                                $("#eda7")[0].selectedIndex = 0;
                                $("#eda7_").val(0);
                                $("#eda7_").html("Selecciona Accion Realizada");

                                $("#eda8")[0].selectedIndex = 0;
                                $("#eda8_").val(0);
                                $("#eda8_").html("Selecciona Accion Realizada");
                            },
                        });
                    }
                    else if (idTip1 == 3 || idTip1 == 9 || idTip1 == 14 || idTip1 == 15 || idTip1 == 16 || idTip1 == 17) {
                        $("#edofiEq").val(respuesta["office"]);
                        $("#edofiEq").html(respuesta["area"]);
                        $("#edservEq").val(respuesta["service"]);
                        $("#edservEq").html(respuesta["subarea"]);
                        $("#edrespEq").val(respuesta["uResponsable"]);
                        $("#edrespEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#eddetaEQ").val("N° Equipo: " + respuesta["nro_eq"] +
                            " || Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"] + " || IP: " + respuesta["ip"]);
                        $("#edsegmentado").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").html(respuesta["descSegmento"]);
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#edd1").prop("disabled", false);
                                $("#edd1").html(html);
                                $("#edd2")[0].selectedIndex = 0;
                                $("#edd2_").val(0);
                                $("#edd2_").html("Selecciona Diagnostico");

                                $("#edd3")[0].selectedIndex = 0;
                                $("#edd3_").val(0);
                                $("#edd3_").html("Selecciona Diagnostico");

                                $("#edd4")[0].selectedIndex = 0;
                                $("#edd4_").val(0);
                                $("#edd4_").html("Selecciona Diagnostico");

                                $("#edd5")[0].selectedIndex = 0;
                                $("#edd5_").val(0);
                                $("#edd5_").html("Selecciona Diagnostico");

                                $("#edd6")[0].selectedIndex = 0;
                                $("#edd6_").val(0);
                                $("#edd6_").html("Selecciona Diagnostico");

                                $("#edd7")[0].selectedIndex = 0;
                                $("#edd7_").val(0);
                                $("#edd7_").html("Selecciona Diagnostico");

                                $("#edd8")[0].selectedIndex = 0;
                                $("#edd8_").val(0);
                                $("#edd8_").html("Selecciona Diagnostico");
                            },
                        });
                        let idAcciona = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaAcciones.php",
                            data: "idAcciona=" + idAcciona,
                            success: function (html) {
                                $("#eda1").prop("disabled", false);
                                $("#eda1").html(html);
                                $("#eda2")[0].selectedIndex = 0;
                                $("#eda2_").val(0);
                                $("#eda2_").html("Selecciona Accion Realizada");

                                $("#eda3")[0].selectedIndex = 0;
                                $("#eda3_").val(0);
                                $("#eda3_").html("Selecciona Accion Realizada");

                                $("#eda4")[0].selectedIndex = 0;
                                $("#eda4_").val(0);
                                $("#eda4_").html("Selecciona Accion Realizada");

                                $("#eda5")[0].selectedIndex = 0;
                                $("#eda5_").val(0);
                                $("#eda5_").html("Selecciona Accion Realizada");

                                $("#eda6")[0].selectedIndex = 0;
                                $("#eda6_").val(0);
                                $("#eda6_").html("Selecciona Accion Realizada");

                                $("#eda7")[0].selectedIndex = 0;
                                $("#eda7_").val(0);
                                $("#eda7_").html("Selecciona Accion Realizada");

                                $("#eda8")[0].selectedIndex = 0;
                                $("#eda8_").val(0);
                                $("#eda8_").html("Selecciona Accion Realizada");
                            },
                        });
                    }
                    else {
                        $("#edofiEq").val(respuesta["office"]);
                        $("#edofiEq").html(respuesta["area"]);
                        $("#edservEq").val(respuesta["service"]);
                        $("#edservEq").html(respuesta["subarea"]);
                        $("#edrespEq").val(respuesta["uResponsable"]);
                        $("#edrespEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#eddetaEQ").val("Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"]);
                        $("#edsegmentado").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").val(respuesta["tipSegmento"]);
                        $("#edtsegmento").html(respuesta["descSegmento"]);
                        let idSegmento = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaDiagnostico.php",
                            data: "idSegmento=" + idSegmento,
                            success: function (html) {
                                $("#edd1").prop("disabled", false);
                                $("#edd1").html(html);
                                $("#edd2")[0].selectedIndex = 0;
                                $("#edd2_").val(0);
                                $("#edd2_").html("Selecciona Diagnostico");

                                $("#edd3")[0].selectedIndex = 0;
                                $("#edd3_").val(0);
                                $("#edd3_").html("Selecciona Diagnostico");

                                $("#edd4")[0].selectedIndex = 0;
                                $("#edd4_").val(0);
                                $("#edd4_").html("Selecciona Diagnostico");

                                $("#edd5")[0].selectedIndex = 0;
                                $("#edd5_").val(0);
                                $("#edd5_").html("Selecciona Diagnostico");

                                $("#edd6")[0].selectedIndex = 0;
                                $("#edd6_").val(0);
                                $("#edd6_").html("Selecciona Diagnostico");

                                $("#edd7")[0].selectedIndex = 0;
                                $("#edd7_").val(0);
                                $("#edd7_").html("Selecciona Diagnostico");

                                $("#edd8")[0].selectedIndex = 0;
                                $("#edd8_").val(0);
                                $("#edd8_").html("Selecciona Diagnostico");
                            },
                        });
                        let idAcciona = respuesta["tipSegmento"];
                        $.ajax({
                            type: "POST",
                            url: "lib/comboListaAcciones.php",
                            data: "idAcciona=" + idAcciona,
                            success: function (html) {
                                $("#eda1").prop("disabled", false);
                                $("#eda1").html(html);
                                $("#eda2")[0].selectedIndex = 0;
                                $("#eda2_").val(0);
                                $("#eda2_").html("Selecciona Accion Realizada");

                                $("#eda3")[0].selectedIndex = 0;
                                $("#eda3_").val(0);
                                $("#eda3_").html("Selecciona Accion Realizada");

                                $("#eda4")[0].selectedIndex = 0;
                                $("#eda4_").val(0);
                                $("#eda4_").html("Selecciona Accion Realizada");

                                $("#eda5")[0].selectedIndex = 0;
                                $("#eda5_").val(0);
                                $("#eda5_").html("Selecciona Accion Realizada");

                                $("#eda6")[0].selectedIndex = 0;
                                $("#eda6_").val(0);
                                $("#eda6_").html("Selecciona Accion Realizada");

                                $("#eda7")[0].selectedIndex = 0;
                                $("#eda7_").val(0);
                                $("#eda7_").html("Selecciona Accion Realizada");

                                $("#eda8")[0].selectedIndex = 0;
                                $("#eda8_").val(0);
                                $("#eda8_").html("Selecciona Accion Realizada");
                            },
                        });
                    }
                }
            }
        });
    }
    else {
        $("#edofiEq1").prop("disabled", false);
        $("#edofiEq").val("0");
        $("#edofiEq").html('Seleccione Serie EQ primero');
        $("#edservEq1").prop("disabled", false);
        $("#edservEq").val("0");
        $("#edservEq").html('Seleccione Serie EQ primero');
        $("#edrespEq1").prop("disabled", false);
        $("#edrespEq").val("0");
        $("#edrespEq").html('Seleccione Serie EQ primero');
        $("#eddetaEQ").val("");
        $("#edsegmentado").val("0");
        $("#edtsegmento").val("0");
        $("#edtsegmento").html('Seleccione Serie EQ primero');

        $("#edd2")[0].selectedIndex = 0;
        $("#edd2_").val(0);
        $("#edd2_").html("Selecciona Diagnostico");

        $("#edd3")[0].selectedIndex = 0;
        $("#edd3_").val(0);
        $("#edd3_").html("Selecciona Diagnostico");

        $("#edd4")[0].selectedIndex = 0;
        $("#edd4_").val(0);
        $("#edd4_").html("Selecciona Diagnostico");

        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");

        $("#eda2")[0].selectedIndex = 0;
        $("#eda2_").val(0);
        $("#eda2_").html("Selecciona Accion Realizada");

        $("#eda3")[0].selectedIndex = 0;
        $("#eda3_").val(0);
        $("#eda3_").html("Selecciona Accion Realizada");

        $("#eda4")[0].selectedIndex = 0;
        $("#eda4_").val(0);
        $("#eda4_").html("Selecciona Accion Realizada");

        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }

});
// Bloque de selects diagnosticos
$("#edd1").on("change", function () {
    var existe = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#edd2").prop("disabled", false);
    $("#edd2")[0].selectedIndex = 0;
    $("#edd2_").val(0);
    $("#edd2_").html("Selecciona Diagnostico");

    $("#edd3").prop("disabled", false);
    $("#edd3")[0].selectedIndex = 0;
    $("#edd3_").val(0);
    $("#edd3_").html("Selecciona Diagnostico");

    $("#edd4").prop("disabled", false);
    $("#edd4")[0].selectedIndex = 0;
    $("#edd4_").val(0);
    $("#edd4_").html("Selecciona Diagnostico");

    $("#edd5").prop("disabled", false);
    $("#edd5")[0].selectedIndex = 0;
    $("#edd5_").val(0);
    $("#edd5_").html("Selecciona Diagnostico");

    $("#edd6").prop("disabled", false);
    $("#edd6")[0].selectedIndex = 0;
    $("#edd6_").val(0);
    $("#edd6_").html("Selecciona Diagnostico");

    $("#edd7").prop("disabled", false);
    $("#edd7")[0].selectedIndex = 0;
    $("#edd7_").val(0);
    $("#edd7_").html("Selecciona Diagnostico");

    $("#edd8").prop("disabled", false);
    $("#edd8")[0].selectedIndex = 0;
    $("#edd8_").val(0);
    $("#edd8_").html("Selecciona Diagnostico");

    if (existe > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos.php",
            data: "sgmt=" + sgmt + "&existe=" + existe,
            success: function (html) {
                $("#edd2").html(html);
                $("#edd2").prop("disabled", false);

                $("#edd3").prop("disabled", false);
                $("#edd3")[0].selectedIndex = 0;
                $("#edd3_").val(0);
                $("#edd3_").html("Selecciona Diagnostico");

                $("#edd4").prop("disabled", false);
                $("#edd4")[0].selectedIndex = 0;
                $("#edd4_").val(0);
                $("#edd4_").html("Selecciona Diagnostico");

                $("#edd5").prop("disabled", false);
                $("#edd5")[0].selectedIndex = 0;
                $("#edd5_").val(0);
                $("#edd5_").html("Selecciona Diagnostico");

                $("#edd6").prop("disabled", false);
                $("#edd6")[0].selectedIndex = 0;
                $("#edd6_").val(0);
                $("#edd6_").html("Selecciona Diagnostico");

                $("#edd7").prop("disabled", false);
                $("#edd7")[0].selectedIndex = 0;
                $("#edd7_").val(0);
                $("#edd7_").html("Selecciona Diagnostico");

                $("#edd8").prop("disabled", false);
                $("#edd8")[0].selectedIndex = 0;
                $("#edd8_").val(0);
                $("#edd8_").html("Selecciona Diagnostico");
            },
        });
    }
    else {
        $("#edd2").prop("disabled", false);
        $("#edd2")[0].selectedIndex = 0;
        $("#edd2_").val(0);
        $("#edd2_").html("Selecciona Diagnostico");

        $("#edd3").prop("disabled", false);
        $("#edd3")[0].selectedIndex = 0;
        $("#edd3_").val(0);
        $("#edd3_").html("Selecciona Diagnostico");

        $("#edd4").prop("disabled", false);
        $("#edd4")[0].selectedIndex = 0;
        $("#edd4_").val(0);
        $("#edd4_").html("Selecciona Diagnostico");

        $("#edd5").prop("disabled", false);
        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6").prop("disabled", false);
        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7").prop("disabled", false);
        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8").prop("disabled", false);
        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");
    }
});

$("#edd2").on("change", function () {
    var existe = $("#edd1").val();
    var existe2 = $(this).val();
    var sgmt = $("#edsegmentado").val();
    $("#edd3").prop("disabled", false);
    $("#edd3")[0].selectedIndex = 0;
    $("#edd3_").val(0);
    $("#edd3_").html("Selecciona Diagnostico");

    $("#edd4").prop("disabled", false);
    $("#edd4")[0].selectedIndex = 0;
    $("#edd4_").val(0);
    $("#edd4_").html("Selecciona Diagnostico");

    $("#edd5").prop("disabled", false);
    $("#edd5")[0].selectedIndex = 0;
    $("#edd5_").val(0);
    $("#edd5_").html("Selecciona Diagnostico");

    $("#edd6").prop("disabled", false);
    $("#edd6")[0].selectedIndex = 0;
    $("#edd6_").val(0);
    $("#edd6_").html("Selecciona Diagnostico");

    $("#edd7").prop("disabled", false);
    $("#edd7")[0].selectedIndex = 0;
    $("#edd7_").val(0);
    $("#edd7_").html("Selecciona Diagnostico");

    $("#edd8").prop("disabled", false);
    $("#edd8")[0].selectedIndex = 0;
    $("#edd8_").val(0);
    $("#edd8_").html("Selecciona Diagnostico");
    if (existe2 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos2.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2,
            success: function (html) {
                $("#edd3").html(html);
                $("#edd3").prop("disabled", false);
            },
        });
    }
    else {
        $("#edd3").prop("disabled", false);
        $("#edd3")[0].selectedIndex = 0;
        $("#edd3_").val(0);
        $("#edd3_").html("Selecciona Diagnostico");

        $("#edd4").prop("disabled", false);
        $("#edd4")[0].selectedIndex = 0;
        $("#edd4_").val(0);
        $("#edd4_").html("Selecciona Diagnostico");

        $("#edd5").prop("disabled", false);
        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6").prop("disabled", false);
        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7").prop("disabled", false);
        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8").prop("disabled", false);
        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");
    }
});
$("#edd3").on("change", function () {
    var existe = $("#edd1").val();
    var existe2 = $("#edd2").val();
    var existe3 = $(this).val();
    var sgmt = $("#edsegmentado").val();
    $("#edd4").prop("disabled", false);
    $("#edd4")[0].selectedIndex = 0;
    $("#edd4_").val(0);
    $("#edd4_").html("Selecciona Diagnostico");

    $("#edd5").prop("disabled", false);
    $("#edd5")[0].selectedIndex = 0;
    $("#edd5_").val(0);
    $("#edd5_").html("Selecciona Diagnostico");

    $("#edd6").prop("disabled", false);
    $("#edd6")[0].selectedIndex = 0;
    $("#edd6_").val(0);
    $("#edd6_").html("Selecciona Diagnostico");

    $("#edd7").prop("disabled", false);
    $("#edd7")[0].selectedIndex = 0;
    $("#edd7_").val(0);
    $("#edd7_").html("Selecciona Diagnostico");

    $("#edd8").prop("disabled", false);
    $("#edd8")[0].selectedIndex = 0;
    $("#edd8_").val(0);
    $("#edd8_").html("Selecciona Diagnostico");
    if (existe3 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos3.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3,
            success: function (html) {
                $("#edd4").html(html);
                $("#edd4").prop("disabled", false);
            },
        });
    }
    else {
        $("#edd4").prop("disabled", false);
        $("#edd4")[0].selectedIndex = 0;
        $("#edd4_").val(0);
        $("#edd4_").html("Selecciona Diagnostico");

        $("#edd5").prop("disabled", false);
        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6").prop("disabled", false);
        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7").prop("disabled", false);
        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8").prop("disabled", false);
        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");
    }
});
$("#edd4").on("change", function () {
    var existe = $("#edd1").val();
    var existe2 = $("#edd2").val();
    var existe3 = $("#edd3").val();
    var existe4 = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#edd5").prop("disabled", false);
    $("#edd5")[0].selectedIndex = 0;
    $("#edd5_").val(0);
    $("#edd5_").html("Selecciona Diagnostico");

    $("#edd6").prop("disabled", false);
    $("#edd6")[0].selectedIndex = 0;
    $("#edd6_").val(0);
    $("#edd6_").html("Selecciona Diagnostico");

    $("#edd7").prop("disabled", false);
    $("#edd7")[0].selectedIndex = 0;
    $("#edd7_").val(0);
    $("#edd7_").html("Selecciona Diagnostico");

    $("#edd8").prop("disabled", false);
    $("#edd8")[0].selectedIndex = 0;
    $("#edd8_").val(0);
    $("#edd8_").html("Selecciona Diagnostico");

    if (existe4 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos4.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4,
            success: function (html) {
                $("#edd5").html(html);
                $("#edd5").prop("disabled", false);
            },
        });
    }
    else {

        $("#edd5").prop("disabled", false);
        $("#edd5")[0].selectedIndex = 0;
        $("#edd5_").val(0);
        $("#edd5_").html("Selecciona Diagnostico");

        $("#edd6").prop("disabled", false);
        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7").prop("disabled", false);
        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8").prop("disabled", false);
        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");
    }
});
$("#edd5").on("change", function () {
    var existe = $("#edd1").val();
    var existe2 = $("#edd2").val();
    var existe3 = $("#edd3").val();
    var existe4 = $("#edd4").val();
    var existe5 = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#edd6").prop("disabled", false);
    $("#edd6")[0].selectedIndex = 0;
    $("#edd6_").val(0);
    $("#edd6_").html("Selecciona Diagnostico");

    $("#edd7").prop("disabled", false);
    $("#edd7")[0].selectedIndex = 0;
    $("#edd7_").val(0);
    $("#edd7_").html("Selecciona Diagnostico");

    $("#edd8").prop("disabled", false);
    $("#edd8")[0].selectedIndex = 0;
    $("#edd8_").val(0);
    $("#edd8_").html("Selecciona Diagnostico");

    if (existe5 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos5.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5,
            success: function (html) {
                $("#edd6").html(html);
                $("#edd6").prop("disabled", false);
            },
        });
    }
    else {

        $("#edd6").prop("disabled", false);
        $("#edd6")[0].selectedIndex = 0;
        $("#edd6_").val(0);
        $("#edd6_").html("Selecciona Diagnostico");

        $("#edd7").prop("disabled", false);
        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8").prop("disabled", false);
        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");
    }
});
$("#edd6").on("change", function () {
    var existe = $("#edd1").val();
    var existe2 = $("#edd2").val();
    var existe3 = $("#edd3").val();
    var existe4 = $("#edd4").val();
    var existe5 = $("#edd5").val();
    var existe6 = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#edd7").prop("disabled", false);
    $("#edd7")[0].selectedIndex = 0;
    $("#edd7_").val(0);
    $("#edd7_").html("Selecciona Diagnostico");

    $("#edd8").prop("disabled", false);
    $("#edd8")[0].selectedIndex = 0;
    $("#edd8_").val(0);
    $("#edd8_").html("Selecciona Diagnostico");

    if (existe6 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos6.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6,
            success: function (html) {
                $("#edd7").html(html);
                $("#edd7").prop("disabled", false);
            },
        });
    }
    else {
        $("#edd7").prop("disabled", false);
        $("#edd7")[0].selectedIndex = 0;
        $("#edd7_").val(0);
        $("#edd7_").html("Selecciona Diagnostico");

        $("#edd8").prop("disabled", false);
        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");
    }
});
$("#edd7").on("change", function () {
    var existe = $("#edd1").val();
    var existe2 = $("#edd2").val();
    var existe3 = $("#edd3").val();
    var existe4 = $("#edd4").val();
    var existe5 = $("#edd5").val();
    var existe6 = $("#edd6").val();
    var existe7 = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#edd8").prop("disabled", false);
    $("#edd8")[0].selectedIndex = 0;
    $("#edd8_").val(0);
    $("#edd8_").html("Selecciona Diagnostico");

    if (existe7 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDiagnosticos7.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6 + "&existe7=" + existe7,
            success: function (html) {
                $("#edd8").html(html);
                $("#edd8").prop("disabled", false);
            },
        });
    }
    else {
        $("#edd8").prop("disabled", false);
        $("#edd8")[0].selectedIndex = 0;
        $("#edd8_").val(0);
        $("#edd8_").html("Selecciona Diagnostico");
    }
});
// Bloque de selects diagnosticos

// Bloque de selects ACCIONES
$("#eda1").on("change", function () {
    var existe = $(this).val();
    var sgmt = $("#edsegmentado").val();
    $("#eda2").prop("disabled", false);
    $("#eda2")[0].selectedIndex = 0;
    $("#eda2_").val(0);
    $("#eda2_").html("Selecciona Accion Realizada");

    $("#eda3").prop("disabled", false);
    $("#eda3")[0].selectedIndex = 0;
    $("#eda3_").val(0);
    $("#eda3_").html("Selecciona Accion Realizada");

    $("#eda4").prop("disabled", false);
    $("#eda4")[0].selectedIndex = 0;
    $("#eda4_").val(0);
    $("#eda4_").html("Selecciona Accion Realizada");

    $("#eda5").prop("disabled", false);
    $("#eda5")[0].selectedIndex = 0;
    $("#eda5_").val(0);
    $("#eda5_").html("Selecciona Accion Realizada");

    $("#eda6").prop("disabled", false);
    $("#eda6")[0].selectedIndex = 0;
    $("#eda6_").val(0);
    $("#eda6_").html("Selecciona Accion Realizada");

    $("#eda7").prop("disabled", false);
    $("#eda7")[0].selectedIndex = 0;
    $("#eda7_").val(0);
    $("#eda7_").html("Selecciona Accion Realizada");

    $("#eda8").prop("disabled", false);
    $("#eda8")[0].selectedIndex = 0;
    $("#eda8_").val(0);
    $("#eda8_").html("Selecciona Accion Realizada");
    if (existe > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones.php",
            data: "sgmt=" + sgmt + "&existe=" + existe,
            success: function (html) {
                $("#eda2").html(html);
                $("#eda2").prop("disabled", false);
            },
        });
    }
    else {
        $("#eda2").prop("disabled", false);
        $("#eda2")[0].selectedIndex = 0;
        $("#eda2_").val(0);
        $("#eda2_").html("Selecciona Accion Realizada");

        $("#eda3").prop("disabled", false);
        $("#eda3")[0].selectedIndex = 0;
        $("#eda3_").val(0);
        $("#eda3_").html("Selecciona Accion Realizada");

        $("#eda4").prop("disabled", false);
        $("#eda4")[0].selectedIndex = 0;
        $("#eda4_").val(0);
        $("#eda4_").html("Selecciona Accion Realizada");

        $("#eda5").prop("disabled", false);
        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6").prop("disabled", false);
        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7").prop("disabled", false);
        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8").prop("disabled", false);
        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});

$("#eda2").on("change", function () {
    var existe = $("#eda1").val();
    var existe2 = $(this).val();
    var sgmt = $("#edsegmentado").val();
    $("#eda3").prop("disabled", false);
    $("#eda3")[0].selectedIndex = 0;
    $("#eda3_").val(0);
    $("#eda3_").html("Selecciona Accion Realizada");

    $("#eda4").prop("disabled", false);
    $("#eda4")[0].selectedIndex = 0;
    $("#eda4_").val(0);
    $("#eda4_").html("Selecciona Accion Realizada");

    $("#eda5").prop("disabled", false);
    $("#eda5")[0].selectedIndex = 0;
    $("#eda5_").val(0);
    $("#eda5_").html("Selecciona Accion Realizada");

    $("#eda6").prop("disabled", false);
    $("#eda6")[0].selectedIndex = 0;
    $("#eda6_").val(0);
    $("#eda6_").html("Selecciona Accion Realizada");

    $("#eda7").prop("disabled", false);
    $("#eda7")[0].selectedIndex = 0;
    $("#eda7_").val(0);
    $("#eda7_").html("Selecciona Accion Realizada");

    $("#eda8").prop("disabled", false);
    $("#eda8")[0].selectedIndex = 0;
    $("#eda8_").val(0);
    $("#eda8_").html("Selecciona Accion Realizada");
    if (existe2 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones2.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2,
            success: function (html) {
                $("#eda3").html(html);
                $("#eda3").prop("disabled", false);
            },
        });
    }
    else {
        $("#eda3").prop("disabled", false);
        $("#eda3")[0].selectedIndex = 0;
        $("#eda3_").val(0);
        $("#eda3_").html("Selecciona Accion Realizada");

        $("#eda4").prop("disabled", false);
        $("#eda4")[0].selectedIndex = 0;
        $("#eda4_").val(0);
        $("#eda4_").html("Selecciona Accion Realizada");

        $("#eda5").prop("disabled", false);
        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6").prop("disabled", false);
        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7").prop("disabled", false);
        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8").prop("disabled", false);
        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});
$("#eda3").on("change", function () {
    var existe = $("#eda1").val();
    var existe2 = $("#eda2").val();
    var existe3 = $(this).val();
    var sgmt = $("#edsegmentado").val();
    $("#eda4").prop("disabled", false);
    $("#eda4")[0].selectedIndex = 0;
    $("#eda4_").val(0);
    $("#eda4_").html("Selecciona Accion Realizada");

    $("#eda5").prop("disabled", false);
    $("#eda5")[0].selectedIndex = 0;
    $("#eda5_").val(0);
    $("#eda5_").html("Selecciona Accion Realizada");

    $("#eda6").prop("disabled", false);
    $("#eda6")[0].selectedIndex = 0;
    $("#eda6_").val(0);
    $("#eda6_").html("Selecciona Accion Realizada");

    $("#eda7").prop("disabled", false);
    $("#eda7")[0].selectedIndex = 0;
    $("#eda7_").val(0);
    $("#eda7_").html("Selecciona Accion Realizada");

    $("#eda8").prop("disabled", false);
    $("#eda8")[0].selectedIndex = 0;
    $("#eda8_").val(0);
    $("#eda8_").html("Selecciona Accion Realizada");
    if (existe3 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones3.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3,
            success: function (html) {
                $("#eda4").html(html);
                $("#eda4").prop("disabled", false);
            },
        });
    }
    else {
        $("#eda4").prop("disabled", false);
        $("#eda4")[0].selectedIndex = 0;
        $("#eda4_").val(0);
        $("#eda4_").html("Selecciona Accion Realizada");

        $("#eda5").prop("disabled", false);
        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6").prop("disabled", false);
        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7").prop("disabled", false);
        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8").prop("disabled", false);
        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});
$("#eda4").on("change", function () {
    var existe = $("#eda1").val();
    var existe2 = $("#eda2").val();
    var existe3 = $("#eda3").val();
    var existe4 = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#eda5").prop("disabled", false);
    $("#eda5")[0].selectedIndex = 0;
    $("#eda5_").val(0);
    $("#eda5_").html("Selecciona Accion Realizada");

    $("#eda6").prop("disabled", false);
    $("#eda6")[0].selectedIndex = 0;
    $("#eda6_").val(0);
    $("#eda6_").html("Selecciona Accion Realizada");

    $("#eda7").prop("disabled", false);
    $("#eda7")[0].selectedIndex = 0;
    $("#eda7_").val(0);
    $("#eda7_").html("Selecciona Accion Realizada");

    $("#eda8").prop("disabled", false);
    $("#eda8")[0].selectedIndex = 0;
    $("#eda8_").val(0);
    $("#eda8_").html("Selecciona Accion Realizada");
    if (existe4 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones4.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4,
            success: function (html) {
                $("#eda5").html(html);
                $("#eda5").prop("disabled", false);
            },
        });
    }
    else {
        $("#eda5").prop("disabled", false);
        $("#eda5")[0].selectedIndex = 0;
        $("#eda5_").val(0);
        $("#eda5_").html("Selecciona Accion Realizada");

        $("#eda6").prop("disabled", false);
        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7").prop("disabled", false);
        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8").prop("disabled", false);
        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});
$("#eda5").on("change", function () {
    var existe = $("#eda1").val();
    var existe2 = $("#eda2").val();
    var existe3 = $("#eda3").val();
    var existe4 = $("#eda4").val();
    var existe5 = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#eda6").prop("disabled", false);
    $("#eda6")[0].selectedIndex = 0;
    $("#eda6_").val(0);
    $("#eda6_").html("Selecciona Accion Realizada");

    $("#eda7").prop("disabled", false);
    $("#eda7")[0].selectedIndex = 0;
    $("#eda7_").val(0);
    $("#eda7_").html("Selecciona Accion Realizada");

    $("#eda8").prop("disabled", false);
    $("#eda8")[0].selectedIndex = 0;
    $("#eda8_").val(0);
    $("#eda8_").html("Selecciona Accion Realizada");
    if (existe5 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones5.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5,
            success: function (html) {
                $("#eda6").html(html);
                $("#eda6").prop("disabled", false);
            },
        });
    }
    else {
        $("#eda6").prop("disabled", false);
        $("#eda6")[0].selectedIndex = 0;
        $("#eda6_").val(0);
        $("#eda6_").html("Selecciona Accion Realizada");

        $("#eda7").prop("disabled", false);
        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8").prop("disabled", false);
        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});
$("#eda6").on("change", function () {
    var existe = $("#eda1").val();
    var existe2 = $("#eda2").val();
    var existe3 = $("#eda3").val();
    var existe4 = $("#eda4").val();
    var existe5 = $("#eda5").val();
    var existe6 = $(this).val();
    var sgmt = $("#edsegmentado").val();

    $("#eda7").prop("disabled", false);
    $("#eda7")[0].selectedIndex = 0;
    $("#eda7_").val(0);
    $("#eda7_").html("Selecciona Accion Realizada");

    $("#eda8").prop("disabled", false);
    $("#eda8")[0].selectedIndex = 0;
    $("#eda8_").val(0);
    $("#eda8_").html("Selecciona Accion Realizada");
    if (existe6 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones6.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6,
            success: function (html) {
                $("#eda7").html(html);
                $("#eda7").prop("disabled", false);
            },
        });
    }
    else {
        $("#eda7").prop("disabled", false);
        $("#eda7")[0].selectedIndex = 0;
        $("#eda7_").val(0);
        $("#eda7_").html("Selecciona Accion Realizada");

        $("#eda8").prop("disabled", false);
        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});
$("#eda7").on("change", function () {
    var existe = $("#eda1").val();
    var existe2 = $("#eda2").val();
    var existe3 = $("#eda3").val();
    var existe4 = $("#eda4").val();
    var existe5 = $("#eda5").val();
    var existe6 = $("#eda6").val();
    var existe7 = $("#eda7").val();
    var sgmt = $("#edsegmentado").val();

    $("#eda8").prop("disabled", false);
    $("#eda8")[0].selectedIndex = 0;
    $("#eda8_").val(0);
    $("#eda8_").html("Selecciona Accion Realizada");

    if (existe7 > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboAcciones7.php",
            data: "sgmt=" + sgmt + "&existe=" + existe + "&existe2=" + existe2 + "&existe3=" + existe3 + "&existe4=" + existe4 + "&existe5=" + existe5 + "&existe6=" + existe6 + "&existe7=" + existe7,
            success: function (html) {
                $("#eda8").html(html);
                $("#eda8").prop("disabled", false);
            },
        });
    }
    else {
        $("#eda8").prop("disabled", false);
        $("#eda8")[0].selectedIndex = 0;
        $("#eda8_").val(0);
        $("#eda8_").html("Selecciona Accion Realizada");
    }
});