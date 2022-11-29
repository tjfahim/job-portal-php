<?php 
session_start();
if($_SESSION['employer']){
    unset($_SESSION['employer']);
    header('location:../index.php');
}
?>