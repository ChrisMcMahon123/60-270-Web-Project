<?php
include('authenticate_signup.php');

//validate the submitted form before updating account details
if($response['form-valid']) {
    //insert the new user into the database
    try {
        $image = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
        $code = 1;
        
        //Works but not using prepared statements...
        $signupSQL='INSERT INTO 
                        profiles (password, name, picture, user_code, email)
                    VALUES 
                        ("'.$_POST['password'].'","'.$_POST['name'].'", "'.$image.'", 1, "'.$_POST['email'].'")
                    ';

        $databaseQuery = $databaseConnection->prepare($signupSQL);
        $databaseQuery->execute();
 /*       
        //this executes with no errors, but the blob is broken...
        $signupSQL='INSERT INTO 
                        profiles (password, name, picture, user_code, email)
                    VALUES 
                        (:password,:name, :image, :code, :email)
                    ';

        $databaseQuery = $databaseConnection->prepare($signupSQL);
        $databaseQuery->bindParam(':password', $_POST['password']);
        $databaseQuery->bindParam(':name', $_POST['name']);
        $databaseQuery->bindParam(':image', $image);
        $databaseQuery->bindParam(':code', $code);
        $databaseQuery->bindParam(':email', $_POST['email']);

        $databaseQuery->execute();
*/
        unset($data, $databaseQuery, $signupSQL);
        
        header('Location: ../html/forms.php?code=4');
    }
    catch(PDOException $error) {
        echo 'Connection failed: '.$error->getMessage();
        header('Location: ../html/forms.php?code=3');
        echo  $signupSQL;
    }
}
else {
    header('Location: ../html/forms.php?code=1');
}
?>