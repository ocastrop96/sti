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
                    <h4><strong>Administración:. Usuarios</strong></h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Administración</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-users-cog"></i>
                    Usuarios del Sistema
                </h3>
            </div>
            <div class="card-body">
                <button type="btn" class="btn btn-secondary" data-toggle="modal" data-target="#modal-registrar-usuario"><i class="fas fa-user-plus"></i> Registrar Usuario
                </button>
            </div>
            <input type="hidden" id="pUsuOculto" value="<?php echo $_SESSION["perfil"] ?>">
            <div class="card-body">
                <table id="tablaUsuarios" class="table table-bordered table-hover dt-responsive tablaUsuarios">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>DNI N°</th>
                            <th>Nombres</th>
                            <th>A. Paterno</th>
                            <th>A. Materno</th>
                            <th>Perfil</th>
                            <th>Cuenta</th>
                            <th>Registro</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="modal-registrar-usuario" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form-reg-usuario" role="form" method="post">
                <div class="modal-header text-center" style="background: #6c757d; color: white">
                    <h4 class="modal-title">Registrar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Bloque de DNI -->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="dniUsuario">DNI</label>
                                <i class="fas fa-address-card"></i> *
                                <div class="input-group">
                                    <input type="text" name="dniUsuario" id="dniUsuario" class="form-control" placeholder="Ingrese DNI" required autocomplete="off" autofocus="autofocus">
                                </div>
                            </div>
                        </div>
                        <div class="col-4" id="btnDNIUsuario">
                            <div class="form-group">
                                <label>Búsqueda:<span class="text-danger">&nbsp;*</span></label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-block btn-info" id="btnDNIU"><i class="fas fa-search"></i>&nbsp;Consulta DNI</button>
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de DNI -->
                        <!-- Bloque de Nombres -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="nombreUsuario">Nombres</label>
                                <i class="fas fa-user-tag"></i> *
                                <div class="input-group">
                                    <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" required autocomplete="off" placeholder="Ingrese sus nombres">
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de Nombres -->
                        <!-- Bloque de Apellidos -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="apellidoUsuario">Apellido Paterno</label>
                                <i class="fas fa-user-tag"></i> *
                                <div class="input-group">
                                    <input type="text" name="apellidoUsuarioPat" id="apellidoUsuarioPat" class="form-control" required autocomplete="off" placeholder="Ingrese Apellido Paterno">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="apellidoUsuario">Apellido Materno</label>
                                <i class="fas fa-user-tag"></i> *
                                <div class="input-group">
                                    <input type="text" name="apellidoUsuarioMat" id="apellidoUsuarioMat" class="form-control" required autocomplete="off" placeholder="Ingrese Apellido Paterno">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bloque de Apellidos -->

                    <!-- Bloque de Perfil -->
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="perfilUsuario">Perfil</label>
                                <i class="fas fa-id-card-alt"></i> *
                                <div class="input-group">
                                    <select class="form-control" style="width: 100%;" id="perfilUsuario" name="perfilUsuario" required>
                                        <option value="">Seleccione el perfil del usuario</option>
                                        <?php
                                        $itemPerfil = null;
                                        $valorPerfil  = null;
                                        $perfil = ControladorUsuarios::ctrListarPerfiles($itemPerfil, $valorPerfil);
                                        foreach ($perfil as $key => $value) {
                                            echo '<option value="' . $value["id_perfil"] . '">' . $value["perfil"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de Perfil -->
                        <!-- Bloque de Nombres -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="cuentaUsuario">Usuario</label>
                                <i class="fas fa-user-cog"></i> *
                                <div class="input-group">
                                    <input type="text" name="cuentaUsuario" id="cuentaUsuario" class="form-control" placeholder="Ingrese usuario" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de Nombres -->

                        <!-- Bloque de Apellidos -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="claveUsuario">Contraseña</label>
                                <i class="fas fa-key"></i> *
                                <div class="input-group">
                                    <input type="password" name="claveUsuario" id="claveUsuario" class="form-control" placeholder="Ingrese contraseña" required autocomplete="off">
                                    <div class="input-group-prepend">
                                        <span class="fas fa-eye input-group-text" id="claveU1" data-activo=false></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary" id="btnRegistrarUsuario"><i class="fas fa-save"></i> Registrar</button>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
                </div>
                <?php
                $registrarUsuario = new ControladorUsuarios();
                $registrarUsuario->ctrRegistrarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>

<div id="modal-editar-usuario" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form-edt-usuario" role="form" method="post">
                <div class="modal-header text-center" style="background: #6c757d; color: white">
                    <h4 class="modal-title">Editar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Bloque de DNI -->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="hidden" name="idUsuario" id="idUsuario" required>
                                <label for="edtdniUsuario">DNI</label>
                                <i class="fas fa-address-card"></i> *
                                <div class="input-group">
                                    <input type="text" name="edtdniUsuario" id="edtdniUsuario" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-4" id="btnDNIEdtUsuario">
                            <div class="form-group">
                                <label>Búsqueda:<span class="text-danger">&nbsp;*</span></label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-block btn-info" id="btnEdtDNIU"><i class="fas fa-search"></i>&nbsp;Consulta DNI</button>
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de DNI -->
                        <!-- Bloque de Nombres -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="edtnombreUsuario">Nombres</label>
                                <i class="fas fa-user-tag"></i> *
                                <div class="input-group">
                                    <input type="text" name="edtnombreUsuario" id="edtnombreUsuario" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de Nombres -->

                        <!-- Bloque de Apellidos -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="edtapellidoUsuarioPa">Apellido Paterno</label>
                                <i class="fas fa-user-tag"></i> *
                                <div class="input-group">
                                    <input type="text" name="edtapellidoUsuarioPat" id="edtapellidoUsuarioPat" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="edtapellidoUsuarioMat">Apellido Materno</label>
                                <i class="fas fa-user-tag"></i> *
                                <div class="input-group">
                                    <input type="text" name="edtapellidoUsuarioMat" id="edtapellidoUsuarioMat" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bloque de Apellidos -->

                    <!-- Bloque de Perfil -->
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="edtperfilUsuario1">Perfil</label>
                                <i class="fas fa-id-card-alt"></i> *
                                <div class="input-group">
                                    <select class="form-control" style="width: 100%;" name="edtperfilUsuario" id="edtperfilUsuario1" required>
                                        <option value="" id="edtperfilUsuario"></option>
                                        <?php
                                        $itemPerfil2 = null;
                                        $valorPerfil2  = null;
                                        $perfil2 = ControladorUsuarios::ctrListarPerfiles($itemPerfil2, $valorPerfil2);
                                        foreach ($perfil2 as $key => $value) {
                                            echo '<option value="' . $value["id_perfil"] . '">' . $value["perfil"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de Perfil -->
                        <!-- Bloque de Nombres -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="edtcuentaUsuario">Usuario</label>
                                <i class="fas fa-user-cog"></i> *
                                <div class="input-group">
                                    <input type="text" name="edtcuentaUsuario" id="edtcuentaUsuario" class="form-control" placeholder="Ingrese usuario" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- Bloque de Nombres -->
                        <!-- Bloque de Apellidos -->
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="edtclaveUsuario">Contraseña</label>
                                <i class="fas fa-key"></i> *
                                <div class="input-group">
                                    <input type="password" name="edtclaveUsuario" id="edtclaveUsuario" class="form-control" autocomplete="off">
                                    <input type="hidden" name="passwordActual" id="passwordActual">
                                    <div class="input-group-prepend">
                                        <span class="fas fa-eye input-group-text" id="claveU2" data-activo=false></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary" id="btnEditUsuario"><i class="fas fa-save"></i> Guardar cambios</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
                </div>
                <?php
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>
<!-- Llamar metodo de eliminar Usuario -->
<?php
$eliminarUsuario = new ControladorUsuarios();
$eliminarUsuario->ctrEliminarUsuario();

?>