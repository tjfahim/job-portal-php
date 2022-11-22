<?php 
session_start();
if($_SESSION['employee']){
    unset($_SESSION['employee']);
    header('location:../index.php');
}
?>