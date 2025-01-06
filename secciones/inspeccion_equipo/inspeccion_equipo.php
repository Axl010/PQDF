<?php include("../../vistas/header.php"); ?>
<div class="container-fluid mt-4">
    <div class="row">
    <div class="col-md-8 offset-md-2">    
    
    <h3 class="text-muted">Acta de Inspección de Equipo</h3>
    <hr class="sidebar-divider bg-black">
    <form class="needs-validation" id="form" enctype="multipart/form-data" novalidate>
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
            <div class="col-md-3">
                <label for="hora_a" class="form-label">Entrada *</label>
                <input type="time" class="form-control" id="hora_a" required>
                <div class="invalid-feedback">
                    Especifique la hora de entrada
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="lugar" class="form-label">Lugar *</label>
                <select class="form-select" id="lugar" required>
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
                <div>
                    <label for="personal" class="form-label">Personal *</label>
                    <select class="form-select" id="personal" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="visitante">Visitante</option>
                        <option value="trabajador">Trabajador</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione una opción válida
                    </div>
                </div>
            </div>
        </div>

        <hr class="sidebar-divider bg-black ">
        <h3 class="my-3 text-muted">Datos Personales</h3>
        <div class="row mb-3">
            <div class="form_grupo col-md-4">
                <label for="nombre" class="form-label">Nombre y Apellido*</label>
                <input type="text" class="form_input form-control caracter" name="nombre" id="nombre" maxlength="25" required>
                <div class="invalid-feedback">
                    Ingresa un nombre
                </div>  
            </div>
            <div class="col-md-4">
                <label for="cedula" class=" form-label">Cédula *</label>
                <input type="text" class="form-control numero" name="cedula" id="cedula" pattern="^\d{7,8}$" required>
                <div class="invalid-feedback">
                    Número de cédula inválido
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

        <div class="mb-4">
            <label for="email" class="form-label">Dirección de correo electrónico</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com" maxlength="35">
            <div class="invalid-feedback">
                Ingresa una dirección de correo electrónico válida
            </div>
        </div>
    
        <div class="row mb-3" id="ocultarDiv">
            <div class="col-md-3">
                <label for="cargo" class="form-label">Cargo *</label>
                <input type="text" class="form-control caracter" name="cargo" id="cargo" maxlength="21" required disabled>
                <div class="invalid-feedback">
                    Ingresa un cargo
                </div>
            </div>
            <div class="col-md-3">
                <label for="extension" class="form-label">Extensión *</label>
                <input type="text" class="form-control numero" name="extension" id="extension" maxlength="5" required disabled>
                <div class="invalid-feedback">
                    Ingresa una extensión
                </div>
            </div>
            <div class="col-md-3">
                <label for="indicador" class="form-label">Indicador *</label>
                <input type="text" class="form-control caracter" name="indicador" id="indicador" maxlength="18" required disabled>
                <div class="invalid-feedback">
                    Ingresa un indicador
                </div>
            </div>
            <div class="col-md-3">
                <label for="gerencia" class="form-label">Gerencia *</label>
                <input type="text" class="form-control caracter" name="gerencia" id="gerencia" maxlength="19" required disabled>
                <div class="invalid-feedback">
                    Ingresa una gerencia
                </div>
            </div>
        </div>
        

        <div id="textarea-container">
            <div class="row">
                <div class="col">
                    <label for="motivo">Motivo de la Solicitud *</label>
                    <textarea class="form-control motivo" id="motivo" placeholder="Especifique el motivo de la solicitud" maxlength="80" required></textarea>
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
                if (container.querySelectorAll('.row').length >= 3) {
                    maximo("Límite de 3 motivos<br>alcanzado","error");
                    return;
                }

                var index = contenidoTextAreas.length + 1; // Obtener el índice
                var newTextArea = document.createElement('div');
                
                newTextArea.classList.add('row');
                newTextArea.innerHTML = `
                    <div class="col">
                        <label for="motivo_${index}" class="mt-2">Motivo de la Solicitud *</label>
                        <textarea class="form-control motivo" id="motivo_${index}" placeholder="Especifique el motivo de la solicitud" maxlength="80" required></textarea>
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
        <h3 class="my-3 text-muted">Datos del Equipo</h3>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="marca" class="form-label">Marca *</label>
                <input type="text" class="form-control caracter" name="marca" id="marca" maxlength="22" required>
                <div class="invalid-feedback">
                    Ingrese la marca del equipo
                </div>
            </div>
            <div class="col-md-4">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="modelo" maxlength="30">
            </div>
            <div class="col-md-4">
                <label for="serial" class="form-label">Serial *</label>
                <input type="text" class="form-control" name="serial" id="serial" maxlength="28" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="mac" class="form-label">MAC *</label>
                <input type="text" class="form-control" name="mac" id="mac" placeholder="xx:xx:xx:xx:xx:xx" required>
                <div class="invalid-feedback">
                    dirección mac inválida
                </div>
            </div>
            
            <div class="col">
                <div>
                    <label for="equipo" class="form-label">Equipo *</label>
                    <select class="form-select" id="equipo" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="Laptop">Laptop</option>
                        <option value="CPU">Desktop</option>
                        <option value="Tablet">Tablet</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione un equipo válido
                    </div>
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="propiedad" class="form-label">Propiedad *</label>
                    <select class="form-select" id="propiedad" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="pequiven">Pequiven</option>
                        <option value="particular">Particular</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione una opción válida
                    </div>
                </div>
            </div>
        </div>
        <div id="textarea_observacion">
            <div class="row">
                <div class="col">
                    <label for="">Observación</label>
                    <textarea class="form-control observacion" id='observacion' maxlength="94"></textarea>
                </div>
                <div class="col-md-1 mt-5">
                    <button class="btn btn-primary" id="agregar_observacion" type="button">+</button>
                </div>
            </div>
        </div>
        
        <script>
            // Array para almacenar el contenido de los textareas
            var contenidoObservacion = [];

            // Función para agregar un nuevo textarea
            function agregarTextAreaObservacion() {
                var container = document.getElementById('textarea_observacion');
                // Verificar si ya hay 3 textareas
                if (container.querySelectorAll('.row').length >= 4) {
                    maximo("Límite de 4 observaciones<br>alcanzado","error");
                    return;
                }

                var index = contenidoObservacion.length + 1; // Obtener el índice
                var newTextArea = document.createElement('div');
                    
                newTextArea.classList.add('row');
                newTextArea.innerHTML = `
                    <div class="col">
                        <label for="">Observación</label>
                        <textarea class="form-control observacion" id='observacion' maxlength="94"></textarea>
                    </div>
                    <div class="col-md-1 mt-5">
                        <button class="eliminar_observacion btn btn-danger mt-2">X</button>
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
            document.getElementById('agregar_observacion').addEventListener('click', function(event) {
                // Evitar que el formulario se envíe al hacer clic en el botón "Agregar TextArea"
                event.preventDefault();
                    agregarTextAreaObservacion();
            });

            // Agregar event listener para los botones de eliminar
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('eliminar_observacion')) {
                    eliminarTextArea(event);
                }
            });
        </script>

        <button type="submit" class="btn btn-primary mt-2 mb-3" id="submit-button"><i class="fa fa-download"></i> Generar PDF</button>
    </form>
    <script>
        // Función para reiniciar el array contenidoTextAreas a un estado vacío
        function reiniciarContenidoTextAreas() {
            contenidoTextAreas = []; // Reiniciar el array a un estado vacío
            contenidoObservacion = [];
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
    <script src="mostrar_inputs.js"></script>
<?php include("../../vistas/footer.php") ?>