<?php
session_start();
session_destroy();
echo '<script> function redireccionarPagina() {
    window.location = "../index.php";
                        }
                 setTimeout("redireccionarPagina()", 1000); </script>';
