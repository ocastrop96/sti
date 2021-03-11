// $('#tablaUsuarios').DataTable({
//     "paging": true,
//     "lengthChange": true,
//     "searching": true,
//     "ordering": true,
//     "info": true,
//     "autoWidth": false,
//     "language": {
//         "url": "views/dist/js/dataTables.spanish.lang"
//     },
// });

// $.ajax({

// 	url: "util/datatable-usuarios.php",
// 	success:function(respuesta){
// 		console.log("respuesta", respuesta);
// 	}
// })
// Cargar tabla con ajax
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

$(".tablaUsuarios").DataTable({
  ajax: "util/datatable-usuarios.php",
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
$("#nombreUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z ]/g, "");
});
$("#nombreUsuario").keyup(function () {
  var u1 = $(this).val();
  var mu1 = u1.toUpperCase();
  $("#nombreUsuario").val(mu1);
});
$("#apellidoUsuarioPat").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z ]/g, "");
});
$("#apellidoUsuarioPat").keyup(function () {
  var u2 = $(this).val();
  var mu2 = u2.toUpperCase();
  $("#apellidoUsuarioPat").val(mu2);
});
$("#apellidoUsuarioMat").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z ]/g, "");
});
$("#apellidoUsuarioMat").keyup(function () {
  var u3 = $(this).val();
  var mu3 = u3.toUpperCase();
  $("#apellidoUsuarioMat").val(mu3);
});

$("#cuentaUsuario").keyup(function () {
  this.value = (this.value + "").replace(/[^a-zA-Z\u00f1\u00d1]/g, "");
});
$("#cuentaUsuario").keyup(function () {
  var u4 = $(this).val();
  var mu4 = u4.toLowerCase();
  $("#cuentaUsuario").val(mu4);
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

$("#edtperfilUsuario").change(function () {
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
          type: "warning",
          title: "El DNI Ingresado ya se encuentra registrado",
        });
        $("#edtdniUsuario").val("");
      } else {
        $("#edtnombreUsuario").val("");
        $("#edtapellidoUsuarioPat").val("");
        $("#edtapellidoUsuarioMat").val("");
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
  // okis

  // Swal.fire({
  //   title: "¿Está seguro de desbloquear al usuario?",
  //   text: "¡Si no lo está, puede cancelar la acción!",
  //   icon: "warning",
  //   showCancelButton: true,
  //   confirmButtonColor: "#343a40",
  //   cancelButtonColor: "#d33",
  //   confirmButtonText: "¡Sí, desbloquear!",
  // }).then(function (result) {
  //   if (result.value) {
  //     window.location = "index.php?ruta=usuarios&idUsuarioDes=" + idUsuario;
  //   }
  // });
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