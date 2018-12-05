<?php
//Global Variables

//this value should match the one in php.ini and be smaller than the max size
$maxFileSize = 4294967295;//4 gigs => max size of a longblob in MySQL
$minYear = 1900;
$maxYear = 2019;

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['logged_in_flag'])) {
    $_SESSION['logged_in_flag'] = false;
}

$websiteName = 'Textbook Directory';
$webMaster = 'Christopher McMahon';
?>