<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'category_dropdown')) {
    header('Location: home.php?code=14'); 
}
?>
<div class="form-group">
    <label for="category-search">Category<div id="category-search-hint"></div></label>
    <input id="category-search" type="text" class="form-control dropdown-toggle" data-toggle="dropdown" name="category" autocomplete="off" placeholder="Category"  onkeyup="filterCategories(this.value)" required="required">

    <div id="category-dropdown-menu" class="dropdown-menu scrollable-menu" role="menu" style="z-index: 100;">
        <?php
        //get all categories from the database and add them to the dropdown menu
        $categoriesSQL='SELECT 
                            name 
                        FROM 
                            categories
                        ORDER BY name ASC
                        ';

        try {
            $databaseQuery = $databaseConnection->prepare($categoriesSQL);
            $databaseQuery->execute();

            $data = $databaseQuery->fetchAll();
            foreach($data as $row) {
                //Clean up multiple dashes or whitespaces
                $itemId = preg_replace("/[\s-]+/", " ", $row['name']);
                //Convert whitespaces and underscore to dash
                $itemId = preg_replace("/[\s_]/", "-", $itemId); ?>

                <a tabindex="-1" role="menuitem" id="category-item-<?php echo $itemId; ?>" class="dropdown-item" value="<?php echo $row['name']; ?>" onkeyup="enterKeySelection(event.key, 'category-item-<?php echo $itemId; ?>')" onclick="updateCategory('<?php echo $row['name']; ?>')"><?php echo $row['name']; ?></a>
                <?php 
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
        $itemId = preg_replace("/[\s_]/", "-", $itemId); ?>

        <option value="category-item-<?php echo $itemId; ?>"><?php echo $row['name']; ?></option>
        <?php
    }
?>
</select> 
<?php
unset($categoriesSQL, $data, $row, $itemId, $databaseQuery);
?>