<?php 
    include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //Verificar y localizar el id
    if(isset($_GET['txtID'])){
        $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM usuarios WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();

        //Almacenar registros con la consulta
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        //Almacenamiento de datos
        $nombre=$registro['nombre'];
        $nombre_usuario=$registro["usuario"];
        $contrasena=$registro["password"];
        $rol=$registro["rol"];
    }
    $pass="";
    if(isset($_POST['password_form'])){
        //Obtener datos del metodo POST
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
        $nombre_usuario=(isset($_POST["nombredelusuario"])?$_POST["nombredelusuario"]:"");
        $contrasena=(isset($_POST["password_form"])?$_POST["password_form"]:"");
        $rol=(isset($_POST["rol"])?$_POST["rol"]:"");

        //Verificar si se ingresó una nueva contraseña 
        if(!empty($contrasena)){
            $pass = hash('sha256', $contrasena);
        }
        else{
            //Conservar la contraseña si no se ingresó una nueva
            $sentencia = $conexion->prepare("SELECT password FROM usuarios WHERE id=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            $registro = $sentencia->fetch(PDO::FETCH_LAZY);
            $pass = $registro['password'];
        }

        //Preparar Actualizacion de datos
        $sentencia=$conexion->prepare("UPDATE usuarios SET nombre=:nombre, usuario=:nombredelusuario,password=:password_form, rol=:rol WHERE id=:id");
            
        //Asignando valores que vienen del metodo POST (Los que vienen del formulario)
        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":nombredelusuario",$nombre_usuario);
        $sentencia->bindParam(":password_form",$pass);
        $sentencia->bindParam(":rol",$rol);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();

        $mensaje="Registro Actualizado";
        header("Location:index.php?mensaje=".$mensaje);
    }

    //Roles
    $consulta=$conexion->prepare("SELECT * FROM permisos");
    $consulta->execute();
    $lista_rol=$consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../vistas/header.php")?>
<?php if($_SESSION['rol'] == 1){?>
<br/>

<div class="container-fluid mt-4">
<div class="row">
<div class="col-md-8 offset-md-2">

<div class="card">
    <div class="card-header">
        Editar usuario
    </div>
    <div class="card-body">
        <form method="post" class="needs-validation" enctype="multipart/form-data" novalidate>

            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input input="text" value="<?php echo $txtID?>" readonly class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID"/>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre y Apellido</label>
                <input type="text" value="<?php echo $nombre?>" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresa tu nombre y apellido"/>
            </div>
            <div class="mb-3">
                <label for="nombredelusuario" class="form-label">Nombre del usuario</label>
                <input type="text" value="<?php echo $nombre_usuario?>" class="form-control" name="nombredelusuario" id="nombredelusuario" aria-describedby="helpId" placeholder="Nombre del usuario"/>
            </div>
            <div class="mb-3">
                <label for="password_form" class="form-label">Contraseña</label>
                <input type="password" value="<?php echo $pass?>" class="form-control" name="password_form" id="password_form" aria-describedby="helpId" placeholder="Ingresa la contraseña"/>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol *</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="">Seleccione una opción</option>
                    <?php foreach($lista_rol as $opciones){?>
                        <option value="<?php if($opciones['rol'] == "Admin"){echo 1;}else{echo 2;} ?>"><?php echo $opciones['rol']; ?></option>
                    <?php }?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a type="submit" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php }?>
<?php include("../../vistas/footer.php")?>