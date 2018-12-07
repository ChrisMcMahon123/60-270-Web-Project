<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'modal_warning_delete')) {
    header('Location: home.php?code=14'); 
}
?>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="flex-sm-fill m-2">
                    <ul class="list-group" style="columns: 2; ">
                        <li class="list-group-item">
                        <nav class="nav flex-column flex-sm-row ">
                                <div class="m-2">
                                    <div>
                                        <span style="fmargin-right: 5px;">Are you sure you want to delete the <span style="font-weight: bold;" id="delete-name"></span> textbook?</span>
                                    </div>
                                </div>
                            </nav>
                        </li>
                    </ul>
                </div>
            </nav>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" style="color: white;" id="delete-delete" href="">
                    <img src="../image/trash-2.svg">
                    <span style="margin-left:5px;">Delete</span>
                </a>
            </div>
        </div>
    </div>
</div>