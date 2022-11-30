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
                         $q="SELECT * FROM applyid_job,jobs,employee,employer WHERE applyid_job.employee_id=employee.id AND applyid_job.jobs_id=jobs.id AND jobs.username=employer.id" ;
                         $r=mysqli_query($con,$q);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                            <th>Job title</th>
                                <th>Employee Email</th>
                                <th>Employee Phone Number</th>
                                <th>Employee Address</th>
                                <th>Employee CV</th>
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
                                <td>".$row['email']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['cv']."</td>
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