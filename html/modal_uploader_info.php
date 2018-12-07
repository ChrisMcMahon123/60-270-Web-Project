<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'modal_uploader_info')) {
    header('Location: home.php?code=14'); 
}
?>
<div class="modal fade" id="modal-uploader" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Uploader Account Details</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="flex-sm-fill m-2">
                    <ul class="list-group" style="columns: 2; ">
                        <li class="list-group-item">
                        <nav class="nav flex-column flex-sm-row ">
                                <div>
                                    <img id="uploader-avatar" src="" alt="User Avatar" height="175px" width="175px" style="margin-bottom:10px;"/>
                                </div>
                                <div class="m-2">
                                    <div>
                                        <span style="font-weight: bold; margin-right: 5px;">Name: </span><span id="name-uploader"></span>
                                    </div>
                                    <div>
                                        <span style="font-weight: bold; margin-right: 5px;">Email: </span><span id="uploader-email"></span>
                                    </div>
                                    <div>
                                        <span style="font-weight: bold; margin-right: 5px;">Created On: </span><span id="uploader-joined"></span>
                                    </div>
                                    <div>
                                        <span style="font-weight: bold; margin-right: 5px;">Type: </span><span id="uploader-type"></span>
                                    </div>
                                </div>
                            </nav>
                        </li>
                    </ul>
                </div>
            </nav>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>