<?php

include 'conexion_usuario.php';

session_start();
$usuario_log = $_SESSION['sesionNom'];
$id_usuario_log= $_SESSION['sesionId'];

$nombre = trim($_POST['nombre']);
$nombre = strtolower($nombre);
$nombre = ucwords($nombre);
$apellido_paterno = trim($_POST['apellido_paterno']);
$apellido_paterno = strtolower($apellido_paterno);
$apellido_paterno = ucwords($apellido_paterno);
$apellido_materno = trim($_POST['apellido_materno']);
$apellido_materno = strtolower($apellido_materno);
$apellido_materno = ucwords($apellido_materno);
$usuario = trim($_POST['usuario']);
$usuario = strtolower($usuario);
$usuario = ucwords($usuario);
$password = trim($_POST['password']);
$id_perfil = trim($_POST['id_perfil']);
$tipo_marcacion = trim($_POST['tipo_marcacion']);

// CONSULTA PREVIA PARA QUE NO SE DUPLIQUEN USUARIOS

$consulta_dupl = "EXEC SP_ConsUsuarioDup '".$usuario."'";
$realiza_consul = sqlsrv_query($conn, $consulta_dupl);
$result_dup = sqlsrv_fetch_array($realiza_consul);

if (!empty($result_dup)) {
    echo '<script>
    setTimeout(function(){ alert("El nombre de usuario ya fue registrado en la base"); }, 000);
    setTimeout(function(){ document.location.href="tabla_usuarios.php"; }, 000);
    </script>';    
} else {
    
    // CONSULTA PARA DAR DE ALTA USUARIO A LA BASE

    $consulta_guardar = "EXEC SP_InsertarUsuario '".$nombre."', '".$apellido_paterno."', '".$apellido_materno."', '".$usuario."', '".$password."', '".$id_perfil."', '".$tipo_marcacion."'";
    $guardar_registro = sqlsrv_query($conn, $consulta_guardar);

    if ($guardar_registro) {
        echo '<script>
        setTimeout(function(){ alert("El usuario se guardó correctamente"); }, 000);
        setTimeout(function(){ document.location.href="tabla_usuarios.php"; }, 000);
        </script>';
    } else {
        echo '<script>
        setTimeout(function(){ alert("El usuario no se guardó. \nLlena todos los campos."); }, 000);
        setTimeout(function(){ document.location.href="tabla_usuarios.php"; }, 000);
        </script>';
    }
}
?>