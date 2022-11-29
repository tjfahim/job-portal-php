<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Employer</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");
    
if(isset($_POST['approve'])){

   $id= $_POST['id'];

    $qu= "UPDATE employer SET status='active' WHERE employer.id = $id";
    $res=mysqli_query($con,$qu);
 
}
if(isset($_POST['reject'])){

   $id= $_POST['id'];

    $qu= "UPDATE employer SET status='reject' WHERE employer.id = $id";
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
                    <h4 class="my-2">Total Employers</h4>

                    <?php

                        $qu= "SELECT * FROM employer WHERE status='deactive' ORDER BY date_reg ASC ";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Date Register</th>
                                <th>Action</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='9' class='text-center'>No Employer Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $id=$row['id'];
                            $output .="
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['companyname']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['date_reg']."</td>                        
                                <td>
                                <div class='col-md-12'>
                                <div class='row'>
                                <form method='post'>
                                    <div class='col-md-6'>
                                    <input type='hidden' name='id' value=$id>

                                    <button name='approve' class='btn btn-success btn-sm ' type='submit'>Approve</button>

                                    </div>
                                    </form>
                                    <form method='post'>

                                    <div class='col-md-6'>
                                    <input type='hidden' name='id' value=$id>

                                    <button name='reject' class='btn btn-danger btn-sm ' type='submit'>Reject</button>
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