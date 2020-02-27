<?php
    include 'conexion_usuario.php';

    $Dev_Id = $_POST['dev_id_usu'];
    $Dev_nom = $_POST['dev_nom'];
    $Dev_nom = strtolower($Dev_nom);
    $Dev_nom = ucwords($Dev_nom);
    $Dev_am = $_POST['dev_ap_ma'];
    $Dev_am = strtolower($Dev_am);
    $Dev_am = ucwords($Dev_am);
    $Dev_ap = $_POST['dev_ap_pa'];
    $Dev_ap = strtolower($Dev_ap);
    $Dev_ap = ucwords($Dev_ap);
    $Dev_usu = $_POST['dev_usu'];
    $Dev_usu = strtolower($Dev_usu);
    $Dev_usu = ucwords($Dev_usu);
    $Dev_pass = $_POST['dev_pass'];
    $Dev_perf = $_POST['dev_perf'];

    $consulta_act = "SP_ActualizarUsuarios '".$Dev_nom."','".$Dev_ap."','".$Dev_am."','".$Dev_usu."','".$Dev_pass."','".$Dev_perf."','".$Dev_Id."'";
    $ejecuta_act = sqlsrv_query($conn, $consulta_act);

    if($ejecuta_act) {
        echo "<script>  
        
        setTimeout(function(){ alert('Datos actualizados correctamente'); }, 000);
        setTimeout(function(){ document.location.href='tabla_usuarios.php'; }, 000);

        </script>";
        } else {
            echo "<script>
            alert('algo fallo');
            <script>";
    }
?>