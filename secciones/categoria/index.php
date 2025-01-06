<?php
    include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    if($_POST){
        if(isset($_POST['nombre'])){ 
            $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");

            $consulta_existencia = $conexion->prepare("SELECT COUNT(*) FROM categorias WHERE nombre = :nombre");
            $consulta_existencia->bindParam(":nombre", $nombre);
            $consulta_existencia->execute();
            $existe_categoria = $consulta_existencia->fetchColumn();

            if($existe_categoria){
                $mensaje="Ya existe una categoría con este nombre";
                header("Location: index.php?mensaje=".$mensaje);
            } else{
                $sentencia=$conexion->prepare("INSERT INTO categorias(id, nombre) VALUES (NULL,:nombre)");
                $sentencia->bindParam(":nombre",$nombre);
                
                if($sentencia->execute()){
                    $mensaje="Categoría Agregada Correctamente";
                    header("Location: index.php?mensaje=".$mensaje);
                } else{
                    $mensaje="Error al agregar la categoría";
                    header("Location: index.php?mensaje=".$mensaje);
                }
            }
            
        }
    }

    //Verificar y localizar el id
    if(isset($_GET['txtID'])){
        //Obtener id
        $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
        //Consulta
        $sentencia=$conexion->prepare("DELETE FROM categorias WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }

    $consulta=$conexion->prepare("SELECT * FROM categorias");
    $consulta->execute();
    $lista_categoria=$consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../vistas/header.php")?>
<?php if($_SESSION['rol'] == 1){?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h2 style="text-align: center;" class="mb-4">Categorías</h2>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCategoria">
                        <span class="fas fa-plus-circle"></span> Agregar Categoria
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($lista_categoria as $registro){
                                ?>
                                <tr>
                                    <td scope="row" class="text-center"><?php echo $registro['id']; ?></td>
                                    <td scope="row" class="text-center"><?php echo $registro['nombre']; ?></td>
                                    <td scope="row" class="text-center"><?php echo $registro['fechaInsert']; ?></td>
                                    <td scope="row" class="text-center">
                                        <button type="button" class="btn btn-primary btn-editar btn-sm" data-toggle="modal"
                                        data-target="#editarCategoria<?php echo $registro['id']; ?>">
                                            <span class="fas fa-edit"></span>
                                        </button>
                                        <a href="javascript:borrar(<?php echo $registro['id']; ?>);" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!--    Modal Editar Categoria -->
                                <div class="modal fade" id="editarCategoria<?php echo $registro['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="editarCategoria">Editar Categoría</h5>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="editar_categoria.php" method="post">
                                                    <label for="nuevoNombre" class="form-label">Nombre de la Categoría</label>
                                                    <input class="form-control" type="text" name ="nuevoNombre" id="nuevoNombre" value="<?php echo $registro['nombre']; ?>" placeholder="Ingresa el nuevo nombre de la categoría">
                                                    <input type="hidden" name="id_categoria" value="<?php echo $registro['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>                                    
                                </div>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--    Modal Agregar Categoria -->
<div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title" id="modalCategoria">Agregar Nueva Categoría</h4>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  method="post">
                    <label for="nombre" class="form-label">Nombre de la Categoría</label>
                    <input class="form-control" type="text" name ="nombre" id="nombre" placeholder="Ingresa el nuevo nombre de la categoría">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>                                    
</div>


<?php }?>
<?php include("../../vistas/footer.php")?>