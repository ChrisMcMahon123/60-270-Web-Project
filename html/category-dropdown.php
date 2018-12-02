<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'category-dropdown')) {
    header('Location: home.php'); 
}
?>
<div class="form-group">
    <label for="category-search">Category</label>
    <input id="category-search" type="text" class="form-control dropdown-toggle" data-toggle="dropdown" name="category" autocomplete="off" placeholder="Category"  onkeyup="filterCategories(this.value)">

    <div id="category-dropdown-menu" class="dropdown-menu" role="menu" style="z-index: 100;">
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
                echo '<a tabindex="-1" role="menuitem" id="category-item-'.$itemId.'" class="dropdown-item" "value="'.$row['name'].'" onkeyup="enterKeySelection(event.key,\'category-item-'.$itemId.'\')" onclick="updateCategory(\''.$row['name'].'\')">'.$row['name'].'</a>';
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
<?php
unset($data, $row, $itemId);
?>