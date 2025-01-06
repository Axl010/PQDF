<?php 
   try{
        $consulta = $conexion->prepare("SELECT * FROM categorias");
        $consulta->execute();
        $lista_categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
   }
?>

<div class="modal fade" id="modalAgregarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-tittle mt-2" id="exampleModalLabel">Agregar Archivos</h5>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmArchivos" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="selec_categoria" class="form-label">categoria *</label>
                            <select class="form-select" id="selec_categoria" name="selec_categoria" required>
                                <option value="">Seleccione una opción</option>
                                <?php foreach($lista_categorias as $categoria){?>
                                    <option value="<?php echo $categoria['id']?>"><?php echo $categoria['nombre']; ?></option>
                                    <?php echo $categoria['id'];?>
                                <?php }?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una categoría para el archivo
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="archivos" class="form-label">Archivo</label>
                            <input type="file" name="archivos[]" id="archivos" class="form-control" multiple required>
                            <div class="invalid-feedback">
                                Seleccione un archivo PDF
                            </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardarArchivos" name="btnGuardarArchivos">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnGuardarArchivos').click(function(){
            var categoria = $('#selec_categoria').val();
            var archivos = $('#archivos').val();
            var isValid = true;

            if (categoria === "") {
                $('#selec_categoria').addClass('is-invalid');
                isValid = false;
            } else {
                $('#selec_categoria').removeClass('is-invalid');
            }

            if (archivos === "") {
                $('#archivos').addClass('is-invalid');
                isValid = false;
            } else {
                $('#archivos').removeClass('is-invalid');
            }

            if (!isValid) {
                return;
            }

            var formData = new FormData(document.getElementById('frmArchivos'));

            $.ajax({
                url:"guardarArchivos.php",
                type: "POST",
                datatype: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta){
                    console.log(respuesta);

                    if(respuesta.success && respuesta.success.length > 0){
                        var successMessage = respuesta.success.join("<br>");
                        alerta(successMessage, "success");
                    }

                    if(respuesta.errors && respuesta.errors.length > 0){
                        var errorMessage = respuesta.errors.join("<br>");
                        alerta(errorMessage, "error");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error en la solicitud: ", textStatus, errorThrown);
                    alerta("Ocurrió un error al intentar agregar los archivos.","error");
            }
            });
        });
    });
</script>

