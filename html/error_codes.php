<?php
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'error_codes')) {
    header('Location: home.php?code=14'); 
}

if(isset($_GET['code'])) { 
    //grab the error code from the database and display it
    $errorSQL=' SELECT 
                    message,
                    type 
                FROM 
                    errors
                WHERE 
                    code = :code
                LIMIT 1
                ';

    try {
        //there will only ever be one error code retrieved at a time, 
        $databaseQuery = $databaseConnection->prepare($errorSQL);
        $databaseQuery->bindParam(':code', $_GET['code']);
        $databaseQuery->execute();

        $data = $databaseQuery->fetch();
    
        if(!empty($data)) { 
            if($data[1] == 'Success') {
                $style = 'color: white; background:#28a745;';
            }
            else {
                $style = 'color: white; background:#dc3545;';
            } ?>
            <div class="flex-sm-fill m-2">
                <ul class="list-group">
                    <li class="list-group-item" style="<?php echo $style; ?>"><?php echo $data[0]; ?></li>
                </ul>
            </div>
            <?php
        }
    }
    catch(PDOException $error) {
        echo 'Connection failed: '.$error->getMessage();
    }
    unset($data, $databaseQuery, $errorSQL);
}
?>