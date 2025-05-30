<?php 
include "../../../app/config/database.php";

if (isset($_POST['name'])) {
    $name = (string)$_POST['name'];
    $sql = "INSERT INTO ciudades (nombre) VALUES ('$name')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: /server/static/templates/city_views/read_city.php?success=1");
        exit();
    } else {
        echo "Error al guardar el tren: " . mysqli_error($conn);
    }
    
}
?>