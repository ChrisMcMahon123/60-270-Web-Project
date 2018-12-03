<?php
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'error_codes')) {
    header('Location: home.php'); 
}

if(isset($_GET['code'])) { 
    //grab the error code from the database and display it
    $errorSQL=' SELECT 
                    message_html 
                FROM 
                    errors
                WHERE 
                    code = :code
                LIMIT 1
                ';

    try {
        //there will only ever be one error code retrieved at a time, 
        $databaseQuery = $databaseConnection->prepare($errorSQL);
        $databaseQuery->bindParam(':code', $_GET['code']);
        $databaseQuery->execute();

        $data = $databaseQuery->fetch();
    
        if(!empty($data)) {
            echo $data[0];
        }
    }
    catch(PDOException $error) {
        echo 'Connection failed: '.$error->getMessage();
    }
    unset($data, $databaseQuery, $errorSQL);
}
?>