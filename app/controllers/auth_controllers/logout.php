<?php
include './auth_functions.php';
session_start();

logout();
header("Location: /index.php");
exit();
?>