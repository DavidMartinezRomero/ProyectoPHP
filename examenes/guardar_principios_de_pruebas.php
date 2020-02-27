<?php

    if (!isset($_POST['Pregunta1'])) {
        echo '<script> alert("Es necesario responder todas las preguntas"); 
        setTimeout(function(){ document.location.href="principios_de_pruebas.php"; }, 000); 
        </script>';       
    }

?>