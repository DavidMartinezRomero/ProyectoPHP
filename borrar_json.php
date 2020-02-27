<?php
    include 'conexion_base.php';

    if(isset($_POST['attdelete'])) {
        $borrar_id = $_POST['attdelete'];
        $borrar = "EXEC SP_ConsultaBorrarDatos '$borrar_id'";
        $ejecuta_borrar = sqlsrv_query($conn, $borrar);

        if($ejecuta_borrar) {
                $bandera= 1;
            } else {
                $bandera= 2;
        }
    }

    // echo json_encode($bandera);


    include 'conexion_usuario.php';

    if(isset($_POST['usudelete'])) {
        $id_usu = $_POST['usudelete'];
        $consulta_usu = "EXEC SP_ConsultaBorrarUsuario '$id_usu'";
        $ejecuta_borrar_usu = sqlsrv_query($conn, $consulta_usu);

        if($ejecuta_borrar_usu) {
                $bandera= 3;
            } else {
                $bandera= 4;
        }
    }

    echo json_encode($bandera);

?>