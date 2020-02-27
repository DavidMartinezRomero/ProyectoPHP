<?php
include 'conexion_usuario.php';
include 'index.php';

    // OBTENER FECHA ACTUAL YYYY/MM/DD
    $time = time() - 25200;
    $fecha = date("d-m-Y H:i:s", $time);
    $fecha_actual = date("Y-m-d", $time);
    $hora_login = date("H:i:s", $time);


    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // VALIDACIONES PARA LOGIN

if (empty($_POST['usuario']) && empty($_POST['password'])){
    echo '<script>
    setTimeout(function(){ alert("Por favor ingresa un usuario y una contraseña"); }, 000);
    setTimeout(function(){ document.location.href="index.php"; }, 000);
    </script>';

} elseif (isset($_POST['usuario']) && empty($_POST['password'])){
    echo '<script>
    setTimeout(function(){ alert("Por favor ingresa una contraseña"); }, 000);
    setTimeout(function(){ document.location.href="index.php"; }, 000);
    </script>';

} elseif (empty($_POST['usuario']) && isset($_POST['password'])){
    echo '<script>
    setTimeout(function(){ alert("Por favor ingresa un usuario"); }, 000);
    setTimeout(function(){ document.location.href="index.php"; }, 000);
    </script>';
} else {
    $consulta_usuario = "EXEC SP_ConsUsuarioLogin ".$usuario.", ".$password."";
    $ejecuta = sqlsrv_query($conn, $consulta_usuario);
    $resultado = sqlsrv_fetch_array($ejecuta);   
    if ($usuario == $resultado['usuario'] && $password == $resultado['pswd']) {

        session_start();

        $_SESSION['sesionNom'] = $resultado['nombre'];
        $_SESSION['sesionId'] = $resultado['id_usuario'];
        $_SESSION['sesionUsuario'] = $resultado['usuario'];
        $_SESSION['sesionPswd'] = $resultado['pswd'];
        $_SESSION['sesionPerfil'] = $resultado['id_perfil'];
        $_SESSION['sesionMarcacion'] = $resultado['tipo_marcacion'];
        $_SESSION['sesionFechaMod'] = $resultado['fecha_modificacion_pass']->format('Y-m-d');
        $_SESSION['sesionHoraLogin'] = $hora_login;

        $fecha_mod = $_SESSION['sesionFechaMod'];

        $date1 = new DateTime($fecha_actual);
        $date2 = new DateTime($fecha_mod);
        $subdiff = $date1->diff($date2);
        $diff = $subdiff->days;

        if ($diff >= 2) {
            echo '<script>
            alert("Debes actualizar tu contraseña, cuentas con 1 minuto para realizar el cambio");
            document.location.href="change.php";
            </script>';
            return;            
        } 

                        // REDIRECCIONAR SEGÚN EL PERFIL

            if ($_SESSION['sesionPerfil'] == 1) {
                header('Location: tabla_usuarios.php');
            } elseif ($_SESSION['sesionPerfil'] == 2 && $_SESSION['sesionMarcacion'] == 1) {
                header('Location: index_user.php');
            } 

    } else {
        $consulta_fallida= 'EXEC SP_InsertarIntentos "'.$usuario.'", "'.$password.'"';
        $ejecuta_c = sqlsrv_query($conn, $consulta_fallida);
        echo '<script>
        alert("Usuario y/o contraseña incorrectos");
        document.location.href="index.php";
        </script>';
        return;
    }
}

?>