<?php 
$title = 'Browse Textbooks';
?>
<!DOCTYPE html>
<html>
<head>
<?php require('header.php'); ?>
</head>
<body>
<?php require('navigation.php'); ?>

<div id="main-content-area">
    <?php require('error_codes.php'); ?>

    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Search</li>
                <li id="search-form" class="list-group-item">
                    <div class="form-group">
                        <label for="title-search">Textbook Title <small style="margin-left:5px;">* Optional</small></label>
                        <input id="title-search" type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="year-search">Published Year <small style="margin-left:5px;">* Optional</small></label>
                        <input id="year-search" type="number" class="form-control" name="year" placeholder="2007">
                    </div>
                    <div class="form-group">
                        <label for="author-search">Author <small style="margin-left:5px;">* Optional</small></label>
                        <input id="author-search" type="text" class="form-control" name="author" placeholder="Joe Smith">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="category-list-search">Categories</label>
                        </div>
                        <?php require('category_select.php'); ?>
                    </div>

                    <button class="btn btn-primary" style="margin-top: 5px;" onclick="validateSearchResults()">Search</button>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="nav flex-column flex-sm-row">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Directory</li>
                <li class="list-group-item">
                    <nav id="search-results" class="nav flex-sm-fill flex-sm-row">
                    </nav>
                </li>
            </ul>
        </div>  
    </nav>
</div>
<?php
if($_SESSION['access_level'] >= 2) {
    require('modal_update_upload.php');
    require('modal_warning_delete.php');
    require('modal_uploader_info.php'); 
    require('modal_file_input.php');
} 

require('footer.php'); 
?>
</body>
</html>