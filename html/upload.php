<?php 
$title = 'Upload Textbooks';
?>
<!DOCTYPE html>
<html>
<head>
<?php require('header.php'); 

if(!$_SESSION['logged_in_flag']) {
    header('Location: ../html/home.php'); 
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
                <li class="list-group-item active" style="z-index: 0;">Upload Textbook</li>
                <li id="login-form" class="list-group-item">
                    <form name="upload-textbook" action="../php/form_upload.php" onsubmit="return validateUploadForm(this)" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title-upload">Textbook Title</label>
                            <input id="title-upload" type="text" class="form-control" name="title" placeholder="Title">
                            <div id="title-upload-hint" class="m-2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year-upload">Published Year</label>
                            <input id="year-upload" type="number" class="form-control" name="year" placeholder="2007">
                            <div id="year-upload-hint" class="m-2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author-upload">Author</label>
                            <input id="author-upload" type="text" class="form-control" name="author" placeholder="Joe Smith">
                            <div id="author-upload-hint" class="m-2">
                            </div>
                        </div>
                        <?php 
                            require('category_dropdown.php');
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

                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Upload</button>
                    </form>   
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php require('footer.php'); ?>
</body>
</html>