<?php
    include_once 'controllers/database_connection.php';
    session_start();
    if(isset($_SESSION['status_login'])){
        if($_SESSION['status_login'] == "success" && $_SESSION['user_status'] == "User"){
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Laundry</title>

        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    </head>
    <body style="margin:0px;padding:0px">
        <div style="width:100%;height:100%;position:fixed;display:flex;flex-flow:row;margin:0px;padding:0px;">
            <div style="width:250px;;flex:0 1 auto;flex-shrink:0;margin:0;background-color:#6734C3;box-shadow:0px 5px 15px #999595">
                <img src="./images/icon.png" style="width:120px;height: 120px;margin-left:auto;margin-right:auto;display:block"/>
                <hr style="color:white;height:2px"/>
                <div class="row">
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="list-group-item" style="background-color:inherit;border:none;color:white">
                                <img src="./images/profile.png" style="width:50px;height: 50px;"/>                                  
                            </li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <ul class="list-group">
                            <li class="list-group-item" style="background-color:inherit;border:none;color:white;">
                                <span style="font-family: 'Roboto Slab', serif;width:50px;height: 50px;">
                                    <?php echo $_SESSION['username']?>
                                </span>
                                <p><?php echo $_SESSION['user_status']?></p>                            
                            </li>                       
                        </ul>
                    </div>
                </div>
                <div class="row" style="cursor:pointer" onclick="window.location.href='./homepage.php'">
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="list-group-item" style="background-color:inherit;border:none;color:white">
                                <img src="./images/choose.png" style="width:50px;height: 50px;"/>                                  
                            </li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <ul class="list-group">
                            <li class="list-group-item" style="background-color:inherit;border:none;color:white;padding-top:20px">
                                <span style="font-family: 'Roboto Slab', serif;width:50px;height: 50px;">
                                    Choose Packages
                                </span>                                   
                            </li>                       
                        </ul>
                    </div>
                </div>
                <div class="row" style="cursor:pointer" onclick="window.location.href='./user_order.php'">
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="list-group-item" style="background-color:inherit;border:none;color:white">
                                <img src="./images/order.png" style="width:50px;height: 50px;"/>                                  
                            </li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <ul class="list-group">
                            <li class="list-group-item" style="background-color:inherit;border:none;color:white;padding-top:20px">
                                <span style="font-family: 'Roboto Slab', serif;width:50px;height: 50px;">
                                    Orders Progress
                                </span>                                   
                            </li>                       
                        </ul>
                    </div>
                </div>                    
                <form action="controllers/logout.php" method="post">
                    <button type="submit" class="btn btn-danger" style="position:absolute;bottom:10px;width:200px;margin-left:25px;">Log Out</button>
                </form>
            </div>
            <div style="flex:1 1 auto;overflow-y:auto">
                <div class="alert alert-info" role="alert">
                    <img src="./images/hello.png" style="width:50px;height: 50px;"/>
                    Hello <?php echo $_SESSION['username']?>, Welcome to our website.                    
                </div>
                <div class="col-12" style="margin-bottom:10px;margin-top:10px">
                    <p style="text-align:center;font-family: 'Marmelad', sans-serif;font-size:26px">Order Progress</p>
                </div>
                <div class="alert alert-light" role="alert">
                    Your weight and price order will be appears after your order status becomes In Progress.
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:center">Package</th>
                            <th style="text-align:center">Date Order</th>
                            <th style="text-align:center">Detail</th>
                            <th style="text-align:center">Weight</th>
                            <th style="text-align:center">Price</th>
                            <th style="text-align:center">Finished Date</th>
                            <th style="text-align:center">Status</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                            $id     = $_SESSION['user_id'];
                            $sql    = "SELECT * FROM orders WHERE user_id = '$id'";
                            
                            $result = mysqli_query($connection,$sql);                            
                            if($result -> num_rows > 0){
                                while($row = $result->fetch_array()){                                
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $row['order_package']?></td>
                                <td style="text-align:center"><?php echo $row['order_date']?></td>
                                <td style="text-align:center"><?php echo $row['order_detail']?></td>
                                <td style="text-align:center"><?php echo $row['order_weight']?></td>
                                <td style="text-align:center"><?php echo $row['order_price']?></td>
                                <td style="text-align:center">
                                    <?php 
                                        if($row['order_date_finished'] == null || $row['order_date_finished'] == ""){
                                            echo '-';
                                        }else{
                                            echo $row['order_date_finished'];
                                        }
                                    ?>
                                </td>
                                <td style="text-align:center"><?php echo $row['order_status']?></td>
                            </tr>
                        <?php
                                }
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>    
</html>

<?php
        }
    }else{
        header("Location: ./index.php");
    }
?>