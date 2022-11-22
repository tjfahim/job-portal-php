<?php 
include('include/connection.php');

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $error=array();

    if(empty($username)){
        $error['employer']=['Enter Username'];
    }else if(empty($password)){
        $error['employer']=['Enter Password'];
    }
   
    if(count($error)==0){
        $query="select * from employer where username='$username' and password='$password'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1){
            
            session_start();
            $_SESSION['employer']=$username;
            header("location:employer/index.php");
            exit();

        }else{
           
            echo"<script>alert('Invalid Username or Password')</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer login page</title>
</head>
<body style="background-image:url(img/New-Project-64.jpg); background-repeat: no-repeat; background-size:cover ;"></body>
    <?php 
        include('include/header.php')
    ?>
    <div style="margin-top: 30px;"></div>
    
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 ">
                    <form action="" method="post" class="py-2">
                        <div class="">
                        <h2 class="text-success">Login As Employer</h2>
                            <?php
                            if(isset($error['employer'])){
                                $sh=$error['employer'];
                                $show="<h4 class='alert alert-danger'>$sh[0]</h4>";
                                echo $show;
                                
                            }else if(isset($error['employer'])){
                                $show=$error['employer'];
                                echo $show;
                            } 
                           
                        
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success">
                        <div class="mt-2">Dont have an account? <a href="createemployer.php" class="text-primary mt-2">Create Account</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>