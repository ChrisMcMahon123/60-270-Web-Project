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
        $_SESSION['date_created'] = '2018-11-04';
        $_SESSION['user_avatar'] = '../image/textbook1.jpg';
        $_SESSION['email'] = 'mcmah113@uwindsor.ca';

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
    $_SESSION['date_created'] = '2018-11-04';
    $_SESSION['user_avatar'] = '../image/textbook1.jpg';
    $_SESSION['email'] = 'mcmah113@uwindsor.ca';

    //echo 'form not filled out';
    //login form not filled out properly
    header('Location: ../html/account.php');
}
?>