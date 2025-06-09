<?php
include './auth_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = (string)$_POST['nombre'];
    $apellido = (string)$_POST['apellido'];
    $pasaporte = (int)$_POST['pasaporte'];
    $edad = (int)$_POST['edad'];
    $sexo = (string)$_POST['sexo'];
    $clave = $_POST['clave'];
    $confirmar_clave = $_POST['confirmar_clave'];
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 'Operador';


    if ($clave !== $confirmar_clave) {
        $_SESSION['error'] = "Las contraseñas no coinciden";
        header("Location: /server/static/templates/error_view/password_error.php");
        exit();
    }

    if (registerUser($nombre, $apellido, $pasaporte, $edad, $sexo, $clave, $tipo)) {
        header("Location: /server/static/templates/auth_view/login.php?success=1");
        exit();
    } else {
        echo "Error al registrar el usuario.";
    }
}

?>