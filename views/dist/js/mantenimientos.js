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
$("#descIniEQ").keyup(function () {
    var st = $(this).val();
    var mayust = st.toUpperCase();
    $("#descIniEQ").val(mayust);
});
$("#descIniEQ").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
$("#descIniEQ").keyup(function () {
    var st = $(this).val();
    var mayust = st.toUpperCase();
    $("#descIniEQ").val(mayust);
});
$("#priEvaEQ").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
$("#priEvaEQ").keyup(function () {
    var st = $(this).val();
    var mayust = st.toUpperCase();
    $("#priEvaEQ").val(mayust);
});
$("#recoFEQ").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
$("#recoFEQ").keyup(function () {
    var st = $(this).val();
    var mayust = st.toUpperCase();
    $("#recoFEQ").val(mayust);
});
$("#detalleOtros").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚÜü\-°_. ]/g, "");
});
$("#detalleOtros").keyup(function () {
    var st = $(this).val();
    var mayust = st.toUpperCase();
    $("#detalleOtros").val(mayust);
});
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
        $("#segmentado").val("0");
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
                        $("#segmentado").val(respuesta["tipSegmento"]);
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
            var segmentoDiag = respuesta["descSegmento"];
            // alert(descripcionDiag);
            // Pintado de los diagnosticos en el bloque
            $(".nuevoDiagnostico").append(
                '<div class="col-md-12" style="padding-right:0px">' +
                '<div class= "input-group mt-1" >' +
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-md quitarDiagnostico" idDiagnostico="' + idDiagnostico + '"><i class="fas fa-trash-restore"></i></button></span> &nbsp;' +
                '<input type="text" class="form-control nuevaDescripcionDiagnostico" name="agregarDiagnostico" placeholder="Descripción del diagnóstico" idDiagnostico="' + idDiagnostico + '" value="' + descripcionDiag + '" segmento="' + segmentoDiag + '" contable2="1" required readonly>' +
                '<span class="input-group-addon ml-1"><button type="button" class="btn btn-warning btn-md"><i class="fas fa-border-style"></i></button></span> &nbsp;' +
                '<input type="text" class="form-control" name="" value="' + segmentoDiag + '"required readonly>' +
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
            $("button.recuperarDiagnostico[idDiagnostico='" + listaIdDiagnosticos[i]["idDiagnostico"] + "']").addClass('btn-success agregarDiagnostico');
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
            "diagnostico": $(diagnosticoDesc[i]).val(),
            "segmento": $(diagnosticoDesc[i]).attr("segmento"),
            "conteo": $(diagnosticoDesc[i]).attr("contable2"),
        });
    }
    $("#listaDiagnosticos").val(JSON.stringify(listaDiagnosticos));
}
function quitaragregarDiagnostico() {
    //Capturamos todos los id de productos que fueron elegidos en la venta
    var idDiagnostico = $(".quitarDiagnostico");
    //Capturamos todos los botones de agregar que aparecen en la tabla
    var botonesTabla = $(".tablaMDiagnosticoFrm tbody button.agregarDiagnostico");
    //Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
    for (var i = 0; i < idDiagnostico.length; i++) {
        //Capturamos los Id de los productos agregados a la venta
        var boton = $(idDiagnostico[i]).attr("idDiagnostico");
        //Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
        for (var j = 0; j < botonesTabla.length; j++) {
            if ($(botonesTabla[j]).attr("idDiagnostico") == boton) {
                $(botonesTabla[j]).removeClass("btn-success agregarDiagnostico");
                $(botonesTabla[j]).addClass("btn-default");
            }
        }
    }
}
$('.tablaMDiagnosticoFrm').on('draw.dt', function () {
    quitaragregarDiagnostico();
});

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
            var segmentoAccion = respuesta["descSegmento"];
            $(".nuevoAcciones").append(
                '<div class="col-md-12" style="padding-right:0px">' +
                '<div class= "input-group mt-1" >' +
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-md quitarAccion" idAccion="' + idAccionR + '"><i class="fas fa-trash-restore"></i></button></span> &nbsp;' +
                '<input type="text" class="form-control nuevaDescripcionAccion" name="agregarAccion" placeholder="Descripción de acción realizada" idAccion="' + idAccionR + '" value="' + descripcionAccion + '" segmento="' + segmentoAccion + '" contable="1" required readonly>' +
                '<span class="input-group-addon ml-1"><button type="button" class="btn btn-warning btn-md"><i class="fas fa-border-style"></i></button></span> &nbsp;' +
                '<input type="text" class="form-control" name="" value="' + segmentoAccion + '"required readonly>' +
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
            "accion": $(accionDesc[i]).val(),
            "segmento": $(accionDesc[i]).attr("segmento"),
            "conteo": $(accionDesc[i]).attr("contable")
        });
    }
    $("#listaAcciones").val(JSON.stringify(listaAcciones));
}
function quitaragregarAcciones() {
    //Capturamos todos los id de productos que fueron elegidos en la venta
    var idAccion = $(".quitarAccion");
    //Capturamos todos los botones de agregar que aparecen en la tabla
    var botonesTabla2 = $(".tablaAccionesFrm tbody button.agregarAccion");
    //Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
    for (var i = 0; i < idAccion.length; i++) {
        //Capturamos los Id de los productos agregados a la venta
        var boton = $(idAccion[i]).attr("idAccion");
        //Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
        for (var j = 0; j < botonesTabla2.length; j++) {
            if ($(botonesTabla2[j]).attr("idAccion") == boton) {
                $(botonesTabla2[j]).removeClass("btn-success agregarAccion");
                $(botonesTabla2[j]).addClass("btn-default");
            }
        }
    }
}
$('.tablaAccionesFrm').on('draw.dt', function () {
    quitaragregarAcciones();
});
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