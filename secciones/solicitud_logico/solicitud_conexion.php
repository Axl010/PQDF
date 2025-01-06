<?php include("../../vistas/header.php")?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">    
            <h3 class="text-muted">Solicitud de Acceso Lógico</h3>
            <hr class="sidebar-divider bg-black">
            <form class="needs-validation" id="form_logico" novalidate>
                <div class="row mb-3">
                    <div class="form_grupo col-md-4">
                        <label for="nombre_usuario" class="form-label">Nombre *</label>
                        <input type="text" class="form_input form-control caracter" name="nombre_u" id="nombre_usuario" maxlength="25" required>
                        <div class="invalid-feedback">
                            Ingresa tu nombre y apellido
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <label for="cedula_usuario" class=" form-label">Cédula *</label>
                        <input type="text" class="form-control numero" name="cedula_u" id="cedula_usuario" pattern="^\d{7,8}$" max="8" required>
                        <div class="invalid-feedback">
                            Número de cédula inválido
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="indicador_usuario" class="form-label">Indicador *</label>
                        <input type="text" class="form-control caracter" ncaraame="indicador_u" id="indicador_usuario" maxlength="13" required>
                        <div class="invalid-feedback">
                            Ingresa un indicador
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="localidad" class="form-label">Localidad*</label>
                        <select class="form-select" id="localidad" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Sede Corporativa">Sede Corporativa</option>
                            <option value="CPHC">CPHC</option>
                            <option value="CPAMC">CPAMC</option>
                            <option value="CPJAA">CPJAA</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opcion válida
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="cargo_usuario" class="form-label">Cargo *</label>
                        <input type="text" class="form-control caracter" name="cargo_u" id="cargo_usuario" maxlength="22" required>
                        <div class="invalid-feedback">
                            Ingresa un cargo
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="empleado" class="form-label">Empleado *</label>
                        <input type="text" class="form-control caracter" name="empleado" id="empleado" maxlength="17" placeholder="Ingresa el tipo de empleado" required>
                        <div class="invalid-feedback">
                            Ingresa el tipo de empleado
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="direccion">Direccion de oficina *</label>
                    <textarea class="form-control" id="direccion" placeholder="Especifique la dirección de la oficina" maxlength="85" required></textarea>
                    <div class="invalid-feedback">
                        Ingrese la dirección de la oficina
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="gerencia_usuario" class="form-label">Gerencia *</label>
                        <input type="text" class="form-control caracter" name="gerencia_u" id="gerencia_usuario" maxlength="20" required>
                        <div class="invalid-feedback">
                            Ingresa una gerencia
                        </div>
                    </div>
                    <div class="form_grupo col-md-4">
                        <label for="proceso" class="form-label">Proceso *</label>
                        <input type="text" class="form_input form-control caracter" name="proceso" id="proceso"  maxlength="18" required>
                        <div class="invalid-feedback">
                            Ingresa un proceso
                        </div>  
                    </div>
                    <div class="form_grupo col-md-4">
                        <label for="region" class="form-label">Region *</label>
                        <input type="text" class="form_input form-control caracter" name="region" id="region" maxlength="13" required>
                        <div class="invalid-feedback">
                            Ingresa una region
                        </div>  
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="area" class="form-label">Área *</label>
                        <input type="text" class="form-control caracter" name="area" id="area" maxlength="13" required>
                        <div class="invalid-feedback">
                            Ingresa una área válida
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <label for="extension" class="form-label">Extension *</label>
                        <input type="text" class="form-control numero" name="extension" id="extension" maxlength="5" required>
                        <div class="invalid-feedback">
                            Ingresa una extension válida
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="telefono" class="form-label">Teléfono *</label>
                        <input type="tel" class="form-control numero" name="telefono" id="telefono" pattern="(0412|0414|0416|0424|0426|0417|0421|0418|0413)[0-9]{7}" required>
                        <div class="invalid-feedback">
                            Número telefónico inválido
                        </div>
                    </div>
                </div>

                <hr class="sidebar-divider bg-black">
                <h3 class="mt-2 text-muted">Seleccione la Solicitud</h3>
                
                <div class="row mb-3 mt-4">
                    <div class="col-md-4">
                        <label for="internet" class="form-label">Acceso a Internet</label>
                        <select class="form-select" id="internet">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Asignar Privilegios</option>
                            <option value="2">Modificar Privilegios</option>
                            <option value="3">Activar / Crear Cuenta</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opcion válida
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="vpn" class="form-label">Acceso a VPN</label>
                        <select class="form-select" id="vpn">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Crear</option>    
                            <option value="2">Activar</option>
                            <option value="3">Desactivar</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una opcion válida
                        </div>
                    </div>
                </div>

                <div class="row mb-3" id="ocultarDiv">
                    <div id="servicio-container">
                        <div class="row">
                            <div class="col">
                                <label for="servicios" class="form-label">Acceso a Servicios *</label>
                                <input type="text" class="form-control caracter servicio" name="servicios" id="servicios" maxlength="30" required>
                                <div class="invalid-feedback">
                                    Ingresa los servicios
                                </div>
                            </div>
                            <div class="col-md-1 mt-4">
                                <button class="btn btn-primary" id="agregar-servicio" type="button">+</button>
                            </div>
                        </div>
                    </div>
        
                    <script>
                        // Array para almacenar el contenido de los textareas
                        var contenidoServicios = [];

                        // Función para agregar un nuevo textarea
                        function agregarServicio() {
                            var container = document.getElementById('servicio-container');
                            // Verificar si ya hay 3 textareas
                            if (container.querySelectorAll('.row').length >= 6) {
                                maximo("Límite de 6 servicios <br>alcanzado","error");
                                return;
                            }

                            var index = contenidoServicios.length + 1; // Obtener el índice
                            var newTextArea = document.createElement('div');
                            
                            newTextArea.classList.add('row');
                            newTextArea.innerHTML = `
                                <div class="col">
                                    <label for="servicios_${index}" class="form-label mt-2">Acceso a Servicios *</label>
                                    <input type="text" class="form-control caracter servicio" name="servicios" id="servicios_${index}" maxlength="30" required>
                                    <div class="invalid-feedback">
                                        Ingresa los servicios
                                    </div>
                                </div>
                                <div class="col-md-1 mt-4">
                                    <button class="eliminar-servicio btn btn-danger mt-2">X</button>
                                </div>
                            `;
                            container.appendChild(newTextArea);
                        }

                        // Función para eliminar un textarea
                        function eliminarTextArea(event) {
                            var textareaDiv = event.target.closest('.row');
                            textareaDiv.remove();
                        }

                        // Agregar event listener para el botón de agregar
                        document.getElementById('agregar-servicio').addEventListener('click', function(event) {
                            // Evitar que el formulario se envíe al hacer clic en el botón "Agregar TextArea"
                            event.preventDefault();
                            agregarServicio();
                        });

                        // Agregar event listener para los botones de eliminar
                        document.addEventListener('click', function(event) {
                            if (event.target.classList.contains('eliminar-servicio')) {
                                eliminarTextArea(event);
                            }
                        });
                    </script>
                </div>
                
                <div id="textarea-container">
                    <div class="row">
                        <div class="col mt-3">
                            <label for="motivo">Motivo de la Solicitud / Justificacion *</label>
                            <textarea class="form-control motivo" id="motivo" placeholder="Especifique el motivo de la solicitud (Especifique de manera detallada)" maxlength="122" required></textarea>
                            <div class="invalid-feedback">
                                Ingrese el motivo en el área de texto
                            </div>
                        </div>
                        <div class="col-md-1 mt-5">
                            <button class="btn btn-primary" id="agregar-textarea" type="button">+</button>
                        </div>
                    </div>
                </div>

                <script>
                // Array para almacenar el contenido de los textareas
                    var contenidoTextAreas = [];

                    // Función para agregar un nuevo textarea
                    function agregarTextArea() {
                        var container = document.getElementById('textarea-container');
                        // Verificar si ya hay 3 textareas
                        if (container.querySelectorAll('.row').length >= 6) {
                            maximo("Límite de 6 motivos <br>alcanzado","error");
                            return;
                        }

                        var index = contenidoTextAreas.length + 1; // Obtener el índice
                        var newTextArea = document.createElement('div');
                        
                        newTextArea.classList.add('row');
                        newTextArea.innerHTML = `
                            <div class="col">
                                <label for="motivo_${index}" class="mt-2">Motivo de la Solicitud / Justificacion *</label>
                                <textarea class="form-control motivo" id="motivo_${index}" placeholder="Especifique el motivo de la solicitud (Especifique de manera detallada)" maxlength="122" required></textarea>
                                <div class="invalid-feedback">
                                    Ingrese el motivo en el área de texto
                                </div>
                            </div>
                            <div class="col-md-1 mt-5">
                                <button class="eliminar-textarea btn btn-danger mt-2">X</button>
                            </div>
                        `;
                        container.appendChild(newTextArea);
                    }

                    // Función para eliminar un textarea
                    function eliminarTextArea(event) {
                        var textareaDiv = event.target.closest('.row');
                        textareaDiv.remove();
                    }

                    // Agregar event listener para el botón de agregar
                    document.getElementById('agregar-textarea').addEventListener('click', function(event) {
                        // Evitar que el formulario se envíe al hacer clic en el botón "Agregar TextArea"
                        event.preventDefault();
                        agregarTextArea();
                    });

                    // Agregar event listener para los botones de eliminar
                    document.addEventListener('click', function(event) {
                        if (event.target.classList.contains('eliminar-textarea')) {
                            eliminarTextArea(event);
                        }
                    });
                </script>

                <hr class="sidebar-divider bg-black">
                <h3 class="my-3 text-muted">Datos del equipo del usuario</h3>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre_equipo" class="form-label">Nombre del Equipo*</label>
                        <input type="text" class="form-control" name="nombre_equipo" id="nombre_equipo" maxlength="24" required>
                        <div class="invalid-feedback">
                            Ingresa el nombre del equipo
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="ip" class=" form-label">Direccion IP *</label>
                        <input type="text" class="form-control ip" name="ip" id="ip" pattern="\b(?:\d{1,3}\.){3}\d{1,3}\b" placeholder="255.255.255.255" required>
                        <div class="invalid-feedback">
                            Ingrese una direccion IP válida
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <label for="mac" class="form-label">MAC *</label>
                        <input type="text" class="form-control" name="mac" id="mac" placeholder="xx:xx:xx:xx:xx:xx" maxlength="17" required>
                        <div class="invalid-feedback">
                            dirección mac inválida
                        </div>
                    </div>
                </div>

                <div id="textarea-recursos">
                    <div class="row">
                        <div class="col">
                            <label for="recursos">Recursos *</label>
                            <textarea class="form-control recursos" id="recurso" placeholder="Especifique los recursos los cuales requiere acceso (Direccion Completa)" maxlength="74" required></textarea>
                            <div class="invalid-feedback">
                                Ingrese los recursos en el área de texto
                            </div>
                        </div>
                        <div class="col-md-1 mt-5">
                            <button class="btn btn-primary" id="agregar-recursos" type="button">+</button>
                        </div>
                    </div>
                </div>

                <script>
                    // Array para almacenar el contenido de los textareas
                    var contenidoRecursos = [];

                    // Función para agregar un nuevo textarea
                    function agregarTextAreaRecursos() {
                        var container = document.getElementById('textarea-recursos');
                        // Verificar si ya hay 3 textareas
                        if (container.querySelectorAll('.row').length >= 3) {
                            maximo("Límite de 3 recursos <br>alcanzado","error");
                            return;
                        }

                        var index = contenidoRecursos.length + 1; // Obtener el índice
                        var newTextArea = document.createElement('div');
                        
                        newTextArea.classList.add('row');
                        newTextArea.innerHTML = `
                            <div class="col">
                                <label for="recursos_${index}" class="mt-2">Recursos *</label>
                                <textarea class="form-control recursos" id="recurso_${index}" placeholder="Especifique los recursos los cuales requiere acceso (Direccion Completa)" maxlength="74" required></textarea>
                                <div class="invalid-feedback">
                                    Ingrese los recursos en el área de texto
                                </div>
                            </div>
                            <div class="col-md-1 mt-5">
                                <button class="eliminar-recursos btn btn-danger mt-2">X</button>
                            </div>
                        `;
                        container.appendChild(newTextArea);
                    }

                    // Función para eliminar un textarea
                    function eliminarTextArea(event) {
                        var textareaDiv = event.target.closest('.row');
                        textareaDiv.remove();
                    }

                    // Agregar event listener para el botón de agregar
                    document.getElementById('agregar-recursos').addEventListener('click', function(event) {
                        // Evitar que el formulario se envíe al hacer clic en el botón "Agregar TextArea"
                        event.preventDefault();
                        agregarTextAreaRecursos();
                    });

                    // Agregar event listener para los botones de eliminar
                    document.addEventListener('click', function(event) {
                        if (event.target.classList.contains('eliminar-recursos')) {
                            eliminarTextArea(event);
                        }
                    });
                </script>

                <hr class="sidebar-divider bg-black">
                <h3 class="my-3 text-muted">Datos del dispositivo Móvil</h3>
               
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="marca" class="form-label">Marca *</label>
                        <input type="text" class="form-control caracter" name="marca" id="marca" maxlength="14" required>
                        <div class="invalid-feedback">
                            Ingrese la marca del equipo
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" name="modelo" id="modelo" maxlength="17">
                    </div>
                    <div class="col-md-3">
                        <label for="sistema" class="form-label">Sistema Operativo</label>
                        <input type="text" class="form-control" name="sistema" id="sistema" maxlength="17">
                    </div>
                    <div class="col-md-3">
                        <label for="activo" class="form-label">Activo pequiven *</label>
                        <select class="form-select" id="activo" required>
                            <option value="">Seleccione una opcion</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>

                <hr class="sidebar-divider bg-black">
                <h3 class="my-3 text-muted">Datos del supervisor que autoriza al usuario</h3>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre_supervisor" class="form-label">Nombre *</label>
                        <input type="text" class="form_input form-control caracter" name="nombre_s" id="nombre_supervisor" maxlength="22" required>
                        <div class="invalid-feedback">
                            Ingresa tu nombre y apellido
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <label for="indicador_supervisor" class="form-label">Indicador *</label>
                        <input type="text" class="form-control caracter" name="indicador_s" id="indicador_supervisor" maxlength="13" required>
                        <div class="invalid-feedback">
                            Ingresa el indicador
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="cedula_supervisor" class=" form-label">Cédula *</label>
                        <input type="text" class="form-control numero" name="cedula_s" id="cedula_supervisor" pattern="^\d{7,8}$" required>
                        <div class="invalid-feedback">
                            Número de cédula inválido
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cargo_supervisor" class="form-label">Cargo *</label>
                        <input type="text" class="form-control caracter" name="cargo_s" id="cargo_supervisor" maxlength="15" required>
                        <div class="invalid-feedback">
                            Ingresa un cargo
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="gerencia_supervisor" class="form-label">Gerencia *</label>
                        <input type="text" class="form-control caracter" name="gerencia_s" id="gerencia_supervisor" maxlength="17" required>
                        <div class="invalid-feedback">
                            Ingresa una gerencia
                        </div>
                    </div>
                    <!-- FIRMA -->
                </div>

                <hr class="sidebar-divider bg-black">
                <h3 class="my-3 text-muted">Datos del gerente que autoriza al usuario</h3>
               
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre_gerente" class="form-label">Nombre *</label>
                        <input type="text" class="form_input form-control caracter" name="nombre_g" id="nombre_gerente" maxlength="22" required>
                        <div class="invalid-feedback">
                            Ingresa tu nombre y apellido
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <label for="indicador_gerente" class="form-label">Indicador *</label>
                        <input type="text" class="form-control caracter" name="indicador_g" id="indicador_gerente" maxlength="13" required>
                        <div class="invalid-feedback">
                            Ingresa el indicador
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="cedula_gerente" class=" form-label">Cédula *</label>
                        <input type="text" class="form-control numero" name="cedula_g" id="cedula_gerente" pattern="^\d{7,8}$" required>
                        <div class="invalid-feedback">
                            Número de cédula inválido
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cargo_gerente" class="form-label">Cargo *</label>
                        <input type="text" class="form-control caracter" name="cargo_g" id="cargo_gerente" maxlength="15"required>
                        <div class="invalid-feedback">
                            Ingresa un cargo
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="gerencia_gerente" class="form-label">Gerencia *</label>
                        <input type="text" class="form-control caracter" name="gerencia_g" id="gerencia_gerente" maxlength="17" required>
                        <div class="invalid-feedback">
                            Ingresa una gerencia
                        </div>
                    </div>
                    <!-- FIRMA -->
                </div>

                <?php if(isset($mensaje)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensaje;?></strong> 
                    </div>
                <?php }?>
                <button type="submit" class="btn btn-primary mt-2 mb-3" id="submit-button"><i class="fa fa-download"></i> Generar PDF</button>
            </form>
            <script>
                // Función para reiniciar el array contenidoTextAreas a un estado vacío
                function reiniciarContenidoTextAreas() {
                    contenidoTextAreas = []; // Reiniciar el array a un estado vacío
                    contenidoRecursos = [];
                    contenidoServicios = [];
                }

                // Agregar event listener para el botón "Submit"
                document.getElementById('submit-button').addEventListener('click', function(event) {
                    // Ejecutar la función para reiniciar el array contenidoTextAreas
                    reiniciarContenidoTextAreas();
                });
            </script>
        </div>
    </div>
</div>
<script src="mostrar_inputs.js"></script>
<?php include("../../vistas/footer.php")?>