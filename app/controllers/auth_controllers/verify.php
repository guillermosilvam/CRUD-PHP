<?php 
include './auth_functions.php';

session_start();

if (!isLoggedIn()) {
    header('Location: /server/static/templates/auth_view/login.php');
    exit();
}

?>