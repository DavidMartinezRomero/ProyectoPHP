<?php

    include '../conexion_usuario.php';

    session_start();
    $usuario_log = $_SESSION['sesionUsuario'];
    $pswd_usu_log = $_SESSION['sesionPswd'];
    $id_usu = $_SESSION['sesionId'];
    $tipo_perfil = $_SESSION['sesionPerfil'];
    $tipo_marcacion = $_SESSION['sesionMarcacion'];

    if (!$_SESSION) {
        header('Location: index.php');
    };
    
    if ($_POST['atributoUsu']) { 
        echo '<script> alert("Si sllegó"); 
        </script>';     
     };

     var_dump($usuario_log);
     die('Hay atributo');

?>
