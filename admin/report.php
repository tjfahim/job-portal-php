<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Report</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");
    if(isset($_POST['remove'])){

        $id= $_POST['id'];
        $qu= "DELETE FROM report WHERE report.id = $id";
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
                    <h4 class="my-2">Total Reports</h4>

                    <?php

                        $qu= "SELECT * FROM report ORDER BY send_date ASC";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>User Name</th>
                                <th>Sending Date</th>
                                <th>Action</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='5' class='text-center'>No Report Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $id=$row['id'];
                            $output .="
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['title']."</td>
                                <td>".$row['message']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['send_date']."</td>
                                <td>
                                <form method='post'>
                                <input type='hidden' name='id' value=$id>
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