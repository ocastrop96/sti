<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="public/views/resources/img/icon-ban.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STI-Web | HNSEB</title>
    <!-- CSS -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/views/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="public/views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="public/views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="public/views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="public/views/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="public/views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!--iCheck -->
    <link rel="stylesheet" href="public/views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JqueryUI -->
    <link rel="stylesheet" href="public/views/plugins/jquery-ui/jquery-ui.min.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="public/views/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="public/views/plugins/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/views/plugins/bootstrap-datepicker/bootstrap-datepicker.css.map">
    <!-- Toastr -->
    <link rel="stylesheet" href="public/views/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="public/views/plugins/daterangepicker/daterangepicker.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="public/views/resources/css/adminlte.css">
    <link rel="stylesheet" href="public/views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- CSS -->
    <!-- JS -->
    <script src="public/views/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="public/views/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="public/views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="public/views/plugins/chart.js/Chart.js"></script>

    <!-- Datatables -->
    <script src="public/views/plugins/datatables/jquery.dataTables.js"></script>
    <script src="public/views/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="public/views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="public/views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Select2 -->
    <script src="public/views/plugins/select2/js/select2.full.min.js"></script>
    <script src="public/views/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Sweetalert -->
    <script src="public/views/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="public/views/plugins/toastr/toastr.min.js"></script>
    <script src="public/views/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="public/views/plugins/bootstrap-datepicker/bootstrap-datepicker.es.min.js"></script>
    <!-- daterangepicker -->
    <script src="public/views/plugins/moment/moment.min.js"></script>
    <script src="public/views/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="public/views/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- overlayScrollbars -->
    <!-- jquery-validation -->
    <script src="public/views/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="public/views/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/views/resources/js/adminlte.js"></script>
    <script src="public/views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- JS -->
</head>

<body class="sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include('pages/header.php');
        include('pages/menu.php');
        include('pages/dashboard.php');
        include('pages/footer.php');
        ?>
    </div>
</body>

</html>