<?php 
   session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    // if(isset($_POST['send'])){
    //     $title=$_POST['title'];
    //     $message=$_POST['message'];
    //     $username=$_SESSION['employer'];
    //     $error=array();


    //     $q="INSERT INTO report(title, message, username, send_date) VALUES ('$title','$message','$username',NOW())";
    //     $re=mysqli_query($con,$q);

    //     if(empty($title)){
    //         $error['r'] = "<div class='alert alert-danger'>Type report title</div>";
    //     }else if(empty($message)){
    //         $error['r'] = "<div class='alert alert-danger'>Type report message</div>";
    //     }else if(isset($re)){
    //         $error['r']= "<div class='alert alert-success'>Report Send Successfully</div>";
            
    //     }
    // }
    
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
                    <h4 class="my-2">Employer Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success m-2" style="height: 140px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white mt-3" >Profile</h5>
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
                                            <h5 class="text-white mt-3" >Applicant List</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="applied.php">
                                            <i class="fa fa-calendar fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-secondary m-2" style="height: 140px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white mt-3" >Jobs</h5>
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
                   
            </div>
        </div>
    </div>
    
</body>
</html>