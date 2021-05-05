<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__wobble" src="views/icons/logo-sti.png" alt="AdminLTELogo" height="120" width="120">
</div>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4><strong>Dashboard</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
          <h5 class="font-weight-bolder"><i class="far fa-comments"></i> Bienvenido (a):</h5>
          Hola, <span class="font-weight-bolder"><?php echo $_SESSION["nombres"];
                                                  echo ' ';
                                                  echo $_SESSION["paterno"];
                                                  echo ' ';
                                                  echo $_SESSION["materno"] ?></span> te damos la bienvenida a Soporte Técnico Informático-Web.
        </div>
      </div>
    </div>
    <div class="row">
      <?php include "widgets/cajas-superiores.php"; ?>
    </div>
  </section>
</div>