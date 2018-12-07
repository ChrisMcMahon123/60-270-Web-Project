<?php 
require('variables.php');
require('database.php');

$response = [];

if(isset($_POST['category']) && ((isset($_POST['year']) && is_numeric($_POST['year'])) || empty($_POST['year']))) {
    //get all the textbooks and their corrosponding categories
    //build the modular sql query
    $textbooksSQL='SELECT 
                        * 
                    FROM 
                        textbooks
                    JOIN categories ON textbooks.category_id = categories.id
                    JOIN profiles ON textbooks.account_id = profiles.id
                    JOIN user_codes ON profiles.user_code = user_codes.user_code 
                    ';

    if(!empty($_POST['title'])) {
        $textbooksSQL .=  'WHERE textbook_name LIKE "%'.$_POST['title'].'%" ';
        
        if(!empty($_POST['year'])) {
            $textbooksSQL .=  'AND year = '.$_POST['year'].' ';

            if(!empty($_POST['author'])) {
                $textbooksSQL .=  'AND author LIKE "%'.$_POST['author'].'%" ';

                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'AND categories.name = "'.$_POST['category'].'" ';
                }
            }
            else {
                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'AND categories.name = "'.$_POST['category'].'" ';
                }
            }   
        }   
        else {
            if(!empty($_POST['author'])) {
                $textbooksSQL .=  'AND author LIKE "%'.$_POST['author'].'%" ';

                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'AND categories.name = "'.$_POST['category'].'" ';
                }
            }
            else {
                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'AND categories.name = "'.$_POST['category'].'" ';
                }
            }
        }
    }
    else {
        if(!empty($_POST['year'])) {
            $textbooksSQL .=  'WHERE year = '.$_POST['year'].' ';

            if(!empty($_POST['author'])) {
                $textbooksSQL .=  'AND author LIKE "%'.$_POST['author'].'%" ';

                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'AND categories.name = "'.$_POST['category'].'" ';
                }
            }
            else {
                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'AND categories.name = "'.$_POST['category'].'" ';
                }
            }   
        }   
        else {
            if(!empty($_POST['author'])) {
                $textbooksSQL .=  'WHERE author LIKE "%'.$_POST['author'].'%" ';

                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'AND categories.name  = "'.$_POST['category'].'" ';
                }
            }
            else {
                if(!empty($_POST['category']) && $_POST['category'] != 'All') {
                    $textbooksSQL .=  'WHERE categories.name  = "'.$_POST['category'].'" ';
                }
            }
        }
    }
    //get the sql results using the query above
    //echo $textbooksSQL; 
    try {
        $databaseQuery = $databaseConnection->prepare($textbooksSQL);
        $databaseQuery->execute();

        $data = $databaseQuery->fetchAll();

        if(count($data) == 0) {
            $_GET['code'] = 17;
            require('../html/error_codes.php');
        }
        else {
            foreach($data as $row) { 
                $image = 'data:image/jpeg;base64,'.base64_encode($row[5]);
                $uploadAvatar = 'data:image/jpeg;base64,'.base64_encode($row[13]);
                ?>
                <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" height="200" width="250px" src="<?php echo $image; ?>" alt="<?php echo $row[1]; ?> Cover Scan">
                    <div class="card-body">
                        <h4 class="card-title" style="font-weight: bold;">
                            <?php echo $row[1]; ?>
                            <small class="subtitlefeedback-custom">
                                <br>
                                <?php echo $row[3]; ?>
                            </small>
                        </h4>
                        <div class="card-text">
                            <span style="font-weight:bold;">
                                Author: <span style="font-weight: normal;"><?php echo $row[2]; ?></span>
                        </span>
                        </div>
                        <div class="card-text">
                            <span style="font-weight:bold;">
                                Category: <span style="font-weight: normal;"><?php echo $row[9]; ?></span>
                        </span>
                        </div>
                        <br>
                        <?php
                        if($_SESSION['logged_in_flag']) { ?>
                            <a class="btn btn-primary" href="../php/download_textbook.php?id=<?php echo $row[0]; ?>">
                                <img src="../image/download.svg">
                                <span style="margin-left:5px;">Download</span>
                            </a>
                            <br>
                            <?php   
                            if($_SESSION['access_level'] >= 2) { ?>
                                <input type="hidden" id="<?php echo $row[0]; ?>-title" value="<?php echo $row[1]; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-year" value="<?php echo $row[3]; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-author" value="<?php echo $row[2]; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-category" value="<?php echo $row[9]; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-id" value="<?php echo $row[0]; ?>">
                                
                                <br>
                                <a class="btn btn-warning" style="color: white; margin-right:15px;" onclick="openEditModal('<?php echo $row[0]; ?>')">
                                    <img src="../image/edit.svg">
                                    <span style="margin-left:5px;">Edit</span>
                                </a>
                            <?php
                            }

                            if($_SESSION['access_level'] == 3) { ?>
                                <input type="hidden" id="<?php echo $row[0]; ?>-id" value="<?php echo $row[0]; ?>">
                                <br>
                                <br>
                                <a class="btn btn-danger" style="color: white;" onclick="openDeleteModal('<?php echo $row[0]; ?>')">
                                    <img src="../image/trash-2.svg">
                                    <span style="margin-left:5px;">Delete</span>
                                </a>
                                <input type="hidden" id="<?php echo $row[0]; ?>-name-uploader" value="<?php echo $row[12]; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-uploader-avatar" value="<?php echo $uploadAvatar; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-uploader-email" value="<?php echo $row[15]; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-uploader-joined" value="<?php echo $row[16]; ?>">
                                <input type="hidden" id="<?php echo $row[0]; ?>-uploader-type" value="<?php echo $row[18]; ?>">
                                
                                <br>
                                <br>
                                <a class="btn btn-secondary" style="color: white; margin-right:15px;" onclick="openUploaderModal('<?php echo $row[0]; ?>')">
                                    <img src="../image/upload.svg">
                                    <span style="margin-left:5px;">Uploader</span>
                                </a>
                            <?php
                            }
                            else { ?>
                                <br>
                                <br>
                                <div class="card-text">
                                    <span style="font-weight:bold;">
                                        Uploaded By: <span style="font-weight: normal;"><?php echo $row[12]; ?></span>
                                </span>
                                </div>
                            <?php
                            }
                        }
                        else { ?>
                            <div class="m-2">Login to download files</div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }

            unset($textbooksSQL, $image, $uploadAvatar, $data, $row, $databaseQuery);
        }
    }
    catch(PDOException $error) {
        echo 'Connection failed: '.$error->getMessage();
        $_GET['code'] = 3;
        require('../html/error_codes.php');
    }
}
else {
    $_GET['code'] = 1;
    require('../html/error_codes.php');
}
?>