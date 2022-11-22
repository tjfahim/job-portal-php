<?php 
   session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    if(isset($_POST['send'])){
       
    }
    
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                <?php
                    include('sidenav.php');
                ?>  
                </div>
                <div class="col-md-10">
                    <h4 class="my-2">Employee Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success m-2" style="height: 140px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white mt-3" >My Profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.php">
                                            <i class="fas fa-user-circle fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-secondary m-2" style="height: 140px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white mt-3" >Applied Job</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="applied.php">
                                            <i class="fa fa-calendar fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                     </div>
                    <div class="col-md-12 ml-2">
                            <div class="row">
                                    <div class="col-md-6 jumbotron bg-info ">
                                    <h5 class="text-white text-center" >Send a report</h5>

                                    <form action="" method="post">
                                        <?php 
                                        if(isset($error['r'])){
                                            $sh=$error['r'];
                                            $s= "<div class='alert alert-danger'>$sh</div>";
                                            echo $s;
                                        }
                                        if(isset($re)){
                                            $s= "<div class='alert alert-success'>Report Send Successfully</div>";
                                            echo $s;
                                        }
                                        ?>
                                        <label for="">Title</label>
                                        <input type="text" name="title" placeholder="Enter Report Title" class="form-control">
                                        <label for="">Message</label>
                                        <input type="text" name="message" placeholder="Enter Message" class="form-control">
                                        <input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <a href="#">
                                    <i class="fas fa-file-invoice-dollar fa-3x " style="color:white;"></i>
                                    </a>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
    
</body>
</html>