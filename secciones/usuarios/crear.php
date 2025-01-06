<?php include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
    if($_POST){
        print_r($_POST);

        //Obtener datos del metodo POST
        $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
        $nombre_usuario=(isset($_POST["nombredelusuario"])?$_POST["nombredelusuario"]:"");
        $contrasena=(isset($_POST["password_form"])?$_POST["password_form"]:"");
        $rol=(isset($_POST["rol"])?$_POST["rol"]:"");

        $pass= hash('sha256', $contrasena);
        //Preparar insercion de datos

        $sentencia=$conexion->prepare("INSERT INTO usuarios(id,nombre,usuario,password,rol) VALUES (NULL,:nombre,:nombredelusuario,:password_form,:rol)");
            
        //Asignando valores que vienen del metodo POST (Los que vienen del formulario)
        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":nombredelusuario",$nombre_usuario);
        $sentencia->bindParam(":password_form",$pass);
        $sentencia->bindParam(":rol",$rol);
        $sentencia->execute();

        $mensaje="Registro Agregado";
        header("Location:index.php?mensaje=".$mensaje);
    }

    $consulta=$conexion->prepare("SELECT * FROM permisos");
    $consulta->execute();
    $lista_rol=$consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../vistas/header.php"); ?>
<?php if($_SESSION['rol'] == 1){?>
<br/>

<div class="container-fluid mt-4">
<div class="row">
<div class="col-md-8 offset-md-2">

<div class="card">
    <div class="card-header">
        Datos del usuario
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre y Apellido</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresa tu nombre y apellido" required/>
                <div class="invalid-feedback">
                    Ingresa el nombre y el apellido
                </div>  
            </div>
            <div class="mb-3">
                <label for="nombredelusuario" class="form-label">Nombre del usuario</label>
                <input type="text" class="form-control" name="nombredelusuario" id="nombredelusuario" aria-describedby="helpId" placeholder="Nombre del usuario" required/>
                <div class="invalid-feedback">
                    Ingresa el nombre del usuario
                </div>  
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password_form" id="password_form" aria-describedby="helpId" placeholder="Escriba su contraseña" required/>
                <div class="invalid-feedback">
                    Ingresa una contraseña válida
                </div> 
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Rol *</label>
                <select class="form-select" id="rol" name="rol" required>
                    <option value="">Seleccione una opción</option>
                    <?php foreach($lista_rol as $opciones){?>
                        <option value="<?php if($opciones['rol'] == "Admin"){echo 1;}else{echo 2;}?>"><?php echo $opciones['rol']; ?></option>
                    <?php }?>
                </select>
                <div class="invalid-feedback">
                    Seleccione una opción válida
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a type="submit" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php }?>
<?php include("../../vistas/footer.php"); ?>