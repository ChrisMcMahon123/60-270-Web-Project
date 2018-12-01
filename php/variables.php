<?php
//Global Variables
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['logged_in_flag'])) {
    $_SESSION['logged_in_flag'] = false;
}

$websiteName = 'Textbook Directory';
$webmasterEmail = 'mcmah113@uwindsor.ca';
$websiteOwner = 'Christopher McMahon';

//the current page the user is viewing
//$_SERVER['REQUEST_URI'];
?>