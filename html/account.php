<?php 
include('../php/variables.php');

//user needs to be logged in to view this page
if(!$_SESSION['logged_in_flag']) {
    header('Location: ../html/home.php'); 
}

$title = 'Account Details';
?>
<!DOCTYPE html>
<html>
<head>
<?php include('header.php'); ?>
</head>
<body>
<?php include('navigation.php'); ?>

<div id="main-content-area">
    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Account Settings</li>
                <li id="signup-form" class="list-group-item">
                    <form>
                        <div class="form-group">
                            <label for="name-signup">Name</label>
                            <input id="name-signup" type="text" class="form-control" name="name" placeholder="Joe Smith" required="required">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Avatar Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input" name="image" id="image-signup" required="required">
                                <label class="custom-file-label" for="image-signup">Choose File</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-signup">Password</label>
                            <input id="password-signup" type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password-signup-confirm">Confirm Password</label>
                            <input id="password-signup-confirm" type="password" class="form-control" name="password-confirm" placeholder="Password" required="required">
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