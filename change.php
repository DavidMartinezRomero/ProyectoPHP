<!DOCTYPE html>
<?php
include 'conexion_usuario.php';

session_start();

$usuario_log = $_SESSION['sesionUsuario'];
$pswd_usu_log = $_SESSION['sesionPswd'];
$id_usu = $_SESSION['sesionId'];
$nombre = $_SESSION['sesionNom'];
$tipo_perfil = $_SESSION['sesionPerfil'];
$hora_login = $_SESSION['sesionHoraLogin'];

if (!$_SESSION) {
  header('Location: index.php');
}

print $hora_login;

// CONTADOR DE TIEMPO PARA CAMBIAR DE PSWD EN MENOS DE 1 MINUTO

$time = time() - 25200;
$hora_actual = date("H:i:s", $time);

$date1 = new DateTime($hora_login);
$date2 = new DateTime($hora_actual);
$dteDiff  = $date1->diff($date2);

$counter = $dteDiff->format("%I"); 

if ($counter >= 01 ) {
  echo '<script>
  setTimeout(function(){ alert("Se termino el tiempo, ingresa de nuevo"); }, 000);
  setTimeout(function(){ document.location.href="cierre_sesion.php"; }, 000);
  </script>';
}

header("Refresh: 60;");

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cambio de contraseña</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="js/funciones.js"></script>

  </head>
  <body>
    <div class="login-box-change">
      <img src="img/bg.jpeg" class="avatar" alt="Avatar Image">
      <h1> Hola <?php echo $nombre ?></h1>

      <form action="actualiza_pswd.php" method="post" class="form_change">

        <label for="pswd_act">Confirma contraseña actual</label>
        <input type="password" placeholder="Confirma tu contraseña actual" name="pswd_act" title="Solo letras y números" minlength="8" maxlength="15" onkeypress="return sinespacios(event)" autocomplete="off" oncopy="return false"  style="text-align:center;" required="">

        <label for="username">Nueva contraseña</label>
        <input type="password" placeholder="Ingresa tu nueva contraseña" name="new_pswd" onkeypress="return sinespacios(event)" minlength="8" maxlength="15" title="Solo letras, números y caracteres especiales" oncopy="return false" autocomplete="off"  style="text-align:center;" required="">

        <label for="password">Confirma tu nueva Contraseña</label>
        <input type="password" placeholder="Confirma tu nueva contraseña" name="new_pswd_confirm" placeholder="Contraseña" onkeypress="return sinespacios(event)" title="Solo letras, números y caracteres especiales" oncopy="return false" minlength="8" maxlength="15"  style="text-align:center;" autocomplete="off" required="">
        <input type="submit" value="Actualizar">
      </form>
    </div>

    <script>

      $(document).ready(function(){
        setTimeout(refrescar, 500);
      });
      function refrescar(){
        $(body).load("");
      }

      window.location.hash="no-back-button";
      window.location.hash="Again-No-back-button";//esta linea es necesaria para chrome
      window.onhashchange=function(){window.location.hash="no-back-button";}

    </script>
  
    </body>
</html>