<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Principios de pruebas</title>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="../js/jqueryes.js"></script>

    <?php
        session_start();
        $usuario_log = $_SESSION['sesionNom'];

        if (!$_SESSION) {
            header('Location: index.php');
        } elseif ($_SESSION['sesionPerfil'] != 2) {
            echo '<script>
            setTimeout(function(){ alert("No puedes acceder a este sitio"); }, 000);
            setTimeout(function(){ document.location.href="index.php"; }, 000);
            </script>';
        }
    ?>

</head>
<body>

    <div class="contenedor">    

        <header>
            <h1>Principios de pruebas</h1>

            <div class="session">
                <h3>Hola <?php echo $usuario_log ?></h3>
                <a href="cierre_sesion.php" class="btn active">Cerrar Sesión</a>
            </div>

        </header>

        <div class="ok3" title="Editar datos de usuario">

            <form action="guardar_principios_de_pruebas.php" method="post">

                <div class="pregunta">
                    <label>1.- ¿Cual de las siguientes es una forma de test funcional?</label><br>
                        <input type="radio" id="pdp1" name="Pregunta1" value="Analisis de valores limite" required> Análisis de valores límite. <br>
                        <input type="radio" id="pdp1" name="Pregunta1" value="Test de usabilidad" required> Test de usabilidad. <br>
                        <input type="radio" id="pdp1" name="Pregunta1" value="Test de performance" required> Test de performance.<br>
                        <input type="radio" id="pdp1" name="Pregunta1" value="Test de seguridad" required> Test de seguridad.<br>
                    </select>
                </div>

                <div class="pregunta">
                    <label>2.- ¿Cual de las siguientes no es una técnica de caja blanca?</label>
                        <input type="radio" id="pdp2" name="gender" value="Cobertura de sentencia"> Cobertura de sentencia. <br>
                        <input type="radio" id="pdp2" name="gender" value="Cobertura de caminos"> Cobertura de caminos.<br>
                        <input type="radio" id="pdp2" name="gender" value="Data flow testing"> Data flow testing.<br>
                        <input type="radio" id="pdp2" name="gender" value="Test de transicion de estados"> Test de transicion de estados.<br>
                </div>

                <div class="pregunta">
                    <label>3.- Un importante beneficio de la inspección de código es que:</label>
                        <input type="radio" id="pdp3" name="" value="Habilita la posibilidad de testear código antes que el ambiente de pruebas esté listo" > Habilita la posibilidad de testear código antes que el ambiente de pruebas esté listo. <br>
                        <input type="radio" id="pdp3" name="" value="Puede ser ejecutado por la persona que escribió el codigo" > Puede ser ejecutado por la persona que escribió el código. <br>
                        <input type="radio" id="pdp3" name="" value="Puede ser ejecutado por staff sin experiencia" > Puede ser ejecutado por staff sin experiencia. <br>
                        <input type="radio" id="pdp3" name="" value="Es menos costoso de ser ejecutado" > Es menos costoso de ser ejecutado.
                </div>

                <div class="pregunta">
                    <label>4.- ¿Cúal de los siguientes es el mejor recurso para definir resultados esperados en un test de Aceptación?</label>
                        <input type="radio" id="pdp4" name="" value="Actual results" > Actual results.<br>
                        <input type="radio" id="pdp4" name="" value="Program specification" > Program specification.<br>
                        <input type="radio" id="pdp4" name="" value="User requirements" > User requirements.<br>
                        <input type="radio" id="pdp4" name="" value="System specifications" > System specifications.<br>
                </div>

                <div class="pregunta">
                    <label>5.- ¿Cúal de los siguientes define mejor la verificación temprana del ciclo de vida?</label>
                        <input type="radio" id="pdp5" name="" value="Permite la pronta identificación de cambios en los requerimientos" > Permite la pronta identificación de cambios en los requerimientos. <br>
                        <input type="radio" id="pdp5" name="" value="Facilita la agenda de creación del ambiente. Cuando el ambiente sea creado" > Facilita la agenda de creación del ambiente. Cuando el ambiente sea creado. <br>
                        <input type="radio" id="pdp5" name="" value="Reduce la multiplicación de defectos" > Reduce la multiplicación de defectos. <br>
                        <input type="radio" id="pdp5" name="" value="Permite a los testers estar involucrados desde temprano en el proyecto" > Permite a los testers estar involucrados desde temprano en el proyecto.
                </div>

                <div class="pregunta">
                    <label>6.- ¿Cúal es la definición de test de integración?</label>
                        <input type="radio" id="pdp6" name="" value="Test de componentes individuales recientemente desarrollados" > Test de componentes individuales recientemente desarrollados. <br>
                        <input type="radio" id="pdp6" name="" value="Test de interacción entre modulos o subsitemas" > Test de interacción entre módulos o subsitemas. <br>
                        <input type="radio" id="pdp6" name="" value="Solo utiliza componentes que forman parte del sistema productivo" > Solo utiliza componentes que forman parte del sistema productivo. <br>
                        <input type="radio" id="pdp6" name="" value="Testea interfaces a otros sistemas" > Testea interfaces a otros sistemas. <br>
                </div>

                <div class="pregunta">
                    <label>7.- El análisis estático se describe mejor como: </label>
                        <input type="radio" id="pdp7" name="" value="El analisis de batch en programas" > El análisis de batch en programas. <br>
                        <input type="radio" id="pdp7" name="" value="La revision de test plans" > La revisión de test plans. <br>
                        <input type="radio" id="pdp7" name="" value="El analisis de codigo de programacion" > El análisis de código de programación. <br>
                        <input type="radio" id="pdp7" name="" value="El uso de testing de caja negra" > El uso de testing de caja negra. <br>
                </div>

                <div class="pregunta">
                    <label>8.- Alpha testing es: </label>
                        <input type="radio" id="pdp8" name="" value="Post-release testing ejecutado por el cliente en las dependencias del desarrollador" > Post-release testing ejecutado por el cliente en las dependencias del desarrollador. <br>
                        <input type="radio" id="pdp8" name="" value="El primer testing que es ejecutado" > El primer testing que es ejecutado. <br>
                        <input type="radio" id="pdp8" name="" value="Pre-release testing ejecutado por el cliente en las dependencias del desarrollador" > Pre-release testing ejecutado por el cliente en las dependencias del desarrollador. <br>
                        <input type="radio" id="pdp8" name="" value="Pre-release testing ejecutado por el cliente en sus oficinas" > Pre-release testing ejecutado por el cliente en sus oficinas. <br>
                </div>

                <div class="pregunta">
                    <label>9.- ¿Cúal de las siguientes afirmaciones sobre Revisiones es verdad?</label>
                        <input type="radio" id="pdp9" name="" value="Revisiones no pueden ser realizadas a especificacion de requerimientos" > Revisiones no pueden ser realizadas a especificación de requerimientos. <br>
                        <input type="radio" id="pdp9" name="" value="Revisiones son la manera menos efectiva de testear el codigo" > Revisiones son la manera menos efectiva de testear el código. <br>
                        <input type="radio" id="pdp9" name="" value="Revisiones no encuentran fallas en la planificacion" > Revisiones no encuentran fallas en la planificación. <br>
                        <input type="radio" id="pdp9" name="" value="Revisiones deberian hacerse sobre Codigo, documentacion" > Revisiones deberían hacerse sobre Código, documentación. <br>
                </div>

                <div class="pregunta">
                    <label>10.- ¿Por medio de que se prueba una funcionalidad? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp10" value="">
                </div>

                <div class="pregunta">
                    <label>11.- ¿Qué entiendes que es un modelo de datos? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp11" value="">
                </div>

                <div class="pregunta">
                    <label>12.- ¿A partir de que se pueden diseñar los casos de prueba? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp12" value="">
                </div>

                <div class="pregunta">
                    <label>13.- ¿Qué es una prueba no funcional? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp13" value="">
                </div>

                <div class="pregunta">
                    <label>14.- ¿Qué son las pruebas de Arnes? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp14" value="">
                </div>

                <div class="pregunta">
                    <label>15.- ¿Bases para una prueba de integración? </label>
                    <input type="radio" id="pdp15" name="" value="Datos" > Datos.<br>
                    <input type="radio" id="pdp15" name="" value="Infraestructura" > Infraestructura.<br>
                    <input type="radio" id="pdp15" name="" value="Arquitectura, Casos de uso" > Arquitectura, Casos de uso.<br>
                    <input type="radio" id="pdp15" name="" value="Interfeces" > Interfeces.<br>
                </div>

                <div class="pregunta">
                    <label>16.- ¿Qué son las prubas ed integración AD-HOC? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp16" value="">
                </div>

                <div class="pregunta">
                    <label>17.- ¿Qué es un modelos de calidad? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp17" value="">
                </div>

                <div class="pregunta">
                    <label>18.- ¿Cuál es el modelo que más se usa para calidad de los sistemas? </label>
                    <input type="radio" id="pdp18" name="" value="Modelo V" > Modelo V. <br>
                    <input type="radio" id="pdp18" name="" value="Modelo W" > Modelo W. <br>
                    <input type="radio" id="pdp18" name="" value="Modelo multinivel" > Modelo multinivel. <br>
                    <input type="radio" id="pdp18" name="" value="Modelo Nescor" > Modelo Nescor. <br>
                    <input type="radio" id="pdp18" name="" value="SDLC - Software Development Life Cycle" > SDLC - Software Development Life Cycle. <br>
                </div>

                <div class="pregunta">
                    <label>19.- Menciona el orden de los niveles de Prueba. </label>
                    <input type="radio" id="pdp19" name="" value="Aceptacion, Sistema, Integracion, Componentes, Programacion" > Aceptación, Sistema, Integración, Componentes, Programación. <br>
                    <input type="radio" id="pdp19" name="" value="Programacion, Sistema, Integracion, Componentes, Aceptacion" > Programación, Sistema, Integración, Componentes, Aceptación. <br>
                    <input type="radio" id="pdp19" name="" value="Programacion, Aceptacion, Integracion, Sistema, Componentes" > Programación, Aceptación, Integración, Sistema, Componentes. <br>
                    <input type="radio" id="pdp19" name="" value="Programacion, Componentes, Integracion, Sistema, Aceptacion" > Programación, Componentes, Integración, Sistema, Aceptación. <br>
                </div>

                <div class="pregunta">
                    <label>20.- ¿Qué entiendes por pruebas de sistema? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp20" value="">
                </div>

                <div class="pregunta">
                    <label>21.- ¿Para qué sirve un modelo de calidad de sistema? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp21" value="">
                </div>

                <div class="pregunta">
                    <label>22.- ¿Qué es el sistema funcional de un sistema? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp22" value="">
                </div>

                <div class="pregunta">
                    <label>23.- ¿Qué entiendes por la especificación de componentes? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp23" value="">
                </div>

                <div class="pregunta">
                    <label>24.- Menciona el orden de la rama de desarrollo del modelo General. </label>
                    <input type="radio" id="pdp24" name="" value="Diseno tecnico del sistema, Diseno funcional del sistema, Especificacion de componentes, Definicion de requisitos, Programacion" > Diseño técnico del sistema, Diseño funcional del sistema, Especificación de componentes, Definición de requisitos, Programación. <br>
                    <input type="radio" id="pdp24" name="" value="Diseno funcional del sistema, Diseño tecnico del sistema, Definicion de requisitos, Especificacion de componentes, Programacion" > Diseño funcional del sistema, Diseño técnico del sistema, Definición de requisitos, Especificación de componentes, Programación. <br>
                    <input type="radio" id="pdp24" name="" value="Definicion de requisitos, Diseno funcional del sistema, Diseno tecnico del sistema, Especificacion de componentes, Programacion" > Definición de requisitos, Diseño funcional del sistema, Diseño técnico del sistema, Especificación de componentes, Programación. <br>
                    <input type="radio" id="pdp24" name="" value="Programacion, Especificacion de componentes, Definicion de requisitos, Diseno técnico del sistema, Diseno técnico del sistema" > Programación, Especificación de componentes, Definición de requisitos, Diseño técnico del sistema, Diseño técnico del sistema. <br>
                </div>

                <div class="pregunta">
                    <label>25.- ¿En qué nivel del modelo V general se inicia el set de casos de pruebas y por qué? (2 puntos) </label>
                    <input type="radio" id="pdp25" name="" value="Programacion" > Programación. <br>
                    <input type="radio" id="pdp25" name="" value="Definicion de requisitos" > Definición de requisitos. <br>
                    <input type="radio" id="pdp25" name="" value="Diseno funcional del sistema" > Diseño funcional del sistema. <br>
                    <input type="radio" id="pdp25" name="" value="Diseno tecnico del sistema" > Diseño técnico del sistema. <br>
                    <input type="radio" id="pdp25" name="" value="Especificacion de componentes" > Especificación de componentes. <br>
                </div>


                <div class="pregunta">
                    <label>26.- ¿Qué otro nombre Reciben las pruebas de componentes? </label>
                    <input type="radio" id="pdp26" name="" value="Pruebas de Smock Test" > Pruebas de Smock Test.<br>
                    <input type="radio" id="pdp26" name="" value="Pruebas Unitarias" > Pruebas Unitarias.<br>
                    <input type="radio" id="pdp26" name="" value="Pruebas Funcionales" > Pruebas Funcionales.<br>
                    <input type="radio" id="pdp26" name="" value="Pruebas no Funcionales" > Pruebas no Funcionales.<br>
                </div>

                <div class="pregunta">
                    <label>27.- Las técnicas de caja blanca se dividen en 2, menciona cuales son (2 puntos). </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp27" value="">
                </div>

                <div class="pregunta">
                    <label>28.- Las pruebas de aceptación tambien implican: </label>
                    <input type="radio" id="pdp28" name="" value="Pruebas de Smock Test" > Pruebas de Smock Test.<br>
                    <input type="radio" id="pdp28" name="" value="Pruebas Unitarias" > Pruebas Unitarias.<br>
                    <input type="radio" id="pdp28" name="" value="Pruebas Funcionales" > Pruebas Funcionales.<br>
                    <input type="radio" id="pdp28" name="" value="Pruebas de caja negra" > Pruebas de caja negra.<br>

                </div>

                <div class="pregunta">
                    <label>29.- Las bases para la definición de pruebas de aceptación: </label>
                    <input type="radio" id="pdp29" name="" value="Datos" > Datos.<br>
                    <input type="radio" id="pdp29" name="" value="Infraestructura" > Infraestructura.<br>
                    <input type="radio" id="pdp29" name="" value="Requerimientos de usuario, Casos de uso" > Requerimientos de usuario, Casos de uso.<br>
                    <input type="radio" id="pdp29" name="" value="Interfeces" > Interfeces.<br>
                </div>

                <div class="pregunta">
                    <label>30.- ¿Qué otro nombre reciben las pruebas de aceptación? </label>
                    <input type="radio" id="pdp30" name="" value="Pruebas de sentencia y cobertura" > Pruebas de sentencia y cobertura. <br>
                    <input type="radio" id="pdp30" name="" value="Pruebas de decisión y cobertura" > Pruebas de decisión y cobertura. <br>
                    <input type="radio" id="pdp30" name="" value="Pruebas de cobertura de camino" > Pruebas de cobertura de camino. <br>
                    <input type="radio" id="pdp30" name="" value="Pruebas UAT" > Pruebas UAT. <br>
                </div>

                <div class="pregunta">
                    <label>31.- ¿Qué otro modelo de calidad se puede decir que es extención de otro? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp31" value="">
                </div>

                <div class="pregunta">
                    <label>32.- ¿Qué son lo modelos interactivos? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp32" value="">
                </div>

                <div class="pregunta">
                    <label>33.- ¿Cuál es un principio fundamental de todos los modelos? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp33" value="">
                </div>

                <div class="pregunta">
                    <label>34.- ¿De cuantos niveles consta el modelo V General? </label>
                    <input type="radio" id="pdp34" name="" value="2" > 2. <br>
                    <input type="radio" id="pdp34" name="" value="4" > 4. <br>
                    <input type="radio" id="pdp34" name="" value="7" > 7. <br>
                    <input type="radio" id="pdp34" name="" value="10" > 10. <br>
                </div>

                <div class="pregunta">
                    <label>35.- ¿La fase 1 a quien va oirientada y constituye los dos extremos del ciclo del modelo general? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp35" value="">
                </div>

                <div class="pregunta">
                    <label>36.- La fase 4 del modelo general V, ¿A qué se refiere? </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp36" value="">
                </div>

                <div class="pregunta">
                    <label>37.- Son los dos elementos que se extienden dentro del modelo W: </label>
                        <!-- <input type="radio" name="" value="" >   -->
                        <input type="text" id="pdp37" value=""> <br> <br> <br>
                </div>

                <button type="submit" class="submitquest">Enviar formulario</button>

            </form>

        </div>

    </div>

</body>
</html>