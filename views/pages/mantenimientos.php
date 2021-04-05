<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4><strong>Soporte Técnico:. Mantenimientos</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">HelpDesk</a></li>
            <li class="breadcrumb-item active">Mantenimientos</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-clipboard-list"></i>
          Mantenimiento de Equipos
        </h3>
      </div>
      <div class="card-body">
        <a href="registrar-mantenimiento"><button type="btn" class="btn btn-secondary mt-2"><i class="fas fa-clipboard-list"></i> Registrar Mantenimiento</button></a>
      </div>
      <div class="card-body">
        <table id="tablaMantenimientos" class="table table-bordered table-hover dt-responsive tablaMantenimientos">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>N° Ficha</th>
              <th>F.Registro</th>
              <th>T.Equipo</th>
              <th>Serie</th>
              <th>Responsable</th>
              <th>Departamento/Oficina</th>
              <th>Servicio/Área</th>
              <th>Técnico</th>
              <th>Est.Atención</th>
              <th>Est.Ficha</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>
        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="idOculto">
      </div>
    </div>
  </section>
</div>
<?php
$anulMante = new ControladorMantenimientos();
$anulMante->ctrAnularMantenimiento();
?>