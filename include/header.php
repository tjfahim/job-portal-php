<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Job Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" 
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/brands.min.js"></script>
    <link rel="stylesheet" type="/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="<?php  ?>">
    <link rel="stylesheet" href="./asset/css/owl.carousel.min.css">
            <link rel="stylesheet" href="./asset/css/flaticon.css">
            <link rel="stylesheet" href="./asset/css/price_rangs.css">
            <link rel="stylesheet" href="./asset/css/slicknav.css">
            <link rel="stylesheet" href="./asset/css/animate.min.css">
            <link rel="stylesheet" href="./asset/css/magnific-popup.css">
            <link rel="stylesheet" href="./asset/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="./asset/css/themify-icons.css">
            <link rel="stylesheet" href="./asset/css/slick.css">
            <link rel="stylesheet" href="./asset/css/nice-select.css">
            <link rel="stylesheet" href="./asset/css/style.css">
   
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-info" style="background-color: #010B1D;">
        <a href="index.php"><h5 class="text-white ml-3">Online Job Portal
</h5></a>
        <div class="mr-auto"></div>
        <ul class="navbar-nav text-dark">
            <?php
            if(isset($_SESSION['admin'])){
                $user=$_SESSION['admin'];
                echo'<li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';

            }else if(isset($_SESSION['employer'])){
                $user=$_SESSION['employer'];
                echo'<li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
            
            }else if(isset($_SESSION['employee'])){
                $user=$_SESSION['employee'];
                echo'<li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
            }
            else{
                echo '   
                <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="admin.php" class="nav-link text-white">Admin</a></li>
                <li class="nav-item"><a href="employerlogin.php" class="nav-link text-white">Employer</a></li>
                <li class="nav-item"><a href="employeelogin.php" class="nav-link text-white mr-3">Employee</a></li>';
            }
          
         
              
            ?>
         
        </ul>
    </nav>
</body>