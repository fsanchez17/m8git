<html>
<head><meta charset="UTF-8"></head>
<?php
include_once '../classes/db.class.php';
session_start();
print_r($_SESSION);

header("Content-type: text/plain");
$db = new db();
$info = $db->getInfoUser();
print_r($info);
echo json_encode($info);
print_r($db->getActualPass());
$salt ='belda';

function simple_encrypt($text)
{
	return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function simple_decrypt($text)
{
	return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

echo "Encriptado : ".simple_encrypt("47a1ddc9708eade752fd2443b4012512bb828831")."\n";
echo "Encriptado : ".simple_encrypt("47a1ddc9708eade752fd2443b4012512bb828831")."\n";
echo "Desencriptado: ".simple_decrypt(simple_encrypt("47a1ddc9708eade752fd2443b4012512bb828831"))."\n";

echo ("47a1ddc9708eade752fd2443b4012512bb828831" == simple_decrypt(simple_encrypt("47a1ddc9708eade752fd2443b4012512bb828831")));


?>
</html>