<?php
    include_once 'database_connection.php';
    $id    = $_GET['id'];
    $today = date('Y-m-d');
   

    $sql = "UPDATE orders SET order_status = 'Finished', order_date_finished = '$today' WHERE order_id='$id' ";

    mysqli_query($connection,$sql);

    header("Location: ../dashboard_admin.php");

?>