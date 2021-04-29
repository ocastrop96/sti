<?php
if ($_SESSION["perfil"] != 1 && $_SESSION["perfil"] != 2 && $_SESSION["perfil"] != 3) {
    echo '<script>
      window.location = "dashboard";
    </script>';
    return;
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4><strong>Administración:. Servicios</strong></h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Administración</a></li>
                        <li class="breadcrumb-item active">Servicios</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-building"></i>
                    Mantenimiendo de Servicios
                </h3>
            </div>
            <div class="card-body">
                <button type="btn" class="btn btn-secondary" data-toggle="modal" data-target="#modal-registrar-subarea"><i class="fas fa-plus-circle"></i> Registrar Servicio
                </button>
                <input type="hidden" id="pServiceOculto" value="<?php echo $_SESSION["perfil"] ?>">
            </div>
            <div class="card-body">
                <table id="tablaSubAreas" class="table table-bordered table-hover dt-responsive tablaSubAreas">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Oficina o Dpto.</th>
                            <th>Servicio</th>
                            <th>Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="modal-registrar-subarea" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" role="form" id="frmRegServicio" method="post">
                <div class="modal-header text-center" style="background: #6c757d; color: white">
                    <h4 class="modal-title">Registrar Servicio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="oficina">Oficina y/o Departamento &nbsp;</label>
                                <div class="input-group">
                                    <select class="form-control" style="width: 100%;" id="oficina" name="oficina" required>
                                        <option value="0">Seleccione Oficina o Dpto principal</option>
                                        <?php
                                        $itemOficina = null;
                                        $valorOficina  = null;
                                        $oficina = ControladorAreas::ctrListarAreas($itemOficina, $valorOficina);
                                        foreach ($oficina as $key => $value) {
                                            echo '<option value="' . $value["id_area"] . '">' . $value["area"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="newSubarea">Área &nbsp;</label>
                                <i class="fas fa-map"></i> *
                                <div class="input-group">
                                    <input type="text" name="newSubarea" id="newSubarea" class="form-control" placeholder="Ingrese detalle de subarea" required autocomplete="off" autofocus="autofocus">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary" id="btnRegServicio"><i class="fas fa-save"></i> Guardar</button>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
                </div>
                <?php
                $regSubArea = new ControladorSubareas();
                $regSubArea->ctrRegistrarSubarea();
                ?>
            </form>
        </div>
    </div>
</div>

<div id="modal-editar-subarea" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" role="form" id="frmEdtServicio" method="post">
                <div class="modal-header text-center" style="background: #6c757d; color: white">
                    <h4 class="modal-title">Editar Servicio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="edtoficina1">Oficina y/o Departamento &nbsp;</label>
                                <div class="input-group">
                                    <input type="hidden" name="hOfi" id="hOfi">
                                    <select class="form-control" style="width: 100%;" name="edtoficina" id="edtoficina1" required>
                                        <option value="" id="edtoficina"></option>
                                        <?php
                                        $itemOficina2 = null;
                                        $valorOficina2  = null;
                                        $oficina2 = ControladorAreas::ctrListarAreas($itemOficina2, $valorOficina2);
                                        foreach ($oficina2 as $key => $value) {
                                            echo '<option value="' . $value["id_area"] . '">' . $value["area"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edtSubarea">Área &nbsp;</label>
                                <i class="fas fa-map"></i> *
                                <div class="input-group">
                                    <input type="text" name="edtSubarea" id="edtSubarea" class="form-control" required autocomplete="off" autofocus>
                                    <input type="hidden" name="idSubArea" id="idSubArea" required>
                                    <input type="hidden" name="hnSub" id="hnSub">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary" id="btnEdtServicio"><i class="fas fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
                </div>
                <?php
                $edtServicio = new ControladorSubareas();
                $edtServicio->ctrEditarSubarea();
                ?>
            </form>
        </div>
    </div>
</div>
<!-- LLamando a Eliminar usuario -->
<?php
$eliminarSArea = new ControladorSubareas();
$eliminarSArea->ctrEliminarSubarea();
?>