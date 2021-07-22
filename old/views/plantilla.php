<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/x-icon" href="views/icons/sti-icon.ico" />
  <title>STI Web :.. HNSEB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--==============================================
  PLUGINS DE CSS
  ===============================================-->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="views/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="views/dist/css/own.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="views/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="views/plugins/bootstrap-datepicker/bootstrap-datepicker.css">
  <link rel="stylesheet" href="views/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css.map">
  <link rel="stylesheet" href="views/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="views/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!--==============================================
  PLUGINS DE JS
  ===============================================-->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Select2 -->
  <script src="views/plugins/select2/js/select2.full.min.js"></script>
  <script src="views/plugins/datatables/jquery.dataTables.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="views/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <script src="views/plugins/bootstrap-datepicker/bootstrap-datepicker.es.min.js"></script>

  <script src="views/plugins/toastr/toastr.min.js"></script>
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- jquery-validation -->
  <script src="views/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="views/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- InputMask -->
  <script src="views/plugins/moment/moment.min.js"></script>
  <script src="views/plugins/inputmask/jquery.inputmask.min.js"></script>
</head>
<!-- hold-transition sidebar-mini layout-fixed  fijo-->
<!-- sidebar-mini layout-fixed sidebar-collapse colapsado-->

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Validación de Login -->
  <?php
  if (isset($_SESSION["loginWS"]) && $_SESSION["loginWS"] == "ok") {
    echo '<div class="wrapper">';
    // Cabecera Principal
    include('pages/cabecera.php');
    // Menú Principal
    include('pages/menu.php');
    if (isset($_GET["ruta"])) {
      // Rutas dinámicas
      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "dashboard" ||
        $_GET["ruta"] == "oficinas" ||
        $_GET["ruta"] == "servicios" ||
        $_GET["ruta"] == "diagnosticos" ||
        $_GET["ruta"] == "integracion-ec" ||
        $_GET["ruta"] == "integracion-ep" ||
        $_GET["ruta"] == "integracion-er" ||
        $_GET["ruta"] == "equipos-computo" ||
        $_GET["ruta"] == "equipos-redes" ||
        $_GET["ruta"] == "equipos-otros" ||
        $_GET["ruta"] == "mantenimientos" ||
        $_GET["ruta"] == "registrar-mantenimiento" ||
        $_GET["ruta"] == "editar-mantenimiento" ||
        $_GET["ruta"] == "reposicion" ||
        $_GET["ruta"] == "cableados" ||
        $_GET["ruta"] == "categorias" ||
        $_GET["ruta"] == "acciones" ||
        $_GET["ruta"] == "responsables" ||
        $_GET["ruta"] == "logout"
      ) {
        include "pages/" . $_GET["ruta"] . ".php";
      } else {
        include "pages/404.php";
      }
    } else {
      include "pages/inicio.php";
    }
    // Pie de página
    include('pages/pie.php');
    echo '</div>';
  } else {
    include "pages/login.php";
  }

  ?>

  <!-- Scripts JS Propios -->
  <script type="text/javascript" src="views/dist/js/main.js"></script>
  <script type="text/javascript" src="views/dist/js/oficinas-departamentos.js"></script>
  <script type="text/javascript" src="views/dist/js/servicios.js"></script>
  <script type="text/javascript" src="views/dist/js/usuarios.js"></script>
  <script type="text/javascript" src="views/dist/js/diagnosticos.js"></script>
  <script type="text/javascript" src="views/dist/js/acciones.js"></script>
  <script type="text/javascript" src="views/dist/js/responsables.js"></script>
  <script type="text/javascript" src="views/dist/js/categorias.js"></script>
  <script type="text/javascript" src="views/dist/js/equipos-computo.js"></script>
  <script type="text/javascript" src="views/dist/js/equipos-redes.js"></script>
  <script type="text/javascript" src="views/dist/js/equipos-otros.js"></script>
  <script type="text/javascript" src="views/dist/js/integra-ec.js"></script>
  <script type="text/javascript" src="views/dist/js/integra-ep.js"></script>
  <script type="text/javascript" src="views/dist/js/integra-er.js"></script>
  <script type="text/javascript" src="views/dist/js/mantenimientos.js"></script>
  <!-- <script type="text/javascript" src="views/dist/js/code.min.js"></script> -->

  <script type="text/javascript" src="views/dist/js/reposicion.js"></script>
  <script type="text/javascript" src="views/dist/js/cableados.js"></script>
</body>

</html>