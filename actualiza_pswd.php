<?php

    include 'conexion_usuario.php';

    session_start();
    $usuario_log = $_SESSION['sesionUsuario'];
    $pswd_usu_log = $_SESSION['sesionPswd'];
    $id_usu = $_SESSION['sesionId'];
    $tipo_perfil = $_SESSION['sesionPerfil'];
    $tipo_marcacion = $_SESSION['sesionMarcacion'];

    if (!$_SESSION) {
		header('Location: index.php');
    }

    if ($_POST['pswd_act']) { $pswd_actual = $_POST['pswd_act']; }
    if ($_POST['new_pswd']) {$new_pswd = $_POST['new_pswd'];}
    if ($_POST['new_pswd_confirm']) {$new_pswd_confirm = $_POST['new_pswd_confirm'];}


    if ($pswd_actual != $pswd_usu_log) {
        echo '<script>
        setTimeout(function(){ alert("La confirmación de tu contraseña actual no coincide"); }, 000);
        setTimeout(function(){ document.location.href="change.php"; }, 000);
        </script>';
    } elseif ($new_pswd_confirm != $new_pswd) {
        echo '<script>
        setTimeout(function(){ alert("La confirmación de la nueva contraseña no coincide"); }, 000);
        setTimeout(function(){ document.location.href="change.php"; }, 000);
        </script>';

    } elseif ($new_pswd_confirm == $pswd_usu_log) {
        echo '<script>
            alert("No puedes actualizar a la misma contraseña");
            document.location.href="change.php";
        </script>';

    } else {
        $act_pswd = "EXEC SP_ActualizarPswd '".$new_pswd_confirm."', '".$id_usu."' ";
        $ejec_act = sqlsrv_query($conn, $act_pswd);
            if ($tipo_perfil == 1) {
                echo '<script>
                alert("Se actualizó la contraseña correctamente");
                document.location.href="tabla_usuarios.php";
                </script>';
            } elseif ($tipo_perfil == 2 && $tipo_marcacion == 1) {
                echo '<script>
                alert("Se actualizó la contraseña correctamente");
                document.location.href="index_user.php";
                </script>';
            }
    }

?>