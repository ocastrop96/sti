<?php
if ($_SESSION["perfil"] != 1 && $_SESSION["perfil"] != 3) {
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
                    <h4><strong>Equipos Informáticos:. Categorías</strong></h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Equipos Informáticos</a></li>
                        <li class="breadcrumb-item active">Categorías</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-laptop-code"></i>
                    Mantenimiento de Categorías
                </h3>
            </div>
            <div class="card-body">
                <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-registrar-categoria"><i class="fas fa-th"></i> Registrar Categoría
                </button>
                <input type="hidden" id="pCategoriaOculto" value="<?php echo $_SESSION["perfil"] ?>">
            </div>
            <div class="card-body">
                <table id="tablaCategorias" class="table table-bordered table-hover dt-responsive tablaCategorias">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Categoría</th>
                            <th>Segmento</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Registrar Categoria -->
<div id="modal-registrar-categoria" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" role="form" id="frmRegCategoria" method="post">
                <div class="modal-header text-center" style="background: #6c757d; color: white">
                    <h4 class="modal-title">Registrar Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="oficina">Segmento &nbsp;<i class="fas fa-border-style"></i>*</label>
                                <div class="input-group">
                                    <select class="form-control" style="width: 100%;" id="newSeg" name="newSeg" required>
                                        <option value="0">Seleccione segmento</option>
                                        <?php
                                        $itemSeg = null;
                                        $valorSeg  = null;
                                        $segmento = ControladorSegmentos::ctrListarSegmentos($itemSeg, $valorSeg);
                                        foreach ($segmento as $key => $value) {
                                            echo '<option value="' . $value["idSegmento"] . '">' . $value["descSegmento"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="newCategoria">Categoría &nbsp;</label>
                                <i class="fas fa-th"></i> *
                                <div class="input-group">
                                    <input type="text" name="newCategoria" id="newCategoria" class="form-control" placeholder="Ingrese detalle de categoría" required autocomplete="off" autofocus="autofocus">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary" id="btnRegCategoria"><i class="fas fa-save"></i> Guardar</button>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
                </div>
                <?php
                $registrarCat = new ControladorCategorias();
                $registrarCat->ctrRegistrarCategorias();
                ?>
            </form>
        </div>
    </div>
</div>
<!-- Registrar Categoria -->

<!-- Editar Categoria -->
<div id="modal-editar-categoria" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" role="form" id="frmEdtCategoria" method="post">
                <div class="modal-header text-center" style="background: #6c757d; color: white">
                    <h4 class="modal-title">Editar Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="oficina">Segmento &nbsp;<i class="fas fa-border-style"></i>*</label>
                                <div class="input-group">
                                    <select class="form-control" style="width: 100%;" name="edtSeg" required>
                                        <option value="" id="edtSeg"></option>
                                        <?php
                                        $itemSeg1 = null;
                                        $valorSeg1  = null;
                                        $segmento1 = ControladorSegmentos::ctrListarSegmentos($itemSeg1, $valorSeg1);
                                        foreach ($segmento1 as $key => $value) {
                                            echo '<option value="' . $value["idSegmento"] . '">' . $value["descSegmento"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edtCategoria">Categoría &nbsp;</label>
                                <i class="fas fa-th"></i> *
                                <div class="input-group">
                                    <input type="text" name="edtCategoria" id="edtCategoria" class="form-control" required autocomplete="off" autofocus="autofocus">
                                    <input type="hidden" name="idCategoria" id="idCategoria">
                                    <input type="hidden" name="ctgDet" id="ctgDet">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary" id="btnEdtCategoria"><i class="fas fa-save"></i> Guardar cambios</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
                </div>
                <?php
                $edtCat = new ControladorCategorias();
                $edtCat->ctrEditarCategorias();
                ?>
            </form>
        </div>
    </div>
</div>
<!-- Editar Categoria -->
<?php

$eliminarCat = new ControladorCategorias();
$eliminarCat->ctrEliminarCategorias();
?>