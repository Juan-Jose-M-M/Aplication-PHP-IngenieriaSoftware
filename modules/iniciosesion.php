<?php
ob_start();
include("conexion.php");
if (isset($_POST['iniciarsesion'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    // Prepare a select statement
    $sql = "SELECT id_usuarios_pk,id_rol_fk ,nombre_usuario,correo_usuario, contasena_usuaio,rutaFotoPerfil FROM usuario WHERE correo_usuario = ?";
    if ($stmt = mysqli_prepare($conex, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        // Set parameters
        $param_email = $email;
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);
            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $rolUsuario, $nombreUsuario, $email, $hashed_password,$rutafotoperfil);
                if (mysqli_stmt_fetch($stmt)) {
                    if ($password == $hashed_password) {
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["rol"] = $rolUsuario;
                        $_SESSION["username"] = $nombreUsuario;
                        $_SESSION["email"]=$email;
                        $_SESSION["rutaFotoPerfil"]=$rutafotoperfil;

                        /*Mensaje de alerta del inicio de sesion*/
                        echo ' <div class="alert alert-success" role="alert">
                        Inicio de sesion Admin correcto.Redirigiendo........
                        </div>';
                        if ($_SESSION["rol"] == 1) {
                            $_SESSION["tipousuario"] ="Administrador";
                            /*Funcion para poder redireccionar al usuario de manera correcta
                        a la pagina correspondiente*/
                            echo '<script> function redireccionarPagina() {
                            window.location = "../pages/home-page/Uadmin/index.php";
                          }
                   setTimeout("redireccionarPagina()", 3000); </script>';
                        } elseif ($_SESSION["rol"] == 2) {
                            $_SESSION["tipousuario"] = "Con alguna enfermedad";
                            /*Funcion para poder redireccionar al usuario de manera correcta
                        a la pagina correspondiente*/
                            echo '<script> function redireccionarPagina() {
                            window.location = "../pages/home-page/UCenfermedad/index.php";
                          }
                   setTimeout("redireccionarPagina()", 3000); </script>';
                        } elseif ($_SESSION["rol"] == 3) {
                            $_SESSION["tipousuario"] = "Publico General";
                            /*Funcion para poder redireccionar al usuario de manera correcta
                        a la pagina correspondiente*/
                            echo '<script> function redireccionarPagina() {
                            window.location = "../pages/home-page/UPgeneral/index.php";
                          }
                   setTimeout("redireccionarPagina()", 3000); </script>';
                        } else {
                            $_SESSION["tipousuario"] = "Deportista";
                            /*Funcion para poder redireccionar al usuario de manera correcta
                        a la pagina correspondiente*/
                            echo '<script> function redireccionarPagina() {
                            window.location = "../pages/home-page/Udeportista/index.php";
                          }
                   setTimeout("redireccionarPagina()", 3000); </script>';
                        }
                    } else {
                        /*Mensaje de alerta del inicio de sesion*/
                        echo ' <div class="alert alert-danger" role="alert">
                        ¡La contraseña que has ingresado no es válida.
                    </div>';
                        /*Funcion para refrescar la pagina y poder volver a intentar el inicio de sesion*/
                        echo '<script> function refrescarpage() {
                            window.location.href = window.location.href;
                          }
                   setTimeout("refrescarpage()", 3000); </script>';
                    }
                }
            } else {
                /*Mensaje de alerta del inicio de sesion*/
                echo ' <div class="alert alert-danger" role="alert">
                No existe cuenta registrada con ese nombre de usuario.
            </div>';
                /*Funcion para refrescar la pagina y poder volver a intentar el inicio de sesion*/
                echo '<script> function refrescarpage() {
                    window.location.href = window.location.href;
                  }
           setTimeout("refrescarpage()", 3000); </script>';
            }
        } else {
            /*Mensaje de alerta del inicio de sesion*/
            echo '<div class="alert alert-danger" role="alert">
            Algo salió mal, por favor vuelve a intentarlo.
        </div>';
            /*Funcion para refrescar la pagina y poder volver a intentar el inicio de sesion*/
            echo '<script> function refrescarpage() {
                window.location.href = window.location.href;
              }
       setTimeout("refrescarpage()", 3000); </script>';
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
}
ob_end_flush();
