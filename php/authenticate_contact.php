<?php
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

if(isset($_POST['message'])) {
    if(!empty($_POST['message'])) {
        $response['message'] = true;
    }
    else {
        $response['message'] = false;
    }
}
else {
    $response['message'] = false;
}

if(isset($_POST['type'])) {
    if(!empty($_POST['type'])) {
        $response['type'] = true;
    }
    else {
        $response['type'] = false;
    }
}
else {
    $response['type'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>