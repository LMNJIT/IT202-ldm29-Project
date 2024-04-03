<?php
    // Slide 37
    // use your chosen database
    require_once('database_njit.php');

    $techaccessoriesCategoryID = filter_input(INPUT_POST, 'techaccessoriesCategory_ID', FILTER_VALIDATE_INT);
    $techaccessoriesID = filter_input(INPUT_POST, 'techaccessories_ID', FILTER_VALIDATE_INT);

    if($techaccessoriesID != FALSE && $techaccessoriesCategoryID != FALSE) {
        $query = 'DELETE FROM techaccessories WHERE techaccessoriesID = :techaccessoriesID';
        // 4 step: prepare, bindValue, execute, close cursor
        $statement = $db->prepare($query);
        $statement->bindValue(':techaccessoriesID', $techaccessoriesID);
        $success = $statement->execute();
        $statement->closeCursor();
        echo "<p>Your delete worked.</p>";
    }
?>
<!DOCTYPE html>
<html>
    <!-- the head section -->
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" href="styles/guitar_shop.css"/>
    </head>

    <!-- the body section -->
    <body>
        <p><a href="product_list.php">View Product List</a></p>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> My Guitar Shop, Inc.</p>
        </footer>
    </body>
</html>