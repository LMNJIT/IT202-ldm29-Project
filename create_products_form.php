<!-- 
Luka Mayer
3/20/2024
IT202 Internet Applications | Section 006
Phase 3 Assignment: Create SQL Data using PHP
ldm29@njit.edu 

Version 1.0
-->

<?php
    require_once('database_njit.php');
    $query = 'SELECT * FROM techaccessoriesCategories ORDER BY techaccessoriesCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product MManager</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h2>Add Product</h2>
        </header>
    </head>
    <body>
        <main>
        <form action="create_products.php" method="post"
              id="create_products_form">
                                      
            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['techaccessoriesCategoryID']; ?>">
                    <?php echo $category['techaccessoriesCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>Description:</label>
            <input type="text" name="name"><br>

            <label>Price:</label>
            <input type="text" name="price"><br>

            <label>Stock:</label>
            <input type="text" name="price"><br>

            <!-- Reset/Clear button (Optional) -->

            <input type="submit" value="Add Product"><br>
        </main>
    </body>
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