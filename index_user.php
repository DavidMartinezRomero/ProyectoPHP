<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exámenes</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos_tabla_datos.css">
	<link rel="stylesheet" href="public/css/style.css" type="text/css">
	<link rel="stylesheet" href="css/1.8.0.css" />
	<link rel="stylesheet" href="public/css/zebra_pagination.css" type="text/css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/jqueryes.js"></script>
	
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
			<h1 id="dos">Exámenes</h1>

			<div class="session">
				<h3>Hola <?php echo $usuario_log ?></h3>
				<a href="cierre_sesion.php" class="btn active">Cerrar Sesión</a>
			</div>

		</header>

        <div class="area_alta">

		<button id="btn-buscar-usuario" class="btn" >Buscar</button>
		<a id="btn-limpiar-usuario" class="btn" href="index_user.php">Limpiar</a>

        </div>

        <main>

			<div class="form_busc_alta">

								<!-- FORMULARIO OCULTO DE BUSCAR -->
				<form action="buscar_datos.php" method="post" id="form_buscar" class="form_buscar">

					<input type="text" name="alt_nombre" id="nom_dat" placeholder="Nombre" onkeypress="return sololetras(event)" maxlength="255"autocomplete="off" />
					<input type="text" name="alt_telefono1" id="tel1_dat" placeholder="Tel1" onkeypress="return solonumeros(event)" minlength="10" maxlength="10"autocomplete="off" />
					<input type="text" name="alt_telefono2" id="tel2_dat" placeholder="Tel2" onkeypress="return solonumeros(event)" minlength="10" maxlength="10"autocomplete="off" />
					<input type="text" name="alt_telefono3" id="tel3_dat" placeholder="Tel3" onkeypress="return solonumeros(event)"minlength="10" maxlength="10"autocomplete="off" />
					<input type="text" name="idUsu" id="idusu_dat" placeholder="Id Usuario" onkeypress="return solonumeros(event)" maxlength="5"autocomplete="off" />
					<input type="text" class="fol" id="fol_dat" name="alt_folio" placeholder="Folio" onkeypress="return sincaracteres(event)" minlength="5" maxlength="5" pattern="[A-Za-z0-9]+"autocomplete="off"/>
					<br>
						<input type="submit" id="btn_buscar_dat" class="btnn alter-btn" value="Buscar"/>
				</form>

			</div>

			<?php 
			
			include 'conexion_examenes.php';
					// CONSULTA PARA SABER EL # DE EXAMENES EN LA BASE
			$consulta_ex = 'select count(id_examen) from examenes';
			$ejecuta_cons = sqlsrv_query($conn, $consulta_ex);
			$resul_usu = sqlsrv_fetch_array($ejecuta_cons);
			$total_datos =  $resul_usu[0];
			$resultados = 8;

			include 'Zebra_Pagination.php';
					// GENERACION DE CLASE DE LA LIBRERIA PARA LA PAGINACION
			$paginacion = new Zebra_Pagination();
			$paginacion->records($total_datos);
			$paginacion->records_per_page($resultados);
			?>

			<table id="tabla" class="tabla">
				<tr>
					<th>Nombre de exámen</th>
					<th>Fecha de creación</th>
					<th>Duración</th>
					<th>Módulo</th>
					<th>Nombre Módulo</th>
					<th colspan="2">Opciones</th>
				</tr>

				<?php
				if(isset($_GET['Mostrar'])) {
									// CONSULTA JUNTO CON LA LIBRERIA PARA TRAER REGISTROS
							$consulta_mostrar = "SELECT * FROM examenes ORDER BY id_examen OFFSET ".(($paginacion->get_page()-1) * $resultados)." ROWS FETCH NEXT ".$resultados." ROWS ONLY";
                            $ejecuta_mostrar = sqlsrv_query($conn, $consulta_mostrar);
                            $i = 0;
							
							while ($resultado_mostrar = sqlsrv_fetch_array($ejecuta_mostrar)) {

								$nombre_examen = $resultado_mostrar['nombre'];
								$fecha_creacion = $resultado_mostrar['fecha_creacion']->format('Y-m-d H:i:s');
								$duracion = $resultado_mostrar['duracion'];
								$modulo = $resultado_mostrar['modulo'];
								$nombre_modulo = $resultado_mostrar['nombre_modulo'];
								$i++; ?>

								<!-- Trim para ulr de examen -->
								<?php
								$espacio = array(' ');
								$guion_bajo  = array('_');
								$min_nombre_examen= strtolower($nombre_examen);
								$url_nombre_examen = str_replace($espacio, $guion_bajo, $min_nombre_examen);
								?>

							<div>
								<tr>
									<td><?php echo $nombre_examen ?></td>
									<td><?php echo $fecha_creacion ?></td>
									<td><?php echo $duracion ?> horas</td>
									<td><?php echo $modulo ?></td>
									<td><?php echo $nombre_modulo ?></td>
									<td class="opciones"> 
                                    <a href="examenes/<?=$url_nombre_examen?>.php" class="btnn" id="btn-editar">Ir</a>
									</td>
								</tr>
								
							</div>

					  <?php } ?>
							<tr>
								<td colspan="13">
									<?php 
										$paginacion->render();
									?>
								</td>
							</tr>
				<?php	} ?>
								

			</table>
        </main>
        <div class="muestra">
            <div>
                <a href="index_user.php" class="btn active">Ocultar Exámenes</a>
            </div>

            <div>
                <a href="index_user.php?Mostrar=mostrar?>" class="btn active">Mostrar Exámenes</a>
            </div>
        </div>
	</div>	

	                    <!-- FORMULARIO OCULTO DIALOGO EDITAR DATOS -->
<!-- 
	<div id="ok1" title="Editar registro">

		<form action="editar_datos.php" method="post" class="formulario-editar">

            <input type="hidden" id="id_datos" name="dev_id_datos"/>
            <label for="nombre_completo">Nombre Completo</label>
            <input type="text" id="nombre_completo" name="dev_nombre" onkeypress="return sololetras(event)" maxlength="255" onpaste="return false" autocomplete="off" required/>
            <label for="telefono1">Teléfono 1</label>
            <input type="text" id="telefono1" name="dev_telefono1" onkeypress="return solonumeros(event)" minlength="8" maxlength="10" onpaste="return false" autocomplete="off" required/>
            <label for="telefono2">Teléfono 2</label>
            <input type="text" id="telefono2" name="dev_telefono2" onkeypress="return solonumeros(event)" minlength="8" maxlength="10" onpaste="return false" autocomplete="off" required/>
            <label for="telefono3">Teléfono 3</label>
            <input type="text" id="telefono3" name="dev_telefono3" onkeypress="return solonumeros(event)"minlength="8" maxlength="10" onpaste="return false" autocomplete="off" required/>
            <label for="comentarios">Comentarios</label>
            <input type="text" id="comentarios" name="dev_comentarios" onkeypress="return sololetras(event)" maxlength="255" onpaste="return false" autocomplete="off" required/>
            <label for="Respuesta1">Respuesta 1</label>
            <input type="text" id="Respuesta1" name="dev_Respuesta1" onkeypress="return solonumeros(event)" minlength="1" maxlength="2" onpaste="return false" autocomplete="off" required/>
            <label for="Respuesta2">Respuesta 2</label>
            <input type="text" id="Respuesta2" name="dev_Respuesta2" onkeypress="return solonumeros(event)" minlength="1" maxlength="2" onpaste="return false" autocomplete="off" required/>
            <label for="Respuesta3">Respuesta 3</label>
            <input type="text" id="Respuesta3" name="dev_Respuesta3" onkeypress="return solonumeros(event)" minlength="1" maxlength="2" onpaste="return false" autocomplete="off" required/>
            <label for="Folio">Folio</label>
            <input type="text" id="Folio" class="fol" name="dev_Folio"  minlength="5" maxlength="5" pattern="[A-Za-z0-9]+" onpaste="return false" autocomplete="off" required/>
			<p></p>

			<input type="submit" class="btn-edit" value="Guardar"/>

		</form>

	</div> -->

	<script>

	$('#form_alta').hide();	
	$('#form_buscar').hide();	
	$('#delete').hide();
	$('#id_usuario').hide();
	$('#ok2').hide();
		
	$(document).ready(function(){ 

	$('#btn-alta-usuario').on('click',function(e){ 
		$('.form_buscar').hide();
		$('.form_alta').toggle('slow');
		e.preventDefault();
	});

	$('#btn-buscar-usuario').on('click',function(e){
		$('.form_alta').hide();
		$('.form_buscar').toggle('slow');
		e.preventDefault();
	});
	});

	</script>
</body>
</html>