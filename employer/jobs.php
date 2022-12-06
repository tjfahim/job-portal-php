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

    if(isset($_POST['delete'])){

        $id= $_POST['id'];
        $qu= "DELETE FROM jobs WHERE id = $id";
        $res=mysqli_query($con,$qu); 
        
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
                   <a href="createjob.php" class="btn btn-primary mt-3">Create New Job</a>
                    <h4 class="my-2">All Jobs</h4>
                    <?php
                    if(isset($res)){
                        echo '<div class="text-success">Deleted Successfully</div>
        '   ;
                    }
                        $user = $_SESSION['employer'];
                            $s="SELECT * from employer where username='$user'";
                            $result=mysqli_query($con,$s);
                        $re=mysqli_fetch_array($result);
                        $username= $re['id']; 
                        $qu= "SELECT * FROM jobs WHERE username='$username' ORDER BY date_reg DESC";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered table-sm'>
                            <tr>
                                <th>Job Title</th>
                                <th>Category</th>
                                <th>Vacancy</th>
                                <th>Job Responsibilities</th>
                                <th>Employment Status</th>
                                <th>Educational Requirements</th>
                                <th>Experience Requirements</th>
                                <th>Job Location</th>
                                <th>Salary</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='11' class='text-center'>No Job Posted Yet.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $id=$row['id'];
                            $output .="
                            <tr>
                                <td>".$row['title']."</td>
                                <td>".$row['category']."</td>
                                <td>".$row['vacancy']."</td>
                                <td>".$row['responsibilities']."</td>
                                <td>".$row['employment']."</td>
                                <td>".$row['requirements']."</td>
                                <td>".$row['experience']."</td>
                                <td>".$row['location']."</td>
                                <td>".$row['salary']."</td>
                                <td>".$row['deadline']."</td>
                                <td>
                                <div class='col-md-12'>
                                <div class='row'>
                               
                                    <div class='col-md-6'>
                                    <input type='hidden' name='id' value=$id>
                                    <a href='updatejob.php?id=$id'><button name='edit' class='btn btn-success btn-sm ' type='submit'>Edit</button></a> 
                                    </div>
                                    
                                    <form method='post'>
                                    <div class='col-md-6'>
                                    <input type='hidden' name='id' value=$id>
                                    <button name='delete' class='btn btn-danger btn-sm ' type='submit'>Delete</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                </td>                        
                        
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