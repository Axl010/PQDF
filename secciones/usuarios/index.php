<?php
    include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //Verificar y localizar el id
    if(isset($_GET['txtID'])){
        //Obtener id
        $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
        //Consulta
        $sentencia=$conexion->prepare("DELETE FROM usuarios WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }

    $sentencia=$conexion->prepare("SELECT * FROM usuarios");
    $sentencia->execute();
    $lista_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../vistas/header.php"); ?>

<?php if($_SESSION['rol'] == 1){?>

<div class="container-fluid mt-4">
<div class="row">
<div class="col-md-10 offset-md-1">
<h2 style="text-align: center;" class="text-dark mb-4">Gestor de Usuarios</h2>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">
            <span class="fas fa-plus-circle"></span> Agregar Usuario
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="datatable">
                <thead class="table-primary">
                    <tr style="text-align: center;">
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Usuario</th>
                        <th scope="col" class="text-center">Contraseña</th>
                        <th scope="col" class="text-center">Rol</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_usuarios as $registro){ ?>
                        <tr class="">
                            <td scope="row" class="text-center"><?php echo $registro['id']; ?></td>
                            <td scope="row" class="text-center"><?php echo $registro['nombre']; ?></td>
                            <td scope="row" class="text-center"><?php echo $registro['usuario']; ?></td>
                            <td scope="row" class="text-center">
                                <?php 
                                    $password = $registro['password'];
                                    $maxlength = 10;
                                    if(strlen($password) > $maxlength){
                                        echo substr($password, 0, $maxlength) . "...";
                                    } else{
                                        echo $password; 
                                    }
                                ?>
                            </td>  
                            <td>
                                <?php 
                                    $num=$registro['rol'];
                                    switch($num){
                                        case 1: echo'Admin';break;
                                        case 2: echo'Editor';break;
                                    }
                                ?>
                            </td>   
                            <td>
                                <a class="btn btn-primary btn-sm" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button"><i class="fas fa-edit"></i></fa-edit></a>
                                <a class="btn btn-danger btn-sm" href="javascript:borrar(<?php echo $registro['id']; ?>);" role="button"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php }?>       
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?php } ?>
<?php include("../../vistas/footer.php"); ?>

