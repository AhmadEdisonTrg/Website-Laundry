<?php
    include_once 'controllers/database_connection.php';
    session_start();
    if(isset($_SESSION['status_login'])){
        if($_SESSION['status_login'] == "success" && $_SESSION['user_status'] == "Admin"){
            $id     = $_SESSION['user_id'];
            $sql    = "SELECT * FROM orders";

            $new_order   = 0;
            $in_progress = 0;
            $finished    = 0;
                            
            $result = mysqli_query($connection,$sql);                            
            if($result -> num_rows > 0){
                while($row = $result->fetch_array()){  
                    if($row['order_status'] == 'Waiting for admin response' || $row['order_status'] == 'Someone will pickup your packages'){
                        $new_order++;
                    }else if($row['order_status'] == 'In Progress'){
                        $in_progress++;
                    }else{
                        $finished++;
                    }
                }
            }   
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
                <form action="controllers/logout.php" method="post">
                    <button type="submit" class="btn btn-danger" style="position:absolute;bottom:10px;width:200px;margin-left:25px;">Log Out</button>
                </form>
            </div>
            <div style="flex:1 1 auto;overflow-y:auto;">
                <div class="alert alert-info" role="alert">
                    <img src="./images/admin.png" style="width:70px;height: 50px;"/>
                    This is Dashboard Admin.                    
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="card" style="margin:25px;background-color:darkgreen;color:white">                    
                                <div class="card-body">
                                    <p class="card-text" style="text-align:center">NEW ORDERS</p>
                                    <p class="card-text" style="text-align:center"><?php echo $new_order?> Order(s)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="margin:25px;background-color:darkorange;color:white">                    
                                <div class="card-body">
                                    <p class="card-text" style="text-align:center">IN PROGRESS</p>
                                    <p class="card-text" style="text-align:center"><?php echo $in_progress?> Order(s)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="margin:25px;;background-color:darkblue;color:white">                    
                                <div class="card-body">
                                    <p class="card-text" style="text-align:center">FINISHED</p>
                                    <p class="card-text" style="text-align:center"><?php echo $finished?> Order(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12"> 
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" style="cursor:pointer" onclick="navigate(0)">New Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="cursor:pointer" onclick="navigate(1)">In Progress</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="cursor:pointer" onclick="navigate(2)">Finished</a>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>  
                <div class="container">
                    <div class="row">
                        <div class="col-12"> 
                            <table class="table table-striped" style="display:''">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Package</th>
                                        <th style="text-align:center">Date</th>
                                        <th style="text-align:center">Recipient</th>
                                        <th style="text-align:center">Residence</th>
                                        <th style="text-align:center">Phone Number</th>
                                        <th style="text-align:center">Detail</th>
                                        <th style="text-align:center">Weight</th>
                                        <th style="text-align:center">Price</th>
                                        <th style="text-align:center">Action</th>                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                            
                                        $sql    = "SELECT * FROM orders WHERE order_status != 'In Progress' AND order_status != 'Finished' ORDER BY order_date ";
                                        
                                        $result = mysqli_query($connection,$sql);                            
                                        if($result -> num_rows > 0){
                                            while($row = $result->fetch_array()){                                
                                    ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $row['order_package']?></td>
                                            <td style="text-align:center"><?php echo $row['order_date']?></td>
                                            <td style="text-align:center"><?php echo $row['order_recipient']?></td>
                                            <td style="text-align:center"><?php echo $row['order_residence']?></td>
                                            <td style="text-align:center"><?php echo $row['order_phone']?></td>
                                            <td style="text-align:center"><?php echo $row['order_detail']?></td>
                                            <td style="text-align:center"><?php echo $row['order_weight']?></td>
                                            <td style="text-align:center"><?php echo $row['order_price']?></td>                                            
                                            <?php 
                                                if($row['order_status'] == "Waiting for admin response"){
                                            ?>
                                                <td style="text-align:center">
                                                    <form id="pick_up_form" method="post" action="controllers/pickup_packages.php?id=<?php echo $row['order_id']?>">                                                        
                                                        <button type="submit" class="btn btn-primary" form="pick_up_form">
                                                            Pick Up
                                                        </button>
                                                    <form>                                                    
                                                </td> 
                                            <?php
                                                }else if($row['order_status'] == "Someone will pickup your packages"){                                            
                                            ?>
                                                <td style="text-align:center">
                                                    <button onclick="document.getElementById('order_id').value = '<?php echo $row['order_id'] ?>';document.getElementById('order_type').value = '<?php echo $row['order_package'] ?>';" data-bs-toggle="modal" data-bs-target="#process" type="button" class="btn btn-primary">
                                                        Process
                                                    </button>
                                                </td> 
                                            <?php
                                                }
                                            ?>                                                                                                                               
                                        </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-striped" style="display:none">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Package</th>
                                        <th style="text-align:center">Date</th>
                                        <th style="text-align:center">Recipient</th>
                                        <th style="text-align:center">Residence</th>
                                        <th style="text-align:center">Phone Number</th>
                                        <th style="text-align:center">Detail</th>
                                        <th style="text-align:center">Weight</th>
                                        <th style="text-align:center">Price</th>
                                        <th style="text-align:center">Action</th>                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                            
                                        $sql    = "SELECT * FROM orders WHERE order_status = 'In Progress' ORDER BY order_date";
                                        
                                        $result = mysqli_query($connection,$sql);                            
                                        if($result -> num_rows > 0){
                                            while($row = $result->fetch_array()){                                
                                    ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $row['order_package']?></td>
                                            <td style="text-align:center"><?php echo $row['order_date']?></td>
                                            <td style="text-align:center"><?php echo $row['order_recipient']?></td>
                                            <td style="text-align:center"><?php echo $row['order_residence']?></td>
                                            <td style="text-align:center"><?php echo $row['order_phone']?></td>
                                            <td style="text-align:center"><?php echo $row['order_detail']?></td>
                                            <td style="text-align:center"><?php echo $row['order_weight']?></td>
                                            <td style="text-align:center"><?php echo $row['order_price']?></td>                                            
                                            <td style="text-align:center">
                                                <form id="finished_form" method="post" action="controllers/finished_packages.php?id=<?php echo $row['order_id']?>">                                                        
                                                    <button type="submit" class="btn btn-primary" form="finished_form">
                                                        Finished
                                                    </button>
                                                </form>                                                    
                                            </td>                                                                                       
                                        </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-striped" style="display:none">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Package</th>
                                        <th style="text-align:center">Date</th>
                                        <th style="text-align:center">Recipient</th>
                                        <th style="text-align:center">Residence</th>
                                        <th style="text-align:center">Phone Number</th>
                                        <th style="text-align:center">Detail</th>
                                        <th style="text-align:center">Weight</th>
                                        <th style="text-align:center">Price</th>
                                        <th style="text-align:center">Finished Date</th>                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                            
                                        $sql    = "SELECT * FROM orders WHERE order_status = 'Finished' ORDER BY order_date";
                                        
                                        $result = mysqli_query($connection,$sql);                            
                                        if($result -> num_rows > 0){
                                            while($row = $result->fetch_array()){                                
                                    ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $row['order_package']?></td>
                                            <td style="text-align:center"><?php echo $row['order_date']?></td>
                                            <td style="text-align:center"><?php echo $row['order_recipient']?></td>
                                            <td style="text-align:center"><?php echo $row['order_residence']?></td>
                                            <td style="text-align:center"><?php echo $row['order_phone']?></td>
                                            <td style="text-align:center"><?php echo $row['order_detail']?></td>
                                            <td style="text-align:center"><?php echo $row['order_weight']?></td>
                                            <td style="text-align:center"><?php echo $row['order_price']?></td>                                            
                                            <td style="text-align:center"><?php echo $row['order_date_finished']?></td>                                                                                       
                                        </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <form id="process_form" method="post" action="controllers/process_packages.php">
            <div class="modal fade" id="process" tabindex="-1" aria-labelledby="processLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">INPUT WEIGHT</h5>    
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                
                        </div>
                        <div class="modal-body">
                            <div class = "row justify-content-center">  
                                <input type="hidden" value="" name="order_type" id="order_type"/>
                                <input type="hidden" value="" name="order_id" id="order_id"/>
                                <div class = "col-12" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="weight_order" class="form-label">Package Weight</label>
                                        <input autocomplete="off" type="text" class="form-control" name="weight_order" id="weight_order" placeholder="Input Package Weight to Calculate Price" require>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="modal-footer" form="process_form">
                            <input type="submit" value="CONTINUE" style="background-color:#0d6efd;color:white;border:none;border-radius:5px;height:38px"/>
                            <!-- <button type="submit" class="btn btn-primary" form="process_form">CONTINUE</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>   
    <script>
        function navigate(state){
            let tabs   = document.getElementsByClassName('nav-link');
            let tables = document.getElementsByClassName('table table-striped');

            for (let index = 0; index < tabs.length; index++) {
                const element = tabs[index];
                if(index == state){
                    element.setAttribute("class","nav-link active")
                }else{
                    element.setAttribute("class","nav-link")
                }
                
            }

            for (let index = 0; index < tables.length; index++) {
                const element = tables[index];
                if(index == state){
                    element.setAttribute("style","display:''")
                }else{
                    element.setAttribute("style","display:none")
                }
                
            }
        }
    </script>
</html>

<?php
        }
    }else{
        header("Location: ./index.php");
    }
?>