<?php
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
            <div style="flex:1 1 auto;">
                <div class="alert alert-info" role="alert">
                    <img src="./images/hello.png" style="width:50px;height: 50px;"/>
                    Hello <?php echo $_SESSION['username']?>, Welcome to our website.                    
                </div>
                <div class="container">
                    <div class="row" style="margin:15px">
                        <div class="col-12" style="margin-bottom:10px;margin-top:10px">
                            <p style="text-align:center;font-family: 'Marmelad', sans-serif;font-size:26px">CHOOSE YOUR PACKAGE</p>
                        </div>
                        <div class="col-4">
                            <div onclick="document.getElementById('staticBackdropLabel').innerHTML = 'Regular Package';document.getElementById('type_order').value = 'Regular';" class="card" style="width: 90%;padding:10px;cursor:pointer" data-bs-toggle="modal" data-bs-target="#packages">
                                <img src="./images/regular.png" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text" style="text-align:center;font-family: 'Marmelad', sans-serif;font-size:22px">Regular Package</p>
                                    <p class="card-text" style="text-align:center">Estimated Time : 3 - 5 days</p>
                                    <p class="card-text" style="text-align:center">Rp.5000/kg</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" onclick="document.getElementById('staticBackdropLabel').innerHTML = 'Express Package';document.getElementById('type_order').value = 'Express'" style="width: 90%;padding:10px;cursor:pointer" data-bs-toggle="modal" data-bs-target="#packages">
                                <img src="./images/express.png" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text" style="text-align:center;font-family: 'Marmelad', sans-serif;font-size:22px">Express Package</p>
                                    <p class="card-text" style="text-align:center">Estimated Time : 1 - 2 days</p>
                                    <p class="card-text" style="text-align:center">Rp.7500/kg</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" onclick="document.getElementById('staticBackdropLabel').innerHTML = 'Fast Package';document.getElementById('type_order').value = 'Fast'" style="width: 90%;padding:10px;cursor:pointer" data-bs-toggle="modal" data-bs-target="#packages">
                                <img src="./images/kilat.jpg" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text" style="text-align:center;font-family: 'Marmelad', sans-serif;font-size:22px">Fast Package</p>
                                    <p class="card-text" style="text-align:center">Estimated Time : 1 - 6 hours</p>
                                    <p class="card-text" style="text-align:center">Rp.10000/kg</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="controllers/packages.php">
            <div class="modal fade" id="packages" tabindex="-1" aria-labelledby="packagesLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"></h5>    
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                
                        </div>
                        <div class="modal-body">
                            <div class = "row justify-content-center">  
                                <input type="hidden" value="" name="type_order" id="type_order"/>
                                <div class = "col-6" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="residence_order" class="form-label">Residence</label>
                                        <input autocomplete="off" type="text" class="form-control" name="residence_order" id="residence_order" placeholder="Your Residence" require>
                                    </div>
                                </div>  
                                <div class = "col-6" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="phone_order" class="form-label">Phone Number</label>
                                        <input autocomplete="off" type="text" class="form-control" name="phone_order" id="phone_order" placeholder="Your Phone Number" require>
                                    </div>
                                </div>  
                                <div class = "col-12" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="detail_order" class="form-label">Detail Package</label>
                                        <textarea class="form-control" id="detail_order" name="detail_order" placeholder="Example : 2 clothes, 3 t-shirts, etc.."></textarea>
                                    </div>
                                </div>                                   
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ORDER</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>    
</html>

<?php
        }
    }else{
        header("Location: ./index.php");
    }
?>