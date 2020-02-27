<!DOCTYPE html>
<?php
include 'conexion_usuario.php';

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario Contacto</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <script src="js/funciones.js"></script>

  </head>
  <body>
    <div class="login-box">
      <img src="img/bg.jpeg" class="avatar" alt="Avatar Image">
      <h1>Logueate aquí</h1>
      <form action="logica.php" method="post" class="form_index">

        <label for="username">Usuario</label>
        <input type="text" placeholder="Ingresa tu usuario" name="usuario" placeholder="Usuario" onkeypress="return sincaracteres(event)" minlength="5" maxlength="10" title="El usuario debe de contar con minimo 5 caracteres" autocomplete="off"  style="text-align:center;">

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingresa tu contraseña" name="password" placeholder="Contraseña" onkeypress="return sinespacios(event)" minlength="8" maxlength="15"  style="text-align:center;">
        <input type="submit" value="Entra">
      </form>
    </div>
  </body>
</html>