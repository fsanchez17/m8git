<?php
include_once '../classes/db.class.php';

//$salt ='$belda&';


if(isset($_POST)){
	$db = new db();
	$control = 0;
	if($_POST['password_new'] != ""){
		if($_POST['password_new'] == $_POST['password_new2']){
			$password_old = $db->getActualPass();
			//echo json_encode($password_old, array($_POST['password_old']));
			$old_pass="";
			if(! empty($_POST['password_old'])){
				$old_pass = encrypt($_POST['password_old']);
			}
			
			if($old_pass == $password_old[0]){
				$new = encrypt($_POST['password_new']);
				$old_passwords = $db->getOldPasswords();
				if(in_array($new, $old_passwords)){
					$control=2;
					echo json_encode(array("msg" => "ERROR: Introduce una contraseña que no hayas usado anteriormente."));
					
				}else{
					$control=1;
					$db->updatePass($new);
				}

			}else{
				$control=2;
				echo json_encode(array("msg" => "ERROR: La contraseña antigua no es la correcta."));
			}
		}else{
			$control=2;
			echo json_encode(array("msg" => "ERROR: Las contraseñas no coinciden"));
		}
	}
	if($control==0 || $control==1){
		$db->updateInfo($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['telefono']);
		echo json_encode(array("msg" => "Usuario guardado correctamente"));
	}
	
}