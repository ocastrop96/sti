$(".tablaIntegraEP").DataTable({
    ajax: "util/datatable-integra-ep.php",
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

$("#nroImp").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9_]/g, "");
});
$("#nroImp").keyup(function () {
    var nImp = $(this).val();
    var mayusnImp = nImp.toUpperCase();
    $("#nroImp").val(mayusnImp);
});
$("#serieImp").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#impResp").val(data["uResponsable"]);
                $("#impOfi").val(data["office"]);
                $("#impServ").val(data["service"]);
                $("#impEst").val(data["condicion"]);
                $("#impCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#impResp").val("");
        $("#impOfi").val("");
        $("#impServ").val("");
        $("#impEst").val("");
        $("#impCond").val("");
    }
});

$(".tablaIntegraEP tbody").on("click", ".btnEditarIntegraEP", function () {
    var idIntegracion = $(this).attr("idIntegracion");

    var datos = new FormData();
    datos.append("idIntegracion3", idIntegracion);

    $.ajax({
        url: "lib/ajaxIntegraciones.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#edtEqImp").val(respuesta["tipo_equipo"]);
            $("#edtEqImp").html(respuesta["detaCategoria"]);
            $("#edtserieImp").val(respuesta["idimp"]);
            $("#edtserieImp").html(respuesta["serieimp"]);
            $("#idIntegracion").val(respuesta["idIntegracion"]);
            $("#edtnroImp").val(respuesta["nro_eq"]);
            $("#edtip_imp").val(respuesta["ip"]);
            $("#edtimpResp").val(respuesta["responsable"]);
            $("#edtimpOfi").val(respuesta["oficina_in"]);
            $("#edtimpServ").val(respuesta["servicio_in"]);
            $("#edtimpEst").val(respuesta["estado"]);
            $("#edtimpCond").val(respuesta["condicionPC"]);
        }
    });
});

$("#edtserieImp1").on("change", function () {
    var idEquipo = $(this).val();
    if (idEquipo > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboDatosSerie.php",
            data: "idEquipo=" + idEquipo,
            cache: false,
            dataType: "json",
            success: function (data) {
                $("#edtimpResp").val(data["uResponsable"]);
                $("#edtimpOfi").val(data["office"]);
                $("#edtimpServ").val(data["service"]);
                $("#edtimpEst").val(data["condicion"]);
                $("#edtimpCond").val(data["estadoEQ"]);
            },
        });
    } else {
        $("#edtimpResp").val("");
        $("#edtimpOfi").val("");
        $("#edtimpServ").val("");
        $("#edtimpEst").val("");
        $("#edtimpCond").val("");
    }
});

$("#edtEqImp1").on("change", function () {
    $("#edtnroImp").val("");
    $("#edtnroImp").attr("placeholder", "Ingresa el nuevo N° de Imp");
});

$(".tablaIntegraEP tbody").on("click", ".btnAnularIntegraEP", function() {
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
            window.location = "index.php?ruta=integracion-ep&idIntegracion=" + idIntegracion;
        }
    })
});

$(".tablaIntegraEP tbody").on("click", ".btnImprimirFichaEP", function() {
    var idIntegracion = $(this).attr("idIntegracion");
    window.open("reports/ficha-integra-imp.php?idIntegracion=" + idIntegracion, "_blank");
});