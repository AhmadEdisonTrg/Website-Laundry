<?php
    include_once 'database_connection.php';

    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (user_fullname,user_email,user_password,user_status) VALUES ('$fullname','$email','$password','User')";

    mysqli_query($connection,$sql);

    header("Location: ../index.php?signup=success");

?>