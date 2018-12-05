<?php 
require('authenticate_upload.php');

if($response['form-valid']) {
    //authenticate already checks if a new category is to be inserted

    if($response['category'] == 2) {
        //create the new category
        try {
            //this executes with no errors, but the blob is broken...
            $addCategorySQL = ' INSERT INTO 
                                    categories (name)
                                VALUES 
                                    (:name)
                                ';

            $databaseQuery = $databaseConnection->prepare($addCategorySQL);
            $databaseQuery->bindParam(':name', $_POST['category']);
            $databaseQuery->execute();


            //get the category_id of the newly added category
            $categoryId = $databaseConnection->lastInsertId();
        }
        catch(PDOException $error) {
            header('Location: ../html/upload.php?code=3');
            //echo 'Connection failed: '.$error->getMessage();
            //echo  $addCategorySQL;
        }
    }

    try {
        //categoryId either gets set in authenticate_upload when an exisiting category is chosen or
        //when a new category is created
        $coverScan = addslashes(file_get_contents($_FILES['cover']['tmp_name']));
        $pdfFile = addslashes(file_get_contents($_FILES['file']['tmp_name']));

        //Works but not using prepared statements...
        $addTextbookSQL = ' INSERT INTO 
                                textbooks (textbook_name, author, year, category_id, cover_scan, file)
                            VALUES 
                                ("'.$_POST['title'].'", "'.$_POST['author'].'", '.$_POST['year'].', '.$categoryId.', "'.$coverScan.'", "'.$pdfFile.'")
                            ';

        $databaseQuery = $databaseConnection->prepare($addTextbookSQL);
        $databaseQuery->execute();

        unset($databaseQuery, $addTextbookSQL, $addCategorySQL, $coverScan, $pdfFile, $categoryId);
        
        header('Location: ../html/upload.php?code=9');
    }
    catch(PDOException $error) {
        header('Location: ../html/upload.php?code=3');
        //echo 'Connection failed: '.$error->getMessage();
        //echo  $addTextbookSQL;
    }
}
else {
    header('Location: ../html/upload.php?code=1');
}
?>