<?php
if(isset($_POST)){
	session_start();
	$_SESSION['correct_login'] = 0;
	$_SESSION['user_dni'] = "0" ;
	session_destroy();
}	