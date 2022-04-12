<?php
    session_start();
    if(!isset($_SESSION['status_login']) || $_SESSION['status_login'] == "failed"){
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
    </head>
    <body>
        <div class = "container" style="margin-top:10vh">
            <div class = "row justify-content-center">
                <div class = "col-8">
                    <div class="card" style="height:80vh;box-shadow:0px 5px 5px #C0C1C1;">
                        <div class="card-body" style="margin:0">
                            <div class = "row justify-content-center" style="height:100%">
                                <div class = "col-6">
                                    <div class = "row" style="height:100%">
                                        <div class = "col-12" style="height:100%;padding:5px">
                                            <img src="./images/laundry.png" style="width:100%;border-radius:10px;height:350px;">
                                        </div>                                    
                                    </div>
                                </div>
                                <div class = "col-6" style="margin:auto">
                                    <div class = "row justify-content-center">
                                        <div class = "col-12" style="padding:5px">
                                            <p class="h4">Laundry</p>
                                        </div>
                                        <form action="controllers/login.php" method="post">
                                            <div class = "col-12" style="padding:5px">
                                                <p class="h4">
                                                    
                                                </p>
                                            </div>
                                            <div class = "col-12" style="padding:5px">
                                                <div class="mb-3">
                                                    <label for="email_signin" class="form-label">Email address</label>
                                                    <input autocomplete="off" type="email" class="form-control" name="email_signin" id="email_signin" placeholder="Your Email Address" require>
                                                </div>
                                            </div>                                          
                                            
                                            <div class = "col-12" style="padding:5px">
                                                <div class="mb-3">
                                                    <label for="password_signin" class="form-label">Password</label>
                                                    <input autocomplete="off" type="password" class="form-control" name="password_signin" id="password_signin" placeholder="Your Password" require>
                                                </div>
                                            </div>
                                            <?php 
                                                if(isset($_SESSION['status_login'])) {
                                                    if($_SESSION['status_login'] == "failed"){
                                            ?>
                                                <div class = "col-12" style="padding:5px">
                                                    <div class="mb-3">
                                                        <div class="alert alert-warning" role="alert">
                                                            Wrong email or password.
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                    }
                                                } 
                                            ?>
                                            <div class = "col-12" style="padding:5px">
                                                <button type="submit" class="btn btn-success" style="width:100%">Login</button>
                                            </div>
                                        </form>
                                        <div class = "col-12" style="padding:5px">
                                            <p style="text-align:right" >Don't have acoount? <span style="cursor:pointer;color:#EC29C2" data-bs-toggle="modal" data-bs-target="#registration">Sign up here</span></p>
                                        </div>
                                    </div>                                
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertically centered modal -->
        <form action="controllers/register.php" method="post" onsubmit="return validateForm()">
            <div class="modal fade" id="registration" tabindex="-1" aria-labelledby="registrationLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Registration</h5>                    
                        </div>
                        <div class="modal-body">
                            <div class = "row justify-content-center">  
                                <div class = "col-12" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input autocomplete="off" type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                                    </div>
                                </div>                      
                                <div class = "col-12" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input autocomplete="off" type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class = "col-6" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input autocomplete="off" type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class = "col-6" style="padding:5px">
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input autocomplete="off" type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn" style="background-color:#EC296A;color:white">Register</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="alert" tabindex="-1" aria-labelledby="alertLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alertLabel">Laundry</h5>                        
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning" role="alert" id="warning"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function validateForm(){
            let fullname         =  document.getElementById('fullname').value;
            let email            =  document.getElementById('email').value;
            let password         =  document.getElementById('password').value;
            let confirm_password =  document.getElementById('confirm_password').value;
            let warning          =  document.getElementById('warning');        
            var alert            =  new bootstrap.Modal(document.getElementById('alert'), { keyboard: false })
            
            if( fullname == "" ){
                warning.innerHTML = "Name must be filled out"
                alert.show()
                return false
            }else if( email == "" ){
                warning.innerHTML = "Email must be filled out"
                alert.show()
                return false
            }else if( password == "" ){
                warning.innerHTML = "Set your password"
                alert.show()
                return false
            }else if( confirm_password == "" ){
                warning.innerHTML = "Please confirm your password again"
                alert.show()
                return false
            }else if( password != confirm_password && password != "" && confirm_password != ""){
                warning.innerHTML = "Password does not match"
                alert.show()
                return false
            }
            
        }
    </script>
</html>

<?php
    }else{
        if($_SESSION['user_status'] == "Admin"){
            header("Location: ./dashboard_admin.php");
        }else{
            header("Location: ./homepage.php");
        }
        
    }
?>