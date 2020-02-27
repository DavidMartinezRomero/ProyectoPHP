<?php

include 'conexion_usuario.php';


$arreglos = array();
$filtro="";

    if ($_POST['nom_busc']) {
        $nom = $_POST['nom_busc'];
        $filtro = ' where nombre='."'$nom'";
    
    }elseif ($_POST['ap_busc']) {
        $ap = $_POST['ap_busc'];
        $filtro = ' where apellido_paterno='."'$ap'";
    
    }elseif ($am = $_POST['am_busc']) {
        $am = $_POST['am_busc'];
        $filtro = ' where apellido_materno='."'$am'";
    
    }elseif ($_POST['usu_busc']) {
        $usu = $_POST['usu_busc'];
        $filtro = ' where usuario='."'$usu'";
    
    }elseif ($_POST['perf_busc']) {
        $perf = $_POST['perf_busc'];
        $filtro = ' where id_perfil='."'$perf'";
    }; 


    if (!empty($filtro)) {

        $consulta_mostrar = " SELECT * FROM vista_usuarios ".$filtro."";


        $ejecuta_mostrar = sqlsrv_query($conn, $consulta_mostrar);
    
        $i = 0;
                                
        while ($resultado_mostrar = sqlsrv_fetch_array($ejecuta_mostrar)) {


            if (empty($resultado_mostrar)) {
                $arreglos = ['noExiste' => "No existe el usuario"];
            } else {
                $usuario = [
                    'id_usuario' => $resultado_mostrar['id_usuario'],
                    'nombre' => $resultado_mostrar['nombre'],
                    'apellido_materno' => $resultado_mostrar['apellido_materno'],
                    'apellido_paterno' => $resultado_mostrar['apellido_paterno'],
                    'usuario' => $resultado_mostrar['usuario'],
                    'pswd' => $resultado_mostrar['pswd'],
                    'fecha_modificacion_pass' => $resultado_mostrar['fecha_modificacion_pass'],
                    'fecha_alta' => $resultado_mostrar['fecha_alta'],
                    'descripcion' => $resultado_mostrar['descripcion']
                ];
            }
    
            array_push($arreglos, $usuario);
            
            $i++; 
    
        } 
    } else {
        $arreglos = ['sinUsuario' => "No existe el usuario"];
    }

    echo json_encode($arreglos);
?>