<?php 
include('variables.php');

//set any user account varaibles and redirect to the account page
include('authenticate_login.php');

if($response['form-valid']) {
    //data has already gotten a result from the database in authenticate_login.php
    $_SESSION['logged_in_flag'] = true;
    $_SESSION['username'] = $data[2];
    $_SESSION['user_avatar'] = 'data:image/jpeg;base64,'.base64_encode($data[3]);
    $_SESSION['access_level'] = $data[4];
    $_SESSION['email'] = $data[5];
    $_SESSION['date_created'] = $data[6];
    
    header('Location: ../html/home.php?code=5');
}
else {
    header('Location: ../html/forms.php?code=1');
}
?>