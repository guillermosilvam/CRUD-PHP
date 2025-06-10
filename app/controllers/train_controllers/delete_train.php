<?php
include "../../../app/config/database.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $check = mysqli_query($conn, "SELECT 1 FROM viajes WHERE fk_codigo_tren = $id LIMIT 1");
    if (mysqli_num_rows($check) > 0) {
        header("Location: /server/static/templates/train_views/read_train.php?error=usado");
        exit();
    }
    $sql = "DELETE FROM trenes WHERE codigo = $id";
    $result = mysqli_query($conn, $sql);
    
    header("Location: /server/static/templates/train_views/read_train.php?success=1");
    exit();
}

?>