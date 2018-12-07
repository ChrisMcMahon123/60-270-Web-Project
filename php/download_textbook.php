<?php
require('../php/database.php');
require('../php/variables.php');

if($_SESSION['logged_in_flag']) {
    //get all the textbooks and their corrosponding categories
    $downloadSQL ='SELECT 
                        file,
                        textbook_name, 
                        year
                    FROM 
                        textbooks
                    WHERE 
                        id = :id
                    LIMIT 1
                    ';
    try {
        $databaseQuery = $databaseConnection->prepare($downloadSQL);
        $databaseQuery->bindParam(':id', $_GET['id']);
        $databaseQuery->execute();

        $data = $databaseQuery->fetch();

        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$data[1].'-'.$data[2].'.pdf"');
        echo $data[0];
    }
    catch(PDOException $error) {
        echo 'Connection failed: '.$error->getMessage();
    }
}
else {
    header('Location: ../html/browse.php?code=11');
}
?> 