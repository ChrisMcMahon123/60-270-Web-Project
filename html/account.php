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
    <?php include('error_codes.php'); ?>

    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group" style="columns: 2; ">
                <li class="list-group-item active">Account Details</li>
                <li id="account-form" class="list-group-item">
                   <nav class="nav flex-column flex-sm-row ">
                        <div>
                            <img src="<?php echo $_SESSION['user_avatar']; ?>" alt="User Avatar" height="150px" width="150px" style="margin-bottom:10px;"/>
                        </div>
                        <div class="m-2">
                            <div>
                                <span style="font-weight: bold; margin-right: 5px;">Email: </span><?php echo $_SESSION['email']; ?>
                            </div>
                            <div>
                                <span style="font-weight: bold; margin-right: 5px;">Type: </span><?php echo $_SESSION['access_level']; ?>
                            </div>
                            <div>
                                <span style="font-weight: bold; margin-right: 5px;">Created On: </span> <?php echo $_SESSION['date_created']; ?>
                            </div>
                        </div>
                    </nav>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="nav flex-column flex-sm-row">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Update Account Details</li>
                <li class="list-group-item">
                    <form nid="account-form" name="account-form" action="../php/form_account.php" onsubmit="return validateAccountForm(this)" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name-input">Name</label>
                            <input id="name-input" type="text" class="form-control" name="name" placeholder="<?php echo $_SESSION['username']; ?>">
                            <div id="name-input-hint" class="">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Avatar Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input form-control" name="image" onchange="displayFileName(this.value,'image-avatar-label')" id="image-avatar">
                                <label id="image-avatar-label" class="custom-file-label" for="image-avatar">Select File</label>
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