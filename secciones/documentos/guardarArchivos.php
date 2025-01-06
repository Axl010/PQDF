<?php
    ini_set('upload_max_filesize', '20M');
    ini_set('post_max_size', '20M');
    
    include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $id_categoria = filter_input(INPUT_POST, 'selec_categoria', FILTER_SANITIZE_NUMBER_INT); // Verificar si es un entero valido

    $response = [
        "success" => [],
        "errors" => []
    ];

    if(isset($_FILES['archivos'])){
        $totalArchivos = count($_FILES['archivos']['name']);
        $carpeta = 'archivos/';

        //Verificar si el directorio existe, si no, crearlo
        if(!is_dir($carpeta)){
            mkdir($carpeta, 0777, true);
        }

        $anioActual = date("Y");
        
        for($i=0; $i < $totalArchivos; $i++){
            $nombreArchivo = basename($_FILES['archivos']['name'][$i]);
            $tipoArchivo = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            $nombreSinExt = pathinfo($nombreArchivo, PATHINFO_FILENAME);

            //Verificar el tipo de archivo permitido
            $tiposPermitidos = ['pdf'];

            if(!in_array(strtolower($tipoArchivo), $tiposPermitidos)){
                $response["errors"][] = "Tipo de Archivo no Permitido para $nombreArchivo";
                continue;
            }

            $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
            $rutaFinal = $carpeta.$nombreArchivo;

            // Usar nomenclatura de nombre PQV-PCP-ZIV-STI-NE...
            if($nombreSinExt == 'Inspeccion_de_Equipo_trabajador' || $nombreSinExt == 'Inspeccion_de_Equipo_visitante'){
                $contador = 1;

                do{
                    $nombreNuevo = sprintf("PQV-PCP-ZIV-STI-NE-%03d-%s.%s", $contador, $anioActual, $tipoArchivo);
                    $rutaFinal = $carpeta . $nombreNuevo;
                    $contador++;
                } while(file_exists($rutaFinal));
            } elseif($nombreSinExt == 'solicitud_logica' || $nombreSinExt == 'solicitud_seguridad'){
                // Agregar contador
                $contador = 1;
                do {
                    $nombreNuevo = $nombreSinExt . "_" . $contador . "." . $tipoArchivo;
                    $rutaFinal = $carpeta . $nombreNuevo;
                    $contador++;
                }while(file_exists($rutaFinal));
            } else{
                // Usar el nombre original del archivo
                $rutaFinal = $carpeta . $nombreArchivo;
                // Evitar sobreescribir archivos con el mismo nombre
                $contador = 1;
                while(file_exists($rutaFinal)){
                    $rutaFinal = $carpeta . $nombreSinExt . "_" . $contador . "." . $tipoArchivo;
                    $contador++;
                }
                $nombreNuevo = ($contador > 1) ? $nombreSinExt . "_" . ($contador - 1) . "." . $tipoArchivo : $nombreArchivo;
            }

            //Mover el archivo a la ruta final
            if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
                $nombreArchivoInsertar = $nombreNuevo;

                $sentencia=$conexion->prepare("INSERT INTO documento (id_categoria, nombre, tipo, ruta) VALUES (:id_categoria, :nombre, :tipo, :ruta)");

                $sentencia->bindParam(':id_categoria',$id_categoria, PDO::PARAM_INT);
                $sentencia->bindParam(':nombre',$nombreArchivoInsertar, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo',$tipoArchivo, PDO::PARAM_STR);
                $sentencia->bindParam(':ruta',$rutaFinal, PDO::PARAM_STR);

                if($sentencia->execute()) {
                    $response["success"][] = "Archivo $nombreNuevo agregado con éxito";
                } else{
                    $response["errors"][] = "Fallo al insertar el documento en la base de datos para $nombreNuevo";
                }
            } else{
                $response["errors"][] = "Fallo al mover el archivo $nombreArchivo al direcotorio final";
            }
        }
    } else{
        $response["errors"][] = "No se recibieron archivos en la solicitud";
    } 

    header('Content-Type: aplication/json');
    echo json_encode($response);
?>