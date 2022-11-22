<?php 
   session_start();
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    $employee = $_SESSION['employee'];
    $query = "SELECT * FROM employee WHERE username='$employee'";
    $res = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($res)){
        $username=$row['username'];
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class=""><?php echo '<strong>'.$username.'</strong>'; ?>'s Profile</h3>

                         
                                <br>
                                <div class="my-3">
                                    <table class="table table-bordered">
                                    <?php 
                                        $qu = "SELECT * FROM employee WHERE username='$employee'";
                                        $re = mysqli_query($con,$query);
                                        $ro=mysqli_fetch_array($re);
                                        
                                    ?>

                                        <tr>
                                            <th colspan="2" class="text-center">Details</th>
                                        </tr>

                                        <tr>
                                            <td>First Name</td>
                                            <td><?php echo $ro['firstname']?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td><?php echo $ro['lastname']?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $ro['email']?></td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php echo $ro['phone']?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><?php echo $ro['address']?></td>
                                        </tr>
                              
                                        <tr>
                                            <td>Date Registration</td>
                                            <td><?php echo $ro['date_reg']?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="mt-4">
                                <form action="" method="post">
                                    <?php 
                                    if(isset($_POST['update_pass'])){
                                        $old_pass = $_POST['old_password'];
                                        $new_pass = $_POST['new_password'];
                                        $cnf_pass = $_POST['cnf_password'];

                                        $error=array();
                                        $old=mysqli_query($con,"SELECT * FROM employee WHERE username='$employee'");
                                        $row=mysqli_fetch_array($old);
                                        $pass=$row['password'];                                        

                                        if(empty($old_pass)){
                                            $error['p']="Enter old password";
                                        }else if(empty($new_pass)){
                                            $error['p']='Enter new password';
                                        }else if(empty($cnf_pass)){
                                            $error['p']='Enter confirm password';
                                        }else if($old_pass!=$pass){
                                            $error['p']='Old password does not match';
                                        }else if($new_pass!=$cnf_pass){
                                            $error['p']='Confirm password is incorrect';
                                        }

                                        if(count($error)==0){
                                            $query="UPDATE employee SET password='$new_pass' WHERE username='$employee'";
                                            mysqli_query($con,$query);
                                            $succ="<h4 class='alert alert-success'>Password change successfully</h4>";
                                            echo $succ;
                                        }
                                    }
                                    ?>
                                    <h3 class="" style="margin-top: 50px;">Change Password</h3>
                                    <br>
                                    <?php 
                                    if(isset($error['p'])){
                                        $sh=$error['p'];
                                        $show="<h4 class='alert alert-danger'>$sh</h4>";
                                        echo $show;

                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" name="old_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="cnf_password" class="form-control">
                                    </div>
                                    <input type="submit" name="update_pass" value="Update Password" class="btn btn-info mb-4">
                                </form>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <?php
                                    if(isset($_POST['change'])){
                                        $fname = $_POST['fname'];
                                        $lname = $_POST['lname'];
                                        $uname = $_POST['uname'];
                                        $email = $_POST['email'];
                                        $address = $_POST['address'];
                                        $phone = $_POST['phone'];
                                        
                                        $query = "UPDATE employee SET firstname='$fname',lastname='$lname',username='$uname',email='$email',phone='$phone',address='$address' WHERE username='$employee'";
                                        $res = mysqli_query($con,$query);
                                        if($res){
                                            $_SESSION['employee']=$uname;
                                            echo "<script>alert('Update successfully')</script>";

                                        }
                                    }
                                    
                                ?>
                               
                                <form method="post">
                                <h3>Update Profile</h3>

                               <br>
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" value="<?php echo $ro['firstname'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" value="<?php echo $ro['lastname'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">User Name</label>
                                    <input type="text" name="uname" value="<?php echo $ro['username'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?php echo $ro['email'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" value="<?php echo $ro['phone'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="<?php echo $ro['address'] ?>" class="form-control">
                                </div>
                                <input type="submit" name="change" value="Update" class="btn btn-success">
                     

                                </form>
                                 <br>
                                <br>
                                
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>