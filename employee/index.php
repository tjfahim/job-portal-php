<?php 
   session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
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
                    <?php

                        $qu= "SELECT jobs.title,jobs.id,jobs.vacancy,jobs.location,jobs.salary,jobs.deadline,employer.companyname FROM jobs,employer WHERE employer.id = jobs.username ";
                        $res=mysqli_query($con,$qu);
                        $r=mysqli_fetch_array($res);
                        // $username=$r['username'];
                     
                        // $cname="SELECT companyname FROM employer WHERE username='$username' ";
                        // $cname=mysqli_query($con,$cname);
                        // $cname=mysqli_fetch_array($cname);
                        $output="";

                        $output .="
                     


                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='8' class='text-center'>No Employee Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $job_id=$row['id'];
                            $output .="
                            <div class=' '>
                            <a href='jobdetails.php?id=$job_id' class='text-none text-decoration-none' >
                                <div class='mask' style='background-color: rgba(57, 192, 237, 0.2)'>
                                <div class='card'>
                                <div class='card-header'>
                                <h4 class='card-title '>".$row['title']."</h4>
                                <h5 class='card-title text-dark'>".$row['companyname']."</h5>
                                    <p class='card-text text-dark'>Vacancy: ".$row['vacancy']."</p>
                                    <p class='card-text text-dark'>Location: ".$row['location']."</p>
                                    <p class='card-text text-dark'>Salary: ".$row['salary']."</p>
                                    <p class='card-text text-dark'>Deadline: ".$row['deadline']."</p>
                                </div></div>
                            </a>
                            </div>
                           
                            <br>
                        
                            ";
                        }

                        
                        echo $output;
                        ?>
                </div>
                   
            </div>
        </div>
    </div>
    
</body>
</html>