<?php
if(isset($_POST)){
	session_start();
	$_SESSION['correct_login'] = $_POST['correct'];
	$_SESSION['user_dni'] = $_POST['dni'];
	//echo json_encode(array($_SESSION['correct_login']));
}