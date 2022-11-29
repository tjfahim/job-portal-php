<?php 
   session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                    <h4 class="my-2">Admin Dashboard</h4>

                    <div class="col-md-12 my-1">
                        <div class="row">
                            
                            
                            <div class="col-md-3 bg-primary m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                                $employer="SELECT * FROM employer WHERE status='active'";
                                                $employer=mysqli_query($con,$employer);
                                                $row=mysqli_num_rows($employer);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $row ?> </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Employer</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="employer.php">
                                            <i class="fa fa-money-check-alt fa-3x my-4" style="color:white;"></i>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-secondary m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                                 $employee="SELECT * FROM employee";
                                                 $employee=mysqli_query($con,$employee);
                                                 $row=mysqli_num_rows($employee);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $row ?> </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Employee</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="employee.php">
                                            <i class="fa fa-money-check-alt fa-3x my-4" style="color:white;"></i>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                         $report="SELECT * FROM report";
                                         $report=mysqli_query($con,$report);
                                         $row=mysqli_num_rows($report);
                                                
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $row ?> </h5>
                                            <h5 class="text-white">Report</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="report.php">
                                            <i class="fa fa-money-check-alt fa-3x my-4" style="color:white;"></i>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                                $employer_re="SELECT * FROM employer WHERE status='deactive'";
                                                $employer_re=mysqli_query($con,$employer_re);
                                                $row=mysqli_num_rows($employer_re);
                                                       
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $row ?> </h5>
                                            <h5 class="text-white">Employer Request</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="employer_req.php">
                                            <i class="fa fa-money-check-alt fa-3x my-4" style="color:white;"></i>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                                
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo 0 ?> </h5>
                                            <h5 class="text-white">Total Job</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="job.php">
                                            <i class="fa fa-money-check-alt fa-3x my-4" style="color:white;"></i>

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
    </div>
    
</body>
</html>