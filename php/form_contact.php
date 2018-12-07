<?php
//validate the submitted form before sending the email
require('authenticate_contact.php');

if($response['form-valid']) {
    //using PHPMailer 6.0.6
    require('PHPMailer-6.0.6/PHPMailer.php');
    require('PHPMailer-6.0.6/Exception.php');
    require('PHPMailer-6.0.6/SMTP.php');

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = '';
    $mail->Password = '';
    $mail->SetFrom('');
    $mail->Subject = 'Textbook Directory: '.$_POST['type'];
    $mail->Body = 'Message: <br/>'.$_POST['message'].'<br/><br/>From: <br/>'.$_POST['email'];
    $mail->AddAddress('');

    if($mail->Send()) {
        header('Location: ../html/contact.php?code=2');
        //echo 'Email Successfully Sent!';
    } 
    else {
        header('Location: ../html/contact.php?code=3');
        //echo 'PHPMailer Error: ' . $mail->ErrorInfo;
    }
}
else {
    header('Location: ../html/contact.php?code=1');
}
?>
