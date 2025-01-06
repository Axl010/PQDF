<?php
    include("../../bd/conexion.php");
    $objeto= new Conexion();
    $conexion=$objeto->Conectar();

    //Contar usuarios existentes
    $cont_usuario=$conexion->prepare("SELECT *, count(*) as n_usuarios FROM usuarios");
    $cont_usuario->execute(); 
    $registro_usuario=$cont_usuario->fetch(PDO::FETCH_LAZY);

    //Contar categorias
    $cont_categorias=$conexion->prepare("SELECT *, count(*) as n_categorias FROM categorias");
    $cont_categorias->execute();
    $registro_categorias=$cont_categorias->fetch(PDO::FETCH_LAZY);

    //Contar Documentos
    $cont_document=$conexion->prepare("SELECT *, count(*) as n_document FROM documento");
    $cont_document->execute();
    $registro_document=$cont_document->fetch(PDO::FETCH_LAZY);
?>
<?php include("../../vistas/header.php"); ?>
<style>
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .text-xs {
        text-decoration: none;
    }

    .text-xs:hover {
        text-decoration: underline;
    }
</style>
<div class="container-fluid">
    <div class="col-md-12">    
        <section class="section">
            <div class="section-header">
                <!--<h3 class="page_heading text-dark">Dashboard</h3>-->
            </div>
            <div class="section-body">
                <div class="row">
                <?php if($_SESSION['rol'] == 1){?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="../usuarios/index.php" style="text-decoration: none;">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body ml-2">
                                    <div class="row no-gutters align-items-center mr-1">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Usuarios</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $registro_usuario["n_usuarios"]?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users f-left fa-2x text-gray-400"></i>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    
                    </div>
                <?php }?>
                </div>   

                <div class="row">
                    <h3 class="text-muted mb-4">SOLICITUDES</h3>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="../inspeccion_equipo/inspeccion_equipo.php" style="text-decoration: none;">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body ml-2">
                                    <div class="row no-gutters align-items-center mr-1">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Acta de Inspección de Equipo</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-file-pdf f-left fa-2x text-gray-400"></i>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="../solicitud_logico/solicitud_conexion.php" style="text-decoration: none;">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body ml-2">
                                    <div class="row no-gutters align-items-center mr-1">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Solicitud de Acceso Lógico</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-file-pdf f-left fa-2x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="../solicitud_logico/solicitud_seguridad.php" style="text-decoration: none;">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body ml-2">
                                    <div class="row no-gutters align-items-center mr-1">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dispositivos de seguridad</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-file-pdf f-left fa-2x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> 
                
            <?php if($_SESSION['rol'] == 1){?>

                <div class="row">
                    <h3 class="text-muted mb-4">Gestor de Archivos</h3>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="../categoria/index.php" style="text-decoration: none;">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body ml-2">
                                    <div class="row no-gutters align-items-center mr-1">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Categorías</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $registro_categorias['n_categorias']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-folder-open f-left fa-2x text-gray-400"></i>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="../documentos/index.php" style="text-decoration: none;">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body ml-2">
                                    <div class="row no-gutters align-items-center mr-1">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text text-danger text-uppercase mb-1">Gestor</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $registro_document['n_document']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-download f-left fa-2x text-gray-400"></i>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php }?>
            </div>
        </section>
    </div>
</div>
<?php include("../../vistas/footer.php"); ?> 