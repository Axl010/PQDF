<?php
    include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    if(isset($_POST['idArchivo'])){
        $id = $_POST['idArchivo'];

        $consulta=$conexion->prepare("SELECT ruta FROM documento WHERE id=:id"); 
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if($resultado){
            echo $resultado['ruta'];
        } else{
            echo 'No se encontro un documento con el ID proporcionado';
        }
    } else{
        echo 'No se proporciono un ID de documento.';
    }
?>