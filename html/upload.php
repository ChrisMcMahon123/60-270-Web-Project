<?php 
$title = 'Upload Textbooks';
?>
<!DOCTYPE html>
<html>
<head>
<?php require('header.php'); 

if(!$_SESSION['logged_in_flag']) {
    header('Location: ../html/home.php?code=15'); 
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
                <li class="list-group-item active">Upload Textbook</li>
                <li id="upload-form" class="list-group-item">
                    <form name="upload-textbook" action="../php/form_upload.php" onsubmit="return validateUploadForm(this)" method="post" enctype="multipart/form-data">
                        <?php require('upload_form_contents.php'); ?>

                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Upload</button>
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