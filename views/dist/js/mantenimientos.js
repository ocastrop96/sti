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
                            " || Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"] + " || IP: " + respuesta["ip"] + " || Procesador: " + respuesta["procesador"] + "-" + respuesta["vprocesador"] + " || RAM: " + respuesta["ram"] + " || Disco Duro: " + respuesta["discoDuro"]);
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
                    }
                    else {
                        $("#ofiEq").val(respuesta["office"]);
                        $("#ofiEq").html(respuesta["area"]);
                        $("#servEq").val(respuesta["service"]);
                        $("#servEq").html(respuesta["subarea"]);
                        $("#respEq").val(respuesta["uResponsable"]);
                        $("#respEq").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);
                        $("#detaEQ").val("Serie N°: " + respuesta["serie"] + " || Cod.Patr: " + respuesta["sbn"] + " || Marca: " + respuesta["marca"] + " || Modelo: " + respuesta["modelo"] + " || Descripción: " + respuesta["descripcion"]);
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

// Listar datos del diagnostico vía ajax
$(".tablaMDiagnosticoFrm  tbody").on("click", "button.agregarDiagnostico", function () {
    var idDiagnostico = $(this).attr("idDiagnostico");
    // alert(idDiagnostico);
    $(this).removeClass("btn-success agregarDiagnostico");
    $(this).addClass("btn-default");
    // Listar datos del diagnostico vía ajax
    var datos = new FormData();
    datos.append("idDiagnostico", idDiagnostico);
    $.ajax({
        url: "lib/ajaxDiagnosticos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log(respuesta);
            var descripcionDiag = respuesta["diagnostico"];
            // alert(descripcionDiag);
            // Pintado de los diagnosticos en el bloque
            $(".nuevoDiagnostico").append(
                '<div class="col-md-12" style="padding-right:0px">' +
                '<div class= "input-group mt-1" >' +
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-md quitarDiagnostico" idDiagnostico="' + idDiagnostico + '"><i class="fas fa-trash-restore"></i></button></span> &nbsp;' +
                '<input type="text" class="form-control nuevaDescripcionDiagnostico" name="agregarDiagnostico" placeholder="Descripción del diagnóstico" idDiagnostico="' + idDiagnostico + '" value="' + descripcionDiag + '" required readonly>' +
                '</div>' +
                '</div >'
            );
            // Pintado de los diagnosticos en el bloque
            // Metodo de insertar los valor en el array
            listarDiagnosticos()
            // Metodo de insertar los valor en el array
            localStorage.removeItem("quitarDiagnostico");

        }
    });
});
// Listar datos del diagnostico vía ajax
$(".tablaMDiagnosticoFrm").on("draw.dt", function () {
    if (localStorage.getItem("quitarDiagnostico") != null) {
        var listaIdDiagnosticos = JSON.parse(localStorage.getItem("quitarDiagnostico"));
        for (var i = 0; i < listaIdDiagnosticos.length; i++) {
            $("button.recuperarDiagnostico[idDiagnostico='" + listaIdDiagnosticos[i]["idDiagnostico"] + "']").removeClass('btn-default');
            $("button.recuperarDiagnostico[idDiagnostico='" + listaIdDiagnosticos[i]["idDiagnostico"] + "']").addClass('btn-primary agregarDiagnostico');
        }
    }
});
// Quitar diagnosticos y recuperar botón
var idQuitarDiagnostico = [];
localStorage.removeItem("quitarDiagnostico");
$(".frmManto1").on("click", "button.quitarDiagnostico", function () {
    $(this).parent().parent().parent().remove();
    var idDiagnostico = $(this).attr("idDiagnostico");
    /*=============================================
    ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
    =============================================*/
    if (localStorage.getItem("quitarDiagnostico") == null) {
        idQuitarDiagnostico = [];
    } else {
        idQuitarDiagnostico.concat(localStorage.getItem("quitarDiagnostico"))
    }
    idQuitarDiagnostico.push({ "idDiagnostico": idDiagnostico });
    localStorage.setItem("quitarDiagnostico", JSON.stringify(idQuitarDiagnostico));
    $("button.recuperarDiagnostico[idDiagnostico='" + idDiagnostico + "']").removeClass('btn-default');
    $("button.recuperarDiagnostico[idDiagnostico='" + idDiagnostico + "']").addClass('btn-success agregarDiagnostico');
    listarDiagnosticos();

});

// Quitar diagnosticos y recuperar botón
// Listar Diagnosticos
function listarDiagnosticos() {
    var listaDiagnosticos = [];

    var diagnosticoDesc = $(".nuevaDescripcionDiagnostico");
    for (var i = 0; i < diagnosticoDesc.length; i++) {
        listaDiagnosticos.push({
            "id": $(diagnosticoDesc[i]).attr("idDiagnostico"),
            "diagnostico": $(diagnosticoDesc[i]).val()
        });
    }
    $("#listaDiagnosticos").val(JSON.stringify(listaDiagnosticos));
}
// Listar Diagnosticos
// Listar Acciones Realizadas
$(".tablaAccionesFrm  tbody").on("click", "button.agregarAccion", function () {
    var idAccionR = $(this).attr("idAccion");
    $(this).removeClass("btn-success agregarAccion");
    $(this).addClass("btn-default");
    var datos2 = new FormData();
    datos2.append("idAccion", idAccionR);
    $.ajax({
        url: "lib/ajaxAcciones.php",
        method: "POST",
        data: datos2,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log(respuesta);
            var descripcionAccion = respuesta["accionrealizada"];
            $(".nuevoAcciones").append(
                '<div class="col-md-12" style="padding-right:0px">' +
                '<div class= "input-group mt-1" >' +
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-md quitarAccion" idAccion="' + idAccionR + '"><i class="fas fa-trash-restore"></i></button></span> &nbsp;' +
                '<input type="text" class="form-control nuevaDescripcionAccion" name="agregarAccion" placeholder="Descripción de acción realizada" idAccion="' + idAccionR + '" value="' + descripcionAccion + '" required readonly>' +
                '</div>' +
                '</div >'
            );
            localStorage.removeItem("quitarAccion");
            listarAcciones()
        }
    });
});

$(".tablaAccionesFrm").on("draw.dt", function () {
    if (localStorage.getItem("quitarAccion") != null) {
        var listaIdAcciones = JSON.parse(localStorage.getItem("quitarAccion"));
        for (var i = 0; i < listaIdAcciones.length; i++) {
            $("button.recuperarAccion[idAccion='" + listaIdAcciones[i]["idAccion"] + "']").removeClass('btn-default');
            $("button.recuperarAccion[idAccion='" + listaIdAcciones[i]["idAccion"] + "']").addClass('btn-success agregarAccion');
        }
    }
});

var idQuitarAccion = [];
localStorage.removeItem("quitarAccion");
$(".frmManto1").on("click", "button.quitarAccion", function () {
    $(this).parent().parent().parent().remove();
    var idAccion = $(this).attr("idAccion");
    /*=============================================
    ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
    =============================================*/
    if (localStorage.getItem("quitarAccion") == null) {
        idQuitarAccion = [];
    } else {
        idQuitarAccion.concat(localStorage.getItem("quitarAccion"))
    }
    idQuitarAccion.push({ "idAccion": idAccion });
    localStorage.setItem("quitarAccion", JSON.stringify(idQuitarAccion));
    $("button.recuperarAccion[idAccion='" + idAccion + "']").removeClass('btn-default');
    $("button.recuperarAccion[idAccion='" + idAccion + "']").addClass('btn-success agregarAccion');
    listarAcciones();

});
function listarAcciones() {
    var listaAcciones = [];

    var accionDesc = $(".nuevaDescripcionAccion");
    for (var i = 0; i < accionDesc.length; i++) {
        listaAcciones.push({
            "id": $(accionDesc[i]).attr("idAccion"),
            "accion": $(accionDesc[i]).val()
        });
    }
    $("#listaAcciones").val(JSON.stringify(listaAcciones));
}
// Listar Acciones Realizadas

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



// var date1 = '2021-01-01';
// var date2 = '2009-01-01';
// if (date1 > date2) {
//     console.log("es mayor")
// }
// else {
//     console.log("es menor o igual")
// }