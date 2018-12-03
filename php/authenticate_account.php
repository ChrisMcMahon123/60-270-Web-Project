<?php 
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



$response['avatar'] = $_FILES;



header('Content-Type: application/json');
echo json_encode($response);
exit;
?>