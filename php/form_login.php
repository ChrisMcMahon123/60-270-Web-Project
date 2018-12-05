<?php 
require('variables.php');

//set any user account varaibles and redirect to the account page
require('authenticate_login.php');

if($response['form-valid'] === 1) {
    //data has already gotten a result from the database in authenticate_login.php
    $_SESSION['logged_in_flag'] = true;
    $_SESSION['name'] = $data[2];
    $_SESSION['user_avatar'] = 'data:image/jpeg;base64,'.base64_encode($data[3]);
    $_SESSION['access_level'] = $data[4];
    $_SESSION['email'] = $data[5];
    $_SESSION['date_created'] = $data[6];
    
    if(isset($updateAccount) && $updateAccount) {
        //account update script is 're-logging in'the user
        header('Location: ../html/account.php?code=7');
    }
    else {
        //user is just logging in
        header('Location: ../html/account.php?code=5');
    }
}
else if($response['form-valid'] === 0) {
    header('Location: ../html/forms.php?code=1');
}
else if($response['form-valid'] === -1) {
    header('Location: ../html/forms.php?code=8');
}
else {
    header('Location: ../html/forms.php?code=2');
}
?>