// Inicializador de campos
toastr.options = {
  closeButton: true,
  debug: false,
  newestOnTop: true,
  progressBar: true,
  positionClass: "toast-top-left",
  preventDuplicates: true,
  onclick: null,
  showDuration: "100",
  hideDuration: "300",
  timeOut: "1500",
  extendedTimeOut: "100",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};
$("#logCuenta").focus();
// Validar Existencia de Usuario
$("#logCuenta").change(function () {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
  });
  var cuenta = $(this).val();
  var datos = new FormData();

  datos.append("validarCuentaLog", cuenta);

  $.ajax({
    url: "lib/ajaxUsuarios.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $("#logClave").focus();
      } else {
        $("#logCuenta").val("");
        $("#logCuenta").focus();
        Toast.fire({
          icon: "error",
          title: "La cuenta ingresada no existe",
        });
      }
    },
  });
});
var perfilOcultoUs = $("#pUsuOculto").val();
// Cargar tabla con ajax
$(".tablaUsuarios").DataTable({
  ajax: "util/datatable-usuarios.php?pUsuOculto=" + perfilOcultoUs,
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
// Validar dni existente en caso de nuevos ingresos y validar dni
$("#dniUsuario").change(function () {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
  });
  var dni = $(this).val();
  var datos = new FormData();
  datos.append("validarDni", dni);
  $.ajax({
    url: "lib/ajaxUsuarios.php",
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
          title: "El DNI Ingresado ya se encuentra registrado",
        });
        $("#dniUsuario").val("");
        $("#nombreUsuario").val("");
        $("#apellidoUsuarioPat").val("");
        $("#apellidoUsuarioMat").val("");
      } else {
        $("#nombreUsuario").val("");
        $("#apellidoUsuarioPat").val("");
        $("#apellidoUsuarioMat").val("");
        $("#btnDNIU").on("click", function () {
          var dni = $("#dniUsuario").val();
          $.ajax({
            type: "GET",
            url:
              "https://dniruc.apisperu.com/api/v1/dni/" +
              dni +
              "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9jYXN0cm9wLnRpQGdtYWlsLmNvbSJ9.XtrYx8wlARN2XZwOZo6FeLuYDFT6Ljovf7_X943QC_E",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
              $("#nombreUsuario").val(data["nombres"]);
              $("#apellidoUsuarioPat").val(data["apellidoPaterno"]);
              $("#apellidoUsuarioMat").val(data["apellidoMaterno"]);
              $("#perfilUsuario").focus();
              $("#nombreUsuario").prop("readonly", true);
              $("#apellidoUsuarioPat").prop("readonly", true);
              $("#apellidoUsuarioMat").prop("readonly", true);
            },
            failure: function (data) {
              toastr.info("No se pudo conectar los datos", "DNI");
            },
            error: function (data) {
              $("#nombreUsuario").prop("readonly", false);
              $("#apellidoUsuarioPat").prop("readonly", false);
              $("#apellidoUsuarioMat").prop("readonly", false);
              $("#dniUsuario").focus();
              $('#form-reg-usuario').trigger("reset");
              // toastr.info("Ingresa tus nombres y apellidos", "Datos del Usuario");
            },
          });
        });
      }
    },
  });
});
$("#dniUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^0-9]/g, "");
});
// $("#dniUsuario").attr("minlenght", 12);
$("#dniUsuario").attr("maxlength", "8");

$("#edtdniUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^0-9]/g, "");
});
// $("#dniUsuario").attr("minlenght", 12);
$("#edtdniUsuario").attr("maxlength", "8");

$("#nombreUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});
$("#nombreUsuario").keyup(function () {
  var u1 = $(this).val();
  var mu1 = u1.toUpperCase();
  $("#nombreUsuario").val(mu1);
});
$("#edtnombreUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});
$("#apellidoUsuarioPat").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});
$("#apellidoUsuarioPat").keyup(function () {
  var u2 = $(this).val();
  var mu2 = u2.toUpperCase();
  $("#apellidoUsuarioPat").val(mu2);
});
$("#edtapellidoUsuarioPat").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});
$("#apellidoUsuarioMat").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});
$("#apellidoUsuarioMat").keyup(function () {
  var u3 = $(this).val();
  var mu3 = u3.toUpperCase();
  $("#apellidoUsuarioMat").val(mu3);
});
$("#edtapellidoUsuarioMat").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]/g, "");
});

$("#cuentaUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z\u00f1\u00d1]/g, "");
});
$("#cuentaUsuario").keyup(function () {
  var u4 = $(this).val();
  var mu4 = u4.toLowerCase();
  $("#cuentaUsuario").val(mu4);
});
$("#edtcuentaUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z\u00f1\u00d1]/g, "");
});
$("#edtcuentaUsuario").keyup(function () {
  var u4edt = $(this).val();
  var mu4edt = u4edt.toLowerCase();
  $("#edtcuentaUsuario").val(mu4edt);
});
// Editar Usuario
// $.getJSON('https://api.ipify.org?format=json', function (data) {
//   console.log(data);
// });

$("#perfilUsuario,#edtperfilUsuario").change(function () {
  var name1 = $("#nombreUsuario").val();
  var name2 = $("#apellidoUsuarioPat").val();
  var name3 = $("#apellidoUsuarioMat").val();

  var rechange1 = name1
    .toLowerCase()
    .trim()
    .split(" ")
    .map((v) => v[0].toUpperCase() + v.substr(1))
    .join(" ");
  var rechange2 = name2
    .toLowerCase()
    .trim()
    .split(" ")
    .map((v) => v[0].toUpperCase() + v.substr(1))
    .join(" ");
  var rechange3 = name3
    .toLowerCase()
    .trim()
    .split(" ")
    .map((v) => v[0].toUpperCase() + v.substr(1))
    .join(" ");
  $("#nombreUsuario").val(rechange1);
  $("#apellidoUsuarioPat").val(rechange2);
  $("#apellidoUsuarioMat").val(rechange3);
});

$("#edtperfilUsuario1").change(function () {
  var name4 = $("#edtnombreUsuario").val();
  var name5 = $("#edtapellidoUsuarioPat").val();
  var name6 = $("#edtapellidoUsuarioMat").val();

  var rechange4 = name4
    .toLowerCase()
    .trim()
    .split(" ")
    .map((v) => v[0].toUpperCase() + v.substr(1))
    .join(" ");
  var rechange5 = name5
    .toLowerCase()
    .trim()
    .split(" ")
    .map((v) => v[0].toUpperCase() + v.substr(1))
    .join(" ");
  var rechange6 = name6
    .toLowerCase()
    .trim()
    .split(" ")
    .map((v) => v[0].toUpperCase() + v.substr(1))
    .join(" ");

  $("#edtnombreUsuario").val(rechange4);
  $("#edtapellidoUsuarioPat").val(rechange5);
  $("#edtapellidoUsuarioMat").val(rechange6);
});

$(".tablaUsuarios tbody").on("click", ".btnEditarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");

  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    url: "lib/ajaxUsuarios.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var idPerfil = respuesta["id_perfil"];
      var dato1 = new FormData();

      dato1.append("idPerfil", idPerfil);
      $.ajax({
        url: "lib/ajaxPerfiles.php",
        method: "POST",
        data: dato1,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          $("#edtperfilUsuario").val(respuesta["id_perfil"]);
          $("#edtperfilUsuario").html(respuesta["perfil"]);
        },
      });

      $("#idUsuario").val(respuesta["id_usuario"]);
      $("#edtdniUsuario").val(respuesta["dni"]);
      $("#edtnombreUsuario").val(respuesta["nombres"]);
      $("#edtapellidoUsuarioPat").val(respuesta["apellido_paterno"]);
      $("#edtapellidoUsuarioMat").val(respuesta["apellido_materno"]);
      $("#edtcuentaUsuario").val(respuesta["cuenta"]);
      $("#passwordActual").val(respuesta["clave"]);
    },
  });
});
// Validar dni existente en caso de nuevos ingresos y validar dni
$("#edtdniUsuario").change(function () {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
  });
  var dni = $(this).val();
  var datos = new FormData();
  datos.append("validarDni", dni);
  $.ajax({
    url: "lib/ajaxUsuarios.php",
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
          title: "El DNI Ingresado ya se encuentra registrado",
        });
        $("#edtdniUsuario").val("");
        $("#edtnombreUsuario").val("");
        $("#edtapellidoUsuarioPat").val("");
        $("#edtapellidoUsuarioMat").val("");
      } else {
        $("#btnEdtDNIU").on("click", function () {
          var dni = $("#edtdniUsuario").val();
          $.ajax({
            type: "GET",
            url:
              "https://dniruc.apisperu.com/api/v1/dni/" +
              dni +
              "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9jYXN0cm9wLnRpQGdtYWlsLmNvbSJ9.XtrYx8wlARN2XZwOZo6FeLuYDFT6Ljovf7_X943QC_E",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
              $("#edtnombreUsuario").val(data["nombres"]);
              $("#edtapellidoUsuarioPat").val(data["apellidoPaterno"]);
              $("#edtapellidoUsuarioMat").val(data["apellidoMaterno"]);
              $("#edtperfilUsuario1").focus();
              $("#edtnombreUsuario").prop("readonly", true);
              $("#edtapellidoUsuarioPat").prop("readonly", true);
              $("#edtapellidoUsuarioMat").prop("readonly", true);
            },
            failure: function (data) {
              toastr.info("No se pudo conectar los datos", "DNI");
            },
            error: function (data) {
              $("#edtnombreUsuario").prop("readonly", false);
              $("#edtapellidoUsuarioPat").prop("readonly", false);
              $("#edtapellidoUsuarioMat").prop("readonly", false);
              $("#edtdniUsuario").focus();
              // toastr.info("Ingresa tus nombres y apellidos", "Datos del Usuario");
            },
          });
        });
      }
    },
  });
});
// Validar cuenta de usuario existente
$("#cuentaUsuario").change(function () {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
  });
  var cuenta = $(this).val();
  var datos = new FormData();
  datos.append("validarCuenta", cuenta);
  $.ajax({
    url: "lib/ajaxUsuarios.php",
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
          title: "La cuenta de usuario ya se encuentra registrada",
        });
        $("#cuentaUsuario").focus();
        $("#cuentaUsuario").val("");
      }
    },
  });
});
// Validar cuenta de usuario existente
$("#edtcuentaUsuario").change(function () {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
  });
  var cuenta = $(this).val();
  var datos = new FormData();
  datos.append("validarCuenta", cuenta);
  $.ajax({
    url: "lib/ajaxUsuarios.php",
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
          title: "La cuenta de usuario ya se encuentra registrada",
        });
        $("#edtcuentaUsuario").focus();
        $("#edtcuentaUsuario").val("");
      }
    },
  });
});
// Javascript activar o desactivar usuario
$(".tablaUsuarios tbody").on("click", ".btnActivar", function () {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url: "lib/ajaxUsuarios.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        swal({
          title: "El estado del usuario ha sido actualizado",
          type: "success",
          confirmButtonText: "¡Cerrar!",
        }).then(function (result) {
          if (result.value) {
            window.location = "usuarios";
          }
        });
      }
    },
  });

  if (estadoUsuario == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html('<i class="fas fa-user-minus"></i>Inactivo');
    $(this).attr("estadoUsuario", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html('<i class="fas fa-user-check"></i>Activo');
    $(this).attr("estadoUsuario", 0);
  }
});

// Eliminar usuarios
// Desbloquear Usuario
$(".tablaUsuarios tbody").on("click", ".btnDesbloquearUsuario", function () {

  var idUsuarioDes = $(this).attr("idUsuario");
  $.ajax({
    type: "POST",
    url: "lib/comboDesbloquearUsuario.php",
    data: "idUsuarioDes=" + idUsuarioDes,
    cache: false,
    dataType: "json",
    success: function (data) {
      if (data["mensaje"] == "ok") {
        Swal.fire({
          icon: "success",
          title: "¡El usuario ha sido desbloqueado con éxito!!",
          showConfirmButton: false,
          timer: 1500
        });
        function redirect() {
          window.location = "usuarios";
        }
        setTimeout(redirect, 1500);
      }
    },
  });
});
// Desbloquear Usuario
// btnEliminarUsuario
$(".tablaUsuarios tbody").on("click", ".btnEliminarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");
  Swal.fire({
    title: "¿Está seguro de eliminar al usuario?",
    text: "¡Si no lo está, puede cancelar la acción!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#343a40",
    cancelButtonColor: "#d33",
    confirmButtonText: "¡Sí, eliminar!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario;
    }
  });
});

$("#logCuenta").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z\u00f1\u00d1]/g, "");
});
$("#logCuenta").keyup(function () {
  var lc = $(this).val();
  var mayuslc = lc.toLowerCase();
  $("#logCuenta").val(mayuslc);
});

// Validacion
$("#btnRegistrarUsuario").on("click", function () {
  $("#form-reg-usuario").validate({
    rules: {
      perfilUsuario: {
        valueNotEquals: "0",
        required: true,
      },
      dniUsuario: {
        required: true,
      },
      nombreUsuario: {
        required: true,
      },
      apellidoUsuarioPat: {
        required: true,
      },
      apellidoUsuarioMat: {
        required: true,
      },
      cuentaUsuario: {
        required: true,
      },
      claveUsuario: {
        required: true,
      },
    },
    messages: {
      perfilUsuario: {
        valueNotEquals: "Seleccione Perfil",
        required: "Seleccione perfil de usuario",
      },
      dniUsuario: {
        required: "DNI Requerido",
      },
      nombreUsuario: {
        required: "Nombres requerido",
      },
      apellidoUsuarioPat: {
        required: "A. Paterno requerido",
      },
      apellidoUsuarioMat: {
        required: "A. Materno requerido",
      },
      cuentaUsuario: {
        required: "Cuenta requerido",
      },
      claveUsuario: {
        required: "Contraseña requerida",
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
$("#btnEditUsuario").on("click", function () {
  $("#form-edt-usuario").validate({
    rules: {
      edtedtperfilUsuario: {
        valueNotEquals: "0",
        required: true,
      },
      edtedtdniUsuario: {
        required: true,
      },
      edtedtnombreUsuario: {
        required: true,
      },
      edtedtapellidoUsuarioPat: {
        required: true,
      },
      edtedtapellidoUsuarioMat: {
        required: true,
      },
      edtedtcuentaUsuario: {
        required: true,
      },
    },
    messages: {
      edtperfilUsuario: {
        valueNotEquals: "Seleccione Perfil",
        required: "Seleccione perfil de usuario",
      },
      edtdniUsuario: {
        required: "DNI Requerido",
      },
      edtnombreUsuario: {
        required: "Nombres requerido",
      },
      edtapellidoUsuarioPat: {
        required: "A. Paterno requerido",
      },
      edtapellidoUsuarioMat: {
        required: "A. Materno requerido",
      },
      edtcuentaUsuario: {
        required: "Cuenta requerido",
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
$("#btnActualizarContra").on("click", function () {
  $("#form-actualizar-clave").validate({
    rules: {
      chgClave: {
        required: true,
      },
      vchgClave: {
        required: true,
      },
    },
    messages: {
      chgClave: {
        required: "Dato requerido",
      },
      vchgClave: {
        required: "Dato requerido",
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

$("#btnActualizarContra").click(function (e) {
  e.preventDefault();
  var form = $("#form-actualizar-clave");

  validacion = form.valid();
  if (validacion == true) {
    var datosAct = $("#form-actualizar-clave").serialize();
    $.ajax({
      method: "post",
      url: "lib/comboActualizaCT.php",
      data: datosAct,
      success: function (e) {
        if (e == 1) {
          Swal.fire({
            icon: "success",
            title:
              "Se actualizado su contraseña con éxito.",
            showConfirmButton: false,
            timer: 1500,
          });
          document.getElementById("form-actualizar-clave").reset();
          $("#modal-actualizar-clave").modal("hide");
        } else {
          Swal.fire({
            type: "error",
            title:
              "Ha ocurrido un error, ingrese correctamente sus datos",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      },
    });
  }
  else {
    Swal.fire({
      icon: "error",
      title:
        "Error al registrar, ingrese correctamente los datos de su reclamo. Aségurese de completar todos los campos requeridos",
      showConfirmButton: false,
      timer: 1500,
    });
  }
  return false;
});
// Visualizar Contraseña
$("#viewCT").on("click", function () {
  var control = $(this);
  var estatus = control.data("activo");

  var icon = control.find("span");
  if (estatus == false) {

    control.data("activo", true);
    $(icon).removeClass("fas fa-eye").addClass("fas fa-low-vision");
    $("#chgClave").attr("type", "text");
  }
  else {

    control.data("activo", false);
    $(icon).removeClass("fas fa-low-vision").addClass("fas fa-eye");
    $("#chgClave").attr("type", "password");
  }
});

$("#viewCT2").on("click", function () {
  var control1 = $(this);
  var estatus1 = control1.data("activo");

  var icon1 = control1.find("span");
  if (estatus1 == false) {

    control1.data("activo", true);
    $(icon1).removeClass("fas fa-eye").addClass("fas fa-low-vision");
    $("#vchgClave").attr("type", "text");
  }
  else {

    control1.data("activo", false);
    $(icon1).removeClass("fas fa-low-vision").addClass("fas fa-eye");
    $("#vchgClave").attr("type", "password");
  }
});
// Visualizar Contraseña
// Validacion de Contraseña Ingresada
$("#chgClave").change(function () {
  var chcC = $(this).val().length;
  // console.log(chcC);
  if (chcC >= 8 && chcC <= 16) {
    $("#vchgClave").focus();
  }
  else {
    Swal.fire({
      icon: "warning",
      title:
        "La contraseña debe tener de 8 a 16 caracteres. Solo números y letras",
      showConfirmButton: false,
      timer: 1500,
    });
    $("#chgClave").focus();
  }
});
$("#chgClave").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]/g, "");
});
$("#vchgClave").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]/g, "");
});
// Verificación de Contraseña
$("#vchgClave").change(function () {
  var chcCv = $(this).val().length;
  var chcC2 = $("#chgClave").val().length;
  var chcCL = $(this).val();
  var chcC2L = $("#chgClave").val();
  if (chcCv != chcC2 && chcC2L != chcCL) {
    Swal.fire({
      icon: "error",
      title:
        "Las contraseña no coinciden.",
      showConfirmButton: false,
      timer: 1500,
    });
    $("#vchgClave").focus();
    $("#vchgClave").val("");
    $("#btnActualizarContra").addClass("disabled");
  }
  else {
    $("#btnActualizarContra").focus();
    $("#btnActualizarContra").removeClass("disabled");
  }
});

$("#claveU1").on("click", function () {
  var control3 = $(this);
  var estatus3 = control3.data("activo");

  var icon3 = control3.find("span");
  if (estatus3 == false) {

    control3.data("activo", true);
    $(icon3).removeClass("fas fa-eye").addClass("fas fa-low-vision");
    $("#claveUsuario").attr("type", "text");
  }
  else {
    control3.data("activo", false);
    $(icon3).removeClass("fas fa-low-vision").addClass("fas fa-eye");
    $("#claveUsuario").attr("type", "password");
  }
});
$("#claveU2").on("click", function () {
  var control4 = $(this);
  var estatus4 = control4.data("activo");

  var icon4 = control4.find("span");
  if (estatus4 == false) {

    control4.data("activo", true);
    $(icon4).removeClass("fas fa-eye").addClass("fas fa-low-vision");
    $("#edtclaveUsuario").attr("type", "text");
  }
  else {
    control4.data("activo", false);
    $(icon4).removeClass("fas fa-low-vision").addClass("fas fa-eye");
    $("#edtclaveUsuario").attr("type", "password");
  }
});

$("#claveUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]/g, "");
});
$("#edtclaveUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]/g, "");
});
$("#claveUsuario").change(function () {
  var chcC4 = $(this).val().length;
  // console.log(chcC);
  if (chcC4 >= 8 && chc4 <= 16) {
    $("#claveUsuario").focus();
  }
  else {
    Swal.fire({
      icon: "warning",
      title:
        "La contraseña debe tener de 8 a 16 caracteres. Solo números y letras",
      showConfirmButton: false,
      timer: 1500,
    });
    $("#claveUsuario").focus();
  }
});

$("#edtclaveUsuario").change(function () {
  var chcC5 = $(this).val().length;
  // console.log(chcC);
  if (chcC5 >= 8 && chc5 <= 16) {
    $("#edtclaveUsuario").focus();
  }
  else {
    Swal.fire({
      icon: "warning",
      title:
        "La contraseña debe tener de 8 a 16 caracteres. Solo números y letras",
      showConfirmButton: false,
      timer: 1500,
    });
    $("#edtclaveUsuario").focus();
  }
});