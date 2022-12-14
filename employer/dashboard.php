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
                                        <div class="col-md-12">
                                        <a href="profile.php" style="text-decoration: none;">
                                        <h4 class="text-white mt-3" >Profile</h4>
                                            </a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-secondary m-2" style="height: 140px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <a href="applicant.php" style="text-decoration: none;">
                                        <h4 class="text-white mt-3" >Applicant List</h4>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-primary m-2" style="height: 140px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <a href="jobs.php" style="text-decoration: none;">
                                        <h4 class="text-white mt-3" >Job</h4>
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