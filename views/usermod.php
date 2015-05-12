<?php ?>
<html>
<head>
<meta charset="UTF-8">
<title>Modificar Usuarios</title>
<link href="../resources/css/bootstrap.min.css" type="text/css"
	rel="stylesheet" />
<link href="../resources/css/jquery-ui.min.css" type="text/css"
	rel="stylesheet" />
<link href="../resources/css/fontawesome/css/font-awesome.min.css"
	type="text/css" rel="stylesheet" />
<link href="../resources/css/estilos.css" type="text/css"
	rel="stylesheet" />
<script src="../resources/js/jquery-2.1.3.js"></script>
<script src="../resources/js/jquery-ui.min.js"></script>
<script src="../resources/js/bootbox.min.js"></script>
<script src="../resources/js/bootstrap.min.js"></script>
<script src="../resources/js/typeahead.js"></script>
<script src="../resources/js/keypad.js"></script>
<script src="../resources/js/sha1.js"></script>
<script src="../resources/js/global2.js"></script>
</head>
<body>
<?php
session_start ();
if ($_SESSION ['correct_login'] == true) {
	
	?>

	<div id="wrapper">
		<a id="logout" class="btn btn-danger pull-right" href="../index.php"><i
			class="fa fa-user"></i> Salir</a>
		<h1>Modificar Datos - <small>DNI: <?=$_SESSION['user_dni']?></small></h1>

		<form id="mod_user_form" class="info-user" method="post" action="../controllers/saveUser.php">

			<fieldset>
				<legend></legend>
				<div class="form-inline">
					<div class="form-group">
						<label for="nombre">Nombre</label> <input id="nombre" type="text"
							name="nombre" class="form-control" />
					</div>

					<div class="form-group">
						<label for="apellidos">Apellidos</label> <input id="apellidos"
							type="text" name="apellidos" class="form-control" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend></legend>
				<div class="form-inline">

					<div class="form-group">
						<label for="email">Email</label> <input id="email" type="text"
							name="email" class="form-control" />
					</div>

					<div class="form-group">
						<label for="telefono">Teléfono</label> <input id="telefono"
							type="tel" name="telefono" class="form-control" />
					</div>

				</div>
			</fieldset>
			<fieldset>
				<legend></legend>
				<div class="form-inline">
					<div class="form-group col-xs-12">
						<label for="password_old">Antigua contraseña</label> <input
							id="password_old" type="password" name="password_old"
							class="form-control" />
					</div>
					<div class="form-group col-xs-12">
						<label for="password_new">Nueva contraseña <i class="fa fa-info-circle" title="La contraseña debe contener: mayúsculas, mínusculas, números y debe ser superior a 8 caracteres"></i></label> <input
							id="password_new" type="password" name="password_new"
							class="form-control" />
					</div>

					<div class="form-group col-xs-12">
						<label for="password_new2">Repite la nueva contraseña</label> <input
							id="password_new2" type="password" name="password_new2"
							class="form-control" />
					</div>
				</div>
			</fieldset>
			
			<button type="submit" name="send" class="btn btn-success pull-right" id="guardar"><i class="fa fa-floppy-o"></i> Guardar</button>
		</form>


	</div>
	
<?php }?>
</body>
</html>