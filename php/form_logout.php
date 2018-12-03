<?php 
//unset any user account varaibles and redirect to the homepage
include('variables.php');

$_SESSION['logged_in_flag'] = false; 
unset($_SESSION['user']);

header('Location: ../html/home.php'); 
?>