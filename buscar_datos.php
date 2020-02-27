<?php

include 'conexion_base.php';

$arreglos = array();
$filtro="";

    if ($_POST['alt_nombre']) {
        $nom = $_POST['alt_nombre'];
        $filtro = ' where nombre_completo='."'$nom'";
    
    }elseif ($_POST['alt_telefono1']) {
        $tel1 = $_POST['alt_telefono1'];
        $filtro = ' where telefono1='."'$tel1'";
    
    }elseif ($am = $_POST['alt_telefono2']) {
        $tel2 = $_POST['alt_telefono2'];
        $filtro = ' where telefono2='."'$tel2'";
    
    }elseif ($_POST['alt_telefono3']) {
        $tel3 = $_POST['alt_telefono3'];
        $filtro = ' where telefono3='."'$tel3'";
    
    }elseif ($_POST['idUsu']) {
        $idUsu = $_POST['idUsu'];
        $filtro = ' where id_usuario='."'$idUsu'";
    
    }elseif ($_POST['alt_folio']) {
        $folio = $_POST['alt_folio'];
        $filtro = ' where Folio='."'$folio'";
    }; 


    if (!empty($filtro)) {

        $consulta_mostrar = " SELECT * FROM datos ".$filtro."";

        $ejecuta_mostrar = sqlsrv_query($conn, $consulta_mostrar);
    
        $i = 0;
                                
        while ($resultado_mostrar = sqlsrv_fetch_array($ejecuta_mostrar)) {
    
            if (empty($resultado_mostrar)) {
                $arreglos = ['noExiste' => "No existe el usuario"];
            } else {

                $usuario = [
                    'id_datos' => $resultado_mostrar['id_datos'],
                    'nombre_completo' => $resultado_mostrar['nombre_completo'],
                    'telefono1' => $resultado_mostrar['telefono1'],
                    'telefono2' => $resultado_mostrar['telefono2'],
                    'telefono3' => $resultado_mostrar['telefono3'],
                    'comentarios' => $resultado_mostrar['comentarios'],
                    'fecha_modificacion' => $resultado_mostrar['fecha_modificacion'],
                    'Respuesta1' => $resultado_mostrar['Respuesta1'],
                    'Respuesta2' => $resultado_mostrar['Respuesta2'],
                    'Respuesta3' => $resultado_mostrar['Respuesta3'],
                    'id_usuario' => $resultado_mostrar['id_usuario'],
                    'Folio' => $resultado_mostrar['Folio']
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