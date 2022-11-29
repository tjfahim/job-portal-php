<?php 
   session_start();
   include("../include/header.php");
   include("../include/connection.php");

if(isset($_POST['update'])){
    $id=$_GET['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $vacancy = $_POST['vacancy'];
    $responsibilities = $_POST['responsibilities'];
    $employment = $_POST['employment'];
    $requirements = $_POST['requirements'];
    $experience = $_POST['experience'];
    $additional = $_POST['additional'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $deadline = $_POST['deadline'];
    $username = $_SESSION['employer'];
   
 
    $query="UPDATE jobs SET title='$title',category='$category',vacancy='$vacancy',responsibilities='$responsibilities',employment='$employment',requirements='$requirements',experience='$experience',additional='$additional',location='$location',salary='$salary',deadline='$deadline',date_reg=NOW() WHERE id='$id'";
    $res = mysqli_query($con,$query);
    
    if($res){
        header("location:jobs.php");

    }else{
        echo"<script>alert('Failed')</script>";
    }

    }
 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Job</title>
</head>
<body>
   

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                <?php
                    include('sidenav.php');
                ?>  
                </div>
                <div class="col-md-6 ">
                    
                    <h4 class="text-center">Edit Job</h4>
                    <form action="" method="post" class="py-2" enctype="multipart/form-data">
                    <?php
                    $id=$_GET['id'];
                        $qu= "SELECT * FROM jobs WHERE id='$id'";
                        $res=mysqli_query($con,$qu);
                        $ro=mysqli_fetch_array($res);
                        $output="";
                        ?>
                   
                        <div class="form-group">
                            <label for="">Job Title *</label>
                            <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter Job Title" value="<?php echo $ro['title'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Category *</label>
                           
                            <select name="category"   class="form-control" required>
                                <?php
                        $username=$_SESSION['employer'];
                        $qu= "SELECT * FROM category WHERE username='$username'";
                        $res=mysqli_query($con,$qu);
                        $output="";

                        

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            
                                <div  class='text-center'>No Category Available.</div>
                           
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $output .="
                               
                                <option class='form-control'>".$row['category']."</option>                        
                        
                            ";
                        }

                        echo $output;
                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Vacancy *</label>
                            <input type="text" name="vacancy" class="form-control" autocomplete="off" placeholder="Enter Vacancy" value="<?php echo $ro['vacancy'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Job Responsibilities</label>
                            <input type="text" name="responsibilities" class="form-control" autocomplete="off" placeholder="Enter Job Responsibilities" value="<?php echo $ro['responsibilities'];?>" >
                        </div>
                        <div class="form-group">
                            <label for="">Employment Status</label>
                            <select name="employment" class="form-control">
                                <option>Full Time</option>
                                <option>Part Time</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Educational Requirements</label>
                            <input type="text" name="requirements" class="form-control" autocomplete="off" placeholder="Enter Educational Requirements" value="<?php echo $ro['requirements'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Experience Requirements</label>
                            <input type="text" name="experience" class="form-control" autocomplete="off" placeholder="Enter Experience Requirements" value="<?php echo $ro['experience'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Additional Requirements</label>
                            <input type="text" name="additional" class="form-control" autocomplete="off" placeholder="Enter Additional Requirements" value="<?php echo $ro['additional'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Job Location *</label>
                            <input type="text" name="location" class="form-control" autocomplete="off" placeholder="Enter Job Location" value="<?php echo $ro['location'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Salary *</label>
                            <input type="text" name="salary" class="form-control" autocomplete="off" placeholder="Enter Salary" value="<?php echo $ro['salary'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Deadline *</label>
                            <input type="text" name="deadline" class="form-control" autocomplete="off" value="<?php echo $ro['deadline'];?>">
                        </div>
                        <input type="submit" name="update" class="btn btn-success">
                    </form>
            </div>
        </div>
    </div>
    
</body>
</html>