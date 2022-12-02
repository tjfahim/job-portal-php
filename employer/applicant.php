<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applied</title>
</head>
<body>
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

$empl=$_SESSION['employer'];
$emp="SELECT * FROM employer WHERE username='$empl'";
$em=mysqli_query($con,$emp);
$pem=mysqli_fetch_array($em);
$pe=$pem['id'];
    
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
                    <h4 class="my-2">Job Applyid</h4>

                    <?php


                         $q="SELECT jobs.title,jobs.category,jobs.date_reg as jobs_date,applyid_job.email as app_email,applyid_job.phone as app_phn,applyid_job.cv as app_cv,applyid_job.date_reg as app_date FROM applyid_job,jobs WHERE applyid_job.jobs_id=jobs.id AND applyid_job.company_id='$pe'" ;
                         $r=mysqli_query($con,$q);
                     
                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                            <th>Job title</th>
                            <th>Category</th>
                            <th>Job Post Date</th>
                                <th>Employee Email</th>
                                <th>Employee Phone Number</th>
                                <th>Employee CV</th>
                                <th>Date Apply</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($r)<1){
                            $output .="
                            <tr>
                                <td colspan='9' class='text-center'>Empty</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($r)){
                          

                            $output .="
                            <tr>
                               
                                <td>".$row['title']."</td>
                                <td>".$row['category']."</td>
                                <td>".$row['jobs_date']."</td>
                                <td>".$row['app_email']."</td>
                                <td>".$row['app_phn']."</td>
                                <td>".$row['app_cv']."</td>
                                <td>".$row['app_date']."</td>
                               
                            ";
                        }

                        $output .="
                        </tr>
                        </table>
                        ";
                        echo $output;
                        ?>
                </div>
                
            </div>
        </div>
    </div>
    
</body>
</html>