<?php

include 'conexion_usuario.php';

session_start();
$usuario_log = $_SESSION['sesionNom'];
$id_usuario_log= $_SESSION['sesionId'];

$usuario_confirm = $_POST['userConf'];
$pswd_confirm = $_POST['pswdConf'];

$consulta_confirm = 'EXEC SP_ConfirmAdminLogin"'.$usuario_confirm.'", "'.$pswd_confirm.'"';
$ejecuta = sqlsrv_query($conn, $consulta_confirm);
$resultado = sqlsrv_fetch_array($ejecuta);   

if ($resultado) {
    $respuesta = ['hayRespuesta' => 'hayRespuesta'];
} else {
    $respuesta = ['sinRespuesta' => 'sinRespuesta'];
}

    echo json_encode($respuesta);

?>