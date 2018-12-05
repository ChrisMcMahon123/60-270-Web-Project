<?php
require('database.php');
require('authenticate_account.php');

//validate the submitted form before updating account details
if($response['form-valid']) {
   try {
        $image = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
        
        //Works but not using prepared statements...
        $accountSQL='UPDATE 
                        profiles
                    SET 
                        password = "'.$_POST['password'].'", name = "'.$_POST['name'].'", picture = "'.$image.'"
                    WHERE
                        email = "'.$_SESSION['email'].'"
                    ';
        
        $databaseQuery = $databaseConnection->prepare($accountSQL);
        $databaseQuery->execute();
       
        unset($databaseQuery, $accountSQL, $image);

        //update the session variables and 're-login'
        //need to update / create some variables to pass validation
        $_POST['email'] = $_SESSION['email'];
        $updateAccount = true;

        require('authenticate_login.php');
        require('form_login.php');
    }
    catch(PDOException $error) {
        header('Location: ../html/account.php?code=3');
        //echo 'Connection failed: '.$error->getMessage();
        //echo  $accountSQL;
    }
}
else {
    header('Location: ../html/account.php?code=1');
}
?>