<?php 
include "../../../app/config/database.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM trenes WHERE codigo = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $velocidad = $row['velocidad'];
        $cap_turista = $row['capacidad_turista'];
        $cap_economica = $row['capacidad_economica'];
        $cap_primera = $row['capacidad_primera'];
    }
}

if (isset($_POST['name'], $_POST['velocidad'], $_POST['cap_turista'], $_POST['cap_economica'], $_POST['cap_primera'])) {
    $id = $_GET['id'];
    $name = (string)$_POST['name'];
    $velocidad = (int)$_POST['velocidad'];
    $cap_turista = (int)$_POST['cap_turista'];
    $cap_economica = (int)$_POST['cap_economica'];
    $cap_primera = (int)$_POST['cap_primera'];

    $sql = "UPDATE trenes set nombre = '$name', velocidad = '$velocidad', capacidad_economica = '$cap_economica', capacidad_turista = '$cap_turista', capacidad_primera = '$cap_primera' WHERE codigo = $id";
    mysqli_query($conn, $sql);
    header("Location: /server/static/templates/train_views/read_train.php?success=1");
    
}
?>