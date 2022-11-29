<?php 
   session_start();
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                         
                                    <div class="my">
                                        <table class="table table-bordered">
                                        <?php 
                                        $job_id=$_GET['id'];
                                            $qu = "SELECT * FROM jobs WHERE id='$job_id'";
                                            $re = mysqli_query($con,$qu);
                                            $ro=mysqli_fetch_array($re);
                                            
                                        ?>

                                            <tr>
                                                <th colspan="2" class="text-center">Details</th>
                                            </tr>

                                            <tr>
                                                <td>Job Title</td>
                                                <td><?php echo $ro['title']?></td>
                                            </tr>
                                            <tr>
                                                <td>Category</td>
                                                <td><?php echo $ro['category']?></td>
                                            </tr>
                                            <tr>
                                                <td>Vacancy</td>
                                                <td><?php echo $ro['vacancy']?></td>
                                            </tr>
                                            <tr>
                                                <td>Job Responsibilities</td>
                                                <td><?php echo $ro['responsibilities']?></td>
                                            </tr>
                                            <tr>
                                                <td>Employment Status</td>
                                                <td><?php echo $ro['employment']?></td>
                                            </tr>
                                            <tr>
                                                <td>Educational Requirements</td>
                                                <td><?php echo $ro['requirements']?></td>
                                            </tr>
                                            <tr>
                                                <td>Experience Requirements</td>
                                                <td><?php echo $ro['experience']?></td>
                                            </tr>
                                            <tr>
                                                <td>Additional Requirements</td>
                                                <td><?php echo $ro['additional']?></td>
                                            </tr>
                                        
                                            <tr>
                                                <td>Job Location</td>
                                                <td><?php echo $ro['location']?></td>
                                            </tr>
                                
                                            <tr>
                                                <td>Salary</td>
                                                <td><?php echo $ro['salary']?></td>
                                            </tr>
                                            
                                            <tr>
                                            <td colspan="2"> <a href="apply.php?id=<?php echo $_GET['id']?>" class="btn btn-primary">Apply</a></td>
                                            

                                            </tr>
                                            
                                        </table>
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