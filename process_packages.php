<?php
    include_once 'database_connection.php';

    $id          = $_POST['order_id'];
    $type        = $_POST['order_type'];
    $weight      = $_POST['weight_order'];
    $based_price = 0;
   
    echo $id;

    if($type == "Regular"){
        $based_price = 5000;
    }else if($type == "Express"){
        $based_price = 7500;
    }else{
        $based_price = 10000;
    }
    
    $total = $based_price * floatval($weight);

    $sql = "UPDATE orders SET order_status = 'In Progress', order_price = '$total',order_weight = '$weight' WHERE order_id='$id' ";

    mysqli_query($connection,$sql);

    header("Location: ../dashboard_admin.php");

?>