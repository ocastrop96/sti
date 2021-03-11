$(".tablaEquiposRedes").DataTable({
    ajax: "util/datatable-equipos-redes.php",
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
// Datos registra Equipo de redes
$("#erRes1").on("change", function () {
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
                $("#erOficina1").prop("disabled", false);
                $("#erServ1").prop("disabled", false);
                $("#erOficina").val(respuesta["idOficina"]);
                $("#erOficina").html(respuesta["area"]);
                $("#erServ").val(respuesta["idServicio"]);
                $("#erServ").html(respuesta["subarea"]);
            }
        });
    } else {
        $("#erOficina1").prop("disabled", false);
        $("#erServ1").prop("disabled", false);
        $("#erOficina").val("0");
        $("#erOficina").html('Seleccione responsable primero');
        $("#erServ").val("0");
        $("#erServ").html('Seleccione responsable primero');
    }
});

$("#erFCompra").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9\-]/g, "");
});
$('#erFCompra').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});

$("#erSerie").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#erSerie").keyup(function () {
    var st211 = $(this).val();
    var mayust211 = st211.toUpperCase();
    $("#erSerie").val(mayust211);
});

$("#erSBN").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});

$("#erMarca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z]/g, "");
});
$("#erMarca").keyup(function () {
    var st221 = $(this).val();
    var mayust221 = st221.toUpperCase();
    $("#erMarca").val(mayust221);
});
$("#erModelo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\- ]/g, "");
});
$("#erModelo").keyup(function () {
    var st321 = $(this).val();
    var mayust321 = st321.toUpperCase();
    $("#erModelo").val(mayust321);
});
$("#erDescrip").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#erDescrip").keyup(function () {
    var st421 = $(this).val();
    var mayust421 = st421.toUpperCase();
    $("#erDescrip").val(mayust421);
});
$("#erOrden").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#erOrden").keyup(function () {
    var st521 = $(this).val();
    var mayust521 = st521.toUpperCase();
    $("#erOrden").val(mayust521);
});
$("#erGarantia").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\u00f1\u00d1 ]/g, "");
});
$("#erGarantia").keyup(function () {
    var st621 = $(this).val();
    var mayust621 = st621.toUpperCase();
    $("#erGarantia").val(mayust621);
});
$("#erPuertos").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#erPuertos").keyup(function () {
    var st721 = $(this).val();
    var mayust721 = st721.toUpperCase();
    $("#erPuertos").val(mayust721);
});
$("#erCapa").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#erCapa").keyup(function () {
    var st821 = $(this).val();
    var mayust821 = st821.toUpperCase();
    $("#erCapa").val(mayust821);
});
// Datos registra Equipo de redes

// Datos Edita Equipo de redes
$("#edtrRes1").on("change", function () {
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
                $("#edtrOficina1").prop("disabled", false);
                $("#edtrServ1").prop("disabled", false);
                $("#edtrOficina").val(respuesta["idOficina"]);
                $("#edtrOficina").html(respuesta["area"]);
                $("#edtrServ").val(respuesta["idServicio"]);
                $("#edtrServ").html(respuesta["subarea"]);
            }
        });
    } else {
        $("#edtrOficina1").prop("disabled", false);
        $("#edtrServ1").prop("disabled", false);
        $("#edtrOficina").val("0");
        $("#edtrOficina").html('Seleccione responsable primero');
        $("#edtrServ").val("0");
        $("#edtrServ").html('Seleccione responsable primero');
    }
});
$("#edtrFCompra").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9\-]/g, "");
});
$('#edtrFCompra').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});

$(".tablaEquiposRedes tbody").on("click", ".btnEditarEquipoR", function () {
    var idEquipo = $(this).attr("idEquipo");
    var datos = new FormData();

    datos.append("idEquipo", idEquipo);
    $.ajax({
        url: "lib/ajaxEquiposR.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idEquipo").val(respuesta["idEquipo"]);

            $("#edtrCat").val(respuesta["idTipo"]);
            $("#edtrCat").html(respuesta["categoria"]);

            $("#edtrRes").val(respuesta["uResponsable"]);
            $("#edtrRes").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);

            $("#edtrOficina").val(respuesta["office"]);
            $("#edtrOficina").html(respuesta["area"]);

            $("#edtrServ").val(respuesta["service"]);
            $("#edtrServ").html(respuesta["subarea"]);

            $("#edtrSerie").val(respuesta["serie"]);
            $("#edtrSBN").val(respuesta["sbn"]);
            $("#edtrMarca").val(respuesta["marca"]);
            $("#edtrModelo").val(respuesta["modelo"]);
            $("#edtrDescrip").val(respuesta["descripcion"]);
            $("#edtrOrden").val(respuesta["ordenCompra"]);
            $("#edtrFCompra").val(respuesta["fComp"]);
            $("#edtrGarantia").val(respuesta["garantia"]);
            $("#edtrPuertos").val(respuesta["puertos"]);
            $("#edtrCapa").val(respuesta["capa"]);

            $("#edtrCond").val(respuesta["condicion"]);
            $("#edtrCond").html(respuesta["situacion"]);

            $("#edtrEstado").val(respuesta["estadoEQ"]);
            $("#edtrEstado").html(respuesta["descEstado"]);
        }
    });
});

$("#edtrSerie").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#edtrSerie").keyup(function () {
    var st212 = $(this).val();
    var mayust212 = st212.toUpperCase();
    $("#edtrSerie").val(mayust212);
});

$("#edtrSBN").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});

$("#edtrMarca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z]/g, "");
});
$("#edtrMarca").keyup(function () {
    var st222 = $(this).val();
    var mayust222 = st222.toUpperCase();
    $("#edtrMarca").val(mayust222);
});
$("#edtrModelo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\- ]/g, "");
});
$("#edtrModelo").keyup(function () {
    var st322 = $(this).val();
    var mayust322 = st322.toUpperCase();
    $("#edtrModelo").val(mayust322);
});
$("#edtrDescrip").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#edtrDescrip").keyup(function () {
    var st422 = $(this).val();
    var mayust422 = st422.toUpperCase();
    $("#edtrDescrip").val(mayust422);
});
$("#edtrOrden").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#edtrOrden").keyup(function () {
    var st522 = $(this).val();
    var mayust522 = st522.toUpperCase();
    $("#edtrOrden").val(mayust522);
});
$("#edtrGarantia").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\u00f1\u00d1 ]/g, "");
});
$("#edtrGarantia").keyup(function () {
    var st622 = $(this).val();
    var mayust622 = st622.toUpperCase();
    $("#edtrGarantia").val(mayust622);
});
$("#edtrPuertos").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#edtrPuertos").keyup(function () {
    var st722 = $(this).val();
    var mayust722 = st722.toUpperCase();
    $("#edtrPuertos").val(mayust722);
});
$("#edtrCapa").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#edtrCapa").keyup(function () {
    var st822 = $(this).val();
    var mayust822 = st822.toUpperCase();
    $("#edtrCapa").val(mayust822);
});
// Datos Edita Equipo de redes

// Eliminar EquiposP
$(".tablaEquiposRedes tbody").on("click", ".btnEliminarEquipoR", function() {
    var idEquipo = $(this).attr("idEquipo");
    Swal.fire({
        title: '¿Está seguro de eliminar el equipo de Red y Telecomunicaciones?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar equipo!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=equipos-redes&idEquipo=" + idEquipo;
        }
    })
});
// Eliminar EquiposP