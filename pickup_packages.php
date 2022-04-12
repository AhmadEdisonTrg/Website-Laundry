<?php
    include_once 'database_connection.php';
    $id = $_GET['id'];
   

    $sql = "UPDATE orders SET order_status = 'Someone will pickup your packages' WHERE order_id='$id' ";

    mysqli_query($connection,$sql);

    header("Location: ../dashboard_admin.php");

?>