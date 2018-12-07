<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'modal_update_upload')) {
    header('Location: home.php?code=14'); 
}
?>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Textbook</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
        <form name="upload-textbook" action="../php/form_upload.php" onsubmit="return validateUploadForm(this)" method="post" enctype="multipart/form-data">
        <?php require('upload_form_contents.php'); ?>
        <input type="hidden" id="textbook-id" name="textbook-id" value="">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-warning">           
            <img src="../image/save.svg">
            <span style="margin-left:5px; color: white;">Update</span>
        </button>
    </div>
    </form>
    </div>
</div>
</div>
<script>
    $("#modal-edit").on("shown.bs.modal", function () {
        dropDownResize();
    });
</script>