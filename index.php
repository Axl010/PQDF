<?php
session_start();
session_destroy();
include("bd/login.php");
?>

<style>
    .style-swal{
        width: 500px;
        height: 300px;
    }
    .footer{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
    }
    .centered-text {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        width: 100%;
        margin-top: 4%;
    }
</style>

<!doctype html>
<html>
    <head>
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <link rel="shortcut icon" href="#" />   
        <meta charset="utf-8">
        <meta name="author" content="Actcel Chirinos">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PQDF</title>
   
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/loginR.css">  
    </head>
    <body>
        <div class="text-white centered-text"><strong>GERENCIA DE SEGURIDAD DE TECNOLOGIA DE INFORMACION - PCP <br></div>
    
        <div class="container-login">
            <div class="wrap-login">
                <form class="login-form validate-form" id="formlogin" action="" method="post">
                    <img src="img/Pequiven.png" class="mb-3 mx-3">
                    <!--<span class="login-form-title">LOGIN</span>-->
                    <div class="wrap-input100" data-validate = "Usuario incorrecto">
                        <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                        <span class="focus-efecto"></span>
                    </div>
                    
                    <div class="wrap-input100" data-validate="Password incorrecto">
                        <input class="input100" type="password" id="password" name="password" autocomplete="off" placeholder="Password">
                        <span class="focus-efecto"></span>
                    </div>
                    <div class="container-login-form-btn mt-3 mb-3">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <button type="submit" name="submit" class="login-form-btn">INICIAR SESIÓN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="footer">
            <div class="container my-auto mt-2">
                <div class="copyright text-center my-auto">
                    <span><h5 class="text-white">&copy; PQDF 2024</h5></span>
                </div>
            </div>
        </footer>

        <script src="jquery/jquery-3.7.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>