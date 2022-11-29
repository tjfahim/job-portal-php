<?php 
   session_start();

   include("../include/connection.php");

   if(isset($_POST['create'])){
    $category = $_POST['cname'];
    $username = $_SESSION['employer'];

    $query="INSERT INTO category(category,date_reg,username) VALUES ('$category',NOW(),'$username')";
    $result=mysqli_query($con,$query);
    if($result){
        
        header("location:category.php");

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
    <title>Category</title>
</head>
<body>
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    if(isset($_POST['send'])){
       
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
                <div class="col-md-10 ">
                    
                    <h4 class="text-center"> Category</h4>
                    <form action="" method="post" class="py-2" >
                   
                        <div class="form-group col-md-5">
                            <label for="fname">Create Category</label>
                            <input type="text" name="cname" class="form-control" autocomplete="off" placeholder="Enter Category Name" value="<?php if(isset($_POST['cname'])){echo $_POST['cname'];}?>" required>
                        </div>
                        <div class="col-md-3"><input type="submit" name="create" class="btn btn-success">
                        </div>
                    </form>
                    <div class="col-md-10">
                    <h4 class="my-2">All Category</h4>

                    <?php
                        $session=$_SESSION['employer'];
                        $qu= "SELECT * FROM category WHERE username='$session '  ";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Category Name</th>
                                <th>Date Register</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='3' class='text-center'>No Category Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $output .="
                            <tr>
                                <td>".$row['category']."</td>
                                <td>".$row['date_reg']."</td>                        
                        
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