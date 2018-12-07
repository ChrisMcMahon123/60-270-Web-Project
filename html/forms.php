<?php 
$title = 'Login | Signup';
?>
<!DOCTYPE html>
<html>
<head>
<?php require('header.php'); 

if($_SESSION['logged_in_flag']) {
    header('Location: ../html/home.php?code=16'); 
} 
?>
</head>
<body>
<?php require('navigation.php'); ?>

<div id="main-content-area">
    <?php require('error_codes.php'); ?>

    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Sign Up</li>
                <li class="list-group-item">
                    <form id="signup-form" name="signup-form"  action="../php/form_signup.php" onsubmit="return validateSignUp(this)" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name-signup">Name</label>
                            <input id="name-signup" type="text" class="form-control" name="name" placeholder="Joe Smith">
                            <div id="name-signup-hint" class="m-2">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Avatar Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input form-control" name="avatar" onchange="displayFileName(this.value,'image-avatar-label')" id="image-avatar">
                                <label id="image-avatar-label" class="custom-file-label" for="image-avatar">Select File</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email-signup">Email Address</label>
                            <input id="email-signup" type="email" class="form-control" name="email" placeholder="email@provider.com">
                            <div id="email-signup-hint" class="m-2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-input">Password</label>
                            <input id="password-input" type="password" class="form-control" onkeyup="checkPasswords()" name="password" placeholder="Password">
                            <div id="password-input-hint" class="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" onkeyup="checkPasswords()" name="password-confirm" placeholder="Confirm Password">
                            <div id="password-confirm-hint" class="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Sign Up</button>
                    </form>                   
                </li>
            </ul>
        </div>
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Login</li>
                <li id="login-form" class="list-group-item">
                    <form name="login" action="../php/form_login.php" onsubmit="return validateLogin(this)" method="post">
                        <div class="form-group">
                            <label for="email-login">Email Address</label>
                            <input id="email-login" type="email" class="form-control" name="email" placeholder="email@provider.com">
                            <div id="email-login-hint" class="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-login">Password</label>
                            <input id="password-login" type="password" class="form-control" name="password" placeholder="Password">
                            <div id="password-login-hint" class="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Login</button>
                    </form>   
                </li>
            </ul>
        </div>
    </nav>
</div>
<?php require('modal_file_input.php'); ?>
<?php require('footer.php'); ?>
</body>
</html>