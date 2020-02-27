<?php
    include 'conexion_base.php';

    $Dev_nombre = $_POST['dev_nombre'];
    $Dev_nombre = strtolower($Dev_nombre);
    $Dev_nombre = ucwords($Dev_nombre);
    $Dev_telefono1 = $_POST['dev_telefono1'];
    $Dev_telefono2 = $_POST['dev_telefono2'];
    $Dev_telefono3 = $_POST['dev_telefono3'];
    $Dev_comentarios = $_POST['dev_comentarios'];
    $Dev_comentarios = strtolower($Dev_comentarios);
    $Dev_comentarios = ucfirst($Dev_comentarios);
    $Dev_Respuesta1 = $_POST['dev_Respuesta1'];
    $Dev_Respuesta2 = $_POST['dev_Respuesta2'];
    $Dev_Respuesta3 = $_POST['dev_Respuesta3'];
    $Dev_Folio = $_POST['dev_Folio'];
    $Dev_Folio = strtoupper($Dev_Folio);
    $Dev_id_datos = $_POST['dev_id_datos'];

    $consulta_act = "SP_ActualizarDatos '".$Dev_nombre."','".$Dev_telefono1."','".$Dev_telefono2."','".$Dev_telefono3."','".$Dev_comentarios."','".$Dev_Respuesta1."','".$Dev_Respuesta2."','".$Dev_Respuesta3."','".$Dev_Folio."','".$Dev_id_datos."'";
    $ejecuta_act = sqlsrv_query($conn, $consulta_act);

    if($ejecuta_act) {
        echo "<script>  
        
        setTimeout(function(){ alert('Datos actualizados correctamente'); }, 000);
        setTimeout(function(){ document.location.href='index_user.php'; }, 000);

        </script>";
        } else {
            echo "<script>
            alert('algo fallo');
            <script>";
    }
?>