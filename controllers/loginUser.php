<?php
include_once '../classes/db.class.php';

if(isset($_POST)){
	session_start();
	$_SESSION['user_dni'] = $_POST['dni_user'];
	$db = new db();
	
	$pass = encrypt($_POST['password_user']);
	$password = $db->getActualPass();
	if($pass == $password[0]){
		echo json_encode(array("return"=>1));
	}else{
		echo json_encode(array("return"=>0));
	}
}

