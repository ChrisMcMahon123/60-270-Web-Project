<?php 
$title = 'Upload Textbooks';
?>
<!DOCTYPE html>
<html>
<head>
<?php include('header.php'); 

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
            <ul class="list-group">
                <li class="list-group-item active" style="z-index: 0;">Upload Textbook</li>
                <li id="login-form" class="list-group-item">
                    <form name="upload-textbook" action="../php/form_upload.php" onsubmit="return validateUploadForm()" method="post">
                        <div class="form-group">
                            <label for="title-upload">Textbook Title</label>
                            <input id="title-upload" type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="year-upload">Published Year</label>
                            <input id="year-upload" type="text" class="form-control" name="year" placeholder="2007">
                        </div>
                        <div class="form-group">
                            <label for="email-upload">Author</label>
                            <input id="email-upload" type="text" class="form-control" name="author" placeholder="Joe Smith">
                        </div>
                        <?php 
                            include('category_dropdown.php');
                        ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Textbook File</span>
                            </div>
                            <div class="custom-file">
                                <input type="file"  accept="application/pdf" class="custom-file-input" name="file" onchange="displayFileName(this.value,'file-upload-label')" id="file-upload">
                                <label id="file-upload-label" class="custom-file-label" for="file-upload">Select File</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Cover Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file"  accept="image/*" class="custom-file-input" name="cover" onchange="displayFileName(this.value,'cover-upload-label')" id="cover-upload">
                                <label id="cover-upload-label" class="custom-file-label" for="cover-upload">Select File</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">Thank you for contributing!</small>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Upload</button>
                    </form>   
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php include('footer.php'); ?>
</body>
</html>