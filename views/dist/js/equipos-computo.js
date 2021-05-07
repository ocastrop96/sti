var perfilOcultoEqC = $("#pEqCompOculto").val();

$(".tablaEquiposComputo").DataTable({
    ajax: "util/datatable-equipos-computo.php?perfilOcultoEqC=" + perfilOcultoEqC,
    deferRender: true,
    retrieve: true,
    processing: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    order: [
        [1, "asc"]
    ],
    info: true,
    autoWidth: false,
    language: {
        url: "views/dist/js/dataTables.spanish.lang",
    },
});

$("#ecRes").on("change", function () {
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
                $("#ecOfi1").prop("disabled", false);
                $("#ecServ1").prop("disabled", false);
                $("#ecOfi").val(respuesta["idOficina"]);
                $("#ecOfi").html(respuesta["area"]);
                // LISTAR SUBAREAS DE DEPARTAMENTO
                var p_oficina = respuesta["idOficina"];
                $.ajax({
                    type: "POST",
                    url: "lib/comboServicios.php",
                    data: "idOficina=" + p_oficina,
                    success: function (html) {
                        // console.log(html);
                        $("#ecServ1").prop("disabled", false);
                        $("#ecServ1").html(html);
                    },
                });
                // LISTAR SUBAREAS DE DEPARTAMENTO
            }
        });
    } else {
        $("#ecOfi1").prop("disabled", false);
        $("#ecServ1").prop("disabled", false);
        $("#ecOfi").val("0");
        $("#ecOfi").html('Seleccione responsable primero');
        $("#ecServ").val("0");
        $("#ecServ").html('Seleccione responsable primero');
    }
});
$("#ecOfi1").on("change", function () {
    var idOficina = $(this).val();
    if (idOficina > 0) {
        $.ajax({
            type: "POST",
            url: "lib/comboServicios.php",
            data: "idOficina=" + idOficina,
            success: function (html) {
                console.log(html);
                $("#ecServ1").prop("disabled", false);
                $("#ecServ1").html(html);
            },
        });
    } else {
        $("#ecServ1").html('<option value="">Seleccione área primero</option>');
        $("#ecServ1").prop("disabled", true);
    }
});
$("#ecSerie").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#ecSerie").keyup(function () {
    var st1 = $(this).val();
    var mayust1 = st1.toUpperCase();
    $("#ecSerie").val(mayust1);
});

$("#ecSBN").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});

$("#ecMarca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z ]/g, "");
});
$("#ecMarca").keyup(function () {
    var st2 = $(this).val();
    var mayust2 = st2.toUpperCase();
    $("#ecMarca").val(mayust2);
});
$("#ecModelo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\- ]/g, "");
});
$("#ecModelo").keyup(function () {
    var st3 = $(this).val();
    var mayust3 = st3.toUpperCase();
    $("#ecModelo").val(mayust3);
});
$("#ecDescripcion").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#ecDescripcion").keyup(function () {
    var st4 = $(this).val();
    var mayust4 = st4.toUpperCase();
    $("#ecDescripcion").val(mayust4);
});
$("#ecOrden").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#ecOrden").keyup(function () {
    var st5 = $(this).val();
    var mayust5 = st5.toUpperCase();
    $("#ecOrden").val(mayust5);
});

$("#ecFCompra").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9\-]/g, "");
});
$('#ecFCompra').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
$("#ecGarantia").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\u00f1\u00d1 ]/g, "");
});
$("#ecGarantia").keyup(function () {
    var st6 = $(this).val();
    var mayust6 = st6.toUpperCase();
    $("#ecGarantia").val(mayust6);
});
$("#ecPlaca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});

$("#ecPlaca").keyup(function () {
    var st7 = $(this).val();
    var mayust7 = st7.toUpperCase();
    $("#ecPlaca").val(mayust7);
});
$("#ecProcesador").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#ecProcesador").keyup(function () {
    var st8 = $(this).val();
    var mayust8 = st8.toUpperCase();
    $("#ecProcesador").val(mayust8);
});
$("#ecVProc").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\. ]/g, "");
});
$("#ecVProc").keyup(function () {
    var st9 = $(this).val();
    var mayust9 = st9.toUpperCase();
    $("#ecVProc").val(mayust9);
});
$("#ecRAM").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#ecRAM").keyup(function () {
    var st10 = $(this).val();
    var mayust10 = st10.toUpperCase();
    $("#ecRAM").val(mayust10);
});
$("#ecDD").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#ecDD").keyup(function () {
    var st11 = $(this).val();
    var mayust11 = st11.toUpperCase();
    $("#ecDD").val(mayust11);
});
// Bloque de edicion


$(".tablaEquiposComputo tbody").on("click", ".btnEditarEquipoC", function () {
    var idEquipo = $(this).attr("idEquipo");
    var datos = new FormData();

    datos.append("idEquipo", idEquipo);
    $.ajax({
        url: "lib/ajaxEquiposC.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idEquipo").val(respuesta["idEquipo"]);

            $("#edtecCat").val(respuesta["idTipo"]);
            $("#edtecCat").html(respuesta["categoria"]);

            $("#edtecRes").val(respuesta["uResponsable"]);
            $("#edtecRes").html(respuesta["nombresResp"] + " " + respuesta["apellidosResp"]);

            $("#edtecOfi").val(respuesta["office"]);
            $("#edtecOfi").html(respuesta["area"]);

            $("#edtecServ").val(respuesta["service"]);
            $("#edtecServ").html(respuesta["subarea"]);

            $("#edtecSerie").val(respuesta["serie"]);
            $("#edtecSBN").val(respuesta["sbn"]);
            $("#antSerie").val(respuesta["serie"]);
            $("#antSBN").val(respuesta["sbn"]);
            $("#edtecMarca").val(respuesta["marca"]);
            $("#edtecModelo").val(respuesta["modelo"]);
            $("#edtecDescripcion").val(respuesta["descripcion"]);
            $("#edtecOrden").val(respuesta["ordenCompra"]);
            $("#edtecFCompra").val(respuesta["fComp"]);
            $("#edtecGarantia").val(respuesta["garantia"]);
            $("#edtecPlaca").val(respuesta["placa"]);
            $("#edtecProcesador").val(respuesta["procesador"]);
            $("#edtecVProc").val(respuesta["vprocesador"]);
            $("#edtecRAM").val(respuesta["ram"]);
            $("#edtecDD").val(respuesta["discoDuro"]);

            $("#edtecCondicion").val(respuesta["condicion"]);
            $("#edtecCondicion").html(respuesta["situacion"]);

            $("#edtecEstado").val(respuesta["estadoEQ"]);
            $("#edtecEstado").html(respuesta["descEstado"]);
        }
    });
});

$("#edtecRes1").on("change", function () {
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
                $("#edtecOfi").prop("disabled", false);
                $("#edtecServ1").prop("disabled", false);
                $("#edtecOfi").val(respuesta["idOficina"]);
                $("#edtecOfi").html(respuesta["area"]);
                $("#edtecServ").val(respuesta["idServicio"]);
                $("#edtecServ").html(respuesta["subarea"]);
            }
        });
    } else {
        $("#ecOfi1").prop("disabled", false);
        $("#ecServ1").prop("disabled", false);
        $("#ecOfi").val("0");
        $("#ecOfi").html('Seleccione responsable primero');
        $("#ecServ").val("0");
        $("#ecServ").html('Seleccione responsable primero');
    }
});


// Filtros de Editar Datos
$("#edtecFCompra").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9\-]/g, "");
});
$('#edtecFCompra').datepicker({
    'format': 'dd-mm-yyyy',
    'autoclose': true,
    'language': 'es',
    'endDate': new Date(),
});
// Filtros de Editar Datos
$("#edtecSerie").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#edtecSerie").keyup(function () {
    var st11 = $(this).val();
    var mayust11 = st11.toUpperCase();
    $("#edtecSerie").val(mayust11);
});

$("#edtecSBN").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
});

$("#edtecMarca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z ]/g, "");
});
$("#edtecMarca").keyup(function () {
    var st21 = $(this).val();
    var mayust21 = st21.toUpperCase();
    $("#edtecMarca").val(mayust21);
});
$("#edtecModelo").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\- ]/g, "");
});
$("#edtecModelo").keyup(function () {
    var st31 = $(this).val();
    var mayust31 = st31.toUpperCase();
    $("#edtecModelo").val(mayust31);
});
$("#edtecDescripcion").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#edtecDescripcion").keyup(function () {
    var st41 = $(this).val();
    var mayust41 = st41.toUpperCase();
    $("#edtecDescripcion").val(mayust41);
});
$("#edtecOrden").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});
$("#edtecOrden").keyup(function () {
    var st51 = $(this).val();
    var mayust51 = st51.toUpperCase();
    $("#edtecOrden").val(mayust51);
});

$("#edtecGarantia").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\u00f1\u00d1 ]/g, "");
});
$("#edtecGarantia").keyup(function () {
    var st61 = $(this).val();
    var mayust61 = st61.toUpperCase();
    $("#edtecGarantia").val(mayust61);
});
$("#edtecPlaca").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\-]/g, "");
});

$("#edtecPlaca").keyup(function () {
    var st71 = $(this).val();
    var mayust71 = st71.toUpperCase();
    $("#edtecPlaca").val(mayust71);
});
$("#edtecProcesador").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9 ]/g, "");
});
$("#edtecProcesador").keyup(function () {
    var st81 = $(this).val();
    var mayust81 = st81.toUpperCase();
    $("#edtecProcesador").val(mayust81);
});
$("#edtecVProc").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9\. ]/g, "");
});
$("#edtecVProc").keyup(function () {
    var st91 = $(this).val();
    var mayust91 = st91.toUpperCase();
    $("#edtecVProc").val(mayust91);
});
$("#edtecRAM").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#edtecRAM").keyup(function () {
    var st101 = $(this).val();
    var mayust101 = st101.toUpperCase();
    $("#edtecRAM").val(mayust101);
});
$("#edtecDD").keyup(function () {
    this.value = (this.value + "").replace(/[^a-zA-Z0-9]/g, "");
});
$("#edtecDD").keyup(function () {
    var st111 = $(this).val();
    var mayust111 = st111.toUpperCase();
    $("#edtecDD").val(mayust111);
});

// Eliminar EquiposC
$(".tablaEquiposComputo tbody").on("click", ".btnEliminarEquipoC", function () {
    var idEquipo = $(this).attr("idEquipo");
    Swal.fire({
        title: '¿Está seguro de eliminar el equipo de Cómputo?',
        text: "¡Si no lo está, puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar equipo!'
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=equipos-computo&idEquipo=" + idEquipo;
        }
    })
});
// Eliminar EquiposC.
// Validar campos
$.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
// btnRegistrarResponsable
$("#btnRegEqComputo").on("click", function () {
    $("#formRegEqComputo").validate({
        rules: {
            ecCat: {
                valueNotEquals: "0",
                required: true,
            },
            ecRes: {
                valueNotEquals: "0",
                required: true,
            },
            ecOfi: {
                valueNotEquals: "0",
                required: true,
            },
            ecServ: {
                valueNotEquals: "0",
                required: true,
            },
            ecSerie: {
                required: true,
            },
            ecSBN: {
                required: true,
            },
            ecMarca: {
                required: true,
            },
            ecModelo: {
                required: true,
            },
            ecDescripcion: {
                required: true,
            },
            ecOrden: {
                required: true,
            },
            ecFCompra: {
                required: true,
            },
            ecGarantia: {
                required: true,
            },
            ecPlaca: {
                required: true,
            },
            ecProcesador: {
                required: true,
            },
            ecVProc: {
                required: true,
            },
            ecRAM: {
                required: true,
            },
            ecDD: {
                required: true,
            },
            ecCondicion: {
                valueNotEquals: "0",
                required: true,
            },
            ecEstado: {
                valueNotEquals: "0",
                required: true,
            },
        },
        messages: {
            ecCat: {
                valueNotEquals: "Seleccione Categoría",
                required: "Dato querido",
            },
            ecRes: {
                valueNotEquals: "Seleccione U. Responsable",
                required: "Dato querido",
            },
            ecOfi: {
                valueNotEquals: "Seleccione Oficina",
                required: "Dato querido",
            },
            ecServ: {
                valueNotEquals: "Seleccione Servicio",
                required: "Dato querido",
            },
            ecSerie: {
                required: "Ingrese dato requerido",
            },
            ecSBN: {
                required: "Ingrese dato requerido",
            },
            ecMarca: {
                required: "Ingrese dato requerido",
            },
            ecModelo: {
                required: "Ingrese dato requerido",
            },
            ecDescripcion: {
                required: "Ingrese dato requerido",
            },
            ecOrden: {
                required: "Ingrese dato requerido",
            },
            ecFCompra: {
                required: "Ingrese dato requerido",
            },
            ecGarantia: {
                required: "Ingrese dato requerido",
            },
            ecPlaca: {
                required: "Ingrese dato requerido",
            },
            ecProcesador: {
                required: "Ingrese dato requerido",
            },
            ecVProc: {
                required: "Ingrese dato requerido",
            },
            ecRAM: {
                required: "Ingrese dato requerido",
            },
            ecDD: {
                required: "Ingrese dato requerido",
            },
            ecCondicion: {
                valueNotEquals: "Seleccione condición",
                required: true,
            },
            ecEstado: {
                valueNotEquals: "Seleccione Estado",
                required: true,
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
$("#btnEdtEqComputo").on("click", function () {
    $("#formEdtEqComputo").validate({
        rules: {
            edtecCat: {
                valueNotEquals: "0",
                required: true,
            },
            edtecRes: {
                valueNotEquals: "0",
                required: true,
            },
            edtecOfi: {
                valueNotEquals: "0",
                required: true,
            },
            edtecServ: {
                valueNotEquals: "0",
                required: true,
            },
            edtecSerie: {
                required: true,
            },
            edtecSBN: {
                required: true,
            },
            edtecMarca: {
                required: true,
            },
            edtecModelo: {
                required: true,
            },
            edtecDescripcion: {
                required: true,
            },
            edtecOrden: {
                required: true,
            },
            edtecFCompra: {
                required: true,
            },
            edtecGarantia: {
                required: true,
            },
            edtecPlaca: {
                required: true,
            },
            edtecProcesador: {
                required: true,
            },
            edtecVProc: {
                required: true,
            },
            edtecRAM: {
                required: true,
            },
            edtecDD: {
                required: true,
            },
            edtecCondicion: {
                valueNotEquals: "0",
                required: true,
            },
            edtecEstado: {
                valueNotEquals: "0",
                required: true,
            },
        },
        messages: {
            edtecCat: {
                valueNotEquals: "Seleccione Categoría",
                required: "Dato querido",
            },
            edtecRes: {
                valueNotEquals: "Seleccione U. Responsable",
                required: "Dato querido",
            },
            edtecOfi: {
                valueNotEquals: "Seleccione Oficina",
                required: "Dato querido",
            },
            edtecServ: {
                valueNotEquals: "Seleccione Servicio",
                required: "Dato querido",
            },
            edtecSerie: {
                required: "Ingrese dato requerido",
            },
            edtecSBN: {
                required: "Ingrese dato requerido",
            },
            edtecMarca: {
                required: "Ingrese dato requerido",
            },
            edtecModelo: {
                required: "Ingrese dato requerido",
            },
            edtecDescripcion: {
                required: "Ingrese dato requerido",
            },
            edtecOrden: {
                required: "Ingrese dato requerido",
            },
            edtecFCompra: {
                required: "Ingrese dato requerido",
            },
            edtecGarantia: {
                required: "Ingrese dato requerido",
            },
            edtecPlaca: {
                required: "Ingrese dato requerido",
            },
            edtecProcesador: {
                required: "Ingrese dato requerido",
            },
            edtecVProc: {
                required: "Ingrese dato requerido",
            },
            edtecRAM: {
                required: "Ingrese dato requerido",
            },
            edtecDD: {
                required: "Ingrese dato requerido",
            },
            edtecCondicion: {
                valueNotEquals: "Seleccione condición",
                required: true,
            },
            edtecEstado: {
                valueNotEquals: "Seleccione Estado",
                required: true,
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
// Validar Series y SBN
$("#ecSerie").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var serie1 = $(this).val();
    var datos = new FormData();
    datos.append("validarSerie", serie1);
    $.ajax({
        url: "lib/ajaxEquiposC.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                Toast.fire({
                    icon: "warning",
                    title: "El número de serie ingresado ya se encuentra registrado",
                });
                $("#ecSerie").val("");
                $("#ecSerie").focus();
            } else {
                $("#ecSBN").focus();
            }
        },
    });
});
$("#edtecSerie").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var serie1 = $(this).val();
    var a = $("#antSerie").val();

    if (serie1 != a) {
        var datos = new FormData();
        datos.append("validarSerie", serie1);
        $.ajax({
            url: "lib/ajaxEquiposC.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta) {
                    Toast.fire({
                        icon: "warning",
                        title: "El número de serie ingresado ya se encuentra registrado",
                    });
                    $("#edtecSerie").val("");
                    $("#edtecSerie").focus();
                } else {
                    $("#edtecSBN").focus();
                }
            },
        });
    }
});
$("#ecSBN").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var serie2 = $(this).val();
    var datos2 = new FormData();
    datos2.append("validarSBN", serie2);
    $.ajax({
        url: "lib/ajaxEquiposC.php",
        method: "POST",
        data: datos2,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                Toast.fire({
                    icon: "warning",
                    title: "El número de SBN ingresado ya se encuentra registrado",
                });
                $("#ecSBN").val("");
                $("#ecSBN").focus();
            } else {
                $("#ecMarca").focus();
            }
        },
    });
});
$("#edtecSBN").focusout(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    var serie2 = $(this).val();
    var b = $("#antSBN").val();

    if (serie2 != b) {
        var datos2 = new FormData();
        datos2.append("validarSBN", serie2);
        $.ajax({
            url: "lib/ajaxEquiposC.php",
            method: "POST",
            data: datos2,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta) {
                    Toast.fire({
                        icon: "warning",
                        title: "El número de SBN ingresado ya se encuentra registrado",
                    });
                    $("#edtecSBN").val("");
                    $("#edtecSBN").focus();
                } else {
                    $("#edtecMarca").focus();
                }
            },
        });
    }
});