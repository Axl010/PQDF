<?php
    include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta=$conexion->prepare("
    SELECT documento.*, categorias.nombre AS categoria_nombre 
    FROM documento
    JOIN categorias ON documento.id_categoria = categorias.id
    "); 
    $consulta->execute();
    $lista_documento=$consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../vistas/header.php")?>
<?php if($_SESSION['rol'] == 1){?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
        <h2 style="text-align: center;" class="text-dark mb-4">Gestor de Archivos</h2>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivo">
                        <span class="fas fa-plus-circle"></span> Agregar Archivos
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable" width="100%">
                            <thead class="table-primary">
                                <tr class="text-center">
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">categoria</th>
                                    <th scope="col" class="text-center">Ruta del Archivo</th>
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Extensiones validas
                                    $extensionesValidas = array('pdf');

                                    foreach($lista_documento as $registro){
                                        $rutaDescarga = "archivos/".$registro['nombre'];
                                        $nombreArchivo = $registro['nombre'];
                                        $idArchivo = $registro['id'];
                                ?>
                                <tr>
                                    <td scope="row" class="text-center"><?php echo $registro['id']; ?></td>
                                    <td scope="row" class="text-center"><?php echo $registro['nombre']; ?></td>
                                    <td scope="row" class="text-center"><?php echo $registro['categoria_nombre']; ?></td>
                                    <td scope="row" class="text-center">
                                    <?php 
                                        $ruta = $registro['ruta'];
                                        $maxlength = 20;
                                        if(strlen($ruta) > $maxlength){
                                            echo substr($ruta, 0, $maxlength) . "...";
                                        } else{
                                        echo $ruta; 
                                        }
                                    ?>
                                    </td>
                                    <td scope="row" class="text-center"><?php echo $registro['fecha']; ?></td>
                                    <td scope="row">
                                        <?php
                                            for($i=0; $i < count($extensionesValidas); $i++){
                                                if($extensionesValidas[$i] == $registro['tipo']){
                                        ?>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#verDocumento" 
                                            onclick="obtenerDocumento(<?php echo $idArchivo?>)"><i class="fa fa-eye"></i></button>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <a href="<?php echo $rutaDescarga?>" download="<?php echo $nombreArchivo ?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarArchivo(<?php echo $idArchivo; ?>)"><i class="fas fa-trash-alt"></i></button>
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

<!--   Modal Ver Documento  -->
<div class="modal fade" id="verDocumento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="verDocumento">Vista Previa del Documento</h5>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="pdf-iframe" style="width: 100%; height: 500px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                
            </div>
            </form>
        </div>
    </div>                                    
</div>


<script type="text/javascript">
    function eliminarArchivo(idArchivo){
        Swal.fire({
            title: "Estas seguro de eliminar este archivo",
            text: "Una vez eliminado, no podrá recuperarse",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#304FFE",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "eliminar.php",
                    data: {idArchivo: idArchivo},
                    success: function(respuesta){
                        respuesta = respuesta.trim();
                        console.log(respuesta);
                        if(respuesta == 1){
                            maximoAgregar("Eliminado con exito","success");
                            setTimeout(() => {
                                location.reload(); // Recargar la pagina despues de 2 segundos
                            }, 1500);
                        } else{
                            maximoAgregar("Error al eliminar","error");
                        }
                    }
                });
            }
        });
    } 

    function obtenerDocumento(idArchivo){
        $.ajax({
            type:"POST",
            data: { idArchivo: + idArchivo},
            url:"obtenerDocumento.php",
            success: function(respuesta){
                var rutaPDF = respuesta.trim();
                $('#pdf-iframe').attr('src', rutaPDF + '#toolbar=0');
            },
            error: function(){
                $('#verDocumento .modal-body').html('<p>Hubo un error al cargar el documento.</p>');
            }
        });
    }
</script>

<?php }?>
<?php include("../../vistas/footer.php")?>
<?php include("agregar.php"); ?>
