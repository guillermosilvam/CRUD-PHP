<?php 
include "../../../app/config/database.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM ciudades WHERE codigo = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
    }
}

if (isset($_POST['name'])) {
    $id = $_GET['id'];
    $nombre = (string)$_POST['name'];

    $sql = "UPDATE ciudades set nombre = '$nombre' WHERE codigo = $id";
    mysqli_query($conn, $sql);
    header("Location: /server/static/templates/city_views/read_city.php?success=1");
    
}
?>