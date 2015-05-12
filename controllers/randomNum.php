<?php
session_start();
echo json_encode(array($_SESSION['code']));
