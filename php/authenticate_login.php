<?php
require('database.php');

//validate the inputs for the contact form
$response = [];

if(isset($_POST['email'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $response['email'] = true;
    } 
    else {
        $response['email'] = false;
    }
}
else {
    $response['email'] = false;
}

if(isset($_POST['password'])) {
    if(!empty($_POST['password'])) {
        $response['password'] = true;
    }
    else {
        $response['password'] = false;
    }
}
else {
    $response['password'] = false;
}

if($response["email"] && $response["password"]) {
    try {
        $loginSQL ='SELECT 
                        * 
                    FROM 
                        profiles 
                    WHERE 
                        email = :email 
                    AND 
                        password = :password
                    LIMIT 1
                    ';

        $databaseQuery = $databaseConnection->prepare($loginSQL);
        $databaseQuery->bindParam(':email', $_POST['email']);
        $databaseQuery->bindParam(':password', $_POST['password']);
        $databaseQuery->execute();

        $data = $databaseQuery->fetch();

        if(!empty($data)) {
            //am account exists with those credentials
             $response['form-valid'] = 1;
        }
        else {
            //no account exists with those credentials
            $response['form-valid'] = 0;
        }
    }
    catch(PDOException $error){
        $response['form-valid'] = -2;
    }
}
else {
    $response['form-valid'] = -1;
}

if(isset($_POST['ajax']) && $_POST['ajax']) {
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>