<?php
include_once 'encrypt.php';
class db {
	private $con;

	function __construct(){
		$this->con = mysqli_connect ("localhost", "root", "stereo1723", "Usermod");
		mysqli_set_charset($this->con, 'utf8');

	}
	
	function getDNIs(){
		$ssql = mysqli_query($this->con, "SELECT DNI FROM usuarios");
		
		$return = array();
		while ($a=mysqli_fetch_assoc($ssql)){
			$return[] = $a['DNI'];
			
		}
		
		return $return;
	}
	
	function getInfoUser(){
		session_start();
		$ssql = mysqli_query($this->con, "SELECT nombre, apellidos, email, telefono FROM usuarios_info WHERE DNI = '".$_SESSION['user_dni']."'");
		
		$return = array();
		
		while($a = mysqli_fetch_assoc($ssql)){
			$return['nombre'] = $a['nombre'];
			$return['apellidos'] = $a['apellidos'];
			$return['email'] = $a['email'];
			$return['telefono'] = $a['telefono'];
			
		}
		
		return $return;
	}
	
	function getActualPass(){
		$ssql = mysqli_query($this->con, "SELECT password0 FROM usuarios");
		$return = array();
		while ($a=mysqli_fetch_assoc($ssql)){
			//$return[] = decrypt($a['password0']);
			$return[] = $a['password0'];
			
		}
		return $return;
	}
	
	function getOldPasswords(){
		session_start();
		$ssql = mysqli_query($this->con, "SELECT password1, password2, password3, password4, password5, password6, password7, password8, password9 FROM usuarios WHERE DNI = '".$_SESSION['user_dni']."'");
		$return = array();
		
		while($a = mysqli_fetch_assoc($ssql)){
			/*$return[] = decrypt($a['password1']);
			$return[] = decrypt($a['password2']);
			$return[] = decrypt($a['password3']);
			$return[] = decrypt($a['password4']);
			$return[] = decrypt($a['password5']);
			$return[] = decrypt($a['password6']);
			$return[] = decrypt($a['password7']);
			$return[] = decrypt($a['password8']);
			$return[] = decrypt($a['password9']);*/
			
			$return[] = $a['password1'];
			$return[] = $a['password2'];
			$return[] = $a['password3'];
			$return[] = $a['password4'];
			$return[] = $a['password5'];
			$return[] = $a['password6'];
			$return[] = $a['password7'];
			$return[] = $a['password8'];
			$return[] = $a['password9'];
		}
		
		return $return;
	}
	
	function updatePass($new){
		session_start();
		
		//$new = encrypt($new);
		$ssql = mysqli_query($this->con, 'UPDATE usuarios SET password9 = password8, password8=password7, password7=password6, password6=password5, password5=password4, password4=password3, password3=password2, password2=password1, password1=password0, password0="'.$new.'" WHERE DNI = "'.$_SESSION['user_dni'].'"');
		if (!$ssql){
			die("Error al insertar en al base de datos.");
		}
		//echo json_encode(mysqli_fetch_array($ssql));
	}
	
	function updateInfo($nombre, $apellido, $email, $telefono){
		session_start();
		$ssql = mysqli_query($this->con, "UPDATE usuarios_info SET nombre='".$nombre."', apellidos='".$apellido."', email='".$email."', telefono='".$telefono."' WHERE DNI='".$_SESSION['user_dni']."'");
		if (!$ssql){
			die("Error al insertar en al base de datos.");
		}
	}
}