$(".tablaIntegraER").DataTable({
    ajax: "util/datatable-integra-er.php",
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
    },
});
$('[data-mask]').inputmask();
$("#nroERed").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#nroERed").keyup(function () {
    var nRed = $(this).val();
    var mayusnRED = nRed.toUpperCase();
    $("#nroERed").val(mayusnRED);
});
$("#serieERed").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#erResp").val(data["uResponsable"]);
                $("#erOfi").val(data["office"]);
                $("#erServ").val(data["service"]);
                $("#erEst").val(data["condicion"]);
                $("#erCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#erResp").val("");
        $("#erOfi").val("");
        $("#erServ").val("");
        $("#erEst").val("");
        $("#erCond").val("");
    }
});


$(".tablaIntegraER tbody").on("click", ".btnEditarIntegraER", function () {
    var idIntegracion = $(this).attr("idIntegracion");

    var datos = new FormData();
    datos.append("idIntegracion4", idIntegracion);

    $.ajax({
        url: "lib/ajaxIntegraciones.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#edtEqRed").val(respuesta["tipo_equipo"]);
            $("#edtEqRed").html(respuesta["detaCategoria"]);
            $("#edtserieERed").val(respuesta["idEqRed"]);
            $("#edtserieERed").html(respuesta["serieEqRed"]);
            $("#idIntegracion").val(respuesta["idIntegracion"]);
            $("#edtnroERed").val(respuesta["nro_eq"]);
            $("#edtipERed").val(respuesta["ip"]);
            $("#edtResp").val(respuesta["responsable"]);
            $("#edtOfi").val(respuesta["oficina_in"]);
            $("#edtServ").val(respuesta["servicio_in"]);
            $("#edtEst").val(respuesta["estado"]);
            $("#edtCond").val(respuesta["condicionPC"]);
        }
    });
});

$("#edtserieERed1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#edtResp").val(data["uResponsable"]);
                $("#edtOfi").val(data["office"]);
                $("#edtServ").val(data["service"]);
                $("#edtEst").val(data["condicion"]);
                $("#edtCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#edtResp").val("");
        $("#edtOfi").val("");
        $("#edtServ").val("");
        $("#edtEst").val("");
        $("#edtCond").val("");
    }
});
$("#edtEqRed1").on("change", function () {
    $("#edtnroERed").val("");
    $("#edtnroERed").attr("placeholder", "Ingresa el nuevo N°");
});
$(".tablaIntegraER tbody").on("click", ".btnAnularIntegraER", function() {
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
            window.location = "index.php?ruta=integracion-er&idIntegracion=" + idIntegracion;
        }
    })
});
$(".tablaIntegraER tbody").on("click", ".btnImprimirFichaER", function() {
    var idIntegracion = $(this).attr("idIntegracion");
    window.open("reports/ficha-integra-er.php?idIntegracion=" + idIntegracion, "_blank");
});