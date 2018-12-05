<?php 
//unset any user account varaibles and redirect to the homepage
require('variables.php');

$_SESSION['logged_in_flag'] = false; 

unset($_SESSION['logged_in_flag']);
unset($_SESSION['name']);
unset($_SESSION['user_avatar']);
unset($_SESSION['access_level']);
unset($_SESSION['email']);
unset($_SESSION['date_created']);

header('Location: ../html/home.php?code=6'); 
?>