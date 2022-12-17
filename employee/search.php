<?php 
   session_start();
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
                    
                
                ?>  
                </div>
                <div class="col-md-10 " style="margin-bottom: 59px;margin-top:20px">
                    <form action="search.php" style="margin-bottom: 19px" method="GET">
                        <input type="text" name="query" />
                        <input type="submit" value="Search" />
                    </form>
                    <?php
                    if(isset($_GET['page_no'])){
                        $get_page_no=$_GET['page_no'];
                        $offset=($get_page_no-1) * 2;
                        $get_page_inc=$get_page_no + 1;
                        $get_page_dec=$get_page_no - 1;

                    }else {
                        $offset=0;
                        $get_page_inc=2;
                        $get_page_dec=1;
                    }
                    if(isset($_GET['query'])){
                        $query = $_GET['query']; 
                        $query= htmlspecialchars($query);
                        
                        $qu= "SELECT jobs.title,jobs.id,jobs.category,jobs.vacancy,jobs.location,jobs.date_reg,jobs.salary,jobs.deadline,employer.companyname FROM jobs,employer WHERE (employer.id = jobs.username) AND (title like '%$query%' or category like '%$query%' or companyname like '%$query%') ORDER BY date_reg DESC LIMIT 2 OFFSET $offset";
                        $quu= "SELECT jobs.title,jobs.id,jobs.category,jobs.vacancy,jobs.location,jobs.salary,jobs.date_reg,jobs.deadline,employer.companyname FROM jobs,employer WHERE (employer.id = jobs.username) AND (title like '%$query%' or category like '%$query%' or companyname like '%$query%') ORDER BY date_reg DESC";
                        $res=mysqli_query($con,$quu);
                        $for_pagi=mysqli_query($con,$quu);
                        $for_pag=mysqli_num_rows($for_pagi);
                        $divided=ceil($for_pag/2);
                        $output="";
                    
                        $output .="
                     


                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td  class='text-center'>No Job Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $job_id=$row['id'];
                            $output .="
                            <div class=' '>
                                <a href='jobdetails.php?id=$job_id' class='text-none text-decoration-none ' >
                                    <div class='mask' style='background-color: rgba(57, 192, 237, 0.2)'>
                                    <div class='card'>
                                    <div class='card-header'>
                                    <h4 class='card-title '>".$row['title']."</h4>
                                    <h5 class='card-title text-dark'>".$row['companyname']."</h5>
                                        <p class='card-text text-dark'>Category: ".$row['category']."</p>
                                        <p class='card-text text-dark'>Vacancy: ".$row['vacancy']."</p>
                                        <p class='card-text text-dark'>Location: ".$row['location']."</p>
                                        <p class='card-text text-dark'>Salary: ".$row['salary']."</p>
                                        <p class='card-text text-dark'>Deadline: ".$row['deadline']."</p>
                                    </div></div>
                                </a>
                                </div>
                               
                                <br>
                        
                            ";
                        }
                       

                            echo $output;
                        

                        
                    }
                        ?>
                </div>
                   
            </div>
        </div>
    </div>
    
</body>
</html>