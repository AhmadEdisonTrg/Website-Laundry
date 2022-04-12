<?php
    include_once 'database_connection.php';
    
    session_start();

    $email    = $_POST['email_signin'];
    $password = $_POST['password_signin'];
    
    $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_password = '$password'";

    $result = mysqli_query($connection,$sql);

    if($result -> num_rows > 0){
        $_SESSION['status_login'] = "success";
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['user_fullname'];
        $_SESSION['user_status'] = $row['user_status'];
        $_SESSION['user_id'] = $row['user_id'];

        if($row['user_status'] == "Admin"){
            header("Location: ../dashboard_admin.php");
        }else{
            header("Location: ../homepage.php");
        } 
    }else{
        $_SESSION['status_login'] = "failed";
        header("Location: ../index.php");
    }
    // session_unset();session_destroy();

    
    
?>