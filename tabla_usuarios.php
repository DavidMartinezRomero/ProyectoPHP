<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla de usuarios</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos_tabla_usuarios.css">
	<link rel="stylesheet" href="public/css/style.css" type="text/css">
	<link rel="stylesheet" href="public/css/zebra_pagination.css" type="text/css">
	<link rel="stylesheet" href="css/1.8.0.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">    


	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/jqueryes.js"></script>
	
<?php
    session_start();
	$usuario_log = $_SESSION['sesionNom'];

	if (!$_SESSION) {
		header('Location: index.php');
	} elseif ($_SESSION['sesionPerfil'] != 1) {
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
			<h1>Tabla de Usuarios</h1>

			<div class="session">
				<h3>Hola <?php echo $usuario_log ?></h3>
				<a href="cierre_sesion.php" class="btn active">Cerrar Sesión</a>
			</div>

		</header>
		<main>
			<div class="area_alta">

				<button id="btn-alta-usuario" class="btn" >Alta</button>
				<button id="btn-buscar-usuario" class="btn" >Buscar</button>
				<a id="btn-limpiar-usuario" class="btn" href="tabla_usuarios.php">Limpiar</a>

			</div>

			<div class="form_busc_alta">
								<!-- FORMULARIO OCULTO DE ALTA -->
				<form action="alta_usuarios.php" method="post" id="form_alta" class="form_alta">
					<input type="text" name="nombre" id="nom_usu_al" placeholder="Nombre" onkeypress="return sololetras(event)" maxlength="50" autocomplete="off" required>
					<input type="text" name="apellido_paterno" id ="ap_usu_al" placeholder="Apellido Paterno" onkeypress="return sololetras(event)" maxlength="50" autocomplete="off" required>
					<input type="text" name="apellido_materno" id ="am_usu_al" placeholder="Apellido Materno" onkeypress="return sololetras(event)" maxlength="50" autocomplete="off" required>
					<input type="text" name="usuario" placeholder="Usuario" onkeypress="return sincaracteres(event)" minlength="5" maxlength="10" autocomplete="off" required>
					<input type="password" name="password" id="pswd_alta" placeholder="Password" onpaste="return false" minlength="15" maxlength="15" autocomplete="off" onkeypress="return sinespacios(event)" required>
					<select name="id_perfil" id="select_perf" title="tipo usu">
						<option value="" select>Tipo de usuario</option>
						<option value="1" id="admin_select">Administrador</option>
						<option value="2" id="usu_select">Usuario</option> 
					</select>
					<select name="tipo_marcacion" id="select_marcacion">
						<option value="" id="tipo_marc">Tipo de marcacion</option>
						<option value="1">Paginacion</option>
						<option value="2">Despachador</option> 
						<option value="3" id="no_apl">No aplica</option> 
					</select>
					<br>
					<input type="submit" class="btnn alter-btn" value="Guardar" />
				</form>
								<!-- FORMULARIO OCULTO DE BUSCAR -->
				<form action="buscar_usuarios.php" method="post" id="form_buscar" class="form_buscar">
					<input type="text" name="nom_busc" id="nom" placeholder="Nombre" onkeypress="return sololetras(event)" maxlength="50" autocomplete="off">
					<input type="text" name="ap_busc" id="ap" placeholder="Apellido Paterno" onkeypress="return sololetras(event)" maxlength="50" autocomplete="off">
					<input type="text" name="am_busc" id="am" placeholder="Apellido Materno" onkeypress="return sololetras(event)" maxlength="50" autocomplete="off">
					<input type="text" name="usu_busc" id="usu" placeholder="Usuario" onkeypress="return sincaracteres(event)" minlength="5" maxlength="10" autocomplete="off">
					<input type="text" name="perf_busc" id="perf" placeholder="Perfil" onkeypress="return solonumeros(event)" maxlength="3" autocomplete="off">
					<br>
						<input type="submit" id="btn-bsq" class="btnn specific-btn-bsq" value="Buscar"/>
				</form>

			</div>

			<?php 
			
			include 'conexion_usuario.php';
					// CONSULTA PARA SABER EL # DE USUARIOS EN LA BASE
			$consulta_usu = 'select count(id_usuario) from usuarios';
			$ejecuta_cons = sqlsrv_query($conn, $consulta_usu);
			$resul_usu = sqlsrv_fetch_array($ejecuta_cons);
			$total_usuarios =  $resul_usu[0];
			$resultados = 6;

			include 'Zebra_Pagination.php';
					// GENERACION DE CLASE DE LA LIBRERIA PARA LA PAGINACION
			$paginacion = new Zebra_Pagination();
			$paginacion->records($total_usuarios);
			$paginacion->records_per_page($resultados);

			$position = (($paginacion->get_page()-1) * $resultados);
			?>

			<table id="tabla" class="tabla">
				<tr>
					<th> <div class="disp"> Nombre<div class="order"><a href="tabla_usuarios.php?Mostrar=nombredesc" class="fas fa-chevron-up" id="1"></a><a href="tabla_usuarios.php?Mostrar=nombreasc" class="fas fa-chevron-down"></a></div> </div> </th>
					<th> <div class="disp"> Apellido Paterno<div class="order"><a href="tabla_usuarios.php?Mostrar=appaternodesc" class="fas fa-chevron-up"></a><a href="tabla_usuarios.php?Mostrar=appaternoasc" class="fas fa-chevron-down"></a></div> </div> </th>
					<th> <div class="disp"> Apellido Materno<div class="order"><a href="tabla_usuarios.php?Mostrar=apmaternodesc" class="fas fa-chevron-up"></a><a href="tabla_usuarios.php?Mostrar=apmaternoasc" class="fas fa-chevron-down"></a></div> </div> </th>
					<th> <div class="disp"> Usuario<div class="order"><a href="tabla_usuarios.php?Mostrar=usuariodesc" class="fas fa-chevron-up"></a><a href="tabla_usuarios.php?Mostrar=usuarioasc" class="fas fa-chevron-down"></a></div> </div> </th>
					<th>Password</th>
					<th>Fecha modificación</th>
					<th>Fecha de alta</th>
					<th>Perfil</th>
					<th>Marcación</th>
					<th colspan="2">Opciones</th>
				</tr>

				<?php
				//vALIDACION TABLA
									
				if(isset($_GET['Mostrar'])) { 
					$mostrar='order by id_usuario';
					$result=$_GET['Mostrar'];
					 
					 if ($result=="nombreasc"){
						$mostrar ='order by nombre asc';
					 }	elseif ($result=="nombredesc"){
						$mostrar ='order by nombre desc';

					 }  elseif($result=="appaternoasc"){
						$mostrar ='order by apellido_paterno asc';
					 }	elseif($result=="appaternodesc"){
						$mostrar ='order by apellido_paterno desc';

					 }	elseif ($result=="apmaternoasc"){
						$mostrar ='order by apellido_materno asc';
					 }	elseif ($result=="apmaternodesc"){
						$mostrar ='order by apellido_materno desc';

					 }	elseif ($result=="usuarioasc"){
						$mostrar ='order by usuario asc';
					 }	elseif ($result=="usuariodesc"){
						$mostrar ='order by usuario desc';
					 }
				
				?>
					<!--INICIO TABLA -->
				<!-- CONSULTA JUNTO CON LA LIBRERIA PARA TRAER REGISTROS -->

				<?php		
					$consulta_mostrar1 = "EXEC SP_ConsultaPaginacion '$mostrar','$position','$resultados'";
					$ejecuta_mostrar = sqlsrv_query($conn, $consulta_mostrar1);
					$i = 0;
					
					while ($resultado_mostrar = sqlsrv_fetch_array($ejecuta_mostrar)) {
						$id_usu = $resultado_mostrar['id_usuario'];
						$nombre = $resultado_mostrar['nombre'];
						$apellido_materno = $resultado_mostrar['apellido_materno'];
						$apellido_paterno = $resultado_mostrar['apellido_paterno'];
						$usuario = $resultado_mostrar['usuario'];
						$pswd = $resultado_mostrar['pswd'];
						$fecha_modificacion_pass = $resultado_mostrar['fecha_modificacion_pass']->format('Y-m-d H:i:s');
						$fecha_alta = $resultado_mostrar['fecha_alta']->format('Y-m-d H:i:s');
						$descripcion = $resultado_mostrar['descripcion'];
						$tipo_marcacion = $resultado_mostrar['tipo_marcacion'];
						$i++; ?>
					<div>
						<tr>
							<td class="nmb"><?php echo $nombre ?></td>
							<td><?php echo $apellido_paterno ?></td>
							<td><?php echo $apellido_materno ?></td>
							<td><?php echo $usuario ?></td>
							<td><?php echo $pswd ?></td>
							<td><?php echo $fecha_modificacion_pass ?></td>
							<td><?php echo $fecha_alta ?></td>
							<td><?php echo $descripcion ?></td>
							<td><?php echo $tipo_marcacion ?></td>
							<td class="opciones"> 
							<a href="<?=$id_usu?>" class="id2 btnn" id="btn-borrar">Eliminar</a>
							<a href="<?=$id_usu?>" class="abrir_usu btnn" id="btn-editar">Editar</a>
							</td>
						</tr>
					</div>

				<?php } ?>
							<tr>
								<td colspan="11">
									<?php 
										$paginacion->render();
									?>
								</td>
							</tr>

				<!--FIN TABLA -->	
				<?php } ?>		
									
				
			</table>
				
			<div class="muestra">
				<div>
					<a href="tabla_usuarios.php" class="btn active">Ocultar Usuarios</a>
				</div>

				<div>
					<a href="tabla_usuarios.php?Mostrar=mostrar" id="Mostrar" class="btn active">Mostrar Usuarios</a>
				</div>
			</div>
		</main>
	</div>	

	                    <!-- FORMULARIO OCULTO DIALOGO EDITAR USUARIOS -->

	<div id="ok2" title="Editar datos de usuario">

		<form action="editar_usuarios.php" method="post" class="formulario-editar">

				<input type="hidden" id="id_usuario" name="dev_id_usu"/>
				<label for="nombre">Nombre : </label>
				<input type="text" id="nombre" name="dev_nom" onkeypress="return sololetras(event)" minlength="5" maxlength="255" onpaste="return false" autocomplete="off" required/>
				<label for="apellido_pa">Apellido Paterno :	</label>
				<input type="text" id="apellido_pa" name="dev_ap_pa" onkeypress="return sololetras(event)" maxlength="15" onpaste="return false" autocomplete="off" required/>
				<label for="apellido_ma">Apellido Materno : </label>
				<input type="text" id="apellido_ma" name="dev_ap_ma" onkeypress="return sololetras(event)" maxlength="15" onpaste="return false" autocomplete="off" required/>
				<label for="usu">Usuario : </label>
				<input type="text" id="usuario" name="dev_usu" onkeypress="return sincaracteres(event)" minlength="5" maxlength="10" onpaste="return false" autocomplete="off" required/>
				<label for="pass">Password : </label>
				<input type="password" id="pass" name="dev_pass" minlength="15" maxlength="15" onpaste="return false" autocomplete="off" onkeypress="return sinespacios(event)" required/>
				<label for="perf">Perfil : </label>
				<input type="text" id="perfil" name="dev_perf" onkeypress="return solonumeros(event)" maxlength="3" onpaste="return false" autocomplete="off" required/>
				<p></p>
				<p></p>
				<p></p>
				<p></p>
				<p></p>
				<p></p>
				<p></p>
			<input type="submit" class="btn-edit" value="Guardar"/>

		</form>
	</div>


					<!-- FORMULARIO OCULTO PARA CONFIRMAR CONTRASEÑA AL DAR DE ALTA ADMINISTRADORES -->


	<div id="confirm-admin" title="Confirma tus datos">
	
		<form action="" id="form_confirm_admin">

			<label for="">Usuario : </label>
			<input type="text" id="usuario_conf" placeholder="Usuario" onkeypress="return sincaracteres(event)" minlength="5" maxlength="10" autocomplete="off" required="">

			<label for="">Contraseña : </label>
			<input type="password" id="pswd_conf" placeholder="Password" minlength="15" maxlength="15" autocomplete="off" onkeypress="return sinespacios(event)" required>

		</form>
	
	</div>

                    <!-- TEXTO OCULTO DIALOGO ELIMINAR -->
	<div id="delete_usu" title="ADVERTENCIA">
		<p>¿Estas seguro de eliminar el usuario?</p>
	</div>

	<script>

		$('#form_alta').hide();	
		$('#form_buscar').hide();	
		$('#delete_usu').hide();
		$('#id_usuario').hide();
		$('#ok2').hide();
		$('#confirm-admin').hide();	

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

		$(pswd_alta).keydown(function(e) { if (e.which == 9) { return false; } }); 

	});
	</script>
</body>
</html>