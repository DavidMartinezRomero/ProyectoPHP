<?php

include 'conexion_base.php';

    if (isset($_POST['atributo'])) {
    
        $atributo = $_POST['atributo'] ;
        $consulta2 = "SP_SeleccionarDatosId '".$atributo."'";
        $ejecutar2 = sqlsrv_query($conn, $consulta2);

        while($fila3 = sqlsrv_fetch_array($ejecutar2)) {
            $usuario = [
                'Id_datos' => $fila3['id_datos'],
                'Nombre_completo' => $fila3['nombre_completo'],
                'Telefono1' => $fila3['telefono1'],
                'Telefono2' => $fila3['telefono2'],
                'Telefono3' => $fila3['telefono3'],
                'Comentarios' => $fila3['comentarios'],
                'Fecha_modificacion' => $fila3['fecha_modificacion'],
                'Respuesta1' => $fila3['Respuesta1'],
                'Respuesta2' => $fila3['Respuesta2'],
                'Respuesta3' => $fila3['Respuesta3'],
                'Id_usuario' => $fila3['id_usuario'],
                'Folio' => $fila3['Folio']
            ];

        }
    }

include 'conexion_usuario.php';

    if (isset($_POST['atributoUsu'])) {
        $atributoUsu = $_POST['atributoUsu'] ;

        $consultaUsu = "SP_SeleccionarUsuarioId '".$atributoUsu."'";
        $ejecutarUsu = sqlsrv_query($conn, $consultaUsu);

        while($fila3 = sqlsrv_fetch_array($ejecutarUsu)) {
            $usuario = [
                'IdUsu' => $fila3['id_usuario'],
                'Nom' => $fila3['nombre'],
                'Ap_Ma' => $fila3['apellido_materno'],
                'Ap_Pa' => $fila3['apellido_paterno'],
                'Usu' => $fila3['usuario'],
                'Pass' => $fila3['pswd'],
                'Perf' => $fila3['id_perfil']
            ];

        }
    }
    
    echo json_encode($usuario);

?>