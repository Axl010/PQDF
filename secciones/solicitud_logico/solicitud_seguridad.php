<?php include("../../vistas/header.php")?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">    
            <h3 class="text-muted">Solicitud de Acceso Lógico de Seguridad</h3>
            <hr class="sidebar-divider bg-black">
            <form class="needs-validation" id="form_seguridad" novalidate>
                <div class="row mb-3">
                    <div class="form_grupo col-md-4">
                        <label for="nombre_usuario" class="form-label">Nombre *</label>
                        <input type="text" class="form_input form-control caracter" name="nombre_u" id="nombre_usuario" maxlength="28" required>
                        <div class="invalid-feedback">
                            Ingresa tu nombre y apellido
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <label for="cedula_usuario" class="form-label">Cédula *</label>
                        <input type="text" class="form-control numero" name="cedula_u" id="cedula_usuario" pattern="^\d{7,8}$" required>
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
                        <input type="text" class="form-control caracter" name="cargo_u" id="cargo_usuario" maxlength="17" required>
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
                    <textarea class="form-control" id="direccion" placeholder="Especifique la dirección de la oficina" maxlength="86" required></textarea>
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
                        <input type="text" class="form_input form-control caracter" name="proceso" id="proceso" maxlength="19" required>
                        <div class="invalid-feedback">
                            Ingresa un proceso
                        </div>  
                    </div>
                    <div class="form_grupo col-md-4">
                        <label for="region" class="form-label">Región *</label>
                        <input type="text" class="form_input form-control caracter" name="region" id="region" maxlength="15" required>
                        <div class="invalid-feedback">
                            Ingresa una region
                        </div>  
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="area" class="form-label">Área</label>
                        <input type="text" class="form-control caracter" name="area" id="area" maxlength="15">
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
                <h3 class="my-3 text-muted">Seleccione la solicitud que desea realizar</h3>
            
                <h3 class="mt-4 text-muted" style="text-align:center;">Firewall</h3>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="firewall" class="form-label">Solicitud</label>
                        <select class="form-select" id="firewall">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Crear</option>
                            <option value="2">Activar</option>
                            <option value="3">Desactivar</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="nivel_fire" class="form-label">Nivel</label>
                        <select class="form-select" id="nivel_fire">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Administrador</option>
                            <option value="2">Auditor</option>
                            <option value="3">Lectura</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="local_fire" class="form-label">Localidad</label>
                        <select class="form-select" id="local_fire">
                            <option value="">Seleccione una opción</option>
                            <option value="1">CPHC</option>
                            <option value="2">CPAMC</option>
                            <option value="3">CPJAA</option>
                            <option value="4">SEDE ADM</option>
                        </select>
                    </div>
                </div>

                <hr class="sidebar-divider bg-black">
                <h3 class="mt-4 text-muted" style="text-align:center;">Endpoint</h3>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="endpoint" class="form-label">Solicitud</label>
                        <select class="form-select" id="endpoint">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Crear</option>
                            <option value="2">Activar</option>
                            <option value="3">Desactivar</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="nivel_endpoint" class="form-label">Nivel</label>
                        <select class="form-select" id="nivel_endpoint">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Administrador</option>
                            <option value="2">Auditor</option>
                            <option value="3">Lectura</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="local_endpoint" class="form-label">Localidad</label>
                        <select class="form-select" id="local_endpoint">
                            <option value="">Seleccione una opción</option>
                            <option value="1">CPHC</option>
                            <option value="2">CPAMC</option>
                            <option value="3">CPJAA</option>
                            <option value="4">SEDE ADM</option>
                        </select>
                    </div>
                </div>

                <hr class="sidebar-divider bg-black">
                <h3 class="mt-4 text-muted" style="text-align:center;">ACM</h3>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="acceso" class="form-label">Solicitud</label>
                        <select class="form-select" id="acceso">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Crear</option>
                            <option value="2">Activar</option>
                            <option value="3">Desactivar</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="nivel_acceso" class="form-label">Nivel</label>
                        <select class="form-select" id="nivel_acceso">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Administrador</option>
                            <option value="2">Auditor</option>
                            <option value="3">Lectura</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="local_acceso" class="form-label">Localidad</label>
                        <select class="form-select" id="local_acceso">
                            <option value="">Seleccione una opción</option>
                            <option value="1">CPHC</option>
                            <option value="2">CPAMC</option>
                            <option value="3">CPJAA</option>
                            <option value="4">SEDE ADM</option>
                        </select>
                    </div>
                </div>

                <hr class="sidebar-divider bg-black">
                <h3 class="my-3 text-muted">Duración de la solicitud</h3>
                
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="fecha_a" class="form-label">Ingreso *</label>
                        <input type="date" class="form-control" id="fecha_a" required>
                        <div class="invalid-feedback">
                            Seleccione la fecha de ingreso
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fecha_b" class="form-label">Vencimiento *</label>
                        <input type="date" class="form-control" id="fecha_b" required>
                        <div class="invalid-feedback">
                            Seleccione la fecha de vencimiento
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="email" class="form-label">Correo de notificación</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com">
                        <div class="invalid-feedback">
                            Ingresa una dirección de correo electrónico válida
                        </div>
                    </div>
                </div>

                <div id="textarea-container">
                    <div class="row">
                        <div class="col">
                            <label for="motivo">Motivo de la Solicitud / Justificacion *</label>
                            <textarea class="form-control" id="motivo" placeholder="Especifique de manera detallada" maxlength="125" required></textarea>
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
                            <label for="motivo_${index}">Motivo de la Solicitud / Justificacion *</label>
                            <textarea class="form-control motivo" id="motivo_${index}" placeholder="Especifique de manera detallada" maxlength="125" required></textarea>
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
                        <input type="text" class="form-control" name="nombre_equipo" id="nombre_equipo" maxlength="20" required>
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
                            <label for="recurso">Recursos *</label>
                            <textarea class="form-control recursos" id="recurso" placeholder="Especifique los recursos los cuales requiere acceso (Direccion Completa)" maxlength="71" required></textarea>
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
                            maximo("Límite de 3 recursos <br>alcanzado","error")
                            return;
                        }

                        var index = contenidoRecursos.length + 1; // Obtener el índice
                        var newTextArea = document.createElement('div');
                        
                        newTextArea.classList.add('row');
                        newTextArea.innerHTML = `
                            <div class="col">
                                <label for="recursos_${index}" class="mt-2">Recursos *</label>
                                <textarea class="form-control recursos" id="recurso_${index}" placeholder="Especifique los recursos los cuales requiere acceso (Direccion Completa)" maxlength="71" required></textarea>
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
                <h3 class="my-3 text-muted">Datos del supervisor que autoriza al usuario</h3>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre_supervisor" class="form-label">Nombre *</label>
                        <input type="text" class="form_input form-control caracter" name="nombre_s" id="nombre_supervisor" maxlength="20" required>
                        <div class="invalid-feedback">
                            Ingresa tu nombre y apellido
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <label for="indicador_supervisor" class="form-label">Indicador *</label>
                        <input type="text" class="form-control caracter" name="indicador_s" id="indicador_supervisor" maxlength="15" required>
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
                        <input type="text" class="form-control caracter" name="cargo_s" id="cargo_supervisor" maxlength="13" required>
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
                    <div class="col-md-4">
                        <label for="extension_supervisor" class="form-label">Extensión *</label>
                        <input type="text" class="form-control numero" name="extension_s" id="extension_supervisor" maxlength="5" required>
                        <div class="invalid-feedback">
                            Ingresa una gerencia
                        </div>
                    </div>
                </div>

                <hr class="sidebar-divider bg-black">
                <h3 class="my-3 text-muted">Datos del gerente que autoriza al usuario</h3>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre_gerente" class="form-label">Nombre *</label>
                        <input type="text" class="form_input form-control caracter" name="nombre_g" id="nombre_gerente" maxlength="20" required>
                        <div class="invalid-feedback">
                            Ingresa tu nombre y apellido
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <label for="indicador_gerente" class="form-label">Indicador *</label>
                        <input type="text" class="form-control caracter" name="indicador_g" id="indicador_gerente" maxlength="15" required>
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
                        <input type="text" class="form-control caracter" name="cargo_g" id="cargo_gerente"  maxlength="13" required>
                        <div class="invalid-feedback">
                            Ingresa un cargo
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="gerencia_gerente" class="form-label">Gerencia *</label>
                        <input type="text" class="form-control caracter" name="gerencia_g" id="gerencia_gerente" maxlength="17"required>
                        <div class="invalid-feedback">
                            Ingresa una gerencia
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="extension_gerente" class="form-label">Extensión *</label>
                        <input type="text" class="form-control numero" name="extension_g" id="extension_gerente" maxlength="5" required>
                        <div class="invalid-feedback">
                            Ingresa una gerencia
                        </div>
                    </div>
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
            }

            // Agregar event listener para el botón "Submit"
            document.getElementById('submit-button').addEventListener('click', function(event) {
                // Ejecutar la función para reiniciar el array contenidoTextAreas
                reiniciarContenidoTextAreas();
            });
        </script>

        <!--Limitar fecha de ingreso y vencimiento-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            // Fecha de hoy mas un año
            const nextYearToday = new Date(today);
            nextYearToday.setFullYear(today.getFullYear() + 1);

            const diaActual = new Date(today);
            
            const fecha_a = document.getElementById('fecha_a');
            const fecha_b = document.getElementById('fecha_b');

            // Formatar la fecha en formato YYYY-MM-DD
            const formatDate = (date) => {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            };

            // Fecha maxima para el campo de fecha de ingreso (hoy)
            fecha_a.setAttribute('max', formatDate(today));
            // Fecha maxima para el campo de fecha de vencimiento (un año desde hoy)
            fecha_b.setAttribute('max', formatDate(nextYearToday));

            // Escuchar cambios en el campo de fecha de ingreso
            fecha_a.addEventListener('change', function() {
                const ingresoDate = new Date(this.value);

                // Fecha minima para el campo de fecha de vencimiento (fecha de ingreso seleccionada + 1 dia)
                ingresoDate.setDate(ingresoDate.getDate() + 1);
                fecha_b.setAttribute('min', formatDate(ingresoDate));
            
                if(fecha_b.value && new Date(fecha_b.value) < ingresoDate){
                    fecha_b.value = '';
                }
            });

            // Escuchar cambios en el campo de fecha de vencimiento
            fecha_b.addEventListener('change', function() {
                const ingresoDate = new Date(fecha_a.value);
                const vencimientoDate = new Date(this.value);

                if(vencimientoDate < ingresoDate) {
                   maximo("La fecha de vencimiento no puede ser anterior a la fecha de ingreso","error");
                   this.value = "";
                }
            });
        });
    </script>
        </div>
    </div>
</div>
<?php include("../../vistas/footer.php")?>