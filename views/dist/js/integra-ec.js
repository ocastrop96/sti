$(".tablaIntegraEC").DataTable({
    ajax: "util/datatable-integra-ec.php",
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
$('[data-mask]').inputmask();

$("#nroEquipo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#nroEquipo").keyup(function () {
    var neq = $(this).val();
    var mayusteq = neq.toUpperCase();
    $("#nroEquipo").val(mayusteq);
});



$("#tipEq").on("change", function () {
    let comboTipo = $(this).val();
    if (comboTipo == 1) {
        $("#bloquePC").removeClass("d-none");
        $("#bloqueLapServ").addClass("d-none");
    }
    else if (comboTipo == 4 || comboTipo == 5) {
        $("#bloquePC").addClass("d-none");
        $("#bloqueLapServ").removeClass("d-none");
    }
    else {
        $("#bloquePC").addClass("d-none");
        $("#bloqueLapServ").addClass("d-none");
    }
});

// Listar DATOS A PARTIR DE SERIE
$("#seriePC").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp").val(data["uResponsable"]);
                $("#datOfi").val(data["office"]);
                $("#datServ").val(data["service"]);
                $("#datEst").val(data["condicion"]);
                $("#datCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp").val("");
        $("#datOfi").val("");
        $("#datServ").val("");
        $("#datEst").val("");
        $("#datCond").val("");
    }
});


$("#serieLaptop").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp").val(data["uResponsable"]);
                $("#datOfi").val(data["office"]);
                $("#datServ").val(data["service"]);
                $("#datEst").val(data["condicion"]);
                $("#datCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp").val("");
        $("#datOfi").val("");
        $("#datServ").val("");
        $("#datEst").val("");
        $("#datCond").val("");
    }
});


$(".tablaIntegraEC tbody").on("click", ".btnEditarIntegraC", function () {
    // Setteo y Limpieza de Datos
    $("#idIntegracion").val("");
    $("#edtNEquipo").val("");
    $("#idIp").val("");
    $("#datResp2").val("");
    $("#datOfi2").val("");
    $("#datServ2").val("");
    $("#datEst2").val("");
    $("#datCond2").val("");
    $("#edtSeriePC").val("0");
    $("#edtSeriePC").html("Selecciona PC");
    $("#edtSerieMon").val("0");
    $("#edtSerieMon").html("Selecciona Monitor");
    $("#edtSerieTec").val("0");
    $("#edtSerieTec").html("Selecciona Teclado");
    $("#edtSerieAcu").val("0");
    $("#edtSerieAcu").html("Selecciona Tip Fuente");
    $("#edtSerieLap").val("0");
    $("#edtSerieLap").html("Selecciona Laptop o Servidor");
    // Setteo y Limpieza de Datos
    var idIntegracion = $(this).attr("idIntegracion");
    var tipEquipo = $(this).attr("idTipo");

    if (tipEquipo === "1") {
        $("#bloquePC2").removeClass("d-none");
        $("#bloqueLapServ2").addClass("d-none");
        var datos = new FormData();
        datos.append("idIntegracion", idIntegracion);

        $.ajax({
            url: "lib/ajaxIntegraciones.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#edtTip").val(respuesta["tipo_equipo"]);
                $("#edtTip").html(respuesta["categoria"]);
                $("#edtSeriePC").val(respuesta["idPc"]);
                $("#edtSeriePC").html(respuesta["seriepc"]);
                $("#edtSerieMon").val(respuesta["serie_monitor"]);
                $("#edtSerieMon").html(respuesta["seriemon"]);

                $("#edtSerieTec").val(respuesta["serie_teclado"]);
                $("#edtSerieTec").html(respuesta["serietec"]);

                $("#edtSerieAcu").val(respuesta["serie_EstAcu"]);
                $("#edtSerieAcu").html(respuesta["serieAcu"]);


                $("#idIntegracion").val(respuesta["idIntegracion"]);
                $("#edtNEquipo").val(respuesta["nro_eq"]);
                $("#idIp").val(respuesta["ip"]);
                $("#datResp2").val(respuesta["responsable"]);
                $("#datOfi2").val(respuesta["oficina_in"]);
                $("#datServ2").val(respuesta["servicio_in"]);
                $("#datEst2").val(respuesta["estado"]);
                $("#datCond2").val(respuesta["condicionPC"]);
            }
        });
    }
    else {
        $("#bloquePC2").addClass("d-none");
        $("#bloqueLapServ2").removeClass("d-none");
        var datos2 = new FormData();
        datos2.append("idIntegracion2", idIntegracion);
        $.ajax({
            url: "lib/ajaxIntegraciones.php",
            method: "POST",
            data: datos2,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idIntegracion").val(respuesta["idIntegracion"]);
                $("#edtNEquipo").val(respuesta["nro_eq"]);
                $("#edtTip").val(respuesta["tipo_equipo"]);
                $("#edtTip").html(respuesta["categoria"]);
                $("#idIp").val(respuesta["ip"]);
                $("#edtSerieLap").val(respuesta["idPc"]);
                $("#edtSerieLap").html(respuesta["seriepc"]);
                $("#datResp2").val(respuesta["responsable"]);
                $("#datOfi2").val(respuesta["oficina_in"]);
                $("#datServ2").val(respuesta["servicio_in"]);
                $("#datEst2").val(respuesta["estado"]);
                $("#datCond2").val(respuesta["condicionPC"]);
            }
        });
    }
});

$("#edtSeriePC1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp2").val(data["uResponsable"]);
                $("#datOfi2").val(data["office"]);
                $("#datServ2").val(data["service"]);
                $("#datEst2").val(data["condicion"]);
                $("#datCond2").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp2").val("");
        $("#datOfi2").val("");
        $("#datServ2").val("");
        $("#datEst2").val("");
        $("#datCond2").val("");
    }
});

$("#edtSerieLap1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#datResp2").val(data["uResponsable"]);
                $("#datOfi2").val(data["office"]);
                $("#datServ2").val(data["service"]);
                $("#datEst2").val(data["condicion"]);
                $("#datCond2").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#datResp2").val("");
        $("#datOfi2").val("");
        $("#datServ2").val("");
        $("#datEst2").val("");
        $("#datCond2").val("");
    }
});

$("#edtTip1").on("change", function () {
    let comboTipo = $(this).val();
    if (comboTipo == 1) {
        $("#bloquePC2").removeClass("d-none");
        $("#bloqueLapServ2").addClass("d-none");
        $("#edtNEquipo").val("");
        $("#edtNEquipo").attr("placeholder","Ingresa el nuevo N° de PC");
    }
    else if (comboTipo == 4 || comboTipo == 5) {
        $("#bloquePC2").addClass("d-none");
        $("#bloqueLapServ2").removeClass("d-none");
        $("#edtNEquipo").val("");
        $("#edtNEquipo").attr("placeholder","Ingresa el nuevo N° de Lap o Serv");
    }
    else {
        $("#bloquePC").addClass("d-none");
        $("#bloqueLapServ2").addClass("d-none");
    }
});
$("#edtNEquipo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#edtNEquipo").keyup(function () {
    var edtneq = $(this).val();
    var mayusedtteq = edtneq.toUpperCase();
    $("#edtNEquipo").val(mayusedtteq);
});

$(".tablaIntegraEC tbody").on("click", ".btnAnularIntegraC", function() {
    var idIntegracion = $(this).attr("idIntegracion");
    Swal.fire({
        title: '¿Está seguro de anular la ficha?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, anular ficha!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=integracion-ec&idIntegracion=" + idIntegracion;
        }
    })
});

$(".tablaIntegraEC tbody").on("click", ".btnImprimirFichaC", function() {
    var idIntegracion = $(this).attr("idIntegracion");
    var idTipo = $(this).attr("idTipo");
    // var idTipo = $(this).attr("idTipo");
    window.open("reports/ficha-integra-ec.php?idIntegracion=" + idIntegracion+"&idTipo="+idTipo, "_blank");
});