<?php
include './auth_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = (string)$_POST['nombre'];
    $apellido = (string)$_POST['apellido'];
    $pasaporte = (int)$_POST['pasaporte'];
    $edad = (int)$_POST['edad'];
    $clave = $_POST['clave'];

    if (registerUser($nombre, $apellido, $pasaporte, $edad,$clave)) {
        header("Location: /server/static/templates/auth_view/login.php?success=1");
        exit();
    } else {
        echo "Error al registrar el usuario.";
    }
}

?>