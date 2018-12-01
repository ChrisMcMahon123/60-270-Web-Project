<?php 
include('../php/variables.php');

//user needs to be logged in to view this page
if(!$_SESSION['logged_in_flag']) {
    header('Location: ../html/home.php'); 
} 

$title = 'Upload Textbooks';
?>
<!DOCTYPE html>
<html>
<head>
<?php include('header.php'); ?>
</head>
<body>
<?php include('navigation.php'); ?>

<div id="main-content-area">
    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active" style="z-index: 0;">Upload Textbook</li>
                <li id="login-form" class="list-group-item">
                    <form>
                        <div class="form-group">
                            <label for="title-upload">Textbook Title</label>
                            <input id="title-upload" type="text" class="form-control" name="title" placeholder="Title" required="required">
                        </div>
                        <div class="form-group">
                            <label for="year-upload">Published Year</label>
                            <input id="year-upload" type="text" class="form-control" name="year" placeholder="2007" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email-upload">Author</label>
                            <input id="email-upload" type="text" class="form-control" name="author" placeholder="Joe Smith" required="required">
                        </div>
                        <div class="form-group">
                            <label for="category-search">Category</label>
                            <input id="category-search" type="text" class="form-control dropdown-toggle" data-toggle="dropdown" name="category" autocomplete="off" placeholder="Category"  onkeyup="filterCategories(this.value)">

                            <div id="category-dropdown-menu" class="dropdown-menu" style="z-index: 100;">
                                <?php
                                //get all categories from the database and add them to the dropdown menu
                                $categoriesSQL =   'SELECT 
                                                        name 
                                                    FROM 
                                                        categories
                                                    ';

                                try {
                                    $databaseQuery = $databaseConnection->prepare($categoriesSQL);
                                    $databaseQuery->execute();

                                    $data = $databaseQuery->fetchAll();
                                    foreach($data as $row) {
                                        //Clean up multiple dashes or whitespaces
                                        $itemId = preg_replace("/[\s-]+/", " ", $row['name']);
                                        //Convert whitespaces and underscore to dash
                                        $itemId = preg_replace("/[\s_]/", "-", $itemId);
                                        echo '<a id="category-item-'.$itemId.'" class="dropdown-item" "value="'.$row['name'].'" onclick="updateCategory(\''.$row['name'].'\')">'.$row['name'].'</a>';
                                    }
                                }
                                catch(PDOException $error) {
                                    echo 'Connection failed: '.$error->getMessage();
                                }
                                ?>
                            </div>
                        </div>
                        <select id="category-array" style="display: none;">  
                        <?php
                            foreach($data as $row) {
                                //Clean up multiple dashes or whitespaces
                                $itemId = preg_replace("/[\s-]+/", " ", $row['name']);
                                //Convert whitespaces and underscore to dash
                                $itemId = preg_replace("/[\s_]/", "-", $itemId);
                                echo '<option value="category-item-'.$itemId.'">'.$row['name'].'</option>';
                            }
                        ?>
                        </select> 
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Textbook File</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="file-upload" required="required">
                                <label class="custom-file-label" for="file-upload">Choose File</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Cover Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="cover" id="cover-upload" required="required">
                                <label class="custom-file-label" for="cover-upload">Choose File</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">Thank you for contributing!</small>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Upload</button>
                    </form>   
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php include('footer.php'); ?>
</body>
</html>