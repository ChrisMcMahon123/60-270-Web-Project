<?php
include('database.php');
include('authenticate_account.php');

//validate the submitted form before updating account details
if($response['form-valid']) {
    echo 'valid';

    //header('Location: ../html/account.php?code=4');
}
else {
    header('Location: ../html/account.php?code=1');
}
?>