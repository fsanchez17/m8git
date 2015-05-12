<?php
include_once '../classes/db.class.php';

$db = new db();
echo json_encode($db->getInfoUser());