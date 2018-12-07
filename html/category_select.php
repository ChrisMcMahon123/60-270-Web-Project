<?php 
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'category_select')) {
    header('Location: home.php?code=14'); 
}
?>
<select class="custom-select" id="category-list-search" required="required">
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

        $data = $databaseQuery->fetchAll(); ?>

        <option value="All">All Categories</option>

        <?php
        foreach($data as $row) { ?>
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php
        }

        unset($categoriesSQL, $data, $row, $databaseQuery);
    }
    catch(PDOException $error) {
        echo 'Connection failed: '.$error->getMessage();
    }
    ?>
</select>