<?php 
include('include/connection.php');

if(isset($_POST['create'])){

    $phone = $_POST['phone'];

    

    if(preg_match('/^[0-9]{11}+$/', $phone)) {
        if($phone[0]!='0' && $phone[1]!='1'){
             echo"<script>alert('Start with 01 must')</script>";
        }
}else echo"<script>alert('Invalid phone number')</script>";
}
    
  
// if(preg_match('/^[0-9]{10}+$/', $phone)) {
//     if($phone[0]!='0' && $phone[1]!='1'){
//         echo 'start 293';
//     }
//     } else {
//     echo "Invalid Phone Number";
//     }



 
// }

// if(preg_match('/^[0-9]{10}+$/', $phone)) {
//     echo "Valid Phone Number";
// } else {
//     echo "Invalid Phone Number";
//     }

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
                           
                   

                     
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>" required>
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