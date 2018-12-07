<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'modal_file_input')) {
    header('Location: home.php?code=14'); 
}
?>
<div class="modal fade" id="modal-file-error" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Validation Error</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div id="error-message" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>