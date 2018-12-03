<?php 
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
    <?php include('error_codes.php'); ?>

    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active" style="z-index: 0;">Search</li>
                <li id="search-form" class="list-group-item">
                    <form name="search" action="../php/form_search.php" onsubmit="return validateSearch()" method="post">
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
                        <?php 
                            include('category_dropdown.php');
                        ?>
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
                <li id="search-results" class="list-group-item">
                AJAX STUFFs
                </li>
            </ul>
        </div>  
    </nav>
</div>
<?php include('footer.php'); ?>
</body>
</html>