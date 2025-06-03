<?php
include './auth_functions.php';
session_start();

logout();
header("Location: /server/index.php");
exit();
?>