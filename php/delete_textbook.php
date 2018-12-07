<?php
require('../php/database.php');
require('../php/variables.php');

if($_SESSION['logged_in_flag']) {
    $deleteSQL =    'DELETE FROM textbooks 
                        WHERE id = :id
                    ';
    try {
        $databaseQuery = $databaseConnection->prepare($deleteSQL);
        $databaseQuery->bindParam(':id', $_GET['id']);
        $databaseQuery->execute();
    
        header('Location: ../html/browse.php?code=13');
    }
    catch(PDOException $error) {
        echo 'Connection failed: '.$error->getMessage();
    }
}
else {
    header('Location: ../html/browse.php?code=12');
}
?>