<?php
    include("../../bd/conexion.php");
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    if($_POST){
        $id_categoria = $_POST['id_categoria'];
        $nuevoNombre = $_POST['nuevoNombre'];

        $sentencia = $conexion->prepare("UPDATE categorias SET nombre = :nombre WHERE id = :id");
        $sentencia->bindParam(":nombre",$nuevoNombre);
        $sentencia->bindParam(":id",$id_categoria);

        if($sentencia->execute()){
            $mensaje="Categoría actualizada correctamente";
            header("Location: index.php?mensaje=".$mensaje);
        } else{
            $mensaje="Error al actualizar la categoría";
            header("Location: index.php?mensaje=".$mensaje);
        }
    }
?>