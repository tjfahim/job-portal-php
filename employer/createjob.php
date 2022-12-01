<?php 
   session_start();
   include("../include/header.php");
   include("../include/connection.php");


   $username = $_SESSION['employer'];
 

if(isset($_POST['create'])){
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
    $user = $_SESSION['employer'];
    $s="SELECT * from employer where username='$user'";
    $result=mysqli_query($con,$s);
  $re=mysqli_fetch_array($result);
   $username= $re['id']; 
    
   
 
    $query="INSERT INTO jobs(title,category,vacancy,responsibilities,employment,requirements,experience,additional,location,salary,deadline,date_reg,status,username) VALUES ('$title','$category','$vacancy','$responsibilities','$employment','$requirements','$experience','$additional','$location','$salary','$deadline',NOW(),'active','$username')";
    $result=mysqli_query($con,$query);

    if($result){
       
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
    <title>Jobs</title>
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
                    
                    <h4 class="text-center">Create Job</h4>
                    <form action="" method="post" class="py-2" enctype="multipart/form-data">
                  
                   
                        <div class="form-group">
                            <label for="">Job Title *</label>
                            <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter Job Title" value="<?php if(isset($_POST['title'])){echo $_POST['title'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Category *</label>
                           
                            <select name="category" class="form-control" required>
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
                            <input type="text" name="vacancy" class="form-control" autocomplete="off" placeholder="Enter Vacancy" value="<?php if(isset($_POST['vacancy'])){echo $_POST['vacancy'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Job Responsibilities</label>
                            <input type="text" name="responsibilities" class="form-control" autocomplete="off" placeholder="Enter Job Responsibilities" value="<?php if(isset($_POST['responsibilities'])){echo $_POST['responsibilities'];}?>" >
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
                            <input type="text" name="requirements" class="form-control" autocomplete="off" placeholder="Enter Educational Requirements" value="<?php if(isset($_POST['requirements'])){echo $_POST['requirements'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="">Experience Requirements</label>
                            <input type="text" name="experience" class="form-control" autocomplete="off" placeholder="Enter Experience Requirements" value="<?php if(isset($_POST['experience'])){echo $_POST['experience'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="">Additional Requirements</label>
                            <input type="text" name="additional" class="form-control" autocomplete="off" placeholder="Enter Additional Requirements" value="<?php if(isset($_POST['additional'])){echo $_POST['additional'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="">Job Location *</label>
                            <input type="text" name="location" class="form-control" autocomplete="off" placeholder="Enter Job Location" value="<?php if(isset($_POST['location'])){echo $_POST['location'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Salary *</label>
                            <input type="text" name="salary" class="form-control" autocomplete="off" placeholder="Enter Salary" value="<?php if(isset($_POST['salary'])){echo $_POST['salary'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deadline *</label>
                            <input type="date" name="deadline" class="form-control" autocomplete="off" value="<?php if(isset($_POST['deadline'])){echo $_POST['deadline'];}?>" required>
                        </div>
                        <input type="submit" name="create" class="btn btn-success">
                    </form>
            </div>
        </div>
    </div>
    
</body>
</html>