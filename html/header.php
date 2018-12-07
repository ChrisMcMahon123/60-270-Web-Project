<?php
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'header')) {
    header('Location: home.php?code=14'); 
}

require('../php/database.php');
require('../php/variables.php');

//the $title varaible is set in the root page that includes this file
?>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><? echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<script src="../script/jquery-3.3.1.min.js"></script>
<script src="../script/popper.min.js"></script>
<script src="../script/bootstrap.min.js"></script>
<script src="../script/main.js"></script>