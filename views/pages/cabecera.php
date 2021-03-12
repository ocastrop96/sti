<nav class="main-header navbar navbar-expand navbar-dark navbar-lightblue border-bottom-0">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-users-cog"></i> Opciones
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Opciones del Usuario</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-actualizar-clave">
                    <i class="fas fa-pen-square mr-3"></i> Cambiar Contraseña
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-3"></i> Cerrar Sesión
                </a>
            </div>
        </li>
    </ul>
</nav>

<div id="modal-actualizar-clave" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form-actualizar-clave" role="form" method="post">
                <div class="modal-header text-center" style="background: #6c757d; color: white">
                    <center>
                        <h4 class="modal-title">Actualizar Contraseña</h4>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION["id"]; ?>">
                                <label for="chgClave">Nueva Contraseña</label>
                                <i class="fas fa-key"></i> *
                                <div class="input-group">
                                    <input type="password" name="chgClave" id="chgClave" class="form-control" placeholder="Ingresa tu nueva contraseña" required autocomplete="off">
                                    <div class="input-group-prepend">
                                        <span class="fas fa-eye input-group-text" id="viewCT" data-activo=false></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="vchgClave">Validar Nueva Contraseña</label>
                                <i class="fas fa-key"></i> *
                                <div class="input-group">
                                    <input type="password" name="vchgClave" id="vchgClave" class="form-control" placeholder="Reescribe tu nueva contraseña" required autocomplete="off">
                                    <div class="input-group-prepend">
                                        <span class="fas fa-eye input-group-text" id="viewCT2" data-activo=false></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary disabled" id="btnActualizarContra"><i class="fas fa-save"></i> &nbsp;Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>