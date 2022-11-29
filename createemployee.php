<?php 
include('include/connection.php');

if(isset($_POST['create'])){

    $target_dir = "cv/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $cv_name= strtolower($_FILES["file"]["name"]);
    $size = $_FILES["file"]["size"];
    $ext = explode('.',$cv_name);
    $ext= end($ext);
    $cv = $_FILES['file']['name'];
    
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $error=array();

    if($cv){
        if($size >= 4000000){
            $error['e']= "File is too large.Max 4mb";
        }else if(file_exists($target_file)){
            $error['e']= "CV Already Exits.Please Change Name";
        }else if($ext!='pdf'){
            $error['e']= "Only pdf file allowed";
        }
    }
    if($password != $cpassword){
        $error['e']= "Password Does not match";

    }
    if($username){
        $query = "SELECT  username FROM employer WHERE username ='$username'";
        $result = mysqli_query($con,$query);
        if (mysqli_num_rows($result) > 0) {
            $error['e'] = "Sorry... username already taken"; 	
        }
    }
    if(preg_match('/^[0-9]{11}+$/', $phone)) {
            if($phone[0]!='0' && $phone[1]!='1'){
                $error['e']= "Start with 01 must";
            }
    }else $error['e']= "Invalid phone number";

   

    if(count($error)==0){
        if($cv){
             if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
            }
        }
    $query="INSERT INTO employee(firstname,lastname,username,email,phone,address,cv,password,date_reg) VALUES ('$firstname','$lastname','$username','$email','$phone','$address','$cv_name','$password',NOW())";
    $result=mysqli_query($con,$query);
    if($result){
        session_start();
        $_SESSION['employee']=$username;
        header("location:employeelogin.php");

    }else{
        echo"<script>alert('Failed')</script>";
    }
    echo 'no error';

    }
 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account as employee</title>
</head>
    <?php 
        include('include/header.php')
    ?>
    
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <h4 class="text-center">Employee Registration Form</h4>
                    <form action="" method="post" class="py-2" enctype="multipart/form-data">
                    <?php
                            if(isset($error['e'])){
                                $sh=$error['e'];
                                $show="<h4 class='alert alert-danger'>$sh</h4>";
                                echo $show;
                                
                            }
                        
                            ?>
                   
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter First Name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Last Name" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])){echo $_POST['uname'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" required>
                        </div>
                     
                        <div class="form-group">
                            <label for="phone">Phone Number (Start with '01' and must be 11 digit)</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>" required>
                        </div>
                     
                        <div class="form-group">
                            <label for="phone">Address</label>
                            <input type="text" name="address" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])){echo $_POST['address'];}?>">
                        </div>
                     
                     
                        <div class="form-group">
                            <label for="phone">Cv (Only pdf file allowed and maximum size 4mb)</label>
                            <input type="file" name="file" value="<?php if(isset($_POST['cv'])){echo $_POST['cv'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Enter Password" value="<?php if(isset($_POST['cpassword'])){echo $_POST['cpassword'];}?>" required>
                        </div>
                       
                        <input type="submit" name="create" class="btn btn-success">
                        <div>Already have an accout? <a href="employeelogin.php">Login</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>