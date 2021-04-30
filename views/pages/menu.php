<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="dashboard" class="brand-link">
        <img src="views/icons/logo-sti-main.png" alt="Soporte HNSEB Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
        <span class="brand-text font-weight-bolder">STI-Web HNSEB</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if ($_SESSION["perfil"] != 1) {
                    echo '<img src="views/icons/tecnico.jpg" class="img-circle elevation-2" alt="User Image">';
                } else {
                    echo '<img src="views/icons/administrador.jpg" class="img-circle elevation-2" alt="User Image">';
                }

                ?>
                <!-- <img src="views/icons/role.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="dashboard" class="d-block"><?php echo $_SESSION["nombres"]; ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php
                if ($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2 || $_SESSION["perfil"] == 3) {
                    echo '<li class="nav-header">ADMINISTRACION</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="usuarios" class="nav-link active">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="oficinas" class="nav-link">
                                        <i class="nav-icon fas fa-sitemap"></i>
                                        <p>
                                            Departamentos / Oficinas
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="servicios" class="nav-link">
                                        <i class="nav-icon fas fa-building"></i>
                                        <p>
                                            Servicios
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="responsables" class="nav-link">
                                        <i class="nav-icon fas fa-users nav-icon"></i>
                                        <p>Responsables</p>
                                    </a>
                                </li>
                            </ul>
                        </li>';
                }
                ?>
                <?php
                if ($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 3 || $_SESSION["perfil"] == 4) {
                    echo '<li class="nav-header">EQUIPOS INFORMÁTICOS</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Control
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">';
                    if ($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 3) {
                        echo '
                            <li class="nav-item">
                                <a href="categorias" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Categorías</p>
                                </a>
                            </li>';
                    }
                    echo '
                            <li class="nav-item">
                                <a href="equipos-computo" class="nav-link">
                                    <i class="nav-icon fas fa-laptop"></i>
                                    <p>Equipos de Cómputo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="equipos-otros" class="nav-link">
                                    <i class="nav-icon fas fa-keyboard"></i>
                                    <p>Périfericos y Otros</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="equipos-redes" class="nav-link">
                                    <i class="nav-icon fas fa-network-wired"></i>
                                    <p>Equipos de Redes y Tlc</p>
                                </a>
                            </li>
                        </ul>
                    </li>';
                }
                ?>
                <?php
                if ($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 3 || $_SESSION["perfil"] == 4) {
                    echo '
                    <li class="nav-header">INTEGRACIÓN DE EQUIPOS</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-drafting-compass"></i>
                            <p>
                                Consolidación
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="integracion-ec" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>PC/Laptop/Servidor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="integracion-ep" class="nav-link">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>Impresoras y Otros</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="integracion-er" class="nav-link">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Redes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">EXTRAS</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-plus-square"></i>
                            <p>
                                Herramientas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="diagnosticos" class="nav-link">
                                    <i class="nav-icon fas fa-laptop-medical"></i>
                                    <p>Diágnosticos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="acciones" class="nav-link">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p>Acciones Realizadas</p>
                                </a>
                            </li>
                        </ul>
                    </li>';
                }
                ?>
                <?php
                if ($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2 || $_SESSION["perfil"] == 3 || $_SESSION["perfil"] == 4) {
                    echo '
                    <li class="nav-header">SOPORTE TÉCNICO</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-hands-helping"></i>
                            <p>
                                HelpDesk
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="mantenimientos" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p>Mantenimientos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="reposicion" class="nav-link">
                                    <i class="nav-icon fas fa-sync-alt"></i>
                                    <p>Reposición</p>
                                </a>
                            </li>
                        </ul>
                    </li>';
                }
                ?>
                <li class="nav-header">REPORTES</li>
            </ul>
        </nav>
    </div>
</aside>