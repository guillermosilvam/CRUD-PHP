<?php
include "../../../app/config/database.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM trenes WHERE codigo = $id";

    $result = mysqli_query($conn, $sql);
    
    header("Location: /server/static/templates/train_views/read_train.php?success=1");
}

?>