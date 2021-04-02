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
          <tbody>
            <tr>
              <td>1</td>
              <td>FT-2021-00002</td>
              <td>24-03-2021</td>
              <td>PC</td>
              <td>MXL2500TDK</td>
              <td>Olger Ivan Castro Palacios</td>
              <td>Estadística e Informática</td>
              <td>Desarrollo</td>
              <td>Edwin William Guerrero Sandoval</td>
              <td><button type="button" class="btn btn-block btn-success"><i class="fas fa-thumbs-up"></i>&nbsp;Concluida</button></td>
              <td><button type="button" class="btn btn-block btn-info"><i class="fas fa-check"></i>&nbsp;Atendida</button></td>
              <td>
                <div class="btn-group"><button class="btn btn-warning btnEditarMant" idMantenimiento=""><i class="fas fa-edit"></i></button><button class="btn btn-info btnImprimirFichaMant" idMantenimiento=""><i class="fas fa-print"></i></button><button class="btn btn-secondary btnAnularMantenimiento" idMantenimiento=""><i class="fas fa-window-close"></i></button></div>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>FT-2021-00001</td>
              <td>24-03-2021</td>
              <td>PC</td>
              <td>MXL2500TDK</td>
              <td>Olger Ivan Castro Palacios</td>
              <td>Estadística e Informática</td>
              <td>Desarrollo</td>
              <td>Edwin William Guerrero Sandoval</td>
              <td><button type="button" class="btn btn-block btn-secondary"><i class="far fa-clock"></i>&nbsp;Pendiente</button></td>
              <td><button type="button" class="btn btn-block btn-danger"><i class="fas fa-ban"></i>&nbsp;Anulada</button></td>
              <td>
                <div class="btn-group"><button class="btn btn-warning btnEditarMant" idMantenimiento=""><i class="fas fa-edit"></i></button><button class="btn btn-info btnImprimirFichaMant" idMantenimiento=""><i class="fas fa-print"></i></button><button class="btn btn-secondary btnAnularMantenimiento" idMantenimiento=""><i class="fas fa-window-close"></i></button></div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>