<html>
<head>
	<meta charset="UTF-8">
	<title>Modificar Usuarios</title>
	<link href="resources/css/bootstrap.min.css" type="text/css"
		rel="stylesheet" />
	<link href="resources/css/jquery-ui.min.css" type="text/css" rel="stylesheet" />
	<link href="resources/css/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
	<link href="resources/css/estilos.css" type="text/css" rel="stylesheet" />
	<script src="resources/js/jquery-2.1.3.js"></script>
	<script src="resources/js/jquery-ui.min.js"></script>
	<script src="resources/js/bootbox.min.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/js/typeahead.js"></script>
	<script src="resources/js/keypad.js"></script>
	<script src="resources/js/global.js"></script>
</head>
<body>
	<?php 
		session_start();
		$_SESSION['code']=rand(100,9999999);
	?>
	<div id="wrapper">
		<header class="text-center"><h1>Acceso al usuario</h1></header>
		<div id="form-access">
			<form action="" method="post">
				<input type="text" id="input-dni" name="dni" class="form-control typeahead" placeholder="DNI" /> <br/>
				
				<div class="">
					Introduce el código:
					<b><span id="numAleatorio"><?=$_SESSION['code']?></span></b>
				</div>
				
				<div class="input-group margin-bottom-sm">
					<input readonly="readonly" id="inputKeypad" class="form-control" type="text">
					<button type="button" title="Open the keypad" id="open-keyboard" class="input-group-addon">
						<i class="fa fa-key fa-lg"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>