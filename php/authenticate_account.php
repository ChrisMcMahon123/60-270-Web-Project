<?php 
require('variables.php');

$response = [];

if(isset($_POST['name'])) {
    if(!empty($_POST['name'])) {
        $response['name'] = true;
    }
    else {
         $response['name'] = false;
    }
}
else {
    $response['name'] = false;
}

// Check if image file is a actual image or fake image
if(isset($_FILES["avatar"]["tmp_name"])) {

    if(false !== getimagesize($_FILES["avatar"]["tmp_name"])) {
        //upload file is an image
        if($_FILES['avatar']['size'] < $maxFileSize) {
            //upload file is the correct size
            $response['avatar'] = true; 
            $response['avatar_message'] = 'Avatar picture is valid'; 
        }
        else {
            //upload file is too large
            $response['avatar'] = false;
            $response['avatar_message'] = 'Avatar picture is too large, please reduce the file size'; 

        }
    } else {
        $response['avatar'] = false;
        $response['avatar_message'] = 'Avatar picture is not a valid image file'; 
    }
}
else {
    $response['avatar'] = false;
    $response['avatar_message'] = 'No avatar picture selected'; 
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

if(isset($_POST['password-confirm'])) {
    if(!empty($_POST['password-confirm'])) {
        $response['password-confirm'] = true;
    }
    else {
         $response['password-confirm'] = false;
    }
}
else {
    $response['password-confirm'] = false;
}

if($response['password'] && $response['password-confirm']) {
    if($_POST['password'] === $_POST['password-confirm']) {
        $response['password-compare'] = true; 
    }
    else {
        $response['password-compare'] = false;
    }
}
else {
    $response['password-compare'] = false;
}

if($response['name'] && $response['avatar'] && $response['password-compare']) {
    $response['form-valid'] = true;
}
else {
    $response['form-valid'] = false;
}

if(isset($_POST['ajax']) && $_POST['ajax']) {
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>