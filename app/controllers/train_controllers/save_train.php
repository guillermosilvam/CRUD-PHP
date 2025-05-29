<?php
include "../../../app/config/database.php";

if (isset($_POST['name'], $_POST['velocidad'], $_POST['cap_turista'], $_POST['cap_economica'], $_POST['cap_primera'])) {
    $name = (string)$_POST['name'];
    $velocidad = (int)$_POST['velocidad'];
    $cap_turista = (int)$_POST['cap_turista'];
    $cap_economica = (int)$_POST['cap_economica'];
    $cap_primera = (int)$_POST['cap_primera'];

    $sql = "INSERT INTO trenes (nombre, velocidad, capacidad_economica, capacidad_turista, capacidad_primera) VALUES ('$name', '$velocidad', '$cap_economica', '$cap_turista', '$cap_primera')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: /server/static/templates/train_views/read_train.php?success=1");
        exit();
    } else {
        echo "Error al guardar el tren: " . mysqli_error($conn);
    }
}
?>