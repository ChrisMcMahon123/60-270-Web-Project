<?php 
include('../php/variables.php');

$title = 'Browse Textbooks';
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
                <li class="list-group-item active" style="z-index: 0;">Search</li>
                <li id="login-form" class="list-group-item">
                    <form>
                        <div class="form-group">
                            <label for="title-search">Textbook Title</label>
                            <input id="title-search" type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="year-search">Published Year</label>
                            <input id="year-search" type="text" class="form-control" name="year" placeholder="2007">
                        </div>
                        <div class="form-group">
                            <label for="author-search">Author</label>
                            <input id="author-search" type="text" class="form-control" name="author" placeholder="Joe Smith">
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
                    
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Search</button>
                    </form>  
                </li>
            </ul>
        </div>
    </nav>
    <nav class="nav flex-column flex-sm-row">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active" style="z-index: 0;">Directory</li>
                <li id="login-form" class="list-group-item">
                    DO SOME AJAX STUFF
                </li>
            </ul>
        </div>  
    </nav>
</div>
<?php include('footer.php'); ?>
</body>
</html>