<?php
include "../../../app/config/database.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM ciudades WHERE codigo = $id";

    $result = mysqli_query($conn, $sql);
    
    header("Location: /server/static/templates/city_views/read_city.php?success=1");
}

?>