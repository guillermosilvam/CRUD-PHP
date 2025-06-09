<?php
include "../../../app/config/database.php";
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function registerUser($name, $lastName, $passport, $age, $gender, $password, $tipo) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nombre, apellido, pasaporte, edad, sexo, tipo, clave) VALUES ('$name', '$lastName', '$passport', '$age', '$gender', '$tipo', '$hashedPassword')";
    return mysqli_query($conn, $sql);
}

function login($passport, $password) {
    global $conn;
    $sql = "SELECT * FROM usuarios WHERE pasaporte = '$passport' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['clave'])) {
            $_SESSION['user_id'] = $user['codigo'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_tipo'] = $user['tipo']; // Store user type in session
            return true;
        }
    }
    return false;
}

function logout() {
    session_unset();
    session_destroy();
}
?>