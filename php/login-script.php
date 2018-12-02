<?php 
//set any user account varaibles and redirect to the account page
include('variables.php');
include('database.php');

$loginSQL ='SELECT 
                * 
            FROM 
                profiles 
            WHERE 
                email = :email 
            AND 
                password = :password
            ';

if(isset($_POST['email']) && isset($_POST['password']) && false) {
    //login form filled out properly
    try {
        //prepare sql and bind parameters
        $databaseQuery = $databaseConnection->prepare($loginSQL);
        $databaseQuery->bindParam(':email', $firstname);
        $databaseQuery->bindParam(':password', $lastname);
        $databaseQuery->execute();

        $_SESSION['logged_in_flag'] = true;
        $_SESSION['username'] = 'Chris McMahon';
        $_SESSION['access_level'] = 'Admin';

        //header('Location: ../html/account.php');
    }
    catch(PDOException $error){
        echo $loginSQL.'<br/>'.$error->getMessage();
        //header('Location: ../html/form.php?error=1');
    }
}
else {
    $_SESSION['logged_in_flag'] = true;
    $_SESSION['username'] = 'Chris McMahon';
    $_SESSION['access_level'] = 'Admin';
    //echo 'form not filled out';
    //login form not filled out properly
    header('Location: ../html/account.php');
}
?>