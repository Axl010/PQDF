<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
</html>
<?php
   if(isset($_POST['submit'])){
        if(strlen($_POST['usuario'])>=1 && strlen($_POST['password'])>=1){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            include("bd/conexion.php");
            $objeto= new Conexion();
            $conexion=$objeto->Conectar();

            $sentencia=$conexion->prepare("SELECT *,count(*) as n_usuarios FROM usuarios WHERE usuario=:usuario AND password=:password");

            $pass= hash('sha256', $password);
            //$pass = md5($password);
    
            $sentencia->bindParam(":usuario",$usuario);
            $sentencia->bindParam(":password",$pass);
            $sentencia->execute();
        
            $registro=$sentencia->fetch(PDO::FETCH_LAZY);

            if($registro["n_usuarios"]>0){
                session_start();
                $_SESSION['nombre']=$registro['nombre'];
                $_SESSION['usuario']=$registro["usuario"];
                $_SESSION['logueado']=true;
                $_SESSION['rol']=$registro['rol'];
                
                echo'
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "<b>Inicio de sesion exitoso</b>",
                        timer: 1500,
                        showConfirmButton: false,
                        customClass: {
                            popup: "style-swal"
                        }
                    });

                    setTimeout(() => {
                        window.location.href = "secciones/inicio/index.php";
                    }, 1500);
                </script>';
            }   
            else{
                echo '
                <script>
                Swal.fire({
                    icon: "error",
                    title: "<b>Usuario y/o contraseña incorrecta</b>",
                    timer: 1500,
                    showConfirmButton: false,
                    customClass: {
                        popup: "style-swal"
                    }
                });
                </script>';
            }
            
        }
        else{
            echo'
            <script>
            Swal.fire({
                icon: "warning",
                title: "<b>Debe ingresar un usuario y/o contraseña</b>",
                confirmButtonColor: "#e62121de"
            });
            </script>';
        }
   }
?>

