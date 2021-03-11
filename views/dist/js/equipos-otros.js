$(".tablaEquiposOtros").DataTable({
    ajax: "util/datatable-equipos-otros.php",
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
// Bloque de Registro de Periferico y Otros
$("#epoSerie").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#epoSerie").keyup(function () {
    var st21 = $(this).val();
    var mayust21 = st21.toUpperCase();
    $("#epoSerie").val(mayust21);
});

$("#epoSBN").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});

$("#epoMarca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z]/g, "");
});
$("#epoMarca").keyup(function () {
    var st22 = $(this).val();
    var mayust22 = st22.toUpperCase();
    $("#epoMarca").val(mayust22);
});
$("#epoModelo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\- ]/g, "");
});
$("#epoModelo").keyup(function () {
    var st32 = $(this).val();
    var mayust32 = st32.toUpperCase();
    $("#epoModelo").val(mayust32);
});
$("#epoDescripcion").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#epoDescripcion").keyup(function () {
    var st42 = $(this).val();
    var mayust42 = st42.toUpperCase();
    $("#epoDescripcion").val(mayust42);
});
$("#epoOrden").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#epoOrden").keyup(function () {
    var st52 = $(this).val();
    var mayust52 = st52.toUpperCase();
    $("#epoOrden").val(mayust52);
});

$("#epoFCompra").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9\-]/g, "");
});
$('#epoFCompra').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
$("#epoGarantia").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\u00f1\u00d1 ]/g, "");
});
$("#epoGarantia").keyup(function () {
    var st62 = $(this).val();
    var mayust62 = st62.toUpperCase();
    $("#epoGarantia").val(mayust62);
});
$("#epoRes").on("change", function () {
    var idResponsable = $(this).val();
    if (idResponsable > 0) {
        var datos = new FormData();

        datos.append("idResponsable", idResponsable);
        $.ajax({
            url: "lib/ajaxResponsables.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#epoOfi1").prop("disabled", false);
                $("#epoServ1").prop("disabled", false);
                $("#epoOfi").val(respuesta["idOficina"]);
                $("#epoOfi").html(respuesta["area"]);
                $("#epoServ").val(respuesta["idServicio"]);
                $("#epoServ").html(respuesta["subarea"]);
            }
        });
    } else {
        $("#epoOfi1").prop("disabled", false);
        $("#epoServ1").prop("disabled", false);
        $("#epoOfi").val("0");
        $("#epoOfi").html('Seleccione responsable primero');
        $("#epoServ").val("0");
        $("#epoServ").html('Seleccione responsable primero');
    }
});
// Bloque de Registro de Periferico y Otros

// Bloque de Edición de Periferico y Otros
$(".tablaEquiposOtros tbody").on("click", ".btnEditarEquipoP", function () {
    var idEquipo = $(this).attr("idEquipo");
    var datos = new FormData();

    datos.append("idEquipo", idEquipo);
    $.ajax({
        url: "lib/ajaxEquiposPO.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idEquipo").val(respuesta["idEquipo"]);

            $("#edtpoCat").val(respuesta["idTipo"]);
            $("#edtpoCat").html(respuesta["categoria"]);

            $("#edtpoRes").val(respuesta["uResponsable"]);
            $("#edtpoRes").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);

            $("#edtpoOfi").val(respuesta["office"]);
            $("#edtpoOfi").html(respuesta["area"]);

            $("#edtpoServ").val(respuesta["service"]);
            $("#edtpoServ").html(respuesta["subarea"]);

            $("#edtpoSerie").val(respuesta["serie"]);
            $("#edtpoSBN").val(respuesta["sbn"]);
            $("#edtpoMarca").val(respuesta["marca"]);
            $("#edtpoModelo").val(respuesta["modelo"]);
            $("#edtpoDescripcion").val(respuesta["descripcion"]);
            $("#edtpoOrden").val(respuesta["ordenCompra"]);
            $("#edtpoFCompra").val(respuesta["fComp"]);
            $("#edtpoGarantia").val(respuesta["garantia"]);

            $("#edtpoCondicion").val(respuesta["condicion"]);
            $("#edtpoCondicion").html(respuesta["situacion"]);

            $("#epdtoEstado").val(respuesta["estadoEQ"]);
            $("#epdtoEstado").html(respuesta["descEstado"]);
        }
    });
});
$("#edtpoRes1").on("change", function () {
    var idResponsable1 = $(this).val();
    if (idResponsable1 > 0) {
        var datos1 = new FormData();

        datos1.append("idResponsable", idResponsable1);
        $.ajax({
            url: "lib/ajaxResponsables.php",
            method: "POST",
            data: datos1,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#edtpoOfi1").prop("disabled", false);
                $("#edtpoServ1").prop("disabled", false);
                $("#edtpoOfi").val(respuesta["idOficina"]);
                $("#edtpoOfi").html(respuesta["area"]);
                $("#edtpoServ").val(respuesta["idServicio"]);
                $("#edtpoServ").html(respuesta["subarea"]);
            }
        });
    } else {
        $("#edtpoOfi1").prop("disabled", false);
        $("#edtpoServ1").prop("disabled", false);
        $("#edtpoOfi").val("0");
        $("#edtpoOfi").html('Seleccione responsable primero');
        $("#edtpoServ").val("0");
        $("#edtpoServ").html('Seleccione responsable primero');
    }
});


$("#edtpoSerie").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#edtpoSerie").keyup(function () {
    var st212 = $(this).val();
    var mayust212 = st212.toUpperCase();
    $("#edtpoSerie").val(mayust212);
});

$("#edtpoSBN").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});

$("#edtpoMarca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z]/g, "");
});
$("#edtpoMarca").keyup(function () {
    var st222 = $(this).val();
    var mayust222 = st222.toUpperCase();
    $("#edtpoMarca").val(mayust222);
});
$("#edtpoModelo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\- ]/g, "");
});
$("#edtpoModelo").keyup(function () {
    var st322 = $(this).val();
    var mayust322 = st322.toUpperCase();
    $("#edtpoModelo").val(mayust322);
});
$("#edtpoDescripcion").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#edtpoDescripcion").keyup(function () {
    var st422 = $(this).val();
    var mayust422 = st422.toUpperCase();
    $("#edtpoDescripcion").val(mayust422);
});
$("#edtpoOrden").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#edtpoOrden").keyup(function () {
    var st522 = $(this).val();
    var mayust522 = st522.toUpperCase();
    $("#edtpoOrden").val(mayust522);
});

$("#edtpoFCompra").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9\-]/g, "");
});
$('#edtpoFCompra').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
$("#edtpoGarantia").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\u00f1\u00d1 ]/g, "");
});
$("#edtpoGarantia").keyup(function () {
    var st622 = $(this).val();
    var mayust622 = st622.toUpperCase();
    $("#edtpoGarantia").val(mayust622);
});
// Bloque de Edición de Periferico y Otros

// Eliminar EquiposP
$(".tablaEquiposOtros tbody").on("click", ".btnEliminarEquipoP", function() {
    var idEquipo = $(this).attr("idEquipo");
    Swal.fire({
        title: '¿Está seguro de eliminar el equipo periférico?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar equipo!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=equipos-otros&idEquipo=" + idEquipo;
        }
    })
});
// Eliminar EquiposP