<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'upload_form_contents')) {
    header('Location: home.php?code=14'); 
}
?>
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
<?php require('category_dropdown.php'); ?>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Textbook File</span>
    </div>
    <div class="custom-file">
        <input type="file" accept="application/pdf" class="custom-file-input" name="file" onchange="displayFileName(this.value,'file-upload-label')" id="file-upload">
        <label id="file-upload-label" class="custom-file-label" for="file-upload">Select File</label>
    </div>
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Cover Image</span>
    </div>
    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" name="cover" onchange="displayFileName(this.value,'cover-upload-label')" id="cover-upload">
        <label id="cover-upload-label" class="custom-file-label" for="cover-upload">Select File</label>
    </div>
</div>