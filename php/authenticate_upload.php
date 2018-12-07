<?php 
require('variables.php');
require('database.php');

$response = [];

if(isset($_POST['title'])) {
    if(!empty($_POST['title'])) {
        $response['title'] = true;
    }
    else {
         $response['title'] = false;
    }
}
else {
    $response['title'] = false;
}

if(isset($_POST['year'])) {
    if(!empty($_POST['year'])) {
        if(is_numeric($_POST['year'])) {
            if($_POST['year'] >= $minYear && $_POST['year'] <= $maxYear) {
                $response['year'] = 1;
            }
            else {
                $response['year'] = -1;
            }
        }
        else {
            $response['year'] = -1;
        }
    }
    else {
         $response['year'] = 0;
    }
}
else {
    $response['year'] = 0;
}

if(isset($_POST['author'])) {
    if(!empty($_POST['author'])) {
        $response['author'] = true;
    }
    else {
         $response['author'] = false;
    }
}
else {
    $response['author'] = false;
}

if(isset($_POST['category'])) {
    if(!empty($_POST['category'])) {

        $categorySQL= 'SELECT 
                            *
                        FROM 
                            categories
                        WHERE 
                            name = :name
                        LIMIT 1
                        ';

        try {
            //there will only ever be one error code retrieved at a time, 
            $databaseQuery = $databaseConnection->prepare($categorySQL);
            $databaseQuery->bindParam(':name', $_POST['category']);
            $databaseQuery->execute();

            $data = $databaseQuery->fetch();

            if(!empty($data)) {
                //category exists
                $response['category'] = 1;
                $categoryId = $data[0];
            }
            else {
                //cataegory doesn't exist
                if($_SESSION['access_level'] >= 2) {
                    //new category will be created by admin / superuser
                    $response['category'] = 2;
                }
                else {
                    //user doesn't have the ability to add new categories
                    $response['category'] = -1;
                }
            }

            unset($data, $databaseQuery, $categorySQL);
        }
        catch(PDOException $error) {
            echo 'Connection failed: '.$error->getMessage();
            $response['category'] = -2;
        }
    }
    else {
         $response['category'] = 0;
    }
}
else {
    $response['category'] = 0;
}

// Check if image file is a actual image or fake image
if(isset($_FILES['cover']['tmp_name'])) {

    if(false !== getimagesize($_FILES['cover']['tmp_name'])) {
        //upload file is an image
        if($_FILES['cover']['size'] < $maxFileSize) {
            //upload file is the correct size
            $response['cover'] = true; 
            $response['cover_message'] = 'Cover scan file is valid'; 
        }
        else {
            //upload file is too large
            $response['cover'] = false;
            $response['cover_message'] = 'Cover scan file is too large, please reduce the file size'; 

        }
    } else {
        $response['cover'] = false;
        $response['cover_message'] = 'Cover scan file is not a valid image file'; 
    }
}
else {
    $response['cover'] = false;
    $response['cover_message'] = 'No cover scan file selected'; 
}

// Check if pdf file is an actual pdf file
if(isset($_FILES['file']['tmp_name'])) {
    if('application/pdf' == mime_content_type($_FILES['file']['tmp_name'])) {
        //upload file is an image
        if($_FILES['file']['size'] < $maxFileSize) {
            //upload file is the correct size
            $response['file'] = true; 
            $response['file_message'] = 'pdf is valid'; 
        }
        else {
            //upload file is too large
            $response['file'] = false;
            $response['file_message'] = 'Selected pdf file is too large, please reduce the file size'; 
        }
    } else {
        $response['file'] = false;
        $response['file_message'] = 'Selected file is not a valid pdf file'; 
    }
}
else {
    $response['file'] = false;
    $response['file_message'] = 'No pdf file selected'; 
}

if($response['title'] && ($response['year'] === 1) && $response['author'] && ($response['category'] >= 1) && $response['file'] && $response['cover']) {
    $response['form-valid'] = true;
}
else {
    $response['form-valid'] = false;
}

if(isset($_POST['ajax']) && $_POST['ajax']) {
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>