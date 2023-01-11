<?php
session_start();
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 'Pgeneral') {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!--Pasamos po parametro las credenciales para poder usar la api de google-->
    <meta name="google-signin-client_id" content="1022596803588-a37qmpm96m3mf13tt87c8hsjkmp13jc4.apps.googleusercontent.com">
    <meta name="google-signin-scope" content="profile email">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <!--  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</head>




<body>

    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <!-- Contenido principal-->
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex">
        <div class="container-fluid">
            <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
                <div class="col-12 col-md-8 col-lg-6   h-50 ">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="img/logo_aplication.png" class="rounded" width="150px" height="150px">
                            </div>
                            <h4 class="card-title mt-1 text-center">Welcome a Vida Saludable</h4>
                            <p class="text-center">Log in</p>
                            <form method="post">

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-at" viewBox="0 0 16 16">
                                                <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input name="email" class="form-control" placeholder="Email address" type="email" required="required" maxlength="30" onkeypress="return (event.charCode == 46||event.charCode == 64||event.charCode >= 97 && event.charCode <= 122||event.charCode >= 48 && event.charCode <= 57)" min="1">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" placeholder="Enter password" type="password" required="required" name="password" maxlength="15" onkeypress="return(event.charCode !=32)" min="1">
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto p-2">
                                    <button type="submit" class="btn btn-outline-primary" name="iniciarsesion"> Log in </button>
                                </div>
                                <p class="text-center">
                                    <a href="" class="link-primary">Olvide mi contraseña</a>
                                </p>
                                <p class="text-muted font-weight-bold p-2">
                                    <span>O inicia sesion con:</span>
                                </p>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                    <button class="btn btn-outline-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                        Twitter </button>
                                </div>
                                <p class="text-center p-2">No tienes una cuenta?
                                    <a href="pages/registrar.php" class="link-primary">Crer una cuenta</a>
                                </p>
                            </form>
                            <?php
                            include("modules/iniciosesion.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!---Api de google para poder concetarse y usar la llave para poder iniciar secion -->
</body>

</html>
<!-- bootstrap -->

<script src="js/index.js"></script>