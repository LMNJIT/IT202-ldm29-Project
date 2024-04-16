<!-- 
Luka Mayer
4/3/2024
IT202 Internet Applications | Section 006
Phase 4 Assignment: PHP Authentication and Delete SQL Data
ldm29@njit.edu 

Version 1.0
-->

<?php
    // Get the product data
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_FLOAT);
    $maxPrice = 5000;

    // Validate inputs
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $description == FALSE
            || $stock == NULL) {
        $error = "Invalid product data. Check all fields and try again.";
    } else if (!is_double($price) || !is_float($price)) {
        $error = "Price must be a double or float. Change price field and try again.";
    } else if ($price > $maxPrice) {
        $error = "Price is over the maximum of 5000. Lower price field and try again.";
    } else if ($price < 0) {
        $error = "Price cannot be negative. Raise price field above 0 and try again.";
    } else {
        require_once('database_njit.php');

        // Check for duplicates
        $query = "SELECT COUNT(*) AS count FROM techaccessories WHERE techaccessoriesCode = :code";
        $statement = $db->prepare($query);
        $statement->bindValue(':code', $code);
        $statement->execute();
        $duplicateSuccess = $statement->fetch();
        $statement->closeCursor();

        if ($duplicateSuccess['count'] > 0) {
            $error = "Duplicate code, enter a different code that is not already present in the database.";
        } else {  
            // Add the product to the database  
            $query = 'INSERT INTO techaccessories
                        (techaccessoriesCategoryID, techaccessoriesCode,
                        techaccessoriesName, description, price, 
                        techaccessoriesStock, dateCreated)
                    VALUES
                        (:category_id, :code, :name, :description, :price, :stock, NOW())';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->bindValue(':code', $code);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':stock', $stock);
            $success = $statement->execute();
            $statement->closeCursor();
            include('create_products_form.php');
            echo "<h3>Your insert statement status is $success</h3>";
        }
    }
?>

<html>
    <head>
        <title>Create Products</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
    </head>
    <body>
    <main>
        <?php if (!empty($error)): ?>
            <h3>Error: <?php echo $error; ?></h3>
            <script>reset();</script>
        <?php endif; ?>
    </main>
    </body>
    <footer>
        <h4> Navigation </h4>
        <nav>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.php">Home Page</a>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/tech_accessories_product_list.php">Product List</a>
            <?php
                if (empty($_SESSION)) {
                ?>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/login.php">Login</a>
            <?php } else { ?>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/shipping_page.php">Shipping Page</a>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/create_products_form.php">Product Manager (Add Products)</a>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/logout.php">Logout</a>
                <p>Welcome <?php echo $_SESSION['user_info']['firstName'] . ' ' . $_SESSION['user_info']['lastName'] . ' ('
                . $_SESSION['user_info']['email'] . ')';?><p>
            <?php } ?>
        </nav>
        <p>By Luka Mayer</p>
    </footer>
    <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>