<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idArchivo'])){
        $idArchivo = filter_input(INPUT_POST, 'idArchivo', FILTER_SANITIZE_NUMBER_INT);

        try{
            include("../../bd/conexion.php");
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();

            //Obtener el nombre del archivo a eliminar
            $sentencia = $conexion->prepare("SELECT nombre FROM documento WHERE id=:id");
            $sentencia->bindParam(':id', $idArchivo, PDO::PARAM_INT);
            $sentencia->execute();
            $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

            if($registro){
                $nombreArchivo = $registro['nombre'];
                $rutaArchivo = "archivos/" . $nombreArchivo;

                //Eliminar el registro de la base de datos
                $sentencia = $conexion->prepare("DELETE FROM documento WHERE id=:id");
                $sentencia->bindParam(':id', $idArchivo, PDO::PARAM_INT);
                $sentencia->execute();

                // Eliminar el archivo del servidor 
                if (file_exists($rutaArchivo)){
                    if(unlink($rutaArchivo)){
                        $respuesta = 1; //Archivo Eliminado con exito
                    } else{
                        $respuesta = "No se pudo eliminar el archivo";
                    }
                } else{
                    $respuesta = "Archivo no encontrado en el servidor";
                }
            } else{
                $respuesta = "No se encontro el registro en la base datos";
            }
        } catch(PDOException $e){
            $respuesta = "Error en la base datos: " . $e->getMessage();
        }
    } else{
        $respuesta = "Solicitud Invalida";
    }

   echo $respuesta;
?>
