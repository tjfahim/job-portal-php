<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applied</title>
    
</head>
<body>
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    if(isset($_POST['remove'])){

        $id= $_POST['id'];
        $qu= "DELETE FROM applyid_job WHERE applyid_job.id = $id";
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
                    <h4 class="my-2">Job Applyid</h4>

                    <?php
                         $employee=$_SESSION['employee'];
                         $q="SELECT * FROM employee WHERE username= '$employee'";
                         $r=mysqli_query($con,$q);
                         $ro=mysqli_fetch_array($r);
                         $employee_id=$ro['id'];
                        $qu= "SELECT * FROM applyid_job,jobs WHERE employee_id='$employee_id' AND applyid_job.jobs_id=jobs.id ";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Job Title</th>
                                <th>Submitted Email</th>
                                <th>Submitted Phone Number</th>
                                <th>Submitted Address</th>
                                <th>Submitted CV Name</th>
                                <th>Applyid Date </th>
                                <th>Action</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='9' class='text-center'>Empty</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $id=$row['id'];
                            $n="SELECT id FROM applyid_job WHERE jobs_id='$id'";
                            $n=mysqli_query($con,$n);
                            $n=mysqli_fetch_array($n);
                            $n=$n['id'];
                            $ap_cv=$row['cv'];
                            $fil="../cv/$ap_cv";

                            $output .="
                            <tr>
                               
                                <td>".$row['title']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['address']."</td>
                                <td><a href='download.php?file=$fil'>
                                ".$row['cv']."</a></td>
                                <td>".$row['date_reg']."</td>                        
                                <td>
                                <form method='post'>
                                <input type='hidden' name='id' value=$n>
                                <button name='remove' class='btn btn-danger btn-sm ' type='submit'>Delete</button>
                                </form>
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