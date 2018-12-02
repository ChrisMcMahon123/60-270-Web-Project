<?php 
$title = 'Account Details';
?>
<!DOCTYPE html>
<html>
<head>
<?php include('header.php');

//user needs to be logged in to view this page
if(!$_SESSION['logged_in_flag']) {
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
                <li class="list-group-item active">Account Settings</li>
                <li id="account-form" class="list-group-item">
                <img src="../image/textbook1.jpg" alt="User Avatar" height="150px" width="150px" style="margin-bottom:10px;"/>
                    <form name="account-update" action="../php/account-script.php" onsubmit="return validateAccountForm()" method="post">
                        <div class="form-group">
                            <label for="name-input">Name</label>
                            <input id="name-input" type="text" class="form-control" name="name" placeholder="<?php echo $_SESSION['username']; ?>">
                            <div class="">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Avatar Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input form-control" name="image" onchange="displayFileName(this.value)" id="image-signup">
                                <label id="image-file-label" class="custom-file-label" for="image-signup">Select File</label>
                            </div>
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
                        
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Update</button>
                    </form>               
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php include('footer.php'); ?>
</body>
</html>