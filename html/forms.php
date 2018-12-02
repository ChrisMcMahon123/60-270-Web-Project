<?php 
$title = 'Login | Signup';
?>
<!DOCTYPE html>
<html>
<head>
<?php include('header.php'); 

if($_SESSION['logged_in_flag']) {
    header('Location: ../html/home.php'); 
} 
?>
</head>
<body>
<?php include('navigation.php'); ?>

<div id="main-content-area">
    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Sign Up</li>
                <li id="signup-form" class="list-group-item">
                    <form name="signup" action="../php/signup-script.php" onsubmit="return validateSignUp()" method="post">
                        <div class="form-group">
                            <label for="name-signup">Name</label>
                            <input id="name-signup" type="text" class="form-control" name="name" placeholder="Joe Smith">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Avatar Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image-signup">
                                <label class="custom-file-label" for="image-signup">Choose File</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email-signup">Email Address</label>
                            <input id="email-signup" type="email" class="form-control" name="email" placeholder="email@provider.com">
                        </div>
                        <div class="form-group">
                            <label for="password-input">Password</label>
                            <input id="password-input" type="password" class="form-control" onchange="checkPasswords()" name="password" placeholder="Password">
                            <div id="password-input-hint" class="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" onchange="checkPasswords()" name="password-confirm" placeholder="Password">
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
                    <form name="login" action="../php/login-script.php" onsubmit="return validateLogin()" method="post">
                        <div class="form-group">
                            <label for="email-login">Email Address</label>
                            <input id="email-login" type="email" class="form-control" name="email" placeholder="email@provider.com">
                        </div>
                        <div class="form-group">
                            <label for="password-login">Password</label>
                            <input id="password-login" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Login</button>
                    </form>   
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php include('footer.php'); ?>
</body>
</html>