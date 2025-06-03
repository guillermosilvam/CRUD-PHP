<?php
include './auth_functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pasaporte = $_POST['pasaporte'];
    $clave = $_POST['clave'];

    if (login( $pasaporte, $clave) ) {
        header('Location: /server/static/templates/dashboard/dashboard.php');
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>