<!DOCTYPE html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "app";
    
    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    
     // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    session_start();

    $current_page = basename($_SERVER['PHP_SELF']);

    if($_SESSION["usuario"] === null){
        header("Location: ../../index.php");
    }
?>
<style>
    .active{
        background-color: #f8f9fc;
    }
    .active span{
        color: #5c7de0;
    }
</style>
<html lang="es">
    <head>
        <link rel="shortcut icon" href="#" />
        <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">
        <meta charset="utf-8">
        <meta name="author" content="Actcel Chirinos">
        <meta name="description" content="Gestión de Acceso Automatizado">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PQDF</title> 
        
        <!--FUENTES-->
        <link href="../../plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <!--JsPDF-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/sb.css">

        <!--dataTable-->
        <link rel="stylesheet" href="../../plugins/datatable/bootstrap.min.css">
        <link rel="stylesheet" href="../../plugins/datatable/dataTables.bootstrap5.css">

        <!--Estilos-->
        <link rel="stylesheet" href="../../css/sb-admin-2.min.css">
    </head>
    <body id="page-top">

        <!--Barra Lateral-->
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!--Marca de la barra lateral-->
                <div class="sidebar-brand d-flex align-items-center justify-content-center">
                    <!--<img src="../../img\logo_sti_commin.png" class="img-fluid mt-1" width="55">-->
                    <i class="fa fa-user"></i>
                    <span class="sidebar-brand-text mx-3">
                        <?php 
                        switch($_SESSION['rol']){
                            case 1: echo'Admin';break;
                            case 2: echo'Editor';break; 
                        }?>
                    </span>
                </div>
                
                <!--Divisor-->
                <hr class="sidebar-divider my-0 bg-white">

                <!--Panel de elementos de navegacion-->
                <li class="nav-item <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'inicio') !== false) 
                ? 'active' : ''; ?>">
                    <a class="nav-link" href="../inicio/index.php">

                        <i class="fas fa-home <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'inicio') !== false) 
                        ? 'text-primary' : ''; ?>"></i>
                        <span>Inicio</span>
                    </a>
                </li>

                <hr class="sidebar-divider my-0 bg-white">

                <?php if($_SESSION['rol'] == 1){?>
                    <div class="sidebar-heading mt-3">
                        Gestor de Usuarios
                    </div>

                    <li class="nav-item <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'usuarios') !== false) 
                    ? 'active' : ''; ?>">
                        <a class="nav-link" href="../usuarios/index.php">
                            <i class="fa fa-users <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'usuarios') 
                            !== false) ? 'text-primary' : ''; ?>"></i>
                            <span>Usuarios</span> 
                        </a>
                    </li>
                <?php }?>
                    
                <hr class="sidebar-divider  my-0 bg-white">
                    
                <div class="sidebar-heading mt-3">
                    Solicitud
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa fa-file-pdf"></i>
                        <span>Documentos</span>
                    </a>
                    <div id="collapseUtilities" class="collapse <?php echo (in_array($current_page, ['inspeccion_equipo.php', 
                    'solicitud_conexion.php', 'solicitud_seguridad.php'])) ? 'show' : ''; ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Solicitudes:</h6>
                            <a class="collapse-item <?php echo ($current_page == 'inspeccion_equipo.php') ? 'active' : ''; ?>" href="../inspeccion_equipo/inspeccion_equipo.php">Inspección de Equipo</a>
                            <a class="collapse-item <?php echo ($current_page == 'solicitud_conexion.php') ? 'active' : ''; ?>" href="../solicitud_logico/solicitud_conexion.php">Acceso Lógico</a>
                            <a class="collapse-item <?php echo ($current_page == 'solicitud_seguridad.php') ? 'active' : ''; ?>" href="../solicitud_logico/solicitud_seguridad.php">Dispositivos de Seguridad</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider  my-0 bg-white">
                
                <?php if($_SESSION['rol'] == 1){?>
                    <div class="sidebar-heading mt-3">
                        Gestor de Archivos
                    </div>

                    <li class="nav-item  <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'categoria') 
                            !== false) ? 'active' : ''; ?>">
                        <a class="nav-link" href="../categoria/index.php">
                            <i class="fa fa-folder-open  <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'categoria') 
                            !== false) ? 'text-primary' : ''; ?>"></i>
                            <span>Categorías</span> 
                        </a>
                    </li>
                    <li class="nav-item  <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'documentos') 
                            !== false) ? 'active' : ''; ?>">
                        <a class="nav-link" href="../documentos/index.php">
                        <i class="fa fa-download  <?php echo ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'documentos') 
                            !== false) ? 'text-primary' : ''; ?>"></i>
                        <span> Gestor</span>
                    </a>
                    </li>
                <?php }?>
                <hr class="sidebar-divider d-none d-md-block bg-white">

                <!--Alternar barra lateral-->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
        
            <!--Barra Superior-->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    <!--Barra Superior-->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <span><h2 class="ml-4 text-primary">PQDF</h2></span>
                        <!--Alternar barra lateral-->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!--Barra de navegacion de la barra superior-->
                        <ul class="navbar-nav ml-auto">
                            <!--Informacion de usuario-->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre'];?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                                </a>
                                <!--Desplegable-->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Salir
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <!--Contenido de la pagina de inicio-->
                    <!--<div class="container-fluid mt-4">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">-->