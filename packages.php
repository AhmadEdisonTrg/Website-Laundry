<?php
    include_once 'database_connection.php';
    session_start();

    $residence = $_POST['residence_order'];
    $phone     = $_POST['phone_order'];
    $detail    = $_POST['detail_order'];
    $type      = $_POST['type_order'];
    $recipient = $_SESSION['username'];
    $user_id   = $_SESSION['user_id'];    

    $sql = "INSERT INTO orders (order_package,order_recipient,order_residence,order_phone,order_weight,order_price,order_status,order_detail,user_id) VALUES ('$type','$recipient','$residence','$phone','0','0','Waiting for admin response','$detail','$user_id')";

    mysqli_query($connection,$sql);
    
    header("Location: ../homepage.php");

?>