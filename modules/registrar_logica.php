<?php

include("conexion.php");
$patron = "/^[a-zA-Z\d]*$/";


if (isset($_POST['registrar'])) {
    //Se setean la variables
    $rol = trim($_POST['rol']);
    $name = trim($_POST['username']);
    $password = trim($_POST['password1']);
    $email = trim($_POST['email']);
    $generousuario = trim($_POST['generousuario']);
    $nacionalidad = trim($_POST['nacionalidad']);
    $fotoperfil = $_FILES['filefotoperfil'];
    $null = 0;
    $fechareg = date("d/m/y");


    /*Validacion de la imnagen de perfil del usuario*/
    $tmp_name = $fotoperfil['tmp_name'];
    $img_file_name = $fotoperfil['name'];
    $img_type = $fotoperfil['type'];
    $directoriodestion = "../../../../../img/fotosperfil";
    $save = "../img/fotosperfil";
    //Si se trata de una imagen 
    if (((strpos($img_type, "gif") || strpos($img_type, "jpg") || strpos($img_type, "png") || strpos($img_type, "jpeg")))) {
        $destino = $directoriodestion . '/' . $img_file_name;
        $destionsave= $save . '/' . $img_file_name;
    }



    /*Validacion que los campos ingresados no esten vacios*/
    if (strlen($_POST['username']) < 1 || strlen($_POST['password1']) < 1 || strlen($_POST['password2']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['generousuario']) == null || strlen($_POST['nacionalidad']) == null) {
        echo '<h3 class="ok">No introduscaz campos vacios</h3>';
    } else {
        /*Validacion que las contraeñas coincidan, si no se mandan un mensaje de advertecia*/
        if (trim($_POST['password1']) != trim($_POST['password2'])) {
            echo ' <div class="alert alert-danger" role="alert">
            Contraseñas no coinciden, intentelo de nuevo
        </div>';
            echo '<script> function redireccionarPagina() {
                window.location = "registrar.php";
            }
              setTimeout("redireccionarPagina()", 3000); </script>';
        } else {
            /*Se genera la consulta a la base de datos para validar que el correo electronico 
            no este asociado a algun otro usuario*/
            //$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $consultausu = "SELECT * FROM usuario WHERE correo_usuario ='$email'";
            $busquedausuario = mysqli_query($conex, $consultausu);
            /*verificamos si el user exite con un condicional, para poder ingresar*/
            if (mysqli_num_rows($busquedausuario) == 0) {
                $consulta = "INSERT INTO `usuario`(`rol_usuario`, `nombre_usuario`,
                    `contasena_usuaio`, `correo_usuario`, `genero_usuario`,
                    `nacionalidad_usuario`, `fechareg`,`id_rol_fk`,`rutaFotoPerfil`)
                   VALUES ('$rol',' $name',' $password','$email','$generousuario',' $nacionalidad',
                   '$fechareg','$rol','$destino')";
                $resultado = mysqli_query($conex, $consulta);
                /*Validacion de un correco registro*/
                if ($resultado) {
                    if (move_uploaded_file($tmp_name, $destionsave)) {
                        echo '<div class="alert alert-success" role="alert">
                        ¡¡Te has inscripto correctamente!
                        Inicia Sesion
                    </div>';
                        /*Funcion que hace que se redirija a la pagina despues de mostar un mensaje de salida
                por medio de inyeccion de codigo JS*/
                        echo '<script> function redireccionarPagina() {
                    window.location = "../index.php";
                  }
                  setTimeout("redireccionarPagina()", 3000); </script>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                        Ups, ocurrio un erro con la carga de tu foto de peril                        
                    </div>';
                        echo '<script> function refrescarpage() {
                        window.location.href = window.location.href;
                    }
                    setTimeout("refrescarpage()", 3000); </script>';
                    }
                } else {
                    /*Mostar un mensaje de error si no se relaiza correctamente el registro*/
                    echo '  <div class="alert alert-danger" role="alert">
                    ¡Ups ha ocurrido un error!
                </div>';
                    echo '<script> function refrescarpage() {
                    window.location.href = window.location.href;
                }
                setTimeout("refrescarpage()", 3000); </script>';
                }
            } else {
                /*Mostar un mensaje de error si el usuario ya esta registrado, ademas de refrecar
                la pagina para poder ingresar los datos nuevamente*/
                echo ' <div class="alert alert-warning" role="alert">
                El user ya esta registrado, ingresa otro
            </div>';
                echo '<script> function refrescarpage() {
                    window.location.href = window.location.href;
                }
                setTimeout("refrescarpage()", 3000); </script>';
            }
        }
    }
}
