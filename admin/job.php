
<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs</title>
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
                    <h4 class="my-2">All Jobs</h4>

                    <?php

                        $qu= "SELECT * FROM jobs WHERE status='active' ORDER BY date_reg ASC";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Vacancy</th>
                                <th>Responsibilities</th>
                                <th>Employment</th>
                                <th>Experience</th>
                                <th>Location</th>
                                <th>Salary</th>
                                <th>Deadline</th>
                                <th>Date Register</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='8' class='text-center'>No Jobs Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $output .="
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['title']."</td>
                                <td>".$row['category']."</td>
                                <td>".$row['vacancy']."</td>
                                <td>".$row['responsibilities']."</td>
                                <td>".$row['employment']."</td>
                                <td>".$row['experience']."</td>
                                <td>".$row['location']."</td>
                                <td>".$row['salary']."</td>
                                <td>".$row['deadline']."</td>
                                <td>".$row['date_reg']."</td>                    
                        
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