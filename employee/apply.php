<?php 
   session_start();
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Apply</title>
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
                    $job_id=$_GET['id'];
                    $c_id="SELECT * FROM jobs WHERE jobs.id= '$job_id'";
                    $c_id=mysqli_query($con,$c_id);
                    $ro=mysqli_fetch_array($c_id);
                    $c_id=$ro['username'];
                    $employee=$_SESSION['employee'];
                    $q="SELECT * FROM employee WHERE username= '$employee'";
                    $r=mysqli_query($con,$q);
                    $ro=mysqli_fetch_array($r);
                    $employee_id=$ro['id'];
                    $cv=$ro['cv'];
                    $target = "../cv/$cv";


                ?>  
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9">
                                <?php

                                    

                                    if(isset($_POST['apply'])){
                                        $target_dir = "../cv/";
                                        $target_file = $target_dir . basename($_FILES["file"]["name"]);
                                        $cv_name= strtolower($_FILES["file"]["name"]);
                                        $size = $_FILES["file"]["size"];
                                        $ext = explode('.',$cv_name);
                                        $ext= end($ext);
                                        $cv = $_FILES['file']['name'];
                                        $phone = $_POST['phone'];



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
                                        if(preg_match('/^[0-9]{11}+$/', $phone)) {
                                                if($phone[0]!='0' && $phone[1]!='1'){
                                                    $error['e']= "Start with 01 must";
                                                }
                                        }else $error['e']= "Invalid phone number";
                                    

                                        $email = $_POST['email'];
                                        $address = $_POST['address'];
                                        if(count($error)==0){
                                            if($cv){
                                                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                                    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
                                                }
                                            }
                                        $query="INSERT INTO applyid_job(email,phone,address,cv,employee_id,jobs_id,company_id,date_reg) VALUES ('$email','$phone','$address','$cv_name','$employee_id','$job_id','$c_id',NOW())";
                                        $result=mysqli_query($con,$query);
                                        if($result){
                                            echo"<script>alert('Successfully Applyid')</script>";
                                        }
                                       
                                    }
                                }
                                    
                                ?>
                               
                                <form method="post" enctype="multipart/form-data">
                                <h3>Apply</h3>

                               <br>
                               <?php
                            if(isset($error['e'])){
                                $sh=$error['e'];
                                $show="<h4 class='alert alert-danger'>$sh</h4>";
                                echo $show;
                                
                            }
                        
                            ?>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?php if(isset($ro['email'])) echo $ro['email'] ?>" class="form-control" required>
                                </div>
                               
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" value="<?php if(isset($ro['phone'])) echo $ro['phone'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="<?php if(isset($ro['address'])) echo $ro['address'] ?>" class="form-control" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="">Cv (Only pdf file allowed and maximum size 4mb)</label>
                                    <input type="file" name="file" value="<?php if(isset( $target)) echo  $target ?>" class="form-control" required>
                                </div>

                                <?php
                                             $job_id=$_GET['id'];
                                            $qu="SELECT * FROM applyid_job WHERE jobs_id='$job_id' ";
                                            $re=mysqli_query($con,$qu);
                                            $re=mysqli_fetch_row($re);
                                            if($re!=0){
                                                echo "<p class='text-danger'>Already applied</p>";
                                            }
                                            else echo "<input type='submit' name='apply' value='Apply' class='btn btn-success'>";
                                            ?> 
                                <!-- <input type="submit" name="apply" value="Apply" class="btn btn-success"> -->
                     

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