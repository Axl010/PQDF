function loadImage(url){
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = "blob"; // Imagen base 64
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}

//ACTA DE INSPECCION DE EQUIPO
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');
    if(form){
    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        if (form.checkValidity()) {
            let fecha_a = document.getElementById('fecha_a').value;
            let fecha_b = document.getElementById('fecha_b').value;
            let lugar = document.getElementById('lugar').value;

            //Formato AM / PM de Entrada
            let hora_a = document.getElementById('hora_a').value;

            if(hora_a != ""){
                let [horas_a,minutos_a] = hora_a.split(':');
                
                //Convertir las horas a formato de 12 horas y agregar AM o PM
                var ampm_a = horas_a >= 12 ? 'PM' : 'AM';
                horas_a = horas_a % 12;
                horas_a = horas_a ? horas_a : 12; //Si son las 12, mostrar como 12 en vez de 0
                var formato_a = horas_a + ':' + minutos_a + ' ' + ampm_a;
            }
            
            let personal = document.getElementById('personal').value;
            let nombre = document.getElementById('nombre').value;
            let cedula = document.getElementById('cedula').value;
            let telefono = document.getElementById('telefono').value;
            let email = document.getElementById('email').value;
            let cargo = document.getElementById('cargo').value;
            let extension = document.getElementById('extension').value;
            let indicador = document.getElementById('indicador').value;
            let gerencia = document.getElementById('gerencia').value;

             // Obtener el contenido de los textareas y almacenarlo en el array
            let textareas = document.querySelectorAll('.motivo');
                textareas.forEach(function(textarea) {
                contenidoTextAreas.push(textarea.value); // Almacenar el contenido del textarea en el array
            });

            let marca = document.getElementById('marca').value;
            let modelo = document.getElementById('modelo').value;
            let serial = document.getElementById('serial').value;
            let mac = document.getElementById('mac').value;
            let equipo = document.getElementById('equipo').value;
            let propiedad = document.getElementById('propiedad').value;
            
            // Obtener el contenido de los textareas y almacenarlo en el array
            let textObservacion = document.querySelectorAll('.observacion');
                textObservacion.forEach(function(textarea) {
                contenidoObservacion.push(textarea.value); // Almacenar el contenido del textarea en el array
            });
            
            if(personal === 'trabajador'){
                await InspeccionEquipoTrabajador(fecha_a, fecha_b, lugar, formato_a, personal, nombre, cedula, telefono, email, cargo, extension, indicador, gerencia, marca, modelo, serial, mac, equipo, propiedad);
            }else{
                await InspeccionEquipoVisitante(fecha_a, fecha_b, lugar, formato_a, personal, nombre, cedula, telefono, email, marca, modelo, serial, mac, equipo, propiedad);
            }
        }else{
            Swal.fire({
                icon: "warning",
                title: "<b>Por favor, Ingresa todos los campos requeridos</b>",
                confirmButtonColor: "#3885d6",
            });
        }
    });
    }
});


//SOLICITUD DE ACCESO LÓGICO
document.addEventListener('DOMContentLoaded', function() {
    const form_logico = document.getElementById('form_logico');
    if(form_logico){
        form_logico.addEventListener('submit', async function(event) {
            event.preventDefault();

            if(form_logico.checkValidity()) {
                let nombre_u = document.getElementById('nombre_usuario').value;
                let cedula_u = document.getElementById('cedula_usuario').value;
                let indicador_u = document.getElementById('indicador_usuario').value;
                let localidad = document.getElementById('localidad').value;
                let cargo_u = document.getElementById('cargo_usuario').value;
                let empleado = document.getElementById('empleado').value;
                let direccion = document.getElementById('direccion').value;
                let gerencia_u = document.getElementById('gerencia_usuario').value;
                let proceso = document.getElementById('proceso').value;
                let region = document.getElementById('region').value;
                let area = document.getElementById('area').value;
                let extension = document.getElementById('extension').value;
                let telefono = document.getElementById('telefono').value;
                let internet = document.getElementById('internet').value;
                let vpn = document.getElementById('vpn').value;
                
                // Obtener el contenido de los servicios
                let textServicios = document.querySelectorAll('.servicio');
                    textServicios.forEach(function(textarea) {
                    contenidoServicios.push(textarea.value); // Almacenar el contenido de los servicios
                });

                // Obtener el contenido de los textareas y almacenarlo en el array
                let textareas = document.querySelectorAll('.motivo');
                    textareas.forEach(function(textarea) {
                    contenidoTextAreas.push(textarea.value); // Almacenar el contenido del textarea en el array
                });

                let nombre_equipo = document.getElementById('nombre_equipo').value;
                let ip = document.getElementById('ip').value;
                let mac = document.getElementById('mac').value;

                // Obtener el contenido de los textareas y almacenarlo en el array
                let textRecursos = document.querySelectorAll('.recursos');
                    textRecursos.forEach(function(textarea) {
                    contenidoRecursos.push(textarea.value); // Almacenar el contenido del textarea en el array
                });
                
                let marca = document.getElementById('marca').value;
                let modelo = document.getElementById('modelo').value;
                let sistema = document.getElementById('sistema').value;
                let activo = document.getElementById('activo').value;
                let nombre_s = document.getElementById('nombre_supervisor').value;
                let indicador_s = document.getElementById('indicador_supervisor').value;
                let cedula_s = document.getElementById('cedula_supervisor').value;
                let cargo_s = document.getElementById('cargo_supervisor').value;
                let gerencia_s = document.getElementById('gerencia_supervisor').value;
                let nombre_g = document.getElementById('nombre_gerente').value;
                let indicador_g = document.getElementById('indicador_gerente').value;
                let cedula_g = document.getElementById('cedula_gerente').value;
                let cargo_g = document.getElementById('cargo_gerente').value;
                let gerencia_g = document.getElementById('gerencia_gerente').value;

                await AccesoLogico(nombre_u, cedula_u, indicador_u, localidad, cargo_u, empleado, direccion, gerencia_u, proceso, region, area, extension, telefono,
                    internet, vpn, nombre_equipo, ip, mac, marca, modelo, sistema, activo, nombre_s, indicador_s, 
                    cedula_s, cargo_s, gerencia_s, nombre_g, indicador_g, cedula_g, cargo_g, gerencia_g);
            }else{
                Swal.fire({
                    icon: "warning",
                    title: "<b>Por favor, Ingresa todos los campos requeridos</b>",
                    confirmButtonColor: "#3885d6",
                });
            }
        });
    }
});

//SOLICITUD DE ACCESO LOGICO DE SEGURIDAD
document.addEventListener('DOMContentLoaded', function() {
    const form_seguridad = document.getElementById('form_seguridad');
    if(form_seguridad){
        form_seguridad.addEventListener('submit', async function(event) {
            event.preventDefault();

            if(form_seguridad.checkValidity()){
                let nombre_usuario = document.getElementById('nombre_usuario').value;
                let cedula_usuario = document.getElementById('cedula_usuario').value;
                let indicador_usuario = document.getElementById('indicador_usuario').value; 
                let localidad = document.getElementById('localidad').value;
                let cargo_usuario = document.getElementById('cargo_usuario').value; 
                let empleado = document.getElementById('empleado').value; 
                let direccion = document.getElementById('direccion').value; 
                let gerencia_usuario = document.getElementById('gerencia_usuario').value; 
                let proceso = document.getElementById('proceso').value; 
                let region = document.getElementById('region').value; 
                let area = document.getElementById('area').value;
                let extension = document.getElementById('extension').value; 
                let telefono = document.getElementById('telefono').value; 
                let firewall = document.getElementById('firewall').value; 
                let nivel_fire = document.getElementById('nivel_fire').value; 
                let local_fire = document.getElementById('local_fire').value; 
                let endpoint = document.getElementById('endpoint').value; 
                let nivel_endpoint = document.getElementById('nivel_endpoint').value; 
                let local_endpoint = document.getElementById('local_endpoint').value; 
                let acceso = document.getElementById('acceso').value; 
                let nivel_acceso = document.getElementById('nivel_acceso').value;
                let local_acceso = document.getElementById('local_acceso').value; 
                let fecha_a = document.getElementById('fecha_a').value; 
                let fecha_b = document.getElementById('fecha_b').value; 
                let email = document.getElementById('email').value; 

                // Obtener el contenido de los textareas y almacenarlo en el array
                let textareas = document.querySelectorAll('.motivo');
                    textareas.forEach(function(textarea) {
                    contenidoTextAreas.push(textarea.value); // Almacenar el contenido del textarea en el array
                });

                let nombre_equipo = document.getElementById('nombre_equipo').value; 
                let ip = document.getElementById('ip').value; 
                let mac = document.getElementById('mac').value; 

                // Obtener el contenido de los textareas y almacenarlo en el array
                let textRecursos = document.querySelectorAll('.recursos');
                    textRecursos.forEach(function(textarea) {
                    contenidoRecursos.push(textarea.value); // Almacenar el contenido del textarea en el array
                });

                let nombre_supervisor = document.getElementById('nombre_supervisor').value; 
                let indicador_supervisor = document.getElementById('indicador_supervisor').value;
                let cedula_supervisor = document.getElementById('cedula_supervisor').value; 
                let cargo_supervisor = document.getElementById('cargo_supervisor').value; 
                let gerencia_supervisor = document.getElementById('gerencia_supervisor').value; 
                let extension_supervisor = document.getElementById('extension_supervisor').value; 
                let nombre_gerente = document.getElementById('nombre_gerente').value; 
                let indicador_gerente = document.getElementById('indicador_gerente').value;
                let cedula_gerente = document.getElementById('cedula_gerente').value; 
                let cargo_gerente = document.getElementById('cargo_gerente').value; 
                let gerencia_gerente = document.getElementById('gerencia_gerente').value; 
                let extension_gerente = document.getElementById('extension_gerente').value; 
                
                await AccesoSeguridad(nombre_usuario, cedula_usuario, indicador_usuario, localidad, cargo_usuario, empleado, direccion, gerencia_usuario, 
                proceso, region, area, extension, telefono, firewall, nivel_fire, local_fire, endpoint, nivel_endpoint, local_endpoint, acceso, 
                nivel_acceso, local_acceso, fecha_a, fecha_b, email, nombre_equipo, ip, mac, nombre_supervisor, indicador_supervisor, 
                cedula_supervisor, cargo_supervisor, gerencia_supervisor, extension_supervisor, nombre_gerente, indicador_gerente, cedula_gerente, 
                cargo_gerente, gerencia_gerente, extension_gerente);
            }else{
                Swal.fire({
                    icon: "warning",
                    title: "<b>Por favor, Ingresa todos los campos requeridos</b>",
                    confirmButtonColor: "#3885d6",
                });
            }
        });
    }
});

async function InspeccionEquipoTrabajador(fecha_a, fecha_b, lugar, formato_a, personal, nombre, cedula, telefono, email, cargo, extension, indicador, 
    gerencia, marca, modelo, serial, mac, equipo, propiedad) {
    
    const image = await loadImage("../../img/inspeccion_equipo_trabajador.jpg");
    const pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addImage(image, 'PNG', 0, 0, 600, 800);
    pdf.setFontSize(8);
    
    //Conversion de mes
    const meses = {
        1: 'Enero',
        2: 'Febrero',
        3: 'Marzo',
        4: 'Abril',
        5: 'Mayo',
        6: 'Junio',
        7: 'Julio',
        8: 'Agosto',
        9: 'Septiembre',
        10: 'Octubre',
        11: 'Noviembre',
        12: 'Diciembre' 
    };

    if(fecha_a!=""){
        const date = new Date(fecha_a);
        pdf.text(date.getUTCDate().toString(), 98, 96);
    
        const numero_mes = date.getUTCMonth() + 1;
        const nombre_mes = meses[numero_mes];
        pdf.text(nombre_mes, 185, 96);
        pdf.text(date.getUTCFullYear().toString(), 278, 96);
    } 

    if(fecha_b != ""){
        const date_b = new Date(fecha_b);
        pdf.text(date_b.getUTCDate().toString(), 362, 96);

        const numero_mes_b = date_b.getUTCMonth() + 1;
        const nombre_mes_b = meses[numero_mes_b];
        pdf.text(nombre_mes_b, 445, 96);
    }  

    pdf.setFontSize(8);

    switch(lugar){
        case 'Sede Corporativa': pdf.text("X",134,157.5);break;
        case 'CPHC': pdf.text("X",200,157);break;
        case 'CPAMC': pdf.text("X",282,157);break;
        case 'CPJAA': pdf.text("X",351,157.5);break;
    }
    
    if(formato_a != undefined){
        pdf.text(formato_a, 403, 158);
    }

    pdf.text(nombre, 75, 207);
    pdf.text(cedula, 240, 207);
    pdf.text(telefono, 350, 207);
    pdf.text(email, 444, 207);

    switch(personal){
        case 'visitante': pdf.text("X",540.5,149);break;
        case 'trabajador': pdf.text("X",540.5,161.5);break;
    }

    pdf.text(cargo, 90, 239);
    pdf.text(extension, 240, 239);
    pdf.text(indicador, 352, 239);
    pdf.text(gerencia, 475, 239);
    
    let y=253;
    //Mostrar el contenido del array utilizando un índice
    if (contenidoTextAreas.length > 0 && contenidoTextAreas[0].trim() !== '') {
        pdf.text(contenidoTextAreas[0], 196, y); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 1 && contenidoTextAreas[1].trim() !== '') {
        pdf.text(contenidoTextAreas[1], 196, y+11.5); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 2 && contenidoTextAreas[2].trim() !== '') {
        pdf.text(contenidoTextAreas[2], 196, y+22); // Llamar a pdf.text()
    }

    pdf.text(marca, 80, 314);
    pdf.text(modelo, 240, 314);
    pdf.text(serial, 430, 314);
    pdf.text(mac, 86, 348);

    switch(equipo){
        case 'Laptop': pdf.text("X",230.5, 348);break;
        case 'CPU': pdf.text("X",287, 347.5);break;
        case 'Tablet': pdf.text("X",351.5, 348.4);break;
    }

    switch(propiedad){
        case 'pequiven': pdf.text("X",436, 348);break;
        case 'particular': pdf.text("X",536.5, 348.6);break;
    }

    y=617;

    //Mostrar el contenido del array utilizando un índice
    if (contenidoObservacion.length > 0 && contenidoObservacion[0].trim() !== '') {
        pdf.text(contenidoObservacion[0], 138, y); // Llamar a pdf.text()
    }
    if (contenidoObservacion.length > 1 && contenidoObservacion[1].trim() !== '') {
        pdf.text(contenidoObservacion[1], 138, y+14); // Llamar a pdf.text()
    }
    if (contenidoObservacion.length > 2 && contenidoObservacion[2].trim() !== '') {
        pdf.text(contenidoObservacion[2], 138, y+28); // Llamar a pdf.text()
    }
    if (contenidoObservacion.length > 3 && contenidoObservacion[3].trim() !== '') {
        pdf.text(contenidoObservacion[3], 138, y+41); // Llamar a pdf.text()
    }

    pdf.save("Inspeccion_de_Equipo_trabajador.pdf");    
}

async function InspeccionEquipoVisitante(fecha_a, fecha_b, lugar, formato_a, personal, nombre, cedula, telefono, email, marca, modelo, serial, mac, equipo, propiedad) {
    const image = await loadImage("../../img/inspeccion_equipo_visitante.jpg");
    const pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addImage(image, 'PNG', 0, 0, 600, 800);
    pdf.setFontSize(9);
   
    //Conversion de mes
    const meses = {
        1: 'Enero',
        2: 'Febrero',
        3: 'Marzo',
        4: 'Abril',
        5: 'Mayo',
        6: 'Junio',
        7: 'Julio',
        8: 'Agosto',
        9: 'Septiembre',
        10: 'Octubre',
        11: 'Noviembre',
        12: 'Diciembre' 
    };

    if(fecha_a!=""){
    const date = new Date(fecha_a);
    pdf.text(date.getUTCDate().toString(), 98, 96);
   
    const numero_mes = date.getUTCMonth() + 1;
    const nombre_mes = meses[numero_mes];
    pdf.text(nombre_mes, 185, 96);
    pdf.text(date.getUTCFullYear().toString(), 278, 96);
    } 

    if(fecha_b != ""){
        const date_b = new Date(fecha_b);
        pdf.text(date_b.getUTCDate().toString(), 362, 96);

        const numero_mes_b = date_b.getUTCMonth() + 1;
        const nombre_mes_b = meses[numero_mes_b];
        pdf.text(nombre_mes_b, 445, 96);
    }  

    pdf.setFontSize(8);

    switch(lugar){
        case 'Sede Corporativa': pdf.text("X",134,157.5);break;
        case 'CPHC': pdf.text("X",200,157);break;
        case 'CPAMC': pdf.text("X",282,157);break;
        case 'CPJAA': pdf.text("X",351,157.5);break;
    }
    
    if(formato_a != undefined){
        pdf.text(formato_a, 403, 158);
    }

    switch(personal){
        case 'visitante': pdf.text("X",540.5,149);break;
        case 'trabajador': pdf.text("X",540.5,161.5);break;
    }
   
    pdf.text(nombre, 75, 207);
    pdf.text(cedula, 240, 207);
    pdf.text(telefono, 350, 207);
    pdf.text(email, 444, 207);

    let y=222;
    //Mostrar el contenido del array utilizando un índice
    if (contenidoTextAreas.length > 0 && contenidoTextAreas[0].trim() !== '') {
        pdf.text(contenidoTextAreas[0], 196, y); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 1 && contenidoTextAreas[1].trim() !== '') {
        pdf.text(contenidoTextAreas[1], 196, y+11.5); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 2 && contenidoTextAreas[2].trim() !== '') {
        pdf.text(contenidoTextAreas[2], 196, y+22); // Llamar a pdf.text()
    }

    pdf.text(marca,80,282.5);
    pdf.text(modelo,240,282.5);
    pdf.text(serial,430, 282.5);
    pdf.text(mac,86,315);

    switch(equipo){
        case 'Laptop': pdf.text("X",230.5,316.9);break;
        case 'CPU': pdf.text("X",286.5,316.5);break;
        case 'Tablet': pdf.text("X",351,317);break;
    }

    switch(propiedad){
        case 'pequiven': pdf.text("X",435.6,316.9);break;
        case 'particular': pdf.text("X",536.5,317);break;
    }

    y=586;

    //Mostrar el contenido del array utilizando un índice
    if (contenidoObservacion.length > 0 && contenidoObservacion[0].trim() !== '') {
        pdf.text(contenidoObservacion[0], 138, y); // Llamar a pdf.text()
    }
    if (contenidoObservacion.length > 1 && contenidoObservacion[1].trim() !== '') {
        pdf.text(contenidoObservacion[1], 138, y+14); // Llamar a pdf.text()
    }
    if (contenidoObservacion.length > 2 && contenidoObservacion[2].trim() !== '') {
        pdf.text(contenidoObservacion[2], 138, y+28); // Llamar a pdf.text()
    }
    if (contenidoObservacion.length > 3 && contenidoObservacion[3].trim() !== '') {
        pdf.text(contenidoObservacion[3], 138, y+41); // Llamar a pdf.text()
    }
    
    url = pdf.output('bloburl');
    pdf.save("Inspeccion_de_Equipo_visitante.pdf");
 }

async function AccesoLogico(nombre_u, cedula_u, indicador_u, localidad, cargo_u, empleado, direccion, gerencia_u, proceso, region, area, extension, 
    telefono, internet, vpn, nombre_equipo, ip, mac, marca, modelo, sistema, activo, nombre_s, indicador_s, cedula_s, cargo_s, 
    gerencia_s, nombre_g, indicador_g, cedula_g, cargo_g, gerencia_g){

    const image = await loadImage("../../img/solicitud_conexion.jpg");
    const pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addImage(image, 'PNG', 0, 0, 600, 800);
    pdf.setFontSize(7);

    pdf.text(nombre_u,95,152);
    pdf.text(cedula_u,204,152);
    pdf.text(indicador_u,255,152);

    if(localidad != "Sede Corporativa"){
        pdf.text(localidad,326,152); 
    }else{
        pdf.text(localidad,311,152); 
    } 

    pdf.text(cargo_u,380,152);
    pdf.text(empleado,472,152);
    pdf.text(direccion,205, 168);
    pdf.text(gerencia_u,100,196);
    pdf.text(proceso,180.5,196);
    pdf.text(region,270,196);
    pdf.text(area,370,196);
    pdf.text(extension,435,196);
    pdf.text(telefono,483,196);

    equis="X";
    switch(internet){
        case "1": pdf.text(equis,123,271);break;
        case "2": pdf.text(equis,123,283.5);break;
        case "3": pdf.text(equis,123,295.5);break;
    }
    switch(vpn){
        case "1": pdf.text(equis,296,271);break;
        case "2": pdf.text(equis,296,283.5);break;
        case "3": pdf.text(equis,296,295.5);break;
    }

    pdf.setFontSize(9);
    let y = 258.5;

    //Mostrar el contenido del array utilizando un índice
    if (contenidoServicios.length > 0 && contenidoServicios[0].trim() !== '') {
        pdf.text(contenidoServicios[0], 378, y); // Llamar a pdf.text()
    }
    if (contenidoServicios.length > 1 && contenidoServicios[1].trim() !== '') {
        pdf.text(contenidoServicios[1], 378, y+13); // Llamar a pdf.text()
    }
    if (contenidoServicios.length > 2 && contenidoServicios[2].trim() !== '') {
        pdf.text(contenidoServicios[2], 378, y+25); // Llamar a pdf.text()
    }
    if (contenidoServicios.length > 3 && contenidoServicios[3].trim() !== '') {
        pdf.text(contenidoServicios[3], 378, y+37); // Llamar a pdf.text()
    }
    if (contenidoServicios.length > 4 && contenidoServicios[4].trim() !== '') {
        pdf.text(contenidoServicios[4], 378, y+50); // Llamar a pdf.text()
    }
    if (contenidoServicios.length > 5 && contenidoServicios[5].trim() !== '') {
        pdf.text(contenidoServicios[5], 378, y+62); // Llamar a pdf.text()
    }

    y=356;

    //Mostrar el contenido del array utilizando un índice
    if (contenidoTextAreas.length > 0 && contenidoTextAreas[0].trim() !== '') {
        pdf.text(contenidoTextAreas[0], 62, y); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 1 && contenidoTextAreas[1].trim() !== '') {
        pdf.text(contenidoTextAreas[1], 62, y+9); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 2 && contenidoTextAreas[2].trim() !== '') {
        pdf.text(contenidoTextAreas[2], 62, y+18); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 3 && contenidoTextAreas[3].trim() !== '') {
        pdf.text(contenidoTextAreas[3], 62, y+26); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 4 && contenidoTextAreas[4].trim() !== '') {
        pdf.text(contenidoTextAreas[4], 62, y+35); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 5 && contenidoTextAreas[5].trim() !== '') {
        pdf.text(contenidoTextAreas[5], 62, y+44); // Llamar a pdf.text()
    }

    pdf.setFontSize(7);

    pdf.text(nombre_equipo,210,427);
    pdf.text(ip,430,427);
    pdf.text(mac,345,437);

    y=438;

    //Mostrar el contenido del array utilizando un índice
    if (contenidoRecursos.length > 0 && contenidoRecursos[0].trim() !== '') {
        pdf.text(contenidoRecursos[0], 250, y+9); // Llamar a pdf.text()
    }
    if (contenidoRecursos.length > 1 && contenidoRecursos[1].trim() !== '') {
        pdf.text(contenidoRecursos[1], 250, y+18.5); // Llamar a pdf.text()
    }
    if (contenidoRecursos.length > 2 && contenidoRecursos[2].trim() !== '') {
        pdf.text(contenidoRecursos[2], 250, y+27); // Llamar a pdf.text()
    }

    pdf.text(marca,140,503);
    pdf.text(modelo,295,503);
    pdf.text(sistema,468,503);
    pdf.text(activo, 395, 516);

    pdf.text(nombre_s,100,552);
    pdf.text(indicador_s,194,552);
    pdf.text(cedula_s,262,552);
    pdf.text(cargo_s,310,552);
    pdf.text(gerencia_s,415,552);

    pdf.text(nombre_g,100,588);
    pdf.text(indicador_g,194, 588);
    pdf.text(cedula_g,262,588);
    pdf.text(cargo_g,310,588);
    pdf.text(gerencia_g,415,588);
    pdf.save("solicitud_logica.pdf");
}

async function AccesoSeguridad(nombre_usuario, cedula_usuario, indicador_usuario, localidad, cargo_usuario, empleado, direccion, gerencia_usuario, proceso, 
    region, area, extension, telefono, firewall, nivel_fire, local_fire, endpoint, nivel_endpoint, local_endpoint, acceso, nivel_acceso,
    local_acceso, fecha_a, fecha_b, email, nombre_equipo, ip, mac, nombre_supervisor, indicador_supervisor, cedula_supervisor,
    cargo_supervisor, gerencia_supervisor, extension_supervisor, nombre_gerente, indicador_gerente, cedula_gerente, cargo_gerente,
    gerencia_gerente, extension_gerente){

    const image = await loadImage("../../img/solicitud_seguridad.jpg");
    const pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addImage(image, 'PNG',0,0,600,800);
    pdf.setFontSize(7);

    pdf.text(nombre_usuario,100,145);
    pdf.text(cedula_usuario,223,145);
    pdf.text(indicador_usuario,268,145);

    if(localidad != "Sede Corporativa"){
        pdf.text(localidad,336,145);
    }else{
        pdf.text(localidad,321,145);
    }

    pdf.text(cargo_usuario,404, 145);
    pdf.text(empleado,480,145);
    pdf.text(direccion,215,155);
    pdf.text(gerencia_usuario,100,187);
    pdf.text(proceso,192,187);
    pdf.text(region,275,187);
    pdf.text(area,345,187);
    pdf.text(extension,432,187);
    pdf.text(telefono,493,187);
    
    equis="X";
    switch(firewall){
        case "1": pdf.text(equis,98,244.3);break;
        case "2": pdf.text(equis,98,257.4);break;
        case "3": pdf.text(equis,98,270.5);break;
    }
    switch(nivel_fire){
        case "1": pdf.text(equis,98,304);break;
        case "2": pdf.text(equis,98,317);break;
        case "3": pdf.text(equis,98,330);break;
    }
    switch(local_fire){
        case "1": pdf.text(equis,98,357.5);break;
        case "2": pdf.text(equis,98,373);break;
        case "3": pdf.text(equis,98,388.2);break;
        case "4": pdf.text(equis,98,404);break;
    }

    switch(endpoint){
        case "1": pdf.text(equis,281,244.3);break;
        case "2": pdf.text(equis,281,257.4);break;
        case "3": pdf.text(equis,281,270.5);break;
    }
    switch(nivel_endpoint){
        case "1": pdf.text(equis,281,304);break;
        case "2": pdf.text(equis,281,317);break;
        case "3": pdf.text(equis,281,330);break;
    }
    switch(local_endpoint){
        case "1": pdf.text(equis,279.5,357.9);break;
        case "2": pdf.text(equis,279.5,373.4);break;
        case "3": pdf.text(equis,279.5,389);break;
        case "4": pdf.text(equis,279.5,404.9);break;
    }

    switch(acceso){
        case "1": pdf.text(equis,429,244.2);break;
        case "2": pdf.text(equis,429,257.5);break;
        case "3": pdf.text(equis,429,270.6);break;
    }
    switch(nivel_acceso){
        case "1": pdf.text(equis,429,304);break;
        case "2": pdf.text(equis,429,317);break;
        case "3": pdf.text(equis,429,330);break;
    }
    switch(local_acceso){
        case "1": pdf.text(equis,429,357.3);break;
        case "2": pdf.text(equis,429.5,373.2);break;
        case "3": pdf.text(equis,429.5,388.7);break;
        case "4": pdf.text(equis,429.5,404.3);break;
    }

    const meses = {
        1: 'Enero',
        2: 'Feberero',
        3: 'Marzo',
        4: 'Abril',
        5: 'Mayo',
        6: 'Junio',
        7: 'Julio',
        8: 'Agosto',
        9: 'Septiembre',
        10: 'Octubre',
        11: 'Noviembre',
        12: 'Diciembre' 
    };

    pdf.setFontSize(6);
    if(fecha_a != ""){
        const date = new Date(fecha_a);
        const numero_mes = date.getUTCMonth() + 1;
        pdf.text(date.getUTCDate().toString() + " de " + meses[numero_mes] + " del " + date.getFullYear().toString(),225,451);
    }
    if(fecha_b != ""){
        const date = new Date(fecha_b);
        const numero_mes = date.getUTCMonth() + 1;
        pdf.text(date.getUTCDate().toString() + " de " + meses[numero_mes] + " del " + date.getFullYear().toString(),225, 460);
    }

    pdf.text(email,225,468);

    pdf.setFontSize(7);
    
    let y=510.5;

    //Mostrar el contenido del array utilizando un índice
    if (contenidoTextAreas.length > 0 && contenidoTextAreas[0].trim() !== '') {
        pdf.text(contenidoTextAreas[0], 55, y); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 1 && contenidoTextAreas[1].trim() !== '') {
        pdf.text(contenidoTextAreas[1], 55, y+8.5); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 2 && contenidoTextAreas[2].trim() !== '') {
        pdf.text(contenidoTextAreas[2], 55, y+16.5); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 3 && contenidoTextAreas[3].trim() !== '') {
        pdf.text(contenidoTextAreas[3], 55, y+25); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 4 && contenidoTextAreas[4].trim() !== '') {
        pdf.text(contenidoTextAreas[4], 55, y+33); // Llamar a pdf.text()
    }
    if (contenidoTextAreas.length > 5 && contenidoTextAreas[5].trim() !== '') {
        pdf.text(contenidoTextAreas[5], 55, y+41); // Llamar a pdf.text()
    }

    pdf.text(nombre_equipo,220,576);
    pdf.text(ip,440,576);
    pdf.text(mac,385, 585);

    y=595;

    //Mostrar el contenido del array utilizando un índice
    if (contenidoRecursos.length > 0 && contenidoRecursos[0].trim() !== '') {
        pdf.text(contenidoRecursos[0], 270, y); // Llamar a pdf.text()
    }
    if (contenidoRecursos.length > 1 && contenidoRecursos[1].trim() !== '') {
        pdf.text(contenidoRecursos[1], 270, y+9); // Llamar a pdf.text()
    }
    if (contenidoRecursos.length > 2 && contenidoRecursos[2].trim() !== '') {
        pdf.text(contenidoRecursos[2], 270, y+18.5); // Llamar a pdf.text()
    }

    pdf.text(nombre_supervisor,88,647);
    pdf.text(indicador_supervisor,201,647); 
    pdf.text(cedula_supervisor,277,647);
    pdf.text(cargo_supervisor,322,647);
    pdf.text(gerencia_supervisor,415,647);
    pdf.text(extension_supervisor,515,647);

    pdf.text(nombre_gerente,88,680.5);
    pdf.text(indicador_gerente,201,680.5); 
    pdf.text(cedula_gerente,277,680.5);
    pdf.text(cargo_gerente,322,680.5);
    pdf.text(gerencia_gerente,415,680.5);
    pdf.text(extension_gerente,515,680.5);

    pdf.save("solicitud_seguridad.pdf");
}