                </div>
        
                <!--Footer-->
                <footer class="sticky-footer bg-white mt-4">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span><h5 class="text-primary">&copy; PQDF 2024</h5></span>
                        </div>
                    </div>
                </footer>
            </div> 
        </div>

        <!--Desplazarse hasta el boton superior-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!--Cerrar sesion modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Listo para Salir?</h5>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="../../bd/logout.php">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            $conn->close();
        ?>

        <!--    Tamaño de SweetAlert    -->
        <style>
            .style-swal{
                width: 450px;
                height: 280px;
            }
        </style>

        <script src="../../jquery/jquery-3.7.1.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>

        <!--Sweet Alert-->
        <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>

        <!--JsPDF-->
        <script src="../../js/jspdf.min.js"></script>

        <!--PDF-->
        <script src="../../js/pdf.js"></script>

        <!--Validacion de formularios-->
        <script src="../../js/validacion.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../plugins/jquery-easing/jquery.easing.min.js"></script>
        <script src="../../js/sb-admin-2.min.js"></script>
        <script src="../../js/jspdf.min"></script>

        <!-- dataTables -->
        <script src="../../plugins/datatable/dataTables.js"></script>
        <script src="../../plugins/datatable/dataTables.bootstrap5.js"></script>
        
        <script>
            function maximoAgregar(mensaje, tipo) {
                Swal.fire({
                    icon: tipo,
                    title: mensaje,
                    timer: 1500,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'style-swal'
                    }
                }).then(() => {
                    location.reload();
                });
            }
            function maximo(mensaje, tipo) {
                Swal.fire({
                    icon: tipo,
                    title: mensaje,
                    timer: 1500,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'style-swal'
                    }
                })
            }

            function alerta(mensaje, tipo){
                Swal.fire({
                    title: tipo == "success" ? "Éxito" : "Error",
                    html: mensaje,
                    icon: tipo,
                    confirmButtonText: 'Aceptar',
                    timer: 1500,
                    showConfirmButton: false,
                }).then(() => {
                    location.reload();
                });
            }
        </script>
        <?php                  
            //Verificar si se ha enviado un mensaje
            if(isset($_GET['mensaje'])){
            //verificar si es la primera vez que se envia un mensaje
            if(!isset($_SESSION['mensaje_mostrado']) || $_SESSION['mensaje_mostrado']) {
                $_SESSION['mensaje_mostrado'] = $_GET['mensaje'];
                $icono = "success"; // Por defecto
                // Verificar el tipo de mensaje y asignar el icono correspondiente
                if(strpos($_GET['mensaje'],'Error') !== false){
                    $icono = "error";
                } elseif(strpos($_GET['mensaje'], 'existe') !== false){
                    $icono = "warning";
                }
        ?>
                <script>
                    Swal.fire({
                        icon:"<?php echo $icono; ?>", 
                        title:"<?php echo $_GET['mensaje']; ?>",
                        timer: 1500,
                        showConfirmButton: false,
                        customClass: {
                            popup: "style-swal"
                        }
                    }).then(() => {
                        window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
                    });
                </script> 
        <?php }}?>
        
        <?php
            //Verificar si el input no esta vacio
            if(isset($_GET['alerta'])){
            //verificar si es la primera vez que se envia un mensaje
            if(!isset($_SESSION['alerta_mostrada']) || $_SESSION['alerta_mostrada']){
                $_SESSION['alerta_mostrada'] = $_GET['alerta'];?>
                <script>
                    Swal.fire({icon:"warning", 
                        title:"<?php echo $_GET['alerta']; ?>",
                        timer: 1500,
                        showConfirmButton: false,
                        customClass: {
                            popup: "style-swal"
                        }
                    }).then(() => {
                        window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
                    });
                </script>
        <?php }}?>

        <!-- Alerta de Borrado-->
        <script>
            function borrar(id){
                Swal.fire({
                    title: 'Desea borrar el registro?',
                    showCancelButton: true,
                    confirmButtonColor: "#304FFE",
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location="index.php?txtID="+id;
                    }
                })
            }

            function editar(id){
                window.location="index.php?idEditar="+id;
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#datatable').DataTable({
                    "pageLength":5,
                    lengthMenu:[
                        [5,10,25,50,100],
                        [5,10,25,50,100]
                    ],
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                    }
                });
            });
        </script>

        <!--Validacion de caracteres-->
        <script>
            const caracter = document.querySelectorAll(".caracter");
            caracter.forEach(input => {
                input.addEventListener("keypress",function(event) {
                    const charCode = event.charCode;
                    //Verificar si el codigo de caracteres corresponde a una letra
                    if(!(charCode >= 65 && charCode <=90) && !(charCode >= 97 && charCode <= 122) && charCode !== 32){
                        event.preventDefault(); //Evitar que se ingrese el caracter no deseado
                    }
                });
            });
        </script>
    
        <!--Validacion numerica-->
        <script>
            const telnumero = document.querySelectorAll(".numero");
            telnumero.forEach(input => {
                input.addEventListener("keypress", function(event) {
                    const charCode = event.charCode;
                    const value = input.value;
                    //Permitir solo números, espacios, guiones y paréntesis
                    if(!(charCode >= 48 && charCode <= 57) && //numeros
                        charCode !== 32 &&  //espacio
                        charCode !== 45 &&  //guión
                        charCode !== 40 &&  //paréntesis izquierdo
                        charCode !== 41) {  //paréntesis derecho
                        event.preventDefault();
                        } 
                    if((value.length >= 14) && (charCode !== 8 && charCode !== 0)){
                        event.preventDefault();
                    }
                });
            });
        </script>

        <!-- Mantener el menu abierto-->
        <script> 
            $(document).ready(function () { 
                $(document).click(function (event) { 
                    var clickover = $(event.target); 
                    var $navbar = $("#collapseUtilities"); 
                    var _opened = $navbar.hasClass("show"); 
                    if (_opened === true && !clickover.closest('#accordionSidebar').length) { 
                        $navbar.collapse('hide'); 
                    } 
                }); 
            });  
        </script>
    </body>
</html>