<html>
<head>
	<meta charset="UTF-8">
	<title>Login Usuarios</title>
	<link href="resources/css/bootstrap.min.css" type="text/css"
		rel="stylesheet" />
	<link href="resources/css/jquery-ui.min.css" type="text/css" rel="stylesheet" />
	<link href="resources/css/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
	<link href="resources/css/estilos.css" type="text/css" rel="stylesheet" />
	<script src="resources/js/jquery-2.1.3.js"></script>
	<script src="resources/js/jquery-ui.min.js"></script>
	<script src="resources/js/bootbox.min.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/js/sha1.js"></script>
	<script src="resources/js/global3.js"></script>
</head>
<body>
	<div id="wrapper">
		<header class="text-center"><h1>Login</h1></header>
		<div id="form-access">
			<form id="form-user" action="controllers/loginUser.php" method="post">
				<input type="text" id="input-dni-user" name="dni_user" class="form-control" placeholder="DNI" /> <br/>
				
				<input type="password" id="password_user" name="password_user" class="form-control" placeholder="Password" /> <br/>
				<input type="submit" value="Login" class="btn btn-primary"/>
			</form>
		</div>
	</div>
	
</body>
</html>