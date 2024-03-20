<!-- 
Luka Mayer
3/20/2024
IT202 Internet Applications | Section 006
Phase 3 Assignment: Create SQL Data using PHP
ldm29@njit.edu 

Version 1.0
-->

<?php
    /* DEBUGGING ONLY 
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */
    
    // Get the product data
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_FLOAT);


    // Validate inputs
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $description == FALSE
            || $stock == NULL) {
        $error = "Invalid product data. Check all fields and try again.";
        echo "$error <br>";
        // include('error.php');
    } else {
        require_once('database_njit.php');









        FINISH
        // Add the product to the database  
        $query = 'INSERT INTO products
                    (categoryID, productCode, productName, listPrice)
                VALUES
                    (:category_id, :code, :name, :price)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $success = $statement->execute();
        $statement->closeCursor();
        echo "<p>Your insert statement status is $success</p>";

}
?>

<html>
    <footer>
            <h4> Navigation </h4>
            <nav>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.html">Home Page</a>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/shipping_page.php">Shipping Page</a>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/tech_accessories_product_list.php">Product List</a>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/create_products_form.php">Product Manager (Add Products)</a>
            </nav>
            <p>By Luka Mayer</p>
    </footer>
    <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>