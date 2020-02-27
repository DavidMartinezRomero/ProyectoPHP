<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
    $(document).ready(function() {
        $('#create-account-button').on('click', function(e) {
            e.preventDefault();
            var dataString = $('#create-account-form').serialize();
            alert(email.value);
            alert(description.value);
            alert(Pr1.value);
            console.log(dataString);
        }); 
    });
    </script>
    
    <form id="create-account-form" action="#">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" class="nombre" name="nombre" value="Demo Demo">
        </div>

        <label for="name">1.- ¿Cual de las siguientes es una forma de test funcional?</label> <br>
            <input type="radio" name="Pregunta1" id="Pr1" value="Analisis de valores limite"> Análisis de valores límite. <br>
            <input type="radio" name="Pregunta1" id="Pr1" value="Test de usabilidad"> Test de usabilidad. <br>
            <input type="radio" name="Pregunta1" id="Pr1" value="Test de performance"> Test de performance.<br>
            <input type="radio" name="Pregunta1" id="Pr1" value="Test de seguridad"> Test de seguridad.<br>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">Lorem ipsum</textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="create-account-button">Crear cuenta</button>
    </form>
</body>
</html>