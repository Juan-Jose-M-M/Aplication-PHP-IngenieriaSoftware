/*

require("../modules/conexion.php");
print_r($_POST);exit;
$UserEmail    = isset($_POST["UserEmail"]) ? $_POST["UserEmail"] : null;
$UserName     = isset($_POST["UserName"]) ?  $_POST["UserName"] : null;
//$UserLastName = isset($_POST["UserLastName"]) ? $_POST["UserLastName"] : null;
$UserAction   =  isset($_POST["UserAction"]) ? $_POST["UserAction"] : null;;

if ($UserAction == "login") {
    //login
    // validate correo existe
    $query = "SELECT * FROM usuario WHERE correo_usuario = '{$UserEmail}'";
    $user = $connection->query($query);
    $UserInfo = $user->fetch(PDO::FETCH_ASSOC);

    if (isset($UserInfo["idUsuario_pk"])) {
        $response["logged"] = true;
        $response["info"]   = $UserInfo;

        session_start();
        setcookie("username", $UserName, false, "/", $_SERVER["HTTP_HOST"]);
    } else {
        $response["logged"] = false;
    }

    echo json_encode($response);
/*} elseif ($UserAction == "logout") {
    setcookie('username', null, 0, '/', $_SERVER["HTTP_HOST"]);
    session_destroy();
} else {
    return false;*/
